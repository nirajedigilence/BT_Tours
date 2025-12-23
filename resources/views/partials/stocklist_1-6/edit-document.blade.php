@extends('layouts.front')

@section('content')
<style type="text/css">
    .tour_documents_edit_popup {
    position: unset;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
     background: unset; 
    padding: 80px 0;
    z-index: 9999;
    overflow-y: auto;
    overflow-x: hidden;
    -webkit-overflow-scrolling: touch;
}
</style>
<?php 
        $data['exp_id'] = $exp_id;

$html = '';
        $newHtml = '' ;
        /* $html .= '<div class="heading" style="margin-bottom: 15px;">
                                Edit tour documents
                            </div>
                            <h5 style="margin-bottom: 30px;">Here you can edit any documents that will be used for the bookings.</h5>
                            <select class="form-control" id="checkBookings">
                                <option value="1">Active Bookings</option>
                                <option value="2">Past Bookings</option>
                                <option value="3">Unbooked dates</option>
                            </select>
                            <div class="tour_dates_header" style="padding: 10px 0px;font-weight: bold;color: #000;">
                                Tour Dates
                            </div>';*/
 if(!empty($data['exp_id'])){
            $experience = App\Models\Cms\Experience::where('id' ,$data['exp_id'])->get()->first();
            $ExperienceDate = App\Models\Cms\ExperienceDate::where('experiences_id', $data['exp_id'])->where('deleted_at', null)->get()->toArray();
            
            $e_dates = array();
            if(!empty($ExperienceDate)){
                foreach ($ExperienceDate as $key => $value) {
                    if(!empty($value['dates_rates_id'])){
                        $e_dates[$value['dates_rates_id']]['date_from'][] = strtotime($value['date_from']);
                        $e_dates[$value['dates_rates_id']]['date_to'][] = strtotime($value['date_to']);
                        $e_dates[$value['dates_rates_id']]['date'][] = $value;
                    }
                }
            }
            if(!empty($e_dates)){
                foreach ($e_dates as $k => $val) {

                    $count = count($val['date']);
                    $text = '';
                    if($count > 1){
                        $text = 'Combined date for '.$count.' hotels';
                    }

                    $_dateMin = min($val['date_from']);
                    $_dateMax = max($val['date_to']);

                        $cart_experiences1 = 


DB::connection('mysql_veenus')->table('cart_experiences')->where('dates_rates_id', $k)->where('experiences_id', $data['exp_id'])->where('date_from', date('Y-m-d',$_dateMin))->where('date_to', date('Y-m-d',$_dateMax))->where('full_cancel', 1)->where('deleted_at',null)->first();

                        $cart_experiences = 


DB::connection('mysql_veenus')->table('cart_experiences')->where('dates_rates_id', $k)->where('experiences_id', $data['exp_id'])->where('date_from', date('Y-m-d',$_dateMin))->where('date_to', date('Y-m-d',$_dateMax))->where('completed', 1)->where('deleted_at',null)->first();

                        $cart_experiencesUnbookedDate = 


DB::connection('mysql_veenus')->table('cart_experiences')->where('dates_rates_id', $k)->where('experiences_id', $data['exp_id'])->where('date_from', date('Y-m-d',$_dateMin))->where('date_to', date('Y-m-d',$_dateMax))->where('full_cancel', 0)->where('completed', 0)->where('deleted_at',null)->first();

                        $cart_experiencesUnbookedDate123 = 


DB::connection('mysql_veenus')->table('cart_experiences')->where('dates_rates_id', $k)->where('experiences_id', $data['exp_id'])->where('date_from', date('Y-m-d',$_dateMin))->where('date_to', date('Y-m-d',$_dateMax))->where('full_cancel', 0)->where('completed', 0)->where('deleted_at',null)->get();
                        
                        $sty = '';
                        if(!empty($cart_experiences1)){
                             $user_data = 


DB::connection('mysql_veenus')->table("users")->where('id', $cart_experiences1->created_by)->first();
                            $cls = 'cancelDate';
                            $sty = 'display:none';
                            $collabratorName =  'Booked By: '. $user_data->name;
                        }elseif(!empty($cart_experiences)){
                             $user_data1 = 


DB::connection('mysql_veenus')->table("users")->where('id', $cart_experiences->created_by)->first();
                            $cls = 'pastDate';
                            $collabratorName =  'Booked By: '. $user_data1->name;
                            $sty = 'display:none';
                        }/*elseif(!empty($cart_experiencesUnbookedDate)){
                            $cls = 'unbookedDate';
                            $collabratorName =  'Not Booked' ;
                        }*/ else{ 
                            $cart_exp = 


DB::connection('mysql_veenus')->table('cart_experiences')->where('dates_rates_id', $k)->where('experiences_id', $data['exp_id'])->where('date_from', date('Y-m-d',$_dateMin))->where('date_to', date('Y-m-d',$_dateMax))->first();
                            if(!empty($cart_exp))
                            { 
                                 $user_data = 


DB::connection('mysql_veenus')->table("users")->where('id', $cart_exp->created_by)->first();
                                     $collabratorName =  'Booked By: '. $user_data->name;
                                $cls = 'activeDate';
                               
                            }
                            else
                            {
                                 $cls = 'unbookedDate';
                                 $sty = 'display:none';
                                $collabratorName =  'Not Booked' ;
                            }
                          
                            
                        }   
                        
                        //pr($cart_experiencesUnbookedDate123);
                        
                        /*if(!empty($cart_experiencesUnbookedDate123 ) && isset($cart_experiencesUnbookedDate123 )  ){
                         foreach ($cart_experiencesUnbookedDate123  as $valNew) {
                            
                        $newHtml .= '<div class="tour_date " style="box-shadow:none;border:0;padding:0;margin-bottom:10px;">
                                <div class="date" style="font-weight:400;margin-left:0;"><b>'.$valNew->date_from .' - '.$valNew->date_to .'</div></div>';
                        }
                        }*/
                        
                        $html .= '<div class="Collabrator-name '.$cls.'" style="border: 1px solid #ddd;padding: 15px 15px 5px;box-shadow: 0px 3px 6px #00000029;margin-bottom: 15px;'.$sty.'">'. $collabratorName .'</div>';
                        
                        $html .= '<div class="tour_dates '.$cls.'" style="border: 1px solid #ddd;padding: 15px 15px 5px;box-shadow: 0px 3px 6px #00000029;margin-bottom: 15px;'.$sty.'">';
                        $diff = $_dateMax - $_dateMin; 
                        $nights = round($diff / 86400);
                        
                        // $html .= '<b>'.date('d M Y', $_dateMin).' - '.date('d M Y', $_dateMax).' ('.$nights.' nights)</b>';
                        $html .= '<div class="tour_date " style="box-shadow:none;border:0;padding:0;margin-bottom:10px;">
                                <div class="date" style="font-weight:400;margin-left:0;"><b>'.date('d M Y', $_dateMin).' - '.date('d M Y', $_dateMax).' ('.$nights.' nights)</b><br>'.$text.'</div>
                                    <div class="documents">
                                        <div class="document" style="height: auto;border: 0;padding: 0;font-size: 12px;font-weight: bold;">
                                            Hotel confs
                                        </div>
                                        <div class="document" style="height: auto;border: 0;padding: 0;font-size: 12px;font-weight: bold;">
                                            Exp tour confs
                                        </div>
                                        <div class="document" style="height: auto;border: 0;padding: 0;font-size: 12px;font-weight: bold;">
                                            Exp confs
                                        </div>
                                        <div class="document" style="height: auto;border: 0;padding: 0;font-size: 12px;font-weight: bold;">
                                            Tour pcks
                                        </div>
                                        <div class="document" style="height: auto;border: 0;padding: 0;font-size: 12px;font-weight: bold;">
                                            Hotel tour pcks
                                        </div>
                                    </div>
                                </div>';
                        $dates_rates = App\Models\Cms\ExperienceDatesRates::where('id' ,$k)->get()->first();
                        $addcls = '';
                        if(!empty($dates_rates['mark_as_completed_etc']) ){
                        if($dates_rates['mark_as_completed_etc'] == 1){
                            $addcls = 'checked';
                        }
                        }
                        $addcls2 = '';
                        if(!empty($dates_rates['mark_as_completed_tp']) ){
                        if($dates_rates['mark_as_completed_tp'] == 1){
                            $addcls2 = 'checked';
                        }
                        }
                        $addcls3 = '';
                        // if($dates_rates['mark_as_completed_etc'] == 1 && $dates_rates['mark_as_completed_tp'] == 1){
                        //     $addcls3 = 'checked';
                        // }
                        $i = 0;
                        foreach ($val['date'] as $key => $value) {
                            $hotel = '';
                            if(!empty($experience->еxperiencesToHotelsToExperienceDates)){
                                foreach ($experience->еxperiencesToHotelsToExperienceDates as $key2 => $value2) {
                                    if(isset($value2->experienceDate->id) && $value2->experienceDate->id == $value['id']){
                                        $hotel = $value2->hotel;
                                    }
                                }
                            }
                            $addcls4 = '';
                            if($value['mark_as_completed'] == 1){
                                $addcls4 = 'checked';
                            }
                            $html .= '<div class="tour_date '.$addcls3.'" style="box-shadow:none;border:0;padding:0;margin-bottom:10px;">
                                <div class="date" style="font-weight:400;margin-left:0;"><b>Hotel:</b> '.(!empty($hotel) ? $hotel->name : '').'<br>'.convert2DMYForHotelDates($value['date_from']).' - '.convert2DMYForHotelDates($value['date_to']).' ('.$value['nights'].' nights)';
                            $html .= '</div>
                                    <div class="documents">
                                        <div class="document hcDateClick '.$addcls4.'" data-id="'.$value['id'].'" data-exid="'.$data['exp_id'].'">
                                            <div class="tick"></div>
                                            <div class="icon">
                                                <i class="fas fa-file-pdf"></i>
                                            </div>
                                            <div class="label">HC</div>
                                        </div>';
                                if($i == 0){
                                $html .= '<div class="document expDateClick '.$addcls.'" data-id="'.$value['dates_rates_id'].'" data-exid="'.$data['exp_id'].'">
                                            <div class="tick"></div>
                                            <div class="icon">
                                                <i class="fas fa-file-pdf"></i>
                                            </div>
                                            <div class="label">ETC</div>
                                        </div>
                                        <div class="document">
                                            <div class="icon">
                                                <i class="fas fa-file-pdf"></i>
                                            </div>
                                            <div class="label">EC</div>
                                        </div>
                                        <div class="document tpDateClick '.$addcls2.'" data-id="'.$value['dates_rates_id'].'" data-exid="'.$data['exp_id'].'">
                                            <div class="tick"></div>
                                            <div class="icon">
                                                <i class="fas fa-file-pdf"></i>
                                            </div>
                                            <div class="label">TP</div>
                                        </div>';
                                    }else{
                                        $html .= '<div class="document" style="border:0;"></div>
                                                    <div class="document" style="border:0;"></div>
                                                    <div class="document" style="border:0;"></div>';
                                    }
                                $html .= '<div class="document">
                                            <div class="icon">
                                                <i class="fas fa-file-pdf"></i>
                                            </div>
                                            <div class="label">TPH</div>
                                        </div>
                                    </div>
                                </div>';
                            $i++;
                        }        
                        $html .= '</div>';
                    }
                /*$html .= '<ul>';
                foreach ($ExperienceDate as $key => $value) {
                    $html .= '<li style="padding:10px 20px;margin-bottom: 10px;box-shadow: 0px 0px 7px 0px #ddd;border: 1px solid #ddd;display:inline-block;width:100%;">'.convert2DMYForHotelDates($value['date_from']).' - '.convert2DMYForHotelDates($value['date_to']).' ('.$value['nights'].' nights)';
                        $html .= '<div style="float: right;">';
                        $html .= '<a href="javascript:;" style="display: inline-grid;padding: 10px 15px 5px;color: #000;font-weight: bold;text-align: center;border: 1px solid #ddd;font-size: 14px;margin-right: 10px;"><i class="fas fa-file-pdf fa-2x" style="color: #ddd;"></i><span>HC</span></a>';
                            $addcls = '';
                            if($value['mark_as_completed'] == 1){
                                $addcls = 'markCompleted';
                            }
                            $addcls2 = '';
                            if($value['mark_as_completed_tp'] == 1){
                                $addcls2 = 'markCompleted';
                            }
                        $html .= '<a data-id="'.$value['id'].'" data-exid="'.$data['exp_id'].'" class="expDateClick '.$addcls.'" href="javascript:;" style="display: inline-grid;padding: 10px 15px 5px;color: #000;font-weight: bold;text-align: center;border: 1px solid #ddd;font-size: 14px;margin-right: 10px;"><i class="fas fa-file-pdf fa-2x" style="color: #FCA311;"></i><span>ETC</span></a>';
                        $html .= '<a href="javascript:;" style="display: inline-grid;padding: 10px 15px 5px;color: #000;font-weight: bold;text-align: center;border: 1px solid #ddd;font-size: 14px;margin-right: 10px;"><i class="fas fa-file-pdf fa-2x" style="color: #ddd;"></i><span>EC</span></a>';
                        $html .= '<a href="javascript:;" data-id="'.$value['id'].'" data-exid="'.$data['exp_id'].'" class="tpDateClick '.$addcls2.'" style="display: inline-grid;padding: 10px 15px 5px;color: #000;font-weight: bold;text-align: center;border: 1px solid #ddd;font-size: 14px;margin-right: 10px;"><i class="fas fa-file-pdf fa-2x" style="color: #FCA311;"></i><span>TP</span></a>';
                        $html .= '<a href="javascript:;" style="display: inline-grid;padding: 10px 15px 5px;color: #000;font-weight: bold;text-align: center;border: 1px solid #ddd;font-size: 14px;margin-right: 10px;"><i class="fas fa-file-pdf fa-2x" style="color: #ddd;"></i><span>TPH</span></a>';
                        $html .= '</div>';
                    $html .= '</li>';
                }
                $html .= '</ul>';*/
            }else{
                $html = '<p style="color: red;font-size: 18px;">Please enter Dates and Rates for this tour to create the Documents.</p>';
            }
        }
        
 ?>

 <!--  <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 1100px;">
    <div class="modal-content">
      <div class="modal-body"> -->
        <div class="tour_documents_edit_popup" >
            <div class="popup_content">
                <div class="heading" style="margin-bottom: 15px;">
                    Edit tour documents
                </div>
                <h5 style="margin-bottom: 30px;">Here you can edit any documents that will be used for the bookings.</h5>
                <select class="form-control" id="checkBookings">
                    <option value="1">Active Bookings</option>
                    <option value="2">Past Bookings</option>
                    <option value="3">Dates To Sell</option>
                    <option value="4">Unbooked dates</option>
                </select>
                <div class="tour_dates_header" style="padding: 10px 0px;font-weight: bold;color: #000;">
                    Tour Dates
                </div>
                <div id="appendHtml">
                    <?php echo $html;?>
                </div>
            </div>
        </div>
      <<!-- /div>
    </div>
  </div> -->
