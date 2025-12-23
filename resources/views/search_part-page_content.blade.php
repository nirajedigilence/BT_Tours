<style>
        .accountContainer .accountRow .middleCol .middleCol_row .column {
            width: 20%;
            line-height: 1.5;
            color: #14213D;
        }
        .viewBtn.active {
            border-bottom: 4px solid #FCA311;
            color: #FCA311;
            padding: 38px 0px;
        }
        .viewBtn {
            color: #14213D !important;
            padding: 38px 0px !important;
        }
        .package-name {
          position: relative;
          display: inline-block;
          cursor: pointer;
          color: #1a1a1a;
          font-weight: bold;
        }

        .tour_popup {
          display: none;
          position: absolute;
          top: 100%;
          left: 0;
          width: 750px;
          background-color: white;
          /*border: 1px solid #ccc;*/
          box-shadow: 0px 3px 6px #00000029;
          z-index: 100;
          /*padding: 10px;*/
          /*border-radius: 8px;*/
        }

        .package-name:hover .tour_popup {
          display: flex;
        }

        .tour_popup img {
        width: 400px;
        height: 230px;
          /*border-radius: 5px;*/
          margin-right: 10px;
          flex-shrink: 0;
        }

        .tour_popup .tour_content {
          flex: 1;
        }

        .tour_popup h4 {
            margin: 7px 0 5px;
            font-size: 17px;
            font-weight: bold;
            font-family: "Montserrat", sans-serif !important;
            letter-spacing: 0px;
            color: #14213D !important;
        }

        .tour_popup p {
          letter-spacing: 0px;
          font-size: 15px;
          color: #14213D;
          margin: 0;
          font-family: "Montserrat", sans-serif !important;
        }
        .tour_popup h5 {
          letter-spacing: 0px;
          font-family: "Montserrat", sans-serif !important;
        }
        .openBooking {
        background: #ffffff;
    }
    .cta {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 85%;
        height: 35px;
        background: #FCA311;
        border-radius: 5px;
        text-decoration: none;
        text-align: center;
        font-size: 0.875rem;
        font-weight: 600;
        color: #FFF;
        outline: none;
        margin: 0 4px;
    }
    .squares {
        display: flex
    ;
    }
    .square {
        width: 20px;
        height: 20px;
        border: solid 1px #14213D;
        border-radius: 2px;
        margin: 5px 4px 0 0;
    }
    .square.filled {
        background: #14213D;
    }
    .accountContainer .accountRow .middleCol .middleCol_row.header {
        min-height: 0;
        padding: 5px 20px;
    }
    a.cta:hover { color: unset;}
    .accountContainer .accountRow .middleCol .middleCol_row
     {
        display: flex;
        align-items: center;
        min-height: 60px;
        border-bottom: solid 1px #CFCFCF;
        padding: 0px 20px;
    }
    .accountContainer .accountRow .middleCol .middleCol_row .column.bold
     {
        font-size: 1.10rem;
        font-weight: 600;
    }
    .accountContainer .accountRow .middleCol .middleCol_row .column
     {
        padding-left: 8px;
    }
    .tour-card {
        width: 350px;                   /* adjust as needed */
        border: 4px solid var(--card-border);
        border-radius: var(--radius);
        overflow: hidden;
        background: #fff;
        box-shadow: 0 4px 10px rgba(0,0,0,.1);
      }

      /* ======  IMAGE & OVERLAY  ====== */
      .mapoverlay {
          position: absolute;
          top: 0;
          right: 0;
          background-color: white;
          padding: 15px;
          width: 180px;
          box-shadow: 0 4px 8px rgba(0,0,0,0.15);
          opacity: 0;
          visibility: hidden;
          transition: opacity 0.3s ease, visibility 0.3s ease;
        }

        .image-container:hover .mapoverlay {
          opacity: 1;
          visibility: visible;
        }

        .mapoverlay p {
          margin: 10px 0;
          font-size: 14px;
          color: #333;
        }

        .activity-box {
          display: inline-block;
          width: 20px;
          height: 20px;
          margin-right: 4px;
          background-color: #eee;
          border: 1px solid #ccc;
        }

        .activity-box.active {
          background-color: #1c1c1c;
        }
      .tour-image {
        position: relative;
        height: 200px;
        overflow: hidden;

      }
      .tour-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        transition: transform 0.3s ease;
      }
      .tour-image:hover img {
          transform: scale(1.05);
        }
        /* Overlay box */
        /*.overlay-box {
          position: absolute;
          top: 0;
          right: 0;
          height: 100%;              
          background: rgba(255, 255, 255, 0.96); 
          padding: 16px;
          box-shadow: 0 0 8px rgba(0, 0, 0, 0.15);
          width: 180px;
          z-index: 10;
          opacity: 0;
          visibility: hidden;
          transition: all 0.3s ease;
          display: flex;
          flex-direction: column;
          justify-content: center;
        }*/
        .overlay-box {
          position: absolute;
          top: 0;
          right: 0;
          height: 100%;
          width: 180px;
          background: rgba(255, 255, 255, 0.98);
          padding: 16px;
          box-shadow: 0 0 8px rgba(0, 0, 0, 0.15);
          z-index: 10;
          opacity: 0;
          visibility: hidden;
          transition: all 0.3s ease;
          display: flex;
          flex-direction: column;
          overflow-y: auto;            /* 🔹 makes it scrollable */
          scrollbar-width: thin;       /* 🔹 optional: for Firefox */
          scrollbar-color: #ccc #fff;  /* 🔹 optional: for Firefox */
        }
        .overlay-box::-webkit-scrollbar {
          width: 6px;
        }

        .overlay-box::-webkit-scrollbar-track {
          background: transparent;
        }

        .overlay-box::-webkit-scrollbar-thumb {
          background-color: #ccc;
          border-radius: 3px;
        }
        .tour-image:hover .overlay-box {
          opacity: 1;
          visibility: visible;
        }

        /* Activity Level Styling */
        .activity-box {
          display: inline-block;
          width: 18px;
          height: 18px;
          background: #eee;
          border: 1px solid #999;
          margin-right: 4px;
          border-radius: 2px;
        }

        .activity-box.active {
          background: #111;
        }
      .tour-info {
        position: absolute;
        left: 0; bottom: 0;
        width: 100%;
        padding: 14px;
        background: linear-gradient(to top, rgba(0,0,0,0.70) 0%, rgba(0,0,0,0.0) 90%);
        color: var(--text-light);
      }
      .tour-info h2 {
        font-size: 1.35rem;
        font-weight: 700;
        margin-bottom: .25rem;
        color: #ffffff;
      }
      .tour-info .price {
        font-size: 1.25rem;
        font-weight: 700;
        color: #ffffff;
      }
      .tour-info .price span {          /* the “from” word */
        font-size: .8rem;
        font-weight: 400;
        margin-right: 4px;
        color: #ffffff;
      }

      /* ======  BODY  ====== */
      .tour-body {
        display: flex;
        gap: 0;
      }
      .tour-description {
        flex: 2 1 0;
        padding: 10px 0px;
        font-size: 0.9375rem;
        font-weight: 600;
        line-height: 2;
        color: #14213D;
        font-family: "Montserrat", sans-serif !important;
    }

      /* ======  ACTIONS  ====== */
      .tour-actions {
            flex: 1 1 0;
            display: flex;
            flex-direction: column;
            gap: 14px;
            padding: 10px 4px;
            border-left: 5px solid #eee;
        }
      .tour-card .btn {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 6px;
        font-size: .95rem;
        font-weight: 600;
        text-decoration: none;
        border-radius: var(--radius);
        border: 2px solid var(--brand-orange);
        cursor: pointer;
        transition: all .25s ease;
      }
      .tour-card .btn.primary {
            background: orange;
            color: #ffffff;
            border-radius: 5px;
            font-size: 0.875rem;
            font-weight: 600;
        }
      .tour-card .btn.secondary {
        background: orange;
        color: #ffffff;
        border-radius: 5px;
        font-size: 0.6875rem;
      }
      .tour-card .btn:hover { transform: translateY(-2px) scale(1.02); }
      .tour-card .btn svg, .btn .icon {
        margin-right: 6px;
        font-size: 1.1rem;
      }
      .available-dates li {
            position: relative;
            font-size: 0.9000rem;
            line-height: 1.4;
            color: #14213D;
            margin-bottom: 0.20rem;
            font-weight: 500;
            list-style: disc;
            margin-left: 12px;
            padding: 0px;
            font-family: "Montserrat", sans-serif !important;
        }
        .overlay_row {
            margin-bottom: 15px;
        }
        .grayContainer div {
            color: #CFCFCF !important;
            pointer-events: none;
        }

        /* Custom dash marker (—) */
       /* .tour_popup .available-dates li::before {
          content: ".";            
          position: absolute;
          left: 0;
          top: 0;
          font-weight: 600;
          line-height: inherit;
          color: #3a3a3a;      
          font-size: 0.8000rem;  
        }*/
