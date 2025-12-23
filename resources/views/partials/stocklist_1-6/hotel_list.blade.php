<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
<link href="{{ asset('css/listingPage.css') }}" rel="stylesheet">
{{-- <link href="{{ asset('css/style-products.css') }}" rel="stylesheet"> --}}


    <script>
        var base_url = "{{URL::to('/')}}";
    </script>
    <div class="left_column">
        @if(Session::has('success'))
            <div class="alert alert-success">
                {!! session('success') !!}
            </div>
        @elseif(Session::has('error'))
            <div class="alert alert-error">
                {!! session('error') !!}
            </div>
        @endif

        <div class="main_content_nav">

            <div class="filters">

               <!--  <div class="filters_dropdown">

                    <div class="cta">
                        Filters
                    </div>

                    <div class="dropdown">

                        <div class="heading">
                            Filter By
                        </div>

                        <div class="options months">

                            <div class="option">

                                <div class="column checkbox">
                                    <input type="checkbox" id="checkbox_1" checked>
                                    <label for="checkbox_1"></label>
                                </div>

                                <div class="label">
                                    Jan
                                </div>

                            </div>

                            <div class="option">

                                <div class="column checkbox">
                                    <input type="checkbox" id="checkbox_2" checked>
                                    <label for="checkbox_2"></label>
                                </div>

                                <div class="label">
                                    Feb
                                </div>

                            </div>

                            <div class="option">

                                <div class="column checkbox">
                                    <input type="checkbox" id="checkbox_3" checked>
                                    <label for="checkbox_3"></label>
                                </div>

                                <div class="label">
                                    Mar
                                </div>

                            </div>

                            <div class="option">

                                <div class="column checkbox">
                                    <input type="checkbox" id="checkbox_4" checked>
                                    <label for="checkbox_4"></label>
                                </div>

                                <div class="label">
                                    Apr
                                </div>

                            </div>

                            <div class="option">

                                <div class="column checkbox">
                                    <input type="checkbox" id="checkbox_5" checked>
                                    <label for="checkbox_5"></label>
                                </div>

                                <div class="label">
                                    May
                                </div>

                            </div>

                            <div class="option">

                                <div class="column checkbox">
                                    <input type="checkbox" id="checkbox_6" checked>
                                    <label for="checkbox_6"></label>
                                </div>

                                <div class="label">
                                    Jun
                                </div>

                            </div>

                            <div class="line_break"></div>

                            <div class="option">

                                <div class="column checkbox">
                                    <input type="checkbox" id="checkbox_7" checked>
                                    <label for="checkbox_7"></label>
                                </div>

                                <div class="label">
                                    Jul
                                </div>

                            </div>

                            <div class="option">

                                <div class="column checkbox">
                                    <input type="checkbox" id="checkbox_8" checked>
                                    <label for="checkbox_8"></label>
                                </div>

                                <div class="label">
                                    Aug
                                </div>

                            </div>

                            <div class="option">

                                <div class="column checkbox">
                                    <input type="checkbox" id="checkbox_9" checked>
                                    <label for="checkbox_9"></label>
                                </div>

                                <div class="label">
                                    Sep
                                </div>

                            </div>

                            <div class="option">

                                <div class="column checkbox">
                                    <input type="checkbox" id="checkbox_10" checked>
                                    <label for="checkbox_10"></label>
                                </div>

                                <div class="label">
                                    Oct
                                </div>

                            </div>

                            <div class="option">

                                <div class="column checkbox">
                                    <input type="checkbox" id="checkbox_11" checked>
                                    <label for="checkbox_11"></label>
                                </div>

                                <div class="label">
                                    Nov
                                </div>

                            </div>

                            <div class="option">

                                <div class="column checkbox">
                                    <input type="checkbox" id="checkbox_12" checked>
                                    <label for="checkbox_12"></label>
                                </div>

                                <div class="label">
                                    Dec
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <ul class="active_filters">
                    <li class="label">Active filters:</li>
                    <li>Location <span>x</span></li>
                    <li>Town/City <span>x</span></li>
                </ul> -->

            </div>

            <div class="search">

                <div class="search__input">
                    <input type="text" placeholder="Search" id="myInput" onkeyup="myFunction()">
                    <button type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>

                <!-- <a href="#" class="search__expand">

                    <div class="cta">
                        Expand search
                    </div>

                    <div class="dropdown">

                        <div class="heading">
                            Hotel Search
                        </div>

                        <div class="form">

                            <div class="fieldset">
                                <label>Hotel Name</label>
                                <input type="text">
                            </div>

                            <div class="fieldset">
                                <label>Location</label>
                                <input type="text">
                            </div>

                            <div class="fieldset">
                                <label>Town / City</label>
                                <input type="text">
                            </div>

                            <button type="submit">
                                Search
                            </button>

                        </div>

                    </div>

                </a> -->

            </div>

        </div>

        <div class="left_column__list">

            <div class="left_column__list_row header">

                <div class="left_column__list_column w_30">
                    Hotel
                </div>

                <div class="left_column__list_column w_12-5">
                    Location
                </div>

                <div class="left_column__list_column w_12-5">
                    Town/City
                </div>

                <div class="left_column__list_column w_20">
                    Months
                </div>

                <div class="left_column__list_column w_12-5 centered">
                    Events
                </div>

                <div class="left_column__list_column w_12-5 centered">
                    Is attached
                </div>
                 <div class="left_column__list_column w_12-5 centered">
                    Dates Booked
                </div>

            </div>
             @foreach($hotelList as $key => $proExValue)
            <?php
            // pr($proExValue->HotelDates); exit();
            $months = array();
            $events = '-';
            $count = 0;
            $booked = 0;
            $booked_count  =0;
            if(!empty($proExValue->HotelDates)){
                foreach($proExValue->HotelDates as $k => $v){
                    $booked_dates = 


DB::connection('mysql_veenus')->table('experiences_to_hotels_to_experience_dates')->where([
                                    ['hotel_dates_id', '=', $v->id],['active', '=', 1],['deleted_at', '=',NULL]])->count();
                    if(!empty($booked_dates) && $booked_dates > 0){
                        $booked++;
                    }
                    if($v->events == 1){
                        $events = 'Yes';
                    }
                    $months[] = date('M',strtotime($v->date_in));
                    $count++;

                    //booked date
                    $hotel_cart_list =  


DB::connection('mysql_veenus')->table('experiences_to_hotels_to_experience_dates')->selectRaw('ex.id,c.id as cart_id,c.signed_document,experiences_to_hotels_to_experience_dates.experience_dates_id,c.created_at as booked_date')
                           ->leftjoin('experience_dates as ex', 'ex.id', '=', 'experiences_to_hotels_to_experience_dates.experience_dates_id')
                            ->leftjoin('cart_experiences as c', 'c.dates_rates_id', '=', 'ex.dates_rates_id')
                            ->where('experiences_to_hotels_to_experience_dates.hotel_dates_id', $v->id)
                            //->where('experiences_to_hotels_to_experience_dates.deleted_at', NULL)
                            ->where('c.completed','!=',1)

                            ->where('ex.date_from',$v->date_in)
                            ->where('ex.date_to',$v->date_out)
                           /* ->where('c.full_cancel','0')*/
                             ->where('c.full_cancel','=',0)
                            /*->where('cs.tour_statuses_id', '1')->where('cs.sign_name','!=', null)*/->orderBy('experiences_to_hotels_to_experience_dates.id','desc')->get()->toArray();
                            if(!empty($hotel_cart_list[0]->booked_date))
                            {
                               $booked_count++; 
                            }
                }
            }
            ?>
                <div class="left_column__list_row openBooking" data-id="{{ $proExValue->id }}" id="openBooking-{{ $proExValue->id }}">
                    <div class="left_column__list_column w_30 bold hotelName">
                        {{ $proExValue->name }}
                    </div>
                    <div class="left_column__list_column w_12-5">
                        {{ getCountryAreaName($proExValue->country_areas_id) }}
                    </div>
                    <div class="left_column__list_column w_12-5">
                        {{ $proExValue->hotel_city }}                        
                    </div>
                    <div class="left_column__list_column w_20">
                        <?php
                        if(!empty($months)){
                            echo '<a href="javascript:;" class="viewAndAddDatesBtn" data-id="'.$proExValue->id.'" style="color:orange;">'.implode(', ',(array_unique($months))).'</a>';
                        }else{
                            echo '-';
                        }
                        ?>
                        <!-- Apr <strong class="green">May</strong> Jun Aug Sept Oct -->
                    </div>

                    <div class="left_column__list_column w_12-5 centered">
                        <?php if($events == 'Yes'){ ?>
                            <strong class="green">Yes</strong>
                        <?php }else{
                            echo $events;
                        } ?>
                    </div>

                    <div class="left_column__list_column w_12-5 centered">
                        <?php echo $booked; ?>/<?php echo $count; ?>
                    </div>
                    <div class="left_column__list_column w_12-5 centered">
                        <?php echo $booked_count; ?>/<?php echo $count; ?>
                    </div>
                </div>                  
            @endforeach
            <script>
                $(".openBooking").bind("click", function(){
                    var cartExperienceId = $(this).data("id");
                    $(".openBooking").removeClass("active");
                    $(this).addClass("active");
                    $(".bookingForm").hide();
                    $("#rightColInfo-"+cartExperienceId).show();
                });
                function myFunction() {
                        // Declare variables
                        var input, filter, ul, li, a, i, txtValue;
                        input = document.getElementById('myInput');
                        filter = input.value.toUpperCase();
                        var hotelName = $(".hotelName");
                        // var hotelName = $(".hotelName").closest('div');
                        
                        // Loop through all list items, and hide those who don't match the search query
                        for (i = 0; i < hotelName.length; i++) {
                            a = hotelName[i];
                            txtValue = a.textContent || a.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                hotelName[i].closest('.openBooking').style.display = "";
                            } else {
                                hotelName[i].closest('.openBooking').style.display = "none";
                            }
                        }
                    }
            </script>

        </div>

    </div>




 <div class="right_column">
     @foreach($hotelList as $key => $proExValue)
     <div class="bookingForm" id="rightColInfo-{{ $proExValue->id }}" style="display: none;">
                    <div class="intro">

                        <div class="heading">
                            {{ strtoupper($proExValue->name) }}
                        </div>

                        <div class="contact_info">
                            <?php if(!empty($proExValue->contact_name)){ ?>
                            <div class="name">
                                <?php echo ucfirst($proExValue->contact_name); ?> (<?php echo ucfirst($proExValue->contact_position); ?>)
                            </div>
                            <?php }  ?>
                            <div class="block">

                                <div class="sub_heading">
                                    Contact number
                                </div>

                                <div>
                                    direct: <span class="orange"><?php echo $proExValue->contact_number; ?></span>
                                </div>

                                <div>
                                    main: <span class="orange"><?php echo $proExValue->phone; ?></span>
                                </div>

                            </div>

                            <div class="block">

                                <div class="sub_heading">
                                    Email
                                </div>

                                <div>
                                    <a href="mailto:<?php echo $proExValue->email; ?>" class="email">
                                        <?php echo $proExValue->email; ?>
                                    </a>
                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="dates">
                        <?php 
                        $aaa = 0;
                        if(!empty($proExValue->HotelDates)){
                            foreach($proExValue->HotelDates as $k => $v){
                                
                                $booked_dates = 


DB::connection('mysql_veenus')->table('experiences_to_hotels_to_experience_dates')->where([
                                    ['hotel_dates_id', '=', $v->id],['active', '=', 1],['deleted_at', '=',NULL]])->count();

                               /* $booked_dates = 


DB::connection('mysql_veenus')->table('experiences_to_hotels_to_experience_dates')->selectRaw('group_concat(DISTINCT e.tour_id) as tour_id,group_concat(DISTINCT e.id) as exp_id,group_concat(DISTINCT ed.id) as experience_dates_id,group_concat(concat(ed.id,"_",ed.deleted_at)) as experience_deleted_at')->join('experience_dates as ed', 'ed.id', '=', 'experiences_to_hotels_to_experience_dates.experience_dates_id')->leftjoin('experiences as e', 'e.id', '=', 'ed.experiences_id')->where([
                                    ['experiences_to_hotels_to_experience_dates.hotel_dates_id', '=', $v->id],['experiences_to_hotels_to_experience_dates.active', '=', 1],['experiences_to_hotels_to_experience_dates.deleted_at', '=', NULL]])->get()->toArray();*/
                                $activeCls = '';
                                if(!empty($booked_dates) && $booked_dates > 0){
                                    $activeCls = 'active';
                                }
                                ?>
                                <div style="cursor: pointer;" class="date <?php echo $activeCls; ?> viewAndAddDatesBtn" data-id="{{ $proExValue->id }}">
                                    <?php echo date('D d M',strtotime($v->date_in)).' - '.date('D d M \'y',strtotime($v->date_out)).' ('.$v->night.' nights)'; ?>
                                </div>
                                <?php
                                $aaa = 1;
                            }
                        }
                        if($aaa == 0){
                            echo '<span style="text-align:center;display: inline-block;width: 100%;">Dates are not found!</span>';
                        }
                        ?>
                        <!-- <div class="date">
                            Mon 03 May - Fri 07 May '21 (4 nights)
                        </div>

                        <div class="date active">
                            Mon 03 May - Fri 07 May '21 (4 nights)
                        </div> -->

                    </div>

                    <div class="footer_links">

                        <a href="javascript:;" class="cta viewAndAddDatesBtn" data-id="{{ $proExValue->id }}" data-button="">
                            View and Add Dates
                        </a>

                        <a data-id="{{ $proExValue->id }}" href="javascript:void(0);" class="cta" style="background: #ddd;">
                            Calendar View
                        </a>

                        <a data-id="{{ $proExValue->id }}" href="javascript:;" class="cta" style="background: #ddd;">
                            Sold dates
                        </a>

                        <a data-id="{{ $proExValue->id }}" href="javascript:;" class="cta viewAndAddDatesBtn" data-button="cancel">
                            Cancel Dates
                        </a>

                        <a data-id="{{ $proExValue->id }}" href="javascript:;" class="cta" style="background: #ddd;">
                            Contracts
                        </a>

                    </div>
                </div>
    @endforeach
                </div>


