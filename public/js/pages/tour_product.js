var userFormData = new FormData();    
function squareFunctionLoad(){
    $('.exampleSquareCls').barrating('show', {
        theme: 'bars-square',
        showValues: true,
        showSelectedRating: true
    });
}    
 $('#upload').bind("change", function(){
    var formData = $("#tourCompleteSteps");
    //loop for add $_FILES["upload"+i] to formData
    for (var i = 0, len = document.getElementById('upload').files.length; i < len; i++) {
        formData.append("upload"+(i+1), document.getElementById('upload').files[i]);
    }   
    // console.log(formData);
}); 

Dropzone.autoDiscover = false;
function dropZoneFileUpload(dropCls){
    $(dropCls).each(function() {
        var fileNewName = $(this).attr('data-name');
        var clsName = $(this).attr('data-cls');
        $(clsName).dropzone({
            maxFiles: 15,
            url: 'user/add',
            maxFilesize: 100,
            background: "#f7f7f7",
            autoProcessQueue: false,
            dictRemoveFile: '<div class="text-danger"><i class="fa fa-trash" aria-hidden="true"></i></div>',
            // dictDefaultMessage: 'Drag a file here or <span> browse </span> for a file to upload.',
            dictDefaultMessage: '<i class="far fa-images"></i><i class="fas fa-plus"></i>',
            paramName: "filessdasdasd",
            acceptedFiles: "image/*",
            uploadMultiple: true,
            addRemoveLinks: true,
            // previewTemplate: '',
            init: function() {
                this.on("removedfile", function(file) {
                    // userFormData.append("files[]", file);
                });
                this.on("addedfile", function(file) {
                    userFormData.append(fileNewName, file);
                });
            }
        });
    });
}

function dropZoneFileSingleUpload(dropCls){
    $(dropCls).each(function() {
        var fileNewName = $(this).attr('data-name');
        var clsName = $(this).attr('data-cls');
        $(clsName).dropzone({
            maxFiles: 1,
            url: 'user/add',
            maxFilesize: 100,
            background: "#f7f7f7",
            autoProcessQueue: false,
            dictRemoveFile: '<div class="text-danger"><i class="fa fa-trash" aria-hidden="true"></i></div>',
            // dictDefaultMessage: 'Drag a file here or <span> browse </span> for a file to upload.',
            dictDefaultMessage: '<i class="far fa-images"></i><i class="fas fa-plus"></i>',
            paramName: "filessdasdasd",
            acceptedFiles: "image/*",
            uploadMultiple: false,
            addRemoveLinks: true,
            // previewTemplate: '',
            init: function() {
                this.on("removedfile", function(file) {
                    // userFormData.append("files[]", file);
                });
                this.on("addedfile", function(file) {
                    userFormData.append(fileNewName, file);
                });
            }
        });
    });
}
$(document).ready(function(){   
    select2Load();
    dropZoneFileUpload('.dropzone_test');
    dropZoneFileSingleUpload('.dropzone_single');
    manageSideBarMenu();
    hotelCntSet();
    previewImageFun();
    hotelSearchfunction();
    squareFunctionLoad();
    $('.publishLiveBtn').addClass('disabledCls');
    $('.tagchkbox').trigger('change');
    $('.exprAttCls').trigger('change');
    $('.exprAttNewCls').trigger('change');
    $('#tourCompleteSteps').validate(addTourCompleteValidateOpt);
    // $('.phoneNum').mask('+00-0000-0000-00');
    $('.dateNum').mask('00/00/0000');
});
function manageSideBarMenu(){
    var currentStep = $('.nextBtnCls').attr('data-id');
    $('.tsubLiCls').removeClass('currentAct');
    $('.tsubLiCls').removeClass('doneSctionCls');
    currentStep = parseInt(currentStep, 10);
    if(currentStep == 1){
        $('.tslc_1').addClass('currentAct');
    }
    if(currentStep > 1){
        for (i = 1; i <= currentStep; i++) {
            $('.tslc_'+i).addClass('currentAct');
            if(i < currentStep){
                $('.tslc_'+i).addClass('doneSctionCls');
            }
        }
    }
}
$(document).on('click', '.tsubLiCls', function() {
     $('.tsubLiCls').removeClass('currentAct');
     $(this).addClass('currentAct');
});
$(document).on('change', '.tagchkbox', function() {
    // var val = [];
    var valTag = '';
    $('.tagchkbox:checkbox:checked').each(function(i){
        // val[i] = $(this).val();
        valTag += $(this).attr('data-val')+', ';
    });
    $('.extraTagsCls').val(valTag);
});

$(document).on('click', '.backArrowBtnCls', function() {
    var backStep = $(this).attr('data-back');
    var maxId = parseInt($('.nextBtnCls').attr('data-maxId'), 10);

    $(this).closest('.tourStepCls').hide();
    $('.tourStep_'+backStep).show();
    backStep = parseInt(backStep, 10);
    $('.nextBtnCls').attr('data-id',backStep);
    $('.nextBtnCls').attr('data-nextid', backStep+1);
    manageSideBarMenu();

    $('.nextBtnCls').show();
        // $('.publishLiveBtn').prop('disabled', false);
    $('.publishLiveBtn').prop('disabled', true);
    $('.publishLiveBtn').addClass('disabledCls');
    if(backStep+1 <= maxId){
        $('.publishLiveBtn').prop('disabled', false);
        $('.nextBtnCls').hide();
        $('.publishLiveBtn').removeClass('disabledCls');
    }else{

    }
});

$(document).on('click', '.nextBtnCls', function() {
    if (jQuery('#tourCompleteSteps').valid()) {
    	var curentId = parseInt($(this).attr('data-id'), 10);
    	var nextidId = parseInt($(this).attr('data-nextid'), 10);
        var maxId = parseInt($(this).attr('data-maxId'), 10);
        
        $(this).attr('data-id',curentId+1)
        $(this).attr('data-nextid',nextidId+1)
   	
    	$('.tourStep_'+curentId).hide();
    	$('.tourStep_'+nextidId).show();   
        select2Load();
        manageSideBarMenu();
        $(this).show();
            // $('.publishLiveBtn').prop('disabled', false);
        $('.publishLiveBtn').prop('disabled', true);
        $('.publishLiveBtn').addClass('disabledCls');
        if(maxId <= nextidId){
            $('.publishLiveBtn').prop('disabled', false);
            $(this).hide();
            $('.publishLiveBtn').removeClass('disabledCls');
        }
    }
});

function select2Load(){
	$('.selectCls').select2({
        minimumResultsForSearch: 0
            /*allowClear: true,*/
    });	
}


$(document).on('click', '.removeAttrExpCls', function() {
	$(this).closest('.row').remove();
});

$(document).on('click', '.removeAttrPerfectCls', function() {
	$(this).closest('.row').remove();
});

$(document).on('click', '.removeAmenitiesCls', function() {
	$(this).closest('.row').remove();
});

$(document).on('click', '.removeDayCls', function() {
	$(this).closest('.everyDayCls').remove();
	dayCntSet();
});

$(document).on('click', '.removeCabinCls', function() {
	$(this).closest('.everyDayCls').remove();
	cabinsCntSet();
});

$(document).on('click', '.removeDatesCls', function() {
    $(this).closest('.row').next('hr').remove();
    $(this).closest('.row').remove();
});

$(document).on('click', '.removeHotelDatesCls', function() {
    var thiss = $(this);
    var dataId = $(this).attr('data-id');
    if(dataId != '' && dataId != undefined){
        $('.loader').show();    
        $.ajax({
            url: base_url+'/super-user/delete-hotel-date-rate',
            type: 'POST',
             // dataType: 'json',
            data: {'experience_dates_id':dataId},
            success: function(data) {
                $('.loader').hide();    
                thiss.closest('.row').next('hr').remove();
                thiss.closest('.row').remove();
            },
            error: function(e) {
            }
        });
    }else{
        $(this).closest('.row').next('hr').remove();
        $(this).closest('.row').remove();
    }
});

$(document).on('click', '.removeCabinPricesCls', function() {
    $(this).closest('.row').next('hr').remove();
    $(this).closest('.row').remove();
});

$(document).on('change', '.exprAttCls', function() {
	var mainVal = $(this).val();
	var optionIcon = $('option:selected', this).attr('data-icon');
	var selectId = $(this).attr('data-id');
	var selectType = $(this).attr('data-type');
	if(mainVal != '0'){
		$('.naic_'+selectType+'_'+selectId).html(optionIcon);
	}else{
		$('.naic_'+selectType+'_'+selectId).html('');
	}
});

$(document).on('change', '.exprAttNewCls', function() {
    var mainVal = $(this).val();
    var optionIcon = $('option:selected', this).attr('data-icon');
    var selectId = $(this).attr('data-id');
    var selectType = $(this).attr('data-type');
    if(mainVal != '0'){
        $('.naicn_'+selectType+'_'+selectId).html(optionIcon);
    }else{
        $('.naicn_'+selectType+'_'+selectId).html('');
    }
});

$(document).on('click', '.addHighlightsBtn', function() {
	var expDayRow = $(this).attr('data-id');
    var highRow = parseInt($('.highRow'+expDayRow).val(),10);
    $('.highRow'+expDayRow).val(highRow+1);
    var htmls = '<div class="row">\
                    <div class="col-sm-11">\
                        <input name="step4[day][highlights]['+expDayRow+']['+highRow+']" id="highlights-'+expDayRow+'-'+highRow+'" class="form-control HighlightsTxtCls" required>\
                    </div>\
                    <div class="col-sm-1">\
                        <div class="col-sm-1">\
                            <label for="Location1">&nbsp;</label>\
                            <a href="javascript:;" class="removeAmenitiesCls redCls"><i class="fas fa-minus-circle"></i></a>\
                        </div>\
                    </div>\
                </div>';
    $('.HighlightsApppend_'+expDayRow).append(htmls);
    $('#highlights-'+expDayRow+'-'+highRow).rules('add', {
        required: true,
        messages: {
            required: "Please provide highlights"
        },
    });
});

$(document).on('click', '.addAmenitiesBtn', function() {
    var expdAmenitiesRow = parseInt($('.expdAmenitiesRow').val(),10);
    $('.expdAmenitiesRow').val(expdAmenitiesRow+1);
	var expDayRow = $(this).attr('data-id');
    var htmls = '<div class="row">\
                    <div class="col-sm-11">\
                        <input name="step5[ship][amenities]['+expdAmenitiesRow+']" class="form-control HighlightsTxtCls" id="amenities-'+expDayRow+'-'+expdAmenitiesRow+'" required>\
                    </div>\
                    <div class="col-sm-1">\
                        <div class="col-sm-1">\
                            <label for="Location1">&nbsp;</label>\
                            <a href="javascript:;" class="removeAmenitiesCls redCls"><i class="fas fa-minus-circle"></i></a>\
                        </div>\
                    </div>\
                </div>';
    $('.Amenities_'+expDayRow).append(htmls);
    $('#amenities-'+expDayRow+'-'+expdAmenitiesRow).rules('add', {
        required: true,
        messages: {
            required: "Please provide amenities"
        },
    });
});

