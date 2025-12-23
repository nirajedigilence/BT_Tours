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
  <h3 id="tablist-1">Change Crossing </h3>
  <p>Which crossing would you like to change</p>
   <form id="addBookingForm" method="POST" action="{{route('save-deposit-amount')}}">
        {{csrf_field()}}
        <div class="row mt-2">
     	<div class="form-group">
		        <div class="form-check">
		    		<div class="checkarea_part_Dates">
		                <label class="checkbox_div graycls" style="font-size: 13px;">
		                  <input type="radio" name="change_exp_new" class="custom_chkbox exp_checkbox tagchkbox notClickedCls " value=" {{ $cart_experience->crossing_inbound_data->id }}">{{ $cart_experience->crossing_inbound_data->route }}<span class="notClickedCls "></span>
		                  <span class="checkmark"></span>
		                </label>
		            </div>
		        </div>
        	</div>
        	</div>
        	<div class="row">
        	<div class="form-group">
		        <div class="form-check">
		    		<div class="checkarea_part_Dates">
		                <label class="checkbox_div graycls" style="font-size: 13px;">
		                  <input type="radio" name="change_exp_new" class="custom_chkbox exp_checkbox tagchkbox notClickedCls " value="{{ $cart_experience->crossing_outbound_data->id }}">{{ $cart_experience->crossing_outbound_data->route }}<span class="notClickedCls "></span>
		                  <span class="checkmark"></span>
		                </label>
		            </div>
		        </div>
        	</div>
        </div>
         <span class="expcheck_error" style="display:none;color: red;">Please select any crossing route.</span>
           <!-- <div class="row"> 
        <div class="form-group">
        <input type="hidden" name="cart_exp_id" class="form-control"  value="{{!empty($cart_exp_id)?$cart_exp_id:''}}">
        
        <input type="submit" name="saveamount" value="Save" class="btn btn-warning btn-sm">
      
        </div>
    </div> -->
    <div style="clear:both;margin-left: 15px;"></div>
        <input type="hidden" name="cart_exp_id" class="form-control"  value="{{!empty($cart_exp_id)?$cart_exp_id:''}}">
        
       <!--  <input type="submit" name="saveamount" value="Save" class="btn btn-warning btn-sm ml-2"> -->
        <input type="button" id="continue_page1" name="saveamount" value="Continue" class="btn btn-warning btn-sm ml-2 orange-back">
     <!--  <input type="button" id="continue_page5" name="saveaddamount" value="Add Experience" class="btn btn-warning btn-sm ml-2 orange-back"> -->
        <!-- <a class="btn btn-warning btn-sm ml-2 orange-back" data-fancybox data-type="ajax" data-src="" href="{{ route('add-experience', $cart_exp_id) }}" id="_reloadInfo{{$cart_exp_id}}">Add Experience</a> -->
        <!-- <input type="button" id="remove_page1" name="removeexp" value="Remove Experiences" class="btn btn-warning btn-sm ml-2 red-back"> --><!-- onClick="(function(){
    $('.screen_2').show();$('.screen_1').hide();
})();return false;"  -->
	<!-- <input type="button" value="Cancel" onclick="javascript: parent.jQuery.fancybox.close();" style="float:left;" class="cta total"> -->
	</form>
