<div>
	
	<link href="{{ asset('css/style-bespoke.css') }}" rel="stylesheet">
	<form method="post" action="{{ route('insert-driver-detail') }}" id="dataHolderSup">
		
		{{ csrf_field() }}
		    	<input type="hidden" name="cart_id" value="<?php echo $cart_id; ?>">
				@hasrole('Collaborator')
				<div class="custom_adding_guest_list">
					<h3>Add Driver Detail
					<!-- <span>Please select a type of upgrade and any notes necesery regarding the request</span> -->
					</h3>
					
					<div class="custom_adding_guest_list_inner">
						
						<?php if(!empty($cartExperience->driver) && ($cartExperience->driver == '1'|| $cartExperience->driver == '2')) {?>
						<div class="form_row">
							<label>Driver Name</label>
							<input type="text" name="driver_name" id="driver_name" maxlength="100" class="driver_name"  placeholder="" value="{{!empty($cartExperience->driver_name)?$cartExperience->driver_name:''}}"  /> 
						</div>
						<?php } ?>
						<?php if(!empty($cartExperience->driver) && $cartExperience->driver == '2') {?>
						<div class="form_row">
							<label>Courier Name</label>
							<input type="text" name="courier_name" id="courier_name" maxlength="100" class="courier_name"  placeholder="" value="{{!empty($cartExperience->courier_name)?$cartExperience->courier_name:''}}" /> 
						</div>
						<?php } ?>
						
						<input type="button" value="Cancel" onClick="javascript: parent.jQuery.fancybox.close();" class="blueB">
						&nbsp;&nbsp;				
						<input type="submit" value="Save" class="orangeB" id="addRooms">
						
					</div>
					
				
		    </div>
				@else
					
				<!-- Super USer -->
					
				
				<div class="custom_adding_guest_list">
					<h3>Add Driver Detail
					<!-- <span>Please select a type of upgrade and any notes necesery regarding the request</span> -->
					</h3>
					
					<div class="custom_adding_guest_list_inner">
					
						<?php if(!empty($cartExperience->driver) && ($cartExperience->driver == '1'|| $cartExperience->driver == '2')) {?>
						<div class="form_row">
							<label>Driver Name</label>
							<input type="text" name="driver_name" id="driver_name" maxlength="100" class="driver_name"  placeholder="" value="{{!empty($cartExperience->driver_name)?$cartExperience->driver_name:''}}"  /> 
						</div>
						<?php } ?>
						<?php if(!empty($cartExperience->driver) && $cartExperience->driver == '2') {?>
						<div class="form_row">
							<label>Courier Name</label>
							<input type="text" name="courier_name" id="courier_name" maxlength="100" class="courier_name"  placeholder="" value="{{!empty($cartExperience->courier_name)?$cartExperience->courier_name:''}}" /> 
						</div>
						<?php } ?>
						
						<input type="button" value="Cancel" onClick="javascript: parent.jQuery.fancybox.close();" class="blueB">
						&nbsp;&nbsp;				
						<input type="submit" value="Save" class="orangeB" id="addRooms">
						
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
		$(document).on("click", ".remove_upgrade", function() {
			if(confirm('Are you sure you want to remove'))
			{
				$(this).parent('.guest_list_upgrade_other').remove();	
			}
			
		});
	$(document).ready(function(){
		$('#add_upgrade').click(function(e){
			var html = '';
			html += '<div class="guest_list_upgrade_other">';
			html += '<div class="guest_list_upgrade_other_control">';
			html += '<label>Upgrade name</label>';
			html += '<input type="text" name="upgrade_name[]" id="upgrade_name" placeholder="Additional upgrade" />';
			html += '</div>';

			html += '<div class="guest_list_upgrade_other_control">';
			html += '<label>Upgrade cost in £</label>';
			html += '<input type="text" name="upgrade_cost[]" id="upgrade_cost" class="upgrade-cost" / placeholder=" " />';
			html += '</div>';

			html += '<button class="btn-sm btn-primary remove_upgrade" type="button">Remove</button>';
			html += '</div>';

			$('.add_div').append(html);
		});

		@hasrole('Collaborator')
	    $('#dataHolderSup').submit(function(e){
	    	e.preventDefault();
	    	
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
							parent.jQuery.fancybox.close();
		            	}else{
		            		alert('Something went wrong!');
		            	}
		                
		            });
		       
	    });
	    @endhasrole
	    @hasrole('Super Admin')
	    $('#dataHolderSup').submit(function(e){
	    	e.preventDefault();
	    	
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
							parent.jQuery.fancybox.close();
							toastSuccess('Driver detail successfully.');
		            	}else{
		            		alert('Something went wrong!');
		            	}
		                
		            });
		       
	    });
	    @endhasrole

	   
	});
	
</script>