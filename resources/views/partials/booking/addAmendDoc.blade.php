<div class="row"><div class="col-md-12"><button type="button" class="close" data-dismiss="modal" aria-label="Close" style="
    float: right;
    border: 1px solid #ccc;
    padding: 2px 5px;
    border-radius: 4px;
"><span aria-hidden="true">×</span></button></div></div>
<div>
	<style type="text/css">
		h2 {
	   
		    color: #212529;
		    margin-bottom: 10px;
		}
		h5 {
	   
		    color: #000;
		    margin-bottom: 5px;
		}
	</style>
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
?>
	<h2>
		Save changes - Amendments
	</h2>
	<h5>
		You can add the amendments summary here, this will be visible by collaborator as well.
	</h5>
	
	<br />
	
	<form method="post" enctype="multipart/form-data" action="{{ route('add-rooms-detail') }}" id="ahemdDataHolder">
		
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
                <p>Hi '.$cart_detail->name.',<br/><br/></p>
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
               
                $aaa['html'] .= '<p>Your <span style="color:#000000">Please note that changes have been made to the above tour and your amended Experience Tour Confirmation (ETC) is available to view on  <span style=""> <a style="text-decoration:underline;" href="'.URL('/tour-overview/'.$cart_experience->id).'"><b> VEGA</b></a></span></p>
                <p>If you have any questions, please do not hesitate to contact us.</p>
                ';
                                                              
                               
                                
                                ?>
						            <div class="col-md-12 mb-3 emailexp" style="display:none;">
						            	<textarea id="emailContentField" name="email_content" class="form-control" rows="7" style="display: none;"><?php echo $aaa['html']; ?></textarea>
						            </div>
        </div>
		<!-- <input type="button" value="Cancel" onClick="javascript: parent.jQuery.fancybox.close();" class="blueB">
		&nbsp;&nbsp; -->
		<!-- <input type="button" value="Continue" class="orangeB" id="showRoomss"> -->
		<input type="hidden" value="{{$cart_experience->id}}" name="cart_id">
		<input type="submit" value="Save amendment with comment" id="addAmendement" class="orangeB" id="">
		<br/>
		<p style="margin-top:10px;font-size: 16px;color: #000000;">If the amendment note is not needed, you can also skip this step. (This won't add amendments or alert collaborators)</p>
		<br/>
		
		<a href="javascript:;" class="blueB" id="saveEtcForm" style="width: auto;">
                            Save amendment without comment 
                        </a>

	</form>
</div>
<style>
	#addRooms{
		display: none;
	}
	.greyText{
		text-align: left;
		font: normal normal normal 14px/18px Montserrat;
		letter-spacing: 0px;
		color: #CFCFCF;
		opacity: 1;
	}
	.roomHolder{
		repeat padding-box;
		box-shadow: 0px 3px 6px #00000029;
		border: 1px solid #CFCFCF;
		opacity: 1;
		padding: 10px;
		margin-bottom: 20px;
		display: none;
	}
	.orangeB{
			background-color: #FCA311;
	    color: white;
	    padding: 12px 20px;
	    border: none;
	    border-radius: 4px;
	    cursor: pointer;
	    display: inline-block;
	    width: auto;
	    	
	}
	.blueB{
			background-color: #14213D;
	    color: white;
	    padding: 12px 20px;
	    border: none;
	    border-radius: 4px;
	    cursor: pointer;
	    display: inline-block;
	    width: auto;
	    	
	}
	.butHolder{
		display: flex;
		justify-content: flex-start;
		width: 50%;
	}
	.butHolder .orangeLink{
		margin-right: 20px;
		float: left;
		font-size: 12px;
	}
	.tab {
	  overflow: hidden;
	  background-color: #fff;
	  border-bottom: 0xp solid;
	}

	/* Style the buttons that are used to open the tab content */
	.tab button {
	  background-color: inherit;
	  float: left;
	  border: none;
	  outline: none;
	  cursor: pointer;
	  padding: 14px 16px;
	  transition: 0.3s;
	  border: 1px solid #000;
	}

	/* Change background color of buttons on hover */
	.tab button:hover {
	  background-color: #ddd;
	  border-bottom: 0px solid;
	}

	/* Create an active/current tablink class */
	.tab button.active {
	  background-color: #ccc;
	  border-bottom: 0px solid;
	}

	/* Style the tab content */
	.tabcontent {
	  display: none;
	  padding: 6px 12px;
	  border: 1px solid #ccc;
	  border-top: none;
	}
</style>


