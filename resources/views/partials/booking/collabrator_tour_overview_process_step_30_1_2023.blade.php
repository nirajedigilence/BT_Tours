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
</style>
@foreach($items as $key => $cartItem)
            @foreach($cartItem->cartExperiences as $item)
                <?php 
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
                                 $rooms_ppl = $rooms_ppl+1;
                                $rooms_sold = $rooms_sold+1;
                                if(!empty($value->names)){
                                    $names = array_filter(explode(',', $value->names));
                                    //$rooms_ppl  = $rooms_ppl+count($names);
                                }
                            }
                        }
                        $guest_list_due_date = '';
                    ?>
        <div class="notIndexContainer"  id="tourOverviewModal-{{ $item->id }}">
            <div class="tour_summary_container">
                    
                    <div class="tab_content">
                    <div class="intro">

                        <div class="heading">
                            {{ $item->experience_name }}
                        </div>

                        <p>
                            <strong>{{ $item->hotel_name }}</strong>
                            {{ date("D d M", strtotime($item->date_from)) }} - {{ date("D d M 'y", strtotime($item->date_to)) }} ( {{ $item->nights }} @if($item->nights > 1) nights @else night @endif )
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
                                    <div class="todo @if($its->id == '1') _docusignStepCls @elseif($its->id == '9') tourPackBox @elseif($its->id == '2') stepItemSquareActive @elseif($its->id == '7') editGuestList @elseif( $its->id == '3' || $its->id == '4'|| $its->id == '6' || $its->id == '5' || $its->id == '8' || $its->id == '9'|| $its->id == '7') stepItemSquareActive  @endif @if($its->pivot->completed == 1) completed @elseif($its->pivot->due_date < Carbon\Carbon::now()) overdue @endif @if($item->tourStatuses->last()->id == $its->id)) active @endif"  data-id=" @if($its->id != '10'){{ $item->id }}@else  @endif" data-step="{{ $its->id }}" id="reloadInfo{{$item->id}}"  data-urls="{{ route('change-docusign', $item->id) }}" data-downloadurl="{{ route('download-etc-pdf-coll', $item->id) }}" data-tour="{{ route('show-tourpack', $item->id) }}" data-tab="collaborator" <?php echo $style; ?>>

                                            <div class="tick"></div>

                                            <div class="intro">
                                                <span>{{ $its->name }}</span>
                                                <span class="due_date">@if($its->pivot->completed == 1) completed at {{ date('d/m/Y', strtotime($its->pivot->completed_at)) }} @else due {{ date('d/m/Y', strtotime($its->pivot->due_date)) }} @endif</span>
                                                <span>@if($its->pivot->completed == 1) COMPLETED @elseif($its->pivot->due_date < Carbon\Carbon::now()) <span style="color:red;">OVERDUE</span> @else NOT COMPLETE @endif</span>
                                                <?php
                                                $experience_dates_rates = 


