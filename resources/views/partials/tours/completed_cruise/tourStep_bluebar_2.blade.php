<div class="white_part notesSubSection">
    <div class="colspanPerStepMain">
        <div class="colspanPerStepLeft">
        Category, location and tags    
        </div>
        <div class="colspanPerStepRight">
            <a href="javascript:;" class="downArrowCls backArrowBtnCls" data-back="1"><i class="fas fa-chevron-down"></i></a>
        </div>
    </div>
</div>
<div class="white_part">
    <div class="flwMainTitleCls">
        Blue bar
    </div>
    <div class="flwMainTitleCls">
        Routes
    </div>
    <div class="partOneCls">
        <div class="appendExperiencesAttractionsNew">
            <?php 
            if(!empty($experience) && isset($experience->getExperiencesToRoutes)){
            if(count($experience->getExperiencesToRoutes) >= '1'){
                foreach ($experience->getExperiencesToRoutes as $keyEI => $valueEI) { ?>
                    <div class="row">
                        
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label for="Location1">Location {{$keyEI+1}}</label>
                                <input type="text" name="step2[ExpAttrsInclusionName-edit][{{ $valueEI->id }}]" class="form-control" value="{{ $valueEI->name }}" required="" data-msg-required="This is required">
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="form-group">
                                <label for="Location1">&nbsp;</label>
                                 <a href="javascript:;" class="removeAttrExpRealCls redCls" data-id="{{ $valueEI->id }}"><i class="fas fa-minus-circle"></i></a>
                            </div>
                        </div>
                    </div>
            <?php } }
                    } else { ?>
                <div class="row">
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label for="Location1">Location</label>
                            <input type="text" name="step2[ExpAttrsInclusionName][1]" class="form-control" value="" required="" data-msg-required="This is required">
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <div class="form-group">
                            <label for="Location1">&nbsp;</label>
                            <a href="javascript:;" class="removeAttrExpCls redCls"><i class="fas fa-minus-circle"></i></a>
                        </div>
                    </div>
                </div>
                

            <?php } ?>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <input type="hidden" name="expAttrNewRow" class="expAttrNewRow" value="{{!empty($experience)?count($experience->getExperiencesToRoutes)+1:'1'}}">
                <a class="orangeLink btn marginTop15 clearBothCls addExpAttrNewBtn float-right" data-id="4" href="javascript:;">Add More</a>
            </div>
        </div>
    </div>
    
</div>
<?php if($tourType == '1'){ ?>
    <div class="white_part">
        <div class="flwMainTitleCls">
            Ship Details
        </div>
        <div class="partOneCls">
            <div class="appendExperiencesAttrShip">
                <?php 
                if(isset($experience->getExperiencesToInclusionsShip)){ 
                if(count($experience->getExperiencesToInclusionsShip) >= '1'){
                    foreach ($experience->getExperiencesToInclusionsShip as $keyEI => $valueEI) { ?>
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label for="Location1d">Icon</label>
                                    <select class="form-control selectCls exprAttCls" data-type="2" data-id="33{{ $valueEI->id }}" name="step2[ExpAttrsShip-edit][{{ $valueEI->id }}]" required="" data-msg-required="Please select icon">
                                        <option value="">Select One</option>
                                        <?php 
                                        foreach ($iconList as $key => $valueIc) {?>
                                            <option value="{{$valueIc->id}}" data-icon="{{$valueIc->icon}}" <?php echo $valueEI->icon_list_id == $valueIc->id ? 'selected':''; ?>>{{$valueIc->name}}</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-1">
                                <div class="form-group text-center">
                                    <label for="Location1d">&nbsp;</label>
                                    <div class="newAddedIconCls naic_2_33{{ $valueEI->id }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label for="Location1">Ship Detail Name</label>
                                    <select class="form-control selectCls inclusionAppend" name="step2[ExpAttrsShipInclusion-edit][{{ $valueEI->id }}]" required="required" data-msg-required="Please select inclusion">
                                        <option value="">Select One</option>
                                        <?php 
                                        foreach ($shipDetailList as $key => $valueSd) { ?>
                                            <option value="{{$valueSd->id}}" <?php echo $valueEI->inclusions_id == $valueSd->id ? 'selected':''; ?>>{{$valueSd->name}}</option>
                                        <?php  } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-1">
                                <div class="form-group">
                                    <label for="Location1">&nbsp;</label>
                                    <a href="javascript:;" class="removeAttrExpRealCls redCls" data-id="{{ $valueEI->id }}"><i class="fas fa-minus-circle"></i></a>
                                </div>
                            </div>
                        </div>
                <?php } }
                    } else { ?>
                      
                <?php } ?>
            </div>
            <div class="row">
                <div class="col-sm-12">
                     <a class="marginTop15" data-toggle="modal" data-target="#inclusionModel" id="add_ship_deial" href="javascript:;" style="display: inline-block;width: auto;color: orange;font-size: 18px;">Ship details not on the list</a>
                    <?php
                     if(isset($experience->getExperiencesToInclusionsShip)){ 
                     if(count($experience->getExperiencesToInclusionsShip) >= '1'){ 
                        $expAttrShipRow = count($experience->getExperiencesToInclusionsShip)+1?>

                        <input type="hidden" name="expAttrRow" class="expAttrRow" value="{{ $expAttrShipRow }}">
                        <a class="orangeLink btn marginTop15 clearBothCls addExpAttrShipBtn float-right" data-id="4" href="javascript:;">Add More</a>
                    <?php } else {?>
                        <input type="hidden" name="expAttrRow" class="expAttrRow" value="5">
                        <a class="orangeLink btn marginTop15 clearBothCls addExpAttrShipBtn float-right" data-id="4" href="javascript:;">Add More</a><input type="hidden" name="expAttrRow" class="expAttrRow" value="5">
                    <?php } } else { ?>

                        <input type="hidden" name="expAttrRow" class="expAttrRow" value="5">
                        <a class="orangeLink btn marginTop15 clearBothCls addExpAttrShipBtn float-right" data-id="4" href="javascript:;">Add More</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>  
<?php } ?>

 <!-- Modal -->
<div class="modal fade" id="inclusionModel" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body" style="padding: 40px;">
            <h5 style="font-weight: 600;">Add Ship Detail</h5>
            <div class="form-group">
                <label style="color:#aaa;">Ship Detail Name</label>
                <input type="text" id="inclusion_name" name="inclusion_name" class="form-control">
            </div>
            <div class="form-group">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="addInclusion">Add</button>
            </div>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
    
    $(document).on('click', '#add_ship_deial', function() {
         $('#inclusionModel').modal('show');
    });
    $(document).on('click', '#addInclusion', function() {
        var inclusion_name = $('#inclusion_name').val();
        if(inclusion_name == ''){
            toastError('Please enter inclusion name.');
        }else{
            $('.loader').show();    
            $.ajax({
                url: base_url+'/super-user/add-ship-detail',
                type: 'POST',
                 // dataType: 'json',
                data: {'inclusion_name':inclusion_name},
                success: function(data) {
                    $('.loader').hide(); 
                    $('.inclusionAppend').append(data.html); 
                    $('.inclusionAppend').select2();
                    $('#inclusion_name').val('');
                    $('#inclusionModel').modal('hide');
                    toastSuccess('Inclusion has been added to the list.');
                },
                error: function(e) {
                }
            });
        }
    });
</script>
