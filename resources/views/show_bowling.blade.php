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
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

  <!-- Flatpickr -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/plugins/monthSelect/style.css">
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/plugins/monthSelect/index.js"></script>
  <style>
        /* Month grid styling */
        .fixturebtn.active
        {
            border-color: #1C92D0;
            background-color: #1C92D0;
            color: #fff;
        }
        .price-option.active {
            border-color: #1C92D0;
            background-color: #f1f8ff;
        }
        .flatpickr-monthSelect-month {
            border-radius: 8px;
            padding: 8px 14px !important;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.2s;
            width: 100% !important;
        }

    .flatpickr-calendar {
        background: transparent;
        opacity: 0;
        display: none;
        text-align: center;
        visibility: hidden;
        padding: 0;
        -webkit-animation: none;
        animation: none;
        direction: ltr;
        border: 0;
        font-size: 14px;
        line-height: 24px;
        border-radius: 5px;
        position: absolute;
        width: 297.875px !important;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        -ms-touch-action: manipulation;
        touch-action: manipulation;
        background: #fff;
        -webkit-box-shadow: 1px 0 0 #e6e6e6, -1px 0 0 #e6e6e6, 0 1px 0 #e6e6e6, 0 -1px 0 #e6e6e6, 0 3px 13px rgba(0, 0, 0, 0.08);
        box-shadow: 1px 0 0 #e6e6e6, -1px 0 0 #e6e6e6, 0 1px 0 #e6e6e6, 0 -1px 0 #e6e6e6, 0 3px 13px rgba(0, 0, 0, 0.08);
    }

    .flatpickr-monthSelect-months {
      display: grid !important;
      grid-template-columns: repeat(4, 1fr);
      gap: 8px;
      text-align: center;
      padding: 10px;
    }

    .flatpickr-monthSelect-month {
      border-radius: 8px;
      padding: 8px 0;
      cursor: pointer;
      font-weight: 500;
      transition: all 0.2s;
    }

    .flatpickr-monthSelect-month:hover {
      background-color: #e5f0ff;
    }

    .flatpickr-monthSelect-month.selected {
      background-color: #1C92D0;
      color: white;
    }

    /* Hide extra day grid from monthSelect plugin */
    #estimate-calendar .flatpickr-days,
    #estimate-calendar .flatpickr-weekdays,
    #estimate-calendar .flatpickr-innerContainer > .flatpickr-rContainer .flatpickr-days {
      display: none !important;
      height: 0 !important;
      overflow: hidden !important;
    }

    .flatpickr-calendar {
      border: none !important;
      box-shadow: none !important;
      width: 297.875px !important;
        }

        .popup {
          display: none;
          position: absolute;
        }

        /* Hide specific by default */
        #specific-calendar {
          display: none;
        }
</style>
  <style>
    .input-wrapper {
      position: relative;
    }
    .calendar-icon {
      position: absolute;
      top: 50%;
      right: 12px;
      transform: translateY(-50%);
      color: #6b7280;
      cursor: pointer;
    }
    .popup {
      position: absolute;
      /*top: 110%;*/
      width: 40%;
      left: 0;
      right: 0;
      z-index: 50;
      background: white;
      border: 1px solid #d1d5db;
      border-radius: 0.75rem;
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
      padding: 1rem;
      display: none;
    }
  </style>
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
            /*margin-top: 20px;
            margin-bottom: 10px;*/
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
                            $bt_user = getBtUserValue();
                            $is_bt_user = !empty(getBtUserValue())?1:0;
                            $bt_user_data = getUserData();
                          
                            $date_available = '';
                            ?>
                            @if(empty($bt_user_data))
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
                                             <button id="enquiry_link_new" type="button" ><!-- <i class="fas fa-cart-arrow-down"></i> --> Enquire</button> 
                                            
                                            <!-- <button type="button" id="enquiry_link" class="btn">
                                            Enquire
                                            </button> -->
                                        

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
                                   <input type="hidden" name="created_by" value="{{isset($bt_user)?$bt_user:''}}">
                                   <input type="hidden" name="club_name" id="club_name" value="{{!empty($collaborators[0]['name'])?$collaborators[0]['name']:''}}">
                                   <?php if(!empty($bt_user_data) && $bt_user_data['is_bt_admin'] == 1) { ?> 
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
                                    <?php } ?>
                                    <?php if(!empty($bt_user_data) && $bt_user_data['is_bt_collaborator'] == 1) { ?> 
                                        <input type="hidden" name="collaborator_id" value="{{$bt_user_data['id']}}">
                                        <?php } ?>
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
                                                                             window.location.href = '{{ route('show-cart') }}?bt_tour={{$bt_user}}';
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
                                                    <input type="hidden" name="date_from1" autocomplete="off" class="form-control dateChangeCls" id="date_from" placeholder="">
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
                                            <select class="form-control" name="hotelc" id="hotel">
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
                                        <label for="contactName" class="form-label">Name *</label>
                                        <input type="text" class="form-control" id="contactName1" required name="contact_name" placeholder="John Johnson">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-div">
                                            <label for="bowlsClub" class="form-label">Bowls Club *</label>
                                            <input type="text" class="form-control" name="bowls_club"  required id="bowlsClub1" placeholder="Grantham Bowls Club">
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3 mt-3">
                                    <div class="col-md-6">
                                        <div class="form-div">
                                            <label for="email" class="form-label">Email *</label>
                                            <input type="email" class="form-control" name="email" id="email1" required placeholder="john.johnson@bowls.co.uk">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-div">
                                            <label for="contactNumber" class="form-label">Contact Number</label>
                                            <input type="tel" class="form-control" name="contact_number" id="contactNumber1" required placeholder="01234567890">
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
                    <input type="hidden" name="final_cost" id="final_cost1" value="">
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
<style>
.price-option {
  border: 1px solid #ddd;
  border-radius: 8px;
  padding: 15px;
  text-align: center;
  cursor: pointer;
  transition: all 0.2s;
}
.btn-check:checked + .price-option {
  border-color: #1C92D0;
  background-color: #e9f3ff;
  box-shadow: 0 0 0 2px rgba(13,110,253,0.25);
}
.price-option:hover {
  border-color: #1C92D0;
  background-color: #f1f8ff;
}
.fw-bold {
    font-weight: bold;
}
.fixturebtn{
    font-weight: bolder;font-size: 16px;width: 40px;height: 40px;border: 1px solid #ddd;
}
.btn-check:checked + .fixturebtn {
  border-color: #1C92D0;
  background-color: #1C92D0;
  color:#fff;
}
.fixturebtn:hover {
  border-color: #1C92D0;
  background-color: #1C92D0;
  color:#fff;
}
#enqModal .form-label{
    color: #444;
  font-size: 14px;
}
/*.attraction-card {
  position: relative;
  border: 2px solid #fff;
  border-radius: 12px;
  text-align: center;
  transition: all 0.25s ease;
  cursor: pointer;
  background-color: #fff;
  display: flex;
  align-items: center;
  justify-content: center;
  height: 230px; /* ensures all cards are the same height */
}