$(document).on('click', '.addDayBtn', function() {
	var expDayRow = parseInt($('.expDayRow').val(),10);
    $('.expDayRow').val(expDayRow+1);
    var htmls = '';
    htmls += '<div class="everyDayCls">\
            <div class="flwSubTitleCls">\
                <div class="row">\
                    <div class="col-sm-11 dayCnt">\
                        Day '+expDayRow+'\
                    </div>\
                    <div class="col-sm-1">\
                        <label for="Location1">&nbsp;</label>\
                        <a href="javascript:;" class="removeDayCls redCls"><i class="fas fa-minus-circle"></i></a>\
                    </div>\
                </div>\
            </div>\
            <div class="partOneCls">\
                <div class="row">\
                    <div class="col-sm-12">\
                        <div class="form-group">\
                            <label for="Category1">Title</label>\
                            <input name="step4[day][title]['+expDayRow+']" id="step4Title'+expDayRow+'" class="form-control" >\
                        </div>\
                    </div>\
                    <div class="col-sm-12">\
                        <div class="form-group">\
                            <label for="Category1">Short Description</label>\
                            <textarea name="step4[day][description]['+expDayRow+']" id="step4Description'+expDayRow+'" class="form-control" rows="7"></textarea>\
                        </div>\
                    </div>\
                    <div class="col-sm-6">\
                        <div class="form-group">\
                            <label for="Category1">Departure Time</label>\
                            <input type="time" name="step4[day][departure_time]['+expDayRow+']" id="step4Departure'+expDayRow+'" class="form-control" >\
                        </div>\
                    </div>\
                    <div class="col-sm-6">\
                        <div class="form-group">\
                            <label for="Category1">Arrival Time</label>\
                            <input type="time" name="step4[day][arrival_time]['+expDayRow+']" id="step4Arrival'+expDayRow+'" class="form-control" >\
                        </div>\
                    </div>\
                </div>\
                <div class="imageGalllerAppend_214'+expDayRow+'"></div>\
                <div class="brw_bx image_galller">\
                    <div class="browse_btn">\
                        <input type="file" name="step4[day][images]['+expDayRow+'][]" multiple="" accept="image/*" class="filesCls" data-id="214'+expDayRow+'">\
                        <div class="brw_user_ic">\
                            <i class="far fa-images"></i>\
                            <div class="brw_plus">\
                                <i class="fas fa-plus"></i>\
                            </div>\
                        </div>\
                    </div>\
                </div>\
                <div class="clearfix"></div>\
                <div class="row">\
                    <div class="col-sm-6">\
                        <div class="form-group">\
                            <label for="Category1">Highlights</label>\
                            <div class="HighlightsApppend_'+expDayRow+'" >\
	                            <div class="row">\
                                    <div class="col-sm-11">\
                                        <input name="step4[day][highlights]['+expDayRow+'][1]" id="step4Highlights'+expDayRow+'" class="form-control HighlightsTxtCls" >\
                                    </div>\
                                    <div class="col-sm-1">\
                                        <div class="col-sm-1">\
                                            <label for="Location1">&nbsp;</label>\
                                            <a href="javascript:;" class="removeAmenitiesCls redCls"><i class="fas fa-minus-circle"></i></a>\
                                        </div>\
                                    </div>\
                                </div>\
	                        </div>\
                        </div>\
                    </div>\
                    <div class="col-sm-12">\
                        <input type="hidden" name="highRow'+expDayRow+'" class="highRow'+expDayRow+'" value="2">\
                        <div class="addmorelnk addHighlightsBtn" data-id="'+expDayRow+'">Add more</div>\
                    </div>\
                </div>\
            </div>\
        </div>';
        $('.expDayAppend').append(htmls);
        dayCntSet();
        dayStepValidation(expDayRow);
        previewImageFun();
});
dayCntSet();
$(document).on('click', '.addDatesBtn', function() {
    var expDatesRow = parseInt($('.expDatesRow').val(),10);
    $('.expDatesRow').val(expDatesRow+1);
    var htmls = '';
    htmls += '';
    $('.appendDates').append(htmls);
    dayCntSet();
});

$(document).on('click', '.addCabinBtn', function() {
	var expCabinRow = parseInt($('.expCabinRow').val(),10);
    $('.expCabinRow').val(expCabinRow+1);
    var htmls = '';
    htmls += '<div class="everycabinsCls">\
            <div class="flwSubTitleCls">\
                <div class="row">\
                    <div class="col-sm-11 cabinCnt">\
                        Cabin '+expCabinRow+'\
                    </div>\
                    <div class="col-sm-1">\
                        <label for="Location1">&nbsp;</label>\
                        <a href="javascript:;" class="removeCabinCls redCls"><i class="fas fa-minus-circle"></i></a>\
                    </div>\
                </div>\
            </div>\
            <div class="partOneCls">\
                <div class="row">\
                    <div class="col-sm-12">\
                        <div class="form-group">\
                            <label for="Category1">Cabin Name</label>\
                            <input type="text" name="step5[cabin]['+expCabinRow+'][name]" class="form-control">\
                        </div>\
                    </div>\
                    <div class="col-sm-12">\
                    <div class="imageGalllerAppend_551'+expCabinRow+'"></div>\
                        <div class="brw_bx image_galller">\
                            <div class="browse_btn">\
                                <input type="file" name="step5[cabin]['+expCabinRow+'][image][]" multiple="" accept="image/*" class="multiImgCls filesCls" data-id="551'+expCabinRow+'">\
                                <div class="brw_user_ic">\
                                    <i class="far fa-images"></i>\
                                    <div class="brw_plus">\
                                        <i class="fas fa-plus"></i>\
                                    </div>\
                                </div>\
                            </div>\
                        </div>\
                    </div>\
                    <div class="col-sm-12">\
                        <div class="form-group">\
                            <label for="Category1">Size (Bold)</label>\
                            <input type="text" name="step5[cabin]['+expCabinRow+'][size_bold]" class="form-control">\
                        </div>\
                    </div>\
                    <div class="col-sm-12">\
                        <div class="form-group">\
                            <label for="Category1">Size Text</label>\
                            <input type="text" name="step5[cabin]['+expCabinRow+'][size_text]" class="form-control">\
                        </div>\
                    </div>\
                    <div class="col-sm-12">\
                        <div class="form-group">\
                            <label for="Category1">Description</label>\
                            <textarea  name="step5[cabin]['+expCabinRow+'][description]" class="form-control" rows="7"></textarea>\
                        </div>\
                    </div>\
                    <div class="col-sm-12">\
                        <div class="form-group">\
                            <label for="Category1">View</label>\
                            <input type="text" name="step5[cabin]['+expCabinRow+'][view]" class="form-control">\
                        </div>\
                    </div>\
                </div>\
            </div>\
        </div>';
    $('.cabinsAppend').append(htmls);
    cabinsCntSet();
    previewImageFun();
});

$(document).on('click', '.removeCarouselCls', function() {
    $(this).closest('.everyCarouselCls').remove();
    carouseCntSet();
});
$(document).on('click', '.removeCarouselClsNew', function() {
    if(confirm('Are you sure?')){
        $(this).closest('.carousel_div').remove();
        carouseCntSetNew();
    }
    
});
$(document).on('click', '.addAdditionalTextBtn', function() {
    var expAdditionalTextRow = parseInt($('.expAdditionalTextRow').val(),10);
    $('.expAdditionalTextRow').val(expAdditionalTextRow+1);
    var htmls = '';
    htmls += '<div class="row">\
                <div class="col-sm-11">\
                    <div class="form-group">\
                        <label for="Category1">Additional Subtitle</label>\
                        <input name="step8[additional]['+expAdditionalTextRow+'][subtitle]" id="addSubtitle-'+expAdditionalTextRow+'" class="form-control">\
                    </div>\
                </div>\
                <div class="col-sm-1">\
                    <div class="form-group">\
                        <label for="Location1">&nbsp;</label>\
                        <a href="javascript:;" class="removeCabinPricesCls redCls"><i class="fas fa-minus-circle"></i></a>\
                    </div>\
                </div>\
                <div class="col-sm-12">\
                    <div class="form-group">\
                        <label for="Category1">Additional Text</label>\
                        <textarea name="step8[additional]['+expAdditionalTextRow+'][text]" class="form-control" rows="7" id="addText-'+expAdditionalTextRow+'"></textarea>\
                    </div>\
                </div>\
            </div><hr>';
    $('.appendAdditionalText').append(htmls);
    $('#addSubtitle-'+expAdditionalTextRow).rules('add', {
        required: true,
        messages: {
            required: "Please provide title"
        },
    });
    $('#addText-'+expAdditionalTextRow).rules('add', {
        required: true,
        messages: {
            required: "Please provide text"
        },
    });
});
/* <div class="col-sm-12">\
                        <div class="row">\
                            <div class="col-sm-11 carouselCntNew">\
                                Gallery 1\
                            </div>\
                            <div class="col-sm-1">\
                                <label for="Location1"><a href="javascript:;" class="removeCarouselClsNew redCls"><i class="fas fa-minus-circle"></i></a></label>\
                            </div>\
                        </div>\
                </div>\*/
