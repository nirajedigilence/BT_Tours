<div>

	<link href="{{ asset('css/style-bespoke.css') }}" rel="stylesheet">
	<h1>
		Room requests
	</h1>
	<br />
	<h2>
		Please select a type of request that you need
	</h2>
	
	<form method="post" action="{{ route('colaborator-change-rooms-requests') }}" id="dataHolder">
	<input type="hidden" value="{{$cart_experience_rooms[0]->id}}" name="item_id">
	{{ csrf_field() }}
    	<br />
    	<br />
    	Room requests: -need to know how we'll add up sums on this and see the designs
    	<br />
    	<br />
    	<h2>Please note this request will be subject to a charge of £10 do you agree?</h2>
    	<br />
    	<input type="checkbox" > Yes I agree to any additional charges for this request
    	<br /><br />
    	Comments or other special requests (request not on the list)
    	<br />
    	<textarea name="room_spec_request" style="width: 95%; height: 50px; padding: 10px; border: 1px solid #DCDCDC; margin: 20px auto;">{{$cart_experience_rooms[0]->specials}}</textarea>
    	
	
	<input type="button" value="Cancel" onClick="javascript: parent.jQuery.fancybox.close();" class="blueB">
	&nbsp;&nbsp;
	<input type="button" value="Send" class="orangeB" id="changeRoom">
</form>
</div>
<style>
#addRooms{
	display: none;
}
.greyText{
	text-align: left;
	font: normal normal normal 14px/18px Montserrat;
	letter-spacing: 0px;
	color: #CFCFCF;
	opacity: 1;
}
.roomHolder{
	repeat padding-box;
	box-shadow: 0px 3px 6px #00000029;
	border: 1px solid #CFCFCF;
	opacity: 1;
	padding: 10px;
	margin-bottom: 20px;
	display: none;
}
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
  border-bottom: 0xp solid;
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
	$("#showRooms").bind('click', function(e){
		$("#numRoomsAdd").css("display", "none");
		$(this).css("display", "none");
		$("#addRooms").css("display", "inline-block");
		
		var i;
		for (i = 1; i <= $("#numRoomsAdd").val(); i++) {
		  $("#roomHolder"+i).css("display", "block");
		}
		
		
	});
	$("#changeRoom").bind("click", function(e){
	var params = $("#dataHolder").serialize();
   $.ajax({
		    url: "{{ route('colaborator-change-rooms-requests') }}",
		    type: 'POST',
		    data: params,
		    success: function(data){
		        parent.jQuery.fancybox.close();
		        parent.parent.jQuery.fancybox.close();
		        window.parent.parent.$('#reloadInfo{{$cart_experience_rooms[0]->cart_exp_id}}').click();
		        //window.parent.$("#defaultOpen").click();
		    }
		});
		
	});
</script>