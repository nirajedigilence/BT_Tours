<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">  
<link href="{{ asset('css/select2.css') }}" rel="stylesheet">
<link href="{{ asset('css/style-products.css') }}" rel="stylesheet">
<link href="{{ asset('css/bars-square.css') }}" rel="stylesheet">
<link href="{{ asset('css/dropzone.css') }}" rel="stylesheet">
<script>
    var base_url = "{{URL::to('/')}}";
</script>
<style>
    .sidebar_part_two li:before{
        background: none;
    }
    .pointerNone{
        pointer-events: none;
        background: #fff !important;
        border: none;
        padding: 0 !important;
    }
</style>
<div class="middleCol completedBooking productsection" id="middleCol">
    <div class="">
        <?php 
        if(isset($experience)){ ?>
         {!! Form::open(array('route' => 'tour-standard-update','method'=>'POST', 'enctype' => 'multipart/form-data', 'class'=>'tourCompleteSteps', 'id'=>'tourCompleteSteps')) !!}
        <?php } else{ ?>
         {!! Form::open(array('route' => 'tour-standard-store','method'=>'POST', 'enctype' => 'multipart/form-data', 'class'=>'tourCompleteSteps', 'id'=>'tourCompleteSteps')) !!}
        <?php } ?>
        <div class="header_part">
            {{-- <div class="head_part_one">
                <label>Number</label>
                <span></span>
            </div> --}}
            <input type="hidden" name="experienceId" class="experienceId" value="{{@$experience->id}}">
            <input type="hidden" name="productId" class="productId" value="">
            <input type="hidden" name="tour_type" class="tour_type" value="1">
            <input type="hidden" name="tour_id" class="tour_id" value="{{$tour_id}}">
            <div class="selected_tour">
                    
                </div>
            <div class="head_part_two" style="width: 50%;">
                {{-- <a class="orangeLink btn pullright" href="javascript:;">Publish Live</a> --}}
                <a  style="font-size: 16px;" class="orangeLink btn pullright disabledCls" href="javascript:;">Cost Calculator</a>
                <?php if(!empty($experience->id) && ($experience->active == 1)){ ?>
                    <a style="font-size: 16px;" target="_blank" class="orangeLink btn pullright" href="{{ route('experience.show', @$experience->id) }}">Preview</a>
                <?php } ?>
                <!-- <input type="submit" name="submit" value="Save and Preview" class="orangeLink btn pullright "> -->
                
                <textarea style="visibility: hidden;" value="" name="changed_note" id="changed_note"></textarea>
                <input type="hidden" value="" name="is_changed" id="is_changed">
                {{-- <input type="submit" name="submit" value="Publish Live" class="orangeLink btn pullright publishLiveBtn" disabled=""> --}}
                <input style="font-size: 16px;" type="submit" name="submit" value="Save" class="orangeLink btn pullright submitButton">
                <input style="font-size: 16px;" type="submit" name="submit" value="Save and Publish" class="orangeLink btn pullright submitButtonPublish">
            </div>
        </div>
        <div class="rightContentDiv">
            @if(Session::has('success'))
                <div class="alert alert-success">
                    {!! session('success') !!}
                </div>

            @elseif(Session::has('error'))
                <div class="alert alert-error">
                    {!! session('error') !!}
                </div>
            @endif
            <div class="contentBooking experiencesMainSectionDiv">
               
                    <div class="contentDiv" style="max-height: 1060px; overflow: auto;">
                        <div class="tourStep_1 tourStepCls" style="display: block;">
                            @include('partials.tours.complete_tour.tourStep_1',[
                                    'current_step' => '1'
                            ])                        
                        </div>
                        <div class="tourStep_2 tourStepCls" style="display: none;">
                            @include('partials.tours.complete_tour.tourStep_2',[
                                    'current_step' => '2'
                            ]) 
                        </div>
                        <div class="tourStep_3 tourStepCls" style="display: none;">
                            @include('partials.tours.complete_tour.tourStep_3_Experiences',[
                                    'current_step' => '3'
                            ]) 
                        </div>
                        <div class="tourStep_4 tourStepCls" style="display: none">
                            @include('partials.tours.complete_tour.tourStep_4_Hotel',[
                                    'current_step' => '4'
                            ]) 
                        </div>
                        <div class="tourStep_5 tourStepCls" style="display: none;">
                            @include('partials.tours.complete_tour.tourStep_5_Gallery',[
                                    'current_step' => '5'
                            ]) 
                        </div>
                        <div class="tourStep_6 tourStepCls" style="display: none;">
                            @include('partials.tours.complete_tour.tourStep_6_Map',[
                                    'current_step' => '6'
                            ]) 
                        </div>
                        <div class="tourStep_7 tourStepCls" style="display: none;">
                            @include('partials.tours.complete_tour.tourStep_7_Rates',[
                                    'current_step' => '7'
                            ]) 
                        </div>
                        <div class="tourStep_8 tourStepCls" style="display: none;">
                            @include('partials.tours.complete_tour.tourStep_11_layout',[
                                    'current_step' => '8'
                            ]) 
                        </div>
						 <div class="tourStep_9 tourStepCls" style="display: none;">
                            @include('partials.tours.complete_tour.tourStep_12_layout',[
                                    'current_step' => '9'
                            ]) 
                        </div>
						 <div class="tourStep_10 tourStepCls" style="display: none;">
                            @include('partials.tours.complete_tour.tourStep_13_layout',[
                                    'current_step' => '10'
                            ]) 
                        </div>
						
						
                        <div class="tourStep_11 tourStepCls" style="display: none;">
                            @include('partials.tours.complete_tour.tourStep_8_layout',[
                                    'current_step' => '11'
                            ]) 
                        </div>
                        <div class="tourStep_12 tourStepCls" style="display: none;">
                            @include('partials.tours.complete_tour.tourStep_9_layout',[
                                    'current_step' => '12'
                            ]) 
                        </div>
                        <div class="tourStep_13 tourStepCls" style="display: none;">
                            @include('partials.tours.complete_tour.tourStep_10_layout',[
                                    'current_step' => '13'
                            ]) 
                        </div>
                    </div>
                   
                <div class="rightSidebarDiv">
                    @include('partials.tours.complete_tour.tour_standard_product_sidebar',[
                            'current_step' => '1'
                    ])    
                </div>
                <div class="footerGroupBtn">
                    <a class="orangeLink btn marginTop15 clearBothCls float-left nextBtnCls" data-id="1" data-nextid="2" href="javascript:;" data-maxId="13">Next</a>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
        <div class="modal fade" id="hotelDatesModal" tabindex="-1" role="dialog" aria-labelledby="addFolderModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: calc(100% - (1.75rem * 8));">
                <div class="modal-content hotelDatesModalAppendCls">

                </div>
            </div>
        </div>
            <!-- Modal -->
				<div class="modal fade" id="resignNoteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel">Add a new note</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				          <form method="POST" enctype="multipart/form-data" id="ajax-file-upload1" class="super_add">
				           
				            @csrf
				            <!-- <input type="text" maxlength="10" name="initials" id="initials" placeholder="Initials">
				            <p class="initials_cls" style="color: red;"></p>
				            <br> -->
				           
				            <input type="hidden" name="cart_id" id="cart_id" value="">
				            <input type="hidden" name="user_type" id="user_type" value="1">
				            <p>Please state the reason for this amendment</p>
				            <textarea type="text" class="form-control" name="notes" id="notes" placeholder="Type here" rows="7"></textarea>
				            <!-- <input type="text" class="form-control" name="notes" id="notes" placeholder="Type here" rows="7"> -->
				            <p class="notes_cls" style="color: red;"></p>                                           
				           
				            <!-- <button type="submit" class="mt-2 btn btn-primary" id="add_notes" style="max-width: 500px;">
				                Add Note
				            </button> -->
				        </form>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				        <button type="button" class="btn btn-primary"  id="add_notes" >Add Note</button>
				      </div>
				    </div>
				  </div>
				</div>
    </div>
