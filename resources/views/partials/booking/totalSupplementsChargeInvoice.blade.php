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

.red-border{border: 1px solid red;}
.content-tab{cursor: pointer;}

input:read-only,textarea:read-only {
    background: #eee;
    border: #eee;
    padding: 2px;
}
</style>

<div class=" tour_summary_container ">
  <h3 id="tablist-1">Total Charges</h3>
   <?php  
   $currency_symbol = getCurrencySymbol($cart_experience[0]->currency);
   if (Auth::check() && Auth::user()->hasRole("Super Admin")){ ?>
	  <!-- <div role="tablist" aria-labelledby="tablist-1" class="manual">
	    <button id="tab-1" class="select-tab" data-id="1" type="button" role="tab" aria-selected="true" aria-controls="tabpanel-1">
	      <span class="focus">In Costs</span>
	    </button>
	    <button id="tab-2" class="select-tab" data-id="2" type="button" role="tab" aria-selected="false" aria-controls="tabpanel-2" tabindex="-1">
	      <span class="focus">Out Costs</span>
	    </button>
	   
	  </div> -->
  <div class="tabs_wrapper">
    <ul class="notestabs" style="margin-bottom: 15px;margin-top: 0px;">
       @if(!empty($cart_experience[0]->xero_deposit_invoice_id))
       <!-- <li class="select-tab active " data-id="0" style="border-left: 0;">
            Deposit
        </li> -->
       @endif
       @if(!empty($cart_experience[0]->xero_invoice_id))
      <li class="select-tab active " data-id="1" style="border-left: 0;">
            Invoice 1(<?=!empty($cart_experience[0]->xepo_invoice_paid)?'paid':(!empty($cart_experience[0]->xero_invoice_id)?'sent':'')?>)
        </li>
         @endif
        <?php
    $i = 2;
    $cart_extra_invoice = 


DB::connection('mysql_veenus')->table('cart_experiences_extra_invoices')->where("cart_exp_id", $cart_experience[0]->id)->get();
    if(!empty($cart_experience[0]->xepo_invoice_paid)){
    	?>
    	
    	<?
    	$mark_as_paid_invoice = '1';
    		if(!empty($cart_extra_invoice[0]))
    		{
        $mark_as_paid_invoice = '0';
        foreach($cart_extra_invoice as $erow)
        {
        	$mark_as_paid = $erow->mark_as_paid;
                    ?>
                <li class="select-tab" data-id="{{$i}}" >
			            Invoice {{$i}}
			        </li>
              <?php
              $i++;
            }
          }
        }
        if(!empty($mark_as_paid_invoice) || !empty($mark_as_paid))
  			{
  				 ?>
                <li class="select-tab" data-id="{{$i}}" >
			            Invoice {{$i}}
			        </li>
              <?php
              
  			}
        ?>
      
       
       
    </ul>
    <br>
    
    <!--
     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addNotes">
  Add Note
</button> -->
   
</div>
<?php } ?>
@if(!empty($cart_experience[0]->xero_deposit_invoice_id))
  <div id="tabpanel-0" class="content-tab" role="tabpanel" aria-labelledby="tab-0" class="is-hidden" style="display:none;">
   
		<table class="table" >
				
			  <thead>
			    <tr>
			      <th scope="col"><b>Supplements </b></th>
			      <th scope="col"><b>Quality</b></th>
			      <th scope="col"><b>Unit Price</b></th>
			     <!--  <th scope="col"><b>VAT</b></th> -->
			      <th scope="col"><b>Total</b></th> 
			    </tr>
			  </thead>
			  <tbody class="tblBorderCls">
			  	<?php
			  		$deposit = array();
			  		//$deposit = Xero::invoices()->find($cart_experience[0]->xero_deposit_invoice_id);
			  		$total_final_cost = 0;
						$total_final_cost1 = 0;
			  		if(!empty($deposit['LineItems']))
			  		{
			  			foreach($deposit['LineItems'] as $drow)
			  			{
			  				?>
			  				<?php 
						  	
						 			$total_qty1 = !empty($drow['Quantity'])?$drow['Quantity']:'0';
						  			$price_qty1 = !empty($drow['UnitAmount'])?$drow['UnitAmount']:'0';
						  			$total_cost1 = $price_qty1*$total_qty1;
						  			$total_final_cost += $total_cost1;
						  			?>
						  			<tr>
								      	<td scope="row">{{!empty($drow['Description'])?$drow['Description']:''}}</td>
								      	<td scope="row">{{$total_qty1}}</td>
								      	<td scope="row">£{{!empty($price_qty1)?$price_qty1:'0'}}</td>
								      	<!-- <td scope="row">{{!empty($price_qty1)?'20%':''}}</td> -->
								      	<td scope="row">£{{$total_cost1}}</td>
								    </tr> 
			  				<?php
			  			}
			  			?>
			  		<!-- 	<tr>
				      	<td colspan="4" style="text-align:right;border-top:unset;"><b>Subtotal:</b></td>
				      	<td style="border-top:unset;border-top: 2px solid #000000;color: #000000"  scope="row"><b>£{{!empty($deposit['SubTotal'])?$deposit['SubTotal']:'0'}}</b></td>
			    		</tr> 
			    		<tr>
				      	<td colspan="4" style="text-align:right;border-top:unset;"><b>Total VAT 20%:</b></td>
				      	<td style="border-top:unset;color: #000000"  scope="row"><b>£{{!empty($deposit['TotalTax'])?$deposit['TotalTax']:'0'}}</b></td>
			    		</tr>  -->
			  			<tr>
				      	<td colspan="4" style="text-align:right;border-top:unset;"><b>Total ({{$currency_symbol}}) :</b></td>
				      	<td style="border-top:unset;border-top: 2px solid #000000;color: #000000"  scope="row"><b>£{{!empty($deposit['Total'])?$deposit['Total']:'0'}}</b></td>
			    		</tr> 	
			  			<?php
			  		}
			  	?>
			  </tbody>
		</table>
		<input type="button" value="Back" onclick="javascript: parent.jQuery.fancybox.close();" style="float:left;" class="cta total">
  </div>
