<link href="{{ asset('css/style-products.css') }}" rel="stylesheet">
<link href="{{ asset('css/bars-square.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">   
<style type="text/css" media="screen">
    .sidebar_part_two li:before{
        background: none;
    }    
    .part_one{
        margin-bottom: 10px;
    }
</style>
<script>
    var base_url = "{{URL::to('/')}}";
</script>
<div class="middleCol completedBooking productsection" id="middleCol">
    {!! Form::open(array('route' => 'products-experience-update','method'=>'POST', 'enctype' => 'multipart/form-data', 'class'=>'addProductExperienceForm', 'id'=>'addProductExperienceForm')) !!}
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
                                            <input class="form-control" name="_product_experience[name]" type="text"  value="{{$productsExperienceList->name}}" maxlength="255" readonly> 
                                            <input name="product_experience[id]" type="hidden"  value="{{$productsExperienceList->id}}" maxlength="255"> 
                                        </div>
                                        <div class="custom_control costcontrol"> 
                                            <label>Cost</label>
                                            <input class="form-control" name="_product_experience[estimated_cost_pp]" type="number" value="{{$productsExperienceList->estimated_cost_pp}}" placeholder="" id="" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="part_one">
                                    <div class="form-group">
                                        <div class="custom_control"> 
                                            <label>Why are we considering it?</label> 
                                            <input class="form-control" name="_product_experience[reason_considaring]" type="text"  value="{{$productsExperienceList->reason_considaring}}" maxlength="255" readonly> 
                                        </div>
                                    </div>
                                </div>
                                <div class="part_one">
                                    <div class="form-group">
                                        <div class="custom_control"> 
                                            <label>Veenus Score</label> 
                                            <input class="form-control" name="_product_experience[score]" type="text"  value="{{$productsExperienceList->score}}" maxlength="255" readonly> 
                                        </div>
                                    </div>
                                </div>
                                <div class="part_one">
                                    <div class="form-group">
                                        <div class="custom_control"> 
                                            <label>TripAdvisor URL</label> 
                                            <input class="form-control" name="_product_experience[tripadvisor_url]" type="text"  value="{{$productsExperienceList->tripadvisor_url}}" maxlength="255" readonly> 
                                        </div>
                                    </div>
                                </div>
                                <div class="part_one">
                                    <div class="form-group">
                                        <div class="custom_control"> 
                                            <label>Website</label> 
                                            <input class="form-control" name="_product_experience[website]" type="text"  value="{{$productsExperienceList->website}}" maxlength="255" readonly> 
                                        </div>
                                    </div>
                                </div>
                                <div class="part_one">
                                    <div class="form-group">
                                        <div class="custom_control"> 
                                            <label>Map Location</label> 
                                            <input class="form-control" name="_product_experience[location_url]" type="text"  value="{{$productsExperienceList->location_url}}" readonly> 
                                        </div>
                                    </div>
                                </div>
 
                                <div class="fl_w comman part_three">
                                    <div class="form-group">
                                        <div class="custom_control"> <label>Mobility Level</label>
                                            <div class="br-wrapper br-theme-bars-square">
                                                <select id="example-square" name="_product_experience[mobility]" readonly>
                                                    <option value=""></option>
                                                    <option value="1" <?php echo $productsExperienceList->mobility == '1'?'selected':''?>>1</option>
                                                    <option value="2" <?php echo $productsExperienceList->mobility == '2'?'selected':''?>>2</option>
                                                    <option value="3" <?php echo $productsExperienceList->mobility == '3'?'selected':''?>>3</option>
                                                    <option value="4" <?php echo $productsExperienceList->mobility == '4'?'selected':''?>>4</option>
                                                    <option value="5" <?php echo $productsExperienceList->mobility == '5'?'selected':''?>>5</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="fl_w comman part_four">
                                    <div class="form-group">
                                        <div class="custom_full_control"> 
                                            <label>Story</label>
                                            <textarea rows="4" name="_product_experience[story]" id="" readonly>{{$productsExperienceList->story}}</textarea> 
                                        </div>
                                    </div>
                                </div>
                                <div class="fl_w comman part_five">
                                    <div class="form-group">
                                        <div class="custom_full_control"> 
                                            <label>Experience</label> 
                                            <textarea rows="4" name="_product_experience[experience]" id="" readonly="">{{$productsExperienceList->experience}}</textarea> 
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
                            <input type="hidden" name="product_scroe[product_score]" class="productScore"  value="{{ isset($productsExperienceList->getProductsExperienceScore->product_score) ? $productsExperienceList->getProductsExperienceScore->product_score : ''}}">
                            <input type="hidden" name="product_scroe[product_score_total]" class="productScoreTotal"  value="{{isset($productsExperienceList->getProductsExperienceScore->product_score_total) ? $productsExperienceList->getProductsExperienceScore->product_score_total : ''}}">
                        </div>
                        <div class="sidebar_part_two">
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <div class="custom_control"> 
                                            <label>Brand Value (Story)</label> 
                                            <input class="form-control" name="product_scroe[brand]" type="text"  value="{{isset($productsExperienceList->getProductsExperienceScore->brand) ? $productsExperienceList->getProductsExperienceScore->brand : ''}}" maxlength="255"> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="custom_control costcontrol"> 
                                        <label>Score</label>
                                        <select class="form-control slideSelectCls" name="product_scroe[brand_value]">
                                            <option value=""></option>
                                            <option value="1" <?php echo isset($productsExperienceList->getProductsExperienceScore->brand_value) && $productsExperienceList->getProductsExperienceScore->brand_value == '1'?'selected':''; ?>>1</option>
                                            <option value="2" <?php echo isset($productsExperienceList->getProductsExperienceScore->brand_value) && $productsExperienceList->getProductsExperienceScore->brand_value == '2'?'selected':''; ?>>2</option>
                                            <option value="3" <?php echo isset($productsExperienceList->getProductsExperienceScore->brand_value) && $productsExperienceList->getProductsExperienceScore->brand_value == '3'?'selected':''; ?>>3</option>
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
                                            <input class="form-control" name="product_scroe[visuals]" type="text"  value="{{isset($productsExperienceList->getProductsExperienceScore->visuals) ? $productsExperienceList->getProductsExperienceScore->visuals : ''}}" maxlength="255"> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="custom_control costcontrol"> 
                                        <label>&nbsp;</label>
                                        <select class="form-control slideSelectCls" name="product_scroe[visuals_value]">
                                            <option value=""></option>
                                            <option value="1" <?php echo isset($productsExperienceList->getProductsExperienceScore->visuals_value) && $productsExperienceList->getProductsExperienceScore->visuals_value == '1'?'selected':''; ?>>1</option>
                                            <option value="2" <?php echo isset($productsExperienceList->getProductsExperienceScore->visuals_value) && $productsExperienceList->getProductsExperienceScore->visuals_value == '2'?'selected':''; ?>>2</option>
                                            <option value="3" <?php echo isset($productsExperienceList->getProductsExperienceScore->visuals_value) && $productsExperienceList->getProductsExperienceScore->visuals_value == '3'?'selected':''; ?>>3</option>
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
                                            <input class="form-control" name="product_scroe[exclusive_access]" type="text"  value="{{isset($productsExperienceList->getProductsExperienceScore->visuals_value) ? $productsExperienceList->getProductsExperienceScore->exclusive_access : ''}}" maxlength="255"> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="custom_control costcontrol"> 
                                        <label>&nbsp;</label>
                                        <select class="form-control slideSelectCls" name="product_scroe[exclusive_access_value]">
                                            <option value=""></option>
                                            <option value="1" <?php echo isset($productsExperienceList->getProductsExperienceScore->exclusive_access_value) && $productsExperienceList->getProductsExperienceScore->exclusive_access_value == '1'?'selected':''; ?>>1</option>
                                            <option value="2" <?php echo isset($productsExperienceList->getProductsExperienceScore->exclusive_access_value) && $productsExperienceList->getProductsExperienceScore->exclusive_access_value == '2'?'selected':''; ?>>2</option>
                                            <option value="3" <?php echo isset($productsExperienceList->getProductsExperienceScore->exclusive_access_value) && $productsExperienceList->getProductsExperienceScore->exclusive_access_value == '3'?'selected':''; ?>>3</option>
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
                                            <input class="form-control" name="product_scroe[combination]" type="text"  value="{{isset($productsExperienceList->getProductsExperienceScore->combination) ? $productsExperienceList->getProductsExperienceScore->combination : ''}}" maxlength="255"> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="custom_control costcontrol"> 
                                        <label>&nbsp;</label>
                                        <select class="form-control slideSelectCls" name="product_scroe[combination_value]">
                                            <option value=""></option>
                                            <option value="1" <?php echo isset($productsExperienceList->getProductsExperienceScore->combination_value) && $productsExperienceList->getProductsExperienceScore->combination_value == '1'?'selected':''; ?>>1</option>
                                            <option value="2" <?php echo isset($productsExperienceList->getProductsExperienceScore->combination_value) && $productsExperienceList->getProductsExperienceScore->combination_value == '2'?'selected':''; ?>>2</option>
                                            <option value="3" <?php echo isset($productsExperienceList->getProductsExperienceScore->combination_value) && $productsExperienceList->getProductsExperienceScore->combination_value == '3'?'selected':''; ?>>3</option>
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
                                            <input class="form-control" name="product_scroe[shelf_life]" type="text"  value="{{isset($productsExperienceList->getProductsExperienceScore->shelf_life) ? $productsExperienceList->getProductsExperienceScore->shelf_life : ''}}" maxlength="255"> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="custom_control costcontrol"> 
                                        <label>&nbsp;</label>
                                        <select class="form-control slideSelectCls" name="product_scroe[shelf_life_value]">
                                            <option value=""></option>
                                            <option value="1" <?php echo isset($productsExperienceList->getProductsExperienceScore->shelf_life_value) && $productsExperienceList->getProductsExperienceScore->shelf_life_value == '1'?'selected':''; ?>>1</option>
                                            <option value="2" <?php echo isset($productsExperienceList->getProductsExperienceScore->shelf_life_value) && $productsExperienceList->getProductsExperienceScore->shelf_life_value == '2'?'selected':''; ?>>2</option>
                                            <option value="3" <?php echo isset($productsExperienceList->getProductsExperienceScore->shelf_life_value) && $productsExperienceList->getProductsExperienceScore->shelf_life_value == '3'?'selected':''; ?>>3</option>
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
                                            <input class="form-control" name="product_scroe[location]" type="text"  value="{{isset($productsExperienceList->getProductsExperienceScore->location) ? $productsExperienceList->getProductsExperienceScore->location : ''}}" maxlength="255"> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="custom_control costcontrol" > 
                                        <label>&nbsp;</label>
                                        <select class="form-control slideSelectCls" name="product_scroe[location_value]">
                                            <option value=""></option>
                                            <option value="1" <?php echo isset($productsExperienceList->getProductsExperienceScore->location_value) && $productsExperienceList->getProductsExperienceScore->location_value == '1'?'selected':''; ?>>1</option>
                                            <option value="2" <?php echo isset($productsExperienceList->getProductsExperienceScore->location_value) && $productsExperienceList->getProductsExperienceScore->location_value == '2'?'selected':''; ?>>2</option>
                                            <option value="3" <?php echo isset($productsExperienceList->getProductsExperienceScore->location_value) && $productsExperienceList->getProductsExperienceScore->location_value == '3'?'selected':''; ?>>3</option>
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
                                            <input class="form-control" name="product_scroe[date_limited]" type="text"  value="{{isset($productsExperienceList->getProductsExperienceScore->date_limited) ? $productsExperienceList->getProductsExperienceScore->date_limited : ''}}" maxlength="255"> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="custom_control costcontrol"> 
                                        <label>&nbsp;</label>
                                        <select class="form-control slideSelectCls" name="product_scroe[date_limited_value]">
                                            <option value=""></option>
                                            <option value="1" <?php echo isset($productsExperienceList->getProductsExperienceScore->date_limited_value) && $productsExperienceList->getProductsExperienceScore->date_limited_value == '1'?'selected':''; ?>>1</option>
                                            <option value="2" <?php echo isset($productsExperienceList->getProductsExperienceScore->date_limited_value) && $productsExperienceList->getProductsExperienceScore->date_limited_value == '2'?'selected':''; ?>>2</option>
                                            <option value="3" <?php echo isset($productsExperienceList->getProductsExperienceScore->date_limited_value) && $productsExperienceList->getProductsExperienceScore->date_limited_value == '3'?'selected':''; ?>>3</option>
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
<script src="{{ asset('js/pages/products_pipeline.js') }}"></script>