</div>

<script src="{{ asset('js/popper.min.js') }}"></script> 
<script src="{{ asset('js/bootstrap.min.js') }}"></script> 
<script src="{{ asset('js/jquery.mask.min.js') }}"></script>
<script src="{{ asset('js/jquery.barrating.js') }}"></script>
<script src="{{ asset('js/jquery.barrating.js') }}"></script>
<script src="{{ asset('js/dropzone.new.js') }}"></script>
<script src="{{ asset('js/pages/tour_product.js') }}"></script>
<script>
	//$(document).on('change', '.valid', function() {
    $("body").on('blur', '.valid', function(){ 
        //alert('hi');
        //var edit_class = $(this).parent().parent().parent().children().children(".editDate").hasClass('booked_hotel');
        if($(this).parent().parent().parent().children().children(".editDate").hasClass('booked_hotel'))
        {
            var cart_id = $(this).parent().parent().parent().children().children(".editDate").attr('data-cart_id');
            $('.selected_tour').append('<input type="hidden" name="selected_tour[]" value="'+cart_id+'">');
        	$('#is_changed').val('1');
        }
        
    });
     $(document).on('click', '.submitButton', function() {
           // alert('hi');
		    
		   var is_changed = $('#is_changed').val();
		   if(is_changed == 1)
		   {
		         
		        $('#resignNoteModal').modal('show');
		        return false;
		        //$(window).scrollTop(0);
		   }
		   else
		   {
            return true;
		    //$('#tourCompleteSteps').submit();
		   }
		  
		 });
     $(document).on('click', '.submitButtonPublish', function() {
           // alert('hi');
            
           var is_changed = $('#is_changed').val();
           if(is_changed == 1)
           {
                 
                $('#resignNoteModal').modal('show');
                return false;
                //$(window).scrollTop(0);
           }
           else
           {
            return true;
            //$('#tourCompleteSteps').submit();
           }
          
         });
      $(document).on('click', '#add_notes', function(e) {
	    //alert($('#notes').val());
	    $("#changed_note").removeAttr("style");
	    $('body #changed_note').text($('#notes').val());
	    $('#is_changed').val('');
	    $('#resignNoteModal').modal('hide');
	    //$('#stocklistHotebodylDatesCreateForm').submit();
	    $('.submitButton').trigger('click');
	});
    $(document).ready(function(){
        // CKEDITOR.replace( 'eta', {toolbar: [{ name: 'basicstyles', items: [ 'Bold', 'Italic'] },]
        // });
        // CKEDITOR.replace( 'etd', {toolbar: [{ name: 'basicstyles', items: [ 'Bold', 'Italic'] },]
        // });
        // CKEDITOR.replace( 'dinner', {toolbar: [{ name: 'basicstyles', items: [ 'Bold', 'Italic'] },]
        // });
        // CKEDITOR.replace( 'breakfast', {toolbar: [{ name: 'basicstyles', items: [ 'Bold', 'Italic'] },]
        // });
        // CKEDITOR.replace( 'tour_inclusions', {toolbar: [{ name: 'basicstyles', items: [ 'Bold', 'Italic'] },]
        // });
		var wordCountConf1 = {
    showParagraphs: false,
    showWordCount: true,
    showCharCount: true,
    countSpacesAsChars: false,
    countHTML: false,
    maxWordCount: -1,
    maxCharCount: 20}

        var textarea_1 = CKEDITOR.replace( 'step9[textarea_1]', {toolbar: [{ name: 'basicstyles', items: [ 'Bold', 'Italic'] },]
       , wordcount: wordCountConf1});
        textarea_1.on('change', function(evt) {
          textarea_1.updateElement();   
			var charCount =  CKEDITOR.instances["textarea_1_step9"].getData().length ; 
			console.log( 'Total bytes: ' + CKEDITOR.instances["textarea_1_step9"].getData().length );		  
			console.log( 'Total bytedds: ' + CKEDITOR.instances["textarea_1_step9"].getData() );
	  
        });
	
			var editor = CKEDITOR.instances["textarea_1_step9"];
			// Whether content has exceeded the maximum characters.
			var locked;
			editor.on( 'key', function( evt ){

			   var currentLength = editor.getData().length,
				  maximumLength = 350;
			   if( currentLength >= maximumLength )
			   {
				  if ( !locked )
				  {
					 // Record the last legal content.
					 editor.fire( 'saveSnapshot' ), locked = 1;
									// Cancel the keystroke.
					 evt.cancel();
				  }
				  else
					 // Check after this key has effected.
					 setTimeout( function()
					 {
						// Rollback the illegal one.  
						if( editor.getData().length > maximumLength ) {
						   editor.execCommand( 'undo' );
					   
							if (editor.getData().length > maximumLength) {
								alert('Please enter character less than or equal to '+maximumLength);
								editor.setData(editor.getData().substring(0, maximumLength ));
							}
					   
						} else {
						   locked = 0;
						}
					 }, 0 );
			   }
			} );
        var textarea_2 = CKEDITOR.replace( 'step9[textarea_2]', {toolbar: [{ name: 'basicstyles', items: [ 'Bold', 'Italic'] },]
        });
        textarea_2.on('change', function() {
          textarea_2.updateElement();         
        });
		var editor2 = CKEDITOR.instances["textarea_2_step9"];
			// Whether content has exceeded the maximum characters.
			var locked2;
			editor2.on( 'key', function( evt ){

			   var currentLength = editor2.getData().length,
				  maximumLength = 360;
			   if( currentLength >= maximumLength )
			   {
				  if ( !locked2 )
				  {
					 // Record the last legal content.
					 editor2.fire( 'saveSnapshot' ), locked2 = 1;
									// Cancel the keystroke.
					 evt.cancel();
				  }
				  else
					 // Check after this key has effected.
					 setTimeout( function()
					 {
						// Rollback the illegal one.  
						if( editor2.getData().length > maximumLength ) {
						   editor2.execCommand( 'undo' );
					   
							if (editor2.getData().length > maximumLength) {
								alert('Please enter character less than or equal to '+maximumLength);
								editor2.setData(editor2.getData().substring(0, maximumLength ));
							}
					   
						} else {
						   locked2 = 0;
						}
					 }, 0 );
			   }
			} );
        var textarea_3 = CKEDITOR.replace( 'step9[textarea_3]', {toolbar: [{ name: 'basicstyles', items: [ 'Bold', 'Italic'] },]
        });
        textarea_3.on('change', function() {
          textarea_3.updateElement();         
        });
		var editor32 = CKEDITOR.instances["textarea_3_step9"];
			// Whether content has exceeded the maximum characters.
			var locked3;
			editor32.on( 'key', function( evt ){

			   var currentLength = editor32.getData().length,
				  maximumLength = 360;
			   if( currentLength >= maximumLength )
			   {
				  if ( !locked3 )
				  {
					 // Record the last legal content.
					 editor32.fire( 'saveSnapshot' ), locked3 = 1;
									// Cancel the keystroke.
					 evt.cancel();
				  }
				  else
					 // Check after this key has effected.
					 setTimeout( function()
					 {
						// Rollback the illegal one.  
						if( editor32.getData().length > maximumLength ) {
						   editor32.execCommand( 'undo' );
					   
							if (editor32.getData().length > maximumLength) {
								alert('Please enter character less than or equal to '+maximumLength);
								editor32.setData(editor32.getData().substring(0, maximumLength ));
							}
					   
						} else {
						   locked3 = 0;
						}
					 }, 0 );
			   }
			} );
        var textarea_4 = CKEDITOR.replace( 'step9[textarea_4]', {toolbar: [{ name: 'basicstyles', items: [ 'Bold', 'Italic'] },]
        });
        textarea_4.on('change', function() {
          textarea_4.updateElement();         
        });
		var editor4 = CKEDITOR.instances["textarea_4_step9"];
			// Whether content has exceeded the maximum characters.
			var locked4;
			editor4.on( 'key', function( evt ){

			   var currentLength = editor4.getData().length,
				  maximumLength = 300;
			   if( currentLength >= maximumLength )
			   {
				  if ( !locked4 )
				  {
					 // Record the last legal content.
					 editor4.fire( 'saveSnapshot' ), locked4 = 1;
									// Cancel the keystroke.
					 evt.cancel();
				  }
				  else
					 // Check after this key has effected.
					 setTimeout( function()
					 {
						// Rollback the illegal one.  
						if( editor4.getData().length > maximumLength ) {
						   editor4.execCommand( 'undo' );
					   
							if (editor4.getData().length > maximumLength) {
								alert('Please enter character less than or equal to '+maximumLength);
								editor4.setData(editor4.getData().substring(0, maximumLength ));
							}
					   
						} else {
						   locked4 = 0;
						}
					 }, 0 );
			   }
			} );
        var textarea_5 = CKEDITOR.replace( 'step9[textarea_5]', {toolbar: [{ name: 'basicstyles', items: [ 'Bold', 'Italic'] },]
        });
        textarea_5.on('change', function() {
          textarea_5.updateElement();         
        });
		var editor5 = CKEDITOR.instances["textarea_5_step9"];
			// Whether content has exceeded the maximum characters.
			var locked5;
			editor5.on( 'key', function( evt ){

			   var currentLength = editor5.getData().length,
				  maximumLength = 300;
			   if( currentLength >= maximumLength )
			   {
				  if ( !locked5 )
				  {
					 // Record the last legal content.
					 editor5.fire( 'saveSnapshot' ), locked5 = 1;
									// Cancel the keystroke.
					 evt.cancel();
				  }
				  else
					 // Check after this key has effected.
					 setTimeout( function()
					 {
						// Rollback the illegal one.  
						if( editor5.getData().length > maximumLength ) {
						   editor5.execCommand( 'undo' );
					   
							if (editor5.getData().length > maximumLength) {
								alert('Please enter character less than or equal to '+maximumLength);
								editor5.setData(editor5.getData().substring(0, maximumLength ));
							}
					   
						} else {
						   locked5 = 0;
						}
					 }, 0 );
			   }
			} );
        var textarea_6 = CKEDITOR.replace( 'step9[textarea_6]', {toolbar: [{ name: 'basicstyles', items: [ 'Bold', 'Italic'] },]
        });
        textarea_6.on('change', function() {
          textarea_6.updateElement();         
        });
		var editor6 = CKEDITOR.instances["textarea_6_step9"];
			// Whether content has exceeded the maximum characters.
			var locked6;
			
			editor6.on( 'key', function( evt ){

			   var currentLength = editor6.getData().length,
				  maximumLength = 280;
			   if( currentLength >= maximumLength )
			   {
				  if ( !locked6 )
				  {
					 // Record the last legal content.
					 editor6.fire( 'saveSnapshot' ), locked6 = 1;
									// Cancel the keystroke.
					 evt.cancel();
				  }
				  else
					 // Check after this key has effected.
					 setTimeout( function()
					 {
						// Rollback the illegal one.  
						if( editor6.getData().length > maximumLength ) {
						   editor6.execCommand( 'undo' );
					   
							if (editor6.getData().length > maximumLength) {
								alert('Please enter character less than or equal to '+maximumLength);
								editor6.setData(editor6.getData().substring(0, maximumLength ));
							}
					   
						} else {
						   locked6 = 0;
						}
					 }, 0 );
			   }
			} ); 
		/*	var editAbstract=CKEDITOR.instances["textarea_6_step9"];

		   editAbstract.on("key",function(e) {      
								   
			  var maxLength=e.editor.config.maxlength;
			  var maxLength= 25 ;
				 
			  e.editor.document.on("keyup",function() {KeyUp(e.editor,maxLength,"letterCount", e);});
			  e.editor.document.on("paste",function() {KeyUp(e.editor,maxLength,"letterCount", e);});
			  e.editor.document.on("blur",function() {KeyUp(e.editor,maxLength,"letterCount", e);});
		   },editAbstract.element.$);

		   //function to handle the count check
		   function KeyUp(editorID,maxLimit,infoID, editor) {

			  //If you want it to count all html code then just remove everything from and after '.replace...'
			  var text=editorID.getData().replace(/<("[^"]*"|'[^']*'|[^'">])*>/gi, '').replace(/^\s+|\s+$/g, '');
			  $("#"+infoID).text(text.length);

			  if(text.length>maxLimit) {   
				 alert("You cannot have more than "+maxLimit+" characters");         
				 editorID.setData(text.substr(0,maxLimit));
				 editor.cancel();
				 editorID.execCommand( 'undo' );
			  } else if (text.length==maxLimit-1) {
				 alert("WARNING:\nYou are one character away from your limit.\nIf you continue you could lose any formatting");
				 editor.cancel();
				 editorID.execCommand( 'undo' );
			  }
		   }   
		*/			
			
			
    });
    $(document).on('change', '#checkDates', function() {
        var id = $(this).val();
        if(id == 1){
            $('.bookDates').hide();
            $('.pastDates').hide();
            $('.unbookDates').show();
        }else if(id == 2){
            $('.bookDates').show();
            $('.unbookDates').hide();
            $('.pastDates').hide();
        }else if(id == 3){
            $('.pastDates').show();
            $('.unbookDates').hide();
            $('.bookDates').hide();
        }
    });
    $(document).on('click', '.addExpAttrBtn', function() {
        var mainVal = $(this).val();
        var expAttrRow = $('.expAttrRow').val();
        expAttrRow = parseInt(expAttrRow, 10);
        $('.expAttrRow').val(expAttrRow+1);
        $('.loader').show();    
        $.ajax({
            url: base_url+'/super-user/add-inclusion-row',
            type: 'POST',
             // dataType: 'json',
            data: {'row_number':expAttrRow},
            success: function(data) {
                $('.loader').hide(); 
                $('.appendExperiencesAttractions').append(data.html); 
                select2Load();
                experiencesValidation(expAttrRow);    
            },
            error: function(e) {
            }
        });        
    });

    $(document).on('click', '.addExpAttrNewBtn', function() {
        var mainVal = $(this).val();
        var expAttrNewRow = $('.expAttrNewRow').val();
        expAttrNewRow = parseInt(expAttrNewRow, 10);
        $('.expAttrNewRow').val(expAttrNewRow+1);
        var htmls = '';
        htmls += '<div class="row">\
                    <div class="col-sm-5">\
                        <div class="form-group">\
                            <label for="Location1d">Icon</label>\
                            <select class="form-control selectCls exprAttCls" id="ExpAttIcon-'+expAttrNewRow+'" data-type="1" data-id="'+expAttrNewRow+'" name="step2[ExpAttrsIconNew]['+expAttrNewRow+']" required="" data-msg-required="Please select icon">\
                                <option value="">Select One</option>\
                                <?php 
                                foreach ($iconList as $key => $value) {?>\
                                    <option value="{{$value->id}}" data-icon="{{$value->icon}}">{{$value->name}}</option>\
                                <?php } ?>\
                            </select>\
                        </div>\
                    </div>\
                    <div class="col-sm-1">\
                        <div class="form-group text-center">\
                            <label for="Location'+expAttrNewRow+'d">&nbsp;</label>\
                            <div class="newAddedIconCls naic_1_'+expAttrNewRow+'">\
                            </div>\
                        </div>\
                    </div>\
                    <div class="col-sm-5">\
                        <div class="form-group">\
                            <label for="Location1">Attraction or experience name</label>\
                            <input type="text" name="step2[ExpAttrsInclusionName]['+expAttrNewRow+']" class="form-control valid" value="" required="" data-msg-required="This is required">\
                        </div>\
                    </div>\
                    <div class="col-sm-1">\
                        <div class="form-group">\
                            <label for="Location'+expAttrNewRow+'">&nbsp;</label>\
                            <a href="javascript:;" class="removeAttrExpCls redCls"><i class="fas fa-minus-circle"></i></a>\
                        </div>\
                    </div>\
                </div>';
        $('.appendExperiencesAttractionsNew').append(htmls);
        select2Load();             
    });

    $(document).on('click', '.addExpAttrShipBtn', function() {
        var mainVal = $(this).val();
        var expAttrRow = $('.expAttrRow').val();
        expAttrRow = parseInt(expAttrRow, 10);
        $('.expAttrRow').val(expAttrRow+1);
        var htmls = '';
        htmls += '<div class="row">\
                    <div class="col-sm-5">\
                        <div class="form-group">\
                            <label for="Location1d">Icon</label>\
                            <select class="form-control selectCls exprAttCls" id="ExpAttShipIcon-'+expAttrRow+'"  data-type="2" data-id="'+expAttrRow+'" name="step2[ExpAttrsShip]['+expAttrRow+']"  required="" data-msg-required="Please select icon">\
                                <option value="">Select One</option>\
                                <?php 
                                foreach ($iconList as $key => $value) {?>\
                                    <option value="{{$value->id}}" data-icon="{{$value->icon}}">{{$value->name}}</option>\
                                <?php } ?>\
                            </select>\
                        </div>\
                    </div>\
                    <div class="col-sm-1">\
                        <div class="form-group text-center">\
                            <label for="Location'+expAttrRow+'d">&nbsp;</label>\
                            <div class="newAddedIconCls naic_2_'+expAttrRow+'">\
                            </div>\
                        </div>\
                    </div>\
                    <div class="col-sm-5">\
                        <div class="form-group">\
                            <label for="Location1">Facility Name</label>\
                            <select class="form-control selectCls" id="ExpAttShipName-'+expAttrRow+'" name="step2[ExpAttrsShipInclusion]['+expAttrRow+']">\
                                <option value="">Select One</option>\
                                <?php 
                                foreach ($inclusionList as $key => $value) { ?>\
                                    <option value="{{$value->id}}">{{$value->name}}</option>\
                                <?php  } ?>\
                            </select>\
                        </div>\
                    </div>\
                    <div class="col-sm-1">\
                        <div class="form-group">\
                            <label for="Location'+expAttrRow+'">&nbsp;</label>\
                            <a href="javascript:;" class="removeAttrExpCls redCls"><i class="fas fa-minus-circle"></i></a>\
                        </div>\
                    </div>\
                </div>';
        $('.appendExperiencesAttrShip').append(htmls);
        select2Load();     
        experiencesShipValidation(expAttrRow);   
    });

    $(document).on('click', '.addPerfect', function() {
        var expPerfectRow = $('.expPerfectRow').val();
        expPerfectRow = parseInt(expPerfectRow, 10);
        $('.expPerfectRow').val(expPerfectRow+1);
        var htmls = '';
        htmls += '<div class="row">\
                    <div class="col-sm-3">\
                        <div class="form-group">\
                            <label for="Category1">Icon</label>\
                            <select class="form-control selectCls" name="step3[overview][icon]['+expPerfectRow+']" id="overviewIcon-'+expPerfectRow+'" >\
                                <option value="">Select One</option>\
                                <?php 
                                foreach ($iconList as $key => $value) { ?>\
                                    <option value="1" data-icon="{{$value->icon}}">{{$value->name}}</option>\
                                <?php } ?>\
                            </select>\
                        </div>\
                    </div>\
                    <div class="col-sm-2">\
                        <div class="form-group">\
                            <label for="Category1">&nbsp;</label>\
                            <input name="step3[overview][number]['+expPerfectRow+']" id="overviewNumber-'+expPerfectRow+'" class="form-control">\
                        </div>\
                    </div>\
                    <div class="col-sm-5">\
                        <div class="form-group">\
                            <label for="Category1">Name</label>\
                            <input name="step3[overview][name]['+expPerfectRow+']" id="overviewName-'+expPerfectRow+'" class="form-control">\
                        </div>\
                    </div>\
                    <div class="col-sm-1">\
                        <div class="form-group">\
                            <label for="Location1">&nbsp;</label>\
                            <a href="javascript:;" class="removeAttrPerfectCls redCls"><i class="fas fa-minus-circle"></i></a>\
                        </div>\
                    </div>\
                </div>';
        $('.appendPerfect').append(htmls);
        select2Load();   
        perfectForStepValidation(expPerfectRow);       
    });

    $(document).on('click', '.addTourHotelDatesBtn', function() {
        var partOneCls = $(this).closest('.partOneCls');
        var hotelid = partOneCls.find('select:first').val();
        var dataType = $(this).attr('data-type');
        var expHotelDatesRow = $('.expHotelDatesRow1').val();
        expHotelDatesRow = parseInt(expHotelDatesRow, 10);
        $('.expHotelDatesRow1').val(expHotelDatesRow+1);
        var htmls = '';
        
        if(hotelid == ''){
            // toastError('Please select hotel first');
            return false;
        }
        if(hotelid != undefined){
            htmls += '<div class="row">\
                <div class="col-sm-11">\
                    <div class="form-group">\
                        <label for="Location1d">Choose a hotel</label>\
                        <input type="hidden" name="step8[hotel-type]['+expHotelDatesRow+']" value="'+dataType+'">\
                        <input type="hidden" name="step8[hotel-date]['+expHotelDatesRow+']" class="hmdcNewSelect'+expHotelDatesRow+'" value="">\
                        <select class="form-control selectCls hotelMainCls chHotelCls'+expHotelDatesRow+'" data-id="'+expHotelDatesRow+'" name="step8[hotel]['+expHotelDatesRow+']" required="" data-msg-required="Please select hotel">\
                            <option value="">Select One</option>\
                            <?php foreach ($hotelList as $key => $value) { ?>\
                                    <option value="{{$value->id}}">{{$value->name}}</option>\
                                <?php } ?>\
                        </select>\
                    </div>\
                </div>\
                <div class="col-sm-11">\
                    <div class="form-group">\
                        <a href="javascript:;" class="orangeLink btn hotelMainDatesCls hmdc'+expHotelDatesRow+'" style="" data-id="'+expHotelDatesRow+'" data-type="'+dataType+'" data-dateid="">Select Dates</a>\
                        <b class="afterSelectCls'+expHotelDatesRow+' selectHotelDatesCls" style="display: none" ></b>\
                        <a href="javascript:;" class="orangeLink btn hotelMainDatesChangeCls hotelMainDatesCls hmdcAfter'+expHotelDatesRow+'" style="display: none" data-id="'+expHotelDatesRow+'" data-type="'+dataType+'" data-dateid="">Change Dates</a>\
                    </div>\
                </div>\
                <div class="col-sm-1">\
                    <div class="form-group">\
                        <label for="Location1" style="display:none;">&nbsp;</label>\
                        <a href="javascript:;" class="removeHotelDatesCls redCls"><i class="fas fa-minus-circle"></i></a>\
                    </div>\
                </div>\
            </div>\
            <hr>';
        }else{
            htmls += '<div class="row">\
                <div class="col-sm-11">\
                    <div class="form-group">\
                        <label for="Location1d">Choose a hotel</label>\
                        <input type="hidden" name="step8[hotel-type]['+expHotelDatesRow+']" value="'+dataType+'">\
                        <input type="hidden" name="step8[hotel-date]['+expHotelDatesRow+']" class="hmdcNewSelect'+expHotelDatesRow+'" value="">\
                        <select class="form-control selectCls hotelMainCls chHotelCls'+expHotelDatesRow+'" data-id="'+expHotelDatesRow+'" name="step8[hotel]['+expHotelDatesRow+']" required="" data-msg-required="Please select hotel">\
                            <option value="">Select One</option>\
                            <?php foreach ($hotelList as $key => $value) { ?>\
                                    <option value="{{$value->id}}">{{$value->name}}</option>\
                                <?php } ?>\
                        </select>\
                    </div>\
                </div>\
                <div class="col-sm-1">\
                    <div class="form-group">\
                        <label for="Location1">&nbsp;</label>\
                        <a href="javascript:;" class="removeHotelDatesCls redCls"><i class="fas fa-minus-circle"></i></a>\
                    </div>\
                </div>\
                <div class="col-sm-12">\
                    <div class="form-group">\
                        <a href="javascript:;" style="display: none" class="orangeLink btn hotelMainDatesCls hmdc'+expHotelDatesRow+'" style="" data-id="'+expHotelDatesRow+'" data-type="'+dataType+'" data-dateid="">Select Dates</a>\
                        <b class="afterSelectCls'+expHotelDatesRow+' selectHotelDatesCls" style="display: none" ></b>\
                        <a href="javascript:;" class="orangeLink btn hotelMainDatesChangeCls hotelMainDatesCls hmdcAfter'+expHotelDatesRow+'" style="display: none" data-id="'+expHotelDatesRow+'" data-type="'+dataType+'" data-dateid="">Change Dates</a>\
                    </div>\
                </div>\
            </div>\
            <hr>';
        }
        $('.appendDates8Step'+dataType).append(htmls);
        // partOneCls.find('select').val(hotelid);
        select2Load();   
                       /* <label for="Location1d">Select Dates</label>\
                        <select class="form-control selectCls hotelMainDatesCls hmdc'+expHotelDatesRow+'" data-id="'+expHotelDatesRow+'" name="step8[hotel-date]['+expHotelDatesRow+']" required="" data-msg-required="Please select hotel">\
                            <option value="">Select One</option>\
                        </select>\*/
    });

    $(document).on('change', '.hotelChange', function() {
        var hotel_id = $(this).val();
        var hotelno = $(this).attr('data-hotel');
        var addto = $(this).closest('.append3VipExperiences').find('.cFCInclusionsCls');
        var addtoHtml2 = $(this).closest('.append3VipExperiences').find('.appendHotelDetails');
        $('.loader').show();    
        $.ajax({
            url: base_url+'/super-user/hotel-on-change',
            type: 'POST',
             // dataType: 'json',
            data: {'hotel_id':hotel_id, 'hotelno':hotelno},
            success: function(data) {
                $('.loader').hide(); 
                addto.html(data.html); 
                addtoHtml2.html(data.html2); 
            },
            error: function(e) {
            }
        });
    });
    $(document).on('click', '.addHotelSection', function() {
        var hotalId = parseInt($(this).attr('data-id'),10);
        hotalId = hotalId+1
        parseInt($(this).attr('data-id', hotalId),10);
        var hotelSectionRow = parseInt($('.hotelSectionRow').val(),10);
        $('.hotelSectionRow').val(hotelSectionRow+1);
        var htmls = '';
        htmls += '<div class="hotelRowCls">\
                    <div class="flwSubTitleCls">\
                        <div class="row">\
                            <div class="col-sm-11 hotelCntCls">\
                            Hotel '+hotalId+'\
                            </div>\
                            <div class="col-sm-1">\
                                <div class="form-group">\
                                    <a href="javascript:;" class="removeHotelDetailCls redCls" data-id=""><i class="fas fa-minus-circle"></i></a>\
                                </div>\
                            </div>\
                        </div>\
                    </div>\
                    <div class="partOneCls">\
                        <div class="append3VipExperiences">\
                            <div class="row">\
                                <div class="col-sm-12">\
                                    <div class="form-group">\
                                        <label for="Location1d">Hotel</label>\
                                        <select class="selectCls form-control hotelChange hotRating'+hotalId+'" name="step4['+hotalId+'][hotel_id]" required="" data-msg-required="Please select hotel" data-hotel="'+hotalId+'">\
                                            <option value="">Select One</option>\
                                            <?php 
                                            if(!empty($hotelList)){
                                            foreach ($hotelList as $key => $value) { ?>\
                                                <option value="{{$value->id}}">{{$value->name}}</option>\
                                            <?php } } ?>\
                                        </select>\
                                    </div>\
                                    <div class="appendHotelDetails">\
                                    </div>\
                                    <div class="form-group">\
                                        <label>Amenities</label>\
                                        <div class="customAmenitiesReviewsCls cFCInclusionsCls" style="display: inline-block;width: 100%;"> \
                                        </div> \
                                        <a href="javascript:;" class="addmorelnk addAmenitiesReviewsCls"  data-id="'+hotalId+'">Add More</a>\
                                    </div>\
                                </div>\
                            </div>\
                        </div>\
                    </div>\
                    <div class="flwSubTitleCls">\
                        Upscales\
                    </div>\
                    <div class="partOneCls">\
                        <div class="appendUpScalesPerfect'+hotalId+'">\
                         <div class="UpScRow'+hotalId+'"></div>\
                        </div>\
                        <div class="row">\
                            <div class="col-sm-12">\
                                <input type="hidden" name="expUpScalesRow" class="expUpScalesRow" value="1">\
                                <div class="addmorelnk addUpScalesPerfect auspCls'+hotalId+'" data-id="'+hotalId+'">Add more upscales</div>\
                            </div>\
                        </div>\
                    </div>\
                </div>';
        $('.HotelAppendCls').append(htmls);
        dropZoneFileUpload('.dropzone_galleryGal'+hotalId);
        $('.auspCls'+hotalId).trigger('click');
        select2Load();
        previewImageFun();
        hotelSearchfunction();
        hotelCntSet();
    });
    $(document).on('click', '.addExpVipBtn', function() {
        var thisCls = $(this).attr('data-cls');
        var thisId = $(this).attr('data-id');
        var expVipRow = $('.expVipRow').val();
        expVipRow = parseInt(expVipRow);
        expVipRow = expVipRow + 1;
        $('.expVipRow').val(expVipRow);
        var htmls = '';
        htmls += '<div class="partOneCls">\
                <div class="append3VipExperiences">\
                    <div class="row">\
                        <div class="col-sm-12">\
                            <div class="row">\
                                <div class="col-sm-11">\
                                </div>\
                                <div class="col-sm-1">\
                                    <div class="form-group">\
                                        <label for="Location1">&nbsp;</label>\
                                        <a href="javascript:;" class="removeExperiencesExpCls redCls"><i class="fas fa-minus-circle"></i></a>\
                                    </div>\
                                </div>\
                            </div>\
                            <div class="form-group">\
                                <label for="Location1d">Experiences</label>\
                                <select class="selectCls form-control expChange" name="step3['+thisId+']['+expVipRow+'][exp_id]" required="" data-msg-required="Please select experience" data-experience="">\
                                    <option value="">Select One</option>\
                                    <?php
                                    if(!empty($vipList)){
                                        foreach ($vipList as $key => $value) {
                                            echo '<option value="'.$value->id.'">'.addslashes($value->name).'</option>';
                                        }
                                    }
                                    ?>\
                                </select>\
                            </div>\
                        </div>\
                    </div>\
                </div>\
                <hr>\
            </div>';
        $(thisCls).append(htmls);
        dropZoneFileUpload('.dropzone_gallery'+thisId+'-'+expVipRow);
        squareFunctionLoad();
        select2Load();
    });
    $(document).on('click', '.addExpBBBtn', function() {
        var thisCls = $(this).attr('data-cls');
        var thisId = $(this).attr('data-id');
        var expVipRow = $('.expVipRow').val();
        expVipRow = parseInt(expVipRow);
        expVipRow = expVipRow + 1;
        $('.expVipRow').val(expVipRow);
        var htmls = '';
        htmls += '<div class="partOneCls">\
                <div class="append3VipExperiences">\
                    <div class="row">\
                        <div class="col-sm-12">\
                            <div class="row">\
                                <div class="col-sm-11">\
                                </div>\
                                <div class="col-sm-1">\
                                    <div class="form-group">\
                                        <label for="Location1">&nbsp;</label>\
                                        <a href="javascript:;" class="removeExperiencesExpCls redCls"><i class="fas fa-minus-circle"></i></a>\
                                    </div>\
                                </div>\
                            </div>\
                            <div class="form-group">\
                                <label for="Location1d">Experiences</label>\
                                <select class="selectCls form-control expChange" name="step3['+thisId+']['+expVipRow+'][exp_id]" required="" data-msg-required="Please select experience" data-experience="">\
                                    <option value="">Select One</option>\
                                    <?php
                                    if(!empty($bigBannerList)){
                                        foreach ($bigBannerList as $key => $value) {
                                            echo '<option value="'.$value->id.'">'.addslashes($value->name).'</option>';
                                        }
                                    }
                                    ?>\
                                </select>\
                            </div>\
                        </div>\
                    </div>\
                </div>\
                <hr>\
            </div>';
        $(thisCls).append(htmls);
        dropZoneFileUpload('.dropzone_gallery'+thisId+'-'+expVipRow);
        squareFunctionLoad();
        select2Load();
    });
    $(document).on('click', '.addExpLocalBtn', function() {
        var thisCls = $(this).attr('data-cls');
        var thisId = $(this).attr('data-id');
        var expVipRow = $('.expVipRow').val();
        expVipRow = parseInt(expVipRow);
        expVipRow = expVipRow + 1;
        $('.expVipRow').val(expVipRow);
        var htmls = '';
        htmls += '<div class="partOneCls">\
                <div class="append3VipExperiences">\
                    <div class="row">\
                        <div class="col-sm-12">\
                            <div class="row">\
                                <div class="col-sm-11">\
                                </div>\
                                <div class="col-sm-1">\
                                    <div class="form-group">\
                                        <label for="Location1">&nbsp;</label>\
                                        <a href="javascript:;" class="removeExperiencesExpCls redCls"><i class="fas fa-minus-circle"></i></a>\
                                    </div>\
                                </div>\
                            </div>\
                            <div class="form-group">\
                                <label for="Location1d">Experiences</label>\
                                <select class="selectCls form-control expChange" name="step3['+thisId+']['+expVipRow+'][exp_id]" required="" data-msg-required="Please select experience" data-experience="">\
                                    <option value="">Select One</option>\
                                    <?php
                                    if(!empty($localList)){
                                        foreach ($localList as $key => $value) {
                                            echo '<option value="'.$value->id.'">'.addslashes($value->name).'</option>';
                                        }
                                    }
                                    ?>\
                                </select>\
                            </div>\
                        </div>\
                    </div>\
                </div>\
                <hr>\
            </div>';
        $(thisCls).append(htmls);
        dropZoneFileUpload('.dropzone_gallery'+thisId+'-'+expVipRow);
        squareFunctionLoad();
        select2Load();
    });