<div class="modal fade" id="hotelDatesModal" tabindex="-1" role="dialog" aria-labelledby="addFolderModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: calc(100% - (1.75rem * 8));">
        <div class="modal-content hotelDatesModalAppendCls">
            
        </div>
    </div>
</div>
<div class="modal fade" id="edithotelDatesModal" tabindex="-1" role="dialog" aria-labelledby="addFolderModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: calc(100% - (1.75rem * 8));">
        <div class="modal-content edithotelDatesModalAppendCls">
            
        </div>
    </div>
</div>
<div class="modal fade" id="hotelCancelDatesModal" tabindex="-1" role="dialog" aria-labelledby="addFolderModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: calc(50% - (1.75rem * 8));">
        <div class="modal-content">
            <div class="modal-body" style="padding: 30px;">
                <h5 style="font-weight: bold;">Cancel Dates</h5>
                <p>Cancelling this date will remove the date from sale and all the documents attached to it. Are you sure you want to cancel this date?</p>
                <p>Would you like to inform the hotel about this cancellation?</p>
                <input type="hidden" id="hotelDatesId">
                <input type="hidden" id="hotelEmailval">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a class="btn btn-warning removeHotelDates" href="javascript:;" data-email="yes">Yes, Delete & contact the hotel</a>
                <a class="btn btn-warning removeHotelDates" href="javascript:;" data-email="no">No, Just remove the date</a>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="hotelCancelBookDatesModal" tabindex="-1" role="dialog" aria-labelledby="addFolderModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: calc(50% - (1.75rem * 8));">
        <div class="modal-content">
            <div class="modal-body" style="padding: 30px;">
                <h5 style="font-weight: bold;">Cancel Dates</h5>
                <p>This date is currently booked, please use the Cancel Tour option on the tour overview</p>
               
            </div>
        </div>
    </div>
