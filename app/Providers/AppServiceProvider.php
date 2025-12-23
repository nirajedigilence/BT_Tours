<?php

namespace App\Providers;

use App\Models\Cms\Menu;
use App\Models\Cms\MenuSettings;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Client;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /*if(isset($_GET['bt_tour']))
        {
            Session::forget('user');
            $client = new Client();

            try {
                $updateurl = getenv('IMAGE_URL').'api/get_user_data'; 
                  $response = $client->request('post', $updateurl, [
                    'form_params' => [
                        'id' => $_GET['bt_tour']
                    ],
                    'auth' => ['Tours-user', 'L3tM3L00kd']
                ]);
                $data_api = json_decode($response->getBody()->getContents(), true);
              
                //return response()->json(['data' => $data]);

            } catch (\Exception $e) {
               // prd($e->getMessage());
                //return response()->json(['error' => $e->getMessage()], 500);
                $data_api = array();
            } 
            //prd($data_api);
            
              Session::put('user', [
                        'user_id' => $_GET['bt_tour'],
                        'data' => !empty($data_api)?$data_api['data'][0]:array()
                    ]);
              $bt_user = Session::get('user');
          

        }*/
        $menu = new Menu();
        $menuSettings = new MenuSettings();
        $data = $menuSettings->getSettings(1);
        
        $mainMenu = $menu->getMenuById($data['main_menu']);
        $menuFooter1 = $menu->getMenuById($data['footer_1']);
        $menuFooter2 = $menu->getMenuById($data['footer_2']);
        $menuFooter3 = $menu->getMenuById($data['footer_3']);

        $viewData = [
            'mainMenu'=> $mainMenu,
            'menuFooter1'=> $menuFooter1,
            'menuFooter2'=> $menuFooter2,
            'menuFooter3'=> $menuFooter3,
        ];

        view()->share("viewData", $viewData);
    }
}
