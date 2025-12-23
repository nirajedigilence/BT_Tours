<!doctype html>
  <html lang="en">
  <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
      <meta name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title></title>
  </head>
  <body>
    <script type="text/php">
        if (isset($pdf)) {
            $x = 500;
            $y = 810;
            $text = "Page {PAGE_NUM} of {PAGE_COUNT}";
            $font = null;
            $size = 9;
            $color = array(0,0,0);
            $word_space = 0.0;  //  default
            $char_space = 0.0;  //  default
            $angle = 0.0;   //  default
            $pdf->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
        }
        if (isset($pdf)) {
            $x = 40;
            $y = 810;
            $text = date('d-m-Y, H:i');
            $font = null;
            $size = 9;
            $color = array(0,0,0);
            $word_space = 0.0;  //  default
            $char_space = 0.0;  //  default
            $angle = 0.0;   //  default
            $pdf->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
        }
    </script>

      <style>
    /** { font-family: DejaVu Sans, sans-serif; }
    body{
      font-family: cerapro, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
      font-size: 12px;
    }*/
    .center{
        text-align: center;
    }
    .right{
        text-align: right;
    }
    .left{
        text-align: left;
    }
    .page-break {
        page-break-before: always;
    }
    span.new_exp {
        background-color: #ffe6b3;
    }
    table.unit td {border: 1px soild #ccc;padding: 5px;}
    table td { text-align: left;vertical-align: top;}
    ul li { list-style : none !important; }
    .header,
.footer {
    width: 100%;
    text-align: left;
    position: fixed;
}
.header {
    top: -20px;
}
.footer {
    top: -20px;
}
</style>
<br>

            <!-- START OF HEADER -->
             <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
  <tr>
    <td>
            <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
              <tr>

                  <td width="80" align="left" valign="top" style="padding-bottom: 40px;">
                    <!-- <div class="header">
                <p style="font-family: 'Montserrat', sans-serif; font-size: 12px;"><?=date('d-m-Y, H:i')?></p>
            </div> -->
                    <img src="{{ public_path('images/logo2x.png') }}" alt="" style="width: 90px; height: 100px;">

        <!-- <img src="{{ asset('images/logo2x.png') }}" alt="Veenus"> -->
        
    </td>
    <?php
    if(!empty($cartid))
    {
        $cart_experience = 


DB::connection('mysql_veenus')->table('cart_experiences')->select("*")->where("id", $cartid)->first(); 
        $currency_symbol = getCurrencySymbol($cart_experience->currency);
    }
    else
    {
        
        $currency_symbol = getCurrencySymbol($dates_rates->currency);
    }
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
  
  <td align="center" valign="top" style="padding-bottom: 40px;">

      <table width="50%" align="center" cellpadding="0" cellspacing="0" border="0">

          <tr>
              <td align="center" style="font-family: 'Montserrat', sans-serif; font-size: 20px; font-weight: 700; color: #14213D; line-height: 25px; text-align: center; padding-bottom: 5px;">
                  <?php echo 'TOUR DETAIL'; ?>
              </td>
          </tr>

          <tr>
              <td align="center" style="font-family: 'Montserrat', sans-serif; font-size: 16px; font-weight: 400; color: #526170 ; line-height: 30px; text-align: center; padding-bottom: 5px;">
                  <?php echo $experience->name; ?>
              </td>
          </tr>

          <tr>
              <td align="center" style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; color: #526170; line-height: 18px; text-align: center; padding-bottom: 5px;">
                  {{ date('D d M', $_dateMin) }} - {{ date("D d M 'y", $_dateMax) }} ({{$nights}} nights)
              </td>
          </tr>

          <tr>
              <td align="center" style="font-family: 'Montserrat', sans-serif; font-size: 17px; font-weight: 650; color: #14213D; line-height: 18px; text-align: center;">
                  <?php echo (!empty($hotel[0]) && (count($hotel) == 1) ? $hotel[0]->name : ''); ?>
              </td>
          </tr>

      </table>

  </td>

  <!-- <td width="20" align="right" valign="top"></td> -->

</tr>
</table>
</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
</tr>
</table>
            <!-- END OF HEADER -->

            <!-- START OF FULL WIDTH SECTION -->
            <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                <tr>
                    <td style="padding-bottom: 20px;">

                        <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                            <tr>

                                <td bgcolor="#FFFFFF" style="background-color: #FFFFFF; border: solid 1px #CFCFCF; -moz-box-shadow: 0px 3px 6px #00000029; -webkit-box-shadow: 0px 3px 6px #00000029; box-shadow: 0px 3px 6px #00000029;">

                                    <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">

                                        <tr>
                                            <td bgcolor="#F2F2F2" style="font-family: 'Montserrat', sans-serif;background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 14px; font-weight: 700; line-height: 18px; text-align: left; color: #14213D; padding: 5px 15px;">
                                                Ref
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="font-family: 'Montserrat', sans-serif; font-size: 14px;  line-height: 18px; text-align: left; color: #14213D; padding: 15px 10px;">
                                                {{ $dates_rates->tp_ref_number }}
                                            </td>
                                        </tr>

                                    </table>

                                </td>

                            </tr>
                        </table>                                

                    </td>
                </tr>
            </table>
            <!-- END OF FULL WIDTH SECTION -->
             <!-- START OF FULL WIDTH SECTION -->
            <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                <tr>
                    <td style="padding-bottom: 20px;">

                        <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                            <tr>

                                <td bgcolor="#FFFFFF" style="background-color: #FFFFFF; border: solid 1px #CFCFCF; -moz-box-shadow: 0px 3px 6px #00000029; -webkit-box-shadow: 0px 3px 6px #00000029; box-shadow: 0px 3px 6px #00000029;">

                                    <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">

                                        <tr>
                                            <td bgcolor="#F2F2F2" style="font-family: 'Montserrat', sans-serif;background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 14px; font-weight: 700; line-height: 18px; text-align: left; color: #14213D; padding: 5px 15px;">
                                                Hotel Details
                                            </td>
                                        </tr>
                                        <?php
                                        if(!empty($hotel)){
                                            foreach ($hotel as $key => $value) {
                                        ?>
                                         <tr>
                                            <td style="font-family: 'Montserrat', sans-serif; font-size: 14px;  line-height: 18px; text-align: left; color: #14213D; padding: 15px 10px;">
                                                 <ul>
                                                    <li>Hotel Name: <strong><?php echo (!empty($value) ? $value->name : ''); ?></strong></li>
                                                    <li>Hotel Address: <strong><?php
                                                    $address = array();
                                                    if(!empty($value->street)){
                                                        $address[] = $value->street;
                                                    } 
                                                    if(!empty($value->city)){
                                                        $address[] = $value->city;
                                                    } 
                                                    if(!empty($value->country)){
                                                        $address[] = $value->country;
                                                    } 
                                                    if(!empty($value->postcode)){
                                                        $address[] = $value->postcode;
                                                    } 
                                                    echo implode(', ', $address); ?></strong></li>
                                                    <li>Contact number: <strong><?php echo (!empty($value) ? $value->phone : ''); ?></strong></li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <?php
                                        }
                                        }
                                        ?>
                                    </table>

                                </td>

                            </tr>
                        </table>                                

                    </td>
                </tr>
            </table>
            <!-- END OF FULL WIDTH SECTION -->
           
             <!-- START OF FULL WIDTH SECTION -->
            <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                <tr>
                    <td style="padding-bottom: 20px;">

                        <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                            <tr>

                                <td bgcolor="#FFFFFF" style="background-color: #FFFFFF; border: solid 1px #CFCFCF; -moz-box-shadow: 0px 3px 6px #00000029; -webkit-box-shadow: 0px 3px 6px #00000029; box-shadow: 0px 3px 6px #00000029;">

                                    <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">

                                        <tr>
                                            <td bgcolor="#F2F2F2" style="font-family: 'Montserrat', sans-serif;background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 14px; font-weight: 700; line-height: 18px; text-align: left; color: #14213D; padding: 5px 15px;">
                                                No. of Guests
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="font-family: 'Montserrat', sans-serif; font-size: 14px;  line-height: 18px; text-align: left; color: #14213D ; padding: 15px 10px;"> <?php
                                            $rooms_ppl = 0;
                                            $rooms_sold = 0;
                                            if(!empty($cartExperiencesToRooms[0]))
                                            {
                                                foreach ($cartExperiencesToRooms as $key => $value) {
                                                    if($value->paid == 1 || $value->deposit == 1){
                                                        $rooms_sold = $rooms_sold+1;
                                                        if(!empty($value->names)){
                                                            $names = array_filter(explode(',', $value->names));
                                                            $rooms_ppl  = $rooms_ppl+count($names);
                                                        }
                                                    }
                                                }
                                            }
                                            $total_pax = get_total_pax($cart_experience->id);
                                            ?>
                                            <p>
                                                <strong>{{$total_pax}} 
                                                <?php echo ($cart_experience->driver == 1) ? 'plus 1 Dr' : ''; ?>
                                                <?php echo ($cart_experience->driver == 2) ? 'plus 2 Dr & Cr' : ''; ?></strong> (see rooming list for details, special and dietary requests)
                                            </p>
                                            {!! !empty($cart_experience->addtional_text) ?$cart_experience->addtional_text : '' !!}
                                            </td>
                                        </tr>

                                    </table>

                                </td>

                            </tr>
                        </table>                                

                    </td>
                </tr>
            </table>
            <!-- END OF FULL WIDTH SECTION -->
            <!-- START OF FULL WIDTH SECTION -->
            <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                <tr>
                    <td style="padding-bottom: 20px;">

                        <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                            <tr>

                                <td bgcolor="#FFFFFF" style="background-color: #FFFFFF; border: solid 1px #CFCFCF; -moz-box-shadow: 0px 3px 6px #00000029; -webkit-box-shadow: 0px 3px 6px #00000029; box-shadow: 0px 3px 6px #00000029;">

                                    <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">

                                        <tr>
                                            <td bgcolor="#F2F2F2" style="font-family: 'Montserrat', sans-serif;background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 14px; font-weight: 700; line-height: 18px; text-align: left; color: #14213D; padding: 5px 15px;">
                                                Arrival
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="font-family: 'Montserrat', sans-serif; font-size: 14px;  line-height: 18px; text-align: left; color: #14213D ; padding: 15px 10px;">
                                                
                                                <?php if(!empty($hotelAmemdment->hotel_sign)) {?>
                                                   {!! !empty($hotelAmemdment->tds_eta) ?$hotelAmemdment->tds_eta : nl2br($dates_rates->tp_eta) !!}
                                                   
                                                   {!! !empty($hotelAmemdment->hotel_eta) ? '<br/><span class="marker">'.nl2br($hotelAmemdment->hotel_eta).'</span>' : '' !!}
                                                <?php }else{ ?> 
                                                    {!! !empty($hotelAmemdment->tds_eta) ?$hotelAmemdment->tds_eta : nl2br($dates_rates->tp_eta) !!}
                                                <?php } ?>

                                            </td>
                                        </tr>

                                    </table>

                                </td>

                            </tr>
                        </table>                                

                    </td>
                </tr>
            </table>
            <!-- END OF FULL WIDTH SECTION -->

            <!-- START OF FULL WIDTH SECTION -->
            <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                <tr>
                    <td style="padding-bottom: 20px;">

                        <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                            <tr>

                                <td bgcolor="#FFFFFF" style="background-color: #FFFFFF; border: solid 1px #CFCFCF; -moz-box-shadow: 0px 3px 6px #00000029; -webkit-box-shadow: 0px 3px 6px #00000029; box-shadow: 0px 3px 6px #00000029;">

                                    <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">

                                        <tr>
                                            <td bgcolor="#F2F2F2" style="font-family: 'Montserrat', sans-serif;background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 14px; font-weight: 700; line-height: 18px; text-align: left; color: #14213D; padding: 5px 15px;">
                                                Departure
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="font-family: 'Montserrat', sans-serif; font-size: 14px;  line-height: 18px; text-align: left; color: #14213D ; padding: 15px 10px;">
                                                
                                                <?php if(!empty($hotelAmemdment->hotel_sign)) {?>
                                                   {!! !empty($hotelAmemdment->tds_etd) ?$hotelAmemdment->tds_etd : nl2br($dates_rates->tp_etd) !!}
                                                  
                                                   {!! !empty($hotelAmemdment->hotel_etd) ? '<br/><span class="marker">'.nl2br($hotelAmemdment->hotel_etd).'</span>' : '' !!}
                                                <?php }else{ ?> 
                                                    {!! !empty($hotelAmemdment->tds_etd) ?$hotelAmemdment->tds_etd : nl2br($dates_rates->tp_etd) !!}
                                                <?php } ?>

                                            </td>
                                        </tr>

                                    </table>

                                </td>

                            </tr>
                        </table>                                

                    </td>
                </tr>
            </table>
            <!-- END OF FULL WIDTH SECTION -->

           <?php if(!empty($hotelAmemdment->tds_mean_arrangements)){ ?> 
            <!-- START OF FULL WIDTH SECTION -->
            <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                <tr>
                    <td style="padding-bottom: 20px;">

                        <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                            <tr>

                                <td bgcolor="#FFFFFF" style="background-color: #FFFFFF; border: solid 1px #CFCFCF; -moz-box-shadow: 0px 3px 6px #00000029; -webkit-box-shadow: 0px 3px 6px #00000029; box-shadow: 0px 3px 6px #00000029;">

                                    <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">

                                        <tr>
                                            <td bgcolor="#F2F2F2" style="font-family: 'Montserrat', sans-serif;background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 14px; font-weight: 700; line-height: 18px; text-align: left; color: #14213D; padding: 5px 15px;">
                                                Meal Arrangements
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="font-family: 'Montserrat', sans-serif; font-size: 14px;  line-height: 18px; text-align: left; color: #14213D ; padding: 15px 10px;">
                                                
                                                <?php if(!empty($hotelAmemdment->hotel_sign)) {?>
                                                   {!! !empty($hotelAmemdment->tds_mean_arrangements) ?$hotelAmemdment->tds_mean_arrangements : nl2br($dates_rates->etc_meal_arrangements) !!}
                                                   
                                                   {!! !empty($hotelAmemdment->hotel_mean_arrangements) ? '<br/><span class="marker">'.nl2br($hotelAmemdment->hotel_mean_arrangements).'</span>' : '' !!}
                                                <?php }else{ ?> 
                                                    {!! !empty($hotelAmemdment->tds_mean_arrangements) ?$hotelAmemdment->tds_mean_arrangements : nl2br($dates_rates->etc_meal_arrangements) !!}
                                                <?php } ?>

                                            </td>
                                        </tr>

                                    </table>

                                </td>

                            </tr>
                        </table>                                

                    </td>
                </tr>
            </table>
            <!-- END OF FULL WIDTH SECTION -->
           <?php } ?>
           
            <!-- START OF FULL WIDTH SECTION -->
            <?php if(!empty($hotelAmemdment->tds_tour_inclusions)){ ?> 
             <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                <tr>
                    <td style="padding-bottom: 20px;">

                        <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                            <tr>

                                <td bgcolor="#FFFFFF" style="background-color: #FFFFFF; border: solid 1px #CFCFCF; -moz-box-shadow: 0px 3px 6px #00000029; -webkit-box-shadow: 0px 3px 6px #00000029; box-shadow: 0px 3px 6px #00000029;">

                                    <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">

                                        <tr>
                                            <td bgcolor="#F2F2F2" style="font-family: 'Montserrat', sans-serif;background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 14px; font-weight: 700; line-height: 18px; text-align: left; color: #14213D; padding: 5px 15px;">
                                                Inclusions
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="font-family: 'Montserrat', sans-serif; font-size: 14px;  line-height: 18px; text-align: left; color: #14213D ; padding: 15px 10px;">
                                                <?php if(!empty($hotelAmemdment->hotel_sign)) {?>
                                                   {!! !empty($hotelAmemdment->tds_tour_inclusions) ?$hotelAmemdment->tds_tour_inclusions : nl2br($dates_rates->tp_tour_inclusions) !!}
                                                   
                                                   {!! !empty($hotelAmemdment->hotel_tour_inclusions) ? '<br/><span class="marker">'.nl2br($hotelAmemdment->hotel_tour_inclusions).'</span>' : '' !!}
                                                <?php }else{ ?> 
                                                   {!! !empty($hotelAmemdment->tds_tour_inclusions) ?$hotelAmemdment->tds_tour_inclusions : $hotelAmemdment->tds_tour_inclusions !!}
                                                <?php } ?>
                                            </td>
                                        </tr>

                                    </table>

                                </td>

                            </tr>
                        </table>                                

                    </td>
                </tr>
            </table> 
            <?php } ?>
            <!-- END OF FULL WIDTH SECTION -->
             <!-- START OF FULL WIDTH SECTION -->
             <?php if(!empty($hotelAmemdment->tds_services_facilities)){ ?> 
             <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                <tr>
                    <td style="padding-bottom: 20px;">

                        <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                            <tr>

                                <td bgcolor="#FFFFFF" style="background-color: #FFFFFF; border: solid 1px #CFCFCF; -moz-box-shadow: 0px 3px 6px #00000029; -webkit-box-shadow: 0px 3px 6px #00000029; box-shadow: 0px 3px 6px #00000029;">

                                    <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">

                                        <tr>
                                            <td bgcolor="#F2F2F2" style="font-family: 'Montserrat', sans-serif;background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 14px; font-weight: 700; line-height: 18px; text-align: left; color: #14213D; padding: 5px 15px;">
                                                Service and facilities
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="font-family: 'Montserrat', sans-serif; font-size: 14px;  line-height: 18px; text-align: left; color: #14213D ; padding: 15px 10px;">
                                                <?php if(!empty($hotelAmemdment->hotel_sign)) {?>
                                                   {!! !empty($hotelAmemdment->tds_services_facilities) ?$hotelAmemdment->tds_services_facilities : $hotelAmemdment->tds_services_facilities !!}
                                                   
                                                   {!! !empty($hotelAmemdment->hotel_services_facilities) ? '<br/><span class="marker">'.nl2br($hotelAmemdment->hotel_services_facilities).'</span>' : '' !!}
                                                <?php }else{ ?> 
                                                   {!! !empty($hotelAmemdment->tds_services_facilities) ?$hotelAmemdment->tds_services_facilities :$hotelAmemdment->tds_services_facilities!!}
                                                <?php } ?>
                                            </td>
                                        </tr>

                                    </table>

                                </td>

                            </tr>
                        </table>                                

                    </td>
                </tr>
            </table> 
            <?php } ?>
            <!-- END OF FULL WIDTH SECTION -->
             <!-- START OF FULL WIDTH SECTION -->
             <?php if(!empty($hotelAmemdment->tds_house_keeping)){ ?> 
            <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                <tr>
                    <td style="padding-bottom: 20px;">

                        <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                            <tr>

                                <td bgcolor="#FFFFFF" style="background-color: #FFFFFF; border: solid 1px #CFCFCF; -moz-box-shadow: 0px 3px 6px #00000029; -webkit-box-shadow: 0px 3px 6px #00000029; box-shadow: 0px 3px 6px #00000029;">

                                    <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">

                                        <tr>
                                            <td bgcolor="#F2F2F2" style="font-family: 'Montserrat', sans-serif;background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 14px; font-weight: 700; line-height: 18px; text-align: left; color: #14213D; padding: 5px 15px;">
                                                Housekeeping
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="font-family: 'Montserrat', sans-serif; font-size: 14px;  line-height: 18px; text-align: left; color: #14213D ; padding: 15px 10px;">
                                                
                                               <?php if(!empty($hotelAmemdment->hotel_sign)) {?>
                                                   {!! !empty($hotelAmemdment->tds_house_keeping) ?$hotelAmemdment->tds_house_keeping : nl2br($dates_rates->tds_house_keeping) !!}
                                                   
                                                   {!! !empty($hotelAmemdment->hotel_house_keeping) ? '<br/><span class="marker">'.nl2br($hotelAmemdment->hotel_house_keeping).'</span>' : '' !!}
                                                <?php }else{ ?> 
                                                   {!! !empty($hotelAmemdment->tds_house_keeping) ?$hotelAmemdment->tds_house_keeping : nl2br($dates_rates->tds_house_keeping) !!}
                                                <?php } ?>

                                            </td>
                                        </tr>

                                    </table>

                                </td>

                            </tr>
                        </table>                                

                    </td>
                </tr>
            </table>
            <?php } ?>
            <!-- END OF FULL WIDTH SECTION -->
            <?php if(!empty($hotelAmemdment->tds_important_information)){ ?> 
            <!-- START OF FULL WIDTH SECTION -->
            <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                <tr>
                    <td style="padding-bottom: 20px;">

                        <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                            <tr>

                                <td bgcolor="#FFFFFF" style="background-color: #FFFFFF; border: solid 1px #CFCFCF; -moz-box-shadow: 0px 3px 6px #00000029; -webkit-box-shadow: 0px 3px 6px #00000029; box-shadow: 0px 3px 6px #00000029;">

                                    <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">

                                        <tr>
                                            <td bgcolor="#F2F2F2" style="font-family: 'Montserrat', sans-serif;background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 14px; font-weight: 700; line-height: 18px; text-align: left; color: #14213D; padding: 5px 15px;">
                                                Important Information
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="font-family: 'Montserrat', sans-serif; font-size: 14px;  line-height: 18px; text-align: left; color: #14213D ; padding: 15px 10px;">
                                                
                                              <?php if(!empty($hotelAmemdment->hotel_sign)) {?>
                                                   {!! !empty($hotelAmemdment->tds_important_information) ?$hotelAmemdment->tds_important_information : nl2br($dates_rates->tds_important_information) !!}
                                                   {!! !empty($hotelAmemdment->hotel_important_information) ? '<br/><span class="marker">'.nl2br($hotelAmemdment->hotel_important_information).'</span>' : '' !!}
                                                <?php }else{ ?> 
                                                   {!! !empty($hotelAmemdment->tds_important_information) ?$hotelAmemdment->tds_important_information : nl2br($dates_rates->tds_important_information) !!}
                                                <?php } ?>

                                            </td>
                                        </tr>

                                    </table>

                                </td>

                            </tr>
                        </table>                                

                    </td>
                </tr>
            </table>
            <?php } ?>
             <?php if(isset($hotelAmemdment->hotel_sign) && !empty($hotelAmemdment->hotel_sign)){ ?>
             <p>I have reviewed and agree with the above tour details.</p>
            <!-- END OF FULL WIDTH SECTION -->
            <!-- START OF SIGNATURES -->
                            <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                               
                                <tr>

                                   

                                    <td width="50%" align="left" valign="middle">

                                        <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                                           
                                                <tr>
                                                    <td style="font-family: 'Calibri', serif; font-size: 50px; font-weight: 400; font-style: italic; line-height: 5px; text-align: left; color: #CFCFCF; padding-bottom: 1px;padding-top: 25px;">
                                                        <?php echo $hotelAmemdment->hotel_sign; ?>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td style="font-family: 'Calibri', sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; text-align: left; color: #14213D;">
                                                        <p>Hotel<br/>({{date('d/m/Y',strtotime($hotelAmemdment->hotel_sign_date))}})</p>
                                                        
                                                    </td>
                                                </tr>
                                            
                                            

                                        </table>

                                    </td>

                                </tr>
                            </table>
                            <!-- END OF SIGNATURES -->

       <?php } ?>