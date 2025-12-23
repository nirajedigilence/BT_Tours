{!! Form::open(array('route' => 'stocklist-ship-dates-create','method'=>'POST', 'enctype' => 'multipart/form-data', 'class'=>'stocklistHotelDatesCreateForm', 'id'=>'stocklistHotelDatesCreateForm')) !!}      
    <div class="modal-header">
        <div class="row">
            <div class="col-sm-12">
                <h5 class="modal-title" id="exampleModalLongTitle"><b>{{ $shipList->name }}</b></h5>
            </div>
            <div class="col-sm-12">
                <p>You can add edit dates listed below.</p>
            </div>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <style type="text/css">
        .pointerNone{pointer-events: none;}
        .dis-label {
            border: 1px solid;
            color: black;
            font-weight: 700;
            padding: 8px 1px;
            width: 100%;
            text-align: center;
            font-size: 9px;
            border-radius: 8px;
        }
        .edit-new {
            width: 52% !important;
            padding: 8px !important;
            margin-left: 22px;
            font-size: 11px;
        }
        .pl-label {
                font-weight: 700;
                padding: 8px 1px;
                width: 100%;
                text-align: center;
                font-size: 10px !important;
                vertical-align: middle;
                margin-top: 13px;
        }
        .al-label {
                color: #00000 !important;
                font-weight: 700;
                padding: 8px 1px;
                width: 100%;
                text-align: center;
                font-size: 10px !important;
                vertical-align: middle;
                margin-top: 13px;
        }
        
        .green-active {
            color: green !important;
            border-color: green !important;
        }
        .center{text-align: center !important;}
    </style>
    <input type="hidden" name="ship_id" class="ship_id" value="{{ $ship_id }}" placeholder="">
    <div class="modal-body" >
        <div class="row">
            <div class="col-sm-3">
                <label>Search :</label>
                <input class="form-control" type="text" name="search"  id="myInputDate" value="" onkeyup="myFunctionDate()" >
            </div>
        </div>
        <div class="hotelDatesAppendCls">
            <?php 
            $cnts = 110;

            foreach ($shipDateArray as $key => $value) { ?>
                 <?php 
                            $hotel_book_date_id = $value->id;
                            $activeCls = '';
                             ?>
                <div class="hotelDatesMainCls box editCls openBookingDate" data-date-id="{{ $hotel_book_date_id}}" data-hotel-id="{{ $ship_id}}" data-id="{{$cnts}}" data-cart_id="<?=!empty($hotel_cart_list[0]->cart_id)?$hotel_cart_list[0]->cart_id:''?>">
                    {{-- {{ convert2DMY($value->date_out)}} --}}
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label for="DateIn{{$cnts}}">ID</label>
                                        <span class="hotelDatesInOutCls"><b>{{ $value->id }}</b></span>
                                        <input type="date" class="notClickedCls dateChangeCls form-control dateInCls{{$cnts}} hdioCls" name="dates_edit[{{ $value->id }}][date_in]" id="DateIn{{$cnts}}" placeholder="Date In" value="{{ $value->date_in }}" required="" data-id="{{$cnts}}" style="font-size: 0.80rem;padding: 5px;">
                                        <input type="hidden" class="" name="dates_edit[{{ $value->id }}][id]" id="DateId{{$cnts}}"  value="{{ $value->id }}">
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label for="DateIn{{$cnts}}">Date In</label>
                                        <span class="hotelDatesInOutCls"><b>{{ convert2DMYForHotelDates($value->date_in) }}</b></span>
                                        <input type="date" class="notClickedCls dateChangeCls form-control dateInCls{{$cnts}} hdioCls" name="dates_edit[{{ $value->id }}][date_in]" id="DateIn{{$cnts}}" placeholder="Date In" value="{{ $value->date_in }}" required="" data-id="{{$cnts}}" style="font-size: 0.80rem;padding: 5px;">
                                        <input type="hidden" class="" name="dates_edit[{{ $value->id }}][id]" id="DateId{{$cnts}}"  value="{{ $value->id }}">
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label for="DateOut{{$cnts}}">Date Out</label>
                                        <span class="hotelDatesInOutCls"><b>{{ convert2DMYForHotelDates($value->date_out) }}</b></span>
                                        <input type="date" class="notClickedCls dateChangeCls hdioCls dateOutCls{{$cnts}} form-control" name="dates_edit[{{ $value->id }}][date_out]" id="DateOut{{$cnts}}" placeholder="Date Out" value="{{ $value->date_out }}" required data-id="{{$cnts}}" style="font-size: 0.80rem;padding: 5px;">
                                    </div>
                                </div>
                                <!-- <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="DateOut{{$cnts}}">Date Booked</label>
                                        <span class="hotelDatesInOutCls"><b><?=!empty($hotel_cart_list[0]->booked_date)?convert2DMYForHotelDates($hotel_cart_list[0]->booked_date):''?></b></span>
                                        <input type="date" class="notClickedCls dateChangeCls hdioCls dateOutCls{{$cnts}} form-control" name="dates_edit[{{ $value->id }}][date_out]" id="DateOut{{$cnts}}" placeholder="Date Out" value="{{ $value->date_out }}" required data-id="{{$cnts}}" style="font-size: 0.80rem;padding: 5px;">
                                    </div>
                                </div> -->
                            </div>
                            <script type="text/javascript">
                                $("#DateOut{{$cnts}}").blur(function () {
                                    var startDate = document.getElementById("DateIn{{$cnts}}").value;
                                    var endDate = document.getElementById("DateOut{{$cnts}}").value;
                                    if ((Date.parse(startDate) >= Date.parse(endDate))) {
                                        alert("Date out should be greater than date in");
                                        document.getElementById("DateOut{{$cnts}}").value = "";
                                    }
                                });
                            </script>
                        </div>
                        <div class="col-sm-5">
                            <div class="row">
                                <div class="col center">
                                    <div class="form-group">
                                        <label for="Nights{{$cnts}}">Embarkation</label>
                                        <span class="hotelDatesInOutCls"><?=!empty($value->embarkation)?'<b>'.$value->embarkation.'</b>':'0';?></span>
                                        <input type="text" class="notClickedCls hdioCls form-control nightCls" name="dates_edit[{{ $value->id }}][embarkation]" id="Nights{{$cnts}}" placeholder="Nights" value="{{ $value->embarkation }}" readonly="" required>
                                    </div>
                                </div>
                                <div class="col center">
                                    <div class="form-group">
                                        <label for="Sgl{{$cnts}}">Disembarkation</label>
                                        <span class="hotelDatesInOutCls"><?=!empty($value->disembarkation)?'<b>'.$value->disembarkation.'</b>':'0';?></span>
                                        <input type="text" class="notClickedCls hdioCls form-control numbercls" id="Sgl{{$cnts}}" placeholder="Sgl" value="{{ $value->disembarkation }}" name="dates_edit[{{ $value->id }}][disembarkation]" >
                                    </div>
                                </div>
                                <div class="col center">
                                    <div class="form-group">
                                        <label for="Dbl{{$cnts}}">Total nr of cabins</label>
                                        <span class="hotelDatesInOutCls"><?=!empty($value->total_cabin)?'<b>'.number_format($value->total_cabin,0).'</b>':'0';?></span>
                                        <input type="text" class="notClickedCls hdioCls form-control numbercls" id="Dbl{{$cnts}}" placeholder="Dbl" value="{{ $value->total_cabin }}" name="dates_edit[{{ $value->id }}][total_cabin]" >
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="row">
                               
                                <div class="col" style="padding: 2px !important;margin-left: 20px;">
                                    <div class="form-group">
                                        <?php if(empty($activeCls)){ ?> 

                                            <label class="pl-label">Document Not Assigned</label>
                                        <?php } else { ?> 
                                       
                                       
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col" style="padding: 2px !important;margin-left: 18px;">
                                    <div class="form-group">
                                          <?php if(!empty($hotel_cart_list[0]->cart_id)){ ?> 
                                            <!--  <a data-id="<?=!empty($hotel_cart_list[0]->cart_id)?$hotel_cart_list[0]->cart_id:''?>" class="marginTop15 clearBothCls float-left dis-label tourOverviewButton" href="javascript:;"><?=!empty($hotel_cart_list[0]->cart_id)?'Booked':'Unbooked'?></a> -->
                                             <a target="_blank" href="/tour-overview/{{$hotel_cart_list[0]->cart_id}}" class="marginTop15 clearBothCls float-left dis-label">
                                              <?=!empty($hotel_cart_list[0]->cart_id)?'Booked':'Unbooked'?>
                                            </a>
                                        <?php } else { ?> 
                                       <label class="al-label">Unbooked</label>
                                        <?php } ?>
                                        
                                    </div>
                                </div>
                                <div class="col" style="padding: 2px !important;">
                                    <div class="form-group">
                                        <!-- <a class="yellowClrBtn marginTop15 clearBothCls float-left " href="javascript:;">Edit</a> -->
                                        <a class="yellowClrBtn marginTop15 clearBothCls float-left  edit-new notClickedCls <?=!empty($hotel_cart_list)?'':''?>" target="_blank" href="<?php echo 'ship-stocklist-edit-dates/'.$hotel_book_date_id.'/'.$ship_id; ?>" >Edit</a> 
                                        
                                       
                                       <!--  <a href="javascript:;" class="yellowClrBtn marginTop15 clearBothCls float-left  edit-new notClickedCls editDatesBtn <?=!empty($hotel_cart_list)?'booked_date':''?>" data-hotel-id="{{ $ship_id }}" data-date-id="{{$hotel_book_date_id}}" >
                                        Edit
                                    </a> -->
                                    </div>
                                </div>
                               
                                <div class="col" style="padding: 2px !important;">
                                    <div class="form-group">
                                        <!-- <a class="yellowClrBtn marginTop15 clearBothCls float-left " href="javascript:;">Edit</a> -->
                                       
                                        <!-- <a class="yellowClrBtn marginTop15 clearBothCls float-left  edit-new notClickedCls <?=!empty($hotel_cart_list)?'':''?>" target="_blank" href="<?php echo 'ship-stocklist-edit-dates/'.$hotel_book_date_id.'/'.$ship_id.'?contracts=1'; ?>" >Contracts</a>  -->
                                       <!--  <a href="javascript:;" class="yellowClrBtn marginTop15 clearBothCls float-left  edit-new notClickedCls editDatesBtn <?=!empty($hotel_cart_list)?'booked_date':''?>" data-hotel-id="{{ $ship_id }}" data-date-id="{{$hotel_book_date_id}}" >
                                        Edit
                                    </a> -->
                                    </div>
                                </div>
                             
                            </div>
                        </div>
                      
                    </div>
                  
                </div>
            <?php
            $cnts++; 
            /*}*/
             } ?>
           
        </div>
        <div class="hotelDatesbottomCls">
            <div class="row">
                <div class="col-sm-12">
                    <div class="hotelDatesFooterCls box">
                        <div class="form-group">
                            <input type="hidden" name="addDatesCls" value="333" class="addDatesCls">
                            <!-- <a href="javascript:;" class="hotelDateFooterCls addMoreDateCls"><i class="fas fa-plus yellowClrCls"></i> Add new date</a> -->
                            <a href="javascript:;" class="hotelDateFooterCls addSelectCls" data-hotel-id="{{ $ship_id }}"><i class="fas fa-plus yellowClrCls"></i> Add new dates</a>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-sm-6">
                    <div class="hotelDatesFooterCls box">
                        <div class="form-group">
                            <a href="javascript:;" class="hotelDateFooterCls contractSelectCls" data-hotel-id="{{ $ship_id }}"><i class="far fa-file-pdf yellowClrCls"></i> Create PDF/contract dates</a>
                            
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>

     <!-- <div id="fancybox_note_popup" style="display: none;">

                                          
            <h3>Add a new note</h3>

            @csrf
          
            <input type="hidden" name="cart_id" id="cart_id" value="">
            <input type="hidden" name="user_type" id="user_type" value="1">
            <p>Please state the reason for this amendment</p>
            <textarea type="text" class="form-control" name="notes" id="notes" placeholder="Type here" rows="7"></textarea>
           
            <p class="notes_cls" style="color: red;"></p>                                           
           
            <button type="submit" class="mt-2 btn btn-primary" id="add_notes" style="max-width: 500px;">
                Add Note
            </button>
    </div> -->
    <div class="modal-footer displayInitialCls">
        <input type="hidden" value="<?=isset($is_hotel_assieged)?$is_hotel_assieged:''?>" name="changed_dates" id="changed_dates">
         <textarea style="visibility: hidden;" value="" name="changed_note" id="changed_note"></textarea>
        <input type="hidden" value="" name="is_changed" id="is_changed">
        <input type="hidden" value="" name="assign_cart_id" id="assign_cart_id">
        <button type="button" class="btn btn-secondary cancel float-left hotelFooteCloseCls" data-dismiss="modal" style="margin-left: 10px;">Close</button>
        {{-- <a class="yellowClrBtn saveAllChangesBtn" href="javascript:;" data-dismiss="modal">Save all changes</a> --}}
        <input type="submit" name="submit" value="Save all changes" class="yellowClrBtn saveAllChangesBtn border-0" >
    </div>
   
{!! Form::close() !!}
<script type="text/javascript">
    //open edit document
    $(document).on('change', '#checkBookings', function() {
        
        var id = $(this).val();
        if(id == 1){
            $('.pastDate').hide();
            $('.unbookedDate').hide();
            $('.activeDate').show();
        }else if(id == 2){
            $('.pastDate').show();
            $('.activeDate').hide();
            $('.unbookedDate').hide();
        }else if(id == 3){
            $('.unbookedDate').show();
            $('.pastDate').hide();
            $('.activeDate').hide();
        }
    });
     $(document).on('click', '.editDocument', function() {
        var id = $(this).attr('data-id');
        $('#checkBookings').val('1');
        $('.loader').show();    
        $.ajax({
            url: base_url+'/super-user/edit-documents-tours',
            type: 'POST',
            data: {'exp_id':id},
            success: function(data) {
                if(jQuery( "#checkBookings option:selected" ).val() == 3 ) {
                    
                    $('#appendHtml').empty().html(data.newHtml);
                }else if(jQuery( "#checkBookings option:selected" ).val() == 2  || jQuery( "#checkBookings option:selected" ).val() == 1 ) {
                    $('#appendHtml').empty().html(data.html);
                }
                $('#appendHtml').html(data.html);
                $('.loader').hide();  
                $('#editDocModal').modal('show');
            },
            error: function(e) {
            }
        });   
    });
     
     $(document).on('change', '.notClickedCls', function(e) {
       var assign_cart_id = $(this).closest(".hotelDatesMainCls").attr('data-cart_id');
       //alert(assign_cart_id);
       var added_cart = $('#assign_cart_id').val();
       $('#assign_cart_id').val(added_cart+assign_cart_id+',');
        $('#is_changed').val('1');
    });
     $(document).on('click', '.saveAllChangesBtn', function(e) {

    //e.preventDefault();
   var changed = $('#changed_dates').val();
   var is_changed = $('#is_changed').val();
   if(changed == 1 && is_changed == 1)
   {
            /*$.fancybox.open(
            //$("#bookingFormBox-"+cartExperienceId).html() , {
            $("#fancybox_note_popup").html() , {
                closeExisting: false,
                touch: true,
                width:600,
                height:400,
                autoSize : false
            }
        );*/
        $('#resignNoteModal').modal('show');
        return false;
        //$(window).scrollTop(0);
   }
   else
   {
    return true;
   }
  
 });
      function myFunctionDate() {
    // Declare variables
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById('myInputDate');
    filter = input.value.toUpperCase();
    ul = document.getElementsByClassName("openBookingDate");
    // li = ul.getElementsByTagName('div');

    // Loop through all list items, and hide those who don't match the search query
    for (i = 0; i < ul.length; i++) {
        a = ul[i].getElementsByTagName("div")[1];
        console.log(a.innerText);
        txtValue = a.textContent || a.innerText;

       /* a1 = ul[i].getElementsByTagName("div")[2];
        txtValue1 = a1.textContent || a1.innerText;

        a2 = ul[i].getElementsByTagName("div")[6];
        txtValue2 = a2.textContent || a2.innerText;

        a3 = ul[i].getElementsByTagName("div")[7];
        txtValue3 = a3.textContent || a3.innerText;*/


        console.log(txtValue.toUpperCase().indexOf(filter));
        if (txtValue.toUpperCase().indexOf(filter) > -1 /*|| txtValue1.toUpperCase().indexOf(filter) > -1 || txtValue2.toUpperCase().indexOf(filter) > -1 || txtValue3.toUpperCase().indexOf(filter) > -1*/) {
            ul[i].style.display = "";
        } else {
            ul[i].style.display = "none";
        }
    }
    }
 /*$(document).on('click', '#add_notes', function(e) {
    //alert($('#notes').val());
    $("#changed_note").removeAttr("style");
    $('body #changed_note').text($('#notes').val());
    $('#is_changed').val('');
    $('#resignNoteModal').modal('hide');
    //$('#stocklistHotebodylDatesCreateForm').submit();
    $('.saveAllChangesBtn').trigger('click');
});*/
   
   
</script>