.attraction-card:hover {
  border-color: #1C92D0;
}

.btn-check:checked + .attraction-card {
  border-color: #1C92D0;
  box-shadow: 0 0 0 3px rgba(28, 146, 208, 0.25);
}

.btn-check:checked + .attraction-card::after {
  content: "✓";
  position: absolute;
  top: 10px;
  right: 10px;
  background-color: #1C92D0;
  color: #fff;
  font-weight: bold;
  border-radius: 50%;
  width: 22px;
  height: 22px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 14px;
}

.no-image {
  border: 2px dashed #ddd;
  border-radius: 10px;
  width: 100%;
  height: 100%;
  background-color: #fafafa;
  display: flex;
  align-items: center;
  justify-content: center;
}*/

img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  border-radius: inherit;
}

</style>
<style>
  /* keep inputs accessible but visually hidden so change events fire reliably */
  .visually-hidden-input {
    position: absolute !important;
    width: 1px !important;
    height: 1px !important;
    padding: 0 !important;
    margin: -1px !important;
    overflow: hidden !important;
    clip: rect(0 0 0 0) !important;
    white-space: nowrap !important;
    border: 0 !important;
  }

  /* make labels look clickable */
  .price-option, .fixturebtn {
    cursor: pointer;
  }
</style>

<style>
    /* Container layout inside modal */
        .enquiry-container {
          display: flex;
          align-items: flex-start;
          justify-content: space-between;
          gap: 30px;
          position: relative;
        }

        /* Left column */
        .enquiry-left {
            flex: 1 1 65%;
            display: flex;
            flex-direction: column;
            gap: 20px;
            background-color: white;
            border-radius: 5px;
        }

        .card-section {
          /*background: #fff;*/
          border-radius: 10px;
          padding: 20px;
          /*box-shadow: 0 2px 6px rgba(0,0,0,0.05);*/
        }

        .section-title {
          font-weight: 600;
          margin-bottom: 15px;
        }

        /* Form elements */
        .form-group {
          margin-bottom: 15px;
        }

        .form-group label {
          display: block;
          font-size: 14px;
          color: #555;
          margin-bottom: 6px;
        }

        .form-control {
          border-radius: 6px;
          border: 1px solid #ccc;
          padding: 8px;
        }

        /* Table styling */
        .tour-table {
          width: 100%;
          border-collapse: collapse;
          font-family: "Segoe UI", sans-serif;
        }

        .tour-table th,
        .tour-table td {
          border: 1px solid #e0e0e0;
          padding: 12px 15px;
          text-align: center;
          vertical-align: middle;
        }

        .tour-table th {
          background: #333;
          color: #fff;
          font-weight: 600;
        }

        .tour-table td small {
          color: #888;
        }

        .fixture-control {
          display: inline-flex;
          align-items: center;
          justify-content: center;
          background: #f8f9fa;
          border: 1px solid #ddd;
          border-radius: 6px;
          overflow: hidden;
        }

        .fixture-control button {
          background: #1C92D0;
          color: #fff;
          border: none;
          width: 28px;
          height: 28px;
          line-height: 1;
          cursor: pointer;
          font-size: 14px;
          transition: 0.2s;
        }
        .fixture-control button.disabled-btn {
          background: #d6d6d6 !important; /* Grey */
          cursor: not-allowed;
          color: #9e9e9e;
        }
        .fixture-control button:hover {
          background: #0056b3;
        }

        .fixture-control .fixture-count {
          width: 32px;
          text-align: center;
          font-weight: 600;
          color: #333;
          background: #fff;
          border-left: 1px solid #ddd;
          border-right: 1px solid #ddd;
          font-size: 14px;
        }

        .tour-table input[type="radio"] {
          width: 18px;
          height: 18px;
          accent-color: #007bff;
          pointer-events: none;
        }

        .tour-table tr.selected {
          outline: 2px solid #007bff;
          background: #f0f8ff;
        }


        /* Right column summary */
        .enquiry-right {
          flex: 0 0 32%;
          position: relative;
          min-width: 280px;
          position: sticky;
          top: 20px; /* Distance from top of viewport */
        }
        .summery{
            background-color: white !important;
            border-radius: 5px;
        }
        .summary-card {
          background: #fff;
          border-radius: 10px;
          padding: 20px 15px;
          box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
          
        }

        .summary-card h5 {
          font-weight: 600;
        }

        .summary-card .section-title {
          font-weight: 600;
          font-size: 1.1rem;
          margin-bottom: 15px;
        }

        .summary-card ul li {
          margin-bottom: 6px;
          font-size: 0.95rem;
          color: #333;
        }

        .summary-total {
          background-color: #66b9e9; /* Light blue like in screenshot */
          color: #fff;
          border-radius: 10px;
          padding: 15px 20px;
          text-align: left;
          margin-bottom: 20px;
        }

        .summary-total small {
          display: block;
          font-size: 12px;
          color: #e9f6ff; /* slightly lighter for label */
          margin-bottom: 5px;
        }

        .summary-total h3 {
          font-size: 20px;
          font-weight: 600;
          margin: 0;
          color: #fff; /* ensure text is white */
        }

        /* Responsive */
        @media (max-width: 992px) {
          .enquiry-container {
            flex-direction: column;
          }

          .enquiry-right {
            flex: 1 1 100%;
            position: static;
            margin-top: 20px;
          }

          .summary-card {
            position: static;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
          }
        }

        .btn-warning {
          background-color: #ffc107 !important;
          color: #000;
          border: none;
          border-radius: 8px;
          font-size: 16px;
          transition: background 0.3s;
        }

        .btn-warning:hover {
          background-color: #ffb000 !important;
        }
        /* --- Attractions Section --- */
       /* Attractions Grid */
        /* Attractions Section */
        .section-title {
            font-weight: 600;
            font-size: 16px;
            margin-bottom: 12px;
            border-bottom: 1px solid #eee;
            padding: 10px;
        }

        .attractions-grid {
          display: grid;
          grid-template-columns: repeat(3, 1fr);
          gap: 0px;
        }

        /* Base card */
        .attraction-card {
          position: relative;
          /*border: 2px solid #e0e0e0;*/
          border-radius: 10px;
          background: #fff;
          cursor: pointer;
          transition: all 0.3s ease;
          overflow: hidden;
          text-align: center;
        }

        .attraction-card:hover {
          border-color: #007bff;
        }

        /* Active state */
        .attraction-card.active {
          border-color: #007bff;
        }

        /* Inner content */
        .card-inner {
          display: flex;
          flex-direction: column;
          align-items: center;
          padding: 5px;
        }

        /* Image box */
        .card-image {
          width: 100%;
          height: 175px;
          border-radius: 8px;
          overflow: hidden;
          position: relative;
          background: #f6f7fa;
          display: flex;
          align-items: center;
          justify-content: center;
        }

        .card-image img {
          width: 100%;
          height: 100%;
          object-fit: cover;
        }

        /* "No attractions" placeholder */
        .no-image span {
          color: #999;
          font-size: 13px;
          font-weight: 500;
        }

        /* Blue corner tick */
        .corner-tick {
          position: absolute;
          top: 0;
          right: 0;
          width: 0;
          height: 0;
          border-top: 28px solid #007bff;
          border-left: 28px solid transparent;
          display: none;
        }

        .corner-tick::after {
          content: '✓';
          color: #fff;
          position: absolute;
          top: -24px;
          right: 3px;
          font-size: 12px;
          font-weight: bold;
        }

        /* Show tick when active */
        .attraction-card.active .corner-tick {
          display: block;
        }
        .attraction-card.active img {
          border: 2px solid #007bff;
        }
        /* Text content */
        .card-body {
          text-align: left;
          margin-top: 10px;
          padding: 0px !important;
        }

        .card-title {
          font-size: 13px;
          color: #333;
          font-weight: 600;
          margin: 0;
        }

        .card-price {
          font-size: 12px;
          color: #666;
          margin-top: 4px;
        }
        .error-text {
            color: red;
            font-size: 13px;
            margin-top: 4px;
            display: block;
        }
        /* Responsive */
        @media (max-width: 768px) {
          .attractions-grid {
            grid-template-columns: repeat(2, 1fr);
          }
        }

        @media (max-width: 500px) {
          .attractions-grid {
            grid-template-columns: 1fr;
          }
        }


        /* Responsive layout */
        @media (max-width: 992px) {
          .enquiry-container {
            flex-direction: column;
          }
           .modal-lg {
            max-width: 925px !important; }
        }


