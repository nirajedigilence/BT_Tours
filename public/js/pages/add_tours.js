$(document).ready(function(){
	$('#addTourForm').validate(addToursValidateOpt);
    $('#addToursNameForm').validate(addTourNameValidateOpt);
    $('#addTourNotesForm').validate(addTourNameValidateOpt);
});

addToursValidateOpt = {
    invalidHandler: function(event, validator) {
        var errors = validator.numberOfInvalids();
        if (errors) {
            $('span.error').hide();
        }
    },
    rules: {
        'tour[name]': {
            required: true,
        },
        'tour[country_id]': {
            required: true
        }

    },
    errorElement: 'div',
    messages: {
        'tour[name]': {
            required: "please provide name",
        },
        'tour[country_id]': {
            required: "please select country",
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
        return true;
    },
};
addTourNameValidateOpt = {
    invalidHandler: function(event, validator) {
        var errors = validator.numberOfInvalids();
        if (errors) {
            $('span.error').hide();
        }
    },
    rules: {
        'tour[name]': {
            required: true,
        },
        'tour[notes]': {
            required: true,
        }

    },
    errorElement: 'div',
    messages: {
        'tour[name]': {
            required: "please provide name",
        },
        'tour[notes]': {
            required: "please provide notes",
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
        return true;
    },
};

$(document).on('click', '.prototypeNotesCls', function() {
    var proToId = $(this).attr('data-id');
    var prototypeNotes = $('.prototypeNotes_'+proToId).val();
    var prototypeName = $('.prototypeName_'+proToId).val();
    $('.prototype_id').val(proToId);
    $('.prototypeNotes').val(prototypeNotes);
    $('.modalTitleCls').html(prototypeName);
    $('#addNotesModal').modal('show');
});

$(document).on('click', '.prototypeNameCls', function() {
    var proToId = $(this).attr('data-id');
    var prototypeName = $('.prototypeName_'+proToId).val();
    $('.prototype_id').val(proToId);
    $('.prototypeName').val(prototypeName);
    $('#addNameModal').modal('show');
});

$(document).on('click', '.prototypeRemoveCls', function() {
    var proToId = $(this).attr('data-id');
    $('.prototype_id').val(proToId);
    $('#removePrototypeModal').modal('show');
});