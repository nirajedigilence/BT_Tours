@extends('layouts.super_user')
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
                    @include('partials.super_user_left',['open_menu' => 'bespoke', 'sub_marked' => 'bespoke_enquiries']);
            </div>

            <div id="cartExperiencesPart">
                <?php /*
                    <!-- @include ('partials.booking.collaborator_process_tour_steps', [
                                            'items' => $items,
                                            'tourStatuses' => $tourStatuses,
                                          ]) -->

                                          <?php */ ?>
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

