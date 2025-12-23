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
    <!-- <a id="closePopup" href="javascript:;" style="float: right;color: red;font-size: 25px;">
        <i class="fas fa-times"></i>
    </a> -->
    <div class="heading">
        {{isset($experience->company_name) ? $experience->company_name : 'Mange Company '}}
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
            <ul class="nav nav-tabs">
              <li><a class="active" data-toggle="tab" href="#tab1">Company</a></li>
             <!--  <li><a data-toggle="tab" href="#tab2">Contracting Information</a></li> -->
             <!--  <li><a data-toggle="tab" href="#tab3">Experience Confirmation Template</a></li> -->
            </ul>

            <div class="tab-content" style="border: 1px solid #ddd;display: inline-block;border-top: 0px;width: 100%;padding-top: 10px;">
              <div id="tab1" class="tab-pane active">
                
                <?php if(!empty($companyList)){
                    foreach($companyList as $row){
                        ?>
                        <div class="box">
                            <div class="row">
                            <div class="col-md-8">
                                <label><b>General</b></label>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Company Name</label>
                                        <p>{{$row->company_name}}</p>
                                    </div>
                                    <div class="col-md-4">
                                        <label>General Email</label>
                                        <p>{{$row->general_email}}</p>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Phone Number</label>
                                        <p>{{$row->phone_number}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label><b>Address<b></label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Street</label>
                                        <p>{{$row->company_name}}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Town/city</label>
                                        <p>{{$row->general_email}}</p>
                                    </div>
                                    
                                </div>
                            </div>
                            </div>
                            <div class="row">
                            <div class="col-md-8">
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>About</label>
                                        <p>{{$row->about}}</p>
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="col-md-4">
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Postcode</label>
                                        <p>{{$row->postcode}}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Country</label>
                                        <p>{{$row->country}}</p>
                                    </div>
                                    
                                </div>
                            </div>
                            </div>
                        </div>
                        <?php
                    }
                } ?>

               
            </div>
         
         
            </div>
        </div>
       <!--  <input type="button" name="submit" class="btn btn-primary" id="compnayFormSubmit" value="Submit"> -->
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
