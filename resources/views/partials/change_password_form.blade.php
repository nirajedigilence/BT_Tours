<style type="text/css">
	.tab{color: #ddd !important;}
	/*.active{color: #000 !important;}*/
	ul.parsley-errors-list li {
	    color: red;
	}
	.notClickedCls{font-weight: 600;    font-size: 14px;}
	.field-title{font-weight: 600; }
	.checkbox_div {
	    color: #14213D;
	    display: block;
	    position: relative;
	    padding-left: 30px;
	    margin-bottom: 12px;
	    cursor: pointer;
	    font-size: 13px;
	    -webkit-user-select: none;
	    -moz-user-select: none;
	    -ms-user-select: none;
	    user-select: none;
	}
	.checkbox_div .checkmark:after {
	    left: 4px;
	    top: 0px;
	    width: 6px;
	    height: 11px;
	    border: solid white;
	    border-width: 0 3px 3px 0;
	    transform: rotate(45deg);
	}
	.checkmark {
	    position: absolute;
	    top: 0;
	    left: 0;
	    height: 15px;
	    width: 15px;
	    border: 1px solid #999;
	}
</style>
<div class="propertiesListContainer" style="margin-top: 0px;">
<div class="container">
<div class="containerRow">
<div class="pageContent">
	<div class="headingRow">
	    <div class="sortByContainer">
	        <div class="sortBy tab active" data-id="accountDetails" style="color: #000 !important;">Account Details</div>
	        <?php if(check_subaccount_access('0')){ ?>
	        <!-- <div class="sortBy tab"  style="color: #ddd;pointer-events: none;">Alert Settings</div> -->
	          <div class="sortBy tab alert-setting" id="alert_setting" data-id="alertSetting" style="color: #000 !important;">Alert Settings</div>
	        <div class="sortBy tab subact" id="subact" data-id="subAccountDetails" style="color: #000 !important;">Sub Accounts</div>
	        
	        <div class="sortBy tab" style="color: #ddd;pointer-events: none;">Driver Accounts</div>
	        <?php } ?>
	    </div>    
	</div>
	<?php 
	$userdata = Session::get('sub_account_data');
	if(!empty($userdata['id']))
	{
		$users = 


DB::connection('mysql_veenus')->table('users')->where("id", $userdata['id'])->first();
	}
	?>
	<div class="col-sm-12 content-div" id="accountDetails" style="background: #fff;margin-top: 10px;padding: 15px;">
		<form method="POST" action="{{ route('account.info') }}" enctype="multipart/form-data">
			@csrf
			
			@if(session()->has('success'))
			    <div class="alert alert-success" style="background: lightcyan;">
			        {{ session()->get('success') }}
			    </div>
			@endif
			@if(session()->has('error'))
			    <div class="alert alert-danger">
			        {{ session()->get('error') }}
			    </div>
			@endif
			 @foreach ($errors->all() as $error)
                <p class="text-danger" style="margin-bottom: 10px;">{{ $error }}</p>
             @endforeach 
			<h3 style="color: #000;margin: 20px 0;display: inline-block;width: 100%;">Account Information</h3>
			<div class="row">
				<input type="hidden" name="account_id" value="<?php echo isset($accountInfo->id) ? $accountInfo->id : ''; ?>">
				<div class="col-sm-4">
					<!-- <div class="form-group">
					    <label style="color: #000">Title</label>
					    <input type="text" name="title" class="form-control" value="<?php echo isset($accountInfo->title) ? $accountInfo->title : ''; ?>">
				  	</div> -->
					<!-- <div class="form-group">
					    <label style="color: #000">First Name</label>
					    <input type="text" name="first_name" class="form-control" value="<?php echo isset($accountInfo->first_name) ? $accountInfo->first_name : ''; ?>">
				  	</div>
					<div class="form-group">
					    <label style="color: #000">Last Name</label>
					    <input type="text" name="last_name" class="form-control" value="<?php echo isset($accountInfo->last_name) ? $accountInfo->last_name : ''; ?>">
				  	</div> -->
				  	<div class="form-group">
					    <label style="color: #000">Company Name</label>
					    <input type="text" name="name" class="form-control" value="<?php echo isset($users->name) ? $users->name : ''; ?>">
						
				  	</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
					    <label style="color: #000">Email address</label>
					    <input type="text" name="email" class="form-control" value="<?php echo isset($users->email) ? $users->email : ''; ?>">
				  	</div>
					<div class="form-group">
					    <label style="color: #000">Telephone number</label>
					    <input type="text" name="telephone" class="form-control" value="<?php echo isset($users_details->main_contact_number) ? $users_details->main_contact_number : ''; ?>">
				  	</div>
				</div>
				<div class="col-sm-4">
					<b style="color: #000;display: inline-block;margin: 20px 0;">Company Logo</b>
					<?php
					$hide = ''; 
					if(!empty($accountInfo->logo)){
						$hide = 'style="display:none"';
					}
					?>
					<div class="form-group" id="uploadDiv" <?php echo $hide; ?>>
						<label style="color: #000">To see your logo on a brochure preview, please upload here</label>
						<input type="file" name="logo" class="form-control">
						<input type="hidden" name="logo_delete" id="logo_delete" value="">
						<?php if(!empty($accountInfo->logo)){ ?>
							<a id="cancleClick" href="javascript:;" style="color: orange;">cancel</a>
						<?php } ?>
					</div>
					<?php if(!empty($accountInfo->logo)){ ?>
						<div class="form-group" id="imageDiv">
							<label style="color: #aaa">Uploaded logo</label>
							<br>
							<img width="300" style="border: 1px solid #ddd;padding: 15px;" src="<?php echo !empty($accountInfo->logo) ? url('/').'/account_images/'.$accountInfo->logo : ''; ?>">
							<br>
							<a id="changeClick" href="javascript:;" style="color: orange;margin-right: 10px;">change</a>
							<a id="removeClick" href="javascript:;" style="color: red;">remove</a>
						</div>
					<?php } ?>
				</div>
			</div>
			<b style="color: #000;display: inline-block;margin: 20px 0;">Social media & company website links</b>
			<div class="row">
				<div class="col-sm-4">
					<div class="form-group">
					    <label style="color: #000">Company website</label>
					    <input type="text" name="website" class="form-control" value="<?php echo isset($users_details->website_link) ? $users_details->website_link : ''; ?>">
				  	</div>
					<div class="form-group">
					    <label style="color: #000">Social media link 1</label>
					    <input type="text" name="social_media_link_1" class="form-control" value="<?php echo isset($users_details->social_media_link_1) ? $users_details->social_media_link_1 : ''; ?>">
				  	</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
					    <label style="color: #000">Social media link 2</label>
					    <input type="text" name="social_media_link_2" class="form-control" value="<?php echo isset($users_details->social_media_link_2) ? $users_details->social_media_link_2 : ''; ?>">
				  	</div>
				</div>
				<div class="col-sm-4">
				</div>
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
		<b style="color: #000;display: inline-block;margin: 20px 0;">Change Password</b>
		<div class="row">
			<div class="col-sm-4">
				<form method="POST" action="{{ route('change.password') }}">
					@csrf 
		            
				  <div class="form-group">
				    <label style="color: #000">Current Password</label>
				    <input type="password" name="current_password" class="form-control" placeholder="Current Password">
				  </div>
				  <div class="form-group">
				    <label style="color: #000">New Password</label>
				    <input type="password" name="new_password" class="form-control" placeholder="New Password">
				  </div>
				  <div class="form-group">
				    <label style="color: #000">Repeat New Password</label>
				    <input type="password" name="new_confirm_password" class="form-control" placeholder="Repeat New Password">
				  </div>
				  <button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
		</div>
	</div>
	<div class="col-sm-12 content-div" id="subAccountDetails" style="display:none;background: #fff;margin-top: 10px;padding: 15px;">
		<form method="POST" action="{{ route('account.info') }}" enctype="multipart/form-data">
			@csrf
			
			@if(session()->has('success'))
			    <div class="alert alert-success" style="background: lightcyan;">
			        {{ session()->get('success') }}
			    </div>
			@endif
			@if(session()->has('error'))
			    <div class="alert alert-danger">
			        {{ session()->get('error') }}
			    </div>
			@endif
			 @foreach ($errors->all() as $error)
                <p class="text-danger" style="margin-bottom: 10px;">{{ $error }}</p>
             @endforeach 
			<h3 style="color: #000;margin: 20px 0;display: inline-block;width: 100%;">Additional Sub Accounts</h3>
			<p>If you need to share the account with other people feel free to create additional accounts here.</p>
			<br>
			 <a data-assigned-id="" data-toggle="modal" data-target="#subAccountModel" class="btn btn-primary open-subaccount margintop" tabindex="-1">  
                Create a sub account
             </a>
			<div class="row ">
				<input type="hidden" name="account_id" value="<?php echo isset($accountInfo->id) ? $accountInfo->id : ''; ?>">
				@if(!empty($subAccountInfo))
				@foreach ($subAccountInfo as $row)
				<div class="col-sm-4 box">
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
							    <label style="color: #000">Name</label>
							    <br>
							    {{!empty($row->first_name)?$row->first_name:''}} {{!empty($row->last_name)?$row->last_name:''}}
						  	</div>
					  	</div>
						<div class="col-sm-6">
							<div class="form-group" style="word-break: break-word;">
							    <label style="color: #000">Email</label>
							    <br>
							    {{!empty($row->email)?$row->email:''}}
						  	</div>
					  	</div>
				  	</div>
				  	<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
							    <label style="color: #000">Job Title</label>
							    <br>
							    {{!empty($row->title)?$row->title:''}}
						  	</div>
					  	</div>
						<div class="col-sm-6">
							<div class="form-group">
							    <label style="color: #000">Tel</label>
							    <br>
							    {{!empty($row->telephone)?$row->telephone:''}}
						  	</div>
					  	</div>
					  	
				  	</div>
				  	<!-- <div class="row">
				  		<div class="col-sm-12">
				
			                <div class="checkarea_part_Dates" style="width:100%;font-size: 12px;">	
			                 	<label class="checkbox_div">
			                      <input type="checkbox" class="custom_chkbox tagchkbox notClickedCls sk_dep turn_off_sign_doc" data-assigned-id="{{$row->id}}" value="1" name="turn_off_sign_doc" <?php echo $row->turn_off_sign_doc == '1'?'checked': ''?>> <span class="notClickedCls"></span>
			                      <span class="checkmark"></span>
			                      <span class="sk_label">This sub-account can sign documents</span>
			                    </label>
			                </div>
						</div>
				  	</div> -->
				  	<div class="row">
				  		<div class="col-sm-6">
							<div class="form-group">
					<a data-assigned-id="{{ $row->id }}" data-toggle="modal" data-target="#subAccountModel" class=" open-subaccount margintop mr-2 text-success" style="cursor: pointer;" tabindex="-1">  
		                <b>Change Details</b>
					</a>
					<a href="delete-subaccount/{{ $row->id }}" onclick="return confirm('Are you sure you want to delete?')" class="margintop mr-2 text-danger" tabindex="-1">  
					    <b>Remove</b>
					</a>
		            <!-- <form method="POST" action="delete-subaccount/{{ $row->id }}" class="">
                    @csrf
                    <input class="btn btn-danger" type="submit" value="Remove" onclick="return confirm('Are you sure you want to delete?')" />
                	
                	</form> -->
               		</div>
               		</div>
               		</div>
				</div>
				@endforeach 
				@endif
			</div>
			
			
		</form>
		
	</div>
	<div class="col-sm-12 content-div" id="alertSetting" style="display:none;background: #fff;margin-top: 10px;padding: 15px;">
		<form method="POST" action="{{ route('alert.info') }}" enctype="multipart/form-data">
		@csrf
		<div class="row">
			<div class="col-sm-6">
				
                 <div class="checkarea_part_Dates">	
                 	<label class="checkbox_div">
                      <input type="checkbox" class="custom_chkbox tagchkbox notClickedCls sk_dep" value="1" name="turn_off_remainder" <?=!empty($users_details->turn_off_remainder)?'checked':''?>> <span class="notClickedCls"></span>
                      <span class="checkmark"></span>
                      <span class="sk_label">Turn off Reminder</span>
                    </label>

                </div>
			</div>
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
</div>
</div>
</div>
</div>
<div class="modal fade" id="subAccountModel" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width: 60%; margin: 1.75rem auto;">
        <div class="modal-content">
            
        </div>
    </div>
</div>
<script type="text/javascript">
	<?php 
	$is_sub = Session::get('sub_account');
	if(!empty($is_sub))
	{
		Session::forget('sub_account');  
		?>
		$(document).ready(function() {
			$('.tab').removeClass('active');
			$('.subact').addClass('active');
			$('.content-div').hide();
			$('#subAccountDetails').show();

		});
		<?php
	}
	 ?>
	 $(document).on('click', '.turn_off_sign_doc', function(event){
			var datavalue= $(this).val();
			var id = $(this).data('assigned-id');
			if ($(this).is(":checked")) {
			 var turn_off_sign_doc = 1;
			}
			else
			{
			var turn_off_sign_doc = 0;
			}
			
			$.ajax({
			
			 url:"{{route('subaccount.turn_off_sign_doc')}}",
			 type: "POST",
			  data:{id:id,turn_off_sign_doc:turn_off_sign_doc},
			   success:function(data)
			   {
			    if(data == 1)
			    {
			      toastSuccess('Data store successfully.');
			    }
			    else
			    {
			      toastSuccess('Something went wrong.');
			    }
			    
			   }
			  })

			});
        $(function () {
        	
            $('.open-subaccount').click(function () {
                var id = $(this).data('assigned-id');
                if(id == '')
                {
                	var route = "add-subaccount";
                }
                else
                {
                	var route = "edit-subaccount/"+id;
                }
                
                $('.modal-content').load(route);
            });

        });
    </script>
<script type="text/javascript">
	$(document).ready(function() {
		$('.tab').on('click', function(){
			$('.content-div').hide();
			var id = $(this).attr('data-id');
			$('#'+id).show();
		});
		$('#changeClick').on('click', function(){
			$('#imageDiv').hide();
			$('#uploadDiv').show();
		});
		$('#cancleClick').on('click', function(){
			$('#uploadDiv').hide();
			$('#imageDiv').show();
			$('#logo_delete').val('');
		});
		$('#removeClick').on('click', function(){
			$('#imageDiv').hide();
			$('#uploadDiv').show();
			$('#logo_delete').val('yes');
		});
	})
</script>