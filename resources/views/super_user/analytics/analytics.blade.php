@extends('layouts.front')

@section('content')

<div class="notIndexContainer">

    <div class="accountContainer">
        <div class="accountRow">

            <div class="leftCol">
                @hasrole('Collaborator')
                     @include('partials.collaborator_left',['open_menu' => 'analytics', 'sub_marked' => 'analytics']);
                    @else
                    @hasrole('Super Admin')
                     @include('partials.super_user_left',['open_menu' => 'analytics', 'sub_marked' => 'analytics']);
                     @endhasrole @endhasrole
               
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
                                        <span class="green">&pound;{{array_sum($margin_country_week)}}</span> / &pound;{{!empty($target->weekly_target)?$target->weekly_target:''}}
                                    </div>

                                </div>

                                <div class="analytics_table">

                                    <div class="analytics_row">
                                        <div class="analytics_column"></div>
                                        <div class="analytics_column bold">Margin</div>
                                        <div class="analytics_column bold">Bookings</div>
                                    </div>

                                    <div class="analytics_row">
                                        <div class="analytics_column bold">{{$previous_year}}</div>
                                        <div class="analytics_column">&pound;{{!empty($margin_current_year[$previous_year])?$margin_current_year[$previous_year]:'0'}}</div>
                                        <div class="analytics_column">{{!empty($final_booking_year[$previous_year])?$final_booking_year[$previous_year]:'0'}}</div>
                                    </div>

                                    <div class="analytics_row">
                                        <div class="analytics_column bold">{{$year}}</div>
                                        <div class="analytics_column">&pound;{{!empty($margin_current_year[$year])?$margin_current_year[$year]:'0'}}</div>
                                        <div class="analytics_column">{{!empty($final_booking_year[$year])?$final_booking_year[$year]:'0'}}</div>
                                    </div>

                                   <!--  <div class="analytics_row">
                                        <div class="analytics_column bold">Total</div>
                                        <div class="analytics_column bold">&pound;10,496</div>
                                        <div class="analytics_column bold">12</div>
                                    </div> -->

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
                                                    <?php $total_category = 0;?>
                                            @if(!empty($experienceCategory))
                                                @foreach($experienceCategory as $crow)
                                                <div class="analytics_row">
                                                    <div class="analytics_column bold">{{!empty($crow->name)?$crow->name:''}}</div>
                                                    <div class="analytics_column">&pound;{{!empty($margin_category_week[$crow->id])?$margin_category_week[$crow->id]:'0'}}</div>
                                                    <div class="analytics_column">{{!empty($category_bookings[$crow->id])?$category_bookings[$crow->id]:'0'}}</div>
                                                </div>
                                                <?php 
                                                $tot_category = !empty($category_bookings[$crow->id])?$category_bookings[$crow->id]:'0';
                                                $total_category = $total_category + $tot_category; ?>
                                               @endforeach
                                            @endif 
                                            <div class="analytics_row">
                                                <div class="analytics_column bold">Total</div>
                                                <div class="analytics_column bold">&pound;{{array_sum($margin_category_week)}}</div>
                                                <div class="analytics_column bold">{{$total_category}}</div>
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
                                             <?php $total_country = 0;?>
                                            @if(!empty($countries))
                                                @foreach($countries as $crow)
                                                <div class="analytics_row">
                                                    <div class="analytics_column bold">{{!empty($crow->name)?$crow->name:''}}</div>
                                                    <div class="analytics_column">{{!empty($margin_country_week[$crow->id])?'£'.$margin_country_week[$crow->id]:'0'}}</div>
                                                    <div class="analytics_column">{{!empty($countery_final_booking[$crow->id])?$countery_final_booking[$crow->id]:'0'}}</div>
                                                </div>
                                                <?php 
                                                $tot_category = !empty($countery_final_booking[$crow->id])?$countery_final_booking[$crow->id]:'0';
                                                $total_country = $total_country + $tot_category; ?>
                                               @endforeach
                                            @endif 
                                           

                                            <div class="analytics_row">
                                                <div class="analytics_column bold">Total</div>
                                                <div class="analytics_column bold">&pound;{{array_sum($margin_country_week)}}</div>
                                                <div class="analytics_column bold">{{$total_country}}</div>
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
                                        <span class="red">&pound;120,234</span> / &pound;{{!empty($target->global_target)?$target->global_target:''}}
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
                                                    <?php $total_category_year = 0;?>
                                            @if(!empty($experienceCategory))
                                                @foreach($experienceCategory as $crow)
                                                <div class="analytics_row">
                                                    <div class="analytics_column bold">{{!empty($crow->name)?$crow->name:''}}</div>
                                                    <div class="analytics_column">&pound;{{!empty($margin_category_year[$crow->id])?$margin_category_year[$crow->id]:'0'}}</div>
                                                    <div class="analytics_column">{{!empty($category_bookings_year[$crow->id])?$category_bookings_year[$crow->id]:'0'}}</div>
                                                </div>
                                                <?php 
                                                $tot_category_year = !empty($category_bookings_year[$crow->id])?$category_bookings_year[$crow->id]:'0';
                                                $total_category_year = $total_category_year + $tot_category_year; ?>
                                               @endforeach
                                            @endif 
                                            <div class="analytics_row">
                                                <div class="analytics_column bold">Total</div>
                                                <div class="analytics_column bold">&pound;{{array_sum($margin_category_year)}}</div>
                                                <div class="analytics_column bold">{{$total_category_year}}</div>
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
                                             <?php $total_country_year = 0;?>
                                            @if(!empty($countries))
                                                @foreach($countries as $crow)
                                                <div class="analytics_row">
                                                    <div class="analytics_column bold">{{!empty($crow->name)?$crow->name:''}}</div>
                                                    <div class="analytics_column">&pound;{{!empty($margin_country_year[$crow->id])?$margin_country_year[$crow->id]:'0'}}</div>
                                                    <div class="analytics_column">{{!empty($countery_final_booking_year[$crow->id])?$countery_final_booking_year[$crow->id]:'0'}}</div>
                                                </div>
                                                <?php 
                                                $tot_category = !empty($countery_final_booking_year[$crow->id])?$countery_final_booking_year[$crow->id]:'0';
                                                $total_country_year = $total_country_year + $tot_category; ?>
                                               @endforeach
                                            @endif 
                                            
                                            <div class="analytics_row">
                                                <div class="analytics_column bold">Total</div>
                                                <div class="analytics_column bold">&pound;{{array_sum($margin_country_year)}}</div>
                                                <div class="analytics_column bold">{{$total_country_year}}</div>
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