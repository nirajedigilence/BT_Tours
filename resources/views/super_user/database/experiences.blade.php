@extends('layouts.front')

@section('content')

<div class="notIndexContainer">

    <div class="accountContainer">
        <div class="accountRow">

            <div class="leftCol">
                @include('partials.super_user_left',['open_menu' => 'database', 'sub_marked' => 'experiences']);
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

                                    <form action="{{ route('database-experiences') }}" id="filterForm">
                                        <div class="heading">
                                            Filter By
                                        </div>

                                        <!-- <div class="dropdown_section"> -->

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
                            <a href="javascript:;" class="btn btn-primary" style="margin-left: 10px;" data-id="" id="addExperiance">Add New</a>
                        </div>

                    </div>

                    <div class="left_column__list">
                         @if(Session::has('message'))
                            <div class="alert alert-success">
                                <span class="glyphicon glyphicon-ok"></span>
                                {!! session('message') !!}

                                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                    <span aria-hidden="true">&times;</span>
                                </button>

                            </div>
                        @endif
                        <div class="left_column__list_row header">

                            <div class="left_column__list_column w_25">
                                Collaborator
                            </div>

                            <div class="left_column__list_column w_15">
                                Main contact
                            </div>

                            <div class="left_column__list_column w_15">
                                Town/City
                            </div>

                            <div class="left_column__list_column w_15">
                                Contact number
                            </div>

                            <div class="left_column__list_column w_15">
                                Email
                            </div>

                            <div class="left_column__list_column w_15 centered">
                                EPS
                            </div>

                        </div>
                        <?php
                        if(!empty($experiencesList)){
                            $attractions_id = array();
                            if(isset($_GET['tour_id']) && !empty($_GET['tour_id'])){
                                $experiences_to_attractions = 


DB::connection('mysql_veenus')->table('experiences_to_attractions')->where("experiences_id", $_GET['tour_id'])->get()->toArray();
                                // pr($experiences_to_attractions);
                                $attractions_id = array_column($experiences_to_attractions, 'attractions_id');
                            }
                            foreach ($experiencesList as $key => $value) {
                                if(!empty($attractions_id) && !in_array($value->id,$attractions_id)){
                                    continue;
                                }
                        ?>
                        <div class="left_column__list_row openBooking" data-id="{{ $value->id }}">

                            <div class="left_column__list_column w_25 bold hotelName">
                                <?php echo (!empty($value->name)) ? $value->name : '-'; ?>
                            </div>

                            <div class="left_column__list_column w_15">
                                <?php echo (!empty($value->contact_name)) ? $value->contact_name.' ('.$value->contact_position.')' : '-'; ?>
                            </div>

                            <div class="left_column__list_column w_15">
                                <?php echo (!empty($value->city)) ? $value->city : '-'; ?>
                            </div>

                            <div class="left_column__list_column w_15">
                                dir: <?php echo (!empty($value->direct_contact_number)) ? $value->direct_contact_number : '-'; ?>
                                <span class="line_break">m: <?php echo (!empty($value->main_contact_number)) ? $value->main_contact_number : '-'; ?></span>
                            </div>

                            <div class="left_column__list_column w_15" style="word-break: break-all;">
                                <?php echo (!empty($value->email)) ? $value->email : '-'; ?>
                            </div>

                            <div class="left_column__list_column w_15 centered">
                                <strong class="green">0%</strong>
                            </div>

                        </div>
                        <?php } } ?>
                    </div>

                </div>

                <div class="right_column">
                    <?php
                    if(!empty($experiencesList)){
                        foreach ($experiencesList as $key => $value) {
                        ?>
                        <div class="experiencesList" id="rightColInfo-{{ $value->id }}" style="display: none;">
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
                                            Main Contact
                                        </div>

                                        <div>
                                            <?php echo (!empty($value->contact_name)) ? $value->contact_name.' ('.$value->contact_position.')' : '-'; ?>
                                        </div>

                                    </div>

                                    <div class="block">
                                        
                                        <div class="sub_heading">
                                            Contact number
                                        </div>

                                        <div>
                                            direct: <span class="orange"><?php echo (!empty($value->direct_contact_number)) ? $value->direct_contact_number : '-'; ?></span>
                                        </div>

                                        <div>
                                            main: <span class="orange"><?php echo (!empty($value->main_contact_number)) ? $value->main_contact_number : '-'; ?></span>
                                        </div>

                                    </div>

                                    <div class="block">
                                        
                                        <div class="sub_heading">
                                            Email
                                        </div>

                                        <div>
                                            <a href="mailto:<?php echo (!empty($value->email)) ? $value->email : '-'; ?>" class="email">
                                                <?php echo (!empty($value->email)) ? $value->email : '-'; ?>
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
                                            Current bookings
                                        </div>

                                        <div>
                                            <strong>-</strong>
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
                                    <i class="fas fa-sticky-note"></i>
                                </a>

                                <a href="#" class="cta" style="color: #ddd;pointer-events: none;">
                                    <i class="fas fa-edit"></i>
                                </a>

                            </div>

                            <div class="footer_links">

                                <a href="<?php echo route('database-experiences-details', $value->id); ?>" class="cta">
                                    Open Profile
                                </a>
                                <a href="<?php echo route('duplicate-experiences-details', $value->id); ?>" class="cta">
                                    Duplicate Experience
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
                    <?php } } ?>
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
        $(document).on('click','#addInclusion', function(){
            $("#appendInclusions div.list__item").last().clone().appendTo($("#appendInclusions"));
            $("#appendInclusions div.list__item").last().find('input').val('');
            $('.removeInclusion').css('display','block'); 
        });
        $(document).on('click','.removeInclusion', function(){
            if($("#appendInclusions div.list__item").length == 2){
                $('.removeInclusion').hide(); 
            }
            $(this).closest('div').remove();
        });
        $(document).on("click", "#expFormSubmit", function(e){
            e.preventDefault();
            var formData = $("#expData").serialize();
            $('.loader').show();    
            $.ajax({
                url: base_url+'/super-user/add-new-experiance',
                type: 'POST',
                data: {'formData':formData},
                success: function(data) {
                    $('.loader').hide(); 
                    if(data.status == 'failed'){
                        toastError('Experience is already added with same name.');
                    }else{
                        toastSuccess('Experience added successfully.');
                        location.reload(); 
                    }
                },
                error: function(e) {
                }
            });   
        });
        $("#addExperiance").bind("click", function(e){
            var exp_id = $(this).data('id');
            $('.loader').show();    
            $.ajax({
                url: base_url+'/super-user/get-experiance-details',
                type: 'POST',
                data: {'exp_id':exp_id},
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
            $(".experiencesList").hide();
            $("#rightColInfo-"+cartExperienceId).show();
        });
        <?php 
        if(isset($_GET['addExperiance']) && $_GET['addExperiance'] == 'yes'){
            ?>
            $("#addExperiance").click();
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