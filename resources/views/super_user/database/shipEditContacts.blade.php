<style type="text/css">
    .removeChild{display: none;}
    .form-clone .form-main .removeChild{display: block;}
</style>
<div class="popup_content">
    <a id="closePopup" href="javascript:;" style="float: right;color: red;font-size: 25px;">
        <i class="fas fa-times"></i>
    </a>
    <div class="heading">
        View Contacts
    </div>

    <div class="description">
        Here you can edit contacts and add notes
    </div>
    <form id="hotelData">
        <div class="sections">

            <input type="hidden" name="ship_detail_id" value="{{ isset($shipDetails->id) ? $shipDetails->id : '' }}">
            <input type="hidden" name="ship_id" value="{{ $shipDetails->id }}">
            <?php
            if(isset($shipDetails->contacts) && !empty($shipDetails->contacts)){
                $unserialize = unserialize($shipDetails->contacts);
                
                if(!empty($unserialize)){
                    foreach ($unserialize as $key => $value) {
                        $show = '';
                        if($key > 0){
                            $show = 'display:block;';
                        }
                        $checked = '';
                        if(isset($value['main_contact']) && $value['main_contact'] == 'on'){
                            $checked = 'checked="checked"';
                        }
                    ?>
                        <div class="section w_100 form-main" data-key="<?php echo $key; ?>">
                            <a href="javascript:;" class="removeChild" style="float: right;outline: none;text-decoration: underline;text-transform: uppercase;font-size: 14px;font-weight: bold;color: red;<?php echo $show; ?>">Remove</a>
                            <div class="form">
                                
                                <div class="grouped">
                                    <div class="fieldset half">
                                        <label>Contact card title</label>
                                        <input type="text" name="contacts[{{$key}}][title]" class="inputt" value="{{ $value['title'] }}" data-field="title">
                                    </div>
                                    <div class="fieldset half">
                                        <label>Name</label>
                                        <input type="text" class="inputt" name="contacts[{{$key}}][name]" value="{{ $value['name'] }}" data-field="name">
                                    </div>
                                </div>
                                <div class="grouped">
                                    <div class="fieldset half">
                                        <label>Position</label>
                                        <input type="text" class="inputt" name="contacts[{{$key}}][position]" value="{{ $value['position'] }}" data-field="position">
                                    </div>
                                    <div class="fieldset half">
                                        <label>Contact nr</label>
                                        <input type="text" class="inputt" name="contacts[{{$key}}][contact_number]" value="{{ $value['contact_number'] }}" data-field="contact_number">
                                    </div>
                                </div>
                                <div class="grouped">
                                    <div class="fieldset half">
                                        <label>Email</label>
                                        <input type="email" class="inputt" name="contacts[{{$key}}][email]" value="{{ $value['email'] }}" data-field="email">
                                    </div>
                                    <div class="fieldset half">
                                        <label>Short note</label>
                                        <input type="text" class="inputt" name="contacts[{{$key}}][short_note]" value="{{ $value['short_note'] }}" data-field="short_note">
                                    </div>
                                </div>
                                <div class="grouped">
                                    <div class="fieldset half">
                                        <label>Detailed note</label>
                                        <textarea class="inputt" name="contacts[{{$key}}][detailed_note]" data-field="detailed_note">{{ $value['detailed_note'] }}</textarea> 
                                    </div>
                                    <div style="margin:0 10px">
                                        <label>Main Contact</label>
                                        <input type="checkbox" class="chkbx" name="contacts[{{$key}}][main_contact]" data-field="main_contact" <?php echo $checked;?>>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                }
            }else{
            ?>
            <div class="section w_100 form-main" data-key="0">
                <a href="javascript:;" class="removeChild" style="float: right;outline: none;text-decoration: underline;text-transform: uppercase;font-size: 14px;font-weight: bold;color: red;">Remove</a>
                <div class="form">
                    
                    <div class="grouped">
                        <div class="fieldset half">
                            <label>Contact card title</label>
                            <input type="text" name="contacts[0][title]" class="inputt" value="" data-field="title">
                        </div>
                        <div class="fieldset half">
                            <label>Name</label>
                            <input type="text" class="inputt" name="contacts[0][name]" value="" data-field="name">
                        </div>
                    </div>
                    <div class="grouped">
                        <div class="fieldset half">
                            <label>Position</label>
                            <input type="text" class="inputt" name="contacts[0][position]" value="" data-field="position">
                        </div>
                        <div class="fieldset half">
                            <label>Contact nr</label>
                            <input type="text" class="inputt" name="contacts[0][contact_number]" value="" data-field="contact_number">
                        </div>
                    </div>
                    <div class="grouped">
                        <div class="fieldset half">
                            <label>Email</label>
                            <input type="text" class="inputt" name="contacts[0][email]" value="" data-field="email">
                        </div>
                        <div class="fieldset half">
                            <label>Short note</label>
                            <input type="text" class="inputt" name="contacts[0][short_note]" value="" data-field="short_note">
                        </div>
                    </div>
                    <div class="grouped">
                        <div class="fieldset half">
                            <label>Detailed note</label>
                            <textarea class="inputt" name="contacts[0][detailed_note]" data-field="detailed_note"></textarea> 
                        </div>
                        <div style="margin:0 10px">
                            <label>Main Contact</label>
                            <input type="checkbox" class="chkbx" name="contacts[0][main_contact]" data-field="main_contact">
                        </div>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>
            <div class="form-clone"></div>
        </div>
        <input type="button" name="submit" class="btn btn-primary" id="hotelFormSubmit" value="Save">
        <a href="javascript:;" class="btn btn-primary" id="add_new">Add another contact</a>
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