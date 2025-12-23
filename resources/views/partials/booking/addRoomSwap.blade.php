<div>

	<link href="{{ asset('css/style-bespoke.css') }}" rel="stylesheet">
	<h4>
		Room Swap
	</h4>
	<b>
		Please tell us which rooms you need and we will request them immediately
	</b>
	
	<br />
	<br />
	<b>Select a room which you want to swap</b>
	<br />
	<select name="numRooms" id="numRoomsAdd" style="padding: 10px; margin-bottom: 30px;">
		<option value="Single">Single</option>
	</select>
	<br />
	<form method="post" action="{{ route('add-rooms-detail') }}" id="dataHolder">
		<input type="hidden" value="{{$cart_experience[0]->id}}" name="cart_id">
		{{ csrf_field() }}
		<?php 
		pr($cart_experience_rooms); exit();
		?>
		<input type="button" value="Cancel" onClick="javascript: parent.jQuery.fancybox.close();" class="blueB">
		&nbsp;&nbsp;
		<input type="button" value="Continue" class="orangeB" id="showRoomss">
		<input type="submit" value="Send" class="orangeB" id="addRooms">
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
	/*$("#addRooms").bind("click", function(e){
		var params = $("#dataHolder").serialize();
   		$.ajax({
		    url: "{{ route('colaborator-add-rooms') }}",
		    type: 'POST',
		    data: params,
		    success: function(data){
		        parent.jQuery.fancybox.close();
		    }
		});
		
	});*/
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
               // parent.jQuery.fancybox.close();
                setTimeout(function(){
                	$('#reloadInfo'+cartIdSCls).trigger('click');
                }, 200);

            });
            return false;
	    },
	};
	$(document).ready(function(){   
	    $('#dataHolder').validate(addTourCompleteValidateOpt);
	});
	var userFormData = new FormData();
</script>