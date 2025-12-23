function toastSuccess(msg) {
    iziToast.destroy();
    iziToast.success({
        backgroundColor: '#76bf73',
        messageColor: '#fff',
        titleColor: '#fff',
        icon: 'fa fa-check',
        iconColor: '#fff',
        transitionIn: 'bounceInRight',
        title: 'Success!',
        message: "" + msg
    });
}
function toastError(msg) {
    iziToast.destroy();
    iziToast.error({
        backgroundColor: '#BC5459',
        messageColor: '#fff',
        titleColor: '#fff',
        icon: 'fa fa-ban',
        iconColor: '#fff',
        transitionIn: 'bounceInRight',
        title: 'Error!',
        message: "" + msg
    });
}
function save_guest_list()
{
     $.ajax({
                url: $(form).attr('action'),
                type: 'POST',
                dataType: 'JSON',
                cache: false,
                mimeType: "multipart/form-data",
                contentType: false,
                processData: false,
                // data: formData,
                data: userFormMainData,
                beforeSend: function() {
                }
            }).done(function(data) {

                // alert(data.cart_experience_rooms_sold);
                 userFormMainData = new FormData();
                
                toastSuccess('Data store successfully.');
               
                $('.loader').hide();
                
               
            });
}
    $(document).on('click','.saveChangesBtn', function(){
        if($('.custom_chkbox:checked').length == 0)
        {
            alert ( "ERROR! Please select at least one Mark as paid checkbox" );
        }else{

           /* var checkss = [];
            $( '.custom_chkbox:checked' ).each(function( index ) {
                
               var name =  $(this).parent().parent().parent().parent().find('td:nth(1)').find('input').val();
                //$(this).parent().parent().parent().parent().parent().find('td:nth(2)').find('input').val()
                if(name==""){
                    checkss.push('1');
                }
                //debugger;


            });

            if(checkss.length){
                alert ( "ERROR! Please enter name of the selected room." );
                return false;
            }*/

            
            $('#addRoomsMain').trigger('click');

        }

    });
    addDataUpdateNumberHolderValidateOpt = {
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
         },
        messages: {
            'step1[experience_categories_ids][]': {
                required: "Please select category",
            },
        },
        errorPlacement: function(error, element) {
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
            var params = $(form).serializeArray();
            $.each(params, function(i, val) {
                userFormMainData.append(val.name, val.value);
            });
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
                data: userFormMainData,
                beforeSend: function() {
                }
            }).done(function(data) {

                // alert(data.cart_experience_rooms_sold);
                 userFormMainData = new FormData();
                
                //toastSuccess('Data store successfully.');
                var role = $('#current_role').val();
                var update_traking_complated = $('#update_traking_complated').val();
                var save_guest_list = $('#save_guest_list').val();
                var cruise_guest_list = $('#cruise_guest_list').val();
                
                if(update_traking_complated == 1)
                {
                    $.ajax({
                        url: base_url+"/complete-traking/"+$('#current_cart_id').val()+"/"+$('#c_step').val(),
                        type: 'POST',
                         data: {'step':'6','cart_id':$('#current_cart_id').val()},
                        dataType: 'JSON',
                        cache: false,
                        mimeType: "multipart/form-data",
                        contentType: false,
                        processData: false,
                        beforeSend: function() {
                        }
                    }).done(function(data) {
                        $.fancybox.open(
                            $("#PastbookingFormBox-"+$('#current_cart_id').val()+"step-"+$('#c_step').val()).html() , {
                                closeExisting: false,
                                touch: false
                            }
                        );
                        $(".bookingForm .t_pax").html(data.pax);
                        $(".bookingForm .s_total").html(data.sgl_room_total);
                        $(".bookingForm .d_total").html(data.dbl_room_total);
                        $(".bookingForm .t_total").html(data.twn_room_total);
                        $(".bookingForm .tpax_total").val(data.pax);
                        $(".bookingForm .sgl_total").val(data.sgl_room_total);
                        $(".bookingForm .dbl_total").val(data.dbl_room_total);
                        $(".bookingForm .twn_total").val(data.twn_room_total);
                        //$('#update_traking_complated').val('');
                         
                    });
                }
                else
                {

                    if(save_guest_list == '')
                    {
                        if (role == 'Collaborator') {
                            //window.location='/acc-collaborator/?cid='+$('#current_cart_id').val();
                            if(cruise_guest_list == 1)
                            {

                             window.location='/tour-overview-cruise/'+$('#current_cart_id').val()+'?cid='+$('#current_cart_id').val();
                            }
                            else
                            {
                                 window.location='/tour-overview/'+$('#current_cart_id').val()+'?cid='+$('#current_cart_id').val();
                            }
                        }
                        else
                        {
                            if(cruise_guest_list == 1)
                            {
                                window.location='/tour-overview-cruise/'+$('#current_cart_id').val()+'?cid='+$('#current_cart_id').val();
                            }
                            else
                            {
                                 window.location='/tour-overview/'+$('#current_cart_id').val()+'?cid='+$('#current_cart_id').val();
                            }
                            
                             // location.reload(); 
                            //parent.jQuery.fancybox.close();
                           // $('.tourOverviewButton:visible').trigger('click');
                        }
                    }
                    $('#save_guest_list').val('');
                    
                }
                $('.loader').hide();
                
               
            });
            return false;
        },
    };
     adddataUpdateNumberHolderCruiseValidateOpt = {
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
         },
        messages: {
            'step1[experience_categories_ids][]': {
                required: "Please select category",
            },
        },
        errorPlacement: function(error, element) {
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
            var params = $(form).serializeArray();
            $.each(params, function(i, val) {
                userFormMainData.append(val.name, val.value);
            });
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
                data: userFormMainData,
                beforeSend: function() {
                }
            }).done(function(data) {

                // alert(data.cart_experience_rooms_sold);
                 userFormMainData = new FormData();
                
                //toastSuccess('Data store successfully.');
                var role = $('#current_role').val();
                var update_traking_complated = $('#update_traking_complated').val();
                var save_guest_list = $('#save_guest_list').val();
                
                if(update_traking_complated == 1)
                {
                    $.ajax({
                        url: base_url+"/complete-traking/"+$('#current_cart_id').val()+"/"+$('#c_step').val(),
                        type: 'POST',
                         data: {'step':'6','cart_id':$('#current_cart_id').val()},
                        dataType: 'JSON',
                        cache: false,
                        mimeType: "multipart/form-data",
                        contentType: false,
                        processData: false,
                        beforeSend: function() {
                        }
                    }).done(function(data) {
                        $.fancybox.open(
                            $("#PastbookingFormBox-"+$('#current_cart_id').val()+"step-"+$('#c_step').val()).html() , {
                                closeExisting: false,
                                touch: false
                            }
                        );
                        $(".bookingForm .t_pax").html(data.pax);
                        $(".bookingForm .s_total").html(data.sgl_room_total);
                        $(".bookingForm .d_total").html(data.dbl_room_total);
                        $(".bookingForm .t_total").html(data.twn_room_total);
                        $(".bookingForm .tpax_total").val(data.pax);
                        $(".bookingForm .sgl_total").val(data.sgl_room_total);
                        $(".bookingForm .dbl_total").val(data.dbl_room_total);
                        $(".bookingForm .twn_total").val(data.twn_room_total);
                        //$('#update_traking_complated').val('');
                         
                    });
                }
                else
                {

                    if(save_guest_list == '')
                    {
                        if (role == 'Collaborator') {
                            //window.location='/acc-collaborator/?cid='+$('#current_cart_id').val();
                             window.location='/tour-overview-cruise/'+$('#current_cart_id').val()+'?cid='+$('#current_cart_id').val();
                        }
                        else
                        {
                            window.location='/tour-overview-cruise/'+$('#current_cart_id').val()+'?cid='+$('#current_cart_id').val();
                             // location.reload(); 
                            //parent.jQuery.fancybox.close();
                           // $('.tourOverviewButton:visible').trigger('click');
                        }
                    }
                    $('#save_guest_list').val('');
                    
                }
                $('.loader').hide();
                
               
            });
            return false;
        },
    };
    /*$(document).ready(function(){   
        $('#dataUpdateNumberHolder').validate(addDataUpdateNumberHolderValidateOpt);
    });*/
    // var userFormMainData = new FormData();

$(document).on('click','.removeRoomsAddCls', function(){
});

$(document).on('click','.removeRoomsCls', function(){
    var dataId = $(this).attr('data-id');
    $(this).closest('tr').remove();
    $('.loader').show();    
    $.ajax({
        url: base_url+'/delete-rooms',
        type: 'POST',
         // dataType: 'json',
        data: {'id':dataId},
        success: function(data) {
           /* parent.jQuery.fancybox.close();
            var cartIdSCls = $('.cartIdSCls').val();
            setTimeout(function(){
                $('#reloadInfo'+cartIdSCls).trigger('click');
            }, 200);*/
            $('.loader').hide();    
            toastSuccess(data.response);
             window.location='/tour-overview/'+$('#current_cart_id').val()+'?cid='+$('#current_cart_id').val();
        },
        error: function(e) {
        }
    });

});

