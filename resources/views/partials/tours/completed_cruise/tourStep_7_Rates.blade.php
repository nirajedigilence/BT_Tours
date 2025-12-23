<div class="white_part notesSubSection">
    <div class="colspanPerStepMain">
        <div class="colspanPerStepLeft">
        Category, location and tags    
        </div>
        <div class="colspanPerStepRight">
            <a href="javascript:;" class="downArrowCls backArrowBtnCls" data-back="1"><i class="fas fa-chevron-down"></i></a>
        </div>
    </div>
</div>
<div class="white_part notesSubSection">
    <div class="colspanPerStepMain">
        <div class="colspanPerStepLeft">
        Blue bar
        </div>
        <div class="colspanPerStepRight">
            <a href="javascript:;" class="downArrowCls backArrowBtnCls" data-back="2"><i class="fas fa-chevron-down"></i></a>
        </div>
    </div>
</div>
<div class="white_part notesSubSection">
    <div class="colspanPerStepMain">
        <div class="colspanPerStepLeft">
        Experiences
        </div>
        <div class="colspanPerStepRight">
            <a href="javascript:;" class="downArrowCls backArrowBtnCls" data-back="3"><i class="fas fa-chevron-down"></i></a>
        </div>
    </div>
</div>
<div class="white_part notesSubSection">
    <div class="colspanPerStepMain">
        <div class="colspanPerStepLeft">
        Hotel
        </div>
        <div class="colspanPerStepRight">
            <a href="javascript:;" class="downArrowCls backArrowBtnCls" data-back="4"><i class="fas fa-chevron-down"></i></a>
        </div>
    </div>
</div>
<div class="white_part notesSubSection">
    <div class="colspanPerStepMain">
        <div class="colspanPerStepLeft">
        Gallery
        </div>
        <div class="colspanPerStepRight">
            <a href="javascript:;" class="downArrowCls backArrowBtnCls" data-back="5"><i class="fas fa-chevron-down"></i></a>
        </div>
    </div>
</div>
<div class="white_part notesSubSection">
    <div class="colspanPerStepMain">
        <div class="colspanPerStepLeft">
        MAP
        </div>
        <div class="colspanPerStepRight">
            <a href="javascript:;" class="downArrowCls backArrowBtnCls" data-back="6"><i class="fas fa-chevron-down"></i></a>
        </div>
    </div>