<div class="modal fade bd-example-modal-lg" id="hcModal" tabindex="-1" role="dialog" aria-labelledby="addFolderModalTitle" aria-hidden="true" style="overflow-y: auto;">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 1500px;">
        <div class="modal-content hcModalAppendCls">

        </div>
    </div>
</div>
<div class="modal fade bd-example-modal-lg" id="etcModal" tabindex="-1" role="dialog" aria-labelledby="addFolderModalTitle" aria-hidden="true" style="overflow-y: auto;">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 1500px;">
        <div class="modal-content etcModalAppendCls">

        </div>
    </div>
</div>

<script src="{{ asset('js/popper.min.js') }}"></script> 
<script src="{{ asset('js/bootstrap.min.js') }}"></script> 
<script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script> 
<script src="https://dev.rlogical.com/epic/resources/js/moment.min.js"></script>
<script src="{{ asset('js/jquery.mask.min.js') }}"></script>
<script src="{{ asset('js/pages/stocklist-hotel.js') }}"></script>
<script type="text/javascript">
      //open edit document
     $(document).on('change', '#checkBookings', function() {
        
        var id = $(this).val();
        if(id == 1){
            $('.pastDate').hide();
            $('.unbookedDate').hide();
            $('.saleDates').hide();
            $('.activeDate').show();
        }else if(id == 2){
            $('.pastDate').show();
            $('.activeDate').hide();
            $('.saleDates').hide();
            $('.unbookedDate').hide();
        }else if(id == 3){
            $('.unbookedDate').hide();
            $('.pastDate').hide();
            $('.saleDates').show();
            $('.activeDate').hide();
        }else if(id == 4){
            $('.unbookedDate').show();
            $('.pastDate').hide();
            $('.activeDate').hide();
            $('.saleDates').hide();
        }
    });
    $(document).on('click', '.expDateClick', function() {
        var exp_date_id = $(this).attr('data-id');
        var exp_id = $(this).attr('data-exid');
        $('.loader').show();    
        $.ajax({
            url: base_url+'/super-user/edit-etc',
            type: 'POST',
            data: {'exp_id':exp_id,'exp_date_id':exp_date_id},
            success: function(data) {
                $('.etcModalAppendCls').html(data.response);
                $('.loader').hide();  
                $('#editDocModal').modal('hide');
                $('#etcModal').modal('show');
            },
            error: function(e) {
            }
        });   
    });
 $(document).on('click', '.hcDateClick', function() {
        var exp_date_id = $(this).attr('data-id');
        var exp_id = $(this).attr('data-exid');
        $('.loader').show();    
        $.ajax({
            url: base_url+'/super-user/edit-hc',
            type: 'POST',
            data: {'exp_id':exp_id,'exp_date_id':exp_date_id},
            success: function(data) {
                $('.hcModalAppendCls').html(data.response);
                $('.loader').hide();  
                $('#editDocModal').modal('hide');
                $('#hcModal').modal('show');
            },
            error: function(e) {
            }
        });   
    });
 $(document).on('click', '#markAsCompleted', function() {
        var exp_date_id = $(this).attr('data-id');
        var sign_name = $('#sign_name').val();
        if(sign_name != ''){
            $('.loader').show();    
            $.ajax({
                url: base_url+'/super-user/mark-as-completed-etc',
                type: 'POST',
                data: {'exp_date_id':exp_date_id,'sign_name_etc':sign_name},
                success: function(data) {
                    $('.loader').hide();  
                    $('#saveEtcForm').click();  
                    location.reload();

                    // $('#etcModal').modal('hide');
                    // toastSuccess('Tour has been updated successfully.');
                },
                error: function(e) {
                }
            });   
        }else{
            toastError('Please select signature dropdown.');
        }
    });
    $(document).on('click', '#markAsCompletedTP', function() {
        var exp_date_id = $(this).attr('data-id');
        $('.loader').show();    
        $.ajax({
            url: base_url+'/super-user/mark-as-completed-tp',
            type: 'POST',
            data: {'exp_date_id':exp_date_id},
            success: function(data) {
                $('.loader').hide();  
                $('#saveTpForm').click();
                location.reload();

                // $('#tpModal').modal('hide');
                // toastSuccess('Tour has been updated successfully.');
            },
            error: function(e) {
            }
        });   
    });
    $(document).on('click', '#markAsCompletedHC', function() {
        var exp_date_id = $(this).attr('data-id');
        var sign_name_hc = $('#sign_name_hc').val();
        if(sign_name_hc != ''){
            $('.loader').show();    
            $.ajax({
                url: base_url+'/super-user/mark-as-completed-hc',
                type: 'POST',
                data: {'exp_date_id':exp_date_id,'sign_name_hc':sign_name_hc},
                success: function(data) {
                    $('.loader').hide();  
                    $('#saveHcForm').click();
                    location.reload();

                    // $('#hcModal').modal('hide');
                    // toastSuccess('Tour has been updated successfully.');
                },
                error: function(e) {
                }
            });
        }else{
            toastError('Please select signature dropdown.');
        }   
    });
    $(document).on('click', '#unmarkAsCompleted', function() {
        var exp_date_id = $(this).attr('data-id');
        $('.loader').show();    
        $.ajax({
            url: base_url+'/super-user/unmark-as-completed-etc',
            type: 'POST',
            data: {'exp_date_id':exp_date_id},
            success: function(data) {
                $('.loader').hide();  
                $('#etcModal').modal('hide');
                toastSuccess('Tour has been updated successfully.');
                location.reload();

            },
            error: function(e) {
            }
        });   
    });
    $(document).on('click', '#unmarkAsCompletedTP', function() {
        var exp_date_id = $(this).attr('data-id');
        $('.loader').show();    
        $.ajax({
            url: base_url+'/super-user/unmark-as-completed-tp',
            type: 'POST',
            data: {'exp_date_id':exp_date_id},
            success: function(data) {
                $('.loader').hide();  
                $('#hcModal').modal('hide');
                toastSuccess('Tour has been updated successfully.');
                location.reload();

            },
            error: function(e) {
            }
        });   
    });
    $(document).on('click', '#unmarkAsCompletedHC', function() {
        var exp_date_id = $(this).attr('data-id');
        $('.loader').show();    
        $.ajax({
            url: base_url+'/super-user/unmark-as-completed-hc',
            type: 'POST',
            data: {'exp_date_id':exp_date_id},
            success: function(data) {
                $('.loader').hide();  
                $('#hcModal').modal('hide');
                toastSuccess('Tour has been updated successfully.');
                location.reload();

            },
            error: function(e) {
            }
        });   
    });
</script>
@endsection