$(document).on('click', '.addCarouselBtnNew', function() {
    var expCarouselRowNew = parseInt($('.expCarouselRowNew').val(),10);
    $('.expCarouselRowNew').val(expCarouselRowNew+1);
    var htmls = '';
    htmls += '<div class="carousel_div">\
                <div class="col-sm-12">\
                        <div class="row">\
                            <div class="col-sm-11 carouselCntNew">\
                                Gallery '+expCarouselRowNew+'\
                            </div>\
                            <div class="col-sm-1">\
                                <label for="Location1"><a href="javascript:;" class="removeCarouselClsNew redCls"><i class="fas fa-minus-circle"></i></a></label>\
                            </div>\
                        </div>\
                </div>\
                <div class="col-sm-12">\
                    <div class="form-group">\
                        <label for="Category1">Gallery Name</label>\
                        <input name="step6[carouselnew]['+expCarouselRowNew+'][title]" id="step6Carousel-'+expCarouselRowNew+'" class="form-control" >\
                    </div>\
                </div>\
                <div class="col-sm-12 gallary_img_div">\
                    \
                </div>\
                <div class="col-sm-12">\
                    <div class="add_more_upload row">\
                        <div class="col-md-3 image_galllernew">\
                            <div class="form-group">\
                                <label>Image description:</label>\
                                <input type="text" maxlength="100" name="step6[carouselnew]['+expCarouselRowNew+'][image_name][]" value="" class="form-control mb-2">\
                                <label>Image Order:</label>\<input type="text" maxlength="100" name="step6[carouselnew]['+expCarouselRowNew+'][image_order][]" value="" class="form-control mb-2">\
                                <input type="file" name="step6[carouselnew]['+expCarouselRowNew+'][image][]" class="form-control" >\
                            </div>\
                        </div>\
                    </div>\
                    <div class="col-sm-12">\
                        <input type="button" value="Add Image" name="add_gallary_img" data-id="'+expCarouselRowNew+'" class="add_gallary_img btn btn-sm btn-primary">\
                    </div>\
                </div>\
            </div>';
    $('.carousel_main_div').append(htmls);
    carouseCntSetNew();
    /*<div class="brw_bx image_galller">\
        <div class="browse_btn">\
            <input type="file" class="filesCls" name="step6[carousel]['+expCarouselRow+'][image][]" data-id="'+expCarouselRow+'" id="step6CarouselImg-'+expCarouselRow+'" multiple="" accept="image/*">\
            <div class="brw_user_ic">\
                <i class="far fa-images"></i>\
                <div class="brw_plus">\
                    <i class="fas fa-plus"></i>\
                </div>\
            </div>\
        </div>\
    </div>\*/
    /*previewImageFun();
    $('#step6Carousel-'+expCarouselRow).rules('add', {
        required: true,
        messages: {
            required: "Please provide title"
        },
    });
    $('#step6CarouselImg-'+expCarouselRow).rules('add', {
        required: true,
        messages: {
            required: "Please provide images"
        },
    });*/
});
$(document).on('click', '.addCarouselBtn', function() {
    var expCarouselRow = parseInt($('.expCarouselRow').val(),10);
    $('.expCarouselRow').val(expCarouselRow+1);
    var htmls = '';
    htmls += '<div class="everyCarouselCls">\
            <div class="flwSubTitleCls">\
                <div class="row">\
                    <div class="col-sm-11 carouselCnt">\
                        Carousel '+expCarouselRow+'\
                    </div>\
                    <div class="col-sm-1">\
                        <label for="Location1">&nbsp;</label>\
                        <a href="javascript:;" class="removeCarouselCls redCls"><i class="fas fa-minus-circle"></i></a>\
                    </div>\
                </div>\
            </div>\
            <div class="partOneCls">\
                <div class="row">\
                    <div class="col-sm-12">\
                        <div class="form-group">\
                            <label for="Category1">Strip/Carousel Name</label>\
                            <input name="step6[carousel]['+expCarouselRow+'][title]" id="step6Carousel-'+expCarouselRow+'" class="form-control" >\
                        </div>\
                    </div>\
                </div>\
                <div class="imageGalllerAppend_'+expCarouselRow+'"></div>\
                <div class="dropzone_gallery'+expCarouselRow+' dropzone myDropZoneCls step6_'+expCarouselRow+'_img" data-name="step6[carousel]['+expCarouselRow+'][image][]" data-cls=".step6_'+expCarouselRow+'_img"></div>\
                \
            </div>\
            <div class="clearfix"></div>\
        </div>';
    $('.carouselAppend').append(htmls);
    carouseCntSet();
    /*<div class="brw_bx image_galller">\
        <div class="browse_btn">\
            <input type="file" class="filesCls" name="step6[carousel]['+expCarouselRow+'][image][]" data-id="'+expCarouselRow+'" id="step6CarouselImg-'+expCarouselRow+'" multiple="" accept="image/*">\
            <div class="brw_user_ic">\
                <i class="far fa-images"></i>\
                <div class="brw_plus">\
                    <i class="fas fa-plus"></i>\
                </div>\
            </div>\
        </div>\
    </div>\*/
    /*previewImageFun();
    $('#step6Carousel-'+expCarouselRow).rules('add', {
        required: true,
        messages: {
            required: "Please provide title"
        },
    });
    $('#step6CarouselImg-'+expCarouselRow).rules('add', {
        required: true,
        messages: {
            required: "Please provide images"
        },
    });*/
    dropZoneFileUpload('.dropzone_gallery'+expCarouselRow);
});
$(document).on('change', '.filesCls', function(e) {
    var selectId = $(this).attr('data-id');
    var files = e.target.files,
        filesLength = files.length;
    $(".imageGalllerAppend_"+selectId).html('');
    // console.log(".imageGalllerAppend_"+selectId);
    for (var i = 0; i < filesLength; i++) {
        var f = files[i]
        var fileReader = new FileReader();
        fileReader.onload = (function(e) {
            var file = e.target;
            // $("<div class='image_galller'>" +
            //     "<img src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
            //     "</div>").insertAfter(".imageGalllerAppend_"+selectId);
            $(".imageGalllerAppend_"+selectId).append("<div class='image_galller'>" +
                "<img src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
                "</div>");
        });
        fileReader.readAsDataURL(f);
    }
});

$(document).on('change', '.filesClsFirst', function(e) {
    var selectId = $(this).attr('data-id');
    var files = e.target.files,
        filesLength = files.length;
    $(".imageGalllerAppend_"+selectId).html('');
    // console.log(".imageGalllerAppend_"+selectId);
    for (var i = 0; i < filesLength; i++) {
        var f = files[i]
        var fileReader = new FileReader();
        fileReader.onload = (function(e) {
            var file = e.target;
            // $("<div class='image_galller'>" +
            //     "<img src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
            //     "</div>").insertAfter(".imageGalllerAppend_"+selectId);
            $(".imageGalllerAppend_"+selectId).append("<div class='image_galller position-Relative'>" +
                "<img src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
                "<div class='deleteImage text-danger deleteExeImgFirst' ><i class='fa fa-trash' aria-hidden='true'></i></div>"+
                "</div>");
        });
        fileReader.readAsDataURL(f);
    }
    $('.step1ShowCls').hide();   
});

$(document).on('click', '.deleteExeImgFirst', function() {
    var dataId = $(this).attr('data-id');
    $(this).closest('.image_galller').remove();
    $('.filesClsFirst').val('');    
    $('.step1ShowCls').show();    
});

function previewImageFun() {

    /*if (window.File && window.FileList && window.FileReader) {
        $(".filesCls").on("change", function(e) {
            var selectId = $(this).attr('data-id');
            var files = e.target.files,
                filesLength = files.length;
            $(".imageGalllerAppend_"+selectId).html('');
            console.log(".imageGalllerAppend_"+selectId);
            for (var i = 0; i < filesLength; i++) {
                var f = files[i]
                var fileReader = new FileReader();
                fileReader.onload = (function(e) {
                    var file = e.target;
                    // $("<div class='image_galller'>" +
                    //     "<img src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
                    //     "</div>").insertAfter(".imageGalllerAppend_"+selectId);
                    $(".imageGalllerAppend_"+selectId).append("<div class='image_galller'>" +
                        "<img src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
                        "</div>");
                });
                fileReader.readAsDataURL(f);
            }
        });
    } else {
        alert("Your browser doesn't support to File API")
    }*/
}

function dayCntSet(){
	var cnt = 1;
	$(".dayCnt").each(function() {
		$(this).html('Day '+cnt);
		console.log('Day '+cnt);
		cnt++;
	});
}

function cabinsCntSet(){
	var cnt = 1;
	$(".cabinCnt").each(function() {
		$(this).html('Day '+cnt);
		console.log('Day '+cnt);
		cnt++;
	});
}

function carouseCntSet(){
    var cnt = 1;
    $(".carouselCnt").each(function() {
        $(this).html('Carousel '+cnt);
        cnt++;
    });
}
function carouseCntSetNew(){
    var cnt = 1;
    $(".carouselCntNew").each(function() {
        $(this).html('Gallery '+cnt);
        cnt++;
    });
}

$(document).on('click', '.addTourDatesBtn', function() {
    var dateType = parseInt($(this).attr('data-type'),10);
    var expDatesRow = parseInt($('.expDatesRow'+dateType).val(),10);
    $('.expDatesRow'+dateType).val(expDatesRow+1);
    var htmls = '';
    htmls += '<div class="row">\
                <div class="col-sm-5">\
                    <div class="form-group">\
                        <label for="Category1">Date From</label>\
                        <input name="step8[date_rate]['+dateType+']['+expDatesRow+'][from]" id="tDfrom-'+dateType+'-'+expDatesRow+'" class="form-control " type="date">\
                        <span></span>\
                    </div>\
                </div>\
                <div class="col-sm-1"></div>\
                <div class="col-sm-5">\
                    <div class="form-group">\
                        <label for="Category1">Date Until</label>\
                        <input name="step8[date_rate]['+dateType+']['+expDatesRow+'][until]" id="tDuntil-'+dateType+'-'+expDatesRow+'" class="form-control " type="date">\
                        <span></span>\
                    </div>\
                </div>\
                <div class="col-sm-1">\
                    <div class="form-group">\
                        <label for="Location1">&nbsp;</label>\
                        <a href="javascript:;" class="removeDatesCls redCls"><i class="fas fa-minus-circle"></i></a>\
                    </div>\
                </div>\
                <div class="col-sm-4">\
                    <div class="input-group">\
                        <label for="Category1">Price</label>\
                        <div class="input-group-prepend">\
                            <span class="input-group-text" id="basic-addon1">&#128;</span>\
                        </div>\
                        <input name="step8[date_rate]['+dateType+']['+expDatesRow+'][price]" id="tDprice-'+dateType+'-'+expDatesRow+'" class="form-control availableTourDatesCls">\
                        <div class="input-group-append">\
                            <span class="input-group-text" id="basic-addon2">pp</span>\
                        </div>\
                        <span></span>\
                    </div>\
                </div>\
                <div class="col-sm-4">\
                    <div class="input-group">\
                        <label for="Category1">Set SS price</label>\
                        <div class="input-group-prepend">\
                            <span class="input-group-text" id="basic-addon1">&#128;</span>\
                        </div>\
                        <input name="step8[date_rate]['+dateType+']['+expDatesRow+'][ss]" id="tDS-'+dateType+'-'+expDatesRow+'" class="form-control availableTourDatesCls">\
                        <div class="input-group-append">\
                            <span class="input-group-text" id="basic-addon2">pp</span>\
                        </div>\
                        <span></span>\
                    </div>\
                </div>\
                <div class="col-sm-4">\
                    <div class="input-group">\
                        <label for="Category1">No of Nights</label>\
                        <input name="step8[date_rate]['+dateType+']['+expDatesRow+'][nights]" id="tDnights-'+dateType+'-'+expDatesRow+'" class="form-control availableTourDatesCls">\
                        <div class="input-group-append">\
                            <span class="input-group-text" id="basic-addon2">nights</span>\
                        </div>\
                        <span></span>\
                    </div>\
                </div>\
            </div><hr>';
    $('.appendDates'+dateType).append(htmls);
    $('#tDfrom-'+dateType+'-'+expDatesRow).rules('add', {
        required: true,
        messages: {
            required: "Please provide form date"
        },
    });
    $('#tDuntil-'+dateType+'-'+expDatesRow).rules('add', {
        required: true,
        messages: {
            required: "Please provide until date"
        },
    });
    $('#tDprice-'+dateType+'-'+expDatesRow).rules('add', {
        required: true,
        messages: {
            required: "Please provide price"
        },
    });
    $('#tDS-'+dateType+'-'+expDatesRow).rules('add', {
        required: true,
        messages: {
            required: "Please provide ss"
        },
    });
    $('#tDnights-'+dateType+'-'+expDatesRow).rules('add', {
        required: true,
        messages: {
            required: "Please provide night"
        },
    });
});