</style>
<div class="modal fade" id="enqModal" tabindex="-1" aria-labelledby="enqModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-body px-5 py-4">
            <span class="text-muted">Enquiry Form </span>
            <h4 style="color: #32363A;font-size: 1.75rem;font-weight: bold;">{{$row->name}}</h4>
            
        </div>
        <div class="modal-body p-5" style="color: #000;background: #F3F4F5;">
            <form id="EnquiryForm" action="{{route('experience.store-enquiry')}}" method="post"  style="border-radius: 10px;">
                   @csrf
                <div class="enquiry-container">
                  <!-- LEFT: General Information + Tour Length -->
                  <div class="enquiry-left">
                    <div class="page1" style="padding: 10px;">
                        <h4 class="section-title">General Information</h4>
                        
                        @if ($row->ExperienceHotels->count() > 0)
                            @foreach($row->ExperienceHotels as $k => $hotel)
                            <div class="hotelDiv hotal_{{$k}}" style="<?=($k !=0)?'display:none;':''?>" >
                                <div class="form-group">
                                        <label>Select a hotel</label>
                                        <select name="hotel[]" class="form-control select-hotel">
                                            <option value="">Select a hotel</option>
                                             @if ($row->ExperienceHotels->count() > 0)
                                                     @foreach($row->ExperienceHotels as $k1 => $hotel1)
                                                        <option data-cost="{{$hotel1->estimated_cost}}" value="{{ $hotel1->id }}">{{ $hotel1->name }}</option>
                                                    @endforeach
                                                @endif
                                        </select>
                                        <input type="hidden" class="form-control hotel_rate" readonly name="hotel_rate[]" value="">   
                                        <input type="hidden" class="fixture_cnt fixtures_{{$k}}" name="fixtures[]" value="" >
                                </div>
                                <div class="card-section">
                                  <h4 class="section-title">Tour Length</h4>
                                  <table class="table tour-table" id="nightsRow">
                                      <thead>
                                        <tr>
                                          <th>Tour Length</th>
                                          <th>No. of Fixtures</th>
                                          <th>Estimated Cost</th>
                                          <th>Select</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr data-nights="3" data-days="4" class="price-option">
                                          <td>3 nights<br><small>4 days</small></td>
                                          <td>
                                            <div class="fixture-control">
                                              <button type="button" class="btn-down">▼</button>
                                              <span class="fixture-count"></span>
                                              <button type="button" class="btn-up">▲</button>
                                            </div>
                                          </td>
                                          <td>£<span class="profit_margin">0</span></td>
                                          <td><input type="radio" class="nights" name="nights_{{$k}}" value="3" checked></td>
                                        </tr>
                                        <tr data-nights="4" data-days="5" class="price-option">
                                          <td>4 nights<br><small>5 days</small></td>
                                          <td>
                                            <div class="fixture-control">
                                              <button type="button" class="btn-down">▼</button>
                                              <span class="fixture-count"></span>
                                              <button type="button" class="btn-up">▲</button>
                                            </div>
                                          </td>
                                          <td>£<span class="profit_margin">0</span></td>
                                          <td><input type="radio" class="nights" name="nights_{{$k}}" value="4"></td>
                                        </tr>
                                        <tr data-nights="5" data-days="6" class="price-option">
                                          <td>5 nights<br><small>6 days</small></td>
                                          <td>
                                            <div class="fixture-control">
                                              <button type="button" class="btn-down">▼</button>
                                              <span class="fixture-count"></span>
                                              <button type="button" class="btn-up">▲</button>
                                            </div>
                                          </td>
                                          <td>£<span class="profit_margin">0</span></td>
                                          <td><input type="radio" class="nights" name="nights_{{$k}}" value="5"></td>
                                        </tr>
                                        <tr data-nights="6" data-days="7" class="price-option">
                                          <td>6 nights<br><small>7 days</small></td>
                                          <td>
                                            <div class="fixture-control">
                                              <button type="button" class="btn-down">▼</button>
                                              <span class="fixture-count"></span>
                                              <button type="button" class="btn-up">▲</button>
                                            </div>
                                          </td>
                                          <td>£<span class="profit_margin">0</span></td>
                                          <td><input type="radio" class="nights" name="nights_{{$k}}" value="6"></td>
                                        </tr>
                                      </tbody>
                                    </table>
                                </div>
                                @if($row->ExperienceHotels->count() != ($k+1))
                                <div class="form-group">
                                    <input type="button" name="add_more" data-key="{{($k+1)}}" value="Add Additional Hotel" class="btn btn-primary add_hotel" style="display:none;">
                                </div>
                                @endif
                            </div>
                            
                            @endforeach
                        @endif
                        
                        <div class="card-section">
                          
                           
                           <!-- <div class="form-group">
                                <label >Hotel rate</label>
                                <input type="text" class="form-control" readonly id="hotel_rate" name="hotel_rate" value="">                         
                           </div> -->

                          <div class="form-group">
                            <label>Approximate tour start date</label>
                            <div style="position: relative;">
                                <input type="hidden" name="coach_hire_cost" id="coach_hire_cost" value="{{$row->coach_hire_cost}}">
                                <input type="hidden" name="nights" id="nights" value="">
                                <input type="hidden" name="avg_cost_fixture" id="avg_cost_fixture" value="{{$row->avg_cost_fixture}}">
                                
                                <input type="text" id="mainInput"  name="date_from" class="form-control">
                                <span id="mainIcon" style="cursor: pointer; position: absolute;right: 0;padding: 5px 10px;top: 0;"><i class="fa fa-calendar-alt"></i></span>
                            </div>
                            <!-- Popup with Tabs -->
                            <div id="calendarPopup" class="popup">
                              <!-- Tabs -->
                              <div class="flex bg-gray-200 rounded-full p-1 w-fit mx-auto">
                                  <button
                                    id="tab-estimate"
                                    type="button"
                                    class="flex-1 px-4 py-2 rounded-full text-sm font-medium transition-all duration-200 bg-white text-gray-800 shadow"
                                  >
                                    Estimate
                                  </button>
                                  <button
                                    id="tab-specific"
                                    type="button"
                                    class="flex-1 px-4 py-2 rounded-full text-sm font-medium transition-all duration-200 text-gray-600 hover:text-gray-800"
                                  >
                                    Specific
                                  </button>
                                </div>

                                <!-- Calendars -->
                              <div id="estimate-calendar"></div>
                              <div id="specific-calendar"></div>
                            </div>
                          </div>

                          <div class="form-group">
                            <label>Estimated Pax</label>
                            <select class="form-control" name="total_passengers" id="total_passengers">
                              <option>30</option>
                              <option>25</option>
                              <option>20</option>
                              <option>15</option>
                              <option>10</option>
                              <option>5</option>
                            </select>
                          </div>
                        </div>
                        <!-- Attractions Section (Blade ready) -->
                        <!-- Attractions Section -->
                        <div class="card-section mt-4">
                          <h4 class="section-title">Attractions</h4>
                          <div class="attractions-grid">
                            <!-- No Attractions -->
                                    <label class="attraction-card active">
                                      <input type="radio" name="attraction" value="0" hidden checked>
                                      <div class="card-inner">
                                        <div class="card-image no-image">
                                          <span>No attractions</span>
                                          <div class="corner-tick"></div>
                                        </div>
                                        <div class="card-body">
                                          <h6 class="card-title">No attractions</h6>
                                        </div>
                                      </div>
                                    </label>
                             @if ($row->ExperienceAttractions->count() > 0)
                                @foreach($row->ExperienceAttractions as $att)
                                    
                                    <label class="attraction-card">
                                      <input type="checkbox" value="{{ $att->id }}" data-cost="{{$att->estimated_cost_pp}}" class="btn-check hidden" name="attraction[]" id="gardenAttraction" autocomplete="off" >
                                      <div class="card-inner">
                                        <div class="card-image">
                                          <img src="{{ $image_url.'storage/'.$att->attractionImages[0]->file }}" class="" alt="Garden Attraction">
                                          <div class="corner-tick"></div>
                                        </div>
                                        <div class="card-body">
                                          <h6 class="card-title">{{$att->name}}</h6>
                                          <p class="card-price">£{{$att->estimated_cost_pp}}pp</p>
                                        </div>
                                      </div>
                                    </label>
                                @endforeach
                            @endif
                            </div>
                        </div>
                    </div>
                    <div class="page2" style="display: none;">
                        <h4 class="section-title">Preferred Bowling Clubs</h4>
                        <div class="card-section">
                          
                              <div class="mb-4">
                                <div id="clubInputs">
                                  <div class="row" id="clubFields"></div>
                                  <a href="javascript:;" id="skipStep" class="small text-primary text-decoration-none">Skip this step</a>
                                </div>
                                <div id="noPreference" class="d-none">
                                  <p class="mb-1">No preference.</p>
                                  <a href="javascript:;" id="selectClubs" class="small text-primary text-decoration-none">Select Preferred Clubs</a>
                                </div>
                              </div>
                        </div>
                        <h4 class="section-title">Contact Information</h4>
                        <div class="card-section">
                          
                            <div class="mb-4">
                              <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Name *</label>
                                         <input type="text" class="form-control" id="contactName" required name="contact_name" placeholder="John Johnson">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Bowls Club *</label>
                                        <input type="text" class="form-control" name="bowls_club" required  id="bowlsClub" placeholder="Grantham Bowls Club">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Email *</label>
                                        <input type="email" class="form-control" name="email" required id="email" placeholder="john.johnson@bowls.co.uk">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Contact Number *</label>
                                        <input type="tel" class="form-control" name="contact_number" required id="contactNumber" placeholder="01234567890">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Comments</label>
                                        <textarea class="form-control" name="addtional_note" id="addtional_note" rows="5"></textarea>
                                    </div>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>



                    <!-- <div class="card-section">
                        <h4 class="section-title">Attractions</h4>
                        @if ($row->ExperienceAttractions->count() > 0)
                            @foreach($row->ExperienceAttractions as $att)
                                <div class="col-md-6 col-lg-4 d-flex">
                                    <div class="w-100 d-flex flex-column mb-3">
                                    <input type="checkbox" value="{{ $att->id }}" data-cost="{{$att->estimated_cost_pp}}" class="btn-check" name="attraction[]" id="gardenAttraction" autocomplete="off" style="display: none;">
                                    <label class="attraction-card" for="gardenAttraction">
                                        <img src="{{ $image_url.'storage/'.$att->attractionImages[0]->file }}" class="" alt="Garden Attraction">
                                    </label>
                                    <h5>{{$att->name}}</h5>
                                    <div class="small">£{{$att->estimated_cost_pp}}pp</div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div> -->
                  </div>

                   <!-- RIGHT PANEL (Sticky Summary) -->
                    <div class="enquiry-right">
                        <div class="summery">
                            <h4 class="section-title">Summary</h4>
                            <div class="summary-card">
                              
                              <ul class="list-unstyled mb-4" style="border-bottom: 2px solid #ccc;">
                                <li><strong>Hotel:</strong> Peebles Hydro</li>
                                <li><strong>Approx tour date:</strong> June</li>
                                <li><strong>Tour length:</strong> 3 nights / 4 days</li>
                                <li><strong>No. fixtures:</strong> 3</li>
                                <li><strong>Attractions:</strong> No attractions</li>
                                <li><strong>Coach:</strong> Included</li>
                              </ul>
                               
                            </div>
                            <div class="summary-total">
                              <small>Estimated Cost</small>
                              <h3>£<span class="final_pp_cost">0</span> pp</h3>
                              <input type="hidden" name="exp_id" value="{{$row->id}}">
                              <input type="hidden" name="final_cost" id="final_cost" value="">
                            </div>
                        </div>
                        <div class="summery p-3">
                            <button  type="button" class="btn btn-warning w-100 fw-bold py-2" id="continue" style="
            height: 70px; color: #fff;">Continue</button>
                            <button  type="submit" class="btn btn-warning w-100 fw-bold py-2" id="enquiryNow" style="display:none;height: 70px; color: #fff;">Enquire Now</button>
                            <button type="button" id="backPage" class="btn btn-outline-dark w-100 fw-bold mt-3" style="display:none;"><i class="fas fa-arrow-left"></i> Go Back</button>
                        </div>
                    </div>
                </div>

           </form>

        </div>
      </div>
    </div>
