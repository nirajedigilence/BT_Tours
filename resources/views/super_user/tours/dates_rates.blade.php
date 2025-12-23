<style type="text/css">
    .row.rate_field {
        margin: 5px;
    }
</style>
{!! Form::open(array('route' => 'tour-standard-update','method'=>'POST', 'enctype' => 'multipart/form-data', 'class'=>'tourCompleteSteps', 'id'=>'tourCompleteSteps')) !!}
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

            <div class="appendParentDiv">
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
                        $exp_dates_data = App\Models\Cms\ExperienceDate::select('id','sign_name_hc','mark_as_completed','unbooked')->where('dates_rates_id',$value->id)->first();
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
                <div class="parentDiv dates_rates_div{{$value->id}} {{$cls}}" data-key="<?php echo $key; ?>" style="border: 3px solid #ddd;border-radius: 5px;margin: 15px 2px;min-height: 100px;<?php echo $sty; ?>">
                    <input type="hidden" name="step8[tour][<?php echo $key; ?>][dates_rates_id]" value="{{$value->id}}">
                    <div class="appendHotel">
                        @if (isset($experience->еxperiencesToHotelsToExperienceDates))
                            @foreach ($experience->еxperiencesToHotelsToExperienceDates as $k => $rec)
                            
                                @if (isset($rec->experienceDate))
                                    @if ($value->id == $rec->experienceDate->dates_rates_id)
                                        <?php 
                                        $e_dates[$rec->experienceDate->dates_rates_id]['mark_as_completed'][] = $rec->experienceDate->mark_as_completed;
                                        $e_dates[$rec->experienceDate->dates_rates_id]['date_from'][] = strtotime($rec->experienceDate->date_from);
                                        $e_dates[$rec->experienceDate->dates_rates_id]['date_to'][] = strtotime($rec->experienceDate->date_to);
                                    
                                        
                                        ?>
                                        <div class="hotelDiv" data-key="<?php echo $k; ?>">
                                            <div class="col-sm-12">
                                                <?php if($i != 0){ echo '<b>Combined with</b>'; } $i++; ?><?php if($cls != 'bookDates') { ?> 
                                                <!-- <a href="javascript:;" style="float:right;color:red;display: none;" class="removeHotelDiv" data-id="{{$rec->experienceDate->id}}"><i class="fa fa-times fa-2x"></i></a> -->
                                                <?php } ?></div>
                                            <div style="border: 1px solid #ddd;border-radius: 5px;margin: 15px;padding: 20px;">
                                                <div class="form-group" style="display: inline-flex;width: 100%;margin-bottom:2px;">
                                                    <input type="hidden" name="step8[tour][<?php echo $key; ?>][hotel][<?php echo $k; ?>][experience_hotel_date_id]" value="{{$rec->id}}">
                                                    <input type="hidden" name="step8[tour][<?php echo $key; ?>][hotel][<?php echo $k; ?>][experience_date_id]" value="{{$rec->experienceDate->id}}">
                                                    <label style="font-weight: bold;color: black;margin: 8px 0px;width: 75px;font-size: 16px;margin-right: 10px;">Hotel:</label>
                                                    <select <?=($cls != 'bookDates')?'':'disabled'?> class="form-control hotelDropDown pointerNone" name="step8[tour][<?php echo $key; ?>][hotel][<?php echo $k; ?>][hotel_id]" required="" readonly>
                                                        <option value="">Select One</option>
                                                        <?php 
                                                            if(!empty($hotelList)){
                                                            foreach ($hotelList as $kk => $val) {
                                                                $selected = '';
                                                                if(isset($rec->hotel->id) && $rec->hotel->id == $val->id){
                                                                    $selected = 'selected';
                                                                }
                                                             ?>
                                                                <option value="{{$val->id}}" {{$selected}}>{{$val->name}}</option>
                                                            <?php } } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group" style="display: inline-flex;width: 100%;margin-bottom:2px;">
                                                    <label style="font-weight: bold;color: black;margin: 8px 0px;width: 75px;font-size: 16px;margin-right: 10px;">Date:</label>
                                                    <select <?=($cls != 'bookDates')?'':'disabled'?> data-id="<?php echo $key; ?>"  class="form-control datesDropDown pointerNone" name="step8[tour][<?php echo $key; ?>][hotel][<?php echo $k; ?>][date]" readonly>
                                                        <option value="">-</option>
                                                        <?php
                                                        if(!empty($rec->hotel->id)){
                                                            $hotelDates = 


DB::connection('mysql_veenus')->table('hotel_dates')->where('hotel_id', $rec->hotel->id)->where('deleted_at', null)->get()->toArray();
                                                            $date_from = $rec->experienceDate->date_from;
                                                            $date_to = $rec->experienceDate->date_to;

                                                            $id = $rec->experienceDate->hotel_date_id;
                                                            
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
                                                    <label style="font-weight: bold;color: black;width: 75px;font-size: 16px;margin-right: 10px;">Standard:</label>
                                                    <div class="labelDiv" style="color: #495057;">
                                                    <?php
                                                    if($rec->experienceDate->type_id == 1){
                                                        echo 'Standard';
                                                    }elseif($rec->experienceDate->type_id == 0){
                                                        echo 'Upscale';
                                                    }
                                                    ?>
                                                    </div>

                                                    <div class="form-check form-check-inline radioDiv" style="display:none;">
                                                      <input <?=($cls != 'bookDates')?'':''?> class="form-check-input" type="radio" name="step8[tour][<?php echo $key; ?>][hotel][<?php echo $k; ?>][type]" id="inlineRadio1<?php echo $key.$k; ?>" value="1" required <?php echo ($rec->experienceDate->type_id == 1) ? 'checked' : ''; ?>>
                                                      <label class="form-check-label" for="inlineRadio1<?php echo $key.$k; ?>" style="font-size: 0.98rem;color: #495057;">Standard</label>
                                                    </div>
                                                    <div class="form-check form-check-inline radioDiv" style="display:none;">
                                                      <input class="form-check-input" type="radio" name="step8[tour][<?php echo $key; ?>][hotel][<?php echo $k; ?>][type]" id="inlineRadio2<?php echo $key.$k; ?>" value="0" required <?php echo ($rec->experienceDate->type_id == 0) ? 'checked' : ''; ?>>
                                                      <label class="form-check-label" for="inlineRadio2<?php echo $key.$k; ?>" style="font-size: 0.98rem;color: #495057;">Upscale</label>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group" style="display: inline-flex;width: 100%;margin-bottom:2px;">
                                                    <label style="font-weight: bold;color: black;width: 75px;font-size: 16px;margin-right: 10px;">Type:</label>
                                                    <div class="labelDiv" style="color: #495057;">
                                                    <?php
                                                    if($rec->experienceDate->experience_type == 1){
                                                        echo 'Primary';
                                                    }elseif($rec->experienceDate->experience_type == 2){
                                                        echo 'Secondary';
                                                    }
                                                    elseif($rec->experienceDate->experience_type == 3){
                                                        echo 'Overnight';
                                                    }
                                                    
                                                    ?>
                                                    </div>
                                                    
                                                    <div class="form-check form-check-inline radioDiv" style="display:none;">
                                                      <input <?=($cls != 'bookDates')?'':''?> class="form-check-input" type="radio" name="step8[tour][<?php echo $key; ?>][hotel][<?php echo $k; ?>][experience_type]" id="typeInlineRadio1<?php echo $key.$k; ?>" value="1"  <?php echo ($rec->experienceDate->experience_type == 1) ? 'checked' : ''; ?>>
                                                      <label class="form-check-label" for="typeInlineRadio1<?php echo $key.$k; ?>" style="font-size: 0.98rem;color: #495057;">Primary</label>
                                                    </div>
                                                    <div class="form-check form-check-inline radioDiv" style="display:none;">
                                                      <input class="form-check-input" type="radio" name="step8[tour][<?php echo $key; ?>][hotel][<?php echo $k; ?>][experience_type]" id="typeInlineRadio2<?php echo $key.$k; ?>" value="2"  <?php echo ($rec->experienceDate->experience_type == 2) ? 'checked' : ''; ?>>
                                                      <label class="form-check-label" for="typeInlineRadio2<?php echo $key.$k; ?>" style="font-size: 0.98rem;color: #495057;">Secondary</label>
                                                    </div>
                                                    <div class="form-check form-check-inline radioDiv" style="display:none;">
                                                      <input class="form-check-input" type="radio" name="step8[tour][<?php echo $key; ?>][hotel][<?php echo $k; ?>][experience_type]" id="typeInlineRadio2<?php echo $key.$k; ?>" value="3"  <?php echo ($rec->experienceDate->experience_type == 3) ? 'checked' : ''; ?>>
                                                      <label class="form-check-label" for="typeInlineRadio2<?php echo $key.$k; ?>" style="font-size: 0.98rem;color: #495057;">Overnight</label>
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
                                        <?php $hotel_id = $rec->hotel->id; ?>
                                    @endif
                                @endif
                            @endforeach
                        @endif
                    </div>
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-12">
                                <a href="javascript:;" class="addHotel" style="color:orange;width: 100%;display: none;margin-bottom: 20px;">Combine this date with another hotel</a>
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
                        <div class="row">
                            
                                <!--  <div class="col-sm-2">
                                <div class="form-group">
                                    <label>Market</label>
                                 
                                       <select style="padding:5px;width:50%;" class="form-control pointerNone select_market_option" data-id="<?php echo $key; ?>" name="step8[tour][<?php echo $key; ?>][currency]" id="select_market_option_<?php echo $key; ?>" data-euro-rate="<?=!empty($rate_dbb_euro)?$rate_dbb_euro:''?>" data-pound-rate="<?=!empty($rate_dbb_pound)?$rate_dbb_pound:''?>" data-market-option="<?=!empty($hotel_market_option)?$hotel_market_option:'1'?>" readonly>
                                        <option value="">Select market</option>
                                        <option value="1" <?=(!empty($value->currency) && $value->currency == '1')?'selected':''?>>UK</option>
                                        <option value="2" <?=(!empty($value->currency) && $value->currency == '2')?'selected':''?>>EU</option>
                                        <option value="3" <?=(!empty($value->currency) && $value->currency == '3')?'selected':''?>>UK & EU</option>
                                    </select>
                                   
                                </div>
                            </div>
                            
                            <div class="col-sm-12">
                                <label style="margin-top: 15px;">Tour rate </label> <div class="error error_message_<?php echo $key; ?>"></div>

                            </div> -->
                           
                                <div class="row rate_field">
                                     <?php
                                        $colps = '';
                                        $colpsrate = 'style="display:none"';
                                        if($value->rate == $value->single && $value->rate == $value->double && $value->rate == $value->twin && $value->rate == $value->triple && $value->rate == $value->quad)
                                        {

                                            $colps='style="display:none"';
                                             $colpsrate='';
                                        }
                                    ?>
                                    <div class="col-sm-2 display_pound_rate_<?php echo $key; ?> display_rate pound_colunm_out_<?php echo $key; ?>" <?=(!empty($value->currency) && ($value->currency == '1' || $value->currency == '3'))?$colpsrate:'style="display:none"'?>>
                                        <div class="form-group">
                                            <label>Rate (&#163;)</label>
                                            <input type="text" id="rate_pound_<?php echo $key; ?>"  class="form-control decimal pointerNone ssd" name="step8[tour][<?php echo $key; ?>][rate]" value="{{sprintf('%0.2f',$value->rate)}}" readonly>
                                        </div>
                                    </div>
                                   
                                    <div class="col-sm-2 display_pound_other_<?php echo $key; ?> display_pound_other pound_colunm_out_<?php echo $key; ?>" <?=(!empty($value->currency) && ($value->currency == '1' || $value->currency == '3'))?$colps:'style="display:none"'?>>
                                        <div class="form-group">
                                            <label>Single (&#163;)</label>
                                            <input type="text" id="single_pound_<?php echo $key; ?>" class="form-control decimal pointerNone" name="step8[tour][<?php echo $key; ?>][single]" value="{{sprintf('%0.2f',$value->single)}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-2 display_pound_other_<?php echo $key; ?> display_pound_other pound_colunm_out_<?php echo $key; ?>" <?=(!empty($value->currency) && ($value->currency == '1' || $value->currency == '3'))?$colps:'style="display:none"'?>>
                                        <div class="form-group">
                                            <label>Double (&#163;)</label>
                                            <input type="text" id="double_pound_<?php echo $key; ?>" class="form-control decimal pointerNone" name="step8[tour][<?php echo $key; ?>][double]" value="{{sprintf('%0.2f',$value->double)}}" readonly>
                                        </div>
                                    </div>
                                     <div class="col-sm-2 display_pound_other_<?php echo $key; ?> display_pound_other pound_colunm_out_<?php echo $key; ?>" <?=(!empty($value->currency) && ($value->currency == '1' || $value->currency == '3'))?$colps:'style="display:none"'?>>
                                        <div class="form-group">
                                            <label>Twin (&#163;)</label> 
                                            <input type="text" id="twin_pound_<?php echo $key; ?>"  class="form-control decimal pointerNone" name="step8[tour][<?php echo $key; ?>][twin]" value="{{sprintf('%0.2f',$value->twin)}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-2 display_pound_other_<?php echo $key; ?> display_pound_other pound_colunm_out_<?php echo $key; ?>" <?=(!empty($value->currency) && ($value->currency == '1' || $value->currency == '3'))?$colps:'style="display:none"'?>>
                                        <div class="form-group">
                                            <label>Triple (&#163;)</label>
                                            <input type="text" id="triple_pound_<?php echo $key; ?>" class="form-control decimal pointerNone" name="step8[tour][<?php echo $key; ?>][triple]" value="{{sprintf('%0.2f',$value->triple)}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-2 display_pound_other_<?php echo $key; ?> display_pound_other pound_colunm_out_<?php echo $key; ?>" <?=(!empty($value->currency) && ($value->currency == '1' || $value->currency == '3'))?$colps:'style="display:none"'?>>
                                        <div class="form-group">
                                            <label>Quad (&#163;)</label>
                                            <input type="text" id="quad_pound_<?php echo $key; ?>" class="form-control decimal pointerNone" name="step8[tour][<?php echo $key; ?>][quad]" value="{{sprintf('%0.2f',$value->quad)}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-2  display_pound_rate_driver_<?php echo $key; ?> display_rate pound_colunm_out_<?php echo $key; ?>" <?=(!empty($value->currency) && ($value->currency == '1' || $value->currency == '3'))?'':'style="display:none"'?>>
                                        <div class="form-group">
                                            <label>Driver (&#163;)</label>
                                            <input type="text" id="driver_pound_<?php echo $key; ?>"  class="form-control decimal pointerNone" name="step8[tour][<?php echo $key; ?>][driver]" value="{{sprintf('%0.2f',$value->driver)}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 pound_colunm_out_<?php echo $key; ?>" <?=(!empty($value->currency) && ($value->currency == '1' || $value->currency == '3'))?'':$colps?>>
                                        <a href="javascript:void()" data-id="<?php echo $key; ?>" style="color:orange;" class="adjust_individually_rate"><?=!empty($colps)?'Adjust Individually':'Collapse Individually'?></a>
                                    </div>
                                </div>
                                <div class="row rate_field">
                                    <?php
                                        $colps1 = '';
                                        $colpssrs = 'style="display:none"';
                                        if($value->srs == $value->single_srs && $value->srs == $value->double_srs && $value->srs == $value->twin_srs && $value->srs == $value->triple_srs && $value->srs == $value->quad_srs)
                                        {
                                            $colps1='style="display:none"';
                                             $colpssrs='';
                                        }
                                    ?>
                                    <div class="col-sm-2 display_pound_srs_<?php echo $key; ?> display_pound_srs  pound_colunm_out_<?php echo $key; ?>" <?=(!empty($value->currency) && ($value->currency == '1' || $value->currency == '3'))?$colpssrs:'style="display:none"'?>>
                                        <div class="form-group">
                                            <label>SS (&#163;)</label>
                                            <input type="text" id="srs_pound_<?php echo $key; ?>"  class="form-control decimal pointerNone" name="step8[tour][<?php echo $key; ?>][srs]" value="{{sprintf('%0.2f',$value->srs)}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-2 display_pound_srs_other display_pound_srs_other_<?php echo $key; ?> pound_colunm_out_<?php echo $key; ?>" <?=(!empty($value->currency) && ($value->currency == '1' || $value->currency == '3'))?$colps1:'style="display:none"'?>>
                                        <div class="form-group">
                                            <label>Single SS (&#163;)</label>
                                            <input type="text" id="single_srs_pound_<?php echo $key; ?>" class="form-control decimal pointerNone" name="step8[tour][<?php echo $key; ?>][single_srs]" value="{{sprintf('%0.2f',$value->single_srs)}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-2 display_pound_srs_other display_pound_srs_other_<?php echo $key; ?> pound_colunm_out_<?php echo $key; ?>" <?=(!empty($value->currency) && ($value->currency == '1' || $value->currency == '3'))?$colps1:'style="display:none"'?>>
                                        <div class="form-group">
                                            <label>Double SS (&#163;)</label>
                                            <input type="text" id="double_srs_pound_<?php echo $key; ?>" class="form-control decimal pointerNone" name="step8[tour][<?php echo $key; ?>][double_srs]" value="{{sprintf('%0.2f',$value->double_srs)}}" readonly>
                                        </div>
                                    </div>
                                     <div class="col-sm-2 display_pound_srs_other display_pound_srs_other_<?php echo $key; ?> pound_colunm_out_<?php echo $key; ?>" <?=(!empty($value->currency) && ($value->currency == '1' || $value->currency == '3'))?$colps1:'style="display:none"'?>>
                                        <div class="form-group">
                                            <label>Twin SS (&#163;)</label> 
                                            <input type="text" id="twin_srs_pound_<?php echo $key; ?>" class="form-control decimal pointerNone" name="step8[tour][<?php echo $key; ?>][twin_srs]" value="{{sprintf('%0.2f',$value->twin_srs)}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-2 display_pound_srs_other display_pound_srs_other_<?php echo $key; ?> pound_colunm_out_<?php echo $key; ?>" <?=(!empty($value->currency) && ($value->currency == '1' || $value->currency == '3'))?$colps1:'style="display:none"'?>>
                                        <div class="form-group">
                                            <label>Triple SS (&#163;)</label>
                                            <input type="text" id="triple_srs_pound_<?php echo $key; ?>" class="form-control decimal pointerNone" name="step8[tour][<?php echo $key; ?>][triple_srs]" value="{{sprintf('%0.2f',$value->triple_srs)}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-2 display_pound_srs_other display_pound_srs_other_<?php echo $key; ?> pound_colunm_out_<?php echo $key; ?>" <?=(!empty($value->currency) && ($value->currency == '1' || $value->currency == '3'))?$colps1:'style="display:none"'?>>
                                        <div class="form-group">
                                            <label>Quad SS (&#163;)</label>
                                            <input type="text" id="quad_srs_pound_<?php echo $key; ?>" class="form-control decimal pointerNone" name="step8[tour][<?php echo $key; ?>][quad_srs]" value="{{sprintf('%0.2f',$value->quad_srs)}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-2 display_pound_srs_driver_<?php echo $key; ?> display_pound_srs pound_colunm_out_<?php echo $key; ?>" <?=(!empty($value->currency) && ($value->currency == '1' || $value->currency == '3'))?'':'style="display:none"'?>>
                                        <div class="form-group">
                                            <label>Driver SS (&#163;)</label>
                                            <input type="text" id="driver_srs_pound_<?php echo $key; ?>" class="form-control decimal pointerNone" name="step8[tour][<?php echo $key; ?>][driver_srs]" value="{{sprintf('%0.2f', $value->driver_srs)}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 pound_colunm_out_<?php echo $key; ?>" <?=(!empty($value->currency) && ($value->currency == '1' || $value->currency == '3'))?'':$colps1?>>
                                        <a href="javascript:void()" style="color:orange;" data-id="<?php echo $key; ?>" class="adjust_individually"><?=!empty($colps1)?'Adjust Individually':'Collapse Individually'?></a>
                                    </div>
                                </div>
                                <div class="row rate_field" style="float: left;width: 100%;">
                                    <div class="col-sm-2 pound_colunm_out_<?php echo $key; ?>" <?=(!empty($value->currency) && ($value->currency == '1' || $value->currency == '3'))?'':'style="display:none"'?>>
                                        <div class="form-group">
                                            <label>Deposit (&#163;)</label>
                                            <input type="text" class="form-control decimal pointerNone" name="step8[tour][<?php echo $key; ?>][deposit]" value="{{sprintf('%0.2f', $value->deposit)}}" readonly>
                                        </div>
                                    </div>
                                </div>
                                
                               <!--  <div class="col-sm-12 pound_colunm_out_<?php echo $key; ?>" <?=(!empty($value->currency) && ($value->currency == '1' || $value->currency == '3'))?'':'style="display:none"'?>>
                                    <label style="margin-top: 15px;">&nbsp;</label>

                                </div> -->
                                <?php
                                        $colpseuro = '';
                                        $colpsrateeuro = 'style="display:none"';
                                        if($value->rate_euro == $value->single_euro && $value->rate_euro == $value->double_euro && $value->rate_euro == $value->twin_euro && $value->rate_euro == $value->triple_euro && $value->rate_euro == $value->quad_euro)
                                        {
                                            $colpseuro='style="display:none"';
                                             $colpsrateeuro='';
                                        }
                                    ?>
                                <div class="row rate_field">
                                    <div class="col-sm-2 display_euro_rate_<?php echo $key; ?> euro_colunm_out_<?php echo $key; ?>" <?=(!empty($value->currency) && ($value->currency == '2' || $value->currency == '3'))?$colpsrateeuro:'style="display:none"'?>>
                                        <div class="form-group">
                                            <label>Rate (&#8364;)</label>
                                            <input type="text" id="rate_euro_<?php echo $key; ?>" class="form-control decimal pointerNone ssd" name="step8[tour][<?php echo $key; ?>][rate_euro]" value="{{sprintf('%0.2f',$value->rate_euro)}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-2 display_euro_other display_euro_other_<?php echo $key; ?> euro_colunm_out_<?php echo $key; ?>" <?=(!empty($value->currency) && ($value->currency == '2' || $value->currency == '3'))?$colpseuro:'style="display:none"'?>>
                                        <div class="form-group">
                                            <label>Single (&#8364;)</label>
                                            <input type="text" id="single_euro_<?php echo $key; ?>" class="form-control decimal pointerNone" name="step8[tour][<?php echo $key; ?>][single_euro]" value="{{sprintf('%0.2f',$value->single_euro)}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-2  display_euro_other display_euro_other_<?php echo $key; ?> euro_colunm_out_<?php echo $key; ?>" <?=(!empty($value->currency) && ($value->currency == '2' || $value->currency == '3'))?$colpseuro:'style="display:none"'?>>
                                        <div class="form-group">
                                            <label>Double (&#8364;)</label>
                                            <input type="text" id="double_euro_<?php echo $key; ?>" class="form-control decimal pointerNone" name="step8[tour][<?php echo $key; ?>][double_euro]" value="{{sprintf('%0.2f',$value->double_euro)}}" readonly>
                                        </div>
                                    </div>
                                     <div class="col-sm-2 display_euro_other display_euro_other_<?php echo $key; ?> euro_colunm_out_<?php echo $key; ?>" <?=(!empty($value->currency) && ($value->currency == '2' || $value->currency == '3'))?$colpseuro:'style="display:none"'?>>
                                        <div class="form-group">
                                            <label>Twin (&#8364;)</label> 
                                            <input type="text" id="twin_euro_<?php echo $key; ?>" class="form-control decimal pointerNone" name="step8[tour][<?php echo $key; ?>][twin_euro]" value="{{sprintf('%0.2f',$value->twin_euro)}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-2 display_euro_other display_euro_other_<?php echo $key; ?> euro_colunm_out_<?php echo $key; ?>" <?=(!empty($value->currency) && ($value->currency == '2' || $value->currency == '3'))?$colpseuro:'style="display:none"'?>>
                                        <div class="form-group">
                                            <label>Triple (&#8364;)</label>
                                            <input type="text" id="triple_euro_<?php echo $key; ?>" class="form-control decimal pointerNone" name="step8[tour][<?php echo $key; ?>][triple_euro]" value="{{sprintf('%0.2f',$value->triple_euro)}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-2 display_euro_other display_euro_other_<?php echo $key; ?> euro_colunm_out_<?php echo $key; ?>" <?=(!empty($value->currency) && ($value->currency == '2' || $value->currency == '3'))?$colpseuro:'style="display:none"'?>>
                                        <div class="form-group">
                                            <label>Quad (&#8364;)</label>
                                            <input type="text" id="quad_euro_<?php echo $key; ?>" class="form-control decimal pointerNone" name="step8[tour][<?php echo $key; ?>][quad_euro]" value="{{sprintf('%0.2f',$value->quad_euro)}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-2 display_euro_driver_rate_<?php echo $key; ?> euro_colunm_out_<?php echo $key; ?>" <?=(!empty($value->currency) && ($value->currency == '2' || $value->currency == '3'))?'':'style="display:none"'?>>
                                        <div class="form-group">
                                            <label>Driver (&#8364;)</label>
                                            <input type="text" id="driver_euro_<?php echo $key; ?>" class="form-control decimal pointerNone" name="step8[tour][<?php echo $key; ?>][driver_euro]" value="{{sprintf('%0.2f',$value->driver_euro)}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 euro_colunm_out_<?php echo $key; ?>" <?=(!empty($value->currency) && ($value->currency == '2' || $value->currency == '3'))?'':'style="display:none"'?>>
                                        <a href="javascript:void()" style="color:orange;" data-id="<?php echo $key; ?>" class="euro_adjust_individually"><?=!empty($colpseuro)?'Adjust Individually':'Collapse Individually'?></a>
                                    </div>
                                </div>
                                  <?php
                                        $colpseuro = '';
                                        $colpsrateeuro = 'style="display:none"';
                                        if($value->rate_euro == $value->single_euro && $value->rate_euro == $value->double_euro && $value->rate_euro == $value->twin_euro && $value->rate_euro == $value->triple_euro && $value->rate_euro == $value->quad_euro)
                                        {
                                            $colpseuro='style="display:none"';
                                             $colpsrateeuro='';
                                        }
                                    ?>
                                <div class="row rate_field">
                                    <div class="col-sm-2 display_euro_srs_rate_<?php echo $key; ?> euro_colunm_out_<?php echo $key; ?>" <?=(!empty($value->currency) && ($value->currency == '2' || $value->currency == '3'))?$colpsrateeuro:'style="display:none"'?>>
                                        <div class="form-group">
                                            <label>SS (&#8364;)</label>
                                            <input type="text" id="srs_euro_<?php echo $key; ?>" class="form-control decimal pointerNone" name="step8[tour][<?php echo $key; ?>][srs_euro]" value="{{sprintf('%0.2f',$value->srs_euro)}}" readonly>
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-2 display_euro_srs_other display_euro_srs_other_<?php echo $key; ?> euro_colunm_out_<?php echo $key; ?>" <?=(!empty($value->currency) && ($value->currency == '2' || $value->currency == '3'))?$colpseuro:'style="display:none"'?>>
                                        <div class="form-group">
                                            <label>Single SS (&#8364;)</label>
                                            <input type="text" id="single_srs_euro_<?php echo $key; ?>" class="form-control decimal pointerNone" name="step8[tour][<?php echo $key; ?>][single_srs_euro]" value="{{sprintf('%0.2f',$value->single_srs_euro)}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-2 display_euro_srs_other display_euro_srs_other_<?php echo $key; ?> euro_colunm_out_<?php echo $key; ?>" <?=(!empty($value->currency) && ($value->currency == '2' || $value->currency == '3'))?$colpseuro:'style="display:none"'?>>
                                        <div class="form-group">
                                            <label>Double SS (&#8364;)</label>
                                            <input type="text" id="double_srs_euro_<?php echo $key; ?>" class="form-control decimal pointerNone" name="step8[tour][<?php echo $key; ?>][double_srs_euro]" value="{{sprintf('%0.2f',$value->double_srs_euro)}}" readonly>
                                        </div>
                                    </div>
                                     <div class="col-sm-2 display_euro_srs_other display_euro_srs_other_<?php echo $key; ?> euro_colunm_out_<?php echo $key; ?>" <?=(!empty($value->currency) && ($value->currency == '2' || $value->currency == '3'))?$colpseuro:'style="display:none"'?>>
                                        <div class="form-group">
                                            <label>Twin SS (&#8364;)</label> 
                                            <input type="text" id="twin_srs_euro_<?php echo $key; ?>" class="form-control decimal pointerNone" name="step8[tour][<?php echo $key; ?>][twin_srs_euro]" value="{{sprintf('%0.2f',$value->twin_srs_euro)}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-2 display_euro_srs_other display_euro_srs_other_<?php echo $key; ?> euro_colunm_out_<?php echo $key; ?>" <?=(!empty($value->currency) && ($value->currency == '2' || $value->currency == '3'))?$colpseuro:'style="display:none"'?>>
                                        <div class="form-group">
                                            <label>Triple SS (&#8364;)</label>
                                            <input type="text" id="triple_srs_euro_<?php echo $key; ?>" class="form-control decimal pointerNone" name="step8[tour][<?php echo $key; ?>][triple_srs_euro]" value="{{sprintf('%0.2f',$value->triple_srs_euro)}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-2 display_euro_srs_other display_euro_srs_other_<?php echo $key; ?> euro_colunm_out_<?php echo $key; ?>" <?=(!empty($value->currency) && ($value->currency == '2' || $value->currency == '3'))?$colpseuro:'style="display:none"'?>>
                                        <div class="form-group">
                                            <label>Quad SS (&#8364;)</label>
                                            <input type="text" id="quad_srs_euro_<?php echo $key; ?>" class="form-control decimal pointerNone" name="step8[tour][<?php echo $key; ?>][quad_srs_euro]" value="{{sprintf('%0.2f',$value->quad_srs_euro)}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-2 display_euro_srs__driver_rate_<?php echo $key; ?> euro_colunm_out_<?php echo $key; ?>" <?=(!empty($value->currency) && ($value->currency == '2' || $value->currency == '3'))?'':'style="display:none"'?>>
                                        <div class="form-group">
                                            <label>Driver SS (&#8364;)</label>
                                            <input type="text" id="driver_srs_euro_<?php echo $key; ?>" class="form-control decimal pointerNone" name="step8[tour][<?php echo $key; ?>][driver_srs_euro]" value="{{sprintf('%0.2f',$value->driver_srs_euro)}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 euro_colunm_out_<?php echo $key; ?>" <?=(!empty($value->currency) && ($value->currency == '2' || $value->currency == '3'))?'':'style="display:none"'?>>
                                        <a href="javascript:void()" style="color:orange;" data-id="<?php echo $key; ?>" class="euro_adjust_individually_srs"><?=!empty($colpseuro)?'Adjust Individually':'Collapse Individually'?></a>
                                    </div>
                                </div>
                                <div class="row rate_field" style="float: left;width: 100%;">
                                    <div class="col-sm-2 euro_colunm_out_<?php echo $key; ?>" <?=(!empty($value->currency) && ($value->currency == '2' || $value->currency == '3'))?'':'style="display:none"'?>>
                                        <div class="form-group">
                                            <label>Deposit (&#8364;)</label>
                                            <input type="text" class="form-control decimal pointerNone" name="step8[tour][<?php echo $key; ?>][deposit_euro]" value="{{sprintf('%0.2f',$value->deposit_euro)}}" readonly>
                                        </div>
                                    </div>
                                </div>
                                
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
                            <div class="col-sm-12">
                                <a href="javascript:;" class="btn orangeLink editDate <?=!empty($is_hotel_assieged)?'booked_hotel':''?>"  data-cart_id="<?=!empty($book_hotel_cart_list[0]->cart_id)?$book_hotel_cart_list[0]->cart_id:''?>" style="margin-bottom: 20px;margin-right: 15px;">Edit</a>
                                <a href="javascript:;" class="btn orangeLink saveDates" style="display:none;margin-bottom: 20px;margin-right: 15px;">Save Date</a>
                                 <?php if($cls != 'bookDates'){ ?>
                                <a href="javascript:;" class="btn orangeLink removeDatesRates" style="margin-bottom: 20px;" data-id="{{$value->id}}">Remove and return to stock list</a>
                            <?php } else { ?> 
                                <!--  <a href="javascript:;" class="btn orangeLink removeDatesRates" style="margin-bottom: 20px;" onclick="return confirm('Are you sure you want to remove?')"  data-id="{{$value->id}}">Remove and return to stock list</a> -->
                            <?php }?>
                            </div>
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
                    <a href="javascript:;" class="btn orangeLink addAnotherDate" style="margin-bottom: 15px;">Add another date</a>
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