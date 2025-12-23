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
                         <?php 
                        $step1Show = 0;
                        if(isset($experience)){?>
                            @foreach ($experience->experienceMapImages as $key => $value)
                                <div class="image_galller position-Relative">
                                    <img src="{{ url("storage")}}/{{$value->file}}" class="">
                                    <div class="deleteImage text-danger deleteExeImg" data-id="{{$value->id}}"><i class="fa fa-trash" aria-hidden="true"></i></div>
                                </div>
                                <?php $step1Show = 1; ?>
                            @endforeach
                        <?php } ?>
                        <div class="dropzone_single step1ShowCls dropzone myDropZoneCls step1_1_img" data-name='step7[experience_map_images][]' data-cls=".step1_1_img" style="display: <?php echo $step1Show == 1?"none":'block'?>"></div>
                    </div>
                </div>
                
            </div>           
        </div>
        <div class="clearfix"></div>
    </div>
            
</div>