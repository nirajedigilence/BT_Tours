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
<?php /*
<div class="white_part">
    <div class="flwMainTitleCls">
        Hotel Confirmation Template
    </div>
    <div class="partOneCls">
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="">Free place</label>
                    <!-- <input class="form-control" value="{{ isset($confirmation_template_hc->hc_free_place) ? strip_tags($confirmation_template_hc->hc_free_place) : null }}"  name="step12[hc_free_place]" type="text" id="12_free_place" >  -->
                    <textarea class="form-control" id="12_free_place" name="step12[hc_free_place]" id="12_meal_arrangements" rows="7">{{ isset($confirmation_template_hc->hc_free_place) ? strip_tags($confirmation_template_hc->hc_free_place) : null }}</textarea>
                </div>
                <div class="form-group">
                    <label for="">Meal arrangements</label>
					<input type="hidden" name="step12[template_name]" value="hc" />
					<input type="hidden" name="step12[confirmation_template_id]" value="{{isset($confirmation_template_hc) ? $confirmation_template_hc->id : ''}}">
					<textarea class="form-control" name="step12[hc_meal_arrangements]" id="12_meal_arrangements" rows="7">{{ isset($confirmation_template_hc->hc_meal_arrangements) ? strip_tags($confirmation_template_hc->hc_meal_arrangements) : null }}</textarea>
                </div>

                <div class="form-group">
                    <label for="">Inclusions</label>
                    <textarea class="form-control" name="step12[hc_inclusions]" id="12_inclusions" rows="3">{{ isset($confirmation_template_hc->hc_inclusions) ? strip_tags($confirmation_template_hc->hc_inclusions) : null }}</textarea>
                </div>
                <div class="form-group">
                    <label for="">Additional services and facilities</label>
                     <textarea class="form-control" name="step12[hc_services_facilities]" id="12_services_facilities" rows="10">{{ isset($confirmation_template_hc->hc_services_facilities) ? strip_tags($confirmation_template_hc->hc_services_facilities) : null }} </textarea>
                </div>
                <div class="form-group">
                    <label for="">Terms and Conditions</label>
                    <textarea class="form-control" name="step12[hc_terms_conditions]" id="12_terms_conditions" rows="10">{{ isset($confirmation_template_hc->hc_terms_conditions) ? strip_tags($confirmation_template_hc->hc_terms_conditions) : null }}</textarea>
                </div>
            </div>
        </div>
        

    </div>
</div> */?>