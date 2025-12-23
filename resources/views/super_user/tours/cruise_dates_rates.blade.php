<style type="text/css">
    .row.rate_field {
        margin: 5px;
    }
    .table th, .table td{border-top: none !important;}
</style>
{!! Form::open(array('route' => 'tour-cruise-update','method'=>'POST', 'enctype' => 'multipart/form-data', 'class'=>'tourCompleteSteps', 'id'=>'tourCompleteSteps')) !!}
<div class="white_part" style="padding: 40px;">
    <div class="flwMainTitleCls">
        Dates and rates
    </div>
    <p>Enter the standard tour rate that will be displayed if there are no tour date selected to sell.</p>
    <div class="row">
        <div class="col-sm-2">
            <div class="form-group">
                <label>Currency</label>
                <input type="hidden" name="experienceId" class="experienceId" value="{{ isset($experience->id) ? $experience->id : null }}">
                <input type="hidden" name="popup" value="yes">
                <input type="hidden" name="tour_id" class="tour_id" value="{{$experience->tour_id}}">
                <input type="hidden" name="step1[id]" value="{{ isset($experience->id) ? $experience->id : null }}">
                <select class="form-control" name="step1[currency]">
                    <option value="1" {{ (isset($experience->currency) && ($experience->currency == 1) ? 'selected' : '')}}>&pound;</option>
                </select>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="form-group">
                <label>Rate</label>
                <input type="text" class="form-control" name="step1[rate]" value="{{(isset($experience->rate) ? $experience->rate : '')}}">
            </div>
        </div>
        <div class="col-sm-2">
            <div class="form-group">
                <label>SRS</label>
                <input type="text" class="form-control" name="step1[srs]" value="{{(isset($experience->srs) ? $experience->srs : '')}}">
            </div>
        </div>
        <div class="col-sm-2">
            <div class="form-group">
                <label>No of nights</label>
                <input type="text" class="form-control" name="step1[nights]" value="{{(isset($experience->nights) ? $experience->nights : '')}}">
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label>Canx deadline (collaborator)</label>
                <input type="number" required class="form-control" name="step1[can_deadline]" maxlength="100" value="{{(isset($experience->can_deadline) ? $experience->can_deadline : '')}}">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <select class="form-control" id="checkDates" style="margin-bottom: 20px;">
                <option value="1">Dates To Sell</option>
                <option value="2">Booked Dates</option>
                <option value="3">Past Dates</option>
                <option value="4">Unbooked Dates</option>
            </select>
            <b>Add dates for sale</b>

            <div class="appendParentDiv" style="float:left;width: 100%;">
                <?php
                if(!empty($experienceDatesRates)){
                    foreach ($experienceDatesRates as $key => $value) {

                    $cart_experiences = 


DB::connection('mysql_veenus')->table('cart_experiences')->where('dates_rates_id', $value->id)->where('experiences_id', $value->experience_id)->where('deleted_at',null)->where('completed', 0)->where('full_cancel', 0)->first(); 
                    if(!empty($cart_experiences->carts_id))
                    {
                        $cartsdata = 


DB::connection('mysql_veenus')->table('carts')->where('id', $cart_experiences->carts_id)->first();
                         $user_data = 


DB::connection('mysql_veenus')->table("users")->where('id', $cartsdata->user_id)->first();
                    }
                    
                    $collobrator_name = !empty($user_data->name)?$user_data->name:'';
                    $cart_experiences2 = 


DB::connection('mysql_veenus')->table('cart_experiences')->where('dates_rates_id', $value->id)->where('experiences_id', $value->experience_id)->where('deleted_at',null)->where('completed', 1)->first();

                    $cart_experiences3 = 


DB::connection('mysql_veenus')->table('cart_experiences')->where('dates_rates_id', $value->id)->where('experiences_id', $value->experience_id)->where('deleted_at',null)->where('full_cancel', 1)->first();
                    $sty = '';
                    $doc_completed = '';
                    if(!empty($cart_experiences)){
                        $cls = 'bookDates';
                        $sty = 'display:none';
                    }elseif(!empty($cart_experiences2)){
                        $cls = 'pastDates';
                        $sty = 'display:none';
                    }/*elseif(!empty($cart_experiences3)){
                        $cls = 'cancelDates';
                        $sty = 'display:none';
                    }*/else{
                        $exp_dates_data = App\Models\Cms\ExperienceCruiseDate::select('id','sign_name_hc','mark_as_completed','unbooked')->where('dates_rates_id',$value->id)->first();
                        //pr($exp_dates_data->mark_as_completed);
                        //pr($value->mark_as_completed_etc);
                        if(!empty($exp_dates_data->unbooked)/*!empty($value->mark_as_completed_etc) && !empty($value->sign_name_etc) && !empty($exp_dates_data->unbooked) && !empty($exp_dates_data->mark_as_completed)*/)
                        {
                            
                            $cls = 'unbookDates';
                            $sty = 'display:none';
                        }
                        else
                        {
                            if(empty($value->mark_as_completed_etc) || empty($exp_dates_data->mark_as_completed))
                            {
                                $doc_completed = 1;
                            }
                            $cls = 'saleDates';
                        }
                        
                    }
                    $i = 0; 
                    $date_in = array();
                    $date_out = array(); 
                    $e_dates = array();
                ?>
                <div class="parentDiv tour_summary_container dates_rates_div{{$value->id}} {{$cls}}" data-key="<?php echo $key; ?>" style="padding:0px;border: 3px solid #ddd;border-radius: 5px;margin: 15px 2px;min-height: 100px;<?php echo $sty; ?>">
                    <input type="hidden" name="step8[tour][<?php echo $key; ?>][dates_rates_id]" value="{{$value->id}}">
                    <div class="appendHotel">
                        
                        @if (isset($experience->еxperiencesToShipsToExperienceDates))
                            @foreach ($experience->еxperiencesToShipsToExperienceDates as $k => $rec)

                                @if (isset($rec->experienceCruiseDates))

                                    @if ($value->id == $rec->experienceCruiseDates->dates_rates_id)
                                        <?php 
                                        /*$cabinDetail = 


DB::connection('mysql_veenus')->table('ship_dates_rates_allocation')->where('ship_dates_id',$rec->experienceCruiseDates->hotel_date_id)->get();*/
                                        $ship_book_date_id = $rec->experienceCruiseDates->hotel_date_id;
                                        $cabinDetail = App\Models\Cms\ShipCabin::select('ship_cabins.*','sd.id as cabin_rate_id','sd.no_cabin','sd.rate_euro','sd.ss_euro','sd.ss_after_euro','sd.rate_pound','sd.ss_pound','sd.ss_after_pound')
                                         ->leftJoin('ship_dates_rates_allocation as sd', function($join) use ($ship_book_date_id)
                                             {
                                                 $join->on('sd.cabin_id', '=', 'ship_cabins.id');
                                                 $join->on('ship_dates_id','=',DB::raw("'".$ship_book_date_id."'"));
                                                 
                                             })
                                         ->where('ship_cabins.ships_id', '=',$rec->ship->id)
                                         ->get();
                                        $crossingDetail = App\Models\Cms\Company::select('company.company_name','company.id','sc.cost_pound as company_cost_pound','sd.cost_pound','sd.cost_euro','sd.id as sd_id')
                                         ->leftjoin('ship_crossings as sc','sc.company_id','company.id')
                                         ->leftJoin('experience_dates_ship_crossings as sd', function($join) use ($ship_book_date_id)
                                             {
                                                 $join->on('sd.company_id', '=', 'company.id');
                                                 $join->on('exp_date_rates_id','=',DB::raw("'".$ship_book_date_id."'"));
                                                 
                                             })
                                         //->groupBy('sc.company_id')
                                         ->where('company.company_name','!=','')
                                         ->get();
                                         
                                        $e_dates[$rec->experienceCruiseDates->dates_rates_id]['mark_as_completed'][] = $rec->experienceCruiseDates->mark_as_completed;
                                        $e_dates[$rec->experienceCruiseDates->dates_rates_id]['date_from'][] = strtotime($rec->experienceCruiseDates->date_from);
                                        $e_dates[$rec->experienceCruiseDates->dates_rates_id]['date_to'][] = strtotime($rec->experienceCruiseDates->date_to);
                                    
                                        
                                        ?>
                                        <div class="hotelDiv" data-key="<?php echo $k; ?>">
                                            <div class="col-sm-12">
                                                <?php if($i != 0){ echo '<b>Combined with</b>'; } $i++; ?><?php if($cls != 'bookDates') { ?> 
                                                
                                                <?php } ?></div>
                                            <div style="border: 1px solid #ddd;border-radius: 5px;margin: 15px;padding: 20px;">
                                                <div class="form-group" style="display: inline-flex;width: 100%;margin-bottom:2px;">
                                                    <input type="hidden" name="step8[tour][<?php echo $key; ?>][hotel][<?php echo $k; ?>][experience_hotel_date_id]" value="{{$rec->id}}">
                                                    <input type="hidden" name="step8[tour][<?php echo $key; ?>][hotel][<?php echo $k; ?>][experience_date_id]" value="{{$rec->experienceCruiseDates->id}}">
                                                    <label style="font-weight: bold;color: black;margin: 8px 0px;width: 75px;font-size: 16px;margin-right: 10px;">Ship:</label>
                                                    <select <?=($cls != 'bookDates')?'':'disabled'?> class="form-control shipDropDown pointerNone" data-key="<?php echo $key; ?>" data-cnt="{{$key}}" name="step8[tour][<?php echo $key; ?>][hotel][<?php echo $k; ?>][hotel_id]" required="" readonly>
                                                        <option value="">Select One</option>
                                                        <?php 
                                                            if(!empty($shipList)){
                                                            foreach ($shipList as $kk => $val) {
                                                                $selected = '';
                                                                if(isset($rec->ship->id) && $rec->ship->id == $val->id){
                                                                    $selected = 'selected';
                                                                }
                                                             ?>
                                                                <option value="{{$val->id}}" {{$selected}}>{{$val->name}}</option>
                                                            <?php } } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group" style="display: inline-flex;width: 100%;margin-bottom:2px;">
                                                    <label style="font-weight: bold;color: black;margin: 8px 0px;width: 75px;font-size: 16px;margin-right: 10px;">Date:</label>
                                                    <select <?=($cls != 'bookDates')?'':'disabled'?> data-id="<?php echo $key; ?>"  class="form-control shipDatesDropDown pointerNone" name="step8[tour][<?php echo $key; ?>][hotel][<?php echo $k; ?>][date]" readonly>
                                                        <option value="">-</option>
                                                        <?php
                                                        if(!empty($rec->ship->id)){
                                                            $hotelDates = 


DB::connection('mysql_veenus')->table('ship_dates')->where('ship_id', $rec->ship->id)->where('deleted_at', null)->get()->toArray();
                                                            $date_from = $rec->experienceCruiseDates->date_from;
                                                            $date_to = $rec->experienceCruiseDates->date_to;

                                                            $id = $rec->experienceCruiseDates->hotel_date_id;
                                                            
                                                            if(!empty($hotelDates)){
                                                                foreach ($hotelDates as $hk => $_val) {
                                                                    $selected = '';
                                                                    if(!empty($id))
                                                                    {
                                                                        if($id == $_val->id){
                                                                            $date_in[] = strtotime($_val->date_in);
                                                                            $date_out[] = strtotime($_val->date_out);
                                                                            $selected = 'selected';
                                                                            $booked_hotel_date_id = $_val->id;
                                                                            $date_from = $_val->date_in;
                                                                            $date_to = $_val->date_out;
                                                                            $rate_dbb_euro = $_val->rate_dbb_euro;
                                                                            $rate_dbb_pound = $_val->rate_dbb;
                                                                            $hotel_market_option = $_val->market_option;
                                                                        }
                                                                        
                                                                    }
                                                                    else
                                                                    {
                                                                        if($date_from == $_val->date_in && $date_to == $_val->date_out){
                                                                            $date_in[] = strtotime($_val->date_in);
                                                                            $date_out[] = strtotime($_val->date_out);
                                                                            $selected = 'selected';
                                                                            $booked_hotel_date_id = $_val->id;
                                                                            $date_from = $_val->date_in;
                                                                            $date_to = $_val->date_out;
                                                                            $rate_dbb_pound = $_val->rate_dbb;
                                                                        }
                                                                       
                                                                    }
                                                                    
                                                                    echo '<option data-market-option="'.$_val->market_option.'" value="'.$_val->id.'" '.$selected.'>'.convert2DMYForHotelDates($_val->date_in).' - '.convert2DMYForHotelDates($_val->date_out).' ('.$_val->night.' nights) - '.$_val->id.'</option>';
                                                                }
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                    <input type="hidden" name="step8[tour][<?php echo $key; ?>][currency]" id="select_market_option_<?php echo $key; ?>" value="{{$value->currency}}">
                                                </div>
                                                <div class="form-group" style="display: inline-flex;width: 100%;margin-bottom:2px;">
                                                    <label style="font-weight: bold;color: black;width: 75px;font-size: 16px;margin-right: 10px;">Type:</label>
                                                    <div class="labelDiv" style="color: #495057;">
                                                    <?php
                                                   
                                                   /* if(!empty($value->rate_type) && $value->rate_type == 1){
                                                        echo '£';
                                                    }elseif(!empty($value->rate_type) && $value->rate_type == 2){
                                                        echo '€';
                                                    }
                                                    elseif(!empty($value->rate_type) && $value->rate_type == 3){
                                                        echo '£ & €';
                                                    }*/
                                                    
                                                    ?>
                                                    </div>
                                                    
                                                    <div class="form-check form-check-inline radioDiv">
                                                      <input <?=($cls != 'bookDates')?'':''?> class="form-check-input rate_type_select" type="radio" name="step8[tour][<?php echo $key; ?>][rate_type]" id="typeInlineRadio1<?php echo $key.$k; ?>" value="1" data-id="<?php echo $key; ?>"  <?php echo (!empty($value->rate_type) && ($value->rate_type == 1)) ? 'checked' : ''; ?>>
                                                      <label class="form-check-label" for="typeInlineRadio1<?php echo $key.$k; ?>" style="font-size: 0.98rem;color: #495057;">£</label>
                                                    </div>
                                                    <div class="form-check form-check-inline radioDiv">
                                                      <input class="form-check-input rate_type_select" data-id="<?php echo $key; ?>" type="radio" name="step8[tour][<?php echo $key; ?>][rate_type]" id="typeInlineRadio2<?php echo $key.$k; ?>" value="2"  <?php echo (!empty($value->rate_type) && ($value->rate_type == 2)) ? 'checked' : ''; ?>>
                                                      <label class="form-check-label" for="typeInlineRadio2<?php echo $key.$k; ?>" style="font-size: 0.98rem;color: #495057;">€</label>
                                                    </div>
                                                    <div class="form-check form-check-inline radioDiv">
                                                      <input class="form-check-input rate_type_select" data-id="<?php echo $key; ?>" type="radio" name="step8[tour][<?php echo $key; ?>][rate_type]" id="typeInlineRadio2<?php echo $key.$k; ?>" value="3"  <?php echo (!empty($value->rate_type) && ($value->rate_type == 3)) ? 'checked' : ''; ?>>
                                                      <label class="form-check-label" for="typeInlineRadio2<?php echo $key.$k; ?>" style="font-size: 0.98rem;color: #495057;">£ & €</label>
                                                    </div>
                                                  
                                                </div>
                                                <?php if(!empty($doc_completed)){ ?>
                                                <div class="form-group">
                                                   <p style="color:red;font-weight: bold;">This date will not be shown for sale until all required documents are completed.</p>
                                                </div>
                                                <?php  } ?>
                                                <?php if($cls == 'bookDates'){ ?> 
                                                <div class="form-group" style="display: inline-flex;width: 100%;margin-bottom:2px;">
                                                    <label style="font-weight: bold;color: black;width: 185px;font-size: 16px;margin-right: 10px;">Collaborator Booked:</label>
                                                    <div class="labelDiv" style="color: #495057;">
                                                        <?php echo $collobrator_name; ?>
                                                    </div>
                                                   
                                                </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <?php $hotel_id = $rec->ship->id; ?>
                                    @endif
                                @endif
                            @endforeach
                        @endif
                    </div>
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-12">
                               <!--  <a href="javascript:;" class="addHotel" style="color:orange;width: 100%;display: none;margin-bottom: 20px;">Combine this date with another hotel</a> -->
                                <?php 
                                $dateMin = '';
                                $count = 0;
                                if(!empty($date_in)){
                                    $count = count($date_in);
                                    $_dateMin = min($date_in);
                                    $dateMin = date('Y-m-d', $_dateMin);
                                }
                                $dateMax = '';
                                if(!empty($date_out)){
                                    $_dateMax = max($date_out);
                                    $dateMax = date('Y-m-d',$_dateMax);
                                }
                                if(!empty($dateMax) && !empty($dateMin)){
                                    $diff = $_dateMax - $_dateMin; 
                                    $nights = round($diff / 86400);
                                    ?>
                                    <p style="margin-top: 15px;font-size: 1rem;"><b><?php
                                    echo (($count > 1) ? 'Combined Dates: ' : 'Tour Dates: ');
                                    echo convert2DMYForHotelDates($dateMin).' - '.convert2DMYForHotelDates($dateMax).' ('.$nights.' nights)'; ?></b></p>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="tabs_wrapper">
                         <ul class="notestabs" style="margin-bottom: 15px;margin-top: 0px;width: 20%;">
                            <li class="pound_tab{{$key}} select-tab active " data-id="1{{$key}}" style="border-left: 0;font-size: 16px;">
                                Costs In £
                            </li>
                            <li class="euro_tab{{$key}} select-tab" data-id="2{{$key}}" style="border-left: 0;font-size: 16px;">
                                Costs In €
                            </li>
                           
                        </ul>
                        </div>
                        <!-- Start Tab 1 -->  
                        <div id="tabpanel-1{{$key}}" class="content-tab" role="tabpanel" aria-labelledby="tab-1">
                            <div class="row">
                                
                                    <?php
                                            $colpseuro = '';
                                            $colpsrateeuro = 'style="display:none"';
                                            if($value->rate_euro == $value->single_euro && $value->rate_euro == $value->double_euro && $value->rate_euro == $value->twin_euro && $value->rate_euro == $value->triple_euro && $value->rate_euro == $value->quad_euro)
                                            {
                                                $colpseuro='style="display:none"';
                                                 $colpsrateeuro='';
                                            }
                                            $cabin_cnt = 0;

                                        ?>
                                    <div class="row">
                                        @if(!empty($cabinDetail[0]))
                                        <div class="col-md-5">
                                            <div class="cabin_rates_div cabin_rates_div_<?php echo $key; ?>">                                           
                                                @foreach($cabinDetail as $cabinval)
                                                <div class="row rate_field">
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <label>{{$cabinval->name}}</label>
                                                            <input type="hidden" class="form-control decimal" id="rate_pound_<?php echo $key; ?>" name="step8[tour][<?php echo $key; ?>][cabin][{{$cabin_cnt}}][cabin_type]" value="{{$cabinval->name}}" required>
                                                            <input type="hidden" class="form-control decimal" id="rate_pound_<?php echo $key; ?>" name="step8[tour][<?php echo $key; ?>][cabin][{{$cabin_cnt}}][id]" value="{{$cabinval->id}}" required>
                                                             <input type="hidden" class="form-control decimal" id="rate_pound_<?php echo $key; ?>" name="step8[tour][<?php echo $key; ?>][cabin][{{$cabin_cnt}}][id]" value="{{$cabinval->cabin_rate_id}}" required>
                                                              <input type="hidden" class="form-control decimal" id="rate_pound_<?php echo $key; ?>" name="step8[tour][<?php echo $key; ?>][cabin][{{$cabin_cnt}}][cabin_id]" value="{{$cabinval->id}}" required>
                                                            <input type="text" readonly class="pointerNone form-control decimal" id="rate_pound_<?php echo $key; ?>" name="step8[tour][<?php echo $key; ?>][cabin][{{$cabin_cnt}}][rate_pound]" value="{{sprintf('%0.2f',$cabinval->rate_pound)}}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <label>SS (£)</label>
                                                            <input type="text" readonly class="pointerNone form-control decimal" value="{{sprintf('%0.2f',$cabinval->ss_pound)}}" id="rate_pound_<?php echo $key; ?>" name="step8[tour][<?php echo $key; ?>][cabin][{{$cabin_cnt}}][ss_pound]" required>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="col-sm-1 display_pound_rate_<?php echo $key; ?> pound_colunm_out_<?php //echo $key; ?> ">
                                                        <div class="form-group ss_after_div">
                                                            <label>After</label>
                                                            <input type="text" readonly class="pointerNone form-control decimal" value="{{sprintf('%0.2f',$value->emerand_after_pound)}}" id="rate_pound_<?php //echo $key; ?>" name="step8[tour][<?php //echo $key; ?>][emerand_after_pound]" required>
                                                        </div>
                                                    </div> -->
                                                   <!--  <div class="col-sm-1 display_pound_rate_<?php echo $key; ?> pound_colunm_out_<?php echo $key; ?> ">
                                                        <div class="form-group ss_after_div">
                                                        </div>
                                                    </div> -->
                                                    <div class="col-sm-3 display_pound_rate_<?php echo $key; ?> pound_colunm_out_<?php echo $key; ?> ">
                                                        <div class="form-group ss_after_div">
                                                            <label>SS After (£)</label>
                                                            <input type="text" readonly class="pointerNone form-control decimal" value="{{sprintf('%0.2f',$cabinval->ss_after_pound)}}" id="rate_pound_<?php echo $key; ?>" name="step8[tour][<?php echo $key; ?>][cabin][{{$cabin_cnt}}][ss_after_pound]" required>
                                                        </div>
                                                    </div>
                                                   <!--  <div class="col-sm-2 pound_colunm_out_<?php echo $key; ?>">
                                                            <a href="javascript:void()" class="add_ss_after" data-id="<?php echo $key; ?>" style="color:orange;">Add SS After</a>
                                                        </div> -->
                                                </div>
                                                <?php $cabin_cnt++;?>
                                                @endforeach
                                            
                                            </div>
                                        </div>
                                        @endif
                                        <div class="col-md-7">
                                            <div class="row rate_field" style="float: left;width: 100%;">
                                                <div class="col-sm-3 pound_colunm_out_<?php echo $key; ?>">
                                                    <div class="form-group">
                                                        <label>Deposit 1(£)</label>
                                                        <input type="text" readonly class="pointerNone form-control decimal" value="{{sprintf('%0.2f',$value->deposit_pound)}}" name="step8[tour][<?php echo $key; ?>][deposit_pound]" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 pound_colunm_out_<?php echo $key; ?>">
                                                    <div class="form-group">
                                                        <label>Deposit 2(£)</label>
                                                        <input type="text" readonly class="pointerNone form-control decimal" value="{{sprintf('%0.2f',$value->deposit_pound2)}}" name="step8[tour][<?php echo $key; ?>][deposit_pound2]" required>
                                                    </div>
                                                </div>
                                               <div class="col-sm-6 display_pound_rate_<?php echo $key; ?> pound_colunm_out_<?php echo $key; ?> ">
                                                        <div class="form-group">
                                                        </div>
                                                    </div>
                                                <div class="col-sm-3 pound_colunm_out_<?php echo $key; ?>">
                                                    <div class="form-group">
                                                        <label>Cost of overnight pp (£)</label>
                                                        <input type="text" readonly class="pointerNone form-control decimal" value="{{sprintf('%0.2f',$value->cost_overnight_pound)}}" name="step8[tour][<?php echo $key; ?>][cost_overnight_pound]" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 pound_colunm_out_<?php echo $key; ?>">
                                                    <div class="form-group">
                                                        <label>Add overnight ss (£)</label>
                                                        <input type="text" readonly class="pointerNone form-control decimal" value="{{sprintf('%0.2f',$value->add_overnight_ss)}}" name="step8[tour][<?php echo $key; ?>][add_overnight_ss]" required>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row rate_field">
                                        <?php  $crossing_cnt = 0;
                                        $company = 


DB::connection('mysql_veenus')->table('crossing_company')->where('active',1)->where('company_name','!=','')->get();?>
                                        <ul class="nav nav-tabs">
                                          @foreach ($company as $k => $com)
                                          
                                          <li><a class="<?=($k == 0)?'active':'de'?> select-crossing" data-toggle="tab{{$k}}{{$key}}" data-id="tab{{$k}}{{$key}}">{{$com->company_name}}</a></li>
                                          @endforeach
                                          <!-- <li><a class="active" data-toggle="tab0" href="#tab0">P&O Ferry</a></li>
                                          <li><a data-toggle="tab2" href="#tab2">Brittany Ferries</a></li>
                                          <li><a data-toggle="tab3" href="#tab3">Eurotunnel</a></li>
                                          <li><a data-toggle="tab4" href="#tab4">DFDS</a></li> -->
                                        
                                        </ul>
                                        <div class="tab-content" style="border: 1px solid #ddd;display: inline-block;border-top: 0px;width: 100%;padding-top: 10px;">
                                        @foreach ($company as $k => $com)
                                          <div id="tab{{$k}}{{$key}}" class="crossing-tab tab-pane <?=($k == 0)?'active':'de'?>">
                                            
                                                <input type="hidden" name="company_id" value="{{$com->id}}">
                                                <div class="section w_100" style="height:100%;float: left;">
                                                    <div class="form company_crossing_div">
                                                        <table class="table">
                                                            <tr>
                                                                <th>Select</th>
                                                                <th>Route</th>
                                                                <th>In/Out</th>
                                                                <th>Overnight</th>
                                                                <th>Cost £</th>
                                                                <th>Cost SS £</th>
                                                            </tr>

                                                        
                                                         <?php 

                                                            if(isset($crossings_route)){
                                                                if(count($crossings_route) >= 1){
                                                                    $cnts = '11565';
                                                                    $crossing_cnt = 0;
                                                                foreach ($crossings_route as $keyc => $csvalue) { 
                                                                     if($csvalue->company_id == $com->id){
                                                                        $crossings_exp = App\Models\Cms\ExperienceDatesShipCrossings::where('ship_crossing_id',$csvalue->id)->where('exp_date_rates_id',$value->id)->first();
                                                                        
                                                                     ?>

                                                                  <tr>
                                                                        <td>
                                                                            <label class="checkbox_div">
                                                                               
                                                                               
                                                                              <input <?=!empty($crossings_exp->is_selected)?'checked':''?> id="crossing{{$crossing_cnt}}" type="checkbox" name="step8[tour][<?php echo $key; ?>][crossing][{{$crossing_cnt}}][{{$csvalue->company_id}}][crossig_id]" disabled class="custom_chkbox tagchkbox pointerNone" value="{{$csvalue->id}}"> 

                                                                              <span class="checkmark"></span>
                                                                            </label>
                                                                           <!--  <input readonly type="checkbox" value="1"> -->
                                                                        </td>
                                                                        <td>
                                                                        
                                                                            <input readonly class="form-control" type="text" value="{{ $csvalue->route }}" name="step8[tour][<?php echo $key; ?>][crossing][{{$crossing_cnt}}][{{$csvalue->company_id}}][route]" id="route">
                                                                            <p class="exp_error" style="display:none;color: red;">Please enter refurbished</p>
                                                                        
                                                                        <td>
                                                                           
                                                                           <select readonly disabled class="form-control" name="step8[tour][<?php echo $key; ?>][crossing][{{$crossing_cnt}}][{{$csvalue->company_id}}][in_out]">
                                                                                <option value="">Select In/Out</option>
                                                                                <option value="In" <?=(!empty($csvalue->in_out) && $csvalue->in_out == 'In'?'selected="selected"':'')?>>In</option>
                                                                                <option value="Out" <?=(!empty($csvalue->in_out) && $csvalue->in_out == 'Out'?'selected="selected"':'')?>>Out</option>
                                                                            </select>
                                                                           
                                                                        </td>
                                                                        <td>
                                                                          
                                                                            <select readonly class="form-control" name="step8[tour][<?php echo $key; ?>][crossing][{{$crossing_cnt}}][{{$csvalue->company_id}}][overnight]">
                                                                                <option value="">Overnight</option>
                                                                                <option value="0" <?=(!empty($csvalue->overnight) && $csvalue->overnight == '0'?'selected="selected"':'')?>>0</option>
                                                                                <option value="1" <?=(!empty($csvalue->overnight) && $csvalue->overnight == '1'?'selected="selected"':'')?>>1</option>
                                                                                <option value="2" <?=(!empty($csvalue->overnight) && $csvalue->overnight == '2'?'selected="selected"':'')?>>2</option>
                                                                                <option value="3" <?=(!empty($csvalue->overnight) && $csvalue->overnight == '3'?'selected="selected"':'')?>>3</option>
                                                                                <option value="4" <?=(!empty($csvalue->overnight) && $csvalue->overnight == '4'?'selected="selected"':'')?>>4</option>
                                                                                <option value="5" <?=(!empty($csvalue->overnight) && $csvalue->overnight == '5'?'selected="selected"':'')?>>5</option>
                                                                            </select>
                                                                            
                                                                            <p class="exp_error" style="display:none;color: red;">Please enter passengers</p>
                                                                        </td>
                                                                        <td>
                                                                            <input type="hidden" name="step8[tour][<?php echo $key; ?>][crossing][{{$crossing_cnt}}][{{$csvalue->company_id}}][company_id]" value="{{$csvalue->company_id}}">
                                                                           <input type="hidden" name="step8[tour][<?php echo $key; ?>][crossing][{{$crossing_cnt}}][{{$csvalue->company_id}}][ship_crossing_id]" value="{{$csvalue->id}}">
                                                                            <input readonly class="form-control pointerNone" type="text" value="{{!empty($crossings_exp->cost_pound)?$crossings_exp->cost_pound:$csvalue->cost_pound }}" name="step8[tour][<?php echo $key; ?>][crossing][{{$crossing_cnt}}][{{$csvalue->company_id}}][cost_pound]" id="cost_pound">
                                                                            <p class="exp_error" style="display:none;color: red;">Please enter staff to guest</p>
                                                                        </td>
                                                                        <td>
                                                                            
                                                                            <input readonly  class="form-control pointerNone" type="text" value="{{!empty($crossings_exp->cost_ss_pound)?$crossings_exp->cost_ss_pound:$csvalue->cost_ss_pound }}" name="step8[tour][<?php echo $key; ?>][crossing][{{$crossing_cnt}}][{{$csvalue->company_id}}][cost_ss_pound]" id="cost_ss_pound">
                                                                            <p class="exp_error" style="display:none;color: red;">Please enter staff to guest</p>
                                                                        </td>
                                                                        
                                                                      
                                                                    </tr>
                                                         <?php
                                                         $crossing_cnt++;
                                                            $cnts++;
                                                            }
                                                         } } } ?>
                                                         </table>
                                                    </div>
                                                   
                                                </div>
                                               
                                            
                                           
                                        </div>
                                        @endforeach
                                       
                                        </div>
                                       <!--  @if(!empty($crossingDetail))
                                            @foreach($crossingDetail as $crossinval)
                                            <div class="col-sm-2 display_pound_rate_<?php echo $key; ?> pound_colunm_out_<?php echo $key; ?>">
                                                <div class="form-group">
                                                    <label>Cost of crossing pp (£)<br/>{{$crossinval->company_name}}</label>
                                                    <input type="hidden" name="step8[tour][<?php echo $key; ?>][crossing][{{$crossing_cnt}}][{{$value->company_id}}][id]" value="{{$crossinval->sd_id}}">
                                                    <input type="hidden" name="step8[tour][<?php echo $key; ?>][crossing][{{$crossing_cnt}}][{{$value->company_id}}][company_id]" value="{{$crossinval->id}}">
                                                    <input type="text" readonly class="pointerNone form-control decimal" value="{{!empty($crossinval->cost_pound)?sprintf('%0.2f',$crossinval->cost_pound):sprintf('%0.2f',$crossinval->company_cost_pound)}}" id="rate_pound_<?php echo $key; ?>" name="step8[tour][<?php echo $key; ?>][crossing][{{$crossing_cnt}}][{{$value->company_id}}][cost_pound]" required>
                                                </div>
                                            </div>
                                            <?php $crossing_cnt++;?>
                                            @endforeach
                                        @endif -->
                                        
                                    </div>
                            </div>
                        </div><!-- End Tab 1 -->   
                        <!-- Start Tab 1 -->  
                        <div id="tabpanel-2{{$key}}" class="content-tab" role="tabpanel" aria-labelledby="tab-2" class="is-hidden" style="display:none;">
                            
                             <div class="row">
                                
                                <?php
                                        $colpseuro = '';
                                        $colpsrateeuro = 'style="display:none"';
                                        if($value->rate_euro == $value->single_euro && $value->rate_euro == $value->double_euro && $value->rate_euro == $value->twin_euro && $value->rate_euro == $value->triple_euro && $value->rate_euro == $value->quad_euro)
                                        {
                                            $colpseuro='style="display:none"';
                                             $colpsrateeuro='';
                                        }
                                        $cabin_cnt = 0;

                                    ?>
                                <div class="row">
                                    @if(!empty($cabinDetail[0]))
                                    <div class="col-md-5">
                                        <div class="cabin_rates_div cabin_rates_div_<?php echo $key; ?>">
                                            @foreach($cabinDetail as $cabinval)
                                            <div class="row rate_field">
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label>{{$cabinval->name}}</label>
                                                        <input type="hidden" class="form-control decimal" id="rate_pound_<?php echo $key; ?>" name="step8[tour][<?php echo $key; ?>][cabin][{{$cabin_cnt}}][cabin_type]" value="{{$cabinval->name}}" required>
                                                        <input type="hidden" class="form-control decimal" id="rate_pound_<?php echo $key; ?>" name="step8[tour][<?php echo $key; ?>][cabin][{{$cabin_cnt}}][id]" value="{{$cabinval->id}}" required>
                                                         <input type="hidden" class="form-control decimal" id="rate_pound_<?php echo $key; ?>" name="step8[tour][<?php echo $key; ?>][cabin][{{$cabin_cnt}}][id]" value="{{$cabinval->cabin_rate_id}}" required>
                                                          <input type="hidden" class="form-control decimal" id="rate_pound_<?php echo $key; ?>" name="step8[tour][<?php echo $key; ?>][cabin][{{$cabin_cnt}}][cabin_id]" value="{{$cabinval->id}}" required>
                                                        <input type="text" readonly class="pointerNone form-control decimal" id="rate_pound_<?php echo $key; ?>" name="step8[tour][<?php echo $key; ?>][cabin][{{$cabin_cnt}}][rate_euro]" value="{{sprintf('%0.2f',$cabinval->rate_euro)}}" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label>SS (€)</label>
                                                        <input type="text" readonly class="pointerNone form-control decimal" value="{{sprintf('%0.2f',$cabinval->ss_euro)}}" id="rate_pound_<?php echo $key; ?>" name="step8[tour][<?php echo $key; ?>][cabin][{{$cabin_cnt}}][ss_euro]" required>
                                                    </div>
                                                </div>
                                                <!-- <div class="col-sm-1 display_pound_rate_<?php echo $key; ?> pound_colunm_out_<?php //echo $key; ?> ">
                                                    <div class="form-group ss_after_div">
                                                        <label>After</label>
                                                        <input type="text" readonly class="pointerNone form-control decimal" value="{{sprintf('%0.2f',$value->emerand_after_pound)}}" id="rate_pound_<?php //echo $key; ?>" name="step8[tour][<?php //echo $key; ?>][emerand_after_pound]" required>
                                                    </div>
                                                </div> -->
                                               <!--  <div class="col-sm-1 display_pound_rate_<?php echo $key; ?> pound_colunm_out_<?php echo $key; ?> ">
                                                    <div class="form-group ss_after_div">
                                                    </div>
                                                </div> -->
                                                <div class="col-sm-3 display_pound_rate_<?php echo $key; ?> pound_colunm_out_<?php echo $key; ?> ">
                                                    <div class="form-group ss_after_div">
                                                        <label>SS After (€)</label>
                                                        <input type="text" readonly class="pointerNone form-control decimal" value="{{sprintf('%0.2f',$cabinval->ss_after_euro)}}" id="rate_pound_<?php echo $key; ?>" name="step8[tour][<?php echo $key; ?>][cabin][{{$cabin_cnt}}][ss_after_euro]" required>
                                                    </div>
                                                </div>
                                               <!--  <div class="col-sm-2 pound_colunm_out_<?php echo $key; ?>">
                                                        <a href="javascript:void()" class="add_ss_after" data-id="<?php echo $key; ?>" style="color:orange;">Add SS After</a>
                                                    </div> -->
                                            </div>
                                            <?php $cabin_cnt++;?>
                                            @endforeach
                                        </div>
                                    </div>
                                    @endif
                                    <div class="col-md-7">
                                        <div class="row rate_field" style="float: left;width: 100%;">
                                            <div class="col-sm-3 pound_colunm_out_<?php echo $key; ?>">
                                                <div class="form-group">
                                                    <label>Deposit 1(€)</label>
                                                    <input type="text" readonly class="pointerNone form-control decimal" value="{{sprintf('%0.2f',$value->deposit_euro)}}" name="step8[tour][<?php echo $key; ?>][deposit_euro]" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 pound_colunm_out_<?php echo $key; ?>">
                                                <div class="form-group">
                                                    <label>Deposit 2(€)</label>
                                                    <input type="text" readonly class="pointerNone form-control decimal" value="{{sprintf('%0.2f',$value->deposit_euro2)}}" name="step8[tour][<?php echo $key; ?>][deposit_euro2]" required>
                                                </div>
                                            </div>
                                           <div class="col-sm-6 display_pound_rate_<?php echo $key; ?> pound_colunm_out_<?php echo $key; ?> ">
                                                    <div class="form-group">
                                                    </div>
                                                </div>
                                            <div class="col-sm-3 pound_colunm_out_<?php echo $key; ?>">
                                                <div class="form-group">
                                                    <label>Cost of overnight pp (€)</label>
                                                    <input type="text" readonly class="pointerNone form-control decimal" value="{{sprintf('%0.2f',$value->cost_overnight_euro)}}" name="step8[tour][<?php echo $key; ?>][cost_overnight_euro]" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 pound_colunm_out_<?php echo $key; ?>">
                                                <div class="form-group">
                                                    <label>Add overnight ss (€)</label>
                                                    <input type="text" readonly class="pointerNone form-control decimal" value="{{sprintf('%0.2f',$value->add_overnight_ss_euro)}}" name="step8[tour][<?php echo $key; ?>][add_overnight_ss_euro]" required>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="row rate_field">
                                    <?php  $crossing_cnt = 0;
                                    $company = 


DB::connection('mysql_veenus')->table('crossing_company')->where('active',1)->where('company_name','!=','')->get();?>
                                    <ul class="nav nav-tabs">
                                      @foreach ($company as $k => $com)                                    
                                      <li><a class="<?=($k == 0)?'active':'de'?> select-crossing" data-toggle="eurotab{{$k}}{{$key}}" data-id="eurotab{{$k}}{{$key}}">{{$com->company_name}}</a></li>
                                      @endforeach                                    
                                    </ul>
                                    <div class="tab-content" style="border: 1px solid #ddd;display: inline-block;border-top: 0px;width: 100%;padding-top: 10px;">
                                    @foreach ($company as $k => $com)
                                      <div id="eurotab{{$k}}{{$key}}" class="crossing-tab tab-pane <?=($k == 0)?'active':'de'?>">
                                        
                                            <input type="hidden" name="company_id" value="{{$com->id}}">
                                            <div class="section w_100" style="height:100%;float: left;">
                                                <div class="form company_crossing_div">
                                                    <table class="table">
                                                        <tr>
                                                            <th>Select</th>
                                                            <th>Route</th>
                                                            <th>In/Out</th>
                                                            <th>Overnight</th>
                                                            <th>Cost €</th>
                                                            <th>Cost SS €</th>
                                                        </tr>                                                   
                                                     <?php 

                                                        if(isset($crossings_route)){
                                                            if(count($crossings_route) >= 1){
                                                                $cnts = '11565';
                                                                $crossing_cnt = 0;
                                                            foreach ($crossings_route as $keyc => $csvalue) { 
                                                                 if($csvalue->company_id == $com->id){
                                                                 ?>

                                                              <tr>
                                                                    <td>
                                                                        <label class="checkbox_div">
                                                                            
                                                                          <input disabled type="checkbox" name="step8[tour][<?php echo $key; ?>][crossing][{{$crossing_cnt}}][{{$csvalue->company_id}}][crossig_id]" class="custom_chkbox tagchkbox pointerNone" value="{{$csvalue->id}}"> 
                                                                          <span class="checkmark"></span>
                                                                        </label>
                                                                       <!--  <input readonly type="checkbox" value="1"> -->
                                                                    </td>
                                                                    <td>
                                                                    
                                                                        <input readonly class="form-control" type="text" value="{{ $csvalue->route }}" name="step8[tour][<?php echo $key; ?>][route]" id="route">
                                                                        <p class="exp_error" style="display:none;color: red;">Please enter refurbished</p>
                                                                    
                                                                    <td>
                                                                       
                                                                       <select readonly disabled class="form-control" name="step8[tour][<?php echo $key; ?>][in_out]">
                                                                            <option value="">Select In/Out</option>
                                                                            <option value="In" <?=(!empty($csvalue->in_out) && $csvalue->in_out == 'In'?'selected="selected"':'')?>>In</option>
                                                                            <option value="Out" <?=(!empty($csvalue->in_out) && $csvalue->in_out == 'Out'?'selected="selected"':'')?>>Out</option>
                                                                        </select>
                                                                       
                                                                    </td>
                                                                    <td>
                                                                      
                                                                        <select readonly class="form-control" name="step8[tour][<?php echo $key; ?>][overnight]">
                                                                            <option value="">Overnight</option>
                                                                            <option value="0" <?=(!empty($csvalue->overnight) && $csvalue->overnight == '0'?'selected="selected"':'')?>>0</option>
                                                                            <option value="1" <?=(!empty($csvalue->overnight) && $csvalue->overnight == '1'?'selected="selected"':'')?>>1</option>
                                                                            <option value="2" <?=(!empty($csvalue->overnight) && $csvalue->overnight == '2'?'selected="selected"':'')?>>2</option>
                                                                            <option value="3" <?=(!empty($csvalue->overnight) && $csvalue->overnight == '3'?'selected="selected"':'')?>>3</option>
                                                                            <option value="4" <?=(!empty($csvalue->overnight) && $csvalue->overnight == '4'?'selected="selected"':'')?>>4</option>
                                                                            <option value="5" <?=(!empty($csvalue->overnight) && $csvalue->overnight == '5'?'selected="selected"':'')?>>5</option>
                                                                        </select>
                                                                        
                                                                        <p class="exp_error" style="display:none;color: red;">Please enter passengers</p>
                                                                    </td>
                                                                    <td>
                                                                        <input type="hidden" name="step8[tour][<?php echo $key; ?>][crossing][{{$crossing_cnt}}][{{$csvalue->company_id}}][company_id]" value="{{$csvalue->company_id}}">
                                                                       <input type="hidden" name="step8[tour][<?php echo $key; ?>][crossing][{{$crossing_cnt}}][{{$csvalue->company_id}}][ship_crossing_id]" value="{{$csvalue->id}}">
                                                                        <input readonly class="form-control pointerNone" type="text" value="{{ $csvalue->cost_euro }}" name="step8[tour][<?php echo $key; ?>][crossing][{{$crossing_cnt}}][{{$csvalue->company_id}}][cost_euro]" id="cost_euro">
                                                                        <p class="exp_error" style="display:none;color: red;">Please enter staff to guest</p>
                                                                    </td>
                                                                    <td>
                                                                        
                                                                        <input readonly  class="form-control pointerNone" type="text" value="{{ $csvalue->cost_ss_euro }}" name="step8[tour][<?php echo $key; ?>][crossing][{{$crossing_cnt}}][{{$csvalue->company_id}}][cost_ss_euro]" id="cost_ss_euro">
                                                                        <p class="exp_error" style="display:none;color: red;">Please enter staff to guest</p>
                                                                    </td>
                                                                    
                                                                  
                                                                </tr>
                                                     <?php
                                                     $crossing_cnt++;
                                                        $cnts++;
                                                        }
                                                     } } } ?>
                                                     </table>
                                                </div>
                                               
                                            </div>
                                           
                                        
                                       
                                    </div>
                                    @endforeach
                                   
                                    </div>
                                   <!--  @if(!empty($crossingDetail))
                                        @foreach($crossingDetail as $crossinval)
                                        <div class="col-sm-2 display_pound_rate_<?php echo $key; ?> pound_colunm_out_<?php echo $key; ?>">
                                            <div class="form-group">
                                                <label>Cost of crossing pp (€)<br/>{{$crossinval->company_name}}</label>
                                                <input type="hidden" name="step8[tour][<?php echo $key; ?>][crossing][{{$crossing_cnt}}][{{$value->company_id}}][id]" value="{{$crossinval->sd_id}}">
                                                <input type="hidden" name="step8[tour][<?php echo $key; ?>][crossing][{{$crossing_cnt}}][{{$value->company_id}}][company_id]" value="{{$crossinval->id}}">
                                                <input type="text" readonly class="pointerNone form-control decimal" value="{{!empty($crossinval->cost_pound)?sprintf('%0.2f',$crossinval->cost_pound):sprintf('%0.2f',$crossinval->company_cost_pound)}}" id="rate_pound_<?php echo $key; ?>" name="step8[tour][<?php echo $key; ?>][crossing][{{$crossing_cnt}}][{{$value->company_id}}][cost_pound]" required>
                                            </div>
                                        </div>
                                        <?php $crossing_cnt++;?>
                                        @endforeach
                                    @endif -->
                                    
                                </div>
                                </div>
                        </div><!-- End Tab 1 -->    
                            <!-- <div class="col-sm-2">
                                <div class="form-group">
                                    <label>No of nights</label>
                                    <input type="text" class="form-control pointerNone" name="step8[tour][<?php echo $key; ?>][nights]" value="{{$value->nights}}" readonly>
                                </div>
                            </div> -->
                            <?php 
                            if(!empty($hotel_id))
                            {
                                $hotel_cart_list =  


DB::connection('mysql_veenus')->table('experiences_to_hotels')->selectRaw('experiences_to_hotels.id,c.id as cart_id')
                            ->leftjoin('cart_experiences as c', 'c.experiences_id', '=', 'experiences_to_hotels.experiences_id')
                            ->leftjoin('cart_experiences_to_tour_statuses as cs', 'cs.cart_experiences_id', '=', 'c.id')
                            ->where('experiences_to_hotels.hotels_id', $hotel_id)
                            ->where('c.completed','!=','1')
                            ->where('cs.tour_statuses_id', '1')->where('cs.sign_name','!=', null)->get()->toArray();

                            $hotel_book_date_id = !empty($booked_hotel_date_id)?$booked_hotel_date_id:'';
                            $book_hotel_cart_list =  


DB::connection('mysql_veenus')->table('experiences_to_hotels_to_experience_dates')->selectRaw('ex.id,c.id as cart_id,c.signed_document,experiences_to_hotels_to_experience_dates.experience_dates_id')
                           /* ->leftjoin('experiences_to_hotels as ex', 'ex.id', '=', 'experiences_to_hotels_to_experience_dates.experiences_to_hotels_id')
                          
                            ->leftjoin('cart_experiences as c', 'c.experiences_id', '=', 'ex.experiences_id')
                            ->leftjoin('cart_experiences_to_tour_statuses as cs', 'cs.cart_experiences_id', '=', 'c.id')*/
                            ->leftjoin('experience_dates as ex', 'ex.id', '=', 'experiences_to_hotels_to_experience_dates.experience_dates_id')
                            ->leftjoin('cart_experiences as c', 'c.dates_rates_id', '=', 'ex.dates_rates_id')
                            ->leftjoin('cart_experiences_to_tour_statuses as cs', 'cs.cart_experiences_id', '=', 'c.id')
                            ->where('experiences_to_hotels_to_experience_dates.hotel_dates_id', $hotel_book_date_id)
                            ->where('c.completed','!=','1')

                            ->where('ex.date_from',$date_from)
                            ->where('ex.date_to',$date_to)
                            ->where('cs.tour_statuses_id', '1')->where('cs.sign_name','!=', null)->orderBy('experiences_to_hotels_to_experience_dates.id','desc')->get()->toArray();
                            }
                            
                            
                            
                            $is_hotel_assieged = 0;
                             if(!empty($book_hotel_cart_list[0]->cart_id)) 
                             {
                               // $is_hotel_assieged = 1;
                             }
                                ?>
                            <div class="row rate_field">
                                <a href="javascript:;" class="btn orangeLink editDate <?=!empty($is_hotel_assieged)?'booked_hotel':''?>"  data-cart_id="<?=!empty($book_hotel_cart_list[0]->cart_id)?$book_hotel_cart_list[0]->cart_id:''?>" style="margin-bottom: 20px;margin-right: 15px;">Edit</a>
                                <a href="javascript:;" class="mt-5 btn orangeLink saveDates" style="display:none;margin-bottom: 20px;margin-right: 15px;">Save Date</a>
                                 <?php if($cls != 'bookDates'){ ?>
                                <a href="javascript:;" class="btn orangeLink removeCruiseDatesRates" style="margin-bottom: 20px;" data-id="{{$value->id}}">Remove and return to stock list</a>
                            <?php } else { ?> 
                                <!--  <a href="javascript:;" class="btn orangeLink removeCruiseDatesRates" style="margin-bottom: 20px;" onclick="return confirm('Are you sure you want to remove?')"  data-id="{{$value->id}}">Remove and return to stock list</a> -->
                            <?php }?>
                            </div>
                    </div>
                </div>
            
                <?php
                        /*if(!empty($e_dates)){
                            foreach ($e_dates as $dates_rates_id => $val) {
                                $_dateMin = min($val['date_from']);
                                $_dateMax = max($val['date_to']);
                                if(!empty($dates_rates_id)){
                                    // $cart_experiences = 


DB::connection('mysql_veenus')->table('cart_experiences')->where('dates_rates_id', $dates_rates_id)->where('experiences_id', $value->experience_id)->where('date_from', date('Y-m-d',$_dateMin))->where('date_to', date('Y-m-d',$_dateMax))->where('deleted_at',null)->first();
                                    $cart_experiences2 = 


DB::connection('mysql_veenus')->table('cart_experiences')->where('dates_rates_id', $dates_rates_id)->where('experiences_id', $value->experience_id)->where('date_from', date('Y-m-d',$_dateMin))->where('date_to', date('Y-m-d',$_dateMax))->where('deleted_at',null)->where('completed', 1)->first();

                                    $cart_experiences3 = 


DB::connection('mysql_veenus')->table('cart_experiences')->where('dates_rates_id', $dates_rates_id)->where('experiences_id', $value->experience_id)->where('date_from', date('Y-m-d',$_dateMin))->where('date_to', date('Y-m-d',$_dateMax))->where('deleted_at',null)->where('full_cancel', 1)->first();
                                    // pr($val['mark_as_completed']);
                                    if(in_array(1,$val['mark_as_completed']) && ($value->mark_as_completed_etc != 1) || (!empty($cart_experiences2) || !empty($cart_experiences3))){
                                        ?>
                                        <style type="text/css">
                                            .dates_rates_div<?php echo $dates_rates_id; ?>{
                                                display: none;
                                            }
                                        </style>
                                        <?php
                                    }
                                }
                            }
                        }*/
                    }
                }else{
                ?>
                <div class="parentDiv" data-key="0" style="border: 3px solid #ddd;border-radius: 5px;margin: 15px 0px;min-height: 100px;">
                    <input type="hidden" name="step8[tour][0][dates_rates_id]" value="">
                    <div class="appendHotel">
                        <div class="hotelDiv" data-key="0">
                            <div style="border: 1px solid #ddd;border-radius: 5px;margin: 15px;padding: 20px;">
                                <div class="form-group">
                                    <input type="hidden" name="step8[tour][0][hotel][0][experience_hotel_date_id]" value="">
                                    <input type="hidden" name="step8[tour][0][hotel][0][experience_date_id]" value="">
                                    <label>Choose a hotel</label>
                                    <select class="form-control hotelDropDown" name="step8[tour][0][hotel][0][hotel_id]" required="">
                                        <option value="">Select One</option>
                                        <?php 
                                            if(!empty($hotelList)){
                                            foreach ($hotelList as $key => $value) {  
                                             ?>
                                                <option value="{{$value->id}}">{{$value->name}}</option>
                                            <?php } } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Dates</label>
                                    <select class="form-control datesDropDown" name="step8[tour][0][hotel][0][date]" required="">
                                        <option value="">-</option>
                                    </select>
                                </div>
                                <div class="form-group" style="display: inline-flex;width: 100%;margin-bottom:2px;">
                                    <label style="font-weight: bold;color: black;width: 75px;font-size: 16px;margin-right: 10px;">Type:</label>
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="radio" name="step8[tour][0][hotel][0][type]" id="inlineRadio100" value="1" required>
                                      <label class="form-check-label" for="inlineRadio100" style="font-size: 0.98rem;color: #495057;">Standard</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="radio" name="step8[tour][0][hotel][0][type]" id="inlineRadio200" value="0" required>
                                      <label class="form-check-label" for="inlineRadio200" style="font-size: 0.98rem;color: #495057;">Upscale</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-12">
                                <a href="javascript:;" class="addHotel" style="color:orange;width: 100%;display: inline-block;margin-bottom: 20px;">Combine this date with another hotel</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <label style="margin-top: 15px;">Tour rate</label>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>Currency</label>
                                    <select class="form-control" name="step8[tour][0][currency]" required>
                                        <option value="1">&pound;</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>Rate</label>
                                    <input type="text" class="form-control" name="step8[tour][0][rate]" required>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>SS</label>
                                    <input type="text" class="form-control" name="step8[tour][0][srs]" required>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>Deposit</label>
                                    <input type="text" class="form-control" name="step8[tour][0][deposit]" required>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>Single SS</label>
                                    <input type="text" class="form-control" name="step8[tour][0][single_srs]" required>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>Double SS</label>
                                    <input type="text" class="form-control" name="step8[tour][0][double_srs]" required>
                                </div>
                            </div>
                             <div class="col-sm-2">
                                <div class="form-group">
                                    <label>Twin SS</label>
                                    <input type="text" class="form-control" name="step8[tour][0][twin_srs]" required>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>Triple SS</label>
                                    <input type="text" class="form-control" name="step8[tour][0][triple_srs]" required>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>Quad SS</label>
                                    <input type="text" class="form-control" name="step8[tour][0][quad_srs]" required>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>Driver SS</label>
                                    <input type="text" class="form-control" name="step8[tour][0][driver_srs]" required>
                                </div>
                            </div>
                            <!-- <div class="col-sm-2">
                                <div class="form-group">
                                    <label>No of nights</label>
                                    <input type="text" class="form-control" name="step8[tour][0][nights]">
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            <?php } ?>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <a href="javascript:;" class="btn orangeLink addAnotherDateCruise" style="margin-bottom: 15px;">Add another date</a>
                </div>
            </div>
            
            <div class="row">
                <div class="col-sm-12">
                    <b>Additional Text</b><br><br>
                </div>
                <div class="col-sm-3">
                    <input name="step8[additional][1][id]" type="hidden" value="{{ isset($experience->ExperienceDateAdditionalTexts[0]->id) ? $experience->ExperienceDateAdditionalTexts[0]->id : ''}}">
                    <div class="form-group">
                        <label for="Category1">Additional Subtitle</label>
                        <input name="step8[additional][1][subtitle]" class="form-control" value="{{ isset($experience->ExperienceDateAdditionalTexts[0]->name) ? $experience->ExperienceDateAdditionalTexts[0]->name : ''}}">
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="Category1">Additional Text</label>
                        <textarea name="step8[additional][1][text]" class="form-control" rows="2">{{ isset($experience->ExperienceDateAdditionalTexts[0]->text) ? $experience->ExperienceDateAdditionalTexts[0]->text : ''}}</textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <input name="step8[additional][2][id]" type="hidden" value="{{ isset($experience->ExperienceDateAdditionalTexts[1]->id) ? $experience->ExperienceDateAdditionalTexts[1]->id : ''}}">
                        <label for="Category1">Additional Subtitle</label>
                        <input name="step8[additional][2][subtitle]" class="form-control" value="{{ isset($experience->ExperienceDateAdditionalTexts[1]->name) ? $experience->ExperienceDateAdditionalTexts[1]->name : ''}}">
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="Category1">Additional Text</label>
                        <textarea name="step8[additional][2][text]" class="form-control" rows="2">{{ isset($experience->ExperienceDateAdditionalTexts[1]->text) ? $experience->ExperienceDateAdditionalTexts[1]->text : ''}}</textarea>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-sm-12">
                    <div class="selected_tour">
                    
                </div>
                     <textarea style="visibility: hidden;" value="" name="changed_note" id="changed_note"></textarea>
                <input type="hidden" value="" name="is_changed" id="is_changed">
                    <input style="font-size: 16px;" type="submit" name="submit" value="Save" class="orangeLink btn submitButton">
                </div>
            </div>
        </div>

    </div>


</div>
<script type="text/javascript">
    $('.delistDate').click(function(){
        $('.appendDelistDiv').toggle();
    })
    $('.decimal').keypress(function(evt){
    return (/^[0-9]*\.?[0-9]*$/).test($(this).val()+evt.key);
});
    $(document).ready(function(){
        //$('.display_pound_srs').hide();
        //$('.display_pound_srs_other').hide();
        //$('.display_pound_other').hide();
         //$('.display_euro_srs_other').hide();
        //$('.display_euro_other').hide();
        $('.adjust_individually').click(function(){
           var id = $(this).data('id');
           var srs =  $("#srs_pound_"+id).val();
           var single =  $("#single_srs_pound_"+id).val();
           var double =  $("#double_srs_pound_"+id).val();
           var twin =  $("#twin_srs_pound_"+id).val();
           var triple =  $("#triple_srs_pound_"+id).val();
           var quad =  $("#quad_srs_pound_"+id).val();
           if(single == '')
           {

            $("#single_srs_pound_"+id).val(srs);
           }
           if(double == '')
           {
            $("#double_srs_pound_"+id).val(srs);
           }
           if(twin == '')
           {
            $("#twin_srs_pound_"+id).val(srs);
           }
           if(triple == '')
           {
            $("#triple_srs_pound_"+id).val(srs);
           }
           if(quad == '')
           {
            $("#quad_srs_pound_"+id).val(srs);
           }
           $('.display_pound_srs_other_'+id).toggle();
           $('.display_pound_srs_'+id).toggle();
           // $('.display_pound_srs_driver_'+id).toggle();

           if ($(this).text() === "Adjust Individually") {
                $(this).text("Collapse Individually");
              } else {
                $(this).text("Adjust Individually");
              }
        })
         $('.adjust_individually_rate').click(function(){
           var id = $(this).data('id');
           var rate =  $("#rate_pound_"+id).val();
           var single =  $("#single_pound_"+id).val();
           var double =  $("#double_pound_"+id).val();
           var twin =  $("#twin_pound_"+id).val();
           var triple =  $("#triple_pound_"+id).val();
           var quad =  $("#quad_pound_"+id).val();
           if(single == '')
           {

            $("#single_pound_"+id).val(rate);
           }
           if(double == '')
           {
            $("#double_pound_"+id).val(rate);
           }
           if(twin == '')
           {
            $("#twin_pound_"+id).val(rate);
           }
           if(triple == '')
           {
            $("#triple_pound_"+id).val(rate);
           }
           if(quad == '')
           {
            $("#quad_pound_"+id).val(rate);
           }
           $('.display_pound_other_'+id).toggle();
           $('.display_pound_rate_'+id).toggle();
           //$('.display_pound_rate_driver_'+id).toggle();

           if ($(this).text() === "Adjust Individually") {
                $(this).text("Collapse Individually");
              } else {
                $(this).text("Adjust Individually");
              }
           
        })
         $('.euro_adjust_individually_srs').click(function(){
           var id = $(this).data('id');
           var srs =  $("#srs_euro_"+id).val();
           var single =  $("#single_srs_euro_"+id).val();
           var double =  $("#double_srs_euro_"+id).val();
           var twin =  $("#twin_srs_euro_"+id).val();
           var triple =  $("#triple_srs_euro_"+id).val();
           var quad =  $("#quad_srs_euro_"+id).val();
           if(single == '0.00' || single == '')
           {

            $("#single_srs_euro_"+id).val(srs);
           }
           if(double == '')
           {
            $("#double_srs_euro_"+id).val(srs);
           }
           if(twin == '')
           {
            $("#twin_srs_euro_"+id).val(srs);
           }
           if(triple == '')
           {
            $("#triple_srs_euro_"+id).val(srs);
           }
           if(quad == '')
           {
            $("#quad_srs_euro_"+id).val(srs);
           }
           $('.display_euro_srs_other_'+id).toggle();
           $('.display_euro_srs_rate_'+id).toggle();

           if ($(this).text() === "Adjust Individually") {
                $(this).text("Collapse Individually");
              } else {
                $(this).text("Adjust Individually");
              }
        })
         $('.euro_adjust_individually').click(function(){
           var id = $(this).data('id');
           var rate =  $("#rate_euro_"+id).val();
           var single =  $("#single_euro_"+id).val();
           var double =  $("#double_euro_"+id).val();
           var twin =  $("#twin_euro_"+id).val();
           var triple =  $("#triple_euro_"+id).val();
           var quad =  $("#quad_euro_"+id).val();
           if(single == '')
           {

            $("#single_euro_"+id).val(rate);
           }
           if(double == '')
           {
            $("#double_euro_"+id).val(rate);
           }
           if(twin == '')
           {
            $("#twin_euro_"+id).val(rate);
           }
           if(triple == '')
           {
            $("#triple_euro_"+id).val(rate);
           }
           if(quad == '')
           {
            $("#quad_euro_"+id).val(rate);
           }
           $('.display_euro_other_'+id).toggle();
           $('.display_euro_rate_'+id).toggle();
           
           if ($(this).text() === "Adjust Individually") {
                $(this).text("Collapse Individually");
              } else {
                $(this).text("Adjust Individually");
              }
        })
    });
  
    

    /*$(document).on('change', '.select_market_option', function(e) {
       var market_option = $('.datesDropDown').find(':selected').attr('data-market-option');

       var display_value = $(this).val();
       var display_key = $(this).attr("data-id");
       var euro_rate = $(this).attr("data-euro-rate");
       var pound_rate = $(this).attr("data-pound-rate");
       //var market_option = $(this).attr("data-market-option");
       if(display_value == 1)
       {
            if(market_option == 1)
            {
                $('.pound_colunm_out_'+display_key).show();
                $('.euro_colunm_out_'+display_key).hide();
                $('.error_message_'+display_key).html('');
            }
            else
            {
                $('.error_message_'+display_key).html('This Date hasn`t been selected on the HC, please update the HC first before you enter the Date & Rate details.');
                $('.pound_colunm_out_'+display_key).hide();
                $('.euro_colunm_out_'+display_key).show();
                
                //alert('This Date hasn`t been selected on the HC, please update the HC first before you enter the Date & Rate details.');
            }
            
       }
       else if(display_value == 2)
       {
            if(market_option == 2)
            {
                $('.pound_colunm_out_'+display_key).hide();
                $('.euro_colunm_out_'+display_key).show();
                $('.error_message_'+display_key).html('');
            }
            else
            {
                $('.error_message_'+display_key).html('This Date hasn`t been selected on the HC, please update the HC first before you enter the Date & Rate details.');
                $('.pound_colunm_out_'+display_key).hide();
                $('.euro_colunm_out_'+display_key).show();
                
                //alert('This Date hasn`t been selected on the HC, please update the HC first before you enter the Date & Rate details.');
            }
            
       }
       else
       {
            if(market_option != 3)
            {
                 $('.error_message_'+display_key).html('This Date hasn`t been selected on the HC, please update the HC first before you enter the Date & Rate details.');
            }
            else
            {
                $('.error_message_'+display_key).html('');
            }
            $('.pound_colunm_out_'+display_key).show();
            $('.euro_colunm_out_'+display_key).show();
       }
    });*/
</script>
{!! Form::close() !!}
<script type="text/javascript">
    $('.select-tab').click(function(){
            $(this).parent().children('.select-tab').removeClass('active');
            $(this).addClass('active')
        var id = $(this).attr('data-id');
        //$('.select-tab').removeClass('manual');
        //$(this).addClass('manual');
        
        
        $('.select-tab').attr('aria-selected',false);
        $(this).attr('aria-selected',true);
        

        $(this).parent().parent().parent().children('.content-tab').hide();
        //$(this).closest('.content-tab').hide();
        $('#tabpanel-'+id).show();
    })
    $('.select-crossing').click(function(){
        $(this).parent().parent().children().children('.select-crossing').removeClass('active');
        $(this).addClass('active')
        var id = $(this).attr('data-id');
        //$('.select-crossing').removeClass('manual');
        //$(this).addClass('manual');
        
        
        $('.select-crossing').attr('aria-selected',false);
        $(this).attr('aria-selected',true);
        
        //$(this).parent().parent().parent().children('.crossing-tab').hide();
        $('.crossing-tab').hide();
        $('#'+id).show();
    })
        
    $(document).on('click','.rate_type_select', function(){
        var value = $(this).val();
        var id = $(this).data('id');

        if ($(this).prop('checked')==true){ 
            if(value == 1)
            {
                $('.pound_tab'+id).show();
                $('.euro_tab'+id).hide();
            }
            else if(value == 2)
            {
                $('.pound_tab'+id).hide();
                $('.euro_tab'+id).show();
            }
            else
            {
                $('.pound_tab'+id).show();
                $('.euro_tab'+id).show();
            }
        }
        
    });

</script>