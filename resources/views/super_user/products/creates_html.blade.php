@extends('layouts.front')

@section('content')

<div class="notIndexContainer">

    <div class="accountContainer">
        <div class="mobMenuBtn only-mobile" id="topMenu">
            <input id="menu__toggle2" type="checkbox" />
            <label class="menu__btn" for="menu__toggle2">
                <span></span>
                <div class="message">MENU</div>
            </label>
        </div>

        <div class="accountRow">
            <div class="leftCol">
                @include('partials.super_user_left',['open_menu' => 'product', 'sub_marked' => 'current_products']);
            </div>

            <div id="cartExperiencesPart">
                <?php
                //echo "<pre>";
                //print_r($items);
                //echo "</pre>";
                //exit();
                // print_r($tourStatuses);
                ?>
                   <!-- <a class="orangeLink addProductBtn" href="{{ route('products-create') }}">Add Product</a> -->
{{-- <style type="text/css" media="screen">
    .accountContainer .accountRow #cartExperiencesPart .productsection{
        width: calc(100% - 50px);
        margin-left: 25px;
        float: left;
    }
    .orangeLink.btn.pullright {
        float: right;
    }
    .orangeLink.btn {
        float: left;
        background-color: #FCA311;
        color: #fff;
        font-size: 14px;
        padding: 6px 20px;
        border-radius: 4px;
        margin-right: 15px;
    }
    .orangeLink.btn:first-child {
        margin-right: 0px;
    }
    .header_part{
        float: left;
        width: 100%;
        margin-bottom: 15px;
    }
    .addProductBtn {
        width: 11%;
        height: 48px;
        background: #FCA311;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 10px;
        font-weight: 700;
        letter-spacing: 0px;
        color: #FFFFFF;
        font-size: 1.125;
        border-radius: 5px;
    }
    .fl_w{
        float: left;
        width: 100%;
    }
    .contentBooking{
        float: left;
        width: 100%;
        background-color: #eee;
        padding: 25px 20px 35px 35px;
    }
    .main_title{
        text-align: left;
        padding-top: 20px;
        padding-bottom: 20px;
        color: #333;
    }
    .white_part{
        float: left;
        width: 100%;
        background-color: #FFFFFF;
        padding: 20px 25px 25px;
        position: relative;
    }
    .white_part .form-group label{
        color: #999;
        font-size: 14px;
        float: left;
        width: 100%;
    }
    .white_part .part_one{
        width: 80%;
        float: left;
    }
    .white_part .part_two{
        width: 20%;
        float: left;
    }
    .custom_control {
        float: left;
        width: auto;
        padding-right: 12px;
    }
    .costcontrol input{
        max-width: 100px;
    }
    span.scoreperc {
        float: left;
        width: 100%;
        font-size: 20px;
        color: #008000;
        font-weight: bold;
    }
    .pullright{
        float: right;
    }
    .textright{
        text-align: right;
    }
    .fl_w.comman{
        padding-top: 15px;
    }
    span.levelbox {
        width: 18px;
        height: 18px;
        border: 1px solid #000;
        float: left;
        display: inline-block;
        margin-right: 4px;
        border-radius: 2px;
    }
    span.levelbox.fill {
        background-color: #333;
    }
    .boxes {
        float: left;
        width: auto;
        margin-right: 15px;
    }
    .note {
        float: left;
        width: auto;
        font-size: 13px;
    }
    .custom_full_control{
        float: left;
        width: 100%;
    }
    .custom_full_control textarea{
        width: 100%;
        float: left;
        padding: 5px;
        border-color: #ddd;
        border-radius: 2px;
    }
    .image_galller {
        float: left;
        width: 33.3%;
        border: 1px solid #ddd;
        height: 140px;
        display: inline-flex;
        margin-bottom: 15px;
    }
    a.addmorelnk {
        color: #FCA311;
        font-size: 13px;
        padding-top: 2px;
        float: left;
        width: 100%;
    }
    .browse_btn {
        width: 100%;
        height: 100%;
        position: relative;
        cursor: pointer;
        float: left;
    }
    .browse_btn input[type="file"] {
        position: absolute;
        width: 100%;
        height: 100%;
        opacity: 0;
        z-index: 1;
        cursor: pointer;
    }
    .brw_user_ic {
        font-size: 45px;
        color: #656565;
        left: 0;
        top: 0;
        position: absolute;
        transform: inherit;
        width: 100%;
        height: 100%;
        border-radius: 100%;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .brw_user_ic img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    input#user_image_upload {
        cursor: pointer;
    }
    .brw_user_ic .far {
        font-size: 60px;
        color: #ddd;
    }
    .brw_plus {
        font-size: 30px;
        padding-left: 15px;
        color: #ddd;
    }
    .rightContentDiv{
        float: left;
        width: 100%;
    }
    .contentDiv {
        float: left;
        width: 70%;
    }
    .rightSidebarDiv {
        float: right;
        width: calc(30% - 20px);
        background-color: #fff;
        height: 100%;
        padding: 15px 0px 0px;
    }
    .head_part_one {
        float: left;
        width: 40%;
        font-size: 14px;
        line-height: 35px;
    }
    .head_part_two {
        float: right;
        width: 60%;
    }
    .head_part_one label {
        padding-right: 20px;
        margin-bottom: 0px;
    }
    .head_part_one span {
        color: #000;
        font-weight: bold;
    }
    .sidebar_part_one{
        float: left;
        width: 100%;
        padding: 0px 20px;
    }
    .sidebar_part_one span.scoreperc{
        font-size: 50px;
        text-align: center;
    }
    .sidebar_part_one span.scorelabel {
        font-size: 15px;
        text-align: center;
        width: 100%;
        float: left;
        color: #000;
        text-transform: uppercase;
    }
    .sidebar_part_two, 
    .sidebar_part_three {
        float: left;
        width: 100%;
        margin-top: 25px;
        padding: 0px 20px;
    }
    .sidebar_part_two label,
    .sidebar_part_three label {
        font-size: 15px;
        width: 100%;
        float: left;
        color: #000;
        text-transform: uppercase;
    }
    .sidebar_part_two ul {
        padding-left: 15px;
        float: left;
        width: 100%;
    }
    .sidebar_part_two li {
        float: left;
        width: 100%;
        font-size: 14px;
        color: #000;
        list-style-type: disc;
        line-height: 1.7em;
        cursor: pointer;
    }
    .sidebar_part_two li.active {
        color: #ddd;
    }
    .pullleft{
        float: left;
    }
    .sidebar_part_three select{
        margin-bottom: 10px;
    }
    .sidebar_part_four {
        float: left;
        width: 100%;
        margin-top: 25px;
        background-color: #14213D;
        color: #fff;
        padding: 15px;
        font-size: 14px;
    }
    .sidebar_part_four label{
        font-size: 15px;
    }
    .costing_tbl{
        float: left;
        width: 100%;
        font-size: 12px;
        line-height: 1.7em;
    }
    .costing_tbl tbody tr td:first-child{
        color: #fff;
        font-weight: normal;
    }
    .closeIconDiv {
        position: absolute;
        top: 0;
        right: 10px;
    }
    a.closePartIcon {
        font-size: 20px;
        color: #999;
    }
    .main_title i.fas.fa-edit {
        color: #FCA311;
        cursor: pointer;
    }
    .repetedContentDiv{
        float: left;
        width: 100%;
    }
    .repetedContentDiv:first-child .main_title{
        text-align: center;
        padding-top: 0px;
    }
    .ele_hide{
        display: none;
    }
    input.inputTitle {
        width: 180px;
    }
    .brw_bx.image_galller{
        clear: both;
    }
    #cost:before {
        position: absolute;
        top: 0;
        left: 0;
        content:"\f154";
    }
