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
        Experiences & Attractions
    </div>
    <div class="partOneCls">
        <div class="appendExperiencesAttractionsNew">
            <?php 
            if(isset($experience->getExperiencesToInclusionsShipNew)){
            if(count($experience->getExperiencesToInclusionsShipNew) >= '1'){
                foreach ($experience->getExperiencesToInclusionsShipNew as $keyEI => $valueEI) { ?>
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label for="Location1d">Icon</label>
                                <select class="form-control selectCls exprAttNewCls" data-type="3" data-id="43{{ $valueEI->id }}" name="step2[ExpAttrsIconNew-edit][{{ $valueEI->id }}]" required="" data-msg-required="Please select icon">
                                    <option value="">Select One</option>
                                   <?php 
                                        foreach ($iconList as $key => $value) {?>
                                            <option value="{{$value->id}}" data-icon="{{$value->icon}}" <?php echo $valueEI->icon_list_id == $value->id ? 'selected':''; ?>>{{$value->name}}</option>
                                        <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="form-group text-center">
                                <label for="Location1d">&nbsp;</label>
                                    <div class="newAddedIconCls naicn_3_43{{ $valueEI->id }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label for="Location1">Attraction or experience name</label>
                                <input type="text" name="step2[ExpAttrsInclusionName-edit][{{ $valueEI->id }}]" class="form-control" value="{{ $valueEI->inclusions_text }}" required="" data-msg-required="This is required">
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
                            <label for="Location1d">Icon</label>
                            <select class="form-control selectCls exprAttNewCls" data-type="1" data-id="1" name="step2[ExpAttrsIconNew][1]" required="" data-msg-required="Please select icon">
                                <option value="">Select One</option>
                                <?php 
                                foreach ($iconList as $key => $value) { ?>
                                    <option value="{{$value->id}}" data-icon="{{$value->icon}}">{{$value->name}}</option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <div class="form-group text-center">
                            <label for="Location1d">&nbsp;</label>
                            <div class="newAddedIconCls naicn_1_1">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label for="Location1">Attraction or experience name</label>
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
                <div class="row">
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label for="Location1d">Icon</label>
                            <select class="form-control selectCls exprAttNewCls" data-type="3" data-id="2" name="step2[ExpAttrsIconNew][2]" required="" data-msg-required="Please select icon">
                                <option value="">Select One</option>
                                <?php 
                                foreach ($iconList as $key => $value) { ?>
                                    <option value="{{$value->id}}" data-icon="{{$value->icon}}">{{$value->name}}</option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <div class="form-group text-center">
                            <label for="Location1d">&nbsp;</label>
                            <div class="newAddedIconCls naicn_3_2">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label for="Location1">Attraction or experience name</label>
                            <input type="text" name="step2[ExpAttrsInclusionName][2]" class="form-control" value="" required="" data-msg-required="This is required">
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <div class="form-group">
                            <label for="Location1">&nbsp;</label>
                            <a href="javascript:;" class="removeAttrExpCls redCls"><i class="fas fa-minus-circle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label for="Location1d">Icon</label>
                            <select class="form-control selectCls exprAttNewCls" data-type="3" data-id="3" name="step2[ExpAttrsIconNew][3]" required="" data-msg-required="Please select icon">
                                <option value="">Select One</option>
                                <?php 
                                foreach ($iconList as $key => $value) { ?>
                                    <option value="{{$value->id}}" data-icon="{{$value->icon}}">{{$value->name}}</option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <div class="form-group text-center">
                            <label for="Location1d">&nbsp;</label>
                            <div class="newAddedIconCls naicn_3_3">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label for="Location1">Attraction or experience name</label>
                            <input type="text" name="step2[ExpAttrsInclusionName][3]" class="form-control" value="" required="" data-msg-required="This is required">
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <div class="form-group">
                            <label for="Location1">&nbsp;</label>
                            <a href="javascript:;" class="removeAttrExpCls redCls"><i class="fas fa-minus-circle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label for="Location1d">Icon</label>
                            <select class="form-control selectCls exprAttNewCls" data-type="3" data-id="4" name="step2[ExpAttrsIconNew][4]" required="" data-msg-required="Please select icon">
                                <option value="">Select One</option>
                                <?php 
                                foreach ($iconList as $key => $value) { ?>
                                    <option value="{{$value->id}}" data-icon="{{$value->icon}}">{{$value->name}}</option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <div class="form-group text-center">
                            <label for="Location1d">&nbsp;</label>
                            <div class="newAddedIconCls naicn_3_4">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label for="Location1">Attraction or experience name</label>
                            <input type="text" name="step2[ExpAttrsInclusionName][4]" class="form-control" value="" required="" data-msg-required="This is required">
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
                <input type="hidden" name="expAttrNewRow" class="expAttrNewRow" value="5">
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
                                        foreach ($iconList as $key => $value) {?>
                                            <option value="{{$value->id}}" data-icon="{{$value->icon}}" <?php echo $valueEI->icon_list_id == $value->id ? 'selected':''; ?>>{{$value->name}}</option>
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
                                    <label for="Location1">Facility Name</label>
                                    <select class="form-control selectCls" name="step2[ExpAttrsShipInclusion-edit][{{ $valueEI->id }}]" required="required" data-msg-required="Please select inclusion">
                                        <option value="">Select One</option>
                                        <?php 
                                        foreach ($inclusionList as $key => $value) { ?>
                                            <option value="{{$value->id}}" <?php echo $valueEI->inclusions_id == $value->id ? 'selected':''; ?>>{{$value->name}}</option>
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
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label for="Location1d">Icon</label>
                                    <select class="form-control selectCls exprAttCls" data-type="2" data-id="1" name="step2[ExpAttrsShip][1]">
                                        <option value="">Select One</option>
                                        <?php 
                                        foreach ($iconList as $key => $value) {?>
                                            <option value="{{$value->id}}" data-icon="{{$value->icon}}">{{$value->name}}</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-1">
                                <div class="form-group text-center">
                                    <label for="Location1d">&nbsp;</label>
                                    <div class="newAddedIconCls naic_2_1">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label for="Location1">Facility Name</label>
                                    <select class="form-control selectCls" name="step2[ExpAttrsShipInclusion][1]">
                                        <option value="">Select One</option>
                                        <?php 
                                        foreach ($inclusionList as $key => $value) { ?>
                                            <option value="{{$value->id}}">{{$value->name}}</option>
                                        <?php  } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-1">
                                <div class="form-group">
                                    <label for="Location1">&nbsp;</label>
                                    <a href="javascript:;" class="removeAttrExpCls redCls"><i class="fas fa-minus-circle"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label for="Location1d">Icon</label>
                                    <select class="form-control selectCls exprAttCls" data-type="2" data-id="2" name="step2[ExpAttrsShip][2]">
                                        <option value="">Select One</option>
                                        <?php 
                                        foreach ($iconList as $key => $value) {?>
                                            <option value="{{$value->id}}" data-icon="{{$value->icon}}">{{$value->name}}</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-1">
                                <div class="form-group text-center">
                                    <label for="Location1d">&nbsp;</label>
                                    <div class="newAddedIconCls naic_2_2">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label for="Location1">Facility Name</label>
                                    <select class="form-control selectCls "  name="step2[ExpAttrsShipInclusion][2]">
                                        <option value="">Select One</option>
                                        <?php 
                                        foreach ($inclusionList as $key => $value) { ?>
                                            <option value="{{$value->id}}">{{$value->name}}</option>
                                        <?php  } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-1">
                                <div class="form-group">
                                    <label for="Location1">&nbsp;</label>
                                    <a href="javascript:;" class="removeAttrExpCls redCls"><i class="fas fa-minus-circle"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label for="Location1d">Icon</label>
                                    <select class="form-control selectCls exprAttCls" data-type="2" data-id="3" name="step2[ExpAttrsShip][3]">
                                        <option value="">Select One</option>
                                        <?php 
                                        foreach ($iconList as $key => $value) {?>
                                            <option value="{{$value->id}}" data-icon="{{$value->icon}}">{{$value->name}}</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-1">
                                <div class="form-group text-center">
                                    <label for="Location1d">&nbsp;</label>
                                    <div class="newAddedIconCls naic_2_3">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label for="Location1">Facility Name</label>
                                    <select class="form-control selectCls "  name="step2[ExpAttrsShipInclusion][3]">
                                        <option value="">Select One</option>
                                        <?php 
                                        foreach ($inclusionList as $key => $value) { ?>
                                            <option value="{{$value->id}}">{{$value->name}}</option>
                                        <?php  } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-1">
                                <div class="form-group">
                                    <label for="Location1">&nbsp;</label>
                                    <a href="javascript:;" class="removeAttrExpCls redCls"><i class="fas fa-minus-circle"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label for="Location1d">Icon</label>
                                    <select class="form-control selectCls exprAttCls" data-type="2" data-id="4" name="step2[ExpAttrsShip][4]">
                                        <option value="">Select One</option>
                                        <?php 
                                        foreach ($iconList as $key => $value) {?>
                                            <option value="{{$value->id}}" data-icon="{{$value->icon}}">{{$value->name}}</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-1">
                                <div class="form-group text-center">
                                    <label for="Location1d">&nbsp;</label>
                                    <div class="newAddedIconCls naic_2_4">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label for="Location1">Facility Name</label>
                                    <select class="form-control selectCls "  name="step2[ExpAttrsShipInclusion][4]">
                                        <option value="">Select One</option>
                                        <?php 
                                        foreach ($inclusionList as $key => $value) { ?>
                                            <option value="{{$value->id}}">{{$value->name}}</option>
                                        <?php  } ?>
                                    </select>
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
<?php if($tourType != '1'){ ?>
<div class="white_part">
    <div class="flwMainTitleCls">
        Hotel Details
    </div>
    <div class="partOneCls">
        <div class="appendExperiencesAttractions">
            <?php 
            if(isset($experience->getExperiencesToInclusionsBlueBar)){
            if(count($experience->getExperiencesToInclusionsBlueBar) >= '1'){
                foreach ($experience->getExperiencesToInclusionsBlueBar as $keyEI => $valueEI) { ?>
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label for="Location1d">Icon</label>
                                <select class="form-control selectCls exprAttCls" data-type="1" data-id="12{{ $valueEI->id }}" name="step2[ExpAttrsIcon-edit][{{ $valueEI->id }}]" required="" data-msg-required="Please select icon">
                                    <option value="">Select One</option>
                                    <?php 
                                    foreach ($iconList as $key => $value) { ?>
                                        <option value="{{$value->id}}" data-icon="{{$value->icon}}" <?php echo $valueEI->icon_list_id == $value->id ? 'selected':''; ?>>{{$value->name}}</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="form-group text-center">
                                <label for="Location1d">&nbsp;</label>
                                <div class="newAddedIconCls naic_1_12{{ $valueEI->id }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label for="Location1">Inclusion name</label>
                                <select class="form-control selectCls inclusionAppend" name="step2[ExpAttrsInclusion-edit][{{ $valueEI->id }}]" required="required" data-msg-required="Please select inclusion">
                                    <option value="">Select One</option>
                                    <?php 
                                    foreach ($inclusionList as $key => $value) { ?>
                                        <option value="{{$value->id}}" <?php echo $valueEI->inclusions_id == $value->id ? 'selected':''; ?>>{{$value->name}}</option>
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
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label for="Location1d">Icon</label>
                                <select class="form-control selectCls exprAttCls" data-type="1" data-id="1" name="step2[ExpAttrsIcon][1]">
                                    <option value="">Select One</option>
                                    <?php 
                                    foreach ($iconList as $key => $value) { ?>
                                        <option value="{{$value->id}}" data-icon="{{$value->icon}}">{{$value->name}}</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="form-group text-center">
                                <label for="Location1d">&nbsp;</label>
                                <div class="newAddedIconCls naic_1_1">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label for="Location1">Inclusion name</label>
                                <select class="form-control selectCls inclusionAppend" name="step2[ExpAttrsInclusion][1]">
                                    <option value="">Select One</option>
                                    <?php 
                                    foreach ($inclusionList as $key => $value) { ?>
                                        <option value="{{$value->id}}" @if ( isset($value->selected) && $value->selected) selected @endif>{{$value->name}}</option>
                                    <?php  } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="form-group">
                                <label for="Location1">&nbsp;</label>
                                <a href="javascript:;" class="removeAttrExpCls redCls"><i class="fas fa-minus-circle"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label for="Location1d">Icon</label>
                                <select class="form-control selectCls exprAttCls" data-type="1" data-id="2" name="step2[ExpAttrsIcon][2]">
                                    <option value="">Select One</option>
                                    <?php 
                                    foreach ($iconList as $key => $value) { ?>
                                        <option value="{{$value->id}}" data-icon="{{$value->icon}}">{{$value->name}}</option>
                                    <?php }  ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="form-group text-center">
                                <label for="Location1d">&nbsp;</label>
                                <div class="newAddedIconCls naic_1_2">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label for="Location1">Inclusion name</label>
                                <select class="form-control selectCls inclusionAppend"  name="step2[ExpAttrsInclusion][2]">
                                    <option value="">Select One</option>
                                    <?php 
                                    foreach ($inclusionList as $key => $value) { ?>
                                        <option value="{{$value->id}}">{{$value->name}}</option>
                                    <?php  } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="form-group">
                                <label for="Location1">&nbsp;</label>
                                <a href="javascript:;" class="removeAttrExpCls redCls"><i class="fas fa-minus-circle"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label for="Location1d">Icon</label>
                                <select class="form-control selectCls exprAttCls" data-type="1" data-id="3" name="step2[ExpAttrsIcon][3]">
                                    <option value="">Select One</option>
                                    <?php 
                                    foreach ($iconList as $key => $value) { ?>
                                        <option value="{{$value->id}}" data-icon="{{$value->icon}}">{{$value->name}}</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="form-group text-center">
                                <label for="Location1d">&nbsp;</label>
                                <div class="newAddedIconCls naic_1_3">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label for="Location1">Inclusion name</label>
                                <select class="form-control selectCls inclusionAppend"  name="step2[ExpAttrsInclusion][3]">
                                    <option value="">Select One</option>
                                    <?php 
                                    foreach ($inclusionList as $key => $value) { ?>
                                        <option value="{{$value->id}}">{{$value->name}}</option>
                                    <?php  } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="form-group">
                                <label for="Location1">&nbsp;</label>
                                <a href="javascript:;" class="removeAttrExpCls redCls"><i class="fas fa-minus-circle"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label for="Location1d">Icon</label>
                                <select class="form-control selectCls exprAttCls" data-type="1" data-id="4" name="step2[ExpAttrsIcon][4]">
                                    <option value="">Select One</option>
                                    <?php 
                                    foreach ($iconList as $key => $value) { ?>
                                        <option value="{{$value->id}}" data-icon="{{$value->icon}}">{{$value->name}}</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="form-group text-center">
                                <label for="Location1d">&nbsp;</label>
                                <div class="newAddedIconCls naic_1_4">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label for="Location1">Inclusion name</label>
                                <select class="form-control selectCls inclusionAppend"  name="step2[ExpAttrsInclusion][4]">
                                    <option value="">Select One</option>
                                    <?php 
                                    foreach ($inclusionList as $key => $value) { ?>
                                        <option value="{{$value->id}}">{{$value->name}}</option>
                                    <?php  } ?>
                                </select>
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
                <?php 
                if(isset($experience->getExperiencesToInclusionsBlueBar)){ 
                if(count($experience->getExperiencesToInclusionsBlueBar) >= '1'){ 
                    $expAttrBlueBarRow = count($experience->getExperiencesToInclusionsBlueBar)+1?>
                    <input type="hidden" name="expAttrRow" class="expAttrRow" value="{{ $expAttrBlueBarRow }}">
                <?php } else { ?>
                    <input type="hidden" name="expAttrRow" class="expAttrRow" value="5">
                <?php } } else { ?>
                    <input type="hidden" name="expAttrRow" class="expAttrRow" value="5">
                <?php } ?>
                    <a class="marginTop15" data-toggle="modal" data-target="#inclusionModel" href="javascript:;" style="display: inline-block;width: auto;color: orange;font-size: 18px;">Inclusion not on the list</a>
                    <a class="orangeLink btn marginTop15 clearBothCls addExpAttrBtn float-right" data-id="4" href="javascript:;">Add More</a>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="inclusionModel" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body" style="padding: 40px;">
            <h5 style="font-weight: 600;">Add Inclusion</h5>
            <div class="form-group">
                <label style="color:#aaa;">Inclusion Name</label>
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
    $(document).on('click', '#addInclusion', function() {
        var inclusion_name = $('#inclusion_name').val();
        if(inclusion_name == ''){
            toastError('Please enter inclusion name.');
        }else{
            $('.loader').show();    
            $.ajax({
                url: base_url+'/super-user/add-inclusion',
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
<?php } ?>