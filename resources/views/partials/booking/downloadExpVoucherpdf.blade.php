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
      font-size: 11px;
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

                  <td width="50" align="left" valign="top" style="padding-bottom: 40px;">
                    <!-- <div class="header">
                <p style="font-family: 'Montserrat', sans-serif; font-size: 11px;"><?=date('d-m-Y, H:i')?></p>
            </div> -->
                   <!--  <img src="{{ public_path('images/logo2x.png') }}" alt="" style="width: 90px; height: 100px;"> -->

        <!-- <img src="{{ asset('images/logo2x.png') }}" alt="Veenus"> -->
        
    </td>
   
  
  <td align="center" valign="top" style="padding-bottom: 40px;">

      <table width="80%" align="center" cellpadding="0" cellspacing="0" border="0">

          <tr>
              <td align="center" style="font-family: 'Montserrat', sans-serif; font-size: 11px; /*font-weight: 700;*/ color: #14213D; line-height: 5px; text-align: center; padding-bottom: 5px;">
                <img src="{{ public_path('images/logo2x.png') }}" alt="" style="width: 80px; height: 90px;">
                <br/>
                <p style="padding: 0px;">Veenus Ltd, Sir Henry Darvill House, 8-10 William St, Windsor, Berkshire</p>
                <p style="padding: 0px;">England, Windsor SL4 1BA. Telephone : +44 (0)1753 836600</p>
                <p style="padding: 0px;">Email : tours@veenus.com Website : www.veenus.com</p>
                  
              </td>
          </tr>
          <tr>
              <td align="center" style="font-family: 'Montserrat', sans-serif; font-size: 22px; font-weight: 700; color: #14213D; line-height: 25px; text-align: center; padding-bottom: 5px;">
                
                  <?php echo 'EXPERIENCE VOUCHER'; ?>
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
        <td style="padding-bottom: 10px;">

            <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                <tr>

                    <td bgcolor="#FFFFFF" style="background-color: #FFFFFF; border: solid 1px #CFCFCF; -moz-box-shadow: 0px 3px 6px #00000029; -webkit-box-shadow: 0px 3px 6px #00000029; box-shadow: 0px 3px 6px #00000029;">

                        <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">

                            <tr>
                                <td bgcolor="#F2F2F2" style="font-family: 'Montserrat', sans-serif;background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 11px; font-weight: 700; line-height: 15px; text-align: left; color: #14213D; padding: 5px 10px;">
                                    Ref
                                </td>
                            </tr>

                            <tr>
                                <td style="font-family: 'Montserrat', sans-serif; font-size: 11px;  line-height: 10px; text-align: left; color: #14213D; padding: 5px 10px;">
                                    {{$attractions_exp->ref_nr}}
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
                                <td bgcolor="#F2F2F2" style="font-family: 'Montserrat', sans-serif;background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 11px; font-weight: 700; line-height: 15px; text-align: left; color: #14213D; padding: 5px 10px;">
                                    Experience Booking Details
                                </td>
                            </tr>

                            <tr>
                                <td style="font-family: 'Montserrat', sans-serif; font-size: 11px;  line-height: 10px; text-align: left; color: #14213D; padding: 5px 10px;">
                                    <b>{{ $attractions->name }}</b><br/>
                                    Address : {{ $attractions->address }}<br/>
                                    {{ !empty($attractions->main_contact_number)?'Telephone : '.$attractions->main_contact_number:'' }} 
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
        <td style="padding-bottom: 10px;">

            <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                <tr>

                    <td align="left" valign="top" width="50%" style="padding-right: 10px;">

                        <table width="100%" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" border="0" style="background-color: #FFFFFF; border: solid 1px #CFCFCF; -moz-box-shadow: 0px 3px 6px #00000029; -webkit-box-shadow: 0px 3px 6px #00000029; box-shadow: 0px 3px 6px #00000029;">

                            <tr>
                                <td bgcolor="#F2F2F2" style="font-family: 'Montserrat', sans-serif;background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 11px; font-weight: 700; line-height: 15px; text-align: left; color: #14213D; padding: 5px 10px;">
                                    Group Name
                                </td>
                            </tr>

                            <tr>
                                <td style="font-family: 'Montserrat', sans-serif; font-size: 11px; font-weight: 400; line-height: 15px; text-align: left; color: #526170; padding: 5px 10px;">
                                    {{(!empty($attractions_exp->group_name)?$attractions_exp->group_name:$cart_detail->name)}}
                                </td>
                            </tr>

                        </table>

                    </td>

                    <td align="right" valign="top" width="50%" style="padding-left: 10px;">

                        <table width="100%" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" border="0" style="background-color: #FFFFFF; border: solid 1px #CFCFCF; -moz-box-shadow: 0px 3px 6px #00000029; -webkit-box-shadow: 0px 3px 6px #00000029; box-shadow: 0px 3px 6px #00000029;">

                            <tr>
                                <td bgcolor="#F2F2F2" style="font-family: 'Montserrat', sans-serif;background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 11px; font-weight: 700; line-height: 15px; text-align: left; color: #14213D; padding: 5px 10px;">
                                    No of pax
                                </td>
                            </tr>

                            <tr>
                                <td style="font-family: 'Montserrat', sans-serif; font-size: 11px; font-weight: 400; line-height: 15px; text-align: left; color: #526170; padding: 5px 10px;">
                                    <?php $total_pax = get_total_pax($cart_exp_id); $ticket = explode('pax',$total_pax); 
                                    $ticket_value = !empty($ticket[1])?$ticket[1]:''; ?>
                                    <!-- {{$total_pax}} -->
                                    {{trim($ticket[0])}} pax {{($attractions_exp->guest_nr == 2)?$ticket_value:''}}
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
        <td style="padding-bottom: 10px;">

            <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                <tr>

                    <td align="left" valign="top" width="50%" style="padding-right: 10px;">

                        <table width="100%" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" border="0" style="background-color: #FFFFFF; border: solid 1px #CFCFCF; -moz-box-shadow: 0px 3px 6px #00000029; -webkit-box-shadow: 0px 3px 6px #00000029; box-shadow: 0px 3px 6px #00000029;">

                            <tr>
                                <td bgcolor="#F2F2F2" style="font-family: 'Montserrat', sans-serif;background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 11px; font-weight: 700; line-height: 15px; text-align: left; color: #14213D; padding: 5px 10px;">
                                    Date
                                </td>
                            </tr>

                            <tr>
                                <td style="font-family: 'Montserrat', sans-serif; font-size: 11px; font-weight: 400; line-height: 15px; text-align: left; color: #526170; padding: 5px 10px;">
                                    {{!empty($attractions_exp->date)?date("D d M 'y",strtotime($attractions_exp->date)):''}}
                                </td>
                            </tr>

                        </table>

                    </td>

                    <td align="right" valign="top" width="50%" style="padding-left: 10px;">

                        <table width="100%" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" border="0" style="background-color: #FFFFFF; border: solid 1px #CFCFCF; -moz-box-shadow: 0px 3px 6px #00000029; -webkit-box-shadow: 0px 3px 6px #00000029; box-shadow: 0px 3px 6px #00000029;">

                            <tr>
                                <td bgcolor="#F2F2F2" style="font-family: 'Montserrat', sans-serif;background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 11px; font-weight: 700; line-height: 15px; text-align: left; color: #14213D; padding: 5px 10px;">
                                    Time
                                </td>
                            </tr>

                            <tr>
                                <td style="font-family: 'Montserrat', sans-serif; font-size: 11px; font-weight: 400; line-height: 15px; text-align: left; color: #526170; padding: 5px 10px;">
                                    {{(!empty($attractions_exp->time)?substr($attractions_exp->time, 0, -3).' hrs':(!empty(substr($attractions->time, 0, -3)?substr($attractions->time, 0, -3).' hrs':'')))}}
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
                                <td bgcolor="#F2F2F2" style="font-family: 'Montserrat', sans-serif;background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 11px; font-weight: 700; line-height: 15px; text-align: left; color: #14213D; padding: 5px 10px;">
                                    Experience inclusions
                                </td>
                            </tr>

                            <tr>
                                <td style="font-family: 'Montserrat', sans-serif; font-size: 11px;  line-height: 10px; text-align: left; color: #14213D ; padding: 5px 10px;">
                                    
                                    {!! !empty($attractions_exp->exp_inclusions) ? nl2br($attractions_exp->exp_inclusions) : nl2br($attractions->exp_inclusions) !!}

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
                                <td bgcolor="#F2F2F2" style="font-family: 'Montserrat', sans-serif;background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 11px; font-weight: 700; line-height: 15px; text-align: left; color: #14213D; padding: 5px 10px;">
                                    Coach Drop-off
                                </td>
                            </tr>

                            <tr>
                                <td style="font-family: 'Montserrat', sans-serif; font-size: 11px;  line-height: 10px; text-align: left; color: #14213D ; padding: 5px 10px;">
                                    
                                    {!! !empty($attractions_exp->coach_dropoff) ? nl2br($attractions_exp->coach_dropoff) : nl2br($attractions->coach_dropoff) !!}

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
                                <td bgcolor="#F2F2F2" style="font-family: 'Montserrat', sans-serif;background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 11px; font-weight: 700; line-height: 15px; text-align: left; color: #14213D; padding: 5px 10px;">
                                    Coach Parking
                                </td>
                            </tr>

                            <tr>
                                <td style="font-family: 'Montserrat', sans-serif; font-size: 11px;  line-height: 10px; text-align: left; color: #14213D ; padding: 5px 10px;">
                                    
                                    {!! !empty($attractions_exp->coach_parking) ? nl2br($attractions_exp->coach_parking) : nl2br($attractions->coach_parking) !!}

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
                                <td bgcolor="#F2F2F2" style="font-family: 'Montserrat', sans-serif;background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 11px; font-weight: 700; line-height: 15px; text-align: left; color: #14213D; padding: 5px 10px;">
                                    General Info
                                </td>
                            </tr>

                            <tr>
                                <td style="font-family: 'Montserrat', sans-serif; font-size: 11px;  line-height: 10px; text-align: left; color: #14213D ; padding: 5px 10px;">
                                    
                                    {!! !empty($attractions_exp->general_info) ? nl2br($attractions_exp->general_info) : nl2br($attractions->general_info) !!}

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
                                <td bgcolor="#F2F2F2" style="font-family: 'Montserrat', sans-serif;background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 11px; font-weight: 700; line-height: 15px; text-align: left; color: #14213D; padding: 5px 10px;">
                                    Additional Information
                                </td>
                            </tr>

                            <tr>
                                <td style="font-family: 'Montserrat', sans-serif; font-size: 11px;  line-height: 10px; text-align: left; color: #14213D ; padding: 5px 10px;">
                                    
                                    {!! !empty($attractions_exp->additional_info) ? nl2br($attractions_exp->additional_info) : nl2br($attractions->additional_info) !!}

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


            
        