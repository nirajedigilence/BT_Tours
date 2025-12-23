

    <div class="notIndexContainer" style="padding-top:0;">
        <div class="tour_confirmation_wrapper" style="padding: 0;">
            <div class="tour_confirmation with_bg">

                <div class="reference">
                </div>
                <?php 
                $e_dates = array();
                if(!empty($experienceDate)){
                    foreach ($experienceDate as $key => $value) {
                        if(!empty($value['dates_rates_id'])){
                            $e_dates['date_from'][] = strtotime($value['date_from']);
                            $e_dates['date_to'][] = strtotime($value['date_to']);
                        }
                    } 
                }
                $_dateMin = 0;
                $_dateMax = 0;
                $nights = 0;
                if(isset($e_dates['date_from']) && isset($e_dates['date_to'])){
                    $_dateMin = min($e_dates['date_from']);
                    $_dateMax = max($e_dates['date_to']);
                    $diff = $_dateMax - $_dateMin; 
                    $nights = round($diff / 86400);
                }
                
                ?>
                <div class="tc_intro">
                    <div class="heading">TOUR DETAIL</div>
                    <div class="location"><?php echo $experience->name; ?></div>
                    <div class="date">{{ date('d M Y', $_dateMin) }} - {{ date('d M Y', $_dateMax) }} ({{$nights}} nights)</div>
                    <div class="hotel"><?php echo (!empty($hotel) && (count($hotel) == 1) ? @$hotel[0]->name : ''); ?></div>
                </div>

                <div class="tc_content_wrapper">
                    <div class="tc_content">
                        <form method="post" id="tpForm">
                            <div class="tc_boxes">

                              <!--   <div class="tc_box_wrapper">
                                    <div class="tc_box">

                                        <div class="header">
                                            Ref
                                        </div>

                                        <div class="body">

                                            <p>
                                                {{ $dates_rates->tp_ref_number }}
                                            </p>

                                        </div>

                                    </div>
                                </div> -->

                                <div class="tc_box_wrapper">
                                    <div class="tc_box">

                                        <div class="header">
                                            Hotel Details
                                        </div>
                                        <?php
                                        if(!empty($hotel)){
                                            foreach ($hotel as $key => $value) {
                                        ?>
                                        <div class="body">

                                            <ul>
                                                <li>Hotel Name: <strong><?php echo (!empty($value) ? $value->name : ''); ?></strong></li>
                                                <li>Hotel Address: <strong><?php
                                                    $address = array();
                                                    if(!empty($hotel->street)){
                                                        $address[] = $hotel->street;
                                                    } 
                                                    if(!empty($hotel->city)){
                                                        $address[] = $hotel->city;
                                                    } 
                                                    if(!empty($hotel->country)){
                                                        $address[] = $hotel->country;
                                                    } 
                                                    if(!empty($hotel->postcode)){
                                                        $address[] = $hotel->postcode;
                                                    } 
                                                    echo implode(', ', $address); ?></strong></li>
                                                <li>Contact number: <strong><?php echo (!empty($value) ? $value->phone : ''); ?></strong></li>
                                            </ul>
                                            <div class="tc_box_wrapper split">

                                                <div class="tc_box">

                                                    <div class="header">
                                                        Parking
                                                        <!-- <a href="#">Edit</a> -->
                                                    </div>

                                                    <div class="body">

                                                        <p>
                                                            <?php echo (!empty($value->exToHotel->parking_amenity) ? $value->exToHotel->parking_amenity : 'Not available!'); ?>
                                                        </p>

                                                    </div>

                                                </div>

                                                <div class="tc_box">

                                                    <div class="header">
                                                        Porterage
                                                        <!-- <a href="#">Edit</a> -->
                                                    </div>

                                                    <div class="body">

                                                        <p>
                                                            <?php echo (!empty($value->exToHotel->porterage_amenity) ? $value->exToHotel->porterage_amenity : 'Not available!'); ?>
                                                        </p>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="tc_box_wrapper split">

                                                <div class="tc_box">

                                                    <div class="header">
                                                        Lift access
                                                        <!-- <a href="#">Edit</a> -->
                                                    </div>

                                                    <div class="body">

                                                        <p>
                                                            <?php echo (!empty($value->exToHotel->lift_access_amenity) ? $value->exToHotel->lift_access_amenity : 'Not available!'); ?>
                                                        </p>

                                                    </div>

                                                </div>

                                                <div class="tc_box">

                                                    <div class="header">
                                                        Leisure
                                                        <!-- <a href="#">Edit</a> -->
                                                    </div>

                                                    <div class="body">

                                                        <p>
                                                            <?php echo (!empty($value->exToHotel->leisure_amenity) ? $value->exToHotel->leisure_amenity : 'Not available!'); ?>
                                                        </p>

                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                        <?php
                                        }
                                        }
                                        ?>
                                    </div>
                                </div>

                                <div class="tc_box_wrapper">
                                    <div class="tc_box">

                                        <div class="header">
                                            Arrival
                                            <a href="javascript:;" id="etaEdit1">Edit</a>
                                        </div>

                                        <div class="body">
                                            <textarea id="etaField1" name="eta" class="form-control" style="display: none;">{{ $dates_rates->tp_eta }}</textarea>
                                            <div id="etaContent1">
                                                {!! $dates_rates->tp_eta !!}
                                            </div>
                                           

                                        </div>

                                    </div>
                                </div>

                                <div class="tc_box_wrapper">
                                    <div class="tc_box">

                                        <div class="header">
                                            Departure
                                            <a href="javascript:;" id="etdEdit1">Edit</a>
                                        </div>

                                        <div class="body">
                                            <textarea id="etdField1" name="etd" class="form-control" style="display: none;">{{ $dates_rates->tp_etd }}</textarea>
                                            <div id="etdContent1">
                                                {!! $dates_rates->tp_etd !!}
                                            </div>
                                           

                                        </div>

                                    </div>
                                </div>

                                <div class="tc_box_wrapper">
                                    <div class="tc_box">

                                        <div class="header">
                                            No. of Guests
                                            <!-- <a href="#">Edit</a> -->
                                        </div>

                                        <div class="body">

                                            <p>
                                                <strong>16 pax plus driver</strong> (see rooming list for details, special and dietary requests)
                                            </p>

                                        </div>

                                    </div>
                                </div>
                                 <div class="tc_box_wrapper">
                                    <div class="tc_box">

                                        <div class="header">
                                            House Keeping
                                            <a href="javascript:;" id="house_keepingEdit1">Edit</a>
                                        </div>

                                        <div class="body">
                                            <textarea id="house_keepingField1" name="house_keeping" class="form-control" style="display: none;">{{ $dates_rates->tds_house_keeping }}</textarea>
                                            <div id="house_keepingContent1">
                                                {!! $dates_rates->tds_house_keeping !!}
                                            </div>
                                        
                                        </div>

                                    </div>
                                </div>
                                <div class="tc_box_wrapper">
                                    <div class="tc_box">

                                        <div class="header">
                                            Meal Arrangements
                                            <a href="javascript:;" id="mean_arrangementsEdit1">Edit</a>
                                        </div>

                                        <div class="body">
                                            <textarea id="mean_arrangementsField1" name="tds_mean_arrangements" class="form-control" style="display: none;">{{ $dates_rates->etc_meal_arrangements }}</textarea>
                                            <div id="mean_arrangementsContent1">
                                                {!! $dates_rates->etc_meal_arrangements !!}
                                            </div>
                                        
                                        </div>

                                    </div>
                                </div>
                                 <!-- <div class="tc_box_wrapper">
                                    <div class="tc_box">

                                        <div class="header">
                                            Dinner
                                            <a href="javascript:;" id="dinnerEdit1">Edit</a>
                                        </div>

                                        <div class="body">
                                            <textarea id="dinnerField1" name="dinner" class="form-control" style="display: none;">{{ $dates_rates->tp_dinner }}</textarea>
                                            <div id="dinnerContent1">
                                                {!! $dates_rates->tp_dinner !!}
                                            </div>
                                        
                                        </div>

                                    </div>
                                </div>
                                <div class="tc_box_wrapper">
                                    <div class="tc_box">

                                        <div class="header">
                                            Breakfast
                                            <a href="javascript:;" id="breakfastEdit1">Edit</a>
                                        </div>

                                        <div class="body">
                                            <textarea id="breakfastField1" name="breakfast" class="form-control" style="display: none;">{{ $dates_rates->tp_breakfast }}</textarea>
                                            <div id="breakfastContent1">
                                                {!! $dates_rates->tp_breakfast !!}
                                            </div>
                                            
                                        </div>

                                    </div>
                                </div>
                                <div class="tc_box_wrapper">
                                    <div class="tc_box">

                                        <div class="header">
                                            All meals
                                            <a href="javascript:;" id="mealEdit1">Edit</a>
                                        </div>

                                        <div class="body">
                                            <textarea id="mealField1" name="all_meals" class="form-control" style="display: none;">{{ $dates_rates->tds_all_meals }}</textarea>
                                            <div id="mealContent1">
                                                {!! $dates_rates->tds_all_meals !!}
                                            </div>
                                            
                                        </div>

                                    </div>
                                </div> -->
                               
                                <div class="tc_box_wrapper">
                                    <div class="tc_box">

                                        <div class="header">
                                            Inclusions
                                            <a href="javascript:;" id="inclusionEdit1">Edit</a>
                                        </div>

                                        <div class="body">
                                            <textarea id="inclusionField1" name="tour_inclusions" class="form-control" style="display: none;">{{ $dates_rates->tp_tour_inclusions }}</textarea>
                                            <div id="inclusionContent1">
                                                {!! $dates_rates->tp_tour_inclusions !!}
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                 <div class="tc_box_wrapper">
                                    <div class="tc_box">

                                        <div class="header">
                                            Important Information
                                            <a href="javascript:;" id="important_informationEdit1">Edit</a>
                                        </div>

                                        <div class="body">
                                            <textarea id="important_informationField1" name="important_information" class="form-control" style="display: none;">{{ $dates_rates->tds_important_information }}</textarea>
                                            <div id="important_informationContent1">
                                                {!! $dates_rates->tds_important_information !!}
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                
                               

                                <p>I have reviewed and agree with the above tour details.</p>

                            </div>
                             <div class="signatures">
                                <?php if(isset($dates_rates->sign_name_tds) && !empty($dates_rates->sign_name_tds) && !empty($dates_rates->mark_as_completed_tds)){ ?>
                                    <div class="signature_column">

                                        <div class="heading">
                                            <?php echo $dates_rates->sign_name_tds; ?>
                                        </div>

                                        <p>
                                            <?php echo $dates_rates->sign_name_tds; ?><br>
                                            <?php 
                                            $signature_list = App\Models\Cms\SignatureName::orderBy('id','DESC')->where('name',$dates_rates->sign_name_tds)->first();
                                            if(!empty($signature_list->description))
                                            {
                                                echo $signature_list->description;
                                            }
                                            /*if($dates_rates->sign_name_tds == 'Grace Selby'){
                                                echo 'Experience Cooridnator';
                                            }elseif($dates_rates->sign_name_tds == 'Ranjiv Bhalla'){
                                                echo 'Director';
                                            }elseif($dates_rates->sign_name_tds == 'Gurpreet Kalsi'){
                                                echo 'Senior Experience Designer';
                                            }*/
                                            ?>
                                            
                                        </p>

                                    </div>
                                <?php }else{ ?>
                                    <div class="signature_column with_box">

                                        <div class="heading">
                                            Signature
                                        </div>

                                        <select name="sign_name_tds" id="sign_name" class="form-control text_change" required="">
                                            <option value="">--</option>
                                            <?php if(!empty($signature_list)) {
                                                foreach($signature_list as $srow)
                                                {
                                                    $status = $srow->status;
                                                    if((!empty($dates_rates->sign_name_tds) && $dates_rates->sign_name_tds == $srow->name))
                                                    {
                                                        $status = 1;
                                                    }
                                                    if($status == 1){
                                                    ?>
                                                    <option <?=(!empty($dates_rates->sign_name_tds) && $dates_rates->sign_name_tds == $srow->name)?'selected="selected"':''?> value="{{$srow->name}}">{{$srow->name}}</option>
                                                    <?php
                                                    }
                                                }
                                            }?>
                                            
                                            <!-- <option value="Ranjiv Bhalla">Ranjiv Bhalla</option>
                                            <option value="Gurpreet Kalsi">Gurpreet Kalsi</option> -->
                                        </select>

                                    </div>
                                <?php } ?>

                            </div>
                            <div class="ctas">
                                <input type="hidden" name="dates_rates_id" value="{{$dates_rates->id}}">
                                <a href="javascript:;" class="cta" id="saveTdsForm1" style="width: auto;">
                                    Save for later
                                </a>
                                <a href="javascript:;" id="downloadPDFtp" class="cta" dates_rates_id="{{$dates_rates->id}}" exp_id="{{$experience->id}}">
                                    Download
                                </a>
                                @if($dates_rates->mark_as_completed_tds != 1)
                                <a href="javascript:;" class="cta" id="markAsCompletedTDS" style="width: auto;" data-id="{{$dates_rates->id}}">
                                    Mark as Completed
                                </a>
                                @else
                                <a href="javascript:;" class="cta" id="unmarkAsCompletedTDS" style="width: auto;background: red;border-color: red;" data-id="{{$dates_rates->id}}">
                                    Un-mark as complete
                                </a>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

