<style type="text/css">
	.tblBorderCls tr td:first-child{
		border-right: unset !important;
	}
	
	.tblBorderCls{border: unset !important;}
	.table thead th {
    border-bottom: 2px solid;
    border-top: unset !important;
}
	.table thead tr{border-bottom: unset !important;border-top: unset !important;}
	input.cta.total {
    float: left;
    background-color: #000000;
    color: #fff;
    padding: 2px 7px;
    border-radius: 5px;
    cursor: pointer;
}
</style>

<div class=" tour_summary_container ">
  <h3 id="tablist-1">Total Charges</h3>
   <?php  
   $currency_symbol = getCurrencySymbol($cart_experience[0]->currency);
   if (Auth::check() && Auth::user()->hasRole("Super Admin")){ ?>
	  <!-- <div role="tablist" aria-labelledby="tablist-1" class="manual">
	    <button id="tab-1" class="select-tab" data-id="1" type="button" role="tab" aria-selected="true" aria-controls="tabpanel-1">
	      <span class="focus">In Costs</span>
	    </button>
	    <button id="tab-2" class="select-tab" data-id="2" type="button" role="tab" aria-selected="false" aria-controls="tabpanel-2" tabindex="-1">
	      <span class="focus">Out Costs</span>
	    </button>
	   
	  </div> -->
  <div class="tabs_wrapper">
    <ul class="notestabs" style="margin-bottom: 15px;margin-top: 0px;">
        <li class="select-tab active " data-id="1" style="border-left: 0;">
           Total Charges
        </li>
       
       
    </ul>
    <br>
    
    <!--
     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addNotes">
  Add Note
</button> -->
   
</div>
<?php } ?>
  <div id="tabpanel-1" class="content-tab" role="tabpanel" aria-labelledby="tab-1">
    <?php $supplements = array("1" => 'Water view (Sea/Lake/River)','2'=>'View (Garden/Balcony)','3'=>'Executive/De Luxe/Superior Rooms','4'=>'Dbl/tw room for sole') ?>
