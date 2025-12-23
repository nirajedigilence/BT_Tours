<?php
   
namespace App\Console\Commands;
use Dcblogdev\Xero\Facades\Xero;
use Illuminate\Console\Command;
use App\Models\Cms\CartExperiencesToTourStatuses;
use App\Models\Cms\CartExperience;
use App\Models\Cms\Experience;
use App\Models\Cms\ExperienceDate;
use App\Models\Cms\RoomsSupplementsRequest;
use App\Models\Cms\CartExperiencesToRooms;
use App\Models\Cms\CartExperiencesToRoomsRequests;
use App\Models\Cms\CartExperiencesExtraInvoices;
use DB;
use Mail;
class XeroUpdateCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'xero:cron';
    
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
        
        
        
         $cart_experience_data = CartExperience::select('id','carts_id','xero_invoice_id','xero_deposit_invoice_id','xepo_deposit_paid','xepo_invoice_paid')->whereRaw("(xero_invoice_id != '' and xepo_invoice_paid = 0) OR (xero_deposit_invoice_id != '' and xepo_deposit_paid = 0) ")->get();
        
         if(!empty($cart_experience_data))
         {
            foreach($cart_experience_data as $cart_experience)
             {
               // pr($cart_experience);
                $cart_exp_id = $cart_experience->id;
                //update mark as completed deposit
                /*$invoice_status = 

DB::table('cart_experiences_to_tour_statuses')->where("cart_experiences_id", $cart_exp_id)->where('tour_statuses_id', '5')->first();
                if(!empty($invoice_status) && empty($invoice_status->completed))
                {*/
                    if(!empty($cart_experience->xero_deposit_invoice_id))
                    {
                        $invoiceId = $cart_experience->xero_deposit_invoice_id;
                        //view invoice
                        $view = Xero::invoices()->find($invoiceId);

                        if(isset($view['Status']) && $view['Status'] == 'PAID')
                        {
                            $inv_update = array('completed'=>'1');
                            

DB::table('cart_experiences_to_tour_statuses')->where("cart_experiences_id", $cart_exp_id)->where('tour_statuses_id', '5')->update($inv_update);
                            //update cart exp
                            CartExperience::where("id", $cart_experience->id)->update(array('xepo_deposit_paid'=>'1'));


                            //create new status
                            $newStatus = 6;
                            $initial_due_days = config('notification.3rd_tracking_initial_due_days');
                            $date = $cart_experience->date_from;
                             $exists = $cart_experience->tourStatuses()->wherePivot('tour_statuses_id', '=', $newStatus)->exists();
                              $dueDate = date('Y-m-d H:i:s', strtotime($date." ".$initial_due_days." day"));
                                if(!$exists){
                                    $cart_experience->tourStatuses()->attach([
                                        $newStatus => [
                                            'completed' => $newStatus === 11 ? 1 : 0,
                                            'created_at' => date('Y-m-d H:i:s'),
                                            'due_date' => $dueDate
                                        ]
                                    ]);
                                }
                        }
                        
                    }
                /*}*/

                //update mark as completed invoice
                /*$invoice_status = 

DB::table('cart_experiences_to_tour_statuses')->where("cart_experiences_id", $cart_exp_id)->where('tour_statuses_id', '8')->first();
                if(!empty($invoice_status) && empty($invoice_status->completed))
                {*/
                    if(!empty($cart_experience->xero_invoice_id))
                    {
                        $invoiceId = $cart_experience->xero_invoice_id;
                        //view invoice
                        $view = Xero::invoices()->find($invoiceId);
                        if(isset($view['Status']) && $view['Status'] == 'PAID')
                        {
                            $inv_update = array('completed'=>'1');
                            //pr($inv_update);
                            

DB::table('cart_experiences_to_tour_statuses')->where("cart_experiences_id", $cart_exp_id)->where('tour_statuses_id', '8')->update($inv_update);
                            //update cart exp
                            CartExperience::where("id", $cart_experience->id)->update(array('xepo_invoice_paid'=>'1'));
                            //create status
                            $newStatus = 9;
                            $initial_due_days = config('notification.tour_pack_initial_due_days');
                            $date = $cart_experience->date_from;
                            $exists = $cart_experience->tourStatuses()->wherePivot('tour_statuses_id', '=', $newStatus)->exists();
                              $dueDate = date('Y-m-d H:i:s', strtotime($date." ".$initial_due_days." day"));
                                if(!$exists){
                                    $cart_experience->tourStatuses()->attach([
                                        $newStatus => [
                                            'completed' => $newStatus === 11 ? 1 : 0,
                                            'created_at' => date('Y-m-d H:i:s'),
                                            'due_date' => $dueDate
                                        ]
                                    ]);
                                }

                                //update paid room
                                $cartExperiencesToRoomsRequest = CartExperiencesToRooms::with('cartExperiencesToRoomsRequests')->whereIn('room_request_status',['approved'])->where('xero_paid','0')->where("cart_exp_id", $cart_experience->id)->orderBy('date', 'DESC')->get();
                                if(!empty($cartExperiencesToRoomsRequest)){
                                    foreach ($cartExperiencesToRoomsRequest as $key => $value) {
                                        $room_id = $value->room_id;
                                        foreach ($value->cartExperiencesToRoomsRequests as $keyCRR => $valueCRR) {
                                            

                                            if($valueCRR['upgrade_request_sup_status'] == 'accepted' && empty($valueCRR['xero_paid'])){
                                                $roomReqId[]=$valueCRR['id'];
                                            }
                                        }
                                    }
                                }
                            CartExperiencesToRooms::whereIn('room_request_status',['self','approved'])->where("paid", '1')->where("cart_exp_id", $cart_experience->id)->where('xero_paid','0')->update(array('xero_paid'=>'1','invoice_no'=>'1'));
                            //update room supplements
                            if(!empty($roomReqId))
                            {
                                 CartExperiencesToRoomsRequests::whereIn('id',$roomReqId)->where('upgrade_request_sup_status','accepted')->where('xero_paid','0')->update(array('xero_paid'=>'1','invoice_no'=>'1'));
                            }
                           
                            //update upgrade supplements
                            RoomsSupplementsRequest::where('upgrade_request_sup_status','accepted')->where('xero_paid','0')->where("cart_id",  $cart_experience->id)->update(array('xero_paid'=>'1','invoice_no'=>'1'));
                        }
                        
                    }
                /*}*/
             }
             
         }
         
         //update extra
          $cart_extra_invoice = 

