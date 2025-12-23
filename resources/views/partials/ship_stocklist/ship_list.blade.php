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

                <div class="filters_dropdown">

                    <div class="cta">
                        Filters
                    </div>

                     <div class="dropdown">

                        <div class="heading">
                            Filter By
                        </div>
                        <form action="{{ route('ship-stocklist') }}" id="filterForm">
                            
                          
                            <div class="dropdown_section">

                                <!-- <div class="heading">
                                    By Company
                                </div> -->

                                <div class="by_date">

                                    <div class="field">
                                        <div class="label">By Company</div>
                                        <select name="company_id" id="location">
                                            <option value="">Select Company</option>
                                            @foreach ($company as $k => $com)
                                               
                                                    <option value="{{ $com->id }}" <?php echo (isset($_GET['company_id']) && ($_GET['company_id'] == $com->id) ? 'selected' : ''); ?>>
                                                        {{ $com->company_name }}
                                                    </option>
                                                   
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- <div class="field">
                                        <div class="label">Ship</div>
                                        <div class="input_wrapper">
                                            <input type="text" value="{{isset($_GET['hotel_city'])?$_GET['hotel_city']:''}}" name="hotel_city" id="hotel_city">
                                        </div>
                                    </div> -->
                                    <!-- <div class="field">
                                        <div class="label">Hotel Name</div>
                                        <div class="input_wrapper">
                                            <input type="text" value="{{isset($_GET['name'])?$_GET['name']:''}}" name="name" id="name">
                                        </div>
                                    </div> -->
                                    
                                    <div class="dropdown_section">

                                        <input type="submit" class="btn btn-warning" name="submit" value="Filter" style="float: right;color: #fff;font-weight: bold;background:orange;border: orange;margin-top: 39px;" id="submitBtn">
                                    </div>

                                </div>

                            </div>
                        </form>
                       

                    </div> 

                </div>

                <ul class="active_filters">
                    <li class="label">Active filters:<br/>
                        <a href="{{ route('ship-stocklist') }}" style="color: orange;font-weight: normal;text-decoration: underline !important;float: left;">Reset</a></li>
                    <?php if(isset($_GET['company_id']) && $_GET['company_id'] != ''){ ?>
                        <li>Company <a href="javascript:;" id="locationnoRemove"><span>x</span></a></li>
                    <?php } ?>
                    <?php if(isset($_GET['hotel_city']) && $_GET['hotel_city'] != ''){ ?>
                        <li>Town/City. <a href="javascript:;" id="hotelcitynoRemove"><span>x</span></a></li>
                    <?php } ?>
                  
                </ul>

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
                    Ship Name
                </div>

                <div class="left_column__list_column w_12-5">
                    Company Name
                </div>

                <div class="left_column__list_column w_12-5">
                    Months
                </div>

               
                <div class="left_column__list_column w_12-5 centered">
                    Is attached
                </div>
                 <div class="left_column__list_column w_12-5 centered">
                    Dates Booked
                </div>

            </div>
             @foreach($shipList as $key => $proExValue)
            <?php
            // pr($proExValue->HotelDates); exit();
            $months = array();
            $events = '-';
            $count = 0;
            $booked = 0;
            $booked_count  =0;
            if(!empty($proExValue->ShipDates)){
                foreach($proExValue->ShipDates as $k => $v){
                   if(!empty($v->date_in))
                    {
                        if($v->events == 1){
                            $events = 'Yes';
                        }
                        $months[] = date('M',strtotime($v->date_in));
                        $count++;
                    }

                   
                }
            }
            ?>
                <div class="left_column__list_row openBooking" data-id="{{ $proExValue->id }}" id="openBooking-{{ $proExValue->id }}">
                    <div class="left_column__list_column w_30 bold hotelName">
                        {{ $proExValue->name }}
                    </div>
                    <div class="left_column__list_column w_12-5">
                        {{ $proExValue->company_name }}
                    </div>
                    <div class="left_column__list_column w_12-5">
                                             
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
     @foreach($shipList as $key => $proExValue)
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
                                    direct: <span class="orange"><a class="email" href="tel:<?php echo $proExValue->contact_number; ?>" ><?php echo $proExValue->contact_number; ?></a></span>
                                </div>

                                <div>
                                    main: <span class="orange"><a class="email" href="tel:<?php echo $proExValue->phone; ?>" ><?php echo $proExValue->phone; ?></a></span>
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
                        if(!empty($proExValue->ShipDates)){
                            foreach($proExValue->ShipDates as $k => $v){
                                if(!empty($v->date_in))
                                {
                                $booked_dates = 


DB::connection('mysql_veenus')->table('experiences_to_hotels_to_experience_dates')->where([
                                    ['hotel_dates_id', '=', $v->id],['active', '=', 1],['deleted_at', '=',NULL]])->count();

                               /* $booked_dates = 


DB::connection('mysql_veenus')->table('experiences_to_hotels_to_experience_dates')->selectRaw('group_concat(DISTINCT e.tour_id) as tour_id,group_concat(DISTINCT e.id) as exp_id,group_concat(DISTINCT ed.id) as experience_dates_id,group_concat(concat(ed.id,"_",ed.deleted_at)) as experience_deleted_at')->join('experience_dates as ed', 'ed.id', '=', 'experiences_to_hotels_to_experience_dates.experience_dates_id')->leftjoin('experiences as e', 'e.id', '=', 'ed.experiences_id')->where([
                                    ['experiences_to_hotels_to_experience_dates.hotel_dates_id', '=', $v->id],['experiences_to_hotels_to_experience_dates.active', '=', 1],['experiences_to_hotels_to_experience_dates.deleted_at', '=', NULL]])->get()->toArray();*/
                                $activeCls = '';
                                /*if(!empty($booked_dates) && $booked_dates > 0){
                                    $activeCls = 'active';
                                }*/
                                ?>
                                <div style="cursor: pointer;" class="date <?php echo $activeCls; ?> viewAndAddDatesBtn" data-id="{{ $proExValue->id }}">
                                    <?php echo date('D d M',strtotime($v->date_in)).' - '.date('D d M \'y',strtotime($v->date_out)).' ('.$v->night.' nights)'; ?>
                                </div>
                                <?php
                                $aaa = 1;
                                }
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
                        <a data-id="{{ $proExValue->id }}" href="javascript:;" class="cta viewAndAddDatesCancelBtn" data-button="cancel">
                            Cancelled Dates
                        </a>
                         <a data-id="{{ $proExValue->id }}" href="javascript:;" class="cta viewAndAddDatesCompletedBtn" data-button="cancel">
                            Completed Dates
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
                <!-- <input type="hidden" id="hotelDatesId">
                <input type="hidden" id="hotelEmailval"> -->
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a class="btn btn-warning removeHotelDates" href="javascript:;" data-email="yes">Yes, Delete & contact the hotel</a>
                <a class="btn btn-warning removeHotelDates" href="javascript:;" data-email="no">No, Just remove the date</a>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="hotelCancelDatesNoteModal" tabindex="-1" role="dialog" aria-labelledby="addFolderModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: calc(50% - (1.75rem * 8));">
        <div class="modal-content">
            <div class="modal-body" style="padding: 30px;">
                <form method="POST" action="{{ route('stocklist-ship-dates-remove') }}" method="post" enctype="multipart/form-data">
                    @csrf
                <h5 style="font-weight: bold;">Cancel Dates</h5>
                <p>Please add a note and or attach a file. </p>
               
                <input type="hidden" name="hotelDatesId" id="hotelDatesId" value="">
                <input type="hidden" name="hotelEmailval" id="hotelEmailval" value="">
                <input type="hidden" name="hotelEmailcheck" id="hotelEmailcheck" value="">
                <div class="row mb-5">
                    <div class="col-md-12">
                        <label>Notes:</label>
                        <textarea class="form-control" name="cancel_notes" id="notes" maxlength="255"></textarea>
                    </div>
                    <div class="col-md-12">
                        <label>File:</label>
                        <input class="form-control" type="file" name="cancel_file" id="cancel_file">
                    </div>
                </div>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input class="btn btn-warning " type="submit" name="" value="Save">
                <!-- <a class="btn btn-warning removeHotelDates" href="javascript:;" data-email="yes">Cancel</a> -->
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="hotelReinstateDatesModal" tabindex="-1" role="dialog" aria-labelledby="addFolderModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: calc(50% - (1.75rem * 8));">
        <div class="modal-content">
            <div class="modal-body" style="padding: 30px;">
                <h5 style="font-weight: bold;">Reinstate Dates</h5>
                <p>Are you sure you want to reinstate this date?</p>
               
                <input type="hidden" id="hotelDatesId">
                <input type="hidden" id="hotelEmailval">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            
                <a class="btn btn-warning readdHotelDates" href="javascript:;" data-email="no">Yes</a>
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
                 
            },
            error: function(e) {
            }
        });
        $('.loader').hide();   
    }
    </script>
    <?php 
    Session::forget('sel_hotel_id');
}
?>

<script type="text/javascript">
    $("body").on("click", '.filters_dropdown > .cta', function(e) {
        $('.dropdown').toggleClass('filterShow');
    });
     $("body").on("click", '#locationnoRemove', function(e) {
        $('#location').val('');
        $('#submitBtn').click();
    });
      $("body").on("click", '#hotelcitynoRemove', function(e) {
        $('#hotel_city').val('');
        $('#submitBtn').click();
    });
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
<script src="{{ asset('js/pages/stocklist-ship.js') }}"></script>