<table class="table" >
		
	  <thead>
	    <tr>
	      <th scope="col"><b>Supplements </b></th>
	      <th scope="col"><b>Quality</b></th>
	      <th scope="col"><b>Unit Price</b></th>
	     <!--  <th scope="col"><b>VAT</b></th> -->
	      <th scope="col"><b>Total</b></th> 
	    </tr>
	  </thead>
	  <tbody class="tblBorderCls">
	  	<?php 
	  	$total_final_cost = 0;
	  	$total_final_cost1 = 0;
	  	$total_vat_cost = 0;
	  		if(!empty($cart_experience)){
	  			$experience_rate_dates = 


DB::connection('mysql_veenus')->table('experience_dates_rates')->where('id',$cart_experience[0]->dates_rates_id)->first();
	  			 $d_cnt = (!empty($cart_experience[0]->driver_name) && ($cart_experience[0]->driver_room_type == '2' || $cart_experience[0]->driver_room_type == '3'))?'1':'0';
				    		$s_cnt = ($cart_experience[0]->driver_room_type == '1')?'1':'0';
	  			$total_qty1 = !empty($rooms_ppl)?$rooms_ppl+$d_cnt:'0';
	  			if($cart_experience[0]->currency == 2)
          {
          	$price_qty1 = !empty($experience_rate_dates->rate_euro)?$experience_rate_dates->rate_euro:'0';
          }
          else
          {
          	$price_qty1 = !empty($experience_rate_dates->rate)?$experience_rate_dates->rate:'0';
          }
	  			
	  			$total_cost1 = $price_qty1*$total_qty1;
	  			
	  			$total_final_cost += $total_cost1;
	  			$vat = round(($total_cost1*20)/100,2);
	  			$total_vat_cost += $vat;
	  			?>
	  			<tr>
			      	<td scope="row"> {{!empty($cart_experience[0]->experience_name)?$cart_experience[0]->experience_name:''}} {{ date("D d M", strtotime($cart_experience[0]->date_from)) }} - {{ date("D d M 'y", strtotime($cart_experience[0]->date_to)) }}</td>
			      	<td scope="row">{{$total_qty1}}</td>
			      	<td scope="row">{{$currency_symbol}}{{$price_qty1}}</td>
			      	<!-- <td scope="row">{{!empty($vat)?$currency_symbol.$vat:''}}</td> -->
			      	<td scope="row">{{$currency_symbol}}{{$total_cost1}}</td>
			    </tr> 	
	  			<?php
	  		
	  	} 	
	  	if(isset($cart_experience[0]->dates_rates_id)){

		$experience_dates = 


DB::connection('mysql_veenus')->table('experience_dates')->where('dates_rates_id',$cart_experience[0]->dates_rates_id)->first();
		if(empty($experience_dates->hotel_date_id))
		{
			
			$hotel_dates = 


DB::connection('mysql_veenus')->table('hotel_dates')->where('date_in',$cart_experience[0]->date_from)->where('date_out',$cart_experience[0]->date_to)->first();
		}
		
		else
		{
			$hotel_dates = 


DB::connection('mysql_veenus')->table('hotel_dates')->where('id',$experience_dates->hotel_date_id)->first();
			
			
		}
		if(!empty($hotel_dates))
		{
			$HotelDatesID = $hotel_dates->id;
		}
		
	}
		
		$water_supplement[1] = array('name'=>'Water view (Sea/Lake/River)','qty'=>0);
		$view_supplement[1] = array('name'=>'View (Garden/Balcony)','qty'=>0);
		$executive_supplement[1] = array('name'=>'Executive/De Luxe/Superior Rooms ','qty'=>0);
		$dbl_supplement[1] = array('name'=>'Dbl/tw room for sole','qty'=>0);

		$water_supplement[2] = array('name'=>'Water view (Sea/Lake/River)','qty'=>0);
		$view_supplement[2] = array('name'=>'View (Garden/Balcony)','qty'=>0);
		$executive_supplement[2] = array('name'=>'Executive/De Luxe/Superior Rooms ','qty'=>0);
		$dbl_supplement[2] = array('name'=>'Dbl/tw room for sole','qty'=>0);

		$water_supplement[3] = array('name'=>'Water view (Sea/Lake/River)','qty'=>0);
		$view_supplement[3] = array('name'=>'View (Garden/Balcony)','qty'=>0);
		$executive_supplement[3] = array('name'=>'Executive/De Luxe/Superior Rooms ','qty'=>0);
		$dbl_supplement[3] = array('name'=>'Dbl/tw room for sole','qty'=>0);

		$water_supplement[4] = array('name'=>'Water view (Sea/Lake/River)','qty'=>0);
		$view_supplement[4] = array('name'=>'View (Garden/Balcony)','qty'=>0);
		$executive_supplement[4] = array('name'=>'Executive/De Luxe/Superior Rooms ','qty'=>0);
		$dbl_supplement[4] = array('name'=>'Dbl/tw room for sole','qty'=>0);

		$water_supplement[5] = array('name'=>'Water view (Sea/Lake/River)','qty'=>0);
		$view_supplement[5] = array('name'=>'View (Garden/Balcony)','qty'=>0);
		$executive_supplement[5] = array('name'=>'Executive/De Luxe/Superior Rooms ','qty'=>0);
		$dbl_supplement[5] = array('name'=>'Dbl/tw room for sole','qty'=>0);
		$room_array = array('1'=>'Single','2'=>'Double','3'=>'Twin','4'=>'Triple','5'=>'Quard');
	  	if(!empty($roomsSupplementsRequest)){
	  		
	  		foreach($roomsSupplementsRequest as $row)
	  		{
				
	  			$room_id = $row['room_id'];
	  			 $hotel_dates_supplements = 


DB::connection('mysql_veenus')->table('hotel_dates_supplements')->where('hotel_dates_id', $hotel_dates->id)->where('supplements', $row['supplements'])->first();
		  			 $price_type = '';
		  			 if(!empty($hotel_dates_supplements))
		  			 {
		  			 	
                        $price_type = !empty($hotel_dates_supplements->price_type)?$hotel_dates_supplements->price_type:'pppn';
		  			 }
	  			$total_qty = !empty($row['total_qty'])?$row['total_qty']:'0';
	  			if($room_id == 1)
	  			{
	  				
	  				if($row['supplements'] == 1)
	  				{
	  					$water_supplement[1]['qty'] = $water_supplement[1]['qty'] + $total_qty;
	  				}
	  				else if($row['supplements'] == 2)
	  				{
	  					$view_supplement[1]['qty'] = $view_supplement[1]['qty'] + $total_qty;
	  				}
	  				else if($row['supplements'] == 3)
	  				{
	  					$executive_supplement[1]['qty'] = $executive_supplement[1]['qty'] + $total_qty;
	  				}
	  				else if($row['supplements'] == 4)
	  				{
	  					$dbl_supplement[1]['qty'] = $dbl_supplement[1]['qty'] + $total_qty;
	  				}
	  				
	  			}		
	  			else if($room_id == '2')
	  			{
	  				if($price_type == 'pppn')
	  				{
	  					$total_qty = $total_qty *2;
	  				}
	  				else
	  				{
	  					$total_qty = 1;
	  				}
	  				if($row['supplements'] == 1)
	  				{
	  					$water_supplement[2]['qty'] = $water_supplement[2]['qty'] + $total_qty;
	  				}
	  				else if($row['supplements'] == 2)
	  				{
	  					$view_supplement[2]['qty'] = $view_supplement[2]['qty'] + $total_qty;
	  				}
	  				else if($row['supplements'] == 3)
	  				{
	  					$executive_supplement[2]['qty'] = $executive_supplement[2]['qty'] + $total_qty;
	  				}
	  				else if($row['supplements'] == 4)
	  				{
	  					$dbl_supplement[2]['qty'] = $dbl_supplement[2]['qty'] + $total_qty;
	  				}
	  				
	  			}
	  			else if($room_id == '3')
	  			{
	  				if($price_type == 'pppn')
	  				{
	  					$total_qty = $total_qty *2;
	  				}
	  				else
	  				{
	  					$total_qty = 1;
	  				}
	  				if($row['supplements'] == 1)
	  				{
	  					$water_supplement[3]['qty'] = $water_supplement[3]['qty'] + $total_qty;
	  				}
	  				else if($row['supplements'] == 2)
	  				{
	  					$view_supplement[3]['qty'] = $view_supplement[3]['qty'] + $total_qty;
	  				}
	  				else if($row['supplements'] == 3)
	  				{
	  					$executive_supplement[3]['qty'] = $executive_supplement[3]['qty'] + $total_qty;
	  				}
	  				else if($row['supplements'] == 4)
	  				{
	  					$dbl_supplement[3]['qty'] = $dbl_supplement[3]['qty'] + $total_qty;
	  				}
	  			}
	  			else if($room_id == '4')
	  			{
	  				if($price_type == 'pppn')
	  				{
	  					$total_qty = $total_qty *3;
	  				}
	  				else
	  				{
	  					$total_qty = 1;
	  				}
	  				if($row['supplements'] == 1)
	  				{
	  					$water_supplement[4]['qty'] = $water_supplement[4]['qty'] + $total_qty;
	  				}
	  				else if($row['supplements'] == 2)
	  				{
	  					$view_supplement[4]['qty'] = $view_supplement[4]['qty'] + $total_qty;
	  				}
	  				else if($row['supplements'] == 3)
	  				{
	  					$executive_supplement[4]['qty'] = $executive_supplement[4]['qty'] + $total_qty;
	  				}
	  				else if($row['supplements'] == 4)
	  				{
	  					$dbl_supplement[4]['qty'] = $dbl_supplement[1]['qty'] + $total_qty;
	  				}
	  			}
	  			else if($room_id == '5')
	  			{
	  				if($price_type == 'pppn')
	  				{
	  					$total_qty = $total_qty *4;
	  				}
	  				else
	  				{
	  					$total_qty = 1;
	  				}
	  				if($row['supplements'] == 1)
	  				{
	  					$water_supplement[5]['qty'] = $water_supplement[5]['qty'] + $total_qty;
	  				}
	  				else if($row['supplements'] == 2)
	  				{
	  					$view_supplement[5]['qty'] = $view_supplement[5]['qty'] + $total_qty;
	  				}
	  				else if($row['supplements'] == 3)
	  				{
	  					$executive_supplement[5]['qty'] = $executive_supplement[5]['qty'] + $total_qty;
	  				}
	  				else if($row['supplements'] == 4)
	  				{
	  					$dbl_supplement[5]['qty'] = $dbl_supplement[5]['qty'] + $total_qty;
	  				}
	  			}

	  			//$price_qty = !empty($row['price'])?$row['price']:'0';
	  			
	  			
	  			?>
	  			
	  			<?php
	  		}
	  	} 
	  	

	if(empty($HotelDatesID)){
		$hotel_dates = 


DB::connection('mysql_veenus')->table('hotel_dates')->where('date_in',$cart_experience[0]->date_from)->where('date_out',$cart_experience[0]->date_to)->where('deleted_at',null)->first();
		if(!empty($hotel_dates)){
			$HotelDatesID = $hotel_dates->id;
		}
	}
	  	if(!empty($cartExperiencesToRoomsRequest)){
	  			foreach ($cartExperiencesToRoomsRequest as $key => $value) {
	  				$room_id = $value->room_id;
	  				foreach ($value->cartExperiencesToRoomsRequests as $keyCRR => $valueCRR) {
	  					//pr($valueCRR);
	  					if($valueCRR['upgrade_request_sup_status'] == 'accepted'){
							  			 $hotel_dates_supplements = 


DB::connection('mysql_veenus')->table('hotel_dates_supplements')->where('hotel_dates_id', $hotel_dates->id)->where('supplements', $valueCRR['room_requests_id'])->first();
							  			 $price_type = '';
							  			 if(!empty($hotel_dates_supplements))
							  			 {
							  			 	
                                                    $price_type = !empty($hotel_dates_supplements->price_type)?$hotel_dates_supplements->price_type:'pppn';
							  			 }
							  			
									if($room_id == 1)
						  			{
						  				$total_qty = '1';
						  				if($valueCRR['room_requests_id'] == 1)
						  				{
						  					$water_supplement[1]['qty'] = $water_supplement[1]['qty'] + $total_qty;
						  				}
						  				else if($valueCRR['room_requests_id'] == 2)
						  				{
						  					$view_supplement[1]['qty'] = $view_supplement[1]['qty'] + $total_qty;
						  				}
						  				else if($valueCRR['room_requests_id'] == 3)
						  				{
						  					$executive_supplement[1]['qty'] = $executive_supplement[1]['qty'] + $total_qty;
						  				}
						  				else if($valueCRR['room_requests_id'] == 4)
						  				{
						  					$dbl_supplement[1]['qty'] = $dbl_supplement[1]['qty'] + $total_qty;
						  				}
						  				
						  			}		
						  			else if($room_id == '2')
						  			{

						  				if($price_type == 'pppn')
						  				{
						  					$total_qty = $total_qty *2;
						  				}
						  				else
						  				{
						  					$total_qty = 1;
						  				}
						  				if($valueCRR['room_requests_id'] == 1)
						  				{
						  					$water_supplement[2]['qty'] = $water_supplement[2]['qty'] + $total_qty;
						  				}
						  				else if($valueCRR['room_requests_id'] == 2)
						  				{
						  					$view_supplement[2]['qty'] = $view_supplement[2]['qty'] + $total_qty;
						  				}
						  				else if($valueCRR['room_requests_id'] == 3)
						  				{
						  					$executive_supplement[2]['qty'] = $executive_supplement[2]['qty'] + $total_qty;
						  				}
						  				else if($valueCRR['room_requests_id'] == 4)
						  				{
						  					$dbl_supplement[2]['qty'] = $dbl_supplement[2]['qty'] + $total_qty;
						  				}
						  				
						  			}
						  			else if($room_id == '3')
						  			{
						  				if($price_type == 'pppn')
						  				{
						  					$total_qty = $total_qty *2;
						  				}
						  				else
						  				{
						  					$total_qty = 1;
						  				}
						  				if($valueCRR['room_requests_id'] == 1)
						  				{
						  					$water_supplement[3]['qty'] = $water_supplement[3]['qty'] + $total_qty;
						  				}
						  				else if($valueCRR['room_requests_id'] == 2)
						  				{
						  					$view_supplement[3]['qty'] = $view_supplement[3]['qty'] + $total_qty;
						  				}
						  				else if($valueCRR['room_requests_id'] == 3)
						  				{
						  					$executive_supplement[3]['qty'] = $executive_supplement[3]['qty'] + $total_qty;
						  				}
						  				else if($valueCRR['room_requests_id'] == 4)
						  				{
						  					$dbl_supplement[3]['qty'] = $dbl_supplement[3]['qty'] + $total_qty;
						  				}
						  			}
						  			else if($room_id == '4')
						  			{
						  				if($price_type == 'pppn')
						  				{
						  					$total_qty = $total_qty *3;
						  				}
						  				else
						  				{
						  					$total_qty = 1;
						  				}
						  				if($valueCRR['room_requests_id'] == 1)
						  				{
						  					$water_supplement[4]['qty'] = $water_supplement[4]['qty'] + $total_qty;
						  				}
						  				else if($valueCRR['room_requests_id'] == 2)
						  				{
						  					$view_supplement[4]['qty'] = $view_supplement[4]['qty'] + $total_qty;
						  				}
						  				else if($valueCRR['room_requests_id'] == 3)
						  				{
						  					$executive_supplement[4]['qty'] = $executive_supplement[4]['qty'] + $total_qty;
						  				}
						  				else if($valueCRR['room_requests_id'] == 4)
						  				{
						  					$dbl_supplement[4]['qty'] = $dbl_supplement[1]['qty'] + $total_qty;
						  				}
						  			}
						  			else if($room_id == '5')
						  			{
						  				if($price_type == 'pppn')
						  				{
						  					$total_qty = $total_qty *4;
						  				}
						  				else
						  				{
						  					$total_qty = 1;
						  				}
						  				if($valueCRR['room_requests_id'] == 1)
						  				{
						  					$water_supplement[5]['qty'] = $water_supplement[5]['qty'] + $total_qty;
						  				}
						  				else if($valueCRR['room_requests_id'] == 2)
						  				{
						  					$view_supplement[5]['qty'] = $view_supplement[5]['qty'] + $total_qty;
						  				}
						  				else if($valueCRR['room_requests_id'] == 3)
						  				{
						  					$executive_supplement[5]['qty'] = $executive_supplement[5]['qty'] + $total_qty;
						  				}
						  				else if($valueCRR['room_requests_id'] == 4)
						  				{
						  					$dbl_supplement[5]['qty'] = $dbl_supplement[5]['qty'] + $total_qty;
						  				}
						  			}

						  			if($valueCRR['room_requests_id'] == 5)
						  			{
						  				$total_qty_up = 1;
							  			if($room_id == 1)
							  			{
							  				$total_qty_up = 1;
							  			}
							  			else if($room_id == 2)
							  			{
							  				if($valueCRR['upgrade_cost_type'] == 'pppn')
							  				{
							  					$total_qty_up = 2;
							  				}
							  			}
							  			else if($room_id == 3)
							  			{
							  				if($valueCRR['upgrade_cost_type'] == 'pppn')
							  				{
							  					$total_qty_up = 2;
							  				}
							  			}
							  			else if($room_id == 4)
							  			{
							  				if($valueCRR['upgrade_cost_type'] == 'pppn')
							  				{
							  					$total_qty_up = 3;
							  				}
							  			}
							  			else if($room_id == 5)
							  			{
							  				if($valueCRR['upgrade_cost_type'] == 'pppn')
							  				{
							  					$total_qty_up = 4;
							  				}
							  			}
							  			$price_qty_up = !empty($valueCRR['upgrade_cost_out'])?$valueCRR['upgrade_cost_out']:'0';
							  			$total_cost_up = $price_qty_up*$total_qty_up;
							  			$total_final_cost += $total_cost_up;
							  			$vat = round(($total_cost_up*20)/100,2);
	  									$total_vat_cost += $vat;
							  			?>
							  			<tr>
									      	<td scope="row"> {{!empty($valueCRR['upgrade_name'])?$valueCRR['upgrade_name']:''}}- {{$room_array[$room_id]}} - {{$valueCRR['upgrade_cost_type']}}</td>
									      	<td scope="row">{{$total_qty}}</td>
									      	<td scope="row">{{$currency_symbol}}{{$price_qty_up}}</td>
									      	<!-- <td scope="row">{{!empty($vat)?$currency_symbol.$vat:''}}</td> -->
									      	<td scope="row">{{$currency_symbol}}{{$total_cost_up}}</td>
									    </tr> 
									    <?php
						  			}
	  			?>
	  			
	  			<?php
	  				}
	  			}
	  		}
	  	} ?>

	  	<?php
	  	foreach($room_array as $room_id =>$room_name)
	  	{
	  		if(!empty($water_supplement[$room_id]['qty']))
	  		{
	  			$total_qty = $water_supplement[$room_id]['qty'];
	  			$hotel_dates_supplements = 


DB::connection('mysql_veenus')->table('hotel_dates_supplements')->where('hotel_dates_id', $hotel_dates->id)->where('supplements', '4')->first();
		  		if($cart_experience[0]->currency == 2)
          {
              $price_qty = !empty($hotel_dates_supplements->price_euro_out)?$hotel_dates_supplements->price_euro_out:'0';
          }
          else
          {
              $price_qty = !empty($hotel_dates_supplements->price_out)?$hotel_dates_supplements->price_out:'0';
          }
	  			$price_type = !empty($hotel_dates_supplements->price_type)?$hotel_dates_supplements->price_type:'pppn';
	  			$total_cost = $price_qty*$total_qty;
	  			$total_final_cost += $total_cost;
	  			$vat = round(($total_cost*20)/100,2);
	  			$total_vat_cost += $vat;
	  			?>
	  			<tr>
			      	<td scope="row"> {{!empty($water_supplement[$room_id]['name'])?$water_supplement[$room_id]['name']:''}} - {{$room_array[$room_id]}} ({{$price_type}})</td>
			      	<td scope="row">{{$total_qty}}</td>
			      	<td scope="row">{{$currency_symbol}}{{$price_qty}}</td>
			      	<!-- <td scope="row">{{!empty($vat)?$currency_symbol.$vat:''}}</td> -->
			      	<td scope="row">{{$currency_symbol}}{{$total_cost}} </td>
			    </tr> 	
	  			<?php
	  		}
	  		if(!empty($view_supplement[$room_id]['qty']))
	  		{
	  			$total_qty = $view_supplement[$room_id]['qty'];
	  			$hotel_dates_supplements = 


DB::connection('mysql_veenus')->table('hotel_dates_supplements')->where('hotel_dates_id', $hotel_dates->id)->where('supplements', '4')->first();
		  		if($cart_experience[0]->currency == 2)
          {
              $price_qty = !empty($hotel_dates_supplements->price_euro_out)?$hotel_dates_supplements->price_euro_out:'0';
          }
          else
          {
              $price_qty = !empty($hotel_dates_supplements->price_out)?$hotel_dates_supplements->price_out:'0';
          }
	  			$price_type = !empty($hotel_dates_supplements->price_type)?$hotel_dates_supplements->price_type:'pppn';
	  			$total_cost = $price_qty*$total_qty;
	  			$total_final_cost += $total_cost;
	  			$vat = round(($total_cost*20)/100,2);
	  			$total_vat_cost += $vat;
	  			?>
	  			<tr>
			      	<td scope="row"> {{!empty($view_supplement[$room_id]['name'])?$view_supplement[$room_id]['name']:''}} - {{$room_array[$room_id]}} ({{$price_type}})</td>
			      	<td scope="row">{{$total_qty}}</td>
			      	<td scope="row">{{$currency_symbol}}{{$price_qty}}</td>
			      	<!-- <td scope="row">{{!empty($vat)?$currency_symbol.$vat:''}}</td> -->
			      	<td scope="row">{{$currency_symbol}}{{$total_cost}} </td>
			    </tr> 	
	  			<?php
	  		}
	  		if(!empty($executive_supplement[$room_id]['qty']))
	  		{
	  			$total_qty = $executive_supplement[$room_id]['qty'];
	  			$hotel_dates_supplements = 


DB::connection('mysql_veenus')->table('hotel_dates_supplements')->where('hotel_dates_id', $hotel_dates->id)->where('supplements', '4')->first();
		  		if($cart_experience[0]->currency == 2)
          {
              $price_qty = !empty($hotel_dates_supplements->price_euro_out)?$hotel_dates_supplements->price_euro_out:'0';
          }
          else
          {
              $price_qty = !empty($hotel_dates_supplements->price_out)?$hotel_dates_supplements->price_out:'0';
          }
	  			$price_type = !empty($hotel_dates_supplements->price_type)?$hotel_dates_supplements->price_type:'pppn';
	  			$total_cost = $price_qty*$total_qty;
	  			$total_final_cost += $total_cost;
	  			$vat = round(($total_cost*20)/100,2);
	  			$total_vat_cost += $vat;
	  			?>
	  			<tr>
			      	<td scope="row"> {{!empty($executive_supplement[$room_id]['name'])?$executive_supplement[$room_id]['name']:''}} - {{$room_array[$room_id]}} ({{$price_type}})</td>
			      	<td scope="row">{{$total_qty}}</td>
			      	<td scope="row">{{$currency_symbol}}{{$price_qty}}</td>
			      	<!-- <td scope="row">{{!empty($vat)?$currency_symbol.$vat:''}}</td> -->
			      	<td scope="row">{{$currency_symbol}}{{$total_cost}} </td>
			    </tr> 	
	  			<?php
	  		}
	  		if(!empty($dbl_supplement[$room_id]['qty']))
	  		{
	  			$total_qty = $dbl_supplement[$room_id]['qty'];
	  			$hotel_dates_supplements = 


DB::connection('mysql_veenus')->table('hotel_dates_supplements')->where('hotel_dates_id', $hotel_dates->id)->where('supplements', '4')->first();
		  		if($cart_experience[0]->currency == 2)
          {
              $price_qty = !empty($hotel_dates_supplements->price_euro_out)?$hotel_dates_supplements->price_euro_out:'0';
          }
          else
          {
              $price_qty = !empty($hotel_dates_supplements->price_out)?$hotel_dates_supplements->price_out:'0';
          }
	  			$price_type = !empty($hotel_dates_supplements->price_type)?$hotel_dates_supplements->price_type:'pppn';
	  			$total_cost = $price_qty*$total_qty;
	  			$total_final_cost += $total_cost;
	  			$vat = round(($total_cost*20)/100,2);
	  			$total_vat_cost += $vat;
	  			?>
	  			<tr>
			      	<td scope="row"> {{!empty($dbl_supplement[$room_id]['name'])?$dbl_supplement[$room_id]['name']:''}} - {{$room_array[$room_id]}} ({{$price_type}})</td>
			      	<td scope="row">{{$total_qty}}</td>
			      	<td scope="row">{{$currency_symbol}}{{$price_qty}}</td>
			      	<!-- <td scope="row">{{!empty($vat)?$currency_symbol.$vat:''}}</td> -->
			      	<td scope="row">{{$currency_symbol}}{{$total_cost}} </td>
			    </tr> 	
	  			<?php
	  		}
	  	}
	  		
	  	?>
	  	<?php 


	  	?>
	  	

	  	<?php if(!empty($otheroomsSupplementsRequest)){
	  		foreach($otheroomsSupplementsRequest as $row)
	  		{

	  			$room_id = $row['room_id'];
	  			$total_qty = 1;
	  			if($room_id == 1)
	  			{
	  				$total_qty = 1;
	  			}
	  			else if($room_id == 2)
	  			{
	  				if($row['upgrade_cost_type'] == 'pppn')
	  				{
	  					$total_qty = 2;
	  				}
	  			}
	  			else if($room_id == 3)
	  			{
	  				if($row['upgrade_cost_type'] == 'pppn')
	  				{
	  					$total_qty = 2;
	  				}
	  			}
	  			else if($room_id == 4)
	  			{
	  				if($row['upgrade_cost_type'] == 'pppn')
	  				{
	  					$total_qty = 3;
	  				}
	  			}
	  			else if($room_id == 5)
	  			{
	  				if($row['upgrade_cost_type'] == 'pppn')
	  				{
	  					$total_qty = 4;
	  				}
	  			}
	  			$price_qty = !empty($row['upgrade_cost_out'])?$row['upgrade_cost_out']:'0';
	  			$total_cost = $price_qty*$total_qty;
	  			$total_final_cost += $total_cost;
	  			$vat = round(($total_cost*20)/100,2);
	  			$total_vat_cost += $vat;
	  			?>
	  			<tr>
			      	<td scope="row"> {{!empty($row['upgrade_name'])?$row['upgrade_name']:''}}- {{$room_array[$room_id]}} - {{$row['upgrade_cost_type']}}</td>
			      	<td scope="row">{{$total_qty}}</td>
			      	<td scope="row">{{$currency_symbol}}{{$price_qty}}</td>
			      	<!-- <td scope="row">{{!empty($vat)?$currency_symbol.$vat:''}}</td> -->
			      	<td scope="row">{{$currency_symbol}}{{$total_cost}}</td>
			    </tr> 	
	  			<?php
	  		}
	  	} ?>	
	  	
	  	<?php if(!empty($cart_experience[0]->driver_name)){
	  		
	  			$total_qty2 = 1;
	  			$price_qty2 = !empty($cart_experience[0]->driver_cost)?$cart_experience[0]->driver_cost:'0';
	  			$total_cost2 = $price_qty2*$total_qty2;
	  			//$total_final_cost += $total_cost2;
	  			$vat = round(($total_cost2*20)/100,2);
	  			$total_vat_cost += $vat;
	  			?>
	  			<tr>
			      	<td scope="row">Driver 1- {{!empty($cart_experience[0]->driver_name)?$cart_experience[0]->driver_name:''}}</td>
			      	<td scope="row">{{$total_qty2}}</td>
			      	<td scope="row">{{$currency_symbol}}{{$price_qty2}}</td>
			      	<!-- <td scope="row">{{!empty($vat)?$currency_symbol.$vat:''}}</td> -->
			      	<td scope="row">{{$currency_symbol}}{{$total_cost2}}</td>
			    </tr> 	
	  			<?php
	  		
	  	} ?>	
	  		<?php if(!empty($cart_experience[0]->courier_name)){
	  		
	  			$total_qty3 = 1;
	  			$price_qty3 = !empty($cart_experience[0]->driver_cost1)?$cart_experience[0]->driver_cost1:'0';
	  			$total_cost3 = $price_qty3*$total_qty3;
	  			//$total_final_cost += $total_cost3;
	  			$vat = round(($total_cost3*20)/100,2);
	  			$total_vat_cost += $vat;
	  			?>
	  			<tr>
			      	<td scope="row">Driver 2- {{!empty($cart_experience[0]->courier_name)?$cart_experience[0]->courier_name:''}}</td>
			      	<td scope="row">{{$total_qty3}}</td>
			      	<td scope="row">{{$currency_symbol}}{{$price_qty3}}</td>
			      	<!-- <td scope="row">{{!empty($vat)?$currency_symbol.$vat:''}}</td> -->
			      	<td scope="row">{{$currency_symbol}}{{$total_cost3}}</td>
			    </tr>
	  			<?php
	  		
	  	} 
	  	if(!empty($rooms_deposit)){
	  			
	  			$total_qty4 = !empty($rooms_deposit)?$rooms_deposit+$d_cnt:'0';
	  			$price_qty4 = !empty($experience_rate_dates->deposit)?$experience_rate_dates->deposit:'0';
	  			$total_cost4 = $price_qty4*$total_qty4;
	  			//$total_final_cost += $total_cost4;
	  			?>
	  			<!-- <tr>
			      	<td scope="row"> Deposit</td>
			      	<td scope="row">{{$total_qty4}}</td>
			      	<td scope="row">(£{{$price_qty4}})</td>
			      	<td scope="row">(£{{$total_cost4}})</td>
			    </tr> 	 -->
	  			<?php
	  		
	  	} ?>	
	  	<?php if(!empty($roomsSupplementsRequest) || !empty($otheroomsSupplementsRequest)){ ?>
	  		<tr>
	  		<td colspan="2" style="text-align:right;">&nbsp;</td>
	      	<td style="text-align:right;border-bottom: 2px solid #000000;">&nbsp;</td>
	      	<td scope="row" style="border-bottom: 2px solid #000000;">&nbsp;</td>
	    </tr> 
	  		<tr>
			      	<td colspan="3" style="text-align:right;border-top:unset;"><b>Tour Total:</b></td>
			      	<!-- <td style="border-top:unset;border-top: 2px solid #000000;color: #000000"  scope="row"><b>{{$currency_symbol}}{{$total_vat_cost}}</b></td> -->
			      	<td style="border-top:unset;border-top: 2px solid #000000;color: #000000"  scope="row"><b>{{$currency_symbol}}{{$total_final_cost}}</b></td>
			      
			    </tr> 	
	  		<?php
	  		
	  	} ?>	

	  	<?php if(empty($roomsSupplementsRequest) && empty($otheroomsSupplementsRequest)){ ?>
	  		<!-- <tr>
			      	<td colspan="4" ><b>No charges for tour</b></td>
			      
			    </tr> 	 -->
	  		<?php
	  		
	  	} ?>	
	  </tbody>
