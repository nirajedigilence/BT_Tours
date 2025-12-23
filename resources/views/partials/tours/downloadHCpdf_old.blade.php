<table width="1025" align="center" cellpadding="0" cellspacing="0" border="0" style="margin: 0 auto;">
    <tr>
        <td align="center">

            <!-- START OF HEADER -->
            <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                <tr>

                    <td width="120" align="left" valign="top" style="padding-bottom: 40px;">

                        <img src="{{ asset('images/logo2x.png') }}" alt="Veenus" width="120" height="128" border="0" style="display: block; width: 120px; max-width: 120px; height: 128px; max-height: 128px; border: 0; outline: none; padding: 0; margin: 0;">

                    </td>

                    <td align="center" valign="top" style="padding-bottom: 40px;">

                        <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">

                            <tr>
                                <td align="center" style="font-family: 'Montserrat', sans-serif; font-size: 30px; font-weight: 600; color: #14213D; line-height: 36px; text-align: center;">
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
                    <td style="padding-bottom: 20px;">

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
                                            <td bgcolor="#F2F2F2" style="background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 16px; font-weight: 600; line-height: 24px; text-align: left; color: #14213D; padding: 5px 20px;">
                                                Hotel
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="padding: 30px 20px;">

                                                <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">

                                                    <tr>
                                                        <td style="font-family: 'Montserrat', sans-serif; font-size: 18px; font-weight: 600; line-height: 27px; text-align: left; color: #14213D; padding-bottom: 15px;">
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
                                                        <td style="font-family: 'Montserrat', sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; text-align: left; color: #14213D;">
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
                                            <td bgcolor="#F2F2F2" style="background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 16px; font-weight: 600; line-height: 24px; text-align: left; color: #14213D; padding: 5px 20px;">
                                                Dates
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="font-family: 'Montserrat', sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; text-align: left; color: #14213D; padding: 30px 20px;">
                                                {{ date("D d M", strtotime($experienceDate->date_from)) }} - {{ date("D d M 'y", strtotime($experienceDate->date_to)) }}
                                            </td>
                                        </tr>

                                    </table>

                                </td>

                                <td align="right" valign="top" width="50%" style="padding-left: 10px;">

                                    <table width="100%" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" border="0" style="background-color: #FFFFFF; border: solid 1px #CFCFCF; -moz-box-shadow: 0px 3px 6px #00000029; -webkit-box-shadow: 0px 3px 6px #00000029; box-shadow: 0px 3px 6px #00000029;">

                                        <tr>
                                            <td bgcolor="#F2F2F2" style="background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 16px; font-weight: 600; line-height: 24px; text-align: left; color: #14213D; padding: 5px 20px;">
                                                No. of Nights
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="font-family: 'Montserrat', sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; text-align: left; color: #14213D; padding: 30px 20px;">
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
                    <td style="padding-bottom: 20px;">

                        <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                            <tr>

                                <td bgcolor="#FFFFFF" style="background-color: #FFFFFF; border: solid 1px #CFCFCF; -moz-box-shadow: 0px 3px 6px #00000029; -webkit-box-shadow: 0px 3px 6px #00000029; box-shadow: 0px 3px 6px #00000029;">

                                    <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">

                                        <tr>
                                            <td bgcolor="#F2F2F2" style="background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 16px; font-weight: 600; line-height: 24px; text-align: left; color: #14213D; padding: 5px 20px;">
                                                Rates & Allocation
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="padding: 14px 93px;">

                                                <table width="100%" align="center" cellpadding="0" cellspacing="16" border="0" style="border-collapse: separate;">

                                                    <tr>

                                                        <td width="132" height="43" align="left" valign="middle" style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 600; line-height: 21px; text-align: right; color: #14213D;">
                                                            Room Type
                                                        </td>

                                                        <td width="132" height="43" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center; color: #14213D;">
                                                            Single
                                                        </td>

                                                        <td width="132" height="43" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center; color: #14213D;">
                                                            Double
                                                        </td>

                                                        <td width="132" height="43" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center; color: #14213D;">
                                                            Twin
                                                        </td>

                                                        <td width="132" height="43" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center; color: #14213D;">
                                                            Triple
                                                        </td>

                                                        <td width="132" height="43" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center; color: #14213D;">
                                                            Quad
                                                        </td>

                                                        <td width="132" height="43" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center; color: #14213D;">
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