</div>
<div class="screen_2" style="display:none;">
	 	<div class="changeExpNew_in" style="display: block;">
					  <h3 id="tablist-1">Change Crossing - {{ $cart_experience->crossing_inbound_data->route }}</h3>
					  <p>Select crossing to replace it with</p>
					  
					        {{csrf_field()}}
					     	
					            
					       <div class="form-group">
					       	<select class=" form-control expSelect_in expChange" name="ship_crossings_in"  required="" data-msg-required="Please select experience" data-old-experience="{{$cart_experience->crossing_inbound_data->route}}">
					                <option value="">Select One</option>
					                <?php
					                // pr($vipList);
					                if(!empty($ship_crossings_in)){
					                    foreach ($ship_crossings_in as $key => $value) {
					                    	if($cart_experience->crossing_inbound_data->id != $value->id)
					                    	{
					                    		
						                        echo '<option value="'.$value->id.'" >'.$value->route.'</option>';
					                    	}
					                    }
					                }
					                ?>  
					            </select>
        					</div>
       			</div>
       			<div class="changeExpNew_out" style="display: none;">
					  <h3 id="tablist-1">Change Crossing - {{ $cart_experience->crossing_outbound_data->route }}</h3>
					  <p>Select crossing to replace it with</p>
					  
					        {{csrf_field()}}
					     	
					            
					       <div class="form-group">
					       	<select class=" form-control expSelect_out expChange" name="ship_crossings_out"  required="" data-msg-required="Please select experience" data-old-experience="{{$cart_experience->crossing_outbound_data->id}}">
					                <option value="">Select One</option>
					                <?php
					                // pr($vipList);
					                if(!empty($ship_crossings_out)){
					                    foreach ($ship_crossings_out as $key => $value) {
					                    	if($cart_experience->crossing_outbound_data->id != $value->id)
					                    	{
					                    		
						                        echo '<option value="'.$value->id.'" >'.$value->route.'</option>';
					                    	}
					                    }
					                }
					                ?>  
					            </select>
        					</div>
       			</div>
         
           <!-- <div class="row"> 
        <div class="form-group">
        <input type="hidden" name="cart_exp_id" class="form-control"  value="{{!empty($cart_exp_id)?$cart_exp_id:''}}">
        
        <input type="submit" name="saveamount" value="Save" class="btn btn-warning btn-sm">
      
        </div>
    </div> -->
    <div style="clear:both;margin-left: 15px;"></div>
        <input type="hidden" name="cart_exp_id" class="form-control"  value="{{!empty($cart_exp_id)?$cart_exp_id:''}}">
        
       <!--  <input type="submit" name="saveamount" value="Save" class="btn btn-warning btn-sm ml-2"> -->
        <input type="button" id="continue_page2" name="saveamount" value="Continue" class="btn btn-warning btn-sm ml-2">

        <input type="button" value="Back" onclick="$('.screen_2').hide();$('.screen_3').hide();$('.screen_1').show();" style="float:left;" class="cta total">
	<!-- <input type="button" value="Cancel" onclick="javascript: parent.jQuery.fancybox.close();" style="float:left;" class="cta total"> -->
	
