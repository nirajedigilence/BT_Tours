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
                @include('partials.super_user_left',['open_menu' => 'product', 'sub_marked' => 'products_tour']);
            </div>

            <div id="cartExperiencesPart">
                <?php if($tourType == '1'){ ?>
                    @include ('partials.tours.tour_cruise_product', [
                                'PrototypesList' => $PrototypesList,
                                'countries' => $countries,
                                'productDetail' => $productDetail
                            ])
                <?php } if($tourType == '2'){ ?>
                    @include ('partials.tours.tour_standard_product', [
                                'PrototypesList' => $PrototypesList,
                                'experienceExtra' => $experienceExtra,
                                'experienceCategory' => $experienceCategory,
                                'countries' => $countries,
                                'productDetail' => $productDetail
                            ])
                <?php } if($tourType == '3'){ ?>
                    @include ('partials.tours.tour_bowling_product', [
                                'PrototypesList' => $PrototypesList,
                                'experienceExtra' => $experienceExtra,
                                'experienceCategory' => $experienceCategory,
                                'countries' => $countries,
                                'productDetail' => $productDetail
                            ])
                <?php } ?>
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
