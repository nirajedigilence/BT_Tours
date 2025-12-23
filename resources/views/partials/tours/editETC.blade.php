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
                <div class="heading">EXPERIENCE TOUR CONFIRMATION</div>
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
                                    {{ $dates_rates->etc_ref_number }}
                                </p>

                            </div>

                        </div>
                    </div>
                    <div class="tc_box_wrapper">
                        <div class="tc_box">

                            <div class="header">
                                Hotel
                            </div>
                            <?php
                                $is_hotel_assieged = 0;
                                    $date_rate_id = $dates_rates->id;
                                    $hotel_cart_list =  


DB::connection('mysql_veenus')->table('cart_experiences as c')->selectRaw('c.id as cart_id')
                                            ->leftjoin('cart_experiences_to_tour_statuses as cs', 'cs.cart_experiences_id', '=', 'c.id')
                                            ->where('c.dates_rates_id', $date_rate_id)
                                            ->where('c.completed','!=','1')
                                            ->where('c.full_cancel','0')
                                            ->where('cs.tour_statuses_id', '1')->where('cs.sign_name','!=', null)->get()->toArray();
                                         
                                         if(!empty($hotel_cart_list)) 
                                         {
                                            $is_hotel_assieged = 1;
                                         }  
                            ?>
                            <?php
                            $e_dates = array();
                            if(!empty($experienceDate)){
                                foreach ($experienceDate as $key => $value) {
                                    if(!empty($value['dates_rates_id'])){
                                        $e_dates[$value['dates_rates_id']]['date_from'][] = strtotime($value['date_from']);
                                        $e_dates[$value['dates_rates_id']]['date_to'][] = strtotime($value['date_to']);
                                        $e_dates[$value['dates_rates_id']]['date'][] = $value;
                                    }
                                }
                            }
                            $hotel = array();
                            $sgl_ar = array();
                            $dbl_ar = array();
                            $twn_ar = array();
                            $trp_ar = array();
                            $qrd_ar = array();
                            $sgl_dr_ar = array();
                            if(!empty($e_dates)){
                                foreach ($e_dates as $k => $val) {
                                    foreach ($val['date'] as $key => $value) {
                                        if(!empty($experience->еxperiencesToHotelsToExperienceDates)){
                                            foreach ($experience->еxperiencesToHotelsToExperienceDates as $key2 => $value2) {
                                                if(isset($value2->experienceDate->id) && $value2->experienceDate->id == $value['id']){
                                                    $hotel = $value2->hotel;
                                                    $hotel_date_id = $value2->experienceDate->hotel_date_id;
                                                    //get hotel date
                                                    if(!empty($hotel_date_id))
                                                    {
                                                        $hotel_date = 


DB::connection('mysql_veenus')->table('hotel_dates')->where('id', $hotel_date_id)->first();
                                                    }
                                                    else
                                                    {
                                                        //get hotel date
                                                        $hotel_date = 


DB::connection('mysql_veenus')->table('hotel_dates')->where('hotel_id', $hotel->id)->where('date_in', $value['date_from'])->where('date_out', $value['date_to'])->first();
                                                        $hotel_date_id = $hotel_date->id;
                                                    }
                                                    if(!empty($hotel_date->free_srs))
                                                    {
                                                        $free_srs_ar[] = number_format($hotel_date->free_srs,0);
                                                    }
                                                    
                                                    if(!empty($hotel_date->sgl))
                                                    {
                                                        $sgl_ar[] = $hotel_date->sgl;
                                                    }
                                                    if(!empty($hotel_date->dbl))
                                                    {
                                                        $dbl_ar[] = $hotel_date->dbl;
                                                    }
                                                    if(!empty($hotel_date->twn))
                                                    {
                                                        $twn_ar[] = $hotel_date->twn;
                                                    }
                                                    if(!empty($hotel_date->trp))
                                                    {
                                                        $trp_ar[] = $hotel_date->trp;
                                                    }
                                                    if(!empty($hotel_date->qrd))
                                                    {
                                                        $qrd_ar[] = $hotel_date->qrd;
                                                    }
                                                    if(!empty($hotel_date->sgl_dr))
                                                    {
                                                        $sgl_dr_ar[] = $hotel_date->sgl_dr;
                                                    }

                                                }
                                            }
                                        }
                            ?>
                            <div class="body">

                                <div class="hotel">

                                    <div class="name">
                                        <?php echo (!empty($hotel) ? $hotel->name : ''); ?>
                                    </div>

                                    <div class="stars">
                                        @if(!empty($hotel))
                                            @if ( $hotel->stars > 0 )
                                                @for ($i = 0; $i < $hotel->stars; $i++)
                                                    <i class="fas fa-star"></i>
                                                @endfor
                                            @endif
                                            <?php $stars = (5-$hotel->stars); ?>
                                            @for ($i = 0; $i < $stars; $i++)
                                                <i class="far fa-star"></i>
                                            @endfor
                                        @endif
                                    </div>

                                </div>
                                <?php
                                
                                
                                        
                                if(isset($value['date_from']) && !empty($value['date_from']) && isset($value['date_to']) && !empty($value['date_to'])){
                                ?>
                                <p>Date: {{ date("D d M", strtotime($value['date_from'])) }} - {{ date("D d M 'y", strtotime($value['date_to'])) }}</p>
                                <?php 
                                }
                                if(!empty($value)){ ?>
                                    <p>
                                        Location: <?php
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
                                                    echo implode(', ', $address); ?>
                                    </p>
                                <?php } ?>
                                 <div class="tc_box_wrapper">
                                    <div class="tc_box">

                                        <div class="header">
                                            Room requests (supplements)
                                        </div>

                                        <div class="body">
                                            <?php
                                            
                                            if(isset($hotel_date_id) && !empty($hotel_date_id)){
                                            $hotel_dates_supplements = 


DB::connection('mysql_veenus')->table('hotel_dates_supplements')->where('hotel_dates_id', $hotel_date_id)->get()->toArray();
                                            
                                            if(!empty($hotel_dates_supplements)){
                                                echo '<ul>';
                                                foreach ($hotel_dates_supplements as $key => $value) {
                                                    $value->price_type = !empty($value->price_type)?$value->price_type:'pppn';
                                                    $value->price_type  = ($value->price_type == 'pppn')?'pp':$value->price_type;
                                                    $value->price_out = !empty($value->price_out)?$value->price_out:'0';
                                                    $value->price_out_euro = !empty($value->price_euro_out)?$value->price_euro_out:'0';
                                                    $price_final = (!empty($dates_rates->currency) && $dates_rates->currency == 2)?'€'.$value->price_out_euro:(!empty($dates_rates->currency) && $dates_rates->currency == 3?'€'.$value->price_out_euro.' '.'£'.$value->price_out:'£'.$value->price_out);
                                                    if($value->supplements == 1){
                                                        echo '<li>Water view (Sea/Lake/River) : <strong>'.$price_final.' '.$value->price_type.'</strong></li>';
                                                    }elseif($value->supplements == 2){
                                                        echo '<li>View (Garden/Balcony) : <strong>'.$price_final.' '.$value->price_type.'</strong></li>';
                                                    }elseif($value->supplements == 3){
                                                        echo '<li>Executive/De Luxe/Superior Rooms : <strong>'.$price_final.' '.$value->price_type.'</strong></li>';
                                                    }elseif($value->supplements == 4){
                                                        echo '<li>Dbl/tw room for sole : <strong>'.$price_final.' '.$value->price_type.'</strong></li>';
                                                    }
                                                }
                                                echo '</ul>';
                                                echo '<p style="font-weight: 600">All supplements are subject to availability</p>';
                                            }else{
                                                echo 'N/A';
                                            } 
                                        }
                                            ?>

                                        </div>

                                    </div>
                                </div>
                            </div>
                            <?php
                            }
                            }
                        }
                            ?>
                        </div>
                    </div>
                    <div class="tc_box_wrapper split">

                        <div class="tc_box">

                            <div class="header">
                                Dates
                            </div>

                            <div class="body">

                                <p>
                                    {{ date("D d M", $_dateMin) }} - {{ date("D d M 'y", $_dateMax) }}
                                </p>

                            </div>

                        </div>

                        <div class="tc_box">

                            <div class="header">
                                No. of Nights
                            </div>

                            <div class="body">

                                <p>
                                    {{$nights}} nights
                                </p>

                            </div>

                        </div>

                    </div>

                    

                    <div class="tc_box_wrapper">
                        <div class="tc_box">

                            <div class="header">
                                Rates & Allocation
                            </div>

                            <div class="body">

                                <div class="rates_table">

                                    <div class="rt_row">

                                        <div class="rt_column label">
                                            Room Type
                                        </div>

                                        <div class="rt_column">
                                            Single
                                        </div>

                                        <div class="rt_column">
                                            Double
                                        </div>

                                        <div class="rt_column">
                                            Twin
                                        </div>

                                        <div class="rt_column">
                                            Triple
                                        </div>

                                        <div class="rt_column">
                                            Quad
                                        </div>

                                        <div class="rt_column">
                                            Dr
                                        </div>

                                    </div>
                                    <?php
                                    $sgl = 0;
                                    $dbl = 0;
                                    $twn = 0;
                                    $trp = 0;
                                    $qrd = 0;
                                    $sgl_dr = 0;
                                    $night = '';
                                    /*if(isset($hotel_dates) && !empty($hotel_dates)){
                                        foreach ($hotel_dates as $k => $val) {
                                            if(in_array(strtotime($val->date_in), $e_dates['date_from']) && in_array(strtotime($val->date_out), $e_dates['date_to'])){
                                                $sgl = $val->sgl;
                                                $dbl = $val->dbl;
                                                $twn = $val->twn;
                                                $trp = $val->trp;
                                                $qrd = $val->qrd;
                                                $sgl_dr = $val->sgl_dr;
                                                $night = $val->night;
                                            }
                                        }
                                    }*/
                                    // if(isset($hotel_dates) && !empty($hotel_dates)){
                                    //     $sgl = $hotel_dates[0]->sgl;
                                    //     $dbl = $hotel_dates[0]->dbl;
                                    //     $twn = $hotel_dates[0]->twn;
                                    //     $trp = $hotel_dates[0]->trp;
                                    //     $qrd = $hotel_dates[0]->qrd;
                                    //     $sgl_dr = $hotel_dates[0]->sgl_dr;
                                    //     $night = $hotel_dates[0]->night;
                                    // }
                                    ?>
                                    <div class="rt_row">

                                        <div class="rt_column label">
                                            No. Rooms
                                        </div>

                                        <div class="rt_column bold">
                                            <?php echo !empty($sgl_ar)?min($sgl_ar):'0'; ?>
                                        </div>

                                        <div class="rt_column bold">
                                            <?php echo !empty($dbl_ar)?min($dbl_ar):'0'; ?>
                                        </div>

                                        <div class="rt_column bold">
                                            <?php echo !empty($twn_ar)?min($twn_ar):'0'; ?>
                                        </div>

                                        <div class="rt_column bold <?=empty($trp_ar)?'':''?>">
                                            <?php echo !empty($trp_ar)?min($trp_ar):'0'; ?>
                                        </div>

                                        <div class="rt_column bold <?=empty($qrd_ar)?'':''?>">
                                            <?php echo !empty($qrd_ar)?min($qrd_ar):'0'; ?>
                                        </div>

                                        <div class="rt_column bold">
                                            <?php echo !empty($sgl_dr_ar)?min($sgl_dr_ar):'0'; ?>
                                        </div>

                                    </div>

                                    <div class="rt_row" <?=(!empty($dates_rates->currency) && ($dates_rates->currency == '1' || $dates_rates->currency == '3'))?'':'style="display:none"'?>>

                                        <div class="rt_column label">
                                            Rate pp &#163;
                                        </div>

                                        <div class="rt_column">
                                            <?php echo number_format($dates_rates->single,2); ?>
                                        </div>

                                        <div class="rt_column">
                                            <?php echo number_format($dates_rates->double,2); ?>
                                        </div>

                                        <div class="rt_column">
                                            <?php echo number_format($dates_rates->twin,2); ?>
                                        </div>

                                        <div class="rt_column">
                                            <?php echo number_format($dates_rates->triple,2); ?>
                                        </div>

                                        <div class="rt_column">
                                            <?php echo number_format($dates_rates->quad,2); ?>
                                        </div>

                                        <div class="rt_column">
                                           <?php echo number_format($dates_rates->driver,2); ?>
                                        </div>

                                    </div>

                                    <div class="rt_row" <?=(!empty($dates_rates->currency) && ($dates_rates->currency == '1' || $dates_rates->currency == '3'))?'':'style="display:none"'?>>

                                        <div class="rt_column label">
                                            SS pp &#163;
                                        </div>

                                        <div class="rt_column">
                                            <?php echo !empty($dates_rates->single_srs)?number_format($dates_rates->single_srs,2):'0.00'; ?>
                                        </div>

                                        <div class="rt_column">
                                            <?php echo !empty($dates_rates->double_srs)?number_format($dates_rates->double_srs,2):'0.00'; ?>
                                        </div>

                                        <div class="rt_column">
                                            <?php echo !empty($dates_rates->twin_srs)?number_format($dates_rates->twin_srs,2):'0.00'; ?>
                                        </div>

                                        <div class="rt_column">
                                            <?php echo !empty($dates_rates->triple_srs)?number_format($dates_rates->triple_srs,2):'0.00'; ?>
                                        </div>

                                        <div class="rt_column">
                                            <?php echo !empty($dates_rates->quad_srs)?number_format($dates_rates->quad_srs,2):'0.00'; ?>
                                        </div>

                                        <div class="rt_column">
                                            <?php echo !empty($dates_rates->driver_srs)?number_format($dates_rates->driver_srs,2):'0.00'; ?>
                                        </div>

                                    </div>
                                     <div class="rt_row" <?=(!empty($dates_rates->currency) && ($dates_rates->currency == '2' || $dates_rates->currency == '3'))?'':'style="display:none"'?>>

                                        <div class="rt_column label">
                                            Rate pp &#8364;
                                        </div>

                                        <div class="rt_column">
                                            <?php echo number_format($dates_rates->single_euro,2); ?>
                                        </div>

                                        <div class="rt_column">
                                            <?php echo number_format($dates_rates->double_euro,2); ?>
                                        </div>

                                        <div class="rt_column">
                                            <?php echo number_format($dates_rates->twin_euro,2); ?>
                                        </div>

                                        <div class="rt_column">
                                            <?php echo number_format($dates_rates->triple_euro,2); ?>
                                        </div>

                                        <div class="rt_column">
                                            <?php echo number_format($dates_rates->quad_euro,2); ?>
                                        </div>

                                        <div class="rt_column">
                                            <?php echo number_format($dates_rates->driver_euro,2); ?>
                                        </div>

                                    </div>

                                    <div class="rt_row" <?=(!empty($dates_rates->currency) && ($dates_rates->currency == '2' || $dates_rates->currency == '3'))?'':'style="display:none"'?>>

                                        <div class="rt_column label">
                                            SS pp &#8364;
                                        </div>

                                        <div class="rt_column">
                                            <?php echo number_format($dates_rates->single_srs_euro,2); ?>
                                        </div>

                                        <div class="rt_column">
                                            <?php echo number_format($dates_rates->double_srs_euro,2); ?>
                                        </div>

                                        <div class="rt_column">
                                            <?php echo number_format($dates_rates->double_srs_euro,2); ?>
                                        </div>

                                        <div class="rt_column">
                                            <?php echo number_format($dates_rates->triple_srs_euro,2); ?>
                                        </div>

                                        <div class="rt_column">
                                            <?php echo number_format($dates_rates->quad_srs_euro,2); ?>
                                        </div>

                                        <div class="rt_column">
                                            <?php echo number_format($dates_rates->driver_srs_euro,2); ?>
                                        </div>

                                    </div>
                                    <?php 
                                   $free_srs=  !empty($free_srs_ar)?min($free_srs_ar):'0';
                                   $sglv=  !empty($sgl_ar)?min($sgl_ar):'0';
                                    if(!empty($free_srs)){ ?> 
                                    <!-- <div class="rt_row">

                                        <div class="rt_column label" style="margin-left: 8px;">
                                           Free SS 
                                        </div>

                                        <div class="rt_column">
                                          
                                             <?php echo (!empty($free_srs) ? $free_srs.'/'.$sglv : ''); ?>
                                        </div>

                                        <div class="rt_column no-boder">
                                           
                                        </div>

                                        <div class="rt_column no-boder">
                                            
                                        </div>

                                        <div class="rt_column no-boder">
                                            
                                        </div>

                                        <div class="rt_column no-boder">
                                            
                                        </div> 
                                        <div class="rt_column no-boder">
                                            
                                        </div> 

                                    </div>  -->
                                     <div class="rt_row">

                                        <div class=" label" style="margin-left: 0px;width: 125px !important;font-weight: 600;color: #14213D;font-size: 0.875rem;">
                                            Rooms SS Free
                                            </div>

                                         <div class="d" style="width: 90%;border: none;padding: 0px;font-weight: bold;color: #212529;">  The first {{$free_srs}} rooms are SS free</div>

                                    </div> 
                                    <?php } ?>
                                    <!-- <div class="rt_row">

                                            <div class=" label" style="margin-left: -12px;width: 146px !important;font-weight: 600;color: #14213D;font-size: 0.875rem;">
                                            Rates &amp; Allocations 
                                            </div>

                                            <div class="d" style="width: 86%;border: 1px solid #A8A8A8;padding: 17px;"> <input type="text" class="form-control" name="ratesallocation" value="<?php echo $dates_rates->ratesallocation; ?>">
                                                <?php echo ($dates_rates->ratesallocation); ?></div>
                                     </div> -->
                                  
                                </div>

                            </div>

                        </div>
                    </div>

                   <!--  <div class="tc_box_wrapper">
                        <div class="tc_box">

                            <div class="header">
                                Room requests (supplements) pppn
                                <a href="#">Edit</a>
                            </div>

                            <div class="body">

                                <ul>
                                    <li>Sea view: <strong>&pound;10.00</strong></li>
                                    <li>Garden view: <strong>&pound;10.00</strong></li>
                                    <li>Superior room: <strong>&pound;20.00</strong></li>
                                    <li>Double single occupancy: <strong>&pound;30.00</strong></li>
                                    <li>Twin single occupancy: <strong>&pound;30.00</strong></li>
                                </ul>

                            </div>

                        </div>
                    </div> -->
                    <?php if(empty($dates_rates->sign_name_etc)){ ?>
                    <div class="tc_box_wrapper">
                        <div class="tc_box">

                            <div class="header">
                                Tour Pack Template 

                                
                            </div>
                            <div class="body">
                               <?php /* <a href="javascript:;" exp_date_id="{{$experienceDate->id}}" exp_id="{{$experience->id}}"  id="HtlConfrmTemplate">Add  Hotel Confirmation Template </a> */?>
                                <button type="button" class="btn btn-primary" exp_id="{{$experience->id}}"  hotel_id="{{$hotel->id}}" id="HtlGetTemplate">Import Template </a>
                                
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="tc_box_wrapper">
                        <div class="tc_box">

                            <div class="header">
                                Additional information 
                                <?php if(empty($dates_rates->sign_name_etc)){ ?>
                                    <a href="javascript:;" id="ratesEdit">Edit</a>
                                <?php } ?>
                            </div>

                            <div class="body">
                                <textarea id="ratesallocationField" name="ratesallocation" class="form-control" style="display: none;">{{ $dates_rates->ratesallocation }}</textarea>
                                <div id="ratesallocationContent">
                                    {!! $dates_rates->ratesallocation !!}
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="tc_box_wrapper">
                        <div class="tc_box">

                            <div class="header">
                                Driver's Free Place
                                <?php if(empty($dates_rates->sign_name_etc)){ ?>
                                    <a href="javascript:;" id="freeEdit2">Edit</a>
                                <?php } ?>
                            </div>

                            <div class="body">
                                <textarea id="freeField2" name="free_place" class="form-control text_change" style="display: none;">{{ $dates_rates->etc_free_place }}</textarea>
                                <div id="freeContent2">
                                    {!! ($dates_rates->etc_free_place) !!}
                                </div>
                                <!-- <ul>
                                    <li><strong>Hotel:</strong> driver free of charge on the above meal basis (subject to a min of 25 paying passengers)</li>
                                    <li><strong>Experiences:</strong> free place for attractions is subject to the decision of the site manager</li>
                                </ul> -->

                            </div>

                        </div>
                    </div>
                    <div class="tc_box_wrapper">
                        <div class="tc_box">

                            <div class="header">
                                Meal Arrangements
                                <?php if(empty($dates_rates->sign_name_etc)){ ?>
                                    <a href="javascript:;" id="mealEdit2">Edit</a>
                                <?php } ?>
                            </div>

                            <div class="body">

                                <textarea id="mealField2" name="meal_arrangements" class="form-control text_change" style="display: none;">{{ $dates_rates->etc_meal_arrangements }}</textarea>
                                <div id="mealContent2">
                                    {!! ($dates_rates->etc_meal_arrangements) !!}
                                </div>
                                <!-- <ul>
                                    <li><strong>DBB</strong> (3 course 3 choice evening meal followed by tea and coffee and a full hot and cold breakfast)</li>
                                    <li><strong>Dinner service:</strong> Starters and desserts will be table-served. The main course will be buffet-style</li>
                                </ul> -->

                            </div>

                        </div>
                    </div>
                    <div class="tc_box_wrapper">
                        <div class="tc_box">

                            <div class="header">
                                Inclusions
                                <?php if(empty($dates_rates->sign_name_etc)){ ?>
                                    <a href="javascript:;" id="inclusionEdit2">Edit</a>
                                <?php } ?>
                            </div>

                            <div class="body">
                                <textarea id="inclusionField2" name="tour_inclusions" class="form-control text_change" style="display: none;">{{ $dates_rates->etc_tour_inclusions }}</textarea>
                                <div id="inclusionContent2">
                                    {!! ($dates_rates->etc_tour_inclusions) !!}
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="tc_box_wrapper">
                        <div class="tc_box">

                            <div class="header">
                                Services and Facilities
                                <?php if(empty($dates_rates->sign_name_etc)){ ?>
                                <a href="javascript:;" id="sfEdit2">Edit</a>
                                <?php } ?>
                            </div>

                            <div class="body">
                                <textarea id="sfField2" name="services_facilities" class="form-control text_change" rows="7" style="display: none;">{{ $dates_rates->etc_services_facilities }}</textarea>
                                <div id="sfContent2">
                                    {!! ($dates_rates->etc_services_facilities) !!}
                                </div>
                            </div>

                        </div>
                    </div>
                    
                    <?php 
                    if(!empty($cart_experience))
                    {
                        if(!empty($cart_experience->cartExperiencesToAttraction)){
                            $i = 1;
                            foreach ($cart_experience->cartExperiencesToAttraction as $key => $value) {
                                $valueEE = 


DB::connection('mysql_veenus')->table('attractions')->where("id", $value->attractions_id)->first(); 
                                   $old_attraction_data = 


DB::connection('mysql_veenus')->table('cart_experiences_to_attractions')->select('old_attractions_id','amendement_date','cart_exp_id','experiences_id')->where("cart_exp_id", $cart_experience->id)->where("experiences_id", $cart_experience->experiences_id)->where("attractions_id", $value->attractions_id)->first();
                                   
                                   $amendement_date = '';
                                   
                                   if(!empty($old_attraction_data->old_attractions_id))
                                   {
                                    $old_attraction = 


DB::connection('mysql_veenus')->table('attractions')->where("id", $old_attraction_data->old_attractions_id)->first();
                                    $amendement_date = !empty($old_attraction_data->amendement_date)?'(Amended on '.date('d/m/Y',strtotime($old_attraction_data->amendement_date)).')':'';
                                   }
                                if($value->type_id == 1){
                                    $type = 'VIP';
                                }elseif($value->type_id == 2){
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
                                                <li><span class="<?=!empty($old_attraction_data->old_attractions_id)?'new_exp':''?>">Experience name: <strong><?php echo $valueEE->name; ?></strong></span></li>
                                                <?php 
                                                if(!empty($valueEE->inclusions)){
                                                    $unserl = unserialize($valueEE->inclusions);
                                                    ?>
                                                    <li><span class="<?=!empty($old_attraction_data->old_attractions_id)?'new_exp':''?>">Inclusions: <strong><?php echo implode(', ', $unserl); ?></strong></span></li>
                                                <?php } ?>
                                            </ul>
                                            <?php if(!empty($old_attraction_data->old_attractions_id))
                                                {?>  
                                            <b>Change from :</b>
                                             <p style="text-decoration: line-through !important; ">Experience name : <b>{{ $old_attraction->name }}</b></p>
                                             <?php 
                                                if(!empty($old_attraction->inclusions)){
                                                    $unserl1 = unserialize($old_attraction->inclusions);
                                                    ?>
                                                    <p style="text-decoration: line-through; !important">Inclusions: <strong><?php echo implode(', ', $unserl1); ?></strong></p>
                                                <?php } } ?>
                                        </div>

                                    </div>
                                </div>
                                <?php
                                $i++;
                            }
                        }
                    }
                    else
                    {
                          if(!empty($experience->experienceAttractions)){
                            $i = 1;
                            foreach ($experience->experienceAttractions as $key => $value) {
                                if($value->type_id == 1){
                                    $type = 'VIP';
                                }elseif($value->type_id == 2){
                                    $type = 'Big Banner';                                
                                }else{
                                    $type = 'Local';                                
                                }
                                ?>
                                <div class="tc_box_wrapper">
                                    <div class="tc_box">

                                        <div class="header">
                                            Experience <?php echo $i.': '.$type; ?>
                                            <!-- <a href="#">Edit</a> -->
                                        </div>

                                        <div class="body">

                                            <ul>
                                                <li>Experience name: <strong><?php echo $value->name; ?></strong></li>
                                                <?php 
                                                if(!empty($value->inclusions)){
                                                    $unserl = unserialize($value->inclusions);
                                                    ?>
                                                    <li>Inclusions: <strong><?php echo implode(', ', $unserl); ?></strong></li>
                                                <?php } ?>
                                            </ul>

                                        </div>

                                    </div>
                                </div>
                                <?php
                                $i++;
                            }
                        }
                    }
                  
                    ?>

                    <div class="tc_box_wrapper">
                        <div class="tc_box">

                            <div class="header">
                                Terms and Conditions
                                <?php if(empty($dates_rates->sign_name_etc)){ ?>
                                    <a href="javascript:;" id="tncEdit2">Edit</a>
                                <?php } ?>
                            </div>

                            <div class="body">
                                <textarea id="tncField2" name="terms_conditions" class="form-control text_change" rows="7" style="display: none;">{{ $dates_rates->etc_terms_conditions }}</textarea>
                                <div class="tc_section" id="tcContent2">
                                    {!! ($dates_rates->etc_terms_conditions) !!}
                                </div>
                                <!-- <div class="tc_section">

                                    <div class="sub_heading">
                                        Cancellation:
                                    </div>

                                    <p>
                                        This booking can be released free of charge until 30 days prior to arrival.
                                    </p>

                                    <p>
                                        Please send a final rooming list before this deadline, containing only the details of guests who have paid in full.
                                    </p>

                                    <p>
                                        Any cancellations after the deadline are likely to be charged at the full rate.
                                    </p>

                                </div>

                                <div class="tc_section">

                                    <div class="sub_heading">
                                        Payment:
                                    </div>

                                    <p>
                                        <strong>Full pre- payment is required 7 days prior to arrival.</strong> Upon receipt of the balance, Veenus will forward the <strong>Hotel Tour Voucher</strong> which confirms the final details of the tour.
                                    </p>

                                    <p>
                                        Above rates includes experiences, porterage and based on min. 15 paying guests.
                                    </p>

                                    <p>
                                        Above attractions/experiences are subject to availability and bookings will be made once the respective booking window opens. Should there be any changes to the date & time, Veenus will inform you accordingly
                                    </p>

                                </div>

                                <div class="tc_section">

                                    <div class="sub_heading">
                                        Further details of the hotel can be accessed via this link:
                                    </div>

                                    <p>
                                        <a href="#">www.veenus.co.uk/hotels/peebleshydro</a>
                                    </p>

                                </div>

                                <div class="tc_section">

                                    <p>
                                        We agree that the booking details above are correct and are subject to the terms and conditions shown above
                                    </p>

                                    <p>
                                        VAT included at the prevailing rate
                                    </p>

                                </div> -->

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
                    <a href="javascript:;" class="cta <?=!empty($is_hotel_assieged)?'booked_hotel':''?>" id="markAsCompleted" style="width: auto;" data-id="{{$dates_rates->id}}">
                        Mark as Completed
                    </a>
                    @else
                    @if(empty($is_hotel_assieged))
                    <a href="javascript:;" class="cta <?=!empty($is_hotel_assieged)?'booked_hotel':''?>" id="unmarkAsCompleted" style="width: auto;background: red;border-color: red;" data-id="{{$dates_rates->id}}">
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
       $(document).on('click', '#tncEdit2', function(){
        $('#tncField2').show();
            $('#tcContent2').hide();
         CKEDITOR.replace( 'tncField2', {toolbar: [{ name: 'styles',items : [ 'Styles' ] },]});
    });
    $(document).on('click', '#inclusionEdit2', function(){
        $('#inclusionField2').show();
        $('#inclusionContent2').hide();
         CKEDITOR.replace( 'inclusionField2', {toolbar: [{ name: 'styles',items : [ 'Styles' ] },]});
    });
    $(document).on('click', '#sfEdit2', function(){
        $('#sfField2').show();
        $('#sfContent2').hide();
         CKEDITOR.replace( 'sfField2', {toolbar: [{ name: 'styles',items : [ 'Styles' ] },]});
    });
    $(document).on('click', '#freeEdit2', function(){
        $('#freeField2').show();
        $('#freeContent2').hide();
         CKEDITOR.replace( 'freeField2', {toolbar: [{ name: 'styles',items : [ 'Styles' ] },]});
    });
    $(document).on('click', '#ratesEdit', function(){
        $('#ratesallocationField').show();
        $('#ratesallocationContent').hide();
         CKEDITOR.replace( 'ratesallocationField', {toolbar: [{ name: 'styles',items : [ 'Styles' ] },]});
    });
    $(document).on('click', '#mealEdit2', function(){
        $('#mealField2').show();
        $('#mealContent2').hide();
         CKEDITOR.replace( 'mealField2', {toolbar: [{ name: 'styles',items : [ 'Styles' ] },]});
    });
    $(document).on('click', '#saveEtcForm', function(e) {
        e.preventDefault();
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        }
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
    $(document).ready(function(){

    $('#HtlGetTemplate').bind('click', function(e) {
        e.preventDefault();
        var exp_id = $('#HtlGetTemplate').attr('exp_id');

        var hotel_id = $('#HtlGetTemplate').attr('hotel_id');
        if(confirm('Are you sure you want to import the template, this will overwrite data in the exisiting fields?'))
        {
             $('.loader').show();    
            $.ajax({
                url: base_url+'/get-tourpack-confirm-details/'+exp_id,
                //url: base_url+'/super-user/edit-hc',
                type: 'GET',
                success: function(data) {
                    
                    if (data.confirmation_template_hc != null) {
                        console.log(data.confirmation_template_hc);
                        $('#freeField2').val(data.confirmation_template_hc.ect_free_place); 
                        $('#mealField2').val(data.confirmation_template_hc.ect_confirm_description); 
                        $('#inclusionField2').val(data.confirmation_template_hc.ect_group_size);
                        $('#sfField2').val(data.confirmation_template_hc.ect_mobility_access);
                        $('#tncField2').val(data.confirmation_template_hc.ect_terms_conditions);
                         $('#ratesallocationField').val(data.confirmation_template_hc.ect_confirm_additional_info);

                        $('#freeContent2').html(data.confirmation_template_hc.ect_free_place); 
                        $('#mealContent2').html(data.confirmation_template_hc.ect_confirm_description);
                        $('#inclusionContent2').html(data.confirmation_template_hc.ect_group_size); 
                        $('#sfContent2').html(data.confirmation_template_hc.ect_mobility_access);
                        $('#tcContent2').html(data.confirmation_template_hc.ect_terms_conditions);
                       $('#ratesallocationContent').html(data.confirmation_template_hc.ect_confirm_additional_info);
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