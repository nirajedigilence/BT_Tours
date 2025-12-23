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
  <h3 id="tablist-1">Change Hotel </h3>
  <p>Select hotel to replace or remove</p>
   <form id="addBookingForm" method="POST" action="{{route('save-deposit-amount')}}">
        {{csrf_field()}}
     	 <?php
     	 $cart_experience = 


DB::connection('mysql_veenus')->table('cart_experiences')->where('id',$cart_experience[0]->id)->first();
     	 $cart_detail = 


DB::connection('mysql_veenus')->table('carts')->selectRaw('carts.id,users.name,users.email')->join('users','carts.user_id','=','users.id')->where('carts.id', $cart_experience->carts_id)->first();
     $experienceDates = App\Models\Cms\ExperienceDate::where('dates_rates_id', $cart_experience->dates_rates_id)->where('experiences_id', $cart_experience->experiences_id)->orderBy('date_from','ASC')->get()->toArray();
$e_dates = array();
            if(!empty($experienceDates)){
                foreach ($experienceDates as $key => $value) {
                    if(!empty($value['dates_rates_id'])){

                        $e_dates['date_from'][] = strtotime($value['date_from']);
                        $e_dates['date_to'][] = strtotime($value['date_to']);
                        $e_dates[$value['dates_rates_id']]['date'][] = $value;
                    }
                } 
            }

            if ( !empty( $e_dates['date_from'] ) ) {
                $_dateMin = min($e_dates['date_from']);
            }else{
                $_dateMin = 0 ;
            }
            if ( !empty( $e_dates['date_to'] ) ) {
                 $_dateMax = max($e_dates['date_to']);
            }else{
                $_dateMax = 0 ;
            }
           
            $diff = $_dateMax - $_dateMin; 
            $nights = round($diff / 86400);
            $e_dates = array();

               if(!empty($experienceDates)){
                                foreach ($experienceDates as $key => $value) {
                                	
                                    if(!empty($value['dates_rates_id'])){
                                        $e_dates[$value['dates_rates_id']]['date_from'][] = strtotime($value['date_from']);
                                        $e_dates[$value['dates_rates_id']]['date_to'][] = strtotime($value['date_to']);
                                        $e_dates[$value['dates_rates_id']]['date'][] = $value;
                                    }
                                }
                            }
                            
                  if(!empty($e_dates)){
                                $i = 1;
                                foreach ($e_dates as $k => $val) {

                                    foreach ($val['date'] as $key => $value) {
                                        if(!empty($experience->еxperiencesToHotelsToExperienceDates)){
                                            foreach ($experience->еxperiencesToHotelsToExperienceDates as $key2 => $value2) {
                                                if(isset($value2->experienceDate->id) && $value2->experienceDate->id == $value['id']){
                                                    $hotel = $value2->hotel;
                                                    $hotel_date_id = $value2->experienceDate->hotel_date_id;
                                                    if(!empty($hotel_date_id))
                                                    {
                                                        $hotel_date = 


DB::connection('mysql_veenus')->table('hotel_dates')->where('id', $hotel_date_id)->first();
                                                    }
                                                    else
                                                    {
                                                        //get hotel date
                                                        $hotel_date = 


DB::connection('mysql_veenus')->table('hotel_dates')->where('hotel_id', $hotel->id)->where('date_in', $value['date_from'])->where('date_out', $value['date_to'])->first();
                                                    }
                                                   

                                                }
                                            }
                                            $i++;
                                        } ?>
            
       <div class="form-group">
        <div class="form-check">
			    		<div class="checkarea_part_Dates">
			                <label class="checkbox_div graycls" style="font-size: 13px;">
			                  <input type="checkbox" name="change_exp_new" class="custom_chkbox exp_checkbox tagchkbox notClickedCls " data-exptype="{{ $value['experience_type'] }}"  value="{{$value['id']}}"> <?php echo (!empty($hotel) ? $hotel->name : ''); ?> (<?=($value['experience_type'] == 1)?'Primary':(($value['experience_type'] == 2)?'Secondary ':'Overnight')?>)<span class="notClickedCls "></span>
			                  <span class="checkmark"></span>
			                </label>
			            </div>
			        </div>

        </div>
        <?php } } } ?>
         
           <!-- <div class="row"> 
        <div class="form-group">
        <input type="hidden" name="cart_exp_id" class="form-control"  value="{{!empty($cart_exp_id)?$cart_exp_id:''}}">
        
        <input type="submit" name="saveamount" value="Save" class="btn btn-warning btn-sm">
      
        </div>
    </div> -->
    <div style="clear:both;margin-left: 15px;"></div>
    <span class="expcheck_error" style="display:none;color: red;">Please select any hotel.</span>
         <span class="exptype_error" style="display:none;color: red;">You can not remove primary hotel.You can only replace it.</span>
         <div style="clear:both;margin-left: 15px;"></div>
        <input type="hidden" name="cart_exp_id" class="form-control"  value="{{!empty($cart_exp_id)?$cart_exp_id:''}}">
        
       <!--  <input type="submit" name="saveamount" value="Save" class="btn btn-warning btn-sm ml-2"> -->
       <input type="button" id="continue_page5" name="saveaddamount" value="Add Hotel" class="btn btn-warning btn-sm ml-2 orange-back">
        <input type="button" id="continue_page1" name="saveamount" value="Replace Hotel" class="btn btn-warning btn-sm ml-2 orange-back">

        <?php if(!empty($experienceDates[1])){ ?>
        <input type="button" id="remove_page1" name="removeexp" value="Remove Hotel" class="btn btn-warning btn-sm ml-2 red-back">
        <?php } ?><!-- onClick="(function(){
    $('.screen_2').show();$('.screen_1').hide();
})();return false;"  -->
	<!-- <input type="button" value="Cancel" onclick="javascript: parent.jQuery.fancybox.close();" style="float:left;" class="cta total"> -->
	</form>