</div>
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
<!-- Bowling clubs -->
<script>
    //const clubFieldsContainer = $('#clubFields');
      const skipStep = $('#skipStep');
      const noPreference = $('#noPreference');
      const selectClubs = $('#selectClubs');

      // safe guard
    // create preferred club inputs (count = number)
     const clubFieldsContainer = document.getElementById('clubFields');

    function renderClubInputs() {
      clubFieldsContainer.innerHTML = '';

      document.querySelectorAll('.hotelDiv').forEach(hotelDiv => {

        // skip hidden hotel blocks
        if (hotelDiv.style.display === 'none') return;

        const hotelSelect = hotelDiv.querySelector('select[name="hotel[]"]');
        if (!hotelSelect || !hotelSelect.value) return;

        const hotelName =
          hotelSelect.options[hotelSelect.selectedIndex].text;

        // get selected nights row for THIS hotel
        const selectedRow = hotelDiv
          .querySelector('.price-option input.nights:checked')
          ?.closest('.price-option');

        if (!selectedRow) return;

        const fixtureCount = parseInt(
          selectedRow.querySelector('.fixture-count')?.textContent || 0,
          10
        );

        if (fixtureCount <= 0) return;

        // limit max fixtures to 8
        const max = Math.min(fixtureCount, 8);

        // ---- HOTEL TITLE ----
        const titleCol = document.createElement('div');
        titleCol.className = 'col-12';
        titleCol.innerHTML = `<h5 class="mt-3 mb-2">${hotelName}</h5>`;
        clubFieldsContainer.appendChild(titleCol);

        // ---- FIXTURE INPUTS ----
        for (let i = 1; i <= max; i++) {
          const col = document.createElement('div');
          col.className = 'col-md-6';

          col.innerHTML = `
            <div class="mb-3">
              <label class="form-label">Fixture ${i} </label>
              <input
                type="text"
                name="preferred_club[]"
                class="form-control"
                placeholder="Club Name"
              >
            </div>
          `;

          clubFieldsContainer.appendChild(col);
        }
      });
    }

  document.getElementById('skipStep').addEventListener('click', function (e) {
    e.preventDefault();
    document.getElementById('clubInputs').classList.add('d-none');
    document.getElementById('noPreference').classList.remove('d-none');
  });

  document.getElementById('selectClubs').addEventListener('click', function (e) {
    e.preventDefault();
    document.getElementById('noPreference').classList.add('d-none');
    document.getElementById('clubInputs').classList.remove('d-none');
     const selectedNightRow = document.querySelector('#nightsRow .price-option input[name="nights"]:checked')?.closest('.price-option');
        const fixtures = selectedNightRow?.querySelector('.fixture-count')?.textContent || '0';

        renderClubInputs();
  });
