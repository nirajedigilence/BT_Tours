<link href="{{ asset('css/style-products.css') }}" rel="stylesheet">
<link href="{{ asset('css/bars-square.css') }}" rel="stylesheet">
<style type="text/css" media="screen">
    .sidebar_part_two li:before{
        background: none;
    }    
    .part_one{
        margin-bottom: 10px;
    }
    
    
</style>
<div class="middleCol completedBooking productsection" id="middleCol">
    {!! Form::open(array('route' => 'products-experience-store','method'=>'POST', 'enctype' => 'multipart/form-data', 'class'=>'addProductExperienceForm', 'id'=>'addProductExperienceForm')) !!}
        <div class="row">
            <div class="header_part">
                
                <div class="head_part_two">
                    {{-- <a class="orangeLink btn pullright" href="javascript:;">Delete</a> --}}
                    {{-- <a class="orangeLink btn pullright" href="javascript:;">Save and Publish</a> --}}
                    {{-- <a class="orangeLink btn pullright" href="javascript:;">Save</a> --}}
                    <a class="orangeLink btn pullright backBtnCls" href="{{ route('products') }}">Back</a>
                    {{-- <input type="submit" name="submit" value="Save"class="orangeLink btn pullright"> --}}
                    {{-- <a class="orangeLink btn pullright" href="javascript:;">Cost Calculator</a> --}}
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
                    <input type="hidden" name="is_prototype" value="" class="is_prototype">
                    <div class="contentDiv appendSectionDiv">
                        <div class="repetedContentDiv rCD1" data-id="1">
                            <div class="white_part">
                                <div class="part_one">
                                    <div class="form-group">
                                        <div class="custom_control"> 
                                            <label>Experience Name</label> 
                                            <input class="form-control" name="product_experience[name]" type="text"  value="" maxlength="255"> 
                                        </div>
                                        <div class="custom_control costcontrol"> 
                                            <label>Cost</label>
                                            <input class="form-control" name="product_experience[cost]" type="number" value="" placeholder="" id="section_1_cost">
                                        </div>
                                    </div>
                                </div>
                                <div class="part_one">
                                    <div class="form-group">
                                        <div class="custom_control"> 
                                            <label>Why are we considering it?</label> 
                                            <input class="form-control" name="product_experience[considering]" type="text"  value="" maxlength="255"> 
                                        </div>
                                    </div>
                                </div>
                                <div class="part_one">
                                    <div class="form-group">
                                        <div class="custom_control"> 
                                            <label>Veenus Score</label> 
                                            <input class="form-control" name="product_experience[score]" type="text"  value="" maxlength="255"> 
                                        </div>
                                    </div>
                                </div>
                                <div class="part_one">
                                    <div class="form-group">
                                        <div class="custom_control"> 
                                            <label>TripAdvisor URL</label> 
                                            <input class="form-control" name="product_experience[tripadvisor_url]" type="text"  value="" maxlength="255"> 
                                        </div>
                                    </div>
                                </div>
                                <div class="part_one">
                                    <div class="form-group">
                                        <div class="custom_control"> 
                                            <label>Website</label> 
                                            <input class="form-control" name="product_experience[website]" type="text"  value="" maxlength="255"> 
                                        </div>
                                    </div>
                                </div>
                                <div class="part_one">
                                    <div class="form-group">
                                        <div class="custom_control"> 
                                            <label>Map Location</label> 
                                            <input class="form-control" name="product_experience[map]" type="text"  value="" maxlength="255"> 
                                        </div>
                                    </div>
                                </div>
 
                                <div class="fl_w comman part_three">
                                    <div class="form-group">
                                        <div class="custom_control"> <label>Mobility Level</label>
                                            <div class="br-wrapper br-theme-bars-square">
                                                <select id="example-square" name="product_experience[mobility]">
                                                    <option value=""></option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="fl_w comman part_four">
                                    <div class="form-group">
                                        <div class="custom_full_control"> 
                                            <label>Story</label>
                                            <textarea rows="4" name="product_experience[story]" id="section_1_story"></textarea> 
                                        </div>
                                    </div>
                                </div>
                                <div class="fl_w comman part_five">
                                    <div class="form-group">
                                        <div class="custom_full_control"> 
                                            <label>Experience</label> 
                                            <textarea rows="4" name="product_experience[experience]" id="section_1_experience"></textarea> 
                                        </div>
                                    </div>
                                </div>
                                <div class="fl_w comman part_six"> 
                                    <input class="form-control section_inclusions_1" name="section_inclusions_1" type="hidden" value="1">
                                    <div class="form-group">
                                        <div class="custom_full_control"> <label>Inclusions</label>
                                            <div class="customFullControlInclusionsCls1 cFCInclusionsCls"> 
                                                <div class="row ameDiv_111">
                                                    <div class="col-sm-10">
                                                        <input class="form-control" name="product_experience_inclusions[1]" type="text" value="" id="inclusions_1_1" placeholder=""> 
                                                    </div> 
                                                    <div class="col-sm-2">
                                                        <a href="javascript:;" class="nhSubCloseCls removeAddAmebtn" data-id="111" >x</a>
                                                    </div> 
                                                </div> 
                                            </div> 
                                            <a href="javascript:;" class="addmorelnk" data-id="1">Add More</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="fl_w comman part_six">
                                    <div class="imageGalllerAppend_124"></div>
                                    <div class="form-group">
                                        <div class="custom_full_control"> <label>Gallery</label>
                                            <div class="brw_bx image_galller">
                                                <div class="browse_btn"> 
                                                    <input type="file" name="product_experience_images[]" class="filesCls" data-id="124" multiple="" accept="image/*">
                                                    <div class="brw_user_ic"> <i class="far fa-images"></i>
                                                        <div class="brw_plus"> <i class="fas fa-plus"></i> </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="rightSidebarDiv">
                        <div class="sidebar_part_one">
                            <span class="scorelabel">Product Score</span>
                            <span class="scoreperc scorePerCls">0%</span>
                            <input type="hidden" name="product_scroe[product_score]" class="productScore"  value="">
                            <input type="hidden" name="product_scroe[product_score_total]" class="productScoreTotal"  value="">
                        </div>
                        <div class="sidebar_part_two">
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <div class="custom_control"> 
                                            <label>Brand Value (Story)</label> 
                                            <input class="form-control" name="product_scroe[brand]" type="text"  value="" maxlength="255"> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="custom_control costcontrol"> 
                                        <label>Score</label>
                                        <select class="form-control slideSelectCls" name="product_scroe[brand_value]">
                                            <option value=""></option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar_part_two">
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <div class="custom_control"> 
                                            <label>Visuals</label> 
                                            <input class="form-control" name="product_scroe[visuals]" type="text"  value="" maxlength="255"> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="custom_control costcontrol"> 
                                        <label>&nbsp;</label>
                                        <select class="form-control slideSelectCls" name="product_scroe[visuals_value]">
                                            <option value=""></option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar_part_two">
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <div class="custom_control"> 
                                            <label>Exclusive Access</label> 
                                            <input class="form-control" name="product_scroe[exclusive_access]" type="text"  value="" maxlength="255"> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="custom_control costcontrol"> 
                                        <label>&nbsp;</label>
                                        <select class="form-control slideSelectCls" name="product_scroe[exclusive_access_value]">
                                            <option value=""></option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar_part_two">
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <div class="custom_control"> 
                                            <label>Combination</label> 
                                            <input class="form-control" name="product_scroe[combination]" type="text"  value="" maxlength="255"> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="custom_control costcontrol"> 
                                        <label>&nbsp;</label>
                                        <select class="form-control slideSelectCls" name="product_scroe[combination_value]">
                                            <option value=""></option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar_part_two">
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <div class="custom_control"> 
                                            <label>Shelf Life</label> 
                                            <input class="form-control" name="product_scroe[shelf_life]" type="text"  value="" maxlength="255"> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="custom_control costcontrol"> 
                                        <label>&nbsp;</label>
                                        <select class="form-control slideSelectCls" name="product_scroe[shelf_life_value]">
                                            <option value=""></option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar_part_two">
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <div class="custom_control"> 
                                            <label>Location/Heatmap</label> 
                                            <input class="form-control" name="product_scroe[location]" type="text"  value="" maxlength="255"> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="custom_control costcontrol" > 
                                        <label>&nbsp;</label>
                                        <select class="form-control slideSelectCls" name="product_scroe[location_value]">
                                            <option value=""></option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar_part_two">
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <div class="custom_control"> 
                                            <label>Date limited</label> 
                                            <input class="form-control" name="product_scroe[date_limited]" type="text"  value="" maxlength="255"> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="custom_control costcontrol"> 
                                        <label>&nbsp;</label>
                                        <select class="form-control slideSelectCls" name="product_scroe[date_limited_value]">
                                            <option value=""></option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar_part_two">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="LastTotalCls">Total:&nbsp; </div>
                                    <div class="LastTotalSubCls">0</div>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar_part_two">
                            <div class="row">
                                <input type="submit" name="submit" value="Save" class="orangeLink btn pullright proPipeCls">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    {!! Form::close() !!}
<script src="{{ asset('js/jquery.barrating.js') }}"></script>
<script src="{{ asset('js/pages/products_pipeline.js') }}"></script>