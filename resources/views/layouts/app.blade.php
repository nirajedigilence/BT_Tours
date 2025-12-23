<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name_cms', 'Tours-System') }}</title>
    <!-- Scripts -->
{{--    <script src="{{ asset('js/app.js') }}" defer></script>--}}
<!-- Fonts -->
    {{--    <link rel="dns-prefetch" href="https://fonts.gstatic.com">--}}
{{--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">--}}
    {{--    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">--}}
<!-- Styles -->
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500" rel="stylesheet"/>
    <link href="https://cdn.materialdesignicons.com/3.0.39/css/materialdesignicons.min.css" rel="stylesheet" />

    <!-- PLUGINS CSS STYLE -->
{{--    <link href="{{ asset('cms/bootstrap_4_3_1/css/bootstrap.min.css') }}" rel="stylesheet" />--}}
    <link href="{{ asset('cms/plugins/fontawesome-free-5_7_2-web/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('cms/plugins/toaster/toastr.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('cms/plugins/nprogress/nprogress.css') }}" rel="stylesheet" />
    <link href="{{ asset('cms/plugins/flag-icons/css/flag-icon.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('cms/plugins/jvectormap/jquery-jvectormap-2.0.3.css') }}" rel="stylesheet" />
    <link href="{{ asset('cms/plugins/ladda/ladda.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('cms/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
    {{-- <link href="{{ asset('css/custom.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <link href="{{ asset('cms/plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet" />
    <link href="{{ asset('cms/plugins/fancybox-master/dist/jquery.fancybox.css?v=2.1.5') }}" rel="stylesheet" type="text/css" media="screen" />

    <!-- SLEEK CSS -->
    <link href="{{ asset('cms/css/sleek.css') }}" rel="stylesheet">
    {{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}

    <script src="{{ asset('cms/plugins/jquery/jquery.min.js') }}"></script>
    
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="{{ asset('cms/plugins/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('cms/plugins/daterangepicker/locale/bg.js') }}"></script>
    <script src="{{ asset('cms/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('cms/js/jquery.colorbox-min.js') }}"></script>
    <!-- FAVICON -->
{{--    <link rel="icon" href="{{ asset('cms/img/favicon.png') }}">--}}
{{--    <!--[if IE]><link rel="shortcut icon" href="{{ asset('cms/img/favicon.png') }}"><![endif]-->--}}

    <!--
      HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
    -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="{{ asset('cms/plugins/nprogress/nprogress.js') }}"></script>

    <script src="{{ asset('cms/plugins/fancybox-master/dist/jquery.fancybox.js') }}"></script>

{{--    <link rel="stylesheet" type="text/css" href="{{ asset('cms/plugins/ckeditor/editor.css') }}" />--}}
{{--    <script type="text/javascript" src="{{ asset('cms/plugins/ckeditor/ckeditor.js') }}"></script>--}}
{{--    <script type="text/javascript" src="{{ asset('cms/plugins/ckeditor/editor.js') }}" ></script>--}}
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

    <!-- The basic File Upload plugin -->
{{--    <script src="{{ asset('cms/js/jquery.ui.widget.js') }}"></script>--}}
{{--    <script src="{{ asset('cms/js/jquery.iframe-transport.js') }}"></script>--}}
{{--    <script src="{{ asset('cms/js/jquery.fileupload.js') }}"></script>--}}
    <!-- html5.js for IE less than 9 -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>
<body class="sidebar-fixed sidebar-dark header-light header-fixed" id="body">
<script>
    NProgress.configure({ showSpinner: false });
    NProgress.start();
</script>

<div class="mobile-sticky-body-overlay"></div>

<div class="wrapper">

    <!--
====================================
——— LEFT SIDEBAR WITH FOOTER
=====================================
    -->
    <aside class="left-sidebar bg-sidebar">
        <div id="sidebar" class="sidebar sidebar-with-footer">
            <!-- Aplication Brand -->
            <div class="app-brand">
                <a href="{{ route('cms') }}">
                    <img src="{{ asset("images/logo-veenus-white.png") }}" alt="Logo">
                    {{--                    <span class="brand-name">Sleek Dashboard</span>--}}
                </a>
            </div>
            <!-- begin sidebar scrollbar -->
            <div class="sidebar-scrollbar">
                <!-- sidebar menu -->
                <ul class="nav sidebar-inner" id="sidebar-menu">

                    <li>
                        <a class="sidenav-item-link" href="{{ route('menus.menu.index') }}">
                            <i class="mdi mdi-view-dashboard-outline"></i>
                            <span class="nav-text">Menus</span>
                        </a>
                    </li>
                    <li  class="active expand has-sub">
                        <a class="sidenav-item-link" href="{{ route('news.news.index') }}" data-toggle="collapse" data-target="#menu-elem-2" aria-expanded="true" aria-controls="menu-elem-2">
                            <i class="mdi mdi-view-dashboard-outline"></i>
                            <span class="nav-text">News</span>
                        </a>
                        <ul class="collapse show" id="menu-elem-2" data-parent="#sidebar-menu">
                            <div class="sub-menu">
                                <li>
                                    <a class="sidenav-item-link" href="{{ route('news.news.index') }}">
                                        <span class="nav-text">News</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="sidenav-item-link" href="{{ route('news_categories.news_category.index') }}">
                                        <span class="nav-text">News Categories</span>
                                    </a>
                                </li>
                            </div>
                        </ul>
                    </li>
                    <li  class="active expand has-sub">
                        <a class="sidenav-item-link" href="#" data-toggle="collapse" data-target="#menu-elem-3" aria-expanded="true" aria-controls="menu-elem-3">
                            <i class="mdi mdi-view-dashboard-outline"></i>
                            <span class="nav-text">TOURS</span>
                        </a>
                        <ul class="collapse show" id="menu-elem-3" data-parent="#sidebar-menu">
                            <div class="sub-menu">
                                <li>
                                    <a class="sidenav-item-link" href="{{ route('experiences.experience.index') }}">
                                        <span class="nav-text">Tours</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="sidenav-item-link" href="{{ route('account-cmsuser') }}">
                                        <span class="nav-text">Current Tours</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="sidenav-item-link" href="{{ route('experience_categories.experience_category.index') }}">
                                        <span class="nav-text">Categories</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="sidenav-item-link" href="{{ route('attractions.attraction.index') }}">
                                        <span class="nav-text">Experiences</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="sidenav-item-link" href="{{ route('hotels.hotel.index') }}">
                                        <span class="nav-text">Hotels</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="sidenav-item-link" href="{{ route('ships.ship.index') }}">
                                        <span class="nav-text">Ships</span>
                                    </a>
                                </li>
                                <!-- <li>
                                    <a class="sidenav-item-link" href="{{ route('hotel_amenities.hotel_amenity.index') }}">
                                        <span class="nav-text">Hotel Amenities</span>
                                    </a>
                                </li> -->
                                <li>
                                    <a class="sidenav-item-link" href="{{ route('hotel_rooms.hotel_room.index') }}">
                                        <span class="nav-text">Hotel Rooms</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="sidenav-item-link" href="{{ route('hotel_supplements.hotel_supplement.index') }}">
                                        <span class="nav-text">Hotel Supplements</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="sidenav-item-link" href="{{ route('upscales.upscale.index') }}">
                                        <span class="nav-text">Hotel Upscales</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="sidenav-item-link" href="{{ route('experience_extras.experience_extra.index') }}">
                                        <span class="nav-text">Extras</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="sidenav-item-link" href="{{ route('experience_inclusions.experience_inclusion.index') }}">
                                        <span class="nav-text">Blue Bar Inclusions</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="sidenav-item-link" href="{{ route('experience_dates.experience_date.index') }}">
                                        <span class="nav-text">Dates</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="sidenav-item-link" href="{{ route('countries.country.index') }}">
                                        <span class="nav-text">Countries</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="sidenav-item-link" href="{{ route('country_areas.country_area.index') }}">
                                        <span class="nav-text">Country Areas</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="sidenav-item-link" href="{{ route('type.index') }}">
                                        <span class="nav-text">Type</span>
                                    </a>
                                </li>
                            </div>
                        </ul>
                    </li>
                    <li>
                        <a class="sidenav-item-link" href="{{ route('admin-enquiries-list') }}">
                            <i class="mdi mdi-view-dashboard-outline"></i>
                            <span class="nav-text">Enquiries</span>
                        </a>
                    </li>
                    <li >
                        <a class="sidenav-item-link" href="{{ route('contacts.contact.index') }}">
                            <i class="mdi mdi-view-dashboard-outline"></i>
                            <span class="nav-text">Contacts</span>
                        </a>
                    </li>
                    <li  class="has-sub">
                        <a class="sidenav-item-link collapsed" href="#" data-toggle="collapse" data-target="#menu-elem-4" aria-expanded="false" aria-controls="menu-elem-4">
                            <i class="mdi mdi-view-dashboard-outline"></i>
                            <span class="nav-text">Users</span>
                        </a>
                        <ul class="collapse" id="menu-elem-4" data-parent="#sidebar-menu">
                            <div class="sub-menu">
                                <li>
                                    <a class="sidenav-item-link" href="{{ route('users.index') }}">
                                        <span class="nav-text">Manage Users</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="sidenav-item-link" href="{{ route('roles.index') }}">
                                        <span class="nav-text">Manage Roles</span>
                                    </a>
                                </li>
                            </div>
                        </ul>
                    </li>
                    <li  class="has-sub">
                        <a class="sidenav-item-link collapsed" href="#" data-toggle="collapse" data-target="#menu-elem-wm" aria-expanded="false" aria-controls="menu-elem-wm">
                            <i class="mdi mdi-view-dashboard-outline"></i>
                            <span class="nav-text">Website Management</span>
                        </a>
                        <ul class="collapse" id="menu-elem-wm" data-parent="#sidebar-menu">
                            <div class="sub-menu">
                                <li>
                                    <a class="sidenav-item-link" href="{{ route('cancellation_reasons.index') }}">
                                        <span class="nav-text">Cancellation Reasons</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="sidenav-item-link" href="{{ route('commission.index') }}">
                                        <span class="nav-text">Commission</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="sidenav-item-link" href="{{ route('meal-basic.index') }}">
                                        <span class="nav-text">Meal Basic</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="sidenav-item-link" href="{{ route('icon-list.index') }}">
                                        <span class="nav-text">Icon List</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="sidenav-item-link" href="{{ route('rivers.index') }}">
                                        <span class="nav-text">Rivers</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="sidenav-item-link" href="{{ route('ship_details.index') }}">
                                        <span class="nav-text">Ship Details</span>
                                    </a>
                                </li>
                                 <li>
                                    <a class="sidenav-item-link" href="{{ route('target-settings.index') }}">
                                        <span class="nav-text">Target Settings</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="sidenav-item-link" href="{{ route('signature-settings.index') }}">
                                        <span class="nav-text">Signature Settings</span>
                                    </a>
                                </li>
                            </div>
                        </ul>
                    </li>
                    <li  class="has-sub">
                        <a class="sidenav-item-link collapsed" href="#" data-toggle="collapse" data-target="#menu-elem-et" aria-expanded="false" aria-controls="menu-elem-et">
                            <i class="mdi mdi-view-dashboard-outline"></i>
                            <span class="nav-text">EMAIL TEMPLATES</span>
                        </a>
                        <ul class="collapse" id="menu-elem-et" data-parent="#sidebar-menu">
                            <div class="sub-menu">
                                <li>
                                    <a class="sidenav-item-link" href="{{ route('email-templates.index') }}">
                                        <span class="nav-text">Alert Email</span>
                                    </a>
                                </li>
                            </div>
                        </ul>
                    </li>
                    <li>
                        <a class="sidenav-item-link" href="{{ route('home') }}">
                            <i class="fas fa-home"></i>
                            <span class="nav-text">Go to site</span>
                        </a>
                    </li>
                    <li>
                        <a class="sidenav-item-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="mdi mdi-logout"></i>
                            <span class="nav-text">{{ __('Logout') }}</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </aside>
    <div class="page-wrapper">
        <!-- Header -->
        <header class="main-header " id="header">
            <nav class="navbar navbar-static-top navbar-expand-lg">
                <!-- Sidebar toggle button -->
                <button id="sidebar-toggler" class="sidebar-toggle">
                    <span class="sr-only">Toggle navigation</span>
                </button>
                <!-- search form -->
                <div class="search-form d-none d-lg-inline-block">

                </div>
                <div class="navbar-right ">
                    <ul class="nav navbar-nav">
                        <!-- Github Link Button -->
                        <li class="github-link mr-3">

                        </li>
                        <li class="dropdown notifications-menu">

                        </li>
                        <!-- User Account -->
                        <li class="dropdown user-menu">
                            <button href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
{{--                                <img src="assets/img/user/user.png" class="user-image" alt="User Image" />--}}
                                <span class="d-none d-lg-inline-block">{{ Auth::user()->name }}</span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <!-- User image -->
                                {{--<li class="dropdown-header">
                                    <img src="assets/img/user/user.png" class="img-circle" alt="User Image" />
                                    <div class="d-inline-block">
                                        {{ Auth::user()->name }}{{--<small class="pt-1">{{ Auth::user()->name }}</small>
                                    </div>
                                </li>--}}

                                <li class="dropdown-footer">
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <i class="mdi mdi-logout"></i> {{ __('Logout') }}</a>
                                    <a href="{{ route('home') }}"> <i class="fas fa-home"></i> Go to site</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </nav>
        </header>
        <div class="content-wrapper">
            <div class="content">

                @yield('content')

            </div>
        </div>
        <footer class="footer mt-auto">
            <div class="copyright bg-white">
                <p>
                    &copy; <span id="copy-year">2020</span> Copyrights. All Rights Reserved.
                </p>
            </div>
            <script>
                var d = new Date();
                var year = d.getFullYear();
                document.getElementById("copy-year").innerHTML = year;
            </script>
        </footer>
    </div>
</div>

<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDCn8TFXGg17HAUcNpkwtxxyT9Io9B_NcM" defer></script> -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCrYs9n66w0Yh7bzhzRpWQCZ_QHavCZRow" defer></script>

<script src="{{ asset('cms/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('cms/plugins/toaster/toastr.min.js') }}"></script>
<script src="{{ asset('cms/plugins/slimscrollbar/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('cms/plugins/charts/Chart.min.js') }}"></script>
<script src="{{ asset('cms/plugins/ladda/spin.min.js') }}"></script>
<script src="{{ asset('cms/plugins/ladda/ladda.min.js') }}"></script>
<script src="{{ asset('cms/plugins/jquery-mask-input/jquery.mask.min.js') }}"></script>
<script src="{{ asset('cms/plugins/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('cms/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js') }}"></script>
<script src="{{ asset('cms/plugins/jvectormap/jquery-jvectormap-world-mill.js') }}"></script>

<script src="{{ asset('cms/plugins/jekyll-search.min.js') }}"></script>
<script src="{{ asset('cms/js/sleek.js') }}"></script>
{*<script src="{{ asset('cms/js/chart.js') }}"></script>*}
<script src="{{ asset('cms/js/date-range.js') }}"></script>
<script src="{{ asset('cms/js/map.js') }}"></script>
<script src="{{ asset('cms/js/custom.js') }}"></script>
</body>
</html>