$(document).on('click', '.removeAttrUpscalesCls', function() {
    $(this).closest('.UpscalesRow').remove();
});

$(document).on('click', '.addUpScalesPerfect', function() {
    var hotalId = $(this).attr('data-id');
    var expUpScalesRow = parseInt($('.expUpScalesRow').val(),10);
    $('.expUpScalesRow').val(expUpScalesRow+1);
    var htmls = '';
    htmls += '<hr><div class="row UpscalesRow">\
                <div class="col-sm-10">\
                    <div class="row">\
                        <div class="col-sm-11">\
                            <div class="form-group">\
                                <label for="Category1">Upscales Title</label>\
                                <input type="text" name="step4['+hotalId+'][upscales]['+expUpScalesRow+'][name]" class="form-control" id="UpscalesTitle-'+expUpScalesRow+'">\
                            </div>\
                        </div>\
                        <div class="col-sm-1">\
                            <div class="form-group">\
                                <label for="Location1">&nbsp;</label>\
                                <a href="javascript:;" class="removeAttrUpscalesCls redCls"><i class="fas fa-minus-circle"></i></a>\
                            </div>\
                        </div>\
                    </div>\
                    <div class="form-group">\
                        <label for="Category1">Upscales short description</label>\
                        <textarea name="step4['+hotalId+'][upscales]['+expUpScalesRow+'][description]" class="form-control" rows="7" id="UpscalesDesc-'+expUpScalesRow+'"></textarea>\
                    </div>\
                    <div class="form-group">\
                        <div class="custom_full_control"> <label>Gallery</label>\
                        <div class="clearfix"></div>\
                        <div class="dropzone_galleryHotSc'+hotalId+'-'+expUpScalesRow+' dropzone myDropZoneCls step4'+hotalId+'upscales'+expUpScalesRow+'_img" data-name="step4['+hotalId+'][upscales]['+expUpScalesRow+'][images][]" data-cls=".step4'+hotalId+'upscales'+expUpScalesRow+'_img"></div>\
                            \
                        </div>\
                    </div>\
                </div>\
                <div class="col-sm-2">\
                </div>\
                <hr>\
            </div>';
    $('.appendUpScalesPerfect'+hotalId).append(htmls);
    dropZoneFileUpload('.dropzone_galleryHotSc'+hotalId+'-'+expUpScalesRow);
            /*<div class="imageGalllerAppend_5454'+expUpScalesRow+'"></div>\
                            <div class="brw_bx image_galller">\
                                <div class="browse_btn"> \
                                    <input type="file" class="filesCls" name="step4['+hotalId+'][upscales]['+expUpScalesRow+'][images][]" multiple="" id="5454'+expUpScalesRow+'" data-id="5454'+expUpScalesRow+'" accept="image/*">\
                                    <div class="brw_user_ic"> <i class="far fa-images"></i>\
                                        <div class="brw_plus"> <i class="fas fa-plus"></i> </div>\
                                    </div>\
                                </div>\
                            </div>\*/
    $('#5454'+expUpScalesRow).rules('add', {
        required: true,
        messages: {
            required: "Please provide images"
        },
    });
    $('#UpscalesTitle-'+expUpScalesRow).rules('add', {
        required: true,
        messages: {
            required: "Please provide title"
        },
    });
    $('#UpscalesDesc-'+expUpScalesRow).rules('add', {
        required: true,
        messages: {
            required: "Please provide description"
        },
    });
    previewImageFun();
});

$(document).on('click', '.addCabinPricesBtn', function() {
    var expCabinPricesRow = parseInt($('.expCabinPricesRow').val(),10);
    $('.expCabinPricesRow').val(expCabinPricesRow+1);
    var htmls = '';
    htmls += '<div class="row">\
                <div class="col-sm-7">\
                    <div class="form-group">\
                        <label for="Category1">Cabin Name</label>\
                        <input name="step8[cabin_prices][name]['+expCabinPricesRow+']" id="cpName-'+expCabinPricesRow+'" class="form-control">\
                    </div>\
                </div>\
                <div class="col-sm-2">\
                    <div class="input-group">\
                        <label for="Category1">Price</label>\
                        <div class="input-group-prepend">\
                            <span class="input-group-text" id="basic-addon1">&#128;</span>\
                        </div>\
                        <input name="step8[cabin_prices][price]['+expCabinPricesRow+']" id="cpPrice-'+expCabinPricesRow+'" class="form-control availableTourDatesCls">\
                        <div class="input-group-append">\
                            <span class="input-group-text" id="basic-addon2">pp</span>\
                        </div>\
                        <span></span>\
                    </div>\
                </div>\
                <div class="col-sm-2">\
                    <div class="input-group">\
                        <label for="Category1">ss</label>\
                        <div class="input-group-prepend">\
                            <span class="input-group-text" id="basic-addon1">&#128;</span>\
                        </div>\
                        <input name="step8[cabin_prices][ss]['+expCabinPricesRow+']" class="form-control availableTourDatesCls" id="cpSs-'+expCabinPricesRow+'">\
                        <div class="input-group-append">\
                            <span class="input-group-text" id="basic-addon2">pp</span>\
                        </div>\
                        <span></span>\
                    </div>\
                </div>\
                <div class="col-sm-1">\
                    <div class="form-group">\
                        <label for="Location1">&nbsp;</label>\
                        <a href="javascript:;" class="removeCabinPricesCls redCls"><i class="fas fa-minus-circle"></i></a>\
                    </div>\
                </div>\
            </div>';
    $('.appendCabinPrices').append(htmls);
    $('#cpName-'+expCabinPricesRow).rules('add', {
        required: true,
        messages: {
            required: "Please provide name"
        },
    });
    $('#cpPrice-'+expCabinPricesRow).rules('add', {
        required: true,
        messages: {
            required: "Please provide price"
        },
    });
    $('#cpSs-'+expCabinPricesRow).rules('add', {
        required: true,
        messages: {
            required: "Please provide ss"
        },
    });
});

$(document).on('click', '.addCabinPricesBtn', function() {
    var expCabinPricesRow = parseInt($('.expCabinPricesRow').val(),10);
    $('.expCabinPricesRow').val(expCabinPricesRow+1);
    var htmls = '';
    htmls += '';
    $('.appendCabinPrices').append(htmls);
});

