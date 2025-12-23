<style type="text/css">
	.no-boder{border: none !important;padding: 0px !important;}
input.notClickedCls.hdioCls.form-control.numbercls {
    width: 93%;
    margin-bottom: 5px;
}
.euro_price{
	float: left;
	width: 50%;
}
.pound_price {
	width: 50%;
	float: left;
}
.checkbox_div{font-size: 12px;}
.checkarea_part_Dates{width: unset;}
select.form-control.notClickedCls {
	width: 92%;
}
</style>
 <?php
		$is_hotel_assieged = 0;
			$date_rate_id = $dates_rates->id;
			$selected_currency = $dates_rates->currency;
			$hotel_cart_list =  


DB::connection('mysql_veenus')->table('cart_experiences as c')->selectRaw('c.id as cart_id,currency,c.cancel_reason')
					->leftjoin('cart_experiences_to_tour_statuses as cs', 'cs.cart_experiences_id', '=', 'c.id')
					->where('c.dates_rates_id', $date_rate_id)
					->where('c.completed','!=','1')
					->where('cs.tour_statuses_id', '1')->where('cs.sign_name','!=', null)->get()->toArray();
				 if(!empty($hotel_cart_list)) 
                     {
                        $is_hotel_assieged = 1;
                        $prefer_currency = $hotel_cart_list[0]->currency;
                     }  
                     else
                     {
                        $prefer_currency = !empty($hotel->preferred_currency)?$hotel->preferred_currency:'1';
                     }
                     $hotel_prefer_currency = !empty($hotel->preferred_currency)?$hotel->preferred_currency:'1';
	?>