</style>
{{--{{var_dump($country_areas_id)}}--}}
<?php $image_url = getenv('IMAGE_URL'); ?>
<div class="headingRow">
    <div class="sortByContainer">
        <div data-sortby="postdate-desc" class="sortBy <?php echo (isset($output['sortby']) && $output['sortby'] == 'postdate-desc') ? 'active' : (!isset($output['sortby'])?'active':''); ?>">NEWEST</div>
        <div data-sortby="price-desc" class="sortBy <?php echo (isset($output['sortby']) && $output['sortby'] == 'price-desc') ? 'active' : ''; ?>">Price (LOW-HIGH)</div>
        
        <!-- <div data-sortby="popular-desc" class="sortBy">POPULAR</div> -->
        <div data-sortby="mobility-desc" class="sortBy <?php echo (isset($output['sortby']) && $output['sortby'] == 'mobility-desc') ? 'active' : ''; ?>">MOBILITY (LOW-HIGH)</div>
    </div>
    <div class="pageViewContainer">
        <div data-view="grid" class="girdview viewBtn active">
            <div class="iconImage"><img src="images/icon-grid-active.svg" alt=""></div>
            <div class="iconImageActive"><img src="images/icon-grid-active.svg" alt=""></div>
        </div>
        <div data-view="row" class="rowview viewBtn">
            <div class="iconImage"><i class="fas fa-list-ul" style="color: #14213D;"></i></div>
            <div class="iconImageActive"><i class="fas fa-list-ul"></i></div>
        </div>
        <div data-view="map" class="mapview viewBtn" >
            <div class="iconImage"><img src="images/map.svg" alt=""></div>
            <div class="iconImageActive"><img src="images/map.svg" alt=""></div>
        </div>
    </div>
