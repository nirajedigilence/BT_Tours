@foreach($items as $key => $item)
                       <?php /* @foreach($cartItem->cartExperiences as $item) */?>
                                <?php 
                                $cartExeToInvoice = 


DB::connection('mysql_veenus')->table('cart_experiences_to_tour_statuses')->where("cart_experiences_id", $item->id)->where('tour_statuses_id', '8')->where('completed', '1')->first();
                                $cart_extra_invoice = 


DB::connection('mysql_veenus')->table('cart_experiences_extra_invoices')->where("cart_exp_id", $item->id)->where('sent_to_finance','1')->first();
                                $cartExeToDeposit = 


DB::connection('mysql_veenus')->table('cart_experiences_to_tour_statuses')->where("cart_experiences_id", $item->id)->where('tour_statuses_id', '5')->where('completed', '1')->first(); 
                                $explamatary = 0;
                                if(!empty($item->xero_deposit_invoice_id) || !empty($cartExeToDeposit))
                                {}
                                else{
                                    if(!empty($item->deposit_invoice_sent_finance))
                                    { $explamatary = 1;}      
                                }
                                      
                                if(!empty($cart_extra_invoice) && empty($cart_extra_invoice->xero_invoice_id)){}
                                else{
                                    if(!empty($cart_extra_invoice->xero_invoice_id) && empty($cart_extra_invoice->mark_as_paid))
                                    {
                                        $explamatary = 1;
                                    }
                                }
                                if(empty($cart_extra_invoice))
                                {
                                    if(!empty($item->xero_invoice_id) || !empty($cartExeToInvoice))
                                    {}
                                    else
                                    {
                                        if(!empty($item->invoice_sent_finance))
                                        {
                                            $explamatary = 1;
                                        }      
                                    }
                                }
                                else
                                {
                                    if(!empty($cart_extra_invoice) && empty($cart_extra_invoice->xero_invoice_id))
                                    {
                                        $explamatary = 1;
                                    }
                                }
                                
                                if(!empty($history_page))
                                {
                                    if($item->completed == 0){
                                        continue;
                                    }
                                }
                                else
                                {
                                    if($item->completed == 1){
                                        continue;
                                    }
                                }
                                if(isset($_GET['need_action']) && $_GET['need_action'] == 'yes'){
                                    if(empty($explamatary))
                                    {
                                        continue;
                                    }
                                }
                                //calculate total booked people
                                $cartExperiencesToRooms = App\Models\Cms\CartExperiencesToRooms::with('cartExperiencesToRoomsRequests')->whereIn('room_request_status',['self'])->where("cart_exp_id", $item->id)->get();

                                $rooms_ppl = 0;
                                $rooms_sold = 0;
                                foreach ($cartExperiencesToRooms as $key => $value) {
                                    if($value->paid == 1 || $value->deposit == 1){
                                        // $rooms_ppl = $rooms_ppl+1;
                                        $rooms_sold = $rooms_sold+1;
                                        if(!empty($value->names)){
                                            $names = array_filter(explode(',', $value->names));
                                            $rooms_ppl  = $rooms_ppl+count($names);
                                        }
                                    }
                                }
                                // tracking 1,2,3 add due date
                                $initial_due_days[3] = config('notification.1st_tracking_initial_due_days');
                                $initial_due_days[4] = config('notification.2nd_tracking_initial_due_days');
                                $initial_due_days[6] = config('notification.3rd_tracking_initial_due_days');
                                if(!empty($initial_due_days)){
                                    foreach ($initial_due_days as $status => $initdays) {
                                    
                                        $dueDate = date('Y-m-d H:i:s', strtotime($item->date_from." ".$initdays." day"));
                                        $due = strtotime($item->date_from." ".$initdays." day");
                                        $today = strtotime(date('Y-m-d'));
                                        $checkTourStatuses = 


DB::connection('mysql_veenus')->table('cart_experiences_to_tour_statuses')->where('cart_experiences_id', $item->id)->where('tour_statuses_id', $status)->first();
                                        $checkTourStatusesURL = 


DB::connection('mysql_veenus')->table('cart_experiences_to_tour_statuses')->where('cart_experiences_id', $item->id)->where('tour_statuses_id','2')->first();
                                        if(!empty($checkTourStatusesURL->completed))
                                        {
                                            /*if(empty($checkTourStatuses) && $today >= $due){
                                                    


DB::connection('mysql_veenus')->table('cart_experiences_to_tour_statuses')->insert([
                                                        'tour_statuses_id' => $status,
                                                        'cart_experiences_id' => $item->id,
                                                        'created_at' => date('Y-m-d H:i:s'),
                                                        'due_date' => $dueDate
                                                    ]);
                                                }*/
                                        }
                                        
                                    }
                                }
                                // end tracking 1,2,3 add due date


                                if($item->cancel_status == 1){
                                    continue;
                                }
                                /*$cancellation_days = array(0); 
                                if(!empty($item->dates_rates_id)){
                                    $experience_dates = 


DB::connection('mysql_veenus')->table('experience_dates')->where('dates_rates_id', $item->dates_rates_id)->where('experiences_id', $item->experiences_id)->where('deleted_at', null)->get()->toArray();
                                    
                                    if(!empty($experience_dates)){
                                        foreach ($experience_dates as $key => $value) {
                                            $cancellation_days[] = $value->cancellation_days;
                                        }
                                    }
                                }*/
                                $cancellation_days = array(0); 
               
                                if(!empty($item->experiences_id)){
                                    $experience_dates = 


DB::connection('mysql_veenus')->table('experiences')->where('id', $item->experiences_id)->where('deleted_at', null)->get()->toArray();
                                    
                                    if(!empty($experience_dates)){
                                        foreach ($experience_dates as $key => $value) {
                                            $cancellation_days[] = $value->can_deadline;
                                        }
                                    }
                                }
                                if(isset($item->tourStatuses->last()->id)){ 
                                    if(isset($_GET['stage']) && !empty($_GET['stage'])){
                                        if(optional($item->tourStatuses->last())->percent != $_GET['stage']){
                                            continue;
                                        }
                                    }
                                    if(isset($_GET['month']) && !empty($_GET['month'])){
                                        $month = date('m',strtotime($item['date_from']));
                                        if($month != $_GET['month']){
                                            continue;
                                        }
                                    }
                                    if(isset($_GET['date_from']) && !empty($_GET['date_from']) && isset($_GET['date_to']) && !empty($_GET['date_to'])){
                                        $filter_from_date = strtotime(str_replace('/', '-', $_GET['date_from']));
                                        $date_from = strtotime($item['date_from']);
                                        $filter_from_to = strtotime(str_replace('/', '-', $_GET['date_to']));
                                        if($filter_from_date > $date_from || $filter_from_to < $date_from){
                                            continue;
                                        }
                                    }
                                    $experiences = 


DB::connection('mysql_veenus')->table('experiences')->where('id', $item->experiences_id)->first();
                                    $experiencesToAttr = 


DB::connection('mysql_veenus')->table('experiences_to_attractions')->where('experiences_id', $item->experiences_id)->get()->toArray();
                                    $experience_names = array();
                                    if(!empty($experiencesToAttr)){
                                        foreach ($experiencesToAttr as $key => $value) {
                                            $attractions = 


DB::connection('mysql_veenus')->table('attractions')->where('id', $value->attractions_id)->first();
                                            if(!empty($attractions)){
                                                $experience_names[] = $attractions->name;
                                            }
                                        }
                                    }
                                    $hotel_data = get_hotel_date($item->id);
                                    ?>
                                 <div class="middleCol_row openBooking" id="openBooking-{{ $item->id }}" data-id="{{ $item->id }}">
                                    <div class="column width_small <?php echo (isset($_GET['ref_no']) && $_GET['ref_no'] == 'no') ? 'hide' :''; ?>" style="min-width: 10%;">
                                        {{$item->id}}
                                    </div>
                                    <div class="column width_small <?php echo (isset($_GET['next_step']) && $_GET['next_step'] == 'yes') ? '' :'hide'; ?>">
                                         {{ optional($item->tourStatuses->last())->name }}
                                    </div>
                                    <div class="column width_small <?php echo (isset($_GET['next_step_due']) && $_GET['next_step_due'] == 'yes') ? '' :'hide'; ?>">
                                         @if($item->tourStatuses->count() > 0)
                                            {{ $diff = Carbon\Carbon::parse(optional($item->tourStatuses->last())->pivot->due_date)->diffForHumans() }}
                                        @endif
                                    </div>
                                    <div class="column <?php echo (isset($_GET['collaborator']) && $_GET['collaborator'] == 'no') ? 'hide' :''; ?>">
                                       {{ isset($item->colobratorName) ? $item->colobratorName : '-' }}
                                    </div>
                                    <div class="column <?php echo (isset($_GET['experience']) && $_GET['experience'] == 'yes') ? '' :'hide'; ?>">
                                        {{ implode(', ',$experience_names)}}
                                    </div>
                                    <div class="column bold">
                                        {{ $item->experience_name }}
                                    </div>

                                    <div class="column <?php echo (isset($_GET['hotel']) && $_GET['hotel'] == 'no') ? 'hide' :''; ?>">
                                        {{ $hotel_data['hotel_name'] }}
                                    </div>

                                    <div class="column">
                                        {{ $hotel_data['date_from'] }} - {{ $hotel_data['date_to'] }}
                                    </div>

                                    <!-- <div class="column width_small">
                                        {{ $item->nights }}
                                    </div>

                                    <div class="column width_small <?php echo (isset($_GET['tour_no']) && $_GET['tour_no'] == 'no') ? 'hide' :''; ?>">
                                        {{$rooms_ppl}}
                                    </div> -->
                                    
                                    <div class="column width_small centered">
                                        <strong>{{ optional($item->tourStatuses->last())->percent-10 }}%</strong> 
                                        <span class="line_break">
                                            @if(optional($item->tourStatuses->last())->id == 1)
                                             @elseif(optional($item->tourStatuses->last())->id == 2)
                                                Exp Tour Confirmation
                                             @elseif(optional($item->tourStatuses->last())->id == 3)
                                                URL
                                             @elseif(optional($item->tourStatuses->last())->id == 4)
                                                Tracking 1
                                             @elseif(optional($item->tourStatuses->last())->id == 5)
                                                Tracking 2
                                             @elseif(optional($item->tourStatuses->last())->id == 6)
                                                Deposit
                                             @elseif(optional($item->tourStatuses->last())->id == 7)
                                                Tracking 3
                                             @elseif(optional($item->tourStatuses->last())->id == 8)
                                                Guest List
                                             @elseif(optional($item->tourStatuses->last())->id == 9)
                                                Invoice
                                             @elseif(optional($item->tourStatuses->last())->id == 10)
                                                Tour Pack
                                             @elseif(optional($item->tourStatuses->last())->id == 11)
                                                Tour Review
                                             @endif
                                                <!-- Completed -->
                                            </span>
                                    </div>
                                    <div class="column width_small">
                                        
                                       @if(!empty($item->xero_deposit_invoice_id) || !empty($cartExeToDeposit))
                                        <img src="{{ asset('images/squtick.png') }}" alt="Veenus">
                                        @else
                                         @if(!empty($item->deposit_invoice_sent_finance))
                                                <img src="{{ asset('images/exlematory.png') }}" alt="Veenus">
                                            @else
                                                <img src="{{ asset('images/cronss.png') }}" alt="Veenus">
                                            @endif
                                       @endif
                                    </div>
                                    <div class="column width_small">
                                      
                                      @if(!empty($cartExeToDeposit))
                                        <img src="{{ asset('images/squtick.png') }}" alt="Veenus">
                                        @else
                                        <img src="{{ asset('images/cronss.png') }}" alt="Veenus">
                                       @endif
                                    </div>
                                    <div class="column width_small">
                                    @if(empty($cart_extra_invoice))
                                       @if(!empty($item->xero_invoice_id) || !empty($cartExeToInvoice))
                                        <img src="{{ asset('images/squtick.png') }}" alt="Veenus">
                                        @else
                                            @if(!empty($item->invoice_sent_finance))
                                                <img src="{{ asset('images/exlematory.png') }}" alt="Veenus">
                                            @else
                                                <img src="{{ asset('images/cronss.png') }}" alt="Veenus">
                                            @endif
                                       @endif
                                    @else
                                        @if(!empty($cart_extra_invoice) && empty($cart_extra_invoice->xero_invoice_id))
                                            <img src="{{ asset('images/exlematory.png') }}" alt="Veenus">
                                        @else
                                            <img src="{{ asset('images/squtick.png') }}" alt="Veenus">
                                        @endif
                                    @endif
                                    </div>
                                    <div class="column width_small">
                                        <?php  ?>
                                       @if(empty($cart_extra_invoice))
                                           @if(!empty($item->xero_invoice_id) && !empty($item->xepo_invoice_paid))
                                            <img src="{{ asset('images/squtick.png') }}" alt="Veenus">
                                            @else
                                            <img src="{{ asset('images/cronss.png') }}" alt="Veenus">
                                           @endif
                                        @else
                                            @if(!empty($cart_extra_invoice) && empty($cart_extra_invoice->xero_invoice_id))
                                                <img src="{{ asset('images/cronss.png') }}" alt="Veenus">
                                            @else
                                                 @if(!empty($cart_extra_invoice->xero_invoice_id) && empty($cart_extra_invoice->mark_as_paid))
                                                    <img src="{{ asset('images/exlematory.png') }}" alt="Veenus">
                                                @else
                                                    <img src="{{ asset('images/squtick.png') }}" alt="Veenus">
                                                 @endif
                                            @endif
                                        @endif
                                      
                                    </div>
                                </div>
                                <?php }else{ ?>
                                <?php } ?>
                        <?php /* @endforeach */?>
            @endforeach