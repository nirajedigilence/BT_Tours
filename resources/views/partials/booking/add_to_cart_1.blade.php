<style type="text/css">
    .selected{border: 3px solid orange;}
    .button_selected{background-color: orange; padding: 20px 5px;color: #ffffff !important;border-color: #ffffff !important;}
    .date{padding: 20px 5px;}
    .clickDiv{cursor: pointer;}
    #addToCartForm2Submit {
        background: #FCA311;
        padding: 10px 30px;
        color: #fff;
        font-size: 20px;
        font-weight: bold;
        border-radius: 5px;
        margin: 10px 0px;
        display: inline-block;
    }
    #onHold {
        background: #FCA311;
        padding: 10px 30px;
        color: #fff;
        font-size: 20px;
        font-weight: bold;
        border-radius: 5px;
        margin: 10px 0px;
        display: inline-block;
    }
    #onHoldTour {
        background: #FCA311;
        padding: 10px 30px;
        color: #fff;
        font-size: 20px;
        font-weight: bold;
        border-radius: 5px;
        margin: 10px 0px;
        display: inline-block;
    }
    
    .carousel-indicators li {
        width: 25px;
        height: 25px;
        /* border-radius: 50%; */
        text-indent: 0;
        text-align: center;
        color: #000;
        font-weight: 600;
        font-size: 16px;
        margin: 0;
        background: #fff;
    }
    .carousel-indicators li:first-child {
        border-radius: 15px 0px 0px 15px;
        padding-left: 10px;
    }
    .carousel-indicators li:last-child{
        border-radius: 0px 15px 15px 0px;
        padding-right: 10px;
    }
    .carousel-indicators .active {
        text-decoration: underline;
    }
    .carousel-control-prev, .carousel-control-next {
        position: absolute;
        display: flex;
        align-items: center;
        justify-content: center;
        width: auto;
        color: #ffffff;
        text-align: center;
        opacity: 1;
        background: orange;
        border-radius: 50%;
        padding: 5px;
        bottom: 41%;
        top: auto;
        margin: 5px;
    }
