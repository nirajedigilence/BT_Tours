$(document).ready(function(){	
});

$(document).on('click', '.shareLinkCls', function() {
	var protoTypeId = $(this).attr('data-id');
    var protoid = $(this).attr('data-protoid');
	$('.loader').show();	
	$.ajax({
        url: base_url+'/super-user/prototypes-share',
        type: 'POST',
         // dataType: 'json',
        data: {'product_id':protoTypeId, 'protoid':protoid},
        success: function(data) {
        	$('.appendModalData').html(data.response);
        	$('#prototypeShareModal').modal('show');
			$('.loader').hide();	
        },
        error: function(e) {
        }
    });
});

$(document).on('click', '.cloneUrlCls', function() {
    var copyText = document.getElementById("copyUrlCls");
    console.log(copyText);
    copyText.select();
    copyText.setSelectionRange(0, 99999)
    document.execCommand("copy");
});

$(document).on('click', '.notesLinkCls', function() {
    var protoTypeId = $(this).attr('data-id');
    var protoid = $(this).attr('data-protoid');
    $('.loader').show();    
    $.ajax({
        url: base_url+'/super-user/products-notes',
        type: 'POST',
         // dataType: 'json',
        data: {'product_id':protoTypeId},
        success: function(data) {
            $('.product_notes').val(data.response);
            $('#proToId').val(protoid);
            $('#productId').val(protoTypeId);
            $('#prototypeNotesModal').modal('show');
            $('.loader').hide();    
        },
        error: function(e) {
        }
    });
});

$(document).on('click', '.removeLinkCls', function() {
    var protoTypeId = $(this).attr('data-id');
    var protoid = $(this).attr('data-protoid');
    $('#proTosId').val(protoid);
    $('#productsId').val(protoTypeId);
    $('#removeProductModal').modal('show');
});

$(document).on('click', '.MoveLinkCls', function() {
    var protoTypeId = $(this).attr('data-id');
    var protoid = $(this).attr('data-protoid');
    $('.loader').show();    
    $.ajax({
        url: base_url+'/super-user/products-move',
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

$(document).on('click', '.likeProCls', function() {
    var isLike = $(this).attr('data-like');
    var productId = $('.productId').val();

    $('.likeProCls').removeClass('likeCls');
    $('.likeProCls').addClass('disLikeCls');
    $(this).removeClass('disLikeCls');
    $(this).addClass('likeCls');

    $('.loader').show();    
    $.ajax({
        url: base_url+'/products-like',
        type: 'POST',
         // dataType: 'json',
        data: {'product_id':productId, 'isLike':isLike},
        success: function(data) {
            $('.loader').hide();    
        },
        error: function(e) {
        }
    });

});
$(document).on('click', '.commentsLinkCls', function() {
    $('.loader').show();    
    var productId = $(this).attr('data-id');
    var protoid = $(this).attr('data-protoid');
    $.ajax({
        url: base_url+'/products-comment',
        type: 'POST',
        data: {'product_id':productId, 'proToId':protoid},
        success: function(data) {
            $('.appendCommentModalData').html(data.response)
            $('#productCommentModal').modal('show');
            $('.loader').hide();   
        },
        error: function(e) {
        }
    });
});

$(document).on('click', '.postBtnCls', function() {
    var commentBoxCls = $('.commentBoxCls').val();
    commentBoxCls = commentBoxCls.trim();
    if(commentBoxCls != ''){
        $('.loader').show();    
        var productId = $('.productIdsCls').val();
        $.ajax({
            url: base_url+'/products-notes-store',
            type: 'POST',
            data: {'product_id':productId, 'commentBoxCls':commentBoxCls},
            success: function(data) {
                $('#productCommentModal').modal('hide');
                toastSuccess('Prototype Comment added successfully.');
                $('.loader').hide();   
            },
            error: function(e) {
            }
        });
    }else{
        toastError('Please fill the Comment');
    }
});