addTourCompleteValidateOpt = {
    errorElement: 'div',
    invalidHandler: function(event, validator) {
        var errors = validator.numberOfInvalids();
        if (errors) {
            $('span.error').hide();
        }
    },
    rules: {
        'product_name': {
            required: true,
        },
        'step1[experience_categories_ids][]': {
            required: true,
        },
        'step1[country_areas_ids][]': {
            required: true,
        },
        'step1[mobility]': {
            required: true,
        },
        /*'step1[experience_extras_id][]': {
            required: true,
        },*/
        'step1[images][]': {
            required: true,
        },
        'step1[itinerary]': {
            required: true,
        },
        'step2[ExpAttrsIcon][1]': {
            required: true,
        },
        'step2[ExpAttrsIcon][2]': {
            required: true,
        },
        'step2[ExpAttrsIcon][3]': {
            required: true,
        },
        'step2[ExpAttrsIcon][4]': {
            required: true,
        },
        'step2[ExpAttrsInclusion][1]': {
            required: true,
        },
        'step2[ExpAttrsInclusion][2]': {
            required: true,
        },
        'step2[ExpAttrsInclusion][3]': {
            required: true,
        },
        'step2[ExpAttrsInclusion][4]': {
            required: true,
        },
        'step2[ExpAttrsShip][1]': {
            required: true,
        },
        'step2[ExpAttrsShip][2]': {
            required: true,
        },
        'step2[ExpAttrsShip][3]': {
            required: true,
        },
        'step2[ExpAttrsShip][4]': {
            required: true,
        },
        'step2[ExpAttrsShipInclusion][1]': {
            required: true,
        },
        'step2[ExpAttrsShipInclusion][2]': {
            required: true,
        },
        'step2[ExpAttrsShipInclusion][3]': {
            required: true,
        },
        'step2[ExpAttrsShipInclusion][4]': {
            required: true,
        },
        'step1[description]': {
            required: true,
        },
        'step3[icon][1]': {
            required: true,
        },
        'step3[icon][2]': {
            required: true,
        },
        'step3[number][1]': {
            required: true,
        },
        'step3[number][2]': {
            required: true,
        },
        'step3[name][1]': {
            required: true,
        },
        'step3[name][2]': {
            required: true,
        },
        'step4[day][title][1]': {
            required: true,
        },
        'step4[day][description][1]': {
            required: true,
        },
        'step4[day][departure_time][1]': {
            required: true,
        },
        'step4[day][arrival_time][1]': {
            required: true,
        },
        'step4[day][highlights][1][1]': {
            required: true,
        },
        'step5[ship][name]': {
            required: true,
        },
        'step5[ship][star_rating]': {
            required: true,
        },
        'step5[ship][website_link]': {
            required: true,
        },
        'step5[ship][menu_link]': {
            required: true,
        },
        'step5[ship][description]': {
            required: true,
        },
        'step5[ship][built]': {
            required: true,
        },
        'step5[ship][refurbished]': {
            required: true,
        },
        'step5[ship][cabins]': {
            required: true,
        },
        'step5[ship][passengers]': {
            required: true,
        },
        'step5[ship][crew]': {
            required: true,
        },
        'step5[ship][length]': {
            required: true,
        },
        'step5[ship][beam]': {
            required: true,
        },
        'step5[ship][draught]': {
            required: true,
        },
        'step5[ship][amenities][1]': {
            required: true,
        },
        'step5[cabin][1][name]': {
            required: true,
        },
        'step5[cabin][1][size_bold]': {
            required: true,
        },
        'step5[cabin][1][size_text]': {
            required: true,
        },
        'step5[cabin][1][description]': {
            required: true,
        },
        'step5[cabin][1][view]': {
            required: true,
        },
        'step5[cabin][1][image][]': {
            required: true,
        },
        'step6[carousel][1][title]': {
            required: true,
        },
        'step6[carousel][1][image][]': {
            required: true,
        },
        'step6[carousel][2][title]': {
            required: true,
        },
        'step6[carousel][2][image][]': {
            required: true,
        },
        'step7[map_url]': {
            required: true,
        },
        'step8[date_rate][1][1][from]': {
            required: true,
        },
        'step8[date_rate][1][1][until]': {
            required: true,
        },
        'step8[date_rate][1][1][price]': {
            required: true,
        },
        'step8[date_rate][1][1][ss]': {
            required: true,
        },
        'step8[date_rate][1][1][nights]': {
            required: true,
        },
        'step8[date_rate][2][1][from]': {
            required: true,
        },
        'step8[date_rate][2][1][until]': {
            required: true,
        },
        'step8[date_rate][2][1][price]': {
            required: true,
        },
        'step8[date_rate][2][1][ss]': {
            required: true,
        },
        'step8[date_rate][2][1][nights]': {
            required: true,
        },
        'step8[cabin_prices][name][1]': {
            required: true,
        },
        'step8[cabin_prices][price][1]': {
            required: true,
        },
        'step8[cabin_prices][ss][1]': {
            required: true,
        },
        'step8[cabin_prices][name][2]': {
            required: true,
        },
        'step8[cabin_prices][price][2]': {
            required: true,
        },
        'step8[cabin_prices][ss][2]': {
            required: true,
        },
        'step8[additional][1][subtitle]': {
            required: true,
        },
        'step8[additional][1][text]': {
            required: true,
        },
        'step8[additional][2][subtitle]': {
            required: true,
        },
        'step8[additional][2][text]': {
            required: true,
        },
        //TOUR STANDARD
        'step1[description]': {
            required: true,
        },
        'step3[1][name]': {
            required: true,
        },
        'step3[1][score]': {
            required: true,
        },
        'step3[1][tripadvisor_url]': {
            required: true,
        },
        'step3[1][website]': {
            required: true,
        },
        'step3[1][mobility]': {
            required: true,
        },
        'step3[1][description]': {
            required: true,
        },
        'step3[1][inclusions][1]': {
            required: true,
        },
        'step3[1][images][]': {
            // required: true,
        },
        'step3[2][name]': {
            required: true,
        },
        'step3[2][score]': {
            required: true,
        },
        'step3[2][tripadvisor_url]': {
            required: true,
        },
        'step3[2][website]': {
            required: true,
        },
        'step3[2][mobility]': {
            required: true,
        },
        'step3[2][description]': {
            required: true,
        },
        'step3[2][inclusions][1]': {
            required: true,
        },
        /*'step3[2][images][]': {
            required: true,
        },*/
        'step3[3][name]': {
            required: true,
        },
        'step3[3][score]': {
            required: true,
        },
        'step3[3][tripadvisor_url]': {
            required: true,
        },
        'step3[3][website]': {
            required: true,
        },
        'step3[3][mobility]': {
            required: true,
        },
        'step3[3][description]': {
            required: true,
        },
        'step3[3][inclusions][1]': {
            required: true,
        },
        /*'step3[3][images][]': {
            required: true,
        },*/
        'step4[1][name]': {
            required: true,
        },
        'step4[1][stars]': {
            required: true,
        },
        'step4[1][website]': {
            required: true,
        },
        'step4[1][contact_number]': {
            required: true,
        },
        'step4[1][menu_url]': {
            required: true,
        },
        'step4[1][location_link]': {
            required: true,
        },
        'step4[1][booking_url]': {
            required: true,
        },
        'step4[1][triadvisor_url]': {
            required: true,
        },
        'step4[1][inclusions][1]': {
            required: true,
        },
        'step4[1][images][]': {
            // required: true,
        },
        'step4[1][about]': {
            required: true,
        },
        'step4[1][upscales][1][name]': {
            required: true,
        },
        'step4[1][upscales][1][description]': {
            required: true,
        },
        'step4[1][upscales][1][images][]': {
            required: true,
        },
    },
    messages: {
        'step1[experience_categories_ids][]': {
            required: "Please select category",
        },
        'step1[country_areas_ids][]': {
            required: "Please select country",
        },
        'step1[mobility]': {
            required: "Please select mobility",
        },
        'step1[experience_extras_id][]': {
            required: "Please select tags",
        },
        'step1[images][]': {
            required: "Please select images",
        },
        'step1[itinerary]': {
            required: "Please provide description",
        },
        'step2[ExpAttrsIcon][1]': {
            required: "Please select icon",
        },
        'step2[ExpAttrsIcon][2]': {
            required: "Please select icon",
        },
        'step2[ExpAttrsIcon][3]': {
            required: "Please select icon",
        },
        'step2[ExpAttrsIcon][4]': {
            required: "Please select icon",
        },
        'Inclusion[1]': {
            required: "Please select inclusion",
        },
        'Inclusion[2]': {
            required: "Please select inclusion",
        },
        'Inclusion[3]': {
            required: "Please select inclusion",
        },
        'Inclusion[4]': {
            required: "Please select inclusion",
        },
        'step2[ExpAttrsShip][1]': {
            required: "Please select icon",
        },
        'step2[ExpAttrsShip][2]': {
            required: "Please select icon",
        },
        'step2[ExpAttrsShip][3]': {
            required: "Please select icon",
        },
        'step2[ExpAttrsShip][4]': {
            required: "Please select icon",
        },
        'step2[ExpAttrsShipInclusion][1]': {
            required: "Please select inclusion",
        },
        'step2[ExpAttrsShipInclusion][2]': {
            required: "Please select inclusion",
        },
        'step2[ExpAttrsShipInclusion][3]': {
            required: "Please select inclusion",
        },
        'step2[ExpAttrsShipInclusion][4]': {
            required: "Please select inclusion",
        },
        'step2[ExpAttrsInclusion][1]': {
            required: "Please select inclusion",
        },
        'step2[ExpAttrsInclusion][2]': {
            required: "Please select inclusion",
        },
        'step2[ExpAttrsInclusion][3]': {
            required: "Please select inclusion",
        },
        'step2[ExpAttrsInclusion][4]': {
            required: "Please select inclusion",
        },
        'step1[description]': {
            required: "Please provide description",
        },
        'step3[icon][1]': {
            required: "Please select icon",
        },
        'step3[icon][2]': {
            required: "Please select icon",
        },
        'step3[number][1]': {
            required: "Please provide number",
        },
        'step3[number][2]': {
            required: "Please provide number",
        },
        'step3[name][1]': {
            required: "Please provide name",
        },
        'step3[name][2]': {
            required: "Please provide name",
        },
        'step4[day][title][1]': {
            required: "Please provide title",
        },
        'step4[day][description][1]': {
            required: "Please provide description",
        },
        'step4[day][departure_time][1]': {
            required: "Please provide time",
        },
        'step4[day][arrival_time][1]': {
            required: "Please provide time",
        },
        'step4[day][highlights][1][1]': {
            required: "Please provide highlights",
        },
        'step5[ship][name]': {
            required: "Please provide name",
        },
        'step5[ship][star_rating]': {
            required: "Please select rating",
        },
        'step5[ship][website_link]': {
            required: "Please provide website link",
        },
        'step5[ship][menu_link]': {
            required: "Please provide menu link",
        },
        'step5[ship][description]': {
            required: "Please provide description",
        },
        'step5[ship][built]': {
            required: "Please provide built",
        },
        'step5[ship][refurbished]': {
            required: "Please provide refurbished",
        },
        'step5[ship][cabins]': {
            required: "Please provide cabins",
        },
        'step5[ship][passengers]': {
            required: "Please provide passengers",
        },
        'step5[ship][crew]': {
            required: "Please provide crew",
        },
        'step5[ship][length]': {
            required: "Please provide length",
        },
        'step5[ship][beam]': {
            required: "Please provide beam",
        },
        'step5[ship][draught]': {
            required: "Please provide draught",
        },
        'step5[ship][amenities][1]': {
            required: "Please provide amenities",
        },
        'step5[cabin][1][name]': {
            required: "Please provide name",
        },
        'step5[cabin][1][size_bold]': {
            required: "Please provide size bold",
        },
        'step5[cabin][1][size_text]': {
            required: "Please provide size text",
        },
        'step5[cabin][1][description]': {
            required: "Please provide description",
        },
        'step5[cabin][1][view]': {
            required: "Please provide view",
        },
        'step5[cabin][1][image][]': {
            required: "Please provide images",
        },
        'step6[carousel][1][title]': {
            required: "Please provide title",
        },
        'step6[carousel][1][image][]': {
            required: "Please provide images",
        },
        'step6[carousel][2][title]': {
            required: "Please provide title",
        },
        'step6[carousel][2][image][]': {
            required: "Please provide images",
        },
        'step7[map_url]': {
            required: "Please provide map url",
        },
        'step8[date_rate][1][1][from]': {
            required: "Please provide from",
        },
        'step8[date_rate][1][1][until]': {
            required: "Please provide until",
        },
        'step8[date_rate][1][1][price]': {
            required: "Please provide price",
        },
        'step8[date_rate][1][1][ss]': {
            required: "Please provide ss",
        },
        'step8[date_rate][1][1][nights]': {
            required: "Please provide night",
        },
        'step8[date_rate][2][1][from]': {
            required: "Please provide from",
        },
        'step8[date_rate][2][1][until]': {
            required: "Please provide until",
        },
        'step8[date_rate][2][1][price]': {
            required: "Please provide price",
        },
        'step8[date_rate][2][1][ss]': {
            required: "Please provide ss",
        },
        'step8[date_rate][2][1][nights]': {
            required: "Please provide night",
        },
        'step8[cabin_prices][name][1]': {
            required: "Please provide name",
        },
        'step8[cabin_prices][price][1]': {
            required: "Please provide price",
        },
        'step8[cabin_prices][ss][1]': {
            required: "Please provide ss",
        },
        'step8[cabin_prices][name][2]': {
            required: "Please provide name",
        },
        'step8[cabin_prices][price][2]': {
            required: "Please provide price",
        },
        'step8[cabin_prices][ss][2]': {
            required: "Please provide ss",
        },
        'step8[additional][1][subtitle]': {
            required: "Please provide title",
        },
        'step8[additional][1][text]': {
            required: "Please provide text",
        },
        'step8[additional][2][subtitle]': {
            required: "Please provide title",
        },
        'step8[additional][2][text]': {
            required: "Please provide text",
        },
        'step1[description]': {
            required: "Please provide description",
        },
        'step3[1][name]': {
            required: "Please provide name",
        },
        'step3[1][score]': {
            required: "Please provide score",
        },
        'step3[1][tripadvisor_url]': {
            required: "Please provide tripadvisor url",
        },
        'step3[1][website]': {
            required: "Please provide website",
        },
        'step3[1][mobility]': {
            required: "Please provide mobility",
        },
        'step3[1][description]': {
            required: "Please provide description",
        },
        'step3[1][inclusions][1]': {
            required: "Please provide inclusions",
        },
        'step3[1][images][]': {
            required: "Please provide images",
        },
        'step3[2][name]': {
            required: "Please provide name",
        },
        'step3[2][score]': {
            required: "Please provide score",
        },
        'step3[2][tripadvisor_url]': {
            required: "Please provide tripadvisor url",
        },
        'step3[2][website]': {
            required: "Please provide website",
        },
        'step3[2][mobility]': {
            required: "Please provide mobility",
        },
        'step3[2][description]': {
            required: "Please provide description",
        },
        'step3[2][inclusions][1]': {
            required: "Please provide inclusions",
        },
        'step3[2][images][]': {
            required: "Please provide images",
        },
        'step3[3][name]': {
            required: "Please provide name",
        },
        'step3[3][score]': {
            required: "Please provide score",
        },
        'step3[3][tripadvisor_url]': {
            required: "Please provide tripadvisor url",
        },
        'step3[3][website]': {
            required: "Please provide website",
        },
        'step3[3][mobility]': {
            required: "Please provide mobility",
        },
        'step3[3][description]': {
            required: "Please provide description",
        },
        'step3[3][inclusions][1]': {
            required: "Please provide inclusions",
        },
        'step3[3][images][]': {
            required: "Please provide images",
        },
        'step4[1][name]': {
            required: "Please provide name",
        },
        'step4[1][stars]': {
            required: "Please provide rating",
        },
        'step4[1][website]': {
            required: "Please provide website",
        },
        'step4[1][contact_number]': {
            required: "Please provide contact number",
        },
        'step4[1][menu_url]': {
            required: "Please provide menu url",
        },
        'step4[1][location_link]': {
            required: "Please provide location link",
        },
        'step4[1][booking_url]': {
            required: "Please provide booking url",
        },
        'step4[1][triadvisor_url]': {
            required: "Please provide triadvisor url",
        },
        'step4[1][inclusions][1]': {
            required: "Please provide amenities",
        },
        'step4[1][images][]': {
            required: "Please provide images",
        },
        'step4[1][about]': {
            required: "Please provide about",
        },
        'step4[1][upscales][1][name]': {
            required: "Please provide title",
        },
        'step4[1][upscales][1][description]': {
            required: "Please provide description",
        },
        'step4[1][upscales][1][images][]': {
            required: "Please provide images",
        },
    },
    errorPlacement: function(error, element) {
        /*if (element.hasClass('selectCls')) {
            error.insertAfter(element.next('span'));
        } else {
            error.insertAfter(jQuery(element));
        }*/
        if (element.hasClass('selectCls')) {
           error.insertAfter(element.next('span'));
        } else if (element.hasClass('availableTourDatesCls')) {
           error.insertAfter(element.next('.input-group-append').next('span'));
        } else if (element.hasClass('custom_chkbox')) {
           error.insertAfter(element.next('span'));
        } else if (element.hasClass('multiImgCls')) {
           error.insertAfter(element.next('span'));
        } else {
            error.insertAfter($(element));
        }
    },
    focusInvalid: false,
    invalidHandler: function(form, validator) {},
    submitHandler: function(form) {
        var tour_type = $('.tour_type').val();
        if(tour_type == '2'){
            return true;
        }else{
            
            var params = $(form).serializeArray();
            var tour_id = $('.tour_id').val();
            // for (var i = 0; i < params.length; i++){
            //     userFormData.append(params[i].name, params[i].value);
            // }

            $.each(params, function(i, val) {
                userFormData.append(val.name, val.value);
            });
            var files = $('input[type=file]');
            for (var i = 0; i < files.length; i++) {
            if (files[i].value == "" || files[i].value == null) {
                //return false;
            }
            else {
                userFormData.append(files[i].name, files[i].files[0]);
            }
            }
                    $('.loader').show();
            $.ajax({
                url: $(form).attr('action'),
                type: 'POST',
                dataType: 'JSON',
                cache: false,
                mimeType: "multipart/form-data",
                contentType: false,
                processData: false,
                // data: formData,
                data: userFormData,
                beforeSend: function() {
                }
            }).done(function(data) {
                $('.loader').hide();
                if(data.status == 'success'){
                    //window.location.href = base_url+'/super-user/tours/show/'+tour_id;
                    location.reload(true);
                }
            });
            return false;            
        }
    },
};

