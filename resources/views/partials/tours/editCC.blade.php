<style type="text/css">.no-boder{border: unset !important ;}</style>
<div class="notIndexContainer" style="padding-top:0;">
    <div class="tour_confirmation_wrapper" style="padding: 0;">
        <div class="tour_confirmation">

            <div class="logo">
                <img src="{{ asset('images/logo2x.png') }}" alt="Veenus">
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
            $_dateMin = min($e_dates['date_from']);
            $_dateMax = max($e_dates['date_to']);
            $diff = $_dateMax - $_dateMin; 
            $nights = round($diff / 86400);
            
            ?>
            <div class="tc_intro">
                <div class="heading">CRUISE CONFIRMATION</div>
                <div class="location"><?php echo $experience->name; ?></div>
                <div class="date">{{ date("D d M", $_dateMin) }} - {{ date("D d M 'y", $_dateMax) }} ({{$nights}} nights)</div>
                <div class="hotel"><?php echo (!empty($hotel) && (count($hotel) == 1) ? $hotel[0]->name : ''); ?></div>
            </div>
            <div class="tc_content">
                <form method="post" id="etcForm">
                <div class="tc_boxes">

                    <div class="tc_box_wrapper">
                        <div class="tc_box">

                            <div class="header">
                                Ref
                            </div>

                            <div class="body">

                                <p>
                                  
                                </p>

                            </div>

                        </div>
                    </div>
                     <div class="tc_box_wrapper split">

                                <div class="tc_box">

                                    <div class="header">
                                        Tour Date
                                    </div>

                                    <div class="body">

                                        <p>
                                            {{ date("D d M", strtotime($value['date_from'])) }} - {{ date("D d M 'y", strtotime($value['date_to'])) }}
                                        </p>

                                    </div>

                                </div>

                                <div class="tc_box">

                                    <div class="header">
                                       Nights
                                    </div>

                                    <div class="body">

                                        <p>
                                            ({{$nights}} nights)
                                        </p>

                                    </div>

                                </div>

                            </div>
                            <div class="tc_box_wrapper">
                                <div class="tc_box">

                                    <div class="header">
                                        <?php echo $experience->name; ?>
                                    </div>

                                    <div class="body">

                                        <div class="hotel">





                                        </div>
                                        <?php  $river = explode(',',$experience->rivers);
                                        $river_name = '';
                                        if(!empty($river))
                                        {
                                            foreach($river as $rid)
                                            {
                                               $rname= 


DB::connection('mysql_veenus')->table('rivers')->where('id',$rid)->first();
                                               $f= (!empty($river_name)?', ':'');
                                               $river_name = $f.$rname->name;
                                            }
                                        }
                                        ?>
                                        <p><b>Ship: </b> <?php echo (!empty($hotel) && (count($hotel) == 1) ? $hotel[0]->name : ''); ?></p>
                                        <p><b>Cruise date: </b> {{ date("D d M", strtotime($value['date_from'])) }} - {{ date("D d M 'y", strtotime($value['date_to'])) }} </p>
                                        <p><b>River: </b>{{$river_name}} </p>
                                        <p><b>Route: </b><?php $r1 = 0; $count = count($experience->getExperiencesToRoutes); ?>
                                        @foreach ($experience->getExperiencesToRoutes as $routev){{ $routev->name }} 
                                        <span style="color:#14213D;">{{(($r1+1)<$count)?'>':''}}</span>
                                        <?php $r1++; ?>
                                        @endforeach</p>
                                        <p><b>Embarkation: </b>{{!empty($experienceDate[0]->shipDates->embarkation)?$experienceDate[0]->shipDates->embarkation:''}}</p>
                                        <p><b>Disembarkation: </b>{{!empty($experienceDate[0]->shipDates->disembarkation)?$experienceDate[0]->shipDates->disembarkation:''}} </p>

                                    </div>
                                </div>


                            </div>
                           <?php /* <div class="tc_box_wrapper">
                                <div class="tc_box">

                                    <div class="header">
                                        Crossings
                                    </div>

                                    <div class="body">
                                        <?php 

                                        $crossing_inbound  = $cart_experience->crossing_inbound_data->overnight;
                                        $crossing_outbound = $cart_experience->crossing_outbound_data->overnight;
                                        $overnight_inbound = $cart_experience->overnight_inbound;
                                        $overnight_outbound = $cart_experience->overnight_outbound;
                                        $start_date = date('Y-m-d',strtotime($ship_data['date_from_org']));
                                        $end_date = date('Y-m-d',strtotime($ship_data['date_to_org']));
                                        //Inbound
                                        if(!empty($overnight_inbound))
                                        {
                                            $overnight_inbound_start_date = date('Y-m-d', strtotime($start_date. ' - '.$overnight_inbound.' days'));
                                        }
                                        else
                                        {
                                            $overnight_inbound_start_date = $start_date;
                                        }
                                        if(!empty($crossing_inbound))
                                        {
                                            $crossing_inbound_start_date = date('Y-m-d', strtotime($overnight_inbound_start_date. ' - '.$overnight_inbound.' days'));
                                        }
                                        else
                                        {
                                            $crossing_inbound_start_date = $overnight_inbound_start_date;
                                        }
                                        //outbound
                                        if(!empty($overnight_outbound))
                                        {
                                            $overnight_outbound_end_date = date('Y-m-d', strtotime($end_date. ' + '.$overnight_outbound.' days'));
                                        }
                                        else
                                        {
                                            $overnight_outbound_end_date = $end_date;
                                        }
                                        if(!empty($crossing_outbound))
                                        {
                                            $crossing_outbound_end_date = date('Y-m-d', strtotime($overnight_outbound_end_date. ' + '.$overnight_outbound.' days'));
                                        }
                                        else
                                        {
                                            $crossing_outbound_end_date = $overnight_outbound_end_date;
                                        }
                                        ?>
                                        <p><b>Crossing inbound:</b> {{$cart_experience->crossing_inbound_data->route}}</p>
                                        <p><b>Date:</b> {{date("D d M",strtotime($crossing_inbound_start_date))}} - {{date("D d M 'y",strtotime($overnight_inbound_start_date))}}</p>
                                        <p><b>Crossing outbound:</b> {{$cart_experience->crossing_outbound_data->route}}</p>
                                        <p><b>Date:</b> {{date("D d M",strtotime($crossing_outbound_end_date))}} - {{date("D d M 'y",strtotime($overnight_outbound_end_date))}} </p>

                                    </div>
                                </div>


                            </div>
                            <div class="tc_box_wrapper">
                                <div class="tc_box">

                                    <div class="header">
                                        Overnight In
                                    </div>

                                    <div class="body">

                                        <p><b>Hotel:</b> TBC***</p>
                                        <p><b>Date:</b>  {{date("D d M",strtotime($overnight_inbound_start_date))}} - {{date("D d M 'y",strtotime($start_date))}} </p>

                                    </div>
                                </div>


                            </div>
                            <div class="tc_box_wrapper">
                                <div class="tc_box">

                                    <div class="header">
                                        Overnight Out
                                    </div>

                                    <div class="body">

                                        <p><b>Hotel:</b> TBC***</p>
                                        <p><b>Date:</b>{{date("D d M",strtotime($overnight_outbound_end_date))}} - {{date("D d M 'y",strtotime($end_date))}}</p>

                                    </div>
                                </div>


                            </div> */ ?>
                            <div class="tc_box_wrapper">
                                <div class="tc_box">

                                    <div class="header">
                                        Rates &amp; Allocation
                                    </div>

                                    <div class="body">

                                        <div class="rates_table">

                                            <div class="rt_row">

                                                  <div class="rt_column label">
                                                    Cabin Type
                                                </div>
                                                <div class="rt_column label">
                                                    No. Cabins
                                                </div>

                                                <div class="rt_column label">
                                                    Rate pp &#8364;
                                                </div>

                                                <div class="rt_column label">
                                                    SS pp &#8364;
                                                </div>
                                                 <div class="rt_column label">
                                                    SS After  &#8364; 
                                                </div>

                                            </div>
                                              @if(!empty($cabinDetail))
                                                @foreach($cabinDetail as $cabinval)
                                                 <div class="rt_row">                                               
                                                        <div class="rt_column bold">
                                                            {{$cabinval->name}} </div>
                                                        <div class="rt_column bold">
                                                            {{$cabinval->no_cabin}} </div>
                                                        <div class="rt_column bold">
                                                            {{sprintf('%0.2f',$cabinval->rate_euro)}} </div>
                                                        <div class="rt_column bold">
                                                            {{sprintf('%0.2f',$cabinval->ss_euro)}} </div>
                                                        <div class="rt_column bold">
                                                            {{sprintf('%0.2f',$cabinval->ss_after_euro)}} </div>
                                                    </div>
                                               
                                                @endforeach
                                            @endif
                                           
                                            <!-- <div class="">
                                                <p><b>Additional information</b></p>
                                                <p>SRS (single supplements)</p>
                                                <p>30% for intial two standards</p>
                                                <p>Further Standard Cabins Carry SRS of 45%</p>
                                                <p>junior suits carry SRS of 45%</p>
                                            </div> -->
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="tc_box_wrapper">
                                <div class="tc_box">

                                    <div class="header">
                                        
                                         <div style="width:55%;">Excursions  </div>
                                            <div style="width:45%;">
                                                
                                            </div> 
                                    </div>

                                    <div class="body">

                                        <div class="rates_table">

                                            <div class="excursion_div">
                                           <div class="rt_row">
                                                
                                                 <div class="rt_column label">
                                                    Excursion name
                                                </div>
                                                <div class="rt_column label">
                                                    Cost
                                                </div>

                                                <div class="rt_column label">
                                                    In Price &#8364;
                                                </div>

                                                <div class="rt_column label">
                                                    Out Price &#8364;
                                                </div>

                                                <div class="rt_column label">
                                                    Out Price &#163;
                                                </div>
                                                
                                            </div>
                                             <?php 
                                            if(isset($experienceDate[0]->shipDates->shipDatesExcursions)){
                                                if(count($experienceDate[0]->shipDates->shipDatesExcursions) >= 1){
                                                    $cnts = '11565';
                                                foreach ($experienceDate[0]->shipDates->shipDatesExcursions as $key => $valField) { 
                                                     ?>
                                                     <div class="rt_row excursion_row">
                                                        <div class="rt_column bold no-boder">
                                                            <input type="text" readonly class="notClickedCls hdioCls form-control"  placeholder="Excursion name" value="{{$valField->excursion_name}}" name="dates_edit[excursion][{{$valField->id}}][excursion_name]" >
                                                             <input name="dates_edit[excursion][<?=$valField->id?>][id]" class="form-control" value="{{ $valField->id }}" type="hidden">
                                                        </div>
                                                        <div class="rt_column bold no-boder">
                                                             <select readonly class="form-control notClickedCls" name="dates_edit[excursion][{{$valField->id}}][price_type]">
                                                                        <option <?=(!empty($valField->price_type) && $valField->price_type == 'pppn')?'selected="selected"':''?> value="pppn">pppn</option>
                                                                        <option <?=(!empty($valField->price_type) && $valField->price_type == 'prpn')?'selected="selected"':''?> value="prpn">prpn</option>
                                                            </select>
                                                        </div>
                                                        <div class="rt_column bold no-boder">
                                                            <input type="text" readonly class="notClickedCls hdioCls form-control numbercls"  placeholder="In Price" value="{{$valField->in_price_euro}}" name="dates_edit[excursion][{{$valField->id}}][in_price_euro]" >
                                                        </div>
                                                        <div class="rt_column bold no-boder disabled">
                                                             <input type="text" readonly class="notClickedCls hdioCls form-control numbercls"  placeholder="Out Price" value="{{$valField->out_price_euro}}" name="dates_edit[excursion][{{$valField->id}}][out_price_euro]" >
                                                        </div>
                                                        <div class="rt_column bold no-boder disabled">
                                                             <input type="text" readonly class="notClickedCls hdioCls form-control numbercls"  placeholder="Out Price" value="{{$valField->out_price_pound}}" name="dates_edit[excursion][{{$valField->id}}][out_price_pound]" >
                                                        </div>
                                                        <div class="bold no-boder disabled">
                                                            <!-- <a href="javascript:void(0);" class="delete_excursion" style=""><i class="far fa-times-circle"></i></a> -->
                                                        </div>
                                                        </div>
                                            <?php
                                                $cnts++;
                                                
                                             } } } ?>
                                            </div>
                                            <div class="rt_row mt-3">
                                           <!--  <input type="button" class="btn btn-primary btn-sm" value="Add row" id="add_excursion_more">
                                            <input type="hidden" name=" expExcursionRow" class="expExcursionRow" value="" >-->
                                            </div>
                                            <?php /*if(!empty($_GET['contracts'])){*/ ?> 
                                             <!-- <input type="button" id="add_euro" value="Add Euro" class="btn btn-secondary" > -->
                                         <?php /*}*/ ?>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="tc_box_wrapper">
                                <div class="tc_box">

                                    <div class="header">
                                        
                                         <div style="width:55%;">Supplements  </div>
                                            <div style="width:45%;">
                                                
                                            </div> 
                                    </div>

                                    <div class="body">

                                        <div class="rates_table">

                                            <div class="excursion_div">
                                           <div class="rt_row">
                                                
                                                 <div class="rt_column label">
                                                    Supplement name
                                                </div>
                                                <div class="rt_column label">
                                                    Cost
                                                </div>

                                                <div class="rt_column label">
                                                    In Price &#8364;
                                                </div>

                                                <div class="rt_column label">
                                                    Out Price &#8364;
                                                </div>

                                                <div class="rt_column label">
                                                    Out Price &#163;
                                                </div>
                                                
                                            </div>
                                              <?php 
                                        if(isset($experienceDate[0]->shipDates->shipDatesSupplements)){
                                            if(count($experienceDate[0]->shipDates->shipDatesSupplements) >= 1){
                                                $cnts = '11565';
                                            foreach ($experienceDate[0]->shipDates->shipDatesSupplements as $key => $valField) { 
                                                 ?>
                                                 <div class="rt_row supplement_row">
                                                    <div class="rt_column bold no-boder">
                                                        <input type="text" readonly class="notClickedCls hdioCls form-control"  placeholder="Supplement name" value="{{$valField->supplement_name}}" name="dates_edit[supplement][{{$valField->id}}][supplement_name]" >
                                                         <input name="dates_edit[supplement][<?=$valField->id?>][id]" class="form-control" value="{{ $valField->id }}" type="hidden">
                                                    </div>
                                                    <div class="rt_column bold no-boder">
                                                         <select readonly class="form-control notClickedCls" name="dates_edit[supplement][{{$valField->id}}][price_type]">
                                                                    <option <?=(!empty($valField->price_type) && $valField->price_type == 'pppn')?'selected="selected"':''?> value="pppn">pppn</option>
                                                                    <option <?=(!empty($valField->price_type) && $valField->price_type == 'prpn')?'selected="selected"':''?> value="prpn">prpn</option>
                                                        </select>
                                                    </div>
                                                    <div class="rt_column bold no-boder">
                                                        <input type="text" readonly class="notClickedCls hdioCls form-control numbercls"  placeholder="In Price" value="{{$valField->in_price_euro}}" name="dates_edit[supplement][{{$valField->id}}][in_price_euro]" >
                                                    </div>
                                                    <div class="rt_column bold no-boder disabled">
                                                         <input type="text" readonly class="notClickedCls hdioCls form-control numbercls"  placeholder="Out Price" value="{{$valField->out_price_euro}}" name="dates_edit[supplement][{{$valField->id}}][out_price_euro]" >
                                                    </div>
                                                    <div class="rt_column bold no-boder disabled">
                                                         <input type="text" readonly class="notClickedCls hdioCls form-control numbercls"  placeholder="Out Price" value="{{$valField->out_price_pound}}" name="dates_edit[supplement][{{$valField->id}}][out_price_pound]" >
                                                    </div>
                                                    <div class="bold no-boder disabled">
                                                        <!-- <a href="javascript:void(0);" class="delete_supplement" style=""><i class="far fa-times-circle"></i></a> -->
                                                    </div>
                                                    </div>
                                                    <?php
                                                        $cnts++;
                                                        
                                                     } } } ?>
                                            </div>
                                            <div class="rt_row mt-3">
                                           <!--  <input type="button" class="btn btn-primary btn-sm" value="Add row" id="add_excursion_more">
                                            <input type="hidden" name=" expExcursionRow" class="expExcursionRow" value="" >-->
                                            </div>
                                            <?php /*if(!empty($_GET['contracts'])){*/ ?> 
                                             <!-- <input type="button" id="add_euro" value="Add Euro" class="btn btn-secondary" > -->
                                         <?php /*}*/ ?>
                                        </div>

                                    </div>

                                </div>
                            </div>
                           
                </div>
                
                

                <div class="ctas">
                    <input type="hidden" name="exp_id" value="{{$experience->id}}">
                    <input type="hidden" name="exp_date_rate_id" value="{{$dates_rates->id}}">
                    <input type="hidden" value="" name="is_changed" id="is_changed">
                    @if(empty($is_hotel_assieged))
                    <a href="javascript:;" class="cta" id="saveEtcForm" style="width: auto;">
                        Save for later
                    </a>
                    @endif
                    @if($dates_rates->mark_as_completed_cc != 1)
                    <a href="javascript:;" class="cta <?=!empty($is_hotel_assieged)?'booked_hotel':''?>" id="markAsCompletedCC" style="width: auto;" data-id="{{$dates_rates->id}}">
                        Mark as Completed
                    </a>
                    @else
                    
                    <a href="javascript:;" class="cta <?=!empty($is_hotel_assieged)?'booked_hotel':''?>" id="unmarkAsCompletedCC" style="width: auto;background: red;border-color: red;" data-id="{{$dates_rates->id}}">
                        Un-mark as complete
                    </a>
                   
                   <!--  <a href="javascript:;" class="cta" id="downloadPDFetc" style="width: auto;" dates_rates_id="{{$dates_rates->id}}" exp_id="{{$experience->id}}">
                        Download
                    </a> -->
                    <?php if(!empty($dates_rates->pdf_file_name)){ ?> 
                     
                    <a target="_bl" href="{{asset('public/pdf/'.$dates_rates->pdf_file_name)}}" class="cta ">download</a>
                    <?php } ?>
                    @endif
                </div>
                </form>
            </div>

        </div>
    </div>
