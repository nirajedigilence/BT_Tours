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
<div class="white_part">
    <div class="flwMainTitleCls">
        Tour pack template
    </div>
    <div class="partOneCls">
        
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="">ETA (Check in procedure etc)</label>
                    <textarea class="form-control" name="step11[eta]" id="eta">{{ isset($experience->eta) ? strip_tags($experience->eta) : null }}</textarea>
                </div>
                <div class="form-group">
                    <label for="">ETD (Check out procedure etc)</label>
                    <textarea class="form-control" name="step11[etd]" id="etd">{{ isset($experience->etd) ? strip_tags($experience->etd) : null }}</textarea>
                </div>
                <div class="form-group">
                    <label for="">Dinner (Service type,tables,menu)</label>
                    <textarea class="form-control" name="step11[dinner]" id="dinner">{{ isset($experience->dinner) ? strip_tags($experience->dinner) : null }}</textarea>
                </div>
                <div class="form-group">
                    <label for="">Breakfast (Service type,tables,timing)</label>
                    <textarea class="form-control" name="step11[breakfast]" id="breakfast">{{ isset($experience->breakfast) ? strip_tags($experience->breakfast) : null }}</textarea>
                </div>
                <div class="form-group">
                    <label for="">Inclusions</label>
                    <textarea class="form-control" name="step11[tour_inclusions]" id="tour_inclusions">{{ isset($experience->tour_inclusions) ? strip_tags($experience->tour_inclusions) : null }}</textarea>
                </div>
            </div>
        </div>

    </div>
</div>