</div>
<div class="white_part">
    <div class="flwMainTitleCls">
        Dates and rates
    </div>
    <p>Enter the standard tour rate that will be displayed if there are no tour date selected to sell.</p>
    <div class="row">
        <div class="col-sm-2">
            <div class="form-group">
                <label>Currency</label>
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
  <?php /*  <div class="row">
        <div class="col-sm-12">
            <select class="form-control" id="checkDates" style="margin-bottom: 20px;">
                <option value="1">Unbooked Dates</option>
                <option value="2">Booked Dates</option>
                <option value="3">Past Dates</option>
            </select>
            <b>Add dates for sale</b>
            <div class="appendParentDiv">
                <?php
                if(!empty($experienceDatesRates)){
                    foreach ($experienceDatesRates as $key => $value) {
                        $cart_experiences = 


DB::connection('mysql_veenus')->table('cart_experiences')->where('dates_rates_id', $value->id)->where('experiences_id', $value->experience_id)->where('deleted_at',null)->where('completed', 0)->where('full_cancel', 0)->first(); 

                        $cart_experiences2 = 


DB::connection('mysql_veenus')->table('cart_experiences')->where('dates_rates_id', $value->id)->where('experiences_id', $value->experience_id)->where('deleted_at',null)->where('completed', 1)->first();

                        $cart_experiences3 = 


DB::connection('mysql_veenus')->table('cart_experiences')->where('dates_rates_id', $value->id)->where('experiences_id', $value->experience_id)->where('deleted_at',null)->where('full_cancel', 1)->first();
                        $sty = '';
                        if(!empty($cart_experiences)){
                            $cls = 'bookDates';
                            $sty = 'display:none';
                        }elseif(!empty($cart_experiences2)){
                            $cls = 'pastDates';
                            $sty = 'display:none';
                        }elseif(!empty($cart_experiences3)){
                            $cls = 'cancelDates';
                            $sty = 'display:none';
                        }else{
                            $cls = 'unbookDates';
                        }
                        $i = 0; 
                        $date_in = array();
                        $date_out = array(); 
                        $e_dates = array();
                ?>
                <div class="parentDiv dates_rates_div{{$value->id}} {{$cls}}" data-key="<?php echo $key; ?>" style="border: 3px solid #ddd;border-radius: 5px;margin: 15px 0px;min-height: 100px;<?php echo $sty; ?>">
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
                                                <?php if($i != 0){ echo '<b>Combined with</b>'; } $i++; ?>
                                                <?php if($cls != 'bookDates') { ?> 
                                                <a href="javascript:;" style="float:right;color:red;display: none;" class="removeHotelDiv" data-id="{{$rec->experienceDate->id}}"><i class="fa fa-times fa-2x"></i></a>
                                                <?php } ?>
                                            </div>
                                            <div style="border: 1px solid #ddd;border-radius: 5px;margin: 15px;padding: 20px;">
                                                <div class="form-group" style="display: inline-flex;width: 100%;margin-bottom:2px;">
                                                    <input type="hidden" name="step8[tour][<?php echo $key; ?>][hotel][<?php echo $k; ?>][experience_hotel_date_id]" value="{{$rec->id}}">
                                                    <input type="hidden" name="step8[tour][<?php echo $key; ?>][hotel][<?php echo $k; ?>][experience_date_id]" value="{{$rec->experienceDate->id}}">
                                                    <label style="font-weight: bold;color: black;margin: 8px 0px;width: 50px;font-size: 16px;margin-right: 10px;">hotel:</label>
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
                                                    <label style="font-weight: bold;color: black;margin: 8px 0px;width: 50px;font-size: 16px;margin-right: 10px;">Date:</label>
                                                    <select <?=($cls != 'bookDates')?'':'disabled'?> class="form-control datesDropDown pointerNone" name="step8[tour][<?php echo $key; ?>][hotel][<?php echo $k; ?>][date]" required="" readonly>
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
                                                                        }
                                                                    }
                                                                    echo '<option value="'.$_val->id.'" '.$selected.'>'.convert2DMYForHotelDates($_val->date_in).' - '.convert2DMYForHotelDates($_val->date_out).' ('.$_val->night.' nights)</option>';
                                                                }
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-group" style="display: inline-flex;width: 100%;margin-bottom:2px;">
                                                    <label style="font-weight: bold;color: black;width: 50px;font-size: 16px;margin-right: 10px;">Type:</label>
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
                                                      <input <?=($cls != 'bookDates')?'':'disabled'?> class="form-check-input" type="radio" name="step8[tour][<?php echo $key; ?>][hotel][<?php echo $k; ?>][type]" id="inlineRadio1<?php echo $key.$k; ?>" value="1" required <?php echo ($rec->experienceDate->type_id == 1) ? 'checked' : ''; ?>>
                                                      <label class="form-check-label" for="inlineRadio1<?php echo $key.$k; ?>" style="font-size: 0.98rem;color: #495057;">Standard</label>
                                                    </div>
                                                    <div class="form-check form-check-inline radioDiv" style="display:none;">
                                                      <input class="form-check-input" type="radio" name="step8[tour][<?php echo $key; ?>][hotel][<?php echo $k; ?>][type]" id="inlineRadio2<?php echo $key.$k; ?>" value="0" required <?php echo ($rec->experienceDate->type_id == 0) ? 'checked' : ''; ?>>
                                                      <label class="form-check-label" for="inlineRadio2<?php echo $key.$k; ?>" style="font-size: 0.98rem;color: #495057;">Upscale</label>
                                                    </div>
                                                </div>
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
                            <div class="col-sm-12">
                                <label style="margin-top: 15px;">Tour rate</label>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>Currency</label>
                                    <select class="form-control pointerNone" name="step8[tour][<?php echo $key; ?>][currency]" readonly required>
                                        <option value="1" {{($value->currency == 1) ? 'selected' : ''}}>&pound;</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>Rate</label>
                                    <input type="text" class="form-control pointerNone" name="step8[tour][<?php echo $key; ?>][rate]" value="{{$value->rate}}" readonly required>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>SRS</label>
                                    <input type="text" class="form-control pointerNone" name="step8[tour][<?php echo $key; ?>][srs]" value="{{$value->srs}}" readonly required>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>Deposit</label>
                                    <input type="text" class="form-control pointerNone" name="step8[tour][<?php echo $key; ?>][deposit]" value="{{$value->deposit}}" readonly required>
                                </div>
                            </div>
                            
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>Single SRS</label>
                                    <input type="text" class="form-control pointerNone" name="step8[tour][<?php echo $key; ?>][single_srs]" value="{{$value->single_srs}}" readonly required>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>Double SRS</label>
                                    <input type="text" class="form-control pointerNone" name="step8[tour][<?php echo $key; ?>][double_srs]" value="{{$value->double_srs}}" readonly required>
                                </div>
                            </div>
							<div class="col-sm-2">
                                <div class="form-group">
                                    <label>Twin SRS</label>
                                    <input type="text" class="form-control pointerNone" name="step8[tour][<?php echo $key; ?>][twin_srs]" value="{{$value->twin_srs}}" readonly required>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>Triple SRS</label>
                                    <input type="text" class="form-control pointerNone" name="step8[tour][<?php echo $key; ?>][triple_srs]" value="{{$value->triple_srs}}" readonly required>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>Quad SRS</label>
                                    <input type="text" class="form-control pointerNone" name="step8[tour][<?php echo $key; ?>][quad_srs]" value="{{$value->quad_srs}}" readonly required>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>Driver SRS</label>
                                    <input type="text" class="form-control pointerNone" name="step8[tour][<?php echo $key; ?>][driver_srs]" value="{{$value->driver_srs}}" readonly required>
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
                            //->leftjoin('experiences_to_hotels as ex', 'ex.id', '=', 'experiences_to_hotels_to_experience_dates.experiences_to_hotels_id')
                          
                            //->leftjoin('cart_experiences as c', 'c.experiences_id', '=', 'ex.experiences_id')
                            //->leftjoin('cart_experiences_to_tour_statuses as cs', 'cs.cart_experiences_id', '=', 'c.id')
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
                                $is_hotel_assieged = 1;
                             }
                                ?>
                            <div class="col-sm-12">
                                <a href="javascript:;" class="btn orangeLink editDate <?=!empty($is_hotel_assieged)?'booked_hotel':''?>" data-cart_id="<?=!empty($book_hotel_cart_list[0]->cart_id)?$book_hotel_cart_list[0]->cart_id:''?>" style="margin-bottom: 20px;margin-right: 15px;">Edit</a>
                                <a href="javascript:;" class="btn orangeLink saveDates" style="display:none;margin-bottom: 20px;margin-right: 15px;">Save Date</a>
                                <?php if(empty($book_hotel_cart_list[0]->cart_id)){ ?>
                                <a href="javascript:;" class="btn orangeLink removeDatesRates" style="margin-bottom: 20px;" data-id="{{$value->id}}">Remove and return to stock list</a>
                            <?php } else { ?> 
                                <!-- <input type="hidden" name="selected_tour[]" value="<?=$book_hotel_cart_list[0]->cart_id?>"> -->
                            <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                        
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
                                    <label style="font-weight: bold;color: black;width: 50px;font-size: 16px;margin-right: 10px;">Type:</label>
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
                                    <label>SRS</label>
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
                                    <label>Single SRS</label>
                                    <input type="text" class="form-control" name="step8[tour][0][single_srs]" required>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>Double SRS</label>
                                    <input type="text" class="form-control" name="step8[tour][0][double_srs]" required>
                                </div>
                            </div>
							<div class="col-sm-2">
                                <div class="form-group">
                                    <label>Twin SRS</label>
                                    <input type="text" class="form-control" name="step8[tour][0][twin_srs]" required>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>Triple SRS</label>
                                    <input type="text" class="form-control" name="step8[tour][0][triple_srs]" required>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>Quad SRS</label>
                                    <input type="text" class="form-control" name="step8[tour][0][quad_srs]" required>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>Driver SRS</label>
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
        </div>

    </div> */?>


</div>