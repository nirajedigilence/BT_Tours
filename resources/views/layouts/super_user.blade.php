<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{isset($page_title)?$page_title.'- Veenus':'Veenus'}}</title>
    <meta charset=utf-8>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="_token" content="{!! csrf_token() !!}"/>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    

    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery.fancybox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('cms/css/sleek.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-datepicker3.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.js') }}"></script>
    <script src="{{ asset('js/jquery.ui.touch-punch.min.js') }}"></script>
    <script src="{{ asset('js/jquery.fancybox.min.js') }}"></script>


    <script src="{{ asset('js/laravel.ajax.js') }}"></script>
{{--    <script>--}}
{{--        laravel.errors.errorBagContainer = $('#errors');--}}
{{--        laravel.errors.showErrorsBag = true;--}}
{{--        laravel.errors.showErrorsInFormGroup = false;--}}
{{--        laravel.bootstrapVersion = 4;--}}
{{--    </script>--}}

</head>

<body>

<header @isset($isHome) @if ($isHome) class="indexHeader" @endif @endisset>
    <div class="container">
        <div class="headerRow">
            <div class="logoBox">
                <a href="{{ route('home') }}"><img src="{{ asset('images/logo2x.png') }}" alt="Veenus"></a>
                <div class="navBtn only-mobile" id="topMenu">
                    <input id="menu__toggle" type="checkbox" />
                    <label class="menu__btn" for="menu__toggle">
                        <span></span>
                    </label>
                </div>
            </div>
            <div class="menuBox">
                <ul class="menu">
                    <li class="menuLi">
                        <a class="menuLink" href="{{ route('search.main') }}?&price_from=0&price_to=999999">Products</a>
                    </li>
                    <li class="menuLi">
                        <a class="menuLink" href="{{ route('about') }}">About</a>
                    </li>

                    <li class="menuLi">
                        <a class="menuLink" href="{{ route('partnership') }}">Partnership</a>
                    </li>
                    @if(!empty($viewData['mainMenu']))
                        @foreach ($viewData['mainMenu'] as $menu)
                            <li class="menuLi @if($menu->childrenActive->count() > 0) hasSubmenu @endif">
                                <a class="menuLink" href="@if ($menu->url) {{ $menu->url }} @elseif ($menu->htaccess_url) {{ $menu->htaccess_url }} @else {{ route('menus.info.show', $menu->id) }} @endif">{{ $menu->name }}</a>
                                @if($menu->childrenActive->count() > 0)
                                    <div class="submenuHolder">
                                        <span class="orangeLine"></span>
                                        <ul class="submenu">
                                            @foreach ($menu->childrenActive as $child)
                                                <li class="submenuLi">
                                                    <a class="submenuLink" href="@if ($child->url) {{ $child->url }} @elseif ($child->htaccess_url) {{ $child->htaccess_url }} @else {{ route('menus.info.show', $child->id) }} @endif">{{ $child->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <span class="orangeLine2"></span>
                                    </div>
                                @endif
                            </li>
                        @endforeach
                    @endif
                    <li class="menuLi">
                        <a class="menuLink" href="{{ route('news.list') }}">News</a>
                    </li>
                    <li class="menuLi">
                        <input type="text" value="" name="search_nav" id="search_nav" style="padding: 2px;"> <a href="javascript:void();" class="menuLink search_tour_nav" href=""><i class="fas fa-search"></i></a>
                    </li>
                    <li class="menuLi only-mobile">
                        <a class="userLink" href="{{ route('login') }}"><i class="fas fa-user-circle"></i>Account</a>
                    </li>
                </ul>
            </div>
            <div class="accountBox">
                @guest
                    <a href="{{ route('login') }}"><i class="fas fa-user-circle"></i>Log in</a>
                @else
                    @hasrole('Super Admin')
                        <a href="{{ route('bespoke-enquiries') }}"><i class="fas fa-user-circle"></i>Account</a>
                    @else
                        <a href="{{ route('home') }}"><i class="fas fa-user-circle"></i>Account</a>
                    @endhasrole
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i>
{{--                            {{ __('Logout') }}--}}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                @endguest
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

        if ($(".only-mobile").css("display") == "block") {
            $(".filterBtn").removeClass("open");
        }



        $(".sortBy").bind("click", function(e){
            if ($(this).hasClass("active")) {

            }else {
                console.log($(this).data("sortby"));
                $("#inputSortBy").val($(this).data("sortby"));
                console.log($("#inputSortBy").val());

                $(".sortBy").removeClass("active");
                $(this).addClass("active");
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

        $(".viewBtn").bind("click", function(e){
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


<footer id="footer">
    <div class="topFooter">
        <div class="container">
            <div class="footerRow">
                <div class="footerMenus">
                    <div class="footerMenu">
                        <h5 class="title">Packages</h5>
                        <ul class="list">
                            @if(!empty($viewData['menuFooter1']))
                                @foreach ($viewData['menuFooter1'] as $menu)
                                <li><a href="@if ($menu->url) {{ $menu->url }} @elseif ($menu->htaccess_url) {{ $menu->htaccess_url }} @else {{ route('menus.info.show', $menu->id) }} @endif">{{ $menu->name }}</a></li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                    <div class="footerMenu">
                        <h5 class="title">Get Started</h5>
                        <ul class="list">
                            @if(!empty($viewData['menuFooter2']))
                                @foreach ($viewData['menuFooter2'] as $menu)
                                    <li><a href="@if ($menu->url) {{ $menu->url }} @elseif ($menu->htaccess_url) {{ $menu->htaccess_url }} @else {{ route('menus.info.show', $menu->id) }} @endif">{{ $menu->name }}</a></li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                    <div class="footerMenu">
                        <h5 class="title">Additional Information</h5>
                        <ul class="list">
                            @if(!empty($viewData['menuFooter3']))
                                @foreach ($viewData['menuFooter3'] as $menu)
                                    <li><a href="@if ($menu->url) {{ $menu->url }} @elseif ($menu->htaccess_url) {{ $menu->htaccess_url }} @else {{ route('menus.info.show', $menu->id) }} @endif">{{ $menu->name }}</a></li>
                                @endforeach
                            @endif
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
                    <a href=""><i class="fab fa-facebook-f"></i></a>
                    <a href=""><i class="fab fa-instagram"></i></a>
                    <a href=""><i class="fab fa-linkedin-in"></i></a>
                </div>
                <div class="terms">Sir Henry Darvill House, 8-10 William St, Windsor SL4 1BA</div>
            </div>
        </div>
    </div>
</footer>
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
