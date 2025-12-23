@extends('layouts.front')

@section('content')

<div class="notIndexContainer">

    <div class="accountContainer">
        <div class="accountRow">

            <div class="leftCol">
                @include('partials.super_user_left',['open_menu' => 'database', 'sub_marked' => 'company']);
            </div>
            
            <div class="account_main_content">

                <div class="left_column">

                    <div class="main_content_nav">

                        <div class="filters">

                            <div class="filters_dropdown">

                                <div class="cta">
                                    Filters
                                </div>

                                <div class="dropdown">

                                    <form action="{{ route('database-company') }}" id="filterForm">
                                        <div class="heading">
                                            Filter By
                                        </div>

                                        <!-- <div class="dropdown_section"> -->

                                        <!-- <div class="heading">
                                            By Date
                                        </div> -->

                                        <div class="by_date">

                                            <div class="field">
                                                <div class="label">By Company</div>
                                                <select name="company_id" id="company_id">
                                                    <option value="">---</option>
                                                    <?php
                                                    if(!empty($companyList)){
                                                        foreach ($companyList as $key => $value) {
                                                            $selected = '';
                                                            if(isset($_GET['company_id']) && $_GET['company_id'] == $value->id){
                                                                $selected = 'selected';
                                                            }
                                                            echo '<option value="'.$value->id.'" '.$selected.'>'.$value->company_name.'</option>';
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>


                                        </div>
                                        <input type="submit" class="btn btn-warning" name="submit" value="Filter" style="float: right;color: #fff;font-weight: bold;background:orange;border: orange;" id="submitBtn">
                                      
                                        <a  class="btn btn-warning mr-2" style="float: right;color: #fff;font-weight: bold;background:orange;border: orange;" href="{{ route('database-company') }}">Reset</a>
                                    </form>

                                    

                                </div>

                            </div>

                            <!-- <ul class="active_filters">
                                <li class="label">Active filters:</li>
                                <li>Location <span>x</span></li>
                                <li>Town/City <span>x</span></li>
                            </ul> -->

                        </div>

                        <div class="search">

                            <div class="search__input">
                                <input type="text" placeholder="Search" id="myInput" onkeyup="myFunction()">
                                <button type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                            <a href="javascript:;" class="btn btn-primary" style="margin-left: 10px;" data-id="" id="addShip">Add New</a>
                        </div>

                    </div>

                    <div class="left_column__list">
                         @if(Session::has('message'))
                            <div class="alert alert-success">
                                <span class="glyphicon glyphicon-ok"></span>
                                {!! session('message') !!}

                                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                    <span aria-hidden="true">&times;</span>
                                </button>

                            </div>
                        @endif
                        <div class="left_column__list_row header">

                            <div class="left_column__list_column w_25">
                                Company name
                            </div>

                            

                            

                        </div>
                        <?php
                        if(!empty($companyList)){
                            foreach ($companyList as $key => $value) {
                                if(isset($_GET['company_id']) && $_GET['company_id'] != $value->id){
                                                                continue;
                                                            }
                        ?>
                        <div class="left_column__list_row openBooking" data-id="{{ $value->id }}">

                            <div class="left_column__list_column w_25 bold hotelName">
                                <?php echo (!empty($value->company_name)) ? $value->company_name : '-'; ?>
                            </div>

                           

                        </div>
                        <?php } } ?>
                    </div>

                </div>

                <div class="right_column">
                    <?php
                    if(!empty($companyList)){
                        foreach ($companyList as $key => $value) {
                        ?>
                        <div class="companyList" id="rightColInfo-{{ $value->id }}" style="display: none;">
                            <div class="intro">

                                <div class="heading mb_0">
                                    {{ strtoupper($value->company_name) }}
                                </div>

                                

                            </div>


                            <div class="footer_links">

                                 <a href="javascript:;" class="btn btn-primary" style="margin-left: 10px;" data-id="{{$value->id}}" id="updateShip">Edit</a>

                            </div>
                        </div>
                    <?php } } ?>
                </div>

            </div>

        </div>

    </div>
    <!-- start popup -->

    <div class="account_popup" style="display: none;">


    </div>

    <!-- end popup -->
</div>

<script>
    var updated = 0;
    $(document).ready(function(){
        $(document).on('click','#addInclusion', function(){
            $("#appendInclusions div.list__item").last().clone().appendTo($("#appendInclusions"));
            $("#appendInclusions div.list__item").last().find('input').val('');
            $('.removeInclusion').css('display','block'); 
        });
        $(document).on('click','.removeInclusion', function(){
            if($("#appendInclusions div.list__item").length == 2){
                $('.removeInclusion').hide(); 
            }
            $(this).closest('div').remove();
        });
        $(document).on("click", "#expFormSubmit", function(e){
            // var desc = CKEDITOR.instances.e_description.getData();
            // $('#e_description').html(desc);
            e.preventDefault();
            var exp_name = $('.popup_content #company_name').val();
            var ship_id = $('#ship_id').val();
            if(exp_name == '')
            {
                if(exp_name == '')
                {
                    $('.exp_error').show();
                    $('.popup_content #exp_name').focus();
                }
                else
                {
                    $('.exp_error').hide();
                }
               
                alert("Please enter required fields.");
            }
            else
            {
                if(ship_id == '')
                {
                    var formData = $("#expData").serialize();
                    $('.loader').show();    
                    $.ajax({
                        url: base_url+'/super-user/add-new-company',
                        type: 'POST',
                        data: {'formData':formData},
                        success: function(data) {
                            $('.loader').hide(); 
                            if(data.status == 'failed'){
                                toastError('Experience is already added with same name.');
                            }else{
                                toastSuccess('Experience added successfully.');
                                location.reload(); 
                            }
                        },
                        error: function(e) {
                        }
                    }); 
                }
                else
                {
                    var formData = $("#expData").serialize();
                    $('.loader').show();    
                    $.ajax({
                        url: base_url+'/super-user/update-company-details',
                        type: 'POST',
                        data: {'formData':formData},
                        success: function(data) {
                            $('.loader').hide(); 
                            toastSuccess('Experience updated successfully.');
                            location.reload(); 
                        },
                        error: function(e) {
                        }
                    }); 
                }
            
            }  
        });
        /*$(document).on("click", "#expFormSubmit", function(e){
            e.preventDefault();
            var formData = $("#expData").serialize();
            $('.loader').show();    
            $.ajax({
                url: base_url+'/super-user/add-new-company',
                type: 'POST',
                data: {'formData':formData},
                success: function(data) {
                    $('.loader').hide(); 
                    if(data.status == 'failed'){
                        toastError('Experience is already added with same name.');
                    }else{
                        toastSuccess('Experience added successfully.');
                        location.reload(); 
                    }
                },
                error: function(e) {
                }
            });   
        });*/
        $("#addShip").bind("click", function(e){
            var ship_id = $(this).data('id');
            $('.loader').show();    
            $.ajax({
                url: base_url+'/super-user/get-company-details',
                type: 'POST',
                data: {'ship_id':ship_id},
                success: function(data) {
                    $('.account_popup').html(data);
                    $('.loader').hide();  
                    $('.account_popup').show();
                },
                error: function(e) {
                }
            });   
        });
        $("#updateShip").bind("click", function(e){
            var ship_id = $(this).data('id');
            $('.loader').show();    
            $.ajax({
                url: base_url+'/super-user/get-company-details',
                type: 'POST',
                data: {'ship_id':ship_id},
                success: function(data) {
                    $('.account_popup').html(data);
                    $('.loader').hide();  
                    $('.account_popup').show();
                },
                error: function(e) {
                }
            });   
        });

        $(document).on("click", "#closePopup", function(e){
            $(this).closest('.account_popup').hide();
        });
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
        $(".openBooking").bind("click", function(){
            var cartExperienceId = $(this).data("id");
            $(".openBooking").removeClass("active");
            $(this).addClass("active");
            $(".companyList").hide();
            $("#rightColInfo-"+cartExperienceId).show();
        });
        <?php 
        if(isset($_GET['addShip']) && $_GET['addShip'] == 'yes'){
            ?>
            $("#addShip").click();
            <?php
        }
        ?>
    });
    function myFunction() {
            // Declare variables
            var input, filter, ul, li, a, i, txtValue;
            input = document.getElementById('myInput');
            filter = input.value.toUpperCase();
            var hotelName = $(".hotelName");
            // var hotelName = $(".hotelName").closest('div');
            
            // Loop through all list items, and hide those who don't match the search query
            for (i = 0; i < hotelName.length; i++) {
                a = hotelName[i];
                txtValue = a.textContent || a.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    hotelName[i].closest('.openBooking').style.display = "";
                } else {
                    hotelName[i].closest('.openBooking').style.display = "none";
                }
            }
        }
        $("body").on("click", '.filters_dropdown > .cta', function(e) {
            $('.dropdown').toggleClass('filterShow');
        });
</script>

@endsection