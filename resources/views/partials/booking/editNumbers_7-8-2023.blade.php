<?php 
	$currency_symbol = getCurrencySymbol($cart_experience[0]->currency);
	$sgl = 0;
	$dbl = 0;
	$twn = 0;
	$trp = 0;
	$qrd = 0;
	$date_in = '';
	$date_out = '';
	$HotelDatesID = '';
	$night = '';
	
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
			$sgl = $hotel_dates->sgl;
			$dbl = $hotel_dates->dbl;
			$twn = $hotel_dates->twn;
			$trp = $hotel_dates->trp;
			$qrd = $hotel_dates->qrd;
			$HotelDatesID = $hotel_dates->id;
			$date_in = $hotel_dates->date_in;
			$date_out = $hotel_dates->date_out;
			$night = $hotel_dates->night;
		}
		
	}

	if(empty($HotelDatesID)){
		$hotel_dates = 


DB::connection('mysql_veenus')->table('hotel_dates')->where('date_in',$cart_experience[0]->date_from)->where('date_out',$cart_experience[0]->date_to)->where('deleted_at',null)->first();
		if(!empty($hotel_dates)){
			$HotelDatesID = $hotel_dates->id;
		}
	}
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
		//($value->room_id == '1' && $value->status == '1')

		if($value->room_id == '1' && $value->cancellation_request_status == null && ($value->deposit == '1' || $value->paid == '1')){
			$sngSCnt++;
		}else if($value->room_id == '2'  && $value->cancellation_request_status == null && ($value->deposit == '1' || $value->paid == '1')){
			$dblSCnt++;
		}else if($value->room_id == '3' && $value->cancellation_request_status == null && ($value->deposit == '1' || $value->paid == '1')){
			$twnSCnt++;
		}else if($value->room_id == '4' && $value->cancellation_request_status == null && ($value->deposit == '1' || $value->paid == '1')){
			$trpSCnt++;
		}else if($value->room_id == '5' && $value->cancellation_request_status == null && ($value->deposit == '1' || $value->paid == '1')){ 
			$qrdSCnt++;
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
<style type="text/css">
	/*td.sadasd,td.suppliment {
	    text-align: center;
	}*/
	.driver_check {
	    width: 100%;
	    clear: both;
	}
	.tx-big{
		font-size: 1.8rem;
		color: #959090;
	}
	.driver_check .checkbox_div{
		float: left !important;
		margin-left: 2px;
	}
	.supplement_title{
		color: #8a909d !important;
		float: left;
		margin-right: 10px;
	}
	.text-success {
    color: green !important;
	}
	.up-suppliment {
	    width: 100%;
	    float: left;
	}
	.selected-active{padding: 2px;border: 1px solid !important;font-weight: bold;}
	.selected-inactive{padding: 2px;font-weight: bold;color: gray !important;}
	._tourOverviewButton{
		padding: 2px;
	}
	.act-dec {
	    /*float: right;*/
	}
	.mainSuperPanel .ctas{
		margin: 2px -5px 19px -5px !important;
	}
	#dataUpdateNumberHolder td{
		vertical-align: middle;
	}
	p.sk_pending {
	    margin-bottom: unset !important;
	}
	.note_text{font-size: 14px;}
	.sk_cancel_btn{cursor: pointer;display: block;}
	#SignleRooms{cursor: pointer;}
	@hasrole('Collaborator')
	.table-disaled input.form-control {
	    border: none;
	}
	.table-disaled textarea.form-control {
	    border: none;
	}
	.table-disaled span.checkmark {
    	border: none;
	}
	.table-disaled .cancelUpgrade{display: none;}
	/*.table-disaled .up-request{display: none;}	*/
	
	tr.table-disaled td:first-child{
		pointer-events: none !important;
	}
	tr.table-disaled td:nth-child(2){
		pointer-events: none !important;
	}
	tr.table-disaled td:nth-child(3){
		pointer-events: none !important;
	}
	tr.table-disaled td:nth-child(4){
		pointer-events: none !important;
	}
	tr.table-disaled td a{
		display: none;
	}
	<?php 
	if(!empty($guestListCompleted)){
	?>
	.tab-content td{pointer-events: none;}
	.tab-content td.sadasd{pointer-events: auto;}

	<?php
	}
	?>
	@endhasrole

	
	
</style>
<div class="notIndexContainer" style="margin-bottom: 200px; width: 100%;">

        <div class="guestlist_container">

            <div class="grouped_header">

                <div class="header">

                    <div class="logo">
                        <img src="{{ asset('images/logo2x.png') }}" alt="Veenus">
                    </div>

                    <div class="main_details">

                        <div class="heading">
                            {{$cart_experience[0]->experience_name}} - Guest List
                        </div>

                        <div class="detail">
                            Tour: {{$cart_experience[0]->experience_name}}
                        </div>

                        <div class="detail">
                            Hotel: {{$cart_experience[0]->hotel_name}}
                        </div>

                        <div class="detail">
                            Date: {{ date("D d M", strtotime($cart_experience[0]->date_from)) }} - {{ date("D d M 'y", strtotime($cart_experience[0]->date_to)) }} ( {{ $cart_experience[0]->nights }} @if($cart_experience[0]->nights > 1) nights @else night @endif )
                        </div>
                        
                    </div>
                    @hasrole('Collaborator')
                    @else
                    <?php

                    $experiences = 


DB::connection('mysql_veenus')->table('experiences')->where('id', $cart_experience[0]->experiences_id)->first();
                   $users_details = 


DB::connection('mysql_veenus')->table('users_details')->where('user_id',$cart_detail->user_id)->first();
                    $detail = array();
                            if(!empty($users_details->contacts)){
                                $contacts = unserialize($users_details->contacts);
                                foreach ($contacts as $k => $val) {
                                    if(isset($val['main_contact']) && $val['main_contact'] == 'on'){
                                        $detail = $val;
                                    }
                                }
                            }
                            
                    ?>
                    <div class="contact_info">
                        <div class="label">
                            Main Contact
                        </div>

                        <strong><?php 
                                            if(!empty($detail)){
                                                echo $detail['name'].' ('.$detail['position'].')'; 
                                            }else{
                                                echo '-';
                                            }
                                            ?></strong>

                        <div class="label">
                            Contact number
                        </div>

                        <strong>direct: <span class="number"><?php 
                                                if(!empty($detail)){
                                                    echo $detail['contact_number']; 
                                                }
                                                ?></span></strong><br>

                        <strong>main: <span class="number"><?php echo isset($users_details->main_contact_number) ? $users_details->main_contact_number : ''; ?></span></strong>
                    </div>
                    @endhasrole

                </div>
                <?php
                 $cartdata = App\Models\Cms\Cart::where("id", $cart_experience[0]->carts_id)->first();
                 $today = strtotime("today");
				$minusDays = strtotime('-28 days',strtotime($cart_experience[0]->date_from));
				
                ?>
                <div class="sub_header">

                    <ul class="nav">

                    	@hasrole('Collaborator')
                       
                     <!--   <li style="width:auto;">
                            <a data-fancybox data-type="ajax" data-src="" href="{{ route('swap-rooms', $cart_experience[0]->id) }}" class="cta">
                                Room Swap
                            </a>
                        </li> -->

                        <?php 
                        $today = strtotime("today");
						$minusDays = strtotime('-28 days',strtotime($cart_experience[0]->date_from));
						if($today >= $minusDays){
							if(!empty($value->is_optional_room)){
									
									
									}else{
											?>
											
											<li style="width:auto;">
					                            <a data-fancybox data-type="ajax" data-src="" href="{{ route('cancel-rooms', $cart_experience[0]->id) }}" class="cta">
					                                Request Room Cancellation
					                            </a>
					                        </li>
											<?php
									}
						}else{
							
						}
                        if(strtotime($cart_experience[0]->date_from) > $today)
                        {
                        	 if($today >= $minusDays){
							
							}else{

								?>
								 <!-- <li style="width:auto;">
		                            <a data-fancybox data-type="ajax" data-src="" href="{{ route('cancel-rooms', $cart_experience[0]->id) }}" class="cta">
		                                Request Room Cancellation
		                            </a>
		                        </li> -->
								<?php
							}
                        }
                       
						?>
                         <li style="width:auto;">
                            <a data-fancybox data-type="ajax" data-src="" href="{{ route('add-rooms', $cart_experience[0]->id) }}" class="cta">
                                Request Additional Room
                            </a>
                        </li>
                        <li style="width:auto;">
                            <a data-fancybox data-type="ajax" data-src="" href="{{ route('general-enquiry', $cart_experience[0]->id) }}" class="cta">
                                General Enquiry
                            </a>
                        </li>
                        <?php if(!empty($cart_experience[0]->driver)){
                        	?>
                        	 <!-- <li style="width:auto;">
	                            <a data-fancybox="" data-type="ajax" data-src="" href="/add-driver/{{$cart_experience[0]->id}}" class="cta">Add Driver Detail</a>
	                        </li> -->
	                        	
	                        	<?php 
	                        } ?>
                    	<!-- <li class="large">
                            <a class="cta tourOverviewButton" data-fancybox data-type="ajax" data-src="" href="{{ route('add-rooms', $cart_experience[0]->id) }}">
                                Enter tracking figures
                            </a>
                        </li> -->
                    	@else
                        <li class="backBtnGL" style="display:none;">
                            <a href="javascript:;" class="cta sktrigger" data-tab="sk_Rooms">
                                < Back
                            </a>
                        </li>
                        <li>
                        	<?php
                        		$cartExperiencesToRoomsRequestCount = App\Models\Cms\CartExperiencesToRooms::with('cartExperiencesToRoomsRequests')->whereIn('room_request_status',['pending'])->where("cart_exp_id", $cart_experience[0]->id)->orderBy('date', 'DESC')->count();
                        	?>
                            <a href="javascript:;" class="cta sktrigger" data-tab="sk_Requests">
                                Additions(<?=$cartExperiencesToRoomsRequestCount?>)
                            </a>
                        </li>

                        <li>
                        	<?php 

                        	$upgrade_count = 


DB::connection('mysql_veenus')->table('rooms_supplements_requests')->where('cart_id', $cart_experience[0]->id)->where('upgrade_request_sup_status','pending')->groupBy('cart_experiences_to_rooms_id')->count();
                        	?>
                            <a href="javascript:;" class="cta sktrigger" data-tab="sk_Additions">
                                Upgrades(<?=$upgrade_count?>)
                            </a>
                        </li>

                       <!--   <li>
                          <a href="#" class="cta sktrigger" data-tab="sk_swaps">
                                Swaps
                            </a>
                        </li> -->

                        <li class="large">
                            <a href="javascript:;" class="cta sktrigger" data-tab="sk_cancellations">
                                Cancellations(<?=$cartExperiencesToRoomsCancellation->count()?>)
                            </a>
                        </li>

                        <!-- <li class="large">
                            <a class="cta tourOverviewButton" data-fancybox data-type="ajax" data-src="" href="{{ route('add-rooms', $cart_experience[0]->id) }}">
                                Update tracking
                            </a>
                        </li> -->
                        <li class="large">
                        	<?php 
                        	$enquiries_count = 


DB::connection('mysql_veenus')->table('general_enquiries')->where('cart_experience_id', $cart_experience[0]->id)->where('is_resolved','0')->count();
                        	?>
                            <a href="javascript:;" class="cta sktrigger" data-tab="sk_enquiries">
                                Gen Enquiries(<?=$enquiries_count?>)
                            </a>
                        </li>
                        <?php $today = strtotime("today");
	                	if(strtotime($cart_experience[0]->date_from) > $today)
	                	{ ?>
                        <li class="large">
                            <a href="javascript:;" class="cta admin sktrigger" data-tab="sk_Rooms" style="background: #14213D;color: #fff;border-color: #14213D;">
                                Admin Edit
                            </a>
                        </li>
                        <?php } ?>
                        @endhasrole	



                    </ul>

                    <div class="tour_sales">
                    	<?php
                    	$rooms_ppl = 0;
                    	$rooms_sold = 0;
                    	foreach ($cartExperiencesToRoomsAll as $key => $value) {
                    		//pr($value);
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
                    				$rooms_ppl	= $rooms_ppl+count($names);
                    			}
                    		}
                    	}
                    	/*foreach ($cartExperiencesToRoomsRequest as $key => $value) {
                    		if($value->room_request_status == 'approved' && ($value->status == '1' || $value->paid == 1 || $value->deposit == 1)){
                    			$rooms_sold = $rooms_sold+1;
                    			if($value->room_id == '1'){
                    				$sngSCnt = $sngSCnt+1;
								}elseif ($value->room_id == '2') {
									$dblSCnt = $dblSCnt+1;
								}elseif ($value->room_id == '3') {
									$twnSCnt = $twnSCnt+1;
								}elseif ($value->room_id == '4') {
									$trpSCnt = $trpSCnt+1;
								}elseif ($value->room_id == '5') {
									$qrdSCnt = $qrdSCnt+1;
								}
                    			
                    		}
                    	}*/
                    	?>
                    	<?php 
                    	//pr($cart_experience[0]);
                    	$d_cnt = (!empty($cart_experience[0]->driver_name) && ($cart_experience[0]->driver_room_type == '2' || $cart_experience[0]->driver_room_type == '3'))?'1':'0';
				    		$s_cnt = ($cart_experience[0]->driver_room_type == '1')?'1':'0';
				    		$total_pax = get_total_pax($cart_experience[0]->id); ?>
                        <div>Rooms sold: {{$rooms_sold+$d_cnt}}</div>
                        <!-- <div>Rooms sold: {{$sngSCnt+$dblSCnt+$twnSCnt+$trpSCnt+$qrdSCnt}}</div> -->
                        <div>Tour pax: {{$total_pax}}</div>
                    </div>

                </div>

                <div class="tabs_wrapper skalltabs sk_Rooms" style=" margin-top: 20px;">
                	@hasrole('Collaborator')
                	 <?php
													
													$today = strtotime("today");
													$minusDays = strtotime('-28 days',strtotime($cart_experience[0]->date_from));
													if($today >= $minusDays){
														 ?>
                	<ul class="nav tabmessage" style="margin-top: 0px;"><li style="border: unset;border-bottom: unset;padding-left: 0px;"><h6 style="color:red;text-align: left;"><b>This guest list is now locked. Any further changes please send us a general enquiry.</b></h6></li></ul>
					<?php }  ?>
                	<ul class="nav tabs" role="tablist" style="margin-top: 15px;">
					  	<!-- @if ($sngLastAmt > 0)
							<li class="nav-item active" data-toggle="tab" href="javascript:;" data-href="#SignleRooms" role="tab">Single Rooms ({{$sngSCnt}}/{{$sngLastAmt}})
							</li>
					   	@endif -->
					  	@if ($sngLastAmt > 0)
							<li class="nav-item {{(!empty($LastAddedRequest) && $LastAddedRequest->room_id == 1)?'active':(empty($LastAddedRequest)?'active':'')}}" data-toggle="tab" href="javascript:;" data-href="#SignleRooms" role="tab">Single Rooms ({{$sngSCnt}}/{{$sngLastAmt}})
							</li>
					   	@endif
						
					  	@if ($dblLastAmt > 0)
					  		
							<li class="nav-item  {{(!empty($LastAddedRequest) && $LastAddedRequest->room_id == 2)?'active':''}}" data-toggle="tab" href="javascript:;" data-href="#DoubleRooms" role="tab">Double Rooms ({{$dblSCnt}}/{{$dblLastAmt}})
							</li>
					   	@endif
					  	@if ($twnLastAmt > 0)
							<li class="nav-item {{(!empty($LastAddedRequest) && $LastAddedRequest->room_id == 3)?'active':''}}" data-toggle="tab" href="javascript:;" data-href="#TwinRooms" role="tab">Twin Rooms ({{$twnSCnt}}/{{$twnLastAmt}})
							</li>
					   	@endif
						@if ($trpLastAmt > 0)
							<li class="nav-item {{(!empty($LastAddedRequest) && $LastAddedRequest->room_id == 4)?'active':''}}" data-toggle="tab" href="javascript:;" data-href="#TripleRooms" role="tab">Triple Rooms ({{$trpSCnt}}/{{$trpLastAmt}})
							</li>
						@endif
						@if ($qrdLastAmt > 0)
							<li class="nav-item {{(!empty($LastAddedRequest) && $LastAddedRequest->room_id == 5)?'active':''}}" data-toggle="tab" href="javascript:;" data-href="#QuadrupleRooms" role="tab">Quadruple Rooms ({{$qrdSCnt}}/{{$qrdLastAmt}})
							</li>
						@endif
						
						<li class="nav-item" data-toggle="tab" href="javascript:;" data-href="#driverTab" role="tab">Driver (<?php echo ($cart_experience[0]->driver_name != '' && $cart_experience[0]->driver_name1 != '') ? '2' : (($cart_experience[0]->driver_name != '') ? '1' : '0'); ?>/<?=!empty($cart_experience[0]->driver_name1)?'2':'1'?>)
						</li>
						
					</ul>
					@else
						<ul class="nav tabs" role="tablist">
						@if ($sngLastAmt > 0 || $dblLastAmt > 0 || $twnLastAmt > 0 || $trpLastAmt > 0 || $qrdLastAmt > 0 )
							<!-- <li class="nav-item" data-toggle="tab" href="javascript:;" data-href="#AllRooms" role="tab">All Rooms ({{$dblSCnt}}/{{$sngLastAmt+$dblLastAmt+$twnLastAmt+$trpLastAmt+$qrdLastAmt}})
							</li> -->
					   	@endif
					  	@if ($sngLastAmt > 0)
							<li class="nav-item {{(!empty($LastAddedRequest) && $LastAddedRequest->room_id == 1)?'active':(empty($LastAddedRequest)?'active':'')}}" data-toggle="tab" href="javascript:;" data-href="#SignleRooms" role="tab">Single Rooms ({{$sngSCnt}}/{{$sngLastAmt}})
							</li>
					   	@endif
						
					  	@if ($dblLastAmt > 0)
					  		
							<li class="nav-item  {{(!empty($LastAddedRequest) && $LastAddedRequest->room_id == 2)?'active':''}}" data-toggle="tab" href="javascript:;" data-href="#DoubleRooms" role="tab">Double Rooms ({{$dblSCnt}}/{{$dblLastAmt}})
							</li>
					   	@endif
					  	@if ($twnLastAmt > 0)
							<li class="nav-item {{(!empty($LastAddedRequest) && $LastAddedRequest->room_id == 3)?'active':''}}" data-toggle="tab" href="javascript:;" data-href="#TwinRooms" role="tab">Twin Rooms ({{$twnSCnt}}/{{$twnLastAmt}})
							</li>
					   	@endif
						@if ($trpLastAmt > 0)
							<li class="nav-item {{(!empty($LastAddedRequest) && $LastAddedRequest->room_id == 4)?'active':''}}" data-toggle="tab" href="javascript:;" data-href="#TripleRooms" role="tab">Triple Rooms ({{$trpSCnt}}/{{$trpLastAmt}})
							</li>
						@endif
						@if ($qrdLastAmt > 0)
							<li class="nav-item {{(!empty($LastAddedRequest) && $LastAddedRequest->room_id == 5)?'active':''}}" data-toggle="tab" href="javascript:;" data-href="#QuadrupleRooms" role="tab">Quadruple Rooms ({{$qrdSCnt}}/{{$qrdLastAmt}})
							</li>
						@endif
						
						<li class="nav-item" data-toggle="tab" href="javascript:;" data-href="#driverTab" role="tab">Driver (<?php echo ($cart_experience[0]->driver_name != '' && $cart_experience[0]->driver_name1 != '') ? '2' : (($cart_experience[0]->driver_name != '') ? '1' : '0'); ?>/<?=!empty($cart_experience[0]->driver_name1)?'2':'1'?>)
						</li>
						
					</ul>
					@endhasrole
                    
                </div>

            </div>

            <div class="main">


            		<!-- Tab panes -->
					<div class="tab-content skalltabs sk_Requests" style="display: none;">
						@if ($sngLastAmt > 0)
						  	<div class="-tab-pane active" id="RoomRequest" role="tabpanel" style="border: 1px solid;
    margin: 28px;">
						  		<h3  style="padding: 5px 38px;margin: 0 0 15px;color: #212529;">Room Requests</h3>
						  		<div class="row">
						  			<div class="col-sm-2" style=" padding: 0 50px; margin: 0 0 30px; ">
							  	 		<a data-fancybox data-type="ajax" data-src="" href="{{ route('add-rooms', $cart_experience[0]->id) }}" class="btn btn-primary">
			                                Add a Room Request
			                            </a>
							  	 	</div>
						  		</div>
								<div class="row">
						<?php
						if($cartExperiencesToRoomsRequest->count()>0){
							$s =1;
							  	foreach ($cartExperiencesToRoomsRequest as $key => $value) {
							  		switch ($value->room_id) {
									  case "1":
									    $roomname = 'Single Room';
									    break;
									  case "2":
									    $roomname = 'Double Room';
									    break;
									  case "3":
									    $roomname = 'Twin Room';
									    break;
									  case "4":
									    $roomname = 'Triple Room';
									    break;
									  case "5":
									    $roomname = 'Quadruple Room';
									    break;
									  default:
									    $roomname = "Single Room";
									}	

							  		$ceTrR = [];
							  		$room_supplements = [];
								  	foreach ($value->cartExperiencesToRoomsRequests as $keyCRR => $valueCRR) {

							  			$ceTrR[] = $valueCRR->room_requests_id;
							  			 $hotel_dates_supplements = 


DB::connection('mysql_veenus')->table('hotel_dates_supplements')->where('hotel_dates_id', $hotel_dates->id)->where('supplements', $valueCRR['room_requests_id'])->first();
							  			 $pstr = '';
							  			 if(!empty($hotel_dates_supplements))
							  			 {
							  			 	 $hotel_dates_supplements->price_type = !empty($hotel_dates_supplements->price_type)?$hotel_dates_supplements->price_type:'pp';
                                                    $hotel_dates_supplements->price_type  = ($hotel_dates_supplements->price_type == 'pppn')?'pp':$hotel_dates_supplements->price_type;
                                                    $price_out_sup = ($cart_experience[0]->currency == 2)?$hotel_dates_supplements->price_euro_out:$hotel_dates_supplements->price_out;
                                                    $pstr = !empty($price_out_sup)?' ('.$currency_symbol.$price_out_sup/*.' '.$hotel_dates_supplements->price_type*/.')':'';
							  			 }
							  			if($valueCRR['room_requests_id'] == 1){

						      						$valueCRR['supplements'] = 'Water view (Sea/Lake/River)'.$pstr;
						      					}elseif($valueCRR['room_requests_id'] == 2){
						      						$valueCRR['supplements'] = 'View (Garden/Balcony)'.$pstr;
						      					}elseif($valueCRR['room_requests_id'] == 3){
						      						$valueCRR['supplements'] = 'Executive/De Luxe/Superior Rooms'.$pstr;
						      					}elseif($valueCRR['room_requests_id'] == 4){
						      						$valueCRR['supplements'] = 'Dbl/tw room for sole'.$pstr;
						      					}elseif($valueCRR['room_requests_id'] == 5){
						      						$upgrade_name =  explode(',',$valueCRR['upgrade_name']);
							      						$upgrade_cost =  explode(',',$valueCRR['upgrade_cost']);
							      						$upgrade_cost_out =  explode(',',$valueCRR['upgrade_cost_out']);
							      						$upgrade_cost_type =  explode(',',$valueCRR['upgrade_cost_type']);

							      						if(!empty($upgrade_name))
							      						{
							      							$str_add = 'Others : ';
							      							foreach($upgrade_name as $key=>$row)
							      							{
							      								$ct = !empty($upgrade_cost[$key])?' - In ('.$currency_symbol.$upgrade_cost[$key].')':'';
							      								$ct1 = !empty($upgrade_cost_out[$key])?' Out ('.$currency_symbol.$upgrade_cost_out[$key].')':'';
							      								$ct2 = !empty($upgrade_cost_type[$key])?' - '.$upgrade_cost_type[$key].')':'';
							      								$ct2 = ($ct2 == 'pppn')?'pp':$ct2;
							      								$str_add .= $row.$ct.$ct2.' ';
							      							}
							      						}
						      						$valueCRR['supplements'] = rtrim($str_add);
						      					}
							  			$room_supplements[] = $valueCRR;
								  	}
								  	$rowId = $value->id;
								  	/*if($value->room_request_status == 'declined'){
								  		continue;
								  	}*/
							  	 ?>	
							  	 	
									<div class="col-sm-12 mainSuperPanel" style=" padding: 0 50px; margin: 0 0 30px; ">								  		
										<!-- <form method="post" action="http://tours-system-com.stackstaging.com/add-rooms-detail" id="dataHolder" novalidate="novalidate"> -->
										    <div class="roomHolder superRequest" id="roomHolder1" style="display: block;float: left;width: 100%;">
										    	<h3>Room Request #<?php echo $s++; ?> <span style="float: right;"><?php echo date('H:i d/m/Y',strtotime($value->date)); ?></span></h3>
										  		<div class="form-group">
												    <label class="graycls">Room type</label>
											    	<label class="supplement_title"><?php echo $roomname; ?> </label> 
											    	 <div class="act-dec" style="">
																  	<?php
																  	$cnts = 0;
																  	$declined = '0';
																  	if($value->room_request_status == 'pending'){
																  		$cnts = 1;
																  	?>

																	  	<div class="ctas sk_ctas">
																	  		<a class=" _tourOverviewButton select-req-res room-status act-up" data-id="{{$value->id}}" data-rid="{{$value->id}}"  style="color: green;font-weight: bold;margin-right: 5px;cursor: pointer" data-type="accept" data-id="accept">Accept</a>
								                                            <a class=" _tourOverviewButton select-req-res room-status dct-up" data-id="{{$value->id}}" data-rid="{{$value->id}}" data-type="decline" style="color: red;font-weight: bold;cursor: pointer">Decline</a>
								                                            
								                                        </div>
							                                        <?php
								                                    }else{
								                                    	//'pending','approved','declined'
								                                    	
								                                    	
								                                    	$type = 'Pending';
																        if($value->room_request_status == 'approved'){
																            $type = '<label class="text-success">Accepted</label>';
																        }else if($value->room_request_status == 'declined'){
																        	$declined = '1';
																            $type = '<label class="text-danger">Declined</label>';
																        }else if($value->room_request_status == 'cancelled'){
																            $type = '<label class="text-danger">Cancelled</label>';
																        }
								                                    ?>
							                                        	<div class="form-group"><label class="graycls"><?php echo $type; ?></label></div>
							                                        	
							                                        <?php
								                                    }
								                                    ?>
								                                	</div>
											    </div>
										    	<div class="form-group marginBottom0">
												    <label class="graycls">Request Type</label>
												    <?php 
											      		/*$selected = [];
											      		foreach ($roomRequests as $keyrm => $valuerm) {
											      			
											      			if (in_array($valuerm->id, $ceTrR)){
											      				$selected[] =  $valuerm->name;
											      			}

											      		}
											      		echo implode(', ', $selected);*/
											      		//pr($room_supplements);
									      		 	?>
									      		 	 <?php if(!empty($room_supplements)){
									      		 	 	
									      		 	 	
									      		 	 	
												    	foreach($room_supplements as $srow)
												    	{	
												    		//pr($srow);
												    		?>
												    		<div class="sk_actions<?php echo $value->id; ?>">  
													    			<div class="up-suppliment">
													    				<label class="supplement_title" style="">{{$srow->supplements}}</label>
													    				 <div class="act-dec" style="">
																  	<?php
																  	if($srow->upgrade_request_sup_status == 'pending'){
																  		$cnts = 1;
																  	?>

																	  	<div class="ctas sk_ctas">
																	  		<a class=" _tourOverviewButton select-req-res act-up" data-id="{{$srow->id}}" data-rid="{{$value->id}}"  style="color: green;font-weight: bold;margin-right: 5px;cursor: pointer" data-type="accept" data-id="accept">Accept</a>
								                                            <a class=" _tourOverviewButton select-req-res dct-up" data-id="{{$srow->id}}" data-rid="{{$value->id}}" data-type="decline" style="color: red;font-weight: bold;cursor: pointer">Decline</a>
								                                            
								                                        </div>
							                                        <?php
								                                    }else{
								                                    	//'pending','approved','declined'
								                                    	
								                                    	
								                                    	$type = 'Pending';
																        if($srow->upgrade_request_sup_status == 'accepted'){
																            $type = '<label class="text-success">Accepted</label>';
																        }else if($srow->upgrade_request_sup_status == 'declined'){
																        	$declined = 1;
																            $type = '<label class="text-danger">Declined</label>';
																        }else if($srow->upgrade_request_sup_status == 'cancelled'){
																            $type = '<label class="text-danger">Cancelled</label>';
																        }
																        else{
																        	$sup_pending = 1;
																        }
								                                    ?>
							                                        	<div class="form-group"><label class="graycls"><?php echo $type; ?></label></div>
							                                        	
							                                        <?php
								                                    }
								                                    ?>
								                                	</div>
								                                	</div>
						                                    	</div>

												    		<?php
												    	}
												    } ?>
										  		</div>
										  		<?php $dd = !empty($cnts)?'display:block;':'display:none;';?>
										  		<div class="form-group declined_reason_div_<?php echo $rowId; ?>" style="<?=!empty($declined)?$dd:'display:none;'?>">
														    <label class="graycls">Declined Reason</label>
											    	<textarea name="declined_reason" class="form-control initialcls <?=!empty($declined)?'is_declined':''?> declined_reason_<?php echo $rowId; ?>" >{{!empty($value->declined_reason)?$value->declined_reason:''}}</textarea>
											    	<span style="color:red;font-weight: bold;" class="declined_reason_error_<?php echo $rowId; ?>"></span>
											    </div>
											  	<div class="sk_actions<?php echo $rowId; ?> initialdiv">    
												  	<?php 	if(empty($cnts))
												  		{ ?>
												  		<?php if(!empty($declined)){ ?>
												  		<div class="form-group ">
												  			 <label class="graycls">Declined Reason</label>
													  		<p class="note_text">{{$value->declined_reason}}</p>
													  		
													  	</div>
													  	<?php } ?>
													  
													  	<div class="form-group marginBottom0">
													  		 <label class="graycls">Guest Names</label>
													  		<p class="note_text">{{!empty($value->names)?$value->names:''}}</p>
													  	</div>
													  	<!--  <div class="form-group marginBottom0">
													  		 <label class="graycls">Additional Comments</label>
													  		<p class="note_text">{{$value->addtional_comment}}</p>
													  	</div> -->
													  	<div class="form-group ">
												  			 <label class="graycls">Note for the hotel (this will be shown on the guest list)</label>
													  		<p class="note_text">{{$value->specials}}</p>
													  		
													  	</div>	
												  		<div class="form-group">
														    <label class="graycls">Initials</label>
													    	<p class="note_text">{{!empty($value->room_init)?$value->room_init:''}}</p>
													    </div>
												    		    	
												    	<div class="form-group ">
														    <label class="graycls">Internal Note</label>
												    		<p class="note_text">{{!empty($value->room_note)?$value->room_note:''}}</p>
												  		</div>
												  	<?php } else {?>
												  			<div class="form-group marginBottom0">
													  		 <label class="graycls">Guest Names</label>
													  		<p class="note_text">{{!empty($value->names)?$value->names:''}}</p>
													  	</div>
													  	<br/>
												  		 <label class="graycls">Additional Comments</label>
												  		<div class="form-group">
														   <p>Need for the hotel (this will be shown on the guest list)</p>
													    	<textarea readonly name="specials" class="form-control initialcls specials_<?php echo $rowId; ?>" >{{!empty($value->specials)?$value->specials:''}}</textarea>

													    </div>
													   <!--  <div class="form-group">
														    <p>Room request notes</p>
													    	<textarea rows="1" name="specials" class="form-control initialcls specials_<?php echo $rowId; ?>" maxlength="100">{{!empty($value->specials)?$value->specials:''}}</textarea>
													    	<span style="color:red;font-weight: bold;" class="specials_error_<?php echo $value->id; ?>"></span>
													    </div> -->
												  		<div class="form-group">
														    <label class="graycls">Initials</label>
													    	<input name="room_init" value="{{!empty($value->room_init)?$value->room_init:''}}" class="form-control initialcls room_init_<?php echo $rowId; ?>" maxlength="50" style="width: 100px" value="">
													    	<span style="color:red;font-weight: bold;" class="room_init_error_<?php echo $value->id; ?>"></span>
													    </div>
												    			    	
												    	<div class="form-group ">
														    <label class="graycls">Internal Note</label>
												    		<textarea name="room_note" class="form-control room_note_<?php echo $rowId; ?>" maxlength="255" rows="3">{{!empty($value->room_note)?$value->room_note:''}}</textarea>
												    		<span style="color:red;font-weight: bold;" class="room_note_error_<?php echo $value->id; ?>"></span>
												  		</div>
												  		
													    
												  	<?php } ?>
												  	<?php
												  	
												  	if(!empty($cnts))
												  		{
												  	?>
												  	<div class="form-group " style="margin-top: 12px;clear: both;">
												  			<a href="javascript:;" data-id="<?php echo $value->id; ?>" class="cta save_room_req" style="width: 10%;">Save</a>
												  			<input type="hidden" name="accept_upgrade_{{$value->id}}" id="accept_upgrade_{{$value->id}}" value="">
												  			<input type="hidden" name="declined_upgrade_{{$value->id}}" id="declined_upgrade_{{$value->id}}" value="">
												  			<input type="hidden" name="room_request_status" id="room_request_status_{{$value->id}}" value="">
												  			<input type="hidden" name="all_done" id="all_done_{{$value->id}}" value="1">
												  			
												  		</div>
												  	<?php } ?>
												  		<?php
												  	if($value->room_request_status == 'pending'){
												  		/*if(!empty($cnts))
												  		{*/
												  	?>
												  	<!-- <div class="form-group " style="margin-top: 12px;clear: both;">
												  			<a href="javascript:;" data-id="<?php echo $value->id; ?>" class="cta save_room_req" style="width: 10%;">Save</a>
												  			<input type="hidden" name="accept_upgrade_{{$value->id}}" id="accept_upgrade_{{$value->id}}" value="">
												  			<input type="hidden" name="declined_upgrade_{{$value->id}}" id="declined_upgrade_{{$value->id}}" value="">
												  			<input type="hidden" name="room_request_status" id="room_request_status" value="">
												  		</div> -->
												  	
												  	<!-- <div class="ctas sk_ctas sk_actions1<?php echo $rowId; ?>" style="<?=!empty($cnts)?'display: none;':''?>">
				                                            
				                                            <a class="cta tourOverviewButton roomaction" data-id="<?php echo $rowId; ?>" data-type="accept" style="background: green;color: #fff;border-color: green;cursor: pointer;">Accept</a>
				                                            <a class="cta tourOverviewButton roomaction" data-id="<?php echo $rowId; ?>" style="background: red;color: #fff;border-color: red;cursor: pointer;" data-type="decline">Decline</a>
				                                        </div> -->
				                                        <?php /*}*/ ?>
			                                         <?php
				                                    }else{
				                                    	//'pending','approved','declined','self','cancelled'
				                                    	/*$type = 'Declined';
												        if($value->room_request_status == 'approved'){
												            $type = 'Accepted';
												        }else if($value->room_request_status == 'cancelled'){
												            $type = 'Cancelled';
												        
														}else if($value->room_request_status == 'declined'){
												            $type = 'Declined';
												        }*/
				                                    ?>
			                                        	<!-- <div class="form-group"><label class="graycls">Request <?php echo $type; ?></label></div> -->
			                                        	<?php
			                                        	if($value->room_request_status != 'cancel'){
			                                        		?>			
				                                        	<!-- <div class="form-group">
				                                        		<label class="graycls"><?php echo $value->room_init; ?></label>
				                                        		<p class="note_text"><?php echo $value->room_note; ?></p>
			                                        		</div> -->
			                                        		<?php
		                                        		}
		                                        		?>
			                                        <?php
				                                    }
				                                    ?>
				                                   

		                                    	</div>
										    </div>
										<!-- </form> -->
									</div>
									<?php
								}
							}
						?>

								</div>  
										
						  	</div>
					  	@endif
					</div>
					<div class="tab-content skalltabs sk_Additions" style="display: none;">
						@if ($sngLastAmt > 0)
						  	<div class="-tab-pane active" role="tabpanel">
								<div class="row">
										<?php 

										if(!empty($roomsSupplementsRequest)){
											$groupby = array();
											foreach ($roomsSupplementsRequest as $rrk => $rrvalue) {
												$groupby[$rrvalue['cart_experiences_to_rooms_id']][] = $rrvalue;
											}
											
										$i = 1;
										foreach ($groupby as $rsrkey => $rsrvalue) {
											$cart_experience_rooms = 


DB::connection('mysql_veenus')->table('cart_experiences_to_rooms')->where([['id', '=', $rsrkey]])->first();
											// echo "<pre>";
											// print_r($cart_experience_rooms);
											// echo "</pre>";
											$roomname = '';
											if(!empty($cart_experience_rooms)){
												switch ($cart_experience_rooms->room_id) {
												  case "1":
												    $roomname = 'Single Room';
												    break;
												  case "2":
												    $roomname = 'Double Room';
												    break;
												  case "3":
												    $roomname = 'Twin Room';
												    break;
												  case "4":
												    $roomname = 'Triple Room';
												    break;
												  case "5":
												    $roomname = 'Quadruple Room';
												    break;
												  default:
												    $roomname = "Single Room";
												}
											}
											$supplements = array();
											$str_add = '';
											foreach ($rsrvalue as $rrk => $rrvalue) {
												$hotel_dates_supplements = 


DB::connection('mysql_veenus')->table('hotel_dates_supplements')->where('hotel_dates_id', $hotel_dates->id)->where('supplements', $rrvalue['supplements'])->first();
												$pstr = '';
									  			 if(!empty($hotel_dates_supplements))
									  			 {
									  			 	 $hotel_dates_supplements->price_type = !empty($hotel_dates_supplements->price_type)?$hotel_dates_supplements->price_type:'pp';
		                                                    $hotel_dates_supplements->price_type  = ($hotel_dates_supplements->price_type == 'pppn')?'pp':$hotel_dates_supplements->price_type;
		                                                     $price_out_sup1 = ($cart_experience[0]->currency == 2)?$hotel_dates_supplements->price_euro_out:$hotel_dates_supplements->price_out;
		                                                    $pstr = !empty($price_out_sup1)?' ('.$currency_symbol.$price_out_sup1/*.' '.$hotel_dates_supplements->price_type*/.')':'';
									  			 }
												if($rrvalue['supplements'] == 1){
						      						$rrvalue['supplements'] = 'Water view (Sea/Lake/River)'.$pstr;
						      					}elseif($rrvalue['supplements'] == 2){
						      						$rrvalue['supplements'] = 'View (Garden/Balcony)'.$pstr;
						      					}elseif($rrvalue['supplements'] == 3){
						      						$rrvalue['supplements'] = 'Executive/De Luxe/Superior Rooms'.$pstr;
						      					}elseif($rrvalue['supplements'] == 4){
						      						$rrvalue['supplements'] = 'Dbl/tw room for sole'.$pstr;
						      					}elseif($rrvalue['supplements'] == 7){
						      						$rrvalue['supplements'] = 'Walk In Shower'.$pstr;
						      					}elseif($rrvalue['supplements'] == 8){
						      						$rrvalue['supplements'] = 'Ground Floor Room'.$pstr;
						      					}elseif($rrvalue['supplements'] == 5){
						      						$upgrade_name =  explode(',',$rrvalue['upgrade_name']);
							      						$upgrade_cost =  explode(',',$rrvalue['upgrade_cost']);
							      						$upgrade_cost_out =  explode(',',$rrvalue['upgrade_cost_out']);
							      						$upgrade_cost_type =  explode(',',$rrvalue['upgrade_cost_type']);

							      						if(!empty($upgrade_name))
							      						{
							      							$str_add = 'Others : ';
							      							foreach($upgrade_name as $key=>$row)
							      							{
							      								$upcost = !empty($upgrade_cost[$key])?$upgrade_cost[$key]:'';
							      								$upcostout = !empty($upgrade_cost_out[$key])?$upgrade_cost_out[$key]:'';
							      								$upcosttype = !empty($upgrade_cost_type[$key])?$upgrade_cost_type[$key]:'pp';
							      								$upcosttype = ($upcosttype == 'pppn')?'pp':$upcosttype;
							      								$str_add .= $row.' - In ('.$upcost.')'.'- Out ('.$upcostout.')'.' - '.$upcosttype.''.'';
							      							}
							      						}
						      						$rrvalue['supplements'] = rtrim($str_add);
						      					}
						      					$supplements[] = $rrvalue;
						      				}
										?>
										<div class="col-sm-12 mainSuperPanel" style=" padding: 0 50px; margin: 0 0 30px; ">								  		
										    <div class="roomHolder superRequest" style="display: block;">
										    	<h3>Upgrade Request #<?php echo $i++; ?> <span style="float: right;"><?php echo date('H:i d/m/Y',strtotime($rrvalue['created_at'])); ?></span></h3>
										  		<div class="form-group">
												    <label class="graycls">Room type</label>
											    	<?php echo $roomname;
											    	$cnts = 0;
														$declined = '0'; ?>
											    	
											    </div>
										    	<div class="form-group">
												    <label class="graycls">Supplements</label>
												    <?php if(!empty($supplements)){
												    	foreach($supplements as $srow)
												    	{	
												    		//pr($srow);
												    		if(!empty($cart_experience_rooms->id))
												    		{
												    			?>
												    			<div class="sk_actions<?php echo $cart_experience_rooms->id; ?>">  
													    			<div class="up-suppliment">
													    				<label class="supplement_title" style="">{{$srow['supplements']}}</label>
													    				 <div class="act-dec" style="">
																  	<?php
																  	if($srow['upgrade_request_sup_status'] == 'pending'){
																  		$cnts = 1;
																  	?>

																	  	<div class="ctas sk_ctas">
																	  		<a class=" _tourOverviewButton select-res act-up" data-id="{{$srow['id']}}" data-rid="{{$cart_experience_rooms->id}}" style="color: green;font-weight: bold;margin-right: 5px;cursor: pointer" data-type="accept" data-id="accept">Accept</a>
								                                            <a class=" _tourOverviewButton select-res dct-up" data-id="{{$srow['id']}}" data-rid="{{$cart_experience_rooms->id}}" data-type="decline" style="color: red;font-weight: bold;cursor: pointer">Decline</a>
								                                            
								                                        </div>
							                                        <?php
								                                    }else{
								                                    	//'pending','approved','declined'
								                                    	$type = 'Pending';
																        if($srow['upgrade_request_sup_status'] == 'accepted'){
																            $type = '<label class="text-success">Accepted</label>';
																        }else if($srow['upgrade_request_sup_status'] == 'declined'){
																        	$declined = '1';
																            $type = '<label class="text-danger">Declined</label>';
																        }
								                                    ?>
							                                        	<div class="form-group"><label class="graycls"><?php echo $type; ?></label></div>
							                                        	
							                                        <?php
								                                    }
								                                    ?>
								                                	</div>
								                                	</div>
						                                    	</div>
												    			<?php
												    		}
												    		
												    	}
												    } ?>
												    <?php 
											      		//echo implode(', ', $supplements);
									      		 	?>
									      		 	
										  		</div>
										  		<?php $dd = !empty($cnts)?'display:none;':'display:none;';?>
										  		<div class="form-group declined_reason_div_<?php echo !empty($cart_experience_rooms->id)?$cart_experience_rooms->id:''; ?>" style="<?=$dd?>">
														    <label class="graycls">Declined Reason</label>
											    	<textarea name="declined_reason" class="form-control initialcls <?=!empty($declined)?'is_declined':''?> declined_reason_<?php echo !empty($cart_experience_rooms->id)?$cart_experience_rooms->id:''; ?>" >{{!empty($cart_experience_rooms->declined_reason)?$cart_experience_rooms->declined_reason:''}}</textarea>
											    	<span style="color:red;font-weight: bold;" class="declined_reason_error_<?php echo !empty($cart_experience_rooms->id)?$cart_experience_rooms->id:''; ?>"></span>
											    </div>
										  		<?php 	if(empty($cnts))
												  		{ 
												  		 if(!empty($declined)){ ?>
												  		<div class="form-group ">
												  			 <label class="graycls">Declined Reason</label>
													  		<p class="note_text">{{$cart_experience_rooms->declined_reason}}</p>
													  		
													  	</div>
													  	<?php } ?>
										  		<div class="form-group marginBottom0">
												    <label class="graycls">Additional Comments</label>
												    <?php 
											      		echo $rrvalue['comments'];
									      		 	?>
										  		</div>
										  		<div class="form-group marginBottom0">
												    <label class="graycls">Initials</label>
												    <?php 
											      		echo $rrvalue['initials'];
									      		 	?>
										  		</div>
										    	
										  		<?php } ?>
										  		<div class="form-group marginBottom0">
											  		
											  	</div>
											  	
		                                    	<?php  if(!empty($cart_experience_rooms->upgrade_request_status) && $cart_experience_rooms->upgrade_request_status == 'pending'){ ?>
		                                    	<div class="form-group marginBottom0">
												    <label class="graycls">Additional Comments</label>
												    <?php 
											      		echo $rrvalue['comments'];
									      		 	?>
										  		</div>
										  		<div class="form-group marginBottom0">
												    <label class="graycls">Initials</label>
												    <?php 
											      		echo $rrvalue['initials'];
									      		 	?>
										  		</div>
										  		<?php } ?>
										  		<?php 	if(!empty($cnts))
												  		{ ?>
										  		<div class="form-group marginBottom0" style="margin-top: 12px;clear: both;">
										  			<a href="javascript:;" data-id="<?php echo !empty($cart_experience_rooms->id)?$cart_experience_rooms->id:''; ?>" class="cta save_upgrade" style="width: 10%;">Save</a>
										  			<input type="hidden" name="accept_upgrade" id="accept_upgrade_<?php echo !empty($cart_experience_rooms->id)?$cart_experience_rooms->id:''; ?>" value="">
										  			<input type="hidden" name="declined_upgrade" id="declined_upgrade_<?php echo !empty($cart_experience_rooms->id)?$cart_experience_rooms->id:''; ?>" value="">
										  			<input type="hidden" name="upgrade_request_status" id="upgrade_request_status_<?php echo !empty($cart_experience_rooms->id)?$cart_experience_rooms->id:''; ?>" value="">
										  			<input type="hidden" name="all_done" id="all_done_{{$cart_experience_rooms->id}}" value="1">
										  		</div>
										  		<?php } ?>
										    </div>
										</div>
										<?php
										}
									}
									?>
								</div>
						  	</div>
					  	@endif

					</div>


					<div class="tab-content skalltabs sk_swaps" style="display: none;">
						@if ($sngLastAmt > 0)
						  	<div class="-tab-pane active" id="swapRequest" role="tabpanel">
								<div class="row">
						<?php
						if($cartExperiencesToRoomsSwap->count()>0){
							$arr = array();
							  	foreach ($cartExperiencesToRoomsSwap as $key => $value) {
							  		if(!empty($value->swap_request_from)){
							  			foreach ($cartExperiencesToRoomsSwap as $k => $val) {
							  				if($val->id == $value->swap_request_from){
							  					$arr[$value->swap_request_from][] = $value;
									  			$arr[$value->swap_request_from][] = $val;
							  				}
								  		}
								  	}
							  	}
							$s =1;
							  	foreach ($arr as $key => $value) {
							  		
							  		switch ($value[0]->room_id) {
									  case "1":
									    $roomname = 'Single Room';
									    break;
									  case "2":
									    $roomname = 'Double Room';
									    break;
									  case "3":
									    $roomname = 'Twin Room';
									    break;
									  case "4":
									    $roomname = 'Triple Room';
									    break;
									  case "5":
									    $roomname = 'Quadruple Room';
									    break;
									  default:
									    $roomname = "Single Room";
									}	

								  	$rowId = $value[0]->id;
							  	 ?>	
									<div class="col-sm-12 mainSuperPanel" style=" padding: 0 50px; margin: 0 0 30px; ">
										    <div class="roomHolder superRequest" id="roomHolder1" style="display: block;">
										    	<h3>Room Swap Request #<?php echo $s++; ?> <span style="float: right;"><?php echo date('H:i d/m/Y',strtotime($value[0]->date)); ?></span></h3>
										    	<br>
										  		<b style="margin-bottom: 10px;">
													I want to swap:
												</b>
												<br />
												<div class="ttlHolder" style="margin-bottom:10px;margin-top: 10px;">
												  	<div>
												  		Room type
												  	</div>
												  	<div>
												  		Name
												  	</div>
												  	<div>
												  		Room request 
												  	</div>
												  	<div>
												  		Note for the hotel												  	</div>
											  	</div>
											  	<div class="filterElement ">

												   <div class="roomLine" data-id="{{$rowId}}" style="padding: 20px 0;color: #000;">
													  	<div class="check">
													  		{{$roomname}}
													  	</div>
													  	<div class="element">
													  		{{$value[0]->names}}
													  	</div>
													  	<div class="element">
													  		{{$value[0]->room_requests}}
													  	</div>
													  	<div class="element">
													  		{{$value[0]->specials}}
													  	</div>				  
													</div>
												</div>
												<br>
												<?php
												switch ($value[1]->room_id) {
												  case "1":
												    $roomname = 'Single Room';
												    break;
												  case "2":
												    $roomname = 'Double Room';
												    break;
												  case "3":
												    $roomname = 'Twin Room';
												    break;
												  case "4":
												    $roomname = 'Triple Room';
												    break;
												  case "5":
												    $roomname = 'Quadruple Room';
												    break;
												  default:
												    $roomname = "Single Room";
												}	

											  	$rowId = $value[1]->id;
												?>
										  		<b style="margin-bottom: 10px;">
													For
												</b>
												<br />
												<div class="ttlHolder" style="margin-bottom:10px;margin-top: 10px;">
												  	<div>
												  		Room type
												  	</div>
												  	<div>
												  		Name
												  	</div>
												  	<div>
												  		Room request 
												  	</div>
												  	<div>
												  		Note for the hotel												  	</div>
											  	</div>
											  	<div class="filterElement ">

												   <div class="roomLine" data-id="{{$rowId}}" style="padding: 20px 0;color: #000;">
													  	<div class="check">
													  		{{$roomname}}
													  	</div>
													  	<div class="element">
													  		{{$value[1]->names}}
													  	</div>
													  	<div class="element">
													  		{{$value[1]->room_requests}}
													  	</div>
													  	<div class="element">
													  		{{$value[1]->specials}}
													  	</div>				  
													</div>
												</div>
												<br>
											  	<div class="sk_actions<?php echo $rowId; ?>">    
												  	<?php if($value[1]->swap_request_status == '' || $value[1]->swap_request_status == null){ ?>
													  	<div class="form-group">
														    <label class="graycls">Initials</label>
													    	<input name="room_init" maxlength="50" class="form-control sroom_init_<?php echo $rowId; ?>" style="width: 100px" value="">
													    </div>
												    			    	
												    	<div class="form-group ">
														    <label class="graycls">Add a tour note</label>
												    		<textarea name="room_note" class="form-control sroom_note_<?php echo $rowId; ?>" maxlength="255" rows="3"></textarea>
												    		<input type="hidden" class="room_id_<?php echo $rowId; ?>" value="{{$roomname}}">
												  		</div>
												  		<div class="ctas sk_ctas">
				                                            <a class="cta tourOverviewButton swapaction" data-id="<?php echo $rowId; ?>" data-type="decline">Decline</a>
				                                            <a class="cta tourOverviewButton swapaction" data-id="<?php echo $rowId; ?>" data-type="accept">Accept</a>
				                                        </div>
			                                        <?php
			                                    	}else{
			                                        	$type = 'Declined';
												        if($value[1]->swap_request_status == 'approved'){
												            $type = 'Accepted';
												        }
			                                        ?>
				                                        <div class="form-group"><label class="graycls">Request <?php echo $type; ?></label></div>
			                                        	<?php
			                                        	if($value[1]->swap_request_status == 'approved'){
			                                        		?>			
				                                        	<div class="form-group">
				                                        		<label class="graycls"><?php echo $value[1]->swap_init; ?></label>
				                                        		<p><?php echo $value[1]->swap_note; ?></p>
			                                        		</div>
			                                        		<?php
		                                        		}
		                                        	}
		                                        		?>
		                                    	</div>
										    </div>
									</div>
									<?php
								}
							}
						?>

								</div>  
										
						  	</div>
					  	@endif
					</div>

					<div class="tab-content skalltabs sk_cancellations" style="display: none;">
						@if ($sngLastAmt > 0)
						  	<div class="-tab-pane active" id="cancelRequest" role="tabpanel" style="border: 1px solid;
    margin: 28px;">
    						<h3  style="padding: 5px 38px;margin: 0 0 15px;color: #212529;">Cancel Requests</h3>
						  		<div class="row">
						  			<div class="col-sm-3" style=" padding: 0 50px; margin: 0 0 30px; ">
							  	 		<a data-fancybox data-type="ajax" data-src="" href="{{ route('cancel-rooms', $cart_experience[0]->id) }}" class="cta">
			                                Request Room Cancellation
			                            </a>
							  	 	</div>
						  		</div>
								<div class="row">
						<?php
						if($cartExperiencesToRoomsCancellation->count()>0){
							
							$s =1;
							  	foreach ($cartExperiencesToRoomsCancellation as $key => $value) {
							  		
							  		switch ($value->room_id) {
									  case "1":
									    $roomname = 'Single Room';
									    break;
									  case "2":
									    $roomname = 'Double Room';
									    break;
									  case "3":
									    $roomname = 'Twin Room';
									    break;
									  case "4":
									    $roomname = 'Triple Room';
									    break;
									  case "5":
									    $roomname = 'Quadruple Room';
									    break;
									  default:
									    $roomname = "Single Room";
									}	

								  	$rowId = $value->id;
								  	if($value->cancellation_request_status == 'declined' || $value->cancellation_request_status == 'approved'){
								  		continue;
								  	}
							  	 ?>	
									<div class="col-sm-12 mainSuperPanel testing" style=" padding: 0 50px; margin: 0 0 30px; ">
										    <div class="roomHolder superRequest" id="roomHolder1" style="display: block;">
										    	<h3>Cancellation Request #<?php echo $s++; ?> <span style="float: right;"><?php echo date('H:i d/m/Y',strtotime($value->date)); ?></span></h3>
										    	
												<br />
												<div class="ttlHolder" style="margin-bottom:10px;margin-top: 10px;">
												  	<div>
												  		Room type
												  	</div>
												  	<div>
												  		Name
												  	</div>
												  	<div>
												  		Room request 
												  	</div>
												  	<div>
												  		Note for the hotel												  	</div>
											  	</div>
											  	<div class="filterElement ">

												   <div class="roomLine" data-id="{{$rowId}}" style="padding: 20px 0;color: #000;">
													  	<div class="check">
													  		{{$roomname}}
													  	</div>
													  	<div class="element">
													  		{{$value->names}}
													  	</div>
													  	<div class="element">
													  		{{$value->room_requests}}
													  	</div>
													  	<div class="element">
													  		{{$value->cancellation_note}}
													  	</div>				  
													</div>
												</div>
												
												<br>
											  	<div class="sk_actions<?php echo $rowId; ?> initialdiv">    
												  	<?php if($value->cancellation_request_status == '' || $value->cancellation_request_status == null){ ?>
													  	<div class="form-group">
														    <label class="graycls initials-sk">Initials</label>
													    	<input name="room_init" maxlength="50" class="form-control initialcls croom_init_<?php echo $rowId; ?>" style="width: 100px" value="">
													    </div>
												    			    	
												    	<div class="form-group tour-sk">
														    <label class="graycls">Add a tour note</label>
												    		<textarea name="room_note" class="form-control croom_note_<?php echo $rowId; ?>" maxlength="255" rows="3">{{$value->cancellation_note}}</textarea>
												    		<input type="hidden" class="room_id_<?php echo $rowId; ?>" value="{{$roomname}}">
												  		</div>
												  		<div class="ctas sk_ctas">
				                                            <a class="cta tourOverviewButton canaction" data-id="<?php echo $rowId; ?>" data-type="decline"  style="background: #14213D;color: #fff;border-color: #14213D;">Decline</a>
				                                            <a class="cta tourOverviewButton canaction" data-id="<?php echo $rowId; ?>" data-type="accept">Accept</a>
				                                        </div>
			                                        <?php
			                                    	}else{
			                                        	$type = 'Declined';
												        if($value->cancellation_request_status == 'approved'){
												            $type = 'Accepted';
												        }else if($value->cancellation_request_status == 'declined'){
			                                        ?>
				                                        <div class="form-group"><label class="graycls">Request <?php echo $type; ?></label></div>
			                                        	<?php
			                                        	
			                                        		?>			
				                                        	<div class="form-group">
				                                        		<label class="graycls"><?php echo $value->cancellation_init; ?></label>
				                                        		<p><?php echo $value->cancellation_note; ?></p>
			                                        		</div>
			                                        		<?php
		                                        		}
		                                        	}
		                                        		?>
		                                    	</div>
										    </div>
									</div>
									<?php
								}
							}
						?>

								</div>  
										
						  	</div>
					  	@endif
					</div>
					<div class="tab-content skalltabs sk_enquiries" style="display: none;">
						<div class="row">
							<div class="col-md-2">
								<a data-fancybox data-type="ajax" data-src="" href="{{ route('general-enquiry', $cart_experience[0]->id) }}" class="cta">
                                Add General Enquiry
                            </a>
							</div>
						</div>
						
						<table class="table mt-5">
							<tr>
								<th>Collaborator</th>
								<th>Subject</th>
								<th>Message</th>
								<th>Date</th>
								<th>Resolve</th>
							</tr>
							<?php 
							$enquiries = 


