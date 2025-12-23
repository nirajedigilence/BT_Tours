
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
<script src="{{ asset('js/popper.min.js') }}"></script> 
<script src="{{ asset('js/bootstrap.min.js') }}"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
<script src="https://superal.github.io/canvas2image/canvas2image.js"></script>  
<style type="text/css" media="screen">
    li.active {
        background: #eeeeee !important;
    }
    .blueBCancelBtn{
        background-color: #14213D;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        display: inline-block;
        width: auto;
    }
    .orangeBTourCancelBtn{
        background-color: #FCA311;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        display: inline-block;
        width: auto;
    }        
</style>    
<div class="middleCol completedBooking" id="middleCol">
    @if(Session::has('success'))
        <div class="alert alert-success">
            {!! session('success') !!}
        </div>

        <script>
            $.ajaxSetup({ headers: {'X-CSRF-TOKEN': '{{csrf_token()}}'}});
            $.ajax({
                type: "GET",
                cache: false,
                url: '{{ route('bookings-complete') }}',
                success: function (data) {
                    // on success, post (preview) returned data in fancybox
                    /*$.fancybox.open(data, {
                        autoSize: false,
                        fitToView : false,
                        width: "70%",
                        height: "90%",
                        minWidth: 300,
                        touch: false,
                        afterLoad: function(){
                            $("#goToBookingsButton").click(function(e){
                                e.preventDefault();
                                $.fancybox.close(true);
                                $('html, body').animate({
                                    scrollTop: $("#middleCol").offset().top
                                }, 500);
                            });
                        }
                    });*/
                },
                error: function(er){
                    //console.log(er);
                }
            });
        </script>

    @elseif(Session::has('error'))
        <div class="alert alert-danger">
            {!! session('error') !!}
        </div>
    @endif
	
	
    <div class="_contentBooking">
        <div class="main_content_nav">

            <div class="filters">

                <div class="filters_dropdown">

                    <div class="cta">
                        Filters
                    </div>

                    <div class="dropdown">
                        <form action="{{ route('account-collaborator') }}" id="filterForm">
                            <input type="hidden" name="stage" id="stage" value="<?php echo isset($_GET['stage']) ? $_GET['stage'] : '' ?>" >
                            <input type="hidden" name="sort_column_name" id="sort_column_name">
                            <input type="hidden" name="sort_type" id="sort_type">
                            <input type="hidden" name="ref_no" id="ref_no" value="<?php echo isset($_GET['ref_no']) ? $_GET['ref_no'] : 'no' ?>">
                            <input type="hidden" name="next_step" id="next_step" value="<?php echo isset($_GET['next_step']) ? $_GET['next_step'] : 'no' ?>">
                            <input type="hidden" name="next_step_due" id="next_step_due" value="<?php echo isset($_GET['next_step_due']) ? $_GET['next_step_due'] : 'no' ?>">
                            <input type="hidden" name="collaborator" id="collaborator" value="<?php echo isset($_GET['collaborator']) ? $_GET['collaborator'] : 'no' ?>">
                            <input type="hidden" name="experience" id="experience" value="<?php echo isset($_GET['experience']) ? $_GET['experience'] : 'no' ?>">
                            <input type="hidden" name="hotel" id="hotel" value="<?php echo isset($_GET['hotel']) ? $_GET['hotel'] : 'yes' ?>">
                            <input type="hidden" name="tour_no" id="tour_no" value="<?php echo isset($_GET['tour_no']) ? $_GET['tour_no'] : 'yes' ?>">

                            <div class="dropdown_section">

                                <div class="heading">
                                    By Booking Stage
                                </div>

                                <div class="by_booking_stages">
                                    <?php
                                    $stage = '';
                                    if(isset($_GET['stage']) && !empty($_GET['stage'])){
                                        $stage = $_GET['stage'];
                                    }
                                    ?>
                                    <a href="javascript:;" class="stage <?php echo ($stage == 10) ? 'active' : ''; ?>" data-stage="10">
                                        <div class="percentage">10%</div>
                                        <div class="line"></div>
                                        <div class="label">Exp Tour Confirmation</div>
                                    </a>

                                    <a href="javascript:;" class="stage <?php echo ($stage == 20) ? 'active' : ''; ?>" data-stage="20">
                                        <div class="percentage">20%</div>
                                        <div class="line"></div>
                                        <div class="label">URL</div>
                                    </a>

                                    <a href="javascript:;" class="stage <?php echo ($stage == 30) ? 'active' : ''; ?>" data-stage="30">
                                        <div class="percentage">30%</div>
                                        <div class="line"></div>
                                        <div class="label">Tracking 1</div>
                                    </a>

                                    <a href="javascript:;" class="stage <?php echo ($stage == 40) ? 'active' : ''; ?>" data-stage="40">
                                        <div class="percentage">40%</div>
                                        <div class="line"></div>
                                        <div class="label">Tracking 2</div>
                                    </a>

                                    <a href="javascript:;" class="stage <?php echo ($stage == 50) ? 'active' : ''; ?>" data-stage="50">
                                        <div class="percentage">50%</div>
                                        <div class="line"></div>
                                        <div class="label">Deposit</div>
                                    </a>

                                    <a href="javascript:;" class="stage <?php echo ($stage == 60) ? 'active' : ''; ?>" data-stage="60">
                                        <div class="percentage">60%</div>
                                        <div class="line"></div>
                                        <div class="label">Tracking 3</div>
                                    </a>

                                    <a href="javascript:;" class="stage <?php echo ($stage == 70) ? 'active' : ''; ?>" data-stage="70">
                                        <div class="percentage">70%</div>
                                        <div class="line"></div>
                                        <div class="label">Guest list</div>
                                    </a>

                                    <a href="javascript:;" class="stage <?php echo ($stage == 80) ? 'active' : ''; ?>" data-stage="80">
                                        <div class="percentage">80%</div>
                                        <div class="line"></div>
                                        <div class="label">Invoice</div>
                                    </a>

                                    <a href="javascript:;" class="stage <?php echo ($stage == 90) ? 'active' : ''; ?>" data-stage="90">
                                        <div class="percentage">90%</div>
                                        <div class="line"></div>
                                        <div class="label">Tour pack</div>
                                    </a>

                                    <a href="javascript:;" class="stage <?php echo ($stage == 100) ? 'active' : ''; ?>" data-stage="100">
                                        <div class="percentage">100%</div>
                                        <div class="line"></div>
                                        <div class="label">Tour review</div>
                                    </a>

                                </div>

                            </div>

                            <div class="dropdown_section">

                                <div class="heading">
                                    By Date
                                </div>

                                <div class="by_date">

                                    <div class="field">
                                        <div class="label">By Month</div>
                                        <select name="month" id="month">
                                            <option value="">---</option>
                                            <option value="01" <?php echo (isset($_GET['month']) && ($_GET['month'] == '01') ? 'selected' : ''); ?>>January</option>
                                            <option value="02" <?php echo (isset($_GET['month']) && ($_GET['month'] == '02') ? 'selected' : ''); ?>>February</option>
                                            <option value="03" <?php echo (isset($_GET['month']) && ($_GET['month'] == '03') ? 'selected' : ''); ?>>March</option>
                                            <option value="04" <?php echo (isset($_GET['month']) && ($_GET['month'] == '04') ? 'selected' : ''); ?>>April</option>
                                            <option value="05" <?php echo (isset($_GET['month']) && ($_GET['month'] == '05') ? 'selected' : ''); ?>>May</option>
                                            <option value="06" <?php echo (isset($_GET['month']) && ($_GET['month'] == '06') ? 'selected' : ''); ?>>June</option>
                                            <option value="07" <?php echo (isset($_GET['month']) && ($_GET['month'] == '07') ? 'selected' : ''); ?>>July</option>
                                            <option value="08" <?php echo (isset($_GET['month']) && ($_GET['month'] == '08') ? 'selected' : ''); ?>>August</option>
                                            <option value="09" <?php echo (isset($_GET['month']) && ($_GET['month'] == '09') ? 'selected' : ''); ?>>September</option>
                                            <option value="10" <?php echo (isset($_GET['month']) && ($_GET['month'] == '10') ? 'selected' : ''); ?>>October</option>
                                            <option value="11" <?php echo (isset($_GET['month']) && ($_GET['month'] == '11') ? 'selected' : ''); ?>>November</option>
                                            <option value="12" <?php echo (isset($_GET['month']) && ($_GET['month'] == '12') ? 'selected' : ''); ?>>December</option>
                                        </select>
                                    </div>

                                    <div class="field">
                                        <div class="label">Date From</div>
                                        <div class="input_wrapper">
                                            <input type="date" name="date_from" id="date_from" placeholder="dd/mm/yyyy" value="<?php echo (isset($_GET['date_from']) ? $_GET['date_from'] : ''); ?>">
                                            <!-- <div class="icon"></div> -->
                                        </div>
                                    </div>

                                    <div class="field">
                                        <div class="label">Date Until</div>
                                        <div class="input_wrapper">
                                            <input type="date" name="date_to" id="date_to" placeholder="dd/mm/yyyy" value="<?php echo (isset($_GET['date_to']) ? $_GET['date_to'] : ''); ?>">
                                            <!-- <div class="icon"></div> -->
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="dropdown_section">

                                <div class="heading">
                                    Other Filters
                                </div>

                                <div class="other_filters">

                                    
                                    <a href="javascript:;" class="option refnoClick <?php echo (isset($_GET['ref_no']) && $_GET['ref_no'] == 'yes') ? 'active' :''; ?>">
                                        Ref no.
                                    </a>

                                    <a href="javascript:;" class="option nextstepClick <?php echo (isset($_GET['next_step']) && $_GET['next_step'] == 'yes') ? 'active' :''; ?>">
                                        Next Step
                                    </a>
                                    <a href="javascript:;" class="option nextstepdueClick <?php echo (isset($_GET['next_step_due']) && $_GET['next_step_due'] == 'yes') ? 'active' :''; ?>">
                                        Next Step Due
                                    </a>


                                    <a href="javascript:;" class="option expClick <?php echo (isset($_GET['experience']) && $_GET['experience'] == 'yes') ? 'active' :''; ?>">
                                        Experience
                                    </a>

                                    <a href="javascript:;" class="option <?php echo (isset($_GET['hotel']) && $_GET['hotel'] == 'no') ? '' :'active'; ?> hotelnameClick">
                                        Hotel
                                    </a>

                                    <a href="javascript:;" class="option <?php echo (isset($_GET['tour_no']) && $_GET['tour_no'] == 'no') ? '' :'active'; ?> tournoClick">
                                        Tour Numbers
                                    </a>


                                </div>
                                <input type="submit" class="btn btn-warning" name="submit" value="Filter" style="float: right;color: #fff;font-weight: bold;background:orange;border: orange;" id="submitBtn">
                            
                            </div>

                        </form>
                    </div>
                </div>

                <ul class="active_filters">
                    <li class="label">Active filters:<br>
                        <a href="{{ route('account-collaborator') }}" style="color: orange;font-weight: normal;text-decoration: underline !important;float: left;">reset</a>
                    </li>
                    <?php if(isset($_GET['stage']) && !empty($_GET['stage'])){ ?>
                        <li>Stage <a href="javascript:;" id="stageRemove"><span>x</span></a></li>
                    <?php } ?>
                    <?php if(isset($_GET['date_from']) && !empty($_GET['date_from'])){ ?>
                        <li>Date <a href="javascript:;" id="dateRemove"><span>x</span></a></li>
                    <?php } ?>
                    <?php if(isset($_GET['month']) && !empty($_GET['month'])){ ?>
                        <li>Month <a href="javascript:;" id="monthRemove"><span>x</span></a></li>
                    <?php } ?>
                    <?php if(isset($_GET['tour_no']) && $_GET['tour_no'] == 'no'){ ?>
                    <?php }else{ ?>
                        <li>Tour Numbers <a href="javascript:;" id="tournoRemove"><span>x</span></a></li>
                    <?php } ?>
                    <?php if(isset($_GET['hotel']) && $_GET['hotel'] == 'no'){ ?>
                    <?php }else{ ?>
                        <li>Hotel <a href="javascript:;" id="hotelRemove"><span>x</span></a></li>
                    <?php } ?>
                    <?php if(isset($_GET['ref_no']) && $_GET['ref_no'] == 'yes'){ ?>
                        <li>Ref No. <a href="javascript:;" id="refnoRemove"><span>x</span></a></li>
                    <?php } ?>
                    <?php if(isset($_GET['next_step']) && $_GET['next_step'] == 'yes'){ ?>
                        <li>Next Step <a href="javascript:;" id="nextRemove"><span>x</span></a></li>
                    <?php } ?>
                    <?php if(isset($_GET['next_step_due']) && $_GET['next_step_due'] == 'yes'){ ?>
                        <li>Next Step Due <a href="javascript:;" id="nextdueRemove"><span>x</span></a></li>
                    <?php } ?>
                    <?php if(isset($_GET['collaborator']) && $_GET['collaborator'] == 'yes'){ ?>
                        <li>Collaborator <a href="javascript:;" id="collRemove"><span>x</span></a></li>
                    <?php } ?>
                    <?php if(isset($_GET['experience']) && $_GET['experience'] == 'yes'){ ?>
                        <li>Experience <a href="javascript:;" id="expRemove"><span>x</span></a></li>
                    <?php } ?>
                    
                    
                </ul>

            </div>

            <div class="search">

                <div class="search__input">
                    <input type="text" id="myInput" value="<?=!empty($search_txt)?$search_txt:''?>" onkeyup="myFunction()" placeholder="Search">
                    <button type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>

            </div>

        </div>
        <style type="text/css">
            .openBooking.active {
                background: #F3F3F3;
                border-right: none !important;
            }
        </style>
        <div class="middleCol_row header">

                <div class="column width_small <?php echo (isset($_GET['ref_no']) && $_GET['ref_no'] == 'yes') ? '' :'hide'; ?>" >
                    Ref No 
                </div>
                <div class="column width_small <?php echo (isset($_GET['next_step']) && $_GET['next_step'] == 'yes') ? '' :'hide'; ?>">
                    Next Step
                </div>
                <div class="column width_small <?php echo (isset($_GET['next_step_due']) && $_GET['next_step_due'] == 'yes') ? '' :'hide'; ?>">
                    Next Step Due
                </div>
                <div class="sorting column <?php echo (isset($_GET['collaborator']) && $_GET['collaborator'] == 'yes') ? '' :'hide'; ?>"  data-sorting_type="desc" data-column_name="colobratorName" style="cursor: pointer">
                    Collaborator <span class="sort-sp" id="colobratorName_icon"><i class="fa fa-sort" aria-hidden="true"></i></span>
                </div>

                <div class="column <?php echo (isset($_GET['experience']) && $_GET['experience'] == 'yes') ? '' :'hide'; ?>">
                    Experience 

                </div>
                <div class="sorting column" data-sorting_type="desc" data-column_name="experience_name" style="cursor: pointer">
                    Name <span class="sort-sp" id="experience_name_icon"><i class="fa fa-sort" aria-hidden="true"></i></span>

                </div>

                <div class="sorting column <?php echo (isset($_GET['hotel']) && $_GET['hotel'] == 'no') ? 'hide' :''; ?>" data-sorting_type="desc" data-column_name="hotel_name" style="cursor: pointer">
                    Hotel Name <span class="sort-sp" id="hotel_name_icon"><i class="fa fa-sort" aria-hidden="true"></i></span>
                </div>

                <div class="sorting column" data-sorting_type="desc" data-column_name="date_from" style="cursor: pointer">
                    Date <span class="sort-sp" id="date_from_icon"><i class="fa fa-sort" aria-hidden="true"></i></span>
                </div>
                <div class="sorting column width_small" data-sorting_type="desc" data-column_name="nights" style="cursor: pointer">
                    Night <span class="sort-sp" id="nights_icon"><i class="fa fa-sort" aria-hidden="true"></i></span>
                </div>
                <div class="column width_small <?php echo (isset($_GET['tour_no']) && $_GET['tour_no'] == 'no') ? 'hide' :''; ?>">
                    PAX
                </div>

                <div class="column width_small">
                    Tour Status
                </div>
                
            </div>
         <div id="ctour_list">
            <?php $i =1; ?>
            @foreach($items as $key => $cartItem)
            <?php 
            
            /*$array_col = array_column($cartItem->cartExperiences, 'date_from');
            array_multisort($array_col, SORT_ASC, $cartItem->cartExperiences);*/
           /* $col  = 'date_from';
            $sort = array();
            foreach ($cartItem->cartExperiences as $i => $obj) {
                echo $obj['date_from'];
              $sort[$i] = $obj->date_from;
            }
            prd($sort);*/
            //$sorted_db = array_multisort($sort, SORT_ASC, $cartItem->cartExperiences);
            ?>
                @foreach($cartItem->cartExperiences as $item)
                <?php
                if($item->completed == 1){
                    continue;
                }
                if($item->cancel_status == 1){
                    continue;
                }
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
                    $date_from = strtotime($item->date_from);
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
                $carts = 


