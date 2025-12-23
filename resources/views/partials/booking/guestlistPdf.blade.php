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
         .page-break {
         page-break-before: always;
         }
         tr{
         page-break-inside:avoid !important;
         }
         footer {
         position: absolute;
         height: 100px;
         bottom: -5px;
         }
         .content {
         margin-bottom: 240px;
         }
         table.unit td {border: 1px soild #ccc;padding: 5px;}
         table td { text-align: left;vertical-align: top;}
      </style>
      <?php 
         $sgl = 0;
         $dbl = 0;
         $twn = 0;
         $trp = 0;
         $qrd = 0;
         $date_in = '';
         $date_out = '';
         $HotelDatesID = '';
         $night = '';
         $rooms_ppl = 0;
         $rooms_sold = 0;
         $sngSCnt = 0;
         $dblSCnt = 0;
         $twnSCnt = 0;
         $trpSCnt = 0;
         $qrdSCnt = 0;
         
         $sngSCnt1 = 0;
         $dblSCnt1 = 0;
         $twnSCnt1 = 0;
         $trpSCnt1 = 0;
         $qrdSCnt1 = 0;
         foreach ($cartExperiencesToRoomsAll as $key => $value) {
             //pr($value);
             if($value->room_id == '1' && $value->cancellation_request_status == null && ($value->deposit == '1' || $value->paid == '1')){
                if(($value->names != '' &&  $value->names != ',') || !empty($value->room_requests) || !empty($value->specials)) {   
                     $sngSCnt++;
                 }
                 }else if($value->room_id == '2'  && $value->cancellation_request_status == null && ($value->deposit == '1' || $value->paid == '1')){
                    if(($value->names != '' &&  $value->names != ',') || !empty($value->room_requests) || !empty($value->specials)) {   
                     $dblSCnt++;
                 }
                 }else if($value->room_id == '3' && $value->cancellation_request_status == null && ($value->deposit == '1' || $value->paid == '1')){
                    if(($value->names != '' &&  $value->names != ',') || !empty($value->room_requests) || !empty($value->specials)) {   
                     $twnSCnt++;
                    }
                 }else if($value->room_id == '4' && $value->cancellation_request_status == null && ($value->deposit == '1' || $value->paid == '1')){
                    if(($value->names != '' &&  $value->names != ',') || !empty($value->room_requests) || !empty($value->specials)) {   
                     $trpSCnt++;
                    }
                 }else if($value->room_id == '5' && $value->cancellation_request_status == null && ($value->deposit == '1' || $value->paid == '1')){ 
                    if(($value->names != '' &&  $value->names != ',') || !empty($value->room_requests) || !empty($value->specials)) {   
                     $qrdSCnt++;
                 }
                 }
         
                 if($value->room_id == '1' && $value->cancellation_request_status == null){
                     $sngSCnt1++;
                 }else if($value->room_id == '2' && $value->cancellation_request_status == null){
                     $dblSCnt1++;
                 }else if($value->room_id == '3' && $value->cancellation_request_status == null){
                     $twnSCnt1++;
                 }else if($value->room_id == '4' && $value->cancellation_request_status == null){
                     $trpSCnt1++;
                 }else if($value->room_id == '5' && $value->cancellation_request_status == null){ 
                     $qrdSCnt1++;
                 }
             if($value->paid == 1 || $value->deposit == 1){
                 $ple = 1;
                 if($value->room_id == 1)
                 {
                     $ple = 1;
                 }
                 else if($value->room_id == 2 || $value->room_id == 3)
                 {
                     $ple = 2;
                 }
                 else if($value->room_id == 4)
                 {
                     $ple = 3;
                 }
                 else if($value->room_id == 5)
                 {   
                     $ple = 4;
                 }
                 //$rooms_ppl = $rooms_ppl+$ple;
                 $rooms_sold = $rooms_sold+1;
                 if(!empty($value->names)){
                     $names = array_filter(explode(',', $value->names));
                     $rooms_ppl  = $rooms_ppl+count($names);
                 }
             }
         }
         $sglroom = 0;
             $dblroom = 0;
             $twnroom = 0;
             $trproom = 0;
             $qrdroom = 0;
         
             
         
             $sngLastAmt = $sngSCnt1;        
             if($sngSCnt1 > $sgl){
                 $sngLastAmt = $sngSCnt1;
             }
         
             $dblLastAmt = $dblSCnt1;        
             if($dblSCnt1 > $dbl){
                 $dblLastAmt = $dblSCnt1;
             }
             $twnLastAmt = $twnSCnt1;        
             if($twnSCnt1 > $twn){
                 $twnLastAmt = $twnSCnt1;
             }
             $trpLastAmt = $trpSCnt1;        
             if($trpSCnt1 > $trp){
                 $trpLastAmt = $trpSCnt1;
             }
             $qrdLastAmt = $qrdSCnt1;        
             if($qrdSCnt1 > $qrd){
                 $qrdLastAmt = $qrdSCnt1;
             }
         ?>
      <br>
      <!-- <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0" style="margin: 0 auto;">
         <tr>
             <td> -->
      <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
         <tr>
            <td style="padding-bottom: 50px;">
               <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                  <tr>
                     <td align="left" valign="middle">
                        <?php if(!empty($print)){ ?> 
                        <img src="/images/logo2x.png" alt="Veenus" width="120" height="128" border="0" style="display: block; width: 120px; max-width: 120px; height: 128px; max-height: 128px; border: 0; outline: none; padding: 0; margin: 0;">
                        <?php } else { ?> 
                        <img src="{{ public_path('images/logo2x.png') }}" alt="Veenus" width="120" height="128" border="0" style="display: block; width: 120px; max-width: 120px; height: 128px; max-height: 128px; border: 0; outline: none; padding: 0; margin: 0;">
                        <?php } ?>
                     </td>
                     <td align="right" valign="middle" style="vertical-align: middle;padding-left: 50px;">
                        <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                           <tr>
                              <td style="font-family: 'sans-serif'; font-size: 20px; font-weight: 400; color: #14213D; line-height: 20px; text-align: left; padding-bottom: 10px;">
                                 <b>{{$cart_experience->experience_name}} - Guest List</b>
                              </td>
                           </tr>
                           <tr>
                              <td style="font-family: 'sans-serif'; font-size: 17px; font-weight: 400; color: #14213D; line-height: 20px; text-align: left; padding-bottom: 5px;">
                                 Tour: {{$cart_experience->experience_name}}
                              </td>
                           </tr>
                           <tr>
                              <td style="font-family: 'sans-serif'; font-size: 17px; font-weight: 400; color: #14213D; line-height: 20px; text-align: left; padding-bottom: 5px;">
                                 <?php 
                                    if(!empty($experienceDates) && count($experienceDates) > 1){
                                      
                                            foreach ($experienceDates as $key => $value) { 
                                               if($value['id'] == $exp_id)
                                               {
                                                     echo $value['hotel_name'];
                                               }
                                               
                                               
                                                ?> 
                                 <?php  } }else{ ?> 
                                 Hotel: {{$cart_experience->hotel_name}}
                                 <?php }?>
                              </td>
                           </tr>
                           <tr>
                              <td style="font-family: 'sans-serif'; font-size: 17px; font-weight: 400; color: #14213D; line-height: 20px; text-align: left;">
                                 <?php 
                                    if(!empty($experienceDates) && count($experienceDates) > 1){
                                        echo 'Date: ';
                                        $i = 1;
                                            foreach ($experienceDates as $key => $value) { 
                                               if($value['id'] == $exp_id)
                                               {
                                                     echo date("D d M 'y", strtotime($value['date_from'])).'-'.date("D d M 'y", strtotime($value['date_to']));
                                               }
                                               
                                                $i++;
                                                ?> 
                                 <?php  } }else{ ?> 
                                 Date: {{ date("D d M", strtotime($cart_experience->date_from)) }} - {{ date("D d M 'y", strtotime($cart_experience->date_to)) }} ( {{ $cart_experience->nights }} @if($cart_experience->nights > 1) nights @else night @endif )
                                 <?php }?>
                              </td>
                           </tr>
                        </table>
                     </td>
                  </tr>
               </table>
            </td>
         </tr>
      </table>
      <?php $i = 0;if(!empty($sngSCnt)){ ?> 
      <!-- START OF SINGLE ROOMS TABLE -->
      <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0" style="border: solid 1px #EDEEEF; border-collapse: collapse;">
         <!-- START OF TABLE NAME -->
         <tr style="border: solid 1px #EDEEEF; border-collapse: collapse;">
            <td colspan="4" style="border: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif'; font-size: 15px; font-weight: 400; color: #32363A; line-height: 25px; text-align: left; padding: 2px 20px;">
               <b>Single rooms</b>
            </td>
         </tr>
         <!-- END OF TABLE NAME -->
         <!-- START OF TABLE HEADINGS -->
         <tr style="page-break-inside:avoid;">
            <th bgcolor="#FAFAFA" style="background-color: #FAFAFA; border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif'; font-size: 12px; font-weight: 400; color: #32363A; line-height: 15px; text-align: left; padding: 2px 20px;">
               No. of rooms
            </th>
            <th bgcolor="#FAFAFA" style="background-color: #FAFAFA; border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif'; font-size: 12px; font-weight: 400; color: #32363A; line-height: 15px; text-align: left; padding: 2px 20px;">
               Name
            </th>
            <th bgcolor="#FAFAFA" style="background-color: #FAFAFA; border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif'; font-size: 12px; font-weight: 400; color: #32363A; line-height: 15px; text-align: left; padding: 2px 20px;">
               Guest request
            </th>
            <th bgcolor="#FAFAFA" style="background-color: #FAFAFA; border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif'; font-size: 12px; font-weight: 400; color: #32363A; line-height: 15px; text-align: left; padding: 2px 20px;">
               Note for the hotel
            </th>
         </tr>
         <!-- END OF TABLE HEADINGS -->
         <?php
            $i = 0;
             if($cartExperiencesToRooms->count()>0){
                 $i = 1;
                 foreach ($cartExperiencesToRooms as $key => $value) {
                     if($value->room_id == 1 && empty($value->is_optional_room)){ 
                         if($value->deposit == '1' || $value->paid == '1')
                         {
            
             ?>
         <!-- START OF TABLE ROW -->
         <?php if(!empty($value->names) || !empty($value->room_requests) || !empty($value->specials)) { ?>
         <tr style="page-break-inside:avoid;">
            <td valign="middle" style="vertical-align: middle;border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif'; font-size: 12px; font-weight: 400; color: #32363A; line-height: 15px; text-align: left; padding: 2px 20px;">
               {{$i}}
            </td>
            <td valign="middle" style="vertical-align: middle;border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif'; font-size: 12px; font-weight: 400; color: #32363A; line-height: 15px; text-align: left; padding: 2px 20px;">
               <?php 
                  $names =array();
                  $names = explode(',',$value->names);
                  if(!empty($names)){
                      foreach($names as $name)
                      {
                          echo '<p style="margin:0;">'.$name.'</p>';
                      }
                  } ?>
            </td>
            <td valign="middle" style="vertical-align: middle; border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif'; font-size: 12px; font-weight: 400; color: #32363A; line-height: 15px; text-align: left; padding: 2px 20px;">
               <!-- {{ $value->room_requests }} -->
               <?php 
                  $supplements = array();
                  if(!empty($roomsSupplementsRequest)){
                      $pen_can = 0;
                      foreach ($roomsSupplementsRequest as $rskey => $rsvalue) {
                          if($rsvalue['cart_experiences_to_rooms_id'] == $value->id){
                              if($rsvalue['upgrade_request_sup_status'] == 'pending')
                              {
                                  $pen_can = 1;
                              }
                              if($rsvalue['upgrade_request_sup_status'] == 'accepted')
                              {
                                  if($rsvalue['supplements'] == 1){
                                      $rsvalue['supplements'] = 'Water view (Sea/Lake/River) ';
                                  }elseif($rsvalue['supplements'] == 2){
                                      $rsvalue['supplements'] = 'View (Garden/Balcony) ';
                                  }elseif($rsvalue['supplements'] == 3){
                                      $rsvalue['supplements'] = 'Executive/De Luxe/Superior Rooms ';
                                  }elseif($rsvalue['supplements'] == 4){
                                      $rsvalue['supplements'] = 'Dbl/tw room for sole ';
                                  }elseif($rsvalue['supplements'] == 7){
                                      $rsvalue['supplements'] = 'Walk In Shower ';
                                  }elseif($rsvalue['supplements'] == 8){
                                      $rsvalue['supplements'] = 'Ground Floor Room ';
                                  }elseif($rsvalue['supplements'] == 5){
                              $rsvalue['supplements'] = $rsvalue['upgrade_name'].' ';
                              }
                              $supplements[] = $rsvalue['supplements'];
                              }
                              
                          }
                      }
                  }
                  if(!empty($supplements)){
                      echo implode('<br>', $supplements);
                     
                  }
                  //addtional room supplemnt
                           $room_type_supplements = array();
                               
                          foreach ($value->cartExperiencesToRoomsRequests as $keyCRR => $valueCRR) {
                  
                              if($valueCRR['room_requests_id'] == 1){
                                          $valueCRR['supplements'] = 'Water view (Sea/Lake/River)';
                                      }elseif($valueCRR['room_requests_id'] == 2){
                                          $valueCRR['supplements'] = 'View (Garden/Balcony)';
                                      }elseif($valueCRR['room_requests_id'] == 3){
                                          $valueCRR['supplements'] = 'Executive/De Luxe/Superior Rooms';
                                      }elseif($valueCRR['room_requests_id'] == 4){
                                          $dbl_sole  = ((isset($rsvalue['upgrade_request_sup_status']) && $rsvalue['upgrade_request_sup_status'] == 'accepted')?'1':'1');
                                          $valueCRR['supplements'] = 'Dbl/tw room for sole';
                                      }elseif($valueCRR['room_requests_id'] == 5){
                                          $upgrade_name =  explode(',',$valueCRR['upgrade_name']);
                                              $upgrade_cost =  explode(',',$valueCRR['upgrade_cost']);
                  
                                              if(!empty($upgrade_name))
                                              {
                                                  $str_add = 'Others : ';
                                                  foreach($upgrade_name as $key=>$row)
                                                  {
                                                      $str_add .= $row.'('.$upgrade_cost[$key].')'.' ';
                                                  }
                                              }
                                          $valueCRR['supplements'] = rtrim($str_add);
                                      }
                              $room_type_supplements[] = $valueCRR;
                          }
                          $supplements_type = array();
                      if(!empty($room_type_supplements)){
                          foreach ($room_type_supplements as $rskey => $rsvalue) {
                  
                              if($rsvalue['cart_experiences_to_rooms_id'] == $value->id){
                                  if($rsvalue['upgrade_request_sup_status'] == 'accepted')
                                  {
                                      if($rsvalue['room_requests_id'] == 1){
                                      ;
                                              $rsvalue['supplements'] = 'Water view (Sea/Lake/River)';
                                          }elseif($rsvalue['room_requests_id'] == 2){
                                              $rsvalue['supplements'] = 'View (Garden/Balcony)';
                                          }elseif($rsvalue['room_requests_id'] == 3){
                                              $rsvalue['supplements'] = 'Executive/De Luxe/Superior Rooms';
                                          }elseif($rsvalue['room_requests_id'] == 4){
                                              $rsvalue['supplements'] = 'Dbl/tw room for sole';
                                          }elseif($rsvalue['room_requests_id'] == 7){
                                              $rsvalue['supplements'] = 'Walk In Shower';
                                          }elseif($rsvalue['room_requests_id'] == 8){
                                              $rsvalue['supplements'] = 'Ground Floor Room';
                                          }elseif($rsvalue['room_requests_id'] == 5){
                                      $rsvalue['supplements'] = $rsvalue['upgrade_name'];
                                  }
                                  $supplements_type[] = $rsvalue['supplements'];
                              }
                          }
                      }
                      }
                      if(!empty($supplements_type)){
                          //echo '<br>';
                          echo implode('<br>', $supplements_type);
                      }else{}
                  ?>
            </td>
            <td valign="middle" style="vertical-align: middle;border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif'; font-size: 12px; font-weight: 400; color: #32363A; line-height: 15px; text-align: left; padding: 2px 20px;">
               {{ $value->specials }}
            </td>
         </tr>
         <!-- END OF TABLE ROW -->
         <?php 
            $i++;
                }
                    }
                    }
                }
            }
            ?>
         <?php if(!empty($cart_experience->display_on_print)) { ?>
         <?php
            if($cartExperiencesToRooms->count()>0){
                foreach ($cartExperiencesToRooms as $key => $value) {
                    if($value->room_id == 1 && !empty($value->is_optional_room)){ 
                         if($value->deposit == '1' || $value->paid == '1')
                        {
                if(!empty($value->names) || !empty($value->room_requests) || !empty($value->specials)) {        
            ?>
         <!-- START OF TABLE ROW -->
         <tr style="page-break-inside:avoid;">
            <td valign="middle" style="vertical-align: middle;border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif'; font-size: 12px; font-weight: 400; color: #32363A; line-height: 15px; text-align: left; padding: 2px 20px;">
               {{$i}}
            </td>
            <td valign="middle" style="vertical-align: middle;border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif'; font-size: 12px; font-weight: 400; color: #32363A; line-height: 15px; text-align: left; padding: 2px 20px;">
               <?php $names =array();
                  $names = explode(',',$value->names);
                  if(!empty($names)){
                     foreach($names as $name)
                     {
                         echo '<p style="margin:0;">'.$name.'</p>';
                     }
                  } ?>
            </td>
            <td valign="middle" style="vertical-align: middle;border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif'; font-size: 12px; font-weight: 400; color: #32363A; line-height: 15px; text-align: left; padding: 2px 20px;">
               <!-- {{ $value->room_requests }} -->
               <?php 
                  $supplements = array();
                  if(!empty($roomsSupplementsRequest)){
                      $pen_can = 0;
                      foreach ($roomsSupplementsRequest as $rskey => $rsvalue) {
                          if($rsvalue['cart_experiences_to_rooms_id'] == $value->id){
                              if($rsvalue['upgrade_request_sup_status'] == 'pending')
                              {
                                  $pen_can = 1;
                              }
                              if($rsvalue['upgrade_request_sup_status'] == 'accepted')
                              {
                              if($rsvalue['supplements'] == 1){
                                          $rsvalue['supplements'] = 'Water view (Sea/Lake/River) ';
                                      }elseif($rsvalue['supplements'] == 2){
                                          $rsvalue['supplements'] = 'View (Garden/Balcony) ';
                                      }elseif($rsvalue['supplements'] == 3){
                                          $rsvalue['supplements'] = 'Executive/De Luxe/Superior Rooms ';
                                      }elseif($rsvalue['supplements'] == 4){
                                          $rsvalue['supplements'] = 'Dbl/tw room for sole ';
                                      }elseif($rsvalue['supplements'] == 7){
                                          $rsvalue['supplements'] = 'Walk In Shower ';
                                      }elseif($rsvalue['supplements'] == 8){
                                          $rsvalue['supplements'] = 'Ground Floor Room ';
                                      }elseif($rsvalue['supplements'] == 5){
                                  $rsvalue['supplements'] = $rsvalue['upgrade_name'].' ';
                              }
                              $supplements[] = $rsvalue['supplements'];
                              }
                          }
                      }
                  }
                  if(!empty($supplements)){
                      echo implode('<br>', $supplements);
                     
                  }
                  //addtional room supplemnt
                           $room_type_supplements = array();
                               
                          foreach ($value->cartExperiencesToRoomsRequests as $keyCRR => $valueCRR) {
                  
                              if($valueCRR['room_requests_id'] == 1){
                                          $valueCRR['supplements'] = 'Water view (Sea/Lake/River)';
                                      }elseif($valueCRR['room_requests_id'] == 2){
                                          $valueCRR['supplements'] = 'View (Garden/Balcony)';
                                      }elseif($valueCRR['room_requests_id'] == 3){
                                          $valueCRR['supplements'] = 'Executive/De Luxe/Superior Rooms';
                                      }elseif($valueCRR['room_requests_id'] == 4){
                                          $dbl_sole  = ((isset($rsvalue['upgrade_request_sup_status']) && $rsvalue['upgrade_request_sup_status'] == 'accepted')?'1':'1');
                                          $valueCRR['supplements'] = 'Dbl/tw room for sole';
                                      }elseif($valueCRR['room_requests_id'] == 5){
                                          $upgrade_name =  explode(',',$valueCRR['upgrade_name']);
                                              $upgrade_cost =  explode(',',$valueCRR['upgrade_cost']);
                  
                                              if(!empty($upgrade_name))
                                              {
                                                  $str_add = 'Others : ';
                                                  foreach($upgrade_name as $key=>$row)
                                                  {
                                                      $str_add .= $row.'('.$upgrade_cost[$key].')'.' ';
                                                  }
                                              }
                                          $valueCRR['supplements'] = rtrim($str_add);
                                      }
                              $room_type_supplements[] = $valueCRR;
                          }
                          $supplements_type = array();
                      if(!empty($room_type_supplements)){
                          foreach ($room_type_supplements as $rskey => $rsvalue) {
                  
                              if($rsvalue['cart_experiences_to_rooms_id'] == $value->id){
                  
                                  if($rsvalue['room_requests_id'] == 1){
                                  ;
                                          $rsvalue['supplements'] = 'Water view (Sea/Lake/River) : '.$rsvalue['upgrade_request_sup_status'];
                                      }elseif($rsvalue['room_requests_id'] == 2){
                                          $rsvalue['supplements'] = 'View (Garden/Balcony) : '.$rsvalue['upgrade_request_sup_status'];
                                      }elseif($rsvalue['room_requests_id'] == 3){
                                          $rsvalue['supplements'] = 'Executive/De Luxe/Superior Rooms : '.$rsvalue['upgrade_request_sup_status'];
                                      }elseif($rsvalue['room_requests_id'] == 4){
                                          $rsvalue['supplements'] = 'Dbl/tw room for sole : '.$rsvalue['upgrade_request_sup_status'];
                                      }elseif($rsvalue['room_requests_id'] == 7){
                                          $rsvalue['supplements'] = 'Walk In Shower : '.$rsvalue['upgrade_request_sup_status'];
                                      }elseif($rsvalue['room_requests_id'] == 8){
                                          $rsvalue['supplements'] = 'Ground Floor Room : '.$rsvalue['upgrade_request_sup_status'];
                                      }elseif($rsvalue['room_requests_id'] == 5){
                                  $rsvalue['supplements'] = $rsvalue['upgrade_name'].' : '.$rsvalue['upgrade_request_sup_status'];
                              }
                              $supplements_type[] = $rsvalue['supplements'];
                          }
                      }
                      }
                      if(!empty($supplements_type)){
                          //echo '<br>';
                          echo implode('<br>', $supplements_type);
                      }else{}
                  ?>
            </td>
            <td valign="middle" style="vertical-align: middle;border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif'; font-size: 12px; font-weight: 400; color: #32363A; line-height: 15px; text-align: left; padding: 2px 20px;">
               {{ $value->specials }}
            </td>
         </tr>
         <!-- END OF TABLE ROW -->
         <?php 
            $i++;
                    }
                    }
                    }
                }
            }
            ?>
         <?php } ?>
      </table>
    <?php } ?>
      <!-- END OF SINGLE ROOMS TABLE -->
      <br/>
      <!-- START OF DOUBLE ROOMS TABLE -->
      <?php $j = 0;if(!empty($dblSCnt)){ ?> 
      <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0" style="border: solid 1px #EDEEEF; border-collapse: collapse;margin-top: 10px;">
         <!-- START OF TABLE NAME -->
         <tr style="border: solid 1px #EDEEEF; border-collapse: collapse;">
            <td colspan="4" style="border: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif'; font-size: 15px; font-weight: 400; color: #32363A; line-height: 25px; text-align: left; padding: 2px 20px;">
               <b>Double rooms</b>
            </td>
         </tr>
         <!-- END OF TABLE NAME -->
         <!-- START OF TABLE HEADINGS -->
         <tr>
            <th bgcolor="#FAFAFA" style="background-color: #FAFAFA; border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif'; font-size: 12px; font-weight: 400; color: #32363A; line-height: 15px; text-align: left; padding: 2px 20px;">
               No. of rooms
            </th>
            <th bgcolor="#FAFAFA" style="background-color: #FAFAFA; border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif'; font-size: 12px; font-weight: 400; color: #32363A; line-height: 15px; text-align: left; padding: 2px 20px;">
               Name
            </th>
            <th bgcolor="#FAFAFA" style="background-color: #FAFAFA; border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif'; font-size: 12px; font-weight: 400; color: #32363A; line-height: 15px; text-align: left; padding: 2px 20px;">
               Guest request
            </th>
            <th bgcolor="#FAFAFA" style="background-color: #FAFAFA; border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif'; font-size: 12px; font-weight: 400; color: #32363A; line-height: 15px; text-align: left; padding: 2px 20px;">
               Note for the hotel
            </th>
         </tr>
         <!-- END OF TABLE HEADINGS -->
         <?php
            $j = 0;
            $doublesrs = 0;
             if($cartExperiencesToRooms->count()>0){
                 $j = 1;
                 foreach ($cartExperiencesToRooms as $key => $value) {
                     if($value->room_id == 2 && empty($value->is_optional_room)){ 
                          if($value->deposit == '1' || $value->paid == '1')
                         {
                  if(($value->names != '' &&  $value->names != ',') || !empty($value->room_requests) || !empty($value->specials)) {    
             ?>
         <!-- START OF TABLE ROW -->
         <tr>
            <td valign="middle" style="vertical-align: middle;border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif'; font-size: 12px; font-weight: 400; color: #32363A; line-height: 15px; text-align: left; padding: 2px 20px;">
               {{$j}}
            </td>
            <td valign="middle" style="vertical-align: middle;border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif'; font-size: 12px; font-weight: 400; color: #32363A; line-height: 15px; text-align: left; padding: 2px 20px;">
               <?php $names =array();
                  $names = explode(',',$value->names);
                  if(!empty($names)){
                     foreach($names as $name)
                     {
                         echo '<p style="margin:0;">'.$name.'</p>';
                     }
                  } ?>
            </td>
            <td valign="middle" style="vertical-align: middle;border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif'; font-size: 12px; font-weight: 400; color: #32363A; line-height: 15px; text-align: left; padding: 2px 20px;">
               <!-- {{ $value->room_requests }} -->
               <?php 
                  $supplements = array();
                  if(!empty($roomsSupplementsRequest)){
                      $pen_can = 0;
                      foreach ($roomsSupplementsRequest as $rskey => $rsvalue) {
                          if($rsvalue['cart_experiences_to_rooms_id'] == $value->id){
                              if($rsvalue['upgrade_request_sup_status'] == 'pending')
                              {
                                  $pen_can = 1;
                              }
                              if($rsvalue['upgrade_request_sup_status'] == 'accepted')
                              {
                              if($rsvalue['supplements'] == 1){
                                          $rsvalue['supplements'] = 'Water view (Sea/Lake/River) ';
                                      }elseif($rsvalue['supplements'] == 2){
                                          $rsvalue['supplements'] = 'View (Garden/Balcony) ';
                                      }elseif($rsvalue['supplements'] == 3){
                                          $rsvalue['supplements'] = 'Executive/De Luxe/Superior Rooms ';
                                      }elseif($rsvalue['supplements'] == 4){
                                          $doublesrs++;
                                          $rsvalue['supplements'] = 'Dbl/tw room for sole ';
                                      }elseif($rsvalue['supplements'] == 7){
                                          $rsvalue['supplements'] = 'Walk In Shower ';
                                      }elseif($rsvalue['supplements'] == 8){
                                          $rsvalue['supplements'] = 'Ground Floor Room ';
                                      }elseif($rsvalue['supplements'] == 5){
                                  $rsvalue['supplements'] = $rsvalue['upgrade_name'].' ';
                              }
                              $supplements[] = $rsvalue['supplements'];
                              }
                          }
                      }
                  }
                  if(!empty($supplements)){
                      echo implode('<br>', $supplements);
                     
                  }
                  //addtional room supplemnt
                           $room_type_supplements = array();
                               
                          foreach ($value->cartExperiencesToRoomsRequests as $keyCRR => $valueCRR) {
                  
                              if($valueCRR['room_requests_id'] == 1){
                                          $valueCRR['supplements'] = 'Water view (Sea/Lake/River)';
                                      }elseif($valueCRR['room_requests_id'] == 2){
                                          $valueCRR['supplements'] = 'View (Garden/Balcony)';
                                      }elseif($valueCRR['room_requests_id'] == 3){
                                          $valueCRR['supplements'] = 'Executive/De Luxe/Superior Rooms';
                                      }elseif($valueCRR['room_requests_id'] == 4){
                                          $dbl_sole  = ((isset($rsvalue['upgrade_request_sup_status']) && $rsvalue['upgrade_request_sup_status'] == 'accepted')?'1':'1');
                                          $valueCRR['supplements'] = 'Dbl/tw room for sole';
                                      }elseif($valueCRR['room_requests_id'] == 5){
                                          $upgrade_name =  explode(',',$valueCRR['upgrade_name']);
                                              $upgrade_cost =  explode(',',$valueCRR['upgrade_cost']);
                  
                                              if(!empty($upgrade_name))
                                              {
                                                  $str_add = 'Others : ';
                                                  foreach($upgrade_name as $key=>$row)
                                                  {
                                                      $str_add .= $row.'('.$upgrade_cost[$key].')'.' ';
                                                  }
                                              }
                                          $valueCRR['supplements'] = rtrim($str_add);
                                      }
                              $room_type_supplements[] = $valueCRR;
                          }
                          $supplements_type = array();
                      if(!empty($room_type_supplements)){
                          foreach ($room_type_supplements as $rskey => $rsvalue) {
                  
                              if($rsvalue['cart_experiences_to_rooms_id'] == $value->id){
                                  if($rsvalue['upgrade_request_sup_status'] == 'accepted')
                                  {
                                      if($rsvalue['room_requests_id'] == 1){
                                      ;
                                              $rsvalue['supplements'] = 'Water view (Sea/Lake/River)';
                                          }elseif($rsvalue['room_requests_id'] == 2){
                                              $rsvalue['supplements'] = 'View (Garden/Balcony)';
                                          }elseif($rsvalue['room_requests_id'] == 3){
                                              $rsvalue['supplements'] = 'Executive/De Luxe/Superior Rooms';
                                          }elseif($rsvalue['room_requests_id'] == 4){
                                              $rsvalue['supplements'] = 'Dbl/tw room for sole';
                                          }elseif($rsvalue['room_requests_id'] == 7){
                                              $rsvalue['supplements'] = 'Walk In Shower';
                                          }elseif($rsvalue['room_requests_id'] == 8){
                                              $rsvalue['supplements'] = 'Ground Floor Room';
                                          }elseif($rsvalue['room_requests_id'] == 5){
                                      $rsvalue['supplements'] = $rsvalue['upgrade_name'];
                                  }
                                  $supplements_type[] = $rsvalue['supplements'];
                              }
                          }
                      }
                      }
                      if(!empty($supplements_type)){
                          //echo '<br>';
                          echo implode('<br>', $supplements_type);
                      }else{}
                  ?>
            </td>
            <td valign="middle" style="vertical-align: middle;border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif'; font-size: 12px; font-weight: 400; color: #32363A; line-height: 15px; text-align: left; padding: 2px 20px;">
               {{ $value->specials }}
            </td>
         </tr>
         <!-- END OF TABLE ROW -->
         <?php 
            $j++;
                    }
            }
                    }
                }
            }
            ?>
         <?php if(!empty($cart_experience->display_on_print)) { ?>
         <?php
            if($cartExperiencesToRooms->count()>0){
                foreach ($cartExperiencesToRooms as $key => $value) {
                    if($value->room_id == 2 && !empty($value->is_optional_room)){ 
                        if($value->deposit == '1' || $value->paid == '1')
                        {
                if(($value->names != '' &&  $value->names != ',') || !empty($value->room_requests) || !empty($value->specials)) {
            ?>
         <!-- START OF TABLE ROW -->
         <tr style="page-break-inside:avoid;">
            <td valign="middle" style="vertical-align: middle;border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif'; font-size: 12px; font-weight: 400; color: #32363A; line-height: 15px; text-align: left; padding: 2px 20px;">
               {{$j}}
            </td>
            <td valign="middle" style="vertical-align: middle;border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif'; font-size: 12px; font-weight: 400; color: #32363A; line-height: 15px; text-align: left; padding: 2px 20px;">
               <?php $names =array();
                  $names = explode(',',$value->names);
                  if(!empty($names)){
                     foreach($names as $name)
                     {
                         echo '<p style="margin:0;">'.$name.'</p>';
                     }
                  } ?>
            </td>
            <td valign="middle" style="vertical-align: middle;border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif'; font-size: 12px; font-weight: 400; color: #32363A; line-height: 15px; text-align: left; padding: 2px 20px;">
               <!-- {{ $value->room_requests }} -->
               <?php 
                  $supplements = array();
                  if(!empty($roomsSupplementsRequest)){
                      $pen_can = 0;
                      foreach ($roomsSupplementsRequest as $rskey => $rsvalue) {
                          if($rsvalue['cart_experiences_to_rooms_id'] == $value->id){
                              if($rsvalue['upgrade_request_sup_status'] == 'pending')
                              {
                                  $pen_can = 1;
                              }
                              if($rsvalue['upgrade_request_sup_status'] == 'accepted')
                              {
                              if($rsvalue['supplements'] == 1){
                                          $rsvalue['supplements'] = 'Water view (Sea/Lake/River) ';
                                      }elseif($rsvalue['supplements'] == 2){
                                          $rsvalue['supplements'] = 'View (Garden/Balcony) ';
                                      }elseif($rsvalue['supplements'] == 3){
                                          $rsvalue['supplements'] = 'Executive/De Luxe/Superior Rooms ';
                                      }elseif($rsvalue['supplements'] == 4){
                                          $rsvalue['supplements'] = 'Dbl/tw room for sole ';
                                      }elseif($rsvalue['supplements'] == 7){
                                          $rsvalue['supplements'] = 'Walk In Shower ';
                                      }elseif($rsvalue['supplements'] == 8){
                                          $rsvalue['supplements'] = 'Ground Floor Room ';
                                      }elseif($rsvalue['supplements'] == 5){
                                  $rsvalue['supplements'] = $rsvalue['upgrade_name'].' ';
                              }
                              $supplements[] = $rsvalue['supplements'];
                              }
                          }
                      }
                  }
                  if(!empty($supplements)){
                      echo implode('<br>', $supplements);
                     
                  }
                  //addtional room supplemnt
                           $room_type_supplements = array();
                               
                          foreach ($value->cartExperiencesToRoomsRequests as $keyCRR => $valueCRR) {
                  
                              if($valueCRR['room_requests_id'] == 1){
                                          $valueCRR['supplements'] = 'Water view (Sea/Lake/River)';
                                      }elseif($valueCRR['room_requests_id'] == 2){
                                          $valueCRR['supplements'] = 'View (Garden/Balcony)';
                                      }elseif($valueCRR['room_requests_id'] == 3){
                                          $valueCRR['supplements'] = 'Executive/De Luxe/Superior Rooms';
                                      }elseif($valueCRR['room_requests_id'] == 4){
                                          $dbl_sole  = ((isset($rsvalue['upgrade_request_sup_status']) && $rsvalue['upgrade_request_sup_status'] == 'accepted')?'1':'1');
                                          $valueCRR['supplements'] = 'Dbl/tw room for sole';
                                      }elseif($valueCRR['room_requests_id'] == 5){
                                          $upgrade_name =  explode(',',$valueCRR['upgrade_name']);
                                              $upgrade_cost =  explode(',',$valueCRR['upgrade_cost']);
                  
                                              if(!empty($upgrade_name))
                                              {
                                                  $str_add = 'Others : ';
                                                  foreach($upgrade_name as $key=>$row)
                                                  {
                                                      $str_add .= $row.'('.$upgrade_cost[$key].')'.' ';
                                                  }
                                              }
                                          $valueCRR['supplements'] = rtrim($str_add);
                                      }
                              $room_type_supplements[] = $valueCRR;
                          }
                          $supplements_type = array();
                      if(!empty($room_type_supplements)){
                          foreach ($room_type_supplements as $rskey => $rsvalue) {
                  
                              if($rsvalue['cart_experiences_to_rooms_id'] == $value->id){
                                  if($rsvalue['upgrade_request_sup_status'] == 'accepted')
                                  {
                                      if($rsvalue['room_requests_id'] == 1){
                                      ;
                                              $rsvalue['supplements'] = 'Water view (Sea/Lake/River)';
                                          }elseif($rsvalue['room_requests_id'] == 2){
                                              $rsvalue['supplements'] = 'View (Garden/Balcony)';
                                          }elseif($rsvalue['room_requests_id'] == 3){
                                              $rsvalue['supplements'] = 'Executive/De Luxe/Superior Rooms';
                                          }elseif($rsvalue['room_requests_id'] == 4){
                                              $rsvalue['supplements'] = 'Dbl/tw room for sole';
                                          }elseif($rsvalue['room_requests_id'] == 7){
                                              $rsvalue['supplements'] = 'Walk In Shower';
                                          }elseif($rsvalue['room_requests_id'] == 8){
                                              $rsvalue['supplements'] = 'Ground Floor Room';
                                          }elseif($rsvalue['room_requests_id'] == 5){
                                      $rsvalue['supplements'] = $rsvalue['upgrade_name'];
                                  }
                                  $supplements_type[] = $rsvalue['supplements'];
                              }
                          }
                      }
                      }
                      if(!empty($supplements_type)){
                          //echo '<br>';
                          echo implode('<br>', $supplements_type);
                      }else{}
                  ?>
            </td>
            <td valign="middle" style="vertical-align: middle;border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif'; font-size: 12px; font-weight: 400; color: #32363A; line-height: 15px; text-align: left; padding: 2px 20px;">
               {{ $value->specials }}
            </td>
         </tr>
         <!-- END OF TABLE ROW -->
         <?php 
            $j++;
                         }
                        }
                    }
                }
            }
            ?>
         <?php } ?>
      </table>
      <?php } ?>
      <!-- END OF DOUBLE ROOMS TABLE -->
      <br/>
      <?php $k = 0;$d_cnt = 0;if(!empty($twnSCnt)){ ?> 
      <!-- START OF TWIN ROOMS TABLE -->
      <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0" style="border: solid 1px #EDEEEF; border-collapse: collapse;margin-top: 10px;">
         <!-- START OF TABLE NAME -->
         <tr style="border: solid 1px #EDEEEF; border-collapse: collapse;">
            <td colspan="4" style="border: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif'; font-size: 15px; font-weight: 400; color: #14213D; text-align: left;line-height: 25px;  padding: 2px 20px;">
               <b>Twin rooms</b>
            </td>
         </tr>
         <!-- END OF TABLE NAME -->
         <!-- START OF TABLE HEADINGS -->
         <tr>
            <th bgcolor="#FAFAFA" style="background-color: #FAFAFA; border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif'; font-size: 12px; font-weight: 400; color: #32363A; line-height: 15px; text-align: left; padding: 2px 20px;">
               No. of rooms
            </th>
            <th bgcolor="#FAFAFA" style="background-color: #FAFAFA; border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif'; font-size: 12px; font-weight: 400; color: #32363A; line-height: 15px; text-align: left; padding: 2px 20px;">
               Name
            </th>
            <th bgcolor="#FAFAFA" style="background-color: #FAFAFA; border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif'; font-size: 12px; font-weight: 400; color: #32363A; line-height: 15px; text-align: left; padding: 2px 20px;">
               Guest request
            </th>
            <th bgcolor="#FAFAFA" style="background-color: #FAFAFA; border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif'; font-size: 12px; font-weight: 400; color: #32363A; line-height: 15px; text-align: left; padding: 2px 20px;">
               Note for the hotel
            </th>
         </tr>
         <!-- END OF TABLE HEADINGS -->
         <?php
            $d_cnt = (!empty($cart_experience->driver_name) && ($cart_experience->driver_room_type == '2' || $cart_experience->driver_room_type == '3'))?'1':'0';
            $s_cnt = ($cart_experience->driver_room_type == '1')?'1':'0'; 
             $k = 0;
             $pax = 0;
             $twinsrs = 0;
            if($cartExperiencesToRooms->count()>0){
                $k = 1;
                
                foreach ($cartExperiencesToRooms as $key => $value) {
                    if($value->paid == 1 || $value->deposit == 1){
                        $pax = $pax+1;
                    }
                    if($value->room_id == 3 && empty($value->is_optional_room)){ 
                if(($value->names != '' &&  $value->names != ',') || !empty($value->room_requests) || !empty($value->specials)) {
            ?>
         <!-- START OF TABLE ROW -->
         <tr>
            <td valign="middle" style="vertical-align: middle;border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif'; font-size: 12px; font-weight: 400; color: #32363A; line-height: 15px; text-align: left; padding: 2px 20px;">
               {{$k}}
            </td>
            <td valign="middle" style="vertical-align: middle;border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif'; font-size: 12px; font-weight: 400; color: #32363A; line-height: 15px; text-align: left; padding: 2px 20px;">
               <?php $names =array();
                  $names = explode(',',$value->names);
                  if(!empty($names)){
                     foreach($names as $name)
                     {
                         echo '<p style="margin:0;">'.$name.'</p>';
                     }
                  } ?>
            </td>
            <td valign="middle" style="vertical-align: middle;border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif'; font-size: 12px; font-weight: 400; color: #32363A; line-height: 15px; text-align: left; padding: 2px 20px;">
               <!-- {{ $value->room_requests }} -->
               <?php 
                  $supplements = array();
                  if(!empty($roomsSupplementsRequest)){
                      $pen_can = 0;
                      foreach ($roomsSupplementsRequest as $rskey => $rsvalue) {
                          if($rsvalue['cart_experiences_to_rooms_id'] == $value->id){
                              if($rsvalue['upgrade_request_sup_status'] == 'pending')
                              {
                                  $pen_can = 1;
                              }
                              if($rsvalue['upgrade_request_sup_status'] == 'accepted')
                              {
                              if($rsvalue['supplements'] == 1){
                                          $rsvalue['supplements'] = 'Water view (Sea/Lake/River) ';
                                      }elseif($rsvalue['supplements'] == 2){
                                          $rsvalue['supplements'] = 'View (Garden/Balcony) ';
                                      }elseif($rsvalue['supplements'] == 3){
                                          $rsvalue['supplements'] = 'Executive/De Luxe/Superior Rooms ';
                                      }elseif($rsvalue['supplements'] == 4){
                                          $twinsrs++;
                                          $rsvalue['supplements'] = 'Dbl/tw room for sole ';
                                      }elseif($rsvalue['supplements'] == 7){
                                          $rsvalue['supplements'] = 'Walk In Shower ';
                                      }elseif($rsvalue['supplements'] == 8){
                                          $rsvalue['supplements'] = 'Ground Floor Room ';
                                      }elseif($rsvalue['supplements'] == 5){
                                  $rsvalue['supplements'] = $rsvalue['upgrade_name'].' ';
                              }
                              $supplements[] = $rsvalue['supplements'];
                              }
                          }
                      }
                  }
                  if(!empty($supplements)){
                      echo implode('<br>', $supplements);
                     
                  }
                  //addtional room supplemnt
                           $room_type_supplements = array();
                               
                          foreach ($value->cartExperiencesToRoomsRequests as $keyCRR => $valueCRR) {
                  
                              if($valueCRR['room_requests_id'] == 1){
                                          $valueCRR['supplements'] = 'Water view (Sea/Lake/River)';
                                      }elseif($valueCRR['room_requests_id'] == 2){
                                          $valueCRR['supplements'] = 'View (Garden/Balcony)';
                                      }elseif($valueCRR['room_requests_id'] == 3){
                                          $valueCRR['supplements'] = 'Executive/De Luxe/Superior Rooms';
                                      }elseif($valueCRR['room_requests_id'] == 4){
                                          $dbl_sole  = ((isset($rsvalue['upgrade_request_sup_status']) && $rsvalue['upgrade_request_sup_status'] == 'accepted')?'1':'1');
                                          $valueCRR['supplements'] = 'Dbl/tw room for sole';
                                      }elseif($valueCRR['room_requests_id'] == 5){
                                          $upgrade_name =  explode(',',$valueCRR['upgrade_name']);
                                              $upgrade_cost =  explode(',',$valueCRR['upgrade_cost']);
                  
                                              if(!empty($upgrade_name))
                                              {
                                                  $str_add = 'Others : ';
                                                  foreach($upgrade_name as $key=>$row)
                                                  {
                                                      $str_add .= $row.'('.$upgrade_cost[$key].')'.' ';
                                                  }
                                              }
                                          $valueCRR['supplements'] = rtrim($str_add);
                                      }
                              $room_type_supplements[] = $valueCRR;
                          }
                          $supplements_type = array();
                      if(!empty($room_type_supplements)){
                          foreach ($room_type_supplements as $rskey => $rsvalue) {
                  
                              if($rsvalue['cart_experiences_to_rooms_id'] == $value->id){
                                  if($rsvalue['upgrade_request_sup_status'] == 'accepted')
                                  {
                                      if($rsvalue['room_requests_id'] == 1){
                                      ;
                                              $rsvalue['supplements'] = 'Water view (Sea/Lake/River)';
                                          }elseif($rsvalue['room_requests_id'] == 2){
                                              $rsvalue['supplements'] = 'View (Garden/Balcony)';
                                          }elseif($rsvalue['room_requests_id'] == 3){
                                              $rsvalue['supplements'] = 'Executive/De Luxe/Superior Rooms';
                                          }elseif($rsvalue['room_requests_id'] == 4){
                                              $rsvalue['supplements'] = 'Dbl/tw room for sole';
                                          }elseif($rsvalue['room_requests_id'] == 7){
                                              $rsvalue['supplements'] = 'Walk In Shower';
                                          }elseif($rsvalue['room_requests_id'] == 8){
                                              $rsvalue['supplements'] = 'Ground Floor Room';
                                          }elseif($rsvalue['room_requests_id'] == 5){
                                      $rsvalue['supplements'] = $rsvalue['upgrade_name'];
                                  }
                                  $supplements_type[] = $rsvalue['supplements'];
                              }
                          }
                      }
                      }
                      if(!empty($supplements_type)){
                          //echo '<br>';
                          echo implode('<br>', $supplements_type);
                      }else{}
                  ?>
            </td>
            <td valign="middle" style="vertical-align: middle;border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif'; font-size: 12px; font-weight: 400; color: #32363A; line-height: 15px; text-align: left; padding: 2px 20px;">
               {{ $value->specials }}
            </td>
         </tr>
         <!-- END OF TABLE ROW -->
         <?php 
            $k++;
                        }
                    }
                }
            }
            ?>
         <?php if(!empty($cart_experience->display_on_print)) { ?>
         <?php
            if($cartExperiencesToRooms->count()>0){
                
                foreach ($cartExperiencesToRooms as $key => $value) {
                    if($value->room_id == 3 && !empty($value->is_optional_room)){ 
                        if($value->deposit == '1' || $value->paid == '1')
                        {
                if(($value->names != '' &&  $value->names != ',') || !empty($value->room_requests) || !empty($value->specials)) {
            ?>
         <!-- START OF TABLE ROW -->
         <tr style="page-break-inside:avoid;">
            <td valign="middle" style="vertical-align: middle;border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif'; font-size: 12px; font-weight: 400; color: #32363A; line-height: 15px; text-align: left; padding: 2px 20px;">
               {{$k}}
            </td>
            <td valign="middle" style="vertical-align: middle;border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif'; font-size: 12px; font-weight: 400; color: #32363A; line-height: 15px; text-align: left; padding: 2px 20px;">
               <?php $names =array();
                  $names = explode(',',$value->names);
                  if(!empty($names)){
                    foreach($names as $name)
                    {
                        echo '<p style="margin:0;">'.$name.'</p>';
                    }
                  } ?>
            </td>
            <td valign="middle" style="vertical-align: middle;border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif'; font-size: 12px; font-weight: 400; color: #32363A; line-height: 15px; text-align: left; padding: 2px 20px;">
               <!-- {{ $value->room_requests }} -->
               <?php 
                  $supplements = array();
                  if(!empty($roomsSupplementsRequest)){
                      $pen_can = 0;
                      foreach ($roomsSupplementsRequest as $rskey => $rsvalue) {
                          if($rsvalue['cart_experiences_to_rooms_id'] == $value->id){
                              if($rsvalue['upgrade_request_sup_status'] == 'pending')
                              {
                                  $pen_can = 1;
                              }
                              if($rsvalue['upgrade_request_sup_status'] == 'accepted')
                              {
                              if($rsvalue['supplements'] == 1){
                                          $rsvalue['supplements'] = 'Water view (Sea/Lake/River) ';
                                      }elseif($rsvalue['supplements'] == 2){
                                          $rsvalue['supplements'] = 'View (Garden/Balcony) ';
                                      }elseif($rsvalue['supplements'] == 3){
                                          $rsvalue['supplements'] = 'Executive/De Luxe/Superior Rooms ';
                                      }elseif($rsvalue['supplements'] == 4){
                                          $rsvalue['supplements'] = 'Dbl/tw room for sole ';
                                      }elseif($rsvalue['supplements'] == 7){
                                          $rsvalue['supplements'] = 'Walk In Shower ';
                                      }elseif($rsvalue['supplements'] == 8){
                                          $rsvalue['supplements'] = 'Ground Floor Room ';
                                      }elseif($rsvalue['supplements'] == 5){
                                  $rsvalue['supplements'] = $rsvalue['upgrade_name'].' ';
                              }
                              $supplements[] = $rsvalue['supplements'];
                              }
                          }
                      }
                  }
                  if(!empty($supplements)){
                      echo implode('<br>', $supplements);
                     
                  }
                  //addtional room supplemnt
                           $room_type_supplements = array();
                               
                          foreach ($value->cartExperiencesToRoomsRequests as $keyCRR => $valueCRR) {
                  
                              if($valueCRR['room_requests_id'] == 1){
                                          $valueCRR['supplements'] = 'Water view (Sea/Lake/River)';
                                      }elseif($valueCRR['room_requests_id'] == 2){
                                          $valueCRR['supplements'] = 'View (Garden/Balcony)';
                                      }elseif($valueCRR['room_requests_id'] == 3){
                                          $valueCRR['supplements'] = 'Executive/De Luxe/Superior Rooms';
                                      }elseif($valueCRR['room_requests_id'] == 4){
                                          $dbl_sole  = ((isset($rsvalue['upgrade_request_sup_status']) && $rsvalue['upgrade_request_sup_status'] == 'accepted')?'1':'1');
                                          $valueCRR['supplements'] = 'Dbl/tw room for sole';
                                      }elseif($valueCRR['room_requests_id'] == 5){
                                          $upgrade_name =  explode(',',$valueCRR['upgrade_name']);
                                              $upgrade_cost =  explode(',',$valueCRR['upgrade_cost']);
                  
                                              if(!empty($upgrade_name))
                                              {
                                                  $str_add = 'Others : ';
                                                  foreach($upgrade_name as $key=>$row)
                                                  {
                                                      $str_add .= $row.'('.$upgrade_cost[$key].')'.' ';
                                                  }
                                              }
                                          $valueCRR['supplements'] = rtrim($str_add);
                                      }
                              $room_type_supplements[] = $valueCRR;
                          }
                          $supplements_type = array();
                      if(!empty($room_type_supplements)){
                          foreach ($room_type_supplements as $rskey => $rsvalue) {
                  
                              if($rsvalue['cart_experiences_to_rooms_id'] == $value->id){
                                  if($rsvalue['upgrade_request_sup_status'] == 'accepted')
                                  {
                                      if($rsvalue['room_requests_id'] == 1){
                                      ;
                                              $rsvalue['supplements'] = 'Water view (Sea/Lake/River)';
                                          }elseif($rsvalue['room_requests_id'] == 2){
                                              $rsvalue['supplements'] = 'View (Garden/Balcony)';
                                          }elseif($rsvalue['room_requests_id'] == 3){
                                              $rsvalue['supplements'] = 'Executive/De Luxe/Superior Rooms';
                                          }elseif($rsvalue['room_requests_id'] == 4){
                                              $rsvalue['supplements'] = 'Dbl/tw room for sole';
                                          }elseif($rsvalue['room_requests_id'] == 7){
                                              $rsvalue['supplements'] = 'Walk In Shower';
                                          }elseif($rsvalue['room_requests_id'] == 8){
                                              $rsvalue['supplements'] = 'Ground Floor Room';
                                          }elseif($rsvalue['room_requests_id'] == 5){
                                      $rsvalue['supplements'] = $rsvalue['upgrade_name'];
                                  }
                                  $supplements_type[] = $rsvalue['supplements'];
                              }
                          }
                      }
                      }
                      if(!empty($supplements_type)){
                          //echo '<br>';
                          echo implode('<br>', $supplements_type);
                      }else{}
                  ?>
            </td>
            <td valign="middle" style="vertical-align: middle;border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif'; font-size: 12px; font-weight: 400; color: #32363A; line-height: 15px; text-align: left; padding: 2px 20px;">
               {{ $value->specials }}
            </td>
         </tr>
         <!-- END OF TABLE ROW -->
         <?php 
            $k++;
                            }
                        }
                    }
                }
            }
            ?>
         <?php } ?>
      </table>
      <?php } ?>
      <!-- END OF TWIN ROOMS TABLE -->
      <br/>
      <?php $t = 0;$d_cnt = 0;if(!empty($trpSCnt)){ ?> 
      <!-- START OF TRIPLE ROOMS TABLE -->
      <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0" style="border: solid 1px #EDEEEF; border-collapse: collapse;margin-top: 10px;">
         <!-- START OF TABLE NAME -->
         <tr style="border: solid 1px #EDEEEF; border-collapse: collapse;">
            <td colspan="4" style="border: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif'; font-size: 15px; font-weight: 400; color: #32363A; line-height: 25px; text-align: left; padding: 2px 20px;">
               <b>Triple rooms</b>
            </td>
         </tr>
         <!-- END OF TABLE NAME -->
         <!-- START OF TABLE HEADINGS -->
         <tr>
            <th bgcolor="#FAFAFA" style="background-color: #FAFAFA; border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif'; font-size: 12px; font-weight: 400; color: #32363A; line-height: 15px; text-align: left; padding: 2px 20px;">
               No. of rooms
            </th>
            <th bgcolor="#FAFAFA" style="background-color: #FAFAFA; border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif'; font-size: 12px; font-weight: 400; color: #32363A; line-height: 15px; text-align: left; padding: 2px 20px;">
               Name
            </th>
            <th bgcolor="#FAFAFA" style="background-color: #FAFAFA; border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif'; font-size: 12px; font-weight: 400; color: #32363A; line-height: 15px; text-align: left; padding: 2px 20px;">
               Guest request
            </th>
            <th bgcolor="#FAFAFA" style="background-color: #FAFAFA; border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif'; font-size: 12px; font-weight: 400; color: #32363A; line-height: 15px; text-align: left; padding: 2px 20px;">
               Note for the hotel
            </th>
         </tr>
         <!-- END OF TABLE HEADINGS -->
         <?php
            $t = 0;
             if($cartExperiencesToRooms->count()>0){
                 $t = 1;
                 foreach ($cartExperiencesToRooms as $key => $value) {
                     if($value->room_id == 4 && empty($value->is_optional_room)){ 
                  if(($value->names != '' &&  $value->names != ',' && $value->names != ',,' ) || !empty($value->room_requests) || !empty($value->specials)) {    
             ?>
         <!-- START OF TABLE ROW -->
         <tr>
            <td valign="middle" style="vertical-align: middle;border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif'; font-size: 12px; font-weight: 400; color: #32363A; line-height: 15px; text-align: left; padding: 2px 20px;">
               {{$t}}
            </td>
            <td valign="middle" style="vertical-align: middle;border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif'; font-size: 12px; font-weight: 400; color: #32363A; line-height: 15px; text-align: left; padding: 2px 20px;">
               <?php $names =array();
                  $names = explode(',',$value->names);
                  if(!empty($names)){
                     foreach($names as $name)
                     {
                         echo '<p style="margin:0;">'.$name.'</p>';
                     }
                  } ?>
            </td>
            <td valign="middle" style="vertical-align: middle;border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif'; font-size: 12px; font-weight: 400; color: #32363A; line-height: 15px; text-align: left; padding: 2px 20px;">
               <!-- {{ $value->room_requests }} -->
               <?php 
                  $supplements = array();
                  if(!empty($roomsSupplementsRequest)){
                      $pen_can = 0;
                      foreach ($roomsSupplementsRequest as $rskey => $rsvalue) {
                          if($rsvalue['cart_experiences_to_rooms_id'] == $value->id){
                              if($rsvalue['upgrade_request_sup_status'] == 'pending')
                              {
                                  $pen_can = 1;
                              }
                              if($rsvalue['upgrade_request_sup_status'] == 'accepted')
                              {
                              if($rsvalue['supplements'] == 1){
                                          $rsvalue['supplements'] = 'Water view (Sea/Lake/River) ';
                                      }elseif($rsvalue['supplements'] == 2){
                                          $rsvalue['supplements'] = 'View (Garden/Balcony) ';
                                      }elseif($rsvalue['supplements'] == 3){
                                          $rsvalue['supplements'] = 'Executive/De Luxe/Superior Rooms ';
                                      }elseif($rsvalue['supplements'] == 4){
                                          $rsvalue['supplements'] = 'Dbl/tw room for sole ';
                                      }elseif($rsvalue['supplements'] == 7){
                                          $rsvalue['supplements'] = 'Walk In Shower ';
                                      }elseif($rsvalue['supplements'] == 8){
                                          $rsvalue['supplements'] = 'Ground Floor Room ';
                                      }elseif($rsvalue['supplements'] == 5){
                                  $rsvalue['supplements'] = $rsvalue['upgrade_name'].' ';
                              }
                              $supplements[] = $rsvalue['supplements'];
                              }
                          }
                      }
                  }
                  if(!empty($supplements)){
                      echo implode('<br>', $supplements);
                     
                  }
                  //addtional room supplemnt
                           $room_type_supplements = array();
                               
                          foreach ($value->cartExperiencesToRoomsRequests as $keyCRR => $valueCRR) {
                  
                              if($valueCRR['room_requests_id'] == 1){
                                          $valueCRR['supplements'] = 'Water view (Sea/Lake/River)';
                                      }elseif($valueCRR['room_requests_id'] == 2){
                                          $valueCRR['supplements'] = 'View (Garden/Balcony)';
                                      }elseif($valueCRR['room_requests_id'] == 3){
                                          $valueCRR['supplements'] = 'Executive/De Luxe/Superior Rooms';
                                      }elseif($valueCRR['room_requests_id'] == 4){
                                          $dbl_sole  = ((isset($rsvalue['upgrade_request_sup_status']) && $rsvalue['upgrade_request_sup_status'] == 'accepted')?'1':'1');
                                          $valueCRR['supplements'] = 'Dbl/tw room for sole';
                                      }elseif($valueCRR['room_requests_id'] == 5){
                                          $upgrade_name =  explode(',',$valueCRR['upgrade_name']);
                                              $upgrade_cost =  explode(',',$valueCRR['upgrade_cost']);
                  
                                              if(!empty($upgrade_name))
                                              {
                                                  $str_add = 'Others : ';
                                                  foreach($upgrade_name as $key=>$row)
                                                  {
                                                      $str_add .= $row.'('.$upgrade_cost[$key].')'.' ';
                                                  }
                                              }
                                          $valueCRR['supplements'] = rtrim($str_add);
                                      }
                              $room_type_supplements[] = $valueCRR;
                          }
                          $supplements_type = array();
                      if(!empty($room_type_supplements)){
                          foreach ($room_type_supplements as $rskey => $rsvalue) {
                  
                              if($rsvalue['cart_experiences_to_rooms_id'] == $value->id){
                                  if($rsvalue['upgrade_request_sup_status'] == 'accepted')
                                  {
                                      if($rsvalue['room_requests_id'] == 1){
                                      ;
                                              $rsvalue['supplements'] = 'Water view (Sea/Lake/River)';
                                          }elseif($rsvalue['room_requests_id'] == 2){
                                              $rsvalue['supplements'] = 'View (Garden/Balcony)';
                                          }elseif($rsvalue['room_requests_id'] == 3){
                                              $rsvalue['supplements'] = 'Executive/De Luxe/Superior Rooms';
                                          }elseif($rsvalue['room_requests_id'] == 4){
                                              $rsvalue['supplements'] = 'Dbl/tw room for sole';
                                          }elseif($rsvalue['room_requests_id'] == 7){
                                              $rsvalue['supplements'] = 'Walk In Shower';
                                          }elseif($rsvalue['room_requests_id'] == 8){
                                              $rsvalue['supplements'] = 'Ground Floor Room';
                                          }elseif($rsvalue['room_requests_id'] == 5){
                                      $rsvalue['supplements'] = $rsvalue['upgrade_name'];
                                  }
                                  $supplements_type[] = $rsvalue['supplements'];
                              }
                          }
                      }
                      }
                      if(!empty($supplements_type)){
                          //echo '<br>';
                          echo implode('<br>', $supplements_type);
                      }else{}
                  ?>
            </td>
            <td valign="middle" style="vertical-align: middle;border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif'; font-size: 12px; font-weight: 400; color: #32363A; line-height: 15px; text-align: left; padding: 2px 20px;">
               {{ $value->specials }}
            </td>
         </tr>
         <!-- END OF TABLE ROW -->
         <?php 
            $t++;
            }
                    }
                }
            }
            ?>
         <?php if(!empty($cart_experience->display_on_print)) { ?>
         <?php
            if($cartExperiencesToRooms->count()>0){
                foreach ($cartExperiencesToRooms as $key => $value) {
                    if($value->room_id == 4 && !empty($value->is_optional_room)){ 
                        if($value->deposit == '1' || $value->paid == '1')
                        {
                if(($value->names != '' &&  $value->names != ',') || !empty($value->room_requests) || !empty($value->specials)) {
            ?>
         <!-- START OF TABLE ROW -->
         <tr style="page-break-inside:avoid;">
            <td valign="middle" style="vertical-align: middle;border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif'; font-size: 12px; font-weight: 400; color: #32363A; line-height: 15px; text-align: left; padding: 2px 20px;">
               {{$t}}
            </td>
            <td valign="middle" style="vertical-align: middle;border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif'; font-size: 12px; font-weight: 400; color: #32363A; line-height: 15px; text-align: left; padding: 2px 20px;">
               <?php $names =array();
                  $names = explode(',',$value->names);
                  if(!empty($names)){
                     foreach($names as $name)
                     {
                         echo '<p style="margin:0;">'.$name.'</p>';
                     }
                  } ?>
            </td>
            <td valign="middle" style="vertical-align: middle;border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif'; font-size: 12px; font-weight: 400; color: #32363A; line-height: 15px; text-align: left; padding: 2px 20px;">
               <!-- {{ $value->room_requests }} -->
               <?php 
                  $supplements = array();
                  if(!empty($roomsSupplementsRequest)){
                      $pen_can = 0;
                      foreach ($roomsSupplementsRequest as $rskey => $rsvalue) {
                          if($rsvalue['cart_experiences_to_rooms_id'] == $value->id){
                              if($rsvalue['upgrade_request_sup_status'] == 'pending')
                              {
                                  $pen_can = 1;
                              }
                              if($rsvalue['upgrade_request_sup_status'] == 'accepted')
                              {
                              if($rsvalue['supplements'] == 1){
                                          $rsvalue['supplements'] = 'Water view (Sea/Lake/River) ';
                                      }elseif($rsvalue['supplements'] == 2){
                                          $rsvalue['supplements'] = 'View (Garden/Balcony) ';
                                      }elseif($rsvalue['supplements'] == 3){
                                          $rsvalue['supplements'] = 'Executive/De Luxe/Superior Rooms ';
                                      }elseif($rsvalue['supplements'] == 4){
                                          $rsvalue['supplements'] = 'Dbl/tw room for sole ';
                                      }elseif($rsvalue['supplements'] == 7){
                                          $rsvalue['supplements'] = 'Walk In Shower ';
                                      }elseif($rsvalue['supplements'] == 8){
                                          $rsvalue['supplements'] = 'Ground Floor Room ';
                                      }elseif($rsvalue['supplements'] == 5){
                                  $rsvalue['supplements'] = $rsvalue['upgrade_name'].' ';
                              }
                              $supplements[] = $rsvalue['supplements'];
                              }
                          }
                      }
                  }
                  if(!empty($supplements)){
                      echo implode('<br>', $supplements);
                     
                  }
                  //addtional room supplemnt
                           $room_type_supplements = array();
                               
                          foreach ($value->cartExperiencesToRoomsRequests as $keyCRR => $valueCRR) {
                  
                              if($valueCRR['room_requests_id'] == 1){
                                          $valueCRR['supplements'] = 'Water view (Sea/Lake/River)';
                                      }elseif($valueCRR['room_requests_id'] == 2){
                                          $valueCRR['supplements'] = 'View (Garden/Balcony)';
                                      }elseif($valueCRR['room_requests_id'] == 3){
                                          $valueCRR['supplements'] = 'Executive/De Luxe/Superior Rooms';
                                      }elseif($valueCRR['room_requests_id'] == 4){
                                          $dbl_sole  = ((isset($rsvalue['upgrade_request_sup_status']) && $rsvalue['upgrade_request_sup_status'] == 'accepted')?'1':'1');
                                          $valueCRR['supplements'] = 'Dbl/tw room for sole';
                                      }elseif($valueCRR['room_requests_id'] == 5){
                                          $upgrade_name =  explode(',',$valueCRR['upgrade_name']);
                                              $upgrade_cost =  explode(',',$valueCRR['upgrade_cost']);
                  
                                              if(!empty($upgrade_name))
                                              {
                                                  $str_add = 'Others : ';
                                                  foreach($upgrade_name as $key=>$row)
                                                  {
                                                      $str_add .= $row.'('.$upgrade_cost[$key].')'.' ';
                                                  }
                                              }
                                          $valueCRR['supplements'] = rtrim($str_add);
                                      }
                              $room_type_supplements[] = $valueCRR;
                          }
                          $supplements_type = array();
                      if(!empty($room_type_supplements)){
                          foreach ($room_type_supplements as $rskey => $rsvalue) {
                  
                              if($rsvalue['cart_experiences_to_rooms_id'] == $value->id){
                                  if($rsvalue['upgrade_request_sup_status'] == 'accepted')
                                  {
                                      if($rsvalue['room_requests_id'] == 1){
                                      ;
                                              $rsvalue['supplements'] = 'Water view (Sea/Lake/River)';
                                          }elseif($rsvalue['room_requests_id'] == 2){
                                              $rsvalue['supplements'] = 'View (Garden/Balcony)';
                                          }elseif($rsvalue['room_requests_id'] == 3){
                                              $rsvalue['supplements'] = 'Executive/De Luxe/Superior Rooms';
                                          }elseif($rsvalue['room_requests_id'] == 4){
                                              $rsvalue['supplements'] = 'Dbl/tw room for sole';
                                          }elseif($rsvalue['room_requests_id'] == 7){
                                              $rsvalue['supplements'] = 'Walk In Shower';
                                          }elseif($rsvalue['room_requests_id'] == 8){
                                              $rsvalue['supplements'] = 'Ground Floor Room';
                                          }elseif($rsvalue['room_requests_id'] == 5){
                                      $rsvalue['supplements'] = $rsvalue['upgrade_name'];
                                  }
                                  $supplements_type[] = $rsvalue['supplements'];
                              }
                          }
                      }
                      }
                      if(!empty($supplements_type)){
                          //echo '<br>';
                          echo implode('<br>', $supplements_type);
                      }else{}
                  ?>
            </td>
            <td valign="middle" style="vertical-align: middle;border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif'; font-size: 12px; font-weight: 400; color: #32363A; line-height: 15px; text-align: left; padding: 2px 20px;">
               {{ $value->specials }}
            </td>
         </tr>
         <!-- END OF TABLE ROW -->
         <?php 
            $t++;
                        }
                        }
                    }
                }
            }
            ?>
         <?php } ?>
      </table>
      <!-- END OF TRIPLE ROOMS TABLE -->
      <br/>
      <?php } ?>
      <br/>
      <?php $tq = 0;$d_cnt = 0;if(!empty($qrdSCnt)){ ?> 
      <!-- START OF TRIPLE ROOMS TABLE -->
      <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0" style="border: solid 1px #EDEEEF; border-collapse: collapse;margin-top: 10px;">
         <!-- START OF TABLE NAME -->
         <tr style="border: solid 1px #EDEEEF; border-collapse: collapse;">
            <td colspan="4" style="border: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif'; font-size: 15px; font-weight: 400; color: #32363A; line-height: 25px; text-align: left; padding: 2px 20px;">
               <b>Quad rooms</b>
            </td>
         </tr>
         <!-- END OF TABLE NAME -->
         <!-- START OF TABLE HEADINGS -->
         <tr>
            <th bgcolor="#FAFAFA" style="background-color: #FAFAFA; border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif'; font-size: 12px; font-weight: 400; color: #32363A; line-height: 15px; text-align: left; padding: 2px 20px;">
               No. of rooms
            </th>
            <th bgcolor="#FAFAFA" style="background-color: #FAFAFA; border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif'; font-size: 12px; font-weight: 400; color: #32363A; line-height: 15px; text-align: left; padding: 2px 20px;">
               Name
            </th>
            <th bgcolor="#FAFAFA" style="background-color: #FAFAFA; border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif'; font-size: 12px; font-weight: 400; color: #32363A; line-height: 15px; text-align: left; padding: 2px 20px;">
               Guest request
            </th>
            <th bgcolor="#FAFAFA" style="background-color: #FAFAFA; border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif'; font-size: 12px; font-weight: 400; color: #32363A; line-height: 15px; text-align: left; padding: 2px 20px;">
               Note for the hotel
            </th>
         </tr>
         <!-- END OF TABLE HEADINGS -->
         <?php
            $tq = 0;
             if($cartExperiencesToRooms->count()>0){
                 $tq = 1;
                 foreach ($cartExperiencesToRooms as $key => $value) {
                     if($value->room_id == 5 && empty($value->is_optional_room)){ 
                  if(($value->names != '' &&  $value->names != ',' && $value->names != ',,' ) || !empty($value->room_requests) || !empty($value->specials)) {    
             ?>
         <!-- START OF TABLE ROW -->
         <tr>
            <td valign="middle" style="vertical-align: middle;border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif'; font-size: 12px; font-weight: 400; color: #32363A; line-height: 15px; text-align: left; padding: 2px 20px;">
               {{$tq}}
            </td>
            <td valign="middle" style="vertical-align: middle;border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif'; font-size: 12px; font-weight: 400; color: #32363A; line-height: 15px; text-align: left; padding: 2px 20px;">
               <?php $names =array();
                  $names = explode(',',$value->names);
                  if(!empty($names)){
                     foreach($names as $name)
                     {
                         echo '<p style="margin:0;">'.$name.'</p>';
                     }
                  } ?>
            </td>
            <td valign="middle" style="vertical-align: middle;border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif'; font-size: 12px; font-weight: 400; color: #32363A; line-height: 15px; text-align: left; padding: 2px 20px;">
               <!-- {{ $value->room_requests }} -->
               <?php 
                  $supplements = array();
                  if(!empty($roomsSupplementsRequest)){
                      $pen_can = 0;
                      foreach ($roomsSupplementsRequest as $rskey => $rsvalue) {
                          if($rsvalue['cart_experiences_to_rooms_id'] == $value->id){
                              if($rsvalue['upgrade_request_sup_status'] == 'pending')
                              {
                                  $pen_can = 1;
                              }
                              if($rsvalue['upgrade_request_sup_status'] == 'accepted')
                              {
                              if($rsvalue['supplements'] == 1){
                                          $rsvalue['supplements'] = 'Water view (Sea/Lake/River) ';
                                      }elseif($rsvalue['supplements'] == 2){
                                          $rsvalue['supplements'] = 'View (Garden/Balcony) ';
                                      }elseif($rsvalue['supplements'] == 3){
                                          $rsvalue['supplements'] = 'Executive/De Luxe/Superior Rooms ';
                                      }elseif($rsvalue['supplements'] == 4){
                                          $rsvalue['supplements'] = 'Dbl/tw room for sole ';
                                      }elseif($rsvalue['supplements'] == 7){
                                          $rsvalue['supplements'] = 'Walk In Shower ';
                                      }elseif($rsvalue['supplements'] == 8){
                                          $rsvalue['supplements'] = 'Ground Floor Room ';
                                      }elseif($rsvalue['supplements'] == 5){
                                  $rsvalue['supplements'] = $rsvalue['upgrade_name'].' ';
                              }
                              $supplements[] = $rsvalue['supplements'];
                              }
                          }
                      }
                  }
                  if(!empty($supplements)){
                      echo implode('<br>', $supplements);
                     
                  }
                  //addtional room supplemnt
                           $room_type_supplements = array();
                               
                          foreach ($value->cartExperiencesToRoomsRequests as $keyCRR => $valueCRR) {
                  
                              if($valueCRR['room_requests_id'] == 1){
                                          $valueCRR['supplements'] = 'Water view (Sea/Lake/River)';
                                      }elseif($valueCRR['room_requests_id'] == 2){
                                          $valueCRR['supplements'] = 'View (Garden/Balcony)';
                                      }elseif($valueCRR['room_requests_id'] == 3){
                                          $valueCRR['supplements'] = 'Executive/De Luxe/Superior Rooms';
                                      }elseif($valueCRR['room_requests_id'] == 4){
                                          $dbl_sole  = ((isset($rsvalue['upgrade_request_sup_status']) && $rsvalue['upgrade_request_sup_status'] == 'accepted')?'1':'1');
                                          $valueCRR['supplements'] = 'Dbl/tw room for sole';
                                      }elseif($valueCRR['room_requests_id'] == 5){
                                          $upgrade_name =  explode(',',$valueCRR['upgrade_name']);
                                              $upgrade_cost =  explode(',',$valueCRR['upgrade_cost']);
                  
                                              if(!empty($upgrade_name))
                                              {
                                                  $str_add = 'Others : ';
                                                  foreach($upgrade_name as $key=>$row)
                                                  {
                                                      $str_add .= $row.'('.$upgrade_cost[$key].')'.' ';
                                                  }
                                              }
                                          $valueCRR['supplements'] = rtrim($str_add);
                                      }
                              $room_type_supplements[] = $valueCRR;
                          }
                          $supplements_type = array();
                      if(!empty($room_type_supplements)){
                          foreach ($room_type_supplements as $rskey => $rsvalue) {
                  
                              if($rsvalue['cart_experiences_to_rooms_id'] == $value->id){
                                  if($rsvalue['upgrade_request_sup_status'] == 'accepted')
                                  {
                                      if($rsvalue['room_requests_id'] == 1){
                                      ;
                                              $rsvalue['supplements'] = 'Water view (Sea/Lake/River)';
                                          }elseif($rsvalue['room_requests_id'] == 2){
                                              $rsvalue['supplements'] = 'View (Garden/Balcony)';
                                          }elseif($rsvalue['room_requests_id'] == 3){
                                              $rsvalue['supplements'] = 'Executive/De Luxe/Superior Rooms';
                                          }elseif($rsvalue['room_requests_id'] == 4){
                                              $rsvalue['supplements'] = 'Dbl/tw room for sole';
                                          }elseif($rsvalue['room_requests_id'] == 7){
                                              $rsvalue['supplements'] = 'Walk In Shower';
                                          }elseif($rsvalue['room_requests_id'] == 8){
                                              $rsvalue['supplements'] = 'Ground Floor Room';
                                          }elseif($rsvalue['room_requests_id'] == 5){
                                      $rsvalue['supplements'] = $rsvalue['upgrade_name'];
                                  }
                                  $supplements_type[] = $rsvalue['supplements'];
                              }
                          }
                      }
                      }
                      if(!empty($supplements_type)){
                          //echo '<br>';
                          echo implode('<br>', $supplements_type);
                      }else{}
                  ?>
            </td>
            <td valign="middle" style="vertical-align: middle;border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif'; font-size: 12px; font-weight: 400; color: #32363A; line-height: 15px; text-align: left; padding: 2px 20px;">
               {{ $value->specials }}
            </td>
         </tr>
         <!-- END OF TABLE ROW -->
         <?php 
            $tq++;
            }
                    }
                }
            }
            ?>
         <?php if(!empty($cart_experience->display_on_print)) { ?>
         <?php
            if($cartExperiencesToRooms->count()>0){
                foreach ($cartExperiencesToRooms as $key => $value) {
                    if($value->room_id == 5 && !empty($value->is_optional_room)){ 
                        if($value->deposit == '1' || $value->paid == '1')
                        {
                if(($value->names != '' &&  $value->names != ',') || !empty($value->room_requests) || !empty($value->specials)) {
            ?>
         <!-- START OF TABLE ROW -->
         <tr style="page-break-inside:avoid;">
            <td valign="middle" style="vertical-align: middle;border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif'; font-size: 12px; font-weight: 400; color: #32363A; line-height: 15px; text-align: left; padding: 2px 20px;">
               {{$t}}
            </td>
            <td valign="middle" style="vertical-align: middle;border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif'; font-size: 12px; font-weight: 400; color: #32363A; line-height: 15px; text-align: left; padding: 2px 20px;">
               <?php $names =array();
                  $names = explode(',',$value->names);
                  if(!empty($names)){
                     foreach($names as $name)
                     {
                         echo '<p style="margin:0;">'.$name.'</p>';
                     }
                  } ?>
            </td>
            <td valign="middle" style="vertical-align: middle;border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif'; font-size: 12px; font-weight: 400; color: #32363A; line-height: 15px; text-align: left; padding: 2px 20px;">
               <!-- {{ $value->room_requests }} -->
               <?php 
                  $supplements = array();
                  if(!empty($roomsSupplementsRequest)){
                      $pen_can = 0;
                      foreach ($roomsSupplementsRequest as $rskey => $rsvalue) {
                          if($rsvalue['cart_experiences_to_rooms_id'] == $value->id){
                              if($rsvalue['upgrade_request_sup_status'] == 'pending')
                              {
                                  $pen_can = 1;
                              }
                              if($rsvalue['upgrade_request_sup_status'] == 'accepted')
                              {
                              if($rsvalue['supplements'] == 1){
                                          $rsvalue['supplements'] = 'Water view (Sea/Lake/River) ';
                                      }elseif($rsvalue['supplements'] == 2){
                                          $rsvalue['supplements'] = 'View (Garden/Balcony) ';
                                      }elseif($rsvalue['supplements'] == 3){
                                          $rsvalue['supplements'] = 'Executive/De Luxe/Superior Rooms ';
                                      }elseif($rsvalue['supplements'] == 4){
                                          $rsvalue['supplements'] = 'Dbl/tw room for sole ';
                                      }elseif($rsvalue['supplements'] == 7){
                                          $rsvalue['supplements'] = 'Walk In Shower ';
                                      }elseif($rsvalue['supplements'] == 8){
                                          $rsvalue['supplements'] = 'Ground Floor Room ';
                                      }elseif($rsvalue['supplements'] == 5){
                                  $rsvalue['supplements'] = $rsvalue['upgrade_name'].' ';
                              }
                              $supplements[] = $rsvalue['supplements'];
                              }
                          }
                      }
                  }
                  if(!empty($supplements)){
                      echo implode('<br>', $supplements);
                     
                  }
                  //addtional room supplemnt
                           $room_type_supplements = array();
                               
                          foreach ($value->cartExperiencesToRoomsRequests as $keyCRR => $valueCRR) {
                  
                              if($valueCRR['room_requests_id'] == 1){
                                          $valueCRR['supplements'] = 'Water view (Sea/Lake/River)';
                                      }elseif($valueCRR['room_requests_id'] == 2){
                                          $valueCRR['supplements'] = 'View (Garden/Balcony)';
                                      }elseif($valueCRR['room_requests_id'] == 3){
                                          $valueCRR['supplements'] = 'Executive/De Luxe/Superior Rooms';
                                      }elseif($valueCRR['room_requests_id'] == 4){
                                          $dbl_sole  = ((isset($rsvalue['upgrade_request_sup_status']) && $rsvalue['upgrade_request_sup_status'] == 'accepted')?'1':'1');
                                          $valueCRR['supplements'] = 'Dbl/tw room for sole';
                                      }elseif($valueCRR['room_requests_id'] == 5){
                                          $upgrade_name =  explode(',',$valueCRR['upgrade_name']);
                                              $upgrade_cost =  explode(',',$valueCRR['upgrade_cost']);
                  
                                              if(!empty($upgrade_name))
                                              {
                                                  $str_add = 'Others : ';
                                                  foreach($upgrade_name as $key=>$row)
                                                  {
                                                      $str_add .= $row.'('.$upgrade_cost[$key].')'.' ';
                                                  }
                                              }
                                          $valueCRR['supplements'] = rtrim($str_add);
                                      }
                              $room_type_supplements[] = $valueCRR;
                          }
                          $supplements_type = array();
                      if(!empty($room_type_supplements)){
                          foreach ($room_type_supplements as $rskey => $rsvalue) {
                  
                              if($rsvalue['cart_experiences_to_rooms_id'] == $value->id){
                                  if($rsvalue['upgrade_request_sup_status'] == 'accepted')
                                  {
                                      if($rsvalue['room_requests_id'] == 1){
                                      ;
                                              $rsvalue['supplements'] = 'Water view (Sea/Lake/River)';
                                          }elseif($rsvalue['room_requests_id'] == 2){
                                              $rsvalue['supplements'] = 'View (Garden/Balcony)';
                                          }elseif($rsvalue['room_requests_id'] == 3){
                                              $rsvalue['supplements'] = 'Executive/De Luxe/Superior Rooms';
                                          }elseif($rsvalue['room_requests_id'] == 4){
                                              $rsvalue['supplements'] = 'Dbl/tw room for sole';
                                          }elseif($rsvalue['room_requests_id'] == 7){
                                              $rsvalue['supplements'] = 'Walk In Shower';
                                          }elseif($rsvalue['room_requests_id'] == 8){
                                              $rsvalue['supplements'] = 'Ground Floor Room';
                                          }elseif($rsvalue['room_requests_id'] == 5){
                                      $rsvalue['supplements'] = $rsvalue['upgrade_name'];
                                  }
                                  $supplements_type[] = $rsvalue['supplements'];
                              }
                          }
                      }
                      }
                      if(!empty($supplements_type)){
                          //echo '<br>';
                          echo implode('<br>', $supplements_type);
                      }else{}
                  ?>
            </td>
            <td valign="middle" style="vertical-align: middle;border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif'; font-size: 12px; font-weight: 400; color: #32363A; line-height: 15px; text-align: left; padding: 2px 20px;">
               {{ $value->specials }}
            </td>
         </tr>
         <!-- END OF TABLE ROW -->
         <?php 
            $t++;
                        }
                        }
                    }
                }
            }
            ?>
         <?php } ?>
      </table>
      <!-- END OF TRIPLE ROOMS TABLE -->
      <br/>
      <?php } ?>

      @if (!empty($cart_experience->driver_room_type))
      <!-- START OF TRIPLE ROOMS TABLE -->
      <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0" style="border: solid 1px #EDEEEF; border-collapse: collapse;margin-top: 10px;">
         <!-- START OF TABLE NAME -->
         <tr style="border: solid 1px #EDEEEF; border-collapse: collapse;">
            <td colspan="4" style="border: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif'; font-size: 15px; font-weight: 400; color: #32363A; line-height: 25px; text-align: left; padding: 2px 20px;">
               <b>Driver</b>
            </td>
         </tr>
         <!-- END OF TABLE NAME -->
         <!-- START OF TABLE HEADINGS -->
         <tr>
            <th bgcolor="#FAFAFA" style="background-color: #FAFAFA; border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif'; font-size: 12px; font-weight: 400; color: #32363A; line-height: 15px; text-align: left; padding: 2px 20px;">
               Room Type
            </th>
            <th bgcolor="#FAFAFA" style="background-color: #FAFAFA; border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif'; font-size: 12px; font-weight: 400; color: #32363A; line-height: 15px; text-align: left; padding: 2px 20px;">
               Name
            </th>
            <th bgcolor="#FAFAFA" style="background-color: #FAFAFA; border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif'; font-size: 12px; font-weight: 400; color: #32363A; line-height: 15px; text-align: left; padding: 2px 20px;">
               <!-- Paying -->
            </th>
            <th bgcolor="#FAFAFA" style="background-color: #FAFAFA; border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif'; font-size: 12px; font-weight: 400; color: #32363A; line-height: 15px; text-align: left; padding: 2px 20px;">
               Additional Information
            </th>
         </tr>
         <!-- END OF TABLE HEADINGS -->
        
         <!-- START OF TABLE ROW -->
         <tr>
            <td valign="middle" style="vertical-align: middle;border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif'; font-size: 12px; font-weight: 400; color: #32363A; line-height: 15px; text-align: left; padding: 2px 20px;">
               {{($cart_experience->driver_room_type == 1)?'Single':($cart_experience->driver_room_type == 2?'Double':'Twin')}}
            </td>
            <td valign="middle" style="vertical-align: middle;border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif'; font-size: 12px; font-weight: 400; color: #32363A; line-height: 15px; text-align: left; padding: 2px 20px;">
              @if($cart_experience->driver_room_type == 1)
              {{!empty($cart_experience->driver_name)?$cart_experience->driver_name:''}}
              @else
               {{!empty($cart_experience->driver_name)?$cart_experience->driver_name:''}}<br/>
               {{!empty($cart_experience->courier_name)?$cart_experience->courier_name:''}}
               @endif
            </td>
            <td valign="middle" style="vertical-align: middle;border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif'; font-size: 12px; font-weight: 400; color: #32363A; line-height: 15px; text-align: left; padding: 2px 20px;">
               <!-- @if($cart_experience->driver_room_type == 1)
                {{($cart_experience->driver_paying == 1)?'Free':'Paying'}}
              @else
               {{($cart_experience->driver_paying == 1)?'Free':'Paying'}}<br/>
               {{($cart_experience->driver_paying1 == 1)?'Free':'Paying'}}
               @endif -->
            </td>
            <td valign="middle" style="vertical-align: middle;border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif'; font-size: 12px; font-weight: 400; color: #32363A; line-height: 15px; text-align: left; padding: 2px 20px;">
               {{ $cart_experience->driver_contact }}
            </td>
         </tr>
         <?php if(!empty($cart_experience->driver_name1)){ ?> 
          <tr>
            <td valign="middle" style="vertical-align: middle;border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif'; font-size: 12px; font-weight: 400; color: #32363A; line-height: 15px; text-align: left; padding: 2px 20px;">
               {{($cart_experience->driver_room_type1 == 1)?'Single':($cart_experience->driver_room_type1 == 2?'Double':'Twin')}}
            </td>
            <td valign="middle" style="vertical-align: middle;border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif'; font-size: 12px; font-weight: 400; color: #32363A; line-height: 15px; text-align: left; padding: 2px 20px;">
              @if($cart_experience->driver_room_type1 == 1)
              {{!empty($cart_experience->driver_name1)?$cart_experience->driver_name1:''}}
              @else
               {{!empty($cart_experience->driver_name1)?$cart_experience->driver_name1:''}}<br/>
               {{!empty($cart_experience->courier_name1)?$cart_experience->courier_name1:''}}
               @endif
            </td>
            <td valign="middle" style="vertical-align: middle;border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif'; font-size: 12px; font-weight: 400; color: #32363A; line-height: 15px; text-align: left; padding: 2px 20px;">
               <!-- @if($cart_experience->driver_room_type == 1)
                {{($cart_experience->driver_paying == 1)?'Free':'Paying'}}
              @else
               {{($cart_experience->driver_paying == 1)?'Free':'Paying'}}<br/>
               {{($cart_experience->driver_paying1 == 1)?'Free':'Paying'}}
               @endif -->
            </td>
            <td valign="middle" style="vertical-align: middle;border-bottom: solid 1px #EDEEEF; border-collapse: collapse; font-family: 'sans-serif'; font-size: 12px; font-weight: 400; color: #32363A; line-height: 15px; text-align: left; padding: 2px 20px;">
               {{ $cart_experience->driver_contact1 }}
            </td>
         </tr>
         <?php } ?>
      </table>
      <!-- END OF TRIPLE ROOMS TABLE -->
      <br/>
      @endif
      <!-- START OF ACCOMMODATION SUMMARY -->
      <br/>
      <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
         <tr>
            <td colspan="2" style="font-family: 'sans-serif'; font-size: 18px; font-weight: 700; color: #14213D; line-height: 30px; text-align: left;">
               Accommodation Summary
            </td>
         </tr>
         <tr>
            <!-- START OF QUANTITY / ROOM TYPE -->
            <td width="70%" align="left" valign="top">
               <table width="100%"  cellpadding="0" cellspacing="0" border="0">
                  <!-- START OF TABLE HEADINGS -->
                  <tr>
                     <td width="50" style="font-family: 'sans-serif'; font-size: 13px; font-weight: 700; color: #14213D; line-height: 24px; text-align: left;padding: 0 20px 3px 20px; ">
                        Quantity
                     </td>
                     <td style="font-family: 'sans-serif'; font-size: 13px; font-weight: 700; color: #14213D; line-height: 24px; text-align: left;padding: 0 20px 3px 20px; ">
                        Room Type
                     </td>
                  </tr>
                  <!-- END OF TABLE HEADINGS -->
                  <!-- START OF TABLE ROW -->
                  <?php if(!empty($i)){ ?>
                  <tr>
                     <td valign="middle" style="vertical-align: middle;font-family: 'sans-serif'; font-size: 13px; font-weight: 400; color: #14213D; line-height: 24px; text-align: center;padding: 0 20px 3px 20px; ">
                        {{!empty($i)?$i-1:'0'}}
                     </td>
                     <td valign="middle" style="vertical-align: middle;font-family: 'sans-serif'; font-size: 13px; font-weight: 400; color: #14213D; line-height: 24px; text-align: left;padding: 0 20px 3px 20px; ">
                        Single Room
                     </td>
                  </tr>
                  <?php } ?>
                  <!-- END OF TABLE ROW -->
                  <!-- START OF TABLE ROW -->
                  <?php if(!empty($j)){ ?>
                  <tr>
                     <td valign="middle" style="vertical-align: middle;font-family: 'sans-serif'; font-size: 13px; font-weight: 400; color: #14213D; line-height: 24px; text-align: center;padding: 0 20px 3px 20px; ">
                        {{!empty($j)?$j-1:'0'}}
                     </td>
                     <td valign="middle" style="vertical-align: middle;font-family: 'sans-serif'; font-size: 13px; font-weight: 400; color: #14213D; line-height: 24px; text-align: left; padding: 0 20px 3px 20px;">
                        Double Room
                     </td>
                  </tr>
                  <?php } ?>
                  <!-- END OF TABLE ROW -->
                  <?php if(!empty($doublesrs)){ ?>
                  <tr>
                     <td valign="middle" style="vertical-align: middle;font-family: 'sans-serif'; font-size: 13px; font-weight: 400; color: #14213D; line-height: 24px; text-align: center;padding: 0 20px 3px 20px; ">
                        {{$doublesrs}}
                     </td>
                     <td valign="middle" style="vertical-align: middle;font-family: 'sans-serif'; font-size: 13px; font-weight: 400; color: #14213D; line-height: 24px; text-align: left;padding: 0 20px 3px 20px; ">
                        Double SS
                     </td>
                  </tr>
                  <?php } ?>
                  <!-- START OF TABLE ROW -->
                  <?php if(!empty($k)){ ?>
                  <tr>
                     <td valign="middle" style="vertical-align: middle;font-family: 'sans-serif'; font-size: 13px; font-weight: 400; color: #14213D; line-height: 24px; text-align: center;padding: 0 20px 3px 20px; ">
                        {{!empty($k)?$k-1:'0'}}
                     </td>
                     <td valign="middle" style="vertical-align: middle;font-family: 'sans-serif'; font-size: 13px; font-weight: 400; color: #14213D; line-height: 24px; text-align: left;padding: 0 20px 3px 20px; ">
                        Twin Room
                     </td>
                  </tr>
                 <?php } ?>
                  <!-- END OF TABLE ROW -->
                  <?php if(!empty($twinsrs)){ ?>
                  <tr>
                     <td valign="middle" style="vertical-align: middle;font-family: 'sans-serif'; font-size: 13px; font-weight: 400; color: #14213D; line-height: 24px; text-align: center;padding: 0 20px 3px 20px; ">
                        {{$twinsrs}}
                     </td>
                     <td valign="middle" style="vertical-align: middle;font-family: 'sans-serif'; font-size: 13px; font-weight: 400; color: #14213D; line-height: 24px; text-align: left;padding: 0 20px 3px 20px; ">
                        Twin SS
                     </td>
                  </tr>
                  <?php } ?>
                  <?php if(!empty($t)){ ?>
                  <!-- START OF TABLE ROW -->
                  <tr>
                     <td valign="middle" style="vertical-align: middle;font-family: 'sans-serif'; font-size: 13px; font-weight: 400; color: #14213D; line-height: 24px; text-align: center;padding: 0 20px 3px 20px; ">
                        {{!empty($t)?$t-1:'0'}}
                     </td>
                     <td valign="middle" style="vertical-align: middle;font-family: 'sans-serif'; font-size: 13px; font-weight: 400; color: #14213D; line-height: 24px; text-align: left;padding: 0 20px 3px 20px; ">
                        Triple Room
                     </td>
                  </tr>
                  <?php } ?>
                  <?php if(!empty($tq)){ ?>
                  <!-- START OF TABLE ROW -->
                  <tr>
                     <td valign="middle" style="vertical-align: middle;font-family: 'sans-serif'; font-size: 13px; font-weight: 400; color: #14213D; line-height: 24px; text-align: center;padding: 0 20px 3px 20px; ">
                        {{!empty($tq)?$tq-1:'0'}}
                     </td>
                     <td valign="middle" style="vertical-align: middle;font-family: 'sans-serif'; font-size: 13px; font-weight: 400; color: #14213D; line-height: 24px; text-align: left;padding: 0 20px 3px 20px; ">
                        Quad Room
                     </td>
                  </tr>
                  <?php } ?>
                  <!-- END OF TABLE ROW -->
                  
                   <!-- START OF TABLE ROW -->
                  <!-- <tr>
                     <td valign="middle" style="vertical-align: middle;font-family: 'sans-serif'; font-size: 13px; font-weight: 400; color: #14213D; line-height: 24px; text-align: center;padding: 0 20px 3px 20px; ">
                        {{!empty($tq)?$tq-1:'0'}}
                     </td>
                     <td valign="middle" style="vertical-align: middle;font-family: 'sans-serif'; font-size: 13px; font-weight: 400; color: #14213D; line-height: 24px; text-align: left;padding: 0 20px 3px 20px; ">
                        Quadruple Room
                     </td>
                  </tr> -->
                  <!-- END OF TABLE ROW -->

                  <!-- START OF TABLE ROW -->
                  <?php if(!empty($cart_experience->driver_room_type)){ ?>
                  <tr>
                     <td valign="middle" style="vertical-align: middle;font-family: 'sans-serif'; font-size: 13px; font-weight: 400; color: #14213D; line-height: 24px; text-align: center;padding: 0 20px 3px 20px; ">
                        <?php 
                           //echo $cart_experience->driver_room_type;
                           //echo $cart_experience->driver_room_type1;
                           if(!empty($cart_experience->driver_room_type) && !empty($cart_experience->driver_room_type1) && ($cart_experience->driver_room_type == $cart_experience->driver_room_type1))
                           {
                               $total_driver = 2;
                           }
                           else
                           {
                                if(!empty($cart_experience->driver_room_type) && !empty($cart_experience->driver_room_type1) && ($cart_experience->driver_room_type == $cart_experience->driver_room_type1))
                                {
                                   $total_driver = ($cart_experience->driver_name != '' && $cart_experience->driver_name1 != '') ?'2':'1';
                                }
                                else
                                {
                                   $total_driver = 1;
                                }
                               
                           }
                            
                           echo $total_driver;
                           ?>
                     </td>
                     <td valign="middle" style="vertical-align: middle;font-family: 'sans-serif'; font-size: 13px; font-weight: 400; color: #14213D; line-height: 24px; text-align: left;padding: 0 20px 3px 20px; ">
                        <?php 
                           $room_type = array('1'=>'Single','2'=>'Double','3'=>'Twin');
                           $type1= $room_type[$cart_experience->driver_room_type] ;?>
                        Driver ({{$type1}})
                     </td>
                  </tr>
                  <?php }
                     if(!empty($cart_experience->driver_room_type1) && $total_driver != '2' ){ ?>
                  <tr>
                     <td valign="middle" style="vertical-align: middle;font-family: 'sans-serif'; font-size: 13px; font-weight: 400; color: #14213D; line-height: 24px; text-align: center;padding: 0 20px 3px 20px; ">
                        <?php 
                           $total_driver= 1; 
                           echo $total_driver;
                           
                           ?>
                     </td>
                     <td valign="middle" style="vertical-align: middle;font-family: 'sans-serif'; font-size: 13px; font-weight: 400; color: #14213D; line-height: 24px; text-align: left;padding: 0 20px 3px 20px; ">
                        <?php 
                           $room_type = array('1'=>'Single','2'=>'Double','3'=>'Twin');
                           $type2= $room_type[$cart_experience->driver_room_type1] ;?>
                        Driver ({{$type2}})
                     </td>
                  </tr>
                  <?php } ?>
                  <!-- END OF TABLE ROW -->
               </table>
            </td>
            <!-- END OF QUANTITY / ROOM TYPE -->
            <!-- START OF TOTALS -->
            <td width="30%" align="right" valign="top">
               <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                  <tr>
                     <td align="right"  style="text-align: right;font-family: 'sans-serif'; font-size: 20px;  color: #14213D; line-height: 24px; text-align: left; ">
                        <?php $total_pax = get_total_pax($cart_experience->id); ?>
                        <b>Total Pax: <b> {{str_replace('pax','',$total_pax)}}
                        <?php //echo ($cart_experience->driver_name != '' && $cart_experience->driver_name1 != '') ? '+ 2 Dr' : (($cart_experience->driver_name != '') ? '+ 1 Dr' : ''); ?>
                     </td>
                  </tr>
                  <tr>
                     <td align="right" style="text-align: right; font-family: 'sans-serif'; font-size: 20px;  color: #14213D; line-height: 24px; text-align: left; ">
                        <!-- <span style="font-weight: 600;">Total rooms:</span> {{$i+$j+$k}}<br>
                           (+ 1 single room for the driver) -->
                     </td>
                  </tr>
               </table>
            </td>
            <!-- END OF TOTALS -->
         </tr>
      </table>
      <br/>
      <!-- END OF ACCOMMODATION SUMMARY -->
      <!-- <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0" style="margin: 0 auto;">
         <tr>
             <td style="font-family: 'sans-serif'; font-size: 13px; font-weight: 400; color: #14213D; line-height: 24px; text-align: left;padding: 0 20px 15px 20px; ">
                 <span style="font-weight: 600;">Total Pax:</span> {{$rooms_ppl+$d_cnt}}
                 @if(!empty($cart_experience->driver))
                 + {{$cart_experience->driver}} Dr
                 @endif
             </td>
         </tr>
         
         <tr>
             <td style="font-family: 'sans-serif'; font-size: 13px; font-weight: 400; color: #14213D; line-height: 24px; text-align: left; padding: 0 20px;">
                 <span style="font-weight: 600;"><!-- Total rooms: --></span> <!-- {{$i+$j+$k}}<br>
         (+ 1 single room for the driver) -->
      <!-- </td>
         </tr>
         
         </table> -->
      <!-- START OF DISCLAIMER -->
      <?php if(!empty($cart_experience->single) || !empty($cart_experience->double) || !empty($cart_experience->twin)){ ?>
      <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0" style="margin: 0 auto;">
         <tr>
            <td style="font-family: 'sans-serif'; font-size: 20px; font-weight: 400; color: #14213D; line-height: 24px; text-align: center; padding-bottom: 78px;">
               Please note that <strong><?php echo !empty($cart_experience->single) ? $cart_experience->single : '0'; ?> Single, <?php echo !empty($cart_experience->double) ? $cart_experience->double : '0'; ?> Double room, <?php echo !empty($cart_experience->twin) ? $cart_experience->twin : '0'; ?> Twin room</strong> are being held on option until <?php echo !empty($cart_experience->held_last_time) ? date("h:i A",strtotime($cart_experience->held_last_time)) : ''; ?> on <?php echo !empty($cart_experience->held_last_date) ? date("d F 'y",strtotime($cart_experience->held_last_date)) : ''; ?>, after which any unsold rooms will be released back at no cancellation charge.
            </td>
         </tr>
      </table>
      <?php } ?>
      <!-- END OF DISCLAIMER -->
      <!-- START OF FOOTER -->
      <!--  <table align="left" cellpadding="0" cellspacing="0" border="0">
         <tr>
         
           
         
             <td width="100%" align="left" valign="middle" style="vertical-align: middle;font-family: 'sans-serif'; font-size: 12px; font-weight: 400; color: #14213D; line-height: 15px; text-align: left;">
                 <br/>
                 <br/>
                 <br/>
                 T: +44 01753 836600<br/>
                 E: vadmin@veenus.com<br/>
                 Sir Henry Darvill House, 8-10 William St, Windsor SL4 1BA<br/>
             </td>
         
           
         </tr>
         </table> -->
      <!--  <table align="center" cellpadding="0" cellspacing="0" border="0" style="margin: 0 auto;">
         <tr>
         
             <td width="10%" align="center" valign="middle" style="vertical-align: middle;font-family: 'sans-serif'; font-size: 12px; font-weight: 400; color: #14213D; text-align: center; padding-right: 75px">
                 <span style="margin-top:60px;"><b>Veenus</b> &nbsp;</span>
             </td>
         
             <td width="25%" align="center" valign="middle" style="vertical-align: middle;font-family: 'sans-serif'; font-size: 12px; font-weight: 400; color: #14213D; line-height: 24px; text-align: center; padding-right: 75px">
                 <b>Telephone:</b> +44 01753 836600
             </td>
         
             <td width="25%" align="center" valign="middle" style="vertical-align: middle;font-family: 'sans-serif'; font-size: 12px; font-weight: 400; color: #14213D; line-height: 24px; text-align: center; padding-right: 75px">
                 <b>Email:</b> vadmin@veenus.com
             </td>
         
             <td width="40%" align="center" valign="middle" style="vertical-align: middle;font-family: 'sans-serif'; font-size: 12px; font-weight: 400; color: #14213D; line-height: 24px; text-align: center;">
                 <b>Address:</b><br> Sir Henry Darvill House, 8-10 William St, Windsor SL4 1BA
             </td>
         
         </tr>
         </table> -->
      <!-- END OF FOOTER -->
      <!-- 
         </td>
         </tr>
         </table> -->
      <footer>
         <table align="left" cellpadding="0" cellspacing="0" border="0">
            <tr>
               <td width="100%" align="left" valign="middle" style="vertical-align: middle;font-family: 'sans-serif'; font-size: 12px; font-weight: 400; color: #14213D; line-height: 15px; text-align: left;">
                  <br/>
                  <br/>
                  <br/>
                  T: +44 01753 836600<br/>
                  E: vadmin@veenus.com<br/>
                  Sir Henry Darvill House, 8-10 William St, Windsor SL4 1BA<br/>
               </td>
            </tr>
         </table>
      </footer>
   </body>
</html>
