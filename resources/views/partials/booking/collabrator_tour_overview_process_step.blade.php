<style type="text/css">
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

   .orangeLink {
    width: 100%;
    height: 48px;
    background: #FCA311;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-bottom: 10px;
    font-weight: 700;
    letter-spacing: 0px;
    color: #FFFFFF;
    
    border-radius: 5px;
    }
 div.container {
    float: left;
}  
</style>
@foreach($items as $key => $cartItem)
            @foreach($cartItem->cartExperiences as $item)
                <?php 
                $currency_symbol = getCurrencySymbol($item->currency);
                $total_pax = get_total_pax($cart_exp_id); 
                if($cart_exp_id == $item->id)
                {
                if($item->completed == 1){
                    continue;
                }
                if($item->cancel_status == 1){
                    continue;
                }
                ?>    
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
                    $cartExperiencesToRoomsRequest = App\Models\Cms\CartExperiencesToRooms::with('cartExperiencesToRoomsRequests')->whereIn('room_request_status',['pending','approved','declined','cancelled'])->where("cart_exp_id", $item->id)->orderBy('date', 'DESC')->get();
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
                    }
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
                        $hotel_data = get_hotel_date($item->id);
                    ?>
        <div class="notIndexContainer"  id="tourOverviewModal-{{ $item->id }}">
            <div class="tour_summary_container">
                    
                    <div class="tab_content">
                    <div class="intro">

                        <div class="heading">
                            {{ $item->experience_name }}
                        </div>

                        <p>
                            <strong>{{ $hotel_data['hotel_name'] }}</strong>
                            {{ $hotel_data['date_from'] }} - {{ $hotel_data['date_to'] }} ( {{ $hotel_data['nights'] }} @if($hotel_data['nights'] > 1) nights @else night @endif )
                        </p>
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
                        <?php $userdata = Session::get('sub_account_data');?>
                         <?php $not_complated = 0;   ?>
                         @foreach($newarr as $its)
                        
                            @if(!empty($its->pivot))
                                        @if($its->id < 11)
                                        <?php 
                                    $today = strtotime(date('Y-m-d'));
                                    $enddate = strtotime($item->date_to);
                                    $style = '';
                                    if($today < $enddate && $its->id == 10){
                                        //$style = 'style="pointer-events:none;"';
                                    }
                                    ?>
                                        <?php //if($its->id == '1'){ ?>
                                    <div class="todo @if($its->id == '1') _docusignStepCls @elseif($its->id == '9' && $its->pivot->completed == 1) tourPackBox @elseif($its->id == '2') stepItemSquareActive @elseif($its->id == '7') editGuestList @elseif( $its->id == '3' || $its->id == '4'|| $its->id == '6' ||  $its->id == '7') stepItemSquareActive  @endif @if($its->pivot->completed == 1) completed @elseif($its->pivot->due_date < Carbon\Carbon::now()) overdue @endif @if($item->tourStatuses->last()->id == $its->id)) active @endif"  data-id=" @if($its->id != '10'){{ $item->id }}@else  @endif" data-step="{{ $its->id }}" id="reloadInfo{{$item->id}}"  data-urls="{{ route('change-docusign', $item->id) }}" data-downloadurl="{{ route('download-etc-pdf-coll', $item->id) }}" data-tour="{{ route('show-tourpack', $item->id) }}" data-tab="collaborator" <?php echo $style; ?>>

                                            <div class="tick"></div>

                                            <div class="intro">

                                                <span>{{ ($its->id == '9')?'Tour Pack':$its->name }}</span>
                                                <span class="due_date">@if($its->pivot->completed == 1) completed at {{ date('d/m/Y', strtotime($its->pivot->completed_at)) }} @else due {{ date('d/m/Y', strtotime($its->pivot->due_date)) }} @endif</span>
                                                <span>@if($its->pivot->completed == 1) COMPLETED @elseif($its->pivot->due_date < Carbon\Carbon::now()) <span style="color:red;">OVERDUE</span> @else NOT COMPLETE @endif</span>
                                                <?php
                                                $experience_dates_rates = 