@endif
@if(!empty($cart_experience[0]->invoice_data))

  <div id="tabpanel-1" class="content-tab" role="tabpanel" aria-labelledby="tab-1" >
  <?php if(empty($cart_experience[0]->xepo_invoice_paid)){
  $invoice_data = json_decode($cart_experience[0]->invoice_data,true);
  ?> 
				<form method="post" action="{{ route('strore-extra-invoice') }}" id="dataHolder">
					<input type="hidden" value="{{$cart_experience[0]->id}}" name="cart_id">
					<input type="hidden" value="1" name="invoice_no">
					{{ csrf_field() }}
					<table class="table table_invoice" >
							
						  <thead>
						    <tr>
						      <th scope="col"><b>Charge Name </b></th>
						      <th scope="col"><b>Quantity</b></th>
						      <th scope="col"><b>In Price</b></th>
						      <th scope="col"><b>Out Price</b></th>
						      <th scope="col"><b>Total(In)</b></th> 
						      <th scope="col"><b>Total(Out)</b></th> 
						      <th scope="col"><b>Action</b></th> 
						    </tr>
						  </thead>
						 <tbody>
						 	<?php $total_final_cost_in = 0;
										$total_final_cost_in1 = 0; ?>
						 	@if(!empty($invoice_data))
						 		@foreach($invoice_data as $irow)
						 		<?php

						 		$total_qty1 = !empty($irow['Quantity'])?$irow['Quantity']:'0';
						 	$default = isset($irow['Tracking'][0]['default'])?$irow['Tracking'][0]['default']:'0';
				  			$price_qty_out = isset($irow['Tracking'][0]['price_out'])?$irow['Tracking'][0]['price_out']:'0';
				  			$price_qty_in = isset($irow['Tracking'][0]['price_in'])?$irow['Tracking'][0]['price_in']:$price_qty_out;
				  			$total_cost1 = $price_qty_out*$total_qty1;
				  			$total_cost2 = $price_qty_in*$total_qty1;
				  			$total_final_cost_in += $total_cost1;
				  			$total_final_cost_in1 += $total_cost2;
				  			$Quantity = !empty($irow['Quantity'])?$irow['Quantity']:'0';
						 		?>
							 		<tr class="add_div">
							      <td scope="col"><!-- <input type="text" <?=!empty($default)?'readonly':''?> name="charge_name[]" style="width: 100%;" class="charge_name" value="{{!empty($irow['Description'])?$irow['Description']:''}}"> -->
							      	<textarea type="text" <?=!empty($default)?'readonly':''?> name="charge_name[]" style="width: 100%;" class="charge_name" >{{!empty($irow['Description'])?$irow['Description']:''}}</textarea></td>
							      <td scope="col"><input type="text" <?=!empty($default)?'readonly':''?> onkeypress="return event.charCode >= 48 && event.charCode <= 57" name="quality[]" class="invoice_quantity update_price" value="{{!empty($irow['Quantity'])?$irow['Quantity']:''}}"></td>
							      <td scope="col"><input type="text" <?=!empty($default)?'readonly':''?> name="in_price[]" class="decimal in_price update_price" value="{{$price_qty_in}}"></td>
							      <td scope="col"><input type="text" <?=!empty($default)?'readonly':''?> name="out_price[]" class="decimal out_price update_price" value="{{$price_qty_out}}"></td>
							      <td scope="col"><span class="in_total_price">{{$Quantity*$price_qty_in}}</span></td> 
							      <td scope="col"><span class="out_total_price">{{$Quantity*$price_qty_out}}</span></td> 
							      <td scope="col"><input type="hidden" value="{{$default}}" name="default[]" ><?php if(empty($default)){ ?><button class="btn-sm btn-primary remove_upgrade" type="button">Remove</button><?php } ?></td> 
							    </tr>
						 		@endforeach
						 		@endif
						 		
						   
						    <tr>
						    	<td colspan="7" > <button style="color: #FCA311;font-weight:bold;" class="add_upgrade" type="button" data-value="{{$i}}" id="add_upgrade">Add More</button></td>
						    </tr>
						   <tr>
				      	<td colspan="4" style="text-align:right;border-top:unset;"><b>Total :</b></td>
				      	<td style="border-top:unset;border-top: 2px solid #000000;color: #000000" scope="row"><b><span class="final_in_total">{{$total_final_cost_in}}</span></b></td>
				      	<td style="border-top:unset;border-top: 2px solid #000000;color: #000000" scope="row"><b><span class="final_out_total">{{$total_final_cost_in1}}</span></b></td>
				      	<td></td>
			    		</tr>
						 </tbody>
					</table>
					<table class="table " >
						<tbody>
							 
						    <tr>
						    	<td > <input type="hidden" class="xero_amount" name="xero_amount" value="">
						    		<input type="button" value="Save Changes" class="btn btn-primary btn-sm" id="addInvoice"></td>
						    		@if(empty($cart_experience[0]->invoice_sent_finance))
									    @if(!empty($invoice_data))
						    	<td style="float:right;">
						    		
						    			 <input type="button" value="Send Invoice for approval" class="btn btn-primary btn-sm" id="sendInvoice" data-id="{{!empty($cart_experience[0]->id)?$cart_experience[0]->id:''}}"  style="background-color: red mportant;">
						    			
								</td>
								@endif
								@else
								<td style="float:right;">
									    		
										    	<input type="button" data-url="{{route('create-invoice', $erow->cart_exp_id)}}/?type=extra_invoice&invoice_id={{$erow->xero_invoice_id}}" value="<?=!empty($erow->xero_invoice_id)?'Update':'Send'?> to xero" class="btn btn-primary" id="sendXero" class="orangeLink" style="width: 10%;float: right;">
												<input type="hidden" id="send_to_xero" value="">
											</td>
						    		@endif
						    </tr>
						</tbody>
					</table>


				</form>
				<?php } else { ?> 
				<table class="table" >

				  <thead>
				    <tr>
				      <th scope="col"><b>Supplements </b></th>
				      <th scope="col"><b>Quality</b></th>
				      <th scope="col"><b>In Price</b></th>
				      <th scope="col"><b>Out Price</b></th>
				     <!--  <th scope="col"><b>VAT</b></th> -->
				      <th scope="col"><b>Total(In)</b></th> 
				      <th scope="col"><b>Total(Out)</b></th> 
				    </tr>
				  </thead>
				  <tbody class="tblBorderCls">
				  	<?php
				  		//$deposit = Xero::invoices()->find($cart_experience[0]->xero_invoice_id);
				  		$deposit = !empty($cart_experience[0]->invoice_data)?json_decode($cart_experience[0]->invoice_data, true):array();
				  		//prd($deposit);
				  		$total_final_cost = 0;
							$total_final_cost1 = 0;
				  		if(!empty($deposit))
				  		{
				  			foreach($deposit as $drow)
				  			{
				  				
				  				?>
				  				<?php 
							  			/*if(strpos($drow['Description'], $cart_experience[0]->experience_name) !== false || strpos($drow['Description'], 'Driver') !== false){

							  			}
							  			else
							  			{*/
							  				$total_qty1 = !empty($drow['Quantity'])?$drow['Quantity']:'0';
								  			$price_qty1 = isset($drow['Tracking'][0]['price_in'])?$drow['Tracking'][0]['price_in']:'0';
								  			$price_qty_out = isset($drow['Tracking'][0]['price_out'])?$drow['Tracking'][0]['price_out']:'0';
								  			$total_cost1 = $price_qty1*$total_qty1;
								  			$total_cost2 = $price_qty_out*$total_qty1;
								  			$total_final_cost += $total_cost1;
								  			$total_final_cost1 += $total_cost2;
								  			?>
								  			<tr>
										      	<td scope="row">{{!empty($drow['Description'])?$drow['Description']:''}}</td>
										      	<td scope="row">{{$total_qty1}}</td>
										      
										      	<td scope="row">£{{!empty($price_qty1)?$price_qty1:'0'}}</td>
										      	<td scope="row">£{{!empty($price_qty_out)?$price_qty_out:'0'}}</td>
										      	<!-- <td scope="row">{{!empty($price_qty_out)?'20%':''}}</td> -->
										      	<td scope="row">£{{$total_cost1}}</td>
										      	<td scope="row">£{{$total_cost2}}</td>
										    </tr> 
							  			
							 				
				  				<?php
				  			/*}*/
				  		}
				  			?>
				  		<!-- 	<tr>
					      	<td colspan="4" style="text-align:right;border-top:unset;"><b>Subtotal:</b></td>
					      	<td style="border-top:unset;border-top: 2px solid #000000;color: #000000"  scope="row"><b>£{{!empty($deposit['SubTotal'])?$deposit['SubTotal']:'0'}}</b></td>
				    		</tr> 
				    		<tr>
					      	<td colspan="4" style="text-align:right;border-top:unset;"><b>Total VAT 20%:</b></td>
					      	<td style="border-top:unset;color: #000000"  scope="row"><b>£{{!empty($deposit['TotalTax'])?$deposit['TotalTax']:'0'}}</b></td>
				    		</tr>  -->
				  			<tr>
					      	<td colspan="4" style="text-align:right;border-top:unset;"><b>Total ({{$currency_symbol}}):</b></td>
					      	<td style="border-top:unset;border-top: 2px solid #000000;color: #000000"  scope="row"><b>£{{!empty($total_final_cost)?$total_final_cost:'0'}}</b></td>
					      	<td style="border-top:unset;border-top: 2px solid #000000;color: #000000"  scope="row"><b>£{{!empty($total_final_cost1)?$total_final_cost1:'0'}}</b></td>
				    		</tr> 	
				  			<?php
				  		}
				  	?>
				  </tbody>
				</table>
				<?php } ?>
		
		
		<input type="button" value="Back" onclick="javascript: parent.jQuery.fancybox.close();" style="float:left;" class="cta total">
  </div>
  @endif

 <?php 
	
    $i = 2;
    //$mark_as_paid_invoice = '0';
    if(!empty($cart_experience[0]->xepo_invoice_paid)){
    	$mark_as_paid_invoice = '1';

    if(!empty($cart_extra_invoice[0]))
    {		
        $mark_as_paid_invoice = '0';
        foreach($cart_extra_invoice as $erow)
        {
        		$mark_as_paid = $erow->mark_as_paid;
        		$invoice_data = json_decode($erow->invoice_data,true);
        		
            ?>
            <div id="tabpanel-{{$i}}" class="content-tab" role="tabpanel" aria-labelledby="tab-{{$i}}" style="display:none;" >
            	<?php if(empty($mark_as_paid)){ ?> 
  						<form method="post" action="{{ route('strore-extra-invoice') }}" id="dataHolder">
								<input type="hidden" value="{{$cart_experience[0]->id}}" name="cart_id">
								<input type="hidden" value="{{$i}}" name="invoice_no">
								{{ csrf_field() }}
								<table class="table table_invoice" >
										
									  <thead>
									    <tr>
									      <th scope="col"><b>Charge Name </b></th>
									      <th scope="col"><b>Quantity</b></th>
									      <th scope="col"><b>In Price</b></th>
									      <th scope="col"><b>Out Price</b></th>
									      <th scope="col"><b>Total(In)</b></th> 
									      <th scope="col"><b>Total(Out)</b></th> 
									      <th scope="col"><b>Action</b></th> 
									    </tr>
									  </thead>
									 <tbody>
									 	<?php $total_final_cost_in = 0;
													$total_final_cost_in1 = 0; ?>
									 	@if(!empty($invoice_data))
									 		@foreach($invoice_data as $irow)
									 		<?php

									 		$total_qty1 = !empty($irow['Quantity'])?$irow['Quantity']:'0';
							  			$price_qty1 = isset($irow['Tracking'][0]['price_in'])?$irow['Tracking'][0]['price_in']:'0';
							  			$price_qty_out = isset($irow['Tracking'][0]['price_out'])?$irow['Tracking'][0]['price_out']:'0';
							  			$total_cost1 = $price_qty1*$total_qty1;
							  			$total_cost2 = $price_qty_out*$total_qty1;
							  			$total_final_cost_in += $total_cost1;
							  			$total_final_cost_in1 += $total_cost2;
							  			$default = isset($irow['Tracking'][0]['default'])?$irow['Tracking'][0]['default']:'0';
									 		?>
										 		<tr class="add_div">
										      <td scope="col"><!-- <input type="text" <?=!empty($default)?'readonly':''?> name="charge_name[]" style="width: 100%;" class="charge_name" value="{{$irow['Description']}}"> -->
										      	<textarea type="text" <?=!empty($default)?'readonly':''?> name="charge_name[]" style="width: 100%;" class="charge_name" >{{!empty($irow['Description'])?$irow['Description']:''}}</textarea>
										      </td>
										      <td scope="col"><input type="text" <?=!empty($default)?'readonly':''?> onkeypress="return event.charCode >= 48 && event.charCode <= 57" name="quality[]" class="invoice_quantity update_price" value="{{$irow['Quantity']}}"></td>
										      <td scope="col"><input type="text" <?=!empty($default)?'readonly':''?>   name="in_price[]" class="decimal in_price update_price" value="{{$price_qty1}}"></td>
										      <td scope="col"><input type="text" <?=!empty($default)?'readonly':''?>   name="out_price[]" class="decimal out_price update_price" value="{{$price_qty_out}}"></td>
										      <td scope="col"><span class="in_total_price">{{$irow['Quantity']*$price_qty1}}</span></td> 
										      <td scope="col"><span class="out_total_price">{{$irow['Quantity']*$price_qty_out}}</span></td> 
										      <td scope="col"><input type="hidden" value="{{$default}}" name="default[]" ><?php if(empty($default)){ ?><button class="btn-sm btn-primary remove_upgrade" type="button">Remove</button><?php } ?></td> 
										    </tr>
									 		@endforeach
									 		@endif
									 		
									   
									    <tr>
									    	<td colspan="7" > <button style="color: #FCA311;font-weight:bold;" class="add_upgrade" type="button" data-value="{{$i}}" id="add_upgrade">Add More</button></td>
									    </tr>
									   <tr>
							      	<td colspan="4" style="text-align:right;border-top:unset;"><b>Total :</b></td>
							      	<td style="border-top:unset;border-top: 2px solid #000000;color: #000000" scope="row"><b><span class="final_in_total">{{$total_final_cost_in}}</span></b></td>
							      	<td style="border-top:unset;border-top: 2px solid #000000;color: #000000" scope="row"><b><span class="final_out_total">{{$total_final_cost_in1}}</span></b></td>
							      	<td></td>
						    		</tr>
									 </tbody>
								</table>
								<table class="table " >
									<tbody>
										 
									    <tr>
									    	<td > <input type="hidden" class="xero_amount" name="xero_amount" value="">
									    		<input type="button" value="Save Changes" class="btn btn-primary btn-sm" id="addInvoice"></td>
									    	 @if(empty($erow->sent_to_finance))
									    		<!--  @if(!empty($invoice_data)) -->
									    	<td style="float:right;">
									    		
										    	 <input type="button" value="Send Invoice for approval" class="btn btn-primary btn-sm" id="sendExtraInvoice" data-id="{{!empty($erow->id)?$erow->id:''}}"  style="background-color: red mportant;">
										    	</td>
										    	<!-- @endif -->
										    	@else
										    	<td style="float:right;">
									    		
										    	<input type="button" data-url="{{route('create-invoice', $erow->cart_exp_id)}}/?type=extra_invoice&invoice_id={{$erow->id}}" value="<?=!empty($erow->xero_invoice_id)?'Update':'Send'?> to xero" class="btn btn-primary" id="sendXero" class="orangeLink" style="float: right;">
												<input type="hidden" id="send_to_xero" value="">
											</td>
										    @endif
									    </tr>
									</tbody>
								</table>


							</form>
							<?php } else { ?> 
							<table class="table" >
				
							  <thead>
							    <tr>
							      <th scope="col"><b>Supplements </b></th>
							      <th scope="col"><b>Quality</b></th>
							      <th scope="col"><b>In Price</b></th>
							      <th scope="col"><b>Out Price</b></th>
							     <!--  <th scope="col"><b>VAT</b></th> -->
							      <th scope="col"><b>Total(In)</b></th> 
							      <th scope="col"><b>Total(Out)</b></th> 
							    </tr>
							  </thead>
							  <tbody class="tblBorderCls">
							  	<?php
							  		$deposit = !empty($erow->invoice_data)?json_decode($erow->invoice_data, true):array();

							  		$total_final_cost = 0;
										$total_final_cost1 = 0;
							  		if(!empty($deposit))
							  		{
							  			foreach($deposit as $drow)
							  			{
							  				
							  				?>
							  				<?php 
										  			
										  				$total_qty1 = !empty($drow['Quantity'])?$drow['Quantity']:'0';
											  			$price_qty1 = isset($drow['Tracking'][0]['price_in'])?$drow['Tracking'][0]['price_in']:'0';
											  			$price_qty_out = isset($drow['Tracking'][0]['price_out'])?$drow['Tracking'][0]['price_out']:'0';
											  			$total_cost1 = $price_qty1*$total_qty1;
											  			$total_cost2 = $price_qty_out*$total_qty1;
											  			$total_final_cost += $total_cost1;
											  			$total_final_cost1 += $total_cost2;
											  			?>
											  			<tr>
													      	<td scope="row">{{!empty($drow['Description'])?$drow['Description']:''}}</td>
													      	<td scope="row">{{$total_qty1}}</td>
													      	<td scope="row">£{{!empty($price_qty1)?$price_qty1:'0'}}</td>
													      	<td scope="row">£{{!empty($price_qty_out)?$price_qty_out:'0'}}</td>
													      	<!-- <td scope="row">{{!empty($price_qty1)?'20%':''}}</td> -->
													      	<td scope="row">£{{$total_cost1}}</td>
													      	<td scope="row">£{{$total_cost2}}</td>
													    </tr> 
										  			
										 				
							  				<?php
							  			
							  		}
							  			?>
							  		<!-- 	<tr>
								      	<td colspan="4" style="text-align:right;border-top:unset;"><b>Subtotal:</b></td>
								      	<td style="border-top:unset;border-top: 2px solid #000000;color: #000000"  scope="row"><b>£{{!empty($deposit['SubTotal'])?$deposit['SubTotal']:'0'}}</b></td>
							    		</tr> 
							    		<tr>
								      	<td colspan="4" style="text-align:right;border-top:unset;"><b>Total VAT 20%:</b></td>
								      	<td style="border-top:unset;color: #000000"  scope="row"><b>£{{!empty($deposit['TotalTax'])?$deposit['TotalTax']:'0'}}</b></td>
							    		</tr>  -->
							  			<tr>
								      	<td colspan="4" style="text-align:right;border-top:unset;"><b>Total ({{$currency_symbol}}):</b></td>
								      	<td style="border-top:unset;border-top: 2px solid #000000;color: #000000"  scope="row"><b>£{{!empty($total_final_cost)?$total_final_cost:'0'}}</b></td>
								      	<td style="border-top:unset;border-top: 2px solid #000000;color: #000000"  scope="row"><b>£{{!empty($total_final_cost1)?$total_final_cost1:'0'}}</b></td>
							    		</tr> 	
							  			<?php
							  		}
							  	?>
							  </tbody>
						</table>
					<?php } ?>
							<input type="button" value="Back" onclick="javascript: parent.jQuery.fancybox.close();" style="float:left;" class="cta total">
					  </div>
            <?php
            $i++;
        }
    }
  }

  if(empty($cart_experience[0]->invoice_data) || !empty($mark_as_paid_invoice) || !empty($mark_as_paid))
  {
  	?>
  	 <div id="tabpanel-{{$i}}" class="content-tab" role="tabpanel" aria-labelledby="tab-{{$i}}" <?=empty($cart_experience[0]->invoice_data)?'':'style="display:none;"'?> >
  						<form method="post" action="{{ route('strore-extra-invoice') }}" id="dataHolder">
								<input type="hidden" value="{{$cart_experience[0]->id}}" name="cart_id">
								<input type="hidden" value="{{$i}}" name="invoice_no">
								{{ csrf_field() }}
								<table class="table table_invoice" >
										
									  <thead>
									    <tr>
									      <th scope="col"><b>Charge Name </b></th>
									      <th scope="col"><b>Quantity</b></th>
									      <th scope="col"><b>In Price</b></th>
									      <th scope="col"><b>Out Price</b></th>
									      <th scope="col"><b>Total(In)</b></th> 
									      <th scope="col"><b>Total(Out)</b></th> 
									      <th scope="col"><b>Action</b></th> 
									    </tr>
									  </thead>
									 <tbody>
									 	<?php 
									 	if(!empty($invoice_line_items))
							  		{
							  			foreach($invoice_line_items as $drow)
							  			{
							  				
							  				?>
							  				<?php 
										  			/*if(strpos($drow['Description'], $cart_experience[0]->experience_name) !== false || strpos($drow['Description'], 'Driver') !== false){

										  			}
										  			else
										  			{*/
										  				$total_qty1 = !empty($drow['Quantity'])?$drow['Quantity']:'0';
											  			$price_qty1 =isset($drow['Tracking'][0]['price_in'])?$drow['Tracking'][0]['price_in']:'0';
											  			$price_qty_out = isset($drow['Tracking'][0]['price_out'])?$drow['Tracking'][0]['price_out']:'0';
											  			$total_cost1 = $price_qty1*$total_qty1;
											  			$total_cost2 = $price_qty_out*$total_qty1;
											  			$total_final_cost += $total_cost1;
											  			$total_final_cost1 += $total_cost2;
											  			?>
											  			<tr class="add_div">
													      <td scope="col"><!-- <input type="text" readonly name="charge_name[]" style="width: 100%;" class="charge_name" value="{{$drow['Description']}}"> --><textarea type="text" readonly name="charge_name[]" style="width: 100%;" class="charge_name" >{{!empty($drow['Description'])?$drow['Description']:''}}</textarea></td>
													      <td scope="col"><input type="text" readonly onkeypress="return event.charCode >= 48 && event.charCode <= 57" name="quality[]" class="invoice_quantity update_price" value="{{$drow['Quantity']}}"></td>
													      <td scope="col"><input type="text" readonly  name="in_price[]" class="decimal in_price update_price" value="{{$price_qty1}}"></td>
													      <td scope="col"><input type="text" readonly  name="out_price[]" class="decimal out_price update_price" value="{{$price_qty_out}}"></td>
													      <td scope="col"><span class="in_total_price">{{$drow['Quantity']*$price_qty1}}</span></td> 
													      <td scope="col"><span class="out_total_price">{{$drow['Quantity']*$price_qty_out}}</span></td> 
													      <td scope="col"><input type="hidden" value="1" name="default[]" ><!-- <button class="btn-sm btn-primary remove_upgrade" type="button">Remove</button> --></td> 
													    </tr>
										  			
											 				
								  				<?php
								  			}
								  		}else{ ?>
								  		<tr class="add_div">
									      <td scope="col"><input type="text" name="charge_name[]" style="width: 100%;" class="charge_name" value=""></td>
									      <td scope="col"><input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57" name="quality[]" class="invoice_quantity update_price" value=""></td>
									      <td scope="col"><input type="text" name="in_price[]" class="decimal in_price update_price" value=""></td>
									      <td scope="col"><input type="text" name="out_price[]" class="decimal out_price update_price" value=""></td>
									      <td scope="col"><span class="in_total_price"></span></td> 
									      <td scope="col"><span class="out_total_price"></span></td> 
									      <td scope="col"><input type="hidden" value="0" name="default[]" ><button class="btn-sm btn-primary remove_upgrade" type="button">Remove</button></td> 
									    </tr>
									<?php } ?>
									    <tr>
									    	<td colspan="7" > <button style="color: #FCA311;font-weight:bold;" class="add_upgrade" type="button" data-value="{{$i}}" id="add_upgrade">Add More</button></td>
									    </tr>
									   <tr>
							      	<td colspan="4" style="text-align:right;border-top:unset;"><b>Total ({{$currency_symbol}}):</b></td>
							      	<td style="border-top:unset;border-top: 2px solid #000000;color: #000000" scope="row"><b><span class="final_in_total"></b></span></td>
							      	<td style="border-top:unset;border-top: 2px solid #000000;color: #000000" scope="row"><b><span class="final_out_total"></b></span></td>
							      	<td></td>
						    		</tr>
									 </tbody>
								</table>
								<table class="table " >
									<tbody>
										 
									    <tr>
									    	<td > 
									    		<input type="hidden" class="xero_amount" name="xero_amount" value="">
									    		<input type="button" value="Save Changes" class="btn btn-primary btn-sm" id="addInvoice"></td>
									    </tr>
									</tbody>
								</table>


							</form>
							<input type="button" value="Back" onclick="javascript: parent.jQuery.fancybox.close();" style="float:left;" class="cta total">
					  </div>
  	<?php
  }
