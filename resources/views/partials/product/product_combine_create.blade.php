<link href="{{ asset('css/style-products.css') }}" rel="stylesheet">
<link href="{{ asset('css/bars-square.css') }}" rel="stylesheet">
<script>
    var base_url = "{{URL::to('/')}}";
</script>
<style type="text/css" media="screen">
.sidebar_part_two li:before{
         background: none; 
}    
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<div class="middleCol completedBooking productsection" id="middleCol">
    {!! Form::open(array('route' => 'products-pipeline-store','method'=>'POST', 'enctype' => 'multipart/form-data', 'class'=>'addProductForm', 'id'=>'addProductForm')) !!}
        <div class="row">
            <div class="header_part">
                <div class="head_part_one">
                    <label>Number</label>
                    <span>{{$productNumberId}}</span>
                </div>
                    <input type="hidden" class="form-control productNewId" id="productNewId" name="productNewId" value="{{ $productNewId }}">
                <div class="head_part_two">
                    {{-- <a class="orangeLink btn pullright backBtnCls" href="{{ route('products') }}">Back</a> --}}
                    <a class="orangeLink btn pullright" href="{{ route('products') }}">Delete</a>
                    <a class="orangeLink btn pullright saveAndPublish" href="javascript:;">Save and Publish</a> {{-- <a class="orangeLink btn pullright" href="javascript:;">Save</a> --}}
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
                    {{-- <input type="hidden" name="is_prototype" value="" class="is_prototype"> --}}
                    <input type="hidden" name="id" value="{{$productDetail->id}}" class="proID">
                    <input type="hidden" name="shareCollaborator" value="" class="shareCollaborator">
                    <input type="hidden" name="total_profit_margin" value="" class="total_profit_margin">
                    <input type="hidden" name="total_cost" value="" class="total_cost">
                    <input type="hidden" name="mode" value="Edit" class="mode">
                    <div class="contentDiv contentDivasda">
                    </div>
                    <div class="contentDiv appendSectionDiv">
                       <div class="fl_w main_title" style="text-align:center;">
                            <h2><span class="proNameCls">New product</span><input type="text" name="product_name" value="New product" class="inputTitle productNameCls ele_hide">&nbsp;<a href="javascript:;" class="editTitle"><i class="fas fa-edit"></i></a></h2>
                        </div>
                        <div class="sidebar_part_three" style="width: 49%; padding: 0">
                            <label>Prototype Folder</label>
                            <select name="is_prototype" class="form-control prototypeFolderCls is_prototype">
                                <option value="">Select One</option>
                                    @foreach ($prototypesList as $key => $value)
                                        <option value="{{$value->id}}" data-id="{{$value->country_id}}">{{ $value->name }}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="sidebar_part_three" style="width: 2%; padding: 0"></div>
                        <div class="sidebar_part_three" style="width: 49%; padding: 0">
                            <label>Country Areas</label>
                            <select name="country_area_id" class="form-control country_area_id">
                                <option value="">Select One</option>
                                    @foreach ($countries as $k => $country)
                                        <optgroup label="{{$country->name}}" id="country{{$country->id}}" data-max-options="2">
                                        @foreach ($country->countryAreas as $kk => $countryArea)
                                            <option value="{{$country->id}}-{{ $countryArea->id }}" @if ( isset($countryArea->selected) && $countryArea->selected) selected @endif>
                                                {{ $countryArea->name }}
                                            </option>
                                        @endforeach
                                        </optgroup>
                                    @endforeach
                            </select>
                        </div>
                        <?php 
                        $pipelineCnt = 1;
                        foreach ($productsExperienceList as $key => $value) { ?>
                            <?php $experienceTypes = $proType[$value->id];
                            if($experienceTypes == '1'){
                                $experienceTitle = 'VIP Experience';
                            }else if($experienceTypes == '2'){
                                $experienceTitle = 'Big Banner';
                            }else if($experienceTypes == '3'){
                                $experienceTitle = 'Local Experience';
                            }else{
                                $experienceTitle = 'VIP Experience';
                            }
                            $productScore = $value->getProductsExperienceScore->product_score;
                            if($productScore > '74'){
                                $colors = 'green';
                            }else if($productScore > '49'){
                                $colors = '#FCA311';
                            }else if($productScore > '24'){
                                $colors = 'black';
                            }else{
                                $colors = 'red';
                            }
                             ?>
                            <div class="repetedContentDiv rcom{{$value->id}} rCDcombine{{$value->id}}" data-exid="{{$experienceTypes}}">
                                <div class="fl_w main_title">
                                    <h2>{{$experienceTitle}}</a></h2>
                                </div>
                                <div class="white_part">
                                    <div class="closeIconDiv">
                                        <input name="randNumber" type="hidden" value="{{$randNumber}}" >
                                        <input name="product_pipeline[{{$pipelineCnt}}][id]" type="hidden" value="{{$value->id}}" >
                                        <input name="product_pipeline[{{$pipelineCnt}}][type]" type="hidden" value="{{$experienceTypes}}" >
                                        <a class="closePartIcon" data-id="combine{{$value->id}}" href="javascript:;"><i class="fas fa-times"></i></a>
                                    </div>
                                    <div class="part_one">
                                        <div class="form-group">
                                            <div class="custom_control">
                                                <label>Big Banner Experience</label>
                                                <input class="form-control experienceTitleCls" name="product_pipeline[{{$pipelineCnt}}][title]" type="text" id="section_{{$value->id}}_title" value="{{$value->name}}" maxlength="255" placeholder="Jaguar Land Rover">
                                            </div>
                                            <div class="custom_control costcontrol">
                                                <label>Cost</label>
                                                <input class="form-control experienceCostCls" name="product_pipeline[{{$pipelineCnt}}][cost]" type="text" value="{{$value->cost}}" placeholder="&#163;50pp" id="section_{{$value->id}}_cost">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="part_two">
                                        <div class="form-group">
                                            <div class="custom_control pullright textright">
                                                <label>Score</label>
                                                <span class="scoreperc" style="color:{{$colors}}">{{$productScore}}%</span>
                                                <input type="hidden" name="productScoreCls" class="productScoreCls" value="{{$productScore}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="fl_w comman part_three">
                                        <div class="form-group">
                                            <div class="custom_control">
                                                <label>Mobility Level</label>
                                                <select id="example-square-com-{{$value->id}}" name="product_pipeline[{{$pipelineCnt}}][score]" autocomplete="off">
                                                  <option value=""></option>
                                                  <option value="1" <?php echo $value->mobility == '1'?'selected':''?>>1</option>
                                                  <option value="2" <?php echo $value->mobility == '2'?'selected':''?>>2</option>
                                                  <option value="3" <?php echo $value->mobility == '3'?'selected':''?>>3</option>
                                                  <option value="4" <?php echo $value->mobility == '4'?'selected':''?>>4</option>
                                                  <option value="5" <?php echo $value->mobility == '5'?'selected':''?>>5</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="fl_w comman part_four">
                                        <div class="form-group">
                                            <div class="custom_full_control">
                                                <label>Story</label>
                                                <textarea rows="4" name="product_pipeline[{{$pipelineCnt}}][story]" id="section_{{$value->id}}_story">{{$value->story}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="fl_w comman part_five">
                                        <div class="form-group">
                                            <div class="custom_full_control">
                                                <label>Experience</label>
                                                <textarea rows="4" name="product_pipeline[{{$pipelineCnt}}][experience]" id="section_{{$value->id}}_experience">{{$value->experience}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="fl_w comman part_six">
                                        <?php
                                        $cntInc = 1;
                                        foreach ($value->getProductsExperienceInclusion as $keyInc => $valueInc) { 
                                            $cntInc++;
                                        } ?>
                                        <input class="form-control product_inclusions_{{$pipelineCnt}}" name="product_inclusions_{{$pipelineCnt}}" type="hidden" value="{{$cntInc}}">
                                        <div class="form-group">
                                            <div class="custom_full_control">
                                                <label>Inclusions</label>
                                                <div class="productPipeLineInclusionsCls{{$pipelineCnt}} productPipeLineIncCls">
                                                    <?php foreach ($value->getProductsExperienceInclusion as $keyInc => $valueInc) { ?>
                                                        <div class="row ameDiv_{{$keyInc+1}}">
                                                            <div class="col-sm-10">
                                                                <input class="form-control" name="product_pipeline[{{$pipelineCnt}}][inclusions][{{$keyInc+1}}]" type="text"  value="{{$valueInc->title}}" required="">
                                                            </div> 
                                                            <div class="col-sm-2">
                                                                <a href="javascript:;" class="nhSubCloseCls removeAddAmebtn" data-id="{{$keyInc+1}}" >x</a>
                                                            </div> 
                                                        </div> 
                                                    <?php } ?>
                                                </div>
                                                <a href="javascript:;" class="addmorelnkProPipeline" data-id="{{$pipelineCnt}}">Add More</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="fl_w comman part_six">
                                        <div class="form-group">
                                            <div class="custom_full_control">
                                                <label>Gallery</label>
                                                <?php foreach ($value->getProductsExperienceImages as $keyImg => $valueImg) { ?>
                                                    <div class="image_galller">
                                                        <img src="{{ url("storage")}}/product_image/{{$valueImg->image}}">
                                                    </div>
                                                <?php } ?>
                                                <div class="brw_bx image_galller">
                                                    <div class="browse_btn">
                                                        <input type="file" name="product_pipeline[{{$pipelineCnt}}][images][]" multiple accept="image/*">
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
                                 <script>
                                    $(document).ready(function(){
                                        $('#example-square-com-{{$value->id}}').barrating('show', {
                                            theme: 'bars-square',
                                            showValues: true,
                                            showSelectedRating: true
                                        });
                                    });
                                </script>
                        <?php 
                        $pipelineCnt++;
                        } ?>
                    </div>
                    <div class="rightSidebarDiv">
                        <div class="sidebar_part_one">
                            <span class="scorelabel">Average Tour Score</span>
                            <span class="scoreperc scorepercLS">0%</span>
                            <input type="hidden" name="average_tour_score" value="" class="average_tour_score">
                        </div>
                        <div class="sidebar_part_two">
                            <label>Sections Completed</label>
                            <ul class="sectionsCompletedCls">
                                <li class="">VIP Experience</li>
                                <?php foreach ($productsExperienceList as $key => $value) { 
                                    $experienceTypes = $proType[$value->id];
                                    if($experienceTypes == '1'){
                                    $productScore = $value->getProductsExperienceScore->product_score;
                                    if($productScore > '74'){
                                        $colors = 'green';
                                    }else if($productScore > '49'){
                                        $colors = '#FCA311';
                                    }else if($productScore > '24'){
                                        $colors = 'black';
                                    }else{
                                        $colors = 'red';
                                    } ?>
                                        <div class="subSectionMainCls">
                                            <span class="grayCls">{{$value->name}}</span>
                                            <span class="ssmcscoreperc" style="color:{{$colors}}">{{$productScore}}%</span>
                                            <span class="grayBoldCls">&#163; {{$value->cost}} pp</span>
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                                <li class="">Big Banner</li>
                                <?php foreach ($productsExperienceList as $key => $value) { 
                                    $experienceTypes = $proType[$value->id];
                                    if($experienceTypes == '2'){
                                    $productScore = $value->getProductsExperienceScore->product_score;
                                    if($productScore > '74'){
                                        $colors = 'green';
                                    }else if($productScore > '49'){
                                        $colors = '#FCA311';
                                    }else if($productScore > '24'){
                                        $colors = 'black';
                                    }else{
                                        $colors = 'red';
                                    }  ?>
                                        <div class="subSectionMainCls">
                                            <span class="grayCls">{{$value->name}}</span>
                                            <span class="ssmcscoreperc" style="color:{{$colors}}">{{$productScore}}%</span>
                                            <span class="grayBoldCls">&#163; {{$value->cost}} pp</span>
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                                <li class="" >Local Experience</li>
                                <?php foreach ($productsExperienceList as $key => $value) { 
                                    $experienceTypes = $proType[$value->id];
                                    if($experienceTypes == '3'){ 
                                    $productScore = $value->getProductsExperienceScore->product_score;
                                    if($productScore > '74'){
                                        $colors = 'green';
                                    }else if($productScore > '49'){
                                        $colors = '#FCA311';
                                    }else if($productScore > '24'){
                                        $colors = 'black';
                                    }else{
                                        $colors = 'red';
                                    } ?>
                                        <div class="subSectionMainCls">
                                            <span class="grayCls">{{$value->name}}</span>
                                            <span class="ssmcscoreperc" style="color:{{$colors}}">{{$productScore}}%</span>
                                            <span class="grayBoldCls">&#163; {{$value->cost}} pp</span>
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                                <li class="">Map</li>
                                <li class="">Hotel</li>
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
                        {{-- <div class="expreSectionCls col-sm-12">
                            <div class="expSubTitleCls font17Cls">VIP Experience</div>
                            <div class="expSubTitle2Cls row">
                                <div class="expSubTextLeftCls font17Cls col-sm-8">
                                    The Silverstone Experience
                                </div>
                                <div class="expSubTextRightCls col-sm-4">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">&#163;</span>
                                        </div>
                                            <input type="number" class="form-control" aria-label="Amount (to the nearest dollar)">
                                        <div class="input-group-append">
                                            <span class="input-group-text">pp</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>       --}}
                       {{--  <div class="expreSectionCls col-sm-12">
                            <div class="expSubTitleCls font17Cls">VIP Experience</div>
                            <div class="expSubTitle2Cls row">
                                <div class="expSubTextLeftCls font17Cls col-sm-8">
                                    The Silverstone Experience
                                </div>
                                <div class="expSubTextRightCls col-sm-4">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">&#163;</span>
                                        </div>
                                            <input type="number" class="form-control" aria-label="Amount (to the nearest dollar)">
                                        <div class="input-group-append">
                                            <span class="input-group-text">pp</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>      --}}                 
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>
<script src="{{ asset('js/jquery.barrating.js') }}"></script>
<script src="{{ asset('js/pages/add_product_combine.js') }}"></script>