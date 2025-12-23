<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">    
<link href="{{ asset('css/select2.css') }}" rel="stylesheet">
<link href="{{ asset('css/style-products.css') }}" rel="stylesheet">
<link href="{{ asset('css/bars-square.css') }}" rel="stylesheet">
<link href="{{ asset('css/dropzone.css') }}" rel="stylesheet">
<script>
    var base_url = "{{URL::to('/')}}";
</script>
<style>
    .sidebar_part_two li:before{
        background: none;
    }
</style>
<div class="middleCol completedBooking productsection" id="middleCol">
    <div class="">
        <?php 
        if(isset($experience)){ ?>
         {!! Form::open(array('route' => 'tour-cruise-update','method'=>'POST', 'enctype' => 'multipart/form-data', 'class'=>'tourCompleteSteps', 'id'=>'tourCompleteSteps')) !!}
        <?php } else{ ?>
         {!! Form::open(array('route' => 'tour-cruise-store','method'=>'POST', 'enctype' => 'multipart/form-data', 'class'=>'tourCompleteSteps', 'id'=>'tourCompleteSteps')) !!}
        <?php } ?>
        <div class="header_part">
            {{-- <div class="head_part_one">
                <label>Number</label>
                <span></span>
            </div> --}}
            <input type="hidden" name="experienceId" class="experienceId" value="{{@$experience->id}}">
            <input type="hidden" name="productId" class="productId" value="">
            <input type="hidden" name="tour_type" class="tour_type" value="1">
            <input type="hidden" name="tour_id" class="tour_id" value="{{$tour_id}}">

            <div class="selected_tour">
                    
                </div>
            <div class="head_part_two" style="width: 50%;">
                {{-- <a class="orangeLink btn pullright" href="javascript:;">Publish Live</a> --}}
                <a  style="font-size: 16px;" class="orangeLink btn pullright disabledCls" href="javascript:;">Cost Calculator</a>
                <?php if(!empty($experience->id) && ($experience->active == 1)){ ?>
                    <a style="font-size: 16px;" target="_blank" class="orangeLink btn pullright" href="{{ route('cruise.show', @$experience->id) }}">Preview</a>
                <?php } ?>
                <!-- <input type="submit" name="submit" value="Save and Preview" class="orangeLink btn pullright "> -->
                
                <textarea style="visibility: hidden;" value="" name="changed_note" id="changed_note"></textarea>
                <input type="hidden" value="" name="is_changed" id="is_changed">
                {{-- <input type="submit" name="submit" value="Publish Live" class="orangeLink btn pullright publishLiveBtn" disabled=""> --}}
                <input style="font-size: 16px;" type="submit" name="submit" value="Save" class="orangeLink btn pullright submitButton">
                <input style="font-size: 16px;" type="submit" name="submit" value="Save and Publish" class="orangeLink btn pullright submitButtonPublish">
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
            <div class="contentBooking experiencesMainSectionDiv">
                
                <input type="hidden" name="tourType" class="tourType" value="1">
                    <div class="contentDiv" style="max-height: 1060px; overflow: auto;">
                        <div class="tourStep_1 tourStepCls" style="display: block;">
                            @include('partials.tours.completed_cruise.tourStep_category_1',[
                                    'current_step' => '1'
                            ])                        
                        </div>
                        <div class="tourStep_2 tourStepCls" style="display: none;">
                            @include('partials.tours.completed_cruise.tourStep_bluebar_2',[
                                    'current_step' => '2'
                            ]) 
                        </div>
                        <div class="tourStep_3 tourStepCls" style="display: none">
                            @include('partials.tours.completed_cruise.tourStep_itinerary_3',[
                                    'current_step' => '3'
                            ]) 
                        </div>
                        <div class="tourStep_4 tourStepCls" style="display: none">
                            @include('partials.tours.completed_cruise.tourStep_ship_4',[
                                    'current_step' => '4'
                            ]) 
                        </div>
                        <div class="tourStep_5 tourStepCls" style="display: none">
                            @include('partials.tours.completed_cruise.tourStep_gallery_5',[
                                    'current_step' => '5'
                            ]) 
                        </div>
                        <div class="tourStep_6 tourStepCls" style="display: none;">
                            @include('partials.tours.completed_cruise.tourStep_map_6',[
                                    'current_step' => '6'
                            ]) 
                        </div>
                        <div class="tourStep_7 tourStepCls" style="display: none;">
                           @include('partials.tours.completed_cruise.tourStep_crossing_7',[
                                    'current_step' => '7'
                            ])
                        </div>
                        <div class="tourStep_8 tourStepCls" style="display: none;">
                           @include('partials.tours.completed_cruise.tourStep_layout1_8',[
                                    'current_step' => '8'
                            ])
                        </div>
                        <div class="tourStep_9 tourStepCls" style="display: none;">
                           
                        </div>
                        <div class="tourStep_10 tourStepCls" style="display: none;">
                           
                        </div>
                        <div class="tourStep_11 tourStepCls" style="display: none;">
                          
                        </div>
                    </div>
                    
                <div class="rightSidebarDiv">
                    @include('partials.tours.completed_cruise.tour_product_sidebar',[
                            'current_step' => '1'
                    ])                       
                </div>
                <div class="footerGroupBtn">
                    <a class="orangeLink btn marginTop15 clearBothCls float-left nextBtnCls" data-id="1" data-nextid="2" data-maxId="11" href="javascript:;">Next</a>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>