?>



<script type="text/javascript">
	$('#sendXero').bind("click", function(e){
			$('#send_to_xero').val('1');
			$('#addInvoice').trigger('click');
		});
	$(document).ready(function(){
		var final_in = 0;
	var final_out = 0;
		$( "table.table_invoice tr" ).each(function( index ) {
				var quantity = $(this).children('td').children('.invoice_quantity').val();
				var in_price = $(this).children('td').children('.in_price').val();
				var out_price = $(this).children('td').children('.out_price').val();
				var total_in = (parseInt(quantity) * parseFloat(in_price));
				var total_out = (parseInt(quantity) * parseFloat(out_price))
			
				if(isNaN(total_in)){
		      total_in = 0;
		    }
				if(isNaN(total_out)){
			      total_out = 0;
			    }
				$(this).children('td').children('.in_total_price').text(total_in);
				$(this).children('td').children('.out_total_price').text(total_out);
				
				final_in += parseFloat(total_in);
				final_out += parseFloat(total_out);
		});
		if(isNaN(final_in)){
		      final_in = 0;
		    }
				if(isNaN(final_out)){
			      final_out = 0;
			    }
		$('.final_out_total').text(final_out);
		$('.final_in_total').text(final_in);
		$('.xero_amount').val(final_in);
	})
