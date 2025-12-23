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
<div class="white_part">
    <div class="flwMainTitleCls">
        Overview
    </div>
    <div class="flwSubTitleCls">
        Overview Left Side
    </div>
    <div class="partOneCls">
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="Category1">Short Description</label>
                    <textarea name="step1[itinerary]" class="form-control" rows="7">{{ isset($experience->itinerary) ? strip_tags($experience->itinerary) : null }}</textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="flwSubTitleCls">
        Perfect For
    </div>
    <div class="partOneCls">
        <div class="appendPerfect">
            <?php 
            if(isset($experiencesToPerfectFor)){
            if(count($experiencesToPerfectFor) >= '1'){
                foreach ($experiencesToPerfectFor as $keyEI => $valueEI) { ?>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="Category1">Icon</label>
                                <select class="form-control selectCls" name="step3[icon][1]" required="" data-msg-required="Please select icon">
                                    <option value="">Select One</option>
                                    <?php 
                                    foreach ($iconList as $key => $value) { ?>
                                        <option value="1" data-icon="{{$value->icon}}" <?php echo $valueEI->icon_list_id == $value->id ? 'selected':''; ?>>{{$value->name}}</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="Category1">&nbsp;</label>
                                <input name="step3[number][1]" class="form-control" value="{{ $valueEI->number}}" required="" data-msg-required="Please provide name">
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label for="Category1">Name</label>
                                <input name="step3[name][1]" class="form-control" value="{{ $valueEI->name}}" required="" data-msg-required="Please provide number">
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="form-group">
                                <label for="Location1">&nbsp;</label>
                                <a href="javascript:;" class="removeAttrPerfectClsEdit redCls" data-id="{{ $valueEI->id }}"><i class="fas fa-minus-circle"></i></a>
                            </div>
                        </div>
                    </div>
            <?php } } 
                } else { ?>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="Category1">Icon</label>
                            <select class="form-control selectCls" name="step3[icon][1]">
                                <option value="">Select One</option>
                                <?php 
                                foreach ($iconList as $key => $value) { ?>
                                    <option value="1" data-icon="{{$value->icon}}">{{$value->name}}</option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="Category1">&nbsp;</label>
                            <input name="step3[number][1]" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label for="Category1">Name</label>
                            <input name="step3[name][1]" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <div class="form-group">
                            <label for="Location1">&nbsp;</label>
                            <a href="javascript:;" class="removeAttrPerfectCls redCls"><i class="fas fa-minus-circle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="Category1">Icon</label>
                            <select class="form-control selectCls" name="step3[icon][2]">
                                <option value="">Select One</option>
                                <?php 
                                foreach ($iconList as $key => $value) { ?>
                                    <option value="1" data-icon="{{$value->icon}}">{{$value->name}}</option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="Category1">&nbsp;</label>
                            <input name="step3[number][2]" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label for="Category1">Name</label>
                            <input name="step3[name][2]" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <div class="form-group">
                            <label for="Location1">&nbsp;</label>
                            <a href="javascript:;" class="removeAttrPerfectCls redCls"><i class="fas fa-minus-circle"></i></a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <input type="hidden" name="expPerfectRow" class="expPerfectRow" value="3">
                <div class="addmorelnk addPerfect" data-id="1">Add More</div>
            </div>
        </div>
    </div>
</div>