</div>
<div class="screen_2" style="display:none;">
	
          <?php
            if(!empty($e_dates)){
                                $i = 1;
                                foreach ($e_dates as $k => $val) {

                                    foreach ($val['date'] as $key => $value) {
                                        if(!empty($experience->еxperiencesToHotelsToExperienceDates)){
                                            foreach ($experience->еxperiencesToHotelsToExperienceDates as $key2 => $value2) {
                                                if(isset($value2->experienceDate->id) && $value2->experienceDate->id == $value['id']){
                                                    $hotel = $value2->hotel;
                                                    $hotel_date_id = $value2->experienceDate->hotel_date_id;
                                                    if(!empty($hotel_date_id))
                                                    {
                                                        $hotel_date = 


DB::connection('mysql_veenus')->table('hotel_dates')->where('id', $hotel_date_id)->first();
                                                    }
                                                    else
                                                    {
                                                        //get hotel date
                                                        $hotel_date = 


DB::connection('mysql_veenus')->table('hotel_dates')->where('hotel_id', $hotel->id)->where('date_in', $value['date_from'])->where('date_out', $value['date_to'])->first();
                                                    }
                                                   

                                                }
                                            }
                                            $i++;
                                        } ?>
                 
                <div class="changeExpNew_{{$value['id']}} hotelDiv" style="display: none;">
					  <h3 id="tablist-1">Change Hotel -  <b><?php echo (!empty($hotel) ? $hotel->name : ''); ?> (<?=($value['experience_type'] == 1)?'Primary':(($value['experience_type'] == 2)?'Secondary ':'Overnight')?>)</b></h3>
					  <p>Select hotel to replace it with</p>
					  
					        {{csrf_field()}}
					     	
					            
					       <div class="form-group">
					       	<select class=" form-control expSelect_{{$value['id']}} expChange hotelDropDown select2" name="step3[{{$value['id']}}]"  required="" data-msg-required="Please select hotel" data-old-experience="{{$value['id']}}">
					                 <option value="">Select One</option>
	                                    <?php 
	                                        if(!empty($hotelList)){
	                                        foreach ($hotelList as $kk => $val) {
	                                            $selected = '';
	                                            if(isset($rec->hotel->id) && $rec->hotel->id == $val->id){
	                                                $selected = 'selected';
	                                            }
	                                         ?>
	                                            <option value="{{$val->id}}" {{$selected}}>{{$val->name}}</option>
	                                    <?php } } ?>
					            </select>
        					</div>
        					<div class="form-group">
                                        <label>Dates</label>
                                        <select class="form-control datesDropDown expDate_{{$value['id']}}" data-id="'+sum+'" name="step8[tour]['+sum+'][hotel][0][date]" required="">
                                            <option value="">-</option>
                                        </select>
                                        
                                    </div>
       			</div>
        <?php } } } ?>
         <span class="expselect_error" style="display:none;color: red;">Please select all new hotel and dates.</span>
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
	<h3 id="tablist-1">Change Hotel - Amemdements</h3>
	<p>You can see the amendments summary here, this will be visible by the collaborator as well.</p>
	<p>&nbsp;</p>
	
	 <?php
            if(!empty($e_dates)){
                                $i = 1;
                                foreach ($e_dates as $k => $val) {

                                    foreach ($val['date'] as $key => $value) {
                                        if(!empty($experience->еxperiencesToHotelsToExperienceDates)){
                                            foreach ($experience->еxperiencesToHotelsToExperienceDates as $key2 => $value2) {
                                                if(isset($value2->experienceDate->id) && $value2->experienceDate->id == $value['id']){
                                                    $hotel = $value2->hotel;
                                                    $hotel_date_id = $value2->experienceDate->hotel_date_id;
                                                    if(!empty($hotel_date_id))
                                                    {
                                                        $hotel_date = 


DB::connection('mysql_veenus')->table('hotel_dates')->where('id', $hotel_date_id)->first();
                                                    }
                                                    else
                                                    {
                                                        //get hotel date
                                                        $hotel_date = 


DB::connection('mysql_veenus')->table('hotel_dates')->where('hotel_id', $hotel->id)->where('date_in', $value['date_from'])->where('date_out', $value['date_to'])->first();
                                                    }
                                                   

                                                }
                                            }
                                            $i++;
                                        } ?>
                <div class="exp_div changeExpNew_{{$value['id']}}" style="display: none;">
					  
					  
					     	
					        
	                        <div class="tc_box_wrapper">
                            	<div class="tc_box">

	                                <div class="header">
	                                    Hotel :  (<?=($value['experience_type'] == 1)?'Primary':(($value['experience_type'] == 2)?'Secondary ':'Overnight')?>)
	                                    
	                                </div>

	                                <div class="body">
	                                  <!--  <label>Hotel name : <b><span class="exp_new"></span></b></label>
	                                   <label>Inclusions : Guided Tour</label>
	                                   <br> -->
	                                   <p>Hotel name :<?php echo (!empty($hotel) ? $hotel->name : ''); ?>  (<?php echo date('d/m/Y',strtotime($value['date_from']));?> - <?php echo date('d/m/Y',strtotime($value['date_to']));?>)</p>
	                                 
	                                 
	                                </div>

                                </div>

                            </div>
	                        <h5>Changed to : </h5>  
					        <div class="tc_box_wrapper">
	                            <div class="tc_box">

	                                <div class="header">
	                                    Hotel : <!-- <span class="exp_type"> </span> --> (Amended on {{date('d/m/Y')}})
	                                    
	                                </div>

	                                <div class="body">
	                                	
                                        
	                                   <p><span class="new_exp">Hotel name : <b><span class="exp_new"></span></b><span></p>
	                                   
	                                   <p>&nbsp;</p>
	                                   <p style="text-decoration: line-through !important; ">Hotel name : <b>><?php echo (!empty($hotel) ? $hotel->name : ''); ?>  (<?php echo date('d/m/Y',strtotime($value['date_from']));?> - <?php echo date('d/m/Y',strtotime($value['date_to']));?>)</b></p>
	                                  
	                                </div>

	                                </div>

	                            </div>
                           

       			</div>
        <?php } } } ?>
      
         <form method="post" enctype="multipart/form-data" action="{{ route('update-new-hotel-amend') }}" id="newAhemdDataHolder">		
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
						            <?php  $aaa['html'] = '
                <p>Good morning '.$cart_detail->name.',<br/><br/></p>
                <p>I hope you are well.</p>
               
                <p style="">Ref No. '.$cart_experience->id.' - ('.$cart_experience->experience_name.' '.date('d M Y', $_dateMin).' - '.date('d M Y', $_dateMax).' x '.$nights.' nights)</p>';
                
                $aaa['html'] .= '<p>For the below tour, please see any changes/amendments to the itinerary:</p> <p>[change_tour]</p>';
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
               
                $aaa['html'] .= '<p>Your <span style="color:#000000"><b>Hotel Tour Confirmation (ETC)</b></span> has been amended and is available to  <span style=""> <a style="text-decoration:underline;" href="'.URL('/tour-overview/'.$cart_experience->id).'"><b>view on VEGA</b></a></span></p>
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
        							<input type="hidden" name="new_exp" id="new_exp" value="" class="btn btn-warning btn-sm ml-2">
                                    <input type="hidden" name="new_date_exp" id="new_date_exp" value="" class="btn btn-warning btn-sm ml-2">
                                    
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
	<h3 id="tablist-1">Remove Hotel - Amemdements</h3>
	<p>You can see the amendments summary here, this will be visible by the collaborator as well.</p>
	<p>&nbsp;</p>
	
	 <?php
            if(!empty($e_dates)){
                                $i = 1;
                                foreach ($e_dates as $k => $val) {

                                    foreach ($val['date'] as $key => $value) {
                                        if(!empty($experience->еxperiencesToHotelsToExperienceDates)){
                                            foreach ($experience->еxperiencesToHotelsToExperienceDates as $key2 => $value2) {
                                                if(isset($value2->experienceDate->id) && $value2->experienceDate->id == $value['id']){
                                                    $hotel = $value2->hotel;
                                                    $hotel_date_id = $value2->experienceDate->hotel_date_id;
                                                    if(!empty($hotel_date_id))
                                                    {
                                                        $hotel_date = 


DB::connection('mysql_veenus')->table('hotel_dates')->where('id', $hotel_date_id)->first();
                                                    }
                                                    else
                                                    {
                                                        //get hotel date
                                                        $hotel_date = 


DB::connection('mysql_veenus')->table('hotel_dates')->where('hotel_id', $hotel->id)->where('date_in', $value['date_from'])->where('date_out', $value['date_to'])->first();
                                                    }
                                                   

                                                }
                                            }
                                            $i++;
                                        } ?>
                <div class="exp_div removeExpNew_{{$value['id']}}" style="display: none;">
					  
					  
					     	
					        
	                      
					        <div class="tc_box_wrapper">
	                            <div class="tc_box">

	                                <div class="header">
	                                    Hotel : <span class="exp_type"> </span> (Removed on {{date('d/m/Y')}})
	                                    
	                                </div>

	                                <div class="body">
	                                	
                                        
	                                 <!--   <p><span class="new_exp">Hotel name : <b><span class="exp_new"></span></b><span></p>
	                                   <p><span class="new_exp">Inclusions : <span class="exp_inclusions"> </span></p>
	                                   <p>&nbsp;</p> -->
	                                   <p style="text-decoration: line-through !important; ">Hotel name : <b><?php echo (!empty($hotel) ? $hotel->name : ''); ?> (<?=($value['experience_type'] == 1)?'Primary':(($value['experience_type'] == 2)?'Secondary ':'Overnight')?>)</b></p>
	                                   
	                                </div>

	                                </div>

	                            </div>
                           

       			</div>
        <?php } } } ?>
    
         <form method="post" enctype="multipart/form-data" action="{{ route('update-remove-hotel-amend') }}" id="removeAhemdDataHolder">		
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
						             <?php  $aaa['html'] = '
							                <p>Good morning '.$cart_detail->name.',<br/><br/></p>
							                <p>I hope you are well.</p>
							               
							                <p style="">Ref No. '.$cart_experience->id.' - ('.$cart_experience->experience_name.' '.date('d M Y', $_dateMin).' - '.date('d M Y', $_dateMax).' x '.$nights.' nights)</p>';
							                
							               $aaa['html'] .= '<p>For the below tour, please see any remove/amendments to the itinerary:</p> <p>[remove_tour]</p>';

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
							                $aaa['html'] .= '<p>Your <span style="color:#000000"><b>Hotel Tour Confirmation (ETC)</b></span> has been amended and is available to  <span style=""> <a style="text-decoration:underline;" href="'.URL('/tour-overview/'.$cart_experience->id).'"><b>view on VEGA</b></a></span></p>
							                ';
							                                                              
							                               
							                                
			                            ?>
								            <div class="col-md-12 mb-3 emailremove" style="display:none;">
								            	<textarea id="removeEmailContentField" name="email_content" class="form-control" rows="7" style="display: none;"><?php echo $aaa['html']; ?></textarea>
								            </div>
						        </div>
								<!-- <input type="button" value="Cancel" onClick="javascript: parent.jQuery.fancybox.close();" class="blueB">
								&nbsp;&nbsp; -->
								<!-- <input type="button" value="Continue" class="orangeB" id="showRoomss"> -->
								<input type="hidden" name="old_exp" id="old_exp" value="" class="btn btn-warning btn-sm ml-2">
								<input type="hidden" name="remove_exp" id="remove_exp" value="" class="btn btn-warning btn-sm ml-2">
        							<input type="hidden" name="new_exp" id="new_exp" value="" class="btn btn-warning btn-sm ml-2">
                                    <input type="hidden" name="new_date_exp" id="new_date_exp" value="" class="btn btn-warning btn-sm ml-2">
                                   
                                    
								<div style="clear:both;margin-left: 15px;"></div>
						        <input type="hidden" name="cart_exp_id" class="form-control"  value="{{!empty($cart_exp_id)?$cart_exp_id:''}}">
						        
						       <!--  <input type="submit" name="saveamount" value="Save" class="btn btn-warning btn-sm ml-2"> -->
						        <input type="submit" id="remove_page2" name="removeamount" value="Remove Hotel" class="btn btn-warning btn-sm ml-2 red-back" style="background-color:red">

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
                      <h3 id="tablist-1">Add Hotel</h3>
                        <div class="col-lg-12 p-3 review_div hotelDiv">
                      <p>Select hotel to add</p>
                      
                            {{csrf_field()}}
                            
                                
                            <div class="form-group">
                            <select class=" form-control expSelect_{{$value['id']}} expChange hotelDropDown select2" name="hotel_name" id="hotel_name"  required="" data-msg-required="Please select hotel" data-old-experience="{{$value['id']}}">
                                     <option value="">Select One</option>
                                        <?php 
                                            if(!empty($hotelList)){
                                            foreach ($hotelList as $kk => $val) {
                                                $selected = '';
                                                if(isset($rec->hotel->id) && $rec->hotel->id == $val->id){
                                                    $selected = 'selected';
                                                }
                                             ?>
                                                <option value="{{$val->id}}" {{$selected}}>{{$val->name}}</option>
                                        <?php } } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                        <label>Dates</label>
                                        <select class="form-control datesDropDown expDate_{{$value['id']}}" name="hotel_date" id="hotel_date" required="">
                                            <option value="">-</option>
                                        </select>
                                        
                                    </div>
                            <div class="form-group" style="display: inline-flex;width: 100%;margin-bottom:2px;">
                                <label style="font-weight: bold;color: black;width: 75px;font-size: 16px;margin-right: 10px;">Standard:</label>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="hotel_type" id="hotel_type1" value="1" required>
                                  <label class="form-check-label" for="hotel_type1" style="font-size: 0.98rem;color: #495057;">Standard</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="hotel_type" id="hotel_type2" value="0" required>
                                  <label class="form-check-label" for="hotel_type2" style="font-size: 0.98rem;color: #495057;">Upscale</label>
                                </div>
                            </div>
                            <div class="form-group" style="display: inline-flex;width: 100%;margin-bottom:2px;">
                                <label style="font-weight: bold;color: black;width: 75px;font-size: 16px;margin-right: 10px;">Type:</label>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="experience_type" id="experience_type1" value="1" required>
                                  <label class="form-check-label" for="experience_type1" style="font-size: 0.98rem;color: #495057;">Primary</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="experience_type" id="experience_type2" value="2" required>
                                  <label class="form-check-label" for="experience_type2" style="font-size: 0.98rem;color: #495057;">Secondary</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="experience_type" id="experience_type3" value="3" required>
                                  <label class="form-check-label" for="experience_type3" style="font-size: 0.98rem;color: #495057;">Overnight</label>
                                </div>
                            </div>
                             <span class="newexpcheck_error" style="display:none;color: red;">Please select hotel and other details.</span>
                </div>
                </div>
    <div style="clear:both;margin-left: 15px;"></div>
        <input type="hidden" name="cart_exp_id" class="form-control"  value="{{!empty($cart_exp_id)?$cart_exp_id:''}}">
        
       <!--  <input type="submit" name="saveamount" value="Save" class="btn btn-warning btn-sm ml-2"> -->
        <input type="button" id="add_page5" name="saveamount" value="Continue" class="btn btn-warning btn-sm ml-2">

        <input type="button" value="Back" onclick="$('.screen_5').hide();$('.screen_2').hide();$('.screen_3').hide();$('.screen_1').show();" style="float:left;" class="cta total">
    <!-- <input type="button" value="Cancel" onclick="javascript: parent.jQuery.fancybox.close();" style="float:left;" class="cta total"> -->
    
