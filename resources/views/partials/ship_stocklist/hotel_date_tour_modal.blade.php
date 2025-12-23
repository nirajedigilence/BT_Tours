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
<input type="hidden" name="hotel_id" class="hotelMainIdCls" value="{{ $hotel_id }}" placeholder="">
<input type="hidden" name="hotelDateCount" class="hotelDateCount" value="{{ count($hotelDateArray) }}">
<div class="modal-body" >
    <div class="hotelDatesAppendCls">
        <?php 
        // pr($ExperienceDate);
        $cnts = 110;
        $current_selected = '';
        foreach ($hotelDateArray as $key => $value) {
            $data = '';
            if(!empty($ExperienceDate)){
                foreach ($ExperienceDate as $k => $val) {
                    if($val['date_from'] == $value->date_in && $val['date_to'] == $value->date_out){
                        $data = $val;  
                    }   
                }
            }
            $cls = '';
            if(!empty($dateid) && !empty($data['id']) && ($dateid == $data['id'])){
                $cls = 'isSelectCls';
                $current_selected = $dateid;
            }
            // pr($data); 
            ?>
            <div class="hotelDatesMainCls box editCls <?php echo $cls; ?>" data-id="{{$value->id}}">
                {{-- {{ convert2DMY($value->date_out)}} --}}
                <form class="datesUpdate">
                    <div class="row">
                        <div class="col-sm-9">
                            
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="DateIn{{$value->id}}">Date In</label>
                                                <span class="hotelDatesInOutCls"><b>{{ convert2DMYForHotelDates($value->date_in) }}</b></span>
                                                <input type="date" class="notClickedCls dateChangeCls form-control dateInCls{{$value->id}} hdioCls" name="dates_edit[{{ $value->id }}][date_in]" id="DateIn{{$value->id}}" placeholder="Date In" value="{{ $value->date_in }}" required="" data-id="{{$value->id}}">
                                                <input type="hidden" class="" name="dates_edit[{{ $value->id }}][id]" id="DateId{{$value->id}}"  value="{{ $value->id }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="DateOut{{$value->id}}">Date Out</label>
                                                <span class="hotelDatesInOutCls"><b>{{ convert2DMYForHotelDates($value->date_out) }}</b></span>
                                                <input type="date" class="notClickedCls dateChangeCls hdioCls dateOutCls{{$value->id}} form-control" name="dates_edit[{{ $value->id }}][date_out]" id="DateOut{{$value->id}}" placeholder="Date Out" value="{{ $value->date_out }}" required data-id="{{$value->id}}">
                                                <input type="hidden" name="dates_edit_main[{{ $value->id }}][date_out]" id="DateOutMain{{$value->id}}" placeholder="Date Out" value="{{ convert2DMYForHotelDates($value->date_out) }}" >
                                                <input type="hidden" name="dates_edit_main[{{ $value->id }}][date_in]" id="DateInMain{{$value->id}}" placeholder="Date Out" value="{{ convert2DMYForHotelDates($value->date_in) }}" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="Nights{{$cnts}}">Nights</label>
                                                <span class="hotelDatesInOutCls">{{ $value->night }}</span>
                                                <input type="text" class="notClickedCls hdioCls form-control nightCls" name="dates_edit[{{ $value->id }}][night]" id="Nights{{$cnts}}" placeholder="Nights" value="{{ $value->night }}" readonly="" required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="RateDBB{{$cnts}}">Rate DBB</label>
                                                <span class="hotelDatesInOutCls">&#163; {{ number_format($value->rate_dbb,2) }} pppn</span>
                                                <input type="text" class="notClickedCls hdioCls form-control numbercls" id="RateDBB{{$cnts}}" placeholder="Rate DBB" value="{{ $value->rate_dbb }}" name="dates_edit[{{ $value->id }}][rate_dbb]" required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="RateSRS{{$cnts}}">Rate SRS</label>
                                                <span class="hotelDatesInOutCls">&#163; {{ number_format($value->date_srs,2) }} pppn</span>
                                                <input type="text" class="notClickedCls hdioCls form-control numbercls" id="RateSRS{{$cnts}}" placeholder="Rate SRS" value="{{ $value->date_srs }}" name="dates_edit[{{ $value->id }}][date_srs]" required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="commission{{$cnts}}">Commission</label>
                                                {{-- <span class="hotelDatesInOutCls">8% plus VAT</span> --}}
                                                <select name="dates_edit[{{ $value->id }}][commission_id]" class="form-control selectCls notClickedCls " >
                                                    <?php
                                                    foreach ($CommissionList as $keyCom => $valueCom) { 
                                                        $selected = '';
                                                        if($value->commission_id == $valueCom->id){
                                                            $selected = 'selected';
                                                        }
                                                        ?>
                                                        <option value="{{ $valueCom->id }}" {{ $selected }}>{{ $valueCom->name }}</option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-5">
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
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="meal{{$cnts}}">Meal basic</label>
                                                {{-- <span class="hotelDatesInOutCls"><b>DBB</b></span> --}}
                                                <select name="dates_edit[{{ $value->id }}][meal_basic_id]"  class="notClickedCls form-control selectCls" >
                                                    <?php foreach ($MealBasicList as $keyMeal => $valueMeal) {
                                                        $selected = '';
                                                        if($value->meal_basic_id == $valueCom->id){
                                                            $selected = 'selected';
                                                        } ?>
                                                        <option value="{{ $valueMeal->id }}" {{ $selected }}>{{ $valueMeal->name }}</option>
                                                    <?php } ?>

                                                </select>
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
                                              <input class="form-check-input notClickedCls eventCheckCls" type="radio" name="dates_edit[{{ $value->id }}][events]" id="inlineRadio{{$cnts}}" value="0" <?php echo $value->events == '0'?'checked':'';?> data-id="{{ $value->id }}">
                                              <label class="form-check-label notClickedCls" for="inlineRadio{{$cnts}}">No</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                              <input class="form-check-input notClickedCls eventCheckCls" type="radio" name="dates_edit[{{ $value->id }}][events]" id="inlineRadioYes{{$cnts}}" value="1" <?php echo $value->events == '1'?'checked':'';?> data-id="{{ $value->id }}">
                                              <label class="form-check-label notClickedCls" for="inlineRadioYes{{$cnts}}">Yes</label>
                                            </div>
                                        </div>
                                        <div class="form-group eventsDateCls{{ $value->id }}" style="display: <?php echo $value->events == '1'?'':'none';?>;">
                                            <label for="eventTime{{$cnts}}"><b>Event Time</b></label>
                                            <b class="hotelDatesInOutCls">{{ convert2DMYForHotelDates($value->event_date) }}</b>
                                            <input type="date" class="form-control notClickedCls hdioCls" id="eventTime{{$cnts}}" placeholder="Date"  value="{{ $value->event_date }}" name="dates_edit[{{ $value->id }}][event_date]" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label for="email"><b>Based on contract</b></label>
                                        <span class="hotelDatesInOutCls"><i class="fas fa-file-pdf yellowClrCls"></i> <b>Sharewood.pdf</b></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-sm-3" style="border-left: 1px solid #dddd;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <?php
                                    $checked = '';
                                    if (isset($data['sell_date']) && $data['sell_date'] == 1)
                                    {
                                        $checked = 'checked';
                                    } 
                                    ?>
                                    <label class="checkbox_div">
                                      <input type="checkbox" name="dates_edit[{{ $value->id }}][sell_date]" class="custom_chkbox notClickedCls checkDivClass" value="1" {{ $checked }}> <span class="notClickedCls" style="font-weight: bold;color: #000;">Sell date</span>
                                      <span class="checkmark"></span>
                                    </label>
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group" style="display: inline-flex;">
                                        <label>Price in &pound;</label>
                                        <input type="text" name="dates_edit[{{ $value->id }}][price_gbp]" class="notClickedCls form-control" style="padding: 5px;width: 60px;height: 35px;margin-left: 5px;" value="<?php echo !empty($data['price_gbp']) ? $data['price_gbp'] : ''; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group" style="display: inline-flex;">
                                        <label>SRS in &pound;</label>
                                        <input type="text" name="dates_edit[{{ $value->id }}][srs_gbp]" class="notClickedCls form-control" style="padding: 5px;width: 60px;height: 35px;margin-left: 5px;" value="<?php echo !empty($data['srs_gbp']) ? $data['srs_gbp'] : ''; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group" style="display: inline-flex;">
                                        <label>Deposit amount in &pound;</label>
                                        <input type="text" name="dates_edit[{{ $value->id }}][deposit_gbp]" class="notClickedCls form-control" style="padding: 5px;width: 60px;height: 35px;margin-left: 5px;" value="<?php echo !empty($data['deposit_gbp']) ? $data['deposit_gbp'] : ''; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group" style="display: inline-flex;">
                                        <label>Price in &euro;</label>
                                        <input type="text" name="dates_edit[{{ $value->id }}][price_euro]" class="notClickedCls form-control" style="padding: 5px;width: 60px;height: 35px;margin-left: 5px;" value="<?php echo !empty($data['price_euro']) ? $data['price_euro'] : ''; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group" style="display: inline-flex;">
                                        <label>SRS in &euro;</label>
                                        <input type="text" name="dates_edit[{{ $value->id }}][srs_euro]" class="notClickedCls form-control" style="padding: 5px;width: 60px;height: 35px;margin-left: 5px;" value="<?php echo !empty($data['srs_euro']) ? $data['srs_euro'] : ''; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group" style="display: inline-flex;">
                                        <label>Deposit amount in &euro;</label>
                                        <input type="text" name="dates_edit[{{ $value->id }}][deposit_euro]" class="notClickedCls form-control" style="padding: 5px;width: 60px;height: 35px;margin-left: 5px;" value="<?php echo !empty($data['deposit_euro']) ? $data['deposit_euro'] : ''; ?>">
                                        <input type="hidden" name="dates_edit[{{ $value->id }}][id]" value="<?php echo !empty($data['id']) ? $data['id'] : ''; ?>">
                                        <input type="hidden" name="dates_edit[{{ $value->id }}][experiences_id]" value="<?php echo !empty($data['experiences_id']) ? $data['experiences_id'] : $experienceId; ?>">
                                        <input type="hidden" name="dates_edit[{{ $value->id }}][type_id]" value="<?php echo !empty($data['type_id']) ? $data['type_id'] : $dataType; ?>">
                                        <input type="hidden" name="dates_edit[{{ $value->id }}][current_selected]" value="<?php echo $current_selected; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        <?php
        $cnts++; 
         } ?>
    </div>
</div>
<div class="modal-footer displayInitialCls">
    <button type="button" class="btn btn-secondary cancel float-left hotelFooteCloseCls" data-dismiss="modal" style="margin-left: 10px;">Close</button>
    {{-- <input type="submit" name="submit" value="Save" class="yellowClrBtn saveAllChangesBtn border-0" > --}}
    <a class="yellowClrBtn saveAllChangesBtn  border-0" href="javascript:;">Save</a>
</div>
