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
                  {{ date('d M Y', $_dateMin) }} - {{ date('d M Y', $_dateMax) }} ({{$nights}} nights)
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
                                             <td style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 650; line-height: 20px; text-align: left; color: #14213D; padding-bottom: 10px;">
                                                
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
                                                 <!-- START OF SPLIT SECTION -->
                                                <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                                                    <tr>
                                                        <td style="padding-bottom: 20px;">

                                                            <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                                                                <tr>

                                                                    <td align="left" valign="top" width="50%" style="padding-right: 10px;">

                                                                        <table width="100%" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" border="0" style="background-color: #FFFFFF; border: solid 1px #CFCFCF; -moz-box-shadow: 0px 3px 6px #00000029; -webkit-box-shadow: 0px 3px 6px #00000029; box-shadow: 0px 3px 6px #00000029;">

                                                                            <tr>
                                                                                <td bgcolor="#F2F2F2" style="font-family: 'Montserrat', sans-serif;background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 14px; font-weight: 700; line-height: 18px; text-align: left; color: #14213D; padding: 5px 15px;">
                                                                                    Parking
                                                                                </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <td style="font-family: 'Montserrat', sans-serif; font-size: 14px;  line-height: 18px; text-align: left; color: #14213D; padding: 15px 10px;">
                                                                                    <?php $parking_amenity =  (!empty($cart_experience->parking_amenity) ? $cart_experience->parking_amenity : (!empty($value->exToHotel->parking_amenity)?$value->exToHotel->parking_amenity:'Not available!')); echo $parking_amenity;?>
                                                                                </td>
                                                                            </tr>

                                                                        </table>

                                                                    </td>

                                                                    <td align="right" valign="top" width="50%" style="padding-left: 10px;">

                                                                        <table width="100%" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" border="0" style="background-color: #FFFFFF; border: solid 1px #CFCFCF; -moz-box-shadow: 0px 3px 6px #00000029; -webkit-box-shadow: 0px 3px 6px #00000029; box-shadow: 0px 3px 6px #00000029;">

                                                                            <tr>
                                                                                <td bgcolor="#F2F2F2" style="font-family: 'Montserrat', sans-serif;background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 14px; font-weight: 700; line-height: 18px; text-align: left; color: #14213D; padding: 5px 15px;">
                                                                                    Porterage
                                                                                </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <td style="font-family: 'Montserrat', sans-serif; font-size: 14px;  line-height: 18px; text-align: left; color: #14213D; padding: 15px 10px;">
                                                                                    <?php $porterage_amenity =  (!empty($cart_experience->porterage_amenity) ? $cart_experience->porterage_amenity : (!empty($value->exToHotel->porterage_amenity)?$value->exToHotel->porterage_amenity:'Not available!')); echo $porterage_amenity;?>
                                                                                </td>
                                                                            </tr>

                                                                        </table>

                                                                    </td>

                                                                </tr>
                                                            </table>                                

                                                        </td>
                                                    </tr>
                                                </table>
                                                <!-- END OF SPLIT SECTION -->
                                                <!-- START OF SPLIT SECTION -->
                                                <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                                                    <tr>
                                                        <td style="padding-bottom: 20px;">

                                                            <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                                                                <tr>

                                                                    <td align="left" valign="top" width="50%" style="padding-right: 10px;">

                                                                        <table width="100%" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" border="0" style="background-color: #FFFFFF; border: solid 1px #CFCFCF; -moz-box-shadow: 0px 3px 6px #00000029; -webkit-box-shadow: 0px 3px 6px #00000029; box-shadow: 0px 3px 6px #00000029;">

                                                                            <tr>
                                                                                <td bgcolor="#F2F2F2" style="font-family: 'Montserrat', sans-serif;background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 14px; font-weight: 700; line-height: 18px; text-align: left; color: #14213D; padding: 5px 15px;">
                                                                                    Lift access
                                                                                </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <td style="font-family: 'Montserrat', sans-serif; font-size: 14px;  line-height: 18px; text-align: left; color: #14213D; padding: 15px 10px;">
                                                                                   <?php $lift_access_amenity =  (!empty($cart_experience->lift_access_amenity) ? $cart_experience->lift_access_amenity : (!empty($value->exToHotel->lift_access_amenity)?$value->exToHotel->lift_access_amenity:'Not available!')); echo $lift_access_amenity;?>
                                                                                </td>
                                                                            </tr>

                                                                        </table>

                                                                    </td>

                                                                    <td align="right" valign="top" width="50%" style="padding-left: 10px;">

                                                                        <table width="100%" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" border="0" style="background-color: #FFFFFF; border: solid 1px #CFCFCF; -moz-box-shadow: 0px 3px 6px #00000029; -webkit-box-shadow: 0px 3px 6px #00000029; box-shadow: 0px 3px 6px #00000029;">

                                                                            <tr>
                                                                                <td bgcolor="#F2F2F2" style="font-family: 'Montserrat', sans-serif;background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 14px; font-weight: 700; line-height: 18px; text-align: left; color: #14213D; padding: 5px 15px;">
                                                                                    Leisure
                                                                                </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <td style="font-family: 'Montserrat', sans-serif; font-size: 14px;  line-height: 18px; text-align: left; color: #14213D ; padding: 15px 10px;">
                                                                                     <?php $leisure_amenity =  (!empty($cart_experience->leisure_amenity) ? $cart_experience->leisure_amenity : (!empty($value->exToHotel->leisure_amenity)?$value->exToHotel->leisure_amenity:'Not available!')); echo $leisure_amenity;?>
                                                                                </td>
                                                                            </tr>

                                                                        </table>

                                                                    </td>

                                                                </tr>
                                                            </table>                                

                                                        </td>
                                                    </tr>
                                                </table>
                                                <!-- END OF SPLIT SECTION -->
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
                                                                                    {!! isset($dates_rates->etc_meal_arrangements) ? nl2br($dates_rates->etc_meal_arrangements) : $dates_rates->etc_meal_arrangements !!}
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
                                                <!-- <h4>Amenity name</h4>
                                                 <ul>
                                                     <?php
                                                     if(!empty($cart_experience->hotel_amenities))
                                                     {
                                                        $hotel_amenities = $cart_experience->hotel_amenities;
                                                     }
                                                     else
                                                     {
                                                        $hotel_amenities = $value->hotel_amenities;
                                                     }
                                                    if(!empty($hotel_amenities)){
                                                         $hotel_amenities = unserialize($hotel_amenities);
                                                        $count = count($hotel_amenities);
                                                        foreach ($hotel_amenities as $key => $value) {
                                                            $style = '';
                                                            if(($count == 1) && empty($value)){
                                                                $style = 'style="display:none;"';
                                                            }
                                                            ?>
                                                             <li><?php echo $value; ?></li>
                                                           
                                                            <?php
                                                        }
                                                    }else{
                                                    ?>
                                                        
                                                    <?php } ?>
                                                    
                                                </ul> -->
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
                                                Arrival
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="font-family: 'Montserrat', sans-serif; font-size: 14px;  line-height: 18px; text-align: left; color: #14213D ; padding: 15px 10px;">
                                                
                                                {!! isset($dates_rates->tp_eta) ? nl2br($dates_rates->tp_eta) : '' !!}

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
                                                
                                                {!! isset($dates_rates->tp_etd) ? nl2br($dates_rates->tp_etd) : '' !!}

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
            <!-- <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                <tr>
                    <td style="padding-bottom: 20px;">

                        <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                            <tr>

                                <td bgcolor="#FFFFFF" style="background-color: #FFFFFF; border: solid 1px #CFCFCF; -moz-box-shadow: 0px 3px 6px #00000029; -webkit-box-shadow: 0px 3px 6px #00000029; box-shadow: 0px 3px 6px #00000029;">

                                    <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">

                                        <tr>
                                            <td bgcolor="#F2F2F2" style="font-family: 'Montserrat', sans-serif;background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 14px; font-weight: 700; line-height: 18px; text-align: left; color: #14213D; padding: 5px 15px;">
                                                Dinner
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="font-family: 'Montserrat', sans-serif; font-size: 14px;  line-height: 18px; text-align: left; color: #14213D ; padding: 15px 10px;">

                                                {!! isset($dates_rates->tp_dinner) ? nl2br($dates_rates->tp_dinner) : '' !!}

                                            </td>
                                        </tr>

                                    </table>

                                </td>

                            </tr>
                        </table>                                

                    </td>
                </tr>
            </table> -->
            <!-- END OF FULL WIDTH SECTION -->

            <!-- START OF FULL WIDTH SECTION -->
            <!-- <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                <tr>
                    <td style="padding-bottom: 20px;">

                        <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                            <tr>

                                <td bgcolor="#FFFFFF" style="background-color: #FFFFFF; border: solid 1px #CFCFCF; -moz-box-shadow: 0px 3px 6px #00000029; -webkit-box-shadow: 0px 3px 6px #00000029; box-shadow: 0px 3px 6px #00000029;">

                                    <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">

                                        <tr>
                                            <td bgcolor="#F2F2F2" style="font-family: 'Montserrat', sans-serif;background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 14px; font-weight: 700; line-height: 18px; text-align: left; color: #14213D; padding: 5px 15px;">
                                                Breakfast
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="font-family: 'Montserrat', sans-serif; font-size: 14px;  line-height: 18px; text-align: left; color: #14213D ; padding: 15px 10px;">

                                                {!! isset($dates_rates->tp_breakfast) ? nl2br($dates_rates->tp_breakfast) : '' !!}

                                            </td>
                                        </tr>

                                    </table>

                                </td>

                            </tr>
                        </table>                                

                    </td>
                </tr>
            </table> -->
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
                                                Housekeeping
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="font-family: 'Montserrat', sans-serif; font-size: 14px;  line-height: 18px; text-align: left; color: #14213D ; padding: 15px 10px;">
                                                
                                               <?php if(!empty($hotelAmemdment->hotel_sign)) {?>
                                                   {!! !empty($cart_experience->tds_house_keeping) ?$cart_experience->tds_house_keeping : nl2br($experience_dates_rates->tds_house_keeping) !!}
                                                   
                                                   {!! !empty($hotelAmemdment->tds_house_keeping) ? '<br/><span class="marker">'.nl2br($hotelAmemdment->tds_house_keeping).'</span>' : '' !!}
                                                <?php }else{ ?> 
                                                   {!! !empty($cart_experience->tds_house_keeping) ?$cart_experience->tds_house_keeping : nl2br($experience_dates_rates->tds_house_keeping) !!}
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
                                                Inclusions
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="font-family: 'Montserrat', sans-serif; font-size: 14px;  line-height: 18px; text-align: left; color: #14213D ; padding: 15px 10px;">
                                                {!! isset($dates_rates->tp_tour_inclusions) ? nl2br($dates_rates->tp_tour_inclusions) : $dates_rates->etc_tour_inclusions !!}
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
                                                Important Information
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="font-family: 'Montserrat', sans-serif; font-size: 14px;  line-height: 18px; text-align: left; color: #14213D ; padding: 15px 10px;">
                                                
                                              {!! isset($dates_rates->tds_important_information) ? nl2br($dates_rates->tds_important_information) : $dates_rates->tds_important_information !!}

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
            

       