</div>
<div class="screen_6" style="display:none;">
    <h3 id="tablist-1">Change Hotel - Amemdements</h3>
    <p>You can see the amendments summary here, this will be visible by the collaborator as well.</p>
    <p>&nbsp;</p>
    
        <div class="tc_box_wrapper new_date" style="display:none;">
            <div class="tc_box">

                <div class="header">
                    Hotel : <!-- <span class="exp_type"> </span> --> (Amended on {{date('d/m/Y')}})
                    
                </div>

                <div class="body" id="new_date_div">
                    
                    
                   <p><span class="new_exp">Hotel name : <b><span class="new_hotel_name"></span></b><span></p>
                   <p><span class="new_exp">Hotel Date : <b><span class="new_hotel_date"></span></b><span></p>
                    <!-- <p><span class="new_exp">Standard : <b><span class="new_hotel_type"></span></b><span></p>
                     <p><span class="new_exp">Type : <b><span class="new_experience_type"></span></b><span></p> -->
                   
                  
                  
                </div>

                </div>

            </div>
         <form method="post" enctype="multipart/form-data" action="{{ route('update-add-hotel-amend') }}" id="addAhemdDataHolder">      
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
                                    <?php  $aaa['html'] = '
                <p>Good morning '.$cart_detail->name.',<br/><br/></p>
                <p>I hope you are well.</p>
               
                <p style="">Ref No. '.$cart_experience->id.' - ('.$cart_experience->experience_name.' '.date('d M Y', $_dateMin).' - '.date('d M Y', $_dateMax).' x '.$nights.' nights)</p>';
                
                $aaa['html'] .= '<p>For the below tour, please see any changes/amendments to the itinerary:</p> <p>[change_tour]</p>';
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
               
                $aaa['html'] .= '<p>Your <span style="color:#000000"><b>Hotel Tour Confirmation (ETC)</b></span> has been amended and is available to  <span style=""> <a style="text-decoration:underline;" href="'.URL('/tour-overview/'.$cart_experience->id).'"><b>view on VEGA</b></a></span></p>
                ';
                                                              
                               
                                
                                ?>
                                    <div class="col-md-12 mb-3 emailadd" style="display:none;">
                                        <textarea id="addEmailContentField" name="email_content" class="form-control" rows="7" style="display: none;"><?php echo $aaa['html']; ?></textarea>
                                    </div>
                                </div>
                                <!-- <input type="button" value="Cancel" onClick="javascript: parent.jQuery.fancybox.close();" class="blueB">
                                &nbsp;&nbsp; -->
                                <!-- <input type="button" value="Continue" class="orangeB" id="showRoomss"> -->
                                <input type="hidden" name="old_exp" id="old_exp" value="" class="btn btn-warning btn-sm ml-2">
                                    <input type="hidden" name="new_exp" id="new_exp" value="" class="btn btn-warning btn-sm ml-2">
                                    <input type="hidden" name="new_date_exp" id="new_date_exp" value="" class="btn btn-warning btn-sm ml-2">
                                     <input type="hidden" name="add_new_hotel" id="add_new_hotel" value="" class="btn btn-warning btn-sm ml-2">
                                    <input type="hidden" name="add_new_hotel_date" id="add_new_hotel_date" value="" class="btn btn-warning btn-sm ml-2">
                                    <input type="hidden" name="add_new_hotel_type" id="add_new_hotel_type" value="" class="btn btn-warning btn-sm ml-2">
                                    <input type="hidden" name="add_new_exp_type" id="add_new_exp_type" value="" class="btn btn-warning btn-sm ml-2">
                                <div style="clear:both;margin-left: 15px;"></div>
                                <input type="hidden" name="cart_exp_id" class="form-control"  value="{{!empty($cart_exp_id)?$cart_exp_id:''}}">
                                
                               <!--  <input type="submit" name="saveamount" value="Save" class="btn btn-warning btn-sm ml-2"> -->
                                <input type="submit" id="continue_page2" name="saveamount" value="Add Amendments" class="btn btn-warning btn-sm ml-2">

                                <input type="button" value="Back" onclick="$('.screen_5').show();$('.screen_1').hide();$('.screen_2').hide();$('.screen_3').hide();" style="float:left;" class="cta total">
                                

                            </form>
           <!-- <div class="row"> 
        <div class="form-group">
        <input type="hidden" name="cart_exp_id" class="form-control"  value="{{!empty($cart_exp_id)?$cart_exp_id:''}}">
        
        <input type="submit" name="saveamount" value="Save" class="btn btn-warning btn-sm">
      
        </div>
    </div> -->
    
    <!-- <input type="button" value="Cancel" onclick="javascript: parent.jQuery.fancybox.close();" style="float:left;" class="cta total"> -->
    
