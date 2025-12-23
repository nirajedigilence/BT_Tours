<style>
    
.carousel_div {
    border: 1px solid #ccc;
    padding: 10px;
    margin-bottom: 5px;
}
.add_more_upload {
    border: 1px solid #eee;
    padding: 10px;
    margin: 0px 15px 15px 15px;
}
</style>
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

<div class="white_part">
    <div class="flwMainTitleCls">
        Gallery
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <label for="Category1" class="labelFontCls">Video Title</label>
                <input name="step1[video_title]" class="form-control" value="{{ isset($experience->video_title) ? $experience->video_title : null }}">
            </div>
            <div class="form-group">
                <label for="Category1" class="labelFontCls">Video</label>
                <input name="step1[video]" class="form-control" value="{{ isset($experience->video) ? $experience->video : null }}">
            </div>
        </div>
    </div>
    <div class="carouselAppend">
        <?php 
        if(isset($experience)){
            if(count($experience->ExperiencesToGallerys) >= 1){
                $cnts = '11565';
            foreach ($experience->ExperiencesToGallerys as $key => $value) { 
                if(empty($value->is_new)){ ?>
                <div class="everyCarouselCls">
                    <div class="flwSubTitleCls">
                        <div class="row">
                            <div class="col-sm-11 carouselCnt">
                                Carousel {{ $key+1 }}
                            </div>
                            <div class="col-sm-1">
                                <label for="Location1">&nbsp;</label>
                                <a href="javascript:;" class="removeCarouselCls redCls"><i class="fas fa-minus-circle"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="partOneCls">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="Category1">Strip/Carousel Name</label>
                                    <input name="step6[carousel][{{ $cnts }}][title]" class="form-control" value="{{ $value->name }}" required="" data-msg-required="Please provide name">
                                    <input name="step6[carousel][{{ $cnts }}][id]" class="form-control" value="{{ $value->id }}" type="hidden">
                                </div>
                            </div>
                            
                        </div>
                        <div class="dropzone_test dropzone myDropZoneCls step6_carousel_{{ $cnts }}_img" data-name='step6[carousel][{{ $cnts }}][image][]' data-cls=".step6_carousel_{{ $cnts }}_img" >
                            <?php if(isset($value->ExperiencesToGalleryImagesh)){ ?>
                                @foreach ($value->ExperiencesToGalleryImagesh as $keyGI => $valueGI)
                                    <div class="image_galller position-Relative">
                                         <img src="{{ url("storage")}}/{{$valueGI->images}}">
                                         <div class="deleteImage text-danger deleteGalleryImg" data-id="{{$valueGI->id}}"><i class="fa fa-trash" aria-hidden="true"></i></div>
                                    </div>
                                @endforeach
                            <?php } ?>                            
                        </div>
                        {{-- <div class="imageGalllerAppend_2415{{ $cnts }}"></div>
                        <div class="brw_bx image_galller">
                            <div class="browse_btn">
                                <?php if(isset($value->ExperiencesToGalleryImagesh)){ ?>
                                    <input type="file" class="filesCls" name="step6[carousel][{{ $cnts }}][image][]" data-id="2415{{ $cnts }}" multiple="" accept="image/*" <?php echo count($value->ExperiencesToGalleryImagesh) >= 1 ? '' : 'required'?>>
                                <?php } else{ ?>
                                    <input type="file" class="filesCls" name="step6[carousel][{{ $cnts }}][image][]" data-id="2415{{ $cnts }}" multiple="" accept="image/*">
                                <?php } ?>
                                <div class="brw_user_ic">
                                    <i class="far fa-images"></i>
                                    <div class="brw_plus">
                                        <i class="fas fa-plus"></i>
                                    </div>
                                </div>
                            </div>
                        </div>    --}}            
                    </div>
                    <div class="clearfix"></div>
                </div>

        <?php
            $cnts++;
            }
         } } }else{ ?>
            <div class="everyCarouselCls">
                <div class="flwSubTitleCls">
                    <div class="row">
                        <div class="col-sm-11 carouselCnt">
                            Carousel 1
                        </div>
                        <div class="col-sm-1">
                            <label for="Location1">&nbsp;</label>
                            <a href="javascript:;" class="removeCarouselCls redCls"><i class="fas fa-minus-circle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="partOneCls">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="Category1">Strip/Carousel Name</label>
                                <input name="step6[carousel][1][title]" class="form-control" >
                            </div>
                        </div>
                        
                    </div>
                    <div class="imageGalllerAppend_1"></div>
                    <div class="dropzone_test dropzone myDropZoneCls step6_1_img" data-name='step6[carousel][1][image][]' data-cls=".step6_1_img" ></div>
                    {{-- <div class="brw_bx image_galller">
                        <div class="browse_btn">
                            <input type="file" class="filesCls" name="step6[carousel][1][image][]" data-id="1" multiple="" accept="image/*">
                            <div class="brw_user_ic">
                                <i class="far fa-images"></i>
                                <div class="brw_plus">
                                    <i class="fas fa-plus"></i>
                                </div>
                            </div>
                        </div>
                    </div>              --}}  
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="everyCarouselCls">
                <div class="flwSubTitleCls">
                    <div class="row">
                        <div class="col-sm-11 carouselCnt">
                            Carousel 2
                        </div>
                        <div class="col-sm-1">
                            <label for="Location1">&nbsp;</label>
                            <a href="javascript:;" class="removeCarouselCls redCls"><i class="fas fa-minus-circle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="partOneCls">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="Category1">Strip/Carousel Name</label>
                                <input name="step6[carousel][2][title]" class="form-control" >
                            </div>
                        </div>
                        
                    </div>
                    <div class="imageGalllerAppend_2"></div>
                    <div class="dropzone_test dropzone myDropZoneCls step6_2_img" data-name='step6[carousel][2][image][]' data-cls=".step6_2_img" ></div>
                    {{-- <div class="brw_bx image_galller">
                        <div class="browse_btn">
                            <input type="file" class="filesCls" name="step6[carousel][2][image][]" data-id="2" multiple="" accept="image/*">
                            <div class="brw_user_ic">
                                <i class="far fa-images"></i>
                                <div class="brw_plus">
                                    <i class="fas fa-plus"></i>
                                </div>
                            </div>
                        </div>
                    </div>   --}}             
                </div>
                <div class="clearfix"></div>
            </div>
         <?php } ?> 
    </div>
    <div class="row">
        <div class="col-sm-12">
            <input type="hidden" name="expCarouselRow" class="expCarouselRow" value="3">
            <div class="addmorelnk centerBtnCls addCarouselBtn" data-id="1">Add another Carousel</div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
           <div class="form-group">
                <label for="Category1" class="labelFontCls">Gallery</label>
               
            </div>
        </div>
    </div>
    <div class="row">
        
        <div class="carousel_main_div col-md-12">
            <?php 
        if(isset($experience)){
            if(count($experience->ExperiencesToGallerys) >= 1){
                $cnts = '11565';
            foreach ($experience->ExperiencesToGallerys as $key => $value) { 
                if(!empty($value->is_new)){ ?>
                    <div class="carousel_div">
                        <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-11 carouselCntNew">
                                        Gallery {{ $key+1 }}
                                    </div>
                                    <div class="col-sm-1">
                                        <label for="Location1"><a href="javascript:;" class="removeCarouselClsNew redCls"><i class="fas fa-minus-circle"></i></a></label>
                                    </div>
                                </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="Category1">Gallery Name</label>
                                <input name="step6[carouselnew][<?=$value->id?>][title]" id="step6Carousel-<?=$value->id?>" class="form-control" value="{{$value->name}}" >
                                <input name="step6[carouselnew][<?=$value->id?>][id]" class="form-control" value="{{ $value->id }}" type="hidden">
                            </div>
                        </div>
                        <div class="col-sm-12 gallary_img_div">
                            
                        </div>
                        
                            <div class="add_more_upload row">
                                 <?php if(isset($value->ExperiencesToGalleryImagesh)){ ?>
                                    @foreach ($value->ExperiencesToGalleryImagesh as $keyGI => $valueGI)
                                        <div class="col-md-3 image_galllernew">
                                        <div class="form-group">
                                            <img width="200" height="200" src="{{ url("storage")}}/{{$valueGI->images}}"><div class="deleteImage text-danger deleteGalleryImgNew" data-id="{{$valueGI->id}}"><i class="fa fa-trash" aria-hidden="true"></i></div>
                                            <label>Image description: </label>
                                            <input type="text" name="image_name_<?=$valueGI->id?>" class="form-control mb-2" maxlength="100" value="{{$valueGI->image_name}}">
                                            <label>Order :</label> <input type="text" name="image_order_<?=$valueGI->id?>" class="form-control mb-2" maxlength="2" value="{{$valueGI->image_order}}">
                                            <!-- <input type="file" name="image_<?=$valueGI->id?>" class="form-control" > -->
                                            

                                        </div>
                                    </div>
                                    @endforeach
                                <?php } ?>                            
                                
                            </div>
                            <div class="col-sm-12">
                                <input type="button" value="Add Image" name="add_gallary_img" data-id="<?=$value->id?>" class="add_gallary_img btn btn-sm btn-primary">
                            </div>
                        
                    </div>
                     <?php
            $cnts++;
            }
         } } } ?>
           <!--  <div class="carousel_div">
                <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-11 carouselCntNew">
                                Gallery 1
                            </div>
                            <div class="col-sm-1">
                                <label for="Location1"><a href="javascript:;" class="removeCarouselCls redCls"><i class="fas fa-minus-circle"></i></a></label>
                                
                            </div>
                        </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="Category1">Strip/Carousel Name</label>
                        <input name="step6[carouselnew]['+expCarouselRow+'][title]" id="step6Carousel-'+expCarouselRow+'" class="form-control" >
                    </div>
                </div>
                <div class="col-sm-12 gallary_img_div">
                    
                </div>
                <div class="col-sm-12">
                    <div class="add_more_upload">
                        
                    </div>
                    <div class="col-sm-12">
                        <input type="button" value="Add Image" name="add_gallary_img" class="add_gallary_img btn btn-sm btn-primary">
                    </div>
                </div>
            </div> -->
        </div>
    </div>     
    <div class="row">
        <div class="col-sm-12">
            <input type="hidden" name="expCarouselRowNew" class="expCarouselRowNew" value="3">
            <div class="addmorelnk centerBtnCls addCarouselBtnNew" data-id="1">Add another Gallery</div>
        </div>
    </div> 
</div>
<script type="text/javascript">
    
</script>