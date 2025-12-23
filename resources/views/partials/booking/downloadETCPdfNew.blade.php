<!doctype html>
  <html lang="en">
  <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
      <meta name="viewport"
            content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Displayplan - Delivery Note</title>
  </head>
  <body>


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
              $_dateMin = isset($e_dates['date_from'])?min($e_dates['date_from']):'0';
              $_dateMax =isset($e_dates['date_to'])?min($e_dates['date_to']):'0';
              $diff = $_dateMax - $_dateMin; 
              $nights = round($diff / 86400);
              
              ?>
              <td align="center" valign="top" style="padding-bottom: 40px;">

                  <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">

                      <tr>
                          <td align="center" style="font-family: 'Montserrat', sans-serif; font-size: 28px; font-weight: 600; color: #14213D; line-height: 36px; text-align: center; padding-bottom: 15px;">
                              EXPERIENCE TOUR CONFIRMATION
                          </td>
                      </tr>

                      <tr>
                          <td align="center" style="font-family: 'Montserrat', sans-serif; font-size: 23px; font-weight: 400; color: #14213D; line-height: 30px; text-align: center; padding-bottom: 5px;">
                              <?php echo $experience->name; ?>
                          </td>
                      </tr>

                      <tr>
                          <td align="center" style="font-family: 'Montserrat', sans-serif; font-size: 16px; font-weight: 400; color: #14213D; line-height: 18px; text-align: center; padding-bottom: 5px;">
                              <!-- {{ date('d M Y', $_dateMin) }} - {{ date('d M Y', $_dateMax) }} ({{$nights}} nights) -->
                          </td>
                      </tr>

                      <tr>
                          <td align="center" style="font-family: 'Montserrat', sans-serif; font-size: 18px; font-weight: 600; color: #14213D; line-height: 24px; text-align: center;">
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
                                      <td bgcolor="#F2F2F2" style="background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 16px; font-weight: 600; line-height: 24px; text-align: left; color: #14213D; padding: 5px 20px;">
                                          Ref
                                      </td>
                                  </tr>

                                  <tr>
                                      <td style="font-family: 'Montserrat', sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; text-align: left; color: #14213D; padding: 30px 20px;">
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
                                                            <td bgcolor="#F2F2F2" style="background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 16px; font-weight: 600; line-height: 24px; text-align: left; color: #14213D; padding: 5px 20px;">
                                                                Hotel
                                                            </td>
                                                        </tr>
                                                        <?php
                                                        if(!empty($hotel)){
                                                            foreach ($hotel as $key => $value) {
                                                        ?>
                                                        <tr>
                                                            <td style="padding: 30px 20px;">

                                                                <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">

                                                                    <tr>
                                                                        <td style="font-family: 'Montserrat', sans-serif; font-size: 18px; font-weight: 600; line-height: 27px; text-align: left; color: #14213D; padding-bottom: 15px;">
                                                                            <?php echo (!empty($value) ? $value->name : ''); ?>
                                                                            <span style="color: #FCA311; padding-left: 8px;">
                                                                                @if(!empty($value))
                                                                                    @if ( $value->stars > 0 )
                                                                                        @for ($i = 0; $i < $value->stars; $i++)
                                                                                            <i class="fas fa-star"></i>
                                                                                        @endfor
                                                                                    @endif
                                                                                    <?php $stars = (5-$value->stars); ?>
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


DB::connection('mysql_veenus')->table('hotel_dates')->where('hotel_id', $value->id)->get()->toArray();
                                                                    if(!empty($hotel_dates)){
                                                                        foreach ($hotel_dates as $k => $val) {
                                                                            if(in_array(strtotime($val->date_in), $e_dates['date_from']) && in_array(strtotime($val->date_out), $e_dates['date_to'])){
                                                                                $hotel_date_id = $val->id;
                                                                                $date_in = $val->date_in;
                                                                                $date_out = $val->date_out;
                                                                                $hotel_dates_supplements = 


DB::connection('mysql_veenus')->table('hotel_dates_supplements')->where('hotel_dates_id', $hotel_date_id)->get()->toArray();
                                                                            }
                                                                        }
                                                                    }
                                                                    ?>
                                                                    <tr>
                                                                        <td style="font-family: 'Montserrat', sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; text-align: left; color: #14213D;">
                                                                            <?php if(isset($date_in) && !empty($date_in) && isset($date_out) && !empty($date_out)){ ?>
                                                                                Date: {{ date("D d M", strtotime($date_in)) }} - {{ date("D d M 'y", strtotime($date_out)) }}
                                                                            <?php } ?>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="font-family: 'Montserrat', sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; text-align: left; color: #14213D;">
                                                                            <?php if(!empty($value)){ ?>
                                                                                Location: <?php
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
                                                    echo implode(', ', $address); ?>
                                                                            <?php } ?>
                                                                        </td>
                                                                    </tr>

                                                                </table>
                                                                <!-- START OF FULL WIDTH SECTION -->
                                                                <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                                                                    <tr>
                                                                        <td style="padding-bottom: 10px;padding-top: 20px;">

                                                                            <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                                                                                <tr>

                                                                                    <td bgcolor="#FFFFFF" style="background-color: #FFFFFF; border: solid 1px #CFCFCF; -moz-box-shadow: 0px 3px 6px #00000029; -webkit-box-shadow: 0px 3px 6px #00000029; box-shadow: 0px 3px 6px #00000029;">

                                                                                        <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">

                                                                                            <tr>
                                                                                                <td bgcolor="#F2F2F2" style="background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 16px; font-weight: 600; line-height: 24px; text-align: left; color: #14213D; padding: 5px 20px;">
                                                                                                    Room requests (supplements) pppn
                                                                                                </td>
                                                                                            </tr>

                                                                                            <tr>
                                                                                                <td style="font-family: 'Montserrat', sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; text-align: left; color: #14213D; padding: 30px 20px;">

                                                                                                    <?php
                                                                                                    
                                                                                                    if(!empty($hotel_dates_supplements)){
                                                                                                        echo '<ul>';
                                                                                                        foreach ($hotel_dates_supplements as $key => $value) {
                                                                                                            if($value->supplements == 1){
                                                                                                                echo '<li>Water view (Sea/Lake/River): <strong>&pound;'.$value->price_out.'</strong></li>';
                                                                                                            }elseif($value->supplements == 2){
                                                                                                                echo '<li>View (Garden/Balcony): <strong>&pound;'.$value->price_out.'</strong></li>';
                                                                                                            }elseif($value->supplements == 3){
                                                                                                                echo '<li>Executive/De Luxe/Superior Rooms: <strong>&pound;'.$value->price_out.'</strong></li>';
                                                                                                            }elseif($value->supplements == 4){
                                                                                                                echo '<li>Dbl/tw room for sole: <strong>&pound;'.$value->price_out.'</strong></li>';
                                                                                                            }
                                                                                                        }
                                                                                                        echo '</ul>';
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
                                                            <td bgcolor="#F2F2F2" style="background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 16px; font-weight: 600; line-height: 24px; text-align: left; color: #14213D; padding: 5px 20px;">
                                                                Dates
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td style="font-family: 'Montserrat', sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; text-align: left; color: #14213D; padding: 30px 20px;">
                                                                {{ date('d M Y', $_dateMin) }} - {{ date('d M Y', $_dateMax) }}
                                                            </td>
                                                        </tr>

                                                    </table>

                                                </td>

                                                <td align="right" valign="top" width="50%" style="padding-left: 10px;">

                                                    <table width="100%" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" border="0" style="background-color: #FFFFFF; border: solid 1px #CFCFCF; -moz-box-shadow: 0px 3px 6px #00000029; -webkit-box-shadow: 0px 3px 6px #00000029; box-shadow: 0px 3px 6px #00000029;">

                                                        <tr>
                                                            <td bgcolor="#F2F2F2" style="background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 16px; font-weight: 600; line-height: 24px; text-align: left; color: #14213D; padding: 5px 20px;">
                                                                No of nights
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td style="font-family: 'Montserrat', sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; text-align: left; color: #14213D; padding: 30px 20px;">
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
                                    <td style="padding-bottom: 10px;">

                                        <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                                            <tr>

                                                <td bgcolor="#FFFFFF" style="background-color: #FFFFFF; border: solid 1px #CFCFCF; -moz-box-shadow: 0px 3px 6px #00000029; -webkit-box-shadow: 0px 3px 6px #00000029; box-shadow: 0px 3px 6px #00000029;">

                                                    <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">

                                                        <tr>
                                                            <td bgcolor="#F2F2F2" style="background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 16px; font-weight: 600; line-height: 24px; text-align: left; color: #14213D; padding: 5px 20px;">
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
                                                            <td bgcolor="#F2F2F2" style="background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 16px; font-weight: 600; line-height: 24px; text-align: left; color: #14213D; padding: 5px 20px;">
                                                                Free place
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td style="font-family: 'Montserrat', sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; text-align: left; color: #14213D; padding: 30px 20px;">

                                                                {!! nl2br($dates_rates->etc_free_place) !!}

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
                                                            <td bgcolor="#F2F2F2" style="background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 16px; font-weight: 600; line-height: 24px; text-align: left; color: #14213D; padding: 5px 20px;">
                                                                Inclusions
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td style="font-family: 'Montserrat', sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; text-align: left; color: #14213D; padding: 30px 20px;">
                                                                {!! nl2br($dates_rates->etc_tour_inclusions) !!}
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
                                                            <td bgcolor="#F2F2F2" style="background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 16px; font-weight: 600; line-height: 24px; text-align: left; color: #14213D; padding: 5px 20px;">
                                                                Meal arrangements
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td style="font-family: 'Montserrat', sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; text-align: left; color: #14213D; padding: 30px 20px;">
                                                                
                                                                {!! nl2br($dates_rates->etc_meal_arrangements) !!}

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
                                                            <td bgcolor="#F2F2F2" style="background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 16px; font-weight: 600; line-height: 24px; text-align: left; color: #14213D; padding: 5px 20px;">
                                                                Services and Facilities
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td style="font-family: 'Montserrat', sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; text-align: left; color: #14213D; padding: 30px 20px;">
                                                                
                                                                {!! nl2br($dates_rates->etc_services_facilities) !!}

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
                                                                    <td bgcolor="#F2F2F2" style="background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 16px; font-weight: 600; line-height: 24px; text-align: left; color: #14213D; padding: 5px 20px;">
                                                                        Experience <?php echo $i.': '.$type; ?>
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td style="font-family: 'Montserrat', sans-serif; font-size: 15px; font-weight: 300; line-height: 18px; text-align: left; color: #14213D; padding: 5px 5px;">

                                                                        <ul style="list-style: none;">
                                                                            <li>Experience name: <b><?php echo $value->name; ?></b></li>
                                                                            <li>Date: <b>Thu 04 May '21</b></li>
                                                                            <li>Time: <b>13:00 hrs</b></li>
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
                            <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                                <tr>
                                    <td style="padding-bottom: 120px;">

                                        <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                                            <tr>

                                                <td bgcolor="#FFFFFF" style="background-color: #FFFFFF; border: solid 1px #CFCFCF; -moz-box-shadow: 0px 3px 6px #00000029; -webkit-box-shadow: 0px 3px 6px #00000029; box-shadow: 0px 3px 6px #00000029;">

                                                    <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">

                                                        <tr>
                                                            <td bgcolor="#F2F2F2" style="background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 16px; font-weight: 600; line-height: 24px; text-align: left; color: #14213D; padding: 5px 20px;">
                                                                Terms and Conditions
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td style="padding: 30px 20px;">

                                                                {!! nl2br($dates_rates->etc_terms_conditions) !!}

                                                            </td>
                                                        </tr>

                                                    </table>

                                                </td>

                                            </tr>
                                        </table>                                

                                    </td>
                                </tr>
                            </table>
                            <!-- END OF TERMS AND CONDITIONS -->

                            <!-- START OF SIGNATURES -->
                            <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                                <tr>

                                    <td width="50%" align="left" valign="middle">

                                        <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">

                                            <tr>
                                                <td style="font-family: 'Playfair Display', serif; font-size: 50px; font-weight: 400; font-style: italic; line-height: 60px; text-align: left; color: #CFCFCF; padding-bottom: 10px;">
                                                    <?php echo !empty($cartExeToTour->sign_name) ? $cartExeToTour->sign_name : 'Signature'; ?>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td style="font-family: 'Montserrat', sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; text-align: left; color: #14213D;">
                                                    <?php echo !empty($cartExeToTour->sign_name) ? $cartExeToTour->sign_name : 'Signature'; ?><br>
                                                    <span style="font-weight: 600;">Grand Tours</span>
                                                </td>
                                            </tr>

                                        </table>

                                    </td>

                                    <td width="50%" align="left" valign="middle">

                                        <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                                            <?php if(isset($dates_rates->sign_name_etc) && !empty($dates_rates->sign_name_etc)){ ?>
                                                <tr>
                                                    <td style="font-family: 'Playfair Display', serif; font-size: 50px; font-weight: 400; font-style: italic; line-height: 60px; text-align: left; color: #CFCFCF; padding-bottom: 10px;">
                                                        <?php echo $dates_rates->sign_name_etc; ?>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td style="font-family: 'Montserrat', sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; text-align: left; color: #14213D;">
                                                        <?php echo $dates_rates->sign_name_etc; ?><br>
                                                        <?php if($dates_rates->sign_name_etc == 'Grace Selby'){
                                                            echo '<span style="font-weight: 600;">Experience Cooridnator</span>';
                                                        }elseif($dates_rates->sign_name_etc == 'Ranjiv Bhalla'){
                                                            echo '<span style="font-weight: 600;">Director</span>';
                                                        }elseif($dates_rates->sign_name_etc == 'Gurpreet Kalsi'){
                                                            echo '<span style="font-weight: 600;">Senior Experience Designer</span>';
                                                        }
                                                        ?>
                                                        
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            

                                        </table>

                                    </td>

                                </tr>
                            </table>
                            <!-- END OF SIGNATURES -->