//$('.update_price').change(function(){
	$(document).on('change', 'input.update_price', function() {
	var final_in = 0;
	var final_out = 0;
		$( "table.table_invoice tr" ).each(function( index ) {
				var quantity = $(this).children('td').children('.invoice_quantity').val();
				var in_price = $(this).children('td').children('.in_price').val();
				var out_price = $(this).children('td').children('.out_price').val();
				var total_in = (parseInt(quantity) * parseFloat(in_price));
				var total_out = (parseInt(quantity) * parseFloat(out_price))
			
				if(isNaN(total_in)){
		      total_in = 0;
		    }
				if(isNaN(total_out)){
			      total_out = 0;
			    }
				$(this).children('td').children('.in_total_price').text(total_in);
				$(this).children('td').children('.out_total_price').text(total_out);
				
				final_in += parseFloat(total_in);
				final_out += parseFloat(total_out);
		});
		if(isNaN(final_in)){
		      final_in = 0;
		    }
				if(isNaN(final_out)){
			      final_out = 0;
			    }
		$('.final_out_total').text(final_out);
		$('.final_in_total').text(final_in);
		$('.xero_amount').val(final_in);
	})
	$("#sendExtraInvoice").bind("click", function(e){
		var id = $(this).attr("data-id");
			$.ajax({
			    url: "{{ route('sent-extra-invoice') }}",
			    type: 'POST',
			    data: {sent_finance:'1','invoice_id':id},
			    success: function(data){
			        parent.jQuery.fancybox.close();
			        parent.parent.jQuery.fancybox.close();
			        var cartIdSCls = $('.cartIdSCls').val();
	                $('a#reloadInfo'+cartIdSCls).trigger('click');
			        toastSuccess('Sent to finance successfully.');
			        $('.loader').hide();
			    },
			    error: function(data){
			    	$('.loader').hide();
			    }
			});
		
		
	});
	$("#sendInvoice").bind("click", function(e){
		var id = $(this).attr("data-id");
			$.ajax({
			    url: "{{ route('sent-invoice') }}",
			    type: 'POST',
			    data: {sent_finance:'1','invoice_id':id},
			    success: function(data){
			        parent.jQuery.fancybox.close();
			        parent.parent.jQuery.fancybox.close();
			        var cartIdSCls = $('.cartIdSCls').val();
	                $('a#reloadInfo'+cartIdSCls).trigger('click');
			        toastSuccess('Sent to finance successfully.');
			        $('.loader').hide();
			    },
			    error: function(data){
			    	$('.loader').hide();
			    }
			});
		
		
	});
		$("#addInvoice").bind("click", function(e){
		var cnt1 = 0;
		$( ".add_div input" ).each(function( index ) {
			
			var cost = $(this).val();
			 if(cost == '')
			 {
			 	$(this).addClass('red-border');
			 	cnt1 = 1;
			 }
			 else
			 {
			 	$(this).removeClass('red-border');
			 }
			
			});
		if(cnt1 == 1)
		{

		}
		else
		{
			//alert('hi');
			$('.loader').show();
			var params = $("#dataHolder").serialize();
	   		$.ajax({
			    url: "{{ route('strore-extra-invoice') }}",
			    type: 'POST',
			    data: params,
			    success: function(data){
			       var send_xero = 	$('#send_to_xero').val();
				    if(send_xero != '')
				    {
				    	var url = $('#sendXero').data('url');
				    	window.location.href = url;
				    }
				    else
				    {
				    		parent.jQuery.fancybox.close();
				        parent.parent.jQuery.fancybox.close();
				        var cartIdSCls = $('.cartIdSCls').val();
		                $('a#reloadInfo'+cartIdSCls).trigger('click');
				        toastSuccess('Invoice has been added successfully.');
				        $('.loader').hide();
				    }
			    },
			    error: function(data){
			    	$('.loader').hide();
			    }
			});
		}
		
		
	});
	$(".remove_upgrade").unbind().click(function() {
	//$(document).on("click", ".remove_upgrade", function() {
			if(confirm('Are you sure you want to remove'))
			{
				$(this).closest('tr').remove();	
			}
			
		});
	
	$('.add_upgrade').click(function(e){
			var id = $(this).attr('data-value');
			var html = '';
			html += '<tr class="add_div">';
	    html += '<td scope="col"><textarea type="text" name="charge_name[]" style="width: 100%;" class="charge_name" ></textarea></td>';
	    html += '<td scope="col"><input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57" name="quality[]" class="invoice_quantity update_price" value=""></td>';
	    html += '<td scope="col"><input type="text" name="in_price[]" class="decimal in_price update_price" value=""></td>';
	    html += '<td scope="col"><input type="text" name="out_price[]" class="decimal out_price update_price" value=""></td>';
	    html += '<td scope="col"><span class="in_total_price"></span></td>'; 
	    html += '<td scope="col"><span class="out_total_price"></span></td>'; 
	    html += '<td scope="col"><input type="hidden" value="0" name="default[]" ><button class="btn-sm btn-primary remove_upgrade" type="button">Remove</button></td>'; 
	  	html += '</tr>';
			
$('.add_div').last().after(html);
			//$('.add_div tbody').append(html);
			//$(html).insertAfter("tr.add_div");
			$(".remove_upgrade").unbind().click(function() {
			//$(document).on("click", ".remove_upgrade", function() {
					if(confirm('Are you sure you want to remove'))
					{
						$(this).closest('tr').remove();	
					}
					
				});
		});
	$('.select-tab').click(function(){
		var id = $(this).attr('data-id');
		$('.select-tab').removeClass('active');
		$(this).addClass('active');
		
		
		$('.select-tab').attr('aria-selected',false);
		$(this).attr('aria-selected',true);
		

		$('.content-tab').hide();
		$('#tabpanel-'+id).show();
	})


	
	$('.decimal').keypress(function(evt){
    return (/^[0-9]*\.?[0-9]*$/).test($(this).val()+evt.key);
});
</script>