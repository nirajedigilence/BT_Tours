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
  <h3 id="tablist-1">Tours to Put Back For Sale</h3>
  <p>Please select which tours you want to put back for sale.</p>
   <form id="addBookingForm" method="POST" action="{{route('save-reinstate-tour')}}">
        {{csrf_field()}}
       
                     <!--    <tr data-id="131" class="openBooking active" id="openBooking-131">
                            <td class="col-name proListCls">{{ $cart_experience->experience_name }}</td>
                            <td class="col-name visible"> {{ date("D d M", strtotime($cart_experience->date_from)) }} - {{ date("D d M 'y", strtotime($cart_experience->date_to)) }} </td>
                            <td class="col-cost visible">Yes</td>
                            <td class="col-name visible">
                            	<div class="checkarea_part_Dates">
					                <label class="checkbox_div graycls" style="font-size: 13px;">
					                  <input type="checkbox" name="other_tour[]" class="custom_chkbox exp_checkbox tagchkbox notClickedCls " value="{{ $cart_experience->exp_date_id }}">{{ $cart_experience->experience_name }}<span class="notClickedCls "></span>
					                  <span class="checkmark"></span>
					                </label>
					            </div>
                            </td>                            
                        </tr> -->
       <!--  <div class="form-group">
        	<div class="form-check">
	    		<div class="checkarea_part_Dates">
	                <label class="checkbox_div graycls" style="font-size: 13px;">
	                  <input type="checkbox" name="cancel_tour" class="custom_chkbox exp_checkbox tagchkbox notClickedCls " value="{{ $cart_experience->exp_date_id }}">{{ $cart_experience->experience_name }}<span class="notClickedCls "></span>
	                  <span class="checkmark"></span>
	                </label>
	            </div>
	        </div>
        </div> -->
     	<?php
            $cnt = 1;           
             foreach ($tourDatesExist as $keyEE => $valueEE) {      
             	$other_experices_date = 


DB::connection('mysql_veenus')->table('experience_dates')->selectRaw('experience_dates.id,experience_dates.experiences_id,e.name,experience_dates.mark_as_completed,experience_dates.sign_name_hc,experience_dates.dates_rates_id,experience_dates.hotel_date_id,experience_dates.date_from,experience_dates.date_to,c.id as cart_exp_id,experience_dates.date_from,experience_dates.date_to,h.name as hotel_name,c.hotel_name as cart_hotel_name,c.restored_date,c1.restored_date as current_restored_date')->leftjoin('cart_experiences as c','c.dates_rates_id','=','experience_dates.dates_rates_id')
         ->leftjoin('cart_experiences as c1','c1.old_date_rate_id','=','experience_dates.dates_rates_id')
         ->leftjoin('experiences as e','e.id','=','experience_dates.experiences_id')
         ->leftjoin('hotel_dates as hd','hd.id','=','experience_dates.hotel_date_id')->leftjoin('hotels as h','h.id','=','hd.hotel_id')->where('experience_dates.experiences_id',$valueEE->experiences_id)->where('experience_dates.deleted_at', null)->where('experience_dates.id','!=',$valueEE->id)/*->where('c.id', null)*/->groupBy('experience_dates.id')->get();
               
            
             ?>
            <div class="res_div">
              <p><b>{{ $valueEE->name }}</b></p>
		        <table id="myTable" class="table">
		                <thead>
		                    <tr class="headerBooking">
		                        <th>Hotel</th>
		                        <th class="visible">Date</th>
		                        <th class="visible">Date Available</th>
		                        <th class="visible">Restore Date</th>
		                    </tr>
		                </thead>
		                <tbody>
		            <tr data-id="131" class="openBooking active" id="openBooking-131">
			            <td width="30%" class="col-name italic">{{ !empty($valueEE->hotel_name)?$valueEE->hotel_name:$valueEE->cart_hotel_name }}</td>
			            <td width="30%" class="col-name visible italic"> {{ date("D d M", strtotime($valueEE->date_from)) }} - {{ date("D d M 'y", strtotime($valueEE->date_to)) }} </td>
			            <td width="15%" class="col-cost visible italic">{{!empty($valueEE->cart_exp_id)?'Yes':'No'}}</td>
			            <td width="25%" class="col-name visible">
			            	<?php if(!empty($valueEE->cart_exp_id)){ ?> 
			            		 
			            		 <div class="checkarea_part_Dates">
				                <label class="checkbox_div graycls" style="font-size: 13px;">
				                  <input type="checkbox" name="other_tour[]" class="custom_chkbox exp_checkbox tagchkbox notClickedCls " value="{{ $valueEE->id }}">
				                  <input type="hidden" value="{{$valueEE->cart_exp_id}}" name="cart_exp_id_{{ $valueEE->id }}"><!-- {{ $valueEE->name }} --><span class="notClickedCls "></span>
				                  <span class="checkmark"></span>
				                </label>
				            </div>
			            	<?php } else { ?> 
			            		<img src="{{ asset('images/cronss.png') }}" alt="Veenus">&nbsp;{{!empty($valueEE->restored_date)?date("D d M 'y", strtotime($valueEE->restored_date)) :(!empty($valueEE->current_restored_date)?date("D d M 'y", strtotime($valueEE->current_restored_date)):'' )}}
			            	<?php } ?>
			            	
			            	
			            </td>                            
			        </tr>     
			        <?php if(!empty($other_experices_date[0])){ 
			        foreach ($other_experices_date as $keyEE => $valueEEother) { ?>
        	
		            <tr data-id="131" class="openBooking active" id="openBooking-131">
			            <td width="30%" class="col-name italic">{{ !empty($valueEEother->hotel_name)?$valueEEother->hotel_name:$valueEEother->cart_hotel_name }}</td>
			            <td width="30%" class="col-name visible italic"> {{ date("D d M", strtotime($valueEEother->date_from)) }} - {{ date("D d M 'y", strtotime($valueEEother->date_to)) }} </td>
			            <td width="15%" class="col-cost visible italic">{{!empty($valueEEother->cart_exp_id)?'Yes':'No'}}</td>
			            <td width="25%" class="col-name visible">
			            	<?php if(!empty($valueEEother->cart_exp_id)){ ?> 
			            		 
			            		 <div class="checkarea_part_Dates">
				                <label class="checkbox_div graycls" style="font-size: 13px;">
				                  <input type="checkbox" name="other_tour[]" class="custom_chkbox exp_checkbox tagchkbox notClickedCls " value="{{ $valueEEother->id }}">
				                  <input type="hidden" value="{{$valueEEother->cart_exp_id}}" name="cart_exp_id_{{ $valueEEother->id }}"><!-- {{ $valueEEother->name }} --><span class="notClickedCls "></span>
				                  <span class="checkmark"></span>
				                </label>
				            </div>
			            	<?php } else { ?> 
			            		<img src="{{ asset('images/cronss.png') }}" alt="Veenus">&nbsp;{{!empty($valueEEother->restored_date)?date("D d M 'y", strtotime($valueEEother->restored_date)) :(!empty($valueEEother->current_restored_date)?date("D d M 'y", strtotime($valueEEother->current_restored_date)):'' )}}
			            	<?php } ?>
			            	
			            	
			            </td>                            
			        </tr>                
		             
        <?php  } }?>           
		              </tbody>
		        </table>  
		    </div> 
       <!-- <div class="form-group">
        <div class="form-check">
			    		<div class="checkarea_part_Dates">
			                <label class="checkbox_div graycls" style="font-size: 13px;">
			                  <input type="checkbox" name="other_tour[]" class="custom_chkbox exp_checkbox tagchkbox notClickedCls " value="{{ $valueEE->id }}">{{ $valueEE->name }}<span class="notClickedCls "></span>
			                  <span class="checkmark"></span>
			                </label>
			            </div>
			        </div>

        </div> -->
        
        <?php  } ?>              
               
         <span class="expcheck_error" style="display:none;color: red;">Please select any experience.</span>
           <!-- <div class="row"> 
        <div class="form-group">
        <input type="hidden" name="cart_exp_id" class="form-control"  value="{{!empty($cart_exp_id)?$cart_exp_id:''}}">
        
        <input type="submit" name="saveamount" value="Save" class="btn btn-warning btn-sm">
      
        </div>
    </div> -->

    <div style="clear:both;margin-left: 15px;"></div>
    <p>(You won't be able to put back for sale any tours if the date is not available<!-- where the date is not available anymore with the persons name you'd like to remove -->)</p>
        <input type="hidden" name="cart_exp_id" class="form-control"  value="{{!empty($cart_experience->id)?$cart_experience->id:''}}" style="padding:5px;color: #ffffff;font-weight: bold;">
        
       <!--  <input type="submit" name="saveamount" value="Save" class="btn btn-warning btn-sm ml-2"> -->
        <input type="submit" id="continue_page1" name="saveamount" value="Restore Selected For Sale" class="btn btn-warning btn-sm ml-2" style="padding:5px;color: #ffffff;font-weight: bold;background-color: #FCA311;"><!-- onClick="(function(){
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
	
	 $("body").on("submit", '#addBookingForm', function(e) {       
		console.log('call');
        e.preventDefault();
        	var checkalert1 = $('input[name="other_tour[]"]:checked').val();
		var checkalert2 = $('input[name="cancel_tour"]:checked').val();
		
		if(checkalert1 == undefined && checkalert2 == undefined)
		{
			 $('.expcheck_error').show();
        	 return false;
		}
		else
		{

			$.ajax({
				    url: "{{ route('save-reinstate-tour') }}",
				    type: 'POST',
				    data: formData,
				    contentType: false,
		            processData: false,
				    success: function(data){
				        parent.jQuery.fancybox.close();
				        //parent.parent.jQuery.fancybox.close();
				        toastSuccess('Resitanse Successfully.');
				        location.reload();
				        $('.loader').hide();
				        $('#saveEtcForm').click();
				    },
				    error: function(data){
				    	$('.loader').hide();
				    }
				});
		}
		return redirect()->route('account-superuser-pending')->with('success','Dismiss alert successfully');
	});
	$("#continue_page2").bind("click", function(e){

	
	var old_exp = $('#old_exp').val();
	var str = '';
	var new_exp = $('#new_exp').val();
	var newstr = '';
	var cnt = 0 ;
	$( ".exp_checkbox" ).each(function( index ) {
		var value = $(this).val();
		if(this.checked)
		{				
			$('.changeExpNew_'+value).show();
			str += value+",";
			var selvalue = $('.expSelect_'+value).val();

			if(selvalue == '')
			{
				cnt++;
			}
			var seltype = $('option:selected', '.expSelect_'+value).attr('data-typeid');
			var selinclusions = $('option:selected', '.expSelect_'+value).attr('data-inclusions');
			var seltext = $('option:selected', '.expSelect_'+value).text();
			 if(seltype == 1){ seltype  = 'VIP';}else if(seltype == 2){ seltype  = 'Big Banner';}else{ seltype  = 'Local';} 
			$('.changeExpNew_'+value+' .exp_type').text(seltype);
			$('.changeExpNew_'+value+' .exp_inclusions').text(selinclusions);
			
			$('.changeExpNew_'+value+' .exp_new').text(seltext);

			newstr += selvalue+",";

			
		}
		else
		{
			$('.changeExpNew_'+value).hide();
		}
	  
	});
	if(cnt == 0)
	{
		$('#old_exp').val(str);
		$('#new_exp').val(newstr);
		$('.screen_3').show();
		$('.screen_1').hide();
		$('.screen_2').hide();
	}
	else
	{
		$('.expselect_error').show();
        	 return false;
	}
	

	
});
 $("body").on("submit", '#alert('');', function(e) {       
		console.log('call');
        e.preventDefault();
        var checkalert = $('input[name="alert"]:checked').val();

		 var filessss = $("#amend_file")[0].files;
		if (filessss.length > 11) {
        alert("You can select only 10 images");
        return false;
	    } 
		else {
			if(checkalert == undefined)
			{
				 $('.alert_error').show();
	        	 return false;
			}
			else
			{
				$('.alert_error').hide();
				$('.loader').show();
				//var params = $("#dataHolder").serialize();
				 let formData = new FormData(this);
		   		$.ajax({
				    url: "{{ route('update-new-exp-amend') }}",
				    type: 'POST',
				    data: formData,
				    contentType: false,
		            processData: false,
				    success: function(data){
				        parent.jQuery.fancybox.close();
				        //parent.parent.jQuery.fancybox.close();
				        toastSuccess('Change Experience Successfully.');
				        location.reload();
				        $('.loader').hide();
				        $('#saveEtcForm').click();
				    },
				    error: function(data){
				    	$('.loader').hide();
				    }
				});
			}
	        
		}
	});
</script>