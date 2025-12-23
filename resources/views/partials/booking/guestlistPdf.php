<table width="1630" align="center" cellpadding="0" cellspacing="0" border="0" style="margin: 0 auto;">
                <tr>
                    <td>

                        <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                            <tr>
                                <td style="padding-bottom: 100px;">

                                    <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                                        <tr>

                                            <td width="120" align="left" valign="middle">
                                                <img src="/images/logo2x.png" alt="Veenus" width="120" height="128" border="0" style="display: block; width: 120px; max-width: 120px; height: 128px; max-height: 128px; border: 0; outline: none; padding: 0; margin: 0;">
                                            </td>

                                            <td width="1510" align="right" valign="middle" style="padding-left: 50px;">

                                                <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                                                   
                                                    <tr>
                                                        <td style="font-family: 'sans-serif', sans-serif; font-size: 26px; font-weight: 600; color: #14213D; line-height: 30px; text-align: left; padding-bottom: 10px;">
                                                            {{$cart_experience->experience_name}} - Guest List
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td style="font-family: 'sans-serif', sans-serif; font-size: 25px; font-weight: 600; color: #14213D; line-height: 30px; text-align: left; padding-bottom: 5px;">
                                                            Tour: {{$cart_experience->experience_name}}
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td style="font-family: 'sans-serif', sans-serif; font-size: 25px; font-weight: 600; color: #14213D; line-height: 30px; text-align: left; padding-bottom: 5px;">
                                                            Hotel: {{$cart_experience->hotel_name}}
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td style="font-family: 'sans-serif', sans-serif; font-size: 25px; font-weight: 600; color: #14213D; line-height: 30px; text-align: left;">
                                                            Date: {{ date("D d M", strtotime($cart_experience->date_from)) }} - {{ date("D d M 'y", strtotime($cart_experience->date_to)) }} ( {{ $cart_experience->nights }} @if($cart_experience->nights > 1) nights @else night @endif )
                                                        </td>
                                                    </tr>

                                                </table>

                                            </td>

                                        </tr>
                                    </table>

                                </td>
                            </tr>
                        </table>

                        <!-- START OF SINGLE ROOMS TABLE -->
                        <table width="1400" align="center" cellpadding="0" cellspacing="0" border="0" style="margin: 0 auto;">
                            <tr>
                                <td style="padding-bottom: 50px;">

                                    <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0" style="border: solid 1px #EDEEEF; border-collapse: collapse;">

                                        <!-- START OF TABLE NAME -->
                                        <tr style="border: solid 1px #EDEEEF; border-collapse: collapse;">
                                            <td colspan="4" style="border: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 16px; font-weight: 600; color: #32363A; line-height: 25px; text-align: left; padding: 15px 20px;">
                                                Single rooms
                                            </td>
                                        </tr>
                                        <!-- END OF TABLE NAME -->

                                        <!-- START OF TABLE HEADINGS -->
                                        <tr>

                                            <th width="140" bgcolor="#FAFAFA" style="background-color: #FAFAFA; border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                No. of rooms
                                            </th>

                                            <th width="404" bgcolor="#FAFAFA" style="background-color: #FAFAFA; border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                Name
                                            </th>

                                            <th width="295" bgcolor="#FAFAFA" style="background-color: #FAFAFA; border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                Room requests
                                            </th>

                                            <th width="560" bgcolor="#FAFAFA" style="background-color: #FAFAFA; border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                Special requests
                                            </th>

                                        </tr>
                                        <!-- END OF TABLE HEADINGS -->

                                        <!-- START OF TABLE ROW -->
                                        <tr>

                                            <td width="140" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                1
                                            </td>

                                            <td width="404" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                Jane Macintosh
                                            </td>

                                            <td width="295" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                Superior Room
                                            </td>

                                            <td width="560" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                Mrs Macintosh is Vegetarian
                                            </td>

                                        </tr>
                                        <!-- END OF TABLE ROW -->

                                        <!-- START OF TABLE ROW -->
                                        <tr>

                                            <td width="140" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                2
                                            </td>

                                            <td width="404" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                Mike Templeman
                                            </td>

                                            <td width="295" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                
                                            </td>

                                            <td width="560" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                
                                            </td>

                                        </tr>
                                        <!-- END OF TABLE ROW -->

                                        <!-- START OF TABLE ROW -->
                                        <tr>

                                            <td width="140" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                3
                                            </td>

                                            <td width="404" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                Mark Johnson
                                            </td>

                                            <td width="295" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                
                                            </td>

                                            <td width="560" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                16/07/21
                                            </td>

                                        </tr>
                                        <!-- END OF TABLE ROW -->

                                        <!-- START OF TABLE ROW -->
                                        <tr>

                                            <td width="140" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                4
                                            </td>

                                            <td width="404" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                Joe Black
                                            </td>

                                            <td width="295" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                Sea View
                                            </td>

                                            <td width="560" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                Room with a nice View
                                            </td>

                                        </tr>
                                        <!-- END OF TABLE ROW -->

                                        <!-- START OF TABLE ROW -->
                                        <tr>

                                            <td width="140" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                5
                                            </td>

                                            <td width="404" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                Lin Blacksmith
                                            </td>

                                            <td width="295" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                Superior Room
                                            </td>

                                            <td width="560" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                16/07/21
                                            </td>

                                        </tr>
                                        <!-- END OF TABLE ROW -->

                                        <!-- START OF TABLE ROW -->
                                        <tr>

                                            <td width="140" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                6
                                            </td>

                                            <td width="404" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                Lucy Greatwood
                                            </td>

                                            <td width="295" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                
                                            </td>

                                            <td width="560" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                Low Room – Not Guaranteed
                                            </td>

                                        </tr>
                                        <!-- END OF TABLE ROW -->

                                        <!-- START OF TABLE ROW -->
                                        <tr>

                                            <td width="140" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                7
                                            </td>

                                            <td width="404" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                Danielle Pintrest
                                            </td>

                                            <td width="295" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                
                                            </td>

                                            <td width="560" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                Request to have a room with a window and not a skylight
                                            </td>

                                        </tr>
                                        <!-- END OF TABLE ROW -->

                                        <!-- START OF TABLE ROW -->
                                        <tr>

                                            <td width="140" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                8
                                            </td>

                                            <td width="404" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                Janet Jackson
                                            </td>

                                            <td width="295" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                
                                            </td>

                                            <td width="560" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                16/07/21
                                            </td>

                                        </tr>
                                        <!-- END OF TABLE ROW -->

                                    </table>

                                </td>
                            </tr>
                        </table>
                        <!-- END OF SINGLE ROOMS TABLE -->

                        <!-- START OF DOUBLE ROOMS TABLE -->
                        <table width="1400" align="center" cellpadding="0" cellspacing="0" border="0" style="margin: 0 auto;">
                            <tr>
                                <td style="padding-bottom: 50px;">

                                    <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0" style="border: solid 1px #EDEEEF; border-collapse: collapse;">

                                        <!-- START OF TABLE NAME -->
                                        <tr style="border: solid 1px #EDEEEF; border-collapse: collapse;">
                                            <td colspan="4" style="border: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 16px; font-weight: 600; color: #32363A; line-height: 25px; text-align: left; padding: 15px 20px;">
                                                Double rooms
                                            </td>
                                        </tr>
                                        <!-- END OF TABLE NAME -->

                                        <!-- START OF TABLE HEADINGS -->
                                        <tr>

                                            <th width="140" bgcolor="#FAFAFA" style="background-color: #FAFAFA; border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                No. of rooms
                                            </th>

                                            <th width="404" bgcolor="#FAFAFA" style="background-color: #FAFAFA; border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                Name
                                            </th>

                                            <th width="295" bgcolor="#FAFAFA" style="background-color: #FAFAFA; border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                Room requests
                                            </th>

                                            <th width="560" bgcolor="#FAFAFA" style="background-color: #FAFAFA; border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                Special requests
                                            </th>

                                        </tr>
                                        <!-- END OF TABLE HEADINGS -->

                                        <!-- START OF TABLE ROW -->
                                        <tr>

                                            <td width="140" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                1
                                            </td>

                                            <td width="404" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                Jane Macintosh<br>
                                                John Macintosh
                                            </td>

                                            <td width="295" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                Superior Room
                                            </td>

                                            <td width="560" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                Mrs Macintosh is Vegetarian
                                            </td>

                                        </tr>
                                        <!-- END OF TABLE ROW -->

                                        <!-- START OF TABLE ROW -->
                                        <tr>

                                            <td width="140" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                2
                                            </td>

                                            <td width="404" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                Mike Templeman<br>
                                                Jane Macintosh
                                            </td>

                                            <td width="295" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                
                                            </td>

                                            <td width="560" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                
                                            </td>

                                        </tr>
                                        <!-- END OF TABLE ROW -->

                                        <!-- START OF TABLE ROW -->
                                        <tr>

                                            <td width="140" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                3
                                            </td>

                                            <td width="404" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                Mark Johnson<br>
                                                Jane Macintosh
                                            </td>

                                            <td width="295" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                
                                            </td>

                                            <td width="560" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                16/07/21
                                            </td>

                                        </tr>
                                        <!-- END OF TABLE ROW -->

                                        <!-- START OF TABLE ROW -->
                                        <tr>

                                            <td width="140" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                4
                                            </td>

                                            <td width="404" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                Joe Black<br>
                                                Jane Macintosh
                                            </td>

                                            <td width="295" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                Sea View
                                            </td>

                                            <td width="560" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                Room with a nice View
                                            </td>

                                        </tr>
                                        <!-- END OF TABLE ROW -->

                                        <!-- START OF TABLE ROW -->
                                        <tr>

                                            <td width="140" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                5
                                            </td>

                                            <td width="404" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                Lin Blacksmith<br>
                                                Jane Macintosh
                                            </td>

                                            <td width="295" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                Superior Room
                                            </td>

                                            <td width="560" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                16/07/21
                                            </td>

                                        </tr>
                                        <!-- END OF TABLE ROW -->

                                        <!-- START OF TABLE ROW -->
                                        <tr>

                                            <td width="140" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                6
                                            </td>

                                            <td width="404" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                Lucy Greatwood<br>
                                                Jane Macintosh
                                            </td>

                                            <td width="295" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                
                                            </td>

                                            <td width="560" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                Low Room – Not Guaranteed
                                            </td>

                                        </tr>
                                        <!-- END OF TABLE ROW -->

                                        <!-- START OF TABLE ROW -->
                                        <tr>

                                            <td width="140" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                7
                                            </td>

                                            <td width="404" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                Danielle Pintrest<br>
                                                Jane Macintosh
                                            </td>

                                            <td width="295" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                
                                            </td>

                                            <td width="560" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                Request to have a room with a window and not a skylight
                                            </td>

                                        </tr>
                                        <!-- END OF TABLE ROW -->

                                        <!-- START OF TABLE ROW -->
                                        <tr>

                                            <td width="140" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                8
                                            </td>

                                            <td width="404" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                Janet Jackson<br>
                                                Jane Macintosh
                                            </td>

                                            <td width="295" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                
                                            </td>

                                            <td width="560" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                16/07/21
                                            </td>

                                        </tr>
                                        <!-- END OF TABLE ROW -->

                                    </table>

                                </td>
                            </tr>
                        </table>
                        <!-- END OF DOUBLE ROOMS TABLE -->

                        <!-- START OF TWIN ROOMS TABLE -->
                        <table width="1400" align="center" cellpadding="0" cellspacing="0" border="0" style="margin: 0 auto;">
                            <tr>
                                <td style="padding-bottom: 76px;">

                                    <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0" style="border: solid 1px #EDEEEF; border-collapse: collapse;">

                                        <!-- START OF TABLE NAME -->
                                        <tr style="border: solid 1px #EDEEEF; border-collapse: collapse;">
                                            <td colspan="4" style="border: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 16px; font-weight: 600; color: #32363A; line-height: 25px; text-align: left; padding: 15px 20px;">
                                                Twin rooms
                                            </td>
                                        </tr>
                                        <!-- END OF TABLE NAME -->

                                        <!-- START OF TABLE HEADINGS -->
                                        <tr>

                                            <th width="140" bgcolor="#FAFAFA" style="background-color: #FAFAFA; border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                No. of rooms
                                            </th>

                                            <th width="404" bgcolor="#FAFAFA" style="background-color: #FAFAFA; border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                Name
                                            </th>

                                            <th width="295" bgcolor="#FAFAFA" style="background-color: #FAFAFA; border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                Room requests
                                            </th>

                                            <th width="560" bgcolor="#FAFAFA" style="background-color: #FAFAFA; border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                Special requests
                                            </th>

                                        </tr>
                                        <!-- END OF TABLE HEADINGS -->

                                        <!-- START OF TABLE ROW -->
                                        <tr>

                                            <td width="140" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                1
                                            </td>

                                            <td width="404" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                Jane Macintosh<br>
                                                John Macintosh
                                            </td>

                                            <td width="295" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                Superior Room
                                            </td>

                                            <td width="560" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                Mrs Macintosh is Vegetarian
                                            </td>

                                        </tr>
                                        <!-- END OF TABLE ROW -->

                                        <!-- START OF TABLE ROW -->
                                        <tr>

                                            <td width="140" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                2
                                            </td>

                                            <td width="404" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                Mike Templeman<br>
                                                Jane Macintosh
                                            </td>

                                            <td width="295" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                
                                            </td>

                                            <td width="560" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                
                                            </td>

                                        </tr>
                                        <!-- END OF TABLE ROW -->

                                        <!-- START OF TABLE ROW -->
                                        <tr>

                                            <td width="140" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                3
                                            </td>

                                            <td width="404" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                Mark Johnson<br>
                                                Jane Macintosh
                                            </td>

                                            <td width="295" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                
                                            </td>

                                            <td width="560" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                16/07/21
                                            </td>

                                        </tr>
                                        <!-- END OF TABLE ROW -->

                                        <!-- START OF TABLE ROW -->
                                        <tr>

                                            <td width="140" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                4
                                            </td>

                                            <td width="404" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                Joe Black<br>
                                                Jane Macintosh
                                            </td>

                                            <td width="295" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                Sea View
                                            </td>

                                            <td width="560" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                Room with a nice View
                                            </td>

                                        </tr>
                                        <!-- END OF TABLE ROW -->

                                        <!-- START OF TABLE ROW -->
                                        <tr>

                                            <td width="140" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                5
                                            </td>

                                            <td width="404" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                Lin Blacksmith<br>
                                                Jane Macintosh
                                            </td>

                                            <td width="295" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                Superior Room
                                            </td>

                                            <td width="560" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                16/07/21
                                            </td>

                                        </tr>
                                        <!-- END OF TABLE ROW -->

                                        <!-- START OF TABLE ROW -->
                                        <tr>

                                            <td width="140" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                6
                                            </td>

                                            <td width="404" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                Lucy Greatwood<br>
                                                Jane Macintosh
                                            </td>

                                            <td width="295" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                
                                            </td>

                                            <td width="560" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                Low Room – Not Guaranteed
                                            </td>

                                        </tr>
                                        <!-- END OF TABLE ROW -->

                                        <!-- START OF TABLE ROW -->
                                        <tr>

                                            <td width="140" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                7
                                            </td>

                                            <td width="404" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                Danielle Pintrest<br>
                                                Jane Macintosh
                                            </td>

                                            <td width="295" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                
                                            </td>

                                            <td width="560" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                Request to have a room with a window and not a skylight
                                            </td>

                                        </tr>
                                        <!-- END OF TABLE ROW -->

                                        <!-- START OF TABLE ROW -->
                                        <tr>

                                            <td width="140" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                8
                                            </td>

                                            <td width="404" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                Janet Jackson<br>
                                                Jane Macintosh
                                            </td>

                                            <td width="295" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                
                                            </td>

                                            <td width="560" valign="middle" style="border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif', sans-serif; font-size: 12px; font-weight: 400; color: #32363A; line-height: 18px; text-align: left; padding: 12px 20px;">
                                                16/07/21
                                            </td>

                                        </tr>
                                        <!-- END OF TABLE ROW -->

                                    </table>

                                </td>
                            </tr>
                        </table>
                        <!-- END OF TWIN ROOMS TABLE -->

                        <!-- START OF ACCOMMODATION SUMMARY -->
                        <table width="1400" align="center" cellpadding="0" cellspacing="0" border="0" style="margin: 0 auto;">
                            <tr>
                                <td style="padding-bottom: 125px;">

                                    <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">

                                        <tr>
                                            <td colspan="2" style="font-family: 'sans-serif', sans-serif; font-size: 25px; font-weight: 700; color: #14213D; line-height: 30px; text-align: left; padding-bottom: 38px;">
                                                Accommodation Summary
                                            </td>
                                        </tr>

                                        <tr>

                                            <!-- START OF QUANTITY / ROOM TYPE -->
                                            <td width="1025" align="left" valign="top">

                                                <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">

                                                    <!-- START OF TABLE HEADINGS -->
                                                    <tr>

                                                        <th width="140" style="font-family: 'sans-serif', sans-serif; font-size: 20px; font-weight: 700; color: #14213D; line-height: 24px; text-align: center; padding: 0 20px 15px 20px;">
                                                            Quantity
                                                        </th>

                                                        <th width="885" style="font-family: 'sans-serif', sans-serif; font-size: 20px; font-weight: 700; color: #14213D; line-height: 24px; text-align: left; padding: 0 20px 15px 20px;">
                                                            Room Type
                                                        </th>

                                                    </tr>
                                                    <!-- END OF TABLE HEADINGS -->

                                                    <!-- START OF TABLE ROW -->
                                                    <tr>

                                                        <td width="140" valign="middle" style="font-family: 'sans-serif', sans-serif; font-size: 20px; font-weight: 400; color: #14213D; line-height: 24px; text-align: center; padding: 0 20px 15px 20px;">
                                                            8
                                                        </td>

                                                        <td width="885" valign="middle" style="font-family: 'sans-serif', sans-serif; font-size: 20px; font-weight: 400; color: #14213D; line-height: 24px; text-align: left; padding: 0 20px 15px 20px;">
                                                            Single Room
                                                        </td>

                                                    </tr>
                                                    <!-- END OF TABLE ROW -->

                                                    <!-- START OF TABLE ROW -->
                                                    <tr>

                                                        <td width="140" valign="middle" style="font-family: 'sans-serif', sans-serif; font-size: 20px; font-weight: 400; color: #14213D; line-height: 24px; text-align: center; padding: 0 20px 15px 20px;">
                                                            8
                                                        </td>

                                                        <td width="885" valign="middle" style="font-family: 'sans-serif', sans-serif; font-size: 20px; font-weight: 400; color: #14213D; line-height: 24px; text-align: left; padding: 0 20px 15px 20px;">
                                                            Twin Room
                                                        </td>

                                                    </tr>
                                                    <!-- END OF TABLE ROW -->

                                                    <!-- START OF TABLE ROW -->
                                                    <tr>

                                                        <td width="140" valign="middle" style="font-family: 'sans-serif', sans-serif; font-size: 20px; font-weight: 400; color: #14213D; line-height: 24px; text-align: center; padding: 0 20px 15px 20px;">
                                                            8
                                                        </td>

                                                        <td width="885" valign="middle" style="font-family: 'sans-serif', sans-serif; font-size: 20px; font-weight: 400; color: #14213D; line-height: 24px; text-align: left; padding: 0 20px 15px 20px;">
                                                            Double Room
                                                        </td>

                                                    </tr>
                                                    <!-- END OF TABLE ROW -->

                                                    <!-- START OF TABLE ROW -->
                                                    <tr>

                                                        <td width="140" valign="middle" style="font-family: 'sans-serif', sans-serif; font-size: 20px; font-weight: 400; color: #14213D; line-height: 24px; text-align: center; padding: 0 20px 15px 20px;">
                                                            1
                                                        </td>

                                                        <td width="885" valign="middle" style="font-family: 'sans-serif', sans-serif; font-size: 20px; font-weight: 400; color: #14213D; line-height: 24px; text-align: left; padding: 0 20px 15px 20px;">
                                                            Single (driver)
                                                        </td>

                                                    </tr>
                                                    <!-- END OF TABLE ROW -->

                                                </table>

                                            </td>
                                            <!-- END OF QUANTITY / ROOM TYPE -->

                                            <!-- START OF TOTALS -->
                                            <td width="375" align="right" valign="top">

                                                <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">

                                                    <tr>
                                                        <td style="font-family: 'sans-serif', sans-serif; font-size: 20px; font-weight: 400; color: #14213D; line-height: 24px; text-align: left; padding: 0 20px 15px 20px;">
                                                            <span style="font-weight: 600;">Total Pax:</span> 38 + Driver
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td style="font-family: 'sans-serif', sans-serif; font-size: 20px; font-weight: 400; color: #14213D; line-height: 24px; text-align: left; padding: 0 20px;">
                                                            <span style="font-weight: 600;">Total rooms:</span> 22<br>
                                                            (+ 1 single room for the driver)
                                                        </td>
                                                    </tr>

                                                </table>

                                            </td>
                                            <!-- END OF TOTALS -->

                                        </tr>
                                    </table>

                                </td>
                            </tr>
                        </table>
                        <!-- END OF ACCOMMODATION SUMMARY -->

                        <!-- START OF DISCLAIMER -->
                        <table width="1400" align="center" cellpadding="0" cellspacing="0" border="0" style="margin: 0 auto;">
                            <tr>
                                <td style="font-family: 'sans-serif', sans-serif; font-size: 20px; font-weight: 400; color: #14213D; line-height: 24px; text-align: center; padding-bottom: 78px;">
                                    Please note that 1 double and 1 twin room are being held on option until 17:00 on <span style="font-weight: 700;">12 April '20</span>, after which any unsold rooms will be released back at no cancellation charge.
                                </td>
                            </tr>
                        </table>
                        <!-- END OF DISCLAIMER -->

                        <!-- START OF FOOTER -->
                        <table align="center" cellpadding="0" cellspacing="0" border="0" style="margin: 0 auto;">
                            <tr>

                                <td align="center" valign="middle" style="font-family: 'sans-serif', sans-serif; font-size: 25px; font-weight: 700; color: #14213D; line-height: 30px; text-align: center; padding-right: 40px">
                                    Veenus
                                </td>

                                <td align="center" valign="middle" style="font-family: 'sans-serif', sans-serif; font-size: 20px; font-weight: 600; color: #14213D; line-height: 24px; text-align: center; padding-right: 75px">
                                    Telephone: 01753 836600
                                </td>

                                <td align="center" valign="middle" style="font-family: 'sans-serif', sans-serif; font-size: 20px; font-weight: 600; color: #14213D; line-height: 24px; text-align: center; padding-right: 75px">
                                    Email: vadmin@veenus.com
                                </td>

                                <td align="center" valign="middle" style="font-family: 'sans-serif', sans-serif; font-size: 20px; font-weight: 600; color: #14213D; line-height: 24px; text-align: center;">
                                    Address: Sir Henry Darvill House, 8-10 William St, Windsor SL4 1BA
                                </td>

                            </tr>
                        </table>
                        <!-- END OF FOOTER -->

                    </td>
                </tr>
            </table>