<script src="{{ asset('js/jquery.barrating.js') }}"></script>
<script src="{{ asset('js/jquery.mask.min.js') }}"></script>
<script src="{{ asset('js/select2.min.js') }}"></script>
<script src="{{ asset('js/dropzone.new.js') }}"></script>
<script src="{{ asset('js/pages/tour_cruise.js') }}"></script>
<script>
  
     $(document).on('click', '.addExpAttrNewBtn', function() {
        var mainVal = $(this).val();
        var expAttrNewRow = $('.expAttrNewRow').val();
        expAttrNewRow = parseInt(expAttrNewRow, 10);
        $('.expAttrNewRow').val(expAttrNewRow+1);
        var htmls = '';
        htmls += '<div class="row">\
                    <div class="col-sm-5">\
                        <div class="form-group">\
                            <label for="Location1">Location '+expAttrNewRow+'</label>\
                            <input type="text" name="step2[ExpAttrsInclusionName]['+expAttrNewRow+']" class="form-control valid" value="" required="" data-msg-required="This is required">\
                        </div>\
                    </div>\
                    <div class="col-sm-1">\
                        <div class="form-group">\
                            <label for="Location'+expAttrNewRow+'">&nbsp;</label>\
                            <a href="javascript:;" class="removeAttrExpCls redCls"><i class="fas fa-minus-circle"></i></a>\
                        </div>\
                    </div>\
                </div>';
        $('.appendExperiencesAttractionsNew').append(htmls);
        select2Load();             
    });
    $(document).on('click', '.addExpAttrBtn', function() {
        var mainVal = $(this).val();
        var expAttrRow = $('.expAttrRow').val();
        $('.expAttrRow').val(expAttrRow+1);
        var htmls = '';
        htmls += '<div class="row">\
                    <div class="col-sm-5">\
                        <div class="form-group">\
                            <label for="Location1d">Icon</label>\
                            <select class="form-control selectCls exprAttCls" id="ExpAttIcon-'+expAttrRow+'" data-type="1" data-id="'+expAttrRow+'" name="ExpAttrsIcon['+expAttrRow+']">\
                                <option value="">Select One</option>\
                                <?php 
                                foreach ($iconList as $key => $value) {
                                if($value->type == 1) { ?>\
                                    <option value="1" data-icon="{{$value->icon}}">{{$value->name}}</option>\
                                <?php } } ?>\
                            </select>\
                        </div>\
                    </div>\
                    <div class="col-sm-1">\
                        <div class="form-group text-center">\
                            <label for="Location'+expAttrRow+'d">&nbsp;</label>\
                            <div class="newAddedIconCls naic_1_'+expAttrRow+'">\
                            </div>\
                        </div>\
                    </div>\
                    <div class="col-sm-5">\
                        <div class="form-group">\
                            <label for="Location1">Inclusion name</label>\
                            <select class="form-control selectCls" id="ExpInclusion-'+expAttrRow+'" name="ExpAttrsInclusion['+expAttrRow+']">\
                                <option value="">Select One</option>\
                                <?php 
                                foreach ($inclusionList as $key => $value) { ?>\
                                    <option value="{{$value->id}}">{{$value->name}}</option>\
                                <?php  } ?>\
                            </select>\
                        </div>\
                    </div>\
                    <div class="col-sm-1">\
                        <div class="form-group">\
                            <label for="Location'+expAttrRow+'">&nbsp;</label>\
                            <a href="javascript:;" class="removeAttrExpCls redCls"><i class="fas fa-minus-circle"></i></a>\
                        </div>\
                    </div>\
                </div>';
        $('.appendExperiencesAttractions').append(htmls);
        select2Load();        
        experiencesValidation(expAttrRow);        
    });

    $(document).on('click', '.addExpAttrShipBtn', function() {
        var mainVal = $(this).val();
        var expAttrRow = $('.expAttrRow').val();
        $('.expAttrRow').val(expAttrRow+1);
        var htmls = '';
        htmls += '<div class="row">\
                    <div class="col-sm-5">\
                        <div class="form-group">\
                            <label for="Location1d">Icon</label>\
                            <select class="form-control selectCls exprAttCls" id="ExpAttShipIcon-'+expAttrRow+'"  data-type="2" data-id="'+expAttrRow+'" name="step2[ExpAttrsShip]['+expAttrRow+']">\
                                <option value="">Select One</option>\
                                <?php 
                                foreach ($iconList as $key => $value) {
                                /*if($value->type == 2) {*/ ?>\
                                    <option value="1" data-icon="{{$value->icon}}">{{$value->name}}</option>\
                                <?php /*}*/ } ?>\
                            </select>\
                        </div>\
                    </div>\
                    <div class="col-sm-1">\
                        <div class="form-group text-center">\
                            <label for="Location'+expAttrRow+'d">&nbsp;</label>\
                            <div class="newAddedIconCls naic_2_'+expAttrRow+'">\
                            </div>\
                        </div>\
                    </div>\
                    <div class="col-sm-5">\
                        <div class="form-group">\
                            <label for="Location1">Ship Detail Name</label>\
                            <select class="form-control selectCls inclusionAppend" id="ExpAttShipName-'+expAttrRow+'" name="step2[ExpAttrsShipInclusion]['+expAttrRow+']">\
                                <option value="">Select One</option>\
                                <?php 
                                foreach ($shipDetailList as $key => $value) { ?>\
                                    <option value="{{$value->id}}">{{$value->name}}</option>\
                                <?php  } ?>\
                            </select>\
                        </div>\
                    </div>\
                    <div class="col-sm-1">\
                        <div class="form-group">\
                            <label for="Location'+expAttrRow+'">&nbsp;</label>\
                            <a href="javascript:;" class="removeAttrExpCls redCls"><i class="fas fa-minus-circle"></i></a>\
                        </div>\
                    </div>\
                </div>';
        $('.appendExperiencesAttrShip').append(htmls);
        select2Load();     
        experiencesShipValidation(expAttrRow);   
    });

    $(document).on('click', '.addPerfect', function() {
        var expPerfectRow = $('.expPerfectRow').val();
        $('.expPerfectRow').val(expPerfectRow+1);
        var htmls = '';
        htmls += '<div class="row">\
                    <div class="col-sm-3">\
                        <div class="form-group">\
                            <label for="Category1">Icon</label>\
                            <select class="form-control selectCls" name="step3[icon]['+expPerfectRow+']" id="overviewIcon-'+expPerfectRow+'">\
                                <option value="">Select One</option>\
                                <?php 
                                foreach ($iconList as $key => $value) { ?>\
                                    <option value="1" data-icon="{{$value->icon}}">{{$value->name}}</option>\
                                <?php } ?>\
                            </select>\
                        </div>\
                    </div>\
                    <div class="col-sm-2">\
                        <div class="form-group">\
                            <label for="Category1">&nbsp;</label>\
                            <input name="step3[number]['+expPerfectRow+']" id="overviewNumber-'+expPerfectRow+'" class="form-control">\
                        </div>\
                    </div>\
                    <div class="col-sm-5">\
                        <div class="form-group">\
                            <label for="Category1">Name</label>\
                            <input name="step3[name]['+expPerfectRow+']" id="overviewName-'+expPerfectRow+'" class="form-control">\
                        </div>\
                    </div>\
                    <div class="col-sm-1">\
                        <div class="form-group">\
                            <label for="Location1">&nbsp;</label>\
                            <a href="javascript:;" class="removeAttrPerfectCls redCls"><i class="fas fa-minus-circle"></i></a>\
                        </div>\
                    </div>\
                </div>';
        $('.appendPerfect').append(htmls);
        select2Load();   
        perfectForStepValidation(expPerfectRow);       
    });
     $(document).on('click', '.add_gallary_img', function() {
       var dataid = $(this).attr('data-id');
        var htmls = '';
        var cnt = $(this).parent().prev('.add_more_upload').children('.image_galllernew').length;

        htmls += '<div class="col-md-3 image_galllernew">\
                    <div class="form-group">\
                        <label>Image description:</label><div class="deleteImage text-danger deleteGalleryImgNewtemp" ><i class="fa fa-trash" maxlength="100" aria-hidden="true"></i></div>\
                            <input type="text" name="step5[carouselnew]['+dataid+'][image_name][]" value="" class="form-control mb-2">\
                            <label>Order :</label> <input type="text" name="step5[carouselnew]['+dataid+'][image_order][]" class="form-control mb-2" maxlength="2" value="'+(parseInt(cnt)+1)+'">\
                        <input type="file" name="step5[carouselnew]['+dataid+'][image][]" class="form-control" >\
                    </div>\
                </div>';
        $(this).parent().prev('.add_more_upload').append(htmls);
       
    });
     $('#Location1').on('change',function(){
        var assign_river = $('option:selected', this).attr('data-river');
        
        var url = "/super-user/get-river-data?rivers="+assign_river;

            $.ajax({
                    type: "get",
                    url: url,
                   /* data: {
                            rivers:assign_river
                    },*/
                    success: function(html) {
                        $(".rivercls").html(html);
                    }
            });
     });
     //get ship data
      $(document).on('change', '.shipChange', function() {
        var ship_id = $(this).val();
        var hotelno = $(this).attr('data-hotel');
        var key = $(this).attr('data-key');
        var addto = $(this).closest('.append3VipExperiences').find('.cFCInclusionsCls');
        var addtoHtml2 = $(this).closest('.append3VipExperiences').find('.shipCabinDiv');
        $('.loader').show();    
        $.ajax({
            url: base_url+'/super-user/ship-on-change',
            type: 'POST',
             // dataType: 'json',
            data: {'ship_id':ship_id, 'hotelno':hotelno, 'key':key},
            success: function(data) {
                $('.loader').hide(); 
                addto.html(data.html); 
                
                addtoHtml2.html(data.html2); 
            },
            error: function(e) {
            }
        });
    });
     //Add more ship
     $(document).on('click', '.addHotelSection', function() {

        var hotalId = parseInt($(this).attr('data-id'),10);
        hotalId = hotalId+1
        parseInt($(this).attr('data-id', hotalId),10);
        var hotelSectionRow = parseInt($('.hotelSectionRow').val(),10);
        $('.hotelSectionRow').val(hotelSectionRow+1);
        var htmls = '';
        htmls += '<div class="hotelRowCls">\
                    <div class="flwSubTitleCls">\
                        <div class="row">\
                            <div class="col-sm-11 hotelCntCls">\
                            Ship '+hotalId+'\
                            </div>\
                            <div class="col-sm-1">\
                                <div class="form-group">\
                                    <a href="javascript:;" class="removeHotelDetailCls redCls" data-id=""><i class="fas fa-minus-circle"></i></a>\
                                </div>\
                            </div>\
                        </div>\
                    </div>\
                    <div class="partOneCls">\
                        <div class="append3VipExperiences">\
                            <div class="row">\
                                <div class="col-sm-12">\
                                    <div class="form-group">\
                                        <label for="Location1d">Ship</label>\
                                        <select class="selectCls form-control shipChange hotRating'+hotalId+'" name="step4['+hotalId+'][ship_id]" required="" data-msg-required="Please select ship" data-hotel="'+hotalId+'">\
                                            <option value="">Select One</option>\
                                            <?php 
                                            if(!empty($shipList)){
                                            foreach ($shipList as $key => $value) { ?>\
                                                <option value="{{$value->id}}">{{$value->name}}</option>\
                                            <?php } } ?>\
                                        </select>\
                                    </div>\
                                    <div class="cFCInclusionsCls">\
                                    </div>\
                                    <div class="shipCabinDiv">\
                                    </div>\
                                </div>\
                            </div>\
                        </div>\
                    </div>\
                </div>';
        $('.HotelAppendCls').append(htmls);
        dropZoneFileUpload('.dropzone_galleryGal'+hotalId);
        $('.auspCls'+hotalId).trigger('click');
        select2Load();
        previewImageFun();
        hotelSearchfunction();
        hotelCntSet();
    });
     $(document).ready(function(){
    var hotel_id = $('#brochureHotels').val();
    if(hotel_id != ''){
        brochureStar(hotel_id);
    }
});
$(document).on('change', '#brochureHotels', function() {
    var hotel_id = $(this).val();
    brochureStar(hotel_id);
});
function brochureStar(hotel_id){
    $('.loader').show();    
    $.ajax({
        url: base_url+'/super-user/get-brochure-ship',
        type: 'POST',
         dataType: 'json',
        data: {'hotel_id':hotel_id},
        success: function(data) {
            $('.loader').hide(); 
            $('#addStarsHere').html(data.html);
        },
        error: function(e) {
        }
    });
}
$(document).on('click', '.addIncluCls', function() {
    var idd = $(this).attr('data-id');
    var thisVal = $(this).closest('div').find('.inclusions_list');
    var htmls = '';
    htmls += '<li>\
                <i class="far fa-check-circle"></i>\
                <span class="insert">\
                    <div class="text">\
                        <input type="text" class="form-control" style="float:left;width:90%;" name="step9[inclusions][]">\
                        <a href="javascript:;" class="removeInclubtn" style="font-size: 30px;line-height: 35px;color: red;padding: 5px;">x</a>\
                    </div>\
                </span>\
            </li>';
    thisVal.append(htmls);
});

