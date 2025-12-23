<style type="text/css">.no-boder{border: unset !important ;}</style>
<div class="notIndexContainer" style="padding-top:0;">
    <div class="tour_confirmation_wrapper" style="padding: 0;">
        <div class="tour_confirmation">

            <div class="logo">
                <img src="{{ asset('images/logo2x.png') }}" alt="Veenus">
            </div>
            <?php 
            $e_dates = array();
            if(!empty($experienceDate)){
                foreach ($experienceDate as $key => $value) {
                    if(!empty($value['dates_rates_id'])){
                        $e_dates['date_from'][] = strtotime($value['date_from']);
                        $e_dates['date_to'][] = strtotime($value['date_to']);
                    }
                } 
            }
            $_dateMin = min($e_dates['date_from']);
            $_dateMax = max($e_dates['date_to']);
            $diff = $_dateMax - $_dateMin; 
            $nights = round($diff / 86400);
            
            ?>
            <div class="tc_intro">
                <div class="heading">CRUISE BOOKING CONFIRMATION</div>
                <div class="location"><?php echo $experience->name; ?></div>
                <div class="date">{{ date("D d M", $_dateMin) }} - {{ date("D d M 'y", $_dateMax) }} ({{$nights}} nights)</div>
                <div class="hotel"><?php echo (!empty($hotel) && (count($hotel) == 1) ? $hotel[0]->name : ''); ?></div>
            </div>

            <div class="tc_content">
                <form method="post" id="etcForm">
                <div class="tc_boxes">

                    <div class="tc_box_wrapper">
                        <div class="tc_box">

                            <div class="header">
                                Ref
                            </div>

                            <div class="body">

                                <p>
                                    
                                </p>

                            </div>

                        </div>
                    </div>
                     <div class="tc_box_wrapper split">

                                
                                <div class="tc_box">

                                    <div class="header">
                                        Tour Date
                                    </div>

                                    <div class="body">

                                        <p>
                                            {{ date("D d M", strtotime($value['date_from'])) }} - {{ date("D d M 'y", strtotime($value['date_to'])) }}
                                        </p>

                                    </div>

                                </div>

                                <div class="tc_box">

                                    <div class="header">
                                       Nights
                                    </div>

                                    <div class="body">

                                        <p>
                                            ({{$nights}} nights)
                                        </p>

                                    </div>

                                </div>

                            </div>
                            <div class="tc_box_wrapper">
                                <div class="tc_box">

                                    <div class="header">
                                        <?php echo $experience->name; ?>
                                    </div>

                                    <div class="body">

                                        <div class="hotel">





                                        </div>
                                        <?php  $river = explode(',',$experience->rivers);
                                        $river_name = '';
                                        if(!empty($river))
                                        {
                                            foreach($river as $rid)
                                            {
                                               $rname= 


DB::connection('mysql_veenus')->table('rivers')->where('id',$rid)->first();
                                               $f= (!empty($river_name)?', ':'');
                                               $river_name = $f.$rname->name;
                                            }
                                        }
                                        ?>
                                        <p><b>Ship: </b> <?php echo (!empty($hotel) && (count($hotel) == 1) ? $hotel[0]->name : ''); ?></p>
                                        <p><b>Cruise date: </b> {{ date("D d M", strtotime($value['date_from'])) }} - {{ date("D d M 'y", strtotime($value['date_to'])) }} </p>
                                        <p><b>River: </b>{{$river_name}} </p>
                                        <p><b>Route: </b><?php $r1 = 0; $count = count($experience->getExperiencesToRoutes); ?>
                                        @foreach ($experience->getExperiencesToRoutes as $routev){{ $routev->name }} 
                                        <span style="color:#14213D;">{{(($r1+1)<$count)?'>':''}}</span>
                                        <?php $r1++; ?>
                                        @endforeach</p>

                                        <p><b>Embarkation: </b>{{!empty($experienceDate[0]->shipDates->embarkation)?$experienceDate[0]->shipDates->embarkation:''}}</p>
                                        <p><b>Disembarkation: </b>{{!empty($experienceDate[0]->shipDates->disembarkation)?$experienceDate[0]->shipDates->disembarkation:''}} </p>

                                    </div>
                                </div>


                            </div>
                           <?php /* <div class="tc_box_wrapper">
                                <div class="tc_box">

                                    <div class="header">
                                        Crossings
                                    </div>

                                    <div class="body">
                                        <?php 

                                        $crossing_inbound  = $cart_experience->crossing_inbound_data->overnight;
                                        $crossing_outbound = $cart_experience->crossing_outbound_data->overnight;
                                        $overnight_inbound = $cart_experience->overnight_inbound;
                                        $overnight_outbound = $cart_experience->overnight_outbound;
                                        $start_date = date('Y-m-d',strtotime($ship_data['date_from_org']));
                                        $end_date = date('Y-m-d',strtotime($ship_data['date_to_org']));
                                        //Inbound
                                        if(!empty($overnight_inbound))
                                        {
                                            $overnight_inbound_start_date = date('Y-m-d', strtotime($start_date. ' - '.$overnight_inbound.' days'));
                                        }
                                        else
                                        {
                                            $overnight_inbound_start_date = $start_date;
                                        }
                                        if(!empty($crossing_inbound))
                                        {
                                            $crossing_inbound_start_date = date('Y-m-d', strtotime($overnight_inbound_start_date. ' - '.$overnight_inbound.' days'));
                                        }
                                        else
                                        {
                                            $crossing_inbound_start_date = $overnight_inbound_start_date;
                                        }
                                        //outbound
                                        if(!empty($overnight_outbound))
                                        {
                                            $overnight_outbound_end_date = date('Y-m-d', strtotime($end_date. ' + '.$overnight_outbound.' days'));
                                        }
                                        else
                                        {
                                            $overnight_outbound_end_date = $end_date;
                                        }
                                        if(!empty($crossing_outbound))
                                        {
                                            $crossing_outbound_end_date = date('Y-m-d', strtotime($overnight_outbound_end_date. ' + '.$overnight_outbound.' days'));
                                        }
                                        else
                                        {
                                            $crossing_outbound_end_date = $overnight_outbound_end_date;
                                        }
                                        ?>
                                        <p><b>Crossing inbound:</b> {{$cart_experience->crossing_inbound_data->route}}</p>
                                        <p><b>Date:</b> {{date("D d M",strtotime($crossing_inbound_start_date))}} - {{date("D d M 'y",strtotime($overnight_inbound_start_date))}}</p>
                                        <p><b>Crossing outbound:</b> {{$cart_experience->crossing_outbound_data->route}}</p>
                                        <p><b>Date:</b> {{date("D d M",strtotime($crossing_outbound_end_date))}} - {{date("D d M 'y",strtotime($overnight_outbound_end_date))}} </p>

                                    </div>
                                </div>


                            </div>
                            <div class="tc_box_wrapper">
                                <div class="tc_box">

                                    <div class="header">
                                        Overnight In
                                    </div>

                                    <div class="body">

                                        <p><b>Hotel:</b> TBC***</p>
                                        <p><b>Date:</b>  {{date("D d M",strtotime($overnight_inbound_start_date))}} - {{date("D d M 'y",strtotime($start_date))}} </p>

                                    </div>
                                </div>


                            </div>
                            <div class="tc_box_wrapper">
                                <div class="tc_box">

                                    <div class="header">
                                        Overnight Out
                                    </div>

                                    <div class="body">

                                        <p><b>Hotel:</b> TBC***</p>
                                        <p><b>Date:</b>{{date("D d M",strtotime($overnight_outbound_end_date))}} - {{date("D d M 'y",strtotime($end_date))}}</p>

                                    </div>
                                </div>


                            </div> */ ?>
                            <div class="tc_box_wrapper">
                                <div class="tc_box">

                                    <div class="header">
                                        Rates &amp; Allocation
                                    </div>

                                    <div class="body">

                                        <div class="rates_table">

                                            <div class="rt_row">

                                                  <div class="rt_column label">
                                                    Cabin Type
                                                </div>
                                                <div class="rt_column label">
                                                    No. Cabins
                                                </div>

                                                <div class="rt_column label">
                                                    Rate pp &#8364;
                                                </div>

                                                <div class="rt_column label">
                                                    SS pp &#8364;
                                                </div>
                                                 <div class="rt_column label">
                                                    SS After  &#8364; 
                                                </div>

                                            </div>
                                              @if(!empty($cabinDetail))
                                                @foreach($cabinDetail as $cabinval)
                                                 <div class="rt_row">                                               
                                                        <div class="rt_column bold">
                                                            {{$cabinval->name}} </div>
                                                        <div class="rt_column bold">
                                                            {{$cabinval->no_cabin}} </div>
                                                        <div class="rt_column bold">
                                                            {{sprintf('%0.2f',$cabinval->rate_euro)}} </div>
                                                        <div class="rt_column bold">
                                                            {{sprintf('%0.2f',$cabinval->ss_euro)}} </div>
                                                        <div class="rt_column bold">
                                                            {{sprintf('%0.2f',$cabinval->ss_after_euro)}} </div>
                                                    </div>
                                               
                                                @endforeach
                                            @endif
                                           
                                            <!-- <div class="">
                                                <p><b>Additional information</b></p>
                                                <p>SRS (single supplements)</p>
                                                <p>30% for intial two standards</p>
                                                <p>Further Standard Cabins Carry SRS of 45%</p>
                                                <p>junior suits carry SRS of 45%</p>
                                            </div> -->
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="tc_box_wrapper">
                                <div class="tc_box">

                                    <div class="header">
                                        Supplements
                                    </div>

                                    <div class="body">
                                        <?php 
                                        
                                        if(isset($experienceDate[0]->shipDates->shipDatesSupplements)){
                                            if(count($experienceDate[0]->shipDates->shipDatesSupplements) >= 1){
                                               
                                            foreach ($experienceDate[0]->shipDates->shipDatesSupplements as $key => $valField) { 
                                                 ?>
                                        <p>{{$valField->supplement_name}} ({{$valField->price_type}}): <b>&pound;{{$valField->in_price_euro}}</b></p>
                                         <?php
                                           
                                            
                                         } } } ?>
                                        

                                    </div>
                                </div>


                            </div>
                             <div class="tc_box_wrapper">
                                <div class="tc_box">

                                    <div class="header">
                                        Free Place
                                        <a href="javascript:;" id="freeEdit">Edit</a>
                                    </div>

                                    <div class="body">
                                        <textarea id="freeField" name="free_place" class="form-control" style="display: none;">{{ !empty($dates_rates->free_place)?$dates_rates->free_place:$dates_rates->free_place }}</textarea>
                                        <div id="freeContent">
                                            {!! !empty($dates_rates->free_place)?($dates_rates->free_place):($dates_rates->free_place) !!}
                                        </div>
                                       

                                    </div>

                                </div>
                            </div>
                            
                            
                            <div class="tc_box_wrapper">
                                <div class="tc_box">

                                    <div class="header">
                                        Import Itinerary

                                        
                                    </div>
                                    <div class="body">
                                       <?php /* <a href="javascript:;" exp_date_id="{{$experienceDate->id}}" exp_id="{{$experience->id}}"  id="HtlConfrmTemplate">Add  Hotel Confirmation Template </a> */?>
                                        <button type="button" class="btn btn-primary"id="HtlGetTemplate">Import Template </a>
                                        <div class="copy_itinerary" style="display:none;">
                                             @if ($experience->experiencesToItinerary->count() > 0)

                                            @foreach($experience->experiencesToItinerary as $dkey=>$day)
                                                <p><b>Day {{($dkey+1)}}</b></p>
                                                <p><b>Location:</b> {{ $day->name }}</p>
                                                <p><b>Arrival:</b> @if($day->arrival_time)<span>{{ date('g:i a',strtotime($day->arrival_time))}}</span> @endif </p>
                                                <p><b>Departure:</b>  @if($day->departure_time)<span>{{ date('g:i a',strtotime($day->departure_time)) }}</span> @endif</p>
                                                <p><b>Highlights:</b> 
                                                    <?php $inc_name = ''; ?>
                                                    @foreach($day->experiencesToItineraryHighlights as $in => $inclusion)
                                                            <?php $inc_name .= ($in == 0)?'':', '.$inclusion->name; ?>
                                                        @endforeach
                                                        {{$inc_name}}
                                                </p>
                                            @endforeach

                                        @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <div class="tc_box_wrapper">
                                <div class="tc_box">

                                    <div class="header">
                                        Itinerary
                                        <a href="javascript:;" id="itineraryEdit">Edit</a>
                                    </div>

                                    <div class="body">
                                        <textarea id="itineraryField" name="itinerary" class="form-control" style="display: none;">{{ !empty($dates_rates->itinerary)?$dates_rates->itinerary:$dates_rates->itinerary }}</textarea>
                                        <div id="itineraryContent">
                                            {!! !empty($dates_rates->itinerary)?($dates_rates->itinerary):($dates_rates->itinerary) !!}
                                        </div>
                                        
                                    </div>
                                </div>


                            </div>
                            <div class="tc_box_wrapper">
                                <div class="tc_box">

                                    <div class="header">
                                        Excursions
                                        <a href="javascript:;" id="excursionsEdit">Edit</a>
                                    </div>

                                    <div class="body">
                                        <textarea id="excursionsField" name="excursions" class="form-control" style="display: none;">{{ !empty($dates_rates->excursions)?$dates_rates->excursions:$dates_rates->excursions }}</textarea>
                                        <div id="excursionsContent">
                                            {!! !empty($dates_rates->excursions)?($dates_rates->excursions):($dates_rates->excursions) !!}
                                        </div>
                                        
                                    </div>
                                </div>


                            </div>
                            <div class="tc_box_wrapper">
                                <div class="tc_box">

                                    <div class="header">
                                        Meal Arrangements
                                        <a href="javascript:;" id="mealEdit">Edit</a>
                                    </div>

                                    <div class="body">
                                        <textarea id="mealField" name="meal_arrangements" class="form-control" style="display: none;">{{ !empty($dates_rates->meal_arrangements)?$dates_rates->meal_arrangements:$dates_rates->meal_arrangements }}</textarea>
                                        <div id="mealContent">
                                            {!! !empty($dates_rates->meal_arrangements)?($dates_rates->meal_arrangements):($dates_rates->meal_arrangements) !!}
                                            
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="tc_box_wrapper">
                                <div class="tc_box">

                                    <div class="header">
                                        On-board Facilities
                                        <a href="javascript:;" id="facilityEdit">Edit</a>
                                    </div>

                                    <div class="body">
                                        <?php 
                                        $cntHotal = 2;
                                        $notHotel = 0;
                                        $facility_html = '';
                                        if(isset($experiencesToHotelList)){ 
                                            if(count($experiencesToHotelList) > 0){
                                                foreach ($experiencesToHotelList as $keyHot => $valueHot) {
                                                    $hotelDetail = $valueHot->getHotelDetail;
                                                $ship_detail = 


DB::connection('mysql_veenus')->table('ships')->where('id', $hotelDetail->id)->first();
                                            $tour_amenities = $ship_detail->cabin_types;
                                             if(!empty($tour_amenities)){
                                                $tour_amenities = unserialize($tour_amenities);
                                                foreach ($tour_amenities as $key => $valueainity) { 
                                        $facility_html .= '<p>'.$valueainity.'</p>';
                                        } } }
                                        } }?>
                                        <textarea id="facilityField" name="facility" class="form-control" style="display: none;">{{ !empty($dates_rates->facility)?$dates_rates->facility:$facility_html }}</textarea>
                                        <div id="facilityContent">
                                           {!! !empty($dates_rates->facility)?($dates_rates->facility):($facility_html) !!}
                                        </div>
                                        
                                    </div>

                                </div>
                            </div>
                            <div class="tc_box_wrapper">
                                <div class="tc_box">

                                    <div class="header">
                                        Entertainment
                                        <a href="javascript:;" id="sfEdit">Edit</a>
                                    </div>

                                    <div class="body">
                                        <textarea id="sfField" name="entertainments" class="form-control" rows="7" style="display: none;">{{ !empty($dates_rates->entertainments)?nl2br($dates_rates->entertainments):'' }}</textarea>
                                        <div id="sfContent">
                                            {!! !empty($dates_rates->entertainments)?$dates_rates->entertainments:'' !!}
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="tc_box_wrapper">
                                <div class="tc_box">

                                    <div class="header">
                                        Terms and Conditions
                                        <a href="javascript:;" id="tncEdit">Edit</a>
                                    </div>

                                    <div class="body">
                                        <textarea id="tncField" name="terms_conditions" class="form-control" rows="7" style="display: none;">{{ !empty($dates_rates->terms_conditions)?$dates_rates->terms_conditions:$dates_rates->terms_conditions }}</textarea>
                                        <div class="tc_section" id="tcContent">
                                            {!! !empty($dates_rates->terms_conditions)?$dates_rates->terms_conditions:$dates_rates->terms_conditions !!}
                                        </div>
                                        

                                    </div>

                                </div>
                            </div>
                </div>
                
                <div class="signatures">
                    <?php if(isset($dates_rates->sign_name_etc) && !empty($dates_rates->sign_name_etc)){ ?>
                        <div class="signature_column">

                            <div class="heading">
                                <?php echo $dates_rates->sign_name_etc; ?>
                            </div>

                            <p>
                                <?php echo $dates_rates->sign_name_etc; ?><br>
                                <?php 
                                $signature_list = App\Models\Cms\SignatureName::orderBy('id','DESC')->where('name',$dates_rates->sign_name_etc)->first();
                                if(!empty($signature_list->description))
                                {
                                    echo $signature_list->description;
                                }
                                /*if($dates_rates->sign_name_etc == 'Grace Selby'){
                                    echo 'Experience Cooridnator';
                                }elseif($dates_rates->sign_name_etc == 'Ranjiv Bhalla'){
                                    echo 'Director';
                                }elseif($dates_rates->sign_name_etc == 'Gurpreet Kalsi'){
                                    echo 'Senior Experience Designer';
                                }*/
                                ?>
                                
                            </p>

                        </div>
                    <?php }else{ ?>
                        <div class="signature_column with_box">

                            <div class="heading">
                                Signature
                            </div>

                            <select name="sign_name_etc" id="sign_name" class="form-control text_change" required="">
                                <option value="">--</option>
                                <?php if(!empty($signature_list)) {
                                    foreach($signature_list as $srow)
                                    {
                                        $status = $srow->status;
                                        if($status == 1){
                                        ?>
                                        <option value="{{$srow->name}}">{{$srow->name}}</option>
                                        <?php
                                        }
                                    }
                                }?>
                                
                                <!-- <option value="Ranjiv Bhalla">Ranjiv Bhalla</option>
                                <option value="Gurpreet Kalsi">Gurpreet Kalsi</option> -->
                            </select>

                        </div>
                    <?php } ?>

                </div>

                <div class="ctas">
                    <input type="hidden" name="exp_id" value="{{$experience->id}}">
                    <input type="hidden" name="exp_date_rate_id" value="{{$dates_rates->id}}">
                    <input type="hidden" value="" name="is_changed" id="is_changed">
                    @if(empty($is_hotel_assieged))
                    <a href="javascript:;" class="cta" id="saveEtcForm" style="width: auto;">
                        Save for later
                    </a>
                    @endif
                    @if($dates_rates->mark_as_completed_etc != 1)
                    <a href="javascript:;" class="cta <?=!empty($is_hotel_assieged)?'booked_hotel':''?>" id="markAsCompletedCBC" style="width: auto;" data-id="{{$dates_rates->id}}">
                        Mark as Completed
                    </a>
                    @else
                    @if(empty($is_hotel_assieged))
                    <a href="javascript:;" class="cta <?=!empty($is_hotel_assieged)?'booked_hotel':''?>" id="unmarkAsCompletedCBC" style="width: auto;background: red;border-color: red;" data-id="{{$dates_rates->id}}">
                        Un-mark as complete
                    </a>
                    @endif
                   <!--  <a href="javascript:;" class="cta" id="downloadPDFetc" style="width: auto;" dates_rates_id="{{$dates_rates->id}}" exp_id="{{$experience->id}}">
                        Download
                    </a> -->
                    <?php if(!empty($dates_rates->pdf_file_name)){ ?> 
                     
                    <a target="_bl" href="{{asset('public/pdf/'.$dates_rates->pdf_file_name)}}" class="cta ">download</a>
                    <?php } ?>
                    @endif
                </div>
                </form>
            </div>

        </div>
    </div>
