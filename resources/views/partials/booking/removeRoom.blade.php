<div>
	
	<link href="{{ asset('css/style-bespoke.css') }}" rel="stylesheet">
	<form method="post" action="{{ route('remove-room-request') }}" id="dataHolderSup">
		
		{{ csrf_field() }}
				<input type="hidden" name="room_id" value="<?php echo $id; ?>">
		    	
			
					
				<!-- Super USer -->
					
				
				<div class="custom_adding_guest_list">
						<h3>Cancel Room
					<!-- <span>Please select a type of upgrade and any notes necesery regarding the request</span> -->
					</h3>
					<div class="custom_adding_guest_list_inner">	
					
						<!-- <div class="form_row">
							<label>Initials</label>
							<input type="text" name="initials" id="initials" maxlength="10" class="initials"  placeholder=""  /> 
						</div> -->
						
						<div class="form_row">
							<label>Comments</label>
							<textarea style="height:100px;" name="comments" id="comments" placeholder="" ></textarea>
						</div>
						
						<input type="button" value="Cancel" onClick="javascript: parent.jQuery.fancybox.close();" class="blueB">
						&nbsp;&nbsp;				
						<input type="submit" value="Save" class="orangeB" id="addRooms">
						
					</div>
					
				</div>
		    </div>
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

	    	var cnt = 0;
	    	var cnt1 = 0;
	    	var cnt2 = 0;
	    	if ($('.other_supplement').prop('checked')==true){ 
		$( ".upgrade_name_div" ).each(function( index ) {
			
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
			
			
			});
		
		$( ".upgrade_cost_div" ).each(function( index ) {
			
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
			
			});
		
		$( ".upgrade_cost_out_div" ).each(function( index ) {
			
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
			
			});
		}
		if(cnt == 1 || cnt1 == 1 || cnt2 == 1)
		{

		}
		else
		{
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
		}
	    	
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
					        parent.parent.jQuery.fancybox.close();
					        var cartIdSCls = $('.cartIdSCls').val();
			                $('a#reloadInfo'+cartIdSCls).trigger('click');
					        toastSuccess('Cancel request has been added successfully.');
					        $('.loader').hide();
		            	}else{
		            		alert('Something went wrong!');
		            	}
		                
		            });
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