<style type="text/css">
	.tblBorderCls tr td:first-child{
		border-right: unset !important;
	}
	
	.tblBorderCls{border: unset !important;}
	.table thead th {
    border-bottom: 2px solid;
    border-top: unset !important;
}
	.table thead tr{border-bottom: unset !important;border-top: unset !important;}
	input.cta.total {
    float: left;
    background-color: #000000;
    color: #fff;
    padding: 2px 7px;
    border-radius: 5px;
    cursor: pointer;
}
.exp_div {
    border: 1px solid #ccc;
    padding: 5px;
    margin-bottom: 5px;
}
.tc_box_wrapper .tc_box .header {
    display: flex;
    /*justify-content: space-between;*/
    background: #F2F2F2;
    border-bottom: solid 1px #CFCFCF;
    font-size: 1rem;
    font-weight: 600;
    line-height: 1.5;
    color: #14213D;
    padding: 5px 20px;
}
.tc_box_wrapper .tc_box .body {
    padding: 30px 20px;
}
.tc_box_wrapper .tc_box {
    background: #FFF;
    border: solid 1px #CFCFCF;
    box-shadow: 0px 3px 6px #00000029;
}
.tc_box_wrapper {
    margin-bottom: 20px;
}
 h5{
	 margin-bottom: 11px;
    color: #000000;
    font-weight: 600;
}
.res_div {
    border: 1px solid #ccc;
    padding: 10px;
    margin-bottom: 12px;
}

td {
    text-align: left;
}
.italic{font-style: italic;}
.checkarea_part_Dates {
    float: left;
    width: 33%;
    display: inline-block;
}
</style>
<div class="exp_change">
<div class="screen_1">
  <h3 id="tablist-1">Export Data</h3>
  <p style="font-weight:600">Please enter the date range of the data you need to export.</p>
   <form id="addBookingForm" enctype="multipart/form-data" method="GET" action="{{route('export-excel-data')}}">
        {{csrf_field()}}
      
              
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <div class="label">Date From</div>
                     <input type="date" class="form-control" name="date_from" id="date_from" placeholder="dd/mm/yyyy" value="">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="label">Date Until</div>
                     <input type="date" class="form-control" name="date_to" id="date_to" placeholder="dd/mm/yyyy" value="">
                </div>
            </div>
        	
        	<div class="col-lg-12 mt-4" style="padding-left: 0px;">
        		<div class="form-check">
                    <div class="checkarea_part_Dates">
                        <label class="checkbox_div graycls" style="font-size: 13px;font-weight: 600;">
                          <input  type="checkbox" name="booking_type[]" class="custom_chkbox tagchkbox notClickedCls " data-id="1" value="1"> Current Bookings <span class="notClickedCls "></span>
                          <span class="checkmark"></span>
                        </label>
                    </div>
                </div>
                <div class="form-check">
                    <div class="checkarea_part_Dates">
                        <label class="checkbox_div graycls" style="font-size: 13px;font-weight: 600;">
                          <input type="checkbox" name="booking_type[]" class="custom_chkbox tagchkbox notClickedCls " data-id="2" value="2"> Completed Bookings <span class="notClickedCls "></span>
                          <span class="checkmark"></span>
                        </label>
                    </div>
                </div>
                <div class="form-check">
                    <div class="checkarea_part_Dates">
                        <label class="checkbox_div graycls" style="font-size: 13px;font-weight: 600;">
                          <input  type="checkbox" name="booking_type[]" class="custom_chkbox tagchkbox notClickedCls " data-id="3" value="3"> Cancelled Bookings <span class="notClickedCls "></span>
                          <span class="checkmark"></span>
                        </label>
                    </div>
                </div>
        	</div>
        
        <div class="col-lg-12 mt-4">
        	<div class="form-group">
                    <div class="label">Excel Format</div>
                    <select class="form-control" name="excel_format" id="excel_format">
                        <option value="1" >Bookings List</option>
                        <option value="2">Experiences List</option>
                       
                    </select>
                </div>
        </div>
    </div>
    <div style="clear:both;margin: 15px;"></div>
    <!-- <p>(You won't be able to put back for sale any tours if the date is not available)</p> -->
        <input type="hidden" name="cart_exp_id" id="cart_exp_id" class="form-control"  value="{{!empty($id)?$id:''}}" style="padding:5px;color: #ffffff;font-weight: bold;">
        
       <!--  <input type="submit" name="saveamount" value="Save" class="btn btn-warning btn-sm ml-2"> -->
        <input type="submit" id="continue_page1" name="saveamount" value="Export Data" class="btn btn-warning btn-sm ml-2" style="padding:5px;color: #ffffff;font-weight: bold;background-color: #FCA311;"><!-- onClick="(function(){
    $('.screen_2').show();$('.screen_1').hide();
})();return false;"  -->
	<!-- <input type="button" value="Cancel" onclick="javascript: parent.jQuery.fancybox.close();" style="float:left;" class="cta total"> -->
	<input type="button" value="Cancel" onclick="javascript: parent.jQuery.fancybox.close();" style="float:left;" class="cta total">
	</form>
</div>

 
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('.selectCls').select2({
	        minimumResultsForSearch: 0,
	        // dropdownParent: $('.fancybox-can-swipe')
	        // dropdownParent: '.fancybox-can-swipe'
	            /*allowClear: true,*/
	    });	
	});
	
	 $('.remove_document').on("click", function(e) {    
	 if(confirm("Are you sure?"))
	 {
	 var id = $(this).data('id');  
		$.ajax({
				    url: "{{ route('remove-cancel-document') }}",
				    type: 'POST',
				    data: {'id':id},
				    success: function(data){
				    	$(this).parent().remove();
				        //parent.parent.jQuery.fancybox.close();
				        toastSuccess('Remove uploaded document.');
				        
				    },
				    error: function(data){
				    	$('.loader').hide();
				    }
				});
		}
	});
	
</script>