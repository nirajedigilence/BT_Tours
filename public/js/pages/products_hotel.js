$(document).ready(function(){
	$('#example-square').barrating('show', {
        theme: 'bars-square',
        showValues: true,
        showSelectedRating: true
    });
    $('#addProductHotelForm').validate(addProductHotelValidateOpt);
    productScoreAmt();
     $('.phoneNum').mask('+00-0000-0000-00');
});

$(document).on('click', '.removeAddAmebtn', function() {
    var thisVal = $(this).attr('data-id');
    $('.ameDiv_'+thisVal).remove();
});

$(document).on('click', '.removeAmebtn', function() {
    var thisVal = $(this).attr('data-id');
    $('.amenitiesId').val(thisVal);
    $('#productAmenitiesModal').modal('show');
});

$(document).on('click', '.removeAmenitiesBtn', function() {
    var amenitiesId = $('.amenitiesId').val();
    $('.loader').show();    
    $.ajax({
        url: base_url+'/super-user/products-hotel-amenities-remove',
        type: 'POST',
        data: {'id':amenitiesId},
        success: function(data) {
            $('.ameEditDiv_'+amenitiesId).remove();
            $('#productAmenitiesModal').modal('hide');
            toastSuccess('Amenities deleted successfully.');
            $('.loader').hide();   
        },
        error: function(e) {
        }
    });
});


$(document).on('click', '.addmorelnk', function() {
	var thisVal = $(this).attr('data-id');
	var htmls = '';
	var sectionInclusions = $('.section_inclusions_'+thisVal).val();
	sectionInclusions = parseInt(sectionInclusions);
	sectionInclusions = sectionInclusions+1;
	var htmlId = 'inclusions_'+thisVal+'_'+sectionInclusions;
	htmls += '<div class="row ameDiv_'+sectionInclusions+'">\
                <div class="col-sm-10">\
                    <input class="form-control" name="product_amenities['+sectionInclusions+']" type="text" id="'+htmlId+'" value="" >\
                </div>\
                <div class="col-sm-2">\
                    <a href="javascript:;" class="nhSubCloseCls removeAddAmebtn" data-id="'+sectionInclusions+'" >x</a>\
                </div>\
            </div>';
	
	$('.section_inclusions_'+thisVal).val(sectionInclusions);
	$('.customFullControlInclusionsCls'+thisVal).append(htmls);
	$('#'+htmlId).trigger('blur');
	$('#'+htmlId).rules('add', {
        required: true,
        messages: {
            required: "Please provide amenities"
        },
    });
});

addProductHotelValidateOpt = {
    invalidHandler: function(event, validator) {
        var errors = validator.numberOfInvalids();
        if (errors) {
            $('span.error').hide();
        }
    },
    rules: {
    	'product_hotel[name]': {
            required: true,
        },
        'product_hotel[cost]': {
            required: true,
        },
        'product_hotel[star_rating]': {
            required: true,
        },
        'product_hotel[town_city]': {
            required: true,
        },
        'product_hotel[brand]': {
            required: true,
        },
        'product_hotel[owner]': {
            required: true,
        },
        'product_hotel[website_url]': {
            required: true,
        },
        'product_hotel[contact_number]': {
            required: true,
        },
        'product_hotel[menu_url]': {
            required: true,
        },
        'product_hotel[location_link]': {
            required: true,
        },
        'product_hotel[booking_url]': {
            required: true,
        },
        'product_hotel[triadvisor_url]': {
            required: true,
        },
        'product_hotel[story]': {
            required: true,
        },
        'product_hotel[map]': {
            required: true,
        },
        'country_area_id': {
            required: true,
        },
        'product_scroe[option_rooms]': {
            required: true,
        },
        'product_scroe[option_rooms_value]': {
            required: true,
        },
        'product_scroe[flexibility]': {
            required: true,
        },
        'product_scroe[flexibility_value]': {
            required: true,
        },
        'product_scroe[tour_pack]': {
            required: true,
        },
        'product_scroe[tour_pack_value]': {
            required: true,
        },
        'product_scroe[problem_resolution]': {
            required: true,
        },
        'product_scroe[problem_resolution_value]': {
            required: true,
        },
        'product_scroe[veenus_charter]': {
            required: true,
        },
        'product_scroe[veenus_charter_value]': {
            required: true,
        },
        'product_amenities[1]': {
            required: true,
        },
        'upscales[1][name]': {
            required: true,
        },
        'upscales[1][description]': {
            required: true,
        },
        'upscales[1][cost]': {
            required: true,
        },
    },
    errorElement: 'div',
    messages: {
        'product_amenities[name]': {
            required: "please provide amenities",
        },
        'product_hotel[name]': {
            required: "please provide name",
        },
        'product_hotel[cost]': {
            required: "please provide cost",
        },
        'product_hotel[star_rating]': {
            required: "please provide start rating",
        },
        'product_hotel[town_city]': {
            required: "please provide city",
        },
        'product_hotel[brand]': {
            required: "please provide brand",
        },
        'product_hotel[owner]': {
            required: "please provide owner",
        },
        'product_hotel[website_url]': {
            required: "please provide website url",
        },
        'product_hotel[contact_number]': {
            required: "please provide contact number",
        },
        'product_hotel[menu_url]': {
            required: "please provide menu url",
        },
        'product_hotel[location_link]': {
            required: "please provide location link",
        },
        'product_hotel[booking_url]': {
            required: "please provide booking url",
        },
        'product_hotel[triadvisor_url]': {
            required: "please provide triadvisor url",
        },
        'product_hotel[story]': {
            required: "please provide story",
        },
        'product_hotel[map]': {
            required: "please provide map url",
        },
        'country_area_id': {
            required: "please provide country",
        },
        'product_scroe[option_rooms]': {
            required: "please provide name",
        },
        'product_scroe[option_rooms_value]': {
            required: "please provide value",
        },
        'product_scroe[flexibility]': {
            required: "please provide name",
        },
        'product_scroe[flexibility_value]': {
            required: "please provide value",
        },
        'product_scroe[tour_pack]': {
            required: "please provide name",
        },
        'product_scroe[tour_pack_value]': {
            required: "please provide value",
        },
        'product_scroe[problem_resolution]': {
            required: "please provide name",
        },
        'product_scroe[problem_resolution_value]': {
            required: "please provide value",
        },
        'product_scroe[veenus_charter]': {
            required: "please provide name",
        },
        'product_scroe[veenus_charter_value]': {
            required: "please provide value",
        },
        'upscales[1][name]': {
            required: "please provide name",
        },
        'upscales[1][description]': {
            required: "please provide description",
        },
        'upscales[1][cost]': {
            required: "please provide cost",
        },
        
    },
    errorPlacement: function(error, element) {
        if (element.hasClass('company_image')) {
            error.insertAfter($('.errorCls'));
        }else{
            error.insertAfter($(element));
        }
    },
    submitHandler: function(form) {
        $('[type="submit"]').prop('disabled', true);
        return true;
        // alert('Reach Here');
        // return false;
    },
};

