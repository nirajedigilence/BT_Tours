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
<div class="white_part">
    <div class="flwMainTitleCls">
        Hotel
    </div>
    <div class="flwSubTitleCls">
        Hotel Details and Gallery
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <label for="Category1">Primary Hotel</label>
                <input type="text" name="step1[hotel_label_1]" class="form-control" required="" data-msg-required="Please provide label name" value="{{ isset($experience->hotel_label_1) ? $experience->hotel_label_1 : null }}">
            </div>
            <div class="form-group">
                <label for="Category1">Secondary/Upscale Hotel</label>
                <input type="text" name="step1[hotel_label_2]" class="form-control" value="{{ isset($experience->hotel_label_2) ? $experience->hotel_label_2 : null }}">
            </div>
        </div>
    </div>
    <div class="HotelAppendCls">
        <?php if(!empty($bespoke_id)){
            $hotel_no =1;
            foreach($experienceHotelsIds as $hotel_id)
            {
                ?>
                <div class="hotelRowCls">
                    <div class="flwSubTitleCls">
                        <div class="row">
                            <div class="col-sm-11 hotelCntCls">
                            Hotel {{$hotel_no}}
                            </div>
                            <div class="col-sm-1">
                                <div class="form-group">
                                    <a href="javascript:;" class="removeHotelDetailCls redCls" data-id=""><i class="fas fa-minus-circle"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="partOneCls">
                        <div class="append3VipExperiences">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="Location1d">Hotel</label>
                                        <select class="selectCls form-control hotelChange hotRating{{$hotel_no}}" name="step4[{{$hotel_no}}][hotel_id]" required="" data-msg-required="Please select hotel" data-hotel="{{$hotel_no}}">
                                            <option value="">Select One</option>
                                            <?php 
                                            if(!empty($hotelList)){
                                            foreach ($hotelList as $key => $value) { ?>
                                                <option value="{{$value->id}}" @if ( isset($hotel_id) && ($hotel_id == $value->id)) selected @endif>{{$value->name}}</option>
                                            <?php } } ?>
                                        </select>
                                    </div>
                                    <div class="appendHotelDetails">
                                    </div>
                                    <div class="form-group">
                                        <label>Amenities</label>
                                        <div class="customAmenitiesReviewsCls cFCInclusionsCls" style="display: inline-block;width: 100%;"> 
                                        </div> 
                                        <a href="javascript:;" class="addmorelnk addAmenitiesReviewsCls"  data-id="{{$hotel_no}}">Add More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flwSubTitleCls">
                        Upscales
                    </div>
                    <div class="partOneCls">
                        <div class="appendUpScalesPerfect{{$hotel_no}}">
                         <div class="UpScRow{{$hotel_no}}"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <input type="hidden" name="expUpScalesRow" class="expUpScalesRow" value="1">
                                <div class="addmorelnk addUpScalesPerfect auspCls{{$hotel_no}}" data-id="{{$hotel_no}}">Add more upscales</div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                $hotel_no ++;
            }
        } ?>
        <?php 
        $cntHotal = 2;
        $notHotel = 0;
        if(isset($experiencesToHotelList)){ ?>
            <?php if(count($experiencesToHotelList) > 0){
                $hotCnt = 1;
                foreach ($experiencesToHotelList as $keyHot => $valueHot) {
                    $tour_amenities = $valueHot->tour_amenities;
                    $about_hotel = $valueHot->about_hotel;
                    $hotelDetail = $valueHot->getHotelDetail;
                    $hotel_images = array();
                    if(isset($hotelDetail->id) && !empty($hotelDetail->id)){
                        $hotel_images = 


DB::connection('mysql_veenus')->table('hotel_images')->where('hotels_id', $hotelDetail->id)->orderBy('pos')->get()->toArray();
                    }
                    $ex_to_hotel_dates = 


DB::connection('mysql_veenus')->table('experiences_to_hotels_to_experience_dates')->where('experiences_to_hotels_id', $valueHot->id)->where('deleted_at', null)->first();
                 ?>

                    <div class="hotelRowCls">
                        <div class="flwSubTitleCls">
                            <div class="row">
                                <div class="col-sm-11 hotelCntCls">
                                Hotel 1
                                </div>
                                <div class="col-sm-1">
                                    <?php 
                                    //if(empty($ex_to_hotel_dates)){

                                    ?>
                                    <div class="form-group">
                                        <a href="javascript:;" data-id="<?php echo $valueHot->id; ?>" class="removeHotelDetailCls redCls"><i class="fas fa-minus-circle"></i></a>
                                    </div>
                                    <?php //} ?>
                                </div>
                            </div>
                        </div>
                        <div class="partOneCls">
                            <div class="append3VipExperiences">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="Location1d">Hotel</label>
                                            <select class="selectCls form-control hotelChange" name="step4[{{$hotCnt}}][hotel_id]" required="" data-msg-required="Please select hotel" data-hotel="{{$hotCnt}}">
                                                <option value="">Select One</option>
                                                <?php
                                                // pr($hotelList);
                                                if(!empty($hotelList)){
                                                    foreach ($hotelList as $key => $value) {
                                                        $selected = '';
                                                        if(isset($hotelDetail->id) && $hotelDetail->id == $value->id){
                                                            $selected = 'selected';
                                                        }
                                                        echo '<option value="'.$value->id.'" '.$selected.'>'.$value->name.'</option>';
                                                    }
                                                }
                                                ?>  
                                            </select>
                                        </div>
                                        
                                        <div class="appendHotelDetails">
                                            <div class="form-group">
                                                <label for="">Hotel Type</label>
                                                <select class="form-control"  name="step4[{{$hotCnt}}][standard_hotel]" required="">
                                                    <option value="1" <?php echo (isset($valueHot->standard_hotel) && ($valueHot->standard_hotel == 1) ? 'selected' : ''); ?>>Standard</option>
                                                    <option value="0" <?php echo (isset($valueHot->standard_hotel) && ($valueHot->standard_hotel == 0) ? 'selected' : ''); ?>>Upscale</option>  
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Star Rating</label>
                                                <select class="form-control" readonly>
                                                    <option value=""></option>
                                                    <option value="1" <?php echo (isset($hotelDetail->stars) && ($hotelDetail->stars == 1) ? 'selected' : ''); ?>>1 Star</option>
                                                    <option value="2" <?php echo (isset($hotelDetail->stars) && ($hotelDetail->stars == 2) ? 'selected' : ''); ?>>2 Stars</option>
                                                    <option value="3" <?php echo (isset($hotelDetail->stars) && ($hotelDetail->stars == 3) ? 'selected' : ''); ?>>3 Stars</option>
                                                    <option value="4" <?php echo (isset($hotelDetail->stars) && ($hotelDetail->stars == 4) ? 'selected' : ''); ?>>4 Stars</option>
                                                    <option value="5" <?php echo (isset($hotelDetail->stars) && ($hotelDetail->stars == 5) ? 'selected' : ''); ?>>5 Stars</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Hotel Website URL</label>
                                                <input class="form-control" type="text" value="<?php echo (isset($hotelDetail->website) ? $hotelDetail->website : ''); ?>" readonly> 
                                            </div>
                                            <div class="form-group">
                                                <label for="">Hotel Contact Number</label>
                                                <input class="form-control" type="text" value="<?php echo (isset($hotelDetail->phone) ? $hotelDetail->phone : ''); ?>" readonly> 
                                            </div>
                                            <div class="form-group">
                                                <label for="">Hotel Location Link</label>
                                                <input class="form-control" type="text" value="<?php echo (isset($hotelDetail->location_link) ? $hotelDetail->location_link : ''); ?>" readonly> 
                                            </div>
                                            <div class="form-group">
                                                <label for="">Booking.com URL</label>
                                                <input class="form-control" type="text" value="<?php echo (isset($hotelDetail->booking_url) ? $hotelDetail->booking_url : ''); ?>" readonly> 
                                            </div>
                                            <div class="form-group">
                                                <label for="">TripAdvisor URL</label>
                                                <input class="form-control" type="text" value="<?php echo (isset($hotelDetail->triadvisor_url) ? $hotelDetail->triadvisor_url : ''); ?>" readonly> 
                                            </div>
                                            <div class="form-group">
                                                <label for="">Menu</label>
                                                <select data-id="{{$hotCnt}}" class="form-control menu_change"  name="step4[{{$hotCnt}}][selected_menu]" required="">
                                                    <?php if(!empty($hotelDetail->main_menu)) {?>
                                                    <option value="1" <?php echo (isset($valueHot->selected_menu) && ($valueHot->selected_menu == 1) ? 'selected' : ''); ?>>Main Menu</option>
                                                      <?php } ?>  
                                                    <?php if(!empty($hotelDetail->festive_menu)) {?>
                                                    <option value="2" <?php echo (isset($valueHot->selected_menu) && ($valueHot->selected_menu == 2) ? 'selected' : ''); ?>>Festive Menu</option>
                                                    <?php } ?>  
                                                    <option value="4" <?php echo (isset($valueHot->selected_menu) && ($valueHot->selected_menu == 4) ? 'selected' : ''); ?>>None</option>  
                                                    <option value="3" <?php echo (isset($valueHot->selected_menu) && ($valueHot->selected_menu == 3) ? 'selected' : ''); ?>>Other</option>  
                                                    
                                                </select>
                                            </div>
                                            <div class="form-group other_menu_{{$hotCnt}}"  style="<?=($valueHot->selected_menu == 3 )?'':'display:none';?>" >
                                                <label for="">Other menu</label>
                                                <input id="other_menu_file_{{$hotCnt}}" type="hidden" name="step4[{{$hotCnt}}][other_menu_file]" value="{{!empty($valueHot->other_menu)?$valueHot->other_menu:''}}">
                                                <input type="file" class="form-control" id="other_menu_{{$hotCnt}}" name="other_menu_{{$hotCnt}}" accept=".jpg,.jpeg,.png,.docx,.pdf">
                                                <?php if(!empty($valueHot->other_menu)){ ?>
                                                      <a href="/storage/{{$valueHot->other_menu}}" target="_blank"> Other Menu </a> <a href="javascript:void(0)" data-id="{{$hotCnt}}" class="remove_other_menu" style="color:red;">X</a>
                                                <?php } ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="">About</label>
   