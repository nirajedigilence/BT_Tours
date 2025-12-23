@extends('layouts.front')

@section('content')
<style type="text/css">

</style>
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
                @include('partials.super_user_left',['open_menu' => 'product', 'sub_marked' => 'products_tour']);
            </div>

            <div id="cartExperiencesPart">
                <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">    
                <style type="text/css" media="screen">
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

                    .checkbox_div {
                        color: #14213D;
                        display: block;
                        position: relative;
                        padding-left: 30px;
                        margin-bottom: 12px;
                        cursor: pointer;
                        font-size: 16px;
                        -webkit-user-select: none;
                        -moz-user-select: none;
                        -ms-user-select: none;
                        user-select: none;
                    }
                    .custom_chkbox {
                        position: absolute;
                        opacity: 0;
                        cursor: pointer;
                        height: 0;
                        width: 0;
                    }
                    .checkmark {
                        position: absolute;
                        top: 0;
                        left: 0;
                        height: 25px;
                        width: 25px;
                        border: 1px solid #999;
                    }
                    .checkbox_div:hover input ~ .checkmark,
                    .custom_chkbox:checked ~ .checkmark {
                        background-color: #FCA311;
                        border-color: #FCA311;
                    }
                    .checkmark:after {
                        content: "";
                        position: absolute;
                        display: none;
                    }
                    .custom_chkbox:checked ~ .checkmark:after {
                        display: block;
                    }
                    .checkbox_div .checkmark:after {
                        left: 8px;
                        top: 1px;
                        width: 8px;
                        height: 16px;
                        border: solid white;
                        border-width: 0 3px 3px 0;
                        -webkit-transform: rotate(45deg);
                        -ms-transform: rotate(45deg);
                        transform: rotate(45deg);
                    }
                    .fl_w{
                        float: left;
                        width: 100%;
                    }
                    .checkarea_part {
                        float: left;
                        width: 25%;
                        display: inline-block;
                    }
                    .topBox.customchkmain {
                        float: left;
                        width: 100%;
                    }
                    .accountContainer .accountRow .middleCol .contentBooking .hiddenFilteres .topBox.customchkmain .heading{
                        margin-bottom: 10px;
                    }
                    .topBox.customchkmain .check_row{
                        float: left;
                        width: 100%;
                        margin-bottom: 15px;
                    }
                    .rightSidebarDiv .labelCls{
                        color:#9A9898
                    }
                    .accountContainer .accountRow .middleCol .contentBooking .tableWrapper table td{
                        padding-left: 20px;
                        padding-right: 20px;
                    }
                    .markCompleted {
                        border: 3px solid limegreen !important;
                    }
                </style>
                <div class="middleCol completedBooking" id="middleCol">
                    <script>
                        var base_url = "{{URL::to('/')}}";
                    </script>
                    @if(Session::has('success'))
                        <div class="alert alert-success">
                            {!! session('success') !!}
                        </div>
                    @elseif(Session::has('error'))
                        <div class="alert alert-error">
                            {!! session('error') !!}
                        </div>
                    @endif
                    <div class="_contentBooking" style="padding-left: 20px;">
                        <h3 class="pageHeaderCls">Reviews - {{!empty($reviews[0]['experience_name'])?$reviews[0]['experience_name']:''}}</h3>
                        <div class="headerRow">
                            <a class="orangeLink" href="{{ route('tours') }}" style="color:#FCA311"> < Back to Product folders</a>
                        </div>

                        <div class="tableWrapper drag">
                            <table id="myTable" class="table">
                                <thead>
                                    <tr class="headerBooking">
                                        <!-- <th>Tour Name</th> -->
                                        <th>Hotels</th>
                                        <th>Tour Date</th>
                                        <th class="visible">Booked By</th>
                                        <th class="visible">Score</th>
                                        <th class="visible">Display review</th>
                                        <!-- <th class="visible">Review Type</th> -->
                                        <th class="visible">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // pr($reviews);
                                    $hasreview = 'no';
                                    if(!empty($reviews)){
                                        foreach($reviews as $k => $v){
                                            if(!empty($v['reviews'])){
                                                $hasreview = 'yes';
                                                foreach ($v['reviews'] as $key => $value) {
                                                    $submitted_review = unserialize($value['submitted_review']);
                                                    // pr($submitted_review);
                                                    $hotels = implode(', ', array_column($submitted_review['hotels'], 'name'));
                                                ?>
                                               <tr data-id="{{ $value['id'] }}" class="openBooking" id="openBooking-{{ $value['id'] }}">
                                                    <!-- <td><b>{{$v['experience_name'] }}</b></td> -->
                                                    <td>{{$hotels}}</td>
                                                     <td><b>{{date("D d M", strtotime($v['date_from'])) }} - {{ date("D d M 'y", strtotime($v['date_to'])) }}</b></td>
                                                    <td>{{$submitted_review['name']}}</td>
                                                    <td class="stars">
                                                        <?php
                                                        for ($i=1; $i <= 5; $i++) { 
                                                            if(isset($submitted_review['stars']) && ($i <= $submitted_review['stars'])){
                                                                echo '<i class="fas fa-star"></i>';
                                                            }else{
                                                                echo '<i class="fas fa-star grey"></i>';
                                                            }
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php 
                                                        $checked = '';
                                                        if(isset($value['display']) && $value['display'] == 1){
                                                            $checked = 'checked';
                                                        }
                                                        ?>
                                                        <div class="checkarea_part">
                                                            <label class="checkbox_div">
                                                                <input type="checkbox" name="" value="1" class="custom_chkbox displayReview" {{ $checked }} data-id="{{$value['id']}}">
                                                              <span class="checkmark"></span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                   <!--  <td>{{($value['review_type'] == '1')?'Driver Review':'Guest Review'}}</td> -->
                                                    <!-- <td>
                                                        <a href="javascript:;" data-id="{{$value['id']}}" class="viewReview" style="color:orange;font-weight: 600;margin-right: 10px;">View review form</a>
                                                        <a href="javascript:;" data-id="{{$value['id']}}" class="removeReview" style="color:red;">Remove</a>
                                                    </td> -->
                                                </tr> 
                                                <?php 
                                                }
                                            }
                                        }
                                    }
                                    if($hasreview == 'no'){
                                       echo '<tr><td colspan="6">No reviews found!</td></tr>';
                                    } 
                                    ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <div class="rightCol only-desktop">
                <?php 
                 if(!empty($reviews)){
                    foreach($reviews as $k => $v){
                        foreach ($v['reviews'] as $key => $value) {
                         $submitted_review = unserialize($value['submitted_review']);
                        // pr($submitted_review);
                         //prd($submitted_review['hotels'][0]['que_1']);
                        $hotels = implode(', ', array_column($submitted_review['hotels'], 'name'));
                        ?>
                        <div class="bookingForm" id="rightColInfo-{{ $value['id'] }}">
                        <span class="headingS font25">FINAL SCORE</span>
                        {{-- <span class="headingS3 font18WithMargin10">Average score</span> --}}
                        {{-- <span class="headingLLL scorePerCls_1" style="color: green">87%</span> --}}
                        
                        {{-- <span class="headingS3">HOPS</span> --}}
                        <div class="starsBox">
                            <div class="titleS">Average score</div>
                            <div class="stars">
                               <?php
                                    for ($i=1; $i <= 5; $i++) { 
                                        if(isset($submitted_review['stars']) && ($i <= $submitted_review['stars'])){
                                            echo '<i class="fas fa-star"></i>';
                                        }else{
                                            echo '<i class="fas fa-star grey"></i>';
                                        }
                                    }
                                    ?>
                            </div>
                        </div>
                        <div class="tourInfoCont">
                            <div class="infoBox">
                                <span class="left">Check-in</span>
                                <span class="right">{{isset($submitted_review['hotels'][0]['que_1'])?$submitted_review['hotels'][0]['que_1'].'/4':''}}</span>
                            </div>
                            <div class="infoBox">
                                <span class="left">Cleanliness</span>
                                <span class="right">{{isset($submitted_review['hotels'][0]['que_1'])?$submitted_review['hotels'][0]['que_2'].'/4':''}}</span>
                            </div>
                            <div class="infoBox">
                                <span class="left">Food quality</span>
                                <span class="right">{{isset($submitted_review['hotels'][0]['que_1'])?$submitted_review['hotels'][0]['que_3'].'/4':''}}<span>
                            </span></span></div>
                             <div class="infoBox">
                                <span class="left">Service</span>
                                <span class="right">{{isset($submitted_review['hotels'][0]['que_1'])?$submitted_review['hotels'][0]['que_4'].'/4':''}}<span>
                            </span></span></div>
                            <div class="infoBox">
                                <span class="left">Driver Review</span>
                                <span class="right">{{isset($submitted_review['stars'])?$submitted_review['stars'].'/4':''}}<span>
                            </span></span></div>
                        </div>
                        <div class="hotelSecSide15">
                            <div class="text-center">
                                <!-- <a href="javascript:;" class="disableProductCls" data-id="{{ $v['id'] }}">Disable Product</a> -->
                                <!-- <a target="_blank" href="{{ route('driverReviews', $v['id']) }}" class="enableProductCls">Display Review</a> -->
                                <a href="javascript:;" data-id="{{$value['id']}}" class="enableProductCls openReview" style="color:orange;">Open Driver Review</a>
                            </div>
                        </div>
                        <div class="hotelSecSide15">
                            <div class="text-center">
                                <a href="javascript:;" data-id="{{$value['id']}}" class="enableProductCls viewReview" style="color:orange;">Display Driver Review</a>
                            </div>
                        </div>
                        
                        <div class="hotelSecSide15">
                            <div class="text-center">
                                <a href="javascript:;" class="enableProductCls editDocument" data-id="{{ $v['id'] }}">Copy Review</a>
                            </div>
                        </div>
                        
                        
                    </div>
                        <?php
                        }
                    }
                }
                ?>
            </div>
                <script src="{{ asset('js/popper.min.js') }}"></script> 
                <script src="{{ asset('js/bootstrap.min.js') }}"></script>
                <script src="{{ asset('js/pages/tour_show.js') }}"></script>
            </div>


        </div>

    </div>

</div>


<div class="modal fade bd-example-modal-lg" id="reviewModal" tabindex="-1" role="dialog" aria-labelledby="addFolderModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 1200px;">
        <div class="modal-content reviewModalAppendCls">

        </div>
    </div>
</div>
<script>
     $("tr.openBooking").bind("click", function(){
        var cartExperienceId = $(this).data("id");
        $("tr.openBooking").removeClass("active");
        $(this).addClass("active");
        $(".bookingForm").hide();
        $("#rightColInfo-"+cartExperienceId).show();
    });
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
        $(document).on('click', '.displayReview', function() {
            var reviewId = $(this).attr('data-id');
            if(this.checked) {
                var display = 1;
            }else{
                var display = 0;
            }
            $('.loader').show();    
            $.ajax({
                url: base_url+'/super-user/review-status-update',
                type: 'POST',
                 // dataType: 'json',
                data: {'id':reviewId, 'display':display},
                success: function(data) {
                    $('.loader').hide(); 
                    toastSuccess('Status updated successfully!');   
                },
                error: function(e) {
                }
            });
        });
        $(document).on('click', '.removeReview', function() {
            if(confirm('Are you sure?')){
                var reviewId = $(this).attr('data-id');
                var tr = $(this).closest('tr');
                $('.loader').show();    
                $.ajax({
                    url: base_url+'/super-user/review-remove',
                    type: 'POST',
                     // dataType: 'json',
                    data: {'id':reviewId},
                    success: function(data) {
                        tr.remove();
                        $('.loader').hide(); 
                        toastSuccess('Review removed successfully!');   
                    },
                    error: function(e) {
                    }
                });
            }
        });
        $(document).on('click', '.openReview', function() {
            var reviewId = $(this).attr('data-id');
            $('.loader').show();    
            $.ajax({
                url: base_url+'/super-user/view-review',
                type: 'POST',
                dataType: 'json',
                data: {'id':reviewId},
                success: function(data) {
                    $('.loader').hide();
                    $('.reviewModalAppendCls').html(data.response);
                    $('#reviewModal').modal('show');
                },
                error: function(e) {
                }
            });
        });
        $(document).on('click', '.viewReview', function() {
            var reviewId = $(this).attr('data-id');
            $('.loader').show();    
            $.ajax({
                url: base_url+'/super-user/display-review',
                type: 'POST',
                dataType: 'json',
                data: {'id':reviewId},
                success: function(data) {
                    $('.loader').hide();
                    $('.reviewModalAppendCls').html(data.response);
                    $('#reviewModal').modal('show');
                },
                error: function(e) {
                }
            });
        });
        
    });
</script>

@endsection
