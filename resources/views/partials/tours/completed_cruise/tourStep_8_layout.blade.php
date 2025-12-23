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

<!-- <div class="white_part notesSubSection">
    <div class="colspanPerStepMain">
        <div class="colspanPerStepLeft">
        Dates and rates
        </div>
        <div class="colspanPerStepRight">
            <a href="javascript:;" class="downArrowCls backArrowBtnCls" data-back="7"><i class="fas fa-chevron-down"></i></a>
        </div>
    </div>
</div> -->
<div class="white_part notesSubSection">
    <div class="colspanPerStepMain">
        <div class="colspanPerStepLeft">
        Tour pack template
        </div>
        <div class="colspanPerStepRight">
            <a href="javascript:;" class="downArrowCls backArrowBtnCls" data-back="8"><i class="fas fa-chevron-down"></i></a>
        </div>
    </div>
</div>

 
<div class="white_part">
    <div class="flwMainTitleCls">
        Brochure view - Layout 1
    </div>
    <div class="flwSubTitleCls">
        
        <div class="brochure">

            <div class="brochure_view account" style="max-width: 900px;">

                <div class="banner"></div>

                <div class="page">

                    <div class="header">

                        <div class="logo_wrapper">
                            <div class="logo">
                                <img src="{{ asset('images/logo2x.png') }}">
                            </div>
                        </div>

                    </div>

                    <div class="body">

                        <div class="column">
                            <?php
                            $image_1 = '';
                            if(isset($brochures->image_1) && !empty($brochures->image_1)){
                                $image_1 = $brochures->image_1;
                            }
                            ?>
                            <input type="hidden" name="step9[image_1]" value="{{!empty($image_1) ? $image_1 : ''}}" id="image_1">
                            <a href="javascript:;" class="insert image addImageBrochure1">
                                <?php
                                if(!empty($image_1)){
                                    echo '<img src="'.$image_1.'">';
                                }else{
                                ?>
                                    <div class="icon">
                                        <i class="fas fa-images"></i>
                                    </div>
                                    <div class="plus"></div>
                                <?php } ?>
                            </a>

                            <div class="heading">
                                {{@$experience->name}}
                            </div>

                            <div class="price">
                                &pound;<input type="text" name="step9[rate_pp]" style="width: 60px;font-weight: bold;" value="{{(isset($brochures->rate_pp) ? $brochures->rate_pp : @$experience->rate)}}"> sharing pp / &pound;<input type="text" name="step9[srs_pp]" style="width: 60px;font-weight: bold;" value="{{(isset($brochures->srs_pp) ? $brochures->srs_pp : @$experience->srs)}}"> single pp
                            </div>

                            <span class="insert">
                                <div class="text">
                                    <input type="hidden" name="step9[brochure_id]" value="{{isset($brochures) ? $brochures->id : ''}}">
                                    <textarea id="textarea_1_step9" class="form-control" name="step9[textarea_1]">{{isset($brochures) ? $brochures->textarea_1 : ''}}</textarea>
                                </div>
                            </span>

                            <span class="insert">
                                <div class="text">
                                    <textarea class="form-control" id="textarea_2_step9"name="step9[textarea_2]">{{isset($brochures) ? $brochures->textarea_2 : ''}}</textarea>
                                </div>
                            </span>

                            <span class="insert">
                                <div class="text">
                                    <textarea class="form-control" id="textarea_3_step9"name="step9[textarea_3]">{{isset($brochures) ? $brochures->textarea_3 : ''}}</textarea>
                                </div>
                            </span>
                            <?php
                            $image_2 = '';
                            if(isset($brochures->image_2) && !empty($brochures->image_2)){
                                $image_2 = $brochures->image_2;
                            }
                            ?>
                            <input type="hidden" name="step9[image_2]" value="{{!empty($image_2) ? $image_2 : ''}}" id="image_2">
                            <a href="javascript:;" class="insert image addImageBrochure2">
                                <?php
                                if(!empty($image_2)){
                                    echo '<img src="'.$image_2.'">';
                                }else{
                                ?>
                                    <div class="icon">
                                        <i class="fas fa-images"></i>
                                    </div>
                                    <div class="plus"></div>
                                <?php } ?>
                            </a>

                        </div>

                        <div class="column">

                            <span class="insert">
                                <div class="text">
                                    <textarea class="form-control" id="textarea_4_step9"name="step9[textarea_4]">{{isset($brochures) ? $brochures->textarea_4 : ''}}</textarea>
                                </div>
                            </span>
                            <?php
                            $image_3 = '';
                            if(isset($brochures->image_3) && !empty($brochures->image_3)){
                                $image_3 = $brochures->image_3;
                            }
                            ?>
                            <input type="hidden" name="step9[image_3]" value="{{!empty($image_3) ? $image_3 : ''}}" id="image_3">
                            <a href="javascript:;" class="insert image addImageBrochure3">
                                <?php
                                if(!empty($image_3)){
                                    echo '<img src="'.$image_3.'">';
                                }else{
                                ?>
                                    <div class="icon">
                                        <i class="fas fa-images"></i>
                                    </div>
                                    <div class="plus"></div>
                                <?php } ?>
                            </a>
                            

                            <span class="insert">
                                <div class="text">
                                    <textarea class="form-control" id="textarea_5_step9" name="step9[textarea_5]">{{isset($brochures) ? $brochures->textarea_5 : ''}}</textarea>
                                </div>
                            </span>

                            <div class="rating">
                                <div class="label">
                                    <select class="form-control" name="step9[hotel_id]" id="brochureHotels">
                                        <option value="">-Select Hotel-</option>
                                        <?php
                                        if(!empty($experiencesToHotelList)){
                                            foreach ($experiencesToHotelList as $key => $value) {
                                                $selected = '';
                                                if(isset($value->getHotelDetail) && !empty($value->getHotelDetail)){
                                                    if(isset($brochures) && $brochures->hotel_id == $value->getHotelDetail->id){
                                                        $selected = 'selected';
                                                    }
                                                    echo '<option value="'.$value->getHotelDetail->id.'" '.$selected.'>'.$value->getHotelDetail->name.'</option>';
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="stars" id="addStarsHere">
                                    
                                </div>
                            </div>

                            <span class="insert">
                                <div class="text">
                                    <textarea class="form-control" id="textarea_6_step9" name="step9[textarea_6]">{{isset($brochures) ? $brochures->textarea_6 : ''}}</textarea>
                                </div>
                            </span>

                            <div class="sub_heading">
                                What's Included
                            </div>

                            <ul class="inclusions_list" style="margin-bottom:0px;">
                                <?php
                                $brochureInclusions = array();
                                if(isset($brochures->inclusions) && !empty($brochures->inclusions)){
                                    $brochureInclusions = unserialize($brochures->inclusions);
                                }
                                if(!empty($brochureInclusions)){
                                    foreach ($brochureInclusions as $key => $value) {
                                        ?>
                                        <li>
                                            <i class="far fa-check-circle"></i>
                                            <span class="insert">
                                                <div class="text">
                                                    <input type="text" class="form-control" style="float:left;width:90%;" name="step9[inclusions][]" value="{{$value}}">
                                                    <a href="javascript:;" class="removeInclubtn" style="font-size: 30px;line-height: 35px;color: red;padding: 5px;">x</a>
                                                </div>
                                            </span>
                                        </li>
                                        <?php
                                    }
                                }else{
                                ?>
                                <li>
                                    <i class="far fa-check-circle"></i>
                                    <span class="insert">
                                        <div class="text">
                                            <input type="text" class="form-control" name="step9[inclusions][]" style="float:left;width:90%;">
                                            <a href="javascript:;" class="removeInclubtn" style="font-size: 30px;line-height: 35px;color: red;padding: 5px;">x</a>
                                        </div>
                                    </span>
                                </li>
                            <?php } ?>
                            </ul>
                            <a href="javascript:;" class="addmorelnk addIncluCls" style="text-align: right;padding-bottom: 20px;">Add More</a>
                            <ul class="hotel_details">

                                <li style="display: unset;">
                                    <i class="far fa-calendar-alt"></i>
                                    <div>
                                    <?php
                                    $brochureDates = array();
                                    if(isset($brochures->dates) && !empty($brochures->dates)){
                                        $brochureDates = unserialize($brochures->dates);
                                    }
                                    $optionsHtml = '';
                                    if(!empty($experienceDatesRates)){
                                        foreach ($experienceDatesRates as $key => $value) {
                                            if (isset($experience->еxperiencesToHotelsToExperienceDates)){
                                                foreach ($experience->еxperiencesToHotelsToExperienceDates as $k => $rec){
                                                    if (isset($rec->experienceDate)){
                                                        if ($value->id == $rec->experienceDate->dates_rates_id){
                                                            $date_from = $rec->experienceDate->date_from;
                                                            $date_to = $rec->experienceDate->date_to;
                                                            $date = convert2DMYForHotelDates($date_from).' - '.convert2DMYForHotelDates($date_to).' ('.$rec->experienceDate->nights.' nights)';
                                                            
                                                            $selectedd = '';
                                                            if(in_array($date,$brochureDates)){
                                                                $selectedd = 'selected';
                                                            }
                                                            $optionsHtml .= '<option value="'.$date.'" '.$selectedd.'>'.$date.'</option>';
                                                            

                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                    if(!empty($optionsHtml)){
                                    ?>
                                        <select class="form-control selectCls" name="step9[dates][]" multiple>
                                            <?php echo $optionsHtml; ?>
                                        </select>
                                    <?php }else{ ?>
                                        <input type="text" name="step9[dates][]" class="form-control" value="{{isset($brochureDates[0]) ? $brochureDates[0] : ''}}">
                                    <?php } ?>
                                    </div>
                                </li>

                                <li style="display: unset;">
                                    <i class="fas fa-utensils"></i>
                                    <div>
                                        <span class="insert">
                                            <div class="text">
                                                <input type="text" class="form-control" name="step9[breakfast]" value="{{isset($brochures) ? $brochures->breakfast : ''}}">
                                            </div>
                                        </span>
                                    </div>
                                </li>

                            </ul>

                        </div>

                    </div>

                    <div class="footer">
                        <div class="line blue"></div>
                        <div class="number">01753 836600</div>
                        <div class="line orange"></div>
                    </div>

                </div>

            </div>

        </div>

    </div>
    <div class="partOneCls">
        
    </div>            
</div>

<div id="brochureModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Select Image</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <select class="form-control" id="hotelsDropdown">
            <option value="">-- Hotels --</option>
            <?php
            if(!empty($experiencesToHotelList)){
                foreach ($experiencesToHotelList as $key => $value) {
                    if(isset($value->getHotelDetail) && !empty($value->getHotelDetail)){
                        echo '<option value="'.$value->getHotelDetail->id.'">'.$value->getHotelDetail->name.'</option>';
                    }
                }
            }
            ?>
        </select>
        <span style="text-align:center;width: 100%;display: inline-block;">--- OR ---</span>
        <select class="form-control" id="expDropdown">
            <option value="">-- Experiences --</option>
            <?php
            if(!empty($experience->experienceAttractions)){
                foreach ($experience->experienceAttractions as $key => $value) {
                    echo '<option value="'.$value->id.'">'.$value->name.'</option>';
                }
            }
            ?>
        </select>
        <div id="appdBrochueImages"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>