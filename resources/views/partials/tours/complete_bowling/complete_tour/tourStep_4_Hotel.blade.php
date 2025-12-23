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
                    $tour_amenities_url = $valueHot->tour_amenities_url;
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
                                                <textarea class="form-control" name="step4[{{$hotCnt}}][about_hotel]"><?php
                                                if(!empty($about_hotel)){
                                                    echo $about_hotel;
                                                }else{
                                                    echo (isset($hotelDetail->description) ? strip_tags($hotelDetail->description) : ''); 
                                                } 
                                                ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Gallery</label>
                                                <?php 
                                                if(!empty($hotel_images)){
                                                    // pr($hotel_images);
                                                    foreach ($hotel_images as $key => $value) {
                                                        echo '<img src="'.url('/storage').'/'.$value->file.'" height="200" style="margin-right:5px;margin-bottom:5px;">';
                                                    }
                                                }else{
                                                    echo 'Images not found!';
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Amenities</label>
                                                <div class="customAmenitiesReviewsCls{{ $hotCnt }} cFCInclusionsCls" style="display: inline-block;width: 100%;"> 
                                                    <?php
                                                    if(!empty($valueHot->parking_amenity)){
                                                    ?>
                                                        <div class="form-group">
                                                            <label for="">Parking</label>
                                                            <input class="form-control" type="text" name="step4[{{$hotCnt}}][parking_amenity]" value="<?php echo (isset($valueHot->parking_amenity) ? $valueHot->parking_amenity : ''); ?>"> 
                                                            <input class="form-control" type="text" name="step4[{{$hotCnt}}][parking_amenity_url]" placeholder="URL" value="<?php echo (isset($valueHot->parking_amenity_url) ? $valueHot->parking_amenity_url : ''); ?>"> 
                                                        </div>
                                                    <?php }else{ ?>
                                                        <div class="form-group">
                                                            <label for="">Parking</label>
                                                            <input class="form-control" type="text" name="step4[{{$hotCnt}}][parking_amenity]" value="<?php echo (isset($hotelDetail->parking_amenity) ? $hotelDetail->parking_amenity : ''); ?>">
                                                            <input class="form-control" type="text" name="step4[{{$hotCnt}}][parking_amenity_url]" placeholder="URL" value="<?php echo (isset($hotelDetail->parking_amenity_url) ? $hotelDetail->parking_amenity_url : ''); ?>"> 
                                                        </div>
                                                    <?php } ?>
                                                    <?php
                                                    if(!empty($valueHot->porterage_amenity)){
                                                    ?>
                                                        <div class="form-group">
                                                            <label for="">Porterage</label>
                                                            <input class="form-control" type="text" name="step4[{{$hotCnt}}][porterage_amenity]" value="<?php echo (isset($valueHot->porterage_amenity) ? $valueHot->porterage_amenity : ''); ?>"> 
                                                            <input class="form-control" type="text" name="step4[{{$hotCnt}}][porterage_amenity_url]" placeholder="URL" value="<?php echo (isset($valueHot->porterage_amenity_url) ? $valueHot->porterage_amenity_url : ''); ?>"> 
                                                        </div>
                                                    <?php }else{ ?>
                                                        <div class="form-group">
                                                            <label for="">Porterage</label>
                                                            <input class="form-control" type="text" name="step4[{{$hotCnt}}][porterage_amenity]" value="<?php echo (isset($hotelDetail->porterage_amenity) ? $hotelDetail->porterage_amenity : ''); ?>"> 
                                                            <input class="form-control" type="text" name="step4[{{$hotCnt}}][porterage_amenity_url]" placeholder="URL" value="<?php echo (isset($hotelDetail->porterage_amenity_url) ? $hotelDetail->porterage_amenity_url : ''); ?>"> 
                                                        </div>
                                                    <?php } ?>
                                                    <?php
                                                    if(!empty($valueHot->lift_access_amenity)){
                                                    ?>
                                                        <div class="form-group">
                                                            <label for="">Lift access</label>
                                                            <input class="form-control" type="text" name="step4[{{$hotCnt}}][lift_access_amenity]" value="<?php echo (isset($valueHot->lift_access_amenity) ? $valueHot->lift_access_amenity : ''); ?>">
                                                            <input class="form-control" type="text" name="step4[{{$hotCnt}}][lift_access_amenity_url]" placeholder="URL" value="<?php echo (isset($valueHot->lift_access_amenity_url) ? $valueHot->lift_access_amenity_url : ''); ?>"> 
                                                        </div>
                                                    <?php }else{ ?>
                                                        <div class="form-group">
                                                            <label for="">Lift access</label>
                                                            <input class="form-control" type="text" name="step4[{{$hotCnt}}][lift_access_amenity]" value="<?php echo (isset($hotelDetail->lift_access_amenity) ? $hotelDetail->lift_access_amenity : ''); ?>"> 
                                                            <input class="form-control" type="text" name="step4[{{$hotCnt}}][lift_access_amenity_url]" placeholder="URL" value="<?php echo (isset($hotelDetail->lift_access_amenity_url) ? $hotelDetail->lift_access_amenity_url : ''); ?>"> 
                                                        </div>
                                                    <?php } ?>
                                                    <?php
                                                    if(!empty($valueHot->leisure_amenity)){
                                                    ?>
                                                    <div class="form-group">
                                                        <label for="">Leisure</label>
                                                        <input class="form-control" type="text" name="step4[{{$hotCnt}}][leisure_amenity]" value="<?php echo (isset($valueHot->leisure_amenity) ? $valueHot->leisure_amenity : ''); ?>"> 
                                                        <input class="form-control" type="text" name="step4[{{$hotCnt}}][leisure_amenity_url]" placeholder="URL" value="<?php echo (isset($valueHot->leisure_amenity_url) ? $valueHot->leisure_amenity_url : ''); ?>"> 
                                                    </div>
                                                    <?php }else{ ?>
                                                        <div class="form-group">
                                                            <label for="">Leisure</label>
                                                            <input class="form-control" type="text" name="step4[{{$hotCnt}}][leisure_amenity]" value="<?php echo (isset($hotelDetail->leisure_amenity) ? $hotelDetail->leisure_amenity : ''); ?>"> 
                                                            <input class="form-control" type="text" name="step4[{{$hotCnt}}][leisure_amenity_url]" placeholder="URL" value="<?php echo (isset($hotelDetail->leisure_amenity_url) ? $hotelDetail->leisure_amenity_url : ''); ?>"> 
                                                        </div>
                                                    <?php } ?>
                                                    <label>Additional Amenities</label>
                                                    <?php
                                                    if(!empty($tour_amenities)){
                                                        $tour_amenities = unserialize($tour_amenities);
                                                        $tour_amenities_url = !empty($tour_amenities_url)?unserialize($tour_amenities_url):array();
                                                        foreach ($tour_amenities as $key => $value) {
                                                            ?>
                                                            <div class="row">
                                                                <div class="col-sm-10">
                                                                    <input class="form-control" name="step4[{{$hotCnt}}][tour_amenities][]" type="text" value="{{ $value }}" placeholder=""> 
                                                                </div> 
                                                                <div class="col-sm-10">
                                                                    <input class="form-control" placeholder="URL" name="step4[{{$hotCnt}}][tour_amenities_url][]" type="text" value="{{ !empty($tour_amenities_url[$key])?$tour_amenities_url[$key]:'' }}" placeholder=""> 
                                                                </div> 
                                                                <div class="col-sm-2">
                                                                    <a href="javascript:;" class="nhSubCloseCls removeAddAmeReviewsbtn" >x</a>
                                                                </div> 
                                                            </div>
                                                            <?php
                                                        }
                                                    }elseif(!empty($hotelDetail->hotel_amenities)){
                                                        $hotel_amenities = unserialize($hotelDetail->hotel_amenities);
                                                        foreach ($hotel_amenities as $key => $value) {
                                                            ?>
                                                            <div class="row">
                                                                <div class="col-sm-10">
                                                                    <input class="form-control" name="step4[{{$hotCnt}}][tour_amenities][]" type="text" value="{{ $value }}" placeholder=""> 
                                                                </div> 
                                                                <div class="col-sm-2">
                                                                    <a href="javascript:;" class="nhSubCloseCls removeAddAmeReviewsbtn" >x</a>
                                                                </div> 
                                                            </div>
                                                            <?php
                                                        }
                                                    }else{
                                                        ?>
                                                        <!-- <div class="row ameReviewDiv_111">
                                                            <div class="col-sm-10">
                                                                <input class="form-control" name="step4[{{$hotCnt}}][inclusions][1]" type="text" value="" id="inclusions_1_1" placeholder=""> 
                                                            </div> 
                                                            <div class="col-sm-2">
                                                                <a href="javascript:;" class="nhSubCloseCls removeAddAmeReviewsbtn" data-id="111" >x</a>
                                                            </div> 
                                                        </div>  -->
                                                    <?php } ?>
                                                </div> 
                                                <a href="javascript:;" class="addmorelnk addAmenitiesReviewsCls" data-id="{{ $hotCnt }}">Add More</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flwSubTitleCls">
                            Upscales
                        </div>
                        <div class="partOneCls">
                            <div class="appendUpScalesPerfect{{$hotCnt}}">
                                <div class="UpScRow1"></div>
                                <?php
                                if(isset($hotelDetail)){
                                    if(count($hotelDetail->upscales) >= 1){
                                        $cnts = '455';
                                        foreach ($hotelDetail->upscales as $keyHU => $valueHU) { ?>
                                            <div class="row UpscalesRow">
                                                <div class="col-sm-10">
                                                    <div class="row">
                                                        <div class="col-sm-11">
                                                            <div class="form-group">
                                                                <label for="Category1">Upscales Title</label>
                                                                <input type="text" name="step4[{{$hotCnt}}][upscales][{{ $cnts }}][name]" class="form-control" required="" data-msg-required="Please provide title" value="{{ $valueHU->name }}" required="" data-msg-required="Please provide title">
                                                                <input type="hidden" name="step4[{{$hotCnt}}][upscales][{{ $cnts }}][id]" class="form-control" value="{{ $valueHU->id }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-1">
                                                            <div class="form-group">
                                                                <label for="Location1">&nbsp;</label>
                                                                <a href="javascript:;" class="removeAttrUpscalesCls redCls"><i class="fas fa-minus-circle"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="Category1">Upscales short description</label>
                                                        <textarea name="step4[{{$hotCnt}}][upscales][{{ $cnts }}][description]" class="form-control" rows="7" required="" data-msg-required="Please provide description">{{ strip_tags($valueHU->description) }}</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="custom_full_control"> <label>Gallery</label>
                                                            <div class="clearfix"></div>
                                                            <div class="dropzone_test dropzone myDropZoneCls step4_{{$hotCnt}}_upscales_{{ $cnts }}_img" data-name='step4[{{$hotCnt}}][upscales][{{ $cnts }}][images][]' data-cls=".step4_{{$hotCnt}}_upscales_{{ $cnts }}_img" >
                                                                <?php if(isset($hotelDetail)){ ?>
                                                                    @foreach ($valueHU->upscaleImages as $keyUI => $valueUI)
                                                                        <div class="image_galller position-Relative">
                                                                             <img src="{{ url("storage")}}/{{$valueUI->file}}">
                                                                             <div class="deleteImage text-danger deleteHotelUpscalesImg" data-id="{{$valueUI->id}}"><i class="fa fa-trash" aria-hidden="true"></i></div>
                                                                        </div>
                                                                    @endforeach
                                                                <?php } ?>                                                     
                                                            </div>
                                                            {{-- <div class="imageGalllerAppend_5454{{ $cnts }}"></div>
                                                            <div class="brw_bx image_galller">
                                                                <div class="browse_btn"> 
                                                                    <input type="file" class="filesCls" name="step4[{{$hotCnt}}][upscales][{{ $cnts }}][images][]" multiple="" data-id="5454{{ $cnts }}" accept="image/*">
                                                                    <div class="brw_user_ic"> <i class="far fa-images"></i>
                                                                        <div class="brw_plus"> <i class="fas fa-plus"></i> </div>
                                                                    </div>
                                                                </div>
                                                            </div> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    <?php
                                        $cnts++; 
                                        } } } else{ ?>
                                            <div class="row UpscalesRow">
                                                <div class="col-sm-10">
                                                    <div class="row">
                                                        <div class="col-sm-11">
                                                            <div class="form-group">
                                                                <label for="Category1">Upscales Title</label>
                                                                <input type="text" name="step4[1][upscales][1][name]" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-1">
                                                            <div class="form-group">
                                                                <label for="Location1">&nbsp;</label>
                                                                <a href="javascript:;" class="removeAttrUpscalesCls redCls"><i class="fas fa-minus-circle"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="Category1">Upscales short description</label>
                                                        <textarea name="step4[1][upscales][1][description]" class="form-control" rows="7"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="custom_full_control"> <label>Gallery</label>
                                                            <div class="clearfix"></div>
                                                            <div class="dropzone_test dropzone myDropZoneCls step4_1_upscales_1_img" data-name='step4[1][upscales][1][images][]' data-cls=".step4_1_upscales_1_img" ></div>
                                                            {{-- <div class="imageGalllerAppend_5454"></div>
                                                            <div class="brw_bx image_galller">
                                                                <div class="browse_btn"> 
                                                                    <input type="file" class="filesCls" name="step4[1][upscales][1][images][]" multiple="" data-id="5454" accept="image/*">
                                                                    <div class="brw_user_ic"> <i class="far fa-images"></i>
                                                                        <div class="brw_plus"> <i class="fas fa-plus"></i> </div>
                                                                    </div>
                                                                </div>
                                                            </div> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                <?php } ?>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <input type="hidden" name="expUpScalesRow" class="expUpScalesRow" value="2">
                                    <div class="addmorelnk addUpScalesPerfect" data-id="{{$hotCnt}}">Add more upscales</div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php  $hotCnt++; $cntHotal++; }  ?>
            <?php } else { 
                $notHotel = '1';?>
                
            <?php } ?>
        <?php } else { 
            if(isset($productDetail->getProductsSection)) { 
                $isDis = 0;
                $cntForHotel = 1;
                foreach ($productDetail->getProductsSection as $keyPro => $valuePro) { 
                    if($valuePro->sections_type == '5') { 
                        $isDis = 1; ?>
                        <div class="hotelRowCls">
                            <div class="flwSubTitleCls">
                                <div class="row">
                                    <div class="col-sm-11 hotelCntCls">
                                    Hotel {{ $cntForHotel }}
                                    </div>
                                    <div class="col-sm-1">
                                        <div class="form-group">
                                            <label for="Location1">&nbsp;</label>
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
                                                <select class="selectCls form-control" name="step4[{{$hotCnt}}][hotel_id]" required="" data-msg-required="Please select hotel">
                                                    <option value="">Select One</option>
                                                    <?php
                                                    // pr($hotelList);
                                                    if(!empty($hotelList)){
                                                        foreach ($hotelList as $key => $value) {
                                                            echo '<option value="'.$value->id.'">'.$value->name.'</option>';
                                                        }
                                                    }
                                                    ?>  
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flwSubTitleCls">
                                Upscales
                            </div>
                            <div class="partOneCls">
                                <div class="appendUpScalesPerfect{{ $cntHotal }}">
                                    <div class="UpScRow1"></div>                                   
                                    <div class="row UpscalesRow">
                                        <div class="col-sm-10">
                                            <div class="row">
                                                <div class="col-sm-11">
                                                    <div class="form-group">
                                                        <label for="Category1">Upscales Title</label>
                                                        <input type="text" name="step4[{{ $cntHotal }}][upscales][1][name]" class="form-control"  required="" data-msg-required="Please provide title">
                                                    </div>
                                                </div>
                                                <div class="col-sm-1">
                                                    <div class="form-group">
                                                        <label for="Location1">&nbsp;</label>
                                                        <a href="javascript:;" class="removeAttrUpscalesCls redCls"><i class="fas fa-minus-circle"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="Category1">Upscales short description</label>
                                                <textarea name="step4[{{ $cntHotal }}][upscales][1][description]" class="form-control" rows="7"  required="" data-msg-required="Please provide tripadvisor description"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <div class="custom_full_control"> <label>Gallery</label>
                                                    <div class="clearfix"></div>
                                                    <div class="dropzone_test dropzone myDropZoneCls step4_{{ $cntHotal }}_upscales_1_img" data-name='step4[{{ $cntHotal }}][upscales][1][images][]' data-cls=".step4_{{ $cntHotal }}_upscales_1_img" ></div>
                                                    {{-- <div class="imageGalllerAppend_5454{{ $cntHotal }}"></div>
                                                    <div class="brw_bx image_galller">
                                                        <div class="browse_btn"> 
                                                            <input type="file" class="filesCls" name="step4[{{ $cntHotal }}][upscales][1][images][]" multiple="" data-id="5454{{ $cntHotal }}" accept="image/*"  required="" data-msg-required="Please provide images">
                                                            <div class="brw_user_ic"> <i class="far fa-images"></i>
                                                                <div class="brw_plus"> <i class="fas fa-plus"></i> </div>
                                                            </div>
                                                        </div>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <input type="hidden" name="expUpScalesRow" class="expUpScalesRow" value="2">
                                        <div class="addmorelnk addUpScalesPerfect" data-id="{{ $cntHotal }}">Add more upscales</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php $cntForHotel++; $cntHotal++; }
                }
                if($isDis != 1){
                    $notHotel = '1';
                }
            }else{
                $notHotel = '1';
            }
            ?>
        <?php } ?>
        <?php if($notHotel == '1' && !isset($bespoke_id)){ ?>
            <div class="hotelRowCls">
                <div class="flwSubTitleCls">
                    <div class="row">
                        <div class="col-sm-11 hotelCntCls">
                        Hotel 1
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
                                    <select class="selectCls form-control hotelChange" name="step4[1][hotel_id]" required="" data-msg-required="Please select hotel" data-hotel="1">
                                        <option value="">Select One</option>
                                        <?php
                                        // pr($hotelList);
                                        if(!empty($hotelList)){
                                            foreach ($hotelList as $key => $value) {
                                                echo '<option value="'.$value->id.'">'.$value->name.'</option>';
                                            }
                                        }
                                        ?>  
                                    </select>
                                </div>
                                <div class="appendHotelDetails">
                                    
                                </div>
                                <div class="form-group">
                                    <label>Amenities</label>
                                        <div class="customAmenitiesReviewsCls1 cFCInclusionsCls" style="display: inline-block;width: 100%;"> 
                                           <!-- <div class="form-group">
                                                <label for="">Parking</label>
                                                <input class="form-control" type="text" name="step4[1][parking_amenity]" value=""> 
                                            </div>
                                            <div class="form-group">
                                                <label for="">Porterage</label>
                                                <input class="form-control" type="text" name="step4[1][porterage_amenity]" value=""> 
                                            </div>
                                            <div class="form-group">
                                                <label for="">Lift access</label>
                                                <input class="form-control" type="text" name="step4[1][lift_access_amenity]" value=""> 
                                            </div>
                                            <div class="form-group">
                                                <label for="">Leisure</label>
                                                <input class="form-control" type="text" name="step4[1][leisure_amenity]" value=""> 
                                            </div>
                                            <label>Additional Amenities</label> -->
                                        </div> 
                                        <a href="javascript:;" class="addmorelnk addAmenitiesReviewsCls" data-id="1">Add More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flwSubTitleCls">
                    Upscales
                </div>
                <div class="partOneCls">
                    <div class="appendUpScalesPerfect1">
                        <div class="UpScRow1"></div>
                        <?php
                        if(isset($hotelDetail) && count($hotelDetail) > 0){
                            if(count($hotelDetail->upscales) >= 1){
                                $cnts = '455';
                                foreach ($hotelDetail->upscales as $keyHU => $valueHU) { ?>
                                    <div class="row UpscalesRow">
                                        <div class="col-sm-10">
                                            <div class="row">
                                                <div class="col-sm-11">
                                                    <div class="form-group">
                                                        <label for="Category1">Upscales Title</label>
                                                        <input type="text" name="step4[1][upscales][{{ $cnts }}][name]" class="form-control" required="" data-msg-required="Please provide title" value="{{ $valueHU->name }}">
                                                        <input type="hidden" name="step4[1][upscales][{{ $cnts }}][id]" class="form-control" value="{{ $valueHU->id }}">
                                                    </div>
                                                </div>
                                                <div class="col-sm-1">
                                                    <div class="form-group">
                                                        <label for="Location1">&nbsp;</label>
                                                        <a href="javascript:;" class="removeAttrUpscalesCls redCls"><i class="fas fa-minus-circle"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="Category1">Upscales short description</label>
                                                <textarea name="step4[1][upscales][{{ $cnts }}][description]" class="form-control" rows="7" required="" data-msg-required="Please provide description">{{ strip_tags($valueHU->description) }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <div class="custom_full_control"> <label>Gallery</label>
                                                    <div class="clearfix"></div>
                                                    <div class="dropzone_test dropzone myDropZoneCls step4_upscales_u{{ $cnts }}_img" data-name='step4[1][upscales][{{ $cnts }}][images][]' data-cls=".step4_upscales_u{{ $cnts }}_img" >
                                                    <?php if(isset($hotelDetail)){ ?>
                                                        @foreach ($valueHU->upscaleImages as $keyUI => $valueUI)
                                                            <div class="image_galller">
                                                                 <img src="{{ url("storage")}}/{{$valueUI->file}}">
                                                            </div>
                                                        @endforeach
                                                    <?php } ?>                                                        
                                                    </div>
                                                    {{-- <div class="imageGalllerAppend_5454{{ $cnts }}"></div>
                                                    <div class="brw_bx image_galller">
                                                        <div class="browse_btn"> 
                                                            <input type="file" class="filesCls" name="step4[1][upscales][{{ $cnts }}][images][]" multiple="" data-id="5454{{ $cnts }}" accept="image/*">
                                                            <div class="brw_user_ic"> <i class="far fa-images"></i>
                                                                <div class="brw_plus"> <i class="fas fa-plus"></i> </div>
                                                            </div>
                                                        </div>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                $cnts++; 
                                } } } else{ ?>
                                    <div class="row UpscalesRow">
                                        <div class="col-sm-10">
                                            <div class="row">
                                                <div class="col-sm-11">
                                                    <div class="form-group">
                                                        <label for="Category1">Upscales Title</label>
                                                        <input type="text" name="step4[1][upscales][1][name]" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-1">
                                                    <div class="form-group">
                                                        <label for="Location1">&nbsp;</label>
                                                        <a href="javascript:;" class="removeAttrUpscalesCls redCls"><i class="fas fa-minus-circle"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="Category1">Upscales short description</label>
                                                <textarea name="step4[1][upscales][1][description]" class="form-control" rows="7"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <div class="custom_full_control"> <label>Gallery</label>
                                                    <div class="clearfix"></div>
                                                    <div class="dropzone_test dropzone myDropZoneCls step4_1_upscales_1_img" data-name='step4[1][upscales][1][images][]' data-cls=".step4_1_upscales_1_img" ></div>
                                                    {{-- <div class="imageGalllerAppend_5454"></div> --}}
                                                    {{-- <div class="brw_bx image_galller">
                                                        <div class="browse_btn"> 
                                                            <input type="file" class="filesCls" name="step4[1][upscales][1][images][]" multiple="" data-id="5454" accept="image/*">
                                                            <div class="brw_user_ic"> <i class="far fa-images"></i>
                                                                <div class="brw_plus"> <i class="fas fa-plus"></i> </div>
                                                            </div>
                                                        </div>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        <?php } ?>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <input type="hidden" name="expUpScalesRow" class="expUpScalesRow" value="2">
                            <div class="addmorelnk addUpScalesPerfect" data-id="1">Add more upscales</div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

    </div>
    <div class="row">
        <div class="col-sm-12">
            <input type="hidden" name="hotelSectionRow" class="hotelSectionRow" value="{{ $cntHotal }}">
            <div class="addmorelnk addHotelSection" data-id="{{ $cntHotal }}">Add more Hotel</div>
        </div>
    </div>
    {{-- </div> --}}
</div>
<script type="text/javascript">
    $('.menu_change').on('change',function(){
        var id = $(this).attr('data-id');
        var option = $(this).val();
        if(option == 3)
        {
            $('.other_menu_'+id).show();
        }
        else
        {
            $('#other_menu_'+id)
            $('.other_menu_'+id).hide();
        }
    })
    $('.remove_other_menu').on("click",function(){
         var id = $(this).attr('data-id');
            if(confirm("Are you sure?"))
            {
                $('#other_menu_'+id).val('');
                $('#other_menu_file_'+id).val('');
                $(this).prev('a').remove();
                $(this).remove();
            }
                    
    })
</script>