$(document).on('click', '.removeExperiencesExpCls', function() {
    var _this = $(this);
    $('.loader').show();   
    var exp_att_id  = $(this).attr('exp_att_id');
    var exp_id  = $(this).attr('exp_id');
    $.ajax({
        url: base_url+'/super-user/delete-exp',
        type: 'POST',
         // dataType: 'json',
        data: {'exp_att_id':exp_att_id, 'exp_id':exp_id},
        success: function(data) {
            $('.loader').hide(); 
            _this.closest('.partOneCls').remove();
        },
        error: function(e) {
        }
    });
});


/*$(document).on('click', '.nextBtnCls', function() {
    if($(this).attr('data-nextid') == 8){
        
    }
});
$(document).on('click', '.tslc_7', function() {
    var count = 0;
    $(".hotelChange").each(function( index ) {
        var type = $( this ).closest('.hotelRowCls').find('.appendHotelDetails');
        var hotel_type = type.find('select').first().val();
        count++;
    });
    $(".hotelChange").each(function( index ) {
        var hotelDiv = $('.hotelDiv').length;
        var upgradeLength = $('.appendDates8Step2 > div.row').length;
        var type = $( this ).closest('.hotelRowCls').find('.appendHotelDetails');
        var hotel_type = type.find('select').first().val();
        var hotel = $( this ).val();
        var parentDiv = $('.parentDiv').first();
        if((hotelDiv < count) && (hotelDiv == index)){
            $('.addHotel').first().click();
            parentDiv.find('select.hotelDropDown:last').val(hotel);
        }else if(hotelDiv == 1 && index == 0){
            parentDiv.find('select.hotelDropDown:last').val(hotel);
        }
        select2Load();
    });
});*/


