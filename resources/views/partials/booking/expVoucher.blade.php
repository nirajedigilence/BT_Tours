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
	
	
	
	<div>
        <h2>
			Experiences Booking and voucher details
		</h2>
		<b>
			Please enter the date and time of the booking details and any information needed to create the tour experience voucher
		</b><br><br>
        <form id="addBookingForm" action="{{route('save-add-bookings')}}" style="border: 1px solid #ccc;
    padding: 10px;">
        {{csrf_field()}}
        <h4 style="color:#212529">Booking Details</h4>
        <br/>
        <div class="row">
        <div class="col-xs-12 col-md-6">
	        <div class="form-group">
	        <label style="color:#000;">Booking Ref no</label>
	        <input type="text" name="ref_nr" class="form-control"  value="{{$attractions_exp->ref_nr}}">
	        </div>
    	</div>
    	<div class="col-xs-12 col-md-6">
	        <div class="form-group">
	        <label style="color:#000;">Group Name</label>
	        <input type="text" name="group_name" class="form-control"  value="{{(!empty($attractions_exp->group_name)?$attractions_exp->group_name:$cart_detail->name)}}">
	        </div>
	    </div>
	    <div class="col-xs-12 col-md-6">
	        <div class="form-group">
	        <label style="color:#000;">Date</label>
	        <input type="hidden" name="id" value="{{$id}}">
	        <input type="date" name="date" class="form-control" value="{{(!empty($attractions_exp->date)?$attractions_exp->date:$attractions->date)}}">
	        </div>
	    </div>
	    <div class="col-xs-12 col-md-6">
	        <div class="form-group">
	        <label style="color:#000;">Time</label>
	        <input type="time" name="time" class="form-control" value="{{(!empty($attractions_exp->date)?substr($attractions_exp->time, 0, -3):substr($attractions->time, 0, -3))}}">
	        </div>
        </div>
        </div>
        <!--  <div class="form-group">
        <label style="color:#000;">Notes</label>
        <textarea name="exp_notes" class="form-control" >{{(!empty($attractions_exp->exp_notes)?$attractions_exp->exp_notes:'')}}</textarea>
        </div>
        <div class="sub_heading">
                    <h4  style="color:#212529">Experience Voucher Additional Information</h4>
                    <p  style="color:#212529">Any information relating to the experience vouchers <p>
                    	<br/>

                </div> -->
                <div class="form">
                	<div class="driver_check driver_text_second2">
                <div class="row">
        		<div class="col-xs-12 col-md-2">
		      		<label class="checkbox_div ">
                      <input type="radio" class="custom_chkbox driver_paying_second1" value="1" name="guest_nr" data-id="" <?php echo (!empty($attractions_exp->guest_nr) && $attractions_exp->guest_nr == 1) ? 'checked' : 'checked'; ?> > <span class="notClickedCls"></span>
                      <span class="checkmark"></span>
                      <span class="sk_label">Guest nr</span>
                    </label>
                </div>
        		<div class="col-xs-12 col-md-3">
                    <label class="checkbox_div">
                      <input type="radio" class="custom_chkbox guest_nr" value="2" name="guest_nr" <?php echo (!empty($attractions_exp->guest_nr) && $attractions_exp->guest_nr == 2) ? 'checked' : ''; ?>> <span class="notClickedCls"></span>
                      <span class="checkmark"></span>
                      <span class="sk_label">Guest nr + driver</span>
                    </label>
                </div>
                </div>    
                </div>
                    <div class="form-group">
                        <label style="color:#000;">Experience inclusions</label>
                        <textarea class="form-control" name="exp_inclusions" id="exp_inclusions" rows="7">{{ !empty($attractions_exp->exp_inclusions) ? strip_tags($attractions_exp->exp_inclusions) : strip_tags($attractions->exp_inclusions) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label style="color:#000;">Coach Drop-off</label>
                        <textarea class="form-control" name="coach_dropoff" id="coach_dropoff" rows="2">{{ !empty($attractions_exp->coach_dropoff) ? strip_tags($attractions_exp->coach_dropoff) : strip_tags($attractions->coach_dropoff) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label style="color:#000;">Coach Parking</label>
                        <textarea class="form-control" name="coach_parking" id="coach_parking" rows="2">{{ !empty($attractions_exp->coach_parking) ? strip_tags($attractions_exp->coach_parking) : strip_tags($attractions->coach_parking) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label style="color:#000;">General Info</label>
                        <textarea class="form-control" name="general_info" id="general_info" rows="2">{{ !empty($attractions_exp->general_info) ? strip_tags($attractions_exp->general_info) : strip_tags($attractions->general_info) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label style="color:#000;">Additional Information</label>
                        
                        <textarea class="form-control" name="additional_info" id="additional_info" rows="2">{{ !empty($attractions_exp->additional_info) ? strip_tags($attractions_exp->additional_info) : strip_tags($attractions->additional_info) }}</textarea>
                    </div>
                   
                </div>
        <div class="form-group">
        <input type="hidden" name="experiences_id" class="form-control"  value="{{$experiences_id}}">
        <a href="javascript:;" id="saveAddBookingBtn" style="color: white;" class="btn btn-warning mr-2">Save</a>
         <a href="javascript:void(0);" data-url="/download-exp-voucher/{{$id}}/{{$experiences_id}}" id="downloadAddBookingBtn" style="color: white;" class="btn btn-warning">Save & Download</a>
        </div>
        </form>
        </div>
</div>
