
<form method="post" class="addToCartForms" id="addToCartForm3" action="{{ route('add-to-cart-3') }}">
    <div class="cart_popup" style="margin: 0;padding: 50px;max-width: none;">
        {{ csrf_field() }}
        <div class="heading">
            Add to cart
        </div>
        <div class="section">

            <div class="heading">
                {{ $item['experience_date']["experience"]["name"] }}
            </div>
             <p class="large">
                <strong>{{ date("D d M", strtotime($item['experience_date']["date_from"])) }} - {{ date("D d M 'y", strtotime($item['experience_date']["date_from"])) }} ( {{ $item["nights"] }} @if($item["nights"] > 1) nights @else night @endif )</strong> 
                <a href="#dateSelect" class="change_cta" id="changeDatesButton">change</a>
                <script>
                    $("#changeDatesButton").click(function(e){
                        e.preventDefault();
                        $.fancybox.close(true);
                        var targetElem = $(this).attr('href');
                        $('html, body').animate({
                            scrollTop: $(targetElem).offset().top
                        }, 500);
                        $(targetElem).focus();
                    });
                </script>
            </p>
        </div>
        <div class="section">
            <div class="heading">
                Choose your hotel 
                <a href="#" class="change_cta">change</a>
            </div>
            <div class="listings">
                <div class="listing chosen">
                    <div class="body hotelItem" id="item-{{ $item['id'] }}">

                        <div class="image">
                            @if(count($item['hotel']['hotel_images']) > 0)
                                <img src="{{ asset('storage/'.$item['hotel']['hotel_images'][0]['file']) }}" alt="@if($item['hotel']['hotel_images'][0]['name']) {{ $item['hotel']['hotel_images'][0]['name'] }} @else {{ $item['hotel']['name'] }} @endif">
                            @endif
                        </div>

                        <div class="info">
                            <div class="name">
                                {{ $item['hotel']['name'] }}
                            </div>
                            <div class="stars">
                                @if ( $item['hotel']['stars'] > 0 )
                                    <span class="starsCont">
                                        @for ($i = 0; $i < $item['hotel']['stars']; $i++)
                                            <i class="fas fa-star"></i>
                                        @endfor
                                    </span>
                                @endif
                            </div>
                            <div class="price">
                                &pound;<span class="priceValue">{{ $item['price'] - $basePrice }}</span>pp / &pound;<span class="priceSSValue">{{ $item['price_ss'] - $basePriceSS }}</span>ss
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if(count($item['hotel']["upscales"]) > 0)
        <style type="text/css">
            .selected {
                border: solid 2px #FCA311;
            }
        </style>
        <div class="section">
            <div class="heading">
                Upscale your experience further
            </div>
            <div class="listings">
                @foreach($item['hotel']['upscales'] as $upscale)
                <div class="listing upscaleItem" id="upscale-item-{{ $upscale['id'] }}" data-id="{{ $upscale['id'] }}">
                    <div class="body">
                        <div class="image">
                            @if(count($upscale['upscale_images']) > 0)
                                <img src="{{ asset('storage/'.$upscale['upscale_images'][0]['file']) }}" alt="@if($upscale['upscale_images'][0]['name']) {{ $upscale['upscale_images'][0]['name'] }} @else {{ $upscale['name'] }} @endif">
                            @endif
                        </div>
                        <div class="info">
                            <div class="name">
                                {{ $upscale['name'] }}
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor.
                            </p>
                            <div class="price">
                                &pound;<span class="priceValue">{{ $upscale['price'] }}</span>pp
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
        <div class="footer">

            <p class="large">
                All rates subject to change and availability at the time of booking
            </p>

            <div class="prices_wrapper">

                <div class="label">
                    Total:
                </div>

                <div class="prices">
                    <input type="hidden" name="collaborator_id" id="collaborator_id" value="{{ $collaborator_id }}">
                    <input type="hidden" name="experiences_to_hotels_to_experience_dates_id" id="experiences_to_hotels_to_experience_dates_id" value="{{ $item['id'] }}">
                    <input type="hidden" name="basePrice" id="basePrice" value="{{ $basePrice }}">
                    <input type="hidden" name="basePriceSS" id="basePriceSS" value="{{ $basePriceSS }}">
                    <input type="hidden" name="hotelPrice" id="hotelPrice" value="{{ $item['price'] }}">
                    <input type="hidden" name="hotelPriceSS" id="hotelPriceSS" value="{{ $item['price_ss'] }}">
                    <div class="price large">
                        &pound;<span id="totalPrice">{{ $item['price'] }}</span><small>pp</small>
                    </div>

                    <div class="price">
                        &pound;<span id="totalPriceSS">{{ $item['price_ss'] }}</span><small>ss pp</small>
                    </div>

                </div>

            </div>
            <div class="actionsRow" id="actionsRow">
                <a href="javascript:;" class="add_cta" id="addToCartForm3Submit">
                    <i class="fas fa-cart-arrow-down"></i> Add to cart
                </a>
            </div>

        </div>
    
    </div>
</form>


