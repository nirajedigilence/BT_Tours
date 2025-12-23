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
        Tour Details
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
<div class="white_part">
    <div class="flwMainTitleCls">
        MAP
    </div>
    <div class="">
        <div class="partOneCls">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="Category1">MAP URL</label>
                        <?php
                        $isDisplay = '1';
                        $mapName = '';
                        if(isset($productDetail->getProductsSection)) { 
                            foreach ($productDetail->getProductsSection as $key => $value) { 
                                if($value->sections_type == '4') { 
                                    $isDisplay = '2';
                                    $mapName = $value->title;
                                } 
                            } 
                        } ?> 
                        <?php if($mapName == '') { ?>
                            <input type="text" name="step7[map_url]" class="form-control" value="{{ isset($experience) ? $experience->map_url : null }}">
                        <?php } else{ ?>
                            <input type="text" name="step7[map_url]" class="form-control" value="{{ isset($mapName) ? $mapName : null }}">
                        <?php } ?>
                    </div>
                </div>
                
            </div>           
        </div>
        <div class="clearfix"></div>
    </div>
            
</div>