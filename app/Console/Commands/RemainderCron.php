<?php
   
namespace App\Console\Commands;
   
use Illuminate\Console\Command;
use App\Models\Cms\CartExperiencesToTourStatuses;
use App\Models\Cms\CartExperience;
use App\Models\Cms\Experience;
use App\Models\Cms\ExperienceDate;
use DB;
use Mail;
class RemainderCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'remainder:cron';
    
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';
    
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
        
        
        $before_date = date('Y-m-d', strtotime('+2 days'));
        $beforedata = CartExperiencesToTourStatuses::selectRaw('cart_experiences_to_tour_statuses.cart_experiences_id,cart_experiences.carts_id')->leftjoin("cart_experiences","cart_experiences.id","=","cart_experiences_to_tour_statuses.cart_experiences_id")->where('cart_experiences_to_tour_statuses.tour_statuses_id','1')->where('cart_experiences_to_tour_statuses.completed','0')->whereRaw("cart_experiences_to_tour_statuses.due_date like '%".$before_date."%'")->get();
        //pr($beforedata);
        if(!empty($beforedata[0]))
        {
            foreach($beforedata as $row)
            {
                $id = $row->cart_experiences_id;
                $cart_experience = CartExperience::with('experiencesToHotelsToExperienceDate')->where("id", $id)->first();
                if(!empty($cart_experience))
                {
                    $cartExeToTour = 

DB::table('cart_experiences_to_tour_statuses')->where("cart_experiences_id", $id)->where('tour_statuses_id', '1')->first();
                    $experience = Experience::with(['getCountryAreas'])->where('id' ,$cart_experience->experiences_id)->get()->first();
                    $hotel = array();
                    if(!empty($experience->еxperiencesToHotelsToExperienceDates)){
                        foreach ($experience->еxperiencesToHotelsToExperienceDates as $key => $value) {
                            if(isset($value->experienceDate->dates_rates_id) && $value->experienceDate->dates_rates_id == $cart_experience->dates_rates_id){
                                $hotel[] = $value->hotel;
                            }
                        }
                    }

                    $experienceDates = ExperienceDate::where('dates_rates_id', $cart_experience->dates_rates_id)->where('experiences_id', $cart_experience->experiences_id)->orderBy('date_from','ASC')->get()->toArray();
                    $dates_rates = 

DB::table('experience_dates_rates')->where('id', $cart_experience->dates_rates_id)->first();

                            $cart_detail = 

DB::table('carts')->selectRaw('carts.id,users.name,users.email')->join('users','carts.user_id','=','users.id')->where('carts.id', $row->carts_id)->first();
                             $e_dates = array();
                                if(!empty($experienceDates)){
                                    foreach ($experienceDates as $key => $value) {
                                        if(!empty($value['dates_rates_id'])){

                                            $e_dates['date_from'][] = strtotime($value['date_from']);
                                            $e_dates['date_to'][] = strtotime($value['date_to']);
                                        }
                                    } 
                                }
                                if ( !empty( $e_dates['date_from'] ) ) {
                                    $_dateMin = min($e_dates['date_from']);
                                }else{
                                    $_dateMin = 0 ;
                                }
                                if ( !empty( $e_dates['date_to'] ) ) {
                                     $_dateMax = max($e_dates['date_to']);
                                }else{
                                    $_dateMax = 0 ;
                                }
                               
                                $diff = $_dateMax - $_dateMin; 
                                $nights = round($diff / 86400);

                                $mail_content['html'] = '<html></body>
                                <p>Hello '.$cart_detail->name.',<br/></p>
                                <p>Please confirm your booking 2 days remaining.</p>
                                <p><b>Tour Name</b> : '.$experience->name.'</p>
                                
                                <p><b>Dates : </b> : '.date('d M Y', $_dateMin).' - '.date('d M Y', $_dateMax).'</p>
                                <p><b>Hotels</b></p>';

                                            $e_dates = array();
                                            if(!empty($experienceDates)){
                                                foreach ($experienceDates as $key => $value) {
                                                    if(!empty($value['dates_rates_id'])){
                                                        $e_dates[$value['dates_rates_id']]['date_from'][] = strtotime($value['date_from']);
                                                        $e_dates[$value['dates_rates_id']]['date_to'][] = strtotime($value['date_to']);
                                                        $e_dates[$value['dates_rates_id']]['date'][] = $value;
                                                    }
                                                }
                                            }
                                            $hotel = array();
                                           

                                            if(!empty($e_dates))
                                            {
                                                foreach ($e_dates as $k => $val) {
                                                    foreach ($val['date'] as $key => $value) {
                                                        if(!empty($experience->еxperiencesToHotelsToExperienceDates)){
                                                            foreach ($experience->еxperiencesToHotelsToExperienceDates as $key2 => $value2) {
                                                                if(isset($value2->experienceDate->id) && $value2->experienceDate->id == $value['id']){
                                                                    $hotel = $value2->hotel;
                                                                    $hotel_date_id = $value2->experienceDate->hotel_date_id;
                                                                    if(!empty($hotel_date_id))
                                                                    {
                                                                        $hotel_date = 

DB::table('hotel_dates')->where('id', $hotel_date_id)->first();
                                                                    }
                                                                    else
                                                                    {
                                                                        //get hotel date
                                                                        $hotel_date = 

DB::table('hotel_dates')->where('hotel_id', $hotel->id)->where('date_in', $value['date_from'])->where('date_out', $value['date_to'])->first();
                                                                    }
                                                                    
                                                                    

                                                                }
                                                            }
                                                        }
                                                        $hotel_name= (!empty($hotel) ? $hotel->name : '');
                                                     
                                                if(isset($value['date_from']) && !empty($value['date_from']) && isset($value['date_to']) && !empty($value['date_to'])){
                                                
                                                    $mail_content['html'] .= '<p><b>'.$hotel_name.' </b><br><b>Date:</b> '.date("D d M", strtotime($value['date_from'])).' - '.date("D d M 'y", strtotime($value['date_to'])).'</p>';
                                                    
                                                    }       
                                            
                                                }
                                                    }
                                            }      
                                        $urlterm = URL('/terms');
                                 // $mail_content['html'] .= '<p>Please check <a target="_blank" href='.$urlterm.'> terms and conditon</a>.</p>';                               
                                $mail_content['html'] .= '</body></html>';
                                
                                $mail_content['html'];
                                $mail_content['email'] = $cart_detail->email;
                }
       
                  
                    /*Mail::send(array(), array(), function ($message) use ($mail_content) {

                      $message->to($mail_content['email'])
                        ->subject('Dead Line Remainder')
                        ->setBody(nl2br($mail_content['html']), 'text/html');
                    });*/
            }
        }
        
        //after remainder
        $after_date = date('Y-m-d', strtotime('-2 days'));
        $afterdata = CartExperiencesToTourStatuses::selectRaw('cart_experiences_to_tour_statuses.cart_experiences_id,cart_experiences.carts_id')->leftjoin("cart_experiences","cart_experiences.id","=","cart_experiences_to_tour_statuses.cart_experiences_id")->where('cart_experiences_to_tour_statuses.tour_statuses_id','1')->where('cart_experiences_to_tour_statuses.completed','0')->whereRaw("cart_experiences_to_tour_statuses.due_date like '%".$after_date."%'")->get();
        //pr($afterdata);
        if(!empty($afterdata[0]))
        {
            foreach($afterdata as $row)
            {
                $id = $row->cart_experiences_id;
                $cart_experience = CartExperience::with('experiencesToHotelsToExperienceDate')->where("id", $id)->first();
                if(!empty($cart_experience))
                {
                    $cartExeToTour = 

DB::table('cart_experiences_to_tour_statuses')->where("cart_experiences_id", $id)->where('tour_statuses_id', '1')->first();
                    $experience = Experience::with(['getCountryAreas'])->where('id' ,$cart_experience->experiences_id)->get()->first();
                    $hotel = array();
                    if(!empty($experience->еxperiencesToHotelsToExperienceDates)){
                        foreach ($experience->еxperiencesToHotelsToExperienceDates as $key => $value) {
                            if(isset($value->experienceDate->dates_rates_id) && $value->experienceDate->dates_rates_id == $cart_experience->dates_rates_id){
                                $hotel[] = $value->hotel;
                            }
                        }
                    }

                    $experienceDates = ExperienceDate::where('dates_rates_id', $cart_experience->dates_rates_id)->where('experiences_id', $cart_experience->experiences_id)->orderBy('date_from','ASC')->get()->toArray();
                    $dates_rates = 

DB::table('experience_dates_rates')->where('id', $cart_experience->dates_rates_id)->first();

                            $cart_detail = 

DB::table('carts')->selectRaw('carts.id,users.name,users.email')->join('users','carts.user_id','=','users.id')->where('carts.id', $row->carts_id)->first();
                             $e_dates = array();
                                if(!empty($experienceDates)){
                                    foreach ($experienceDates as $key => $value) {
                                        if(!empty($value['dates_rates_id'])){

                                            $e_dates['date_from'][] = strtotime($value['date_from']);
                                            $e_dates['date_to'][] = strtotime($value['date_to']);
                                        }
                                    } 
                                }
                                if ( !empty( $e_dates['date_from'] ) ) {
                                    $_dateMin = min($e_dates['date_from']);
                                }else{
                                    $_dateMin = 0 ;
                                }
                                if ( !empty( $e_dates['date_to'] ) ) {
                                     $_dateMax = max($e_dates['date_to']);
                                }else{
                                    $_dateMax = 0 ;
                                }
                               
                                $diff = $_dateMax - $_dateMin; 
                                $nights = round($diff / 86400);

                                $mail_content['html'] = '<html></body>
                                <p>Hello '.$cart_detail->name.',<br/></p>
                                <p>Already 2 days go confirm you booking.</p>
                                <p><b>Tour Name</b> : '.$experience->name.'</p>
                                
                                <p><b>Dates : </b> : '.date('d M Y', $_dateMin).' - '.date('d M Y', $_dateMax).'</p>
                                <p><b>Hotels</b></p>';

                                            $e_dates = array();
                                            if(!empty($experienceDates)){
                                                foreach ($experienceDates as $key => $value) {
                                                    if(!empty($value['dates_rates_id'])){
                                                        $e_dates[$value['dates_rates_id']]['date_from'][] = strtotime($value['date_from']);
                                                        $e_dates[$value['dates_rates_id']]['date_to'][] = strtotime($value['date_to']);
                                                        $e_dates[$value['dates_rates_id']]['date'][] = $value;
                                                    }
                                                }
                                            }
                                            $hotel = array();
                                           

                                            if(!empty($e_dates))
                                            {
                                                foreach ($e_dates as $k => $val) {
                                                    foreach ($val['date'] as $key => $value) {
                                                        if(!empty($experience->еxperiencesToHotelsToExperienceDates)){
                                                            foreach ($experience->еxperiencesToHotelsToExperienceDates as $key2 => $value2) {
                                                                if(isset($value2->experienceDate->id) && $value2->experienceDate->id == $value['id']){
                                                                    $hotel = $value2->hotel;
                                                                    $hotel_date_id = $value2->experienceDate->hotel_date_id;
                                                                    if(!empty($hotel_date_id))
                                                                    {
                                                                        $hotel_date = 

DB::table('hotel_dates')->where('id', $hotel_date_id)->first();
                                                                    }
                                                                    else
                                                                    {
                                                                        //get hotel date
                                                                        $hotel_date = 

DB::table('hotel_dates')->where('hotel_id', $hotel->id)->where('date_in', $value['date_from'])->where('date_out', $value['date_to'])->first();
                                                                    }
                                                                    
                                                                    

                                                                }
                                                            }
                                                        }
                                                        $hotel_name= (!empty($hotel) ? $hotel->name : '');
                                                     
                                                if(isset($value['date_from']) && !empty($value['date_from']) && isset($value['date_to']) && !empty($value['date_to'])){
                                                
                                                    $mail_content['html'] .= '<p><b>'.$hotel_name.' </b><br><b>Date:</b> '.date("D d M", strtotime($value['date_from'])).' - '.date("D d M 'y", strtotime($value['date_to'])).'</p>';
                                                    
                                                    }       
                                            
                                                }
                                                    }
                                            }      
                                        $urlterm = URL('/terms');
                                 // $mail_content['html'] .= '<p>Please check <a target="_blank" href='.$urlterm.'> terms and conditon</a>.</p>';                               
                                $mail_content['html'] .= '</body></html>';
                                
                               $mail_content['html'];
                                $mail_content['email'] = $cart_detail->email;
                }
       
                  
                    /*Mail::send(array(), array(), function ($message) use ($mail_content) {

                      $message->to($mail_content['email'])
                        ->subject('Dead Line Remainder')
                        ->setBody(nl2br($mail_content['html']), 'text/html');
                    });*/
            }
        }

        \Log::info("Cron is working fine!");
     
        /*
           Write your database logic we bellow:
           Item::create(['name'=>'hello new']);
        */
    }
}