</div>
<style>
    .propertiesListContainer .container .containerRow .pageContent .propertiesWrapper .tableProperties .propRow .propItem .propContent .bottom .ctas .cta_row .cta {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    height: 35px;
    background: #FFD334;
    border-radius: 5px;
    text-decoration: none;
    text-align: center;
    font-size: 0.875rem;
    font-weight: 600;
    color: #FFF;
    outline: none;
    margin: 0 4px;
}
.propertiesListContainer .container .containerRow .pageContent .propertiesWrapper .tableProperties .propRow .propItem .propContent .bottom {
    display: flex
;
    margin-top: 4px;
    height: 90px;
}
.propertiesListContainer .container .containerRow .pageContent .propertiesWrapper .tableProperties .propRow .propItem .propContent .bottom .description {
    flex: 1;
    padding: 4px 10px;
    margin: auto 0px;
    height: 90px;
    display: flex
;
    flex-direction: column;
    /*justify-content: center;*/
}
</style>
<div class="propertiesWrapper">

     @if($view == 'row' || $view == 'map')
    <div class="accountContainer tableHeader" style="padding-top:0px;">
        <div class="accountRow">
            <div class="middleCol" id="middleCol">
                 @if(!empty($items[0]))
                     <div class="middleCol_row header">

                        <div class="column" style="width:30%;">
                            Package Name
                        </div>
                        <div class="column" style="width:20%;padding-left: 25px;">
                            Location
                        </div>
                        <!-- <div class="column" style="width:10%;">
                            Activity Level
                        </div> -->
                        <div class="column" style="width:15%;">
                            No. Available Dates
                        </div>
                        <div class="column" style="width:15%;">
                            VIP Experience
                        </div>
                         <div class="column" style="width:10%;">
                            Price from
                        </div>
                        <div class="column" style="width:10%;">
                            
                        </div>
                       
                    </div>
                
                
                    @foreach($items as $key => $item)
                    <?php 
                    $countryName = [];
                    foreach ($item->getCountryAreas as $cKey => $cValue){ 
                        $countryName[] = (!empty($item->getCountry->name)?$item->getCountry->name:'').' - '.(!empty($cValue->CountryArea->name)?$cValue->CountryArea->name:'');
                        $countryName = array_unique($countryName);
                    } 
                     $vips = array();
                        if(!empty($item->ExperienceAttractions)){
                            foreach ($item->ExperienceAttractions as $key => $value) {
                                if($value->type_id == 1){
                                    $vips[] = $value->name;
                                }
                            }
                        }
                        if(isset($output['experience_date']))
                        {
                            if(empty($item->dates))
                            {
                                continue;
                            }
                        }
                        $shipname = '';
                       
                        ?>
                             <div class="middleCol_row locInfo openBooking" id="openBooking-{{ $item->id }}" data-id="{{ $item->id }}" data-slug="{{ $item->slug_name }}" data-exp_type="{{ $item->exp_type }}" data-mobility="{{$item->mobility}}">
                                    
                                    <div class="column bold" style="width:30%;">
                                        <div class="package-name">
                                              <span class="package_name">{{$item->name}}</span>
                                             
                                              <?php 
                                              $lat = '';$lng = '';
                                               if($item->exp_type == 3)
                                               {
                                                    if(!empty($item->ExperienceHotels)){
                                                        foreach ($item->ExperienceHotels as $key => $value) {
                                                            
                                                                $lat = $value->latitude;
                                                                $lng = $value->longitude;
                                                            break;
                                                        }
                                                    }
                                                }
                                               
                                              ?>
                                              <input type="hidden" id="local_lat_{{ $item->id }}" name="local_lat_{{ $item->id }}" value="{{!empty($lat)?$lat:''}}">
                                              <input type="hidden" id="local_lng_{{ $item->id }}" name="local_lng_{{ $item->id }}" value="{{!empty($lng)?$lng:''}}">
                                              <input type="hidden" id="local_date_{{ $item->id }}" name="local_date_{{ $item->id }}" value="{{($item->dates != 'on request')?count(explode(',',$item->dates)):$item->dates}}">
                                              
                                                <div class="tour_popup">
                                                    @if(isset($item->experienceImages[0]))
                                                        <img class="package_img" src="{{ $image_url.'storage/'.$item->experienceImages->offsetGet(0)->file }}" alt="Regal Scotland">
                                                    @else
                                                        <img class="package_img" src="#" alt="Image">
                                                    @endif
                                                    <div class="tour_content">  
                                                      <h4>{{$item->name}}</h4>
                                                      <p class="package_desc">{!! mb_strimwidth($item->excerpt, 0, 200, '...') !!}</p>
                                                      <h5 class="mt-3 mb-2" style="font-weight: 600;">Available Dates</h5>

                                                      @if($item->dates != '')
                                                      <ul class="available-dates">
                                                        <?php 
                                                        $dar = explode(',',$item->dates);
                                                        foreach($dar as $dd){ ?> 
                                                            <li>{{$dd}} </li>
                                                        <?php } ?>
                                                        </ul>
                                                      @else
                                                      <p>on request</p>
                                                      @endif
                                                    </div>
                                                </div>
                                              </div>
                                         
                                    </div>

                                    <div class="column" style="width:20%;padding-left: 25px;">
                                        <?php echo implode(', <br>',$countryName); ?>
                                    </div>

                                    <!-- <div class="column" style="width:10%;">
                                        <div class="squares">
                                            <div class="square <?php echo ($item->mobility >= 1) ? 'filled' : ''; ?>"></div>
                                            <div class="square <?php echo ($item->mobility >= 2) ? 'filled' : ''; ?>"></div>
                                            <div class="square <?php echo ($item->mobility >= 3) ? 'filled' : ''; ?>"></div>
                                            <div class="square <?php echo ($item->mobility >= 4) ? 'filled' : ''; ?>"></div>
                                            <div class="square <?php echo ($item->mobility >= 5) ? 'filled' : ''; ?>"></div>
                                        </div>
                                    </div> -->
                                    <div class="column" style="width:15%;">
                                       @if($item->dates != '')
                                          {{count(explode(',',$item->dates))}}
                                          @else
                                          <p>on request</p>
                                          @endif
                                    </div>                                 
                                    <div class="column package_vip" style="width:15%;">
                                        <?php echo ($item->exp_type == 2)?$shipname:implode(', ', $vips); ?>
                                    </div>
                                    <div class="column package_price" style="width:10%;">
                                        &pound;{{ $item->price }}pp
                                    </div>
                                   <div class="column" style="width:10%;">
                                        <a href="@if (!empty($item->url)) {{ $item->url }} @elseif (!empty($item->htaccess_url)) {{ $item->htaccess_url }} @else {{ route('bowling.show', $item->slug_name) }} @endif" class="cta">
                                            View Product
                                        </a>
                                    </div>

                                </div>
                               
                    @endforeach
                @else
                <div class="propItem" style="margin-top: 10px;">
                    <h4>No products found.</h4>
                </div>
                @endif
            </div>
        </div>
    </div>
    @endif
    @if($view == 'grid')
    <div class="tableProperties">
        <div class="propRow">
            
            @foreach ($items as $item)
            <?php
            $item = (object) $item;
            $price = array();
            $dates_rates = array();
            $dates = array();
            $rates = array();

            $e_dates = array();
            
              
           
            $vips = array();
            if(!empty($item->ExperienceAttractions)){
                foreach ($item->ExperienceAttractions as $key => $value) {
                    if($value->type_id == 1){
                        $vips[] = $value->name;
                    }
                }
            }
            if(isset($output['experience_date']))
            {
                if(empty($dates))
                {
                    continue;
                }
            }
            // pr($rates);
            // pr($item->rate);
            ?>
                <div class="propItem">
                    <div class="propContent">

                        @if(isset($item->experienceImages[0]))
                            <div class="top" style="background-image: url('{{ $image_url."storage/".$item->experienceImages->offsetGet(0)->file }}')">
                        @else
                            <div class="top">
                        @endif

                            <div class="location__price">
                                <div class="location">
                                    {{ $item->name }}
                                </div>
                                <div class="price">
                                    <small>from</small>
                                    <?php if(!empty($rates)){ ?>
                                        &pound;{{ min($rates) }}pp
                                    <?php } else{ if(!empty($item->rate)){ ?>
                                        &pound;{{ $item->rate}}pp
                                    <?php } } ?>
                                </div>
                            </div>

                            <div class="overlay">

                                <div class="overlay_row name">
                                    <p>{{ $item->name }}</p>
                                </div>

                                <div class="overlay_row county">
                                    <p>Kent</p>
                                </div>

                                <div class="overlay_row price">
                                    <?php if(!empty($price)){ ?>
                                    <p>&pound;{{ min($price) }}pp</p>
                                    <?php } ?>
                                </div>

                                <div class="overlay_row date">
                                    <div class="heading">Date</div>
                                    <p><?php echo (!empty($dates) ? implode(', ', $dates) : 'on request' ); ?></p>
                                </div>
                                <div class="overlay_row type">
                                    <div class="heading">Accommodation</div>
                                    <p>{{!empty($item->accommodation)?$item->accommodation:''}}</p>
                                    </div>
                                <div class="overlay_row type">
                                    <div class="heading">Fixtures</div>
                                    <p>{{!empty($item->fixture_option)?'e.g. '.$item->fixture_option.' Fixtures':''}}</p>
                                </div>
                                <!-- <div class="overlay_row type">
                                    <div class="heading">Type</div>
                                    <p>DBB</p>
                                </div> -->

                                <!-- <div class="overlay_row vip">
                                    <div class="heading">VIP Experience</div>
                                    <p><?php echo implode(', ', $vips); ?></p>
                                </div>

                                <div class="overlay_row activity_level">
                                    <div class="heading">Activity Level</div>
                                    <div class="squares">
                                        <div class="square <?php echo ($item->mobility >= 1) ? 'filled' : ''; ?>"></div>
                                        <div class="square <?php echo ($item->mobility >= 2) ? 'filled' : ''; ?>"></div>
                                        <div class="square <?php echo ($item->mobility >= 3) ? 'filled' : ''; ?>"></div>
                                        <div class="square <?php echo ($item->mobility >= 4) ? 'filled' : ''; ?>"></div>
                                        <div class="square <?php echo ($item->mobility >= 5) ? 'filled' : ''; ?>"></div>
                                    </div>
                                </div> -->

                                <div class="overlay_row add_to_cart">
                                    <p>
                                        <a href="#">
                                            <i class="fas fa-cart-arrow-down"></i>
                                        </a>
                                    </p>
                                </div>

                            </div>

                        </div>

                        <div class="bottom">

                            <div class="description">

                                <div class="heading">
                                    {{ $item->name }}
                                </div>

                                <p>
                                    {!! \Illuminate\Support\Str::limit($item->excerpt, 100, '...') !!}

                                </p>

                            </div>

                            <div class="ctas">
                                 <div class="cta_row">

                                    <a href="@if (!empty($item->url)) {{ $item->url }} @elseif (!empty($item->htaccess_url)) {{ $item->htaccess_url }} @else {{ route('bowling.show', $item->slug_name) }} @endif" class="cta">
                                        View Product
                                    </a>

                                </div>

                                <!-- <div class="cta_row">
                                    <?php if(check_allow_booking()){ ?>
                                    <a href="@if (!empty($item->url)) {{ $item->url }} @elseif (!empty($item->htaccess_url)) {{ $item->htaccess_url }} @else {{ route('bowling.show', $item->slug_name) }} @endif" class="cta cart">
                                        <i class="fas fa-cart-arrow-down"></i> Add to cart
                                    </a>
                                    <?php } ?>
                                    <a href="#" class="cta heart" style="background:lightgrey;pointer-events: none;">
                                        <i class="fas fa-heart"></i>
                                    </a>

                                </div> -->

                            </div>

                            @if(isset($item->experienceImages[0]))
                                <div class="img" style="background-image: url('{{ $image_url."storage/".$item->experienceImages->offsetGet(0)->file }}')"></div>
                            @endif

                        </div>

                    </div>
                </div>

                {{-- <div class="propertyItem">
                    <div class="propertyContent">
                        <div class="topBox">
                            <div class="col0"><strong>Type</strong>DBB</div>
                            <div class="col1">{{ $item->name }}</div>
                            <div class="col2"><strong>County</strong>Kent</div>
                            <div class="col3">
                                <strong>Activity Level</strong>
                                <div class="squareRow">
                                    <span class="square filled"></span>
                                    <span class="square filled"></span>
                                    <span class="square filled"></span>
                                    <span class="square"></span>
                                    <span class="square"></span>
                                </div>
                            </div>
                            <div class="col4"><strong>Date</strong>Jul '21</div>
                            <div class="col5"><strong>VIP Experience</strong>Peebles Hydro</div>
                            <div class="col6">£{{ $item->price }}pp</div>
                            <div class="col7"><a class="add2cartBtn" href=""><i class="fas fa-cart-arrow-down"></i></a></div>
                        </div>
                        <div class="bottomBox">
                            <div class="imageBox">
                                --                                                @foreach ($item->experienceImages as $image)--
                                --                                                    {{ $image->file }}<br>--
                                --                                                @endforeach--
                                @if (isset($item->experienceImages[0]))
                                    <img src="{{ $image_url.'storage/'.$item->experienceImages->offsetGet(0)->file }}" alt="">
                                @endif
                            </div>
                            <div class="descriptionRow">
                                <div class="heading">
                                    <h2>{{ $item->name }}</h2>

                                    <div class="priceCont"><small>from&nbsp;</small><span class="price">£{{ $item->price }}pp</span></div>
                                </div>

                                <div class="description">
                                    {!! str_limit($item->excerpt, $limit = 95, $end = '...') !!}
                                </div>

                               <div class="buttonsHolder">
                                    <div class="viewBtnCont">
                                        <a class="viewBtn" href="@if ($item->url) {{ $item->url }} @elseif ($item->htaccess_url) {{ $item->htaccess_url }} @else {{ route('bowling.show', $item->slug_name) }} @endif">View Product</a>
                                    </div>
                                    <div class="buttonsRow">
                                        <?php if(check_allow_booking()){ ?>
                                        <a class="add2cartBtn" href="@if ($item->url) {{ $item->url }} @elseif ($item->htaccess_url) {{ $item->htaccess_url }} @else {{ route('bowling.show', $item->slug_name) }} @endif"><i class="fas fa-cart-arrow-down"></i> Add to cart</a>
                                        <?php } ?>
                                        <a class="add2favorites" href=""><i class="fas fa-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}

            @endforeach
      
        </div>
    </div>
    @endif
    <div class="tableMap" style="display:none;">
        
          <div class="map" id="map" style="width: 100%; height: 800px;">
             <img src="{{ asset('images/map-holder1.png') }}" alt="placeholder only" style="margin: 0px auto;">
         </div>
    </div>
    <input type="hidden" id="selectlat" value="">
    <input type="hidden" id="selectlon" value="">
    <!-- <script src="https://maps.google.com/maps/api/js?key=AIzaSyCrYs9n66w0Yh7bzhzRpWQCZ_QHavCZRow" type="text/javascript"></script> -->
     
<script type="text/javascript">
    $(document).ready(function(){

       var view = '<?=$view?>';

       $('.viewBtn').removeClass('active');
       $('.sortByContainer').removeClass('grayContainer');
       if(view == 'grid')
       {
        $('.girdview').addClass('active');
        $('.tableHeader').hide();
        $('.tableMap').hide();
        $('.tableProperties').show();
        $('#inputView').val('grid');
        
       }
       else if(view == 'map')
       {
        init_map();
        $('.mapview').addClass('active');
        $('.tableHeader').hide();
        $('.tableProperties').hide();
        $('.tableMap').show();
        $('#inputView').val('map');
        $('.sortByContainer').addClass('grayContainer');
        
       }
       else
       {
        $('.rowview').addClass('active');
        $('.tableProperties').hide();
        $('.tableMap').hide();
        $('.tableHeader').show();
        $('#inputView').val('row');
       }

     });
    
     var image_url = "<?=URL('images/')?>";
     var site_url = "<?=URL('/')?>";
    function init_map(){
        var i = 1;
        let locations = [[],[], [], []];
       /*var locations = [
            ['Hyde Park, London', 51.507268, -0.165730, 4],
            ['Edinburgh Castle, Edinburgh', 55.948594, -3.199913, 5],
            ['Cardiff Castle, Cardiff', 51.481667, -3.181111, 3],
            ['The Shambles, York', 53.959100, -1.080310, 2],
            ['Clifton Suspension Bridge, Bristol', 51.454513, -2.627920, 1]
        ];*/

        $('.locInfo').each(function(){
            var type = 'local';
            var id = $(this).data("id");
            var slug = $(this).data("slug");
            var exp_type = $(this).data("exp_type");
            var mobility = $(this).data("mobility");
            var lat = $('#local_lat_'+id).val();
            
            var lng = $('#local_lng_'+id).val();
            var dates = $('#local_date_'+id).val();
            var name = $(this).find('.package_name').text().trim();
            var price = $(this).find('.package_price').text().trim();
            var vip = $(this).find('.package_vip').text().trim();
            var desc = $(this).find('.package_desc').html().trim();
            var image_src = $(this).find('.package_img').attr('src');
            console.log(image_src);
            if(lat != '' && lat != undefined)
            {
               
                locations.push( [name,lat,lng,image_src,price,desc,id,exp_type,vip,dates,mobility,slug, i]);
                i++;
            }
            
        });
        let selectedMarker = null;
        console.log(locations);
        if($("#selectlat").val() != ""){
        var dfaltLat = $("#selectlat").val();
        }else{
        var dfaltLat = '51.5072';
        }
        
        if($("#selectlon").val() != ""){
        var dfaltLng = $("#selectlon").val();
        }else{
        var dfaltLng = '0.1276';
        }
        
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 6,
            center: new google.maps.LatLng(dfaltLat,dfaltLng),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        var infowindow = new google.maps.InfoWindow();
        var marker, i;
        for (i = 0; i < locations.length; i++) {  
           // console.log(locations[i])
             var add_link = '';

           var night_day = '';
         
           if(locations[i][7] == 2)
            {
                var icon_url = image_url+'/pin_blue.png';
                 var viewurl = site_url+'/cruise/'+locations[i][11];
            }
            else
            {
                var icon_url = image_url+'/pin_black.png';
                var viewurl = site_url+'/bowling/'+locations[i][11];
            }
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                scaledSize: new google.maps.Size(20, 20), // scaled size
                map: map,
                icon: icon_url
            });
            marker.originalIcon = icon_url; // Save original icon on marker

            var img_str = '';
            if (locations[i][3] != '')
            {
                 var img_str =''+locations[i][3]+'" alt="'+locations[i][0]+'" />';
            }
            

            const contentString = 
          '<div class="tour-card">'+
            '<div class="tour-image">'+
              '<img src="'+img_str+'" alt="Scottish Palace" />'+
              '<div class="tour-info">'+
                '<h2>'+locations[i][0]+'</h2>'+
                '<div class="price"><span>from</span>'+locations[i][4]+'</div>'+
              '</div>'+
               '<div class="overlay-box">'+
                '<div class="overlay_row date">'+
                    '<div class="heading">Date</div>'+
                    '<p>On request</p>'+
                '</div>'+
                '<div class="overlay_row vip">'+
                    '<div class="heading">'+((locations[i][7] == 2) ? 'Ship Name' : 'VIP Experience')+'</div>'+
                    '<p> '+locations[i][8]+'</p>'+
                '</div>'+
                '<div class="overlay_row activity_level">'+
                    '<div class="heading">Activity Level</div>'+
                    '<div class="squares">'+
                        '<div class="square '+((locations[i][10] >= 1) ? 'filled' : '')+'"></div>'+
                        '<div class="square '+((locations[i][10] >= 2) ? 'filled' : '')+'"></div>'+
                        '<div class="square '+((locations[i][10] >= 3) ? 'filled' : '')+'"></div>'+
                        '<div class="square '+((locations[i][10] >= 4) ? 'filled' : '')+'"></div>'+
                        '<div class="square '+((locations[i][10] >= 5) ? 'filled' : '')+'"></div>'+
                    '</div>'+
                '</div>'+
              '</div>'+
            '</div>'+

            '<div class="tour-body">'+
              '<div class="tour-description">'+locations[i][5]+'</div>'+

              '<div class="tour-actions">'+
                '<a class="btn primary" target="_blank" href="'+viewurl+'">View Product</a>'+
                /*'<a class="btn secondary" target="_blank" href="'+viewurl+'"><span class="icon"> <i class="fas fa-cart-arrow-down" style="font-size: 0.60em;"></i> </span> Add to cart</a>'+*/
              '</div>'+
            '</div>'+
          '</div>';
        /*const contentString = 
          '<div class="tour-card">'+
            '<div class="tour-image">'+
              '<img src="https://tours-system-com.stackstaging.com/storage/experience_images/XP3lij6r8NivAqSd36ZE9orBmdX9Dh4Efce67YOu.jpg" alt="Scottish Palace" />'+
              '<div class="tour-info">'+
                '<h2>Regal Scotland</h2>'+
                '<div class="price"><span>from</span> £379pp</div>'+
              '</div>'+
            '</div>'+

            '<div class="tour-body">'+
              '<div class="tour-description">'+
                "Staying at the Gin Palace at Peeble's Hydro, established in 1881, this royal journey "+
                "leads you through the majesty of Scotland."+
              '</div>'+

              '<div class="tour-actions">'+
                '<a class="btn primary" href="#">View Product</a>'+
                '<a class="btn primary" href="#"><span class="icon"> <i class="fas fa-shopping-cart"></i> </span> Add to cart</a>'+
              '</div>'+
            '</div>'+
          '</div>';*/
           /* const contentString =
    "<p><b>Uluru</b>, also referred to as <b>Ayers Rock</b>, is a large " +
    "sandstone rock formation in the southern part of the " +
    "Northern Territory, central Australia. It lies 335&#160;km (208&#160;mi) " +
    "south west of the nearest large town, Alice Springs; 450&#160;km " +
    "(280&#160;mi) by road. Kata Tjuta and Uluru are the two major " +
    "features of the Uluru - Kata Tjuta National Park. Uluru is " +
    "sacred to the Pitjantjatjara and Yankunytjatjara, the " +
    "Aboriginal people of the area. It has many springs, waterholes, " +
    "rock caves and ancient paintings. Uluru is listed as a World " +
    "Heritage Site.</p>" +
    '<p>Attribution: Uluru, <a class="btn btn-primary" href="https://en.wikipedia.org/w/index.php?title=Uluru&oldid=297882194">' +
    "Add</a> " +
    "(last visited June 22, 2009).</p>";*/
           var orangeIcon = image_url+'/pin_orange.png';
            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    if (selectedMarker) {
                        selectedMarker.setIcon(selectedMarker.originalIcon);
                    }

                    marker.setIcon(orangeIcon);
                    selectedMarker = marker;
                    infowindow.setContent(contentString);
                    infowindow.open(map, marker);
                }
            })(marker, i));

            // Reset marker icon when the infowindow is closed
            google.maps.event.addListener(infowindow, 'closeclick', function() {
                if (selectedMarker) {
                    selectedMarker.setIcon(selectedMarker.originalIcon);
                    selectedMarker = null;
                }
            });
        }
         //new MarkerClusterer({ marker, map });
    }

   

      $('.viewBtn').on("click", function (e) {
       var view = $(this).data('view');
       $('.sortByContainer').removeClass('grayContainer');
       $('.viewBtn').removeClass('active');
       if(view == 'grid')
       {
        $('.girdview').addClass('active');
        $('.tableHeader').hide();
        $('.tableMap').hide();
        $('.tableProperties').show();
        $('#inputView').val('grid');
        $("#filterForm").submit();
        
       }
       else if(view == 'map')
       {
        
        init_map();
        $('.mapview').addClass('active');
        $('.tableHeader').hide();
        $('.tableProperties').hide();
        $('.tableMap').show();
        $('#inputView').val('map');
        $("#filterForm").submit();
        $('.sortByContainer').addClass('grayContainer');
        
       }
       else
       {
        $('.rowview').addClass('active');
        $('.tableProperties').hide();
        $('.tableMap').hide();
        $('.tableHeader').show();
        $('#inputView').val('row');
        $("#filterForm").submit();
       }

     })
</script>
</div>
