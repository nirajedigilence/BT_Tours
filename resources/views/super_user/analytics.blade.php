@extends('layouts.front')

@section('content')

<div class="notIndexContainer">

    <div class="accountContainer">
        <div class="accountRow">

            <div class="leftCol">
                @include('partials.super_user_left',['open_menu' => 'database', 'sub_marked' => 'hotels']);
            </div>

            <div class="analytics_wrapper">

                <div class="heading">
                    Analytics
                </div>

                <div class="analytics">

                    <div class="card">

                        <div class="sub_heading">
                            Weekly Analytics
                        </div>

                        <div class="columns">

                            <div class="column width_25">

                                <div class="target">

                                    <div class="label">
                                        Weekly Veenus Target
                                    </div>

                                    <div class="bar_wrapper">
                                        <div class="bar green" style="width: 100%;"></div>
                                    </div>

                                    <div class="amount">
                                        <span class="green">&pound;11,023</span> / &pound;11,000
                                    </div>

                                </div>

                                <div class="analytics_table">

                                    <div class="analytics_row">
                                        <div class="analytics_column"></div>
                                        <div class="analytics_column bold">Margin</div>
                                        <div class="analytics_column bold">Bookings</div>
                                    </div>

                                    <div class="analytics_row">
                                        <div class="analytics_column bold">2020/21</div>
                                        <div class="analytics_column">&pound;9,092</div>
                                        <div class="analytics_column">10</div>
                                    </div>

                                    <div class="analytics_row">
                                        <div class="analytics_column bold">2021/22</div>
                                        <div class="analytics_column">&pound;1,404</div>
                                        <div class="analytics_column">2</div>
                                    </div>

                                    <div class="analytics_row">
                                        <div class="analytics_column bold">Total</div>
                                        <div class="analytics_column bold">&pound;10,496</div>
                                        <div class="analytics_column bold">12</div>
                                    </div>

                                </div>

                            </div>

                            <div class="column width_50">

                                <div class="analytics_table_split">

                                    <div class="card">

                                        <div class="sub_heading">
                                            Experience Categories
                                        </div>

                                        <div class="analytics_table">

                                            <div class="analytics_row">
                                                <div class="analytics_column"></div>
                                                <div class="analytics_column bold">Margin</div>
                                                <div class="analytics_column bold">Bookings</div>
                                            </div>

                                            <div class="analytics_row">
                                                <div class="analytics_column bold">MG</div>
                                                <div class="analytics_column">&pound;2,092</div>
                                                <div class="analytics_column">2</div>
                                            </div>

                                            <div class="analytics_row">
                                                <div class="analytics_column bold">J</div>
                                                <div class="analytics_column">&pound;1,404</div>
                                                <div class="analytics_column">2</div>
                                            </div>

                                            <div class="analytics_row">
                                                <div class="analytics_column bold">I</div>
                                                <div class="analytics_column">&pound;1,186</div>
                                                <div class="analytics_column">3</div>
                                            </div>

                                            <div class="analytics_row">
                                                <div class="analytics_column bold">SE</div>
                                                <div class="analytics_column">&pound;2,337</div>
                                                <div class="analytics_column">1</div>
                                            </div>

                                            <div class="analytics_row">
                                                <div class="analytics_column bold">AE</div>
                                                <div class="analytics_column">&pound;879</div>
                                                <div class="analytics_column">2</div>
                                            </div>

                                            <div class="analytics_row">
                                                <div class="analytics_column bold">MA</div>
                                                <div class="analytics_column">&pound;1,012</div>
                                                <div class="analytics_column">2</div>
                                            </div>

                                            <div class="analytics_row">
                                                <div class="analytics_column bold">Total</div>
                                                <div class="analytics_column bold">&pound;8,496</div>
                                                <div class="analytics_column bold">12</div>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="card">

                                        <div class="sub_heading">
                                            Location
                                        </div>

                                        <div class="analytics_table">

                                            <div class="analytics_row">
                                                <div class="analytics_column"></div>
                                                <div class="analytics_column bold">Margin</div>
                                                <div class="analytics_column bold">Bookings</div>
                                            </div>

                                            <div class="analytics_row">
                                                <div class="analytics_column bold">England</div>
                                                <div class="analytics_column">&pound;1,186</div>
                                                <div class="analytics_column">5</div>
                                            </div>

                                            <div class="analytics_row">
                                                <div class="analytics_column bold">Scotland</div>
                                                <div class="analytics_column">&pound;879</div>
                                                <div class="analytics_column">2</div>
                                            </div>

                                            <div class="analytics_row">
                                                <div class="analytics_column bold">Wales</div>
                                                <div class="analytics_column">&pound;1,786</div>
                                                <div class="analytics_column">6</div>
                                            </div>

                                            <div class="analytics_row">
                                                <div class="analytics_column bold">Ireland</div>
                                                <div class="analytics_column">&pound;2,337</div>
                                                <div class="analytics_column">6</div>
                                            </div>

                                            <div class="analytics_row">
                                                <div class="analytics_column bold">Europe</div>
                                                <div class="analytics_column">&pound;879</div>
                                                <div class="analytics_column">1</div>
                                            </div>

                                            <div class="analytics_row">
                                                <div class="analytics_column bold">Cruises</div>
                                                <div class="analytics_column">&pound;2,337</div>
                                                <div class="analytics_column">4</div>
                                            </div>

                                            <div class="analytics_row">
                                                <div class="analytics_column bold">Total</div>
                                                <div class="analytics_column bold">&pound;8,496</div>
                                                <div class="analytics_column bold">12</div>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="column width_25">

                                <div class="ctas">

                                    <a href="#" class="cta">
                                        Weekly analytics report
                                    </a>

                                    <a href="#" class="cta">
                                        Weekly bookings
                                    </a>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="card">

                        <div class="sub_heading">
                            Global Figures
                        </div>

                        <div class="columns">

                            <div class="column width_25">

                                <div class="target">

                                    <div class="label">
                                        Annual sales figure vs target
                                    </div>

                                    <div class="bar_wrapper">
                                        <div class="bar red" style="width: 40%;"></div>
                                    </div>

                                    <div class="amount">
                                        <span class="red">&pound;120,234</span> / &pound;500,000
                                    </div>

                                </div>

                                <ul class="global_figures">

                                    <li>
                                        <div class="label">Total tours booked</div>
                                        <div class="results">
                                            <div class="result">UK 120</div>
                                            <div class="result">EU 23</div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="label">Avg margin per tour UK/EU</div>
                                        <div class="results">
                                            <div class="result">UK &pound;1,238</div>
                                            <div class="result">EU &pound;1,238</div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="label">Avg loadings UK/EU</div>
                                        <div class="results">
                                            <div class="result">UK 25</div>
                                            <div class="result">EU 23</div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="label">Canx rate tours UK/EU</div>
                                        <div class="results">
                                            <div class="result">UK 21%</div>
                                            <div class="result">EU 15%</div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="label">Total 4.0+ reviews</div>
                                        <div class="results">
                                            <div class="result">545/734</div>
                                        </div>
                                    </li>

                                </ul>

                            </div>

                            <div class="column width_50">

                                <div class="analytics_table_split">

                                    <div class="card">

                                        <div class="sub_heading">
                                            Experience Categories
                                        </div>

                                        <div class="analytics_table">

                                            <div class="analytics_row">
                                                <div class="analytics_column"></div>
                                                <div class="analytics_column bold">Margin</div>
                                                <div class="analytics_column bold">Bookings</div>
                                            </div>

                                            <div class="analytics_row">
                                                <div class="analytics_column bold">MG</div>
                                                <div class="analytics_column">&pound;2,092</div>
                                                <div class="analytics_column">2</div>
                                            </div>

                                            <div class="analytics_row">
                                                <div class="analytics_column bold">J</div>
                                                <div class="analytics_column">&pound;1,404</div>
                                                <div class="analytics_column">2</div>
                                            </div>

                                            <div class="analytics_row">
                                                <div class="analytics_column bold">I</div>
                                                <div class="analytics_column">&pound;1,186</div>
                                                <div class="analytics_column">3</div>
                                            </div>

                                            <div class="analytics_row">
                                                <div class="analytics_column bold">SE</div>
                                                <div class="analytics_column">&pound;2,337</div>
                                                <div class="analytics_column">1</div>
                                            </div>

                                            <div class="analytics_row">
                                                <div class="analytics_column bold">AE</div>
                                                <div class="analytics_column">&pound;879</div>
                                                <div class="analytics_column">2</div>
                                            </div>

                                            <div class="analytics_row">
                                                <div class="analytics_column bold">MA</div>
                                                <div class="analytics_column">&pound;1,012</div>
                                                <div class="analytics_column">2</div>
                                            </div>

                                            <div class="analytics_row">
                                                <div class="analytics_column bold">Total</div>
                                                <div class="analytics_column bold">&pound;8,496</div>
                                                <div class="analytics_column bold">12</div>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="card">

                                        <div class="sub_heading">
                                            Location
                                        </div>

                                        <div class="analytics_table">

                                            <div class="analytics_row">
                                                <div class="analytics_column"></div>
                                                <div class="analytics_column bold">Margin</div>
                                                <div class="analytics_column bold">Bookings</div>
                                            </div>

                                            <div class="analytics_row">
                                                <div class="analytics_column bold">England</div>
                                                <div class="analytics_column">&pound;1,186</div>
                                                <div class="analytics_column">5</div>
                                            </div>

                                            <div class="analytics_row">
                                                <div class="analytics_column bold">Scotland</div>
                                                <div class="analytics_column">&pound;879</div>
                                                <div class="analytics_column">2</div>
                                            </div>

                                            <div class="analytics_row">
                                                <div class="analytics_column bold">Wales</div>
                                                <div class="analytics_column">&pound;1,786</div>
                                                <div class="analytics_column">6</div>
                                            </div>

                                            <div class="analytics_row">
                                                <div class="analytics_column bold">Ireland</div>
                                                <div class="analytics_column">&pound;2,337</div>
                                                <div class="analytics_column">6</div>
                                            </div>

                                            <div class="analytics_row">
                                                <div class="analytics_column bold">Europe</div>
                                                <div class="analytics_column">&pound;879</div>
                                                <div class="analytics_column">1</div>
                                            </div>

                                            <div class="analytics_row">
                                                <div class="analytics_column bold">Cruises</div>
                                                <div class="analytics_column">&pound;2,337</div>
                                                <div class="analytics_column">4</div>
                                            </div>

                                            <div class="analytics_row">
                                                <div class="analytics_column bold">Total</div>
                                                <div class="analytics_column bold">&pound;8,496</div>
                                                <div class="analytics_column bold">12</div>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="column width_25">

                                <div class="ctas">

                                    <a href="#" class="cta">
                                        Global analytics report
                                    </a>

                                    <a href="#" class="cta">
                                        Sales Figures Analysis
                                    </a>

                                    <a href="#" class="cta">
                                        Yearly Bookings
                                    </a>

                                    <a href="#" class="cta grey">
                                        Set yearly forecast
                                    </a>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="analytics_ctas">

                    <div class="cta">

                        <div class="sub_heading">
                            Tours
                        </div>

                        <ul class="number__average">

                            <li>
                                <div class="label">No. Tours</div>
                                37
                            </li>

                            <li>
                                <div class="label">Avg tour score</div>
                                4.6
                            </li>

                        </ul>

                        <a href="#" class="link">
                            Analytics
                        </a>

                    </div>

                    <div class="cta">

                        <div class="sub_heading">
                            Collaborators
                        </div>

                        <ul class="number__average">

                            <li>
                                <div class="label">No. Collaborators</div>
                                52
                            </li>

                            <li>
                                <div class="label">Avg cps</div>
                                87%
                            </li>

                        </ul>

                        <a href="#" class="link">
                            Analytics
                        </a>

                    </div>

                    <div class="cta">

                        <div class="sub_heading">
                            Hotels
                        </div>

                        <ul class="number__average">

                            <li>
                                <div class="label">No. Hotels</div>
                                127
                            </li>

                            <li>
                                <div class="label">Avg hops</div>
                                86%
                            </li>

                        </ul>

                        <a href="#" class="link">
                            Analytics
                        </a>

                    </div>

                    <div class="cta">

                        <div class="sub_heading">
                            Hotel Groups
                        </div>

                        <ul class="number__average">

                            <li>
                                <div class="label">Tours booked ytd</div>
                                120
                            </li>

                            <li>
                                <div class="label">Tours cancelled</div>
                                10
                            </li>

                        </ul>

                        <a href="#" class="link">
                            Analytics
                        </a>

                    </div>

                    <div class="cta">

                        <div class="sub_heading">
                            Experiences
                        </div>

                        <ul class="number__average">

                            <li>
                                <div class="label">No. Experiences</div>
                                237
                            </li>

                            <li>
                                <div class="label">Avg eps</div>
                                87%
                            </li>

                        </ul>

                        <a href="#" class="link">
                            Analytics
                        </a>

                    </div>

                    <div class="cta">

                        <div class="sub_heading">
                            Cruises
                        </div>

                        <ul class="number__average">

                            <li>
                                <div class="label">No. Cruise Providers</div>
                                7
                            </li>

                            <li>
                                <div class="label">Avg cruise performance</div>
                                80%
                            </li>

                        </ul>

                        <a href="#" class="link">
                            Analytics
                        </a>

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