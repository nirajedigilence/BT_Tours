<style type="text/css">
    label {
         text-transform: unset; 
         font-weight: 600 !important;
    }
    .section.w_100.edit_company input,.section.w_100.edit_company textarea {
        border: none !important;

    }
     .section.w_100.edit_company input {
        pointer-events:none;

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
        {{isset($experience->company_name) ? $experience->company_name : 'Cruise Companies List'}}
        <input type="hidden" name="expCompanyRow" class="expCompanyRow" value="" >
    </div>

    <div class="description">
        <?php if(isset($experience)){ ?>
            Here you can create and edit cruise companies
        <?php }else{ ?>
            Here you can create and edit cruise companies
        <?php } ?>
    </div>
    <form id="expData" enctype="multipart/form-data">
        <div class="sections" style="display: inline-block;margin: 0px;">
           <!--  <ul class="nav nav-tabs">
              <li><a class="active" data-toggle="tab" href="#tab1">Company</a></li>
            
            </ul> -->

            <div class="tab-content" style="border: 1px solid #ddd;display: inline-block;border-top: 0px;width: 100%;padding-top: 10px;">
              <div id="tab1" class="tab-pane active">
                <div class="company_div">
                  <?php if(!empty($companyList)){
                    foreach($companyList as $value){
                        ?>
                    <div class="section w_100 edit_company" style="height:100%;float: left;">
                        <div class="form company_row">
                            <input type="hidden" value="{{isset($value) ? $value->id : ''}}" name="company_id" id="company_id">
                            <div class="section w_50" style="height:100%;float: left;">
                                <label style="color: #14213D;">General Information</label>
                                <div class="grouped">
                                    <div class="fieldset half">
                                        <label>Company name<!-- <span style="color:#F00">*</span> --></label>
                                        <input name="company_data[company][<?=$value->id?>][id]" class="form-control" value="{{ $value->id }}" type="hidden">
                                        <input type="text" required value="{{isset($value) ? $value->company_name : ''}}" name="company_data[company][<?=$value->id?>][company_name]" id="company_name">
                                        <p class="exp_error" style="display:none;color: red;">Please enter company name</p>
                                    </div>
                                    <div class="fieldset half">
                                        <label>General Email<!-- <span style="color:#F00">*</span> --></label>
                                        <input type="text" required value="{{isset($value) ? $value->general_email : ''}}" name="company_data[company][<?=$value->id?>][general_email]" id="general_email">
                                        <p class="exp_error" style="display:none;color: red;">Please enter company name</p>
                                    </div>
                                    <div class="fieldset half">
                                        <label>Phone number<!-- <span style="color:#F00">*</span> --></label>
                                        <input type="text" required value="{{isset($value) ? $value->phone_number : ''}}" name="company_data[company][<?=$value->id?>][phone_number]" id="phone_number">
                                        <p class="exp_error" style="display:none;color: red;">Please enter company name</p>
                                    </div>
                                </div>
                            </div>
                            <div class="section w_50" style="height:100%;float: left;">
                                <label style="color: #14213D;">Address</label>
                                <div class="grouped">
                                    
                                    <div class="fieldset half">
                                        <label>Street<!-- <span style="color:#F00">*</span> --></label>
                                        <input type="text" required value="{{isset($value) ? $value->street : ''}}" name="company_data[company][<?=$value->id?>][street]" id="street">
                                        <p class="exp_error" style="display:none;color: red;">Please enter company name</p>
                                    </div>
                                    <div class="fieldset half">
                                        <label>Town/City<!-- <span style="color:#F00">*</span> --></label>
                                        <input type="text" required value="{{isset($value) ? $value->town_city : ''}}" name="company_data[company][<?=$value->id?>][town_city]" id="town_city">
                                        <p class="exp_error" style="display:none;color: red;">Please enter company name</p>
                                    </div>
                                   
                                    </div>
                            </div>
                            <div class="section w_50" style="height:100%;float: left;">
                                <label><b>About</b></label>
                                <div class="grouped">
                                    <div class="fieldset">
                                       
                                        <textarea rows="5" required value="{{isset($value) ? $value->about : ''}}" name="company_data[company][<?=$value->id?>][about]" id="about">{{isset($value) ? $value->about : ''}}</textarea>
                                        <p class="exp_error" style="display:none;color: red;">Please enter company name</p>
                                    </div>
                                </div>
                            </div>
                            <div class="section w_50" style="height:100%;float: left;">                     
                                <div class="grouped">                               
                                    <div class="fieldset half">
                                        <label>Postcode<!-- <span style="color:#F00">*</span> --></label>
                                        <input type="text" required value="{{isset($value) ? $value->postcode : ''}}" name="company_data[company][<?=$value->id?>][postcode]" id="postcode">
                                        <p class="exp_error" style="display:none;color: red;">Please enter company name</p>
                                    </div>
                                    <div class="fieldset half">
                                        <label>Country<!-- <span style="color:#F00">*</span> --></label>
                                        <input type="text" required value="{{isset($value) ? $value->country : ''}}" name="company_data[company][<?=$value->id?>][country]" id="country">
                                        <p class="exp_error" style="display:none;color: red;">Please enter company name</p>
                                    </div>
                                </div>
                            </div>
                             <div class="section w_50" style="height:100%;float: left;">
                                <label><b>Status</b></label>
                                <div class="grouped">
                                    <div class="fieldset">
                                       
                                        Active : <input type="checkbox" class="" <?=!empty($value->active ) ?'checked' : ''?> value="1" name="company_data[company][<?=$value->id?>][active]" id="active">
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <div class="fieldset mt-3" style="float: left;width: 100%;margin-left: 10px;">
                                <button type="button" class="btn btn-primary btn-sm edit_company_div">Edit</button>
                        </div>
                    </div>
                   
                
                         <?php
                    }
                } ?>
                </div>
                <div class="fieldset mt-3 ml-3 mb-3">
                    

                    <input type="button" class="btn btn-primary btn-sm" value="Add" id="add_more_company">

                     
                    </div>
               
            </div>
          <div id="tab2" class="tab-pane">
            <h4>Not found!</h4>
          </div>
         
            </div>
        </div>
        <a id="closePopup" class="btn btn-primary mt-2" href="javascript:;" style="background-color: black !important;border-color: black !important;">
                        Close
                    </a>
        <input type="button" name="submit" class="btn btn-primary mt-2" id="compnayFormSubmit" value="Submit">
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