</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
       // $('.select2').select2();
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
	$("#remove_page1").bind("click", function(e){

		var checkalert1 = $('input[name="change_exp_new"]:checked').val();
		if(checkalert1 == undefined)
		{
			 $('.expcheck_error').show();
        	 return false;
		}
		else
		{
			var cnt_exptype = 0;
			$( ".exp_checkbox" ).each(function( index ) {
				var value = $(this).val();
				var exptype = $(this).attr('data-exptype');
				if(this.checked)
				{
				if(exptype == 1)
				{			
					cnt_exptype = 1;		
				}
				}
			});
		}
		if(cnt_exptype == 1)
		{
			 $('.exptype_error').show();
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
    var new_date_exp = $('#new_date_exp').val();
	var newstr = '';
    var newDatestr = '';
	var cnt = 0 ;
	$( ".exp_checkbox" ).each(function( index ) {
		var value = $(this).val();
		if(this.checked)
		{				
			$('.changeExpNew_'+value).show();
			str += value+",";
			var selvalue = $('.expSelect_'+value).val();
            var selDatevalue = $('.expDate_'+value).val();
            

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
            newDatestr += selDatevalue+",";

			
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
        $('#new_date_exp').val(newDatestr);
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
    $("#add_page5").bind("click", function(e){
        $('.exp_new_div').hide();
        $('#add_new_exp').val('');
        var hotel_name = $('#hotel_name option:selected').text();
        var hotel_id = $('#hotel_name').val();
        var hotel_date_id = $('#hotel_date').val()
        var hotel_date = $('#hotel_date option:selected').text();
        var hotel_type = $('input[name="hotel_type"]:checked').val();

        var experience_type = $('input[name="experience_type"]:checked').val();
        if(hotel_id == '' || hotel_date_id == '' || hotel_type == undefined || experience_type == undefined)
        {
             $('.newexpcheck_error').show();
             return false;
        }
        else
        {
        $('.screen_6').show();
        $('.screen_5').hide();
        $('.new_date').show();
        $('.screen_6 #add_new_hotel_date').val($('#hotel_date').val());
        $('.screen_6 #add_new_hotel').val($('#hotel_name').val());
        $('.screen_6 #add_new_hotel_type').val(hotel_type);
        $('.screen_6 #add_new_exp_type').val(experience_type);
        
        $('.screen_6 #new_date_div .new_hotel_name').text(hotel_name);
        $('.screen_6 #new_date_div .new_hotel_date').text(hotel_date);
        
       /* $('.new_date .new_hotel_type').text(hotel_type);
        $('.new_date .new_experience_type').text(experience_type);*/
        
          
    
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
    $('#addAhemdDataHolder .custom_chkbox').click(function(){
         if ($(this).val()==2){ 
            $('.emailadd').show();
        }
        else
        {
            $('.emailadd').hide();
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
				    url: "{{ route('update-remove-hotel-amend') }}",
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
				    url: "{{ route('update-new-hotel-amend') }}",
				    type: 'POST',
				    data: formData,
				    contentType: false,
		            processData: false,
				    success: function(data){
				        parent.jQuery.fancybox.close();
				        //parent.parent.jQuery.fancybox.close();
				        toastSuccess('Change Hotel Successfully.');
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
  $("body").on("submit", '#addAhemdDataHolder', function(e) {       
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
                    url: "{{ route('update-add-hotel-amend') }}",
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(data){
                        parent.jQuery.fancybox.close();
                        //parent.parent.jQuery.fancybox.close();
                        toastSuccess('Change Hotel Successfully.');
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
CKEDITOR.replace( 'addEmailContentField');
$(document).on('change', '.hotelDropDown', function() {
        var hotel_id = $(this).val();
        var addDates = $(this).closest('.hotelDiv').find('.datesDropDown');
        $('.loader').show();    
        $.ajax({
            url: base_url+'/super-user/hotel-dd-change',
            type: 'POST',
             // dataType: 'json',
            data: {'hotel_id':hotel_id},
            success: function(data) {
                $('.loader').hide(); 
                addDates.html(data.html);
            },
            error: function(e) {
            }
        });
    });
</script>