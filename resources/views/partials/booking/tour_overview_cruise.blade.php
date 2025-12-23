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
                @hasrole('Collaborator')
                @include('partials.collaborator_left',['open_menu' => 'bookings', 'sub_marked' => 'current_cruise']);
                @else
                @include('partials.super_user_left',['open_menu' => 'bookings', 'sub_marked' => 'current_cruise']);
                @endhasrole 
            </div>

            <div id="cartExperiencesPart">
                @hasrole('Collaborator')
                    @include ('partials.booking.collabrator_tour_overview_process_step_cruise', [
                                            'items' => $items,
                                            'tourStatuses' => $tourStatuses,
                                            'cart_exp_id' =>$cart_exp_id
                                          ])
                @else
                    @include ('partials.booking.tour_overview_process_step_cruise', [
                                            'items' => $items,
                                            'tourStatuses' => $tourStatuses,
                                            'cart_exp_id' =>$cart_exp_id
                                          ])
                @endhasrole 
                
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
