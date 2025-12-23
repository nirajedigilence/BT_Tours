<?php 
	$sgl = 0;
	$dbl = 0;
	$twn = 0;
	$trp = 0;
	$qrd = 0;
	$date_in = '';
	$date_out = '';
	$night = '';
	if(isset($cart_experience[0]->experiencesToHotelsToExperienceDate->HotelDates)){
		$sgl = $cart_experience[0]->experiencesToHotelsToExperienceDate->HotelDates->sgl;
		$dbl = $cart_experience[0]->experiencesToHotelsToExperienceDate->HotelDates->dbl;
		$twn = $cart_experience[0]->experiencesToHotelsToExperienceDate->HotelDates->twn;
		$trp = $cart_experience[0]->experiencesToHotelsToExperienceDate->HotelDates->trp;
		$qrd = $cart_experience[0]->experiencesToHotelsToExperienceDate->HotelDates->qrd;
		$date_in = $cart_experience[0]->experiencesToHotelsToExperienceDate->HotelDates->date_in;
		$date_out = $cart_experience[0]->experiencesToHotelsToExperienceDate->HotelDates->date_out;
		$night = $cart_experience[0]->experiencesToHotelsToExperienceDate->HotelDates->night;
	}
	$sngSCnt = 0;
	$dblSCnt = 0;
	$twnSCnt = 0;
	$trpSCnt = 0;
	$qrdSCnt = 0;
	foreach ($cartExperiencesToRooms as $key => $value) {
		if($value->room_id == '1'){
			$sngSCnt++;
		}else if($value->room_id == '2'){
			$dblSCnt++;
		}else if($value->room_id == '3'){
			$twnSCnt++;
		}else if($value->room_id == '4'){
			$trpSCnt++;
		}else if($value->room_id == '5'){
			$qrdSCnt++;
		}
	}
	$sngLastAmt = $sgl;		
	if($sngSCnt > $sgl){
		$sngLastAmt = $sngSCnt;
	}
	$dblLastAmt = $dbl;		
	if($dblSCnt > $dbl){
		$dblLastAmt = $dblSCnt;
	}
	$twnLastAmt = $twn;		
	if($twnSCnt > $twn){
		$twnLastAmt = $twnSCnt;
	}
	$trpLastAmt = $trp;		
	if($trpSCnt > $trp){
		$trpLastAmt = $trpSCnt;
	}
	$qrdLastAmt = $qrd;		
	if($qrdSCnt > $qrd){
		$qrdLastAmt = $qrdSCnt;
	}