$(document).on('click', '.saveDates', function() {
    $('.submitButton').click();
});
$(document).on('click', '.editDate', function() {
	if($(this).hasClass('booked_hotel'))
	{
		if(confirm("By confirming this change the Collaborator will need to re-sign the ETC. Please confirm this is ok with you?"))
        {
             var pointerNone = $(this).closest('.parentDiv').find('.pointerNone');
		    var saveDates = $(this).closest('.parentDiv').find('.saveDates');
		    var labelDiv = $(this).closest('.parentDiv').find('.labelDiv');
		    labelDiv.hide();
		    var radioDiv = $(this).closest('.parentDiv').find('.radioDiv');
		    radioDiv.show();
		    var removeHotelDiv = $(this).closest('.parentDiv').find('.removeHotelDiv');
		    removeHotelDiv.show();
		    var parentDiv = $(this).closest('.parentDiv');
		    parentDiv.css('border-color','orange');
		    var addHotel = $(this).closest('.parentDiv').find('.addHotel');
		    pointerNone.removeAttr('readonly');
		    pointerNone.removeClass('pointerNone');
		    $('.editDate').hide();
		    $('.addAnotherDate').hide();
		    saveDates.show();
		    addHotel.show();

        }
        else
        {
            return false;
        }
	}
	else
	{
		var pointerNone = $(this).closest('.parentDiv').find('.pointerNone');
	    var saveDates = $(this).closest('.parentDiv').find('.saveDates');
	    var labelDiv = $(this).closest('.parentDiv').find('.labelDiv');
	    labelDiv.hide();
	    var radioDiv = $(this).closest('.parentDiv').find('.radioDiv');
	    radioDiv.show();
	    var removeHotelDiv = $(this).closest('.parentDiv').find('.removeHotelDiv');
	    removeHotelDiv.show();
	    var parentDiv = $(this).closest('.parentDiv');
	    parentDiv.css('border-color','orange');
	    var addHotel = $(this).closest('.parentDiv').find('.addHotel');
	    pointerNone.removeAttr('readonly');
	    pointerNone.removeClass('pointerNone');
	    $('.editDate').hide();
	    $('.addAnotherDate').hide();
	    saveDates.show();
	    addHotel.show();
	}
    
});
$(document).on('click', '.removeHotelDiv', function() {
    var exp_dates_id  = $(this).attr('data-id');
    if(exp_dates_id != ''){
        var _this = $(this);
        $('.loader').show();   
        $.ajax({
            url: base_url+'/super-user/delete-hotel-date-rate',
            type: 'POST',
             // dataType: 'json',
            data: {'experience_dates_id':exp_dates_id},
            success: function(data) {
                $('.loader').hide(); 
                _this.closest('.hotelDiv').remove();
            },
            error: function(e) {
            }
        });
    }else{
        $(this).closest('.hotelDiv').remove();
    }
});
$(document).on('click', '.removeDatesRates', function() {
    var exp_dates_rates_id  = $(this).attr('data-id');
    if(exp_dates_rates_id != ''){
        var _this = $(this);
        $('.loader').show();   
        $.ajax({
            url: base_url+'/super-user/delete-exp-dates-rates',
            type: 'POST',
             // dataType: 'json',
            data: {'experience_dates_rates_id':exp_dates_rates_id},
            success: function(data) {
                $('.loader').hide(); 
                _this.closest('.parentDiv').remove();
            },
            error: function(e) {
            }
        });
    }
});
$(document).on('click', '.removeParentDiv', function() {
    $(this).closest('.parentDiv').remove();
    $('.editDate').show();
    $('.addAnotherDate').show();
});
$('#Location1').on('change',function(){
    //var assign_river = $('option:selected', this).attr('data-river');   
    var id = $(this).val();
    var url = "/super-user/get-countryarea-data?country="+id;
        $.ajax({
                type: "get",
                url: url,
                /* data: {
                        rivers:assign_river
                },*/
                success: function(html) {
                    $(".countryareacls").html(html);
                }
        });
 });
