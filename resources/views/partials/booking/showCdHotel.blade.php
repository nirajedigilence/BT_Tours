<?php
    $cartExeToTour = '';
    $datatab = 'superuser';
   
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
    $pattern = "/<p[^>]*><\\/p[^>]*>/";  
?>
    <div class="notIndexContainer" style="padding-top: 0px;">
        <div class="tour_confirmation_wrapper" style="padding: 0;">
            <div class="tour_confirmation with_bg">

                <div class="reference">
                </div>

                <div class="tc_intro">
                     <div class="heading">CRUISE DETAILS</div>
                    <div class="location"><?php echo $cart_experience->experience_name; ?></div>
                    <div class="date">{{ $ship_data['date_from'] }} - {{ $ship_data['date_to'] }} ( {{ $ship_data['nights'] }} nights)</div>
                    <div class="hotel">{{ $ship_data['hotel_name'] }}</div>
                </div>

                <div class="tc_content_wrapper">
                    <div class="tc_content">
                        <form method="post" id="tpForm">
                            <div class="tc_boxes">

                               

                                <div class="tc_box_wrapper">
                                    <div class="tc_box">

                                        <div class="header">
                                            Hotel Details
                                            
                                        </div>

                                       
                                       
                                        <div class="body">

                                            <ul>
                                                <li>Hotel Name: <strong><?php echo (!empty($hotel) ? $hotel->name : ''); ?></strong></li>
                                                <li>Hotel Address: <strong><?php
                                                    $address = array();
                                                    if(!empty($hotel->street)){
                                                        $address[] = $hotel->street;
                                                    } 
                                                    if(!empty($hotel->city)){
                                                        $address[] = $hotel->city;
                                                    } 
                                                    if(!empty($hotel->country)){
                                                        $address[] = $hotel->country;
                                                    } 
                                                    if(!empty($hotel->postcode)){
                                                        $address[] = $hotel->postcode;
                                                    } 
                                                    echo implode(', ', $address); ?></strong></li>
                                                <li>Contact number: <strong><?php echo (!empty($hotel) ? $hotel->phone : ''); ?></strong></li>
                                                 
                                            </ul>
                                            
                                             
                                            
                                        </div>
                                        
                                       

                                    </div>
                                </div>
                              
                                 <div class="tc_box_wrapper">
                                    <div class="tc_box">

                                        <div class="header">
                                            No. of Guests
                                            <?php if($datatab != 'collaborator' && empty($cartExeToTour)){ ?>
                                            <a href="javascript:;"  id="atEdit">Edit</a>
                                        <?php } ?>
                                        </div>

                                        <div class="body">
                                            <?php
                                            $rooms_ppl = 0;
                                            foreach ($cartExperiencesToRooms as $key => $value) {
                                                if($value->paid == 1 || $value->deposit == 1){
                                                    $rooms_sold = $rooms_sold+1;
                                                    if(!empty($value->names)){
                                                        $names = array_filter(explode(',', $value->names));
                                                        $rooms_ppl  = $rooms_ppl+count($names);
                                                    }
                                                }
                                            }
                                            $total_pax = get_total_pax($cart_experience->id,1);
                                            ?>
                                            <p>
                                                <strong>{{$total_pax}} 
                                                <?php echo ($cart_experience->driver == 1) ? 'plus 1 Dr' : ''; ?>
                                                <?php echo ($cart_experience->driver == 2) ? 'plus 2 Dr & Cr' : ''; ?></strong> <!-- (see rooming list for details, special and dietary requests) -->
                                            </p>
                                            <!-- <p>Please refer to the latest guest list for 13.11.2023 specific room break down and all requests.</p> -->
                                            <textarea id="atField" name="addtional_text" class="form-control" style="display: none;">{{ isset($cart_experience->addtional_text) ? preg_replace($pattern, '', ($cart_experience->addtional_text)) : '' }} </textarea>
                                            <div id="atContent">
                                                {!! isset($cart_experience->addtional_text) ? $cart_experience->addtional_text : '' !!}

                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="tc_box_wrapper">
                                    <div class="tc_box">

                                        <div class="header">
                                            Arrival
                                            <?php if($datatab != 'collaborator'  && empty($cartExeToTour)){ ?>
                                            <a href="javascript:;"  id="etaEdit1">Edit</a>
                                        <?php } ?>
                                        </div>

                                        <div class="body">

                                            <textarea id="etaField1" name="eta" class="form-control" style="display: none;">{{ !empty($hotelAmemdment->cd_eta) ? $hotelAmemdment->cd_eta : nl2br($dates_rates->eta) }}</textarea>
                                            <div id="etaContent1">
                                               
                                               <?php if(!empty($hotelAmemdment->hotel_sign)) {?>
                                                   {!! !empty($hotelAmemdment->cd_eta) ?$hotelAmemdment->cd_eta : nl2br($dates_rates->eta) !!}
                                                   
                                                   {!! !empty($hotelAmemdment->hotel_eta) ? '<br/><span class="marker">'.nl2br($hotelAmemdment->hotel_eta).'</span>' : '' !!}
                                                <?php }else{ ?> 
                                                    {!! !empty($hotelAmemdment->cd_eta) ?$hotelAmemdment->cd_eta : nl2br($dates_rates->eta) !!}
                                                <?php } ?>
                                               
                                            </div>
                                            
                                        </div>

                                    </div>
                                </div>

                                <div class="tc_box_wrapper">
                                    <div class="tc_box">

                                        <div class="header">
                                            Departure
                                            <?php if($datatab != 'collaborator' && empty($cartExeToTour)){ ?>
                                            <a href="javascript:;" id="etdEdit1">Edit</a>
                                        <?php } ?>
                                        </div>

                                        <div class="body">

                                            <textarea id="etdField1" name="etd" class="form-control" style="display: none;">{{ !empty($hotelAmemdment->cd_etd) ? $hotelAmemdment->cd_etd : nl2br($dates_rates->etd) }}</textarea>
                                                <div id="etdContent1">
                                                <?php if(!empty($hotelAmemdment->hotel_sign)) {?>
                                                   {!! !empty($hotelAmemdment->cd_etd) ?$hotelAmemdment->cd_etd : nl2br($dates_rates->etd) !!}
                                                  
                                                   {!! !empty($hotelAmemdment->hotel_etd) ? '<br/><span class="marker">'.nl2br($hotelAmemdment->hotel_etd).'</span>' : '' !!}
                                                <?php }else{ ?> 
                                                    {!! !empty($hotelAmemdment->cd_etd) ?$hotelAmemdment->cd_etd : nl2br($dates_rates->etd) !!}
                                                <?php } ?>
                                                    
                                                    
                                                </div>
                                                
                                        </div>

                                    </div>
                                </div>
                                <div class="tc_box_wrapper">
                                    <div class="tc_box">

                                        <div class="header">
                                            Meal Arrangements
                                            <a href="javascript:;" id="mean_arrangementsEdit1">Edit</a>
                                        </div>

                                        <div class="body">
                                            <textarea id="mean_arrangementsField1" name="cd_mean_arrangements" class="form-control" style="display: none;">{{ !empty($hotelAmemdment->cd_mean_arrangements) ? $hotelAmemdment->cd_mean_arrangements : nl2br($dates_rates->meal_arrangements) }}</textarea>
                                            <div id="mean_arrangementsContent1">
                                                <?php if(!empty($hotelAmemdment->hotel_sign)) {?>
                                                   {!! !empty($hotelAmemdment->cd_mean_arrangements) ?$hotelAmemdment->cd_mean_arrangements : nl2br($dates_rates->meal_arrangements) !!}
                                                   
                                                   {!! !empty($hotelAmemdment->hotel_mean_arrangements) ? '<br/><span class="marker">'.nl2br($hotelAmemdment->hotel_mean_arrangements).'</span>' : '' !!}
                                                <?php }else{ ?> 
                                                    {!! !empty($hotelAmemdment->cd_mean_arrangements) ?$hotelAmemdment->cd_mean_arrangements : nl2br($dates_rates->meal_arrangements) !!}
                                                <?php } ?>
                                                
                                                
                                            </div>
                                            
                                        </div>

                                    </div>
                                </div>
                               <div class="tc_box_wrapper">
                                    <div class="tc_box">

                                        <div class="header">
                                            Inclusions
                                            <?php if($datatab != 'collaborator' && empty($cartExeToTour)){ ?>
                                            <a href="javascript:;" id="inclusionEdit1">Edit</a>
                                        <?php } ?>
                                        </div>

                                        <div class="body">

                                            <textarea id="inclusionField1" name="cd_tour_inclusions" class="form-control" style="display: none;">{{ !empty($hotelAmemdment->cd_tour_inclusions) ? $hotelAmemdment->cd_tour_inclusions : '' }}</textarea>
                                            <div id="inclusionContent1">
                                                 <?php if(!empty($hotelAmemdment->hotel_sign)) {?>
                                                   {!! !empty($hotelAmemdment->cd_tour_inclusions) ?$hotelAmemdment->cd_tour_inclusions : '' !!}
                                                   
                                                   {!! !empty($hotelAmemdment->hotel_tour_inclusions) ? '<br/><span class="marker">'.nl2br($hotelAmemdment->hotel_tour_inclusions).'</span>' : '' !!}
                                                <?php }else{ ?> 
                                                   {!! !empty($hotelAmemdment->cd_tour_inclusions) ?$hotelAmemdment->cd_tour_inclusions :''!!}
                                                <?php } ?>
                                                
                                            </div>
                                            
                                        </div>

                                    </div>
                                </div>
                                <div class="tc_box_wrapper">
                                    <div class="tc_box">

                                        <div class="header">
                                            Service and facilities
                                            <?php if($datatab != 'collaborator' && empty($cartExeToTour)){ ?>
                                            <a href="javascript:;" id="servicesEdit1">Edit</a>
                                        <?php } ?>
                                        </div>

                                        <div class="body">

                                            <textarea id="servicesField1" name="cd_services_facilities" class="form-control" style="display: none;">{{ !empty($hotelAmemdment->cd_services_facilities) ? $hotelAmemdment->cd_services_facilities : '' }}</textarea>
                                            <div id="servicesContent1">
                                                 <?php if(!empty($hotelAmemdment->hotel_sign)) {?>
                                                   {!! !empty($hotelAmemdment->cd_services_facilities) ?$hotelAmemdment->cd_services_facilities : '' !!}
                                                   
                                                   {!! !empty($hotelAmemdment->hotel_services_facilities) ? '<br/><span class="marker">'.nl2br($hotelAmemdment->hotel_services_facilities).'</span>' : '' !!}
                                                <?php }else{ ?> 
                                                   {!! !empty($hotelAmemdment->cd_services_facilities) ?$hotelAmemdment->cd_services_facilities : '' !!}
                                                <?php } ?>
                                                
                                            </div>
                                            
                                        </div>

                                    </div>
                                </div>
                                 <div class="tc_box_wrapper">
                                    <div class="tc_box">

                                        <div class="header">
                                            Housekeeping
                                            <a href="javascript:;" id="house_keepingEdit1">Edit</a>
                                        </div>

                                        <div class="body">
                                            <textarea id="house_keepingField1" name="cd_house_keeping" class="form-control" style="display: none;">{{ !empty($hotelAmemdment->cd_house_keeping) ? $hotelAmemdment->cd_house_keeping : '' }}</textarea>
                                            <div id="house_keepingContent1">
                                                 <?php if(!empty($hotelAmemdment->hotel_sign)) {?>
                                                   {!! !empty($hotelAmemdment->cd_house_keeping) ?$hotelAmemdment->cd_house_keeping : '' !!}
                                                   
                                                   {!! !empty($hotelAmemdment->hotel_house_keeping) ? '<br/><span class="marker">'.nl2br($hotelAmemdment->hotel_house_keeping).'</span>' : '' !!}
                                                <?php }else{ ?> 
                                                   {!! !empty($hotelAmemdment->cd_house_keeping) ?$hotelAmemdment->cd_house_keeping : '' !!}
                                                <?php } ?>
                                                 
                                                
                                            </div>
                                            
                                        </div>

                                    </div>
                                </div>
                                
                                
                                <div class="tc_box_wrapper">
                                    <div class="tc_box">

                                        <div class="header">
                                            Important Information
                                            <a href="javascript:;" id="important_informationEdit1">Edit</a>
                                        </div>

                                        <div class="body">
                                            <textarea id="important_informationField1" name="cd_important_information" class="form-control" style="display: none;">{{ !empty($hotelAmemdment->cd_important_information) ? $hotelAmemdment->cd_important_information : '' }}</textarea>
                                            <div id="important_informationContent1">
                                                
                                                <?php if(!empty($hotelAmemdment->hotel_sign)) {?>
                                                   {!! !empty($hotelAmemdment->cd_important_information) ?$hotelAmemdment->cd_important_information : '' !!}
                                                   {!! !empty($hotelAmemdment->hotel_important_information) ? '<br/><span class="marker">'.nl2br($hotelAmemdment->hotel_important_information).'</span>' : '' !!}
                                                <?php }else{ ?> 
                                                   {!! !empty($hotelAmemdment->cd_important_information) ?$hotelAmemdment->cd_important_information : '' !!}
                                                <?php } ?>
                                                
                                            </div>
                                            
                                        </div>

                                    </div>
                                </div>
                                
                                <p>I have reviewed and agree with the above tour details.</p>
                            </div>
                            <div class="signatures">
                            <?php if(!empty($hotelAmemdment->hotel_sign)) {?>
                                         <div class="signature_column">

                                            <div class="heading">
                                                {{$hotelAmemdment->hotel_sign}}
                                            </div>
                                            <p>Hotel</p>
                                            <p>({{date('d/m/Y',strtotime($hotelAmemdment->hotel_sign_date))}})</p>
                                        </div>
                                <?php } ?>
                               

                            </div>
                           
                            <input type="hidden" name="dates_rates_id" value="{{ $cart_experience->cruise_dates_rates_id }}">
                            <input type="hidden" name="cart_experiences_id" value="{{ $cart_experience->id }}">
                            <input type="hidden" name="type" value="{{ $type }}">
                            <input type="hidden" name="exp_date_id" value="{{ $exp_date_id }}">
                            <input type="hidden" name="unmark_completed" id="unmark_completed" value="">
                             <input type="hidden" name="mark_completed" id="mark_completed_flag" value="">
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
                            <?php
                             if($datatab != 'collaborator' && empty($cartExeToTour)){
                             ?>
                           
                            
                            <?php if(empty($hotelAmemdment->hotel_sign) && empty($hotelAmemdment->mark_as_completed_tds)){ ?>
                            <a target="_blank" href="<?=URL('download-tds/'.$cart_experience->id.'/'.$exp_date_id)?>" class="cta">
                                Download
                            </a>
                             <a href="javascript:;" class="cta" id="saveTpForm1" style="width: auto;">
                                Save
                            </a>
                             <a href="javascript::void(0)" data-link="<?=URL('show-cd-hotel-amendment/'.$cart_exp_id_enc.'/'.base64_encode($exp_date_id).'/'.$type)?>" class="cta generate_link" style="width: auto;">
                                Complete & Generate link
                            </a>
                            
                            <?php } ?>
                            <?php if(empty($hotelAmemdment->hotel_sign) && !empty($hotelAmemdment->mark_as_completed_tds)){ ?>
                            <a target="_blank" href="<?=URL('download-tds/'.$cart_experience->id.'/'.$exp_date_id)?>" class="cta">
                                Download
                            </a>
                            
                            <a href="javascript::void(0)"  class="cta un_mark_document" style="width: auto;">
                                Un-mark as Complete
                            </a>
                             <a href="<?=URL('show-cd-hotel-amendment/'.$cart_exp_id_enc.'/'.base64_encode($exp_date_id).'/'.$type)?>" target="_blank" class="cta" style="width: auto;">
                                Get Link
                            </a>
                            <?php } ?>
                           <?php if(!empty($hotelAmemdment->hotel_sign) && !empty($hotelAmemdment->mark_as_completed_tds)){ ?>
                            <a target="_blank" href="<?=URL('download-tds/'.$cart_experience->id.'/'.$exp_date_id)?>" class="cta">
                                Download
                            </a>
                            
                            <?php } ?>
                             <?php 
                             } 
                             ?>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
     <!-- <a target="_blank" href="<?=URL('show-tds-hotel/'.$cart_exp_id_enc)?>" class="cta" id="generate_link_new" >Generate Link</a>  -->
    <div id="tobeprinted" style="display:none;"></div>
