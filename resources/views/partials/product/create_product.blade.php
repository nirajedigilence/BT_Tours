<link href="{{ asset('css/style-products.css') }}" rel="stylesheet">
<link href="{{ asset('css/bars-square.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">    
<style type="text/css" media="screen">
    .sidebar_part_two li:before{
        background: none;
    }    
</style>
<script>
    var base_url = "{{URL::to('/')}}";
</script>
<div class="middleCol completedBooking productsection" id="middleCol">
    {!! Form::open(array('route' => 'products-store','method'=>'POST', 'enctype' => 'multipart/form-data', 'class'=>'addProductForm', 'id'=>'addProductForm')) !!}
    <input type="hidden" name="vipCnt" class="vipCnt" value="1">
    <input type="hidden" name="bbCnt" class="bbCnt" value="1">
    <input type="hidden" name="localCnt" class="localCnt" value="1">
    <input type="hidden" name="mapCnt" class="mapCnt" value="1">
    <input type="hidden" name="hotelCnt" class="hotelCnt" value="1">
        <div class="row">
            <div class="header_part">
                <div class="head_part_one">
                    <label>Number</label>
                    <span>{{$productNumberId}}</span>
                </div>
                <div class="head_part_two">
                    {{-- <a class="orangeLink btn pullright" href="javascript:;">Delete</a> --}}
                    {{-- <a class="orangeLink btn pullright" href="javascript:;">Save and Publish</a> --}}
                    {{-- <a class="orangeLink btn pullright" href="javascript:;">Save</a> --}}
                    <a class="orangeLink btn pullright backBtnCls" href="{{ route('products') }}">Back</a>
                    <input type="submit" name="submit" value="Save"class="orangeLink btn pullright">
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
                    <input type="hidden" name="is_prototype" value="{{$isPrototype}}" class="is_prototype">
                    <div class="contentDiv contentDivasda">
                       <div class="fl_w main_title" style="text-align:center;">
                            <h2><span class="proNameCls">New Product Name ...</span><input type="text" name="product_name" value="New Product Name ..." class="inputTitle productNameCls ele_hide">&nbsp;<a href="javascript:;" class="editTitle"><i class="fas fa-edit"></i></a></h2>
                        </div>
                        <div class="sidebar_part_three" style="width: 50%; padding:0" >
                            <label>Country Areas</label>
                            <select name="country_area_id" class="form-control country_area_id">
                                <option value="">Select One</option>
                                <?php if($isPrototype > 0){ ?>
                                    @foreach ($countries as $k => $country)
                                        <?php if($country->id == $prototypesList->country_id){ ?>
                                                <optgroup label="{{$country->name}}" data-max-options="2">
                                                @foreach ($country->countryAreas as $kk => $countryArea)
                                                    <option value="{{$country->id}}-{{ $countryArea->id }}" @if ( isset($countryArea->selected) && $countryArea->selected) selected @endif>
                                                        {{ $countryArea->name }}
                                                    </option>
                                                @endforeach
                                                </optgroup>
                                        <?php } ?>
                                    @endforeach
                                <?php }else{ ?>
                                    @foreach ($countries as $k => $country)
                                        <optgroup label="{{$country->name}}" data-max-options="2">
                                        @foreach ($country->countryAreas as $kk => $countryArea)
                                            <option value="{{$country->id}}-{{ $countryArea->id }}" @if ( isset($countryArea->selected) && $countryArea->selected) selected @endif>
                                                {{ $countryArea->name }}
                                            </option>
                                        @endforeach
                                        </optgroup>
                                    @endforeach

                                <?php } ?>
                            </select>
                        </div>
                        {{-- <div class="sidebar_part_three" style="width: 50%">
                            <label>Country Areas</label>
                            <select name="country_area_id" class="form-control country_area_id">
                                @foreach ($countries as $k => $country)
                                    <optgroup label="{{$country->name}}" data-max-options="2">
                                    @foreach ($country->countryAreas as $kk => $countryArea)
                                        <option value="{{ $countryArea->id }}" @if ( isset($countryArea->selected) && $countryArea->selected) selected @endif>
                                            {{ $countryArea->name }}
                                        </option>
                                    @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                        </div> --}}
                    </div>
                    <div class="contentDiv appendSectionDiv">
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
<script src="{{ asset('js/popper.min.js') }}"></script> 
<script src="{{ asset('js/bootstrap.min.js') }}"></script> 
<script src="{{ asset('js/jquery.barrating.js') }}"></script>
<script src="{{ asset('js/pages/add_products.js') }}"></script>