DB::connection('mysql_veenus')->table('hotel_dates')->where('hotel_id', $hotel->id)->get()->toArray();
                                                    if(!empty($hotel_dates)){
                                                        foreach ($hotel_dates as $key => $value) {

                                                            if(($value->date_in == $experienceDate->date_from) && ($value->date_out == $experienceDate->date_to)){
                                                                $sgl = $value->sgl;
                                                                $dbl = $value->dbl;
                                                                $twn = $value->twn;
                                                                $trp = $value->trp;
                                                                $qrd = $value->qrd;
                                                                $sgl_dr = $value->sgl_dr;
                                                                $night = $value->night;
                                                                $ratepp = number_format($value->rate_dbb,2); // added by niral
                                                                //$srspp = number_format($value->date_srs,2); // added by niral
                                                                $sgl_srs = number_format($value->sgl_srs,2);
                                                                $dbl_srs = number_format($value->dbl_srs,2);
                                                                $twn_srs = number_format($value->twn_srs,2);
                                                                $trp_srs = number_format($value->trp_srs,2);
                                                                $qrd_srs = number_format($value->qrd_srs,2);
                                                                $dr_srs = number_format($value->dr_srs,2);
                                                            }
                                                        }
                                                    }
                                                    
                                                    ?>
                                                    <tr>

                                                        <td width="132" height="43" align="left" valign="middle" style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 600; line-height: 21px; text-align: right; color: #14213D;">
                                                            No. Rooms
                                                        </td>

                                                        <td width="132" height="43" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 600; line-height: 21px; text-align: center; color: #14213D;">
                                                            <?php echo $sgl; ?>
                                                        </td>

                                                        <td width="132" height="43" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 600; line-height: 21px; text-align: center; color: #14213D;">
                                                            <?php echo $dbl; ?>
                                                        </td>

                                                        <td width="132" height="43" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 600; line-height: 21px; text-align: center; color: #14213D;">
                                                            <?php echo $twn; ?>

                                                        </td>

                                                        <td width="132" height="43" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 600; line-height: 21px; text-align: center; color: #C9C9C9;">
                                                            <?php echo $trp; ?>

                                                        </td>

                                                        <td width="132" height="43" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 600; line-height: 21px; text-align: center; color: #C9C9C9;">
                                                            <?php echo $qrd; ?>
                                                        </td>

                                                        <td width="132" height="43" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 600; line-height: 21px; text-align: center; color: #14213D;">
                                                            <?php echo $sgl_dr; ?>
                                                        </td>

                                                    </tr>

                                                    <tr>

                                                        <td width="132" height="43" align="left" valign="middle" style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 600; line-height: 21px; text-align: right; color: #14213D;">
                                                            Rate pp
                                                        </td>

                                                        <td width="132" height="43" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center; color: #14213D;">
                                                            &pound;<?php echo (!empty($ratepp) ? $ratepp : ''); ?>
                                                        </td>

                                                        <td width="132" height="43" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center; color: #14213D;">
                                                            &pound;<?php echo (!empty($ratepp) ? $ratepp : ''); ?>
                                                        </td>

                                                        <td width="132" height="43" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center; color: #14213D;">
                                                            &pound;<?php echo (!empty($ratepp) ? $ratepp : ''); ?>
                                                        </td>

                                                        <td width="132" height="43" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center; color: #14213D;">
                                                            &pound;<?php echo (!empty($ratepp) ? $ratepp : ''); ?>
                                                        </td>

                                                        <td width="132" height="43" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center; color: #14213D;">
                                                            &pound;<?php echo (!empty($ratepp) ? $ratepp : ''); ?>
                                                        </td>

                                                        <td width="132" height="43" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center; color: #14213D;">
                                                            &pound;0
                                                        </td>

                                                    </tr>

                                                    <tr>

                                                        <td width="132" height="43" align="left" valign="middle" style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 600; line-height: 21px; text-align: right; color: #14213D;">
                                                            SRS pp
                                                        </td>

                                                        <td width="132" height="43" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center; color: #14213D;">
                                                            &pound;<?php echo (!empty($sgl_srs) ? $sgl_srs : ''); ?>
                                                        </td>

                                                        <td width="132" height="43" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center; color: #14213D;">
                                                            &pound;<?php echo (!empty($dbl_srs) ? $dbl_srs : ''); ?>
                                                        </td>

                                                        <td width="132" height="43" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center; color: #14213D;">
                                                            &pound;<?php echo (!empty($twn_srs) ? $twn_srs : ''); ?>
                                                        </td>

                                                        <td width="132" height="43" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center; color: #14213D;">
                                                            &pound;<?php echo (!empty($trp_srs) ? $trp_srs : ''); ?>
                                                        </td>

                                                        <td width="132" height="43" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center; color: #14213D;">
                                                            &pound;<?php echo (!empty($qrd_srs) ? $qrd_srs : ''); ?>
                                                        </td>

                                                        <td width="132" height="43" align="left" valign="middle" style="border: solid 1px #A8A8A8; font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; line-height: 21px; text-align: center; color: #14213D;">
                                                            &pound;<?php echo (!empty($dr_srs) ? $dr_srs : ''); ?>
                                                        </td>

                                                    </tr>

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
                                            <td bgcolor="#F2F2F2" style="background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 16px; font-weight: 600; line-height: 24px; text-align: left; color: #14213D; padding: 5px 20px;">
                                                Supplements
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="font-family: 'Montserrat', sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; text-align: left; color: #14213D; padding: 30px 20px;">

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
                                                        if($value->supplements == 1){
                                                            echo '<li>Water view (Sea/Lake/River) prpn: <strong>&pound;'.$value->price.'</strong></li>';
                                                        }elseif($value->supplements == 2){
                                                            echo '<li>View (Garden/Balcony) prpn: <strong>&pound;'.$value->price.'</strong></li>';
                                                        }elseif($value->supplements == 3){
                                                            echo '<li>Executive/De Luxe/Superior Rooms prpn: <strong>&pound;'.$value->price.'</strong></li>';
                                                        }elseif($value->supplements == 4){
                                                            echo '<li>Dbl/tw room for sole pppn: <strong>&pound;'.$value->price.'</strong></li>';
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
                                            <td bgcolor="#F2F2F2" style="background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 16px; font-weight: 600; line-height: 24px; text-align: left; color: #14213D; padding: 5px 20px;">
                                                Meal Arrangements
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="font-family: 'Montserrat', sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; text-align: left; color: #14213D; padding: 30px 20px;">
                                                
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
                                            <td bgcolor="#F2F2F2" style="background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 16px; font-weight: 600; line-height: 24px; text-align: left; color: #14213D; padding: 5px 20px;">
                                                Free Place
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="font-family: 'Montserrat', sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; text-align: left; color: #14213D; padding: 30px 20px;">
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
                                            <td bgcolor="#F2F2F2" style="background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 16px; font-weight: 600; line-height: 24px; text-align: left; color: #14213D; padding: 5px 20px;">
                                                Inclusions
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="font-family: 'Montserrat', sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; text-align: left; color: #14213D; padding: 30px 20px;">
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
                                            <td bgcolor="#F2F2F2" style="background-color: #F2F2F2; border-bottom: solid 1px #CFCFCF; font-size: 16px; font-weight: 600; line-height: 24px; text-align: left; color: #14213D; padding: 5px 20px;">
                                                Services and Facilities
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="font-family: 'Montserrat', sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; text-align: left; color: #14213D; padding: 30px 20px;">
                                                
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
            <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                <tr>
                    <td style="padding-bottom: 80px;">

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
                                            <td style="font-family: 'Montserrat', sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; text-align: left; color: #14213D; padding: 30px 20px;">
                                                
                                                {!! nl2br($experienceDate->hc_terms_conditions) !!}

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

            <!-- START OF AGREEMENT -->
            <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                <tr>
                    <td style="font-family: 'Montserrat', sans-serif; font-size: 20px; font-weight: 400; line-height: 30px; text-align: center; color: #14213D; padding-bottom: 50px;">
                        We agree that the booking details are correct and are subject to the terms and conditions which are available upon request.
                    </td>
                </tr>
            </table>
            <!-- END OF AGREEMENT -->

            <!-- START OF SIGNATURES -->
            <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                <tr>

                    <td width="50%" align="left" valign="middle">

                        <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                            
                            <?php if(isset($experienceDate->sign_name_hc) && !empty($experienceDate->sign_name_hc)){ ?>
                                <tr>
                                    <td style="font-family: 'Playfair Display', serif; font-size: 50px; font-weight: 400; font-style: italic; line-height: 60px; text-align: left; color: #CFCFCF; padding-bottom: 20px;">
                                        <?php echo $experienceDate->sign_name_hc; ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="font-family: 'Montserrat', sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; text-align: left; color: #14213D;">
                                        <?php echo $experienceDate->sign_name_hc; ?><br>
                                        <?php if($experienceDate->sign_name_hc == 'Grace Selby'){
                                            echo '<span style="font-weight: 600;">Experience Cooridnator</span>';
                                        }elseif($experienceDate->sign_name_hc == 'Ranjiv Bhalla'){
                                            echo '<span style="font-weight: 600;">Director</span>';
                                        }elseif($experienceDate->sign_name_hc == 'Gurpreet Kalsi'){
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

        </td>
    </tr>
</table>