</script>

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
        // calculate_score();
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
      $('#enquiry_link_new').click(function(e){
       
            $('#enqModal').modal('show');
        });
     
        <?php if(Session::has('success')){ ?> 
       
            toastSuccess('Enquiry added successfully.');


        <?php Session::forget('success'); } ?>
</script>
<!-- calander -->
<script>
    const popup = document.getElementById('calendarPopup');
    const mainInput = document.getElementById('mainInput');
    const mainIcon = document.getElementById('mainIcon');
    const estimateCalendar = document.getElementById('estimate-calendar');
    const specificCalendar = document.getElementById('specific-calendar');
    const tabEstimate = document.getElementById('tab-estimate');
    const tabSpecific = document.getElementById('tab-specific');
    const nextEstimateDiv = estimateCalendar.nextElementSibling;
    
      
    // Hide the next div after specificCalendar
    const nextSpecificDiv = specificCalendar.nextElementSibling;
    
    // --- Flatpickr Setup ---

    

    
    function hideFlatpickrNext(element) {
      const next = element?.nextElementSibling;
      if (next && next.classList.contains('flatpickr-calendar')) {
        next.style.display = 'none';
      }
    }
    // --- Tab Switching ---
    const today = new Date(); 
    function showEstimate() {
        setActiveTab(tabEstimate);
        hideFlatpickrNext(specificCalendar);
        // Month picker (Estimate)
        /* const estimatePicker = flatpickr(estimateCalendar, {
          inline: true,
          dateFormat: "Y-m",
          plugins: [
            new monthSelectPlugin({
              shorthand: true,
              dateFormat: "Y-m",
              altFormat: "F Y"
            })
          ],
          onChange: (selectedDates, dateStr, instance) => {
            if (selectedDates[0]) {
              const formatted = instance.formatDate(selectedDates[0], "F Y");
              mainInput.value = formatted;
              hidePopup();
            }
          }
        });*/
            const firstAllowedMonth = new Date(today.getFullYear(), today.getMonth(), 1);

            const estimatePicker = flatpickr(estimateCalendar, {
              inline: true,
              dateFormat: "Y-m",
              disableMobile: true,
              minDate: firstAllowedMonth, // works for month plugin
              disable: [
                function(date) {
                  return (
                    date.getFullYear() < today.getFullYear() ||
                    (date.getFullYear() === today.getFullYear() &&
                    date.getMonth() < today.getMonth())
                  );
                }
              ],
              plugins: [
                new monthSelectPlugin({
                  shorthand: true,
                  dateFormat: "Y-m",
                  altFormat: "F Y"
                })
              ],
              onChange: (selectedDates, dateStr, instance) => {
                if (selectedDates[0]) {
                  const formatted = instance.formatDate(selectedDates[0], "F Y");
                  mainInput.value = formatted;
                  hidePopup();
                }
              }
            });
      estimateCalendar.style.display = "block";
      specificCalendar.style.display = "none";
      //tabEstimate.classList.add('border-green-500', 'text-green-600');
      //tabSpecific.classList.remove('border-green-500', 'text-green-600');
      tabSpecific.classList.add('text-gray-500');
    }
    function setActiveTab(active) {
      [tabEstimate, tabSpecific].forEach(btn => {
        btn.classList.remove('bg-white', 'shadow', 'text-gray-800');
        btn.classList.add('text-gray-600');
      });

      active.classList.add('bg-white', 'shadow', 'text-gray-800');
      active.classList.remove('text-gray-600');
    }

    tabEstimate.addEventListener('click', () => setActiveTab(tabEstimate));
    tabSpecific.addEventListener('click', () => setActiveTab(tabSpecific));

    function showSpecific() {
        
        hideFlatpickrNext(estimateCalendar);
        // Full date picker (Specific)
    const specificPicker = flatpickr(specificCalendar, {
      inline: true,
      dateFormat: "Y-m-d",
      minDate: "today",
      onChange: (selectedDates, dateStr, instance) => {
        if (selectedDates[0]) {
          const formatted = instance.formatDate(selectedDates[0], "F j, Y");
          mainInput.value = formatted;
          hidePopup();
        }
      }
    });
      specificCalendar.style.display = "block";
      estimateCalendar.style.display = "none";
      //tabSpecific.classList.add('border-green-500', 'text-green-600');
     // tabEstimate.classList.remove('border-green-500', 'text-green-600');
      tabEstimate.classList.add('text-gray-500');
    }

    tabEstimate.addEventListener('click', showEstimate);
    tabSpecific.addEventListener('click', showSpecific);

    // --- Popup Control ---
    function togglePopup() {
      if (popup.style.display === 'block') {
        hidePopup();
      } else {
        showPopup();
      }
    }

    function showPopup() {
      popup.style.display = 'block';
      showEstimate(); // default tab
    }

    function hidePopup() {
      popup.style.display = 'none';
      updateSummary();
    }

    mainInput.addEventListener('click', togglePopup);
    mainIcon.addEventListener('click', togglePopup);

    // Hide popup when clicking outside
    document.addEventListener('click', (e) => {
      if (!popup.contains(e.target) && !mainInput.contains(e.target) && !mainIcon.contains(e.target)) {
        hidePopup();
      }
    });
  </script>
