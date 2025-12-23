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
                @include('partials.super_user_left',['open_menu' => 'product', 'sub_marked' => 'current_products']);
            </div>

            <div id="cartExperiencesPart">
                    {{-- @include ('partials.product.edit_product', [ --}}
                    @include ('partials.product.product_combine_create', [
                        'countries' => $countries,
                        'proType' => $proType,
                        'productNumberId' => $productNumberId,
                        'productDetail' => $productDetail,
                        'randNumber' => $randNumber,
                        'prototypesList' => $prototypesList,
                        'productsExperienceList' => $productsExperienceList
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