<script>
	$("#showRoomss").bind('click', function(e){
		$("#numRoomsAdd").css("display", "none");
		$(this).css("display", "none");
		$("#addRooms").css("display", "inline-block");
		
		var i;
		for (i = 1; i <= $("#numRoomsAdd").val(); i++) {
		  $("#roomHolderNew"+i).css("display", "block");
		  $("#roomHolderNew"+i).removeClass('notReqCls');
		}
	   	$(".notReqCls").remove();		
	});
	var limitFiles = 10;
	$(document).ready(function(){ 
    $('#amend_file').change(function(){
		//$("body").on("change", '#amend_file', function(e) {   
		
        var files = $(this)[0].files;
		
        if(files.length > limitFiles){
            alert("You can select max "+limitFiles+" Files.");
            $('#amend_file').val('');
            return false;
        }else{
            return true;
        }
    });
    });
	//$("#addAmendement").bind("click", function(e){
		$("body").on("submit", '#ahemdDataHolder', function(e) {       
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
				    url: "{{ route('add-amend-detail') }}",
				    type: 'POST',
				    data: formData,
				    contentType: false,
		            processData: false,
				    success: function(data){
				        //parent.jQuery.fancybox.close();
				        //parent.parent.jQuery.fancybox.close();
				        //toastSuccess('Amendment has been added successfully.');
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
	function openCity(evt, cityName) {
		// Declare all variables
		var i, tabcontent, tablinks;

		// Get all elements with class="tabcontent" and hide them
		tabcontent = document.getElementsByClassName("tabcontent");
		for (i = 0; i < tabcontent.length; i++) {
			tabcontent[i].style.display = "none";
		}

		// Get all elements with class="tablinks" and remove the class "active"
		tablinks = document.getElementsByClassName("tablinks");
		for (i = 0; i < tablinks.length; i++) {
			tablinks[i].className = tablinks[i].className.replace(" active", "");
		}

		// Show the current tab, and add an "active" class to the button that opened the tab
		document.getElementById(cityName).style.display = "block";
		evt.currentTarget.className += " active";
	}
	addTourCompleteValidateOpt = {
	    errorElement: 'div',
	    invalidHandler: function(event, validator) {
	        var errors = validator.numberOfInvalids();
	        if (errors) {
	            $('span.error').hide();
	        }
	    },
	    rules: {
	        'product_name': {
	            required: true,
	        },
	     },
	    messages: {
	        'step1[experience_categories_ids][]': {
	            required: "Please select category",
	        },
	    },
	    errorPlacement: function(error, element) {
	        /*if (element.hasClass('selectCls')) {
	            error.insertAfter(element.next('span'));
	        } else {
	            error.insertAfter(jQuery(element));
	        }*/
	        if (element.hasClass('selectCls')) {
	           error.insertAfter(element.next('span'));
	        } else if (element.hasClass('availableTourDatesCls')) {
	           error.insertAfter(element.next('.input-group-append').next('span'));
	        } else if (element.hasClass('custom_chkbox')) {
	           error.insertAfter(element.next('span'));
	        } else if (element.hasClass('multiImgCls')) {
	           error.insertAfter(element.next('span'));
	        } else {
	            error.insertAfter($(element));
	        }
	    },
	    focusInvalid: false,
	    invalidHandler: function(form, validator) {},
	    submitHandler: function(form) {
	    	var params = $(form).serializeArray();
            $.each(params, function(i, val) {
                userFormData.append(val.name, val.value);
            });
            $('.loader').show();
            $.ajax({
                url: $(form).attr('action'),
                type: 'POST',
                dataType: 'JSON',
                cache: false,
                mimeType: "multipart/form-data",
                contentType: false,
                processData: false,
                // data: formData, 
                data: userFormData,
                beforeSend: function() {
                }
            }).done(function(data) {
                $('.loader').hide();
                parent.jQuery.fancybox.close();
                var cartIdSCls = $('.cartIdSCls').val();
                $('a#reloadInfo'+cartIdSCls).trigger('click');
            	

            });
            return false;
	    }, 
	};
	$(document).ready(function(){   
	    $('#dataHolder').validate(addTourCompleteValidateOpt);
	});
	var userFormData = new FormData();
$('#ahemdDataHolder .custom_chkbox').click(function(){
		 if ($(this).val()==2){ 
	        $('.emailexp').show();
	    }
	    else
	    {
	    	$('.emailexp').hide();
	    }
	})
	
	//ckditor
 $('#emailContentField').ck
CKEDITOR.replace( 'emailContentField');
CKEDITOR.replace( 'removeEmailContentField');
</script>