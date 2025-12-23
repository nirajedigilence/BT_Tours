<style type="text/css">
    .download-data p {
    margin-top: 10px;
    margin-bottom: 0;
}
</style>
@foreach($items as $key => $cartItem)
            @foreach($cartItem->cartExperiences as $item)
        <?php /* @foreach($cartItem->cartExperiences as $item) */?>
        <?php
        $rooms_ppl = 0;
            $rooms_sold = 0;
           
            $d_cnt = (!empty($item->driver_name) && ($item->driver_room_type == '2' || $item->driver_room_type == '3'))?'1':'0';
                            $s_cnt = ($item->driver_room_type == '1')?'1':'0';
       if($item->id == $cart_exp_id)
       {
        if($item->completed == 1){
            continue;
        }
        if($item->cancel_status == 1){
            continue;
        }
        $cancellation_days = array(0); 
        if(!empty($item->dates_rates_id)){
            $experience_dates = 


DB::connection('mysql_veenus')->table('experience_dates')->where('dates_rates_id', $item->dates_rates_id)->where('experiences_id', $item->experiences_id)->where('deleted_at', null)->get()->toArray();
            $experience = 


DB::connection('mysql_veenus')->table('experiences')->where('id', $item->experiences_id)->where('deleted_at', null)->first();
            $canx_days = $experience->can_deadline;
            if(!empty($experience_dates)){
                foreach ($experience_dates as $key => $value) {
                    $cancellation_days[] = $value->cancellation_days;
                }
            }
        }
        ?>
            <div class="bookingForm" id="rightColInfo-{{ $item->id }}">
                

                <div class="tourInfoCont">
                    <div class="infoBox">
                        <span class="left">Date Booked</span>
                        <span class="right">{{ date('d/m/Y', strtotime($cartItem->finalized_at)) }}</span>
                    </div>
                    <div class="infoBox">
                        <span class="left">Cruise Date</span>
                        <span class="right">{{ date('d/m/Y', strtotime($item->date_from)) }}</span>
                    </div>
               
                    
                   
                </div>
               
                {{--                {{ date_diff(new \DateTime($item->tourStatuses->last()->pivot->due_date), new \DateTime())->format("%m Months, %d days") }}--}}
                <!-- <button data-id="{{ $item->id }}" id="tourOverviewButton-{{ $item->id }}" class="orangeLink tourOverviewButton" href="">Tour Overview</button> -->
               <?php if (Auth::check() && (Auth::user()->hasRole("Super Admin") || Auth::user()->hasRole("Collaborator")) ){ ?>
               <a target="_blank" href="/tour-overview-cruise/{{$item->id}}" class="orangeLink">
                  Tour Overview
                </a>
               <!--  <a class="orangeLink" data-fancybox="" data-type="ajax" data-src="" href="/cruise-docusign/{{$item->id}}" >CBC</a> -->
            <?php }?>
               <?php /* <button class="orangeLink" style="display:none;">
                     @if(optional($item->tourStatuses->last())->id == 1)
                     @elseif(optional($item->tourStatuses->last())->id == 2)
                        Exp Tour Confirmation
                     @elseif(optional($item->tourStatuses->last())->id == 3)
                       <!--  @if(!empty($item->tourStatuses[1]->pivot->url))
                                
                                <a class="orangeLink" href="<?=$item->tourStatuses[1]->pivot->url?>" target="_blank">URL</a> 
                            @else
                                <a class="orangeLink" href="javascript:void(0)" onclick="return alert('No URL for this tour');">URL</a> 
                            @endif -->
                     URL
                     @elseif(optional($item->tourStatuses->last())->id == 4)
                        Tracking 1
                     @elseif(optional($item->tourStatuses->last())->id == 5)
                        Tracking 2
                     @elseif(optional($item->tourStatuses->last())->id == 6)
                        Deposit
                     @elseif(optional($item->tourStatuses->last())->id == 7)
                        Tracking 3
                     @elseif(optional($item->tourStatuses->last())->id == 8)
                        Guest List
                     @elseif(optional($item->tourStatuses->last())->id == 9)
                        Invoice
                     @elseif(optional($item->tourStatuses->last())->id == 10)
                        Tour Pack
                     @elseif(optional($item->tourStatuses->last())->id == 11)
                        Tour Review
                     @endif
                 </button> */?>
                
                
            <?php if(!empty($item->cart_map_url)){ ?>
                <!-- <a target="_blank" href="{{$item->cart_map_url}}" class="orangeLink">
                  Itinerary Map
                </a> -->
                <?php }?>
                
                <!-- <a target="_blank" href="/experience/{{$item->experiences_id}}/?map=yes/#display_map" class="orangeLink">
                  View on Map
                </a> -->
                 <?php if (Auth::check() && (Auth::user()->hasRole("Super Admin")) ){ ?>
                <?php 
                    $is_hotel_assieged = 0;
                        $hotel_cart_list =  


DB::connection('mysql_veenus')->table('cart_experiences as c')->selectRaw('c.id as cart_id')
                                ->leftjoin('cart_experiences_to_tour_statuses as cs', 'cs.cart_experiences_id', '=', 'c.id')
                                ->where('c.id', $item->id)
                                ->where('c.completed','!=','1')
                                ->where('cs.tour_statuses_id', '1')->where('cs.sign_name','!=', null)->get()->toArray();
                             
                             
                             if(!empty($hotel_cart_list)) 
                             {
                                if (Auth::check() && (Auth::user()->hasRole("Super Admin")) ){
                                    ?>
                                     <a onclick="return confirm('Are you sure you want to reset?')" href="/reset-tour/{{$item->id}}" class="orangeLink">
                                      Reset
                                    </a>
                                    <?php
                                }
                                else
                                {
                                     ?>
                                     <a onclick="return confirm('Are you sure you want to reset?')" href="/admin/reset-tour/{{$item->id}}" class="orangeLink">
                                      Reset
                                    </a>
                                     <?php
                                }
                                    ?>

               
            <?php }  ?>
             <?php }?><!-- Super user -->
             <?php if (Auth::check() && (Auth::user()->hasRole("Admin")) ){ ?>
             <a onclick="return confirm('Are you sure you want to refresh this tour?')" href="/admin/refresh-tour/{{$item->id}}" class="orangeLink">
                  Refresh Tour
                </a>
            <?php } ?>
            </div>
            <?php 
                $brochures_data = 


DB::connection('mysql_veenus')->table('brochures_booked_tour')->where('cart_exp_id',$item->id )->first(); 

                if(!empty($brochures_data)){
                    $brochures = $brochures_data;    
                }
                else
                {
                   $brochures = 


DB::connection('mysql_veenus')->table('brochures')->where('experience_id',$item->experiences_id )->first(); 
                }
                    
                ?>
            <div class="modal fade" id="buttonsModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel{{$item->id}}" aria-hidden="true">
                  <?php 
                     $cart_experience1 = 


DB::connection('mysql_veenus')->table('cart_experiences')->where("id", $item->id)->first();
                    if(!empty($cart_experience1)){
                        $cart_experiences = 


DB::connection('mysql_veenus')->table('experiences')->where('id', $cart_experience1->experiences_id)->first();
                    }
                ?>
    			  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel{{$item->id}}">Assets</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <!-- <div class="modal-body">
                        <button class="btn btn-warning downloadAssets" data-attr1="{{(isset($cart_experiences1->experience_name) ? $cart_experiences1->experience_name : 'Veenus')}}" data-attr="{{(isset($cart_experiences->name) ? 'WEB-'.$cart_experiences->name : 'WEB-'.'Veenus')}}" data-url="{{ route('download-assets', $item->id) }}" style="background: orange;color: #fff;border-color: orange;font-weight: bold;">Download Web Images</button>
                        <button class="btn btn-warning downloadAssets" data-attr1="{{(isset($cart_experiences1->experience_name) ? 'PRINT-'.$cart_experiences1->experience_name : 'PRINT-'.'Veenus')}}" data-attr="{{(isset($cart_experiences->name) ? 'PRINT-'.$cart_experiences->name : 'PRINT-'.'Veenus')}}" data-url="{{ route('download-print-assets', $item->id) }}" style="background: orange;color: #fff;border-color: orange;font-weight: bold;">Download Print Images</button>
                        <a class="btn btn-warning" href="{{ route('download-doc', $item->id) }}" style="background: orange;color: #fff;border-color: orange;font-weight: bold;margin-top: 10px;">Download Document</a>
                        
    					
    					<a class="btn btn-warning" href="javascript:;" data-toggle="modal" data-target="#brochurDownload{{ $item->id }}" data-id="{{ $item->id }}" id="downloadBrochurePrice" data-dismiss="modal" style="background: orange;color: #fff;border-color: orange;font-weight: bold; margin-top: 10px;">Download Brochure</a>
                      </div> -->
                      <div class="modal-body">
                        <div class="row download-data">
                            <div class="col-md-6">
                                <p><b>Hotel</b></p>
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


DB::connection('mysql_veenus')->table('hotels')->selectRaw('id,name,address,contact_number,contact_name')->whereRaw('name like "%'.trim($hotel).'%" ')->first();
                                        $hotel_name =  array();
                                        if(!empty($hotel_detail))
                                        {
                                            $hotel_name[] = $hotel_detail->name;
                                        ?>
                                <p>{{!empty($hotel_detail->name)?$hotel_detail->name:''}}</p>
                               <!--  <a href="#" class="" style="color:#FCA311;">Downloads</a> -->
                               <button class="downloadAssets" data-attr1="{{(isset($cart_experiences1->experience_name) ? $cart_experiences1->experience_name : 'Veenus')}}" data-attr="{{(isset($hotel_detail->name) ? 'Veenus-'.$hotel_detail->name : 'WEB-'.'Veenus')}}" data-url="<?=URL('download-hotel-assets/'.$hotel_detail->id.'/'.$item->id)?>" style="color:#FCA311;">Download</button>
                                <?php } } }?>
                            </div>
                            <div class="col-md-6">
                                <p><b>Write up</b></p>
                                <p>Word documents</p>
                                <a  href="{{ route('download-doc', $item->id) }}" style="color:#FCA311;">Download</a>
                                
                            </div>
                            <div class="col-md-6">
                                <p><b>Experiences</b></p>
                                 <?php
                                        $cnt = 1;
                                        foreach ($item->experiencesToAttraction as $keyEE => $_valueEE) { 
                                             $valueEE = 


DB::connection('mysql_veenus')->table('attractions')->where("id", $_valueEE->attractions_id)->first();
                                         ?>
                                <p>{{ $valueEE->name }}</p>
                                
                                 <button class="downloadAssets" data-attr="{{(isset($valueEE->name) ? 'Veenus-'.$valueEE->name : 'WEB-'.'Veenus')}}" data-url="<?=URL('download-experience-assets/'.$valueEE->id.'/'.$item->id)?>" style="color:#FCA311;">Download</button>
                                 <?php 
                                            $cnt++;
                                        } ?>
                            </div>
                            <?php $brochures = 


