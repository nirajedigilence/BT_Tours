$(document).ready(function(){	
});

$(document).on('click', '.likeProCls', function() {
    var isLike = $(this).attr('data-like');
    if($(this).hasClass('likeCls')){
        return true;
    }else{
        $(this).attr("disabled","disabled");
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
                if(isLike == 1){
                    toastSuccess('Product like successfully.');
                }else{
                    toastSuccess('Product unlike successfully.');
                } 
            },
            error: function(e) {
            }
        });        
    }
});

$(document).on('click', '.postBtnCls', function() {
    var commentBoxCls = $('.commentBoxCls').val();
    commentBoxCls = commentBoxCls.trim();
    if(commentBoxCls != ''){
        $('.loader').show();    
        var productId = $('.productId').val();
        $.ajax({
            url: base_url+'/products-notes-store',
            type: 'POST',
            data: {'product_id':productId, 'commentBoxCls':commentBoxCls},
            success: function(data) {
                $('#productCommentModal').modal('hide');
                toastSuccess('Product Comment added successfully.');
                $('.loader').hide();   
            },
            error: function(e) {
            }
        });
    }else{
        toastError('Please fill the Comment');
    }
});

$(document).on('click', '.CommentsBtnCls', function() {
    $('.loader').show();    
    var productId = $('.productId').val();
    $.ajax({
        url: base_url+'/products-comment',
        type: 'POST',
        data: {'product_id':productId},
        success: function(data) {
            $('.appendCommentModalData').html(data.response)
            $('#productCommentModal').modal('show');
            $('.loader').hide();   

        },
        error: function(e) {
        }
    });
});
