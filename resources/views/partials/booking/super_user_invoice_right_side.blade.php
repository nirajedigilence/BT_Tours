@foreach($items as $key => $cartItem)
            @foreach($cartItem->cartExperiences as $item)
        <?php /* @foreach($cartItem->cartExperiences as $item) */?>
        <?php
        
       if($item->id == $cart_exp_id)
       {
        $currency_symbol = getCurrency($cart_exp_id);
        /*if($item->completed == 1){
            continue;
        }*/
        if($item->cancel_status == 1){
            continue;
        }
        $cancellation_days = array(0); 
        if(!empty($item->dates_rates_id)){
            $experience_dates = 


DB::connection('mysql_veenus')->table('experience_dates')->where('dates_rates_id', $item->dates_rates_id)->where('experiences_id', $item->experiences_id)->where('deleted_at', null)->get()->toArray();
            
            if(!empty($experience_dates)){
                foreach ($experience_dates as $key => $value) {
                    $cancellation_days[] = $value->cancellation_days;
                }
            }
        }
         $cart_extra_invoice = 


DB::connection('mysql_veenus')->table('cart_experiences_extra_invoices')->where("cart_exp_id", $item->id)->get();
        ?>
         <?php  $cartExeToDeposit = 


DB::connection('mysql_veenus')->table('cart_experiences_to_tour_statuses')->where("cart_experiences_id", $item->id)->where('tour_statuses_id', '5')->where('completed', '1')->first();
          $cartExeToInvoice = 


DB::connection('mysql_veenus')->table('cart_experiences_to_tour_statuses')->where("cart_experiences_id", $item->id)->where('tour_statuses_id', '8')->where('completed', '1')->first();  ?>
            <div class="bookingForm" id="rightColInfo-{{ $item->id }}">
                <span class="headingS">Tour Status</span>
                <span class="headingLLL">{{ optional($item->tourStatuses->last())->percent-10 }}%</span>
                <span class="headingS3"> @if(optional($item->tourStatuses->last())->id == 1)
                                         @elseif(optional($item->tourStatuses->last())->id == 2)
                                            Exp Tour Confirmation
                                         @elseif(optional($item->tourStatuses->last())->id == 3)
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
                                     </span>

                <div class="tourInfoCont">
                    <div class="infoBox">
                        <span class="left">Date Booked</span>
                        <span class="right">{{ date('d/m/Y', strtotime($cartItem->finalized_at)) }}</span>
                    </div>
                    <div class="infoBox">
                        <span class="left">Total Deposit</span>
                        <span class="right">{{$currency_symbol}}<?=!empty($item->xero_deposit_amount)?$item->xero_deposit_amount:(($item->currency == 2)?$experience_rate_dates->deposit_euro:$experience_rate_dates->deposit)?></span>
                    </div>
                    <div class="infoBox">
                        <span class="left">Total Invoice</span>
                        <span class="right"><?=!empty($item->xero_amount)?$currency_symbol.$item->xero_amount:'---'?><span>
                    </div>
                    @if(!empty($cartExeToDeposit))
                    <div class="infoBox">
                        <span class="left">Deposit<?=!empty($item->xepo_deposit_paid)?'(paid)':'(sent)'?></span>
                        <span class="right" style="text-align: right;"><?=!empty($item->xero_deposit_amount)?$currency_symbol.$item->xero_deposit_amount:$currency_symbol.'0.00'?></span>
                    </div>
                    @endif
                    @if(!empty($item->xero_invoice_id))
                    <div class="infoBox">
                        <span class="left">Invoice 1 <?=!empty($item->xepo_invoice_paid)?'(paid)':'(sent)'?></span>
                        <span class="right"  style="text-align: right;"><?=!empty($item->xero_amount)?$item->xero_amount:'---'?></span>
                    </div>
                    @endif
                    <?php
                    $i = 2;
                            if(!empty($cart_extra_invoice[0]))
                            {
                                
                                foreach($cart_extra_invoice as $erow)
                                {
                                    if(!empty($erow->sent_to_finance))
                                    {
                                    ?>
                                     <div class="infoBox">
                                        <span class="left">Invoice {{$i}} <?=!empty($erow->mark_as_paid)?'(paid)':(!empty($erow->xero_invoice_id)?'(sent)':'(sent to finance)')?></span>
                                        <span class="right"  style="text-align: right;"><?=!empty($erow->xero_amount)?$erow->xero_amount:'---'?></span>
                                    </div>
                                    <?php
                                    $i++;
                                    }
                                    
                                }
                            }
                    ?>
                </div>
               
                {{--                {{ date_diff(new \DateTime($item->tourStatuses->last()->pivot->due_date), new \DateTime())->format("%m Months, %d days") }}--}}
               <!--  <button data-id="{{ $item->id }}" id="tourOverviewButton-{{ $item->id }}" class="orangeLink tourOverviewButton" href="">Tour Overview</button> -->

                
                
                 @if(!empty($item->xero_deposit_invoice_id))
                <a target="_blank" href="{{route('view-invoice', $item->id)}}/?type=deposit" class="orangeLink">
                  Open Deposit Inv in Xero
                </a>
                <!-- <a target="_blank" href="{{route('view-invoice', $item->id)}}/?type=deposit" class="orangeLink">
                  Open/Download Deposit
                </a> -->
                @endif
                @if(!empty($item->xero_invoice_id))
                <a class="cta total orangeLink" data-fancybox data-type="ajax" data-src="" href="/total-supplements-charge-invoice/{{$item->id}}"> Total charges</a>
                <a target="_blank" href="{{route('view-invoice', $item->id)}}/?type=invoice&invoice_id={{$item->xero_invoice_id}}" class="orangeLink">
                   Open Invoice 1 in Xero
                </a>
                
               <!--  <a target="_blank" href="{{route('view-invoice', $item->id)}}/?type=invoice" class="orangeLink">
                  Open/Download Invoice
                </a> -->
                
                @endif
               <!--  <a target="_blank" href="" class="orangeLink">
                  Download
                </a> -->
               
                
                     @if(optional($item->tourStatuses->last())->id == 1)
                     @elseif(optional($item->tourStatuses->last())->id == 2)
                        Exp Tour Confirmation
                     @elseif(optional($item->tourStatuses->last())->id == 3)
                       <!--  @if(!empty($item->tourStatuses[1]->pivot->url))
                                
                                <a class="orangeLink" href="<?=$item->tourStatuses[1]->pivot->url?>" target="_blank">URL</a> 
                            @else
                                <a class="orangeLink" href="javascript:void(0)" onclick="return alert('No URL for this tour');">URL</a> 
                            @endif -->
                            
                     @elseif(optional($item->tourStatuses->last())->id == 4)
                         
                     @elseif(optional($item->tourStatuses->last())->id == 5)
                       
                     @elseif(optional($item->tourStatuses->last())->id == 6)
                         
                     @elseif(optional($item->tourStatuses->last())->id == 7)
                       
                     @elseif(optional($item->tourStatuses->last())->id == 8)
                      @if(empty($cartExeToInvoice))
                         @if(!empty($item->invoice_sent_finance))
                        <!-- <a href="{{route('create-invoice', $item->id)}}/?type=invoice" class="orangeLink">
                          <?=!empty($item->xero_invoice_id)?'Update':'Issue'?> Invoice
                        </a> -->

                         <a class="cta total orangeLink" data-fancybox data-type="ajax" data-src="" href="/view-extra-invoice/{{$item->id}}?invoice_no=1" ><?=!empty($item->xero_invoice_id)?'Update':'Issue'?> Invoice</a>
                        <?php if(empty($item->xero_invoice_id)) { ?>
                         <!-- <a class="orangeLink" data-fancybox data-type="ajax" data-src="" href="/total-invoice-charge/{{$item->id}}">Preview Invoice</a> -->
                        <?php } ?>
                         @endif
                        @endif
                     @elseif(optional($item->tourStatuses->last())->id == 9)
                        
                     @elseif(optional($item->tourStatuses->last())->id == 10)
                        
                     @elseif(optional($item->tourStatuses->last())->id == 11)
                        
                     @endif
                 
                     @if(empty($cartExeToDeposit))
                         @if(!empty($item->deposit_invoice_sent_finance))
                     <a href="{{route('create-invoice', $item->id)}}/?type=deposit" class="orangeLink">
                          <?=!empty($item->xero_deposit_invoice_id)?'Update':'Issue'?> Deposit To Xero
                        </a>
                        @endif
                         @endif
                    <?php
                    if(!empty($item->xepo_invoice_paid))
                    {
                       $cart_rep_rooms = 


DB::connection('mysql_veenus')->table('cart_experiences_to_rooms')->whereIn('room_request_status',['self','approved'])->where("paid", '1')->where("cart_exp_id", $item->id)->where('xero_paid','0')->get()->count();
                       
                        //update room supplements
                       $upgrade_room_count = 


DB::connection('mysql_veenus')->table('cart_experiences_to_rooms_requests')->select('cart_experiences_to_rooms_requests.id')->join('cart_experiences_to_rooms','cart_experiences_to_rooms.id','=','cart_experiences_to_rooms_requests.cart_experiences_to_rooms_id')->where("cart_experiences_to_rooms.cart_exp_id", $item->id)->where('cart_experiences_to_rooms_requests.upgrade_request_sup_status','accepted')->where('cart_experiences_to_rooms_requests.xero_paid','0')->get()->count();

                        //update upgrade supplements
                        $room_supplements_count = 


DB::connection('mysql_veenus')->table('rooms_supplements_requests')->where('upgrade_request_sup_status','accepted')->where('xero_paid','0')->where("cart_id",  $item->id)->get()->count();
                        /* if(!empty($cart_rep_rooms) || !empty($upgrade_room_count) || !empty($room_supplements_count))
                         {*/
                           
                           
                            $i = 2;
                            if(!empty($cart_extra_invoice[0]))
                            {
                                
                                foreach($cart_extra_invoice as $erow)
                                {

                                    if(!empty($erow->xero_invoice_id)){
                                      ?>
                                    
                                    <a target="_blank" href="{{route('view-invoice', $item->id)}}/?type=invoice&invoice_id={{$erow->xero_invoice_id}}" class="orangeLink">
                                          Open Invoice {{$i}} in Xero
                                        </a>
                                    <?php
                                    }
                                    if(!empty($erow->sent_to_finance) && empty($erow->mark_as_paid))
                                    {

                                        ?>
                                        <a class="cta total orangeLink" data-fancybox data-type="ajax" data-src="" href="/view-extra-invoice/{{$erow->id}}?invoice_no={{$i}}" > <?=!empty($erow->xero_invoice_id)?'Update':'Issue'?> Invoice {{$i}}</a>
                                      
                                        <?php
                                    }

                                    ?>
                                    <?php
                                    $i++;
                                }
                                ?>
                                
                                <?php
                            }
                            
                            ?>
                            
                            <?php
                         /*}*/
                    }
                    
                    ?>
            </div>
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
                        <h5 class="modal-title" id="exampleModalLabel{{$item->id}}">Download Assets</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <button class="btn btn-warning downloadAssets" data-attr1="{{(isset($cart_experiences1->experience_name) ? $cart_experiences1->experience_name : 'Veenus')}}" data-attr="{{(isset($cart_experiences->name) ? 'WEB-'.$cart_experiences->name : 'WEB-'.'Veenus')}}" data-url="{{ route('download-assets', $item->id) }}" style="background: orange;color: #fff;border-color: orange;font-weight: bold;">Download Web Images</button>
                        <button class="btn btn-warning downloadAssets" data-attr1="{{(isset($cart_experiences1->experience_name) ? 'PRINT-'.$cart_experiences1->experience_name : 'PRINT-'.'Veenus')}}" data-attr="{{(isset($cart_experiences->name) ? 'PRINT-'.$cart_experiences->name : 'PRINT-'.'Veenus')}}" data-url="{{ route('download-print-assets', $item->id) }}" style="background: orange;color: #fff;border-color: orange;font-weight: bold;">Download Print Images</button>
                        <a class="btn btn-warning" href="{{ route('download-doc', $item->id) }}" style="background: orange;color: #fff;border-color: orange;font-weight: bold;margin-top: 10px;">Download Document</a>
                        
    					
    					<a class="btn btn-warning" href="javascript:;" data-toggle="modal" data-target="#brochurDownload{{ $item->id }}" data-id="{{ $item->id }}" id="downloadBrochurePrice" data-dismiss="modal" style="background: orange;color: #fff;border-color: orange;font-weight: bold; margin-top: 10px;">Download Brochure</a>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
            </div>
            <div class="modal fade downloadBrochurePriceContent" id="brochurDownload{{ $item->id }}"  tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
				<?php 
					$brochures = 


DB::connection('mysql_veenus')->table('brochures')->where('experience_id',$item->experiences_id )->first();	
				?>
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