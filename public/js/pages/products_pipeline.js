$(document).ready(function(){
	$('#example-square').barrating('show', {
        theme: 'bars-square',
        showValues: true,
        showSelectedRating: true
    });
    $('#addProductExperienceForm').validate(addProductExperienceValidateOpt);
    productScoreAmt();
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
        url: base_url+'/super-user/products-experience-inclusions-remove',
        type: 'POST',
        data: {'id':amenitiesId},
        success: function(data) {
            $('.ameEditDiv_'+amenitiesId).remove();
            $('#productAmenitiesModal').modal('hide');
            toastSuccess('Inclusions deleted successfully.');
            $('.loader').hide();   
        },
        error: function(e) {
        }
    });
});
$(document).on('click', '.removeAddAmebtn', function() {
    var thisVal = $(this).attr('data-id');
    $('.ameDiv_'+thisVal).remove();
});

$(document).on('click', '.addmorelnk', function() {
	var thisVal = $(this).attr('data-id');
	var htmls = '';
	var sectionInclusions = $('.section_inclusions_'+thisVal).val();
	sectionInclusions = parseInt(sectionInclusions);
	sectionInclusions = sectionInclusions+1;
	var htmlId = 'inclusions_'+thisVal+'_'+sectionInclusions;
	// htmls += '<input class="form-control" name="product_experience_inclusions['+sectionInclusions+']" type="text" id="'+htmlId+'" value="" >';
    htmls += '<div class="row ameDiv_'+sectionInclusions+'">\
                <div class="col-sm-10">\
                    <input class="form-control" name="product_experience_inclusions['+sectionInclusions+']" type="text" id="'+htmlId+'" value="" >\
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
            required: "Please provide inclusions"
        },
    });
});

addProductExperienceValidateOpt = {
    invalidHandler: function(event, validator) {
        var errors = validator.numberOfInvalids();
        if (errors) {
            $('span.error').hide();
        }
    },
    rules: {
    	'product_experience[name]': {
            required: true,
        },
        'product_experience[cost]': {
            required: true,
        },
        'product_experience[considering]': {
            required: true,
        },
        'product_experience[score]': {
            required: true,
        },
        'product_experience[tripadvisor_url]': {
            required: true,
        },
        'product_experience[website]': {
            required: true,
        },
        'product_experience[map]': {
            required: true,
        },
        'product_experience[mobility]': {
            required: true,
        },
        'product_experience[story]': {
            required: true,
        },
        'product_experience[experience]': {
            required: true,
        },
        'product_experience[inclusions][1]': {
            required: true,
        },
        'product_experience[images]': {
            required: true,
        },
        'product_scroe[brand]': {
            required: true,
        },
        'product_scroe[brand_value]': {
            required: true,
        },
        'product_scroe[visuals]': {
            required: true,
        },
        'product_scroe[visuals_value]': {
            required: true,
        },
        'product_scroe[exclusive_access]': {
            required: true,
        },
        'product_scroe[exclusive_access_value]': {
            required: true,
        },
        'product_scroe[combination]': {
            required: true,
        },
        'product_scroe[combination_value]': {
            required: true,
        },
        'product_scroe[shelf_life]': {
            required: true,
        },
        'product_scroe[shelf_life_value]': {
            required: true,
        },
        'product_scroe[location]': {
            required: true,
        },
        'product_scroe[location_value]': {
            required: true,
        },
        'product_scroe[date_limited]': {
            required: true,
        },
        'product_scroe[date_limited_value]': {
            required: true,
        },

    },
    errorElement: 'div',
    messages: {
        'product_experience[name]': {
            required: "please provide name",
        },
        'product_experience[cost]': {
            required: "please provide cost",
        },
        'product_experience[considering]': {
            required: "please provide considering",
        },
        'product_experience[score]': {
            required: "please provide score",
        },
        'product_experience[tripadvisor_url]': {
            required: "please provide tripadvisor url",
        },
        'product_experience[website]': {
            required: "please provide website",
        },
        'product_experience[map]': {
            required: "please provide map",
        },
        'product_experience[mobility]': {
            required: "please provide mobility",
        },
        'product_experience[story]': {
            required: "please provide story",
        },
        'product_experience[experience]': {
            required: "please provide experience",
        },
        'product_experience[inclusions][1]': {
            required: "please provide inclusions",
        },
        'product_scroe[brand]': {
            required: "please provide brand name",
        },
        'product_scroe[brand_value]': {
            required: "please provide brand score",
        },
        'product_scroe[visuals]': {
            required: "please provide visuals name",
        },
        'product_scroe[visuals_value]': {
            required: "please provide visuals score",
        },
        'product_scroe[exclusive_access]': {
            required: "please provide exclusive access name",
        },
        'product_scroe[exclusive_access_value]': {
            required: "please provide exclusive access score",
        },
        'product_scroe[combination]': {
            required: "please provide combination name",
        },
        'product_scroe[combination_value]': {
            required: "please provide combination score",
        },
        'product_scroe[shelf_life]': {
            required: "please provide shelf life name",
        },
        'product_scroe[shelf_life_value]': {
            required: "please provide shelf life score",
        },
        'product_scroe[location]': {
            required: "please provide location name",
        },
        'product_scroe[location_value]': {
            required: "please provide location score",
        },
        'product_scroe[date_limited]': {
            required: "please provide date limited name",
        },
        'product_scroe[date_limited_value]': {
            required: "please provide date limited score",
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
    countScore = cnts*100/21;
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