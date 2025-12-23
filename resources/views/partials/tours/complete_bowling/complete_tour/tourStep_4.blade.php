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
        Overview
        </div>
        <div class="colspanPerStepRight">
            <a href="javascript:;" class="downArrowCls backArrowBtnCls" data-back="3"><i class="fas fa-chevron-down"></i></a>
        </div>
    </div>
</div>
<div class="white_part">
    <div class="flwMainTitleCls">
        Itinerary
    </div>
    <div class="expDayAppend">
        <?php 
            if(isset($experience->experiencesToItinerary)){
            if(count($experience->experiencesToItinerary) >= '1'){
                foreach ($experience->experiencesToItinerary as $keyEI => $valueEI) { ?>
                <div class="everyDayCls">
                        <div class="flwSubTitleCls">
                            <div class="row">
                                <div class="col-sm-11 dayCnt">
                                    Day 1
                                </div>
                                <div class="col-sm-1">
                                    <label for="Location1">&nbsp;</label>
                                    <a href="javascript:;" class="removeDayCls redCls"><i class="fas fa-minus-circle"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="partOneCls">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="Category1">Title</label>
                                        <input type="text" name="step4[day][title-edit][{{$valueEI->id}}]" class="form-control" value="{{$valueEI->name}}" required="" data-msg-required="Please provide title">
                                        <input type="hidden" name="step4[day][title-edit][{{$valueEI->id}}]" class="form-control" value="{{$valueEI->id}}">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="Category1">Short Description</label>
                                        <textarea name="step4[day][description-edit][{{$valueEI->id}}]" class="form-control" rows="7" required="" data-msg-required="Please provide description">{{$valueEI->description}}</textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="Category1">Departure Time</label>
                                        <input type="time" name="step4[day][departure_time-edit][{{$valueEI->id}}]" class="form-control" value="{{$valueEI->departure_time}}" required="" data-msg-required="Please provide departure time">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="Category1">Arrival Time</label>
                                        <input type="time" name="step4[day][arrival_time-edit][{{$valueEI->id}}]" class="form-control" value="{{$valueEI->arrival_time}}" required="" data-msg-required="Please provide arrival time" >
                                    </div>
                                </div>
                            </div>
                            <?php 
                            if(isset($valueEI->experiencesToItineraryImages)){
                                foreach ($valueEI->experiencesToItineraryImages as $key => $value) { ?>
                                <div class="image_galller position-Relative">
                                    <img src="{{ url("storage")}}/{{$value->images}}" class="">
                                    <div class="deleteImage text-danger deleteItineraryImg" data-id="{{$value->id}}"><i class="fa fa-trash" aria-hidden="true"></i></div>
                                </div>
                            <?php } } ?>
                            <div class="imageGalllerAppend_524126"></div>
                            <div class="brw_bx image_galller">
                                <div class="browse_btn">
                                    <input type="file" name="step4[day][images-edit][{{$valueEI->id}}][]" multiple="" accept="image/*" class="filesCls" data-id="524126">
                                    <div class="brw_user_ic">
                                        <i class="far fa-images"></i>
                                        <div class="brw_plus">
                                            <i class="fas fa-plus"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="Category1">Highlights</label>
                                        <div class="HighlightsApppend_1" >
                                            <?php 
                                        if(isset($valueEI)){
                                            if(count($valueEI->experiencesToItineraryImages) >= 1){
                                                $cnts = '145';
                                            foreach ($valueEI->experiencesToItineraryImages as $key => $value) { ?>
                                            <div class="row">
                                                <div class="col-sm-11">
                                                    <input name="step4[day][highlights-edit][{{$valueEI->id}}][1]" class="form-control HighlightsTxtCls" >
                                                </div>
                                                <div class="col-sm-1">
                                                    <div class="col-sm-1">
                                                        <label for="Location1">&nbsp;</label>
                                                        <a href="javascript:;" class="removeAmenitiesCls redCls"><i class="fas fa-minus-circle"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                            $cnts++;
                                         } } } else{ ?>
                                            <div class="row">
                                                <div class="col-sm-11">
                                                    <input name="step4[day][highlights-edit][{{$valueEI->id}}][1]" class="form-control HighlightsTxtCls" >
                                                </div>
                                                <div class="col-sm-1">
                                                    <div class="col-sm-1">
                                                        <label for="Location1">&nbsp;</label>
                                                        <a href="javascript:;" class="removeAmenitiesCls redCls"><i class="fas fa-minus-circle"></i></a>
                                                    </div>
                                                </div>
                                            </div>

                                        <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <input type="hidden" name="highRow1" class="highRow1" value="2">
                                    <div class="addmorelnk addHighlightsBtn" data-id="1">Add more</div>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php } } 
                } else { ?>
                    <div class="everyDayCls">
                        <div class="flwSubTitleCls">
                            <div class="row">
                                <div class="col-sm-11 dayCnt">
                                    Day 1
                                </div>
                                <div class="col-sm-1">
                                    <label for="Location1">&nbsp;</label>
                                    <a href="javascript:;" class="removeDayCls redCls"><i class="fas fa-minus-circle"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="partOneCls">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="Category1">Title</label>
                                        <input type="text" name="step4[day][title][1]" class="form-control" >
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="Category1">Short Description</label>
                                        <textarea name="step4[day][description][1]" class="form-control" rows="7"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="Category1">Departure Time</label>
                                        <input type="time" name="step4[day][departure_time][1]" class="form-control" >
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="Category1">Arrival Time</label>
                                        <input type="time" name="step4[day][arrival_time][1]" class="form-control" >
                                    </div>
                                </div>
                            </div>
                            <div class="imageGalllerAppend_524126"></div>
                            <div class="brw_bx image_galller">
                                <div class="browse_btn">
                                    <input type="file" name="step4[day][images][1][]" multiple="" accept="image/*" class="filesCls" data-id="524126">
                                    <div class="brw_user_ic">
                                        <i class="far fa-images"></i>
                                        <div class="brw_plus">
                                            <i class="fas fa-plus"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="Category1">Highlights</label>
                                        <div class="HighlightsApppend_1" >
                                            <div class="row">
                                                <div class="col-sm-11">
                                                    <input name="step4[day][highlights][1][1]" class="form-control HighlightsTxtCls" >
                                                </div>
                                                <div class="col-sm-1">
                                                    <div class="col-sm-1">
                                                        <label for="Location1">&nbsp;</label>
                                                        <a href="javascript:;" class="removeAmenitiesCls redCls"><i class="fas fa-minus-circle"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <input type="hidden" name="highRow1" class="highRow1" value="2">
                                    <div class="addmorelnk addHighlightsBtn" data-id="1">Add more</div>
                                </div>
                            </div>
                        </div>
                    </div>
        <?php } ?>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <input type="hidden" name="expDayRow" class="expDayRow" value="2">
            <div class="addmorelnk addDayBtn" data-id="1">Add another day</div>
        </div>
    </div>

</div>