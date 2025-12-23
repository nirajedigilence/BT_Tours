@extends('layouts.front')

@section('content')

<div class="notIndexContainer">

    <div class="accountContainer">
        <div class="accountRow">

            <div class="leftCol">
                @include('partials.super_user_left',['open_menu' => 'database', 'sub_marked' => 'collaborators']);
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

                                    <div class="heading">
                                        Filter By
                                    </div>

                                    <div class="options">

                                        <div class="option">

                                            <div class="column checkbox">
                                                <input type="checkbox" id="checkbox_1" checked>
                                                <label for="checkbox_1"></label>
                                            </div>

                                            <div class="label">
                                                70% +
                                            </div>

                                        </div>

                                        <div class="option">

                                            <div class="column checkbox">
                                                <input type="checkbox" id="checkbox_2" checked>
                                                <label for="checkbox_2"></label>
                                            </div>

                                            <div class="label">
                                                80% +
                                            </div>

                                        </div>

                                        <div class="option">

                                            <div class="column checkbox">
                                                <input type="checkbox" id="checkbox_3" checked>
                                                <label for="checkbox_3"></label>
                                            </div>

                                            <div class="label">
                                                90% +
                                            </div>

                                        </div>

                                        <div class="option">

                                            <div class="column checkbox">
                                                <input type="checkbox" id="checkbox_4" checked>
                                                <label for="checkbox_4"></label>
                                            </div>

                                            <div class="label">
                                                Total %
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <!-- <ul class="active_filters">
                                <li class="label">Active filters:</li>
                                <li>Current bookings <span>x</span></li>
                                <li>Main contact <span>x</span></li>
                            </ul> -->

                        </div>

                        <div class="search">

                            <div class="search__input">
                                <input type="text" placeholder="Search" id="myInput" onkeyup="myFunction()">
                                <button type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>

                    </div>

                    <div class="left_column__list">

                        <div class="left_column__list_row header">

                            <div class="left_column__list_column w_25">
                                Collaborator
                            </div>

                            <div class="left_column__list_column w_15">
                                Current bookings
                            </div>

                            <div class="left_column__list_column w_15">
                                Main contact
                            </div>

                            <div class="left_column__list_column w_15">
                                Contact number
                            </div>

                            <div class="left_column__list_column w_15">
                                Email
                            </div>

                            <div class="left_column__list_column w_15 centered">
                                Index Score
                            </div>

                        </div>
                        <?php
                        if(!empty($collaboratorList)){
                            foreach ($collaboratorList as $key => $value) {
                               /* $current_bookings = 


DB::connection('mysql_veenus')->table('carts')->join('cart_experiences','cart_experiences.carts_id','=','carts.id')->where('cart_experiences.deleted_at',null)->where('carts.user_id',$value->id)->where('cart_experiences.completed',0)->get()->count();*/
                               $collobrator_id = $value->id;
                                $current_bookings = 


DB::connection('mysql_veenus')->table('cart_experiences')->selectRaw('cart_experiences.*,carts.finalized_at,carts.user_id,users.name AS colobratorName')
                                     ->leftjoin('carts as carts', 'cart_experiences.carts_id', '=', 'carts.id')
                                     ->leftjoin('users as users', 'carts.user_id', '=', 'users.id')
                                    ->where('carts.finalized', '=', 1)
                                    ->where('cart_experiences.completed', '=', 0)
                                    ->where('cart_experiences.cancel_status', '=', 0)
                                    ->where('carts.deleted_at', null)
                                    ->where('carts.user_id', '=', $collobrator_id)
                                    ->get()->count();
                                $users_details = 


DB::connection('mysql_veenus')->table('users_details')->where('user_id',$value->id)->first();
                                $detail = array();
                                if(!empty($users_details->contacts)){
                                    $contacts = unserialize($users_details->contacts);
                                    foreach ($contacts as $k => $val) {
                                        if(isset($val['main_contact']) && $val['main_contact'] == 'on'){
                                            $detail = $val;
                                        }
                                    }
                                }
                        ?>
                        <div class="left_column__list_row openBooking" data-id="{{ $value->id }}">

                            <div class="left_column__list_column w_25 bold hotelName">
                                <?php echo $value->name; ?>
                            </div>

                            <div class="left_column__list_column w_15">
                                <?php echo $current_bookings; ?>
                            </div>

                            <div class="left_column__list_column w_15">
                                <?php 
                                if(!empty($detail)){
                                    echo $detail['name'].' ('.$detail['position'].')'; 
                                }else{
                                    echo '-';
                                }
                                ?>
                            </div>

                            <div class="left_column__list_column w_15">
                                dir: <?php 
                                if(!empty($detail)){
                                    echo $detail['contact_number']; 
                                }
                                ?>
                                <span class="line_break">m: <?php echo isset($users_details->main_contact_number) ? $users_details->main_contact_number : ''; ?></span>
                            </div>

                            <div class="left_column__list_column w_15">
                                <?php echo $value->email; ?>
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
                    if(!empty($collaboratorList)){
                        foreach ($collaboratorList as $key => $value) {
                            /*$current_bookings = 


DB::connection('mysql_veenus')->table('carts')->join('cart_experiences','cart_experiences.carts_id','=','carts.id')->where('cart_experiences.deleted_at',null)->where('carts.user_id',$value->id)->where('cart_experiences.completed',0)->get()->count();*/
                            $current_bookings = 


DB::connection('mysql_veenus')->table('cart_experiences')->selectRaw('cart_experiences.*,carts.finalized_at,carts.user_id,users.name AS colobratorName')
                                     ->leftjoin('carts as carts', 'cart_experiences.carts_id', '=', 'carts.id')
                                     ->leftjoin('users as users', 'carts.user_id', '=', 'users.id')
                                    ->where('carts.finalized', '=', 1)
                                    ->where('cart_experiences.completed', '=', 0)
                                    ->where('cart_experiences.cancel_status', '=', 0)
                                    ->where('carts.deleted_at', null)
                                    ->where('carts.user_id', '=', $value->id)
                                    ->get()->count();
                            $total_bookings = 


DB::connection('mysql_veenus')->table('carts')->join('cart_experiences','cart_experiences.carts_id','=','carts.id')->where('cart_experiences.deleted_at',null)->where('carts.user_id',$value->id)->get()->count();
                            $users_details = 


DB::connection('mysql_veenus')->table('users_details')->where('user_id',$value->id)->first();
                            $detail = array();
                            if(!empty($users_details->contacts)){
                                $contacts = unserialize($users_details->contacts);
                                foreach ($contacts as $k => $val) {
                                    if(isset($val['main_contact']) && $val['main_contact'] == 'on'){
                                        $detail = $val;
                                    }
                                }
                            }
                        ?>
                        <div class="collaboratorList" id="rightColInfo-{{ $value->id }}" style="display: none;">
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
                                            <strong><?php 
                                            if(!empty($detail)){
                                                echo $detail['name'].' ('.$detail['position'].')'; 
                                            }else{
                                                echo '-';
                                            }
                                            ?></strong>
                                        </div>

                                    </div>

                                    <div class="block">
                                        
                                        <div class="sub_heading">
                                            Contact number
                                        </div>

                                        <div>
                                            direct: <span class="orange"><?php 
                                                if(!empty($detail)){
                                                    ?>
                                                     <a href="tel:<?php echo $detail['contact_number']; ?>" class="email">
                                                            <?php echo $detail['contact_number'];  ?>
                                                        </a>
                                                    <?php
                                                    
                                                }
                                                ?></span>
                                        </div>

                                        <div>
                                            main: <span class="orange">
                                                <?php 
                                                if(!empty($users_details->main_contact_number)){
                                                    ?>
                                                     <a href="tel:<?php echo $users_details->main_contact_number; ?>" class="email">
                                                            <?php echo $users_details->main_contact_number;  ?>
                                                        </a>
                                                    <?php
                                                    
                                                }
                                                ?>
                                                </span>
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
                                            <strong><?php echo $total_bookings; ?></strong>
                                        </div>

                                    </div>

                                    <div class="block">
                                        
                                        <div class="sub_heading">
                                            Current bookings
                                        </div>

                                        <div>
                                            <strong><?php echo $current_bookings; ?></strong>
                                        </div>

                                    </div>

                                    <div class="block">
                                       
                                       <div class="sub_heading">
                                            Outstanding alerts
                                        </div>

                                        <div>
                                            <span class="orange">1 to go</span>
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

                                <a href="<?php echo route('database-collab-details', $value->id); ?>" class="cta">
                                    Open Profile
                                </a>

                                <a href="<?php echo route('account-superuser'); ?>?collb_id=<?php echo $value->id; ?>" class="cta">
                                    Current Bookings
                                </a>

                                <a href="<?php echo route('account-superuser-completed'); ?>?collb_id=<?php echo $value->id; ?>" class="cta">
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
 
</div>

<script>
    var updated = 0;
    $(document).ready(function(){

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
            $(".collaboratorList").hide();
            $("#rightColInfo-"+cartExperienceId).show();
        });
        
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

@endsection