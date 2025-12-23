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
      <h3 class=" ml-4 mb-2" id="tablist-1">Send mail to hotel </h3>
       <form id="addBookingForm" method="POST" action="{{route('send-guest-list-pdf-email-post')}}">
            {{csrf_field()}}
            <?php 
            if(!empty($hotels))
            {
                foreach($hotels as $rrow)
                {
                    $search = array('[hotel_name]');
                    $replace = array($rrow->name);
                    $econtent  = str_replace($search, $replace,$content);
                    ?>
                    <div class="col-md-12 mb-3 emailadd" style="">
                        <label>Hotel : {{$rrow->name}}</label>
                        <textarea id="addEmailContentField_{{$rrow->id}}" name="email_content_{{$rrow->id}}" class="form-control" rows="7" ><?php echo $econtent; ?></textarea>
                    </div>
                    <script type="text/javascript">CKEDITOR.replace( 'addEmailContentField_{{$rrow->id}}');</script>
                    <?php
                }
            }
            ?>
         	 
        <div style="clear:both;margin-left: 15px;"></div>
       
             <div style="clear:both;margin-left: 15px;"></div>
            <input type="hidden" name="cart_exp_id" class="form-control"  value="{{!empty($cart_experience->id)?$cart_experience->id:''}}">
            
           <!--  <input type="submit" name="saveamount" value="Save" class="btn btn-warning btn-sm ml-2"> -->
           <input type="submit" id="sendEmail" name="saveaddamount" value="Send mail" class="btn btn-warning btn-sm ml-2 orange-back">
           
            <input type="button" value="Cancel" onclick="javascript: parent.jQuery.fancybox.close();" style="float:left;" class="cta total">
            <?php if(!empty($experienceDates[1])){ ?>
            <input type="button" id="remove_page1" name="removeexp" value="Remove Hotel" class="btn btn-warning btn-sm ml-2 red-back">
            <?php } ?><!-- onClick="(function(){
        $('.screen_2').show();$('.screen_1').hide();
        })();return false;"  -->
        	<!-- <input type="button" value="Cancel" onclick="javascript: parent.jQuery.fancybox.close();" style="float:left;" class="cta total"> -->
    	</form>
    </div>
</div>
<script type="text/javascript">

$("body").on("submit", '#addBookingForm', function(e) {       
        console.log('call');
        e.preventDefault();
        $('.alert_error').hide();
                $('.loader').show();
                //var params = $("#dataHolder").serialize();
                 let formData = new FormData(this);
                $.ajax({
                    url: "{{ route('send-guest-list-pdf-email-post') }}",
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(data){
                        parent.jQuery.fancybox.close();
                        //parent.parent.jQuery.fancybox.close();
                        toastSuccess('Remove Hotel Successfully.');
                        location.reload();
                        $('.loader').hide();
                        $('#saveEtcForm').click();
                    },
                    error: function(data){
                        $('.loader').hide();
                    }
                });
    });
</script>