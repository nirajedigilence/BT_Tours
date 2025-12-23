<?php
   
namespace App\Console\Commands;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

use DB;
use Mail;

use GuzzleHttp\Client;

use App\Models\Cms\BTCoachMaster;
use App\Models\Cms\BTExtraMaster;

class BtSettingCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'BT:setting';
    
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update bt settings on BT';
    
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        
     $url = getenv('IMAGE_URL').'api/get_bt_settings';
        $client = new Client();

     try {
            $response = $client->request('get', $url, [
                'auth' => ['Tours-user', 'L3tM3L00kd']
            ]);
            $data = json_decode($response->getBody()->getContents(), true);
           
           $bt_settings = $data['data']['bt_settings'];
           $bt_extras = $data['data']['bt_extras'];
           //update bt settings
          
           BTCoachMaster::where('id','1')->update(array('name'=>$bt_settings['name'],'cost'=>$bt_settings['cost'],'percentage_rate'=>$bt_settings['percentage_rate'],'updated_at'=>$bt_settings['updated_at'],'updated_by'=>$bt_settings['updated_by']));
          // prd(array('name'=>$bt_settings['name'],'cost'=>$bt_settings['cost'],'updated_at'=>$bt_settings['updated_at'],'updated_by'=>$bt_settings['updated_by']));
           //update extra master
           BTExtraMaster::truncate();

            foreach($bt_extras as $k => $row)
            {
                $data['name'] = $row['name'];
                $data['cost'] = $row['cost'];
                BTExtraMaster::create($data);
            }
            //return response()->json(['data' => $data]);

        } catch (\Exception $e) {
            //return response()->json(['error' => $e->getMessage()], 500);
            $countries = array();
        }
    }
}