DB::connection('mysql_veenus')->table('experience_dates_rates')->where('id', $item->dates_rates_id)->where('deleted_at', null)->first();
                                                if(!empty($experience_dates_rates) && $its->id == 5){
                                                    if($item->currency == 2)
                                                    {
                                                         $deposit_amt = !empty($experience_dates_rates->deposit_euro)?str_replace(',','',$experience_dates_rates->deposit_euro):0;
                                                    }
                                                    else
                                                    {
                                                         $deposit_amt = !empty($experience_dates_rates->deposit)?str_replace(',','',$experience_dates_rates->deposit):0;
                                                    }
                                                    echo '<span>'.$currency_symbol.$deposit_amt.'</span>';
                                                }
                                                ?>
                                            </div>
                                            <?php 
                                                 if($its->id == '7') { $guest_list_due_date = date('Y-m-d', strtotime($its->pivot->due_date)); } 
                                                 ?>
                                            <div class="excerpt">
                                                <p>
                                                    @if($its->id == 1)
                                                       <!--  @if($its->pivot->completed == 1){{ $its->pivot->sign_name }}@else  @endif -->
                                                   <?php /* @elseif($its->id == 2)
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
                                                        @if($its->pivot->completed == 1){{ $its->pivot->step8 }}@else  @endif */?>
                                                    @elseif($its->id == 9)
                                                        @if($its->pivot->completed == 1)
                                                        
                                                        <a href="javascript:;"><i class="fas fa-file-pdf fa-2x" style="color: #FCA311;"></i></a>
                                                        @else 
                                                        <!-- <a href="javascript:;"><i class="fas fa-file-pdf fa-2x" style="color: #FCA311;"></i></a> -->
                                                         @endif
                                                  <?php /*  @elseif($its->id == 10)
                                                        @if($its->pivot->completed == 1){{ $its->pivot->step10 }}@else  @endif*/?>
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
                                                @if($its->id != '5' && $its->id != '8')
                                                    @if($its->id == '1' && $its->pivot->completed == 1)
                                                    <a href="javascript:;" class="cta @if($its->id == '1') docusignStepCls @endif">view</a>
                                                    @elseif($its->id == '9' && $its->pivot->completed == 1)
                                                    <a href="javascript:;" class="cta">view</a>
                                                    <a href="javascript:;" class="cta">download</a>
                                                    @endif
                                                    @if($its->id == '1')
                                                        @if($its->pivot->completed != 1)
                                                            @if(!empty($item->is_resign))
                                                            <a href="javascript:;" class="cta docusignStepCls">Resign</a>
                                                            <a target="_blank" href="/etc_document/<?=$item->id?>" class="cta">Download</a>
                                                            <!-- empty($userdata['turn_off_sign_doc']) &&  -->
                                                            @else
                                                                @if(!empty($userdata['parent_user']))
                                                                @else
                                                                <a href="javascript:;" class="cta docusignStepCls">sign</a>
                                                               <!--  <a target="_blank" href="/etc_document/<?=$item->id?>" class="cta">Download</a> -->
                                                                @endif
                                                             @endif
                                                        @else
                                                        <?php if(!empty($item->signed_document)) { ?>
                                                             <a target="_bl" href="{{asset('public/pdf/'.$item->signed_document)}}" class="cta ">download</a>
                                                         <?php } else { ?> 
                                                        <a href="javascript:;" class="cta downloadPDF">download</a>
                                                        <?php } ?>
                                                        @endif
                                                    @elseif($its->id == 10)
                                                    <a href="javascript:;" data-href="<?=URL('driver-review'.'/'.$item->id)?>" class="cta copyLink">copy link</a>
                                                    <a target="_blank" href="<?=URL('driver-review'.'/'.$item->id)?>" class="cta completeReview">complete review</a>
                                                   <!-- <a href="javascript:;" class="cta" data-tab="collaborator">edit</a>-->
                                                    @elseif($its->id != '9')
                                                     <?php /*if($its->pivot->completed == 1)*/if( $item->tourStatuses->last()->id == $its->id){ ?> 
                                                    <a href="javascript:;" class="cta @if($its->id == '3' || $its->id == '4' || $its->id == '6') editTracking @elseif($its->id == '7') editGuestList123 @endif">@if($its->id == '7') Guest List @else edit @endif</a>
                                                    <?php } ?>
                                                    @if($its->id == '3' || $its->id == '4'  || $its->id == '6' )
                                                    <?php if($its->pivot->completed != 1 && (!empty($sngtotal) || !empty($dbltotal) || !empty($twntotal))) { ?>
                                                    <a href="javascript:;" class="cta">Complete</a>
                                                    <?php } ?>
                                                    @endif
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
                                    
                                    if($its->name == 'Tracking 1')
                                    {
                                        $not_complated = 1;
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
                                                        if($item->currency == 2)
                                                        {
                                                             $deposit_amt = !empty($experience_dates_rates->deposit_euro)?str_replace(',','',$experience_dates_rates->deposit_euro):0;
                                                        }
                                                        else
                                                        {
                                                             $deposit_amt = !empty($experience_dates_rates->deposit)?str_replace(',','',$experience_dates_rates->deposit):0;
                                                        }
                                                        echo '<span>'.$currency_symbol.$deposit_amt.'</span>';
                                                    }
                                                    ?>
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


