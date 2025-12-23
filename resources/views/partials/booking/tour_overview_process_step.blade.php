<style type="text/css">
    li.active {
        background: #eeeeee !important;
    }
    .notes_tab_content.notestab1 {
    /* float: left; */
    /* width: 1000px; */
    overflow-y: auto;
    max-height: 1000px;
}
.body.selected-delete {
    border-color: orange !important;
}
.notes{
    margin-top:10px; 
}
.download-pdf{
    height: 62px;
    border: 1px solid #ddd;
}
.body.delete-note {
    width: 95%;
    float: left;
}
.download_file{
    width: 5%;  
}
.download_file img{height: 62px;
    border: 1px solid #ddd;}
    .note{    clear: both;
    margin-top: 30px;}
    .success_msg{margin: 0 auto;font-weight: bold;}
    .error_msg{margin: 0 auto;font-weight: bold;}
 div.container {
    float: left;
}   
</style>

@foreach($items as $key => $cartItem)
            @foreach($cartItem->cartExperiences as $item)
            <?php 
           
            if($cart_exp_id == $item->id)
            { $currency_symbol = getCurrency($cart_exp_id);
                $total_pax = get_total_pax($cart_exp_id); 
            /*if($item->completed == 1){
                continue;
            }*/
            if($item->cancel_status == 1){
                continue;
            }
            ?>    
            <?php $date_rate_id = $item->dates_rates_id;
                $hotel_dates = 


DB::connection('mysql_veenus')->table('experience_dates')->selectRaw('experience_dates.id,hotel_dates.free_srs')->join('hotel_dates','hotel_dates.id','=','experience_dates.hotel_date_id')->where('experience_dates.dates_rates_id', $date_rate_id)->first();
               ?>
        <div class=""  id="tourOverviewModal-{{ $item->id }}">
             @if(Session::has('success'))
                <div class="alert alert-success" style="margin: 0 0 20px 0;">
                    {{Session::get('success')}}
                </div>
            @endif
            <div class="tour_summary_container">

                <div class="tabs_wrapper">
                    <ul class="tabs" style="margin-bottom: 0px;">

                        <li class="active" href=".tab1">
                            Superuser
                        </li>

                        <li href=".tab2">
                            Collaborator
                        </li>

                        <li href=".tab3">
                            Hotel
                        </li>

                        <li href=".tab4">
                            Experience
                        </li>

                    </ul>
                </div>
                <?php 
                    $cartExperiencesToRooms = App\Models\Cms\CartExperiencesToRooms::with('cartExperiencesToRoomsRequests')->whereIn('room_request_status',['self','approved'])->where("cart_exp_id", $item->id)->get();
                    $sngtotal = 0;
                    $dbltotal = 0;
                    $twntotal = 0;
                    $trptotal = 0;
                    $qrdtotal = 0;
                    if(!empty($cartExperiencesToRooms)){
                        foreach ($cartExperiencesToRooms as $key => $value) {
                            if($value->room_id == '1' && ($value->deposit == '1' || $value->paid == '1')){
                                $sngtotal++;
                            }else if($value->room_id == '2' && ($value->deposit == '1' || $value->paid == '1')){
                                $dbltotal++;
                            }else if($value->room_id == '3' && ($value->deposit == '1' || $value->paid == '1')){
                                $twntotal++;
                            }else if($value->room_id == '4'){
                                $trptotal++;
                            }else if($value->room_id == '5'){ 
                                $qrdtotal++;
                            }
                        }
                    }
                     /*$cartExperiencesToRoomsRequest = App\Models\Cms\CartExperiencesToRooms::with('cartExperiencesToRoomsRequests')->whereIn('room_request_status',['pending','approved','declined','cancelled'])->where("cart_exp_id", $item->id)->orderBy('date', 'DESC')->get();
                   if(!empty($cartExperiencesToRoomsRequest)){
                        foreach ($cartExperiencesToRoomsRequest as $key => $value) {
                            if($value->room_request_status == 'approved' && ($value->status == '1' || $value->paid == 1 || $value->deposit == 1)){
                                if($value->room_id == '1'){
                                    $sngtotal = $sngtotal+1;
                                }elseif($value->room_id == '2'){
                                    $dbltotal = $dbltotal+1;
                                }elseif($value->room_id == '3'){
                                    $twntotal = $twntotal+1;
                                }
                            }
                        }
                    }*/
                    $rooms_ppl = 0;
                        $rooms_sold = 0;
                        foreach ($cartExperiencesToRooms as $key => $value) {
                            if($value->paid == 1 || $value->deposit == 1){
                                $ple = 1;
                                if($value->room_id == 1)
                                {
                                    $ple = 1;
                                }
                                else if($value->room_id == 2 || $value->room_id == 3)
                                {
                                    $ple = 2;
                                }
                                else if($value->room_id == 4)
                                {
                                    $ple = 3;
                                }
                                else if($value->room_id == 5)
                                {   
                                    $ple = 4;
                                }
                                //$rooms_ppl = $rooms_ppl+$ple;
                                $rooms_sold = $rooms_sold+1;
                                if(!empty($value->names)){
                                    $names = array_filter(explode(',', $value->names));
                                    $rooms_ppl  = $rooms_ppl+count($names);
                                }
                            }
                        }
                        $guest_list_due_date = '';
                    ?>
                    <?php 
                  $hc_sign_date = '';
                         $currency_symbol = getCurrencySymbol($cart_experience->currency);
                        $e_dates = array();
                        $sign_name = 1;
                        if(!empty($experienceDate)){
                            foreach ($experienceDate as $key => $value) {

                                if(!empty($value['dates_rates_id'])){
                                    $e_dates['date_from'][] = strtotime($value['date_from']);
                                    $e_dates['date_to'][] = strtotime($value['date_to']);
                                    !empty($value->hotelAmendement->hotel_sign)?$value->hotelAmendement->hotel_sign:'dsff';
                                    if(empty($value['hotel_amendement']['hotel_sign']))
                                    {
                                        $sign_name = 0;
                                    }
                                }
                            } 
                        }
                        if ( !empty( $e_dates['date_from'] ) ) {
                            $_dateMin = min($e_dates['date_from']);
                        }else{
                            $_dateMin = 0 ;
                        }
                        if ( !empty( $e_dates['date_to'] ) ) {
                             $_dateMax = max($e_dates['date_to']);
                        }else{
                            $_dateMax = 0 ;
                        }
                       
                        $diff = $_dateMax - $_dateMin; 
                        $nights = round($diff / 86400);
                        
                        ?>
                <div class="tab_content tab1">

                    <div class="intro">

                        <div class="heading">
                            {{ $item->experience_name }}
                        </div>

                        <p>
                            <strong><?php echo (!empty($hotels_detail) && (count($hotels_detail) == 1) ? $hotels_detail[0]->name : ''); ?></strong>
                            {{ date("D d M", $_dateMin) }} - {{ date("D d M 'y", $_dateMax) }} ( {{ $nights }} @if($nights > 1) nights @else night @endif )
                        </p>
                         <p>
                             <?php $cart_detail = 


DB::connection('mysql_veenus')->table('carts')->selectRaw('carts.id,users.name')->join('users','carts.user_id','=','users.id')->where('carts.id', $item->carts_id)->first(); ?>
                            <strong>Collaborator :</strong>
                            {{ $cart_detail->name }}</p>
                        <div class="step_process">

                            <div class="steps">
                                @foreach($tourStatuses as $ts)
                                    @if($ts->id < 11)
                                            <div @if($ts->id == optional($item->tourStatuses->last())->id-1 || optional($item->tourStatuses->last())->id == 11) class="step percentage active" @else class="step percentage" @endif>
                                                {{ $ts->percent }}%
                                            </div>
                                    @endif
                                @endforeach
                            
                            </div>
                             @foreach($tourStatuses as $ts)
                                    @if($ts->id < 11)
                                            @if($ts->id == optional($item->tourStatuses->last())->id) 
                                                <div class="slider">
                                                    <div class="completed" style="width: {{ $ts->percent-15 }}%;"></div>
                                                </div>
                                            @endif
                                    @elseif(optional($item->tourStatuses->last())->id == 11)
                                         <div class="slider">
                                            <div class="completed" style="width:100%;"></div>
                                        </div>            
                                    @endif
                                @endforeach

                            <div class="steps">

                                @foreach($tourStatuses as $ts)
                                    @if($ts->id < 11)
                                        <div class="step">
                                            {{ $ts->name }}
                                        </div>
                                    @endif
                                @endforeach
                                    
                            </div>

                        </div>
                    </div>
                    <?php
                    $newarr = [];
                    foreach ($tourStatuses as $keyyy => $valueee) {
                        $aa = '';
                        foreach ($item->tourStatuses as $kyyy => $vlueee) {
                            if($valueee->id == $vlueee->id){
                                $newarr[] = $vlueee;
                                $aa = 'added';
                            }
                        }
                        if(empty($aa)){
                            $newarr[] = $valueee;                                
                        }
                    }
                    ?>

                    <div class="todo_list">
                         @foreach($newarr as $its)
                            @if(!empty($its->pivot))
                                        @if($its->id < 11)
                                        <?php //if($its->id == '1'){ ?>
                                    <?php 
                                    // pr($tourStatuses);
                                    $today = strtotime(date('Y-m-d'));
                                    $enddate = strtotime($item->date_to);
                                    $style = '';
                                    if($today < $enddate && $its->id == 10){
                                        //$style = 'style="pointer-events:none;"';
                                    }
                                    ?>
                                    <div class="todo @if($its->id == '1') _docusignStepCls @elseif($its->id == '5') rais @elseif($its->id == '8') rais @elseif($its->id == '9') rais @else stepItemSquareActive @endif @if($its->pivot->completed == 1) completed @elseif($its->pivot->due_date < Carbon\Carbon::now()) overdue @endif @if($item->tourStatuses->last()->id == $its->id)) active @endif"  data-id="{{ $item->id }}" data-step="{{ $its->id }}" id="reloadInfo{{$item->id}}"  data-urls="{{ route('change-docusign', $item->id) }}" data-tour="{{ route('show-tourpack', $item->id) }}" data-tab="superuser" <?php echo $style; ?>>

                                            <div class="tick"></div>

                                            <div class="intro test">
                                                <span>{{ ucwords($its->name) }}</span>
                                                <span class="due_date">@if($its->pivot->completed == 1) completed at {{ date('d/m/Y', strtotime($its->pivot->completed_at)) }} @else due {{ date('d/m/Y', strtotime($its->pivot->due_date)) }} @endif</span>
                                                <span>@if($its->pivot->completed == 1) COMPLETED @elseif($its->pivot->due_date < Carbon\Carbon::now()) <span style="color:red">OVERDUE</span> @else NOT COMPLETE @endif</span>
                                                <?php
                                                $experience_dates_rates = 


DB::connection('mysql_veenus')->table('experience_dates_rates')->where('id', $item->dates_rates_id)->where('deleted_at', null)->first();
                                               
                                                   if(!empty($experience_dates_rates) && $its->id == 1){ ?>
                                                         <a class="hcDateClick" data-id="{{!empty($hotel_dates->id)?$hotel_dates->id:''}}" data-exid="{{$item->experiences_id}}" style="color: #FCA311;font-size: 15px;" href="javascript:void(0)" >HC</a><?php 
                                                    /*}*/
                                                }
                                                    if(!empty($experience_dates_rates) && $its->id == 5){
                                                         if($currency_symbol == '€')
                                                        {
                                                             $deposit_amt = !empty($experience_dates_rates->deposit_euro)?str_replace(',','',$experience_dates_rates->deposit_euro):0;
                                                              $eparice = $deposit_amt;
                                                              $vat_amt = 0;
                                                            echo '<span style="font-size:10px">'.$currency_symbol.''.$deposit_amt.'(price) + '.$currency_symbol.'0'.'(vat) <br/> '.$currency_symbol.''.($eparice+$vat_amt).'</span>';
                                                        }
                                                        else
                                                        {
                                                             $deposit_amt = !empty($experience_dates_rates->deposit)?str_replace(',','',$experience_dates_rates->deposit):0;
                                                                $vat = !empty($deposit_amt)?round(($deposit_amt*20)/100,2):0;
                                                            $vat_amt = round(($vat/1.2),2);
                                                            $vat_amt = !empty($vat_amt)?$vat_amt:0;

                                                            $eparice = $deposit_amt-$vat_amt;
                                                            echo '<span style="font-size:10px">'.$currency_symbol.''.$eparice.'(price) + '.$currency_symbol.''.$vat_amt.'(vat) <br/> '.$currency_symbol.''.($eparice+$vat_amt).'</span>';
                                                        }
                                                    ?>
                                                   <!--  <a class="cta" href="{{route('edit-deposit-amount', $item->id)}}/?type=deposit" >
                                                         Edit Amount
                                                        </a> -->
                                                    <?php
                                                    /*if(!empty($step4))
                                                    {*/

                                                        if($its->pivot->completed != 1){
                                                        ?>

                                                          <a class="cta" style="color: #FCA311;font-size: 15px;"  data-fancybox data-type="ajax" data-src="" href="/edit-deposit-amount/{{$item->id}}" >
                                                             Edit Amount
                                                            </a><br/>
                                                            <a class="cta total" href="/completed_tour_state?cart_experiences_id={{$item->id}}&tour_statuses_id=5&step5=1"  style="color: #FCA311;font-size: 15px;"> Skip Deposit</a>
                                                         <!-- <a class="cta" style="color: #FCA311;font-size: 15px;" href="{{route('create-invoice', $item->id)}}/?type=deposit&page=overview" >
                                                          <?=!empty($item->xero_deposit_invoice_id)?'Update':'Raise'?> Deposit
                                                        </a> -->
                                                       <?php
                                                        }else{ if(!empty($item->xero_deposit_invoice_id)){?> <a class="cta" style="color: #FCA311;font-size: 15px;" href="{{route('view-invoice', $item->id)}}/?type=deposit" target="_blank">View Deposit</a><?php }else{

                                                        if($its->pivot->is_skip == 1){
                                                           ?>
                                                           <a class="cta total" style="color: #14213D;font-size: 15px;"> Deposit Skipped</a>
                                                           <?php
                                                        }
                                                        } }
                                                    /*}*/
                                                }

                                                if(!empty($experience_dates_rates) && $its->id == 8){
                                                    //echo '<span>{{$currency_symbol}}'.$experience_dates_rates->deposit.'</span>';
                                                    
                                                    /*if(!empty($step4))
                                                    {*/
                                                        if($its->pivot->completed != 1){
                                                            if(!empty($item->xero_invoice_id))
                                                            {
                                                       ?>

                                                        <!-- <a href="{{route('create-invoice', $item->id)}}/?type=invoice">Raise Invoice</a> -->
                                                        <a class="cta total" data-fancybox data-type="ajax" data-src="" href="/total-supplements-charge-invoice/{{$item->id}}"  style="color: #FCA311;font-size: 15px;"> Total charges</a>
                                                        <br/>
                                                         <a class="cta total" href="/completed_tour_state?cart_experiences_id={{$item->id}}&tour_statuses_id=8&step8=1"  style="color: #FCA311;font-size: 15px;"> Skip Invoice</a>
                                                       <?php } else {
                                                        ?>
                                                         <!-- <a class="cta total" data-fancybox data-type="ajax" data-src="" href="/total-invoice-charge/{{$item->id}}"  style="color: #FCA311;font-size: 14px;"> Preview Invoice</a> -->
                                                         <a class="cta total" data-fancybox data-type="ajax" data-src="" href="/total-supplements-charge-invoice/{{$item->id}}"  style="color: #FCA311;font-size: 15px;"> Total charges</a>
                                                         <br/>
                                                          <a class="cta total" href="/completed_tour_state?cart_experiences_id={{$item->id}}&tour_statuses_id=8&step8=1"  style="color: #FCA311;font-size: 15px;"> Skip Invoice</a>
                                                        <?php }
                                                    } else {
                                                    if(!empty($item->xero_invoice_id))
                                                            { ?>
                                                        <a class="cta total" data-fancybox data-type="ajax" data-src="" href="/total-supplements-charge-invoice/{{$item->id}}"  style="color: #FCA311;font-size: 15px;"> Total charges</a>
                                                        <!-- <a href="{{route('view-invoice', $item->id)}}/?type=invoice" target="_blank">View Invoice</a> -->
                                                        <?php
                                                        if($its->pivot->is_skip == 1){
                                                           ?>
                                                           <br/>
                                                           <a class="cta total" style="color: #14213D;font-size: 15px;"> Invoice Skipped</a>
                                                           <?php
                                                        } ?>
                                                    <?php } else{
                                                        ?>
                                                         <a class="cta total" data-fancybox data-type="ajax" data-src="" href="/total-invoice-charge/{{$item->id}}"  style="color: #FCA311;font-size: 15px;"> Total charges</a>
                                                        
                                                        <?php
                                                        if($its->pivot->is_skip == 1){
                                                           ?>
                                                           <br/>
                                                           <a class="cta total" style="color: #14213D;font-size: 15px;"> Invoice Skipped</a>
                                                           <?php
                                                        }
                                                    } }
                                                    /*}*/
                                                }
                                                ?>
                                                 <?php 
                                                 if($its->id == '7') { $guest_list_due_date = date('Y-m-d', strtotime($its->pivot->due_date)); } 

                                                 ?>

                                            </div>
                                            <div class="excerpt">
                                                <p>
                                                     @if($its->id == 1)
                                                       <!--  @if($its->pivot->completed == 1){{ $its->pivot->sign_name }}@else  @endif -->
                                                    <?php /*@elseif($its->id == 2)
                                                        @if($its->pivot->completed == 1){{ $its->pivot->url }}@else  @endif
                                                    @elseif($its->id == 3)
                                                        @if($its->pivot->completed == 1){{ $its->pivot->step3 }}@else  @endif
                                                    @elseif($its->id == 4)
                                                        @if($its->pivot->completed == 1){{ $its->pivot->step4 }}@else  @endif
                                                    @elseif($its->id == 5)
                                                        @if($its->pivot->completed == 1){{ $its->pivot->step5 }}@else  @endif
                                                    @elseif($its->id == 6)
                                                        @if($its->pivot->completed == 1){{ $its->pivot->step6 }}@else  @endif
                                                    @elseif($its->id == 7)
                                                        @if($its->pivot->completed == 1){{ $its->pivot->step7 }}@else  @endif
                                                    @elseif($its->id == 8)
                                                        @if($its->pivot->completed == 1){{ $its->pivot->step8 }}@else  @endif  */?>
                                                    @elseif($its->id == 9)
                                                        @if($its->pivot->completed == 1)
                                                        <!-- <a target="_blank" href="{{-- $its->pivot->step9 --}}"><i class="fas fa-file-pdf fa-2x" style="color: #FCA311;"></i></a> -->

                                                        <a href="javascript:;"  style="width: 59%;float: left;" data-tour="{{ route('show-tds-list', $item->id) }}" data-tab="collaborator" class="cta @if($its->id == '1') docusignStepCls @elseif($its->id == '9') tourPackBox  @endif"><i class="fas fa-file-pdf fa-3x" style="<?=(empty($sign_name)?'color: gray':'color: #FCA311;')?>"></i><br><span style="color: gray;font-weight: bold;">TD</span></a>
                                                        <a href="javascript:;"  style="width: 35%;float: left;" data-tour="{{ route('show-tourpack', $item->id) }}" data-tab="collaborator" class="cta @if($its->id == '1') docusignStepCls @elseif($its->id == '9') <?=(!empty($sign_name)?'tourPackBox':'')?>  @endif"><i class="fas fa-file-pdf fa-3x" style="<?=(!empty($experience_dates_rates->mark_as_completed_tp)?'color: #FCA311;':'color:gray;')?>"></i><br><span style="color: gray;font-weight: bold;">TP</span></a>

                                                        @else 
                                                        <a href="javascript:;"  style="width: 59%;float: left;" data-tour="{{ route('show-tds-list', $item->id) }}" data-tab="collaborator" class="cta @if($its->id == '1') docusignStepCls @elseif($its->id == '9') tourPackBox  @endif"><i class="fas fa-file-pdf fa-3x" style="<?=(empty($sign_name)?'color: gray':'color: #FCA311;')?>"></i><br><span style="color: gray;font-weight: bold;">TD</span></a>
                                                        <a href="javascript:;"  style="width: 35%;float: left;" data-tour="{{ route('show-tourpack', $item->id) }}" data-tab="collaborator" class="cta @if($its->id == '1') docusignStepCls @elseif($its->id == '9') <?=(!empty($sign_name)?'tourPackBox':'')?>  @endif"><i class="fas fa-file-pdf fa-3x" style="<?=(!empty($experience_dates_rates->mark_as_completed_tp)?'color: #FCA311;':'color:gray;')?>"></i><br><span style="color: gray;font-weight: bold;">TP</span></a>
                                                         @endif
                                                    @elseif($its->id == 10)
                                                        @if($its->pivot->completed == 1){{ $its->pivot->step10 }}@else  @endif
                                                    @endif 
                                                </p>
                                            </div>
                                           <?php 
                                            if($its->id == 3 || $its->id == 4 || $its->id == 6){ 
                                            if($its->pivot->completed == 1){
                                                 $d_cnt = (!empty($item->driver_name) && ($item->driver_room_type == '2' || $item->driver_room_type == '3'))?'1':'0';
                                                if(!empty($its->pivot->pax)){?>
                                                <div class="text-center">Pax: <strong>{{$its->pivot->pax+$d_cnt}} <?php echo ($item->driver_name != '' && $item->driver_name1 != '') ? '+ 2 Dr' : (($item->driver_name != '') ? '+ 1 Dr' : ''); ?></strong></div>
                                                 <div class="rooms">
                                                    <strong>{{$its->pivot->sgl_room_total}}</strong> sgl <strong>{{$its->pivot->dbl_room_total}}</strong> dbl <strong>{{$its->pivot->twn_room_total}}</strong> twn
                                                </div>
                                            <?php } else { ?>
                                                <div class="text-center">Pax: <strong>{{$total_pax}} <?php echo ($item->driver_name != '' && $item->driver_name1 != '') ? '+ 2 Dr' : (($item->driver_name != '') ? '+ 1 Dr' : ''); ?></strong></div>
                                                <div class="rooms">
                                                    <strong>{{$sngtotal}}</strong> sgl <strong>{{$dbltotal}}</strong> dbl <strong>{{$twntotal}}</strong> twn
                                                </div>
                                            <?php } } } ?>
                                            <div class="ctas">
                                                <a href="javascript:;"  data-tour="{{ route('show-tourpack', $item->id) }}" data-tab="collaborator" class="cta @if($its->id == '1') docusignStepCls @elseif($its->id == '9') tourPackBox  @endif">view</a>
                                                <!-- <a data-fancybox data-type="ajax" data-src="" href="{{ route('add-amend-doc', $item->id) }}" class="cta btn btn-warning">
                                                    Add Amendments
                                                </a> -->
                                                @if($its->id == 10)
                                                    <a href="javascript:;" data-href="<?=URL('driver-review'.'/'.$item->id)?>" class="cta copyLink">copy link</a>
                                                    <a target="_blank" href="<?=URL('driver-review'.'/'.$item->id)?>" class="cta completeReview">complete review</a>
                                                @elseif($its->id == 9)
                                                   <a href="javascript:;"  data-tour="{{ route('show-tourpack', $item->id) }}" data-tab="collaborator" class="cta @if($its->id == '1') docusignStepCls @elseif($its->id == '9') tourPackBox  @endif">Edit</a>
                                                    <a href="javascript:;" class="cta sendAlert">send alert</a>
                                                @else
                                                    <a href="javascript:;" class="cta @if($its->id == '1') docusignStepCls  @elseif($its->id == '7') editGuestList  @endif" data-tab="superuser"> @if($its->id == '7') Guest List @else edit @endif</a>
                                                    <a href="javascript:;" class="cta sendAlert">send alert</a>
                                                @endif
                                            </div>

                                        </div>

                                <?php //} ?>

                                @endif
                                @else
                                     @if($its->id < 11)
                                        <?php
                                            $today = strtotime(date('Y-m-d'));
                                            $enddate = strtotime($item->date_to);
                                            $style = '';
                                            if($today < $enddate && $its->id == 10){
                                                $style = 'style="pointer-events:none;"';
                                            }
                                        ?>
                                             <div class="todo" <?php echo $style; ?>>

                                                <div class="intro">
                                                    <span>{{ $its->name }}</span>
                                                    <span class="due_date">-</span>
                                                    <span>NOT COMPLETE</span>
                                                    <?php
                                                    $experience_dates_rates = 


DB::connection('mysql_veenus')->table('experience_dates_rates')->where('id', $item->dates_rates_id)->where('deleted_at', null)->first();
                                                    
                                                    if(!empty($experience_dates_rates) && $its->id == 5){
                                                        if($currency_symbol == '€')
                                                        {
                                                             $deposit_amt = !empty($experience_dates_rates->deposit_euro)?str_replace(',','',$experience_dates_rates->deposit_euro):0;
                                                              $eparice = $deposit_amt;
                                                              $vat_amt = 0;
                                                            echo '<span style="font-size:10px">'.$currency_symbol.''.$deposit_amt.'(price) + '.$currency_symbol.'0'.'(vat) <br/> '.$currency_symbol.''.($eparice+$vat_amt).'</span>';
                                                        }
                                                        else
                                                        {
                                                             $deposit_amt = !empty($experience_dates_rates->deposit)?str_replace(',','',$experience_dates_rates->deposit):0;
                                                                $vat = !empty($deposit_amt)?round(($deposit_amt*20)/100,2):0;
                                                            $vat_amt = round(($vat/1.2),2);
                                                            $vat_amt = !empty($vat_amt)?$vat_amt:0;

                                                            $eparice = $deposit_amt-$vat_amt;
                                                            echo '<span style="font-size:10px">'.$currency_symbol.''.$eparice.'(price) + '.$currency_symbol.''.$vat_amt.'(vat) <br/> '.$currency_symbol.''.($eparice+$vat_amt).'</span>';
                                                        }
                                                         ?>
                                        <a class="cta" style="color: #FCA311;font-size: 15px;"  data-fancybox data-type="ajax" data-src="" href="/edit-deposit-amount/{{$item->id}}" >
                                                             Edit Amount
                                                            </a>
                                                           
                                                        <?php
                                                    }
                                                    ?>
                                                </div>

                                                <div class="excerpt">
                                                    <p class="large blue">
                                                      <?php if($its->id == 8){
                                                   
                                                    ?>
                                                      <a class="cta total" data-fancybox data-type="ajax" data-src="" href="/total-invoice-charge/{{$item->id}}"  style="color: #FCA311;font-size: 14px;"> Total charges</a>
                                                    <?php
                                                    
                                                } ?>
                                                    </p>
                                                </div>

                                                <div class="ctas">
                                                    <a href="#" class="cta">edit</a>
                                                    <a href="#" class="cta">send alert</a>
                                                </div>

                                            </div>
                                            

                                        @endif
                                @endif

                            @endforeach

                            
                    </div>
                    <div class="details">

                        <div class="section">

                            <div class="column w_flex">

                                <div class="white_box">

                                    <div class="heading with_cta">
                                        Experiences
                                        
                                        <a class="cta tourOverviewButton" data-fancybox data-type="ajax" data-src="" href="{{ route('change-experience', $item->id) }}" id="_reloadInfo{{$item->id}}">Change</a>
                                    </div>

                                    <div class="box_listings">
                                        
                                        <?php
                                        $cnt = 1;

                                        if(isset($item->cartExperiencesToAttraction))
                                        {
                                         foreach ($item->cartExperiencesToAttraction as $keyEE => $_valueEE) { 

                                             $valueEE = 


DB::connection('mysql_veenus')->table('attractions')->where("id", $_valueEE->attractions_id)->first();
                                             
                                             $addclss = '';
                                             if(!empty($_valueEE->date) || !empty($_valueEE->group_name)){
                                                $addclss = 'completed';
                                             }
                                         ?>
                                            <div class="listing showExep{{$cnt}} bookingdiv{{$valueEE->id}} {{$addclss}}">
                                                <div class="tick"></div>
                                                <div class="sub_heading">
                                                    Experience {{$cnt}} <i class="fas fa-caret-up"></i>
                                                </div>
                                                <div class="name">
                                                    {{ $valueEE->name }}
                                                </div>
                                                <div class="excerpt">
                                                    <p>
                                                        {{ str_limit($valueEE->address, 150) }}
                                                        
                                                    </p>
                                                </div>
                                                <div class="info">

                                                    <div class="info_row">

                                                        <div class="info_column">
                                                            <strong>Contact:</strong> {{ $valueEE->main_contact_number }} - {{ $valueEE->contact_name }}
                                                        </div>

                                                    </div>

                                                    <div class="info_row">

                                                        <div class="info_column">
                                                            <strong>Date:</strong> <span class="bookingDate">{{ 
                                                                (!empty($_valueEE->date) ? date('d M \'y',strtotime($_valueEE->date)) : (!empty($valueEE->date)?date('d M \'y',strtotime($valueEE->date)) :'')) }}</span>
                                                        </div>

                                                        <div class="info_column">
                                                            <strong>Time:</strong> <span class="bookingTime">{{ (!empty($_valueEE->time) ? date('H:i',strtotime($_valueEE->time)) : (!empty($valueEE->time)?date('H:i',strtotime($valueEE->time)) :'00:00')) }}</span> hrs
                                                        </div>
                                                        
                                                    </div>
                                                     <div class="info_row">

                                                        <div class="info_column">
                                                            <strong>Estimated Cost PP:</strong> 
                                                            <?php if($currency_symbol == '€')
                                                            { echo !empty($_valueEE->exp_estimated_cost_pp_euro)?$currency_symbol.$_valueEE->exp_estimated_cost_pp_euro:(!empty($currency_symbol.$valueEE->estimated_cost_pp_euro)?$currency_symbol.$currency_symbol.$valueEE->estimated_cost_pp_euro:'');}
                                                            else{

                                                                echo !empty($_valueEE->exp_estimated_cost_pp)?$currency_symbol.$_valueEE->exp_estimated_cost_pp:(!empty($valueEE->estimated_cost_pp)?$currency_symbol.$valueEE->estimated_cost_pp:'');
                                                            }?>
                                                            
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="row m-1">
                                                    <a class="add_booking" data-fancybox="" data-type="ajax" data-src="" href="<?='/add-bookings/'.$valueEE->id.'/'.$item->id?>">
                                                    <?php 
                                                    if(!empty($_valueEE->date) || !empty($_valueEE->group_name)){
                                                        echo "Edit booking";
                                                    }else{
                                                        echo "Add booking";
                                                    } ?>
                                                    </a><!-- <a class="add_booking"  style="background: red;" href="<?='/remove-experience/'.$_valueEE->id.'/'.$item->id?>" onclick="return confirm('Are you sure you want remove experience?')" >Remove</a> -->

                                                   
                                                </div>
                                            </div>
                                        <?php 
                                            $cnt++;
                                        } } ?>

                                        

                                    </div>

                                </div>

                                <div class="white_box">

                                    <div class="heading with_cta">
                                        Hotels
                                        <a class="cta tourOverviewButton" data-fancybox data-type="ajax" data-src="" href="{{ route('change-hotel', $item->id) }}" id="_reloadInfo{{$item->id}}">Change</a>
                                    </div>
                                    <?php 
                                     $hotel_data = 


DB::connection('mysql_veenus')->table('hotels')->selectRaw('name,address,contact_number,contact_name,phone')->where('name',$item->hotel_name)->first();
                                     if(!empty($hotel_data))
                                     {
                                        $hotel_array =  array($item->hotel_name);
                                     }
                                     else
                                     {
                                        $hotel_array =  explode(',',$item->hotel_name);
                                        
                                        

                                     }
                                   
                                    $i = 1;
                                    $hotel_name = array();
                                    foreach ($hotel_array as $hotel) { 
                                        if(!in_array(trim($hotel),$hotel_name))
                                        {
                                        $hotel_detail = 


DB::connection('mysql_veenus')->table('hotels')->selectRaw('name,address,contact_number,contact_name,phone,street,city,country,postcode')->whereRaw('name like "%'.trim($hotel).'%" ')->first();
                                        $hotel_name =  array();
                                        if(!empty($hotel_detail))
                                        {
                                            $hotel_name[] = $hotel_detail->name;
                                             
                                        ?>
                                        
                                    
                                            <div class="box_listings">

                                                <div class="listing">

                                                    <div class="sub_heading">
                                                        Hotel {{$i++}} <i class="fas fa-caret-up"></i>
                                                    </div>

                                                    <div class="name">
                                                        {{!empty($hotel_detail->name)?$hotel_detail->name:''}}
                                                    </div>

                                                    <div class="info">

                                                        <div class="info_row">

                                                            <div class="info_column">
                                                                <strong>Address: </strong>  <?php
                                                    $address = array();
                                                    if(!empty($hotel_detail->street)){
                                                        $address[] = $hotel_detail->street;
                                                    } 
                                                    if(!empty($hotel_detail->city)){
                                                        $address[] = $hotel_detail->city;
                                                    } 
                                                    if(!empty($hotel_detail->country)){
                                                        $address[] = $hotel_detail->country;
                                                    } 
                                                    if(!empty($hotel_detail->postcode)){
                                                        $address[] = $hotel_detail->postcode;
                                                    } 
                                                    echo implode(', ', $address); ?>
                                                            </div>

                                                        </div>

                                                        <div class="info_row">

                                                            <div class="info_column">
                                                                <strong>Contact: </strong>{{!empty($hotel_detail->phone)?$hotel_detail->phone:''}} - {{!empty($hotel_detail->contact_name)?$hotel_detail->contact_name:''}}
                                                            </div>
                                                            
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>
                                            <?php     
                                        } } } ?>
                                </div>

                            </div>

                            <div class="column w_set_360">

                                <div class="white_box h_100">

                                    <div id="other">

                                        <div class="box">

                                            <div class="sub_heading">
                                                Current nos.
                                            </div>

                                            <div class="current_nos">
                                                {{ $item->num_rooms }}
                                            </div>
                                            <?php $d_cnt = (!empty($item->driver_name) && ($item->driver_room_type == '2' || $item->driver_room_type == '3'))?'1':'0'; ?>
                                            <div class="text-center pax-title"><strong>{{$total_pax}}<?php //echo ($item->driver_name != '' && $item->driver_name1 != '') ? '+ 2 Dr' : (($item->driver_name != '') ? '+ 1 Dr' : ''); ?></strong></div>
                                            <div class="rooms">
                                                <strong>{{$sngtotal}}</strong> sgl <strong>{{$dbltotal}}</strong> dbl <strong>{{$twntotal}}</strong> twn
                                            </div>

                                            <div class="ctas">
                                                <!-- <a class="cta tourOverviewButton" data-fancybox data-type="ajax" data-src="" href="{{ route('change-rooms', $item->id) }}" id="reloadInfo{{$item->id}}">Update Tracking</a> -->
                                                
                                                <?php
                                                //$today = strtotime("today");
                                                $today = date('Y-m-d');
                                                $minusDays = strtotime($guest_list_due_date);
                                                if(!empty($guest_list_due_date) && $today >= $guest_list_due_date){
                                                    ?>
                                                    <!-- <a class="cta tourOverviewButton" onclick="alert('The guest list is locked now and any changes can only be made through requests.');" >Guest List</a> -->
                                                    <a class="cta tourOverviewButton" data-fancybox data-type="ajax" data-src="" href="{{ route('change-rooms', $item->id) }}" id="reloadInfo{{$item->id}}">Guest List</a>
                                                    <?php
                                                }else{
                                                   ?>
                                                  <a class="cta tourOverviewButton" data-fancybox data-type="ajax" data-src="" href="{{ route('change-rooms', $item->id) }}" id="reloadInfo{{$item->id}}">Guest List</a>
                                                   <?php
                                                }
                                                ?> 
                                            </div>

                                        </div>

                                        <div class="box red">

                                            <div class="sub_heading">
                                                Cancellation Deadline
                                            </div>
                                                                            
            <?php
            /*if($item->completed == 1){
                                continue;
                            }*/
            if($item->cancel_status == 1){
                continue;
            }
            // $cancellation_days = array(0); 
            // if(!empty($item->dates_rates_id)){
            //     $experience_dates = 


DB::connection('mysql_veenus')->table('experience_dates')->where('dates_rates_id', $item->dates_rates_id)->where('experiences_id', $item->experiences_id)->where('deleted_at', null)->get()->toArray();
                
            //     if(!empty($experience_dates)){
            //         foreach ($experience_dates as $key => $value) {
            //             $cancellation_days[] = $value->cancellation_days;
            //         }
            //     }
            // }
             $cancellation_days = array(0); 
           
            if(!empty($item->experiences_id)){
                $experience_dates = 


DB::connection('mysql_veenus')->table('experiences')->where('id', $item->experiences_id)->where('deleted_at', null)->get()->toArray();
                
                if(!empty($experience_dates)){
                    foreach ($experience_dates as $key => $value) {
                        $cancellation_days[] = $value->can_deadline;
                    }
                }
            }
            //echo '<pre>' ;  print_r($cancellation_days); echo '</pre>' ;  
            ?>


                                            <div class="cancellation_deadline">
                                            
                                                <?php //echo date('d.m.Y',strtotime('-30 days',strtotime($item->date_from))) . PHP_EOL; ?>  
                                                <?php if(max($cancellation_days) > 0){
                                                        echo date('d/m/Y',strtotime('-'.max($cancellation_days).' days', strtotime($item->date_from)));
                                                        echo '<br/>';
                                                        echo "(" .  max($cancellation_days) ." " . " Days)";
                                                    }else{
                                                        echo '---';
                                                    } ?>
                                            </div>

                                            <div class="ctas">
                                                <a href="javascript:;" class="cta large cancleTour" data-id="{{ $item->id }}" data-url="{{ route('cancle-tour',$item->id) }}" style="background: red;">Cancel Tour</a>
                                            </div>

                                        </div>

                                       <!--  <div class="box">

                                            <div class="sub_heading">
                                                Collaborator selling price
                                            </div>

                                            <div class="text_intro">
                                                Enter the price shown on the collaborator URL link
                                            </div>

                                            <div class="fields">

                                                <div class="field">
                                                    <div class="label">Price</div>
                                                    <input type="text" value="£0.00">
                                                </div>

                                                <div class="field">
                                                    <div class="label">SRS</div>
                                                    <input type="text" value="£0.00">
                                                </div>

                                            </div>

                                            <div class="ctas">
                                                <a href="#" class="cta save">Save</a>
                                            </div>

                                        </div> -->
                                        <div class="box">

                                            <div class="sub_heading">
                                                Actual Selling Price pp
                                            </div>

                                           <!--  <div class="text_intro">
                                                Enter the price shown on the collaborator URL link
                                            </div> -->

                                            <div class="fields">

                                                <div class="field">
                                                    <div class="label">Price({{$currency_symbol}})</div>
                                                    <input type="text" name="selling_price" class="selling_price" value="{{!empty($item->selling_price)?$item->selling_price:''}}" placeholder="{{$currency_symbol}}0.00">
                                                </div>

                                                <div class="field">
                                                    <div class="label">SRS({{$currency_symbol}})</div>
                                                    <input type="text" name="srs_price" class="srs_price" value="{{!empty($item->srs_price)?$item->srs_price:''}}" placeholder="{{$currency_symbol}}0.00">
                                                </div>

                                            </div>

                                            <div class="ctas">
                                                <button type="button" class="btn btn-primary save_selling_price" style="margin: 0 auto;">Save</a>
                                            </div>
                                            <div style="text-align: center;">
                                                <label class="success_msg"></label>
                                            </div>
                                            <div style="text-align: center;">
                                                <label class="error_msg"></label>
                                            </div>
                                            
                                        </div>
                                        <div class="box">

                                            <div class="sub_heading">
                                               Selling Price

                                            </div>

                                           

                                            <div class="fields">
                                                 <div class="field">
                                                    <div class="label"><span class="float-left">Veenus Selling Price :</span><span class="float-right">{{$currency_symbol}}{{!empty($item->selling_price)?$item->selling_price:'0'}}</span></div>
                                                    <input type="hidden" id="venus_price" value="{{!empty($item->selling_price)?$item->selling_price:'0'}}"> 
                                                </div>

                                                <div class="field">
                                                    <div class="label"><span class="float-left">Veenus SRS :</span><span class="float-right">{{$currency_symbol}}{{!empty($hotel_dates->free_srs)?$hotel_dates->free_srs:'0'}}</span></div>
                                                    <input type="hidden" id="venus_srs_price" value="{{!empty($hotel_dates->free_srs)?$hotel_dates->free_srs:'0'}}"> 
                                                </div>
                                                <div class="field">
                                                    <div class="label"><span class="float-left">Collaborator Selling Price({{$currency_symbol}}) :</span><span class="float-right" style="width: 26%;"><input type="text" value="" id="colo_selling_price"></span></div>
                                                </div>
                                                 <div class="field">
                                                    <div class="label"><span class="float-left">Collaborator SRS({{$currency_symbol}}) :</span><span class="float-right" style="width: 26%;"><input type="text" value="" id="colo_srs"></span></div>
                                                </div>
                                               
                                            </div>

                                            <div class="ctas">
                                                <a id="calculate_margin" href="javascript:void(0)" class="cta save">Calculate</a>
                                            </div>
                                             <div class="fields">
                                                 <div class="field">
                                                    <div class="label"><span class="float-left">Margin :</span><span class="float-right selling_margin" id="selling_margin"></span></div> 
                                                </div>

                                                <div class="field">
                                                    <div class="label"><span class="float-left">Margin % :</span><span class="float-right margin_percentage" id="margin_percentage"></span></div>
                                                </div>
                                                <div class="field">
                                                    <div class="label"><span class="float-left">SRS Margin :</span><span class="float-right srs_margin" id="srs_margin"></span></div>
                                                </div>
                                                 <div class="field">
                                                    <div class="label"><span class="float-left">SRS Margin % :</span><span class="float-right srs_margin_percentage" id="srs_margin_percentage"></span></div>
                                                </div>
                                               
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                        
                        <div class="section">

                            <div class="column w_40">

                                <div class="white_box">

                                    <div class="heading">
                                        Costs
                                    </div>

                                    <div class="table">

                                        <div class="row">

                                            <div class="label">
                                                <strong>Date:</strong> {{ date('d/m/Y', strtotime($item->date_from)) }} - {{ date('d/m/Y', strtotime($item->date_to)) }} ({{ $item->nights }} nights)
                                                
                                            </div>

                                            <div class="price">
                                                {{$currency_symbol}}0pp
                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="label">
                                                <strong>Hotel Upgrades:</strong> None
                                            </div>

                                            <div class="price">
                                                {{$currency_symbol}}0pp
                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="label">
                                                <strong>Upscales:</strong> 1881 Distillery & Gin School
                                            </div>

                                            <div class="price">
                                                {{$currency_symbol}}0pp
                                            </div>

                                        </div>

                                        <div class="totals">

                                            <div class="row">

                                                <div class="price">
                                                    Total: {{$currency_symbol}}0pp
                                                </div>

                                            </div>

                                            <div class="row">

                                                <div class="price">
                                                    SRS: {{$currency_symbol}}0pp
                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="column w_60">

                                <div class="white_box h_100">
                                    <div class="heading">
                                                Maps
                                    </div>
                                    <div class="table">
                                        <?php 
                                        // $exp_data = 


DB::connection('mysql_veenus')->table('experiences')->select('id','map_url')->where('id', $item->experiences_id)->first();
                                        ?>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="Category1">MAP URL</label>
                                                        <input type="text" name="map_url" id="map_url" class="form-control valid" value="{{!empty($item->cart_map_url)?$item->cart_map_url:''}}" aria-invalid="false">
                                                        <br/>
                                                        <button data-exp-id="{{$item->id}}" type="button" class="btn btn-primary save_map_url" style="margin: 0 auto;">Save
                                                        </button>
                                                        <div>
                                                            <label style="color: green;font-weight: bold;" class="map_success_msg"></label>
                                                        </div>
                                                        <div>
                                                            <label style="color: red;font-weight: bold;" class="map_error_msg"></label>
                                                        </div>
                                                </div>
                                            </div>
                                            
                                        </div>


                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="section">

                            <div class="column w_100">

                                <div class="white_box">

                                    <div class="heading">
                                        Notes
                                    </div>
                                    <div id="fancybox_add_{{ $item->id }}_1" style="display: none;">

                                          
                                        <form method="POST" enctype="multipart/form-data" id="ajax-file-upload1" class="super_add">
                                            <h3>Add a new note</h3>
                                            @csrf
                                            <!-- <input type="text" maxlength="10" name="initials" id="initials" placeholder="Initials">
                                            <p class="initials_cls" style="color: red;"></p>
                                            <br> -->
                                            <select name="category" id="category" class="form-control mb-2" />
                                                <option value="">Select Category</option>
                                                <option value="1">General Notes</option>
                                                <option value="2">Room Requests</option>
                                                <option value="3">Amendments</option>
                                                <option value="4">Hotels</option>
                                                <option value="5">Experiences</option>
                                            </select>
                                            <p class="category_cls" style="color: red;"></p>
                                            <input type="hidden" name="cart_id" id="cart_id" value="{{ $item->id }}">
                                            <input type="hidden" name="user_type" id="user_type" value="1">
                                            <textarea type="text" class="form-control mb-2" name="notes" id="notes" placeholder="Type here" rows="7"></textarea>
                                            <p class="notes_cls" style="color: red;"></p>                                           
                                            <input type="file" accept=".pdf"  style="max-width: 500px;" multiple name="note_file[]" id="note_file">
                                            <br>
                                            <button type="submit" class="mt-2 btn btn-primary" id="add_notes" style="max-width: 500px;">
                                                Add Note
                                            </button>
                                        </form>
                                    </div>
                                    <!-- <div id="notes_form">

                                        <div class="sub_heading">
                                            Add a new note
                                        </div>
                                        <form method="POST" enctype="multipart/form-data" id="ajax-file-upload">
                                            @csrf
                                            <input type="text" maxlength="10" name="initials" id="initials" placeholder="Initials">
                                            <p class="initials_cls" style="color: red;"></p>
                                            <br>
                                            <select name="category" id="category" class="form-control" />
                                                <option value="">Select Category</option>
                                                <option value="1">General Notes</option>
                                                <option value="2">Room Requests</option>
                                                <option value="3">Amendments</option>
                                                <option value="4">Hotels</option>
                                                <option value="5">Experiences</option>
                                            </select>
                                            <p class="category_cls" style="color: red;"></p>
                                            <input type="hidden" name="cart_id" id="cart_id" value="{{ $item->id }}">
                                            <input type="hidden" name="user_type" id="user_type" value="1">
                                            <textarea type="text" class="form-control" name="notes" id="notes" placeholder="Type here" rows="7"></textarea>
                                            <p class="notes_cls" style="color: red;"></p>                                           
                                            <input type="file" accept=".pdf"  style="max-width: 500px;" name="note_file" id="note_file">
                                            <br>
                                            <button type="submit" id="add_notes" style="max-width: 500px;">
                                                Add
                                            </button>
                                        </form>

                                    </div> -->

                                    <div id="notes">
                                        <div id="exTab3" class="container pb-3"> 
                                            <div id="tab_id_{{ $item->id }}">
                                                
                                            
                                                @include ('partials.booking.tour_notes',[
                                                    'cart_id' => $item->id,'user_type' =>'1'
                                                  ])
                                            </div>
                                          </div>
                                        <!-- <div class="sub_heading">
                                            Tour Notes
                                        </div> -->

                                        

                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <div class="tab_content tab2" style="display:none;">
                    <div class="intro">
                       
                        <div class="heading">
                            {{ $item->experience_name }}
                        </div>

                        <p>
                            
                            <strong><?php echo (!empty($hotels_detail) && (count($hotels_detail) == 1) ? $hotels_detail[0]->name : ''); ?></strong>
                            {{ date("D d M", $_dateMin) }} - {{ date("D d M 'y", $_dateMax) }} ( {{ $nights }} @if($nights > 1) nights @else night @endif )
                        </p>
                        <p>
                            
                            <strong>Collaborator :</strong>
                            {{ $cart_detail->name }}</p>
                        <div class="step_process">

                            <div class="steps">
                                @foreach($tourStatuses as $ts)
                                    @if($ts->id < 11)
                                            <div @if($ts->id == optional($item->tourStatuses->last())->id-1 || optional($item->tourStatuses->last())->id == 11) class="step percentage active" @else class="step percentage" @endif>
                                                {{ $ts->percent }}%
                                            </div>
                                    @endif
                                @endforeach
                            
                            </div>
                             @foreach($tourStatuses as $ts)
                                    @if($ts->id < 11)
                                            @if($ts->id == optional($item->tourStatuses->last())->id) 
                                                <div class="slider">
                                                    <div class="completed" style="width: {{ $ts->percent-15 }}%;"></div>
                                                </div>
                                            @endif
                                     @elseif(optional($item->tourStatuses->last())->id == 11)
                                         <div class="slider">
                                            <div class="completed" style="width:100%;"></div>
                                        </div>       
                                    @endif
                                @endforeach

                            <div class="steps">

                                @foreach($tourStatuses as $ts)
                                    @if($ts->id < 11)
                                        <div class="step">
                                            {{ $ts->name }}
                                        </div>
                                    @endif
                                @endforeach
                                    
                            </div>

                        </div>
                    </div>
                    <?php
                    $newarr = [];
                    foreach ($tourStatuses as $keyyy => $valueee) {
                        $aa = '';
                        foreach ($item->tourStatuses as $kyyy => $vlueee) {
                            if($valueee->id == $vlueee->id){
                                $newarr[] = $vlueee;
                                $aa = 'added';
                            }
                        }
                        if(empty($aa)){
                            $newarr[] = $valueee;                                
                        }
                    }
                    ?>
                    <div class="todo_list">
                         @foreach($newarr as $its)
                            @if(!empty($its->pivot))
                                        @if($its->id < 11)
                                        <?php 
                                    $today = strtotime(date('Y-m-d'));
                                    $enddate = strtotime($item->date_to);
                                    $style = '';
                                    if($today < $enddate && $its->id == 10){
                                        $style = 'style="pointer-events:none;"';
                                    }
                                    ?>
                                        <?php //if($its->id == '1'){ ?>
                                    <div class="todo @if($its->id == '1') _docusignStepCls @elseif($its->id != '5' && $its->id != '8' && $its->id != '9') stepItemSquareActive @endif @if($its->pivot->completed == 1) completed @elseif($its->pivot->due_date < Carbon\Carbon::now()) overdue @endif @if($item->tourStatuses->last()->id == $its->id)) active @endif"  data-id="{{ $item->id }}" data-step="{{ $its->id }}" id="reloadInfo{{$item->id}}"  data-urls="{{ route('change-docusign', $item->id) }}" data-tour="{{ route('show-tourpack', $item->id) }}" data-tab="collaborator" <?php echo $style; ?>>

                                            <div class="tick"></div>

                                            <div class="intro">
                                                <span>{{ ucwords($its->name) }}</span>
                                                <span class="due_date">@if($its->pivot->completed == 1) completed at {{ date('d/m/Y', strtotime($its->pivot->completed_at)) }} @else due {{ date('d/m/Y', strtotime($its->pivot->due_date)) }} @endif</span>
                                                <span>@if($its->pivot->completed == 1) COMPLETED @elseif($its->pivot->due_date < Carbon\Carbon::now()) <span style="color:red">OVERDUE</span> @else NOT COMPLETE @endif</span>
                                            </div>

                                            <div class="excerpt">
                                                <p>
                                                   <!--  @if($its->id == 1)
                                                        @if($its->pivot->completed == 1){{ $its->pivot->sign_name }}@else  @endif
                                                    @elseif($its->id == 2)
                                                        @if($its->pivot->completed == 1)
                                                            @if(!empty($its->pivot->url))
                                                                <a target="_blank" href="{{ $its->pivot->url }}" class="linkUrl">{{ $its->pivot->url }}</a>
                                                            @else  @endif
                                                        @else  @endif
                                                    @elseif($its->id == 3)
                                                        @if($its->pivot->completed == 1){{ $its->pivot->step3 }}@else  @endif
                                                    @elseif($its->id == 4)
                                                        @if($its->pivot->completed == 1){{ $its->pivot->step4 }}@else  @endif
                                                    @elseif($its->id == 5)
                                                        @if($its->pivot->completed == 1){{ $its->pivot->step5 }}@else  @endif
                                                    @elseif($its->id == 6)
                                                        @if($its->pivot->completed == 1){{ $its->pivot->step6 }}@else  @endif
                                                    @elseif($its->id == 7)
                                                        @if($its->pivot->completed == 1){{ $its->pivot->step7 }}@else  @endif
                                                    @elseif($its->id == 8)
                                                        @if($its->pivot->completed == 1){{ $its->pivot->step8 }}@else  @endif
                                                    @elseif($its->id == 9)
                                                        @if($its->pivot->completed == 1)
                                                        <a href="javascript:;"><i class="fas fa-file-pdf fa-2x" style="color: #FCA311;"></i></a>
                                                        @else 
                                                        <a href="javascript:;"><i class="fas fa-file-pdf fa-2x" style="color: #FCA311;"></i></a>
                                                         @endif
                                                    @elseif($its->id == 10)
                                                        @if($its->pivot->completed == 1){{ $its->pivot->step10 }}@else  @endif
                                                    @endif -->
                                                </p>
                                            </div>

                                            <div class="ctas">
                                                @if($its->id != '5' && $its->id != '8')
                                                @if($its->id == '1' && $its->pivot->completed == 1)
                                                    <a href="javascript:;" data-tab="collaborator" class="cta @if($its->id == '1') docusignStepCls @endif">view</a>
                                                @endif
                                                 @if($its->id == '1')
                                                    @if($its->pivot->completed != 1)
                                                     <a href="javascript:;" class="cta docusignStepCls" data-tab="collaborator">sign</a>
                                                    @else
                                                    <a href="#" class="cta">download</a>
                                                    @endif
                                                 @elseif($its->id == 10)
                                                    <a href="javascript:;" data-href="<?=URL('driver-review'.'/'.$item->id)?>" class="cta copyLink">copy link</a>
                                                    <a target="_blank" href="<?=URL('driver-review'.'/'.$item->id)?>" class="cta completeReview">complete review</a>
                                                    <a href="javascript:;" class="cta" data-tab="collaborator">edit</a>
                                                @elseif($its->id != '9')
                                                
                                                    <a href="javascript:;" class="cta @if($its->id == '1') docusignStepCls @elseif($its->id == '3' || $its->id == '4' || $its->id == '6') editTracking @elseif($its->id == '7') editGuestList @endif" data-tab="collaborator">@if($its->id == '7') Guest List @else edit @endif</a>
                                                    @else
                                                    <a href="#" class="cta">download</a>
                                                    @endif
                                                @endif
                                            </div>

                                        </div>

                                <?php //} ?>

                                @endif
                                @else
                                    @if($its->id < 11)
                                    <?php 
                                    $today = strtotime(date('Y-m-d'));
                                    $enddate = strtotime($item->date_to);
                                    $style = '';
                                    if($today < $enddate && $its->id == 10){
                                        $style = 'style="pointer-events:none;"';
                                    }
                                    ?>
                                             <div class="todo" <?php echo $style; ?>>

                                                <div class="intro">
                                                    <span>{{ $its->name }}</span>
                                                    <span class="due_date">-</span>
                                                    <span>NOT COMPLETE</span>
                                                </div>

                                                <div class="excerpt">
                                                    <p class="large blue">
                                                    
                                                    </p>
                                                </div>

                                            </div>
                                            

                                        @endif
                                @endif
                            @endforeach

                    </div>
                    <div class="details">
                        <div class="section">

                            <div class="column w_40">

                                <div class="white_box">

                                    <div class="heading">
                                        Hotel
                                    </div>
                                    <?php 
                                     $hotel_data = 


DB::connection('mysql_veenus')->table('hotels')->selectRaw('name,address,contact_number,contact_name,phone')->where('name',$item->hotel_name)->first();
                                     if(!empty($hotel_data))
                                     {
                                        $hotel_array =  array($item->hotel_name);
                                     }
                                     else
                                     {
                                        $hotel_array =  explode(',',$item->hotel_name);
                                        
                                        

                                     }
                                   
                                    $i = 1;
                                    $hotel_name = array();
                                    foreach ($hotel_array as $hotel) { 
                                        if(!in_array(trim($hotel),$hotel_name))
                                        {
                                        $hotel_detail = 


DB::connection('mysql_veenus')->table('hotels')->selectRaw('name,address,contact_number,contact_name,phone,street,city,country,postcode')->whereRaw('name like "%'.trim($hotel).'%" ')->first();
                                        $hotel_name =  array();
                                        if(!empty($hotel_detail))
                                        {
                                            $hotel_name[] = $hotel_detail->name;

                                        ?>
                                    <div class="text_listings">

                                        <div class="listing">

                                            <div class="sub_heading">
                                                 {{!empty($hotel_detail->name)?$hotel_detail->name:''}}
                                            </div>

                                            <ul class="info">

                                               

                                                <li>
                                                    <strong>Address: </strong> <?php
                                                    $address = array();
                                                    if(!empty($hotel_detail->street)){
                                                        $address[] = $hotel_detail->street;
                                                    } 
                                                    if(!empty($hotel_detail->city)){
                                                        $address[] = $hotel_detail->city;
                                                    } 
                                                    if(!empty($hotel_detail->country)){
                                                        $address[] = $hotel_detail->country;
                                                    } 
                                                    if(!empty($hotel_detail->postcode)){
                                                        $address[] = $hotel_detail->postcode;
                                                    } 
                                                    echo implode(', ', $address); ?>
                                                </li>

                                                <li>
                                                    <strong>Contact: </strong> {{!empty($hotel_detail->phone)?$hotel_detail->phone:''}} - {{!empty($hotel_detail->contact_name)?$hotel_detail->contact_name:''}}
                                                </li>

                                            </ul>

                                        </div>

                                    </div>
                                    <br>
                                    <?php } } }?>
                                </div>

                                <div class="white_box">

                                    <div class="heading">
                                        Experiences
                                    </div>

                                    <div class="text_listings">
                                        <?php
                                        $cnt = 1;
                                        foreach ($item->cartExperiencesToAttraction as $keyEE => $_valueEE) { 
                                             $valueEE = 


DB::connection('mysql_veenus')->table('attractions')->where("id", $_valueEE->attractions_id)->first();
                                         ?>
                                            <div class="listing showExep{{$cnt}} _completed">
                                                <div class="tick"></div>
                                                <div class="sub_heading">
                                                    Experience {{$cnt}}
                                                </div>

                                                <ul class="info">

                                                    <li>
                                                        <strong>{{ $valueEE->name }}</strong>
                                                    </li>

                                                    <li>
                                                        <strong>Address:</strong> {{ $valueEE->address }}
                                                    </li>

                                                    <li>
                                                        <strong>Contact:</strong>  {{ $valueEE->main_contact_number }}
                                                    </li>

                                                </ul>

                                            </div>
                                        <?php 
                                            $cnt++;
                                        } ?>

                                    </div>

                                </div>

                            </div>

                            <div class="column w_60 flex">

                                <div class="section">

                                    <div class="column w_33">

                                        <div id="other" class="flex">

                                            <div class="box green">

                                                <div class="sub_heading">
                                                    Current nos.
                                                </div>

                                                <div class="current_nos">
                                                    {{ $item->num_rooms }}
                                                </div>
                                                
                                                <div class="rooms large">
                                                    <strong>{{$sngtotal}}</strong> sgl <strong>{{$dbltotal}}</strong> dbl <strong>{{$twntotal}}</strong> twn
                                                </div>

                                                <div class="ctas">
                                                    <a class="cta tourOverviewButton" data-fancybox data-type="ajax" data-src="" href="{{ route('change-rooms', $item->id) }}" id="_reloadInfo{{$item->id}}">Guest List</a>
                                                </div>

                                            </div>

                                            <div class="box red">

                                                <div class="sub_heading">
                                                    Cancellations
                                                </div>

                                                <div class="text_intro">
                                                    Cancellation deadline
                                                </div>

                                                <div class="cancellation_deadline ddfd">
                                                   <?php //echo date('d.m.Y',strtotime('-30 days',strtotime($item->date_from))) . PHP_EOL; ?> 
                                                     <?php if(max($cancellation_days) > 0){
                                                        echo date('d/m/Y',strtotime('-'.max($cancellation_days).' days', strtotime($item->date_from)));
                                                        echo '<br/>';
                                                        echo "(" .  max($cancellation_days) . " " ."Days)";
                                                    }else{
                                                        echo '---';
                                                    } ?>
                                                </div>

                                                <div class="ctas">
                                                    <a href="javascript:;" class="cta large cancleTour" data-id="{{ $item->id }}" data-url="{{ route('cancle-tour',$item->id) }}" style="background: red;">Cancel Tour</a>
                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="column w_66">

                                        <div class="white_box">

                                            <div class="heading">
                                                Costs
                                            </div>

                                            <div class="table">

                                                <div class="row">

                                                    <div class="label">
                                                        <strong>Date:</strong> {{ date('d/m/Y', strtotime($item->date_from)) }} - {{ date('d/m/Y', strtotime($item->date_to)) }} ({{ $item->nights }} nights)
                                                    </div>

                                                    <div class="price">
                                                        {{$currency_symbol}}0pp
                                                    </div>

                                                </div>

                                                <div class="row">

                                                    <div class="label">
                                                        <strong>Hotel Upgrades:</strong> None
                                                    </div>

                                                    <div class="price">
                                                        {{$currency_symbol}}0pp
                                                    </div>

                                                </div>

                                                <div class="row">

                                                    <div class="label">
                                                        <strong>Upscales:</strong> 1881 Distillery & Gin School
                                                    </div>

                                                    <div class="price">
                                                        {{$currency_symbol}}0pp
                                                    </div>

                                                </div>

                                                <div class="totals">

                                                    <div class="row">

                                                        <div class="price">
                                                            Total: {{$currency_symbol}}0pp
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="white_box">

                                            <div class="heading">
                                                Cost calculator per person
                                            </div>

                                            <div class="table" id="cost_calculator">

                                                <div class="row">

                                                    <div class="label">
                                                        <strong>Transfer costs:</strong>
                                                    </div>

                                                    <div class="input_wrapper">
                                                        <span>{{$currency_symbol}}</span>
                                                        <input type="text" id="transfer_cost" class="calculate_cost" value="0" />
                                                    </div>

                                                </div>

                                                <div class="row">

                                                    <div class="label">
                                                        <strong>Cost of coach per day:</strong>
                                                    </div>

                                                    <div class="input_wrapper">
                                                        <span>{{$currency_symbol}}</span>
                                                        <input type="text" id="per_day_price" class="calculate_cost" value="0" />
                                                    </div>

                                                </div>

                                                <div class="row">

                                                    <div class="label">
                                                        <strong>Total cost:</strong>
                                                    </div>

                                                    <div class="total_cal_price price">
                                                        {{$currency_symbol}}0pp
                                                    </div>

                                                </div>

                                                <div class="row">

                                                    <div class="label">
                                                        <strong>Input your margin:</strong>
                                                    </div>

                                                    <div class="input_wrapper">
                                                        <input type="text" class="added_margin calculate_cost" value="15" />
                                                        <span>%</span>
                                                    </div>

                                                </div>

                                                <div class="row">

                                                    <div class="label">
                                                        <strong>Total with margin:</strong>
                                                    </div>

                                                    <div class="total_price price large">
                                                        {{$currency_symbol}}0pp
                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div class="section flex_1">

                                    <div class="column w_100">

                                        <div class="white_box h_100"></div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="section">

                            <div class="column w_100">

                                <div class="white_box">

                                    <div class="heading">
                                        Notes
                                    </div>
                                    <div id="fancybox_add_{{ $item->id }}_2" style="display: none;">

                                          
                                        <form method="POST" enctype="multipart/form-data" id="ajax-file-upload2" class="colobrator_add">
                                            <h3>Add a new note</h3>
                                            @csrf
                                            <!-- <input type="text" maxlength="10" name="initials" id="initials" placeholder="Initials">
                                            <p class="initials_cls" style="color: red;"></p>
                                            <br> -->
                                            <select name="category" id="category" class="form-control" />
                                                <option value="">Select Category</option>
                                                <option value="1">General Notes</option>
                                                <option value="2">Room Requests</option>
                                                <option value="3">Amendments</option>
                                                <option value="4">Hotels</option>
                                                <option value="5">Experiences</option>
                                            </select>
                                            <p class="category_cls" style="color: red;"></p>
                                            <input type="hidden" name="cart_id" id="cart_id" value="{{ $item->id }}">
                                            <input type="hidden" name="user_type" id="user_type" value="2">
                                            <textarea type="text" class="form-control" name="notes" id="notes" placeholder="Type here" rows="7"></textarea>
                                            <p class="notes_cls" style="color: red;"></p>                                           
                                            <input type="file" accept=".pdf"  style="max-width: 500px;" multiple name="note_file[]" id="note_file">
                                            <br>
                                            <button type="submit" class="mt-2 btn btn-primary" id="add_notes" style="max-width: 500px;">
                                                Add Note
                                            </button>
                                        </form>
                                    </div>
                                    <!-- <div id="notes_form">

                                        <div class="sub_heading">
                                            Add a new note
                                        </div>
                                       <form method="POST" enctype="multipart/form-data" id="ajax-file-upload">
                                            @csrf
                                            <input type="text" maxlength="10" name="initials" id="initials" placeholder="Initials">
                                            <p class="initials_cls" style="color: red;"></p>
                                            <br>
                                            <select name="category" id="category" class="form-control" />
                                                <option value="">Select Category</option>
                                                <option value="1">General Notes</option>
                                                <option value="2">Room Requests</option>
                                                <option value="3">Amendments</option>
                                                <option value="4">HotelsAmendmentsoption>
                                                <option value="5">Experiences</option>
                                            </select>
                                            <p class="category_cls" style="color: red;"></p>
                                            <input type="hidden" name="cart_id" id="cart_id" value="{{ $item->id }}">
                                            <input type="hidden" name="user_type" id="user_type" value="2">
                                            <textarea type="text" class="form-control" name="notes" id="notes" placeholder="Type here" rows="7"></textarea>
                                            <p class="notes_cls" style="color: red;"></p>                                           
                                            <input type="file" accept=".pdf"  style="max-width: 500px;" name="note_file" id="note_file">
                                            <br>
                                            <button type="submit" id="add_notes" style="max-width: 500px;">
                                                Add
                                            </button>
                                        </form>

                                    </div> -->

                                    <div id="notes">
                                        <div id="exTab3" class="container pb-3"> 
                                            <div id="tab_id_{{ $item->id }}">
                                                
                                            
                                                @include ('partials.booking.tour_notes',[
                                                    'cart_id' => $item->id,'user_type' =>'2'
                                                  ])
                                            </div>
                                          </div>
                                        <!-- <div class="sub_heading">
                                            Tour Notes
                                        </div> -->

                                        

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>
                
                <div class="tab_content tab4" style="display:none;">
                  
                    <div class="intro">
                    
                        <div class="heading">
                                                {{ $item->experience_name }}
                        <span class="headingS">{{ $item->hotel_name }}</span>
                                                 
                         </div>
                        <div>
                            @foreach($item->experiencesToExperiences as $ts)
                                <div class="hotel">
                                   
                                    {{ $ts->name }}

                                
                                </div>
                           @endforeach

                            
                        </div>
                          </div>
                                            
                    </div>
                
                
            </div>
            <script>
                $(".stepItemSquareActive").bind("click", function(event){
                    if(event.target.className != 'cta sendAlert' && event.target.className != 'cta copyLink' && event.target.className != 'cta completeReview' && event.target.className != 'linkUrl' && event.target.className != 'cta  editTracking ' && event.target.className != 'cta  editGuestList '){

                        var cartExperienceId = $(this).data("id");
                        var stepId = $(this).data("step");
                        console.log("here");
                        $.fancybox.open(
                            $("#bookingFormBox-"+cartExperienceId+"step-"+stepId).html() , {
                                closeExisting: true,
                                touch: false
                            }
                        );
                        
                    }

                });
                
            </script>
        </div>
    <?php } ?>
            @endforeach
@endforeach
 <div class="tableWrapper drag">
            
            <script>
                $(".openBooking").bind("click", function(){
                    var cartExperienceId = $(this).data("id");

                    $(".openBooking").removeClass("active");
                    $(this).addClass("active");
                    $(".bookingForm").hide();
                    $("#rightColInfo-"+cartExperienceId).show();

                    // $.fancybox.open($("#bookingFormBox-"+cartExperienceId).html() , {
                    //     closeExisting: true,
                    //     touch: false
                    // });

                });
                /*function myFunction() {
                    // Declare variables
                    var input, filter, ul, li, a, i, txtValue;
                    input = document.getElementById('myInput');
                    filter = input.value.toUpperCase();
                    ul = document.getElementById("myTable");
                    li = ul.getElementsByTagName('tr');

                    // Loop through all list items, and hide those who don't match the search query
                    for (i = 1; i < li.length; i++) {
                        a = li[i].getElementsByTagName("td")[1];
                        txtValue = a.textContent || a.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            li[i].style.display = "";
                        } else {
                            li[i].style.display = "none";
                        }
                    }
                }*/
                function myFunction() {
                    // Declare variables
                    var input, filter, ul, li, a, i, txtValue;
                    input = document.getElementById('myInput');
                    filter = input.value.toUpperCase();
                    ul = document.getElementsByClassName("openBooking");
                    // li = ul.getElementsByTagName('div');

                    // Loop through all list items, and hide those who don't match the search query
                    for (i = 0; i < ul.length; i++) {
                        a = ul[i].getElementsByTagName("div")[4];
                        txtValue = a.textContent || a.innerText;

                        a1 = ul[i].getElementsByTagName("div")[5];
                        txtValue1 = a1.textContent || a1.innerText;

                        a2 = ul[i].getElementsByTagName("div")[6];
                        txtValue2 = a2.textContent || a2.innerText;

                        a3 = ul[i].getElementsByTagName("div")[7];
                        txtValue3 = a3.textContent || a3.innerText;


                        console.log(txtValue.toUpperCase().indexOf(filter));
                        if (txtValue.toUpperCase().indexOf(filter) > -1 || txtValue1.toUpperCase().indexOf(filter) > -1 || txtValue2.toUpperCase().indexOf(filter) > -1 || txtValue3.toUpperCase().indexOf(filter) > -1) {
                            ul[i].style.display = "";
                        } else {
                            ul[i].style.display = "none";
                        }
                    }
                }
            </script>
        </div>
<div style="display: none;">
        @foreach($items as $key => $cartItem)
            @foreach($cartItem->cartExperiences as $item)
                <?php 
                /*if($item->completed == 1){
                    continue;
                }*/
                if($item->cancel_status == 1){
                    continue;
                }
                ?>
                @if($item->tourStatuses->count() > 0)
                    @foreach($item->tourStatuses as $itemStatus)
                    <div class="rightCol" id="bookingFormBox-{{ $item->id }}step-{{ $itemStatus->id }}">
                        <div class="bookingForm fancyboxTourSteps">

                            <?php 
            $cart_experience = App\Models\Cms\CartExperience::with('experiencesToHotelsToExperienceDate')->where("id", $item->id)->get();
            $cartExperiencesToRooms = App\Models\Cms\CartExperiencesToRooms::with('cartExperiencesToRoomsRequests')->whereIn('room_request_status',['self','approved'])->where("cart_exp_id", $item->id)->get();
                                    
            $sgl = 0;
            $dbl = 0;
            $twn = 0;
            $trp = 0;
            $qrd = 0;
            $date_in = '';
            $date_out = '';
            $night = '';
            if(isset($cart_experience[0]->experiencesToHotelsToExperienceDate->HotelDates)){
                $sgl = $cart_experience[0]->experiencesToHotelsToExperienceDate->HotelDates->sgl;
                $dbl = $cart_experience[0]->experiencesToHotelsToExperienceDate->HotelDates->dbl;
                $twn = $cart_experience[0]->experiencesToHotelsToExperienceDate->HotelDates->twn;
                $trp = $cart_experience[0]->experiencesToHotelsToExperienceDate->HotelDates->trp;
                $qrd = $cart_experience[0]->experiencesToHotelsToExperienceDate->HotelDates->qrd;
                $date_in = $cart_experience[0]->experiencesToHotelsToExperienceDate->HotelDates->date_in;
                $date_out = $cart_experience[0]->experiencesToHotelsToExperienceDate->HotelDates->date_out;
                $night = $cart_experience[0]->experiencesToHotelsToExperienceDate->HotelDates->night;
            }
            $sngSCnt = 0;
            $dblSCnt = 0;
            $twnSCnt = 0;
            $trpSCnt = 0;
            $qrdSCnt = 0;

            $sngSCntD = 0;
            $dblSCntD = 0;
            $twnSCntD = 0;
            $trpSCntD = 0;
            $qrdSCntD = 0;

            $sngSCntS = 0;
            $dblSCntS = 0;
            $twnSCntS = 0;
            $trpSCntS = 0;
            $qrdSCntS = 0;

            $sngSCnt1 = 0;
            $dblSCnt1 = 0;
            $twnSCnt1 = 0;
            $trpSCnt1 = 0;
            $qrdSCnt1 = 0;

            foreach ($cartExperiencesToRooms as $key => $value) {
                if($value->room_id == '1' && $value->status == '1'){
                    // $sngSCnt++;
                }else if($value->room_id == '2' && $value->status == '1'){
                    // $dblSCnt++;
                }else if($value->room_id == '3' && $value->status == '1'){
                    // $twnSCnt++;
                }else if($value->room_id == '4' && $value->status == '1'){
                    // $trpSCnt++;
                }else if($value->room_id == '5' && $value->status == '1'){ 
                    // $qrdSCnt++;
                }

                if($value->room_id == '1' && $value->deposit == '1'){
                    $sngSCntD++;
                }else if($value->room_id == '2' && $value->deposit == '1'){
                    $dblSCntD++;
                }else if($value->room_id == '3' && $value->deposit == '1'){
                    $twnSCntD++;
                }else if($value->room_id == '4' && $value->deposit == '1'){
                    $trpSCntD++;
                }else if($value->room_id == '5' && $value->deposit == '1'){ 
                    $qrdSCntD++;
                }

                if($value->room_id == '1' && $value->paid == '1'){
                    $sngSCntS++;
                }else if($value->room_id == '2' && $value->paid == '1'){
                    $dblSCntS++;
                }else if($value->room_id == '3' && $value->paid == '1'){
                    $twnSCntS++;
                }else if($value->room_id == '4' && $value->paid == '1'){
                    $trpSCntS++;
                }else if($value->room_id == '5' && $value->paid == '1'){ 
                    $qrdSCntS++;
                }




                if($value->room_id == '1'){
                    $sngSCnt1++;
                }else if($value->room_id == '2'){
                    $dblSCnt1++;
                }else if($value->room_id == '3'){
                    $twnSCnt1++;
                }else if($value->room_id == '4'){
                    $trpSCnt1++;
                }else if($value->room_id == '5'){ 
                    $qrdSCnt1++;
                }

                
            }
            $sngLastAmt = $sgl;     
            if($sngSCnt1 > $sgl){
                $sngLastAmt = $sngSCnt1;
            }
            $dblLastAmt = $dbl;     
            if($dblSCnt1 > $dbl){
                $dblLastAmt = $dblSCnt1;
            }
            $twnLastAmt = $twn;     
            if($twnSCnt1 > $twn){
                $twnLastAmt = $twnSCnt1;
            }
            $trpLastAmt = $trp;     
            if($trpSCnt1 > $trp){
                $trpLastAmt = $trpSCnt1;
            }
            $qrdLastAmt = $qrd;     
            if($qrdSCnt1 > $qrd){
                $qrdLastAmt = $qrdSCnt1;
            }

            $totalGuest = $sngSCnt + $dblSCnt + $twnSCnt + $trpSCnt + $qrdSCnt ;
            $totalGuestD = $sngSCntD + $dblSCntD + $twnSCntD + $trpSCntD + $qrdSCntD ;
            $totalGuestS = $sngSCntS + $dblSCntS + $twnSCntS + $trpSCntS + $qrdSCntS ;

                                    ?>

                            @if(optional($itemStatus)->id == 11)
                                <span class="headingS">{{ $item->experience_name }}</span>
                                <span class="headingS">{{ $item->hotel_name }}</span>
                                <span class="headingS">{{ date('d/m/Y', strtotime($item->date_from)) }} - {{ date('d/m/Y', strtotime($item->date_to)) }} ({{ $item->nights }} nights)</span>
                            @else
                                <span class="headingS"> Tour Booking Step </span>
                            @endif

                            <span class="headingLL">{{ optional($itemStatus)->name }}</span>
                            <div class="stepsline">
                                <ol>
                                    @foreach($tourStatuses as $ts)
                                        @if($ts->id < 11)
                                        <li @if($ts->id == optional($itemStatus)->id || optional($itemStatus)->id == 11) class="active" @endif>
                                            <span class="up">{{ $ts->percent }}%</span>
                                            <span class="down">{{ $ts->name }}</span>
                                        </li>
                                        @endif
                                    @endforeach
                                </ol>
                            </div>

                            <form method="POST" action="{{ route('process-tour-steps.ajax') }}" class="ajax" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                 <input type="hidden" name="is_skip" id="is_skip" value="">
                                <input type="hidden" name="cart_experiences_id" value="{{ $item->id }}">
                                <input type="hidden" name="tour_statuses_id" value="{{ optional($itemStatus)->id }}">
                                <input type="hidden" name="pivot_id" value="{{ optional($itemStatus)->pivot_id }}">
                                 
                                @if(optional($itemStatus)->id == 1)
                                    <label for="sign_name">Name</label>
                                    <div class="inputRow">
                                        <input type="text" name="sign_name" placeholder="Please Enter a Name">
                                        <button type="submit" data-step="{{ optional($itemStatus)->id }}" class="stepSubmitButton"><i class="fas fa-chevron-right"></i></button>
                                    </div>
                                @elseif(optional($itemStatus)->id == 2)
                                    <label for="url" style="margin: 0;text-transform: unset;">Please enter the product URL posted on your website</label>
                                    <small style="margin-bottom: 20px;display: inline-block;">(The URL posted here will help us see the way the product is advertised)</small>
                                    <div class="inputRow">
                                        <input type="url" name="url" placeholder="Please Enter a URL" value="{{ $itemStatus->pivot->url }}">

                                    </div>
                                    <small style="color: red;display: inline-block;">Enter valid URL including http:// or https:// (for ex: https://google.com)</small>
                                    <button type="submit" data-step="{{ optional($itemStatus)->id }}" class="stepSubmitButton sk_cta"><?php echo (!empty($itemStatus->pivot->url))?'Update URL':'Add URL'; ?></button>
                                    <?php if(empty($itemStatus->pivot->url)){ ?> 
                                     <button type="submit" data-step="{{ optional($itemStatus)->id }}" value="Skip" class="stepSubmitButton sk_cta"><?php echo ($itemStatus->pivot->url)?'Skip':'Skip'; ?></button>
                                     <?php } ?>
                                    <!-- <div class="inputRowView">
                                        <p>Current URL link:</p>
                                        <p>{{ $itemStatus->pivot->url  }}</p>
                                    </div> -->

                                   
                                    <!-- <div class="inputRow skurlinput{{ $item->id }}"  style="<?php echo ($itemStatus->pivot->url)?'display:none;':'display:block;'; ?>">
                                        <input type="text" name="url" placeholder="Please Enter a URL">
                                        <button type="submit" data-step="{{ optional($itemStatus)->id }}" class="stepSubmitButton"><i class="fas fa-chevron-right"></i></button>
                                    </div>
                                   
                                    <div class="inputRowView skurllink{{ $item->id }}" style="<?php echo ($itemStatus->pivot->url)?'display:block;':'display:none;'; ?>">
                                        <p>Current URL link:</p>
                                        <p>{{ $itemStatus->pivot->url  }}</p>
                                        <a href="#" class="stepSubmitButton skShow sk_cta" data-id="{{ $item->id }}"><?php echo ($itemStatus->pivot->url)?'Update URL':'Upload URL'; ?></a>
                                    </div> -->
                                @elseif(optional($itemStatus)->id == 3 || optional($itemStatus)->id == 4 || optional($itemStatus)->id == 6)
                                    <?php
                                    $stepnumber = optional($itemStatus)->id;
                                    ?>
                                    <input type="hidden" name="step{{$stepnumber}}" class="sk_small_text stepTracking{{$stepnumber}}" value="1">
                                    <?php 
                                    $cartExperiencesToRooms = App\Models\Cms\CartExperiencesToRooms::with('cartExperiencesToRoomsRequests')->whereIn('room_request_status',['self','approved'])->where("cart_exp_id", $item->id)->get();
                                    $sngtotal = 0;
                                    $dbltotal = 0;
                                    $twntotal = 0;
                                    $trptotal = 0;
                                    $qrdtotal = 0;
                                    $sngdeposit = 0;
                                    $sngpaid = 0;
                                    $dbldeposit = 0;
                                    $dblpaid = 0;
                                    $twndeposit = 0;
                                    $twnpaid = 0;
                                    $trpdeposit = 0;
                                    $trppaid = 0;
                                    $qrddeposit = 0;
                                    $qrdpaid = 0;
                                    $sngSCnt1 = 0;
                                    $dblSCnt1 = 0;
                                    $twnSCnt1 = 0;
                                    $trpSCnt1 = 0;
                                    $qrdSCnt1 = 0;
                                    if(!empty($cartExperiencesToRooms)){
                                        foreach ($cartExperiencesToRooms as $key => $value) {
                                            if($value->room_id == '1'  && $value->cancellation_request_status == null && ($value->deposit == '1' || $value->paid == '1')){
                                                $sngtotal++;
                                                if($value->deposit == '1')
                                                {
                                                    $sngdeposit++;
                                                }
                                                if($value->paid == '1')
                                                {
                                                    $sngpaid++;
                                                }
                                            }else if($value->room_id == '2'  && $value->cancellation_request_status == null && ($value->deposit == '1' || $value->paid == '1')){
                                                $dbltotal++;
                                                if($value->deposit == '1')
                                                {
                                                    $dbldeposit++;
                                                }
                                                if($value->paid == '1')
                                                {
                                                    $dblpaid++;
                                                }
                                            }else if($value->room_id == '3'  && $value->cancellation_request_status == null && ($value->deposit == '1' || $value->paid == '1')){
                                                $twntotal++;
                                                if($value->deposit == '1')
                                                {
                                                    $twndeposit++;
                                                }
                                                if($value->paid == '1')
                                                {
                                                    $twnpaid++;
                                                }
                                            }else if($value->room_id == '4' && $value->cancellation_request_status == null && ($value->deposit == '1' || $value->paid == '1')){
                                                $trptotal++;
                                                if($value->deposit == '1')
                                                {
                                                    $trpdeposit++;
                                                }
                                                if($value->paid == '1')
                                                {
                                                    $trppaid++;
                                                }
                                            }else if($value->room_id == '5' && $value->cancellation_request_status == null && ($value->deposit == '1' || $value->paid == '1')){ 
                                                $qrdtotal++;
                                                if($value->deposit == '1')
                                                {
                                                    $qrddeposit++;
                                                }
                                                if($value->paid == '1')
                                                {
                                                    $qrdpaid++;
                                                }
                                            }
                                            if($value->room_id == '1' && $value->cancellation_request_status == null){
                                                $sngSCnt1++;
                                            }else if($value->room_id == '2' && $value->cancellation_request_status == null){
                                                $dblSCnt1++;
                                            }else if($value->room_id == '3' && $value->cancellation_request_status == null){
                                                $twnSCnt1++;
                                            }else if($value->room_id == '4' && $value->cancellation_request_status == null){
                                                $trpSCnt1++;
                                            }else if($value->room_id == '5' && $value->cancellation_request_status == null){ 
                                                $qrdSCnt1++;
                                            }
                                        }
                                    }
                                    $sglroom = 0;
                                    $dblroom = 0;
                                    $twnroom = 0;
                                    $trproom = 0;
                                    $qrdroom = 0;

                                    $sngLastAmt = $sngSCnt1;        
                                    if($sngSCnt1 > $sgl){
                                        $sngLastAmt = $sngSCnt1;
                                    }

                                    $dblLastAmt = $dblSCnt1;        
                                    if($dblSCnt1 > $dbl){
                                        $dblLastAmt = $dblSCnt1;
                                    }
                                    $twnLastAmt = $twnSCnt1;        
                                    if($twnSCnt1 > $twn){
                                        $twnLastAmt = $twnSCnt1;
                                    }
                                    $trpLastAmt = $trpSCnt1;        
                                    if($trpSCnt1 > $trp){
                                        $trpLastAmt = $trpSCnt1;
                                    }
                                    $qrdLastAmt = $qrdSCnt1;        
                                    if($qrdSCnt1 > $qrd){
                                        $qrdLastAmt = $qrdSCnt1;
                                    }
                                    /*$cartExperiencesToRoomsRequest = App\Models\Cms\CartExperiencesToRooms::with('cartExperiencesToRoomsRequests')->whereIn('room_request_status',['pending','approved','declined','cancelled'])->where("cart_exp_id", $item->id)->orderBy('date', 'DESC')->get();
                                    if(!empty($cartExperiencesToRoomsRequest)){
                                        foreach ($cartExperiencesToRoomsRequest as $key => $value) {
                                            if($value->room_request_status == 'approved' && ($value->status == '1' || $value->paid == 1 || $value->deposit == 1)){
                                                if($value->room_id == '1'){
                                                    $sngtotal = $sngtotal+1;
                                                }elseif($value->room_id == '2'){
                                                    $dbltotal = $dbltotal+1;
                                                }elseif($value->room_id == '3'){
                                                    $twntotal = $twntotal+1;
                                                }
                                            }
                                        }
                                    }*/
                                    $rooms_ppl = 0;
                                    $rooms_sold = 0;
                                    foreach ($cartExperiencesToRooms as $key => $value) {
                                        if($value->paid == 1 || $value->deposit == 1){
                                             $ple = 1;
                                            if($value->room_id == 1)
                                            {
                                                $ple = 1;
                                            }
                                            else if($value->room_id == 2 || $value->room_id == 3)
                                            {
                                                $ple = 2;
                                            }
                                            else if($value->room_id == 4)
                                            {
                                                $ple = 3;
                                            }
                                            else if($value->room_id == 5)
                                            {   
                                                $ple = 4;
                                            }
                                           // $rooms_ppl = $rooms_ppl+$ple;
                                            $rooms_sold = $rooms_sold+1;
                                            if(!empty($value->names)){
                                                $names = array_filter(explode(',', $value->names));
                                                $rooms_ppl    = $rooms_ppl+count($names);
                                            }
                                        }
                                    }
                                        $d_cnt = (!empty($item->driver_name) && ($item->driver_room_type == '2' || $item->driver_room_type == '3'))?'1':'0';
                                        $s_cnt = ($item->driver_room_type == '1')?'1':'0';

                                    ?>

                                    <!-- <div class="rooms" style="text-align:center;">
                                        <strong>{{$sngtotal}}</strong> sgl <strong>{{$dbltotal}}</strong> dbl <strong>{{$twntotal}}</strong> twn
                                    </div> -->
                                    <div>
                                        <label>Please enter your current tracking figures</label>
                                        @if ($sngLastAmt > 0)
                                        <div class="row room_title" style="font-weight:800;">Single</div>
                                        <div class="row" style="border: 0.5px solid #ccc;padding: 5px;" data-t-toom="{{$sngLastAmt}}" >
                                            <div class="col-md-4 text-center">
                                                <input type="text" value="{{$sngdeposit}}" class="deposit_val" name="deposit_paid_single" id="deposit_paid_single" style="width: 30px;height: 30px;text-align: center;border: 1px solid #eee;font-weight: 700;" >
                                                <p>Deposit paid</p>
                                            </div>
                                            <div class="col-md-4 text-center">
                                                <input type="text" value="{{$sngpaid}}" class="paid_val" name="paid_single" id="paid_single" style="width: 30px;height: 30px;text-align: center;border: 1px solid #eee;font-weight: 700;">
                                                <p>Paid in full</p>
                                            </div>
                                            <div class="col-md-3 text-center">
                                                Total:<br>
                                                <b><span class="total_rm">{{$sngtotal}}</span> of {{$sngLastAmt}} rooms</b>
                                            </div>
                                        </div>
                                        @endif
                                
                                        @if ($dblLastAmt > 0)
                                            <div class="row room_title" style="font-weight:800;">Double</div>
                                            <div class="row" style="border: 0.5px solid #ccc;padding: 5px;" data-t-toom="{{$dblLastAmt}}">
                                                <div class="col-md-4 text-center">
                                                <input type="text" value="{{$dbldeposit}}" class="deposit_val" name="deposit_paid_double" id="deposit_paid_double" style="width: 30px;height: 30px;text-align: center;border: 1px solid #eee;font-weight: 700;" >
                                                <p>Deposit paid</p>
                                            </div>
                                            <div class="col-md-4 text-center">
                                                <input type="text" value="{{$dblpaid}}" class="paid_val" name="paid_double" id="paid_double" style="width: 30px;height: 30px;text-align: center;border: 1px solid #eee;font-weight: 700;">
                                                <p>Paid in full</p>
                                                </div>
                                                <div class="col-md-3 text-center">
                                                    Total:<br>
                                                    <b><span class="total_rm">{{$dbltotal}}</span> of {{$dblLastAmt}} rooms</b>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($twnLastAmt > 0)
                                            <div class="row room_title" style="font-weight:800;">Twin</div>
                                            <div class="row" style="border: 0.5px solid #ccc;padding: 5px;" data-t-toom="{{$twnLastAmt}}">
                                                <div class="col-md-4 text-center">
                                                <input type="text" value="{{$twndeposit}}" class="deposit_val" name="deposit_paid_twin" id="deposit_paid_twin" style="width: 30px;height: 30px;text-align: center;border: 1px solid #eee;font-weight: 700;" >
                                                <p>Deposit paid</p>
                                            </div>
                                            <div class="col-md-4 text-center">
                                                <input type="text" value="{{$twnpaid}}" class="paid_val" name="paid_twin" id="paid_twin" style="width: 30px;height: 30px;text-align: center;border: 1px solid #eee;font-weight: 700;">
                                                <p>Paid in full</p>
                                                </div>
                                                <div class="col-md-3 text-center">
                                                    Total:<br>
                                                    <b><span class="total_rm">{{$twntotal}}</span> of {{$twnLastAmt}} rooms</b>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($trpLastAmt > 0)
                                            <div class="row room_title" style="font-weight:800;">Triple</div>
                                            <div class="row" style="border: 0.5px solid #ccc;padding: 5px;" data-t-toom="{{$trpLastAmt}}">
                                                <div class="col-md-4 text-center">
                                                <input type="text" value="{{$trpdeposit}}" class="deposit_val" name="deposit_paid_triple" id="deposit_paid_triple" style="width: 30px;height: 30px;text-align: center;border: 1px solid #eee;font-weight: 700;" >
                                                <p>Deposit paid</p>
                                            </div>
                                            <div class="col-md-4 text-center">
                                                <input type="text" value="{{$trppaid}}" class="paid_val" name="paid_triple" id="paid_triple" style="width: 30px;height: 30px;text-align: center;border: 1px solid #eee;font-weight: 700;">
                                                <p>Paid in full</p>
                                                </div>
                                                <div class="col-md-3 text-center">
                                                    Total:<br>
                                                    <b><span class="total_rm">{{$trptotal}}</span> of {{$trpLastAmt}} rooms</b>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($qrdLastAmt > 0)
                                            <div class="row room_title" style="font-weight:800;">Quadruple</div>
                                            <div class="row" style="border: 0.5px solid #ccc;padding: 5px;" data-t-toom="{{$qrdLastAmt}}">
                                                <div class="col-md-4 text-center">
                                                    <input type="text" value="{{$qrddeposit}}" class="deposit_val" name="deposit_paid_qurd" id="deposit_paid_qurd" style="width: 30px;height: 30px;text-align: center;border: 1px solid #eee;font-weight: 700;" >
                                                    <p>Deposit paid</p>
                                                </div>
                                                <div class="col-md-4 text-center">
                                                    <input type="text" value="{{$qrdpaid}}" class="paid_val" name="paid_qurd" id="paid_qurd" style="width: 30px;height: 30px;text-align: center;border: 1px solid #eee;font-weight: 700;">
                                                    <p>Paid in full</p>
                                                </div>
                                                <div class="col-md-3 text-center">
                                                    Total:<br>
                                                    <b>{{$qrdtotal}} of {{$qrdLastAmt}} rooms</b>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="row room_title" style="font-weight:800;">Total</div>
                                        <div class="row" style="border: 0.5px solid #ccc;padding: 5px;">
                                            <div class="col-md-4 text-center">
                                               <label class="deposit_paid_total">{{$sngdeposit+$dbldeposit+$twndeposit+$trpdeposit+$qrddeposit}}</label>
                                                <p>Deposit paid</p>
                                            </div>
                                            <div class="col-md-4 text-center">
                                                <label class="paid_total">{{$sngpaid+$dblpaid+$twnpaid+$trppaid+$qrdpaid}}</label>
                                                <p>Paid in full</p>
                                            </div>
                                            <div class="col-md-3 text-center">
                                                Approx:<br>
                                                nr of guests <b><span class="nr_of_guests">{{$sngtotal+($dbltotal*2)+($twntotal*2)+($trptotal*3)+($qrdtotal*4)}}</span></b>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="pax" value="{{$total_pax}}">
                                    <input type="hidden" name="sgl_room_total" value="{{$sngtotal}}">
                                    <input type="hidden" name="dbl_room_total" value="{{$dbltotal}}">
                                    <input type="hidden" name="twn_room_total" value="{{$twntotal}}">
                                    <!-- <button type="submit" data-step="{{ optional($itemStatus)->id }}" class="stepSubmitButtonTracking sk_cta test">Mark as completed</button> -->
                                    <button type="submit" data-step="{{ optional($itemStatus)->id }}" class="stepSubmitButtonTracking sk_cta test" style="width:250px;">Save and update {{ optional($itemStatus)->name }} </button>
                                    <p>Any additional rooms have to be requested,if you want to secure additional rooms, please contact us or request them through the guest list.</p>
                                    <a class="cta tourOverviewButton" data-fancybox data-type="ajax" data-src="" href="{{ route('change-rooms', $item->id) }}" style="font-size:700;color:orange;" id="_reloadInfo{{$item->id}}">Guest List</a>    
                                @elseif(optional($itemStatus)->id == 44)
                                    <label for="step3">Step 4</label>
                                    <div class="inputRow">
                                        <input type="text" name="step4" pattern="^[0-9]*$" placeholder="Please Enter a Step 4" onkeypress="return isNumber(event)">
                                        <button type="submit" data-step="{{ optional($itemStatus)->id }}" class="stepSubmitButton"><i class="fas fa-chevron-right"></i></button>
                                    </div>
                                @elseif(optional($itemStatus)->id == 5)
                                    <label for="step5">Step 5</label>
                                    <div class="_inputRow">
                                        <input type="hidden" name="step5" value="Test 1st Deposit" placeholder="Please Enter a Step 5">
                                        <button type="submit" data-step="{{ optional($itemStatus)->id }}" class="stepSubmitButton btn btn-success">Mark as Completed</button>
                                    </div>
                                @elseif(optional($itemStatus)->id == 66)
                                    <label for="step5">Step 6</label>
                                    <div class="inputRow">
                                        <input type="text" name="step6" pattern="^[0-9]*$" placeholder="Please Enter a Step 6" onkeypress="return isNumber(event)">
                                        <button type="submit" data-step="{{ optional($itemStatus)->id }}" class="stepSubmitButton"><i class="fas fa-chevron-right"></i></button>
                                    </div>
                                @elseif(optional($itemStatus)->id == 7)
                                    <label for="step7">Step 7</label>
                                    <div class="_inputRow">
                                        <input type="hidden" name="step7" value="Completed" placeholder="Please Enter a Step 7">
                                        <button type="submit" data-step="{{ optional($itemStatus)->id }}" class="stepSubmitButton btn btn-success">Mark as Completed</button>
                                    </div>
                                @elseif(optional($itemStatus)->id == 8)
                                    <label for="step8">Step 8</label>
                                    <div class="_inputRow">
                                        <input type="hidden" name="step8" value="Test Invoice paid" placeholder="Please Enter a Step 8">
                                        <button type="submit" data-step="{{ optional($itemStatus)->id }}" class="stepSubmitButton btn btn-success">Mark as Completed</button>
                                    </div>
                                @elseif(optional($itemStatus)->id == 9)
                                    <label for="step9">Step 9</label>
                                    <input type="hidden" name="step9" placeholder="Please Enter a Step 10" value="Completed">
                                   <!--  <input class="fileuplodaed" type="file" name="fileupload" action="{{ route('process-tour-steps.ajax') }}" cart_experiences_id="{{ $item->id }}" tour_statuses_id="{{ optional($itemStatus)->id }}" accept=".pdf, .docx, .doc"> -->
                                    <!-- <div class="inputRow">
                                        <input type="text" name="step9" placeholder="Please Enter a Step 9">
                                        <button type="submit" data-step="{{ optional($itemStatus)->id }}" class="stepSubmitButton"><i class="fas fa-chevron-right"></i></button>
                                    </div> -->
                                    @if($itemStatus->pivot->completed == 0)
                                     <button type="submit" data-step="{{ optional($itemStatus)->id }}" class="stepSubmitButton btn btn-success">Mark as Completed</button>
                                    @else
                                    <a class="btn btn-success" href="<?=URL('unmark-status'.'/'.$item->id)?>">Unmark as Completed</a>
                                       <!--  <button type="submit" data-step="{{ optional($itemStatus)->id }}" class="stepSubmitButton btn btn-success">Unmark as Completed</button> -->
                                    @endif
                                @elseif(optional($itemStatus)->id == 10)
                                    <label for="step10">Step 10</label>
                                    <div class="_inputRow">
                                        <input type="hidden" name="step10" placeholder="Please Enter a Step 10" value="Completed">

                                        <label for="url" style="margin: 0;">Please complete the driver review from below.</label>
                                        <small style="margin-bottom: 20px;display: inline-block;">(Please copy the link and give it to your driver)</small>
                                        <div class="inputRow">
                                            <input readonly type="text" name="driver_review-url" placeholder="Please Enter a URL" value="<?=URL('driver-review'.'/'.$item->id)?>">

                                        </div>
                                        <small style="display: inline-block;">Click on the link to copy it and save it to your clipboard.</small>
                                        <br/>
                                        <label for="url" style="margin: 0;">Guest Reviews</label>
                                        <small style="margin-bottom: 20px;display: inline-block;">(We also gather guest reviews,Please forward this link to any guest that would like to give us their feedback)</small>
                                        <div class="inputRow">
                                            <input readonly type="text" name="driver_review-url" placeholder="Please Enter a URL" value="<?=URL('guest-review'.'/'.$item->id)?>">

                                        </div>
                                        <small style="display: inline-block;">Click on the link to copy it and save it to your clipboard.</small>
                                        <div style="clear: both;"></div>
                                        <button type="submit" data-step="{{ optional($itemStatus)->id }}" class="stepSubmitButton btn btn-success">Mark as Completed</button>
                                    </div>
                                @elseif(optional($itemStatus)->id == 11)

                                @endif

                            </form>

                        </div>
                        <script>

                             $('.skShow').click(function(){

                                $('.skurlinput'+$(this).data('id')).show();
                                $('.skurllink'+$(this).data('id')).hide();
                            })

                             
                            $(".fileuplodaed").change(function(e){
                                var file_data = $(this).prop('files')[0];   
                                var cart_experiences_id = $(this).attr('cart_experiences_id');   
                                var tour_statuses_id = $(this).attr('tour_statuses_id');   
                                var form_data = new FormData();                  
                                form_data.append('file', file_data);
                                form_data.append('cart_experiences_id', cart_experiences_id);
                                form_data.append('tour_statuses_id', tour_statuses_id);
                                $.ajax({
                                    url: $(this).attr('action'),  
                                    cache: false,
                                    contentType: false,
                                    processData: false,
                                    data: form_data,                         
                                    type: 'post',
                                    success: function(php_script_response){
                                        location.reload();
                                    }
                                 });
                            });
                            $(".stepSubmitButton").click(function(e){
                                e.preventDefault();
                                if($(this).val() == 'Skip')
                                {
                                    $('.fancyboxTourSteps #is_skip').val('1');
                                }
                                else
                                {
                                    $('.fancyboxTourSteps #is_skip').val('0');
                                }
                                $(this).html('<i class="fas fa-spinner fa-pulse"></i>');

                                var step = $(this).data('step');
                                if(step != 2){
                                    $(this).prop('disabled', true);
                                }
                                if( step == 5 || step == 8 ){
                                    $(this).prop('disabled', false);
                                    $(this).unbind('click').click();
                                    $(this).prop('disabled', true);
                                    return true;
                                }

                                var value = $(this).siblings('input').val();

                                if(value){
                                    $(this).prop('disabled', false);
                                    $(this).unbind('click').click();
                                    if(step != 2){
                                        $(this).prop('disabled', true);
                                    }
                                    return true;
                                }else{
                                    $(this).parent().css("border", "2px solid red");
                                    $(this).prop('disabled', false);
                                    $(this).html('<i class="fas fa-chevron-right"></i>');
                                    return false;
                                }

                            });



                            $(".stepSubmitButtonTracking").click(function(e){
                                // e.preventDefault();

                                // $(this).prop('disabled', true);
                                $(this).html('<i class="fas fa-spinner fa-pulse"></i>');

                                // var step = $(this).data('step');
                                // if( step == 5 || step == 8 ){
                                //     $(this).prop('disabled', false);
                                //     $(this).unbind('click').click();
                                //     $(this).prop('disabled', true);
                                //     return true;
                                // }

                                // var value = $(".stepTracking"+step).val();
                                // if(value){
                                //     $(this).prop('disabled', false);
                                //     $(this).unbind('click').click();
                                //     $(this).prop('disabled', true);
                                //     return true;
                                // }else{
                                //     $(this).parent().css("border", "2px solid red");
                                //     $(this).prop('disabled', false);
                                //     $(this).html('Update tracking');
                                //     return false;
                                // }

                            });




                            // ck_con ck_dep ck_paid
                        </script>
                    </div>
                    @endforeach
                @endif

            @endforeach
        @endforeach
    </div>
    <div class="modal fade bd-example-modal-lg" id="hcModal" tabindex="-1" role="dialog" aria-labelledby="addFolderModalTitle" aria-hidden="true" style="overflow-y: auto;">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 1500px;">
        <div class="modal-content hcModalAppendCls">

        </div>
    </div>
</div>
<div class="modal fade bd-example-modal-lg" id="hotelDatesModal" tabindex="-1" role="dialog" aria-labelledby="addFolderModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 1000px;">
        <div class="modal-content hotelDatesModalAppendCls">

        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" id="amendmentModal" tabindex="-1" role="dialog" aria-labelledby="addFolderModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 1000px;">
        <div class="modal-content amendmentModalAppendCls">

        </div>
    </div>
</div>
<div class="modal fade bd-example-modal-lg" id="tourpackModal" tabindex="-1" role="dialog" aria-labelledby="addFolderModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 1000px;">
        <div class="modal-content tourpackModalAppendCls">

        </div>
    </div>
</div>
<div style="display: none;">
    <div class="tourOverviewModal" id="cancleTourModel">
        <div class="tourOverviewCont">
            <div class="modalHeading">Cancel Tour</div>
            <div class="tourContent cancleTourAppendCls" style="background: none;padding: 0;">
            </div>
        </div>
    </div>
</div>
<div class="modal fade bd-example-modal-lg" id="downloadBrochureModal" tabindex="-1" role="dialog" aria-labelledby="addFolderModalTitle" aria-hidden="true" style="overflow-y: auto;">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 900px;">
        <div class="modal-content downloadBrochureAppendCls">

        </div>
    </div>
</div>
<div class="modal fade" id="amendmentsModalLong" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width: 60%; margin: 1.75rem auto;">
        <div class="modal-content amend-content" style="padding:20px;">
            
        </div>
    </div>
</div>
<div class="modal fade" id="addNotes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add a new note</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <div id="notes_form">
           <form method="POST" enctype="multipart/form-data" id="ajax-file-upload">
                @csrf
                <!-- <input type="text" maxlength="10" name="initials" id="initials" placeholder="Initials">
                <p class="initials_cls" style="color: red;"></p>
                <br> -->
                <select name="category" id="category" class="form-control mb-2" />
                    <option value="">Select Category</option>
                    <option value="1">General Notes</option>
                    <option value="2">Room Requests</option>
                    <option value="3">Amendments</option>
                    <option value="4">Hotels</option>
                    <option value="5">Experiences</option>
                </select>
                <p class="category_cls" style="color: red;"></p>
                <input type="hidden" name="cart_id" id="cart_id" value="">
                <input type="hidden" name="user_type" id="user_type" value="2">
                <textarea type="text" class="form-control mb-2" name="notes" id="notes" placeholder="Type here" rows="7"></textarea>
                <p class="notes_cls" style="color: red;"></p>                                           
                <input type="file" accept=".pdf"  style="max-width: 500px;" name="note_file" id="note_file">
                <br>
                <button class="btn btn-primary" type="submit" id="add_notes" style="max-width: 500px;">
                    Add
                </button>
            </form>

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="submit" class="btn btn-primary" id="add_notes">Add</button> -->
      </div>
    </div>
  </div>
</div>
        <style type="text/css">
    .sk_small_text{
        height: 35px !important;
        width: 50px !important;
        border: 1px solid #ccc !important;
    }
    .sk_main_track label{
        margin-top: 15px;
        font-size: 12px !important;
    }

    .sk_main_track .inputRow{
        display: block !important;
        padding: 10px;

    }

    .sk_main_track .inputRow span{
        margin-left: 20px;
    }
    .sk_cta{
        display: block;
        width: 180px;
        background: #FCA311;
        /* border: solid 1px #FCA311; */
        border-radius: 5px;
        font-size: 1.125rem;
        font-weight: 700;
        line-height: 1.5;
        text-align: center;
        color: #FFF;
        padding: 10px;
        margin: 25px auto;
    }
</style>
<script>
    function count_total_room(){
        var deposit_paid_single = $('.fancybox-container #deposit_paid_single').val();
        var deposit_paid_double = $('.fancybox-container #deposit_paid_double').val();
        var deposit_paid_twin = $('.fancybox-container #deposit_paid_twin').val();
        var deposit_paid_triple = $('.fancybox-container #deposit_paid_triple').val();
        var deposit_paid_qurd = $('.fancybox-container #deposit_paid_qurd').val();

        var paid_single = $('.fancybox-container #paid_single').val();
        var paid_double = $('.fancybox-container #paid_double').val();
        var paid_twin = $('.fancybox-container #paid_twin').val();
        var paid_triple = $('.fancybox-container #paid_triple').val();
        var paid_qurd = $('.fancybox-container #paid_qurd').val();
        if(deposit_paid_triple == undefined){deposit_paid_triple = 0;}
        if(deposit_paid_qurd == undefined){deposit_paid_qurd = 0;}
        if(paid_triple == undefined){paid_triple = 0;}
        if(paid_qurd == undefined){paid_qurd = 0;}
        var total_deposit = parseInt(deposit_paid_single)+parseInt(deposit_paid_double)+parseInt(deposit_paid_twin)+parseInt(deposit_paid_triple)+parseInt(deposit_paid_qurd);
       
        var total_paid = parseInt(paid_single)+parseInt(paid_double)+parseInt(paid_twin)+parseInt(paid_triple)+parseInt(paid_qurd);
        var total_nr =  parseInt(deposit_paid_single)+parseInt(paid_single)+(parseInt(deposit_paid_double)*2)+(parseInt(paid_double)*2)+(parseInt(deposit_paid_twin)*2)+(parseInt(paid_twin)*2)+(parseInt(deposit_paid_triple)*3)+(parseInt(paid_triple)*3)+(parseInt(deposit_paid_qurd)*4)+(parseInt(paid_qurd)*4);
        $('.deposit_paid_total').html(total_deposit);
        $('.paid_total').html(total_paid);
        $('.nr_of_guests').html(total_nr);
    }
    $("body").on("change", '.deposit_val', function(e) {

        var deposit_val = $(this).val();
        var paid_val = $(this).parent().parent().children().children('.paid_val').val();
        var total = parseInt(deposit_val)+parseInt(paid_val);
        var total_room = $(this).parent().parent().attr('data-t-toom');
        if(total > total_room)
        {
            var rroom = total_room - paid_val;
            $(this).val(rroom);
            $(this).parent().parent().children().children().children('.total_rm').html(total_room);
        }
        else
        {
            $(this).parent().parent().children().children().children('.total_rm').html(total);
            count_total_room();
        }
    });
    $("body").on("change", '.paid_val', function(e) {

        var paid_val = $(this).val();
        var deposit_val = $(this).parent().parent().children().children('.deposit_val').val();
        var total = parseInt(deposit_val)+parseInt(paid_val);
        var total_room = $(this).parent().parent().attr('data-t-toom');
        if(total > total_room)
        {
            var rroom = total_room - deposit_val;
            $(this).val(rroom);
            $(this).parent().parent().children().children().children('.total_rm').html(total_room);
        }
        else
        {
            $(this).parent().parent().children().children().children('.total_rm').html(total);
            count_total_room();
        }
    });
    $("body").on("click", '.copyBtn', function(e) {
    });
$(document).on('click', '#downloadBrochureImage', function(e) {
        e.preventDefault();
        var exp_id = $(this).attr('data-id');
        var cart_exp_id = $(this).attr('data-cart-id');
        var rate_pp_new = $(this).parent().parent().find('#rate_pp_new').val();
         var rate_pp_new = $(this).parent().parent().find('#rate_pp_new').val();
        var srs_pp_new = $(this).parent().parent().find('#srs_pp_new').val();
        var brochure_tel = $(this).parent().parent().find('#brochure_tel').val();
        var brochure_email = $(this).parent().parent().find('#brochure_email').val();
        $('.loader').show();    
        $.ajax({
            url: base_url+'/download-brochure-image',
            type: 'POST',
            data: {'cart_exp_id':cart_exp_id,'exp_id':exp_id, 'rate_pp_new':rate_pp_new, 'srs_pp_new':srs_pp_new, 'brochure_tel':brochure_tel, 'brochure_email':brochure_email},
            success: function(data) {
                
                $('.downloadBrochureAppendCls').html(data.response);
                $('.loader').hide();  
                $('.downloadBrochurePriceContent').modal('hide');
                $('#downloadBrochureModal').modal('show');
            },
            error: function(e) {
            }
        });   
    });

$("body").on("click", '.copyBtn', function(e) {
    var $url = $(this).closest('span').find('.copyURL');
    $url.focus();
    $url.select();
    document.execCommand("copy");
    $(this).text("URL copied!");
});
$("body").on("click", '#signDoc', function(e) {
        
    if ($("#chkTerm").prop('checked') == true) {
        $(this).hide();
        $('#signDiv').show();
        $('#submitDoc').show();
    }else{
        $('#submitDoc').click();
    }
});
$("body").on("change", '.sk_small_text', function(e) {
    var inputRow = $(this).closest('.inputRow');
    var minvalue = $(this).attr('minvalue');
    var value = $(this).val();
    var max = inputRow.find('.ck_dep').attr('max');
    // var ck_con = inputRow.find('.ck_con').val();
    var ck_dep = inputRow.find('.ck_dep').val();
    var ck_paid = inputRow.find('.ck_paid').val();
    var sum = (parseInt(ck_dep)+parseInt(ck_paid));
    if(sum <= max){
        if(value < minvalue){
            $(this).val(minvalue);
            alert('To remove a person from this Tour, please visit the Guest List and remove from this section.');
        }
    }else{
        $(this).val(minvalue);
        // inputRow.find('.ck_paid').val(0);
        alert('You can not exceed the maximum number of Rooms.')
    }
});
$("body").on("click", '.sendAlert', function(e) {
    alert('send alert clicked');
});

$("body").on("click", '.copyLink', function(e) {
    var $temp = $("<input>");
    var $url = $(this).data('href');
    $("body").append($temp);
    $temp.val($url).select();
    document.execCommand("copy");
    $temp.remove();
    $(this).text("Copied!");
});
$("body").on("click", '.editTracking', function(e) {
    $(this).closest(".tab_content").find(".tourOverviewButton").click();
});

$("body").on("click", '.editGuestList', function(e) {
    $(this).closest(".tab_content").find(".tourOverviewButton").click();
});
$("body").on("click", '.tourPackBox', function(e) {
    var urls = $(this).attr('data-tour');
    var datatab = $(this).attr('data-tab');
    parent.jQuery.fancybox.close();
    var hotelId = $(this).val();
    var dataId = $(this).attr('data-id');
    $('.loader').show();    
    $.ajax({
        url: urls,
        type: 'POST',
         // dataType: 'json',
        data: {'hotel_id':hotelId, 'dataId':dataId, 'datatab':datatab},
        success: function(data) {
            $('.loader').hide();    
            $('.tourpackModalAppendCls').html(data.response);
            $('#tourpackModal').modal('show');
            // alert('123');
        },
        error: function(e) {
        }
    });
}).on('click', '.sendAlert', function(e) {
    e.stopPropagation();
});
$("body").on("click", '.docusignStepCls', function(e) {
    // $('.docusignStepLinkCls').trigger('click');
    var urls = $(this).closest('._docusignStepCls').attr('data-urls');
    var datatab = $(this).attr('data-tab');
    parent.jQuery.fancybox.close();
    var hotelId = $(this).closest('._docusignStepCls').val();
    var dataId = $(this).closest('._docusignStepCls').attr('data-id');
    $('.loader').show();    
    $.ajax({
        url: urls,
        type: 'POST',
         // dataType: 'json',
        data: {'hotel_id':hotelId, 'dataId':dataId, 'datatab':datatab},
        success: function(data) {
            $('.loader').hide();    
            $('.hotelDatesModalAppendCls').html(data.response);
            $('#hotelDatesModal').modal({backdrop: 'static', keyboard: false},'show');
            // alert('123');
        },
        error: function(e) {
        }
    });
}).on('click', '.sendAlert', function(e) {
    e.stopPropagation();
});


$("body").on("click", '.showHideExep', function(e) {
    e.preventDefault();
    var dataType = $(this).attr('data-type');
    var dataId = $(this).attr('data-id');
    $(this).closest('.infoBox').hide();
    $('.'+dataType).show();
});

    $(".tourOverviewButton").bind("click", function(){
        var cartExperienceId = $(this).data("id");

        $.fancybox.open(
            //$("#bookingFormBox-"+cartExperienceId).html() , {
            $("#tourOverviewModal-"+cartExperienceId).html() , {
                closeExisting: true,
                touch: false
            }
        );

    });

    $(document).ready(function(){
        <?php
        if(isset($_GET['id']) && !empty($_GET['id'])){
            ?>
            var cartExperienceId1 = <?php echo $_GET['id']; ?>

            $.fancybox.open(
                $("#tourOverviewModal-"+cartExperienceId1).html() , {
                    closeExisting: true,
                    touch: false
                }
            );
            <?php
        }elseif(isset($_GET['cid']) && !empty($_GET['cid'])){
            ?>
            var cartExperienceId2 = <?php echo $_GET['cid']; ?>

            $('a#reloadInfo'+cartExperienceId2).trigger('click');
            <?php
        }
        ?>
        $(".mobMenuBtn").bind("click", function(){

            if($("#menu__toggle2").prop("checked") == true){
                if(updated==0){
                    updated = 1;
                }
                $(".leftCol").addClass("comeFromLeft");
            }else {
                $(".leftCol").removeClass("comeFromLeft");
            }
        });

        $(".filterBtn").bind("click", function(){
            $(".hiddenFilteres").toggleClass('showOpacity hide');
        });

        $(".showFilter").bind("click", function(){

            element = "#activeFilter-"+$(this).data("filter-id");
            element2 = "."+$(this).data("filter-class");
            $(this).addClass("active");
            $(element).show();
            $(element2).show();

        });

        $(".hideFilter").bind("click", function(){

            $(this).hide();
            element = "#availableFilter-"+$(this).data("filter-id");
            element2 = "."+$(this).data("filter-class");
            $(element).removeClass("active");
            $(element2).hide();
        });

    });

    var mx = 0;

    $(".drag").on({
        mousemove: function(e) {
            var mx2 = e.pageX - this.offsetLeft;
            if(mx) this.scrollLeft = this.sx + mx - mx2;
        },
        mousedown: function(e) {
            this.sx = this.scrollLeft;
            mx = e.pageX - this.offsetLeft;
        }
    });

    $(document).on("mouseup", function(){
        mx = 0;
    });

    $("body").on("click","ul.tabs > li", function() {
        var href = $(this).attr("href");
        var ccc = $(this).closest(".tour_summary_container");
        ccc.find(".tab_content").hide();
        ccc.find("ul.tabs li").removeClass('active');
        ccc.find(href).show();
        $(this).addClass('active');
    });
    $("body").on("click","ul.notestabs > li", function() {
        var href = $(this).attr("href");
        var ccc = $(this).closest(".tour_summary_container");
        ccc.find(".notes_tab_content").hide();
        ccc.find("ul.notestabs li").removeClass('active');
        ccc.find(href).show();
        $(this).addClass('active');
    });
    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    }
    $("body").on("click", '.downloadAssets', function(e) {
        var urls = $(this).attr('data-url');
        var attrs = $(this).attr('data-attr');
        $('.loader').show();
        alert('These assets can take up to 15 minutes to download, please return shortly!');        
        $.ajax({
            url: urls,
            type: 'POST',
            success: function(data) {
                $('.loader').hide();
                if(data == 1)
                {
                    window.location.href = base_url+'/download_zip'+attrs+'.zip';
                    $.ajax({
                        url: urls,
                        type: 'POST',
                        success: function(data) {
                            $('.loader').hide();
                            if(data == 1)
                            {
                                alert('again');
                            }
                            else
                            {
                                alert("No images found.");
                            }
                            //window.location.href = base_url+'/printassets.zip';
                             
                            
                        },
                        error: function(e) {
                        }
                    });
                }
                else
                {
                    alert("No images found.");
                }
                //window.location.href = base_url+'/printassets.zip';
                 
                
            },
            error: function(e) {
            }
        });
    });
    $("body").on("click", '.cancleTour', function(e) {

        var dataId = $(this).attr('data-id');
        var url = $(this).attr('data-url');
        $('.loader').show();    
        $.ajax({
            url: url,
            type: 'POST',
             // dataType: 'json',
            data: {'dataId':dataId},
            success: function(data) {
                $('.loader').hide();    
                $('.cancleTourAppendCls').html(data.response);
                $.fancybox.open(
                    $("#cancleTourModel").html() , {
                        closeExisting: true,
                        touch: false
                    }
                );
            },
            error: function(e) {
            }
        });
    });
    $("body").on("click", '#canceltour', function(e) {

        var cancelReason = $(this).closest('.cancleTourAppendCls').find("#cancelReason").val();
       if(cancelReason != '')
       {
        var txtlen = $(this).closest('.cancleTourAppendCls').find("#cancelReason").val().length;
        if(txtlen >= 10)
        {
            $('.cancel_error').text('');
            var url = $(this).attr('data-url');
            $('.loader').show();    
            $.ajax({
                url: url,
                type: 'POST',
                 // dataType: 'json',
                data: {'cancelReason':cancelReason},
                success: function(data) {
                    $('.loader').hide();  
                    //location.reload(); 
                    window.location.href = base_url+'/acc-superuser';
                },
                error: function(e) {
                }
            });
        }
        else
        {
            $('.cancel_error').text('Cancellation reason should contain atleast 10 characters.');
        }
       }
       else
       {
         $('.cancel_error').text('Please enter cancellation reason.');
       }
        
    });
    $("body").on("click", '.stage', function(e) {
        $('.stage').removeClass('active');
        $(this).addClass('active');
        var stage = $(this).data('stage');
        $('#stage').val(stage);
    });
    $("body").on("click", '#stageRemove', function(e) {
        $('#stage').val('');
        $('#submitBtn').click();
    });
    $("body").on("click", '#dateRemove', function(e) {
        $('#date_from').val('');
        $('#date_to').val('');
        $('#submitBtn').click();
    });
    $("body").on("click", '#monthRemove', function(e) {
        $('#month').val('');
        $('#submitBtn').click();
    });
    $("body").on("click", '#tournoRemove', function(e) {
        $('#tour_no').val('no');
        $('#submitBtn').click();
    });
    $("body").on("click", '#hotelRemove', function(e) {
        $('#hotel').val('no');
        $('#submitBtn').click();
    });
    $("body").on("click", '#refnoRemove', function(e) {
        $('#ref_no').val('no');
        $('#submitBtn').click();
    });
    $("body").on("click", '#nextRemove', function(e) {
        $('#next_step').val('no');
        $('#submitBtn').click();
    });
    $("body").on("click", '#nextdueRemove', function(e) {
        $('#next_step_due').val('no');
        $('#submitBtn').click();
    });
    $("body").on("click", '#collRemove', function(e) {
        $('#collaborator').val('no');
        $('#submitBtn').click();
    });
    $("body").on("click", '#expRemove', function(e) {
        $('#experience').val('no');
        $('#submitBtn').click();
    });
    $("body").on("click", '.filters_dropdown > .cta', function(e) {
        $('.dropdown').toggleClass('filterShow');
    });
    $("body").on("click", '.refnoClick', function(e) {
        $(this).toggleClass('active');
        if($(this).hasClass("active")){
            $('#ref_no').val('yes');
        }else{
            $('#ref_no').val('no');
        }
    });
    $("body").on("click", '.hotelnameClick', function(e) {
        $(this).toggleClass('active');
        if($(this).hasClass("active")){
            $('#hotel').val('yes');
        }else{
            $('#hotel').val('no');
        }
    });
    $("body").on("click", '.tournoClick', function(e) {
        $(this).toggleClass('active');
        if($(this).hasClass("active")){
            $('#tour_no').val('yes');
        }else{
            $('#tour_no').val('no');
        }
    });
    $("body").on("click", '.nextstepClick', function(e) {
        $(this).toggleClass('active');
        if($(this).hasClass("active")){
            $('#next_step').val('yes');
        }else{
            $('#next_step').val('no');
        }
    });
    $("body").on("click", '.nextstepdueClick', function(e) {
        $(this).toggleClass('active');
        if($(this).hasClass("active")){
            $('#next_step_due').val('yes');
        }else{
            $('#next_step_due').val('no');
        }
    });
    $("body").on("click", '.collabClick', function(e) {
        $(this).toggleClass('active');
        if($(this).hasClass("active")){
            $('#collaborator').val('yes');
        }else{
            $('#collaborator').val('no');
        }
    });
    $("body").on("click", '.expClick', function(e) {
        $(this).toggleClass('active');
        if($(this).hasClass("active")){
            $('#experience').val('yes');
        }else{
            $('#experience').val('no');
        }
    });
    $("body").on("click", '#saveAddBookingBtn', function(e) {
        var params = $('#addBookingForm').serialize();
        $('.loader').show();
        $.ajax({
            url: $('#addBookingForm').attr('action'),
            type: 'POST',
            dataType: 'JSON',
            data: {'formData':params},
            beforeSend: function() {
            }
        }).done(function(data) {
            $('.loader').hide();
            $('.bookingdiv'+data.id).addClass('completed');
            $('.bookingdiv'+data.id).find('.add_booking').text('Edit booking');
            $('.bookingdiv'+data.id).find('.bookingDate').text(data.date);
            $('.bookingdiv'+data.id).find('.bookingTime').text(data.time);
            parent.jQuery.fancybox.close();
            window.reload();
        });
        return false;
    });
    $("body").on("click", '#downloadAddBookingBtn', function(e) {
        $('#saveAddBookingBtn').trigger('click');
        var path_url = $(this).attr('data-url');
        setTimeout(function () {
                     window.open(path_url, "_blank");
                 }, 2500);
    });
    
    $("body").on("click", '.tab1 #add_notes_popup', function(e) {
        var cartExperienceId = $(this).data("id");
        var user_type = $(this).data("user_type");
        var category = $(this).data("cat");

        //$(".tab1 #fancybox_add_"+cartExperienceId+"_"+category).find('#user_type').val(user_type);
         $(".tab1 #fancybox_add_"+cartExperienceId+"_"+category).find('#category').val(category);
        $.fancybox.open(
        //$("#bookingFormBox-"+cartExperienceId).html() , {
        $(".tab1 #fancybox_add_"+cartExperienceId+"_"+category).html() , {
            closeExisting: false,
            touch: false,
            width:800,
            height:500,
            autoSize : false
        }
    );
    });  
    $("body").on("click", '.tab2 #add_notes_popup', function(e) {
        var cartExperienceId = $(this).data("id");
        var user_type = $(this).data("user_type");
        var category = $(this).data("cat");
        //$(".tab2 #fancybox_add_"+cartExperienceId+"_"+category).find('#user_type').val(user_type);
        $(".tab2 #fancybox_add_"+cartExperienceId+"_"+category).find('#category').val(category);
        $.fancybox.open(
        //$("#bookingFormBox-"+cartExperienceId).html() , {
        $(".tab2 #fancybox_add_"+cartExperienceId+"_"+category).html() , {
            closeExisting: false,
            touch: false,
            width:800,
            height:500,
            autoSize : false,

        }
    );
    });  
    //$('.tab1 #ajax-file-upload').submit(function(e) {
    $("body").on("submit", '#ajax-file-upload1', function(e) {        
        e.preventDefault();
        var divid = $(this).parent().parent().parent().parent('.fancybox-container').attr('id');
        var initials = $('#'+divid+' .super_add #initials').val();

        var category = $('#'+divid+' .super_add #category').val();
        
        var note = $('#'+divid+' .super_add #notes').val();
        var cart_id = $('.super_add #cart_id').val();
        var user_type = $('.super_add #user_type').val();
        if( category == '' || note == '' )
        {
           /* if(initials == '')
            {
                $(this).parent().find('.initials_cls').html('Please enter initials');
            }
            else
            {
                $(this).parent().find('.initials_cls').html('');
            }*/
            if(category == '')
            {
                $(this).parent().find('.category_cls').html('Please enter category');
            }
            else
            {
                $(this).parent().find('.category_cls').html('');
            }
            if(note == '')
            {
                $(this).parent().find('.notes_cls').html('Please enter note');
            }
            else
            {
                $(this).parent().find('.notes_cls').html('');
            }
        }
        else
        {
            $(this).parent().find('.initials_cls').html('');
            $(this).parent().find('.category_cls').html('');
            $(this).parent().find('.notes_cls').html('');
            
            let formData = new FormData(this);
            $('.loader').show();
            $.ajax({
                type:'POST',
                url: "/insert-tour-notes",
                data: formData,
                contentType: false,
                processData: false,
                success:function(data)
                {
                    $('#'+divid+' .fancybox-close-small').trigger('click');
                    var initials = $('#'+divid+' .super_add #initials').val('');
                    var category = $('#'+divid+' .super_add #category').val('');
                    var note = $('#'+divid+' .super_add #notes').val('');
                    $('.loader').hide();

                    $('.tab1 #tab_id_'+cart_id).html('');
                    $('.tab1 #tab_id_'+cart_id).html(data);


                   /* var initials = $('.tab1 #initials').val('');
                    var category = $('.tab1 #category').val('');
                    var note = $('.tab1 #notes').text('');
                    var cart_id = $('.tab1 #cart_id').val('');*/
                }
           });
        }

        
    });
    
    $("body").on("click", '.tab1 .delete-note', function(e) {     
        if($(this).hasClass('selected-delete'))
        {
            $(this).removeClass('selected-delete');
        }
        else
        {
            $(this).addClass('selected-delete');
        }
        
    });  
    //delete notes
    $("body").on("click", '.tab1 #general_notes', function(e) {  
    alert('Are you sure you want to delete this Note?');
    var cart_id =  $(this).data("cart_id");
    var ddata = [];
     $( ".notestab1 .notes .selected-delete" ).each(function( index ) {
        ddata.push($(this).data("id"));
         
     }); 
     $('.loader').show();       
     $.ajax({
                type:'POST',
                url: "/delete-tour-notes",
                data: {ddata:ddata,'cart_id':cart_id,'user_type':'1' },
                
                success:function(data)
                {
                    $('.loader').hide();
                    $('.tab1 #tab_id_'+cart_id).html('');
                    $('.tab1 #tab_id_'+cart_id).html(data);
                }
           });
    });    
    $("body").on("click", '.tab1 #room_notes', function(e) {  
    alert('Are you sure you want to delete this Note?');
    var cart_id =  $(this).data("cart_id");
    var ddata = [];
     $( ".notestab2 .notes .selected-delete" ).each(function( index ) {
        ddata.push($(this).data("id"));
         
     }); 
     $('.loader').show();       
     $.ajax({
                type:'POST',
                url: "/delete-tour-notes",
                data: {ddata:ddata,'cart_id':cart_id,'user_type':'1' },
                
                success:function(data)
                {
                    $('.loader').hide();
                    $('.tab1 #tab_id_'+cart_id).html('');
                    $('.tab1 #tab_id_'+cart_id).html(data);
                }
           });
    });       
    $("body").on("click", '.tab1 #ame_notes', function(e) {  
    alert('Are you sure you want to delete this Note?');
    var cart_id =  $(this).data("cart_id");
    var ddata = [];
     $( ".notestab3 .notes .selected-delete" ).each(function( index ) {
        ddata.push($(this).data("id"));
         
     }); 
     $('.loader').show();       
     $.ajax({
                type:'POST',
                url: "/delete-tour-notes",
                data: {ddata:ddata,'cart_id':cart_id,'user_type':'1' },
                
                success:function(data)
                {
                    $('.loader').hide();
                    $('.tab1 #tab_id_'+cart_id).html('');
                    $('.tab1 #tab_id_'+cart_id).html(data);
                }
           });
    });  
    $("body").on("click", '.tab1 #hot_notes', function(e) {  
    alert('Are you sure you want to delete this Note?');
    var cart_id =  $(this).data("cart_id");
    var ddata = [];
     $( ".notestab4 .notes .selected-delete" ).each(function( index ) {
        ddata.push($(this).data("id"));
         
     }); 
     $('.loader').show();       
     $.ajax({
                type:'POST',
                url: "/delete-tour-notes",
                data: {ddata:ddata,'cart_id':cart_id,'user_type':'1' },
                
                success:function(data)
                {
                    $('.loader').hide();
                    $('.tab1 #tab_id_'+cart_id).html('');
                    $('.tab1 #tab_id_'+cart_id).html(data);
                }
           });
    });
     $("body").on("click", '.tab1 #exp_notes', function(e) {  
    alert('Are you sure you want to delete this Note?');
    var cart_id =  $(this).data("cart_id");
    var ddata = [];
     $( ".notestab5 .notes .selected-delete" ).each(function( index ) {
        ddata.push($(this).data("id"));
         
     }); 
     $('.loader').show();       
     $.ajax({
                type:'POST',
                url: "/delete-tour-notes",
                data: {ddata:ddata,'cart_id':cart_id,'user_type':'1' },
                
                success:function(data)
                {
                    $('.loader').hide();
                    $('.tab1 #tab_id_'+cart_id).html('');
                    $('.tab1 #tab_id_'+cart_id).html(data);
                }
           });
    });
    $("body").on("click", '.tab1 #all_notes', function(e) {  
    alert('Are you sure you want to delete this Note?');
    var cart_id =  $(this).data("cart_id");
    var ddata = [];
     $( ".notestab6 .notes .selected-delete" ).each(function( index ) {
        ddata.push($(this).data("id"));
         
     }); 
     $('.loader').show();       
     $.ajax({
                type:'POST',
                url: "/delete-tour-notes",
                data: {ddata:ddata,'cart_id':cart_id,'user_type':'1' },
                
                success:function(data)
                {
                    $('.loader').hide();
                    $('.tab1 #tab_id_'+cart_id).html('');
                    $('.tab1 #tab_id_'+cart_id).html(data);
                }
           });
    });   

    /*colobrator*/    
    $("body").on("submit", '#ajax-file-upload2', function(e) {        
        e.preventDefault();
        var divid = $(this).parent().parent().parent().parent('.fancybox-container').attr('id');
        var initials = $('#'+divid+' .colobrator_add #initials').val();

        var category = $('#'+divid+' .colobrator_add #category').val();
        
        var note = $('#'+divid+' .colobrator_add #notes').val();
        var cart_id = $('.colobrator_add #cart_id').val();
        var user_type = $('.colobrator_add #user_type').val();
        if( category == '' || note == '' )
        {
           /* if(initials == '')
            {
                $(this).parent().find('.initials_cls').html('Please enter initials');
            }
            else
            {
                $(this).parent().find('.initials_cls').html('');
            }*/
            if(category == '')
            {
                $(this).parent().find('.category_cls').html('Please enter category');
            }
            else
            {
                $(this).parent().find('.category_cls').html('');
            }
            if(note == '')
            {
                $(this).parent().find('.notes_cls').html('Please enter note');
            }
            else
            {
                $(this).parent().find('.notes_cls').html('');
            }
        }
        else
        {
            $(this).parent().find('.initials_cls').html('');
            $(this).parent().find('.category_cls').html('');
            $(this).parent().find('.notes_cls').html('');
            
            let formData = new FormData(this);
            $('.loader').show();
            $.ajax({
                type:'POST',
                url: "/insert-tour-notes",
                data: formData,
                contentType: false,
                processData: false,
                success:function(data)
                {
                    $('#'+divid+' .fancybox-close-small').trigger('click');
                    var initials = $('#'+divid+' .colobrator_add #initials').val('');
                    var category = $('#'+divid+' .colobrator_add #category').val('');
                    var note = $('#'+divid+' .colobrator_add #notes').val('');
                    $('.loader').hide();

                    $('.tab2 #tab_id_'+cart_id).html('');
                    $('.tab2 #tab_id_'+cart_id).html(data);


                   /* var initials = $('.tab1 #initials').val('');
                    var category = $('.tab1 #category').val('');
                    var note = $('.tab1 #notes').text('');
                    var cart_id = $('.tab1 #cart_id').val('');*/
                }
           });
        }

        
    });
    
    $("body").on("click", '.tab2 .delete-note', function(e) {     
        if($(this).hasClass('selected-delete'))
        {
            $(this).removeClass('selected-delete');
        }
        else
        {
            $(this).addClass('selected-delete');
        }
        
    });  
    //delete notes
    $("body").on("click", '.tab2 #general_notes', function(e) {  
    alert('Are you sure you want to delete this Note?');
    var cart_id =  $(this).data("cart_id");
    var ddata = [];
     $( ".notestab2 .notes .selected-delete" ).each(function( index ) {
        ddata.push($(this).data("id"));
         
     }); 
     $('.loader').show();       
     $.ajax({
                type:'POST',
                url: "/delete-tour-notes",
                data: {ddata:ddata,'cart_id':cart_id,'user_type':'1' },
                
                success:function(data)
                {
                    $('.loader').hide();
                    $('.tab2 #tab_id_'+cart_id).html('');
                    $('.tab2 #tab_id_'+cart_id).html(data);
                }
           });
    });    
    $("body").on("click", '.tab2 #room_notes', function(e) {  
    alert('Are you sure you want to delete this Note?');
    var cart_id =  $(this).data("cart_id");
    var ddata = [];
     $( ".notestab2 .notes .selected-delete" ).each(function( index ) {
        ddata.push($(this).data("id"));
         
     }); 
     $('.loader').show();       
     $.ajax({
                type:'POST',
                url: "/delete-tour-notes",
                data: {ddata:ddata,'cart_id':cart_id,'user_type':'1' },
                
                success:function(data)
                {
                    $('.loader').hide();
                    $('.tab2 #tab_id_'+cart_id).html('');
                    $('.tab2 #tab_id_'+cart_id).html(data);
                }
           });
    });       
    $("body").on("click", '.tab2 #ame_notes', function(e) {  
    alert('Are you sure you want to delete this Note?');
    var cart_id =  $(this).data("cart_id");
    var ddata = [];
     $( ".notestab3 .notes .selected-delete" ).each(function( index ) {
        ddata.push($(this).data("id"));
         
     }); 
     $('.loader').show();       
     $.ajax({
                type:'POST',
                url: "/delete-tour-notes",
                data: {ddata:ddata,'cart_id':cart_id,'user_type':'1' },
                
                success:function(data)
                {
                    $('.loader').hide();
                    $('.tab2 #tab_id_'+cart_id).html('');
                    $('.tab2 #tab_id_'+cart_id).html(data);
                }
           });
    });  
    $("body").on("click", '.tab2 #hot_notes', function(e) {  
    alert('Are you sure you want to delete this Note?');
    var cart_id =  $(this).data("cart_id");
    var ddata = [];
     $( ".notestab4 .notes .selected-delete" ).each(function( index ) {
        ddata.push($(this).data("id"));
         
     }); 
     $('.loader').show();       
     $.ajax({
                type:'POST',
                url: "/delete-tour-notes",
                data: {ddata:ddata,'cart_id':cart_id,'user_type':'1' },
                
                success:function(data)
                {
                    $('.loader').hide();
                    $('.tab2 #tab_id_'+cart_id).html('');
                    $('.tab2 #tab_id_'+cart_id).html(data);
                }
           });
    });
     $("body").on("click", '.tab2 #exp_notes', function(e) {  
    alert('Are you sure you want to delete this Note?');
    var cart_id =  $(this).data("cart_id");
    var ddata = [];
     $( ".notestab5 .notes .selected-delete" ).each(function( index ) {
        ddata.push($(this).data("id"));
         
     }); 
     $('.loader').show();       
     $.ajax({
                type:'POST',
                url: "/delete-tour-notes",
                data: {ddata:ddata,'cart_id':cart_id,'user_type':'1' },
                
                success:function(data)
                {
                    $('.loader').hide();
                    $('.tab2 #tab_id_'+cart_id).html('');
                    $('.tab2 #tab_id_'+cart_id).html(data);
                }
           });
    });
     $("body").on("click", '.tab2 #all_notes', function(e) {  
    alert('Are you sure you want to delete this Note?');
    var cart_id =  $(this).data("cart_id");
    var ddata = [];
     $( ".notestab6 .notes .selected-delete" ).each(function( index ) {
        ddata.push($(this).data("id"));
         
     }); 
     $('.loader').show();       
     $.ajax({
                type:'POST',
                url: "/delete-tour-notes",
                data: {ddata:ddata,'cart_id':cart_id,'user_type':'1' },
                
                success:function(data)
                {
                    $('.loader').hide();
                    $('.tab2 #tab_id_'+cart_id).html('');
                    $('.tab2 #tab_id_'+cart_id).html(data);
                }
           });
    });  
     //add selling price
     //delete notes
    $("body").on("click", '.tab1 .save_selling_price', function(e) {  
    var cart_exp_id =  $('.tab1 #cart_id').val();
    var selling_price =  $('.tab1 .selling_price').val();
    var srs_price =  $('.tab1 .srs_price').val();
   
     //$('.loader').show();       
     $.ajax({
                type:'POST',
                url: "/insert-selling-price",
                data: {'cart_exp_id':cart_exp_id,'selling_price':selling_price,'srs_price':srs_price },
                
                success:function(data)
                {
                   // $('.loader').hide();
                    if(data == 1)
                    {
                        $('.tab1 .success_msg').text("Add price successfully.");
                    }
                    else
                    {
                        $('.tab1 .error_msg').text("Something went wrong.");
                    }
                }
           });
    });    
    $("body").on("click", '.tab1 .save_map_url', function(e) {  
    var exp_id =  $(this).attr('data-exp-id');
    var map_url =  $('.tab1 #map_url').val();
   
     //$('.loader').show();       
     $.ajax({
                type:'POST',
                url: "/insert-map-url",
                data: {'exp_id':exp_id,'map_url':map_url },
                
                success:function(data)
                {
                   // $('.loader').hide();
                    if(data == 1)
                    {
                        $('.tab1 .map_success_msg').text("Add map successfully.");
                    }
                    else
                    {
                        $('.tab1 .map_error_msg').text("Something went wrong.");
                    }
                }
           });
    });    
