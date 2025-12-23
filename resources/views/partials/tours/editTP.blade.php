

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
                    <div class="heading">TOUR PACK</div>
                    <div class="location"><?php echo $experience->name; ?></div>
                    <div class="date">{{ date('d M Y', $_dateMin) }} - {{ date('d M Y', $_dateMax) }} ({{$nights}} nights)</div>
                    <div class="hotel"><?php echo (!empty($hotel) && (count($hotel) == 1) ? @$hotel[0]->name : ''); ?></div>
                </div>

                <div class="tc_content_wrapper">
                    <div class="tc_content">
                        <form method="post" id="tpForm">
                            <div class="tc_boxes">

                                <div class="tc_box_wrapper">
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
                                </div>

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

                                
                                <?php 
                                if(!empty($experience->experienceAttractions)){
                                    $i = 1;
                                    foreach ($experience->experienceAttractions as $key => $value) {
                                        if($value->type_id == 1){
                                            $type = 'VIP';
                                        }elseif($value->type_id == 2){
                                            $type = 'Big Banner';                                
                                        }else{
                                            $type = 'Local';                                
                                        }
                                        ?>
                                        <div class="tc_box_wrapper">
                                            <div class="tc_box">

                                                <div class="header">
                                                    Experience <?php echo $i.': '.$type; ?>
                                                    <!-- <a href="#">Edit</a> -->
                                                </div>

                                                <div class="body">
                                                    <?php
                                                    $add = array();
                                                    $add[] = $value->address;
                                                    $add[] = $value->street;
                                                    $add[] = $value->city;
                                                    $add[] = $value->postcode;
                                                    $add[] = $value->country;
                                                    ?>
                                                    <ul>
                                                        <li>Experience name: <strong><?php echo $value->name; ?></strong></li>
                                                        <li>Date: <strong><?php echo (!empty($value->date) ? date('d M \'y',strtotime($value->date)) : ''); ?></strong></li>
                                                        <li>Time: <strong><?php echo (!empty($value->time) ? date('H:i',strtotime($value->time)) : '00:00') ?> hrs</strong></li>
                                                        <li>Inclusions: <strong><?php 
                                                        if(!empty($value->inclusions)){
                                                            $unserl = unserialize($value->inclusions);
                                                            echo implode(', ', $unserl);
                                                        } ?></strong></li>
                                                        <li>Address: <strong><?php echo implode(', ', $add); ?></strong></li>
                                                        <li>Tel: <strong><?php echo $value->main_contact_number; ?></strong></li>
                                                        <li>Booking ref number: <strong><?php echo (!empty($value->ref_nr) ? $value->ref_nr : '-'); ?></strong></li>
                                                    </ul>

                                                </div>

                                            </div>
                                        </div>
                                        
                                        <?php
                                        $i++;
                                    }
                                }
                                ?>
                            

                                <div class="tc_box_wrapper">
                                    <div class="tc_box">

                                        <div class="footer">

                                            <p>
                                                Make sure to check the weather! <a href="#">www.weather.com</a>
                                            </p>

                                            <p>
                                                Check how the traffic will affect your trip <a href="#">www.map.com</a>
                                            </p>

                                            <p class="large">
                                                Any issues on tour? Make sure to call Veenus
                                            </p>

                                            <div class="number">
                                                +44 7845 820050
                                            </div>

                                        </div>

                                    </div>
                                </div>

                            </div>

                            <div class="ctas">
                                <input type="hidden" name="dates_rates_id" value="{{$dates_rates->id}}">
                                <a href="javascript:;" class="cta" id="saveTpForm1" style="width: auto;">
                                    Save for later
                                </a>
                                <!-- <a href="javascript:;" id="downloadPDFtp" class="cta" dates_rates_id="{{$dates_rates->id}}" exp_id="{{$experience->id}}">
                                    Download
                                </a> -->
                                @if($dates_rates->mark_as_completed_tp != 1)
                                <a href="javascript:;" class="cta" id="markAsCompletedTP" style="width: auto;" data-id="{{$dates_rates->id}}">
                                    Mark as Completed
                                </a>
                                @else
                                <a href="javascript:;" class="cta" id="unmarkAsCompletedTP" style="width: auto;background: red;border-color: red;" data-id="{{$dates_rates->id}}">
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
    <?php if(!empty($dates_rates->mark_as_completed_tp)){ ?>
        $('.header a').hide();
    <?php } ?>
    $(document).on('click', '#breakfastEdit1', function(){
        $('#breakfastField1').show();
        $('#breakfastContent1').hide();
    });
    $(document).on('click', '#dinnerEdit1', function(){
        $('#dinnerField1').show();
        $('#dinnerContent1').hide();
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
    $(document).on('click', '#saveTpForm1', function(e) {
        e.preventDefault();
        var formData = $("#tpForm").serialize();
        $('.loader').show();    
        $.ajax({
            url: base_url+'/super-user/update-tp-data',
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
            url: base_url+'/super-user/download-tp-pdf',
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
            url: base_url+'/super-user/update-tp-data',
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