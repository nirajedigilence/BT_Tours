@extends('layouts.front')

@section('content')
<?php
    $cartExeToTour = '';
    $datatab = 'superuser';
    // $cartExeToTour = 


DB::connection('mysql_veenus')->table('cart_experiences_to_tour_statuses')->where("cart_experiences_id", $cart_experience->id)->where('tour_statuses_id', '9')->where('completed', '1')->first();
     $cartExeToTourCheck = 


DB::connection('mysql_veenus')->table('cart_experiences_to_tour_statuses')->where("cart_experiences_id", $cart_experience->id)->where('tour_statuses_id', '9')->where('completed', '1')->first();
    $experience_dates_rates = '';
    if(!empty($cart_experience->dates_rates_id)){

        $experience_dates_rates = 


DB::connection('mysql_veenus')->table('experience_dates_rates')->where("id", $cart_experience->dates_rates_id)->first();
    }
    $currency_symbol = getCurrency($cart_experience->id);
?>
<?php
        $hotel = array();
        $exToHotel = array();
        if(!empty($experience->еxperiencesToHotelsToExperienceDates)){
            foreach ($experience->еxperiencesToHotelsToExperienceDates as $key => $value) {
                if(isset($value->experienceDate->id) && $value->experienceDate->id == $exp_date_id){
                    $hotel[$key] = $value->hotel;
                    $hotel[$key]['exToHotel'] = 


DB::connection('mysql_veenus')->table('experiences_to_hotels')->where('hotels_id', $value->hotel->id)->where('experiences_id', $experience->id)->first();
                    $hotel_name = $value->hotel->name;
                }
            }
        }
        // pr($hotel);
        ?>
    <div class="notIndexContainer" style="padding-top: 0px;">
        <div class="tour_confirmation_wrapper" style="padding: 0;">
            <div class="tour_confirmation with_bg">
                
                <div class="reference">
                    @if(Session::has('success'))
                <div class="alert-success" style="padding:20px;margin-bottom:20px;">
                    {!! session('success') !!}
                </div>
                @endif
                </div>

                <div class="tc_intro">
                    <div class="heading">TOUR DETAILS</div>
                    <div class="location"><?php echo $cart_experience->experience_name; ?></div>
                    <div class="date">{{ date("D d M", strtotime($cart_experience->date_from)) }} - {{ date("D d M 'y", strtotime($cart_experience->date_to)) }} ( {{ $cart_experience->nights }} @if($cart_experience->nights > 1) nights @else night @endif )</div>
                    <div class="hotel"></div>
                </div>

                <div class="tc_content_wrapper">
                    <div class="tc_content">
                        <form method="post" id="tpForm" enctype="multipart" action="{{route('update-cd-hotel-amendment')}}">
                            @csrf
                            <div class="tc_boxes">

                               

                                <div class="tc_box_wrapper">
                                    <div class="tc_box">

                                        <div class="header">
                                            Ship Details
                                            
                                        </div>

                                       
                                       
                                        <div class="body">

                                            {!! isset($hotelAmemdment->cd_ship_details) ? $hotelAmemdment->cd_ship_details : '' !!}
                                           
                                        </div>
                                      

                                    </div>
                                </div>
                               <!--  <div class="tc_box_wrapper">
                                    <div class="tc_box">

                                        <div class="header">
                                            Tour Pack Template 

                                            
                                        </div>
                                        <div class="body">
                                           <?php /* <a href="javascript:;" exp_date_id="{{$experienceDate->id}}" exp_id="{{$experience->id}}"  id="HtlConfrmTemplate">Add  Hotel Confirmation Template </a> */?>
                                            <button type="button" class="btn btn-primary" exp_id="{{$cart_experience->experiences_id}}" id="HtlGetTemplate">Import Template </a>
                                            
                                        </div>
                                    </div>
                                </div> -->
                                <div class="tc_box_wrapper">
                                    <div class="tc_box">

                                        <div class="header">
                                            No. of Guests
                                            <?php if($datatab != 'collaborator' && empty($cartExeToTour)){ ?>
                                            <!-- <a href="#">Add Amendment</a> -->
                                        <?php } ?>
                                        </div>

                                        <div class="body">
                                             {!! isset($hotelAmemdment->cd_addtional_text) ? $hotelAmemdment->cd_addtional_text : '' !!}
                                           

                                        </div>

                                    </div>
                                </div>
                                <?php if(!empty($hotelAmemdment->cd_eta)){ ?> 
                                <div class="tc_box_wrapper">
                                    <div class="tc_box">

                                        <div class="header">
                                            Arrival
                                            <?php if($datatab != 'collaborator'  && empty($cartExeToTour)){ ?>
                                            <a href="javascript:;"  id="etaEdit1">Add Amendment</a>
                                        <?php } ?>
                                        </div>

                                        <div class="body">
                                            {!! isset($hotelAmemdment->cd_eta) ? $hotelAmemdment->cd_eta : '' !!}
                                            <textarea id="etaField1" name="hotel_eta" class="form-control" style="display: none;"> <?php $tp_eta =  (!empty($hotelAmemdment->hotel_eta) ? $hotelAmemdment->hotel_eta : ''); echo ($tp_eta);?></textarea>
                                            <div id="etaContent1">
                                                {!! (!empty($hotelAmemdment->hotel_eta) ? nl2br($hotelAmemdment->hotel_eta) : '') !!}
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <?php } ?>
                                <?php if(!empty($hotelAmemdment->cd_etd)){ ?> 
                                <div class="tc_box_wrapper">
                                    <div class="tc_box">

                                        <div class="header">
                                            Departure
                                            <?php if($datatab != 'collaborator' && empty($cartExeToTour)){ ?>
                                            <a href="javascript:;" id="etdEdit1">Add Amendment</a>
                                        <?php } ?>
                                        </div>

                                        <div class="body">
                                            {!! isset($hotelAmemdment->cd_etd) ? $hotelAmemdment->cd_etd : '' !!}
                                            <textarea id="etdField1" name="hotel_etd" class="form-control" style="display: none;"><?php $tp_etd =  (!empty($hotelAmemdment->hotel_etd) ? $hotelAmemdment->hotel_etd : ''); echo ($tp_etd);?></textarea>
                                                <div id="etdContent1">
                                                    {!! (!empty($hotelAmemdment->hotel_etd) ? nl2br($hotelAmemdment->hotel_etd) : '') !!}
                                                </div>

                                        </div>

                                    </div>
                                </div>
                                <?php } ?>
                                <div class="tc_box_wrapper">
                                    <div class="tc_box">

                                        <div class="header">
                                            Meal Arrangements
                                            <a href="javascript:;" id="mean_arrangementsEdit1">Add Amendment</a>
                                        </div>

                                        <div class="body">
                                            {!! isset($hotelAmemdment->cd_mean_arrangements) ? $hotelAmemdment->cd_mean_arrangements : '' !!}
                                            <textarea id="mean_arrangementsField1" name="hotel_mean_arrangements" class="form-control" style="display: none;"><?php $tp_mean_arrangements =  (!empty($hotelAmemdment->hotel_mean_arrangements) ? $hotelAmemdment->hotel_mean_arrangements : ''); echo ($tp_mean_arrangements);?></textarea>
                                            <div id="mean_arrangementsContent1">
                                                 {!! (!empty($hotelAmemdment->hotel_mean_arrangements) ? nl2br($hotelAmemdment->hotel_mean_arrangements) : '') !!}
                                                
                                            </div>
                                            
                                        </div>

                                    </div>
                                </div>
                                
                                
                               
                                <?php if(!empty($hotelAmemdment->cd_entertainments)){ ?> 
                                <div class="tc_box_wrapper">
                                    <div class="tc_box">

                                        <div class="header">
                                            Entertainment
                                            <?php if($datatab != 'collaborator' && empty($cartExeToTour)){ ?>
                                            <a href="javascript:;" id="dinnerEdit1">Add Amendment</a>
                                        <?php } ?>
                                        </div>

                                        <div class="body">
                                            {!! isset($hotelAmemdment->cd_entertainments) ? $hotelAmemdment->cd_entertainments : '' !!}
                                            <textarea id="dinnerField1" name="hotel_entertainments" class="form-control" style="display: none;"><?php $tp_dinner =  (!empty($hotelAmemdment->hotel_entertainments) ? $hotelAmemdment->hotel_entertainments : ''); echo ($tp_dinner);?></textarea>
                                            <div id="dinnerContent1">
                                                {!! (!empty($hotelAmemdment->hotel_entertainments) ? nl2br($hotelAmemdment->hotel_entertainments) : '') !!}
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <?php } ?>
                                <?php if(!empty($hotelAmemdment->cd_facility)){ ?> 
                                <div class="tc_box_wrapper">
                                    <div class="tc_box">

                                        <div class="header">
                                            On-board Facilities
                                            <?php if($datatab != 'collaborator' && empty($cartExeToTour)){ ?>
                                            <a  href="javascript:;" id="breakfastEdit1">Add Amendment</a>
                                        <?php } ?>
                                        </div>

                                        <div class="body">
                                            {!! isset($hotelAmemdment->cd_facility) ? $hotelAmemdment->cd_facility : '' !!}
                                            <textarea id="breakfastField1" name="hotel_facility" class="form-control" style="display: none;"><?php $tp_breakfast =  (!empty($hotelAmemdment->hotel_facility) ? $hotelAmemdment->hotel_facility : ''); echo ($tp_breakfast);?></textarea>
                                            <div id="breakfastContent1">
                                                {!! (!empty($hotelAmemdment->hotel_facility) ? nl2br($hotelAmemdment->hotel_facility) : '') !!}
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <?php } ?>
                                <?php if(!empty($hotelAmemdment->cd_itinerary)){ ?> 
                                <div class="tc_box_wrapper">
                                    <div class="tc_box">

                                        <div class="header">
                                            Itinerary
                                            <a href="javascript:;" id="mealEdit1">Add Amendment</a>
                                        </div>

                                        <div class="body">
                                            {!! $hotelAmemdment->cd_itinerary !!}
                                            <textarea id="mealField1" name="hotel_itinerary" class="form-control" style="display: none;"><?php $cd_itinerary =  (!empty($hotelAmemdment->hotel_itinerary) ? $hotelAmemdment->hotel_itinerary : ''); echo ($cd_itinerary);?></textarea>
                                            <div id="mealContent1">
                                                {!! (!empty($hotelAmemdment->hotel_itinerary) ? nl2br($hotelAmemdment->hotel_itinerary) : '') !!}
                                            </div>
                                            
                                        </div>

                                    </div>
                                </div>
                                <?php } ?>
                                <?php if(!empty($hotelAmemdment->cd_excursions)){ ?> 
                                <div class="tc_box_wrapper">
                                    <div class="tc_box">

                                        <div class="header">
                                            Excursions
                                            <?php if($datatab != 'collaborator' && empty($cartExeToTour)){ ?>
                                            <a href="javascript:;" id="inclusionEdit1">Add Amendment</a>
                                        <?php } ?>
                                        </div>

                                        <div class="body">
                                            {!! isset($hotelAmemdment->cd_excursions) ? $hotelAmemdment->cd_excursions : $hotelAmemdment->cd_excursions !!}
                                            <textarea id="inclusionField1" name="hotel_excursions" class="form-control" style="display: none;"><?php $tp_excursions =  (!empty($hotelAmemdment->hotel_excursions) ? $hotelAmemdment->hotel_excursions : ''); echo ($tp_excursions);?></textarea>
                                            <div id="inclusionContent1">
                                                {!! (!empty($hotelAmemdment->hotel_excursions) ? nl2br($hotelAmemdment->hotel_excursions) : '') !!}
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <?php } ?>
                               
                                <?php if(!empty($hotelAmemdment->cd_important_information)){ ?> 
                                <div class="tc_box_wrapper">
                                    <div class="tc_box">

                                        <div class="header">
                                            Important Information
                                            <a href="javascript:;" id="important_informationEdit1">Add Amendment</a>
                                        </div>

                                        <div class="body">
                                             {!! $hotelAmemdment->cd_important_information !!}
                                            <textarea id="important_informationField1" name="hotel_important_information" class="form-control" style="display: none;"><?php $cd_important_information =  (!empty($hotelAmemdment->hotel_important_information) ? $hotelAmemdment->hotel_important_information : ''); echo ($cd_important_information);?></textarea>
                                            <div id="important_informationContent1">
                                                {!! (!empty($hotelAmemdment->hotel_important_information) ? nl2br($hotelAmemdment->hotel_important_information) : '') !!}
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <?php } ?>
                                <p>I have reviewed and agree with the above tour details.</p>
                            </div>
                           
                            <input type="hidden" name="dates_rates_id" value="{{ $cart_experience->cruise_dates_rates_id }}">
                            <input type="hidden" id="cart_exp_id" name="cart_exp_id" value="{{ $cart_experience->id }}">
                            <input type="hidden" name="exp_date_id" value="{{ $exp_date_id }}">
                            <input type="hidden" name="type" value="{{ $type }}">
                            
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="signatures">
                                         <div class="signature_column">

                                            <div class="heading">
                                                Signature
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <input type="text" class="form-control" name="hotel_sign" value="">
                                </div> 
                                <div class="col-lg-12 ctas">
                                   <!--  <a href="javascript:;" class="cta" id="saveTpForm1" style="width: auto;margin: auto;">
                                        Sign Document
                                    </a> -->
                                    <button type="submit"  class="cta" id="saveTpForm1" style="width: auto;margin: auto;">Sign Document</button>
                                </div>                             
                            </div>
                        </form>

                       <div class="ctas">

                            <!-- <a href="javascript:;" id="downloadPDFtp" class="cta" dates_rates_id="{{$cart_experience->dates_rates_id}}" exp_id="{{$experience->id}}" style="width: 180px;margin: auto;">
                                Download
                            </a> -->
                           
                           <!--  <a target="_blank" href="<?=URL('download-showpack-pdf/'.$cart_experience->dates_rates_id.'/'.$experience->id)?>" class="cta">
                                Download
                            </a> -->
                            <!-- <a href="javascript:;" id="downloadPDFtp2" class="cta" dates_rates_id="{{$cart_experience->dates_rates_id}}" exp_id="{{$experience->id}}" style="width: 180px;margin: auto;">
                                Print
                            </a> -->
                            <style type="text/css">
                             button.cta {
                                display: block;
                                width: 180px;
                                background: #FCA311;
                                border: solid 1px #FCA311;
                                border-radius: 5px;
                                font-size: 1.125rem;
                                font-weight: 700;
                                line-height: 1.5;
                                text-align: center;
                                color: #FFF;
                                padding: 10px;
                                margin: 0 50px;
                            }
                            </style>
                           
                            
                          
                             

                        </div>
                            
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div id="tobeprinted" style="display:none;"></div>
<script type="text/javascript">
    $(document).on('click', '.add_amendment', function(){
        var cart_exp_id = $('#cart_exp_id').val();
        $.ajax({
            url: base_url+'/super-user/update-tp-data',
            type: 'POST',
            data: {'formData':formData},
            success: function(data) {
                $('.loader').hide();
                $('#tourpackModal').modal('hide');
                $('#confirmTPform').submit();
                toastSuccess('Tour has been updated successfully.');
            },
            error: function(e) {
            }
        }); 
    });
    $(document).on('click', '#parking_amenityEdit1', function(){
        $('#parking_amenityField1').show();
        $('#parking_amenityContent1').hide();
    });
    $(document).on('click', '#porterage_amenityEdit1', function(){
        $('#porterage_amenityField1').show();
        $('#porterage_amenityContent1').hide();
    });
    $(document).on('click', '#lift_access_amenityEdit1', function(){
        $('#lift_access_amenityField1').show();
        $('#lift_access_amenityContent1').hide();
    });
    $(document).on('click', '#leisure_amenityEdit1', function(){
        $('#leisure_amenityField1').show();
        $('#leisure_amenityContent1').hide();
    });
     $(document).on('click', '#breakfastEdit1', function(){
        $('#breakfastField1').show();
        $('#breakfastContent1').hide();
    });
    $(document).on('click', '#dinnerEdit1', function(){
        $('#dinnerField1').show();
        $('#dinnerContent1').hide();
    });
    $(document).on('click', '#etdEdit1', function(){
        $('#etdField1').show();
        $('#etdContent1').hide();
    });
    $(document).on('click', '#mean_arrangementsEdit1', function(){
        $('#mean_arrangementsField1').show();
        $('#mean_arrangementsContent1').hide();
    });
    $(document).on('click', '#etaEdit1', function(){
        $('#etaField1').show();
        $('#etaContent1').hide();
    });
    $(document).on('click', '#inclusionEdit1', function(){
        $('#inclusionField1').show();
        $('#inclusionContent1').hide();
    });
     $(document).on('click', '#servicesEdit1', function(){
        $('#servicesField1').show();
        $('#servicesContent1').hide();
        //CKEDITOR.replace( 'servicesField1', {toolbar: [{ name: 'styles',items : [ 'Styles' ] },]});
    });
    $(document).on('click', '#house_keepingEdit1', function(){
        $('#house_keepingField1').show();
        $('#house_keepingContent1').hide();
    });
    $(document).on('click', '#mealEdit1', function(){
        $('#mealField1').show();
        $('#mealContent1').hide();
    });
    $(document).on('click', '#important_informationEdit1', function(){
        $('#important_informationField1').show();
        $('#important_informationContent1').hide();
    });
    /*$(document).on('click', '#saveTpForm1', function(e) {
        e.preventDefault();
        var formData = $("#tpForm").serialize();
        $('.loader').show();    
        $.ajax({
            url: base_url+'/update-tds-hotel-amendment',
            type: 'POST',
            data: {'formData':formData},
            success: function(data) {
                $('.loader').hide();
                toastSuccess('Data updated successfully.');
                window.location.reload();
                //$('#tourpackModal').modal('hide');
                //toastSuccess('Tour has been updated successfully.');
            },
            error: function(e) {
            }
        });   
    });*/
    $(document).on('click', '#confirmTPbtn', function(e) {
        e.preventDefault();
        var formData = $("#tpForm").serialize();
        $('.loader').show();    
        $.ajax({
            url: base_url+'/super-user/update-tp-data',
            type: 'POST',
            data: {'formData':formData},
            success: function(data) {
                $('.loader').hide();
                $('#tourpackModal').modal('hide');
                $('#confirmTPform').submit();
                toastSuccess('Tour has been updated successfully.');
            },
            error: function(e) {
            }
        });   
    });
    $(document).on('click', '#downloadPDFtp,#downloadPDFtp2', function(e) {
        e.preventDefault();
        var exp_id = $(this).attr('exp_id');
        var dates_rates_id = $(this).attr('dates_rates_id');
        $('.loader').show();    
        $.ajax({
            url: base_url+'/download-tp-pdf2',
            type: 'POST',
            data: {'exp_id':exp_id,'dates_rates_id':dates_rates_id},
            success: function(data) {
                $('.loader').hide();  
                $('#tobeprinted').html(data.response); 
                w=window.open('https://asdasdasd');
                w.document.write($('#tobeprinted').html());
                setTimeout(function () {
                    w.print();
                    w.close(); 
                }, 400);
               
            },
            error: function(e) {
            }
        });   
    });
    $(document).ready(function(){
       // $(document).on('click','#addAmenitytour', function(){
            $("#addAmenitytour").click(function(){
            var html='';
                    html +='<div class="col-md-12 list__item"> <input class="form-control" name="hotel_amenities[]" value="" type="text" placeholder="Enter amenity here..." style="width:50%;float: left; margin-right: 5px;  margin-bottom: 5px;">';
                    html +='<a href="javascript:;" class="remove_cta removeAmenity"><i class="far fa-times-circle"></i></a>';
                    html +='</div>';
                    
                    $("#appendAmenities").append(html);
            /*if(($("#appendAmenities div.list__item").length == 1) && ($("#appendAmenities div.list__item").css('display') == 'none')){
                $("#appendAmenities div.list__item").show(); 
            }else{
                
                $("#appendAmenities").append(html);
                $("#appendAmenities div.list__item").last().clone().appendTo($("#appendAmenities"));
                $("#appendAmenities div.list__item").last().find('input').val('');
                $('.removeAmenity').css('display','block'); 
            }*/
        });
        $(document).on('click','.removeAmenity', function(){
            if($("#appendAmenities div.list__item").length == 1){
                $("#appendAmenities div.list__item").last().find('input').val('');
                $("#appendAmenities div.list__item").hide(); 
            }else{
                $(this).closest('div').remove();
            }
        });
         $(document).on('click', '#HtlGetTemplate', function(e) {
        e.preventDefault();
        var exp_id = $(this).attr('exp_id');
        if(confirm('Are you sure you want to import the template, this will overwrite data in the exisiting fields?'))
        {
             $('.loader').show();    
            $.ajax({
                url: base_url+'/get-tourpack-details/'+exp_id,
                //url: base_url+'/super-user/edit-hc',
                type: 'GET',
                success: function(data) {
                    
                    if (data.confirmation_template_hc != null) {
                        
                        $('#etaField1').val(data.confirmation_template_hc.eta); 
                        $('#etdField1').val(data.confirmation_template_hc.etd); 
                        $('#dinnerField1').val(data.confirmation_template_hc.dinner); 
                        $('#breakfastField1').val(data.confirmation_template_hc.breakfast); 
                        $('#inclusionField1').val(data.confirmation_template_hc.tour_inclusions); 
                        
                        $('#etaContent1').html(data.confirmation_template_hc.eta); 
                        $('#etdContent1').html(data.confirmation_template_hc.etd); 
                        $('#dinnerContent1').html(data.confirmation_template_hc.dinner); 
                        $('#breakfastContent1').html(data.confirmation_template_hc.breakfast); 
                        $('#inclusionContent1').html(data.confirmation_template_hc.tour_inclusions); 

                       
                        $('.loader').hide();  
                    } else{
                        $('.loader').hide();  
                        return false;
                    }
                   // $('#HtlConfrmTplBody').html(data.html); 
                   // $('#HtlConfrmTplBody').show(); 
                },
                error: function(e) {
                }
            });  
        }
        
        });
    });
</script>

@endsection