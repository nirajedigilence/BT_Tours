@extends('layouts.front')

@section('content')

{!! Form::open(array('route' => 'stocklist-ship-dates-editupdate','method'=>'POST', 'enctype' => 'multipart/form-data', 'class'=>'stocklistHotelDatesEditForm', 'id'=>'stocklistHotelDatesEditForm')) !!}      
    <!-- <div class="modal-header">
        <div class="row">
            <div class="col-sm-12">
                <h5 class="modal-title" id="exampleModalLongTitle"><b>{{ $shipList->name }}</b></h5>
            </div>
            <div class="col-sm-12">
                <p>You can add edit dates listed below.</p>
            </div>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> -->
<style type="text/css">
    input.required {
        border: 1px solid red;
    }
    .tour_confirmation_wrapper .tour_confirmation .tc_content .tc_boxes .tc_box_wrapper .tc_box .body .rates_table .rt_row .rt_column.label {
        justify-content: flex-start;
        font-weight: 600;
    }
    .body.selected-delete {
        border-color: orange !important;
    }
    .box_date{
        border: 1px solid #000;
        padding: 10px;
        margin-bottom: 5px;
    }
    label{color:#000000 !important;}
    .no-boder{border: none !important;padding: 0px !important;}
    .editsaveAllChangesBtn {
        width: 150px;
        /* margin: 0 0 15px 0; */
        float: left;
        padding: 7px 0px;
        color: white !important;
        cursor: pointer;
    }
    span.notClickedCls {
        font-size: 14px;
    }
    .checkarea_part_Dates {
    float: left;
    width: 100%;
    display: inline-block;
}
/*notes*/
.notes {
    margin-top: 10px;
}
.notes .note {
    float: none;
    width: 100%;
    font-size: inherit;
    margin-bottom: 30px;
}  
.notes .note .header {
    display: flex;
    align-items: flex-end;
    margin-bottom: 10px;
}
.notes .note .header .initials {
    font-size: 1.25rem;
    font-weight: 700;
    line-height: 1;
    color: #14213D;
    margin-right: 20px;
}
.notes .note .header .date {
    font-size: 1rem;
    font-weight: 400;
    line-height: 1;
    color: #ACACAC;
}

.notes .note .body {
    border: solid 1px #DCDCDC;
    box-shadow: 0px 3px 6px #00000029;
    font-size: 1rem;
    font-weight: 600;
    line-height: 1.5;
    color: #14213D;
    padding: 18px 26px;
} 
table.supplements td {
    padding: 5px !important;
}
table.supplements input,select {
    width: 70% !important;
}
.euro_price{
    float: left;
    width: 50%;
}
.pound_price {
    width: 50%;
    float: left;
}
.checkbox_div{font-size: 12px;}
.checkarea_part_Dates{width: unset;}
select.form-control.notClickedCls {
    width: 92% !important;
}
<?php if(isset($is_view)){ ?>

<?php } ?>
</style>
 <div class="modal-body" >
<?php 
    $cnts = 0110;

    foreach ($shipDateArray as $key => $value) { ?>              
<div class="notIndexContainer" style="padding-top:0;">
    <div class="tour_confirmation_wrapper" style="padding: 0;">
        <div class="tour_confirmation">

           <!--  <div class="logo">
                <img src="{{ asset('images/logo2x.png') }}" alt="Veenus">
            </div> -->
            <div class="tc_intro" style="margin-top: 10px;">
                <div class="heading">{{(!empty($_GET['contracts']) && !isset($_GET['new_date']))?'CONTRACT':'CRUISE CONFIRMATION'}}</div>
            </div>

            <div class="tc_content" style="margin-top: 100px;">

                <div class="tc_boxes">
                    <?php 
                    $uri_segment_ship_id = Request::segment(3);
                    if(!empty($_GET['contracts']) && isset($_GET['pdf'])){ ?> 
                         
                        <!-- <div class="tc_box_wrapper">
                            <div class="tc_box">

                                <div class="header">
                                    Address
                                   
                                </div>

                                <div class="body">
                                     <textarea id="c_address" name="c_address" class="form-control" ></textarea>

                                </div>

                            </div>
                        </div>
                        <div class="tc_box_wrapper">
                            <div class="tc_box">

                                <div class="header">
                                    Message
                                   
                                </div>

                                <div class="body">
                                     <textarea id="message" name="message" class="form-control" ></textarea>

                                </div>

                            </div>
                        </div> -->
                         
                    <?php } ?>
                    <div class="tc_box_wrapper">
                        <div class="tc_box">

                            <div class="header">
                                Ref
                            </div>

                            <div class="body">

                                <p>
                                    {{ !empty($experienceDate->hc_ref_number)?$experienceDate->hc_ref_number:(!empty($ref_num)?$ref_num:'') }}
                                </p>

                            </div>

                        </div>
                    </div>
                    
                    <div class="box_date" id="DateDiv">
                        <div class="tc_box_wrapper split">

                            <div class="tc_box">

                                <div class="header">
                                    Dates
                                </div>

                                <div class="body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>River:</label>
                                              <input type="test" class="notClickedCls form-control hdioCls" name="dates_edit[{{ $value->id }}][river]" id="river{{$cnts}}" placeholder="river" value="{{ ($value->river)?$value->river:'' }}" required="" data-id="{{$cnts}}" style="font-size: 0.80rem;padding: 5px;text-transform: capitalize;">
                                          </div>
                                           <div class="col-md-6">
                                            <label>Routes:</label> 
                                            <input type="test" class="notClickedCls form-control hdioCls" name="dates_edit[{{ $value->id }}][routes]" id="routes{{$cnts}}" placeholder="routes" value="{{ ($value->routes)?$value->routes:'' }}" required="" data-id="{{$cnts}}" style="font-size: 0.80rem;padding: 5px;text-transform: capitalize;">
                                        </div>
                                         
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>Embarkation:</label>
                                              <input type="test" class="notClickedCls form-control hdioCls" name="dates_edit[{{ $value->id }}][embarkation]" id="embarkation{{$cnts}}" placeholder="Embarkation" value="{{ ($value->embarkation)?$value->embarkation:'' }}" required="" data-id="{{$cnts}}" style="font-size: 0.80rem;padding: 5px;">
                                          </div>
                                           <div class="col-md-3">
                                            <label>Date In:</label> 
                                            <input type="date" class="notClickedCls dateChangeCls form-control dateInCls{{$cnts}} hdioCls date_in_cls" name="dates_edit[{{ $value->id }}][date_in]" id="DateIn{{$cnts}}" placeholder="Date In" value="{{ (!isset($_GET['contracts']))?$value->date_in:'' }}" required="" data-id="{{$cnts}}" style="font-size: 0.80rem;padding: 5px;">
                                        </div>
                                         <div class="col-md-3">
                                            <label>Hrs:</label> 
                                            <input type="time" class="notClickedCls dateChangeCls form-control dateInCls{{$cnts}} hdioCls hour_in_cls" name="dates_edit[{{ $value->id }}][time_in]" id="DateIn{{$cnts}}" placeholder="Date In" value="{{ (!isset($_GET['contracts']))?$value->time_in:'' }}" required="" data-id="{{$cnts}}" style="font-size: 0.80rem;padding: 5px;">
                                                <input type="hidden" class="" name="dates_edit[{{ $value->id }}][id]" id="DateId{{$cnts}}"  value="{{ $value->id }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                        <label>Disembarkation:</label>
                                          <input type="test" class="notClickedCls form-control hdioCls" name="dates_edit[{{ $value->id }}][disembarkation]" id="embarkation{{$cnts}}" placeholder="Disembarkation" value="{{ ($value->disembarkation)?$value->disembarkation:'' }}" required="" data-id="{{$cnts}}" style="font-size: 0.80rem;padding: 5px;">
                                        </div>
                                        <div class="col-md-3">
                                        <label>Date Out:</label> 
                                         <input type="date" class="notClickedCls dateChangeCls hdioCls dateOutCls{{$cnts}} form-control date_out_cls" name="dates_edit[{{ $value->id }}][date_out]" id="DateOut{{$cnts}}" placeholder="Date Out" value="{{ (!isset($_GET['contracts']))?$value->date_out:'' }}" required data-id="{{$cnts}}" style="font-size: 0.80rem;padding: 5px;">
                                         <input type="hidden" class="notClickedCls hdioCls form-control nightCls" name="dates_edit[{{ $value->id }}][night]" id="Nights{{$cnts}}" placeholder="Nights" value="{{ (!isset($_GET['contracts']))?$value->night:'' }}" readonly="" required>
                                        </div>
                                        <div class="col-md-3">
                                        <label>Hrs:</label> 
                                        <input type="time" class="notClickedCls dateChangeCls form-control dateInCls{{$cnts}} hdioCls hour_out_cls" name="dates_edit[{{ $value->id }}][time_out]" id="DateIn{{$cnts}}" placeholder="Date In" value="{{ (!isset($_GET['contracts']))?$value->time_out:'' }}" required="" data-id="{{$cnts}}" style="font-size: 0.80rem;padding: 5px;">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            

                        </div>
                        <?php if(!empty($_GET['contracts'])){ ?> 
                            <!-- <div class="dates_div"></div>
                        <button class="btn-sm btn-primary mb-2 mt-2" type="button" id="add_dates">Add Date</button> -->
                        <?php } ?>
                        <div class="tc_box_wrapper">
                            <div class="tc_box">

                                <div class="header">
                                    
                                     <div style="width:55%;">Rates & Allocation  </div>
                                        <div style="width:45%;">
                                            
                                        </div> 
                                </div>

                                <div class="body">
                                    
                                    <div class="rates_table">
                                       <!--  <div class="row">
                                            <div class="col-md-3">
                                                <label>SS :</label>
                                                  <input type="test" class="notClickedCls form-control hdioCls" name="dates_edit[{{ $value->id }}][ss_percentage]" id="ss_percentage{{$cnts}}" placeholder="SS " value="{{ ($value->ss_percentage)?$value->ss_percentage:'' }}" required="" data-id="{{$cnts}}" style="font-size: 0.80rem;padding: 5px;text-transform: capitalize;">
                                              </div>
                                               <div class="col-md-6">
                                                <label>SS After:</label>
                                                <input type="test" class="notClickedCls form-control hdioCls" name="dates_edit[{{ $value->id }}][ss_after_percentage]" id="ss_after_percentage{{$cnts}}" placeholder="SS After" value="{{ ($value->ss_after_percentage)?$value->ss_after_percentage:'' }}" required="" data-id="{{$cnts}}" style="font-size: 0.80rem;padding: 5px;text-transform: capitalize;">
                                            </div>
                                             
                                        </div> -->
                                        <div class="rt_row">
                                            
                                             <div class="rt_column label">
                                                Cabin Type
                                            </div>
                                            <div class="rt_column label">
                                                No. Cabins
                                            </div>

                                            <div class="rt_column label">
                                                Rate pp &#8364;
                                            </div>

                                            <div class="rt_column label">
                                                SS pp &#8364;
                                            </div>
                                             <div class="rt_column label">
                                                SS 
                                            </div>
                                           <!--  <div class="rt_column label">
                                                Overnight SS 
                                            </div>
                                            <div class="rt_column label">
                                                Crossing Route SS 
                                            </div> -->
                                            <div class="rt_column label ss_after_div" <?=!empty($value->ss_after_show)?'':'style="display:none;"';?>>
                                                SS After &nbsp;<input class="" type="text"  name="dates_edit[{{ $value->id }}][ss_after_value]" value="{{$value->ss_after_value}}" style="width: 15%;padding: 5px;" > &#8364; 
                                            </div>
                                             <div class="rt_column label ss_after_div" <?=!empty($value->ss_after_show)?'':'style="display:none;"';?>>
                                                SS After 
                                            </div>
                                            <!-- <div class="rt_column label ss_after_div" <?=!empty($value->ss_after_show)?'':'style="display:none;"';?>>
                                                Overnight SS After 
                                            </div>
                                            <div class="rt_column label ss_after_div" <?=!empty($value->ss_after_show)?'':'style="display:none;"';?>>
                                                 Crossing Route SS After 
                                            </div> -->
                                            <div class="rt_column label">
                                                <span id="add_after_div" style="color:orange;cursor: pointer;"><?=!empty($value->ss_after_show)?'Remove SS After':'Add SS After';?></span>
                                                <input class="" type="hidden"  name="dates_edit[{{ $value->id }}][ss_after_show]" style="width: 15%;padding: 5px;" id="ss_after_show" value="{{$value->ss_after_show}}" >
                                            </div>
                                        </div>
                                        <?php /*if(empty($value->shipDatesRates[0])){ 
                                            if(!empty($shipList->shipCabins))
                                            {
                                                $i=0;
                                            foreach($shipList->shipCabins as $cabin_value){ ?> 
                                        <div class="rt_row">                                         
                                            <div class="rt_column bold no-boder">
                                                <input type="text" class="notClickedCls hdioCls form-control " id="cabin_type{{$cnts}}" placeholder="Cabin type" value="{{ $cabin_value->name }}" name="dates_edit[rates][{{ $i }}][cabin_type]" >
                                            </div>
                                            <div class="rt_column bold no-boder">
                                                <input type="text" class="notClickedCls hdioCls form-control numbercls" id="Dbl{{$cnts}}" placeholder="No. Cabins" value="{{ $value->no_cabin }}" name="dates_edit[rates][{{ $i }}][no_cabin]" >
                                            </div>
                                            <div class="rt_column bold no-boder">
                                                <input type="text" class="notClickedCls hdioCls form-control numbercls" id="ss{{$cnts}}" placeholder="SS" value="{{ $value->rate_euro }}" name="dates_edit[rates][{{ $i }}][rate_euro]" >
                                            </div>
                                            <div class="rt_column bold no-boder disabled">
                                                 <input type="text" class="notClickedCls hdioCls form-control numbercls" id="ss{{$cnts}}" placeholder="SS " value="{{ $value->ss_euro }}" name="dates_edit[rates][{{ $i }}][ss_euro]" >
                                            </div>    
                                            <div class="rt_column bold no-boder disabled ss_after_div" <?=!empty($value->ss_after_show)?'':'style="display:none;"';?>>
                                                 <input type="text" class="notClickedCls  form-control numbercls" id="ss_after{{$cnts}}" placeholder="SS After" value="{{ $value->ss_after_euro }}" name="dates_edit[rates][{{ $i }}][ss_after_euro]" >
                                            </div>  
                                            <div class="rt_column rt_column bold no-boder disabled" <?=!empty($value->ss_after_show)?'style="display:none;"':'';?>>&nbsp;</div>                                         
                                        </div>
                                        <?php $i++;} } } */ ?>
                                        <?php 
                                        if(isset($shipCabinRate)){
                                            if(count($shipCabinRate) >= 1){
                                                $cnts = '11565';
                                            foreach ($shipCabinRate as $key => $valField) { 
                                                 ?>
                                                 <div class="rt_row">                                         
                                                    <div class="rt_column bold no-boder">

                                                        <input type="text" class="notClickedCls hdioCls form-control " id="cabin_type{{$cnts}}" readonly placeholder="Cabin type" value="{{ $valField->name }}" name="dates_edit[rates][{{ $valField->id }}][cabin_type]" >
                                                        <input name="dates_edit[rates][<?=$valField->id?>][cabin_id]" class="form-control" value="{{ $valField->id }}" type="hidden">
                                                         <input name="dates_edit[rates][<?=$valField->id?>][id]" class="form-control" value="{{ $valField->cabin_rate_id }}" type="hidden">
                                                    </div>
                                                    <div class="rt_column bold no-boder">
                                                        <input type="text" class="notClickedCls hdioCls form-control numbercls" id="Dbl{{$cnts}}" placeholder="No. Cabins" value="{{ $valField->no_cabin }}" name="dates_edit[rates][{{ $valField->id }}][no_cabin]" >
                                                    </div>
                                                    <div class="rt_column bold no-boder">
                                                        <input type="text" class="notClickedCls hdioCls form-control numbercls" id="ss{{$cnts}}" placeholder="SS" value="{{ $valField->rate_euro }}" name="dates_edit[rates][{{ $valField->id }}][rate_euro]" >
                                                    </div>
                                                    <div class="rt_column bold no-boder disabled">
                                                         <input type="text" class="notClickedCls hdioCls form-control numbercls" id="ss{{$cnts}}" placeholder="SS " value="{{ $valField->ss_euro }}" name="dates_edit[rates][{{ $valField->id }}][ss_euro]" >
                                                    </div>    
                                                     <div class="rt_column bold no-boder disabled">
                                                         <input type="text" class="notClickedCls hdioCls form-control numbercls" id="ss{{$cnts}}" placeholder="SS " value="{{ isset($valField->ss_percentage)?$valField->ss_percentage:'' }}" name="dates_edit[rates][{{ $valField->id }}][ss_percentage]" >
                                                    </div>   
                                                    <!--  <div class="rt_column bold no-boder disabled">
                                                         <input type="text" class="notClickedCls hdioCls form-control numbercls" id="ss{{$cnts}}" placeholder="SS " value="{{ isset($valField->overnight_ss)?$valField->overnight_ss:'' }}" name="dates_edit[rates][{{ $valField->id }}][overnight_ss]" >
                                                    </div>   
                                                     <div class="rt_column bold no-boder disabled">
                                                         <input type="text" class="notClickedCls hdioCls form-control numbercls" id="ss{{$cnts}}" placeholder="SS " value="{{ isset($valField->crossing_route_ss)?$valField->crossing_route_ss:'' }}" name="dates_edit[rates][{{ $valField->id }}][crossing_route_ss]" >
                                                    </div>   -->  
                                                    <div class="rt_column bold no-boder disabled ss_after_div" <?=!empty($value->ss_after_show)?'':'style="display:none;"';?>>
                                                         <input type="text" class="notClickedCls hdioCls form-control numbercls" id="ss_after{{$cnts}}" placeholder="SS After" value="{{ $valField->ss_after_euro }}" name="dates_edit[rates][{{ $valField->id }}][ss_after_euro]" >
                                                    </div>   
                                                     <div class="rt_column bold no-boder disabled ss_after_div" <?=!empty($value->ss_after_show)?'':'style="display:none;"';?>>
                                                         <input type="text" class="notClickedCls hdioCls form-control numbercls" id="ss_after_percentage{{$cnts}}" placeholder="SS After " value="{{ isset($valField->ss_after_percentage)?$valField->ss_after_percentage:'' }}" name="dates_edit[rates][{{ $valField->id }}][ss_after_percentage]" >
                                                    </div>  
                                                    <!-- <div class="rt_column bold no-boder disabled ss_after_div" <?=!empty($value->ss_after_show)?'':'style="display:none;"';?>>
                                                         <input type="text" class="notClickedCls hdioCls form-control numbercls" id="overnight_ss_after{{$cnts}}" placeholder="SS After " value="{{ isset($valField->overnight_ss_after)?$valField->overnight_ss_after:'' }}" name="dates_edit[rates][{{ $valField->id }}][overnight_ss_after]" >
                                                    </div>  
                                                    <div class="rt_column bold no-boder disabled ss_after_div" <?=!empty($value->ss_after_show)?'':'style="display:none;"';?>>
                                                         <input type="text" class="notClickedCls hdioCls form-control numbercls" id="crossing_route_ss_after{{$cnts}}" placeholder="SS After " value="{{ isset($valField->crossing_route_ss_after)?$valField->crossing_route_ss_after:'' }}" name="dates_edit[rates][{{ $valField->id }}][crossing_route_ss_after]" >
                                                    </div>   -->
                                                    <div class="rt_column rt_column bold no-boder disabled" >&nbsp;</div>                                        
                                                </div>
                                        <?php
                                            $cnts++;
                                            
                                         } } } ?>
                                        <div class="supplement_div">
                                       <div class="rt_row">
                                            
                                             <div class="rt_column label">
                                                Supplement name
                                            </div>
                                            <div class="rt_column label">
                                                Cost
                                            </div>

                                            <div class="rt_column label">
                                                In Price &#8364;
                                            </div>

                                            <div class="rt_column label">
                                                Out Price &#8364;
                                            </div>

                                            <div class="rt_column label">
                                                Out Price &#163;
                                            </div>
                                            
                                        </div>
                                        <?php 
                                        if(isset($value->shipDatesSupplements)){
                                            if(count($value->shipDatesSupplements) >= 1){
                                                $cnts = '11565';
                                            foreach ($value->shipDatesSupplements as $key => $valField) { 
                                                 ?>
                                                 <div class="rt_row supplement_row">
                                                    <div class="rt_column bold no-boder">
                                                        <input type="text" class="notClickedCls hdioCls form-control"  placeholder="Supplement name" value="{{$valField->supplement_name}}" name="dates_edit[supplement][{{$valField->id}}][supplement_name]" >
                                                         <input name="dates_edit[supplement][<?=$valField->id?>][id]" class="form-control" value="{{ $valField->id }}" type="hidden">
                                                    </div>
                                                    <div class="rt_column bold no-boder">
                                                         <select class="form-control notClickedCls" name="dates_edit[supplement][{{$valField->id}}][price_type]">
                                                                    <option <?=(!empty($valField->price_type) && $valField->price_type == 'pppn')?'selected="selected"':''?> value="pppn">pppn</option>
                                                                    <option <?=(!empty($valField->price_type) && $valField->price_type == 'prpn')?'selected="selected"':''?> value="prpn">prpn</option>
                                                        </select>
                                                    </div>
                                                    <div class="rt_column bold no-boder">
                                                        <input type="text" class="notClickedCls hdioCls form-control numbercls"  placeholder="In Price" value="{{$valField->in_price_euro}}" name="dates_edit[supplement][{{$valField->id}}][in_price_euro]" >
                                                    </div>
                                                    <div class="rt_column bold no-boder disabled">
                                                         <input type="text" class="notClickedCls hdioCls form-control numbercls"  placeholder="Out Price" value="{{$valField->out_price_euro}}" name="dates_edit[supplement][{{$valField->id}}][out_price_euro]" >
                                                    </div>
                                                    <div class="rt_column bold no-boder disabled">
                                                         <input type="text" class="notClickedCls hdioCls form-control numbercls"  placeholder="Out Price" value="{{$valField->out_price_pound}}" name="dates_edit[supplement][{{$valField->id}}][out_price_pound]" >
                                                    </div>
                                                    <div class="bold no-boder disabled">
                                                        <a href="javascript:void(0);" class="delete_supplement" style=""><i class="far fa-times-circle"></i></a>
                                                    </div>
                                                    </div>
                                        <?php
                                            $cnts++;
                                            
                                         } } } ?>
                                        </div>
                                        <div class="rt_row mt-3">
                                        <input type="button" class="btn btn-primary btn-sm" value="Add row" id="add_supplement_more">
                                        <input type="hidden" name="expSupplementRow" class="expSupplementRow" value="" >
                                        </div>
                                        <?php /*if(!empty($_GET['contracts'])){*/ ?> 
                                         <!-- <input type="button" id="add_euro" value="Add Euro" class="btn btn-secondary" > -->
                                     <?php /*}*/ ?>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="tc_box_wrapper">
                            <div class="tc_box">

                                <div class="header">
                                    
                                     <div style="width:55%;">Excursions  </div>
                                        <div style="width:45%;">
                                            
                                        </div> 
                                </div>

                                <div class="body">

                                    <div class="rates_table">

                                        <div class="excursion_div">
                                       <div class="rt_row">
                                            
                                             <div class="rt_column label">
                                                Excursion name
                                            </div>
                                            <div class="rt_column label">
                                                Cost
                                            </div>

                                            <div class="rt_column label">
                                                In Price &#8364;
                                            </div>

                                            <div class="rt_column label">
                                                Out Price &#8364;
                                            </div>

                                            <div class="rt_column label">
                                                Out Price &#163;
                                            </div>
                                            
                                        </div>
                                         <?php 
                                        if(isset($value->shipDatesExcursions)){
                                            if(count($value->shipDatesExcursions) >= 1){
                                                $cnts = '11565';
                                            foreach ($value->shipDatesExcursions as $key => $valField) { 
                                                 ?>
                                                 <div class="rt_row excursion_row">
                                                    <div class="rt_column bold no-boder">
                                                        <input type="text" class="notClickedCls hdioCls form-control"  placeholder="Excursion name" value="{{$valField->excursion_name}}" name="dates_edit[excursion][{{$valField->id}}][excursion_name]" >
                                                         <input name="dates_edit[excursion][<?=$valField->id?>][id]" class="form-control" value="{{ $valField->id }}" type="hidden">
                                                    </div>
                                                    <div class="rt_column bold no-boder">
                                                         <select class="form-control notClickedCls" name="dates_edit[excursion][{{$valField->id}}][price_type]">
                                                                    <option <?=(!empty($valField->price_type) && $valField->price_type == 'pppn')?'selected="selected"':''?> value="pppn">pppn</option>
                                                                    <option <?=(!empty($valField->price_type) && $valField->price_type == 'prpn')?'selected="selected"':''?> value="prpn">prpn</option>
                                                        </select>
                                                    </div>
                                                    <div class="rt_column bold no-boder">
                                                        <input type="text" class="notClickedCls hdioCls form-control numbercls"  placeholder="In Price" value="{{$valField->in_price_euro}}" name="dates_edit[excursion][{{$valField->id}}][in_price_euro]" >
                                                    </div>
                                                    <div class="rt_column bold no-boder disabled">
                                                         <input type="text" class="notClickedCls hdioCls form-control numbercls"  placeholder="Out Price" value="{{$valField->out_price_euro}}" name="dates_edit[excursion][{{$valField->id}}][out_price_euro]" >
                                                    </div>
                                                    <div class="rt_column bold no-boder disabled">
                                                         <input type="text" class="notClickedCls hdioCls form-control numbercls"  placeholder="Out Price" value="{{$valField->out_price_pound}}" name="dates_edit[excursion][{{$valField->id}}][out_price_pound]" >
                                                    </div>
                                                    <div class="bold no-boder disabled">
                                                        <a href="javascript:void(0);" class="delete_excursion" style=""><i class="far fa-times-circle"></i></a>
                                                    </div>
                                                    </div>
                                        <?php
                                            $cnts++;
                                            
                                         } } } ?>
                                        </div>
                                        <div class="rt_row mt-3">
                                        <input type="button" class="btn btn-primary btn-sm" value="Add row" id="add_excursion_more">
                                        <input type="hidden" name="expExcursionRow" class="expExcursionRow" value="" >
                                        </div>
                                        <?php /*if(!empty($_GET['contracts'])){*/ ?> 
                                         <!-- <input type="button" id="add_euro" value="Add Euro" class="btn btn-secondary" > -->
                                     <?php /*}*/ ?>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                    <!--  <div class="tc_box_wrapper">
                        <div class="tc_box">

                            <div class="header">
                                Free Place
                                <a href="javascript:;" id="freeEdit">Edit</a>
                            </div>

                            <div class="body">
                                <textarea id="freeField" name="free_place" class="form-control" style="display: none;">{{ !empty($experienceDate->hc_free_place)?$experienceDate->hc_free_place:$value->hc_free_place }}</textarea>
                                <div id="freeContent">
                                    {!! !empty($experienceDate->hc_free_place)?nl2br($experienceDate->hc_free_place):nl2br($value->hc_free_place) !!}
                                </div>
                               

                            </div>

                        </div>
                    </div>
                     <div class="tc_box_wrapper">
                        <div class="tc_box">

                            <div class="header">
                                Meal Arrangements
                                <a href="javascript:;" id="mealEdit">Edit</a>
                            </div>

                            <div class="body">
                                <textarea id="mealField" name="meal_arrangements" class="form-control" style="display: none;">{{ !empty($experienceDate->hc_mean_arrangements)?$experienceDate->hc_mean_arrangements:$value->hc_mean_arrangements }}</textarea>
                                <div id="mealContent">
                                    {!! !empty($experienceDate->hc_mean_arrangements)?nl2br($experienceDate->hc_mean_arrangements):nl2br($value->hc_mean_arrangements) !!}
                                    
                                </div>

                            </div>

                        </div>
                    </div>
                   <div class="tc_box_wrapper">
                        <div class="tc_box">

                            <div class="header">
                                Entertainments
                                <a href="javascript:;" id="sfEdit">Edit</a>
                            </div>

                            <div class="body">
                                <textarea id="sfField" name="services_facilities" class="form-control" rows="7" style="display: none;">{{ !empty($value->hc_entertainments)?nl2br($value->hc_entertainments):'' }}</textarea>
                                <div id="sfContent">
                                    {!! !empty($value->hc_entertainments)?nl2br($value->hc_entertainments):'' !!}
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="tc_box_wrapper">
                        <div class="tc_box">

                            <div class="header">
                                Terms and Conditions
                                <a href="javascript:;" id="tncEdit">Edit</a>
                            </div>

                            <div class="body">
                                <textarea id="tncField" name="terms_conditions" class="form-control" rows="7" style="display: none;">{{ !empty($experienceDate->hc_terms_conditions)?$experienceDate->hc_terms_conditions:$value->hc_terms_conditions }}</textarea>
                                <div class="tc_section" id="tcContent">
                                    {!! !empty($experienceDate->hc_terms_conditions)?nl2br($experienceDate->hc_terms_conditions):nl2br($value->hc_terms_conditions) !!}
                                </div>
                                

                            </div>

                        </div>
                    </div> -->
                     <?php if(!empty($_GET['contracts'])){ ?> 

                      <!--   <div class="dates_rate_div"></div>
                    <button class="btn-sm btn-primary mb-2 mt-2" type="button" id="add_upgrade">Add Date and Rate</button> -->
                    <?php } ?>
                 
                   
                    <div class="tc_box_wrapper">
                        <div class="tc_box">

                            <div class="header">
                                Cruise Contract
                                <!-- <a href="javascript:;" id="tncEdit">Edit</a> -->
                            </div>

                            <div class="body" >
                                 
                                     <?php 
                                    if(!isset($_GET['new_date'])){ 
                                    if(!empty($value->contract)){
                                        $cfiles = explode(',',$value->contract);
                                        foreach($cfiles as $ff)
                                        {
                                            if(!empty($ff)){ ?>
                                            
                                            <div>
                                            <span class="hotelDatesInOutCls">
                                                  <?php echo !empty($ff) ? '<i class="fas fa-file-pdf yellowClrCls"></i> <a target="_blank" href="'.asset('hoteldates_uploads/'.$ff).'" class="notClickedCls"><b style="color:#FCA311;">View document '.str_replace('hoteldates_uploads/','',$ff).'</b></a>' : ''; ?></span>
                                            <span class="remove_c_file" data-file="<?=$ff?>"> <i style="color: red;cursor: pointer;" class="fas fa-trash"></i> </span>
                                            </div>
                                            <?php 
                                            }
                                        }
                                    } } ?>
                                  <?php if(!isset($_GET['type'])){ ?>
                                <input multiple type="file" name="dates_edit[{{ $value->id }}][contract][]" class="hdioCls form-control notClickedCls" accept=".pdf,image/*">
                                <?php } ?>
                                <div id="remove_contract_file"></div>
                            </div>
                                

                            </div>

                    </div>
                    <?php if(!empty($value->cancel_file)){ ?> 
                    <div class="tc_box_wrapper">
                        <div class="tc_box">

                            <div class="header">
                                Cancel Note
                            </div>

                            <div class="body">

                                <p>
                                    {{ !empty($value->cancel_notes)?$value->cancel_notes:'' }}
                                </p>
                                <?php if(!empty($value->cancel_file)){ ?> 
                                    <div>
                                            <span class="hotelDatesInOutCls">
                                                  <?php echo !empty($value->cancel_file) ? '<i class="fas fa-file-pdf yellowClrCls"></i> <a target="_blank" href="'.asset('hoteldates_uploads/'.$value->cancel_file).'" class="notClickedCls"><b style="color:#FCA311;">View document '.str_replace('hoteldates_uploads/','',$value->cancel_file).'</b></a>' : ''; ?></span>
                                           
                                            </div>
                                <?php } ?>
                                
                            </div>

                        </div>
                    </div>
                    <?php } ?>
                     <?php /* if(empty($_GET['contracts'])){  ?> 
                         <div class="section mt-5">
                                <div class="column w_100">
                                    <div class="white_box">

                                        <div class="heading">
                                            Notes
                                        </div>
                                        
                                       

                                        <div id="notes">
                                            <div id="exTab3" class="container pb-3"> 
                                                <div id="tab_id_{{ $ship_book_date_id }}">
                                                    
                                                
                                                    <!-- @include ('partials.ship_stocklist.tour_notes',[
                                                        'hotel_date_id' => $ship_book_date_id,'user_type' =>'1'
                                                      ]) -->
                                                </div>
                                              </div>
                                            <!-- <div class="sub_heading">
                                                Tour Notes
                                            </div> -->

                                            

                                        </div>

                                    </div>

                                </div>
                            </div>
                        <?php } */?>
                    
                    

                </div>    
                
             <?php /* if(empty($_GET['contracts'])){  ?> 
             <div class="section mt-5">
                    <div class="column w_100">
                        <div class="white_box">

                            <div class="heading">
                                Notes
                            </div>
                            
                           

                            <div id="notes">
                                <div id="exTab3" class="container pb-3"> 
                                    <div id="tab_id_{{ $ship_book_date_id }}">
                                        
                                    
                                        <!-- @include ('partials.ship_stocklist.tour_notes',[
                                            'hotel_date_id' => $ship_book_date_id,'user_type' =>'1'
                                          ]) -->
                                    </div>
                                  </div>
                                <!-- <div class="sub_heading">
                                    Tour Notes
                                </div> -->

                                

                            </div>

                        </div>

                    </div>
                </div>
            <?php } */?>
        </div>
    </div>
</div>
<?php } ?>
<div id="tobeprinted" style="display:none;"></div>

</div><!-- end modal body -->
<div class="modal-footer displayInitialCls">
        <input type="hidden" value="<?=isset($is_ship_assieged)?$is_ship_assieged:''?>" name="changed_dates" id="changed_dates">
         <textarea style="visibility: hidden;" value="" name="changed_note" id="changed_note"></textarea>
        <input type="hidden" value="" name="is_changed" id="is_changed">
        <input type="hidden" value="" name="is_resign" id="is_resign">
        <input type="hidden" name="display_euro_rate" id="display_euro_rate" value="">
        <input type="hidden" name="ship_id" value="{{$ship_id}}">
        <input type="hidden" name="exp_id" value="{{!empty($experience->id)?$experience->id:''}}">
        <input type="hidden" name="exp_date_id" value="{{!empty($exp_date_id)?$exp_date_id:''}}">
        <input type="hidden" value="<?=$cart_id?>" name="cart_id" id="cart_id">
        <?php if(!isset($_GET['type'])){ ?>
        <?php if(isset($_GET['new_date'])){ ?> 
        <input type="hidden" value="<?=$new_ship_book_date_id?>" name="ship_book_date_id" id="ship_book_date_id">
        <?php } else { ?>
            <input type="hidden" value="<?=$ship_book_date_id?>" name="ship_book_date_id" id="ship_book_date_id">
        <?php } ?>
        <input type="hidden" name="market_option" id="market_option" value="<?=(!empty($market_option_selected))?$market_option_selected:'0'?>">
        <!-- <button type="button" class="btn btn-secondary cancel float-left shipFooteCloseCls" data-dismiss="modal" style="margin-left: 10px;">Close</button> -->
        {{-- <a class="yellowClrBtn editsaveAllChangesBtn" href="javascript:;" data-dismiss="modal">Save all changes</a> --}}
        <?php if(!empty($_GET['contracts'])){  ?> 
            <input type="hidden" name="contract" value="1">
            <input type="hidden" name="contract_save" id="contract_save" value="">
            <input type="hidden" name="contract_add_date" id="contract_add_date" value="">
            
            <?php if(isset($_GET['pdf']) && !empty($is_edit)){ ?> 
            <!-- <input type="button" name="submit" value="Download Contract" id="download_contract" class="yellowClrBtn editsaveAllChangesBtn border-0" > -->
        <?php }
        else { ?> 
            <!-- <input type="button" name="submit" style="width: 200px;" value="Add dates & Download Contract" id="download_new_contract" class="yellowClrBtn editsaveAllChangesBtn border-0" > -->
            
        <?php } ?>
             <input type="button" name="submit" value="Add Date to Stock List" id="add_contract" class="yellowClrBtn editsaveAllChangesBtn border-0" >
        <?php } else { ?> 
             <input type="hidden" name="contract" value="1">
            <input type="hidden" name="contract_save" id="contract_save" value="1">
            <input type="hidden" name="contract_add_date" id="contract_add_date" value="">
        <input type="submit" name="submit" value="Save all changes" class="yellowClrBtn editsaveAllChangesBtn border-0" >
        <!-- <input type="button" name="submit" value="Generate PDF" id="download_contract_edit" class="yellowClrBtn editsaveAllChangesBtn border-0" > -->

        <?php } ?>
        <?php } ?>
    </div>
   
{!! Form::close() !!}

  <!-- Modal -->
  <div id="fancybox_add_{{ $ship_book_date_id }}_1" style="display: none;">

                                  
                                <form method="POST" enctype="multipart/form-data" id="ajax-file-uploadnote" class="super_add_note">
                                    <h3>Add a new note</h3>
                                    @csrf
                                    <!-- <input type="text" maxlength="10" name="initials" id="initials" placeholder="Initials">
                                    <p class="initials_cls" style="color: red;"></p>
                                    <br> -->
                                    <!-- <select name="category" id="category" class="form-control mb-2" />
                                        
                                        <option value="4">Hotels</option>
                                        
                                    </select> -->
                                    <input type="hidden" name="category" id="category" value="4">
                                    <p class="category_cls" style="color: red;"></p>
                                    <input type="hidden" name="cart_exp_id" id="cart_exp_id" value="{{ $cart_id }}">
                                    <input type="hidden" name="ship_book_date_id" id="ship_book_date_id" value="{{ $ship_book_date_id }}">
                                    <input type="hidden" name="user_type" id="user_type" value="1">
                                    <textarea type="text" class="form-control mb-2" name="notes" id="notes" placeholder="Type here" rows="7"></textarea>
                                    <p class="notes_cls" style="color: red;"></p>                                           
                                    <input type="file" accept=".pdf"  style="max-width: 500px;" name="note_file" id="note_file">
                                    <br>
                                    <button type="submit" class="mt-2 btn btn-primary" id="add_submit_notes" style="max-width: 500px;">
                                        Add Note
                                    </button>
                                </form>
                            </div>
<div class="modal fade" id="resignNoteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add a new note</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form method="POST" enctype="multipart/form-data" id="ajax-file-upload1" class="super_add">
           
            @csrf
            <!-- <input type="text" maxlength="10" name="initials" id="initials" placeholder="Initials">
            <p class="initials_cls" style="color: red;"></p>
            <br> -->
            <input type="hidden" name="cart_exp_id" id="cart_exp_id" value="<?=$cart_id?>">
            <input type="hidden" name="cart_id" id="cart_id" value="">
            <input type="hidden" name="user_type" id="user_type" value="1">
            <p>Please state the reason for this amendment</p>
            <textarea type="text" class="form-control" name="notes" id="notes" placeholder="Type here" rows="7"></textarea>
            <!-- <input type="text" class="form-control" name="notes" id="notes" placeholder="Type here" rows="7"> -->
            <p class="notes_cls" style="color: red;"></p>                                           
           
            <!-- <button type="submit" class="mt-2 btn btn-primary" id="add_notes" style="max-width: 500px;">
                Add Note
            </button> -->
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary"  id="add_notes" >Add Note</button>
      </div>
    </div>
  </div>
</div>
<script src="{{ asset('js/popper.min.js') }}"></script> 
<script src="{{ asset('js/bootstrap.min.js') }}"></script> 
<script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script> 
<script src="https://dev.rlogical.com/epic/resources/js/moment.min.js"></script>
<script src="{{ asset('js/jquery.mask.min.js') }}"></script>
<script src="{{ asset('js/pages/stocklist-ship.js') }}"></script>
<script type="text/javascript">
    var value_id = '<?=$value->id?>';
    <?php if(isset($_GET['type'])){ ?>
        $(document).ready(function(){
            $('.rt_column input,select,.tc_box input,select').attr('disabled', 'disabled');
            $('.header a').hide();
            $('.hotel_template').hide();
            $('#add_supplement_more').hide();
            $('#add_excursion_more').hide();
            //$('.checkmark').hide();
            //$('#add_notes_popup').hide();
            //$('#hot_notes').hide();
        });
    <?php } ?>
    //supplement add
     $(document).on('click', '#add_supplement_more', function() {
        var cnt_row = $('.expSupplementRow').val();
            if(cnt_row == ''){cnt_row = 0;}
        var expSupplementRow = parseInt(cnt_row,10);
        $('.expSupplementRow').val(expSupplementRow+1);
       var htmls='';
        htmls += '<div class="rt_row supplement_row">\
                    <div class="rt_column bold no-boder">\
                        <input type="text" class="notClickedCls hdioCls form-control"  placeholder="Supplement name" value="" name="dates_edit[supplement]['+expSupplementRow+'][supplement_name]" >\
                    </div>\
                    <div class="rt_column bold no-boder">\
                         <select class="form-control notClickedCls" name="dates_edit[supplement]['+expSupplementRow+'][price_type]">\
                                    <option  value="pppn">pppn</option>\
                                    <option  value="prpn">prpn</option>\
                        </select>\
                    </div>\
                    <div class="rt_column bold no-boder">\
                        <input type="text" class="notClickedCls hdioCls form-control numbercls"  placeholder="In Price" value="" name="dates_edit[supplement]['+expSupplementRow+'][in_price_euro]" >\
                    </div>\
                    <div class="rt_column bold no-boder disabled">\
                         <input type="text" class="notClickedCls hdioCls form-control numbercls"  placeholder="Out Price" value="" name="dates_edit[supplement]['+expSupplementRow+'][out_price_euro]" >\
                    </div>\
                    <div class="rt_column bold no-boder disabled">\
                         <input type="text" class="notClickedCls hdioCls form-control numbercls"  placeholder="Out Price" value="" name="dates_edit[supplement]['+expSupplementRow+'][out_price_pound]" >\
                    </div>\
                    <div class="bold no-boder disabled">\
                        <a href="javascript:void(0);" class="delete_supplement" style=""><i class="far fa-times-circle"></i></a>\
                    </div>\
                    </div>';
    $('.supplement_div').append(htmls);
    supCntSet();

    });
    function supCntSet(){
    var cnt = 1;
    $(".supplement_row").each(function() {
        //$(this).html('Day '+cnt);
        console.log('Day '+cnt);
        cnt++;
    });
    }
    $(document).on('click', '.delete_supplement', function() {
    if(confirm('Are you sure?')){
        $(this).closest('.supplement_row').remove();
        supCntSet();
    }

    });
    //excursion add
     $(document).on('click', '#add_excursion_more', function() {
        var cnt_row = $('.expExcursionRow').val();
            if(cnt_row == ''){cnt_row = 0;}
        var expExcursionRow = parseInt(cnt_row,10);
        $('.expExcursionRow').val(expExcursionRow+1);
       var htmls='';
        htmls += '<div class="rt_row excursion_row">\
                    <div class="rt_column bold no-boder">\
                        <input type="text" class="notClickedCls hdioCls form-control"  placeholder="Excursion name" value="" name="dates_edit[excursion]['+expExcursionRow+'][excursion_name]" >\
                    </div>\
                    <div class="rt_column bold no-boder">\
                        <select class="form-control notClickedCls" name="dates_edit[excursion]['+expExcursionRow+'][price_type]">\
                                    <option  value="pppn">pppn</option>\
                                    <option  value="prpn">prpn</option>\
                        </select>\
                    </div>\
                    <div class="rt_column bold no-boder">\
                        <input type="text" class="notClickedCls hdioCls form-control numbercls"  placeholder="In Price" value="" name="dates_edit[excursion]['+expExcursionRow+'][in_price_euro]" >\
                    </div>\
                    <div class="rt_column bold no-boder disabled">\
                         <input type="text" class="notClickedCls hdioCls form-control numbercls"  placeholder="Out Price" value="" name="dates_edit[excursion]['+expExcursionRow+'][out_price_euro]" >\
                    </div>\
                    <div class="rt_column bold no-boder disabled">\
                         <input type="text" class="notClickedCls hdioCls form-control numbercls"  placeholder="Out Price" value="" name="dates_edit[excursion]['+expExcursionRow+'][out_price_pound]" >\
                    </div>\
                    <div class="bold no-boder disabled">\
                        <a href="javascript:void(0);" class="delete_excursion" style=""><i class="far fa-times-circle"></i></a>\
                    </div>\
                    </div>';
    $('.excursion_div').append(htmls);
    excCntSet();

    });
    function excCntSet(){
    var cnt = 1;
    $(".excursion_row").each(function() {
        //$(this).html('Day '+cnt);
        console.log('Day '+cnt);
        cnt++;
    });
    }
    $(document).on('click', '.delete_excursion', function() {
    if(confirm('Are you sure?')){
        $(this).closest('.excursion_row').remove();
        excCntSet();
    }

    });
    <?php if(isset($_GET['type'])){ ?>
        $(document).ready(function(){
            $('input,select').attr('disabled', 'disabled');
            $('.header a').hide();
            $('.ship_template').hide();
            //$('.checkmark').hide();
            $('#add_notes_popup').hide();
            $('#hot_notes').hide();
        });
    <?php } ?>
    $(document).on('click', '.remove_c_file', function(e) {
        if(confirm('Are you sure?'))
        {
            $(this).parent().remove();
            var file =  $(this).attr('data-file');
            $('#remove_contract_file').append('<input type="hidden" name="remove_c_file[]" value="'+file+'">');
        }
        
    });
    $(document).on('click', '.remove_v_file', function(e) {
        if(confirm('Are you sure?'))
        {
            $(this).parent().remove();
            var file =  $(this).attr('data-file');
            $('#remove_veenus_file').append('<input type="hidden" name="remove_v_file[]" value="'+file+'">');
        }
    });
    
    $(document).on('change', '.notClickedCls', function(e) {
       
       // $('#is_changed').val('1');
    });
      $(document).on('click', '.editsaveAllChangesBtn', function(e) {

       var changed = $('#changed_dates').val();
       var is_changed = $('#is_changed').val();
       if(changed == 1 && is_changed == 1)
       {
            $('#resignNoteModal').modal('show');
            return false;
            //$(window).scrollTop(0);
       }
       else
       {
       
        return true;
       }
  
 });
      addDateValidateOpt = {
    errorElement: 'div',
    invalidHandler: function(event, validator) {
        var errors = validator.numberOfInvalids();
        if (errors) {
            $('span.error').hide();
        }
    },
    rules: {
        'dates_edit[][date_in]': {
            required: true,
        },
        'dates_edit[][date_in]': {
            required: true,
        },

    },
    messages: {
        'dates_edit[][date_out]': {
            required: "Please select date",
        },
    },
    errorPlacement: function(error, element) {
        /*if (element.hasClass('selectCls')) {
           error.insertAfter(element.next('span'));
        } else if (element.hasClass('availableTourDatesCls')) {
           error.insertAfter(element.next('.input-group-append').next('span'));
        } else if (element.hasClass('custom_chkbox')) {
           error.insertAfter(element.next('span'));
        } else if (element.hasClass('multiImgCls')) {
           error.insertAfter(element.next('span'));
        } else {
            error.insertAfter($(element));
        }*/
    },
    focusInvalid: true,
    invalidHandler: function(form, validator) {},
    submitHandler: function(form) {
        // alert('102030');
        return true;
    },
};
 $('#stocklistHotelDatesEditForm').validate(addDateValidateOpt);
 $(document).on('click', '#add_notes', function(e) {
    //alert($('#notes').val());
    $("#changed_note").removeAttr("style");
    $('body #changed_note').text($('#notes').val());
    var is_changed = $('#is_changed').val();
    if(is_changed == '1')
    {
        $('#is_changed').val('');
        $('#is_resign').val('1');
    }
    
    
    $('#resignNoteModal').modal('hide');
    //$('#stocklistHotelDatesEditForm').submit();
    $('.editsaveAllChangesBtn').trigger('click');
});
    $(document).on('click', '#tncEdit', function(){
        $('#tncField').show();
        $('#tcContent').hide();
    });
    $(document).on('click', '#sfEdit', function(){
        $('#sfField').show();
        $('#sfContent').hide();
    });
    $(document).on('click', '#inclusionsEdit', function(){
        $('#inclusionsField').show();
        $('#inclusionsContent').hide();
    });
     $(document).on('click', '#freeEdit', function(){
        $('#freeField').show();
        $('#freeContent').hide();
    });
    $(document).on('click', '#mealEdit', function(){
        $('#mealField').show();
        $('#mealContent').hide();
    });
    $(document).on('click', '#ratesEdit', function(){
        $('#ratesField').show();
        $('#ratesContent').hide();
    });
    
    $(document).on('click', '#download_contract', function(e) {
        e.preventDefault();
        $('#contract_save').val('1');
        var formData = $("#stocklistHotelDatesEditForm").serialize();
        $('.loader').show();   
        $.ajax({
            url: base_url+'/super-user/stocklist-ship-dates-update-contract',
            type: 'POST',
            data: {'formData':formData},
            success: function(data) {
                $('#contract_save').val('');
                var formData1 = $("#stocklistHotelDatesEditForm").serialize();
                toastSuccess('Save successfully.');
                $.ajax({
                    url: base_url+'/super-user/stocklist-ship-dates-update-contract',
                    type: 'POST',
                    data: {'formData':formData1},
                    
                    success: function(data) {
                        $('.loader').hide();  
                        var url = '<?=URL('pdf/')?>';
                        var file_url = url+'/'+data;
                        window.open(file_url, '_blank');
                    },
                    error: function(e) {
                    }
                });   
            },
            error: function(e) {
            }
        });  

        
    });
     $(document).on('click', '#download_contract_edit', function(e) {
        e.preventDefault();
        $('#contract_save').val('1');
        var formData = $("#stocklistHotelDatesEditForm").serialize();
        $('.loader').show();   
        $.ajax({
            url: base_url+'/super-user/stocklist-ship-dates-editupdate',
            type: 'POST',
            data: {'formData':formData},
            success: function(data) {
                $('#contract_save').val('');
                var formData1 = $("#stocklistHotelDatesEditForm").serialize();
                toastSuccess('Save successfully.');
                $.ajax({
                    url: base_url+'/super-user/stocklist-ship-dates-editupdate',
                    type: 'POST',
                    data: {'formData':formData1},
                    
                    success: function(data) {
                        $('#contract_save').val('1');
                        $('.loader').hide();  
                        var url = '<?=URL('pdf/')?>';
                        var file_url = url+'/'+data;
                        window.open(file_url, '_blank');
                    },
                    error: function(e) {
                    }
                });   
            },
            error: function(e) {
            }
        });  

        
    });
     <?php if(isset($_GET['new_date'])){ ?> 
          $(document).on('click', '#download_new_contract', function(e) {
        e.preventDefault();
        $('#contract_add_date').val('1');
        var formData = $("#stocklistHotelDatesEditForm").serialize();
        $('.loader').show();   
        $.ajax({
            url: base_url+'/super-user/stocklist-ship-dates-adddates',
            type: 'POST',
            data: {'formData':formData},
            success: function(data) {
                $('#contract_save').val('1');
                var formData1 = $("#stocklistHotelDatesEditForm").serialize();
                toastSuccess('Add Date successfully.');
                 $.ajax({
                    url: base_url+'/super-user/stocklist-ship-dates-editupdate',
                        type: 'POST',
                        data: {'formData':formData1},
                        
                        success: function(data) {
                            $('#contract_save').val('1');
                            var formData1 = $("#stocklistHotelDatesEditForm").serialize();
                            toastSuccess('Save successfully.');
                            $.ajax({
                                url: base_url+'/super-user/stocklist-ship-dates-update-contract',
                                type: 'POST',
                                data: {'formData':formData1},
                                
                                success: function(data) {
                                    $('#contract_save').val('');
                                        var formData1 = $("#stocklistHotelDatesEditForm").serialize();
                                        toastSuccess('Save successfully.');
                                        $.ajax({
                                            url: base_url+'/super-user/stocklist-ship-dates-update-contract',
                                            type: 'POST',
                                            data: {'formData':formData1},
                                            
                                            success: function(data) {
                                                $('.loader').hide();  
                                                var url = '<?=URL('pdf/')?>';
                                                var file_url = url+'/'+data;
                                                window.open(file_url, '_blank');
                                            },
                                            error: function(e) {
                                            
                                        },
                                        error: function(e) {
                                        }
                                    });  
                                },
                                error: function(e) {
                                
                            },
                            error: function(e) {
                            }
                        });  
                
            },
            error: function(e) {
            }
        });  
                }
            });
        
    });
        $(document).on('click', '#add_contract', function(e) {
        e.preventDefault();
        $('#contract_add_date').val('1');
        var formData = $("#stocklistHotelDatesEditForm").serialize();
       
        var date_in = $('.date_in_cls').val();
        var date_out = $('.date_out_cls').val();
        var hour_in = $('.hour_in_cls').val();
        var hour_out = $('.hour_out_cls').val();
        if(date_in != '' && date_out != '' /*&& !empty(hour_in) && !empty(hour_out)*/)
        {
             $('.loader').show();   
             $.ajax({
                url: base_url+'/super-user/stocklist-ship-dates-adddates',
                type: 'POST',
                data: {'formData':formData},
                success: function(data) {
                    $('#contract_save').val('1');
                    var formData1 = $("#stocklistHotelDatesEditForm").serialize();
                    toastSuccess('Save successfully.');
                     /*$.ajax({
                        url: base_url+'/super-user/stocklist-ship-dates-editupdate',
                        type: 'POST',
                        data: {'formData':formData1},
                        
                        success: function(data) {
                            $('.loader').hide();  
                            var url = '<?=URL('pdf/')?>';
                            var file_url = url+'/'+data;
                            //window.open(base_url+'/super-user/ship-stocklist','_self');
                        },
                        error: function(e) {
                        }
                    }); */
                let myform = document.getElementById("stocklistHotelDatesEditForm");
                let fd = new FormData(myform );
                $('.loader').show();
                $.ajax({
                    type:'POST',
                    url: base_url+'/super-user/stocklist-ship-dates-editupdate',
                    data: fd,
                    contentType: false,
                    processData: false,
                    success:function(data)
                    {
                        $('.loader').hide();  
                        var url = '<?=URL('pdf/')?>';
                        var file_url = url+'/'+data;
                        window.open(base_url+'/super-user/ship-stocklist','_self');
                    }
               }); 
                    /*$.ajax({
                        url: base_url+'/super-user/stocklist-ship-dates-update-contract',
                        type: 'POST',
                        data: {'formData':formData1},
                        
                        success: function(data) {
                            $('.loader').hide();  
                            var url = '<?=URL('pdf/')?>';
                            var file_url = url+'/'+data;
                            window.open(base_url+'/super-user/ship-stocklist');
                        },
                        error: function(e) {
                        }
                    });*/   
                },
                error: function(e) {
                }
            });  
        }
        else
        {
            if(date_in == ''){
                $('.date_in_cls').addClass('required');
                $(window).scrollTop($('#DateDiv').offset().top);
            }
            else
            {
                $('.date_in_cls').removeClass('required');
            }
            if(date_out == ''){
                $('.date_out_cls').addClass('required');
                $(window).scrollTop($('#DateDiv').offset().top);
            }
            else
            {
                $('.date_out_cls').removeClass('required');
            }
           /* if(empty(hour_in)){
                $('.hour_in_cls').addClass('required');
                $('.hour_in_cls').focus();
            }
            else
            {
                $('.hour_in_cls').removeClass('required');
            }
            if(empty(hour_out)){
                $('.hour_out_cls').addClass('required');
                $('.hour_out_cls').focus();
            }
            else
            {
                $('.hour_out_cls').removeClass('required');
            }*/
        }

        
    });
     <?php } else { ?>
        $(document).on('click', '#add_contract', function(e) {
        e.preventDefault();
        $('#contract_add_date').val('1');
        var formData = $("#stocklistHotelDatesEditForm").serialize();
        $('.loader').show();   
        $.ajax({
            url: base_url+'/super-user/stocklist-ship-dates-adddates',
            type: 'POST',
            data: {'formData':formData},
            success: function(data) {
                $('#contract_save').val('');
                var formData1 = $("#stocklistHotelDatesEditForm").serialize();
                toastSuccess('Save successfully.');
                $.ajax({
                    url: base_url+'/super-user/stocklist-ship-dates-update-contract',
                    type: 'POST',
                    data: {'formData':formData1},
                    
                    success: function(data) {
                        $('.loader').hide();  
                        var url = '<?=URL('pdf/')?>';
                        var file_url = url+'/'+data;
                        window.open(base_url+'/super-user/ship-stocklist');
                    },
                    error: function(e) {
                    }
                });   
            },
            error: function(e) {
            }
        });  

        
    });
      <?php }?>
     
    
    $(document).on('click', '#saveHcForm', function(e) {
        e.preventDefault();
        var formData = $("#hcForm").serialize();
        $('.loader').show();    
        $.ajax({
            url: base_url+'/super-user/update-hc-data',
            type: 'POST',
            data: {'formData':formData},
            success: function(data) {
                $('.loader').hide();  
                $('#hcModal').modal('hide');
                toastSuccess('Tour has been updated successfully.');
            },
            error: function(e) {
            }
        });   
    });
    $(document).on('click', '#downloadPDFhc', function(e) {
        e.preventDefault();
        var exp_id = $(this).attr('exp_id');
        var exp_date_id = $(this).attr('exp_date_id');
        $('.loader').show();    
        $.ajax({
            url: base_url+'/super-user/download-hc-pdf',
            type: 'POST',
            data: {'exp_id':exp_id,'exp_date_id':exp_date_id},
            success: function(data) {
                $('.loader').hide();  
                $('#tobeprinted').html(data.response); 
                w=window.open();
                w.document.write($('#tobeprinted').html());
                w.print();
                w.close(); 
            },
            error: function(e) {
            }
        });   
    });
    
     $(document).on('click', '#HtlConfrmTemplate', function(e) {
        e.preventDefault();
        var exp_id = $(this).attr('exp_id');
        var exp_date_id = $(this).attr('exp_date_id');
        $('.loader').show();    
        $.ajax({
            url: base_url+'/super-user/hc-confirmation-tpl',
            //url: base_url+'/super-user/edit-hc',
            type: 'POST',
            data: {'exp_id':exp_id,'exp_date_id':exp_date_id},
            success: function(data) {
                if (data.confirmation_template_hc != null) {
                    $('#mealField').val(data.confirmation_template_hc.hc_meal_arrangements); 
                    $('#inclusionsField').val(data.confirmation_template_hc.hc_free_place); 
                    $('#freeField').val(data.confirmation_template_hc.hc_inclusions); 
                    $('#sfField').val(data.confirmation_template_hc.hc_services_facilities); 
                    $('#tncField').val(data.confirmation_template_hc.hc_terms_conditions); 
                    
                    $('#mealContent').html(data.confirmation_template_hc.hc_meal_arrangements); 
                    $('#inclusionsContent').html(data.confirmation_template_hc.hc_free_place); 
                    $('#freeContent').html(data.confirmation_template_hc.hc_inclusions); 
                    $('#sfContent').html(data.confirmation_template_hc.hc_services_facilities); 
                    $('#tcContent').html(data.confirmation_template_hc.hc_terms_conditions); 
                    $('.loader').hide();  
                } else{
                    $('.loader').hide();  
                    return false;
                }
               // $('#HtlConfrmTplBody').html(data.html); 
               // $('#HtlConfrmTplBody').show(); 
            },
            error: function(e) {
            }
        });   
    });
    
     $(document).on('click', '#HtlGetTemplate', function(e) {
        e.preventDefault();
        var ship_id = $(this).attr('ship_id');
        if(confirm('Are you sure you want to import the template, this will overwrite data in the exisiting fields?'))
        {
             $('.loader').show();    
            $.ajax({
                url: base_url+'/super-user/get-ship-detail',
                //url: base_url+'/super-user/edit-hc',
                type: 'POST',
                data: {'ship_id':ship_id},
                success: function(data) {
                    
                    if (data.confirmation_template_hc != null) {
                        
                        $('#ratesField').val(data.confirmation_template_hc.ratesallocation); 
                        $('#mealField').val(data.confirmation_template_hc.mean_arrangements); 
                        $('#inclusionsField').val(data.confirmation_template_hc.inclusions); 
                        $('#freeField').val(data.confirmation_template_hc.free_place); 
                        $('#sfField').val(data.confirmation_template_hc.services_facilities); 
                        $('#tncField').val(data.confirmation_template_hc.terms_conditions); 
                        
                        $('#ratesContent').html(data.confirmation_template_hc.ratesallocation);
                        $('#mealContent').html(data.confirmation_template_hc.mean_arrangements); 
                        $('#inclusionsContent').html(data.confirmation_template_hc.inclusions); 
                        $('#freeContent').html(data.confirmation_template_hc.free_place); 
                        $('#sfContent').html(data.confirmation_template_hc.services_facilities); 
                        $('#tcContent').html(data.confirmation_template_hc.terms_conditions);  
                        $('.loader').hide();  
                    } else{
                        $('.loader').hide();  
                        return false;
                    }
                   // $('#HtlConfrmTplBody').html(data.html); 
                   // $('#HtlConfrmTplBody').show(); 
                },
                error: function(e) {
                }
            });  
        }
        
    });
    $('#hcModal').on('hidden.bs.modal', function (e) {
         e.preventDefault();
        var formData = $("#hcForm").serialize();
        $('.loader').show();    
        $.ajax({
            url: base_url+'/super-user/update-hc-data',
            type: 'POST',
            data: {'formData':formData},
            success: function(data) {
                $('.loader').hide();  
                $('#hcModal').modal('hide');
                toastSuccess('Tour has been updated successfully.');
            },
            error: function(e) {
            }
        });   
    });
    
var cnt = 0;
   
$('#add_upgrade').click(function(e){
           var html = '<div class="box_date"><div class="date_rate_all"><div class="tc_box_wrapper split">';
         html += '<div class="tc_box">';
            html += '<div class="header">Dates</div>';
            html += '<div class="body">';
                html += '<p>';
                    html += '<input type="date" class="notClickedCls dateChangeCls form-control dateInCls'+cnt+'0 hdioCls valid" name="date_new['+cnt+'][date_in]" id="DateIn'+cnt+'0" placeholder="Date In" value="" required="" data-id="'+cnt+'0" style="font-size: 0.80rem;padding: 5px;" aria-invalid="false">';
                        html += '<input type="hidden" class="" name="date_new['+cnt+'][id]" id="DateId'+cnt+'" value="'+cnt+'">-<input type="date" class="notClickedCls dateChangeCls hdioCls dateOutCls'+cnt+'0 form-control valid" name="date_new['+cnt+'][date_out]" id="DateOut'+cnt+'0" placeholder="Date Out" value="" required="" data-id="'+cnt+'0" style="font-size: 0.80rem;padding: 5px;" aria-invalid="false">';
                html += '</p>';
            html += '</div>';
        html += '</div>';
        html += '<div class="tc_box">';
            html += '<div class="header">No. of Nights</div>';
            html += '<div class="body">';
                html += '<p>';
                     html += '<input type="text" class="notClickedCls hdioCls form-control nightCls" name="date_new['+cnt+'][night]" id="Nights'+cnt+'0" placeholder="Nights" value="" readonly="" required="">';
              html += '</p>';
           html += '</div>';
        html += '</div>';
    html += '</div>';
     html += '<div class="dates_div'+cnt+'"></div>';
    html += '<button class="btn-sm btn-primary mb-2 mt-2 add_other_dates" type="button"  data-id="'+cnt+'">Add Date</button>';
    //rates
    html += '<div class="tc_box_wrapper">';
        html += '<div class="tc_box">';

        html += '<div class="header">Rates & Allocation</div>';

        html += '<div class="body">';

            html += '<div class="rates_table">';

                html += '<div class="rt_row">';

                    html += '<div class="rt_column label">Room Type</div>';

                    html += '<div class="rt_column no-boder bold">Single</div>';

                    html += '<div class="rt_column no-boder bold">Double</div>';

                    html += '<div class="rt_column no-boder bold">Twin</div>';

                    html += '<div class="rt_column no-boder bold">Triple</div>';

                    html += '<div class="rt_column no-boder bold">Quad</div>';

                    html += '<div class="rt_column no-boder bold">Dr</div>';

                html += '</div>';
                
                html += '<div class="rt_row">';

                    html += '<div class="rt_column label">No. Rooms</div>';

                    html += '<div class="rt_column bold no-boder">';
                        html += '<input type="text" class="notClickedCls hdioCls form-control numbercls" id="Sgl'+cnt+'" placeholder="Sgl" value="" name="date_new['+cnt+'][sgl]" >';
                    html += '</div>';

                    html += '<div class="rt_column bold no-boder">';
                        html += '<input type="text" class="notClickedCls hdioCls form-control numbercls" id="Dbl'+cnt+'" placeholder="Dbl" value="" name="date_new['+cnt+'][dbl]" >';
                    html += '</div>';

                    html += '<div class="rt_column bold no-boder">';
                        html += '<input type="text" class="notClickedCls hdioCls form-control numbercls" id="Twn'+cnt+'" placeholder="Twn" value="" name="date_new['+cnt+'][twn]" >';
                    html += '</div>';

                    html += '<div class="rt_column bold no-boder disabled">';
                         html += '<input type="text" class="notClickedCls hdioCls form-control numbercls" id="Trp'+cnt+'" placeholder="Trp" value="" name="date_new['+cnt+'][trp]" >';
                    html += '</div>';

                    html += '<div class="rt_column bold no-boder disabled">';
                        html += '<input type="text" class="notClickedCls hdioCls form-control numbercls" id="Qrd'+cnt+'" placeholder="Qrd" value="" name="date_new['+cnt+'][qrd]" >';
                    html += '</div>';

                    html += '<div class="rt_column bold no-boder">';
                        html += '<input type="text" class="notClickedCls hdioCls form-control numbercls" id="SglDr'+cnt+'" placeholder="Sgl(Dr)" value="" name="date_new['+cnt+'][sgl_dr]" >';
                    html += '</div>';

                html += '</div>';
                 html += '<div class="rt_row pound_colunm">';

                    html += '<div class="rt_column label">Rate pppn &#163;</div>';

                    html += '<div class="rt_column no-boder">';
                        <?php //echo (!empty($dates_rates) ? $dates_rates->rate : ''); ?>
                       html += '<input type="text" class="notClickedCls hdioCls form-control numbercls" id="RateDBB'+cnt+'" placeholder="Sgl Rate &#163;" value="" name="date_new['+cnt+'][rate_dbb]" required>';

                       
                    html += '</div>';

                    html += '<div class="rt_column no-boder">';
                      html += '<input type="text" class="notClickedCls hdioCls form-control numbercls" id="RateDBL'+cnt+'" placeholder="Dbl Rate pppn &#163;" value="" name="date_new['+cnt+'][rate_dbl]" required>';
                    html += '</div>';

                    html += '<div class="rt_column no-boder">';
                       html += '<input type="text" class="notClickedCls hdioCls form-control numbercls" id="RateTWN'+cnt+'" placeholder="Twn Rate pppn &#163;" value="" name="date_new['+cnt+'][rate_twn]" required>';
                    html += '</div>';

                    html += '<div class="rt_column no-boder">';
                        html += '<input type="text" class="notClickedCls hdioCls form-control numbercls" id="RateTRN'+cnt+'" placeholder="Trp Rate pppn &#163;" value="" name="date_new['+cnt+'][rate_trp]" required>';
                    html += '</div>';

                    html += '<div class="rt_column no-boder">';
                        html += '<input type="text" class="notClickedCls hdioCls form-control numbercls" id="RateQRD'+cnt+'" placeholder="Qrd Rate pppn &#163;" value="" name="date_new['+cnt+'][rate_qrd]" required>';
                    html += '</div>';

                    html += '<div class="rt_column no-boder">';
                        html += '<input type="text" class="notClickedCls hdioCls form-control numbercls" id="RateDR'+cnt+'" placeholder="Dr Rate pppn &#163;" value="" name="date_new['+cnt+'][rate_dr]" required>';
                    html += '</div> ';

                html += '</div>';
                 

                html += '<div class="rt_row pound_colunm">';
                    html += '<div class="rt_column label">SRS pppn &#163;</div>';

                    html += '<div class="rt_column no-boder">';
                        <?php //echo (!empty($dates_rates) ? $dates_rates->rate : ''); ?>
                       html += '<input type="text" class="notClickedCls hdioCls form-control numbercls" id="SRSSRS'+cnt+'" placeholder="SRS Sgl Rate pppn &#163;" value="" name="date_new['+cnt+'][date_srs]" required>';

                       
                    html += '</div>';

                    html += '<div class="rt_column  no-boder">';
                      html += '<input type="text" class="notClickedCls hdioCls form-control numbercls" id="SRSDBL'+cnt+'" placeholder="SRS Dbl Rate pppn &#163;" value="" name="date_new['+cnt+'][date_srs_dbl]" required>';
                    html += '</div>';

                    html += '<div class="rt_column no-boder">';
                       html += '<input type="text" class="notClickedCls hdioCls form-control numbercls" id="SRSTWN'+cnt+'" placeholder="SRS Twn Rate pppn &#163;" value="" name="date_new['+cnt+'][date_srs_twn]" required>';
                    html += '</div>';

                    html += '<div class="rt_column no-boder">';
                        html += '<input type="text" class="notClickedCls hdioCls form-control numbercls" id="SRSTRN'+cnt+'" placeholder="SRS Trn Rate pppn &#163;" value="" name="date_new['+cnt+'][date_srs_trp]" required>';
                    html += '</div>';

                    html += '<div class="rt_column no-boder">';
                        html += '<input type="text" class="notClickedCls hdioCls form-control numbercls" id="SRSQRD'+cnt+'" placeholder="SRS Qrd Rate pppn &#163;" value="" name="date_new['+cnt+'][date_srs_qrd]" required>';
                    html += '</div>';

                    html += '<div class="rt_column no-boder">';
                        html += '<input type="text" class="notClickedCls hdioCls form-control numbercls" id="SRSDR'+cnt+'" placeholder="SRS Dr Rate pppn &#163;" value="" name="date_new['+cnt+'][date_srs_dr]" required>';
                    html += '</div> ';

                html += '</div>';
                html += '<div class="rt_row euro_colunm euro_colunm'+cnt+'">';

                    html += '<div class="rt_column label">Rate pppn &#8364;</div>';

                    html += '<div class="rt_column no-boder">';
                       html += '<input type="text" class="notClickedCls hdioCls form-control numbercls" id="RateDBBE'+cnt+'" placeholder="Sgl Rate pppn &#8364;" value="" name="date_new['+cnt+'][rate_dbb_euro]" required>';
                    html += '</div>';

                    html += '<div class="rt_column no-boder">';
                      html += '<input type="text" class="notClickedCls hdioCls form-control numbercls" id="RateDBL'+cnt+'" placeholder="Cbl Rate pppn &#8364;" value="" name="date_new['+cnt+'][rate_dbl_euro]" required>';
                    html += '</div>';

                    html += '<div class="rt_column no-boder">';
                       html += '<input type="text" class="notClickedCls hdioCls form-control numbercls" id="RateTWNE'+cnt+'" placeholder="Twm Rate pppn &#8364;" value="" name="date_new['+cnt+'][rate_twn_euro]" required>';
                    html += '</div>';

                    html += '<div class="rt_column no-boder">';
                        html += '<input type="text" class="notClickedCls hdioCls form-control numbercls" id="RateTRNE'+cnt+'" placeholder="Trp Rate pppn &#8364;" value="" name="date_new['+cnt+'][rate_trp_euro]" required>';
                    html += '</div>';

                    html += '<div class="rt_column no-boder">';
                        html += '<input type="text" class="notClickedCls hdioCls form-control numbercls" id="RateQRDE'+cnt+'" placeholder="Qrd Rate pppn &#8364;" value="" name="date_new['+cnt+'][rate_qrd_euro]" required>';
                    html += '</div>';

                    html += '<div class="rt_column no-boder">';
                        html += '<input type="text" class="notClickedCls hdioCls form-control numbercls" id="RateDRE'+cnt+'" placeholder="Dr Rate pppn &#8364;" value="" name="date_new['+cnt+'][rate_dr_euro]" required>';
                    html += '</div> ';

                html += '</div>';
                 html += '<div class="rt_row euro_colunm euro_colunm'+cnt+'">';

                    html += '<div class="rt_column label">SRS pppn &#8364; </div>';

                    html += '<div class="rt_column no-boder">';
                       html += '<input type="text" class="notClickedCls hdioCls form-control numbercls" id="SRSSRSE'+cnt+'" placeholder="SRS Sgl Rate pppn &#8364;" value="" name="date_new['+cnt+'][date_srs_euro]" required>';

                       
                    html += '</div>';

                    html += '<div class="rt_column no-boder">';
                      html += '<input type="text" class="notClickedCls hdioCls form-control numbercls" id="SRSDBL'+cnt+'" placeholder="SRS Dbl Rate pppn &#8364;" value="" name="date_new['+cnt+'][date_srs_dbl_euro]" required>';
                    html += '</div>';

                    html += '<div class="rt_column no-boder">';
                       html += '<input type="text" class="notClickedCls hdioCls form-control numbercls" id="SRSTWNE'+cnt+'" placeholder="SRS Twn Rate pppn &#8364;" value="" name="date_new['+cnt+'][date_srs_twn_euro]" required>';
                    html += '</div>';

                    html += '<div class="rt_column no-boder">';
                        html += '<input type="text" class="notClickedCls hdioCls form-control numbercls" id="SRSTRNE'+cnt+'" placeholder="SRS Trd Rate pppn &#8364;" value="" name="date_new['+cnt+'][date_srs_trp_euro]" required>';
                    html += '</div>';

                    html += '<div class="rt_column no-boder">';
                        html += '<input type="text" class="notClickedCls hdioCls form-control numbercls" id="SRSQRDE'+cnt+'" placeholder="SRS Qrd Rate pppn &#8364;" value="" name="date_new['+cnt+'][date_srs_qrd_euro]" required>';
                    html += '</div>';

                    html += '<div class="rt_column no-boder">';
                        html += '<input type="text" class="notClickedCls hdioCls form-control numbercls" id="SRSDRE'+cnt+'" placeholder="SRS Dr Rate pppn &#8364;" value="" name="date_new['+cnt+'][date_srs_dr_euro]" required>';
                    html += '</div> ';

                html += '</div>';
               
               
                html += '<div class="rt_row">';

                    html += '<div class="rt_column label">Rooms SRS Free</div>';
                    

                    html += '<div class="rt_column no-boder">';
                      
                   html += '<input type="text" class="notClickedCls hdioCls form-control numbercls" id="freeSRS'+cnt+'" placeholder="" value="" name="date_new['+cnt+'][free_srs]" required>';
                    html += '</div>';
                    html += '<div class="rt_column no-boder"></div>';
                    html += '<div class="rt_column no-boder"></div>';
                    html += '<div class="rt_column no-boder"></div>';
                    html += '<div class="rt_column no-boder"></div> ';
                    html += '<div class="rt_column no-boder"></div> ';
                html += '</div> ';
                
                 html += '<input type="hidden" class="notClickedCls hdioCls form-control numbercls" id="displayeuro'+cnt+'" placeholder="" value="0" name="date_new['+cnt+'][display_euro]" required>';
                 //html += '<input type="button" id="add_euro'+cnt+'" data-cnt="'+cnt+'" value="Add Euro" class="add_euro btn btn-secondary" >';
            html += '</div>';

        html += '</div>';

    html += '</div>';
    html += '</div>';
     html += '</div>';
    html += '<button class="btn-sm btn-primary mb-2 mt-2 remove_rate_date" type="button"  data-id="'+cnt+'">Remove Date & Rate</button></div>';
            $('.dates_rate_div').append(html);
            $(".remove_rate_date").on("click", function(){
               /* $(this).prev('div').remove();
                $(this).prev().prev('div').remove();
                $(this).prev().prev().prev('div').remove();
                $(this).prev().prev().prev().prev('div').remove();*/
                $(this).parent('.box_date').remove();
                $(this).remove();
            });
            <?php if($shipList->preferred_currency == 2){ ?> 
                $('.euro_colunm'+cnt).show();
                $('.pound_colunm').hide();
            <?php } else{ ?> 
                $('.euro_colunm'+cnt).hide();
            <?php } ?>
            
            cnt++;

            //single date
            var cntother = 0;
        //$('.add_other_dates').click(function(e){
        $(".add_other_dates").on("click", function(){    
   
    var id = $(this).attr('data-id');
           var html = '<div class="tc_box_wrapper split">';
         html += '<div class="tc_box">';
            html += '<div class="header">Dates</div>';
            html += '<div class="body">';
                html += '<p>';
                    html += '<input type="date" class="notClickedCls odateChangeCls1 form-control dateInCls1'+id+cntother+' hdioCls valid" name="daterate_new_single['+id+']['+cntother+'][date_in]" id="DateIn'+id+cntother+'" placeholder="Date In" value="" required="" data-id="'+id+cntother+'" style="font-size: 0.80rem;padding: 5px;" aria-invalid="false">';
                        html += '<input type="hidden" class="" name="daterate_new_single['+id+']['+cntother+'][id]" id="DateId'+cntother+'" value="'+id+'">-<input type="date" class="notClickedCls odateChangeCls1 hdioCls dateOutCls1'+id+cntother+' form-control valid" name="daterate_new_single['+id+']['+cntother+'][date_out]" id="DateOut'+id+cntother+'" placeholder="Date Out" value="" required="" data-id="'+id+cntother+'" style="font-size: 0.80rem;padding: 5px;" aria-invalid="false">';
                html += '</p>';
            html += '</div>';
        html += '</div>';
        html += '<div class="tc_box">';
            html += '<div class="header">No. of Nights</div>';
            html += '<div class="body">';
                html += '<p>';
                     html += '<input type="text" class="notClickedCls hdioCls form-control nightCls" name="daterate_new_single['+id+']['+cntother+'][night]" id="Nights1'+id+cntother+'" placeholder="Nights1" value="" readonly="" required="">';
              html += '</p>';
           html += '</div>';
        html += '</div>';
    html += '</div>';
    html += '<button class="btn-sm btn-primary mb-2 mt-2 remove_date" type="button"  data-id="'+cnt+'">Remove Date</button>';

            $('.dates_div'+id).append(html);
            $(".remove_date").on("click", function(){
                $(this).prev('div').remove();
                $(this).remove();
            });
           $('body').on('blur', '.odateChangeCls1', function() {

            var ids = $(this).attr('data-id');
            var fromDate = $('.dateInCls1'+ids).val();
            var toDate = $('.dateOutCls1'+ids).val();
            const date1 = new Date(fromDate);
            const date2 = new Date(toDate);
            const diffTime = Math.abs(date2 - date1);
            const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)); 
            if(diffDays > 0){
                $('#Nights1'+ids).val(diffDays);
            }else{
                var diffDays1 = '0';
                $('#Nights1'+ids).val(diffDays1);
            }
        });
            cntother++;
        });
        });