<!-- calculate final rate -->
<script>

    /* ==========================
       HELPERS
    ========================== */
    const $$ = (sel, ctx = document) => Array.from(ctx.querySelectorAll(sel));
 /* ==========================
       PROFIT MARGIN (ALL HOTELS)
    ========================== */
    function updateProfitMargins() {
      const pax = +document.querySelector('#total_passengers').value;
      const coach = +document.querySelector('#coach_hire_cost').value;
      const avgFixture = +document.querySelector('#avg_cost_fixture').value;

      $$('.hotelDiv').forEach(hotelDiv => {
        if (hotelDiv.style.display === 'none') return;

        const rate = +hotelDiv.querySelector('.hotel_rate').value;
        if (!rate) return;

        $$('.price-option', hotelDiv).forEach(row => {
          const nights = +row.dataset.nights;
          //const fixtures = nights - 1;
          const fixtureSpan = row.querySelector('.fixture-count');
          const fixtures = +fixtureSpan.textContent || 0;
          const span = row.querySelector('.profit_margin');

          span.textContent = calculate_rate(
            nights, fixtures, coach, avgFixture, rate, pax
          );
        });
      });
      renderClubInputs();
    }
   
    /* ==========================
       NIGHTS SELECTION
    ========================== */
    document.addEventListener('change', e => {
      if (!e.target.classList.contains('nights')) return;

      const hotelDiv = e.target.closest('.hotelDiv');

      $$('.price-option', hotelDiv).forEach(r => r.classList.remove('active'));
      e.target.closest('.price-option').classList.add('active');

      updateProfitMargins();
      updateFinalRate();
      updateSummary();
    });

    /* ==========================
       CLICK ROW SELECT
    ========================== */
    document.addEventListener('click', e => {
      const row = e.target.closest('.price-option');
      if (!row) return;

      const hotelDiv = row.closest('.hotelDiv');
      if (!hotelDiv) return;

      row.querySelector('.nights').checked = true;
      row.querySelector('.nights').dispatchEvent(new Event('change', { bubbles:true }));
    });

    /* ==========================
       CALCULATION
    ========================== */
    function calculate_rate(nights, fixtures, coach, avgFixture, hotelRate, pax) {
      const hotel = pax * hotelRate * nights;
      const coachCost = coach * (nights + 1);
      //const coachCost = 0;
      const fixtureCost = avgFixture * fixtures;

      const total = hotel + coachCost + fixtureCost;
      const profit = (total + 2500) / pax;

      return roundTo5or9(profit);
    }

   

    /* ==========================
       FINAL RATE (SUM ALL HOTELS)
    ========================== */
    function updateFinalRate() {
      let total = 0;
      let hasHotelSelected = false;

      const coach = +document.querySelector('#coach_hire_cost').value;
      const nights = +document.querySelector('#nights').value;
      const coachCost = coach * (nights + 1);
      const pax = +document.querySelector('#total_passengers').value;
      // ---- HOTELS TOTAL ----
      document.querySelectorAll('.hotelDiv').forEach(hotelDiv => {

        // skip hidden hotel blocks
        if (hotelDiv.style.display === 'none') return;

        // skip if hotel not selected
        const hotelSelect = hotelDiv.querySelector('select[name="hotel[]"]');
        if (!hotelSelect || !hotelSelect.value) return;

        // skip if hotel rate is 0
        const hotelRateInput = hotelDiv.querySelector('.hotel_rate');
        const hotelRate = parseFloat(hotelRateInput?.value || 0);
        if (hotelRate <= 0) return;

        // get checked nights radio INSIDE this hotel block
        const checkedNight = hotelDiv.querySelector('input.nights:checked');
        if (!checkedNight) return;

        const activeRow = checkedNight.closest('.price-option');
        if (!activeRow) return;

        const profit = parseFloat(
          activeRow.querySelector('.profit_margin')?.textContent || 0
        );

        total += profit;
        hasHotelSelected = true; // ✅ at least one valid hotel
      });
        console.log('total'+total)
      // ---- ADD COACH + ATTRACTIONS ONLY IF HOTEL EXISTS ----
      if (hasHotelSelected) {

        // attractions
        document.querySelectorAll('input[name="attraction[]"]:checked').forEach(cb => {
          total += parseFloat(cb.dataset.cost || 0);
        });
       // console.log('coach'+(parseFloat(coachCost/pax)))
        // coach
       //total += parseFloat(coachCost/pax);
      }

      // ---- UPDATE UI ----
      const final = roundTo5or9(total);

      document.querySelector('.final_pp_cost').textContent = final;
      document.querySelector('#final_cost').value = final;
    }



    /* ==========================
       SUMMARY (ALL HOTELS)
    ========================== */
    function updateSummary() {

      let hotelSummaries = [];
      let totalNights = 0;
      let totalFixtures = 0;

      // ---- LOOP ALL HOTEL BLOCKS ----
      document.querySelectorAll('.hotelDiv').forEach((hotelDiv, index) => {

        if (hotelDiv.style.display === 'none') return;

        const hotelSelect = hotelDiv.querySelector('select[name="hotel[]"]');
        if (!hotelSelect || !hotelSelect.value) return;

        const hotelName =
          hotelSelect.options[hotelSelect.selectedIndex].text;

        const selectedNightRow = hotelDiv
          .querySelector('.price-option input.nights:checked')
          ?.closest('.price-option');

        if (!selectedNightRow) return;

        const nights = parseInt(selectedNightRow.dataset.nights || 0, 10);
        const fixtures = parseInt(
          selectedNightRow.querySelector('.fixture-count')?.textContent || (nights - 1),
          10
        );

        totalNights += nights;
        totalFixtures += fixtures;

        // ✅ SET FIXTURE COUNT INTO HIDDEN FIELD FOR THIS HOTEL
        const fixtureInput = hotelDiv.querySelector('.fixture_cnt');
        if (fixtureInput) {
          fixtureInput.value = fixtures;
        }

        // store per-hotel summary
        hotelSummaries.push({
          name: hotelName,
          fixtures
        });
      });

      // ---- EXTRA NIGHT ONLY IF MORE THAN 1 HOTEL ----
      if (hotelSummaries.length > 1) {
        //totalNights += 1;
      }

      const totalDays = totalNights + 1;

      // ---- DATE ----
      const tourDate =
        document.querySelector('input[name="date_from"]')?.value || 'N/A';

      // ---- ATTRACTIONS ----
      const activeAttractions = Array.from(
        document.querySelectorAll('.attraction-card.active .card-title')
      ).map(el => el.textContent.trim());

      const attractionText = activeAttractions.length
        ? activeAttractions.join(', ')
        : 'No attractions';

      // update nights input
      document.querySelector('#nights').value = totalNights;

      // ---- BUILD HOTEL HTML ----
      const hotelHtml = hotelSummaries.length
        ? hotelSummaries.map(hotel => `
            <li><strong>Hotel:</strong> ${hotel.name}</li>
            <li><strong>Fixtures:</strong> ${hotel.fixtures}</li>
          `).join('')
        : `<li><strong>Hotel:</strong> N/A</li>`;

      // ---- UPDATE SUMMARY ----
      document.querySelector('.summery ul').innerHTML = `
        ${hotelHtml}
        <li><strong>Approx tour date:</strong> ${tourDate}</li>
        <li><strong>Total tour length:</strong> ${totalNights} nights / ${totalDays} days</li>
        <li><strong>Attractions:</strong> ${attractionText}</li>
        <li><strong>Coach:</strong> Included</li>
      `;
    }






    /* ==========================
       ROUND
    ========================== */
     function roundTo5or9(value) {
        if(value != 0)
        {
            let n = Math.ceil(value); // remove decimals and always round up
            let lastDigit = n % 10;

            if (lastDigit <= 5) {
                n = n - lastDigit + 5; // push to nearest 5
            } else {
                n = n - lastDigit + 9; // push to nearest 9
            }

            return n;
        }
        else
        {
            return value;
        }
        
    }
