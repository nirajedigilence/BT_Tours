@extends('layouts.front')

@section('content')

<div class="notIndexContainer">

    <div class="accountContainer">
        <div class="mobMenuBtn only-mobile" id="topMenu">
            <input id="menu__toggle2" type="checkbox" />
            <label class="menu__btn" for="menu__toggle2">
                <span></span>
                <div class="message">MENU</div>
            </label>
        </div>

        <div class="accountRow">
            <div class="leftCol">
                @include('partials.super_user_left',['open_menu' => 'bookings', 'sub_marked' => 'pending_bookings']);
            </div>

            <div id="cartExperiencesPart">
                <?php
                //pr($items);
                //exit();
                // print_r($tourStatuses);
                ?>
                    @include ('partials.booking.superuser_pending_cancelled_bookings', [
                                            'items' => $items,
                                            'tourStatuses' => $tourStatuses,
                                          ])
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

    });
</script>

@endsection