</div>
<div class="modal fade bd-example-modal-lg" id="editDocModal" tabindex="-1" role="dialog" aria-labelledby="addFolderModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 1100px;">
    <div class="modal-content">
      <div class="modal-body">
        <div class="tour_documents_edit_popup" style="position: relative;padding: 0;">
            <div class="popup_content">
                <div class="heading" style="margin-bottom: 15px;">
                    Edit tour documents
                </div>
                <h5 style="margin-bottom: 30px;">Here you can edit any documents that will be used for the bookings.</h5>
                <select class="form-control" id="checkBookings">
                    <option value="1">Active Bookings</option>
                    <option value="2">Past Bookings</option>
                    <option value="3">Unbooked dates</option>
                </select>
                <div class="tour_dates_header" style="padding: 10px 0px;font-weight: bold;color: #000;">
                    Tour Dates
                </div>
                <div id="appendHtml"></div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade bd-example-modal-lg" id="hcModal" tabindex="-1" role="dialog" aria-labelledby="addFolderModalTitle" aria-hidden="true" style="overflow-y: auto;">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 1500px;">
        <div class="modal-content hcModalAppendCls">

        </div>
    </div>
</div>
<div class="modal fade bd-example-modal-lg" id="etcModal" tabindex="-1" role="dialog" aria-labelledby="addFolderModalTitle" aria-hidden="true" style="overflow-y: auto;">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 1500px;">
        <div class="modal-content etcModalAppendCls">

        </div>
    </div>
</div>
<div style="display: none;">
        @foreach($items as $key => $item)
            <?php /* @foreach($cartItem->cartExperiences as $item) */?>
            <?php 
            if($item->completed == 1){
                continue;
            }
            if($item->cancel_status == 1){
                continue;
            }
            ?>    
        <div class="notIndexContainer"  id="tourOverviewModal-{{ $item->id }}">
            <div class="tour_summary_container">

                <div class="tabs_wrapper">
                    <ul class="tabs" style="margin-bottom: 0px;">

                        <li class="active" href=".tab1">
                            Superuser
                        </li>

                        <li href=".tab2">
                            Collaborator
                        </li>

                        <li href=".tab3">
                            Hotel
                        </li>

                        <li href=".tab4">
                            Experience
                        </li>

                    </ul>
                </div>

                <div class="tab_content tab1">

                    <div class="intro">

                        <div class="heading">
                            {{ $item->experience_name }}
                        </div>

                        <p>
                            <strong>{{ $item->hotel_name }}</strong>
                            {{ date("D d M", strtotime($item->date_from)) }} - {{ date("D d M 'y", strtotime($item->date_to)) }} ( {{ $item->nights }} @if($item->nights > 1) nights @else night @endif )
                        </p>
                        <div class="step_process">

                            <div class="steps">
                                @foreach($tourStatuses as $ts)
                                    @if($ts->id < 11)
                                            <div @if($ts->id == optional($item->tourStatuses->last())->id-1 || optional($item->tourStatuses->last())->id == 11) class="step percentage active" @else class="step percentage" @endif>
                                                {{ $ts->percent }}%
                                            </div>
                                    @endif
                                @endforeach
                            
                            </div>
                             @foreach($tourStatuses as $ts)
                                    @if($ts->id < 11)
                                            @if($ts->id == optional($item->tourStatuses->last())->id) 
                                                <div class="slider">
                                                    <div class="completed" style="width: {{ $ts->percent-15 }}%;"></div>
                                                </div>
                                            @endif
                                    @elseif(optional($item->tourStatuses->last())->id == 11)
                                         <div class="slider">
                                            <div class="completed" style="width:100%;"></div>
                                        </div>            
                                    @endif
                                @endforeach

                            <div class="steps">

                                @foreach($tourStatuses as $ts)
                                    @if($ts->id < 11)
                                        <div class="step">
                                            {{ $ts->name }}
                                        </div>
                                    @endif
                                @endforeach
                                    
                            </div>

                        </div>
                    </div>
                    <?php
                    $newarr = [];
                    foreach ($tourStatuses as $keyyy => $valueee) {
                        $aa = '';
                        foreach ($item->tourStatuses as $kyyy => $vlueee) {
                            if($valueee->id == $vlueee->id){
                                $newarr[] = $vlueee;
                                $aa = 'added';
                            }
                        }
                        if(empty($aa)){
                            $newarr[] = $valueee;                                
                        }
                    }
                    ?>

                    <div class="todo_list">
                         @foreach($newarr as $its)
                            @if(!empty($its->pivot))
                                        @if($its->id < 11)
                                        <?php //if($its->id == '1'){ ?>
                                    <?php 
                                    // pr($tourStatuses);
                                    $today = strtotime(date('Y-m-d'));
                                    $enddate = strtotime($item->date_to);
                                    $style = '';
                                    if($today < $enddate && $its->id == 10){
                                        //$style = 'style="pointer-events:none;"';
                                    }
                                    ?>
                                    <div class="todo @if($its->id == '1') _docusignStepCls @elseif($its->id == '9') tourPackBox @else stepItemSquareActive @endif @if($its->pivot->completed == 1) completed @elseif($its->pivot->due_date < Carbon\Carbon::now()) overdue @endif @if($item->tourStatuses->last()->id == $its->id)) active @endif"  data-id="{{ $item->id }}" data-step="{{ $its->id }}" id="reloadInfo{{$item->id}}"  data-urls="{{ route('change-docusign', $item->id) }}" data-tour="{{ route('show-tourpack', $item->id) }}" data-tab="superuser" <?php echo $style; ?>>

                                            <div class="tick"></div>

                                            <div class="intro test">
                                                <span>{{ ucwords($its->name) }}</span>
                                                <span class="due_date">@if($its->pivot->completed == 1) completed at {{ date('d/m/Y', strtotime($its->pivot->completed_at)) }} @else due {{ date('d/m/Y', strtotime($its->pivot->due_date)) }} @endif</span>
                                                <span>@if($its->pivot->completed == 1) COMPLETED @elseif($its->pivot->due_date < Carbon\Carbon::now()) <span style="color:red">OVERDUE</span> @else NOT COMPLETE @endif</span>
                                                <?php
                                                $experience_dates_rates = 