$(document).on('click', '.removeInclubtn', function() {
    $(this).closest('li').remove();
});

$(document).on('change', '#hotelsDropdown', function() {
    var hotel_id = $(this).val();
    $('.loader').show();    
    $.ajax({
        url: base_url+'/super-user/get-cruise-brochure-images',
        type: 'POST',
         dataType: 'json',
        data: {'hotel_id':hotel_id},
        success: function(data) {
            $('.loader').hide(); 
            $('#appdBrochueImages').html(data.html);
        },
        error: function(e) {
        }
    });
});
$(document).on('click', '.addImageBrochure1', function() {
    $('#brochureModal').addClass('addImageBrochure11'); 
    $('#brochureModal').modal('show'); 
});
$(document).on('click', '.addImageBrochure2', function() {
    $('#brochureModal').addClass('addImageBrochure22'); 
    $('#brochureModal').modal('show'); 
});
$(document).on('click', '.addImageBrochure3', function() {
    $('#brochureModal').addClass('addImageBrochure33'); 
    $('#brochureModal').modal('show'); 
});
$(document).on('click', '.addImgToBrochur', function() {
    if($(this).closest('#brochureModal').hasClass('addImageBrochure11')){
        $('#image_1').val($(this).attr('src'));
        $('.addImageBrochure1').html('<img src="'+$(this).attr('src')+'">');
    }else if($(this).closest('#brochureModal').hasClass('addImageBrochure22')){
        $('#image_2').val($(this).attr('src'));
        $('.addImageBrochure2').html('<img src="'+$(this).attr('src')+'">');
    }else if($(this).closest('#brochureModal').hasClass('addImageBrochure33')){
        $('#image_3').val($(this).attr('src'));
        $('.addImageBrochure3').html('<img src="'+$(this).attr('src')+'">');
    }
    $('#brochureModal').modal('hide'); 
    $('#brochureModal').removeClass('addImageBrochure11'); 
    $('#brochureModal').removeClass('addImageBrochure22'); 
    $('#brochureModal').removeClass('addImageBrochure33'); 
});
$(document).on('change', '#expDropdown', function() {
    var exp_id = $(this).val();
    $('.loader').show();    
    $.ajax({
        url: base_url+'/super-user/get-cruise-brochure-images',
        type: 'POST',
         dataType: 'json',
        data: {'exp_id':exp_id},
        success: function(data) {
            $('.loader').hide(); 
            $('#appdBrochueImages').html(data.html);
        },
        error: function(e) {
        }
    });
});
</script>
