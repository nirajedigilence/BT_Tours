<div>
	<style type="text/css">
		h2 {
	    
		    color: #212529;
		    margin-bottom: 10px;
		}
		h5 {
	    
		    color: #000;
		    margin-bottom: 5px;
		}
	</style>
	<link href="{{ asset('css/style-bespoke.css') }}" rel="stylesheet">
	<h2>
		Request Cancellation
	</h2>
	<h5>
		Please select a room with the persons name you'd like to remove
	</h5>
	
	<br />
	<br />
	<div id="roomTypes">
		<span class="greyText">Room type</span>
		<br />
		<select id="changeRoomList">
			<option value="0">Select</option>
		
				@foreach($hotel_rooms["roomInfo"] as $item)
					<option value="{{$item->id}}">{{$item->name}}</option>
					
				@endforeach	
		</select>
	</div>
	<h5 class="hidden" id="hiddenTitle">
		I want to cancel:
	</h5>
		<br /><br />
	<div class="ttlHolder" style="margin-bottom:10px;">
  	<div>
  		Room type
  	</div>
  	<div>
  		Name
  	</div>
  	<div>
  		Upgrade requests 
  	</div>
  	<div>
  		Guest request
  	</div>
  </div>
  <?php
  // pr($hotel_rooms);
  ?>
<form method="post" action="{{ route('colaborator-cancel-rooms-requests') }}" id="dataHolder">
	{{ csrf_field() }}	
			@foreach($hotel_rooms["roomInfo"] as $item)

				<div id="roomsHolder{{$item->id}}" class="filterElement hidden">

				  @foreach($hotel_rooms["roomPPL"] as $item1)

				  @if($item->id == $item1->room_id)
				  <?php 
				  //pr($item1);
				//  $room_requests = 


DB::connection('mysql_veenus')->table('rooms_supplements_requests')->where('cart_experiences_to_rooms_id',$item1->id)->get()->toArray();
				
				  $room_requests = App\Models\Cms\RoomsSupplementsRequest::where('cart_experiences_to_rooms_id',$item1->id)->orderBy('updated_at','desc')->get()->toArray();
				   // pr($room_requests);
				   ?>
				  
				  <div class="roomLine" data-id="{{$item1->id}}" style="padding: 15px 0;color: #000;">
				  	<input type="hidden" value="" id="rr{{$item1->id}}" name="cancel_rooms[]">
				  	<div class="check">
				  		{{!empty($item->name)?rtrim($item->name, "s"):$item->name}}
				  	</div>
				  	<div class="element">
				  		{{$item1->names}}
				  	</div>
				  	<div class="element">
				  			 <?php 
												      		$supplements = array();
												      		$pen_can = 0;
												      		if(!empty($room_requests)){
												      			foreach ($room_requests as $rskey => $rsvalue) {
												      				
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
												      		
												      		if(!empty($supplements)){
												      			echo implode('<br>', $supplements);
												      		
												      		}else{
												      		?>
													      		<i>No requests made</i>
													      	<?php } ?>
				  	</div>
				  	<div class="element">
				  			{{$item1->specials}}
				  	</div>				  
					</div>
					@endif
				  @endforeach
				  
				  
				  
				</div>
			@endforeach	
				
					
	<br />
	<br />
	<div class="hidden specTitles" >*All upgrades and special guest requests for this room will be removed.<br /><br /></div>
	
	<div class="hidden specTitles">Comments or other requests<br /><br /></div>
	<textarea name="spec_text" class="hidden specTitles" style="width: 95%; height: 50px;"></textarea>

	<div class="hidden specTitles">Please note any cancellations may incur charges (which will be confirmed on receipt of request)<br /><br /></div>


	<input type="button" value="Cancel" onClick="javascript: parent.jQuery.fancybox.close();" class="blueB">
	&nbsp;&nbsp;
	<input type="button" value="Continue" class="orangeB" id="cshowRooms">
	<input type="button" value="Send" class="orangeB" id="caddRooms">					
	<br />
	<br />
</form>						
	<br />
	<br />
</div>
<style>
	
.orangeB{
		background-color: #FCA311;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    display: inline-block;
    width: auto;
    	
}
.blueB{
		background-color: #14213D;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    display: inline-block;
    width: auto;
    	
}
#caddRooms{
	display: none;
}
	#changeRoomList{
		border: 1px solid #DCDCDC;
		border-radius: 2px;
		padding: 10px;
		font: normal normal normal 18px/22px Montserrat;
	}
	
