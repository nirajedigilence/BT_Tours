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
</style>

<div class="  ">
  <h3 id="tablist-1">Deposit Amount</h3>
   <form id="addBookingForm" method="POST" action="{{route('save-deposit-amount2-cruise')}}">
        {{csrf_field()}}
       
        <div class="form-group">
          <?php
         $currency= getCurrency($cart_exp_id);
          if($currency == '€')
            {
                 $deposit_amt = !empty($experience_dates_rates->deposit_euro)?str_replace(',','',$experience_dates_rates->deposit_euro):0;
            }
            else
            {
                 $deposit_amt = !empty($experience_dates_rates->deposit_pound2)?str_replace(',','',$experience_dates_rates->deposit_pound2):0;
            }
           ?>
        <input type="text" name="deposit_amount" id="deposit_amount" class="form-control" value="{{!empty($deposit_amt)?$deposit_amt:''}}">
        </div>
        
        <div class="form-group">
        <input type="hidden" name="cart_exp_id" id="cart_exp_id" class="form-control"  value="{{!empty($cart_exp_id)?$cart_exp_id:''}}">
        <input type="hidden" name="date_rate_id" id="date_rate_id_deposit" class="form-control"  value="{{!empty($experience_dates_rates->id)?$experience_dates_rates->id:''}}">
       <!--  <a href="javascript:;" id="saveAddBookingBtn" class="btn btn-warning">Save</a> -->
        <input type="submit" name="saveamount" value="Save" class="btn btn-warning btn-sm">
        @if(empty($cart_experience->deposit_invoice_sent_finance))
        <input type="button" value="Send Deposit for approval" class="btn btn-primary btn-sm" id="sendInvoice" data-id="{{!empty($cart_exp_id)?$cart_exp_id:''}}"  style="float:right;background-color: red mportant;">
        @endif
        </div>
        </form>
	<input type="button" value="Back" onclick="javascript: parent.jQuery.fancybox.close();" style="float:left;" class="cta total">
</div>
<script type="text/javascript">
  $("#sendInvoice").bind("click", function(e){
    var id = $(this).attr("data-id");
    var date_rate_id_deposit = $('#date_rate_id_deposit').val();
    var cart_exp_id = $('#cart_exp_id').val();
    var deposit_amount = $('#deposit_amount').val();
      $.ajax({
          url: "{{ route('sent-deposit-invoice') }}",
          type: 'POST',
          data: {sent_finance:'1','invoice_id':id,'date_rate_id':date_rate_id_deposit,'deposit_amount':deposit_amount,'cart_exp_id':cart_exp_id},
          success: function(data){
              parent.jQuery.fancybox.close();
              parent.parent.jQuery.fancybox.close();
              var cartIdSCls = $('.cartIdSCls').val();
                  $('a#reloadInfo'+cartIdSCls).trigger('click');
              toastSuccess('Sent to finance successfully.');
              location.reload();

              $('.loader').hide();
          },
          error: function(data){
            $('.loader').hide();
          }
      });
    
    
  });
</script>