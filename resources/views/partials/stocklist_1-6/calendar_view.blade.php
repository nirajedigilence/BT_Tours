<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
<link href="{{ asset('css/listingPage.css') }}" rel="stylesheet">
{{-- <link href="{{ asset('css/style-products.css') }}" rel="stylesheet"> --}}


<div class="middleCol completedBooking" id="middleCol">
    <script>
        var base_url = "{{URL::to('/')}}";
    </script>
    @if(Session::has('success'))
        <div class="alert alert-success">
            {!! session('success') !!}
        </div>
    @elseif(Session::has('error'))
        <div class="alert alert-error">
            {!! session('error') !!}
        </div>
    @endif
    <div class="contentBooking calenderViewMain">
        <div class="">
            <div class="filterBtn">
                Button Legend
            </div>
            <a class="orangeLink addProductBtn" href="javascript:void(0);" style="width: 170px;">Add dates</a>
        </div>
        <input type="hidden" name="current_year" class="current_year" value="{{ date('Y') }}">
        <input type="hidden" name="hotel_id" class="hotel_id" value="{{ $hotelList->id }}">
        <div class="clearBothCls"></div>
        <div class="calendarView"></div>
    </div>
</div>
<div class="rightCol only-desktop">
    <div class="bookingForm" id="rightColInfo-{{ $hotelList->id }}" style="display: block;">
        <span class="headingS">{{ $hotelList->name }}</span>
        <div class="hotelSecSide">
            <div class="sidebar_part_two">
                <div class="col-sm-12">
                    <a class="orangeLink viewAndAddDatesBtn" data-id="{{ $hotelList->id }}" href="javascript:;">View and Add Dates</a>
                </div>
                <div class="col-sm-12">
                    <a class="orangeLink " data-id="{{ $hotelList->id }}" href="{{ url('super-user/stocklist-hotel/calendar-view', $hotelList->id ) }}">Calendar View</a>
                </div>
                <div class="col-sm-12">
                    <a class="orangeLink " data-id="{{ $hotelList->id }}" href="javascript:;">Sold dates</a>
                </div>
                <div class="col-sm-12">
                    <a class="orangeLink " data-id="{{ $hotelList->id }}" href="javascript:;">Cancel Dates</a>
                </div>
                <div class="col-sm-12">
                    <a class="orangeLink " data-id="{{ $hotelList->id }}" href="javascript:;">Contracts</a>
                </div>
            </div>
        </div>
        <div class="clearBothCls"></div>
       
    </div>
</div>
<div class="modal fade" id="hotelDatesModal" tabindex="-1" role="dialog" aria-labelledby="addFolderModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: calc(100% - (1.75rem * 8));">
        <div class="modal-content hotelDatesModalAppendCls">
            
        </div>
    </div>
</div>
<script>
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