<script type="text/javascript">
    $(document).on('click', '#atEdit', function(){
        $('#atField').show();
        $('#atContent').hide();
         CKEDITOR.replace( 'atField', {toolbar: [{ name: 'styles',items : [ 'Styles' ] },]});
    });
    $(document).on('click', '#parking_amenityEdit1', function(){
        $('#parking_amenityField1').show();
        $('#parking_amenityContent1').hide();
        CKEDITOR.replace( 'parking_amenityField1', {toolbar: [{ name: 'styles',items : [ 'Styles' ] },]});
    });
      $(document).on('click', '#porterage_amenityEdit1', function(){
        $('#porterage_amenityField1').show();
        $('#porterage_amenityContent1').hide();
        CKEDITOR.replace( 'porterage_amenityField1', {toolbar: [{ name: 'styles',items : [ 'Styles' ] },]});
    });
       $(document).on('click', '#lift_access_amenityEdit1', function(){
        $('#lift_access_amenityField1').show();
        $('#lift_access_amenityContent1').hide();
        CKEDITOR.replace( 'lift_access_amenityField1', {toolbar: [{ name: 'styles',items : [ 'Styles' ] },]});
    });
        $(document).on('click', '#leisure_amenityEdit1', function(){
        $('#leisure_amenityField1').show();
        $('#leisure_amenityContent1').hide();
        CKEDITOR.replace( 'leisure_amenityField1', {toolbar: [{ name: 'styles',items : [ 'Styles' ] },]});
    });
     $(document).on('click', '#breakfastEdit1', function(){
        $('#breakfastField1').show();
        $('#breakfastContent1').hide();
        CKEDITOR.replace( 'breakfastField1', {toolbar: [{ name: 'styles',items : [ 'Styles' ] },]});
    });
    $(document).on('click', '#dinnerEdit1', function(){
        $('#dinnerField1').show();
        $('#dinnerContent1').hide();
        CKEDITOR.replace( 'dinnerField1', {toolbar: [{ name: 'styles',items : [ 'Styles' ] },]});
    });
    $(document).on('click', '#etdEdit1', function(){
        $('#etdField1').show();
        $('#etdContent1').hide();
        CKEDITOR.replace( 'etdField1', {toolbar: [{ name: 'styles',items : [ 'Styles' ] },]});
    });
    $(document).on('click', '#etaEdit1', function(){
        $('#etaField1').show();
        $('#etaContent1').hide();
        $('#ratesallocationContent').hide();
         CKEDITOR.replace( 'etaField1', {toolbar: [{ name: 'styles',items : [ 'Styles' ] },]});
    });
    $(document).on('click', '#inclusionEdit1', function(){
        $('#inclusionField1').show();
        $('#inclusionContent1').hide();
        CKEDITOR.replace( 'inclusionField1', {toolbar: [{ name: 'styles',items : [ 'Styles' ] },]});
    });
    $(document).on('click', '#servicesEdit1', function(){
        $('#servicesField1').show();
        $('#servicesContent1').hide();
        CKEDITOR.replace( 'servicesField1', {toolbar: [{ name: 'styles',items : [ 'Styles' ] },]});
    });
     $(document).on('click', '#house_keepingEdit1', function(){
        $('#house_keepingField1').show();
        $('#house_keepingContent1').hide();
        CKEDITOR.replace( 'house_keepingField1', {toolbar: [{ name: 'styles',items : [ 'Styles' ] },]});
    });
      $(document).on('click', '#mealEdit1', function(){
        $('#mealField1').show();
        $('#mealContent1').hide();
        CKEDITOR.replace( 'mealField1', {toolbar: [{ name: 'styles',items : [ 'Styles' ] },]});
    });
      $(document).on('click', '#mean_arrangementsEdit1', function(){
        $('#mean_arrangementsField1').show();
        $('#mean_arrangementsContent1').hide();
        CKEDITOR.replace( 'mean_arrangementsField1', {toolbar: [{ name: 'styles',items : [ 'Styles' ] },]});
    });
      
       $(document).on('click', '#important_informationEdit1', function(){
        $('#important_informationField1').show();
        $('#important_informationContent1').hide();
        CKEDITOR.replace( 'important_informationField1', {toolbar: [{ name: 'styles',items : [ 'Styles' ] },]});
    });
    $(document).on('click', '.generate_link', function(){
        $('#mark_completed_flag').val('1');
       $('#saveTpForm1').trigger("click");
       /* $('#generate_link_new').trigger("click");*/

           
             
     
    });
    $(document).on('click', '.un_mark_document', function(){
        $('#unmark_completed').val('1');
      for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        }
        var formData = $("#tpForm").serialize();
        $('.loader').show();    
        $.ajax({
            url: base_url+'/super-user/update-cart-tds-data',
            type: 'POST',
            data: {'formData':formData},
            success: function(data) {
                $('.loader').hide();
                $('#tourpackModal').modal('hide');
                toastSuccess('Tour has been updated successfully.');
                
            },
            error: function(e) {
            }
        });   

           
             
     
    });
    $(document).on('click', '.get_link', function(){
       alert($(this).attr('data-link'));

           
             
     
    });
    <?php if(!empty($hotelAmemdment->hotel_sign) ){ ?>
        $('.header a').hide();
    <?php } ?>

    <?php if(!empty($hotelAmemdment->mark_as_completed_tds)){ ?>

        $('.header a').hide();
    <?php } ?>
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
    $(document).on('click', '#etaEdit1', function(){
        $('#etaField1').show();
        $('#etaContent1').hide();
    });
    $(document).on('click', '#inclusionEdit1', function(){
        $('#inclusionField1').show();
        $('#inclusionContent1').hide();
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
    $(document).on('click', '#saveTpForm1', function(e) {
        e.preventDefault();
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        }
        var formData = $("#tpForm").serialize();
        $('.loader').show();    
        $.ajax({
            url: base_url+'/super-user/update-cart-cd-data',
            type: 'POST',
            data: {'formData':formData},
            success: function(data) {
                $('.loader').hide();
                $('#tourpackModal').modal('hide');
                toastSuccess('Tour has been updated successfully.');
                var flag =  $('#mark_completed_flag').val();
                if(flag == 1)
               {
                url_link = $('.generate_link').attr('data-link');
                //window.open(url, '_blank')
                window.location.href=$('.generate_link').attr('data-link');
               }
            },
            error: function(e) {
            }
        });   
    });
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