$(document).ready(function(){
    if ( $(".current_year").length ) { 
        var years = $('.current_year').val();
        calendarLoad(years);
    }
});

/*$(document).on('click', '.duplicateSelectCls', function() {
    if ($(".isSelectCls")[0]){
         $('.addMoreDateCls').trigger('click');
         var htmls = $(".isSelectCls").html();
        //var $htmls = $('.isSelectCls').clone();
        $htmls.find('input').each(function() {
            this.name= this.name.replace('dates_edit', 'dates_clone');
        });

        $htmls.find('select').each(function() {
            this.name= this.name.replace('dates_edit', 'dates_clone');
        });
        $htmls.find('.dateChangeCls').each(function() {
            this.value= '';
        });
        $htmls.find('.nightCls').each(function() {
            this.value= '';
            $(this).removeAttr('readonly');
        });
        
        
        $('.hotelDatesAppendCls').append($htmls);
        $('.hotelDatesAppendCls div.hotelDatesMainCls:last').find('.editDateCls').trigger('click');
        $('.isSelectCls').removeClass('isSelectCls');
    } else {
        toastError('Please select atleast one dates');
    }
});*/
$(document).on('click', '.contractSelectCls', function() {
    if ($(".isSelectCls")[0]){
        var hotel_date_id = $(".isSelectCls").attr("data-date-id");
        var hotel_id = $(".isSelectCls").attr("data-hotel-id");
        var url= base_url+'/super-user/ship-stocklist-edit-dates/'+hotel_date_id+'/'+hotel_id+'/'+'?contracts=1&new_date=1&pdf=1';
        window.open(url,'_blank')
        $('.isSelectCls').removeClass('isSelectCls');
    } else {
        //toastError('Please select atleast one dates');
         var hotel_id = $(this).attr("data-hotel-id");
         var url= base_url+'/super-user/ship-stocklist-edit-dates/0/'+hotel_id+'/'+'?contracts=1&new_date=1&pdf=1';
        window.open(url,'_blank')
    }
});
$(document).on('click', '.addSelectCls', function() {
    if ($(".isSelectCls")[0]){
        var hotel_date_id = $(".isSelectCls").attr("data-date-id");
        var hotel_id = $(".isSelectCls").attr("data-hotel-id");
        var url= base_url+'/super-user/ship-stocklist-edit-dates/'+hotel_date_id+'/'+hotel_id+'/'+'?contracts=1&new_date=1';
        window.open(url,'_blank')
        $('.isSelectCls').removeClass('isSelectCls');
    } else {
         var hotel_id = $(this).attr("data-hotel-id");
         var url= base_url+'/super-user/ship-stocklist-edit-dates/0/'+hotel_id+'/'+'?contracts=1&new_date=1';
        window.open(url,'_blank')
        //toastError('Please select atleast one dates');
    }
});

