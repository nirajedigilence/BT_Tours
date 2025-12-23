<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
<script src="{{ asset('js/popper.min.js') }}"></script> 
<script src="{{ asset('js/bootstrap.min.js') }}"></script>   

<div class="middleCol completedBooking" id="middleCol">
    @if(Session::has('success'))
        <div class="alert alert-success">
            {!! session('success') !!}
        </div>
    @elseif(Session::has('error'))
        <div class="alert alert-error">
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
                        <form action="{{ route('account-superuser-completed') }}" id="filterForm">
                            <input type="hidden" name="ref_no" id="ref_no" value="<?php echo isset($_GET['ref_no']) ? $_GET['ref_no'] : 'no' ?>">
                            <input type="hidden" name="next_step" id="next_step" value="<?php echo isset($_GET['next_step']) ? $_GET['next_step'] : 'no' ?>">
                            <input type="hidden" name="next_step_due" id="next_step_due" value="<?php echo isset($_GET['next_step_due']) ? $_GET['next_step_due'] : 'no' ?>">
                            <input type="hidden" name="collaborator" id="collaborator" value="<?php echo isset($_GET['collaborator']) ? $_GET['collaborator'] : 'no' ?>">
                            <input type="hidden" name="experience" id="experience" value="<?php echo isset($_GET['experience']) ? $_GET['experience'] : 'no' ?>">
                            <input type="hidden" name="hotel" id="hotel" value="<?php echo isset($_GET['hotel']) ? $_GET['hotel'] : 'yes' ?>">
                            <input type="hidden" name="tour_no" id="tour_no" value="<?php echo isset($_GET['tour_no']) ? $_GET['tour_no'] : 'yes' ?>">


                            <div class="dropdown_section">

                                <div class="heading">
                                    By Date
                                </div>

                                <div class="by_date">

                                    <div class="field">
                                        <div class="label">By Month</div>
                                        <select name="month" id="month">
                                            <option value="">---</option>f
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

                                    <a href="javascript:;" class="option collabClick <?php echo (isset($_GET['collaborator']) && $_GET['collaborator'] == 'yes') ? 'active' :''; ?>">
                                        Collaborator
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
                        <a href="{{ route('account-superuser-completed') }}" style="color: orange;font-weight: normal;text-decoration: underline !important;float: left;">reset</a>
                    </li>
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
                    <input type="text" placeholder="Search">
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

            <div class="column width_small <?php echo (isset($_GET['ref_no']) && $_GET['ref_no'] == 'yes') ? '' :'hide'; ?>">
                Ref No
            </div>
            <div class="column width_small <?php echo (isset($_GET['next_step']) && $_GET['next_step'] == 'yes') ? '' :'hide'; ?>">
                Next Step
            </div>
            <div class="column width_small <?php echo (isset($_GET['next_step_due']) && $_GET['next_step_due'] == 'yes') ? '' :'hide'; ?>">
                Next Step Due
            </div>
            <div class="column <?php echo (isset($_GET['collaborator']) && $_GET['collaborator'] == 'yes') ? '' :'hide'; ?>">
                Collaborator
            </div>

            <div class="column <?php echo (isset($_GET['experience']) && $_GET['experience'] == 'yes') ? '' :'hide'; ?>">
                Experience
            </div>
            <div class="column">
                Name
            </div>

            <div style="width: 35%;"  class="column <?php echo (isset($_GET['hotel']) && $_GET['hotel'] == 'no') ? 'hide' :''; ?>">
                Hotel Name
            </div>

            <div class="column">
                Date
            </div>
            <div class="column">
                Type
            </div>
            <div class="column">
                Avg Score
            </div>
            <div class="column">
                Final Tour Score
            </div>
             <div class="column">
                Displayed Reviews
            </div>
            <div class="column">
                Display Review
            </div>
            <!-- <div class="column width_small">
                Night
            </div>
            <div class="column width_small <?php echo (isset($_GET['tour_no']) && $_GET['tour_no'] == 'no') ? 'hide' :''; ?>">
                Tour Nrs
            </div>

            <div class="column width_small">
                Tour Status
            </div> -->

        </div>
                @if(!empty($items[0]))
                @foreach($items as $key => $cartItem)
                    @foreach($cartItem->cartExperiencesCompleted as $item)
                    <?php
                    $driverreviews = 


