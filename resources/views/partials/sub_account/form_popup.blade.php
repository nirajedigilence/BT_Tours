 <!-- <div class="modal-header">
    <h4 class="ptitle">Additional Sub Account</h4>  
   
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div> -->
  <div class="modal-body">
     <div class="row">  
      <div class="col-sm-12">
        <div class="form-group">
          <h2 class="ptitle ml-4" style="color: #000000">Additional Sub Account</h2>  
        </div>
     </div>
     <div class="col-sm-12">
      <div class="form-group">
        <p class="ml-4">If you need to share the account with other people feel free to create additional accounts here.</p>
      </div>
     </div>
   </div>
   <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="px-6 bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="container">
            <?php if(!empty($collaborator_id)) {?> 
             <form id="EditForm" method="POST" action="{{ route('super.subaccount.info') }}" class="form" novalidate data-parsley-validate="">
              <?php } else { ?> 

                <form id="EditForm" method="POST" action="{{ route('subaccount.info') }}" class="form" novalidate data-parsley-validate="">
              <?php } ?>
              {{ csrf_field() }}
              <h5 class="field-title">Name</h5>
            <div class="row">  
              
              <div class="col-sm-4">
                 <div class="form-group">
                  <label style="color: #000">Job Title<span style="color:#F00">*</span></label>
                  <input type="text" name="title" id="title" maxlength="255" required="" class="form-control" value="<?php echo isset($subAccountInfo->title) ? $subAccountInfo->title : ''; ?>">
                </div>
              </div>
              <div class="col-sm-4">
                 <div class="form-group">
                  <label style="color: #000">First Name<span style="color:#F00">*</span></label>
                  <input type="text" name="first_name" id="first_name" maxlength="50"  required="" class="form-control" value="<?php echo isset($subAccountInfo->first_name) ? $subAccountInfo->first_name : ''; ?>">
                </div>
              </div>
              <div class="col-sm-4">
                 <div class="form-group">
                  <label style="color: #000">Last Name<span style="color:#F00">*</span></label>
                  <input type="text" name="last_name" id="last_name" maxlength="50"  required="" class="form-control" value="<?php echo isset($subAccountInfo->last_name) ? $subAccountInfo->last_name : ''; ?>">
                </div>
              </div>
          </div>
          <h5 class="field-title">Contact</h5>
          <div class="row">  
              
              <div class="col-sm-4">
                 <div class="form-group">
                  <label style="color: #000">Email Address<span style="color:#F00">*</span></label>
                  <input type="email" name="email" id="email" maxlength="50"  required="" class="form-control" value="<?php echo isset($subAccountInfo->email) ? $subAccountInfo->email : ''; ?>">
                </div>
              </div>
              <div class="col-sm-4">
                 <div class="form-group">
                  <label style="color: #000">Telephone Number</label>
                  <input type="text" name="telephone" id="telephone" maxlength="12" class="form-control" value="<?php echo isset($subAccountInfo->telephone) ? $subAccountInfo->telephone : ''; ?>">
                </div>
              </div>
             
          </div>
          <h5 class="field-title">Password</h5>
          <div class="row">  
              
              <div class="col-sm-4">
                 <div class="form-group">
                  <label style="color: #000">Password<?php echo !isset($subAccountInfo->id) ? '<span style="color:#F00">*</span>' : ''; ?></label>
                  <input type="password" <?php echo !isset($subAccountInfo->id) ? 'required=""' : ''; ?> maxlength="15" name="password" id="password" class="form-control" value="">
                </div>
              </div>
              <div class="col-sm-4">
                 <div class="form-group">
                  <label style="color: #000">Repeat Password<?php echo !isset($subAccountInfo->id) ? '<span style="color:#F00">*</span>' : ''; ?></label>
                  <input type="password" <?php echo !isset($subAccountInfo->id) ? 'required=""' : ''; ?> data-equalto="#password" maxlength="15" name="reapeatpassword" id="reapeatpassword" class="form-control" value="">
                </div>
              </div> 
          </div>
          <h5 class="field-title pb-2">Please select what section is accessible on this account</h5>
           <div class="row">  
              <?php $access_array = array();
              if(!empty($subAccountInfo->access_section)) {
                 $access_array = explode(',', $subAccountInfo->access_section);
              }
                ?>
              <div class="col-sm-12">
                    <div class="inclusionsSections">
                        <div class="checkarea_part_Dates">
                            <label class="checkbox_div">
                              <input type="checkbox" name="access_section[]" id="chk_booking" class="custom_chkbox tagchkbox notClickedCls " value="1" <?=(!empty($access_array) && in_array('1',$access_array))?'checked="checked"':''?> data-val="" > <span class="notClickedCls ">Booking </span>
                              <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
              </div>
              <div class="col-sm-12">
                    <div class="inclusionsSections">
                        <div class="checkarea_part_Dates">
                            <label class="checkbox_div">
                              <input type="checkbox" name="access_section[]" id="chk_bespoke" class="custom_chkbox tagchkbox notClickedCls " value="2" <?=(!empty($access_array) && in_array('2',$access_array))?'checked':''?> data-val="" > <span class="notClickedCls ">Bespoke </span>
                              <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
              </div>
              <div class="col-sm-12">
                    <div class="inclusionsSections">
                        <div class="checkarea_part_Dates">
                            <label class="checkbox_div">
                              <input disabled type="checkbox" style="color: #8a909d !important;"  name="access_section[]" id="chk_product" class="custom_chkbox tagchkbox notClickedCls " value="3" <?=(!empty($access_array) && in_array('3',$access_array))?'checked':''?> data-val="" > <span class="notClickedCls " style="color: #8a909d !important;" >Product </span>
                              <span class="checkmark" style="color: #8a909d !important;" ></span>
                            </label>
                        </div>
                    </div>
              </div>
              <div class="col-sm-12">
                    <div class="inclusionsSections">
                        <div class="checkarea_part_Dates">
                            <label class="checkbox_div">
                              <input style="color: #8a909d !important;"  disabled type="checkbox" name="access_section[]" id="chk_analytics" class="custom_chkbox tagchkbox notClickedCls " value="4" <?=(!empty($access_array) && in_array('4',$access_array))?'checked':''?> data-val="" > <span style="color: #8a909d !important;"  class="notClickedCls ">Analytics </span>
                              <span class="checkmark" style="color: #8a909d !important;" ></span>
                            </label>
                        </div>
                    </div>
              </div>
              <div class="col-sm-12">
                    <div class="inclusionsSections">
                        <div class="checkarea_part_Dates">
                            <label class="checkbox_div">
                              <input type="checkbox" name="access_section[]" id="chk_all" class="custom_chkbox notClickedCls " value="5" <?=(!empty($access_array) && in_array('5',$access_array))?'checked':''?> data-val="" > <span class="notClickedCls ">All </span>
                              <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
              </div> 
          </div>

          <div class="row">&nbsp;</div>
         <h5 class="field-title pb-2">Enable or disable the ability to book tours on this account</h5>
          <div class="row">
            <div class="col-sm-6">
                <div class="inclusionsSections">
                    <div class="checkarea_part_Dates">
                        <label class="checkbox_div">
                          <input type="radio" name="allow_booking" id="chk_booking" class="custom_chkbox tagchkbox notClickedCls " value="1" <?=(!empty($subAccountInfo->allow_booking) && $subAccountInfo->allow_booking == 1)?'checked="checked"':''?> data-val="" > <span class="notClickedCls ">Enable Booking </span>
                          <span class="checkmark"></span>
                        </label>
                    </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="inclusionsSections">
                    <div class="checkarea_part_Dates">
                        <label class="checkbox_div">
                          <input type="radio" name="allow_booking" id="chk_booking" class="custom_chkbox tagchkbox notClickedCls " value="2"<?=(!empty($subAccountInfo->allow_booking) && $subAccountInfo->allow_booking == 2)?'checked="checked"':''?>  data-val="" > <span class="notClickedCls ">Disable Booking </span>
                          <span class="checkmark"></span>
                        </label>
                    </div>
                </div>
              </div>
          </div>
          <div class="row">
              <div class="col-md-12">
                  <div class="form-group">
                    <input type="hidden" name="collaborator_id" value="{{!empty($collaborator_id)?$collaborator_id:''}}">
                    <input type="hidden" name="id" value="<?php echo isset($subAccountInfo->id) ? $subAccountInfo->id : ''; ?>">
                      <button type="submit" class="btn btn-primary submitbtncls" id="save" title="" value="submitForm" name="save">Save</button>

                  </div>
              </div>
          </div>
        </form>
       </div>
  </div>
</div>
  </div>
  <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
  </div>

<script type="text/javascript" src="{{URL::asset('/js/parsley.js')}}"></script>
<script type="text/javascript">
  $('#EditForm').parsley();
  $('#chk_all').click(function(){
     if ($(this).is(":checked")) {
      $('.tagchkbox').prop("checked",true);
     }
     else
     {
      $('.tagchkbox').prop("checked",false);
     }
  });
</script>