/*Step - 2 Validation Start*/
    function experiencesValidation(htmlId){
        $('#ExpAttIcon-'+htmlId).rules('add', {
            required: true,
            messages: {
                required: "Please select icon"
            },
        });
        $('#ExpInclusion-'+htmlId).rules('add', {
            required: true,
            messages: {
                required: "Please select inclusions"
            },
        });
    }
    function experiencesShipValidation(htmlId){
        $('#ExpAttShipIcon-'+htmlId).rules('add', {
            required: true,
            messages: {
                required: "Please select icon"
            },
        });
        $('#ExpAttShipName-'+htmlId).rules('add', {
            required: true,
            messages: {
                required: "Please select inclusions"
            },
        });
    }
/*Step - 2 Validation End*/

/*Step - 3 Validation Start*/
    function perfectForStepValidation(htmlId){
        $('#overviewIcon-'+htmlId).rules('add', {
            required: true,
            messages: {
                required: "Please select icon"
            },
        });
        $('#overviewNumber-'+htmlId).rules('add', {
            required: true,
            messages: {
                required: "Please provide number"
            },
        });
        $('#overviewName-'+htmlId).rules('add', {
            required: true,
            messages: {
                required: "Please provide name"
            },
        });
    }
/*Step - 3 Validation End*/

/*Step - 4 Validation Start*/
    function dayStepValidation(htmlId){
        $('#step4Title'+htmlId).rules('add', {
            required: true,
            messages: {
                required: "Please provide title"
            },
        });
        $('#step4Description'+htmlId).rules('add', {
            required: true,
            messages: {
                required: "Please provide description"
            },
        });
        $('#step4Departure'+htmlId).rules('add', {
            required: true,
            messages: {
                required: "Please provide time"
            },
        });
        $('#step4Arrival'+htmlId).rules('add', {
            required: true,
            messages: {
                required: "Please provide time"
            },
        });
        $('#step4Highlights'+htmlId).rules('add', {
            required: true,
            messages: {
                required: "Please provide Highlights"
            },
        });
    }
/*Step - 4 Validation End*/

/*$(document).on('click', '.addExpVipBtn', function() {
    var thisCls = $(this).attr('data-cls');
    var thisId = $(this).attr('data-id');
    var thisPro = $(this).attr('data-pro');
    var expVipRow = $('.expVipRow').val();
    expVipRow = parseInt(expVipRow);
    expVipRow = expVipRow + 1;
    $('.expVipRow').val(expVipRow);
    var htmls = '';
    htmls += '<div class="partOneCls">\
            <div class="append3VipExperiences">\
                <div class="row">\
                    <div class="col-sm-12">\
                        <div class="row">\
                            <div class="col-sm-11">\
                                <div class="form-group">\
                                    <label for="Category1">Experiences Name</label>\
                                    <input type="text" name="step3['+thisId+']['+expVipRow+'][name]" class="form-control" value="">\
                                </div>\
                            </div>\
                            <div class="col-sm-1">\
                                <div class="form-group">\
                                    <label for="Location1">&nbsp;</label>\
                                    <a href="javascript:;" class="removeExperiencesExpCls redCls"><i class="fas fa-minus-circle"></i></a>\
                                </div>\
                            </div>\
                        </div>\
                        <div class="form-group">\
                            <div class="custom_control">\
                                <label for="Category1">Veenus Score</label>\
                                <input type="text" name="step3['+thisId+']['+expVipRow+'][score]" class="form-control" value="">\
                            </div>\
                        </div>\
                        <div class="form-group">\
                            <label for="Category1">TripAdvisor URL</label>\
                            <input type="text" name="step3['+thisId+']['+expVipRow+'][tripadvisor_url]" class="form-control" value="">\
                        </div>\
                        <div class="form-group">\
                            <label for="Category1">Website</label>\
                            <input type="text" name="step3['+thisId+']['+expVipRow+'][website]" class="form-control" value="">\
                        </div>\
                        <div class="form-group">\
                            <div class="custom_control"> \
                                <label>Mobility Level</label>\
                                <div class="br-wrapper br-theme-bars-square">\
                                    <select class="exampleSquareCls" name="step3['+thisId+']['+expVipRow+'][mobility]">\
                                        <option value=""></option>\
                                        <option value="1" selected="">1</option>\
                                        <option value="2">2</option>\
                                        <option value="3">3</option>\
                                        <option value="4">4</option>\
                                        <option value="5">5</option>\
                                    </select>\
                                </div>\
                            </div>\
                        </div>\
                        <div class="form-group">\
                            <label for="Category1">Description</label>\
                            <textarea name="step3['+thisId+']['+expVipRow+'][description]" class="form-control" rows="7"></textarea>\
                        </div>\
                        <div class="fl_w comman part_six"> \
                            <input class="form-control section_inclusions_'+thisId+'2'+expVipRow+'" name="section_inclusions_'+thisId+'2'+expVipRow+'" type="hidden" value="1">\
                            <div class="form-group">\
                                <div class="custom_full_control"> <label>Inclusions</label>\
                                    <div class="customFullControlInclusionsCls'+thisId+'2'+expVipRow+' cFCInclusionsCls"> \
                                        <div class="row ameDiv_111">\
                                            <div class="col-sm-10">\
                                                <input class="form-control" name="step3['+thisId+']['+expVipRow+'][inclusions][1]" type="text" value="" id="inclusions_1_1" placeholder=""> \
                                            </div> \
                                            <div class="col-sm-2">\
                                                <a href="javascript:;" class="nhSubCloseCls removeAddAmebtn" data-id="111" >x</a>\
                                            </div> \
                                        </div>\
                                    </div> \
                                    <a href="javascript:;" class="addmorelnk addVipIncluCls" data-pro="'+expVipRow+'" data-type="'+thisId+'"  data-id="'+thisId+'2'+expVipRow+'">Add More</a>\
                                </div>\
                            </div>\
                        </div>\
                        <div class="form-group">\
                            <div class="custom_full_control"> <label>Gallery</label>\
                            <div class="clearfix"></div>\
                            <div class="dropzone_gallery'+thisId+'-'+expVipRow+' dropzone myDropZoneCls step3_'+thisId+'-'+expVipRow+'_img" data-name="step3['+thisId+']['+expVipRow+'][images][]" data-cls=".step3_'+thisId+'-'+expVipRow+'_img"></div>\
                                \
                            </div>\
                        </div>\
                    </div>\
                </div>\
            </div>\
            <hr>\
        </div>';
    $(thisCls).append(htmls);
    dropZoneFileUpload('.dropzone_gallery'+thisId+'-'+expVipRow);
    squareFunctionLoad();
});*/
$(document).on('click', '.addVipIncluCls', function() {
    var thisType = $(this).attr('data-type');
    var thisVal = $(this).attr('data-id');
    var thisPro = $(this).attr('data-pro');
    var htmls = '';
    var sectionInclusions = $('.section_inclusions_' + thisVal).val();
    sectionInclusions = parseInt(sectionInclusions);
    sectionInclusions = sectionInclusions + 1;
    var htmlId = 'inclusions_' + thisVal + '_' + sectionInclusions;
    htmls += '<div class="row ameDiv_' + thisType + '' + sectionInclusions + '">\
                <div class="col-sm-10">\
                    <input class="form-control" name="step3['+thisType+']['+thisPro+'][inclusions][' + sectionInclusions + ']" type="text" id="' + htmlId + '" value="" required="" data-msg-required="Please provide inclusions">\
                </div>\
                <div class="col-sm-2">\
                    <a href="javascript:;" class="nhSubCloseCls removeAddAmebtn" data-id="' + thisType + '' + sectionInclusions + '" >x</a>\
                </div>\
            </div>';
    $('.section_inclusions_' + thisVal).val(sectionInclusions);
    $('.customFullControlInclusionsCls' + thisVal).append(htmls);
    $('#' + htmlId).trigger('blur');
    $('#' + htmlId).rules('add', {
        required: true,
        messages: {
            required: "Please provide inclusions"
        },
    });
});
$(document).on('click', '.removeAddAmebtn', function() {
    var thisVal = $(this).attr('data-id');
    $('.ameDiv_' + thisVal).remove();
});

