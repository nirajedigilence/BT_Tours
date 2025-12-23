
<div class="popup_content">
    <a id="closePopup" href="javascript:;" style="float: right;color: red;font-size: 25px;">
        <i class="fas fa-times"></i>
    </a>
    <div class="heading">
        Crossings
        <input type="hidden" name="expCrossingRow" class="expCrossingRow" value="" >
    </div>

    <div class="description">
       Here you can edit the crossings template.
    </div>
    <form id="crossingData" enctype="multipart/form-data">
        @csrf
        <div class="sections" style="display: inline-block;margin: 0px;">
            

            <div class="tab-content" style="border: 1px solid #ddd;display: inline-block;border-top: 0px;width: 100%;padding-top: 10px;">
              <div id="tab1" class="tab-pane active">
                
                <div class="section w_100" style="height:100%;float: left;">
                    <div class="form crossing_div">
                         <?php 
                            if(isset($crossings)){
                                if(count($crossings) >= 1){
                                    $cnts = '11565';
                                foreach ($crossings as $key => $value) { 
                                     ?>
                                      <div class="grouped company_row">
                                            <div class="fieldset half">
                                                <label>Company name</label>
                                               
                                                <input type="text" value="{{ $value->company_name }}" name="crossing_data[crossing][<?=$value->id?>][company_name]" id="built">
                                                <?php /*<select class="form-control" name="crossing_data[crossing][<?=$value->id?>][company_name]">
                                                    <option value="">Select Company</option>
                                                    @foreach ($company as $k => $com)
                                                        <option value="{{ $com->id }}" @if ( isset($value->company_name) && $value->company_name == $com->id) selected @endif>
                                                            {{ $com->company_name }}
                                                        </option>
                                                    @endforeach
                                                </select> */?>
                                                <input name="crossing_data[crossing][<?=$value->id?>][id]" class="form-control" value="{{ $value->id }}" type="hidden">
                                                <p class="exp_error" style="display:none;color: red;">Please enter built</p>
                                            </div>
                                            <div class="fieldset half">
                                                <label>Routes</label>
                                                <input type="text" value="{{ $value->routes }}" name="crossing_data[crossing][<?=$value->id?>][routes]" id="routes">
                                                <p class="exp_error" style="display:none;color: red;">Please enter refurbished</p>
                                            </div>
                                            <div class="fieldset half">
                                                <label>Estimated crossing duration</label>
                                                <input type="text" value="{{ $value->est_crossing_duration }}" name="crossing_data[crossing][<?=$value->id?>][est_crossing_duration]" id="est_crossing_duration">
                                                <p class="exp_error" style="display:none;color: red;">Please enter passengers</p>
                                            </div>
                                            <div class="fieldset half">
                                                <label>Crossing Times/Days</label>
                                                <input type="text" value="{{ $value->crossing_times }}" name="crossing_data[crossing][<?=$value->id?>][crossing_times]" id="crossing_times">
                                                <p class="exp_error" style="display:none;color: red;">Please enter staff to guest</p>
                                            </div>
                                            <div class="fieldset half">
                                                <label>Inclusions</label>
                                                <input type="text" value="{{ $value->inclusions }}" name="crossing_data[crossing][<?=$value->id?>][inclusions]" id="inclusions">
                                                <p class="exp_error" style="display:none;color: red;">Please enter cabins</p>
                                            </div>
                                            <div class="fieldset half">
                                                <label>&nbsp</label>
                                                <a href="javascript:void(0);" class="btn btn-sm btn-primary delete_crossing" style="background-color: black !important;border-color: black !important;">Delete Crossing</a>
                                            </div>
                                           
                                        </div>
                         <?php
                            $cnts++;
                            
                         } } } ?>
                    </div>
                    <div class="fieldset mt-3">
                    <input type="button" class="btn btn-primary btn-sm" value="Add more" id="add_crosssing">
                    </div>
                </div>

               
            </div>
          <div id="tab2" class="tab-pane">
            <h4>Not found!</h4>
          </div>
         
            </div>
        </div>
        <input type="button" name="submit" class="btn btn-primary" id="crossingFormSubmit" value="Submit">
    </form>
</div>

<script type="text/javascript">
  
    function validate(evt) {
        var theEvent = evt || window.event;

        if (theEvent.type === 'paste') {
            key = event.clipboardData.getData('text/plain');
        } else {
            var key = theEvent.keyCode || theEvent.which;
            key = String.fromCharCode(key);
        }
        var regex = /[0-9]|\./;
        if( !regex.test(key) ) {
            theEvent.returnValue = false;
            if(theEvent.preventDefault) theEvent.preventDefault();
        }
    }
    
</script>