var cntdate = 0;
$('#add_dates').click(function(e){
           var html = '<div class="tc_box_wrapper split">';
         html += '<div class="tc_box">';
            html += '<div class="header">Dates</div>';
            html += '<div class="body">';
                html += '<p>';
                    html += '<input type="date" class="notClickedCls dateChangeCls form-control dateInCls'+cntdate+' hdioCls valid" name="date_new_single['+cntdate+'][date_in]" id="DateIn'+cntdate+'" placeholder="Date In" value="" required="" data-id="'+cntdate+'" style="font-size: 0.80rem;padding: 5px;" aria-invalid="false">';
                        html += '<input type="hidden" class="" name="date_new_single['+cntdate+'][id]" id="DateId'+cntdate+'" value="'+cntdate+'">-<input type="date" class="notClickedCls dateChangeCls hdioCls dateOutCls'+cntdate+' form-control valid" name="date_new_single['+cntdate+'][date_out]" id="DateOut'+cntdate+'" placeholder="Date Out" value="" required="" data-id="'+cntdate+'" style="font-size: 0.80rem;padding: 5px;" aria-invalid="false">';
                html += '</p>';
            html += '</div>';
        html += '</div>';
        html += '<div class="tc_box">';
            html += '<div class="header">No. of Nights</div>';
            html += '<div class="body">';
                html += '<p>';
                     html += '<input type="text" class="notClickedCls hdioCls form-control nightCls" name="date_new_single['+cntdate+'][night]" id="Nights'+cntdate+'" placeholder="Nights" value="" readonly="" required="">';
              html += '</p>';
           html += '</div>';
        html += '</div>';
    html += '</div>';
    html += '<button class="btn-sm btn-primary mb-2 mt-2 remove_date" type="button"  data-id="'+cnt+'">Remove Date</button>';
   

            $('.dates_div').append(html);
            $(".remove_date").on("click", function(){
                $(this).prev('div').remove();
                $(this).remove();
            });
            cntdate++;
        });


   
   
     $("body").on("click", '#add_notes_popup', function(e) {
        var cartExperienceId = $(this).data("id");
        var user_type = $(this).data("user_type");
        var category = $(this).data("cat");

        //$("#fancybox_add_"+cartExperienceId+"_"+category).find('#user_type').val(user_type);
         $("#fancybox_add_"+cartExperienceId+"_"+category).find('#category').val(category);
        $.fancybox.open(
        //$("#bookingFormBox-"+cartExperienceId).html() , {
        $("#fancybox_add_"+cartExperienceId+"_"+category).html() , {
            closeExisting: false,
            touch: false,
            width:800,
            height:500,
            autoSize : false
        }
    );
    });  
       $("body").on("click", '#hot_notes', function(e) {  
    alert('Are you sure you want to delete this Note?');
    var cart_id =  $(this).data("cart_id");
    var ddata = [];
     $( ".notestab4 .notes .selected-delete" ).each(function( index ) {
        ddata.push($(this).data("id"));
         
     }); 
     $('.loader').show();       
     $.ajax({
                type:'POST',
                url: "/super-user/delete-ship-notes",
                data: {ddata:ddata,'cart_id':cart_id,'user_type':'1' },
                
                success:function(data)
                {
                    $('.loader').hide();
                    $('#tab_id_'+cart_id).html('');
                    $('#tab_id_'+cart_id).html(data);
                }
           });
    });
        $("body").on("submit", '#ajax-file-uploadnote', function(e) {        
        e.preventDefault();
        var divid = $(this).parent().parent().parent().parent('.fancybox-container').attr('id');
        var initials = $('#'+divid+' .super_add_note #initials').val();

        var category = $('#'+divid+' .super_add_note #category').val();
        
        var note = $('#'+divid+' .super_add_note #notes').val();
        var cart_id = $('.super_add_note #ship_book_date_id').val();
        var user_type = $('.super_add_note #user_type').val();
        if( category == '' || note == '' )
        {
           /* if(initials == '')
            {
                $(this).parent().find('.initials_cls').html('Please enter initials');
            }
            else
            {
                $(this).parent().find('.initials_cls').html('');
            }*/
            if(category == '')
            {
                $(this).parent().find('.category_cls').html('Please enter category');
            }
            else
            {
                $(this).parent().find('.category_cls').html('');
            }
            if(note == '')
            {
                $(this).parent().find('.notes_cls').html('Please enter note');
            }
            else
            {
                $(this).parent().find('.notes_cls').html('');
            }
        }
        else
        {
            $(this).parent().find('.initials_cls').html('');
            $(this).parent().find('.category_cls').html('');
            $(this).parent().find('.notes_cls').html('');
            
            let formData = new FormData(this);
            $('.loader').show();
            $.ajax({
                type:'POST',
                url: "/super-user/insert-ship-notes",
                data: formData,
                contentType: false,
                processData: false,
                success:function(data)
                {
                    $('#'+divid+' .fancybox-close-small').trigger('click');
                    var initials = $('#'+divid+' .super_add_note #initials').val('');
                    var category = $('#'+divid+' .super_add_note #category').val('');
                    var note = $('#'+divid+' .super_add_note #notes').val('');
                    $('.loader').hide();

                    $('#tab_id_'+cart_id).html('');
                    $('#tab_id_'+cart_id).html(data);


                   /* var initials = $('#initials').val('');
                    var category = $('#category').val('');
                    var note = $('#notes').text('');
                    var cart_id = $('#cart_id').val('');*/
                }
           });
        }

        
    });
        $("body").on("click", '.delete-note', function(e) {     
        if($(this).hasClass('selected-delete'))
        {
            $(this).removeClass('selected-delete');
        }
        else
        {
            $(this).addClass('selected-delete');
        }
        
    });  
   //ss after
    $('#add_after_div').click(function(){
        if($('.ss_after_div').is(":visible"))
        {
            $('.ss_after_div').hide();
            $('#ss_after_show').val('0');
            $(this).html('Add SS After');
        }
        else{
            $('.ss_after_div').show();
            $('#ss_after_show').val('1');
            $(this).html('Remove SS After');
        }
    })
   
</script>
@endsection