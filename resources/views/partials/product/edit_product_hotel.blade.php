<link href="{{ asset('css/style-products.css') }}" rel="stylesheet">
<link href="{{ asset('css/bars-square.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<style type="text/css" media="screen">
    .sidebar_part_two li:before{
        background: none;
    }    
    .part_one{
        margin-bottom: 10px;
    }
    hr{
        margin: 10px 0;
    }
    
    
</style>
<script>
    var base_url = "{{URL::to('/')}}";
</script>
<div class="middleCol completedBooking productsection" id="middleCol">
    {!! Form::open(array('route' => 'products-hotel-update','method'=>'POST', 'enctype' => 'multipart/form-data', 'class'=>'addProductHotelForm', 'id'=>'addProductHotelForm')) !!}
        <div class="row">
            <div class="header_part">
                
                <div class="head_part_two">
                    <a class="orangeLink btn pullright backBtnCls" href="{{ route('products-hotel') }}">Back</a>
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
                    <div class="contentDiv appendSectionDiv">
                        <div class="repetedContentDiv rCD1" data-id="1">
                            <div class="white_part">
                                <div class="titleSection">
                                    <div class="titleSecMain">
                                        Hotel
                                    </div>
                                    <div class="titleSecMain">
                                        Hotel Details and Gallery
                                    </div>
                                </div>
                                <div class="partOneCls">
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <div class=""> 
                                                    <label>Hotel Name *</label> 
                                                    <input class="form-control" name="product_hotel[name]" type="text"  value="{{$productHotelList->name}}" maxlength="255"> 
                                                    <input  name="product_hotel[id]" type="hidden"  value="{{$productHotelList->id}}"> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="custom_control costcontrol"> 
                                                <label>Cost</label>
                                                <input class="form-control" name="product_hotel[cost]" type="number" value="{{$productHotelList->cost}}" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                        </div>
                                    </div>

                                </div>
                                <div class="partOneCls">
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <div class=""> 
                                                    <label>Star Rating *</label> 
                                                    <select name="product_hotel[star_rating]" class="form-control star_rating " >
                                                        <option value="">Select One</option>
                                                        <?php for ($i=1; $i < 6; $i++) { ?>
                                                            <option value="{{$i}}" <?php echo $i == $productHotelList->star_rating?'selected':''?>>{{$i}} Star</option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="partOneCls">
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label>Hotel Location - Area *</label> 
                                                <select name="country_area_id" class="form-control country_area_id ">
                                                    <option value="">Select One</option>
                                                    @foreach ($countries as $k => $country)
                                                        <optgroup label="{{$country->name}}" data-max-options="2">
                                                        @foreach ($country->countryAreas as $kk => $countryArea)
                                                            <option value="{{$country->id}}-{{ $countryArea->id }}" <?php echo $countryArea->id == $productHotelList->country_area_id?'selected':''?>>
                                                                {{ $countryArea->name }}
                                                            </option>
                                                        @endforeach
                                                        </optgroup>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <label>Hotel Location - Town/City *</label>
                                            <input class="form-control" name="product_hotel[town_city]" type="text" value="{{$productHotelList->town_city}}" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="partOneCls">
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label>Hotel Brand</label> 
                                                <input class="form-control" name="product_hotel[brand]" type="text"  value="{{$productHotelList->brand}}" maxlength="255"> 
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <label>Hotel Owner</label>
                                            <input class="form-control" name="product_hotel[owner]" type="text" value="{{$productHotelList->owner}}" placeholder="" >
                                        </div>
                                    </div>
                                </div>
                                <div class="partOneCls">
                                    <div class="row">
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <label>Hotel Website URL *</label> 
                                                <input class="form-control" name="product_hotel[website_url]" type="text"  value="{{$productHotelList->website_url}}" maxlength="255"> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="partOneCls">
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label>Hotel Contact Number *</label> 
                                                <input class="form-control phoneNum" name="product_hotel[contact_number]" type="text"  value="{{$productHotelList->contact_number}}" maxlength="255"> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="partOneCls">
                                    <div class="row">
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <label>Sample Menu URL</label> 
                                                <input class="form-control" name="product_hotel[menu_url]" type="text"  value="{{$productHotelList->menu_url}}" maxlength="255"> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="partOneCls">
                                    <div class="row">
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <label>Hotel Location Link</label> 
                                                <input class="form-control" name="product_hotel[location_link]" type="text"  value="{{$productHotelList->location_link}}" maxlength="255"> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="partOneCls">
                                    <div class="row">
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <label>Booking.com URL</label> 
                                                <input class="form-control" name="product_hotel[booking_url]" type="text"  value="{{$productHotelList->booking_url}}" maxlength="255"> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="partOneCls">
                                    <div class="row">
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <label>TripAdvisor URL</label> 
                                                <input class="form-control" name="product_hotel[triadvisor_url]" type="text"  value="{{$productHotelList->triadvisor_url}}" maxlength="255"> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
 
                                <div class="fl_w comman part_six">
                                    <div class="form-group">
                                        <div class="custom_full_control"> <label>Gallery</label>
                                            <?php foreach ($productHotelList->getProductHotelImages as $keyImg => $valueImg) { ?>
                                                <div class="image_galller">
                                                    <img src="{{ url("storage")}}/product_image/{{$valueImg->name}}">
                                                </div>
                                            <?php } ?>
                                            <div class="brw_bx image_galller">
                                                <div class="browse_btn"> 
                                                    <input type="file" name="product_hotel_images[]" multiple="" accept="image/*">
                                                    <div class="brw_user_ic"> <i class="far fa-images"></i>
                                                        <div class="brw_plus"> <i class="fas fa-plus"></i> </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="partOneCls">
                                    <div class="row">
                                        <div class="col-sm-10">
                                            <div class="custom_full_control"> 
                                                <label>About</label>
                                                <textarea rows="7" name="product_hotel[about]" id="about">{{$productHotelList->about}}</textarea> 
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="titleSection clearBothCls">
                                    <div class="titleSecMain">Amenities and Reviews</div>
                                </div>
                                <div class="fl_w comman part_six"> 
                                    <input class="form-control section_inclusions_1" name="section_inclusions_1" type="hidden" value="1">
                                    <div class="form-group">
                                        <div class="custom_full_control"> <label>Amenities</label>
                                            <div class="customFullControlInclusionsCls1 cFCInclusionsCls amenitiesAndReviewsCls"> 
                                                <?php
                                                if(!empty($productHotelList->getProductHotelAmenities)){
                                                 foreach ($productHotelList->getProductHotelAmenities as $keyInc => $valueInc) { ?>
                                                    <div class="row ameEditDiv_{{$valueInc->id}}">
                                                        <div class="col-sm-10">
                                                            <input class="form-control" name="product_amenities_edit[{{$valueInc->id}}]" type="text"  value="{{$valueInc->name}}" id="product_amenities_edit_1_{{$keyInc+1}}"  required="">
                                                            
                                                            <input class="form-control" name="product_amenities_id_edit[{{$valueInc->id}}]" type="hidden"  value="{{$valueInc->id}}" required="">
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <a href="javascript:;" class="nhSubCloseCls removeAmebtn" data-id="{{$valueInc->id}}" >x</a>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                                <?php } else { ?>
                                                    <div class="row ameDiv_111">
                                                        <div class="col-sm-10">
                                                            <input class="form-control" name="product_amenities[1]" type="text" value="" id="inclusions_1_1" placeholder=""> 
                                                        </div> 
                                                        <div class="col-sm-2">
                                                            <a href="javascript:;" class="nhSubCloseCls removeAddAmebtn" data-id="111" >x</a>
                                                        </div> 
                                                    </div> 
                                                <?php } ?>
                                            </div> 
                                            <a href="javascript:;" class="addmorelnk" data-id="1">Add More</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="titleSection clearBothCls">
                                    <div class="titleSecMain">
                                        Upscales
                                    </div>
                                </div>
                                <div class="fl_w comman part_six"> 
                                    <div class="upscalesAppendCls">
                                        <?php
                                            if(!empty($productHotelList->getProductHotelUpscales)){
                                            foreach ($productHotelList->getProductHotelUpscales as $keyInc => $valueInc) { ?>
                                                <div class="partOneCls">
                                                    <div class="row">
                                                        <div class="col-sm-10">
                                                            <div class="form-group"> 
                                                                <label>Upscale title</label> 
                                                                <input class="form-control" name="upscales_edit[{{$valueInc->id}}][name]" type="text"  value="{{$valueInc->name}}" maxlength="255"> 
                                                                <input name="upscales_edit[{{$valueInc->id}}][id]" type="hidden"  value="{{$valueInc->id}}"> 
                                                            </div>
                                                        </div>
                                                    </div>    
                                                </div>    
                                                <div class="partOneCls">
                                                    <div class="row">
                                                        <div class="col-sm-10">
                                                            <div class="form-group">
                                                                <div class="custom_full_control"> 
                                                                    <label>Upscale short description</label>
                                                                    <textarea rows="7" name="upscales_edit[{{$valueInc->id}}][description]" id="description">{{$valueInc->description}}</textarea> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="partOneCls">
                                                    <div class="row">
                                                        <div class="col-sm-10">
                                                            <div class="form-group">
                                                                <label>Upscale Cost</label> 
                                                                <input class="form-control" name="upscales_edit[{{$valueInc->id}}][cost]" type="number"  value="{{$valueInc->cost}}" maxlength="255"> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="fl_w comman part_six">
                                                    <div class="form-group">
                                                        <div class="custom_full_control"> <label>Gallery</label>
                                                            <?php if(!empty($valueInc->image)) { ?>
                                                                <div class="image_galller">
                                                                    <img src="{{ url("storage")}}/product_image/{{$valueInc->image}}">
                                                                </div>
                                                            <?php } ?>
                                                            <div class="brw_bx image_galller">
                                                                <div class="browse_btn"> 
                                                                    <input type="file" name="upscales_edit[{{$valueInc->id}}][image]" accept="image/*">
                                                                    <div class="brw_user_ic"> <i class="far fa-images"></i>
                                                                        <div class="brw_plus"> <i class="fas fa-plus"></i> </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } 
                                              } else { ?>
                                                <div class="partOneCls">
                                                    <div class="row">
                                                        <div class="col-sm-10">
                                                            <div class="form-group"> 
                                                                <label>Upscale title</label> 
                                                                <input class="form-control" name="upscales[1][name]" type="text"  value="" maxlength="255"> 
                                                            </div>
                                                        </div>
                                                    </div>    
                                                </div>    
                                                <div class="partOneCls">
                                                    <div class="row">
                                                        <div class="col-sm-10">
                                                            <div class="form-group">
                                                                <div class="custom_full_control"> 
                                                                    <label>Upscale short description</label>
                                                                    <textarea rows="7" name="upscales[1][description]" id="description"></textarea> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="partOneCls">
                                                    <div class="row">
                                                        <div class="col-sm-10">
                                                            <div class="form-group">
                                                                <label>Upscale Cost</label> 
                                                                <input class="form-control" name="upscales[1][cost]" type="number"  value="" maxlength="255"> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="fl_w comman part_six">
                                                    <div class="form-group">
                                                        <div class="custom_full_control"> <label>Gallery</label>
                                                            <div class="brw_bx image_galller">
                                                                <div class="browse_btn"> 
                                                                    <input type="file" name="upscales[1][image]" accept="image/*">
                                                                    <div class="brw_user_ic"> <i class="far fa-images"></i>
                                                                        <div class="brw_plus"> <i class="fas fa-plus"></i> </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                              <?php } ?>
                                    </div>
                                    <input class="form-control upscales_1" name="upscales_1" type="hidden" value="1">
                                    <a href="javascript:;" class="addmoreUpscales" data-id="1">Add more upscales</a>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="rightSidebarDiv">
                        <div class="sidebar_part_one">
                            <span class="scorelabel">Product Score</span>
                            <span class="scoreperc scorePerCls">0%</span>
                            <input type="hidden" name="product_hotel[product_score]" class="productScore"  value="">
                            <input type="hidden" name="product_hotel[product_score_total]" class="productScoreTotal"  value="">
                        </div>
                        <div class="sidebar_part_two">
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <div class="custom_control"> 
                                            <label>RR / OptionRooms</label> 
                                            <input class="form-control" name="product_scroe[option_rooms]" type="text"  value="{{ isset($productHotelList->getProductHotelScore) ? $productHotelList->getProductHotelScore->option_rooms : ''}}" maxlength="255"> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="custom_control costcontrol"> 
                                        <label>Score</label>
                                        <select class="form-control slideSelectCls" name="product_scroe[option_rooms_value]">
                                            <option value=""></option>
                                            <option value="1" <?php echo isset($productHotelList->getProductHotelScore) && $productHotelList->getProductHotelScore->option_rooms_value == '1'?'selected':'' ?>>1</option>
                                            <option value="2" <?php echo isset($productHotelList->getProductHotelScore) && $productHotelList->getProductHotelScore->option_rooms_value == '2'?'selected':'' ?>>2</option>
                                            <option value="3" <?php echo isset($productHotelList->getProductHotelScore) && $productHotelList->getProductHotelScore->option_rooms_value == '3'?'selected':'' ?>>3</option>
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
                                            <label>Flexibility</label> 
                                            <input class="form-control" name="product_scroe[flexibility]" type="text"  value="{{isset($productHotelList->getProductHotelScore) ? $productHotelList->getProductHotelScore->flexibility : ''}}" maxlength="255"> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="custom_control costcontrol"> 
                                        <label>&nbsp;</label>
                                        <select class="form-control slideSelectCls" name="product_scroe[flexibility_value]">
                                            <option value=""></option>
                                            <option value="1" <?php echo isset($productHotelList->getProductHotelScore) && $productHotelList->getProductHotelScore->flexibility_value == '1'?'selected':'' ?>>1</option>
                                            <option value="2" <?php echo isset($productHotelList->getProductHotelScore) && $productHotelList->getProductHotelScore->flexibility_value == '2'?'selected':'' ?>>2</option>
                                            <option value="3" <?php echo isset($productHotelList->getProductHotelScore) && $productHotelList->getProductHotelScore->flexibility_value == '3'?'selected':'' ?>>3</option>
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
                                            <label>Tour Pack</label> 
                                            <input class="form-control" name="product_scroe[tour_pack]" type="text"  value="{{isset($productHotelList->getProductHotelScore) ? $productHotelList->getProductHotelScore->tour_pack : ''}}" maxlength="255"> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="custom_control costcontrol"> 
                                        <label>&nbsp;</label>
                                        <select class="form-control slideSelectCls" name="product_scroe[tour_pack_value]">
                                            <option value=""></option>
                                            <option value="1" <?php echo isset($productHotelList->getProductHotelScore) && $productHotelList->getProductHotelScore->tour_pack_value == '1'?'selected':'' ?>>1</option>
                                            <option value="2" <?php echo isset($productHotelList->getProductHotelScore) && $productHotelList->getProductHotelScore->tour_pack_value == '2'?'selected':'' ?>>2</option>
                                            <option value="3" <?php echo isset($productHotelList->getProductHotelScore) && $productHotelList->getProductHotelScore->tour_pack_value == '3'?'selected':'' ?>>3</option>
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
                                            <label>Problem Resolution</label> 
                                            <input class="form-control" name="product_scroe[problem_resolution]" type="text"  value="{{isset($productHotelList->getProductHotelScore) ? $productHotelList->getProductHotelScore->problem_resolution : ''}}" maxlength="255"> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="custom_control costcontrol"> 
                                        <label>&nbsp;</label>
                                        <select class="form-control slideSelectCls" name="product_scroe[problem_resolution_value]">
                                            <option value=""></option>
                                            <option value="1" <?php echo isset($productHotelList->getProductHotelScore) && $productHotelList->getProductHotelScore->problem_resolution_value == '1'?'selected':'' ?>>1</option>
                                            <option value="2" <?php echo isset($productHotelList->getProductHotelScore) && $productHotelList->getProductHotelScore->problem_resolution_value == '2'?'selected':'' ?>>2</option>
                                            <option value="3" <?php echo isset($productHotelList->getProductHotelScore) && $productHotelList->getProductHotelScore->problem_resolution_value == '3'?'selected':'' ?>>3</option>
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
                                            <label>Veenus Charter</label> 
                                            <input class="form-control" name="product_scroe[veenus_charter]" type="text"  value="{{isset($productHotelList->getProductHotelScore) ? $productHotelList->getProductHotelScore->veenus_charter : ''}}" maxlength="255"> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="custom_control costcontrol"> 
                                        <label>&nbsp;</label>
                                        <select class="form-control slideSelectCls" name="product_scroe[veenus_charter_value]">
                                            <option value=""></option>
                                            <option value="1" <?php echo isset($productHotelList->getProductHotelScore) && $productHotelList->getProductHotelScore->veenus_charter_value == '1'?'selected':'' ?>>1</option>
                                            <option value="2" <?php echo isset($productHotelList->getProductHotelScore) && $productHotelList->getProductHotelScore->veenus_charter_value == '2'?'selected':'' ?>>2</option>
                                            <option value="3" <?php echo isset($productHotelList->getProductHotelScore) && $productHotelList->getProductHotelScore->veenus_charter_value == '3'?'selected':'' ?>>3</option>
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
        <h5 class="modal-title" id="exampleModalLongTitle">Are you sure you want to remove this Amenities?</h5>
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
<script src="{{ asset('js/jquery.mask.min.js') }}"></script>
<script src="{{ asset('js/jquery.barrating.js') }}"></script>
<script src="{{ asset('js/pages/products_hotel.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>