DB::connection('mysql_veenus')->table('reviews')->where('review_type','1')->where('cart_experience_id', $item->id)->first();
                    if(!empty($driverreviews->id))
                    {
                        $total_count = 


DB::connection('mysql_veenus')->table('reviews_display_count')->selectRaw('sum(display_count) as total_displayed_review')->where('review_id',$driverreviews->id)->groupBy('reviews_display_count.review_id')->first();

                      $submitted_review = isset($driverreviews->submitted_review)?unserialize($driverreviews->submitted_review):array();
                    }
                    
                    if(isset($_GET['month']) && !empty($_GET['month'])){
                        $month = date('m',strtotime($item['date_from']));
                        if($month != $_GET['month']){
                            continue;
                        }
                    }
                    if(isset($_GET['exp_id']) && !empty($_GET['exp_id'])){
                        $experiences_id = $item->experiences_id;
                        if($experiences_id != $_GET['exp_id']){
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
                    $carts = 


DB::connection('mysql_veenus')->table('carts')->where('id', $item->carts_id)->first();
                    $users = '';
                    if(!empty($carts)){
                        $users = 


DB::connection('mysql_veenus')->table('users')->where('id', $carts->user_id)->first();
                    }
                    if($item->tour_type == 1)
                    {
                        $hotel_data = get_hotel_date($item->id);
                    }
                    else
                    {
                         $hotel_data = get_ship_date($item->id);
                    }

                    ?>
                        <div class="middleCol_row openBooking" id="openBooking-{{ $item->id }}" data-id="{{ $item->id }}">
                            <div class="column width_small <?php echo (isset($_GET['ref_no']) && $_GET['ref_no'] == 'yes') ? '' :'hide'; ?>">
                                {{$experiences->ref_number}}
                            </div>
                            <div class="column width_small <?php echo (isset($_GET['next_step']) && $_GET['next_step'] == 'yes') ? '' :'hide'; ?>">
                                 {{ optional($item->tourStatuses->last())->name }}
                            </div>
                            <div class="column width_small <?php echo (isset($_GET['next_step_due']) && $_GET['next_step_due'] == 'yes') ? '' :'hide'; ?>">
                                 @if($item->tourStatuses->count() > 0)
                                    {{ $diff = Carbon\Carbon::parse(optional($item->tourStatuses->last())->pivot->due_date)->diffForHumans() }}
                                @endif
                            </div>
                            <div class="column <?php echo (isset($_GET['collaborator']) && $_GET['collaborator'] == 'yes') ? '' :'hide'; ?>">
                               {{ isset($users->name) ? $users->name : '-' }}
                            </div>
                            <div class="column <?php echo (isset($_GET['experience']) && $_GET['experience'] == 'yes') ? '' :'hide'; ?>">
                                {{ implode(', ',$experience_names)}}
                            </div>
                            <div class="column bold">
                                {{ $item->experience_name }}
                            </div>

                            <div style="width: 35%;" class="column <?php echo (isset($_GET['hotel']) && $_GET['hotel'] == 'no') ? 'hide' :''; ?>">
                                {{ $hotel_data['hotel_name'] }}
                            </div>

                            <div class="column">
                                {{ $hotel_data['date_from'] }} - {{ $hotel_data['date_to'] }}
                                        </div>
                            <div class="column">
                                <?php 
                                    if($item->tour_type == 1)
                                    {
                                        echo '&nbsp;&nbsp;Tour';
                                    }
                                    else
                                    {
                                         echo '&nbsp;&nbsp;&nbsp;Cruise';
                                    } ?>
                            </div>                                 
                            <div class="column">
                                <div class="stars">
                                    <?php
                                   $avg_score =  get_avg_score($driverreviews);
                                     for ($i=1; $i <= 5; $i++) { 
                                        if(isset($avg_score) && ($i <= $avg_score)){
                                            echo '<i class="fas fa-star"></i>';
                                        }else{
                                            echo '<i class="fas fa-star grey"></i>';
                                        }
                                    }
                                    ?>
                                   
                                </div>
                            </div>

                                        <div class="column">
                                            <div class="stars">
                                    <?php
                                     for ($i=1; $i <= 5; $i++) { 
                                        if(isset($driverreviews->stars) && ($i <= $driverreviews->stars)){
                                            echo '<i class="fas fa-star"></i>';
                                        }else{
                                            echo '<i class="fas fa-star grey"></i>';
                                        }
                                    }
                                    ?>
                                   
                                </div>
                            </div>
                            <div class="column" style="text-align:center;">
                                {{!empty($total_count->total_displayed_review)?$total_count->total_displayed_review:'0'}}
                            </div>
                            <div class="column">
                                <?php 
                                    $checked = '';
                                    if(isset($driverreviews->display) && $driverreviews->display == 1){
                                        $checked = 'checked';
                                    }
                                    ?>
                                    <div class="checkarea_part">
                                        <label class="checkbox_div">
                                            <input type="checkbox" name="" value="1" class="custom_chkbox displayReview" {{ $checked }} data-id="{{!empty($driverreviews->id)?$driverreviews->id:''}}">
                                          <span class="checkmark"></span>
                                        </label>
                                    </div>
                            </div>
                            <!-- <div class="column width_small">
                                {{ $item->nights }}
                            </div>

                            <div class="column width_small <?php echo (isset($_GET['tour_no']) && $_GET['tour_no'] == 'no') ? 'hide' :''; ?>">
                                16
                            </div>
                            
                            <div class="column width_small centered">
                                <strong>{{ optional($item->tourStatuses->last())->percent }}%</strong> 
                                <span class="line_break">{{ optional($item->tourStatuses->last())->name }}</span>
                            </div> -->

                        </div>
                    @endforeach
                @endforeach
                @endif
             <div class="tableWrapper drag">
            
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
                function myFunction() {
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
                }
            </script>
        </div>
    </div>
</div>
<div class="rightCol only-desktop">
    @foreach($items as $key => $cartItem)
        @foreach($cartItem->cartExperiencesCompleted as $item)
        <?php $driverreviews = 


DB::connection('mysql_veenus')->table('reviews')->where('review_type','1')->where('cart_experience_id', $item->id)->first();
        $date_rate_id = $item->dates_rates_id;
        $hotel_dates = 


DB::connection('mysql_veenus')->table('experience_dates')->selectRaw('experience_dates.id,hotel_dates.free_srs,experience_dates.pdf_file_name')->join('hotel_dates','hotel_dates.id','=','experience_dates.hotel_date_id')->where('experience_dates.dates_rates_id', $date_rate_id)->first();
        if(!empty($driverreviews->id))
                    {
        $submitted_review = isset($driverreviews->submitted_review)?unserialize($driverreviews->submitted_review):array();
    }
        $guestreviews = 


DB::connection('mysql_veenus')->table('reviews')->where('review_type','2')->where('cart_experience_id', $item->id)->first();?>
            <div class="bookingForm" id="rightColInfo-{{ $item->id }}">
                <span class="headingS">Tour Status</span>
                <span class="headingLL">Completed</span>

                <div class="starsBox">
                    <div class="titleS">Avg Score</div>
                    <div class="starsRow">
                        <?php
                        if(!empty($driverreviews))
                        {
                             $avg_score =  get_avg_score($driverreviews);
                         for ($i=1; $i <= 5; $i++) { 
                            if(isset($avg_score) && ($i <= $avg_score)){
                                echo '<i class="fas fa-star orange"></i>';
                            }else{
                                echo '<i class="fas fa-star"></i>';
                            }
                        }
                        }
                        
                        ?>
                       
                    </div>
                </div>

               <!--  <div class="starsBox">
                    <div class="titleS">Guest Score</div>
                    <div class="starsRow">
                       <?php
                         for ($i=1; $i <= 5; $i++) { 
                            if(isset($guestreviews->stars) && ($i <= $guestreviews->stars)){
                                echo '<i class="fas fa-star orange"></i>';
                            }else{
                                echo '<i class="fas fa-star"></i>';
                            }
                        }
                        ?>
                    </div>
                </div> -->
                 <div class="tourInfoCont">
                           <!--  <div class="infoBox">
                                <span class="left">Check-in</span>
                                <span class="right">{{isset($submitted_review['hotels'][0]['que_1'])?$submitted_review['hotels'][0]['que_1'].'/5':''}}</span>
                            </div>
                            <div class="infoBox">
                                <span class="left">Cleanliness</span>
                                <span class="right">{{isset($submitted_review['hotels'][0]['que_2'])?$submitted_review['hotels'][0]['que_2'].'/5':''}}</span>
                            </div>
                            <div class="infoBox">
                                <span class="left">Food quality</span>
                                <span class="right">{{isset($submitted_review['hotels'][0]['que_3'])?$submitted_review['hotels'][0]['que_3'].'/5':''}}<span>
                            </span></span></div>
                             <div class="infoBox">
                                <span class="left">Service</span>
                                <span class="right">{{isset($submitted_review['feedback_question'][0]['que_4'])?$submitted_review['hotels'][0]['que_4'].'/5':''}}<span>
                            </span></span></div> -->

                            <div class="infoBox">
                                <span class="left">Final Score</span>
                                <span class="right">{{isset($driverreviews->stars)?$driverreviews->stars.'/5':''}}<span>
                            </span></span></div>
                             <div class="infoBox">
                                <span class="left">Use for Marketing</span>
                                <span class="right">{{isset($submitted_review['feedback_question'])?$submitted_review['feedback_question']:''}}<span>
                            </span></span></div>    
                        </div>
               <!--  <a class="orangeLink" href="">View Reviews</a> -->
                <a class="orangeLink" style="background: gray;" href="" href="">Rebook Tour</a>
                <a class="orangeLink" style="background: gray;" href="" href="">Analytics</a>
                <a class="orangeLink" style="background: gray;"  href="" href="">Save Tour</a>
                @if(!empty($driverreviews))
                <a href="javascript:;" data-id="{{$driverreviews->id}}" class="orangeLink openReview" id="openReview{{$item->id}}">Open Review</a>
                 <a href="javascript:;" data-id="{{$driverreviews->id}}" class="orangeLink viewReview" id="viewReview{{$item->id}}">Manage Review</a>
                @endif
                <?php
                if($item->tour_type == 1)
                {
                    ?>
                     <a class="orangeLink docusignStepCls" data-id="{{ $item->id }}" style="background: orange;"  data-urls="{{ route('change-docusign', $item->id) }}" data-tour="{{ route('show-tourpack', $item->id) }}" data-tab="collaborator" href="javascript:void(0)">View ETC</a>
                     <a class="orangeLink hcDateClick" class="hcDateClick" data-id="{{!empty($hotel_dates->id)?$hotel_dates->id:''}}"  href="javascript:void(0)" data-exid="{{$item->experiences_id}}" style="background: orange;" href="">View HC</a>
                     <a target="_blank" href="/tour-overview/{{$item->id}}" class="orangeLink">
                      Tour Overview
                    </a>
                    <?php
                }
                else
                {
                     ?>
                      <a target="_blank" href="/tour-overview-cruise/{{$item->id}}" class="orangeLink">
                      Tour Overview
                    </a>
                     <?php 
                }
                ?>
                
                @if(!empty($guestreviews))
                <!-- <a href="javascript:;" data-id="{{$guestreviews->id}}" class="orangeLink openGuestReview">Open Guest Review</a> -->
               
                @endif
                 
            </div>
        @endforeach
    @endforeach
</div>



<div class="modal fade bd-example-modal-lg" id="reviewModal" tabindex="-1" role="dialog" aria-labelledby="addFolderModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 1200px;">
        <div class="modal-content reviewModalAppendCls">

        </div>
    </div>
</div>
<div class="modal fade bd-example-modal-lg" id="hcModal" tabindex="-1" role="dialog" aria-labelledby="addFolderModalTitle" aria-hidden="true" style="overflow-y: auto;">
        <div class="modal-dialog modal-lg" role="document" style="max-width: 1500px;">
            <div class="modal-content hcModalAppendCls">

            </div>
        </div>
    </div>
    <div class="modal fade bd-example-modal-lg" id="hotelDatesModal" tabindex="-1" role="dialog" aria-labelledby="addFolderModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 1000px;">
        <div class="modal-content hotelDatesModalAppendCls">

        </div>
    </div>
</div>
<?php if(isset($_GET['id'])){
    ?>
    <script type="text/javascript">
        var id = '<?=isset($_GET['id'])?$_GET['id']:''?>';
        var reviewId = '<?=isset($_GET['review'])?$_GET['review']:''?>';
        $('#openBooking-'+id).trigger('click');
            $('.loader').show();    
            $.ajax({
                url: base_url+'/super-user/view-review',
                type: 'POST',
                dataType: 'json',
                data: {'id':reviewId},
                success: function(data) {
                    $('.loader').hide();
                    $('.reviewModalAppendCls').html(data.response);
                    $('#reviewModal').modal('show');
                },
                error: function(e) {
                }
            });
        
    </script>
    
    <?php
} ?>
<script>
     $(document).on('click', '.hcDateClick', function() {
        
        var exp_date_id = $(this).attr('data-id');
        var exp_id = $(this).attr('data-exid');
        $('.loader').show();    
        $.ajax({
            url: base_url+'/super-user/edit-hc',
            type: 'POST',
            data: {'exp_id':exp_id,'exp_date_id':exp_date_id},
            success: function(data) {
                $('.hcModalAppendCls').html(data.response);
                $('.loader').hide();  
                $('#editDocModal').modal('hide');
                $('#hcModal').modal('show');
            },
            error: function(e) {
            }
        });   
    });
     $("body").on("click", '.docusignStepCls', function(e) {
        
        // $('.docusignStepLinkCls').trigger('click');
        var urls = $(this).attr('data-urls');
        var datatab = $(this).attr('data-tab');
        parent.jQuery.fancybox.close();
        var hotelId ='';
        var dataId = $(this).attr('data-id');
        $('.loader').show();    
        $.ajax({
            url: urls,
            type: 'POST',
             // dataType: 'json',
            data: {'hotel_id':hotelId, 'dataId':dataId, 'datatab':datatab, 'popup':'1'},
            success: function(data) {
                $('.loader').hide();    
                $('.hotelDatesModalAppendCls').html(data.response);
                $('#hotelDatesModal').modal({backdrop: 'static', keyboard: false},'show');
                // alert('123');
            },
            error: function(e) {
            }
        });
    }).on('click', '.sendAlert', function(e) {
        e.stopPropagation();
    });
    $(document).ready(function(){
         $(document).on('click', '.displayReview', function() {
            var reviewId = $(this).attr('data-id');
            if(this.checked) {
                var display = 1;
            }else{
                var display = 0;
            }
            $('.loader').show();    
            $.ajax({
                url: base_url+'/super-user/review-status-update',
                type: 'POST',
                 // dataType: 'json',
                data: {'id':reviewId, 'display':display},
                success: function(data) {
                    $('.loader').hide(); 
                    toastSuccess('Status updated successfully!');   
                    window.location.reload();
                },
                error: function(e) {
                }
            });
        });
         $(document).on('click', '.openReview', function() {
            var reviewId = $(this).attr('data-id');
            $('.loader').show();    
            $.ajax({
                url: base_url+'/super-user/view-review',
                type: 'POST',
                dataType: 'json',
                data: {'id':reviewId},
                success: function(data) {
                    $('.loader').hide();
                    $('.reviewModalAppendCls').html(data.response);
                    $('#reviewModal').modal('show');
                },
                error: function(e) {
                }
            });
        });
          $(document).on('click', '.openGuestReview', function() {
            var reviewId = $(this).attr('data-id');
            $('.loader').show();    
            $.ajax({
                url: base_url+'/super-user/view-guest-review',
                type: 'POST',
                dataType: 'json',
                data: {'id':reviewId},
                success: function(data) {
                    $('.loader').hide();
                    $('.reviewModalAppendCls').html(data.response);
                    $('#reviewModal').modal('show');
                },
                error: function(e) {
                }
            });
        });
        $(document).on('click', '.viewReview', function() {
            var reviewId = $(this).attr('data-id');
            $('.loader').show();    
            $.ajax({
                url: base_url+'/super-user/display-review',
                type: 'POST',
                dataType: 'json',
                data: {'id':reviewId},
                success: function(data) {
                    $('.loader').hide();
                    $('.reviewModalAppendCls').html(data.response);
                    $('#reviewModal').modal('show');
                },
                error: function(e) {
                }
            });
        });
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
</script>
