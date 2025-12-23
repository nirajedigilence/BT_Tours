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
<!-- <div class="white_part notesSubSection">
    <div class="colspanPerStepMain">
        <div class="colspanPerStepLeft">
        Hotel Confirmation Template
        </div>
        <div class="colspanPerStepRight">
            <a href="javascript:;" class="downArrowCls backArrowBtnCls" data-back="9"><i class="fas fa-chevron-down"></i></a>
        </div>
    </div>
</div> -->
<div class="white_part">
    <div class="flwMainTitleCls">
         Experience Confirmation Template
    </div>
    <div class="partOneCls">
        
         <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for=""> Additional Information</label>
                    
                    <input type="hidden" name="step13[template_name]" value="ect" />
                    <input type="hidden" name="step13[confirmation_template_id]" value="{{isset($confirmation_template_ect) ? $confirmation_template_ect->id : ''}}">
                    <textarea class="form-control" name="step13[ect_confirm_additional_info]" id="13_confirm_additional_info" rows="7">{{ isset($confirmation_template_ect->ect_confirm_additional_info) ? strip_tags($confirmation_template_ect->ect_confirm_additional_info) : null }}</textarea>
                </div>
                <div class="form-group">
                    <label for=""> Meal Arrangements</label>
					
					<input type="hidden" name="step13[template_name]" value="ect" />
					<input type="hidden" name="step13[confirmation_template_id]" value="{{isset($confirmation_template_ect) ? $confirmation_template_ect->id : ''}}">
                    <textarea class="form-control" name="step13[ect_confirm_description]" id="13_confirm_description" rows="7">{{ isset($confirmation_template_ect->ect_confirm_description) ? strip_tags($confirmation_template_ect->ect_confirm_description) : null }}</textarea>
                </div>
                <div class="form-group">
                    <label for="">Driver's Free Place</label>
                    <input type="text" class="form-control" name="step13[ect_free_place]" id="13_free_place" value=" {{ isset($confirmation_template_ect->ect_free_place) ? strip_tags($confirmation_template_ect->ect_free_place) : null }}" > 
                </div>
                <div class="form-group">
                    <label for="">Inclusions</label>
                    <textarea class="form-control" name="step13[ect_group_size]" id="13_group_size" rows="3">{{ isset($confirmation_template_ect->ect_group_size) ? strip_tags($confirmation_template_ect->ect_group_size) : null }} </textarea>
                </div>
                <div class="form-group">
                    <label for="">Services and Facilities</label>
                     <textarea class="form-control" name="step13[ect_mobility_access]" id="13_mobility_access" rows="10">{{ isset($confirmation_template_ect->ect_mobility_access) ? strip_tags($confirmation_template_ect->ect_mobility_access) : null }}</textarea>
                </div>
                <div class="form-group">
                    <label for="">Terms and Conditions</label>
                    <textarea class="form-control" name="step13[ect_terms_conditions]" id="13_terms_conditions" rows="10"> {{ isset($confirmation_template_ect->ect_terms_conditions) ? strip_tags($confirmation_template_ect->ect_terms_conditions) : null }}</textarea>
                </div>
            </div>
        </div>

    </div>
</div>