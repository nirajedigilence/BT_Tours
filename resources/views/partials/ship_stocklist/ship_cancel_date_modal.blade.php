    <div class="modal-header">
        <div class="row">
            <div class="col-sm-12">
                <h5 class="modal-title" id="exampleModalLongTitle"><b>Cancel Dates - {{ $shipList->name }}</b></h5>
            </div>
            <div class="col-sm-12">
                <p>Select a date you would like to remove.</p>
            </div>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
   <style type="text/css">
        .pointerNone{pointer-events: none;}
        .dis-label {
            border: 1px solid;
            color: black;
            font-weight: 700;
            padding: 8px 1px;
            width: 100%;
            text-align: center;
            font-size: 10px;
            border-radius: 8px;
        }
        .edit-new {
            width: 41% !important;
            padding: 8px !important;
            margin-left: 22px;
            font-size: 11px;
        }
        .pl-label {
                font-weight: 700;
                padding: 8px 1px;
                width: 100%;
                text-align: center;
                font-size: 10px !important;
                vertical-align: middle;
                margin-top: 13px;
        }
        .al-label {
                color: #00000 !important;
                font-weight: 700;
                padding: 8px 1px;
                width: 100%;
                text-align: center;
                font-size: 10px !important;
                vertical-align: middle;
                margin-top: 13px;
        }
        
        .green-active {
            color: green !important;
            border-color: green !important;
        }
        .center{text-align: center !important;}
    </style>
    <input type="hidden" name="ship_id" class="ship_id" value="{{ $ship_id }}" placeholder="">
    <input type="hidden" id="hotelEmail" value="{{ $shipList->email }}">
    <div class="modal-body" >
        <div class="hotelDatesAppendCls">
            <?php 
            $cnts = 110;

            foreach ($shipDateArray as $key => $value) { ?>
                 <?php 
                            $hotel_book_date_id = $value->id;
                            $activeCls = '';
                             ?>
                <div class="hotelDatesMainCls box editCls openBookingDate" data-date-id="{{ $hotel_book_date_id}}" data-hotel-id="{{ $ship_id}}" data-id="{{$cnts}}" data-cart_id="<?=!empty($hotel_cart_list[0]->cart_id)?$hotel_cart_list[0]->cart_id:''?>">
                    {{-- {{ convert2DMY($value->date_out)}} --}}
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label for="DateIn{{$cnts}}">ID</label>
                                        <span class="hotelDatesInOutCls"><b>{{ $value->id }}</b></span>
                                        <input type="date" class="notClickedCls dateChangeCls form-control dateInCls{{$cnts}} hdioCls" name="dates_edit[{{ $value->id }}][date_in]" id="DateIn{{$cnts}}" placeholder="Date In" value="{{ $value->date_in }}" required="" data-id="{{$cnts}}" style="font-size: 0.80rem;padding: 5px;">
                                        <input type="hidden" class="" name="dates_edit[{{ $value->id }}][id]" id="DateId{{$cnts}}"  value="{{ $value->id }}">
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label for="DateIn{{$cnts}}">Date In</label>
                                        <span class="hotelDatesInOutCls"><b>{{ convert2DMYForHotelDates($value->date_in) }}</b></span>
                                        <input type="date" class="notClickedCls dateChangeCls form-control dateInCls{{$cnts}} hdioCls" name="dates_edit[{{ $value->id }}][date_in]" id="DateIn{{$cnts}}" placeholder="Date In" value="{{ $value->date_in }}" required="" data-id="{{$cnts}}" style="font-size: 0.80rem;padding: 5px;">
                                        <input type="hidden" class="" name="dates_edit[{{ $value->id }}][id]" id="DateId{{$cnts}}"  value="{{ $value->id }}">
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label for="DateOut{{$cnts}}">Date Out</label>
                                        <span class="hotelDatesInOutCls"><b>{{ convert2DMYForHotelDates($value->date_out) }}</b></span>
                                        <input type="date" class="notClickedCls dateChangeCls hdioCls dateOutCls{{$cnts}} form-control" name="dates_edit[{{ $value->id }}][date_out]" id="DateOut{{$cnts}}" placeholder="Date Out" value="{{ $value->date_out }}" required data-id="{{$cnts}}" style="font-size: 0.80rem;padding: 5px;">
                                    </div>
                                </div>
                                <!-- <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="DateOut{{$cnts}}">Date Booked</label>
                                        <span class="hotelDatesInOutCls"><b><?=!empty($hotel_cart_list[0]->booked_date)?convert2DMYForHotelDates($hotel_cart_list[0]->booked_date):''?></b></span>
                                        <input type="date" class="notClickedCls dateChangeCls hdioCls dateOutCls{{$cnts}} form-control" name="dates_edit[{{ $value->id }}][date_out]" id="DateOut{{$cnts}}" placeholder="Date Out" value="{{ $value->date_out }}" required data-id="{{$cnts}}" style="font-size: 0.80rem;padding: 5px;">
                                    </div>
                                </div> -->
                            </div>
                            <script type="text/javascript">
                                $("#DateOut{{$cnts}}").blur(function () {
                                    var startDate = document.getElementById("DateIn{{$cnts}}").value;
                                    var endDate = document.getElementById("DateOut{{$cnts}}").value;
                                    if ((Date.parse(startDate) >= Date.parse(endDate))) {
                                        alert("Date out should be greater than date in");
                                        document.getElementById("DateOut{{$cnts}}").value = "";
                                    }
                                });
                            </script>
                        </div>
                        <div class="col-sm-4">
                            <div class="row">
                                <div class="col center">
                                    <div class="form-group">
                                        <label for="Nights{{$cnts}}">Embarkation</label>
                                        <span class="hotelDatesInOutCls"><?=!empty($value->embarkation)?'<b>'.$value->embarkation.'</b>':'0';?></span>
                                        <input type="text" class="notClickedCls hdioCls form-control nightCls" name="dates_edit[{{ $value->id }}][embarkation]" id="Nights{{$cnts}}" placeholder="Nights" value="{{ $value->embarkation }}" readonly="" required>
                                    </div>
                                </div>
                                <div class="col center">
                                    <div class="form-group">
                                        <label for="Sgl{{$cnts}}">Disembarkation</label>
                                        <span class="hotelDatesInOutCls"><?=!empty($value->disembarkation)?'<b>'.$value->disembarkation.'</b>':'0';?></span>
                                        <input type="text" class="notClickedCls hdioCls form-control numbercls" id="Sgl{{$cnts}}" placeholder="Sgl" value="{{ $value->disembarkation }}" name="dates_edit[{{ $value->id }}][disembarkation]" >
                                    </div>
                                </div>
                                <div class="col center">
                                    <div class="form-group">
                                        <label for="Dbl{{$cnts}}">Total Cabins</label>
                                        <span class="hotelDatesInOutCls"><?=!empty($value->total_cabin)?'<b>'.number_format($value->total_cabin,0).'</b>':'0';?></span>
                                        <input type="text" class="notClickedCls hdioCls form-control numbercls" id="Dbl{{$cnts}}" placeholder="Dbl" value="{{ $value->total_cabin }}" name="dates_edit[{{ $value->id }}][total_cabin]" >
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="row">
                               
                                <div class="col" style="padding: 2px !important;margin-left: 20px;">
                                    <div class="form-group">
                                        <?php if(empty($activeCls)){ ?> 

                                            <label class="pl-label">Document Not Assigned</label>
                                        <?php } else { ?> 
                                       
                                       
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col" style="padding: 2px !important;margin-left: 18px;">
                                    <div class="form-group">
                                          <?php if(!empty($hotel_cart_list[0]->cart_id)){ ?> 
                                            <!--  <a data-id="<?=!empty($hotel_cart_list[0]->cart_id)?$hotel_cart_list[0]->cart_id:''?>" class="marginTop15 clearBothCls float-left dis-label tourOverviewButton" href="javascript:;"><?=!empty($hotel_cart_list[0]->cart_id)?'Booked':'Unbooked'?></a> -->
                                             <a target="_blank" href="/tour-overview/{{$hotel_cart_list[0]->cart_id}}" class="marginTop15 clearBothCls float-left dis-label">
                                              <?=!empty($hotel_cart_list[0]->cart_id)?'Booked':'Unbooked'?>
                                            </a>
                                        <?php } else { ?> 
                                       <label class="al-label">Unbooked</label>
                                        <?php } ?>
                                        
                                    </div>
                                </div>
                                <div class="col" style="padding: 2px !important;">
                                    <div class="form-group">
                                       
                                        <?php if(empty($hotel_cart_list[0]->cart_id)) { ?>
                                        <a data-id="{{$value->id}}" class="yellowClrBtn marginTop15 saveAllChangesBtn cancelSelectedDate" href="javascript:;">Cancel</a>
                                        <?php } else { ?> 
                                            <a data-id="{{$value->id}}" class="yellowClrBtn marginTop15 saveAllChangesBtn cancelBookedDate" href="javascript:;">Cancel</a>
                                        <?php } ?>
                                        
                                     
                                    </div>
                                </div>
                                
                             
                            </div>
                        </div>
                      
                    </div>
                  
                </div>
            <?php
            $cnts++; 
            /*}*/
             } ?>
            
        </div>
        
    </div>
    <div class="modal-footer displayInitialCls">
        <button type="button" class="btn btn-secondary cancel float-left hotelFooteCloseCls" data-dismiss="modal" style="margin-left: 10px;">Close</button>
        <!-- <a class="yellowClrBtn saveAllChangesBtn cancelSelected" href="javascript:;">Cancel Selected</a> -->
    </div>
