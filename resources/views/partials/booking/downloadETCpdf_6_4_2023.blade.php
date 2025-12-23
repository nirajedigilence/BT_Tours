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
            $size = 14;
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
    table.unit td {border: 1px soild #ccc;padding: 5px;}
    table td { text-align: left;vertical-align: top;}
</style>
<br>
<table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
  <tr>

      <td width="120" align="left" valign="top" style="padding-bottom: 40px;">
        <img src="{{ public_path('images/logo2x.png') }}" alt="" style="width: 150px; height: 150px;">

        <!-- <img src="{{ asset('images/logo2x.png') }}" alt="Veenus"> -->
        <
    </td>
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

      <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">

          <tr>
              <td align="center" style="font-family: 'Montserrat', sans-serif; font-size: 28px; font-weight: 600; color: #14213D; line-height: 36px; text-align: center; padding-bottom: 5px;">
                  EXPERIENCE TOUR CONFIRMATION
              </td>
          </tr>

          <tr>
              <td align="center" style="font-family: 'Montserrat', sans-serif; font-size: 23px; font-weight: 400; color: #14213D; line-height: 30px; text-align: center; padding-bottom: 5px;">
                  <?php echo $experience->name; ?>
              </td>
          </tr>

          <tr>
              <td align="center" style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; color: #14213D; line-height: 18px; text-align: center; padding-bottom: 5px;">
                  <!-- {{ date('d M Y', $_dateMin) }} - {{ date('d M Y', $_dateMax) }} ({{$nights}} nights) -->
              </td>
          </tr>

          <tr>
              <td align="center" style="font-family: 'Montserrat', sans-serif; font-size: 18px; font-weight: 600; color: #14213D; line-height: 18px; text-align: center;">
                  <?php echo (!empty($hotel) && (count($hotel) == 1) ? $hotel[0]->name : ''); ?>
              </td>
          </tr>

      </table>

  </td>

  <td width="120" align="right" valign="top"></td>

</tr>
</table>
<!-- START OF FULL WIDTH SECTION -->
<table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
  <tr>
      <td style="padding-bottom: 10px;">

          <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
              <tr>

                  <td bgcolor="#FFFFFF" style="background-color: #FFFFFF; border: solid 1px #CFCFCF; -moz-box-shadow: 0px 3px 6px #00000029; -webkit-box-shadow: 0px 3px 6px #00000029; box-shadow: 0px 3px 6px #00000029;">

                      <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">

                          <tr>
                              <td bgcolor="#F2F2F2" style="background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 14px; font-weight: 600; line-height: 18px; text-align: left; color: #14213D; padding: 5px 15px;">
                                  Ref
                              </td>
                          </tr>

                          <tr>
                              <td style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 18px; text-align: left; color: #14213D; padding: 15px 10px;">
                                  {{ $dates_rates->etc_ref_number }}
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
        <td style="padding-bottom: 10px;">

            <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                <tr>

                    <td bgcolor="#FFFFFF" style="background-color: #FFFFFF; border: solid 1px #CFCFCF; -moz-box-shadow: 0px 3px 6px #00000029; -webkit-box-shadow: 0px 3px 6px #00000029; box-shadow: 0px 3px 6px #00000029;">

                        <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">

                            <tr>
                                <td bgcolor="#F2F2F2" style="background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 14px; font-weight: 600; line-height: 18px; text-align: left; color: #14213D; padding: 5px 15px;">
                                    Hotel
                                </td>
                            </tr>
                            <?php
                             $etc_dates = array();
                            if(!empty($experienceDate)){
                                foreach ($experienceDate as $key => $value) {
                                    if(!empty($value['dates_rates_id'])){
                                        $etc_dates[$value['dates_rates_id']]['date_from'][] = strtotime($value['date_from']);
                                        $etc_dates[$value['dates_rates_id']]['date_to'][] = strtotime($value['date_to']);
                                        $etc_dates[$value['dates_rates_id']]['date'][] = $value;
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
                            if(!empty($etc_dates)){
                                foreach ($etc_dates as $k => $val) {
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
                                                        $hotel_date_id = $hotel_date->id;

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
                                    ?>
                                    <tr>
                                        <td style="padding: 15px 10px;">

                                            <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">

                                                <tr>
                                                    <td style="font-family: 'Montserrat', sans-serif; font-size: 16px; font-weight: 600; line-height: 20px; text-align: left; color: #14213D; padding-bottom: 10px;">
                                                        <?php echo (!empty($hotel) ? $hotel->name : ''); ?>
                                                        <span style="color: #FCA311; padding-left: 8px;">
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
                                                        </span>
                                                    </td>
                                                </tr>
                                                <?php
                                                $hotel_dates_supplements = '';
                                               $hotel_dates = 


DB::connection('mysql_veenus')->table('hotel_dates')->where('hotel_id', $hotel->id)->get()->toArray();
                                                /*if(!empty($hotel_date)){
                                                    foreach ($hotel_date as $k => $val) {
                                                        $date_in = $val->date_in;
                                                        $date_out = $val->date_out;
                                                        if(in_array(strtotime($val->date_in), $e_dates['date_from']) && in_array(strtotime($val->date_out), $e_dates['date_to'])){
                                                            $hotel_date_id = $val->id;
                                                            
                                                            $hotel_dates_supplements = 


DB::connection('mysql_veenus')->table('hotel_dates_supplements')->where('hotel_dates_id', $hotel_date_id)->get()->toArray();
                                                        }
                                                    }
                                                }*/
                                                 $hotel_dates_supplements = 


DB::connection('mysql_veenus')->table('hotel_dates_supplements')->where('hotel_dates_id', $hotel_date_id)->get()->toArray();
                                                ?>
                                                <tr>
                                                    <td style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 14px; text-align: left; color: #14213D;">
                                                        <?php
                                
                                
                                                        
                                                if(isset($value['date_from']) && !empty($value['date_from']) && isset($value['date_to']) && !empty($value['date_to'])){
                                                ?>
                                                Date: {{ date("D d M", strtotime($value['date_from'])) }} - {{ date("D d M 'y", strtotime($value['date_to'])) }}
                                                <?php 
                                                } ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 18px; text-align: left; color: #14213D;">
                                                        <?php if(!empty($hotel)){ ?>
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
                                                        <?php } ?>
                                                    </td>
                                                </tr>

                                            </table>
                                            <!-- START OF FULL WIDTH SECTION -->
                                            <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                                                <tr>
                                                    <td style="padding-bottom: 10px;padding-top: 10px;">

                                                        <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                                                            <tr>

                                                                <td bgcolor="#FFFFFF" style="background-color: #FFFFFF; border: solid 1px #CFCFCF; -moz-box-shadow: 0px 3px 6px #00000029; -webkit-box-shadow: 0px 3px 6px #00000029; box-shadow: 0px 3px 6px #00000029;">

                                                                    <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">

                                                                        <tr>
                                                                            <td bgcolor="#F2F2F2" style="background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 14px; font-weight: 600; line-height: 18px; text-align: left; color: #14213D; padding: 5px 15px;">
                                                                                Room requests (supplements)
                                                                            </td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 18px; text-align: left; color: #14213D; padding: 5px 10px;">

                                                                                <?php

                                                                                if(!empty($hotel_dates_supplements)){
                                                                                    echo '<ul>';
                                                                                    foreach ($hotel_dates_supplements as $key => $value) {
                                                                                        $value->price_type = !empty($value->price_type)?$value->price_type:'pppn';
                                                                                        $value->price_type  = ($value->price_type == 'pppn')?'pp':$value->price_type;
                                                                                        if($value->supplements == 1){
                                                                                            echo '<li>Water view (Sea/Lake/River): <strong>&pound;'.$value->price_out.' '.$value->price_type.'</strong></li>';
                                                                                        }elseif($value->supplements == 2){
                                                                                            echo '<li>View (Garden/Balcony): <strong>&pound;'.$value->price_out.' '.$value->price_type.'</strong></li>';
                                                                                        }elseif($value->supplements == 3){
                                                                                            echo '<li>Executive/De Luxe/Superior Rooms: <strong>&pound;'.$value->price_out.' '.$value->price_type.'</strong></li>';
                                                                                        }elseif($value->supplements == 4){
                                                                                            echo '<li>Dbl/tw room for sole: <strong>&pound;'.$value->price_out.' '.$value->price_type.'</strong></li>';
                                                                                        }
                                                                                    }
                                                                                    echo '</ul>';
                                                                                    echo '<span style="font-weight: 600">All supplements are subject to availability</span>';
                                                                                }else{
                                                                                    echo 'N/A';
                                                                                } 
                                                                                ?>

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
                                        </td>
                                    </tr>
                                    <?php
                                }
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
<!-- START OF SPLIT SECTION -->
<table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
    <tr>
        <td style="padding-bottom: 10px;">

            <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                <tr>

                    <td align="left" valign="top" width="50%" style="padding-right: 10px;">

                        <table width="100%" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" border="0" style="background-color: #FFFFFF; border: solid 1px #CFCFCF; -moz-box-shadow: 0px 3px 6px #00000029; -webkit-box-shadow: 0px 3px 6px #00000029; box-shadow: 0px 3px 6px #00000029;">

                            <tr>
                                <td bgcolor="#F2F2F2" style="background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 14px; font-weight: 600; line-height: 18px; text-align: left; color: #14213D; padding: 5px 15px;">
                                    Dates
                                </td>
                            </tr>

                            <tr>
                                <td style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 18px; text-align: left; color: #14213D; padding: 15px 10px;">
                                    {{ date('d M Y', $_dateMin) }} - {{ date('d M Y', $_dateMax) }}
                                </td>
                            </tr>

                        </table>

                    </td>

                    <td align="right" valign="top" width="50%" style="padding-left: 10px;">

                        <table width="100%" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" border="0" style="background-color: #FFFFFF; border: solid 1px #CFCFCF; -moz-box-shadow: 0px 3px 6px #00000029; -webkit-box-shadow: 0px 3px 6px #00000029; box-shadow: 0px 3px 6px #00000029;">

                            <tr>
                                <td bgcolor="#F2F2F2" style="background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 14px; font-weight: 600; line-height: 18px; text-align: left; color: #14213D; padding: 5px 15px;">
                                    No of nights
                                </td>
                            </tr>

                            <tr>
                                <td style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 18px; text-align: left; color: #14213D; padding: 15px 10px;">
                                    {{$nights}} nights
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
                                <td bgcolor="#F2F2F2" style="background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 14px; font-weight: 600; line-height: 18px; text-align: left; color: #14213D; padding: 5px 15px;">
                                    Rates & allocation
                                </td>
                            </tr>

                            <tr>
                                <td style="padding: 14px 0px;" width="100%">

                                    <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0" style="border-collapse: separate;">

                                        <tr>

                                            <td width="40" height="30" align="left" valign="middle" style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 600; line-height: 21px; text-align: right; color: #14213D;">
                                                Room Type
                                            </td>

                                            <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center; color: #14213D;">
                                                Single
                                            </td>

                                            <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center; color: #14213D;">
                                                Double
                                            </td>

                                            <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center; color: #14213D;">
                                                Twin
                                            </td>

                                            <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center; color: #14213D;">
                                                Triple
                                            </td>

                                            <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center; color: #14213D;">
                                                Quad
                                            </td>

                                            <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center; color: #14213D;">
                                                Dr
                                            </td>

                                        </tr>
                                        <?php
                                        $sgl = 0;
                                        $dbl = 0;
                                        $twn = 0;
                                        $trp = 0;
                                        $qrd = 0;
                                        $sgl_dr = 0;
                                        $night = '';
                                        //prd($e_dates);
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
                    //     $night = $hotel_dates[0]->night;
                    // }
                                        ?>
                                        <tr>

                                            <td width="40" height="30" align="left" valign="middle" style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 600; line-height: 21px; text-align: right; color: #14213D;">
                                                No. Rooms
                                            </td>

                                            <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 600; line-height: 21px; text-align: center; color: #14213D;">
                                               <?php echo $sgl; ?>
                                           </td>

                                           <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 600; line-height: 21px; text-align: center; color: #14213D;">
                                            <?php echo $dbl; ?>
                                        </td>

                                        <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 600; line-height: 21px; text-align: center; color: #14213D;">
                                            <?php echo $twn; ?>
                                        </td>

                                        <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 600; line-height: 21px; text-align: center; color: #C9C9C9;">
                                            <?php echo $trp; ?>
                                        </td>

                                        <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 600; line-height: 21px; text-align: center; color: #C9C9C9;">
                                            <?php echo $qrd; ?>
                                        </td>

                                        <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 600; line-height: 21px; text-align: center; color: #14213D;">
                                            <?php echo $sgl_dr; ?>
                                        </td>

                                    </tr>

                                    <tr>

                                        <td width="40" height="30" align="left" valign="middle" style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 600; line-height: 21px; text-align: right; color: #14213D;">
                                            Rate pp
                                        </td>

                                        <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center; color: #14213D;">
                                            &pound;<?php echo $dates_rates->rate; ?>
                                        </td>

                                        <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center; color: #14213D;">
                                            &pound;<?php echo $dates_rates->rate; ?>
                                        </td>

                                        <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center; color: #14213D;">
                                            &pound;<?php echo $dates_rates->rate; ?>
                                        </td>

                                        <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center; color: #14213D;">
                                            &pound;<?php echo $dates_rates->rate; ?>
                                        </td>

                                        <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center; color: #14213D;">
                                            &pound;<?php echo $dates_rates->rate; ?>
                                        </td>

                                        <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center; color: #14213D;">
                                            &pound;0
                                        </td>

                                    </tr>

                                    <tr>

                                        <td width="40" height="30" align="left" valign="middle" style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 600; line-height: 21px; text-align: right; color: #14213D;">
                                            SRS pp
                                        </td>

                                        <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center; color: #14213D;">
                                            &pound;<?php echo $dates_rates->single_srs; ?>
                                        </td>

                                        <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center; color: #14213D;">
                                            &pound;<?php echo $dates_rates->double_srs; ?>
                                        </td>

                                        <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center; color: #14213D;">
                                            &pound;<?php echo $dates_rates->double_srs; ?>
                                        </td>

                                        <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center; color: #14213D;">
                                            &pound;<?php echo $dates_rates->triple_srs; ?>
                                        </td>

                                        <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center; color: #14213D;">
                                            &pound;<?php echo $dates_rates->quad_srs; ?>
                                        </td>

                                        <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center; color: #14213D;">
                                            &pound;<?php echo $dates_rates->driver_srs; ?>
                                        </td>

                                    </tr>

                                </table>

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
        <td style="padding-bottom: 10px;">

            <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                <tr>

                    <td bgcolor="#FFFFFF" style="background-color: #FFFFFF; border: solid 1px #CFCFCF; -moz-box-shadow: 0px 3px 6px #00000029; -webkit-box-shadow: 0px 3px 6px #00000029; box-shadow: 0px 3px 6px #00000029;">

                        <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">

                            <tr>
                                <td bgcolor="#F2F2F2" style="background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 14px; font-weight: 600; line-height: 18px; text-align: left; color: #14213D; padding: 5px 15px;">
                                     Driver's Free Place
                                </td>
                            </tr>

                            <tr>
                                <td style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 18px; text-align: left; color: #14213D; padding: 15px 10px;">

                                    {!! ($dates_rates->etc_free_place) !!}

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
        <td style="padding-bottom: 10px;">

            <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                <tr>

                    <td bgcolor="#FFFFFF" style="background-color: #FFFFFF; border: solid 1px #CFCFCF; -moz-box-shadow: 0px 3px 6px #00000029; -webkit-box-shadow: 0px 3px 6px #00000029; box-shadow: 0px 3px 6px #00000029;">

                        <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">

                            <tr>
                                <td bgcolor="#F2F2F2" style="background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 14px; font-weight: 600; line-height: 18px; text-align: left; color: #14213D; padding: 5px 15px;">
                                    Meal Arrangements
                                </td>
                            </tr>

                            <tr>
                                <td style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 18px; text-align: left; color: #14213D; padding: 15px 10px;">

                                    {!! ($dates_rates->etc_meal_arrangements) !!}

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
        <td style="padding-bottom: 10px;">

            <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                <tr>

                    <td bgcolor="#FFFFFF" style="background-color: #FFFFFF; border: solid 1px #CFCFCF; -moz-box-shadow: 0px 3px 6px #00000029; -webkit-box-shadow: 0px 3px 6px #00000029; box-shadow: 0px 3px 6px #00000029;">

                        <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">

                            <tr>
                                <td bgcolor="#F2F2F2" style="background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 14px; font-weight: 600; line-height: 18px; text-align: left; color: #14213D; padding: 5px 15px;">
                                    Inclusions
                                </td>
                            </tr>

                            <tr>
                                <td style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 18px; text-align: left; color: #14213D; padding: 15px 10px;">
                                    {!! ($dates_rates->etc_tour_inclusions) !!}
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
        <td style="padding-bottom: 10px;">

            <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                <tr>

                    <td bgcolor="#FFFFFF" style="background-color: #FFFFFF; border: solid 1px #CFCFCF; -moz-box-shadow: 0px 3px 6px #00000029; -webkit-box-shadow: 0px 3px 6px #00000029; box-shadow: 0px 3px 6px #00000029;">

                        <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">

                            <tr>
                                <td bgcolor="#F2F2F2" style="background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 14px; font-weight: 600; line-height: 18px; text-align: left; color: #14213D; padding: 5px 15px;">
                                    Services and Facilities
                                </td>
                            </tr>

                            <tr>
                                <td style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 18px; text-align: left; color: #14213D; padding: 15px 10px;">

                                    {!! ($dates_rates->etc_services_facilities) !!}

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
<?php 
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
        <!-- START OF FULL WIDTH SECTION -->
        <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
            <tr>
                <td style="padding-bottom: 10px;">

                    <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                        <tr>

                            <td bgcolor="#FFFFFF" style="background-color: #FFFFFF; border: solid 1px #CFCFCF; -moz-box-shadow: 0px 3px 6px #00000029; -webkit-box-shadow: 0px 3px 6px #00000029; box-shadow: 0px 3px 6px #00000029;">

                                <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">

                                    <tr>
                                        <td bgcolor="#F2F2F2" style="background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 14px; font-weight: 600; line-height: 18px; text-align: left; color: #14213D; padding: 5px 15px;">
                                            Experience <?php echo $i.': '.$type; ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="font-family: 'Montserrat', sans-serif; font-size: 15px; font-weight: 300; line-height: 18px; text-align: left; color: #14213D; padding: 5px 5px;">

                                            <ul style="list-style: none;">
                                                <li>Experience name: <b><?php echo $value->name; ?></b></li>
                                                                            <!-- <li>Date: <b>Thu 04 May '21</b></li>
                                                                                <li>Time: <b>13:00 hrs</b></li> -->
                                                                                <li>Inclusions: <b><?php 
                                                                                if(!empty($value->inclusions)){
                                                                                    $unserl = unserialize($value->inclusions);
                                                                                    echo implode(', ', $unserl);
                                                                                } ?></b></li>
                                                                            </ul>

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
                                        <?php
                                        $i++;
                                    }
                                }
                                ?>


                                <!-- START OF TERMS AND CONDITIONS -->

                                <?php $term =  breakStr($dates_rates->etc_terms_conditions,1200);
                                $i = 1;
                                foreach($term as $trow)
                                {
                                    ?>
                                    <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                                        <tr>
                                            <td style="padding-bottom: 120px;">

                                                <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                                                    <tr>

                                                        <td bgcolor="#FFFFFF" style="background-color: #FFFFFF; border: solid 1px #CFCFCF; -moz-box-shadow: 0px 3px 6px #00000029; -webkit-box-shadow: 0px 3px 6px #00000029; box-shadow: 0px 3px 6px #00000029;">

                                                            <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                                                                <?php if($i == 1)
                                                                { ?>
                                                                    <tr>
                                                                        <td bgcolor="#F2F2F2" style="background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 14px; font-weight: 600; line-height: 18px; text-align: left; color: #14213D; padding: 5px 15px;">
                                                                            Terms and Conditions
                                                                        </td>
                                                                    </tr>
                                                                <?php } ?>
                                                                <tr >
                                                                    <td style="padding: 15px 10px;">

                                                                        {!! ($trow) !!}


                                                                    </td>
                                                                </tr>



                                                            </table>

                                                        </td>

                                                    </tr>
                                                </table>                                

                                            </td>
                                        </tr>
                                    </table>
                                    <?php $i++; } ?>
                                    <!-- END OF TERMS AND CONDITIONS -->

                                    <!-- START OF SIGNATURES -->
                                    <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                                        <tr>
                                            <?php if (Auth::check() && Auth::user()->hasRole("Collaborator")){ ?>
                                                <td width="50%" align="left" valign="middle">
                                                    <?php if(!empty($cartExeToTour->sign_name)){ ?>
                                                    <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">

                                                        <tr>
                                                            <td style="font-family: 'Playfair Display', serif; font-size: 30px; font-weight: 400; font-style: italic; line-height: 60px; text-align: left; color: #CFCFCF; padding-bottom: 10px;">
                                                                 <?php $name=  Auth::user()->first_name.' '.Auth::user()->last_name; ?>
                                                                 <?php $Companyname =  Auth::user()->name; ?>
                                                                <?php echo !empty($name) ? $name : $cartExeToTour->sign_name; ?>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 18px; text-align: left; color: #14213D;">
                                                                <?php echo !empty($cartExeToTour->sign_name) ? $cartExeToTour->sign_name : $Companyname ?><br>
                                                               
                                                            </td>
                                                        </tr>

                                                    </table>
                                                <?php } ?>
                                                </td>
                                            <?php } ?>
                                            <td width="50%" align="left" valign="middle">

                                                <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                                                    <?php if(isset($dates_rates->sign_name_etc) && !empty($dates_rates->sign_name_etc)){ ?>
                                                        <tr>
                                                            <td style="font-family: 'Playfair Display', serif; font-size: 30px; font-weight: 400; font-style: italic; line-height: 60px; text-align: left; color: #CFCFCF; padding-bottom: 10px;">
                                                                <?php echo $dates_rates->sign_name_etc; ?>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 18px; text-align: left; color: #14213D;">
                                                                <?php echo $dates_rates->sign_name_etc; ?><br>
                                                                <?php 
                                                                $signature_list = App\Models\Cms\SignatureName::orderBy('id','DESC')->where('name',$dates_rates->sign_name_etc)->first();
                                                                if(!empty($signature_list->description))
                                                                {
                                                                    echo $signature_list->description;
                                                                }
                                                        /*if($experienceDate->sign_name_hc == 'Grace Selby'){
                                                            echo 'Experience Cooridnator';
                                                        }elseif($experienceDate->sign_name_hc == 'Ranjiv Bhalla'){
                                                            echo 'Director';
                                                        }elseif($experienceDate->sign_name_hc == 'Gurpreet Kalsi'){
                                                            echo 'Senior Experience Designer';
                                                        }
                                                        elseif($experienceDate->sign_name_hc == 'Jai Verma'){
                                                            echo 'Partnership Co-Ordinator';
                                                        }*/
                                                        ?>
                                                        
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            

                                        </table>

                                    </td>

                                </tr>
                            </table>
                            <!-- END OF SIGNATURES -->