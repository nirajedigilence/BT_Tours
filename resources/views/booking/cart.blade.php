@extends('layouts.front')

@section('content')


    <div class="notIndexContainer" style="margin-bottom: 200px;">
        <div class="cart_wrapper">
            <div class="cart">

                <div class="section header">

                    <div class="heading">
                        Shopping cart ({{ (isset($cart[0])) ? count($cart[0]['cart_experiences']) : '0'}} @if(isset($cart[0]) && count($cart[0]['cart_experiences']) == 1) item) @else items) @endif
                    </div>

                </div>

              
                <div class="experiencesList" id="cartExperiencesList">
{{--                {{ dbg2($cart) }}--}}

                    @include ('partials.booking.cart-items', [
                                            'cart' => $cart
                                          ])

                </div>
              
            </div>
        </div>
    </div>
    
@endsection
