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
		span.cost_error {
		    color: red;
		    font-weight: bold;
		    margin-left: 5px;
		}
		.guest_list_name {
		    clear: both;
		    padding-top: 15px;
		}
		.form-check{padding-left: 0px !important;}
		.checkarea_part_Dates label{text-transform:unset;}
	</style>
	<link href="{{ asset('css/style-bespoke.css') }}" rel="stylesheet">
	<h2>
		<?php  $currency_symbol = getCurrencySymbol($cart_experience[0]->currency); ?>
		{{$cart_experience[0]->hotel_name}} - Cabin requests
	</h2>
	<h5>
		Please tell us which cabin you need and we will request them immediately
	</h5>
	
	<br />
	<br />
	<h5 class="howmany_room">How many cabins do you need?</h5>
	<select name="numRooms" id="numRoomsAdd" style="padding: 10px; margin-bottom: 30px;">
		<option value="0">0</option>
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
		<option value="6">6</option>
		<option value="7">7</option>
		<option value="8">8</option>
		<option value="9">9</option>
		<option value="10">10</option>
	</select>
	<br />
	<form method="post" action="{{ route('add-rooms-detail') }}" id="dataHolder">
		<input type="hidden" value="{{$cart_experience[0]->id}}" name="cart_id">
		{{ csrf_field() }}
		@for ($i = 1; $i <= 10; $i++)
		    <div class="roomHolder notReqCls" id="roomHolderNew{{$i}}">
		    	<h3>Cabin {{ $i }}</h3>
		    	<div class="form-group">
		  		</div>
		  		<div class="form-group">
				    <label class="graycls">Cabin</label>
				    <p>Please select a cabin</p>
			    	<select name="room_type[{{$i}}]" data-id="{{$i}}" class="form-control room_type {{$i==1?'first_room':''}}" data-msg-required="Please select type" required>
						<option value="">Select</option>
						@if(!empty($cabinDetail))
                           @foreach($cabinDetail as $k1=>$cabinval)
                            
							<option value="{{ $cabinval->id}}">{{$cabinval->name}}</option>
							
                            @endforeach
                        @endif
			    	</select>
			    </div>
			    <?php if(!empty($supplements)){ ?> 
		    	<div class="form-group marginBottom0">
				    <label class="graycls">Request Type</label>
				    <p class="mb-4">Please note your request may be subject to a supplement</p>
		  		</div>
		  		<div class="form-check sup_1">
			    		<div class="checkarea_part_Dates">
			                <label class="checkbox_div graycls" style="font-size: 13px;">
			                  <input type="checkbox" name="room_requests[{{$i}}][]" class="custom_chkbox tagchkbox notClickedCls " data-id="{{$i}}" value="1"> Single Supplement <span class="notClickedCls "></span>
			                  <span class="checkmark"></span>
			                </label>
			            </div>
			        </div>
		    	<?php 
		    	//pr($roomRequests);
		    	$cls_dbl = '';
		    	foreach ($supplements as $key => $valuesup) { 
		    		//if(!empty($supplements) && in_array($value->id, array_column($supplements, 'supplements'))){
		    			//$k = array_search($value->id, array_column($supplements, 'supplements'));
		    				$value['supplements'] = $valuesup->id;
		    				$sup =$valuesup->supplement_name;
		    				$price_out = $valuesup->out_price_euro;
	    					$price_in = $valuesup->in_price_euro;
	    					$price_type = $valuesup->price_type;
	    					/*$price[1] = $value['price_out'];
	    					$price_in[1] = $value['price'];
	    					$price_type[1] = $value['price_type'];*/
		    				
		    				/*if(in_array($value['supplements'], $roomsSupplementsRequest)){
		    					continue;
		    				}*/
		    			
		    			
		    		?>
			    	<div class="form-check sup_{{$valuesup->id}}">
			    		<div class="checkarea_part_Dates">
			                <label class="checkbox_div graycls" style="font-size: 13px;">
			                  <input type="checkbox" name="room_requests[{{$i}}][]" class="custom_chkbox tagchkbox notClickedCls {{$cls_dbl}}" data-id="{{$i}}" value="{{ $valuesup->id }}"> {{ $sup }} <?php if ( Auth::check() && Auth::user()->hasRole("Super Admin")){ ?><b> In </b>({{$currency_symbol}}{{$price_in}}) {{$price_type}}-  <b>Out</b> <?php } ?>({{$currency_symbol}}{{$price_out}}) - {{($price_type == 'pppn')?'pp':$price_type}}<span class="notClickedCls "></span>
			                  <span class="checkmark"></span>
			                </label>
			            </div>
			        </div>
		    	<?php
			    	} 
			    } ?>
			    <?php if ( Auth::check() && Auth::user()->hasRole("Super Admin")){ ?>
			    <div class="row" style="clear:both;">
				    <div class="form-check" style="margin-left: 16px;">
			    		<div class="checkarea_part_Dates">
			                <label class="checkbox_div graycls">
			                  <input type="checkbox" name="room_requests_other[{{$i}}][]" class="custom_chkbox tagchkbox notClickedCls other_supplement" value="5"> Other<span class="notClickedCls "></span>
			                  <span class="checkmark"></span>
			                </label>
			            </div	>
			        </div>
		        </div>
		        <div class="add_div_{{$i}} other_div" style="display:none;">
		        	<button class="btn-sm btn-primary add_upgrade mt-5" type="button" data-value="{{$i}}" id="add_upgrade">Add More</button>
					<div class="guest_list_upgrade_other">
						<!-- <input type="checkbox" id="other" /> <label for="other">Other:</label>  -->
						
							<div class="guest_list_upgrade_other_control upgrade_name_div">
								<label>Upgrade name</label>
								<input type="text" name="upgrade_name[{{$i}}][]" maxlength="100" id="upgrade_name" class="upgrade-name" placeholder="Additional upgrade" />
							</div>
							
							<div class="guest_list_upgrade_other_control upgrade_cost_div">
								<label>Upgrade cost IN {{$currency_symbol}}</label>
								<input type="text" name="upgrade_cost[{{$i}}][]" maxlength="5" id="upgrade_cost" class="upgrade-cost" / placeholder=" " />
							</div>
							<div class="guest_list_upgrade_other_control upgrade_cost_out_div">
								<label>Upgrade cost OUT {{$currency_symbol}}</label>
								<input type="text" name="upgrade_cost_out[{{$i}}][]" maxlength="5" id="upgrade_cost_out" class="upgrade-cost-out" / placeholder=" " />
							</div>
							<div class="guest_list_upgrade_other_control upgrade_cost_type_div">
								<select class="form-control notClickedCls valid" name="upgrade_cost_type[{{$i}}][]" class="upgrade_cost_type" fdprocessedid="24vei" aria-invalid="false">
                                        <option value="pppn">pppn</option>
                                        <option value="prpn">prpn</option>
                                    </select>
							</div>
						<button class="btn-sm btn-primary remove_upgrade" type="button" >Remove</button>
						<span style="display:none;" class="cost_error">Please enter all values.</span>
					</div>
					
				</div>
				
				<?php } ?>
				
		    	{{-- <br />
		    	<br />
		    	
		    	
		    	Room requests: -need to know how we'll add up sums on this and see the designs
		    	<br /><br /> --}}
		    	<div class="guest_list_name guest_name_div_{{$i}}">
		    		<div class="form-group marginBottom0">
					    <label class="graycls">Guest Names</label>
					    <p>Please enter the guest(s) name(s)</p>
					    <br/>
			  		</div>
			  		
			  		<div class="appendguestname">
			  			<div class="form-group guestinput_{{$i}} guest1_{{$i}}" style="display: inline-block;width: 100%;">
						    <p>Guest Name 1</p>
				    		<input name="guest_name[{{$i}}][]" maxlength="100" class="form-control"></input>
			  			</div>
			  			<div class="form-group guestinput_{{$i}} guest2_{{$i}}" style="display: inline-block;width: 100%;">
						    <p>Guest Name 2</p>
				    		<input name="guest_name[{{$i}}][]" maxlength="100" class="form-control"></input>
			  			</div>
			  			<!-- <div class="form-group guestinput_{{$i}} guest3_{{$i}}" style="display: inline-block;width: 100%;">
						    <p>Guest Name 3</p>
				    		<input name="guest_name[{{$i}}][]" maxlength="100" class="form-control"></input>
			  			</div>
			  			<div class="form-group guestinput_{{$i}} guest4_{{$i}}" style="display: inline-block;width: 100%;">
						    <p>Guest Name 4</p>
				    		<input name="guest_name[{{$i}}][]" maxlength="100" class="form-control"></input>
			  			</div> -->
			  		</div>
		    	</div>
		    	<br>
		    	<label class="graycls">Additional Comments</label>
		    	<div class="form-group " style="display: inline-block;width: 100%;">  
		    		<?php if ( Auth::check() && Auth::user()->hasRole("Super Admin")){ ?>
				    <p>Note for the hotel (this will be shown on the guest list)</p>
				   <?php } else { ?> <p>Please enter any addtional requests (walk in shower or ground floor rooms etc.) in the box below.</p> <?} ?>
		    		<textarea name="room_spec_request[{{$i}}]" class="form-control"></textarea>
		  		</div>
		  		<?php if ( Auth::check() && Auth::user()->hasRole("Super Admin")){ ?>
		    	<div class="form-group " style="display: inline-block;width: 100%;">
				     <p>Internal Note</p>
		    		<textarea name="room_note[{{$i}}]" class="form-control"></textarea>
		  		</div>
		  		<?php } ?>
		  		<br>
		    	
		    </div>
		@endfor	
		<p class="note_message">Please note that room requests are not guaranteed and may include additional charges</p>
		</br>
		<input type="button" value="Cancel" onClick="javascript: parent.jQuery.fancybox.close();" class="blueB">
		&nbsp;&nbsp;
		<input type="button" value="Continue" class="orangeB" id="showRoomss">
		<input type="button" value="Send" class="orangeB" id="addRooms">
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
	.guest_list_upgrades h4{
		
		color:#000000;
	}
	
	.guest_list_upgrades .single_check{
		margin:16px 0 0 0;
		position:relative;
	}
	
	.guest_list_upgrades .single_check input[type="checkbox"]
	{position:absolute; opacity:0;}
	
	.guest_list_upgrades .single_check label{
			font-size: 14px;
    margin: 0;
    color: #000000;
    position: relative;
    padding: 3px 0 0 34px;
	}
	
	.guest_list_upgrades .single_check label:before{
		
		background:#eeeeee;
		border:1px solid #c8c8c8;
		width:24px;
		height:24px;
		position:absolute;
		content:'';
		left:0;
		top:0;
	}
	
	.guest_list_upgrades .single_check label:hover:before{		
		border-color:#fca311;
		background:#fca311;
	}
	
	.guest_list_upgrades .single_check input:checked + label:before{		
		border-color:#fca311;
		background:#fca311;
	}
	
	
	.guest_list_upgrades .single_check input:checked + label:after{		
		left: 8px;
    top: 3px;
    width: 8px;
    height: 14px;
    border: solid white;
    border-width: 0 3px 3px 0;
    transform: rotate(45deg);
	position:absolute;
		content:'';
	}
	
	
	
	
	
	
	.guest_list_upgrade_other{
		margin:16px 0 8px 0;
		display:flex; 
		flex-wrap:Wrap;
		align-items:flex-end;
	}
	
	.guest_list_upgrade_other > label{
		font-size: 14px;
    margin: 0 15px 0 8px;
    color: #000000;
    line-height: 14px;	
position: relative;	
	}
	
	
	
	
	.guest_list_upgrade_other > label:before{
		
		background:#eeeeee;
		border:1px solid #c8c8c8;
		width:24px;
		height:24px;
		position:absolute;
		content:'';
		left:0;
		top:0;
	}
	
	.guest_list_upgrade_other > label:hover:before{		
		border-color:#fca311;
		background:#fca311;
	}
	
	.guest_list_upgrade_other input:checked + label:before{		
		border-color:#fca311;
		background:#fca311;
	}
	
	
	.guest_list_upgrade_other input:checked + label:after{		
		left: 8px;
    top: 3px;
    width: 8px;
    height: 14px;
    border: solid white;
    border-width: 0 3px 3px 0;
    transform: rotate(45deg);
	position:absolute;
		content:'';
	}
	
	
	
	.guest_list_upgrade_other .guest_list_upgrade_other_control{
		
		display:flex;
		flex-direction:column;
		margin:0 20px 0 0;
		}
	
	.guest_list_upgrade_other .guest_list_upgrade_other_control label{
		
		margin:0 0 2px 0;
		color:#999999;
		font-weight:400; font-size:12px;
		display:block;
	}
	
	.custom_adding_guest_list_inner .form_row{
		display:flex;
		flex-direction:column;
		margin:0 0 15px 0;
		
	}
	
	.custom_adding_guest_list_inner .form_row input,
	.custom_adding_guest_list_inner .form_row textarea
	{width:100%; height:42px; border:1px solid #cccccc; padding:0 10px;}
	
	.custom_adding_guest_list_inner .form_row textarea{height:100px; padding:10px;}
	
</style>


<script>
	<?php if(!empty($experienceDates) && count($experienceDates) > 1){
		
		$url = route('add-multirooms-collobrator-detail');
	}else{
		$url = route('add-rooms-detail-cruise');
	} ?>
	//$('.guest_list_name').hide();
	$('.note_message').hide();
	$(document).on("change", ".room_type", function() {
		var id = $(this).data('id');
		$('.guestinput_'+id).hide();
		$('.guest_name_div_'+id).show();
		var room_type = $(this).val();
		if ($('#roomHolderNew'+id+' .cls_dbl').prop('checked')==true){ 
			var cls_dbl = $('#roomHolderNew'+id+' .cls_dbl').val();
		}
		else
		{
			var cls_dbl = '';
		}

		if(room_type == 1)
		{
			$('.guest1_'+id).show();
		}
		else if(room_type == 2)
		{
			$('.guest1_'+id).show();
			if(cls_dbl != 4)
			{
				$('.guest2_'+id).show();
			}
			
		}
		else if(room_type == 3)
		{
			$('.guest1_'+id).show();
			if(cls_dbl != 4)
			{
				$('.guest2_'+id).show();
			}
		}
		else if(room_type == 4)
		{
			$('.guest1_'+id).show();
			if(cls_dbl != 4)
			{
				$('.guest2_'+id).show();
				$('.guest3_'+id).show();
			}
		}
		else if(room_type == 5)
		{
			$('.guest1_'+id).show();
			if(cls_dbl != 4)
			{
				$('.guest2_'+id).show();
				$('.guest3_'+id).show();
				$('.guest4_'+id).show();
			}
		}
		else
		{
			$('.guest_name_div_'+id).hide();
		}
		if(room_type == 1)
		{
			$(this).parent().parent().children('.sup_4').hide();
		}		
		else
		{
			$(this).parent().parent().children('.sup_4').show();
		}
	});
	
	$(document).on("click", ".custom_chkbox", function() {
		var id = $(this).val();
		if ($(this).prop('checked')==true){ 
			if(id == 1)
			{
				$('.guest2_1').hide();
			}
			else
			{
				$('.guest2_1').show();
			}
		}
		else
		{
			$('.guest2_1').show();
		}
	})
	$(document).on("click", ".cls_dbl", function() {
		var id = $(this).data('id');

		if ($(this).prop('checked')==true){ 
			$('.guestinput_'+id).hide();
			$('.guest_name_div_'+id).show();
			$('.guest1_'+id).show();
		}
		else
		{
			$('.guestinput_'+id).hide();
			$('.guest_name_div_'+id).show();
			var room_type = $('#roomHolderNew'+id+' .room_type').val();
			if(room_type == 1)
			{
				$('.guest1_'+id).show();
			}
			else if(room_type == 2)
			{
				$('.guest1_'+id).show();
				$('.guest2_'+id).show();
			}
			else if(room_type == 3)
			{
				$('.guest1_'+id).show();
				$('.guest2_'+id).show();
			}
			else if(room_type == 4)
			{
				$('.guest1_'+id).show();
				$('.guest2_'+id).show();
				$('.guest3_'+id).show();
			}
			else if(room_type == 5)
			{
				$('.guest1_'+id).show();
				$('.guest2_'+id).show();
				$('.guest3_'+id).show();
				$('.guest4_'+id).show();
			}
			else
			{
				$('.guest_name_div_'+id).hide();
			}
			if(room_type == 1)
			{
				$(this).parent().parent().children('.sup_4').hide();
			}		
			else
			{
				$(this).parent().parent().children('.sup_4').show();
			}
		}
	});
	$(document).on("click", ".other_supplement", function() {
		
		if ($(this).prop('checked')==true){ 
			$(this).parent().parent().parent().parent().next('.other_div').show();
			$(this).parent().parent().parent().parent().next('.other_div').addClass('open_div');
		}
		else
		{
			$(this).parent().parent().parent().parent().next('.other_div').hide();
			$(this).parent().parent().parent().parent().next('.other_div').removeClass('open_div');
		}
	});
	
	$(document).on("click", ".remove_upgrade", function() {
			if(confirm('Are you sure you want to remove'))
			{
				$(this).parent('.guest_list_upgrade_other').remove();	
			}
			
		});
		var currency_symbol = '<?=$currency_symbol?>';
		$('.add_upgrade').click(function(e){
			var id = $(this).attr('data-value');
			var html = '';
			html += '<div class="guest_list_upgrade_other">';
			html += '<div class="guest_list_upgrade_other_control upgrade_name_div">';
			html += '<label>Upgrade name</label>';
			html += '<input type="text" name="upgrade_name['+id+'][]" maxlength="100" id="upgrade_name" class="upgrade-name" placeholder="Additional upgrade" />';
			html += '</div>';

			html += '<div class="guest_list_upgrade_other_control upgrade_cost_div">';
			html += '<label>Upgrade cost in '+currency_symbol+'</label>';
			html += '<input type="text" name="upgrade_cost['+id+'][]" maxlength="5" id="upgrade_cost" class="upgrade-cost" / placeholder=" " />';
			html += '</div>';
			html += '<div class="guest_list_upgrade_other_control upgrade_cost_out_div">';
			html += '<label>Upgrade cost in '+currency_symbol+'</label>';
			html += '<input type="text" name="upgrade_cost_out['+id+'][]" maxlength="5" id="upgrade_cost_out" class="upgrade-cost-out" / placeholder=" " />';
			html += '</div>';
			html += '<div class="guest_list_upgrade_other_control upgrade_cost_type_div">';
			html += '<select class="form-control notClickedCls valid" name="upgrade_cost_type['+id+'][]" class="upgrade_cost_type" fdprocessedid="24vei" aria-invalid="false">';
			html += '<option value="pppn">pppn</option>';
			html += '<option value="prpn">prpn</option>';
			html += '</select>';
			html += '</div>';
			html += '<button class="btn-sm btn-primary remove_upgrade" type="button">Remove</button>';
			html += '<span style="display:none;" class="cost_error">Please enter all values.</span>';
			html += '</div>';

			$('.add_div_'+id).append(html);
		});
		
		
	$("#showRoomss").bind('click', function(e){
		$('.note_message').show();
		$('.howmany_room').hide();
		$("#numRoomsAdd").css("display", "none");
		$(this).css("display", "none");
		$("#addRooms").css("display", "inline-block");
		
		var i;
		for (i = 1; i <= $("#numRoomsAdd").val(); i++) {
		  $("#roomHolderNew"+i).css("display", "block");
		  $("#roomHolderNew"+i).removeClass('notReqCls');
		}
	   	$(".notReqCls").remove();		
	});
	$("#addRooms").bind("click", function(e){
		
		var cnt = 0;
		$( ".upgrade_name_div" ).each(function( index ) {
			if($(this).parent().parent().hasClass('open_div'))
			{
				var uname = $(this).children('.upgrade-name').val();
				 if(uname == '')
				 {
				 	$(this).parent().children('.cost_error').show();
				 	cnt = 1;
				 }
				 else
				 {
				 	$(this).parent().children('.cost_error').hide();
				 }
			}
			
			});
		var cnt1 = 0;
		$( ".upgrade_cost_div" ).each(function( index ) {
			if($(this).parent().parent().hasClass('open_div'))
			{
			var cost = $(this).children('.upgrade-cost').val();
			 if(cost == '')
			 {
			 	$(this).parent().children('.cost_error').show();
			 	cnt1 = 1;
			 }
			 else
			 {
			 	$(this).parent().children('.cost_error').hide();
			 }
			}
			});
		var cnt2 = 0;
		$( ".upgrade_cost_out_div" ).each(function( index ) {
			if($(this).parent().parent().hasClass('open_div'))
			{
			var cost = $(this).children('.upgrade-cost-out').val();
			 if(cost == '')
			 {
			 	$(this).parent().children('.cost_error').show();
			 	cnt2 = 1;
			 }
			 else
			 {
			 	$(this).parent().children('.cost_error').hide();
			 }
			}
			});
		if(cnt == 1 || cnt1 == 1 || cnt1 == 2)
		{

		}
		else
		{
			$('#save_guest_list').val('1');
	    	$('#addRoomsMain').trigger('click');
			$('.loader').show();
			var params = $("#dataHolder").serialize();
	   		$.ajax({
			    url: "{{ $url }}",
			    type: 'POST',
			    data: params,
			    success: function(data){
			        parent.jQuery.fancybox.close();
			        parent.parent.jQuery.fancybox.close();
			        var cartIdSCls = $('.cartIdSCls').val();
	                $('a#reloadInfo'+cartIdSCls).trigger('click');

			        toastSuccess('Cabin request has been added successfully.');
			       /* var first_room = $(".first_room").val();
	                if(first_room == '2')
	                {
	                	 timeout = setTimeout($('.dbl_tab').trigger('click'), 3000);
	                	
	                }*/
			        $('.loader').hide();
			    },
			    error: function(data){
			    	$('.loader').hide();
			    }
			});
		}
		
		
	});
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
	addTourCompleteValidateOpt = {
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
	        /*if (element.hasClass('selectCls')) {
	            error.insertAfter(element.next('span'));
	        } else {
	            error.insertAfter(jQuery(element));
	        }*/
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
                userFormData.append(val.name, val.value);
            });
            $('.loader').show();
            $.ajax({
                url: $(form).attr('action'),
                type: 'POST',
                dataType: 'JSON',
                cache: false,
                mimeType: "multipart/form-data",
                contentType: false,
                processData: false,
                // data: formData, 
                data: userFormData,
                beforeSend: function() {
                }
            }).done(function(data) {
                $('.loader').hide();
                parent.jQuery.fancybox.close();
                var cartIdSCls = $('.cartIdSCls').val();
                $('a#reloadInfo'+cartIdSCls).trigger('click');
            	

            });
            return false;
	    }, 
	};
	$(document).ready(function(){   
	    $('#dataHolder').validate(addTourCompleteValidateOpt);
	});
	var userFormData = new FormData();
</script>