</div>
<div class="screen_3" style="display:none;">
	<h3 id="tablist-1">Change Crossing - Amemdements</h3>
	<p>You can see the amendments summary here, this will be visible by the collaborator as well.</p>
	<p>&nbsp;</p>
	
	 <div class="exp_div changeExpNew" >
					  
					  
					     	
					        
	                        <div class="tc_box_wrapper">
                            	<div class="tc_box">

	                                <div class="header">
	                                    Crossings
	                                    
	                                </div>

	                                <div class="body">
	                                	<?php 
	                                	$ship_data = get_ship_date($cart_experience->id);
                                        $crossing_inbound  = $cart_experience->crossing_inbound_data->overnight;
                                        $crossing_outbound = $cart_experience->crossing_outbound_data->overnight;
                                        $overnight_inbound = $cart_experience->overnight_inbound;
                                        $overnight_outbound = $cart_experience->overnight_outbound;
                                        $start_date = date('Y-m-d',strtotime($ship_data['date_from_org']));
                                        $end_date = date('Y-m-d',strtotime($ship_data['date_to_org']));
                                        //Inbound
                                        if(!empty($overnight_inbound))
                                        {
                                            $overnight_inbound_start_date = date('Y-m-d', strtotime($start_date. ' - '.$overnight_inbound.' days'));
                                        }
                                        else
                                        {
                                            $overnight_inbound_start_date = $start_date;
                                        }
                                        if(!empty($crossing_inbound))
                                        {
                                            $crossing_inbound_start_date = date('Y-m-d', strtotime($overnight_inbound_start_date. ' - '.$overnight_inbound.' days'));
                                        }
                                        else
                                        {
                                            $crossing_inbound_start_date = $overnight_inbound_start_date;
                                        }
                                        //outbound
                                        if(!empty($overnight_outbound))
                                        {
                                            $overnight_outbound_end_date = date('Y-m-d', strtotime($end_date. ' + '.$overnight_outbound.' days'));
                                        }
                                        else
                                        {
                                            $overnight_outbound_end_date = $end_date;
                                        }
                                        if(!empty($crossing_outbound))
                                        {
                                            $crossing_outbound_end_date = date('Y-m-d', strtotime($overnight_outbound_end_date. ' + '.$overnight_outbound.' days'));
                                        }
                                        else
                                        {
                                            $crossing_outbound_end_date = $overnight_outbound_end_date;
                                        }
                                        ?>
	                                   <p><b>Crossing inbound:</b> {{$cart_experience->crossing_inbound_data->route}}</p>
                                        <p><b>Date:</b> {{date("D d M",strtotime($crossing_inbound_start_date))}} - {{date("D d M 'y",strtotime($overnight_inbound_start_date))}}</p>
                                        <p><b>Crossing outbound:</b> {{$cart_experience->crossing_outbound_data->route}}</p>
                                        <p><b>Date:</b> {{date("D d M",strtotime($crossing_outbound_end_date))}} - {{date("D d M 'y",strtotime($overnight_outbound_end_date))}} </p>
	                                 
	                                </div>

                                </div>

                            </div>
	                        <h5>Changed to : </h5>  
					        <div class="tc_box_wrapper">
	                            <div class="tc_box">

	                                <div class="header">
	                                    Crossing : <span class="exp_type"> </span> (Amended on {{date('d/m/Y')}})
	                                    
	                                </div>

	                                <div class="body">
	                                	
                                       <div class="body">
		                                   <p><b>Crossing inbound:</b> {{$cart_experience->crossing_inbound_data->route}}</p>
	                                        <p><b>Date:</b> {{date("D d M",strtotime($crossing_inbound_start_date))}} - {{date("D d M 'y",strtotime($overnight_inbound_start_date))}}</p>
	                                        <br/>
	                                        <p style="text-decoration: line-through !important; "><b>Crossing outbound:</b> {{$cart_experience->crossing_outbound_data->route}}</p>
	                                        <p style="text-decoration: line-through !important; "><b>Date:</b> {{date("D d M",strtotime($crossing_outbound_end_date))}} - {{date("D d M 'y",strtotime($overnight_outbound_end_date))}} </p>
		                                 
		                                </div> 
	                                  
	                                </div>

	                                </div>

	                            </div>
                           

       			</div>
    	<div id="new_exp_div">
    		<?php     if(!empty($expList)){
					                    foreach ($expList as $key => $valueEE) {?>
    		 <div class="exp_new_div addExpNew_{{$valueEE->id}}" style="display: none;">
					 
					        <div class="tc_box_wrapper">
	                            <div class="tc_box">

	                                <div class="header">
	                                    New Experience : <span class="exp_type"> </span> (Amended on {{date('d/m/Y')}})
	                                    
	                                </div>

	                                <div class="body">
	                                	
                                        
	                                
	                                   <p>Experience name : <b>{{ $valueEE->name }}</b></p>
	                                   <?php 
                                        if(!empty($valueEE->inclusions)){
                                            $unserl1 = unserialize($valueEE->inclusions);
                                            ?>
                                            <p >Inclusions: <strong><?php echo implode(', ', $unserl1); ?></strong></p>
                                        <?php } ?>
	                                </div>

	                                </div>

	                            </div>
                           

       			</div>
       		<?php } } ?>
    	</div>
         <form method="post" enctype="multipart/form-data" action="{{ route('update-new-exp-amend') }}" id="newAhemdDataHolder">		
								{{ csrf_field() }}								
								    <div class="row">
								    	<div class="col-sm-12">
									    	<div class="form-group " >
											    <label class="graycls">Amendments text</label>
									    		<textarea name="amendement_text" id="amendement_text" class="form-control" rows="3"></textarea>
									  		</div>
								  		</div>
								    </div>
								    <div class="row">
								    	<div class="col-sm-12">
									    	<div class="form-group " >
											    <label class="graycls">Upload files</label>
									    		<input type="file" multiple id="amend_file" accept=".pdf,.doc,.xlsx,.csv"  style="max-width: 500px;" name="amend_file[]" min="0" max="10"id="amend_file">
									  		</div>
								  		</div>
								    </div>

								     
									<div class="row">
						            <div class="col-sm-12">
						                <div class="form-group">
						                    <label class="graycls" for="">Would you like to alert the collaborator about any changes? <span style="color:red;">*</span></label>
						                    
						                </div>
						                <div class="check_row">
						                    <div class="fl_w">
						                       
						                            <div class="checkarea_part">
						                                <label class="checkbox_div">
						                                  <input type="radio" name="alert" class="custom_chkbox tagchkbox" value="1" data-val="1"> Alert
						                                  <span class="checkmark"></span>
						                                </label>
						                            </div>
						                             <div class="checkarea_part">
						                                <label class="checkbox_div">
						                                  <input type="radio" name="alert" class="custom_chkbox tagchkbox" value="2" data-val="2"> Alert and Email
						                                  <span class="checkmark"></span>
						                                </label>
						                            </div>
						                             <div class="checkarea_part">
						                                <label class="checkbox_div">
						                                  <input type="radio" name="alert" class="custom_chkbox tagchkbox" value="3" data-val="3"> Do not email or alert
						                                  <span class="checkmark"></span>
						                                </label>
						                            </div>
						                       
						                    </div>
						                </div>
						                <span class="alert_error" style="display:none;color: red;">Please select any option.</span>
						            </div>
						            <?php $aaa['html'] = ''; /*$aaa['html'] = '
                <p>Good morning '.$cart_detail->name.',<br/><br/></p>
                <p>I hope you are well.</p>
               
                <p style="">Ref No. '.$cart_experience->id.' - ('.$cart_experience->experience_name.' '.date('d M Y', $cart_experience->date_from).' - '.date('d M Y', $cart_experience->date_to).' x '.$nights.' nights)</p>';
                
                $aaa['html'] .= '<p>For the below tour, please see any changes/amendments to the itinerary:</p> <p>[change_tour]</p>';*/
                 /* if(!empty($exp_array)){
                 	 $aaa['html'] .= '<p><table cellpadding="10" style="">
		                <tr style="background-color:#14213D;padding:5px;color:#ffffff;">
		                <td style="border:1px solid #14213D;color:#ffffff;">WAS</td>
		                <td style="border:1px solid #14213D;color:#ffffff;">NOW</td>
		                </tr>';
		                foreach($exp_array as $attraction_name)
		                {
		                	 $aaa['html'] .= '<tr class="changeExpNew_'.$attraction_name->id.'">
                        <td style="border:1px solid #cccccc;">'.$attraction_name->name.'</td>
                        <td style="border:1px solid #cccccc;" class="exp_new"></td>
                        </tr>';
		                }
		               
		                $aaa['html'] .= '</table></p>';
                }*/
               
                $aaa['html'] .= '<p>Your <span style="color:#000000"><b>Experience Tour Confirmation (ETC)</b></span> has been amended and is available to  <span style=""> <a style="text-decoration:underline;" href="'.URL('/tour-overview/'.$cart_experience->id).'"><b>view on VEGA</b></a></span></p>
                ';
                ?>
			            <div class="col-md-12 mb-3 emailexp" style="display:none;">
			            	<textarea id="emailContentField" name="email_content" class="form-control" rows="7" style="display: none;"><?php echo $aaa['html']; ?></textarea>
			            </div>
			        </div>
					<!-- <input type="button" value="Cancel" onClick="javascript: parent.jQuery.fancybox.close();" class="blueB">
					&nbsp;&nbsp; -->
					<!-- <input type="button" value="Continue" class="orangeB" id="showRoomss"> -->
					<input type="hidden" name="old_exp" id="old_exp" value="" class="btn btn-warning btn-sm ml-2">
					<input type="hidden" name="add_new_exp" id="add_new_exp" value="" class="btn btn-warning btn-sm ml-2">
						<input type="hidden" name="new_exp" id="new_exp" value="" class="btn btn-warning btn-sm ml-2">
					<div style="clear:both;margin-left: 15px;"></div>
			        <input type="hidden" name="cart_exp_id" class="form-control"  value="{{!empty($cart_exp_id)?$cart_exp_id:''}}">
			        
			       <!--  <input type="submit" name="saveamount" value="Save" class="btn btn-warning btn-sm ml-2"> -->
			        <input type="submit" id="continue_page2" name="saveamount" value="Add Amendments" class="btn btn-warning btn-sm ml-2">

			        <input type="button" value="Back" onclick="$('.screen_2').show();$('.screen_1').hide();$('.screen_3').hide();" style="float:left;" class="cta total">
					

				</form>
           <!-- <div class="row"> 
        <div class="form-group">
        <input type="hidden" name="cart_exp_id" class="form-control"  value="{{!empty($cart_exp_id)?$cart_exp_id:''}}">
        
        <input type="submit" name="saveamount" value="Save" class="btn btn-warning btn-sm">
      
        </div>
    </div> -->
    
	<!-- <input type="button" value="Cancel" onclick="javascript: parent.jQuery.fancybox.close();" style="float:left;" class="cta total"> -->
	
