<?php
   
namespace App\Console\Commands;
   
use Illuminate\Console\Command;
use App\Models\Cms\CartExperiencesToTourStatuses;
use App\Models\Cms\CartExperience;
use App\Models\Cms\Experience;
use App\Models\Cms\ExperienceDate;
use DB;
use Mail;
class RemoveCartCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'removecart:cron';
    
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove cart if not finalized with in an hour';
    
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
        
         $cart = CartExperience::selectRaw('cart_experiences.*,carts.finalized,TIMESTAMPDIFF(DAY, cart_experiences.created_at, CURTIME()) as day')->leftjoin('carts','carts.id','=','cart_experiences.carts_id')->where('carts.finalized','0')->get();
       
         if(!empty($cart))
         {
            foreach($cart as $row)
            {
                //echo 'finalized'.$row->finalized;
              // echo $row->created_at;
                /*echo $date = date('Y-m-d H:i:s');
                echo $row->created_at;
                $start_date = new DateTime($row->created_at);
                $since_start = $start_date->diff($date);
              echo $minute = $since_start->i;*/
                if($row->day >= 60)
                {
                    $cartExperience = CartExperience::with('cart')->find($row->id);
                    if(!empty($cartExperience))
                    {
                        $cartExperience->upscales()->detach();

                        $cartExperience->delete();
                    }
                   
                }
            }
         }
        \Log::info("Remove Cron is working fine!");
     
        /*
           Write your database logic we bellow:
           Item::create(['name'=>'hello new']);
        */
    }
}