$(document).on('click', '.addAmenitiesReviewsCls', function() {
    var idd = $(this).attr('data-id');
    var thisVal = $(this).closest('div').find('.cFCInclusionsCls');
    var htmls = '';
    htmls += '<div class="row">\
                <div class="col-sm-10">\
                    <input class="form-control" name="step4['+idd+'][tour_amenities][]" type="text" value="" >\
                </div>\
                <div class="col-sm-10">\
                    <input class="form-control" placeholder="URL" name="step4['+idd+'][tour_amenities_url][]" type="text" value="" >\
                </div>\
                <div class="col-sm-2">\
                    <a href="javascript:;" class="nhSubCloseCls removeAddAmeReviewsbtn" >x</a>\
                </div>\
            </div>';
    thisVal.append(htmls);
});

$(document).on('click', '.removeAddAmeReviewsbtn', function() {
    // var thisVal = $(this).attr('data-id');
    // $('.ameReviewDiv_' + thisVal).remove();
    $(this).closest('div.row').remove();
});
$(document).on('click', '.editTitle', function() {
    var productNameCls = $('.productNameCls').val();
    productNameCls = productNameCls.trim();
    if(productNameCls){
        if ($(".contentDivasda").find(".inputTitle").hasClass("ele_hide")) {
            $(".contentDivasda").find(".inputTitle").removeClass("ele_hide");
            $(".proNameCls").hide();
        } else {
            $(".contentDivasda").find(".inputTitle").addClass("ele_hide");
            $(".proNameCls").show();
        }
    }
});
$(document).on('keyup', '.productNameCls', function() {
    var productNameCls = $(this).val();
    $(".proNameCls").html(productNameCls);
});
$(document).on('click', '.deleteExeImg', function() {
    var dataId = $(this).attr('data-id');
            $(this).closest('.image_galller').remove();
    $('.loader').show();    
    $.ajax({
        url: base_url+'/super-user/tour-experience/delete-image',
        type: 'POST',
         // dataType: 'json',
        data: {'id':dataId},
        success: function(data) {
            $('.loader').hide();    
            $('.step1ShowCls').show();    
        },
        error: function(e) {
        }
    });
});

$(document).on('click', '.deleteExeStepImg', function() {
    var dataId = $(this).attr('data-id');
            $(this).closest('.image_galller').remove();
    $('.loader').show();    
    $.ajax({
        url: base_url+'/super-user/tour-experience-experience/delete-image',
        type: 'POST',
         // dataType: 'json',
        data: {'id':dataId},
        success: function(data) {
            $('.loader').hide();    
        },
        error: function(e) {
        }
    });
});
$(document).on('click', '.deleteHotelImg', function() {
    var dataId = $(this).attr('data-id');
            $(this).closest('.image_galller').remove();
    $('.loader').show();    
    $.ajax({
        url: base_url+'/super-user/tour-experience-hotel/delete-image',
        type: 'POST',
         // dataType: 'json',
        data: {'id':dataId},
        success: function(data) {
            $('.loader').hide();    
        },
        error: function(e) {
        }
    });
});

$(document).on('click', '.deleteHotelUpscalesImg', function() {
    var dataId = $(this).attr('data-id');
            $(this).closest('.image_galller').remove();
    $('.loader').show();    
    $.ajax({
        url: base_url+'/super-user/tour-experience-hotel-upscales/delete-image',
        type: 'POST',
         // dataType: 'json',
        data: {'id':dataId},
        success: function(data) {
            $('.loader').hide();    
        },
        error: function(e) {
        }
    });
});

$(document).on('click', '.deleteGalleryImg', function() {
    var dataId = $(this).attr('data-id');
            $(this).closest('.image_galller').remove();
    $('.loader').show();    
    $.ajax({
        url: base_url+'/super-user/tour-experience-gallery/delete-image',
        type: 'POST',
         // dataType: 'json',
        data: {'id':dataId},
        success: function(data) {
            $('.loader').hide();    
        },
        error: function(e) {
        }
    });
});

$(document).on('click', '.deleteGalleryImgNewtemp', function() {
    if(confirm('Are you sure?')){
            $(this).closest('.image_galllernew').remove();
    }
});
$(document).on('click', '.deleteGalleryImgNew', function() {
    if(confirm('Are you sure?')){
        var dataId = $(this).attr('data-id');
            $(this).closest('.image_galllernew').remove();
            $('.loader').show();    
            $.ajax({
                url: base_url+'/super-user/tour-experience-gallery/delete-image',
                type: 'POST',
                 // dataType: 'json',
                data: {'id':dataId},
                success: function(data) {
                    $('.loader').hide();    
                },
                error: function(e) {
                }
            });
    }
    
});
$(document).on('click', '.removeAttrExpRealCls', function() {
    $(this).closest('.row').remove();
    var dataId = $(this).attr('data-id');
    $('.loader').show();    
    $.ajax({
        url: base_url+'/super-user/tour-experience/delete-inclusions',
        type: 'POST',
         // dataType: 'json',
        data: {'id':dataId},
        success: function(data) {
            $('.loader').hide();    
        },
        error: function(e) {
        }
    });
});

$(document).on('click', '.removeAddAmebtnEdit', function() {
    var thisVal = $(this).attr('data-id');
    $('.ameDiv_' + thisVal).remove();
    var dataInc = $(this).attr('data-inc');
    $('.loader').show();    
    $.ajax({
        url: base_url+'/super-user/tour-experience-experience/delete-inclusions',
        type: 'POST',
         // dataType: 'json',
        data: {'id':dataInc},
        success: function(data) {
            $('.loader').hide();    
        },
        error: function(e) {
        }
    });
});

$(document).on('click', '.removeAttrPerfectClsEdit', function() {
    $(this).closest('.row').remove();
    var dataId = $(this).attr('data-id');
    $('.loader').show();    
    $.ajax({
        url: base_url+'/super-user/tour-experience/delete-perfect',
        type: 'POST',
         // dataType: 'json',
        data: {'id':dataId},
        success: function(data) {
            $('.loader').hide();    
        },
        error: function(e) {
        }
    });
});
$(document).on('click', '.deleteItineraryImg', function() {
    var dataId = $(this).attr('data-id');
            $(this).closest('.image_galller').remove();
    $('.loader').show();    
    $.ajax({
        url: base_url+'/super-user/tour-experience-itinerary/delete-image',
        type: 'POST',
         // dataType: 'json',
        data: {'id':dataId},
        success: function(data) {
            $('.loader').hide();    
        },
        error: function(e) {
        }
    });
});
$(document).on('click', '.deleteImgStepImg', function() {
    $(this).closest('.image_galller').remove();
});

