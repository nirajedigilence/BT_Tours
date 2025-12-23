$(document).ready(function(){
    $('#storeProductsForm').validate(addProductValidateOpt);
});
$(document).on('click', '.addProductBtn', function() {
    $('#prototypeNotesModal').modal('show');
});
$(document).on('click', '.disableProductCls', function() {
    var tourId = $(this).attr('data-id');
    $('.experiences_id').val(tourId);
    $('#removeTourModal').modal('show');
});

$(document).on('click', '.activeStatusCls', function() {
    var exId = $(this).attr('data-id');
    if(this.checked) {
    var active = '1';
    }else{
    var active = '2';
    }
    $('.loader').show();    
    $.ajax({
        url: base_url+'/super-user/experiences-status-update',
        type: 'POST',
         // dataType: 'json',
        data: {'id':exId, 'active':active},
        success: function(data) {
            $('.loader').hide(); 
            toastSuccess('Status updated successfully!');   
        },
        error: function(e) {
        }
    });
});

$(document).on('click', '.MoveLinkCls', function() {
    var protoTypeId = $(this).attr('data-id');
    var protoid = $(this).attr('data-protoid');
    $('.loader').show();    
    $.ajax({
        url: base_url+'/super-user/experiences-move',
        type: 'POST',
         // dataType: 'json',
        data: {'product_id':protoTypeId, 'proToId':protoid},
        success: function(data) {
            $('.formGroupCls').html(data.response);
            $('#proToMoveId').val(protoid);
            $('#productMoveId').val(protoTypeId);
            $('#prototypeMoveModal').modal('show');
            $('.loader').hide();    
        },
        error: function(e) {
        }
    });
});
$(document).on('click', '.DuplicateTourCls', function() {
    var protoTypeId = $(this).attr('data-id');
    var protoid = $(this).attr('data-protoid');
	console.log(protoTypeId+"Test"+protoid);
	console.log();
    $('.loader').show();    
    $.ajax({
        url: base_url+'/super-user/experiences-duplicate',
        type: 'POST',
         // dataType: 'json',
        data: {'product_id':protoTypeId, 'proToId':protoid},
        success: function(data) {
            $('#duplicateProductsForm .formGroupCls').html(data.response);
            $('#duplicateProductsForm #proToMoveId').val(protoid);
            $('#duplicateProductsForm #productMoveId').val(protoTypeId);
            $('#prototypeDuplicateModal').modal('show');
            $('.loader').hide();    
        },
        error: function(e) {
        }
    });
});

addProductValidateOpt = {
    invalidHandler: function(event, validator) {
        var errors = validator.numberOfInvalids();
        if (errors) {
            $('span.error').hide();
        }
    },
    rules: {
        'tour_type': {
            required: true,
        }
    },
    errorElement: 'div',
    messages: {
        'tour_type': {
            required: "please provide type",
        }
        
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
        // var tour_type = $('.tour_type').val();
        // var URL_ = base_url+'/super-user/products-tour/'+tour_type;
        // location.reload(URL_);
        // alert(tour_type);
        return true;
    },
};

$(document).on('click', '.removeProductBtn', function() {
    var proToId = $(this).attr('data-id');
    $('.prototype_id').val(proToId);
    $('#removePrototypeModal').modal('show');
});