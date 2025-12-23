<style>
     .nav{padding-left:0;margin-bottom:0;list-style:none}.nav>li{position:relative;display:block}.nav>li>a{position:relative;display:block;padding:10px 15px}.nav>li>a:focus,.nav>li>a:hover{text-decoration:none;background-color:#eee}.nav>li.disabled>a{color:#777}.nav>li.disabled>a:focus,.nav>li.disabled>a:hover{color:#777;text-decoration:none;cursor:not-allowed;background-color:transparent}.nav .open>a,.nav .open>a:focus,.nav .open>a:hover{background-color:#eee;border-color:#337ab7}.nav .nav-divider{height:1px;margin:9px 0;overflow:hidden;background-color:#e5e5e5}.nav>li>a>img{max-width:none}.nav-tabs{border-bottom:1px solid #ddd}.nav-tabs>li{float:left;margin-bottom:-1px}.nav-tabs>li>a{margin-right:2px;line-height:1.42857143;border:1px solid transparent;border-radius:4px 4px 0 0}.nav-tabs>li>a:hover{border-color:#eee #eee #ddd}.nav-tabs>li.active>a,.nav-tabs>li.active>a:focus,.nav-tabs>li.active>a:hover{color:#555;cursor:default;background-color:#fff;border:1px solid #ddd;border-bottom-color:transparent}.nav-tabs.nav-justified{width:100%;border-bottom:0}.nav-tabs.nav-justified>li{float:none}.nav-tabs.nav-justified>li>a{margin-bottom:5px;text-align:center}.nav-tabs.nav-justified>.dropdown .dropdown-menu{top:auto;left:auto}@media (min-width:768px){.nav-tabs.nav-justified>li{display:table-cell;width:1%}.nav-tabs.nav-justified>li>a{margin-bottom:0}}.nav-tabs.nav-justified>li>a{margin-right:0;border-radius:4px}.nav-tabs.nav-justified>.active>a,.nav-tabs.nav-justified>.active>a:focus,.nav-tabs.nav-justified>.active>a:hover{border:1px solid #ddd}@media (min-width:768px){.nav-tabs.nav-justified>li>a{border-bottom:1px solid #ddd;border-radius:4px 4px 0 0}.nav-tabs.nav-justified>.active>a,.nav-tabs.nav-justified>.active>a:focus,.nav-tabs.nav-justified>.active>a:hover{border-bottom-color:#fff}}.nav-pills>li{float:left}.nav-pills>li>a{border-radius:4px}.nav-pills>li+li{margin-left:2px}.nav-pills>li.active>a,.nav-pills>li.active>a:focus,.nav-pills>li.active>a:hover{color:#fff;background-color:#337ab7}.nav-stacked>li{float:none}.nav-stacked>li+li{margin-top:2px;margin-left:0}.nav-justified{width:100%}.nav-justified>li{float:none}.nav-justified>li>a{margin-bottom:5px;text-align:center}.nav-justified>.dropdown .dropdown-menu{top:auto;left:auto}@media (min-width:768px){.nav-justified>li{display:table-cell;width:1%}.nav-justified>li>a{margin-bottom:0}}.nav-tabs-justified{border-bottom:0}.nav-tabs-justified>li>a{margin-right:0;border-radius:4px}.nav-tabs-justified>.active>a,.nav-tabs-justified>.active>a:focus,.nav-tabs-justified>.active>a:hover{border:1px solid #ddd}@media (min-width:768px){.nav-tabs-justified>li>a{border-bottom:1px solid #ddd;border-radius:4px 4px 0 0}.nav-tabs-justified>.active>a,.nav-tabs-justified>.active>a:focus,.nav-tabs-justified>.active>a:hover{border-bottom-color:#fff}}.tab-content>.tab-pane{display:none}.tab-content>.active{display:block}.nav-tabs .dropdown-menu{margin-top:-1px;border-top-left-radius:0;border-top-right-radius:0}
    .nav-tabs > li > a.active{
        color: #555;
        cursor: default;
        background-color: #fff;
        border: 1px solid #ddd;
        border-bottom-color: transparent;
    }
    .nav-tabs > li > a {
        font-size: 16px;
        font-weight: 600;
        color: #000;
    }
</style>
<div class="popup_content">
    <a id="closePopup" href="javascript:;" style="float: right;color: red;font-size: 25px;">
        <i class="fas fa-times"></i>
    </a>
    <div class="heading">
        Crossings
        <input type="hidden" name="expCrossingRow" class="expCrossingRow" value="" >
        <input type="hidden" name="CompanyexpCrossingRow" class="CompanyexpCrossingRow" value="" >
    </div>

    <div class="description">
       Here you can edit the crossings template.
    </div>
    
        @csrf
        <div class="sections" style="display: inline-block;margin: 0px;">

            <ul class="nav nav-tabs">
              @foreach ($company as $k => $com)
              <li><a class="<?=($k == 0)?'active':'de'?>" data-toggle="tab{{$k}}" href="#tab{{$k}}">{{$com->company_name}}</a></li>
              @endforeach
              <!-- <li><a class="active" data-toggle="tab0" href="#tab0">P&O Ferry</a></li>
              <li><a data-toggle="tab2" href="#tab2">Brittany Ferries</a></li>
              <li><a data-toggle="tab3" href="#tab3">Eurotunnel</a></li>
              <li><a data-toggle="tab4" href="#tab4">DFDS</a></li> -->
            
            </ul>
            <div class="tab-content" style="border: 1px solid #ddd;display: inline-block;border-top: 0px;width: 100%;padding-top: 10px;">
            @foreach ($company as $k => $com)
              <div id="tab{{$k}}" class="tab-pane <?=($k == 0)?'active':'de'?>">
                <form id="crossingData{{$com->id}}" enctype="multipart/form-data">
                    <input type="hidden" name="company_id" value="{{$com->id}}">
                    <div class="section w_100" style="height:100%;float: left;">
                        <div class="form company_crossing_div">
                             <?php 

                                if(isset($crossings_route)){
                                    if(count($crossings_route) >= 1){
                                        $cnts = '11565';
                                    foreach ($crossings_route as $key => $value) { 
                                         if($value->company_id == $com->id){
                                         ?>
                                          <div class="grouped route_row">
                                                
                                                <div class="fieldset half">
                                                    <label>Routes</label>
                                                    <input type="text" value="{{ $value->route }}" name="crossing_data[crossing_company][<?=$value->id?>][route]" id="route">
                                                    <p class="exp_error" style="display:none;color: red;">Please enter refurbished</p>
                                                </div>
                                                <div class="fieldset half">
                                                    <label>In/Out</label>
                                                   <select class="form-control" name="crossing_data[crossing_company][<?=$value->id?>][in_out]">
                                                        <option value="">Select In/Out</option>
                                                        <option value="In" <?=(!empty($value->in_out) && $value->in_out == 'In'?'selected="selected"':'')?>>In</option>
                                                        <option value="Out" <?=(!empty($value->in_out) && $value->in_out == 'Out'?'selected="selected"':'')?>>Out</option>
                                                    </select>
                                                   <!--  <input type="text" value="{{ $value->company_name }}" name="crossing_data[crossing_company][<?=$value->id?>][company_name]" id="built"> -->
                                                    <?php /*<select class="form-control" name="crossing_data[crossing_company][<?=$value->id?>][company_name]">
                                                        <option value="">Select Company</option>
                                                        @foreach ($company as $k => $com)
                                                            <option value="{{ $com->id }}" @if ( isset($value->company_name) && $value->company_name == $com->id) selected @endif>
                                                                {{ $com->company_name }}
                                                            </option>
                                                        @endforeach
                                                    </select> */?>
                                                    <input name="crossing_data[crossing_company][<?=$value->id?>][id]" class="form-control" value="{{ $value->id }}" type="hidden">
                                                    <p class="exp_error" style="display:none;color: red;">Please enter built</p>
                                                </div>
                                                <div class="fieldset half">
                                                    <label>Overnight</label>
                                                    <select class="form-control" name="crossing_data[crossing_company][<?=$value->id?>][overnight]">
                                                        <option value="">Overnight</option>
                                                        <option value="0" <?=(!empty($value->overnight) && $value->overnight == '0'?'selected="selected"':'')?>>0</option>
                                                        <option value="1" <?=(!empty($value->overnight) && $value->overnight == '1'?'selected="selected"':'')?>>1</option>
                                                        <option value="2" <?=(!empty($value->overnight) && $value->overnight == '2'?'selected="selected"':'')?>>2</option>
                                                        <option value="3" <?=(!empty($value->overnight) && $value->overnight == '3'?'selected="selected"':'')?>>3</option>
                                                        <option value="4" <?=(!empty($value->overnight) && $value->overnight == '4'?'selected="selected"':'')?>>4</option>
                                                        <option value="5" <?=(!empty($value->overnight) && $value->overnight == '5'?'selected="selected"':'')?>>5</option>
                                                    </select>
                                                    
                                                    <p class="exp_error" style="display:none;color: red;">Please enter passengers</p>
                                                </div>
                                                <div class="fieldset half">
                                                    <label>Cost £</label>
                                                    <input type="text" value="{{ $value->cost_pound }}" name="crossing_data[crossing_company][<?=$value->id?>][cost_pound]" id="cost_pound">
                                                    <p class="exp_error" style="display:none;color: red;">Please enter staff to guest</p>
                                                </div>
                                                <div class="fieldset half">
                                                    <label>Cost SS £</label>
                                                    <input type="text" value="{{ $value->cost_ss_pound }}" name="crossing_data[crossing_company][<?=$value->id?>][cost_ss_pound]" id="cost_ss_pound">
                                                    <p class="exp_error" style="display:none;color: red;">Please enter staff to guest</p>
                                                </div>
                                                <div class="fieldset half">
                                                    <label>Cost €</label>
                                                    <input type="text" value="{{ $value->cost_euro }}" name="crossing_data[crossing_company][<?=$value->id?>][cost_euro]" id="cost_euro">
                                                    <p class="exp_error" style="display:none;color: red;">Please enter cabins</p>
                                                </div>
                                                <div class="fieldset half">
                                                    <label>Cost SS €</label>
                                                    <input type="text" value="{{ $value->cost_ss_euro }}" name="crossing_data[crossing_company][<?=$value->id?>][cost_ss_euro]" id="cost_ss_euro">
                                                    <p class="exp_error" style="display:none;color: red;">Please enter cabins</p>
                                                </div>
                                                <div class="fieldset half">
                                                    <label>&nbsp</label>
                                                    
                                                    <a href="javascript:void(0);" class="delete_route_crossing" ><i class="far fa-times-circle" style="color: orange;"></i></a>
                                                </div>
                                               
                                            </div>
                             <?php
                                $cnts++;
                                }
                             } } } ?>
                        </div>
                        <div class="fieldset mt-3">
                        <input type="button" class="btn btn-primary btn-sm" value="Add more" id="add_company_crosssing">
                        </div>
                    </div>
                   
                </form>
                <input type="button" name="submit" class="ml-3 mb-1 btn btn-primary" data-id="{{$com->id}}" id="crossingFormSubmit" value="Submit">
            </div>
            @endforeach
           
            </div>
        </div>
        
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
    $(document).on('click','.nav-tabs li', function(){
        // $('.nav-link').removeClass('active');
        $('.nav-tabs li a').removeClass('active');
        var href =  $(this).children('a').attr('href');
        
        $(this).children('a').addClass('active');
        // $(this).closest('.nav-item').addClass('active');
        $('.tab-pane').removeClass('active');
        $(href).addClass('active');
    });
</script>