?>	
<div>
	{{-- {{ $sngLastAmt }}
	{{ $dblSCnt }}
	{{ $twnSCnt }}
	{{ $trpSCnt }}
	{{ $qrdSCnt }} --}}

	<link href="{{ asset('css/style-bespoke.css') }}" rel="stylesheet">
	<h1>
		{{$cart_experience[0]->hotel_name}} - Guest List
	</h1>
	<h2>
		{{-- Tour: {{$cart_experience[0]->experience_name}}    Date: {{ date("D d M", strtotime($cart_experience[0]->date_from)) }} - {{ date("D d M 'y", strtotime($cart_experience[0]->date_to)) }} ( {{ $cart_experience[0]->nights }} @if($cart_experience[0]->nights > 1) nights @else night @endif ) --}}
		Tour: {{$cart_experience[0]->experience_name}}    Date: {{ date("D d M", strtotime($date_in)) }} - {{ date("D d M 'y", strtotime($date_out)) }} ( {{ $night }} @if($night > 1) nights @else night @endif )
	</h2>
	<div class="row">
		<div class="col-sm-2">
			<p>&nbsp;</p>
			<a class="orangeLink addRoomBtnCls tourOverviewButton" data-fancybox data-type="ajax" data-src="" href="{{ route('add-rooms', $cart_experience[0]->id) }}">Update tracking</a>	
		</div>	
	</div>	
	<br />
	<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
  	@if ($sngLastAmt > 0)
		<li class="nav-item active">
			<a class="nav-link active" data-toggle="tab" href="javascript:;" data-href="#SignleRooms" role="tab">Single Rooms ({{$sngSCnt}}/{{$sngLastAmt}})</a>
		</li>
   	@endif
  	@if ($dblLastAmt > 0)
		<li class="nav-item">
			<a class="nav-link" data-toggle="tab" href="javascript:;" data-href="#DoubleRooms" role="tab">Double Rooms ({{$dblSCnt}}/{{$dblLastAmt}})</a>
		</li>
   	@endif
  	@if ($twnLastAmt > 0)
		<li class="nav-item">
			<a class="nav-link" data-toggle="tab" href="javascript:;" data-href="#TwinRooms" role="tab">Twin Rooms ({{$twnSCnt}}/{{$twnLastAmt}})</a>
		</li>
   	@endif
	@if ($trpLastAmt > 0)
		<li class="nav-item">
			<a class="nav-link" data-toggle="tab" href="javascript:;" data-href="#TripleRooms" role="tab">Triple Rooms ({{$trpSCnt}}/{{$trpLastAmt}})</a>
		</li>
	@endif
	@if ($qrdLastAmt > 0)
		<li class="nav-item">
			<a class="nav-link" data-toggle="tab" href="javascript:;" data-href="#QuadrupleRooms" role="tab">Quadruple Rooms ({{$qrdSCnt}}/{{$qrdLastAmt}})</a>
		</li>
	@endif
