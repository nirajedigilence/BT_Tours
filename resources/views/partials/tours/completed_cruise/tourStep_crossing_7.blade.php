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
<div class="white_part notesSubSection">
    <div class="colspanPerStepMain">
        <div class="colspanPerStepLeft">
        Blue bar
        </div>
        <div class="colspanPerStepRight">
            <a href="javascript:;" class="downArrowCls backArrowBtnCls" data-back="2"><i class="fas fa-chevron-down"></i></a>
        </div>
    </div>
</div>
<div class="white_part notesSubSection">
    <div class="colspanPerStepMain">
        <div class="colspanPerStepLeft">
        Overview
        </div>
        <div class="colspanPerStepRight">
            <a href="javascript:;" class="downArrowCls backArrowBtnCls" data-back="3"><i class="fas fa-chevron-down"></i></a>
        </div>
    </div>
</div>
<div class="white_part notesSubSection">
    <div class="colspanPerStepMain">
        <div class="colspanPerStepLeft">
        Itinerary
        </div>
        <div class="colspanPerStepRight">
            <a href="javascript:;" class="downArrowCls backArrowBtnCls" data-back="4"><i class="fas fa-chevron-down"></i></a>
        </div>
    </div>
</div>
<div class="white_part notesSubSection">
    <div class="colspanPerStepMain">
        <div class="colspanPerStepLeft">
        Ship
        </div>
        <div class="colspanPerStepRight">
            <a href="javascript:;" class="downArrowCls backArrowBtnCls" data-back="5"><i class="fas fa-chevron-down"></i></a>
        </div>
    </div>
</div>
<div class="white_part notesSubSection">
    <div class="colspanPerStepMain">
        <div class="colspanPerStepLeft">
        Gallery
        </div>
        <div class="colspanPerStepRight">
            <a href="javascript:;" class="downArrowCls backArrowBtnCls" data-back="6"><i class="fas fa-chevron-down"></i></a>
        </div>
    </div>
</div>
<div class="white_part notesSubSection">
    <div class="colspanPerStepMain">
        <div class="colspanPerStepLeft">
        Map
        </div>
        <div class="colspanPerStepRight">
            <a href="javascript:;" class="downArrowCls backArrowBtnCls" data-back="7"><i class="fas fa-chevron-down"></i></a>
        </div>
    </div>
