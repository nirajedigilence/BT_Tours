
<table id="complex_header" class="table table-striped table-bordered display" style="width:100%">
    <thead>
       <tr class="text-left border-b-2 border-gray-300">
            <th align="center" width="20" style="background-color:  #80b3e5;font-size:15px;border: 1px solid #000000;">Client</th>
            <th align="center" width="20" style="background-color:  #80b3e5;font-size:15px;border: 1px solid #000000;">Hotel</th>
            <th align="center" width="20" style="background-color:  #80b3e5;font-size:15px;border: 1px solid #000000;">Tour Name</th>
            <th align="center" width="20" style="background-color:  #80b3e5;font-size:15px;border: 1px solid #000000;">In date</th>
            <th align="center" width="20" style="background-color:  #80b3e5;font-size:15px;border: 1px solid #000000;">Out Date</th>
            <th align="center" width="20" style="background-color:  #80b3e5;font-size:15px;border: 1px solid #000000;">Day</th>
            <th align="center" width="20" style="background-color:  #80b3e5;font-size:15px;border: 1px solid #000000;">Experience</th>
            <!-- <th align="center" width="20" style="background-color:  #80b3e5;font-size:15px;border: 1px solid #000000;">Experience Date</th> -->
            <th align="center" width="20" style="background-color:  #80b3e5;font-size:15px;border: 1px solid #000000;">Inclusion</th>
            <th align="center" width="20" style="background-color:  #80b3e5;font-size:15px;border: 1px solid #000000;">Package Link</th>
             <th align="center" width="30" style="background-color:  #80b3e5;font-size:15px;border: 1px solid #000000;">Status</th>
        </tr>
        
    </thead>
    <tbody> 
        
         <?php 
         foreach($items as $key => $item)
         {
            $inv = '';
            $inv_array = array();
             if(isset($_GET['booking_type']))
            {
                if(in_array('1',$_GET['booking_type']) && in_array('2',$_GET['booking_type']) && in_array('3',$_GET['booking_type']))
                {
                    

                }
                else
                {
                    if(in_array('1',$_GET['booking_type']) && in_array('2',$_GET['booking_type']))
                    {
                        if(($item->completed == 0 || $item->completed == 1) &&  $item->cancel_status == 0){
                            
                        }
                        else
                        {
                            continue;
                        }

                    }
                    else if(in_array('1',$_GET['booking_type']) && in_array('3',$_GET['booking_type']))
                    {
                        if(($item->completed == 0) ||  ($item->cancel_status == 1 && $item->completed == 0)){
                            
                        }
                        else
                        {
                            continue;
                        }

                    }
                    else if(in_array('2',$_GET['booking_type']) && in_array('3',$_GET['booking_type']))
                    {
                        if(($item->completed == 1) ||  ($item->cancel_status == 1 && $item->completed == 0)){
                            
                        }
                        else
                        {
                            continue;
                        }

                    }
                    else if(in_array('1',$_GET['booking_type']))
                    {
                        if($item->completed == 0 && $item->cancel_status == 0){
                            
                        }
                        else
                        {
                            continue;
                        }

                    }
                    else if(in_array('2',$_GET['booking_type']))
                    {
                        if(($item->completed == 1)){
                            
                        }
                        else
                        {
                            continue;
                        }

                    }
                    else if(in_array('3',$_GET['booking_type']))
                    {
                        if(($item->cancel_status == 1)){
                           
                        }
                        else
                        {
                            continue;
                        }

                    }
                    else
                    {
                        
                    }
                    
                }
               
                
            }
            
            // tracking 1,2,3 add due date
            $initial_due_days[3] = config('notification.1st_tracking_initial_due_days');
            $initial_due_days[4] = config('notification.2nd_tracking_initial_due_days');
            $initial_due_days[6] = config('notification.3rd_tracking_initial_due_days');
            if(!empty($initial_due_days)){
                foreach ($initial_due_days as $status => $initdays) {
                
                    $dueDate = date('Y-m-d H:i:s', strtotime($item->date_from." ".$initdays." day"));
                    $due = strtotime($item->date_from." ".$initdays." day");
                    $today = strtotime(date('Y-m-d'));
                    $checkTourStatuses = 


DB::connection('mysql_veenus')->table('cart_experiences_to_tour_statuses')->where('cart_experiences_id', $item->id)->where('tour_statuses_id', $status)->first();
                    $checkTourStatusesURL = 


DB::connection('mysql_veenus')->table('cart_experiences_to_tour_statuses')->where('cart_experiences_id', $item->id)->where('tour_statuses_id','2')->first();
                    if(!empty($checkTourStatusesURL->completed))
                    {
                        /*if(empty($checkTourStatuses) && $today >= $due){
                                


DB::connection('mysql_veenus')->table('cart_experiences_to_tour_statuses')->insert([
                                    'tour_statuses_id' => $status,
                                    'cart_experiences_id' => $item->id,
                                    'created_at' => date('Y-m-d H:i:s'),
                                    'due_date' => $dueDate
                                ]);
                            }*/
                    }
                    
                }
            }
            // end tracking 1,2,3 add due date


           
            $cancellation_days = array(0); 

            if(!empty($item->experiences_id)){
                $experience_dates = 


DB::connection('mysql_veenus')->table('experiences')->where('id', $item->experiences_id)->where('deleted_at', null)->get()->toArray();
                
                if(!empty($experience_dates)){
                    foreach ($experience_dates as $key => $value) {
                        $cancellation_days[] = $value->can_deadline;
                    }
                }
            }
            if(isset($item->tourStatuses->last()->id)){ 
                if(isset($_GET['stage']) && !empty($_GET['stage'])){
                    if(optional($item->tourStatuses->last())->percent != $_GET['stage']){
                        continue;
                    }
                }
                if(isset($_GET['month']) && !empty($_GET['month'])){
                    $month = date('m',strtotime($item['date_from']));
                    if($month != $_GET['month']){
                        continue;
                    }
                }
                if(isset($_GET['date_from']) && !empty($_GET['date_from']) && isset($_GET['date_to']) && !empty($_GET['date_to'])){
                    $filter_from_date = strtotime(str_replace('/', '-', $_GET['date_from']));
                    $date_from = strtotime($item['date_from']);
                    $filter_from_to = strtotime(str_replace('/', '-', $_GET['date_to']));
                    if($filter_from_date > $date_from || $filter_from_to < $date_from){
                        continue;
                    }
                }
                $experiences = 


DB::connection('mysql_veenus')->table('experiences')->where('id', $item->experiences_id)->first();
               
                
               //echo $inv;exit;
                ?>
           <?php  $experiencesToAttr = 


DB::connection('mysql_veenus')->table('cart_experiences_to_attractions')->where('cart_exp_id', $item->id)->where('deleted_at', null)->get()->toArray();
           $hotel_data = get_hotel_date($item->id);
           if(!empty($experiencesToAttr)){


               foreach ($experiencesToAttr as $key => $expRow) {
                $inv_array = array();
                $attractions = 


DB::connection('mysql_veenus')->table('attractions')->where('id', $expRow->attractions_id)->first();?>
               

            <tr class="border-b border-gray-200">
                    <td align="center" valign="top" style="border: 1px solid #000000;">{{ isset($item->colobratorName) ? $item->colobratorName : '-' }}</td>
                    <td align="center" valign="top" style="border: 1px solid #000000;">{{ $hotel_data['hotel_name'] }}</td>
                    <td align="center" valign="top" style="border: 1px solid #000000;">{{ $item->experience_name }}</td>
                    <td align="center" valign="top" style="border: 1px solid #000000;">{{ date("d/m/Y", strtotime($item['date_from'])) }} </td>
                    <td align="center" valign="top" style="border: 1px solid #000000;">{{ date("d/m/Y", strtotime($item['date_to'])) }}</td>
                    <td align="center" valign="top" style="border: 1px solid #000000;"></td>
                    <td align="left" valign="top" style="border: 1px solid #000000;width: 500px;">
                        {{!empty($attractions->name)?$attractions->name:''}}
                   </td>
                   <!-- <td align="left" valign="top" style="border: 1px solid #000000;width: 500px;">
                    <?php $dt1= $expRow->date.' '.$expRow->time;
                    $dt= !empty($expRow->date)?date("d/m/Y h:i a", strtotime($dt1)):''; ?>
                        {{$dt}}
                   </td> -->
                    <td align="left" valign="top" style="border: 1px solid #000000;width: 500px;">
                         <?php
                            if(!empty($attractions->inclusions)){
                                
                                $unserl1 = unserialize($attractions->inclusions);
                                if(!empty($unserl1))
                                {
                                    foreach($unserl1 as $atinv)
                                    {
                                        $inv_array[] = $atinv;
                                    }
                                    if(!empty($inv_array)){
                                        $inv_array = array_unique($inv_array);

                                        foreach($inv_array as $inv_text){
                                            
                                            ?>
                                            {{$inv_text}},<br style="mso-data-placement:same-cell;" />
                                            <?php
                                        }
                                    }
                                }
                                //$inv .= implode(',', $unserl1).',';
                             } 
                             ?>
                    </td>
                <td align="left" valign="top" style="border: 1px solid #000000;width: 500px;"><a href="{{URL('/tour-overview/'.$item->id)}}">{{URL('/tour-overview/'.$item->id)}}</a></td>
                <td align="center" valign="top" style="border: 1px solid #000000;">
                     <?php if(empty($item->completed)){
                        if($item->cancel_status == 1)
                        {
                            if($item->full_cancel == 1)
                            {
                                 echo 'Pending Cancelled';
                            }
                            else{
                                 echo 'Cancelled';
                            }
                        }
                        else{echo 'Current';}
                     } 
                     else{
                        echo 'Completed';
                     }?>
                 </td>
            </tr>
             <?php }
         } 
    }

            }?>
    </tbody>
</table>