$(document).on('click', '.addAnotherDate', function() {
    $('.editDate').hide();
    $(this).hide();
    var parentDivlast = $('.appendParentDiv').find('.parentDiv:last');
    var parentDivKey = parseInt(parentDivlast.attr('data-key'));
    const sum = parentDivKey + 1;

    var htmls = '';
    htmls += '<div class="parentDiv" data-key="'+sum+'" style="border: 3px solid #ddd;border-radius: 5px;margin: 15px 0px;min-height: 100px;">\
                <a href="javascript:;" style="float: right;color: #fff;background: red;padding: 3px 8px;top: -15px;position: relative;right: -15px;border-radius: 50%;font-size: 12px;" class="removeParentDiv"><i class="fa fa-times fa-2x"></i></a>\
                <input type="hidden" name="step8[tour]['+sum+'][dates_rates_id]" value="">\
                    <div class="appendHotel">\
                        <div class="hotelDiv" data-key="0">\
                            <div style="border: 1px solid #ddd;border-radius: 5px;margin: 15px;padding: 20px;">\
                                <div class="form-group">\
                                    <input type="hidden" name="step8[tour]['+sum+'][hotel][0][experience_hotel_date_id]" value="">\
                                    <input type="hidden" name="step8[tour]['+sum+'][hotel][0][experience_date_id]" value="">\
                                    <label>Choose a hotel</label>\
                                    <select class="form-control hotelDropDown" name="step8[tour]['+sum+'][hotel][0][hotel_id]" required="">\
                                        <option value="">Select One</option>\
                                        <?php 
                                            if(!empty($hotelList)){
                                            foreach ($hotelList as $key => $value) {
                                             ?>
                                                <option value="{{$value->id}}">{{$value->name}}</option>\
                                            <?php } } ?>
                                    </select>\
                                </div>\
                                <div class="form-group">\
                                    <label>Dates</label>\
                                    <select class="form-control datesDropDown" name="step8[tour]['+sum+'][hotel][0][date]" required="">\
                                        <option value="">-</option>\
                                    </select>\
                                </div>\
                                <div class="form-group" style="display: inline-flex;width: 100%;margin-bottom:2px;">\
                                    <label style="font-weight: bold;color: black;width: 50px;font-size: 16px;margin-right: 10px;">Type:</label>\
                                    <div class="form-check form-check-inline">\
                                      <input class="form-check-input" type="radio" name="step8[tour]['+sum+'][hotel][0][type]" id="inlineRadio1'+sum+'0" value="1" required>\
                                      <label class="form-check-label" for="inlineRadio1'+sum+'0" style="font-size: 0.98rem;color: #495057;">Standard</label>\
                                    </div>\
                                    <div class="form-check form-check-inline">\
                                      <input class="form-check-input" type="radio" name="step8[tour]['+sum+'][hotel][0][type]" id="inlineRadio2'+sum+'0" value="0" required>\
                                      <label class="form-check-label" for="inlineRadio2'+sum+'0" style="font-size: 0.98rem;color: #495057;">Upscale</label>\
                                    </div>\
                                </div>\
                            </div>\
                        </div>\
                    </div>\
                    <div class="col-sm-12">\
                        <div class="row">\
                            <div class="col-sm-12">\
                                <a href="javascript:;" class="addHotel" style="color:orange;margin-bottom: 20px;">Combine this date with another hotel</a>\
                            </div>\
                        </div>\
                        <div class="row">\
                            <div class="col-sm-12">\
                                <label style="margin-top: 15px;">Tour rate</label>\
                            </div>\
                            <div class="col-sm-2">\
                                <div class="form-group">\
                                    <label>Currency</label>\
                                    <select class="form-control" name="step8[tour]['+sum+'][currency]" required>\
                                        <option value="1">&pound;</option>\
                                    </select>\
                                </div>\
                            </div>\
                            <div class="col-sm-2">\
                                <div class="form-group">\
                                    <label>Rate</label>\
                                    <input type="text" class="form-control" name="step8[tour]['+sum+'][rate]" required>\
                                </div>\
                            </div>\
                            <div class="col-sm-2">\
                                <div class="form-group">\
                                    <label>SRS</label>\
                                    <input type="text" class="form-control" name="step8[tour]['+sum+'][srs]" required>\
                                </div>\
                            </div>\
                            <div class="col-sm-2">\
                                <div class="form-group">\
                                    <label>Deposit</label>\
                                    <input type="text" class="form-control" name="step8[tour]['+sum+'][deposit]" required>\
                                </div>\
                            </div>\
                            <div class="col-sm-2">\
                                <div class="form-group">\
                                    <label>Single SRS</label>\
                                    <input type="text" class="form-control" name="step8[tour]['+sum+'][single_srs]" required>\
                                </div>\
                            </div>\
                            <div class="col-sm-2">\
                                <div class="form-group">\
                                    <label>Double SRS</label>\
                                    <input type="text" class="form-control" name="step8[tour]['+sum+'][double_srs]" required>\
                                </div>\
                            </div>\
							<div class="col-sm-2">\
                                <div class="form-group">\
                                    <label>Twin SRS</label>\
                                    <input type="text" class="form-control" name="step8[tour]['+sum+'][twin_srs]" required>\
                                </div>\
                            </div>\
                            <div class="col-sm-2">\
                                <div class="form-group">\
                                    <label>Triple SRS</label>\
                                    <input type="text" class="form-control" name="step8[tour]['+sum+'][triple_srs]" required>\
                                </div>\
                            </div>\
                            <div class="col-sm-2">\
                                <div class="form-group">\
                                    <label>Quad SRS</label>\
                                    <input type="text" class="form-control" name="step8[tour]['+sum+'][quad_srs]" required>\
                                </div>\
                            </div>\
                            <div class="col-sm-2">\
                                <div class="form-group">\
                                    <label>Driver SRS</label>\
                                    <input type="text" class="form-control" name="step8[tour]['+sum+'][driver_srs]" required>\
                                </div>\
                            </div>\
                            <div class="col-sm-12">\
                            <a href="javascript:;" class="btn orangeLink saveDates" style="margin-bottom: 20px;">Save Date</a>\
                            </div>\
                        </div>\
                    </div>\
                </div>';
    $('.appendParentDiv').append(htmls);
});
$(document).on('click', '.addHotel', function() {
    var appendHotel = $(this).closest('.parentDiv').find('.appendHotel');
    var parentDivKey = parseInt($(this).closest('.parentDiv').attr('data-key'));
    const sum = parentDivKey;
    const hotelsum = parseInt(appendHotel.find('.hotelDiv:last').attr('data-key'))+1;
    var htmls = '';
    htmls += '<div class="hotelDiv" data-key="'+hotelsum+'"><div class="col-sm-12"><b>Combined with</b><a href="javascript:;" style="float:right;color:red;" class="removeHotelDiv" data-id=""><i class="fa fa-times fa-2x"></i></a></div>\
              <div style="border: 1px solid #ddd;border-radius: 5px;margin: 15px;padding: 20px;">\
                <div class="form-group">\
                    <input type="hidden" name="step8[tour]['+sum+'][hotel]['+hotelsum+'][experience_hotel_date_id]" value="">\
                    <input type="hidden" name="step8[tour]['+sum+'][hotel]['+hotelsum+'][experience_date_id]" value="">\
                    <label>Choose a hotel</label>\
                    <select class="form-control hotelDropDown" name="step8[tour]['+sum+'][hotel]['+hotelsum+'][hotel_id]" required="">\
                        <option value="">Select One</option>\
                        <?php 
                            if(!empty($hotelList)){
                            foreach ($hotelList as $key => $value) {
                             ?>
                                <option value="{{$value->id}}">{{$value->name}}</option>\
                            <?php } } ?>
                    </select>\
                </div>\
                <div class="form-group">\
                    <label>Dates</label>\
                    <select class="form-control datesDropDown" name="step8[tour]['+sum+'][hotel]['+hotelsum+'][date]" required="">\
                        <option value="">-</option>\
                    </select>\
                </div>\
                <div class="form-group" style="display: inline-flex;width: 100%;margin-bottom:2px;">\
                    <label style="font-weight: bold;color: black;width: 50px;font-size: 16px;margin-right: 10px;">Type:</label>\
                    <div class="form-check form-check-inline">\
                      <input class="form-check-input" type="radio" name="step8[tour]['+sum+'][hotel]['+hotelsum+'][type]" id="inlineRadio1'+sum+hotelsum+'" value="1" required>\
                      <label class="form-check-label" for="inlineRadio1'+sum+hotelsum+'" style="font-size: 0.98rem;color: #495057;">Standard</label>\
                    </div>\
                    <div class="form-check form-check-inline">\
                      <input class="form-check-input" type="radio" name="step8[tour]['+sum+'][hotel]['+hotelsum+'][type]" id="inlineRadio2'+sum+hotelsum+'" value="0" required>\
                      <label class="form-check-label" for="inlineRadio2'+sum+hotelsum+'" style="font-size: 0.98rem;color: #495057;">Upscale</label>\
                    </div>\
            </div></div>';
    appendHotel.append(htmls);
});
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
$(document).ready(function(){
    var hotel_id = $('#brochureHotels').val();
    if(hotel_id != ''){
        brochureStar(hotel_id);
    }
});
$(document).on('change', '#brochureHotels', function() {
    var hotel_id = $(this).val();
    brochureStar(hotel_id);
});
function brochureStar(hotel_id){
    $('.loader').show();    
    $.ajax({
        url: base_url+'/super-user/get-brochure-hotel',
        type: 'POST',
         dataType: 'json',
        data: {'hotel_id':hotel_id},
        success: function(data) {
            $('.loader').hide(); 
            $('#addStarsHere').html(data.html);
        },
        error: function(e) {
        }
    });
}
$(document).on('click', '.addIncluCls', function() {
    var idd = $(this).attr('data-id');
    var thisVal = $(this).closest('div').find('.inclusions_list');
    var htmls = '';
    htmls += '<li>\
                <i class="far fa-check-circle"></i>\
                <span class="insert">\
                    <div class="text">\
                        <input type="text" class="form-control" style="float:left;width:90%;" name="step9[inclusions][]">\
                        <a href="javascript:;" class="removeInclubtn" style="font-size: 30px;line-height: 35px;color: red;padding: 5px;">x</a>\
                    </div>\
                </span>\
            </li>';
    thisVal.append(htmls);
});

