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

<style type="text/css">
		/*.tabs {
		  font-family: "lucida grande", sans-serif;
		}

		[role="tablist"] {
		  min-width: 550px;
		}

		[role="tab"],
		[role="tab"]:focus,
		[role="tab"]:hover {
		  position: relative;
		  z-index: 2;
		  top: 2px;
		  margin: 0;
		  margin-top: 4px;
		  padding: 3px 3px 4px;
		  border: 1px solid hsl(219deg 1% 72%);
		  border-bottom: 2px solid hsl(219deg 1% 72%);
		  border-radius: 5px 5px 0 0;
		  overflow: visible;
		  background: hsl(220deg 20% 94%);
		  outline: none;
		  font-weight: bold;
		}

		[role="tab"][aria-selected="true"] {
		  padding: 2px 2px 4px;
		  margin-top: 0;
		  border-width: 2px;
		  border-top-width: 6px;
		  border-top-color: rgb(36 116 214);
		  border-bottom-color: hsl(220deg 43% 99%);
		  background: hsl(220deg 43% 99%);
		}

		[role="tab"][aria-selected="false"] {
		  border-bottom: 1px solid hsl(219deg 1% 72%);
		}

		[role="tab"] span.focus {
		  display: inline-block;
		  margin: 2px;
		  padding: 4px 6px;
		}

		[role="tab"]:hover span.focus,
		[role="tab"]:focus span.focus,
		[role="tab"]:active span.focus {
		  padding: 2px 4px;
		  border: 2px solid #fff;
		  border-radius: 3px;
		}

		[role="tabpanel"] {
		  padding: 5px;
		  border: 2px solid hsl(219deg 1% 72%);
		  border-radius: 0 5px 5px;
		  background: hsl(220deg 43% 99%);
		  min-height: 10em;
		  min-width: 550px;
		  overflow: auto;
		}

		[role="tabpanel"].is-hidden {
		  display: none;
		}

		[role="tabpanel"] p {
		  margin: 0;
		}*/

</style>
<script type="text/javascript">
	
</script>
<div class=" tour_summary_container ">
  <h3 id="tablist-1">Total Charges</h3>
   <?php  if (Auth::check() && Auth::user()->hasRole("Super Admin")){ ?>
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
       <!-- <li class="select-tab active " data-id="1" style="border-left: 0;">
            Deposit
        </li> -->
       @endif
       @if(!empty($cart_experience[0]->xero_invoice_id))
       <li class="select-tab" data-id="2" >
            Invoice 1
        </li>

       @endif
       
       
    </ul>
    <br>
    
    <!--
     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addNotes">
  Add Note
</button> -->
   
</div>
<?php } ?>
@if(!empty($cart_experience[0]->xero_deposit_invoice_id))
  <div id="tabpanel-1" class="content-tab" role="tabpanel" aria-labelledby="tab-1" class="is-hidden" style="display:none;">
   
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
			  		$deposit = Xero::invoices()->find($cart_experience[0]->xero_deposit_invoice_id);
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
				      	<td colspan="4" style="text-align:right;border-top:unset;"><b>Total :</b></td>
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
@if(!empty($cart_experience[0]->xero_invoice_id))
  <div id="tabpanel-2" class="content-tab" role="tabpanel" aria-labelledby="tab-2" >
  
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
			  		$deposit = Xero::invoices()->find($cart_experience[0]->xero_invoice_id);
			  		$total_final_cost = 0;
						$total_final_cost1 = 0;
			  		if(!empty($deposit['LineItems']))
			  		{
			  			foreach($deposit['LineItems'] as $drow)
			  			{
			  				?>
			  				<?php 
						  			if(strpos($drow['Description'], $cart_experience[0]->experience_name) !== false || strpos($drow['Description'], 'Driver') !== false){

						  			}
						  			else
						  			{
						  				$total_qty1 = !empty($drow['Quantity'])?$drow['Quantity']:'0';
							  			$price_qty1 = !empty($drow['UnitAmount'])?$drow['UnitAmount']:'0';
							  			$total_cost1 = $price_qty1*$total_qty1;
							  			$total_final_cost += $total_cost1;
							  			?>
							  			<tr>
									      	<td scope="row">{{!empty($drow['Description'])?$drow['Description']:''}}</td>
									      	<td scope="row">{{$total_qty1}}</td>
									      	<td scope="row">£{{!empty($price_qty1)?$price_qty1:'0'}}</td>
									      	<td scope="row">£{{!empty($price_qty1)?$price_qty1:'0'}}</td>
									      	<!-- <td scope="row">{{!empty($price_qty1)?'20%':''}}</td> -->
									      	<td scope="row">£{{$total_cost1}}</td>
									      	<td scope="row">£{{$total_cost1}}</td>
									    </tr> 
						  			
						 				
			  				<?php
			  			}
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
				      	<td colspan="4" style="text-align:right;border-top:unset;"><b>Total :</b></td>
				      	<td style="border-top:unset;border-top: 2px solid #000000;color: #000000"  scope="row"><b>£{{!empty($deposit['Total'])?$deposit['Total']:'0'}}</b></td>
			    		</tr> 	
			  			<?php
			  		}
			  	?>
			  </tbody>
		</table>
		<input type="button" value="Back" onclick="javascript: parent.jQuery.fancybox.close();" style="float:left;" class="cta total">
  </div>
 
</div>
@endif
<script type="text/javascript">
	$('.select-tab').click(function(){
		var id = $(this).attr('data-id');
		//$('.select-tab').removeClass('manual');
		//$(this).addClass('manual');
		
		
		$('.select-tab').attr('aria-selected',false);
		$(this).attr('aria-selected',true);
		

		$('.content-tab').hide();
		$('#tabpanel-'+id).show();
	})
</script>