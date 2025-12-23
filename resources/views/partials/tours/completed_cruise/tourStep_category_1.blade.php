<style>
 #product_name-error{
    font-size: 13px;
 }   
</style>
<div class="contentDivasda">
    <div class="fl_w main_title" style="text-align:center;">
        <?php if(isset($experience)){?>
            <h2><span class="proNameCls"><?php echo $experience->name; ?></span><input type="text" name="step1[name]" value="<?php echo $experience->name; ?>" class="inputTitle productNameCls ele_hide" required="">&nbsp;<a href="javascript:;" class="editTitle"><i class="fas fa-edit"></i></a></h2>
        <?php } else { ?>
            <h2><span class="proNameCls">New Tour</span><input type="text" name="step1[name]" value="New Tour" class="inputTitle productNameCls ele_hide" required="">&nbsp;<a href="javascript:;" class="editTitle"><i class="fas fa-edit"></i></a></h2>
        <?php } ?>
    </div>
</div>
<div class="white_part">
    <div class="flwMainTitleCls">
        Category, location and tags
        <input type="hidden" name="step1[id]" value="{{ isset($experience->id) ? $experience->id : null }}">
    </div>
    <div class="partOneCls">
        <div class="row">
            
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="Location1">Location (Country)</label>
                    <select class="form-control selectCls country_area_id" name="step1[country]" id="Location1" >
                        <option value="">Select One</option>
                        @foreach ($countries as $k => $country)
                        <?php if ( isset($experience->country) && ($experience->country == $country->id)){$assign_river = !empty($country->assign_rivers)?explode(',',$country->assign_rivers):array();} ?>
                            <option data-river="{{ $country->assign_rivers }}" value="{{ $country->id }}" @if ( isset($experience->country) && ($experience->country == $country->id)) selected @endif>
                                    {{ $country->name }}
                                </option>
                        @endforeach
                        </select>
                </div>
            </div>
             <div class="col-sm-4">
                <div class="form-group">
                    <label for="Location1">Location (River)</label>
                    <select class="form-control selectCls rivercls" name="step1[river][]" id="rivers" multiple>
                        @foreach ($riverList as $k => $river)
                        <?php if(!empty($assign_river) && in_array($river->id,$assign_river )){ ?>

                            <option value="{{ $river->id }}" @if ( !empty($experience->rivers) && in_array($river->id,explode(',',$experience->rivers) )) selected @endif>
                                    {{ $river->name }}
                                </option>
                            <?php
                        } ?>
                            
                        @endforeach
                    </select>
                    
                    
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="Mobility1">Mobility</label>
                    <select class="form-control selectCls" name="step1[mobility]" id="Mobility1">
                      <option value="">Select One</option>
                      <?php if(isset($experience)){ ?>
                          <option value="1" @if ($experience->mobility == '1') selected @endif>Low</option>
                          <option value="2" @if ($experience->mobility == '2') selected @endif>Low with steps</option>
                          <option value="3" @if ($experience->mobility == '3') selected @endif>Medium</option>
                          <option value="4" @if ($experience->mobility == '4') selected @endif>High</option>
                          <option value="5" @if ($experience->mobility == '5') selected @endif>Active</option>
                      <?php }else{ ?>
                          <option value="1" >Low</option>
                          <option value="2" >Low with steps</option>
                          <option value="3" >Medium</option>
                          <option value="4" >High</option>
                          <option value="5" >Active</option>
                      <?php } ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="">Tags</label>
                </div>
                <div class="check_row">
                    <div class="fl_w appendTag">                      
                            @foreach ($experienceExtra as $key => $value)
                                <div class="checkarea_part">
                                    <label class="checkbox_div">
                                      <input type="checkbox" name="step1[experience_extras_id][]" class="custom_chkbox tagchkbox" value="{{$value->id}}" data-val="{{$value->name}}" @if ( isset($value->selected) && $value->selected) checked="" @endif> {{$value->name}}
                                      <span class="checkmark"></span>
                                    </label>
                                </div>
                           @endforeach                      
                    </div>
                    <a class="marginTop15" data-toggle="modal" data-target="#tagModel" id="add_tag" href="javascript:;" style="display: inline-block;width: auto;color: orange;font-size: 18px;">Add Tag</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="">Extra Tags</label>
                    <input class="form-control extraTagsCls" name="step1[extra_tags]" type="text" value="" >
                </div>
            </div>
        </div>
        <?php 
        $step1Show = 0;
        if(isset($experience)){?>
            @foreach ($experience->experienceImages as $key => $value)
                <div class="image_galller position-Relative">
                    <img src="{{ url("storage")}}/{{$value->file}}" class="">
                    <div class="deleteImage text-danger deleteExeImg" data-id="{{$value->id}}"><i class="fa fa-trash" aria-hidden="true"></i></div>
                </div>
                <?php $step1Show = 1; ?>
            @endforeach
        <?php } ?>
        <div class="dropzone_single step1ShowCls dropzone myDropZoneCls step1_1_img" data-name='step1[experience_images][]' data-cls=".step1_1_img" style="display: <?php echo $step1Show == 1?"none":'block'?>"></div>
        {{-- <div class="imageGalllerAppend_12542"></div>
        <div class="brw_bx image_galller step1ShowCls" style="display: <?php echo $step1Show == 1?"none":'block'?>">
            <div class="browse_btn" >
                <input type="file" name="step1[experience_images][]" accept="image/*" class="filesClsFirst" data-id="12542" required="">
                <div class="brw_user_ic">
                    <i class="far fa-images"></i>
                    <div class="brw_plus">
                        <i class="fas fa-plus"></i>
                    </div>
                </div>
            </div>
        </div>  --}}                           
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="tagModel" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body" style="padding: 40px;">
            <h5 style="font-weight: 600;">Add tag</h5>
            <div class="form-group">
                <label style="color:#aaa;">Tag Name</label>
                <input type="text" id="newtag" name="tag" class="form-control">
            </div>
            <div class="form-group">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="addTag">Add</button>
            </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
    
    $(document).on('click', '#add_tag', function() {
         $('#tagModel').modal('show');
    });
    $(document).on('click', '#addTag', function() {
        var tag = $('#newtag').val();
        if(tag == ''){
            toastError('Please enter tag name.');
        }else{
            $('.loader').show();    
            $.ajax({
                url: base_url+'/super-user/add-tag-detail',
                type: 'POST',
                 // dataType: 'json',
                data: {'tag':tag,'exp_type':'2'},
                success: function(data) {
                    $('.loader').hide(); 
                    $('.appendTag').append(data.html); 
                    //$('.inclusionAppend').select2();
                    $('#newtag').val('');
                    $('#tagModel').modal('hide');
                    toastSuccess('Tag has been added to the list.');
                },
                error: function(e) {
                }
            });
        }
    });
</script>