DB::connection('mysql_veenus')->table('experience_dates_rates')->where('id', $item->dates_rates_id)->where('deleted_at', null)->first();
                                                if(!empty($experience_dates_rates) && $its->id == 5){
                                                    echo '<span>&pound;'.$experience_dates_rates->deposit.'</span>';
                                                }
                                                ?>
                                            </div>
                                            <?php 
                                                 if($its->id == '7') { $guest_list_due_date = date('Y-m-d', strtotime($its->pivot->due_date)); } 
                                                 ?>
                                            <div class="excerpt">
                                                <p>
                                                   <!--  @if($its->id == 1)
                                                        @if($its->pivot->completed == 1){{ $its->pivot->sign_name }}@else  @endif
                                                    @elseif($its->id == 2)
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
                                                        @if($its->pivot->completed == 1){{ $its->pivot->step8 }}@else  @endif
                                                    @elseif($its->id == 9)
                                                        @if($its->pivot->completed == 1)
                                                        <!-- <a target="_blank" href="{{-- $its->pivot->step9 --}}"><i class="fas fa-file-pdf fa-2x" style="color: #FCA311;"></i></a> -->
                                                        <a href="javascript:;"><i class="fas fa-file-pdf fa-2x" style="color: #FCA311;"></i></a>
                                                        @else 
                                                        <a href="javascript:;"><i class="fas fa-file-pdf fa-2x" style="color: #FCA311;"></i></a>
                                                         @endif
                                                    @elseif($its->id == 10)
                                                        @if($its->pivot->completed == 1){{ $its->pivot->step10 }}@else  @endif
                                                    @endif -->
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
                                                <div class="text-center">Pax: <strong>{{$rooms_ppl+$d_cnt}} <?php echo ($item->driver_name != '' && $item->driver_name1 != '') ? '+ 2 Dr' : (($item->driver_name != '') ? '+ 1 Dr' : ''); ?></strong></div>
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
                                                            @else
                                                                @if(empty($userdata['turn_off_sign_doc']) && !empty($userdata['parent_user']))
                                                                @else
                                                                <a href="javascript:;" class="cta docusignStepCls">sign</a>
                                                                <a target="_blank" href="/etc_document/<?=$item->id?>" class="cta">Download</a>
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
                                                    <a href="javascript:;" data-href="{{route('tourReview', $item->id)}}" class="cta copyLink">copy link</a>
                                                    <a target="_blank" href="{{route('tourReview', $item->id)}}" class="cta completeReview">complete review</a>
                                                   <!-- <a href="javascript:;" class="cta" data-tab="collaborator">edit</a>-->
                                                    @elseif($its->id != '9')
                                                    <a href="javascript:;" class="cta @if($its->id == '3' || $its->id == '4' || $its->id == '6') editTracking @elseif($its->id == '7') editGuestList123 @endif">@if($its->id == '7') Guest List @else edit @endif</a>
                                                    @if($its->id == '3' || $its->id == '4'  || $its->id == '6' )
                                                    <?php if($its->pivot->completed != 1 && (!empty($sngtotal) || !empty($dbltotal) || !empty($twntotal))) { ?>
                                                    <a href="javascript:;" class="cta">Completed</a>
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
                                                        echo '<span>&pound;'.$experience_dates_rates->deposit.'</span>';
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
                                         foreach ($item->experiencesToAttraction as $keyEE => $_valueEE) { 
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
                                                <div class="text-center">Pax: <strong>{{$rooms_ppl+$d_cnt}}<?php echo ($item->driver_name != '' && $item->driver_name1 != '') ? '+ 2 Dr' : (($item->driver_name != '') ? '+ 1 Dr' : ''); ?></strong></div>
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
                                                        &pound;0pp
                                                    </div>

                                                </div>

                                                <div class="row">

                                                    <div class="label">
                                                        <strong>Hotel Upgrades:</strong> None
                                                    </div>

                                                    <div class="price">
                                                        &pound;0pp
                                                    </div>

                                                </div>

                                                <div class="row">

                                                    <div class="label">
                                                        <strong>Upscales:</strong> 1881 Distillery & Gin School
                                                    </div>

                                                    <div class="price">
                                                        &pound;0pp
                                                    </div>

                                                </div>

                                                <div class="totals">

                                                    <div class="row">

                                                        <div class="price">
                                                            Total: &pound;0pp
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
                                                        <span>&pound;</span>
                                                        <input type="text" id="transfer_cost" class="calculate_cost" value="0" />
                                                    </div>

                                                </div>

                                                <div class="row">

                                                    <div class="label">
                                                        <strong>Cost of coach per day:</strong>
                                                    </div>

                                                    <div class="input_wrapper">
                                                        <span>&pound;</span>
                                                        <input type="text" id="per_day_price" class="calculate_cost" value="0" />
                                                    </div>

                                                </div>

                                                <div class="row">

                                                    <div class="label">
                                                        <strong>Total cost:</strong>
                                                    </div>

                                                    <div class="total_cal_price price">
                                                        &pound;0pp
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
                                                        &pound;0pp
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
            // $(".tourCancelButton").bind("click", function(){
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
                    window.location.href = base_url+'/'+attrs+'.zip';
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
        $('.total_cal_price').text('£'+total_amount);
        total_mar_amt = (total_amount*added_margin)/100;
        total_price = total_mar_amt+total_amount;
    }
    $('.total_price').text('£'+total_price);
    
    
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