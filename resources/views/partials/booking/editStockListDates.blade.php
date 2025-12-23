@extends('layouts.front')

@section('content')
{!! Form::open(array('route' => 'stocklist-hotel-dates-editupdate','method'=>'POST', 'enctype' => 'multipart/form-data', 'class'=>'stocklistHotelDatesEditForm', 'id'=>'stocklistHotelDatesEditForm')) !!}      
    <!-- <div class="modal-header">
        <div class="row">
            <div class="col-sm-12">
                <h5 class="modal-title" id="exampleModalLongTitle"><b>{{ $hotelList->name }}</b></h5>
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
</style>
 <div class="modal-body" >
<?php 
            $cnts = 0110;
            
            foreach ($hotelDateArray as $key => $value) { $display_euro_rate = $value->display_euro_rate; ?>
              
<div class="notIndexContainer" style="padding-top:0;">
    <div class="tour_confirmation_wrapper" style="padding: 0;">
        <div class="tour_confirmation">

           <!--  <div class="logo">
                <img src="{{ asset('images/logo2x.png') }}" alt="Veenus">
            </div> -->
            <div class="tc_intro" style="margin-top: 10px;">
                <div class="heading">{{!empty($_GET['contracts'])?'CONTRACT':'STOCK LIST RATES'}}</div>
            </div>

            <div class="tc_content" style="margin-top: 100px;">

                <div class="tc_boxes">
                    <?php if(!empty($_GET['contracts'])){ ?> 
                        <div class="tc_box_wrapper">
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
                        </div>
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
                    
                    <div class="tc_box_wrapper">
                        <div class="tc_box">

                            <div class="header">
                                Hotel
                            </div>

                            <div class="body">

                                <div class="hotel">

                                    <div class="name">
                                        <?php echo (!empty($hotel) ? $hotel->name : ''); ?>
                                    </div>

                                    <div class="stars">
                                        @if(!empty($hotel))
                                            @if ( $hotel->stars > 0 )
                                                @for ($i = 0; $i < $hotel->stars; $i++)
                                                    <i class="fas fa-star"></i>
                                                @endfor
                                            @endif
                                            <?php $stars = (5-$hotel->stars); ?>
                                            @for ($i = 0; $i < $stars; $i++)
                                                <i class="far fa-star"></i>
                                            @endfor
                                        @endif
                                    </div>

                                </div>

                                <?php if(!empty($hotel)){ ?>
                                    <p>
                                        Address: <?php
                                                    $address = array();
                                                    if(!empty($hotel->street)){
                                                        $address[] = $hotel->street;
                                                    } 
                                                    if(!empty($hotel->city)){
                                                        $address[] = $hotel->city;
                                                    } 
                                                    if(!empty($hotel->country)){
                                                        $address[] = $hotel->country;
                                                    } 
                                                    if(!empty($hotel->postcode)){
                                                        $address[] = $hotel->postcode;
                                                    } 
                                                    echo implode(', ', $address); ?>
                                    </p>
                                <?php  } ?>
                            </div>

                        </div>
                    </div>
                    <div class="box_date">
                        <div class="tc_box_wrapper split">

                            <div class="tc_box">

                                <div class="header">
                                    Dates
                                </div>

                                <div class="body">

                                    <p>
                                        <input type="date" class="notClickedCls dateChangeCls form-control dateInCls{{$cnts}} hdioCls" name="dates_edit[{{ $value->id }}][date_in]" id="DateIn{{$cnts}}" placeholder="Date In" value="{{ $value->date_in }}" required="" data-id="{{$cnts}}" style="font-size: 0.80rem;padding: 5px;">
                                            <input type="hidden" class="" name="dates_edit[{{ $value->id }}][id]" id="DateId{{$cnts}}"  value="{{ $value->id }}">
                                             - 
                                             <input type="date" class="notClickedCls dateChangeCls hdioCls dateOutCls{{$cnts}} form-control" name="dates_edit[{{ $value->id }}][date_out]" id="DateOut{{$cnts}}" placeholder="Date Out" value="{{ $value->date_out }}" required data-id="{{$cnts}}" style="font-size: 0.80rem;padding: 5px;">
                                    </p>

                                </div>

                            </div>

                            <div class="tc_box">

                                <div class="header">
                                   No. of Nights
                                </div>

                                <div class="body">

                                    <p>
                                         <input type="text" class="notClickedCls hdioCls form-control nightCls" name="dates_edit[{{ $value->id }}][night]" id="Nights{{$cnts}}" placeholder="Nights" value="{{ $value->night }}" readonly="" required>
                                    </p>

                                </div>

                            </div>

                        </div>
                        <?php if(!empty($_GET['contracts'])){ ?> 
                            <div class="dates_div"></div>
                        <button class="btn-sm btn-primary mb-2 mt-2" type="button" id="add_dates">Add Date</button>
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

                                        <div class="rt_row">

                                            <div class="rt_column label">
                                                Room Type
                                            </div>

                                            <div class="rt_column no-boder bold">
                                                Single
                                            </div>

                                            <div class="rt_column no-boder bold">
                                                Double
                                            </div>

                                            <div class="rt_column no-boder bold">
                                                Twin
                                            </div>

                                            <div class="rt_column no-boder bold">
                                                Triple
                                            </div>

                                            <div class="rt_column no-boder bold">
                                                Quad
                                            </div>

                                            <div class="rt_column no-boder bold">
                                                Dr
                                            </div>

                                        </div>
                                        <?php
                                        $sgl = 0;
                                        $dbl = 0;
                                        $twn = 0;
                                        $trp = 0;
                                        $qrd = 0;
                                        $sgl_dr = 0;
                                        $night = '';
                                        $hotel_dates = 


DB::connection('mysql_veenus')->table('hotel_dates')->where('hotel_id', $hotel->id)->where('hotel_id', $hotel->id)->where('id', $hotel_book_date_id)->get()->toArray();
                                        if(!empty($hotel_dates)){
                                            foreach ($hotel_dates as $key => $valueq) {
                                            if( !empty($valueq->date_in ) ) {   
                                                if(!empty($experienceDate) && ($valueq->date_in == $experienceDate->date_from) && ($valueq->date_out == $experienceDate->date_to)){
                                                    $sgl = $valueq->sgl;
                                                    $dbl = $valueq->dbl;
                                                    $twn = $valueq->twn;
                                                    $trp = $valueq->trp;
                                                    $qrd = $valueq->qrd;
                                                    $sgl_dr = $valueq->sgl_dr;
                                                    $night = $valueq->night;
                                                    
                                                    $ratepp = number_format($valueq->rate_dbb,2); // added by niral
                                                    // $srspp = number_format($valueq->date_srs,2); // added by niral
                                                    $sgl_srs = number_format($valueq->sgl_srs,2);
                                                    $dbl_srs = number_format($valueq->dbl_srs,2);
                                                    $twn_srs = number_format($valueq->twn_srs,2);
                                                    $trp_srs = number_format($valueq->trp_srs,2);
                                                    $qrd_srs = number_format($valueq->qrd_srs,2);
                                                    $dr_srs = number_format($valueq->dr_srs,2);
                                                }
                                            }
                                            }
                                        }
                                        // if(isset($experienceDate)){
                                        //     $sgl = $experienceDate->sgl;
                                        //     $dbl = $experienceDate->dbl;
                                        //     $twn = $experienceDate->twn;
                                        //     $trp = $experienceDate->trp;
                                        //     $qrd = $experienceDate->qrd;
                                        //     $night = $experienceDate->night;
                                        // }
                                        ?>
                                        <div class="rt_row">

                                            <div class="rt_column label">
                                                No. Rooms
                                            </div>

                                            <div class="rt_column bold no-boder">
                                                <input type="text" class="notClickedCls hdioCls form-control numbercls" id="Sgl{{$cnts}}" placeholder="Sgl" value="{{ $value->sgl }}" name="dates_edit[{{ $value->id }}][sgl]" >
                                            </div>

                                            <div class="rt_column bold no-boder">
                                                <input type="text" class="notClickedCls hdioCls form-control numbercls" id="Dbl{{$cnts}}" placeholder="Dbl" value="{{ $value->dbl }}" name="dates_edit[{{ $value->id }}][dbl]" >
                                            </div>

                                            <div class="rt_column bold no-boder">
                                                <input type="text" class="notClickedCls hdioCls form-control numbercls" id="Twn{{$cnts}}" placeholder="Twn" value="{{ $value->twn }}" name="dates_edit[{{ $value->id }}][twn]" >
                                            </div>

                                            <div class="rt_column bold no-boder disabled">
                                                 <input type="text" class="notClickedCls hdioCls form-control numbercls" id="Trp{{$cnts}}" placeholder="Trp" value="{{ $value->trp }}" name="dates_edit[{{ $value->id }}][trp]" >
                                            </div>

                                            <div class="rt_column bold no-boder disabled">
                                                <input type="text" class="notClickedCls hdioCls form-control numbercls" id="Qrd{{$cnts}}" placeholder="Qrd" value="{{ $value->qrd }}" name="dates_edit[{{ $value->id }}][qrd]" >
                                            </div>

                                            <div class="rt_column bold no-boder">
                                                <input type="text" class="notClickedCls hdioCls form-control numbercls" id="SglDr{{$cnts}}" placeholder="Sgl(Dr)" value="{{ $value->sgl_dr }}" name="dates_edit[{{ $value->id }}][sgl_dr]" >
                                            </div>

                                        </div>

                                         <div class="rt_row pound_colunm" <?=(!empty($hotel->preferred_currency) && ($hotel->preferred_currency == '1'))?'':'style="display:none"'?>>

                                            <div class="rt_column label">
                                                Rate pppn &#163;
                                            </div>

                                            <div class="rt_column no-boder">
                                                <?php //echo (!empty($dates_rates) ? $dates_rates->rate : ''); ?>
                                               <input type="text" class="notClickedCls hdioCls form-control numbercls" id="RateDBB{{$cnts}}" placeholder="Sgl Rate &#163;" value="{{ number_format($value->rate_dbb,2) }}" name="dates_edit[{{ $value->id }}][rate_dbb]" required>

                                               
                                            </div>

                                            <div class="rt_column no-boder">
                                              <input type="text" class="notClickedCls hdioCls form-control numbercls" id="RateDBL{{$cnts}}" placeholder="Dbl Rate pppn &#163;" value="{{ number_format($value->rate_dbl,2) }}" name="dates_edit[{{ $value->id }}][rate_dbl]" required>
                                            </div>

                                            <div class="rt_column no-boder">
                                               <input type="text" class="notClickedCls hdioCls form-control numbercls" id="RateTWN{{$cnts}}" placeholder="Twn Rate pppn &#163;" value="{{ number_format($value->rate_twn,2) }}" name="dates_edit[{{ $value->id }}][rate_twn]" required>
                                            </div>

                                            <div class="rt_column no-boder">
                                                <input type="text" class="notClickedCls hdioCls form-control numbercls" id="RateTRN{{$cnts}}" placeholder="Trp Rate pppn &#163;" value="{{ number_format($value->rate_trp,2) }}" name="dates_edit[{{ $value->id }}][rate_trp]" required>
                                            </div>

                                            <div class="rt_column no-boder">
                                                <input type="text" class="notClickedCls hdioCls form-control numbercls" id="RateQRD{{$cnts}}" placeholder="Qrd Rate pppn &#163;" value="{{ number_format($value->rate_qrd,2) }}" name="dates_edit[{{ $value->id }}][rate_qrd]" required>
                                            </div>

                                            <div class="rt_column no-boder">
                                                <input type="text" class="notClickedCls hdioCls form-control numbercls" id="RateDR{{$cnts}}" placeholder="Dr Rate pppn &#163;" value="{{ number_format($value->rate_dr,2) }}" name="dates_edit[{{ $value->id }}][rate_dr]" required>
                                            </div> 

                                        </div>
                                         

                                        <div class="rt_row pound_colunm" <?=(!empty($hotel->preferred_currency) && ($hotel->preferred_currency == '1'))?'':'style="display:none"'?>>
                                            <div class="rt_column label">
                                                SS pppn &#163;
                                            </div>

                                            <div class="rt_column no-boder">
                                                <?php //echo (!empty($dates_rates) ? $dates_rates->rate : ''); ?>
                                               <input type="text" class="notClickedCls hdioCls form-control numbercls" id="SRSSRS{{$cnts}}" placeholder="SRS Sgl Rate pppn &#163;" value="{{ number_format($value->date_srs,2) }}" name="dates_edit[{{ $value->id }}][date_srs]" required>

                                               
                                            </div>

                                            <div class="rt_column no-boder">
                                              <input type="text" class="notClickedCls hdioCls form-control numbercls" id="SRSDBL{{$cnts}}" placeholder="SRS Dbl Rate pppn &#163;" value="{{ number_format($value->date_srs_dbl,2) }}" name="dates_edit[{{ $value->id }}][date_srs_dbl]" required>
                                            </div>

                                            <div class="rt_column no-boder">
                                               <input type="text" class="notClickedCls hdioCls form-control numbercls" id="SRSTWN{{$cnts}}" placeholder="SRS Twn Rate pppn &#163;" value="{{ number_format($value->date_srs_twn,2) }}" name="dates_edit[{{ $value->id }}][date_srs_twn]" required>
                                            </div>

                                            <div class="rt_column no-boder">
                                                <input type="text" class="notClickedCls hdioCls form-control numbercls" id="SRSTRN{{$cnts}}" placeholder="SRS Trn Rate pppn &#163;" value="{{ number_format($value->date_srs_trp,2) }}" name="dates_edit[{{ $value->id }}][date_srs_trp]" required>
                                            </div>

                                            <div class="rt_column no-boder">
                                                <input type="text" class="notClickedCls hdioCls form-control numbercls" id="SRSQRD{{$cnts}}" placeholder="SRS Qrd Rate pppn &#163;" value="{{ number_format($value->date_srs_qrd,2) }}" name="dates_edit[{{ $value->id }}][date_srs_qrd]" required>
                                            </div>

                                            <div class="rt_column no-boder">
                                                <input type="text" class="notClickedCls hdioCls form-control numbercls" id="SRSDR{{$cnts}}" placeholder="SRS Dr Rate pppn &#163;" value="{{ number_format($value->date_srs_dr,2) }}" name="dates_edit[{{ $value->id }}][date_srs_dr]" required>
                                            </div> 

                                        </div>

                                        <div class="rt_row euro_colunm" <?=(!empty($hotel->preferred_currency) && ($hotel->preferred_currency == '2'))?'':'style="display:none"'?>>

                                            <div class="rt_column label">
                                                Rate pppn &#8364;
                                            </div>

                                            <div class="rt_column no-boder">
                                               <input type="text" class="notClickedCls hdioCls form-control numbercls" id="RateDBBE{{$cnts}}" placeholder="Sgl Rate pppn &#8364;" value="{{ number_format($value->rate_dbb_euro,2) }}" name="dates_edit[{{ $value->id }}][rate_dbb_euro]" required>
                                            </div>

                                            <div class="rt_column no-boder">
                                              <input type="text" class="notClickedCls hdioCls form-control numbercls" id="RateDBL{{$cnts}}" placeholder="Cbl Rate pppn &#8364;" value="{{ number_format($value->rate_dbl_euro,2) }}" name="dates_edit[{{ $value->id }}][rate_dbl_euro]" required>
                                            </div>

                                            <div class="rt_column no-boder">
                                               <input type="text" class="notClickedCls hdioCls form-control numbercls" id="RateTWNE{{$cnts}}" placeholder="Twm Rate pppn &#8364;" value="{{ number_format($value->rate_twn_euro,2) }}" name="dates_edit[{{ $value->id }}][rate_twn_euro]" required>
                                            </div>

                                            <div class="rt_column no-boder">
                                                <input type="text" class="notClickedCls hdioCls form-control numbercls" id="RateTRNE{{$cnts}}" placeholder="Trp Rate pppn &#8364;" value="{{ number_format($value->rate_trp_euro,2) }}" name="dates_edit[{{ $value->id }}][rate_trp_euro]" required>
                                            </div>

                                            <div class="rt_column no-boder">
                                                <input type="text" class="notClickedCls hdioCls form-control numbercls" id="RateQRDE{{$cnts}}" placeholder="Qrd Rate pppn &#8364;" value="{{ number_format($value->rate_qrd_euro,2) }}" name="dates_edit[{{ $value->id }}][rate_qrd_euro]" required>
                                            </div>

                                            <div class="rt_column no-boder">
                                                <input type="text" class="notClickedCls hdioCls form-control numbercls" id="RateDRE{{$cnts}}" placeholder="Dr Rate pppn &#8364;" value="{{ number_format($value->rate_dr_euro,2) }}" name="dates_edit[{{ $value->id }}][rate_dr_euro]" required>
                                            </div> 

                                        </div>
                                         <div class="rt_row euro_colunm" <?=(!empty($hotel->preferred_currency) && ($hotel->preferred_currency == '2'))?'':'style="display:none"'?>>

                                            <div class="rt_column label">
                                                SS pppn &#8364;
                                            </div>

                                            <div class="rt_column no-boder">
                                               <input type="text" class="notClickedCls hdioCls form-control numbercls" id="SRSSRSE{{$cnts}}" placeholder="SRS Sgl Rate pppn &#8364;" value="{{ number_format($value->date_srs_euro,2) }}" name="dates_edit[{{ $value->id }}][date_srs_euro]" required>

                                               
                                            </div>

                                            <div class="rt_column no-boder">
                                              <input type="text" class="notClickedCls hdioCls form-control numbercls" id="SRSDBL{{$cnts}}" placeholder="SRS Dbl Rate pppn &#8364;" value="{{ number_format($value->date_srs_dbl_euro,2) }}" name="dates_edit[{{ $value->id }}][date_srs_dbl_euro]" required>
                                            </div>

                                            <div class="rt_column no-boder">
                                               <input type="text" class="notClickedCls hdioCls form-control numbercls" id="SRSTWNE{{$cnts}}" placeholder="SRS Twn Rate pppn &#8364;" value="{{ number_format($value->date_srs_twn_euro,2) }}" name="dates_edit[{{ $value->id }}][date_srs_twn_euro]" required>
                                            </div>

                                            <div class="rt_column no-boder">
                                                <input type="text" class="notClickedCls hdioCls form-control numbercls" id="SRSTRNE{{$cnts}}" placeholder="SRS Trd Rate pppn &#8364;" value="{{ number_format($value->date_srs_trp_euro,2) }}" name="dates_edit[{{ $value->id }}][date_srs_trp_euro]" required>
                                            </div>

                                            <div class="rt_column no-boder">
                                                <input type="text" class="notClickedCls hdioCls form-control numbercls" id="SRSQRDE{{$cnts}}" placeholder="SRS Qrd Rate pppn &#8364;" value="{{ number_format($value->date_srs_qrd_euro,2) }}" name="dates_edit[{{ $value->id }}][date_srs_qrd_euro]" required>
                                            </div>

                                            <div class="rt_column no-boder">
                                                <input type="text" class="notClickedCls hdioCls form-control numbercls" id="SRSDRE{{$cnts}}" placeholder="SRS Dr Rate pppn &#8364;" value="{{ number_format($value->date_srs_dr_euro,2) }}" name="dates_edit[{{ $value->id }}][date_srs_dr_euro]" required>
                                            </div> 

                                        </div>
                                        <?php /*<div class="rt_row">

                                            <div class="rt_column label">
                                                SRS
                                            </div>

                                            <div class="rt_column bold">
                                                 <input type="text" class="notClickedCls hdioCls form-control numbercls" id="sgl_srs{{$cnts}}" placeholder="sgl srs" value="{{ $value->sgl_srs }}" name="dates_edit[{{ $value->id }}][sgl_srs]" >
                                            </div>

                                            <div class="rt_column bold">
                                                <input type="text" class="notClickedCls hdioCls form-control numbercls" id="dbl_srs{{$cnts}}" placeholder="dbl srs" value="{{ $value->dbl_srs }}" name="dates_edit[{{ $value->id }}][dbl_srs]" >
                                            </div>

                                            <div class="rt_column bold">
                                                <input type="text" class="notClickedCls hdioCls form-control numbercls" id="twn_srs{{$cnts}}" placeholder="twn srs" value="{{ $value->twn_srs }}" name="dates_edit[{{ $value->id }}][twn_srs]" >
                                            </div>

                                            <div class="rt_column bold disabled">
                                                <input type="text" class="notClickedCls hdioCls form-control numbercls" id="trp_srs{{$cnts}}" placeholder="trp srs" value="{{ $value->trp_srs }}" name="dates_edit[{{ $value->id }}][trp_srs]" >
                                            </div>

                                            <div class="rt_column bold disabled">
                                                <input type="text" class="notClickedCls hdioCls form-control numbercls" id="qrd_srs{{$cnts}}" placeholder="qrd srs" value="{{ $value->qrd_srs }}" name="dates_edit[{{ $value->id }}][qrd_srs]" >
                                            </div>

                                            <div class="rt_column bold">
                                               <input type="text" class="notClickedCls hdioCls form-control numbercls" id="dr_srs{{$cnts}}" placeholder="dr srs" value="{{ $value->dr_srs }}" name="dates_edit[{{ $value->id }}][dr_srs]" >
                                            </div>

                                        </div>*/ ?>
                                       
                                        <div class="rt_row">

                                            <div class="rt_column label">
                                               Rooms SS Free
                                            </div>

                                            <div class="rt_column no-boder">
                                              
                                           <input type="text" class="notClickedCls hdioCls form-control _numbercls" id="freeSRS{{$cnts}}" placeholder="" value="{{ !empty($value->free_srs) ? $value->free_srs : 0 }}" name="dates_edit[{{ $value->id }}][free_srs]" required onkeypress="return onlyNumberKey(event)">
                                            </div>

                                            <div class="rt_column no-boder">
                                               
                                            </div>

                                            <div class="rt_column no-boder">
                                                
                                            </div>

                                            <div class="rt_column no-boder">
                                                
                                            </div>

                                            <div class="rt_column no-boder">
                                                
                                            </div> 
                                            <div class="rt_column no-boder">
                                                
                                            </div> 

                                        </div> 
                                        <?php /*if(!empty($_GET['contracts'])){*/ ?> 
                                         <!-- <input type="button" id="add_euro" value="Add Euro" class="btn btn-secondary" > -->
                                     <?php /*}*/ ?>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                    
                     <?php if(!empty($_GET['contracts'])){ ?> 

                        <div class="dates_rate_div"></div>
                    <button class="btn-sm btn-primary mb-2 mt-2" type="button" id="add_upgrade">Add Date and Rate</button>
                    <?php } ?>
                     <?php $market_option_selected = (!empty($value->market_option))?$value->market_option:1?>
                    <div class="tc_box_wrapper">
                        <div class="tc_box">

                            <div class="header">
                               
                                <div style="width:55%;">Room requested (supplements) </div>
                                        <div style="width:45%;">
                                             <select style="padding:5px;width:50%;" class="form-control" name="select_market_option" id="select_market_option">
                                                <option value="">Select market</option>
                                                <option value="1" <?=(!empty($market_option_selected) && $market_option_selected == '1')?'selected':''?>>UK</option>
                                                <option value="2" <?=(!empty($market_option_selected) && $market_option_selected == '2')?'selected':''?>>EU</option>
                                                <option value="3" <?=(!empty($market_option_selected) && $market_option_selected == '3')?'selected':''?>>UK & EU</option>
                                            </select>
                                        </div> 
                            </div>

                            <div class="body" style="">
                               
                                <table class="supplements" cellpadding="5" width="85%">
                                    <tr>
                                        <td width="20%">Supplements</td>
                                        <td width="10%">Cost</td>
                                        <td width="35%">In Price</td>
                                        <td width="35%">Out Price</td>
                                    </tr>
                                    <tr>
                                         <?php
                                            
                                        
                                           $value->hotelDatesSupplements = isset($value->hotelDatesSupplements)?$value->hotelDatesSupplements:array();

                                            $hotelDatesSupplements = $value->hotelDatesSupplements;
                                            $value->hotelDatesSupplements = array_column($value->hotelDatesSupplements, 'supplements');

                                            

                                            $checked = '';
                                            $price = '';
                                            $price_out = '';
                                            $price_euro_in = '';
                                            $price_euro_out = '';
                                            $price_type = '';
                                            if(!empty($value->hotelDatesSupplements)){
                                                if (in_array(1, $value->hotelDatesSupplements))
                                                {
                                                    $srchKey = array_search(1,$value->hotelDatesSupplements);
                                                    $price = isset($hotelDatesSupplements[$srchKey]['price'])?number_format($hotelDatesSupplements[$srchKey]['price'],2):'0';
                                                    $price_out = isset($hotelDatesSupplements[$srchKey]['price_out'])?number_format($hotelDatesSupplements[$srchKey]['price_out'],2):'0';
                                                    $price_euro_in = isset($hotelDatesSupplements[$srchKey]['price_euro_in'])?number_format($hotelDatesSupplements[$srchKey]['price_euro_in'],2):'0';
                                                    $price_euro_out = isset($hotelDatesSupplements[$srchKey]['price_euro_out'])?number_format($hotelDatesSupplements[$srchKey]['price_euro_out'],2):'0';
                                                    $price_type = $hotelDatesSupplements[$srchKey]['price_type'];
                                                    $checked = 'checked';
                                                }  
                                            }
                                            ?>
                                        <td width="20%">
                                            <div class="inclusionsSections">
                                                <div class="checkarea_part_Dates">
                                                    <label class="checkbox_div">
                                                      <input type="checkbox" name="dates_edit[{{ $value->id }}][supplements][1][name]" class="custom_chkbox tagchkbox notClickedCls " value="1" data-val="" {{ $checked }}> <span class="notClickedCls ">Water view (Sea/Lake/River) </span>
                                                      
                                                      <span class="checkmark"></span>
                                                      
                                                         
                                                       
                                                         
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                        <td width="10%">
                                            <select class="form-control notClickedCls" name="dates_edit[{{ $value->id }}][supplements][1][price_type]">
                                                <option <?=(!empty($price_type) && $price_type == 'pppn')?'selected="selected"':''?> value="pppn">pppn</option>
                                                <option <?=(!empty($price_type) && $price_type == 'prpn')?'selected="selected"':''?> value="prpn">prpn</option>
                                            </select>
                                        </td>
                                        
                                        <td width="35%">
                                        
                                            <div class="pound_price pound_colunm" <?=(!empty($hotel->preferred_currency) && $hotel->preferred_currency == 1)?'':'style="display:none"'?>>
                                                <input type="text" class="notClickedCls hdioCls form-control numbercls valid" placeholder="&#163; In price" value="<?php echo $price; ?>" name="dates_edit[{{ $value->id }}][supplements][1][price]" aria-invalid="false" style="display: unset;">
                                                <span class="hotelDatesInOutCls" style="margin-right: 10px;"><b> <?=(!empty($price_type) && $price_type == 'prpn')?$price_type:(!empty($price_type)?'pp':'')?> </b></span>
                                            </div>
                                            <div class="euro_price euro_colunm" <?=(!empty($hotel->preferred_currency) && $hotel->preferred_currency == 2)?'':'style="display:none"'?>>
                                                <input type="text" class="notClickedCls hdioCls form-control numbercls valid" placeholder="&#8364; In price" value="<?php echo $price_euro_in; ?>" name="dates_edit[{{ $value->id }}][supplements][1][price_euro_in]" aria-invalid="false" style="display: unset;">
                                                <span class="hotelDatesInOutCls" style="margin-right: 10px;"><b> <?=(!empty($price_type) && $price_type == 'prpn')?$price_type:(!empty($price_type)?'pp':'')?> </b></span>
                                            </div>
                                        </td>
                                        <td width="35%">
                                            <div class="pound_price pound_colunm_out" <?=(!empty($market_option_selected) && ($market_option_selected == '1' || $market_option_selected == '3'))?'':'style="display:none"'?>>
                                                <input type="text" class="notClickedCls hdioCls form-control numbercls valid" placeholder="&#163; Out price" value="<?php echo $price_out; ?>" name="dates_edit[{{ $value->id }}][supplements][1][price_out]" aria-invalid="false" style="display: unset;">
                                                <span class="hotelDatesInOutCls" style="margin-right: 10px;"><b> <?=(!empty($price_type) && $price_type == 'prpn')?$price_type:(!empty($price_type)?'pp':'')?> </b></span>
                                            </div>
                                            <div class="euro_price euro_colunm_out" <?=(!empty($market_option_selected) && ($market_option_selected == '2' || $market_option_selected == '3'))?'':'style="display:none"'?>>
                                                <input type="text" class="notClickedCls hdioCls form-control numbercls valid" placeholder="&#8364; Out price" value="<?php echo $price_euro_out; ?>" name="dates_edit[{{ $value->id }}][supplements][1][price_euro_out]" aria-invalid="false" style="display: unset;">
                                                <span class="hotelDatesInOutCls" style="margin-right: 10px;"><b> <?=(!empty($price_type) && $price_type == 'prpn')?$price_type:(!empty($price_type)?'pp':'')?> </b></span>
                                            </div>
                                           
                                        </td>
                                    </tr>
                                    <tr>
                                         <?php

                                            $checked = '';
                                            $price = '';
                                            $price_out = '';
                                            $price_euro_in = '';
                                            $price_euro_out = '';
                                            $price_type = '';
                                            if(!empty($value->hotelDatesSupplements)){
                                                if (in_array(2, $value->hotelDatesSupplements))
                                                {
                                                    $srchKey = array_search(2,$value->hotelDatesSupplements);
                                                   $price = isset($hotelDatesSupplements[$srchKey]['price'])?number_format($hotelDatesSupplements[$srchKey]['price'],2):'0';
                                                    $price_out = isset($hotelDatesSupplements[$srchKey]['price_out'])?number_format($hotelDatesSupplements[$srchKey]['price_out'],2):'0';
                                                    $price_euro_in = isset($hotelDatesSupplements[$srchKey]['price_euro_in'])?number_format($hotelDatesSupplements[$srchKey]['price_euro_in'],2):'0';
                                                    $price_euro_out = isset($hotelDatesSupplements[$srchKey]['price_euro_out'])?number_format($hotelDatesSupplements[$srchKey]['price_euro_out'],2):'0';
                                                    $price_type = $hotelDatesSupplements[$srchKey]['price_type'];
                                                    $checked = 'checked';
                                                }  
                                            }
                                            ?>
                                        <td width="20%">
                                            <div class="inclusionsSections">
                                                <div class="checkarea_part_Dates">
                                                    <label class="checkbox_div">
                                                      <input type="checkbox" name="dates_edit[{{ $value->id }}][supplements][2][name]" class="custom_chkbox tagchkbox notClickedCls " value="2" data-val="" {{ $checked }}> <span class="notClickedCls ">View (Garden/Balcony) </span>
                                                      
                                                      <span class="checkmark"></span>
                                                      
                                                         
                                                       
                                                         
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                        <td width="10%">
                                            <select class="form-control notClickedCls" name="dates_edit[{{ $value->id }}][supplements][2][price_type]">
                                                <option <?=(!empty($price_type) && $price_type == 'pppn')?'selected="selected"':''?> value="pppn">pppn</option>
                                                <option <?=(!empty($price_type) && $price_type == 'prpn')?'selected="selected"':''?> value="prpn">prpn</option>
                                            </select>
                                        </td>
                                        
                                        <td width="35%">
                                        
                                            <div class="pound_price pound_colunm" <?=(!empty($hotel->preferred_currency) && $hotel->preferred_currency == 1)?'':'style="display:none"'?>>
                                                <input type="text" class="notClickedCls hdioCls form-control numbercls valid" placeholder="&#163; In price" value="<?php echo $price; ?>" name="dates_edit[{{ $value->id }}][supplements][2][price]" aria-invalid="false" style="display: unset;">
                                                <span class="hotelDatesInOutCls" style="margin-right: 10px;"><b> <?=(!empty($price_type) && $price_type == 'prpn')?$price_type:(!empty($price_type)?'pp':'')?> </b></span>
                                            </div>
                                            <div class="euro_price euro_colunm" <?=(!empty($hotel->preferred_currency) && $hotel->preferred_currency == 2)?'':'style="display:none"'?>>
                                                <input type="text" class="notClickedCls hdioCls form-control numbercls valid" placeholder="&#8364; In price" value="<?php echo $price_euro_in; ?>" name="dates_edit[{{ $value->id }}][supplements][2][price_euro_in]" aria-invalid="false" style="display: unset;">
                                                <span class="hotelDatesInOutCls" style="margin-right: 10px;"><b> <?=(!empty($price_type) && $price_type == 'prpn')?$price_type:(!empty($price_type)?'pp':'')?> </b></span>
                                            </div>
                                        </td>
                                        <td width="35%">
                                            <div class="pound_price pound_colunm_out" <?=(!empty($market_option_selected) && ($market_option_selected == '1' || $market_option_selected == '3'))?'':'style="display:none"'?>>
                                                <input type="text" class="notClickedCls hdioCls form-control numbercls valid" placeholder="&#163; Out price" value="<?php echo $price_out; ?>" name="dates_edit[{{ $value->id }}][supplements][2][price_out]" aria-invalid="false" style="display: unset;">
                                                <span class="hotelDatesInOutCls" style="margin-right: 10px;"><b> <?=(!empty($price_type) && $price_type == 'prpn')?$price_type:(!empty($price_type)?'pp':'')?> </b></span>
                                            </div>
                                            <div class="euro_price euro_colunm_out" <?=(!empty($market_option_selected) && ($market_option_selected == '2' || $market_option_selected == '3'))?'':'style="display:none"'?>>
                                                <input type="text" class="notClickedCls hdioCls form-control numbercls valid" placeholder="&#8364; Out price" value="<?php echo $price_euro_out; ?>" name="dates_edit[{{ $value->id }}][supplements][2][price_euro_out]" aria-invalid="false" style="display: unset;">
                                                <span class="hotelDatesInOutCls" style="margin-right: 10px;"><b> <?=(!empty($price_type) && $price_type == 'prpn')?$price_type:(!empty($price_type)?'pp':'')?> </b></span>
                                            </div>
                                           
                                        </td>
                                    </tr>
                                    <tr>
                                         <?php

                                            $checked = '';
                                            $price = '';
                                            $price_out = '';
                                            $price_euro_in = '';
                                            $price_euro_out = '';
                                            $price_type = '';
                                            if(!empty($value->hotelDatesSupplements)){
                                                if (in_array(3, $value->hotelDatesSupplements))
                                                {
                                                    $srchKey = array_search(3,$value->hotelDatesSupplements);
                                                    $price = isset($hotelDatesSupplements[$srchKey]['price'])?number_format($hotelDatesSupplements[$srchKey]['price'],2):'0';
                                                    $price_out = isset($hotelDatesSupplements[$srchKey]['price_out'])?number_format($hotelDatesSupplements[$srchKey]['price_out'],2):'0';
                                                    $price_euro_in = isset($hotelDatesSupplements[$srchKey]['price_euro_in'])?number_format($hotelDatesSupplements[$srchKey]['price_euro_in'],2):'0';
                                                    $price_euro_out = isset($hotelDatesSupplements[$srchKey]['price_euro_out'])?number_format($hotelDatesSupplements[$srchKey]['price_euro_out'],2):'0';
                                                    $price_type = $hotelDatesSupplements[$srchKey]['price_type'];
                                                    $checked = 'checked';
                                                }  
                                            }
                                            ?>
                                        <td width="20%">
                                            <div class="inclusionsSections">
                                                <div class="checkarea_part_Dates">
                                                    <label class="checkbox_div">
                                                      <input type="checkbox" name="dates_edit[{{ $value->id }}][supplements][3][name]" class="custom_chkbox tagchkbox notClickedCls " value="3" data-val="" {{ $checked }}> <span class="notClickedCls ">Executive/De Luxe/Superior Rooms </span>
                                                      
                                                      <span class="checkmark"></span>
                                                      
                                                         
                                                       
                                                         
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                        <td width="10%">
                                            <select class="form-control notClickedCls" name="dates_edit[{{ $value->id }}][supplements][3][price_type]">
                                                <option <?=(!empty($price_type) && $price_type == 'pppn')?'selected="selected"':''?> value="pppn">pppn</option>
                                                <option <?=(!empty($price_type) && $price_type == 'prpn')?'selected="selected"':''?> value="prpn">prpn</option>
                                            </select>
                                        </td>
                                        
                                        <td width="35%">
                                        
                                            <div class="pound_price pound_colunm" <?=(!empty($hotel->preferred_currency) && $hotel->preferred_currency == 1)?'':'style="display:none"'?>>
                                                <input type="text" class="notClickedCls hdioCls form-control numbercls valid" placeholder="&#163; In price" value="<?php echo $price; ?>" name="dates_edit[{{ $value->id }}][supplements][3][price]" aria-invalid="false" style="display: unset;">
                                                <span class="hotelDatesInOutCls" style="margin-right: 10px;"><b> <?=(!empty($price_type) && $price_type == 'prpn')?$price_type:(!empty($price_type)?'pp':'')?> </b></span>
                                            </div>
                                            <div class="euro_price euro_colunm" <?=(!empty($hotel->preferred_currency) && $hotel->preferred_currency == 2)?'':'style="display:none"'?>>
                                                <input type="text" class="notClickedCls hdioCls form-control numbercls valid" placeholder="&#8364; In price" value="<?php echo $price_euro_in; ?>" name="dates_edit[{{ $value->id }}][supplements][3][price_euro_in]" aria-invalid="false" style="display: unset;">
                                                <span class="hotelDatesInOutCls" style="margin-right: 10px;"><b> <?=(!empty($price_type) && $price_type == 'prpn')?$price_type:(!empty($price_type)?'pp':'')?> </b></span>
                                            </div>
                                        </td>
                                        <td width="35%">
                                            <div class="pound_price pound_colunm_out" <?=(!empty($market_option_selected) && ($market_option_selected == '1' || $market_option_selected == '3'))?'':'style="display:none"'?>>
                                                <input type="text" class="notClickedCls hdioCls form-control numbercls valid" placeholder="&#163; Out price" value="<?php echo $price_out; ?>" name="dates_edit[{{ $value->id }}][supplements][3][price_out]" aria-invalid="false" style="display: unset;">
                                                <span class="hotelDatesInOutCls" style="margin-right: 10px;"><b> <?=(!empty($price_type) && $price_type == 'prpn')?$price_type:(!empty($price_type)?'pp':'')?> </b></span>
                                            </div>
                                            <div class="euro_price euro_colunm_out" <?=(!empty($market_option_selected) && ($market_option_selected == '2' || $market_option_selected == '3'))?'':'style="display:none"'?>>
                                                <input type="text" class="notClickedCls hdioCls form-control numbercls valid" placeholder="&#8364; Out price" value="<?php echo $price_euro_out; ?>" name="dates_edit[{{ $value->id }}][supplements][3][price_euro_out]" aria-invalid="false" style="display: unset;">
                                                <span class="hotelDatesInOutCls" style="margin-right: 10px;"><b> <?=(!empty($price_type) && $price_type == 'prpn')?$price_type:(!empty($price_type)?'pp':'')?> </b></span>
                                            </div>
                                           
                                        </td>
                                    </tr>
                                    <tr>
                                         <?php

                                            $checked = '';
                                            $price = '';
                                            $price_out = '';
                                            $price_euro_in = '';
                                            $price_euro_out = '';
                                            $price_type = '';

                                            if(!empty($value->hotelDatesSupplements)){
                                                if (in_array(4, $value->hotelDatesSupplements))
                                                {
                                                    $srchKey = array_search(4,$value->hotelDatesSupplements);
                                                    $price = isset($hotelDatesSupplements[$srchKey]['price'])?number_format($hotelDatesSupplements[$srchKey]['price'],2):'0';
                                                    $price_out = isset($hotelDatesSupplements[$srchKey]['price_out'])?number_format($hotelDatesSupplements[$srchKey]['price_out'],2):'0';
                                                    $price_euro_in = isset($hotelDatesSupplements[$srchKey]['price_euro_in'])?number_format($hotelDatesSupplements[$srchKey]['price_euro_in'],2):'0';
                                                    $price_euro_out = isset($hotelDatesSupplements[$srchKey]['price_euro_out'])?number_format($hotelDatesSupplements[$srchKey]['price_euro_out'],2):'0';
                                                    $price_type = $hotelDatesSupplements[$srchKey]['price_type'];
                                                    $checked = 'checked';
                                                }  
                                            }
                                            ?>
                                        <td width="20%">
                                            <div class="inclusionsSections">
                                                <div class="checkarea_part_Dates">
                                                    <label class="checkbox_div">
                                                      <input type="checkbox" name="dates_edit[{{ $value->id }}][supplements][4][name]" class="custom_chkbox tagchkbox notClickedCls " value="4" data-val="" {{ $checked }}> <span class="notClickedCls ">Dbl/tw room for sole </span>
                                                      
                                                      <span class="checkmark"></span>
                                                      
                                                         
                                                       
                                                         
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                        <td width="10%">
                                            <select class="form-control notClickedCls" name="dates_edit[{{ $value->id }}][supplements][4][price_type]">
                                                <option <?=(!empty($price_type) && $price_type == 'pppn')?'selected="selected"':''?> value="pppn">pppn</option>
                                                <option <?=(!empty($price_type) && $price_type == 'prpn')?'selected="selected"':''?> value="prpn">prpn</option>
                                            </select>
                                        </td>
                                       
                                        <td width="35%">
                                        
                                            <div class="pound_price pound_colunm" <?=(!empty($hotel->preferred_currency) && $hotel->preferred_currency == 1)?'':'style="display:none"'?>>
                                                <input type="text" class="notClickedCls hdioCls form-control numbercls valid" placeholder="&#163; In price" value="<?php echo $price; ?>" name="dates_edit[{{ $value->id }}][supplements][4][price]" aria-invalid="false" style="display: unset;">
                                                <span class="hotelDatesInOutCls" style="margin-right: 10px;"><b> <?=(!empty($price_type) && $price_type == 'prpn')?$price_type:(!empty($price_type)?'pp':'')?> </b></span>
                                            </div>
                                            <div class="euro_price euro_colunm" <?=(!empty($hotel->preferred_currency) && $hotel->preferred_currency == 2)?'':'style="display:none"'?>>
                                                <input type="text" class="notClickedCls hdioCls form-control numbercls valid" placeholder="&#8364; In price" value="<?php echo $price_euro_in; ?>" name="dates_edit[{{ $value->id }}][supplements][4][price_euro_in]" aria-invalid="false" style="display: unset;">
                                                <span class="hotelDatesInOutCls" style="margin-right: 10px;"><b> <?=(!empty($price_type) && $price_type == 'prpn')?$price_type:(!empty($price_type)?'pp':'')?> </b></span>
                                            </div>
                                        </td>
                                        <td width="35%">
                                            <div class="pound_price pound_colunm_out" <?=(!empty($market_option_selected) && ($market_option_selected == '1' || $market_option_selected == '3'))?'':'style="display:none"'?>>
                                                <input type="text" class="notClickedCls hdioCls form-control numbercls valid" placeholder="&#163; Out price" value="<?php echo $price_out; ?>" name="dates_edit[{{ $value->id }}][supplements][4][price_out]" aria-invalid="false" style="display: unset;">
                                                <span class="hotelDatesInOutCls" style="margin-right: 10px;"><b> <?=(!empty($price_type) && $price_type == 'prpn')?$price_type:(!empty($price_type)?'pp':'')?> </b></span>
                                            </div>
                                            <div class="euro_price euro_colunm_out" <?=(!empty($market_option_selected) && ($market_option_selected == '2' || $market_option_selected == '3'))?'':'style="display:none"'?>>
                                                <input type="text" class="notClickedCls hdioCls form-control numbercls valid" placeholder="&#8364; Out price" value="<?php echo $price_euro_out; ?>" name="dates_edit[{{ $value->id }}][supplements][4][price_euro_out]" aria-invalid="false" style="display: unset;">
                                                <span class="hotelDatesInOutCls" style="margin-right: 10px;"><b> <?=(!empty($price_type) && $price_type == 'prpn')?$price_type:(!empty($price_type)?'pp':'')?> </b></span>
                                            </div>
                                           
                                        </td>
                                    </tr>
                                </table>
                               
                                
                                
                                <?php /*
                                $hotel_dates_supplements = '';
                                
                                if(!empty($hotel_dates)){
                                    foreach ($hotel_dates as $key => $hvalue) {
                                        if(!empty($experienceDate) && ($hvalue->date_in == $experienceDate->date_from) && ($hvalue->date_out == $experienceDate->date_to)){
                                            $hotel_date_id = $hvalue->id;
                                            $hotel_dates_supplements = 


DB::connection('mysql_veenus')->table('hotel_dates_supplements')->where('hotel_dates_id', $hotel_date_id)->get()->toArray();
                                        }
                                    }
                                }
                                if(!empty($hotel_dates_supplements)){
                                    echo '<ul>';
                                    foreach ($hotel_dates_supplements as $key => $htvalue) {
                                        if($htvalue->supplements == 1){
                                            echo '<li>Water view (Sea/Lake/River) prpn: <strong>&pound;'.$htvalue->price.'</strong></li>';
                                        }elseif($htvalue->supplements == 2){
                                            echo '<li>View (Garden/Balcony) prpn: <strong>&pound;'.$htvalue->price.'</strong></li>';
                                        }elseif($htvalue->supplements == 3){
                                            echo '<li>Executive/De Luxe/Superior Rooms prpn: <strong>&pound;'.$htvalue->price.'</strong></li>';
                                        }elseif($htvalue->supplements == 4){
                                            echo '<li>Dbl/tw room for sole pppn: <strong>&pound;'.$htvalue->price.'</strong></li>';
                                        }
                                    }
                                    echo '</ul>';
                                }else{
                                    echo 'N/A';
                                } */
                                ?>

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
                    <!-- added By Niral -->
                    <div class="tc_box_wrapper">
                        <div class="tc_box">

                            <div class="header">
                                Inclusions
                                <a href="javascript:;" id="inclusionsEdit">Edit</a>
                            </div>

                            <div class="body">
                                <textarea id="inclusionsField" name="inclusions" class="form-control" style="display: none;">{{ !empty($experienceDate->hc_inclusions)?$experienceDate->hc_inclusions:$value->hc_inclusions }}</textarea>
                                <div id="inclusionsContent">
                                    {!! !empty($experienceDate->hc_inclusions)?nl2br($experienceDate->hc_inclusions):nl2br($value->hc_inclusions) !!}
                                </div>
                              
                            </div>

                        </div>
                    </div>
                    <!-- end code by niral -->
                    <div class="tc_box_wrapper">
                        <div class="tc_box">

                            <div class="header">
                                Services and Facilities
                                <a href="javascript:;" id="sfEdit">Edit</a>
                            </div>

                            <div class="body">
                                <textarea id="sfField" name="services_facilities" class="form-control" rows="7" style="display: none;">{{ !empty($experienceDate->hc_services_facilities)?$experienceDate->hc_services_facilities:$value->hc_services_facilities }}</textarea>
                                <div id="sfContent">
                                    {!! !empty($experienceDate->hc_services_facilities)?nl2br($experienceDate->hc_services_facilities):nl2br($value->hc_services_facilities) !!}
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
                    </div>
                    <div class="tc_box_wrapper">
                        <div class="tc_box">

                            <div class="header">
                                Cancellation Date
                                <!-- <a href="javascript:;" id="tncEdit">Edit</a> -->
                            </div>

                            <div class="body" style="padding-bottom: 150px;">
                                <div class="">
                                   
                                    <div class="inclusionsSections">
                                        <div class="checkarea_part_Dates" style="width:100%;">
                                            <label class="checkbox_div">
                                              <input type="radio" name="dates_edit[{{ $value->id }}][cancellation_days]" class="custom_chkbox tagchkbox notClickedCls " value="30" <?php echo (!empty($value->cancellation_days) && ($value->cancellation_days == 30) ? 'checked' : 'checked'); ?>> <span class="notClickedCls ">30</span>
                                              <span class="checkmark notClickedCls"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="inclusionsSections">
                                        <div class="checkarea_part_Dates" style="width:100%;">
                                            <label class="checkbox_div">
                                              <input type="radio" name="dates_edit[{{ $value->id }}][cancellation_days]" class="custom_chkbox tagchkbox notClickedCls " value="60" <?php echo (!empty($value->cancellation_days) && ($value->cancellation_days == 60) ? 'checked' : ''); ?>> <span class="notClickedCls ">60</span>
                                              <span class="checkmark notClickedCls"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="inclusionsSections">
                                        <div class="checkarea_part_Dates" style="width:100%;">
                                            <label class="checkbox_div">
                                              <input type="radio" name="dates_edit[{{ $value->id }}][cancellation_days]" class="custom_chkbox tagchkbox notClickedCls " value="90" <?php echo (!empty($value->cancellation_days) && ($value->cancellation_days == 90) ? 'checked' : ''); ?>> <span class="notClickedCls ">90</span>
                                              <span class="checkmark notClickedCls"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <?php
                                    $cancellation_days = '';
                                    if(!empty($value->cancellation_days) && $value->cancellation_days != 30 && $value->cancellation_days != 60 && $value->cancellation_days != 90){
                                        $cancellation_days = $value->cancellation_days;
                                    }
                                    ?>
                                    <div class="inclusionsSections">
                                        <div class="checkarea_part_Dates" style="width:100%;">
                                            <label class="checkbox_div" style="display:inline-flex;">
                                              <input type="radio" name="dates_edit[{{ $value->id }}][cancellation_days]" class="custom_chkbox tagchkbox notClickedCls otherbtn" value="<?php echo $cancellation_days; ?>" <?php echo (!empty($cancellation_days) ? 'checked' : ''); ?>> <span class="notClickedCls ">Other: </span>
                                              <input type="text" class="form-control notClickedCls numbercls keypressbox" value="<?php echo $cancellation_days; ?>" style="margin-left: 5px;height: 30px;width: 100px;padding: 3px;">
                                              <span class="checkmark notClickedCls"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                

                            </div>

                        </div>
                    </div>
                    <div class="tc_box_wrapper">
                        <div class="tc_box">

                            <div class="header">
                                Events
                                <!-- <a href="javascript:;" id="tncEdit">Edit</a> -->
                            </div>

                            <div class="body" >
                                <div class="inclusionsSections">
                                <div class="form-group">
                                    <label for="email"><b>Is this date events specific?</b></label>
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input notClickedCls eventCheckCls" type="radio" name="dates_edit[{{ $value->id }}][events]" id="inlineRadio{{$cnts}}" value="0" <?=(empty($value->events) && $value->events == '0')?'checked':'';?> data-id="{{ $value->id }}">
                                      <label class="form-check-label notClickedCls" for="inlineRadio{{$cnts}}">No</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input notClickedCls eventCheckCls" type="radio" name="dates_edit[{{ $value->id }}][events]" id="inlineRadioYes{{$cnts}}" value="1" <?=(!empty($value->events) && $value->events == '1')?'checked':'';?> data-id="{{ $value->id }}">
                                      <label class="form-check-label notClickedCls" for="inlineRadioYes{{$cnts}}">Yes</label>
                                    </div>
                                </div>
                                <div class="form-group eventsDateCls{{ $value->id }}" style="display: <?=(!empty($value->events) && $value->events == '1')?'':'none';?>">
                                    <label for="eventTime{{$cnts}}"><b>Event Type</b></label>
                                    <b class="hotelDatesInOutCls">{{ !empty($value->event_type)?$value->event_type:'' }}</b>
                                    <input type="text" class="form-control notClickedCls hdioCls" id="eventTime{{$cnts}}" placeholder="Max 50 characters."  value="{{ !empty($value->event_type)?$value->event_type:'' }}" name="dates_edit[{{ $value->id }}][event_type]" required maxlength="50" >
                                </div>
                            </div>
                                

                            </div>

                        </div>
                    </div>
                     <div class="tc_box_wrapper">
                        <div class="tc_box">

                            <div class="header">
                               <label for="commission{{$cnts}}">Commission</label>
                                <!-- <a href="javascript:;" id="tncEdit">Edit</a> -->
                            </div>

                            <div class="body">
                                {{-- <span class="hotelDatesInOutCls">8% plus VAT</span> --}}
                                        <select name="dates_edit[{{ $value->id }}][commission_id]" class="form-control selectCls notClickedCls " >
                                            <?php
                                            foreach ($CommissionList as $keyCom => $valueCom) { 
                                                $selected = '';
                                                if(!empty($value->commission_id) && ($value->commission_id == $valueCom->id)){
                                                    $selected = 'selected';
                                                }
                                                ?>
                                                <option value="{{ $valueCom->id }}" {{ $selected }}>{{ $valueCom->name }}</option>
                                            <?php } ?>
                                        </select>
                            </div>
                                

                        </div>

                    </div>
                    <div class="tc_box_wrapper">
                        <div class="tc_box">

                            <div class="header">
                               <label for="meal{{$cnts}}">Meal Basis</label>
                                <!-- <a href="javascript:;" id="tncEdit">Edit</a> -->
                            </div>

                            <div class="body">
                               {{-- <span class="hotelDatesInOutCls"><b>DBB</b></span> --}}
                                        <select name="dates_edit[{{ $value->id }}][meal_basic_id]"  class="notClickedCls form-control selectCls" >
                                            <?php foreach ($MealBasicList as $keyMeal => $valueMeal) {
                                                $selected = '';
                                                if(!empty($value->meal_basic_id) && ($value->meal_basic_id == $valueMeal->id)){
                                                    $selected = 'selected';
                                                } ?>
                                                <option value="{{ $valueMeal->id }}" {{ $selected }}>{{ $valueMeal->name }}</option>
                                            <?php } ?>

                                        </select>
                            </div>
                                

                        </div>

                    </div>
                    <div class="tc_box_wrapper">
                        <div class="tc_box">

                            <div class="header">
                                Hotel Contract
                                <!-- <a href="javascript:;" id="tncEdit">Edit</a> -->
                            </div>

                            <div class="body" >
                                 <span class="hotelDatesInOutCls"><?php echo !empty($value->contract) ? '<i class="fas fa-file-pdf yellowClrCls"></i> <a target="_blank" href="'.asset('storage/'.$value->contract).'" class="notClickedCls"><b style="color:#FCA311;">View file</b></a>' : 'No Contract Uploaded'; ?></span>
                                <input type="file" name="dates_edit[{{ $value->id }}][contract]" class="hdioCls form-control notClickedCls" accept=".pdf,image/*">
                            </div>
                                

                            </div>

                    </div>
                    <div class="tc_box_wrapper">
                        <div class="tc_box">

                            <div class="header">
                                Veenus Contract
                                <!-- <a href="javascript:;" id="tncEdit">Edit</a> -->
                            </div>

                            <div class="body">
                                <span class="hotelDatesInOutCls"><?php echo !empty($value->veenus_contract) ? '<i class="fas fa-file-pdf yellowClrCls"></i> <a target="_blank" href="'.asset('storage/'.$value->veenus_contract).'" class="notClickedCls"><b style="color:#FCA311;">View file</b></a>' : 'No Contract Uploaded'; ?></span>
                                <input type="file" name="dates_edit[{{ $value->id }}][veenus_contract]" class="hdioCls form-control notClickedCls" accept=".pdf,image/*">
                            </div>
                                

                        </div>

                    </div>
                    <?php /* <div class="tc_box_wrapper">
                        <div class="tc_box">

                            <div class="header">
                                Hotel Confirmation Template 

                                <a href="javascript:;" exp_date_id="{{$experienceDate->id}}" exp_id="{{$experience->id}}"  id="HtlConfrmTemplate">Add  Hotel Confirmation Template </a>
                            </div>
                            <br/>
                        </div>
                    </div>
                     */?>
                    
                    

                </div>
                <div class="signatures">
                <?php if(!empty($_GET['contracts'])){ ?> 
                                                 
                                <div class="signature_column ">

                           
                            <p>We agree that the booking details are correct and are subject to the terms and conditions which are available upto request.</p>
                                            <p>Hotel Signature <span style="border-bottom: 1px solid #000; "><?php echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'; ?></span> <!-- <input name="hotel_sign" type="text"> --> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Print Name  <span style="border-bottom: 1px solid #000;"><?php echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'; ?><!-- <input name="print_name" type="text"> --></p>
                                            <p>Please confirm that you are holding the above accommodation by returning a signed copy of this document. If no confirmation is received within 72 hours, we shall assume you are holding this allocation.</p>

                    </div>
                <?php } ?>
                </div>
                <div class="signatures">
                    <?php if(!empty($_GET['contracts'])){ ?> 
                                                 
                              
                     <div class="signature_column with_box">

                            <div class="heading">
                                Signature
                            </div>

                            <select name="sign_name_etc" id="sign_name" class="form-control text_change" required="">
                                <option value="">--</option>
                                <?php if(!empty($signature_list)) {
                                    foreach($signature_list as $srow)
                                    {

                                        ?>
                                        <option value="{{$srow->name}}">{{$srow->name}} ({{$srow->description}})</option>
                                        <?php
                                    }
                                }?>
                                
                                <!-- <option value="Ranjiv Bhalla">Ranjiv Bhalla</option>
                                <option value="Gurpreet Kalsi">Gurpreet Kalsi</option> -->
                            </select>

                    </div>
                    <?php } ?>
                    <?php if(isset($experienceDate->sign_name_hc) && !empty($experienceDate->sign_name_hc)){ ?>
                        <!-- <div class="signature_column">

                            <div class="heading">
                                <?php echo $experienceDate->sign_name_hc; ?>
                            </div>

                            <p>
                                <?php echo $experienceDate->sign_name_hc; ?><br>
                                <?php if($experienceDate->sign_name_hc == 'Grace Selby'){
                                    echo 'Experience Cooridnator';
                                }elseif($experienceDate->sign_name_hc == 'Ranjiv Bhalla'){
                                    echo 'Director';
                                }elseif($experienceDate->sign_name_hc == 'Gurpreet Kalsi'){
                                    echo 'Senior Experience Designer';
                                }
                                ?>
                                
                            </p>

                        </div> -->
                    <?php }else{ ?>
                        <!-- <div class="signature_column with_box">

                            <div class="heading">
                                Signature
                            </div>

                            <select name="sign_name_hc" id="sign_name_hc" class="form-control" required="">
                                <option value="">--</option>
                                <option value="Grace Selby">Grace Selby</option>
                                <option value="Ranjiv Bhalla">Ranjiv Bhalla</option>
                                <option value="Gurpreet Kalsi">Gurpreet Kalsi</option>
                            </select>

                        </div> -->
                    <?php } ?>

                </div>
                <!-- <div class="ctas">
                    <input type="hidden" name="hotel_id" value="{{$hotel_id}}">
                    <input type="hidden" name="exp_id" value="{{!empty($experience->id)?$experience->id:''}}">
                    <input type="hidden" name="exp_date_id" value="{{!empty($experienceDate->id)?$experienceDate->id:''}}">
                    <input type="submit" name="submit" value="Save all changes" class="yellowClrBtn editsaveAllChangesBtn border-0" >
                </div>
                </form> -->
            </div>

        </div>
    </div>
</div>
<?php } ?>
<div id="tobeprinted" style="display:none;"></div>

</div><!-- end modal body -->
<div class="modal-footer displayInitialCls">
        <input type="hidden" value="<?=isset($is_hotel_assieged)?$is_hotel_assieged:''?>" name="changed_dates" id="changed_dates">
         <textarea style="visibility: hidden;" value="" name="changed_note" id="changed_note"></textarea>
        <input type="hidden" value="" name="is_changed" id="is_changed">
        <input type="hidden" value="" name="is_resign" id="is_resign">
        <input type="hidden" name="display_euro_rate" id="display_euro_rate" value="">
        <input type="hidden" name="hotel_id" value="{{$hotel_id}}">
        <input type="hidden" name="exp_id" value="{{!empty($experience->id)?$experience->id:''}}">
        <input type="hidden" name="exp_date_id" value="{{!empty($exp_date_id)?$exp_date_id:''}}">
        <input type="hidden" value="<?=$cart_id?>" name="cart_id" id="cart_id">
        <input type="hidden" value="<?=$hotel_book_date_id?>" name="hotel_book_date_id" id="hotel_book_date_id">
        <input type="hidden" name="market_option" id="market_option" value="<?=(!empty($market_option_selected))?$market_option_selected:'0'?>">
        <!-- <button type="button" class="btn btn-secondary cancel float-left hotelFooteCloseCls" data-dismiss="modal" style="margin-left: 10px;">Close</button> -->
        {{-- <a class="yellowClrBtn editsaveAllChangesBtn" href="javascript:;" data-dismiss="modal">Save all changes</a> --}}
        <?php if(!empty($_GET['contracts'])){ ?> 
            <input type="hidden" name="contract" value="1">
            <input type="hidden" name="contract_save" id="contract_save" value="">
            
            <input type="button" name="submit" value="Download Contract" id="download_contract" class="yellowClrBtn editsaveAllChangesBtn border-0" >
        <?php } else { ?> 
        <input type="submit" name="submit" value="Save all changes" class="yellowClrBtn editsaveAllChangesBtn border-0" >
        <?php } ?>
    </div>
   
{!! Form::close() !!}

  <!-- Modal -->
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
<script src="{{ asset('js/pages/stocklist-hotel.js') }}"></script>
<script type="text/javascript">
     function onlyNumberKey(evt) {
        
        // Only ASCII character in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
    }
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
    /*rules: {
        'product_name': {
            required: true,
        },
    },
    messages: {
        'step1[experience_categories_ids][]': {
            required: "Please select category",
        },
    },*/
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
    
    $(document).on('click', '#download_contract', function(e) {
        e.preventDefault();
        $('#contract_save').val('1');
        var formData = $("#stocklistHotelDatesEditForm").serialize();
        $('.loader').show();   
        $.ajax({
            url: base_url+'/super-user/stocklist-hotel-dates-update-contract',
            type: 'POST',
            data: {'formData':formData},
            success: function(data) {
                $('#contract_save').val('');
                var formData1 = $("#stocklistHotelDatesEditForm").serialize();
                toastSuccess('Save successfully.');
                $.ajax({
                    url: base_url+'/super-user/stocklist-hotel-dates-update-contract',
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
            $('.euro_colunm'+cnt).hide();
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


   
    <?php if(!empty($display_euro_rate)){ ?> 
        //$('.euro_colunm').show();
        $('#display_euro_rate').val("1");
            $('#add_euro').val("Remove Euro");
    <?php } else { ?> 
        //$('.euro_colunm').hide();
        $('#display_euro_rate').val("0");
            $('#add_euro').val("Add Euro");
    <?php } ?>
    $(document).on('click', '#add_euro', function(e) {
       
        $('.euro_colunm').toggle();
        if($('.euro_colunm').css('display') == 'none')
        {
            $('#display_euro_rate').val("0");
            $('#add_euro').val("Add Euro");
        }
        else
        {
            $('#display_euro_rate').val("1");
            $('#add_euro').val("Remove Euro");
        }
    });
    $(document).on('click', '.add_euro', function(e) {
       var cnt = $(this).attr('data-cnt');
        $('.euro_colunm'+cnt).toggle();
        if($('.euro_colunm'+cnt).css('display') == 'none')
        {
            $('#displayeuro'+cnt).val("0");
             $('#add_euro'+cnt).val("Add Euro");
        }
        else
        {
            $('#displayeuro'+cnt).val("1");
           $('#add_euro'+cnt).val("Remove Euro");
        }
    });
    $(document).on('change', '#select_market_option', function(e) {
       
       var display_value = $(this).val();
       if(display_value == 1)
       {
            $('.pound_colunm_out').show();
            $('.euro_colunm_out').hide();
           /* $('.pound_colunm').show();
            $('.euro_colunm').hide();*/
            $('#market_option').val("1");
       }
       else if(display_value == 2)
       {
            $('.pound_colunm_out').hide();
            $('.euro_colunm_out').show();
            /*$('.pound_colunm').hide();
            $('.euro_colunm').show();*/
            $('#market_option').val("2");
       }
       else
       {
            $('.pound_colunm_out').show();
            $('.euro_colunm_out').show();
           /* $('.pound_colunm').show();
            $('.euro_colunm').show();*/
            $('#market_option').val("3");
       }
    });
</script>
@endsection