</div>
<div id="tobeprinted" style="display:none;"></div>
<script type="text/javascript">
       $(document).on('click', '#tncEdit', function(){
            $('#tncField').show();
            $('#tcContent').hide();
        });
        $(document).on('click', '#sfEdit', function(){
            $('#sfField').show();
            $('#sfContent').hide();
            CKEDITOR.replace('sfField', {
                toolbar: [{
                    name: 'styles',
                    items: ['Styles']
                }, ]
            });
        });
        $(document).on('click', '#inclusionsEdit', function(){
            $('#inclusionsField').show();
            $('#inclusionsContent').hide();
        });
         $(document).on('click', '#freeEdit', function(){
            $('#freeField').show();
            $('#freeContent').hide();
        });
        $(document).on('click', '#mealEdit', function(){
            $('#mealField').show();
            $('#mealContent').hide();
        });
        $(document).on('click', '#tncEdit', function() {
            $('#tncField').show();
            $('#tcContent').hide();
            CKEDITOR.replace('tncField', {
                toolbar: [{
                    name: 'styles',
                    items: ['Styles']
                }, ]
            });
        });
        $(document).on('click', '#inclusionEdit', function() {
            $('#inclusionField').show();
            $('#inclusionContent').hide();
            CKEDITOR.replace('inclusionField', {
                toolbar: [{
                    name: 'styles',
                    items: ['Styles']
                }, ]
            });
        });
        $(document).on('click', '#sfEdit2', function() {
            $('#sfField2').show();
            $('#sfContent2').hide();
            CKEDITOR.replace('sfField2', {
                toolbar: [{
                    name: 'styles',
                    items: ['Styles']
                }, ]
            });
        });
        $(document).on('click', '#freeEdit', function() {
            $('#freeField').show();
            $('#freeContent').hide();
            CKEDITOR.replace('freeField', {
                toolbar: [{
                    name: 'styles',
                    items: ['Styles']
                }, ]
            });
        });
        $(document).on('click', '#ratesEdit', function() {
            $('#ratesallocationField').show();
            $('#ratesallocationContent').hide();
            CKEDITOR.replace('ratesallocationField', {
                toolbar: [{
                    name: 'styles',
                    items: ['Styles']
                }, ]
            });
        });

        $(document).on('click', '#mealEdit', function() {
            $('#mealField').show();
            $('#mealContent').hide();
            CKEDITOR.replace('mealField', {
                toolbar: [{
                    name: 'styles',
                    items: ['Styles']
                }, ]
            });
        });
    $(document).on('click', '#saveEtcForm', function(e) {
        e.preventDefault();
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        }
        var formData = $("#etcForm").serialize();
        $('.loader').show();    
        $.ajax({
            url: base_url+'/super-user/update-cbc-data',
            type: 'POST',
            data: {'formData':formData},
            success: function(data) {
                $('.loader').hide();  
                $('#etcModal').modal('hide');
                toastSuccess('Tour has been updated successfully.');
            },
            error: function(e) {
            }
        });   
    });
    $(document).on('click', '#downloadPDFetc', function(e) {
        e.preventDefault();
        var exp_id = $(this).attr('exp_id');
        var dates_rates_id = $(this).attr('dates_rates_id');
        $('.loader').show();    
        $.ajax({
            url: base_url+'/super-user/download-etc-pdf',
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
    $(document).ready(function(){

    $('#HtlGetTemplate').bind('click', function(e) {
        e.preventDefault();
        var exp_id = $('#HtlGetTemplate').attr('exp_id');

        var hotel_id = $('#HtlGetTemplate').attr('hotel_id');
        if(confirm('Are you sure you want to import the template, this will overwrite data in the exisiting fields?'))
        {
             $('.loader').show();    
            $.ajax({
                url: base_url+'/get-tourpack-confirm-details/'+exp_id,
                //url: base_url+'/super-user/edit-hc',
                type: 'GET',
                success: function(data) {
                    
                    if (data.confirmation_template_hc != null) {
                        console.log(data.confirmation_template_hc);
                        $('#freeField2').val(data.confirmation_template_hc.ect_free_place); 
                        $('#mealField2').val(data.confirmation_template_hc.ect_confirm_description); 
                        $('#inclusionField2').val(data.confirmation_template_hc.ect_group_size);
                        $('#sfField2').val(data.confirmation_template_hc.ect_mobility_access);
                        $('#tncField2').val(data.confirmation_template_hc.ect_terms_conditions);
                         $('#ratesallocationField').val(data.confirmation_template_hc.ect_confirm_additional_info);

                        $('#freeContent2').html(data.confirmation_template_hc.ect_free_place); 
                        $('#mealContent2').html(data.confirmation_template_hc.ect_confirm_description);
                        $('#inclusionContent2').html(data.confirmation_template_hc.ect_group_size); 
                        $('#sfContent2').html(data.confirmation_template_hc.ect_mobility_access);
                        $('#tcContent2').html(data.confirmation_template_hc.ect_terms_conditions);
                       $('#ratesallocationContent').html(data.confirmation_template_hc.ect_confirm_additional_info);
                        $('.loader').hide();  
                    } else{
                        $('.loader').hide();  
                        return false;
                    }
                   // $('#HtlConfrmTplBody').html(data.html); 
                   // $('#HtlConfrmTplBody').show(); 
                },
                error: function(e) {
                }
            });
             
        }
        
        });
    });
    /*$('#etcModal').on('hidden.bs.modal', function (e) {
         e.preventDefault();
        var formData = $("#etcForm").serialize();
        $('.loader').show();    
        $.ajax({
            url: base_url+'/super-user/update-etc-data',
            type: 'POST',
            data: {'formData':formData},
            success: function(data) {
                $('.loader').hide();  
                $('#etcModal').modal('hide');
                toastSuccess('Tour has been updated successfully.');
            },
            error: function(e) {
            }
        });     
    });*/
</script>