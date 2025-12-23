@extends('layouts.front')

@section('content')

<div class="notIndexContainer">

    <div class="accountContainer">
        <div class="accountRow">

            <div class="leftCol">
                @include('partials.super_user_left',['open_menu' => 'database', 'sub_marked' => 'hotels']);
            </div>

            <div class="account_main_content">

                <div class="left_column">

                    <div class="performance_analytics_wrapper">

                        <div class="heading">
                            Performance Analytics
                        </div>

                        <div class="performance_analytics">

                            <div class="filters">
                                
                                <div class="filter">

                                    <label>
                                        By date
                                    </label>

                                    <select>
                                        <option value="" selected>2020</option>
                                    </select>

                                </div>

                                <div class="filter">

                                    <label>
                                        By season
                                    </label>

                                    <select>
                                        <option value="" selected>2020 - Summer</option>
                                    </select>

                                </div>

                            </div>

                            <div class="date_range">
                                01/01/2019 to 01/01/2020
                            </div>

                            <div class="grids">

                                <div class="grid_row" id="grid_row_1">

                                    <div class="grid_row__item">
                                        
                                        <div class="label">
                                            Annual revenue to date
                                        </div>

                                        <div class="result">
                                            &pound;365,345
                                        </div>

                                    </div>

                                    <div class="grid_row__item">
                                        
                                        <div class="label">
                                            Average tour value
                                        </div>

                                        <div class="result">
                                            £10,323
                                        </div>

                                    </div>

                                    <div class="grid_row__item">
                                        
                                        <div class="label">
                                            Average loadings
                                        </div>

                                        <div class="result">
                                            24
                                        </div>

                                    </div>

                                    <div class="grid_row__item">
                                        
                                        <div class="label">
                                            Success rate
                                        </div>

                                        <div class="result">
                                            78%
                                        </div>

                                    </div>

                                    <div class="grid_row__item veenus_index_score">
                                        
                                        <div class="label">
                                            Veenus Index Score
                                        </div>

                                        <div class="result large">
                                            97
                                        </div>

                                        <div class="label">
                                            TOP PERFORMER
                                        </div>

                                    </div>

                                </div>

                                <div class="grid_row" id="grid_row_2">

                                    <div class="grid_row__item main">

                                        <div class="section">

                                            <div class="grid_row__item__table_wrapper">

                                                <div class="table_heading">
                                                    By Experience (average)
                                                </div>

                                                <div class="header">

                                                    <div class="column">
                                                        Category
                                                    </div>

                                                    <div class="column">
                                                        loadings
                                                    </div>

                                                    <div class="column">
                                                        Success rate
                                                    </div>

                                                    <div class="column">
                                                        tour value
                                                    </div>

                                                </div>

                                                <div class="grid_row__item__table">

                                                    <div class="grid_row__item__table_row">

                                                        <div class="column">
                                                            Artisans & Experts
                                                        </div>

                                                        <div class="column">
                                                            27
                                                        </div>

                                                        <div class="column">
                                                            78%
                                                        </div>

                                                        <div class="column">
                                                            &pound;6,739
                                                        </div>

                                                    </div>

                                                    <div class="grid_row__item__table_row">

                                                        <div class="column">
                                                            Artisans & Experts
                                                        </div>

                                                        <div class="column">
                                                            27
                                                        </div>

                                                        <div class="column">
                                                            78%
                                                        </div>

                                                        <div class="column">
                                                            &pound;6,739
                                                        </div>

                                                    </div>

                                                    <div class="grid_row__item__table_row">

                                                        <div class="column">
                                                            Artisans & Experts
                                                        </div>

                                                        <div class="column">
                                                            27
                                                        </div>

                                                        <div class="column">
                                                            78%
                                                        </div>

                                                        <div class="column">
                                                            &pound;6,739
                                                        </div>

                                                    </div>

                                                    <div class="grid_row__item__table_row">

                                                        <div class="column">
                                                            Artisans & Experts
                                                        </div>

                                                        <div class="column">
                                                            27
                                                        </div>

                                                        <div class="column">
                                                            78%
                                                        </div>

                                                        <div class="column">
                                                            &pound;6,739
                                                        </div>

                                                    </div>

                                                    <div class="grid_row__item__table_row">

                                                        <div class="column">
                                                            Artisans & Experts
                                                        </div>

                                                        <div class="column">
                                                            27
                                                        </div>

                                                        <div class="column">
                                                            78%
                                                        </div>

                                                        <div class="column">
                                                            &pound;6,739
                                                        </div>

                                                    </div>

                                                    <div class="grid_row__item__table_row">

                                                        <div class="column">
                                                            Artisans & Experts
                                                        </div>

                                                        <div class="column">
                                                            27
                                                        </div>

                                                        <div class="column">
                                                            78%
                                                        </div>

                                                        <div class="column">
                                                            &pound;6,739
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="section">

                                            <div class="grid_row__item__table_wrapper">

                                                <div class="table_heading">
                                                    By Destination (average)
                                                </div>

                                                <div class="header">

                                                    <div class="column">
                                                        Category
                                                    </div>

                                                    <div class="column">
                                                        loadings
                                                    </div>

                                                    <div class="column">
                                                        Success rate
                                                    </div>

                                                    <div class="column">
                                                        tour value
                                                    </div>

                                                </div>

                                                <div class="grid_row__item__table">

                                                    <div class="grid_row__item__table_row">

                                                        <div class="column">
                                                            Artisans & Experts
                                                        </div>

                                                        <div class="column">
                                                            27
                                                        </div>

                                                        <div class="column">
                                                            78%
                                                        </div>

                                                        <div class="column">
                                                            &pound;6,739
                                                        </div>

                                                    </div>

                                                    <div class="grid_row__item__table_row">

                                                        <div class="column">
                                                            Artisans & Experts
                                                        </div>

                                                        <div class="column">
                                                            27
                                                        </div>

                                                        <div class="column">
                                                            78%
                                                        </div>

                                                        <div class="column">
                                                            &pound;6,739
                                                        </div>

                                                    </div>

                                                    <div class="grid_row__item__table_row">

                                                        <div class="column">
                                                            Artisans & Experts
                                                        </div>

                                                        <div class="column">
                                                            27
                                                        </div>

                                                        <div class="column">
                                                            78%
                                                        </div>

                                                        <div class="column">
                                                            &pound;6,739
                                                        </div>

                                                    </div>

                                                    <div class="grid_row__item__table_row">

                                                        <div class="column">
                                                            Artisans & Experts
                                                        </div>

                                                        <div class="column">
                                                            27
                                                        </div>

                                                        <div class="column">
                                                            78%
                                                        </div>

                                                        <div class="column">
                                                            &pound;6,739
                                                        </div>

                                                    </div>

                                                    <div class="grid_row__item__table_row">

                                                        <div class="column">
                                                            Artisans & Experts
                                                        </div>

                                                        <div class="column">
                                                            27
                                                        </div>

                                                        <div class="column">
                                                            78%
                                                        </div>

                                                        <div class="column">
                                                            &pound;6,739
                                                        </div>

                                                    </div>

                                                    <div class="grid_row__item__table_row">

                                                        <div class="column">
                                                            Artisans & Experts
                                                        </div>

                                                        <div class="column">
                                                            27
                                                        </div>

                                                        <div class="column">
                                                            78%
                                                        </div>

                                                        <div class="column">
                                                            &pound;6,739
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="section">

                                            <div class="grid_row__item__table_wrapper">

                                                <div class="table_heading">
                                                    Success based on nr of nights (average)
                                                </div>

                                                <div class="header">

                                                    <div class="column">
                                                        Category
                                                    </div>

                                                    <div class="column">
                                                        loadings
                                                    </div>

                                                    <div class="column">
                                                        Success rate
                                                    </div>

                                                    <div class="column">
                                                        tour value
                                                    </div>

                                                </div>

                                                <div class="grid_row__item__table">

                                                    <div class="grid_row__item__table_row">

                                                        <div class="column">
                                                            Artisans & Experts
                                                        </div>

                                                        <div class="column">
                                                            27
                                                        </div>

                                                        <div class="column">
                                                            78%
                                                        </div>

                                                        <div class="column">
                                                            &pound;6,739
                                                        </div>

                                                    </div>

                                                    <div class="grid_row__item__table_row">

                                                        <div class="column">
                                                            Artisans & Experts
                                                        </div>

                                                        <div class="column">
                                                            27
                                                        </div>

                                                        <div class="column">
                                                            78%
                                                        </div>

                                                        <div class="column">
                                                            &pound;6,739
                                                        </div>

                                                    </div>

                                                    <div class="grid_row__item__table_row">

                                                        <div class="column">
                                                            Artisans & Experts
                                                        </div>

                                                        <div class="column">
                                                            27
                                                        </div>

                                                        <div class="column">
                                                            78%
                                                        </div>

                                                        <div class="column">
                                                            &pound;6,739
                                                        </div>

                                                    </div>

                                                    <div class="grid_row__item__table_row">

                                                        <div class="column">
                                                            Artisans & Experts
                                                        </div>

                                                        <div class="column">
                                                            27
                                                        </div>

                                                        <div class="column">
                                                            78%
                                                        </div>

                                                        <div class="column">
                                                            &pound;6,739
                                                        </div>

                                                    </div>

                                                    <div class="grid_row__item__table_row">

                                                        <div class="column">
                                                            Artisans & Experts
                                                        </div>

                                                        <div class="column">
                                                            27
                                                        </div>

                                                        <div class="column">
                                                            78%
                                                        </div>

                                                        <div class="column">
                                                            &pound;6,739
                                                        </div>

                                                    </div>

                                                    <div class="grid_row__item__table_row">

                                                        <div class="column">
                                                            Artisans & Experts
                                                        </div>

                                                        <div class="column">
                                                            27
                                                        </div>

                                                        <div class="column">
                                                            78%
                                                        </div>

                                                        <div class="column">
                                                            &pound;6,739
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="grid_row__item chart">
                                        
                                        <div class="sub_heading">
                                            Your average loadings chart
                                        </div>

                                        <div class="chart_graphic">
                                            <img src="{{ asset('images/performance_analytics/chart.png') }}" />
                                        </div>

                                        <div class="chart_key">

                                            <div class="key">
                                                <div class="colour" style="background: #FF6961;"></div>
                                                <div class="label">0-14 pax</div>
                                            </div>

                                            <div class="key">
                                                <div class="colour" style="background: #FFB347;"></div>
                                                <div class="label">15-24 pax</div>
                                            </div>

                                            <div class="key">
                                                <div class="colour" style="background: #50BF94;"></div>
                                                <div class="label">25+ pax</div>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="grid_row__item list">
                                        
                                        <div class="sub_heading">
                                            Highest pax tours (3 years)
                                        </div>

                                        <ul class="list">

                                            <li>
                                                <strong>1. Regal Scotland</strong> avg 25 pax
                                            </li>

                                            <li>
                                                <strong>2. Regal Scotland</strong> avg 25 pax
                                            </li>

                                            <li>
                                                <strong>3. Regal Scotland</strong> avg 25 pax
                                            </li>

                                        </ul>

                                    </div>

                                    <div class="grid_row__item list">
                                        
                                        <div class="sub_heading">
                                            Experience success rate (3 years)
                                        </div>

                                        <ul class="list">

                                            <li>
                                                <strong>1. Regal Scotland</strong> avg 25 pax
                                            </li>

                                            <li>
                                                <strong>2. Regal Scotland</strong> avg 25 pax
                                            </li>

                                            <li>
                                                <strong>3. Regal Scotland</strong> avg 25 pax
                                            </li>

                                            <li>
                                                <strong>4. Regal Scotland</strong> avg 25 pax
                                            </li>

                                            <li>
                                                <strong>5. Regal Scotland</strong> avg 25 pax
                                            </li>

                                        </ul>

                                    </div>

                                </div>

                                <div class="grid_row" id="grid_row_3">

                                    <div class="grid_row__item">

                                        <div class="sub_heading">
                                            Collaborator Performance
                                        </div>

                                        <div class="grid_row__item__table_wrapper">

                                            <div class="table_heading">
                                                Top Performers
                                            </div>

                                            <div class="header">

                                                <div class="column column_small">
                                                    Rank
                                                </div>

                                                <div class="column">
                                                    Name
                                                </div>

                                                <div class="column">
                                                    Avg loading
                                                </div>

                                                <div class="column">
                                                    Avg Success rate
                                                </div>

                                                <div class="column">
                                                    % of tours reviewed
                                                </div>

                                                <div class="column">
                                                    Index score
                                                </div>

                                                <div class="column">
                                                    Top selling tour
                                                </div>

                                            </div>

                                            <div class="grid_row__item__table">

                                                <div class="grid_row__item__table_row">

                                                    <div class="column column_small">
                                                        1
                                                    </div>

                                                    <div class="column">
                                                        Barnes Coaches
                                                    </div>

                                                    <div class="column">
                                                        27
                                                    </div>

                                                    <div class="column">
                                                        78%
                                                    </div>

                                                    <div class="column">
                                                        97%
                                                    </div>

                                                    <div class="column">
                                                        97
                                                    </div>

                                                    <div class="column">
                                                        Regal Scotland
                                                    </div>

                                                </div>

                                                <div class="grid_row__item__table_row">

                                                    <div class="column column_small">
                                                        2
                                                    </div>

                                                    <div class="column">
                                                        Barnes Coaches
                                                    </div>

                                                    <div class="column">
                                                        27
                                                    </div>

                                                    <div class="column">
                                                        78%
                                                    </div>

                                                    <div class="column">
                                                        97%
                                                    </div>

                                                    <div class="column">
                                                        97
                                                    </div>

                                                    <div class="column">
                                                        Regal Scotland
                                                    </div>

                                                </div>

                                                <div class="grid_row__item__table_row">

                                                    <div class="column column_small">
                                                        3
                                                    </div>

                                                    <div class="column">
                                                        Barnes Coaches
                                                    </div>

                                                    <div class="column">
                                                        27
                                                    </div>

                                                    <div class="column">
                                                        78%
                                                    </div>

                                                    <div class="column">
                                                        97%
                                                    </div>

                                                    <div class="column">
                                                        97
                                                    </div>

                                                    <div class="column">
                                                        Regal Scotland
                                                    </div>

                                                </div>

                                                <div class="grid_row__item__table_row">

                                                    <div class="column column_small">
                                                        4
                                                    </div>

                                                    <div class="column">
                                                        Barnes Coaches
                                                    </div>

                                                    <div class="column">
                                                        27
                                                    </div>

                                                    <div class="column">
                                                        78%
                                                    </div>

                                                    <div class="column">
                                                        97%
                                                    </div>

                                                    <div class="column">
                                                        97
                                                    </div>

                                                    <div class="column">
                                                        Regal Scotland
                                                    </div>

                                                </div>

                                                <div class="grid_row__item__table_row">

                                                    <div class="column column_small">
                                                        5
                                                    </div>

                                                    <div class="column">
                                                        Barnes Coaches
                                                    </div>

                                                    <div class="column">
                                                        27
                                                    </div>

                                                    <div class="column">
                                                        78%
                                                    </div>

                                                    <div class="column">
                                                        97%
                                                    </div>

                                                    <div class="column">
                                                        97
                                                    </div>

                                                    <div class="column">
                                                        Regal Scotland
                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

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