</div>
<div id="tobeprinted" style="display:none;"></div>
<script type="text/javascript">
       $(document).on('click', '#tncEdit', function(){
            $('#tncField').show();
            $('#tcContent').hide();
        });
        $(document).on('click', '#facilityEdit', function(){
            $('#facilityField').show();
            $('#facilityContent').hide();
            CKEDITOR.replace('facilityField', {
                toolbar: [{
                    name: 'styles',
                    items: ['Styles']
                }, ]
            });
        });
        $(document).on('click', '#sfEdit', function(){
            $('#sfField').show();
            $('#sfContent').hide();
            CKEDITOR.replace('sfField', {
                toolbar: [{
                    name: 'styles',
                    items: ['Styles']
                }, ]
            });
        });
        $(document).on('click', '#inclusionsEdit', function(){
            $('#inclusionsField').show();
            $('#inclusionsContent').hide();
        });
         $(document).on('click', '#freeEdit', function(){
            $('#freeField').show();
            $('#freeContent').hide();
        });
        $(document).on('click', '#mealEdit', function(){
            $('#mealField').show();
            $('#mealContent').hide();
        });
         $(document).on('click', '#excursionsEdit', function(){
            $('#excursionsField').show();
            $('#excursionsContent').hide();
            CKEDITOR.replace('excursionsField', {
                toolbar: [{
                    name: 'styles',
                    items: ['Styles']
                }, ]
            });
        });
          $(document).on('click', '#itineraryEdit', function(){
            $('#itineraryField').show();
            $('#itineraryContent').hide();
            CKEDITOR.replace('itineraryField', {
                toolbar: [{
                    name: 'styles',
                    items: ['Styles']
                }, ]
            });
        });
          $(document).on('click', '#HtlGetTemplate', function() {
            $('#itineraryEdit').trigger('click');
           
            var html = $(".copy_itinerary").html();
           
            CKEDITOR.replace('itineraryField', {
                toolbar: [{
                    name: 'styles',
                    items: ['Styles']
                }, ]
            });
            CKEDITOR.instances['itineraryField'].setData(html);
        });
        $(document).on('click', '#tncEdit', function() {
            $('#tncField').show();
            $('#tcContent').hide();
            CKEDITOR.replace('tncField', {
                toolbar: [{
                    name: 'styles',
                    items: ['Styles']
                }, ]
            });
        });
        $(document).on('click', '#inclusionEdit', function() {
            $('#inclusionField').show();
            $('#inclusionContent').hide();
            CKEDITOR.replace('inclusionField', {
                toolbar: [{
                    name: 'styles',
                    items: ['Styles']
                }, ]
            });
        });
        $(document).on('click', '#sfEdit2', function() {
            $('#sfField2').show();
            $('#sfContent2').hide();
            CKEDITOR.replace('sfField2', {
                toolbar: [{
                    name: 'styles',
                    items: ['Styles']
                }, ]
            });
        });
        $(document).on('click', '#freeEdit', function() {
            $('#freeField').show();
            $('#freeContent').hide();
            CKEDITOR.replace('freeField', {
                toolbar: [{
                    name: 'styles',
                    items: ['Styles']
                }, ]
            });
        });
        $(document).on('click', '#ratesEdit', function() {
            $('#ratesallocationField').show();
            $('#ratesallocationContent').hide();
            CKEDITOR.replace('ratesallocationField', {
                toolbar: [{
                    name: 'styles',
                    items: ['Styles']
                }, ]
            });
        });

        $(document).on('click', '#mealEdit', function() {
            $('#mealField').show();
            $('#mealContent').hide();
            CKEDITOR.replace('mealField', {
                toolbar: [{
                    name: 'styles',
                    items: ['Styles']
                }, ]
            });
        });
    $(document).on('click', '#saveEtcForm', function(e) {
        e.preventDefault();
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        }
        var formData = $("#etcForm").serialize();
        $('.loader').show();    
        $.ajax({
            url: base_url+'/super-user/update-cbc-data',
            type: 'POST',
            data: {'formData':formData},
            success: function(data) {
                $('.loader').hide();  
                $('#etcModal').modal('hide');
                toastSuccess('Tour has been updated successfully.');
            },
            error: function(e) {
            }
        });   
    });
    $(document).on('click', '#downloadPDFetc', function(e) {
        e.preventDefault();
        var exp_id = $(this).attr('exp_id');
        var dates_rates_id = $(this).attr('dates_rates_id');
        $('.loader').show();    
        $.ajax({
            url: base_url+'/super-user/download-etc-pdf',
            type: 'POST',
            data: {'exp_id':exp_id,'dates_rates_id':dates_rates_id},
            success: function(data) {
                $('.loader').hide();  
                $('#tobeprinted').html(data.response); 
                w=window.open();
                w.document.write($('#tobeprinted').html());
                w.print();
                w.close(); 
            },
            error: function(e) {
            }
        });   
    });
   
    /*$('#etcModal').on('hidden.bs.modal', function (e) {
         e.preventDefault();
        var formData = $("#etcForm").serialize();
        $('.loader').show();    
        $.ajax({
            url: base_url+'/super-user/update-etc-data',
            type: 'POST',
            data: {'formData':formData},
            success: function(data) {
                $('.loader').hide();  
                $('#etcModal').modal('hide');
                toastSuccess('Tour has been updated successfully.');
            },
            error: function(e) {
            }
        });     
    });*/
</script>