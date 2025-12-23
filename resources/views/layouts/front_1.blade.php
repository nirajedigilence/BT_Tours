<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{isset($page_title)?$page_title.'- Bowling Tour':'Bowling Tour'}}</title>
    <meta charset=utf-8>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="_token" content="{!! csrf_token() !!}"/>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery.fancybox.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('cms/css/sleek.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-datepicker3.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style-products.css') }}" rel="stylesheet">
    <link href="{{ asset('css/iziToast.css') }}" rel="stylesheet">

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.js') }}"></script>
    <script src="{{ asset('js/jquery.ui.touch-punch.min.js') }}"></script>

    <script src="{{ asset('js/jquery.fancybox.min.js') }}"></script>

    <script src="{{ asset('js/laravel.ajax.js') }}"></script>
    <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/iziToast.js') }}"></script>
    <script src="{{ asset('js/general.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>
{{--    <script>--}}
{{--        laravel.errors.errorBagContainer = $('#errors');--}}
{{--        laravel.errors.showErrorsBag = true;--}}
{{--        laravel.errors.showErrorsInFormGroup = false;--}}
{{--        laravel.bootstrapVersion = 4;--}}
{{--    </script>--}}
<style type="text/css" media="screen">
    .loader {position: fixed;top: 0;height: 100%;width: 100%;background: rgba(0, 0, 0, 0.5);text-align: center;display: flex;align-items: center;justify-content: center;z-index: 99999;}
    .loader-ele {border: 4px solid #f3f3f3;border-top: 4px solid #000;border-radius: 50%;width: 50px;height: 50px;animation: spin 1s linear infinite;}
    header .container .headerRow {
        display: block;
        flex-direction: row;
        justify-content: space-between;
        padding-top: 15px;
        padding-bottom: 15px;
        align-items: center;
    }
    header .container .headerRow .logoBox {
        display: block;
        position: relative;
    }
    header .container .headerRow .logoBox a img {
        width: unset;
        height: 90px;
    }
    header .container .headerRow .logoBox a img {
        max-width: max-content;
    }
    header .container .headerRow .logoBox a img {
        width: unset !important;
        height: 90px;
    }
    @keyframes spin {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
}
</style>
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    var base_url = "{{URL::to('/')}}";
</script>
<?php $uri = Request::segment(1);
if($uri == '' || $uri == 'search' || $uri == 'about' || $uri == 'partnership' || $uri == 'info'  || $uri == 'news' || $uri == 'cart' ){?>
    <script>var front = "1";</script>
<?php } ?>

</head>

<body>
<div class="loader" style="display: none;">
    <div class="loader-ele"></div>
</div>
<header @isset($isHome) @if ($isHome) class="indexHeader" @endif @endisset>
    <div class="container">
        <div class="headerRow">
            <div class="logoBox">
                <a href="{{ route('home') }}">
                   <img src="{{ asset('images/logo_bowling.png') }}" alt="Veenus" style="display: block;height: 60px;">
                </a>
                <div class="navBtn only-mobile" id="topMenu">
                    <input id="menu__toggle" type="checkbox" />
                    <label class="menu__btn" for="menu__toggle">
                        <span></span>
                    </label>
                </div>
            </div>
            
        </div>
    </div>
</header>

<script>
    var updated = 0;
    $(document).ready(function(){
        $(".hasSubmenu .menuLink").bind("click", function(e){
            if ($(".only-mobile").css("display") == "block") {
                e.preventDefault();

                $(this).parent().children(".submenuHolder").slideToggle();
            }
        });


        $("#topMenu").bind("click", function(){

            if($("#menu__toggle").prop("checked") == true){
                if(updated==0){
                    updated = 1;
                }
                $(".menuBox").slideDown();
            }else {
                $(".menuBox").slideUp();
            }
        });

    });
</script>





    @yield('content')





<script>

    var updated = 0;
    $(document).ready(function(){
        $('.countryAreasBoxCls').hide();
        $(".countryAreasBoxCls").each(function() {
            var thisId = $(this).attr('data-id');
            var isChecked = false;
            $(".checkboxCLs-"+thisId).each(function() {
                var thisCls = $(this).attr('class');
                if($(this).prop('checked') == true){
                    isChecked = true;
                }
            });
            if(isChecked == true){
                $(this).show();
            }
        });
        var isCatChecked = false;
        $(".ecatIdCls").each(function() {
            if($(this).prop('checked') == true){
                isCatChecked = true;
            }
        });
        if(isCatChecked == true){
            $('.filterBtnCatCls').addClass("open");
            $('.hiddenFilterCat').slideDown();
        }

        var isExtraChecked = false;
        $(".eExtraIdCls").each(function() {
            if($(this).prop('checked') == true){
                isExtraChecked = true;
            }
        });
        if(isExtraChecked == true){
            $('.filterBtnExtraCls').addClass("open");
            $('.filterBtnExtraSubCls').slideDown();
        }

        if ($(".only-mobile").css("display") == "block") {
            $(".filterBtn").removeClass("open");
        }



        $(document).on("click",".sortBy", function(e){
            if ($(this).hasClass("active")) {

            }else {
                $("#inputSortBy").val($(this).data("sortby"));
                console.log($("#inputSortBy").val());

                $(".sortBy").removeClass("active");
                $(this).addClass("active");
                $("#filter_serial").val('');
                $("#filter_serial").val($("#filterForm").serialize());
                $("#filterForm").submit();
                // setTimeout(function(){ 
                //     $(".sortBy").each(function( index ) {
                //         if($(this).data("sortby") == $("#inputSortBy").val()){
                //             $(this).addClass("active");
                //         }
                //     });
                // }, 5000);
            }
        });

        $(".filterBtn").bind("click", function(e){
            if ($(this).hasClass("open")) {
                $(this).parent().children(".hiddenFilter").slideUp();
                $(this).removeClass("open");
            }else {
                $(this).parent().children(".hiddenFilter").slideDown();
                $(this).addClass("open");
            }
        });

        // $(".viewBtn").bind("click", function(e){
        $(document).on('click', '.viewBtn', function(e) {
            if ($(this).hasClass("active")) {

            }else {
                $("#inputView").val($(this).data("view"));
                $(".viewBtn").removeClass("active");
                $(this).addClass("active");
                if ($(this).data("view") == "row") {
                    $(".propertiesWrapper").addClass("propertiesWrapperInRow");
                }
                if ($(this).data("view") == "grid") {
                    $(".propertiesWrapper").removeClass("propertiesWrapperInRow");
                }
                if ($(this).data("view") == "map") {

                }
            }
        });

        $(".checkAllBtn .left .toogleIcon").bind("click", function(e){
            if ($(this).parent().parent().parent().children(".childrensBox").css("display") == "none") {
                $(this).addClass("rotateIcon");
                $(this).parent().parent().parent().children(".childrensBox").slideDown();
            }else {
                $(this).removeClass("rotateIcon");
                $(this).parent().parent().parent().children(".childrensBox").slideUp();
            }
        });
        $(".checkAllBtn .left .toogleIcon2").bind("click", function(e){
            if ($(this).parent().parent().parent().children(".childrensBox").css("display") == "none") {
                if($(this).hasClass("iconMore")){
                    $(this).hide();
                    $(this).closest('.checkAllBtn').find('.iconLess').show();
                }
                $(this).parent().parent().parent().children(".childrensBox").slideDown();
            }else {
                if($(this).hasClass("iconLess")){
                    $(this).hide();
                    $(this).closest('.checkAllBtn').find('.iconMore').show();
                }
                $(this).parent().parent().parent().children(".childrensBox").slideUp();
            }
        });
        $(".checkAllBtn .left .round input").bind('click', function (e) {
            if ($(this).hasClass("allSelected")) {

                $(this).parent().parent().parent().parent().children(".childrensBox").children(".item").each(function( index ) {
                    $(this).children(".left").children(".round").children("input").prop('checked', false);
                });

                $(this).removeClass("allSelected")

            }else {

                $(this).parent().parent().parent().parent().children(".childrensBox").children(".item").each(function( index ) {
                    $(this).children(".left").children(".round").children("input").prop('checked', true);
                });

                $(this).addClass("allSelected")
            }
        });

    });
</script>

 <?php if(Request::segment(1) != 'bowling'){ ?>

<footer id="footer">
    <div class="topFooter">
        <div class="container">
            <div class="footerRow">
                <div class="footerMenus">
                    <div class="footerMenu">
                        <h5 class="title">Packages</h5>
                        <ul class="list">
                           
                        </ul>
                    </div>
                    <div class="footerMenu">
                        <h5 class="title">Get Started</h5>
                        <ul class="list">
                           
                        </ul>
                    </div>
                    <div class="footerMenu">
                        <h5 class="title">Additional Information</h5>
                        <ul class="list">
                           
                        </ul>
                    </div>
                </div>
                <div class="subscribeBox">
                    <form>
                        <label for="email">Subscribe</label>
                        <div class="inputRow">
                            <input id="email" type="text" name="email" placeholder="Email Address">
                            <button><i class="fas fa-chevron-right"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="bottomFooter">
        <div class="container">
            <div class="termsRow">
                <div class="terms">
                    Veenus Limited. All rights reserved. 
                </div>
                <div class="socials">
                    <a href="https://www.facebook.com/Veenus-106768848279897"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.instagram.com/veenustravel/"><i class="fab fa-instagram"></i></a>
                    <a href="https://www.linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                    <a href="https://twitter.com/"><!-- <img src="/images/Icon-X.svg" style="width: 15px;margin-bottom: 3px;"> --><i class="fa-brands fa-x-twitter"></i></a>
                </div>
                <div class="terms">Sir Henry Darvill House, 8-10 William St, Windsor SL4 1BA</div>
            </div>
        </div>
    </div>
</footer>
<?php } ?>
<script>
    $(document).ready(function(){
        $('#search_nav').hide();
        // Search AJAX filter submit
        $("#filterForm input[type='checkbox']").click(function(){
            //$("#pageSearchContent").html('<i class="fas fa-spinner fa-spin"></i>');
            $("#filter_serial").val('');
            $("#filter_serial").val($("#filterForm").serialize());
            $("#filterForm").submit();
        });
    });
    $("#search_nav").keyup(function(event) {
        
        if (event.keyCode === 13) {
            $(".search_tour_nav").trigger('click');
        }
    });
     $(document).on('click', '.search_tour_nav', function() {
        if($('#search_nav').val() != '')
        {
            window.location.href = "/search?&price_from=0&price_to=999999&search_text="+$('#search_nav').val();
        }
        else
        {
            $('#search_nav').show();
        }
      

    });
</script>
</body>
</html>
