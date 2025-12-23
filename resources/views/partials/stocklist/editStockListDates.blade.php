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
            
            foreach ($hotelDateArray as $key => $value) {
             ?>
              
<div class="notIndexContainer" style="padding-top:0;">
    <div class="tour_confirmation_wrapper" style="padding: 0;">
        <div class="tour_confirmation">

           <!--  <div class="logo">
                <img src="{{ asset('images/logo2x.png') }}" alt="Veenus">
            </div> -->
            <div class="tc_intro" style="margin-top: 10px;">
                <div class="heading">{{(!empty($_GET['contracts']) && !isset($_GET['new_date']))?'CONTRACT':'STOCK LIST RATES'}}</div>
            </div>

            <div class="tc_content" style="margin-top: 100px;">

                <div class="tc_boxes">
                    <?php 
                    $uri_segment_hotel_id = Request::segment(3);
                    if(!empty($_GET['contracts']) && isset($_GET['pdf'])){ ?> 
                         
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
                                        <input type="date" class="notClickedCls dateChangeCls form-control dateInCls{{$cnts}} hdioCls" name="dates_edit[{{ $value->id }}][date_in]" id="DateIn{{$cnts}}" placeholder="Date In" value="{{ (!isset($_GET['contracts']))?$value->date_in:'' }}" required="" data-id="{{$cnts}}" style="font-size: 0.80rem;padding: 5px;">
                                            <input type="hidden" class="" name="dates_edit[{{ $value->id }}][id]" id="DateId{{$cnts}}"  value="{{ $value->id }}">
                                             - 
                                             <input type="date" class="notClickedCls dateChangeCls hdioCls dateOutCls{{$cnts}} form-control" name="dates_edit[{{ $value->id }}][date_out]" id="DateOut{{$cnts}}" placeholder="Date Out" value="{{ (!isset($_GET['contracts']))?$value->date_out:'' }}" required data-id="{{$cnts}}" style="font-size: 0.80rem;padding: 5px;">
                                    </p>

                                </div>

                            </div>

                            <div class="tc_box">

                                <div class="header">
                                   No. of Nights
                                </div>

                                <div class="body">

                                    <p>
                                         <input type="text" class="notClickedCls hdioCls form-control nightCls" name="dates_edit[{{ $value->id }}][night]" id="Nights{{$cnts}}" placeholder="Nights" value="{{ (!isset($_GET['contracts']))?$value->night:'' }}" readonly="" required>
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
                                                    
                                                    $ratepp = sprintf('%0.2f',$valueq->rate_dbb); // added by niral
                                                    // $srspp = sprintf('%0.2f',$valueq->date_srs); // added by niral
                                                    $sgl_srs = sprintf('%0.2f',$valueq->sgl_srs);
                                                    $dbl_srs = sprintf('%0.2f',$valueq->dbl_srs);
                                                    $twn_srs = sprintf('%0.2f',$valueq->twn_srs);
                                                    $trp_srs = sprintf('%0.2f',$valueq->trp_srs);
                                                    $qrd_srs = sprintf('%0.2f',$valueq->qrd_srs);
                                                    $dr_srs = sprintf('%0.2f',$valueq->dr_srs);
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
                                               <input type="text" class="notClickedCls hdioCls form-control numbercls" id="RateDBB{{$cnts}}" placeholder="Sgl Rate &#163;" value="{{ !empty($value->rate_dbb)?sprintf('%0.2f',$value->rate_dbb):'' }}" name="dates_edit[{{ $value->id }}][rate_dbb]" required>

                                               
                                            </div>

                                            <div class="rt_column no-boder">
                                              <input type="text" class="notClickedCls hdioCls form-control numbercls" id="RateDBL{{$cnts}}" placeholder="Dbl Rate pppn &#163;" value="{{ sprintf('%0.2f',$value->rate_dbl) }}" name="dates_edit[{{ $value->id }}][rate_dbl]" required>
                                            </div>

                                            <div class="rt_column no-boder">
                                               <input type="text" class="notClickedCls hdioCls form-control numbercls" id="RateTWN{{$cnts}}" placeholder="Twn Rate pppn &#163;" value="{{ sprintf('%0.2f',$value->rate_twn) }}" name="dates_edit[{{ $value->id }}][rate_twn]" required>
                                            </div>

                                            <div class="rt_column no-boder">
                                                <input type="text" class="notClickedCls hdioCls form-control numbercls" id="RateTRN{{$cnts}}" placeholder="Trp Rate pppn &#163;" value="{{ sprintf('%0.2f',$value->rate_trp) }}" name="dates_edit[{{ $value->id }}][rate_trp]" required>
                                            </div>

                                            <div class="rt_column no-boder">
                                                <input type="text" class="notClickedCls hdioCls form-control numbercls" id="RateQRD{{$cnts}}" placeholder="Qrd Rate pppn &#163;" value="{{ sprintf('%0.2f',$value->rate_qrd) }}" name="dates_edit[{{ $value->id }}][rate_qrd]" required>
                                            </div>

                                            <div class="rt_column no-boder">
                                                <input type="text" class="notClickedCls hdioCls form-control numbercls" id="RateDR{{$cnts}}" placeholder="Dr Rate pppn &#163;" value="{{ sprintf('%0.2f',$value->rate_dr) }}" name="dates_edit[{{ $value->id }}][rate_dr]" required>
                                            </div> 

                                        </div>
                                         

                                        <div class="rt_row pound_colunm" <?=(!empty($hotel->preferred_currency) && ($hotel->preferred_currency == '1'))?'':'style="display:none"'?>>
                                            <div class="rt_column label">
                                                SRS pppn &#163;
                                            </div>

                                            <div class="rt_column no-boder">
                                                <?php //echo (!empty($dates_rates) ? $dates_rates->rate : ''); ?>
                                               <input type="text" class="notClickedCls hdioCls form-control numbercls" id="SRSSRS{{$cnts}}" placeholder="SRS Sgl Rate pppn &#163;" value="{{ !empty($value->date_srs)?sprintf('%0.2f',$value->date_srs):'' }}" name="dates_edit[{{ $value->id }}][date_srs]" required>

                                               
                                            </div>

                                            <div class="rt_column no-boder">
                                              <input type="text" class="notClickedCls hdioCls form-control numbercls" id="SRSDBL{{$cnts}}" placeholder="SRS Dbl Rate pppn &#163;" value="{{ sprintf('%0.2f',$value->date_srs_dbl) }}" name="dates_edit[{{ $value->id }}][date_srs_dbl]" required>
                                            </div>

                                            <div class="rt_column no-boder">
                                               <input type="text" class="notClickedCls hdioCls form-control numbercls" id="SRSTWN{{$cnts}}" placeholder="SRS Twn Rate pppn &#163;" value="{{ sprintf('%0.2f',$value->date_srs_twn) }}" name="dates_edit[{{ $value->id }}][date_srs_twn]" required>
                                            </div>

                                            <div class="rt_column no-boder">
                                                <input type="text" class="notClickedCls hdioCls form-control numbercls" id="SRSTRN{{$cnts}}" placeholder="SRS Trn Rate pppn &#163;" value="{{ sprintf('%0.2f',$value->date_srs_trp) }}" name="dates_edit[{{ $value->id }}][date_srs_trp]" required>
                                            </div>

                                            <div class="rt_column no-boder">
                                                <input type="text" class="notClickedCls hdioCls form-control numbercls" id="SRSQRD{{$cnts}}" placeholder="SRS Qrd Rate pppn &#163;" value="{{ sprintf('%0.2f',$value->date_srs_qrd) }}" name="dates_edit[{{ $value->id }}][date_srs_qrd]" required>
                                            </div>

                                            <div class="rt_column no-boder">
                                                <input type="text" class="notClickedCls hdioCls form-control numbercls" id="SRSDR{{$cnts}}" placeholder="SRS Dr Rate pppn &#163;" value="{{ sprintf('%0.2f',$value->date_srs_dr) }}" name="dates_edit[{{ $value->id }}][date_srs_dr]" required>
                                            </div> 

                                        </div>

                                        <div class="rt_row euro_colunm" <?=(!empty($hotel->preferred_currency) && ($hotel->preferred_currency == '2'))?'':'style="display:none"'?>>

                                            <div class="rt_column label">
                                                Rate pppn &#8364;
                                            </div>

                                            <div class="rt_column no-boder">
                                               <input type="text" class="notClickedCls hdioCls form-control numbercls" id="RateDBBE{{$cnts}}" placeholder="Sgl Rate pppn &#8364;" value="{{ sprintf('%0.2f',$value->rate_dbb_euro) }}" name="dates_edit[{{ $value->id }}][rate_dbb_euro]" required>
                                            </div>

                                            <div class="rt_column no-boder">
                                              <input type="text" class="notClickedCls hdioCls form-control numbercls" id="RateDBL{{$cnts}}" placeholder="Cbl Rate pppn &#8364;" value="{{  sprintf('%0.2f',$value->rate_dbl_euro)}}" name="dates_edit[{{ $value->id }}][rate_dbl_euro]" required>
                                            </div>

                                            <div class="rt_column no-boder">
                                               <input type="text" class="notClickedCls hdioCls form-control numbercls" id="RateTWNE{{$cnts}}" placeholder="Twm Rate pppn &#8364;" value="{{ sprintf('%0.2f',$value->rate_twn_euro) }}" name="dates_edit[{{ $value->id }}][rate_twn_euro]" required>
                                            </div>

                                            <div class="rt_column no-boder">
                                                <input type="text" class="notClickedCls hdioCls form-control numbercls" id="RateTRNE{{$cnts}}" placeholder="Trp Rate pppn &#8364;" value="{{ sprintf('%0.2f',$value->rate_trp_euro) }}" name="dates_edit[{{ $value->id }}][rate_trp_euro]" required>
                                            </div>

                                            <div class="rt_column no-boder">
                                                <input type="text" class="notClickedCls hdioCls form-control numbercls" id="RateQRDE{{$cnts}}" placeholder="Qrd Rate pppn &#8364;" value="{{ sprintf('%0.2f',$value->rate_qrd_euro)  }}" name="dates_edit[{{ $value->id }}][rate_qrd_euro]" required>
                                            </div>

                                            <div class="rt_column no-boder">
                                                <input type="text" class="notClickedCls hdioCls form-control numbercls" id="RateDRE{{$cnts}}" placeholder="Dr Rate pppn &#8364;" value="{{ sprintf('%0.2f',$value->rate_dr_euro) }}" name="dates_edit[{{ $value->id }}][rate_dr_euro]" required>
                                            </div> 

                                        </div>
                                         <div class="rt_row euro_colunm" <?=(!empty($hotel->preferred_currency) && ($hotel->preferred_currency == '2'))?'':'style="display:none"'?>>

                                            <div class="rt_column label">
                                                SRS pppn &#8364;
                                            </div>

                                            <div class="rt_column no-boder">
                                               <input type="text" class="notClickedCls hdioCls form-control numbercls" id="SRSSRSE{{$cnts}}" placeholder="SRS Sgl Rate pppn &#8364;" value="{{ $value->date_srs_euro }}" name="dates_edit[{{ $value->id }}][date_srs_euro]" required>

                                               
                                            </div>

                                            <div class="rt_column no-boder">
                                              <input type="text" class="notClickedCls hdioCls form-control numbercls" id="SRSDBL{{$cnts}}" placeholder="SRS Dbl Rate pppn &#8364;" value="{{ sprintf('%0.2f',$value->date_srs_dbl_euro) }}" name="dates_edit[{{ $value->id }}][date_srs_dbl_euro]" required>
                                            </div>

                                            <div class="rt_column no-boder">
                                               <input type="text" class="notClickedCls hdioCls form-control numbercls" id="SRSTWNE{{$cnts}}" placeholder="SRS Twn Rate pppn &#8364;" value="{{ sprintf('%0.2f',$value->date_srs_twn_euro)}}" name="dates_edit[{{ $value->id }}][date_srs_twn_euro]" required>
                                            </div>

                                            <div class="rt_column no-boder">
                                                <input type="text" class="notClickedCls hdioCls form-control numbercls" id="SRSTRNE{{$cnts}}" placeholder="SRS Trd Rate pppn &#8364;" value="{{  sprintf('%0.2f',$value->date_srs_trp_euro)}}" name="dates_edit[{{ $value->id }}][date_srs_trp_euro]" required>
                                            </div>

                                            <div class="rt_column no-boder">
                                                <input type="text" class="notClickedCls hdioCls form-control numbercls" id="SRSQRDE{{$cnts}}" placeholder="SRS Qrd Rate pppn &#8364;" value="{{ sprintf('%0.2f',$value->date_srs_qrd_euro)}}" name="dates_edit[{{ $value->id }}][date_srs_qrd_euro]" required>
                                            </div>

                                            <div class="rt_column no-boder">
                                                <input type="text" class="notClickedCls hdioCls form-control numbercls" id="SRSDRE{{$cnts}}" placeholder="SRS Dr Rate pppn &#8364;" value="{{ sprintf('%0.2f',$value->date_srs_dr_euro) }}" name="dates_edit[{{ $value->id }}][date_srs_dr_euro]" required>
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
                                               Rooms SRS Free
                                            </div>

                                            <div class="rt_column no-boder">
                                              
                                           <input type="text" class="notClickedCls hdioCls form-control numbercls" id="freeSRS{{$cnts}}" placeholder="" value="{{ !empty($value->free_srs)?sprintf('%0.2f',$value->free_srs,0):'' }}" name="dates_edit[{{ $value->id }}][free_srs]" required>
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
                                                    $price = isset($hotelDatesSupplements[$srchKey]['price'])?sprintf('%0.2f',$hotelDatesSupplements[$srchKey]['price']):'0';
                                                    $price_out = isset($hotelDatesSupplements[$srchKey]['price_out'])?sprintf('%0.2f',$hotelDatesSupplements[$srchKey]['price_out']):'0';
                                                    $price_euro_in = isset($hotelDatesSupplements[$srchKey]['price_euro_in'])?sprintf('%0.2f',$hotelDatesSupplements[$srchKey]['price_euro_in']):'0';
                                                    $price_euro_out = isset($hotelDatesSupplements[$srchKey]['price_euro_out'])?sprintf('%0.2f',$hotelDatesSupplements[$srchKey]['price_euro_out']):'0';
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
                                                   $price = isset($hotelDatesSupplements[$srchKey]['price'])?sprintf('%0.2f',$hotelDatesSupplements[$srchKey]['price']):'0';
                                                    $price_out = isset($hotelDatesSupplements[$srchKey]['price_out'])?sprintf('%0.2f',$hotelDatesSupplements[$srchKey]['price_out']):'0';
                                                    $price_euro_in = isset($hotelDatesSupplements[$srchKey]['price_euro_in'])?sprintf('%0.2f',$hotelDatesSupplements[$srchKey]['price_euro_in']):'0';
                                                    $price_euro_out = isset($hotelDatesSupplements[$srchKey]['price_euro_out'])?sprintf('%0.2f',$hotelDatesSupplements[$srchKey]['price_euro_out']):'0';
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
                                                    $price = isset($hotelDatesSupplements[$srchKey]['price'])?sprintf('%0.2f',$hotelDatesSupplements[$srchKey]['price']):'0';
                                                    $price_out = isset($hotelDatesSupplements[$srchKey]['price_out'])?sprintf('%0.2f',$hotelDatesSupplements[$srchKey]['price_out']):'0';
                                                    $price_euro_in = isset($hotelDatesSupplements[$srchKey]['price_euro_in'])?sprintf('%0.2f',$hotelDatesSupplements[$srchKey]['price_euro_in']):'0';
                                                    $price_euro_out = isset($hotelDatesSupplements[$srchKey]['price_euro_out'])?sprintf('%0.2f',$hotelDatesSupplements[$srchKey]['price_euro_out']):'0';
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
                                                    $price = isset($hotelDatesSupplements[$srchKey]['price'])?sprintf('%0.2f',$hotelDatesSupplements[$srchKey]['price']):'0';
                                                    $price_out = isset($hotelDatesSupplements[$srchKey]['price_out'])?sprintf('%0.2f',$hotelDatesSupplements[$srchKey]['price_out']):'0';
                                                    $price_euro_in = isset($hotelDatesSupplements[$srchKey]['price_euro_in'])?sprintf('%0.2f',$hotelDatesSupplements[$srchKey]['price_euro_in']):'0';
                                                    $price_euro_out = isset($hotelDatesSupplements[$srchKey]['price_euro_out'])?sprintf('%0.2f',$hotelDatesSupplements[$srchKey]['price_euro_out']):'0';
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
                   <div class="tc_box_wrapper hotel_template">
                        <div class="tc_box">

                            <div class="header">
                                Hotel Template 

                                
                            </div>
                            <div class="body">
                               <?php /* <a href="javascript:;" exp_date_id="{{$experienceDate->id}}" exp_id="{{$experience->id}}"  id="HtlConfrmTemplate">Add  Hotel Confirmation Template </a> */?>
                                <button type="button" class="btn btn-primary" hotel_id="{{$hotel_id}}" id="HtlGetTemplate">Import Template </a>
                                
                            </div>
                        </div>
                    </div>
                     <div class="tc_box_wrapper">
                        <div class="tc_box">

                            <div class="header">
                                Additional information 
                                <a href="javascript:;" id="ratesEdit">Edit</a>
                            </div>

                            <div class="body">
                                <textarea id="ratesField" name="ratesallocation" class="form-control" style="display: none;">{{ !empty($experienceDate->ratesallocation)?$experienceDate->ratesallocation:$value->ratesallocation }}</textarea>
                                <div id="ratesContent">
                                    {!! !empty($experienceDate->ratesallocation)?nl2br($experienceDate->ratesallocation):nl2br($value->ratesallocation) !!}
                                    
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
                                  
                                <input multiple type="file" name="dates_edit[{{ $value->id }}][contract][]" class="hdioCls form-control notClickedCls" accept=".pdf,image/*">
                                <div id="remove_contract_file"></div>
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
                                <?php 
                                if(!isset($_GET['new_date'])){ 
                                if(!empty($value->veenus_contract)){
                                        $sfiles = explode(',',$value->veenus_contract);
                                        foreach($sfiles as $fv)
                                        {
                                            if(!empty($fv)){ ?>
                                            <div>
                                            <span class="hotelDatesInOutCls">
                                                  <?php echo !empty($fv) ? '<i class="fas fa-file-pdf yellowClrCls"></i> <a target="_blank" href="'.asset('hoteldates_uploads/'.$fv).'" class="notClickedCls"><b style="color:#FCA311;">View document '.str_replace('hoteldates_uploads/','',$fv).'</b></a>' : ''; ?></span>
                                            <span class="remove_v_file" data-file="<?=$fv?>"> <i style="color: red;cursor: pointer;" class="fas fa-trash"></i> </span>
                                            </div>
                                            <?php 
                                            }
                                        }
                                    } } ?>
                                <?php /*  <span class="hotelDatesInOutCls"><?php echo !empty($value->veenus_contract) ? '<i class="fas fa-file-pdf yellowClrCls"></i> <a target="_blank" href="'.asset('storage/'.$value->veenus_contract).'" class="notClickedCls"><b style="color:#FCA311;">View document '.str_replace('hoteldates_uploads/','',$value->veenus_contract).'</b></a>' : 'No Contract Uploaded'; ?></span> */?>
                                <input multiple type="file" name="dates_edit[{{ $value->id }}][veenus_contract][]" class="hdioCls form-control notClickedCls" accept=".pdf,image/*">
                                <div id="remove_veenus_file"></div>
                            </div>
                                

                        </div>

                    </div>
                   
                    
                    
                    

                </div>
               
                   
                <div class="signatures" style="margin-top: 10px;">
                <?php if(!empty($_GET['contracts'])){ ?> 
                                                 
                                <div class="signature_column ">

                           
                            <p>We agree that the booking details are correct and are subject to the terms and conditions which are available upto request.</p>
                                            <p>Hotel Signature <span style="border-bottom: 1px solid #000; "><?php echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'; ?></span> <!-- <input name="hotel_sign" type="text"> --> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Print Name  <span style="border-bottom: 1px solid #000;"><?php echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'; ?><!-- <input name="print_name" type="text"> --></p>
                                            <p>Please confirm that you are holding the above accommodation by returning a signed copy of this document. If no confirmation is received within 72 hours, we shall assume you are holding this allocation.</p>

                    </div>
                <?php } ?>
                </div>
                <div class="signatures" style="margin-top: 10px;">
                    <?php if(isset($value->sign_name_hc) && !empty($value->sign_name_hc)  && !isset($_GET['contracts'])){ ?>
                        <?php /* <div class="signature_column">

                            <div class="heading">
                                <?php echo $value->sign_name_hc; ?>
                            </div>

                            <p>
                                <?php 
                                $signature_list1 = App\Models\Cms\SignatureName::where('status','1')->orderBy('id','DESC')->where('name',$value->sign_name_hc)->first();

                                if(!empty($signature_list1->description))
                                {
                                    echo $signature_list1->description;
                                } ?>
                                <br>
                                 <?php  echo  (!empty($value->hc_sign_date) && $value->hc_sign_date !='0000-00-00')?date('d/m/Y',strtotime($value->hc_sign_date)):date('d/m/Y',strtotime($hotelDateListsedit[0]->hc_sign_date));  ?>
                            </p>

                        </div> */?>
                        <div class="signature_column with_box">

                            <div class="heading">
                                Signature
                            </div>

                            <select name="sign_name_hc" id="sign_name" class="form-control text_change" required="">
                                <option value="">--</option>
                                <?php if(!empty($signature_list)) {
                                    foreach($signature_list as $srow)
                                    {
                                        $status = $srow->status;
                                        if((!empty($value->sign_name_hc) && $value->sign_name_hc == $srow->name))
                                        {
                                            $status = 1;
                                        }
                                        if($status == 1){
                                        ?>
                                        <option <?=(!empty($value->sign_name_hc) && $value->sign_name_hc == $srow->name)?'selected="selected"':''?> value="{{$srow->name}}">{{$srow->name}} ({{$srow->description}})</option>

                                        <?php
                                        }
                                    }
                                }?>
                                
                                <!-- <option value="Ranjiv Bhalla">Ranjiv Bhalla</option>
                                <option value="Gurpreet Kalsi">Gurpreet Kalsi</option> -->
                            </select>
                            <br/>
                            <input type="date" name="hc_sign_date" value="{{$value->hc_sign_date}}" id="hc_sign_date" class="form-control text_change" style="width: 70%;">
                    </div>
                    <?php } else { ?>
                    <div style="clear:both;float: left;"></div>
                    <?php if(!empty($_GET['contracts']) && !isset($_GET['new_date'])){ 
                       ?> 
                                                 
                           
                     <div class="signature_column with_box">

                            <div class="heading">
                                Signature
                            </div>
                            <?php
                            $sign_name_hc = !empty($hotelDateListsedit[0]->sign_name_hc)?$hotelDateListsedit[0]->sign_name_hc:'';
                             $value->sign_name_hc = !empty($value->sign_name_hc)?$value->sign_name_hc:$sign_name_hc; ?>
                            <select name="sign_name_hc" id="sign_name" class="form-control text_change" required="">
                                <option value="">--</option>
                                <?php if(!empty($signature_list)) {
                                    foreach($signature_list as $srow)
                                    {
                                        $status = $srow->status;
                                        if((!empty($value->sign_name_hc) && $value->sign_name_hc == $srow->name))
                                        {
                                            $status = 1;
                                        }
                                        if($status == 1){
                                        ?>
                                        <option <?=(!empty($value->sign_name_hc) && $value->sign_name_hc == $srow->name)?'selected="selected"':''?> value="{{$srow->name}}">{{$srow->name}} ({{$srow->description}})</option>

                                        <?php
                                        }
                                    }
                                }?>
                                
                                <!-- <option value="Ranjiv Bhalla">Ranjiv Bhalla</option>
                                <option value="Gurpreet Kalsi">Gurpreet Kalsi</option> -->
                            </select>
                            <br/>
                              <?php
                             $hc_sign_date =  !empty($hotelDateListsedit[0]->hc_sign_date)?$hotelDateListsedit[0]->hc_sign_date:'';
                               $value->hc_sign_date = (!empty($value->hc_sign_date) && $value->hc_sign_date !='0000-00-00')?$value->hc_sign_date:$hc_sign_date;  ?>
                            <input type="date" value="" name="hc_sign_date" id="hc_sign_date" class="form-control text_change" style="width: 70%;"> 
                    </div>
                    <?php } else {
                        /*if(isset($_GET['new_date']))
                        {
                            $value->sign_name_hc = '';
                            $value->hc_sign_date = '';
                        }*/
                    ?> 

                     <div class="signature_column with_box">

                            <div class="heading">
                                Signature
                            </div>

                            <select name="sign_name_hc" id="sign_name" class="form-control text_change" required="">
                                <option value="">--</option>
                                <?php if(!empty($signature_list)) {
                                    foreach($signature_list as $srow)
                                    {

                                        $status = $srow->status;
                                        if((!empty($value->sign_name_hc) && $value->sign_name_hc == $srow->name))
                                        {
                                            $status = 1;
                                        }
                                        if($status == 1){
                                        ?>
                                        <option <?=(!empty($value->sign_name_hc) && $value->sign_name_hc == $srow->name)?'selected="selected"':''?> value="{{$srow->name}}">{{$srow->name}} ({{$srow->description}})</option>

                                        <?php
                                        }
                                    }
                                }?>
                                
                                <!-- <option value="Ranjiv Bhalla">Ranjiv Bhalla</option>
                                <option value="Gurpreet Kalsi">Gurpreet Kalsi</option> -->
                            </select>
                            <br/>
                            <input type="date" name="hc_sign_date" value="{{$value->hc_sign_date}}" id="hc_sign_date" class="form-control text_change" style="width: 70%;">
                    </div>
                    <?php } } ?>
                    
                <!-- <div class="ctas">
                    <input type="hidden" name="hotel_id" value="{{$hotel_id}}">
                    <input type="hidden" name="exp_id" value="{{!empty($experience->id)?$experience->id:''}}">
                    <input type="hidden" name="exp_date_id" value="{{!empty($experienceDate->id)?$experienceDate->id:''}}">
                    <input type="submit" name="submit" value="Save all changes" class="yellowClrBtn editsaveAllChangesBtn border-0" >
                </div>
                </form> -->
            </div>
             <?php if(empty($_GET['contracts'])){ ?> 
             <div class="section mt-5">
                    <div class="column w_100">
                        <div class="white_box">

                            <div class="heading">
                                Notes
                            </div>
                            
                           

                            <div id="notes">
                                <div id="exTab3" class="container pb-3"> 
                                    <div id="tab_id_{{ $hotel_book_date_id }}">
                                        
                                    
                                        @include ('partials.stocklist.tour_notes',[
                                            'hotel_date_id' => $hotel_book_date_id,'user_type' =>'1'
                                          ])
                                    </div>
                                  </div>
                                <!-- <div class="sub_heading">
                                    Tour Notes
                                </div> -->

                                

                            </div>

                        </div>

                    </div>
                </div>
            <?php } ?>
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
        <?php if(!isset($_GET['type'])){ ?>
        <?php if(isset($_GET['new_date'])){ ?> 
        <input type="hidden" value="<?=$new_hotel_book_date_id?>" name="hotel_book_date_id" id="hotel_book_date_id">
        <?php } else { ?>
            <input type="hidden" value="<?=$hotel_book_date_id?>" name="hotel_book_date_id" id="hotel_book_date_id">
        <?php } ?>
        <input type="hidden" name="market_option" id="market_option" value="<?=(!empty($market_option_selected))?$market_option_selected:'0'?>">
        <!-- <button type="button" class="btn btn-secondary cancel float-left hotelFooteCloseCls" data-dismiss="modal" style="margin-left: 10px;">Close</button> -->
        {{-- <a class="yellowClrBtn editsaveAllChangesBtn" href="javascript:;" data-dismiss="modal">Save all changes</a> --}}
        <?php if(!empty($_GET['contracts'])){ echo $is_edit; ?> 
            <input type="hidden" name="contract" value="1">
            <input type="hidden" name="contract_save" id="contract_save" value="">
            <input type="hidden" name="contract_add_date" id="contract_add_date" value="">
            
            <?php if(isset($_GET['pdf']) && !empty($is_edit)){ ?> 
            <input type="button" name="submit" value="Download Contract" id="download_contract" class="yellowClrBtn editsaveAllChangesBtn border-0" >
        <?php }
        else { ?> 
            <input type="button" name="submit" style="width: 200px;" value="Add dates & Download Contract" id="download_new_contract" class="yellowClrBtn editsaveAllChangesBtn border-0" >
            
        <?php } ?>
             <input type="button" name="submit" value="Add Dates to Stock List" id="add_contract" class="yellowClrBtn editsaveAllChangesBtn border-0" >
        <?php } else { ?> 
             <input type="hidden" name="contract" value="1">
            <input type="hidden" name="contract_save" id="contract_save" value="1">
            <input type="hidden" name="contract_add_date" id="contract_add_date" value="">
        <input type="submit" name="submit" value="Save all changes" class="yellowClrBtn editsaveAllChangesBtn border-0" >
        <input type="button" name="submit" value="Generate PDF" id="download_contract_edit" class="yellowClrBtn editsaveAllChangesBtn border-0" >

        <?php } ?>
        <?php } ?>
    </div>
   
{!! Form::close() !!}

  <!-- Modal -->
  <div id="fancybox_add_{{ $hotel_book_date_id }}_1" style="display: none;">

                                  
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
                                    <input type="hidden" name="hotel_book_date_id" id="hotel_book_date_id" value="{{ $hotel_book_date_id }}">
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
<script src="{{ asset('js/pages/stocklist-hotel.js') }}"></script>
<script type="text/javascript">
    <?php if(isset($_GET['type'])){ ?>
        $(document).ready(function(){
            $('input,select').attr('disabled', 'disabled');
            $('.header a').hide();
            $('.hotel_template').hide();
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
     $(document).on('click', '#download_contract_edit', function(e) {
        e.preventDefault();
        $('#contract_save').val('1');
        var formData = $("#stocklistHotelDatesEditForm").serialize();
        $('.loader').show();   
        $.ajax({
            url: base_url+'/super-user/stocklist-hotel-dates-editupdate',
            type: 'POST',
            data: {'formData':formData},
            success: function(data) {
                $('#contract_save').val('');
                var formData1 = $("#stocklistHotelDatesEditForm").serialize();
                toastSuccess('Save successfully.');
                $.ajax({
                    url: base_url+'/super-user/stocklist-hotel-dates-editupdate',
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
            url: base_url+'/super-user/stocklist-hotel-dates-adddates',
            type: 'POST',
            data: {'formData':formData},
            success: function(data) {
                $('#contract_save').val('1');
                var formData1 = $("#stocklistHotelDatesEditForm").serialize();
                toastSuccess('Add Date successfully.');
                 $.ajax({
                    url: base_url+'/super-user/stocklist-hotel-dates-editupdate',
                        type: 'POST',
                        data: {'formData':formData1},
                        
                        success: function(data) {
                            $('#contract_save').val('1');
                            var formData1 = $("#stocklistHotelDatesEditForm").serialize();
                            toastSuccess('Save successfully.');
                            $.ajax({
                                url: base_url+'/super-user/stocklist-hotel-dates-update-contract',
                                type: 'POST',
                                data: {'formData':formData1},
                                
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
        $('.loader').show();   
        $.ajax({
            url: base_url+'/super-user/stocklist-hotel-dates-adddates',
            type: 'POST',
            data: {'formData':formData},
            success: function(data) {
                $('#contract_save').val('1');
                var formData1 = $("#stocklistHotelDatesEditForm").serialize();
                toastSuccess('Save successfully.');
                 $.ajax({
                    url: base_url+'/super-user/stocklist-hotel-dates-editupdate',
                    type: 'POST',
                    data: {'formData':formData1},
                    
                    success: function(data) {
                        $('.loader').hide();  
                        var url = '<?=URL('pdf/')?>';
                        var file_url = url+'/'+data;
                        window.open(base_url+'/super-user/stocklist-hotel','_self');
                    },
                    error: function(e) {
                    }
                });  
                /*$.ajax({
                    url: base_url+'/super-user/stocklist-hotel-dates-update-contract',
                    type: 'POST',
                    data: {'formData':formData1},
                    
                    success: function(data) {
                        $('.loader').hide();  
                        var url = '<?=URL('pdf/')?>';
                        var file_url = url+'/'+data;
                        window.open(base_url+'/super-user/stocklist-hotel');
                    },
                    error: function(e) {
                    }
                });*/   
            },
            error: function(e) {
            }
        });  

        
    });
     <?php } else { ?>
        $(document).on('click', '#add_contract', function(e) {
        e.preventDefault();
        $('#contract_add_date').val('1');
        var formData = $("#stocklistHotelDatesEditForm").serialize();
        $('.loader').show();   
        $.ajax({
            url: base_url+'/super-user/stocklist-hotel-dates-adddates',
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
                        window.open(base_url+'/super-user/stocklist-hotel');
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
        var hotel_id = $(this).attr('hotel_id');
        if(confirm('Are you sure you want to import the template, this will overwrite data in the exisiting fields?'))
        {
             $('.loader').show();    
            $.ajax({
                url: base_url+'/super-user/get-hotel-detail',
                //url: base_url+'/super-user/edit-hc',
                type: 'POST',
                data: {'hotel_id':hotel_id},
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
            <?php if($hotel->preferred_currency == 2){ ?> 
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
                url: "/super-user/delete-hotel-notes",
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
        var cart_id = $('.super_add_note #hotel_book_date_id').val();
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
                url: "/super-user/insert-hotel-notes",
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
   
   
</script>
@endsection