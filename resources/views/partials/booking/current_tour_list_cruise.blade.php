
@foreach($items as $key => $item)
           <?php /* @foreach($cartItem->cartExperiences as $item) */?>
                    <?php 
                    
                    if($item->completed == 1){
                        continue;
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
                    if(isset($item->tourStatusesCruise->last()->id)){ 
                        if(isset($_GET['stage']) && !empty($_GET['stage'])){
                            if(optional($item->tourStatusesCruise->last())->percent != $_GET['stage']){
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
                        $hotel_data = get_ship_date($item->id);
                        
                        ?>
                    <div class="middleCol_row openBooking" id="openBooking-{{ $item->id }}" data-id="{{ $item->id }}">
                        <div class="column width_small <?php echo (isset($_GET['ref_no']) && $_GET['ref_no'] == 'yes') ? '' :'hide'; ?>">
                            {{$item->id}}
                        </div>
                        <div class="column width_small <?php echo (isset($_GET['next_step']) && $_GET['next_step'] == 'yes') ? '' :'hide'; ?>">
                             {{ optional($item->tourStatusesCruise->last())->name }}
                        </div>
                        <div class="column width_small <?php echo (isset($_GET['next_step_due']) && $_GET['next_step_due'] == 'yes') ? '' :'hide'; ?>">
                             @if($item->tourStatusesCruise->count() > 0)
                                {{ $diff = Carbon\Carbon::parse(optional($item->tourStatusesCruise->last())->pivot->due_date)->diffForHumans() }}
                            @endif
                        </div>
                        <div class="column <?php echo (isset($_GET['collaborator']) && $_GET['collaborator'] == 'no') ? 'hide' :''; ?> ">
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

                        <div class="column width_small">
                            {{ $hotel_data['nights'] }}
                        </div>

                      <?php /*  <div class="column width_small <?php echo (isset($_GET['tour_no']) && $_GET['tour_no'] == 'no') ? 'hide' :''; ?>">
                            {{get_total_pax($item->id)}}
                        </div>
                        
                        <div class="column width_small centered">
                            <strong>{{ optional($item->tourStatusesCruise->last())->percent-10 }}%</strong> 
                            <span class="line_break">
                                @if(optional($item->tourStatusesCruise->last())->id == 1)
                                 @elseif(optional($item->tourStatusesCruise->last())->id == 2)
                                    Exp Tour Confirmation
                                 @elseif(optional($item->tourStatusesCruise->last())->id == 3)
                                    URL
                                 @elseif(optional($item->tourStatusesCruise->last())->id == 4)
                                    Tracking 1
                                 @elseif(optional($item->tourStatusesCruise->last())->id == 5)
                                    Tracking 2
                                 @elseif(optional($item->tourStatusesCruise->last())->id == 6)
                                    Deposit
                                 @elseif(optional($item->tourStatusesCruise->last())->id == 7)
                                    Tracking 3
                                 @elseif(optional($item->tourStatusesCruise->last())->id == 8)
                                    Guest List
                                 @elseif(optional($item->tourStatusesCruise->last())->id == 9)
                                    Invoice
                                 @elseif(optional($item->tourStatusesCruise->last())->id == 10)
                                    TDS and TP
                                 @elseif(optional($item->tourStatusesCruise->last())->id == 11)
                                    Tour Review
                                 @endif
                                    <!-- Completed -->
                                </span>
                        </div> */?>

                    </div>
                    <?php }else{ ?>
                    <?php } ?>
            <?php /* @endforeach */?>
@endforeach
<script>
                $(".openBooking").bind("click", function(){
                    var cartExperienceId = $(this).data("id");

                    $(".openBooking").removeClass("active");
                    $(this).addClass("active");
                    $(".bookingForm").hide();
                    $("#rightColInfo-"+cartExperienceId).show();

                    // $.fancybox.open($("#bookingFormBox-"+cartExperienceId).html() , {
                    //     closeExisting: true,
                    //     touch: false
                    // });

                });
                /*function myFunction() {
                    // Declare variables
                    var input, filter, ul, li, a, i, txtValue;
                    input = document.getElementById('myInput');
                    filter = input.value.toUpperCase();
                    ul = document.getElementById("myTable");
                    li = ul.getElementsByTagName('tr');

                    // Loop through all list items, and hide those who don't match the search query
                    for (i = 1; i < li.length; i++) {
                        a = li[i].getElementsByTagName("td")[1];
                        txtValue = a.textContent || a.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            li[i].style.display = "";
                        } else {
                            li[i].style.display = "none";
                        }
                    }
                }*/
                function myFunction() {
                    // Declare variables
                    var input, filter, ul, li, a, i, txtValue;
                    input = document.getElementById('myInput');
                    filter = input.value.toUpperCase();
                    ul = document.getElementsByClassName("openBooking");
                    // li = ul.getElementsByTagName('div');

                    // Loop through all list items, and hide those who don't match the search query
                    for (i = 0; i < ul.length; i++) {
                        a = ul[i].getElementsByTagName("div")[4];
                        txtValue = a.textContent || a.innerText;

                        a1 = ul[i].getElementsByTagName("div")[5];
                        txtValue1 = a1.textContent || a1.innerText;

                        a2 = ul[i].getElementsByTagName("div")[6];
                        txtValue2 = a2.textContent || a2.innerText;

                        a3 = ul[i].getElementsByTagName("div")[7];
                        txtValue3 = a3.textContent || a3.innerText;


                        console.log(txtValue.toUpperCase().indexOf(filter));
                        if (txtValue.toUpperCase().indexOf(filter) > -1 || txtValue1.toUpperCase().indexOf(filter) > -1 || txtValue2.toUpperCase().indexOf(filter) > -1 || txtValue3.toUpperCase().indexOf(filter) > -1) {
                            ul[i].style.display = "";
                        } else {
                            ul[i].style.display = "none";
                        }
                    }
                }
                $(".openBooking").bind("click", function(){
                    var cartExperienceId = $(this).data("id");

                    $(".openBooking").removeClass("active");
                    $(this).addClass("active");
                    $(".bookingForm").hide();
                    //$("#rightColInfo-"+cartExperienceId).show();
                    $.ajax({
                       url:"/get_right_col_cruise?id="+cartExperienceId,
                       success:function(data)
                       {
                        $('#rightCol_div').html('');
                        $('#rightCol_div').html(data);
                        $(".bookingForm").show();
                        //$('.loader').hide();
                       }
                      })
                    // $.fancybox.open($("#bookingFormBox-"+cartExperienceId).html() , {
                    //     closeExisting: true,
                    //     touch: false
                    // });

                });
            </script>