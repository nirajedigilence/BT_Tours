<div>

	<link href="{{ asset('css/style-bespoke.css') }}" rel="stylesheet">
	<h4>
		<b>Room swap</b>
	</h4>
	<b class="hideMe">
		Please tell us which rooms you would like to swap and we will make the request immediately
	</b>
	<br>
	<br>
	<b>
		Select a room which you want to swap
	</b>
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
	<b class="hidden" id="hiddenTitle">
		I want to swap:
	</b>
		<br /><br />
	<div class="ttlHolder" style="margin-bottom:10px;">
  	<div>
  		Room type
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
  <?php
  // pr($hotel_rooms);
  ?>
<form method="post" action="{{ route('colaborator-swap-rooms-requests') }}" id="dataHolder">
	{{ csrf_field() }}	
			@foreach($hotel_rooms["roomInfo"] as $item)
				<div id="roomsHolder{{$item->id}}" class="filterElement hidden">

				  @foreach($hotel_rooms["roomPPL"] as $item1)
					  @if($item->id == $item1->room_id)
					  <div class="roomLine" data-id="{{$item1->id}}" style="padding: 20px 0;color: #000;">
					  	<input type="hidden" value="" id="rr{{$item1->id}}" name="swap_from_rooms[]" class="roomchecks">
					  	<div class="check">
					  		{{$item->name}}
					  	</div>
					  	<div class="element">
					  		{{$item1->names}}
					  	</div>
					  	<div class="element">
					  		---
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
	<b class="hideMe">Continue to select which room you would like to swap this room with</b><br /><br />
	<b class="hidden specTitles hideMe2">Which room would you like to swap it with?<br /><br /></b>
	<b class="hidden specTitles1" >For<br /><br /></b>

	<div class="hidden specTitles" >
		<div id="roomTypes1">
			<span class="greyText">Room type</span>
			<br />
			<select id="changeRoomList1">
				<option value="0">Select</option>
					@foreach($hotel_rooms["roomInfo"] as $item)
						<option value="{{$item->id}}">{{$item->name}}</option>
						
					@endforeach	
			</select>
		</div>
			<br /><br />
		<div class="ttlHolder" style="margin-bottom:10px;">
	  	<div>
	  		Room type
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

			@foreach($hotel_rooms["roomInfo"] as $item)
				<div id="roomsHolderT{{$item->id}}" class="filterElement1 hidden">

				  @foreach($hotel_rooms["roomPPL"] as $item1)
				  @if($item->id == $item1->room_id)
					  @if($item1->names)
					  @else
						  <div class="roomLine1" data-id="{{$item1->id}}" style="padding: 20px 0;color: #000;">
						  	<input type="hidden" value="" id="rt{{$item1->id}}" name="swap_to_rooms[]" class="roomchecksT">
						  	<div class="check">
						  		{{$item->name}}
						  	</div>
						  	<div class="element">
						  		{{$item1->names}}
						  	</div>
						  	<div class="element">
						  		---
						  	</div>
						  	<div class="element">
						  			{{$item1->specials}}
						  	</div>				  
							</div>
						@endif
						@endif
				  @endforeach
				  
				  
				  
				</div>
			@endforeach	
	  
	  
	  
	</div>
	<br /><br />
	<div class="hidden specTitles1">
		<!-- <br /><br />
		<h3>Please select a type of request that you need for the swapped room<br /><br /></h3>
		*Any current requests on a room you want to swap will not be transferred, please choose another request if required<br />
		
		<h3>Please note this request will be subject to a charge of £50 for the room swap and £10 for other requests, do you agree?<br /><br /></h3>
		<input type="checkbox"> Yes I agree to any additional charges for this request -->
		<br /><br />
		Comments or other requests<br />
		<textarea name="spec_text" class="hidden specTitles" style="width: 95%; height: 50px;"></textarea>
		<br />
		Please note that room requests are not guaranteed and may include additional charges
		
		<br /><br />
	</div>
	<input type="button" value="Cancel" onClick="javascript: parent.jQuery.fancybox.close();" class="blueB">
	&nbsp;&nbsp;
	<input type="button" value="Continue" class="orangeB" id="showRooms0">
	<input type="button" value="Continue" class="orangeB" id="showRooms1">
	<input type="button" value="Send" class="orangeB" id="addRooms">					
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
#addRooms, #showRooms1{
	display: none;
}
	#changeRoomList, #changeRoomList1{
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
.roomLine input[type=text], .roomLine1 input[type=text]{
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

.roomLine, .roomLine1{
	font: normal normal normal 16px/19px Montserrat;
	letter-spacing: 0px;
	color: #9A9898;
	display: flex;
	border: 1px solid #CFCFCF;
	padding: 30px 0px;
	box-shadow: 0px 3px 6px #00000029;
	margin-bottom: 20px;
}	
.roomLineActive, .roomLineActive1{
	border-color: #FCA311;
	    background: rgb(252,163,17,0.2);
}
.roomLine div.check, .roomLine1 div.check{
	width: 12% !important;
	text-align: center;
}
.roomLine div.element, .roomLine1 div.element{
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
	
	$("#showRooms0").bind("click", function(e){
		$(".hideMe").css("display", "none");
		$(".roomLine").css("display", "none");
		$(".roomLineActive").css("display", "flex");
		$(".roomLineActive").removeClass("roomLineActive");
		$("#roomTypes").css("display", "none");
		$("#hiddenTitle").removeClass("hidden");
		//$(".ttlHolder").css("display", "none");
		$(".specTitles").removeClass("hidden");
		$("#showRooms0").css("display", "none");
		$("#showRooms1").css("display", "inline-block");
	});
	
	$("#showRooms1").bind("click", function(e){
		$(".hideMe").css("display", "none");
		$(".hideMe2").css("display", "none");
		$(".specTitles1").removeClass("hidden");
		$(".roomLine1").css("display", "none");
		$(".roomLineActive1").css("display", "flex");
		$(".roomLineActive1").removeClass("roomLineActive1");
		$("#roomTypes1").css("display", "none");
		//$("#hiddenTitle").removeClass("hidden");
		//$(".ttlHolder").css("display", "none");
		//$(".specTitles").removeClass("hidden");
		$("#showRooms1").css("display", "none");
		$("#addRooms").css("display", "inline-block");
	});

	$("#addRooms").bind("click", function(e){   
	var params = $("#dataHolder").serialize();
   $.ajax({
		    url: "{{ route('colaborator-swap-rooms-requests') }}",
		    type: 'POST',
		    data: params,
		    success: function(data){
		        parent.jQuery.fancybox.close();
		        // parent.parent.jQuery.fancybox.close();
		        window.parent.parent.$('#reloadInfo{{$id}}').click();
		    }
		});
		
	});
	
	$(".roomLine").bind("click", function(e){
		
		if($(this).hasClass("roomLineActive")){
			$(this).removeClass("roomLineActive");
			$("#rr"+$(this).data("id")).val("");
		}
		else{
			$(".roomLine").removeClass("roomLineActive");
			$(".roomchecks").val("");
			$(this).addClass("roomLineActive");
			$("#rr"+$(this).data("id")).val($(this).data("id"));
		}
	});
	
	$(".roomLine1").bind("click", function(e){
		
		if($(this).hasClass("roomLineActive1")){
			$(this).removeClass("roomLineActive1");
			$("#rt"+$(this).data("id")).val("");
		}
		else{
			$(".roomLine1").removeClass("roomLineActive1");
			$(".roomchecksT").val("");
			$(this).addClass("roomLineActive1");
			$("#rt"+$(this).data("id")).val($(this).data("id"));
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

	$("#changeRoomList1").bind("change", function(e){
		
		if($(this).val() != 0){
			$(".filterElement1").addClass("hidden");
			$("#roomsHolderT"+$(this).val()).removeClass("hidden");
		}
		else{
			$(".filterElement1").removeClass("hidden");
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