.greyText{
	text-align: left;
font: normal normal normal 14px/18px Montserrat;
letter-spacing: 0px;
color: #CFCFCF;
opacity: 1;
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
	box-shadow: 0px 3px 6px #00000029;
	margin-bottom: 10px;
}	
.roomLineActive{
	border-color: #FCA311;
	    background: rgb(252,163,17,0.2);
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
  border-bottom: 1px solid #ccc;
}

/* Style the buttons that are used to open the tab content */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  border: 1px solid #000;
  margin-left: 10px;
}
.tab button:first-child{
	 margin-left: 0px;
}
/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
  border-bottom: 0px solid;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
  border-bottom: 0px solid;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
</style>


<script>
	
	$("#cshowRooms").bind("click", function(e){
		var r_active = 0;
		var room_type = $('#changeRoomList').val();
			  $( ".roomLine" ).each(function( index ) {
			  if($(this).hasClass('roomLineActive'))
			  {
			  	r_active = 1;
			  }
			});

		if(r_active == 1 && room_type != 0)
		{
			$(".roomLine").css("display", "none");
			$(".roomLineActive").css("display", "flex");
			//$(".roomLineActive").removeClass("roomLineActive");
			$("#roomTypes").css("display", "none");
			$("#hiddenTitle").removeClass("hidden");
			//$(".ttlHolder").css("display", "none");
			$(".specTitles").removeClass("hidden");
			$("#cshowRooms").css("display", "none");
			$("#caddRooms").css("display", "inline-block");
		}
		else{
			if(room_type == 0)
			{
				alert('Please select at least Room Type.')
			}
			else
			{
				alert('Please select at least 1 Room.')
			}
		}	  
		
	});

	$("#caddRooms").bind("click", function(e){
		var r_active = 0;
			  $( ".roomLine" ).each(function( index ) {
			  if($(this).hasClass('roomLineActive'))
			  {
			  	r_active = 1;
			  }
			});

		if(r_active == 1)
		{
	var params = $("#dataHolder").serialize();
   $.ajax({
		    url: "{{ route('colaborator-cancel-rooms-requests') }}",
		    type: 'POST',
		    data: params,
		    success: function(data){
		        parent.jQuery.fancybox.close();
		        parent.parent.jQuery.fancybox.close();
		        //window.parent.parent.$('#GreloadInfo{{$id}}').click();
		        var cartIdSCls = $('.cartIdSCls').val();
                $('a#reloadInfo'+cartIdSCls).trigger('click');
		        toastSuccess('Room cancel request has been added successfully.');
		    }
		});
		}
		else{
			alert('Please select at least 1 Room.')
		}	  
	});
	
	$(".roomLine").bind("click", function(e){
		if($(this).hasClass("roomLineActive")){
			$(this).removeClass("roomLineActive");
			$("#rr"+$(this).data("id")).val("");
		}
		else{
			$(this).addClass("roomLineActive");
			$("#rr"+$(this).data("id")).val($(this).data("id"));
		}
	});
	
	$("#changeRoomList").bind("change", function(e){
		
		if($(this).val() != 0){
			$(".filterElement").addClass("hidden");
			$("#roomsHolder"+$(this).val()).removeClass("hidden");
		}
		else{
			$(".filterElement").removeClass("hidden");
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
</script>