DB::connection('mysql_veenus')->table('hotels')->selectRaw('name,address,contact_number,contact_name')->where('name',$item->hotel_name)->first();
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


DB::connection('mysql_veenus')->table('hotels')->selectRaw('name,address,contact_number,contact_name')->whereRaw('name like "%'.trim($hotel).'%" ')->first();
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
                                                    <strong>Address:</strong> {{!empty($hotel_detail->address)?$hotel_detail->address:''}}
                                                </li>

                                                <li>
                                                    <strong>Contact:</strong> {{!empty($hotel_detail->contact_number)?$hotel_detail->contact_number:''}} - {{!empty($hotel_detail->contact_name)?$hotel_detail->contact_name:''}}
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
                                                        <strong>Address:</strong> {{ str_limit($valueEE->address, 150) }}
                                                    </li>

                                                    <li>
                                                        <strong>Contact:</strong> {{ $valueEE->main_contact_number }} - {{ $valueEE->contact_name }}
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
                                                $cartExperiencesToRoomsRequest = App\Models\Cms\CartExperiencesToRooms::with('cartExperiencesToRoomsRequests')->whereIn('room_request_status',['pending','approved','declined','cancelled'])->where("cart_exp_id", $item->id)->orderBy('date', 'DESC')->get();
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
                                                }
                                                ?>
                                                 <?php  $d_cnt = (!empty($item->driver_name) && ($item->driver_room_type == '2' || $item->driver_room_type == '3'))?'1':'0'; ?>
                                                <div class="text-center">Pax: <strong>{{$total_pax}}<?php echo ($item->driver_name != '' && $item->driver_name1 != '') ? '+ 2 Dr' : (($item->driver_name != '') ? '+ 1 Dr' : ''); ?></strong></div>
                                                <div class="rooms large">
                                                    <strong>{{$sngtotal}}</strong> sgl <strong>{{$dbltotal}}</strong> dbl <strong>{{$twntotal}}</strong> twn
                                                </div>

                                                <div class="ctas">
                                                <?php if(!empty($not_complated)){ ?>
                                                    <a class="orangeLink" onclick="alert('Tracking 1 needs to be completed to access guest list.');">Guest List</a>
                                                <?php } else{?>
                                                <?php
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
                                                <?php } ?>
                                                </div>

                                            </div>

                                            <div class="box red">

                                                <div class="sub_heading">
                                                    Cancellations
                                                </div>

                                                <div class="text_intro">
                                                    Cancellation deadline
                                                </div>
                                            
                                        <?php
                                        if($item->completed == 1){
                                                            continue;
                                                        }
                                        if($item->cancel_status == 1){
                                            continue;
                                        }
                                        /*$cancellation_days = array(0); 
                                        if(!empty($item->dates_rates_id)){
                                            $experience_dates = 


DB::connection('mysql_veenus')->table('experience_dates')->where('dates_rates_id', $item->dates_rates_id)->where('experiences_id', $item->experiences_id)->where('deleted_at', null)->get()->toArray();
                                            
                                            if(!empty($experience_dates)){
                                                foreach ($experience_dates as $key => $value) {
                                                    $cancellation_days[] = $value->cancellation_days;
                                                }
                                            }
                                        }*/
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
                                                  <?php if(max($cancellation_days) > 0){
                                                        echo date('d/m/Y',strtotime('-'.max($cancellation_days).' days', strtotime($item->date_from)));
                                                        echo '<br/>';
                                                        echo "(" .  max($cancellation_days) . " ". "Days)";
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

                                        <!-- <div class="white_box">

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

                                        </div> -->

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

                                        <div class="white_box h_100">
                                            <?php if(!empty($item->cart_map_url)){ ?>
                                                <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
                                                <div class="mapCont">
                                                    <iframe src="<?php echo $item->cart_map_url; ?>" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                                                    {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5112.853218093653!2d-0.1221450017424323!3d51.50128773950385!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487604b89a2ce219%3A0xdd09ac6f4d8cb96!2sPark%20Plaza%20Westminster%20Bridge%20London!5e0!3m2!1sen!2sin!4v1614855696249!5m2!1sen!2sin" width="800" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe> --}}
                                                    {{-- <div id="map" style="width: 800px; height: 400px;"></div> --}}

                                                    {{-- <script type="text/javascript">
                                                        var locations = [
                                                            ['MERCURE DAVENTRY COURT HOTEL', 52.277822, -1.164655],
                                                            ['THE SILVERSTONE EXPERIENCE', 52.076892, -1.025067],
                                                            ['JAGUAR LAND ROVER EXPERIENCE', 52.432488, -1.771511],
                                                        ];

                                                        var map = new google.maps.Map(document.getElementById('map'), {
                                                            // zoom: 10,
                                                            // center: new google.maps.LatLng(-33.92, 151.25),
                                                            mapTypeId: google.maps.MapTypeId.ROADMAP
                                                        });

                                                        //create empty LatLngBounds object
                                                        var bounds = new google.maps.LatLngBounds();
                                                        var infowindow = new google.maps.InfoWindow();

                                                        var marker, i;

                                                        for (i = 0; i < locations.length; i++) {
                                                            marker = new google.maps.Marker({
                                                                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                                icon: "{{ asset('images/v.png') }}",
                                                                map: map,
                                                                title: locations[i][0]
                                                            });

                                                            //extend the bounds to include each marker's position
                                                            bounds.extend(marker.position);

                                                            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                                                                return function() {
                                                                    infowindow.setContent(locations[i][0]);
                                                                    infowindow.open(map, marker);
                                                                }
                                                            })(marker, i));
                                                        }

                                                        //now fit the map to the newly inclusive bounds
                                                        map.fitBounds(bounds);

                                                        //(optional) restore the zoom level after the map is done scaling
                                                        var listener = google.maps.event.addListener(map, "idle", function () {
                                                            map.setZoom(7);
                                                            google.maps.event.removeListener(listener);
                                                        });
                                                    </script> --}}
                                                </div>
                                            <?php } ?>
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
                                                <option value="1">General Notes</option>
                                                <!-- <option value="2">Room Requests</option> -->
                                            </select>
                                            <p class="category_cls" style="color: red;"></p>
                                            <input type="hidden" name="cart_id" id="cart_id" value="{{ $item->id }}">
                                            <input type="hidden" name="user_type" id="user_type" value="1">
                                            <textarea type="text" class="form-control mb-2" name="notes" id="notes" placeholder="Type here" rows="7"></textarea>
                                            <p class="notes_cls" style="color: red;"></p>                                           
                                            <input type="file" accept=".pdf"  style="max-width: 500px;" name="note_file" id="note_file">
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
                                                <option value="3">Amendements</option>
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
                                                
                                            
                                                @include ('partials.booking.collaborator_tour_notes',[
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
                        
                    <script>
                        $(".stepItemSquareActive").bind("click", function(){

                             if(event.target.className != 'cta copyLink' && event.target.className != 'cta completeReview' && event.target.className != 'cta  editTracking ' && event.target.className != 'cta  editGuestList '){
                                /*var cartExperienceId = $(this).data("id");
                                var stepId = $(this).data("step");*/
                                var cartExperienceId = $.trim($(this).data("id"));
                                var stepId = $.trim($(this).data("step"));
                                $.fancybox.open(
                                    $("#bookingFormBox-"+cartExperienceId.trim()+"step-"+stepId.trim()).html() , {
                                        closeExisting: true,
                                        touch: false
                                    }
                                );
                                $('.bookingForm .stepsline').show();
                            }
                        });
                    </script>
                </div>
            </div>
             <?php } ?>
            @endforeach
        @endforeach
<div style="display: none;">
        @foreach($items as $key => $cartItem)
            @foreach($cartItem->cartExperiences as $item)

                <?php
                if($item->completed == 1){
                                continue;
                            }
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


                                foreach ($cartExperiencesToRooms as $key => $value) {
                                    if($value->room_id == '1' && $value->status == '1'){
                                        $sngSCnt++;
                                    }else if($value->room_id == '2' && $value->status == '1'){
                                        $dblSCnt++;
                                    }else if($value->room_id == '3' && $value->status == '1'){
                                        $twnSCnt++;
                                    }else if($value->room_id == '4' && $value->status == '1'){
                                        $trpSCnt++;
                                    }else if($value->room_id == '5' && $value->status == '1'){ 
                                        $qrdSCnt++;
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
                                }
                                $sngLastAmt = $sgl;     
                                if($sngSCnt > $sgl){
                                    $sngLastAmt = $sngSCnt;
                                }
                                $dblLastAmt = $dbl;     
                                if($dblSCnt > $dbl){
                                    $dblLastAmt = $dblSCnt;
                                }
                                $twnLastAmt = $twn;     
                                if($twnSCnt > $twn){
                                    $twnLastAmt = $twnSCnt;
                                }
                                $trpLastAmt = $trp;     
                                if($trpSCnt > $trp){
                                    $trpLastAmt = $trpSCnt;
                                }
                                $qrdLastAmt = $qrd;     
                                if($qrdSCnt > $qrd){
                                    $qrdLastAmt = $qrdSCnt;
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

                            <form method="POST" action="{{ route('process-tour-steps.ajax') }}" class="ajax">
                                {{ csrf_field() }}
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
                                    <small>The URL posted here will help us see the way the product is advertised</small>
                                   
                                    <div class="skurlinputbutton{{ $item->id }}"  style="<?php echo ($itemStatus->pivot->url)?'display:none;':'display:block;'; ?>">
                                     
                                       <div>
                                            <input type="text" value="{{ !empty($itemStatus->pivot->url)?$itemStatus->pivot->url:''  }}" name="url" placeholder="https://" style="padding: 10px 15px;width: 100%;margin-top: 10px;">
                                           <button type="submit" data-step="{{ optional($itemStatus)->id }}" class="stepSubmitButton sk_cta">{{!empty($itemStatus->pivot->url)?'Update URL':'Add URL'}}</button>
                                       </div>
                                    </div>
                                   
                                    <div class="inputRowView skurllink{{ $item->id }}" style="<?php echo ($itemStatus->pivot->url)?'display:block;':'display:none;'; ?>">
                                        <p>Current URL link:</p>
                                        <p><a href="{{ $itemStatus->pivot->url  }}" target="_blank">{{ $itemStatus->pivot->url  }}</a> 
                                            <a href="javascript:;" style="color: white;background: orange;padding: 4px;border-radius: 4px;" data-href="{{ $itemStatus->pivot->url }}" class="cta copyLink">copy link</a>
                                       </p>
                                          
                                        <a href="#" class="stepSubmitButton skShow sk_cta" data-id="{{ $item->id }}">{{!empty($itemStatus->pivot->url)?'Update URL':'Add URL'}}</a>
                                    </div>
                                
                                @elseif(optional($itemStatus)->id == 3 || optional($itemStatus)->id == 4 || optional($itemStatus)->id == 6)
                                    <?php
                                    $stepnumber = optional($itemStatus)->id;
                                    
                                    ?>
                                     <!-- <input type="hidden" name="step{{$stepnumber}}" class="sk_small_text stepTracking{{$stepnumber}}" value="1"> -->
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
                                  <!--   <div class="text-center">Pax: <strong>{{$rooms_ppl}}</strong></div> -->
                                             
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
                                            <input type="hidden" name="step{{$stepnumber}}" class="sk_small_text stepTracking{{$stepnumber}}" value="1">
                                            <input type="hidden" name="pax" class="" value="{{$total_pax}}">
                                              <input type="hidden" name="sgl_room_total" class="" value="{{$sngtotal}}">
                                               <input type="hidden" name="dbl_room_total" class="" value="{{$dbltotal}}">
                                                <input type="hidden" name="twn_room_total" class="" value="{{$twntotal}}">

                                        <!-- <button type="submit" data-step="{{ optional($itemStatus)->id }}" class="stepSubmitButtonTracking sk_cta">Update tracking</button> -->
                                        <?php /*if(!empty($sngtotal) || !empty($dbltotal) || !empty($twntotal)) {*/ ?>
                                     <button type="submit" data-step="{{ optional($itemStatus)->id }}" class="stepSubmitButtonTracking sk_cta"  style="width: 250px;margin-left: 22%;">Save and update {{ optional($itemStatus)->name }}</button>
                                 <?php /*}*/ ?>
                                @elseif(optional($itemStatus)->id == 44)
                                    <label for="step3">Step 4</label>
                                    <div class="inputRow">
                                        <input type="text" name="step4" pattern="^[0-9]*$" placeholder="Please Enter a Step 4" onkeypress="return isNumber(event)">
                                        <button type="submit" data-step="{{ optional($itemStatus)->id }}" class="stepSubmitButton"><i class="fas fa-chevron-right"></i></button>
                                    </div>
                                @elseif(optional($itemStatus)->id == 5)
                                    <label for="step5">Step 5</label>
                                    <div class="inputRow">
                                        <input type="hidden" name="step5" value="Test 1st Deposit" placeholder="Please Enter a Step 5">
                                        <button type="submit" data-step="{{ optional($itemStatus)->id }}" class="stepSubmitButton"><i class="fas fa-chevron-right"></i></button>
                                    </div>
                                @elseif(optional($itemStatus)->id == 66)
                                    <label for="step5">Step 6</label>
                                    <div class="inputRow">
                                        <input type="text" name="step6" pattern="^[0-9]*$" placeholder="Please Enter a Step 6" onkeypress="return isNumber(event)">
                                        <button type="submit" data-step="{{ optional($itemStatus)->id }}" class="stepSubmitButton"><i class="fas fa-chevron-right"></i></button>
                                    </div>
                                @elseif(optional($itemStatus)->id == 7)
                                    <label for="step7">Step 7</label>
                                    <div class="inputRow">
                                        <input type="text" name="step7" placeholder="Please Enter a Step 7">
                                        <button type="submit" data-step="{{ optional($itemStatus)->id }}" class="stepSubmitButton"><i class="fas fa-chevron-right"></i></button>
                                    </div>
                                @elseif(optional($itemStatus)->id == 8)
                                    <label for="step8">Step 8</label>
                                    <div class="inputRow">
                                        <input type="hidden" name="step8" value="Test Invoice paid" placeholder="Please Enter a Step 8">
                                        <button type="submit" data-step="{{ optional($itemStatus)->id }}" class="stepSubmitButton"><i class="fas fa-chevron-right"></i></button>
                                    </div>
                                @elseif(optional($itemStatus)->id == 9)
                                    <label for="step9">Step 9</label>
                                    <div class="inputRow">
                                        <input type="text" name="step9" placeholder="Please Enter a Step 9">
                                        <button type="submit" data-step="{{ optional($itemStatus)->id }}" class="stepSubmitButton"><i class="fas fa-chevron-right"></i></button>
                                    </div>
                                @elseif(optional($itemStatus)->id == 10)
                                    <label for="step10">Step 10</label>
                                    <div class="inputRow">
                                        <input type="text" name="step10" placeholder="Please Enter a Step 10">
                                        <button type="submit" data-step="{{ optional($itemStatus)->id }}" class="stepSubmitButton"><i class="fas fa-chevron-right"></i></button>
                                    </div>
                                @elseif(optional($itemStatus)->id == 11)

                                @endif

                            </form>

                        </div>
                        <script>
                            $('.skShow').click(function(){

                                // $('.skurlinput'+$(this).data('id')).show();
                                $('.skurlinputbutton'+$(this).data('id')).show();
                                $('.skurllink'+$(this).data('id')).hide();
                            })


                            $(".stepSubmitButton").click(function(e){
                                e.preventDefault();

                                $(this).prop('disabled', true);
                               $(this).html('<i class="fas fa-spinner fa-pulse"></i>');
                                // $(this).html('Update URL');

                                var step = $(this).data('step');
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
                                    $(this).prop('disabled', true);
                                    return true;
                                }else{
                                    $(this).prev().css("border", "2px solid red");
                                    $(this).prop('disabled', false);
                                    $(this).html('Add URL');
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
                        </script>
                    </div>
                    @endforeach
                @endif

            @endforeach
        @endforeach
    </div>
<div class="modal fade bd-example-modal-lg" id="tourpackModal" tabindex="-1" role="dialog" aria-labelledby="addFolderModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 1000px;">
        <div class="modal-content tourpackModalAppendCls">

        </div>
    </div>
</div>
<div class="modal fade bd-example-modal-lg" id="hotelDatesModal" tabindex="-1" role="dialog" aria-labelledby="addFolderModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 1000px;">
        <div class="modal-content hotelDatesModalAppendCls">

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
<div class="modal fade bd-example-modal-lg" id="disabledGuestList" tabindex="-1" role="dialog" aria-labelledby="addFolderModalTitle" aria-hidden="true" style="overflow-y: auto;">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 900px;">
        <div class="modal-content">
            <h3>Tracking 1 needs to be completed to access guest list.</h3>
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
        <script type="text/javascript">
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
             var curreny_symbol = '<?=$currency_symbol?>';
            // $(".tourCancelButton").bind("click", function(){
    $(document).on('click', '#downloadBrochureImage', function(e) {
        e.preventDefault();
        var exp_id = $(this).attr('data-id');
        var cart_exp_id = $(this).attr('data-cart-id');
        var rate_pp_new = $(this).parent().parent().find('#rate_pp_new').val();
        var srs_pp_new = $(this).parent().parent().find('#srs_pp_new').val();
        var brochure_tel = $(this).parent().parent().find('#brochure_tel').val();
        var brochure_email = $(this).parent().parent().find('#brochure_email').val();
        //var dates_rates_id = $(this).attr('dates_rates_id');
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
                //$('#rate_pp_new').val('');
                //$('#srs_pp_new').val('');
            },
            error: function(e) {
            }
        });   
    });


$("body").on("click", '.editTracking', function(e) {
    $(this).closest(".tab_content").find(".tourOverviewButton").click();
});
$("body").on("click", '.editGuestList123', function(e) {
    $(this).closest(".tab_content").find(".tourOverviewButton").click();
});
$("body").on("click", '.copyBtn', function(e) {
    var $url = $(this).closest('span').find('.copyURL');
    $url.focus();
    $url.select();
    document.execCommand("copy");
    $(this).text("URL copied!");
});

$('.copy_text').click(function (e) {
   e.preventDefault();
   var copyText = $(this).attr('href');

   document.addEventListener('copy', function(e) {
      e.clipboardData.setData('text/plain', copyText);
      e.preventDefault();
   }, true);

   document.execCommand('copy');  
   console.log('copied text : ', copyText);
   alert('copied text: ' + copyText); 
 });
$("body").on("click", '#chkTerm', function(e) {
    if ($("#chkTerm").prop('checked') == true) {
        $('.showHideDiv').css('visibility', 'visible');
        
    }else{
        $('.showHideDiv').css('visibility', 'hidden');
        
    }
});
$("body").on("click", '.showHideExep', function(e) {
    e.preventDefault();
    var dataType = $(this).attr('data-type');
    var dataId = $(this).attr('data-id');
    $(this).closest('.infoBox').hide();
    $('.'+dataType).show();
});
    $(document).on('click', '.tourCancelButton', function() {
        var cartExperienceId = $(this).attr("id");

          /*var txt;
          var r = confirm("Click Ok to Cancel Booking.");
          if (r == true) {
            // alert(cartExperienceId);
            // txt = "You pressed OK!";
            $.ajaxSetup({ headers: {'X-CSRF-TOKEN': '{{csrf_token()}}'}});
            $.ajax({
                type: "POST",
                // cache: false,
                url: '{{ route('cancel-booking.ajax') }}',
                data: { 'cart_experiences_id': cartExperienceId},
                success: function (data) {
                    // alert('success');
                    location.reload();
                },
                error: function(er){
                    console.log(er);
                }
            });
          } else {
            // alert('No');
            // txt = "You pressed Cancel!";
          }*/
        $('.cancellationReasonsCartId').val(cartExperienceId);
        $.fancybox.open(
            //$("#bookingFormBox-"+cartExperienceId).html() , {
            $("#tourOverviewModalCancel").html() , {
                closeExisting: true,
                touch: false
            }
        );
       

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
    addPaymentModeValidateOpt = {
        rules: {
            'sdada': {
                required: true,
            },
            'cancellation_reasons_id': {
                required: true,
            }

        },
        errorElement: 'div',
        messages: {
            'sdada': {
                required: "Please select reasons",
            },
            'cancellation_reasons_id': {
                required: "Please select reasons",
            }
        },
        errorPlacement: function(error, element) {
            error.insertAfter($(element));
        },
        submitHandler: function(form) {
            alert('success');
            return false;
        },
    }
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
        // $('#CancellationReasonsFrom').validate(addPaymentModeValidateOpt);

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
    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    }
    
    $("body").on("click", '.copyLink', function(e) {
        var $temp = $("<input>");
        var $url = $(this).data('href');
        $("body").append($temp);
        $temp.val($url).select();
        document.execCommand("copy");
        $temp.remove();
        $(this).text("Copied!");
    });
    
    $("body").on("click", '.docusignStepCls', function(e) {
        // $('.docusignStepLinkCls').trigger('click');
        var urls = $(this).closest('._docusignStepCls').attr('data-urls');
        var datatab = $(this).closest('._docusignStepCls').attr('data-tab');
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
                $('#hotelDatesModal').modal('show');
                // alert('123');
            },
            error: function(e) {
            }
        });
    }).on('click', '.sendAlert', function(e) {
        e.stopPropagation();
    });
    
    $("body").on("click", '.downloadPDF', function(e) {
        // $('.docusignStepLinkCls').trigger('click');
        var downloadurl = $(this).closest('._docusignStepCls').attr('data-downloadurl');
        parent.jQuery.fancybox.close();
        var hotelId = $(this).closest('._docusignStepCls').val();
        var dataId = $(this).closest('._docusignStepCls').attr('data-id');
        $('.loader').show();    
        $.ajax({
            url: downloadurl,
            type: 'POST',
             // dataType: 'json',
            data: {'hotel_id':hotelId, 'dataId':dataId},
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
    }).on('click', '.sendAlert', function(e) {
        e.stopPropagation();
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
                window.location.href = base_url+'/acc-collaborator';
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
    $("body").on("click", '.downloadAssets', function(e) {
        var urls = $(this).attr('data-url');
         var attrs = $(this).attr('data-attr');
        $('.loader').show();    
        alert('These assets can take up to 15 minutes to download, please return shortly!');
       // $('.download-images-alert').show();    
        $.ajax({
            url: urls,
            type: 'POST',
            success: function(data) {
                //$('.download-images-alert').hide();  
                $('.loader').hide();
               // window.location.href = base_url+'/printassets.zip';
                if(data == 1)
                {
                    window.location.href = base_url+'/download_zip/'+attrs+'.zip'; 
                }
                else
                {
                    alert("No images found.");
                }
                
            },
            error: function(e) {
            }
        });
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
            }else{
                toastError(data.message);
            }
        });
    });
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
     //Add note
     $("body").on("click","ul.notestabs > li", function() {
        var href = $(this).attr("href");
        var ccc = $(this).closest(".tour_summary_container");
        ccc.find(".notes_tab_content").hide();
        ccc.find("ul.notestabs li").removeClass('active');
        ccc.find(href).show();
        $(this).addClass('active');
    });
         $("body").on("click", '#add_notes_popup', function(e) {
        var cartExperienceId = $(this).data("id");
        var user_type = $(this).data("user_type");
        var category = $(this).data("cat");

        //$("#fancybox_add_"+cartExperienceId+"_"+category).find('#user_type').val(user_type);
         $("#fancybox_add_"+cartExperienceId+"_1").find('#category').val(category);
        $.fancybox.open(
        //$("#bookingFormBox-"+cartExperienceId).html() , {
        $("#fancybox_add_"+cartExperienceId+"_1").html() , {
            closeExisting: false,
            touch: false,
            width:800,
            height:500,
            autoSize : false
        }
    );
    });  
         //$('#ajax-file-upload').submit(function(e) {
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

                    $('#tab_id_'+cart_id).html('');
                    $('#tab_id_'+cart_id).html(data);


                   /* var initials = $('#initials').val('');
                    var category = $('#category').val('');
                    var note = $('#notes').text('');
                    var cart_id = $('#cart_id').val('');*/
                }
           });
        }

        
    });
    
    $("body").on("click", '.delete-note', function(e) {     
        if($(this).hasClass('selected-delete'))
        {
            $(this).removeClass('selected-delete');
        }
        else
        {
            $(this).addClass('selected-delete');
        }
        
    });  
    $("body").on("click", '#general_notes', function(e) {  
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
                    $('#tab_id_'+cart_id).html('');
                    $('#tab_id_'+cart_id).html(data);
                }
           });
    });    
        
    $("body").on("click", '#ame_notes', function(e) {  
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
                    $('#tab_id_'+cart_id).html('');
                    $('#tab_id_'+cart_id).html(data);
                }
           });
    });  
        </script>