</div>
 <div class="screen_4" style="display:none;">
	<h3 id="tablist-1">Remove Experience - Amemdements</h3>
	<p>You can see the amendments summary here, this will be visible by the collaborator as well.</p>
	<p>&nbsp;</p>
	
	 <?php
            $cnt = 1;
            $exp_array = array();

            foreach($items as $key => $cartItem){
            foreach($cartItem->cartExperiences as $item){
            	if($item->id == $cart_exp_id)
            	{
            	$k=0;
             foreach ($item->cartExperiencesToAttraction as $keyEE => $_valueEE) { 
                 $valueEE = 


DB::connection('mysql_veenus')->table('attractions')->where("id", $_valueEE->attractions_id)->first();

            $exp_array[$k]=$valueEE;
                 $type = $valueEE->type_id;
                 if($type == 1){ $exp_type  = 'VIP';}else if($type == 2){ $exp_type  = 'Big Banner';}else{ $exp_type  = 'Local';} ?>
                <div class="exp_div removeExpNew_{{$valueEE->id}}" style="display: none;">
					  
					  
					     	
					        
	                      
					        <div class="tc_box_wrapper">
	                            <div class="tc_box">

	                                <div class="header">
	                                    Experience : <span class="exp_type"> </span> (Removed on {{date('d/m/Y')}})
	                                    
	                                </div>

	                                <div class="body">
	                                	
                                        
	                                 <!--   <p><span class="new_exp">Experience name : <b><span class="exp_new"></span></b><span></p>
	                                   <p><span class="new_exp">Inclusions : <span class="exp_inclusions"> </span></p>
	                                   <p>&nbsp;</p> -->
	                                   <p style="text-decoration: line-through !important; ">Experience name : <b>{{ $valueEE->name }}</b></p>
	                                   <?php 
                                        if(!empty($valueEE->inclusions)){
                                            $unserl1 = unserialize($valueEE->inclusions);
                                            ?>
                                            <p style="text-decoration: line-through; !important">Inclusions: <strong><?php echo implode(', ', $unserl1); ?></strong></p>
                                        <?php } ?>
	                                </div>

	                                </div>

	                            </div>
                           

       			</div>
        <?php } } } }?>
    
         <form method="post" enctype="multipart/form-data" action="{{ route('update-remove-exp-amend') }}" id="removeAhemdDataHolder">		
								{{ csrf_field() }}								
								    <div class="row">
								    	<div class="col-sm-12">
									    	<div class="form-group " >
											    <label class="graycls">Amendments text</label>
									    		<textarea name="amendement_text" id="amendement_text" class="form-control" rows="3"></textarea>
									  		</div>
								  		</div>
								    </div>
								    <div class="row">
								    	<div class="col-sm-12">
									    	<div class="form-group " >
											    <label class="graycls">Upload files</label>
									    		<input type="file" multiple id="amend_file" accept=".pdf,.doc,.xlsx,.csv"  style="max-width: 500px;" name="amend_file[]" min="0" max="10"id="amend_file">
									  		</div>
								  		</div>
								    </div>

								     
									<div class="row">
						            <div class="col-sm-12">
						                <div class="form-group">
						                    <label class="graycls" for="">Would you like to alert the collaborator about any changes? <span style="color:red;">*</span></label>
						                </div>
						                <div class="check_row">
						                    <div class="fl_w">
						                       
						                            <div class="checkarea_part">
						                                <label class="checkbox_div">
						                                  <input type="radio" name="alert" class="custom_chkbox tagchkbox" value="1" data-val="1"> Alert
						                                  <span class="checkmark"></span>
						                                </label>
						                            </div>
						                             <div class="checkarea_part">
						                                <label class="checkbox_div">
						                                  <input type="radio" name="alert" class="custom_chkbox tagchkbox" value="2" data-val="2"> Alert and Email
						                                  <span class="checkmark"></span>
						                                </label>
						                            </div>
						                             <div class="checkarea_part">
						                                <label class="checkbox_div">
						                                  <input type="radio" name="alert" class="custom_chkbox tagchkbox" value="3" data-val="3"> Do not email or alert
						                                  <span class="checkmark"></span>
						                                </label>
						                            </div>
						                       
						                    </div>
						                </div>
						                <span class="alert_error" style="display:none;color: red;">Please select any option.</span>
						            </div>
						             <?php $aaa['html']=''; /*$aaa['html'] = '
							                <p>Good morning '.$cart_detail->name.',<br/><br/></p>
							                <p>I hope you are well.</p>
							               
							                <p style="">Ref No. '.$cart_experience->id.' - ('.$cart_experience->experience_name.' '.date('d M Y', $cart_experience->date_from).' - '.date('d M Y', $cart_experience->date_to).' x '.$nights.' nights)</p>';
							                
							               $aaa['html'] .= '<p>For the below tour, please see any remove/amendments to the itinerary:</p> <p>[remove_tour]</p>';
*/
							                /*if(!empty($exp_array)){
						                 	 $aaa['html'] .= '<p><table cellpadding="10" style="">
								                <tr style="background-color:#14213D;padding:5px;color:#ffffff;">
								                <td style="border:1px solid #14213D;color:#ffffff;">Removed Experience</td>
								                </tr>';
								                foreach($exp_array as $attraction_name)
								                {
								                	 $aaa['html'] .= '<tr class="removeExpNew_'.$attraction_name->id.'">
						                        <td style="border:1px solid #cccccc;">'.$attraction_name->name.'</td>
						                        </tr>';
								                }
								               
								                $aaa['html'] .= '</table></p>';
						                }*/
							                $aaa['html'] .= '<p>Your <span style="color:#000000"><b>Experience Tour Confirmation (ETC)</b></span> has been amended and is available to  <span style=""> <a style="text-decoration:underline;" href="'.URL('/tour-overview/'.$cart_experience->id).'"><b>view on VEGA</b></a></span></p>
							                ';
							                                                              
							                               
							                                
			                            ?>
								            <div class="col-md-12 mb-3 emailremove" style="display:none;">
								            	<textarea id="removeEmailContentField" name="email_content" class="form-control" rows="7" style="display: none;"><?php echo $aaa['html']; ?></textarea>
								            </div>
						        </div>
								<!-- <input type="button" value="Cancel" onClick="javascript: parent.jQuery.fancybox.close();" class="blueB">
								&nbsp;&nbsp; -->
								<!-- <input type="button" value="Continue" class="orangeB" id="showRoomss"> -->
								
									
								<input type="hidden" name="remove_exp" id="remove_exp" value="" class="btn btn-warning btn-sm ml-2">
        						<input type="hidden" name="new_exp" id="new_exp" value="" class="btn btn-warning btn-sm ml-2">
								<div style="clear:both;margin-left: 15px;"></div>
						        <input type="hidden" name="cart_exp_id" class="form-control"  value="{{!empty($cart_exp_id)?$cart_exp_id:''}}">
						        
						       <!--  <input type="submit" name="saveamount" value="Save" class="btn btn-warning btn-sm ml-2"> -->
						        <input type="submit" id="remove_page2" name="removeamount" value="Remove Experiences" class="btn btn-warning btn-sm ml-2 red-back" style="background-color:red">

						        <input type="button" value="Back" onclick="$('.screen_1').show();$('.screen_4').hide();$('.screen_3').hide();$('.screen_2').hide();" style="float:left;" class="cta total">
								

							</form>
           <!-- <div class="row"> 
        <div class="form-group">
        <input type="hidden" name="cart_exp_id" class="form-control"  value="{{!empty($cart_exp_id)?$cart_exp_id:''}}">
        
        <input type="submit" name="saveamount" value="Save" class="btn btn-warning btn-sm">
      
        </div>
    </div> -->
    
	<!-- <input type="button" value="Cancel" onclick="javascript: parent.jQuery.fancybox.close();" style="float:left;" class="cta total"> -->
	
