<style type="text/css">
    .removeChild{display: none;}
    .form-clone .form-main .removeChild{display: block;}
    h5{color: #14213D;}
    .blueB {
        background-color: #14213D;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        display: inline-block;
        width: auto;
    }
</style>
<div class="popup_content">
    <a id="closePopup" href="javascript:;" style="float: right;color: red;font-size: 25px;">
        <i class="fas fa-times"></i>
    </a>
    <div class="heading">
        Edit Notes
    </div>

    <div class="description">
        Here you can edit notes and details about the cruise
    </div>
    <form id="hotelNotesData">
        @csrf
        <div class="sectionsx">

         
            <input type="hidden" name="ship_id" value="{{ $ship_id }}">
            <div class="row">
               
                <?php if(!empty($experienceNotesDetails[0])) {
                    $i =1;
                    foreach($experienceNotesDetails as $key => $row)
                    {
                        ?>
                        <div class="col-md-5 m-2 border p-2">

                        <div class="main_heading">
                           <h5> Note {{$i}}  <span class="date" style="float: right;color: #8a909d;font-size: 12px;">Last edited {{date('H:i d/m/Y',strtotime($row->updated_at))}}</span></h5>
                          
                        </div>

                        <div class="add_note">

                                <label>
                                    Title 
                                </label>

                                <input type="text" name="title_{{$i}}" value="{{$row->title}}" class="form-control">

                              
                            </div>
                            <div class="add_note">

                                <label>
                                    Note
                                </label>

                                <textarea type="text" cols="3" name="note_{{$i}}" class="form-control">{{$row->notes}}</textarea>

                              
                            </div>
                    </div>
                        <?php
                        $i++;
                    } } else {
                    for($i=1;$i<=5;$i++){ ?> 
                        <div class="col-md-5 m-2 border p-2">

                            <div class="main_heading">
                               <h5> Note {{$i}}</h2>

                            </div>

                            <div class="add_note">

                                    <label>
                                        Title 
                                    </label>

                                    <input type="text" cols="3" name="title_{{$i}}" class="form-control">

                                  
                                </div>
                                <div class="add_note">

                                    <label>
                                        Note
                                    </label>

                                    <textarea type="text" name="note_{{$i}}" class="form-control"></textarea>

                                  
                                </div>
                        </div>
                    <?php } } ?>
                    
               
            </div>
            <div class="row">
                <input type="button" value="Cancel" id="closePopup" href="javascript:;" class="blueB" fdprocessedid="igx6g3">
                &nbsp;&nbsp;&nbsp;
                <input type="button" name="submit" class="btn btn-primary" id="hotelNotesFormSubmit" value="Submit">
            </div>
        </div>
    </form>
</div>
<script type="text/javascript">
    jQuery(document).ready(function() {
        // var i = 0;
        jQuery('#add_new').click(function(){
            var clone = jQuery('.form-main:last').clone(true);
            var i = clone.data('key');
            clone.find(".inputt").val('');
            i++;
            clone.data('key',i);
            clone.find('input,textarea').each(function() {
                const fieldname = jQuery(this).attr('data-field');
                jQuery(this).attr('name', 'contacts[' + i + '][' + fieldname + ']');
            });
            jQuery('.form-clone').append(clone);
        });

        jQuery('.removeChild').click(function(){
            jQuery(this).closest('div').remove();
        });
        $(document).on('click', '.chkbx', function() {      
            $('.chkbx').not(this).prop('checked', false);      
        });
    });
</script>