$(document).on('click', '.duplicateSelectCls', function() {
    if ($(".isSelectCls")[0]){
        var date_id = $(".isSelectCls").attr("data-date-id");
         var addDatesCls = parseInt($('.addDatesCls').val(), 10);
    addDatesCls = addDatesCls+1;
    $('.addDatesCls').val(addDatesCls);
    var htmls = '';

    htmls += '<div class="hotelDatesMainCls box addCls" data-id="'+addDatesCls+'">\
            <div class="row">\
                <div class="col-sm-10">\
                    <div class="row">\
                        <div class="col-sm-6">\
                            <div class="form-group">\
                                <label for="DateIn'+addDatesCls+'">Date In</label>\
                                <input type="date" id="DateIn'+addDatesCls+'" style="font-size: 0.80rem;padding: 5px;" class="form-control dateChangeCls dateInCls'+addDatesCls+'" name="dates_clone['+addDatesCls+'][date_in]" id="DateIn'+addDatesCls+'" data-id="'+addDatesCls+'" placeholder="Date In" required="">\
                            </div>\
                        </div>\
                        <div class="col-sm-6">\
                            <div class="form-group">\
                                <label for="DateOut'+addDatesCls+'">Date Out</label>\
                                <input type="date" id="DateOut'+addDatesCls+'" style="font-size: 0.80rem;padding: 5px;" class="form-control dateChangeCls dateOutCls'+addDatesCls+'" name="dates_clone['+addDatesCls+'][date_out]" id="DateOut'+addDatesCls+'" data-id="'+addDatesCls+'"  placeholder="Date Out" required="">\
                                <input type="hidden" class="form-control numbercls" id="Nights'+addDatesCls+'" name="dates_clone['+addDatesCls+'][night]" placeholder="Nights" readonly="" required="">\
                            </div>\
                        </div>\
                        <script type="text/javascript">\
                            $("#DateOut'+addDatesCls+'").blur(function () {\
                                var startDate = document.getElementById("DateIn'+addDatesCls+'").value;\
                                var endDate = document.getElementById("DateOut'+addDatesCls+'").value;\
                                if ((Date.parse(startDate) >= Date.parse(endDate))) {\
                                    alert("Date out should be greater than date in");\
                                    document.getElementById("DateOut'+addDatesCls+'").value = "";\
                                }\
                            });\
                        </script>\
                    </div>\
                </div>\
                <div class="col-sm-1">\
                    <input type="hidden" id="clone_id" style="font-size: 0.80rem;padding: 5px;" class="form-control dateChangeCls dateInCls'+addDatesCls+'" name="dates_clone['+addDatesCls+'][clone_id]" value="'+date_id+'">\
                    <a class="btn btn-secondary hotelFooteCloseCls removeDatesBtn" href="javascript:;">Remove</a>\
                </div>\
            </div>\
        </div>';

        $('.hotelDatesAppendCls').append(htmls);
        select2Load();
        datepickerFun();
        datepickerStartEndDate(addDatesCls);
        $('.dateNum').mask('00/00/0000');
        
        $('.isSelectCls').removeClass('isSelectCls');
    } else {
        toastError('Please select atleast one dates');
    }
});
var childElementClicked;

$(document).on('click', '.hotelDatesMainCls', function() {
    $(document).on('click', '.notClickedCls , .select2, .select2-selection__rendered', function() {
       childElementClicked = true;
    });
    if( childElementClicked != true ) {
        
        if($(this).hasClass('isSelectCls'))
        {
             $(this).removeClass('isSelectCls');
        }
        else{
            $('.hotelDatesAppendCls .hotelDatesMainCls').removeClass('isSelectCls');
             $(this).addClass('isSelectCls');
        }
      
        //$('.hotelDatesAppendCls .hotelDatesMainCls').removeClass('isSelectCls');
        // It is clicked on parent but not on child.
        // Now do some action that you want.
        // alert('Clicked on parent');    
        
    }else{
      // alert('Clicked on child');
    }    
    childElementClicked = false;
    
});

/*$(document).on('click', '.hotelDatesMainCls:not(#DateOut110)', function() {
    console.log('111');    
    if($(this).hasClass('dateNum')) {
    console.log('222');    
        return;
    }
    console.log($(this).attr('class'));    
    $(this).toggleClass('isSelectCls');
});*/
$(document).on('click', '.removeHotelDates', function() {
    var email = $(this).attr('data-email');
    $('#hotelEmailcheck').val(email);
   
    $('#hotelCancelDatesNoteModal').modal('show');
});
$(document).on('click', '.removeHotelDatesUpdate', function() {
    var hotelDatesId = $('#hotelDatesId').val();
    var email = $(this).attr('data-email');
    var hotelEmailval = $('#hotelEmailval').val();
    if(email == 'yes' && hotelEmailval == ''){
        toastError('Email is not available for this hotel.');
        return false;
    }
    if(hotelDatesId != ''){
        $('.loader').show();    
        $.ajax({
            url: base_url+'/super-user/stocklist-hotel-dates-remove',
            type: 'POST',
             // dataType: 'json',
            data: {'hotelDatesId':hotelDatesId},
            success: function(data) {
                $('.loader').hide();
                if(data.status == 'success'){
                    $('#hotelCancelDatesModal').modal('hide');
                    if(email == 'yes'){
                        window.location.href = 'mailto:'+hotelEmailval;
                    }
                    location.reload();                    
                }    
            },
            error: function(e) {
            }
        });
    }
});



