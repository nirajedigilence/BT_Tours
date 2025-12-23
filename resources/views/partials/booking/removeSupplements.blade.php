<div>
	
	<link href="{{ asset('css/style-bespoke.css') }}" rel="stylesheet">
	<form method="post" action="{{ route('remove-supplements-request') }}" id="dataHolderSup">
		
		{{ csrf_field() }}
				<input type="hidden" name="room_id" value="<?php echo $id; ?>">
		    	<input type="hidden" name="cart_id" value="<?php echo $cartId; ?>">
		    	<input type="hidden" name="hotel_dates_id" value="<?php echo $hotel_dates_id; ?>">
				@hasrole('Collaborator')
				<div class="roomHolder" style="padding: 30px;">
		    	<h5 style="margin-bottom: 20px;color: #000000 !important;"><b>Upgrade Request</b></h5>
		    	<!-- <b style="font-weight: 600;margin-bottom: 15px;display: inline-block;width: 100%;">Please select type of supplements that you need</b> -->
				 
		    	
		    	<div class="form-group" style="width: 100%;display: inline-block;">
		    		<!--   <label class="graycls" style="margin-bottom:unset;">Room type</label> 
				    <p><small>Please select a room type</small></p> -->
				    <br>
		    		<?php
		    		$currency_symbol = getCurrency($cartId);
		    		$comments = '';
		    		if(!empty($roomsSupplementsRequest)){
		    			$comments = $roomsSupplementsRequest[0]['comments'];
		    			$roomsSupplementsRequest = array_column($roomsSupplementsRequest,'supplements');
		    		}

		    		if(!empty($hotelDatesSupplements)){
		    			foreach ($hotelDatesSupplements as $key => $value) {
		    				if($cartexproom->room_id == 1)
		    				{
		    					if($value['supplements'] == 4){
		    						continue;
		    					}
		    				}
		    				$sup = '';
		    				if($value['supplements'] == 1){
		    					$sup = 'Water view (Sea/Lake/River)';
		    					$price[1] = ($currency_symbol == '€')?$value['price_euro_out']:$value['price_out'];
		    				}elseif($value['supplements'] == 2){
		    					$sup = 'View (Garden/Balcony)';
		    					$price[2] = ($currency_symbol == '€')?$value['price_euro_out']:$value['price_out'];
		    				}elseif($value['supplements'] == 3){
		    					$sup = 'Executive/De Luxe/Superior Rooms';
		    					$price[3] = ($currency_symbol == '€')?$value['price_euro_out']:$value['price_out'];
		    				}elseif($value['supplements'] == 4){
		    					$sup = 'Dbl/tw room for sole';
		    					$price[4] = ($currency_symbol == '€')?$value['price_euro_out']:$value['price_out'];
		    				}
		    				$checked = '';
		    				if(in_array($value['supplements'], $roomsSupplementsRequest)){
		    					$checked = 'checked';
		    				}
		    			?>
		    			<div class="form-check" style="padding-left: 0;">
				    		<div class="checkarea_part_Dates">
				                <label class="checkbox_div graycls">
				                  <input type="checkbox" name="supplements[<?php echo $value['supplements']; ?>][name]" class="supchk custom_chkbox tagchkbox notClickedCls " {{ $checked }} value="<?php echo $value['supplements']; ?>"> <?php echo $sup; ?><span class="notClickedCls "></span>
				                  <span class="checkmark"></span>
				                  <?php if($value['price_out']){
				                  	echo '<b style="margin-left: 20px;">'.$currency_symbol.$value['price_out'].'</b>';
				                  } ?>
				                </label>
				            </div>
		    				<input type="hidden" class="priceHidden" name="supplements[<?php echo $value['supplements']; ?>][price]" value="<?php echo $value['price_out']; ?>">
				        </div>
		    			<?php
		    			}
		    		}else{
		    			echo '<p>There are no supplements available for this tour</p>';
		    		}
		    		?>
		    	</div>
		    	<?php
		    	if(!empty($hotelDatesSupplements)){
		    	?>
		    	<!-- <b style="font-weight: 600;margin-bottom: 15px;display: inline-block;width: 100%;">Please note this request will be subject to charge of{{$currency_symbol}}<span id="priceOut">0</span> </b>
		    	<div class="form-group" style="width: 100%;display: inline-block;">
		    		<div class="form-check" style="padding-left: 0;">
			    		<div class="checkarea_part_Dates">
			                <label class="checkbox_div graycls">
			                  <input type="checkbox" name="agree" class="tandc custom_chkbox tagchkbox notClickedCls "> I agree to additional charge for this request as specified.<span class="notClickedCls "></span>
			                  <span class="checkmark"></span>
			                </label>
			            </div>
			        </div>
		    	</div> -->
		    	<?php
	    		}
	    		?>
	    		 <label class="graycls">Additional Comments</label>
		    	<div class="form-group" style="display: inline-block;width: 100%;">
				    <p>Comments or other special requests (request not on the list)</p>
		    		<textarea name="comments" class="form-control"><?php echo $comments; ?></textarea>
		  		</div>
		  		<p>Please select the Upgrade(s) you want to remove, then enter your initials and internal note before clicking Remove</p>
		  		<br>
				<input type="button" value="Cancel" onClick="javascript: parent.jQuery.fancybox.close();" class="blueB">
				&nbsp;&nbsp;
				<input type="submit" value="Send" class="orangeB" id="addRooms">
				</div>
				@else
					
				<!-- Super USer -->
					
				
				<div class="custom_adding_guest_list">
					<?php $room_type =  array('1'=>'Single','2'=>'Double','3'=>'Twin','4'=>'Triple','5'=>'Quadruple') ?>
					<h3>Remove Upgrade <?=(!empty($cartexproom->room_id))?$room_type[$cartexproom->room_id]:''?> Room
					<span>Please enter your Initials and Removal Note then click remove</span>
					</h3>
					
					<div class="custom_adding_guest_list_inner">
					
						<div class="guest_list_upgrades">
							<h4>Upgrade Type</h4>
							
		    		<?php 
		    		$supplements = array();
				      		if(!empty($roomsSupplementsRequest)){
				      			$pen_can = 0;
				      			foreach ($roomsSupplementsRequest as $rskey => $rsvalue) {
				      				
				      					if($rsvalue['upgrade_request_sup_status'] == 'pending')
				      					{
				      						$pen_can = 1;
				      					}
				      					$remove_link = '';
				      					if($rsvalue['supplements'] == 1){
				      						?>
				      						<div class="single_check">
												<input type="checkbox" class="supchk" name="supplements[<?=$rsvalue['id']?>]" id="sea<?=$rsvalue['id']?>" value="1" /> <label for="sea<?=$rsvalue['id']?>">Water view (Sea/Lake/River)  </label>
											
											</div>
				      						<?php
						      						//$rsvalue['supplements'] = '<span>Water view (Sea/Lake/River) : '.$rsvalue['upgrade_request_sup_status'].' </span>'.$remove_link;
						      					}elseif($rsvalue['supplements'] == 2){
						      						?>
				      						<div class="single_check">
												<input type="checkbox" class="supchk" name="supplements[<?=$rsvalue['id']?>]" id="sea<?=$rsvalue['id']?>" value="1" /> <label for="sea<?=$rsvalue['id']?>">View (Garden/Balcony)  </label>
											
											</div>
				      						<?php
						      						//$rsvalue['supplements'] = '<span>View (Garden/Balcony) : '.$rsvalue['upgrade_request_sup_status'].' </span>'.$remove_link;
						      					}elseif($rsvalue['supplements'] == 3){
						      							?>
				      						<div class="single_check">
												<input type="checkbox" class="supchk" name="supplements[<?=$rsvalue['id']?>]" id="sea<?=$rsvalue['id']?>" value="1" /> <label for="sea<?=$rsvalue['id']?>">Executive/De Luxe/Superior Rooms </label>
											
											</div>
				      						<?php
						      						//$rsvalue['supplements'] = '<span>Executive/De Luxe/Superior Rooms : '.$rsvalue['upgrade_request_sup_status'].' </span>'.$remove_link;
						      					}elseif($rsvalue['supplements'] == 4){
						      						?>
				      						<div class="single_check">
												<input type="checkbox" class="supchk" name="supplements[<?=$rsvalue['id']?>]" id="sea<?=$rsvalue['id']?>" value="1" /> <label for="sea<?=$rsvalue['id']?>">Dbl/tw room for sole </label>
											
											</div>
				      						<?php
						      						//$rsvalue['supplements'] = '<span>Dbl/tw room for sole : '.$rsvalue['upgrade_request_sup_status'].' </span>'.$remove_link;
						      					}elseif($rsvalue['supplements'] == 7){
						      						?>
				      						<div class="single_check">
												<input type="checkbox" class="supchk" name="supplements[<?=$rsvalue['id']?>]" id="sea<?=$rsvalue['id']?>" value="1" /> <label for="sea<?=$rsvalue['id']?>">Walk In Shower </label>
											
											</div>
				      						<?php
						      						//$rsvalue['supplements'] = '<span>Walk In Shower : '.$rsvalue['upgrade_request_sup_status'].' </span>'.$remove_link;
						      					}elseif($rsvalue['supplements'] == 8){
						      						?>
				      						<div class="single_check">
												<input type="checkbox" class="supchk" name="supplements[<?=$rsvalue['id']?>]" id="sea<?=$rsvalue['id']?>" value="1" /> <label for="sea<?=$rsvalue['id']?>">Ground Floor Room </label>
											
											</div>
				      						<?php
						      						//$rsvalue['supplements'] = '<span>Ground Floor Room : '.$rsvalue['upgrade_request_sup_status'].'</span> '.$remove_link;
						      					}elseif($rsvalue['supplements'] == 5){
						      						?>
				      						<div class="single_check">
												<input type="checkbox" class="supchk" name="supplements[<?=$rsvalue['id']?>]" id="sea<?=$rsvalue['id']?>" value="1" /> <label for="sea<?=$rsvalue['id']?>"><?=$rsvalue['upgrade_name']?> </label>
											
											</div>
				      						<?php
				      						//$rsvalue['supplements'] = '<span>'.$rsvalue['upgrade_name'].' : '.$rsvalue['upgrade_request_sup_status'].'</span> '.$remove_link;
				      					}
				      					//$supplements[] = $rsvalue['supplements'];
				      				
				      			}
				      		}
				      ?>
						
					
						<div class="form_row">
							<label>Initials</label>
							<input type="text" name="initials" id="initials" maxlength="10" class="initials"  placeholder=""  /> 
						</div>
						
						<div class="form_row">
							<label>Internal Note</label>
							<textarea style="height:100px;" name="comments" id="comments" placeholder="" ></textarea>
						</div>
						
						<input type="button" value="Cancel" onClick="javascript: parent.jQuery.fancybox.close();" class="blueB">
						&nbsp;&nbsp;				
						<input type="submit" value="Remove" class="orangeB red-back" id="addRooms">
						
					</div>
					
				
		    </div>
				@endhasrole
	</form>
