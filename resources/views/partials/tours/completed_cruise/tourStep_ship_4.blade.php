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
        Itinerary
        </div>
        <div class="colspanPerStepRight">
            <a href="javascript:;" class="downArrowCls backArrowBtnCls" data-back="4"><i class="fas fa-chevron-down"></i></a>
        </div>
    </div>
</div>
<div class="white_part">
    <div class="flwMainTitleCls">
        Ship
    </div>
    <div class="HotelAppendCls">
        <div class="partOneCls">
            <?php $hotel_no = 1; ?>
             <?php 
            $cntHotal = 2;
            $notHotel = 0;
            if(isset($experiencesToHotelList)){ ?>
                <?php if(count($experiencesToHotelList) > 0){
                    $hotCnt = 1;
                    foreach ($experiencesToHotelList as $keyHot => $valueHot) {
                        
                         $hotelDetail = $valueHot->getHotelDetail;
                        $ship_detail = 


DB::connection('mysql_veenus')->table('ships')->where('id', $hotelDetail->id)->first();
                        $tour_amenities = $ship_detail->cabin_types;
                        $about_hotel = $ship_detail->about_text;
                       
                        //$cabinDetail = $valueHot->experiencesShipCabin;
                        $cabinDetail = 


DB::connection('mysql_veenus')->table('ship_cabins')->where('ships_id', $hotelDetail->id)->get();
                        $hotel_images = array();
                        if(isset($hotelDetail->id) && !empty($hotelDetail->id)){
                            $hotel_images = 


DB::connection('mysql_veenus')->table('ship_images')->where('ships_id', $hotelDetail->id)->get()->toArray();
                        }
                        $ex_to_hotel_dates = 


DB::connection('mysql_veenus')->table('experiences_to_ships_to_experience_dates')->where('experiences_to_hotels_id', $valueHot->id)->where('deleted_at', null)->first();
                     ?>
            <div class="append3VipExperiences">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Category1">Ship</label>
                            <select class="selectCls form-control shipChange hotRating_{{$hotel_no}}" name="step4[{{$hotCnt}}][ship_id]" required="" data-msg-required="Please select ship" data-hotel="{{$hotCnt}}">
                                <option value="">Select One</option>
                                <?php 
                                if(!empty($shipList)){
                                foreach ($shipList as $key => $value) { ?>
                                    <option value="{{$value->id}}" <?=($valueHot->ships_id == $value->id)?'selected="selected"':''?>>{{$value->name}}</option>
                                <?php } } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="cFCInclusionsCls">
                    <div class="row">   
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="Category1">Star Rating</label>
                                <select class="form-control" readonly>
                                    <?php for ($i=1; $i < 6; $i++) { ?>
                                        <option  <?=($ship_detail->stars == $i)?'selected="selected"':''?> value="{{ $i }}">{{ $i }} Stars</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="Category1">Gallary Link</label>
                                <input type="text" readonly value="{{$ship_detail->menu_link}}" class="form-control" >
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="Category1">Facilities link</label>
                                <input type="text" readonly class="form-control" >
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="Category1">About</label>
                                <textarea readonly class="form-control" name="step4[{{$hotCnt}}][description]"><?php
                                    if(!empty($about_hotel)){
                                        echo $about_hotel;
                                    }else{
                                        echo (isset($hotelDetail->about_text) ? strip_tags($hotelDetail->about_text) : ''); 
                                    } 
                                    ?></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">Menu</label>
                            <select data-id="{{$hotCnt}}" class="form-control menu_change"  name="step4[{{$hotCnt}}][selected_menu]" required="">
                                <?php if(!empty($hotelDetail->main_menu)) {?>
                                <option value="1" <?php echo (isset($valueHot->selected_menu) && ($valueHot->selected_menu == 1) ? 'selected' : ''); ?>>Main Menu</option>
                                  <?php } ?>  
                                <?php if(!empty($hotelDetail->festive_menu)) {?>
                                <option value="2" <?php echo (isset($valueHot->selected_menu) && ($valueHot->selected_menu == 2) ? 'selected' : ''); ?>>Festive Menu</option>
                                <?php } ?>  
                               <!--  <option value="4" <?php echo (isset($valueHot->selected_menu) && ($valueHot->selected_menu == 4) ? 'selected' : ''); ?>>None</option>  
                                <option value="3" <?php echo (isset($valueHot->selected_menu) && ($valueHot->selected_menu == 3) ? 'selected' : ''); ?>>Other</option>   -->
                                
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
                        </div>
                       <?php /* <div class="form-group">
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
                        </div> */?>
                    </div>
                
                    <div class="partOneCls">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group ">
                                    <label for="">On-board Facilities</label>
                                   <!--  <label for="Category1">Name</label> -->
                                    <div class="Amenities_1">
                                        <?php
                                            if(!empty($tour_amenities)){
                                                $tour_amenities = unserialize($tour_amenities);
                                                foreach ($tour_amenities as $key => $value) {
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-sm-10">
                                                            <input readonly class="form-control" name="step4[{{$hotCnt}}][tour_amenities][]" type="text" value="{{ $value }}" placeholder=""> 
                                                        </div> 
                                                       <!--  <div class="col-sm-2">
                                                            <a href="javascript:;" class="nhSubCloseCls removeAddAmeReviewsbtn" >x</a>
                                                        </div>  -->
                                                    </div>
                                                    <?php
                                                }
                                            }elseif(!empty($hotelDetail->hotel_amenities)){
                                                $hotel_amenities = unserialize($hotelDetail->hotel_amenities);
                                                foreach ($hotel_amenities as $key => $value) {
                                                    ?>
                                                    <!-- <div class="row">
                                                        <div class="col-sm-10">
                                                            <input class="form-control" name="step4[{{$hotCnt}}][tour_amenities][]" type="text" value="{{ $value }}" placeholder=""> 
                                                        </div> 
                                                        <div class="col-sm-2">
                                                            <a href="javascript:;" class="nhSubCloseCls removeAddAmeReviewsbtn" >x</a>
                                                        </div> 
                                                    </div> -->
                                                    <?php
                                                }
                                            }else{
                                                ?>
                                              
                                            <?php } ?>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <input type="hidden" name="expdAmenitiesRow" class="expdAmenitiesRow" value="2">
                                <div class="addmorelnk addAmenitiesBtn" data-id="1">Add another</div>
                            </div>
                        </div>
                    </div>
                
                    <div class="partOneCls">
                        
                        <div class="row paddingUpBottam">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="Category1">Built</label>
                                    <input type="number" readonly name="step4[{{$hotCnt}}][built]" value="{{$ship_detail->built}}" maxlength="4" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="Category1">Renovated</label>
                                    <input type="number" readonly name="step4[{{$hotCnt}}][commissioned]" value="{{$ship_detail->commissioned}}"  class="form-control" maxlength="4">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="Category1">Cabins</label>
                                    <input type="number" readonly name="step4[{{$hotCnt}}][cabins]" value="{{$ship_detail->cabins}}"  min="0" max="9999" maxlength="4" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="Category1">Passengers</label>
                                    <input type="number" readonly name="step4[{{$hotCnt}}][passengers]" value="{{$ship_detail->passengers}}"  min="0" max="9999" maxlength="4" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="Category1">Crew</label>
                                    <input type="number" readonly name="step4[{{$hotCnt}}][crew]" value="{{$ship_detail->crew}}"  min="0" max="9999" maxlength="4" class="form-control">
                                </div>
                            </div>
                            
                             <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="Category1">Length</label>
                                    <input type="number" readonly name="step4[{{$hotCnt}}][length]" value="{{$ship_detail->length}}"  class="form-control" maxlength="4">
                                </div>
                            </div>
                             <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="Category1">Draught</label>
                                    <input type="number" readonly name="step4[{{$hotCnt}}][draught]" value="{{$ship_detail->draft}}"  step="0.01" min="0" max="99.99" class="form-control">
                                </div>
                            </div>
                             <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="Category1">Beam</label>
                                    <input type="number" readonly name="step4[{{$hotCnt}}][beam]" value="{{$ship_detail->beam}}"  step="0.01" min="0" max="99.99" class="form-control">
                                </div>
                            </div>
                           
                           
                           <!--  <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="Category1">Staff to guestS ratio</label>
                                    <input type="number" readonly name="step4[{{$hotCnt}}][staff_to_guest]" value="{{$ship_detail->staff_to_guest}}"  min="0" max="9999" maxlength="4" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="Category1">Refurbished</label>
                                    <input type="number" readonly name="step4[{{$hotCnt}}][refurbished]" value="{{$ship_detail->refurbished}}"  class="form-control" maxlength="4">
                                </div>
                            </div> -->
                           
                            
                            
                           
                        </div>
                        
                    </div>
                </div>
                <div class="shipCabinDiv">      
                <div class="flwMainTitleCls">
                    Cabins
                </div>
                <div class="cabinsAppend">
                    <?php
                        if(isset($cabinDetail)){
                            if(count($cabinDetail) >= 1){
                                $cnts = '455';
                                $cab_cnt = 1;
                                foreach ($cabinDetail as $keyHU => $valueHU) { ?>
                    <div class="everycabinsCls">
                        <div class="flwSubTitleCls">
                            <div class="row">
                                <div class="col-sm-11 cabinCnt">
                                    Cabin {{$cab_cnt}}
                                </div>
                                <div class="col-sm-1">
                                    <label for="Location1">&nbsp;</label>
                                    <!-- <a href="javascript:;" class="removeCabinCls redCls"><i class="fas fa-minus-circle"></i></a> -->
                                    <input type="hidden" value="{{$valueHU->id}}" name="step4[{{$hotCnt}}][cabin][{{ $cnts }}][id]" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="partOneCls">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="Category1">Cabin Name</label>
                                        <input type="text"readonly value="{{$valueHU->name}}" name="step4[{{$hotCnt}}][cabin][{{ $cnts }}][name]" class="form-control">
                                    </div>
                                </div>
                                <!-- <div class="col-sm-12">
                                    <div class="imageGalllerAppend_535326"></div>\
                                    <div class="brw_bx image_galller">
                                        <div class="browse_btn">
                                            <input type="file" name="step4[{{$hotCnt}}][cabin][{{ $cnts }}][image][]" multiple="" class="multiImgCls filesCls" data-id="535326" accept="image/*">
                                            <span></span>
                                            <div class="brw_user_ic">
                                                <i class="far fa-images"></i>
                                                <div class="brw_plus">
                                                    <i class="fas fa-plus"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="Category1">Description Text</label>
                                        <textarea readonly name="step4[{{$hotCnt}}][cabin][{{ $cnts }}][description]" class="form-control" rows="7">{{$valueHU->description}}</textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="Category1">Size</label>
                                        <input type="text"readonly value="{{$valueHU->size_bold}}" name="step4[{{$hotCnt}}][cabin][{{ $cnts }}][size_bold]" class="form-control">
                                    </div>
                                </div>
                               <!--  <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="Category1">Size Text</label>
                                        <input type="text"readonly value="{{$valueHU->size_text}}" name="step4[{{$hotCnt}}][cabin][{{ $cnts }}][size_text]" class="form-control">
                                    </div>
                                </div> -->
                                
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="Category1">View</label>
                                        <input type="text" readonly value="{{$valueHU->view}}" name="step4[{{$hotCnt}}][cabin][{{ $cnts }}][view]" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                     <?php
                     $cab_cnt++;
                        $cnts++; 
                        } } }  ?>
                </div>
                <!-- <div class="row">
                    <div class="col-sm-12">
                        <input type="hidden" name="expCabinRow" class="expCabinRow" value="{{!empty($cnts)?$cnts:'1'}}">
                        <div class="addmorelnk addCabinBtn" data-id="1">Add another Cabin</div>
                    </div>
                </div> -->
            </div>
            </div>
            
            <?php  $hotCnt++; $cntHotal++; }  ?>
                <?php } else { 
                    $notHotel = '1';?>
                    
                <?php } ?>
            <?php } else { $hotCnt =1; ?>
           
            <?php } ?>
                
        </div>
    </div><!-- HotelAppendCls -->
    <div class="row">
        <div class="col-sm-12">
            <input type="hidden" name="hotelSectionRow" class="hotelSectionRow" value="{{ $cntHotal }}">
            <div class="addmorelnk addHotelSection" data-id="{{ $cntHotal }}">Add more Ship</div>
        </div>
    </div>
</div>