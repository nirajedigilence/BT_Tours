@extends('layouts.front')

@section('content')

<div class="notIndexContainer">

    <div class="accountContainer">
        <div class="accountRow">

            <div class="leftCol">
                @include('partials.super_user_left',['open_menu' => 'database', 'sub_marked' => 'hotels']);
            </div>

            <div class="account_main_content">

                <div class="left_column">

                    <div class="main_content_nav">
                        
                        <div class="filters">

                            <div class="filters_dropdown">

                                <div class="cta">
                                    Filters
                                </div>

                                <div class="dropdown">
                                    <form action="{{ route('database-hotels') }}" id="filterForm">
                                        <div class="heading">
                                            Filter By
                                        </div>

                                        <div class="dropdown_section">

                                        <!-- <div class="heading">
                                            By Date
                                        </div> -->

                                        <div class="by_date">

                                            <div class="field">
                                                <div class="label">By Tours</div>
                                                <select name="tour_id" id="tour_id">
                                                    <option value="">---</option>
                                                    <?php
                                                    if(!empty($ExperienceList)){
                                                        foreach ($ExperienceList as $key => $value) {
                                                            $selected = '';
                                                            if(isset($_GET['tour_id']) && $_GET['tour_id'] == $value->id){
                                                                $selected = 'selected';
                                                            }
                                                            echo '<option value="'.$value->id.'" '.$selected.'>'.$value->name.'</option>';
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>


                                        </div>
                                        <input type="submit" class="btn btn-warning" name="submit" value="Filter" style="float: right;color: #fff;font-weight: bold;background:orange;border: orange;" id="submitBtn">
                                    </form>
                                </div>

                                </div>

                            </div>

                            <!-- <ul class="active_filters">
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
                            <a href="javascript:;" class="btn btn-primary" style="margin-left: 10px;" data-id="" id="addHotel">Add New</a>
                        </div>

                    </div>

                    <div class="left_column__list">

                        <div class="left_column__list_row header">

                            <div class="left_column__list_column w_25">
                                Hotel
                            </div>

                            <div class="left_column__list_column w_20">
                                Rating
                            </div>

                            <div class="left_column__list_column w_12-5">
                                Location
                            </div>

                            <div class="left_column__list_column w_12-5">
                                Town/City
                            </div>

                            <div class="left_column__list_column w_20">
                                Main Contact
                            </div>

                            <div class="left_column__list_column w_10 centered">
                                HoPS
                            </div>

                        </div>
                        <?php
                        if(!empty($hotelList)){
                            $hotels_id = array();
                            if(isset($_GET['tour_id']) && !empty($_GET['tour_id'])){
                                $experiences_to_hotels = 


DB::connection('mysql_veenus')->table('experiences_to_hotels')->where("experiences_id", $_GET['tour_id'])->where("deleted_at", null)->get()->toArray();
                                // pr($experiences_to_hotels);
                                $hotels_id = array_column($experiences_to_hotels, 'hotels_id');
                            }
                            foreach ($hotelList as $key => $value) {
                                if(!empty($hotels_id) && !in_array($value->id,$hotels_id)){
                                    continue;
                                }
                                $country = '';
                                if(!empty($value->countryarea->countries_id)){
                                    $country = 


DB::connection('mysql_veenus')->table('countries')->where("id", $value->countryarea->countries_id)->first();
                                }
                          
                        ?>
                            <div class="left_column__list_row openBooking" data-id="{{ $value->id }}">

                                <div class="left_column__list_column w_25 bold hotelName">
                                    <?php echo $value->name; ?>
                                </div>

                                <div class="left_column__list_column w_20">
                                    <div class="stars">
                                        @if ( $value->stars > 0 )
                                            @for ($i = 0; $i < $value->stars; $i++)
                                                <i class="fas fa-star"></i>
                                            @endfor
                                        @endif
                                        <?php $stars = (5-$value->stars); ?>
                                        @for ($i = 0; $i < $stars; $i++)
                                            <i class="far fa-star"></i>
                                        @endfor
                                    </div>
                                </div>

                                <div class="left_column__list_column w_12-5">
                                    <?php echo (isset($country->name) ? $country->name.' - ' : ''); ?>
                                    <span class="line_break"><?php echo (isset($value->countryarea->name) ? $value->countryarea->name : '-'); ?></span>
                                </div>

                                <div class="left_column__list_column w_12-5">
                                    <?php echo (!empty($value->hotel_city) ? $value->hotel_city : '-'); ?>
                                </div>

                                <div class="left_column__list_column w_20">
                                    <?php echo (!empty($value->contact_name) ? $value->contact_name.' ('.$value->contact_position.')' : '-'); ?>
                                </div>

                                <div class="left_column__list_column w_10 centered">
                                    <strong class="green">0%</strong>
                                </div>

                            </div>
                        <?php } } ?>
                    </div>

                </div>

                <div class="right_column">
                    <?php
                    if(!empty($hotelList)){
                            foreach ($hotelList as $key => $value) {
                            ?>
                            <div class="hotelList" id="rightColInfo-{{ $value->id }}" style="display: none;">
                                <div class="intro">

                                    <div class="heading mb_0">
                                        {{ strtoupper($value->name) }}
                                    </div>

                                    <div class="percentage">
                                        0%
                                    </div>

                                    <div class="contact_info">

                                        <div class="block">

                                            <div class="sub_heading">
                                                Owner
                                            </div>

                                            <div>
                                                <strong>{{ !empty($value->owner) ? $value->owner : '-'}}</strong>
                                            </div>

                                        </div>

                                        <div class="block">

                                            <div class="sub_heading">
                                                Brand
                                            </div>

                                            <div>
                                                <strong>{{ !empty($value->brand) ? $value->brand : '-' }}</strong>
                                            </div>

                                        </div>

                                        <div class="block">

                                            <div class="sub_heading">
                                                Main Contact
                                            </div>
                                            <?php if(!empty($value->contact_name)){ ?>
                                            <div>
                                                <strong><?php echo ucfirst($value->contact_name); ?> (<?php echo ucfirst($value->contact_position); ?>)</strong>
                                            </div>
                                            <?php }  ?>
                                            
                                        </div>

                                        <div class="block">

                                            <div class="sub_heading">
                                                Contact number
                                            </div>

                                            <div>
                                                direct: <span class="orange"><a href="tel:<?php echo str_replace(' ', '',$value->contact_number); ?>" style="color:#FCA311;"><?php echo $value->contact_number; ?></a></span>
                                            </div>

                                            <div>
                                                main: <span class="orange"><a href="tel:<?php echo str_replace(' ', '', $value->phone); ?>" style="color:#FCA311;"><?php echo $value->phone; ?></a></span>
                                            </div>

                                        </div>

                                        <div class="block">

                                            <div class="sub_heading">
                                                Email
                                            </div>

                                            <div>
                                                <a href="mailto:<?php echo $value->email; ?>" class="email">
                                                    <?php echo $value->email; ?>
                                                </a>
                                            </div>

                                        </div>

                                        <div class="block">

                                            <div class="sub_heading">
                                                Total Bookings
                                            </div>

                                            <div>
                                                <strong>-</strong>
                                            </div>

                                        </div>

                                        <div class="block">

                                            <div class="sub_heading">
                                                Current Bookings
                                            </div>

                                            <div>
                                                <span class="orange">-</span>
                                            </div>

                                        </div>

                                        <div class="block">

                                            <div class="sub_heading">
                                                Outstanding alerts
                                            </div>

                                            <div>
                                                <!-- <span class="orange">1 to go</span> -->
                                                -
                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div class="icon_ctas">

                                    <a href="#" class="cta" style="color: #ddd;pointer-events: none;">
                                        <i class="fas fa-file-contract"></i>
                                    </a>

                                    <a href="#" class="cta" style="color: #ddd;pointer-events: none;">
                                        <i class="fas fa-sticky-note"></i>
                                    </a>

                                    <a href="#" class="cta" style="color: #ddd;pointer-events: none;">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <a href="#" class="cta" style="color: #ddd;pointer-events: none;">
                                        <i class="fas fa-unlink"></i>
                                    </a>

                                </div>

                                <div class="footer_links">

                                    <a href="<?php echo route('database-hotels-details', $value->id); ?>" class="cta">
                                        Open Profile
                                    </a>

                                    <a href="#" class="cta" style="background: #ddd;pointer-events: none;">
                                        Current Bookings
                                    </a>

                                    <a href="#" class="cta" style="background: #ddd;pointer-events: none;">
                                        Completed Bookings
                                    </a>

                                    <a href="#" class="cta" style="background: #ddd;pointer-events: none;">
                                        View Analytics
                                    </a>

                                </div>
                            </div>
                            <?php 
                        }
                    }
                    ?>
                </div>

            </div>

        </div>

    </div>
    <!-- start popup -->

    <div class="account_popup" style="display: none;">


    </div>

    <!-- end popup -->
</div>

<script>
    var updated = 0;
    $(document).ready(function(){
        $(document).on('click','#addAmenity', function(){
            if(($("#appendAmenities div.list__item").length == 1) && ($("#appendAmenities div.list__item").css('display') == 'none')){
                $("#appendAmenities div.list__item").show(); 
            }else{
                $("#appendAmenities div.list__item").last().clone().appendTo($("#appendAmenities"));
                $("#appendAmenities div.list__item").last().find('input').val('');
                $('.removeAmenity').css('display','block'); 
            }
        });
        $(document).on('click','.removeAmenity', function(){
            if($("#appendAmenities div.list__item").length == 1){
                $("#appendAmenities div.list__item").last().find('input').val('');
                $("#appendAmenities div.list__item").hide(); 
            }else{
                $(this).closest('div').remove();
            }
        });
        $(document).on("click", "#hotelFormSubmit", function(e){
            e.preventDefault();
            var hotelName = $("#hotelName").val();
            if(hotelName == ''){
                $("#hotelName").addClass('borderRed');
                toastError('Hotel name is required.');
            }else{
                var formData = $("#hotelData").serialize();
                $('.loader').show();    
                $.ajax({
                    url: base_url+'/super-user/add-new-hotel',
                    type: 'POST',
                    data: {'formData':formData},
                    success: function(data) {
                        $('.loader').hide(); 
                        if(data.status == 'failed'){
                            toastError('Hotel is already added with same name.');
                        }else{
                            toastSuccess('Hotel added successfully.');
                            location.reload(); 
                        }
                    },
                    error: function(e) {
                    }
                });   
            }
        });
        $("#addHotel").bind("click", function(e){
            var hotel_id = $(this).data('id');
            $('.loader').show();    
            $.ajax({
                url: base_url+'/super-user/get-hotel-details',
                type: 'POST',
                data: {'hotel_id':hotel_id},
                success: function(data) {
                    $('.account_popup').html(data);
                    $('.loader').hide();  
                    $('.account_popup').show();
                },
                error: function(e) {
                }
            });   
        });
        $(document).on("click", "#closePopup", function(e){
            $(this).closest('.account_popup').hide();
        });
        $(".hasAccSubmenu .menuLink").bind("click", function(e){
            e.preventDefault();
            if ($(this).parent().hasClass("open")) {
                $(this).parent().removeClass("open");
                $(this).parent().children(".submenuHolder").slideUp();
            }else {
                $(this).parent().addClass("open");
                $(this).parent().children(".submenuHolder").slideDown();
            }
        });

        $(".openBooking").bind("click", function(){
            var cartExperienceId = $(this).data("id");
            $(".openBooking").removeClass("active");
            $(this).addClass("active");
            $(".hotelList").hide();
            $("#rightColInfo-"+cartExperienceId).show();
        });
        
        <?php 
        if(isset($_GET['addHotel']) && $_GET['addHotel'] == 'yes'){
            ?>
            $("#addHotel").click();
            <?php
        }
        ?>
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
        $("body").on("click", '.filters_dropdown > .cta', function(e) {
            $('.dropdown').toggleClass('filterShow');
        });
</script>

@endsection