</div>
<div class="white_part">
    <div class="flwMainTitleCls">
        Crossing
        <input type="hidden" name="expCrossingRow" class="expCrossingRow" value="" >
    </div>
    <div class="carouselAppend">
        <div class="partOneCls">
             <div class="form crossing_div">
                <div class="row">
                <div class="col-sm-12">
                     <a class="marginTop15 mb-2"  id="add_crossing_main" href="javascript:;" style="display: inline-block;width: auto;color: orange;font-size: 18px;">Import template</a>
                 </div>
                </div>
                <div class="row company_row">
                                            <div class="col-md-2">
                                                <label>Company name</label>
                                            </div>
                                            <div class="col-md-2">
                                                <label>Routes</label>  
                                            </div>
                                            <div class="col-md-3">
                                                <label>Estimated crossing duration</label>     
                                            </div>
                                            <div class="col-md-2">
                                                <label>Crossing Times/Days</label>
                                            </div>
                                            <div class="col-md-2">
                                                <label>Inclusions</label>
                                            </div>
                                            <div class="col-md-1">
                                                <label>Remove</label>
                                            </div>
                                           
                                        </div>
                         <?php 
                            if(isset($crossings)){
                                if(count($crossings) >= 1){
                                    $cnts = '11565'; ?>
                                    
                                    <?php
                                foreach ($crossings as $key => $value) { 
                                     ?>
                                      <div class="row company_row mb-2">
                                            <div class="col-md-2">
                                                
                                               
                                                <input type="text" class="form-control" value="{{ $value->company_name }}" name="step7[crossing][<?=$value->id?>][company_name]" id="built">
                                                <?php /*<select class="form-control" name="step7[crossing][<?=$value->id?>][company_name]">
                                                    <option value="">Select Company</option>
                                                    @foreach ($company as $k => $com)
                                                        <option value="{{ $com->id }}" @if ( isset($value->company_name) && $value->company_name == $com->id) selected @endif>
                                                            {{ $com->company_name }}
                                                        </option>
                                                    @endforeach
                                                </select> */?>
                                                <input name="step7[crossing][<?=$value->id?>][id]" class="form-control" value="{{ $value->id }}" type="hidden">
                                                <p class="exp_error" style="display:none;color: red;">Please enter built</p>
                                            </div>
                                            <div class="col-md-2">
                                                
                                                <input type="text" class="form-control" value="{{ $value->routes }}" name="step7[crossing][<?=$value->id?>][routes]" id="routes">
                                                <p class="exp_error" style="display:none;color: red;">Please enter refurbished</p>
                                            </div>
                                            <div class="col-md-3">
                                                
                                                <input type="text" class="form-control" value="{{ $value->est_crossing_duration }}" name="step7[crossing][<?=$value->id?>][est_crossing_duration]" id="est_crossing_duration">
                                                <p class="exp_error" style="display:none;color: red;">Please enter passengers</p>
                                            </div>
                                            <div class="col-md-2">
                                                
                                                <input type="text" class="form-control" value="{{ $value->crossing_times }}" name="step7[crossing][<?=$value->id?>][crossing_times]" id="crossing_times">
                                                <p class="exp_error" style="display:none;color: red;">Please enter staff to guest</p>
                                            </div>
                                            <div class="col-md-2">
                                               
                                                <input type="text" class="form-control" value="{{ $value->inclusions }}" name="step7[crossing][<?=$value->id?>][inclusions]" id="inclusions">
                                                <p class="exp_error" style="display:none;color: red;">Please enter cabins</p>
                                            </div>
                                            <div class="col-md-1">
                                               
                                                <a href="javascript:;" class="delete_crossing redCls"><i class="fas fa-minus-circle"></i></a>
                                               
                                            </div>
                                           
                                        </div>
                         <?php
                            $cnts++;
                            
                         } } } ?>
                           <?php 
                            if(isset($maincrossings)){
                                if(count($maincrossings) >= 1){
                                    $cnts = '11565'; ?>
                                    <div class="maincrossing" style="display:none;">
                                    <?php
                                foreach ($maincrossings as $key => $value) { 
                                     ?>
                                      <div class="row company_row mb-2">
                                            <div class="col-md-2">
                                                
                                               
                                                <input type="text" class="form-control" value="{{ $value->company_name }}" name="step7[crossing][<?=$value->id?>][company_name]" id="built">
                                                <?php /*<select class="form-control" name="step7[crossing][<?=$value->id?>][company_name]">
                                                    <option value="">Select Company</option>
                                                    @foreach ($company as $k => $com)
                                                        <option value="{{ $com->id }}" @if ( isset($value->company_name) && $value->company_name == $com->id) selected @endif>
                                                            {{ $com->company_name }}
                                                        </option>
                                                    @endforeach
                                                </select> */?>
                                               
                                                <p class="exp_error" style="display:none;color: red;">Please enter built</p>
                                            </div>
                                            <div class="col-md-2">
                                                
                                                <input type="text" class="form-control" value="{{ $value->routes }}" name="step7[crossing][<?=$value->id?>][routes]" id="routes">
                                                <p class="exp_error" style="display:none;color: red;">Please enter refurbished</p>
                                            </div>
                                            <div class="col-md-3">
                                                
                                                <input type="text" class="form-control" value="{{ $value->est_crossing_duration }}" name="step7[crossing][<?=$value->id?>][est_crossing_duration]" id="est_crossing_duration">
                                                <p class="exp_error" style="display:none;color: red;">Please enter passengers</p>
                                            </div>
                                            <div class="col-md-2">
                                                
                                                <input type="text" class="form-control" value="{{ $value->crossing_times }}" name="step7[crossing][<?=$value->id?>][crossing_times]" id="crossing_times">
                                                <p class="exp_error" style="display:none;color: red;">Please enter staff to guest</p>
                                            </div>
                                            <div class="col-md-2">
                                               
                                                <input type="text" class="form-control" value="{{ $value->inclusions }}" name="step7[crossing][<?=$value->id?>][inclusions]" id="inclusions">
                                                <p class="exp_error" style="display:none;color: red;">Please enter cabins</p>
                                            </div>
                                            <div class="col-md-1">
                                               
                                                <a href="javascript:;" class="delete_crossing redCls"><i class="fas fa-minus-circle"></i></a>
                                               
                                            </div>
                                           
                                        </div>
                         <?php
                            $cnts++;
                            
                         } ?> </div><?php } } ?>
                    </div>
                    <div class="fieldset mt-3">
                    <input type="button" class="btn btn-primary btn-sm" value="Add more" id="add_crosssing">
                    </div>        
        </div>
        <div class="clearfix"></div>
    </div>
            
</div>
<script type="text/javascript">
      $(document).ready(function(){
        $('.maincrossing input').attr('disabled','disabled');
        $('.maincrossing').hide();
    })
    
    $(document).on('click', '#add_crossing_main', function() {
       
        $('.maincrossing').show();
        $('.maincrossing input').removeAttr('disabled');
    });
</script>