$(document).on('click', '.removeInclubtn', function() {
    $(this).closest('li').remove();
});

$(document).on('change', '#hotelsDropdown', function() {
    var hotel_id = $(this).val();
    $('.loader').show();    
    $.ajax({
        url: base_url+'/super-user/get-brochure-images',
        type: 'POST',
         dataType: 'json',
        data: {'hotel_id':hotel_id},
        success: function(data) {
            $('.loader').hide(); 
            $('#appdBrochueImages').html(data.html);
        },
        error: function(e) {
        }
    });
});
$(document).on('click', '.addImageBrochure1', function() {
    $('#brochureModal').addClass('addImageBrochure11'); 
    $('#brochureModal').modal('show'); 
});
$(document).on('click', '.addImageBrochure2', function() {
    $('#brochureModal').addClass('addImageBrochure22'); 
    $('#brochureModal').modal('show'); 
});
$(document).on('click', '.addImageBrochure3', function() {
    $('#brochureModal').addClass('addImageBrochure33'); 
    $('#brochureModal').modal('show'); 
});
$(document).on('click', '.addImgToBrochur', function() {
    if($(this).closest('#brochureModal').hasClass('addImageBrochure11')){
        $('#image_1').val($(this).attr('src'));
        $('.addImageBrochure1').html('<img src="'+$(this).attr('src')+'">');
    }else if($(this).closest('#brochureModal').hasClass('addImageBrochure22')){
        $('#image_2').val($(this).attr('src'));
        $('.addImageBrochure2').html('<img src="'+$(this).attr('src')+'">');
    }else if($(this).closest('#brochureModal').hasClass('addImageBrochure33')){
        $('#image_3').val($(this).attr('src'));
        $('.addImageBrochure3').html('<img src="'+$(this).attr('src')+'">');
    }
    $('#brochureModal').modal('hide'); 
    $('#brochureModal').removeClass('addImageBrochure11'); 
    $('#brochureModal').removeClass('addImageBrochure22'); 
    $('#brochureModal').removeClass('addImageBrochure33'); 
});
$(document).on('change', '#expDropdown', function() {
    var exp_id = $(this).val();
    $('.loader').show();    
    $.ajax({
        url: base_url+'/super-user/get-brochure-images',
        type: 'POST',
         dataType: 'json',
        data: {'exp_id':exp_id},
        success: function(data) {
            $('.loader').hide(); 
            $('#appdBrochueImages').html(data.html);
        },
        error: function(e) {
        }
    });
});
$(document).on('click', '#etc-tpl', function() {
	if($('.nextBtnCls').attr('data-nextid') == 11){
		$('.nextBtnCls').show();	
	}
});
$(document).on('click', '.nextBtnCls', function() {
    if($(this).attr('data-nextid') == 11){
		$('.nextBtnCls').show();	
    }
});

 $(document).on('click', '.add_gallary_img', function() {
       var dataid = $(this).attr('data-id');
        var htmls = '';
        var cnt = $(this).parent().prev('.add_more_upload').children('.image_galllernew').length;

        htmls += '<div class="col-md-3 image_galllernew">\
                    <div class="form-group">\
                        <label>Image description:</label><div class="deleteImage text-danger deleteGalleryImgNewtemp" ><i class="fa fa-trash" maxlength="100" aria-hidden="true"></i></div>\
                            <input type="text" name="step6[carouselnew]['+dataid+'][image_name][]" value="" class="form-control mb-2">\
                            <label>Order :</label> <input type="text" name="step6[carouselnew]['+dataid+'][image_order][]" class="form-control mb-2" maxlength="2" value="'+(parseInt(cnt)+1)+'">\
                        <input type="file" name="step6[carouselnew]['+dataid+'][image][]" class="form-control" >\
                    </div>\
                </div>';
        $(this).parent().prev('.add_more_upload').append(htmls);
       
    });
 
</script>