</style> --}}
<link href="{{ asset('css/style-products.css') }}" rel="stylesheet">
{{-- <div class=""> --}}
    <div class="middleCol completedBooking productsection" id="middleCol">
    <div class="header_part">
        <div class="head_part_one">
            <label>Number</label>
            <span>A-00231</span>
        </div>
        <div class="head_part_two">
            <a class="orangeLink btn pullright" href="javascript:;">Delete</a>
            <a class="orangeLink btn pullright" href="javascript:;">Save and Publish</a>
            <a class="orangeLink btn pullright" href="javascript:;">Save</a>
            <a class="orangeLink btn pullright" href="javascript:;">Cost Calculator</a>
        </div>
    </div>
    <div class="rightContentDiv">
        @if(Session::has('success'))
            <div class="alert alert-success">
                {!! session('success') !!}
            </div>

            <script>
                $.ajaxSetup({ headers: {'X-CSRF-TOKEN': '{{csrf_token()}}'}});
                $.ajax({
                    type: "GET",
                    cache: false,
                    url: '{{ route('bookings-complete') }}',
                    success: function (data) {
                        // on success, post (preview) returned data in fancybox
                        $.fancybox.open(data, {
                            autoSize: false,
                            fitToView : false,
                            width: "70%",
                            height: "90%",
                            minWidth: 300,
                            touch: false,
                            afterLoad: function(){
                                $("#goToBookingsButton").click(function(e){
                                    e.preventDefault();
                                    $.fancybox.close(true);
                                    $('html, body').animate({
                                        scrollTop: $("#middleCol").offset().top
                                    }, 500);
                                });
                            }
                        });
                    },
                    error: function(er){
                        //console.log(er);
                    }
                });
            </script>

        @elseif(Session::has('error'))
            <div class="alert alert-error">
                {!! session('error') !!}
            </div>
        @endif
         <script>
            $("body").on("click", ".editTitle", function(e){
                if($(this).closest(".repetedContentDiv").find(".inputTitle").hasClass("ele_hide")){
                    $(this).closest(".repetedContentDiv").find(".inputTitle").removeClass("ele_hide");
                }else{
                    $(this).closest(".repetedContentDiv").find(".inputTitle").addClass("ele_hide");
                }
            });
        </script>
        <div class="contentBooking">
            <div class="contentDiv">
                <div class="repetedContentDiv">
                    <div class="fl_w main_title"><h2>New Product<input type="text" name="title" class="inputTitle ele_hide">&nbsp;<a href="javascript:;" class="editTitle"><i class="fas fa-edit"></i></a></h2></div>

                    <div class="white_part">
                        <div class="closeIconDiv">
                            <a class="closePartIcon" href="javascript:;"><i class="fas fa-times"></i></a>
                        </div>
                        <div class="part_one">
                            <div class="form-group">
                                <div class="custom_control">
                                    <label>Big Banner Experience</label>
                                    <input class="form-control" name="name" type="text" id="name" value="" maxlength="255" placeholder="Jaguar Land Rover">
                                </div>
                                <div class="custom_control costcontrol">
                                    <label>Cost</label>
                                    <input class="form-control" name="cost" type="text" id="cost" value="" placeholder="&#163;50pp">
                                </div>
                            </div>
                        </div>
                        <div class="part_two">
                            <div class="form-group">
                                <div class="custom_control pullright textright">
                                    <label>Score</label>
                                    <span class="scoreperc">71%</span>
                                </div>
                            </div>
                        </div>
                        <div class="fl_w comman part_three">
                            <div class="form-group">
                                <div class="custom_control">
                                    <label>Mobility Level</label>
                                    <div class="boxes">
                                        <span class="levelbox fill">&nbsp;</span>
                                        <span class="levelbox fill">&nbsp;</span>
                                        <span class="levelbox">&nbsp;</span>
                                        <span class="levelbox">&nbsp;</span>
                                        <span class="levelbox">&nbsp;</span>
                                    </div>
                                    <div class="note">Activity Level 2</div>
                                </div>
                            </div>
                        </div>
                        <div class="fl_w comman part_four">
                            <div class="form-group">
                                <div class="custom_full_control">
                                    <label>Story</label>
                                    <textarea rows="4"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="fl_w comman part_five">
                            <div class="form-group">
                                <div class="custom_full_control">
                                    <label>Experience</label>
                                    <textarea rows="4"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="fl_w comman part_six">
                            <div class="form-group">
                                <div class="custom_full_control">
                                    <label>Inclusions</label>
                                    <input class="form-control" name="inclusions" type="text" id="inclusions" value="" placeholder="Guided Factory">
                                    <a href="javascript:;" class="addmorelnk">Add More</a>
                                </div>
                            </div>
                        </div>
                        <div class="fl_w comman part_six">
                            <div class="form-group">
                                <div class="custom_full_control">
                                    <label>Gallery</label>
                                    <div class="image_galller"><img src="https://cdn.shopify.com/s/files/1/0022/6263/0500/files/ghj_large.jpg"></div>
                                    <div class="image_galller"><img src="https://cdn.shopify.com/s/files/1/0022/6263/0500/files/ghj_large.jpg"></div>
                                    <div class="image_galller"><img src="https://cdn.shopify.com/s/files/1/0022/6263/0500/files/ghj_large.jpg"></div>
                                    <div class="brw_bx image_galller">
                                        <div class="browse_btn">
                                            <input type="file" name="image" id="image_upload">
                                            <div class="brw_user_ic">
                                                <i class="far fa-images"></i>
                                                <div class="brw_plus">
                                                    <i class="fas fa-plus"></i>
                                                </div>
                                            </div>                                    
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="repetedContentDiv">
                    <div class="fl_w main_title"><h2>Big Banner</h2></div>

                    <div class="white_part">
                        <div class="closeIconDiv">
                            <a class="closePartIcon" href="javascript:;"><i class="fas fa-times"></i></a>
                        </div>
                        <div class="part_one">
                            <div class="form-group">
                                <div class="custom_control">
                                    <label>Big Banner Experience</label>
                                    <input class="form-control" name="name" type="text" id="name" value="" maxlength="255" placeholder="Jaguar Land Rover">
                                </div>
                                <div class="custom_control costcontrol">
                                    <label>Cost</label>
                                    <input class="form-control" name="cost" type="text" id="cost" value="" placeholder="&#163;50pp">
                                </div>
                            </div>
                        </div>
                        <div class="part_two">
                            <div class="form-group">
                                <div class="custom_control pullright textright">
                                    <label>Score</label>
                                    <span class="scoreperc">71%</span>
                                </div>
                            </div>
                        </div>
                        <div class="fl_w comman part_three">
                            <div class="form-group">
                                <div class="custom_control">
                                    <label>Mobility Level</label>
                                    <div class="boxes">
                                        <span class="levelbox fill">&nbsp;</span>
                                        <span class="levelbox fill">&nbsp;</span>
                                        <span class="levelbox">&nbsp;</span>
                                        <span class="levelbox">&nbsp;</span>
                                        <span class="levelbox">&nbsp;</span>
                                    </div>
                                    <div class="note">Activity Level 2</div>
                                </div>
                            </div>
                        </div>
                        <div class="fl_w comman part_four">
                            <div class="form-group">
                                <div class="custom_full_control">
                                    <label>Story</label>
                                    <textarea rows="4"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="fl_w comman part_five">
                            <div class="form-group">
                                <div class="custom_full_control">
                                    <label>Experience</label>
                                    <textarea rows="4"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="fl_w comman part_six">
                            <div class="form-group">
                                <div class="custom_full_control">
                                    <label>Inclusions</label>
                                    <input class="form-control" name="inclusions" type="text" id="inclusions" value="" placeholder="Guided Factory">
                                    <a href="javascript:;" class="addmorelnk">Add More</a>
                                </div>
                            </div>
                        </div>
                        <div class="fl_w comman part_six">
                            <div class="form-group">
                                <div class="custom_full_control">
                                    <label>Gallery</label>
                                    <div class="image_galller"><img src="https://cdn.shopify.com/s/files/1/0022/6263/0500/files/ghj_large.jpg"></div>
                                    <div class="image_galller"><img src="https://cdn.shopify.com/s/files/1/0022/6263/0500/files/ghj_large.jpg"></div>
                                    <div class="image_galller"><img src="https://cdn.shopify.com/s/files/1/0022/6263/0500/files/ghj_large.jpg"></div>
                                    <div class="brw_bx image_galller">
                                        <div class="browse_btn">
                                            <input type="file" name="image" id="image_upload">
                                            <div class="brw_user_ic">
                                                <i class="far fa-images"></i>
                                                <div class="brw_plus">
                                                    <i class="fas fa-plus"></i>
                                                </div>
                                            </div>                                    
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="repetedContentDiv">
                    <div class="fl_w main_title">
                        <h2>Map Visualization</h2>
                    </div>

                    <div class="white_part">
                        <div class="closeIconDiv">
                            <a class="closePartIcon" href="javascript:;"><i class="fas fa-times"></i></a>
                        </div>
                        
                        <div class="fl_w comman part_six">
                            <div class="form-group">
                                <div class="custom_full_control">
                                    <label>Map URL</label>
                                    <input class="form-control" name="inclusions" type="text" id="inclusions" value="" placeholder="Guided Factory">
                                    {{-- <a href="javascript:;" class="addmorelnk">Add More</a> --}}
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="repetedContentDiv">
                    <div class="fl_w main_title"><h2>Hotel</h2></div>

                    <div class="white_part">
                        <div class="closeIconDiv">
                            <a class="closePartIcon" href="javascript:;"><i class="fas fa-times"></i></a>
                        </div>
                        <div class="part_one">
                            <div class="form-group">
                                <div class="custom_control">
                                    <label>Hotel Name</label>
                                    <input class="form-control" name="name" type="text" id="name" value="" maxlength="255" placeholder="Jaguar Land Rover">
                                </div>
                                <div class="custom_control costcontrol">
                                    <label>Cost</label>
                                    <input class="form-control" name="cost" type="text" id="cost" value="" placeholder="&#163;50pp">
                                </div>
                                <div class="custom_control costcontrol">
                                    <label>Nights</label>
                                    <input class="form-control" name="cost" type="text" id="cost" value="" placeholder="4">
                                </div>
                            </div>
                        </div>
                        <div class="part_two">
                            <div class="form-group">
                                <div class="custom_control pullright textright">
                                    <label>Score</label>
                                    <span class="scoreperc">71%</span>
                                </div>
                            </div>
                        </div>
                        <div class="fl_w comman part_three">
                            <div class="form-group">
                                <div class="custom_control">
                                    <label>Start Rating</label>
                                   {{--  <div class="boxes">
                                        <span class="levelbox fill">&nbsp;</span>
                                        <span class="levelbox fill">&nbsp;</span>
                                        <span class="levelbox">&nbsp;</span>
                                        <span class="levelbox">&nbsp;</span>
                                        <span class="levelbox">&nbsp;</span>
                                    </div>
                                    <div class="note">Activity Level 2</div> --}}
                                </div>
                            </div>
                        </div>
                        <div class="fl_w comman part_four">
                            <div class="form-group">
                                <div class="custom_full_control">
                                    <label>Description</label>
                                    <textarea rows="4"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="fl_w comman part_six">
                            <div class="form-group">
                                <div class="custom_full_control">
                                    <label>Amenities</label>
                                    <input class="form-control" name="inclusions" type="text" id="inclusions" value="" placeholder="Guided Factory">
                                    <a href="javascript:;" class="addmorelnk">Add More</a>
                                </div>
                            </div>
                        </div>
                        <div class="fl_w comman part_six">
                            <div class="form-group">
                                <div class="custom_full_control">
                                    <label>Gallery</label>
                                    <div class="image_galller"><img src="https://cdn.shopify.com/s/files/1/0022/6263/0500/files/ghj_large.jpg"></div>
                                    <div class="image_galller"><img src="https://cdn.shopify.com/s/files/1/0022/6263/0500/files/ghj_large.jpg"></div>
                                    <div class="image_galller"><img src="https://cdn.shopify.com/s/files/1/0022/6263/0500/files/ghj_large.jpg"></div>
                                    <div class="brw_bx image_galller">
                                        <div class="browse_btn">
                                            <input type="file" name="image" id="image_upload">
                                            <div class="brw_user_ic">
                                                <i class="far fa-images"></i>
                                                <div class="brw_plus">
                                                    <i class="fas fa-plus"></i>
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
            <div class="rightSidebarDiv">
                <div class="sidebar_part_one">
                    <span class="scorelabel">Average Tour Score</span>
                    <span class="scoreperc">75%</span>
                </div>
                <div class="sidebar_part_two">
                    <label>Sections Completed</label>
                    <ul>
                        <li>VIP Experience</li>
                        <li>Big Banner</li>
                        <li class="active">Local Experience</li>
                        <li>Map</li>
                        <li>Hotel</li>
                    </ul>
                </div>
                <div class="sidebar_part_three">
                    <label>Add Section</label>
                    <select name="" class="form-control">
                        <option>VIP Experience</option>
                        <option>Big Banner</option>
                        <option>Local Experience</option>
                    </select>
                    <a class="orangeLink btn" href="javascript:;">Add</a>
                </div>
                <div class="sidebar_part_four">
                    <label>Estimated Costing</label>
                    <table class="costing_tbl">
                        <tr>
                            <td colspan="2">Hotel</td>
                            <td><i class="fas fa-pound-sign"></i>53.50pp</td>
                        </tr>
                        <tr>
                            <td colspan="2">Nights</td>
                            <td>4</td>
                        </tr>
                        <tr>
                            <td colspan="2">Attractions</td>
                            <td><i class="fas fa-pound-sign"></i>75.00pp</td>
                        </tr>
                        <tr>
                            <td colspan="2"><b>IN</b></td>
                            <td><b><i class="fas fa-pound-sign"></i>325.00pp</b></td>
                        </tr>
                        <tr>
                            <td><b>OUT</b></td>
                            <td><b>Margin 15%</b></td>
                            <td><b><i class="fas fa-pound-sign"></i>374.00pp</b></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div style="display: none;">
            @foreach($items as $key => $cartItem)
                @foreach($cartItem->cartExperiences as $item)
                    <div class="tourOverviewModal" id="tourOverviewModal-{{ $item->id }}">

                        <div class="tourOverviewCont">
                            <div class="modalHeading">Tour Overview</div>

                            <div class="tourContent">
                                <h3>{{ $item->experience_name }}</h3>
                                <span class="subHeading">{{ date("D d M", strtotime($item->date_from)) }} - {{ date("D d M 'y", strtotime($item->date_to)) }} ( {{ $item->nights }} @if($item->nights > 1) nights @else night @endif )</span>
                                <div class="stepslineCont">
                                    <div class="stepsline">
                                        <ol>
                                            @foreach($tourStatuses as $ts)
                                                @if($ts->id < 11)
                                                    <li @if($ts->id == optional($item->tourStatuses->last())->id || optional($item->tourStatuses->last())->id == 11) class="active" @endif>
                                                        <span class="up">{{ $ts->percent }}%</span>
                                                        <span class="down">{{ $ts->name }}</span>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ol>
                                    </div>
                                </div>
                                <div class="stepsCont">
                                    @foreach($item->tourStatuses as $its)
                                        @if($its->id < 11)

                                        <div class="stepItemSquare stepItemSquareActive @if($item->tourStatuses->last()->id == $its->id)) stepItemSquareLast @endif" data-id="{{ $item->id }}" data-step="{{ $its->id }}">
                                            <span class="stepName">{{ $its->name }}</span>
                                            <span class="stepDate">@if($its->pivot->completed == 1) completed at {{ date('d/m/Y', strtotime($its->pivot->completed_at)) }} @else due {{ date('d/m/Y', strtotime($its->pivot->due_date)) }} @endif</span>
                                            <span class="stepStatus @if($its->pivot->completed == 1) completed @elseif($its->pivot->due_date < Carbon\Carbon::now()) overdue @endif">
                                                @if($its->pivot->completed == 1) Completed @elseif($its->pivot->due_date < Carbon\Carbon::now()) Overdue @else Not Complete @endif
                                            </span>
                                            <span class="stepData">
                                                @if($its->id == 1)
                                                    @if($its->pivot->completed == 1){{ $its->pivot->sign_name }}@else Step info @endif
                                                @elseif($its->id == 2)
                                                    @if($its->pivot->completed == 1){{ $its->pivot->url }}@else Step info @endif
                                                @elseif($its->id == 3)
                                                    @if($its->pivot->completed == 1){{ $its->pivot->step3 }}@else Step info @endif
                                                @elseif($its->id == 4)
                                                    @if($its->pivot->completed == 1){{ $its->pivot->step4 }}@else Step info @endif
                                                @elseif($its->id == 5)
                                                    @if($its->pivot->completed == 1){{ $its->pivot->step5 }}@else Step info @endif
                                                @elseif($its->id == 6)
                                                    @if($its->pivot->completed == 1){{ $its->pivot->step6 }}@else Step info @endif
                                                @elseif($its->id == 7)
                                                    @if($its->pivot->completed == 1){{ $its->pivot->step7 }}@else Step info @endif
                                                @elseif($its->id == 8)
                                                    @if($its->pivot->completed == 1){{ $its->pivot->step8 }}@else Step info @endif
                                                @elseif($its->id == 9)
                                                    @if($its->pivot->completed == 1){{ $its->pivot->step9 }}@else Step info @endif
                                                @elseif($its->id == 10)
                                                    @if($its->pivot->completed == 1){{ $its->pivot->step10 }}@else Step info @endif
                                                @endif
                                            </span>
                                            <span class="stepFooter"></span>
                                        </div>

                                        @endif
                                    @endforeach

                                    @foreach($tourStatuses as $ts)
                                        @if($ts->id < 11 && $ts->id > $item->tourStatuses->count())

                                            <div class="stepItemSquare">
                                                <span class="stepName">{{ $ts->name }}</span>
                                                <span class="stepDate"> - </span>
                                                <span class="stepStatus">Not Complete</span>
                                                <span class="stepData">
                                                    @if($ts->id == 1)
                                                       Step Info
                                                    @elseif($ts->id == 2)
                                                        Step Info
                                                    @elseif($ts->id == 3)
                                                        Step Info
                                                    @elseif($ts->id == 4)
                                                        Step Info
                                                    @elseif($ts->id == 5)
                                                        Step Info
                                                    @elseif($ts->id == 6)
                                                        Step Info
                                                    @elseif($ts->id == 7)
                                                        Step Info
                                                    @elseif($ts->id == 8)
                                                        Step Info
                                                    @elseif($ts->id == 9)
                                                        Step Info
                                                    @elseif($ts->id == 10)
                                                        Step Info
                                                    @endif
                                                </span>
                                                <span class="stepFooter"></span>
                                            </div>

                                        @endif
                                    @endforeach



                                </div>

                                <div class="expInfoPlace">
                                    <div class="leftCol">
                                        <div class="infoBox">
                                            <b class="sectionHeader">Hotel</b><br />
                                            {{ $item->hotel_name }}
                                        </div>
                                                                            <div class="infoBox">
                                            <b class="sectionHeader">Experiences</b><br />
                                            {{ $item->experience_name }}
                                        </div>
                                    </div>
                                    <div class="midCol">
                                            <div class="infoBox">
                                                <b class="sectionHeader">Current nos.</b><br /><br />
                                                {{ $item->num_rooms }}
                                                <br /><br />
                                                <a class="orangeLink tourOverviewButton" data-fancybox data-type="ajax" data-src="" href="{{ route('change-rooms', $item->id) }}" id="reloadInfo{{$item->id}}">Update numbers</a>
                                            </div>
                                            <div class="infoBox">
                                            </div>
                                    </div>
                                    <div class="rightCol">
                                        <div class="infoBox">
                                            <b class="sectionHeader">Costs</b><br />
                                            <b>Date:</b> {{ date('d/m/Y', strtotime($item->date_from)) }} - {{ date('d/m/Y', strtotime($item->date_to)) }} ({{ $item->nights }} nights)
                                        </div>
                                        <div class="infoBox">
                                            <b class="sectionHeader">Cost calculator per person</b><br />
                                            {{ $item->hotel_name }}
                                        </div>

                                    </div>
                                </div>



                            </div>

                        </div>
                        <script>
                            $(".stepItemSquareActive").bind("click", function(){
                                var cartExperienceId = $(this).data("id");
                                var stepId = $(this).data("step");
                                console.log("here");
                                $.fancybox.open(
                                    $("#bookingFormBox-"+cartExperienceId+"step-"+stepId).html() , {
                                        closeExisting: true,
                                        touch: false
                                    }
                                );

                            });
                        </script>
                    </div>
                @endforeach
            @endforeach
        </div>

        <div style="display: none;">
            @foreach($items as $key => $cartItem)
                @foreach($cartItem->cartExperiences as $item)

                    @if($item->tourStatuses->count() > 0)
                        @foreach($item->tourStatuses as $itemStatus)
                        <div class="rightCol" id="bookingFormBox-{{ $item->id }}step-{{ $itemStatus->id }}">
                            <div class="bookingForm fancyboxTourSteps">

                                @if(optional($itemStatus)->id == 11)
                                    <span class="headingS">{{ $item->experience_name }}</span>
                                    <span class="headingS">{{ $item->hotel_name }}</span>
                                    <span class="headingS">{{ date('d/m/Y', strtotime($item->date_from)) }} - {{ date('d/m/Y', strtotime($item->date_to)) }} ({{ $item->nights }} nights)</span>
                                @else
                                    <span class="headingS"> Tour Booking Step </span>
                                @endif

                                <span class="headingLL">{{ optional($itemStatus)->name }}</span>
                                <div class="stepsline">
                                    <ol>
                                        @foreach($tourStatuses as $ts)
                                            @if($ts->id < 11)
                                            <li @if($ts->id == optional($itemStatus)->id || optional($itemStatus)->id == 11) class="active" @endif>
                                                <span class="up">{{ $ts->percent }}%</span>
                                                <span class="down">{{ $ts->name }}</span>
                                            </li>
                                            @endif
                                        @endforeach
                                    </ol>
                                </div>

                                <form method="POST" action="{{ route('process-tour-steps.ajax') }}" class="ajax">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="cart_experiences_id" value="{{ $item->id }}">
                                    <input type="hidden" name="tour_statuses_id" value="{{ optional($itemStatus)->id }}">
                                    <input type="hidden" name="pivot_id" value="{{ optional($itemStatus)->pivot_id }}">
                                    @if(optional($itemStatus)->id == 1)
                                        <label for="sign_name">Name</label>
                                        <div class="inputRow">
                                            <input type="text" name="sign_name" placeholder="Please Enter a Name">
                                            <button type="submit" data-step="{{ optional($itemStatus)->id }}" class="stepSubmitButton"><i class="fas fa-chevron-right"></i></button>
                                        </div>
                                    @elseif(optional($itemStatus)->id == 2)
                                        <label for="url">URL</label>
                                        <div class="inputRow">
                                            <input type="text" name="url" placeholder="Please Enter a URL">
                                            <button type="submit" data-step="{{ optional($itemStatus)->id }}" class="stepSubmitButton"><i class="fas fa-chevron-right"></i></button>
                                        </div>
                                    @elseif(optional($itemStatus)->id == 3)
                                        <label for="step3">Step 3</label>
                                        <div class="inputRow">
                                            <input type="text" name="step3" placeholder="Please Enter a Step 3">
                                            <button type="submit" data-step="{{ optional($itemStatus)->id }}" class="stepSubmitButton"><i class="fas fa-chevron-right"></i></button>
                                        </div>
                                    @elseif(optional($itemStatus)->id == 4)
                                        <label for="step3">Step 4</label>
                                        <div class="inputRow">
                                            <input type="text" name="step4" placeholder="Please Enter a Step 4">
                                            <button type="submit" data-step="{{ optional($itemStatus)->id }}" class="stepSubmitButton"><i class="fas fa-chevron-right"></i></button>
                                        </div>
                                    @elseif(optional($itemStatus)->id == 5)
                                        <label for="step5">Step 5</label>
                                        <div class="inputRow">
                                            <input type="hidden" name="step5" value="Test 1st Deposit" placeholder="Please Enter a Step 5">
                                            <button type="submit" data-step="{{ optional($itemStatus)->id }}" class="stepSubmitButton"><i class="fas fa-chevron-right"></i></button>
                                        </div>
                                    @elseif(optional($itemStatus)->id == 6)
                                        <label for="step5">Step 6</label>
                                        <div class="inputRow">
                                            <input type="text" name="step6" placeholder="Please Enter a Step 6">
                                            <button type="submit" data-step="{{ optional($itemStatus)->id }}" class="stepSubmitButton"><i class="fas fa-chevron-right"></i></button>
                                        </div>
                                    @elseif(optional($itemStatus)->id == 7)
                                        <label for="step7">Step 7</label>
                                        <div class="inputRow">
                                            <input type="text" name="step7" placeholder="Please Enter a Step 7">
                                            <button type="submit" data-step="{{ optional($itemStatus)->id }}" class="stepSubmitButton"><i class="fas fa-chevron-right"></i></button>
                                        </div>
                                    @elseif(optional($itemStatus)->id == 8)
                                        <label for="step8">Step 8</label>
                                        <div class="inputRow">
                                            <input type="hidden" name="step8" value="Test Invoice paid" placeholder="Please Enter a Step 8">
                                            <button type="submit" data-step="{{ optional($itemStatus)->id }}" class="stepSubmitButton"><i class="fas fa-chevron-right"></i></button>
                                        </div>
                                    @elseif(optional($itemStatus)->id == 9)
                                        <label for="step9">Step 9</label>
                                        <div class="inputRow">
                                            <input type="text" name="step9" placeholder="Please Enter a Step 9">
                                            <button type="submit" data-step="{{ optional($itemStatus)->id }}" class="stepSubmitButton"><i class="fas fa-chevron-right"></i></button>
                                        </div>
                                    @elseif(optional($itemStatus)->id == 10)
                                        <label for="step10">Step 10</label>
                                        <div class="inputRow">
                                            <input type="text" name="step10" placeholder="Please Enter a Step 10">
                                            <button type="submit" data-step="{{ optional($itemStatus)->id }}" class="stepSubmitButton"><i class="fas fa-chevron-right"></i></button>
                                        </div>
                                    @elseif(optional($itemStatus)->id == 11)

                                    @endif

                                </form>

                            </div>
                            <script>
                                $(".stepSubmitButton").click(function(e){
                                    e.preventDefault();

                                    $(this).prop('disabled', true);
                                    $(this).html('<i class="fas fa-spinner fa-pulse"></i>');

                                    var step = $(this).data('step');
                                    if( step == 5 || step == 8 ){
                                        $(this).prop('disabled', false);
                                        $(this).unbind('click').click();
                                        $(this).prop('disabled', true);
                                        return true;
                                    }

                                    var value = $(this).siblings('input').val();

                                    if(value){
                                        $(this).prop('disabled', false);
                                        $(this).unbind('click').click();
                                        $(this).prop('disabled', true);
                                        return true;
                                    }else{
                                        $(this).parent().css("border", "2px solid red");
                                        $(this).prop('disabled', false);
                                        $(this).html('<i class="fas fa-chevron-right"></i>');
                                        return false;
                                    }

                                });
                            </script>
                        </div>
                        @endforeach
                    @endif

                @endforeach
            @endforeach
        </div>        
    </div>
    <div class="rightCol only-desktop">
        @foreach($items as $key => $cartItem)
            @foreach($cartItem->cartExperiences as $item)
                <div class="bookingForm" id="rightColInfo-{{ $item->id }}">
                    <span class="headingS">Tour Status</span>
                    <span class="headingLLL">{{ optional($item->tourStatuses->last())->percent }}%</span>
                    <span class="headingS3">{{ optional($item->tourStatuses->last())->name }}</span>

                    <div class="tourInfoCont">
                        <div class="infoBox">
                            <span class="left">Date Booked</span>
                            <span class="right">{{ date('d/m/Y', strtotime($cartItem->finalized_at)) }}</span>
                        </div>
                        <div class="infoBox">
                            <span class="left">Tour Date</span>
                            <span class="right">{{ date('d/m/Y', strtotime($item->date_from)) }}</span>
                        </div>
                        <div class="infoBox">
                            <span class="left">Canx Date</span>
                            <span class="right">---</span>
                        </div>
                        <div class="infoBox">
                            <span class="left">Canx days</span>
                            <span class="right">---</span>
                        </div>
                        <div class="infoBox">
                            <span class="left">Tour numbers</span>
                            <span class="right">---</span>
                        </div>
                        <div class="infoBox">
                            <span class="left">Tour Url:</span>
                            <span class="right">
                                @if( optional($item->tourStatuses->last())->id > 2 )
                                    {{ $item->tourStatuses[1]->pivot->url }}
                                @else
                                    ---
                                @endif
                            </span>
                        </div>
                        <div class="infoBox">
                            <span class="left">Next Step</span>
                            <span class="right">{{ optional($item->tourStatuses->last())->name }}</span>
                        </div>
                        <div class="infoBox">
                            <span class="left">Next Step Due</span>
                            <span class="right">
                                @if($item->tourStatuses->count() > 0)
                                    {{ $diff = Carbon\Carbon::parse(optional($item->tourStatuses->last())->pivot->due_date)->diffForHumans() }}
                                @endif
                            </span>
                        </div>
                        <div class="infoBox">
                            <span class="left">Average Score</span>
                            <span class="right">-.-</span>
                        </div>
                    </div>
    {{--                {{ date_diff(new \DateTime($item->tourStatuses->last()->pivot->due_date), new \DateTime())->format("%m Months, %d days") }}--}}
                    <button data-id="{{ $item->id }}" id="tourOverviewButton-{{ $item->id }}" class="orangeLink tourOverviewButton" href="">Tour Overview</button>
                    <button class="orangeLink" href="">Update Tour Numbers</button>

                </div>
            @endforeach
        @endforeach
    </div>
{{-- </div> --}}



