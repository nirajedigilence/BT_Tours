<style type="text/css">.no-boder{border: unset !important ;}</style>

<div class="notIndexContainer" style="padding-top: 0px;">
        <div class="tour_confirmation_wrapper" style="padding: 0;">
            <div class="tour_confirmation">

                <div class="logo">
                    <img src="{{ asset('images/logo2x.png') }}" alt="Veenus">
                </div>
                 <?php 
                  $hc_sign_date = '';
                 $currency_symbol = getCurrencySymbol($cart_experience->currency);
                $e_dates = array();
                if(!empty($experienceDate)){
                    foreach ($experienceDate as $key => $value) {
                        if(!empty($value['dates_rates_id'])){
                            $e_dates['date_from'][] = strtotime($value['date_from']);
                            $e_dates['date_to'][] = strtotime($value['date_to']);
                        }
                    } 
                }
                if ( !empty( $e_dates['date_from'] ) ) {
                    $_dateMin = min($e_dates['date_from']);
                }else{
                    $_dateMin = 0 ;
                }
                if ( !empty( $e_dates['date_to'] ) ) {
                     $_dateMax = max($e_dates['date_to']);
                }else{
                    $_dateMax = 0 ;
                }
               
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
                                $i = 1;
                                foreach ($e_dates as $k => $val) {

                                    foreach ($val['date'] as $key => $value) {
                                        if(!empty($experience->еxperiencesToHotelsToExperienceDates)){
                                            foreach ($experience->еxperiencesToHotelsToExperienceDates as $key2 => $value2) {
                                                if(isset($value2->experienceDate->id) && $value2->experienceDate->id == $value['id']){
                                                    $hotel = $value2->hotel;
                                                    $hotel_date_id = $value2->experienceDate->hotel_date_id;
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
                                                    }
                                                    if($i == 1 && empty($hc_sign_date))
                                                    {

                                                      $hc_sign_date = $hotel_date->hc_sign_date;
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
                                            $i++;
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
                                <p><b>Date:</b> {{ date("D d M", strtotime($value['date_from'])) }} - {{ date("D d M 'y", strtotime($value['date_to'])) }}</p>
                                <?php 
                                }
                                if(!empty($value)){ ?>
                                    <p>
                                        <b>Location:</b> <?php
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
                                                    $value->price_euro_out = !empty($value->price_euro_out)?$value->price_euro_out:'0';
                                                    $price_final = (!empty($cart_experience->currency) && $cart_experience->currency == 2)?'€'.$value->price_euro_out:'£'.$value->price_out;
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
                                        {{ date('d M Y', $_dateMin) }} - {{ date('d M Y', $_dateMax) }}
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
                                        if(isset($hotel_dates) && !empty($hotel_dates)){
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
                                        }
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
                                            <?php echo !empty($sgl_ar)?min($sgl_ar):$sgl; ?>
                                        </div>

                                        <div class="rt_column bold">
                                            <?php echo !empty($dbl_ar)?min($dbl_ar):$dbl; ?>
                                        </div>

                                        <div class="rt_column bold">
                                            <?php echo !empty($twn_ar)?min($twn_ar):$twn; ?>
                                        </div>

                                        <div class="rt_column bold">
                                            <?php echo !empty($trp_ar)?min($trp_ar):$trp; ?>
                                        </div>

                                        <div class="rt_column bold">
                                            <?php echo !empty($qrd_ar)?min($qrd_ar):$qrd; ?>
                                        </div>

                                        <div class="rt_column bold">
                                            <?php echo !empty($sgl_dr_ar)?min($sgl_dr_ar):$sgl_dr; ?>
                                        </div>

                                    </div>

                                     <div class="rt_row">

                                            <div class="rt_column label">
                                                Rate pp ({{$currency_symbol}})
                                            </div>

                                            <div class="rt_column">
                                                  <?php echo ($currency_symbol == '€')?number_format($dates_rates->rate_euro,2):(!empty($dates_rates->single)?number_format($dates_rates->single,2):'0.00'); ?>
                                            </div>

                                            <div class="rt_column">
                                                <?php echo ($currency_symbol == '€')?number_format($dates_rates->rate_euro,2):(!empty($dates_rates->double)?number_format($dates_rates->double,2):'0.00'); ?>
                                            </div>

                                            <div class="rt_column">
                                                 <?php echo ($currency_symbol == '€')?number_format($dates_rates->rate_euro,2):(!empty($dates_rates->twin)?number_format($dates_rates->twin,2):'0.00'); ?>
                                            </div>

                                            <div class="rt_column">
                                                 <?php echo ($currency_symbol == '€')?number_format($dates_rates->rate_euro,2):(!empty($dates_rates->triple)?number_format($dates_rates->triple,2):'0.00'); ?>
                                            </div>

                                            <div class="rt_column">
                                                 <?php echo ($currency_symbol == '€')?number_format($dates_rates->rate_euro,2):(!empty($dates_rates->quad)?number_format($dates_rates->quad,2):'0.00'); ?>
                                            </div>

                                            <div class="rt_column">
                                                <?php echo ($currency_symbol == '€')?number_format($dates_rates->driver_euro,2):(!empty($dates_rates->driver)?number_format($dates_rates->driver,2):'0.00'); ?>
                                            </div>

                                        </div>

                                        <div class="rt_row">

                                            <div class="rt_column label">
                                                SS pp ({{$currency_symbol}})
                                            </div>

                                            <div class="rt_column">
                                                 <?php echo ($currency_symbol == '€')?number_format($dates_rates->single_srs_euro,2):(!empty($dates_rates->single_srs)?number_format($dates_rates->single_srs,2):'0.00'); ?>
                                               
                                            </div>

                                            <div class="rt_column">
                                                <?php echo ($currency_symbol == '€')?number_format($dates_rates->double_srs_euro,2):(!empty($dates_rates->double_srs)?number_format($dates_rates->double_srs,2):'0.00'); ?>
                                               
                                            </div>

                                            <div class="rt_column">
                                                <?php echo ($currency_symbol == '€')?number_format($dates_rates->twin_srs_euro,2):(!empty($dates_rates->twin_srs)?number_format($dates_rates->twin_srs,2):'0.00'); ?>
                                            </div>

                                            <div class="rt_column">
                                                <?php echo ($currency_symbol == '€')?number_format($dates_rates->triple_srs_euro,2):(!empty($dates_rates->triple_srs)?number_format($dates_rates->triple_srs,2):'0.00'); ?>
                                            </div>

                                            <div class="rt_column">
                                                <?php echo ($currency_symbol == '€')?number_format($dates_rates->quad_srs_euro,2):(!empty($dates_rates->quad_srs)?number_format($dates_rates->quad_srs,2):'0.00'); ?>
                                                
                                            </div>

                                            <div class="rt_column">
                                                <?php echo ($currency_symbol == '€')?number_format($dates_rates->driver_srs_euro,2):(!empty($dates_rates->quad_srs)?number_format($dates_rates->quad_srs,2):'0.00'); ?>
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
                                    </div>

                                </div>

                            </div>
                        </div>

                        <!-- <div class="tc_box_wrapper">
                            <div class="tc_box">

                                <div class="header">
                                    Room requests (supplements) pppn
                                    <?php if($datatab != 'collaborator'){ ?>
                                        <a href="#">Edit</a>
                                    <?php } ?>
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
                        <div class="tc_box_wrapper">
                            <div class="tc_box">

                                <div class="header">
                                    Additional information 
                                    <?php //if($datatab != 'collaborator' && empty($dates_rates->sign_name_etc)){ ?>
                                    <?php if($datatab != 'collaborator' ){ ?>
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
                                    <?php //if($datatab != 'collaborator' && empty($dates_rates->sign_name_etc)){ ?>
                                    <?php if($datatab != 'collaborator' ){ ?>
                                        <a href="javascript:;" id="freeEdit">Edit</a>
                                    <?php } ?>
                                </div>

                                <div class="body">
                                    <textarea id="freeField" name="free_place" class="form-control" style="display: none;">{{ $dates_rates->etc_free_place }}</textarea>
                                    <div id="freeContent">
                                        {!! $dates_rates->etc_free_place !!}
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="tc_box_wrapper">
                            <div class="tc_box">

                                <div class="header">
                                    Meal Arrangements
                                    <?php //if($datatab != 'collaborator' && empty($dates_rates->sign_name_etc)){ ?>
                                    <?php if($datatab != 'collaborator' ){ ?>
                                        <a href="javascript:;" id="mealEdit">Edit</a>
                                    <?php } ?>
                                </div>

                                <div class="body">
                                    <textarea id="mealField" name="meal_arrangements" class="form-control" style="display: none;">{{ $dates_rates->etc_meal_arrangements }}</textarea>
                                    <div id="mealContent">
                                    {!! $dates_rates->etc_meal_arrangements !!}
                                </div>

                                </div>

                            </div>
                        </div>
                        <div class="tc_box_wrapper">
                            <div class="tc_box">

                                <div class="header">
                                    Inclusions
                                    <?php //if($datatab != 'collaborator' && empty($dates_rates->sign_name_etc)){ ?>
                                    <?php if($datatab != 'collaborator' ){ ?>
                                        <a href="javascript:;" id="inclusionEdit">Edit</a>
                                    <?php } ?>
                                </div>

                                <div class="body">
                                    <textarea id="inclusionField" name="tour_inclusions" class="form-control" style="display: none;">{{ $dates_rates->etc_tour_inclusions }}</textarea>
                                    <div id="inclusionContent">
                                    {!! $dates_rates->etc_tour_inclusions !!}
                                </div>

                                </div>

                            </div>
                        </div>
                        <div class="tc_box_wrapper">
                            <div class="tc_box">

                                <div class="header">
                                    Services and Facilities
                                    <?php //if($datatab != 'collaborator' && empty($dates_rates->sign_name_etc)){ ?>
                                    <?php if($datatab != 'collaborator'){ ?>
                                    <a href="javascript:;" id="sfEdit2">Edit</a>
                                    <?php } ?>
                                </div>

                                <div class="body">
                                    <textarea id="sfField2" name="services_facilities" class="form-control" rows="7" style="display: none;">{{ $dates_rates->etc_services_facilities }}</textarea>
                                    <div id="sfContent2">
                                        {!! $dates_rates->etc_services_facilities !!}
                                    </div>
                                </div>

                            </div>
                        </div>
                        

                        <?php 

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
                        ?>

                        <div class="tc_box_wrapper">
                            <div class="tc_box">

                                <div class="header">
                                    Terms and Conditions
                                    <?php //if($datatab != 'collaborator' && empty($dates_rates->sign_name_etc)){ ?>
                                    <?php if($datatab != 'collaborator' ){ ?>
                                        <a href="javascript:;" id="tncEdit">Edit</a>
                                    <?php } ?>
                                </div>

                                <div class="body">
                                    <textarea id="tncField" name="terms_conditions" class="form-control" rows="7" style="display: none;">{{ $dates_rates->etc_terms_conditions }}</textarea>
                                   <div class="tc_section" id="tcContent">
                                       {!! $dates_rates->etc_terms_conditions !!}
                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>
                    <input type="hidden" name="exp_id" value="{{$experience->id}}">
                    <input type="hidden" name="exp_date_rate_id" value="{{$dates_rates->id}}">
                    <input type="hidden" name="cart_experiences_id" id="cart_experiences_id" value="{{$cartid}}">
                    </form>
                    <form method="POST" action="{{ route('process-tour-steps-new') }}" class="step1FormCls">
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
                                    <input type="hidden" name="cart_experiences_id" value="{{$cartid}}">
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
                    <a onclick="return confirm('Are you sure you want to unsigned tour?')" class="cta btn btn-primary" href='{{asset("/reset-tour/$cartid")}}' class="orangeLink">
                      Un-sign document
                    </a>
                    <a data-assigned-id="{{$cartid}}" style="" data-toggle="modal" data-target="#amendmentsModalLong"  data-backdrop="static" data-keyboard="false" class="open-amend cta btn btn-primary" tabindex="-1">  
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
                     <a onclick="return confirm('Are you sure?')" class="cta btn btn-primary" href='{{asset("/gererate_document/$cartid")}}' style="float: right;" class="orangeLink">
                     Update ETC Document
                    </a>
                    <?php } ?>
                    <?php } } ?>
                    <input type="button" value="Back" data-dismiss="modal" aria-label="Close" class="btn btn-danger">

                     <?php if($datatab != 'collaborator' && empty($cartExeToTour->sign_name)){ ?>
                        <!-- <a href="javascript:;" class="cta btn btn-primary" id="saveEtcForm" style="width: auto;">
                            Save 
                        </a> -->

                        <!-- <a data-fancybox data-type="ajax" data-src="" href="{{ route('add-amend-doc', $cartid) }}" class="cta btn btn-warning">
                                Add Amendments
                            </a> -->
                        <a data-assigned-id="{{$cartid}}" style="" data-toggle="modal" data-target="#amendmentsModalLong"  data-backdrop="static" data-keyboard="false" class="open-amend cta btn btn-primary" tabindex="-1">  
                  Save & Add Amendment </a>
                   <input type="button" value="Cancel All Changes" data-dismiss="modal" aria-label="Close" class="btn btn-danger">
                    <?php } ?>
                   
                    </form>
                </div>

            </div>
        </div>
    </div>
   <style type="text/css">.marker{background: yellow;}</style>
<script type="text/javascript">
  
    $(document).on('click', '#tncEdit', function(){
        $('#tncField').show();
            $('#tcContent').hide();
         CKEDITOR.replace( 'tncField', {toolbar: [{ name: 'styles',items : [ 'Styles' ] },]});
    });
    $(document).on('click', '#inclusionEdit', function(){
        $('#inclusionField').show();
        $('#inclusionContent').hide();
         CKEDITOR.replace( 'inclusionField', {toolbar: [{ name: 'styles',items : [ 'Styles' ] },]});
    });
    $(document).on('click', '#sfEdit2', function(){
        $('#sfField2').show();
        $('#sfContent2').hide();
         CKEDITOR.replace( 'sfField2', {toolbar: [{ name: 'styles',items : [ 'Styles' ] },]});
    });
    $(document).on('click', '#freeEdit', function(){
        $('#freeField').show();
        $('#freeContent').hide();
         CKEDITOR.replace( 'freeField', {toolbar: [{ name: 'styles',items : [ 'Styles' ] },]});
    });
    $(document).on('click', '#ratesEdit', function(){
        $('#ratesallocationField').show();
        $('#ratesallocationContent').hide();
         CKEDITOR.replace( 'ratesallocationField', {toolbar: [{ name: 'styles',items : [ 'Styles' ] },]});
    });
    
    $(document).on('click', '#mealEdit', function(){
        $('#mealField').show();
        $('#mealContent').hide();
         CKEDITOR.replace( 'mealField', {toolbar: [{ name: 'styles',items : [ 'Styles' ] },]});
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
            url: base_url+'/update-etc-data-collab',
            type: 'POST',
            data: {'formData':formData},
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
            error: function(e) {
            }
        });   
    });
    $(function () {
    $('.open-amend').click(function () {
        //$('#hotelDatesModal').modal('hide');
        var id = $(this).data('assigned-id');
        var route = "/add-amend-doc/"+id;
        $('.amend-content').load(route);
    });

});
</script>