</table>
@if(empty($cart_experience[0]->invoice_sent_finance))
<!-- <table class="table " >
									<tbody>
										 
									    <tr>
									    	<td > &nbsp;</td>
									    	<td style="float:right;"> <input type="button" value="Send Invoice for approval" class="btn btn-primary btn-sm" id="sendInvoice" data-id="{{!empty($cart_experience[0]->id)?$cart_experience[0]->id:''}}"  style="background-color: red mportant;"></td>
									    </tr>
									</tbody>
								</table> -->
@endif
<input type="button" value="Back" onclick="javascript: parent.jQuery.fancybox.close();" style="float:left;" class="cta total">
  </div>
  <div id="tabpanel-2" class="content-tab" role="tabpanel" aria-labelledby="tab-2" class="is-hidden" style="display:none;">
   <?php $supplements = array("1" => 'Water view (Sea/Lake/River)','2'=>'View (Garden/Balcony)','3'=>'Executive/De Luxe/Superior Rooms','4'=>'Dbl/tw room for sole') ?>
<table class="table" >
		
	  <thead>
	    <tr>
	      <th scope="col"><b>Supplements </b></th>
	      <th scope="col"><b>Quality</b></th>
	      <th scope="col"><b>Unit Price</b></th>
	      <th scope="col"><b>Total</b></th> 
	    </tr>
	  </thead>
	  <tbody class="tblBorderCls">
	  	<?php 
	  	$total_final_cost = 0;
	  	$total_final_cost1 = 0;
	  		if(!empty($cart_experience)){
	  			$experience_rate_dates = 


DB::connection('mysql_veenus')->table('experience_dates_rates')->where('id',$cart_experience[0]->dates_rates_id)->first();
	  			 $d_cnt = (!empty($cart_experience[0]->driver_name) && ($cart_experience[0]->driver_room_type == '2' || $cart_experience[0]->driver_room_type == '3'))?'1':'0';
				    		$s_cnt = ($cart_experience[0]->driver_room_type == '1')?'1':'0';
	  			$total_qty1 = !empty($rooms_ppl)?$rooms_ppl+$d_cnt:'0';
	  			$price_qty1 = !empty($experience_rate_dates->rate)?$experience_rate_dates->rate:'0';
	  			$total_cost1 = $price_qty1*$total_qty1;
	  			//$total_final_cost += $total_cost1;
	  			?>
	  		<!-- 	<tr>
			      	<td scope="row"> {{!empty($cart_experience[0]->experience_name)?$cart_experience[0]->experience_name:''}} {{ date("D d M", strtotime($cart_experience[0]->date_from)) }} - {{ date("D d M 'y", strtotime($cart_experience[0]->date_to)) }}</td>
			      	<td scope="row">{{$total_qty1}}</td>
			      	<td scope="row">{{$currency_symbol}}{{$price_qty1}}</td>
			      	<td scope="row">{{$currency_symbol}}{{$total_cost1}}</td>
			    </tr> 	 -->
	  			<?php
	  		
	  	} 	
	  	if(isset($cart_experience[0]->dates_rates_id)){

		$experience_dates = 


DB::connection('mysql_veenus')->table('experience_dates')->where('dates_rates_id',$cart_experience[0]->dates_rates_id)->first();
		if(empty($experience_dates->hotel_date_id))
		{
			
			$hotel_dates = 


DB::connection('mysql_veenus')->table('hotel_dates')->where('date_in',$cart_experience[0]->date_from)->where('date_out',$cart_experience[0]->date_to)->first();
		}
		
		else
		{
			$hotel_dates = 


DB::connection('mysql_veenus')->table('hotel_dates')->where('id',$experience_dates->hotel_date_id)->first();
			
			
		}
		if(!empty($hotel_dates))
		{
			$HotelDatesID = $hotel_dates->id;
		}
		
	}
		
		$water_supplement[1] = array('name'=>'Water view (Sea/Lake/River)','qty'=>0);
		$view_supplement[1] = array('name'=>'View (Garden/Balcony)','qty'=>0);
		$executive_supplement[1] = array('name'=>'Executive/De Luxe/Superior Rooms ','qty'=>0);
		$dbl_supplement[1] = array('name'=>'Dbl/tw room for sole','qty'=>0);

		$water_supplement[2] = array('name'=>'Water view (Sea/Lake/River)','qty'=>0);
		$view_supplement[2] = array('name'=>'View (Garden/Balcony)','qty'=>0);
		$executive_supplement[2] = array('name'=>'Executive/De Luxe/Superior Rooms ','qty'=>0);
		$dbl_supplement[2] = array('name'=>'Dbl/tw room for sole','qty'=>0);

		$water_supplement[3] = array('name'=>'Water view (Sea/Lake/River)','qty'=>0);
		$view_supplement[3] = array('name'=>'View (Garden/Balcony)','qty'=>0);
		$executive_supplement[3] = array('name'=>'Executive/De Luxe/Superior Rooms ','qty'=>0);
		$dbl_supplement[3] = array('name'=>'Dbl/tw room for sole','qty'=>0);

		$water_supplement[4] = array('name'=>'Water view (Sea/Lake/River)','qty'=>0);
		$view_supplement[4] = array('name'=>'View (Garden/Balcony)','qty'=>0);
		$executive_supplement[4] = array('name'=>'Executive/De Luxe/Superior Rooms ','qty'=>0);
		$dbl_supplement[4] = array('name'=>'Dbl/tw room for sole','qty'=>0);

		$water_supplement[5] = array('name'=>'Water view (Sea/Lake/River)','qty'=>0);
		$view_supplement[5] = array('name'=>'View (Garden/Balcony)','qty'=>0);
		$executive_supplement[5] = array('name'=>'Executive/De Luxe/Superior Rooms ','qty'=>0);
		$dbl_supplement[5] = array('name'=>'Dbl/tw room for sole','qty'=>0);
		$room_array = array('1'=>'Single','2'=>'Double','3'=>'Twin','4'=>'Triple','5'=>'Quard');
	  	if(!empty($roomsSupplementsRequest)){
	  		
	  		foreach($roomsSupplementsRequest as $row)
	  		{
				
	  			$room_id = $row['room_id'];
	  			 $hotel_dates_supplements = 


DB::connection('mysql_veenus')->table('hotel_dates_supplements')->where('hotel_dates_id', $hotel_dates->id)->where('supplements', $row['supplements'])->first();
		  			 $price_type = '';
		  			 if(!empty($hotel_dates_supplements))
		  			 {
		  			 	
                        $price_type = !empty($hotel_dates_supplements->price_type)?$hotel_dates_supplements->price_type:'pppn';
		  			 }
	  			$total_qty = !empty($row['total_qty'])?$row['total_qty']:'0';
	  			if($room_id == 1)
	  			{
	  				
	  				if($row['supplements'] == 1)
	  				{
	  					$water_supplement[1]['qty'] = $water_supplement[1]['qty'] + $total_qty;
	  				}
	  				else if($row['supplements'] == 2)
	  				{
	  					$view_supplement[1]['qty'] = $view_supplement[1]['qty'] + $total_qty;
	  				}
	  				else if($row['supplements'] == 3)
	  				{
	  					$executive_supplement[1]['qty'] = $executive_supplement[1]['qty'] + $total_qty;
	  				}
	  				else if($row['supplements'] == 4)
	  				{
	  					$dbl_supplement[1]['qty'] = $dbl_supplement[1]['qty'] + $total_qty;
	  				}
	  				
	  			}		
	  			else if($room_id == '2')
	  			{
	  				if($price_type == 'pppn')
	  				{
	  					$total_qty = $total_qty *2;
	  				}
	  				else
	  				{
	  					$total_qty = 1;
	  				}
	  				if($row['supplements'] == 1)
	  				{
	  					$water_supplement[2]['qty'] = $water_supplement[2]['qty'] + $total_qty;
	  				}
	  				else if($row['supplements'] == 2)
	  				{
	  					$view_supplement[2]['qty'] = $view_supplement[2]['qty'] + $total_qty;
	  				}
	  				else if($row['supplements'] == 3)
	  				{
	  					$executive_supplement[2]['qty'] = $executive_supplement[2]['qty'] + $total_qty;
	  				}
	  				else if($row['supplements'] == 4)
	  				{
	  					$dbl_supplement[2]['qty'] = $dbl_supplement[2]['qty'] + $total_qty;
	  				}
	  				
	  			}
	  			else if($room_id == '3')
	  			{
	  				if($price_type == 'pppn')
	  				{
	  					$total_qty = $total_qty *2;
	  				}
	  				else
	  				{
	  					$total_qty = 1;
	  				}
	  				if($row['supplements'] == 1)
	  				{
	  					$water_supplement[3]['qty'] = $water_supplement[3]['qty'] + $total_qty;
	  				}
	  				else if($row['supplements'] == 2)
	  				{
	  					$view_supplement[3]['qty'] = $view_supplement[3]['qty'] + $total_qty;
	  				}
	  				else if($row['supplements'] == 3)
	  				{
	  					$executive_supplement[3]['qty'] = $executive_supplement[3]['qty'] + $total_qty;
	  				}
	  				else if($row['supplements'] == 4)
	  				{
	  					$dbl_supplement[3]['qty'] = $dbl_supplement[3]['qty'] + $total_qty;
	  				}
	  			}
	  			else if($room_id == '4')
	  			{
	  				if($price_type == 'pppn')
	  				{
	  					$total_qty = $total_qty *3;
	  				}
	  				else
	  				{
	  					$total_qty = 1;
	  				}
	  				if($row['supplements'] == 1)
	  				{
	  					$water_supplement[4]['qty'] = $water_supplement[4]['qty'] + $total_qty;
	  				}
	  				else if($row['supplements'] == 2)
	  				{
	  					$view_supplement[4]['qty'] = $view_supplement[4]['qty'] + $total_qty;
	  				}
	  				else if($row['supplements'] == 3)
	  				{
	  					$executive_supplement[4]['qty'] = $executive_supplement[4]['qty'] + $total_qty;
	  				}
	  				else if($row['supplements'] == 4)
	  				{
	  					$dbl_supplement[4]['qty'] = $dbl_supplement[1]['qty'] + $total_qty;
	  				}
	  			}
	  			else if($room_id == '5')
	  			{
	  				if($price_type == 'pppn')
	  				{
	  					$total_qty = $total_qty *4;
	  				}
	  				else
	  				{
	  					$total_qty = 1;
	  				}
	  				if($row['supplements'] == 1)
	  				{
	  					$water_supplement[5]['qty'] = $water_supplement[5]['qty'] + $total_qty;
	  				}
	  				else if($row['supplements'] == 2)
	  				{
	  					$view_supplement[5]['qty'] = $view_supplement[5]['qty'] + $total_qty;
	  				}
	  				else if($row['supplements'] == 3)
	  				{
	  					$executive_supplement[5]['qty'] = $executive_supplement[5]['qty'] + $total_qty;
	  				}
	  				else if($row['supplements'] == 4)
	  				{
	  					$dbl_supplement[5]['qty'] = $dbl_supplement[5]['qty'] + $total_qty;
	  				}
	  			}

	  			//$price_qty = !empty($row['price'])?$row['price']:'0';
	  			
	  			
	  			?>
	  			
	  			<?php
	  		}
	  	} 
	  	

	if(empty($HotelDatesID)){
		$hotel_dates = 


DB::connection('mysql_veenus')->table('hotel_dates')->where('date_in',$cart_experience[0]->date_from)->where('date_out',$cart_experience[0]->date_to)->where('deleted_at',null)->first();
		if(!empty($hotel_dates)){
			$HotelDatesID = $hotel_dates->id;
		}
	}
	  	if(!empty($cartExperiencesToRoomsRequest)){
	  			foreach ($cartExperiencesToRoomsRequest as $key => $value) {
	  				$room_id = $value->room_id;
	  				foreach ($value->cartExperiencesToRoomsRequests as $keyCRR => $valueCRR) {
	  					//pr($valueCRR);
	  					if($valueCRR['upgrade_request_sup_status'] == 'accepted'){
							  			 $hotel_dates_supplements = 


DB::connection('mysql_veenus')->table('hotel_dates_supplements')->where('hotel_dates_id', $hotel_dates->id)->where('supplements', $valueCRR['room_requests_id'])->first();
							  			 $price_type = '';
							  			 if(!empty($hotel_dates_supplements))
							  			 {
							  			 	
                                                    $price_type = !empty($hotel_dates_supplements->price_type)?$hotel_dates_supplements->price_type:'pppn';
							  			 }
							  			
									if($room_id == 1)
						  			{
						  				$total_qty = '1';
						  				if($valueCRR['room_requests_id'] == 1)
						  				{
						  					$water_supplement[1]['qty'] = $water_supplement[1]['qty'] + $total_qty;
						  				}
						  				else if($valueCRR['room_requests_id'] == 2)
						  				{
						  					$view_supplement[1]['qty'] = $view_supplement[1]['qty'] + $total_qty;
						  				}
						  				else if($valueCRR['room_requests_id'] == 3)
						  				{
						  					$executive_supplement[1]['qty'] = $executive_supplement[1]['qty'] + $total_qty;
						  				}
						  				else if($valueCRR['room_requests_id'] == 4)
						  				{
						  					$dbl_supplement[1]['qty'] = $dbl_supplement[1]['qty'] + $total_qty;
						  				}
						  				
						  			}		
						  			else if($room_id == '2')
						  			{

						  				if($price_type == 'pppn')
						  				{
						  					$total_qty = $total_qty *2;
						  				}
						  				else
						  				{
						  					$total_qty = 1;
						  				}
						  				if($valueCRR['room_requests_id'] == 1)
						  				{
						  					$water_supplement[2]['qty'] = $water_supplement[2]['qty'] + $total_qty;
						  				}
						  				else if($valueCRR['room_requests_id'] == 2)
						  				{
						  					$view_supplement[2]['qty'] = $view_supplement[2]['qty'] + $total_qty;
						  				}
						  				else if($valueCRR['room_requests_id'] == 3)
						  				{
						  					$executive_supplement[2]['qty'] = $executive_supplement[2]['qty'] + $total_qty;
						  				}
						  				else if($valueCRR['room_requests_id'] == 4)
						  				{
						  					$dbl_supplement[2]['qty'] = $dbl_supplement[2]['qty'] + $total_qty;
						  				}
						  				
						  			}
						  			else if($room_id == '3')
						  			{
						  				if($price_type == 'pppn')
						  				{
						  					$total_qty = $total_qty *2;
						  				}
						  				else
						  				{
						  					$total_qty = 1;
						  				}
						  				if($valueCRR['room_requests_id'] == 1)
						  				{
						  					$water_supplement[3]['qty'] = $water_supplement[3]['qty'] + $total_qty;
						  				}
						  				else if($valueCRR['room_requests_id'] == 2)
						  				{
						  					$view_supplement[3]['qty'] = $view_supplement[3]['qty'] + $total_qty;
						  				}
						  				else if($valueCRR['room_requests_id'] == 3)
						  				{
						  					$executive_supplement[3]['qty'] = $executive_supplement[3]['qty'] + $total_qty;
						  				}
						  				else if($valueCRR['room_requests_id'] == 4)
						  				{
						  					$dbl_supplement[3]['qty'] = $dbl_supplement[3]['qty'] + $total_qty;
						  				}
						  			}
						  			else if($room_id == '4')
						  			{
						  				if($price_type == 'pppn')
						  				{
						  					$total_qty = $total_qty *3;
						  				}
						  				else
						  				{
						  					$total_qty = 1;
						  				}
						  				if($valueCRR['room_requests_id'] == 1)
						  				{
						  					$water_supplement[4]['qty'] = $water_supplement[4]['qty'] + $total_qty;
						  				}
						  				else if($valueCRR['room_requests_id'] == 2)
						  				{
						  					$view_supplement[4]['qty'] = $view_supplement[4]['qty'] + $total_qty;
						  				}
						  				else if($valueCRR['room_requests_id'] == 3)
						  				{
						  					$executive_supplement[4]['qty'] = $executive_supplement[4]['qty'] + $total_qty;
						  				}
						  				else if($valueCRR['room_requests_id'] == 4)
						  				{
						  					$dbl_supplement[4]['qty'] = $dbl_supplement[1]['qty'] + $total_qty;
						  				}
						  			}
						  			else if($room_id == '5')
						  			{
						  				if($price_type == 'pppn')
						  				{
						  					$total_qty = $total_qty *4;
						  				}
						  				else
						  				{
						  					$total_qty = 1;
						  				}
						  				if($valueCRR['room_requests_id'] == 1)
						  				{
						  					$water_supplement[5]['qty'] = $water_supplement[5]['qty'] + $total_qty;
						  				}
						  				else if($valueCRR['room_requests_id'] == 2)
						  				{
						  					$view_supplement[5]['qty'] = $view_supplement[5]['qty'] + $total_qty;
						  				}
						  				else if($valueCRR['room_requests_id'] == 3)
						  				{
						  					$executive_supplement[5]['qty'] = $executive_supplement[5]['qty'] + $total_qty;
						  				}
						  				else if($valueCRR['room_requests_id'] == 4)
						  				{
						  					$dbl_supplement[5]['qty'] = $dbl_supplement[5]['qty'] + $total_qty;
						  				}
						  			}

						  			if($valueCRR['room_requests_id'] == 5)
						  			{
						  				$total_qty_up = 1;
							  			if($room_id == 1)
							  			{
							  				$total_qty_up = 1;
							  			}
							  			else if($room_id == 2)
							  			{
							  				if($valueCRR['upgrade_cost_type'] == 'pppn')
							  				{
							  					$total_qty_up = 2;
							  				}
							  			}
							  			else if($room_id == 3)
							  			{
							  				if($valueCRR['upgrade_cost_type'] == 'pppn')
							  				{
							  					$total_qty_up = 2;
							  				}
							  			}
							  			else if($room_id == 4)
							  			{
							  				if($valueCRR['upgrade_cost_type'] == 'pppn')
							  				{
							  					$total_qty_up = 3;
							  				}
							  			}
							  			else if($room_id == 5)
							  			{
							  				if($valueCRR['upgrade_cost_type'] == 'pppn')
							  				{
							  					$total_qty_up = 4;
							  				}
							  			}
							  			$price_qty_up = !empty($valueCRR['upgrade_cost_out'])?$valueCRR['upgrade_cost_out']:'0';
							  			$total_cost_up = $price_qty_up*$total_qty_up;
							  			$total_final_cost += $total_cost_up;
							  			?>
							  			<tr>
									      	<td scope="row"> {{!empty($valueCRR['upgrade_name'])?$valueCRR['upgrade_name']:''}}- {{$room_array[$room_id]}} - {{$valueCRR['upgrade_cost_type']}}</td>
									      	<td scope="row">{{$total_qty}}</td>
									      	<td scope="row">{{$currency_symbol}}{{$price_qty_up}}</td>
									      	<td scope="row">{{$currency_symbol}}{{$total_cost_up}}</td>
									    </tr> 
									    <?php
						  			}
	  			?>
	  			
	  			<?php
	  				}
	  			}
	  		}
	  	} ?>

	  	<?php
	  	foreach($room_array as $room_id =>$room_name)
	  	{
	  		if(!empty($water_supplement[$room_id]['qty']))
	  		{
	  			$total_qty = $water_supplement[$room_id]['qty'];
	  			$hotel_dates_supplements = 


DB::connection('mysql_veenus')->table('hotel_dates_supplements')->where('hotel_dates_id', $hotel_dates->id)->where('supplements', '4')->first();
		  		if($cart_experience[0]->currency == 2)
          {
              $price_qty = !empty($hotel_dates_supplements->price_euro_out)?$hotel_dates_supplements->price_euro_out:'0';
          }
          else
          {
              $price_qty = !empty($hotel_dates_supplements->price_out)?$hotel_dates_supplements->price_out:'0';
          }
	  			$price_type = !empty($hotel_dates_supplements->price_type)?$hotel_dates_supplements->price_type:'pppn';
	  			$total_cost = $price_qty*$total_qty;
	  			$total_final_cost += $total_cost;
	  			?>
	  			<tr>
			      	<td scope="row"> {{!empty($water_supplement[$room_id]['name'])?$water_supplement[$room_id]['name']:''}} - {{$room_array[$room_id]}} ({{$price_type}})</td>
			      	<td scope="row">{{$total_qty}}</td>
			      	<td scope="row">{{$currency_symbol}}{{$price_qty}}</td>
			      	<td scope="row">{{$currency_symbol}}{{$total_cost}} </td>
			    </tr> 	
	  			<?php
	  		}
	  		if(!empty($view_supplement[$room_id]['qty']))
	  		{
	  			$total_qty = $view_supplement[$room_id]['qty'];
	  			$hotel_dates_supplements = 


DB::connection('mysql_veenus')->table('hotel_dates_supplements')->where('hotel_dates_id', $hotel_dates->id)->where('supplements', '4')->first();
		  		if($cart_experience[0]->currency == 2)
          {
              $price_qty = !empty($hotel_dates_supplements->price_euro_out)?$hotel_dates_supplements->price_euro_out:'0';
          }
          else
          {
              $price_qty = !empty($hotel_dates_supplements->price_out)?$hotel_dates_supplements->price_out:'0';
          }
	  			$price_type = !empty($hotel_dates_supplements->price_type)?$hotel_dates_supplements->price_type:'pppn';
	  			$total_cost = $price_qty*$total_qty;
	  			$total_final_cost += $total_cost;
	  			?>
	  			<tr>
			      	<td scope="row"> {{!empty($view_supplement[$room_id]['name'])?$view_supplement[$room_id]['name']:''}} - {{$room_array[$room_id]}} ({{$price_type}})</td>
			      	<td scope="row">{{$total_qty}}</td>
			      	<td scope="row">{{$currency_symbol}}{{$price_qty}}</td>
			      	<td scope="row">{{$currency_symbol}}{{$total_cost}} </td>
			    </tr> 	
	  			<?php
	  		}
	  		if(!empty($executive_supplement[$room_id]['qty']))
	  		{
	  			$total_qty = $executive_supplement[$room_id]['qty'];
	  			$hotel_dates_supplements = 


DB::connection('mysql_veenus')->table('hotel_dates_supplements')->where('hotel_dates_id', $hotel_dates->id)->where('supplements', '4')->first();
		  		if($cart_experience[0]->currency == 2)
          {
              $price_qty = !empty($hotel_dates_supplements->price_euro_out)?$hotel_dates_supplements->price_euro_out:'0';
          }
          else
          {
              $price_qty = !empty($hotel_dates_supplements->price_out)?$hotel_dates_supplements->price_out:'0';
          }
	  			$price_type = !empty($hotel_dates_supplements->price_type)?$hotel_dates_supplements->price_type:'pppn';
	  			$total_cost = $price_qty*$total_qty;
	  			$total_final_cost += $total_cost;
	  			?>
	  			<tr>
			      	<td scope="row"> {{!empty($executive_supplement[$room_id]['name'])?$executive_supplement[$room_id]['name']:''}} - {{$room_array[$room_id]}} ({{$price_type}})</td>
			      	<td scope="row">{{$total_qty}}</td>
			      	<td scope="row">{{$currency_symbol}}{{$price_qty}}</td>
			      	<td scope="row">{{$currency_symbol}}{{$total_cost}} </td>
			    </tr> 	
	  			<?php
	  		}
	  		if(!empty($dbl_supplement[$room_id]['qty']))
	  		{
	  			$total_qty = $dbl_supplement[$room_id]['qty'];
	  			$hotel_dates_supplements = 


DB::connection('mysql_veenus')->table('hotel_dates_supplements')->where('hotel_dates_id', $hotel_dates->id)->where('supplements', '4')->first();
		  		if($cart_experience[0]->currency == 2)
          {
              $price_qty = !empty($hotel_dates_supplements->price_euro_out)?$hotel_dates_supplements->price_euro_out:'0';
          }
          else
          {
              $price_qty = !empty($hotel_dates_supplements->price_out)?$hotel_dates_supplements->price_out:'0';
          }
	  			$price_type = !empty($hotel_dates_supplements->price_type)?$hotel_dates_supplements->price_type:'pppn';
	  			$total_cost = $price_qty*$total_qty;
	  			$total_final_cost += $total_cost;
	  			?>
	  			<tr>
			      	<td scope="row"> {{!empty($dbl_supplement[$room_id]['name'])?$dbl_supplement[$room_id]['name']:''}} - {{$room_array[$room_id]}} ({{$price_type}})</td>
			      	<td scope="row">{{$total_qty}}</td>
			      	<td scope="row">{{$currency_symbol}}{{$price_qty}}</td>
			      	<td scope="row">{{$currency_symbol}}{{$total_cost}} </td>
			    </tr> 	
	  			<?php
	  		}
	  	}
	  		
	  	?>
	  	<?php 


	  	?>
	  	

	  	<?php if(!empty($otheroomsSupplementsRequest)){
	  		foreach($otheroomsSupplementsRequest as $row)
	  		{

	  			$room_id = $row['room_id'];
	  			$total_qty = 1;
	  			if($room_id == 1)
	  			{
	  				$total_qty = 1;
	  			}
	  			else if($room_id == 2)
	  			{
	  				if($row['upgrade_cost_type'] == 'pppn')
	  				{
	  					$total_qty = 2;
	  				}
	  			}
	  			else if($room_id == 3)
	  			{
	  				if($row['upgrade_cost_type'] == 'pppn')
	  				{
	  					$total_qty = 2;
	  				}
	  			}
	  			else if($room_id == 4)
	  			{
	  				if($row['upgrade_cost_type'] == 'pppn')
	  				{
	  					$total_qty = 3;
	  				}
	  			}
	  			else if($room_id == 5)
	  			{
	  				if($row['upgrade_cost_type'] == 'pppn')
	  				{
	  					$total_qty = 4;
	  				}
	  			}
	  			$price_qty = !empty($row['upgrade_cost_out'])?$row['upgrade_cost_out']:'0';
	  			$total_cost = $price_qty*$total_qty;
	  			$total_final_cost += $total_cost;
	  			?>
	  			<tr>
			      	<td scope="row"> {{!empty($row['upgrade_name'])?$row['upgrade_name']:''}}- {{$room_array[$room_id]}} - {{$row['upgrade_cost_type']}}</td>
			      	<td scope="row">{{$total_qty}}</td>
			      	<td scope="row">{{$currency_symbol}}{{$price_qty}}</td>
			      	<td scope="row">{{$currency_symbol}}{{$total_cost}}</td>
			    </tr> 	
	  			<?php
	  		}
	  	} ?>	
	  	
	  	<?php if(!empty($cart_experience[0]->driver_name)){
	  		
	  			$total_qty2 = 1;
	  			$price_qty2 = !empty($cart_experience[0]->driver_cost)?$cart_experience[0]->driver_cost:'0';
	  			$total_cost2 = $price_qty2*$total_qty2;
	  			//$total_final_cost += $total_cost2;
	  			?>
	  			<tr>
			      	<td scope="row">Driver 1- {{!empty($cart_experience[0]->driver_name)?$cart_experience[0]->driver_name:''}}</td>
			      	<td scope="row">{{$total_qty2}}</td>
			      	<td scope="row">{{$currency_symbol}}{{$price_qty2}}</td>
			      	<td scope="row">{{$currency_symbol}}{{$total_cost2}}</td>
			    </tr> 	
	  			<?php
	  		
	  	} ?>	
	  		<?php if(!empty($cart_experience[0]->courier_name)){
	  		
	  			$total_qty3 = 1;
	  			$price_qty3 = !empty($cart_experience[0]->driver_cost1)?$cart_experience[0]->driver_cost1:'0';
	  			$total_cost3 = $price_qty3*$total_qty3;
	  			//$total_final_cost += $total_cost3;
	  			?>
	  			<tr>
			      	<td scope="row">Driver 2- {{!empty($cart_experience[0]->courier_name)?$cart_experience[0]->courier_name:''}}</td>
			      	<td scope="row">{{$total_qty3}}</td>
			      	<td scope="row">{{$currency_symbol}}{{$price_qty3}}</td>
			      	<td scope="row">{{$currency_symbol}}{{$total_cost3}}</td>
			    </tr>
	  			<?php
	  		
	  	} 
	  	if(!empty($rooms_deposit)){
	  			
	  			$total_qty4 = !empty($rooms_deposit)?$rooms_deposit+$d_cnt:'0';
	  			$price_qty4 = !empty($experience_rate_dates->deposit)?$experience_rate_dates->deposit:'0';
	  			$total_cost4 = $price_qty4*$total_qty4;
	  			//$total_final_cost += $total_cost4;
	  			?>
	  			<!-- <tr>
			      	<td scope="row"> Deposit</td>
			      	<td scope="row">{{$total_qty4}}</td>
			      	<td scope="row">(£{{$price_qty4}})</td>
			      	<td scope="row">(£{{$total_cost4}})</td>
			    </tr> 	 -->
	  			<?php
	  		
	  	} ?>	
	  	<?php if(!empty($roomsSupplementsRequest) || !empty($otheroomsSupplementsRequest)){ ?>
	  		<tr>
	  		<td colspan="2" style="text-align:right;">&nbsp;</td>
	      	<td style="text-align:right;border-bottom: 2px solid #000000;">&nbsp;</td>
	      	<td scope="row" style="border-bottom: 2px solid #000000;">&nbsp;</td>
	    </tr> 
	  		<tr>
			      	<td colspan="3" style="text-align:right;border-top:unset;"><b>Tour Total:</b></td>
			      	<td style="border-top:unset;border-top: 2px solid #000000;color: #000000"  scope="row"><b>{{$currency_symbol}}{{$total_final_cost}}</b></td>
			      
			    </tr> 	
	  		<?php
	  		
	  	} ?>	

	  	<?php if(empty($roomsSupplementsRequest) && empty($otheroomsSupplementsRequest)){ ?>
	  		<!-- <tr>
			      	<td colspan="4" ><b>No charges for tour</b></td>
			      
			    </tr> 	 -->
	  		<?php
	  		
	  	} ?>	
	  </tbody>
</table>
<input type="button" value="Back" onclick="javascript: parent.jQuery.fancybox.close();" style="float:left;" class="cta total">
  </div>
 
</div>
<script type="text/javascript">
	$('.select-tab').click(function(){
		var id = $(this).attr('data-id');
		//$('.select-tab').removeClass('manual');
		//$(this).addClass('manual');
		
		
		$('.select-tab').attr('aria-selected',false);
		$(this).attr('aria-selected',true);
		

		$('.content-tab').hide();
		$('#tabpanel-'+id).show();
	})
	$("#sendInvoice").bind("click", function(e){
		var id = $(this).attr("data-id");
			$.ajax({
			    url: "{{ route('sent-invoice') }}",
			    type: 'POST',
			    data: {sent_finance:'1','invoice_id':id},
			    success: function(data){
			        parent.jQuery.fancybox.close();
			        parent.parent.jQuery.fancybox.close();
			        var cartIdSCls = $('.cartIdSCls').val();
	                $('a#reloadInfo'+cartIdSCls).trigger('click');
			        toastSuccess('Sent to finance successfully.');
			        $('.loader').hide();
			    },
			    error: function(data){
			    	$('.loader').hide();
			    }
			});
		
		
	});
</script>