DB::connection('mysql_veenus')->table('general_enquiries')->where('cart_experience_id', $cart_experience[0]->id)->get()->toArray();
							if(!empty($enquiries)){
								foreach ($enquiries as $ekey => $evalue) {
									$user = 


DB::connection('mysql_veenus')->table('users')->where('id', $evalue->user_id)->first();
									?>
									<tr>
										<td><?php echo $user->name; ?></td>
										<td><?php echo $evalue->subject; ?></td>
										<td><?php echo $evalue->message; ?></td>
										<td><?php echo date('d-m-Y',strtotime($evalue->created_at))?></td>
										<td><?php if(empty($evalue->is_resolved)){?><input class="btn btn-primary solved_general" data-id="{{$evalue->id}}" type="button" value="Resolve"> <?php } else { echo "Solved"; } ?></td>
									</tr>
									<?php
								}
							}else{
								echo '<tr><td colspan="3">Not found!</td></tr>';
							}
							?>
							
						</table>
					</div>

            		<form method="post" action="{{ route('colaborator-add-main-rooms') }}" id="dataUpdateNumberHolder" class=" skalltabs sk_Rooms">
						<input type="hidden" value="{{$cart_experience[0]->id}}" id="current_cart_id" name="cart_id" class="cartIdSCls">
						@hasrole('Collaborator')
						<input type="hidden" value="Collaborator" id="current_role" name="current_role" class="current_role">
						@else
						<input type="hidden" value="" id="current_role" name="current_role" class="current_role">
						@endhasrole
						<!-- Tab panes -->
						<div class="tab-content">
							@if ($sngLastAmt > 0)
							  	<div class="tab-pane {{(!empty($LastAddedRequest) && $LastAddedRequest->room_id == 1)?'active':(empty($LastAddedRequest)?'active':'')}}" id="SignleRooms" role="tabpanel">
									<div class="row">
										<div class="col-sm-12">
											@hasrole('Collaborator')
												<?php
												//$cart_experience[0]->date_from = '2022-12-30';
												$today = strtotime("today");
												$minusDays = strtotime('-28 days',strtotime($cart_experience[0]->date_from));
												if($today >= $minusDays){
													//echo '<table class="table table-disaled" style="pointer-events: none;">';
													echo '<table class="table">';
												}else{
													echo '<table class="table">';
												}
												?>
									  		
                    						@else
									  		<table class="table table-disaled" style="pointer-events: none;">
									  		<!-- <table class="table" > -->
								  			@endhasrole
											  <thead>
											    <tr>
											      <th scope="col">@hasrole('Collaborator')Mark as paid @else Guest status confirmation @endhasrole </th>
											      <th scope="col">Name</th>
											      <th scope="col">@hasrole('Collaborator')Room request @else Room request @endhasrole </th>
											      <th scope="col">@hasrole('Collaborator')Note for the hotel @else Note for the hotel @endhasrole </th> 
											      <th scope="col">&nbsp;</th>
											    </tr>
											  </thead>
											  <tbody class="tblBorderCls">
											  	<?php 
											  	$sngCnt = 1;
											  	foreach ($cartExperiencesToRooms as $key => $value) {
											  		if($value->room_id == '1' && empty($value->is_optional_room)){
											  		$ceTrR = [];
												  	foreach ($value->cartExperiencesToRoomsRequests as $keyCRR => $valueCRR) {
											  			$ceTrR[] = $valueCRR->room_requests_id;
												  	}
												  	if(($value->status == -1) && ($value->cancellation_request_status == 'approved')){
												  		continue;
												  	}
												  	if(($value->room_request_status == 'cancelled')){ 
												  		continue;
												  	}	
											  	 ?>
											  	 @hasrole('Collaborator')
											  	 <?php
													
													$today = strtotime("today");
													$minusDays = strtotime('-28 days',strtotime($cart_experience[0]->date_from));
													if($today >= $minusDays){
														if(!empty($value->is_optional_room)){
																
																echo '<tr>';
																}else{
																		echo '<tr class="table table-disaled" >';
																}
													}else{
														echo '<tr>';
													}
													?>
											  		@else
											  		<tr class="table table-disaled" style="pointer-events: none;">
										  			@endhasrole
												      	<td scope="row" style="text-align:center;">
												      		<?php
												      		if(($value->status == -1) && ($value->cancellation_request_status == null)){
												      			echo '<label>Pending cancellation</label>';
												      		}else{
															?>
															<?php if(!empty($value->is_optional_room)){
																?>
																<small class="sk_success"><b>Status: Room on Option</b></small>
																<?php
															} ?>
															
													      	<div class="checkarea_part_Dates">
									                            <!-- <label class="checkbox_div">
									                              <input type="checkbox" class="custom_chkbox tagchkbox notClickedCls sk_con" value="1" name="roomPaidEdit[1][{{$value->id}}]" <?php echo $value->cancellation_request_status ; echo $value->status == '1'?'checked': ''?>> <span class="<?php echo $value->cancellation_request_status ;?>"></span>
									                              <span class="checkmark"></span>
									                              <span class="sk_label">Provisional</span>
									                            </label> -->

									                            <label class="checkbox_div">
									                              <input type="checkbox" class="custom_chkbox tagchkbox notClickedCls sk_dep" value="1" name="roomDepositEdit[1][{{$value->id}}]" <?php echo $value->deposit == '1'?'checked': ''?>> <span class="notClickedCls"></span>
									                              <span class="checkmark"></span>
									                              <span class="sk_label">Deposit Paid</span>
									                            </label>

									                            <label class="checkbox_div">
									                              <input type="checkbox" class="custom_chkbox tagchkbox notClickedCls sk_paid" value="1" name="roomPaidFullEdit[1][{{$value->id}}]" <?php echo $value->paid == '1'?'checked': ''?>> <span class="notClickedCls"></span>
									                              <span class="checkmark"></span>
									                              <span class="sk_label">Paid in full</span>
									                            </label>
									                        </div>
									                    	<?php } ?>
												      	</td>
												      	<td>
															<input type="text" class="form-control" placeholder="Enter name" name="singleRoomNameEdit[1][{{$value->id}}]" value="{{$value->names}}">
												      	</td>
												      	<?php
														$today = strtotime("today");
														$minusDaysUp = strtotime('-14 days',strtotime($cart_experience[0]->date_from));
														if($today >= $minusDaysUp){
															echo '<td class="sadasd table-disaled">';
														}else{
															echo '<td class="sadasd">';
														}
														?>
												      	
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
												      					if($rsvalue['supplements'] == 1){
														      						$rsvalue['supplements'] = 'Water view (Sea/Lake/River) : '.$rsvalue['upgrade_request_sup_status'];
														      					}elseif($rsvalue['supplements'] == 2){
														      						$rsvalue['supplements'] = 'View (Garden/Balcony) : '.$rsvalue['upgrade_request_sup_status'];
														      					}elseif($rsvalue['supplements'] == 3){
														      						$rsvalue['supplements'] = 'Executive/De Luxe/Superior Rooms : '.$rsvalue['upgrade_request_sup_status'];
														      					}elseif($rsvalue['supplements'] == 4){
														      						$rsvalue['supplements'] = 'Dbl/tw room for sole : '.$rsvalue['upgrade_request_sup_status'];
														      					}elseif($rsvalue['supplements'] == 7){
														      						$rsvalue['supplements'] = 'Walk In Shower : '.$rsvalue['upgrade_request_sup_status'];
														      					}elseif($rsvalue['supplements'] == 8){
														      						$rsvalue['supplements'] = 'Ground Floor Room : '.$rsvalue['upgrade_request_sup_status'];
														      					}elseif($rsvalue['supplements'] == 5){
												      						$rsvalue['supplements'] = $rsvalue['upgrade_name'].' : '.$rsvalue['upgrade_request_sup_status'];
												      					}
												      					$supplements[] = $rsvalue['supplements'];
												      				}
												      			}
												      		}
												      		if(!empty($supplements)){
												      			echo implode('<br>', $supplements);
												      			if(!empty($value->upgrade_request_status)){
														      			if(empty($pen_can)){ ?>
														      			<br><a data-fancybox data-type="ajax" data-src="" href="/request-supplements/{{$value->id}}/{{$HotelDatesID}}/{{$cart_experience[0]->id}}"  style="color: #FCA311;font-size: 14px;">Add</a>
														      				<?php } } 
												      		}else{
												      		?>
													      		<i>No requests made</i>
													      	<?php } ?>
													      	@hasrole('Collaborator')
													      	<?php if(!empty($value->upgrade_request_status)){
													      	if(!empty($pen_can)){ ?>
													      		<br><i>Upgrade Request <?php echo ucwords($value->upgrade_request_status); ?></i>
													      		<br><a class="cancelUpgrade" href="javascript:;" data-src="{{ route('request-supplements-cancel', $value->id) }}/?hotel_dates_id=<?php echo $HotelDatesID; ?>&cart_id=<?php echo $cart_experience[0]->id; ?>" style="color: #FCA311;font-size: 14px;">Cancel Upgrade</a>
												      		<?php } }else{ ?>
												      			<br><a data-fancybox data-type="ajax" data-src="" href="/request-supplements/{{$value->id}}/{{$HotelDatesID}}/{{$cart_experience[0]->id}}"  style="color: #FCA311;font-size: 14px;" class="up-request">Request</a>
												      		<?php } ?>
															 @else
																<?php if(!empty($value->upgrade_request_status)){
																if(!empty($pen_can)){  ?>
													      		<!-- <br><i>Upgrade Request <?php echo ucwords($value->upgrade_request_status); ?></i> -->
													      		<br><a class="cancelUpgrade" href="javascript:;" data-src="{{ route('request-supplements-cancel', $value->id) }}/?hotel_dates_id=<?php echo $HotelDatesID; ?>&cart_id=<?php echo $cart_experience[0]->id; ?>" style="color: #FCA311;font-size: 14px;">Cancel Upgrade</a>

												      		<?php } }else{ ?>
												      			<br><a data-fancybox data-type="ajax" data-src="" href="/request-supplements/{{$value->id}}/{{$HotelDatesID}}/{{$cart_experience[0]->id}}"  style="color: #FCA311;font-size: 14px;">Add</a>
												      		<?php } ?> 
												      		@endhasrole
												      		<!-- <select name="roomRequestsEdit[1][{{$value->id}}][]" class="selectCls" multiple="">
												      			<option value="0">None</option>
													      		<?php foreach ($roomRequests as $keyrm => $valuerm) {
													      			$selected = '';
													      			if (in_array($valuerm->id, $ceTrR)){
													      				$selected = 'selected';
													      			}
													      		 ?>
													      			<option value="{{ $valuerm->id }}" {{$selected}}>{{ $valuerm->name }}</option>
													      		<?php } ?>
												      		</select> -->
												      	</td>
												      	<td>
															<textarea class="form-control"  placeholder="Enter Note for the hotel" name="specialRequestsEdit[1][{{$value->id}}]">{{$value->specials}}</textarea>
												      	</td>
												      	<td>
												      		@hasrole('Collaborator')

												      		@else
													      		@if(!empty($value->deposit) || !empty($value->paid) || !empty($value->names))
													      		@else
														      		@if(empty($supplements))
														      			<a class="removeRoomsCls removeRoomsIconCls btn" data-id="{{$value->id}}"><i class="fas fa-trash-alt"></i></a>
														      		@endif
													      		@endif
												      		@endhasrole
												      	</td>
												    </tr>
											  	<?php 
											  		$sngCnt++;
											  		}
											  	}
											  	for ($i=1; $i <= $sgl-$sngCnt+1; $i++) { ?>
												   <!--  <tr>
												      	<td scope="row">
													      	<div class="checkarea_part_Dates marginLetf40">
									                            <label class="checkbox_div">
									                              <input type="checkbox" class="custom_chkbox tagchkbox notClickedCls " value="1" name="roomPaid[1][{{$i}}]"> <span class="notClickedCls"></span>
									                              <span class="checkmark"></span>
									                            </label>
									                        </div>
												      	</td>
												      	<td>
															<input type="text" class="form-control" placeholder="Enter name" name="singleRoomName[1][{{$i}}]">
												      	</td>
												      	<td>
												      		<select name="roomRequests[1][{{$i}}][]" class="selectCls" multiple="">
												      			<option value="0">None</option>
													      		<?php foreach ($roomRequests as $keyrm => $valuerm) { ?>
													      			<option value="{{ $valuerm->id }}">{{ $valuerm->name }}</option>
													      		<?php } ?>
												      		</select>
												      	</td>
												      	<td>
															<input type="text" class="form-control" placeholder="Enter Note for the hotel" name="specialRequests[1][{{$i}}]">
												      	</td>
												      	{{-- <td><a class="removeRoomsAddCls removeRoomsIconCls btn"><i class="fas fa-trash-alt"></i></a></td> --}}
												      	<td>&nbsp;</td>
												    </tr> -->
											  	<?php } 
										  		?>
										  		<?php
											  	if($cartExperiencesToRoomsRequest->count()>0){
												  	foreach ($cartExperiencesToRoomsRequest as $key => $value) {
												  		if($value->room_id == '1'){
												  		$ceTrR = [];
													  	foreach ($value->cartExperiencesToRoomsRequests as $keyCRR => $valueCRR) {
												  			$ceTrR[] = $valueCRR->room_requests_id;
													  	}
													  	if(($value->status == -1) && ($value->cancellation_request_status == 'approved')){
													  		continue;
													  	}
													  	if(($value->room_request_status == 'cancelled')){ 
													  		continue;
													  	}
												  	 ?>
													 <?php if($value->room_request_status != 'declined' ) { ?>
												  		 @hasrole('Collaborator')
													  	 <?php
															
															$today = strtotime("today");
															$minusDays = strtotime('-28 days',strtotime($cart_experience[0]->date_from));
															if($today >= $minusDays){
																if(!empty($value->is_optional_room)){
																		
																		echo '<tr>';
																		}else{
																				echo '<tr class="table table-disaled" >';
																		}
															}else{
																echo '<tr>';
															}
															?>
													  		@else
													  		<tr class="table table-disaled" style="pointer-events: none;">
												  			@endhasrole
													      	<td scope="row">
														      	<div class="checkarea_part_Dates " style="flex-wrap:wrap; height:67px;">
														      		<?php
														      		if(($value->status == -1) && ($value->cancellation_request_status == null)){
														      			//echo '<label>Pending cancellation</label>';
														      			?>
														      			<div class="sk_status_change_{{$value->id}}">
												      						<p class="sk_pending"><b> Status: Pending cancellation </b></p>
												      						
																			<label>Cancellation request pending...</label>
																			<a href="javascript:;" class="sk_cancel_btn" style="color:red;" data-id="{{$value->id}}" data-type="declined"><p>Cancel request</p></a>
																		</div>
														      			<?php
														      		}elseif($value->room_request_status == 'approved'){
																	?>
																		<small class="sk_success"><b>Status: Requested Additional Room</b></small>
																		<div class="checkarea_part_Dates">
																			
																			<label class="checkbox_div">
																			  <input type="checkbox" class="custom_chkbox tagchkbox notClickedCls sk_dep" value="1" name="roomDepositEdit[1][{{$value->id}}]" <?php echo $value->deposit == '1'?'checked': ''?>> <span class="notClickedCls"></span>
																			  <span class="checkmark"></span>
																			  <span class="sk_label">Deposit Paid</span>
																			</label>

																			<label class="checkbox_div">
																			  <input type="checkbox" class="custom_chkbox tagchkbox notClickedCls sk_paid" value="1" name="roomPaidFullEdit[1][{{$value->id}}]" <?php echo $value->paid == '1'?'checked': ''?>> <span class="notClickedCls"></span>
																			  <span class="checkmark"></span>
																			  <span class="sk_label">Paid in full</span>
																			</label>
																		</div>
																
																	<?php
													      			}else if($value->room_request_status == 'pending'){
												      					?>
												      					<div class="sk_status_change_{{$value->id}}">
												      						<p class="sk_pending"><b> Status: Pending </b></p>
												      						
																			<label>Room request pending...</label>
																			<a href="javascript:;" class="sk_cancel_btn" style="color:red;" data-id="{{$value->id}}" data-type="cancel"><p>Cancel request</p></a>
																		</div>
												      					<?php
													      			//}else if($value->room_request_status == 'declined'){
												      					?>  
												      						<!--<small class="sk_pending">Status: Declined</small>
																			<label>Single room request declined...</label>-->

												      					<?php
													      			}else if($value->room_request_status == 'cancelled'){
													      				?>
												      					<small class="sk_pending">Status: Cancelled</small>
													      				<?php
													      			}
													      			?>	
										                        </div>
													      	</td>
															
															<td>
																<?php //if($value->room_request_status == 'approved' ) { ?>
																<input type="text" class="form-control" placeholder="Enter name" name="singleRoomNameEdit[1][{{$value->id}}]" value="{{$value->names}}">
																<?php //} else{
																	
																//}?>
															</td>
															
													     
															
													      	<td class="suppliment" >
													      		
																<?php /*if(!empty($value->upgrade_request_status)){*/ ?>
																	<?php 
																	$pen_can = 0;
														      		$supplements = array();
														      		if(!empty($roomsSupplementsRequest)){ 
														      			foreach ($roomsSupplementsRequest as $rskey => $rsvalue) {
														      				
														      				if($rsvalue['cart_experiences_to_rooms_id'] == $value->id){
														      					if($rsvalue['upgrade_request_sup_status'] == 'pending')
														      					{
														      						$pen_can = 1;
														      					}
														      					if($rsvalue['supplements'] == 1){
														      						$rsvalue['supplements'] = 'Water view (Sea/Lake/River) : '.$rsvalue['upgrade_request_sup_status'];
														      					}elseif($rsvalue['supplements'] == 2){
														      						$rsvalue['supplements'] = 'View (Garden/Balcony) : '.$rsvalue['upgrade_request_sup_status'];
														      					}elseif($rsvalue['supplements'] == 3){
														      						$rsvalue['supplements'] = 'Executive/De Luxe/Superior Rooms : '.$rsvalue['upgrade_request_sup_status'];
														      					}elseif($rsvalue['supplements'] == 4){
														      						$rsvalue['supplements'] = 'Dbl/tw room for sole : '.$rsvalue['upgrade_request_sup_status'];
														      					}elseif($rsvalue['supplements'] == 7){
														      						$rsvalue['supplements'] = 'Walk In Shower : '.$rsvalue['upgrade_request_sup_status'];
														      					}elseif($rsvalue['supplements'] == 8){
														      						$rsvalue['supplements'] = 'Ground Floor Room : '.$rsvalue['upgrade_request_sup_status'];
														      					}elseif($rsvalue['supplements'] == 5){
												      						$rsvalue['supplements'] = $rsvalue['upgrade_name'].' : '.$rsvalue['upgrade_request_sup_status'];
												      					}
												      					$supplements[] = $rsvalue['supplements'];
														      				}
														      			}
														      		}
														      		$room_type_supplements = array();

																  	foreach ($value->cartExperiencesToRoomsRequests as $keyCRR => $valueCRR) {

															  			if($valueCRR['room_requests_id'] == 1){
														      						$valueCRR['supplements'] = 'Water view (Sea/Lake/River)';
														      					}elseif($valueCRR['room_requests_id'] == 2){
														      						$valueCRR['supplements'] = 'View (Garden/Balcony)';
														      					}elseif($valueCRR['room_requests_id'] == 3){
														      						$valueCRR['supplements'] = 'Executive/De Luxe/Superior Rooms';
														      					}elseif($valueCRR['room_requests_id'] == 4){
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
														      		if(!empty($supplements)){
														      			echo implode('<br>', $supplements);
														      			echo '<br>';
														      			?>
														      			<?php if(!empty($value->upgrade_request_status)){
														      			if(empty($pen_can)){ ?>
														      			<br><a data-fancybox data-type="ajax" data-src="" href="/request-supplements/{{$value->id}}/{{$HotelDatesID}}/{{$cart_experience[0]->id}}"  style="color: #FCA311;font-size: 14px;">Add</a>
														      				<?php } } ?>
														      			<?php
														      		}else{
														      			if(empty($room_type_supplements)){
														      		?>
															      		<i>No requests made</i>
															      	<?php } } ?>
													      		
													      		<?php /*}else{ */?>
													      			
													      			
															      		 <?php

															      		 
															      		  ?>
															      		  <?php 
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

														      	<?php /*}*/ ?>
														      	@hasrole('Collaborator')
														      	<?php if(!empty($value->upgrade_request_status)){
														      	if(!empty($pen_can)){ ?>
														      		<br><i>Upgrade Request <?php echo ucwords($value->upgrade_request_status); ?></i>
														      		<br><a class="cancelUpgrade" href="javascript:;" data-src="{{ route('request-supplements-cancel', $value->id) }}/?hotel_dates_id=<?php echo $HotelDatesID; ?>&cart_id=<?php echo $cart_experience[0]->id; ?>" style="color: #FCA311;font-size: 14px;">Cancel Upgrade</a><br>
													      		<?php } }else{ ?>
													      			<br><a data-fancybox data-type="ajax" data-src="" href="/request-supplements/{{$value->id}}/{{$HotelDatesID}}/{{$cart_experience[0]->id}}"  style="color: #FCA311;font-size: 14px;" class="up-request">Request</a><br>
													      		<?php } ?>
																 @else
																	<?php if(!empty($value->upgrade_request_status)){
																	if(!empty($pen_can)){  ?>
														      		<!-- <br><i>Upgrade Request <?php echo ucwords($value->upgrade_request_status); ?></i> -->
														      		<br><a class="cancelUpgrade" href="javascript:;" data-src="{{ route('request-supplements-cancel', $value->id) }}/?hotel_dates_id=<?php echo $HotelDatesID; ?>&cart_id=<?php echo $cart_experience[0]->id; ?>" style="color: #FCA311;font-size: 14px;">Cancel Upgrade</a><br>
													      		<?php } }else{ ?>
													      			<br><a data-fancybox data-type="ajax" data-src="" href="/request-supplements/{{$value->id}}/{{$HotelDatesID}}/{{$cart_experience[0]->id}}"  style="color: #FCA311;font-size: 14px;">Add</a>
													      		<?php } ?> 
													      		@endhasrole
																
													      	</td>
													      	<td style="pointer-events: none;">
													      		
																<textarea class="form-control"  placeholder="Enter Note for the hotel" name="specialRequestsEdit[1][{{$value->id}}]">{{$value->specials}}</textarea>
													      	</td>
													      	<td style="pointer-events: none;">
													      		@hasrole('Collaborator')

													      		@else
													      		<!-- <a class="removeRoomsCls removeRoomsIconCls btn" data-id="{{$value->id}}"><i class="fas fa-trash-alt"></i></a> -->
													      		@endhasrole
													      	</td>
													      	
													    </tr>
												  	<?php 
													 }
												  		$sngCnt++;
												  		}
												  	}
												  }

											  	?>
											  	<!-- cancel request -->
											  	<!-- room optional -->
											  	<?php 
											  	foreach ($cartExperiencesToRooms as $key => $value) {
											  		if($value->room_id == '1' && !empty($value->is_optional_room)){
											  		$ceTrR = [];
												  	foreach ($value->cartExperiencesToRoomsRequests as $keyCRR => $valueCRR) {
											  			$ceTrR[] = $valueCRR->room_requests_id;
												  	}
												  	if(($value->status == -1) && ($value->cancellation_request_status == 'approved')){
												  		continue;
												  	}
												  	if(($value->room_request_status == 'cancelled')){ 
												  		continue;
												  	}	
											  	 ?>
											  	 @hasrole('Collaborator')
											  	 <?php
													
													$today = strtotime("today");
													$minusDays = strtotime('-28 days',strtotime($cart_experience[0]->date_from));
													if(strtotime($cart_experience[0]->date_from) > $today)
								                	{
														if($today >= $minusDays){
															if(!empty($value->is_optional_room)){
																	
																	echo '<tr>';
																	}else{
																			echo '<tr class="table table-disaled" >';
																	}
														}else{
															echo '<tr>';
														}
													}else{
															echo '<tr class="table table-disaled" style="pointer-events: none;">';
														}
													?>
											  		@else
											  		<tr class="table table-disaled" style="pointer-events: none;">
										  			@endhasrole
												      	<td scope="row" style="text-align:center;">
												      		<?php
												      		if(($value->status == -1) && ($value->cancellation_request_status == null)){
												      			echo '<label>Pending cancellation</label>';
												      		}else{
															?>
															<?php if(!empty($value->is_optional_room)){
																?>
																<small class="sk_success"><b>Status: Room on Option</b></small>
																<?php
															} ?>
															  <!-- <a href="javascript:;" class="sk_cancel_btn mb-2" style="color:red;" data-id="{{$value->id}}" data-type="declined"><p>Cancel request</p></a> -->
													      	<div class="checkarea_part_Dates">
									                            <!-- <label class="checkbox_div">
									                              <input type="checkbox" class="custom_chkbox tagchkbox notClickedCls sk_con" value="1" name="roomPaidEdit[1][{{$value->id}}]" <?php echo $value->cancellation_request_status ; echo $value->status == '1'?'checked': ''?>> <span class="<?php echo $value->cancellation_request_status ;?>"></span>
									                              <span class="checkmark"></span>
									                              <span class="sk_label">Provisional</span>
									                            </label> -->

									                            <label class="checkbox_div">
									                              <input type="checkbox" class="custom_chkbox tagchkbox notClickedCls sk_dep" value="1" name="roomDepositEdit[1][{{$value->id}}]" <?php echo $value->deposit == '1'?'checked': ''?>> <span class="notClickedCls"></span>
									                              <span class="checkmark"></span>
									                              <span class="sk_label">Deposit Paid</span>
									                            </label>

									                            <label class="checkbox_div">
									                              <input type="checkbox" class="custom_chkbox tagchkbox notClickedCls sk_paid" value="1" name="roomPaidFullEdit[1][{{$value->id}}]" <?php echo $value->paid == '1'?'checked': ''?>> <span class="notClickedCls"></span>
									                              <span class="checkmark"></span>
									                              <span class="sk_label">Paid in full</span>
									                            </label>
									                        </div>
									                    	<?php } ?>
												      	</td>
												      	<td>
															<input type="text" class="form-control" placeholder="Enter name" name="singleRoomNameEdit[1][{{$value->id}}]" value="{{$value->names}}">
												      	</td>
												      	<?php
														$today = strtotime("today");
														$minusDaysUp = strtotime('-14 days',strtotime($cart_experience[0]->date_from));
														if($today >= $minusDaysUp){
															echo '<td class="sadasd table-disaled">';
														}else{
															echo '<td class="sadasd">';
														}
														?>
												      	
												      		<?php 
												      		$supplements = array();
												      		$pen_can = 0;
												      		if(!empty($roomsSupplementsRequest)){
												      			foreach ($roomsSupplementsRequest as $rskey => $rsvalue) {
												      				if($rsvalue['cart_experiences_to_rooms_id'] == $value->id){
												      					if($rsvalue['upgrade_request_sup_status'] == 'pending')
													      					{
													      						$pen_can = 1;
													      					}
												      					if($rsvalue['supplements'] == 1){
														      						$rsvalue['supplements'] = 'Water view (Sea/Lake/River) : '.$rsvalue['upgrade_request_sup_status'];
														      					}elseif($rsvalue['supplements'] == 2){
														      						$rsvalue['supplements'] = 'View (Garden/Balcony) : '.$rsvalue['upgrade_request_sup_status'];
														      					}elseif($rsvalue['supplements'] == 3){
														      						$rsvalue['supplements'] = 'Executive/De Luxe/Superior Rooms : '.$rsvalue['upgrade_request_sup_status'];
														      					}elseif($rsvalue['supplements'] == 4){
														      						$rsvalue['supplements'] = 'Dbl/tw room for sole : '.$rsvalue['upgrade_request_sup_status'];
														      					}elseif($rsvalue['supplements'] == 7){
														      						$rsvalue['supplements'] = 'Walk In Shower : '.$rsvalue['upgrade_request_sup_status'];
														      					}elseif($rsvalue['supplements'] == 8){
														      						$rsvalue['supplements'] = 'Ground Floor Room : '.$rsvalue['upgrade_request_sup_status'];
														      					}elseif($rsvalue['supplements'] == 5){
												      						$rsvalue['supplements'] = $rsvalue['upgrade_name'].' : '.$rsvalue['upgrade_request_sup_status'];
												      					}
												      					$supplements[] = $rsvalue['supplements'];
												      				}
												      			}
												      		}
												      		if(!empty($supplements)){
												      			echo implode('<br>', $supplements);
												      			 if(!empty($value->upgrade_request_status)){
														      			if(empty($pen_can)){ ?>
														      			<br><a data-fancybox data-type="ajax" data-src="" href="/request-supplements/{{$value->id}}/{{$HotelDatesID}}/{{$cart_experience[0]->id}}"  style="color: #FCA311;font-size: 14px;">Add</a>
														      				<?php } }
												      		}else{
												      		?>
													      		<i>No requests made</i>
													      	<?php } ?>
													      	@hasrole('Collaborator')
													      	<?php if(!empty($value->upgrade_request_status)){
													      	if(!empty($pen_can)){ ?>
													      		<br><i>Upgrade Request <?php echo ucwords($value->upgrade_request_status); ?></i>
													      		<br><a class="cancelUpgrade" href="javascript:;" data-src="{{ route('request-supplements-cancel', $value->id) }}/?hotel_dates_id=<?php echo $HotelDatesID; ?>&cart_id=<?php echo $cart_experience[0]->id; ?>" style="color: #FCA311;font-size: 14px;">Cancel Upgrade</a>
												      		<?php } } else{ ?>
												      			<br><a data-fancybox data-type="ajax" data-src="" href="/request-supplements/{{$value->id}}/{{$HotelDatesID}}/{{$cart_experience[0]->id}}"  style="color: #FCA311;font-size: 14px;" class="up-request">Request</a>
												      		<?php } ?>
															 @else
																<?php if(!empty($value->upgrade_request_status)){ 
																	if(!empty($pen_can)){?>
													      		<!-- <br><i>Upgrade Request <?php echo ucwords($value->upgrade_request_status); ?></i> -->
													      		<br><a class="cancelUpgrade" href="javascript:;" data-src="{{ route('request-supplements-cancel', $value->id) }}/?hotel_dates_id=<?php echo $HotelDatesID; ?>&cart_id=<?php echo $cart_experience[0]->id; ?>" style="color: #FCA311;font-size: 14px;">Cancel Upgrade</a>
												      		<?php } }else{ ?>
												      			<br><a data-fancybox data-type="ajax" data-src="" href="/request-supplements/{{$value->id}}/{{$HotelDatesID}}/{{$cart_experience[0]->id}}"  style="color: #FCA311;font-size: 14px;">Add</a>
												      		<?php } ?> 
												      		@endhasrole
												      		<!-- <select name="roomRequestsEdit[1][{{$value->id}}][]" class="selectCls" multiple="">
												      			<option value="0">None</option>
													      		<?php foreach ($roomRequests as $keyrm => $valuerm) {
													      			$selected = '';
													      			if (in_array($valuerm->id, $ceTrR)){
													      				$selected = 'selected';
													      			}
													      		 ?>
													      			<option value="{{ $valuerm->id }}" {{$selected}}>{{ $valuerm->name }}</option>
													      		<?php } ?>
												      		</select> -->
												      	</td>
												      	<td>
															<textarea class="form-control"  placeholder="Enter Note for the hotel" name="specialRequestsEdit[1][{{$value->id}}]">{{$value->specials}}</textarea>
												      	</td>
												      	<td>
												      		@hasrole('Collaborator')

												      		@else
												      		@if(!empty($value->deposit) || !empty($value->paid) || !empty($value->names))
													      		@else
														      		@if(empty($supplements))
														      			<a class="removeRoomsCls removeRoomsIconCls btn" data-id="{{$value->id}}"><i class="fas fa-trash-alt"></i></a>
														      		@endif
													      		@endif
												      		@endhasrole
												      	</td>
												    </tr>
											  	<?php 
											  		$sngCnt++;
											  		}
											  	}
											  	?>
											  </tbody>
											</table>
										</div>  
										{{-- <div class="col-sm-12">	
											<a class="orangeLink addRoomBtnCls tourOverviewButton" data-fancybox data-type="ajax" data-src="" href="{{ route('add-rooms', $cart_experience[0]->id) }}"><i class="fas fa-plus"></i></a>			
										</div>  --}} 	
									</div>  
											
							  	</div>
						  	@endif
						  	@if ($dblLastAmt > 0)
							  	<div class="tab-pane {{(!empty($LastAddedRequest) && $LastAddedRequest->room_id == 2)?'active':''}}" id="DoubleRooms" role="tabpanel">
							  		<div class="row">
										<div class="col-sm-12">
									  		@hasrole('Collaborator')
									  			<?php
									  			

												$today = strtotime("today");
												$minusDays = strtotime('-28 days',strtotime($cart_experience[0]->date_from));
												if($today >= $minusDays){
													//echo '<table class="table table-disaled" style="pointer-events: none;">';
													echo '<table class="table">';
												}else{
													echo '<table class="table">';
												}
												?>
                    						@else
									  		<table class="table table-disaled" style="pointer-events: none;">
								  			@endhasrole
											  <thead>
											    <tr>
											      <th scope="col">Mark as paid </th>
											      <th scope="col">Name</th>
											      <th scope="col">Room request </th>
											      <th scope="col">Note for the hotel</th>
											      <th scope="col">&nbsp;</th>
											    </tr>
											  </thead>
											  <tbody class="tblBorderCls">
											  	<?php 
											  	$dblCnt = 1;
											  	foreach ($cartExperiencesToRooms as $key => $value) {
											  		if($value->room_id == '2' && empty($value->is_optional_room)){
											  		$ceTrR = [];
												  	foreach ($value->cartExperiencesToRoomsRequests as $keyCRR => $valueCRR) {
											  			$ceTrR[] = $valueCRR->room_requests_id;
												  	}
												  	if(($value->status == -1) && ($value->cancellation_request_status == 'approved')){
													  		continue;
													  	}
													  	if(($value->room_request_status == 'cancelled')){ 
													  		continue;
													  	}
											  	 ?>
											  		  @hasrole('Collaborator')
											  	 <?php
													
													$today = strtotime("today");
													$minusDays = strtotime('-28 days',strtotime($cart_experience[0]->date_from));
													if(strtotime($cart_experience[0]->date_from) > $today)
								                	{
														if($today >= $minusDays){
															if(!empty($value->is_optional_room)){
																	
																	echo '<tr>';
																	}else{
																			echo '<tr class="table table-disaled">';
																	}
														}else{
															echo '<tr>';
														}
													}else{
															echo '<tr class="table table-disaled" style="pointer-events: none;">';
														}
													?>
											  		@else
											  		<tr class="table table-disaled" style="pointer-events: none;">
										  			@endhasrole
												      	<td scope="row" style="text-align:center;">
												      		<?php
												      		if(($value->status == -1) && ($value->cancellation_request_status == null)){
												      			//echo '<label>Pending cancellation</label>';
												      			?>
														      			<div class="sk_status_change_{{$value->id}}">
												      						<p class="sk_pending"><b> Status: Pending cancellation </b></p>
												      						
																			<label>Cancellation request pending...</label>
																			<a href="javascript:;" class="sk_cancel_btn" style="color:red;" data-id="{{$value->id}}" data-type="declined"><p>Cancel request</p></a>
																		</div>
														      			<?php
												      		}else{
															?>
															<?php if(!empty($value->is_optional_room)){
																?>
																<small class="sk_success"><b>Status: Room on Option</b></small>
																<?php
															} ?>
													      	<div class="checkarea_part_Dates">
									                            <!-- <label class="checkbox_div">
									                              <input type="checkbox" class="custom_chkbox tagchkbox notClickedCls sk_con" value="1" name="roomPaidEdit[2][{{$value->id}}]" <?php echo $value->status == '1'?'checked': ''?>> <span class="notClickedCls"></span>
									                              <span class="checkmark"></span>
									                              <span class="sk_label">Provisional</span>
									                            </label> -->

									                            <label class="checkbox_div">
									                              <input type="checkbox" class="custom_chkbox tagchkbox notClickedCls sk_dep" value="1" name="roomDepositEdit[2][{{$value->id}}]" <?php echo $value->deposit == '1'?'checked': ''?>> <span class="notClickedCls"></span>
									                              <span class="checkmark"></span>
									                              <span class="sk_label">Deposit Paid</span>
									                            </label>

									                            <label class="checkbox_div">
									                              <input type="checkbox" class="custom_chkbox tagchkbox notClickedCls sk_paid" value="1" name="roomPaidFullEdit[2][{{$value->id}}]" <?php echo $value->paid == '1'?'checked': ''?>> <span class="notClickedCls"></span>
									                              <span class="checkmark"></span>
									                              <span class="sk_label">Paid in full</span>
									                            </label>
									                        </div>
									                    	<?php } ?>
												      	</td>
												      	<td>
												      		<?php
												      		$supplements = array();
												      		$pen_can = 0;
												      		$dbl_sole = 0;
												      		if(!empty($roomsSupplementsRequest)){
												      			foreach ($roomsSupplementsRequest as $rskey => $rsvalue) {

												      				if($rsvalue['cart_experiences_to_rooms_id'] == $value->id){
												      					if($rsvalue['upgrade_request_sup_status'] == 'pending')
													      					{
													      						$pen_can = 1;
													      					}
												      					if($rsvalue['supplements'] == 1){
														      						$rsvalue['supplements'] = 'Water view (Sea/Lake/River) : '.$rsvalue['upgrade_request_sup_status'];
														      					}elseif($rsvalue['supplements'] == 2){
														      						$rsvalue['supplements'] = 'View (Garden/Balcony) : '.$rsvalue['upgrade_request_sup_status'];
														      					}elseif($rsvalue['supplements'] == 3){
														      						$rsvalue['supplements'] = 'Executive/De Luxe/Superior Rooms : '.$rsvalue['upgrade_request_sup_status'];
														      					}elseif($rsvalue['supplements'] == 4){
														      						$dbl_sole  = ((isset($rsvalue['upgrade_request_sup_status']) && $rsvalue['upgrade_request_sup_status'] == 'accepted')?'1':'1');
														      						$rsvalue['supplements'] = 'Dbl/tw room for sole : '.$rsvalue['upgrade_request_sup_status'];
														      					}elseif($rsvalue['supplements'] == 7){
														      						$rsvalue['supplements'] = 'Walk In Shower : '.$rsvalue['upgrade_request_sup_status'];
														      					}elseif($rsvalue['supplements'] == 8){
														      						$rsvalue['supplements'] = 'Ground Floor Room : '.$rsvalue['upgrade_request_sup_status'];
														      					}elseif($rsvalue['supplements'] == 5){
												      						$rsvalue['supplements'] = $rsvalue['upgrade_name'].' : '.$rsvalue['upgrade_request_sup_status'];
												      					}
												      					$supplements[] = $rsvalue['supplements'];
												      				}
												      			}
												      		}

												      		$names = array(); 
												      		if(!empty($value->names)){
												      			$names = explode(',', $value->names);
												      		} ?>
															<input type="text" class="form-control" placeholder="Enter name" name="singleRoomNameEdit[2][{{$value->id}}][]" value="{{@$names[0]}}">
															<input type="text" <?=!empty($dbl_sole)?'disabled':''?> class="form-control" placeholder="Enter name" name="singleRoomNameEdit[2][{{$value->id}}][]" value="{{@$names[1]}}">
												      	</td>
												      	<?php
														$today = strtotime("today");
														$minusDaysUp = strtotime('-14 days',strtotime($cart_experience[0]->date_from));
														if($today >= $minusDaysUp){
															echo '<td class="sadasd table-disaled">';
														}else{
															echo '<td class="sadasd">';
														}
														?>
												      		<?php 
												      		
												      		if(!empty($supplements)){
												      			echo implode('<br>', $supplements);
												      			 if(!empty($value->upgrade_request_status)){
														      			if(empty($pen_can)){ ?>
														      			<br><a data-fancybox data-type="ajax" data-src="" href="/request-supplements/{{$value->id}}/{{$HotelDatesID}}/{{$cart_experience[0]->id}}"  style="color: #FCA311;font-size: 14px;">Add</a>
														      				<?php } } 
												      		}else{
												      		?>
													      		<i>No requests made</i>
													      	<?php } ?>
													      	@hasrole('Collaborator')
													      	<?php if(!empty($value->upgrade_request_status)){
													      	if(!empty($pen_can)){ ?>
													      		<br><i>Upgrade Request <?php echo ucwords($value->upgrade_request_status); ?></i>
													      		<br><a class="cancelUpgrade" href="javascript:;" data-src="{{ route('request-supplements-cancel', $value->id) }}/?hotel_dates_id=<?php echo $HotelDatesID; ?>&cart_id=<?php echo $cart_experience[0]->id; ?>" style="color: #FCA311;font-size: 14px;">Cancel Upgrade</a>
												      		<?php }}else{ ?>
												      			<br><a data-fancybox data-type="ajax" data-src="" href="/request-supplements/{{$value->id}}/{{$HotelDatesID}}/{{$cart_experience[0]->id}}"  style="color: #FCA311;font-size: 14px;" class="up-request">Request</a>
												      		<?php } ?>
															 @else
																<?php if(!empty($value->upgrade_request_status)){
																if(!empty($pen_can)){ ?>
													      		<!-- <br><i>Upgrade Request <?php echo ucwords($value->upgrade_request_status); ?></i> -->
													      		<br><a class="cancelUpgrade" href="javascript:;" data-src="{{ route('request-supplements-cancel', $value->id) }}/?hotel_dates_id=<?php echo $HotelDatesID; ?>&cart_id=<?php echo $cart_experience[0]->id; ?>" style="color: #FCA311;font-size: 14px;">Cancel Upgrade</a>
												      		<?php }}else{ ?>
												      			<br><a data-fancybox data-type="ajax" data-src="" href="/request-supplements/{{$value->id}}/{{$HotelDatesID}}/{{$cart_experience[0]->id}}"  style="color: #FCA311;font-size: 14px;">Add</a>
												      		<?php } ?> 
												      		@endhasrole
												      		<!-- <select name="roomRequestsEdit[1][{{$value->id}}][]" class="selectCls" multiple="">
												      			<option value="0">None</option>
													      		<?php foreach ($roomRequests as $keyrm => $valuerm) {
													      			$selected = '';
													      			if (in_array($valuerm->id, $ceTrR)){
													      				$selected = 'selected';
													      			}
													      		 ?>
													      			<option value="{{ $valuerm->id }}" {{$selected}}>{{ $valuerm->name }}</option>
													      		<?php } ?>
												      		</select> -->
												      	</td>
												      	<td>
															<textarea class="form-control"  placeholder="Enter Note for the hotel" name="specialRequestsEdit[2][{{$value->id}}]">{{$value->specials}}</textarea>
												      	</td>
												      	<td>
												      		@hasrole('Collaborator')

												      		@else
												      		@if(!empty($value->deposit) || !empty($value->paid) || !empty($names[0]))
													      		@else
														      		@if(empty($supplements))
														      			<a class="removeRoomsCls removeRoomsIconCls btn" data-id="{{$value->id}}"><i class="fas fa-trash-alt"></i></a>
														      		@endif
													      		@endif
												      		@endhasrole
												      	</td>
												    </tr>
											  	<?php 
											  		$dblCnt++;
											  		}
											  	}
											  	for ($i=1; $i <= $dbl-$dblCnt+1; $i++) { ?>
												   <!--  <tr>
												      	<td scope="row">
													      	<div class="checkarea_part_Dates marginLetf40">
									                            <label class="checkbox_div">
									                              <input type="checkbox" class="custom_chkbox tagchkbox notClickedCls " value="1" name="roomPaid[2][{{$i}}]"> <span class="notClickedCls"></span>
									                              <span class="checkmark"></span>
									                            </label>
									                        </div>
												      	</td>
												      	<td>
															<input type="text" class="form-control" placeholder="Enter name" name="singleRoomName[2][{{$i}}]">
												      	</td>
												      	<td>
												      		<select name="roomRequests[2][{{$i}}][]" class="selectCls" multiple="">
												      			<option value="0">None</option>
													      		<?php foreach ($roomRequests as $keyrm => $valuerm) { ?>
													      			<option value="{{ $valuerm->id }}">{{ $valuerm->name }}</option>
													      		<?php } ?>
												      		</select>
												      	</td>
												      	<td>
															<input type="text" class="form-control" placeholder="Enter Note for the hotel" name="specialRequests[2][{{$i}}]">
												      	</td>
												      	<td>&nbsp;</td>
												    </tr> -->
											  	<?php } ?>


											  	<?php
											  	if($cartExperiencesToRoomsRequest->count()>0){
												  	foreach ($cartExperiencesToRoomsRequest as $key => $value) {
												  		if($value->room_id == '2'){
												  		$ceTrR = [];
													  	foreach ($value->cartExperiencesToRoomsRequests as $keyCRR => $valueCRR) {
												  			$ceTrR[] = $valueCRR->room_requests_id;
													  	}

													  	if(($value->status == -1) && ($value->cancellation_request_status == 'approved')){
													  		continue;
													  	}
													  	if(($value->room_request_status == 'cancelled')){ 
													  		continue;
													  	}
												  	 ?>
												  		  @hasrole('Collaborator')
													  	 <?php
															
															$today = strtotime("today");
															$minusDays = strtotime('-28 days',strtotime($cart_experience[0]->date_from));
															if($today >= $minusDays){
																if(!empty($value->is_optional_room)){
																		
																		echo '<tr>';
																		}else{
																				echo '<tr class="table table-disaled" >';
																		}
															}else{
																echo '<tr>';
															}
															?>
													  		@else
													  		<tr class="table table-disaled" style="pointer-events: none;">
												  			@endhasrole
													      	<td scope="row">
														      	<div class="checkarea_part_Dates ">
														      		<?php
														      		if(($value->status == -1) && ($value->cancellation_request_status == null)){
														      			//echo '<label>Pending cancellation</label>';
														      			?>
														      			<div class="sk_status_change_{{$value->id}}">
												      						<p class="sk_pending"><b> Status: Pending cancellation </b></p>
												      						
																			<label>Cancellation request pending...</label>
																			<a href="javascript:;" class="sk_cancel_btn" style="color:red;" data-id="{{$value->id}}" data-type="declined"><p>Cancel request</p></a>
																		</div>
														      			<?php
														      		}elseif($value->room_request_status == 'approved'){
																	?>
																	<div>
																		<small class="sk_success">Status: Requested Additional Room</small>
																		<!-- <label class="checkbox_div">
											                              <input type="checkbox" class="custom_chkbox tagchkbox notClickedCls " value="1" name="roomPaidEdit[2][{{$value->id}}]" <?php echo $value->status == '1'?'checked': ''?>> <span class="notClickedCls"></span>
											                              <span class="checkmark"></span>
											                            </label> -->
											                            <div class="checkarea_part_Dates">
																			
																			<label class="checkbox_div">
																			  <input type="checkbox" class="custom_chkbox tagchkbox notClickedCls sk_dep" value="1" name="roomDepositEdit[2][{{$value->id}}]" <?php echo $value->deposit == '1'?'checked': ''?>> <span class="notClickedCls"></span>
																			  <span class="checkmark"></span>
																			  <span class="sk_label">Deposit Paid</span>
																			</label>

																			<label class="checkbox_div">
																			  <input type="checkbox" class="custom_chkbox tagchkbox notClickedCls sk_paid" value="1" name="roomPaidFullEdit[2][{{$value->id}}]" <?php echo $value->paid == '1'?'checked': ''?>> <span class="notClickedCls"></span>
																			  <span class="checkmark"></span>
																			  <span class="sk_label">Paid in full</span>
																			</label>
																		</div>
											                            <!-- <a href="" style="visibility: none">$&nbsp;</a> -->
											                            </div>
																	<?php
													      			}else if($value->room_request_status == 'pending'){
												      					?>
												      					<div class="sk_status_change_{{$value->id}}">
												      						<p class="sk_pending">Status: Pending</p>
												      						<br>
																			<label>Room request pending...</label>
																			
																			<a href="javascript:;" class="sk_cancel_btn" style="color:red;" data-id="{{$value->id}}" data-type="cancel"><p>Cancel request</p></a>
																		</div>
												      					<?php
													      			//}else if($value->room_request_status == 'declined'){
												      					?> 
												      						<!--<small class="sk_pending">Status: Declined</small>
																			<label>Single room request declined...</label>-->

												      					<?php
													      			}else if($value->room_request_status == 'cancelled'){
													      				?>
												      					<small class="sk_pending">Status: Cancelled</small>
													      				<?php
													      			}
													      			?>	
										                        </div>
													      	</td>
													      	<td>
																<?php
																$pen_can = 0;
																$dbl_sole = 0;
														      		$supplements = array();
														      		if(!empty($roomsSupplementsRequest)){ 
														      			foreach ($roomsSupplementsRequest as $rskey => $rsvalue) {
														      				
														      				if($rsvalue['cart_experiences_to_rooms_id'] == $value->id){
														      					if($rsvalue['upgrade_request_sup_status'] == 'pending')
														      					{
														      						$pen_can = 1;
														      					}
														      					if($rsvalue['supplements'] == 1){
														      						$rsvalue['supplements'] = 'Water view (Sea/Lake/River) : '.$rsvalue['upgrade_request_sup_status'];
														      					}elseif($rsvalue['supplements'] == 2){
														      						$rsvalue['supplements'] = 'View (Garden/Balcony) : '.$rsvalue['upgrade_request_sup_status'];
														      					}elseif($rsvalue['supplements'] == 3){
														      						$rsvalue['supplements'] = 'Executive/De Luxe/Superior Rooms : '.$rsvalue['upgrade_request_sup_status'];
														      					}elseif($rsvalue['supplements'] == 4){
														      						$dbl_sole  = ((isset($rsvalue['upgrade_request_sup_status']) && $rsvalue['upgrade_request_sup_status'] == 'accepted')?'1':'1');
														      						$rsvalue['supplements'] = 'Dbl/tw room for sole : '.$rsvalue['upgrade_request_sup_status'];
														      					}elseif($rsvalue['supplements'] == 7){
														      						$rsvalue['supplements'] = 'Walk In Shower : '.$rsvalue['upgrade_request_sup_status'];
														      					}elseif($rsvalue['supplements'] == 8){
														      						$rsvalue['supplements'] = 'Ground Floor Room : '.$rsvalue['upgrade_request_sup_status'];
														      					}elseif($rsvalue['supplements'] == 5){
												      						$rsvalue['supplements'] = $rsvalue['upgrade_name'].' : '.$rsvalue['upgrade_request_sup_status'];
												      					}
												      					$supplements[] = $rsvalue['supplements'];
														      				}
														      			}
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
													      		$names = array(); 
													      		if(!empty($value->names)){
													      			$names = explode(',', $value->names);
													      		} ?>
																<input type="text" class="form-control" placeholder="Enter name" name="singleRoomNameEdit[2][{{$value->id}}][]" value="{{@$names[0]}}">
																<input type="text" <?=!empty($dbl_sole)?'disabled':''?>  class="form-control" placeholder="Enter name" name="singleRoomNameEdit[2][{{$value->id}}][]" value="{{@$names[1]}}">
													      	</td>
													      	<?php
																$today = strtotime("today");
																$minusDaysUp = strtotime('-14 days',strtotime($cart_experience[0]->date_from));
																if($today >= $minusDaysUp){
																	echo '<td class="suppliment table-disaled">';
																}else{
																	echo '<td class="suppliment" >';
																}
																?>
													      		
														      	
													      		
																<?php /*if(!empty($value->upgrade_request_status)){ */?>
																	<?php 
																	
														      		if(!empty($supplements)){
														      			echo implode('<br>', $supplements);
														      			echo '<br>';
														      			 if(!empty($value->upgrade_request_status)){
														      			if(empty($pen_can)){ ?>
														      			<br><a data-fancybox data-type="ajax" data-src="" href="/request-supplements/{{$value->id}}/{{$HotelDatesID}}/{{$cart_experience[0]->id}}"  style="color: #FCA311;font-size: 14px;">Add</a>
														      				<?php } } 
														      		}else{
														      		if(empty($room_type_supplements)){
														      		?>
															      		<i>No requests made</i>
															      	<?php } } ?>
													      		
													      		<?php /*}else{ */?>
													      			
													      			<label><?php 
															      		/*$selected = [];
															      		foreach ($roomRequests as $keyrm => $valuerm) {
															      			
															      			if (in_array($valuerm->id, $ceTrR)){
															      				$selected[] =  $valuerm->name;
															      			}
															      		}
															      		echo implode(', ', $selected);*/
															      		 ?></label>

															      		  <?php 
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

														      	<?php /*}*/ ?>
														      	@hasrole('Collaborator')
														      	<?php if(!empty($value->upgrade_request_status)){
														      	if(!empty($pen_can)){ ?>
														      		<br><i>Upgrade Request <?php echo ucwords($value->upgrade_request_status); ?></i>
														      		<br><a class="cancelUpgrade" href="javascript:;" data-src="{{ route('request-supplements-cancel', $value->id) }}/?hotel_dates_id=<?php echo $HotelDatesID; ?>&cart_id=<?php echo $cart_experience[0]->id; ?>" style="color: #FCA311;font-size: 14px;">Cancel Upgrade</a><br>
													      		<?php } }else{ ?>
													      			<br><a data-fancybox data-type="ajax" data-src="" href="/request-supplements/{{$value->id}}/{{$HotelDatesID}}/{{$cart_experience[0]->id}}"  style="color: #FCA311;font-size: 14px;" class="up-request">Request</a><br>
													      		<?php } ?>
																 @else
																	<?php if(!empty($value->upgrade_request_status)){
																	if(!empty($pen_can)){  ?>
														      		<!-- <br><i>Upgrade Request <?php echo ucwords($value->upgrade_request_status); ?></i> -->
														      		<br><a class="cancelUpgrade" href="javascript:;" data-src="{{ route('request-supplements-cancel', $value->id) }}/?hotel_dates_id=<?php echo $HotelDatesID; ?>&cart_id=<?php echo $cart_experience[0]->id; ?>" style="color: #FCA311;font-size: 14px;">Cancel Upgrade</a><br>
													      		<?php } }else{ ?>
													      			<br><a data-fancybox data-type="ajax" data-src="" href="/request-supplements/{{$value->id}}/{{$HotelDatesID}}/{{$cart_experience[0]->id}}"  style="color: #FCA311;font-size: 14px;">Add</a>
													      		<?php } ?> 
													      		@endhasrole
																
													      	</td>
													      	<td>
																<textarea class="form-control"  placeholder="Enter Note for the hotel" name="specialRequestsEdit[2][{{$value->id}}]">{{$value->specials}}</textarea>
													      	</td>
													      	<td>
													      		
													      	</td>
													    </tr>
												  	<?php 
												  		$sngCnt++;
												  		}
												  	}
												  }

											  	?>
											  	<!-- room optional -->
											  	<?php 
											  	
											  	foreach ($cartExperiencesToRooms as $key => $value) {
											  		if($value->room_id == '2' && !empty($value->is_optional_room)){
											  		$ceTrR = [];
												  	foreach ($value->cartExperiencesToRoomsRequests as $keyCRR => $valueCRR) {
											  			$ceTrR[] = $valueCRR->room_requests_id;
												  	}
												  	if(($value->status == -1) && ($value->cancellation_request_status == 'approved')){
													  		continue;
													  	}
													  	if(($value->room_request_status == 'cancelled')){ 
													  		continue;
													  	}
											  	 ?>
											  		  @hasrole('Collaborator')
											  	 <?php
													
													$today = strtotime("today");
													$minusDays = strtotime('-28 days',strtotime($cart_experience[0]->date_from));
													if(strtotime($cart_experience[0]->date_from) > $today)
								                	{
														if($today >= $minusDays){
															if(!empty($value->is_optional_room)){
																	
																	echo '<tr>';
																	}else{
																			echo '<tr class="table table-disaled">';
																	}
														}else{
															echo '<tr>';
														}
													}else{
															echo '<tr class="table table-disaled" style="pointer-events: none;">';
														}
													?>
											  		@else
											  		<tr class="table table-disaled" style="pointer-events: none;">
										  			@endhasrole
												      	<td scope="row" style="text-align:center;">
												      		<?php
												      		if(($value->status == -1) && ($value->cancellation_request_status == null)){
												      			//echo '<label>Pending cancellation</label>';
												      			?>
														      			<div class="sk_status_change_{{$value->id}}">
												      						<p class="sk_pending"><b> Status: Pending cancellation </b></p>
												      						
																			<label>Cancellation request pending...</label>
																			<a href="javascript:;" class="sk_cancel_btn" style="color:red;" data-id="{{$value->id}}" data-type="declined"><p>Cancel request</p></a>
																		</div>
														      			<?php
												      		}else{
															?>
															<?php if(!empty($value->is_optional_room)){
																?>
																<small class="sk_success"><b>Status: Room on Option</b></small>
																<?php
															} ?>
													      	<div class="checkarea_part_Dates">
									                            <!-- <label class="checkbox_div">
									                              <input type="checkbox" class="custom_chkbox tagchkbox notClickedCls sk_con" value="1" name="roomPaidEdit[2][{{$value->id}}]" <?php echo $value->status == '1'?'checked': ''?>> <span class="notClickedCls"></span>
									                              <span class="checkmark"></span>
									                              <span class="sk_label">Provisional</span>
									                            </label> -->

									                            <label class="checkbox_div">
									                              <input type="checkbox" class="custom_chkbox tagchkbox notClickedCls sk_dep" value="1" name="roomDepositEdit[2][{{$value->id}}]" <?php echo $value->deposit == '1'?'checked': ''?>> <span class="notClickedCls"></span>
									                              <span class="checkmark"></span>
									                              <span class="sk_label">Deposit Paid</span>
									                            </label>

									                            <label class="checkbox_div">
									                              <input type="checkbox" class="custom_chkbox tagchkbox notClickedCls sk_paid" value="1" name="roomPaidFullEdit[2][{{$value->id}}]" <?php echo $value->paid == '1'?'checked': ''?>> <span class="notClickedCls"></span>
									                              <span class="checkmark"></span>
									                              <span class="sk_label">Paid in full</span>
									                            </label>
									                        </div>
									                    	<?php } ?>
												      	</td>
												      	<td>
												      		<?php
												      		$supplements = array();
												      		$pen_can = 0;
												      		$dbl_sole  = 0;
												      		if(!empty($roomsSupplementsRequest)){
												      			foreach ($roomsSupplementsRequest as $rskey => $rsvalue) {
												      				if($rsvalue['cart_experiences_to_rooms_id'] == $value->id){
												      					if($rsvalue['upgrade_request_sup_status'] == 'pending')
													      					{
													      						$pen_can = 1;
													      					}
												      					if($rsvalue['supplements'] == 1){
														      						$rsvalue['supplements'] = 'Water view (Sea/Lake/River) : '.$rsvalue['upgrade_request_sup_status'];
														      					}elseif($rsvalue['supplements'] == 2){
														      						$rsvalue['supplements'] = 'View (Garden/Balcony) : '.$rsvalue['upgrade_request_sup_status'];
														      					}elseif($rsvalue['supplements'] == 3){
														      						$rsvalue['supplements'] = 'Executive/De Luxe/Superior Rooms : '.$rsvalue['upgrade_request_sup_status'];
														      					}elseif($rsvalue['supplements'] == 4){
														      						$dbl_sole  = ((isset($rsvalue['upgrade_request_sup_status']) && $rsvalue['upgrade_request_sup_status'] == 'accepted')?'1':'1');
														      						$rsvalue['supplements'] = 'Dbl/tw room for sole : '.$rsvalue['upgrade_request_sup_status'];
														      					}elseif($rsvalue['supplements'] == 7){
														      						$rsvalue['supplements'] = 'Walk In Shower : '.$rsvalue['upgrade_request_sup_status'];
														      					}elseif($rsvalue['supplements'] == 8){
														      						$rsvalue['supplements'] = 'Ground Floor Room : '.$rsvalue['upgrade_request_sup_status'];
														      					}elseif($rsvalue['supplements'] == 5){
												      						$rsvalue['supplements'] = $rsvalue['upgrade_name'].' : '.$rsvalue['upgrade_request_sup_status'];
												      					}
												      					$supplements[] = $rsvalue['supplements'];
												      				}
												      			}
												      		}
												      		$names = array(); 
												      		if(!empty($value->names)){
												      			$names = explode(',', $value->names);
												      		} ?>
															<input type="text" class="form-control" placeholder="Enter name" name="singleRoomNameEdit[2][{{$value->id}}][]" value="{{@$names[0]}}">
															<input type="text" <?=!empty($dbl_sole)?'disabled':''?>  class="form-control" placeholder="Enter name" name="singleRoomNameEdit[2][{{$value->id}}][]" value="{{@$names[1]}}">
												      	</td>
												      	<?php
														$today = strtotime("today");
														$minusDaysUp = strtotime('-14 days',strtotime($cart_experience[0]->date_from));
														if($today >= $minusDaysUp){
															echo '<td class="sadasd table-disaled" >';
														}else{
															echo '<td class="sadasd">';
														}
														?>
												      		<?php 
												      		
												      		if(!empty($supplements)){
												      			echo implode('<br>', $supplements);
												      			if(!empty($value->upgrade_request_status)){
														      			if(empty($pen_can)){ ?>
														      			<br><a data-fancybox data-type="ajax" data-src="" href="/request-supplements/{{$value->id}}/{{$HotelDatesID}}/{{$cart_experience[0]->id}}"  style="color: #FCA311;font-size: 14px;">Add</a>
														      				<?php } } 
												      		}else{
												      		?>
													      		<i>No requests made</i>
													      	<?php } ?>
													      	@hasrole('Collaborator')
													      	<?php if(!empty($value->upgrade_request_status)){
													      	if(!empty($pen_can)){ ?>
													      		<br><i>Upgrade Request <?php echo ucwords($value->upgrade_request_status); ?></i>
													      		<br><a class="cancelUpgrade" href="javascript:;" data-src="{{ route('request-supplements-cancel', $value->id) }}/?hotel_dates_id=<?php echo $HotelDatesID; ?>&cart_id=<?php echo $cart_experience[0]->id; ?>" style="color: #FCA311;font-size: 14px;">Cancel Upgrade</a>
												      		<?php }}else{ ?>
												      			<br><a data-fancybox data-type="ajax" data-src="" href="/request-supplements/{{$value->id}}/{{$HotelDatesID}}/{{$cart_experience[0]->id}}"  style="color: #FCA311;font-size: 14px;" class="up-request">Request</a>
												      		<?php } ?>
															 @else
																<?php if(!empty($value->upgrade_request_status)){ 
																	if(!empty($pen_can)){?>
													      		<!-- <br><i>Upgrade Request <?php echo ucwords($value->upgrade_request_status); ?></i> -->
													      		<br><a class="cancelUpgrade" href="javascript:;" data-src="{{ route('request-supplements-cancel', $value->id) }}/?hotel_dates_id=<?php echo $HotelDatesID; ?>&cart_id=<?php echo $cart_experience[0]->id; ?>" style="color: #FCA311;font-size: 14px;">Cancel Upgrade</a>
												      		<?php } }else{ ?>
												      			<br><a data-fancybox data-type="ajax" data-src="" href="/request-supplements/{{$value->id}}/{{$HotelDatesID}}/{{$cart_experience[0]->id}}"  style="color: #FCA311;font-size: 14px;">Add</a>
												      		<?php } ?> 
												      		@endhasrole
												      		<!-- <select name="roomRequestsEdit[1][{{$value->id}}][]" class="selectCls" multiple="">
												      			<option value="0">None</option>
													      		<?php foreach ($roomRequests as $keyrm => $valuerm) {
													      			$selected = '';
													      			if (in_array($valuerm->id, $ceTrR)){
													      				$selected = 'selected';
													      			}
													      		 ?>
													      			<option value="{{ $valuerm->id }}" {{$selected}}>{{ $valuerm->name }}</option>
													      		<?php } ?>
												      		</select> -->
												      	</td>
												      	<td>
															<textarea class="form-control"  placeholder="Enter Note for the hotel" name="specialRequestsEdit[2][{{$value->id}}]">{{$value->specials}}</textarea>
												      	</td>
												      	<td>
												      		@hasrole('Collaborator')

												      		@else
												      		@if(!empty($value->deposit) || !empty($value->paid) || !empty($names[0]))
													      		@else
														      		@if(empty($supplements))
														      			<a class="removeRoomsCls removeRoomsIconCls btn" data-id="{{$value->id}}"><i class="fas fa-trash-alt"></i></a>
														      		@endif
													      		@endif
												      		@endhasrole
												      	</td>
												    </tr>
											  	<?php 
											  		$dblCnt++;
											  		}
											  	}
											  	?>
											  </tbody>
											</table>
										</div>  
									</div>
								</div>
							@endif
						  	@if ($twnLastAmt > 0)
								<div class="tab-pane {{(!empty($LastAddedRequest) && $LastAddedRequest->room_id == 3)?'active':''}}" id="TwinRooms" role="tabpanel">
									<div class="row">
										<div class="col-sm-12">
									  		@hasrole('Collaborator')
									  			<?php
												$today = strtotime("today");
												$minusDays = strtotime('-28 days',strtotime($cart_experience[0]->date_from));
												if($today >= $minusDays){
													//echo '<table class="table table-disaled" style="pointer-events: none;">';
													echo '<table class="table">';
												}else{
													echo '<table class="table">';
												}
												?>
                    						@else
									  		<table class="table table-disaled" style="pointer-events: none;">
								  			@endhasrole
											  	<thead>
												    <tr>
												      <th scope="col">Mark as paid </th>
												      <th scope="col">Name</th>
												      <th scope="col">Room request </th>
												      <th scope="col">Note for the hotel</th>
												      <th scope="col">&nbsp;</th>
												    </tr>
											  	</thead>
											  	<tbody class="tblBorderCls">
												  	<?php 
												  	$twnCnt = 1;
											  	foreach ($cartExperiencesToRooms as $key => $value) {
											  		if($value->room_id == '3' && empty($value->is_optional_room)){
											  			$ceTrR = [];
												  	foreach ($value->cartExperiencesToRoomsRequests as $keyCRR => $valueCRR) {
											  			$ceTrR[] = $valueCRR->room_requests_id;
												  	}
												  	if(($value->status == -1) && ($value->cancellation_request_status == 'approved')){
													  		continue;
													  	}
													  	if(($value->room_request_status == 'cancelled')){ 
													  		continue;
													  	}
											  	 ?>
											  		  @hasrole('Collaborator')
											  	 <?php
													
													$today = strtotime("today");
													$minusDays = strtotime('-28 days',strtotime($cart_experience[0]->date_from));
													if($today >= $minusDays){
														if(!empty($value->is_optional_room)){
																
																echo '<tr>';
																}else{
																		echo '<tr class="table table-disaled">';
																}
													}else{
														echo '<tr>';
													}
													?>
											  		@else
											  		<tr class="table table-disaled" style="pointer-events: none;">
										  			@endhasrole
												      	<td scope="row" style="text-align:center;">
												      		<?php
												      		if(($value->status == -1) && ($value->cancellation_request_status == null)){
												      			//echo '<label>Pending cancellation</label>';
												      			?>
														      			<div class="sk_status_change_{{$value->id}}">
												      						<p class="sk_pending"><b> Status: Pending cancellation </b></p>
												      						
																			<label>Cancellation request pending...</label>
																			<a href="javascript:;" class="sk_cancel_btn" style="color:red;" data-id="{{$value->id}}" data-type="declined"><p>Cancel request</p></a>
																		</div>
														      			<?php
												      		}else{
															?>
															<?php if(!empty($value->is_optional_room)){
																?>
																<small class="sk_success"><b>Status: Room on Option</b></small>
																<?php
															} ?>
													      	<div class="checkarea_part_Dates">
									                            <!-- <label class="checkbox_div">
									                              <input type="checkbox" class="custom_chkbox tagchkbox notClickedCls sk_con" value="1" name="roomPaidEdit[3][{{$value->id}}]" <?php echo $value->status == '1'?'checked': ''?>> <span class="notClickedCls"></span>
									                              <span class="checkmark"></span>
									                              <span class="sk_label">Provisional</span>
									                            </label> -->

									                            <label class="checkbox_div">
									                              <input type="checkbox" class="custom_chkbox tagchkbox notClickedCls sk_dep" value="1" name="roomDepositEdit[3][{{$value->id}}]" <?php echo $value->deposit == '1'?'checked': ''?>> <span class="notClickedCls"></span>
									                              <span class="checkmark"></span>
									                              <span class="sk_label">Deposit Paid</span>
									                            </label>

									                            <label class="checkbox_div">
									                              <input type="checkbox" class="custom_chkbox tagchkbox notClickedCls sk_paid" value="1" name="roomPaidFullEdit[3][{{$value->id}}]" <?php echo $value->paid == '1'?'checked': ''?>> <span class="notClickedCls"></span>
									                              <span class="checkmark"></span>
									                              <span class="sk_label">Paid in full</span>
									                            </label>
									                        </div>
									                    	<?php } ?>
												      	</td>
												      	<td>
												      		<?php
												      		$supplements = array();
												      		$pen_can = 0;
												      		$dbl_sole = 0;
												      		if(!empty($roomsSupplementsRequest)){
												      			foreach ($roomsSupplementsRequest as $rskey => $rsvalue) {
												      				if($rsvalue['cart_experiences_to_rooms_id'] == $value->id){
												      					if($rsvalue['upgrade_request_sup_status'] == 'pending')
													      					{
													      						$pen_can = 1;
													      					}
												      					if($rsvalue['supplements'] == 1){
														      						$rsvalue['supplements'] = 'Water view (Sea/Lake/River) : '.$rsvalue['upgrade_request_sup_status'];
														      					}elseif($rsvalue['supplements'] == 2){
														      						$rsvalue['supplements'] = 'View (Garden/Balcony) : '.$rsvalue['upgrade_request_sup_status'];
														      					}elseif($rsvalue['supplements'] == 3){
														      						$rsvalue['supplements'] = 'Executive/De Luxe/Superior Rooms : '.$rsvalue['upgrade_request_sup_status'];
														      					}elseif($rsvalue['supplements'] == 4){
														      						$dbl_sole  = ((isset($rsvalue['upgrade_request_sup_status']) && $rsvalue['upgrade_request_sup_status'] == 'accepted')?'1':'1');
														      						$rsvalue['supplements'] = 'Dbl/tw room for sole : '.$rsvalue['upgrade_request_sup_status'];
														      					}elseif($rsvalue['supplements'] == 7){
														      						$rsvalue['supplements'] = 'Walk In Shower : '.$rsvalue['upgrade_request_sup_status'];
														      					}elseif($rsvalue['supplements'] == 8){
														      						$rsvalue['supplements'] = 'Ground Floor Room : '.$rsvalue['upgrade_request_sup_status'];
														      					}elseif($rsvalue['supplements'] == 5){
												      						$rsvalue['supplements'] = $rsvalue['upgrade_name'].' : '.$rsvalue['upgrade_request_sup_status'];
												      					}
												      					$supplements[] = $rsvalue['supplements'];
												      				}
												      			}
												      		}
												      		$names = array(); 
												      		if(!empty($value->names)){
												      			$names = explode(',', $value->names);
												      		} ?>
															<input type="text" class="form-control" placeholder="Enter name" name="singleRoomNameEdit[3][{{$value->id}}][]" value="{{@$names[0]}}">
															<input type="text" <?=!empty($dbl_sole)?'disabled':''?> class="form-control" placeholder="Enter name" name="singleRoomNameEdit[3][{{$value->id}}][]" value="{{@$names[1]}}">
												      	</td>
												      	<?php
															$today = strtotime("today");
															$minusDaysUp = strtotime('-14 days',strtotime($cart_experience[0]->date_from));
															if($today >= $minusDaysUp){
																echo '<td class="sadasd table-disaled" >';
															}else{
																echo '<td class="sadasd">';
															}
															?>
												      		<?php 
												      		
												      		if(!empty($supplements)){
												      			echo implode('<br>', $supplements);
												      			if(!empty($value->upgrade_request_status)){
														      			if(empty($pen_can)){ ?>
														      			<br><a data-fancybox data-type="ajax" data-src="" href="/request-supplements/{{$value->id}}/{{$HotelDatesID}}/{{$cart_experience[0]->id}}"  style="color: #FCA311;font-size: 14px;">Add</a>
														      				<?php } } 
												      		}else{
												      		?>
													      		<i>No requests made</i>
													      	<?php } ?>
													      	@hasrole('Collaborator')
													      	<?php if(!empty($value->upgrade_request_status)){
													      	if(!empty($pen_can)){ ?>
													      		<br><i>Upgrade Request <?php echo ucwords($value->upgrade_request_status); ?></i>
													      		<br><a class="cancelUpgrade" href="javascript:;" data-src="{{ route('request-supplements-cancel', $value->id) }}/?hotel_dates_id=<?php echo $HotelDatesID; ?>&cart_id=<?php echo $cart_experience[0]->id; ?>" style="color: #FCA311;font-size: 14px;">Cancel Upgrade</a>
												      		<?php } }else{ ?>
												      			<br><a data-fancybox data-type="ajax" data-src="" href="/request-supplements/{{$value->id}}/{{$HotelDatesID}}/{{$cart_experience[0]->id}}"  style="color: #FCA311;font-size: 14px;" class="up-request">Request</a>
												      		<?php } ?>
															 @else
																<?php if(!empty($value->upgrade_request_status)){ 
																	if(!empty($pen_can)){?>
													      		<!-- <br><i>Upgrade Request <?php echo ucwords($value->upgrade_request_status); ?></i> -->
													      		<br><a class="cancelUpgrade" href="javascript:;" data-src="{{ route('request-supplements-cancel', $value->id) }}/?hotel_dates_id=<?php echo $HotelDatesID; ?>&cart_id=<?php echo $cart_experience[0]->id; ?>" style="color: #FCA311;font-size: 14px;">Cancel Upgrade</a>
												      		<?php } }else{ ?>
												      			<br><a data-fancybox data-type="ajax" data-src="" href="/request-supplements/{{$value->id}}/{{$HotelDatesID}}/{{$cart_experience[0]->id}}"  style="color: #FCA311;font-size: 14px;">Add</a>
												      		<?php } ?> 
												      		@endhasrole
												      		<!-- <select name="roomRequestsEdit[1][{{$value->id}}][]" class="selectCls" multiple="">
												      			<option value="0">None</option>
													      		<?php foreach ($roomRequests as $keyrm => $valuerm) {
													      			$selected = '';
													      			if (in_array($valuerm->id, $ceTrR)){
													      				$selected = 'selected';
													      			}
													      		 ?>
													      			<option value="{{ $valuerm->id }}" {{$selected}}>{{ $valuerm->name }}</option>
													      		<?php } ?>
												      		</select> -->
												      	</td>
												      	<td>
															<textarea class="form-control"  placeholder="Enter Note for the hotel" name="specialRequestsEdit[3][{{$value->id}}]">{{$value->specials}}</textarea>
												      	</td>
												      	<td>
												      		@hasrole('Collaborator')

												      		@else
												      		@if(!empty($value->deposit) || !empty($value->paid) || !empty($names[0]))
													      		@else
														      		@if(empty($supplements))
														      			<a class="removeRoomsCls removeRoomsIconCls btn" data-id="{{$value->id}}"><i class="fas fa-trash-alt"></i></a>
														      		@endif
													      		@endif
												      		@endhasrole
												      	</td>
												    </tr>
											  	<?php 
											  		$twnCnt++;
											  		}
											  	}
												  	for ($i=1; $i <= $twn-$twnCnt+1; $i++) { ?>
													    <!-- <tr>
												      	<td scope="row">
													      	<div class="checkarea_part_Dates marginLetf40">
									                            <label class="checkbox_div">
									                              <input type="checkbox" class="custom_chkbox tagchkbox notClickedCls " value="1" name="roomPaid[3][{{$i}}]"> <span class="notClickedCls"></span>
									                              <span class="checkmark"></span>
									                            </label>
									                        </div>
												      	</td>
												      	<td>
															<input type="text" class="form-control" placeholder="Enter name" name="singleRoomName[3][{{$i}}]">
												      	</td>
												      	<td>
												      		<select name="roomRequests[3][{{$i}}][]" class="selectCls" multiple="">
												      			<option value="0">None</option>
													      		<?php foreach ($roomRequests as $keyrm => $valuerm) { ?>
													      			<option value="{{ $valuerm->id }}">{{ $valuerm->name }}</option>
													      		<?php } ?>
												      		</select>
												      	</td>
												      	<td>
															<input type="text" class="form-control" placeholder="Enter Note for the hotel" name="specialRequests[3][{{$i}}]">
												      	</td>
												      	<td>&nbsp;</td>
												    </tr> -->
												  	<?php } ?>


												  	<?php
											  	if($cartExperiencesToRoomsRequest->count()>0){
												  	foreach ($cartExperiencesToRoomsRequest as $key => $value) {
												  		if($value->room_id == '3'){
												  		$ceTrR = [];
													  	foreach ($value->cartExperiencesToRoomsRequests as $keyCRR => $valueCRR) {
												  			$ceTrR[] = $valueCRR->room_requests_id;
													  	}

													  	if(($value->status == -1) && ($value->cancellation_request_status == 'approved')){
													  		continue;
													  	}
													  	if(($value->room_request_status == 'cancelled')){ 
													  		continue;
													  	}
												  	 ?>
												  		  @hasrole('Collaborator')
											  	 <?php
													
													$today = strtotime("today");
													$minusDays = strtotime('-28 days',strtotime($cart_experience[0]->date_from));
													if($today >= $minusDays){
														if(!empty($value->is_optional_room)){
																
																echo '<tr>';
																}else{
																		echo '<tr class="table table-disaled">';
																}
													}else{
														echo '<tr>';
													}
													?>
											  		@else
											  		<tr class="table table-disaled" style="pointer-events: none;">
										  			@endhasrole
													      	<td scope="row">
														      	<div class="checkarea_part_Dates ">
														      		<?php
														      		if(($value->status == -1) && ($value->cancellation_request_status == null)){
														      			//echo '<label>Pending cancellation</label>';
														      			?>
														      			<div class="sk_status_change_{{$value->id}}">
												      						<p class="sk_pending"><b> Status: Pending cancellation </b></p>
												      						
																			<label>Cancellation request pending...</label>
																			<a href="javascript:;" class="sk_cancel_btn" style="color:red;" data-id="{{$value->id}}" data-type="declined"><p>Cancel request</p></a>
																		</div>
														      			<?php
														      		}elseif($value->room_request_status == 'approved'){
																	?>
																	<div>
																		<small class="sk_success">Status: Requested Additional Room</small>
																		<!-- <label class="checkbox_div">
											                              <input type="checkbox" class="custom_chkbox tagchkbox notClickedCls " value="1" name="roomPaidEdit[3][{{$value->id}}]" <?php echo $value->status == '1'?'checked': ''?>> <span class="notClickedCls"></span>
											                              <span class="checkmark"></span>
											                            </label> -->
											                            <div class="checkarea_part_Dates">
																			
																			<label class="checkbox_div">
																			  <input type="checkbox" class="custom_chkbox tagchkbox notClickedCls sk_dep" value="1" name="roomDepositEdit[3][{{$value->id}}]" <?php echo $value->deposit == '1'?'checked': ''?>> <span class="notClickedCls"></span>
																			  <span class="checkmark"></span>
																			  <span class="sk_label">Deposit Paid</span>
																			</label>

																			<label class="checkbox_div">
																			  <input type="checkbox" class="custom_chkbox tagchkbox notClickedCls sk_paid" value="1" name="roomPaidFullEdit[3][{{$value->id}}]" <?php echo $value->paid == '1'?'checked': ''?>> <span class="notClickedCls"></span>
																			  <span class="checkmark"></span>
																			  <span class="sk_label">Paid in full</span>
																			</label>
																		</div>
											                            <!-- <a href="" style="visibility: none">$&nbsp;</a> -->
											                        </div>
																	<?php
													      			}else if($value->room_request_status == 'pending'){
												      					?>
												      					<div class="sk_status_change_{{$value->id}}">
												      						<p class="sk_pending">Status: Pending</p>
												      						<br>
																			<label>Room request pending...</label>	
																			<a href="javascript:;" class="sk_cancel_btn" style="color:red;" data-id="{{$value->id}}" data-type="cancel"><p>Cancel request</p></a>
																		</div>
												      					<?php
													      			//}else if($value->room_request_status == 'declined'){
												      					?> 
												      						<!--<small class="sk_pending">Status: Declined</small>
																			<label>Single room request declined...</label>-->

												      					<?php
													      			}else if($value->room_request_status == 'cancelled'){
													      				?>
												      					<small class="sk_pending">Status: Cancelled</small>
													      				<?php
													      			}
													      			?>	
										                        </div>
													      	</td>
													      	<td>
																<?php
																$pen_can = 0;
																$dbl_sole = 0;
														      		$supplements = array();
														      		if(!empty($roomsSupplementsRequest)){ 
														      			foreach ($roomsSupplementsRequest as $rskey => $rsvalue) {
														      				
														      				if($rsvalue['cart_experiences_to_rooms_id'] == $value->id){
														      					if($rsvalue['upgrade_request_sup_status'] == 'pending')
														      					{
														      						$pen_can = 1;
														      					}
														      					if($rsvalue['supplements'] == 1){
														      						$rsvalue['supplements'] = 'Water view (Sea/Lake/River) : '.$rsvalue['upgrade_request_sup_status'];
														      					}elseif($rsvalue['supplements'] == 2){
														      						$rsvalue['supplements'] = 'View (Garden/Balcony) : '.$rsvalue['upgrade_request_sup_status'];
														      					}elseif($rsvalue['supplements'] == 3){
														      						$rsvalue['supplements'] = 'Executive/De Luxe/Superior Rooms : '.$rsvalue['upgrade_request_sup_status'];
														      					}elseif($rsvalue['supplements'] == 4){
														      						$dbl_sole  = ((isset($rsvalue['upgrade_request_sup_status']) && $rsvalue['upgrade_request_sup_status'] == 'accepted')?'1':'1');
														      						$rsvalue['supplements'] = 'Dbl/tw room for sole : '.$rsvalue['upgrade_request_sup_status'];
														      					}elseif($rsvalue['supplements'] == 7){
														      						$rsvalue['supplements'] = 'Walk In Shower : '.$rsvalue['upgrade_request_sup_status'];
														      					}elseif($rsvalue['supplements'] == 8){
														      						$rsvalue['supplements'] = 'Ground Floor Room : '.$rsvalue['upgrade_request_sup_status'];
														      					}elseif($rsvalue['supplements'] == 5){
												      						$rsvalue['supplements'] = $rsvalue['upgrade_name'].' : '.$rsvalue['upgrade_request_sup_status'];
												      					}
												      					$supplements[] = $rsvalue['supplements'];
														      				}
														      			}
														      		}
														      		//addtional room supplements
														      		$room_type_supplements = array();

																  	foreach ($value->cartExperiencesToRoomsRequests as $keyCRR => $valueCRR) {

															  			if($valueCRR['room_requests_id'] == 1){
														      						$valueCRR['supplements'] = 'Water view (Sea/Lake/River)';
														      					}elseif($valueCRR['room_requests_id'] == 2){
														      						$valueCRR['supplements'] = 'View (Garden/Balcony)';
														      					}elseif($valueCRR['room_requests_id'] == 3){
														      						$valueCRR['supplements'] = 'Executive/De Luxe/Superior Rooms';
														      					}elseif($valueCRR['room_requests_id'] == 4){
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
													      		$names = array(); 
													      		if(!empty($value->names)){
													      			$names = explode(',', $value->names);
													      		} ?>
																<input type="text" class="form-control" placeholder="Enter name" name="singleRoomNameEdit[3][{{$value->id}}][]" value="{{@$names[0]}}">
																<input type="text" <?=!empty($dbl_sole)?'disabled':''?> class="form-control" placeholder="Enter name" name="singleRoomNameEdit[3][{{$value->id}}][]" value="{{@$names[1]}}">
													      	</td>
													      	<?php
																$today = strtotime("today");
																$minusDaysUp = strtotime('-14 days',strtotime($cart_experience[0]->date_from));
																if($today >= $minusDaysUp){
																	echo '<td class="suppliment table-disaled" style="pointer-events: none;">';
																}else{
																	echo '<td class="suppliment">';
																}
																?>
													      		
																<?php /*if(!empty($value->upgrade_request_status)){ */?>
																	<?php 
																	
														      		if(!empty($supplements)){
														      			echo implode('<br>', $supplements);
														      			echo '<br>';
														      			if(!empty($value->upgrade_request_status)){
														      			if(empty($pen_can)){ ?>
														      			<br><a data-fancybox data-type="ajax" data-src="" href="/request-supplements/{{$value->id}}/{{$HotelDatesID}}/{{$cart_experience[0]->id}}"  style="color: #FCA311;font-size: 14px;">Add</a>
														      				<?php } } 
														      		}else{
														      		if(empty($room_type_supplements)){
														      		?>
															      		<i>No requests made</i>
															      	<?php } } ?>
													      		
													      		<?php /*}else{ */?>
													      			
													      			<label><?php 
															      		/*$selected = [];
															      		foreach ($roomRequests as $keyrm => $valuerm) {
															      			
															      			if (in_array($valuerm->id, $ceTrR)){
															      				$selected[] =  $valuerm->name;
															      			}
															      		}
															      		echo implode(', ', $selected);*/
															      		 ?></label>
															      		 
															      		  <?php 
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

														      	<?php /*}*/ ?>
														      	@hasrole('Collaborator')
														      	<?php if(!empty($value->upgrade_request_status)){
														      	if(!empty($pen_can)){ ?>
														      		<br><i>Upgrade Request <?php echo ucwords($value->upgrade_request_status); ?></i>
														      		<br><a class="cancelUpgrade" href="javascript:;" data-src="{{ route('request-supplements-cancel', $value->id) }}/?hotel_dates_id=<?php echo $HotelDatesID; ?>&cart_id=<?php echo $cart_experience[0]->id; ?>" style="color: #FCA311;font-size: 14px;">Cancel Upgrade</a><br>
													      		<?php } }else{ ?>
													      			<br><a data-fancybox data-type="ajax" data-src="" href="/request-supplements/{{$value->id}}/{{$HotelDatesID}}/{{$cart_experience[0]->id}}"  style="color: #FCA311;font-size: 14px;" class="up-request">Request</a><br>
													      		<?php } ?>
																 @else
																	<?php if(!empty($value->upgrade_request_status)){
																	if(!empty($pen_can)){  ?>
														      		<!-- <br><i>Upgrade Request <?php echo ucwords($value->upgrade_request_status); ?></i> -->
														      		<br><a class="cancelUpgrade" href="javascript:;" data-src="{{ route('request-supplements-cancel', $value->id) }}/?hotel_dates_id=<?php echo $HotelDatesID; ?>&cart_id=<?php echo $cart_experience[0]->id; ?>" style="color: #FCA311;font-size: 14px;">Cancel Upgrade</a><br>
													      		<?php } }else{ ?>
													      			<br><a data-fancybox data-type="ajax" data-src="" href="/request-supplements/{{$value->id}}/{{$HotelDatesID}}/{{$cart_experience[0]->id}}"  style="color: #FCA311;font-size: 14px;">Add</a>
													      		<?php } ?> 
													      		@endhasrole
																
													      	</td>
													      	<td>
																<textarea class="form-control"  placeholder="Enter Note for the hotel" name="specialRequestsEdit[3][{{$value->id}}]">{{$value->specials}}</textarea>
													      	</td>
													      	<td>
													      		
													      	</td>
													    </tr>
												  	<?php 
												  		$sngCnt++;
												  		}
												  	}
												  }

											  	?>
											  	<!-- room optional -->
											  	<?php 
												  	
											  	foreach ($cartExperiencesToRooms as $key => $value) {
											  		if($value->room_id == '3' && !empty($value->is_optional_room)){
											  			$ceTrR = [];
												  	foreach ($value->cartExperiencesToRoomsRequests as $keyCRR => $valueCRR) {
											  			$ceTrR[] = $valueCRR->room_requests_id;
												  	}
												  	if(($value->status == -1) && ($value->cancellation_request_status == 'approved')){
													  		continue;
													  	}
													  	if(($value->room_request_status == 'cancelled')){ 
													  		continue;
													  	}
											  	 ?>
											  		  @hasrole('Collaborator')
											  	 <?php
													
													$today = strtotime("today");
													$minusDays = strtotime('-28 days',strtotime($cart_experience[0]->date_from));
													if(strtotime($cart_experience[0]->date_from) > $today)
								                	{
														if($today >= $minusDays){
															if(!empty($value->is_optional_room)){
																	
																	echo '<tr>';
																	}else{
																			echo '<tr class="table table-disaled" >';
																	}
														}else{
															echo '<tr>';
														}
													}else{
															echo '<tr class="table table-disaled" style="pointer-events: none;">';
														}
													?>
											  		@else
											  		<tr class="table table-disaled" style="pointer-events: none;">
										  			@endhasrole
												      	<td scope="row" style="text-align:center;">
												      		<?php
												      		if(($value->status == -1) && ($value->cancellation_request_status == null)){
												      			//echo '<label>Pending cancellation</label>';
												      			?>
														      			<div class="sk_status_change_{{$value->id}}">
												      						<p class="sk_pending"><b> Status: Pending cancellation </b></p>
												      						
																			<label>Cancellation request pending...</label>
																			<a href="javascript:;" class="sk_cancel_btn" style="color:red;" data-id="{{$value->id}}" data-type="declined"><p>Cancel request</p></a>
																		</div>
														      			<?php
												      		}else{
															?>
															<?php if(!empty($value->is_optional_room)){
																?>
																<small class="sk_success"><b>Status: Room on Option</b></small>
																<?php
															} ?>
													      	<div class="checkarea_part_Dates">
									                            <!-- <label class="checkbox_div">
									                              <input type="checkbox" class="custom_chkbox tagchkbox notClickedCls sk_con" value="1" name="roomPaidEdit[3][{{$value->id}}]" <?php echo $value->status == '1'?'checked': ''?>> <span class="notClickedCls"></span>
									                              <span class="checkmark"></span>
									                              <span class="sk_label">Provisional</span>
									                            </label> -->

									                            <label class="checkbox_div">
									                              <input type="checkbox" class="custom_chkbox tagchkbox notClickedCls sk_dep" value="1" name="roomDepositEdit[3][{{$value->id}}]" <?php echo $value->deposit == '1'?'checked': ''?>> <span class="notClickedCls"></span>
									                              <span class="checkmark"></span>
									                              <span class="sk_label">Deposit Paid</span>
									                            </label>

									                            <label class="checkbox_div">
									                              <input type="checkbox" class="custom_chkbox tagchkbox notClickedCls sk_paid" value="1" name="roomPaidFullEdit[3][{{$value->id}}]" <?php echo $value->paid == '1'?'checked': ''?>> <span class="notClickedCls"></span>
									                              <span class="checkmark"></span>
									                              <span class="sk_label">Paid in full</span>
									                            </label>
									                        </div>
									                    	<?php } ?>
												      	</td>
												      	<td>
												      		<?php
												      		$supplements = array();
												      		$pen_can = 0;
												      		$dbl_sole = 0;
												      		if(!empty($roomsSupplementsRequest)){
												      			foreach ($roomsSupplementsRequest as $rskey => $rsvalue) {
												      				if($rsvalue['cart_experiences_to_rooms_id'] == $value->id){
												      					if($rsvalue['upgrade_request_sup_status'] == 'pending')
														      					{
														      						$pen_can = 1;
														      					}
												      					if($rsvalue['supplements'] == 1){
														      						$rsvalue['supplements'] = 'Water view (Sea/Lake/River) : '.$rsvalue['upgrade_request_sup_status'];
														      					}elseif($rsvalue['supplements'] == 2){
														      						$rsvalue['supplements'] = 'View (Garden/Balcony) : '.$rsvalue['upgrade_request_sup_status'];
														      					}elseif($rsvalue['supplements'] == 3){
														      						$rsvalue['supplements'] = 'Executive/De Luxe/Superior Rooms : '.$rsvalue['upgrade_request_sup_status'];
														      					}elseif($rsvalue['supplements'] == 4){
														      						$dbl_sole  = ((isset($rsvalue['upgrade_request_sup_status']) && $rsvalue['upgrade_request_sup_status'] == 'accepted')?'1':'1');
														      						$rsvalue['supplements'] = 'Dbl/tw room for sole : '.$rsvalue['upgrade_request_sup_status'];
														      					}elseif($rsvalue['supplements'] == 7){
														      						$rsvalue['supplements'] = 'Walk In Shower : '.$rsvalue['upgrade_request_sup_status'];
														      					}elseif($rsvalue['supplements'] == 8){
														      						$rsvalue['supplements'] = 'Ground Floor Room : '.$rsvalue['upgrade_request_sup_status'];
														      					}elseif($rsvalue['supplements'] == 5){
												      						$rsvalue['supplements'] = $rsvalue['upgrade_name'].' : '.$rsvalue['upgrade_request_sup_status'];
												      					}
												      					$supplements[] = $rsvalue['supplements'];
												      				}
												      			}
												      		}
												      		$names = array(); 
												      		if(!empty($value->names)){
												      			$names = explode(',', $value->names);
												      		} ?>
															<input type="text" class="form-control" placeholder="Enter name" name="singleRoomNameEdit[3][{{$value->id}}][]" value="{{@$names[0]}}">
															<input type="text" <?=!empty($dbl_sole)?'disabled':''?> class="form-control" placeholder="Enter name" name="singleRoomNameEdit[3][{{$value->id}}][]" value="{{@$names[1]}}">
												      	</td>
												      	<?php
															$today = strtotime("today");
															$minusDaysUp = strtotime('-14 days',strtotime($cart_experience[0]->date_from));
															if($today >= $minusDaysUp){
																echo '<td class="sadasd table-disaled">';
															}else{
																echo '<td class="sadasd">';
															}
															?>
												      		<?php 
												      		
												      		if(!empty($supplements)){
												      			echo implode('<br>', $supplements);
												      			if(!empty($value->upgrade_request_status)){
														      			if(empty($pen_can)){ ?>
														      			<br><a data-fancybox data-type="ajax" data-src="" href="/request-supplements/{{$value->id}}/{{$HotelDatesID}}/{{$cart_experience[0]->id}}"  style="color: #FCA311;font-size: 14px;">Add</a>
														      				<?php } } 
												      		}else{
												      		?>
													      		<i>No requests made</i>
													      	<?php } ?>
													      	@hasrole('Collaborator')
													      	<?php if(!empty($value->upgrade_request_status)){ 
													      		if(!empty($pen_can)){?>
													      		<br><i>Upgrade Request <?php echo ucwords($value->upgrade_request_status); ?></i>
													      		<br><a class="cancelUpgrade" href="javascript:;" data-src="{{ route('request-supplements-cancel', $value->id) }}/?hotel_dates_id=<?php echo $HotelDatesID; ?>&cart_id=<?php echo $cart_experience[0]->id; ?>" style="color: #FCA311;font-size: 14px;">Cancel Upgrade</a>
												      		<?php }}else{ ?>
												      			<br><a data-fancybox data-type="ajax" data-src="" href="/request-supplements/{{$value->id}}/{{$HotelDatesID}}/{{$cart_experience[0]->id}}"  style="color: #FCA311;font-size: 14px;" class="up-request">Request</a>
												      		<?php } ?>
															 @else
																<?php if(!empty($value->upgrade_request_status)){
																if(!empty($pen_can)){ ?>
													      		<!-- <br><i>Upgrade Request <?php echo ucwords($value->upgrade_request_status); ?></i> -->
													      		<br><a class="cancelUpgrade" href="javascript:;" data-src="{{ route('request-supplements-cancel', $value->id) }}/?hotel_dates_id=<?php echo $HotelDatesID; ?>&cart_id=<?php echo $cart_experience[0]->id; ?>" style="color: #FCA311;font-size: 14px;">Cancel Upgrade</a>
												      		<?php } }else{ ?>
												      			<br><a data-fancybox data-type="ajax" data-src="" href="/request-supplements/{{$value->id}}/{{$HotelDatesID}}/{{$cart_experience[0]->id}}"  style="color: #FCA311;font-size: 14px;">Add</a>
												      		<?php } ?> 
												      		@endhasrole
												      		<!-- <select name="roomRequestsEdit[1][{{$value->id}}][]" class="selectCls" multiple="">
												      			<option value="0">None</option>
													      		<?php foreach ($roomRequests as $keyrm => $valuerm) {
													      			$selected = '';
													      			if (in_array($valuerm->id, $ceTrR)){
													      				$selected = 'selected';
													      			}
													      		 ?>
													      			<option value="{{ $valuerm->id }}" {{$selected}}>{{ $valuerm->name }}</option>
													      		<?php } ?>
												      		</select> -->
												      	</td>
												      	<td>
															<textarea class="form-control"  placeholder="Enter Note for the hotel" name="specialRequestsEdit[3][{{$value->id}}]">{{$value->specials}}</textarea>
												      	</td>
												      	<td>
												      		@hasrole('Collaborator')

												      		@else
												      		@if(!empty($value->deposit) || !empty($value->paid) || !empty($names[0]))
													      		@else
														      		@if(empty($supplements))
														      			<a class="removeRoomsCls removeRoomsIconCls btn" data-id="{{$value->id}}"><i class="fas fa-trash-alt"></i></a>
														      		@endif
													      		@endif
												      		@endhasrole
												      	</td>
												    </tr>
											  	<?php 
											  		$twnCnt++;
											  		}
											  	}
												  ?>
											  	</tbody>
											</table>
										</div> 
									</div>
								</div>
							@endif
							@if ($trpLastAmt > 0)
								<div class="tab-pane {{(!empty($LastAddedRequest) && $LastAddedRequest->room_id == 4)?'active':''}}" id="TripleRooms" role="tabpanel">
									<div class="row">
										<div class="col-sm-12">
												@hasrole('Collaborator')
													<?php
												$today = strtotime("today");
												$minusDays = strtotime('-28 days',strtotime($cart_experience[0]->date_from));
												if($today >= $minusDays){
													//echo '<table class="table table-disaled" style="pointer-events: none;">';
													echo '<table class="table">';
												}else{
													echo '<table class="table">';
												}
												?>
											@else
												<table class="table table-disaled" style="pointer-events: none;">
												@endhasrole
											  	<thead>
												    <tr>
												      <th scope="col">Mark as paid </th>
												      <th scope="col">Name</th>
												      <th scope="col">Room request </th>
												      <th scope="col">Note for the hotel</th>
												      <th scope="col">&nbsp;</th>
												    </tr>
											  	</thead>
											  	<tbody class="tblBorderCls">
												  	<?php 
												  	$twnCnt = 1;
											  	foreach ($cartExperiencesToRooms as $key => $value) {
											  		if($value->room_id == '4' && empty($value->is_optional_room)){
											  			$ceTrR = [];
												  	foreach ($value->cartExperiencesToRoomsRequests as $keyCRR => $valueCRR) {
											  			$ceTrR[] = $valueCRR->room_requests_id;
												  	}
												  	if(($value->status == -1) && ($value->cancellation_request_status == 'approved')){
													  		continue;
													  	}
													  	if(($value->room_request_status == 'cancelled')){ 
													  		continue;
													  	}
											  	 ?>
											  		  @hasrole('Collaborator')
											  	 <?php
													
													$today = strtotime("today");
													$minusDays = strtotime('-28 days',strtotime($cart_experience[0]->date_from));
													if($today >= $minusDays){
														if(!empty($value->is_optional_room)){
																
																echo '<tr>';
																}else{
																		echo '<tr class="table table-disaled">';
																}
													}else{
														echo '<tr>';
													}
													?>
											  		@else
											  		<tr class="table table-disaled" style="pointer-events: none;">
										  			@endhasrole
												      	<td scope="row" style="text-align:center;">
												      		<?php
												      		if(($value->status == -1) && ($value->cancellation_request_status == null)){
												      			//echo '<label>Pending cancellation</label>';
												      			?>
														      			<div class="sk_status_change_{{$value->id}}">
												      						<p class="sk_pending"><b> Status: Pending cancellation </b></p>
												      						
																			<label>Cancellation request pending...</label>
																			<a href="javascript:;" class="sk_cancel_btn" style="color:red;" data-id="{{$value->id}}" data-type="declined"><p>Cancel request</p></a>
																		</div>
														      			<?php
												      		}else{
															?>
															<?php if(!empty($value->is_optional_room)){
																?>
																<small class="sk_success"><b>Status: Room on Option</b></small>
																<?php
															} ?>
													      	<div class="checkarea_part_Dates">
										                        <!-- <label class="checkbox_div">
										                          <input type="checkbox" class="custom_chkbox tagchkbox notClickedCls sk_con" value="1" name="roomPaidEdit[4][{{$value->id}}]" <?php echo $value->status == '1'?'checked': ''?>> <span class="notClickedCls"></span>
										                          <span class="checkmark"></span>
										                          <span class="sk_label">Provisional</span>
										                        </label> -->

										                        <label class="checkbox_div">
										                          <input type="checkbox" class="custom_chkbox tagchkbox notClickedCls sk_dep" value="1" name="roomDepositEdit[4][{{$value->id}}]" <?php echo $value->deposit == '1'?'checked': ''?>> <span class="notClickedCls"></span>
										                          <span class="checkmark"></span>
										                          <span class="sk_label">Deposit Paid</span>
										                        </label>

										                        <label class="checkbox_div">
										                          <input type="checkbox" class="custom_chkbox tagchkbox notClickedCls sk_paid" value="1" name="roomPaidFullEdit[4][{{$value->id}}]" <?php echo $value->paid == '1'?'checked': ''?>> <span class="notClickedCls"></span>
										                          <span class="checkmark"></span>
										                          <span class="sk_label">Paid in full</span>
										                        </label>
										                    </div>
										                	<?php } ?>
												      	</td>
												      	<td>
												      		<?php
												      		$supplements = array();
												      		$pen_can = 0;
												      		$dbl_sole = 0;
												      		if(!empty($roomsSupplementsRequest)){
												      			foreach ($roomsSupplementsRequest as $rskey => $rsvalue) {
												      				if($rsvalue['cart_experiences_to_rooms_id'] == $value->id){
												      					if($rsvalue['upgrade_request_sup_status'] == 'pending')
													      					{
													      						$pen_can = 1;
													      					}
												      					if($rsvalue['supplements'] == 1){
														      						$rsvalue['supplements'] = 'Water view (Sea/Lake/River) : '.$rsvalue['upgrade_request_sup_status'];
														      					}elseif($rsvalue['supplements'] == 2){
														      						$rsvalue['supplements'] = 'View (Garden/Balcony) : '.$rsvalue['upgrade_request_sup_status'];
														      					}elseif($rsvalue['supplements'] == 3){
														      						$rsvalue['supplements'] = 'Executive/De Luxe/Superior Rooms : '.$rsvalue['upgrade_request_sup_status'];
														      					}elseif($rsvalue['supplements'] == 4){
														      						$dbl_sole  = ((isset($rsvalue['upgrade_request_sup_status']) && $rsvalue['upgrade_request_sup_status'] == 'accepted')?'1':'1');
														      						$rsvalue['supplements'] = 'Dbl/tw room for sole : '.$rsvalue['upgrade_request_sup_status'];
														      					}elseif($rsvalue['supplements'] == 7){
														      						$rsvalue['supplements'] = 'Walk In Shower : '.$rsvalue['upgrade_request_sup_status'];
														      					}elseif($rsvalue['supplements'] == 8){
														      						$rsvalue['supplements'] = 'Ground Floor Room : '.$rsvalue['upgrade_request_sup_status'];
														      					}elseif($rsvalue['supplements'] == 5){
												      						$rsvalue['supplements'] = $rsvalue['upgrade_name'].' : '.$rsvalue['upgrade_request_sup_status'];
												      					}
												      					$supplements[] = $rsvalue['supplements'];
												      				}
												      			}
												      		}
												      		$names = array(); 
												      		if(!empty($value->names)){
												      			$names = explode(',', $value->names);
												      		} ?>
															<input type="text" class="form-control" placeholder="Enter name" name="singleRoomNameEdit[4][{{$value->id}}][]" value="{{@$names[0]}}">
															<input type="text" class="form-control" placeholder="Enter name" name="singleRoomNameEdit[4][{{$value->id}}][]" value="{{@$names[1]}}">
															<input type="text" class="form-control" placeholder="Enter name" name="singleRoomNameEdit[4][{{$value->id}}][]" value="{{@$names[2]}}">
												      	</td>
												      	<?php
															$today = strtotime("today");
															$minusDaysUp = strtotime('-14 days',strtotime($cart_experience[0]->date_from));
															if($today >= $minusDaysUp){
																echo '<td class="sadasd table-disaled" >';
															}else{
																echo '<td class="sadasd">';
															}
															?>
												      		<?php 
												      		
												      		if(!empty($supplements)){
												      			echo implode('<br>', $supplements);
												      			if(!empty($value->upgrade_request_status)){
														      			if(empty($pen_can)){ ?>
														      			<br><a data-fancybox data-type="ajax" data-src="" href="/request-supplements/{{$value->id}}/{{$HotelDatesID}}/{{$cart_experience[0]->id}}"  style="color: #FCA311;font-size: 14px;">Add</a>
														      				<?php } } 
												      		}else{
												      		?>
													      		<i>No requests made</i>
													      	<?php } ?>
													      	@hasrole('Collaborator')
													      	<?php if(!empty($value->upgrade_request_status)){
													      	if(!empty($pen_can)){ ?>
													      		<br><i>Upgrade Request <?php echo ucwords($value->upgrade_request_status); ?></i>
													      		<br><a class="cancelUpgrade" href="javascript:;" data-src="{{ route('request-supplements-cancel', $value->id) }}/?hotel_dates_id=<?php echo $HotelDatesID; ?>&cart_id=<?php echo $cart_experience[0]->id; ?>" style="color: #FCA311;font-size: 14px;">Cancel Upgrade</a>
												      		<?php } }else{ ?>
												      			<br><a data-fancybox data-type="ajax" data-src="" href="/request-supplements/{{$value->id}}/{{$HotelDatesID}}/{{$cart_experience[0]->id}}"  style="color: #FCA311;font-size: 14px;" class="up-request">Request</a>
												      		<?php } ?>
															 @else
																<?php if(!empty($value->upgrade_request_status)){ 
																	if(!empty($pen_can)){?>
													      		<!-- <br><i>Upgrade Request <?php echo ucwords($value->upgrade_request_status); ?></i> -->
													      		<br><a class="cancelUpgrade" href="javascript:;" data-src="{{ route('request-supplements-cancel', $value->id) }}/?hotel_dates_id=<?php echo $HotelDatesID; ?>&cart_id=<?php echo $cart_experience[0]->id; ?>" style="color: #FCA311;font-size: 14px;">Cancel Upgrade</a>
												      		<?php } }else{ ?>
												      			<br><a data-fancybox data-type="ajax" data-src="" href="/request-supplements/{{$value->id}}/{{$HotelDatesID}}/{{$cart_experience[0]->id}}"  style="color: #FCA311;font-size: 14px;">Add</a>
												      		<?php } ?> 
												      		@endhasrole
												      		<!-- <select name="roomRequestsEdit[1][{{$value->id}}][]" class="selectCls" multiple="">
												      			<option value="0">None</option>
													      		<?php foreach ($roomRequests as $keyrm => $valuerm) {
													      			$selected = '';
													      			if (in_array($valuerm->id, $ceTrR)){
													      				$selected = 'selected';
													      			}
													      		 ?>
													      			<option value="{{ $valuerm->id }}" {{$selected}}>{{ $valuerm->name }}</option>
													      		<?php } ?>
												      		</select> -->
												      	</td>
												      	<td>
															<textarea class="form-control"  placeholder="Enter Note for the hotel" name="specialRequestsEdit[4][{{$value->id}}]">{{$value->specials}}</textarea>
												      	</td>
												      	<td>
												      		@hasrole('Collaborator')

												      		@else
												      		@if(!empty($value->deposit) || !empty($value->paid) || !empty($names[0]))
													      		@else
														      		@if(empty($supplements))
														      			<a class="removeRoomsCls removeRoomsIconCls btn" data-id="{{$value->id}}"><i class="fas fa-trash-alt"></i></a>
														      		@endif
													      		@endif
												      		@endhasrole
												      	</td>
												    </tr>
											  	<?php 
											  		$twnCnt++;
											  		}
											  	}
												  	for ($i=1; $i <= $twn-$twnCnt+1; $i++) { ?>
													    <!-- <tr>
												      	<td scope="row">
													      	<div class="checkarea_part_Dates marginLetf40">
										                        <label class="checkbox_div">
										                          <input type="checkbox" class="custom_chkbox tagchkbox notClickedCls " value="1" name="roomPaid[4][{{$i}}]"> <span class="notClickedCls"></span>
										                          <span class="checkmark"></span>
										                        </label>
										                    </div>
												      	</td>
												      	<td>
															<input type="text" class="form-control" placeholder="Enter name" name="singleRoomName[4][{{$i}}]">
												      	</td>
												      	<td>
												      		<select name="roomRequests[4][{{$i}}][]" class="selectCls" multiple="">
												      			<option value="0">None</option>
													      		<?php foreach ($roomRequests as $keyrm => $valuerm) { ?>
													      			<option value="{{ $valuerm->id }}">{{ $valuerm->name }}</option>
													      		<?php } ?>
												      		</select>
												      	</td>
												      	<td>
															<input type="text" class="form-control" placeholder="Enter Note for the hotel" name="specialRequests[4][{{$i}}]">
												      	</td>
												      	<td>&nbsp;</td>
												    </tr> -->
												  	<?php } ?>


												  	<?php
											  	if($cartExperiencesToRoomsRequest->count()>0){
												  	foreach ($cartExperiencesToRoomsRequest as $key => $value) {
												  		if($value->room_id == '4'){
												  		$ceTrR = [];
													  	foreach ($value->cartExperiencesToRoomsRequests as $keyCRR => $valueCRR) {
												  			$ceTrR[] = $valueCRR->room_requests_id;
													  	}

													  	if(($value->status == -1) && ($value->cancellation_request_status == 'approved')){
													  		continue;
													  	}
													  	if(($value->room_request_status == 'cancelled')){ 
													  		continue;
													  	}
												  	 ?>
												  		  @hasrole('Collaborator')
											  	 <?php
													
													$today = strtotime("today");
													$minusDays = strtotime('-28 days',strtotime($cart_experience[0]->date_from));
													if($today >= $minusDays){
														if(!empty($value->is_optional_room)){
																
																echo '<tr>';
																}else{
																		echo '<tr class="table table-disaled" >';
																}
													}else{
														echo '<tr>';
													}
													?>
											  		@else
											  		<tr class="table table-disaled" style="pointer-events: none;">
										  			@endhasrole
													      	<td scope="row">
														      	<div class="checkarea_part_Dates ">
														      		<?php
														      		if(($value->status == -1) && ($value->cancellation_request_status == null)){
														      			//echo '<label>Pending cancellation</label>';
														      			?>
														      			<div class="sk_status_change_{{$value->id}}">
												      						<p class="sk_pending"><b> Status: Pending cancellation </b></p>
												      						
																			<label>Cancellation request pending...</label>
																			<a href="javascript:;" class="sk_cancel_btn" style="color:red;" data-id="{{$value->id}}" data-type="declined"><p>Cancel request</p></a>
																		</div>
														      			<?php
														      		}elseif($value->room_request_status == 'approved'){
																	?>
																	<div>
																		<small class="sk_success">Status: Requested Additional Room</small>
																		<!-- <label class="checkbox_div">
											                              <input type="checkbox" class="custom_chkbox tagchkbox notClickedCls " value="1" name="roomPaidEdit[4][{{$value->id}}]" <?php echo $value->status == '1'?'checked': ''?>> <span class="notClickedCls"></span>
											                              <span class="checkmark"></span>
											                            </label> -->
											                            <div class="checkarea_part_Dates">
																			
																			<label class="checkbox_div">
																			  <input type="checkbox" class="custom_chkbox tagchkbox notClickedCls sk_dep" value="1" name="roomDepositEdit[4][{{$value->id}}]" <?php echo $value->deposit == '1'?'checked': ''?>> <span class="notClickedCls"></span>
																			  <span class="checkmark"></span>
																			  <span class="sk_label">Deposit Paid</span>
																			</label>

																			<label class="checkbox_div">
																			  <input type="checkbox" class="custom_chkbox tagchkbox notClickedCls sk_paid" value="1" name="roomPaidFullEdit[4][{{$value->id}}]" <?php echo $value->paid == '1'?'checked': ''?>> <span class="notClickedCls"></span>
																			  <span class="checkmark"></span>
																			  <span class="sk_label">Paid in full</span>
																			</label>
																		</div>
											                            <!-- <a href="" style="visibility: none">$&nbsp;</a> -->
											                        </div>
																	<?php
													      			}else if($value->room_request_status == 'pending'){
												      					?>
												      					<div class="sk_status_change_{{$value->id}}">
												      						<p class="sk_pending">Status: Pending</p>
												      						<br>
																			<label>Room request pending...</label>	
																			<a href="javascript:;" class="sk_cancel_btn" style="color:red;" data-id="{{$value->id}}" data-type="cancel"><p>Cancel request</p></a>
																		</div>
												      					<?php
													      			//}else if($value->room_request_status == 'declined'){
												      					?> 
												      						<!--<small class="sk_pending">Status: Declined</small>
																			<label>Single room request declined...</label>-->

												      					<?php
													      			}else if($value->room_request_status == 'cancelled'){
													      				?>
												      					<small class="sk_pending">Status: Cancelled</small>
													      				<?php
													      			}
													      			?>	
										                        </div>
													      	</td>
													      	<td>
																<?php
																$pen_can = 0;
																$dbl_sole = 0;
														      		$supplements = array();
														      		if(!empty($roomsSupplementsRequest)){ 
														      			foreach ($roomsSupplementsRequest as $rskey => $rsvalue) {
														      				
														      				if($rsvalue['cart_experiences_to_rooms_id'] == $value->id){
														      					if($rsvalue['upgrade_request_sup_status'] == 'pending')
														      					{
														      						$pen_can = 1;
														      					}
														      					if($rsvalue['supplements'] == 1){
														      						$rsvalue['supplements'] = 'Water view (Sea/Lake/River) : '.$rsvalue['upgrade_request_sup_status'];
														      					}elseif($rsvalue['supplements'] == 2){
														      						$rsvalue['supplements'] = 'View (Garden/Balcony) : '.$rsvalue['upgrade_request_sup_status'];
														      					}elseif($rsvalue['supplements'] == 3){
														      						$rsvalue['supplements'] = 'Executive/De Luxe/Superior Rooms : '.$rsvalue['upgrade_request_sup_status'];
														      					}elseif($rsvalue['supplements'] == 4){
														      						$dbl_sole  = ((isset($rsvalue['upgrade_request_sup_status']) && $rsvalue['upgrade_request_sup_status'] == 'accepted')?'1':'1');
														      						$rsvalue['supplements'] = 'Dbl/tw room for sole : '.$rsvalue['upgrade_request_sup_status'];
														      					}elseif($rsvalue['supplements'] == 7){
														      						$rsvalue['supplements'] = 'Walk In Shower : '.$rsvalue['upgrade_request_sup_status'];
														      					}elseif($rsvalue['supplements'] == 8){
														      						$rsvalue['supplements'] = 'Ground Floor Room : '.$rsvalue['upgrade_request_sup_status'];
														      					}elseif($rsvalue['supplements'] == 5){
												      						$rsvalue['supplements'] = $rsvalue['upgrade_name'].' : '.$rsvalue['upgrade_request_sup_status'];
												      					}
												      					$supplements[] = $rsvalue['supplements'];
														      				}
														      			}
														      		}
														      		//addtional room supplements
														      		$room_type_supplements = array();

																  	foreach ($value->cartExperiencesToRoomsRequests as $keyCRR => $valueCRR) {

															  			if($valueCRR['room_requests_id'] == 1){
														      						$valueCRR['supplements'] = 'Water view (Sea/Lake/River)';
														      					}elseif($valueCRR['room_requests_id'] == 2){
														      						$valueCRR['supplements'] = 'View (Garden/Balcony)';
														      					}elseif($valueCRR['room_requests_id'] == 3){
														      						$valueCRR['supplements'] = 'Executive/De Luxe/Superior Rooms';
														      					}elseif($valueCRR['room_requests_id'] == 4){
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
													      		$names = array(); 
													      		if(!empty($value->names)){
													      			$names = explode(',', $value->names);
													      		} ?>
																<input type="text" class="form-control" placeholder="Enter name" name="singleRoomNameEdit[4][{{$value->id}}][]" value="{{@$names[0]}}">
																<input type="text" <?=!empty($dbl_sole)?'disabled':''?> class="form-control" placeholder="Enter name" name="singleRoomNameEdit[4][{{$value->id}}][]" value="{{@$names[1]}}">
													      	</td>
													      	<?php
																$today = strtotime("today");
																$minusDaysUp = strtotime('-14 days',strtotime($cart_experience[0]->date_from));
																if($today >= $minusDaysUp){
																	echo '<td class="suppliment table-disaled" >';
																}else{
																	echo '<td class="suppliment">';
																}
																?>
													      		
																<?php /*if(!empty($value->upgrade_request_status)){ */?>
																	<?php 
																	
														      		if(!empty($supplements)){
														      			echo implode('<br>', $supplements);
														      			echo '<br>';
														      			if(!empty($value->upgrade_request_status)){
														      			if(empty($pen_can)){ ?>
														      			<br><a data-fancybox data-type="ajax" data-src="" href="/request-supplements/{{$value->id}}/{{$HotelDatesID}}/{{$cart_experience[0]->id}}"  style="color: #FCA311;font-size: 14px;">Add</a>
														      				<?php } } 
														      		}else{
														      		if(empty($room_type_supplements)){
														      		?>
															      		<i>No requests made</i>
															      	<?php } } ?>
													      		
													      		<?php /*}else{ */?>
													      			
													      			<label><?php 
															      		/*$selected = [];
															      		foreach ($roomRequests as $keyrm => $valuerm) {
															      			
															      			if (in_array($valuerm->id, $ceTrR)){
															      				$selected[] =  $valuerm->name;
															      			}
															      		}
															      		echo implode(', ', $selected);*/
															      		 ?></label>
															      		 
															      		  <?php 
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

														      	<?php /*}*/ ?>
														      	@hasrole('Collaborator')
														      	<?php if(!empty($value->upgrade_request_status)){
														      	if(!empty($pen_can)){ ?>
														      		<br><i>Upgrade Request <?php echo ucwords($value->upgrade_request_status); ?></i>
														      		<br><a class="cancelUpgrade" href="javascript:;" data-src="{{ route('request-supplements-cancel', $value->id) }}/?hotel_dates_id=<?php echo $HotelDatesID; ?>&cart_id=<?php echo $cart_experience[0]->id; ?>" style="color: #FCA311;font-size: 14px;">Cancel Upgrade</a><br>
													      		<?php } }else{ ?>
													      			<br><a data-fancybox data-type="ajax" data-src="" href="/request-supplements/{{$value->id}}/{{$HotelDatesID}}/{{$cart_experience[0]->id}}"  style="color: #FCA311;font-size: 14px;" class="up-request">Request</a><br>
													      		<?php } ?>
																 @else
																	<?php if(!empty($value->upgrade_request_status)){
																	if(!empty($pen_can)){  ?>
														      		<!-- <br><i>Upgrade Request <?php echo ucwords($value->upgrade_request_status); ?></i> -->
														      		<br><a class="cancelUpgrade" href="javascript:;" data-src="{{ route('request-supplements-cancel', $value->id) }}/?hotel_dates_id=<?php echo $HotelDatesID; ?>&cart_id=<?php echo $cart_experience[0]->id; ?>" style="color: #FCA311;font-size: 14px;">Cancel Upgrade</a><br>
													      		<?php } }else{ ?>
													      			<br><a data-fancybox data-type="ajax" data-src="" href="/request-supplements/{{$value->id}}/{{$HotelDatesID}}/{{$cart_experience[0]->id}}"  style="color: #FCA311;font-size: 14px;">Add</a>
													      		<?php } ?> 
													      		@endhasrole
																
													      	</td>
													      	<td>
																<textarea class="form-control"  placeholder="Enter Note for the hotel" name="specialRequestsEdit[4][{{$value->id}}]">{{$value->specials}}</textarea>
													      	</td>
													      	<td>
													      		
													      	</td>
													    </tr>
												  	<?php 
												  		$sngCnt++;
												  		}
												  	}
												  }

											  	?>
											  
											  	</tbody>
											</table>
										</div> 
									</div>
								</div>
							@endif
							@if ($qrdLastAmt > 0)
								<div class="tab-pane {{(!empty($LastAddedRequest) && $LastAddedRequest->room_id == 5)?'active':''}}" id="QuadrupleRooms" role="tabpanel">
									<div class="row">
										<div class="col-sm-12">
												@hasrole('Collaborator')
													<?php
												$today = strtotime("today");
												$minusDays = strtotime('-28 days',strtotime($cart_experience[0]->date_from));
												if($today >= $minusDays){
													//echo '<table class="table table-disaled" style="pointer-events: none;">';
													echo '<table class="table">';
												}else{
													echo '<table class="table">';
												}
												?>
											@else
												<table class="table table-disaled" style="pointer-events: none;">
												@endhasrole
											  	<thead>
												    <tr>
												      <th scope="col">Mark as paid </th>
												      <th scope="col">Name</th>
												      <th scope="col">Room request </th>
												      <th scope="col">Note for the hotel</th>
												      <th scope="col">&nbsp;</th>
												    </tr>
											  	</thead>
											  	<tbody class="tblBorderCls">
												  	<?php 
												  	$twnCnt = 1;
											  	foreach ($cartExperiencesToRooms as $key => $value) {
											  		if($value->room_id == '5' && empty($value->is_optional_room)){
											  			$ceTrR = [];
												  	foreach ($value->cartExperiencesToRoomsRequests as $keyCRR => $valueCRR) {
											  			$ceTrR[] = $valueCRR->room_requests_id;
												  	}
												  	if(($value->status == -1) && ($value->cancellation_request_status == 'approved')){
													  		continue;
													  	}
													  	if(($value->room_request_status == 'cancelled')){ 
													  		continue;
													  	}
											  	 ?>
											  		  @hasrole('Collaborator')
											  	 <?php
													
													$today = strtotime("today");
													$minusDays = strtotime('-28 days',strtotime($cart_experience[0]->date_from));
													if($today >= $minusDays){
														if(!empty($value->is_optional_room)){
																
																echo '<tr>';
																}else{
																		echo '<tr class="table table-disaled">';
																}
													}else{
														echo '<tr>';
													}
													?>
											  		@else
											  		<tr class="table table-disaled" style="pointer-events: none;">
										  			@endhasrole
												      	<td scope="row" style="text-align:center;">
												      		<?php
												      		if(($value->status == -1) && ($value->cancellation_request_status == null)){
												      			//echo '<label>Pending cancellation</label>';
												      			?>
														      			<div class="sk_status_change_{{$value->id}}">
												      						<p class="sk_pending"><b> Status: Pending cancellation </b></p>
												      						
																			<label>Cancellation request pending...</label>
																			<a href="javascript:;" class="sk_cancel_btn" style="color:red;" data-id="{{$value->id}}" data-type="declined"><p>Cancel request</p></a>
																		</div>
														      			<?php
												      		}else{
															?>
															<?php if(!empty($value->is_optional_room)){
																?>
																<small class="sk_success"><b>Status: Room on Option</b></small>
																<?php
															} ?>
													      	<div class="checkarea_part_Dates">
										                        <!-- <label class="checkbox_div">
										                          <input type="checkbox" class="custom_chkbox tagchkbox notClickedCls sk_con" value="1" name="roomPaidEdit[5][{{$value->id}}]" <?php echo $value->status == '1'?'checked': ''?>> <span class="notClickedCls"></span>
										                          <span class="checkmark"></span>
										                          <span class="sk_label">Provisional</span>
										                        </label> -->

										                        <label class="checkbox_div">
										                          <input type="checkbox" class="custom_chkbox tagchkbox notClickedCls sk_dep" value="1" name="roomDepositEdit[5][{{$value->id}}]" <?php echo $value->deposit == '1'?'checked': ''?>> <span class="notClickedCls"></span>
										                          <span class="checkmark"></span>
										                          <span class="sk_label">Deposit Paid</span>
										                        </label>

										                        <label class="checkbox_div">
										                          <input type="checkbox" class="custom_chkbox tagchkbox notClickedCls sk_paid" value="1" name="roomPaidFullEdit[5][{{$value->id}}]" <?php echo $value->paid == '1'?'checked': ''?>> <span class="notClickedCls"></span>
										                          <span class="checkmark"></span>
										                          <span class="sk_label">Paid in full</span>
										                        </label>
										                    </div>
										                	<?php } ?>
												      	</td>
												      	<td>
												      		<?php
												      		$supplements = array();
												      		$pen_can = 0;
												      		$dbl_sole = 0;
												      		if(!empty($roomsSupplementsRequest)){
												      			foreach ($roomsSupplementsRequest as $rskey => $rsvalue) {
												      				if($rsvalue['cart_experiences_to_rooms_id'] == $value->id){
												      					if($rsvalue['upgrade_request_sup_status'] == 'pending')
													      					{
													      						$pen_can = 1;
													      					}
												      					if($rsvalue['supplements'] == 1){
														      						$rsvalue['supplements'] = 'Water view (Sea/Lake/River) : '.$rsvalue['upgrade_request_sup_status'];
														      					}elseif($rsvalue['supplements'] == 2){
														      						$rsvalue['supplements'] = 'View (Garden/Balcony) : '.$rsvalue['upgrade_request_sup_status'];
														      					}elseif($rsvalue['supplements'] == 3){
														      						$rsvalue['supplements'] = 'Executive/De Luxe/Superior Rooms : '.$rsvalue['upgrade_request_sup_status'];
														      					}elseif($rsvalue['supplements'] == 4){
														      						$dbl_sole  = ((isset($rsvalue['upgrade_request_sup_status']) && $rsvalue['upgrade_request_sup_status'] == 'accepted')?'1':'1');
														      						$rsvalue['supplements'] = 'Dbl/tw room for sole : '.$rsvalue['upgrade_request_sup_status'];
														      					}elseif($rsvalue['supplements'] == 7){
														      						$rsvalue['supplements'] = 'Walk In Shower : '.$rsvalue['upgrade_request_sup_status'];
														      					}elseif($rsvalue['supplements'] == 8){
														      						$rsvalue['supplements'] = 'Ground Floor Room : '.$rsvalue['upgrade_request_sup_status'];
														      					}elseif($rsvalue['supplements'] == 5){
												      						$rsvalue['supplements'] = $rsvalue['upgrade_name'].' : '.$rsvalue['upgrade_request_sup_status'];
												      					}
												      					$supplements[] = $rsvalue['supplements'];
												      				}
												      			}
												      		}
												      		$names = array(); 
												      		if(!empty($value->names)){
												      			$names = explode(',', $value->names);
												      		} ?>
															<input type="text" class="form-control" placeholder="Enter name" name="singleRoomNameEdit[5][{{$value->id}}][]" value="{{@$names[0]}}">
															<input type="text" class="form-control" placeholder="Enter name" name="singleRoomNameEdit[5][{{$value->id}}][]" value="{{@$names[1]}}">
															<input type="text" class="form-control" placeholder="Enter name" name="singleRoomNameEdit[5][{{$value->id}}][]" value="{{@$names[2]}}">
															<input type="text" class="form-control" placeholder="Enter name" name="singleRoomNameEdit[5][{{$value->id}}][]" value="{{@$names[3]}}">
												      	</td>
												      	<?php
															$today = strtotime("today");
															$minusDaysUp = strtotime('-14 days',strtotime($cart_experience[0]->date_from));
															if($today >= $minusDaysUp){
																echo '<td class="sadasd table-disaled">';
															}else{
																echo '<td class="sadasd">';
															}
															?>
												      		<?php 
												      		
												      		if(!empty($supplements)){
												      			echo implode('<br>', $supplements);
												      			if(!empty($value->upgrade_request_status)){
														      			if(empty($pen_can)){ ?>
														      			<br><a data-fancybox data-type="ajax" data-src="" href="/request-supplements/{{$value->id}}/{{$HotelDatesID}}/{{$cart_experience[0]->id}}"  style="color: #FCA311;font-size: 14px;">Add</a>
														      				<?php } } 
												      		}else{
												      		?>
													      		<i>No requests made</i>
													      	<?php } ?>
													      	@hasrole('Collaborator')
													      	<?php if(!empty($value->upgrade_request_status)){
													      	if(!empty($pen_can)){ ?>
													      		<br><i>Upgrade Request <?php echo ucwords($value->upgrade_request_status); ?></i>
													      		<br><a class="cancelUpgrade" href="javascript:;" data-src="{{ route('request-supplements-cancel', $value->id) }}/?hotel_dates_id=<?php echo $HotelDatesID; ?>&cart_id=<?php echo $cart_experience[0]->id; ?>" style="color: #FCA311;font-size: 14px;">Cancel Upgrade</a>
												      		<?php } }else{ ?>
												      			<br><a data-fancybox data-type="ajax" data-src="" href="/request-supplements/{{$value->id}}/{{$HotelDatesID}}/{{$cart_experience[0]->id}}"  style="color: #FCA311;font-size: 14px;" class="up-request">Request</a>
												      		<?php } ?>
															 @else
																<?php if(!empty($value->upgrade_request_status)){ 
																	if(!empty($pen_can)){?>
													      		<!-- <br><i>Upgrade Request <?php echo ucwords($value->upgrade_request_status); ?></i> -->
													      		<br><a class="cancelUpgrade" href="javascript:;" data-src="{{ route('request-supplements-cancel', $value->id) }}/?hotel_dates_id=<?php echo $HotelDatesID; ?>&cart_id=<?php echo $cart_experience[0]->id; ?>" style="color: #FCA311;font-size: 14px;">Cancel Upgrade</a>
												      		<?php } }else{ ?>
												      			<br><a data-fancybox data-type="ajax" data-src="" href="/request-supplements/{{$value->id}}/{{$HotelDatesID}}/{{$cart_experience[0]->id}}"  style="color: #FCA311;font-size: 14px;">Add</a>
												      		<?php } ?> 
												      		@endhasrole
												      		<!-- <select name="roomRequestsEdit[1][{{$value->id}}][]" class="selectCls" multiple="">
												      			<option value="0">None</option>
													      		<?php foreach ($roomRequests as $keyrm => $valuerm) {
													      			$selected = '';
													      			if (in_array($valuerm->id, $ceTrR)){
													      				$selected = 'selected';
													      			}
													      		 ?>
													      			<option value="{{ $valuerm->id }}" {{$selected}}>{{ $valuerm->name }}</option>
													      		<?php } ?>
												      		</select> -->
												      	</td>
												      	<td>
															<textarea class="form-control"  placeholder="Enter Note for the hotel" name="specialRequestsEdit[5][{{$value->id}}]">{{$value->specials}}</textarea>
												      	</td>
												      	<td>
												      		@hasrole('Collaborator')

												      		@else
												      		@if(!empty($value->deposit) || !empty($value->paid) || !empty($names[0]))
													      		@else
														      		@if(empty($supplements))
														      			<a class="removeRoomsCls removeRoomsIconCls btn" data-id="{{$value->id}}"><i class="fas fa-trash-alt"></i></a>
														      		@endif
													      		@endif
												      		@endhasrole
												      	</td>
												    </tr>
											  	<?php 
											  		$twnCnt++;
											  		}
											  	}
												  	for ($i=1; $i <= $twn-$twnCnt+1; $i++) { ?>
													    <!-- <tr>
												      	<td scope="row">
													      	<div class="checkarea_part_Dates marginLetf40">
										                        <label class="checkbox_div">
										                          <input type="checkbox" class="custom_chkbox tagchkbox notClickedCls " value="1" name="roomPaid[5][{{$i}}]"> <span class="notClickedCls"></span>
										                          <span class="checkmark"></span>
										                        </label>
										                    </div>
												      	</td>
												      	<td>
															<input type="text" class="form-control" placeholder="Enter name" name="singleRoomName[5][{{$i}}]">
												      	</td>
												      	<td>
												      		<select name="roomRequests[5][{{$i}}][]" class="selectCls" multiple="">
												      			<option value="0">None</option>
													      		<?php foreach ($roomRequests as $keyrm => $valuerm) { ?>
													      			<option value="{{ $valuerm->id }}">{{ $valuerm->name }}</option>
													      		<?php } ?>
												      		</select>
												      	</td>
												      	<td>
															<input type="text" class="form-control" placeholder="Enter Note for the hotel" name="specialRequests[5][{{$i}}]">
												      	</td>
												      	<td>&nbsp;</td>
												    </tr> -->
												  	<?php } ?>


												  	<?php
											  	if($cartExperiencesToRoomsRequest->count()>0){
												  	foreach ($cartExperiencesToRoomsRequest as $key => $value) {
												  		if($value->room_id == '5'){
												  		$ceTrR = [];
													  	foreach ($value->cartExperiencesToRoomsRequests as $keyCRR => $valueCRR) {
												  			$ceTrR[] = $valueCRR->room_requests_id;
													  	}

													  	if(($value->status == -1) && ($value->cancellation_request_status == 'approved')){
													  		continue;
													  	}
													  	if(($value->room_request_status == 'cancelled')){ 
													  		continue;
													  	}
												  	 ?>
												  		  @hasrole('Collaborator')
											  	 <?php
													
													$today = strtotime("today");
													$minusDays = strtotime('-28 days',strtotime($cart_experience[0]->date_from));
													if($today >= $minusDays){
														if(!empty($value->is_optional_room)){
																
																echo '<tr>';
																}else{
																		echo '<tr class="table table-disaled" >';
																}
													}else{
														echo '<tr>';
													}
													?>
											  		@else
											  		<tr class="table table-disaled" style="pointer-events: none;">
										  			@endhasrole
													      	<td scope="row">
														      	<div class="checkarea_part_Dates ">
														      		<?php
														      		if(($value->status == -1) && ($value->cancellation_request_status == null)){
														      			//echo '<label>Pending cancellation</label>';
														      			?>
														      			<div class="sk_status_change_{{$value->id}}">
												      						<p class="sk_pending"><b> Status: Pending cancellation </b></p>
												      						
																			<label>Cancellation request pending...</label>
																			<a href="javascript:;" class="sk_cancel_btn" style="color:red;" data-id="{{$value->id}}" data-type="declined"><p>Cancel request</p></a>
																		</div>
														      			<?php
														      		}elseif($value->room_request_status == 'approved'){
																	?>
																	<div>
																		<small class="sk_success">Status: Requested Additional Room</small>
																		<!-- <label class="checkbox_div">
											                              <input type="checkbox" class="custom_chkbox tagchkbox notClickedCls " value="1" name="roomPaidEdit[5][{{$value->id}}]" <?php echo $value->status == '1'?'checked': ''?>> <span class="notClickedCls"></span>
											                              <span class="checkmark"></span>
											                            </label> -->
											                            <div class="checkarea_part_Dates">
																			
																			<label class="checkbox_div">
																			  <input type="checkbox" class="custom_chkbox tagchkbox notClickedCls sk_dep" value="1" name="roomDepositEdit[5][{{$value->id}}]" <?php echo $value->deposit == '1'?'checked': ''?>> <span class="notClickedCls"></span>
																			  <span class="checkmark"></span>
																			  <span class="sk_label">Deposit Paid</span>
																			</label>

																			<label class="checkbox_div">
																			  <input type="checkbox" class="custom_chkbox tagchkbox notClickedCls sk_paid" value="1" name="roomPaidFullEdit[5][{{$value->id}}]" <?php echo $value->paid == '1'?'checked': ''?>> <span class="notClickedCls"></span>
																			  <span class="checkmark"></span>
																			  <span class="sk_label">Paid in full</span>
																			</label>
																		</div>
											                            <!-- <a href="" style="visibility: none">$&nbsp;</a> -->
											                        </div>
																	<?php
													      			}else if($value->room_request_status == 'pending'){
												      					?>
												      					<div class="sk_status_change_{{$value->id}}">
												      						<p class="sk_pending">Status: Pending</p>
												      						<br>
																			<label>Room request pending...</label>	
																			<a href="javascript:;" class="sk_cancel_btn" style="color:red;" data-id="{{$value->id}}" data-type="cancel"><p>Cancel request</p></a>
																		</div>
												      					<?php
													      			//}else if($value->room_request_status == 'declined'){
												      					?> 
												      						<!--<small class="sk_pending">Status: Declined</small>
																			<label>Single room request declined...</label>-->

												      					<?php
													      			}else if($value->room_request_status == 'cancelled'){
													      				?>
												      					<small class="sk_pending">Status: Cancelled</small>
													      				<?php
													      			}
													      			?>	
										                        </div>
													      	</td>
													      	<td>
																<?php
																$pen_can = 0;
																$dbl_sole = 0;
														      		$supplements = array();
														      		if(!empty($roomsSupplementsRequest)){ 
														      			foreach ($roomsSupplementsRequest as $rskey => $rsvalue) {
														      				
														      				if($rsvalue['cart_experiences_to_rooms_id'] == $value->id){
														      					if($rsvalue['upgrade_request_sup_status'] == 'pending')
														      					{
														      						$pen_can = 1;
														      					}
														      					if($rsvalue['supplements'] == 1){
														      						$rsvalue['supplements'] = 'Water view (Sea/Lake/River) : '.$rsvalue['upgrade_request_sup_status'];
														      					}elseif($rsvalue['supplements'] == 2){
														      						$rsvalue['supplements'] = 'View (Garden/Balcony) : '.$rsvalue['upgrade_request_sup_status'];
														      					}elseif($rsvalue['supplements'] == 3){
														      						$rsvalue['supplements'] = 'Executive/De Luxe/Superior Rooms : '.$rsvalue['upgrade_request_sup_status'];
														      					}elseif($rsvalue['supplements'] == 4){
														      						$dbl_sole  = ((isset($rsvalue['upgrade_request_sup_status']) && $rsvalue['upgrade_request_sup_status'] == 'accepted')?'1':'1');
														      						$rsvalue['supplements'] = 'Dbl/tw room for sole : '.$rsvalue['upgrade_request_sup_status'];
														      					}elseif($rsvalue['supplements'] == 7){
														      						$rsvalue['supplements'] = 'Walk In Shower : '.$rsvalue['upgrade_request_sup_status'];
														      					}elseif($rsvalue['supplements'] == 8){
														      						$rsvalue['supplements'] = 'Ground Floor Room : '.$rsvalue['upgrade_request_sup_status'];
														      					}elseif($rsvalue['supplements'] == 5){
												      						$rsvalue['supplements'] = $rsvalue['upgrade_name'].' : '.$rsvalue['upgrade_request_sup_status'];
												      					}
												      					$supplements[] = $rsvalue['supplements'];
														      				}
														      			}
														      		}
														      		//addtional room supplements
														      		$room_type_supplements = array();

																  	foreach ($value->cartExperiencesToRoomsRequests as $keyCRR => $valueCRR) {

															  			if($valueCRR['room_requests_id'] == 1){
														      						$valueCRR['supplements'] = 'Water view (Sea/Lake/River)';
														      					}elseif($valueCRR['room_requests_id'] == 2){
														      						$valueCRR['supplements'] = 'View (Garden/Balcony)';
														      					}elseif($valueCRR['room_requests_id'] == 3){
														      						$valueCRR['supplements'] = 'Executive/De Luxe/Superior Rooms';
														      					}elseif($valueCRR['room_requests_id'] == 4){
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
													      		$names = array(); 
													      		if(!empty($value->names)){
													      			$names = explode(',', $value->names);
													      		} ?>
																<input type="text" class="form-control" placeholder="Enter name" name="singleRoomNameEdit[5][{{$value->id}}][]" value="{{@$names[0]}}">
																<input type="text" <?=!empty($dbl_sole)?'disabled':''?> class="form-control" placeholder="Enter name" name="singleRoomNameEdit[5][{{$value->id}}][]" value="{{@$names[1]}}">
													      	</td>
													      	<?php
																$today = strtotime("today");
																$minusDaysUp = strtotime('-14 days',strtotime($cart_experience[0]->date_from));
																if($today >= $minusDaysUp){
																	echo '<td class="suppliment table-disaled" >';
																}else{
																	echo '<td class="suppliment">';
																}
																?>
													      		
																<?php /*if(!empty($value->upgrade_request_status)){ */?>
																	<?php 
																	
														      		if(!empty($supplements)){
														      			echo implode('<br>', $supplements);
														      			echo '<br>';
														      			if(!empty($value->upgrade_request_status)){
														      			if(empty($pen_can)){ ?>
														      			<br><a data-fancybox data-type="ajax" data-src="" href="/request-supplements/{{$value->id}}/{{$HotelDatesID}}/{{$cart_experience[0]->id}}"  style="color: #FCA311;font-size: 14px;">Add</a>
														      				<?php } } 
														      		}else{
														      		if(empty($room_type_supplements)){
														      		?>
															      		<i>No requests made</i>
															      	<?php } } ?>
													      		
													      		<?php /*}else{ */?>
													      			
													      			<label><?php 
															      		/*$selected = [];
															      		foreach ($roomRequests as $keyrm => $valuerm) {
															      			
															      			if (in_array($valuerm->id, $ceTrR)){
															      				$selected[] =  $valuerm->name;
															      			}
															      		}
															      		echo implode(', ', $selected);*/
															      		 ?></label>
															      		 
															      		  <?php 
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

														      	<?php /*}*/ ?>
														      	@hasrole('Collaborator')
														      	<?php if(!empty($value->upgrade_request_status)){
														      	if(!empty($pen_can)){ ?>
														      		<br><i>Upgrade Request <?php echo ucwords($value->upgrade_request_status); ?></i>
														      		<br><a class="cancelUpgrade" href="javascript:;" data-src="{{ route('request-supplements-cancel', $value->id) }}/?hotel_dates_id=<?php echo $HotelDatesID; ?>&cart_id=<?php echo $cart_experience[0]->id; ?>" style="color: #FCA311;font-size: 14px;">Cancel Upgrade</a><br>
													      		<?php } }else{ ?>
													      			<br><a data-fancybox data-type="ajax" data-src="" href="/request-supplements/{{$value->id}}/{{$HotelDatesID}}/{{$cart_experience[0]->id}}"  style="color: #FCA311;font-size: 14px;" class="up-request">Request</a><br>
													      		<?php } ?>
																 @else
																	<?php if(!empty($value->upgrade_request_status)){
																	if(!empty($pen_can)){  ?>
														      		<!-- <br><i>Upgrade Request <?php echo ucwords($value->upgrade_request_status); ?></i> -->
														      		<br><a class="cancelUpgrade" href="javascript:;" data-src="{{ route('request-supplements-cancel', $value->id) }}/?hotel_dates_id=<?php echo $HotelDatesID; ?>&cart_id=<?php echo $cart_experience[0]->id; ?>" style="color: #FCA311;font-size: 14px;">Cancel Upgrade</a><br>
													      		<?php } }else{ ?>
													      			<br><a data-fancybox data-type="ajax" data-src="" href="/request-supplements/{{$value->id}}/{{$HotelDatesID}}/{{$cart_experience[0]->id}}"  style="color: #FCA311;font-size: 14px;">Add</a>
													      		<?php } ?> 
													      		@endhasrole
																
													      	</td>
													      	<td>
																<textarea class="form-control"  placeholder="Enter Note for the hotel" name="specialRequestsEdit[5][{{$value->id}}]">{{$value->specials}}</textarea>
													      	</td>
													      	<td>
													      		
													      	</td>
													    </tr>
												  	<?php 
												  		$sngCnt++;
												  		}
												  	}
												  }

											  	?>
											  
											  	</tbody>
											</table>
										</div> 
									</div>
								</div>
							@endif
							<div class="tab-pane" id="driverTab" role="tabpanel">
									<div class="row">
										<div class="col-sm-12">
									  		
								  			<table class="table">
											  	<thead>
												    <tr>
												    @hasrole('Super Admin')
												      <th scope="col">Room Type </th>
												     @endhasrole
												      <th scope="col">Name</th>
												      <th scope="col">Paying </th>
												      <th scope="col">Contact nr/Additional Information</th>
												      
												    </tr>
											  	</thead>
											  	<tbody class="tblBorderCls">
												  	
											  		<tr>
											  			@hasrole('Super Admin')
												      	<td scope="row">
													      	<div class="form-group">
															    <label class="graycls">Room type</label>
														    	<select name="driver_room_type" id="driver_room_type" class="form-control" data-msg-required="Please select type" required>
																	
																	<?php foreach (allRoomType() as $key => $value) { 
																		if($value->id <= 3){?>
																			<option <?=(!empty($cart_experience[0]->driver_room_type) && $cart_experience[0]->driver_room_type == $value->id)?'selected="selected"':''?> value="{{ $value->id }}">{{ $value->name }}</option>
																	<?php } } ?>
																	
														    	</select>
														    </div>
												      	</td>
												      	@endhasrole

												      	<td>
															
															<div class="form_row mb-2 driver_text1">
																@hasrole('Collaborator')
																
														    	<input type="hidden" name="driver_room_type" value="1">
														    	@endhasrole
																	<input type="text" name="driver_name" id="driver_name" maxlength="100" class="driver_name form-control"  placeholder="" value="{{!empty($cart_experience[0]->driver_name)?$cart_experience[0]->driver_name:''}}"  /> 
															</div>
														
															<div class="form_row driver_text2" style="<?=(!empty($cart_experience[0]->driver_room_type) && ($cart_experience[0]->driver_room_type == '2' ||  $cart_experience[0]->driver_room_type == '3'))?'display:block;':'display:none;'?> ">
																
																<input type="text" name="courier_name" id="courier_name" maxlength="100" class="courier_name form-control"  placeholder="" value="{{!empty($cart_experience[0]->courier_name)?$cart_experience[0]->courier_name:''}}" /> 
															</div>
															
												      	</td>
												      	<td class="">
												      		<div class="driver_check">
												      			<?php
									                                if (Auth::check() && !Auth::user()->hasRole("Collaborator")){
									                                ?>
													      		<label class="checkbox_div <?php echo ($cart_experience[0]->driver_paying == 1) ? 'selectedriver1' : ''; ?>">
										                          
										                          <input type="radio" class="custom_chkbox driver_paying" value="1" name="driver_paying" data-id="{{$cart_experience[0]->id}}" <?php echo ($cart_experience[0]->driver_paying == 1) ? 'checked' : 'checked'; ?> checked>  <span class="notClickedCls"></span>
										                          <span class="checkmark"></span>
										                          <span class="sk_label">Free</span>
										                        </label>

										                        <label class="checkbox_div <?php echo ($cart_experience[0]->driver_paying == 2) ? 'selectedriver1' : ''; ?>">
										                          <input type="radio" class="custom_chkbox driver_paying " value="2" name="driver_paying" data-id="{{$cart_experience[0]->id}}" <?php echo ($cart_experience[0]->driver_paying == 2) ? 'checked' : ''; ?>> <span class="notClickedCls"></span>
										                          <span class="checkmark"></span>
										                          <span class="sk_label">Paying</span>
										                        </label>
										                        <input class="driver_cost" style="margin-left: 5px;margin-top: 5px;<?php echo ($cart_experience[0]->driver_paying == 2) ? '' : 'display:none'; ?>"  placeholder="Enter Cost" value="{{!empty($cart_experience[0]->driver_cost)?$cart_experience[0]->driver_cost:''}}" type="digit" maxlength="5" pattern="[0-9]*" inputmode="numeric" name="driver_cost"/>
										                    <?php } else { ?>  <span class="sk_label"><?=($cart_experience[0]->driver_paying == 2)?'Paying':'Free'?></span><?php } ?>
									                        </div>
									                        <div class="driver_check driver_text2" style="<?=(!empty($cart_experience[0]->driver_room_type) && ($cart_experience[0]->driver_room_type == '2' ||  $cart_experience[0]->driver_room_type == '3'))?'display:block;':'display:none;'?> ">
									                        	<?php
									                                if (Auth::check() && !Auth::user()->hasRole("Collaborator")){
									                                ?>
													      		<label class="checkbox_div <?php echo ($cart_experience[0]->driver_paying1 == 1) ? 'selectedriver1' : ''; ?>">
										                          <input type="radio" class="custom_chkbox driver_paying1" value="1" name="driver_paying1" data-id="{{$cart_experience[0]->id}}" <?php echo ($cart_experience[0]->driver_paying1 == 1) ? 'checked' : 'checked'; ?> > <span class="notClickedCls"></span>
										                          <span class="checkmark"></span>
										                          <span class="sk_label">Free</span>
										                        </label>

										                        <label class="checkbox_div <?php echo ($cart_experience[0]->driver_paying1 == 2) ? 'selectedriver1' : ''; ?>">
										                          <input type="radio" class="custom_chkbox driver_paying1 " value="2" name="driver_paying1" data-id="{{$cart_experience[0]->id}}" <?php echo ($cart_experience[0]->driver_paying1 == 2) ? 'checked' : ''; ?>> <span class="notClickedCls"></span>
										                          <span class="checkmark"></span>
										                          <span class="sk_label">Paying</span>
										                        </label>
										                      	<input class="driver_cost1" style="margin-left: 5px;margin-top: 5px;<?php echo ($cart_experience[0]->driver_paying1 == 2) ? '' : 'display:none'; ?>"  placeholder="Enter Cost" value="{{!empty($cart_experience[0]->driver_cost1)?$cart_experience[0]->driver_cost1:''}}" type="digit" maxlength="5" pattern="[0-9]*" inputmode="numeric" name="driver_cost1"/>
										                         <?php } else { ?>  <span class="sk_label"><?=($cart_experience[0]->driver_paying1 == 2)?'Paying':'Free'?></span><?php } ?>
									                        </div>
												      	</td>
												      	<td>
															<input class="form-control"  placeholder="Enter Contact" value="{{!empty($cart_experience[0]->driver_contact)?$cart_experience[0]->driver_contact:''}}" type="digit" maxlength="12" pattern="[0-9]*" inputmode="numeric" name="driver_contact"/>
												      	</td>
												      	
												    </tr>
											  		<tr class="second_driver_div" <?=!empty($cart_experience[0]->driver_name1)?'':'style="display:none"'?>>
												      	<td scope="row">
													      	<div class="form-group">
															    <label class="graycls">Room type</label>
														    	<select name="driver_room_type1" id="driver_room_type1" class="form-control" data-msg-required="Please select type" required>
																	
																	<?php foreach (allRoomType() as $key => $value) { 
																		if($value->id <= 3){?>
																			<option <?=(!empty($cart_experience[0]->driver_room_type1) && $cart_experience[0]->driver_room_type1 == $value->id)?'selected="selected"':''?> value="{{ $value->id }}">{{ $value->name }}</option>
																	<?php } } ?>
																	
														    	</select>
														    </div>
												      	</td>
												      	<td>
															
															<div class="form_row mb-2 driver_text_second">
																
																<input type="text" name="driver_name1" id="driver_name1" maxlength="100" class="driver_name1 form-control"  placeholder="" value="{{!empty($cart_experience[0]->driver_name1)?$cart_experience[0]->driver_name1:''}}"  /> 
															</div>
														
															<div class="form_row driver_text_second2" style="<?=(!empty($cart_experience[0]->driver_room_type1) && ($cart_experience[0]->driver_room_type1 == '2' ||  $cart_experience[0]->driver_room_type1 == '3'))?'display:block;':'display:none;'?> ">
																
																<input type="text" name="courier_name1" id="courier_name1" maxlength="100" class="courier_name1 form-control"  placeholder="" value="{{!empty($cart_experience[0]->courier_name1)?$cart_experience[0]->courier_name1:''}}" /> 
															</div>
															
												      	</td>
												      	<td class="">
												      		<div class="driver_check">
												      			<?php
									                                if (Auth::check() && !Auth::user()->hasRole("Collaborator")){
									                                ?>
													      		<label class="checkbox_div <?php echo ($cart_experience[0]->driver_paying_second == 1) ? 'selectedriver1' : ''; ?>">
										                          
										                          <input type="radio" class="custom_chkbox driver_paying_second" value="1" name="driver_paying_second" data-id="{{$cart_experience[0]->id}}" <?php echo ($cart_experience[0]->driver_paying_second == 1) ? 'checked' : 'checked'; ?> checked>  <span class="notClickedCls"></span>
										                          <span class="checkmark"></span>
										                          <span class="sk_label">Free</span>
										                        </label>

										                        <label class="checkbox_div <?php echo ($cart_experience[0]->driver_paying_second == 2) ? 'selectedriver1' : ''; ?>">
										                          <input type="radio" class="custom_chkbox driver_paying_second" value="2" name="driver_paying_second" data-id="{{$cart_experience[0]->id}}" <?php echo ($cart_experience[0]->driver_paying_second == 2) ? 'checked' : ''; ?>> <span class="notClickedCls"></span>
										                          <span class="checkmark"></span>
										                          <span class="sk_label">Paying</span>
										                        </label>
										                          <input class="driver_second_cost" style="margin-left: 5px;margin-top: 5px; <?php echo ($cart_experience[0]->driver_paying_second == 2) ? '' : 'display:none'; ?>"  placeholder="Enter Cost" value="{{!empty($cart_experience[0]->driver_second_cost)?$cart_experience[0]->driver_second_cost:''}}" type="digit" maxlength="5" pattern="[0-9]*" inputmode="numeric" name="driver_second_cost"/>
										                    <?php } else { ?>  <span class="sk_label"><?=($cart_experience[0]->driver_paying_second == 2)?'Paying':'Free'?><?=($cart_experience[0]->cost1 == 2)?'('.$cart_experience[0]->cost1.')':''?></span><?php } ?>
									                        </div>
									                        <div class="driver_check driver_text_second2" style="<?=(!empty($cart_experience[0]->driver_room_type1) && ($cart_experience[0]->driver_room_type1 == '2' ||  $cart_experience[0]->driver_room_type1 == '3'))?'display:block;':'display:none;'?> ">
									                        	<?php
									                                if (Auth::check() && !Auth::user()->hasRole("Collaborator")){
									                                ?>
													      		<label class="checkbox_div <?php echo ($cart_experience[0]->driver_paying_second1 == 1) ? 'selectedriver1' : ''; ?>">
										                          <input type="radio" class="custom_chkbox driver_paying_second1" value="1" name="driver_paying_second1" data-id="{{$cart_experience[0]->id}}" <?php echo ($cart_experience[0]->driver_paying_second1 == 1) ? 'checked' : 'checked'; ?> > <span class="notClickedCls"></span>
										                          <span class="checkmark"></span>
										                          <span class="sk_label">Free</span>
										                        </label>

										                        <label class="checkbox_div <?php echo ($cart_experience[0]->driver_paying_second1 == 2) ? 'selectedriver1' : ''; ?>">
										                          <input type="radio" class="custom_chkbox driver_paying_second1" value="2" name="driver_paying_second1" data-id="{{$cart_experience[0]->id}}" <?php echo ($cart_experience[0]->driver_paying_second1 == 2) ? 'checked' : ''; ?>> <span class="notClickedCls"></span>
										                          <span class="checkmark"></span>
										                          <span class="sk_label">Paying</span>
										                        </label>
										                         <input class="driver_second_cost1" style="margin-left: 5px;margin-top: 5px; <?php echo ($cart_experience[0]->driver_paying_second1 == 2) ? '' : 'display:none'; ?>"  placeholder="Enter Cost" value="{{!empty($cart_experience[0]->driver_second_cost1)?$cart_experience[0]->driver_second_cost1:''}}" type="digit" maxlength="5" pattern="[0-9]*" inputmode="numeric" name="driver_second_cost1"/>
										                         <?php } else { ?>  <span class="sk_label"><?=($cart_experience[0]->driver_paying_second1 == 2)?'Paying':'Free'?><?=($cart_experience[0]->cost1 == 2)?'('.$cart_experience[0]->cost1.')':''?></span><?php } ?>
									                        </div>
												      	</td>
												      	<td>
															<input class="form-control"  placeholder="Enter Contact" value="{{!empty($cart_experience[0]->driver_contact1)?$cart_experience[0]->driver_contact1:''}}" type="digit" maxlength="12" pattern="[0-9]*" inputmode="numeric" name="driver_contact1"/>
												      	</td>
												      	
												    </tr>
											  	</tbody>
											</table>
											@hasrole('Super Admin')
											<input type="button" name="add_driver" id="add_driver" class="cta btn btn-primary" value="Add Second Driver" <?=!empty($cart_experience[0]->driver_name1)?'style="display:none"':''?> >
											@endhasrole
											<input type="button" name="remove_driver" id="remove_driver"  class="cta btn btn-primary"  <?=!empty($cart_experience[0]->driver_name1)?'':'style="display:none"'?> value="Remove Second Driver" >
										</div> 
									</div>
								</div>
							
								

						</div>
						<div class="save__total" @hasrole('Collaborator') <?php echo (!empty($guestListCompleted) ? 'style="pointer-events:none;"' : ''); ?> @endhasrole>
							<input type="hidden" name="update_traking_complated" value="" id="update_traking_complated">
							<input type="hidden" name="save_guest_list" value="" id="save_guest_list">
					        <a class="cta saveChangesBtn">
					            Save changes
					        </a> 
							
							 <!-- @foreach($items as $key => $cartItem) -->
					            @foreach($items as $item)
					                <?php 
					                if($item->completed == 1){
					                    continue;
					                }
					                if($item->cancel_status == 1){
					                    continue;
					                }
					                ?>
									<?php
					                    $newarr = [];
					                    $ss1 = '';
					                    $ss2 = '';
					                    foreach ($tourStatuses as $keyyy => $valueee) {
											;
					                        $aa = '';
					                        foreach ($item->tourStatuses as $kyyy => $vlueee) {
					                            if($valueee->id == $vlueee->id){
					                                $newarr[] = $vlueee;
					                                $aa = 'added';
					                            }
					                        }
					                        if(empty($aa)){
					                            $newarr[] = $valueee;                                
					                        }
					                    }
					                    ?>
										<!-- @endforeach -->
									@endforeach
									@if(!empty($newarr))
									@foreach($newarr as $its)
		                            @if(!empty($its->pivot))
										
		                              @if($its->id == 3 && $its->pivot->completed != 1 ) 
										    <a class="cta trackingCompleted" data-src="" data-id="{{!empty($cart_experience[0]->id)?$cart_experience[0]->id:''}}" data-step="{{ $its->id }}"  style="color: #ffffff;font-size: 14px;"> Complete Tracking 1</a>  
										    <input type="hidden" name="c_step" id="c_step" value="{{ $its->id }}">

		                              @elseif($its->id == 4 && $its->pivot->completed != 1 )
		                              		<a class="cta trackingCompleted" data-src="" data-id="{{!empty($cart_experience[0]->id)?$cart_experience[0]->id:''}}" data-step="{{ $its->id }}"  style="color: #ffffff;font-size: 14px;"> Complete Tracking 2</a>  
		                              		<input type="hidden" name="c_step" id="c_step" value="{{ $its->id }}">
		                              @elseif($its->id == 6 && $its->pivot->completed != 1 )  
		                              		<a class="cta trackingCompleted" data-src="" data-id="{{!empty($cart_experience[0]->id)?$cart_experience[0]->id:''}}" data-step="{{ $its->id }}"  style="color: #ffffff;font-size: 14px;"> Complete Tracking 3</a>  
		                              		<input type="hidden" name="c_step" id="c_step" value="{{ $its->id }}">
		                                @elseif($its->id == 7 && $its->pivot->completed != 1 )  
		                              		<a class="cta trackingCompleted" data-src="" data-id="{{!empty($cart_experience[0]->id)?$cart_experience[0]->id:''}}" data-step="{{ $its->id }}"  style="color: #ffffff;font-size: 14px;"> Complete Guest List</a>  
		                              		<input type="hidden" name="c_step" id="c_step" value="{{ $its->id }}">
									  @endif             

		                                        
									@endif

		                            @endforeach
		                            @endif
					       <!--  <a href="#" class="cta total">
					           
					        </a> -->
					        <a class="cta total" data-fancybox data-type="ajax" data-src="" href="/total-supplements-charge/{{$cart_experience[0]->id}}"  style="color: #ffffff;font-size: 14px;">Total Supplements</a>
					    </div>	
					    <div class="">
					    			
							
									
					    </div>
					    

                <div class="accommodation_summary">

                    <div class="heading">
                    	@hasrole('Super Admin')
                    	<!-- <label class="checkbox_div">
                          <input type="checkbox" class="custom_chkbox printAcco" value="1" name="display_on_print" data-id="{{$cart_experience[0]->id}}" <?php echo ($cart_experience[0]->display_on_print == 1) ? 'checked' : ''; ?>> <span class="notClickedCls"></span>
                          <span class="checkmark"></span>
                          <span class="sk_label"> Display on print and collobrator</span>
                        </label> -->
                        <br/>
                        @endhasrole
                        Accommodation Summary   
                        <div class="total_cost" style="float: right;margin-top: unset;">
	                        	<?php $d_cnt = (!empty($cart_experience[0]->driver_name) && ($cart_experience[0]->driver_room_type == '2' || $cart_experience[0]->driver_room_type == '3'))?'1':'0';
					    		$s_cnt = ($cart_experience[0]->driver_room_type == '1')?'1':'0'; ?>
			                    Total PAX: {{$total_pax}} <!--$rooms_ppl +$d_cnt -->
			                    <?php //echo ($cart_experience[0]->driver_name != '' && $cart_experience[0]->driver_name1 != '') ? '+ 2 Dr' : (($cart_experience[0]->driver_name != '') ? '+ 1 Dr' : ''); ?>
			                    @hasrole('Collaborator')
			                    	<?php //echo ($cart_experience[0]->driver == 1) ? '- 1 - Dr' : ''; ?>
			                    	<?php //echo ($cart_experience[0]->driver == 2) ? '- 2 - Dr & Cr' : ''; ?>
		                    
		                    
	                    	
	                    @else
	                    
	                    <!-- <div style="margin-left: 20px;">

	                        <label class="checkbox_div <?php echo ($cart_experience[0]->driver == 1) ? 'selectedriver' : ''; ?>">
	                          <input type="radio" class="custom_chkbox plusDriver" value="1" name="driver" data-id="{{$cart_experience[0]->id}}" <?php echo ($cart_experience[0]->driver == 1) ? 'checked' : 'checked'; ?>> <span class="notClickedCls"></span>
	                          <span class="checkmark"></span>
	                          <span class="sk_label">- 1 - Dr</span>
	                        </label>

	                        <label class="checkbox_div <?php echo ($cart_experience[0]->driver == 2) ? 'selectedriver' : ''; ?>">
	                          <input type="radio" class="custom_chkbox plusDriver" value="2" name="driver" data-id="{{$cart_experience[0]->id}}" <?php echo ($cart_experience[0]->driver == 2) ? 'checked' : ''; ?>> <span class="notClickedCls"></span>
	                          <span class="checkmark"></span>
	                          <span class="sk_label">- 2 - Dr & Cr</span>
	                        </label>
	                       
	                    </div> -->
	                    
	                    @endhasrole
                        </div>
                    </div>

                    <div class="accommodation_summary_table">

                        <div class="accommodation_summary_row header">
                            <div class="accommodation_summary_column">Quantity Sold</div>
                            <div class="accommodation_summary_column">Room Type</div>
                        </div>
                        @if ($sngLastAmt > 0)
							<div class="accommodation_summary_row">
                                <div class="accommodation_summary_column" style="padding-left: 40px;">{{$sngSCnt}}/{{$sngLastAmt}}</div>
                                <div class="accommodation_summary_column">Single Rooms</div>
                            </div>
					   	@endif
					  	@if ($dblLastAmt > 0)
					  		<div class="accommodation_summary_row">
                                <div class="accommodation_summary_column" style="padding-left: 40px;">{{$dblSCnt}}/{{$dblLastAmt}}</div>
                                <div class="accommodation_summary_column">Double Rooms</div>
                            </div>
							
					   	@endif
					  	@if ($twnLastAmt > 0)
					  		<div class="accommodation_summary_row">
                                <div class="accommodation_summary_column" style="padding-left: 40px;">{{$twnSCnt}}/{{$twnLastAmt}}</div>
                                <div class="accommodation_summary_column">Twin Rooms</div>
                            </div>
					   	@endif
						@if ($trpLastAmt > 0)
							<div class="accommodation_summary_row">
                                <div class="accommodation_summary_column" style="padding-left: 40px;">{{$trpSCnt}}/{{$trpLastAmt}}</div>
                                <div class="accommodation_summary_column">Triple Rooms</div>
                            </div>
							
						@endif
						@if ($qrdLastAmt > 0)
							<div class="accommodation_summary_row">
                                <div class="accommodation_summary_column" style="padding-left: 40px;">{{$qrdSCnt}}/{{$qrdLastAmt}}</div>
                                <div class="accommodation_summary_column">Quadruple Rooms</div>
                            </div>
							
						@endif
						 <?php if(!empty($cart_experience[0]->driver_room_type)){ ?>
						 	<div class="accommodation_summary_row">
                                <div class="accommodation_summary_column" style="padding-left: 40px;">
                                	 <?php 
                                                            //echo $cart_experience[0]->driver_room_type;
                                                            //echo $cart_experience[0]->driver_room_type1;
                                                            if(!empty($cart_experience[0]->driver_room_type) && !empty($cart_experience[0]->driver_room_type1) && ($cart_experience[0]->driver_room_type == $cart_experience[0]->driver_room_type1))
                                                            {
                                                                $total_driver = 2;
                                                            }
                                                            else
                                                            {
                                                                 if(!empty($cart_experience[0]->driver_room_type) && !empty($cart_experience[0]->driver_room_type1) && ($cart_experience[0]->driver_room_type == $cart_experience[0]->driver_room_type1))
                                                                 {
                                                                    $total_driver = ($cart_experience[0]->driver_name != '' && $cart_experience[0]->driver_name1 != '') ?'2':'1';
                                                                 }
                                                                 else
                                                                 {
                                                                    $total_driver = 1;
                                                                 }
                                                                
                                                            }
                                                             
                                                            echo $total_driver;
                                                            ?>
                                </div>
                                <div class="accommodation_summary_column"> <?php 
                                    $room_type = array('1'=>'Single','2'=>'Double','3'=>'Twin');
                                    $type1= $room_type[$cart_experience[0]->driver_room_type] ;?>
                                   Driver ({{$type1}})</div>
                            </div>
                          
                        <?php }
                        if(!empty($cart_experience[0]->driver_room_type1) && $total_driver != '2' ){ ?>
                        	<div class="accommodation_summary_row">
                                <div class="accommodation_summary_column" style="padding-left: 40px;">
                                	  <?php 

                                            $total_driver= 1; 
                                            echo $total_driver;

                                            ?>
                                </div>
                                <div class="accommodation_summary_column">
                                	 <?php 
                                        $room_type = array('1'=>'Single','2'=>'Double','3'=>'Twin');
                                        $type2= $room_type[$cart_experience[0]->driver_room_type1] ;?>
                                       Driver ({{$type2}})
                                </div>
                            </div>
							
                           
                        <?php } ?>
                       <!--  @foreach($hotel_rooms as $rooms)
                                @foreach($rooms->rooms["roomInfo"] as $item)
                                    <div class="accommodation_summary_row">
                                        <div class="accommodation_summary_column">{{$rooms->rooms["sold"]}} of {{$rooms->rooms["taken"]}}</div>
                                        <div class="accommodation_summary_column">{{$item->name}}</div>
                                    </div>
                                @endforeach
                        @endforeach        -->                

                    </div>

                </div>

                <?php 
                $display = 0; ?>
                @hasrole('Collaborator')
                <?php
                if(empty($cart_experience[0]->single) || empty($cart_experience[0]->double) || empty($cart_experience[0]->twin)){ $display = 1;} ?>
                @endhasrole
                <div class="accommodation_change" <?=!empty($display)?'style="display:none;"':''?> >

                	<input type="hidden" id="updated_held_last_date" name="updated_held_last_date" value="<?php echo !empty($cart_experience[0]->held_last_date) ? date("Y-m-d",strtotime($cart_experience[0]->held_last_date)) : '' ?>"> 
                	<input type="hidden" id="updated_held_last_time" name="updated_held_last_time" value="<?php echo !empty($cart_experience[0]->held_last_time) ? date("H:i",strtotime($cart_experience[0]->held_last_time)) : '' ?>">
                    <p>
                        Please note that the following rooms are being held on option until <span class="held_last_datetime"><?php echo !empty($cart_experience[0]->held_last_time) ? date("h:i A",strtotime($cart_experience[0]->held_last_time)) : ''; ?> on <?php echo !empty($cart_experience[0]->held_last_date) ? date("d F 'y",strtotime($cart_experience[0]->held_last_date)) : ''; ?></span> after which any unsold rooms will be released back at no cancellation charge:
                    </p>

                    <p id="showRooms">
                        <strong><?php echo !empty($cart_experience[0]->single) ? $cart_experience[0]->single : '0'; ?> Single, <?php echo !empty($cart_experience[0]->double) ? $cart_experience[0]->double : '0'; ?> Double room, <?php echo !empty($cart_experience[0]->twin) ? $cart_experience[0]->twin : '0'; ?> Twin room</strong>
                    </p>
                    <p id="editRooms" style="display:none;">
                        <strong>
                    	<select id="singleRoomList">
                        	<?php 
                        	for ($i=0; $i <= 20; $i++) { 
                        		$selected = '';
                        		if($cart_experience[0]->single == $i){
                        			$selected = 'selected="selected"';
                        		}
                        		echo '<option '.$selected.'>'.$i.'</option>';
                        	}
                        	?>
                        </select> Single, 
                        <select id="doubleRoomList">
                        	<?php 
                        	for ($i=0; $i <= 20; $i++) { 
                        		$selected = '';
                        		if($cart_experience[0]->double == $i){
                        			$selected = 'selected="selected"';
                        		}
                        		echo '<option '.$selected.'>'.$i.'</option>';
                        	}
                        	?>
                        </select> Double room, 
                        <select id="twinRoomList">
                        	<?php 
                        	for ($i=0; $i <= 20; $i++) { 
                        		$selected = '';
                        		if($cart_experience[0]->twin == $i){
                        			$selected = 'selected="selected"';
                        		}
                        		echo '<option '.$selected.'>'.$i.'</option>';
                        	}
                        	?>
                        </select> Twin room</strong>
                         <!-- <a href="javascript:;" class="cta" id="resetRooms" style="display:none;float:left;">
		                        Reset
		                    </a> -->
                    </p>

	                @hasrole('Collaborator')
	                	<?php 
	                	$today = strtotime("today");
	                	if(strtotime($cart_experience[0]->date_from) > $today)
	                	{
	                		
	                		$minusDays = strtotime('-28 days',strtotime($cart_experience[0]->date_from));
		                	if($today >= $minusDays){?>
		                	<div class="optional_room">
			                    <a href="javascript:;" class="cta mr-2" id="changeRooms" style="float:left;">
			                        Change
			                    </a>
		                    <?php if(!empty($cart_experience[0]->single) || !empty($cart_experience[0]->double) || !empty($cart_experience[0]->twin)){?>
		                    <a href="javascript:;" class="cta" id="resetRooms" style="float: right;background: red;">
	                        Reset
		                    </a>
		                	<?php } ?>
		                    <a href="javascript:;" class="cta" id="saveRooms" style="display:none;float:left;">
		                        Save
		                    </a>
		                	</div>
	                		<?php
                				}
						} ?>
	                @else
	                <div class="optional_room">
                    <a href="javascript:;" class="cta mr-2" id="changeRooms" style="float:left;">
                        Change
                    </a>
                    <?php if(!empty($cart_experience[0]->single) || !empty($cart_experience[0]->double) || !empty($cart_experience[0]->twin)){?>
		                    <a href="javascript:;" class="cta" id="resetRooms" style="float: right;background: red;">
	                        Reset
		                    </a>
		                	<?php } ?>
                    <a href="javascript:;" class="cta" id="saveRooms" style="display:none;float:left;">
                        Save
                    </a>
                	</div>
                	@endhasrole

                </div>

                <div class="download__print">

                    <a target="_blank" href="{{route('download-guest-list-pdf',$cart_experience[0]->id)}}" class="cta">
                        Download
                    </a>
                    <!-- <a href="javascript:;" class="cta" id="printGuestlist">
                        Print
                    </a> -->
                    <?php  if (Auth::check() && Auth::user()->hasRole("Super Admin")){ ?>
                    <a target="_blank" href="{{route('send-guest-list-pdf',$cart_experience[0]->id)}}" class="cta">
                         Send to Hotel
                    </a>
                   <?php } ?>

                </div>

                <div class="footer">

                    <div class="veenus">Veenus</div>
                    <div>Telephone: 01753 836600</div>
                    <div>Email: vadmin@veenus.com</div>
                    <div>Address: Sir Henry Darvill House, 8-10 William St, Windsor SL4 1BA</div>

                </div>		
                <input type="hidden" name="completed_step" id="completed_step" value="">		
						<input type="submit" value="Send" class="addRoomsMain" id="addRoomsMain" style="display: none;">
					</form>

            </div>

        </div>
    </div>



<div id="tobeprinted" style="display:none;"></div>
<div style="display: none;">
	<!-- @foreach($items as $key => $cartItem) -->
            @foreach($items as $item)
        <?php
        if($item->completed == 1){
                        continue;
                    }
        if($item->cancel_status == 1){
            continue;
        }
        ?>
        @if($item->tourStatuses->count() > 0)
            @foreach($item->tourStatuses as $itemStatus)
            <div class="rightCol" id="PastbookingFormBox-{{ $item->id }}step-{{ $itemStatus->id }}">
                <div class="bookingForm fancyboxTourSteps">
                   
                    @if(optional($itemStatus)->id == 11)
                        <span class="headingS">{{ $item->experience_name }}</span>
                        <span class="headingS">{{ $item->hotel_name }}</span>
                        <span class="headingS">{{ date('d/m/Y', strtotime($item->date_from)) }} - {{ date('d/m/Y', strtotime($item->date_to)) }} ({{ $item->nights }} nights)</span>
                    @else
                        <span class="headingS"> Tour Booking Step </span>
                    @endif

                    <span class="headingLL">{{ optional($itemStatus)->name }}</span>
                    <div class="stepsline">
                        <ol>
                            @foreach($tourStatuses as $ts)
                                @if($ts->id < 11)
                                <li @if($ts->id == optional($itemStatus)->id || optional($itemStatus)->id == 11) class="active" @endif>
                                    <span class="up">{{ $ts->percent }}%</span>
                                    <span class="down">{{ $ts->name }}</span>
                                </li>
                                @endif
                            @endforeach
                        </ol>
                    </div>

                    <form method="POST" action="{{ route('process-tour-steps.ajax') }}" class="ajax">
                        {{ csrf_field() }}
                        <input type="hidden" name="cart_experiences_id" value="{{ $item->id }}">
                        <input type="hidden" name="tour_statuses_id" value="{{ optional($itemStatus)->id }}">
                        <input type="hidden" name="pivot_id" value="{{ optional($itemStatus)->pivot_id }}">
                        @if(optional($itemStatus)->id == 1)
                            <label for="sign_name">Name</label>
                            <div class="inputRow">
                                <input type="text" name="sign_name" placeholder="Please Enter a Name">
                                <button type="submit" data-step="{{ optional($itemStatus)->id }}" class="stepSubmitButton"><i class="fas fa-chevron-right"></i></button>
                            </div>
                        @elseif(optional($itemStatus)->id == 2)
                            <label for="url">Please enter the product URL posted on you website.</label>
                            <small>The URL posted here will help us see the way the product is advertised</small>
                           
                            <div class="skurlinputbutton{{ $item->id }}"  style="<?php echo ($itemStatus->pivot->url)?'display:none;':'display:block;'; ?>">
                             
                               <div>
                                    <input type="text" name="url" placeholder="https://" style="padding: 10px 15px;width: 100%;margin-top: 10px;">
                                   <button type="submit" data-step="{{ optional($itemStatus)->id }}" class="stepSubmitButton sk_cta">Update URL</button>
                               </div>
                            </div>
                           
                            <div class="inputRowView skurllink{{ $item->id }}" style="<?php echo ($itemStatus->pivot->url)?'display:block;':'display:none;'; ?>">
                                <p>Current URL link:</p>
                                <p>{{ $itemStatus->pivot->url  }}</p>
                                <a href="#" class="stepSubmitButton skShow sk_cta" data-id="{{ $item->id }}">Update URL</a>
                            </div>
                        
                        @elseif(optional($itemStatus)->id == 3 || optional($itemStatus)->id == 4 || optional($itemStatus)->id == 6 || optional($itemStatus)->id == 7)
                            <?php
                            $stepnumber = optional($itemStatus)->id;
                            
                            ?>
                             <!-- <input type="hidden" name="step{{$stepnumber}}" class="sk_small_text stepTracking{{$stepnumber}}" value="1"> -->
                             <?php 
                            $cartExperiencesToRooms = App\Models\Cms\CartExperiencesToRooms::with('cartExperiencesToRoomsRequests')->whereIn('room_request_status',['self'])->where("cart_exp_id", $item->id)->get();
                            $sngtotal = 0;
                            $dbltotal = 0;
                            $twntotal = 0;
                            $trptotal = 0;
                            $qrdtotal = 0;
                            if(!empty($cartExperiencesToRooms)){
                                foreach ($cartExperiencesToRooms as $key => $value) {
                                    if($value->room_id == '1' && ($value->deposit == '1' || $value->paid == '1')){
                                        $sngtotal++;
                                    }else if($value->room_id == '2' && ($value->deposit == '1' || $value->paid == '1')){
                                        $dbltotal++;
                                    }else if($value->room_id == '3' && ($value->deposit == '1' || $value->paid == '1')){
                                        $twntotal++;
                                    }else if($value->room_id == '4'){
                                        $trptotal++;
                                    }else if($value->room_id == '5'){ 
                                        $qrdtotal++;
                                    }
                                }
                            }
                            ?>
                            <?php if(optional($itemStatus)->id != 7){ ?>
                            <?php $d_cnt = (!empty($cart_experience[0]->driver_name) && ($cart_experience[0]->driver_room_type == '2' || $cart_experience[0]->driver_room_type == '3'))?'1':'0';
				    		$s_cnt = ($cart_experience[0]->driver_room_type == '1')?'1':'0';
				    		$total_pax = get_total_pax($cart_experience[0]->id); ?>
                            <div class="text-center tx-big">Pax: <strong><span class="t_pax">{{$total_pax}}</span><?php echo ($cart_experience[0]->driver_name != '' && $cart_experience[0]->driver_name1 != '') ? '+ 2 Dr' : (($cart_experience[0]->driver_name != '') ? '+ 1 Dr' : ''); ?></strong></div>
                                     
                            <div class="rooms tx-big" style="text-align:center;">
                                <strong><span class="s_total">{{$sngtotal}}</span></strong> sgl <strong><span class="d_total">{{$dbltotal}}</span></strong> dbl <strong><span class="t_total">{{$twntotal}}</span></strong> twn
                            </div>
                                    <input type="hidden" name="step{{$stepnumber}}" class="sk_small_text currentStep stepTracking{{$stepnumber}}" value="1">
									<input type="hidden" name="pax" class="tpax_total" value="{{$total_pax}}">
									<input type="hidden" name="sgl_room_total" class="sgl_total" value="{{$sngtotal}}">
									<input type="hidden" name="dbl_room_total" class="dbl_total" value="{{$dbltotal}}">
									<input type="hidden" name="twn_room_total" class="twn_total" value="{{$twntotal}}">
							<?php } ?>
                                <!-- <button type="submit" data-step="{{ optional($itemStatus)->id }}" class="stepSubmitButtonTracking sk_cta">Update tracking</button> -->
                                <?php /*if(!empty($sngtotal) || !empty($dbltotal) || !empty($twntotal)) {*/ ?>
                             <button type="submit" data-step="{{ optional($itemStatus)->id }}" class="PaststepSubmitButtonTracking sk_cta">Mark as completed</button>
                         <?php /*}*/ ?>
                        
                        @elseif(optional($itemStatus)->id == 11)

                        @endif

                    </form>

                </div>
                <script>
                    $('.skShow').click(function(){

                        // $('.skurlinput'+$(this).data('id')).show();
                        $('.skurlinputbutton'+$(this).data('id')).show();
                        $('.skurllink'+$(this).data('id')).hide();
                    })


                    $(".stepSubmitButton").click(function(e){
                        e.preventDefault();

                        $(this).prop('disabled', true);
                       $(this).html('<i class="fas fa-spinner fa-pulse"></i>');
                        // $(this).html('Update URL');

                        var step = $(this).data('step');
                        if( step == 5 || step == 8 ){
                            $(this).prop('disabled', false);
                            $(this).unbind('click').click();
                            $(this).prop('disabled', true);
                            return true;
                        }

                        var value = $(this).siblings('input').val();

                        if(value){
                            $(this).prop('disabled', false);
                            $(this).unbind('click').click();
                            $(this).prop('disabled', true);
                            return true;
                        }else{
                            $(this).prev().css("border", "2px solid red");
                            $(this).prop('disabled', false);
                            $(this).html('Update URL');
                            return false;
                        }

                    });

                     $(".PaststepSubmitButtonTracking").click(function(e){
                         e.preventDefault();
                         $('#update_traking_complated').val('');
                         var step = $(this).attr('data-step');
                         $('#completed_step').val(step);
                        // $(this).prop('disabled', true);
                        $(this).html('<i class="fas fa-spinner fa-pulse"></i>');
                        $('#addRoomsMain').trigger("click");
                        // var step = $(this).data('step');
                        // if( step == 5 || step == 8 ){
                        //     $(this).prop('disabled', false);
                        //     $(this).unbind('click').click();
                        //     $(this).prop('disabled', true);
                        //     return true;
                        // }

                        // var value = $(".stepTracking"+step).val();
                        // if(value){
                        //     $(this).prop('disabled', false);
                        //     $(this).unbind('click').click();
                        //     $(this).prop('disabled', true);
                        //     return true;
                        // }else{
                        //     $(this).parent().css("border", "2px solid red");
                        //     $(this).prop('disabled', false);
                        //     $(this).html('Update tracking');
                        //     return false;
                        // }

                    });
                </script>
            </div>
            @endforeach
        @endif
    <!-- @endforeach -->
    @endforeach
</div>
<style>
	.selectedriver{
		color: orange;
		font-weight: bold;
	}
	.Canceled{
		border: 2px solid #FF0A0A !important;
	}
	.Pending{
		background: #EBEBEB 0% 0% no-repeat padding-box;
	}
	.visible{
		display: inline-block;
	}
	.hidden{
		display: none;
	}
	.accSummary{
		width: 50%;
		float: left;
	}
	.leftPartSumm{
		width: 30%;
		float: left;
		text-align: center;
	}
	.rightPartSumm{
		width: 70%;
		float: left;
	}
	.sk_ctas{
		width: 200px;
	}
	.orangeLinkSmall{
		text-align: left;
		font: normal normal normal 15px/17px Montserrat;
		letter-spacing: 0px;
		color: #FCA311;
		opacity: 1;
	}
	.roomLine input[type=text]{
		background: #FFFFFF 0% 0% no-repeat padding-box;
		border: 1px solid #DCDCDC;
		border-radius: 2px;
		opacity: 1;
		padding: 6px 2px;
	}
	.saveName{
		color: #FCA311;
	}
	.ttlHolder{
		font: normal normal normal 16px/19px Montserrat;
		letter-spacing: 0px;
		color: #9A9898;
		display: flex;
	}	
	.ttlHolder div:first-child{
		width: 12% !important;
	}
	.ttlHolder div{
		width: 30%;
	}	

	.roomLine{
		font: normal normal normal 16px/19px Montserrat;
		letter-spacing: 0px;
		color: #9A9898;
		display: flex;
		border: 1px solid #CFCFCF;
		padding: 30px 0px;
	}	
	.roomLine div.check{
		width: 12% !important;
		text-align: center;
	}
	.roomLine div.element{
		width: 30%;
	}	

	/* Customize the label (the container) */
	.containerCheck {
	  display: inline-block;
	  position: relative;
	  padding-left: 35px;
	  margin-bottom: 12px;
	  cursor: pointer;
	  font-size: 22px;
	  -webkit-user-select: none;
	  -moz-user-select: none;
	  -ms-user-select: none;
	  user-select: none;
	}

	/* Hide the browser's default checkbox */
	.containerCheck input {
	  position: absolute;
	  opacity: 0;
	  cursor: pointer;
	  height: 0;
	  width: 0;
	}

	/* Create a custom checkbox */
	.checkmark {
	  position: absolute;
	  top: 0;
	  left: 0;
	  height: 25px;
	  width: 25px;
	  background-color: #eee;
	}

	/* On mouse-over, add a grey background color */
	.containerCheck:hover input ~ .checkmark {
	  background-color: #ccc;
	}

	/* When the checkbox is checked, add a blue background */
	.containerCheck input:checked ~ .checkmark {
	  background-color: #FCA311;
	}

	/* Create the checkmark/indicator (hidden when not checked) */
	.checkmark:after {
	  content: "";
	  position: absolute;
	  display: none;
	}

	/* Show the checkmark when checked */
	.containerCheck input:checked ~ .checkmark:after {
	  display: block;
	}

	/* Style the checkmark/indicator */
	.containerCheck .checkmark:after {
	  left: 9px;
	  top: 5px;
	  width: 5px;
	  height: 10px;
	  border: solid white;
	  border-width: 0 3px 3px 0;
	  -webkit-transform: rotate(45deg);
	  -ms-transform: rotate(45deg);
	  transform: rotate(45deg);
	}
	.butbutHolder{
		display: flex;
		align-items: baseline;
	}
	.butHolder:nth-child(2){
		text-align: right;
		font: normal normal normal 20px/27px Montserrat;
		justify-content: flex-end;
	}

	.butHolder{
		display: flex;
		justify-content: flex-start;
		width: 50%;
	}
	.butHolder .orangeLink{
		margin-right: 20px;
		float: left;
		font-size: 12px;
	}
	.tab {
	  overflow: hidden;
	  background-color: #fff;
	  border: 0px;
	}

	/* Style the buttons that are used to open the tab content */
	.tab button {
	  background-color: #fff;
	  float: left;
	  border: none;
	  outline: none;
	  cursor: pointer;
	  padding: 20px;
	  transition: 0.3s;
	  border: 1px solid #000;
	  margin-left: 10px;
	  font: bold normal normal 16px Montserrat;
	}
	.tab button:first-child{
		 margin-left: 20px;
	}
	/* Change background color of buttons on hover */
	.tab button:hover {
	  background-color: #fff;
	  border-bottom: 0px solid;
	}

	/* Create an active/current tablink class */
	.tab button.active {
	  background-color: #fff;
	  border-bottom: 1px solid #fff;
	}

	/* Style the tab content */
	.tabcontent {
	  display: none;
	  padding: 6px 12px;
	  /*border: 1px solid #ccc;*/
		border-top: 1px solid #000;
		margin-top: -1px;
	}

	.superRequest{
		display: block;padding: 30px 300px 30px 30px;border: 1px solid;
	}


	.mainSuperPanel .ctas {
	    display: flex;
	    align-items: center;
	    width: calc(!00% + 10px);
	    margin: 30px -5px 0 -5px;
	}

	.mainSuperPanel a.cta {
	    display: block;
	    flex: 1;
	    background: #FCA311;
	    border-radius: 5px;
	    font-size: 0.75rem;
	    font-weight: 700;
	    line-height: 1.5;
	    text-align: center;
	    text-decoration: none;
	    color: #FFF;
	    outline: none;
	    padding: 10px;
	    margin: 0 5px;
	}
	h3 {
	    font-weight: bold;
	    color: #000;
	    margin-bottom: 5px;
	}
	label.graycls {
	    font-weight: bold;
	    color: #000000 !important;
	}
</style>


<script>
	 $(document).ready(function(){
    $(".datepicker").datepicker({
        endDate:'today'
    });
});
	$("#driver_room_type").change(function(e){
		var rtype = $(this).val();
		if(rtype == 1)
		{
			$('.driver_text2').hide();

		}
		else
		{
			//$(".driver_text2 input:radio").attr("checked", false);
			$(".driver_text2 input").val("");
			$('.driver_text2').show();
		}
	});
	
	$("#driver_room_type1").change(function(e){
		var rtype = $(this).val();
		if(rtype == 1)
		{
			$('.driver_text_second2').hide();

		}
		else
		{
			//$(".driver_text2 input:radio").attr("checked", false);
			$(".driver_text_second2 input").val("");
			$('.driver_text_second2').show();
		}
	});
	$("#add_driver").click(function(e){
		$('.second_driver_div').show();
		$("#add_driver").hide();
		$("#remove_driver").show();
		//$(".second_driver_div input").val("");
	});
	$("#remove_driver").click(function(e){
		if(confirm('Are you sure you want to remove?'))
		{
			$('.second_driver_div').hide();
			$(".second_driver_div input").val("");
			$(".second_driver_div select").val("");
			$('.driver_second_cost').val('');
			$('.driver_second_cost1').val('');
			$("#add_driver").show();
			$("#remove_driver").hide();
		}
		
	});
	 $(".trackingCompleted").bind("click", function(){
	 		//
	 		$('#update_traking_complated').val('1');
	 		$('#addRoomsMain').trigger('click');
            var cartExperienceId = $.trim($(this).data("id"));
            var stepId = $.trim($(this).data("step"));
             
		 		
           
        });
	$(document).on('click', '#printGuestlist', function(e) {
        e.preventDefault();
        $('.loader').show();    
        $.ajax({
            url: "{{ route('print-guest-list-pdf', $cart_experience[0]->id) }}",
            type: 'POST',
            // data: {'dates_rates_id':dates_rates_id},
            success: function(data) {
                $('.loader').hide();  
                $('#tobeprinted').html(data.response); 
                w=window.open();
                w.document.write($('#tobeprinted').html());
                w.print();
                w.close(); 
            },
            error: function(e) {
            }
        });   
    });

	$('#changeRooms').click(function() {
		$('#showRooms').hide();
		$(this).hide();
		$('#editRooms').show();
		$('#saveRooms').show();
		$('#resetRooms').show();
		
		<?php if (Auth::check() && !Auth::user()->hasRole("Collaborator")){ ?>		    	
                   $('.held_last_datetime').html('<input type="date" min="<?=date('Y-m-d')?>" id="held_last_date" name="held_last_date" class="datepicker" value="<?php echo !empty($cart_experience[0]->held_last_date) ? date("Y-m-d",strtotime($cart_experience[0]->held_last_date)) : '' ?>"> &nbsp;<input type="time" id="held_last_time" name="held_last_time" value="<?php echo !empty($cart_experience[0]->held_last_time) ? date("H:i",strtotime($cart_experience[0]->held_last_time)) : '' ?>">');
                  /* $(".datepicker").datepicker({
				        endDate:'today'
				    });*/
                <?php }?>

		

		$('#held_last_date').val($('#updated_held_last_date').val());
		$('#held_last_time').val($('#updated_held_last_time').val());
	});
	
	
	$('#saveRooms').click(function() {
		var date = $('#held_last_date').val();
		var time = $('#held_last_time').val();
		var singleRoomList = $('#singleRoomList').val();
		var doubleRoomList = $('#doubleRoomList').val();
		var twinRoomList = $('#twinRoomList').val();
		
		var room =0;
		if(singleRoomList == 0 && doubleRoomList == 0 && twinRoomList == 0)
		{
			room =1;
		}
		
		if(date == '' || time == '' || room == 1)
		{
			alert('Please enter date, time and at least 1 room.');
			return false;
		}
		$.ajax({
		    url: "{{ route('extra-add-rooms', $cart_experience[0]->id) }}",
		    type: 'POST',
		    dataType:'json',
		    data: "single="+$('#singleRoomList').val()+"&double="+$('#doubleRoomList').val()+"&twin="+$('#twinRoomList').val()+"&held_last_date="+$('#held_last_date').val()+"&held_last_time="+$('#held_last_time').val(),
		    success: function(data){
				$('#editRooms').hide();
				$('#saveRooms').hide();
		    	$('#showRooms').html(data.single_data);
		    	$('#showRooms').show();
				$('#changeRooms').show();
				$('#resetRooms').show();
				$('.held_last_datetime').html(data.datetime);
				$('#updated_held_last_date').val(data.date);
				$('#updated_held_last_time').val(data.time);
		    	toastSuccess('Rooms updated successfully');
		    	<?php if (Auth::check() && Auth::user()->hasRole("Collaborator")){ ?>		    	
                   // window.location='/acc-collaborator/?cid='+$('#current_cart_id').val();
                    window.location='/tour-overview/'+$('#current_cart_id').val()+'?cid='+$('#current_cart_id').val();
                <?php }else { ?>

                    window.location='/tour-overview/'+$('#current_cart_id').val()+'?cid='+$('#current_cart_id').val();
                <?php } ?>
		    }
		});
	});
	$('#resetRooms').click(function() {
		
		if(confirm("Are you sure you want to reset all optional rooms?"))
		{
			$.ajax({
			    url: "{{ route('extra-add-rooms', $cart_experience[0]->id) }}",
			    type: 'POST',
			    dataType:'json',
			    data: "single=0&double=0&twin=0",
			    success: function(data){
					$('#editRooms').hide();
					$('#saveRooms').hide();
			    	$('#showRooms').html(data.single_data);
			    	$('#showRooms').show();
					$('#changeRooms').show();
					$('#resetRooms').show();
					$('.held_last_datetime').html(data.datetime);
					$('#updated_held_last_date').val(data.date);
					$('#updated_held_last_time').val(data.time);
			    	toastSuccess('Rooms updated successfully');
			    	<?php if (Auth::check() && Auth::user()->hasRole("Collaborator")){ ?>		    	
	                   // window.location='/acc-collaborator/?cid='+$('#current_cart_id').val();
	                    window.location='/tour-overview/'+$('#current_cart_id').val()+'?cid='+$('#current_cart_id').val();
	                <?php }else { ?>

	                    window.location='/tour-overview/'+$('#current_cart_id').val()+'?cid='+$('#current_cart_id').val();
	                <?php } ?>
			    }
			});
		}
		
	});
	$('.tagchkbox').click(function() {
		if($(this).prop("checked") == false){
			var tagchkbox = $(this).closest(".checkarea_part_Dates").find('.tagchkbox');  
			tagchkbox.prop("checked", false);
		}else{

		var tagchkbox = $(this).closest(".checkarea_part_Dates").find('.tagchkbox');  
		tagchkbox.prop("checked", false);
		$(this).prop("checked", true);    
	
		}
	});

	// $(".sk_paid").change(function(e){
       
	// 	if($(this).is(':checked')){
	// 		$(this).parent().parent().parent().parent().find('.sk_con').prop( "checked", true );
	// 		$(this).parent().parent().parent().parent().find('.sk_dep').prop( "checked", true );
	// 		$(this).parent().parent().parent().parent().find('.sk_paid').prop( "checked", true );
	// 	}
		

 //    });

 //    $(".sk_dep").change(function(e){
       
	// 	if($(this).is(':checked')){
	// 		$(this).parent().parent().parent().parent().find('.sk_con').prop( "checked", true );
	// 		$(this).parent().parent().parent().parent().find('.sk_dep').prop( "checked", true );
	// 		//$(this).parent().parent().parent().parent().find('.sk_paid').prop( "checked", true );
	// 	}
		

 //    });



	$(".cancelUpgrade").bind('click', function(e){	
		var src = $(this).data("src");
		$.ajax({
		    url: src,
		    type: 'GET',
		    success: function(data){
		    	toastError('Upgrade request has been cancelled');
		    	parent.jQuery.fancybox.close();
		        var cartIdSCls = $('.cartIdSCls').val();
                $('a#reloadInfo'+cartIdSCls).trigger('click');
		    }
		});
	});
	$(".roomactionUpgrade").bind('click', function(e){	
	
			var id = $(this).data("id");
			var type = $(this).data("type");
			$.ajax({
			    url: "{{ route('upgrade-request-action') }}",
			    type: 'POST',
			    data: "type="+type+"&id="+id,
			    success: function(data){
			    	if(data.status == 'success'){
			    		if(data.type == 'accepted'){
		    				$('.sk_actions'+id).html('<div class="form-group"><label class="graycls">Upgrade Request Accepted</label></div>');
				    	}else{
			    			$('.sk_actions'+id).html('<div class="form-group"><label class="graycls">Upgrade Request Declined</label></div>');
				    	}
				    }
			    }
			});
		
	});
	$(".plusDriver").bind('click', function(e){	
			$('.loader').show();   
			var id = $(this).data("id");
			var val = $(this).val();
			$('.plusDriver').closest('label').removeClass('selectedriver');
			$(this).closest('label').addClass('selectedriver');
			$.ajax({
			    url: "{{ route('driver-request-action') }}",
			    type: 'POST',
			    data: "id="+id+"&val="+val,
			    success: function(data){
			    	$('.loader').hide();   
			    	if(data.status == 'success'){

			    	}
			    }
			});
		
	});
	$(".printAcco").bind('click', function(e){	
			$('.loader').show();   
			var id = $(this).data("id");
			var val = $(this).val();
			if($(this).is(":checked")){
				var val = $(this).val();
				//$('.printAcco').closest('label').removeClass('selectedriver');
				$(this).closest('label').addClass('selectedriver');
			}
			else
			{
				var val = '0';
				$(this).closest('label').removeClass('selectedriver');
				
			}
			
			$.ajax({
			    url: "{{ route('accomadation-display') }}",
			    type: 'POST',
			    data: "id="+id+"&val="+val,
			    success: function(data){
			    	$('.loader').hide();   
			    	if(data.status == 'success'){
			    		toastSuccess('Update successfully.');
			    	}
			    }
			});
		
	});
	$(".roomaction").bind('click', function(e){	
		var aaa = $(this).closest('.initialdiv').find('.initialcls').val();
		if(aaa == ''){
			toastError('Please enter initials');
		}else{

			var id = $(this).data("id");
			var type = $(this).data("type");
			var init = $('.room_init_'+id).val();
			var specials = $('.specials_'+id).val();
			var addtional_comment = $('.room_add_comment_'+id).val();
			
			var note = $('.room_note_'+id).val();
			$.ajax({
			    url: "{{ route('room-request-action') }}",
			    type: 'POST',
			    data: "type="+type+"&id="+id+"&init="+init+"&note="+note+"&specials="+specials+"&addtional_comment="+addtional_comment,
			    success: function(data){
			    	if(data.status == 'success'){
			    		if(data.type == 'approved'){

							$('.sk_actions1'+id).html('<div class="form-group"><label class="graycls">Request Accepted</label></div>');
			    		}else{
							$('.sk_actions1'+id).html('<div class="form-group"><label class="graycls">Request Declined</label></div>');
							$('.sk_actions'+id+' .act-dec').html('<div class="form-group"><label class="graycls"><label class="text-danger">Declined</label></label></div>');
			    		}
			    	}
			    	//debugger;
			        //parent.jQuery.fancybox.close();
			    }
			});
				
		}
	});
	$(".swapaction").bind('click', function(e){	
		var id = $(this).data("id");
		var type = $(this).data("type");
		var init = $('.sroom_init_'+id).val();
		var note = $('.sroom_note_'+id).val();
		$.ajax({
		    url: "{{ route('swap-request-action') }}",
		    type: 'POST',
		    data: "type="+type+"&id="+id+"&init="+init+"&note="+note,
		    success: function(data){
		    	if(data.status == 'success'){
	    			$('.sk_actions'+id).html('<div class="form-group"><label class="graycls">Request Accepted</label></div><div class="form-group"><label class="graycls">'+init+'</label><p>'+note+'</p></div>');
		    	}
		    	//debugger;
		        //parent.jQuery.fancybox.close();
		    }
		});
			
	});
	$(".canaction").bind('click', function(e){	
		var aaa = $(this).closest('.initialdiv').find('.initialcls').val();
		if(aaa == ''){
			toastError('Please enter initials');
		}else{
			var id = $(this).data("id");
			var type = $(this).data("type");
			var init = $('.croom_init_'+id).val();
			var note = $('.croom_note_'+id).val();
			var room_id = $('.room_id_'+id).val();
			$.ajax({
			    url: "{{ route('cancellation-request-action') }}",
			    type: 'POST',
			    data: "type="+type+"&id="+id+"&init="+init+"&note="+note+"&room_id="+room_id,
			    success: function(data){
			    	if(data.status == 'success'){
						if(data.type == 'declined'){
							$('.sk_actions'+id).html('<div class="form-group"><label class="graycls">Request Declined</label></div><div class="form-group"><label class="graycls">'+init+'</label><p>'+note+'</p></div>');	
							$('.sk_actions'+id).closest('.roomHolder').remove();
						}else{
							$('.sk_actions'+id).html('<div class="form-group"><label class="graycls">Request Accepted</label></div><div class="form-group"><label class="graycls">'+init+'</label><p>'+note+'</p></div>');
						}
			    	}
			    	//debugger;
			        //parent.jQuery.fancybox.close();
					//Request Declined
			    }
			});
		}
			
	});

$(".select-res").bind('click', function(e){	
	$(this).parent().children(".select-res").removeClass('selected-active');
	$(this).parent().children(".select-res").removeClass('selected-inactive');
	$(this).addClass('selected-active');
	var atype =  $(this).attr("data-type");
	var rid =  $(this).attr("data-rid");
	if(atype == 'accept')
	 {
	 	$(this).parent().children(".dct-up").addClass('selected-inactive');

	 }
	 if(atype == 'decline')
	 {
	 	$(this).parent().children(".act-up").addClass('selected-inactive');
	 }
	
	var act_str = '';
	var dct_str = '';
	var isdeclined = '';
	$( ".selected-active" ).each(function() {
	 var id =  $(this).attr("data-id");
	 var tid =  $(this).attr("data-rid");
	 var type =  $(this).attr("data-type");
	if(tid == rid)
	 {
	 if($(this).hasClass('room-status'))
	{
		if(type == 'accept')
		 {
		 	$('#upgrade_request_status_'+rid).val('accepted');
		 }
		 if(type == 'decline')
		 {
		 	isdeclined = '1';
		 	$('#upgrade_request_status_'+rid).val('declined');
		 }
		
	}
	else
	{
		if(type == 'accept')
		 {
		 	act_str += id+',';
		 }
		 if(type == 'decline')
		 {
		 	dct_str += id+',';
		 }
	}
	 }
	});

	
	$('#accept_upgrade_'+rid).val(act_str);
	$('#declined_upgrade_'+rid).val(dct_str);


	if(dct_str != '' || isdeclined != '')
	{
		$('.declined_reason_div_'+rid).show();
	}
	else
	{
		if($('.declined_reason_'+rid).hasClass('is_declined'))
		{
			$('.declined_reason_div_'+rid).show();
		}
		else
		{
			$('.declined_reason_'+rid).val('');
			$('.declined_reason_div_'+rid).hide();
		}
		
	}	
	var  is_all = 0;
	$( ".select-res" ).each(function() {
		var sid =  $(this).attr("data-rid");
		if(sid == rid)
		{
			if($(this).hasClass('selected-active') || $(this).hasClass('selected-inactive'))
			{

			}
			else
			{
				is_all = 1;
			}
		}
	});		
	$('#all_done_'+rid).val(is_all);			
	});
$(".select-req-res").bind('click', function(e){	
	$(this).parent().children(".select-req-res").removeClass('selected-active');
	$(this).parent().children(".select-req-res").removeClass('selected-inactive');
	$(this).addClass('selected-active');
	var atype =  $(this).attr("data-type");
	var rid =  $(this).attr("data-rid");
	
	if(atype == 'accept')
	 {
	 	$(this).parent().children(".dct-up").addClass('selected-inactive');

	 }
	 if(atype == 'decline')
	 {
	 	$(this).parent().children(".act-up").addClass('selected-inactive');
	 }
	 
	var act_str = '';
	var dct_str = '';
	var isdeclined = '';
	$( ".selected-active" ).each(function() {
	 var id =  $(this).attr("data-id");
	 var tid =  $(this).attr("data-rid");

	 var type =  $(this).attr("data-type");
	 if(tid == rid)
	 {
		if($(this).hasClass('room-status'))
		{
			if(type == 'accept')
			 {
			 	$('#room_request_status_'+rid).val('approved');
			 }
			 if(type == 'decline')
			 {
			 	isdeclined = '1';
			 	$('#room_request_status_'+rid).val('declined');
			 }

			
		}
		else
		{
			if(type == 'accept')
			 {
			 	act_str += id+',';
			 }
			 if(type == 'decline')
			 {
			 	dct_str += id+',';
			 }
		}
	 }
	 
	});
	$('#accept_upgrade_'+rid).val(act_str);
	$('#declined_upgrade_'+rid).val(dct_str);

	if(dct_str != '' || isdeclined != '')
	{
		$('.declined_reason_div_'+rid).show();
	}
	else
	{
		if($('.declined_reason_'+rid).hasClass('is_declined'))
		{
			$('.declined_reason_div_'+rid).show();
		}
		else
		{
			$('.declined_reason_'+rid).val('');
			$('.declined_reason_div_'+rid).hide();
		}
		
	}	
	var  is_all = 0;
	$( ".select-req-res" ).each(function() {
		var sid =  $(this).attr("data-rid");
		if(sid == rid)
		{
			if($(this).hasClass('selected-active') || $(this).hasClass('selected-inactive'))
			{

			}
			else
			{
				is_all = 1;
			}
		}
		
	});		
	$('#all_done_'+rid).val(is_all);
	});
//update request
$(".save_room_req").bind('click', function(e){	
		
			var id = $(this).data("id");
			var accept = $('#accept_upgrade_'+id).val();
			var declined = $('#declined_upgrade_'+id).val();
			var room_request_status = $('#room_request_status_'+id).val();
			var all_done = $('#all_done_'+id).val();
			var note = $('.room_note_'+id).val();
			var init = $('.room_init_'+id).val();
			var specials = $('.specials_'+id).val();
			var addtional_comment = $('.room_add_comment_'+id).val();
			var declined_reason = $('.declined_reason_'+id).val();

			if(all_done == 1)
			{
				alert('Please select all option.');
				return false;
			}
			var error = 0;
			if(init == '' || note == '' /*|| specials == ''*/)
			{
				if(init == '')
				{
					$('.room_init_error_'+id).text('Please enter room init.');
					
				}
				else
				{
					$('.room_init_error_'+id).text('');
				}
				/*if(specials == '')
				{
					$('.specials_error_'+id).text('Please enter specials.');
					
				}
				else
				{
					$('.specials_error_'+id).text('');
				}*/
				if(note == '')
				{
					$('.room_note_error_'+id).text('Please enter room note.');
					
				}
				else
				{
					$('.room_note_error_'+id).text('');
				}
				error = 1;
			}
			if($('.declined_reason_div_'+id).is(":visible"))
			{
				if(declined_reason == '')
				{
					$('.declined_reason_error_'+id).text('Please enter declined reason.');
					error = 1;
				}
				else
				{
					$('.declined_reason_error_'+id).text('');
				}
			}
			if(error == 1)
			{
				return false;
			}
			$('.loader').show();
		    $.ajax({
			    url: "{{ route('update-room-request-action') }}",
			    type: 'POST',
			    data: "accept="+accept+"&declined="+declined+"&note="+note+"&init="+init+"&id="+id+"&specials="+specials+"&addtional_comment="+addtional_comment+"&room_request_status="+room_request_status+"&declined_reason="+declined_reason,
			    success: function(data){
			    	if(data.status == 'success'){
			    		var room_request_status = $('#room_request_status').val();

			    		$( ".sk_actions"+id+" .act-dec .sk_ctas" ).each(function() {
						 
						 if(room_request_status == 'declined')
						 {
						 	$(this).html('<div class="form-group"><label class="graycls"><label class="text-danger">Declined</label></label></div>');
						 }
						});
						var d = $('.sk_actions'+id+' .select-req-res').html();
						if(d == undefined)
						{
							$('.save_room_req').hide();
							//$('.sk_actions1'+id).show();
						}
						
						toastSuccess('Update successfully.');
						parent.jQuery.fancybox.close();
					        var cartIdSCls = $('.cartIdSCls').val();
		                $('a#reloadInfo'+cartIdSCls).trigger('click');
			    		$('.loader').hide();
				    }
			    }
			});
		 
		
			
	});
$(".save_upgrade").bind('click', function(e){	
		
			var id = $(this).data("id");
			var accept = $('#accept_upgrade_'+id).val();
			var declined = $('#declined_upgrade_'+id).val();
			var declined_reason = $('.sk_Additions .declined_reason_'+id).val();
			
			var upgrade_request_status = $('#upgrade_request_status_'+id).val();
			var all_done = $('#all_done_'+id).val();
			if(all_done == 1)
			{
				alert('Please select all option.');
				return false;
			}
			if($('.sk_Additions .declined_reason_div_'+id).is(":visible"))
			{
				if(declined_reason == '')
				{
					$('.sk_Additions .declined_reason_error_'+id).text('Please enter declined reason.');
					return false;
				}
				else
				{
					$('.sk_Additions .declined_reason_error_'+id).text('');
				}
			}
			$('.loader').show();
		    $.ajax({
			    url: "{{ route('update-upgrade-request-action') }}",
			    type: 'POST',
			    data: "accept="+accept+"&declined="+declined+"&id="+id+"&declined_reason="+declined_reason,
			    success: function(data){
			    	if(data.status == 'success'){
			    		$( ".selected-active" ).each(function() {
						 var id =  $(this).attr("data-id");

						 var type =  $(this).attr("data-type");
						
						 if(type == 'accept')
						 {
						 	$(this).parent().parent().html('<div class="form-group"><label class="graycls"><label class="text-success">Accepted</label></label></div>');
						 	
						 }
						 if(type == 'decline')
						 {
						 	$(this).parent().parent().html('<div class="form-group"><label class="graycls"><label class="text-danger">Declined</label></label></div>');
						 }
						 
						});
			    		$('.loader').hide();
			    		toastSuccess('Update successfully.');
						parent.jQuery.fancybox.close();
					        var cartIdSCls = $('.cartIdSCls').val();
		                $('a#reloadInfo'+cartIdSCls).trigger('click');
				    }
			    }
			});
		 
		
			
	});
	//camcel room request
	$(".sk_cancel_btn").bind('click', function(e){	
		if (confirm("Are you sure you want to cancel?") == true) {
			var id = $(this).data("id");
			var type = $(this).data("type");
			
		    $.ajax({
			    url: "{{ route('room-request-action') }}",
			    type: 'POST',
			    data: "type="+type+"&id="+id,
			    success: function(data){
			    	if(data.status == 'success'){
						$('.sk_status_change_'+id).html('<small class="sk_pending">Status: Cancelled</small>');
			    	}
			    	//debugger;
			        parent.jQuery.fancybox.close();
			        toastSuccess('Cancel request successfully.');
					//Request Declined
			    }
			});
		  } 
		
			
	});
	//camcel room request
	$(".solved_general").bind('click', function(e){	
		if (confirm("Are you sure you want to resolved?") == true) {
			var id = $(this).data("id");
			
		    $.ajax({
			    url: "{{ route('resolve-enquiry') }}",
			    type: 'POST',
			    data: "id="+id,
			    success: function(data){
			    	if(data.status == 'success'){
						$('.sk_status_change_'+id).html('<small class="sk_pending">Status: Cancelled</small>');
			    	}
			    	//debugger;
			        parent.jQuery.fancybox.close();
			        toastSuccess('Resolved general enquiry successfully.');
			        var cartIdSCls = $('.cartIdSCls').val();
                $('a#reloadInfo'+cartIdSCls).trigger('click');
					//Request Declined
			    }
			});
		  } 
		
			
	});
	$(".clickCheck").bind("change", function(e){
		$.ajax({
		    url: "{{ route('colaborator-change-room') }}",
		    type: 'POST',
		    data: "status="+$(this).is(':checked')+"&item_id="+$(this).val(),
		    success: function(data){
		        //parent.jQuery.fancybox.close();
		    }
		});
		
		if($(this).is(':checked')){
			$("#names"+$(this).val()).removeClass("hidden").addClass("visible");
			$("#req1"+$(this).val()).removeClass("hidden").addClass("visible");
			$("#req2"+$(this).val()).removeClass("hidden").addClass("visible");
		}
		else{
			$("#names"+$(this).val()).removeClass("visible").addClass("hidden");
			$("#req1"+$(this).val()).removeClass("visible").addClass("hidden");
			$("#req2"+$(this).val()).removeClass("visible").addClass("hidden");
		}
	});
	
	$(".saveName").bind('click', function(e){			
		$.ajax({
		    url: "{{ route('colaborator-change-room-names') }}",
		    type: 'POST',
		    data: "namesData="+$("#namesData"+$(this).data("id")).val()+"&item_id="+$(this).data("id"),
		    success: function(data){
		        //parent.jQuery.fancybox.close();
		    }
		});
			
	});
	
	//document.getElementById("defaultOpen").click();
	
	function openCity(evt, cityName) {
	  // Declare all variables
	  var i, tabcontent, tablinks;

	  // Get all elements with class="tabcontent" and hide them
	  tabcontent = document.getElementsByClassName("tabcontent");
	  for (i = 0; i < tabcontent.length; i++) {
	    tabcontent[i].style.display = "none";
	  }

	  // Get all elements with class="tablinks" and remove the class "active"
	  tablinks = document.getElementsByClassName("tablinks");
	  for (i = 0; i < tablinks.length; i++) {
	    tablinks[i].className = tablinks[i].className.replace(" active", "");
	  }

	  // Show the current tab, and add an "active" class to the button that opened the tab
	  document.getElementById(cityName).style.display = "block";
	  evt.currentTarget.className += " active";
	}
	$(document).on('click','.nav-item', function(){
		// $('.nav-link').removeClass('active');
		$('.nav-item').removeClass('active');
		var href = $(this).attr('data-href').substring(1);
		// alert(href);
		$(this).addClass('active');
		// $(this).closest('.nav-item').addClass('active');
		$('.tab-pane').removeClass('active');
		$('.tab-pane[id="'+ href +'"]').addClass('active');
	});
	/*$(document).on('click','.saveChangesBtn', function(){
		$('#addRoomsMain').trigger('click');
	});*/
	/*addDataUpdateNumberHolderValidateOpt = {
	    errorElement: 'div',
	    invalidHandler: function(event, validator) {
	        var errors = validator.numberOfInvalids();
	        if (errors) {
	            $('span.error').hide();
	        }
	    },
	    rules: {
	        'product_name': {
	            required: true,
	        },
	     },
	    messages: {
	        'step1[experience_categories_ids][]': {
	            required: "Please select category",
	        },
	    },
	    errorPlacement: function(error, element) {

	        if (element.hasClass('selectCls')) {
	           error.insertAfter(element.next('span'));
	        } else if (element.hasClass('availableTourDatesCls')) {
	           error.insertAfter(element.next('.input-group-append').next('span'));
	        } else if (element.hasClass('custom_chkbox')) {
	           error.insertAfter(element.next('span'));
	        } else if (element.hasClass('multiImgCls')) {
	           error.insertAfter(element.next('span'));
	        } else {
	            error.insertAfter($(element));
	        }
	    },
	    focusInvalid: false,
	    invalidHandler: function(form, validator) {},
	    submitHandler: function(form) {
	    	var params = $(form).serializeArray();
            $.each(params, function(i, val) {
                userFormMainData.append(val.name, val.value);
            });
                    // $('.loader').show();
            $.ajax({
                url: $(form).attr('action'),
                type: 'POST',
                dataType: 'JSON',
                cache: false,
                mimeType: "multipart/form-data",
                contentType: false,
                processData: false,
                // data: formData,
                data: userFormMainData,
                beforeSend: function() {
                }
            }).done(function(data) {
                // $('.loader').hide();
                // parent.jQuery.fancybox.close();
            });
            return false;
	    },
	};
	$(document).ready(function(){   
	    $('#dataUpdateNumberHolder').validate(addDataUpdateNumberHolderValidateOpt);
	});
	var userFormMainData = new FormData();*/
	$(document).ready(function(){  



		$(".sktrigger").bind('click', function(e){		
			var type = $(this).data("tab");	
			$('.skalltabs').hide();
			//debugger;
			$('.'+type).show();
			if(type == 'sk_Rooms'){
				$('.backBtnGL').hide();
				$(this).removeAttr('style');
				$('table.table').css('pointer-events','auto');
				$('table.table tr').css('pointer-events','auto');
				$('table.table tr').removeClass('table');
				$('table.table tr').removeClass('table-disaled');
				
			}else{
				$('.backBtnGL').show();

			}
		});


 
		select2Load();
        $('#dataUpdateNumberHolder').validate(addDataUpdateNumberHolderValidateOpt);
    });
    function select2Load(){
		$('.selectCls').select2({
	        minimumResultsForSearch: 0,
	        // dropdownParent: $('.fancybox-can-swipe')
	        // dropdownParent: '.fancybox-can-swipe'
	            /*allowClear: true,*/
	    });	
	}
    var userFormMainData = new FormData();

    $('.driver_paying').click(function() {
    	var value = $(this).val();
		if($(this).prop("checked") == false){

			$('.driver_cost').hide();
			$('.driver_cost').val('');
		}else{
			if(value == 1)
			{
				$('.driver_cost').hide();
				$('.driver_cost').val('');
			}
			else
			{
				$('.driver_cost').show(); 
			}
			
	
		}
	});
	$('.driver_paying1').click(function() {
		var value = $(this).val();
		if($(this).prop("checked") == false){
			$('.driver_cost1').hide();
			$('.driver_cost1').val('');
		}else{
			if(value == 1)
			{
				$('.driver_cost1').hide();
				$('.driver_cost1').val('');
			}
			else
			{
				$('.driver_cost1').show(); 
			}
	
		}
	});
	$('.driver_paying_second').click(function() {
		var value = $(this).val();
		if($(this).prop("checked") == false){
			$('.driver_second_cost').hide();
			$('.driver_second_cost').val('');
		}else{
			if(value == 1)
			{
				$('.driver_second_cost').hide();
				$('.driver_second_cost').val('');
			}
			else
			{
				$('.driver_second_cost').show(); 
			}
	
		}
	});
	$('.driver_paying_second1').click(function() {
		var value = $(this).val();
		if($(this).prop("checked") == false){
			$('.driver_second_cost1').hide();
			$('.driver_second_cost1').val('');
		}else{
			if(value == 1)
			{
				$('.driver_second_cost1').hide();
				$('.driver_second_cost1').val('');
			}
			else
			{
				$('.driver_second_cost1').show(); 
			}
	
		}
	});

</script>