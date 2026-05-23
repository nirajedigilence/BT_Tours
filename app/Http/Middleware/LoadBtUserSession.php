<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;

class LoadBtUserSession
{
    public function handle($request, Closure $next)
    {
        // CASE 1: First visit with bt_tour + bt_token (from Veenus login redirect)
        if ($request->has('bt_tour') && $request->filled('bt_token')) {
            Log::info('LoadBtUserSession: bt_tour + bt_token detected — claiming token');
            Session::forget('user');

            try {
                $btToken = $request->query('bt_token');

                // CLAIM the token (sets is_used=1 on Veenus side)
                $claimUrl = env('IMAGE_URL') . 'api/validate_bt_session';
                $claimResponse = Http::withBasicAuth('Tours-user', 'L3tM3L00kd')
                    ->asForm()
                    ->timeout(5)
                    ->post($claimUrl, [
                        'token' => $btToken,
                        'claim' => '1'
                    ]);

                $claimResult = $claimResponse->json();

                if (!empty($claimResult['status']) && $claimResult['status'] === 'success') {
                    // Token claimed successfully — store user data + token in cookie
                    $userDataArray = [
                        'user_id' => $request->query('bt_tour'),
                        'bt_token' => $btToken,
                        'data' => $claimResult['data'][0] ?? []
                    ];

                    $cookieValue = json_encode($userDataArray);

                    // Redirect to same URL without bt_tour and bt_token params
                    $redirectUrl = $request->url();
                    $queryParams = $request->except(['bt_tour', 'bt_token']);
                    if (!empty($queryParams)) {
                        $redirectUrl .= '?' . http_build_query($queryParams);
                    }

                    Log::info('LoadBtUserSession: Token claimed, cookie set, redirecting');

                    return redirect($redirectUrl)->withCookies([
                        Cookie::make('bt_user', $cookieValue, 30, null, null, false, true)
                    ]);
                } else {
                    // Token already used or invalid — fall through to bt_tour-only login
                    Log::warning('LoadBtUserSession: Token claim failed — ' . ($claimResult['message'] ?? 'unknown') . ' — falling back to bt_tour login');

                    // Fall through: log in using bt_tour (base64 user ID) without token
                    $raw_user_id = base64_decode($request->query('bt_tour'));
                    $encoded_id = base64_encode($raw_user_id);

                    $apiUrl = env('IMAGE_URL') . 'api/get_user_data';
                    $fallbackResponse = Http::withBasicAuth('Tours-user', 'L3tM3L00kd')
                        ->asForm()
                        ->timeout(5)
                        ->post($apiUrl, ['id' => $encoded_id]);

                    $fallbackData = $fallbackResponse->json();

                    if (!empty($fallbackData['data'][0])) {
                        $userDataArray = [
                            'user_id' => $request->query('bt_tour'),
                            'data' => $fallbackData['data'][0]
                        ];

                        $cookieValue = json_encode($userDataArray);

                        $redirectUrl = $request->url();
                        $queryParams = $request->except(['bt_tour', 'bt_token']);
                        if (!empty($queryParams)) {
                            $redirectUrl .= '?' . http_build_query($queryParams);
                        }

                        Log::info('LoadBtUserSession: Fallback bt_tour login success, redirecting');
                        return redirect($redirectUrl)->withCookies([
                            Cookie::make('bt_user', $cookieValue, 30, null, null, false, true)
                        ]);
                    }
                }

            } catch (\Exception $e) {
                Log::error('LoadBtUserSession claim error: ' . $e->getMessage());
            }
        }
        // CASE 2: bt_tour only, no token (or empty token)
        elseif ($request->has('bt_tour') && !$request->filled('bt_token')) {
            Log::info('LoadBtUserSession: bt_tour only (legacy, no SLO)');
            Session::forget('user');

            try {
                // bt_tour is base64-encoded user ID (e.g. Nw== = 7)
                // Veenus get_user_data API does decrept_code() which is just base64_decode()
                // So we just send base64_encode(user_id) directly
                $raw_user_id = base64_decode($request->query('bt_tour'));
                $encoded_id = base64_encode($raw_user_id);

                $apiUrl = env('IMAGE_URL') . 'api/get_user_data';
                $response = Http::withBasicAuth('Tours-user', 'L3tM3L00kd')
                    ->asForm()
                    ->timeout(5)
                    ->post($apiUrl, ['id' => $encoded_id]);

                $data_api = $response->json();

                if (!empty($data_api['data'][0])) {
                    $userDataArray = [
                        'user_id' => $request->query('bt_tour'),
                        'data' => $data_api['data'][0]
                    ];

                    $cookieValue = json_encode($userDataArray);

                    $redirectUrl = $request->url();
                    $queryParams = $request->except(['bt_tour', 'bt_token']);
                    if (!empty($queryParams)) {
                        $redirectUrl .= '?' . http_build_query($queryParams);
                    }

                    Log::info('LoadBtUserSession CASE2: Success, redirecting to ' . $redirectUrl);
                    return redirect($redirectUrl)->withCookies([
                        Cookie::make('bt_user', $cookieValue, 30, null, null, false, true)
                    ]);
                } else {
                    Log::warning('LoadBtUserSession CASE2: No user data returned');
                }

            } catch (\Exception $e) {
                Log::error('LoadBtUserSession legacy error: ' . $e->getMessage());
            }
        }
        // CASE 3: Cookie exists with bt_token — validate on each request
        elseif ($request->cookie('bt_user')) {
            try {
                $cookieData = json_decode($request->cookie('bt_user'), true);
                $btToken = $cookieData['bt_token'] ?? null;

                // Only validate if cookie has a token (SLO flow)
                if ($btToken) {
                    $apiUrl = env('IMAGE_URL') . 'api/validate_bt_session';

                    $response = Http::withBasicAuth('Tours-user', 'L3tM3L00kd')
                        ->asForm()
                        ->timeout(5)
                        ->post($apiUrl, [
                            'token' => $btToken
                        ]);

                    $result = $response->json();

                    if (!empty($result['logged_out']) && $result['logged_out'] === true) {
                        Log::info('LoadBtUserSession: Session inactive — clearing cookie + redirecting');
                        // Redirect immediately with cookie cleared (not queued)
                        return redirect($request->fullUrl())->withCookies([
                            Cookie::forget('bt_user')
                        ]);
                    }
                }
                // No token in cookie = legacy cookie, skip validation

            } catch (\Exception $e) {
                Log::error('LoadBtUserSession validation error: ' . $e->getMessage());
            }
        }

        return $next($request);
    }
}
