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
</style>
<div class="exp_change">
<div class="screen_1">
  <h3 id="tablist-1">Cancelled bookings - Attach Documents</h3>
  <p style="font-weight:600">If you have any documents related to the cancellation you can attach them here.</p>
   <form id="addBookingForm" enctype="multipart/form-data" method="POST" action="{{route('insert-cancel-tour-document')}}">
        {{csrf_field()}}
       <label>Uploaded documents :</label>
         <div class="row ">
         	<?php

        		if(!empty($cart_exp_docs))
        		{
        			foreach($cart_exp_docs as $doc)
        			{
        			?>
        	<div class="row col-lg-12 doc_div">
        		
        			<div class="col-md-1">
        			<?php
        			$fileNameParts = explode('.', $doc->image_name);
					$ext = end($fileNameParts);
					if($ext == 'pdf')
					{
						?>

						<a target="_blank" style="font-size: 22px;" href="<?=URL('cancel_document/'.$doc->image_name)?>"><i class="far fa-file-pdf yellowClrCls"></i></a>
						<?php
					}
					else if($ext == 'doc' || $ext == 'docx')
					{
						?>
						<a style="font-size: 22px;" href="<?=URL('cancel_document/'.$doc->image_name)?>"><i class="fas fa-file-word"></i></a>
						<?php
					}
					else
					{
						?>
						<a target="_blank" style="font-size: 22px;" href="<?=URL('cancel_document/'.$doc->image_name)?>"><i class="far fa-image"></i></a>
						<!-- <img src="<?=URL('cancel_document/'.$doc->image_name)?>" height="150" width="150">
						<br/> -->
						<?php
					}
					?>
					</div>
					<div class="col-md-4">
					<a target="_blank" style="font-size: 15px;color: black;" href="<?=URL('cancel_document/'.$doc->image_name)?>">{{$doc->image_name}}</a>
					</div>
					<div class="col-md-1">
					<a  href="javascript::void(0);" data-id="{{$doc->id}}" class="remove_document" style="color: red;text-decoration: underline !important;"><i style="font-size:20px;color:red" class="fa">&#xf00d;</i></a>
					</div>
					
        		
        	</div>
        	<?php
        		}
        	}
        		
        		?>
        </div>           
        <div class="row">
        	<div class="col-md-12">
        		<label>Upload Files</label>
        		 <input type="file" name="upload_cancel_tour[]" multiple class="hdioCls form-control notClickedCls" accept=".pdf,.docx,image/*">
        	</div>
        </div>
    <div style="clear:both;margin: 15px;"></div>
    <!-- <p>(You won't be able to put back for sale any tours if the date is not available)</p> -->
        <input type="hidden" name="cart_exp_id" id="cart_exp_id" class="form-control"  value="{{!empty($id)?$id:''}}" style="padding:5px;color: #ffffff;font-weight: bold;">
        
       <!--  <input type="submit" name="saveamount" value="Save" class="btn btn-warning btn-sm ml-2"> -->
        <input type="submit" id="continue_page1" name="saveamount" value="Upload Document" class="btn btn-warning btn-sm ml-2" style="padding:5px;color: #ffffff;font-weight: bold;background-color: #FCA311;"><!-- onClick="(function(){
    $('.screen_2').show();$('.screen_1').hide();
})();return false;"  -->
	<!-- <input type="button" value="Cancel" onclick="javascript: parent.jQuery.fancybox.close();" style="float:left;" class="cta total"> -->
	<input type="button" value="Back" onclick="javascript: parent.jQuery.fancybox.close();" style="float:left;" class="cta total">
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