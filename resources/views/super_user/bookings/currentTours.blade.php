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

            {{-- <div id="cartExperiencesPart">
                @include ('cms.enquiries.enquiriesListReal', [
                    'items' => $data
                ])  
            </div> --}}


            <div class="middleCol">

                <div class="main_content_nav">

                    <div class="filters">

                        <div class="filters_dropdown">

                            <div class="cta">
                                Filters
                            </div>

                            <div class="dropdown">

                                <div class="dropdown_section">

                                    <div class="heading">
                                        By Booking Stage
                                    </div>

                                    <div class="by_booking_stages">

                                        <a href="#" class="stage">
                                            <div class="percentage">10%</div>
                                            <div class="line"></div>
                                            <div class="label">Docusign</div>
                                        </a>

                                        <a href="#" class="stage">
                                            <div class="percentage">20%</div>
                                            <div class="line"></div>
                                            <div class="label">URL</div>
                                        </a>

                                        <a href="#" class="stage">
                                            <div class="percentage">30%</div>
                                            <div class="line"></div>
                                            <div class="label">Tracking 1</div>
                                        </a>

                                        <a href="#" class="stage">
                                            <div class="percentage">40%</div>
                                            <div class="line"></div>
                                            <div class="label">Tracking 2</div>
                                        </a>

                                        <a href="#" class="stage">
                                            <div class="percentage">50%</div>
                                            <div class="line"></div>
                                            <div class="label">Deposit</div>
                                        </a>

                                        <a href="#" class="stage active">
                                            <div class="percentage">60%</div>
                                            <div class="line"></div>
                                            <div class="label">Tracking 3</div>
                                        </a>

                                        <a href="#" class="stage">
                                            <div class="percentage">70%</div>
                                            <div class="line"></div>
                                            <div class="label">Guest list</div>
                                        </a>

                                        <a href="#" class="stage">
                                            <div class="percentage">80%</div>
                                            <div class="line"></div>
                                            <div class="label">Invoice</div>
                                        </a>

                                        <a href="#" class="stage">
                                            <div class="percentage">90%</div>
                                            <div class="line"></div>
                                            <div class="label">Tour pack</div>
                                        </a>

                                        <a href="#" class="stage">
                                            <div class="percentage">100%</div>
                                            <div class="line"></div>
                                            <div class="label">Tour review</div>
                                        </a>

                                    </div>

                                </div>

                                <div class="dropdown_section">

                                    <div class="heading">
                                        By Date
                                    </div>

                                    <div class="by_date">

                                        <div class="field">
                                            <div class="label">By Month</div>
                                            <select>
                                                <option value="">January</option>
                                                <option value="">February</option>
                                                <option value="">March</option>
                                                <option value="">April</option>
                                                <option value="">May</option>
                                                <option value="">June</option>
                                                <option value="">July</option>
                                                <option value="" selected>August</option>
                                                <option value="">September</option>
                                                <option value="">October</option>
                                                <option value="">November</option>
                                                <option value="">December</option>
                                            </select>
                                        </div>

                                        <div class="field">
                                            <div class="label">Date From</div>
                                            <div class="input_wrapper">
                                                <input type="text" placeholder="05/03/2021">
                                                <div class="icon"></div>
                                            </div>
                                        </div>

                                        <div class="field">
                                            <div class="label">Date Until</div>
                                            <div class="input_wrapper">
                                                <input type="text" placeholder="09/09/2021">
                                                <div class="icon"></div>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <div class="dropdown_section">

                                    <div class="heading">
                                        Other Filters
                                    </div>

                                    <div class="other_filters">

                                        <a href="#" class="option">
                                            Collaborator
                                        </a>

                                        <a href="#" class="option active">
                                            Attraction
                                        </a>

                                        <a href="#" class="option">
                                            Next step
                                        </a>

                                        <a href="#" class="option">
                                            Ref no.
                                        </a>

                                        <a href="#" class="option">
                                            Hotel
                                        </a>

                                        <a href="#" class="option active">
                                            Tour Numbers
                                        </a>

                                        <a href="#" class="option">
                                            Next step due
                                        </a>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <ul class="active_filters">
                            <li class="label">Active filters:</li>
                            <li>Stage <span>x</span></li>
                            <li>Tour Numbers <span>x</span></li>
                            <li>Date <span>x</span></li>
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

                    <div class="column width_small centered">
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
                        <span class="line_break"><em>canx 02.04.2021</em></span>
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
                        <span class="line_break"><em>canx 02.04.2021</em></span>
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
                        <span class="line_break"><em>canx 02.04.2021</em></span>
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
                        <span class="line_break"><em>canx 02.04.2021</em></span>
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
                        <span class="line_break"><em>canx 02.04.2021</em></span>
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
                        <span class="line_break"><em>canx 02.04.2021</em></span>
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
                        <span class="line_break"><em>canx 02.04.2021</em></span>
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
                        <span class="line_break"><em>canx 02.04.2021</em></span>
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
                        <span class="line_break"><em>canx 02.04.2021</em></span>
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
                        <span class="line_break"><em>canx 02.04.2021</em></span>
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
                        <span class="line_break"><em>canx 02.04.2021</em></span>
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
                        <p>Tour date</p>
                        <p>03.05.2021</p>
                    </div>

                    <div class="detail">
                        <p>Canx date</p>
                        <p>02.04.2021</p>
                    </div>

                    <div class="detail">
                        <p>Canx days</p>
                        <p>30</p>
                    </div>

                    <div class="detail">
                        <p>Tour numbers</p>
                        <p>16</p>
                    </div>

                    <div class="detail">
                        <p>Tour Url:</p>
                        <p>www.barnes.co...</p>
                    </div>

                    <div class="detail">
                        <p>Next Step</p>
                        <p>3rd Tracking</p>
                    </div>

                    <div class="detail">
                        <p>Next step due</p>
                        <p>15 days</p>
                    </div>

                    <div class="detail">
                        <p>Average Score</p>
                        <p>4.8</p>
                    </div>

                </div>

                <div class="ctas">

                    <a href="#" class="cta">
                        Tour Overview
                    </a>

                    <a href="#" class="cta">
                        Guest List
                    </a>

                    <a href="#" class="cta">
                        Documents
                    </a>

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
