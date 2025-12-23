{{--{{var_dump($country_areas_id)}}--}}
<?php $image_url = getenv('IMAGE_URL'); ?>
<div class="headingRow">
    <div class="sortByContainer">
        <div data-sortby="postdate-desc" class="sortBy <?php echo (isset($output['sortby']) && $output['sortby'] == 'postdate-desc') ? 'active' : (!isset($output['sortby'])?'active':''); ?>">NEWEST</div>
        <div data-sortby="price-desc" class="sortBy <?php echo (isset($output['sortby']) && $output['sortby'] == 'price-desc') ? 'active' : ''; ?>">Price (LOW-HIGH)</div>
        
        <!-- <div data-sortby="popular-desc" class="sortBy">POPULAR</div> -->
        <div data-sortby="mobility-desc" class="sortBy <?php echo (isset($output['sortby']) && $output['sortby'] == 'mobility-desc') ? 'active' : ''; ?>"><!-- MOBILITY (LOW-HIGH) --></div>
    </div>
    <div class="pageViewContainer">
        <div data-view="grid" class="viewBtn active">
            <div class="iconImage"><img src="images/icon-grid.svg" alt=""></div>
            <div class="iconImageActive"><img src="images/icon-grid-active.svg" alt=""></div>
        </div>
        <div data-view="row" class="viewBtn" style="pointer-events: none;">
            <div class="iconImage"><i class="fas fa-list-ul"></i></div>
            <div class="iconImageActive"><i class="fas fa-list-ul"></i></div>
        </div>
        <div data-view="map" class="viewBtn" style="pointer-events: none;">
            <div class="iconImage"><img src="images/icon-map.svg" alt=""></div>
            <div class="iconImageActive"><img src="images/icon-map-active.svg" alt=""></div>
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

    <div class="tableHeader">
        <div class="col1">Package Name</div>
        <div class="col2">County</div>
        <div class="col3">Activity Level</div>
        <div class="col4">Date</div>
        <div class="col5">VIP Experience</div>
        <div class="col6">Price (pp)</div>
        <div class="col7">Add to cart</div>
    </div>

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

</div>
