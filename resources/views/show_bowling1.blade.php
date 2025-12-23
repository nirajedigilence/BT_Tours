@extends('layouts.front')

@section('content')
    <!-- PLUS SWIPER -->
    <link rel="stylesheet" type="text/css" href="{{ asset('js/swiper/swiper.min.css') }}">
    <script src="{{ asset('js/swiper/swiper.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script src="https://superal.github.io/canvas2image/canvas2image.js"></script>    
    <!-- ----------- -->

    <!-- Sweet Alert -->
    {{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}
    <!-- ----------- -->

    <!-- Sticky-kit -->
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('js/jquery.sticky-kit.min.js') }}"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css">
<script src="https://cdn.jsdelivr.net/npm/moment/min/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <!-- ----------- -->
    <style type="text/css">
        .error {
          border: 2px solid red;
        }

        .est_div {
            background-color: #50AADB;
            padding: 20px;
            border-radius: 5px;
        }
        .form-div {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            /*margin: 50px auto;
            max-width: 800px;*/
        }
        .form-container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            margin: 5px auto;
            width: 96%;
        }
        .div-container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
        }
        .form-title {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .section-title {
            font-weight: bold;
            margin-top: 20px;
            margin-bottom: 10px;
            color: #32363A;
        }
        .btn-group > .btn:not(:last-child):not(.dropdown-toggle), .btn-group > .btn-group:not(:last-child) > .btn {
            border-radius: 5px;
            margin-left: 5px;
            color: #32363A;
            border-color : #6c757d;
        }
        .btn-group > .btn:hover, .btn-group-vertical > .btn:hover {
                z-index: 1;
                background-color: #50AADB;
                color: #ffffff !important;
                border-color: #50AADB !important;
            }
        .singlePropertyContainer .tabsContant .container .reviews .review_wrapper .driver_reviews .review .header .intro .rating .far{
            font-size: 50px;
            line-height: 50px;
            color: #FCA311;
            margin: 0 6px;
        }
        #image-viewer {
            display: none;
            position: fixed;
            z-index: 2000;
            padding-top: 100px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.9);
        }
        #image-viewer .modal-content {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
        }
        #image-viewer .modal-content { 
            animation-name: zoom;
            animation-duration: 0.6s;
        }
        @keyframes zoom {
            from {transform:scale(0)} 
            to {transform:scale(1)}
        }
        #image-viewer .close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
        }
        #image-viewer .close:hover,
        #image-viewer .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }

        @media only screen and (max-width: 700px){
            #image-viewer .modal-content {
                width: 100%;
            }
        }
    .singlePropertyContainer .tabsContant .container .hotels .hotel .hotelsSwiper .swiper-container .swiper-pagination--buttons {
        position: absolute;
        bottom: 5px;
        background: #FFF;
        border-radius: 17px;
        z-index: 1;
    }
    .singlePropertyContainer .tabsContant .container .hotels .hotel .hotelsSwiper .swiper-container .swiper-pagination--buttons .swiper-button-next {
        right: 6px;
    }
    .singlePropertyContainer .tabsContant .container .hotels .hotel .hotelsSwiper .swiper-container .swiper-pagination--buttons .swiper-button-prev,
    .singlePropertyContainer .tabsContant .container .hotels .hotel .hotelsSwiper .swiper-container .swiper-pagination--buttons .swiper-button-next {
        top: 50%;
        bottom: auto;
        transform: translateY(-50%);
        width: 30px;
        height: 30px;
        margin-top: 0;
    }
    .singlePropertyContainer .tabsContant .container .hotels .hotel .hotelsSwiper .swiper-container .swiper-pagination {
        z-index: 2;
        background-color: white;
        padding: 5px 23px;
        left: 0;
        right: 0;
        margin-left: auto;
        margin-right: auto;
        width: 60%;
        border-radius: 15px;
    }
    .singlePropertyContainer .tabsContant .container .hotels .hotel .hotelsSwiper .swiper-container .swiper-pagination--buttons .swiper-pagination {
        display: flex;
        position: static;
        background: none;
        padding: 8px 50px 9px 50px;
        width: auto;
        border-radius: 0;
    }
    .singlePropertyContainer .tabsContant .container .hotels .hotel .hotelsSwiper .swiper-container .swiper-button-prev::after, .singlePropertyContainer .tabsContant .container .hotels .hotel .hotelsSwiper .swiper-container .swiper-button-next::after {
        font-size: 12px;
        color: #fff;
        font-weight: 600;
    }
    .singlePropertyContainer .tabsContant .container .hotels .hotel .hotelsSwiper .swiper-container .swiper-pagination--buttons .swiper-button-prev {
        left: 6px;
    }
    .singlePropertyContainer .tabsContant .container .hotels .hotel .hotelsSwiper .swiper-container .swiper-button-next, .singlePropertyContainer .tabsContant .container .hotels .hotel .hotelsSwiper .swiper-container .swiper-button-prev {
        align-items: center;
        justify-content: center;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background: #FCA311;
    }
    .singlePropertyContainer .tabsContant .container .hotels .hotel .hotelsSwiper .swiper-container .swiper-pagination .swiper-pagination-bullet.swiper-pagination-bullet-active {
        opacity: 1;
        text-decoration: underline;
    }
    .singlePropertyContainer .tabsContant .container .hotels .hotel .hotelsSwiper .swiper-container .swiper-pagination .swiper-pagination-bullet {
        width: 10px;
        height: 10px;
        display: inline-block;
        border-radius: unset;
        background: unset;
        opacity: .7;
    }
    .singlePropertyContainer .tabsContant .container .hotels .hotel .hotelsSwiper .swiper-container .swiper-pagination--buttons .swiper-pagination .swiper-pagination-bullet {
        display: block;
        width: auto;
        height: auto;
        font-size: 1.25rem;
        font-weight: 600;
        line-height: 1.25;
        color: #14213D;
        margin: 0 4px;
        opacity: 1 !important;
    }
    .singlePropertyContainer .tabsContant .container .hotels .hotel .hotelsSwiper .swiper-container {
        display: flex;
        justify-content: center;
        height: 600px !important;
    }
    .singlePropertyContainer .tabsContant .container .hotels .hotel .hotelsSwiper .swiper-container .swiper-slide a img {
        width: 100%;
        height: 100%;
        object-fit: fill !important;
    }
    /*bowlind css*/
    .singlePropertyContainer .blueContentHolder {
                background-color: #1C92D0 !important;
                padding-top: 30px;
                padding-bottom: 40px;
            }
    .singlePropertyContainer .blueContentHolder .container .infoPriceWrapper .left .miniBox {
        width: 33.3334%;
        border-bottom: 1px solid #50AADB;
        border-right: 1px solid #50AADB;
        padding-bottom: 20px;
    }     
    .singlePropertyContainer .blueContentHolder .container .infoPriceWrapper .left .miniBox .title {
            position: relative;
            display: block;
            padding-left: 25px;
            font-size: 1.5rem;
            letter-spacing: 0px;
            color: #FFFFFF;
            font-weight: 600;
            border-bottom: 1px solid #50AADB;
        }   
        .singlePropertyContainer .orangeTabsContainer {
            position: relative;
            background: #6AC0EC;
            box-shadow: 0px 3px 6px #000 29;
            margin-bottom: 70px;
        }

        .singlePropertyContainer .blueContentHolder .container .infoPriceWrapper .left .miniBox .title {
            position: relative;
            display: block;
            padding-left: 25px;
            font-size: 1.5rem;
            letter-spacing: 0px;
            color: #FFFFFF;
            font-weight: 600;
            border-bottom: 1px solid #50AADB;
           
        }
        .singlePropertyContainer .blueContentHolder .container .infoPriceWrapper .right .priceBox .title {
            display: block;
            padding-left: 25px;
            font-size: 1.5rem;
            letter-spacing: 0px;
            color: #FFFFFF;
            font-weight: 600;
            border-bottom: 1px solid #50AADB;
        }
        .singlePropertyContainer .blueContentHolder .container .infoPriceWrapper .left .miniBox .title {
            position: relative;
            display: block;
            padding-left: 3px;
            font-size: 1.5rem;
            letter-spacing: 0px;
            color: #FFFFFF;
            font-weight: 600;
            border-bottom: 1px solid #50AADB;
        }
        .singlePropertyContainer .blueContentHolder .container .infoPriceWrapper .left .miniBox .title:after {
            content: '';
            display: block;
            height: 100%;
            width: 1px;
            right: -1px;
            top: 0px;
            background-color: #1C92D0 !important;
            position: absolute;
        }
        .singlePropertyContainer .breadcrumbsHoleder .container .breadRow .right .socials {
            margin-left: 16px;
            font-size: 2rem;
            color: #1C92D0;
        }
        .singlePropertyContainer .blueContentHolder .container .infoPriceWrapper .right .priceBox form .select2-container .select2-selection__arrow {
            height: 40px;
            position: absolute;
            top: 0px;
            right: 0px;
            width: 40px;
            background-color: #FFD334;
        }
        .singlePropertyContainer .blueContentHolder .container .infoPriceWrapper .left .miniBox .activityRow .rightA .activeBoxRow .filled {
            background-color: #FFD334;
        }
        .singlePropertyContainer .blueContentHolder .container .infoPriceWrapper .left .miniBox .activityRow .rightA .activeBoxRow .iconHolder i {
            font-size: 1.25rem;
            color: #FFD334;
            cursor: pointer;
            transition: transform .3s ease-in-out, color .3s ease-in-out;
            -moz-transition: transform .3s ease-in-out, color .3s ease-in-out;
            -webkit-transition: transform .3s ease-in-out, color .3s ease-in-out;
        }
    </style>
    <?php  $image_url = getenv('IMAGE_URL');

    ?>
    
    <div class="notIndexContainer">

        <div class="singlePropertyContainer">

            <div class="firstSwiper">
                <div class="home-swiper-container">
                    <div class="swiper-wrapper">
                        @foreach ($row->experienceImages as $image)
                        <div class="swiper-slide">
                            <img src="{{ $image_url.'storage/'.$image->file }}" alt="@if ($image->name) {{ $image->name }} @else {{ $row->name }} @endif">
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="headeingBlock">
                    <div class="container">
                        <h1>{{ $row->name }}</h1>
                    </div>
                </div>
            </div>

            <div class="breadcrumbsHoleder">
                <div class="container">
                    <div class="breadRow">
                        <div class="left">
                            <a href="{{ route('search.main') }}?view=grid">Tours</a>
                            <span class="separator"><i class="fas fa-chevron-right"></i></span>
                            <?php
                             if(isset($row->experienceCategories) && !empty($row->experienceCategories[0])){
                                ?>
                                <a href="{{ route('search.main') }}?view=grid&experience_categories_id[]={{!empty($row->experienceCategories[0]->id)?$row->experienceCategories[0]->id:''}}"><?php echo !empty($row->experienceCategories[0]->name)?$row->experienceCategories[0]->name:''; ?></a>
                                <span class="separator"><i class="fas fa-chevron-right"></i></span>
                                <?php
                            }
                            if(isset($row->countryAreas) && !empty($row->countryAreas[0])){
                                $country = 


DB::connection('mysql')->table('countries')->where('id', $row->countryAreas[0]->countries_id)->first();
                                ?>
                                <a href="{{ route('search.main') }}?view=grid&experience_categories_id[]={{!empty($row->experienceCategories[0]->id)?$row->experienceCategories[0]->id:''}}&country_areas_id[]={{!empty($row->countryAreas[0]->id)?$row->countryAreas[0]->id:''}}"><?php echo $country->name; ?></a>
                                <span class="separator"><i class="fas fa-chevron-right"></i></span>
                                <a href="{{ route('search.main') }}?view=grid&experience_categories_id[]={{!empty($row->experienceCategories[0]->id)?$row->experienceCategories[0]->id:''}}&country_areas_id[]={{!empty($row->countryAreas[0]->id)?$row->countryAreas[0]->id:''}}"><?php echo $row->countryAreas[0]->name; ?></a>
                                <span class="separator"><i class="fas fa-chevron-right"></i></span>
                                <?php
                            }
                            ?>
                            <a href=""><?php echo $row->name; ?></a>
                        </div>
                        <div class="right">
                            <span class="shareText">Share with:</span>
                            <a class="socials" href="https://www.facebook.com/BowlingTours"><i class="fab fa-facebook-square"></i></a>
                            <!-- <a class="socials" href="https://twitter.com/"><i class="fa-brands fa-square-x-twitter"></i></a> -->
                            <a class="socials" href="https://www.instagram.com/bowlingtours/" ><i class="fab fa-instagram-square"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="blueContentHolder">
                <div class="container">
                    <div class="infoPriceWrapper">
                        <div class="left">
                            @if($row->exp_type == 3)
                            <div class="miniBox fixture-mini">
                                <div class="title">Fixtures</div>
                                 <?php 
                                if(isset($row->fixtures)){
                                    $fixtures = !empty($row->fixtures)?unserialize($row->fixtures):'';
                                if(!empty($fixtures)){    ?>
                                 <ul style="padding-left:0px">
                                    @foreach ($fixtures as $keyEIC => $valueEI)
                                        <li style="padding-left:0px">
                                            {{ $valueEI }} 
                                        </li>
                                    @endforeach
                                </ul>
                                <?php } }  ?>
                               
                            </div>
                            @else
                            <div class="miniBox exp-mini">
                                <div class="title">Experiences & Attractions</div>
                                <ul>
                                   {{--  @foreach($row->ExperienceAttractions as $ea)
                                    <li @if ( $ea->vip == 1 ) class="vip" @endif>
                                    {!! $ea->icon !!} {{ $ea->name }}
                                    </li>
                                    @endforeach --}}
                                    <?php foreach ($row->getExperiencesToInclusionsShipNew as $keyEI => $valueEI) {  
                                        if(isset($valueEI->getIconList)){?>
                                        <li>
                                           {!! $valueEI->getIconList->icon !!} {{ $valueEI->inclusions_text }}
                                        </li>
                                    <?php } } ?>

                                    
                                    {{-- <li class="vip">
                                        <i class="far fa-check-circle"></i> Bowhill House and Grounds
                                    </li>

                                    <li>
                                        <i class="far fa-check-circle"></i> The Royal Yacht Britannia
                                    </li>

                                    <li>
                                        <i class="far fa-check-circle"></i> 1881 Distillery & Gin School
                                    </li>

                                    <li>
                                        <i class="far fa-check-circle"></i> Dawyck Botanical Garden
                                    </li> --}}
                                </ul>
                            </div>
                            @endif

                            
                            {{-- @if ($row->ExperienceHotels->count() > 0 && $row->ExperienceHotels[0]->hotelAmenities->count() > 0) --}}
                            @if ($row->getExperiencesToInclusionsBlueBar->count() > 0)
                            <div class="miniBox hotel-mini">
                                <div class="title">Hotel Details</div>
                                <ul>
                                    

                                    <?php foreach ($row->getExperiencesToInclusionsBlueBar as $keyEI => $valueEI) {
                                        if(isset($valueEI->getIconList) && !empty($valueEI->getInclusion->name)){
                                     ?>
                                    <li style="padding-left: 45px;">
                                        {!! $valueEI->getIconList->icon !!} {{ !empty($valueEI->getInclusion->name)?$valueEI->getInclusion->name:'' }}
                                    </li>
                                    <?php } } ?>
                                    {{-- <li>
                                        <i class="far fa-check-circle"></i> Dinner, bed & breakfast
                                    </li>

                                    <li>
                                        <i class="far fa-check-circle"></i> Table service
                                    </li>

                                    <li>
                                        <i class="far fa-check-circle"></i> Lift access to all floors
                                    </li>

                                    <li>
                                        <i class="far fa-check-circle"></i> Coach parking on site
                                    </li> --}}


                                    {{-- @foreach($row->ExperienceHotels[0]->hotelAmenities as $ha)
                                    <li>
                                        {!! $ha->icon !!} {{ $ha->name }}
                                    </li>
                                    @endforeach --}}
                                    {{-- @foreach($row->ExperienceHotels as $ha)
                                        @foreach($ha->hotelAmenities as $has)
                                            <li>
                                                {!! $has->icon !!} {{ $has->name }}
                                            </li>
                                        @endforeach
                                    @endforeach --}}
                                </ul>
                            </div>
                            @endif
                            <div class="miniBox review-mini">
                                <div class="title">Reviews & Activity Level</div>
                                <div class="activityRow">
                                    <div class="leftA">
                                        <i class="fas fa-walking"></i>
                                    </div>
                                    <div class="rightA">
                                        <div class="textS">
                                            Activity Level
                                        </div>
                                        <div class="activeBoxRow">
                                            <div class="activeBox <?php echo ($row->mobility >= 1) ? 'filled' : ''; ?>"></div>
                                            <div class="activeBox <?php echo ($row->mobility >= 2) ? 'filled' : ''; ?>"></div>
                                            <div class="activeBox <?php echo ($row->mobility >= 3) ? 'filled' : ''; ?>"></div>
                                            <div class="activeBox <?php echo ($row->mobility >= 4) ? 'filled' : ''; ?>"></div>
                                            <div class="activeBox <?php echo ($row->mobility >= 5) ? 'filled' : ''; ?>"></div>
                                            <span class="iconHolder">
                                                <i class="fas fa-info-circle"></i>
                                                <div class="caption">
                                                    <strong>Level 1</strong> – Minimal walking & very few steps</br>
                                                    <strong>Level 2</strong> – Moderate walking & few steps</br>
                                                    <strong>Level 3</strong> – Lots of steps and active walking, cobbled stones</br>
                                                    <strong>Level 4</strong> – Active walking, lots of steps, narrow staircases and/or difficult terrains</br>
                                                    <strong>Level 5</strong> – Long and intensive walking conditions (e.g. rambling)
                                                </div>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="startsHolder">
                                    <div class="textS">Tour average score is</div>
                                    <?php 
                                    $stars = array();
                                    if(!empty($reviews)){
                                        foreach($reviews as $k => $v){
                                            if(!empty($v['reviews'])){
                                                foreach ($v['reviews'] as $key => $value) {
                                                    if($value['display'] == 1){
                                                        $submitted_review = unserialize($value['submitted_review']);
                                                        if(!isset($submitted_review['stars'])){
                                                            $submitted_review['stars'] = 0;
                                                        }
                                                        $stars[] = $submitted_review['stars'];
                                                    }
                                                }
                                            }
                                        }
                                    }
                                    $stars_count = 0;
                                    if(!empty($stars)){
                                        $stars_sum = array_sum($stars);
                                        $stars_count = count($stars);
                                        //$rating = round($stars_sum/$stars_count);
                                        $rating = 5;
                                        echo '<div class="starsRow">';
                                        for ($i=1; $i <= 5; $i++) { 
                                            if($i <= $rating){
                                                echo '<i class="fas fa-star"></i>';
                                            }else{
                                                echo '<i class="far fa-star"></i>';
                                            }
                                        }
                                        echo '</div><div class="textS">from '.$stars_count.' Reviews</div>';
                                    }else{
                                        echo '<p style="padding:20px;color:#ffffff;">No reviews found</p>';
                                    }
                                    ?>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="right">
                            <?php
                            $is_bt_user = isset($_GET['bt_tour'])?1:0;
                            $date_available = '';
                            ?>
                            @if(empty($is_bt_user))
                            <div class="priceBox">
                                <?php 
                                $e_dates = array();
                               /* if(!empty($row->experienceDatesActive)){
                                    foreach ($row->experienceDatesActive as $key => $value) {
                                        if(!empty($value->dates_rates_id)){
                                            $e_dates[$value->dates_rates_id]['mark_as_completed'][] = $value->mark_as_completed;
                                            $e_dates[$value->dates_rates_id]['unbooked'][] = $value->unbooked;
                                            $e_dates[$value->dates_rates_id]['is_date_hold'][] = $value->is_date_hold;
                                            $e_dates[$value->dates_rates_id]['date_from'][] = strtotime($value->date_from);
                                            $e_dates[$value->dates_rates_id]['date_to'][] = strtotime($value->date_to);
                                        }
                                    } 
                                }*/
                                
                                $dates_rates = array();
                                ?>
                                <div class="title">Prices</div>
                                <form id="addToCartForm1">
                                    <input type="hidden" name="exp_id" value="{{$row->id}}">
                                   
                                    <!-- <select name="collaborator_id" class="collsSelect">
                                        <option value="">Select Collaborator</option>
                                        <?php
                                        /*if(!empty($collaborators)){
                                            foreach ($collaborators as $key => $value) {
                                                echo '<option value="'.$value->id.'">'.$value->name.'</option>';
                                            }
                                        } */
                                        ?>
                                    </select> -->
                                 <select name="experience_dates_id" class="dateSelect" id="dateSelect">
                                        <option value=""></option>
                                        <?php if(!empty($exp_dates)){
                                            foreach($exp_dates as $date_row)
                                            {
                                                ?>
                                                    <option data-night="{{ $date_row['nights'] }}" value="{{ $date_row['dates_rates_id'] }}">{{ date('D d M y', $date_row['date_from']) }} - {{ date('D d M y',$date_row['date_to']) }} ({{ $date_row['nights']}} nights)</option>
                                                <?php
                                            }
                                        } ?>
                                         
                                        
                                    </select>
                                   <!--  <select name="experience_dates_id" class="dateSelect" id="dateSelect">
                                        <option value=""></option>
                                        <?php
                                        $date_available = '';
                                      
                                        ?>
                                        
                                    </select>
                                   <div id="market_option_select"style="display: none;">
                                       <select onchange="get_price();" style="padding:5px;width:100%;" class="form-control select_market_option collsSelect" name="market_option" id="select_market_option" fdprocessedid="gzl0w"><option value="1">£</option><option value="2">€</option></select>
                                   </div> -->

                                    <?php
                                    //$lenghtnights[] = $row->nights;
                                    $lenghtnights[] = $row->nights;
                                    
                                    if(!empty($dates_rates)){
                                        $rates = array_filter(array_column($dates_rates, 'rate'),'is_numeric');
                                        $srs = array_filter(array_column($dates_rates, 'single_srs'),'is_numeric');
                                        
                                        // $lenghtnights = array_filter(array_column($dates_rates, 'nights'));
                                        $currency_symbol = '£';
                                    }else{
                                        $rates[] = $row->rate;
                                        $srs[] = $row->single_srs;
                                        $currency_symbol = '£';
                                        // $lenghtnights[] = $row->nights;
                                    }
                                    //prd($dates_rates);
                                     /*if(!empty($dates_rates[0])){
                                            if($dates_rates[0]->currency == 1)
                                            {
                                                $rates = array_filter(array_column($dates_rates, 'rate'),'is_numeric');
                                                $srs = array_filter(array_column($dates_rates, 'srs'),'is_numeric');
                                                $currency_symbol = '£';
                                            }
                                            elseif($dates_rates[0]->currency == 2)
                                            {
                                                $rates = array_filter(array_column($dates_rates, 'rate_euro'),'is_numeric');
                                                $srs = array_filter(array_column($dates_rates, 'srs_euro'),'is_numeric');
                                                 $currency_symbol = '€';
                                            }
                                            else
                                            {
                                                $rates = array_filter(array_column($dates_rates, 'rate'),'is_numeric');
                                                $srs = array_filter(array_column($dates_rates, 'srs'),'is_numeric');
                                                $currency_symbol = '£';
                                            }
                                            
                                        }else{
                                             $rates[] = $row->rate;
                                                $srs[] = $row->srs;
                                                $currency_symbol = '£';
                                           
                                        }*/
                                    ?>
                                    <div class="darkBlueHolder">
                                       <div class="prices" style="margin-bottom:15px;">
                                            <?php //if(!empty($row->experienceDatesActive[0]) || !empty($row->price)){ ?>
                                                <div class="priceL" style="font-size:3rem;"><small>From</small> <span id="priceL" style="letter-spacing: 3px"> {{$currency_symbol}}{{$row->rate }}<!-- {{ min($rates) }} --></span><small>pp</small></div>
                                                <div class="priceS"> <span id="priceS" style="letter-spacing: 3px">{{$currency_symbol}}{{$row->srs }}</span><small>ss pp</small></div>
                                                <div id="lenghtnight" style="color: #fff;font-size: 18px;font-weight: 500;"><!-- {{ (!empty($lenghtnights[0]) ? min($lenghtnights) : 0) }} nights --></div>
                                            <?php  /*}else{
                                                echo '<h3 style="color: #fff;width: 200px;margin: 25px;font-weight: 600;">Dates available on request</h3>';
                                            }*/ ?>
                                        </div>
                                        <div class="actionsRow">
                                            <?php 
                                            if($date_available == 'yes'){

                                            }
                                            ?>
                                            <?php if(check_allow_booking()){ ?>
                                            <button id="enquiry_link" type="button" ><!-- <i class="fas fa-cart-arrow-down"></i> --> Enquire</button>
                                            
                                            <!-- <a class="add2favorites" href="" style="background:lightgrey;pointer-events: none;"><i class="fas fa-heart"></i></a> -->
                                            <?php }  ?>
                                        </div>
                                    </div>
                                </form>
                             

                            </div>
                             @else
                             <style type="text/css">
                                 .singlePropertyContainer .blueContentHolder .container .infoPriceWrapper .right .priceBox form .darkBlueHolder .actionsRow {
                                    display: flex
                                ;
                                    flex-direction: row;
                                    justify-content: space-around;
                                    position: absolute;
                                    bottom: -27px !important;
                                    width: 66% !important;
                                    padding-left: 0px;
                                    padding-right: 5px;
                                }
                             </style>
                            <div class="priceBox">
                               
                                <div class="title">Dates & Rates</div>
                                <form id="addToCartForm1">
                                    
                                   <input type="hidden" name="exp_id" value="{{$row->id}}">
                                   <input type="hidden" name="created_by" value="{{isset($_GET['bt_tour'])?$_GET['bt_tour']:''}}">
                                   <input type="hidden" name="club_name" id="club_name" value="{{!empty($collaborators[0]['name'])?$collaborators[0]['name']:''}}">
                                    <select name="collaborator_id" id="s_collaborator_id" class="collsSelect">
                                        <option value="">Select Travel Partner</option>
                                        <?php
                                        if(!empty($collaborators)){   
                                            foreach ($collaborators as $key => $value1) {
                                             
                                                echo '<option data-name="'.$value1['name'].'" value="'.$value1['id'].'">'.$value1['name'].'</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                    
                                    <select name="experience_dates_id" class="dateSelect" id="dateSelect">
                                        <option value=""></option>
                                        <?php if(!empty($exp_dates)){
                                            foreach($exp_dates as $date_row)
                                            {
                                                $hotel_array = array();

                                                if(!empty($date_row['hotels'][0]))
                                                {
                                                    foreach($date_row['hotels'][0]  as $hrow)
                                                    {
                                                        $hotel_array[] =$hrow['name']; 
                                                    }
                                                    
                                                }
                                                ?>
                                                    <option data-night="{{ $date_row['nights'] }}" value="{{ $date_row['dates_rates_id'] }}">{{ date('D d M y', $date_row['date_from']) }} - {{ date('D d M y',$date_row['date_to']) }} ({{ $date_row['nights']}} nights)<?php echo " - ";echo implode(', ', $hotel_array); ?></option>
                                                <?php
                                            }
                                        } ?>
                                         
                                        
                                    </select>

                                   <div id="market_option_select"style="display: none;">
                                       <select onchange="get_price();" style="padding:5px;width:100%;" class="form-control select_market_option collsSelect" name="market_option" id="select_market_option" fdprocessedid="gzl0w"><option value="1">£</option><option value="2">€</option></select>
                                   </div>
                                    <?php
                                    //$lenghtnights[] = $row->nights;
                                    $lenghtnights[] = $row->nights;
                                    
                                    if(!empty($dates_rates)){
                                        $rates = array_filter(array_column($dates_rates, 'rate'),'is_numeric');
                                        $srs = array_filter(array_column($dates_rates, 'single_srs'),'is_numeric');
                                        
                                        // $lenghtnights = array_filter(array_column($dates_rates, 'nights'));
                                        $currency_symbol = '£';
                                    }else{
                                        $rates[] = $row->rate;
                                        $srs[] = $row->single_srs;
                                        $currency_symbol = '£';
                                        // $lenghtnights[] = $row->nights;
                                    }
                                   
                                    ?>
                                    <div class="darkBlueHolder">
                                        <div class="prices" style="margin-bottom:15px;">
                                            <?php //if(!empty($row->experienceDatesActive[0]) || !empty($row->price)){ ?>
                                                <div class="priceL" style="font-size:4rem;"> <span id="priceL" style="letter-spacing: 3px">{{$currency_symbol}}{{$row->rate }}<!-- {{ min($rates) }} --></span><small>pp</small></div>
                                                <div class="priceS"> <span id="priceS" style="letter-spacing: 3px">{{$currency_symbol}}{{$row->srs }}</span><small>ss pp</small></div>
                                                <div id="lenghtnight" style="color: #fff;font-size: 18px;font-weight: 500;"><!-- {{ (!empty($lenghtnights[0]) ? min($lenghtnights) : 0) }} nights --></div>
                                            <?php  /*}else{
                                                echo '<h3 style="color: #fff;width: 200px;margin: 25px;font-weight: 600;">Dates available on request</h3>';
                                            }*/ ?>
                                        </div>
                                        <div class="actionsRow">
                                            <?php 
                                            if($date_available == 'yes'){

                                            }
                                            ?>
                                           
                                            <button id="addToCart" >Add to Cart</button>
                                           <!--  
                                            <a class="add2favorites" href="" style="background:lightgrey;pointer-events: none;"><i class="fas fa-heart"></i></a> -->
                                           
                                        </div>
                                    </div>
                                </form>
                                <script>

                                    $("#dateSelect").change(function(){
                                       //get_price();
                                    });
                                    function get_price(){
                                        
                                         var dates_id = $("#dateSelect").val();
                                          var night_day = $('option:selected', '#dateSelect').attr('data-night');
                                         var select_market_option = $("#select_market_option").val();
                                        laravel.ajax.send({
                                            url: "{{ route('experience.get.price') }}",
                                            type: 'post', //optional,
                                            data:{
                                                "id": @if (optional($row)->id) {{ $row->id }} @else 0 @endif,
                                                "dates_id": dates_id
                                            },
                                            success: function(payload){ //optional - default is laravel.ajax.successHandler
                                                //console.log(payload);
                                                if(payload.currency == 3)
                                                {
                                                   /* var html ='';
                                                    var html = ' <select  onchange="get_price();" style="padding:5px;width:100%;" class="form-control select_market_option"  name="market_option" id="select_market_option">';
                                                    html += '<option value="1">UK</option>';
                                                    html += '<option value="2">EU</option>';
                                                    html += '</select>';
                                                    $('#market_option_select').html(html);*/
                                                    $('#market_option_select').show();
                                                }
                                                else
                                                {
                                                    $("#select_market_option").val('1');
                                                    $('#market_option_select').hide();
                                                }
                                                if(select_market_option == 2)
                                                {
                                                    $("#priceL").html('€'+payload.price_euro);
                                                    $("#priceS").html('€'+payload.price_ss_euro);
                                                }
                                                else
                                                {
                                                    $("#priceL").html(payload.currency_symbol+payload.priceL);
                                                    $("#priceS").html(payload.currency_symbol+payload.priceS);
                                                }
                                                
                                                var night_str = 'nights';
                                                /*if(night_day ==  1)
                                                {
                                                    night_str = 'night';
                                                }*/
                                                $("#lenghtnight").html(night_day+' '+night_str);

                                            },
                                            error: function(event){ //optional - default is laravel.ajax.errorHandler
                                                //console.log(event);
                                                laravel.ajax.errorHandler.call(this,event); //calling super handler
                                            }
                                        });
                                    }
                                    $(document).ready(function () {
                                        var dates_id = $("#dateSelect").val();
                                        var night_day = $('option:selected', '#dateSelect').attr('data-night');
                                        if(dates_id != ''){
                                            laravel.ajax.send({
                                                url: "{{ route('experience.get.price') }}",
                                                type: 'post', //optional,
                                                data:{
                                                    "id": @if (optional($row)->id) {{ $row->id }} @else 0 @endif,
                                                    "dates_id": dates_id
                                                },
                                                success: function(payload){ //optional - default is laravel.ajax.successHandler
                                                //console.log(payload);
                                                if(payload.currency == 3)
                                                {
                                                   /* var html ='';
                                                    var html = ' <select  onchange="get_price();" style="padding:5px;width:100%;" class="form-control select_market_option"  name="market_option" id="select_market_option">';
                                                    html += '<option value="1">UK</option>';
                                                    html += '<option value="2">EU</option>';
                                                    html += '</select>';
                                                    $('#market_option_select').html(html);*/
                                                    $('#market_option_select').show();
                                                }
                                                else
                                                {
                                                    $("#select_market_option").val('1');
                                                    $('#market_option_select').hide();
                                                }
                                                if(select_market_option == 2)
                                                {
                                                    $("#priceL").html('€'+payload.price_euro);
                                                    $("#priceS").html('€'+payload.price_ss_euro);
                                                }
                                                else
                                                {
                                                    $("#priceL").html(payload.currency_symbol+payload.priceL);
                                                    $("#priceS").html(payload.currency_symbol+payload.priceS);
                                                }
                                                var night_str = 'nights';
                                                /*if(night_day ==  1)
                                                {
                                                    night_str = 'night';
                                                }*/
                                                $("#lenghtnight").html(night_day+' '+night_str);

                                            },
                                                error: function(event){ //optional - default is laravel.ajax.errorHandler
                                                    //console.log(event);
                                                    laravel.ajax.errorHandler.call(this,event); //calling super handler
                                                }
                                            });
                                        }
                                        $('#s_collaborator_id').change(function(){
                                            var selectedOption = $(this).find("option:selected");
                                            var customAttr = selectedOption.attr("data-name"); // Get a custom attribute
                                            $('#club_name').val(customAttr);
                                        });
                                        $('#addToCart').on("click", function (e) {
                                            e.preventDefault();
                                            var experience_dates_id = $("#dateSelect").val();
                                            var collsSelect = $(".collsSelect").val();
                                            if(!collsSelect > 0 && typeof(collsSelect) != "undefined"){
                                                swal({
                                                    title: "Select a Travel Partner!",
                                                    text: "Please select a Travel Partner for the experience.",
                                                    icon: "warning",
                                                });

                                                return false;
                                            }
                                            $(this).html("Please wait ...");

                                            $.ajaxSetup({ headers: {'X-CSRF-TOKEN': '{{csrf_token()}}'}});
                                            $.ajax({
                                                type: "GET",
                                                cache: false,
                                                url: '{{ route("add-to-cart-1") }}',
                                                data: $("#addToCartForm1").serializeArray(), // all form fields
                                                success: function (data) {
                                                    //console.log(data);
                                                    $('#addToCart').html('<i class="fas fa-cart-arrow-down"></i> Add to Cart');
                                                    // on success, post (preview) returned data in fancybox
                                                    $.fancybox.open(data, {
                                                        autoSize: false,
                                                        fitToView : false,
                                                        width: "70%",
                                                        height: "90%",
                                                        minWidth: 300,
                                                        touch: false,
                                                        afterLoad: function(){
                                                        jQuery(document).on('click', '#addToCartForm2Submit', function (e) {
                                                                var inputs = $(".option.selected");
                                                                var ids = [];
                                                                var rates = [];
                                                                var srs = [];
                                                                var currency = [];
                                                                inputs.each(function(){ 
                                                                    ids.push($(this).attr('data-id'));
                                                                    rates.push($(this).attr('data-rate'));
                                                                    srs.push($(this).attr('data-srs'));
                                                                    currency.push($(this).attr('data-currency'));
                                                                });
                                                                $('#dates_rates_id').val(ids.toString());
                                                                $('#basePrice').val(rates.toString());
                                                                $('#basePriceSS').val(srs.toString());
                                                                $('#currency').val(currency.toString());
                                                           // $("#addToCartForm2Submit").click(function(е){
                                                                //alert('test');
                                                                e.preventDefault();
                                                                var dates_rates_id = $("#dates_rates_id").val();
                                                                if(!dates_rates_id > 0){
                                                                    $("#error1").show().focus();
                                                                    return false;
                                                                }else(
                                                                    $("#error1").hide()
                                                                )
                                                                $(this).html("Please wait ...");
                                                                var hold_days = $('#hold_tour_days').val();

                                                                $.ajaxSetup({ headers: {'X-CSRF-TOKEN': '{{csrf_token()}}'}});
                                                                $.ajax({
                                                                    type: "POST",
                                                                    cache: false,
                                                                    url: '{{ route('add-to-cart-3') }}',
                                                                    data: $("#addToCartForm2").serializeArray(), // all form fields
                                                                    success: function (data2) {
                                                                        $('#hold_tour_days').val('');
                                                                        if(hold_days != '')
                                                                        {
                                                                             window.location.href = '{{ route('hold-tours') }}';
                                                                        }
                                                                        else
                                                                        {
                                                                             window.location.href = '{{ route('show-cart') }}?bt_tour={{$_GET["bt_tour"]}}';
                                                                        }
                                                                       
                                                                       
                                                                    },
                                                                    error: function(err){
                                                                        //console.log(err);
                                                                    }
                                                                });
                                                            });
                                                            jQuery(document).on('click', '.hotelItem', function () {

                                                           // $(".hotelItem").click(function(){
                                                                //console.log("click");
                                                                var experiences_to_hotels_to_experience_dates_id = $(this).data("id");
                                                                $("#experiences_to_hotels_to_experience_dates_id").val(experiences_to_hotels_to_experience_dates_id);
                                                                $(".hotelItem").css('box-shadow', '0px 2px 5px 0px #ccc');
                                                                $(this).css('border', '3px solid rgb(235, 146, 0);');
                                                                var basePrice = $("#basePrice").val();
                                                                var basePriceSS = $("#basePriceSS").val();
                                                                var currentPrice = $(this).find('.priceValue').html();
                                                                var currentPriceSS = $(this).find('.priceSSValue').html();
                                                                if(currentPrice){
                                                                    var totalPrice = parseFloat(basePrice) + parseFloat(currentPrice);
                                                                }else{
                                                                    var totalPrice = parseFloat(basePrice);
                                                                }
                                                                if(currentPriceSS){
                                                                    var totalPriceSS = parseFloat(basePriceSS) + parseFloat(currentPriceSS);
                                                                }else{
                                                                    var totalPriceSS = parseFloat(basePriceSS);
                                                                }
                                                                $("#totalPrice").html(totalPrice);
                                                                $("#totalPriceSS").html(totalPriceSS);

                                                                $("#addToCartForm2Submit").focus();

                                                            });
                                                        }
                                                    });
                                                },
                                                error: function(er){
                                                    //console.log(er);
                                                }
                                            });
                                        });
                                    });
                                </script>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="orangeTabsContainer">
                <div class="container">
                    <ul class="tabsList">
                        {{-- <li class="active"><a href="" data-target="overviewTab">Overview</a></li> --}}
                        <li class="active"><a href="" data-target="experiencesTab">Tour Details</a></li>
                        <li class=""><a href="" data-target="fixtureTab">Fixtures</a></li>
                           
                       <li><a href="" data-target="hotelTab">Hotel</a></li>
                        <li><a href="" data-target="galleryTab">Gallery</a></li>
                        <li><a href="" data-target="mapTab" id="display_map">Map</a></li>
                        <li><a href="" data-target="reviewsTab">Reviews</a></li>
                        <li><a href="" data-target="brochureTab">Brochure View</a></li>
                        <li><a href="" data-target="datesTab">Dates & Rates</a></li>
                    </ul>
                </div>
            </div>

            <div class="tabsContant" id="tabsContant">
              

                <div class="container" id="experiencesTab" style="display: block;">
                    <div class="container" style="">
                        <h3>Tour Details</h3>
                        <div class="subHeadingCls">{!!nl2br($row->description)!!}</div>
                    </div>
                    @foreach($row->ExperienceAttractions as $ea)
                        @if($ea->type_id == 1)
                        <div class="experiences_wrapper">
                            <div class="container experiences">
                                <div class="left">
                                    @if ($ea->attractionImages->count() > 0)
                                        <div class="experiencesSwiper">
                                            {{--                                <div class="heading">Collaborators that also bought this</div>--}}
                                            <div class="swiper-container experiences-swiper-{{ $ea->id }}">
                                                <div class="swiper-wrapper">
                                                    @foreach($ea->attractionImages as $image)
                                                        <!-- <div class="swiper-slide"><a href=""><img src="{{ $image_url.('storage/'.$image->file) }}" alt="@if($image->name) {{ $image->name }} @else {{ $ea->name }} @endif" style="width: 100%;"></a></div> -->
                                                        <div class="swiper-slide">
                                                            <a href="javascript:void(0);" class="pop{{ $ea->id }}" data-id="{{$image->id}}" >
                                                                <div class="imageBox{{ $ea->id }}" data-fancybox="images">
                                                                    <img src="{{ $image_url.('storage/'.$image->file) }}" alt="@if($image->name) {{ $image->name }} @else {{ $ea->name }} @endif" style="width: 100%;">
                                                                </div>
                                                            </a>
                                                        </div>
                                                    @endforeach
                                                    <!-- <a href="#" class="swiper-slide" style="background-image: url({{ $image_url.('storage/'.$image->file) }});"></a> -->
                                                </div>

                                                <div class="swiper-pagination--buttons">
                                                    <div class="swiper-button-next swiper-button-next-{{ $ea->id }}"></div>
                                                    <div class="swiper-pagination swiper-pagination-ea-{{ $ea->id }}"></div>
                                                    <div class="swiper-button-prev swiper-button-prev-{{ $ea->id }}"></div>
                                                </div>

                                            </div>
                                            <style>
                                                .pop{{ $ea->id }} .imageBox{{ $ea->id }}{display:block !important;height: 100% !important;}
                                                .imageBox{{ $ea->id }}.fancybox-content{text-align:center!important;background:none !important;}
                                            </style>
                                            <script>
                                                $(document).ready(function(){
                                                    var swiperEa{{ $ea->id }} = new Swiper('.experiences-swiper-{{ $ea->id }}', {
                                                        observer: true,
                                                        observeParents: true,
                                                        pagination: {
                                                            el: '.swiper-pagination-ea-{{ $ea->id }}',
                                                            clickable: true,
                                                            //dynamicBullets: true,
                                                            renderBullet: function (index, className) {
                                                            if (index > 4) {
                                                              return '';
                                                            }
                                                                return '<span class="' + className + '">' + (index + 1) + '</span>';
                                                            },
                                                        },
                                                        navigation: {
                                                            nextEl: '.swiper-button-next-{{ $ea->id }}',
                                                            prevEl: '.swiper-button-prev-{{ $ea->id }}',
                                                        },
                                                    });
                                                    $().fancybox({
                                                        selector : '.pop{{ $ea->id }} .imageBox{{ $ea->id }}',
                                                        thumbs   : false,
                                                        hash     : false,
                                                        animationEffect : "fade",
                                                      
                                                    });
                                                });
                                            </script>
                                            <div class="underInfo">
                                                <div class="underElem">
                                                    <img src="{{ asset('images/v.png') }}" alt="Veenus logo">
                                                    <span class="label">Score:{{ $ea->score }}/10</span>
                                                </div>
                                                <a href="@if($ea->tripadvisor_url) {{ $ea->tripadvisor_url }} @else javascript:; @endif" class="underElem" target="_blank">
                                                    <i class="fab fa-tripadvisor"></i>
                                                    <span class="label">Tripadvisor</span>
                                                </a>
                                                <div class="underElem">
                                                    <div class="squares">
                                                        @if($ea->mobility)
                                                        <?php 
                                                        for ($i=1; $i <= 5; $i++) { 
                                                         ?>
                                                            <div class="square {{ $ea->mobility >= $i ? 'filled' : '' }}"></div>
                                                        <?php } ?>
                                                        @else
                                                            <div class="square"></div>
                                                            <div class="square"></div>
                                                            <div class="square"></div>
                                                            <div class="square"></div>
                                                            <div class="square"></div>
                                                        @endif

                                                    </div>
                                                    <span class="label">Activity Level {{ $ea->mobility }}</span>
                                                </div>
                                                <a href="@if($ea->website) {{ $ea->website }} @else javascript:; @endif" class="underElem" target="_blank">
                                                    <i class="fas fa-link"></i>
                                                    <span class="label">Website</span>
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="right">
                                    <h4>{{ $ea->name }}</h4>
                                    <div class="excerpt">{!! nl2br($ea->description) !!}</div>
                                    
                                    <?php if(!empty($ea->inclusions)){ ?>
                                    <div class="inclusionsCont">
                                        <h5>Inclusions</h5>
                                        <ul class="inclusionsList">
                                            <?php 
                                            $inclusions = unserialize($ea->inclusions);
                                            foreach ($inclusions as $key => $value) {
                                                ?>
                                                <li><i class="far fa-check-circle"></i>{{ $value }}</li>
                                                <?php
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                    @foreach($row->ExperienceAttractions as $ea)
                        @if($ea->type_id == 2)
                        <div class="experiences_wrapper">
                            <div class="container experiences">
                                <div class="left">
                                    @if ($ea->attractionImages->count() > 0)
                                        <div class="experiencesSwiper">
                                            {{--                                <div class="heading">Collaborators that also bought this</div>--}}
                                            <div class="swiper-container experiences-swiper-{{ $ea->id }}">
                                                <div class="swiper-wrapper">
                                                    @foreach($ea->attractionImages as $image)
                                                        <!-- <div class="swiper-slide"><a href=""><img src="{{ $image_url.('storage/'.$image->file) }}" alt="@if($image->name) {{ $image->name }} @else {{ $ea->name }} @endif" style="width: 100%;"></a></div> -->
                                                        <div class="swiper-slide">
                                                            <a href="javascript:void(0);" class="pop{{ $ea->id }}" data-id="{{$image->id}}" >
                                                                <div class="imageBox{{ $ea->id }}" data-fancybox="images">
                                                                    <img src="{{ $image_url.('storage/'.$image->file) }}" alt="@if($image->name) {{ $image->name }} @else {{ $ea->name }} @endif" style="width: 100%;">
                                                                </div>
                                                            </a>
                                                        </div>
                                                    @endforeach
                                                    <!-- <a href="#" class="swiper-slide" style="background-image: url({{ $image_url.('storage/'.$image->file) }});"></a> -->
                                                </div>

                                                <div class="swiper-pagination--buttons">
                                                    <div class="swiper-button-next swiper-button-next-{{ $ea->id }}"></div>
                                                    <div class="swiper-pagination swiper-pagination-ea-{{ $ea->id }}"></div>
                                                    <div class="swiper-button-prev swiper-button-prev-{{ $ea->id }}"></div>
                                                </div>

                                            </div>
                                            <style>
                                                .pop{{ $ea->id }} .imageBox{{ $ea->id }}{display:block !important;}
                                                .imageBox{{ $ea->id }}.fancybox-content{text-align:center!important;background:none !important;}
                                            </style>
                                            <script>
                                                $(document).ready(function(){
                                                    var swiperEa{{ $ea->id }} = new Swiper('.experiences-swiper-{{ $ea->id }}', {
                                                        observer: true,
                                                        observeParents: true,
                                                        pagination: {
                                                            el: '.swiper-pagination-ea-{{ $ea->id }}',
                                                            clickable: true,
                                                            //dynamicBullets: true,
                                                            renderBullet: function (index, className) {
                                                            if (index > 4) {
                                                              return '';
                                                            }
                                                                return '<span class="' + className + '">' + (index + 1) + '</span>';
                                                            },
                                                        },
                                                        navigation: {
                                                            nextEl: '.swiper-button-next-{{ $ea->id }}',
                                                            prevEl: '.swiper-button-prev-{{ $ea->id }}',
                                                        },
                                                    });
                                                    $().fancybox({
                                                        selector : '.pop{{ $ea->id }} .imageBox{{ $ea->id }}',
                                                        thumbs   : false,
                                                        hash     : false,
                                                        animationEffect : "fade",
                                                      
                                                    });
                                                });
                                            </script>
                                            <div class="underInfo">
                                                <div class="underElem">
                                                    <img src="{{ asset('images/v.png') }}" alt="Veenus logo">
                                                    <span class="label">Score:{{ $ea->score }}/10</span>
                                                </div>
                                                <a href="@if($ea->tripadvisor_url) {{ $ea->tripadvisor_url }} @else javascript:; @endif" class="underElem" target="_blank">
                                                    <i class="fab fa-tripadvisor"></i>
                                                    <span class="label">Tripadvisor</span>
                                                </a>
                                                <div class="underElem">
                                                    <div class="squares">
                                                        @if($ea->mobility)
                                                        <?php 
                                                        for ($i=1; $i <= 5; $i++) { 
                                                         ?>
                                                            <div class="square {{ $ea->mobility >= $i ? 'filled' : '' }}"></div>
                                                        <?php } ?>
                                                        @else
                                                            <div class="square"></div>
                                                            <div class="square"></div>
                                                            <div class="square"></div>
                                                            <div class="square"></div>
                                                            <div class="square"></div>
                                                        @endif

                                                    </div>
                                                    <span class="label">Activity Level {{ $ea->mobility }}</span>
                                                </div>
                                                <a href="@if($ea->website) {{ $ea->website }} @else javascript:; @endif" class="underElem" target="_blank">
                                                    <i class="fas fa-link"></i>
                                                    <span class="label">Website</span>
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="right">
                                    <h4>{{ $ea->name }}</h4>
                                    <div class="excerpt">{!! nl2br($ea->description) !!}</div>
                                    
                                    <?php if(!empty($ea->inclusions)){ ?>
                                    <div class="inclusionsCont">
                                        <h5>Inclusions</h5>
                                        <ul class="inclusionsList">
                                            <?php 
                                            $inclusions = unserialize($ea->inclusions);
                                            foreach ($inclusions as $key => $value) {
                                                ?>
                                                <li><i class="far fa-check-circle"></i>{{ $value }}</li>
                                                <?php
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                    @foreach($row->ExperienceAttractions as $ea)
                        @if($ea->type_id == 3)
                        <div class="experiences_wrapper">
                            <div class="container experiences">
                                <div class="left">
                                    @if ($ea->attractionImages->count() > 0)
                                        <div class="experiencesSwiper">
                                            {{--                                <div class="heading">Collaborators that also bought this</div>--}}
                                            <div class="swiper-container experiences-swiper-{{ $ea->id }}">
                                                <div class="swiper-wrapper">
                                                    @foreach($ea->attractionImages as $image)
                                                        <!-- <div class="swiper-slide"><a href=""><img src="{{ $image_url.('storage/'.$image->file) }}" alt="@if($image->name) {{ $image->name }} @else {{ $ea->name }} @endif" style="width: 100%;"></a></div> -->
                                                        <div class="swiper-slide">
                                                            <a href="javascript:void(0);" class="pop{{ $ea->id }}" data-id="{{$image->id}}" >
                                                                <div class="imageBox{{ $ea->id }}" data-fancybox="images">
                                                                    <img src="{{ $image_url.('storage/'.$image->file) }}" alt="@if($image->name) {{ $image->name }} @else {{ $ea->name }} @endif" style="width: 100%;">
                                                                </div>
                                                            </a>
                                                        </div>
                                                    @endforeach
                                                    <!-- <a href="#" class="swiper-slide" style="background-image: url({{ $image_url.('storage/'.$image->file) }});"></a> -->
                                                </div>

                                                <div class="swiper-pagination--buttons">
                                                    <div class="swiper-button-next swiper-button-next-{{ $ea->id }}"></div>
                                                    <div class="swiper-pagination swiper-pagination-ea-{{ $ea->id }}"></div>
                                                    <div class="swiper-button-prev swiper-button-prev-{{ $ea->id }}"></div>
                                                </div>

                                            </div>
                                             <style>
                                                .pop{{ $ea->id }} .imageBox{{ $ea->id }}{display:block !important;}
                                                .imageBox{{ $ea->id }}.fancybox-content{text-align:center!important;background:none !important;}
                                            </style>
                                            <script>
                                                $(document).ready(function(){
                                                    var swiperEa{{ $ea->id }} = new Swiper('.experiences-swiper-{{ $ea->id }}', {
                                                        observer: true,
                                                        observeParents: true,
                                                        pagination: {
                                                            el: '.swiper-pagination-ea-{{ $ea->id }}',
                                                            clickable: true,
                                                            //dynamicBullets: true,
                                                            renderBullet: function (index, className) {
                                                            if (index > 4) {
                                                              return '';
                                                            }
                                                                return '<span class="' + className + '">' + (index + 1) + '</span>';
                                                            },
                                                        },
                                                        navigation: {
                                                            nextEl: '.swiper-button-next-{{ $ea->id }}',
                                                            prevEl: '.swiper-button-prev-{{ $ea->id }}',
                                                        },
                                                    });
                                                     $().fancybox({
                                                        selector : '.pop{{ $ea->id }} .imageBox{{ $ea->id }}',
                                                        thumbs   : false,
                                                        hash     : false,
                                                        animationEffect : "fade",
                                                      
                                                    });
                                                });
                                            </script>
                                            <div class="underInfo">
                                                <div class="underElem">
                                                    <img src="{{ asset('images/v.png') }}" alt="Veenus logo">
                                                    <span class="label">Score:{{ $ea->score }}/10</span>
                                                </div>
                                                <a href="@if($ea->tripadvisor_url) {{ $ea->tripadvisor_url }} @else javascript:; @endif" class="underElem" target="_blank">
                                                    <i class="fab fa-tripadvisor"></i>
                                                    <span class="label">Tripadvisor</span>
                                                </a>
                                                <div class="underElem">
                                                    <div class="squares">
                                                        @if($ea->mobility)
                                                        <?php 
                                                        for ($i=1; $i <= 5; $i++) { 
                                                         ?>
                                                            <div class="square {{ $ea->mobility >= $i ? 'filled' : '' }}"></div>
                                                        <?php } ?>
                                                        @else
                                                            <div class="square"></div>
                                                            <div class="square"></div>
                                                            <div class="square"></div>
                                                            <div class="square"></div>
                                                            <div class="square"></div>
                                                        @endif

                                                    </div>
                                                    <span class="label">Activity Level {{ $ea->mobility }}</span>
                                                </div>
                                                <a href="@if($ea->website) {{ $ea->website }} @else javascript:; @endif" class="underElem" target="_blank">
                                                    <i class="fas fa-link"></i>
                                                    <span class="label">Website</span>
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="right">
                                    <h4>{{ $ea->name }}</h4>
                                    <div class="excerpt">{!! nl2br($ea->description) !!}</div>
                                    
                                    <?php if(!empty($ea->inclusions)){ ?>
                                    <div class="inclusionsCont">
                                        <h5>Inclusions</h5>
                                        <ul class="inclusionsList">
                                            <?php 
                                            $inclusions = unserialize($ea->inclusions);
                                            foreach ($inclusions as $key => $value) {
                                                ?>
                                                <li><i class="far fa-check-circle"></i>{{ $value }}</li>
                                                <?php
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                </div>
                <div class="container" id="fixtureTab" style="display: none;">
                    <h3>Fixtures</h3>
                    @if ($row->ExperiencesToFixture->count() > 0)
                            @foreach($row->ExperiencesToFixture as $fixMain)
                                <h4 style="color: #32363A;font-size: 1.75rem;font-weight: bold;">{{ $fixMain->title }}</h4>
                                <div class="details mb-3 mt-4" style="color:#676A6C;font-weight: 500;font-size: 1.25rem;">{!!nl2br($fixMain->fixture_text)!!}</div>
                            @endforeach
                    @endif
                </div>
                
               

                <div class="container" id="hotelTab" style="display: none;">
                    <h3>Hotels</h3>

                    <div class="hotels">
                        <h5 class="bottomSpace">Our Hotel Choice</h5>
                        @if ($row->ExperienceHotels->count() > 0)
                            @foreach($row->ExperienceHotels as $hotel)
                           
                               <!--  @if($loop->first)
                                    <h5 class="bottomSpace">{{ $row->hotel_label_1 }}</h5>
                                @else
                                    <h5 class="bottomSpace">{{ $row->hotel_label_2 }}</h5>
                                @endif -->
                                <div class="hotel">
                                    <div class="heading">
                                        <h4>{{ $hotel->name }}</h4>
                                        @if ( $hotel->stars > 0 )
                                            <span class="starsCont">
                                                @for ($i = 0; $i < $hotel->stars; $i++)
                                                    <i class="fas fa-star"></i>
                                                @endfor
                                            </span>
                                        @endif
                                    </div>
                                    <div class="infoRow">
                                        <span><a href="{{ $hotel->website }}" target="_blank">Visit hotel website</a></span>
                                        {{-- <span><i class="fas fa-circle"></i></span> --}}
                                        <span><a href="tel:{{ $hotel->phone }}" target="_blank" class="tel">{{ $hotel->phone ?? '00000 000000' }}</a></span>
                                        {{-- <span><i class="fas fa-circle"></i></span> --}}
                                      <!--   @if(!empty($hotel->menu_url) && (strpos($hotel->menu_url, 'hotel_images') !== false))
                                        <span><a href="{{url('storage').'/'.$hotel->menu_url}}" target="_blank">Sample Menu</a></span>
                                        @endif -->
                                        {{-- <span><i class="fas fa-circle"></i></span> --}}
                                        @if(!empty($hotel->location_link))
                                        <span><a href="{{ $hotel->location_link}}" target="_blank">See on map</a></span>
                                        @endif
                                         @if(!empty($hotel->main_menu) || !empty($hotel->festive_menu || $hotel->pivot->other_menu))
                                        <span>
                                             <?php  if(!empty($hotel->pivot->selected_menu)){ ?>
                                             
                                                  <?php  if(!empty($hotel->pivot->selected_menu) && $hotel->pivot->selected_menu == 1){
                                                    ?>
                                                     <a href="{{$image_url}}/storage/{{$hotel->main_menu}}" target="_blank"> Sample Menu </a>
                                                    <?php
                                                    }elseif(!empty($hotel->pivot->selected_menu) && $hotel->pivot->selected_menu == 2){
                                                    ?>
                                                    <a href="{{$image_url}}/storage/{{$hotel->festive_menu}}" target="_blank"> Sample Menu </a>
                                                    <?php
                                                    }elseif(!empty($hotel->pivot->selected_menu) && $hotel->pivot->selected_menu == 3){
                                                    ?>
                                                    <a href="{{$image_url}}/storage/{{$hotel->pivot->other_menu}}" target="_blank"> Sample Menu </a>
                                                    <?php
                                                    } ?>
                                               
                                            <?php } ?>
                                           
                                        </span>
                                        @endif
                                    </div>
                                    <div class="hotelsSwiper">
                                        <div class="swiper-container hotels-swiper-{{ $hotel->id }}">
                                            <div class="swiper-wrapper">
                                                @if(!empty($hotel->hotelImages[0]))
                                                @foreach($hotel->hotelImages as $image)
                                                  <!--   <div class="swiper-slide"><a href=""><img src="{{ $image_url.('storage/'.$image->file) }}" alt="@if($image->name) {{ $image->name }} @else {{ $hotel->name }} @endif"></a></div> -->
                                                    <div class="swiper-slide">
                                                        
                                                            <a href="javascript:void(0);" class="pop{{ $hotel->id }}" data-id="{{$image->id}}" >
                                                                <div class="imageBox{{ $hotel->id }}" data-fancybox="images">
                                                                    <img class="imageSource_{{$image->id}}" src="{{ $image_url.('storage/'.$image->file) }}" alt="{{ $image->id}}">
                                                                    
                                                                    
                                                                </div>
                                                            </a>
                                                        
                                                    </div>
                                                @endforeach
                                                @endif
                                            </div>
                                            <div class="swiper-pagination--buttons">
                                                <div class="swiper-button-prev swiper-button-prev-eh-{{ $hotel->id }}"></div>
                                                <div class="swiper-pagination swiper-pagination-eh-{{ $hotel->id }}"></div>
                                                <div class="swiper-button-next swiper-button-next-eh-{{ $hotel->id }}"></div>
                                            </div>
                                        </div>
                                        <style>
                                            .pop{{ $hotel->id }} .imageBox{{ $hotel->id }}{display:block !important;}
                                            .imageBox{{ $hotel->id }}.fancybox-content{text-align:center!important;background:none !important;}
                                        </style>
                                        <script>
                                            $(document).ready(function(){

                                                var swiperEh{{ $hotel->id }} = new Swiper('.hotels-swiper-{{ $hotel->id }}', {
                                                    observer: true,
                                                    observeParents: true,
                                                    pagination: {
                                                        el: '.swiper-pagination-eh-{{ $hotel->id }}',
                                                        clickable: true,
                                                        //dynamicBullets: true,
                                                        renderBullet: function (index, className) {
                                                            if (index > 4) {
                                                              return '';
                                                            }
                                                                return '<span class="' + className + '">' + (index + 1) + '</span>';
                                                        },
                                                    },
                                                    navigation: {
                                                        nextEl: '.swiper-button-next-eh-{{ $hotel->id }}',
                                                        prevEl: '.swiper-button-prev-eh-{{ $hotel->id }}',
                                                    },
                                                });
                                                $().fancybox({
                                                    selector : '.pop{{ $hotel->id }} .imageBox{{ $hotel->id }}',
                                                    thumbs   : false,
                                                    hash     : false,
                                                    animationEffect : "fade",
                                                  
                                                });
                                            });
                                        </script>

                                    </div>


                                    <div class="excerptCont">
                                        <h5>About</h5>
                                        <div class="excerpt"><?php echo nl2br($hotel->description); ?></div>
                                    </div>
                                    
                                    <div class="hotelFooter">
                                        <?php
                                        $amenities = 


                                DB::connection('mysql')->table('experiences_to_hotels')->where('hotels_id', $hotel->id)->where('experiences_id', $row->id)->orderBy('id', 'DESC')->first();
                                        if(!empty($amenities->tour_amenities) || !empty($amenities->tour_amenities) || !empty($amenities->porterage_amenity) || !empty($amenities->parking_amenity) || !empty($amenities->lift_access_amenity) || !empty($amenities->leisure_amenity)){
                                        ?>
                                            <div class="amenitiesCont">
                                                <h5>Amenities</h5>
                                                <ul class="amenitiesList">
                                                    <li><i class="far fa-check-circle"></i>Parking: <?= !empty($amenities->parking_amenity_url)?'<a target="_blank" class="orange" href="'.$amenities->parking_amenity_url.'">'.$amenities->parking_amenity.'</a>':$amenities->parking_amenity ?></li>
                                                    <li><i class="far fa-check-circle"></i>Porterage: <?= !empty($amenities->porterage_amenity_url)?'<a target="_blank" class="orange" href="'.$amenities->porterage_amenity_url.'">'.$amenities->porterage_amenity.'</a>':$amenities->porterage_amenity ?></li>
                                                    <li><i class="far fa-check-circle"></i>Lift: <?= !empty($amenities->lift_access_amenity_url)?'<a target="_blank" class="orange" href="'.$amenities->lift_access_amenity_url.'">'.$amenities->lift_access_amenity.'</a>':$amenities->lift_access_amenity ?></li>
                                                    <li><i class="far fa-check-circle"></i>Leisure:  <?= !empty($amenities->leisure_amenity_url)?'<a target="_blank" class="orange" href="'.$amenities->leisure_amenity_url.'">'.$amenities->leisure_amenity.'</a>':$amenities->leisure_amenity ?></li>
                                                    <?php
                                                    
                                                    if(isset($amenities->tour_amenities) && !empty($amenities->tour_amenities)){
                                                        $tour_amenities = unserialize($amenities->tour_amenities);
                                                        $tour_amenities_url = unserialize($amenities->tour_amenities_url);
                                                        ?>
                                                    @foreach($tour_amenities as $k=> $amenity)
                                                        @if(!empty($amenity))
                                                        <li><i class="far fa-check-circle"></i><?= !empty($tour_amenities_url[$k])?'<a target="_blank" class="orange" href="'.$tour_amenities_url[$k].'">'.$amenity.'</a>':$amenity ?> </li>
                                                        @endif
                                                    @endforeach
                                                        <?php
                                                    }
                                                    ?>
                                                </ul>
                                            </div>
                                        <?php } ?>
                                        <!-- @if ($hotel->hotelAmenities->count() > 0)
                                            <div class="amenitiesCont">
                                                <h5>Amenities</h5>
                                                <ul class="amenitiesList">
                                                    @foreach($hotel->hotelAmenities as $amenity)
                                                        <li>@if($amenity->icon){!! $amenity->icon !!}@else <i class="far fa-check-circle"></i> @endif  {{ $amenity->name }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif -->
                                        @if ($hotel->upscales->count() > 0)
                                            <div class="upscalesCont">
                                                <h5>Upscales</h5>
                                                <div class="upscalesList">
                                                    @foreach($hotel->upscales as $upscale)
                                                        <div class="upscaleItem">
                                                            <span class="image">
                                                                @if($upscale->upscaleImages->count() > 0)
                                                                <img src="{{ $image_url.('storage/'.$upscale->upscaleImages[0]->file) }}" alt="@if($upscale->upscaleImages[0]->name) {{ $upscale->upscaleImages[0]->name }} @else {{ $upscale->name }} @endif">
                                                                @endif
                                                            </span>
                                                            <span class="info">
                                                                <h6>{{ $upscale->name }}</h6>
                                                                <span class="excerpt">{!! nl2br($upscale->excerpt) !!}</span>
                                                                <?php if($upscale->price != ''){ ?>
                                                                    <span class="price">£{{ $upscale->price }}pp</span>
                                                                <?php } ?>
                                                            </span>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                        {{--                                <div class="detailsCont">--}}
                                        {{--                                    <h5>Details</h5>--}}
                                        {{--                                    <div class="detail">--}}
                                        {{--                                        <span>Sample menu:</span>--}}
                                        {{--                                        <span><a href="#" target="_blank">Sample menu</a></span>--}}
                                        {{--                                    </div>--}}
                                        {{--                                    <div class="detail">--}}
                                        {{--                                        <span>Website:</span>--}}
                                        {{--                                        <span><a href="{{ $hotel->website }}" target="_blank">{{ $hotel->website }}</a></span>--}}
                                        {{--                                    </div>--}}
                                        {{--                                    <div class="detail">--}}
                                        {{--                                        <span>Contact:</span>--}}
                                        {{--                                        <span><a href="tel:{{ $hotel->phone }}" target="_blank">{{ $hotel->phone }}</a></span>--}}
                                        {{--                                    </div>--}}
                                        {{--                                    <div class="detail">--}}
                                        {{--                                        <span>Address:</span>--}}
                                        {{--                                        <span>{{ $hotel->address }}</span>--}}
                                        {{--                                    </div>--}}
                                        {{--                                </div>--}}
                                </div>
                            @endforeach
                        @endif
                    </div>

                </div>

                <div class="container" id="shipTab" style="display: none;">
                    <h3>Ship</h3>

                    <div class="ships">

                        @if (isset($row->ship->id) && $row->ship->id > 0)

                            <div class="ship">


                                <div class="left">
                                    <div class="heading">
                                        <h4>{{ $row->ship->name }}</h4>
                                        @if ( $row->ship->stars > 0 )
                                            <span class="starsCont">
                                            @for ($i = 0; $i < $row->ship->stars; $i++)
                                                    <i class="fas fa-star"></i>
                                                @endfor
                                        </span>
                                        @endif
                                    </div>
                                    {{--                                <div class="infoRow">--}}
                                    {{--                                    <span><a href="{{ $row->ship->website }}" target="_blank">{{ $row->ship->website }}</a></span>--}}
                                    {{--                                    <span><i class="fas fa-circle"></i></span>--}}
                                    {{--                                    <span><a href="tel:{{ $row->ship->phone }}" target="_blank" class="tel">{{ $row->ship->phone }}</a></span>--}}
                                    {{--                                    <span><i class="fas fa-circle"></i></span>--}}
                                    {{--                                    <span><a href="#">Sample Menu</a></span>--}}
                                    {{--                                    <span><i class="fas fa-circle"></i></span>--}}
                                    {{--                                    <span><a href="#">See on map</a></span>--}}
                                    {{--                                </div>--}}
                                    <div class="hotelsSwiper">
                                        <div class="swiper-container ship-swiper-{{ $row->ship->id }}">
                                            <div class="swiper-wrapper">
                                                @foreach($row->ship->shipImages as $image)
                                                    <div class="swiper-slide"><a href=""><img src="{{ $image_url.('storage/'.$image->file) }}" alt="@if($image->name) {{ $image->name }} @else {{ $hotel->name }} @endif"></a></div>
                                                @endforeach
                                            </div>
                                            <div class="navigationCont">
                                                <div class="swiper-button-prev swiper-button-prev-s-{{ $row->ship->id }}"></div>
                                                <div class="swiper-pagination swiper-pagination-s-{{ $row->ship->id }}"></div>
                                                <div class="swiper-button-next swiper-button-next-s-{{ $row->ship->id }}"></div>
                                            </div>
                                        </div>
                                        <script>
                                            $(document).ready(function(){
                                                var swiperS{{ $row->ship->id }} = new Swiper('.ship-swiper-{{ $row->ship->id }}', {
                                                    observer: true,
                                                    observeParents: true,
                                                    pagination: {
                                                        el: '.swiper-pagination-s-{{ $row->ship->id }}',
                                                        clickable: true,
                                                        //dynamicBullets: true,
                                                        renderBullet: function (index, className) {
                                                        if (index > 4) {
                                                          return '';
                                                        }
                                                            return '<span class="' + className + '">' + (index + 1) + '</span>';
                                                        },
                                                    },
                                                    navigation: {
                                                        nextEl: '.swiper-button-next-s-{{ $row->ship->id }}',
                                                        prevEl: '.swiper-button-prev-s-{{ $row->ship->id }}',
                                                    },
                                                });
                                            });
                                        </script>

                                    </div>


                                    <div class="detailsCont">
                                        <h5>Ship Details</h5>
                                        <div class="details">
                                            @if($row->ship->built)<span>Built: {{ $row->ship->built }}</span>@endif
                                            @if($row->ship->cabins)<span>Cabins: {{ $row->ship->cabins }}</span>@endif
                                            @if($row->ship->crew)<span>Crew: {{ $row->ship->crew }}</span>@endif
                                            @if($row->ship->beam)<span>Beam: {{ $row->ship->beam }} m</span>@endif
                                            @if($row->ship->refurbished)<span>Refurbished: {{ $row->ship->refurbished }}</span>@endif
                                            @if($row->ship->passengers)<span>Passengers: {{ $row->ship->passengers }}</span>@endif
                                            @if($row->ship->length)<span>Length: {{ $row->ship->length }} m</span>@endif
                                            @if($row->ship->draught)<span>Draught: {{ $row->ship->draught }} m</span>@endif
                                        </div>
                                    </div>

                                    <div class="excerptCont">
                                        <h5>Description</h5>
                                        <div class="excerpt">{!! nl2br($row->ship->description) !!}</div>
                                    </div>

                                    @if ($row->ship->shipCabins->count() > 0)
                                        <div class="cabinsCont">
                                            <h5>Cabins</h5>
                                            <div class="cabinsList">
                                                @foreach($row->ship->shipCabins as $cabin)
                                                    <div class="cabinItem">
                                                        <h6>{{ $cabin->name }}</h6>
                                                        <div class="excerpt">{!! $cabin->excerpt !!}</div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif

                                </div>

                                <div class="right">
                                    @if ($row->ship->hotelAmenities->count() > 0)
                                        <div class="amenitiesCont">
                                            <h5>Amenities</h5>
                                            <ul class="amenitiesList" style="margin-left: 0px !important;">
                                                @foreach($row->ship->hotelAmenities as $amenity)
                                                    <li>@if($amenity->icon){!! $amenity->icon !!}@else <i class="far fa-check-circle"></i> @endif  {{ $amenity->name }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>

                            </div>

                        @endif
                    </div>

                </div>

                <div class="container" id="galleryTab" style="display: none;">
                    <h3>Gallery</h3>
                        <h4>&nbsp;</h4>
                    <?php if(isset($row->video_title) && !empty($row->video_title)){ ?>
                        <h4><?php echo $row->video_title; ?></h4>
                    <?php } ?>
                    <?php if(isset($row->video) && !empty($row->video)){ ?>
                        <div class="galleryVideoSection" style="margin: 50px;">
                            <iframe width="100%" height="415" src="{{$row->video}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>

                    <?php } ?>
                    <div class="gallery">

                        @if ($row->ExperiencesToGallerys->count() > 0)
                            @foreach($row->ExperiencesToGallerys as $imageMain)
                            @if(empty($imageMain->is_new))
                                <h4>&nbsp;</h4>
                                <h4>{{ $imageMain->name }}</h4>
                                    <div class="gallerySwiper">
                                        <div class="swiper-container gallery-swiper-main gls{{ $imageMain->id }}">
                                            <div class="swiper-wrapper">
                                                <?php foreach ($imageMain->ExperiencesToGalleryImagesh as $keyImg => $valueImg) { ?>
                                                    <div class="swiper-slide">
                                                        <div class="item">
                                                            <a href="javascript:void(0);" class="pop" data-id="{{$valueImg->id}}" >
                                                                <div class="imageBox" data-fancybox="images">
                                                                    <img class="imageSource_{{$valueImg->id}}" src="{{ $image_url.('storage/'.$valueImg->images) }}" alt="{{ $valueImg->id}}">
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                            <div class="swiper-button-next swiper-button-next-main"></div>
                                            <div class="swiper-button-prev swiper-button-prev-main"></div>
                                        </div>
                                        <style>
                                            .pop .imageBox{display:block !important;}
                                            .imageBox.fancybox-content{text-align:center!important;background:none !important;}
                                        </style>
                                        <script>
                                            $(document).ready(function(){
                                                var swiperExp = new Swiper('.gls{{ $imageMain->id }}', {
                                                    observer: true,
                                                    observeParents: true,
                                                    slidesPerView: 5,
                                                    spaceBetween: 20,
                                                    slidesPerGroup: 1,
                                                    loop: false,
                                                    loopFillGroupWithBlank: false,
                                                    // pagination: {
                                                    //     el: '.swiper-pagination-main',
                                                    //     clickable: true,
                                                    // },
                                                    navigation: {
                                                        nextEl: '.swiper-button-next-main',
                                                        prevEl: '.swiper-button-prev-main',
                                                    },
                                                });
                                                $().fancybox({
                                                    selector : '.pop .imageBox',
                                                    thumbs   : false,
                                                    hash     : false,
                                                    animationEffect : "fade",
                                                  
                                                });

                                            });
                                        </script>
                                    </div>
                            @endif    
                            @endforeach
                        @endif
                        <?php /*
                        @if ($row->experienceImages->count() > 0)

                            <div class="gallerySwiper">
                                <div class="swiper-container gallery-swiper-main glss24">
                                    <div class="swiper-wrapper">
                                        @foreach($row->experienceImages as $image)
                                            <div class="swiper-slide">
                                                <div class="item">
                                                    <a href="">
                                                        <div class="imageBox">
                                                            <img src="{{ $image_url.('storage/'.$image->file) }}" alt="@if($image->name) {{ $image->name }} @else {{ $row->name }} @endif">
                                                        </div>
                                                        @if($image->name)
                                                            <h2>{{ $image->name }}</h2>
                                                        @endif
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    {{-- <div class="swiper-pagination swiper-pagination-main"></div>--}}

                                    <div class="swiper-button-next swiper-button-next-main"></div>
                                    <div class="swiper-button-prev swiper-button-prev-main"></div>
                                </div>
                                <script>
                                    $(document).ready(function(){
                                        var swiperExp = new Swiper('.glss24', {
                                            observer: true,
                                            observeParents: true,
                                            slidesPerView: 5,
                                            spaceBetween: 20,
                                            slidesPerGroup: 1,
                                            loop: false,
                                            loopFillGroupWithBlank: false,
                                            // pagination: {
                                            //     el: '.swiper-pagination-main',
                                            //     clickable: true,
                                            // },
                                            navigation: {
                                                nextEl: '.swiper-button-next-main',
                                                prevEl: '.swiper-button-prev-main',
                                            },
                                        });
                                    });
                                </script>
                                @if ($row->ExperienceHotels->count() > 0 && $row->ExperienceHotels[0]->hotelImages->count() > 0)
                                <div class="swiper-container gallery-swiper-hotel glss24w56 slider-top-space">
                                    <div class="swiper-wrapper">
                                        @foreach($row->ExperienceHotels[0]->hotelImages as $image)
                                            <div class="swiper-slide">
                                                <div class="item">
                                                    <a href="">
                                                        <div class="imageBox">
                                                            <img src="{{ $image_url.('storage/'.$image->file) }}" alt="@if($image->name) {{ $image->name }} @else {{ $row->ExperienceHotels[0]->name }} @endif">
                                                        </div>
                                                        @if($image->name)
                                                            <h2>{{ $image->name }}</h2>
                                                        @endif
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    {{-- <div class="swiper-pagination swiper-pagination-hotel"></div>--}}

                                    <div class="swiper-button-next swiper-button-next-hotel"></div>
                                    <div class="swiper-button-prev swiper-button-prev-hotel"></div>
                                </div>
                                <script>
                                    $(document).ready(function(){
                                        var swiperHotel = new Swiper('.glss24w56', {
                                            observer: true,
                                            observeParents: true,
                                            slidesPerView: 5,
                                            spaceBetween: 20,
                                            slidesPerGroup: 1,
                                            loop: false,
                                            loopFillGroupWithBlank: true,
                                            // pagination: {
                                            //     el: '.swiper-pagination-hotel',
                                            //     clickable: true,
                                            // },
                                            navigation: {
                                                nextEl: '.swiper-button-next-hotel',
                                                prevEl: '.swiper-button-prev-hotel',
                                            },
                                        });
                                    });
                                </script>
                                @endif
                            </div>
                        @endif */?>
                         @if ($row->ExperiencesToGallerys->count() > 0)
                            @foreach($row->ExperiencesToGallerys as $imageMain)
                            @if(!empty($imageMain->is_new))
                                <h4>&nbsp;</h4>
                                <h4>{{ $imageMain->name }}</h4>
                                    <div class="gallerySwiper">
                                        <div class="swiper-container gallery-swiper-main gls{{ $imageMain->id }}">
                                            <div class="swiper-wrapper">
                                                <?php foreach ($imageMain->ExperiencesToGalleryImagesh as $keyImg => $valueImg) { ?>
                                                    <div class="swiper-slide">
                                                        <div class="item">
                                                            <a href="javascript:void(0);" class="pop" data-id="{{$valueImg->id}}" >
                                                                <div class="imageBox" data-fancybox="images">
                                                                    <img class="imageSource_{{$valueImg->id}}" src="{{ $image_url.('storage/'.$valueImg->images) }}" alt="{{ $valueImg->id}}">
                                                                    <div class="col-md-12" >
                                                                        <h5 class="imageDesc">{{$valueImg->image_name}}</h5>
                                                                    </div>
                                                                    
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                            <div class="swiper-button-next swiper-button-next-main"></div>
                                            <div class="swiper-button-prev swiper-button-prev-main"></div>
                                        </div>
                                        <style>
                                            .pop .imageBox{display:block !important;}
                                            .imageBox.fancybox-content{text-align:center!important;background:none !important;}
                                        </style>
                                        <script>
                                            $(document).ready(function(){
                                                var swiperExp = new Swiper('.gls{{ $imageMain->id }}', {
                                                    observer: true,
                                                    observeParents: true,
                                                    slidesPerView: 5,
                                                    spaceBetween: 20,
                                                    slidesPerGroup: 1,
                                                    loop: false,
                                                    loopFillGroupWithBlank: false,
                                                    // pagination: {
                                                    //     el: '.swiper-pagination-main',
                                                    //     clickable: true,
                                                    // },
                                                    navigation: {
                                                        nextEl: '.swiper-button-next-main',
                                                        prevEl: '.swiper-button-prev-main',
                                                    },
                                                });
                                                $().fancybox({
                                                    selector : '.pop .imageBox',
                                                    thumbs   : false,
                                                    hash     : false,
                                                    animationEffect : "fade",
                                                  
                                                });

                                            });
                                        </script>
                                    </div>
                            @endif    
                            @endforeach
                        @endif
                    </div>
                    <div class="gallery">
                        <div class="galleryUploadCls">
                           <!--  <h4>Have you been on any Veenus experiences? We'd love to see your photographs</h4> -->
                        <?php /*<div class="galleryUploadSubCls">
                            {!! Form::open(array('route' => 'experience-image-store','method'=>'POST', 'enctype' => 'multipart/form-data', 'class'=>'experienceImageStore', 'id'=>'experienceImageStore')) !!}
                            <div class="brw_bx image_galller image_galllerFront ">
                                <div class="browse_btn"> 
                                    <input type="file" name="experienceImages[]" class="filesCls" data-id="{{ $row->id}}" multiple="" accept="image/*">
                                    <input type="hidden" name="experience_id" value="{{ $row->id}}" class="experience_id">
                                    <div class=""> 
                                        <span>Upload a Photo</span>
                                    </div>
                                </div>
                            </div>
                            <input type="submit" name="submit" value="save" class="experienceImageStoreSaveBtn" style="display: none;">
                            {!! Form::close() !!}
                        </div> */?>
                        </div>
                    </div>

                </div>
                <div class="container" id="mapTab" style="display: none;">
                    <h3>Map</h3>
                    <div class="map">
                        <h4>Tour Visualisation</h4>
                        <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
                        <div class="mapCont">
                            <iframe src="<?php echo $row->map_url; ?>" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                            {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5112.853218093653!2d-0.1221450017424323!3d51.50128773950385!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487604b89a2ce219%3A0xdd09ac6f4d8cb96!2sPark%20Plaza%20Westminster%20Bridge%20London!5e0!3m2!1sen!2sin!4v1614855696249!5m2!1sen!2sin" width="800" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe> --}}
                            {{-- <div id="map" style="width: 800px; height: 400px;"></div> --}}

                            {{-- <script type="text/javascript">
                                var locations = [
                                    ['MERCURE DAVENTRY COURT HOTEL', 52.277822, -1.164655],
                                    ['THE SILVERSTONE EXPERIENCE', 52.076892, -1.025067],
                                    ['JAGUAR LAND ROVER EXPERIENCE', 52.432488, -1.771511],
                                ];

                                var map = new google.maps.Map(document.getElementById('map'), {
                                    // zoom: 10,
                                    // center: new google.maps.LatLng(-33.92, 151.25),
                                    mapTypeId: google.maps.MapTypeId.ROADMAP
                                });

                                //create empty LatLngBounds object
                                var bounds = new google.maps.LatLngBounds();
                                var infowindow = new google.maps.InfoWindow();

                                var marker, i;

                                for (i = 0; i < locations.length; i++) {
                                    marker = new google.maps.Marker({
                                        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                        icon: "{{ asset('images/v.png') }}",
                                        map: map,
                                        title: locations[i][0]
                                    });

                                    //extend the bounds to include each marker's position
                                    bounds.extend(marker.position);

                                    google.maps.event.addListener(marker, 'click', (function(marker, i) {
                                        return function() {
                                            infowindow.setContent(locations[i][0]);
                                            infowindow.open(map, marker);
                                        }
                                    })(marker, i));
                                }

                                //now fit the map to the newly inclusive bounds
                                map.fitBounds(bounds);

                                //(optional) restore the zoom level after the map is done scaling
                                var listener = google.maps.event.addListener(map, "idle", function () {
                                    map.setZoom(7);
                                    google.maps.event.removeListener(listener);
                                });
                            </script> --}}
                        </div>
                    </div>
                </div>

                <div class="container" id="reviewsTab" style="display: none;">

                    <h3>
                        Reviews
                    </h3>
                    @if ($row->ExperiencesToReviews->count() > 0)
                    <ul class="amenitiesList" style="margin-left: 0px !important;">
                        @foreach($row->ExperiencesToReviews as $reviewMain)
                            <li><div class="details mb-3 mt-4" style="color:#32363A;font-weight: 500;font-size: 1.25rem;">{!!nl2br($reviewMain->review_text)!!}</div></li>
                        @endforeach
                    </ul>
                    @endif
                    <!--  @if ($row->ExperiencesToReviews->count() > 0)
                            @foreach($row->ExperiencesToReviews as $reviewMain)
                                <div class="details mb-3 mt-4" style="color:#676A6C;font-weight: 500;font-size: 1.25rem;">{!!nl2br($reviewMain->review_text)!!}</div>
                            @endforeach
                    @endif -->

                </div>

                <div class="container" id="brochureTab" style="display: none;">
                    <div class="container">
                        <h3>Brochure View</h3>
                        <div class="subHeadingCls">Visualise this tour in a brochure format</div>
                    </div>

                    <div class="brochure">

                        <ul class="brochure_nav">
                            <li><a href="javascript:;" data-toggle="modal" data-target="#brochurDownload{{ $row->id }}" data-id="{{ $row->id }}" id="downloadBrochurePrice" data-dismiss="modal"  class="active">Download</a></li>
                           
                        </ul>


                        <div class="brochure_view">

                            <div class="banner"></div>

                            <div class="page">

                                <div class="header">

                                    <div class="logo_wrapper">
                                        <div class="logo">
                                           <img src="{{ asset('images/logo_bowling.png') }}">
                                        </div>
                                    </div>

                                </div>

                                <div class="body">

                                    <div class="column">

                                        <div class="image">
                                            <img src="{{ isset($brochures->image_1) ? $brochures->image_1 : '' }}">
                                            
                                        </div>

                                        <div class="heading">
                                            {{$row->name}}
                                        </div>

                                        <div class="price">
                                            &pound;{{(isset($brochures->rate_pp) ? $brochures->rate_pp : '')}} pp / &pound;{{(isset($brochures->srs_pp) ? $brochures->srs_pp : '')}} SRS pp
                                        </div>

                                        <!-- <p class="large"> -->
                                            {!! isset($brochures) ? $brochures->textarea_1 : '' !!}
                                        <!-- </p> -->

                                            {!! isset($brochures) ? $brochures->textarea_2 : '' !!}
                                            {!! isset($brochures) ? $brochures->textarea_3 : '' !!}

                                        <div class="image">
                                            <img src="{{ isset($brochures->image_2) ? $brochures->image_2 : '' }}" />
                                            
                                        </div>

                                    </div>

                                    <div class="column">

                                        {!! isset($brochures) ? $brochures->textarea_4 : '' !!}


                                        <div class="image">
                                            <img src="{{ isset($brochures->image_3) ? $brochures->image_3 : '' }}" />
                                        </div>

                                        {!! isset($brochures) ? $brochures->textarea_5 : '' !!}

                                        <div class="rating">
                                            <?php
                                            if(isset($brochures->hotel_id) && !empty($brochures->hotel_id)){
                                                $brochureHotel = DB::table('hotels')->where('id', $brochures->hotel_id)->first();
                                            ?>
                                                <div class="label">{{$brochureHotel->name}}</div>
                                                <div class="stars">
                                                    <?php
                                                    if ( $brochureHotel->stars > 0 ){
                                                        for ($i = 0; $i < $brochureHotel->stars; $i++){
                                                            echo '<i class="fas fa-star orange"></i>';
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                            <?php } ?>
                                        </div>

                                       {!! isset($brochures) ? $brochures->textarea_6 : '' !!}

                                        <div class="sub_heading">
                                            What's Included
                                        </div>

                                        <ul class="inclusions_list">
                                            <?php
                                            $brochureInclusions = array();
                                            if(isset($brochures->inclusions) && !empty($brochures->inclusions)){
                                                $brochureInclusions = unserialize($brochures->inclusions);
                                            }
                                            if(!empty($brochureInclusions)){
                                                foreach ($brochureInclusions as $key => $value) {
                                                    ?>
                                                <li><i class="far fa-check-circle"></i>{{$value}}</li>
                                                <?php 
                                                }
                                            }
                                            ?>
                                        </ul>

                                        <ul class="hotel_details">

                                            <li>
                                                <i class="far fa-calendar-alt"></i>
                                                <?php
                                                if(isset($brochures->dates) && !empty($brochures->dates)){
                                                    $brochureDates = unserialize($brochures->dates);
                                                    foreach ($brochureDates as $key => $value) {
                                                        echo $value.'<br>';
                                                    }
                                                }else{
                                                    echo "Sat 10 December'22 - Thu 15 December'22 (5 nights)" ;
                                                    
                                                }

                                                ?>
                                            </li>

                                            <li>
                                                <i class="fas fa-utensils"></i>
                                                {{ isset($brochures) ? $brochures->breakfast : '' }}
                                            </li>

                                        </ul>

                                    </div>

                                </div>

                                <div class="footer1">
                                    <div class="line blue"></div>
                                    
                                    
                                    <div class="line blue"></div>
                                </div>

                            </div>

                            <div class="page_separator"></div>

                            <div class="page"></div>

                        </div>

                    </div>
                </div>


                <div class="container" id="datesTab" style="display: none;">
                    <h3>Dates & Rates</h3>
                    <div class="dates">
                        <div class="datesCont">
                                <h4>Available tour dates</h4>
                           <?php if(!empty($exp_dates)){
                           
                                            foreach($exp_dates as $date_row)
                                            { 
                                                $hotel_array = array();

                                                if(!empty($date_row['hotels'][0]))
                                                {
                                                    foreach($date_row['hotels'][0]  as $hrow)
                                                    {
                                                        $hotel_array[] =$hrow['name']; 
                                                    }
                                                    
                                                }
                                             ?>
                               
                                             
                                            <div class="dateItem">
                                                <div class="left">
                                                    <span class="up">
                                                       {{ date('D d M y', $date_row['date_from']) }} - {{ date('D d M y',$date_row['date_to']) }} ({{ $date_row['nights']}} nights)
                                                       
                                                    </span>
                                                    <span class="down">
                                                       
                                                        <!-- {{!empty($hotel_name->name)?$hotel_name->name:''}} -->
                                                         <?php echo implode(', ', $hotel_array); ?>
                                                    </span>
                                                </div>
                                                <?php
                                                 
                                                if(!empty($date_row['datesrates'])){
                                                    
                                                    if($date_row['datesrates']['currency'] == 1)
                                                    {

                                                        $rates =$date_row['datesrates']['rate'];
                                                        $srs =$date_row['datesrates']['single_srs'];
                                                        $currency = '£';
                                                       
                                                    }
                                                    elseif($date_row['datesrates']['currency'] == 2)
                                                    {
                                                        $rates = $date_row['datesrates']['rate_euro'];
                                                        $srs =$date_row['datesrates']['single_srs_euro'];
                                                         $currency = '€';
                                                    }
                                                    else
                                                    {
                                                       $rates =$date_row['datesrates']['rate'];
                                                        $srs =$date_row['datesrates']['single_srs'];
                                                        $currency = '£';
                                                    }
                                                    
                                                }
                                                ?>
                                                <div class="right">
                                                    <span class="up"><span class="curreny_sysbol">{{$currency}}</span>{{ $rates }}pp</span>
                                                    <span class="down"><span class="curreny_sysbol">{{$currency}}</span>{{ $srs }}ss pp</span>    
                                                </div>
                                             
                                                
                                            </div>
                                            <?php
                                       
                               }
                            ?>
                            <?php } else { ?>
                                <h4>Not available</h4>
                            <?php } ?>
                           

                            @if ($row->ExperienceDateAdditionalTexts->count() > 0)
                                @foreach ($row->ExperienceDateAdditionalTexts as $rec)
                                    <div class="">
                                        <div class="left">
                                            <h4 style="padding: 10px 0;     margin: 0;">{{ $rec->name }}</h4>
                                            <div class="excerpt" style="font-weight: 500;">{!! nl2br($rec->text) !!}</div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                     <h4 class="mt-3"><a class="add_booking " id="t_link" style="color:#FCA311;" href="javascript:void(0)">Terms and Conditions</a></h4>
                </div>

            </div>

            <script>
                $(document).ready(function(){
                    $(document).on('change', '.filesCls', function(e) {
                        var selectId = $(this).attr('data-id');
                        var files = e.target.files,
                            filesLength = files.length;
                        if(filesLength > 0){
                            $('.experienceImageStoreSaveBtn').trigger('click');
                        }
                    });
                    $(".orangeTabsContainer .tabsList li a").click(function(e){
                        e.preventDefault();
                        $(".orangeTabsContainer .tabsList li").removeClass("active");
                        $(this).parent().addClass("active");
                        $(".tabsContant > .container").fadeOut();
                        var dataTarget = $(this).data('target');
                        var targetTab = $('#'+dataTarget);
                        targetTab.fadeIn();

                        if(dataTarget == 'experiencesTab'){

                    {{--                            @foreach($row->ExperienceAttractions as $ea)--}}
                    {{--                                @if ($ea->attractionImages->count() > 0)--}}

                    {{--                                --}}

                    {{--                                @endif--}}
                    {{--                            @endforeach--}}
                        }
                    });
                });
            </script>
            <?php
            // pr($experiences); exit;
            ?>
         
            <div class="similarProperties">
                <div class="container">
                   
                    <h3>Other bowl clubs who bought this, also bought</h3>
                    <div class="thirdSwiperContainer">
                        <div class="swiper-container third-swiper">
                            <div class="swiper-wrapper">


                                @if(!empty($experiences))
                                @foreach ($experiences as $exp)
                                <div class="swiper-slide">
                                    <div class="item">
                                        <a href="{{ route('bowling.show', $exp['id']) }}">
                                            <div class="imageBox">
                                                <img src="{{ !empty($exp['experience_images']) ? $image_url.('storage/'.$exp['experience_images'][0]['file']) : asset('images/logo2x.png') }}" alt="">
                                                <span class="price">£{{$exp['rate']}}</span>
                                            </div>
                                            <h2>{{$exp['name']}}</h2>
                                            <div class="footerRow">
                                                <!-- <div class="left">
                                                    15 DAYS PACKAGE
                                                </div>
                                                <div class="right">
                                                    <div class="starsRow">
                                                        <i class="fas fa-star orange"></i>
                                                        <i class="fas fa-star orange"></i>
                                                        <i class="fas fa-star orange"></i>
                                                        <i class="fas fa-star orange"></i>
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                </div> -->
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                                @endif



                            </div>

                            <div class="swiper-button-next swiper-button-next3"></div>
                            <div class="swiper-button-prev swiper-button-prev3"></div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <div class="modal fade downloadBrochurePriceContent" id="brochurDownload{{ $row->id }}"  tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="">Add Prices and Contact Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p>Please enter the tour Sharing price pp and the Single price pp.</p>
                   <div class="row">
                        <div class="col-sm-6"><input type="text" id="rate_pp_new" class="form-control 678" name="step9[rate_pp]" value="{{(isset($brochures->rate_pp) ? $brochures->rate_pp : '')}}"placeholder="Sharing price pp"></div>
                        <div class="col-sm-6"><input type="text" id="srs_pp_new" class="form-control" name="step9[srs_pp]" value="{{(isset($brochures->srs_pp) ? $brochures->srs_pp : '')}}" placeholder="Single price pp"></div>
                        
                    </div>
                    <br/>
                    <p>Please enter your telephone number and email address to show on the Brochure.</p>
                     <div class="row">
                        <div class="col-sm-6"><input type="text" id="brochure_tel" class="form-control 456" name="brochure_tel" value="" placeholder="Telephone Number"></div>
                        <div class="col-sm-6"><input type="email" id="brochure_email" class="form-control" name="brochure_email" value="" placeholder="Email"></div>
                        
                    </div>
                  </div>
                  <div class="modal-footer">
                     <a class="btn btn-warning" href="#" style="background: orange;color: #fff;border-color: orange;font-weight: bold;" data-id="{{ $row->id }}"  id="downloadBrochureImage">Preview</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
<div class="modal fade bd-example-modal-lg" id="termModel" tabindex="-1" role="dialog" aria-labelledby="addFolderModalTitle" aria-hidden="true" style="overflow-y: auto;">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 1200px;">
        <div class="modal-content">
            <div class="" style="margin-bottom: 200px;">
        
            <div class="container">
                <div class="aboutContainer" >
                <a href="javascript:;" class="cta btn btn-primary" id="downloadPDFhc" style="width: auto;float: right;">
                        Print
                    </a>
                    <div id="tobeprinted">
                     @include('partials.booking.term-condition')
                    </div><!-- end print -->
            </div>

        </div>
    </div>
        </div>
        </div>
</div><!-- end model -->
<div class="modal fade bd-example-modal-lg" id="enquiryModel" tabindex="-1" role="dialog" aria-labelledby="addFolderModalTitle" aria-hidden="true" style="overflow-y: auto;">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 1000px;">
        <!-- <div class="modal-header">
            <h4>Enquiry Form</h4>
            <h2>{{ $row->name }}</h2>
        </div> -->
        <div class="modal-content">
            
            <div class="" style="margin-bottom: 200px;">
                <div class="container" style="margin-top: 10px;">
                    <span class="text-muted">Enquiry Form </span>
                    <h4 style="color: #32363A;font-size: 1.75rem;font-weight: bold;">{{$row->name}}</h4>
                    
                </div>
                <hr>
                 <form id="EnquiryForm" action="{{route('experience.store-enquiry')}}" method="post">
                   @csrf
                <div class="form-container">                  
                    <div class="div-container">                        
                            <!-- General Information -->
                            <div class="mb-4">
                                <div class="section-title">General Information</div>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-div">
                                            <div class="row g-3 date_div">
                                                <div class="col-md-12">
                                                    <input type="hidden" name="date_from" class="form-control dateChangeCls" id="date_from" placeholder="">
                                                    <input type="hidden" name="date_to" class="form-control dateChangeCls" id="date_to" placeholder=")">
                                                    <input type="hidden" readonly name="nights" class="form-control" id="nights" placeholder="">
                                                <label for="date" class="form-label">Date From *</label>
                                                <p><span class="date_error" style="color:#000000 !important;">Select Dates</span>   &nbsp;<i class="fa-solid fa-calendar" id="daterange" style="color: #50AADB;cursor: pointer;"></i> &nbsp; </p>
                                                <p><span class="date_range"></span></p>
                                                <!-- <input type="date" name="date_from" class="form-control dateChangeCls" id="date_from" placeholder=""> -->
                                                </div>
                                                <!-- <div class="col-md-6">
                                                        <label for="date" class="form-label">Date To</label>
                                                        <input type="date" name="date_to" class="form-control dateChangeCls" id="date_to" placeholder=")">
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="date" class="form-label">Nights</label>
                                                    <input type="text" readonly name="nights" class="form-control" id="nights" placeholder="">
                                                </div> -->
                                            </div>
                                            <div class="row mt-4">
                                                <div class="col-md-12">
                                                    <!-- <label class="form-label">Dates Flexible?</label> -->
                                                    <label class="radio_div">
                                                          <input type="checkbox" id="is_dates_flexible"  name="is_dates_flexible"  value="1"  class=" custom_chkbox tagchkbox notClickedCls "> <span class="notClickedCls ">Dates Flexible? </span>
                                                          <span class="checkmark notClickedCls"></span>
                                                          <input type="hidden" name="coach_cost" id="coach_cost" value="{{$bt_settings->cost}}">
                                                    </label>  
                                                                                                
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-div">
                                            <label for="hotel" class="form-label">Hotel</label>
                                            <select class="form-control" name="hotel" id="hotel">
                                                @if ($row->ExperienceHotels->count() > 0)
                                                    @foreach($row->ExperienceHotels as $hotel)
                                                    <option value="{{ $hotel->id }}">{{ $hotel->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row g-3 mt-3">
                                    <div class="col-md-6">
                                        <div class="form-div">
                                            <label class="form-label">Coach Hire</label>
                                            <label class="radio_div">
                                                  <input type="radio" id="coach_required_yes"  name="coach_required"  value="1"  class="coach_required custom_chkbox tagchkbox notClickedCls "> <span class="notClickedCls ">Coach required</span>
                                                  <span class="checkmark notClickedCls"></span>
                                                  <input type="hidden" name="coach_cost" id="coach_cost" value="{{$bt_settings->cost}}">
                                            </label>
                                            <label class="radio_div">
                                                  <input type="radio" name="coach_required"  value="0"  class="coach_required custom_chkbox tagchkbox notClickedCls "> <span class="notClickedCls ">No coach required</span>
                                                  <span class="checkmark notClickedCls"></span>
                                            </label>
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-div">
                                            <label class="form-label">Indoor or Outdoor Tour</label>
                                             @foreach ($experienceCategory as $key => $value)
                                               @if($value->name == 'Indoor' || $value->name == 'Outdoor')
                                                 <label class="radio_div" <?=!empty($value->selected)?'':'style="pointer-events: none;color: gray;"' ?>>
                                                  <input type="radio"  <?=!empty($value->selected)?'checked':'disabled' ?> name="category_id"  value="{{$value->id}}"  class="custom_chkbox tagchkbox notClickedCls "> <span class="notClickedCls ">{{$value->name}}</span>
                                                  <span class="checkmark notClickedCls"></span>
                                                </label>
                                                @endif
                                            @endforeach
                                            <!-- 
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="category_id" value="12" id="indoorTour">
                                                <label class="form-check-label" for="indoorTour">Indoor</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="category_id" value="13" id="outdoorTour">
                                                <label class="form-check-label" for="outdoorTour">Outdoor</label>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>

                                <div class="row g-3 mt-3">
                                    <div class="col-md-6">
                                        <div class="form-div">
                                            <label for="groupNumber" class="form-label">Expected group numbers *</label>
                                            <select class="form-control" name="group_number" id="groupNumber" required>
                                                <option selected value="">Select number</option>
                                                <option value="10">10</option>
                                                <option value="20">20</option>
                                                <option value="30">30</option>
                                                <option value="40">40</option>
                                                <option value="50">50+</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-div">
                                            <label class="form-label">No. of Fixtures</label><br>
                                            <div class="btn-group" role="group" aria-label="Fixtures">
                                                <button type="button" data-id="1" class="btn btn-outline-primary">1</button>
                                                <button type="button" data-id="2" class="btn btn-outline-primary">2</button>
                                                <button type="button" class="btn btn-outline-primary" data-id="3" >3</button>
                                                <button type="button" class="btn btn-outline-primary" data-id="4">4</button>
                                                <button type="button" class="btn btn-outline-primary" data-id="5">5</button>
                                                <button type="button" class="btn btn-outline-primary" data-id="6">6</button>
                                                <button type="button" class="btn btn-outline-primary" data-id="7">7</button>
                                                <button type="button" class="btn btn-outline-primary" data-id="8" style="padding: 0.59rem 0.67rem;">8+</button>
                                                <input type="hidden" name="fixture" id="fixture" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Extras -->
                            <div class="mb-4">
                                <div class="section-title">Extras</div>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-div">
                                             <label class="form-label">Attractions</label>
                                            
                                             @if ($row->ExperienceAttractions->count() > 0)
                                                    @foreach($row->ExperienceHotels as $hotel)
                                                    <label class="radio_div">
                                                          <input type="checkbox" data-cost="{{$ea->estimated_cost_pp}}"  name="attraction[]"  value="{{ $ea->id }}"  class="attraction custom_chkbox tagchkbox notClickedCls "> <span class="notClickedCls ">{{ $ea->name }} <!-- (£{{$ea->estimated_cost_pp}} pp) --></span>
                                                          <span class="checkmark notClickedCls"></span>
                                                    </label>
                                                    
                                                    @endforeach
                                                @endif
                                            
                                            
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-div">
                                            <label class="form-label">Extras</label>
                                            @if(!empty($bt_extras[0]))      
                                                @foreach($bt_extras as $k => $rulerow)                                         
                                                    <label class="radio_div">
                                                          <input data-cost="{{$rulerow->cost}}" type="checkbox" name="extras[]" value="{{$rulerow->id}}" class="extras custom_chkbox tagchkbox notClickedCls "> <span class="notClickedCls ">{{$rulerow->name}} <!-- (£{{$rulerow->cost}} pp) --></span>
                                                          <span class="checkmark notClickedCls"></span>
                                                    </label>
                                                @endforeach
                                            @endif
                                            
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Contact Information -->
                            <div class="mb-4">
                                <div class="section-title">Contact Information</div>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-div">
                                        <label for="contactName" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="contactName" name="contact_name" placeholder="John Johnson">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-div">
                                            <label for="bowlsClub" class="form-label">Bowls Club</label>
                                            <input type="text" class="form-control" name="bowls_club"  id="bowlsClub" placeholder="Grantham Bowls Club">
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3 mt-3">
                                    <div class="col-md-6">
                                        <div class="form-div">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" name="email" id="email" placeholder="john.johnson@bowls.co.uk">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-div">
                                            <label for="contactNumber" class="form-label">Contact Number</label>
                                            <input type="tel" class="form-control" name="contact_number" id="contactNumber" placeholder="01234567890">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <label>Additional note :</label>
                                        <textarea class="form-control" name="addtional_note" id="addtional_note" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
                            <?php /*
                            <div class="mb-4">
                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <div class="est_div">
                                           <!-- <span style="color: #ffffff;font-size: 11px;">Estimated Cost</span>
                                           <div id="est_cost" style="color: #ffffff;font-size: 22px;font-weight: 500;">&pound;349.00 pp</div>
                                           <br> -->
                                           <span style="color: #ffffff;font-size: 11px;">Estimated per person cost</span>
                                           <div id="per_est_cost"  style="color: #ffffff;font-size: 22px;font-weight: 500;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           */ ?>
                    </div>

                </div>
                 <!-- Submit Button -->
                 <div class="div-container">
                    <input type="hidden" name="exp_id" value="{{$row->id}}">
                    <input type="hidden" name="enquiry_rate" id="enquiry_rate" value="{{$row->enquiry_rate}}">
                    <input type="hidden" name="percentage_rate" id="percentage_rate" value="{{$bt_settings->percentage_rate}}">
                    <input type="hidden" name="fixture_rate" id="fixture_rate" value="{{$bt_settings->fixture_rate}}">
                    <input type="hidden" name="final_cost" id="final_cost" value="">
                    <p class="validation_error mb-2" style="margin-top: 10px;text-align: center;color: red;">Please complete all required fields.</p>
                    
                        <button type="submit" id="EnquiryButton" class="btn btn-primary" style="
                    width: 100%;
                    font-weight: 600;
                    font-size: 20px;
                    padding: 0.80rem 1rem;
                ">Enquire Now</button>
                <!-- <p style="margin-top: 10px;text-align: center;color: #32363A;">This is a filter text, this text can be used to add some terms and conditions</p> -->
                </div>

                </form>
            </div>
        </div>
        </div>
        </div>
</div><!-- end model -->
<div class="modal fade bd-example-modal-lg" id="downloadBrochureModal" tabindex="-1" role="dialog" aria-labelledby="addFolderModalTitle" aria-hidden="true" style="overflow-y: auto;">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 1130px;">
        <div class="modal-content downloadBrochureAppendCls">

        </div>
    </div>
</div>
<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <!-- <h4 class="modal-title" id="myModalLabel">Image preview</h4> -->
      </div>
      <div class="modal-body">
        <img src="" id="imagepreview" style="width: 600px; height: 400px;" >
      </div>
     <!--  <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div> -->
    </div>
  </div>
</div>
<div id="image-viewer">
  <span class="close">&times;</span>
  <img class="modal-content" id="full-image">
</div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.2/jquery.matchHeight-min.js"></script>
     <script>
        var base_url = "{{URL::to('/')}}";
    </script>
    <script>
        $('.validation_error').hide();
        $('#EnquiryButton').click(function(){
            if($('#date_from').val() == '' || $('#date_to').val() == '')
                  {
                    var d = '';
                    $('.date_error').show();
                    $('.date_error').css('color', 'red');
                  }
                  else
                  {
                    var d = '1';
                    $('.date_error').show();
                    $('.date_error').css('color', '#000000');
                  }
            /*var d = $('#is_dates_flexible').val();
            if (!$('#is_dates_flexible').is(':checked')) {
                 var d = '1';
                 $('.date_error').hide();
               
              } else {
                if($('#date_from').val() == '' || $('#date_to').val() == '')
                  {
                    var d = '';
                    $('.date_error').show();
                  }
                  else
                  {
                    var d = '1';
                    $('.date_error').hide();
                  }
              }*/
              
            var groupNumber = $('#groupNumber').val();
            if(groupNumber == '')
            {
                $('#groupNumber').addClass('error');
            }
            else
            {
                $('#groupNumber').removeClass('error');
            }
            if(d != '' && groupNumber != '')
            {
                //$('#EnquiryForm').submit();
                return true;
            }
            else
            {
                $('.validation_error').show();
                return false;
            }
        });
</script>
    <script>
        $(document).on('click', '#downloadBrochureImage', function(e) {
        e.preventDefault();
        var exp_id = $(this).attr('data-id');
        var rate_pp_new = $(this).parent().parent().find('#rate_pp_new').val();
        var srs_pp_new = $(this).parent().parent().find('#srs_pp_new').val();
        var brochure_tel = $(this).parent().parent().find('#brochure_tel').val();
        var brochure_email = $(this).parent().parent().find('#brochure_email').val();
        
        console.log('rate_pp_new'+rate_pp_new);
        console.log('srs_pp_new'+srs_pp_new);
        console.log('brochure_tel'+brochure_tel);
        console.log('brochure_email'+brochure_email);
        $('.loader').show();    
        $.ajax({
            url: base_url+'/download_brochure_image',
            type: 'POST',
            data: {'_token': "{{ csrf_token() }}",'exp_id':exp_id, 'rate_pp_new':rate_pp_new, 'srs_pp_new':srs_pp_new, 'brochure_tel':brochure_tel, 'brochure_email':brochure_email},
            success: function(data) {
                
                $('.downloadBrochureAppendCls').html(data.response);
                $('.loader').hide();  
                $('.downloadBrochurePriceContent').modal('hide');
                $('#downloadBrochureModal').modal('show');
            },
            error: function(e) {
            }
        });   
    });
        $(document).ready(function(){
             calculate_score();
            // $(".pop").click(function(){
            //      var id = $(this).data('id');
            //   $("#full-image").attr("src", $('.imageSource_'+id).attr('src'));
            //   $('#image-viewer').show();
            // });

            // $("#image-viewer .close").click(function(){
            //   $('#image-viewer').hide();
            // });

           /* $(".pop").on("click", function() {
                var id = $(this).data('id');
               $('#imagepreview').attr('src', $('.imageSource_'+id).attr('src')); // here asign the image to the modal when the user click the enlarge link
               $('#imagemodal').modal('show'); // imagemodal is the id attribute assigned to the bootstrap modal, then i use the show function

            });*/
            $("#daysList").stick_in_parent();

            var homeSwiper = new Swiper('.home-swiper-container', {
                effect: 'fade',
                centeredSlides: true,
                autoplay: {
                    delay: 5500,
                    disableOnInteraction: false,
                },
                spaceBetween: 30,
                loop: true,
                slidesPerView: 1
            });

            var secondSwiper = new Swiper('.second-swiper', {
                navigation: {
                    nextEl: '.swiper-button-next1',
                    prevEl: '.swiper-button-prev1',
                },
            });

            var thirdSwiper = new Swiper('.third-swiper', {
                slidesPerView: 1,
                spaceBetween: 10,
                navigation: {
                    nextEl: '.swiper-button-next3',
                    prevEl: '.swiper-button-prev3',
                },
                breakpoints: {
                    640: {
                        slidesPerView: 1,
                        spaceBetween: 15,
                    },
                    768: {
                        slidesPerView: 3,
                        spaceBetween: 30,
                    },
                    1024: {
                        slidesPerView: 5,
                        spaceBetween: 30,
                    },
                }
            });
            <?php if($date_available == 'yes'){ ?>
                $('.dateSelect').select2({
                    minimumResultsForSearch: -1,
                    placeholder: 'No date selected'
                });
            <?php }else{ ?>
                $('.dateSelect').select2({
                    minimumResultsForSearch: -1,
                    placeholder: 'Dates on Request'
                });
            <?php } ?>
            $('.collsSelect').select2({
                minimumResultsForSearch: -1,
                placeholder: 'No club selected'
            });
        });

        // MATCH HEIGHT

        $(function() {
            $('.infoPriceWrapper .title').matchHeight();
            <?php 
            if(!empty($map)){
                ?>

                $('#display_map').click();
                <?php
            }
            ?>
            
            });
          $('#enquiry_link').click(function(e){
           
                $('#enquiryModel').modal('show');
            });
          $('.btn-outline-primary').click(function(){
            var id = $(this).attr('data-id');
            $('.btn-outline-primary').removeClass('active');
            $(this).addClass('active');
            $('#fixture').val(id);
            calculate_score();
          })
          $('#daterange').daterangepicker({
            startDate: '01/01/2025',
            endDate: '01/15/2025',
            locale: {
                format: 'MM/DD/YYYY'
            }
        },
          function (start, end) {
             const startDate = moment(start);
              const endDate = moment(end);

              // Calculate the difference in days
              const dateDifference = endDate.diff(startDate, 'days');
            var dd = start.format("DD-MMM-YY'")+' - '+end.format("DD-MMM-YY'")+' ( '+dateDifference+' nights)';
            $('.date_range').html(dd);
             $('.date_error').css('color', '#000000');
            $('#date_from').val(start.format("YYYY-MM-DD'"))
            $('#date_to').val(end.format("YYYY-MM-DD'"))
            $('#nights').val(dateDifference)
            //$('.date_error').hide();
             calculate_score()

            
          });
          $('#t_link').click(function(e){
            $('#termModel').modal('show');
        });
          $('body').on('blur', '.dateChangeCls', function() {
                var ids = $(this).attr('data-id');
                
                var fromDate = $('#date_from').val();
                var toDate = $('#date_to').val();
                // console.log(fromDate);
                // console.log(toDate);

                // from = moment(fromDate, 'DD/MM/YYYY'); 
                // to = moment(toDate, 'DD/MM/YYYY'); 

                // console.log(from);
                // console.log(to);

                const date1 = new Date(fromDate);
                const date2 = new Date(toDate);
                const diffTime = Math.abs(date2 - date1);
                const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)); 
                if(diffDays > 0){
                    $('#nights').val(diffDays);
                    $('.date_div').trigger('click');
                    
                }else{
                    var diffDays1 = '0';
                    $('#nights').val(diffDays1);
                    $('.date_div').trigger('click');
                }
                calculate_score();
            });
          $('.attraction').click(function()
          {
            calculate_score();
          });
          $('.extras').click(function()
          {
            calculate_score();
          });
          $('.coach_required').click(function()
          {
            calculate_score();
          });
          $('#groupNumber').change(function()
          {
            calculate_score();
          });
          function calculate_score()
          {
            var base_price = $('#enquiry_rate').val();
            var percentage_rate = $('#percentage_rate').val();
            var fixture_rate = $('#fixture_rate').val();
            
            var fixture = $('#fixture').val();
            var nights = $('#nights').val();
            var groupNumber = $('#groupNumber').val();
            if(nights == '' || nights == '0' || nights == 'NaN')
            {
                nights = 0;
            }
            console.log('groupNumber f'+groupNumber)
            console.log('fixture_rate'+fixture_rate)
            if(groupNumber == 'Select number' || groupNumber == 'NaN')
            {
                groupNumber = 1;
            }
            if(base_price == '' || base_price == 'NaN')
            {
                base_price = 0;
            }
            if(fixture == '' || fixture == 'NaN')
            {
                fixture = 0;
            }
            var fixture_amount = fixture * parseFloat(fixture_rate);
            var attraction = 0;
            var extra = 0;
            var coach_required_yes = 0;
            $('.attraction:checked').each(function() {
                // Get the value of the checked checkbox
                var cost = $(this).attr('data-cost');
                attraction = parseFloat(attraction) + parseFloat(cost);
                
            });
            attraction = attraction * parseInt(groupNumber);
            $('.extras:checked').each(function() {
                // Get the value of the checked checkbox
                var cost1 = $(this).attr('data-cost');
                
                extra = parseFloat(extra) + parseFloat(cost1);
                
            });
            extra = extra * parseInt(groupNumber);
            $('#coach_required_yes:checked').each(function() {
                // Get the value of the checked checkbox
                var coach_required_yes = $('#coach_cost').val();
                
                
            });
            if ($('#coach_required_yes').is(':checked')) {
                var coach_required_yes = $('#coach_cost').val();
            } 
            console.log('attraction'+attraction)
            console.log('percentage_rate'+percentage_rate)
            console.log('extra'+extra)
            console.log('base_price'+base_price)
            console.log('nights'+nights)
            console.log('groupNumber'+groupNumber)
            console.log('fixture'+fixture)
            
            var baseCost = (parseFloat(base_price) * parseInt(groupNumber));
            var baseCost = (parseFloat(baseCost) + fixture_amount);
            console.log('baseCost'+baseCost)
            // Total calculation
            var totalCost = (parseFloat(attraction) + parseFloat(extra) + parseFloat(coach_required_yes));
            console.log('totalCost'+totalCost)
            var estimate_cost =  baseCost + totalCost;
            var percentage_rate_amount = (parseFloat(estimate_cost)*parseInt(percentage_rate))/100;
            console.log('percentage_rate_amount'+percentage_rate_amount)
            var final_cost = (parseFloat(estimate_cost) + parseFloat(percentage_rate_amount)) * parseInt(nights);
            final_cost = final_cost.toFixed(2);
            //alert('final_cost'+final_cost)
            var pp_cost = (final_cost/groupNumber);
            
            pp_cost = pp_cost.toFixed(2);
            console.log('pp_cost'+pp_cost)
            if(pp_cost == 'NaN')
            {
                pp_cost = 0;
            }
            
           $('#est_cost').html('£'+final_cost+' pp');
           $('#per_est_cost').html('£'+pp_cost+' pp');
           $('#final_cost').val(final_cost);
          }
            <?php if(Session::has('success')){ ?> 
           
                toastSuccess('Enquiry added successfully.');


            <?php Session::forget('success'); } ?>
    </script>

@endsection