<div class="notIndexContainer" style="padding-top:0;">
	<div class="tour_confirmation_wrapper" style="padding: 0;">
		<div class="tour_confirmation">

			<div class="logo">
				<img src="{{ asset('images/logo2x.png') }}" alt="Veenus">
			</div>
			<div class="tc_intro">
				<div class="heading">HOTEL CONFIRMATION</div>
			</div>

			<div class="tc_content" style="margin-top: 100px;">
				<form method="post" id="hcForm">
				<div class="tc_boxes">
			<?php if(isset($is_view)){ ?> 
			<div class="tc_box_wrapper">
						<div class="tc_box">

							<div class="header">
								Cancel Reason
							</div>

							<div class="body">

								<p>
									{{ !empty($hotel_cart_list[0]->cancel_reason)?$hotel_cart_list[0]->cancel_reason:'' }}
								</p>

							</div>

						</div>
					</div>
				<?php } ?>
					<div class="tc_box_wrapper">
						<div class="tc_box">

							<div class="header">
								Ref
							</div>

							<div class="body">

								<p>
									{{ !empty($experienceDate->hc_ref_number)?$experienceDate->hc_ref_number:'' }}
								</p>

							</div>

						</div>
					</div>
					
					<div class="tc_box_wrapper">
						<div class="tc_box">

							<div class="header">
								Hotel
							</div>

							<div class="body">

								<div class="hotel">

									<div class="name">
										<?php echo (!empty($hotel) ? $hotel->name : ''); ?>
									</div>

									<div class="stars">
										@if(!empty($hotel))
											@if ( $hotel->stars > 0 )
												@for ($i = 0; $i < $hotel->stars; $i++)
													<i class="fas fa-star"></i>
												@endfor
											@endif
											<?php $stars = (5-$hotel->stars); ?>
											@for ($i = 0; $i < $stars; $i++)
												<i class="far fa-star"></i>
											@endfor
										@endif
									</div>

								</div>

								<?php if(!empty($hotel)){ ?>
									<p>
										Address: <?php
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
													echo implode(', ', $address); ?>
									</p>
								<?php } ?>
							</div>

						</div>
					</div>
					<div class="tc_box_wrapper split">

						<div class="tc_box">

							<div class="header">
								Dates
							</div>

							<div class="body">

								<p>
									{{ date("D d M 'y", strtotime($experienceDate->date_from)) }} - {{ date("D d M 'y", strtotime($experienceDate->date_to)) }}
								</p>

							</div>

						</div>

						<div class="tc_box">

							<div class="header">
								No. of Nights
							</div>

							<div class="body">

								<p>
									{{ $experienceDate->nights }} @if($experienceDate->nights > 1) nights @else night @endif
								</p>

							</div>

						</div>

					</div>
					
				
					<div class="tc_box_wrapper">
						<div class="tc_box">

							<div class="header">
								<div style="width:19%;">Rates & Allocation </div>
								<div style="width:81%;">
								<?php  if(empty($experienceDate->sign_name_hc)){ ?>
								<!--  <select style="padding:5px;width:50%;" class="form-control" name="select_currency" id="select_currency">
									<option value="">Select currency</option>
									<option value="1" <?=(!empty($experienceDate->display_pound_rate))?'selected':''?>>£</option>
									<option value="2" <?=(!empty($experienceDate->display_euro_rate))?'selected':''?>>€</option>
								</select> -->
								<?php } ?>
								</div>
							</div>

							<div class="body">

								<div class="rates_table">

									<div class="rt_row">

										<div class="rt_column label">
											Room Type
										</div>

										<div class="rt_column">
											Single
										</div>

										<div class="rt_column">
											Double
										</div>

										<div class="rt_column">
											Twin
										</div>

										<div class="rt_column">
											Triple
										</div>

										<div class="rt_column">
											Quad
										</div>

										<div class="rt_column">
											Dr
										</div>

									</div>
									<?php
									$sgl = 0;
									$dbl = 0;
									$twn = 0;
									$trp = 0;
									$qrd = 0;
									$sgl_dr = 0;
									$night = '';
									 if(!empty($experienceDate->hotel_date_id))
									{
										$hotel_dates = 


DB::connection('mysql_veenus')->table('hotel_dates')->where('id', $experienceDate->hotel_date_id)->get()->toArray();
										
									}
									else
									{
										
											$hotel_dates = 


DB::connection('mysql_veenus')->table('hotel_dates')->where('hotel_id', $hotel->id)->where('date_in', $experienceDate->date_from)->where('date_out', $experienceDate->date_to)->get()->toArray();
											

									}
								   

									if(!empty($hotel_dates)){
										foreach ($hotel_dates as $key => $value) {

										if( !empty($value->date_in ) ) {	
											if(($value->date_in == $experienceDate->date_from) && ($value->date_out == $experienceDate->date_to)){
												$sgl = number_format($value->sgl,0);
												$dbl = number_format($value->dbl,0);
												$twn = number_format($value->twn,0);
												$trp = number_format($value->trp,0);
												$qrd = number_format($value->qrd,0);
												$sgl_dr = number_format($value->sgl_dr,0);
												$night = $value->night;
												$free_srs = number_format($value->free_srs,0);

												$rate_dbb = number_format($value->rate_dbb,2); 
												$rate_dbl = number_format($value->rate_dbl,2); 
												$rate_twn = number_format($value->rate_twn,2); 
												$rate_trp = number_format($value->rate_trp,2); 
												$rate_qrd = number_format($value->rate_qrd,2); 
												$rate_dr = number_format($value->rate_dr,2); 

												$rate_dbb_euro = number_format($value->rate_dbb_euro,2); 
												$rate_dbl_euro = number_format($value->rate_dbl_euro,2); 
												$rate_twn_euro = number_format($value->rate_twn_euro,2); 
												$rate_trp_euro = number_format($value->rate_trp_euro,2); 
												$rate_qrd_euro = number_format($value->rate_qrd_euro,2); 
												$rate_dr_euro = number_format($value->rate_dr_euro,2); 

												$date_srs = number_format($value->date_srs,2); 
												$date_srs_dbl = number_format($value->date_srs_dbl,2); 
												$date_srs_twn = number_format($value->date_srs_twn,2); 
												$date_srs_trp = number_format($value->date_srs_trp,2); 
												$date_srs_qrd = number_format($value->date_srs_qrd,2); 
												$date_srs_dr = number_format($value->date_srs_dr,2); 

												$date_srs_euro = number_format($value->date_srs_euro,2); 
												$date_srs_dbl_euro = number_format($value->date_srs_dbl_euro,2); 
												$date_srs_twn_euro = number_format($value->date_srs_twn_euro,2); 
												$date_srs_trp_euro = number_format($value->date_srs_trp_euro,2); 
												$date_srs_qrd_euro = number_format($value->date_srs_qrd_euro,2); 
												$date_srs_dr_euro = number_format($value->date_srs_dr_euro,2); 

												// $srspp = number_format($value->date_srs,2); 
												$sgl_srs = number_format($value->sgl_srs,2);
												$dbl_srs = number_format($value->dbl_srs,2);
												$twn_srs = number_format($value->twn_srs,2);
												$trp_srs = number_format($value->trp_srs,2);
												$qrd_srs = number_format($value->qrd_srs,2);
												$dr_srs = number_format($value->dr_srs,2);
												
											}
										}
										}
									}
									// if(isset($experienceDate)){
									//     $sgl = $experienceDate->sgl;
									//     $dbl = $experienceDate->dbl;
									//     $twn = $experienceDate->twn;
									//     $trp = $experienceDate->trp;
									//     $qrd = $experienceDate->qrd;
									//     $night = $experienceDate->night;
									// }
									
									$market_option_selected = (!empty($hotel_dates[0]->market_option))?$hotel_dates[0]->market_option:$selected_currency;
									?>
									<div class="rt_row">

										<div class="rt_column label">
											No. Rooms
										</div>

										<div class="rt_column bold">
											<?php echo $sgl; ?>
										</div>

										<div class="rt_column bold">
											<?php echo $dbl; ?>
										</div>

										<div class="rt_column bold">
											<?php echo $twn; ?>
										</div>

										<div class="rt_column bold <?=empty($trp)?'':''?>">
											<?php echo $trp; ?>
										</div>

										<div class="rt_column bold <?=empty($qrd)?'':''?>">
											<?php echo $qrd; ?>
										</div>

										<div class="rt_column bold">
											<?php echo $sgl_dr; ?>
										</div>

									</div>

									 <div class="rt_row pound_colunm" <?=(!empty($hotel_prefer_currency) && ($hotel_prefer_currency == '1'))?'':'style="display:none"'?>>

										<div class="rt_column label">
											Rate pppn &#163;
										</div>

										<div class="rt_column">
											<?php echo (!empty($rate_dbb) ? $rate_dbb : ''); ?>
										 </div>

										<div class="rt_column">
										   <?php echo (!empty($rate_dbl) ? $rate_dbl : ''); ?>
										</div>

										<div class="rt_column">
										  <?php echo (!empty($rate_twn) ? $rate_twn : ''); ?>
										</div>

										<div class="rt_column">
											<?php echo (!empty($rate_trp) ? $rate_trp : ''); ?>
										</div>

										<div class="rt_column">
											<?php echo (!empty($rate_qrd) ? $rate_qrd : ''); ?>
										</div>

										<div class="rt_column">
											 <?php echo (!empty($rate_dr) ? $rate_dr : ''); ?>
										</div> 

									</div>
									 

									<div class="rt_row pound_colunm" <?=(!empty($hotel_prefer_currency) && ($hotel_prefer_currency == '1'))?'':'style="display:none"'?>>
										<div class="rt_column label">
											SS pppn &#163;
										</div>

										<div class="rt_column">
											<?php echo (!empty($date_srs) ? $date_srs : ''); ?>
										 </div>

										<div class="rt_column">
										   <?php echo (!empty($date_srs_dbl) ? $date_srs_dbl : ''); ?>
										</div>

										<div class="rt_column">
										  <?php echo (!empty($date_srs_twn) ? $date_srs_twn : ''); ?>
										</div>

										<div class="rt_column">
											<?php echo (!empty($date_srs_trp) ? $date_srs_trp : ''); ?>
										</div>

										<div class="rt_column">
											<?php echo (!empty($date_srs_qrd) ? $date_srs_qrd : ''); ?>
										</div>

										<div class="rt_column">
											 <?php echo (!empty($date_srs_dr) ? $date_srs_dr : ''); ?>
										</div> 

									</div>
									<div class="rt_row euro_colunm" <?=(!empty($hotel_prefer_currency) && ($hotel_prefer_currency == '2'))?'':'style="display:none"'?>>

										<div class="rt_column label">
											Rate pppn &#8364;
										</div>

										<div class="rt_column">
											<?php echo (!empty($rate_dbb_euro) ? $rate_dbb_euro : ''); ?>
										 </div>

										<div class="rt_column">
										   <?php echo (!empty($rate_dbl_euro) ? $rate_dbl_euro : ''); ?>
										</div>

										<div class="rt_column">
										  <?php echo (!empty($rate_twn_euro) ? $rate_twn_euro : ''); ?>
										</div>

										<div class="rt_column">
											<?php echo (!empty($rate_trp_euro) ? $rate_trp_euro : ''); ?>
										</div>

										<div class="rt_column">
											<?php echo (!empty($rate_qrd_euro) ? $rate_qrd_euro : ''); ?>
										</div>

										<div class="rt_column">
											 <?php echo (!empty($rate_dr_euro) ? $rate_dr_euro : ''); ?>
										</div> 

									</div>
									 <div class="rt_row euro_colunm" <?=(!empty($hotel_prefer_currency) && ($hotel_prefer_currency == '2'))?'':'style="display:none"'?>>

										<div class="rt_column label">
											SS pppn &#8364;
										</div>

										 <div class="rt_column">
											<?php echo (!empty($date_srs_euro) ? $date_srs_euro : ''); ?>
										 </div>

										<div class="rt_column">
										   <?php echo (!empty($date_srs_dbl_euro) ? $date_srs_dbl_euro : ''); ?>
										</div>

										<div class="rt_column">
										  <?php echo (!empty($date_srs_twn_euro) ? $date_srs_twn_euro : ''); ?>
										</div>

										<div class="rt_column">
											<?php echo (!empty($date_srs_trp_euro) ? $date_srs_trp_euro : ''); ?>
										</div>

										<div class="rt_column">
											<?php echo (!empty($date_srs_qrd_euro) ? $date_srs_qrd_euro : ''); ?>
										</div>

										<div class="rt_column">
											 <?php echo (!empty($date_srs_dr_euro) ? $date_srs_dr_euro : ''); ?>
										</div> 

									</div>
									<?php if(!empty($free_srs)){ ?> 
									<!-- <div class="rt_row">

										<div class="rt_column label" style="margin-left: -12px;">
										   Free SS 
										</div>

										<div class="rt_column">
										  
											 <?php echo (!empty($free_srs) ? $free_srs.'/'.$sgl : ''); ?>
										</div>

										<div class="rt_column no-boder">
										   
										</div>

										<div class="rt_column no-boder">
											
										</div>

										<div class="rt_column no-boder">
											
										</div>

										<div class="rt_column no-boder">
											
										</div> 
										<div class="rt_column no-boder">
											
										</div> 

									</div>  -->
									 <div class="rt_row">

										<div class=" label" style="margin-left: 26px;width: 146px !important;font-weight: 600;color: #14213D;font-size: 0.875rem;">
                                            Rooms SS Free
                                            </div>

										 <div class="d" style="width: 112%;border: none;padding: 0px;font-weight: bold;color: #212529;">  The first {{$free_srs}} rooms are SS free</div>

									</div> 
									<?php } ?>
									 <?php 
									 
									 $CommissionList = App\Models\Cms\Commission::where('id', $value->commission_id)->first();

									 if(!empty($CommissionList)){ ?> 
									<div class="rt_row">

										<div class="rt_column label" style="margin-left: -12px;">
										   Commission
										</div>

										<div class="rt_column">
										  
											 <?php echo (!empty($CommissionList->name) ? $CommissionList->name : ''); ?>
										</div>

										<div class="rt_column no-boder">
										   
										</div>

										<div class="rt_column no-boder">
											
										</div>

										<div class="rt_column no-boder">
											
										</div>

										<div class="rt_column no-boder">
											
										</div> 
										<div class="rt_column no-boder">
											
										</div> 

									</div> 
									<?php } ?>
									<!-- <div class="rt_row">

										<div class=" label" style="margin-left: -12px;width: 146px !important;font-weight: 600;color: #14213D;font-size: 0.875rem;">
                                            Rates &amp; Allocations 
                                            </div>

										 <div class="d" style="width: 86%;border: 1px solid #A8A8A8;padding: 17px;">  <input type="text" class="form-control" name="ratesallocation" value="<?php echo $dates_rates->ratesallocation; ?>">
                                                <?php echo ($experienceDate->ratesallocation); ?></div>

									</div>  -->
								   <!--  <div class="rt_row">

										<div class="rt_column label">
											SRS pppn
										</div>

										<div class="rt_column">
											<?php //echo (!empty($dates_rates) ? $dates_rates->srs : ''); ?>
											<?php echo (!empty($sgl_srs) ? $sgl_srs : ''); ?>
										</div>

										<div class="rt_column">
											<?php //echo (!empty($dates_rates) ? $dates_rates->srs : ''); ?>
											<?php echo (!empty($dbl_srs) ? $dbl_srs : ''); ?>
										</div>

										<div class="rt_column">
											<?php //echo (!empty($dates_rates) ? $dates_rates->srs : ''); ?>
											<?php echo (!empty($twn_srs) ? $twn_srs : ''); ?>
										</div>

										<div class="rt_column">
											<?php //echo (!empty($dates_rates) ? $dates_rates->srs : ''); ?>
											<?php echo (!empty($trp_srs) ? $trp_srs : ''); ?>
										</div>

										<div class="rt_column">
											<?php //echo (!empty($dates_rates) ? $dates_rates->srs : ''); ?>
											<?php echo (!empty($qrd_srs) ? $qrd_srs : ''); ?>
										</div>

										<div class="rt_column">
											<?php //echo (!empty($dates_rates) ? $dates_rates->srs : ''); ?>
											<?php echo (!empty($dr_srs) ? $dr_srs : ''); ?>
										</div>

									</div> -->

								</div>
								<!-- <input type="button" id="add_euro" value="<?=(!empty($experienceDate->display_euro_rate))?'Remove Euro':'Add Euro'?>" class="btn btn-secondary" > -->
								<?php if($experience->tour_id == '12'|| $experience->tour_id == '9'){
									?>
									<!-- <input type="button" id="add_pound" value="<?=(!empty($experienceDate->display_pound_rate))?'Remove Pound':'Add Pound'?>" class="btn btn-secondary" > -->
									<?php
								} ?>
								 
							</div>

						</div>
					</div>
					<?php if(empty($experienceDate->sign_name_hc)){ 

						$market_option_selected = (!empty($hotel_dates[0]->market_option))?$hotel_dates[0]->market_option:$selected_currency; ?>
					<div class="tc_box_wrapper">
						<div class="tc_box">

							<div class="header">
								
								<div style="width:55%;">Room requested (supplements)  </div>
								<div style="width:45%;">
									<?php if(empty($experienceDate->sign_name_hc)){ ?>
									
									<!-- <select style="padding:5px;width:50%;" class="form-control" name="select_market_option" id="select_market_option">
										<option value="">Select market</option>
										<option value="1" <?=(!empty($market_option_selected) && $market_option_selected == '1')?'selected':''?>>UK</option>
										<option value="2" <?=(!empty($market_option_selected) && $market_option_selected == '2')?'selected':''?>>EU</option>
										<option value="3" <?=(!empty($market_option_selected) && $market_option_selected == '3')?'selected':''?>>UK & EU</option>
									</select> -->
									<?php } ?>
								</div>
							</div>
							<div class="body" style="">
								<table class="supplements" cellpadding="5" width="85%" style="pointer-events:none;">
									<tr>
										<td width="20%">Supplements</td>
										<td width="10%">Cost</td>
										<td width="35%">In Price</td>
										<td width="35%">Out Price</td>
									</tr>
									<tr>
										 <?php
										 	
								
											if(!empty($hotel_dates)){
												foreach ($hotel_dates as $key => $value) {
													if(($value->date_in == $experienceDate->date_from) && ($value->date_out == $experienceDate->date_to)){
														$hotel_date_id = $value->id;
														$value->hotelDatesSupplement = 


DB::connection('mysql_veenus')->table('hotel_dates_supplements')->where('hotel_dates_id', $hotel_date_id)->get()->toArray();
														$value->hotelDatesSupplements = isset($value->hotelDatesSupplements)?$value->hotelDatesSupplements:array();
															//$value->hotelDatesSupplements = isset($value->hotelDatesSupplements)?$value->hotelDatesSupplements:array();

															$hotelDatesSupplements = $value->hotelDatesSupplement;
															if(!empty($value->hotelDatesSupplement))
															{
																$value->hotelDatesSupplements = array_column($value->hotelDatesSupplement, 'supplements');
															}

													}
												}
											}

											

											$checked = '';
											$price = '';
											$price_out = '';
											$price_euro_in = '';
											$price_euro_out = '';
											$price_type = '';
											if(!empty($value->hotelDatesSupplements)){
												if (in_array(1, $value->hotelDatesSupplements))
												{
													$srchKey = array_search(1,$value->hotelDatesSupplements);
													$price = $hotelDatesSupplements[$srchKey]->price;
													$price_out = $hotelDatesSupplements[$srchKey]->price_out;
													$price_euro_in = $hotelDatesSupplements[$srchKey]->price_euro_in;
													$price_euro_out = $hotelDatesSupplements[$srchKey]->price_euro_out;
													$price_type = $hotelDatesSupplements[$srchKey]->price_type;
													$checked = 'checked';
												}  
											}
											?>
										<td width="20%">
											<div class="inclusionsSections">
												<div class="checkarea_part_Dates">
													<label class="checkbox_div">
													  <input type="checkbox" name="supplements[1][name]" class="custom_chkbox tagchkbox notClickedCls " value="1" data-val="" {{ $checked }}> <span class="notClickedCls ">Water view (Sea/Lake/River) </span>
													  
													  <span class="checkmark"></span>
													  
														 
													   
														 
													</label>
												</div>
											</div>
										</td>
										<td width="10%">
											<select class="form-control notClickedCls" name="supplements[1][price_type]">
												<option <?=(!empty($price_type) && $price_type == 'pppn')?'selected="selected"':''?> value="pppn">pppn</option>
												<option <?=(!empty($price_type) && $price_type == 'prpn')?'selected="selected"':''?> value="prpn">prpn</option>
											</select>
										</td>
										
										<td width="35%">
										
											<div class="pound_price pound_colunm" <?=(!empty($prefer_currency) && ($prefer_currency == '1'))?'':'style="display:none"'?>>
												<input type="text" class="notClickedCls hdioCls form-control numbercls valid" placeholder="&#163; In price" value="<?php echo $price; ?>" name="supplements[1][price]" aria-invalid="false" style="display: unset;">
												<!-- <span class="hotelDatesInOutCls" style="margin-right: 10px;"><b><?php echo !empty($price) ? '&#163;'.$price : '-'; ?> <?=!empty($price_type)?$price_type:'pppn'?> </b></span> -->
											</div>
											<div class="euro_price euro_colunm" <?=(!empty($prefer_currency) && ($prefer_currency == '2'))?'':'style="display:none"'?>>
												<input type="text" class="notClickedCls hdioCls form-control numbercls valid" placeholder="&#8364; In price" value="<?php echo $price_euro_in; ?>" name="supplements[1][price_euro_in]" aria-invalid="false" style="display: unset;">
												<!-- <span class="hotelDatesInOutCls" style="margin-right: 10px;"><b><?php echo !empty($price_euro_in) ? '&#8364;'.$price_euro_in : '-'; ?> <?=!empty($price_type)?$price_type:'pppn'?> </b></span> -->
											</div>
										</td>
										<td width="35%">
											<div class="pound_price pound_colunm_out" <?=(!empty($market_option_selected) && ($market_option_selected == '1' || $market_option_selected == '3'))?'':'style="display:none"'?>>
												<input type="text" class="notClickedCls hdioCls form-control numbercls valid" placeholder="&#163; Out price" value="<?php echo $price_out; ?>" name="supplements[1][price_out]" aria-invalid="false" style="display: unset;">
												<!-- <span class="hotelDatesInOutCls" style="margin-right: 10px;"><b><?php echo !empty($price_out) ? '&#163;'.$price_out : '-'; ?> <?=(!empty($price_type) && $price_type == 'pppn')?'pp':((!empty($price_type) && $price_type == 'prpn')?$price_type:'pp')?></b></span> -->
											</div>
											<div class="euro_price euro_colunm_out" <?=(!empty($market_option_selected) && ($market_option_selected == '2' || $market_option_selected == '3'))?'':'style="display:none"'?>>
												<input type="text" class="notClickedCls hdioCls form-control numbercls valid" placeholder="&#8364; Out price" value="<?php echo $price_euro_out; ?>" name="supplements[1][price_euro_out]" aria-invalid="false" style="display: unset;">
												<!-- <span class="hotelDatesInOutCls" style="margin-right: 10px;"><b><?php echo !empty($price_euro_out) ? '&#8364;'.$price_euro_out : '-'; ?> <?=(!empty($price_type) && $price_type == 'pppn')?'pp':((!empty($price_type) && $price_type == 'prpn')?$price_type:'pp')?></b></span> -->
											</div>
										   
										</td>
									</tr>
									<tr>
										 <?php

											$checked = '';
											$price = '';
											$price_out = '';
											$price_euro_in = '';
											$price_euro_out = '';
											$price_type = '';
											if(!empty($value->hotelDatesSupplements)){
												if (in_array(2, $value->hotelDatesSupplements))
												{
													$srchKey = array_search(2,$value->hotelDatesSupplements);
													$price = $hotelDatesSupplements[$srchKey]->price;
													$price_out = $hotelDatesSupplements[$srchKey]->price_out;
													$price_euro_in = $hotelDatesSupplements[$srchKey]->price_euro_in;
													$price_euro_out = $hotelDatesSupplements[$srchKey]->price_euro_out;
													$price_type = $hotelDatesSupplements[$srchKey]->price_type;
													$checked = 'checked';
												}  
											}
											?>
										<td width="20%">
											<div class="inclusionsSections">
												<div class="checkarea_part_Dates">
													<label class="checkbox_div">
													  <input type="checkbox" name="supplements[2][name]" class="custom_chkbox tagchkbox notClickedCls " value="2" data-val="" {{ $checked }}> <span class="notClickedCls ">View (Garden/Balcony) </span>
													  
													  <span class="checkmark"></span>
													  
														 
													   
														 
													</label>
												</div>
											</div>
										</td>
										<td width="10%">
											<select class="form-control notClickedCls" name="supplements[2][price_type]">
												<option <?=(!empty($price_type) && $price_type == 'pppn')?'selected="selected"':''?> value="pppn">pppn</option>
												<option <?=(!empty($price_type) && $price_type == 'prpn')?'selected="selected"':''?> value="prpn">prpn</option>
											</select>
										</td>
										
										<td width="35%">
										
											<div class="pound_price pound_colunm" <?=(!empty($prefer_currency) && ($prefer_currency == '1'))?'':'style="display:none"'?>>
												<input type="text" class="notClickedCls hdioCls form-control numbercls valid" placeholder="&#163; In price" value="<?php echo $price; ?>" name="supplements[2][price]" aria-invalid="false" style="display: unset;">
												<!-- <span class="hotelDatesInOutCls" style="margin-right: 10px;"><b><?php echo !empty($price) ? '&#163;'.$price : '-'; ?> <?=!empty($price_type)?$price_type:'pppn'?> </b></span> -->
											</div>
											<div class="euro_price euro_colunm" <?=(!empty($prefer_currency) && ($prefer_currency == '2'))?'':'style="display:none"'?>>
												<input type="text" class="notClickedCls hdioCls form-control numbercls valid" placeholder="&#8364; In price" value="<?php echo $price_euro_in; ?>" name="supplements[2][price_euro_in]" aria-invalid="false" style="display: unset;">
												<!-- <span class="hotelDatesInOutCls" style="margin-right: 10px;"><b><?php echo !empty($price_euro_in) ? '&#8364;'.$price_euro_in : '-'; ?> <?=!empty($price_type)?$price_type:'pppn'?> </b></span> -->
											</div>
										</td>
										<td width="35%">
											<div class="pound_price pound_colunm_out" <?=(!empty($market_option_selected) && ($market_option_selected == '1' || $market_option_selected == '3'))?'':'style="display:none"'?>>
												<input type="text" class="notClickedCls hdioCls form-control numbercls valid" placeholder="&#163; Out price" value="<?php echo $price_out; ?>" name="supplements[2][price_out]" aria-invalid="false" style="display: unset;">
												<!-- <span class="hotelDatesInOutCls" style="margin-right: 10px;"><b><?php echo !empty($price_out) ? '&#163;'.$price_out : '-'; ?> <?=(!empty($price_type) && $price_type == 'pppn')?'pp':((!empty($price_type) && $price_type == 'prpn')?$price_type:'pp')?></b></span> -->
											</div>
											<div class="euro_price euro_colunm_out" <?=(!empty($market_option_selected) && ($market_option_selected == '2' || $market_option_selected == '3'))?'':'style="display:none"'?>>
												<input type="text" class="notClickedCls hdioCls form-control numbercls valid" placeholder="&#8364; Out price" value="<?php echo $price_euro_out; ?>" name="supplements[2][price_euro_out]" aria-invalid="false" style="display: unset;">
												<!-- <span class="hotelDatesInOutCls" style="margin-right: 10px;"><b><?php echo !empty($price_euro_out) ? '&#8364;'.$price_euro_out : '-'; ?> <?=(!empty($price_type) && $price_type == 'pppn')?'pp':((!empty($price_type) && $price_type == 'prpn')?$price_type:'pp')?></b></span> -->
											</div>
										   
										</td>
									</tr>
									<tr>
										 <?php

											$checked = '';
											$price = '';
											$price_out = '';
											$price_euro_in = '';
											$price_euro_out = '';
											$price_type = '';
											if(!empty($value->hotelDatesSupplements)){
												if (in_array(3, $value->hotelDatesSupplements))
												{
													$srchKey = array_search(3,$value->hotelDatesSupplements);
													$price = $hotelDatesSupplements[$srchKey]->price;
													$price_out = $hotelDatesSupplements[$srchKey]->price_out;
													$price_euro_in = $hotelDatesSupplements[$srchKey]->price_euro_in;
													$price_euro_out = $hotelDatesSupplements[$srchKey]->price_euro_out;
													$price_type = $hotelDatesSupplements[$srchKey]->price_type;
													$checked = 'checked';
												}  
											}
											?>
										<td width="20%">
											<div class="inclusionsSections">
												<div class="checkarea_part_Dates">
													<label class="checkbox_div">
													  <input type="checkbox" name="supplements[3][name]" class="custom_chkbox tagchkbox notClickedCls " value="3" data-val="" {{ $checked }}> <span class="notClickedCls ">Executive/De Luxe/Superior Rooms </span>
													  
													  <span class="checkmark"></span>
													  
														 
													   
														 
													</label>
												</div>
											</div>
										</td>
										<td width="10%">
											<select class="form-control notClickedCls" name="supplements[3][price_type]">
												<option <?=(!empty($price_type) && $price_type == 'pppn')?'selected="selected"':''?> value="pppn">pppn</option>
												<option <?=(!empty($price_type) && $price_type == 'prpn')?'selected="selected"':''?> value="prpn">prpn</option>
											</select>
										</td>
										
										<td width="35%">
										
											<div class="pound_price pound_colunm" <?=(!empty($prefer_currency) && ($prefer_currency == '1'))?'':'style="display:none"'?>>
												<input type="text" class="notClickedCls hdioCls form-control numbercls valid" placeholder="&#163; In price" value="<?php echo $price; ?>" name="supplements[3][price]" aria-invalid="false" style="display: unset;">
												<!-- <span class="hotelDatesInOutCls" style="margin-right: 10px;"><b><?php echo !empty($price) ? '&#163;'.$price : '-'; ?> <?=!empty($price_type)?$price_type:'pppn'?> </b></span> -->
											</div>
											<div class="euro_price euro_colunm" <?=(!empty($prefer_currency) && ($prefer_currency == '2'))?'':'style="display:none"'?>>
												<input type="text" class="notClickedCls hdioCls form-control numbercls valid" placeholder="&#8364; In price" value="<?php echo $price_euro_in; ?>" name="supplements[3][price_euro_in]" aria-invalid="false" style="display: unset;">
												<!-- <span class="hotelDatesInOutCls" style="margin-right: 10px;"><b><?php echo !empty($price_euro_in) ? '&#8364;'.$price_euro_in : '-'; ?> <?=!empty($price_type)?$price_type:'pppn'?> </b></span> -->
											</div>
										</td>
										<td width="35%">
											<div class="pound_price pound_colunm_out" <?=(!empty($market_option_selected) && ($market_option_selected == '1' || $market_option_selected == '3'))?'':'style="display:none"'?>>
												<input type="text" class="notClickedCls hdioCls form-control numbercls valid" placeholder="&#163; Out price" value="<?php echo $price_out; ?>" name="supplements[3][price_out]" aria-invalid="false" style="display: unset;">
												<!-- <span class="hotelDatesInOutCls" style="margin-right: 10px;"><b><?php echo !empty($price_out) ? '&#163;'.$price_out : '-'; ?> <?=(!empty($price_type) && $price_type == 'pppn')?'pp':((!empty($price_type) && $price_type == 'prpn')?$price_type:'pp')?></b></span> -->
											</div>
											<div class="euro_price euro_colunm_out" <?=(!empty($market_option_selected) && ($market_option_selected == '2' || $market_option_selected == '3'))?'':'style="display:none"'?>>
												<input type="text" class="notClickedCls hdioCls form-control numbercls valid" placeholder="&#8364; Out price" value="<?php echo $price_euro_out; ?>" name="supplements[3][price_euro_out]" aria-invalid="false" style="display: unset;">
												<!-- <span class="hotelDatesInOutCls" style="margin-right: 10px;"><b><?php echo !empty($price_euro_out) ? '&#8364;'.$price_euro_out : '-'; ?> <?=(!empty($price_type) && $price_type == 'pppn')?'pp':((!empty($price_type) && $price_type == 'prpn')?$price_type:'pp')?></b></span> -->
											</div>
										   
										</td>
									</tr>
									<tr>
										 <?php

											$checked = '';
											$price = '';
											$price_out = '';
											$price_euro_in = '';
											$price_euro_out = '';
											$price_type = '';

											if(!empty($value->hotelDatesSupplements)){
												if (in_array(4, $value->hotelDatesSupplements))
												{
													$srchKey = array_search(4,$value->hotelDatesSupplements);
													$price = $hotelDatesSupplements[$srchKey]->price;
													$price_out = $hotelDatesSupplements[$srchKey]->price_out;
													$price_euro_in = $hotelDatesSupplements[$srchKey]->price_euro_in;
													$price_euro_out = $hotelDatesSupplements[$srchKey]->price_euro_out;
													$price_type = $hotelDatesSupplements[$srchKey]->price_type;
													$checked = 'checked';
												}  
											}
											?>
										<td width="20%">
											<div class="inclusionsSections">
												<div class="checkarea_part_Dates">
													<label class="checkbox_div">
													  <input type="checkbox" name="supplements[4][name]" class="custom_chkbox tagchkbox notClickedCls " value="4" data-val="" {{ $checked }}> <span class="notClickedCls ">Dbl/tw room for sole </span>
													  
													  <span class="checkmark"></span>
													  
														 
													   
														 
													</label>
												</div>
											</div>
										</td>
										<td width="10%">
											<select class="form-control notClickedCls" name="supplements[4][price_type]">
												<option <?=(!empty($price_type) && $price_type == 'pppn')?'selected="selected"':''?> value="pppn">pppn</option>
												<option <?=(!empty($price_type) && $price_type == 'prpn')?'selected="selected"':''?> value="prpn">prpn</option>
											</select>
										</td>
									   
										<td width="35%">
										
											<div class="pound_price pound_colunm" <?=(!empty($prefer_currency) && ($prefer_currency == '1'))?'':'style="display:none"'?>>
												<input type="text" class="notClickedCls hdioCls form-control numbercls valid" placeholder="&#163; In price" value="<?php echo $price; ?>" name="supplements[4][price]" aria-invalid="false" style="display: unset;">
												<!-- <span class="hotelDatesInOutCls" style="margin-right: 10px;"><b><?php echo !empty($price) ? '&#163;'.$price : '-'; ?> <?=!empty($price_type)?$price_type:'pppn'?> </b></span> -->
											</div>
											<div class="euro_price euro_colunm" <?=(!empty($prefer_currency) && ($prefer_currency == '2'))?'':'style="display:none"'?>>
												<input type="text" class="notClickedCls hdioCls form-control numbercls valid" placeholder="&#8364; In price" value="<?php echo $price_euro_in; ?>" name="supplements[4][price_euro_in]" aria-invalid="false" style="display: unset;">
												<!-- <span class="hotelDatesInOutCls" style="margin-right: 10px;"><b><?php echo !empty($price_euro_in) ? '&#8364;'.$price_euro_in : '-'; ?> <?=!empty($price_type)?$price_type:'pppn'?> </b></span> -->
											</div>
										</td>
										<td width="35%">
											<div class="pound_price pound_colunm_out" <?=(!empty($market_option_selected) && ($market_option_selected == '1' || $market_option_selected == '3'))?'':'style="display:none"'?>>
												<input type="text" class="notClickedCls hdioCls form-control numbercls valid" placeholder="&#163; Out price" value="<?php echo $price_out; ?>" name="supplements[4][price_out]" aria-invalid="false" style="display: unset;">
												<!-- <span class="hotelDatesInOutCls" style="margin-right: 10px;"><b><?php echo !empty($price_out) ? '&#163;'.$price_out : '-'; ?> <?=(!empty($price_type) && $price_type == 'pppn')?'pp':((!empty($price_type) && $price_type == 'prpn')?$price_type:'pp')?></b></span> -->
											</div>
											<div class="euro_price euro_colunm_out" <?=(!empty($market_option_selected) && ($market_option_selected == '2' || $market_option_selected == '3'))?'':'style="display:none"'?>>
												<input type="text" class="notClickedCls hdioCls form-control numbercls valid" placeholder="&#8364; Out price" value="<?php echo $price_euro_out; ?>" name="supplements[4][price_euro_out]" aria-invalid="false" style="display: unset;">
												<!-- <span class="hotelDatesInOutCls" style="margin-right: 10px;"><b><?php echo !empty($price_euro_out) ? '&#8364;'.$price_euro_out : '-'; ?> <?=(!empty($price_type) && $price_type == 'pppn')?'pp':((!empty($price_type) && $price_type == 'prpn')?$price_type:'pp')?></b></span> -->
											</div>
										   
										</td>
									</tr>
								</table>
							   
								
							   
								
								
								<?php /*
								$hotel_dates_supplements = '';
								
								if(!empty($hotel_dates)){
									foreach ($hotel_dates as $key => $hvalue) {
										if(!empty($experienceDate) && ($hvalue->date_in == $experienceDate->date_from) && ($hvalue->date_out == $experienceDate->date_to)){
											$hotel_date_id = $hvalue->id;
											$hotel_dates_supplements = 


DB::connection('mysql_veenus')->table('hotel_dates_supplements')->where('hotel_dates_id', $hotel_date_id)->get()->toArray();
										}
									}
								}
								if(!empty($hotel_dates_supplements)){
									echo '<ul>';
									foreach ($hotel_dates_supplements as $key => $htvalue) {
										if($htvalue->supplements == 1){
											echo '<li>Water view (Sea/Lake/River) prpn: <strong>&pound;'.$htvalue->price.'</strong></li>';
										}elseif($htvalue->supplements == 2){
											echo '<li>View (Garden/Balcony) prpn: <strong>&pound;'.$htvalue->price.'</strong></li>';
										}elseif($htvalue->supplements == 3){
											echo '<li>Executive/De Luxe/Superior Rooms prpn: <strong>&pound;'.$htvalue->price.'</strong></li>';
										}elseif($htvalue->supplements == 4){
											echo '<li>Dbl/tw room for sole pppn: <strong>&pound;'.$htvalue->price.'</strong></li>';
										}
									}
									echo '</ul>';
								}else{
									echo 'N/A';
								} */
								?>

							</div>

						</div>
					</div>
					<?php } ?>
					<div class="tc_box_wrapper">
						<div class="tc_box">

							<div class="header">
								Additional information 
								<!-- <a href="javascript:;" id="mealEdit">Edit</a> -->
							</div>

							<div class="body">
								 <textarea id="ratesallocationField" name="ratesallocation" class="form-control" style="display: none;">{{ $experienceDate->ratesallocation }}</textarea>
                          <div id="ratesallocationContent">
                              {!! $experienceDate->ratesallocation !!}
                          </div>

							</div>

						</div>
					</div>
					<div class="tc_box_wrapper">
						<div class="tc_box">

							<div class="header">
								Supplements
							</div>

							<div class="body">
								<?php
								$hotel_dates_supplements = '';
								
								if(!empty($hotel_dates)){
									foreach ($hotel_dates as $key => $value) {
										if(($value->date_in == $experienceDate->date_from) && ($value->date_out == $experienceDate->date_to)){
											$hotel_date_id = $value->id;
											$hotel_dates_supplements = 


DB::connection('mysql_veenus')->table('hotel_dates_supplements')->where('hotel_dates_id', $hotel_date_id)->get()->toArray();
										}
									}
								}
								if(!empty($hotel_dates_supplements)){
									echo '<ul>';
									foreach ($hotel_dates_supplements as $key => $value) {
										$value->price_type = !empty($value->price_type)?$value->price_type:'pppn';
										$price = '';$price_euro_in = '';$price_out = '';$price_euro_out = '';

										if($prefer_currency == 1)
										{
											$price = !empty($value->price)?'In : &pound;'.$value->price:'';
											//$price_out = !empty($value->price_out)?'Out : &pound;'.$value->price_out:'';
										}
										else if($prefer_currency == 2)
										{
											$price_euro_in = !empty($value->price_euro_in)?'In : &#8364;'.$value->price_euro_in:'';
											//$price_euro_out = !empty($value->price_euro_out)?'Out : &#8364;'.$value->price_euro_out:'';
										}
										/*else
										{
											$price = !empty($value->price)?'In -&pound;'.$value->price:'';
											$price_euro_in = !empty($value->price_euro_in)?'In : &#8364;'.$value->price_euro_in:'';
											$price_out = !empty($value->price_out)?'Out -&pound;'.$value->price_out:'';
											$price_euro_out = !empty($value->price_euro_out)?'Out : &#8364;'.$value->price_euro_out:'';
										}*/
										

										if($value->supplements == 1){
											echo '<li>Water view (Sea/Lake/River) : <strong>'.$price.' '.$price_euro_in.' '.$price_out.' '.$price_euro_out.' '.$value->price_type.'</strong></li>';
										}elseif($value->supplements == 2){
											echo '<li>View (Garden/Balcony) : <strong>'.$price.' '.$price_euro_in.' '.$price_out.' '.$price_euro_out.' '.$value->price_type.'</strong></li>';
										}elseif($value->supplements == 3){
											echo '<li>Executive/De Luxe/Superior Rooms : <strong>'.$price.' '.$price_euro_in.' '.$price_out.' '.$price_euro_out.' '.$value->price_type.'</strong></li>';
										}elseif($value->supplements == 4){
											echo '<li>Dbl/tw room for sole : <strong>'.$price.' '.$price_euro_in.' '.$price_out.' '.$price_euro_out.' '.$value->price_type.'</strong></li>';
										}
									}
									echo '</ul>';
								}else{
									echo 'N/A';
								} 
								?>

							</div>

						</div>
					</div>
					 <div class="tc_box_wrapper">
						<div class="tc_box">

							<div class="header">
								Meal Arrangements
								<!-- <a href="javascript:;" id="mealEdit">Edit</a> -->
							</div>

							<div class="body">
								<textarea id="mealField" name="meal_arrangements" class="form-control" style="display: none;">{{ $experienceDate->hc_mean_arrangements }}</textarea>
								<div id="mealContent">
									{!! nl2br($experienceDate->hc_mean_arrangements) !!}
								</div>

							</div>

						</div>
					</div>
					<div class="tc_box_wrapper">
						<div class="tc_box">

							<div class="header">
								Free Place
								<!-- <a href="javascript:;" id="freeEdit">Edit</a> -->
							</div>

							<div class="body">
								<textarea id="freeField" name="free_place" class="form-control" style="display: none;">{{ $experienceDate->hc_free_place }}</textarea>
								<div id="freeContent">
									{!! nl2br($experienceDate->hc_free_place) !!}
								</div>
							   

							</div>

						</div>
					</div>
					<!-- added By Niral -->
					<div class="tc_box_wrapper">
						<div class="tc_box">

							<div class="header">
								Inclusions
								<!-- <a href="javascript:;" id="inclusionsEdit">Edit</a> -->
							</div>

							<div class="body">
								<textarea id="inclusionsField" name="inclusions" class="form-control" style="display: none;">{{ $experienceDate->hc_inclusions }}</textarea>
								<div id="inclusionsContent">
									{!! nl2br($experienceDate->hc_inclusions) !!}
								</div>
							  
							</div>

						</div>
					</div>
					<!-- end code by niral -->
					<div class="tc_box_wrapper">
						<div class="tc_box">

							<div class="header">
								Services and Facilities
								<!-- <a href="javascript:;" id="sfEdit">Edit</a> -->
							</div>

							<div class="body">
								<textarea id="sfField" name="services_facilities" class="form-control" rows="7" style="display: none;">{{ $experienceDate->hc_services_facilities }}</textarea>
								<div id="sfContent">
									{!! nl2br($experienceDate->hc_services_facilities) !!}
								</div>
							</div>

						</div>
					</div>
					<div class="tc_box_wrapper">
						<div class="tc_box">

							<div class="header">
								Terms and Conditions
								<!-- <a href="javascript:;" id="tncEdit">Edit</a> -->
							</div>

							<div class="body">
								<textarea id="tncField" name="terms_conditions" class="form-control" rows="7" style="display: none;">{{ $experienceDate->hc_terms_conditions }}</textarea>
								<div class="tc_section" id="tcContent">
									{!! nl2br($experienceDate->hc_terms_conditions) !!}
								</div>
								

							</div>

						</div>
					</div>
					
					<div class="tc_box_wrapper">
						<div class="tc_box">

							<div class="header">
								Hotel Confirmation Template 

								<a href="javascript:;" exp_date_id="{{$experienceDate->id}}" exp_id="{{$experience->id}}"  id="HtlConfrmTemplate">Add  Hotel Confirmation Template </a>
							</div>
							<br/>
						</div>
					</div>
					
					
					

				</div>

				<div class="signatures">

					<?php if(isset($experienceDate->sign_name_hc) && !empty($experienceDate->sign_name_hc)){ ?>
						<div class="signature_column with_box">

							<!-- <div class="heading">
								Signature
								<?php //pr($hotel_dates); ?>
							</div> -->

							<!-- <select name="sign_name_hc" disabled id="sign_name_hc" class="form-control" required="">
								<option value="">--</option>
								 <?php if(!empty($signature_list)) {
									foreach($signature_list as $srow)
									{
										?>
										<option <?=(!empty($hotel_dates[0]->sign_name_hc) && $hotel_dates[0]->sign_name_hc == $srow->name)?'selected="selected"':''?> value="{{$srow->name}}">{{$srow->name}} ({{$srow->description}})</option>
										<?php
									}
								}?>
								
							</select> -->
							<?php if(!empty($hotel_dates[0]->sign_name_hc)){ ?> 
							<div class="signature_column">

							<div class="heading">
								<?php echo $hotel_dates[0]->sign_name_hc; ?>
							</div>

							<p>
								<?php echo $hotel_dates[0]->sign_name_hc; ?><br>
								<?php 
								$signature_list = App\Models\Cms\SignatureName::orderBy('id','DESC')->where('name',$hotel_dates[0]->sign_name_hc)->first();
								if(!empty($signature_list->description))
								{
									echo $signature_list->description;
								}
								
								?>
								
							</p>
							<p><?=!empty($value->hc_sign_date)?date('d/m/Y',strtotime($value->hc_sign_date)):date('d/m/Y') ?></p>
						</div>
						<?php } ?>
							
						</div>
					<?php }else{ ?>
						<div class="signature_column with_box">

							<!-- <div class="heading">
								Signature
								<?php //pr($hotel_dates); ?>
							</div> -->

							<!-- <select name="sign_name_hc" disabled id="sign_name_hc" class="form-control" required="">
								<option value="">--</option>
								 <?php if(!empty($signature_list)) {
									foreach($signature_list as $srow)
									{
										?>
										<option <?=(!empty($hotel_dates[0]->sign_name_hc) && $hotel_dates[0]->sign_name_hc == $srow->name)?'selected="selected"':''?> value="{{$srow->name}}">{{$srow->name}} ({{$srow->description}})</option>
										<?php
									}
								}?>
								
							</select> -->
							<?php if(!empty($hotel_dates[0]->sign_name_hc)){ ?> 
							<div class="signature_column">

							<div class="heading">
								<?php echo $hotel_dates[0]->sign_name_hc; ?>
							</div>

							<p>
								<?php echo $hotel_dates[0]->sign_name_hc; ?><br>
								<?php 
								$signature_list = App\Models\Cms\SignatureName::orderBy('id','DESC')->where('name',$hotel_dates[0]->sign_name_hc)->first();
								if(!empty($signature_list->description))
								{
									echo $signature_list->description;
								}
								
								?>
								
							</p>
							<p><?=!empty($value->hc_sign_date)?date('d/m/Y',strtotime($value->hc_sign_date)):date('d/m/Y') ?></p>
						</div>
						<?php } ?>
							<input type="hidden" class="form-control" required="" readonly name="sign_name_hc" id="sign_name_hc" value="{{!empty($hotel_dates[0]->sign_name_hc)?$hotel_dates[0]->sign_name_hc:''}}" >
						</div>
					<?php } ?>

				</div>
				<?php if(!isset($is_view)){ ?> 
				<div class="ctas">
					<input type="hidden" name="hotel_id" value="{{$hotel->id}}">
					<input type="hidden" name="exp_id" value="{{$experience->id}}">
					<input type="hidden" name="display_euro_rate" id="display_euro_rate" value="<?=(!empty($experienceDate->display_euro_rate))?'1':'0'?>">
					<input type="hidden" name="hotel_dates_id" id="hotel_dates_id" value="<?=(!empty($hotel_date_id))?$hotel_date_id:''?>">
					
					<input type="hidden" name="market_option" id="market_option" value="<?=(!empty($market_option_selected))?$market_option_selected:'0'?>">
					
					 <input type="hidden" name="display_pound_rate" id="display_pound_rate" value="<?=(!empty($experienceDate->display_pound_rate))?'1':'0'?>">
					<input type="hidden" name="exp_date_id" value="{{$experienceDate->id}}">
					@if(empty($is_hotel_assieged))
					<a href="javascript:;" class="cta" id="saveHcForm" style="width: auto;">
						Save for later
					</a>
					@endif
					@if($experienceDate->mark_as_completed != 1)
					<a href="javascript:;" class="cta" id="markAsCompletedHC" style="width: auto;" data-id="{{$experienceDate->id}}">
						Mark as Completed
					</a>
					@else
					@if(empty($is_hotel_assieged))
					<a href="javascript:;" class="cta" id="unmarkAsCompletedHC" style="width: auto;background: red;border-color: red;" data-id="{{$experienceDate->id}}">
						Un-mark as complete
					</a>
					@endif
				   <!--  <a href="javascript:;" class="cta" id="downloadPDFhc" style="width: auto;" exp_date_id="{{$experienceDate->id}}" exp_id="{{$experience->id}}">
						Download
					</a> -->
					<?php if(!empty($experienceDate->pdf_file_name)){ ?> 
					 
					<a target="_bl" href="{{asset('public/pdf/'.$experienceDate->pdf_file_name)}}" class="cta ">download</a>
					
					<?php } ?>
					@endif
				</div>
				<?php }else{ ?> 
					<?php if($experienceDate->mark_as_completed == 1 && !empty($experienceDate->pdf_file_name)){ ?> 
					 <div class="ctas">
					<a target="_bl" href="{{asset('public/pdf/'.$experienceDate->pdf_file_name)}}" class="cta ">download</a>
					</div>
					<?php } ?>
				<?php } ?>
				</form>
			</div>

		</div>
	</div>