</script>
<!-- Fixtur button -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
      const MIN_FIXTURES = 1;
      const MAX_FIXTURES = 8;

      document.querySelectorAll(".tour-table tbody tr").forEach((row) => {
        const nights = parseInt(row.dataset.nights);
        const fixtureCountEl = row.querySelector(".fixture-count");
        const btnUp = row.querySelector(".btn-up");
        const btnDown = row.querySelector(".btn-down");

        // Default fixtures = nights - 1
        let fixtures = Math.max(MIN_FIXTURES, nights - 1);
        fixtureCountEl.textContent = fixtures;

        // Update button visual states
        function updateButtons() {
          btnDown.classList.toggle("disabled-btn", fixtures <= MIN_FIXTURES);
          btnUp.classList.toggle("disabled-btn", fixtures >= MAX_FIXTURES);
           updateProfitMargins();
            updateFinalRate();
        }

        updateButtons();

        btnUp.addEventListener("click", () => {
          if (fixtures < MAX_FIXTURES) {
            fixtures++;
            fixtureCountEl.textContent = fixtures;
            updateButtons();
          }
        });

        btnDown.addEventListener("click", () => {
          if (fixtures > MIN_FIXTURES) {
            fixtures--;
            fixtureCountEl.textContent = fixtures;
            updateButtons();
          }
        });
      });

      // Highlight selected row
      const radios = document.querySelectorAll('input[name="tour"]');
      radios.forEach((radio) => {
        radio.addEventListener("change", () => {
          document.querySelectorAll(".tour-table tr").forEach((tr) => tr.classList.remove("selected"));
          radio.closest("tr").classList.add("selected");
        });
      });
    });