DB::connection('mysql_veenus')->table('carts')->where('id', $item->carts_id)->first();
                $users = '';
                if(!empty($carts)){
                    $users = 


DB::connection('mysql_veenus')->table('users')->where('id', $carts->user_id)->first();
                }

                //calculate total booked people
                $cartExperiencesToRooms = App\Models\Cms\CartExperiencesToRooms::with('cartExperiencesToRoomsRequests')->whereIn('room_request_status',['self','approved'])->where("cart_exp_id", $item->id)->get();

                $rooms_ppl = 0;
                $rooms_sold = 0;
                foreach ($cartExperiencesToRooms as $key => $value) {
                    if($value->paid == 1 || $value->deposit == 1){
                         //$rooms_ppl = $rooms_ppl+1;
                        $rooms_sold = $rooms_sold+1;
                        if(!empty($value->names)){
                            $names = array_filter(explode(',', $value->names));
                            $rooms_ppl  = $rooms_ppl+count($names);
                        }
                    }
                }
               // $dates_rates = 


DB::connection('mysql_veenus')->table('experience_dates_rates')->where('id', $item->dates_rates_id)->first();
                $hotel_data = get_hotel_date($item->id);
                ?>
                        <div class="middleCol_row openBooking" id="openBooking-{{ $item->id }}" data-id="{{ $item->id }}">

                            <div class="column width_small <?php echo (isset($_GET['ref_no']) && $_GET['ref_no'] == 'yes') ? '' :'hide'; ?>">
                                {{ !empty($item->id)?$item->id:'' }}
                            </div>
                            <div class="column width_small <?php echo (isset($_GET['next_step']) && $_GET['next_step'] == 'yes') ? '' :'hide'; ?>">
                                 {{ optional($item->tourStatuses->last())->name }}
                            </div>
                            <div class="column width_small <?php echo (isset($_GET['next_step_due']) && $_GET['next_step_due'] == 'yes') ? '' :'hide'; ?>">
                                 @if($item->tourStatuses->count() > 0)
                                    {{ $diff = Carbon\Carbon::parse(optional($item->tourStatuses->last())->pivot->due_date)->diffForHumans() }}
                                @endif
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

                            <div class="column width_small <?php echo (isset($_GET['tour_no']) && $_GET['tour_no'] == 'no') ? 'hide' :''; ?>">
                                {{$rooms_ppl}}
                            </div>
                            
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

                        </div>
                        
                @endforeach
            @endforeach
        </div> <!-- End  ctour_list-->
        <div class="tableWrapper drag">
            
            <script>
                <?php if(!empty($search_txt)){
                    ?>
                    myFunction();
                    <?php 
                } ?>
               $(".openBooking").bind("click", function(){
                    var cartExperienceId = $(this).data("id");

                    $(".openBooking").removeClass("active");
                    $(this).addClass("active");
                    $(".bookingForm").hide();
                    //$("#rightColInfo-"+cartExperienceId).show();
                    $.ajax({
                       url:"/get_right_col?id="+cartExperienceId,
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
            </script>
        </div>

    </div>
    <div style="display: none;">
        <div class="tourOverviewModal" id="tourOverviewModalCancel">
            <div class="tourOverviewCont">
                <div class="modalHeading">Cancellation Reasons</div>
                <div class="tourContent">
                         {{-- {!! Form::open(array('route' => 'cancellation_reasons.store','method'=>'POST','class'=>'CancellationReasonsFrom','id'=>'CancellationReasonsFrom')) !!} --}}
                    <form method="post" id="CancellationReasonsFrom" class="CancellationReasonsFrom" novalidate="novalidate">
                        <div class="tourContentTitle">
                            Please select Cancellation Reasons
                        </div>
                        <div class="tourContentSelect">
                            <input type="hidden" name="cart_id" class="cancellationReasonsCartId" value="" placeholder="">
                            {{-- <input type="text" name="sdada" class="sdada" value="" placeholder=""> --}}
                            <select name="cancellation_reasons_id" class="cancellation_reasons_id" style="padding: 10px;" required="">
                                <option value="">Select</option>
                                <?php foreach (getCancellationReasons() as $key => $value) { ?>
                                   <option value="<?php echo $value->id;?>"><?php echo $value->name;?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="tourContentSelect" style="margin-top: 15px;">
                            <input type="button" value="Cancel" onclick="javascript: parent.jQuery.fancybox.close();" class="blueBCancelBtn">
                            <input type="submit" name="submit" value="Save" class="orangeBTourCancelBtn">
                            {{-- <input type="button" value="Continue" class="orangeBTourCancelBtn" id="showRooms"> --}}
                        </div>
                    </form>
                    <script>
    $(document).ready(function(){
        // Search AJAX filter submit
        $(".orangeBTourCancelBtn").click(function(){
            alert('working ');
            // $('#CancellationReasonsFrom').validate(addPaymentModeValidateOpt);
            return false;
        });
    });
</script>
                   
                </div>

            </div>
        </div>
    </div>
    <div style="display: none;">
        @foreach($items as $key => $cartItem)
            @foreach($cartItem->cartExperiences as $item)
                <?php
                if($item->completed == 1){
                                continue;
                            }
                if($item->cancel_status == 1){
                    continue;
                }
                ?>
                <?php 
                    $cartExperiencesToRooms = App\Models\Cms\CartExperiencesToRooms::with('cartExperiencesToRoomsRequests')->whereIn('room_request_status',['self','approved'])->where("cart_exp_id", $item->id)->get();
                    $sngtotal = 0;
                    $dbltotal = 0;
                    $twntotal = 0;
                    $trptotal = 0;
                    $qrdtotal = 0;
                    if(!empty($cartExperiencesToRooms)){
                        foreach ($cartExperiencesToRooms as $key => $value) {
                            if($value->room_id == '1' && ($value->deposit == '1' || $value->paid == '1')){
                                $sngtotal++;
                            }else if($value->room_id == '2' && ($value->deposit == '1' || $value->paid == '1')){
                                $dbltotal++;
                            }else if($value->room_id == '3' && ($value->deposit == '1' || $value->paid == '1')){
                                $twntotal++;
                            }else if($value->room_id == '4'){
                                $trptotal++;
                            }else if($value->room_id == '5'){ 
                                $qrdtotal++;
                            }
                        }
                    }
                    $cartExperiencesToRoomsRequest = App\Models\Cms\CartExperiencesToRooms::with('cartExperiencesToRoomsRequests')->whereIn('room_request_status',['pending','approved','declined','cancelled'])->where("cart_exp_id", $item->id)->orderBy('date', 'DESC')->get();
                    if(!empty($cartExperiencesToRoomsRequest)){
                        foreach ($cartExperiencesToRoomsRequest as $key => $value) {
                            if($value->room_request_status == 'approved' && ($value->status == '1' || $value->paid == 1 || $value->deposit == 1)){
                                if($value->room_id == '1'){
                                    $sngtotal = $sngtotal+1;
                                }elseif($value->room_id == '2'){
                                    $dbltotal = $dbltotal+1;
                                }elseif($value->room_id == '3'){
                                    $twntotal = $twntotal+1;
                                }
                            }
                        }
                    }
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
                        $guest_list_due_date = '';
                    ?>
        
            @endforeach
        @endforeach
    </div>

    <div style="display: none;">
        @foreach($items as $key => $cartItem)
            @foreach($cartItem->cartExperiences as $item)

                <?php
                if($item->completed == 1){
                                continue;
                            }
                if($item->cancel_status == 1){
                    continue;
                }
                ?>
                @if($item->tourStatuses->count() > 0)
                    @foreach($item->tourStatuses as $itemStatus)
                    <div class="rightCol" id="bookingFormBox-{{ $item->id }}step-{{ $itemStatus->id }}">
                        <div class="bookingForm fancyboxTourSteps">
                            <?php 
                                $cart_experience = App\Models\Cms\CartExperience::with('experiencesToHotelsToExperienceDate')->where("id", $item->id)->get();
                                $cartExperiencesToRooms = App\Models\Cms\CartExperiencesToRooms::with('cartExperiencesToRoomsRequests')->whereIn('room_request_status',['self','approved'])->where("cart_exp_id", $item->id)->get();
                                                        
                            $sgl = 0;
                                $dbl = 0;
                                $twn = 0;
                                $trp = 0;
                                $qrd = 0;
                                $date_in = '';
                                $date_out = '';
                                $night = '';
                                if(isset($cart_experience[0]->experiencesToHotelsToExperienceDate->HotelDates)){
                                    $sgl = $cart_experience[0]->experiencesToHotelsToExperienceDate->HotelDates->sgl;
                                    $dbl = $cart_experience[0]->experiencesToHotelsToExperienceDate->HotelDates->dbl;
                                    $twn = $cart_experience[0]->experiencesToHotelsToExperienceDate->HotelDates->twn;
                                    $trp = $cart_experience[0]->experiencesToHotelsToExperienceDate->HotelDates->trp;
                                    $qrd = $cart_experience[0]->experiencesToHotelsToExperienceDate->HotelDates->qrd;
                                    $date_in = $cart_experience[0]->experiencesToHotelsToExperienceDate->HotelDates->date_in;
                                    $date_out = $cart_experience[0]->experiencesToHotelsToExperienceDate->HotelDates->date_out;
                                    $night = $cart_experience[0]->experiencesToHotelsToExperienceDate->HotelDates->night;
                                }
                                $sngSCnt = 0;
                                $dblSCnt = 0;
                                $twnSCnt = 0;
                                $trpSCnt = 0;
                                $qrdSCnt = 0;

                                $sngSCntD = 0;
                                $dblSCntD = 0;
                                $twnSCntD = 0;
                                $trpSCntD = 0;
                                $qrdSCntD = 0;

                                $sngSCntS = 0;
                                $dblSCntS = 0;
                                $twnSCntS = 0;
                                $trpSCntS = 0;
                                $qrdSCntS = 0;


                                foreach ($cartExperiencesToRooms as $key => $value) {
                                    if($value->room_id == '1' && $value->status == '1'){
                                        $sngSCnt++;
                                    }else if($value->room_id == '2' && $value->status == '1'){
                                        $dblSCnt++;
                                    }else if($value->room_id == '3' && $value->status == '1'){
                                        $twnSCnt++;
                                    }else if($value->room_id == '4' && $value->status == '1'){
                                        $trpSCnt++;
                                    }else if($value->room_id == '5' && $value->status == '1'){ 
                                        $qrdSCnt++;
                                    }

                                    if($value->room_id == '1' && $value->deposit == '1'){
                                        $sngSCntD++;
                                    }else if($value->room_id == '2' && $value->deposit == '1'){
                                        $dblSCntD++;
                                    }else if($value->room_id == '3' && $value->deposit == '1'){
                                        $twnSCntD++;
                                    }else if($value->room_id == '4' && $value->deposit == '1'){
                                        $trpSCntD++;
                                    }else if($value->room_id == '5' && $value->deposit == '1'){ 
                                        $qrdSCntD++;
                                    }

                                    if($value->room_id == '1' && $value->paid == '1'){
                                        $sngSCntS++;
                                    }else if($value->room_id == '2' && $value->paid == '1'){
                                        $dblSCntS++;
                                    }else if($value->room_id == '3' && $value->paid == '1'){
                                        $twnSCntS++;
                                    }else if($value->room_id == '4' && $value->paid == '1'){
                                        $trpSCntS++;
                                    }else if($value->room_id == '5' && $value->paid == '1'){ 
                                        $qrdSCntS++;
                                    }
                                }
                                $sngLastAmt = $sgl;     
                                if($sngSCnt > $sgl){
                                    $sngLastAmt = $sngSCnt;
                                }
                                $dblLastAmt = $dbl;     
                                if($dblSCnt > $dbl){
                                    $dblLastAmt = $dblSCnt;
                                }
                                $twnLastAmt = $twn;     
                                if($twnSCnt > $twn){
                                    $twnLastAmt = $twnSCnt;
                                }
                                $trpLastAmt = $trp;     
                                if($trpSCnt > $trp){
                                    $trpLastAmt = $trpSCnt;
                                }
                                $qrdLastAmt = $qrd;     
                                if($qrdSCnt > $qrd){
                                    $qrdLastAmt = $qrdSCnt;
                                }

                                $totalGuest = $sngSCnt + $dblSCnt + $twnSCnt + $trpSCnt + $qrdSCnt ;
                                $totalGuestD = $sngSCntD + $dblSCntD + $twnSCntD + $trpSCntD + $qrdSCntD ;
                                $totalGuestS = $sngSCntS + $dblSCntS + $twnSCntS + $trpSCntS + $qrdSCntS ;

                            ?>
                            @if(optional($itemStatus)->id == 11)
                                <span class="headingS">{{ $item->experience_name }}</span>
                                <span class="headingS">{{ $item->hotel_name }}</span>
                                <span class="headingS">{{ date('d/m/Y', strtotime($item->date_from)) }} - {{ date('d/m/Y', strtotime($item->date_to)) }} ({{ $item->nights }} nights)</span>
                            @else
                                <span class="headingS"> Tour Booking Step </span>
                            @endif

                            <span class="headingLL">{{ optional($itemStatus)->name }}</span>
                            <div class="stepsline">
                                <ol>
                                    @foreach($tourStatuses as $ts)
                                        @if($ts->id < 11)
                                        <li @if($ts->id == optional($itemStatus)->id || optional($itemStatus)->id == 11) class="active" @endif>
                                            <span class="up">{{ $ts->percent }}%</span>
                                            <span class="down">{{ $ts->name }}</span>
                                        </li>
                                        @endif
                                    @endforeach
                                </ol>
                            </div>

                            <form method="POST" action="{{ route('process-tour-steps.ajax') }}" class="ajax">
                                {{ csrf_field() }}
                                <input type="hidden" name="cart_experiences_id" value="{{ $item->id }}">
                                <input type="hidden" name="tour_statuses_id" value="{{ optional($itemStatus)->id }}">
                                <input type="hidden" name="pivot_id" value="{{ optional($itemStatus)->pivot_id }}">
                                @if(optional($itemStatus)->id == 1)
                                    <label for="sign_name">Name</label>
                                    <div class="inputRow">
                                        <input type="text" name="sign_name" placeholder="Please Enter a Name">
                                        <button type="submit" data-step="{{ optional($itemStatus)->id }}" class="stepSubmitButton"><i class="fas fa-chevron-right"></i></button>
                                    </div>
                                @elseif(optional($itemStatus)->id == 2)
                                    <label for="url">Please enter the product URL posted on you website.</label>
                                    <small>The URL posted here will help us see the way the product is advertised</small>
                                   
                                    <div class="skurlinputbutton{{ $item->id }}"  style="<?php echo ($itemStatus->pivot->url)?'display:none;':'display:block;'; ?>">
                                     
                                       <div>
                                            <input type="text" name="url" placeholder="https://" style="padding: 10px 15px;width: 100%;margin-top: 10px;">
                                           <button type="submit" data-step="{{ optional($itemStatus)->id }}" class="stepSubmitButton sk_cta">Update URL</button>
                                       </div>
                                    </div>
                                   
                                    <div class="inputRowView skurllink{{ $item->id }}" style="<?php echo ($itemStatus->pivot->url)?'display:block;':'display:none;'; ?>">
                                        <p>Current URL link:</p>
                                        <p>{{ $itemStatus->pivot->url  }}</p>
                                        <a href="#" class="stepSubmitButton skShow sk_cta" data-id="{{ $item->id }}">Update URL</a>
                                    </div>
                                
                                @elseif(optional($itemStatus)->id == 3 || optional($itemStatus)->id == 4 || optional($itemStatus)->id == 6)
                                    <?php
                                    $stepnumber = optional($itemStatus)->id;
                                    
                                    ?>
                                     <!-- <input type="hidden" name="step{{$stepnumber}}" class="sk_small_text stepTracking{{$stepnumber}}" value="1"> -->
                                     <?php 
                                    $cartExperiencesToRooms = App\Models\Cms\CartExperiencesToRooms::with('cartExperiencesToRoomsRequests')->whereIn('room_request_status',['self','approved'])->where("cart_exp_id", $item->id)->get();
                                    $sngtotal = 0;
                                    $dbltotal = 0;
                                    $twntotal = 0;
                                    $trptotal = 0;
                                    $qrdtotal = 0;
                                    if(!empty($cartExperiencesToRooms)){
                                        foreach ($cartExperiencesToRooms as $key => $value) {
                                            if($value->room_id == '1' && ($value->deposit == '1' || $value->paid == '1')){
                                                $sngtotal++;
                                            }else if($value->room_id == '2' && ($value->deposit == '1' || $value->paid == '1')){
                                                $dbltotal++;
                                            }else if($value->room_id == '3' && ($value->deposit == '1' || $value->paid == '1')){
                                                $twntotal++;
                                            }else if($value->room_id == '4'){
                                                $trptotal++;
                                            }else if($value->room_id == '5'){ 
                                                $qrdtotal++;
                                            }
                                        }
                                    }
                                     $rooms_ppl = 0;
                                    $rooms_sold = 0;
                                    /*foreach ($cartExperiencesToRooms as $key => $value) {
                                        if($value->paid == 1 || $value->deposit == 1){
                                             //$rooms_ppl = $rooms_ppl+1;
                                            $rooms_sold = $rooms_sold+1;
                                            if(!empty($value->names)){
                                                $names = array_filter(explode(',', $value->names));
                                                $rooms_ppl    = $rooms_ppl+count($names);
                                            }
                                        }
                                    }*/
                                      $d_cnt = (!empty($item->driver_name) && ($item->driver_room_type == '2' || $item->driver_room_type == '3'))?'1':'0';
                                        $s_cnt = ($item->driver_room_type == '1')?'1':'0';
                                        $total_pax = get_total_pax($item->id); 
                                    ?>
                                    <div class="text-center">Pax: <strong>{{$total_pax}}</strong></div>
                                             
                                    <div class="rooms" style="text-align:center;">
                                        <strong>{{$sngtotal}}</strong> sgl <strong>{{$dbltotal}}</strong> dbl <strong>{{$twntotal}}</strong> twn
                                    </div>
                                            <input type="hidden" name="step{{$stepnumber}}" class="sk_small_text stepTracking{{$stepnumber}}" value="1">
                                            <input type="hidden" name="pax" class="" value="{{$total_pax}}">
                                              <input type="hidden" name="sgl_room_total" class="" value="{{$sngtotal}}">
                                               <input type="hidden" name="dbl_room_total" class="" value="{{$dbltotal}}">
                                                <input type="hidden" name="twn_room_total" class="" value="{{$twntotal}}">

                                        <!-- <button type="submit" data-step="{{ optional($itemStatus)->id }}" class="stepSubmitButtonTracking sk_cta">Update tracking</button> -->
                                        <?php /*if(!empty($sngtotal) || !empty($dbltotal) || !empty($twntotal)) {*/ ?>
                                     <button type="submit" data-step="{{ optional($itemStatus)->id }}" class="stepSubmitButtonTracking sk_cta">Mark as completed</button>
                                 <?php /*}*/ ?>
                                @elseif(optional($itemStatus)->id == 44)
                                    <label for="step3">Step 4</label>
                                    <div class="inputRow">
                                        <input type="text" name="step4" pattern="^[0-9]*$" placeholder="Please Enter a Step 4" onkeypress="return isNumber(event)">
                                        <button type="submit" data-step="{{ optional($itemStatus)->id }}" class="stepSubmitButton"><i class="fas fa-chevron-right"></i></button>
                                    </div>
                                @elseif(optional($itemStatus)->id == 5)
                                    <label for="step5">Step 5</label>
                                    <div class="inputRow">
                                        <input type="hidden" name="step5" value="Test 1st Deposit" placeholder="Please Enter a Step 5">
                                        <button type="submit" data-step="{{ optional($itemStatus)->id }}" class="stepSubmitButton"><i class="fas fa-chevron-right"></i></button>
                                    </div>
                                @elseif(optional($itemStatus)->id == 66)
                                    <label for="step5">Step 6</label>
                                    <div class="inputRow">
                                        <input type="text" name="step6" pattern="^[0-9]*$" placeholder="Please Enter a Step 6" onkeypress="return isNumber(event)">
                                        <button type="submit" data-step="{{ optional($itemStatus)->id }}" class="stepSubmitButton"><i class="fas fa-chevron-right"></i></button>
                                    </div>
                                @elseif(optional($itemStatus)->id == 7)
                                    <label for="step7">Step 7</label>
                                    <div class="inputRow">
                                        <input type="text" name="step7" placeholder="Please Enter a Step 7">
                                        <button type="submit" data-step="{{ optional($itemStatus)->id }}" class="stepSubmitButton"><i class="fas fa-chevron-right"></i></button>
                                    </div>
                                @elseif(optional($itemStatus)->id == 8)
                                    <label for="step8">Step 8</label>
                                    <div class="inputRow">
                                        <input type="hidden" name="step8" value="Test Invoice paid" placeholder="Please Enter a Step 8">
                                        <button type="submit" data-step="{{ optional($itemStatus)->id }}" class="stepSubmitButton"><i class="fas fa-chevron-right"></i></button>
                                    </div>
                                @elseif(optional($itemStatus)->id == 9)
                                    <label for="step9">Step 9</label>
                                    <div class="inputRow">
                                        <input type="text" name="step9" placeholder="Please Enter a Step 9">
                                        <button type="submit" data-step="{{ optional($itemStatus)->id }}" class="stepSubmitButton"><i class="fas fa-chevron-right"></i></button>
                                    </div>
                                @elseif(optional($itemStatus)->id == 10)
                                    <label for="step10">Step 10</label>
                                    <div class="inputRow">
                                        <input type="text" name="step10" placeholder="Please Enter a Step 10">
                                        <button type="submit" data-step="{{ optional($itemStatus)->id }}" class="stepSubmitButton"><i class="fas fa-chevron-right"></i></button>
                                    </div>
                                @elseif(optional($itemStatus)->id == 11)

                                @endif

                            </form>

                        </div>
                        <script>
                            $('.skShow').click(function(){

                                // $('.skurlinput'+$(this).data('id')).show();
                                $('.skurlinputbutton'+$(this).data('id')).show();
                                $('.skurllink'+$(this).data('id')).hide();
                            })


                            $(".stepSubmitButton").click(function(e){
                                e.preventDefault();

                                $(this).prop('disabled', true);
                               $(this).html('<i class="fas fa-spinner fa-pulse"></i>');
                                // $(this).html('Update URL');

                                var step = $(this).data('step');
                                if( step == 5 || step == 8 ){
                                    $(this).prop('disabled', false);
                                    $(this).unbind('click').click();
                                    $(this).prop('disabled', true);
                                    return true;
                                }

                                var value = $(this).siblings('input').val();

                                if(value){
                                    $(this).prop('disabled', false);
                                    $(this).unbind('click').click();
                                    $(this).prop('disabled', true);
                                    return true;
                                }else{
                                    $(this).prev().css("border", "2px solid red");
                                    $(this).prop('disabled', false);
                                    $(this).html('Update URL');
                                    return false;
                                }

                            });

                             $(".stepSubmitButtonTracking").click(function(e){
                                // e.preventDefault();

                                // $(this).prop('disabled', true);
                                $(this).html('<i class="fas fa-spinner fa-pulse"></i>');

                                // var step = $(this).data('step');
                                // if( step == 5 || step == 8 ){
                                //     $(this).prop('disabled', false);
                                //     $(this).unbind('click').click();
                                //     $(this).prop('disabled', true);
                                //     return true;
                                // }

                                // var value = $(".stepTracking"+step).val();
                                // if(value){
                                //     $(this).prop('disabled', false);
                                //     $(this).unbind('click').click();
                                //     $(this).prop('disabled', true);
                                //     return true;
                                // }else{
                                //     $(this).parent().css("border", "2px solid red");
                                //     $(this).prop('disabled', false);
                                //     $(this).html('Update tracking');
                                //     return false;
                                // }

                            });
                        </script>
                    </div>
                    @endforeach
                @endif

            @endforeach
        @endforeach
    </div>

</div>
<div class="rightCol only-desktop" id="rightCol_div">

    @foreach($items as $key => $cartItem)
        @foreach($cartItem->cartExperiences as $item)
            <?php
            if($item->completed == 1){
                                continue;
                            }
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
			//echo '<pre>' ;  print_r($cancellation_days); echo '</pre>' ;  
            ?>
            <div class="bookingForm" id="rightColInfo-{{ $item->id }}" style="display: none;">
                <span class="headingS">Tour Status</span>
                <span class="headingLLL">{{ optional($item->tourStatuses->last())->percent-10 }}%</span>
                <span class="headingS3">@if(optional($item->tourStatuses->last())->id == 1)
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
                                 @endif</span>

                <div class="tourInfoCont">
                    <div class="infoBox">
                        <span class="left">Date Booked</span>
                        <span class="right">{{ date('d/m/Y', strtotime($cartItem->finalized_at)) }}</span>
                    </div>
                    <div class="infoBox">
                        <span class="left">Tour Date</span>
                        <span class="right">{{ date('d/m/Y', strtotime($item->date_from)) }}</span>
                    </div>
                    <div class="infoBox">
                        <span class="left">Canx Date</span>
                        <span class="right">
                            <?php if(max($cancellation_days) > 0){
                                echo date('d/m/Y',strtotime('-'.max($cancellation_days).' days', strtotime($item->date_from)));
                            }else{
                                echo '---';
                            } ?>
                        </span>
                    </div>
                    <div class="infoBox">
                        <span class="left">Canx days</span>
                        <span class="right">
                            <?php if(max($cancellation_days) > 0){
                                echo max($cancellation_days);
                            }else{
                                echo '---';
                            } ?>
                        </span>
                    </div>
                    <div class="infoBox">
                        <span class="left">PAX</span>
                        <span class="right">---</span>
                    </div>
                    <div class="infoBox">
                        <span class="left">Tour Url:</span>
                        <span class="right">
                            @if( optional($item->tourStatuses->last())->id > 2 )
                                <input type="text" style="border: none;width: 0;height: 0;position: absolute;" class="copyURL" value="{{ $item->tourStatuses[1]->pivot->url }}">
                                <a href="javascript:;" class="copyBtn">Copy URL</a>
                            @else
                                ---
                            @endif
                        </span>
                    </div>
                    <div class="infoBox">
                        <span class="left">Next Step</span>
                        <span class="right">{{ optional($item->tourStatuses->last())->name }}</span>
                    </div>
                    <div class="infoBox">
                        <span class="left">Next Step Due</span>
                        <span class="right">
                            @if($item->tourStatuses->count() > 0)
                                {{ $diff = Carbon\Carbon::parse(optional($item->tourStatuses->last())->pivot->due_date)->diffForHumans() }}
                            @endif
                        </span>
                    </div>
                    <div class="infoBox">
                        <span class="left">Average Score</span>
                        <span class="right">-.-</span>
                    </div>
                </div>
{{--                {{ date_diff(new \DateTime($item->tourStatuses->last()->pivot->due_date), new \DateTime())->format("%m Months, %d days") }}--}}
               <!--  <button data-id="{{ $item->id }}" id="tourOverviewButton-{{ $item->id }}" class="orangeLink tourOverviewButton" href="">Tour Overview</button> -->
                <a target="_blank" href="/tour-overview/{{$item->id}}" class="orangeLink">
                  Tour Overview
                </a>
                <?php /* <button class="orangeLink">
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
                                 <?php @elseif(optional($item->tourStatuses->last())->id == 10)
                                    Tour Pack
								
									
                                 @elseif(optional($item->tourStatuses->last())->id == 11)
                                    Tour Review
                                 @endifed
                     @endif
					
                </button> */?>
                <button type="button" class="orangeLink" data-toggle="modal" data-target="#buttonsModal{{$item->id}}">
                  Download Assets
                </button>
                
            <?php if(!empty($item->cart_map_url)){ ?>
                <a target="_blank" href="{{$item->cart_map_url}}" class="orangeLink">
                  Itinerary Map
                </a>
                <?php } ?>
                <!-- <a target="_blank" href="/experience/{{$item->experiences_id}}/?map=yes/#display_map" class="orangeLink">
                  View on Map
                </a> -->
            </div>
            <div class="modal fade" id="buttonsModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel{{$item->id}}" aria-hidden="true">
			<?php 
                $cart_experience1 = 


DB::connection('mysql_veenus')->table('cart_experiences')->where("id", $item->id)->first();
                if(!empty($cart_experience1)){
                    $cart_experiences = 


DB::connection('mysql_veenus')->table('experiences')->where('id', $cart_experience1->experiences_id)->first();
                }
            ?>
			<div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel{{$item->id}}">Download Assets</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <button class="btn btn-warning downloadAssets"  data-attr1="{{(isset($cart_experiences1->experience_name) ? $cart_experiences1->experience_name : 'Veenus')}}" data-attr="{{(isset($cart_experiences->name) ? 'WEB-'.$cart_experiences->name : 'WEB-'.'Veenus')}}" data-url="{{ route('download-assets', $item->id) }}" style="background: orange;color: #fff;border-color: orange;font-weight: bold;">Download Web Images</button>
                     <button class="btn btn-warning downloadAssets"  data-attr1="{{(isset($cart_experiences1->experience_name) ? 'PRINT-'.$cart_experiences1->experience_name : 'PRINT-'.'Veenus')}}" data-attr="{{(isset($cart_experiences->name) ? 'PRINT-'.$cart_experiences->name : 'PRINT-'.'Veenus')}}" data-url="{{ route('download-print-assets', $item->id) }}" style="background: orange;color: #fff;border-color: orange;font-weight: bold;">Download Print Images</button>
                    <a class="btn btn-warning" href="{{ route('download-doc', $item->id) }}" style="background: orange;color: #fff;border-color: orange;font-weight: bold;">Download Document</a>
					<?php $brochures = 


DB::connection('mysql_veenus')->table('brochures')->where('experience_id',$item->experiences_id )->first();
                    
                    if(!empty($brochures)){ ?> 
					<a class="btn btn-warning" href="javascript:;" data-toggle="modal" data-target="#brochurDownload{{ $item->id }}" data-id="{{ $item->id }}" id="downloadBrochurePrice" data-dismiss="modal" style="background: orange;color: #fff;border-color: orange;font-weight: bold;margin-top: 10px;">Download Brochure</a>
                    <?php } ?>
					<br/>
					<div class="alert alert-info download-images-alert" style="display:none;">
						<strong>These assets can take up to 15 minutes to download, Please return shortly</strong>
					</div>
					
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
			
			<div class="modal fade downloadBrochurePriceContent" id="brochurDownload{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
			<?php 
			$brochures = 


DB::connection('mysql_veenus')->table('brochures')->where('experience_id',$item->experiences_id )->first();
			if(Auth::user()->hasRole("Collaborator")){
				$accountInfo = 


DB::connection('mysql_veenus')->table('account_info')->where("user_id", auth()->user()->id)->first();
			}
			?>
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="">Add Prices and Contact Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p>Please enter the tour Sharing price pp and the Single price pp.</p>
                    <div class="row">
                        <div class="col-sm-6"><input type="text" id="rate_pp_new" class="form-control 456" name="step9[rate_pp]" value="{{(isset($brochures->rate_pp) ? $brochures->rate_pp : '')}}"placeholder="Sharing price pp"></div>
                        <div class="col-sm-6"><input type="text" id="srs_pp_new" class="form-control" name="step9[srs_pp]" value="{{(isset($brochures->srs_pp) ? $brochures->srs_pp : '')}}" placeholder="Single price pp"></div>
						
                    </div>
					<br/>
					<p>Please enter your telephone number and email address to show on the Brochure.</p>
					 <div class="row">
                        <div class="col-sm-6"><input type="text" id="brochure_tel" class="form-control 456" name="brochure_tel" value="{{(isset($accountInfo->brochure_tel) ? $accountInfo->brochure_tel : '')}}"placeholder="Telephone Number"></div>
                        <div class="col-sm-6"><input type="email" id="brochure_email" class="form-control" name="brochure_email" value="{{(isset($accountInfo->brochure_email) ? $accountInfo->brochure_email : '')}}" placeholder="Email"></div>
						
                    </div>
                  </div>
				  
					<!--<div class="downloadBrochureAppendCls">

					</div>-->
				
                  <div class="modal-footer">
                    <a class="btn btn-warning" href="#" style="background: orange;color: #fff;border-color: orange;font-weight: bold;" data-id="{{ $item->experiences_id }}" data-cart-id="{{ $item->id }}" id="downloadBrochureImage">Preview</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
			
			
        @endforeach
    @endforeach
</div>


<div class="modal fade bd-example-modal-lg" id="tourpackModal" tabindex="-1" role="dialog" aria-labelledby="addFolderModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 1000px;">
        <div class="modal-content tourpackModalAppendCls">

        </div>
    </div>
</div>
<div class="modal fade bd-example-modal-lg" id="hotelDatesModal" tabindex="-1" role="dialog" aria-labelledby="addFolderModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 1000px;">
        <div class="modal-content hotelDatesModalAppendCls">

        </div>
    </div>
</div>

<div style="display: none;">
    <div class="tourOverviewModal" id="cancleTourModel">
        <div class="tourOverviewCont">
            <div class="modalHeading">Cancel Tour</div>
            <div class="tourContent cancleTourAppendCls" style="background: none;padding: 0;">
            </div>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" id="downloadBrochureModal" tabindex="-1" role="dialog" aria-labelledby="addFolderModalTitle" aria-hidden="true" style="overflow-y: auto;">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 1130px;">
        <div class="modal-content downloadBrochureAppendCls">

        </div>
    </div>
</div>
<div class="modal fade bd-example-modal-lg" id="disabledGuestList" tabindex="-1" role="dialog" aria-labelledby="addFolderModalTitle" aria-hidden="true" style="overflow-y: auto;">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 900px;">
        <div class="modal-content">
            <h3>Tracking 1 needs to be completed to access guest list.</h3>
        </div>
    </div>
</div>

<div class="modal fade" id="addNotes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add a new note</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <div id="notes_form">
           <form method="POST" enctype="multipart/form-data" id="ajax-file-upload">
                @csrf
                <!-- <input type="text" maxlength="10" name="initials" id="initials" placeholder="Initials">
                <p class="initials_cls" style="color: red;"></p>
                <br> -->
                <select name="category" id="category" class="form-control mb-2" />
                    <option value="">Select Category</option>
                    <option value="1">General Notes</option>
                    <option value="2">Room Requests</option>
                    <option value="3">Amendments</option>
                    <option value="4">Hotels</option>
                    <option value="5">Experiences</option>
                </select>
                <p class="category_cls" style="color: red;"></p>
                <input type="hidden" name="cart_id" id="cart_id" value="">
                <input type="hidden" name="user_type" id="user_type" value="2">
                <textarea type="text" class="form-control mb-2" name="notes" id="notes" placeholder="Type here" rows="7"></textarea>
                <p class="notes_cls" style="color: red;"></p>                                           
                <input type="file" accept=".pdf"  style="max-width: 500px;" name="note_file" id="note_file">
                <br>
                <button class="btn btn-primary" type="submit" id="add_notes" style="max-width: 500px;">
                    Add
                </button>
            </form>

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="submit" class="btn btn-primary" id="add_notes">Add</button> -->
      </div>
    </div>
  </div>
</div>
<div id="tobeprinted" style="display:none;"></div>
<style type="text/css">
    .sk_small_text{
        height: 35px !important;
        width: 50px !important;
        border: 1px solid #ccc !important;
    }
    .sk_main_track label{
        margin-top: 15px;
        font-size: 12px !important;
    }

    .sk_main_track .inputRow{
        display: block !important;
        padding: 10px;

    }

    .sk_main_track .inputRow span{
        margin-left: 20px;
    }
    .sk_cta{
        display: block;
        width: 180px;
        background: #FCA311;
        /* border: solid 1px #FCA311; */
        border-radius: 5px;
        font-size: 1.125rem;
        font-weight: 700;
        line-height: 1.5;
        text-align: center;
        color: #FFF;
        padding: 10px;
        margin: 25px auto;
    }
</style>
<script type="text/javascript">
     $(document).ready(function(){
    <?php if(!empty($cart_id)) { ?> 
        var id = '<?=$cart_id?>';
        
        $('#openBooking-'+id).trigger("click");
        $('#tourOverviewButton-'+id).trigger("click");
        $('#reloadInfo'+id).trigger("click");
        
     <?php } ?>
     }); 
$(document).on('click', '#downloadBrochureImage', function(e) {
        e.preventDefault();
        var exp_id = $(this).attr('data-id');
        var cart_exp_id = $(this).attr('data-cart-id');
        var rate_pp_new = $(this).parent().parent().find('#rate_pp_new').val();
        var srs_pp_new = $(this).parent().parent().find('#srs_pp_new').val();
        var brochure_tel = $(this).parent().parent().find('#brochure_tel').val();
        var brochure_email = $(this).parent().parent().find('#brochure_email').val();
        //var dates_rates_id = $(this).attr('dates_rates_id');
        $('.loader').show();    
        $.ajax({
            url: base_url+'/download-brochure-image',
            type: 'POST',
            data: {'cart_exp_id':cart_exp_id,'exp_id':exp_id, 'rate_pp_new':rate_pp_new, 'srs_pp_new':srs_pp_new, 'brochure_tel':brochure_tel, 'brochure_email':brochure_email},
            success: function(data) {
                
                $('.downloadBrochureAppendCls').html(data.response);
                $('.loader').hide();  
                $('.downloadBrochurePriceContent').modal('hide');
                $('#downloadBrochureModal').modal('show');
				//$('#rate_pp_new').val('');
				//$('#srs_pp_new').val('');
            },
            error: function(e) {
            }
        });   
    });


$("body").on("click", '.editTracking', function(e) {
    $(this).closest(".tab_content").find(".tourOverviewButton").click();
});
$("body").on("click", '.editGuestList123', function(e) {
    $(this).closest(".tab_content").find(".tourOverviewButton").click();
});
$("body").on("click", '.copyBtn', function(e) {
    var $url = $(this).closest('span').find('.copyURL');
    $url.focus();
    $url.select();
    document.execCommand("copy");
    $(this).text("URL copied!");
});
$("body").on("click", '#chkTerm', function(e) {
    if ($("#chkTerm").prop('checked') == true) {
        $('.showHideDiv').css('visibility', 'visible');
        
    }else{
        $('.showHideDiv').css('visibility', 'hidden');
        
    }
});
$("body").on("click", '.showHideExep', function(e) {
    e.preventDefault();
    var dataType = $(this).attr('data-type');
    var dataId = $(this).attr('data-id');
    $(this).closest('.infoBox').hide();
    $('.'+dataType).show();
});
    // $(".tourCancelButton").bind("click", function(){
    $(document).on('click', '.tourCancelButton', function() {
        var cartExperienceId = $(this).attr("id");

          /*var txt;
          var r = confirm("Click Ok to Cancel Booking.");
          if (r == true) {
            // alert(cartExperienceId);
            // txt = "You pressed OK!";
            $.ajaxSetup({ headers: {'X-CSRF-TOKEN': '{{csrf_token()}}'}});
            $.ajax({
                type: "POST",
                // cache: false,
                url: '{{ route('cancel-booking.ajax') }}',
                data: { 'cart_experiences_id': cartExperienceId},
                success: function (data) {
                    // alert('success');
                    location.reload();
                },
                error: function(er){
                    console.log(er);
                }
            });
          } else {
            // alert('No');
            // txt = "You pressed Cancel!";
          }*/
        $('.cancellationReasonsCartId').val(cartExperienceId);
        $.fancybox.open(
            //$("#bookingFormBox-"+cartExperienceId).html() , {
            $("#tourOverviewModalCancel").html() , {
                closeExisting: true,
                touch: false
            }
        );
       

    });

    $(".tourOverviewButton").bind("click", function(){
        var cartExperienceId = $(this).data("id");

        $.fancybox.open(
            //$("#bookingFormBox-"+cartExperienceId).html() , {
            $("#tourOverviewModal-"+cartExperienceId).html() , {
                closeExisting: true,
                touch: false
            }
        );

    });
    addPaymentModeValidateOpt = {
        rules: {
            'sdada': {
                required: true,
            },
            'cancellation_reasons_id': {
                required: true,
            }

        },
        errorElement: 'div',
        messages: {
            'sdada': {
                required: "Please select reasons",
            },
            'cancellation_reasons_id': {
                required: "Please select reasons",
            }
        },
        errorPlacement: function(error, element) {
            error.insertAfter($(element));
        },
        submitHandler: function(form) {
            alert('success');
            return false;
        },
    }
    $(document).ready(function(){
        <?php
        if(isset($_GET['id']) && !empty($_GET['id'])){
            ?>
            var cartExperienceId1 = <?php echo $_GET['id']; ?>

            $.fancybox.open(
                $("#tourOverviewModal-"+cartExperienceId1).html() , {
                    closeExisting: true,
                    touch: false
                }
            );
            <?php
        }elseif(isset($_GET['cid']) && !empty($_GET['cid'])){
            ?>
            var cartExperienceId2 = <?php echo $_GET['cid']; ?>

            $('a#reloadInfo'+cartExperienceId2).trigger('click');
            <?php
        }
        ?>
        // $('#CancellationReasonsFrom').validate(addPaymentModeValidateOpt);

        $(".mobMenuBtn").bind("click", function(){

            if($("#menu__toggle2").prop("checked") == true){
                if(updated==0){
                    updated = 1;
                }
                $(".leftCol").addClass("comeFromLeft");
            }else {
                $(".leftCol").removeClass("comeFromLeft");
            }
        });

        $(".filterBtn").bind("click", function(){
            $(".hiddenFilteres").toggleClass('showOpacity hide');
        });

        $(".showFilter").bind("click", function(){

            element = "#activeFilter-"+$(this).data("filter-id");
            element2 = "."+$(this).data("filter-class");
            $(this).addClass("active");
            $(element).show();
            $(element2).show();

        });

        $(".hideFilter").bind("click", function(){

            $(this).hide();
            element = "#availableFilter-"+$(this).data("filter-id");
            element2 = "."+$(this).data("filter-class");
            $(element).removeClass("active");
            $(element2).hide();
        });

    });

    var mx = 0;

    $(".drag").on({
        mousemove: function(e) {
            var mx2 = e.pageX - this.offsetLeft;
            if(mx) this.scrollLeft = this.sx + mx - mx2;
        },
        mousedown: function(e) {
            this.sx = this.scrollLeft;
            mx = e.pageX - this.offsetLeft;
        }
    });

    $(document).on("mouseup", function(){
        mx = 0;
    });
    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    }
    
    $("body").on("click", '.copyLink', function(e) {
        var $temp = $("<input>");
        var $url = $(this).data('href');
        $("body").append($temp);
        $temp.val($url).select();
        document.execCommand("copy");
        $temp.remove();
        $(this).text("Copied!");
    });
    
    $("body").on("click", '.docusignStepCls', function(e) {
        // $('.docusignStepLinkCls').trigger('click');
        var urls = $(this).closest('._docusignStepCls').attr('data-urls');
        var datatab = $(this).closest('._docusignStepCls').attr('data-tab');
        parent.jQuery.fancybox.close();
        var hotelId = $(this).closest('._docusignStepCls').val();
        var dataId = $(this).closest('._docusignStepCls').attr('data-id');
        $('.loader').show();    
        $.ajax({
            url: urls,
            type: 'POST',
             // dataType: 'json',
            data: {'hotel_id':hotelId, 'dataId':dataId, 'datatab':datatab},
            success: function(data) {
                $('.loader').hide();    
                $('.hotelDatesModalAppendCls').html(data.response);
                $('#hotelDatesModal').modal('show');
                // alert('123');
            },
            error: function(e) {
            }
        });
    }).on('click', '.sendAlert', function(e) {
        e.stopPropagation();
    });
    
    $("body").on("click", '.downloadPDF', function(e) {
        // $('.docusignStepLinkCls').trigger('click');
        var downloadurl = $(this).closest('._docusignStepCls').attr('data-downloadurl');
        parent.jQuery.fancybox.close();
        var hotelId = $(this).closest('._docusignStepCls').val();
        var dataId = $(this).closest('._docusignStepCls').attr('data-id');
        $('.loader').show();    
        $.ajax({
            url: downloadurl,
            type: 'POST',
             // dataType: 'json',
            data: {'hotel_id':hotelId, 'dataId':dataId},
            success: function(data) {
                $('.loader').hide();    
                $('#tobeprinted').html(data.response); 
                w=window.open();
                w.document.write($('#tobeprinted').html());
                w.print();
                w.close();
            },
            error: function(e) {
            }
        });
    }).on('click', '.sendAlert', function(e) {
        e.stopPropagation();
    });
    $("body").on("click", '.cancleTour', function(e) {

        var dataId = $(this).attr('data-id');
        var url = $(this).attr('data-url');
        $('.loader').show();    
        $.ajax({
            url: url,
            type: 'POST',
             // dataType: 'json',
            data: {'dataId':dataId},
            success: function(data) {
                $('.loader').hide();    
                $('.cancleTourAppendCls').html(data.response);
                $.fancybox.open(
                    $("#cancleTourModel").html() , {
                        closeExisting: true,
                        touch: false
                    }
                );
            },
            error: function(e) {
            }
        });
    });
    $("body").on("click", '#canceltour', function(e) {

        var cancelReason = $(this).closest('.cancleTourAppendCls').find("#cancelReason").val();
        var url = $(this).attr('data-url');
        $('.loader').show();    
        $.ajax({
            url: url,
            type: 'POST',
             // dataType: 'json',
            data: {'cancelReason':cancelReason},
            success: function(data) {
                $('.loader').hide();  
                //location.reload(); 
                window.location.href = base_url+'/acc-collaborator';
            },
            error: function(e) {
            }
        });
    });
    $("body").on("click", '.downloadAssets', function(e) {
        var urls = $(this).attr('data-url');
		 var attrs = $(this).attr('data-attr');
        $('.loader').show();    
		alert('These assets can take up to 15 minutes to download, please return shortly!');
       // $('.download-images-alert').show();    
        $.ajax({
            url: urls,
            type: 'POST',
            success: function(data) {
				//$('.download-images-alert').hide();  
                $('.loader').hide();
               // window.location.href = base_url+'/printassets.zip';
			    if(data == 1)
                {
                    window.location.href = base_url+'/download_zip/'+attrs+'.zip';      
                }
                else
                {
                    alert("No images found.");
                }
                
            },
            error: function(e) {
            }
        });
    });

    $("body").on("click", '.stage', function(e) {
        $('.stage').removeClass('active');
        $(this).addClass('active');
        var stage = $(this).data('stage');
        $('#stage').val(stage);
    });
    $("body").on("click", '#stageRemove', function(e) {
        $('#stage').val('');
        $('#submitBtn').click();
    });
    $("body").on("click", '#dateRemove', function(e) {
        $('#date_from').val('');
        $('#date_to').val('');
        $('#submitBtn').click();
    });
    $("body").on("click", '#monthRemove', function(e) {
        $('#month').val('');
        $('#submitBtn').click();
    });
    $("body").on("click", '#tournoRemove', function(e) {
        $('#tour_no').val('no');
        $('#submitBtn').click();
    });
    $("body").on("click", '#hotelRemove', function(e) {
        $('#hotel').val('no');
        $('#submitBtn').click();
    });
    $("body").on("click", '#refnoRemove', function(e) {
        $('#ref_no').val('no');
        $('#submitBtn').click();
    });
    $("body").on("click", '#nextRemove', function(e) {
        $('#next_step').val('no');
        $('#submitBtn').click();
    });
    $("body").on("click", '#nextdueRemove', function(e) {
        $('#next_step_due').val('no');
        $('#submitBtn').click();
    });
    $("body").on("click", '#collRemove', function(e) {
        $('#collaborator').val('no');
        $('#submitBtn').click();
    });
    $("body").on("click", '#expRemove', function(e) {
        $('#experience').val('no');
        $('#submitBtn').click();
    });
    $("body").on("click", '.filters_dropdown > .cta', function(e) {
        $('.dropdown').toggleClass('filterShow');
    });
    $("body").on("click", '.refnoClick', function(e) {
        $(this).toggleClass('active');
        if($(this).hasClass("active")){
            $('#ref_no').val('yes');
        }else{
            $('#ref_no').val('no');
        }
    });
    $("body").on("click", '.hotelnameClick', function(e) {
        $(this).toggleClass('active');
        if($(this).hasClass("active")){
            $('#hotel').val('yes');
        }else{
            $('#hotel').val('no');
        }
    });
    $("body").on("click", '.tournoClick', function(e) {
        $(this).toggleClass('active');
        if($(this).hasClass("active")){
            $('#tour_no').val('yes');
        }else{
            $('#tour_no').val('no');
        }
    });
    $("body").on("click", '.nextstepClick', function(e) {
        $(this).toggleClass('active');
        if($(this).hasClass("active")){
            $('#next_step').val('yes');
        }else{
            $('#next_step').val('no');
        }
    });
    $("body").on("click", '.nextstepdueClick', function(e) {
        $(this).toggleClass('active');
        if($(this).hasClass("active")){
            $('#next_step_due').val('yes');
        }else{
            $('#next_step_due').val('no');
        }
    });
    $("body").on("click", '.collabClick', function(e) {
        $(this).toggleClass('active');
        if($(this).hasClass("active")){
            $('#collaborator').val('yes');
        }else{
            $('#collaborator').val('no');
        }
    });
    $("body").on("click", '.expClick', function(e) {
        $(this).toggleClass('active');
        if($(this).hasClass("active")){
            $('#experience').val('yes');
        }else{
            $('#experience').val('no');
        }
    });
    $("body").on("click", '.tourPackBox', function(e) {
        var urls = $(this).attr('data-tour');
        var datatab = $(this).attr('data-tab');
        parent.jQuery.fancybox.close();
        var hotelId = $(this).val();
        var dataId = $(this).attr('data-id');
        $('.loader').show();    
        $.ajax({
            url: urls,
            type: 'POST',
             // dataType: 'json',
            data: {'hotel_id':hotelId, 'dataId':dataId, 'datatab':datatab},
            success: function(data) {
                $('.loader').hide();    
                $('.tourpackModalAppendCls').html(data.response);
                $('#tourpackModal').modal('show');
                // alert('123');
            },
            error: function(e) {
            }
        });
    }).on('click', '.sendAlert', function(e) {
        e.stopPropagation();
    });
  
   
$(document).ready(function(){
     function fetch_data(sort_type, sort_by, stage, ref_no,next_step,next_step_due,collaborator,experience,hotel,tour_no,month,date_from,date_to)
     {
        $('.loader').show();
      $.ajax({
       url:"/fetch_current_tour_collabrator?sortby="+sort_by+"&sorttype="+sort_type+"&stage="+stage+"&ref_no="+ref_no+"&next_step="+next_step+"&next_step_due="+next_step_due+"&collaborator="+collaborator+"&experience="+experience+"&hotel="+hotel+"&tour_no="+tour_no+"&month="+month+"&date_from="+date_from+"&date_to="+date_to,
       success:function(data)
       {
        $('#ctour_list').html('');
        $('#ctour_list').html(data);
        $('.bookingForm').hide();
        $('.loader').hide();
       }
      })
     }

     $('body').on('click', '.sorting', function(){
        $('.bookingForm').hide();
          $('.sort-sp').html('<i class="fa fa-sort" aria-hidden="true"></i>');
          var column_name = $(this).attr('data-column_name');
          var order_type = $(this).attr('data-sorting_type');
          var reverse_order = '';
          if(order_type == 'asc')
          {
         
           reverse_order = 'desc';
            $(this).attr('data-sorting_type', 'desc');
           $('#'+column_name+'_icon').html("<i class='fas fa-sort-desc' style='color: blue'></i>");
          }
          if(order_type == 'desc')
          {
           
           reverse_order = 'asc';
           $(this).attr('data-sorting_type', 'asc');
           $('#'+column_name+'_icon').html("<i class='fas fa-sort-asc' style='color: blue'></i>");
          }
          $('#sort_column_name').val(column_name);
          $('#sort_type').val(reverse_order);
          var stage = $('#stage').val();
          var ref_no = $('#ref_no').val();
          var next_step = $('#next_step').val();
          var next_step_due = $('#next_step_due').val();
          var collaborator = $('#collaborator').val();
          var experience = $('#experience').val();
          var hotel = $('#hotel').val();
          var tour_no = $('#tour_no').val();
          var month = $('#month').val();
          var date_from = $('#date_from').val();
          var date_to = $('#date_to').val();
          
          fetch_data(reverse_order, column_name, stage, ref_no,next_step,next_step_due,collaborator,experience,hotel,tour_no,month,date_from,date_to);

         });

     });
</script>
