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
<div class="white_part ">
    <div class="flwMainTitleCls">
        Experiences
    </div>
    <div class="partOneCls">
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="Category1">Quicksell (Max 100 characters)</label>
                    <textarea name="step1[excerpt]" class="form-control" rows="2" maxlength="100">{{ isset($experience->excerpt) ? strip_tags($experience->excerpt) : null }}</textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="Category1">Overview Description</label>
                    <textarea name="step1[description]" class="form-control" rows="7">{{ isset($experience->description) ? strip_tags($experience->description) : null }}</textarea>
                </div>
            </div>
        </div>
    </div>
        <?php
                    $step31Name = '';
                    $step31Score = '';
                    $step31Story = '';
                    $step31Inclusion = [];
                    $step31Images = [];

                    $step32Name = '';
                    $step32Score = '';
                    $step32Story = '';
                    $step32Inclusion = [];
                    $step32Images = [];
                    
                    $step33Name = '';
                    $step33Score = '';
                    $step33Story = '';
                    $step33Inclusion = [];
                    $step33Images = [];

        if(isset($productDetail->getProductsSection)) { 
            foreach ($productDetail->getProductsSection as $key => $value) { 
                if($value->sections_type == '1') { 
                    $step31Name = $value->title;
                    $step31Score = $value->score;
                    $step31Story = $value->story;
                    foreach ($value->getProductsInclusion as $keyInc => $valueInc) {
                        $step31Inclusion[] = $valueInc->title;
                    }
                    foreach ($value->getProductsImages as $keyImg => $valueImg) {
                        $step31Images[$valueImg->id] = url('storage').'/product_image/'.$valueImg->name;
                    }
                } 
                if($value->sections_type == '2') { 
                    $step32Name = $value->title;
                    $step32Score = $value->score;
                    $step32Story = $value->story;
                    foreach ($value->getProductsInclusion as $keyInc => $valueInc) {
                        $step32Inclusion[] = $valueInc->title;
                    }
                    foreach ($value->getProductsImages as $keyImg => $valueImg) {
                        $step32Images[$valueImg->id] = url('storage').'/product_image/'.$valueImg->name;
                    }
                }
                if($value->sections_type == '3') { 
                    $step33Name = $value->title;
                    $step33Score = $value->score;
                    $step33Story = $value->story;
                    foreach ($value->getProductsInclusion as $keyInc => $valueInc) {
                        $step33Inclusion[] = $valueInc->title;
                    }
                    foreach ($value->getProductsImages as $keyImg => $valueImg) {
                        $step33Images[$valueImg->id] = url('storage').'/product_image/'.$valueImg->name;
                    }
                } 
            } 
        } 

        $isPro1e = 0;
        $isPro2e = 0;
        $isPro3e = 0;
        if(isset($productDetail->getProductsSection)) { 
            foreach ($productDetail->getProductsSection as $key => $value) { 
                if($value->sections_type == '1') {
                    $isPro1e = 1;
                }elseif($value->sections_type == '2') {
                    $isPro2e = 1;
                }elseif($value->sections_type == '3') {
                    $isPro3e = 1;
                }
            }
        }
        if(isset($experience->experienceAttractions)) { 
            foreach ($experience->experienceAttractions as $key => $value) { 
                if($value->type_id == '1') {
                    $isPro1e = 2;
                }elseif($value->type_id == '2') {
                    $isPro2e = 2;
                }elseif($value->type_id == '3') {
                    $isPro3e = 2;
                }
            }
        }
        ?>
        <div class="flwSubTitleCls">
            VIP Experiences
        </div>
        <?php if(!empty($bespoke_id)){
            ?>
            @if(!empty($hotelStars))
            @foreach($hotelStars as $key=> $itemH)
            <?php $expviprow = 50;?>
                @foreach($itemH as $itmH)
                        @if($itmH->type_id  == 1) 
                            <div class="partOneCls">
                                <div class="append3VipExperiences">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="row">
                                                <div class="col-sm-11">
                                                </div>
                                                <div class="col-sm-1">
                                                    <div class="form-group">
                                                        <label for="Location1">&nbsp;</label>
                                                        <a href="javascript:;" class="removeExperiencesExpCls redCls"><i class="fas fa-minus-circle"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="Location1d">Experiences</label>
                                                <select class="selectCls form-control expChange" name="step3[1][{{$expviprow}}][exp_id]" required="" data-msg-required="Please select experience" data-experience="">
                                                    <option value="">Select One</option>
                                                    <?php
                                                    if(!empty($vipList)){
                                                        foreach ($vipList as $key => $value) { ?>
                                                            <option value="{{$value->id}}" @if ( isset($itmH->id) && ($itmH->id == $value->id)) selected @endif >{{addslashes($value->name)}}</option>

                                                            <?php 
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        @endif
                         <?php $expviprow++;?>
                      @endforeach
                @endforeach
            @endif
            <?
        } ?>
        <?php if($isPro1e == '0'){ ?>
            <div class="vipMainSectionCls">
                <div class="partOneCls">
                    <div class="append3VipExperiences">
                        <!-- <div class="row">
                            <div class="col-sm-12">

                                
                                <div class="row">
                                    <div class="col-sm-11">
                                    </div>
                                    <div class="col-sm-1">
                                        <div class="form-group">
                                            <label for="Location1">&nbsp;</label>
                                            <a href="javascript:;" class="removeExperiencesExpCls redCls" exp_att_id="" exp_id=""><i class="fas fa-minus-circle"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Location1d">Experiences</label>
                                    <select class="selectCls form-control expChange" name="step3[1][1][exp_id]" required="" data-msg-required="Please select experience" data-experience="">
                                        <option value="">Select One</option>
                                        <?php
                                        // pr($vipList);
                                        // if(!empty($vipList)){
                                        //     foreach ($vipList as $key => $value) {
                                                
                                        //         echo '<option value="'.$value->id.'">'.$value->name.'</option>';
                                        //     }
                                        // }
                                        ?>  
                                    </select>
                                </div>

                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        <?php } ?> 
        <?php if($isPro1e == '1'){ ?>
            <div class="vipMainSectionCls">
        <?php 
        $cntVipTemp = 1;
        foreach ($productDetail->getProductsSection as $keyProd => $valueProd) { 
            if($valueProd->sections_type == '1') { ?>
                <div class="partOneCls" data-id="{{ $valueProd->id }}">
                    <div class="append3VipExperiences">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-11">
                                        <div class="form-group">
                                            <label for="Category1">Experiences Name</label>
                                            <input type="text" name="step3[1][{{ $cntVipTemp }}][name]" class="form-control" value="{{ $valueProd->title }}" required="" data-msg-required="Please provide name">
                                        </div>
                                    </div>
                                    <div class="col-sm-1">
                                        <div class="form-group">
                                            <label for="Location1">&nbsp;</label>
                                            <a href="javascript:;" class="removeExperiencesExpCls redCls"><i class="fas fa-minus-circle"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom_control">
                                        <label for="Category1">Veenus Score</label>
                                        <input type="number" name="step3[1][{{ $cntVipTemp }}][score]" class="form-control" value="{{ $valueProd->score }}" required="" data-msg-required="Please provide score" min="0" max="10">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Category1">TripAdvisor URL</label>
                                    <input type="text" name="step3[1][{{ $cntVipTemp }}][tripadvisor_url]" class="form-control" value="" required="" data-msg-required="Please provide tripadvisor url">
                                </div>
                                <div class="form-group">
                                    <label for="Category1">Website</label>
                                    <input type="text" name="step3[1][{{ $cntVipTemp }}][website]" class="form-control" value="" required="" data-msg-required="Please provide website">
                                </div>
                                <div class="form-group">
                                    <div class="custom_control"> 
                                        <label>Mobility Level</label>
                                        <div class="br-wrapper br-theme-bars-square">
                                            <select id="example-square-1" class="exampleSquareCls" name="step3[1][{{ $cntVipTemp }}][mobility]" required="" data-msg-required="Please provide mobility level">
                                                <option value=""></option>
                                                <option value="1" selected="">1</option>
                                                <option value="2" <?php echo $valueProd->score == '2'?'selected':''?>>2</option>
                                                <option value="3" <?php echo $valueProd->score == '3'?'selected':''?>>3</option>
                                                <option value="4" <?php echo $valueProd->score == '4'?'selected':''?>>4</option>
                                                <option value="5" <?php echo $valueProd->score == '5'?'selected':''?>>5</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Category1">Description</label>
                                    <textarea name="step3[1][{{ $cntVipTemp }}][description]" class="form-control" rows="7" required="" data-msg-required="Please provide description">{{ $valueProd->story }}</textarea>
                                </div>
                                <div class="fl_w comman part_six"> 
                                    <input class="form-control section_inclusions_1{{ $cntVipTemp }}" name="section_inclusions_{{ $cntVipTemp }}" type="hidden" value="{{ $cntVipTemp }}">
                                    <div class="form-group">
                                        <div class="custom_full_control"> <label>Inclusions</label>
                                            <div class="customFullControlInclusionsCls1{{ $cntVipTemp }} cFCInclusionsCls"> 
                                                <?php 
                                                if(!empty($valueProd->getProductsInclusion)){
                                                $incCnt = '121';
                                                foreach ($valueProd->getProductsInclusion as $key3inc => $value3inc) { ?>
                                                    <div class="row ameDiv_111{{ $value3inc->id }}{{ $incCnt }}">
                                                        <div class="col-sm-10">
                                                            <input class="form-control" name="step3[1][{{ $cntVipTemp }}][inclusions][{{ $incCnt }}]" type="text" value="{{ $value3inc->title }}" id="inclusions_{{ $cntVipTemp }}_{{ $incCnt }}" placeholder="" required="" data-msg-required="Please provide inclusions"> 
                                                        </div> 
                                                        <div class="col-sm-2">
                                                            <a href="javascript:;" class="nhSubCloseCls removeAddAmebtn" data-id="111{{ $value3inc->id }}{{ $incCnt }}" >x</a>
                                                        </div> 
                                                    </div> 
                                                <?php 
                                                $incCnt++;
                                                } }else{ ?>
                                                    <div class="row ameDiv_111">
                                                        <div class="col-sm-10">
                                                            <input class="form-control" name="step3[1][{{ $cntVipTemp }}][inclusions][1]" type="text" value="" id="inclusions_{{ $cntVipTemp }}_1" placeholder="" required="" data-msg-required="Please provide inclusions"> 
                                                        </div> 
                                                        <div class="col-sm-2">
                                                            <a href="javascript:;" class="nhSubCloseCls removeAddAmebtn" data-id="111" >x</a>
                                                        </div> 
                                                    </div> 
                                                <?php } ?>
                                            </div> 
                                            <a href="javascript:;" class="addmorelnk addVipIncluCls" data-type="1" data-id="1{{ $cntVipTemp }}" data-pro="{{ $cntVipTemp }}">Add More</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom_full_control"> <label>Gallery</label>
                                        <div class="clearfix"></div>
                                        <div class="dropzone_test dropzone myDropZoneCls step3_1_{{$cntVipTemp}}_img" data-name='step3[1][{{$cntVipTemp}}][images][]' data-cls=".step3_1_{{$cntVipTemp}}_img" >
                                            <?php foreach ($valueProd->getProductsImages as $keyImg => $valueImg) { ?>
                                                    <div class="image_galller position-Relative">
                                                        <img src="{{ url("storage")}}/product_image/{{$valueImg->name}}">
                                                        <input type="hidden" name="step3[1][{{ $cntVipTemp }}][pro_images_new][{{$keyImg}}]" value="{{$valueImg->name}}">
                                                        <div class="deleteImage text-danger deleteImgStepImg" data-id="{{$keyImg}}"><i class="fa fa-trash" aria-hidden="true"></i></div>
                                                    </div>
                                            <?php } ?>                                            
                                        </div>
                                        {{-- <div class="imageGalllerAppend_3131{{$valueProd->id}}{{ $cntVipTemp }}"></div>
                                        <div class="brw_bx image_galller">
                                            <div class="browse_btn"> 
                                                    <input type="file" class="filesCls" name="step3[1][{{ $cntVipTemp }}][images][]" multiple="" data-id="3131{{$valueProd->id}}{{ $cntVipTemp }}" accept="image/*" required>
                                                <div class="brw_user_ic"> <i class="far fa-images"></i>
                                                    <div class="brw_plus"> <i class="fas fa-plus"></i> </div>
                                                </div>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
        <?php $cntVipTemp++; } }  ?> 
            </div>
        <?php  } ?> 
        <?php if($isPro1e == '2'){ ?>
            <div class="vipMainSectionCls">
        <?php 
            $cntVipTemp = 1;
            foreach ($experience->experienceAttractions as $keyProd => $valueProd) { 
                if($valueProd->type_id == '1') { ?>
                    <div class="partOneCls">
                        <div class="append3VipExperiences">
                            <div class="row">
                                <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-11">
                                            </div>
                                            <div class="col-sm-1">
                                                <div class="form-group">
                                                    <label for="Location1">&nbsp;</label>
                                                    <a href="javascript:;" class="removeExperiencesExpCls redCls" exp_att_id="{{$valueProd->id}}" exp_id="{{$experience->id}}"><i class="fas fa-minus-circle"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="Location1d">Experiences</label>
                                            <input type="hidden" name="step3[1][{{$cntVipTemp}}][old_exp_id]" value="{{$valueProd->id}}">
                                            <select class="selectCls form-control expChange" name="step3[1][{{$cntVipTemp}}][exp_id]" required="" data-msg-required="Please select experience" data-experience="{{$valueProd->id}}">
                                                <option value="">Select One</option>
                                                <?php
                                                // pr($vipList);
                                                if(!empty($vipList)){
                                                    foreach ($vipList as $key => $value) {
                                                        $selected = '';
                                                        if(isset($valueProd->id) && $valueProd->id == $value->id){
                                                            $selected = 'selected';
                                                        }
                                                        echo '<option value="'.$value->id.'" '.$selected.'>'.$value->name.'</option>';
                                                    }
                                                }
                                                ?>  
                                            </select>
                                        </div>

                                    
                                </div>
                            </div>
                        </div>
                    </div>
        <?php $cntVipTemp++; } } ?>
            </div>
        <?php } ?>
        <div class="row">
            <div class="col"></div>
            <div class="col">
                <input type="hidden" name="expVipRow" class="expVipRow" value="50">
                <a class="orangeLink btn marginTop15 clearBothCls addExpVipBtn float-right" data-cls=".vipMainSectionCls" data-id="1" href="javascript:;">Add More</a>
            </div>
            <div class="col"></div>
        </div>
        <div class="flwSubTitleCls">
            BIG Banner
        </div>
          <?php if(!empty($bespoke_id)){
            ?>
            @if(!empty($hotelStars))
            @foreach($hotelStars as $key=> $itemH)
                @foreach($itemH as $itmH)
                        @if($itmH->type_id  == 2) 
                       
                            <div class="partOneCls">
                                <div class="append3VipExperiences">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="row">
                                                <div class="col-sm-11">
                                                </div>
                                                <div class="col-sm-1">
                                                    <div class="form-group">
                                                        <label for="Location1">&nbsp;</label>
                                                        <a href="javascript:;" class="removeExperiencesExpCls redCls"><i class="fas fa-minus-circle"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="Location1d">Experiences</label>
                                                <select class="selectCls form-control expChange" name="step3[2][{{$expviprow}}][exp_id]" required="" data-msg-required="Please select experience" data-experience="">
                                                    <option value="">Select One</option>
                                                    <?php
                                                    if(!empty($bigBannerList)){
                                                        foreach ($bigBannerList as $key => $value) { ?>
                                                            <option value="{{$value->id}}" @if ( isset($itmH->id) && ($itmH->id == $value->id)) selected @endif >{{addslashes($value->name)}}</option>
                                                            
                                                            <?php 
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        @endif
                         <?php $expviprow++;?>
                      @endforeach
                @endforeach
            @endif
            <?
        } ?>
        <?php if($isPro2e == '0'){ ?>
            <div class="bigBannerMainSectionCls">
                <div class="partOneCls">
                    <div class="append3VipExperiences">
                        <!-- <div class="row">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-11">
                                    </div>
                                    <div class="col-sm-1">
                                        <div class="form-group">
                                            <label for="Location1">&nbsp;</label>
                                            <a href="javascript:;" class="removeExperiencesExpCls redCls" exp_att_id="" exp_id=""><i class="fas fa-minus-circle"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Location1d">Experiences</label>
                                    <select class="selectCls form-control expChange" name="step3[2][1][exp_id]" required="" data-msg-required="Please select experience" data-experience="">
                                        <option value="">Select One</option>
                                        <?php
                                        // pr($bigBannerList);
                                        // if(!empty($bigBannerList)){
                                        //     foreach ($bigBannerList as $key => $value) {
                                                
                                        //         echo '<option value="'.$value->id.'">'.$value->name.'</option>';
                                        //     }
                                        // }
                                        ?>  
                                    </select>
                                </div>        
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        <?php } ?> 
        <?php if($isPro2e == '1'){ ?>
        <?php 
        $cntVipTemp = 1;
        foreach ($productDetail->getProductsSection as $keyProd => $valueProd) { 
            if($valueProd->sections_type == '2') { ?>
                <div class="bigBannerMainSectionCls">
                    <div class="partOneCls" data-id="{{ $valueProd->id }}">
                        <div class="append3VipExperiences">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-11">
                                            <div class="form-group">
                                                <label for="Category1">Experiences Name</label>
                                                <input type="text" name="step3[2][{{ $cntVipTemp }}][name]" class="form-control" value="{{ $valueProd->title }}" required="" data-msg-required="Please provide name">
                                            </div>
                                        </div>
                                        <div class="col-sm-1">
                                            <div class="form-group">
                                                <label for="Location1">&nbsp;</label>
                                                <a href="javascript:;" class="removeExperiencesExpCls redCls"><i class="fas fa-minus-circle"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom_control">
                                            <label for="Category1">Veenus Score</label>
                                            <input type="number" name="step3[2][{{ $cntVipTemp }}][score]" class="form-control" value="{{ $valueProd->score }}" required="" data-msg-required="Please provide score" min="0" max="10">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="Category1">TripAdvisor URL</label>
                                        <input type="text" name="step3[2][{{ $cntVipTemp }}][tripadvisor_url]" class="form-control" value="" required="" data-msg-required="Please provide tripadvisor url">
                                    </div>
                                    <div class="form-group">
                                        <label for="Category1">Website</label>
                                        <input type="text" name="step3[2][{{ $cntVipTemp }}][website]" class="form-control" value="" required="" data-msg-required="Please provide website">
                                    </div>
                                    <div class="form-group">
                                        <div class="custom_control"> 
                                            <label>Mobility Level</label>
                                            <div class="br-wrapper br-theme-bars-square">
                                                <select id="example-square-1" class="exampleSquareCls" name="step3[2][{{ $cntVipTemp }}][mobility]" required="" data-msg-required="Please provide mobility level">
                                                    <option value=""></option>
                                                    <option value="1" selected="">1</option>
                                                    <option value="2" <?php echo $valueProd->score == '2'?'selected':''?>>2</option>
                                                    <option value="3" <?php echo $valueProd->score == '3'?'selected':''?>>3</option>
                                                    <option value="4" <?php echo $valueProd->score == '4'?'selected':''?>>4</option>
                                                    <option value="5" <?php echo $valueProd->score == '5'?'selected':''?>>5</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="Category1">Description</label>
                                        <textarea name="step3[2][{{ $cntVipTemp }}][description]" class="form-control" rows="7" required="" data-msg-required="Please provide description">{{ $valueProd->story }}</textarea>
                                    </div>
                                    <div class="fl_w comman part_six"> 
                                        <input class="form-control section_inclusions_1{{ $cntVipTemp }}" name="section_inclusions_{{ $cntVipTemp }}" type="hidden" value="{{ $cntVipTemp }}">
                                        <div class="form-group">
                                            <div class="custom_full_control"> <label>Inclusions</label>
                                                <div class="customFullControlInclusionsCls1{{ $cntVipTemp }} cFCInclusionsCls"> 
                                                    <?php 
                                                    if(!empty($valueProd->getProductsInclusion)){
                                                    $incCnt = '121';
                                                    foreach ($valueProd->getProductsInclusion as $key3inc => $value3inc) { ?>
                                                        <div class="row ameDiv_111{{ $value3inc->id }}{{ $incCnt }}">
                                                            <div class="col-sm-10">
                                                                <input class="form-control" name="step3[2][{{ $cntVipTemp }}][inclusions][{{ $incCnt }}]" type="text" value="{{ $value3inc->title }}" id="inclusions_{{ $cntVipTemp }}_{{ $incCnt }}" placeholder="" required="" data-msg-required="Please provide inclusions"> 
                                                            </div> 
                                                            <div class="col-sm-2">
                                                                <a href="javascript:;" class="nhSubCloseCls removeAddAmebtn" data-id="111{{ $value3inc->id }}{{ $incCnt }}" >x</a>
                                                            </div> 
                                                        </div> 
                                                    <?php 
                                                    $incCnt++;
                                                    } }else{ ?>
                                                        <div class="row ameDiv_222">
                                                            <div class="col-sm-10">
                                                                <input class="form-control" name="step3[2][{{ $cntVipTemp }}][inclusions][1]" type="text" value="" id="inclusions_{{ $cntVipTemp }}_2" placeholder="" required="" data-msg-required="Please provide inclusions"> 
                                                            </div> 
                                                            <div class="col-sm-2">
                                                                <a href="javascript:;" class="nhSubCloseCls removeAddAmebtn" data-id="222" >x</a>
                                                            </div> 
                                                        </div> 
                                                    <?php } ?>
                                                </div> 
                                                <a href="javascript:;" class="addmorelnk addVipIncluCls" data-type="2" data-id="1{{ $cntVipTemp }}" data-pro="{{ $cntVipTemp }}">Add More</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom_full_control">
                                            <label>Gallery</label>
                                            <div class="clearfix"></div>
                                            <div class="dropzone_test dropzone myDropZoneCls step3_2_{{$cntVipTemp}}_img" data-name='step3[2][{{$cntVipTemp}}][images][]' data-cls=".step3_2_{{$cntVipTemp}}_img" >
                                                <?php foreach ($valueProd->getProductsImages as $keyImg => $valueImg) { ?>
                                                        <div class="image_galller position-Relative">
                                                            <img src="{{ url("storage")}}/product_image/{{$valueImg->name}}">
                                                            <input type="hidden" name="step3[2][{{ $cntVipTemp }}][pro_images_new][{{$keyImg}}]" value="{{$valueImg->name}}">
                                                            <div class="deleteImage text-danger deleteImgStepImg" data-id="{{$keyImg}}"><i class="fa fa-trash" aria-hidden="true"></i></div>
                                                        </div>
                                                <?php } ?>                                                
                                            </div>
                                            {{-- <div class="imageGalllerAppend_3232{{$valueProd->id}}{{ $cntVipTemp }}"></div>
                                            <div class="brw_bx image_galller">
                                                <div class="browse_btn"> 
                                                    <input type="file" class="filesCls" name="step3[2][{{ $cntVipTemp }}][images][]" multiple="" data-id="3232{{$valueProd->id}}{{ $cntVipTemp }}" accept="image/*" required>
                                                    <div class="brw_user_ic"> <i class="far fa-images"></i>
                                                        <div class="brw_plus"> <i class="fas fa-plus"></i> </div>
                                                    </div>
                                                </div>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
        <?php $cntVipTemp++; } } } ?> 
        <?php if($isPro2e == '2'){ ?>
            <div class="bigBannerMainSectionCls">
        <?php 
            $cntVipTemp = 1;
            foreach ($experience->experienceAttractions as $keyProd => $valueProd) { 
                if($valueProd->type_id == '2') { ?>
                    <div class="partOneCls">
                        <div class="append3VipExperiences">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-11">
                                        </div>
                                        <div class="col-sm-1">
                                            <div class="form-group">
                                                <label for="Location1">&nbsp;</label>
                                                <a href="javascript:;" class="removeExperiencesExpCls redCls" exp_att_id="{{$valueProd->id}}" exp_id="{{$experience->id}}"><i class="fas fa-minus-circle"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="Location1d">Experiences</label>
                                        <input type="hidden" name="step3[2][{{$cntVipTemp}}][old_exp_id]" value="{{$valueProd->id}}">
                                        <select class="selectCls form-control expChange" name="step3[2][{{$cntVipTemp}}][exp_id]" required="" data-msg-required="Please select experience" data-experience="{{$valueProd->id}}">
                                            <option value="">Select One</option>
                                            <?php
                                            // pr($bigBannerList);
                                            if(!empty($bigBannerList)){
                                                foreach ($bigBannerList as $key => $value) {
                                                    $selected = '';
                                                    if(isset($valueProd->id) && $valueProd->id == $value->id){
                                                        $selected = 'selected';
                                                    }
                                                    echo '<option value="'.$value->id.'" '.$selected.'>'.$value->name.'</option>';
                                                }
                                            }
                                            ?>  
                                        </select>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                    
        <?php $cntVipTemp++; } } ?>
                    </div>
        <?php } ?>
        <div class="row">
            <div class="col"></div>
            <div class="col">
                <a class="orangeLink btn marginTop15 clearBothCls addExpBBBtn float-right" data-cls=".bigBannerMainSectionCls" data-id="2" href="javascript:;">Add More</a>
            </div>
            <div class="col"></div>
        </div>
        <div class="flwSubTitleCls">
            Local
        </div>
         <?php if(!empty($bespoke_id)){
            ?>
            @if(!empty($hotelStars))
            @foreach($hotelStars as $key=> $itemH)
                @foreach($itemH as $itmH)
                        @if($itmH->type_id  == 3) 
                            <div class="partOneCls">
                                <div class="append3VipExperiences">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="row">
                                                <div class="col-sm-11">
                                                </div>
                                                <div class="col-sm-1">
                                                    <div class="form-group">
                                                        <label for="Location1">&nbsp;</label>
                                                        <a href="javascript:;" class="removeExperiencesExpCls redCls"><i class="fas fa-minus-circle"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="Location1d">Experiences</label>
                                                <select class="selectCls form-control expChange" name="step3[3][{{$expviprow}}][exp_id]" required="" data-msg-required="Please select experience" data-experience="">
                                                    <option value="">Select One</option>
                                                    <?php
                                                    if(!empty($localList)){
                                                        foreach ($localList as $key => $value) { ?>
                                                            <option value="{{$value->id}}" @if ( isset($itmH->id) && ($itmH->id == $value->id)) selected @endif >{{addslashes($value->name)}}</option>
                                                            
                                                            <?php 
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        @endif
                         <?php $expviprow++;?>
                      @endforeach
                @endforeach
            @endif
            <?
        } ?>
        <?php if($isPro3e == '0'){ ?>
            <div class="fillerMainSectionCls">
                <div class="partOneCls">
                    <div class="append3VipExperiences">
                        <!-- <div class="row">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-11">
                                    </div>
                                    <div class="col-sm-1">
                                        <div class="form-group">
                                            <label for="Location1">&nbsp;</label>
                                            <a href="javascript:;" class="removeExperiencesExpCls redCls" exp_att_id="" exp_id=""><i class="fas fa-minus-circle"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Location1d">Experiences</label>
                                    <select class="selectCls form-control expChange" name="step3[3][1][exp_id]" required="" data-msg-required="Please select experience" data-experience="">
                                        <option value="">Select One</option>
                                        <?php
                                        // pr($localList);
                                        // if(!empty($localList)){
                                        //     foreach ($localList as $key => $value) {
                                        //         echo '<option value="'.$value->id.'">'.$value->name.'</option>';
                                        //     }
                                        // }
                                        ?>  
                                    </select>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        <?php } ?> 
        <?php if($isPro3e == '1'){ ?>
            <div class="fillerMainSectionCls">
        <?php 
        $cntVipTemp = 1;
        foreach ($productDetail->getProductsSection as $keyProd => $valueProd) { 
            if($valueProd->sections_type == '3') { ?>
                <div class="partOneCls" data-id="{{ $valueProd->id }}">
                    <div class="append3VipExperiences">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-11">
                                        <div class="form-group">
                                            <label for="Category1">Experiences Name</label>
                                            <input type="text" name="step3[3][{{ $cntVipTemp }}][name]" class="form-control" value="{{ $valueProd->title }}" required="" data-msg-required="Please provide name">
                                        </div>
                                    </div>
                                    <div class="col-sm-1">
                                        <div class="form-group">
                                            <label for="Location1">&nbsp;</label>
                                            <a href="javascript:;" class="removeExperiencesExpCls redCls"><i class="fas fa-minus-circle"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom_control">
                                        <label for="Category1">Veenus Score</label>
                                        <input type="number" name="step3[3][{{ $cntVipTemp }}][score]" class="form-control" value="{{ $valueProd->score }}" required="" data-msg-required="Please provide score" min="0" max="10">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Category1">TripAdvisor URL</label>
                                    <input type="text" name="step3[3][{{ $cntVipTemp }}][tripadvisor_url]" class="form-control" value="" required="" data-msg-required="Please provide tripadvisor url">
                                </div>
                                <div class="form-group">
                                    <label for="Category1">Website</label>
                                    <input type="text" name="step3[3][{{ $cntVipTemp }}][website]" class="form-control" value="" required="" data-msg-required="Please provide website">
                                </div>
                                <div class="form-group">
                                    <div class="custom_control"> 
                                        <label>Mobility Level</label>
                                        <div class="br-wrapper br-theme-bars-square">
                                            <select id="example-square-1" class="exampleSquareCls" name="step3[3][{{ $cntVipTemp }}][mobility]" required="" data-msg-required="Please provide mobility level">
                                                <option value=""></option>
                                                <option value="1" selected="">1</option>
                                                <option value="2" <?php echo $valueProd->score == '2'?'selected':''?>>2</option>
                                                <option value="3" <?php echo $valueProd->score == '3'?'selected':''?>>3</option>
                                                <option value="4" <?php echo $valueProd->score == '4'?'selected':''?>>4</option>
                                                <option value="5" <?php echo $valueProd->score == '5'?'selected':''?>>5</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Category1">Description</label>
                                    <textarea name="step3[3][{{ $cntVipTemp }}][description]" class="form-control" rows="7" required="" data-msg-required="Please provide description">{{ $valueProd->story }}</textarea>
                                </div>
                                <div class="fl_w comman part_six"> 
                                    <input class="form-control section_inclusions_1{{ $cntVipTemp }}" name="section_inclusions_{{ $cntVipTemp }}" type="hidden" value="{{ $cntVipTemp }}">
                                    <div class="form-group">
                                        <div class="custom_full_control"> <label>Inclusions</label>
                                            <div class="customFullControlInclusionsCls1{{ $cntVipTemp }} cFCInclusionsCls"> 
                                                <?php 
                                                if(!empty($valueProd->getProductsInclusion)){
                                                $incCnt = '121';
                                                foreach ($valueProd->getProductsInclusion as $key3inc => $value3inc) { ?>
                                                    <div class="row ameDiv_222{{ $value3inc->id }}{{ $incCnt }}">
                                                        <div class="col-sm-10">
                                                            <input class="form-control" name="step3[3][{{ $cntVipTemp }}][inclusions][{{ $incCnt }}]" type="text" value="{{ $value3inc->title }}" id="inclusions_{{ $cntVipTemp }}_{{ $incCnt }}" placeholder="" required="" data-msg-required="Please provide inclusions"> 
                                                        </div> 
                                                        <div class="col-sm-2">
                                                            <a href="javascript:;" class="nhSubCloseCls removeAddAmebtn" data-id="333{{ $value3inc->id }}{{ $incCnt }}" >x</a>
                                                        </div> 
                                                    </div> 
                                                <?php 
                                                $incCnt++;
                                                } }else{ ?>
                                                    <div class="row ameDiv_333">
                                                        <div class="col-sm-10">
                                                            <input class="form-control" name="step3[3][{{ $cntVipTemp }}][inclusions][1]" type="text" value="" id="inclusions_{{ $cntVipTemp }}_3" placeholder="" required="" data-msg-required="Please provide inclusions"> 
                                                        </div> 
                                                        <div class="col-sm-2">
                                                            <a href="javascript:;" class="nhSubCloseCls removeAddAmebtn" data-id="333" >x</a>
                                                        </div> 
                                                    </div> 
                                                <?php } ?>
                                            </div> 
                                            <a href="javascript:;" class="addmorelnk addVipIncluCls" data-type="2" data-id="1{{ $cntVipTemp }}" data-pro="{{ $cntVipTemp }}">Add More</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom_full_control">
                                        <label>Gallery</label>
                                        <div class="clearfix"></div>
                                        <div class="dropzone_test dropzone myDropZoneCls step3_3_{{$cntVipTemp}}_img" data-name='step3[3][{{$cntVipTemp}}][images][]' data-cls=".step3_3_{{$cntVipTemp}}_img" >
                                            <?php foreach ($valueProd->getProductsImages as $keyImg => $valueImg) { ?>
                                                    <div class="image_galller position-Relative">
                                                        <img src="{{ url("storage")}}/product_image/{{$valueImg->name}}">
                                                        <input type="hidden" name="step3[3][{{ $cntVipTemp }}][pro_images_new][{{$keyImg}}]" value="{{$valueImg->name}}">
                                                        <div class="deleteImage text-danger deleteImgStepImg" data-id="{{$keyImg}}"><i class="fa fa-trash" aria-hidden="true"></i></div>
                                                    </div>
                                            <?php } ?>                                            
                                        </div>
                                        {{-- <div class="imageGalllerAppend_3333{{$valueProd->id}}{{ $cntVipTemp }}"></div>
                                        <div class="brw_bx image_galller">
                                            <div class="browse_btn"> 
                                                <input type="file" class="filesCls" name="step3[3][{{ $cntVipTemp }}][images][]" multiple="" data-id="3333{{$valueProd->id}}{{ $cntVipTemp }}" accept="image/*" required>
                                                <div class="brw_user_ic"> <i class="far fa-images"></i>
                                                    <div class="brw_plus"> <i class="fas fa-plus"></i> </div>
                                                </div>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
        <?php $cntVipTemp++; } }  ?> 
            </div>
        <?php  } ?> 
        <?php if($isPro3e == '2'){ ?>
                    <div class="fillerMainSectionCls">
        <?php 
            $cntVipTemp = 1;
            foreach ($experience->experienceAttractions as $keyProd => $valueProd) { 
                if($valueProd->type_id == '3') { ?>
                        <div class="partOneCls">
                            <div class="append3VipExperiences">
                                <div class="row">
                                    <div class="col-sm-12">
                                         <div class="row">
                                            <div class="col-sm-11">
                                            </div>
                                            <div class="col-sm-1">
                                                <div class="form-group">
                                                    <label for="Location1">&nbsp;</label>
                                                    <a href="javascript:;" class="removeExperiencesExpCls redCls" exp_att_id="{{$valueProd->id}}" exp_id="{{$experience->id}}"><i class="fas fa-minus-circle"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="Location1d">Experiences</label>
                                            <input type="hidden" name="step3[3][{{$cntVipTemp}}][old_exp_id]" value="{{$valueProd->id}}">
                                            <select class="selectCls form-control expChange" name="step3[3][{{$cntVipTemp}}][exp_id]" required="" data-msg-required="Please select experience" data-experience="{{$valueProd->id}}">
                                                <option value="">Select One</option>
                                                <?php
                                                // pr($localList);
                                                if(!empty($localList)){
                                                    foreach ($localList as $key => $value) {
                                                        $selected = '';
                                                        if(isset($valueProd->id) && $valueProd->id == $value->id){
                                                            $selected = 'selected';
                                                        }
                                                        echo '<option value="'.$value->id.'" '.$selected.'>'.$value->name.'</option>';
                                                    }
                                                }
                                                ?>  
                                            </select>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
        <?php $cntVipTemp++; } } ?>
                    </div>
        <?php } ?>
        <div class="row">
            <div class="col"></div>
            <div class="col">
                <a class="orangeLink btn marginTop15 clearBothCls addExpLocalBtn float-right" data-cls=".fillerMainSectionCls" data-id="3" href="javascript:;">Add More</a>
            </div>
            <div class="col"></div>
        </div>
</div>