DB::connection('mysql_veenus')->table('experience_dates_rates')->where('id', $item->dates_rates_id)->where('deleted_at', null)->first();
                                                if(!empty($experience_dates_rates) && $its->id == 5){
                                                    echo '<span>&pound;'.$experience_dates_rates->deposit.'</span>';
                                                }
                                                ?>
                                                
                                            </div>

                                            <div class="excerpt">
                                                <p>
                                                    @if($its->id == 1)
                                                        @if($its->pivot->completed == 1){{ $its->pivot->sign_name }}@else  @endif
                                                    @elseif($its->id == 2)
                                                        @if($its->pivot->completed == 1)
                                                            @if(!empty($its->pivot->url))
                                                                <a target="_blank" href="{{ $its->pivot->url }}" class="linkUrl">{{ $its->pivot->url }}</a>
                                                            @else  @endif
                                                        @else  @endif
                                                    @elseif($its->id == 3)
                                                        @if($its->pivot->completed == 1){{ $its->pivot->step3 }}@else  @endif
                                                    @elseif($its->id == 4)
                                                        @if($its->pivot->completed == 1){{ $its->pivot->step4 }}@else  @endif
                                                    @elseif($its->id == 5)
                                                        @if($its->pivot->completed == 1){{ $its->pivot->step5 }}@else  @endif
                                                    @elseif($its->id == 6)
                                                        @if($its->pivot->completed == 1){{ $its->pivot->step6 }}@else  @endif
                                                    @elseif($its->id == 7)
                                                        @if($its->pivot->completed == 1){{ $its->pivot->step7 }}@else  @endif
                                                    @elseif($its->id == 8)
                                                        @if($its->pivot->completed == 1){{ $its->pivot->step8 }}@else  @endif
                                                    @elseif($its->id == 9)
                                                        @if($its->pivot->completed == 1){{ $its->pivot->step9 }}@else  @endif
                                                    @elseif($its->id == 10)
                                                        @if($its->pivot->completed == 1){{ $its->pivot->step10 }}@else  @endif
                                                    @endif
                                                </p>
                                            </div>

                                            <div class="ctas">
                                                <a href="javascript:;" data-tab="collaborator" class="cta @if($its->id == '1') docusignStepCls @endif">view</a>
                                                
                                                @if($its->id == 10)
                                                    <a href="javascript:;" data-href="{{route('tourReview', $item->id)}}" class="cta copyLink">copy link</a>
                                                    <a target="_blank" href="{{route('tourReview', $item->id)}}" class="cta completeReview">complete review</a>
                                                @else
                                                    <a href="javascript:;" class="cta @if($its->id == '1') docusignStepCls @elseif($its->id == '3' || $its->id == '4' || $its->id == '6') editTracking @elseif($its->id == '7') editGuestList @endif" data-tab="superuser">edit</a>
                                                    <a href="javascript:;" class="cta sendAlert">send alert</a>
                                                @endif
                                            </div>

                                        </div>

                                <?php //} ?>

                                @endif
                                @else
                                     @if($its->id < 11)
                                        <?php
                                            $today = strtotime(date('Y-m-d'));
                                            $enddate = strtotime($item->date_to);
                                            $style = '';
                                            if($today < $enddate && $its->id == 10){
                                                $style = 'style="pointer-events:none;"';
                                            }
                                        ?>
                                             <div class="todo" <?php echo $style; ?>>

                                                <div class="intro">
                                                    <span>{{ $its->name }}</span>
                                                    <span class="due_date">-</span>
                                                    <span>NOT COMPLETE</span>
                                                    <?php
                                                    $experience_dates_rates = 


