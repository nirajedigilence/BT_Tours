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
                        Hello Jenny
                    </div>

                    <div class="alert_count">
                        There are 6 alerts
                    </div>

                </div>

                <div class="filters__search">

                    <div class="filters">

                        <!-- <div class="filters_cta">
                            Filters
                        </div> -->

                    </div>

                </div>

                <div class="account_alerts">

                    <div class="account_alert overdue">

                        <div class="icon"></div>
                        
                        <div class="countdown_wrapper">
                            <div class="countdown">1 day overdue</div>
                        </div>

                        <div class="heading">
                            URL
                        </div>

                        <p>
                            <span class="location">Regal Scotland</span>
                            <span>Mon 03 May - Fri 07 May '21 (4 nights)</span>
                            <span>Peebles Hydro, Peebles</span>
                        </p>

                        <div class="ctas">
                            <a href="#" class="cta">Go to</a>
                            <a href="#" class="cta">Contact</a>
                        </div>

                    </div>

                    <div class="account_alert overdue">

                        <div class="icon"></div>
                        
                        <div class="countdown_wrapper">
                            <div class="countdown">5 days overdue</div>
                        </div>

                        <div class="heading">
                            Tracking 2
                        </div>

                        <p>
                            <span class="location">Mint, Mines & Vines</span>
                            <span>Tue 15 Jun - Fri 18 Jun '21 (4 nights)</span>
                            <span>Peebles Hydro, Peebles</span>
                        </p>

                        <div class="ctas">
                            <a href="#" class="cta">Go to</a>
                            <a href="#" class="cta">Contact</a>
                        </div>

                    </div>

                    <div class="account_alert">

                        <div class="icon"></div>
                        
                        <div class="countdown_wrapper">
                            <div class="countdown">3 days left</div>
                        </div>

                        <div class="heading">
                            Deposit
                        </div>

                        <p>
                            <span class="location">Hampshire through the Ages</span>
                            <span>Sat 23 Jul - Fri 30 Jun '21 (4 nights)</span>
                            <span>Peebles Hydro, Peebles</span>
                        </p>

                        <div class="ctas">
                            <a href="#" class="cta">Go to</a>
                            <a href="#" class="cta">Contact</a>
                        </div>

                    </div>

                    <div class="account_alert">

                        <div class="icon"></div>
                        
                        <div class="countdown_wrapper">
                            <div class="countdown">5 days left</div>
                        </div>

                        <div class="heading">
                            Tracking 3
                        </div>

                        <p>
                            <span class="location">The Yorkshire Gourmet Tour</span>
                            <span>Wed 05 Aug - Sun 09 May '21 (4 nights)</span>
                            <span>Peebles Hydro, Peebles</span>
                        </p>

                        <div class="ctas">
                            <a href="#" class="cta">Go to</a>
                            <a href="#" class="cta">Contact</a>
                        </div>

                    </div>

                    <div class="account_alert">

                        <div class="icon"></div>
                        
                        <div class="countdown_wrapper">
                            <div class="countdown">5 days left</div>
                        </div>

                        <div class="heading">
                            Guest List
                        </div>

                        <p>
                            <span class="location">Mint, Mines & Vines</span>
                            <span>Sat 23 Jul - Fri 30 Jun '21 (4 nights)</span>
                            <span>Peebles Hydro, Peebles</span>
                        </p>

                        <div class="ctas">
                            <a href="#" class="cta">Go to</a>
                            <a href="#" class="cta">Contact</a>
                        </div>

                    </div>

                    <div class="account_alert">

                        <div class="icon"></div>
                        
                        <div class="countdown_wrapper">
                            <div class="countdown">6 days left</div>
                        </div>

                        <div class="heading">
                            Guest List
                        </div>

                        <p>
                            <span class="location">Midlands Motor Mania</span>
                            <span>Wed 05 Aug - Sun 09 May '21 (4 nights)</span>
                            <span>Peebles Hydro, Peebles</span>
                        </p>

                        <div class="ctas">
                            <a href="#" class="cta">Go to</a>
                            <a href="#" class="cta">Contact</a>
                        </div>

                    </div>

                    <div class="account_alert">

                        <div class="icon"></div>
                        
                        <div class="countdown_wrapper">
                            <div class="countdown">6 days left</div>
                        </div>

                        <div class="heading">
                            Invoice Paid
                        </div>

                        <p>
                            <span class="location">Regal Scotland</span>
                            <span>Mon 03 May - Fri 07 May '21 (4 nights)</span>
                            <span>Peebles Hydro, Peebles</span>
                        </p>

                        <div class="ctas">
                            <a href="#" class="cta">Go to</a>
                            <a href="#" class="cta">Contact</a>
                        </div>

                    </div>

                    <div class="account_alert">

                        <div class="icon"></div>
                        
                        <div class="countdown_wrapper">
                            <div class="countdown">8 days left</div>
                        </div>

                        <div class="heading">
                            Tour Review
                        </div>

                        <p>
                            <span class="location">Hampshire through the Ages</span>
                            <span>Mon 03 May - Fri 07 May '21 (4 nights)</span>
                            <span>Peebles Hydro, Peebles</span>
                        </p>

                        <div class="ctas">
                            <a href="#" class="cta">Go to</a>
                            <a href="#" class="cta">Contact</a>
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