$(document).on('click', '.cancelSelected', function() {
    var ids = $(".hotelDatesMainCls.isSelectCls").map(function() {
        return $(this).attr('data-id');        
    }).get().toString();
    if(ids != ''){
        var hotelEmail = $('#hotelEmail').val();
        $('#hotelEmailval').val(hotelEmail);
        $('#hotelDatesId').val(ids);
        $('#hotelDatesModal').modal('hide');
        $('#hotelCancelDatesModal').modal('show');
    }
});
$(document).on('click', '.cancelSelectedDate', function() {

    var ids = $(this).attr('data-id');
   
    if(ids != ''){
        var hotelEmail = $('#hotelEmail').val();
        $('#hotelEmailval').val(hotelEmail);
        $('#hotelDatesId').val(ids);
        //$('#hotelDatesModal').modal('hide');
        $('#hotelCancelDatesModal').modal('show');
    }
});
$(document).on('click', '.resetSelectedDate', function() {

    var ids = $(this).attr('data-id');
   
    if(ids != ''){
        var hotelEmail = $('#hotelEmail').val();
        $('#hotelEmailval').val(hotelEmail);
        $('#hotelDatesId').val(ids);
        //$('#hotelDatesModal').modal('hide');
        $('#hotelReinstateDatesModal').modal('show');
    }
});
$(document).on('click', '.readdHotelDates', function() {
    var hotelDatesId = $('#hotelDatesId').val();
    var email = $(this).attr('data-email');
  alert(hotelDatesId);
    if(hotelDatesId != ''){
        $('.loader').show();    
        $.ajax({
            url: base_url+'/super-user/stocklist-ship-reinstate-dates',
            type: 'POST',
             // dataType: 'json',
            data: {'hotel_dates_id':hotelDatesId},
            success: function(data) {
                $('.loader').hide();
                if(data.status == 'success'){
                    $('#hotelReinstateDatesModal').modal('hide');
                  
                    //location.reload();                    
                }    
            },
            error: function(e) {
            }
        });
    }
});
$(document).on('click', '.cancelBookedDate', function() {

    var ids = $(this).attr('data-id');
   
    if(ids != ''){
        var hotelEmail = $('#hotelEmail').val();
        $('#hotelEmailval').val(hotelEmail);
        $('#hotelDatesId').val(ids);
        //$('#hotelDatesModal').modal('hide');
        $('#hotelCancelBookDatesModal').modal('show');
    }
});
$('#hotelCancelDatesModal').on('hidden.bs.modal', function (e) {
  $('#hotelDatesId').val('');
  $('#hotelEmailval').val('');
})
$(document).on('click', '.reinstateSelectedDate', function() {
    if(confirm("Are you sure?"))
    {
        var hotelId = $(this).attr('data-id');
        $.ajax({
            url: base_url+'/super-user/stocklist-hotel-reinstate-dates',
            type: 'POST',
             // dataType: 'json',
            data: {'hotel_dates_id':hotelId},
            success: function(data) {
                 location.reload();   
            },
            error: function(e) {
            }
        });
    }
   
});
$(document).on('click', '.viewAndAddDatesBtn', function() {
    var hotelId = $(this).attr('data-id');
    var databutton = $(this).attr('data-button');
    open_dates_rates(hotelId,databutton);
});

function open_dates_rates(hotelId,databutton)
{
    $('.loader').show();    
    $.ajax({
        url: base_url+'/super-user/stocklist-ship-dates',
        type: 'POST',
         // dataType: 'json',
        data: {'ship_id':hotelId,'databutton':databutton},
        success: function(data) {
            $('.hotelDatesModalAppendCls').html(data.response);
           /* $('#proToMoveId').val(protoid);
            $('#productMoveId').val(protoTypeId);*/
            select2Load();
            datepickerFun();
            $('.dateNum').mask('00/00/0000');
            $('#stocklistHotelDatesCreateForm').validate(addDateValidateOpt);
            $('#hotelDatesModal').modal('show');
            $(".hotelDatesMainCls").each(function() {
                var ids = $(this).attr('data-id');
                // console.log(ids);
                datepickerStartEndDate(ids);
            });
            $('.hdioCls').hide();
            $('.loader').hide();    
        },
        error: function(e) {
        }
    });
}
$(document).on('click', '.viewAndAddDatesCancelBtn', function() {
    var hotelId = $(this).attr('data-id');
    var databutton = $(this).attr('data-button');
    open_dates_rates_cancelled(hotelId,databutton);
});

