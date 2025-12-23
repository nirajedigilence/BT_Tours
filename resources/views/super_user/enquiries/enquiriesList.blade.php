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

            <div id="cartExperiencesPart">
                @include ('cms.enquiries.enquiriesListReal', [
                    'items' => $data
                ])  
            </div>


            <!-- <div class="middleCol">

                <div class="main_content_nav">

                    <div class="filters">

                        <div class="filters_dropdown">

                            <div class="cta">
                                Filters
                            </div>

                        </div>

                        <ul class="active_filters">
                            <li class="label">Active filters:</li>
                            <li>Location <span>x</span></li>
                            <li>Town/City <span>x</span></li>
                        </ul>

                    </div>

                    <div class="search">

                        <div class="search__input">
                            <input type="text" placeholder="Search">
                            <button type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>

                    </div>

                </div>

                <div class="middleCol_row header">

                    <div class="column">
                        Collaborator Name
                    </div>

                    <div class="column">
                        Product Name
                    </div>

                    <div class="column">
                        Hotel Name
                    </div>

                    <div class="column">
                        Date
                    </div>

                    <div class="column width_small">
                        Tour Nrs
                    </div>

                    <div class="column width_small">
                        Tour Status
                    </div>

                </div>

                <div class="middleCol_row">

                    <div class="column large bold">
                        Barnes Coaches
                    </div>

                    <div class="column bold">
                        Mint, Mines & Vines
                    </div>

                    <div class="column">
                        Peebles Hydro
                    </div>

                    <div class="column">
                        Mon 03 May - Fri 07 May '21 
                        <span class="line_break">(4 nights) </span>
                        <span class="line_break">canx 02.04.2021</span>
                    </div>

                    <div class="column width_small">
                        16
                    </div>

                    <div class="column width_small centered">
                        <strong>30%</strong> 
                        <span class="line_break">Tracking 1</span>
                    </div>

                </div>

                <div class="middleCol_row">

                    <div class="column large bold">
                        Barnes Coaches
                    </div>

                    <div class="column bold">
                        Mint, Mines & Vines
                    </div>

                    <div class="column">
                        Peebles Hydro
                    </div>

                    <div class="column">
                        Mon 03 May - Fri 07 May '21 
                        <span class="line_break">(4 nights) </span>
                        <span class="line_break">canx 02.04.2021</span>
                    </div>

                    <div class="column width_small">
                        16
                    </div>

                    <div class="column width_small centered">
                        <strong>30%</strong> 
                        <span class="line_break">Tracking 1</span>
                    </div>

                </div>

                <div class="middleCol_row">

                    <div class="column large bold">
                        Barnes Coaches
                    </div>

                    <div class="column bold">
                        Mint, Mines & Vines
                    </div>

                    <div class="column">
                        Peebles Hydro
                    </div>

                    <div class="column">
                        Mon 03 May - Fri 07 May '21 
                        <span class="line_break">(4 nights) </span>
                        <span class="line_break">canx 02.04.2021</span>
                    </div>

                    <div class="column width_small">
                        16
                    </div>

                    <div class="column width_small centered">
                        <strong>30%</strong> 
                        <span class="line_break">Tracking 1</span>
                    </div>

                </div>

                <div class="middleCol_row">

                    <div class="column large bold">
                        Barnes Coaches
                    </div>

                    <div class="column bold">
                        Mint, Mines & Vines
                    </div>

                    <div class="column">
                        Peebles Hydro
                    </div>

                    <div class="column">
                        Mon 03 May - Fri 07 May '21 
                        <span class="line_break">(4 nights) </span>
                        <span class="line_break">canx 02.04.2021</span>
                    </div>

                    <div class="column width_small">
                        16
                    </div>

                    <div class="column width_small centered">
                        <strong>30%</strong> 
                        <span class="line_break">Tracking 1</span>
                    </div>

                </div>

                <div class="middleCol_row">

                    <div class="column large bold">
                        Barnes Coaches
                    </div>

                    <div class="column bold">
                        Mint, Mines & Vines
                    </div>

                    <div class="column">
                        Peebles Hydro
                    </div>

                    <div class="column">
                        Mon 03 May - Fri 07 May '21 
                        <span class="line_break">(4 nights) </span>
                        <span class="line_break">canx 02.04.2021</span>
                    </div>

                    <div class="column width_small">
                        16
                    </div>

                    <div class="column width_small centered">
                        <strong>30%</strong> 
                        <span class="line_break">Tracking 1</span>
                    </div>

                </div>

                <div class="middleCol_row">

                    <div class="column large bold">
                        Barnes Coaches
                    </div>

                    <div class="column bold">
                        Mint, Mines & Vines
                    </div>

                    <div class="column">
                        Peebles Hydro
                    </div>

                    <div class="column">
                        Mon 03 May - Fri 07 May '21 
                        <span class="line_break">(4 nights) </span>
                        <span class="line_break">canx 02.04.2021</span>
                    </div>

                    <div class="column width_small">
                        16
                    </div>

                    <div class="column width_small centered">
                        <strong>30%</strong> 
                        <span class="line_break">Tracking 1</span>
                    </div>

                </div>

                <div class="middleCol_row">

                    <div class="column large bold">
                        Barnes Coaches
                    </div>

                    <div class="column bold">
                        Mint, Mines & Vines
                    </div>

                    <div class="column">
                        Peebles Hydro
                    </div>

                    <div class="column">
                        Mon 03 May - Fri 07 May '21 
                        <span class="line_break">(4 nights) </span>
                        <span class="line_break">canx 02.04.2021</span>
                    </div>

                    <div class="column width_small">
                        16
                    </div>

                    <div class="column width_small centered">
                        <strong>30%</strong> 
                        <span class="line_break">Tracking 1</span>
                    </div>

                </div>

                <div class="middleCol_row">

                    <div class="column large bold">
                        Barnes Coaches
                    </div>

                    <div class="column bold">
                        Mint, Mines & Vines
                    </div>

                    <div class="column">
                        Peebles Hydro
                    </div>

                    <div class="column">
                        Mon 03 May - Fri 07 May '21 
                        <span class="line_break">(4 nights) </span>
                        <span class="line_break">canx 02.04.2021</span>
                    </div>

                    <div class="column width_small">
                        16
                    </div>

                    <div class="column width_small centered">
                        <strong>30%</strong> 
                        <span class="line_break">Tracking 1</span>
                    </div>

                </div>

                <div class="middleCol_row">

                    <div class="column large bold">
                        Barnes Coaches
                    </div>

                    <div class="column bold">
                        Mint, Mines & Vines
                    </div>

                    <div class="column">
                        Peebles Hydro
                    </div>

                    <div class="column">
                        Mon 03 May - Fri 07 May '21 
                        <span class="line_break">(4 nights) </span>
                        <span class="line_break">canx 02.04.2021</span>
                    </div>

                    <div class="column width_small">
                        16
                    </div>

                    <div class="column width_small centered">
                        <strong>30%</strong> 
                        <span class="line_break">Tracking 1</span>
                    </div>

                </div>

                <div class="middleCol_row">

                    <div class="column large bold">
                        Barnes Coaches
                    </div>

                    <div class="column bold">
                        Mint, Mines & Vines
                    </div>

                    <div class="column">
                        Peebles Hydro
                    </div>

                    <div class="column">
                        Mon 03 May - Fri 07 May '21 
                        <span class="line_break">(4 nights) </span>
                        <span class="line_break">canx 02.04.2021</span>
                    </div>

                    <div class="column width_small">
                        16
                    </div>

                    <div class="column width_small centered">
                        <strong>30%</strong> 
                        <span class="line_break">Tracking 1</span>
                    </div>

                </div>

                <div class="middleCol_row">

                    <div class="column large bold">
                        Barnes Coaches
                    </div>

                    <div class="column bold">
                        Mint, Mines & Vines
                    </div>

                    <div class="column">
                        Peebles Hydro
                    </div>

                    <div class="column">
                        Mon 03 May - Fri 07 May '21 
                        <span class="line_break">(4 nights) </span>
                        <span class="line_break">canx 02.04.2021</span>
                    </div>

                    <div class="column width_small">
                        16
                    </div>

                    <div class="column width_small centered">
                        <strong>30%</strong> 
                        <span class="line_break">Tracking 1</span>
                    </div>

                </div>

            </div>


            <div class="rightCol">

                <div class="heading">
                    TOUR STATUS
                </div>

                <div class="deposit">
                    <span>50%</span>
                    DEPOSIT <i class="fas fa-info-circle"></i>
                </div>

                <div class="details">

                    <div class="detail">
                        <p>Date Booked</p>
                        <p>25.04.2020</p>
                    </div>

                    <div class="detail">
                        <p>Date Booked</p>
                        <p>25.04.2020</p>
                    </div>

                    <div class="detail">
                        <p>Date Booked</p>
                        <p>25.04.2020</p>
                    </div>

                    <div class="detail">
                        <p>Date Booked</p>
                        <p>25.04.2020</p>
                    </div>

                    <div class="detail">
                        <p>Date Booked</p>
                        <p>25.04.2020</p>
                    </div>

                    <div class="detail">
                        <p>Date Booked</p>
                        <p>25.04.2020</p>
                    </div>

                    <div class="detail">
                        <p>Date Booked</p>
                        <p>25.04.2020</p>
                    </div>

                    <div class="detail">
                        <p>Date Booked</p>
                        <p>25.04.2020</p>
                    </div>

                    <div class="detail">
                        <p>Date Booked</p>
                        <p>25.04.2020</p>
                    </div>

                </div>

                <div class="ctas">

                    <a href="#" class="cta">
                        Tour Overview
                    </a>

                    <a href="#" class="cta">
                        Guest List
                    </a>

                </div>

            </div> -->


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