</script>
<!-- attraction -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
  
  const noAttraction = document.querySelector('input[name="attraction"][value="0"]');
  const attractionCards = document.querySelectorAll('.attraction-card');
  const attractionCheckboxes = document.querySelectorAll('input[name="attraction[]"]');

  // When "No attractions" is selected
  noAttraction.addEventListener("change", function () {
    attractionCards.forEach(card => card.classList.remove("active"));
    noAttraction.closest('.attraction-card').classList.add("active");

    // Uncheck all attraction checkboxes
    attractionCheckboxes.forEach(cb => cb.checked = false);
    console.log('attra')
    updateFinalRate();
    updateSummary();
  });

  // When attraction checkboxes are clicked
  attractionCheckboxes.forEach(cb => {
    cb.addEventListener("change", function () {
      // Unselect no-attraction radio and its active class
      noAttraction.checked = false;
      noAttraction.closest('.attraction-card').classList.remove("active");

      // Toggle active class for clicked card
      const card = cb.closest('.attraction-card');
      if (cb.checked) {
        card.classList.add("active");
      } else {
        card.classList.remove("active");
      }
      console.log('attra')
      updateFinalRate();
      updateSummary();
    });
  });
  
    });

     

    // ✅ Run once
    updateSummary();

    // ✅ Add event listeners
    // Hotel dropdown change (loop-safe)
    document.addEventListener('change', function (e) {
        if (!e.target.matches('select[name="hotel[]"]')) return;

        const hotelSelect = e.target;
        const hotelDiv = hotelSelect.closest('.hotelDiv');
        if (!hotelDiv) return;

        const selectedOption = hotelSelect.options[hotelSelect.selectedIndex];
        const cost = selectedOption?.dataset.cost || 0;

        // ✅ Update hotel rate (CLASS, not ID)
        const hotelRateInput = hotelDiv.querySelector('.hotel_rate');
        if (hotelRateInput) {
            hotelRateInput.value = cost;
        }

        // ✅ Show Add Hotel button only when hotel selected
        const addHotelBtn = hotelDiv.querySelector('.add_hotel');
        if (addHotelBtn) {
            addHotelBtn.style.display = hotelSelect.value ? 'inline-block' : 'none';
        }

        // ✅ Force summary + recalculation
        setTimeout(() => {
            if (typeof updateSummary === 'function') updateSummary();
            if (typeof updateProfitMargins === 'function') updateProfitMargins();
            if (typeof updateFinalRate === 'function') updateFinalRate();
        }, 0);
    });

    document.querySelectorAll('.btn-up, .btn-down').forEach(btn =>
      btn.addEventListener('click', () => {
        updateProfitMargins();
        updateSummary();
        updateFinalRate();
      })
    );
    //change pax
    const totalPassengers = document.getElementById('total_passengers');

    if (totalPassengers) {
      totalPassengers.addEventListener('change', function () {
        updateProfitMargins();
        updateSummary();
        updateFinalRate();
      });
    }
    $(document).on('click', '.add_hotel', function () {
        var key = $(this).data('key');

        // Show next hotel block
        var nextHotelDiv = $('.hotal_' + key);
        nextHotelDiv.show();

        // Collect all previously selected hotel IDs
        var selectedHotelIds = [];

        $('.hotelDiv:visible').each(function () {
            var val = $(this).find('select[name="hotel[]"]').val();
            if (val) {
                selectedHotelIds.push(val);
            }
        });

        // Remove all previously selected hotels from next dropdown
        selectedHotelIds.forEach(function (hotelId) {
            nextHotelDiv
                .find('select[name="hotel[]"] option[value="' + hotelId + '"]')
                .remove();
        });

        // Reset selection in next dropdown
        nextHotelDiv.find('select[name="hotel[]"]').val('');

        // Hide Add button for current block
        $(this).hide();

    });
</script>
<!-- validation for hotel, night, date -->
<script>
    document.getElementById("continue").addEventListener("click", function () {

    // Remove old error messages
    document.querySelectorAll(".error-text").forEach(el => el.remove());

    let hotel     = document.querySelector('select[name="hotel[]"]');
    let dateFrom  = document.querySelector('input[name="date_from"]');
    let nights    = document.querySelector('input[name="nights"]:checked');
    let fixture   = document.querySelector('input[name="nights"]:checked')
                      ?.closest('tr')
                      .querySelector('.fixture-count').textContent.trim();

    let valid = true;

    // Validate Hotel
    if (!hotel.value || hotel.value === "Select a hotel") {
        valid = false;
        hotel.insertAdjacentHTML("afterend", `<span class="error-text">Please select a Hotel</span>`);
    }

    // Validate Tour Start Date
    if (!dateFrom.value.trim()) {
        valid = false;
        dateFrom.insertAdjacentHTML("afterend", `<span class="error-text">Please select a Start date</span>`);
    }

    /*// Validate Nights & Fixtures
    if (!nights || fixture === "" || fixture === "0") {
        valid = false;
        let nightsRow = document.getElementById("nightsRow");
        nightsRow.insertAdjacentHTML("afterend", `<span class="error-text">Please select Tour Nights and No. of Fixtures</span>`);
    }*/

    // If any validation failed, stop here
    if (!valid) return;

    // ✅ Passed validation → switch to page 2
    document.querySelector(".page1").style.display = "none";
    document.querySelector(".page2").style.display = "block";

    // ✅ Show Enquire Now button, hide Continue
    document.getElementById("continue").style.display = "none";
    document.getElementById("enquiryNow").style.display = "block";
    document.getElementById("backPage").style.display = "block";

    });
    document.getElementById("backPage").addEventListener("click", function () {

        // Remove old error messages
        document.querySelectorAll(".error-text").forEach(el => el.remove());

        // ✅ Passed validation → switch to page 2
        document.querySelector(".page1").style.display = "block";
        document.querySelector(".page2").style.display = "none";

        // ✅ Show Enquire Now button, hide Continue
        document.getElementById("continue").style.display = "block";
        document.getElementById("enquiryNow").style.display = "none";
        document.getElementById("backPage").style.display = "none";

    });

</script>
<script>
jQuery(document).ready(function ($) {

    $("#enquiryNow").on("click", function (e) {

        e.preventDefault();

        // Remove old errors
        $(".error-text").remove();

        let contactName   = $("#contactName");
        let bowlsClub     = $("#bowlsClub");
        let email         = $("#email");
        let contactNumber = $("#contactNumber");

        let valid = true;

        if (!contactName.val().trim()) {
            valid = false;
            addErrorAfterInput(contactName, "Please enter your Name");
        }

        if (!bowlsClub.val().trim()) {
            valid = false;
            addErrorAfterInput(bowlsClub, "Please enter your Bowls Club");
        }

        if (!email.val().trim()) {
            valid = false;
            addErrorAfterInput(email, "Please enter your Email");
        }

        if (!contactNumber.val().trim()) {
            valid = false;
            addErrorAfterInput(contactNumber, "Please enter your Contact Number");
        }

        if (!valid) return;

        // Submit form
        $(this).closest("form").submit();
    });

    function addErrorAfterInput($input, message) {

        if (!$input || !$input.length) return;

        // Remove existing error after input
        $input.next(".error-text").remove();

        // ✅ Correct way: insert AFTER input
        $input.after(
            `<span class="error-text">${message}</span>`
        );
    }

});

 



</script>

@endsection