function open_dates_rates_cancelled(hotelId,databutton)
{
    $('.loader').show();    
    $.ajax({
        url: base_url+'/super-user/stocklist-ship-cancelled-dates',
        type: 'POST',
         // dataType: 'json',
        data: {'ship_id':hotelId,'databutton':databutton},
        success: function(data) {
            $('.hotelDatesModalAppendCls').html(data.response);
           /* $('#proToMoveId').val(protoid);
            $('#productMoveId').val(protoTypeId);*/
            select2Load();
            datepickerFun();
            $('.dateNum').mask('00/00/0000');
            $('#stocklistHotelDatesCreateForm').validate(addDateValidateOpt);
            $('#hotelDatesModal').modal('show');
            $(".hotelDatesMainCls").each(function() {
                var ids = $(this).attr('data-id');
                // console.log(ids);
                datepickerStartEndDate(ids);
            });
            $('.hdioCls').hide();
            $('.loader').hide();    
        },
        error: function(e) {
        }
    });
}
$(document).on('click', '.viewAndAddDatesCompletedBtn', function() {
    var hotelId = $(this).attr('data-id');
    var databutton = $(this).attr('data-button');
    open_dates_rates_completed(hotelId,databutton);
});

function open_dates_rates_completed(hotelId,databutton)
{
    $('.loader').show();    
    $.ajax({
        url: base_url+'/super-user/stocklist-hotel-complete-dates',
        type: 'POST',
         // dataType: 'json',
        data: {'hotel_id':hotelId,'databutton':databutton},
        success: function(data) {
            $('.hotelDatesModalAppendCls').html(data.response);
           /* $('#proToMoveId').val(protoid);
            $('#productMoveId').val(protoTypeId);*/
            select2Load();
            datepickerFun();
            $('.dateNum').mask('00/00/0000');
            $('#stocklistHotelDatesCreateForm').validate(addDateValidateOpt);
            $('#hotelDatesModal').modal('show');
            $(".hotelDatesMainCls").each(function() {
                var ids = $(this).attr('data-id');
                // console.log(ids);
                datepickerStartEndDate(ids);
            });
            $('.hdioCls').hide();
            $('.loader').hide();    
        },
        error: function(e) {
        }
    });
}
//edit dates
$(document).on('click', '.editDatesBtn', function() {
    var hotelId = $(this).attr('data-hotel-id');
    var dateId = $(this).attr('data-date-id');
    $('.loader').show();    
    $.ajax({
        url: base_url+'/super-user/stocklist-hotel-dates-edit',
        type: 'POST',
         // dataType: 'json',
        data: {'hotel_id':hotelId,'hotel_book_date_id':dateId},
        success: function(data) {
            $('.edithotelDatesModalAppendCls').html(data.response);
           /* $('#proToMoveId').val(protoid);
            $('#productMoveId').val(protoTypeId);*/
            select2Load();
            datepickerFun();
            $('.dateNum').mask('00/00/0000');
            $('#stocklistHotelDatesEditForm').validate(addDateValidateOpt);
            $('#edithotelDatesModal').modal('show');
            $(".hotelDatesMainCls").each(function() {
                var ids = $(this).attr('data-id');
                // console.log(ids);
                datepickerStartEndDate(ids);
            });
            /*$('.hdioCls').hide();*/
            $('.loader').hide();    
        },
        error: function(e) {
        }
    });
});


function select2Load(){
    $('.selectCls').select2({
        minimumResultsForSearch: 0
            /*allowClear: true,*/
    }); 
}

$('body').on('keyup blur', '.numbercls', function() {
    var val = this.value;
    var re = /^([0-9]+[\.]?[0-9]?[0-9]?|[0-9]+)$/g;
    var regex = /^([\.]?[0-9]?[0-9]?)$/g;
    var re1 = /^([0-9]+[\.]?[0-9]?[0-9]?|[0-9]+)/g;
    var regex1 = /^([\.]?[0-9]?[0-9])/g;
    if (re.test(val) || regex.test(val)) {} else {
        var val2 = re1.exec(val);
        var val1 = regex1.exec(val);
        if (val2) {
            this.value = val2[0];
        } else if (val1) {
            this.value = val1[0];
        } else {
            this.value = "";
        }
    }
});