DB::connection('mysql_veenus')->table('experience_dates_rates')->where('id', $item->dates_rates_id)->where('deleted_at', null)->first();
                                                    if(!empty($experience_dates_rates) && $its->id == 5){
                                                        echo '<span>&pound;'.$experience_dates_rates->deposit.'</span>';
                                                    }
                                                    ?>
                                                </div>

                                                <div class="excerpt">
                                                    <p class="large blue">
                                                      
                                                    </p>
                                                </div>

                                                <div class="ctas">
                                                    <a href="#" class="cta">edit</a>
                                                    <a href="#" class="cta">send alert</a>
                                                </div>

                                            </div>
                                            

                                        @endif
                                @endif

                            @endforeach

                            
                    </div>
                    <div class="details">

                        <div class="section">

                            <div class="column w_flex">

                                <div class="white_box">

                                    <div class="heading with_cta">
                                        Experiences
                                        <a href="#" class="cta">change</a>
                                    </div>

                                    <div class="box_listings">
                                        
                                        <?php
                                        $cnt = 1;
                                         foreach ($item->experiencesToAttraction as $keyEE => $_valueEE) { 
                                             $valueEE = 


DB::connection('mysql_veenus')->table('attractions')->where("id", $_valueEE->attractions_id)->first();
                                             $addclss = '';
                                             if(!empty($valueEE->date)){
                                                $addclss = 'completed';
                                             }
                                         ?>
                                            <div class="listing showExep{{$cnt}} bookingdiv{{$valueEE->id}} {{$addclss}}">
                                                <div class="tick"></div>
                                                <div class="sub_heading">
                                                    Experience {{$cnt}} <i class="fas fa-caret-up"></i>
                                                </div>
                                                <div class="name">
                                                    {{ $valueEE->name }}
                                                </div>
                                                <div class="excerpt">
                                                    <p>
                                                        {{ str_limit($valueEE->description, 150) }}
                                                        
                                                    </p>
                                                </div>
                                                <div class="info">

                                                    <div class="info_row">

                                                        <div class="info_column">
                                                            <strong>Contact:</strong> {{ $valueEE->main_contact_number }} - {{ $valueEE->contact_name }}
                                                        </div>

                                                    </div>

                                                    <div class="info_row">

                                                        <div class="info_column">
                                                            <strong>Date:</strong> <span class="bookingDate">{{ (!empty($valueEE->date) ? date('d M \'y',strtotime($valueEE->date)) : '') }}</span>
                                                        </div>

                                                        <div class="info_column">
                                                            <strong>Time:</strong> <span class="bookingTime">{{ (!empty($valueEE->time) ? date('H:i',strtotime($valueEE->time)) : '00') }}</span> hrs
                                                        </div>
                                                        
                                                    </div>

                                                </div>
                                                    <a class="add_booking" data-fancybox="" data-type="ajax" data-src="" href="<?='add-bookings/'.$valueEE->id.'/'.$item->experiences_id?>">
                                                    <?php 
                                                    if(empty($valueEE->date)){
                                                        echo "Add booking";
                                                    }else{
                                                        echo "Edit booking";
                                                    } ?>
                                                    </a>
                                            </div>
                                        <?php 
                                            $cnt++;
                                        } ?>

                                        

                                    </div>

                                </div>

                                <div class="white_box">

                                    <div class="heading with_cta">
                                        Hotels
                                        <a href="#" class="cta">change</a>
                                    </div>

                                    <div class="box_listings">

                                        <div class="listing">

                                            <div class="sub_heading">
                                                Hotel 1 <i class="fas fa-caret-up"></i>
                                            </div>

                                            <div class="name">
                                                {{ $item->hotel_name }}
                                            </div>

                                            <div class="info">

                                                <div class="info_row">

                                                    <div class="info_column">
                                                        <strong>Address:</strong> Innerleithen Road, Peebles, Scotland, EH45 8LX
                                                    </div>

                                                </div>

                                                <div class="info_row">

                                                    <div class="info_column">
                                                        <strong>Contact:</strong> 01764 651 846 - Sam Smith
                                                    </div>
                                                    
                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="column w_set_360">

                                <div class="white_box h_100">

                                    <div id="other">

                                        <div class="box">

                                            <div class="sub_heading">
                                                Current nos.
                                            </div>

                                            <div class="current_nos">
                                                {{ $item->num_rooms }}
                                            </div>
                                            <?php 
                                            $cartExperiencesToRooms = App\Models\Cms\CartExperiencesToRooms::with('cartExperiencesToRoomsRequests')->whereIn('room_request_status',['self'])->where("cart_exp_id", $item->id)->get();
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
                                            ?>
                                            <div class="rooms">
                                                <strong>{{$sngtotal}}</strong> sgl <strong>{{$dbltotal}}</strong> dbl <strong>{{$twntotal}}</strong> twn
                                            </div>

                                            <div class="ctas">
                                                <!-- <a class="cta tourOverviewButton" data-fancybox data-type="ajax" data-src="" href="{{ route('change-rooms', $item->id) }}" id="reloadInfo{{$item->id}}">Update Tracking</a> -->
                                                <a class="cta tourOverviewButton" data-fancybox data-type="ajax" data-src="" href="{{ route('change-rooms', $item->id) }}" id="reloadInfo{{$item->id}}">Guest List</a>
                                            </div>

                                        </div>

                                        <div class="box red">

                                            <div class="sub_heading">
                                                Cancellation Deadline
                                            </div>
                                                                            
            <?php
            if($item->completed == 1){
                                continue;
                            }
            if($item->cancel_status == 1){
                continue;
            }
            $cancellation_days = array(0); 
            if(!empty($item->dates_rates_id)){
                $experience_dates = 


DB::connection('mysql_veenus')->table('experience_dates')->where('dates_rates_id', $item->dates_rates_id)->where('experiences_id', $item->experiences_id)->where('deleted_at', null)->get()->toArray();
                
                if(!empty($experience_dates)){
                    foreach ($experience_dates as $key => $value) {
                        $cancellation_days[] = $value->cancellation_days;
                    }
                }
            }
            //echo '<pre>' ;  print_r($cancellation_days); echo '</pre>' ;  
            ?>


                                            <div class="cancellation_deadline">
                                            
                                                <?php //echo date('d.m.Y',strtotime('-30 days',strtotime($item->date_from))) . PHP_EOL; ?>  
                                                <?php if(max($cancellation_days) > 0){
                                                        echo date('d/m/Y',strtotime('-'.max($cancellation_days).' days', strtotime($item->date_from)));
                                                        echo '<br/>';
                                                        echo "(" .  max($cancellation_days) ." " . " Days)";
                                                    }else{
                                                        echo '---';
                                                    } ?>
                                            </div>

                                            <div class="ctas">
                                                <a href="javascript:;" class="cta large cancleTour" data-id="{{ $item->id }}" data-url="{{ route('cancle-tour',$item->id) }}" style="background: red;">Cancel Tour</a>
                                            </div>

                                        </div>

                                        <div class="box">

                                            <div class="sub_heading">
                                                Collaborator selling price
                                            </div>

                                            <div class="text_intro">
                                                Enter the price shown on the collaborator URL link
                                            </div>

                                            <div class="fields">

                                                <div class="field">
                                                    <div class="label">Price</div>
                                                    <input type="text" value="£0.00">
                                                </div>

                                                <div class="field">
                                                    <div class="label">SRS</div>
                                                    <input type="text" value="£0.00">
                                                </div>

                                            </div>

                                            <div class="ctas">
                                                <a href="#" class="cta save">Save</a>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>
                        <div class="section">

                            <div class="column w_40">

                                <div class="white_box">

                                    <div class="heading">
                                        Costs
                                    </div>

                                    <div class="table">

                                        <div class="row">

                                            <div class="label">
                                                <strong>Date:</strong> {{ date('d/m/Y', strtotime($item->date_from)) }} - {{ date('d/m/Y', strtotime($item->date_to)) }} ({{ $item->nights }} nights)
                                                
                                            </div>

                                            <div class="price">
                                                &pound;0pp
                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="label">
                                                <strong>Hotel Upgrades:</strong> None
                                            </div>

                                            <div class="price">
                                                &pound;0pp
                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="label">
                                                <strong>Upscales:</strong> 1881 Distillery & Gin School
                                            </div>

                                            <div class="price">
                                                &pound;0pp
                                            </div>

                                        </div>

                                        <div class="totals">

                                            <div class="row">

                                                <div class="price">
                                                    Total: &pound;0pp
                                                </div>

                                            </div>

                                            <div class="row">

                                                <div class="price">
                                                    SRS: &pound;0pp
                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="column w_60">

                                <div class="white_box h_100"></div>

                            </div>

                        </div>
                        <div class="section">

                            <div class="column w_100">

                                <div class="white_box">

                                    <div class="heading">
                                        Notes
                                    </div>

                                    <div id="notes_form">

                                        <div class="sub_heading">
                                            Add a new note
                                        </div>

                                        <input type="text" placeholder="Initials" />
                                        <textarea type="text" placeholder="Type here" rows="7"></textarea>

                                        <button type="submit">
                                            Add
                                        </button>

                                    </div>

                                    <div id="notes">

                                        <div class="sub_heading">
                                            Tour Notes
                                        </div>

                                        <div class="notes">

                                            <div class="note">

                                                <div class="header">
                                                    <div class="initials">MK</div>
                                                    <div class="date">21/01/20</div>
                                                </div>

                                                <div class="body">
                                                    Itv Studio Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras ultrices lobortis interdum. Duis ultricies commodo est, a pretium lectus facilisis vitae.
                                                </div>

                                            </div>

                                            <div class="note">

                                                <div class="header">
                                                    <div class="initials">GK</div>
                                                    <div class="date">20/12/19</div>
                                                </div>

                                                <div class="body">
                                                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam.
                                                </div>

                                            </div>

                                            <div class="note">

                                                <div class="header">
                                                    <div class="initials">GK</div>
                                                    <div class="date">06/09/19</div>
                                                </div>

                                                <div class="body">
                                                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
                                                </div>

                                            </div>

                                            <div class="note">

                                                <div class="header">
                                                    <div class="initials">GK</div>
                                                    <div class="date">30/03/19</div>
                                                </div>

                                                <div class="body">
                                                    Itv Studio Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras ultrices lobortis interdum. Duis ultricies commodo est, a pretium lectus facilisis vitae.

                                                </div>

                                            </div>

                                            <div class="note">

                                                <div class="header">
                                                    <div class="initials">MP</div>
                                                    <div class="date">21/02/19</div>
                                                </div>

                                                <div class="body">
                                                    Itv Studio Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras ultrices lobortis interdum. Duis ultricies commodo est, a pretium lectus facilisis vitae.

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <div class="tab_content tab2" style="display:none;">
                    <div class="intro">

                        <div class="heading">
                            {{ $item->experience_name }}
                        </div>

                        <p>
                            <strong>{{ $item->hotel_name }}</strong>
                            {{ date("D d M", strtotime($item->date_from)) }} - {{ date("D d M 'y", strtotime($item->date_to)) }} ( {{ $item->nights }} @if($item->nights > 1) nights @else night @endif )
                        </p>
                        <div class="step_process">

                            <div class="steps">
                                @foreach($tourStatuses as $ts)
                                    @if($ts->id < 11)
                                            <div @if($ts->id == optional($item->tourStatuses->last())->id-1 || optional($item->tourStatuses->last())->id == 11) class="step percentage active" @else class="step percentage" @endif>
                                                {{ $ts->percent }}%
                                            </div>
                                    @endif
                                @endforeach
                            
                            </div>
                             @foreach($tourStatuses as $ts)
                                    @if($ts->id < 11)
                                            @if($ts->id == optional($item->tourStatuses->last())->id) 
                                                <div class="slider">
                                                    <div class="completed" style="width: {{ $ts->percent-15 }}%;"></div>
                                                </div>
                                            @endif
                                     @elseif(optional($item->tourStatuses->last())->id == 11)
                                         <div class="slider">
                                            <div class="completed" style="width:100%;"></div>
                                        </div>       
                                    @endif
                                @endforeach

                            <div class="steps">

                                @foreach($tourStatuses as $ts)
                                    @if($ts->id < 11)
                                        <div class="step">
                                            {{ $ts->name }}
                                        </div>
                                    @endif
                                @endforeach
                                    
                            </div>

                        </div>
                    </div>
                    <?php
                    $newarr = [];
                    foreach ($tourStatuses as $keyyy => $valueee) {
                        $aa = '';
                        foreach ($item->tourStatuses as $kyyy => $vlueee) {
                            if($valueee->id == $vlueee->id){
                                $newarr[] = $vlueee;
                                $aa = 'added';
                            }
                        }
                        if(empty($aa)){
                            $newarr[] = $valueee;                                
                        }
                    }
                    ?>
                    <div class="todo_list">
                         @foreach($newarr as $its)
                            @if(!empty($its->pivot))
                                        @if($its->id < 11)
                                        <?php 
                                    $today = strtotime(date('Y-m-d'));
                                    $enddate = strtotime($item->date_to);
                                    $style = '';
                                    if($today < $enddate && $its->id == 10){
                                        $style = 'style="pointer-events:none;"';
                                    }
                                    ?>
                                        <?php //if($its->id == '1'){ ?>
                                    <div class="todo @if($its->id == '1') _docusignStepCls @elseif($its->id == '9') tourPackBox @elseif($its->id != '5' && $its->id != '8' && $its->id != '9') stepItemSquareActive @endif @if($its->pivot->completed == 1) completed @elseif($its->pivot->due_date < Carbon\Carbon::now()) overdue @endif @if($item->tourStatuses->last()->id == $its->id)) active @endif"  data-id="{{ $item->id }}" data-step="{{ $its->id }}" id="reloadInfo{{$item->id}}"  data-urls="{{ route('change-docusign', $item->id) }}" data-tour="{{ route('show-tourpack', $item->id) }}" data-tab="collaborator" <?php echo $style; ?>>

                                            <div class="tick"></div>

                                            <div class="intro">
                                                <span>{{ ucwords($its->name) }}</span>
                                                <span class="due_date">@if($its->pivot->completed == 1) completed at {{ date('d/m/Y', strtotime($its->pivot->completed_at)) }} @else due {{ date('d/m/Y', strtotime($its->pivot->due_date)) }} @endif</span>
                                                <span>@if($its->pivot->completed == 1) COMPLETED @elseif($its->pivot->due_date < Carbon\Carbon::now()) <span style="color:red">OVERDUE</span> @else NOT COMPLETE @endif</span>
                                            </div>

                                            <div class="excerpt">
                                                <p>
                                                    @if($its->id == 1)
                                                        @if($its->pivot->completed == 1){{ $its->pivot->sign_name }}@else  @endif
                                                    @elseif($its->id == 2)
                                                        @if($its->pivot->completed == 1)
                                                            @if(!empty($its->pivot->url))
                                                                <a target="_blank" href="{{ $its->pivot->url }}" class="linkUrl">{{ $its->pivot->url }}</a>
                                                            @else  @endif
                                                        @else  @endif
                                                    @elseif($its->id == 3)
                                                        @if($its->pivot->completed == 1){{ $its->pivot->step3 }}@else  @endif
                                                    @elseif($its->id == 4)
                                                        @if($its->pivot->completed == 1){{ $its->pivot->step4 }}@else  @endif
                                                    @elseif($its->id == 5)
                                                        @if($its->pivot->completed == 1){{ $its->pivot->step5 }}@else  @endif
                                                    @elseif($its->id == 6)
                                                        @if($its->pivot->completed == 1){{ $its->pivot->step6 }}@else  @endif
                                                    @elseif($its->id == 7)
                                                        @if($its->pivot->completed == 1){{ $its->pivot->step7 }}@else  @endif
                                                    @elseif($its->id == 8)
                                                        @if($its->pivot->completed == 1){{ $its->pivot->step8 }}@else  @endif
                                                    @elseif($its->id == 9)
                                                        @if($its->pivot->completed == 1)
                                                        <a href="javascript:;"><i class="fas fa-file-pdf fa-2x" style="color: #FCA311;"></i></a>
                                                        @else 
                                                        <a href="javascript:;"><i class="fas fa-file-pdf fa-2x" style="color: #FCA311;"></i></a>
                                                         @endif
                                                    @elseif($its->id == 10)
                                                        @if($its->pivot->completed == 1){{ $its->pivot->step10 }}@else  @endif
                                                    @endif
                                                </p>
                                            </div>

                                            <div class="ctas">
                                                @if($its->id != '5' && $its->id != '8')
                                                @if($its->id == '1' && $its->pivot->completed == 1)
                                                    <a href="javascript:;" data-tab="collaborator" class="cta @if($its->id == '1') docusignStepCls @endif">view</a>
                                                @endif
                                                 @if($its->id == '1')
                                                    @if($its->pivot->completed != 1)
                                                     <a href="javascript:;" class="cta docusignStepCls" data-tab="collaborator">sign</a>
                                                    @else
                                                    <a href="#" class="cta">download</a>
                                                    @endif
                                                 @elseif($its->id == 10)
                                                    <a href="javascript:;" data-href="{{route('tourReview', $item->id)}}" class="cta copyLink">copy link</a>
                                                    <a target="_blank" href="{{route('tourReview', $item->id)}}" class="cta completeReview">complete review</a>
                                                    <a href="javascript:;" class="cta" data-tab="collaborator">edit</a>
                                                @elseif($its->id != '9')
                                                
                                                    <a href="javascript:;" class="cta @if($its->id == '1') docusignStepCls @elseif($its->id == '3' || $its->id == '4' || $its->id == '6') editTracking @elseif($its->id == '7') editGuestList @endif" data-tab="collaborator">edit</a>
                                                    @else
                                                    <a href="#" class="cta">download</a>
                                                    @endif
                                                @endif
                                            </div>

                                        </div>

                                <?php //} ?>

                                @endif
                                @else
                                    @if($its->id < 11)
                                    <?php 
                                    $today = strtotime(date('Y-m-d'));
                                    $enddate = strtotime($item->date_to);
                                    $style = '';
                                    if($today < $enddate && $its->id == 10){
                                        $style = 'style="pointer-events:none;"';
                                    }
                                    ?>
                                             <div class="todo" <?php echo $style; ?>>

                                                <div class="intro">
                                                    <span>{{ $its->name }}</span>
                                                    <span class="due_date">-</span>
                                                    <span>NOT COMPLETE</span>
                                                </div>

                                                <div class="excerpt">
                                                    <p class="large blue">
                                                     
                                                    </p>
                                                </div>

                                            </div>
                                            

                                        @endif
                                @endif
                            @endforeach

                    </div>
                    <div class="details">
                        <div class="section">

                            <div class="column w_40">

                                <div class="white_box">

                                    <div class="heading">
                                        Hotel
                                    </div>

                                    <div class="text_listings">

                                        <div class="listing">

                                            <div class="sub_heading">
                                                {{ $item->hotel_name }}
                                            </div>

                                            <ul class="info">

                                                <li>
                                                    <strong>Bowhill House and Grounds</strong>
                                                </li>

                                                <li>
                                                    <strong>Address:</strong> Bowhill House, Bowhill, Selkirk, Scottish Borders, TD7 5ET
                                                </li>

                                                <li>
                                                    <strong>Contact:</strong> 0175 022 2041
                                                </li>

                                            </ul>

                                        </div>

                                    </div>

                                </div>

                                <div class="white_box">

                                    <div class="heading">
                                        Experiences
                                    </div>

                                    <div class="text_listings">
                                        <?php
                                        $cnt = 1;
                                        foreach ($item->experiencesToAttraction as $keyEE => $_valueEE) { 
                                             $valueEE = 


DB::connection('mysql_veenus')->table('attractions')->where("id", $_valueEE->attractions_id)->first();
                                         ?>
                                            <div class="listing showExep{{$cnt}} _completed">
                                                <div class="tick"></div>
                                                <div class="sub_heading">
                                                    Experience {{$cnt}}
                                                </div>

                                                <ul class="info">

                                                    <li>
                                                        <strong>{{ $valueEE->name }}</strong>
                                                    </li>

                                                    <li>
                                                        <strong>Address:</strong> Bowhill House, Bowhill, Selkirk, Scottish Borders, TD7 5ET
                                                    </li>

                                                    <li>
                                                        <strong>Contact:</strong> 0175 022 2041
                                                    </li>

                                                </ul>

                                            </div>
                                        <?php 
                                            $cnt++;
                                        } ?>

                                    </div>

                                </div>

                            </div>

                            <div class="column w_60 flex">

                                <div class="section">

                                    <div class="column w_33">

                                        <div id="other" class="flex">

                                            <div class="box green">

                                                <div class="sub_heading">
                                                    Current nos.
                                                </div>

                                                <div class="current_nos">
                                                    {{ $item->num_rooms }}
                                                </div>

                                                <div class="rooms large">
                                                    <strong>{{$sngtotal}}</strong> sgl <strong>{{$dbltotal}}</strong> dbl <strong>{{$twntotal}}</strong> twn
                                                </div>

                                                <div class="ctas">
                                                    <a class="cta tourOverviewButton" data-fancybox data-type="ajax" data-src="" href="{{ route('change-rooms', $item->id) }}" id="_reloadInfo{{$item->id}}">Guest List</a>
                                                </div>

                                            </div>

                                            <div class="box red">

                                                <div class="sub_heading">
                                                    Cancellations
                                                </div>

                                                <div class="text_intro">
                                                    Cancellation deadline
                                                </div>

                                                <div class="cancellation_deadline ddfd">
                                                   <?php //echo date('d.m.Y',strtotime('-30 days',strtotime($item->date_from))) . PHP_EOL; ?> 
                                                     <?php if(max($cancellation_days) > 0){
                                                        echo date('d/m/Y',strtotime('-'.max($cancellation_days).' days', strtotime($item->date_from)));
                                                        echo '<br/>';
                                                        echo "(" .  max($cancellation_days) . " " ."Days)";
                                                    }else{
                                                        echo '---';
                                                    } ?>
                                                </div>

                                                <div class="ctas">
                                                    <a href="javascript:;" class="cta large cancleTour" data-id="{{ $item->id }}" data-url="{{ route('cancle-tour',$item->id) }}" style="background: red;">Cancel Tour</a>
                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="column w_66">

                                        <div class="white_box">

                                            <div class="heading">
                                                Costs
                                            </div>

                                            <div class="table">

                                                <div class="row">

                                                    <div class="label">
                                                        <strong>Date:</strong> {{ date('d/m/Y', strtotime($item->date_from)) }} - {{ date('d/m/Y', strtotime($item->date_to)) }} ({{ $item->nights }} nights)
                                                    </div>

                                                    <div class="price">
                                                        &pound;0pp
                                                    </div>

                                                </div>

                                                <div class="row">

                                                    <div class="label">
                                                        <strong>Hotel Upgrades:</strong> None
                                                    </div>

                                                    <div class="price">
                                                        &pound;0pp
                                                    </div>

                                                </div>

                                                <div class="row">

                                                    <div class="label">
                                                        <strong>Upscales:</strong> 1881 Distillery & Gin School
                                                    </div>

                                                    <div class="price">
                                                        &pound;0pp
                                                    </div>

                                                </div>

                                                <div class="totals">

                                                    <div class="row">

                                                        <div class="price">
                                                            Total: &pound;0pp
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="white_box">

                                            <div class="heading">
                                                Cost calculator per person
                                            </div>

                                            <div class="table" id="cost_calculator">

                                                <div class="row">

                                                    <div class="label">
                                                        <strong>Transfer costs:</strong>
                                                    </div>

                                                    <div class="input_wrapper">
                                                        <span>&pound;</span>
                                                        <input type="text" value="0" />
                                                    </div>

                                                </div>

                                                <div class="row">

                                                    <div class="label">
                                                        <strong>Cost of coach per day:</strong>
                                                    </div>

                                                    <div class="input_wrapper">
                                                        <span>&pound;</span>
                                                        <input type="text" value="0" />
                                                    </div>

                                                </div>

                                                <div class="row">

                                                    <div class="label">
                                                        <strong>Total cost:</strong>
                                                    </div>

                                                    <div class="price">
                                                        &pound;0pp
                                                    </div>

                                                </div>

                                                <div class="row">

                                                    <div class="label">
                                                        <strong>Input your margin:</strong>
                                                    </div>

                                                    <div class="input_wrapper">
                                                        <input type="text" value="15" />
                                                        <span>%</span>
                                                    </div>

                                                </div>

                                                <div class="row">

                                                    <div class="label">
                                                        <strong>Total with margin:</strong>
                                                    </div>

                                                    <div class="price large">
                                                        &pound;0pp
                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div class="section flex_1">

                                    <div class="column w_100">

                                        <div class="white_box h_100"></div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="section">

                            <div class="column w_100">

                                <div class="white_box">

                                    <div class="heading">
                                        Tour Notes
                                    </div>

                                    <div id="notes_form">

                                        <div class="sub_heading">
                                            Add a new note
                                        </div>

                                        <textarea type="text" placeholder="Type here" rows="7"></textarea>

                                        <button type="submit">
                                            Add
                                        </button>

                                    </div>

                                    <div id="notes">

                                        <div class="sub_heading">
                                            Tour Notes
                                        </div>

                                        <div class="notes">

                                            <div class="note">

                                                <div class="header">
                                                    <div class="initials">MK</div>
                                                    <div class="date">21/01/20</div>
                                                </div>

                                                <div class="body">
                                                    Itv Studio Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras ultrices lobortis interdum. Duis ultricies commodo est, a pretium lectus facilisis vitae.
                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>
                
                <div class="tab_content tab4" style="display:none;">
                  
                    <div class="intro">
                    
                        <div class="heading">
                                                {{ $item->experience_name }}
                        <span class="headingS">{{ $item->hotel_name }}</span>
                                                 
                         </div>
                        <div>
                            @foreach($item->experiencesToExperiences as $ts)
                                <div class="hotel">
                                   
                                    {{ $ts->name }}

                                
                                </div>
                           @endforeach

                            
                        </div>
                          </div>
                                            
                    </div>
                
                
            </div>
            <script>
                $(".stepItemSquareActive").bind("click", function(event){
                    if(event.target.className != 'cta sendAlert' && event.target.className != 'cta copyLink' && event.target.className != 'cta completeReview' && event.target.className != 'linkUrl' && event.target.className != 'cta  editTracking ' && event.target.className != 'cta  editGuestList '){

                        var cartExperienceId = $(this).data("id");
                        var stepId = $(this).data("step");
                        console.log("here");
                        $.fancybox.open(
                            $("#bookingFormBox-"+cartExperienceId+"step-"+stepId).html() , {
                                closeExisting: true,
                                touch: false
                            }
                        );
                        
                    }

                });
                
            </script>
        </div>
          <?php /*  @endforeach */?>
        @endforeach
    </div>
 <?php