$(document).on('change', '.slideSelectCls', function() {
	productScoreAmt();
});

function productScoreAmt() {
	var cnts = 0;
	$('.slideSelectCls').each(function() {
		var thisVal = $(this).val();
		if(thisVal){
			cnts = cnts + parseFloat(thisVal);
		}
	});
    var countScore = 0;
    countScore = cnts*100/15;
    console.log(countScore);
    countScore = countScore.toFixed(0);

	$('.scorePerCls').html(countScore+'%');
    $('.productScore').val(countScore);
    $('.productScoreTotal').val(cnts);
    if(countScore > 74){
        $('.scorePerCls').css({
            'color': 'green'
        });        
    }else if(countScore > 49){
        $('.scorePerCls').css({
            'color': '#FCA311'
        });  
    }else if(countScore > 24){
        $('.scorePerCls').css({
            'color': 'black'
        });  
    }else{
        $('.scorePerCls').css({
            'color': 'red'
        });  
    }
    $('.LastTotalSubCls').html(cnts);
}


$(document).on('click', '.addmoreUpscales', function() {
    var thisVal = $(this).attr('data-id');
    var htmls = '';
    var sectionUpscales = $('.upscales_'+thisVal).val();

    sectionUpscales = parseInt(sectionUpscales);
    sectionUpscales = sectionUpscales+1;
    var upscalesMapId = 'upscales_map_'+sectionUpscales;
    var upscalesDescId = 'upscales_description_'+sectionUpscales;
    var upscalesCostId = 'upscales_cost_'+sectionUpscales;
    // htmls += '<input class="form-control" name="product_amenities['+sectionUpscales+']" type="text" id="'+htmlId+'" value="" >';
    htmls += '<div class="partOneCls">\
                <div class="row">\
                    <div class="col-sm-10">\
                        <div class="form-group"> \
                            <label>Upscale title</label> \
                            <input class="form-control" name="upscales['+sectionUpscales+'][name]" type="text"  value="" maxlength="255" id="'+upscalesMapId+'"> \
                        </div>\
                    </div>\
                </div>    \
            </div>    \
            <div class="partOneCls">\
                <div class="row">\
                    <div class="col-sm-10">\
                        <div class="form-group">\
                            <div class="custom_full_control"> \
                                <label>Upscale short description</label>\
                                <textarea rows="4" name="upscales['+sectionUpscales+'][description]" id="'+upscalesDescId+'"></textarea> \
                            </div>\
                        </div>\
                    </div>\
                </div>\
            </div>\
            <div class="partOneCls">\
                <div class="row">\
                    <div class="col-sm-10">\
                        <div class="form-group">\
                            <label>Upscale Cost</label> \
                            <input class="form-control" name="upscales['+sectionUpscales+'][cost]" type="number"  value="" maxlength="255" id="'+upscalesCostId+'"> \
                        </div>\
                    </div>\
                </div>\
            </div>\
            <div class="fl_w comman part_six">\
                <div class="form-group">\
                    <div class="custom_full_control"> <label>Gallery</label>\
                        <div class="brw_bx image_galller">\
                            <div class="browse_btn"> \
                                <input type="file" name="upscales['+sectionUpscales+'][image]" accept="image/*">\
                                <div class="brw_user_ic"> <i class="far fa-images"></i>\
                                    <div class="brw_plus"> <i class="fas fa-plus"></i> </div>\
                                </div>\
                            </div>\
                        </div>\
                    </div>\
                </div>\
            </div>';
    
    $('.upscales_'+thisVal).val(sectionUpscales);
    $('.upscalesAppendCls').append(htmls);
    $('#'+upscalesMapId).rules('add', {
        required: true,
        messages: {
            required: "Please provide name"
        },
    });
    $('#'+upscalesDescId).rules('add', {
        required: true,
        messages: {
            required: "Please provide description"
        },
    });
    $('#'+upscalesCostId).rules('add', {
        required: true,
        messages: {
            required: "Please provide cost"
        },
    });
});