</style>
<form method="post" class="addToCartForms" id="addToCartForm2">
    <div class="cart_popup" style="margin: 0;padding: 50px;max-width: none;">
        {{ csrf_field() }}
        <div class="popup_heading">
            Add to cart
        </div>
        <div class="location">
            {{ $items[0]['experience_date']["experience"]["name"] }}
        </div>
        <div class="heading">
            Choose your hotel and date
        </div>
        <?php
        $image_url = getenv('IMAGE_URL');
        $data = array();
        foreach ($items as $key => $value) {
            $data[$value['experience_date']['dates_rates_id']][] = $value;   
        }
        $notfound = '';
        if(!empty($data)){
            
            // Instantiate the Guzzle client
            $client = new GuzzleHttp\Client();
            foreach ($data as $dates_rates_id => $value) {

                $updateurl = getenv('IMAGE_URL').'api/get_dates_dates'; 
              $response = $client->request('post', $updateurl, [
                'form_params' => [
                    'dates_rates_id' => $dates_rates_id
                ],
                'auth' => ['Tours-user', 'L3tM3L00kd']
            ]);
            $update_exp = json_decode($response->getBody()->getContents(), true);

            $dates_rates = array();
            $cart_experiences = array();
            $cart_experiences2 = array();
            $cart_experiences3 = array();
            if(!empty($update_exp['status']))
            {
                 $dates_rates = (object)$update_exp['dates_rates'];
                 $cart_experiences = $update_exp['cart_experiences'];
                 $cart_experiences2 = $update_exp['cart_experiences2'];
                 $cart_experiences3 = $update_exp['cart_experiences3'];
                 
            } 
                /*$dates_rates = 


DB::connection('mysql_veenus')->table('experience_dates_rates')->where('id', $dates_rates_id)->first();*/

                $hotels = array();
                $hotel_images = array();
                $mark_as_completed = array();
                foreach ($value as $k => $val) {
                    $hotels[] = $val['hotel']['name'];   
                    $hotel_images[] = $val['hotel']['hotel_images'];   
                    $type_id = $val['experience_date']['type_id'];   
                    $mark_as_completed[] = $val['experience_date']['mark_as_completed'];   
                }
                $selected = '';
                $button_selected = '';
                if(!empty($exp_dates_rates_id) && $exp_dates_rates_id == $dates_rates_id){
                    $selected = 'selected';
                    $button_selected = 'button_selected';
                }
                
                $e_dates = array();
                if(!empty($experienceDate)){
                    foreach ($experienceDate as $key => $value) {
                        if($dates_rates_id == $value['dates_rates_id']){
                            $e_dates['date_from'][] = strtotime($value['date_from']);
                            $e_dates['date_to'][] = strtotime($value['date_to']);
                            $e_dates['date'][] = $value;
                        }
                    }
                }
                $_dateMin = min($e_dates['date_from']);
                $_dateMax = max($e_dates['date_to']);
                $diff = $_dateMax - $_dateMin; 
                $nights = round($diff / 86400);
                /*$cart_experiences = 


DB::connection('mysql_veenus')->table('cart_experiences')->where('dates_rates_id', $dates_rates_id)->where('experiences_id', $dates_rates->experience_id)->where('date_from', date('Y-m-d',$_dateMin))->where('date_to', date('Y-m-d',$_dateMax))->where('deleted_at',null)->first();
                $cart_experiences2 = 


DB::connection('mysql_veenus')->table('cart_experiences')->where('dates_rates_id', $dates_rates_id)->where('experiences_id', $dates_rates->experience_id)->where('date_from', date('Y-m-d',$_dateMin))->where('date_to', date('Y-m-d',$_dateMax))->where('deleted_at',null)->where('full_cancel', 0)->first();
                $cart_experiences3 = 


DB::connection('mysql_veenus')->table('cart_experiences')->where('dates_rates_id', $dates_rates_id)->where('experiences_id', $dates_rates->experience_id)->where('date_from', date('Y-m-d',$_dateMin))->where('date_to', date('Y-m-d',$_dateMax))->where('deleted_at',null)->where('full_cancel', 1)->first();*/
                if((!in_array(0,$mark_as_completed) && ($dates_rates->mark_as_completed_etc == 1) && empty($cart_experiences)) || empty($cart_experiences2) && !empty($cart_experiences3)){
                $notfound = 'no';    
            ?>
            <div class="options_list">
                <?php
                if(count($hotels) == 1){
                    if($type_id == 1){
                        ?>
                            <div class="options_heading">
                                Our choice (This hotel is included in the price)
                            </div>
                        <?php  
                    }else{
                        ?>
                            <div class="options_heading">
                                Upgrade option
                            </div>
                        <?php
                    } 
                }else{ ?>
                            <div class="options_heading">
                                Our choice (This hotel is included in the price)
                            </div>
                        <?php
                } ?>
                <div class="options">
                      <?php
                                    //pr($dates_rates);
                                    if(!empty($selected))
                                    {
                                        if(!empty($dates_rates->currency) && $dates_rates->currency == 3)
                                        {
                                            if($currency == 1)
                                            {
                                                $rate = $dates_rates->rate;
                                                $srs = $dates_rates->srs;
                                                $currency_symbol = '£';

                                            }
                                            else
                                            {
                                                $rate = $dates_rates->rate_euro;
                                                $srs = $dates_rates->srs_euro;
                                                $currency_symbol = '€';
                                            }
                                            $selected_currency =$currency;
                                        }
                                        else
                                        {
                                            $selected_currency =$dates_rates->currency;
                                            $rate = (!empty($dates_rates->currency) && $dates_rates->currency == 2?$dates_rates->rate_euro:$dates_rates->rate);
                                             $srs = (!empty($dates_rates->currency) && $dates_rates->currency == 2?$dates_rates->srs_euro:$dates_rates->srs);
                                              $currency_symbol = (!empty($dates_rates->currency) && $dates_rates->currency == 2)?'€':'£';
                                        }
                                        
                                    }
                                    else
                                    {
                                         $rate = (!empty($dates_rates->currency) && $dates_rates->currency == 2?$dates_rates->rate_euro:$dates_rates->rate);
                                         $srs = (!empty($dates_rates->currency) && $dates_rates->currency == 2?$dates_rates->srs_euro:$dates_rates->srs);
                                         $selected_currency =(!empty($dates_rates->currency) && $dates_rates->currency == 2)?'2':'1';
                                        $currency_symbol = (!empty($dates_rates->currency) && $dates_rates->currency == 2)?'€':'£';
                                    
                                    }
                                   ?>
                    <div class="option <?php echo $selected; ?>" data-id="<?php echo $dates_rates_id; ?>" data-rate="<?php echo $rate; ?>" data-currency="{{$selected_currency}}" data-srs="<?php echo $srs; ?>">
                        <?php if(!empty($hotel_images[0])){ ?>
                        <div id="carouselExampleIndicators<?php echo $dates_rates_id; ?>" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators  carousel-indicators-numbers">
                                <?php if(!empty($hotel_images)){
                                $i = 1;
                                foreach ($hotel_images as $key => $value) {
                                    $active = '';
                                    if($i == 1){
                                        $active = 'active';
                                    }
                                    ?>
                                    <li data-target="#carouselExampleIndicators<?php echo $dates_rates_id; ?>" data-slide-to="<?php echo $i; ?>" class=" <?php echo $active; ?>"><?php echo $i; ?></li>
                                    
                                    <?php
                                    $i++;
                                }
                            } ?>
                              </ol>
                          <div class="carousel-inner">
                            <?php if(!empty($hotel_images)){
                                $i = 0;
                                foreach ($hotel_images as $key => $value) {
                                    if(!empty($value)){
                                        
                                    $active = '';
                                    if($i == 0){
                                        $active = 'active';
                                    }
                                    ?>
                                    <div class="carousel-item <?php echo $active; ?>">
                                        <img class="image" src="{{ $image_url.'storage/'.$value[0]['file'] }}" alt="<?php echo $value[0]['name']; ?>">
                                    </div>
                                    <?php
                                    $i++;
                                    }
                                }
                            } ?>
                          </div>
                          <a class="carousel-control-prev" href="#carouselExampleIndicators<?php echo $dates_rates_id; ?>" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                          </a>
                          <a class="carousel-control-next" href="#carouselExampleIndicators<?php echo $dates_rates_id; ?>" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                          </a>
                        </div>
                        <?php } ?>

                        <div class="text clickDiv">

                            <div class="option_name large">
                                <?php echo implode(', ', $hotels); ?>
                            </div>

                            <!-- <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div> -->
    
                            <div class="dates_list">

                                <div class="dates_heading">
                                    Select one or more date(s):
                                </div>

                                <div class="dates">
                                    
                                    <a class="date <?php echo $button_selected; ?>" href="javascript:;">
                                        <?php echo date('D d M Y', $_dateMin).' - '.date('D d M Y', $_dateMax); ?>
                                    </a> 
                                     
                                </div>

                            </div>

                            <div class="additional_cost__cta">

                                <div class="additional_cost">
                                    <div class="label">Additional Cost:</div>
                                  
                                    <div class="price">{{!empty($selected)?$currency_symbol:(!empty($dates_rates->currency) && $dates_rates->currency == 2?'€':'£')}}{{$rate}} pp / {{!empty($selected)?$currency_symbol:(!empty($dates_rates->currency) && $dates_rates->currency == 2?'€':'£')}}{{$srs}}ss</div>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>
            <?php    
                }
            }
        }
        if($notfound == 'no'){
        ?>
        <div class="warning" id="error1">Please select a hotel for the experience.</div>
        <div class="addcartdiv">
            <input type="hidden" name="collaborator_id" id="collaborator_id" value="{{ $collaborator_id }}">
            <input type="hidden" name="currency" id="currency" value="{{ $currency }}">
            <input type="hidden" name="dates_rates_id" id="dates_rates_id" value="">
            <input type="hidden" name="basePrice" id="basePrice" value="0">
            <input type="hidden" name="basePriceSS" id="basePriceSS" value="0">
             <input type="hidden" name="hold_tour_days" id="hold_tour_days" value="">
             <input type="hidden" name="club_name" id="club_name" value="{{ !empty($club_name)?$club_name:'' }}">
             <input type="hidden" name="created_by" id="created_by" value="{{ !empty($created_by)?$created_by:'' }}">
            <a href="javascript:void(0);" class="add_cta" id="addToCartForm2Submit">
                Add to cart
            </a>
            <?php if (Auth::check() && !Auth::user()->hasRole("Collaborator")){ ?>
            <a href="javascript:void(0);" class="add_cta" id="onHold">
                Put booking on hold
            </a>
            <?php } ?>
        </div>
        <?php }else{ echo 'No dates found!'; } ?>
    </div>
