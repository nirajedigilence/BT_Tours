<style type="text/css">
    label {
         text-transform: unset; 
    }
    .highlight {
        width: 200px;
        height: 120px;
        border: 3px dashed #ddd;
        margin: 0 10px;
    }
    .database_edit_container .main .column .print_gallery .gallery .gallery__item:nth-child(n+4) {
        margin: 0 10px;
        margin-bottom: 10px;
    }
    .database_edit_container .main .column .print_gallery .gallery .gallery__item {
        margin-bottom: 10px;
    }
    .borderRed{
        border-color: red !important;
    }
</style>
<div class="popup_content">
    <a id="closePopup" href="javascript:;" style="float: right;color: red;font-size: 25px;">
        <i class="fas fa-times"></i>
    </a>
    <div class="heading">
        <?php if(isset($hotel->name)){ ?>
            {{$hotel->name}}
        <?php }else{ ?>
            New hotel entry
        <?php } ?>
    </div>

    <div class="description">
        <?php if(isset($hotel->name)){ ?>
            Here you can edit internal information about this hotel
        <?php }else{ ?>
            Here you can add a new hotel entry
        <?php } ?>
    </div>
    <form id="hotelData">
        <div class="sections">

            <div class="section w_100">

                <div class="sub_heading">
                    Hotel HoPS Information
                </div>

                <div class="form">
                    <input type="hidden" value="{{isset($hotel) ? $hotel->id : ''}}" name="hotel_id">

                    <div class="fieldset half">
                        <label>Hotel name <span style="color:red;">*</span></label>
                        <input type="text" id="hotelName" value="{{isset($hotel) ? $hotel->name : ''}}" name="name" required="">
                    </div>

                    <div class="fieldset half">
                        <label>Hotel location - area</label>
                        <select name="country_areas_id">
                            <option value=""></option>
                            @foreach ($countries as $k => $country)
                                <optgroup label="{{$country->name}}" data-max-options="1">
                                    @foreach ($country->countryAreas as $kk => $countryArea)
                                        <option value="{{ $countryArea->id }}" @if ( isset($countryArea->selected) && $countryArea->selected) selected @endif>
                                            {{ $countryArea->name }}
                                        </option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>
                    </div>

                    <div class="fieldset half">
                        <label>Hotel location - town/city</label>
                        <input type="text" value="{{isset($hotel) ? $hotel->hotel_city : ''}}" name="hotel_city">
                    </div>
                    <div class="fieldset half">
                        <label>Estimated cost (pppn)</label>
                        <input type="text" name="estimated_cost" onkeypress='validate(event)' value="{{isset($hotel) ? $hotel->estimated_cost : ''}}">
                    </div>
					 <div class="fieldset half">
                            <label>Distance from VIP ( In miles)</label>
                            <input type="text" onkeypress='validate(event)' name="distance_from_vip_miles" value="{{isset($hotel) ? $hotel->distance_from_vip_miles : ''}}">
                        </div>
                         <div class="fieldset half">
                            <label>Currency</label>
                             <select class="form-control" name="preferred_currency" id="preferred_currency">
                                <option value="1" <?=(!empty($hotel->preferred_currency) && $hotel->preferred_currency == '1')?'selected':''?>>£</option>
                                <option value="2" <?=(!empty($hotel->preferred_currency) && $hotel->preferred_currency == '2')?'selected':''?>>€</option>
                            </select>
                        </div>

                </div>

            </div>

            <div class="section w_50 gallery">

                <div class="sub_heading">
                    Website gallery
                </div>

                <p>
                    Pictures of hotel
                </p>

                <div class="database_edit_container" style="padding: 0;border: none;width: 100%;margin-bottom: 20px;">

                    <div class="main" style="width: 100%;">

                        <div class="column" style="width: 100%;margin: 0;">

                            <div class="print_gallery" style="border: none;padding: 0;">

                                <div id="files_list_images"></div>
                                <p id="loading"></p>
                                <input type="hidden" name="file_ids" id="file_ids" value="">
                                <ul class="gallery" id="imagesHolder">

                                </ul>

                            </div>

                        </div>

                    </div>

                </div>
                <div class="form-group" style="display: none;" id="imgDiv">
                    <label for="fileupload" class="control-label text-dark">Photos for this record (can add more than one):</label>
                    <input type="file" class="form-control" id="fileupload" name="photos[]" data-url="{{ route('upload.dbhotel.image') }}" multiple="">
                </div>
                <a href="javascript:;" class="add_image_cta" id="addimgbtn">
                    Add images
                </a>

            </div>
            <div class="section w_50 gallery">

                <div class="sub_heading">
                    Print Images
                </div>

                <p>
                    Pictures of hotel for download
                </p>

                <div class="database_edit_container" style="padding: 0;border: none;width: 100%;margin-bottom: 20px;">

                    <div class="main" style="width: 100%;">

                        <div class="column" style="width: 100%;margin: 0;">

                            <div class="print_gallery" style="border: none;padding: 0;">

                                <div id="files_list_images2"></div>
                                <p id="loading2"></p>
                                <input type="hidden" name="file_ids2" id="file_ids2" value="">
                                <ul class="gallery" id="imagesHolder2">

                                </ul>

                            </div>

                        </div>

                    </div>

                </div>
                <div class="form-group" style="display: none;" id="imgDiv2">
                    <label for="fileupload2" class="control-label text-dark">Images for this record (can add more than one):</label>
                    <input type="file" class="form-control" id="fileupload2" name="print_images[]" data-url="{{ route('upload.dbhotel.image2') }}" multiple="">
                </div>
                <a href="javascript:;" class="add_image_cta" id="addimgbtn2">
                    Add images
                </a>

            </div>
            <div class="section w_50">

                <div class="sub_heading">
                    Hotel information
                </div>
                <p>This section is needed to populate the information about the hotel when creating a tour</p>
                <div class="form">
                    
                    <div style="font-size: 16px;margin-top: 15px;margin-bottom: 15px;font-weight: 600;color: #000;">
                        General information
                    </div>

                    <div class="fieldset half">
                        <label>Star rating</label>
                        <select name="stars">
                            <option value="0"></option>
                            <option value="1" {{(isset($hotel) && $hotel->stars == 1) ? 'selected' : ''}}>1</option>
                            <option value="2" {{(isset($hotel) && $hotel->stars == 2) ? 'selected' : ''}}>2</option>
                            <option value="3" {{(isset($hotel) && $hotel->stars == 3) ? 'selected' : ''}}>3</option>
                            <option value="4" {{(isset($hotel) && $hotel->stars == 4) ? 'selected' : ''}}>4</option>
                            <option value="5" {{(isset($hotel) && $hotel->stars == 5) ? 'selected' : ''}}>5</option>
                        </select>
                    </div>

                    <div class="fieldset half">
                        <label>Hotel contact number (Main)</label>
                        <input type="text" name="phone" value="{{isset($hotel) ? $hotel->phone : ''}}">
                    </div>

                    <div class="fieldset half">
                        <label>Hotel location - town/city</label>
                        <input type="text" value="{{isset($hotel) ? $hotel->hotel_city : ''}}">
                    </div>
                    <div class="fieldset">
                        <label>Hotel description</label>
                        <textarea name="description" rows="5" id="h_description">{{isset($hotel) ? strip_tags($hotel->description) : ''}}</textarea>
                    </div>

                    <div style="font-size: 16px;margin-top: 15px;margin-bottom: 15px;font-weight: 600;color: #000;">
                        URL's
                    </div>
                    <div class="fieldset">
                        <label>Website url</label>
                        <input type="text" name="website" value="{{isset($hotel) ? $hotel->website : ''}}">
                    </div>
                    <div class="fieldset">
                        <label>TripAdvisor url</label>
                        <input type="text" name="triadvisor_url" value="{{isset($hotel) ? $hotel->triadvisor_url : ''}}">
                    </div>
                    <div class="fieldset">
                        <label>Booking.com url</label>
                        <input type="text" name="booking_url" value="{{isset($hotel) ? $hotel->booking_url : ''}}">
                    </div>
                    <div class="fieldset">
                        <label>Hotel location url</label>
                        <input type="text" name="location_link" value="{{isset($hotel) ? $hotel->location_link : ''}}">
                    </div>
                    <div style="font-size: 16px;margin-top: 15px;margin-bottom: 15px;font-weight: 600;color: #000;">
                        Hotel amenities
                    </div>
                    <div class="fieldset">
                        <label>Parking</label>
                        <input type="text" name="parking_amenity" value="{{isset($hotel) ? $hotel->parking_amenity : ''}}">
                    </div>
                    <div class="fieldset">
                        <label>Porterage</label>
                        <input type="text" name="porterage_amenity" value="{{isset($hotel) ? $hotel->porterage_amenity : ''}}">
                    </div>
                    <div class="fieldset">
                        <label>Lift access</label>
                        <input type="text" name="lift_access_amenity" value="{{isset($hotel) ? $hotel->lift_access_amenity : ''}}">
                    </div>
                    <div class="fieldset">
                        <label>Leisure</label>
                        <input type="text" name="leisure_amenity" value="{{isset($hotel) ? $hotel->leisure_amenity : ''}}">
                    </div>
                    <div class="fieldset">
                        <label>Amenity name</label>
                        <div class="list" id="appendAmenities">
                             <?php
                            if(isset($hotel) && !empty($hotel->hotel_amenities)){
                                $hotel_amenities = unserialize($hotel->hotel_amenities);
                                $count = count($hotel_amenities);
                                foreach ($hotel_amenities as $key => $value) {
                                    $style = '';
                                    if(($count == 1) && empty($value)){
                                        $style = 'style="display:none;"';
                                    }
                                    ?>
                                    <div class="list__item" <?php echo $style; ?>>
                                        <input name="hotel_amenities[]" value="<?php echo $value; ?>" type="text" placeholder="Enter amenity here...">
                                        <a href="javascript:;" class="remove_cta removeAmenity"><i class="far fa-times-circle"></i></a>
                                    </div>
                                    <?php
                                }
                            }else{
                            ?>
                                <div class="list__item">
                                    <input name="hotel_amenities[]" type="text" placeholder="Enter amenity here...">
                                    <a href="javascript:;" class="remove_cta removeAmenity" style="display: none;"><i class="far fa-times-circle"></i></a>
                                </div>
                            <?php } ?>
                        </div>
                        <a href="javascript:;" id="addAmenity" class="add_cta" style="color:orange;">
                            add amenity
                        </a>
                    </div>
                </div>

            </div>
            <div class="section w_50">

                <div class="sub_heading">
                    Additional database information
                </div>
                <p>This section is for additional data we might need gathered about hotel</p><br>
                <div class="form">
                    <div class="grouped">
                        <div class="fieldset half">
                            <label>Owner</label>
                            <input type="text" name="owner" value="{{isset($hotel) ? $hotel->owner : ''}}">
                        </div>

                        <div class="fieldset half">
                            <label>Brand</label>
                            <input type="text" name="brand" value="{{isset($hotel) ? $hotel->brand : ''}}">
                        </div>
                    </div>
                    <div class="grouped">
                         <div class="fieldset half">
                            <label>No of disabled bedrooms</label>
                            <input type="text" maxlength="100" name="disabled_bedrooms" value="{{isset($hotel) ? $hotel->disabled_bedrooms : ''}}">
                        </div>
                         <div class="fieldset half">
                            <label>No of bedrooms with walk in showers/wet rooms</label>
                            <input type="text" maxlength="100" name="bedrooms_with_walk" value="{{isset($hotel) ? $hotel->bedrooms_with_walk : ''}}">
                        </div>
                    </div>
                    <div class="grouped">
                         <div class="fieldset half">
                            <label>Main menu</label>
                              <input type="hidden" name="main_menu" id="main_menu" value="{{!empty($hotel->main_menu)?$hotel->main_menu:''}}">
                              <input type="file" class="form-control" id="main_menu_upload" name="main_menu_upload[]" accept=".jpg,.jpeg,.png,.docx,.pdf" data-url="{{ route('upload.dbhotel.main_menu') }}">
                              <div class="menu_main_div">
                            <?php if(!empty($hotel->main_menu)){ ?> 
                                <a href="/storage/{{$hotel->main_menu}}" target="_blank"> View main menu</a>
                                <a href="javascript:void(0)" class="remove_main_menu" style="color:red;">X</a>
                            <?php } ?>
                            </div>
                        </div>
                         <div class="fieldset half">
                            <label>Festive menu</label>
                            <input type="hidden" name="festive_menu" id="festive_menu" value="{{!empty($hotel->festive_menu)?$hotel->festive_menu:''}}">
                              <input type="file" class="form-control" id="festive_menu_upload" name="festive_menu_upload[]" accept=".jpg,.jpeg,.png,.docx,.pdf" data-url="{{ route('upload.dbhotel.festive_menu') }}">
                              <div class="menu_festive_div">
                            <?php if(!empty($hotel->festive_menu)){ ?> 
                                <a href="/storage/{{$hotel->festive_menu}}" target="_blank"> View Festive menu</a>
                                <a href="javascript:void(0)" class="remove_festive_menu" style="color:red;">X</a>
                            <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="grouped">
                         <div class="fieldset half">
                            <label>No of ground floor rooms</label>
                            <input type="text" maxlength="100" name="ground_floor_rooms" value="{{isset($hotel) ? $hotel->ground_floor_rooms : ''}}">
                        </div>
                    </div>
                    
                    <div style="font-size: 16px;margin-top: 15px;margin-bottom: 15px;font-weight: 600;color: #000;">
                        Hotel address
                    </div>
                    <!-- <div class="fieldset">
                        <label>Address</label>
                        <input type="text" name="address" value="{{isset($hotel) ? $hotel->address : ''}}">
                    </div> -->
                    <div class="fieldset">
                        <label>Street</label>
                        <input type="text" class="get_geocodes" name="street" value="{{isset($hotel) ? $hotel->street : ''}}">
                    </div>
                    <div class="fieldset">
                        <label>Town/city</label>
                        <input type="text" class="get_geocodes" name="city" value="{{isset($hotel) ? $hotel->city : ''}}">
                    </div>
                    <div class="fieldset">
                        <label>Postcode</label>
                        <input type="text" class="get_geocodes" name="postcode" value="{{isset($hotel) ? $hotel->postcode : ''}}">
                    </div>
                    <div class="fieldset">
                        <label>Country</label>
                        <input type="text" class="get_geocodes" name="country" value="{{isset($hotel) ? $hotel->country : ''}}">
                    </div>
                    <div class="fieldset">
                        <label>Latitude</label>
                        <input type="text" name="latitude" value="{{isset($hotel) ? $hotel->latitude : ''}}">
                    </div>
                    <div class="fieldset">
                        <label>Longitude</label>
                        <input type="text" name="longitude" value="{{isset($hotel) ? $hotel->longitude : ''}}">
                    </div>
                    <div style="font-size: 16px;margin-top: 15px;margin-bottom: 15px;font-weight: 600;color: #000;">
                        Hotel contact information
                    </div>
                    <div class="grouped">
                        <div class="fieldset">
                            <label>Name of main contact</label>
                            <input type="text" name="contact_name" value="{{isset($hotel) ? $hotel->contact_name : ''}}">
                        </div>
                        <div class="fieldset">
                            <label>Main contact position</label>
                            <input type="text" name="contact_position" value="{{isset($hotel) ? $hotel->contact_position : ''}}">
                        </div>
                    </div>
                    <div class="grouped">
                        <div class="fieldset">
                            <label>Main contact number</label>
                            <input type="text" name="main_contact_number" value="{{isset($hotel) ? $hotel->main_contact_number : ''}}">
                        </div>
                        <div class="fieldset">
                            <label>Direct contact number</label>
                            <input type="text" name="contact_number" value="{{isset($hotel) ? $hotel->contact_number : ''}}">
                        </div>
                    </div>
                    <div class="grouped">
                        <div class="fieldset">
                            <label>General email</label>
                            <input type="text" name="email" value="{{isset($hotel) ? $hotel->email : ''}}">
                        </div>
                    </div>
                    
                    <div style="font-size: 16px;margin-top: 15px;margin-bottom: 15px;font-weight: 600;color: #000;">
                        Other
                    </div>
                    <div class="fieldset">
                        <label>Gallery or virtual tour</label>
                        <input type="text" name="virtual_tour" value="{{isset($hotel) ? $hotel->virtual_tour : ''}}">
                    </div>
                    <div class="fieldset">
                        <label>House keeping</label>
                        <textarea type="text" name="house_keeping">{{isset($hotel) ? $hotel->house_keeping : ''}}</textarea>
                    </div>
                </div>

            </div>
            <div class="section w_100">
                <div class="sub_heading">
                    Hotel Confirmation Template Text
                </div>
                <div class="form">
                    
                    <div class="fieldset">
                        <label>Additional information</label>
                        <textarea name="ratesallocation" rows="7">{{ isset($hotel) ? strip_tags($hotel->ratesallocation) : '' }}</textarea>
                    </div>
                    <div class="fieldset">
                        <label>Meal arrangements</label>
                        <textarea name="mean_arrangements" rows="7">{{ isset($hotel) ? strip_tags($hotel->mean_arrangements) : '' }}</textarea>
                    </div>
                    <div class="fieldset">
                        <label>Free place</label>
                        <input type="text" name="free_place" value="{{isset($hotel) ? $hotel->free_place : ''}}">
                    </div>
                    <div class="fieldset">
                        <label>Inclusions</label>
                        <textarea name="inclusions" rows="3">{{ isset($hotel) ? strip_tags($hotel->inclusions) : '' }}</textarea>
                    </div>
                    <!-- <div class="fieldset">
                        <label>Additional services and facilities</label>
                        <textarea name="services_facilities" rows="10">{{isset($hotel) ? $hotel->services_facilities : ''}}</textarea>
                    </div> -->
                    <div class="fieldset">
                        <label>Services and Facilities</label>
                        <textarea name="services_facilities" rows="10">{{ isset($hotel) ? strip_tags($hotel->services_facilities) : '' }}</textarea>
                    </div>
                    <div class="fieldset">
                        <label>Terms and Conditions</label>
                        <textarea name="terms_conditions" rows="10">{{ isset($hotel) ? strip_tags($hotel->terms_conditions) : '' }}</textarea>
                    </div>
                </div>
            </div>

        </div>
        <input type="button" name="submit" class="btn btn-primary" id="hotelFormSubmit" value="Submit">
    </form>
</div>

<script src="{{ asset('js/jQuery-File-Upload/js/vendor/jquery.ui.widget.js') }}"></script>
<script src="{{ asset('js/jQuery-File-Upload/js/jquery.iframe-transport.js') }}"></script>
<script src="{{ asset('js/jQuery-File-Upload/js/jquery.fileupload.js') }}"></script>
<div class="modal" id="editImage">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Image</h4>
                    <button type="button" class="close" data-dismiss="modal" id="buttonCloseEventClient">×</button>
                </div>
                <div class="modal-body">
                    <p id="holderEditImage">

                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCrYs9n66w0Yh7bzhzRpWQCZ_QHavCZRow" defer=""></script>
<script type="text/javascript">
     $('.get_geocodes').change(function(){
        getLatLngByZipcode();
    });
    function getLatLngByZipcode() 
    {
    var geocoder = new google.maps.Geocoder();
    var address = $('#address').val();
    var street = $('#street').val();
    var city = $('#city').val();
    var postcode = $('#postcode').val();
    var country = $('#country').val();
    var full_address = address+','+street+','+city+','+postcode;
    var latitude = '';
    var longitude = '';
    geocoder.geocode({ 'address': full_address }, function (results, status) {
       
        if (status == google.maps.GeocoderStatus.OK) {
            var latitude = results[0].geometry.location.lat();
            var longitude = results[0].geometry.location.lng();
            $('#latitude').val(latitude);
            $('#longitude').val(longitude);
        } 
    });
    }
    $(document).ready(function(){
        // CKEDITOR.replace( 'h_description', {toolbar: [{ name: 'basicstyles', items: [ 'Bold', 'Italic'] },]
        // });
        // CKEDITOR.replace( 'mean_arrangements', {toolbar: [{ name: 'basicstyles', items: [ 'Bold', 'Italic'] },]
        // });
        // CKEDITOR.replace( 'free_place', {toolbar: [{ name: 'basicstyles', items: [ 'Bold', 'Italic'] },]
        // } );
        // CKEDITOR.replace( 'inclusions', {toolbar: [{ name: 'basicstyles', items: [ 'Bold', 'Italic'] },]
        // } );
        // CKEDITOR.replace( 'services_facilities', {toolbar: [{ name: 'basicstyles', items: [ 'Bold', 'Italic'] },]
        // } );
        // CKEDITOR.replace( 'terms_conditions', {toolbar: [{ name: 'basicstyles', items: [ 'Bold', 'Italic'] },]
        // } );
        getImages();
        $("#addimgbtn").bind("click", function () {
            $(this).hide();
            $("#imgDiv").show();
        });
        getImages2();
        $("#addimgbtn2").bind("click", function () {
            $(this).hide();
            $("#imgDiv2").show();
        });
    });
    function getImages(){
        @if (isset($hotel) && optional($hotel) && old('id', optional($hotel)->id))
        $('.loader').show();
        $.ajax({
            type: "GET",
            url: "{{route('get.dbhotel.images', optional($hotel)->id)}}",
            dataType: "json",
            success: function(response){
                var str = "";
                for( var i = 0; i < response.length; i++ ){
                    str += '<li class="gallery__item" name="'+response[i].id+'">';
                    str += '<div class="thumbnail">';
                    str += '<img src="{{ url("storage") }}/'+response[i].file+'" border="0" style="height: 100%;width: 100%;">';
                    str += '<div class="ctas" style="margin-left:-47px;background: #fff;">';
                    str += '<a href="javascript:;" class="cta editImage" data-toggle="modal" name="'+response[i].id+'">';
                    str += '<i class="fas fa-edit"></i>';    
                    str += '</a>';
                    str += '<a href="javascript:;" class="cta red dbdeleteImage" name="'+response[i].id+'">';
                    str += '<i class="far fa-times-circle"></i>';
                    str += '</a>';
                    str += '</div>';
                    str += '</div>';
                    str += '<div class="label">';
                    str += response[i].name;
                    str += '</div>';
                    str += '</li>';
                }

                $("#imagesHolder").html(str);
                $(".dbdeleteImage").bind("click", function(){
                    var id = $(this).attr("name");
                    deleteImage(id);
                });

                $(".editImage").bind("click", function(){
                    var id = $(this).attr("name");
                    editImage(id);
                });

                var target = $('#imagesHolder');

                target.sortable({
                    placeholder: 'highlight',
                    // axis: "x",
                    update: function (e, ui){
                        var sortData = target.sortable('toArray',{ attribute: 'name'});
                        updateImagesToDatabase(sortData.join(','));
                    }
                })
                $('.loader').hide();
            },
            error: function(er){
                console.log(er);
            }
        });

        @endif
    }
    function getImages2(){
        @if (isset($hotel) && optional($hotel) && old('id', optional($hotel)->id))
        $('.loader').show();
        $.ajax({
            type: "GET",
            url: "{{route('get.dbhotel.images2', optional($hotel)->id)}}",
            dataType: "json",
            success: function(response){
                var str = "";
                for( var i = 0; i < response.length; i++ ){
                    str += '<li class="gallery__item" name="'+response[i].id+'">';
                    str += '<div class="thumbnail">';
                    str += '<img src="{{ url("storage") }}/'+response[i].file+'" border="0" style="height: 100%;width: 100%;">';
                    str += '<div class="ctas" style="margin-left:-26px;background: #fff;">';
                    str += '<a href="javascript:;" class="cta red dbdeleteImage2" name="'+response[i].id+'">';
                    str += '<i class="far fa-times-circle"></i>';
                    str += '</a>';
                    str += '</div>';
                    str += '</div>';
                    str += '</li>';
                }

                $("#imagesHolder2").html(str);
                $(".dbdeleteImage2").bind("click", function(){
                    var id = $(this).attr("name");
                    deleteImage2(id);
                });

                var target = $('#imagesHolder2');

                target.sortable({
                    placeholder: 'highlight',
                    // axis: "x",
                    update: function (e, ui){
                        var sortData = target.sortable('toArray',{ attribute: 'name'});
                        updateImagesToDatabase2(sortData.join(','));
                    }
                })
                $('.loader').hide();
            },
            error: function(er){
                console.log(er);
            }
        });

        @endif
    }
    function updateImagesToDatabase(idString){
        $.ajaxSetup({ headers: {'X-CSRF-TOKEN': '{{csrf_token()}}'}});
        $('.loader').show();
        $.ajax({
            url:'{{route('update.dbhotel.images_order')}}',
            method:'POST',
            data:{ids:idString},
            success:function(){
                $('.loader').hide();
                //console.log(idString);
                // alert('Successfully updated');
                //do whatever after success
            },
            error: function(er){
                //console.log("err-1");
                //console.log(er);
            }
        })
    }
    function updateImagesToDatabase2(idString){
        $.ajaxSetup({ headers: {'X-CSRF-TOKEN': '{{csrf_token()}}'}});
        $('.loader').show();
        $.ajax({
            url:'{{route('update.dbhotel.images_order2')}}',
            method:'POST',
            data:{ids:idString},
            success:function(){
                $('.loader').hide();
                //console.log(idString);
                // alert('Successfully updated');
                //do whatever after success
            },
            error: function(er){
                //console.log("err-1");
                //console.log(er);
            }
        })
    }
    function deleteImage(id){
        $('.loader').show();
        $.ajax({
            type: "POST",
            url: "{{route('delete.dbhotel.image')}}",
            data: {
                "id": id,
                _token: '{{csrf_token()}}'
            },
            success: function(html){
                $('.loader').hide();
                getImages();
            }
        });
    }
    function deleteImage2(id){
        $('.loader').show();
        $.ajax({
            type: "POST",
            url: "{{route('delete.dbhotel.image2')}}",
            data: {
                "id": id,
                _token: '{{csrf_token()}}'
            },
            success: function(html){
                $('.loader').hide();
                getImages2();
            }
        });
    }
    function editImage(id){
        $('.loader').show();
        $.ajax({
            type: "POST",
            url: "{{route('edit.dbhotel.image')}}",
            data: {
                "id": id,
                _token: '{{csrf_token()}}'
            },
            dataType: "json",
            success: function(res){
                $('.loader').hide();
                $("#holderEditImage").html(res.html);
                $("#editImage").show();
            }
        });
    }
    $('#fileupload').fileupload({
        dataType: 'json',
        add: function (e, data) {
            $('#loading').text('Uploading...');
            //console.log(e);
            //console.log(data);
            //console.log("add before s");
            data.submit();
            //console.log("add after s");
        },
        done: function (e, data) {
            console.log("done");
            $.each(data.result.files, function (index, file) {
                $('<p/>').html(file.name + ' (' + file.size + ' KB)').appendTo($('#files_list_images'));
                if ($('#file_ids').val() != '') {
                    $('#file_ids').val($('#file_ids').val() + ',');
                }
                $('#file_ids').val($('#file_ids').val() + file.fileID);
            });
            $('#loading').text('');
        },
        error: function(er){
            console.log(er);
        }
    });
    $('#fileupload2').fileupload({
        dataType: 'json',
        add: function (e, data) {
            $('#loading2').text('Uploading...');
            //console.log(e);
            //console.log(data);
            //console.log("add before s");
            data.submit();
            //console.log("add after s");
        },
        done: function (e, data) {
            console.log("done");
            $.each(data.result.files, function (index, file) {
                $('<p/>').html(file.name + ' (' + file.size + ' KB)').appendTo($('#files_list_images2'));
                if ($('#file_ids2').val() != '') {
                    $('#file_ids2').val($('#file_ids2').val() + ',');
                }
                $('#file_ids2').val($('#file_ids2').val() + file.fileID);
            });
            $('#loading2').text('');
        },
        error: function(er){
            console.log(er);
        }
    });
</script>
<script type="text/javascript">
    function validate(evt) {
        var theEvent = evt || window.event;

        if (theEvent.type === 'paste') {
            key = event.clipboardData.getData('text/plain');
        } else {
            var key = theEvent.keyCode || theEvent.which;
            key = String.fromCharCode(key);
        }
        var regex = /[0-9]|\./;
        if( !regex.test(key) ) {
            theEvent.returnValue = false;
            if(theEvent.preventDefault) theEvent.preventDefault();
        }
    }
    $('#main_menu_upload').fileupload({
        dataType: 'json',
        add: function (e, data) {
            $('#loading').text('Uploading...');
            //console.log(e);
            //console.log(data);
            //console.log("add before s");
            data.submit();
            //console.log("add after s");
        },
        done: function (e, data) {
            console.log("done");
              $.each(data.result.files, function (index, file) {
               console.log(file.fileID);
                $('#main_menu').val(file.fileID);
                //$('<a href="/storage/'+file.fileID+'" target="_blank"> View main menu</a>').insertAfter("#main_menu_upload");
                $('.menu_main_div').html('<a href="/storage/'+file.fileID+'" target="_blank"> View main menu</a> <a href="javascript:void(0)" class="remove_main_menu" style="color:red;">X</a>');
                $('.remove_main_menu').on("click",function(){
                    if(confirm("Are you sure?"))
                    {
                        $('#main_menu').val('');
                        $('.menu_main_div').html('');
                    }
                    
                })
            });
            $('#loading').text('');
        },
        error: function(er){
            console.log(er);
        }
    });
    $('#festive_menu_upload').fileupload({
        dataType: 'json',
        add: function (e, data) {
            $('#loading').text('Uploading...');
            //console.log(e);
            //console.log(data);
            //console.log("add before s");
            data.submit();
            //console.log("add after s");
        },
        done: function (e, data) {
            console.log("done");
              $.each(data.result.files, function (index, file) {
               
                $('#festive_menu').val(file.fileID);
               
                $('.menu_festive_div').html('<a href="/storage/'+file.fileID+'" target="_blank"> View festive menu</a> <a href="javascript:void(0)" class="remove_festive_menu" style="color:red;">X</a>');
                 $('.remove_festive_menu').on("click",function(){
                    if(confirm("Are you sure?"))
                    {
                        $('#festive_menu').val('');
                        $('.menu_festive_div').html('');
                    }
                    
                })
                
            });
            $('#loading').text('');
        },
        error: function(er){
            console.log(er);
        }
    });
    $(document).ready(function(){
        $('.remove_festive_menu').on("click",function(){
            if(confirm("Are you sure?"))
            {
                $('#festive_menu').val('');
                $('.menu_festive_div').html('');
            }
            
        })
         $('.remove_main_menu').on("click",function(){
                if(confirm("Are you sure?"))
                {
                    $('#main_menu').val('');
                    $('.menu_main_div').html('');
                }
                
            })
    })
   
</script>