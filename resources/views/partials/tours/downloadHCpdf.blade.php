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
  table.unit td {border: 1px soild #ccc;padding: 5px;}
  table td { text-align: left;vertical-align: top;}
  </style>
  <br>

            <!-- START OF HEADER -->
            <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                <tr>

                    <td width="120" align="left" valign="top" style="padding-bottom: 40px;">
                        <img src="{{ public_path('images/logo2x.png') }}" alt="" style="width: 100px; height: 100px;">

                          <!-- <img src="{{ asset('images/logo2x.png') }}" alt="Veenus"> -->
                          <
                      </td>

                    <td align="center" valign="top" style="padding-bottom: 40px;">

                        <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">

                            <tr>
                                <td align="center" style="font-family: 'Montserrat', sans-serif; font-size: 30px; font-weight: 650; color: #14213D; line-height: 36px; text-align: center;">
                                    HOTEL CONFIRMATION
                                </td>
                            </tr>

                        </table>

                    </td>

                    <td width="120" align="right" valign="top"></td>

                </tr>
            </table>
            <!-- END OF HEADER -->

            <!-- START OF FULL WIDTH SECTION -->
            <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                <tr>
                    <td style="padding-bottom: 10px;">

                        <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                            <tr>

                                <td bgcolor="#FFFFFF" style="background-color: #FFFFFF; border: solid 1px #CFCFCF; -moz-box-shadow: 0px 3px 6px #00000029; -webkit-box-shadow: 0px 3px 6px #00000029; box-shadow: 0px 3px 6px #00000029;">

                                    <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">

                                        <tr>
                                            <td bgcolor="#F2F2F2" style="font-family: 'Montserrat', sans-serif;background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 16px; font-weight: 650; line-height: 24px; text-align: left; color: #14213D; padding: 5px 5px;">
                                                Ref
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="font-family: 'Montserrat', sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; text-align: left; color: #526170; padding: 15px 10px;">
                                                {{ $experienceDate->hc_ref_number }}
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
                                            <td bgcolor="#F2F2F2" style="font-family: 'Montserrat', sans-serif;background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 16px; font-weight: 650; line-height: 24px; text-align: left; color: #14213D; padding: 5px 5px;">
                                                Hotel
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="padding: 15px 10px;">

                                                <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">

                                                    <tr>
                                                        <td style="font-family: 'Montserrat', sans-serif; font-size: 18px; font-weight: 650; line-height: 27px; text-align: left; color: #14213D; padding-bottom: 15px;">
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

                                                    <tr>
                                                        <td style="font-family: 'Montserrat', sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; text-align: left; color: #526170;">
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
            <!-- START OF SPLIT SECTION -->
            <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                <tr>
                    <td style="padding-bottom: 20px;">

                        <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                            <tr>

                                <td align="left" valign="top" width="50%" style="padding-right: 10px;">

                                    <table width="100%" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" border="0" style="background-color: #FFFFFF; border: solid 1px #CFCFCF; -moz-box-shadow: 0px 3px 6px #00000029; -webkit-box-shadow: 0px 3px 6px #00000029; box-shadow: 0px 3px 6px #00000029;">

                                        <tr>
                                            <td bgcolor="#F2F2F2" style="font-family: 'Montserrat', sans-serif;background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 16px; font-weight: 650; line-height: 24px; text-align: left; color: #14213D; padding: 5px 5px;">
                                                Dates
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="font-family: 'Montserrat', sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; text-align: left; color: #526170; padding: 15px 10px;">
                                                {{ date("D d M 'y", strtotime($experienceDate->date_from)) }} - {{ date("D d M 'y", strtotime($experienceDate->date_to)) }}
                                            </td>
                                        </tr>

                                    </table>

                                </td>

                                <td align="right" valign="top" width="50%" style="padding-left: 10px;">

                                    <table width="100%" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" border="0" style="background-color: #FFFFFF; border: solid 1px #CFCFCF; -moz-box-shadow: 0px 3px 6px #00000029; -webkit-box-shadow: 0px 3px 6px #00000029; box-shadow: 0px 3px 6px #00000029;">

                                        <tr>
                                            <td bgcolor="#F2F2F2" style="font-family: 'Montserrat', sans-serif;background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 16px; font-weight: 650; line-height: 24px; text-align: left; color: #14213D; padding: 5px 5px;">
                                                No. of Nights
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="font-family: 'Montserrat', sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; text-align: left; color: #526170; padding: 15px 10px;">
                                                {{ $experienceDate->nights }} @if($experienceDate->nights > 1) nights @else night @endif
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
                                            <td bgcolor="#F2F2F2" style="font-family: 'Montserrat', sans-serif;background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 16px; font-weight: 650; line-height: 24px; text-align: left; color: #14213D; padding: 5px 5px;">
                                                Rates & Allocation
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="padding: 14px 0px;" width="100%">

                                                <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0" style="border-collapse: separate;">

                                                    <tr>

                                                         <td width="40" height="30" align="left" valign="middle" style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 650; line-height: 21px; text-align: right; color: #14213D;">
                                                            Room Type
                                                        </td>

                                                        <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center; color: #526170;">
                                                            Single
                                                        </td>

                                                        <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center; color: #526170;">
                                                            Double
                                                        </td>

                                                        <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center; color: #526170;">
                                                            Twin
                                                        </td>

                                                        <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center; color: #526170;">
                                                            Triple
                                                        </td>

                                                        <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center; color: #526170;">
                                                            Quad
                                                        </td>

                                                        <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center; color: #526170;">
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
                                                         if(!empty($experienceDate->hotel_date_id))
                                                        {
                                                            $hotel_dates = 


DB::connection('mysql_veenus')->table('hotel_dates')->where('id', $experienceDate->hotel_date_id)->get()->toArray();
                                                            
                                                        }
                                                        else
                                                        {
                                                                $hotel_dates = 


DB::connection('mysql_veenus')->table('hotel_dates')->where('hotel_id', $hotel->id)->get()->toArray();
                                                        }
                                                       

                                                        if(!empty($hotel_dates)){
                                                            foreach ($hotel_dates as $key => $value) {
                                                            if( !empty($value->date_in ) ) {    
                                                                if(($value->date_in == $experienceDate->date_from) && ($value->date_out == $experienceDate->date_to)){
                                                                    $sgl = number_format($value->sgl,0);
                                                                    $dbl = number_format($value->dbl,0);
                                                                    $twn = number_format($value->twn,0);
                                                                    $trp = number_format($value->trp,0);
                                                                    $qrd = number_format($value->qrd,0);
                                                                    $sgl_dr = number_format($value->sgl_dr,0);
                                                                    $night = $value->night;
                                                                    $free_srs = $value->free_srs;

                                                                    $rate_dbb = number_format($value->rate_dbb,2); 
                                                                    $rate_dbl = number_format($value->rate_dbl,2); 
                                                                    $rate_twn = number_format($value->rate_twn,2); 
                                                                    $rate_trp = number_format($value->rate_trp,2); 
                                                                    $rate_qrd = number_format($value->rate_qrd,2); 
                                                                    $rate_dr = number_format($value->rate_dr,2); 

                                                                    $rate_dbb_euro = number_format($value->rate_dbb_euro,2); 
                                                                    $rate_dbl_euro = number_format($value->rate_dbl_euro,2); 
                                                                    $rate_twn_euro = number_format($value->rate_twn_euro,2); 
                                                                    $rate_trp_euro = number_format($value->rate_trp_euro,2); 
                                                                    $rate_qrd_euro = number_format($value->rate_qrd_euro,2); 
                                                                    $rate_dr_euro = number_format($value->rate_dr_euro,2); 

                                                                    $date_srs = number_format($value->date_srs,2); 
                                                                    $date_srs_dbl = number_format($value->date_srs_dbl,2); 
                                                                    $date_srs_twn = number_format($value->date_srs_twn,2); 
                                                                    $date_srs_trp = number_format($value->date_srs_trp,2); 
                                                                    $date_srs_qrd = number_format($value->date_srs_qrd,2); 
                                                                    $date_srs_dr = number_format($value->date_srs_dr,2); 

                                                                    $date_srs_euro = number_format($value->date_srs_euro,2); 
                                                                    $date_srs_dbl_euro = number_format($value->date_srs_dbl_euro,2); 
                                                                    $date_srs_twn_euro = number_format($value->date_srs_twn_euro,2); 
                                                                    $date_srs_trp_euro = number_format($value->date_srs_trp_euro,2); 
                                                                    $date_srs_qrd_euro = number_format($value->date_srs_qrd_euro,2); 
                                                                    $date_srs_dr_euro = number_format($value->date_srs_dr_euro,2); 

                                                                    // $srspp = number_format($value->date_srs,2); 
                                                                    $sgl_srs = number_format($value->sgl_srs,2);
                                                                    $dbl_srs = number_format($value->dbl_srs,2);
                                                                    $twn_srs = number_format($value->twn_srs,2);
                                                                    $trp_srs = number_format($value->trp_srs,2);
                                                                    $qrd_srs = number_format($value->qrd_srs,2);
                                                                    $dr_srs = number_format($value->dr_srs,2);
                                                                }
                                                            }
                                                            }
                                                        }
                                                        // if(isset($experienceDate)){
                                                        //     $sgl = $experienceDate->sgl;
                                                        //     $dbl = $experienceDate->dbl;
                                                        //     $twn = $experienceDate->twn;
                                                        //     $trp = $experienceDate->trp;
                                                        //     $qrd = $experienceDate->qrd;
                                                        //     $night = $experienceDate->night;
                                                        // }
                                                        ?>
                                                    <tr>

                                                         <td width="40" height="30" align="left" valign="middle" style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 650; line-height: 21px; text-align: right; color: #14213D;">
                                                            No. Rooms
                                                        </td>

                                                        <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 650; line-height: 21px; text-align: center; color: #14213D;">
                                                            <?php echo $sgl; ?>
                                                        </td>

                                                        <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 650; line-height: 21px; text-align: center; color: #14213D;">
                                                            <?php echo $dbl; ?>
                                                        </td>

                                                        <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 650; line-height: 21px; text-align: center; color: #14213D;">
                                                            <?php echo $twn; ?>

                                                        </td>

                                                        <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 650; line-height: 21px; text-align: center; color: #14213D;">
                                                            <?php echo $trp; ?>

                                                        </td>

                                                        <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 650; line-height: 21px; text-align: center; color: #14213D;">
                                                            <?php echo $qrd; ?>
                                                        </td>

                                                        <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 650; line-height: 21px; text-align: center; color: #14213D;">
                                                            <?php echo $sgl_dr; ?>
                                                        </td>

                                                    </tr>
                                                     <?php if(!empty($hotel->preferred_currency) && $hotel->preferred_currency == 1){ ?>
                                                    <tr>

                                                        <td width="40" height="30" align="left" valign="middle" style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 650; line-height: 21px; text-align: right; color: #14213D;">
                                                            Rate pppn &#163;
                                                        </td>

                                                        <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center; color: #526170;">
                                                            <?php echo (!empty($rate_dbb) ? $rate_dbb : ''); ?>
                                                         </td>

                                                        <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center; color: #526170;">
                                                           <?php echo (!empty($rate_dbl) ? $rate_dbl : ''); ?>
                                                        </td>

                                                        <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center; color: #526170;">
                                                          <?php echo (!empty($rate_twn) ? $rate_twn : ''); ?>
                                                        </td>

                                                        <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center; color: #526170;">
                                                            <?php echo (!empty($rate_trp) ? $rate_trp : ''); ?>
                                                        </td>

                                                        <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center; color: #526170;">
                                                            <?php echo (!empty($rate_qrd) ? $rate_qrd : ''); ?>
                                                        </td>

                                                        <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center; color: #526170;">
                                                             <?php echo (!empty($rate_dr) ? $rate_dr : ''); ?>
                                                        </td> 
                                                    </tr>
                                                    <tr>

                                                        <td width="40" height="30" align="left" valign="middle" style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 650; line-height: 21px; text-align: right; color: #14213D;">
                                                            SS pppn &#163;
                                                        </td>

                                                        <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center; color: #526170;">
                                                            <?php echo (!empty($date_srs) ? $date_srs : ''); ?>
                                                         </td>

                                                        <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center; color: #526170;">
                                                           <?php echo (!empty($date_srs_dbl) ? $date_srs_dbl : ''); ?>
                                                        </td>

                                                        <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center; color: #526170;">
                                                          <?php echo (!empty($date_srs_twn) ? $date_srs_twn : ''); ?>
                                                        </td>

                                                        <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center; color: #526170;">
                                                            <?php echo (!empty($date_srs_trp) ? $date_srs_trp : ''); ?>
                                                        </td>

                                                        <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center; color: #526170;">
                                                            <?php echo (!empty($date_srs_qrd) ? $date_srs_qrd : ''); ?>
                                                        </td>

                                                        <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center; color: #526170;">
                                                             <?php echo (!empty($date_srs_dr) ? $date_srs_dr : ''); ?>
                                                        </td> 
                                                    </tr>
                                                <?php } ?>
                                                    <?php if(!empty($hotel->preferred_currency) && $hotel->preferred_currency == 2){ ?>
                                                    <tr>

                                                         <td width="40" height="30" align="left" valign="middle" style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 650; line-height: 21px; text-align: right; color: #14213D;">
                                                            Rate pppn &#8364;
                                                        </td>

                                                        <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center; color: #526170;">
                                                            <?php echo (!empty($rate_dbb_euro) ? $rate_dbb_euro : ''); ?>
                                                         </td>

                                                        <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center; color: #526170;">
                                                           <?php echo (!empty($rate_dbl_euro) ? $rate_dbl_euro : ''); ?>
                                                        </td>

                                                        <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center; color: #526170;">
                                                          <?php echo (!empty($rate_twn_euro) ? $rate_twn_euro : ''); ?>
                                                        </td>

                                                        <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center; color: #526170;">
                                                            <?php echo (!empty($rate_trp_euro) ? $rate_trp_euro : ''); ?>
                                                        </td>

                                                        <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center; color: #526170;">
                                                            <?php echo (!empty($rate_qrd_euro) ? $rate_qrd_euro : ''); ?>
                                                        </td>

                                                        <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center; color: #526170;">
                                                             <?php echo (!empty($rate_dr_euro) ? $rate_dr_euro : ''); ?>
                                                        </td> 

                                                    </tr>
                                                    <tr>

                                                    <td width="40" height="30" align="left" valign="middle" style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 650; line-height: 21px; text-align: right; color: #14213D;">
                                                        SS pppn &#8364;
                                                    </td>

                                                     <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center; color: #526170;">
                                                        <?php echo (!empty($date_srs_euro) ? $date_srs_euro : ''); ?>
                                                     </td>

                                                    <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center; color: #526170;">
                                                       <?php echo (!empty($date_srs_dbl_euro) ? $date_srs_dbl_euro : ''); ?>
                                                    </td>

                                                    <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center; color: #526170;">
                                                      <?php echo (!empty($date_srs_twn_euro) ? $date_srs_twn_euro : ''); ?>
                                                    </td>

                                                    <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center; color: #526170;">
                                                        <?php echo (!empty($date_srs_trp_euro) ? $date_srs_trp_euro : ''); ?>
                                                    </td>

                                                    <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center; color: #526170;">
                                                        <?php echo (!empty($date_srs_qrd_euro) ? $date_srs_qrd_euro : ''); ?>
                                                    </td>

                                                    <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center; color: #526170;">
                                                         <?php echo (!empty($date_srs_dr_euro) ? $date_srs_dr_euro : ''); ?>
                                                    </td> 

                                                </tr>
                                            <?php } ?>
                                                <?php if(!empty($free_srs)){ ?> 
                                               <!--  <tr>

                                                    <td width="40" height="30" align="left" valign="middle" style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 650; line-height: 21px; text-align: right; color: #14213D;">
                                                       Free SS 
                                                    </td>

                                                    <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center; color: #14213D;">
                                                      
                                                         <?php echo (!empty($free_srs) ? $free_srs : ''); ?>
                                                    </td>

                                                    <td width="40" height="30" align="left" valign="middle" style="border: none; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center; color: #14213D;">
                                                       
                                                    </td>

                                                    <td width="40" height="30" align="left" valign="middle" style="border: none; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center; color: #14213D;">
                                                        
                                                    </td>

                                                    <td width="40" height="30" align="left" valign="middle" style="border: none; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center; color: #14213D;">
                                                        
                                                    </td>

                                                    <td width="40" height="30" align="left" valign="middle" style="border: none; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center; color: #14213D;">
                                                        
                                                    </td> 
                                                    <td width="40" height="30" align="left" valign="middle" style="border: none; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center; color: #14213D;">
                                                        
                                                    </td> 

                                                </tr>  -->
                                                 <tr>

                                                    <td width="40" height="30" align="left" valign="middle" style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 650; line-height: 21px; text-align: right; color: #14213D;">
                                                      Rooms SS Free
                                                    </td>

                                                    <td colspan="6" width="40" height="30" align="left" valign="middle" style="border: none; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: left; color: #526170;">
                                                         The first {{$free_srs}} rooms are SS free
                                                    </td>

                                                    

                                                </tr>
                                                <?php } ?>
                                                <?php 
                                              
                                                $CommissionList = App\Models\Cms\Commission::where('id', $value->commission_id)->first();
                                                if(!empty($CommissionList)){ ?> 
                                                <tr>

                                                    <td width="40" height="30" align="left" valign="middle" style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 650; line-height: 21px; text-align: right; color: #526170;">
                                                       Commission 
                                                    </td>

                                                    <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center; color: #526170;">
                                                      
                                                        <?php echo (!empty($CommissionList->name) ? $CommissionList->name : ''); ?>
                                                    </td>

                                                    <td width="40" height="30" align="left" valign="middle" style="border: none; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center; color: #526170;">
                                                       
                                                    </td>

                                                    <td width="40" height="30" align="left" valign="middle" style="border: none; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center; color: #526170;">
                                                        
                                                    </td>

                                                    <td width="40" height="30" align="left" valign="middle" style="border: none; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center; color: #526170;">
                                                        
                                                    </td>

                                                    <td width="40" height="30" align="left" valign="middle" style="border: none; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center; color: #526170;">
                                                        
                                                    </td> 
                                                    <td width="40" height="30" align="left" valign="middle" style="border: none; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center; color: #526170;">
                                                        
                                                    </td> 

                                                </tr> 
                                                <?php } ?>
                                                    <!-- <tr>
                                                        <td colspan="7" style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center; color: #14213D; padding-top: 4px;">
                                                            Gross rates are &pound;65.00 pppn and &pound;20.00 SRS pppn, commissionable at 8% plus VAT. Include VAT at the prevailing rate and are confidential
                                                        </td>
                                                    </tr> -->

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
                    <td style="padding-bottom: 20px;">

                        <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                            <tr>

                                <td bgcolor="#FFFFFF" style="background-color: #FFFFFF; border: solid 1px #CFCFCF; -moz-box-shadow: 0px 3px 6px #00000029; -webkit-box-shadow: 0px 3px 6px #00000029; box-shadow: 0px 3px 6px #00000029;">

                                    <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">

                                        <tr>
                                            <td bgcolor="#F2F2F2" style="font-family: 'Montserrat', sans-serif;background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 16px; font-weight: 650; line-height: 24px; text-align: left; color: #14213D; padding: 5px 5px;">
                                                Additional information 
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="font-family: 'Montserrat', sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; text-align: left; color: #526170; padding: 15px 10px;">
                                                {!! nl2br($experienceDate->ratesallocation) !!}
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
                                            <td bgcolor="#F2F2F2" style="font-family: 'Montserrat', sans-serif;background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 16px; font-weight: 650; line-height: 24px; text-align: left; color: #14213D; padding: 5px 5px;">
                                                Supplements
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="font-family: 'Montserrat', sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; text-align: left; color: #526170; padding: 15px 10px;">

                                                <?php
                                                $hotel_dates_supplements = '';
                                                
                                                if(!empty($hotel_dates)){
                                                    foreach ($hotel_dates as $key => $value) {
                                                        if(($value->date_in == $experienceDate->date_from) && ($value->date_out == $experienceDate->date_to)){
                                                            $hotel_date_id = $value->id;
                                                            $hotel_dates_supplements = 


DB::connection('mysql_veenus')->table('hotel_dates_supplements')->where('hotel_dates_id', $hotel_date_id)->get()->toArray();
                                                        }
                                                    }
                                                }
                                               if(!empty($hotel_dates_supplements)){
                                                echo '<ul>';
                                                foreach ($hotel_dates_supplements as $key => $value) {
                                                    $value->price_type = !empty($value->price_type)?$value->price_type:'pppn';
                                                    $price = '';$price_euro_in = '';$price_out = '';$price_euro_out = '';

                                                    if($hotel->preferred_currency == 1)
                                                    {
                                                        $price = !empty($value->price)?'In : &pound;'.$value->price:'';
                                                        //$price_out = !empty($value->price_out)?'Out : &pound;'.$value->price_out:'';
                                                    }
                                                    else if($hotel->preferred_currency == 2)
                                                    {
                                                        $price_euro_in = !empty($value->price_euro_in)?'In : &#8364;'.$value->price_euro_in:'';
                                                        //$price_euro_out = !empty($value->price_euro_out)?'Out : &#8364;'.$value->price_euro_out:'';
                                                    }
                                                    /*else
                                                    {
                                                        $price = !empty($value->price)?'In -&pound;'.$value->price:'';
                                                        $price_euro_in = !empty($value->price_euro_in)?'In : &#8364;'.$value->price_euro_in:'';
                                                        $price_out = !empty($value->price_out)?'Out -&pound;'.$value->price_out:'';
                                                        $price_euro_out = !empty($value->price_euro_out)?'Out : &#8364;'.$value->price_euro_out:'';
                                                    }*/
                                                    

                                                    if($value->supplements == 1){
                                                        echo '<li>Water view (Sea/Lake/River) : <strong>'.$price.' '.$price_euro_in.' '.$price_out.' '.$price_euro_out.' '.$value->price_type.'</strong></li>';
                                                    }elseif($value->supplements == 2){
                                                        echo '<li>View (Garden/Balcony) : <strong>'.$price.' '.$price_euro_in.' '.$price_out.' '.$price_euro_out.' '.$value->price_type.'</strong></li>';
                                                    }elseif($value->supplements == 3){
                                                        echo '<li>Executive/De Luxe/Superior Rooms : <strong>'.$price.' '.$price_euro_in.' '.$price_out.' '.$price_euro_out.' '.$value->price_type.'</strong></li>';
                                                    }elseif($value->supplements == 4){
                                                        echo '<li>Dbl/tw room for sole : <strong>'.$price.' '.$price_euro_in.' '.$price_out.' '.$price_euro_out.' '.$value->price_type.'</strong></li>';
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

            <!-- START OF FULL WIDTH SECTION -->
            <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                <tr>
                    <td style="padding-bottom: 20px;">

                        <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                            <tr>

                                <td bgcolor="#FFFFFF" style="background-color: #FFFFFF; border: solid 1px #CFCFCF; -moz-box-shadow: 0px 3px 6px #00000029; -webkit-box-shadow: 0px 3px 6px #00000029; box-shadow: 0px 3px 6px #00000029;">

                                    <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">

                                        <tr>
                                            <td bgcolor="#F2F2F2" style="font-family: 'Montserrat', sans-serif;background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 16px; font-weight: 650; line-height: 24px; text-align: left; color: #14213D; padding: 5px 5px;">
                                                Meal Arrangements
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="font-family: 'Montserrat', sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; text-align: left; color: #526170; padding: 15px 10px;">
                                                
                                                {!! nl2br($experienceDate->hc_mean_arrangements) !!}

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
                                            <td bgcolor="#F2F2F2" style="font-family: 'Montserrat', sans-serif;background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 16px; font-weight: 650; line-height: 24px; text-align: left; color: #14213D; padding: 5px 5px;">
                                                Free Place
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="font-family: 'Montserrat', sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; text-align: left; color: #526170; padding: 15px 10px;">
                                                {!! nl2br($experienceDate->hc_free_place) !!}
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
                                            <td bgcolor="#F2F2F2" style="font-family: 'Montserrat', sans-serif;background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 16px; font-weight: 650; line-height: 24px; text-align: left; color: #14213D; padding: 5px 5px;">
                                                Inclusions
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="font-family: 'Montserrat', sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; text-align: left; color: #526170; padding: 15px 10px;">
                                                {!! nl2br($experienceDate->hc_inclusions) !!}
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
                                            <td bgcolor="#F2F2F2" style="font-family: 'Montserrat', sans-serif;background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 16px; font-weight: 650; line-height: 24px; text-align: left; color: #14213D; padding: 5px 5px;">
                                                Services and Facilities
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="font-family: 'Montserrat', sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; text-align: left; color: #526170; padding: 15px 10px;">
                                                
                                                {!! nl2br($experienceDate->hc_services_facilities) !!}

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

            <!-- START OF TERMS AND CONDITIONS -->

                                <?php $term =  breakStr($experienceDate->hc_terms_conditions,1500);
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
                                                                        <td bgcolor="#F2F2F2" style="font-family: 'Montserrat', sans-serif;background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 16px; font-weight: 650; line-height: 24px; text-align: left; color: #14213D; padding: 5px 20px;">
                                                                            Terms and Conditions
                                                                        </td>
                                                                    </tr>
                                                                <?php } ?>
                                                                <tr >
                                                                     <td style="font-family: 'Montserrat', sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; text-align: left; color: #526170; padding: 15px 10px;">

                                                                        {!! nl2br($trow) !!}


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

            <!-- START OF AGREEMENT -->
            <!-- <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                <tr>
                    <td style="font-family: 'Montserrat', sans-serif; font-size: 20px; font-weight: 400; line-height: 30px; text-align: center; color: #14213D; padding-bottom: 50px;">
                        We agree that the booking details are correct and are subject to the terms and conditions which are available upon request.
                    </td>
                </tr>
            </table> -->
            <!-- END OF AGREEMENT -->

            <!-- START OF SIGNATURES -->
            <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                <tr>

                    <td width="50%" align="left" valign="middle">

                        <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                            
                            <?php if(isset($hotel_dates[0]->sign_name_hc) && !empty($hotel_dates[0]->sign_name_hc)){ ?>
                                <tr>
                                    <td >
                                        <div style="font-family: 'Playfair Display', serif; font-size: 50px; font-weight: 400; font-style: italic; line-height: 60px; text-align: left; color: #CFCFCF; padding-bottom: 20px;">
                                            <?php echo $hotel_dates[0]->sign_name_hc; ?>
                                        </div>
                                        <p style="font-family: 'Montserrat', sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; text-align: left; color: #526170;">
                                        <?php echo $hotel_dates[0]->sign_name_hc; ?><br>
                                        <?php 
                                        $signature_list = App\Models\Cms\SignatureName::orderBy('id','DESC')->where('name',$hotel_dates[0]->sign_name_hc)->first();
                                        if(!empty($signature_list->description))
                                        {
                                            echo $signature_list->description;
                                        }
                                        
                                        ?>
                                        
                                    </p>
                                    <p style="font-family: 'Montserrat', sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; text-align: left; color: #526170;"><?=!empty($value->hc_sign_date)?date('d/m/Y',strtotime($value->hc_sign_date)):date('d/m/Y') ?></p>
                                    </td>
                                </tr>

                               
                            <?php } ?>

                        </table>

                    </td>

                </tr>
            </table>
            <!-- END OF SIGNATURES -->

