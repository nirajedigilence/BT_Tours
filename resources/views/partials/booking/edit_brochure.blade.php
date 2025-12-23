<div class="white_part">
    <div class="flwMainTitleCls">
        Brochure view - Layout 1
    </div>
    <div class="flwSubTitleCls">
        
        <div class="brochure">
            <form method="POST" action="{{route('brochure-update')}}" accept-charset="UTF-8" enctype="multipart/form-data" class="tourCompleteSteps" id="tourCompleteSteps" novalidate="novalidate">
                @csrf
            <div class="brochure_view account" style="max-width: 90%;">

                <div class="banner"></div>

                <div class="page">

                    <div class="header">

                        <div class="logo_wrapper">
                            <div class="logo">
                                <img src="{{ asset('images/logo2x.png') }}">
                            </div>
                        </div>

                    </div>

                    <div class="body">

                        <div class="column">
                            <?php
                            $image_1 = '';
                            if(isset($brochures->image_1) && !empty($brochures->image_1)){
                                $image_1 = $brochures->image_1;
                            }
                            ?>
                            <input type="hidden" name="step9[image_1]" value="{{!empty($image_1) ? $image_1 : ''}}" id="image_1">
                            <a href="javascript:;" class="insert image addImageBrochure1">
                                <?php
                                if(!empty($image_1)){
                                    echo '<img src="'.$image_1.'">';
                                }else{
                                ?>
                                    <div class="icon">
                                        <i class="fas fa-images"></i>
                                    </div>
                                    <div class="plus"></div>
                                <?php } ?>
                            </a>

                            <div class="heading">
                                {{@$experience->name}}
                            </div>

                            <div class="price">
                                &pound;<input type="text" name="step9[rate_pp]" style="width: 60px;font-weight: bold;" value="{{(isset($brochures->rate_pp) ? $brochures->rate_pp : @$experience->rate)}}"> sharing pp / &pound;<input type="text" name="step9[srs_pp]" style="width: 60px;font-weight: bold;" value="{{(isset($brochures->srs_pp) ? $brochures->srs_pp : @$experience->srs)}}"> single pp
                            </div>

                            <span class="insert">
                                <div class="text">
                                    <input type="hidden" name="step9[brochure_id]" value="{{isset($brochures) ? $brochures->id : ''}}">
                                    <textarea id="textarea_1_step9" class="form-control" name="step9[textarea_1]">{{isset($brochures) ? $brochures->textarea_1 : ''}}</textarea>
                                </div>
                            </span>

                            <span class="insert">
                                <div class="text">
                                    <textarea class="form-control" id="textarea_2_step9"name="step9[textarea_2]">{{isset($brochures) ? $brochures->textarea_2 : ''}}</textarea>
                                </div>
                            </span>

                            <span class="insert">
                                <div class="text">
                                    <textarea class="form-control" id="textarea_3_step9"name="step9[textarea_3]">{{isset($brochures) ? $brochures->textarea_3 : ''}}</textarea>
                                </div>
                            </span>
                            <?php
                            $image_2 = '';
                            if(isset($brochures->image_2) && !empty($brochures->image_2)){
                                $image_2 = $brochures->image_2;
                            }
                            ?>
                            <input type="hidden" name="step9[image_2]" value="{{!empty($image_2) ? $image_2 : ''}}" id="image_2">
                            <a href="javascript:;" class="insert image addImageBrochure2">
                                <?php
                                if(!empty($image_2)){
                                    echo '<img src="'.$image_2.'">';
                                }else{
                                ?>
                                    <div class="icon">
                                        <i class="fas fa-images"></i>
                                    </div>
                                    <div class="plus"></div>
                                <?php } ?>
                            </a>

                        </div>

                        <div class="column">

                            <span class="insert">
                                <div class="text">
                                    <textarea class="form-control" id="textarea_4_step9"name="step9[textarea_4]">{{isset($brochures) ? $brochures->textarea_4 : ''}}</textarea>
                                </div>
                            </span>
                            <?php
                            $image_3 = '';
                            if(isset($brochures->image_3) && !empty($brochures->image_3)){
                                $image_3 = $brochures->image_3;
                            }
                            ?>
                            <input type="hidden" name="step9[image_3]" value="{{!empty($image_3) ? $image_3 : ''}}" id="image_3">
                            <a href="javascript:;" class="insert image addImageBrochure3">
                                <?php
                                if(!empty($image_3)){
                                    echo '<img src="'.$image_3.'">';
                                }else{
                                ?>
                                    <div class="icon">
                                        <i class="fas fa-images"></i>
                                    </div>
                                    <div class="plus"></div>
                                <?php } ?>
                            </a>
                            

                            <span class="insert">
                                <div class="text">
                                    <textarea class="form-control" id="textarea_5_step9" name="step9[textarea_5]">{{isset($brochures) ? $brochures->textarea_5 : ''}}</textarea>
                                </div>
                            </span>

                            <div class="rating">
                                <div class="label">
                                    <select class="form-control" name="step9[hotel_id]" id="brochureHotels">
                                        <option value="">-Select Hotel-</option>
                                        <?php
                                        if(!empty($experiencesToHotelList)){
                                            foreach ($experiencesToHotelList as $key => $value) {
                                                $selected = '';
                                                if(isset($value->getHotelDetail) && !empty($value->getHotelDetail)){
                                                    if(isset($brochures) && $brochures->hotel_id == $value->getHotelDetail->id){
                                                        $selected = 'selected';
                                                    }
                                                    echo '<option value="'.$value->getHotelDetail->id.'" '.$selected.'>'.$value->getHotelDetail->name.'</option>';
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="stars" id="addStarsHere">
                                    
                                </div>
                            </div>

                            <span class="insert">
                                <div class="text">
                                    <textarea class="form-control" id="textarea_6_step9" name="step9[textarea_6]">{{isset($brochures) ? $brochures->textarea_6 : ''}}</textarea>
                                </div>
                            </span>

                            <div class="sub_heading">
                                What's Included
                            </div>

                            <ul class="inclusions_list" style="margin-bottom:0px;">
                                <?php
                                $brochureInclusions = array();
                                if(isset($brochures->inclusions) && !empty($brochures->inclusions)){
                                    $brochureInclusions = unserialize($brochures->inclusions);
                                }
                                if(!empty($brochureInclusions)){
                                    foreach ($brochureInclusions as $key => $value) {
                                        ?>
                                        <li>
                                            <i class="far fa-check-circle"></i>
                                            <span class="insert">
                                                <div class="text">
                                                    <input type="text" class="form-control" style="float:left;width:90%;" name="step9[inclusions][]" value="{{$value}}">
                                                    <a href="javascript:;" class="removeInclubtn" style="font-size: 30px;line-height: 35px;color: red;padding: 5px;">x</a>
                                                </div>
                                            </span>
                                        </li>
                                        <?php
                                    }
                                }else{
                                ?>
                                <li>
                                    <i class="far fa-check-circle"></i>
                                    <span class="insert">
                                        <div class="text">
                                            <input type="text" class="form-control" name="step9[inclusions][]" style="float:left;width:90%;">
                                            <a href="javascript:;" class="removeInclubtn" style="font-size: 30px;line-height: 35px;color: red;padding: 5px;">x</a>
                                        </div>
                                    </span>
                                </li>
                            <?php } ?>
                            </ul>
                            <a href="javascript:;" class="addmorelnk addIncluCls" style="text-align: right;padding-bottom: 20px;">Add More</a>
                            <ul class="hotel_details">

                                <li style="display: unset;">
                                    <i class="far fa-calendar-alt"></i>
                                    <div>
                                    <?php
                                    $brochureDates = array();
                                    if(isset($brochures->dates) && !empty($brochures->dates)){
                                        $brochureDates = unserialize($brochures->dates);
                                    }
                                    $optionsHtml = '';
                                    if(!empty($experienceDatesRates)){
                                        foreach ($experienceDatesRates as $key => $value) {
                                            if (isset($experience->еxperiencesToHotelsToExperienceDates)){
                                                foreach ($experience->еxperiencesToHotelsToExperienceDates as $k => $rec){
                                                    if (isset($rec->experienceDate)){
                                                        if ($value->id == $rec->experienceDate->dates_rates_id){
                                                            $date_from = $rec->experienceDate->date_from;
                                                            $date_to = $rec->experienceDate->date_to;
                                                            $date = convert2DMYForHotelDates($date_from).' - '.convert2DMYForHotelDates($date_to).' ('.$rec->experienceDate->nights.' nights)';
                                                            
                                                            $selectedd = '';
                                                            if(in_array($date,$brochureDates)){
                                                                $selectedd = 'selected';
                                                            }
                                                            $optionsHtml .= '<option value="'.$date.'" '.$selectedd.'>'.$date.'</option>';
                                                            

                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                    if(!empty($optionsHtml)){
                                    ?>
                                        <select class="form-control selectCls" name="step9[dates][]" multiple>
                                            <?php echo $optionsHtml; ?>
                                        </select>
                                    <?php }else{ ?>
                                        <input type="text" name="step9[dates][]" class="form-control" value="{{isset($brochureDates[0]) ? $brochureDates[0] : ''}}">
                                    <?php } ?>
                                    </div>
                                </li>

                                <li style="display: unset;">
                                    <i class="fas fa-utensils"></i>
                                    <div>
                                        <span class="insert">
                                            <div class="text">
                                                <input type="text" class="form-control" name="step9[breakfast]" value="{{isset($brochures) ? $brochures->breakfast : ''}}">
                                            </div>
                                        </span>
                                    </div>
                                </li>

                            </ul>

                        </div>

                    </div>

                    <div class="footer">
                        <div class="line blue"></div>
                        <div class="number">01753 836600</div>
                        <div class="line orange"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                    <input type="hidden" name="experienceId" value="{{$cart_experience->experiences_id}}">
                    <input type="hidden" name="cart_exp_id" value="{{$cart_experience->id}}">
                    <input style="font-size: 16px;" type="submit" name="submit" value="Save" class="orangeLink btn pullright submitButton" fdprocessedid="axpvff">
                    </div>
                </div>
                </div>

            </div>
            </form>
        </div>

    </div>
    <div class="partOneCls">
        
    </div>            
</div>

<div id="brochureModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Select Image</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <select class="form-control" id="hotelsDropdown">
            <option value="">-- Hotels --</option>
            <?php
            if(!empty($experiencesToHotelList)){
                foreach ($experiencesToHotelList as $key => $value) {
                    if(isset($value->getHotelDetail) && !empty($value->getHotelDetail)){
                        echo '<option value="'.$value->getHotelDetail->id.'">'.$value->getHotelDetail->name.'</option>';
                    }
                }
            }
            ?>
        </select>
        <span style="text-align:center;width: 100%;display: inline-block;">--- OR ---</span>
        <select class="form-control" id="expDropdown">
            <option value="">-- Experiences --</option>
            <?php
            if(!empty($experience->experienceAttractions)){
                foreach ($experience->experienceAttractions as $key => $value) {
                    echo '<option value="'.$value->id.'">'.$value->name.'</option>';
                }
            }
            ?>
        </select>
        <div id="appdBrochueImages"></div>
      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
  /*  $("body").on('blur', '.valid', function(){ 
        //alert('hi');
        //var edit_class = $(this).parent().parent().parent().children().children(".editDate").hasClass('booked_hotel');
        if($(this).parent().parent().parent().children().children(".editDate").hasClass('booked_hotel'))
        {
            var cart_id = $(this).parent().parent().parent().children().children(".editDate").attr('data-cart_id');
            $('.selected_tour').append('<input type="hidden" name="selected_tour[]" value="'+cart_id+'">');
            $('#is_changed').val('1');
        }
        
    });*/
     
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
        /*  var editAbstract=CKEDITOR.instances["textarea_6_step9"];

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



$(document).on('click', '.saveDates', function() {
    $('.submitButton').click();
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
</script>