$('body').on('click', '.addMoreDateCls', function() {
    var addDatesCls = parseInt($('.addDatesCls').val(), 10);
    addDatesCls = addDatesCls+1;
    $('.addDatesCls').val(addDatesCls);
    var htmls = '';

    htmls += '<div class="hotelDatesMainCls box addCls" data-id="'+addDatesCls+'">\
            <div class="row">\
                <div class="col-sm-10">\
                    <div class="row">\
                        <div class="col-sm-6">\
                            <div class="form-group">\
                                <label for="DateIn'+addDatesCls+'">Date In</label>\
                                <input type="date" id="DateIn'+addDatesCls+'" style="font-size: 0.80rem;padding: 5px;" class="form-control dateChangeCls dateInCls'+addDatesCls+'" name="dates['+addDatesCls+'][date_in]" id="DateIn'+addDatesCls+'" data-id="'+addDatesCls+'" placeholder="Date In" required="">\
                            </div>\
                        </div>\
                        <div class="col-sm-6">\
                            <div class="form-group">\
                                <label for="DateOut'+addDatesCls+'">Date Out</label>\
                                <input type="date" id="DateOut'+addDatesCls+'" style="font-size: 0.80rem;padding: 5px;" class="form-control dateChangeCls dateOutCls'+addDatesCls+'" name="dates['+addDatesCls+'][date_out]" id="DateOut'+addDatesCls+'" data-id="'+addDatesCls+'"  placeholder="Date Out" required="">\
                                <input type="hidden" class="form-control numbercls" id="Nights'+addDatesCls+'" name="dates['+addDatesCls+'][night]" placeholder="Nights" readonly="" required="">\
                            </div>\
                        </div>\
                        <script type="text/javascript">\
                            $("#DateOut'+addDatesCls+'").blur(function () {\
                                var startDate = document.getElementById("DateIn'+addDatesCls+'").value;\
                                var endDate = document.getElementById("DateOut'+addDatesCls+'").value;\
                                if ((Date.parse(startDate) >= Date.parse(endDate))) {\
                                    alert("Date out should be greater than date in");\
                                    document.getElementById("DateOut'+addDatesCls+'").value = "";\
                                }\
                            });\
                        </script>\
                    </div>\
                </div>\
                <div class="col-sm-1">\
                    <a class="btn btn-secondary hotelFooteCloseCls removeDatesBtn" href="javascript:;">Remove</a>\
                </div>\
            </div>\
        </div>';

    $('.hotelDatesAppendCls').append(htmls);
    select2Load();
    datepickerFun();
    datepickerStartEndDate(addDatesCls);
    $('.dateNum').mask('00/00/0000');
});

$('body').on('change', '.keypressbox', function() {
    var otherbtn = $(this).closest('.checkbox_div').find('.otherbtn');
    otherbtn.val($(this).val());
});
$('body').on('blur', '.dateChangeCls', function() {
    var ids = $(this).attr('data-id');
    
    var fromDate = $('.dateInCls'+ids).val();
    var toDate = $('.dateOutCls'+ids).val();
    // console.log(fromDate);
    // console.log(toDate);

    // from = moment(fromDate, 'DD/MM/YYYY'); 
    // to = moment(toDate, 'DD/MM/YYYY'); 

    // console.log(from);
    // console.log(to);

    const date1 = new Date(fromDate);
    const date2 = new Date(toDate);
    const diffTime = Math.abs(date2 - date1);
    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)); 
    if(diffDays > 0){
        $('#Nights'+ids).val(diffDays);
    }else{
        var diffDays1 = '0';
        $('#Nights'+ids).val(diffDays1);
    }
});