$hotel_id = Session::get('sel_hotel_id');
if(isset($hotel_id) && !empty($hotel_id))
{

    ?>
    <script type="text/javascript">
    var hotelId = '<?=$hotel_id?>';
    var databutton = '';

    open_dates_rates(hotelId,databutton);
    function open_dates_rates(hotelId,databutton)
    {
        $('.loader').show();    
        $.ajax({
            url: base_url+'/super-user/stocklist-hotel-dates',
            type: 'POST',
             // dataType: 'json',
            data: {'hotel_id':hotelId,'databutton':databutton},
            success: function(data) {
                $('.hotelDatesModalAppendCls').html(data.response);
               /* $('#proToMoveId').val(protoid);
                $('#productMoveId').val(protoTypeId);*/
                select2Load();
                datepickerFun();
                $('.dateNum').mask('00/00/0000');
                $('#stocklistHotelDatesCreateForm').validate(addDateValidateOpt);
                $('#hotelDatesModal').modal('show');
                $(".hotelDatesMainCls").each(function() {
                    var ids = $(this).attr('data-id');
                    // console.log(ids);
                    datepickerStartEndDate(ids);
                });
                $('.hdioCls').hide();
                $('.loader').hide();    
            },
            error: function(e) {
            }
        });
    }
    </script>
    <?php 
    Session::forget('sel_hotel_id');
}
?>

