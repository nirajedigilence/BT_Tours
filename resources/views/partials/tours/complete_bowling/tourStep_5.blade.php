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
    <div class="partOneCls">
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="Category1">Ship Name</label>
                    <input type="text" name="step5[ship][name]" class="form-control" >
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="Category1">Star Rating</label>
                    <select name="step5[ship][star_rating]" class="selectCls">
                        <?php for ($i=1; $i < 6; $i++) { ?>
                            <option value="{{ $i }}">{{ $i }} Stars</option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="Category1">Website Link</label>
                    <input type="text" name="step5[ship][website_link]" class="form-control" >
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="Category1">Simple menu link</label>
                    <input type="text" name="step5[ship][menu_link]" class="form-control" >
                </div>
            </div>
        </div>
    </div>
    <div class="flwMainTitleCls">
        Ship Details
    </div>
    <div class="partOneCls">
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="Category1">Description</label>
                    <input type="text" name="step5[ship][description]" class="form-control">
                </div>
            </div>
        </div>
        <div class="row paddingUpBottam">
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="Category1">Built</label>
                    <input type="number" name="step5[ship][built]" maxlength="4" class="form-control">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="Category1">Refurbished</label>
                    <input type="number" name="step5[ship][refurbished]" class="form-control" maxlength="4">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="Category1">Cabins</label>
                    <input type="number" name="step5[ship][cabins]" min="0" max="9999" maxlength="4" class="form-control">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="Category1">Passengers</label>
                    <input type="number" name="step5[ship][passengers]" min="0" max="9999" maxlength="4" class="form-control">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="Category1">Crew</label>
                    <input type="number" name="step5[ship][crew]" min="0" max="9999" maxlength="4" class="form-control">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="Category1">Length</label>
                    <input type="number" name="step5[ship][length]" min="0" max="999" maxlength="3" class="form-control">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="Category1">Beam</label>
                    <input type="number" name="step5[ship][beam]" step="0.01" min="0" max="99.99" class="form-control">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="Category1">Draught</label>
                    <input type="number" name="step5[ship][draught]" step="0.01" min="0" max="99.99" class="form-control">
                </div>
            </div>
        </div>
        
    </div>
    <div class="flwMainTitleCls">
        Amenities
    </div>
    <div class="partOneCls">
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="Category1">Name</label>
                    <div class="Amenities_1">
                        <div class="row">
                            <div class="col-sm-11">
                                <input type="text" name="step5[ship][amenities][1]" class="form-control HighlightsTxtCls" required>
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
                <input type="hidden" name="expdAmenitiesRow" class="expdAmenitiesRow" value="2">
                <div class="addmorelnk addAmenitiesBtn" data-id="1">Add another</div>
            </div>
        </div>
    </div>

    <div class="flwMainTitleCls">
        Cabins
    </div>
    <div class="cabinsAppend">
        <div class="everycabinsCls">
            <div class="flwSubTitleCls">
                <div class="row">
                    <div class="col-sm-11 cabinCnt">
                        Cabin 1
                    </div>
                    <div class="col-sm-1">
                        <label for="Location1">&nbsp;</label>
                        <a href="javascript:;" class="removeCabinCls redCls"><i class="fas fa-minus-circle"></i></a>
                    </div>
                </div>
            </div>
            <div class="partOneCls">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Category1">Cabin Name</label>
                            <input type="text" name="step5[cabin][1][name]" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="imageGalllerAppend_535326"></div>\
                        <div class="brw_bx image_galller">
                            <div class="browse_btn">
                                <input type="file" name="step5[cabin][1][image][]" multiple="" class="multiImgCls filesCls" data-id="535326" accept="image/*">
                                <span></span>
                                <div class="brw_user_ic">
                                    <i class="far fa-images"></i>
                                    <div class="brw_plus">
                                        <i class="fas fa-plus"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Category1">Size (Bold)</label>
                            <input type="text" name="step5[cabin][1][size_bold]" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Category1">Size Text</label>
                            <input type="text" name="step5[cabin][1][size_text]" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Category1">Description</label>
                            <textarea  name="step5[cabin][1][description]" class="form-control" rows="7"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Category1">View</label>
                            <input type="text" name="step5[cabin][1][view]" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <input type="hidden" name="expCabinRow" class="expCabinRow" value="2">
            <div class="addmorelnk addCabinBtn" data-id="1">Add another Cabin</div>
        </div>
    </div>
            
</div>