<script>

    $(".tourOverviewButton").bind("click", function(){
        var cartExperienceId = $(this).data("id");

        $.fancybox.open(
            //$("#bookingFormBox-"+cartExperienceId).html() , {
            $("#tourOverviewModal-"+cartExperienceId).html() , {
                closeExisting: true,
                touch: false
            }
        );

    });

    $(document).ready(function(){

        $(".mobMenuBtn").bind("click", function(){

            if($("#menu__toggle2").prop("checked") == true){
                if(updated==0){
                    updated = 1;
                }
                $(".leftCol").addClass("comeFromLeft");
            }else {
                $(".leftCol").removeClass("comeFromLeft");
            }
        });

        $(".filterBtn").bind("click", function(){
            $(".hiddenFilteres").toggleClass('showOpacity hide');
        });

        $(".showFilter").bind("click", function(){

            element = "#activeFilter-"+$(this).data("filter-id");
            element2 = "."+$(this).data("filter-class");
            $(this).addClass("active");
            $(element).show();
            $(element2).show();

        });

        $(".hideFilter").bind("click", function(){

            $(this).hide();
            element = "#availableFilter-"+$(this).data("filter-id");
            element2 = "."+$(this).data("filter-class");
            $(element).removeClass("active");
            $(element2).hide();
        });

    });

    var mx = 0;

    $(".drag").on({
        mousemove: function(e) {
            var mx2 = e.pageX - this.offsetLeft;
            if(mx) this.scrollLeft = this.sx + mx - mx2;
        },
        mousedown: function(e) {
            this.sx = this.scrollLeft;
            mx = e.pageX - this.offsetLeft;
        }
    });

    $(document).on("mouseup", function(){
        mx = 0;
    });
</script>

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