DB::connection('mysql_veenus')->table('brochures')->where('experience_id',$item->experiences_id )->first();

                            if(!empty($brochures->textarea_1) || !empty($brochures->textarea_2) || !empty($brochures->textarea_3)){ ?> 
                             <div class="col-md-6">
                                <p><b>{{!empty($brochures_data)?'Brochure (Amended)':'Brochure'}}</b></p>
                                <p>Brochure image</p>
                                <a class="" href="javascript:;" data-toggle="modal" data-target="#brochurDownload{{ $item->id }}" data-id="{{ $item->id }}" id="downloadBrochurePrice" data-dismiss="modal" style="color:#FCA311;">Download</a>
                                <?php  if (Auth::check() && (Auth::user()->hasRole("Super Admin")) ){ ?>
                                 <a class="" style="color:#FCA311;margin-left: 10px;" data-fancybox data-type="ajax" data-src="" href="{{ route('edit-brochure', $item->id) }}" id="reloadInfo{{$item->id}}">Edit brochure</a>
                                <?php } ?>
                               
                            </div>
                             <?php } ?>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
            </div>
            <div class="modal fade downloadBrochurePriceContent" id="brochurDownload{{ $item->id }}"  tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
				
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="">Add Prices and Contact Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p>Please enter the tour Sharing price pp and the Single price pp.</p>
                   <div class="row">
                        <div class="col-sm-6"><input type="text" id="rate_pp_new" class="form-control 678" name="step9[rate_pp]" value="{{(isset($brochures->rate_pp) ? $brochures->rate_pp : '')}}"placeholder="Sharing price pp"></div>
                        <div class="col-sm-6"><input type="text" id="srs_pp_new" class="form-control" name="step9[srs_pp]" value="{{(isset($brochures->srs_pp) ? $brochures->srs_pp : '')}}" placeholder="Single price pp"></div>
						
                    </div>
					<br/>
					<p>Please enter your telephone number and email address to show on the Brochure.</p>
					 <div class="row">
                        <div class="col-sm-6"><input type="text" id="brochure_tel" class="form-control 456" name="brochure_tel" value="" placeholder="Telephone Number"></div>
                        <div class="col-sm-6"><input type="email" id="brochure_email" class="form-control" name="brochure_email" value="" placeholder="Email"></div>
						
                    </div>
                  </div>
                  <div class="modal-footer">
                     <a class="btn btn-warning" href="#" style="background: orange;color: #fff;border-color: orange;font-weight: bold;" data-id="{{ $item->experiences_id }}" data-cart-id="{{ $item->id }}" id="downloadBrochureImage">Preview</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
        <?php } ?>
    @endforeach
    @endforeach