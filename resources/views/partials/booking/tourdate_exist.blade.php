<style type="text/css">
    .selected{border: 3px solid orange;}
    .button_selected{background-color: orange; padding: 20px 5px;color: #ffffff !important;border-color: #ffffff !important;}
    .date{padding: 20px 5px;}
    .clickDiv{cursor: pointer;}
    #addToCartForm2Submit {
        background: #FCA311;
        padding: 10px 30px;
        color: #fff;
        font-size: 20px;
        font-weight: bold;
        border-radius: 5px;
        margin: 10px 0px;
        display: inline-block;
    }
    .carousel-indicators li {
        width: 25px;
        height: 25px;
        /* border-radius: 50%; */
        text-indent: 0;
        text-align: center;
        color: #000;
        font-weight: 600;
        font-size: 16px;
        margin: 0;
        background: #fff;
    }
    .carousel-indicators li:first-child {
        border-radius: 15px 0px 0px 15px;
        padding-left: 10px;
    }
    .carousel-indicators li:last-child{
        border-radius: 0px 15px 15px 0px;
        padding-right: 10px;
    }
    .carousel-indicators .active {
        text-decoration: underline;
    }
    .carousel-control-prev, .carousel-control-next {
        position: absolute;
        display: flex;
        align-items: center;
        justify-content: center;
        width: auto;
        color: #ffffff;
        text-align: center;
        opacity: 1;
        background: orange;
        border-radius: 50%;
        padding: 5px;
        bottom: 41%;
        top: auto;
        margin: 5px;
    }
</style>
    <div class="cart_popup" style="margin: 0;padding: 50px;max-width: none;">
        {{ csrf_field() }}
        <div class="popup_heading">
            Add to cart
        </div>
        <div class="heading">
            You have a tour in your cart that has the same Dates as this tour. Therefore you can not add this tour to your cart.
        </div>
    </div>
