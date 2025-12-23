<?php
    $cartExeToTour = '';
        if (Auth::check() && Auth::user()->hasRole("Collaborator")){$datatab = 'collaborator'; }else{$datatab = 'superuser';}
       
    
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
    $pattern = "/<p[^>]*><\\/p[^>]*>/";
?>
    <div class="notIndexContainer" style="padding-top: 0px;">
        <div class="tour_confirmation_wrapper" style="padding: 0;">
            <div class="tour_confirmation with_bg">

                <div class="reference">
                </div>

                <div class="tc_intro">
                    <div class="heading">CRUISE PACK</div>
                    <div class="location"><?php echo $cart_experience->experience_name; ?></div>
                    <div class="date">{{ date("D d M", strtotime($cart_experience->date_from)) }} - {{ date("D d M 'y", strtotime($cart_experience->date_to)) }} ( {{ $cart_experience->nights }} @if($cart_experience->nights > 1) nights @else night @endif )</div>
                    <div class="hotel">{{ $cart_experience->hotel_name }}</div>
                </div>

                <div class="tc_content_wrapper">
                    <div class="tc_content">
                        <form method="post" id="tpForm">
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
                                <div class="tc_box_wrapper">
                                    <div class="tc_box">

                                        <div class="header">
                                            No. of Guests
                                            <?php if($datatab != 'collaborator' && empty($cartExeToTour)){ ?>
                                            <!-- <a href="javascript:;"  id="atEdit">Edit</a> -->
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
                                           
                                      

                                       

                                            <!-- <textarea id="atField" name="addtional_text" class="form-control" style="display: none;">{{ isset($cart_experience->addtional_text) ? preg_replace($pattern, '', ($cart_experience->addtional_text)) : '' }} </textarea>
                                            <div id="atContent">
                                                {!! isset($cart_experience->addtional_text) ? $cart_experience->addtional_text : '' !!}

                                            </div> -->

                                      
                                            <!-- <p>Please refer to the latest guest list for 13.11.2023 specific room break down and all requests.</p> -->
                                        </div>
                                        
                                    </div>
                                </div>
                            
                                 <?php
                                if(!empty($experienceDates)){
                                    foreach ($experienceDates as $key => $value) {

                                        $hotel =  


DB::connection('mysql_veenus')->table('ship_dates')->select('h.id','h.name')->leftjoin('ships as h','h.id','=','ship_dates.ship_id')->where('ship_dates.id', $value->hotel_date_id)->first();
                                        


                                ?>
                                <div class="row">
                                    <div class="col-md-12 text-center mb-2">
                                        <h5 style="color: #14213D;"><strong><?php echo (!empty($hotel) ? $hotel->name : ''); ?></strong> </h5>
                                        <label>{{ date("D d M", strtotime($value->date_from)) }} - {{ date("D d M 'y", strtotime($value->date_to)) }} ( {{ $value->nights }} @if($value->nights > 1) nights @else night @endif )</label>
                                    </div>
                                </div>
                                <div class="tc_box_wrapper">
                                    <div class="tc_box">

                                        <div class="header">
                                            Ship Details
                                            
                                        </div>

                                        
                                       
                                        <div class="body">

                                            <ul>
                                                <li>Ship Name: <strong><?php echo (!empty($hotel) ? $hotel->name : ''); ?></strong></li>
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
                                                
                                                 
                                            </ul>
                                         
                                        </div>
                                        
                                        

                                    </div>
                                </div>
                               <?php $cartExperienceTP = App\Models\Cms\CartExpericenceCP::where("cart_exp_id", $cartid)->where("exp_date_id", $value->id)->first(); ?>
                               <?php if(!empty($cartExperienceTP->cp_eta)){ ?> 
                                <div class="tc_box_wrapper">
                                    <div class="tc_box">

                                        <div class="header">
                                            Arrival
                                            <?php if($datatab != 'collaborator'  && empty($cartExeToTour)){ ?>
                                            <a href="javascript:;"  id="etaEdit{{$value->id}}">Edit</a>
                                        <?php } ?>
                                        </div>

                                        <div class="body">

                                            <textarea id="etaField{{$value->id}}" name="eta{{$value->id}}" class="form-control" style="display: none;">{{ isset($cartExperienceTP->cp_eta) ? preg_replace($pattern, '', ($cartExperienceTP->cp_eta)) : '' }} </textarea>
                                            <div id="etaContent{{$value->id}}">
                                                {!! isset($cartExperienceTP->cp_eta) ? $cartExperienceTP->cp_eta : '' !!}

                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <?php } ?>
                               <?php if(!empty($cartExperienceTP->cp_etd)){ ?> 
                                <div class="tc_box_wrapper">
                                    <div class="tc_box">

                                        <div class="header">
                                            Departure
                                            <?php if($datatab != 'collaborator' && empty($cartExeToTour)){ ?>
                                            <a href="javascript:;" id="etdEdit{{$value->id}}">Edit</a>
                                        <?php } ?>
                                        </div>

                                        <div class="body">

                                            <textarea id="etdField{{$value->id}}" name="etd{{$value->id}}" class="form-control" style="display: none;">{{ isset($cartExperienceTP->cp_etd) ? preg_replace($pattern, '', ($cartExperienceTP->cp_etd)) : '' }}</textarea>
                                                <div id="etdContent{{$value->id}}">
                                                    {!! isset($cartExperienceTP->cp_etd) ? $cartExperienceTP->cp_etd : '' !!}
                                                </div>

                                        </div>

                                    </div>
                                </div>
                                <?php } ?>
                                <?php if(!empty($cartExperienceTP->cp_mean_arrangements)){ ?> 
                                <div class="tc_box_wrapper">
                                        <div class="tc_box">

                                            <div class="header">
                                                Meal Arrangements
                                                <a href="javascript:;" id="mean_arrangementsEdit{{$value->id}}">Edit</a>
                                            </div>

                                            <div class="body">
                                                <textarea id="mean_arrangementsField{{$value->id}}" name="tds_mean_arrangements{{$value->id}}" class="form-control" style="display: none;">{{ isset($cartExperienceTP->cp_mean_arrangements) ? preg_replace($pattern, '', ($cartExperienceTP->cp_mean_arrangements)) : '' }}</textarea>
                                                <div id="mean_arrangementsContent{{$value->id}}">
                                                     {!! isset($cartExperienceTP->cp_mean_arrangements) ? $cartExperienceTP->cp_mean_arrangements : '' !!}
                                                    
                                                </div>
                                                
                                            </div>

                                        </div>
                                </div>
                                <?php } ?>
                                 <?php if(!empty($cartExperienceTP->cp_tour_inclusions)){  ?> 
                                <div class="tc_box_wrapper">
                                    <div class="tc_box">

                                        <div class="header">
                                            Inclusions
                                            <?php if($datatab != 'collaborator' && empty($cartExeToTour)){ ?>
                                            <a href="javascript:;" id="inclusionEdit{{$value->id}}">Edit</a>
                                        <?php } ?>
                                        </div>

                                        <div class="body">

                                            <textarea id="inclusionField{{$value->id}}" name="tour_inclusions{{$value->id}}" class="form-control" style="display: none;">{{ isset($cartExperienceTP->cp_tour_inclusions) ? preg_replace($pattern, '', ($cartExperienceTP->cp_tour_inclusions)) : '' }}</textarea>
                                            <div id="inclusionContent{{$value->id}}">
                                                {!! isset($cartExperienceTP->cp_tour_inclusions) ? ($cartExperienceTP->cp_tour_inclusions) : '' !!}
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <?php } ?>
                                 <?php if(!empty($cartExperienceTP->cp_services_facilities)){ ?> 
                                <div class="tc_box_wrapper">
                                    <div class="tc_box">

                                        <div class="header">
                                            Service and facilities
                                            <?php if($datatab != 'collaborator' && empty($cartExeToTour)){ ?>
                                            <a href="javascript:;" id="servicesEdit{{$value->id}}">Edit</a>
                                        <?php } ?>
                                        </div>

                                        <div class="body">

                                            <textarea id="servicesField{{$value->id}}" name="services_facilities{{$value->id}}" class="form-control" style="display: none;">{{ isset($cartExperienceTP->cp_services_facilities) ? preg_replace($pattern, '', ($cartExperienceTP->cp_services_facilities)) : '' }}</textarea>
                                            <div id="servicesContent{{$value->id}}">
                                                {!! isset($cartExperienceTP->cp_services_facilities) ? ($cartExperienceTP->cp_services_facilities) : '' !!}
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <?php } ?>
                               <?php if(!empty($cartExperienceTP->cp_house_keeping)){ ?> 
                                <div class="tc_box_wrapper">
                                    <div class="tc_box">

                                        <div class="header">
                                            Housekeeping
                                             <?php if($datatab != 'collaborator' && empty($cartExeToTour)){ ?>
                                            <a href="javascript:;" id="house_keepingEdit{{$value->id}}">Edit</a>
                                            <?php } ?>
                                        </div>

                                        <div class="body">
                                            <textarea id="house_keepingField{{$value->id}}" name="house_keeping{{$value->id}}" class="form-control" style="display: none;">{{ isset($cartExperienceTP->cp_house_keeping) ? preg_replace($pattern, '', ($cartExperienceTP->cp_house_keeping)) : '' }}</textarea>
                                            <div id="house_keepingContent{{$value->id}}">
                                                {!! isset($cartExperienceTP->cp_house_keeping) ? ($cartExperienceTP->cp_house_keeping) : '' !!}
                                            </div>
                                        
                                        </div>

                                    </div>
                                </div>
                                <?php } ?>
                              
                              
                               <?php if(!empty($cartExperienceTP->cp_important_information)){ ?> 
                                <div class="tc_box_wrapper">
                                    <div class="tc_box">

                                        <div class="header">
                                            Important Information
                                            <?php if($datatab != 'collaborator' && empty($cartExeToTour)){ ?>
                                            <a href="javascript:;" id="important_informationEdit{{$value->id}}">Edit</a>
                                            <?php } ?>
                                        </div>

                                        <div class="body">
                                            <textarea id="important_informationField{{$value->id}}" name="important_information{{$value->id}}" class="form-control" style="display: none;">{{ isset($cartExperienceTP->cp_important_information) ? preg_replace($pattern, '', ($cartExperienceTP->cp_important_information)) : '' }}</textarea>
                                            <div id="important_informationContent{{$value->id}}">
                                                {!! isset($cartExperienceTP->cp_important_information) ? ($cartExperienceTP->cp_important_information) : '' !!}
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <?php } ?>
                            <?php
                                }
                                }
                                ?>
                                <div class="row">
                                    <div class="col-md-12 text-center mb-3">
                                        <h4 style="color: #14213D;"><strong>Experiences </h4>
                                       
                                    </div>
                                </div>
                                  <?php 
                        if(!empty($cart_experience->cartExperiencesToAttraction)){
                            $i = 1;
                            $addclss = 0;
                            $pendingclss = 0;
                            $totalexp = 0;
                            foreach ($cart_experience->cartExperiencesToAttraction as $key => $value) { 
                                $valueEE = 


DB::connection('mysql_veenus')->table('attractions')->where("id", $value->attractions_id)->first(); 
                                $totalexp++;
                                if(!empty($value->date) || !empty($value->group_name)){
                                    $addclss++;
                                 }
                                 else
                                 {
                                    $pendingclss++;
                                 }
                                   $old_attraction_data = 


DB::connection('mysql_veenus')->table('cart_experiences_to_attractions')->select('old_attractions_id','amendement_date','cart_exp_id','experiences_id')->where("cart_exp_id", $cart_experience->id)->where("experiences_id", $cart_experience->experiences_id)->where("attractions_id", $value->attractions_id)->first();
                                   
                                   $amendement_date = '';
                                   
                                   if(!empty($old_attraction_data->old_attractions_id))
                                   {
                                    $old_attraction = 


DB::connection('mysql_veenus')->table('attractions')->where("id", $old_attraction_data->old_attractions_id)->first();
                                    $amendement_date = !empty($old_attraction_data->amendement_date)?'(Amended on '.date('d/m/Y',strtotime($old_attraction_data->amendement_date)).')':'';
                                   }
                                if($valueEE->type_id == 1){
                                    $type = 'VIP';
                                }elseif($valueEE->type_id == 2){
                                    $type = 'Big Banner';                                
                                }else{
                                    $type = 'Local';                                
                                }
                                ?>
                                <div class="tc_box_wrapper">
                                    <div class="tc_box">

                                        <div class="header">
                                            Experience <?php echo $i.': '.$type; ?> <?=$amendement_date?>
                                            <!-- <a href="#">Edit</a> -->
                                        </div>

                                        <div class="body">
                                            
                                                
                                                    
                                            <ul>
                                                <li><span class="<?=!empty($old_attraction_data->old_attractions_id)?'new_exp1':''?>">Experience name: <strong><?php echo $valueEE->name; ?></strong></span></li>
                                               
                                               
                                                 <li><span class="<?=!empty($old_attraction_data->old_attractions_id)?'new_exp1':''?>">Contact: <strong>{{ $valueEE->main_contact_number }} - {{ $valueEE->contact_name }}</strong></span></li>
                                                  <li><span class="<?=!empty($old_attraction_data->old_attractions_id)?'new_exp1':''?>">Date: <strong>{{ 
                                                                (!empty($value->date) ? date('D, d M \'y',strtotime($value->date)) : (!empty($valueEE->date)?date('D, d M \'y',strtotime($valueEE->date)) :'')) }}</strong></span></li>
                                                   <li><span class="<?=!empty($old_attraction_data->old_attractions_id)?'new_exp1':''?>">Time: <strong>{{ (!empty($value->time) ? date('H:i',strtotime($value->time)) : (!empty($valueEE->time)?date('H:i',strtotime($valueEE->time)) :'00:00')) }} hrs</strong></span></li>
                                                    <?php 
                                                if(!empty($valueEE->inclusion_name)){
                                                    
                                                    ?>
                                                    <!-- <li><span class="<?=!empty($old_attraction_data->old_attractions_id)?'new_exp1':''?>">Inclusions: <strong><?php echo $valueEE->inclusion_name; ?></strong></span></li> -->
                                                <?php } ?>
                                                 <?php 
                                                if(!empty($valueEE->inclusions)){
                                                    $unserl = unserialize($valueEE->inclusions);
                                                    ?>
                                                    <li><span class="<?=!empty($old_attraction_data->old_attractions_id)?'new_exp1':''?>">Inclusions: <strong><?php echo implode(', ', $unserl); ?></strong></span></li>
                                                <?php } ?>
                                                   <!--  <li><span class="<?=!empty($old_attraction_data->old_attractions_id)?'new_exp1':''?>">Notes: <strong>{{ (!empty($value->exp_notes) ? $value->exp_notes: 'N/A') }}</strong></span></li> -->
                                                    
                                                    <!-- <li><span class="<?=!empty($old_attraciton_data->old_attractions_id)?'new_exp1':''?>">Estimated Cost PP: <strong> <?php if($currency_symbol == '€')
                                                            { echo !empty($_valueEE->exp_estimated_cost_pp_euro)?$currency_symbol.$_valueEE->exp_estimated_cost_pp_euro:$currency_symbol.$valueEE->estimated_cost_pp_euro;}
                                                            else{

                                                                echo !empty($_valueEE->exp_estimated_cost_pp)?$currency_symbol.$_valueEE->exp_estimated_cost_pp:$currency_symbol.$valueEE->estimated_cost_pp;
                                                            }?></strong></span></li> -->
                                            </ul>
                                           
                                            <!-- <?php if(!empty($old_attraction_data->old_attractions_id))
                                                {?>  
                                            <b>Change from :</b>
                                             <p style="text-decoration: line-through !important; ">Experience name : <b>{{ $old_attraction->name }}</b></p>
                                             <?php 
                                                if(!empty($old_attraction->inclusions)){
                                                    $unserl1 = unserialize($old_attraction->inclusions);
                                                    ?>
                                                    <p style="text-decoration: line-through; !important">Inclusions: <strong><?php echo implode(', ', $unserl1); ?></strong></p>
                                                <?php } } ?> -->
                                        </div>

                                    </div>
                                </div>
                                <?php
                                $i++;
                            }
                        }
                        //echo $pendingclss;
                        ?>
                               

                                <div class="tc_box_wrapper">
                                    <div class="tc_box">

                                        <div class="footer">

                                            <!-- <p>
                                                Make sure to check the weather! <a href="#">www.weather.com</a>
                                            </p>

                                            <p>
                                                Check how the traffic will affect your trip <a href="#">www.map.com</a>
                                            </p> -->
                                            <?php 

                                             if(!empty($cart_experience->driver_name)){
                                                
                                                    $total_qty2 = 1;
                                                    $price_qty2 = !empty($cart_experience->driver_cost)?$cart_experience->driver_cost:'0';
                                                    $total_cost2 = $price_qty2*$total_qty2;
                                                    $d1 = !empty($cart_experience->driver_name)?$cart_experience->driver_name:'';
                                                     $room = $cart_experience->driver_room_type;
                                                     $contact = $cart_experience->driver_contact;
                                                    ?>
                                                    <p>
                                                        <b>Driver Name 1 : </b> <?=$cart_experience->driver_name?>
                                                    </p>
                                                    <?php if(!empty($cart_experience->driver_contact)){ ?> 
                                                    <p>
                                                        <b>Driver Contact : </b> <?=$cart_experience->driver_contact?>
                                                    </p>
                                                    <?php } ?>
                                                    <p>
                                                        <b>Room Type: </b> <?php if($room == 1){ echo "Single Room";}
                                                        elseif($room == 2){ echo "Double Room";}
                                                        elseif($room == 3){ echo "Twin Room";} ?>
                                                    </p>
                                                    <?php
                                                    
                                                
                                            } if(!empty($cart_experience->driver_name1)){
                                                
                                                    $total_qty3 = 1;
                                                    $price_qty3 = !empty($cart_experience->driver_cost1)?$cart_experience->driver_cost1:'0';
                                                    $total_cost3 = $price_qty3*$total_qty3;
                                                    $d2 = !empty($cart_experience->driver_name1)?$cart_experience->driver_name1:'';
                                                    $room = $cart_experience->driver_room_type1;
                                                    ?>
                                                    <p>
                                                        <b>Driver Name 2 : </b> <?=$cart_experience->driver_name1?>
                                                    </p>
                                                    <?php if(!empty($cart_experience->driver_contact1)){ ?> 
                                                    <p>
                                                        <b>Driver Contact : </b> <?=$cart_experience->driver_contact1?>
                                                    </p>
                                                    <?php } ?>
                                                    <p>
                                                        <b>Room Type: </b> <?php if($room == 1){ echo "Single Room";}
                                                        elseif($room == 2){ echo "Double Room";}
                                                        elseif($room == 3){ echo "Twin Room";} ?>
                                                    </p>
                                                    <?php
                                                    
                                                
                                            } 
                                        ?>
                                            <p class="large">
                                                Any issues on tour? Make sure to call Veenus
                                            </p>

                                            <div class="number">
                                                01753 836600
                                            </div>

                                        </div>

                                    </div>
                                </div>

                            </div>
                            <input type="hidden" name="dates_rates_id" value="{{ $cart_experience->dates_rates_id }}">
                            <input type="hidden" name="cart_experiences_id" value="{{ $cart_experience->id }}">
                            
                        </form>
                        <div class="ctas">

                            <!-- <a href="javascript:;" id="downloadPDFtp" class="cta" dates_rates_id="{{$cart_experience->dates_rates_id}}" exp_id="{{$experience->id}}" style="width: 180px;margin: auto;">
                                Download
                            </a> -->
                           
                            <a target="_blank" href="<?=URL('download-showpack-pdf/'.$cart_experience->dates_rates_id.'/'.$experience->id)?>" class="cta">
                                Download
                            </a>
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
                            <?php if(empty($dates_rates->mark_as_completed_tp)){ ?>
                            <a href="javascript:;" class="cta" id="saveCartTpForm1" style="width: auto;margin: auto;">
                                Save for later
                            </a>
                            <?php } ?>
                            @if(!empty($dates_rates->mark_as_completed_tp))
                             <a class="cta" style="width: 221px;" href="<?=URL('unmark-status'.'/'.$cart_experience->id)?>">Unmark as Completed</a>
                             @else
                              <a class="cta mark_complete" href="javascript:;" style="width: 221px;" data-href="<?=URL('mark-tourpack-status'.'/'.$cart_experience->id)?>">Mark as Completed</a>
                              <input type="hidden" name="mark_completed" id="mark_completed_flag" value="">
                             @endif

                            <form id="confirmTPform" method="POST" action="{{ route('process-tour-steps.ajax') }}" class="ajax" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" name="cart_experiences_id" value="{{ $cart_experience->id }}">
                                <input type="hidden" name="tour_statuses_id" value="10">
                                <input type="hidden" name="pivot_id" value="">
                                
                                <input type="text" name="step9" placeholder="Please Enter a Step 10" style="display: none;">
                               <!-- <a href="javascript:;" id="confirmTPbtn" data-step="9" class="cta" style="margin: 0 25px;">Confirmed</a> -->
                                
                            </form>
                             <?php 
                             }
                             ?>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <div id="tobeprinted" style="display:none;"></div>
