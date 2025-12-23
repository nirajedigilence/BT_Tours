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
    .nav{padding-left:0;margin-bottom:0;list-style:none}.nav>li{position:relative;display:block}.nav>li>a{position:relative;display:block;padding:10px 15px}.nav>li>a:focus,.nav>li>a:hover{text-decoration:none;background-color:#eee}.nav>li.disabled>a{color:#777}.nav>li.disabled>a:focus,.nav>li.disabled>a:hover{color:#777;text-decoration:none;cursor:not-allowed;background-color:transparent}.nav .open>a,.nav .open>a:focus,.nav .open>a:hover{background-color:#eee;border-color:#337ab7}.nav .nav-divider{height:1px;margin:9px 0;overflow:hidden;background-color:#e5e5e5}.nav>li>a>img{max-width:none}.nav-tabs{border-bottom:1px solid #ddd}.nav-tabs>li{float:left;margin-bottom:-1px}.nav-tabs>li>a{margin-right:2px;line-height:1.42857143;border:1px solid transparent;border-radius:4px 4px 0 0}.nav-tabs>li>a:hover{border-color:#eee #eee #ddd}.nav-tabs>li.active>a,.nav-tabs>li.active>a:focus,.nav-tabs>li.active>a:hover{color:#555;cursor:default;background-color:#fff;border:1px solid #ddd;border-bottom-color:transparent}.nav-tabs.nav-justified{width:100%;border-bottom:0}.nav-tabs.nav-justified>li{float:none}.nav-tabs.nav-justified>li>a{margin-bottom:5px;text-align:center}.nav-tabs.nav-justified>.dropdown .dropdown-menu{top:auto;left:auto}@media (min-width:768px){.nav-tabs.nav-justified>li{display:table-cell;width:1%}.nav-tabs.nav-justified>li>a{margin-bottom:0}}.nav-tabs.nav-justified>li>a{margin-right:0;border-radius:4px}.nav-tabs.nav-justified>.active>a,.nav-tabs.nav-justified>.active>a:focus,.nav-tabs.nav-justified>.active>a:hover{border:1px solid #ddd}@media (min-width:768px){.nav-tabs.nav-justified>li>a{border-bottom:1px solid #ddd;border-radius:4px 4px 0 0}.nav-tabs.nav-justified>.active>a,.nav-tabs.nav-justified>.active>a:focus,.nav-tabs.nav-justified>.active>a:hover{border-bottom-color:#fff}}.nav-pills>li{float:left}.nav-pills>li>a{border-radius:4px}.nav-pills>li+li{margin-left:2px}.nav-pills>li.active>a,.nav-pills>li.active>a:focus,.nav-pills>li.active>a:hover{color:#fff;background-color:#337ab7}.nav-stacked>li{float:none}.nav-stacked>li+li{margin-top:2px;margin-left:0}.nav-justified{width:100%}.nav-justified>li{float:none}.nav-justified>li>a{margin-bottom:5px;text-align:center}.nav-justified>.dropdown .dropdown-menu{top:auto;left:auto}@media (min-width:768px){.nav-justified>li{display:table-cell;width:1%}.nav-justified>li>a{margin-bottom:0}}.nav-tabs-justified{border-bottom:0}.nav-tabs-justified>li>a{margin-right:0;border-radius:4px}.nav-tabs-justified>.active>a,.nav-tabs-justified>.active>a:focus,.nav-tabs-justified>.active>a:hover{border:1px solid #ddd}@media (min-width:768px){.nav-tabs-justified>li>a{border-bottom:1px solid #ddd;border-radius:4px 4px 0 0}.nav-tabs-justified>.active>a,.nav-tabs-justified>.active>a:focus,.nav-tabs-justified>.active>a:hover{border-bottom-color:#fff}}.tab-content>.tab-pane{display:none}.tab-content>.active{display:block}.nav-tabs .dropdown-menu{margin-top:-1px;border-top-left-radius:0;border-top-right-radius:0}
    .nav-tabs > li > a.active{
        color: #555;
        cursor: default;
        background-color: #fff;
        border: 1px solid #ddd;
        border-bottom-color: transparent;
    }
    .nav-tabs > li > a {
        font-size: 16px;
        font-weight: 600;
        color: #000;
    }
</style>
<div class="popup_content">
    <a id="closePopup" href="javascript:;" style="float: right;color: red;font-size: 25px;">
        <i class="fas fa-times"></i>
    </a>
    <div class="heading">
        {{isset($experience->name) ? $experience->name : 'Edit Profile'}}
    </div>

    <div class="description">
        <?php if(isset($experience)){ ?>
            Here you can edit the internal information about this cruise company
        <?php }else{ ?>
            Here you can add the internal information about this cruise company
        <?php } ?>
    </div>
    <form id="expData" enctype="multipart/form-data">
        <div class="sections" style="display: inline-block;margin: 0px;">
            <!-- <ul class="nav nav-tabs">
              <li><a class="active" data-toggle="tab" href="#tab1">General Information</a></li>
            
            </ul> -->

            <div class="tab-content" style="border: 1px solid #ddd;display: inline-block;border-top: 0px;width: 100%;padding-top: 10px;">
              <div id="tab1" class="tab-pane active">
                
                <div class="section w_50" style="height:100%;float: left;">

                   <!--  <div class="sub_heading">
                        Product pipeline (EPS) information
                    </div> -->
                    <div class="sub_heading">
                       General Information
                    </div>
                    <div class="form">
                        <input type="hidden" value="{{isset($experience) ? $experience->id : ''}}" name="ship_id">
                        <div class="fieldset half">
                                <label>Company<!-- <span style="color:#F00">*</span> --></label>
                                 <select name="company" id="select_company">
                                    <option value="">Select Company</option>
                                    @foreach ($company as $k => $company)
                                        <option value="{{ $company->id }}" @if ( isset($experience->company) && $experience->company == $company->id) selected @endif>
                                            {{ $company->company_name }}
                                        </option>
                                    @endforeach
                                </select>
                                <!-- <input type="text" required value="{{isset($experience) ? $experience->company : ''}}" name="company" id="company"> -->
                                <p class="exp_error" style="display:none;color: red;">Please enter company</p>
                            </div>
                        <div class="fieldset">
                            <label>About<!-- <span style="color:#F00">*</span> --></label>
                            <textarea name="description"id="description" required>{{ isset($experience) ? $experience->description : '' }}</textarea>
                            <p class="description_error" style="display:none;color: red;">Please enter description</p>
                        </div>
                        <div class="grouped">
                            
                            <div class="fieldset half">
                                <label>Main phone number<!-- <span style="color:#F00">*</span> --></label>
                                <input type="text" required value="{{isset($experience) ? $experience->phone : ''}}" name="phone" id="phone">
                                <p class="reason_error" style="display:none;color: red;">Please enter main phone number</p>
                            </div>
                             <div class="fieldset half">
                                <label>Address<!-- <span style="color:#F00">*</span> --></label>
                                <input type="text" required value="{{isset($experience) ? $experience->address : ''}}" name="address" id="address">
                                <p class="reason_error" style="display:none;color: red;">Please enter address</p>
                            </div>
                        </div>
                        <div class="grouped">
                            <div class="fieldset half">
                                <label>General email<!-- <span style="color:#F00">*</span> --></label>
                                <input type="text" required value="{{isset($experience) ? $experience->email : ''}}" name="email" id="email">
                                <p class="exp_error" style="display:none;color: red;">Please enter general email</p>
                            </div>
                            
                        </div>
                        

                    </div>

                </div>

                <div class="section w_50 gallery" style="float: left;">

                    <div class="sub_heading">
                        Images
                    </div>

                    <p>
                        Pictures of ships,this will be shown on the product experiences section and the product gallary
                    </p>
                    <div class="database_edit_container" style="padding: 0;border: none;width: 100%;margin-bottom: 20px;">

                        <div class="main" style="width: 100%;">

                            <div class="column" style="width: 100%;margin: 0;">

                                <div class="print_gallery" style="border: none;padding: 0;">

                                    <div id="files_list_images"></div>
                                    <p id="loading"></p>
                                    <input type="hidden" name="file_ids" id="file_ids" value="">
                                    <div class="gallery" id="imagesHolder">

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>
                    <div class="form-group" style="display: none;" id="imgDiv">
                        <label for="fileupload" class="control-label text-dark">Photos for this record (can add more than one):</label>
                        <input type="file" class="form-control" id="fileupload" name="photos[]" data-url="{{ route('upload.dbship.image') }}" multiple="">
                    </div>
                    <a href="javascript:;" class="add_image_cta" id="addimgbtn">
                        Add images
                    </a>

                </div>
                
                <div class="section w_100" style="float:left;">

                    <div class="sub_heading">
                        Ship Detail
                    </div>
                   
                    <div class="form">
                        
                      
                        <div class="section w_50" style="float:left;">
                            <div class="grouped">
                                <div class="fieldset half">
                                    <label>Ship name<!-- <span style="color:#F00">*</span> --></label>
                                    <input type="text" required value="{{isset($experience) ? $experience->name : ''}}" name="name" id="name">
                                    <p class="exp_error" style="display:none;color: red;">Please enter name</p>
                                </div>
                                <div class="fieldset half">
                                    <label>Star rating<!-- <span style="color:#F00">*</span> --></label>
                                     <select name="stars">
                                        <option value="0"></option>
                                        <option value="1" {{(isset($experience) && $experience->stars == 1) ? 'selected' : ''}}>1 Star</option>
                                        <option value="2" {{(isset($experience) && $experience->stars == 2) ? 'selected' : ''}}>2 Stars</option>
                                        <option value="3" {{(isset($experience) && $experience->stars == 3) ? 'selected' : ''}}>3 Stars</option>
                                        <option value="4" {{(isset($experience) && $experience->stars == 4) ? 'selected' : ''}}>4 Stars</option>
                                        <option value="5" {{(isset($experience) && $experience->stars == 5) ? 'selected' : ''}}>5 Stars</option>
                                    </select>
                                   
                                </div>
                            </div>
                            <div class="fieldset">
                                <label>About Text<!-- <span style="color:#F00">*</span> --></label>
                                <textarea name="about_text"id="about_text" required>{{ isset($experience) ? $experience->about_text : '' }}</textarea>
                                <p class="about_text_error" style="display:none;color: red;">Please enter about_text</p>
                            </div>
                            <div class="fieldset">
                                <label>On-board facilities</label>
                                <div class="list" id="appendInclusions">
                                    <?php
                                    if(isset($experience) && !empty($experience->cabin_types)){
                                        $cabin_types = unserialize($experience->cabin_types);
                                        $cabin_types_url = unserialize($experience->cabin_types_url);
                                        $count = count($cabin_types);
                                        foreach ($cabin_types as $key => $value) {
                                            ?>
                                            <div class="list__item">
                                                <input name="cabin_types[]" value="<?php echo $value; ?>" type="text" placeholder="Enter here...">
                                                <input class="ml-2" name="cabin_types_url[]" value="<?php echo !empty($cabin_types_url[$key])?$cabin_types_url[$key]:''; ?>" type="text" placeholder="Enter here url...">
                                                <a href="javascript:;" class="remove_cta removeInclusion" style="display: <?php echo ($count < 2) ? 'none' : 'block' ?>;"><i class="far fa-times-circle"></i></a>
                                            </div>
                                            <?php
                                        }
                                    }else{
                                    ?>
                                        <div class="list__item">
                                            <input name="cabin_types[]" type="text" placeholder="Enter here...">
                                            <input class="ml-2" name="cabin_types_url[]" value="" type="text" placeholder="Enter here url...">
                                            <a href="javascript:;" class="remove_cta removeInclusion" style="display: none;"><i class="far fa-times-circle"></i></a>
                                        </div>
                                    <?php } ?>
                                        
                                </div>
                                <a href="javascript:;" id="addInclusion" class="add_cta" style="color:orange;">
                                    Add more
                                </a>
                            </div>
                           
                        </div>
                        <div class="section w_50" style="float:left;">
                             <div class="fieldset ">
                                <label>Deck Plan<!-- <span style="color:#F00">*</span> --></label>
                                 <input type="hidden" name="deck_plan" id="deck_plan" value="{{!empty($sexperience->deck_plan)?$experience->deck_plan:''}}">
                                  <input type="file" <?=!empty($experience->deck_plan)?'style="display:none;"':''?> class="form-control" id="deck_plan_upload" name="deck_plan_upload[]" accept=".pdf" data-url="{{ route('upload.dbship.deck_plan') }}">
                                  <div class="deck_plan_div mt-2">
                                    <?php if(!empty($experience->deck_plan)){ ?> 
                                        <i style="font-size: 25px;" class="fa fa-file-pdf yellowClrCls"></i> {{str_replace('ship_images/','',$experience->deck_plan) }} <a href="/storage/{{$experience->deck_plan}}" target="_blank" class="ml-4 txt-orange"> view</a> <a href="javascript:void(0);" class="reupload ml-2 txt-orange">Re-upload</a>
                                    <?php } ?>
                                    </div>
                            </div>
                             <div class="grouped">
                                 <div class="fieldset half">
                                    <label>Main menu</label>
                                      <input type="hidden" name="main_menu" id="main_menu" value="{{!empty($experience->main_menu)?$experience->main_menu:''}}">
                                      <input type="file" class="form-control" id="main_menu_upload" name="main_menu_upload[]" accept=".jpg,.jpeg,.png,.docx,.pdf" data-url="{{ route('upload.dbship.main_menu') }}">
                                      <div class="menu_main_div">
                                    <?php if(!empty($experience->main_menu)){ ?> 
                                        <a href="/storage/{{$experience->main_menu}}" target="_blank"> View main menu</a>
                                        <a href="javascript:void(0)" class="remove_main_menu" style="color:red;">X</a>
                                    <?php } ?>
                                    </div>
                                </div>
                                 <div class="fieldset half">
                                    <label>Menu 2</label>
                                    <input type="hidden" name="festive_menu" id="festive_menu" value="{{!empty($experience->festive_menu)?$experience->festive_menu:''}}">
                                      <input type="file" class="form-control" id="festive_menu_upload" name="festive_menu_upload[]" accept=".jpg,.jpeg,.png,.docx,.pdf" data-url="{{ route('upload.dbship.festive_menu') }}">
                                      <div class="menu_festive_div">
                                    <?php if(!empty($experience->festive_menu)){ ?> 
                                        <a href="/storage/{{$experience->festive_menu}}" target="_blank"> Menu 2</a>
                                        <a href="javascript:void(0)" class="remove_festive_menu" style="color:red;">X</a>
                                    <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="grouped">
                                <div class="fieldset half">
                                    <label>Build<!-- <span style="color:#F00">*</span> --></label>
                                    <input type="text" maxlength="19" required value="{{isset($experience) ? $experience->built : ''}}" name="built" id="built">
                                    <p class="exp_error" style="display:none;color: red;">Please enter built</p>
                                </div>
                                 <div class="fieldset half">
                                    <label>Renovated<!-- <span style="color:#F00">*</span> --></label>
                                    <input type="text" maxlength="19" required value="{{isset($experience) ? $experience->commissioned : ''}}" name="commissioned" id="commissioned">
                                    <p class="exp_error" style="display:none;color: red;">Please enter commissioned</p>
                                </div>
                                <!-- <div class="fieldset half">
                                    <label>Refurbished</label>
                                    <input type="text" maxlength="19" required value="{{isset($experience) ? $experience->refurbished : ''}}" name="refurbished" id="refurbished">
                                    <p class="exp_error" style="display:none;color: red;">Please enter refurbished</p>
                                </div> -->
                                 <div class="fieldset half">
                                    <label>Cabins<!-- <span style="color:#F00">*</span> --></label>
                                    <input type="text" maxlength="19" required value="{{isset($experience) ? $experience->cabins : ''}}" name="cabins" id="cabins">
                                    <p class="exp_error" style="display:none;color: red;">Please enter cabins</p>
                                </div>
                                 <div class="fieldset half">
                                    <label>Passengers<!-- <span style="color:#F00">*</span> --></label>
                                    <input type="text" maxlength="19" required value="{{isset($experience) ? $experience->passengers : ''}}" name="passengers" id="passengers">
                                    <p class="exp_error" style="display:none;color: red;">Please enter passengers</p>
                                </div>
                                
                            </div>
                           
                            <div class="grouped">
                                <div class="fieldset half">
                                    <label>Crew</label>
                                    <input type="text" maxlength="19" required value="{{isset($experience) ? $experience->crew : ''}}" name="crew" id="crew">
                                    <p class="exp_error" style="display:none;color: red;">Please enter crew</p>
                                </div>
                                <div class="fieldset half">
                                    <label>Length</label>
                                    <input type="text" maxlength="19" required value="{{isset($experience) ? $experience->length : ''}}" name="length" id="length">
                                    <p class="exp_error" style="display:none;color: red;">Please enter length</p>
                                </div>
                                <div class="fieldset half">
                                    <label>Draught<!-- <span style="color:#F00">*</span> --></label>
                                    <input type="text" maxlength="19" required value="{{isset($experience) ? $experience->draft : ''}}" name="draft" id="draft">
                                    <p class="exp_error" style="display:none;color: red;">Please enter draft</p>
                                </div>
                                <div class="fieldset half">
                                    <label>Beam<!-- <span style="color:#F00">*</span> --></label>
                                    <input type="text" maxlength="19" required value="{{isset($experience) ? $experience->beam : ''}}" name="beam" id="beam">
                                    <p class="exp_error" style="display:none;color: red;">Please enter beam</p>
                                </div>
                                <!--  <div class="fieldset half">
                                    <label>Staff to guest ratio </label>
                                    <input type="text" required value="{{isset($experience) ? $experience->staff_to_guest : ''}}" name="staff_to_guest" id="staff_to_guest">
                                    <p class="exp_error" style="display:none;color: red;">Please enter staff to guest</p>
                                </div>
                               <div class="fieldset half">
                                    <label>Refurbished</label>
                                    <input type="text" required value="{{isset($experience) ? $experience->refurbished : ''}}" name="refurbished" id="refurbished">
                                    <p class="exp_error" style="display:none;color: red;">Please enter refurbished</p>
                                </div> -->
                                
                            </div>
                           <!--  <div class="fieldset half">
                                <label>Coach Parking</label>
                                <input type="text" required value="{{isset($experience) ? $experience->coach_parking : ''}}" name="coach_parking" id="coach_parking">
                                <p class="exp_error" style="display:none;color: red;">Please enter coach parking</p>
                            </div> -->
                            <div class="fieldset half">
                                <label>Gallery Link<!-- <span style="color:#F00">*</span> --></label>
                                <input type="text" required value="{{isset($experience) ? $experience->menu_link : ''}}" name="menu_link" id="menu_link">
                                <p class="exp_error" style="display:none;color: red;">Please enter coach parking</p>
                            </div>
                           
                        </div>

                    </div>

                </div>
                <div class="section w_100" style="float:left;">

                    <div class="sub_heading">
                        Cabins
                        <input type="hidden" name="expCabinRow" class="expCabinRow" value="" >
                    </div>
                   
                    <div class="form row cabin_div">
                        
                        <?php 
        if(isset($experience)){
            if(count($experience->shipCabins) >= 1){
                $cnts = '11565';
            foreach ($experience->shipCabins as $key => $value) { 
                 ?>
                 <div class="section col-md-5 cabinCnt">
                                <div class="fieldset half">
                                    <label>Cabin name</label>
                                    <input type="text" required value="{{ $value->name }}" name="step5[cabin][<?=$value->id?>][name]" >
                                    <input name="step5[cabin][<?=$value->id?>][id]" class="form-control" value="{{ $value->id }}" type="hidden">
                                    <p class="exp_error" style="display:none;color: red;">Please enter cabin_name</p>
                                </div>
                                <div class="fieldset">
                                <label>Description Text</label>
                                    <textarea name="step5[cabin][<?=$value->id?>][description]" required>{{ $value->description }}</textarea>
                                    <p class="about_text_error" style="display:none;color: red;">Please enter about_text</p>
                                </div>
                                <div class="fieldset">
                                    <label>Size</label>
                                    <input type="text"  value="{{ $value->size_bold }}" name="step5[cabin][<?=$value->id?>][size_bold]" >
                                    <p class="exp_error" style="display:none;color: red;">Please enter cabin size</p>
                                </div>
                                <div class="fieldset">
                                    <label>View</label>
                                    <input type="text" required value="{{ $value->view }}" name="step5[cabin][<?=$value->id?>][view]" >
                                    <p class="exp_error" style="display:none;color: red;">Please enter cabin view</p>
                                </div>
                                <div class="fieldset ">
                                    <label>Image</label>
                                     <?php if(isset($value->ShipCabinImages)){ ?>
                                        <div class="row">
                                    @foreach ($value->ShipCabinImages as $keyGI => $valueGI)
                                        <div class="col-md-3 image_galllernew">
                                        <div class="form-group">
                                            <img width="150" height="150" src="{{ url("storage")}}/{{$valueGI->images}}">
                                            <div class="deleteImage text-danger deleteItineraryImg" data-id="{{$valueGI->id}}"><i class="fa fa-trash" aria-hidden="true"></i></div>
                                        </div>
                                    </div>
                                    @endforeach
                                    </div>
                                <?php } ?>   
                                      <input type="file" multiple class="form-control" id="cabin_image_upload" name="step5[cabin][<?=$value->id?>][image][]" accept="image/*">
                                </div>
                                <div class="fieldset">
                                    <a href="javascript:void(0);" class="btn btn-sm btn-primary delete_cabin" style="background-color: black !important;border-color: black !important;">Delete Cabin</a>
                                </div>
                            </div>
                    <?php
            $cnts++;
            
         } } } ?>
                      
                        

                    </div>
                    <div class="fieldset ">
                    <input type="button" class="btn btn-primary" value="Add Cabin" id="add_cabin">
                    </div>
                </div>
               
            </div>
          <div id="tab2" class="tab-pane">
            <h4>Not found!</h4>
          </div>
         
            </div>
        </div>
        <input type="button" name="submit" class="btn btn-primary" id="expFormSubmit" value="Submit">
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
      $(".deleteImage").on("click", function(){
        if(confirm("Are you sure?"))
        {
             var id = $(this).attr("data-id");
                $.ajax({
                    type: "POST",
                    context: this,
                    url: "{{route('delete.cabin.image')}}",
                    data: {
                        "id": id,
                        _token: '{{csrf_token()}}'
                    },
                    success: function(html){
                        if(html == 1)
                        {
                            $(this).parent().parent().remove();
                        }
                        else
                        {
                            toastError('Something went wrong.');
                        }
                        
                    }
                });
        }
           
        });
    $('.reupload').click(function(){
        $('#deck_plan_upload').show();
    })
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
</script>
<script type="text/javascript">
    $(document).ready(function(){
        // var e_description = CKEDITOR.replace( 'e_description', {toolbar: [{ name: 'basicstyles', items: [ 'Bold', 'Italic'] },]
        // });
        // CKEDITOR.replace( 'confirm_description', {toolbar: [{ name: 'basicstyles', items: [ 'Bold', 'Italic'] },]
        // });
        // CKEDITOR.replace( 'free_place', {toolbar: [{ name: 'basicstyles', items: [ 'Bold', 'Italic'] },]
        // } );
        // CKEDITOR.replace( 'group_size', {toolbar: [{ name: 'basicstyles', items: [ 'Bold', 'Italic'] },]
        // } );
        // CKEDITOR.replace( 'mobility_access', {toolbar: [{ name: 'basicstyles', items: [ 'Bold', 'Italic'] },]
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
        @if (isset($experience) && optional($experience) && old('id', optional($experience)->id))
        $('.loader').show();
        $.ajax({
            type: "GET",
            url: "{{route('get.dbship.images', optional($experience)->id)}}",
            dataType: "json",
            success: function(response){
                var str = "";
                for( var i = 0; i < response.length; i++ ){
                    str += '<div class="gallery__item" name="'+response[i].id+'">';
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
                    str += '</div>';
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
        @if (isset($experience) && optional($experience) && old('id', optional($experience)->id))
        $('.loader').show();
        $.ajax({
            type: "GET",
            url: "{{route('get.dbexperience.images2', optional($experience)->id)}}",
            dataType: "json",
            success: function(response){
                var str = "";
                for( var i = 0; i < response.length; i++ ){
                    str += '<div class="gallery__item" name="'+response[i].id+'">';
                    str += '<div class="thumbnail">';
                    str += '<img src="{{ url("storage") }}/'+response[i].file+'" border="0" style="height: 100%;width: 100%;">';
                    str += '<div class="ctas" style="margin-left:-26px;background: #fff;">';
                    str += '<a href="javascript:;" class="cta red dbdeleteImage2" name="'+response[i].id+'">';
                    str += '<i class="far fa-times-circle"></i>';
                    str += '</a>';
                    str += '</div>';
                    str += '</div>';
                    str += '</div>';
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
            url:'{{route('update.dbexperience.images_order')}}',
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
            url:'{{route('update.dbexperience.images_order2')}}',
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
            url: "{{route('delete.dbexperience.image')}}",
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
            url: "{{route('delete.dbexperience.image2')}}",
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
            url: "{{route('edit.dbexperience.image')}}",
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
     $('#deck_plan_upload').fileupload({
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
               
                $('#deck_plan').val(file.fileID);
                var file = file.fileID;
                myString = file.replace('ship_images/','');
                 $('.deck_plan_div').html('<i style="font-size: 25px;" class="fa fa-file-pdf yellowClrCls"></i> '+myString+' <a href="/storage/'+file.fileID+'" target="_blank" class="txt-orange ml-4"> view</a>');
            });
            $('#loading').text('');
        },
        error: function(er){
            console.log(er);
        }
    });
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
               
                $('.menu_festive_div').html('<a href="/storage/'+file.fileID+'" target="_blank"> View menu 2</a> <a href="javascript:void(0)" class="remove_festive_menu" style="color:red;">X</a>');
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
     $(document).on('click', '#add_cabin', function() {
        var cnt_row = $('.expCabinRow').val();
        if(cnt_row == ''){cnt_row = 0;}
    var expCabinRow = parseInt(cnt_row,10);
    $('.expCabinRow').val(expCabinRow+1);
   var htmls='';
        htmls += '<div class="section col-md-5 cabinCnt">\
                                <div class="fieldset half">\
                                    <label>Cabin name</label>\
                                    <input type="text" required value="" name="step5[cabin]['+expCabinRow+'][name]" >\
                                    <p class="exp_error" style="display:none;color: red;">Please enter cabin_name</p>\
                                </div>\
                                <div class="fieldset">\
                                <label>Description Text</label>\
                                    <textarea name="step5[cabin]['+expCabinRow+'][description]" required></textarea>\
                                    <p class="about_text_error" style="display:none;color: red;">Please enter about_text</p>\
                                </div>\
                                <div class="fieldset">\
                                    <label>Size</label>\
                                    <input type="text"  value="" name="step5[cabin]['+expCabinRow+'][size_bold]" >\
                                    <p class="exp_error" style="display:none;color: red;">Please enter cabin size</p>\
                                </div>\
                                <div class="fieldset">\
                                    <label>View</label>\
                                    <input type="text" required value="" name="step5[cabin]['+expCabinRow+'][view]" >\
                                    <p class="exp_error" style="display:none;color: red;">Please enter cabin view</p>\
                                </div>\
                                <div class="fieldset ">\
                                    <label>Image</label>\
                                      <input type="file" multiple class="form-control" id="cabin_image_upload" name="step5[cabin]['+expCabinRow+'][image][]" accept="image/*">\
                                </div>\
                            </div>';
    $('.cabin_div').append(htmls);
    cabinsCntSet();
    
});
function cabinsCntSet(){
    var cnt = 1;
    $(".cabinCnt").each(function() {
        //$(this).html('Day '+cnt);
        console.log('Day '+cnt);
        cnt++;
    });
}
 $(document).on('click', '.delete_cabin', function() {
    if(confirm('Are you sure?')){
        $(this).closest('.cabin_div').remove();
        cabinsCntSet();
    }
    
}); 
$('#select_company').change(function(){
    var id = $(this).val();
    $.ajax({
        url: base_url+'/super-user/get-company-data/'+id,
        //url: base_url+'/super-user/edit-hc',
        type: 'GET',
        success: function(data) {
            
            if (data.company_detail != null) {
                
                $('#description').val(data.company_detail.about); 
                $('#phone').val(data.company_detail.phone_number); 
                $('#address').val(data.company_detail.street+ +data.company_detail.town_city+ +data.company_detail.postcode+ +data.company_detail.company); 
                $('#email').val(data.company_detail.general_email); 
               
                $('.loader').hide();  
            } else{
                $('.loader').hide();  
                return false;
            }
           // $('#HtlConfrmTplBody').html(data.html); 
           // $('#HtlConfrmTplBody').show(); 
        },
        error: function(e) {
        }
    });  
})  
</script>