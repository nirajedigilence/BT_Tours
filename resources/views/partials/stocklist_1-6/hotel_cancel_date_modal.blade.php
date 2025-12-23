    <div class="modal-header">
        <div class="row">
            <div class="col-sm-12">
                <h5 class="modal-title" id="exampleModalLongTitle"><b>Cancel Dates - {{ $hotelList->name }}</b></h5>
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
    <input type="hidden" name="hotel_id" class="hotel_id" value="{{ $hotel_id }}" placeholder="">
    <input type="hidden" id="hotelEmail" value="{{ $hotelList->email }}">
    <div class="modal-body" >
        <div class="hotelDatesAppendCls">
             <?php 
            $cnts = 110;

            foreach ($hotelDateArray as $key => $value) { ?>
                 <?php 
                            $hotel_book_date_id = $value->id;
                            $hotel_cart_list =  


DB::connection('mysql_veenus')->table('experiences_to_hotels_to_experience_dates')->selectRaw('ex.id,c.id as cart_id,c.signed_document,experiences_to_hotels_to_experience_dates.experience_dates_id')
                           /* ->leftjoin('experiences_to_hotels as ex', 'ex.id', '=', 'experiences_to_hotels_to_experience_dates.experiences_to_hotels_id')*/
                            ->leftjoin('experience_dates as ex', 'ex.id', '=', 'experiences_to_hotels_to_experience_dates.experience_dates_id')
                            /*->leftjoin('experience_dates as ex', 'ex.id', '=', 'experiences_to_hotels_to_experience_dates.experience_dates_id')*/
                           /* ->join('cart_experiences as c', function($join)
                                {
                                    $join->on('c.experiences_id', '=', 'ex.experiences_id');
                                    $join->where('c.date_from',$value->date_in);
                                    $join->where('c.date_from',$value->date_out);
                                })*/
                            ->leftjoin('cart_experiences as c', 'c.dates_rates_id', '=', 'ex.dates_rates_id')
                            /*->leftjoin('cart_experiences_to_tour_statuses as cs', 'cs.cart_experiences_id', '=', 'c.id')*/
                            ->where('experiences_to_hotels_to_experience_dates.hotel_dates_id', $hotel_book_date_id)
                            ->where('experiences_to_hotels_to_experience_dates.deleted_at', NULL)
                            ->where('c.completed','!=','1')

                            ->where('c.date_from',$value->date_in)
                            ->where('c.date_to',$value->date_out)
                            ->where('c.full_cancel','0')
                            /*->where('cs.tour_statuses_id', '1')->where('cs.sign_name','!=', null)*/->orderBy('experiences_to_hotels_to_experience_dates.id','desc')->get()->toArray();
                            $activeCls = '';
                            $booked_dates = 


DB::connection('mysql_veenus')->table('experiences_to_hotels_to_experience_dates')->selectRaw('group_concat(DISTINCT e.tour_id) as tour_id,group_concat(DISTINCT e.id) as exp_id,group_concat(DISTINCT ed.id) as experience_dates_id,group_concat(concat(ed.id,"_",ed.deleted_at)) as experience_deleted_at')->join('experience_dates as ed', 'ed.id', '=', 'experiences_to_hotels_to_experience_dates.experience_dates_id')->leftjoin('experiences as e', 'e.id', '=', 'ed.experiences_id')->where([
                                    ['experiences_to_hotels_to_experience_dates.hotel_dates_id', '=', $hotel_book_date_id],['experiences_to_hotels_to_experience_dates.active', '=', 1]],['ed.deleted_at', '=', NULL])->get()->toArray();
                            
                            if(!empty($booked_dates) && !empty($booked_dates[0]->tour_id) > 0){
                                $tour_id =  explode(',',$booked_dates[0]->tour_id);
                                $exp_id =  explode(',',$booked_dates[0]->exp_id);
                                $experience_dates_id =  !empty($booked_dates[0]->experience_dates_id)?explode(',',$booked_dates[0]->experience_dates_id):array();
                                   
                                $experience_deleted_at =  !empty($booked_dates[0]->experience_deleted_at)?explode(',',$booked_dates[0]->experience_deleted_at):array();
                                       /* pr($booked_dates);
                                 echo count($experience_dates_id);
                                 echo count($experience_deleted_at);  */                       
                                if(count($experience_dates_id) != count($experience_deleted_at))
                                {   $activeCls = 'assigned';
                                    $deleted_at = explode('_',$booked_dates[0]->experience_deleted_at);
                                
                                     $hotel_book_list =  


DB::connection('mysql_veenus')->table('experiences_to_hotels_to_experience_dates')->selectRaw('experiences_to_hotels_to_experience_dates.experience_dates_id,ed.experiences_id as exp_id,ex.hotels_id')
                                    ->leftjoin('experiences_to_hotels as ex', 'ex.id', '=', 'experiences_to_hotels_to_experience_dates.experiences_to_hotels_id')
                                    ->leftjoin('experience_dates as ed', 'ed.id', '=', 'experiences_to_hotels_to_experience_dates.experience_dates_id')

                                    ->where('experiences_to_hotels_to_experience_dates.hotel_dates_id', $hotel_book_date_id)
                                     ->where('ed.deleted_at', NULL)
                                     ->orderBy('experiences_to_hotels_to_experience_dates.id','desc')
                                   ->get()->toArray();
                                    $experience_dates_id = !empty($hotel_book_list[0]->experience_dates_id)?$hotel_book_list[0]->experience_dates_id:'';
                                    
                                    if(!empty($experience_dates_id))
                                    {
                                        $doc_completed = array();
                                    
                                        $doc_completed = 


DB::connection('mysql_veenus')->table('experience_dates')->selectRaw('experience_dates.id,experience_dates.mark_as_completed,experience_dates.dates_rates_id')
                                                                ->where('experience_dates.id', $experience_dates_id)
                                                                //->where('experience_dates.mark_as_completed','1')
                                                                ->get()->toArray();
                                        //pr($doc_completed);                                                        
                                        if(!empty($doc_completed))
                                        {
                                            $doc_completed_etc = 


DB::connection('mysql_veenus')->table('experience_dates_rates')->selectRaw('experience_dates_rates.id,experience_dates_rates.mark_as_completed_etc')
                                                                ->where('experience_dates_rates.id', $doc_completed[0]->dates_rates_id)
                                                                ->get()->toArray();
                                            //pr($doc_completed_etc);                                                        
                                        }
                                         }   
                                }                                                    
                            }
                            
                             ?>
                <div class="hotelDatesMainCls1 box editCls" data-id="{{$value->id}}">
                    {{-- {{ convert2DMY($value->date_out)}} --}}
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="DateIn{{$cnts}}">Date In</label>
                                        <span class="hotelDatesInOutCls"><b>{{ convert2DMYForHotelDates($value->date_in) }}</b></span>
                                        <input type="date" class="notClickedCls dateChangeCls form-control dateInCls{{$cnts}} hdioCls" name="dates_edit[{{ $value->id }}][date_in]" id="DateIn{{$cnts}}" placeholder="Date In" value="{{ $value->date_in }}" required="" data-id="{{$cnts}}" style="font-size: 0.80rem;padding: 5px;">
                                        <input type="hidden" class="" name="dates_edit[{{ $value->id }}][id]" id="DateId{{$cnts}}"  value="{{ $value->id }}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="DateOut{{$cnts}}">Date Out</label>
                                        <span class="hotelDatesInOutCls"><b>{{ convert2DMYForHotelDates($value->date_out) }}</b></span>
                                        <input type="date" class="notClickedCls dateChangeCls hdioCls dateOutCls{{$cnts}} form-control" name="dates_edit[{{ $value->id }}][date_out]" id="DateOut{{$cnts}}" placeholder="Date Out" value="{{ $value->date_out }}" required data-id="{{$cnts}}" style="font-size: 0.80rem;padding: 5px;">
                                    </div>
                                </div>
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
                                        <label for="Nights{{$cnts}}">Nights</label>
                                        <span class="hotelDatesInOutCls"><?=!empty($value->night)?'<b>'.$value->night.'</b>':'0';?></span>
                                        <input type="text" class="notClickedCls hdioCls form-control nightCls" name="dates_edit[{{ $value->id }}][night]" id="Nights{{$cnts}}" placeholder="Nights" value="{{ $value->night }}" readonly="" required>
                                    </div>
                                </div>
                                <div class="col center">
                                    <div class="form-group">
                                        <label for="Sgl{{$cnts}}">Sgl</label>
                                        <span class="hotelDatesInOutCls"><?=!empty($value->sgl)?'<b>'.$value->sgl.'</b>':'0';?></span>
                                        <input type="text" class="notClickedCls hdioCls form-control numbercls" id="Sgl{{$cnts}}" placeholder="Sgl" value="{{ $value->sgl }}" name="dates_edit[{{ $value->id }}][sgl]" >
                                    </div>
                                </div>
                                <div class="col center">
                                    <div class="form-group">
                                        <label for="Dbl{{$cnts}}">Dbl</label>
                                        <span class="hotelDatesInOutCls"><?=!empty($value->dbl)?'<b>'.$value->dbl.'</b>':'0';?></span>
                                        <input type="text" class="notClickedCls hdioCls form-control numbercls" id="Dbl{{$cnts}}" placeholder="Dbl" value="{{ $value->dbl }}" name="dates_edit[{{ $value->id }}][dbl]" >
                                    </div>
                                </div>
                                <div class="col center">
                                    <div class="form-group">
                                        <label for="Twn{{$cnts}}">Twn</label>
                                        <span class="hotelDatesInOutCls"><?=!empty($value->twn)?'<b>'.$value->twn.'</b>':'0';?></span>
                                        <input type="text" class="notClickedCls hdioCls form-control numbercls" id="Twn{{$cnts}}" placeholder="Twn" value="{{ $value->twn }}" name="dates_edit[{{ $value->id }}][twn]" >
                                    </div>
                                </div>
                                <div class="col center">
                                    <div class="form-group">
                                        <label for="Trp{{$cnts}}">Trp</label>
                                        <span class="hotelDatesInOutCls"><?=!empty($value->trp)?'<b>'.$value->trp.'</b>':'0';?></span>
                                        <input type="text" class="notClickedCls hdioCls form-control numbercls" id="Trp{{$cnts}}" placeholder="Trp" value="{{ $value->trp }}" name="dates_edit[{{ $value->id }}][trp]" >
                                    </div>
                                </div>
                                <div class="col center">
                                    <div class="form-group">
                                        <label for="Qrd{{$cnts}}">Qrd</label>
                                        <span class="hotelDatesInOutCls"><?=!empty($value->qrd)?'<b>'.$value->qrd.'</b>':'0';?></span>
                                        <input type="text" class="notClickedCls hdioCls form-control numbercls" id="Qrd{{$cnts}}" placeholder="Qrd" value="{{ $value->qrd }}" name="dates_edit[{{ $value->id }}][qrd]" >
                                    </div>
                                </div>
                                <div class="col center">
                                    <div class="form-group">
                                        <label for="SglDr{{$cnts}}">Sgl(Dr)</label>
                                        <span class="hotelDatesInOutCls"><?=!empty($value->sgl_dr)?'<b>'.$value->sgl_dr.'</b>':'0';?></span>
                                        <input type="text" class="notClickedCls hdioCls form-control numbercls" id="SglDr{{$cnts}}" placeholder="Sgl(Dr)" value="{{ $value->sgl_dr }}" name="dates_edit[{{ $value->id }}][sgl_dr]" >
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
                                        <!-- <a class="marginTop15 clearBothCls float-left dis-label <?=(!empty($doc_completed) && !empty($doc_completed[0]->mark_as_completed) && !empty($doc_completed_etc) && !empty($doc_completed_etc[0]->mark_as_completed_etc))?'green-active':''?> editDocument" data-id="{{ !empty($hotel_book_list[0]->exp_id)?$hotel_book_list[0]->exp_id:'' }}" href="javascript:;"><?=(!empty($doc_completed) && !empty($doc_completed[0]->mark_as_completed) && !empty($doc_completed_etc) && !empty($doc_completed_etc[0]->mark_as_completed_etc))?'Document Completed':'Document Not Completed'?></a> -->

                                        <a target="_blank" class="marginTop15 clearBothCls float-left dis-label <?=(!empty($doc_completed) && !empty($doc_completed[0]->mark_as_completed) && !empty($doc_completed_etc) && !empty($doc_completed_etc[0]->mark_as_completed_etc))?'green-active':''?> " data-id="{{ !empty($hotel_book_list[0]->exp_id)?$hotel_book_list[0]->exp_id:'' }}" href="<?php echo 'tours/show/'; ?>{{ !empty($tour_id[0])?$tour_id[0]:'' }}/{{ !empty($exp_id[0])?$exp_id[0]:'' }}"><?=(!empty($doc_completed) && !empty($doc_completed[0]->mark_as_completed) && !empty($doc_completed_etc) && !empty($doc_completed_etc[0]->mark_as_completed_etc))?'Document Completed':'Document Not Completed'?></a>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col" style="padding: 2px !important;margin-left: 18px;">
                                    <div class="form-group">
                                          <?php if(!empty($hotel_cart_list[0]->cart_id)){ ?> 
                                             <a data-id="<?=!empty($hotel_cart_list[0]->cart_id)?$hotel_cart_list[0]->cart_id:''?>" class="marginTop15 clearBothCls float-left dis-label tourOverviewButton" href="javascript:;"><?=!empty($hotel_cart_list[0]->cart_id)?'Booked':'Unbooked'?></a>
                                            
                                        <?php } else { ?> 
                                       <label class="al-label">Unbooked</label>
                                        <?php } ?>
                                        
                                    </div>
                                </div>
                                <div class="col" style="padding: 2px !important;">
                                    <div class="form-group">
                                        <!-- <a class="yellowClrBtn marginTop15 clearBothCls float-left " href="javascript:;">Edit</a> -->
                                        <?php if(empty($hotel_cart_list[0]->cart_id)) { ?>
                                        <a data-id="{{$value->id}}" class="yellowClrBtn marginTop15 saveAllChangesBtn cancelSelectedDate" href="javascript:;">Cancel</a>
                                        <?php } else { ?> 
                                            <a data-id="{{$value->id}}" class="yellowClrBtn marginTop15 saveAllChangesBtn cancelBookedDate" href="javascript:;">Cancel</a>
                                        <?php } ?>
                                        
                                       <!--  <a href="javascript:;" class="yellowClrBtn marginTop15 clearBothCls float-left  edit-new notClickedCls editDatesBtn <?=!empty($hotel_cart_list)?'booked_date':''?>" data-hotel-id="{{ $hotel_id }}" data-date-id="{{$hotel_book_date_id}}" >
                                        Edit
                                    </a> -->
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                       
                    </div>
                </div>
            <?php
            $cnts++; 
             } ?>
            
        </div>
        
    </div>
    <div class="modal-footer displayInitialCls">
        <button type="button" class="btn btn-secondary cancel float-left hotelFooteCloseCls" data-dismiss="modal" style="margin-left: 10px;">Close</button>
        <!-- <a class="yellowClrBtn saveAllChangesBtn cancelSelected" href="javascript:;">Cancel Selected</a> -->
    </div>
