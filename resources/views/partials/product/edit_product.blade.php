<link href="{{ asset('css/style-products.css') }}" rel="stylesheet">
<link href="{{ asset('css/bars-square.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"> 
<script>
    var base_url = "{{URL::to('/')}}";
</script>
<style type="text/css" media="screen">
    .sidebar_part_two li:before{
        display: none !important;
    }    
</style>
<div class="middleCol completedBooking productsection" id="middleCol">
    {!! Form::open(array('route' => 'products-update','method'=>'POST', 'enctype' => 'multipart/form-data', 'class'=>'addProductForm', 'id'=>'addProductForm')) !!}
    <input type="hidden" name="vipCnt" class="vipCnt" value="1">
    <input type="hidden" name="bbCnt" class="bbCnt" value="1">
    <input type="hidden" name="localCnt" class="localCnt" value="1">
    <input type="hidden" name="mapCnt" class="mapCnt" value="1">
    <input type="hidden" name="hotelCnt" class="hotelCnt" value="1">
        <div class="row">
            <div class="header_part">
                <div class="head_part_one">
                    <label>Number</label>
                    <span>{{$productDetail->product_number}}</span>
                </div>
                <div class="head_part_two">
                    <a class="orangeLink btn pullright removeLinkCls" href="javascript:;" style="background: #14213D;">Delete</a>
                    {{-- <a class="orangeLink btn pullright backBtnCls" href="{{ route('products') }}">Back</a> --}}
                    <a class="orangeLink btn pullright saveAndPublish" href="javascript:;">Save and Publish</a>
                    {{-- <a class="orangeLink btn pullright" href="javascript:;">Save</a> --}}
                    <input type="submit" name="submit" value="Save"class="orangeLink btn pullright submitBtn">
                    <a class="orangeLink btn pullright costCalculatorCls" href="javascript:;">Cost Calculator</a>
                </div>
            </div>
            <div class="rightContentDiv">
                @if(Session::has('success'))
                    <div class="alert alert-success">
                        {!! session('success') !!}
                    </div>

                @elseif(Session::has('error'))
                    <div class="alert alert-error">
                        {!! session('error') !!}
                    </div>
                @endif
                <div class="contentBooking">
                     <input type="hidden" name="shareCollaborator" value="" class="shareCollaborator">
                    {{-- <input type="hidden" name="is_prototype" value="{{$productDetail->is_prototype}}" class="is_prototype"> --}}
                    <input type="hidden" name="id" value="{{$productDetail->id}}" class="proID">
                    <input type="hidden" name="total_profit_margin" value="{{$productDetail->total_profit_margin}}" class="total_profit_margin">
                    <input type="hidden" name="total_cost" value="{{$productDetail->total_cost}}" class="total_cost">
                    <input type="hidden" name="mode" value="Edit" class="mode">
                    
                    <div class="contentDiv appendSectionDiv">
                        <div class="contentDivasda">
                            <div class="fl_w main_title" style="text-align:center;">
                                <h2><span class="proNameCls">{{$productDetail->name}}</span><input type="text" name="product_name" value="{{$productDetail->name}}" class="inputTitle productNameCls ele_hide">&nbsp;<a href="javascript:;" class="editTitle"><i class="fas fa-edit"></i></a></h2>
                            </div>
                            <div class="sidebar_part_three" style="width: 49%; padding: 0">
                                <label>Prototype Folder</label>
                                <select name="is_prototype" class="form-control prototypeFolderCls is_prototype">
                                    <option value="">Select One</option>
                                        @foreach ($prototypesList as $key => $value)
                                            <option value="{{$value->id}}" <?php echo $productDetail->is_prototype == $value->id?'selected':''; ?> data-id="{{$value->country_id}}">{{ $value->name }}</option>
                                        @endforeach
                                </select>
                            </div>
                            <div class="sidebar_part_three" style="width: 2%; padding: 0"></div>
                            <div class="sidebar_part_three" style="width: 49%; padding: 0">
                                <label>Country Areas</label>
                                <select name="country_area_id" class="form-control country_area_id">
                                    <option value="">Select One</option>
                                    <?php /*if($productDetail->is_prototype > 0){ ?>
                                        @foreach ($countries as $k => $country)
                                            <?php if($country->id == $productDetail->country_id){ ?>
                                                    <optgroup label="{{$country->name}}" data-max-options="2">
                                                    @foreach ($country->countryAreas as $kk => $countryArea)
                                                    <?php
                                                    $selected = '';
                                                    if($productDetail->country_area_id == $countryArea->id){ 
                                                        $selected = 'selected';
                                                    }
                                                    ?>
                                                        <option value="{{$country->id}}-{{ $countryArea->id }}" {{$selected}}>
                                                            {{ $countryArea->name }}
                                                        </option>
                                                    @endforeach
                                                    </optgroup>
                                            <?php } ?>
                                        @endforeach
                                    <?php //} else {*/ ?>
                                        @foreach ($countries as $k => $country)
                                            <optgroup label="{{$country->name}}"  id="country{{$country->id}}"  data-max-options="2">
                                            @foreach ($country->countryAreas as $kk => $countryArea)
                                            <?php
                                            $selected = '';
                                            if($productDetail->country_area_id == $countryArea->id){ 
                                                $selected = 'selected';
                                            }
                                            ?>
                                                <option value="{{$country->id}}-{{ $countryArea->id }}"{{$selected}}>
                                                    {{ $countryArea->name }}
                                                </option>
                                            @endforeach
                                            </optgroup>
                                        @endforeach

                                    <?php // } ?>
                                </select>
                            </div>
                        </div>
                        <?php foreach ($productDetail->getProductsSection as $key => $value) { ?>
                            <?php if($value->sections_type == '1') { ?>
                                <div class="repetedContentDiv rCD1" data-exid="1" data-id="1">
                                    <div class="fl_w main_title">
                                        <h2>VIP Experience</a></h2>
                                    </div>
                                    <div class="white_part">
                                        <div class="closeIconDiv">
                                            <input name="section_edit[1][{{$value->id}}][id]" type="hidden" value="{{$value->id}}" >
                                            <a class="closePartIcon" data-id="1" data-proid="{{$value->id}}"  href="javascript:;"><i class="fas fa-times"></i></a>
                                        </div>
                                        <div class="part_one">
                                            <div class="form-group">
                                                <div class="custom_control">
                                                    <label>Big Banner Experience</label>
                                                    <input class="form-control experienceTitleCls" name="section_edit[1][{{$value->id}}][title]" type="text" id="section_1_title" value="{{$value->title}}" maxlength="255" placeholder="Jaguar Land Rover">
                                                </div>
                                                <div class="custom_control costcontrol">
                                                    <label>Cost</label>
                                                    <input class="form-control experienceCostCls" name="section_edit[1][{{$value->id}}][cost]" type="number" value="{{$value->cost}}" placeholder="&#163;50pp" id="section_1_cost">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="part_two">
                                            <div class="form-group">
                                                <div class="custom_control pullright textright">
                                                    <label>Score</label>
                                                    <span class="scoreperc">0%</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="fl_w comman part_three">
                                            <div class="form-group">
                                                <div class="custom_control">
                                                    <label>Mobility Level</label>
                                                    <select id="example-square-1-{{$value->id}}" class="exampleSquareCls" name="section_edit[1][{{$value->id}}][score]" autocomplete="off">
                                                      <option value=""></option>
                                                      <option value="1" <?php echo $value->score == '1'?'selected':''?>>1</option>
                                                      <option value="2" <?php echo $value->score == '2'?'selected':''?>>2</option>
                                                      <option value="3" <?php echo $value->score == '3'?'selected':''?>>3</option>
                                                      <option value="4" <?php echo $value->score == '4'?'selected':''?>>4</option>
                                                      <option value="5" <?php echo $value->score == '5'?'selected':''?>>5</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="fl_w comman part_four">
                                            <div class="form-group">
                                                <div class="custom_full_control">
                                                    <label>Story</label>
                                                    <textarea rows="4" name="section_edit[1][{{$value->id}}][story]" id="section_1_story">{{$value->story}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="fl_w comman part_five">
                                            <div class="form-group">
                                                <div class="custom_full_control">
                                                    <label>Experience</label>
                                                    <textarea rows="4" name="section_edit[1][{{$value->id}}][experience]" id="section_1_experience">{{$value->experience}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="fl_w comman part_six">
                                            <input class="form-control section_inclusions_1_{{$value->id}}" name="section_inclusions_1_{{$value->id}}" type="hidden" value="1">
                                            <div class="form-group">
                                                <div class="custom_full_control">
                                                    <label>Inclusions</label>
                                                    <div class="customFullControlInclusionsCls1-{{$value->id}} cFCInclusionsCls">
                                                        <?php foreach ($value->getProductsInclusion as $keyInc => $valueInc) { ?>
                                                            <div class="row ameEditDiv_1_{{$valueInc->id}}">
                                                                <div class="col-sm-10">
                                                                    <input class="form-control" name="section_edit[1][{{$value->id}}][inclusions][{{$keyInc+1}}]" type="text"  value="{{$valueInc->title}}" id="inclusions_edit_1_{{$keyInc+1}}" placeholder="Guided Factory" required="">
                                                                    
                                                                    <input class="form-control" name="section_edit[1][{{$value->id}}][inclusions_id][{{$keyInc+1}}]" type="hidden"  value="{{$valueInc->id}}" required="">
                                                                </div>
                                                                <div class="col-sm-2">
                                                                    <a href="javascript:;" class="nhSubCloseCls removeAmebtn" data-id="{{$valueInc->id}}" data-type="1" >x</a>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                    <a href="javascript:;" class="addmorelnk" data-mode="edit" data-id="1" data-no="{{$value->id}}">Add More</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="fl_w comman part_six">
                                            <div class="form-group">
                                                <div class="custom_full_control">
                                                    <label>Gallery</label>
                                                    <?php foreach ($value->getProductsImages as $keyImg => $valueImg) { ?>
                                                        <div class="image_galller">
                                                            <img src="{{ url("storage")}}/product_image/{{$valueImg->name}}">
                                                        </div>
                                                    <?php } ?>
                                                    <div class="imageGalllerAppend_1010{{$value->id}}"></div>
                                                    <div class="brw_bx image_galller">
                                                        <div class="browse_btn">
                                                            <input type="file" class="filesCls" name="section_edit[1][{{$value->id}}][images][]" data-id="1010{{$value->id}}"  multiple accept="image/*">
                                                            <div class="brw_user_ic">
                                                                <i class="far fa-images"></i>
                                                                <div class="brw_plus">
                                                                    <i class="fas fa-plus"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if($value->sections_type == '2') { ?>
                                <div class="repetedContentDiv rCD2" data-exid="2" data-id="2">
                                    <div class="fl_w main_title"><h2>Big Banner</h2></div>
                                    <div class="white_part">
                                        <div class="closeIconDiv">
                                            <input name="section_edit[2][{{$value->id}}][id]" type="hidden" value="{{$value->id}}" >
                                            <a class="closePartIcon" data-id="2" data-proid="{{$value->id}}" href="javascript:;"><i class="fas fa-times"></i></a>
                                        </div>
                                        <div class="part_one">
                                            <div class="form-group">
                                                <div class="custom_control">
                                                    <label>Big Banner Experience</label>
                                                    <input class="form-control experienceTitleCls" name="section_edit[2][{{$value->id}}][title]" type="text" value="{{$value->title}}" maxlength="255" id="section_2_title_{{$value->id}}" placeholder="Jaguar Land Rover">
                                                </div>
                                                <div class="custom_control costcontrol">
                                                    <label>Cost</label>
                                                    <input class="form-control experienceCostCls" name="section_edit[2][{{$value->id}}][cost]" type="number" id="section_2_cost_{{$value->id}}" value="{{$value->cost}}" placeholder="&#163;50pp">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="part_two">
                                            <div class="form-group">
                                                <div class="custom_control pullright textright">
                                                    <label>Score</label>
                                                    <span class="scoreperc" name="section_edit[2][{{$value->id}}][score]" id="section_2_score_{{$value->id}}">0%</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="fl_w comman part_three">
                                            <div class="form-group">
                                                <div class="custom_control">
                                                    <label>Mobility Level</label>
                                                    <div class="boxes">
                                                        <select id="example-square-2-{{$value->id}}" class="exampleSquareCls" name="section_edit[2][{{$value->id}}][score]" autocomplete="off">
                                                            <option value=""></option>
                                                            <option value="1" <?php echo $value->score == '1'?'selected':''?>>1</option>
                                                            <option value="2" <?php echo $value->score == '2'?'selected':''?>>2</option>
                                                            <option value="3" <?php echo $value->score == '3'?'selected':''?>>3</option>
                                                            <option value="4" <?php echo $value->score == '4'?'selected':''?>>4</option>
                                                            <option value="5" <?php echo $value->score == '5'?'selected':''?>>5</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="fl_w comman part_four">
                                            <div class="form-group">
                                                <div class="custom_full_control">
                                                    <label>Story</label>
                                                    <textarea rows="4" name="section_edit[2][{{$value->id}}][story]" id="section_2_story" >{{$value->story}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="fl_w comman part_five">
                                            <div class="form-group">
                                                <div class="custom_full_control">
                                                    <label>Experience</label>
                                                    <textarea rows="4" id="section_2_experience_{{$value->id}}" name="section_edit[2][{{$value->id}}][experience]" >{{$value->experience}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="fl_w comman part_six">
                                            <input class="form-control section_inclusions_2_{{$value->id}}" name="section_inclusions_2_{{$value->id}}" type="hidden" value="1">
                                            <div class="form-group">
                                                <div class="custom_full_control">
                                                    <label>Inclusions</label>
                                                    <div class="customFullControlInclusionsCls2-{{$value->id}} cFCInclusionsCls">
                                                        <?php foreach ($value->getProductsInclusion as $keyInc => $valueInc) { ?>
                                                            <div class="row ameEditDiv_2_{{$valueInc->id}}">
                                                                <div class="col-sm-10">
                                                                    <input class="form-control" name="section_edit[2][{{$value->id}}][inclusions][{{$keyInc+1}}]" type="text"  value="{{$valueInc->title}}" id="inclusions_edit_2_{{$keyInc+1}}" placeholder="Guided Factory" required="">
                                                            
                                                                    <input class="form-control" name="section_edit[2][{{$value->id}}][inclusions_id][{{$keyInc+1}}]" type="hidden"  value="{{$valueInc->id}}" required="">
                                                                </div>
                                                                <div class="col-sm-2">
                                                                    <a href="javascript:;" class="nhSubCloseCls removeAmebtn" data-id="{{$valueInc->id}}" data-type="2" >x</a>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                    <a href="javascript:;" class="addmorelnk" data-mode="edit" data-id="2" data-no="{{$value->id}}">Add More</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="fl_w comman part_six">
                                            <div class="form-group">
                                                <div class="custom_full_control">
                                                    <label>Gallery</label>
                                                    <?php foreach ($value->getProductsImages as $keyImg => $valueImg) { ?>
                                                        <div class="image_galller">
                                                            <img src="{{ url("storage")}}/product_image/{{$valueImg->name}}">
                                                        </div>
                                                    <?php } ?>
                                                    <div class="imageGalllerAppend_2020{{$value->id}}"></div>
                                                    <div class="brw_bx image_galller">
                                                        <div class="browse_btn">
                                                            <input type="file" class="filesCls" name="section_edit[2][{{$value->id}}][images][]" data-id="2020{{$value->id}}" multiple accept="image/*">
                                                            <div class="brw_user_ic">
                                                                <i class="far fa-images"></i>
                                                                <div class="brw_plus">
                                                                    <i class="fas fa-plus"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if($value->sections_type == '3') { ?>
                                <div class="repetedContentDiv rCD3" data-exid="3" data-id="3">
                                    <div class="fl_w main_title"><h2>Local Experience</h2></div>
                                    <div class="white_part">
                                        <div class="closeIconDiv">
                                            <input name="section_edit[3][{{$value->id}}][id]" type="hidden" value="{{$value->id}}" >
                                            <a class="closePartIcon" data-id="3" data-proid="{{$value->id}}" href="javascript:;"><i class="fas fa-times"></i></a>
                                        </div>
                                        <div class="part_one">
                                            <div class="form-group">
                                                <div class="custom_control">
                                                    <label>Local Experience</label>
                                                    <input class="form-control experienceTitleCls" name="section_edit[3][{{$value->id}}][title]" type="text" id="section_3_title" value="{{$value->title}}" maxlength="255" placeholder="Jaguar Land Rover">
                                                </div>
                                                <div class="custom_control costcontrol">
                                                    <label>Cost</label>
                                                    <input class="form-control experienceCostCls" name="section_edit[3][{{$value->id}}][cost]" type="number" id="section_3_cost" value="{{$value->cost}}" placeholder="&#163;50pp">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="part_two">
                                            <div class="form-group">
                                                <div class="custom_control pullright textright">
                                                    <label>Score</label>
                                                    <span class="scoreperc" name="section_edit[3][{{$value->id}}][score]" id="section_3_score" >0%</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="fl_w comman part_three">
                                            <div class="form-group">
                                                <div class="custom_control">
                                                    <label>Mobility Level</label>
                                                    <div class="boxes">
                                                        <select id="example-square-3" class="exampleSquareCls" name="section_edit[3][{{$value->id}}][score]" autocomplete="off">
                                                              <option value=""></option>
                                                              <option value="1" <?php echo $value->score == '1'?'selected':''?>>1</option>
                                                              <option value="2" <?php echo $value->score == '2'?'selected':''?>>2</option>
                                                              <option value="3" <?php echo $value->score == '3'?'selected':''?>>3</option>
                                                              <option value="4" <?php echo $value->score == '4'?'selected':''?>>4</option>
                                                              <option value="5" <?php echo $value->score == '5'?'selected':''?>>5</option>
                                                            </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="fl_w comman part_four">
                                            <div class="form-group">
                                                <div class="custom_full_control">
                                                    <label>Story</label>
                                                    <textarea rows="4" name="section_edit[3][{{$value->id}}][story]" id="section_3_story" >{{$value->story}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="fl_w comman part_five">
                                            <div class="form-group">
                                                <div class="custom_full_control">
                                                    <label>Experience</label>
                                                    <textarea rows="4" name="section_edit[3][{{$value->id}}][experience]" id="section_3_experience" >{{$value->experience}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="fl_w comman part_six">
                                        <input class="form-control section_inclusions_3_{{$value->id}}" name="section_inclusions_3_{{$value->id}}" type="hidden" value="1">
                                            <div class="form-group">
                                                <div class="custom_full_control">
                                                    <label>Inclusions</label>
                                                    <div class="customFullControlInclusionsCls3-{{$value->id}} cFCInclusionsCls">
                                                        <?php foreach ($value->getProductsInclusion as $keyInc => $valueInc) { ?>
                                                            
                                                            <div class="row ameEditDiv_3_{{$valueInc->id}}">
                                                                <div class="col-sm-10">
                                                                    <input class="form-control" name="section_edit[3][{{$value->id}}][inclusions][{{$keyInc+1}}]" type="text"  value="{{$valueInc->title}}" id="inclusions_3_{{$keyInc+1}}" placeholder="Guided Factory" required="">
                                                            
                                                                   <input class="form-control" name="section_edit[3][{{$value->id}}][inclusions_id][{{$keyInc+1}}]" type="hidden"  value="{{$valueInc->id}}" required="">
                                                                </div>
                                                                <div class="col-sm-2">
                                                                    <a href="javascript:;" class="nhSubCloseCls removeAmebtn" data-id="{{$valueInc->id}}" data-type="3" >x</a>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                    <a href="javascript:;" class="addmorelnk" data-mode="edit" data-id="3" data-no="{{$value->id}}">Add More</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="fl_w comman part_six">
                                            <div class="form-group">
                                                <div class="custom_full_control">
                                                    <label>Gallery</label>
                                                    <?php foreach ($value->getProductsImages as $keyImg => $valueImg) { ?>
                                                        <div class="image_galller">
                                                            <img src="{{ url("storage")}}/product_image/{{$valueImg->name}}">
                                                        </div>
                                                    <?php } ?>
                                                    <div class="imageGalllerAppend_3030{{$value->id}}"></div>
                                                    <div class="brw_bx image_galller">
                                                        <div class="browse_btn">
                                                            <input type="file" class="filesCls" name="section_edit[3][{{$value->id}}][images][]" data-id="3030{{$value->id}}" multiple accept="image/*">
                                                            <div class="brw_user_ic">
                                                                <i class="far fa-images"></i>
                                                                <div class="brw_plus">
                                                                    <i class="fas fa-plus"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if($value->sections_type == '4') { ?>
                                <div class="repetedContentDiv rCD4_{{$value->id}}" data-exid="4" data-id="4">
                                    <div class="fl_w main_title">
                                        <h2>Map Visualization</h2>
                                    </div>
                                    <div class="white_part">
                                        <div class="closeIconDiv">
                                            <a class="closePartIcon" data-id="4_{{$value->id}}" data-proid="{{$value->id}}" href="javascript:;"><i class="fas fa-times"></i></a>
                                        </div>
                                        <div class="fl_w comman part_six">
                                            <div class="form-group">
                                                <div class="custom_full_control">
                                                    <label>Map URL</label>
                                                    <input class="form-control" name="section_edit[4][{{$value->id}}][title]" type="text" id="section_4_{{$value->id}}_title" value="{{$value->title}}" placeholder="Guided Factory" required="" data-msg-required="Please provide title">
                                                    <input name="section_edit[4][{{$value->id}}][id]" type="hidden" value="{{$value->id}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if($value->sections_type == '5') { ?>
                                <div class="repetedContentDiv rCD5" data-exid="5" data-id="5">
                                    <div class="fl_w main_title"><h2>Hotel</h2></div>
                                    <div class="white_part">
                                        <div class="closeIconDiv">
                                            <a class="closePartIcon" data-id="5" data-proid="{{$value->id}}" href="javascript:;"><i class="fas fa-times"></i></a>
                                            <input name="section_edit[5][{{$value->id}}][id]" type="hidden"  value="{{$value->id}}">
                                        </div>
                                        <div class="part_one">
                                            <div class="form-group">
                                                <div class="custom_control">
                                                    <label>Hotel Name</label>
                                                    <input class="form-control experienceTitleCls searchHotelCls" name="section_edit[5][{{$value->id}}][title]" type="text" id="section_5_title_{{$value->id}}" value="{{$value->title}}" maxlength="255" placeholder="Jaguar Land Rover" data-id="{{$value->id}}">
                                                </div>
                                                <div class="custom_control costcontrol">
                                                    <label>Cost</label>
                                                    <input class="form-control experienceCostCls" name="section_edit[5][{{$value->id}}][cost]" type="number" id="section_5_cost_{{$value->id}}" value="{{$value->cost}}" placeholder="&#163;50pp">
                                                </div>
                                                <div class="custom_control costcontrol">
                                                    <label>Nights</label>
                                                    <input class="form-control" name="section_edit[5][{{$value->id}}][night]" type="text" id="section_5_night_{{$value->id}}" value="{{$value->night}}" placeholder="4">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="part_two">
                                            <div class="form-group">
                                                <div class="custom_control pullright textright">
                                                    <label>Score</label>
                                                    <span class="scoreperc">0%</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="fl_w comman part_three">
                                            <div class="form-group">
                                                <div class="custom_control">
                                                    <label>Start Rating</label>
                                                    <select id="example-square-5-{{$value->id}}" class="exampleSquareCls" name="section_edit[5][{{$value->id}}][score]" autocomplete="off">
                                                        <option value=""></option>
                                                        <option value="1" <?php echo $value->score == '1'?'selected':''?>>1</option>
                                                        <option value="2" <?php echo $value->score == '2'?'selected':''?>>2</option>
                                                        <option value="3" <?php echo $value->score == '3'?'selected':''?>>3</option>
                                                        <option value="4" <?php echo $value->score == '4'?'selected':''?>>4</option>
                                                        <option value="5" <?php echo $value->score == '5'?'selected':''?>>5</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="fl_w comman part_four">
                                            <div class="form-group">
                                                <div class="custom_full_control">
                                                    <label>Description</label>
                                                    <textarea rows="4" name="section_edit[5][{{$value->id}}][story]" id="section_5_story_{{$value->id}}">{{$value->story}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="fl_w comman part_six">
                                        <input class="form-control section_inclusions_5_{{$value->id}}" name="section_inclusions_5_{{$value->id}}" type="hidden" value="1">
                                            <div class="form-group">
                                                <div class="custom_full_control">
                                                    <label>Amenities</label>
                                                    <div class="customFullControlInclusionsCls5-{{$value->id}} cFCInclusionsCls">
                                                        <?php foreach ($value->getProductsInclusion as $keyInc => $valueInc) { ?>
                                                          <div class="row ameEditDiv_5_{{$valueInc->id}}">
                                                                <div class="col-sm-10">
                                                                    <input class="form-control" name="section_edit[5][{{$value->id}}][inclusions][{{$keyInc+1}}]" type="text"  value="{{$valueInc->title}}" id="inclusions_edit_5_{{$keyInc+1}}" placeholder="Guided Factory" required="">
                                                            
                                                                    <input class="form-control" name="section_edit[5][{{$value->id}}][inclusions_id][{{$keyInc+1}}]" type="hidden"  value="{{$valueInc->id}}" required="">
                                                                </div>
                                                                <div class="col-sm-2">
                                                                    <a href="javascript:;" class="nhSubCloseCls removeAmebtn" data-id="{{$valueInc->id}}" data-type="5" >x</a>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                    <a href="javascript:;" class="addmorelnk" data-mode="edit" data-id="5" data-no="{{$value->id}}">Add More</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="fl_w comman part_six">
                                            <div class="form-group">
                                                <div class="custom_full_control">
                                                    <label>Gallery</label>
                                                    <?php foreach ($value->getProductsImages as $keyImg => $valueImg) { ?>
                                                        <div class="image_galller">
                                                            <img src="{{ url("storage")}}/product_image/{{$valueImg->name}}">
                                                        </div>
                                                    <?php } ?>
                                                    <div class="imageGalllerAppend_4040{{$value->id}}"></div>
                                                    <div class="brw_bx image_galller">
                                                        <div class="browse_btn">
                                                            <input type="file" class="filesCls" name="section_edit[5][{{$value->id}}][images][]" data-id="4040{{$value->id}}" multiple accept="image/*">
                                                            <div class="brw_user_ic">
                                                                <i class="far fa-images"></i>
                                                                <div class="brw_plus">
                                                                    <i class="fas fa-plus"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    </div>
                    <div class="rightSidebarDiv">
                        <div class="sidebar_part_one">
                            <span class="scorelabel">Average Tour Score</span>
                            <span class="scoreperc">75%</span>
                        </div>
                        <div class="sidebar_part_two">
                            <label>Sections Completed</label>
                            <ul>
                                <li class="sidebarPartTwoCls_1">VIP Experience</li>
                                <li class="sidebarPartTwoCls_2">Big Banner</li>
                                <li class="sidebarPartTwoCls_3" class="active">Local Experience</li>
                                <li class="sidebarPartTwoCls_4">Map</li>
                                <li class="sidebarPartTwoCls_5">Hotel</li>
                            </ul>
                        </div>
                        <div class="sidebar_part_three">
                            <label>Add Section</label>
                            <select name="addSectionCls" class="form-control addSectionCls">
                                <option value="">Select Section</option>
                                <option value="1">VIP Experience</option>
                                <option value="2">Big Banner</option>
                                <option value="3">Local Experience</option>
                                <option value="4">Map</option>
                                <option value="5">Hotel</option>
                            </select>
                            <label class="sectionErrorCls" style="display: none; color: red; font-size: 10px;">Please select one section</label>
                            <a class="orangeLink btn addSectionBtnCls" href="javascript:;">Add</a>
                        </div>
                        <div class="sidebar_part_four">
                            <label>Estimated Costing</label>
                            <table class="costing_tbl">
                                <tr>
                                    <td colspan="2">Hotel</td>
                                    <td><i class="fas fa-pound-sign"></i>53.50pp</td>
                                </tr>
                                <tr>
                                    <td colspan="2">Nights</td>
                                    <td>4</td>
                                </tr>
                                <tr>
                                    <td colspan="2">Attractions</td>
                                    <td><i class="fas fa-pound-sign"></i>75.00pp</td>
                                </tr>
                                <tr>
                                    <td colspan="2"><b>IN</b></td>
                                    <td><b><i class="fas fa-pound-sign"></i>325.00pp</b></td>
                                </tr>
                                <tr>
                                    <td><b>OUT</b></td>
                                    <td><b>Margin 15%</b></td>
                                    <td><b><i class="fas fa-pound-sign"></i>374.00pp</b></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    {!! Form::close() !!}
<div class="modal fade" id="removeProductSectionModal" tabindex="-1" role="dialog" aria-labelledby="addFolderModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Are you sure you want to remove this Section?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="proSectionID" class="proSectionID">
                <input type="hidden" name="thisValCls" class="thisValCls">
                <button type="button" class="btn btn-secondary cancel" data-dismiss="modal">Cancel</button>
                <a href="javascript:;" class="btn btn-primary create RemoveSectionCls">Remove</a>                
                {{-- <input type="submit" name="submit" value="Remove" class="btn btn-primary create"> --}}
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="prototypeShareModal" tabindex="-1" role="dialog" aria-labelledby="addFolderModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: calc(100% - (1.75rem * 10));">
        <div class="modal-content appendModalData">
            
        </div>
    </div>
</div>
<div class="modal fade" id="costCalculatorModal" tabindex="-1" role="dialog" aria-labelledby="addFolderModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: calc(100% - (1.75rem * 40));">
        <div class="modal-content appendCCalModalData">
            <div class="modal-header">
                <h3 class="modal-title modalTitleCls" id="exampleModalLongTitle">Cost Calculator</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="costMainSection">
                    <div class="sectionExpeMain">
                        <div class="expreTitleCls">Experience</div>
                        <div class="appendExpreCls"></div>
                        
                                        
                    </div>   
                    <hr>
                    <div class="sectionExpeMain">
                        <div class="col-sm-12">
                            <div class="row marTopBot10Cls">
                                <div class="expreSectionCls col-sm-9">
                                    <div class="expSubTitleCls font17Cls">Total cost</div>
                                </div>

                                <div class="expreSectionCls col-sm-3">
                                    <div class="expSubTitleCls font17Cls fianlSumCls">&#163;300pp</div>
                                    <input type="hidden" name="fianlTxtSumCls" class="fianlTxtSumCls" value="" placeholder="">
                                </div>
                            </div>
                            <div class="row marTopBot10Cls">
                                <div class="expreSectionCls col-sm-9">
                                    <div class="expSubTitleCls font17Cls">Tour margin</div>
                                </div>

                                <div class="expreSectionCls col-sm-3">
                                    <div class="expSubTitleCls font17Cls">&nbsp;</div>
                                </div>
                            </div>
                            <div class="row marTopBot10Cls">
                                <div class="expreSectionCls col-sm-4">
                                    <div class="expSubTitleCls font17Cls">
                                        <div class="input-group mb-3">
                                          <input type="number" class="form-control tourMarginCls changeCostCalculatorCls ccTxtCls" value="15">
                                          <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon2">%</span>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="expreSectionCls col-sm-8">
                                    <div class="expSubTitleCls font17Cls">&nbsp;</div>
                                </div>
                            </div>
                            <div class="row marTopBot10Cls">
                                <div class="expreSectionCls col-sm-9">
                                    <div class="expSubTitleCls font17Cls">Profit margin pp</div>
                                </div>

                                <div class="expreSectionCls col-sm-3">
                                    <div class="expSubTitleCls font17Cls profitMarginPpCls">&#163;300pp</div>
                                </div>
                            </div>
                            <div class="row marTopBot10Cls">
                                <div class="expreSectionCls col-sm-9">
                                    <div class="expSubTitleCls font17Cls greenClrCls">Final tour price pp</div>
                                </div>

                                <div class="expreSectionCls col-sm-3">
                                    <div class="expSubTitleCls font17Cls greenClrCls finalTourPricePpCls">&#163;300pp</div>
                                </div>
                            </div>
                            <div class="row marTopBot10Cls">
                                <div class="expreSectionCls col-sm-9">
                                    <div class="expSubTitleCls font17Cls">Profit margin based on</div>
                                </div>

                                <div class="expreSectionCls col-sm-3">
                                    <div class="expSubTitleCls font17Cls">&nbsp;</div>
                                </div>
                                <div class="expreSectionCls col-sm-9">
                                    <div class="expSubTitleCls font17Cls">
                                        <input type="number" name="profitMarginBasedOnCls" value="20" class="width20Cls profitMarginBasedOnCls padding5px changeCostCalculatorCls ccTxtCls">
                                        people
                                    </div>
                                </div>

                                <div class="expreSectionCls col-sm-3">
                                    <div class="expSubTitleCls font17Cls profitMarginBasedAmtCls">&#163;300pp</div>
                                </div>
                            </div>
                            <div class="row marTopBot10Cls">
                                <div class="expreSectionCls col-sm-9">
                                    <div class="expSubTitleCls font17Cls">Total cost based on</div>
                                </div>

                                <div class="expreSectionCls col-sm-3">
                                    <div class="expSubTitleCls font17Cls">&nbsp;</div>
                                </div>
                                <div class="expreSectionCls col-sm-9">
                                    <div class="expSubTitleCls font17Cls">
                                        <input type="number" name="totalCostBased" value="20" class="width20Cls totalCostBased padding5px changeCostCalculatorCls ccTxtCls">
                                        people
                                    </div>
                                </div>

                                <div class="expreSectionCls col-sm-3">
                                    <div class="expSubTitleCls font17Cls totalCostBasedAmtCls">&#163;300pp</div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>   
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="removeProductModal" tabindex="-1" role="dialog" aria-labelledby="addFolderModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Are you sure you want to remove this Product?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       {!! Form::open(array('route' => 'product-remove','method'=>'POST', 'enctype' => 'multipart/form-data', 'class'=>'addPrototypeNameForm', 'id'=>'addPrototypeNameForm')) !!}
            <input type="hidden" class="form-control" id="productsId" name="product_id" value="{{$productDetail->id}}">
            <input type="hidden" class="form-control" id="proTosId" name="proToId" value="{{$productDetail->is_prototype}}">
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary cancel" data-dismiss="modal">Cancel</button>
                {{-- <button type="button" class="btn btn-primary create">Create</button> --}}
                <input type="submit" name="submit" value="Remove" class="btn btn-primary create">
            </div>
        {!! Form::close() !!}
    </div>
  </div>
</div>

<div class="modal fade" id="productAmenitiesModal" tabindex="-1" role="dialog" aria-labelledby="addFolderModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Are you sure you want to remove this Inclusions?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <input type="hidden" name="amenitiesId" class="amenitiesId">
        <input type="hidden" name="amenitiesTypeId" class="amenitiesTypeId">
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary cancel" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary removeAmenitiesBtn" href="javascript:;" data-dismiss="modal">Remove</a>
        </div>
    </div>
  </div>
</div>
<script src="{{ asset('js/popper.min.js') }}"></script> 
<script src="{{ asset('js/bootstrap.min.js') }}"></script> 
<script src="{{ asset('js/jquery.barrating.js') }}"></script>
<script src="{{ asset('js/pages/add_products.js') }}"></script>