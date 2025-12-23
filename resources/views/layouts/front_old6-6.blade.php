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

    <link href="{{ asset('css/stylebt.css') }}" rel="stylesheet">
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
        padding-top: 4px;
        padding-bottom: 15px;
        align-items: center;
        margin-top: 30px;
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
    header .container .headerRow .menuBox .menu .menuLi .menuLink:hover {
        color: #1d92d0;
    }
    
    .searchTerm {
        border: 2px solid #6ac0ec;
        padding: 8px;
        border-radius: 5px;
        outline: none;
        color: #a5a5a5;
        float: left;
        width: 100%;
    }
.menuBox {
    padding: 10px;
    margin-top: 5px;
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
            <div class="row">
            <div class="col-md-4 col-sm-12">
            <div class="logoBox" style="width: 100%;float: left;">
                <a href="{{getenv('BT_SITE')}}" class="logo">
                   <img src="{{ asset('images/Bowling_Tours_Logo_-_Large.svg') }}" alt="Veenus" style="display: block;height: 60px;">
                </a>
                <!-- <div class="mobile_respnsb">
                    <ul class="menu" style="float:right;margin-top: 5px;">
                       <li class="menuLi m-2">
                            <a target="_blank" href="{{getenv('IMAGE_URL')}}login/bt" style="background-color: #50AADB;padding: 12px 15px;border-radius: 5px;color: white;font-size:15px;">Log In</a>
                            <a href="javascript:void();" style="background-color: #50AADB;padding: 12px 15px;border-radius: 5px;color: white;font-size:15px;" class="menuLink search_tour_nav " href=""><i class="fas fa-search"></i></a>
                            <?php if(!empty($_GET['bt_tour'])){ ?> 
                            <a href="javascript:void();" style="background-color: #50AADB;padding: 12px 15px;border-radius: 5px;color: white;font-size:15px;" class=" " href=""><i class="fas fa-shopping-cart" style="color: #ffffff; "></i></a>
                        <?php } ?>
                        </li>
                    </ul>
                    <input class="searchTerm" placeholder="What are you looking for?" type="text" value="" name="search_nav" id="search_nav" style="padding: 4px;margin-top: 6px;">
                </div> -->
                <!-- <h3 class="ml-4 mt-3" style="
                    color: #FFD334;
                    font-size: 18px;
                    padding-bottom: 9px;
                    font-weight: 700;
                    margin-bottom:0px;
                ">+44 (0) 1753 836600</h3> -->
                
                <div class="navBtn only-mobile" id="topMenu">
                    <input id="menu__toggle" type="checkbox" />
                    <label class="menu__btn" for="menu__toggle">
                        <span></span>
                    </label>
                </div>
            </div>
            </div>
            <div class="col-md-6 col-sm-12">
             <div class="menuBox">
                
                <ul class="menu">
                    <li class="menuLi hasSubmenu">
                        <a class="menuLink" href="/all-tours/public/">UK Tours</a>
                         <!--    <div class="submenuHolder">
                                <span class="orangeLine"></span>
                                <ul class="submenu">
                                        <li class="submenuLi">
                                            <a class="submenuLink" href="">Tour</a>
                                        </li>
                                </ul>
                                <span class="orangeLine2"></span>
                            </div> -->
                        <!-- <ul class="submenu">
                                <li class="submenuLi">
                                    <a class="submenuLink" href="https://bowlingtours-staging-co-uk.stackstaging.com/request-tour/">Request a form</a>
                                </li>
                        </ul> -->
                    </li>
                    <li class="menuLi">
                        <a class="menuLink" href="/all-tours/public">Tours</a>
                    </li>
                    <li class="menuLi">
                        <a class="menuLink" href="/about-us/">About Us</a>
                    </li>
                    <!-- <li class="menuLi">
                        <a class="menuLink" href="/clubs/">Clubs</a>
                    </li>

                    <li class="menuLi">
                        <a class="menuLink" href="/fixtures/">Fixtures</a>
                    </li> -->
                    <li class="menuLi">
                        <a class="menuLink" href="/contact-us/">Contact Us</a>
                    </li>
                    <!-- <li class="menuLi">
                       <input type="text" value="" name="search_nav" id="search_nav" style="padding: 2px;"> <a href="javascript:void();" class="menuLink search_tour_nav" href=""><i class="fas fa-search"></i></a>
                    </li> -->
                    <!-- <li class="menuLi only-mobile">
                        <a class="userLink" href=""><i class="fas fa-user-circle"></i>Account</a>
                    </li> -->
                </ul>
               
            </div>
            </div>
            <div class="col-md-2 col-sm-12">
                <div class="header_right">
                     <ul class="menu" style="float:right;margin-top: 5px;">
                       <li class="menuLi m-2">
                            <a target="_blank" href="{{getenv('IMAGE_URL')}}login/bt" style="background-color: #50AADB;padding: 12px 15px;border-radius: 5px;color: white;font-size:15px;">Log In</a>
                            <a href="javascript:void();" style="background-color: #50AADB;padding: 12px 15px;border-radius: 5px;color: white;font-size:15px;" class="menuLink search_tour_nav " href=""><i class="fas fa-search"></i></a>
                            <?php if(!empty($_GET['bt_tour'])){ ?> 
                            <a href="javascript:void();" style="background-color: #50AADB;padding: 12px 15px;border-radius: 5px;color: white;font-size:15px;" class=" " href=""><i class="fas fa-shopping-cart" style="color: #ffffff; "></i></a>
                        <?php } ?>
                        </li>
                    </ul>
                    <input class="searchTerm" placeholder="What are you looking for?" type="text" value="" name="search_nav" id="search_nav" style="padding: 4px;margin-top: 6px;">
                </div>
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
<!-- 
 <footer id="footer">
    <div class="topFooter">
        <div class="container">
            <div class="footerRow">
                <div class="footerMenus">
                    <div class="footerMenu">
                        <h5 class="title">Packages</h5>
                        <ul class="list">
                            <li><a href="#">England</a></li>
                            <li><a href="#">Wales</a></li>
                            <li><a href="#">Scotland</a></li>
                            <li><a href="#">Ireland</a></li>
                            </ul>
                            </div>
                            <div class="footerMenu">
                            <h5 class="title">Get Started</h5>
                            <ul class="list">
                                    <li><a href=" ">Login Account</a></li>
                            <li><a href=" https://tours-system-com.stackstaging.com/about ">Start Here</a></li>
                            <li><a href=" https://tours-system-com.stackstaging.com/partnership ">Check Hotels</a></li>
                            <li><a href=" https://tours-system-com.stackstaging.com/info/14 ">Great Things</a></li>
                            </ul>
                            </div>
                            <div class="footerMenu">
                            <h5 class="title">Bespoke Tours</h5>
                            <ul class="list">
                                    <li><a href=" https://tours-system-com.stackstaging.com/terms ">Create Package</a></li>
                            <li><a href=" https://tours-system-com.stackstaging.com/terms-2 ">Great Things</a></li>
                            <li><a href=" https://tours-system-com.stackstaging.com/terms3 ">Enquires</a></li>
                            <li><a href=" https://tours-system-com.stackstaging.com/jobs ">Private Tours</a></li>
                            </ul>
                    </div>
                </div>
                <div class="subscribeBox">
                    <form>
                        <label for="email">Subscribe</label>
                        <div class="inputRow">
                            <input id="email" type="text" name="email" placeholder="Email Address" fdprocessedid="6qxoosa">
                            <button fdprocessedid="pqmyo"><i class="fas fa-chevron-right"></i></button>
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
                    Bowling Tours Limited. All rights reserved. 
                </div>
                <div class="socials">
                    <a href="https://www.facebook.com/Veenus-106768848279897"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.instagram.com/veenustravel/"><i class="fab fa-instagram"></i></a>
                    <a href="https://twitter.com/"><i class="fa-brands fa-x-twitter"></i></a>
                </div>
                <div class="terms">Sir Henry Darvill House, 8-10 William St, Windsor SL4 1BA</div>
            </div>
        </div>
    </div>
</footer> -->
<style type="text/css">
    .footer {
    margin: 0 !important;
    padding: 0 !important;
    background: url(/all-tours/public/images/footer-bg.png) left top no-repeat !important;
    background-size: 100% 100% !important;
    height: 500px !important;
}
    .footer_container{margin:0 auto;padding:150px 15px 40px;max-width:1165px;width:100%;box-sizing:border-box;}.footer_container p{margin:0;padding:0 0 15px;color:#fff;font-size:14px;font-weight:400;line-height:24px}.footer_container p a{margin:0;padding:0;color:#fff;font-size:14px;font-weight:400;text-decoration:none}.footer_container p span a:hover{color:#fcd333}.footer_container h3{margin:0 0 15px;padding:0;color:#fff;font-size:18px;font-weight:400}.footer_container h4{margin:0 0 10px;padding:0;color:#fff;font-size:18px;font-weight:400}.footer_container h4 img{margin:0 0 0 20px;padding:0;vertical-align:middle;display:inline-block}.footer_container ul{margin:0;padding:0;list-style-type:none}.footer_container ul li{margin:0;padding:0;text-decoration:none;line-height:24px}.footer_container ul li a{margin:0;padding:0;text-decoration:none;display:block;color:#fff;font-size:14px;font-weight:400}.footer_container ul li a:hover{color:#fcd333}.footer_top{margin:0 0 35px;padding:0 0 30px;border-bottom:1px solid #fff;height: 258px;}.footer_left{margin:0;padding:0;width:330px;float:left}.footer_left p{padding:0 0 20px 35px;background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAAOCAYAAADwikbvAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYxIDY0LjE0MDk0OSwgMjAxMC8xMi8wNy0xMDo1NzowMSAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNS4xIFdpbmRvd3MiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6OEQ5N0U4QkE5QzY1MTFFOEJERDBBQjkxMUVCQzNCQ0QiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6OEQ5N0U4QkI5QzY1MTFFOEJERDBBQjkxMUVCQzNCQ0QiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDo4RDk3RThCODlDNjUxMUU4QkREMEFCOTExRUJDM0JDRCIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDo4RDk3RThCOTlDNjUxMUU4QkREMEFCOTExRUJDM0JDRCIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PmnYqbcAAACaSURBVHjaYvj//z8DNtyw6d7/J2+//49ZePU/LjU4NcLAx29/cBqAIbDk6PP/6ABkQMma2//xat549tV/fADqIkzNe6+8/U8M6N358D+K5mtPvvwnBUBdyECyRmQDmA7d/sCw6dxrBlLAzANPGZ5/+sXACLYeAv6ToJ8RRLAQUoDPYCYGCsDAaYb7+dTdjygSZsr8DITkAAIMAGP4gsZjKCo0AAAAAElFTkSuQmCC) left 3px no-repeat}.footer_logo{margin:0 0 25px;padding:0}.footer_logo img{margin:0;padding:0;max-width:100%;display:block}.footer_right{margin:0;padding:0;width:530px;float:right}.footer_nav{margin:0;padding:0;width:150px;float:left}.footer_newsletter{margin:0;padding:0;width:270px;float:right}.footer_newsletter h4{margin:0 0 15px}.footer_newsletter img{margin:0 8px 0 0;padding:0}.footer_newsletter_inpt{margin:0;padding:11px 15px;width:100%;color:#a5a6a7;font-size:14px;font-weight:500;border:none;border-radius:6px;font-family:'Poppins',sans-serif}.footer_newsletter_btn{margin:-44px 0 0 0;padding:11px 15px;width:90px;background:#6abfea;color:#fff;font-size:14px;font-weight:400;border:none;border-radius:0 6px 6px 0;font-family:'Poppins',sans-serif;cursor:pointer;display:block;position:relative;float:right}.footer_newsletter_btn:hover{background:#2db4f9}#test1{color:green}.hidden-box{display:none}.book_btn .active{background:#0979b5;color:#fff}.book_btn2 .active{background:#0979b5;color:#fff}.book_tour_listing_left .active{border:2px solid #6abfea}@media screen and (-webkit-min-device-pixel-ratio:0){.footer_newsletter_btn{margin:-43px 0 0 0}}.footer_bottom_left{margin:0;padding:0;width:255px;float:left}.footer_bottom_left img{margin:0;padding:0;max-width:100%;display:block}.footer_bottom_right{margin:5px 0 0;padding:0;float:right;text-align:right}.footer_bottom_right ul li{margin:0;padding:0 11px 0 16px;display:inline-block;background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAIAAAAOCAIAAACKFloIAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYxIDY0LjE0MDk0OSwgMjAxMC8xMi8wNy0xMDo1NzowMSAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNS4xIFdpbmRvd3MiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6MUYzMzk0QzU5QzZEMTFFODhBMzZERkUyMkQyNjY0NzYiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6MUYzMzk0QzY5QzZEMTFFODhBMzZERkUyMkQyNjY0NzYiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDoxRjMzOTRDMzlDNkQxMUU4OEEzNkRGRTIyRDI2NjQ3NiIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDoxRjMzOTRDNDlDNkQxMUU4OEEzNkRGRTIyRDI2NjQ3NiIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/Pg8aOiAAAAAnSURBVHjaYoxbeE2Kh41h9YkXD19/Z2IAA+pQLLfefH/++RdAgAEAlqcMzKOrN00AAAAASUVORK5CYII=) left 5px no-repeat}.footer_bottom_right ul li:first-child{background:none}.footer_bottom_right ul li:last-child{padding-right:0}.footer_bottom_right ul li a strong{font-weight:600}.about_mrg{margin:0 0 40px}.banner_inner{margin:0;padding:0;position:relative}.banner_inner img{margin:0;padding:0;width:100%;display:block}.about_caption{margin:0 auto;padding:0;width:100%;max-width:1135px;position:absolute;left:50%;top:28%;transform:translate(-50%,-50%);text-align:center}
</style>
<div class="footer">
    <div class="footer_container">
        <div class="footer_top">
            <div class="footer_left">
                <div class="footer_logo"><a href="#"><img src="https://bowlingtours-staging-co-uk.stackstaging.com/wp-content/themes/bowlingtours/assets/images/footer-logo.png"></a></div>
                <p>Sir Henry Darvill House, 8-10 William St, Windsor SL4 1BA</p>
                <h4>Follow Us
                    <a href="https://www.facebook.com/BowlingTours" target="_blank"><img src="https://bowlingtours-staging-co-uk.stackstaging.com/wp-content/themes/bowlingtours/assets/images/facebook.png"></a>
                    <!-- <a href="https://twitter.com/bowlingtours" target="_blank"><img src="https://bowlingtours-staging-co-uk.stackstaging.com/wp-content/themes/bowlingtours/assets/images/twitter.png"></a> -->
                    <!-- <a href="https://www.linkedin.com" target="_blank"><img src="https://bowlingtours-staging-co-uk.stackstaging.com/wp-content/themes/bowlingtours/assets/images/in.png"></a>
                    <a href="https://www.plus.google.com" target="_blank"><img src="https://bowlingtours-staging-co-uk.stackstaging.com/wp-content/themes/bowlingtours/assets/images/google.png"></a> -->
                    <a href="https://www.instagram.com/bowlingtours/" target="_blank"><img src="https://bowlingtours-staging-co-uk.stackstaging.com/wp-content/themes/bowlingtours/assets/images/instagram.png"></a></h4>
            </div>
            <div class="footer_right">
                <div class="footer_nav">
                    <h3>Useful Links</h3>
                    <ul><li id="menu-item-1664" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1664"><a href="/about-us/">About BT</a></li>
<li id="menu-item-5050" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-5050"><a href="/all-tours/public">Tours</a></li>
<!-- <li id="menu-item-1078" class="menu-item menu-item-type-taxonomy menu-item-object-types menu-item-1078"><a href="/types/top-picks/">Top Lawn Bowls Holiday Destinations</a></li>
<li id="menu-item-699" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-699"><a href="/memberships/">Membership</a></li>
<li id="menu-item-1079" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1079"><a href="/clubs/">Bowls fixtures list | Find a club near me</a></li> -->
<li id="menu-item-553" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-553"><a href="/terms-conditions/">Terms &amp; Conditions</a></li>
</ul>                </div>
                <div class="footer_newsletter">
                    <h3>Contact Us</h3>
                    <p><a href="tel:01753836600"><img src="https://bowlingtours-staging-co-uk.stackstaging.com/wp-content/themes/bowlingtours/assets/images/tel.png"> 01753 836 600</a><br> <span><a href="mailto:groups@bowlingtours.co.uk"><img src="https://bowlingtours-staging-co-uk.stackstaging.com/wp-content/themes/bowlingtours/assets/images/mail.png"> groups@bowlingtours.co.uk</a></span></p>
                    <!-- <h4>Newsletter</h4> -->
                                       <!--  <input name="" type="text" class="footer_newsletter_inpt" placeholder="Your Email">
                    <input name="submit" type="button" class="footer_newsletter_btn" value="Submit"> -->
                    <div class="clr"></div>
                </div>
                <div class="clr"></div>
            </div>
            <div class="clr"></div>
        </div>
        <!-- <div class="footer_bottom_left"><img src="https://bowlingtours-staging-co-uk.stackstaging.com/wp-content/themes/bowlingtours/assets/images/footer-star.png"></div> -->

     <!--  <div class="footer_bottom_right">
                 <ul><li id="menu-item-1482" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-privacy-policy menu-item-1482"><a rel="privacy-policy" href="https://bowlingtours-staging-co-uk.stackstaging.com/privacy-policy/">Privacy</a></li>
<li id="menu-item-1481" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1481"><a href="https://bowlingtours-staging-co-uk.stackstaging.com/cookies/">Cookies</a></li>
<li id="menu-item-1483" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1483"><a href="https://bowlingtours-staging-co-uk.stackstaging.com/about-us/">Bowling Tours 2022</a></li>
<li id="menu-item-63" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-63"><a href="#">Designed &#038; Developed by <strong>CDA</strong></a></li>
</ul>        </div>-->

         <div class="footer_bottom_right">
            <ul>
                <li id="menu-item-59">
                    <a href="/privacy-policy/" class="menu-image-title-after"><span class="menu-image-title">Privacy</span></a>
                </li>
                <!--<li id="menu-item-60">
                    <a href="/disclaimer" class="menu-image-title-after"><span class="menu-image-title">Disclaimer</span></a>-->
                
                <li id="menu-item-61">
                    <a href="/cookies" class="menu-image-title-after"><span class="menu-image-title">Cookies</span></a>
                </li>
                <li id="menu-item-62">
                    <a href="/about-us/" class="menu-image-title-after"><span class="menu-image-title"><strong>Bowling Tours 2024</strong></span></a>
                </li>
                <li id="menu-item-63">
                    <a href="javascript: void(0)" class="menu-image-title-after" style="cursor: default;"><span class="menu-image-title"><strong></strong></span></a>
                </li>
            </ul>
        </div>

        <div class="clr"></div>
    </div>
</div>
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
            window.location.href = "/all-tours/public/search?&price_from=0&price_to=999999&search_text="+$('#search_nav').val();
        }
        else
        {
            $('#search_nav').show();
        }
      

    });
</script>
</body>
</html>
