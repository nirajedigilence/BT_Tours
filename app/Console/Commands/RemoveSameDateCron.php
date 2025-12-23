<?php
   
namespace App\Console\Commands;
   
use Illuminate\Console\Command;
use App\Models\Cms\CartExperiencesToTourStatuses;
use App\Models\Cms\CartExperience;
use App\Models\Cms\Experience;
use App\Models\Cms\ExperienceDate;
use App\Models\Cms\ExperienceDatesRates;
use App\Models\Cms\ExperiencesToHotelsToExperienceDate;
use DB;
use Mail;
class RemoveSameDateCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'removesamedate:cron';
    
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove same date after 28 days if not finalized';
    
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
        
         // and TIMESTAMPDIFF(MINUTE,experience_dates.unbooked_date,NOW()) == 60
             $experienceDate = ExperienceDate::selectRaw("experience_dates.id,experience_dates.dates_rates_id,experience_dates.sign_name_hc,experience_dates.dates_rates_id,experience_dates.mark_as_completed,experience_dates.unbooked_date,DATEDIFF(CURDATE(),experience_dates.unbooked_date) AS days,TIMESTAMPDIFF(MINUTE,experience_dates.unbooked_date,NOW()) as Minutes,c.id as cart_exp_id")->leftjoin('cart_experiences as c','c.dates_rates_id','=','experience_dates.dates_rates_id')->whereRaw("experience_dates.unbooked = 1 and experience_dates.deleted_at is null")/*->havingRaw('Minutes = 60')*/->orderBy('experience_dates.date_from','ASC')->get();
             //and having =28
             //prd($experienceDate);
             if(!empty($experienceDate))
             {
                foreach($experienceDate as $row)
                {
                    
                    $Date = $row->unbooked_date;
                    //$next_date =  date('Y-m-d H:i:s', strtotime($Date));
                    //$next_date = date('Y-m-d H:i:s', strtotime('+1 hour'));
                    $date1 = date('Y-m-d H:i:s');
                    $date1 = date_create($date1);
                    $date2 = date_create($Date);

                     $dateDays = date_diff($date1, $date2)->format("%m months %d days");
                     $dateMinutes = date_diff($date1, $date2)->format('%i');
                   // echo $dateMinutes;
                    //echo '<br>';
                    if($dateDays == '2 months 29 days')
                    {
                        if(isset($row->dates_rates_id) && !empty($row->dates_rates_id) && empty($row->cart_exp_id)){
                           \Log::info("Remove Same Date=>".$row->id);
                            $experience_dates_rates_id = $row->dates_rates_id;
                            ExperienceDatesRates::where('id', $experience_dates_rates_id)->delete();
                            $experienceDates = ExperienceDate::where('dates_rates_id',$experience_dates_rates_id)->orderBy('date_from','ASC')->get()->toArray();
                            if(!empty($experienceDates)){
                                ExperienceDate::where('dates_rates_id', $experience_dates_rates_id)->delete();
                                foreach ($experienceDates as $key => $value) {
                                    ExperiencesToHotelsToExperienceDate::where('experience_dates_id', $value['id'])->delete();
                                }
                            
                            }
                        }
                    }
                    
                }
             }
        \Log::info("Remove Same Date New Cron is working fine!");
     
        /*
           Write your database logic we bellow:
           Item::create(['name'=>'hello new']);
        */
    }
}