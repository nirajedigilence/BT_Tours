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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    {{--    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">--}}
<!-- Styles -->
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500" rel="stylesheet"/>
    <link href="https://cdn.materialdesignicons.com/3.0.39/css/materialdesignicons.min.css" rel="stylesheet" />

    <!-- PLUGINS CSS STYLE -->
    <link href="{{ asset('cms/bootstrap_4_3_1/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('cms/plugins/fontawesome-free-5_7_2-web/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('cms/plugins/toaster/toastr.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('cms/plugins/nprogress/nprogress.css') }}" rel="stylesheet" />
    <link href="{{ asset('cms/plugins/flag-icons/css/flag-icon.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('cms/plugins/jvectormap/jquery-jvectormap-2.0.3.css') }}" rel="stylesheet" />
    <link href="{{ asset('cms/plugins/ladda/ladda.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('cms/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('cms/plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet" />
    <link href="{{ asset('cms/plugins/fancybox-master/dist/jquery.fancybox.css?v=2.1.5') }}" rel="stylesheet" type="text/css" media="screen" />

    <!-- SLEEK CSS -->
    <link href="{{ asset('css/sleek.css') }}" rel="stylesheet">
    {{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}

    <script src="{{ asset('cms/plugins/jquery/jquery.min.js') }}"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="{{ asset('cms/plugins/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('cms/plugins/daterangepicker/locale/bg.js') }}"></script>
    <script src="{{ asset('cms/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('cms/js/jquery.colorbox-min.js') }}"></script>
    <!-- FAVICON -->
    <link href="{{ asset('cms/img/favicon.png') }}" rel="shortcut icon" />

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

    <link rel="stylesheet" type="text/css" href="{{ asset('cms/plugins/ckeditor/editor.css') }}" />
    <script type="text/javascript" src="{{ asset('cms/plugins/ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript" src="{{ asset('cms/plugins/ckeditor/editor.js') }}" ></script>

    <!-- The basic File Upload plugin -->
    <script src="{{ asset('cms/js/jquery.ui.widget.js') }}"></script>
    <script src="{{ asset('cms/js/jquery.iframe-transport.js') }}"></script>
    <script src="{{ asset('cms/js/jquery.fileupload.js') }}"></script>
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
                <a href="dashboard.php">
                    <img src="assets/img/logo-kak.png" alt="Logo">
{{--                    <span class="brand-name">Sleek Dashboard</span>--}}
                </a>
            </div>
            <!-- begin sidebar scrollbar -->
            <div class="sidebar-scrollbar">
                <!-- sidebar menu -->
                <ul class="nav sidebar-inner" id="sidebar-menu">

                    <li  class="has-sub active expand" >
                        <a class="sidenav-item-link" href="dashboard.php">
                            <i class="mdi mdi-view-dashboard-outline"></i>
                            <span class="nav-text">{#dashboard#}</span>
                        </a>
                    </li>

                    <li class="has-sub">
                        <a class="sidenav-item-link" href="menus.php" data-toggle="collapse" data-target="#menus" aria-expanded="true" aria-controls="menus">
                            <i class="mdi mdi-menu"></i>
                            <span class="nav-text">Menus</span> <b class="caret"></b>
                        </a>
                        <ul class="collapse" id="menus" data-parent="#sidebar-menu">
                            <div class="sub-menu">
{{--                                {section name=mp loop=$menu_posIDS}--}}
{{--                                <li>--}}
{{--                                    <a class="sidenav-item-link" href="menus.php?menu_pos={$menu_posIDS[mp].menu_pos}">--}}
{{--                                        <span class="nav-text">{$menu_posIDS[mp].name}</span>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                {/section}--}}
                            </div>
                        </ul>
                    </li>
                    @foreach ($fullmenu as $fml)
                    <li @if ($fml->submenu) class="has-sub"@endif>
                    <a class="sidenav-item-link" href="{{ $fml->url }}" @if ($fml->submenu) data-toggle="collapse" data-target="#menu-elem-{{ $fml->menu_id }}" aria-expanded="@if ($open_menu == $fml->open)true @else false @endif" aria-controls="menu-elem-{{ $fml->menu_id }}"@endif>
                    {if $fml.icon_class}<i class="mdi {$fml.icon_class}"></i>{/if}
                    <span class="nav-text">{$fml.name}</span>
                    {if $countNewOrder && $fml.menu_id == 200} <span class="quantity">{$countNewOrder}</span> {*<i class="fas fa-directions"></i>*}{/if} <b class="caret"></b>
                    </a>
                    {if $fml.submenu}
                    <ul class="collapse{if $open_menu == $fml.open} show{/if}" id="menu-elem-{$fml.menu_id}" data-parent="#sidebar-menu">
                        <div class="sub-menu">
                            {foreach item=fmls from=$fml.submenu}
                            <li>
                                <a class="sidenav-item-link" href="{$fmls.url}">
                                    <span class="nav-text">{$fmls.name}</span>
                                    {if $countNewCartOrder && $fmls.menu_id == 201} <span class="quantity">{$countNewCartOrder}</span> {/if}
                                    {if $countNewFastOrder && $fmls.menu_id == 202} <span class="quantity">{$countNewFastOrder}</span> {/if}
                                </a>
                            </li>
                            {/foreach}
                        </div>
                    </ul>
                    {/if}
                    </li>
                    @endforeach
                    {/if}
                </ul>
            </div>
            {*<hr class="separator" />
            <div class="sidebar-footer">
                <div class="sidebar-footer-content">
                    <h6 class="text-uppercase">
                        Cpu Uses <span class="float-right">40%</span>
                    </h6>
                    <div class="progress progress-xs">
                        <div class="progress-bar active" style="width: 40%;" role="progressbar"></div>
                    </div>
                    <h6 class="text-uppercase">
                        Memory Uses <span class="float-right">65%</span>
                    </h6>
                    <div class="progress progress-xs">
                        <div class="progress-bar progress-bar-warning" style="width: 65%;" role="progressbar"></div>
                    </div>
                </div>
            </div>*}
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
                    {if 0}
                    <div class="input-group">
                        <button type="button" name="search" id="search-btn" class="btn btn-flat">
                            <i class="mdi mdi-magnify"></i>
                        </button>
                        <input type="text" name="query" id="search-input" class="form-control" placeholder="'button', 'chart' etc."
                               autofocus autocomplete="off" />
                    </div>
                    <div id="search-results-container">
                        <ul id="search-results"></ul>
                    </div>
                    {/if}
                </div>
                <div class="navbar-right ">
                    <ul class="nav navbar-nav">
                        <!-- Github Link Button -->
                        <li class="github-link mr-3">
                            {if 0}
                            <a class="btn btn-outline-secondary btn-sm" href="https://github.com/tafcoder/sleek-dashboard" target="_blank">
                                <span class="d-none d-md-inline-block mr-2">Source Code</span>
                                <i class="mdi mdi-github-circle"></i>
                            </a>
                            {/if}
                        </li>
                        <li class="dropdown notifications-menu">
                            {if 0}
                            <button class="dropdown-toggle" data-toggle="dropdown">
                                <i class="mdi mdi-bell-outline"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li class="dropdown-header">You have 5 notifications</li>
                                <li>
                                    <a href="#">
                                        <i class="mdi mdi-account-plus"></i> New user registered
                                        <span class=" font-size-12 d-inline-block float-right"><i class="mdi mdi-clock-outline"></i> 10 AM</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="mdi mdi-account-remove"></i> User deleted
                                        <span class=" font-size-12 d-inline-block float-right"><i class="mdi mdi-clock-outline"></i> 07 AM</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="mdi mdi-chart-areaspline"></i> Sales report is ready
                                        <span class=" font-size-12 d-inline-block float-right"><i class="mdi mdi-clock-outline"></i> 12 PM</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="mdi mdi-account-supervisor"></i> New client
                                        <span class=" font-size-12 d-inline-block float-right"><i class="mdi mdi-clock-outline"></i> 10 AM</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="mdi mdi-server-network-off"></i> Server overloaded
                                        <span class=" font-size-12 d-inline-block float-right"><i class="mdi mdi-clock-outline"></i> 05 AM</span>
                                    </a>
                                </li>
                                <li class="dropdown-footer">
                                    <a class="text-center" href="#"> View All </a>
                                </li>
                            </ul>
                            {/if}
                        </li>
                        <!-- User Account -->
                        <li class="dropdown user-menu">
                            <button href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                <img src="assets/img/user/user.png" class="user-image" alt="User Image" />
                                <span class="d-none d-lg-inline-block">{$user.name}</span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <!-- User image -->
                                <li class="dropdown-header">
                                    <img src="assets/img/user/user.png" class="img-circle" alt="User Image" />
                                    <div class="d-inline-block">
                                        {$user.name} <small class="pt-1">{$user.username}</small>
                                    </div>
                                </li>
                                {if 0}
                                <li>
                                    <a href="profile.html">
                                        <i class="mdi mdi-account"></i> My Profile
                                    </a>
                                </li>
                                <li>
                                    <a href="email-inbox.html">
                                        <i class="mdi mdi-email"></i> Message
                                    </a>
                                </li>
                                <li>
                                    <a href="#"> <i class="mdi mdi-diamond-stone"></i> Projects </a>
                                </li>
                                <li>
                                    <a href="{#htaccess_change_password#}"> <i class="mdi mdi-settings"></i> {#change_password#}</a>
                                </li>
                                {/if}
                                <li class="dropdown-footer">
                                    <a href="logout.php"> <i class="mdi mdi-logout"></i> {#button_logout#}</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
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
                    &copy; <span id="copy-year">2019</span> Copyrights. All Rights Reserved.
                    {if 0}<a class="text-primary" href="http://www.kakdevelopment.com/" target="_blank">Уеб дизайн Бургас</a>{/if}
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

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDCn8TFXGg17HAUcNpkwtxxyT9Io9B_NcM" defer></script>
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/plugins/toaster/toastr.min.js"></script>
<script src="assets/plugins/slimscrollbar/jquery.slimscroll.min.js"></script>
<script src="assets/plugins/charts/Chart.min.js"></script>
<script src="assets/plugins/ladda/spin.min.js"></script>
<script src="assets/plugins/ladda/ladda.min.js"></script>
<script src="assets/plugins/jquery-mask-input/jquery.mask.min.js"></script>
<script src="assets/plugins/select2/js/select2.min.js"></script>
<script src="assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js"></script>
<script src="assets/plugins/jvectormap/jquery-jvectormap-world-mill.js"></script>

<script src="assets/plugins/jekyll-search.min.js"></script>
<script src="assets/js/sleek.js"></script>
{*<script src="assets/js/chart.js"></script>*}
<script src="assets/js/date-range.js"></script>
<script src="assets/js/map.js"></script>
<script src="assets/js/custom.js"></script>
</body>
</html>
