
    <style type="text/css">
        .no-boder {
            border: unset !important;
        }
        .tc_box .body .rates_table .rt_row .rt_column.label {
                justify-content: flex-start !important;
                font-weight: 600;
            }
    </style>
    
    <div class="notIndexContainer" style="padding-top: 0px;">
        <div class="tour_confirmation_wrapper" style="padding: 0;">
            <div class="tour_confirmation">

                <div class="logo">
                    <img src="https://tours-system-com.stackstaging.com/images/logo2x.png" alt="Veenus">
                </div>
                <div class="tc_intro">
                    <div class="heading">CRUISE BOOKING CONFIRMATION</div>
                    <div class="location"><?php echo $experience->name; ?></div>
                    <div class="date">{{ $ship_data['date_from'] }} - {{ $ship_data['date_to'] }} ( {{ $ship_data['nights'] }} nights)</div>
                    <div class="hotel">{{ $ship_data['hotel_name'] }}</div>
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
                                            RB-1691757286-136
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
                                            {{ $ship_data['date_from'] }} - {{ $ship_data['date_to'] }}
                                        </p>

                                    </div>

                                </div>

                                <div class="tc_box">

                                    <div class="header">
                                       Nights
                                    </div>

                                    <div class="body">

                                        <p>
                                            {{ $ship_data['nights'] }} nights
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
                                        <p><b>Ship: </b> {{ $ship_data['hotel_name'] }}</p>
                                        <p><b>Cruise date: </b>{{ $ship_data['date_from'] }} - {{ $ship_data['date_to'] }} </p>
                                        <p><b>River: </b>{{$river_name}} </p>
                                        <p><b>Route: </b><?php $r1 = 0; $count = count($experience->getExperiencesToRoutes); ?>
                                        @foreach ($experience->getExperiencesToRoutes as $routev){{ $routev->name }} 
                                        <span style="color:#14213D;">{{(($r1+1)<$count)?'>':''}}</span>
                                        <?php $r1++; ?>
                                        @endforeach</p>
                                        <p><b>Embarkation:</b>{{!empty($experienceDate[0]->shipDates->embarkation)?$experienceDate[0]->shipDates->embarkation:''}}</p>
                                        <p><b>Disembarkation:</b>{{!empty($experienceDate[0]->shipDates->disembarkation)?$experienceDate[0]->shipDates->disembarkation:''}} </p>

                                    </div>
                                </div>


                            </div>
                            <div class="tc_box_wrapper">
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


                            </div>
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
                                                    Overnight SS 
                                                </div>
                                                <div class="rt_column label">
                                                    Crossing Route SS
                                                </div>
                                                 <div class="rt_column label">
                                                    SS After  &#8364; 
                                                </div>
                                                <div class="rt_column label">
                                                    Overnight SS After 
                                                </div>
                                                <div class="rt_column label">
                                                    Crossing Route SS After 
                                                </div>

                                            </div>
                                            <?php $total_crossing_route_ss = 0;$crossing_route_ss = 0;$overnight_ss_after = 0;$crossing_route_ss_after = 0; ?>
                                              @if(!empty($cabinDetail))
                                                @foreach($cabinDetail as $cabinval)
                                                <?php
                                                $total_crossing_route_ss += $cabinval->overnight_ss;
                                                $crossing_route_ss += $cabinval->crossing_route_ss;
                                                $overnight_ss_after += $cabinval->overnight_ss_after;
                                                $crossing_route_ss_after += $cabinval->crossing_route_ss_after;
                                                ?>
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
                                                            {{sprintf('%0.2f',$cabinval->overnight_ss)}} </div>
                                                        <div class="rt_column bold">
                                                            {{sprintf('%0.2f',$cabinval->crossing_route_ss)}} </div>
                                                        <div class="rt_column bold">
                                                            {{sprintf('%0.2f',$cabinval->ss_after_euro)}} </div>
                                                        <div class="rt_column bold">
                                                            {{sprintf('%0.2f',$cabinval->overnight_ss_after)}} </div>
                                                        <div class="rt_column bold">
                                                            {{sprintf('%0.2f',$cabinval->crossing_route_ss_after)}} </div>
                                                    </div>
                                               
                                                @endforeach
                                                <div class="rt_row">                                               
                                                        <div class="rt_column label" style="justify-content:center;padding: 0 25px;">
                                                            Total</div>
                                                        <div class="rt_column label" style="justify-content:center;padding: 0 25px;">
                                                            &nbsp;</div>
                                                        <div class="rt_column label" style="justify-content:center;padding: 0 25px;">
                                                            &nbsp;</div>
                                                        <div class="rt_column label" style="justify-content:center;padding: 0 25px;">
                                                            &nbsp; </div>
                                                        <div class="rt_column label" style="justify-content:center;padding: 0 25px;">
                                                            {{sprintf('%0.2f',$total_crossing_route_ss)}} </div>
                                                        <div class="rt_column label" style="justify-content:center;padding: 0 25px;">
                                                            {{sprintf('%0.2f',$crossing_route_ss)}} </div>
                                                        <div class="rt_column label" style="justify-content:center;padding: 0 25px;">
                                                            &nbsp;</div>
                                                        <div class="rt_column label" style="justify-content:center;padding: 0 25px;">
                                                            {{sprintf('%0.2f',$overnight_ss_after)}} </div>
                                                        <div class="rt_column label" style="justify-content:center;padding: 0 25px;">
                                                            {{sprintf('%0.2f',$crossing_route_ss_after)}} </div>
                                                    </div>
                                            @endif
                                           
                                            <div class="">
                                            <!-- <p><b>Additional information</b></p>
                                            <p>SRS (single supplements)</p>
                                            <p>30% for intial two standards</p>
                                            <p>Further Standard Cabins Carry SRS of 45%</p>
                                            <p>junior suits carry SRS of 45%</p> -->
                                           
                                            <div class="tc_box">

                                                <div class="header">
                                                    Addtional information
                                                    <a href="javascript:;" id="important_informationEdit">Edit</a>
                                                </div>

                                                <div class="body">
                                                    <textarea id="important_informationField" name="tds_important_information" class="form-control" style="display: none;">{{ !empty($cart_experience->tds_important_information)?$cart_experience->tds_important_information:$cart_experience->tds_important_information }}</textarea>
                                                    <div id="important_informationContent">
                                                        {!! !empty($cart_experience->tds_important_information)?($cart_experience->tds_important_information):($cart_experience->tds_important_information) !!}
                                                    </div>
                                                   

                                                </div>

                                            </div>
                                        </div>
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
                                        <textarea id="freeField" name="free_place" class="form-control" style="display: none;">{{ !empty($cart_experience->free_place)?$cart_experience->free_place:$cart_experience->free_place }}</textarea>
                                        <div id="freeContent">
                                            {!! !empty($cart_experience->free_place)?($cart_experience->free_place):($cart_experience->free_place) !!}
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
                                        <textarea id="itineraryField" name="itinerary" class="form-control" style="display: none;">{{ !empty($cart_experience->itinerary)?$cart_experience->itinerary:$cart_experience->itinerary }}</textarea>
                                        <div id="itineraryContent">
                                            {!! !empty($cart_experience->itinerary)?($cart_experience->itinerary):($cart_experience->itinerary) !!}
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
                                        <textarea id="excursionsField" name="excursions" class="form-control" style="display: none;">{{ !empty($cart_experience->excursions)?$cart_experience->excursions:$cart_experience->excursions }}</textarea>
                                        <div id="excursionsContent">
                                            {!! !empty($cart_experience->excursions)?($cart_experience->excursions):($cart_experience->excursions) !!}
                                        </div>
                                        
                                    </div>
                                </div>


                            </div>
                            <!-- <div class="tc_box_wrapper">
                                <div class="tc_box">

                                    <div class="header">
                                        Itinerary and Excursions
                                        <a href="javascript:;" id="itineraryEdit">Edit</a>
                                    </div>

                                    <div class="body">
                                        <textarea id="freeField" name="free_place" class="form-control" style="display: none;">{{ !empty($cart_experience->free_place)?$cart_experience->free_place:$cart_experience->free_place }}</textarea>
                                        <div id="freeContent">
                                            {!! !empty($cart_experience->free_place)?($cart_experience->free_place):($cart_experience->free_place) !!}
                                        </div>
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


                            </div> -->
                            <div class="tc_box_wrapper">
                                <div class="tc_box">

                                    <div class="header">
                                        Meal Arrangements
                                        <a href="javascript:;" id="mealEdit">Edit</a>
                                    </div>

                                    <div class="body">
                                        <textarea id="mealField" name="meal_arrangements" class="form-control" style="display: none;">{{ !empty($cart_experience->meal_arrangements)?$cart_experience->meal_arrangements:$cart_experience->meal_arrangements }}</textarea>
                                        <div id="mealContent">
                                            {!! !empty($cart_experience->meal_arrangements)?($cart_experience->meal_arrangements):($cart_experience->meal_arrangements) !!}
                                            
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
                                        <textarea id="facilityField" name="meal_arrangements" class="form-control" style="display: none;"><?php 
                                        $cntHotal = 2;
                                        $notHotel = 0;
                                        if(isset($experiencesToHotelList)){ 
                                            if(count($experiencesToHotelList) > 0){
                                                foreach ($experiencesToHotelList as $keyHot => $valueHot) {
                                                    $hotelDetail = $valueHot->getHotelDetail;
                                                $ship_detail = 


DB::connection('mysql_veenus')->table('ships')->where('id', $hotelDetail->id)->first();
                                            $tour_amenities = $ship_detail->cabin_types;
                                             if(!empty($tour_amenities)){
                                                $tour_amenities = unserialize($tour_amenities);
                                                foreach ($tour_amenities as $key => $valueainity) { ?>
                                        <p>{{ $valueainity }}</p>
                                        <?php } } }
                                        } }?></textarea>
                                        <div id="facilityContent">
                                           <?php 
                                        $cntHotal = 2;
                                        $notHotel = 0;
                                        if(isset($experiencesToHotelList)){ 
                                            if(count($experiencesToHotelList) > 0){
                                                foreach ($experiencesToHotelList as $keyHot => $valueHot) {
                                                    $hotelDetail = $valueHot->getHotelDetail;
                                                $ship_detail = 


DB::connection('mysql_veenus')->table('ships')->where('id', $hotelDetail->id)->first();
                                            $tour_amenities = $ship_detail->cabin_types;
                                             if(!empty($tour_amenities)){
                                                $tour_amenities = unserialize($tour_amenities);
                                                foreach ($tour_amenities as $key => $valueainity) { ?>
                                        <p>{{ $valueainity }}</p>
                                        <?php } } }
                                        } }?>
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
                                        <textarea id="sfField" name="entertainments" class="form-control" rows="7" style="display: none;">{{ !empty($cart_experience->entertainments)?nl2br($cart_experience->entertainments):'' }}</textarea>
                                        <div id="sfContent">
                                            {!! !empty($cart_experience->entertainments)?$cart_experience->entertainments:'' !!}
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
                                        <textarea id="tncField" name="terms_conditions" class="form-control" rows="7" style="display: none;">{{ !empty($cart_experience->terms_conditions)?$cart_experience->terms_conditions:$cart_experience->terms_conditions }}</textarea>
                                        <div class="tc_section" id="tcContent">
                                            {!! !empty($cart_experience->terms_conditions)?$cart_experience->terms_conditions:$cart_experience->terms_conditions !!}
                                        </div>
                                        

                                    </div>

                                </div>
                            </div>
                            

                        </div>
                       <input type="hidden" name="exp_id" value="{{$experience->id}}">
                    <input type="hidden" name="exp_date_rate_id" value="{{$dates_rates->id}}">
                    <input type="hidden" name="cart_experiences_id" id="cart_experiences_id" value="{{$cart_exp_id}}">
                    </form>
                    <form method="POST" action="{{ route('process-tour-steps-new-cruise') }}" class="step1FormCls">
                    {{ csrf_field() }}
                    <?php 
                    $checked = '';
                    $disable = '';
                   //$style = 'style="display: none;"';
                    $style = 'style="visibility: hidden;"';
                    if(!empty($cartExeToTour->sign_name)){
                        $disable = 'pointer-events:none;';
                        $checked = 'checked';
                        $style = 'style="visibility: visible;"';
                    } ?>
                    <?php if (Auth::check() && Auth::user()->hasRole('Collaborator')) { //added by Niral 27-10 ?>
                        <div class="form-group" style="margin-top: 50px;"><input id="chkTerm" type="checkbox" name="" required="" class="form-control" style="float: left;width: 45px;margin-right: 15px;<?php echo $disable; ?>" <?php echo $checked; ?>> I <?php echo Auth::user()->first_name.' '.Auth::user()->last_name; ?> agree that the booking details are correct and are subject to the <a target="_blank" href="/terms">terms and conditions</a>.</div>
                    <?php  } ?>
                    <div class="signatures" style="margin-top: 50px;">
                       
                        <div class="signature_column with_box showHideDiv" <?php echo $style; ?>>
                            
                            <div class="heading">
                                <?php echo $cart_detail->first_name.' '.$cart_detail->last_name; ?>
                                <?php //echo Auth::user()->name; ?>
                            </div>
                            <p id="signDiv" >
                               <?php echo !empty($cartExeToTour->sign_name) ? $cartExeToTour->sign_name : Auth::user()->name; ?>
                               <?php
                                       if(!empty($cartExeToTour->completed_at))
                                           {
                                            $date = date('d/m/Y',strtotime($cartExeToTour->completed_at));
                                                echo '<p>'.$date.'</p>';
                                           }else{
                                             if(!empty($hc_sign_date))
                                               {
                                                $date = date('d/m/Y',strtotime($hc_sign_date));
                                                    echo '<p>'.$date.'</p>';
                                               }
                                           }
                                    ?>
                            </p>
                             <?php if (Auth::check() && Auth::user()->hasRole('Collaborator')) { //added by Niral 27-10 ?>
                            <?php if(empty($cartExeToTour->sign_name)){ ?>
                                <div class="signature_box" style="padding: 0;border: 0;">

                                    <input type="hidden" name="tour_statuses_id" value="1">
                                    <input type="hidden" name="cart_experiences_id" value="{{$cart_exp_id}}">
                                    <input type="hidden" value="<?php echo !empty($cartExeToTour->sign_name) ? $cartExeToTour->sign_name : Auth::user()->name; ?>" name="sign_name">
                                    
                                    <button type="submit" id="submitDoc" style="margin: 0; transition:none;">
                                        Sign Document
                                    </button>
                                        
                                </div>
                            <?php  } ?>
                              <?php  } ?>
                        </div>
                      
                        <?php if(isset($dates_rates->sign_name_etc) && !empty($dates_rates->sign_name_etc)){ ?>
                            <div class="signature_column">

                                <div class="heading">
                                    <?php echo $dates_rates->sign_name_etc; ?>
                                </div>

                                <p>
                                    <?php echo $dates_rates->sign_name_etc; ?><br>
                                    <?php if($dates_rates->sign_name_etc == 'Grace Selby'){
                                        echo 'Experience Cooridnator';
                                    }elseif($dates_rates->sign_name_etc == 'Ranjiv Bhalla'){
                                        echo 'Director';
                                    }elseif($dates_rates->sign_name_etc == 'Gurpreet Kalsi'){
                                        echo 'Senior Experience Designer';
                                    }
                                    ?>
                                    
                                </p>
                               
                                 <?php
                                    
                                       if(!empty($hc_sign_date))
                                           { 
                                            $date = date('d/m/Y',strtotime($hc_sign_date));
                                                echo '<p>'.$date.'</p>';
                                           }
                                    ?>
                                <!-- <p>{{date('d/m/Y')}}</p> -->
                            </div>
                        <?php } ?>

                    </div>
                    <br/>

                    <?php if (Auth::check() && Auth::user()->hasRole('Super Admin')) { //added by Niral 27-10 ?>
                     <?php if(isset($cartExeToTour->sign_name) && !empty($cartExeToTour->sign_name)){ ?>
                        <?php if($datatab != 'collaborator' ){ ?>
                    <a onclick="return confirm('Are you sure you want to unsigned tour?')" class="cta btn btn-primary" href='{{asset("/reset-tour/$cart_exp_id")}}' class="orangeLink">
                      Un-sign document
                    </a>
                    <a data-assigned-id="{{$cart_exp_id}}" style="" data-toggle="modal" data-target="#amendmentsModalLong"  data-backdrop="static" data-keyboard="false" class="open-amend cta btn btn-primary" tabindex="-1">  
                  Save & Add Amendment</a>
                  <input type="button" value="Cancel All Changes" data-dismiss="modal" aria-label="Close" class="btn btn-danger">
                   <?php } else { ?> 
                     <?php if(!empty($cart_experience->signed_document)) { ?>
                                                             <a target="_bl" href="{{asset('public/pdf/'.$cart_experience->signed_document)}}" class="btn btn-primary ">Download</a>
                                                         <?php } else { ?> 
                                                       <!--  <a href="javascript:;" class="cta downloadPDF">download</a> -->
                                                        <?php } ?>

                    <?php } ?>
                    <?php if(empty($popup)){ ?> 
                     <a onclick="return confirm('Are you sure?')" class="cta btn btn-primary" href='{{asset("/gererate_document/$cart_exp_id")}}' style="float: right;" class="orangeLink">
                     Update ETC Document
                    </a>
                    <?php } ?>
                    <?php } } ?>
                    <input type="button" value="Back" data-dismiss="modal" aria-label="Close" class="btn btn-danger">

                     <?php if($datatab != 'collaborator' && empty($cartExeToTour->sign_name)){ ?>
                        <a href="javascript:;" class="cta btn btn-primary" id="saveEtcForm" style="width: auto;">
                            Save 
                        </a>

                        <!-- <a data-fancybox data-type="ajax" data-src="" href="{{ route('add-amend-doc', $cart_exp_id) }}" class="cta btn btn-warning">
                                Add Amendments
                            </a> -->
                        <!-- <a data-assigned-id="{{$cart_exp_id}}" style="" data-toggle="modal" data-target="#amendmentsModalLong"  data-backdrop="static" data-keyboard="false" class="open-amend cta btn btn-primary" tabindex="-1">  
                  Save & Add Amendment </a>
                   <input type="button" value="Cancel All Changes" data-dismiss="modal" aria-label="Close" class="btn btn-danger"> -->
                    <?php } ?>


                    </form>
                </div>

            </div>
        </div>
    </div>
    <style type="text/css">
        .marker {
            background: yellow;
        }
        .body ul {
        list-style: none; 
        padding-left: 20px;
        }
        .body ul li:before {
            content: "\2022";
            color: #000; 
            font-weight: bold; 
            display: inline-block;
            width: 1em;
            margin-left: -1em;
        }
        .mr-left{
            margin-left: 12%;   
        }
    </style>
    <script type="text/javascript">
       
        $('header').remove();
        $(document).on('click', '#tncEdit', function(){
            $('#tncField').show();
            $('#tcContent').hide();
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
         $(document).on('click', '#itineraryEdit', function(){
            $('#itineraryField').show();
            $('#itineraryContent').hide();
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
         $(document).on('click', '#important_informationEdit', function(){
            $('#important_informationField').show();
            $('#important_informationContent').hide();
        });
         
        $(document).on('click', '#mealEdit', function(){
            $('#mealField').show();
            $('#mealContent').hide();
        });
        $(document).on('click', '#facilityEdit', function(){
            $('#facilityField').show();
            $('#facilityContent').hide();
        });
        
        $(document).on('click', '#HtlGetTemplate', function() {
            $('#itineraryEdit').trigger('click');
           
            var html = $(".copy_itinerary").html();
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
        $(document).on('click', '#itineraryEdit', function() {
            $('#itineraryField').show();
            $('#itineraryContent').hide();
            CKEDITOR.replace('itineraryField', {
                toolbar: [{
                    name: 'styles',
                    items: ['Styles']
                }, ]
            });
        });
        
        $(document).on('click', '#important_informationEdit', function() {
            $('#important_informationField').show();
            $('#important_informationContent').hide();
            CKEDITOR.replace('important_informationField', {
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
            var cart_id = $('#cart_experiences_id').val();
            var formData = $("#etcForm").serialize();
            $('.loader').show();
            $.ajax({
                url: base_url + '/update-cbc-data-collab',
                type: 'POST',
                data: {
                    'formData': formData
                },
                success: function(data) {
                    $('.loader').hide();
                    $('#Room requestDatesModal').modal('hide');
                    $('#amendmentsModalLong').modal('hide');
                    /* alert(data);
                     ('.tab1 #tab_id_'+cart_id).html('');
                         $('.tab1 #tab_id_'+cart_id).html(data);*/
                    /*parent.jQuery.fancybox.close();
                    parent.parent.jQuery.fancybox.close();*/
                    toastSuccess('Tour has been updated successfully.');
                   window.location.reload();
                },
                error: function(e) {}
            });
        });
        $(function() {
            $('.open-amend').click(function() {
                //$('#hotelDatesModal').modal('hide');
                var id = $(this).data('assigned-id');
                var route = "/add-amend-doc/" + id;
                $('.amend-content').load(route);
            });

        });
    </script>
