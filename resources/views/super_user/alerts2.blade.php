@extends('layouts.super_user')

@section('content')

<div class="notIndexContainer">
    <link href="{{ asset('css/style-bespoke.css') }}" rel="stylesheet">
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
                @include('partials.super_user_left',['open_menu' => 'bespoke', 'sub_marked' => 'bespoke_enquiries'])
            </div>

            <div class="middleCol">

                <div class="intro">

                    <div class="greeting">
                        Hello Norbert
                    </div>

                    <div class="alert_count">
                        There are 6 alerts
                    </div>

                </div>

                <div class="alerts_nav_wrapper">

                    <ul class="alerts_nav">

                        <li>
                            <a href="#" class="active">
                                Collaborators (20)
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                Hotels (17)
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                Attractions (16)
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                Cruises (5)
                            </a>
                        </li>

                    </ul>

                    <div class="search_sort">

                        <div class="search">
                            <input type="text" placeholder="Search">
                            <button type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>

                        <a href="#" class="sort">
                            Date<i class="fas fa-calendar-alt"></i>
                        </a>

                    </div>

                </div>

                <ul class="alerts_sub_nav">

                    <li>
                        <a href="#">
                            Docusign
                            <span>(1)</span>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            URL
                            <span>(0)</span>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            Tracking 1
                            <span>(0)</span>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            Tracking 2
                            <span>(0)</span>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            Deposit
                            <span>(0)</span>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            Tracking 3
                            <span>(0)</span>
                        </a>
                    </li>

                    <li>
                        <a href="#" class="active">
                            Guest list
                            <span>(5)</span>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            Invoice
                            <span>(0)</span>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            Tour pack
                            <span>(5)</span>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            Tour review
                            <span>(0)</span>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            Room Request
                            <span>(10)</span>
                        </a>
                    </li>

                </ul>

                <div class="account_alerts">

                    <div class="account_alert overdue">

                        <div class="icon"></div>

                        <div class="countdown_wrapper">
                            <div class="countdown">1 day(s) overdue</div>
                            <div class="alert_amount">Times alerted (2)</div>
                        </div>

                        <div class="heading">
                            Guest List not completed
                        </div>

                        <p>
                            <span class="location">BARNES COACHES</span>
                            <span>Fables of Fabulous Lancashire</span>
                            <span>Mon 03 May - Fri 07 May '21 (4 nights)</span>
                            <span>Peebles Hydro</span>
                            <span>Attraction Name</span>
                        </p>

                        <div class="ctas">
                            <a href="#" class="cta">Go to</a>
                            <a href="#" class="cta">Send alert</a>
                            <a href="#" class="cta">Contact info</a>
                        </div>

                    </div>

                    <div class="account_alert overdue">

                        <div class="icon"></div>
                        
                        <div class="countdown_wrapper">
                            <div class="countdown">1 day(s) overdue</div>
                            <div class="alert_amount">Times alerted (2)</div>
                        </div>

                        <div class="heading">
                            Guest List not completed
                        </div>

                        <p>
                            <span class="location">BARNES COACHES</span>
                            <span>Fables of Fabulous Lancashire</span>
                            <span>Mon 03 May - Fri 07 May '21 (4 nights)</span>
                            <span>Peebles Hydro</span>
                            <span>Attraction Name</span>
                        </p>

                        <div class="ctas">
                            <a href="#" class="cta">Go to</a>
                            <a href="#" class="cta">Send alert</a>
                            <a href="#" class="cta">Contact info</a>
                        </div>

                    </div>

                    <div class="account_alert">

                        <div class="icon"></div>
                        
                        <div class="countdown_wrapper">
                            <div class="countdown">1 day(s) overdue</div>
                            <div class="alert_amount">Times alerted (0)</div>
                        </div>

                        <div class="heading">
                            Guest List not completed
                        </div>

                        <p>
                            <span class="location">BARNES COACHES</span>
                            <span>Fables of Fabulous Lancashire</span>
                            <span>Mon 03 May - Fri 07 May '21 (4 nights)</span>
                            <span>Peebles Hydro</span>
                            <span>Attraction Name</span>
                        </p>

                        <div class="ctas">
                            <a href="#" class="cta">Go to</a>
                            <a href="#" class="cta">Send alert</a>
                            <a href="#" class="cta">Contact info</a>
                        </div>

                    </div>

                    <div class="account_alert">

                        <div class="icon"></div>
                        
                        <div class="countdown_wrapper">
                            <div class="countdown">1 day(s) overdue</div>
                            <div class="alert_amount">Times alerted (0)</div>
                        </div>

                        <div class="heading">
                            Guest List not completed
                        </div>

                        <p>
                            <span class="location">BARNES COACHES</span>
                            <span>Fables of Fabulous Lancashire</span>
                            <span>Mon 03 May - Fri 07 May '21 (4 nights)</span>
                            <span>Peebles Hydro</span>
                            <span>Attraction Name</span>
                        </p>

                        <div class="ctas">
                            <a href="#" class="cta">Go to</a>
                            <a href="#" class="cta">Send alert</a>
                            <a href="#" class="cta">Contact info</a>
                        </div>

                    </div>

                    <div class="account_alert">

                        <div class="icon"></div>
                        
                        <div class="countdown_wrapper">
                            <div class="countdown">1 day(s) overdue</div>
                            <div class="alert_amount">Times alerted (0)</div>
                        </div>

                        <div class="heading">
                            Guest List not completed
                        </div>

                        <p>
                            <span class="location">BARNES COACHES</span>
                            <span>Fables of Fabulous Lancashire</span>
                            <span>Mon 03 May - Fri 07 May '21 (4 nights)</span>
                            <span>Peebles Hydro</span>
                            <span>Attraction Name</span>
                        </p>

                        <div class="ctas">
                            <a href="#" class="cta">Go to</a>
                            <a href="#" class="cta">Send alert</a>
                            <a href="#" class="cta">Contact info</a>
                        </div>

                    </div>

                </div>

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