</ul>
<form method="post" action="{{ route('colaborator-add-main-rooms') }}" id="dataUpdateNumberHolder">
	<input type="hidden" value="{{$cart_experience[0]->id}}" name="cart_id" class="cartIdSCls">
	<!-- Tab panes -->
	<div class="tab-content">
		@if ($sngLastAmt > 0)
		  	<div class="tab-pane active" id="SignleRooms" role="tabpanel">
				<div class="row">
					<div class="col-sm-12">
						<p>&nbsp;</p>
						<p>&nbsp;</p>
					</div>
					<div class="col-sm-12">
				  		<table class="table">
						  <thead>
						    <tr>
						      <th scope="col">Mark as sold </th>
						      <th scope="col">Name</th>
						      <th scope="col">Room requests</th>
						      <th scope="col">Special requests</th>
						      <th scope="col">&nbsp;</th>
						    </tr>
						  </thead>
						  <tbody class="tblBorderCls">
						  	<?php 
						  	$sngCnt = 1;
						  	foreach ($cartExperiencesToRooms as $key => $value) {
						  		if($value->room_id == '1'){
						  		$ceTrR = [];
							  	foreach ($value->cartExperiencesToRoomsRequests as $keyCRR => $valueCRR) {
						  			$ceTrR[] = $valueCRR->room_requests_id;
							  	}	
						  	 ?>
						  		<tr>
							      	<td scope="row">
								      	<div class="checkarea_part_Dates marginLetf40">
				                            <label class="checkbox_div">
				                              <input type="checkbox" class="custom_chkbox tagchkbox notClickedCls " value="1" name="roomPaidEdit[1][{{$value->id}}]" <?php echo $value->status == '1'?'checked': ''?>> <span class="notClickedCls"></span>
				                              <span class="checkmark"></span>
				                            </label>
				                        </div>
							      	</td>
							      	<td>
										<input type="text" class="form-control" placeholder="Enter name" name="singleRoomNameEdit[1][{{$value->id}}]" value="{{$value->names}}">
							      	</td>
							      	<td class="sadasd">
							      		<select name="roomRequestsEdit[1][{{$value->id}}][]" class="selectCls" multiple="">
							      			<option value="0">None</option>
								      		<?php foreach ($roomRequests as $keyrm => $valuerm) {
								      			$selected = '';
								      			if (in_array($valuerm->id, $ceTrR)){
								      				$selected = 'selected';
								      			}
								      		 ?>
								      			<option value="{{ $valuerm->id }}" {{$selected}}>{{ $valuerm->name }}</option>
								      		<?php } ?>
							      		</select>
							      	</td>
							      	<td>
										<input type="text" class="form-control"  placeholder="Enter Special requests" name="specialRequestsEdit[1][{{$value->id}}]" value="{{$value->specials}}">
							      	</td>
							      	<td>
							      		<a class="removeRoomsCls removeRoomsIconCls btn" data-id="{{$value->id}}"><i class="fas fa-trash-alt"></i></a>
							      	</td>
							    </tr>
						  	<?php 
						  		$sngCnt++;
						  		}
						  	}
						  	for ($i=1; $i <= $sgl-$sngCnt+1; $i++) { ?>
							    <tr>
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
										<input type="text" class="form-control" placeholder="Enter Special requests" name="specialRequests[1][{{$i}}]">
							      	</td>
							      	{{-- <td><a class="removeRoomsAddCls removeRoomsIconCls btn"><i class="fas fa-trash-alt"></i></a></td> --}}
							      	<td>&nbsp;</td>
							    </tr>
						  	<?php } ?>
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
		  	<div class="tab-pane" id="DoubleRooms" role="tabpanel">
		  		<div class="row">
					<div class="col-sm-12">
						<p>&nbsp;</p>
						<p>&nbsp;</p>
					</div>
					<div class="col-sm-12">
				  		<table class="table">
						  <thead>
						    <tr>
						      <th scope="col">Mark as sold </th>
						      <th scope="col">Name</th>
						      <th scope="col">Room requests</th>
						      <th scope="col">Special requests</th>
						      <th scope="col">&nbsp;</th>
						    </tr>
						  </thead>
						  <tbody class="tblBorderCls">
						  	<?php 
						  	$dblCnt = 1;
						  	foreach ($cartExperiencesToRooms as $key => $value) {
						  		if($value->room_id == '2'){
						  		$ceTrR = [];
							  	foreach ($value->cartExperiencesToRoomsRequests as $keyCRR => $valueCRR) {
						  			$ceTrR[] = $valueCRR->room_requests_id;
							  	}
						  	 ?>
						  		<tr>
							      	<td scope="row">
								      	<div class="checkarea_part_Dates marginLetf40">
				                            <label class="checkbox_div">
				                              <input type="checkbox" class="custom_chkbox tagchkbox notClickedCls " value="1" name="roomPaidEdit[2][{{$value->id}}]" <?php echo $value->status == '1'?'checked': ''?>> <span class="notClickedCls"></span>
				                              <span class="checkmark"></span>
				                            </label>
				                        </div>
							      	</td>
							      	<td>
										<input type="text" class="form-control" placeholder="Enter name" name="singleRoomNameEdit[2][{{$value->id}}]" value="{{$value->names}}">
							      	</td>
							      	<td class="sadasd">
							      		<select name="roomRequestsEdit[2][{{$value->id}}][]" class="selectCls" multiple="">
							      			<option value="0">None</option>
								      		<?php foreach ($roomRequests as $keyrm => $valuerm) {
								      			$selected = '';
								      			if (in_array($valuerm->id, $ceTrR)){
								      				$selected = 'selected';
								      			}
								      		 ?>
								      			<option value="{{ $valuerm->id }}" {{$selected}}>{{ $valuerm->name }}</option>
								      		<?php } ?>
							      		</select>
							      	</td>
							      	<td>
										<input type="text" class="form-control"  placeholder="Enter Special requests" name="specialRequestsEdit[2][{{$value->id}}]" value="{{$value->specials}}">
							      	</td>
							      	<td>
							      		<a class="removeRoomsCls removeRoomsIconCls btn" data-id="{{$value->id}}"><i class="fas fa-trash-alt"></i></a>
							      	</td>
							    </tr>
						  	<?php 
						  		$dblCnt++;
						  		}
						  	}
						  	for ($i=1; $i <= $dbl-$dblCnt+1; $i++) { ?>
							    <tr>
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
										<input type="text" class="form-control" placeholder="Enter Special requests" name="specialRequests[2][{{$i}}]">
							      	</td>
							      	<td>&nbsp;</td>
							    </tr>
						  	<?php } ?>
						  </tbody>
						</table>
					</div>  
				</div>
			</div>
		@endif
	  	@if ($twnLastAmt > 0)
			<div class="tab-pane" id="TwinRooms" role="tabpanel">
				<div class="row">
					<div class="col-sm-12">
						<p>&nbsp;</p>
						<p>&nbsp;</p>
					</div>
					<div class="col-sm-12">
				  		<table class="table">
						  	<thead>
							    <tr>
							      <th scope="col">Mark as sold </th>
							      <th scope="col">Name</th>
							      <th scope="col">Room requests</th>
							      <th scope="col">Special requests</th>
							      <th scope="col">&nbsp;</th>
							    </tr>
						  	</thead>
						  	<tbody class="tblBorderCls">
							  	<?php 
							  	$twnCnt = 1;
						  	foreach ($cartExperiencesToRooms as $key => $value) {
						  		if($value->room_id == '3'){
						  			$ceTrR = [];
							  	foreach ($value->cartExperiencesToRoomsRequests as $keyCRR => $valueCRR) {
						  			$ceTrR[] = $valueCRR->room_requests_id;
							  	}
						  	 ?>
						  		<tr>
							      	<td scope="row">
								      	<div class="checkarea_part_Dates marginLetf40">
				                            <label class="checkbox_div">
				                              <input type="checkbox" class="custom_chkbox tagchkbox notClickedCls " value="1" name="roomPaidEdit[3][{{$value->id}}]" <?php echo $value->status == '1'?'checked': ''?>> <span class="notClickedCls"></span>
				                              <span class="checkmark"></span>
				                            </label>
				                        </div>
							      	</td>
							      	<td>
										<input type="text" class="form-control" placeholder="Enter name" name="singleRoomNameEdit[3][{{$value->id}}]" value="{{$value->names}}">
							      	</td>
							      	<td class="sadasd">
							      		<select name="roomRequestsEdit[3][{{$value->id}}][]" class="selectCls" multiple="">
							      			<option value="0">None</option>
								      		<?php foreach ($roomRequests as $keyrm => $valuerm) {
								      			$selected = '';
								      			if (in_array($valuerm->id, $ceTrR)){
								      				$selected = 'selected';
								      			}
								      		 ?>
								      			<option value="{{ $valuerm->id }}" {{$selected}}>{{ $valuerm->name }}</option>
								      		<?php } ?>
							      		</select>
							      	</td>
							      	<td>
										<input type="text" class="form-control"  placeholder="Enter Special requests" name="specialRequestsEdit[3][{{$value->id}}]" value="{{$value->specials}}">
							      	</td>
							      	<td>
							      		<a class="removeRoomsCls removeRoomsIconCls btn" data-id="{{$value->id}}"><i class="fas fa-trash-alt"></i></a>
							      	</td>
							    </tr>
						  	<?php 
						  		$twnCnt++;
						  		}
						  	}
							  	for ($i=1; $i <= $twn-$twnCnt+1; $i++) { ?>
								    <tr>
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
										<input type="text" class="form-control" placeholder="Enter Special requests" name="specialRequests[3][{{$i}}]">
							      	</td>
							      	<td>&nbsp;</td>
							    </tr>
							  	<?php } ?>
						  	</tbody>
						</table>
					</div> 
				</div>
			</div>
		@endif
		@if ($trpLastAmt > 0)
			<div class="tab-pane" id="TripleRooms" role="tabpanel">
				<div class="row">
					<div class="col-sm-12">
						<p>&nbsp;</p>
						<p>&nbsp;</p>
					</div>
					<div class="col-sm-12">
				  		<table class="table">
						  	<thead>
							    <tr>
							      <th scope="col">Mark as sold </th>
							      <th scope="col">Name</th>
							      <th scope="col">Room requests</th>
							      <th scope="col">Special requests</th>
							      <th scope="col">&nbsp;</th>
							    </tr>
						  	</thead>
						  	<tbody class="tblBorderCls">
							  	<?php 
							  	$trpCnt = 1;
						  	foreach ($cartExperiencesToRooms as $key => $value) {
						  		if($value->room_id == '4'){
						  			$ceTrR = [];
							  	foreach ($value->cartExperiencesToRoomsRequests as $keyCRR => $valueCRR) {
						  			$ceTrR[] = $valueCRR->room_requests_id;
							  	}
						  	 ?>
						  		<tr>
							      	<td scope="row">
								      	<div class="checkarea_part_Dates marginLetf40">
				                            <label class="checkbox_div">
				                              <input type="checkbox" class="custom_chkbox tagchkbox notClickedCls " value="1" name="roomPaidEdit[4][{{$value->id}}]" <?php echo $value->status == '1'?'checked': ''?>> <span class="notClickedCls"></span>
				                              <span class="checkmark"></span>
				                            </label>
				                        </div>
							      	</td>
							      	<td>
										<input type="text" class="form-control" placeholder="Enter name" name="singleRoomNameEdit[4][{{$value->id}}]" value="{{$value->names}}">
							      	</td>
							      	<td class="sadasd">
							      		<select name="roomRequestsEdit[4][{{$value->id}}][]" class="selectCls" multiple="">
							      			<option value="0">None</option>
								      		<?php foreach ($roomRequests as $keyrm => $valuerm) {
								      			$selected = '';
								      			if (in_array($valuerm->id, $ceTrR)){
								      				$selected = 'selected';
								      			}
								      		 ?>
								      			<option value="{{ $valuerm->id }}" {{$selected}}>{{ $valuerm->name }}</option>
								      		<?php } ?>
							      		</select>
							      	</td>
							      	<td>
										<input type="text" class="form-control"  placeholder="Enter Special requests" name="specialRequestsEdit[4][{{$value->id}}]" value="{{$value->specials}}">
							      	</td>
							      	<td>
							      		<a class="removeRoomsCls removeRoomsIconCls btn" data-id="{{$value->id}}"><i class="fas fa-trash-alt"></i></a>
							      	</td>
							    </tr>
						  	<?php 
						  		$trpCnt++;
						  		}
						  	}
							  	for ($i=1; $i <= $trp-$trpCnt+1; $i++) { ?>
								    <tr>
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
											<input type="text" class="form-control" placeholder="Enter Special requests" name="specialRequests[4][{{$i}}]">
								      	</td>
								      	<td>&nbsp;</td>
								    </tr>
							  	<?php } ?>
						  	</tbody>
						</table>
					</div> 
				</div>
			</div>
		@endif
		@if ($qrdLastAmt > 0)
			<div class="tab-pane" id="QuadrupleRooms" role="tabpanel">
				<div class="row">
					<div class="col-sm-12">
						<p>&nbsp;</p>
						<p>&nbsp;</p>
					</div>
					<div class="col-sm-12">
				  		<table class="table">
						  	<thead>
							    <tr>
							      <th scope="col">Mark as sold </th>
							      <th scope="col">Name</th>
							      <th scope="col">Room requests</th>
							      <th scope="col">Special requests</th>
							      <th scope="col">&nbsp;</th>
							    </tr>
						  	</thead>
						  	<tbody class="tblBorderCls">
							  	<?php 
							  		$qrdCnt = 1;
						  	foreach ($cartExperiencesToRooms as $key => $value) {
						  		if($value->room_id == '5'){
						  			$ceTrR = [];
							  	foreach ($value->cartExperiencesToRoomsRequests as $keyCRR => $valueCRR) {
						  			$ceTrR[] = $valueCRR->room_requests_id;
							  	}
						  	 ?>
						  		<tr>
							      	<td scope="row">
								      	<div class="checkarea_part_Dates marginLetf40">
				                            <label class="checkbox_div">
				                              <input type="checkbox" class="custom_chkbox tagchkbox notClickedCls " value="1" name="roomPaidEdit[5][{{$value->id}}]" <?php echo $value->status == '1'?'checked': ''?>> <span class="notClickedCls"></span>
				                              <span class="checkmark"></span>
				                            </label>
				                        </div>
							      	</td>
							      	<td>
										<input type="text" class="form-control" placeholder="Enter name" name="singleRoomNameEdit[5][{{$value->id}}]" value="{{$value->names}}">
							      	</td>
							      	<td class="sadasd">
							      		<select name="roomRequestsEdit[5][{{$value->id}}][]" class="selectCls" multiple="">
							      			<option value="0">None</option>
								      		<?php foreach ($roomRequests as $keyrm => $valuerm) {
								      			$selected = '';
								      			if (in_array($valuerm->id, $ceTrR)){
								      				$selected = 'selected';
								      			}
								      		 ?>
								      			<option value="{{ $valuerm->id }}" {{$selected}}>{{ $valuerm->name }}</option>
								      		<?php } ?>
							      		</select>
							      	</td>
							      	<td>
										<input type="text" class="form-control"  placeholder="Enter Special requests" name="specialRequestsEdit[5][{{$value->id}}]" value="{{$value->specials}}">
							      	</td>
							      	<td>
							      		<a class="removeRoomsCls removeRoomsIconCls btn" data-id="{{$value->id}}"><i class="fas fa-trash-alt"></i></a>
							      	</td>
							    </tr>
						  	<?php 
						  		$qrdCnt++;
						  		}
						  	}
							  	for ($i=1; $i <= $qrd; $i++) { ?>
								    <tr>
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
											<input type="text" class="form-control" placeholder="Enter Special requests" name="specialRequests[5][{{$i}}]">
								      	</td>
								      	<td>&nbsp;</td>
								    </tr>
							  	<?php } ?>
						  	</tbody>
						</table>
					</div> 
				</div>
			</div>
		@endif
	</div>
	<div class="col-sm-2">
		<p>&nbsp;</p>
		<a class="orangeLink saveChangesBtn">Save changes</a>
	</div>			
				<div class="col-sm-10">
				</div>		
	<input type="submit" value="Send" class="addRoomsMain" id="addRoomsMain" style="display: none;">
