<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;

class LoadBtUserSession
{
    public function handle($request, Closure $next)
    {
        if ($request->has('bt_tour')) {
            Session::forget('user');

            try {
                $response = Http::withBasicAuth('Tours-user', 'L3tM3L00kd')
                    ->asForm()
                    ->post(env('IMAGE_URL') . 'api/get_user_data', [
                        'id' => $request->query('bt_tour')
                    ]);

                $data_api = $response->json();
                $bt_tour_id = $request->query('bt_tour');
                $userDataArray = [
                    'user_id' => $request->query('bt_tour'),
                    'data' => $data_api['data'][0] ?? []
                ];
               /* Session::put('user', [
                    'user_id' => $request->query('bt_tour'),
                    'data' => $data_api['data'][0] ?? []
                ]);
                $bt_user = Session::get('user');*/

                //Cache::put('bt_user', $userDataArray, now()->addMinutes(60));
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

                
            } catch (\Exception $e) {
                // Log or ignore
            }
        }

        return $next($request);
    }
}