DB::table('cart_experiences_extra_invoices')->whereRaw("(xero_invoice_id != '' and mark_as_paid = 0)")->get();

          if(!empty($cart_extra_invoice))
         {
            foreach($cart_extra_invoice as $cart_experience)
             {
                
               // pr($cart_experience);
                $cart_exp_id = $cart_experience->id;
                //update mark as completed deposit
                /*$invoice_status = 

DB::table('cart_experiences_to_tour_statuses')->where("cart_experiences_id", $cart_exp_id)->where('tour_statuses_id', '5')->first();
                if(!empty($invoice_status) && empty($invoice_status->completed))
                {*/
                   
                /*}*/

                //update mark as completed invoice
                /*$invoice_status = 

DB::table('cart_experiences_to_tour_statuses')->where("cart_experiences_id", $cart_exp_id)->where('tour_statuses_id', '8')->first();
                if(!empty($invoice_status) && empty($invoice_status->completed))
                {*/
                    if(!empty($cart_experience->xero_invoice_id))
                    {
                        $invoiceId = $cart_experience->xero_invoice_id;
                        //view invoice
                        $view = Xero::invoices()->find($invoiceId);

                        if(isset($view['Status']) && $view['Status'] == 'PAID')
                        {
                             $cart_extra_invoice_count = 

DB::table('cart_experiences_extra_invoices')->where('cart_exp_id',$cart_experience->id)->whereRaw("(xero_invoice_id != '' and mark_as_paid = 1)")->get()->count();
                            $invoice_no =  !empty($cart_extra_invoice_count)?($cart_extra_invoice_count+2):'2';
                            //update cart exp
                            CartExperiencesExtraInvoices::where("id", $cart_experience->id)->where('mark_as_paid','0')->update(array('mark_as_paid'=>'1'));
                          

                                //update paid room
                                $cartExperiencesToRoomsRequest = CartExperiencesToRooms::with('cartExperiencesToRoomsRequests')->whereIn('room_request_status',['approved'])->where('xero_paid','0')->where("cart_exp_id", $cart_experience->id)->orderBy('date', 'DESC')->get();
                                if(!empty($cartExperiencesToRoomsRequest)){
                                    foreach ($cartExperiencesToRoomsRequest as $key => $value) {
                                        $room_id = $value->room_id;
                                        foreach ($value->cartExperiencesToRoomsRequests as $keyCRR => $valueCRR) {
                                            

                                            if($valueCRR['upgrade_request_sup_status'] == 'accepted' && empty($valueCRR['xero_paid'])){
                                                $roomReqId[]=$valueCRR['id'];
                                            }
                                        }
                                    }
                                }
                            CartExperiencesToRooms::whereIn('room_request_status',['self','approved'])->where("paid", '1')->where("cart_exp_id", $cart_experience->id)->where('xero_paid','0')->update(array('xero_paid'=>'1','invoice_no'=>$invoice_no));
                            //update room supplements
                            if(!empty($roomReqId))
                            {
                                 CartExperiencesToRoomsRequests::whereIn('id',$roomReqId)->where('upgrade_request_sup_status','accepted')->where('xero_paid','0')->update(array('xero_paid'=>'1','invoice_no'=>$invoice_no));
                            }
                           
                            //update upgrade supplements
                            RoomsSupplementsRequest::where('upgrade_request_sup_status','accepted')->where('xero_paid','0')->where("cart_id",  $cart_experience->id)->update(array('xero_paid'=>'1','invoice_no'=>$invoice_no));
                        }
                        
                    }
                /*}*/
             }
            
         }
        
         echo 'Done';
        \Log::info("Cron is working fine!");
     
        /*
           Write your database logic we bellow:
           Item::create(['name'=>'hello new']);
        */
    }
}