</div>
<div class="screen_5" style="display:none;">
	 <div class="changeExpNew">
					  <h3 id="tablist-1">Add Experience</h3>
					    <div class="col-lg-12 p-3 review_div">
					  <p>Select crossing to add</p>
					  
					        {{csrf_field()}}
					     	
					            
					       <div class="form-group">
					       	<select class=" form-control addExp " name="addExp" id="addExp"  required="" data-msg-required="Please select experience"  >
					                <option value="">Select One</option>
					               
					                <?php if(!empty($ship_crossings_in[0])){
                                        foreach($ship_crossings_in as $srow){
                                            if($srow->in_out == 'Out'){
                                                ?>
                                                <option value="{{$srow->id}}">{{$srow->route}}</option>
                                                <?php
                                            }
                                        }
                                    } ?>
					            </select>
        					</div>
        					 <span class="newexpcheck_error" style="display:none;color: red;">Please select any experience.</span>
       			</div>
       			</div>
    <div style="clear:both;margin-left: 15px;"></div>
        <input type="hidden" name="cart_exp_id" class="form-control"  value="{{!empty($cart_exp_id)?$cart_exp_id:''}}">
        
       <!--  <input type="submit" name="saveamount" value="Save" class="btn btn-warning btn-sm ml-2"> -->
        <input type="button" id="add_page5" name="saveamount" value="Continue" class="btn btn-warning btn-sm ml-2">

        <input type="button" value="Back" onclick="$('.screen_5').hide();$('.screen_2').hide();$('.screen_3').hide();$('.screen_1').show();" style="float:left;" class="cta total">
	<!-- <input type="button" value="Cancel" onclick="javascript: parent.jQuery.fancybox.close();" style="float:left;" class="cta total"> -->
	
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
	
	$("#continue_page5").bind("click", function(e){
		$('.screen_5').show();
		$('.screen_1').hide();
	});
	$("#continue_page1").bind("click", function(e){

		var checkalert1 = $('input[name="change_exp_new"]:checked').val();
		if(checkalert1 == undefined)
		{
			 $('.expcheck_error').show();
        	 return false;
		}
		else
		{
		$('.screen_2').show();
		$('.screen_1').hide();
		var old_exp = $('#old_exp').val();
		var str = '';
		$( ".exp_checkbox" ).each(function( index ) {
			var value = $(this).val();
			if(this.checked)
			{		
				$('.changeExpNew_'+value).show();

				str += value+",";

				
			}
			else
			{
				$('.changeExpNew_'+value).hide();
			}
		  
		});
		$('#old_exp').val(str);
		}
	});
	$("#add_page5").bind("click", function(e){
		$('.exp_new_div').hide();
		$('#add_new_exp').val('');
		var checkalert1 = $('#addExp').val();
		if(checkalert1 == '')
		{
			 $('.newexpcheck_error').show();
        	 return false;
		}
		else
		{
		$('.screen_3').show();
		$('.screen_5').hide();
		$('#add_new_exp').val(checkalert1);
		var string = checkalert1 + '';
		var valNew=string.split(',');
		$.each(valNew, function(index, value) { 
		    $('.addExpNew_'+value).show();
		});
		  
	
		}
	});
	$("#remove_page1").bind("click", function(e){

		var checkalert1 = $('input[name="change_exp_new"]:checked').val();
		if(checkalert1 == undefined)
		{
			 $('.expcheck_error').show();
        	 return false;
		}
		else
		{
		$('.screen_4').show();
		$('.screen_1').hide();
		var remove_exp = $('#remove_exp').val();
		var str = '';
		$( ".exp_checkbox" ).each(function( index ) {
			var value = $(this).val();
			if(this.checked)
			{		
				$('.removeExpNew_'+value).show();

				str += value+",";

				
			}
			else
			{
				$('.removeExpNew_'+value).hide();
			}
		  
		});
		$('#remove_exp').val(str);
		}
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
	$('#newAhemdDataHolder .custom_chkbox').click(function(){
		 if ($(this).val()==2){ 
	        $('.emailexp').show();
	    }
	    else
	    {
	    	$('.emailexp').hide();
	    }
	})
	$('#removeAhemdDataHolder .custom_chkbox').click(function(){
		 if ($(this).val()==2){ 
	        $('.emailremove').show();
	    }
	    else
	    {
	    	$('.emailremove').hide();
	    }
	})
	$("body").on("submit", '#removeAhemdDataHolder', function(e) {       
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
				    url: "{{ route('update-remove-exp-amend') }}",
				    type: 'POST',
				    data: formData,
				    contentType: false,
		            processData: false,
				    success: function(data){
				        parent.jQuery.fancybox.close();
				        //parent.parent.jQuery.fancybox.close();
				        toastSuccess('Remove Experience Successfully.');
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
 $("body").on("submit", '#newAhemdDataHolder', function(e) {       
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
 //ckditor
 $('#emailContentField').ck
CKEDITOR.replace( 'emailContentField');
CKEDITOR.replace( 'removeEmailContentField');

</script>