</form>
  <div class="modal fade bd-example-modal-lg" id="holdToutModal" tabindex="-1" role="dialog" aria-labelledby="addFolderModalTitle" aria-hidden="true" style="overflow-y: auto;">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 500px;">
        <div class="modal-content holdToutModalAppendCls"> 
             <div class="modal-header">
                    <h4 class="modal-title">Number of days to hold</h4>
                    <button type="button" class="close" data-dismiss="modal" id="buttonCloseEventClient">×</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                
                                <input class="form-control" type="text" name="hold_days" id="hold_days">
                                <span id="text_error" style="display:none;color: red;">Pease enter number of days to hold</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                   <a href="javascript:void(0);" class="add_cta" id="onHoldTour">
                                Put booking on hold
                        </a>
                </div>
            <!-- <div class="container p-5">
                <h3>Number of days to hold</h3>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            
                            <input class="form-control" type="text" name="hold_days" id="hold_days">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <a href="javascript:void(0);" class="add_cta" id="onHoldTour">
                                Put booking on hold
                        </a>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</div>
<script type="text/javascript">
    $('#onHold').on('click', function(){
        $('#holdToutModal').modal('show');
    });
     $('#onHoldTour').on('click', function(){

        var days = $('#hold_days').val();
        
        if(days != '')
        {
            $('#text_error').hide();
            $('#hold_tour_days').val(days);
            $('#holdToutModal').modal('hide');
            $('#addToCartForm2Submit').trigger('click');
        }
        else
        {
            $('#text_error').show();
        }
        
    });
    $('.clickDiv').on('click', function(){
        $(this).closest('.option').toggleClass('selected');
        $(this).children().children().children('.date').toggleClass('button_selected');
    });
    $('.dates').on('click', function(){
         $(this).removeClass('button_selected');
        $(this).closest('.date').addClass('button_selected');
    });
</script>