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

</style>
<div class="exp_change">
<div class="screen_1">
  <h3 id="tablist-1">Change Experience </h3>
  <p>Select experiences to replace or remove</p>
   <form id="addBookingForm" method="POST" action="{{route('save-deposit-amount')}}">
   	
        {{csrf_field()}}
     
        <select name="experiences[]" multiple class="select2 form-control room_type mb-2 " data-msg-required="Please select type" required>
                                <option value="">Select Experiences</option>
                                @if(!empty($expList))
                                    @foreach($expList as $keyEE => $valueEE)
                                        <option value="{{$valueEE->id}}">{{$valueEE->name}}</option>
                                    @endforeach
                                @endif
                            </select>
         <span class="expcheck_error" style="display:none;color: red;">Please select any experience.</span>
           <!-- <div class="row"> 
        <div class="form-group">
        <input type="hidden" name="cart_exp_id" class="form-control"  value="{{!empty($cart_exp_id)?$cart_exp_id:''}}">
        
        <input type="submit" name="saveamount" value="Save" class="btn btn-warning btn-sm">
      
        </div>
    </div> -->
    <div style="clear:both;margin-top: 15px;"></div>
        <input type="hidden" name="cart_exp_id" class="form-control"  value="{{!empty($cart_exp_id)?$cart_exp_id:''}}">
        
       <!--  <input type="submit" name="saveamount" value="Save" class="btn btn-warning btn-sm ml-2"> -->
       <!--  <input type="button" id="continue_page1" name="saveamount" value="Replace Experience" class="btn btn-warning btn-sm ml-2 orange-back"> -->
     
        <a class="btn btn-warning btn-sm ml-2 orange-back" data-fancybox data-type="ajax" data-src="" href="{{ route('add-experience', $cart_exp_id) }}" id="_reloadInfo{{$cart_exp_id}}">Add Experience</a>
        <input type="button" id="remove_page1" name="removeexp" value="Remove Experiences" class="btn btn-warning btn-sm ml-2 red-back"><!-- onClick="(function(){
    $('.screen_2').show();$('.screen_1').hide();
})();return false;"  -->
	<!-- <input type="button" value="Cancel" onclick="javascript: parent.jQuery.fancybox.close();" style="float:left;" class="cta total"> -->
	</form>
</div>

</div>
<script type="text/javascript">
	 $(document).ready(function() {
            $('.select2').select2();
            
        });
	$(document).ready(function(){
		$('.selectCls').select2({
	        minimumResultsForSearch: 0,
	        // dropdownParent: $('.fancybox-can-swipe')
	        // dropdownParent: '.fancybox-can-swipe'
	            /*allowClear: true,*/
	    });	
	});

</script>