</div>
<style>
	.superUserRoomHolder .checkarea_part_Dates { width: 100% !important;} 
	.greyText{
		text-align: left;
		font: normal normal normal 14px/18px Montserrat;
		letter-spacing: 0px;
		color: #CFCFCF;
		opacity: 1;
	}
	.roomHolder{
		
		box-shadow: 0px 3px 6px #00000029;
		
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
	
	.custom_adding_guest_list{
		padding: 40px;
		box-shadow: 0 0 5px rgb(0 0 0 / 7%);
	}
	
	.custom_adding_guest_list > h3 span{
		display:block;
		font-size:17px;
margin-top:10px;		
	}
	
	.custom_adding_guest_list > h3{
		font-size:25px;			
	}
	
	.custom_adding_guest_list_inner{
		padding: 20px;
		box-shadow: 0 0 5px rgb(0 0 0 / 20%);
		margin:35px 0 0 0;
	}
	
	.guest_list_upgrades h4{
		
		color:#000000;
	}
	
	.guest_list_upgrades .single_check{
		margin:16px 0 0 0;
		position:relative;
	}
	span.cost_error {
		    color: red;
		    font-weight: bold;
		    margin-left: 5px;
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
		margin:16px 0 40px 0;
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
<script type="text/javascript">
	$(document).on("click", ".other_supplement", function() {
		
		if ($(this).prop('checked')==true){ 
			$('.add_div').show();
			$('.add_div').addClass('open_div');
		}
		else
		{
			$('.add_div').hide();
			$('.add_div').removeClass('open_div');
		}
	});
		$(document).on("click", ".remove_upgrade", function() {
			if(confirm('Are you sure you want to remove'))
			{
				$(this).parent('.guest_list_upgrade_other').remove();	
			}
			
		});
	$(document).ready(function(){
		

		@hasrole('Collaborator')
	    $('#dataHolderSup').submit(function(e){
	    	e.preventDefault();
	    	if($('input.supchk:checked').length > 0){
	    		/*if($('input.tandc:checked').length > 0){*/
	    			$('#save_guest_list').val('1');
	    			$('#addRoomsMain').trigger('click');
			    	var userFormData = $('#dataHolderSup').serialize();
		            $('.loader').show();
		            $.ajax({
		                url: $('#dataHolderSup').attr('action'),
		                type: 'POST',
		                dataType: 'JSON',
		                data: userFormData,
		                beforeSend: function() {
		                }
		            }).done(function(data) {
		                $('.loader').hide();
		            	if(data.status == 'success'){
		                	
							 parent.jQuery.fancybox.close();
					        parent.parent.jQuery.fancybox.close();
					        var cartIdSCls = $('.cartIdSCls').val();
			                $('a#reloadInfo'+cartIdSCls).trigger('click');
					        toastSuccess('Upgrade request has been added successfully.');
					        $('.loader').hide();
		            	}else{
		            		alert('Something went wrong!');
		            	}
		                
		            });
		        /*}else{
		        	alert('Select any additional supplements');
		        }*/
	        }else{
	        	alert('Atleast 1 supplement should be selected');
	        }
	    	
	    });
	    @endhasrole
	    @hasrole('Super Admin')
	    $('#dataHolderSup').submit(function(e){


	    	e.preventDefault();
	    	if($('input.supchk:checked').length > 0){
	    		/*if($('input.tandc:checked').length > 0){*/
	    			$('#save_guest_list').val('1');
	    			$('#addRoomsMain').trigger('click');
			    	var userFormData = $('#dataHolderSup').serialize();
		            $('.loader').show();
		            $.ajax({
		                url: $('#dataHolderSup').attr('action'),
		                type: 'POST',
		                dataType: 'JSON',
		                data: userFormData,
		                beforeSend: function() {
		                }
		            }).done(function(data) {
		                $('.loader').hide();
		            	if(data.status == 'success'){
		                	
							 parent.jQuery.fancybox.close();
					        parent.parent.jQuery.fancybox.close();
					        var cartIdSCls = $('.cartIdSCls').val();
			                $('a#reloadInfo'+cartIdSCls).trigger('click');
					        toastSuccess('Upgrade request has been added successfully.');
					        $('.loader').hide();
		            	}else{
		            		alert('Something went wrong!');
		            	}
		                
		            });
		        /*}else{
		        	alert('Select any additional supplements');
		        }*/
	        }else{
	        	alert('Atleast 1 supplement should be selected');
	        }
	    });
	    @endhasrole

	    calculatePrice();
	    $('input.supchk').click(function(){
	    	calculatePrice();
	    });
	});
	function calculatePrice(){
		var priceHidden = 0;
    	$("input.supchk:checked").each(function(){
    		if($(this).closest('.form-check').find('.priceHidden').val() != ''){
				priceHidden += parseInt($(this).closest('.form-check').find('.priceHidden').val());
    		}
		});
		$('#priceOut').text(priceHidden);
	}
</script>