<div id="tobeprinted" style="display:none;"></div>
<script type="text/javascript">
    <?php if(!empty($dates_rates->mark_as_completed_tds)){ ?>
        $('.header a').hide();
    <?php } ?>
    $(document).on('click', '#unmarkAsCompletedTDS', function() {
        var exp_date_id = $(this).attr('data-id');
        $('.loader').show();    
        $.ajax({
            url: base_url+'/super-user/unmark-as-completed-tds',
            type: 'POST',
            data: {'exp_date_id':exp_date_id},
            success: function(data) {
                $('.loader').hide();  
                $('#hcModal').modal('hide');
                toastSuccess('Tour has been updated successfully.');
            },
            error: function(e) {
            }
        });   
    });
        $(document).on('click', '#markAsCompletedTDS', function() {
        var exp_date_id = $(this).attr('data-id');
        $('.loader').show();    
        $.ajax({
            url: base_url+'/super-user/mark-as-completed-tds',
            type: 'POST',
            data: {'exp_date_id':exp_date_id},
            success: function(data) {
                $('.loader').hide();  
                $('#saveTpForm').click();
                // $('#tpModal').modal('hide');
                // toastSuccess('Tour has been updated successfully.');
            },
            error: function(e) {
            }
        });   
    });
    $(document).on('click', '#breakfastEdit1', function(){
        $('#breakfastField1').show();
        $('#breakfastContent1').hide();
    });
    $(document).on('click', '#mealEdit1', function(){
        $('#mealField1').show();
        $('#mealContent1').hide();
    });
    $(document).on('click', '#mean_arrangementsEdit1', function(){
        $('#mean_arrangementsField1').show();
        $('#mean_arrangementsContent1').hide();
    });
    $(document).on('click', '#dinnerEdit1', function(){
        $('#dinnerField1').show();
        $('#dinnerContent1').hide();
    });
    $(document).on('click', '#house_keepingEdit1', function(){
        $('#house_keepingField1').show();
        $('#house_keepingContent1').hide();
    });
    
    $(document).on('click', '#etdEdit1', function(){
        $('#etdField1').show();
        $('#etdContent1').hide();
    });
    $(document).on('click', '#etaEdit1', function(){
        $('#etaField1').show();
        $('#etaContent1').hide();
    });
    $(document).on('click', '#inclusionEdit1', function(){
        $('#inclusionField1').show();
        $('#inclusionContent1').hide();
    });
    $(document).on('click', '#important_informationEdit1', function(){
        $('#important_informationField1').show();
        $('#important_informationContent1').hide();
    });
    $(document).on('click', '#saveTdsForm1', function(e) {
        e.preventDefault();
        var formData = $("#tpForm").serialize();
        $('.loader').show();    
        $.ajax({
            url: base_url+'/super-user/update-tds-data',
            type: 'POST',
            data: {'formData':formData},
            success: function(data) {
                $('.loader').hide();
                $('#tpModal').modal('hide');
                toastSuccess('Tour has been updated successfully.');
            },
            error: function(e) {
            }
        });   
    });
    $(document).on('click', '#downloadPDFtp', function(e) {
        e.preventDefault();
        var exp_id = $(this).attr('exp_id');
        var dates_rates_id = $(this).attr('dates_rates_id');
        $('.loader').show();    
        $.ajax({
            url: base_url+'/super-user/download-tds-pdf',
            type: 'POST',
            data: {'exp_id':exp_id,'dates_rates_id':dates_rates_id},
            success: function(data) {
                $('.loader').hide();  
                $('#tobeprinted').html(data.response); 
                w=window.open();
                w.document.write($('#tobeprinted').html());
                w.print();
                w.close(); 
            },
            error: function(e) {
            }
        });   
    });
    /*$('#tpModal').on('hidden.bs.modal', function (e) {
        e.preventDefault();
        var formData = $("#tpForm").serialize();
        $('.loader').show();    
        $.ajax({
            url: base_url+'/super-user/update-tds-data',
            type: 'POST',
            data: {'formData':formData},
            success: function(data) {
                $('.loader').hide();
                $('#tpModal').modal('hide');
                toastSuccess('Tour has been updated successfully.');
            },
            error: function(e) {
            }
        });   
    });*/
</script>