</script>
<script type="text/javascript">
    <?php  $currency_symbol = getCurrencySymbol($cart_exp_id); ?>
    var curreny_symbol = '<?=$currency_symbol?>';
    $("body").on("click", '#calculate_margin', function(e) {  
    var venuss_price = $('#venus_price').val();
    var venuss_srs_price = $('#venus_srs_price').val();
    var co_price = $('#colo_selling_price').val();
    var co_srs_price = $('#colo_srs').val();
    var profit_price =parseFloat(co_price)-parseFloat(venuss_price);
    var profit_srs =parseFloat(co_srs_price)-parseFloat(venuss_srs_price); 
    
    $('.selling_margin').text(curreny_symbol+profit_price);
    $('.srs_margin').text(curreny_symbol+profit_srs);
    $('.margin_percentage').text(((parseFloat(profit_price)/parseFloat(co_price))*100).toFixed(2)+'%');
    $('.srs_margin_percentage').text(((parseFloat(profit_srs)/parseFloat(co_srs_price))*100).toFixed(2)+'%');
    
})
//calculate per person cost
     $("body").on("change", '.calculate_cost', function(e) {  

    var transfer_cost = $('#transfer_cost').val();
    var per_day_price = $('#per_day_price').val();
    var added_margin = $('.added_margin').val();
    var transfer_cost = (transfer_cost != '')?transfer_cost:0;
    var per_day_price = (per_day_price != '')?per_day_price:0;
    var total_amount =parseFloat(transfer_cost)+parseFloat(per_day_price);
    if(total_amount >= '0')
    {
        $('.total_cal_price').text(curreny_symbol+total_amount);
        total_mar_amt = (total_amount*added_margin)/100;
        total_price = total_mar_amt+total_amount;
    }
    $('.total_price').text(curreny_symbol+total_price);
    
    
})
     $(document).on("click", "#sendEnquiry", function(e){
        var formData = $('#generalEnquiryFrom').serialize();
        $.ajax({
            url: '{{ route("send-general-enquiry") }}',
            type: 'POST',
            dataType: 'JSON',
            data: {'formData':formData},
            beforeSend: function() {
                $('.loader').show();
            }
        }).done(function(data) {
            $('.loader').hide();
            if(data.status == 'success'){
                toastSuccess(data.message);
                 parent.jQuery.fancybox.close();
                    parent.parent.jQuery.fancybox.close();
                    var cartIdSCls = $('.cartIdSCls').val();
                    $('a#reloadInfo'+cartIdSCls).trigger('click');
            }else{
                toastError(data.message);
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
    $('.note_replies').click(function(){
        var firste = $(this).closest('li').find('ul').first().toggle();
    });
</script>