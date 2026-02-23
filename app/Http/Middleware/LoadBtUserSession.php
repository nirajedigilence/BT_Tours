<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;

class LoadBtUserSession
{
    public function handle($request, Closure $next)
    {
        // If bt_tour parameter is present, refresh/set the user session
        if ($request->has('bt_tour')) {
            Log::info('LoadBtUserSession: bt_tour param detected = ' . $request->query('bt_tour'));
            Session::forget('user');

            try {
                $response = Http::withBasicAuth('Tours-user', 'L3tM3L00kd')
                    ->asForm()
                    ->post(env('IMAGE_URL') . 'api/get_user_data', [
                        'id' => $request->query('bt_tour')
                    ]);

                $data_api = $response->json();

                // Check if user data is valid (user still logged in on main system)
                if (!empty($data_api['data'][0])) {
                    $userDataArray = [
                        'user_id' => $request->query('bt_tour'),
                        'data' => $data_api['data'][0]
                    ];

                    Cookie::queue(
                        Cookie::make(
                            'bt_user',
                            json_encode($userDataArray),
                            60,           // minutes
                            null,
                            null,
                            false,        // secure (true if HTTPS)
                            true          // httpOnly
                        )
                    );
                } else {
                    // User not found or logged out - clear the cookie
                    Cookie::queue(Cookie::forget('bt_user'));
                }

            } catch (\Exception $e) {
                // API error - clear the cookie to be safe
                Log::error('LoadBtUserSession API error: ' . $e->getMessage());
                Cookie::queue(Cookie::forget('bt_user'));
            }
        }
        // If no bt_tour parameter but cookie exists, verify session is still valid
        elseif ($request->cookie('bt_user')) {
            try {
                $cookieData = json_decode($request->cookie('bt_user'), true);
                $userId = $cookieData['user_id'] ?? null;

                if ($userId) {
                    $response = Http::withBasicAuth('Tours-user', 'L3tM3L00kd')
                        ->asForm()
                        ->timeout(5) // Short timeout for validation
                        ->post(env('IMAGE_URL') . 'api/get_user_data', [
                            'id' => $userId
                        ]);

                    $data_api = $response->json();

                    // If user no longer valid, clear the cookie
                    if (empty($data_api['data'][0])) {
                        Cookie::queue(Cookie::forget('bt_user'));
                    }
                }
            } catch (\Exception $e) {
                // On API error, keep existing cookie (don't disrupt UX for network issues)
                Log::error('LoadBtUserSession re-validation error: ' . $e->getMessage());
            }
        }

        return $next($request);
    }
}
