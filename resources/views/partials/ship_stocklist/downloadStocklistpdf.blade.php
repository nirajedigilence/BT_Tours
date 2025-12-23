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
<?php 
            $cnts = 110;
            
            foreach ($hotelDateArray as $key => $value) {$display_euro_rate = $value->display_euro_rate;  ?>
<table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
  <tr>

     <!--  <td width="100" align="left" valign="top" style="padding-bottom: 40px;">
        <img src="{{ public_path('images/logo2x.png') }}" alt="" style="width: 150px; height: 150px;"> 

        
    </td> -->
  
  
  <td align="center" valign="top" style="padding-bottom: 40px;">

      <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
        <tr>
             <td  align="center" style="font-family: 'Montserrat', sans-serif; text-align: center;font-size: 11px;line-height: 12px; ">
                    <img src="{{ public_path('images/logo2x.png') }}" alt="" style="width: 80px; height: 80px;">
                </td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr>
            <td  align="center" style="font-family: 'Montserrat', sans-serif; text-align: center;font-size: 11px;line-height: 12px; ">
                Veenus Ltd, Sir Henry Darvill House, 8-10 William street, Windsor, Berkshire<br/>
                England, SL4 1BA. Telephone: +44 (0)1753 836600<br/>
                Email: vadmin@veenus.com website: www.veenus.com
            </td>
        </tr>
        <tr><td>&nbsp;</td></tr>
          <tr>
              <td align="center" style="font-family: 'Montserrat', sans-serif; font-size: 25px; font-weight: 500; color: #14213D; line-height: 30px; text-align: center; padding-bottom: 5px;">
                  HOTEL CONFIRMATION - {{date("Y", strtotime($value->date_in))}}
              </td>
          </tr>

         

      </table>

  </td>

  <!-- <td width="80" align="right" valign="top"></td> -->

</tr>
</table>
<!-- START OF FULL WIDTH SECTION -->
<table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
  <tr>
      <td style="padding-bottom: 10px;">

          <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
            <?php if(!empty($c_address)){ ?>
                          <tr>
                            <td  align="left" style="font-family: 'Montserrat', sans-serif; text-align: left;font-size: 14px;line-height: 15px;color: #14213D; ">
                               {!! !empty($c_address)?nl2br($c_address):'' !!}
                            </td>
                        </tr>
                        <?php } ?>
                           <?php if(!empty($message)){ ?>
                            <tr><td>&nbsp;</td></tr>
                              <tr>
                                <td  align="left" style="font-family: 'Montserrat', sans-serif; text-align: left;font-size: 14px;line-height: 14px;color: #14213D; ">
                                   {!! !empty($message)?nl2br($message):'' !!}
                                </td>
                            </tr>
                            <?php } ?>
                            <tr><td>&nbsp;</td></tr>
              <tr>

                  <td bgcolor="#FFFFFF" style="background-color: #FFFFFF; border: solid 1px #CFCFCF; -moz-box-shadow: 0px 3px 6px #00000029; -webkit-box-shadow: 0px 3px 6px #00000029; box-shadow: 0px 3px 6px #00000029;">

                      <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                        
                          <tr>
                                <td bgcolor="#F2F2F2" style="font-family: 'Montserrat', sans-serif;background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 14px; font-weight: 700; line-height: 18px; text-align: left; color: #14213D; padding: 5px 15px;">
                                  Ref
                              </td>
                          </tr>

                          <tr>
                              <td style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 18px; text-align: left; color: #14213D; padding: 15px 10px;">
                               {{ !empty($experienceDate->hc_ref_number)?$experienceDate->hc_ref_number:(!empty($ref_num)?$ref_num:'') }}
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
                                  <td bgcolor="#F2F2F2" style="font-family: 'Montserrat', sans-serif;background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 14px; font-weight: 700; line-height: 18px; text-align: left; color: #14213D; padding: 5px 15px;">
                                    Hotel
                                </td>
                            </tr>
                           
                                    <tr>
                                        <td style="padding: 15px 10px;">

                                            <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">

                                                <tr>
                                                    <td style="font-family: 'Montserrat', sans-serif; font-size: 16px; font-weight: 650; line-height: 20px; text-align: left; color: #14213D; padding-bottom: 10px;">
                                                        <?php echo (!empty($hotel) ? $hotel->name : ''); ?>
                                                    </td>
                                                </tr>
                                                
                                                <tr>
                                                    <td style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 14px; text-align: left; color: #14213D;">
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
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 18px; text-align: left; color: #14213D;">
                                                        <?php if(!empty($hotel)){ ?>
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

                    <td align="left" valign="top" width="50%" style="padding-right: 10px;">

                        <table width="100%" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" border="0" style="background-color: #FFFFFF; border: solid 1px #CFCFCF; -moz-box-shadow: 0px 3px 6px #00000029; -webkit-box-shadow: 0px 3px 6px #00000029; box-shadow: 0px 3px 6px #00000029;">

                            <tr>
                                  <td bgcolor="#F2F2F2" style="font-family: 'Montserrat', sans-serif;background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 14px; font-weight: 700; line-height: 18px; text-align: left; color: #14213D; padding: 5px 15px;">
                                    Date
                                </td>
                            </tr>

                            <tr>
                                <td style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 18px; text-align: left; color: #14213D; padding: 15px 10px;">
                                    <?php
                                        $y1 = date("Y", strtotime($value->date_in));
                                        $y2 = date("Y", strtotime($value->date_out));
                                            if($y1 == $y2)
                                            {
                                                ?>
                                                {{ date("D d M", strtotime($value->date_in)) }} - {{ date("D d M 'y", strtotime($value->date_out)) }}
                                                <?php
                                            }
                                            else
                                            {
                                                ?>
                                                {{ date("D d M 'y", strtotime($value->date_in)) }} - {{ date("D d M 'y", strtotime($value->date_out)) }}
                                                <?php
                                            }
                                    ?>
                                    
                                </td>
                            </tr>

                        </table>

                    </td>

                    <td align="right" valign="top" width="50%" style="padding-left: 10px;">

                        <table width="100%" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" border="0" style="background-color: #FFFFFF; border: solid 1px #CFCFCF; -moz-box-shadow: 0px 3px 6px #00000029; -webkit-box-shadow: 0px 3px 6px #00000029; box-shadow: 0px 3px 6px #00000029;">

                            <tr>
                                  <td bgcolor="#F2F2F2" style="font-family: 'Montserrat', sans-serif;background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 14px; font-weight: 700; line-height: 18px; text-align: left; color: #14213D; padding: 5px 15px;">
                                    No of nights
                                </td>
                            </tr>

                            <tr>
                                <td style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 18px; text-align: left; color: #14213D; padding: 15px 10px;">
                                    {{ $value->night }} nights
                                </td>
                            </tr>

                        </table>

                    </td>

                </tr>
            </table>   
            
<?php if(!empty($date_new_single)){
                foreach($date_new_single as $dd_row)
                {
                    ?>
                   
                    <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0" style="margin-top: 5px;">
                            <tr>

                                <td align="left" valign="top" width="50%" style="padding-right: 10px;">

                                    <table width="100%" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" border="0" style="background-color: #FFFFFF; border: solid 1px #CFCFCF; -moz-box-shadow: 0px 3px 6px #00000029; -webkit-box-shadow: 0px 3px 6px #00000029; box-shadow: 0px 3px 6px #00000029;">

                                        <tr>
                                            <td bgcolor="#F2F2F2" style="font-family: 'Montserrat';background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 14px; font-weight: 650; line-height: 18px; text-align: left; color: #14213D; padding: 5px 15px;">
                                                Date
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 18px; text-align: left; color: #14213D; padding: 15px 10px;">
                                                <?php
                                                    $y1 = date("Y", strtotime($dd_row['date_in']));
                                                    $y2 = date("Y", strtotime($dd_row['date_out']));
                                                        if($y1 == $y2)
                                                        {
                                                            ?>
                                                            {{ date("D d M", strtotime($dd_row['date_in'])) }} - {{ date("D d M 'y", strtotime($dd_row['date_out'])) }}
                                                            <?php
                                                        }
                                                        else
                                                        {
                                                            ?>
                                                            {{ date("D d M 'y", strtotime($dd_row['date_in'])) }} - {{ date("D d M 'y", strtotime($dd_row['date_out'])) }}
                                                            <?php
                                                        }
                                                ?>
                                                

                                            </td>
                                        </tr>

                                    </table>

                                </td>

                                <td align="right" valign="top" width="50%" style="padding-left: 10px;">

                                    <table width="100%" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" border="0" style="background-color: #FFFFFF; border: solid 1px #CFCFCF; -moz-box-shadow: 0px 3px 6px #00000029; -webkit-box-shadow: 0px 3px 6px #00000029; box-shadow: 0px 3px 6px #00000029;">

                                        <tr>
                                            <td bgcolor="#F2F2F2" style="font-family: 'Montserrat';background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 14px; font-weight: 650; line-height: 18px; text-align: left; color: #14213D; padding: 5px 15px;">
                                                No of nights
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 18px; text-align: left; color: #14213D; padding: 15px 10px;">
                                                {{ $dd_row['night'] }} nights
                                            </td>
                                        </tr>

                                    </table>

                                </td>

                            </tr>
                        </table>  
                       

                    <?php
                }
            } ?>     
            <!-- END OF SPLIT SECTION -->
            <!-- START OF FULL WIDTH SECTION -->
                <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0" style="margin-top: 5px;">
                    <tr>
                        <td style="padding-bottom: 20px;">

                            <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                                <tr>

                                    <td bgcolor="#FFFFFF" style="background-color: #FFFFFF; border: solid 1px #CFCFCF; -moz-box-shadow: 0px 3px 6px #00000029; -webkit-box-shadow: 0px 3px 6px #00000029; box-shadow: 0px 3px 6px #00000029;">

                                        <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">

                                            <tr>
                                                  <td bgcolor="#F2F2F2" style="font-family: 'Montserrat', sans-serif;background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 14px; font-weight: 700; line-height: 18px; text-align: left; color: #14213D; padding: 5px 15px;">
                                                    Rates & allocation
                                                </td>
                                            </tr>

                                            <tr>
                                                <td style="padding: 14px 0px;" width="100%">

                                                    <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0" style="border-collapse: separate;">

                                                        <tr>

                                                            <td width="40" height="30" align="left" valign="middle" style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 650; line-height: 21px; text-align: right; color: #14213D;vertical-align: middle;">
                                                                Room Type
                                                            </td>

                                                            <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center; color: #14213D;vertical-align: middle;">
                                                                Single
                                                            </td>

                                                            <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center;vertical-align: middle; color: #14213D;">
                                                                Double
                                                            </td>

                                                            <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center;vertical-align: middle; color: #14213D;">
                                                                Twin
                                                            </td>

                                                            <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center;vertical-align: middle; color: #14213D;">
                                                                Triple
                                                            </td>

                                                            <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center;vertical-align: middle; color: #14213D;">
                                                                Quad
                                                            </td>

                                                            <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center;vertical-align: middle; color: #14213D;">
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
                                                    $hotel_dates = 


DB::connection('mysql_veenus')->table('hotel_dates')->where('hotel_id', $hotel->id)->where('hotel_id', $hotel->id)->where('id', $hotel_book_date_id)->get()->toArray();
                                                    if(!empty($hotel_dates)){
                                                        foreach ($hotel_dates as $key => $valueq) {
                                                        if( !empty($valueq->date_in ) ) {   
                                                            if(!empty($experienceDate) && ($valueq->date_in == $experienceDate->date_from) && ($valueq->date_out == $experienceDate->date_to)){
                                                                $sgl = $valueq->sgl;
                                                                $dbl = $valueq->dbl;
                                                                $twn = $valueq->twn;
                                                                $trp = $valueq->trp;
                                                                $qrd = $valueq->qrd;
                                                                $sgl_dr = $valueq->sgl_dr;
                                                                $night = $valueq->night;
                                                                
                                                                $ratepp = number_format($valueq->rate_dbb,2); // added by niral
                                                                // $srspp = number_format($valueq->date_srs,2); // added by niral
                                                                $sgl_srs = number_format($valueq->sgl_srs,2);
                                                                $dbl_srs = number_format($valueq->dbl_srs,2);
                                                                $twn_srs = number_format($valueq->twn_srs,2);
                                                                $trp_srs = number_format($valueq->trp_srs,2);
                                                                $qrd_srs = number_format($valueq->qrd_srs,2);
                                                                $dr_srs = number_format($valueq->dr_srs,2);
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

                                                            <td width="40" height="30" align="left" valign="middle" style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 650; line-height: 21px; text-align: right;vertical-align: middle; color: #14213D;">
                                                                No. Rooms
                                                            </td>

                                                            <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 650; line-height: 21px; text-align: center;vertical-align: middle; color: #14213D;">
                                                               <?php echo (!empty($is_contract))?$value->sgl:$sgl; ?>
                                                           </td>

                                                           <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 650; line-height: 21px; text-align: center;vertical-align: middle; color: #14213D;">
                                                           
                                                             <?php echo (!empty($is_contract))?$value->dbl:$dbl; ?>
                                                        </td>

                                                        <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 650; line-height: 21px; text-align: center;vertical-align: middle; color: #14213D;">
                                                            
                                                            <?php echo (!empty($is_contract))?$value->twn:$twn; ?>
                                                        </td>

                                                        <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 650; line-height: 21px; text-align: center;vertical-align: middle; color: #14213D;">
                                                           
                                                            <?php echo (!empty($is_contract))?$value->trp:$trp; ?>
                                                        </td>

                                                        <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 650; line-height: 21px; text-align: center;vertical-align: middle; color: #14213D;">
                                                             <?php echo (!empty($is_contract))?$value->qrd:$qrd; ?>
                                                            
                                                        </td>

                                                        <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 650; line-height: 21px; text-align: center;vertical-align: middle; color: #14213D;">
                                                            
                                                             <?php echo (!empty($is_contract))?$value->sgl_dr:$sgl_dr; ?>
                                                        </td>

                                                    </tr>

                                                    
                                                    <tr  class="rt_row pound_colunm" <?=(!empty($hotel->preferred_currency) && ($hotel->preferred_currency == '1'))?'':'style="display:none"'?>>

                                                        <td width="40" height="30" align="left" valign="middle" style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 650; line-height: 21px; text-align: right;vertical-align: middle; color: #14213D;">
                                                             Rate pppn &#163;
                                                        </td>

                                                        <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center;vertical-align: middle; color: #14213D;">
                                                            {{ sprintf('%0.2f',$value->rate_dbb) }}
                                                        </td>

                                                        <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center;vertical-align: middle; color: #14213D;">
                                                            {{ sprintf('%0.2f',$value->rate_dbl) }}
                                                        </td>

                                                        <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center;vertical-align: middle; color: #14213D;">
                                                            {{ sprintf('%0.2f',$value->rate_twn) }}
                                                        </td>

                                                        <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center;vertical-align: middle; color: #14213D;">
                                                            {{ sprintf('%0.2f',$value->rate_trp) }}
                                                        </td>

                                                        <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center;vertical-align: middle; color: #14213D;">
                                                            {{ sprintf('%0.2f',$value->rate_qrd) }}
                                                        </td>

                                                        <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center;vertical-align: middle; color: #14213D;">
                                                            {{ sprintf('%0.2f',$value->rate_dr) }}
                                                        </td>

                                                    </tr>

                                                    <tr class="rt_row pound_colunm" <?=(!empty($hotel->preferred_currency) && ($hotel->preferred_currency == '1'))?'':'style="display:none"'?>>

                                                        <td width="40" height="30" align="left" valign="middle" style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 650; line-height: 21px; text-align: right;vertical-align: middle; color: #14213D;">
                                                             SRS pppn &#163;
                                                        </td>

                                                        <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center;vertical-align: middle; color: #14213D;">
                                                            {{ sprintf('%0.2f',$value->date_srs) }}
                                                        </td>

                                                        <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center;vertical-align: middle; color: #14213D;">
                                                            {{ sprintf('%0.2f',$value->date_srs_dbl) }}
                                                        </td>

                                                        <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center;vertical-align: middle; color: #14213D;">
                                                            {{ sprintf('%0.2f',$value->date_srs_twn) }}
                                                        </td>

                                                        <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center;vertical-align: middle; color: #14213D;">
                                                            {{ sprintf('%0.2f',$value->date_srs_trp) }}
                                                        </td>

                                                        <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center;vertical-align: middle; color: #14213D;">
                                                            {{ sprintf('%0.2f',$value->date_srs_qrd) }}
                                                        </td>

                                                        <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center;vertical-align: middle; color: #14213D;">
                                                            {{ sprintf('%0.2f',$value->date_srs_dr) }}
                                                        </td>

                                                    </tr>
                                                    <?php //if(!empty($display_euro_rate)){ ?>
                                                    <tr class="rt_row euro_colunm" <?=(!empty($hotel->preferred_currency) && ($hotel->preferred_currency == '2'))?'':'style="display:none"'?>>

                                                        <td width="40" height="30" align="left" valign="middle" style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 650; line-height: 21px; text-align: right;vertical-align: middle; color: #14213D;">
                                                             Rate pppn &#8364;
                                                        </td>

                                                        <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center;vertical-align: middle; color: #14213D;">
                                                            {{ sprintf('%0.2f',$value->rate_dbb_euro) }}
                                                        </td>

                                                        <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center;vertical-align: middle; color: #14213D;">
                                                            {{ sprintf('%0.2f',$value->rate_dbl_euro) }}
                                                        </td>

                                                        <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center;vertical-align: middle; color: #14213D;">
                                                            {{ sprintf('%0.2f',$value->rate_twn_euro) }}
                                                        </td>

                                                        <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center;vertical-align: middle; color: #14213D;">
                                                            {{ sprintf('%0.2f',$value->rate_trp_euro) }}
                                                        </td>

                                                        <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center;vertical-align: middle; color: #14213D;">
                                                            {{ sprintf('%0.2f',$value->rate_qrd_euro) }}
                                                        </td>

                                                        <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center;vertical-align: middle; color: #14213D;">
                                                            {{ sprintf('%0.2f',$value->rate_dr_euro) }}
                                                        </td>

                                                    </tr>
                                                    <tr class="rt_row euro_colunm" <?=(!empty($hotel->preferred_currency) && ($hotel->preferred_currency == '2'))?'':'style="display:none"'?>>

                                                        <td width="40" height="30" align="left" valign="middle" style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 650; line-height: 21px; text-align: right;vertical-align: middle; color: #14213D;">
                                                             SRS pppn &#8364;
                                                        </td>

                                                        <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center;vertical-align: middle; color: #14213D;">
                                                            {{ sprintf('%0.2f',$value->date_srs_euro) }}
                                                        </td>

                                                        <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center;vertical-align: middle; color: #14213D;">
                                                            {{ sprintf('%0.2f',$value->date_srs_dbl_euro) }}
                                                        </td>

                                                        <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center;vertical-align: middle; color: #14213D;">
                                                            {{ sprintf('%0.2f',$value->date_srs_twn_euro) }}
                                                        </td>

                                                        <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center;vertical-align: middle; color: #14213D;">
                                                            {{ sprintf('%0.2f',$value->date_srs_trp_euro) }}
                                                        </td>

                                                        <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center;vertical-align: middle; color: #14213D;">
                                                            {{ sprintf('%0.2f',$value->date_srs_qrd_euro) }}
                                                        </td>

                                                        <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center;vertical-align: middle; color: #14213D;">
                                                            {{ sprintf('%0.2f',$value->date_srs_dr_euro) }}
                                                        </td>

                                                    </tr>
                                                    <?php //} ?>
                                                     <?php 
                                                             
                                                        if(!empty($value->free_srs)){ ?> 
                                                         
                                                         <tr>
                                                            <td width="50" height="30" align="left" valign="middle" style="font-family: 'Montserrat', sans-serif; font-size: 13px; font-weight: 650; line-height: 21px; text-align: right; color: #14213D;">
                                                              Rooms SS Free
                                                            </td>

                                                            <td colspan="6" width="40" height="30" align="left" valign="middle" style="border: none; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 700; line-height: 21px; text-align: left; color: #14213D;">
                                                                   The first {{number_format($value->free_srs,0)}} rooms are SS free
                                                            </td>
                                                        </tr>
                                                        <?php } ?>

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

<!-- END OF SPLIT SECTION -->

<?php if(!empty($date_new)){
                foreach($date_new as $key=>$dd_row)
                {
                    ?>
                    <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0" style="margin-top: 5px;">
                        <tr><td style="border-bottom:1px solid;">&nbsp;</td></tr>
                        <tr><td >&nbsp;</td></tr>
                    </table>
                    <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0" style="margin-top: 5px;">
                            <tr>

                                <td align="left" valign="top" width="50%" style="padding-right: 10px;">

                                    <table width="100%" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" border="0" style="background-color: #FFFFFF; border: solid 1px #CFCFCF; -moz-box-shadow: 0px 3px 6px #00000029; -webkit-box-shadow: 0px 3px 6px #00000029; box-shadow: 0px 3px 6px #00000029;">

                                        <tr>
                                            <td bgcolor="#F2F2F2" style="font-family: 'Montserrat';background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 14px; font-weight: 650; line-height: 18px; text-align: left; color: #14213D; padding: 5px 15px;">
                                                Date
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 18px; text-align: left; color: #14213D; padding: 15px 10px;">
                                                <?php
                                                    $y1 = date("Y", strtotime($dd_row['date_in']));
                                                    $y2 = date("Y", strtotime($dd_row['date_out']));
                                                        if($y1 == $y2)
                                                        {
                                                            ?>
                                                            {{ date("D d M", strtotime($dd_row['date_in'])) }} - {{ date("D d M 'y", strtotime($dd_row['date_out'])) }}
                                                            <?php
                                                        }
                                                        else
                                                        {
                                                            ?>
                                                            {{ date("D d M 'y", strtotime($dd_row['date_in'])) }} - {{ date("D d M 'y", strtotime($dd_row['date_out'])) }}
                                                            <?php
                                                        }
                                                ?>
                                                

                                            </td>
                                        </tr>

                                    </table>

                                </td>

                                <td align="right" valign="top" width="50%" style="padding-left: 10px;">

                                    <table width="100%" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" border="0" style="background-color: #FFFFFF; border: solid 1px #CFCFCF; -moz-box-shadow: 0px 3px 6px #00000029; -webkit-box-shadow: 0px 3px 6px #00000029; box-shadow: 0px 3px 6px #00000029;">

                                        <tr>
                                            <td bgcolor="#F2F2F2" style="font-family: 'Montserrat';background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 14px; font-weight: 650; line-height: 18px; text-align: left; color: #14213D; padding: 5px 15px;">
                                                No of nights
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 18px; text-align: left; color: #14213D; padding: 15px 10px;">
                                                {{ $dd_row['night'] }} nights
                                            </td>
                                        </tr>

                                    </table>

                                </td>

                            </tr>
                        </table>  
                        <?php
                        if(!empty($daterate_new_single[$key]))
                        {
                            foreach($daterate_new_single[$key] as $in_row)
                            {
                                ?>
                                <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0" style="margin-top: 5px;">
                                    <tr>

                                        <td align="left" valign="top" width="50%" style="padding-right: 10px;">

                                            <table width="100%" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" border="0" style="background-color: #FFFFFF; border: solid 1px #CFCFCF; -moz-box-shadow: 0px 3px 6px #00000029; -webkit-box-shadow: 0px 3px 6px #00000029; box-shadow: 0px 3px 6px #00000029;">

                                                <tr>
                                                    <td bgcolor="#F2F2F2" style="font-family: 'Montserrat';background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 14px; font-weight: 650; line-height: 18px; text-align: left; color: #14213D; padding: 5px 15px;">
                                                        Date
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 18px; text-align: left; color: #14213D; padding: 15px 10px;">
                                                        <?php
                                                            $y1 = date("Y", strtotime($in_row['date_in']));
                                                            $y2 = date("Y", strtotime($in_row['date_out']));
                                                                if($y1 == $y2)
                                                                {
                                                                    ?>
                                                                    {{ date("D d M", strtotime($in_row['date_in'])) }} - {{ date("D d M 'y", strtotime($in_row['date_out'])) }}
                                                                    <?php
                                                                }
                                                                else
                                                                {
                                                                    ?>
                                                                    {{ date("D d M 'y", strtotime($in_row['date_in'])) }} - {{ date("D d M 'y", strtotime($in_row['date_out'])) }}
                                                                    <?php
                                                                }
                                                        ?>
                                                        

                                                    </td>
                                                </tr>

                                            </table>

                                        </td>

                                        <td align="right" valign="top" width="50%" style="padding-left: 10px;">

                                            <table width="100%" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" border="0" style="background-color: #FFFFFF; border: solid 1px #CFCFCF; -moz-box-shadow: 0px 3px 6px #00000029; -webkit-box-shadow: 0px 3px 6px #00000029; box-shadow: 0px 3px 6px #00000029;">

                                                <tr>
                                                    <td bgcolor="#F2F2F2" style="font-family: 'Montserrat';background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 14px; font-weight: 650; line-height: 18px; text-align: left; color: #14213D; padding: 5px 15px;">
                                                        No of nights
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 18px; text-align: left; color: #14213D; padding: 15px 10px;">
                                                        {{ $in_row['night'] }} nights
                                                    </td>
                                                </tr>

                                            </table>

                                        </td>

                                    </tr>
                                </table>  
                                <?php
                            }
                        }
                        ?>
                        <!-- START OF FULL WIDTH SECTION -->
                            <table style="margin-top: 5px;" width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                                <tr>
                                    <td style="padding-bottom: 20px;">

                                        <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                                            <tr>

                                                <td bgcolor="#FFFFFF" style="background-color: #FFFFFF; border: solid 1px #CFCFCF; -moz-box-shadow: 0px 3px 6px #00000029; -webkit-box-shadow: 0px 3px 6px #00000029; box-shadow: 0px 3px 6px #00000029;">

                                                    <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">

                                                        <tr>
                                                            <td bgcolor="#F2F2F2" style="font-family: 'Montserrat';background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 14px; font-weight: 650; line-height: 18px; text-align: left; color: #14213D; padding: 5px 15px;">
                                                                Rates & allocation
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td style="padding: 14px 0px;" width="100%">

                                                                <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0" style="border-collapse: separate;">

                                                                    <tr>

                                                                        <td width="40" height="30" align="left" valign="middle" style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 650; line-height: 21px; text-align: right; color: #14213D;vertical-align: middle;">
                                                                            Room Type
                                                                        </td>

                                                                        <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center; color: #14213D;vertical-align: middle;">
                                                                            Single
                                                                        </td>

                                                                        <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center;vertical-align: middle; color: #14213D;">
                                                                            Double
                                                                        </td>

                                                                        <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center;vertical-align: middle; color: #14213D;">
                                                                            Twin
                                                                        </td>

                                                                        <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center;vertical-align: middle; color: #14213D;">
                                                                            Triple
                                                                        </td>

                                                                        <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center;vertical-align: middle; color: #14213D;">
                                                                            Quad
                                                                        </td>

                                                                        <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center;vertical-align: middle; color: #14213D;">
                                                                            Dr
                                                                        </td>

                                                                    </tr>
                                                                     
                                                                    <tr>

                                                                        <td width="40" height="30" align="left" valign="middle" style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 650; line-height: 21px; text-align: right;vertical-align: middle; color: #14213D;">
                                                                            No. Rooms
                                                                        </td>

                                                                        <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 650; line-height: 21px; text-align: center;vertical-align: middle; color: #14213D;">
                                                                           {{ isset($dd_row['sgl'])?$dd_row['sgl']:'' }}
                                                                       </td>

                                                                       <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 650; line-height: 21px; text-align: center;vertical-align: middle; color: #14213D;">
                                                                       {{ isset($dd_row['dbl'])?$dd_row['dbl']:'' }}
                                                                        
                                                                    </td>

                                                                    <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 650; line-height: 21px; text-align: center;vertical-align: middle; color: #14213D;">
                                                                        {{ isset($dd_row['twn'])?$dd_row['twn']:'' }}
                                                                    </td>

                                                                    <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 650; line-height: 21px; text-align: center;vertical-align: middle; color: #14213D;">
                                                                       {{ isset($dd_row['trp'])?$dd_row['trp']:'' }}
                                                                    </td>

                                                                    <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 650; line-height: 21px; text-align: center;vertical-align: middle; color: #14213D;">
                                                                        {{ isset($dd_row['qrd'])?$dd_row['qrd']:'' }}
                                                                        
                                                                    </td>

                                                                    <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 650; line-height: 21px; text-align: center;vertical-align: middle; color: #14213D;">
                                                                        {{ isset($dd_row['sgl_dr'])?$dd_row['sgl_dr']:'' }}
                                                                    </td>

                                                                </tr>

                                                                <?php if(!empty($hotel->preferred_currency) && $hotel->preferred_currency == 1){ ?>
                                                                <tr>

                                                                    <td width="40" height="30" align="left" valign="middle" style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 650; line-height: 21px; text-align: right;vertical-align: middle; color: #14213D;">
                                                                         Rate pppn &#163;
                                                                    </td>

                                                                    <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center;vertical-align: middle; color: #14213D;">
                                                                        {{ isset($dd_row['rate_dbb'])?sprintf('%0.2f',$dd_row['rate_dbb']):'' }}
                                                                    </td>

                                                                    <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center;vertical-align: middle; color: #14213D;">
                                                                        {{ isset($dd_row['rate_dbl'])?sprintf('%0.2f',$dd_row['rate_dbl']):'' }}

                                                                    </td>

                                                                    <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center;vertical-align: middle; color: #14213D;">
                                                                        {{ isset($dd_row['rate_twn'])?$dd_row['rate_twn']:'' }}

                                                                    </td>

                                                                    <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center;vertical-align: middle; color: #14213D;">
                                                                        {{ isset($dd_row['rate_trp'])?$dd_row['rate_trp']:'' }}

                                                                    </td>

                                                                    <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center;vertical-align: middle; color: #14213D;">
                                                                        {{ isset($dd_row['rate_qrd'])?$dd_row['rate_qrd']:'' }}

                                                                    </td>

                                                                    <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center;vertical-align: middle; color: #14213D;">
                                                                        {{ isset($dd_row['rate_dr'])?$dd_row['rate_dr']:'' }}

                                                                    </td>

                                                                </tr>

                                                                <tr>

                                                                    <td width="40" height="30" align="left" valign="middle" style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 650; line-height: 21px; text-align: right;vertical-align: middle; color: #14213D;">
                                                                         SRS pppn &#163;
                                                                    </td>

                                                                    <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center;vertical-align: middle; color: #14213D;">
                                                                        {{ isset($dd_row['date_srs'])?$dd_row['date_srs']:'' }}
                                                                    </td>

                                                                    <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center;vertical-align: middle; color: #14213D;">
                                                                        {{ isset($dd_row['date_srs_dbl'])?$dd_row['date_srs_dbl']:'' }}
                                                                    </td>

                                                                    <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center;vertical-align: middle; color: #14213D;">
                                                                        {{ isset($dd_row['date_srs_twn'])?$dd_row['date_srs_twn']:'' }}
                                                                    </td>

                                                                    <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center;vertical-align: middle; color: #14213D;">
                                                                        {{ isset($dd_row['date_srs_trp'])?$dd_row['date_srs_trp']:'' }}
                                                                    </td>

                                                                    <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center;vertical-align: middle; color: #14213D;">
                                                                        {{ isset($dd_row['date_srs_qrd'])?$dd_row['date_srs_qrd']:'' }}
                                                                    </td>

                                                                    <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center;vertical-align: middle; color: #14213D;">
                                                                        {{ isset($dd_row['date_srs_dr'])?$dd_row['date_srs_dr']:'' }}
                                                                    </td>

                                                                </tr>
                                                                <?php } ?>
                                                                <?php /*if(!empty($dd_row['display_euro_rate'])){*/
                                                                if(!empty($hotel->preferred_currency) && $hotel->preferred_currency == 2){ ?>
                                                                <tr>

                                                                    <td width="40" height="30" align="left" valign="middle" style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 650; line-height: 21px; text-align: right;vertical-align: middle; color: #14213D;">
                                                                         Rate pppn &#8364;
                                                                    </td>

                                                                    <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center;vertical-align: middle; color: #14213D;">
                                                                        {{ isset($dd_row['rate_dbb_euro'])?$dd_row['rate_dbb_euro']:'' }}
                                                                    </td>

                                                                    <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center;vertical-align: middle; color: #14213D;">
                                                                        {{ isset($dd_row['rate_dbl_euro'])?$dd_row['rate_dbl_euro']:'' }}
                                                                    </td>

                                                                    <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center;vertical-align: middle; color: #14213D;">
                                                                        {{ isset($dd_row['rate_twn_euro'])?$dd_row['rate_twn_euro']:'' }}
                                                                    </td>

                                                                    <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center;vertical-align: middle; color: #14213D;">
                                                                        {{ isset($dd_row['rate_trp_euro'])?$dd_row['rate_trp_euro']:'' }}
                                                                    </td>

                                                                    <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center;vertical-align: middle; color: #14213D;">
                                                                        {{ isset($dd_row['rate_qrd_euro'])?$dd_row['rate_qrd_euro']:'' }}
                                                                    </td>

                                                                    <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center;vertical-align: middle; color: #14213D;">
                                                                        {{ isset($dd_row['rate_dr_euro'])?$dd_row['rate_dr_euro']:'' }}
                                                                    </td>

                                                                </tr>
                                                                <tr>

                                                                    <td width="40" height="30" align="left" valign="middle" style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 650; line-height: 21px; text-align: right;vertical-align: middle; color: #14213D;">
                                                                         SRS pppn &#8364;
                                                                    </td>

                                                                    <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center;vertical-align: middle; color: #14213D;">
                                                                        {{ isset($dd_row['date_srs_euro'])?$dd_row['date_srs_euro']:'' }}
                                                                    </td>

                                                                    <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center;vertical-align: middle; color: #14213D;">
                                                                        {{ isset($dd_row['date_srs_dbl_euro'])?$dd_row['date_srs_dbl_euro']:'' }}
                                                                    </td>

                                                                    <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center;vertical-align: middle; color: #14213D;">
                                                                        {{ isset($dd_row['date_srs_twn_euro'])?$dd_row['date_srs_twn_euro']:'' }}
                                                                    </td>

                                                                    <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center;vertical-align: middle; color: #14213D;">
                                                                        {{ isset($dd_row['date_srs_trp_euro'])?$dd_row['date_srs_trp_euro']:'' }}
                                                                    </td>

                                                                    <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center;vertical-align: middle; color: #14213D;">
                                                                        {{ isset($dd_row['date_srs_qrd_euro'])?$dd_row['date_srs_qrd_euro']:'' }}
                                                                    </td>

                                                                    <td width="40" height="30" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center;vertical-align: middle; color: #14213D;">
                                                                        {{ isset($dd_row['date_srs_dr_euro'])?$dd_row['date_srs_dr_euro']:'' }}
                                                                    </td>

                                                                </tr>
                                                                <?php } ?>
                                                                <?php 
                                                             
                                                                if(!empty($dd_row['free_srs'])){ ?> 
                                                                 
                                                                 <tr>
                                                                    <td width="40" height="30" align="left" valign="middle" style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 650; line-height: 21px; text-align: right; color: #14213D;">
                                                                      Rooms SS Free
                                                                    </td>

                                                                    <td colspan="6" width="40" height="30" align="left" valign="middle" style="border: none; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 700; line-height: 21px; text-align: left; color: #526170;">
                                                                         The first {{number_format($dd_row['free_srs'],0)}} rooms are SS free
                                                                    </td>
                                                                </tr>
                                                                <?php } ?>

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

                    <?php
                }
            } ?>     


<!-- START OF FULL WIDTH SECTION -->
<table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
    <tr>
        <td style="padding-bottom: 10px;">

            <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                <tr>

                    <td bgcolor="#FFFFFF" style="background-color: #FFFFFF; border: solid 1px #CFCFCF; -moz-box-shadow: 0px 3px 6px #00000029; -webkit-box-shadow: 0px 3px 6px #00000029; box-shadow: 0px 3px 6px #00000029;">

                        <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">

                            <tr>
                                  <td bgcolor="#F2F2F2" style="font-family: 'Montserrat', sans-serif;background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 14px; font-weight: 700; line-height: 18px; text-align: left; color: #14213D; padding: 5px 15px;">
                                    Commission
                                </td>
                            </tr>

                            <tr>
                                <td style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 18px; text-align: left; color: #14213D; padding: 15px 10px;">

                                     <?php
                                     $name = '';
                                            foreach ($CommissionList as $keyCom => $valueCom) { 
                                                $selected = '';
                                                if(!empty($value->commission_id) && ($value->commission_id == $valueCom->id)){
                                                    $selected = 'selected';
                                                    $name = $valueCom->name;
                                                }
                                                ?>
                                               
                                            <?php } ?>
                                            {{$name}}

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
        <td style="padding-bottom: 10px;">

            <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                <tr>

                    <td bgcolor="#FFFFFF" style="background-color: #FFFFFF; border: solid 1px #CFCFCF; -moz-box-shadow: 0px 3px 6px #00000029; -webkit-box-shadow: 0px 3px 6px #00000029; box-shadow: 0px 3px 6px #00000029;">

                        <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">

                            <tr>
                                  <td bgcolor="#F2F2F2" style="font-family: 'Montserrat', sans-serif;background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 14px; font-weight: 700; line-height: 18px; text-align: left; color: #14213D; padding: 5px 15px;">
                                     Room requested (supplements)
                                </td>
                            </tr>

                            <tr>
                                <td style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 18px; text-align: left; color: #14213D; padding: 15px 10px;">

                                   <table class="supplements" width="85%">
                                    <tr>
                                        <td width="40%"><b>Supplements</b></td>
                                        <td width="20%"><b>Cost</b></td>
                                        <td width="20%"><b>In Price</b></td>
                                        <td width="20%"><b>Out Price</b></td>
                                    </tr>
                                    <tr>
                                         <?php

                                            $value->hotelDatesSupplements = isset($value->hotelDatesSupplements)?$value->hotelDatesSupplements:array();

                                            $hotelDatesSupplements = $value->hotelDatesSupplements;
                                            $value->hotelDatesSupplements = array_column($value->hotelDatesSupplements, 'supplements');
                                            $checked = '';
                                            $price = '';
                                            $price_out = '';
                                            $price_type = '';
                                            if(!empty($value->hotelDatesSupplements)){
                                                if (in_array(1, $value->hotelDatesSupplements))
                                                {
                                                    $srchKey = array_search(1,$value->hotelDatesSupplements);
                                                    $price = $hotelDatesSupplements[$srchKey]['price'];
                                                    $price_out = $hotelDatesSupplements[$srchKey]['price_out'];
                                                    $price_type = $hotelDatesSupplements[$srchKey]['price_type'];
                                                    $checked = 'checked';
                                                }  
                                            }
                                            ?>
                                        <td width="40%">
                                            <div class="inclusionsSections">
                                                <div class="checkarea_part_Dates">
                                                    <label class="checkbox_div">
                                                     <?php if(!empty($checked)){ ?>
                                                         <img src="{{ public_path('images/tick.png') }}" alt="" style="width: 10px; height: 10px;">
                                                     <?php } ?>
                                                 <span>Water view (Sea/Lake/River) </span>
                                                      
                                                      <span class="checkmark"></span>
                                                      
                                                         
                                                       
                                                         
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                        <td width="20%">
                                             {{$price_type}}
                                        </td>
                                        
                                        <td width="20%">
                                        
                                            <?php if(!empty($price)){ ?> 
                                            <span class="hotelDatesInOutCls" style="margin-right: 10px;"><b><?php echo !empty($price) ? '&pound;'.$price : '-'; ?> <?=!empty($price_type)?$price_type:'pppn'?> </b></span>
                                            <?php } ?>
                                        </td>
                                        <td width="20%">
                                            <?php if(!empty($price_out)){ ?> 
                                             <span class="hotelDatesInOutCls" style="margin-right: 10px;"><b><?php echo !empty($price_out) ? '&pound;'.$price_out : '-'; ?> <?=(!empty($price_type) && $price_type == 'pppn')?'pp':((!empty($price_type) && $price_type == 'prpn')?$price_type:'pp')?></b></span>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <tr>
                                         <?php

                                            $checked = '';
                                            $price = '';
                                            $price_out = '';
                                            $price_type = '';
                                            if(!empty($value->hotelDatesSupplements)){
                                                if (in_array(2, $value->hotelDatesSupplements))
                                                {
                                                    $srchKey = array_search(2,$value->hotelDatesSupplements);
                                                    $price = $hotelDatesSupplements[$srchKey]['price'];
                                                    $price_out = $hotelDatesSupplements[$srchKey]['price_out'];
                                                    $price_type = $hotelDatesSupplements[$srchKey]['price_type'];
                                                    $checked = 'checked';
                                                }  
                                            }
                                            ?>
                                        <td width="40%">
                                            <div class="inclusionsSections">
                                                <div class="checkarea_part_Dates">
                                                    <label class="checkbox_div">
                                                      <?php if(!empty($checked)){ ?>
                                                         <img src="{{ public_path('images/tick.png') }}" alt="" style="width: 10px; height: 10px;">
                                                     <?php } ?>
                                                      <span class="notClickedCls ">View (Garden/Balcony) </span>
                                                      
                                                      <span class="checkmark"></span>
                                                      
                                                         
                                                       
                                                         
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                        <td width="20%">
                                            {{$price_type}}
                                        </td>
                                        
                                        <td width="20%">
                                        
                                            <?php if(!empty($price)){ ?> 
                                            <span class="hotelDatesInOutCls" style="margin-right: 10px;"><b><?php echo !empty($price) ? '&pound;'.$price : '-'; ?> <?=!empty($price_type)?$price_type:'pppn'?> </b></span>
                                            <?php } ?>
                                        </td>
                                        <td width="20%">
                                            <?php if(!empty($price_out)){ ?> 
                                             <span class="hotelDatesInOutCls" style="margin-right: 10px;"><b><?php echo !empty($price_out) ? '&pound;'.$price_out : '-'; ?> <?=(!empty($price_type) && $price_type == 'pppn')?'pp':((!empty($price_type) && $price_type == 'prpn')?$price_type:'pp')?></b></span>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <tr>
                                         <?php

                                            $checked = '';
                                            $price = '';
                                            $price_out = '';
                                            $price_type = '';
                                            if(!empty($value->hotelDatesSupplements)){
                                                if (in_array(3, $value->hotelDatesSupplements))
                                                {
                                                    $srchKey = array_search(3,$value->hotelDatesSupplements);
                                                    $price = $hotelDatesSupplements[$srchKey]['price'];
                                                    $price_out = $hotelDatesSupplements[$srchKey]['price_out'];
                                                    $price_type = $hotelDatesSupplements[$srchKey]['price_type'];
                                                    $checked = 'checked';
                                                }  
                                            }
                                            ?>
                                        <td width="40%">
                                            <div class="inclusionsSections">
                                                <div class="checkarea_part_Dates">
                                                    <label class="checkbox_div">
                                                      <?php if(!empty($checked)){ ?>
                                                         <img src="{{ public_path('images/tick.png') }}" alt="" style="width: 10px; height: 10px;">
                                                     <?php } ?>
                                                     <span class="notClickedCls ">Executive/De Luxe/Superior Rooms </span>
                                                      
                                                      <span class="checkmark"></span>
                                                      
                                                         
                                                       
                                                         
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                        <td width="20%">
                                             {{$price_type}}
                                        </td>
                                        
                                        <td width="20%">
                                        
                                            <?php if(!empty($price)){ ?> 
                                            <span class="hotelDatesInOutCls" style="margin-right: 10px;"><b><?php echo !empty($price) ? '&pound;'.$price : '-'; ?> <?=!empty($price_type)?$price_type:'pppn'?> </b></span>
                                            <?php } ?>
                                        </td>
                                        <td width="20%">
                                            <?php if(!empty($price_out)){ ?> 
                                             <span class="hotelDatesInOutCls" style="margin-right: 10px;"><b><?php echo !empty($price_out) ? '&pound;'.$price_out : '-'; ?> <?=(!empty($price_type) && $price_type == 'pppn')?'pp':((!empty($price_type) && $price_type == 'prpn')?$price_type:'pp')?></b></span>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <tr>
                                         <?php

                                            $checked = '';
                                            $price = '';
                                            $price_out = '';
                                            $price_type = '';
                                            if(!empty($value->hotelDatesSupplements)){
                                                if (in_array(4, $value->hotelDatesSupplements))
                                                {
                                                    $srchKey = array_search(4,$value->hotelDatesSupplements);
                                                    $price = $hotelDatesSupplements[$srchKey]['price'];
                                                    $price_out = $hotelDatesSupplements[$srchKey]['price_out'];
                                                    $price_type = $hotelDatesSupplements[$srchKey]['price_type'];
                                                    $checked = 'checked';
                                                }  
                                            }
                                            ?>
                                        <td width="40%">
                                            <div class="inclusionsSections">
                                                <div class="checkarea_part_Dates">
                                                    <label class="checkbox_div">
                                                        <?php if(!empty($checked)){ ?>
                                                         <img src="{{ public_path('images/tick.png') }}" alt="" style="width: 10px; height: 10px;">
                                                     <?php } ?>
                                                     <span class="notClickedCls ">Dbl/tw room for sole </span>
                                                      
                                                      <span class="checkmark"></span>
                                                      
                                                         
                                                       
                                                         
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                        <td width="20%">
                                            {{$price_type}}
                                        </td>
                                       
                                        <td width="20%">
                                        
                                            <?php if(!empty($price)){ ?> 
                                            <span class="hotelDatesInOutCls" style="margin-right: 10px;"><b><?php echo !empty($price) ? '&pound;'.$price : '-'; ?> <?=!empty($price_type)?$price_type:'pppn'?> </b></span>
                                            <?php } ?>
                                        </td>
                                        <td width="20%">
                                            <?php if(!empty($price_out)){ ?> 
                                             <span class="hotelDatesInOutCls" style="margin-right: 10px;"><b><?php echo !empty($price_out) ? '&pound;'.$price_out : '-'; ?> <?=(!empty($price_type) && $price_type == 'pppn')?'pp':((!empty($price_type) && $price_type == 'prpn')?$price_type:'pp')?></b></span>
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
                                                Supplements
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 24px; text-align: left; color: #14213D; padding: 15px 10px;">

                                                <?php
                                                $hotel_dates_supplements = '';
                                               if(!empty($is_contract))
                                               {
                                                if(isset($is_contract_edit) && !empty($is_contract_edit))
                                                {
                                                    $hotel_dates_supplements = 


DB::connection('mysql_veenus')->table('hotel_dates_supplements')->where('hotel_dates_id', $hotel_book_date_id)->get()->toArray();
                                                }
                                                else{
                                                    $hotel_dates_supplements = 


DB::connection('mysql_veenus')->table('contract_hotel_dates_supplements')->where('hotel_dates_id', $hotel_book_date_id)->get()->toArray();
                                                }
                                                
                                                

                                               }
                                               else
                                               {
                                                $hotel_dates_supplements = 


DB::connection('mysql_veenus')->table('hotel_dates_supplements')->where('hotel_dates_id', $hotel_book_date_id)->get()->toArray();

                                               }
                                                
                                                  if(!empty($hotel_dates_supplements)){
                                                    echo '<ul>';
                                                    foreach ($hotel_dates_supplements as $key => $svalue) {
                                                        if(!empty($hotel->preferred_currency) && $hotel->preferred_currency == 1){
                                                             $price = isset($svalue->price)?sprintf('%0.2f',$svalue->price):'0';
                                                             $currency_symbol = '£';
                                                        }
                                                        else
                                                        {
                                                            $price = isset($svalue->price_euro_in)?sprintf('%0.2f',$svalue->price_euro_in):'0';
                                                            $currency_symbol = '€';
                                                        }
                                                       
                                                        $price_out = isset($svalue->price_out)?sprintf('%0.2f',$svalue->price_out):'0';
                                                        $price_euro_in = isset($svalue->price_euro_in)?sprintf('%0.2f',$svalue->price_euro_in):'0';
                                                        $price_euro_out = isset($svalue->price_euro_out)?sprintf('%0.2f',$svalue->price_euro_out):'0';
                                                        $price_type = $svalue->price_type;
                                                        if($svalue->supplements == 1){
                                                            echo '<li>Water view (Sea/Lake/River) '.$svalue->price_type.': <strong>'.$currency_symbol.$price.'</strong></li>';
                                                        }elseif($svalue->supplements == 2){
                                                            echo '<li>View (Garden/Balcony) '.$svalue->price_type.': <strong>'.$currency_symbol.$price.'</strong></li>';
                                                        }elseif($svalue->supplements == 3){
                                                            echo '<li>Executive/De Luxe/Superior Rooms '.$svalue->price_type.': <strong>'.$currency_symbol.$price.'</strong></li>';
                                                        }elseif($svalue->supplements == 4){
                                                            echo '<li>Dbl/tw room for sole '.$svalue->price_type.': <strong>'.$currency_symbol.$price.'</strong></li>';
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
        <td style="padding-bottom: 10px;">

            <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                <tr>

                    <td bgcolor="#FFFFFF" style="background-color: #FFFFFF; border: solid 1px #CFCFCF; -moz-box-shadow: 0px 3px 6px #00000029; -webkit-box-shadow: 0px 3px 6px #00000029; box-shadow: 0px 3px 6px #00000029;">

                        <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">

                            <tr>
                                  <td bgcolor="#F2F2F2" style="font-family: 'Montserrat', sans-serif;background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 14px; font-weight: 700; line-height: 18px; text-align: left; color: #14213D; padding: 5px 15px;">
                                   Additional information 
                                </td>
                            </tr>

                            <tr>
                                <td style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 18px; text-align: left; color: #14213D; padding: 15px 10px;">

                                    {!! !empty($experienceDate->ratesallocation)?nl2br($experienceDate->ratesallocation):nl2br($value->ratesallocation) !!}

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
                                  <td bgcolor="#F2F2F2" style="font-family: 'Montserrat', sans-serif;background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 14px; font-weight: 700; line-height: 18px; text-align: left; color: #14213D; padding: 5px 15px;">
                                    Meal Basis
                                </td>
                            </tr>

                            <tr>
                                <td style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 18px; text-align: left; color: #14213D; padding: 15px 10px;">

                                     <?php
                                     /*echo '<pre>';
                                     print_r($value->meal_basic_id);*/
                                     $name1 = '';
                                             foreach ($MealBasicList as $keyMeal => $valueMeal) {
                                                $selected = '';

                                                if(!empty($value->meal_basic_id) && ($value->meal_basic_id == $valueMeal->id)){
                                                    $name1 = $valueMeal->name;
                                                } ?>
                                                
                                            <?php } ?>
                                            {{$name1}}

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
                                  <td bgcolor="#F2F2F2" style="font-family: 'Montserrat', sans-serif;background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 14px; font-weight: 700; line-height: 18px; text-align: left; color: #14213D; padding: 5px 15px;">
                                    Meal Arrangements
                                </td>
                            </tr>

                            <tr>
                                <td style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 18px; text-align: left; color: #14213D; padding: 15px 10px;">

                                    {!! !empty($experienceDate->hc_mean_arrangements)?nl2br($experienceDate->hc_mean_arrangements):nl2br($value->hc_mean_arrangements) !!}

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
                                  <td bgcolor="#F2F2F2" style="font-family: 'Montserrat', sans-serif;background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 14px; font-weight: 700; line-height: 18px; text-align: left; color: #14213D; padding: 5px 15px;">
                                     Free Place
                                </td>
                            </tr>

                            <tr>
                                <td style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 18px; text-align: left; color: #14213D; padding: 15px 10px;">

                                    {!! !empty($experienceDate->hc_free_place)?nl2br($experienceDate->hc_free_place):nl2br($value->hc_free_place) !!}

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
                                  <td bgcolor="#F2F2F2" style="font-family: 'Montserrat', sans-serif;background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 14px; font-weight: 700; line-height: 18px; text-align: left; color: #14213D; padding: 5px 15px;">
                                    Inclusions
                                </td>
                            </tr>

                            <tr>
                                <td style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 18px; text-align: left; color: #14213D; padding: 15px 10px;">
                                    {!! !empty($experienceDate->hc_inclusions)?nl2br($experienceDate->hc_inclusions):nl2br($value->hc_inclusions) !!}
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
                                  <td bgcolor="#F2F2F2" style="font-family: 'Montserrat', sans-serif;background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 14px; font-weight: 700; line-height: 18px; text-align: left; color: #14213D; padding: 5px 15px;">
                                    Services and Facilities
                                </td>
                            </tr>

                            <tr>
                                <td style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 18px; text-align: left; color: #14213D; padding: 15px 10px;">

                                    {!! !empty($experienceDate->hc_services_facilities)?nl2br($experienceDate->hc_services_facilities):nl2br($value->hc_services_facilities) !!}

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
                                  <td bgcolor="#F2F2F2" style="font-family: 'Montserrat', sans-serif;background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 14px; font-weight: 700; line-height: 18px; text-align: left; color: #14213D; padding: 5px 15px;">
                                    Terms and Conditions
                                </td>
                            </tr>

                            <tr>
                                <td style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 18px; text-align: left; color: #14213D; padding: 15px 10px;">

                                    {!! !empty($experienceDate->hc_terms_conditions)?nl2br($experienceDate->hc_terms_conditions):nl2br($value->hc_terms_conditions) !!}

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
        <td style="padding-bottom: 10px;">

            <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                <tr>

                    <td bgcolor="#FFFFFF" style="background-color: #FFFFFF; border: solid 1px #CFCFCF; -moz-box-shadow: 0px 3px 6px #00000029; -webkit-box-shadow: 0px 3px 6px #00000029; box-shadow: 0px 3px 6px #00000029;">

                        <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">

                            <tr>
                                <td bgcolor="#F2F2F2" style="font-family: 'Montserrat';background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 14px; font-weight: 650; line-height: 18px; text-align: left; color: #14213D; padding: 5px 15px;">
                                    Cancellation Date
                                </td>
                            </tr>

                            <tr>
                                <td style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 18px; text-align: left; color: #14213D; padding: 15px 10px;">

                                    {!! !empty($value->cancellation_days)?nl2br($value->cancellation_days):'' !!}

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
        <td style="padding-bottom: 10px;">

            <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                <tr>

                    <td bgcolor="#FFFFFF" style="background-color: #FFFFFF; border: solid 1px #CFCFCF; -moz-box-shadow: 0px 3px 6px #00000029; -webkit-box-shadow: 0px 3px 6px #00000029; box-shadow: 0px 3px 6px #00000029;">

                        <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">

                            <tr>
                                <td bgcolor="#F2F2F2" style="font-family: 'Montserrat';background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 14px; font-weight: 650; line-height: 18px; text-align: left; color: #14213D; padding: 5px 15px;">
                                    Event
                                </td>
                            </tr>

                            <tr>
                                <td style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 18px; text-align: left; color: #14213D; padding: 15px 10px;">

                                    {!! !empty($value->events)?'Yes':'No' !!}

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



<!-- START OF SIGNATURES -->
                            <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                                <tr>
                                    <td>
                                        <tr>
                                        <td style=" font-size: 14px; font-weight: 400; line-height: 18px; text-align: left; color: #14213D; padding: 5px 15px;font-family: 'Calibri', sans-serif;">
                                            <p>We agree that the booking details are correct and are subject to the terms and conditions which are available upon request.</p>
                                            <p>&nbsp;</p>
                                            <p>&nbsp;</p>
                                            <p>Hotel Signature <span style="border-bottom: 1px solid #000;padding-bottom:5px; "><?php echo !empty($hotel_sign)?$hotel_sign:'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'; ?></span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Print Name <span style="border-bottom: 1px solid #000;padding-bottom:5px;"><?php echo !empty($print_name)?$print_name:'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'; ?></span></p>
                                            <p>Please confirm that you are holding the above accommodation by returning a signed copy of this document. If no confirmation is received within 72 hours, we shall assume you are holding this allocation.</p>
                                        </td>
                                    </tr>
                                    </td>
                                </tr>
                                <tr>

                                    <!-- <td width="50%" align="left" valign="middle">

                                        <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">

                                            <tr>
                                                <td style="font-family: 'Playfair Display', serif; font-size: 50px; font-weight: 400; font-style: italic; line-height: 60px; text-align: left; color: #CFCFCF; padding-bottom: 20px;">
                                                    B. Collaborator
                                                </td>
                                            </tr>

                                            <tr>
                                                <td style="font-family: 'Montserrat', sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; text-align: left; color: #14213D;">
                                                    Bob Collaborator<br>
                                                    <span style="font-weight: 400;">Grand Tours</span>
                                                </td>
                                            </tr>

                                        </table>

                                    </td> -->

                                    <td width="50%" align="left" valign="middle">

                                        <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                                            <?php if(isset($sign_name_etc) && !empty($sign_name_etc)){ ?>
                                                <tr>
                                                    <td style="font-family: 'Calibri', serif; font-size: 50px; font-weight: 400; font-style: italic; line-height: 60px; text-align: left; color: #CFCFCF; padding-bottom: 20px;">
                                                        <?php echo $sign_name_etc; ?>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td style="font-family: 'Calibri', sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; text-align: left; color: #14213D;">
                                                        <?php echo $sign_name_etc; ?><br>
                                                        <?php 
                                                        $title = '';
                                                        foreach($signature_list as $srow)
                                                        {

                                                           if($srow->name == $sign_name_etc)
                                                           {
                                                            $title = $srow->description;
                                                           }
                                                        }
                                                        echo '<span style="font-weight: 400;">'.$title.'</span>'; ?>
                                                        <?php /*if($sign_name_etc == 'Grace Selby'){
                                                            echo '<span style="font-weight: 650;">Experience Cooridnator</span>';
                                                        }elseif($sign_name_etc == 'Ranjiv Bhalla'){
                                                            echo '<span style="font-weight: 650;">Director</span>';
                                                        }elseif($sign_name_etc == 'Gurpreet Kalsi'){
                                                            echo '<span style="font-weight: 650;">Senior Experience Designer</span>';
                                                        }elseif($sign_name_etc == 'Gurpreet Kalsi'){
                                                            echo '<span style="font-weight: 650;">Senior Experience Designer</span>';
                                                        }*/
                                                        ?>
                                                         <?php
                                                            echo '<p style="color:#cccccc;">'. date('d/m/Y',strtotime($value->hc_sign_date)).'</p>';
                                                        ?>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            

                                        </table>

                                    </td>

                                </tr>
                            </table>
                            <!-- END OF SIGNATURES -->
<?php } ?>