<script type="text/javascript">
    $('.modal').on("hidden.bs.modal", function (e) { //fire on closing modal box
        if ($('.modal:visible').length) { // check whether parent modal is opend after child modal close
            $('body').addClass('modal-open'); // if open mean length is 1 then add a bootstrap css class to body of the page
        }
    });
    $(document).on('click', '.tourOverviewButton', function() {        
        var cartExperienceId = $(this).data("id");

        $.fancybox.open(
            //$("#bookingFormBox-"+cartExperienceId).html() , {
            $("#tourOverviewModal-"+cartExperienceId).html() , {
                closeExisting: true,
                touch: false
            }
        );

    });
        $(document).on('change', '#checkBookings', function() {
        
        var id = $(this).val();
        if(id == 1){
            $('.pastDate').hide();
            $('.unbookedDate').hide();
            $('.activeDate').show();
        }else if(id == 2){
            $('.pastDate').show();
            $('.activeDate').hide();
            $('.unbookedDate').hide();
        }else if(id == 3){
            $('.unbookedDate').show();
            $('.pastDate').hide();
            $('.activeDate').hide();
        }
    });
    $(document).on('click', '.expDateClick', function() {
        var exp_date_id = $(this).attr('data-id');
        var exp_id = $(this).attr('data-exid');
        $('.loader').show();    
        $.ajax({
            url: base_url+'/super-user/edit-etc',
            type: 'POST',
            data: {'exp_id':exp_id,'exp_date_id':exp_date_id},
            success: function(data) {
                $('.etcModalAppendCls').html(data.response);
                $('.loader').hide();  
                $('#editDocModal').modal('hide');
                $('#etcModal').modal('show');
            },
            error: function(e) {
            }
        });   
    });
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
    var mealBasicListArray = [];
    var mealBasicListObj = {};
    <?php foreach ($MealBasicList as $keyMeal => $valueMeal) { ?>
        mealBasicListObj['<?php echo $valueMeal->id;?>'] = '<?php echo $valueMeal->name;?>';
    <?php } ?>
    mealBasicListArray.push(mealBasicListObj);
    
    var commissionListArray = [];
    var commissionListListObj = {};
    <?php foreach ($CommissionList as $keyMeal => $valueMeal) { ?>
        commissionListListObj['<?php echo $valueMeal->id;?>'] = '<?php echo $valueMeal->name;?>';
    <?php } ?>
    commissionListArray.push(commissionListListObj);
    
</script>
<script src="{{ asset('js/popper.min.js') }}"></script> 
<script src="{{ asset('js/bootstrap.min.js') }}"></script> 
<script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script> 
<script src="https://dev.rlogical.com/epic/resources/js/moment.min.js"></script>
<script src="{{ asset('js/jquery.mask.min.js') }}"></script>
<script src="{{ asset('js/pages/stocklist-hotel.js') }}"></script>