</div>
<div id="tobeprinted" style="display:none;"></div>
<script type="text/javascript">
	<?php if(isset($is_view)){ ?> 
	$('.header a').hide();
	<?php } ?>
	$(document).on('click', '#tncEdit', function(){
		$('#tncField').show();
		$('#tcContent').hide();
	});
	$(document).on('click', '#sfEdit', function(){
		$('#sfField').show();
		$('#sfContent').hide();
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
	$(document).on('click', '#saveHcForm', function(e) {
		e.preventDefault();
		var formData = $("#hcForm").serialize();
		$('.loader').show();    
		$.ajax({
			url: base_url+'/super-user/update-hc-data',
			type: 'POST',
			data: {'formData':formData},
			success: function(data) {
				$('.loader').hide();  
				$('#hcModal').modal('hide');
				toastSuccess('Tour has been updated successfully.');
			},
			error: function(e) {
			}
		});   
	});
	$(document).on('click', '#downloadPDFhc', function(e) {
		e.preventDefault();
		var exp_id = $(this).attr('exp_id');
		var exp_date_id = $(this).attr('exp_date_id');
		$('.loader').show();    
		$.ajax({
			url: base_url+'/super-user/download-hc-pdf',
			type: 'POST',
			data: {'exp_id':exp_id,'exp_date_id':exp_date_id},
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
	
	 $(document).on('click', '#HtlConfrmTemplate', function(e) {
		e.preventDefault();
		var exp_id = $(this).attr('exp_id');
		var exp_date_id = $(this).attr('exp_date_id');
		$('.loader').show();    
		$.ajax({
			url: base_url+'/super-user/hc-confirmation-tpl',
			//url: base_url+'/super-user/edit-hc',
			type: 'POST',
			data: {'exp_id':exp_id,'exp_date_id':exp_date_id},
			success: function(data) {
				if (data.confirmation_template_hc != null) {
					$('#mealField').val(data.confirmation_template_hc.hc_meal_arrangements); 
					$('#inclusionsField').val(data.confirmation_template_hc.hc_free_place); 
					$('#freeField').val(data.confirmation_template_hc.hc_inclusions); 
					$('#sfField').val(data.confirmation_template_hc.hc_services_facilities); 
					$('#tncField').val(data.confirmation_template_hc.hc_terms_conditions); 
					
					$('#mealContent').html(data.confirmation_template_hc.hc_meal_arrangements); 
					$('#inclusionsContent').html(data.confirmation_template_hc.hc_free_place); 
					$('#freeContent').html(data.confirmation_template_hc.hc_inclusions); 
					$('#sfContent').html(data.confirmation_template_hc.hc_services_facilities); 
					$('#tcContent').html(data.confirmation_template_hc.hc_terms_conditions); 
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
	});
	
	
	/*$('#hcModal').on('hidden.bs.modal', function (e) {
		 e.preventDefault();
		var formData = $("#hcForm").serialize();
		$('.loader').show();    
		$.ajax({
			url: base_url+'/super-user/update-hc-data',
			type: 'POST',
			data: {'formData':formData},
			success: function(data) {
				$('.loader').hide();  
				$('#hcModal').modal('hide');
				toastSuccess('Tour has been updated successfully.');
			},
			error: function(e) {
			}
		});   
	});*/
	$(document).on('click', '#add_euro', function(e) {
	   
		$('.euro_colunm').toggle();
		if($('.euro_colunm').css('display') == 'none')
		{
			$('#hcModal #display_euro_rate').val("0");
			$('#add_euro').val("Add Euro");
		}
		else
		{
			$('#hcModal #display_euro_rate').val("1");
			$('#add_euro').val("Remove Euro");
		}
	});
	 $(document).on('click', '#add_pound', function(e) {
	   
		$('.pound_colunm').toggle();
		if($('.pound_colunm').css('display') == 'none')
		{
			$('#hcModal #display_pound_rate').val("0");
			$('#add_pound').val("Add Pound");
		}
		else
		{
			$('#hcModal #display_pound_rate').val("1");
			$('#add_pound').val("Remove Pound");
		}
	});
	 $(document).on('change', '#select_currency', function(e) {
	   
	   var display_value = $(this).val();
	   if(display_value == 1)
	   {
			$('.pound_colunm').show();
			$('#hcModal #display_pound_rate').val("1");

			$('.euro_colunm').hide();
			$('#hcModal #display_euro_rate').val("0");
	   }
	   else if(display_value == 2)
	   {
			$('.pound_colunm').hide();
			$('#hcModal #display_pound_rate').val("0");

			$('.euro_colunm').show();
			$('#hcModal #display_euro_rate').val("1");
	   }
	   else
	   {
			$('.pound_colunm').show();
			$('#hcModal #display_pound_rate').val("1");

			$('.euro_colunm').show();
			$('#hcModal #display_euro_rate').val("1");
	   }
	});
	  $(document).on('change', '#select_market_option', function(e) {
	   
	   var display_value = $(this).val();
	   if(display_value == 1)
	   {
			$('.pound_colunm_out').show();
			$('.euro_colunm_out').hide();
			$('#hcModal #market_option').val("1");
	   }
	   else if(display_value == 2)
	   {
			$('.pound_colunm_out').hide();
			$('.euro_colunm_out').show();
			$('#hcModal #market_option').val("2");
	   }
	   else
	   {
			$('.pound_colunm_out').show();
			$('.euro_colunm_out').show();
			$('#hcModal #market_option').val("3");
	   }
	});
	 
</script>