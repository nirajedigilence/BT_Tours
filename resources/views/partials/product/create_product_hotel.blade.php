<link href="{{ asset('css/style-products.css') }}" rel="stylesheet">
<link href="{{ asset('css/bars-square.css') }}" rel="stylesheet">
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
<div class="middleCol completedBooking productsection" id="middleCol">
    {!! Form::open(array('route' => 'products-hotel-store','method'=>'POST', 'enctype' => 'multipart/form-data', 'class'=>'addProductHotelForm', 'id'=>'addProductHotelForm')) !!}
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
                    <input type="hidden" name="is_prototype" value="" class="is_prototype">
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
                                                    <input class="form-control" name="product_hotel[name]" type="text"  value="" maxlength="255"> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="custom_control costcontrol"> 
                                                <label>Cost</label>
                                                <input class="form-control" name="product_hotel[cost]" type="number" value="" placeholder="">
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
                                                        <option value="1">1 Star</option>
                                                        <option value="2">2 Star</option>
                                                        <option value="3">3 Star</option>
                                                        <option value="4">4 Star</option>
                                                        <option value="5">5 Star</option>
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
                                                            <option value="{{$country->id}}-{{ $countryArea->id }}" @if ( isset($countryArea->selected) && $countryArea->selected) selected @endif>
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
                                            <input class="form-control" name="product_hotel[town_city]" type="text" value="" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="partOneCls">
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label>Hotel Brand</label> 
                                                <input class="form-control" name="product_hotel[brand]" type="text"  value="" maxlength="255"> 
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <label>Hotel Owner</label>
                                            <input class="form-control" name="product_hotel[owner]" type="text" value="" placeholder="" >
                                        </div>
                                    </div>
                                </div>
                                <div class="partOneCls">
                                    <div class="row">
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <label>Hotel Website URL *</label> 
                                                <input class="form-control" name="product_hotel[website_url]" type="text"  value="" maxlength="255"> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="partOneCls">
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label>Hotel Contact Number *</label> 
                                                <input class="form-control phoneNum" name="product_hotel[contact_number]" type="text"  value="" maxlength="255"> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="partOneCls">
                                    <div class="row">
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <label>Sample Menu URL</label> 
                                                <input class="form-control" name="product_hotel[menu_url]" type="text"  value="" maxlength="255"> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="partOneCls">
                                    <div class="row">
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <label>Hotel Location Link</label> 
                                                <input class="form-control" name="product_hotel[location_link]" type="text"  value="" maxlength="255"> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="partOneCls">
                                    <div class="row">
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <label>Booking.com URL</label> 
                                                <input class="form-control" name="product_hotel[booking_url]" type="text"  value="" maxlength="255"> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="partOneCls">
                                    <div class="row">
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <label>TripAdvisor URL</label> 
                                                <input class="form-control" name="product_hotel[triadvisor_url]" type="text"  value="" maxlength="255"> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
 
                                <div class="fl_w comman part_six">
                                    <div class="form-group">
                                        <div class="custom_full_control"> <label>Gallery</label>
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
                                                <textarea rows="4" name="product_hotel[about]" id="section_1_story"></textarea> 
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="titleSection clearBothCls">
                                    <div class="titleSecMain">
                                        Amenities and Reviews
                                    </div>
                                </div>
                                <div class="fl_w comman part_six"> 
                                    <input class="form-control section_inclusions_1" name="section_inclusions_1" type="hidden" value="1">
                                    <div class="form-group">
                                        <div class="custom_full_control"> <label>Amenities</label>
                                            <div class="customFullControlInclusionsCls1 cFCInclusionsCls amenitiesAndReviewsCls"> 
                                                <div class="row ameDiv_111">
                                                    <div class="col-sm-10">
                                                        <input class="form-control" name="product_amenities[1]" type="text" value="" id="inclusions_1_1" placeholder=""> 
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
                                <div class="titleSection clearBothCls">
                                    <div class="titleSecMain">
                                        Upscales
                                    </div>
                                </div>
                                <div class="fl_w comman part_six"> 
                                    <div class="upscalesAppendCls">
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
                                                            <textarea rows="4" name="upscales[1][description]" id="section_1_story"></textarea> 
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
                                            <input class="form-control" name="product_scroe[option_rooms]" type="text"  value="" maxlength="255"> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="custom_control costcontrol"> 
                                        <label>Score</label>
                                        <select class="form-control slideSelectCls" name="product_scroe[option_rooms_value]">
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
                                            <label>Flexibility</label> 
                                            <input class="form-control" name="product_scroe[flexibility]" type="text"  value="" maxlength="255"> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="custom_control costcontrol"> 
                                        <label>&nbsp;</label>
                                        <select class="form-control slideSelectCls" name="product_scroe[flexibility_value]">
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
                                            <label>Tour Pack</label> 
                                            <input class="form-control" name="product_scroe[tour_pack]" type="text"  value="" maxlength="255"> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="custom_control costcontrol"> 
                                        <label>&nbsp;</label>
                                        <select class="form-control slideSelectCls" name="product_scroe[tour_pack_value]">
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
                                            <label>Problem Resolution</label> 
                                            <input class="form-control" name="product_scroe[problem_resolution]" type="text"  value="" maxlength="255"> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="custom_control costcontrol"> 
                                        <label>&nbsp;</label>
                                        <select class="form-control slideSelectCls" name="product_scroe[problem_resolution_value]">
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
                                            <label>Veenus Charter</label> 
                                            <input class="form-control" name="product_scroe[veenus_charter]" type="text"  value="" maxlength="255"> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="custom_control costcontrol"> 
                                        <label>&nbsp;</label>
                                        <select class="form-control slideSelectCls" name="product_scroe[veenus_charter_value]">
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
<script src="{{ asset('js/jquery.mask.min.js') }}"></script>
<script src="{{ asset('js/jquery.barrating.js') }}"></script>
<script src="{{ asset('js/pages/products_hotel.js') }}"></script>