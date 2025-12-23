{!! Form::open(array('route' => 'stocklist-hotel-dates-create','method'=>'POST', 'enctype' => 'multipart/form-data', 'class'=>'stocklistHotelDatesCreateForm', 'id'=>'stocklistHotelDatesCreateForm')) !!}      
    <div class="modal-header">
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
            font-size: 9px;
            border-radius: 8px;
        }
        .edit-new {
            width: 52% !important;
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
    <div class="modal-body" >
        <div class="row">
            <div class="col-sm-3">
                <label>Search :</label>
                <input class="form-control" type="text" name="search"  id="myInputDate" value="" onkeyup="myFunction()" >
            </div>
        </div>
        <div class="hotelDatesAppendCls">
            <?php 
            $cnts = 110;

            foreach ($hotelDateArray as $key => $value) { ?>
                 <?php 
                            $hotel_book_date_id = $value->id;
                            $hotel_cart_list =  


DB::connection('mysql_veenus')->table('experiences_to_hotels_to_experience_dates')->selectRaw('ex.id,c.id as cart_id,c.signed_document,experiences_to_hotels_to_experience_dates.experience_dates_id,c.created_at as booked_date')
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
                            //->where('experiences_to_hotels_to_experience_dates.deleted_at', NULL)
                            ->where('c.completed','!=',1)

                            ->where('ex.date_from',$value->date_in)
                            ->where('ex.date_to',$value->date_out)
                           /* ->where('c.full_cancel','0')*/
                             ->where('c.full_cancel','=',0)
                            /*->where('c.completed','!=','1')

                            ->where('c.date_from',$value->date_in)
                            ->where('c.date_to',$value->date_out)
                            ->where('c.full_cancel','0')*/
                            /*->where('cs.tour_statuses_id', '1')->where('cs.sign_name','!=', null)*/->orderBy('experiences_to_hotels_to_experience_dates.id','desc')->get()->toArray();

                            
                            $activeCls = '';
                           
                            $booked_dates = 


DB::connection('mysql_veenus')->table('experiences_to_hotels_to_experience_dates')->selectRaw('group_concat(DISTINCT e.tour_id) as tour_id,group_concat(DISTINCT e.id) as exp_id,group_concat(DISTINCT ed.id) as experience_dates_id,group_concat(concat(ed.id,"_",ed.deleted_at)) as experience_deleted_at')->join('experience_dates as ed', 'ed.id', '=', 'experiences_to_hotels_to_experience_dates.experience_dates_id')->leftjoin('experiences as e', 'e.id', '=', 'ed.experiences_id')->where([
                                    ['experiences_to_hotels_to_experience_dates.hotel_dates_id', '=', $hotel_book_date_id],['experiences_to_hotels_to_experience_dates.active', '=', 1],['experiences_to_hotels_to_experience_dates.deleted_at', '=', NULL]])->get()->toArray();

                           $booked_dates_count = 


DB::connection('mysql_veenus')->table('experiences_to_hotels_to_experience_dates')->where([
                                    ['hotel_dates_id', '=', $hotel_book_date_id],['active', '=', 1]])->count();
                          /* if(!empty($booked_dates_count))
                                {
                                     $activeCls = 'assigned';
                                }*/
                            if(!empty($booked_dates) && !empty($booked_dates[0]->tour_id) > 0){

                                $activeCls = 'assigned';
                                 
                                $tour_id =  explode(',',$booked_dates[0]->tour_id);
                                $exp_id =  explode(',',$booked_dates[0]->exp_id);
                                
                                $experience_dates_id =  !empty($booked_dates[0]->experience_dates_id)?explode(',',$booked_dates[0]->experience_dates_id):array();
                                   
                                $experience_deleted_at =  !empty($booked_dates[0]->experience_deleted_at)?explode(',',$booked_dates[0]->experience_deleted_at):array();
                                       /* pr($booked_dates);
                                 echo count($experience_dates_id);
                                 echo count($experience_deleted_at);  */                       
                                if(count($experience_dates_id) != count($experience_deleted_at))
                                { 
                                    $deleted_at = explode('_',$booked_dates[0]->experience_deleted_at);
                                
                                     $hotel_book_list =  


DB::connection('mysql_veenus')->table('experiences_to_hotels_to_experience_dates')->selectRaw('experiences_to_hotels_to_experience_dates.experience_dates_id,ed.experiences_id as exp_id,ex.hotels_id')
                                    ->leftjoin('experiences_to_hotels as ex', 'ex.id', '=', 'experiences_to_hotels_to_experience_dates.experiences_to_hotels_id')
                                    ->leftjoin('experience_dates as ed', 'ed.id', '=', 'experiences_to_hotels_to_experience_dates.experience_dates_id')

                                    ->where('experiences_to_hotels_to_experience_dates.hotel_dates_id', $hotel_book_date_id)
                                     ->where('ed.deleted_at', NULL)
                                      ->where('experiences_to_hotels_to_experience_dates.deleted_at', NULL)
                                     ->orderBy('experiences_to_hotels_to_experience_dates.id','desc')
                                   ->get()->toArray();
                                 
                                    if(!empty($hotel_book_list))
                                   {
                                    foreach($hotel_book_list as $erow)
                                    {
                                        if($exp_id[0] == $erow->exp_id)
                                        {
                                            $experience_dates_id = $erow->experience_dates_id;
                                        }
                                    }
                                   }
                                   $experience_dates_id = !empty($experience_dates_id)?$experience_dates_id:$hotel_book_list[0]->experience_dates_id;
                                    
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
                            /*if(!empty($hotel_cart_list[0]->cart_id))
                            {*/
                             ?>
                <div class="hotelDatesMainCls box editCls openBookingDate" data-date-id="{{ $hotel_book_date_id}}" data-hotel-id="{{ $hotel_id}}" data-id="{{$cnts}}" data-cart_id="<?=!empty($hotel_cart_list[0]->cart_id)?$hotel_cart_list[0]->cart_id:''?>">
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
                                        <label for="Nights{{$cnts}}">Nights</label>
                                        <span class="hotelDatesInOutCls"><?=!empty($value->night)?'<b>'.$value->night.'</b>':'0';?></span>
                                        <input type="text" class="notClickedCls hdioCls form-control nightCls" name="dates_edit[{{ $value->id }}][night]" id="Nights{{$cnts}}" placeholder="Nights" value="{{ $value->night }}" readonly="" required>
                                    </div>
                                </div>
                                <div class="col center">
                                    <div class="form-group">
                                        <label for="Sgl{{$cnts}}">Sgl</label>
                                        <span class="hotelDatesInOutCls"><?=!empty($value->sgl)?'<b>'.number_format($value->sgl,0).'</b>':'0';?></span>
                                        <input type="text" class="notClickedCls hdioCls form-control numbercls" id="Sgl{{$cnts}}" placeholder="Sgl" value="{{ $value->sgl }}" name="dates_edit[{{ $value->id }}][sgl]" >
                                    </div>
                                </div>
                                <div class="col center">
                                    <div class="form-group">
                                        <label for="Dbl{{$cnts}}">Dbl</label>
                                        <span class="hotelDatesInOutCls"><?=!empty($value->dbl)?'<b>'.number_format($value->dbl,0).'</b>':'0';?></span>
                                        <input type="text" class="notClickedCls hdioCls form-control numbercls" id="Dbl{{$cnts}}" placeholder="Dbl" value="{{ $value->dbl }}" name="dates_edit[{{ $value->id }}][dbl]" >
                                    </div>
                                </div>
                                <div class="col center">
                                    <div class="form-group">
                                        <label for="Twn{{$cnts}}">Twn</label>
                                        <span class="hotelDatesInOutCls"><?=!empty($value->twn)?'<b>'.number_format($value->twn,0).'</b>':'0';?></span>
                                        <input type="text" class="notClickedCls hdioCls form-control numbercls" id="Twn{{$cnts}}" placeholder="Twn" value="{{ $value->twn }}" name="dates_edit[{{ $value->id }}][twn]" >
                                    </div>
                                </div>
                                <div class="col center">
                                    <div class="form-group">
                                        <label for="Trp{{$cnts}}">Trp</label>
                                        <span class="hotelDatesInOutCls"><?=!empty($value->trp)?'<b>'.number_format($value->trp,0).'</b>':'0';?></span>
                                        <input type="text" class="notClickedCls hdioCls form-control numbercls" id="Trp{{$cnts}}" placeholder="Trp" value="{{ $value->trp }}" name="dates_edit[{{ $value->id }}][trp]" >
                                    </div>
                                </div>
                                <div class="col center">
                                    <div class="form-group">
                                        <label for="Qrd{{$cnts}}">Qrd</label>
                                        <span class="hotelDatesInOutCls"><?=!empty($value->qrd)?'<b>'.number_format($value->qrd,0).'</b>':'0';?></span>
                                        <input type="text" class="notClickedCls hdioCls form-control numbercls" id="Qrd{{$cnts}}" placeholder="Qrd" value="{{ $value->qrd }}" name="dates_edit[{{ $value->id }}][qrd]" >
                                    </div>
                                </div>
                                <div class="col center">
                                    <div class="form-group">
                                        <label for="SglDr{{$cnts}}">Sgl(Dr)</label>
                                        <span class="hotelDatesInOutCls"><?=!empty($value->sgl_dr)?'<b>'.number_format($value->sgl_dr,0).'</b>':'0';?></span>
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
                                       
                                        <a class="marginTop15 clearBothCls float-left dis-label" data-fancybox data-type="ajax" data-src="" href="<?php echo 'tours/show-tour-documents/'; ?>{{ !empty($hotel_book_date_id)?$hotel_book_date_id:'' }}" id="reloadInfo{{$hotel_book_date_id}}">Document Assigned</a>
                                        <!-- <a target="_blank" class="marginTop15 clearBothCls float-left dis-label <?=(!empty($doc_completed) && !empty($doc_completed[0]->mark_as_completed) && !empty($doc_completed_etc) && !empty($doc_completed_etc[0]->mark_as_completed_etc))?'green-active':''?> " data-id="{{ !empty($hotel_book_list[0]->exp_id)?$hotel_book_list[0]->exp_id:'' }}" href="<?php echo 'tours/show/'; ?>{{ !empty($tour_id[0])?$tour_id[0]:'' }}/{{ !empty($exp_id[0])?$exp_id[0]:'' }}"><?=(!empty($doc_completed) && !empty($doc_completed[0]->mark_as_completed) && !empty($doc_completed_etc) && !empty($doc_completed_etc[0]->mark_as_completed_etc))?'Document Completed':'Document Not Completed'?></a> -->
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
                                        <!-- <a class="yellowClrBtn marginTop15 clearBothCls float-left " href="javascript:;">Edit</a> -->
                                        <a class="yellowClrBtn marginTop15 clearBothCls float-left  edit-new notClickedCls <?=!empty($hotel_cart_list)?'':''?>" target="_blank" href="<?php echo 'stocklist-edit-dates/'.$hotel_book_date_id.'/'.$hotel_id; ?>" >Edit</a> 
                                        
                                       
                                       <!--  <a href="javascript:;" class="yellowClrBtn marginTop15 clearBothCls float-left  edit-new notClickedCls editDatesBtn <?=!empty($hotel_cart_list)?'booked_date':''?>" data-hotel-id="{{ $hotel_id }}" data-date-id="{{$hotel_book_date_id}}" >
                                        Edit
                                    </a> -->
                                    </div>
                                </div>
                               
                                <div class="col" style="padding: 2px !important;">
                                    <div class="form-group">
                                        <!-- <a class="yellowClrBtn marginTop15 clearBothCls float-left " href="javascript:;">Edit</a> -->
                                       
                                        <!-- <a class="yellowClrBtn marginTop15 clearBothCls float-left  edit-new notClickedCls <?=!empty($hotel_cart_list)?'':''?>" target="_blank" href="<?php echo 'stocklist-edit-dates/'.$hotel_book_date_id.'/'.$hotel_id.'?contracts=1'; ?>" >Contracts</a>  -->
                                       <!--  <a href="javascript:;" class="yellowClrBtn marginTop15 clearBothCls float-left  edit-new notClickedCls editDatesBtn <?=!empty($hotel_cart_list)?'booked_date':''?>" data-hotel-id="{{ $hotel_id }}" data-date-id="{{$hotel_book_date_id}}" >
                                        Edit
                                    </a> -->
                                    </div>
                                </div>
                             
                            </div>
                        </div>
                       <?php /* <div class="col-sm-5">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="Sgl{{$cnts}}">Sgl</label>
                                        <span class="hotelDatesInOutCls"><b>{{ $value->sgl }}</b></span>
                                        <input type="text" class="notClickedCls hdioCls form-control numbercls" id="Sgl{{$cnts}}" placeholder="Sgl" value="{{ $value->sgl }}" name="dates_edit[{{ $value->id }}][sgl]" >
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="Dbl{{$cnts}}">Dbl</label>
                                        <span class="hotelDatesInOutCls"><b>{{ $value->dbl }}</b></span>
                                        <input type="text" class="notClickedCls hdioCls form-control numbercls" id="Dbl{{$cnts}}" placeholder="Dbl" value="{{ $value->dbl }}" name="dates_edit[{{ $value->id }}][dbl]" >
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="Twn{{$cnts}}">Twn</label>
                                        <span class="hotelDatesInOutCls"><b>{{ $value->twn }}</b></span>
                                        <input type="text" class="notClickedCls hdioCls form-control numbercls" id="Twn{{$cnts}}" placeholder="Twn" value="{{ $value->twn }}" name="dates_edit[{{ $value->id }}][twn]" >
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="Trp{{$cnts}}">Trp</label>
                                        <span class="hotelDatesInOutCls">{{ $value->trp }}</span>
                                        <input type="text" class="notClickedCls hdioCls form-control numbercls" id="Trp{{$cnts}}" placeholder="Trp" value="{{ $value->trp }}" name="dates_edit[{{ $value->id }}][trp]" >
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="Qrd{{$cnts}}">Qrd</label>
                                        <span class="hotelDatesInOutCls">{{ $value->qrd }}</span>
                                        <input type="text" class="notClickedCls hdioCls form-control numbercls" id="Qrd{{$cnts}}" placeholder="Qrd" value="{{ $value->qrd }}" name="dates_edit[{{ $value->id }}][qrd]" >
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="SglDr{{$cnts}}">Sgl(Dr)</label>
                                        <span class="hotelDatesInOutCls">{{ $value->sgl_dr }}</span>
                                        <input type="text" class="notClickedCls hdioCls form-control numbercls" id="SglDr{{$cnts}}" placeholder="Sgl(Dr)" value="{{ $value->sgl_dr }}" name="dates_edit[{{ $value->id }}][sgl_dr]" >
                                    </div>
                                </div>
                                <div class="col pointerNone">
                                    <div class="form-group">
                                        <label for="meal{{$cnts}}">Meal Basis</label>
                                        {{-- <span class="hotelDatesInOutCls"><b>DBB</b></span> --}}
                                        <select name="dates_edit[{{ $value->id }}][meal_basic_id]"  class="notClickedCls form-control selectCls" >
                                            <?php foreach ($MealBasicList as $keyMeal => $valueMeal) {
                                                $selected = '';
                                                if($value->meal_basic_id == $valueMeal->id){
                                                    $selected = 'selected';
                                                } 
                                                <option value="{{ $valueMeal->id }}" {{ $selected }}>{{ $valueMeal->name }}</option>
                                            <?php } 

                                        </select>
                                    </div>
                                </div>
                            </div> <?php/*?>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="sgl_srs{{$cnts}}">Sgl SRS</label>
                                        <span class="hotelDatesInOutCls"><b>{{ $value->sgl_srs }}</b></span>
                                        <input type="text" class="notClickedCls hdioCls form-control numbercls" id="sgl_srs{{$cnts}}" placeholder="sgl srs" value="{{ $value->sgl_srs }}" name="dates_edit[{{ $value->id }}][sgl_srs]" >
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="dbl_srs{{$cnts}}">Dbl SRS</label>
                                        <span class="hotelDatesInOutCls"><b>{{ $value->dbl_srs }}</b></span>
                                        <input type="text" class="notClickedCls hdioCls form-control numbercls" id="dbl_srs{{$cnts}}" placeholder="dbl srs" value="{{ $value->dbl_srs }}" name="dates_edit[{{ $value->id }}][dbl_srs]" >
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="twn_srs{{$cnts}}">Twn SRS</label>
                                        <span class="hotelDatesInOutCls"><b>{{ $value->twn_srs }}</b></span>
                                        <input type="text" class="notClickedCls hdioCls form-control numbercls" id="twn_srs{{$cnts}}" placeholder="twn srs" value="{{ $value->twn_srs }}" name="dates_edit[{{ $value->id }}][twn_srs]" >
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="trp_srs{{$cnts}}">Trp SRS</label>
                                        <span class="hotelDatesInOutCls"><b>{{ $value->trp_srs }}</b></span>
                                        <input type="text" class="notClickedCls hdioCls form-control numbercls" id="trp_srs{{$cnts}}" placeholder="trp srs" value="{{ $value->trp_srs }}" name="dates_edit[{{ $value->id }}][trp_srs]" >
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="qrd_srs{{$cnts}}">Qrd SRS</label>
                                        <span class="hotelDatesInOutCls"><b>{{ $value->qrd_srs }}</b></span>
                                        <input type="text" class="notClickedCls hdioCls form-control numbercls" id="qrd_srs{{$cnts}}" placeholder="qrd srs" value="{{ $value->qrd_srs }}" name="dates_edit[{{ $value->id }}][qrd_srs]" >
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="dr_srs{{$cnts}}">Dr SRS</label>
                                        <span class="hotelDatesInOutCls"><b>{{ $value->dr_srs }}</b></span>
                                        <input type="text" class="notClickedCls hdioCls form-control numbercls" id="dr_srs{{$cnts}}" placeholder="dr srs" value="{{ $value->dr_srs }}" name="dates_edit[{{ $value->id }}][dr_srs]" >
                                    </div>
                                </div>
                            </div>

                        </div> */?>
                    </div>
                   <?php /* <div class="row">
                        <div class="col-sm-4 pointerNone">
                                <!-- <div class="form-group">
                                    <label for="email"><b>Inclusions</b></label>
                                </div>
                                <div class="inclusionsSections">
                                    <?php foreach ($hotelAmenitiesList as $keyAme => $valueAme) { 
                                            $checked = '';
                                        if (in_array($keyAme, $value->amenitiesDates))
                                        {
                                            $checked = 'checked';
                                        }  ?>
                                        <div class="checkarea_part_Dates">
                                            <label class="checkbox_div">
                                              <input type="checkbox" name="dates_edit[{{ $value->id }}][amenitiesIds][]" class="custom_chkbox tagchkbox notClickedCls " value="{{ $keyAme }}" data-val="Air condition" {{ $checked }}> <span class="notClickedCls ">{{ $valueAme }}</span>
                                              <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    <?php } ?>
                                </div> -->
                                <div class="form-group">
                                    <label for="email"><b>Supplements</b></label>
                                </div>
                                <div class="inclusionsSections">
                                    <div class="checkarea_part_Dates" style="width:100%;">
                                        <label class="checkbox_div">
                                            <span class="hotelDatesInOutCls" style="float: right;margin-right: 10px;">Out</span>
                                            <span class="hotelDatesInOutCls" style="float: right;margin-right: 30px;">In</span>
                                        </label>
                                    </div>
                                </div>
                                <?php
                                $hotelDatesSupplements = $value->hotelDatesSupplements;
                                $value->hotelDatesSupplements = array_column($value->hotelDatesSupplements, 'supplements');
                                $checked = '';
                                $price = '';
                                $price_out = '';
                                if(!empty($value->hotelDatesSupplements)){
                                    if (in_array(1, $value->hotelDatesSupplements))
                                    {
                                        $srchKey = array_search(1,$value->hotelDatesSupplements);
                                        $price = $hotelDatesSupplements[$srchKey]['price'];
                                        $price_out = $hotelDatesSupplements[$srchKey]['price_out'];
                                        $checked = 'checked';
                                    }  
                                }
                                ?>
                                
                                <div class="inclusionsSections">
                                    <div class="checkarea_part_Dates" style="width:100%;">
                                        <label class="checkbox_div">
                                          <input type="checkbox" name="dates_edit[{{ $value->id }}][supplements][1][name]" class="custom_chkbox tagchkbox notClickedCls " value="1" data-val="" {{ $checked }}> <span class="notClickedCls ">Water view (Sea/Lake/River) prpn</span>
                                          <span class="checkmark"></span>

                                            <span class="hotelDatesInOutCls" style="float: right;margin-right: 10px;min-width: 20px;"><b><?php echo !empty($price_out) ? '&pound;'.$price_out : '-'; ?></b></span>
                                            <span class="hotelDatesInOutCls" style="float: right;margin-right: 30px;min-width: 20px;"><b><?php echo !empty($price) ? '&pound;'.$price : '-'; ?></b></span>
                                            <input type="text" class="notClickedCls hdioCls form-control numbercls valid" placeholder="Out price" value="<?php echo $price_out; ?>" name="dates_edit[{{ $value->id }}][supplements][1][price_out]" aria-invalid="false" style="width: 60px;float: right;padding: 5px;height: 25px;margin-right: 10px;">
                                            <input type="text" class="notClickedCls hdioCls form-control numbercls valid" placeholder="In price" value="<?php echo $price; ?>" name="dates_edit[{{ $value->id }}][supplements][1][price]" aria-invalid="false" style="width: 60px;float: right;padding: 5px;height: 25px;margin-right: 30px;">
                                        </label>
                                    </div>
                                </div>
                                <?php
                                $checked = '';
                                $price = '';
                                $price_out = '';
                                if(!empty($value->hotelDatesSupplements)){
                                    if (in_array(2, $value->hotelDatesSupplements))
                                    {
                                        $srchKey = array_search(2,$value->hotelDatesSupplements);
                                        $price = $hotelDatesSupplements[$srchKey]['price'];
                                        $price_out = $hotelDatesSupplements[$srchKey]['price_out'];
                                        $checked = 'checked';
                                    }  
                                }
                                ?>
                                <div class="inclusionsSections">
                                    <div class="checkarea_part_Dates" style="width:100%;">
                                        <label class="checkbox_div">
                                          <input type="checkbox" name="dates_edit[{{ $value->id }}][supplements][2][name]" class="custom_chkbox tagchkbox notClickedCls " value="2" data-val="" {{ $checked }}> <span class="notClickedCls ">View (Garden/Balcony) prpn</span>
                                          <span class="checkmark"></span>

                                          <span class="hotelDatesInOutCls" style="min-width: 20px;float: right;margin-right: 10px;"><b><?php echo !empty($price_out) ? '&pound;'.$price_out : '-'; ?></b></span>
                                          <span class="hotelDatesInOutCls" style="min-width: 20px;float: right;margin-right: 30px;"><b><?php echo !empty($price) ? '&pound;'.$price : '-'; ?></b></span>
                                            <input type="text" class="notClickedCls hdioCls form-control numbercls valid" placeholder="Out price" value="<?php echo $price_out; ?>" name="dates_edit[{{ $value->id }}][supplements][2][price_out]" aria-invalid="false" style="width: 60px;float: right;padding: 5px;height: 25px;margin-right: 10px;">
                                            <input type="text" class="notClickedCls hdioCls form-control numbercls valid" placeholder="In price" value="<?php echo $price; ?>" name="dates_edit[{{ $value->id }}][supplements][2][price]" aria-invalid="false" style="width: 60px;float: right;padding: 5px;height: 25px;margin-right: 30px;">
                                        </label>
                                    </div>
                                </div>
                                <?php
                                $checked = '';
                                $price = '';
                                $price_out = '';
                                if(!empty($value->hotelDatesSupplements)){
                                    if (in_array(3, $value->hotelDatesSupplements))
                                    {
                                        $srchKey = array_search(3,$value->hotelDatesSupplements);
                                        $price = $hotelDatesSupplements[$srchKey]['price'];
                                        $price_out = $hotelDatesSupplements[$srchKey]['price_out'];
                                        $checked = 'checked';
                                    }  
                                }
                                ?>
                                <div class="inclusionsSections">
                                    <div class="checkarea_part_Dates" style="width:100%;">
                                        <label class="checkbox_div">
                                          <input type="checkbox" name="dates_edit[{{ $value->id }}][supplements][3][name]" class="custom_chkbox tagchkbox notClickedCls " value="3" data-val="" {{ $checked }}> <span class="notClickedCls ">Executive/De Luxe/Superior Rooms prpn</span>
                                          <span class="checkmark"></span>

                                          <span class="hotelDatesInOutCls" style="min-width: 20px;float: right;margin-right: 10px;"><b><?php echo !empty($price_out) ? '&pound;'.$price_out : '-'; ?></b></span>
                                          <span class="hotelDatesInOutCls" style="min-width: 20px;float: right;margin-right: 30px;"><b><?php echo !empty($price) ? '&pound;'.$price : '-'; ?></b></span>
                                            <input type="text" class="notClickedCls hdioCls form-control numbercls valid" placeholder="Out price" value="<?php echo $price_out; ?>" name="dates_edit[{{ $value->id }}][supplements][3][price_out]" aria-invalid="false" style="width: 60px;float: right;padding: 5px;height: 25px;margin-right: 10px;">
                                            <input type="text" class="notClickedCls hdioCls form-control numbercls valid" placeholder="In price" value="<?php echo $price; ?>" name="dates_edit[{{ $value->id }}][supplements][3][price]" aria-invalid="false" style="width: 60px;float: right;padding: 5px;height: 25px;margin-right: 30px;">

                                        </label>
                                    </div>
                                </div>
                                <?php
                                $checked = '';
                                $price = '';
                                $price_out = '';
                                if(!empty($value->hotelDatesSupplements)){
                                    if (in_array(4, $value->hotelDatesSupplements))
                                    {
                                        $srchKey = array_search(4,$value->hotelDatesSupplements);
                                        $price = $hotelDatesSupplements[$srchKey]['price'];
                                        $price_out = $hotelDatesSupplements[$srchKey]['price_out'];
                                        $checked = 'checked';
                                    }  
                                }
                                ?>
                                <div class="inclusionsSections">
                                    <div class="checkarea_part_Dates" style="width:100%;">
                                        <label class="checkbox_div">
                                          <input type="checkbox" name="dates_edit[{{ $value->id }}][supplements][4][name]" class="custom_chkbox tagchkbox notClickedCls " value="4" data-val="" {{ $checked }}> <span class="notClickedCls ">Dbl/tw room for sole pppn</span>
                                          <span class="checkmark"></span>

                                          <span class="hotelDatesInOutCls" style="min-width: 20px;float: right;margin-right: 10px;"><b><?php echo !empty($price_out) ? '&pound;'.$price_out : '-'; ?></b></span>
                                          <span class="hotelDatesInOutCls" style="min-width: 20px;float: right;margin-right: 30px;"><b><?php echo !empty($price) ? '&pound;'.$price : '-'; ?></b></span>
                                            <input type="text" class="notClickedCls hdioCls form-control numbercls valid" placeholder="Out price" value="<?php echo $price_out; ?>" name="dates_edit[{{ $value->id }}][supplements][4][price_out]" aria-invalid="false" style="width: 60px;float: right;padding: 5px;height: 25px;margin-right: 10px;">
                                            <input type="text" class="notClickedCls hdioCls form-control numbercls valid" placeholder="In price" value="<?php echo $price; ?>" name="dates_edit[{{ $value->id }}][supplements][4][price]" aria-invalid="false" style="width: 60px;float: right;padding: 5px;height: 25px;margin-right: 30px;">
                                        </label>
                                    </div>
                                </div>
                        </div>
                        <div class="col-sm-2 pointerNone">
                            <div class="form-group">
                                <label><b>Cancellation Date</b></label>
                            </div>
                            <div class="inclusionsSections">
                                <div class="checkarea_part_Dates" style="width:100%;">
                                    <label class="checkbox_div">
                                      <input type="radio" name="dates_edit[{{ $value->id }}][cancellation_days]" class="custom_chkbox tagchkbox notClickedCls " value="30" <?php echo (($value->cancellation_days == 30) ? 'checked' : ''); ?>> <span class="notClickedCls ">30</span>
                                      <span class="checkmark notClickedCls"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="inclusionsSections">
                                <div class="checkarea_part_Dates" style="width:100%;">
                                    <label class="checkbox_div">
                                      <input type="radio" name="dates_edit[{{ $value->id }}][cancellation_days]" class="custom_chkbox tagchkbox notClickedCls " value="60" <?php echo (($value->cancellation_days == 60) ? 'checked' : ''); ?>> <span class="notClickedCls ">60</span>
                                      <span class="checkmark notClickedCls"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="inclusionsSections">
                                <div class="checkarea_part_Dates" style="width:100%;">
                                    <label class="checkbox_div">
                                      <input type="radio" name="dates_edit[{{ $value->id }}][cancellation_days]" class="custom_chkbox tagchkbox notClickedCls " value="90" <?php echo (($value->cancellation_days == 90) ? 'checked' : ''); ?>> <span class="notClickedCls ">90</span>
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
                        <div class="col-sm-3 pointerNone">
                            <div class="form-group">
                                <label for="email"><b>Events</b></label>
                            </div>
                            <div class="inclusionsSections">
                                <div class="form-group">
                                    <label for="email"><b>Is this date events specific?</b></label>
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input notClickedCls eventCheckCls" type="radio" name="dates_edit[{{ $value->id }}][events]" id="inlineRadio{{$cnts}}" value="0" <?php echo $value->events == '0'?'checked':'';?> data-id="{{ $value->id }}">
                                      <label class="form-check-label notClickedCls" for="inlineRadio{{$cnts}}">No</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input notClickedCls eventCheckCls" type="radio" name="dates_edit[{{ $value->id }}][events]" id="inlineRadioYes{{$cnts}}" value="1" <?php echo $value->events == '1'?'checked':'';?> data-id="{{ $value->id }}">
                                      <label class="form-check-label notClickedCls" for="inlineRadioYes{{$cnts}}">Yes</label>
                                    </div>
                                </div>
                                <div class="form-group eventsDateCls{{ $value->id }}" style="display: <?php echo $value->events == '1'?'':'none';?>;">
                                    <label for="eventTime{{$cnts}}"><b>Event Type</b></label>
                                    <b class="hotelDatesInOutCls">{{ $value->event_type }}</b>
                                    <input type="text" class="form-control notClickedCls hdioCls" id="eventTime{{$cnts}}" placeholder="Max 50 characters."  value="{{ $value->event_type }}" name="dates_edit[{{ $value->id }}][event_type]" required maxlength="50" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="email"><b>Hotel Contract</b></label>
                                <span class="hotelDatesInOutCls"><?php echo !empty($value->contract) ? '<i class="fas fa-file-pdf yellowClrCls"></i> <a target="_blank" href="'.asset('storage/'.$value->contract).'" class="notClickedCls"><b style="color:#FCA311;">View file</b></a>' : 'No Contract Uploaded'; ?></span>
                                <input type="file" name="dates_edit[{{ $value->id }}][contract]" class="hdioCls form-control notClickedCls" accept=".pdf|image/*">
                            </div>
                            <div class="form-group">
                                <label for="email"><b>Veenus Contract</b></label>
                                <span class="hotelDatesInOutCls"><?php echo !empty($value->veenus_contract) ? '<i class="fas fa-file-pdf yellowClrCls"></i> <a target="_blank" href="'.asset('storage/'.$value->veenus_contract).'" class="notClickedCls"><b style="color:#FCA311;">View file</b></a>' : 'No Contract Uploaded'; ?></span>
                                <input type="file" name="dates_edit[{{ $value->id }}][veenus_contract]" class="hdioCls form-control notClickedCls" accept=".pdf|image/*">
                            </div>
                        </div>
                        <div class="col-sm-1">
                           
                            <a class="yellowClrBtn marginTop15 clearBothCls float-left notClickedCls editDateCls <?=!empty($hotel_cart_list)?'booked_date':''?>" href="javascript:;" data-id="{{ $value->id }}" data-cart_id="<?=!empty($hotel_cart_list[0]->cart_id)?$hotel_cart_list[0]->cart_id:''?>">Edit</a>

                             <a class="yellowClrBtn marginTop15 clearBothCls float-left notClickedCls <?=!empty($hotel_cart_list)?'booked_date':''?>" target="_blank" href="<?php echo 'stocklist-edit-dates/'.$hotel_book_date_id; ?>" >Edit New</a>
                           <!--  <input type="hidden" name="" value="<?=!empty($hotel_cart_list[0]->cart_id)?$hotel_cart_list[0]->cart_id:''?>"> -->
                            <!-- <a class="yellowClrBtn clearBothCls float-left notClickedCls deleteDateCls" href="javascript:;" data-id="{{ $value->id }}" style="background: #dc3545;color: #fff;">Delete</a> -->
                        </div>
                    </div> */?>
                </div>
            <?php
            $cnts++; 
            /*}*/
             } ?>
            {{-- <div class="hotelDatesMainCls box">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="email">Date In</label>
                                    <span class="hotelDatesInOutCls"><b>Mon 19 April'21</b></span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="email">Date Out</label>
                                    <span class="hotelDatesInOutCls"><b>Mon 23 April'21</b></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="email">Nights</label>
                                    <span class="hotelDatesInOutCls">4</span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="email">Rate DBB</label>
                                    <span class="hotelDatesInOutCls">&#163; 43.00 pppn</span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="email">Rate SRS</label>
                                    <span class="hotelDatesInOutCls">&#163; 150.00 pppn</span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="email">Commission</label>
                                    <span class="hotelDatesInOutCls">8% plus VAT</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="email">Sgl</label>
                                    <span class="hotelDatesInOutCls"><b>8</b></span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="email">Dbl</label>
                                    <span class="hotelDatesInOutCls"><b>8</b></span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="email">Twn</label>
                                    <span class="hotelDatesInOutCls"><b>8</b></span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="email">Trp</label>
                                    <span class="hotelDatesInOutCls">0</span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="email">Qrd</label>
                                    <span class="hotelDatesInOutCls">0</span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="email">Sgl(Dr)</label>
                                    <span class="hotelDatesInOutCls">0</span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="email">Meal Basis</label>
                                    <span class="hotelDatesInOutCls"><b>DBB</b></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                            <div class="form-group">
                                <label for="email"><b>Inclusions</b></label>
                            </div>
                            <div class="inclusionsSections">
                                <div class="checkarea_part_Dates">
                                    <label class="checkbox_div">
                                      <input type="checkbox" name="step1[experience_extras_id][]" class="custom_chkbox tagchkbox" value="1" data-val="Air condition"> Air condition
                                      <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkarea_part_Dates">
                                    <label class="checkbox_div">
                                      <input type="checkbox" name="step1[experience_extras_id][]" class="custom_chkbox tagchkbox" value="1" data-val="Air condition"> Air condition
                                      <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkarea_part_Dates">
                                    <label class="checkbox_div">
                                      <input type="checkbox" name="step1[experience_extras_id][]" class="custom_chkbox tagchkbox" value="1" data-val="Air condition"> Air condition
                                      <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkarea_part_Dates">
                                    <label class="checkbox_div">
                                      <input type="checkbox" name="step1[experience_extras_id][]" class="custom_chkbox tagchkbox" value="1" data-val="Air condition"> Air condition
                                      <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="email"><b>Events</b></label>
                        </div>
                        <div class="inclusionsSections">
                            <div class="form-group">
                                <label for="email"><b>Is this date events specific?</b></label>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                  <label class="form-check-label" for="inlineRadio1">No</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                  <label class="form-check-label" for="inlineRadio2">Yes</label>
                                </div>
                            </div>
                            <div class="form-group" style="display: none;">
                                <label for="email"><b>Event Time</b></label>
                                <input type="date" class="form-control" id="exampleInputPassword1" placeholder="Date">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="email"><b>Based on contract</b></label>
                            <span class="hotelDatesInOutCls"><i class="fas fa-file-pdf yellowClrCls"></i> <b>Sharewood.pdf</b></span>
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <a class="yellowClrBtn marginTop15 clearBothCls float-left " href="javascript:;">Edit</a>
                    </div> 
                </div>
            </div> --}}
        </div>
        <div class="hotelDatesbottomCls">
            <div class="row">
                <div class="col-sm-6">
                    <div class="hotelDatesFooterCls box">
                        <div class="form-group">
                            <input type="hidden" name="addDatesCls" value="333" class="addDatesCls">
                            <!-- <a href="javascript:;" class="hotelDateFooterCls addMoreDateCls"><i class="fas fa-plus yellowClrCls"></i> Add new date</a> -->
                            <a href="javascript:;" class="hotelDateFooterCls addSelectCls" data-hotel-id="{{ $hotel_id }}"><i class="fas fa-plus yellowClrCls"></i> Add new dates</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="hotelDatesFooterCls box">
                        <div class="form-group">
                            <a href="javascript:;" class="hotelDateFooterCls contractSelectCls" data-hotel-id="{{ $hotel_id }}"><i class="far fa-file-pdf yellowClrCls"></i> Create PDF/contract dates</a>
                            <!-- <a href="javascript:;" class="hotelDateFooterCls duplicateSelectCls"><i class="far fa-clone yellowClrCls"></i> Duplicate selected booking</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <!-- <div id="fancybox_note_popup" style="display: none;">

                                          
            <h3>Add a new note</h3>

            @csrf
          
            <input type="hidden" name="cart_id" id="cart_id" value="">
            <input type="hidden" name="user_type" id="user_type" value="1">
            <p>Please state the reason for this amendment</p>
            <textarea type="text" class="form-control" name="notes" id="notes" placeholder="Type here" rows="7"></textarea>
           
            <p class="notes_cls" style="color: red;"></p>                                           
           
            <button type="submit" class="mt-2 btn btn-primary" id="add_notes" style="max-width: 500px;">
                Add Note
            </button>
    </div> -->
    <div class="modal-footer displayInitialCls">
        <input type="hidden" value="<?=isset($is_hotel_assieged)?$is_hotel_assieged:''?>" name="changed_dates" id="changed_dates">
         <textarea style="visibility: hidden;" value="" name="changed_note" id="changed_note"></textarea>
        <input type="hidden" value="" name="is_changed" id="is_changed">
        <input type="hidden" value="" name="assign_cart_id" id="assign_cart_id">
        <button type="button" class="btn btn-secondary cancel float-left hotelFooteCloseCls" data-dismiss="modal" style="margin-left: 10px;">Close</button>
        {{-- <a class="yellowClrBtn saveAllChangesBtn" href="javascript:;" data-dismiss="modal">Save all changes</a> --}}
        <input type="submit" name="submit" value="Save all changes" class="yellowClrBtn saveAllChangesBtn border-0" >
    </div>
   
{!! Form::close() !!}
<script type="text/javascript">
    //open edit document
    $(document).on('change', '#checkBookings', function() {
        
        var id = $(this).val();
        if(id == 1){
            $('.pastDate').hide();
            $('.unbookedDate').hide();
            $('.activeDate').show();
        }else if(id == 2){
            $('.pastDate').show();
            $('.activeDate').hide();
            $('.unbookedDate').hide();
        }else if(id == 3){
            $('.unbookedDate').show();
            $('.pastDate').hide();
            $('.activeDate').hide();
        }
    });
     $(document).on('click', '.editDocument', function() {
        var id = $(this).attr('data-id');
        $('#checkBookings').val('1');
        $('.loader').show();    
        $.ajax({
            url: base_url+'/super-user/edit-documents-tours',
            type: 'POST',
            data: {'exp_id':id},
            success: function(data) {
                if(jQuery( "#checkBookings option:selected" ).val() == 3 ) {
                    
                    $('#appendHtml').empty().html(data.newHtml);
                }else if(jQuery( "#checkBookings option:selected" ).val() == 2  || jQuery( "#checkBookings option:selected" ).val() == 1 ) {
                    $('#appendHtml').empty().html(data.html);
                }
                $('#appendHtml').html(data.html);
                $('.loader').hide();  
                $('#editDocModal').modal('show');
            },
            error: function(e) {
            }
        });   
    });
     
     $(document).on('change', '.notClickedCls', function(e) {
       var assign_cart_id = $(this).closest(".hotelDatesMainCls").attr('data-cart_id');
       //alert(assign_cart_id);
       var added_cart = $('#assign_cart_id').val();
       $('#assign_cart_id').val(added_cart+assign_cart_id+',');
        $('#is_changed').val('1');
    });
     $(document).on('click', '.saveAllChangesBtn', function(e) {

    //e.preventDefault();
   var changed = $('#changed_dates').val();
   var is_changed = $('#is_changed').val();
   if(changed == 1 && is_changed == 1)
   {
            /*$.fancybox.open(
            //$("#bookingFormBox-"+cartExperienceId).html() , {
            $("#fancybox_note_popup").html() , {
                closeExisting: false,
                touch: true,
                width:600,
                height:400,
                autoSize : false
            }
        );*/
        $('#resignNoteModal').modal('show');
        return false;
        //$(window).scrollTop(0);
   }
   else
   {
    return true;
   }
  
 });
      function myFunction() {
    // Declare variables
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById('myInputDate');
    filter = input.value.toUpperCase();
    ul = document.getElementsByClassName("openBookingDate");
    // li = ul.getElementsByTagName('div');

    // Loop through all list items, and hide those who don't match the search query
    for (i = 0; i < ul.length; i++) {
        a = ul[i].getElementsByTagName("div")[1];
        console.log(a.innerText);
        txtValue = a.textContent || a.innerText;

       /* a1 = ul[i].getElementsByTagName("div")[2];
        txtValue1 = a1.textContent || a1.innerText;

        a2 = ul[i].getElementsByTagName("div")[6];
        txtValue2 = a2.textContent || a2.innerText;

        a3 = ul[i].getElementsByTagName("div")[7];
        txtValue3 = a3.textContent || a3.innerText;*/


        console.log(txtValue.toUpperCase().indexOf(filter));
        if (txtValue.toUpperCase().indexOf(filter) > -1 /*|| txtValue1.toUpperCase().indexOf(filter) > -1 || txtValue2.toUpperCase().indexOf(filter) > -1 || txtValue3.toUpperCase().indexOf(filter) > -1*/) {
            ul[i].style.display = "";
        } else {
            ul[i].style.display = "none";
        }
    }
    }
 /*$(document).on('click', '#add_notes', function(e) {
    //alert($('#notes').val());
    $("#changed_note").removeAttr("style");
    $('body #changed_note').text($('#notes').val());
    $('#is_changed').val('');
    $('#resignNoteModal').modal('hide');
    //$('#stocklistHotebodylDatesCreateForm').submit();
    $('.saveAllChangesBtn').trigger('click');
});*/
    var hotelAmenitiesListArray = [];
    var hotelAmenitiesListObj = {};
    <?php foreach ($hotelAmenitiesList as $keyAme => $valueAme) { ?>
        hotelAmenitiesListObj['<?php echo $keyAme;?>'] = '<?php echo $valueAme;?>';
    <?php } ?>
    hotelAmenitiesListArray.push(hotelAmenitiesListObj);
   
</script>