@extends('layouts.front')

@section('content')

<div class="notIndexContainer">

    <div class="accountContainer">
        <div class="accountRow">

            <div class="leftCol">
                @include('partials.super_user_left',['open_menu' => 'database', 'sub_marked' => 'ships']);
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

                                    <form action="{{ route('database-ships') }}" id="filterForm">
                                        <div class="heading">
                                            Filter By
                                        </div>

                                        <!-- <div class="dropdown_section"> -->

                                        <!-- <div class="heading">
                                            By Date
                                        </div> -->

                                        <div class="by_date">

                                            <div class="field">
                                                <div class="label">By Cruise</div>
                                                <select name="ship_id" id="ship_id">
                                                    <option value="">---</option>
                                                    <?php
                                                    if(!empty($shipsList)){
                                                        foreach ($shipsList as $key => $value) {
                                                            $selected = '';
                                                            if(isset($_GET['ship_id']) && $_GET['ship_id'] == $value->id){
                                                                $selected = 'selected';
                                                            }
                                                            echo '<option value="'.$value->id.'" '.$selected.'>'.$value->name.'</option>';
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>


                                        </div>
                                        <input type="submit" class="btn btn-warning" name="submit" value="Filter" style="float: right;color: #fff;font-weight: bold;background:orange;border: orange;" id="submitBtn">
                                        <a  class="btn btn-warning mr-2" style="float: right;color: #fff;font-weight: bold;background:orange;border: orange;" href="{{ route('database-ships') }}">Reset</a>
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
                            <a data-id="{{$value->id}}" class="btn btn-primary add_popup ml-2" href="javascript:;">Add</a>
                            <!-- <a href="javascript:;" class="btn btn-primary" style="margin-left: 10px;" data-id="" id="addShip">Add New Cruise</a>
                            <a href="javascript:;" class="btn btn-primary" style="margin-left: 10px;" data-id="" id="addCompany">Add New Company</a> -->
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
                                Ship name
                            </div>
                            <div class="left_column__list_column w_25">
                                Cruise company
                            </div>

                            <div class="left_column__list_column w_15">
                                Location
                            </div>

                            <div class="left_column__list_column w_15">
                                Town/City
                            </div>

                            <div class="left_column__list_column w_15">
                                Contact number
                            </div>

                            <div class="left_column__list_column w_15">
                                CoPS??
                            </div>

                            

                        </div>
                        <?php
                        if(!empty($shipsList)){
                            foreach ($shipsList as $key => $value) {
                                if(isset($_GET['ship_id']) && $_GET['ship_id'] != $value->id){
                                                                continue;
                                                            }
                        ?>
                        <div class="left_column__list_row openBooking" data-id="{{ $value->id }}">
                            <div class="left_column__list_column w_25 bold hotelName">
                                <?php echo (!empty($value->name)) ? $value->name : '-'; ?>
                            </div>
                            <div class="left_column__list_column w_25 bold hotelName">
                                <?php echo (!empty($value->company_name)) ? $value->company_name : '-'; ?>
                            </div>

                            <div class="left_column__list_column w_15">
                                <?php echo (!empty($value->address)) ? $value->address : '-'; ?>
                            </div>

                            <div class="left_column__list_column w_15">
                               <?php echo (!empty($value->address)) ? $value->address : '-'; ?>
                            </div>

                            <div class="left_column__list_column w_15" style="word-break: break-all;">
                                <?php echo (!empty($value->phone)) ? $value->phone : '-'; ?>
                            </div>

                            <div class="left_column__list_column w_15 centered">
                                <strong class="green">0%</strong>
                            </div>

                        </div>
                        <?php } } ?>
                    </div>

                </div>

                <div class="right_column">
                    <?php
                    if(!empty($shipsList)){
                        foreach ($shipsList as $key => $value) {
                        ?>
                        <div class="shipsList" id="rightColInfo-{{ $value->id }}" style="display: none;">
                            <div class="intro">

                                <div class="heading mb_0">
                                    {{ strtoupper($value->company_name) }}
                                </div>

                                <div class="percentage">
                                    0%
                                </div>

                                <div class="contact_info">

                                   <!--  <div class="block">
                                        
                                        <div class="sub_heading">
                                            Main Contact
                                        </div>

                                        <div>
                                            <?php echo (!empty($value->contact_name)) ? $value->contact_name.' ('.$value->contact_position.')' : '-'; ?>
                                        </div>

                                    </div> -->

                                    <div class="block">
                                        
                                        <div class="sub_heading">
                                            Contact number
                                        </div>

                                        <div>
                                            direct: <span class="orange"><?php echo (!empty($value->phone)) ? $value->phone : '-'; ?></span>
                                        </div>

                                       <!--  <div>
                                            main: <span class="orange"><?php echo (!empty($value->main_contact_number)) ? $value->main_contact_number : '-'; ?></span>
                                        </div> -->

                                    </div>

                                    <div class="block">
                                        
                                        <div class="sub_heading">
                                            Email
                                        </div>

                                        <div>
                                            <a href="mailto:<?php echo (!empty($value->email)) ? $value->email : '-'; ?>" class="email">
                                                <?php echo (!empty($value->email)) ? $value->email : '-'; ?>
                                            </a>
                                        </div>

                                    </div>

                                    <div class="block">
                                        
                                        <div class="sub_heading">
                                            Total Bookings
                                        </div>

                                        <div>
                                            <strong>-</strong>
                                        </div>

                                    </div>

                                    <div class="block">
                                        
                                        <div class="sub_heading">
                                            Current bookings
                                        </div>

                                        <div>
                                            <strong>-</strong>
                                        </div>

                                    </div>

                                    <div class="block">
                                       
                                       <div class="sub_heading">
                                            Outstanding alerts
                                        </div>

                                        <div>
                                            <!-- <span class="orange">1 to go</span> -->
                                            -
                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="icon_ctas">

                                <a href="#" class="cta" style="color: #ddd;pointer-events: none;">
                                    <i class="fas fa-sticky-note"></i>
                                </a>

                                <a href="#" class="cta" style="color: #ddd;pointer-events: none;">
                                    <i class="fas fa-edit"></i>
                                </a>

                            </div>

                            <div class="footer_links">

                                <a href="<?php echo route('database-ships-details', $value->id); ?>" class="cta">
                                    Open Profile
                                </a>
                                <a href="<?php echo route('duplicate-ships-details', $value->id); ?>" class="cta">
                                    Duplicate Cruises
                                </a>
                                <a href="#" class="cta" style="background: #ddd;pointer-events: none;">
                                    Current Bookings
                                </a>

                                <a href="#" class="cta" style="background: #ddd;pointer-events: none;">
                                    Completed Bookings
                                </a>

                                <a href="#" class="cta" style="background: #ddd;pointer-events: none;">
                                    View Analytics
                                </a>

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
<div class="modal fade" id="addShipModal" tabindex="-1" role="dialog" aria-labelledby="addFolderModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: calc(70% - (1.75rem * 8));">
        <div class="modal-content">
            <div class="modal-body" style="padding: 15px;">
                
                <div class="row">
                    <div class="col-md-12 mb-5">
                        <h5 style="font-weight: bold;">Add</h5>
                        <p style="color: #14213D;">Add a ship or manage cruise companies and crossings</p>
                    </div>
                    <div class="col-md-12">
                        <a href="javascript:;" class="btn btn-primary"  data-id="" id="addShip">Add Ship</a>
                        <a href="javascript:;" class="btn btn-primary" style="margin-left: 10px;" data-id="" id="addCompany">Manage Cruise Companies</a>
                        <a href="javascript:;" class="btn btn-primary" style="margin-left: 10px;" data-id="" id="addCrossingCompany">Manage Crossing Companies</a>
                       <!--  <a class="btn btn-primary" style="margin-left: 10px;" data-fancybox data-type="ajax" data-src="" href="{{ route('manage-company') }}">Manage Cruise Companies</a> -->
                        <!-- <a href="javascript:;" class="btn btn-primary" style="margin-left: 10px;" data-id="" id="addCompany">Manage Cruise Companies</a> -->
                        <a href="javascript:;" class="btn btn-primary" style="margin-left: 10px;" data-id="" id="addCrossing">Manage Crossings</a>
                        <a href="javascript:;" class="btn btn-primary" style="margin-left: 10px;" data-id="" id="addCrossingTemplate">Manage Crossings Template</a>
                        
                        
                    </div>
                </div>
               
            </div>
        </div>
    </div>
</div>
<script>


    $(document).on('click', '.add_popup', function() {

       $('#addShipModal').modal('show');
    });
    /*<select class="form-control" name="crossing_data[crossing]['+expCrossingRow+'][company_name]">\
                            <option value="">Select Company</option>\
                            <?php
                                if(!empty($company)){
                                    foreach ($company as $key => $com) {
                                        echo '<option value="'.$com->id.'">'.addslashes($com->company_name).'</option>';
                                    }
                                }
                                ?>\
                        </select>\*/
     $(document).on('click', '#add_company_crosssing', function() {
        var cnt_row = $('.expCrossingRow').val();
            if(cnt_row == ''){cnt_row = 0;}
        var expCrossingRow = parseInt(cnt_row,10);
        $('.expCrossingRow').val(expCrossingRow+1);
       var htmls='';
        htmls += '<div class="grouped route_row">\
                    <div class="fieldset half">\
                        <label>Routes</label>\
                        <input type="text" value="" name="crossing_data[crossing_company]['+expCrossingRow+'][route]" id="route">\
                        <p class="exp_error" style="display:none;color: red;">Please enter refurbished</p>\
                    </div>\
                    <div class="fieldset half">\
                        <label>In/Out</label>\
                        <select class="form-control" name="crossing_data[crossing_company]['+expCrossingRow+'][in_out]">\
                            <option value="">Select In/Out</option>\
                            <option value="In">In</option>\
                            <option value="Out">Out</option>\
                        </select>\
                        <p class="exp_error" style="display:none;color: red;">Please enter built</p>\
                    </div>\
                    <div class="fieldset half">\
                        <label>Overnight</label>\
                        <select class="form-control" name="crossing_data[crossing_company]['+expCrossingRow+'][overnight]">\
                            <option value="">Select One</option>\
                            <option value="0">0</option>\
                            <option value="1">1</option>\
                            <option value="2">2</option>\
                            <option value="3">3</option>\
                            <option value="4">4</option>\
                            <option value="5">5</option>\
                        </select>\
                        <p class="exp_error" style="display:none;color: red;">Please enter passengers</p>\
                    </div>\
                    <div class="fieldset half">\
                        <label>Cost £</label>\
                        <input type="text" value="" name="crossing_data[crossing_company]['+expCrossingRow+'][cost_pound]" id="cost_pound">\
                        <p class="exp_error" style="display:none;color: red;">Please enter staff to guest</p>\
                    </div>\
                    <div class="fieldset half">\
                        <label>Cost SS £</label>\
                        <input type="text" value="" name="crossing_data[crossing_company]['+expCrossingRow+'][cost_ss_pound]" id="cost_ss_pound">\
                        <p class="exp_error" style="display:none;color: red;">Please enter staff to guest</p>\
                    </div>\
                    <div class="fieldset half">\
                        <label>Cost €</label>\
                        <input type="text" value="" name="crossing_data[crossing_company]['+expCrossingRow+'][cost_euro]" id="cost_euro">\
                        <p class="exp_error" style="display:none;color: red;">Please enter cabins</p>\
                    </div>\
                    <div class="fieldset half">\
                        <label>Cost SS €</label>\
                        <input type="text" value="" name="crossing_data[crossing_company]['+expCrossingRow+'][cost_ss_euro]" id="cost_ss_euro">\
                        <p class="exp_error" style="display:none;color: red;">Please enter cabins</p>\
                    </div>\
                    <div class="fieldset half">\
                        <label>&nbsp</label>\
                        <a href="javascript:void(0);" class="delete_route_crossing" ><i class="far fa-times-circle" style="color: orange;"></i></a>\
                    </div>\
                </div>';
    $('.company_crossing_div').append(htmls);
    routeCntSet();

    });
      $(document).on('click', '#add_crosssing', function() {
        var cnt_row = $('.CompanyexpCrossingRow').val();
            if(cnt_row == ''){cnt_row = 0;}
        var expCrossingRow = parseInt(cnt_row,10);
        $('.expCrossingRow').val(expCrossingRow+1);
       var htmls='';
        htmls += '<div class="grouped company_row">\
                    <div class="fieldset half">\
                        <label>Company name</label>\
                        <input type="text" value="" name="crossing_data[crossing]['+expCrossingRow+'][company_name]" id="built">\
                        <p class="exp_error" style="display:none;color: red;">Please enter built</p>\
                    </div>\
                    <div class="fieldset half">\
                        <label>Routes</label>\
                        <input type="text" value="" name="crossing_data[crossing]['+expCrossingRow+'][routes]" id="routes">\
                        <p class="exp_error" style="display:none;color: red;">Please enter refurbished</p>\
                    </div>\
                    <div class="fieldset half">\
                        <label>Estimated crossing duration</label>\
                        <input type="text" value="" name="crossing_data[crossing]['+expCrossingRow+'][est_crossing_duration]" id="est_crossing_duration">\
                        <p class="exp_error" style="display:none;color: red;">Please enter passengers</p>\
                    </div>\
                    <div class="fieldset half">\
                        <label>Crossing times</label>\
                        <input type="text" value="" name="crossing_data[crossing]['+expCrossingRow+'][crossing_times]" id="crossing_times">\
                        <p class="exp_error" style="display:none;color: red;">Please enter staff to guest</p>\
                    </div>\
                    <div class="fieldset half">\
                        <label>Inclusions</label>\
                        <input type="text" value="" name="crossing_data[crossing]['+expCrossingRow+'][inclusions]" id="inclusions">\
                        <p class="exp_error" style="display:none;color: red;">Please enter cabins</p>\
                    </div>\
                    <div class="fieldset half">\
                        <label>&nbsp</label>\
                        <a href="javascript:void(0);" class="delete_crossing" ><i class="far fa-times-circle" style="color: orange;"></i></a>\
                    </div>\
                </div>';
    $('.crossing_div').append(htmls);
    cabinsCntSet();

    });
    function cabinsCntSet(){
    var cnt = 1;
    $(".company_row").each(function() {
        //$(this).html('Day '+cnt);
        console.log('Day '+cnt);
        cnt++;
    });
    }
    function routeCntSet(){
    var cnt = 1;
    $(".route_row").each(function() {
        //$(this).html('Day '+cnt);
        console.log('Day '+cnt);
        cnt++;
    });
    }
    $(document).on('click', '.delete_crossing', function() {
    if(confirm('Are you sure?')){
        $(this).closest('.company_row').remove();
        cabinsCntSet();
    }

    }); 
    $(document).on('click', '.delete_route_crossing', function() {
    if(confirm('Are you sure?')){
        $(this).closest('.route_row').remove();
        cabinsCntSet();
    }

    });  
    $('.edit_company textarea').attr('readonly');
     $(document).on('click', '.edit_company_div', function() {
        $(this).parent().parent().removeClass('edit_company');
        $(this).parent().parent('edit_company').children('textarea').removeAttr('readonly');
        $(this).hide();
    });  
    
    //add more company
     $(document).on('click', '#add_more_company', function() {
        var cnt_row = $('.expCrossingRow').val();
            if(cnt_row == ''){cnt_row = 0;}
        var expCompanyRow = parseInt(cnt_row,10);
        $('.expCompanyRow').val(expCompanyRow+1);
       var htmls='';
        htmls += '<div class="section w_100" style="height:100%;float: left;">\
                        <div class="form company_row">\
                            <input type="hidden" value="{{isset($value) ? $value->id : ''}}" name="company_id" id="company_id">\
                            <div class="section w_50" style="height:100%;float: left;">\
                                <label style="color: #14213D;"><b>General Information</b></label>\
                                <div class="grouped">\
                                    <div class="fieldset half">\
                                        <label>Company name<!-- <span style="color:#F00">*</span> --></label>\
                                        <input type="text" required value="" name="company_data[company]['+expCompanyRow+'][company_name]" id="company_name">\
                                        <p class="exp_error" style="display:none;color: red;">Please enter company name</p>\
                                    </div>\
                                    <div class="fieldset half">\
                                        <label>General Email<!-- <span style="color:#F00">*</span> --></label>\
                                        <input type="text" required value="" name="company_data[company]['+expCompanyRow+'][general_email]" id="general_email">\
                                        <p class="exp_error" style="display:none;color: red;">Please enter company name</p>\
                                    </div>\
                                    <div class="fieldset half">\
                                        <label>Phone number<!-- <span style="color:#F00">*</span> --></label>\
                                        <input type="text" required value="" name="company_data[company]['+expCompanyRow+'][phone_number]" id="phone_number">\
                                        <p class="exp_error" style="display:none;color: red;">Please enter company name</p>\
                                    </div>\
                                </div>\
                            </div>\
                            <div class="section w_50" style="height:100%;float: left;">\
                                <label style="color: #14213D;"><b>Address</b></label>\
                                <div class="grouped">\
                                    <div class="fieldset half">\
                                        <label>Street<!-- <span style="color:#F00">*</span> --></label>\
                                        <input type="text" required value="" name="company_data[company]['+expCompanyRow+'][street]" id="street">\
                                        <p class="exp_error" style="display:none;color: red;">Please enter company name</p>\
                                    </div>\
                                    <div class="fieldset half">\
                                        <label>Town/City<!-- <span style="color:#F00">*</span> --></label>\
                                        <input type="text" required value="" name="company_data[company]['+expCompanyRow+'][town_city]" id="town_city">\
                                        <p class="exp_error" style="display:none;color: red;">Please enter company name</p>\
                                    </div>\
                                    </div>\
                            </div>\
                            <div class="section w_50" style="height:100%;float: left;">\
                                <label><b>About</b></label>\
                                <div class="grouped">\
                                    <div class="fieldset">\
                                        <textarea required value="{{isset($value) ? $value->about : ''}}" name="company_data[company]['+expCompanyRow+'][about]" id="about"></textarea>\
                                        <p class="exp_error" style="display:none;color: red;">Please enter company name</p>\
                                    </div>\
                                </div>\
                            </div>\
                            <div class="section w_50" style="height:100%;float:left;">\
                                <div class="grouped">\
                                    <div class="fieldset half">\
                                        <label>Postcode<!-- <span style="color:#F00">*</span> --></label>\
                                        <input type="text" required value="" name="company_data[company]['+expCompanyRow+'][postcode]" id="postcode">\
                                        <p class="exp_error" style="display:none;color: red;">Please enter company name</p>\
                                    </div>\
                                    <div class="fieldset half">\
                                        <label>Country<!-- <span style="color:#F00">*</span> --></label>\
                                        <input type="text" required value="" name="company_data[company]['+expCompanyRow+'][country]" id="country">\
                                        <p class="exp_error" style="display:none;color: red;">Please enter company name</p>\
                                    </div>\
                                </div>\
                            </div>\
                        </div>\
                    </div>';
    $('.company_div').append(htmls);
    companyCntSet();

    });
    
    function companyCntSet(){
    var cnt = 1;
    $(".cabinCnt").each(function() {
        //$(this).html('Day '+cnt);
        console.log('Day '+cnt);
        cnt++;
    });
    }
    $(document).on('click', '.delete_company', function() {
    if(confirm('Are you sure?')){
        $(this).closest('.company_row').remove();
        companyCntSet();
    }

    }); 
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
            e.preventDefault();
            var formData = $("#expData").serialize();
            $('.loader').show();    
            $.ajax({
                url: base_url+'/super-user/add-new-ship',
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
        });
        $(document).on("click", "#crossingFormSubmit", function(e){
            $('.loader').show();    
            var id = $(this).attr('data-id');
            let myform = document.getElementById("crossingData"+id);
                let fd = new FormData(myform );
                $.ajax({
                   url: base_url+'/super-user/update-crossing-details',
                    data: fd,
                    cache: false,
                    processData: false,
                    contentType: false,
                    type: 'POST',
                    success: function(data) {
                        $('.loader').hide(); 
                        toastSuccess('Crossing updated successfully.');
                        location.reload(); 
                    },
                });
        });
        $(document).on("click", "#crossingFormSubmitTemplate", function(e){
            $('.loader').show();    
            let myform = document.getElementById("crossingData");
                let fd = new FormData(myform );
                $.ajax({
                   url: base_url+'/super-user/update-crossing-template-details',
                    data: fd,
                    cache: false,
                    processData: false,
                    contentType: false,
                    type: 'POST',
                    success: function(data) {
                        $('.loader').hide(); 
                        toastSuccess('Crossing updated successfully.');
                        location.reload(); 
                    },
                });
        });
        $(document).on("click", "#compnayFormSubmit", function(e){
            // var desc = CKEDITOR.instances.e_description.getData();
            // $('#e_description').html(desc);
            e.preventDefault();
            var exp_name = $('.popup_content #company_name').val();
            var ship_id = $('#company_id').val();
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
                                toastError('Company is already added with same name.');
                            }else{
                                toastSuccess('Company added successfully.');
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
                            toastSuccess('Company updated successfully.');
                            location.reload(); 
                        },
                        error: function(e) {
                        }
                    }); 
                }
            
            }  
        });
        $(document).on("click", "#compnayCrossingFormSubmit", function(e){
            // var desc = CKEDITOR.instances.e_description.getData();
            // $('#e_description').html(desc);
            e.preventDefault();
            var exp_name = $('.popup_content #company_name').val();
            var ship_id = $('#company_id').val();
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
                        url: base_url+'/super-user/add-new-company-crossing',
                        type: 'POST',
                        data: {'formData':formData},
                        success: function(data) {
                            $('.loader').hide(); 
                            if(data.status == 'failed'){
                                toastError('Company is already added with same name.');
                            }else{
                                toastSuccess('Company added successfully.');
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
                        url: base_url+'/super-user/update-company-crossing-details',
                        type: 'POST',
                        data: {'formData':formData},
                        success: function(data) {
                            $('.loader').hide(); 
                            toastSuccess('Company updated successfully.');
                            location.reload(); 
                        },
                        error: function(e) {
                        }
                    }); 
                }
            
            }  
        });
        $("#addShip").bind("click", function(e){
            var exp_id = $(this).data('id');
            $('.loader').show();  
            $('#addShipModal').modal('hide');  
            $.ajax({
                url: base_url+'/super-user/get-ship-details',
                type: 'POST',
                data: {'exp_id':exp_id},
                success: function(data) {
                    $('.account_popup').html(data);
                    $('.loader').hide();  
                    $('.account_popup').show();
                },
                error: function(e) {
                }
            });   
        });
         $("#addCompany").bind("click", function(e){
            var ship_id = $(this).data('id');
            $('.loader').show();   
            $('#addShipModal').modal('hide'); 
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
         $("#addCrossingCompany").bind("click", function(e){
            var ship_id = $(this).data('id');
            $('.loader').show();   
            $('#addShipModal').modal('hide'); 
            $.ajax({
                url: base_url+'/super-user/get-crossing-company-details',
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
         
       $("#addCrossing").bind("click", function(e){
            $('.loader').show();    
            $('#addShipModal').modal('hide');
            $.ajax({
                url: base_url+'/super-user/database-ships-crossings',
                type: 'POST',
                success: function(data) {
                    $('.account_popup').html(data);
                    $('.loader').hide();  
                    $('.account_popup').show();
                },
                error: function(e) {
                }
            });   
        });
       $("#addCrossingTemplate").bind("click", function(e){
            $('.loader').show();    
            $('#addShipModal').modal('hide');
            $.ajax({
                url: base_url+'/super-user/database-ships-template-crossings',
                type: 'POST',
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
            $(".shipsList").hide();
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