function hotelSearchfunction(){
    $(".searchHotelName" ).autocomplete({
        source: function( request, response ) {
            $.ajax({
              url : base_url+'/super-user/products-hotel-search',
              dataType: "json",
              data: {
                search: request.term,
                type: 'country'
              },
              success: function( data ) {
                /*if(!data.length){
                    console.log('length - length');
                    var result = [
                      {
                        label: 'No matches found',
                        value: response.term,
                        id: 0
                      }
                   ];
                     response(result);
                }else{*/
                    response( $.map( data, function( item ) {
                      return {
                        id: item.id,
                        value: item.name,
                        cost: item.cost,
                        about: item.about,
                        star_rating: item.star_rating,
                        website_url: item.website_url,
                        contact_number: item.contact_number,
                        menu_url: item.menu_url,
                        location_link: item.location_link,
                        booking_url: item.booking_url,
                        triadvisor_url: item.triadvisor_url,
                        get_product_hotel_amenities: item.get_product_hotel_amenities,
                        get_product_hotel_images: item.get_product_hotel_images,
                        get_product_hotel_upscales: item.get_product_hotel_upscales,
                      }
                    }));
                // }
              }
            });
        },
        change: function (event, ui) {
            if (ui.item == null || ui.item == undefined) {
              console.log('change - If');
            } else {
            }
        },
        autoFocus: true,
        minLength: 1,
        select: function (event, ui) {
            var HotId = $(this).attr('data-id');
            $(this).val(ui.item.value);
            $('.hotRating'+HotId).val(ui.item.star_rating);
            $('.hotWebsite'+HotId).val(ui.item.website_url);
            $('.hotContact'+HotId).val(ui.item.contact_number);
            $('.hotMenu'+HotId).val(ui.item.menu_url);
            $('.hotLocation'+HotId).val(ui.item.location_link);
            $('.hotBooking'+HotId).val(ui.item.booking_url);
            $('.hotTripAdvisor'+HotId).val(ui.item.triadvisor_url);
            $('.hotAbout'+HotId).val(ui.item.about);
            $('.hotRating'+HotId).trigger('change');
            // console.log('-'+ui.item.contact_number);

            var get_product_hotel_amenities = ui.item.get_product_hotel_amenities;
            var i;
            var htmls = '';
            var cnts = 154;
            for (i = 0; i < get_product_hotel_amenities.length; ++i) {
                var amId = get_product_hotel_amenities[i]['id'];
                var amName = get_product_hotel_amenities[i]['name'];
                var htmlId = 'inclusions_5_'+amId;
                htmls += '<div class="row ameDiv_'+HotId+'_'+amId+'">\
                    <div class="col-sm-10">\
                        <input class="form-control" name="step4['+HotId+'][inclusions]['+cnts+']" type="text" id="'+htmlId+'" value="'+amName+'" required="" data-msg-required="Please provide amenities and reviews">\
                    </div>\
                    <div class="col-sm-2">\
                        <a href="javascript:;" class="nhSubCloseCls removeAddAmeReviewsbtn" data-id="'+amId+'" >x</a>\
                    </div>\
                </div>';
                cnts++;
            }
            $('.customAmenitiesReviewsCls'+HotId).html('');
            $('.customAmenitiesReviewsCls'+HotId).html(htmls);

            var i;
            var htmls = '';
            var get_product_hotel_images = ui.item.get_product_hotel_images;

            for (i = 0; i < get_product_hotel_images.length; ++i) {
                var amId = get_product_hotel_images[i]['id'];
                var amName = get_product_hotel_images[i]['name'];
                var htmlId = 'inclusions_5_'+amId;
                htmls += '<div class="image_galller">\
                            <img src="'+base_url+'/storage/product_image/'+amName+'">\
                            <input name="step4['+HotId+'][images_new][]" type="hidden" value="'+amId+'">\
                        </div>';
            }
            $('.imageGalllerAppend_Hotel'+HotId).html(htmls);

            var i;
            var htmls = '';
            var get_product_hotel_upscales = ui.item.get_product_hotel_upscales;
            var expUpScalesRow = 124;
            for (i = 0; i < get_product_hotel_upscales.length; ++i) {
                var pHUid = get_product_hotel_upscales[i]['id'];
                var pHUname = get_product_hotel_upscales[i]['name'];
                var pHUdescription = get_product_hotel_upscales[i]['description'];
                var pHUImageSrc = get_product_hotel_upscales[i]['image'];
                var pHUimage = get_product_hotel_upscales[i]['image'];
                if(pHUimage){
                    var pHUimage = base_url+'/storage/product_image/'+pHUimage;
                }
                htmls += '<div class="row UpscalesRow">\
                            <div class="col-sm-10">\
                                <div class="row">\
                                    <div class="col-sm-11">\
                                        <div class="form-group">\
                                            <label for="Category1">Upscales Title</label>\
                                            <input type="text" name="step4['+HotId+'][upscales]['+expUpScalesRow+'][name]" class="form-control" id="UpscalesTitle-'+expUpScalesRow+'" value="'+pHUname+'" required="" data-msg-required="Please provide title">\
                                        </div>\
                                    </div>\
                                    <div class="col-sm-1">\
                                        <div class="form-group">\
                                            <label for="Location1">&nbsp;</label>\
                                            <a href="javascript:;" class="removeAttrUpscalesCls redCls"><i class="fas fa-minus-circle"></i></a>\
                                        </div>\
                                    </div>\
                                </div>\
                                <div class="form-group">\
                                    <label for="Category1">Upscales short description</label>\
                                    <textarea name="step4['+HotId+'][upscales]['+expUpScalesRow+'][description]" class="form-control" rows="7" id="UpscalesDesc-'+expUpScalesRow+'" required="" data-msg-required="Please provide description">'+pHUdescription+'</textarea>\
                                </div>\
                                <div class="form-group">\
                                    <div class="custom_full_control"> <label>Gallery</label>';
                                    if(pHUimage){
                                            htmls += '<div class="image_galller">\
                                                <img src="'+pHUimage+'">\
                                                <input name="step4['+HotId+'][upscales]['+expUpScalesRow+'][images_new][]" type="hidden" value="'+pHUImageSrc+'">\
                                            </div>';
                                    }
                                        htmls += '<div class="imageGalllerAppend_5454'+expUpScalesRow+'"></div>\
                                        <div class="brw_bx image_galller">\
                                            <div class="browse_btn"> \
                                                <input type="file" class="filesCls" name="step4['+HotId+'][upscales]['+expUpScalesRow+'][images][]" multiple="" id="5454'+expUpScalesRow+'" data-id="5454'+expUpScalesRow+'" accept="image/*">\
                                                <div class="brw_user_ic"> <i class="far fa-images"></i>\
                                                    <div class="brw_plus"> <i class="fas fa-plus"></i> </div>\
                                                </div>\
                                            </div>\
                                        </div>\
                                    </div>\
                                </div>\
                            </div>\
                        </div>';
                expUpScalesRow++;
            }
            $('.UpScRow'+HotId).html(htmls);
            previewImageFun();
          return false;
        },
    });
}


$(document).on('click', '.removeHotelDetailCls', function() {
    var id = $(this).attr('data-id');
    var _this = $(this);
    if(id != ''){
        if(confirm('Are you sure you want to delete this hotel?')){
            $('.loader').show();    
            $.ajax({
                url: base_url+'/super-user/ex-hotel-remove',
                type: 'POST',
                 // dataType: 'json',
                data: {'ex_hotel_id':id},
                success: function(data) {
                    $('.loader').hide(); 
                    _this.closest('.hotelRowCls').remove();
                    hotelCntSet();
                },
                error: function(e) {
                }
            });
        }
    }else{
        $(this).closest('.hotelRowCls').remove();
        hotelCntSet();
    }
});

function hotelCntSet(){
    var cnt = 1;
    $(".hotelCntCls").each(function() {
        $(this).html('Hotel '+cnt);
        cnt++;
    });
}

// $(document).on('click', '.removeExperiencesExpCls', function() {
//     $(this).closest('.partOneCls').remove();
// });

$(document).on('click', '.removeHotelDatesClsEdit', function() {
    var dataId = $(this).attr('data-id');
    $('.loader').show();    
    $.ajax({
        url: base_url+'/super-user/delete-hotel-date-rate',
        type: 'POST',
         // dataType: 'json',
        data: {'experiences_to_hotels_to_experience_dates_id':dataId},
        success: function(data) {
            $('.loader').hide();    
            $('.rows'+dataId).next('hr').remove();
            $('.rows'+dataId).remove();
        },
        error: function(e) {
        }
    });

});

$(document).on('click', '.hotelMainDatesCls', function() {
    var dataId = $(this).attr('data-id');
    var dataType = $(this).attr('data-type');
    var dateid = $(this).attr('data-dateid');
    var hotelId = $('.chHotelCls'+dataId).val();
    var experienceId = $('.experienceId').val();
    // alert(hotelId);
    $('.hotelMainDatesCls').removeClass('lastSelectCls');
    $(this).addClass('lastSelectCls');
    $('.loader').show();    
    $.ajax({
        url: base_url+'/super-user/stocklist-hotel-dates-tour',
        type: 'POST',
         // dataType: 'json',
        data: {'hotel_id':hotelId,'experienceId':experienceId,'dataType':dataType,'dateid':dateid},
        success: function(data) {
            $('.hotelDatesModalAppendCls').html(data.response);
            var hotelDateCount = $('.hotelDateCount').val();
            if(hotelDateCount == 1){
                $('.hotelDatesMainCls').addClass('isSelectCls');
                // $('.saveAllChangesBtn').trigger('click');
            }else{
                $('#hotelDatesModal').modal('show');

            }
            select2Load();
            $('.hdioCls').hide();
            $('.loader').hide();    
        },
        error: function(e) {
        }
    });

});
$(document).on('change', '.hotelMainCls', function() {
    var hotelId = $(this).val();
    var dataId = $(this).attr('data-id');
    if(hotelId != ''){
        $('.hmdc'+dataId).show();
        $('.hmdcAfter'+dataId).hide();
        $('.afterSelectCls'+dataId).hide();
        $('.hmdcNewSelect'+dataId).val('');
    }else{
        $('.hmdc'+dataId).hide();
    }
});


$(document).on('click', '.saveAllChangesBtn', function() {
    e.preventDefault();
    var hotelId = $('.hotelMainIdCls').val();
    if ($(".isSelectCls")[0]){

        if(confirm("By confirming this change the Collaborator will need to re-sign the ETC. Please confirm this is ok with you?"))
        {
            $('.loader').show();    
            var formData = $('.isSelectCls form.datesUpdate').serialize();    
            $.ajax({
                url: base_url+'/super-user/stocklist-hotel-dates-update',
                type: 'POST',
                 // dataType: 'json',
                data: {'formData':formData},
                success: function(data) {
                    $('.loader').hide();    

                    
                    $('.addMoreDateCls').trigger('click');
                    var selectdateId = $('.isSelectCls').attr('data-id');
                    var dateInCls = $('#DateInMain'+selectdateId).val();
                    var dateOutCls = $('#DateOutMain'+selectdateId).val();
                    var dataId = $('.lastSelectCls').attr('data-id');

                    $('.hmdc'+dataId).hide();
                    // $('.hmdcAfter'+dataId).show();
                    $('.afterSelectCls'+dataId).html(dateInCls+' - '+dateOutCls);
                    $('.afterSelectCls'+dataId).show();
                    $('.hmdcNewSelect'+dataId).val(selectdateId);
                    
                    var aaa = $('.hmdcNewSelect'+dataId).closest('.appendDates8Step1').find('.removeHotelDatesCls');
                    aaa.attr('data-id',data);

                    $('.isSelectCls').removeClass('isSelectCls');
                    $('.lastSelectCls').removeClass('lastSelectCls');
                    $('#hotelDatesModal').modal('hide');
                    console.log('1111');
                },
                error: function(e) {
                }
            });
        }
        

    } else {
        toastError('Please select atleast one dates');
    }
});

$(document).on('change', '.checkDivClass', function(){
    $('div.hotelDatesMainCls').removeClass("isSelectCls");
    if($(this).is(":checked")) {
        $(this).closest('div.hotelDatesMainCls').addClass("isSelectCls");
    }
});
/*var childElementClicked;
$(document).on('click', '.hotelDatesMainCls', function() {
    $(document).on('click', '.notClickedCls , .select2, .select2-selection__rendered', function() {
       childElementClicked = true;
    });
    if( childElementClicked != true ) {
        // It is clicked on parent but not on child.
        // Now do some action that you want.
        // alert('Clicked on parent');    
        if($('.hotelDatesMainCls').hasClass('isSelectCls')){
            $('.hotelDatesMainCls').removeClass('isSelectCls');
        }
        $(this).toggleClass('isSelectCls');
    }else{
      // alert('Clicked on child');
    }    
    childElementClicked = false;
    
});*/

/*$(document).on('change', '.hotelMainCls', function() {
    var hotelId = $(this).val();
    var dataId = $(this).attr('data-id');
    $('.loader').show();    
    $.ajax({
        url: base_url+'/super-user/stocklist-hotel-dates-list',
        type: 'POST',
         // dataType: 'json',
        data: {'hotel_id':hotelId, 'dataId':dataId},
        success: function(data) {
            $('.loader').hide();    
            $('.hmdc'+dataId).html(data.response);
        },
        error: function(e) {
        }
    });
}); */

$(document).on('click', '.rightSideClk', function() {
    var id = $(this).attr('data-id');
    var nextid = $(this).attr('data-nextid');
    // alert('123');
    $('.tourStepCls').hide();
    $('.tourStep_'+id).show();
    // $('.backArrowBtnCls'+id).show();
    $('.nextBtnCls').attr('data-id', id);
    $('.nextBtnCls').attr('data-nextid', nextid);
    
    var backStep = id;
    var maxId = parseInt($('.nextBtnCls').attr('data-maxId'), 10);
    
    $('.nextBtnCls').show(); 
    $('.publishLiveBtn').prop('disabled', true);
    $('.publishLiveBtn').addClass('disabledCls');    
    if(backStep == 10){
        $('.publishLiveBtn').prop('disabled', false);
        $('.nextBtnCls').hide();
        $('.publishLiveBtn').removeClass('disabledCls');
    }
});