<script type="text/javascript">
      <?php if(!empty($dates_rates->mark_as_completed_tp)){ ?>
        $('.header a').hide();
    <?php } ?>
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
    $(document).on('click', '#atEdit', function(){
        $('#atField').show();
        $('#atContent').hide();
         CKEDITOR.replace( 'atField', {toolbar: [{ name: 'styles',items : [ 'Styles' ] },]});
    });
     <?php
        if(!empty($experienceDates)){
            foreach ($experienceDates as $key => $value) { ?>
    $(document).on('click', '#etdEdit<?=$value->id?>', function(){
        $('#etdField<?=$value->id?>').show();
        $('#etdContent<?=$value->id?>').hide();
        CKEDITOR.replace( 'etdField<?=$value->id?>', {toolbar: [{ name: 'styles',items : [ 'Styles' ] },]});
    });
    $(document).on('click', '#etaEdit<?=$value->id?>', function(){
        $('#etaField<?=$value->id?>').show();
        $('#etaContent<?=$value->id?>').hide();
        $('#ratesallocationContent').hide();
         CKEDITOR.replace( 'etaField<?=$value->id?>', {toolbar: [{ name: 'styles',items : [ 'Styles' ] },]});
    });
     
    $(document).on('click', '#inclusionEdit<?=$value->id?>', function(){
        $('#inclusionField<?=$value->id?>').show();
        $('#inclusionContent<?=$value->id?>').hide();
        CKEDITOR.replace( 'inclusionField<?=$value->id?>', {toolbar: [{ name: 'styles',items : [ 'Styles' ] },]});
    });
    $(document).on('click', '#servicesEdit<?=$value->id?>', function(){
        $('#servicesField<?=$value->id?>').show();
        $('#servicesContent<?=$value->id?>').hide();
        CKEDITOR.replace( 'servicesField<?=$value->id?>', {toolbar: [{ name: 'styles',items : [ 'Styles' ] },]});
    });
     $(document).on('click', '#house_keepingEdit<?=$value->id?>', function(){
        $('#house_keepingField<?=$value->id?>').show();
        $('#house_keepingContent<?=$value->id?>').hide();
        CKEDITOR.replace( 'house_keepingField<?=$value->id?>', {toolbar: [{ name: 'styles',items : [ 'Styles' ] },]});
    });
      $(document).on('click', '#mealEdit<?=$value->id?>', function(){
        $('#mealField<?=$value->id?>').show();
        $('#mealContent<?=$value->id?>').hide();
        CKEDITOR.replace( 'mealField<?=$value->id?>', {toolbar: [{ name: 'styles',items : [ 'Styles' ] },]});
    });
       $(document).on('click', '#mean_arrangementsEdit<?=$value->id?>', function(){
        $('#mean_arrangementsField<?=$value->id?>').show();
        $('#mean_arrangementsContent<?=$value->id?>').hide();
        CKEDITOR.replace( 'mean_arrangementsField<?=$value->id?>', {toolbar: [{ name: 'styles',items : [ 'Styles' ] },]});
    });
       $(document).on('click', '#important_informationEdit<?=$value->id?>', function(){
        $('#important_informationField<?=$value->id?>').show();
        $('#important_informationContent<?=$value->id?>').hide();
        CKEDITOR.replace( 'important_informationField<?=$value->id?>', {toolbar: [{ name: 'styles',items : [ 'Styles' ] },]});
    });
       <?php } } ?>
        $(document).on('click', '.mark_complete', function(e) {
            <?php if(!empty($pendingclss)){ ?> 
                var completed = '<?=$addclss?>';
                var totalexp = '<?=$totalexp?>';
                toastError('All Experience Bookings need to be entered, currently '+completed+'/'+totalexp+' are completed.');
                
            <?php } else { ?> 
                $('#mark_completed_flag').val('1');
                $('#saveCartTpForm1').trigger('click');
            <?php } ?>
            
            
        });
    $(document).on('click', '#saveCartTpForm1', function(e) {
        e.preventDefault();
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        }
        var formData = $("#tpForm").serialize();
        $('.loader').show();    
        $.ajax({
            url: base_url+'/super-user/update-cart-tp-data',
            type: 'POST',
            data: {'formData':formData},
            success: function(data) {
                $('.loader').hide();
                $('#tourpackModal').modal('hide');
               var flag =  $('#mark_completed_flag').val();
               if(flag == 1)
               {
                window.location.href=$('.mark_complete').attr('data-href');
               }
                
                toastSuccess('Tour has been updated successfully.');
            },
            error: function(e) {
            }
        });   
    });
    $(document).on('click', '#confirmTPbtn', function(e) {
        e.preventDefault();
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        }
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