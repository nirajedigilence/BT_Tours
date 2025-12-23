$(document).ready(function(){
	$('#addPrototypeForm').validate(addPrototypeValidateOpt);
    $('#addPrototypeNameForm').validate(addPrototypeNameValidateOpt);
    $('#addPrototypeNotesForm').validate(addPrototypeNameValidateOpt);
});

addPrototypeValidateOpt = {
    invalidHandler: function(event, validator) {
        var errors = validator.numberOfInvalids();
        if (errors) {
            $('span.error').hide();
        }
    },
    rules: {
        'prototype[name]': {
            required: true,
        },
        'prototype[country_id]': {
            required: true
        }

    },
    errorElement: 'div',
    messages: {
        'prototype[name]': {
            required: "please provide name",
        },
        'prototype[country_id]': {
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
addPrototypeNameValidateOpt = {
    invalidHandler: function(event, validator) {
        var errors = validator.numberOfInvalids();
        if (errors) {
            $('span.error').hide();
        }
    },
    rules: {
        'prototype[name]': {
            required: true,
        },
        'prototype[notes]': {
            required: true,
        }

    },
    errorElement: 'div',
    messages: {
        'prototype[name]': {
            required: "please provide name",
        },
        'prototype[notes]': {
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