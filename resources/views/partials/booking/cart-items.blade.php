<style type="text/css">
    

.cart_wrapper .cart .footer1 {
    display: flex
;
    flex-direction: column;
    width: 100%;
    max-width: 1280px;
    margin: 60px auto 0 auto !important;
}
.cart_wrapper .cart .footer1 p {
    font-size: 1.5625rem;
    font-weight: 600;
    line-height: 1.5;
    text-align: center;
    color: #14213D;
}
.cart_wrapper .cart .footer1 a.book_cta {
    display: flex
;
    align-items: center;
    justify-content: center;
    background: #FCA311;
    border-radius: 5px;
    text-decoration: none;
    text-align: center;
    font-size: 1.635rem;
    font-weight: 600;
    color: #FFF;
    outline: none;
    padding: 40px 100px;
    margin: 40px auto 0 auto;
}
</style>
    <!-- Sweet Alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- ----------- -->
    <?php $image_url = getenv('IMAGE_URL'); ?>
@if(isset($cart) && count($cart) > 0)
@foreach($cart as $carts)

    @foreach($carts['cart_experiences'] as $item)
    <?php /*if($item["tour_type"] == 1){*/ ?> 
        <?php if($item["currency"] == 2)
            {
                
                $currency_symbol = '€';

            }
            else
            {
                
                $currency_symbol = '£';
            }?>
        <div class="section experienceItem" id="item-{{ $item['id'] }}" data-id="{{ $item['id'] }}">
            <div class="image">
                @if(count($item['experience_images']) > 0)
                    <img src="{{ $image_url.'storage/'.$item['experience_images'][0]['file'] }}" alt="@if($item['experience_images'][0]['name']) {{ $item['experience_images'][0]['name'] }} @else {{ $item['experience_name'] }} @endif">
                @endif
            </div>
            <div class="info">
                <div class="heading">
                    <?php  $bt_user_data = getUserData();?>
                    {{ $item['experience_name'] }} <span class="removeButton" style="float: right;font-size: 13px;text-transform: uppercase;"><a href="{{ route('delete-cart-experience', [$item['id'],$bt_user_data['id']]) }}" class="ajax removeLink" style="color: red;">Remove</a></span>
                </div>
                <div class="info_section">
                    <div class="info_table">
                        <div class="info_row header">
                            <div class="info_column">
                                Date
                                <!-- <a href="#" class="change_cta">change</a> -->
                            </div>
                            <div class="info_column end">
                                SINGLE SUPPLEMENT
                            </div>
                            <div class="info_column end">
                                PER PERSON
                            </div>
                        </div>
                        <div class="info_row">
                            <div class="info_column">
                                {{ date("D d M", strtotime($item["date_from"])) }} - {{ date("D d M 'y", strtotime($item["date_to"])) }} ( {{ $item["nights"] }} @if($item["nights"] > 1) nights @else night @endif )
                            </div>
                            <div class="info_column end">
                                {{$currency_symbol}}{{ $item['standard_price_ss'] }}
                            </div>
                            <div class="info_column end">
                                {{$currency_symbol}}{{ $item['standard_price'] }}
                            </div>
                        </div>
                    </div>
                </div>
                <?php if($item['tour_type'] == 1){ ?>
                <div class="info_section">
                    <div class="info_table">
                        <div class="info_row header">
                            <div class="info_column">
                                Hotels
                                <!-- <a href="#" class="change_cta">change</a> -->
                            </div>
                        </div>
                        <div class="info_row">
                            <div class="info_column">
                                {{ $item['hotel_name'] }}
                            </div>
                            <div class="info_column end">
                                {{$currency_symbol}}{{ $item['price_ss'] - $item['standard_price_ss'] }}
                            </div>
                            <div class="info_column end">
                                {{$currency_symbol}}{{ $item['price'] - $item['standard_price'] }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="info_section">
                    <div class="info_table">
                        <div class="info_row header">
                            <div class="info_column">
                                Experience upscales
                                <!-- <a href="#" class="change_cta">change</a> -->
                            </div>
                        </div>
                        @if(count($item['upscales']) > 0)
                            @foreach($item['upscales'] as $upscale)
                            <div class="info_row">
                                <div class="info_column">
                                    {{ $upscale['name'] }}
                                </div>
                                <div class="info_column end">
                                    &nbsp;
                                </div>
                                <div class="info_column end">
                                    {{$currency_symbol}}{{ $upscale['price'] }}
                                </div>
                            </div>
                            @endforeach
                        @else
                            <div class="info_row">
                                <div class="info_column">
                                    None Selected
                                </div>
                                <div class="info_column end">
                                    {{$currency_symbol}}0
                                </div>
                                <div class="info_column end">
                                    {{$currency_symbol}}0
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                 <?php } ?>
                 <?php if($item['tour_type'] == 2){ ?>
                @if(!empty($item['overnight_inbound']))
                <div class="info_section">
                    <div class="info_table">
                        <div class="info_row header">
                            <div class="info_column">
                                Overnights In
                                <!-- <a href="#" class="change_cta">change</a> -->
                            </div>
                        </div>
                        <div class="info_row">
                            <div class="info_column">
                                {{ $item['overnight_inbound'] }}
                            </div>
                            <div class="info_column end">
                                {{$currency_symbol}}0
                            </div>
                            <div class="info_column end">
                                {{$currency_symbol}}0
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                 @if(!empty($item['overnight_outbound']))
                <div class="info_section">
                    <div class="info_table">
                        <div class="info_row header">
                            <div class="info_column">
                                Overnights Out
                                <!-- <a href="#" class="change_cta">change</a> -->
                            </div>
                        </div>
                        <div class="info_row">
                            <div class="info_column">
                                {{ $item['overnight_outbound'] }}
                            </div>
                            <div class="info_column end">
                                {{$currency_symbol}}0
                            </div>
                            <div class="info_column end">
                                {{$currency_symbol}}0
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @if(!empty($item['crossing_inbound']))
                <div class="info_section">
                    <div class="info_table">
                        <div class="info_row header">
                            <div class="info_column">
                                Crossing In
                                <!-- <a href="#" class="change_cta">change</a> -->
                            </div>
                        </div>
                        <div class="info_row">
                            <div class="info_column">
                                {{ $item['crossing_inbound'] }}
                            </div>
                            <div class="info_column end">
                                {{$currency_symbol}}0
                            </div>
                            <div class="info_column end">
                                {{$currency_symbol}}0
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                 @if(!empty($item['crossing_outbound']))
                <div class="info_section">
                    <div class="info_table">
                        <div class="info_row header">
                            <div class="info_column">
                                Crossing Out
                                <!-- <a href="#" class="change_cta">change</a> -->
                            </div>
                        </div>
                        <div class="info_row">
                            <div class="info_column">
                                {{ $item['crossing_outbound'] }}
                            </div>
                            <div class="info_column end">
                                {{$currency_symbol}}0
                            </div>
                            <div class="info_column end">
                                {{$currency_symbol}}0
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                 <?php } ?>
                <div class="info_section totals">
                    <div class="price">
                        {{$currency_symbol}}{{ $item['price_ss'] }}
                    </div>
                    <div class="price large">
                        {{$currency_symbol}}{{ $item['total_price'] }}
                    </div>
                </div>
            </div>
        </div>
        <?php /*}*/ ?>
    @endforeach
    @endforeach


    <form method="GET" action="{{ route('finalize-cart') }}" id="bookNowForm">
        @csrf
        <div class="footer1">

            <p>
                <input type="checkbox" value="1" name="term_condition" id="term_condition" required style="height: 16px;width: 16px;"> Before completing your booking, please review our  <!-- <a href="/terms" style="color:#FCA311;">terms and conditions</a>. --> <a class="add_booking" id="t_link" style="color:#FCA311;" href="javascript:void(0)">terms and conditions</a>. 
                <input type="hidden" name="created_by" value="{{isset($_GET['bt_tour'])?$_GET['bt_tour']:''}}">
            </p>

            <a href="javascript:;" class="book_cta" id="bookNowButton">
                Book now
            </a>

        </div>
    </form>
<div class="modal fade bd-example-modal-lg" id="termModel" tabindex="-1" role="dialog" aria-labelledby="addFolderModalTitle" aria-hidden="true" style="overflow-y: auto;">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 900px;">
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
</div>
    <script>
        $('#downloadPDFhc').click(function(e) {
         //$('#tobeprinted').html(data.response); 
                w=window.open();
                w.document.write($('#tobeprinted').html());
                w.print();
                w.close(); 
    });
        $('#t_link').click(function(e){
        $('#termModel').modal('show');
        });
        $('#bookNowButton').click(function(e){
            e.preventDefault();

            if($('#term_condition').is(':checked') == false)
            {
                swal("Please accept terms and conditions.");
            }
            else
            {
                swal("Are you sure you want to book all items in the cart?", {
                    buttons: true
                }).then((willBook) => {
                    if (willBook) {
                        $('#bookNowForm').submit();
                    } else {
                        swal("Your cart items have not been booked yet!");
                    }
                });
            }
            
        });

        $(".removeLink").click(function(e){
            e.preventDefault(); // always prevent first

            let $link = $(this);

            if (confirm('Do you want to delete this item?')) {
                $link.html('<i class="fas fa-sync fa-spin"></i>');

                // redirect manually since we prevented default
                window.location.href = $link.attr('href');
            } else {
                // restore original text if cancelled
                $link.html('Remove');
            }
        });
    </script>
@else
<p><center>You have no experiences in the cart!</center></p>
@endif