</form>
	<br />
	{{-- <div class="butbutHolder">
		<div class="butHolder">
			<a class="orangeLink tourOverviewButton" data-fancybox data-type="ajax" data-src="" href="{{ route('add-rooms', $cart_experience[0]->id) }}">Add rooms</a>	
			<a class="orangeLink tourOverviewButton" data-fancybox data-type="ajax" data-src="" href="{{ route('swap-rooms', $cart_experience[0]->id) }}">Rooms swap</a>	
			<a class="orangeLink tourOverviewButton" data-fancybox data-type="ajax" data-src="" href="{{ route('cancel-rooms', $cart_experience[0]->id) }}">Request cancelation</a>	
		</div>
		<div class="butHolder">
			<div>Rooms sold: {{$rooms_sold}}&nbsp;&nbsp;&nbsp;</div>
			<div>Tour pax: {{$rooms_ppl}}</div>
		</div>		
	</div> --}}
	{{-- <br style="clear: both;" />
	<br />
	
	<div class="tab">
	@foreach($hotel_rooms as $rooms)
			@foreach($rooms->rooms["roomInfo"] as $item)
				<button class="tablinks @if ($loop->parent->first) active @endif" onclick="openCity(event, 'room{{$item->id}}')" @if ($loop->parent->first)id="defaultOpen"@endif>{{$item->name}}</button>
				
			@endforeach	
	@endforeach
	</div>
	@foreach($hotel_rooms as $rooms)
			@foreach($rooms->rooms["roomInfo"] as $item)
				<div id="room{{$item->id}}" class="tabcontent @if ($loop->parent->first) active @endif" @if ($loop->parent->first) style="display: block;" @endif>
				  <br />
				  <div class="ttlHolder">
				  	<div>
				  		Mark as sold
				  	</div>
				  	<div>
				  		Name
				  	</div>
				  	<div>
				  		Room requests
				  	</div>
				  	<div>
				  		Special request
				  	</div>
				  </div>
				  @foreach($rooms->rooms["roomPPL"] as $item1)
				  
				  <div class="roomLine @if($item1->status == -1) Canceled @endif @if($item1->status == -2) Pending @endif">
				  	<div class="@if($item1->status == -1 || $item1->status == -2) element @else check @endif">
				  		@if($item1->status == -1)
				  			&nbsp;&nbsp;&nbsp;Cancellation pending ...
				  		@else
					  		@if($item1->status == -2)
					  		&nbsp;&nbsp;&nbsp;Room swap pending ...	
					  		@else
						  		<label class="containerCheck"  name="statusCheck{{$item1->id}}" value="{{$item1->id}}" >
									  <input type="checkbox" @if($item1->status == 1) checked @endif class="clickCheck" value="{{$item1->id}}">
									  <span class="checkmark"></span>
									</label>
								@endif
							@endif
				  	</div>
				  	<div class="element">
				  		@if($item1->status == -2)
					  		<div class="visible">
					  			{{$item1->names}}
					  		</div>
				  		@else
				  		<div @if($item1->status == 1) class="visible" @else @if($item1->status == -2) class="" @else class="hidden" @endif @endif id="names{{$item1->id}}">
					  		<input type="text" data-id="{{$item1->id}}" name="names{{$item1->id}}" value="{{$item1->names}}" id="namesData{{$item1->id}}">
					  		<i class="far fa-save saveName" data-id="{{$item1->id}}"></i>
					  	</div>
					  	@endif
				  	</div>
				  	<div class="element">
				  		<div @if($item1->status == 1) class="visible" @else @if($item1->status == -2) class="visible" @else class="hidden" @endif @endif id="req1{{$item1->id}}">
				  			<br />
				  			<a class="orangeLinkSmall" data-fancybox data-type="ajax" data-src="" href="{{ route('change-room-info', $item1->id) }}">Edit request</a>
				  		</div>
				  	</div>
				  	<div class="element">
				  		<div  class="editSpecials @if($item1->status == 1) visible  @else @if($item1->status == -2) visible @else hidden @endif @endif" id="req2{{$item1->id}}">
				  			{{$item1->specials}}
				  			@if($item1->status == -2)
				  				<br />
				  				New request: {{$item1->swap_request_text}}
				  			@endif
				  			<br />
				  			<a class="orangeLinkSmall" data-fancybox data-type="ajax" data-src="" href="{{ route('change-room-info', $item1->id) }}">Edit request</a>
				  		</div>
				  	</div>				  
					</div>
				  @endforeach
				  
				  
				  
				</div>
			@endforeach	
	@endforeach
				
					
	<br />
	<br />
	<div class="accSummary">
		<h3>Accommodation Summary</h3>
		<br />
		<div class="leftPartSumm"><b>Quantity sold</b></div><div class="rightPartSumm"><b>Room type</b></div>
		<br style="clear: both;" />
	@foreach($hotel_rooms as $rooms)
			@foreach($rooms->rooms["roomInfo"] as $item)
					<div class="leftPartSumm">{{$rooms->rooms["sold"]}} of {{$rooms->rooms["taken"]}}</div><div class="rightPartSumm">{{$item->name}}</div>
					<br style="clear: both;" />
			@endforeach
	@endforeach		
	</div>
					
	<br />
	<br />
						
	<br />
	<br /> --}}
</div>
<style>
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
</style>


<script>
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
	$(document).on('click','.nav-link', function(){
		$('.nav-link').removeClass('active');
		$('.nav-item').removeClass('active');
		var href = $(this).attr('data-href').substring(1);
		// alert(href);
		$(this).addClass('active');
		$(this).closest('.nav-item').addClass('active');
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
</script>