function datepickerStartEndDate(addDatesCls){
    /*$("#DateIn"+addDatesCls).datepicker({
        format: 'dd/mm/yyyy',
        todayBtn:  1,
        autoclose: true,
    }).on('changeDate', function (selected) {
        var minDate = new Date(selected.date.valueOf());
        $('#DateOut'+addDatesCls).datepicker({
            'setStartDate': minDate,
            format: 'dd/mm/yyyy',
        });
    });
    
    $("#DateOut"+addDatesCls).datepicker({
        format: 'dd/mm/yyyy',
        // autoclose: true,
    })*/
    /*.on('changeDate', function (selected) {
        var minDate = new Date(selected.date.valueOf()) +1;
        $('#DateIn'+addDatesCls).datepicker('setEndDate', minDate);
    });*/
}

function datepickerFun(){
    $('.dateNum').datepicker({
        // format: 'M dd,yyyy',
        autoclose: true
    });
}

$('body').on('click', '.eventCheckCls', function() {
    var chVal = $(this).val();
    var inclusionsSections = $(this).closest('.inclusionsSections');
    var chId = $(this).attr('data-id');
    if(chVal == '0'){
        inclusionsSections.find('.eventsDateCls'+chId).hide();
        inclusionsSections.find('#eventsDate'+chId).val('');
    }else{
        inclusionsSections.find('.eventsDateCls'+chId).show();
    }
});

$('body').on('click', '.deleteDateCls', function() {
    var hotel_dates_id = $(this).attr('data-id');
    var hotelDatesMainCls = $(this).closest('.hotelDatesMainCls');
    if(confirm('Are you sure you want to delete this record?')){
        $('.loader').show();    
        $.ajax({
            url: base_url+'/super-user/stocklist-date-delete',
            type: 'POST',
            data: {'hotel_dates_id':hotel_dates_id},
            success: function(data) {
                hotelDatesMainCls.remove();
                $('.loader').hide();    
            },
            error: function(e) {
            }
        });
    }
});
$('body').on('click', '.editDateCls', function() {

    /* var changed = $('#changed_dates').val();
   if(changed == 1)
   {*/
    if($(this).hasClass('booked_date'))
    {
        if(confirm("By confirming this change the Collaborator will need to re-sign the ETC. Please confirm this is ok with you?"))
        {
             $(this).closest('.hotelDatesMainCls').find('.hotelDatesInOutCls').hide();
            $(this).closest('.hotelDatesMainCls').find('.hdioCls').show();
            $(this).closest('.hotelDatesMainCls').find('.pointerNone').removeClass('pointerNone');
            $(this).hide(); 

        }
        else
        {
            return false;
        }
   }
   else
   {
    $(this).closest('.hotelDatesMainCls').find('.hotelDatesInOutCls').hide();
    $(this).closest('.hotelDatesMainCls').find('.hdioCls').show();
    $(this).closest('.hotelDatesMainCls').find('.pointerNone').removeClass('pointerNone');
    $(this).hide(); 
   }
   
});
$('body').on('click', '.booked_date', function() {

    if(confirm("By confirming this change the Collaborator will need to re-sign the ETC. Please confirm this is ok with you?"))
    {
        return true;

    }
    else
    {
        return false;
    }
   
});
$('body').on('click', '.removeDatesBtn', function() {
    $(this).closest('.hotelDatesMainCls').remove();
});

addDateValidateOpt = {
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
        /*if (element.hasClass('selectCls')) {
           error.insertAfter(element.next('span'));
        } else if (element.hasClass('availableTourDatesCls')) {
           error.insertAfter(element.next('.input-group-append').next('span'));
        } else if (element.hasClass('custom_chkbox')) {
           error.insertAfter(element.next('span'));
        } else if (element.hasClass('multiImgCls')) {
           error.insertAfter(element.next('span'));
        } else {
            error.insertAfter($(element));
        }*/
    },
    focusInvalid: false,
    invalidHandler: function(form, validator) {},
    submitHandler: function(form) {
        // alert('102030');
        return true;
    },
};

$('body').on('click', '.calenderLoadCls', function() {
    var year = $(this).attr('data-year');
    calendarLoad(year);
});
function calendarLoad(year){
    var hotel_id = $('.hotel_id').val();
    $('.loader').show();    
    $.ajax({
        url: base_url+'/super-user/stocklist-hotel-caledar',
        type: 'POST',
        data: {'year':year, 'hotel_id':hotel_id},
        success: function(data) {
            $('.calendarView').html(data.response);
            $('.loader').hide();    
        },
        error: function(e) {
        }
    });
}