{{-- <link rel="stylesheet" href="{{ asset('css/style-products.css') }}">     --}}
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
<script src="https://superal.github.io/canvas2image/canvas2image.js"></script>    
<style type="text/css" media="screen">
    .addProductBtn1 {
        width: 11%;
        height: 48px;
        background: #FCA311;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 10px;
        font-weight: 700;
        letter-spacing: 0px;
        color: #FFFFFF;
        font-size: 1.125;
        border-radius: 5px;
    }

    .checkbox_div {
        color: #14213D;
        display: block;
        position: relative;
        padding-left: 30px;
        margin-bottom: 12px;
        cursor: pointer;
        font-size: 16px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }
    .custom_chkbox {
        position: absolute;
        opacity: 0;
        cursor: pointer;
        height: 0;
        width: 0;
    }
    .checkmark {
        position: absolute;
        top: 0;
        left: 0;
        height: 25px;
        width: 25px;
        border: 1px solid #999;
    }
    .checkbox_div:hover input ~ .checkmark,
    .custom_chkbox:checked ~ .checkmark {
        background-color: #FCA311;
        border-color: #FCA311;
    }
    .checkmark:after {
        content: "";
        position: absolute;
        display: none;
    }
    .custom_chkbox:checked ~ .checkmark:after {
        display: block;
    }
    .checkbox_div .checkmark:after {
        left: 8px;
        top: 1px;
        width: 8px;
        height: 16px;
        border: solid white;
        border-width: 0 3px 3px 0;
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg);
    }
    .fl_w{
        float: left;
        width: 100%;
    }
    .checkarea_part {
        float: left;
        width: 25%;
        display: inline-block;
    }
    .topBox.customchkmain {
        float: left;
        width: 100%;
    }
    .accountContainer .accountRow .middleCol .contentBooking .hiddenFilteres .topBox.customchkmain .heading{
        margin-bottom: 10px;
    }
    .topBox.customchkmain .check_row{
        float: left;
        width: 100%;
        margin-bottom: 15px;
    }
    .rightSidebarDiv .labelCls{
        color:#9A9898
    }
    .accountContainer .accountRow .middleCol .contentBooking .tableWrapper table td{
        padding-left: 20px;
        padding-right: 20px;
    }
    .markCompleted {
        border: 3px solid limegreen !important;
    }
</style>
<div class="middleCol completedBooking" id="middleCol">
    <script>
        var base_url = "{{URL::to('/')}}";
    </script>
    @if(Session::has('success'))
        <div class="alert alert-success">
            {!! session('success') !!}
        </div>
    @elseif(Session::has('error'))
        <div class="alert alert-error">
            {!! session('error') !!}
        </div>
    @endif
    <div class="_contentBooking" style="padding-left: 20px;">
        <h1 class="pageHeaderCls">{{$ToursList->name}}</h1>
        <div class="headerRow">
            {!! Form::open(array('route' => 'tours-add','method'=>'POST', 'enctype' => 'multipart/form-data', 'class'=>'storeProductsForm', 'id'=>'storeProductsForm')) !!}    
               
                <input type="hidden" name="tour_id" class="tour_id" value="{{$ToursList->id}}">
                <input type="hidden" name="tour_type" value="{{($ToursList->tour_type == 2)?1:($ToursList->tour_type == 3?3:2)}}" class="proSectionID">
                <input type="hidden" name="proSectionID" class="proSectionID">
                <input type="hidden" name="thisValCls" class="thisValCls">
                <input type="hidden" name="tourId" class="tourId" value="{{$ToursList->id}}">
                <input type="submit" name="submit" value="New Product" class="orangeLink addProductBtn1" style="background-color: #FCA311; border-color: #FCA311;">
            {!! Form::close() !!}
            <!-- <a class="orangeLink addProductBtn" href="javascript:;">New Product</a>
                <input type="hidden" name="tourId" class="tourId" value="{{$ToursList->id}}"> -->
        </div>
         <div>
           <form method="get" id="CancellationReasonsFrom" class="CancellationReasonsFrom" novalidate="novalidate" action="/super-user/tours/show/<?=$id?>">
            
            <div >
            <select class="form-control" name="product_name" id="product_name" style="width: 20%;float: left;">
                <option value="">Select Name</option>
                <?php if(!empty($ExperienceList)){
                     foreach($ExperienceList as $prow)
                     {
                        ?>
                        <option value="{{ $prow->id }}">{{ $prow->name }}</option>
                        <?php
                     }
                } ?>
                
            </select>
            <input type="submit" class="btn btn-primary ml-4" name="serach_product" value="Search">
            <a href="/super-user/tours/show/<?=$id?>" class="btn btn-primary">Reset</a>
            </div>
           
            </form>
        </div>
        <div class="headerRow">
            <a class="orangeLink" href="{{ route('tours') }}" style="color:#FCA311"> < Back to Product folders</a>
        </div>

        <div class="tableWrapper drag">
            <table id="myTable" class="table">
                <thead>
                    <tr class="headerBooking">
                        <th>Name</th>
                        <th>Hotel</th>
                        <th class="visible">Location</th>
                        <th class="visible">Created by</th>
                        <th class="visible">Last edited</th>
                        <th class="visible">Time booked</th>
                        <th class="visible">Average Loadings</th>
                        <th class="visible">Display Product</th>
                        <th class="visible">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ExperienceList as $experListKey => $experListValue)
                    <?php 
                    // pr($experListValue->ExperienceHotels);
                    $hotel = array();
                    if(!empty($experListValue->ExperienceHotels)){
                        foreach ($experListValue->ExperienceHotels as $key => $value) {
                            
                                $hotel[] = $value->name;
                            
                        }
                    }
                    
                    ?>
                        <tr data-id="{{ $experListValue->id }}" class="openBooking" id="openBooking-{{ $experListValue->id }}">
                            <td class="col-name proListCls"><b>{{ $experListValue->name }}</b></td>
                            <td class="col-name visible">{{ implode(', ',$hotel) }}</td>
                            <?php 
                            $countryName = [];
                            foreach ($experListValue->getCountryAreas as $cKey => $cValue){ 
                                $countryName[] = $cValue->CountryArea->name;
                            } 
							if (!empty($experListValue->updated_at) ) {
								$old_date_timestamp = convert2DMYForHotelDates($experListValue->updated_at);
								$old_date_timestamp1 = strtotime($experListValue->updated_at);
								$new_date = date('l, d F y h:i:s', $old_date_timestamp1);     
							}
							?>
                            <td class="col-cost visible"><?php echo implode(', <br>',$countryName); ?></td>
                            <td class="col-name visible">{{ getUserNames($experListValue->created_by) }}</td>
                            <td class="col-name visible">{{ getUserNames($experListValue->updated_by) }} <br/>( {{$new_date }} )</td>
                            <td class="col-cost visible">0</td>
                            <td class="col-cost visible">0</td>
                            <td class="col-cost visible">
                                <div class="checkarea_part">
                                    <label class="checkbox_div">
                                        <input type="checkbox" name="" value="1" data-id="{{ $experListValue->id }}" class="custom_chkbox activeStatusCls" <?php echo $experListValue->active == '1'?'checked':'' ?> >
                                      <span class="checkmark"></span>
                                    </label>
                                </div>
                            </td>
                        </tr> 
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
<div class="rightCol only-desktop">
    @foreach($ExperienceList as $experListKey => $experListValue)
        <div class="bookingForm" id="rightColInfo-{{ $experListValue->id }}">
            <span class="headingS font25">{{ $experListValue->name }}</span>
            {{-- <span class="headingS3 font18WithMargin10">Average score</span> --}}
            {{-- <span class="headingLLL scorePerCls_1" style="color: green">87%</span> --}}
            
            {{-- <span class="headingS3">HOPS</span> --}}
            <div class="starsBox">
                <div class="titleS">Average score</div>
                <div class="starsRow">
                    <i class="fas fa-star orange"></i>
                    <i class="fas fa-star orange"></i>
                    <i class="fas fa-star orange"></i>
                    <i class="fas fa-star orange"></i>
                    <i class="fas fa-star"></i>
                </div>
            </div>
            <div class="hotelSecSide15">
                <div class="text-center">
                    <!-- <a href="javascript:;" class="disableProductCls" data-id="{{ $experListValue->id }}">Disable Product</a> -->
                    
                    <?php if($experListValue->exp_type == '2'){ ?> 
                        <a target="_blank" href="{{ route('cruise.show', $experListValue->id) }}" class="enableProductCls">Preview Product</a>
                    <?php } else if($experListValue->exp_type == '3'){ ?> 
                        <a target="_blank" href="{{ route('bowling.show', $experListValue->id) }}" class="enableProductCls">Preview Product</a>
                    <?php }else{ ?> 
                        <a target="_blank" href="{{ route('experience.show', $experListValue->id) }}" class="enableProductCls">Preview Product</a>
                    <?php } ?>
                </div>
            </div>
            <div class="hotelSecSide15">
                <div class="text-center">
                    <?php if($experListValue->exp_type == '2'){ ?> 
                        <a href="{{ route('cruise-experiences', $experListValue->id) }}" class="enableProductCls">Edit Product</a>
                    <?php }
                    else if($experListValue->exp_type == '3'){ ?> 
                        <a href="{{ route('bowling-experiences', $experListValue->id) }}" class="enableProductCls">Edit Product</a>
                    <?php }
                    else{ ?> 
                        <a href="{{ route('tours-experiences', $experListValue->id) }}" class="enableProductCls">Edit Product</a>
                    <?php } ?>
                    
                </div>
            </div>
            <!-- <div class="hotelSecSide15">
                <div class="text-center">
                    <a href="{{ route('experience.show', $experListValue->id) }}" class="enableProductCls" target="_blank">View Product</a>
                </div>
            </div>
            <div class="hotelSecSide15">
                <div class="text-center">
                    <a href="javascript:;" class="enableProductCls removeProductBtn" data-id="{{ $experListValue->id }}">Remove Product</a>
                </div>
            </div> -->
            <div class="hotelSecSide15">
                <div class="text-center">
                    <?php if($experListValue->exp_type == '2'){ ?> 
                        <a href="javascript:;" class="enableProductCls editCruiseDocument" data-id="{{ $experListValue->id }}">Edit Documents</a>
                    <?php }else{ ?> 
                        <a href="javascript:;" class="enableProductCls editDocument" data-id="{{ $experListValue->id }}">Edit Documents</a>
                    <?php } ?>
                    
                </div>
            </div>
            <?php 
            $style = '';
            if($experListValue->experience_date != 'available'){
               
                $style = 'style="pointer-events: none;background: lightgray;border: lightgray;"';
            }
            ?>
            <div class="hotelSecSide15">
                <div class="text-center">
                    <?php if($experListValue->exp_type == '2'){ ?> 
                        <a href="javascript:;" class="enableProductCls cruiseManageDatesRates" data-id="{{ $experListValue->id }}" <?php /*echo $style;*/ ?>>Manage tour dates & rates</a>
                    <?php }else{ ?> 
                        <a href="javascript:;" class="enableProductCls manageDatesRates" data-id="{{ $experListValue->id }}" <?php /*echo $style;*/ ?>>Manage tour dates & rates</a>
                    <?php } ?>
                    
                </div>
            </div>
           <!--  <div class="hotelSecSide15">
                <div class="text-center">
                    <a href="javascript:;" class="enableProductCls">Product Notes</a>
                </div>
            </div> -->
            <div class="hotelSecSide15">
                <div class="text-center">
                    <a href="javascript:;" class="enableProductCls MoveLinkCls" data-id="{{ $experListValue->id }}" data-protoid="{{ $experListValue->tour_id }}">Move Product</a>
                </div>
            </div>
            <!-- <div class="hotelSecSide15">
                <div class="text-center">
                    <a href="{{ route('allReviews', $experListValue->id) }}" class="enableProductCls">Reviews</a>
                </div>
            </div> -->
            <?php $review = App\Models\Cms\Reviews::where('experiences_id',$experListValue->id)->where('review_type','1')->first();
            if(!empty($review)){?>
             <div class="hotelSecSide15">
                <div class="text-center">
                    <a class="enableProductCls" data-fancybox data-type="ajax" id="reviewpage_{{ $experListValue->id }}" data-src="" href="{{ route('previewReview', $experListValue->id) }}" >Reviews</a>
                  <!--   <a href="{{ route('previewReview', $experListValue->id) }}" class="enableProductCls">Reviews</a> -->
                </div>
            </div>
            <?php } else { ?> 
                 <div class="hotelSecSide15">
                <div class="text-center">
                <a target="_blank"  class="enableProductCls" href="/acc-superuser-completed">Reviews</a>

                  <!--   <a href="{{ route('previewReview', $experListValue->id) }}" class="enableProductCls">Reviews</a> -->
                </div>
            </div>
            <?php }?>
            <!-- <div class="hotelSecSide15">
                <div class="text-center">
                    <a href="javascript:;" class="enableProductCls">Guest reviews</a>
                </div>
            </div> -->
            <div class="hotelSecSide15">
                <div class="text-center">
                    <a href="javascript:;" class="enableProductCls">Active reviews</a>
                </div>
            </div>
            <div class="hotelSecSide15">
                <div class="text-center">
                    <a href="javascript:;" class="enableProductCls">Analytics</a>
                </div>
            </div>
            <div class="hotelSecSide15">
                <div class="text-center">
                    <a class="enableProductCls" data-toggle="modal" data-target="#buttonsModal{{$experListValue->id}}">
                      Download Assets
                    </a>
                </div>
            </div>
			 <div class="hotelSecSide15">
                <div class="text-center">
                    <a href="javascript:;" class="enableProductCls DuplicateTourCls" data-id="{{ $experListValue->id }}" data-protoid="{{ $experListValue->tour_id }}">Duplicate Tour</a>
                </div>
            </div>
        </div>
		
         <div class="modal fade" id="buttonsModal{{$experListValue->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel{{$experListValue->id}}" aria-hidden="true">
		  <?php 
				  $cart_experiences = 


DB::connection('mysql_veenus')->table('experiences')->where('id', $experListValue->id)->first();
			?>
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel{{$experListValue->id}}">Download Assets</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
				 
                    <button class="btn btn-warning downloadAssets" data-attr="{{(isset($cart_experiences->name) ? $cart_experiences->name : 'Veenus')}}" data-url="{{ route('download-assets2', $experListValue->id) }}">Download Images</button>
					
                    <a class="btn btn-warning" href="{{ route('download-doc2', $experListValue->id) }}">Download Document</a>
                    <a class="btn btn-warning" href="javascript:;" data-toggle="modal" data-target="#brochurDownload{{$experListValue->id}}" data-id="{{ $experListValue->id }}" id="downloadBrochurePrice" data-dismiss="modal" style="background: orange;color: #fff;border-color: orange;font-weight: bold;margin-top: 10px;">Download Brochure</a>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal fade downloadBrochurePriceContent" id="brochurDownload{{$experListValue->id}}" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
			<?php 
			$brochures = 


DB::connection('mysql_veenus')->table('brochures')->where('experience_id',$experListValue->id )->first();	
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
                        <div class="col-sm-6"><input type="text" id="rate_pp_new" class="form-control 123" name="step9[rate_pp]" value="{{(isset($brochures->rate_pp) ? $brochures->rate_pp : '')}}"placeholder="Sharing price pp"></div>
                        <div class="col-sm-6"><input type="text" id="srs_pp_new" class="form-control" name="step9[srs_pp]" value="{{(isset($brochures->srs_pp) ? $brochures->srs_pp : '')}}" placeholder="Single price pp"></div>
						
                    </div>
					<br/>
					<p>Please enter your telephone number and email address to show on the Brochure.</p>
					 <div class="row">
                        <div class="col-sm-6"><input type="text" id="brochure_tel" class="form-control 456" name="brochure_tel" value="" placeholder="Telephone Number"></div>
                        <div class="col-sm-6"><input type="email" id="brochure_email" class="form-control" name="brochure_email" value="" placeholder="Email"></div>
						
                    </div>
                  </div>
				  
					<!--<div class="downloadBrochureAppendCls">

					</div>-->
				
                  <div class="modal-footer">
                    <a class="btn btn-warning" href="#" style="background: orange;color: #fff;border-color: orange;font-weight: bold;" data-id="{{ $experListValue->id }}" id="downloadBrochureImage">Preview</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
			
    @endforeach
</div>

<div class="modal fade" id="prototypeMoveModal" tabindex="-1" role="dialog" aria-labelledby="addFolderModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: calc(100% - (1.75rem * 50));">
        <div class="modal-content">
            {!! Form::open(array('route' => 'experiences-move-update','method'=>'POST', 'enctype' => 'multipart/form-data', 'class'=>'moveProductsForm', 'id'=>'moveProductsForm')) !!}    
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Move Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" >
                        <input type="hidden" class="form-control" id="productMoveId" name="product_id" value="">
                        <input type="hidden" class="form-control" id="proToMoveId" name="proToId" value="">
                    <div class="form-group">
                        <label for="exampleInputEmail1" style="color: gray;">Tours</label>
                        <div class="formGroupCls">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="proSectionID" class="proSectionID">
                    <input type="hidden" name="thisValCls" class="thisValCls">
                    <button type="button" class="btn btn-secondary cancel" data-dismiss="modal">Cancel</button>
                    <input type="submit" name="submit" value="Save" class="btn btn-primary create" style="background-color: #FCA311; border-color: #FCA311;">
                </div>
            {!! Form::close() !!}

            
        </div>
    </div>
</div>

<div class="modal fade" id="prototypeNotesModal" tabindex="-1" role="dialog" aria-labelledby="addFolderModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: calc(100% - (1.75rem * 50));">
        <div class="modal-content">
            {!! Form::open(array('route' => 'tours-add','method'=>'POST', 'enctype' => 'multipart/form-data', 'class'=>'storeProductsForm', 'id'=>'storeProductsForm')) !!}    
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">New Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" >
                    <div class="form-group">
                        <label for="exampleInputEmail1" style="color: gray;">Choose product type</label>
                        <select name="tour_type" class="tour_type form-control ">
                            <option value="">Select Type</option>
                            <option value="1">Cruise</option>
                            <option value="2">Standard</option>
                        </select>
                        <input type="hidden" name="tour_id" class="tour_id" value="{{$ToursList->id}}">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="proSectionID" class="proSectionID">
                    <input type="hidden" name="thisValCls" class="thisValCls">
                    <button type="button" class="btn btn-secondary cancel" data-dismiss="modal">Cancel</button>
                    <input type="submit" name="submit" value="Create" class="btn btn-primary create" style="background-color: #FCA311; border-color: #FCA311;">
                </div>
            {!! Form::close() !!}

            
        </div>
    </div>
</div>
<div class="modal fade" id="removeTourModal" tabindex="-1" role="dialog" aria-labelledby="addFolderModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Are you sure you want to remove this Product?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(array('route' => 'experiences-remove','method'=>'POST', 'enctype' => 'multipart/form-data', 'class'=>'addPrototypeNameForm', 'id'=>'addPrototypeNameForm')) !!}
            <input type="hidden" name="experiences_id" class="experiences_id">
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary cancel" data-dismiss="modal">Cancel</button>
                
                <input type="submit" name="submit" value="Remove" class="btn btn-primary create">
            </div>
        {!! Form::close() !!}
    </div>
  </div>
</div>

<div class="modal fade" id="removePrototypeModal" tabindex="-1" role="dialog" aria-labelledby="addFolderModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Are you sure you want to remove this Product?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       {!! Form::open(array('route' => 'tours-product-remove','method'=>'POST', 'enctype' => 'multipart/form-data', 'class'=>'addPrototypeNameForm', 'id'=>'addPrototypeNameForm')) !!}
            <input type="hidden" name="id" class="prototype_id">
            <input type="hidden" name="tourId" class="tourId" value="{{$ToursList->id}}">
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary cancel" data-dismiss="modal">Cancel</button>
                {{-- <button type="button" class="btn btn-primary create">Create</button> --}}
                <input type="submit" name="submit" value="Remove" class="btn btn-primary create">
            </div>
        {!! Form::close() !!}
    </div>
  </div>
</div>

<div class="modal fade bd-example-modal-lg" id="editDocModal" tabindex="-1" role="dialog" aria-labelledby="addFolderModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 1100px;">
    <div class="modal-content">
      <div class="modal-body">
        <div class="tour_documents_edit_popup" style="position: relative;padding: 0;">
            <div class="popup_content">
                <div class="heading tour_head" style="margin-bottom: 15px;">
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
                    Dates
                </div>
                <div id="appendHtml"></div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

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
<div class="modal fade bd-example-modal-lg" id="tpModal" tabindex="-1" role="dialog" aria-labelledby="addFolderModalTitle" aria-hidden="true" style="overflow-y: auto;">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 1500px;">
        <div class="modal-content tpModalAppendCls">

        </div>
    </div>
</div>
<div class="modal fade bd-example-modal-lg" id="editDatesRatesModal" tabindex="-1" role="dialog" aria-labelledby="addFolderModalTitle" aria-hidden="true" style="overflow-y: auto;">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 1500px;">
        <div class="modal-content datesRatesModalAppendCls">

        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" id="downloadBrochureModal" tabindex="-1" role="dialog" aria-labelledby="addFolderModalTitle" aria-hidden="true" style="overflow-y: auto;">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 900px;">
        <div class="modal-content downloadBrochureAppendCls">

        </div>
    </div>
</div>

<div class="modal fade" id="prototypeDuplicateModal" tabindex="-1" role="dialog" aria-labelledby="addFolderModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: calc(100% - (1.75rem * 50));">
        <div class="modal-content">
            {!! Form::open(array('route' => 'tour-duplicate','method'=>'POST', 'enctype' => 'multipart/form-data', 'class'=>'duplicateProductsForm', 'id'=>'duplicateProductsForm')) !!}    
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Duplicate Tour</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" >
                        <input type="hidden" class="form-control" id="productMoveId" name="product_id" value="">
                        <input type="hidden" class="form-control" id="proToMoveId" name="proToId" value="">
                    <div class="form-group">
                        <!--<label for="exampleInputEmail1" style="color: gray;">Tours</label>-->
                        <div class="formGroupCls">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="proSectionID" class="proSectionID">
                    <input type="hidden" name="thisValCls" class="thisValCls">
                    <button type="button" class="btn btn-secondary cancel" data-dismiss="modal">Cancel</button>
                    <input type="submit" name="submit" value="Duplicate" class="btn btn-primary create" style="background-color: #FCA311; border-color: #FCA311;">
                </div>
            {!! Form::close() !!}

            
        </div>
    </div>
</div>
<!-- Modal -->
                <div class="modal fade" id="resignNoteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add a new note</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                          <form method="POST" enctype="multipart/form-data" id="ajax-file-upload1" class="super_add">
                           
                            @csrf
                            <!-- <input type="text" maxlength="10" name="initials" id="initials" placeholder="Initials">
                            <p class="initials_cls" style="color: red;"></p>
                            <br> -->
                           
                            <input type="hidden" name="cart_id" id="cart_id" value="">
                            <input type="hidden" name="user_type" id="user_type" value="1">
                            <p>Please state the reason for this amendment</p>
                            <textarea type="text" class="form-control" name="notes" id="notes" placeholder="Type here" rows="7"></textarea>
                            <!-- <input type="text" class="form-control" name="notes" id="notes" placeholder="Type here" rows="7"> -->
                            <p class="notes_cls" style="color: red;"></p>                                           
                           
                            <!-- <button type="submit" class="mt-2 btn btn-primary" id="add_notes" style="max-width: 500px;">
                                Add Note
                            </button> -->
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary"  id="add_notes" >Add Note</button>
                      </div>
                    </div>
                  </div>
                </div>

 <script>
     $(document).ready(function(){
    <?php if(!empty($exp_id)) { ?> 
        var id = '<?=$exp_id?>';
        $('.loader').show();    
        $.ajax({
            url: base_url+'/super-user/edit-documents-tours',
            type: 'POST',
            data: {'exp_id':id},
            success: function(data) {
                $('#appendHtml').html(data.html);
                $('.loader').hide();  
                $('.tour_head').html(data.tour_name);
                $('#editDocModal').modal('show');
            },
            error: function(e) {
            }
        }); 

    <?php } ?>
    <?php if(!empty($tour_id) && !empty($page)) { ?> 
        var tour_id = '<?=$tour_id?>';
        var page = '<?=$page?>';
        $('#reviewpage_'+tour_id).trigger('click');

    <?php } ?>
     }); 
    $(document).ready(function(){
        $('.unbookedDate').hide();
        $('.pastDate').hide();
    });
	 $(document).on('click', '#downloadBrochurePrice1', function(e) {
        e.preventDefault();
        var exp_id = $(this).attr('data-id');
        //var dates_rates_id = $(this).attr('dates_rates_id');
         
        $.ajax({
            url: base_url+'/super-user/add-brochure-price',
            type: 'POST',
            data: {'exp_id':exp_id},
            success: function(data) {
				console.log(data.response); 
                //$('.loader').hide();  
                //$('#downloadBrochureModalCls').html(data.response); 
               
            },
            error: function(e) {
            }
        });   
    }); 
 
 
	$(document).on('click', '#downloadBrochureImage', function(e) {
        e.preventDefault();
        var exp_id = $(this).attr('data-id');
        var rate_pp_new = $(this).parent().parent().find('#rate_pp_new').val();
        var srs_pp_new = $(this).parent().parent().find('#srs_pp_new').val();
        var brochure_tel = $(this).parent().parent().find('#brochure_tel').val();
        var brochure_email = $(this).parent().parent().find('#brochure_email').val();
        
		console.log('rate_pp_new'+rate_pp_new);
		console.log('srs_pp_new'+srs_pp_new);
		console.log('brochure_tel'+brochure_tel);
		console.log('brochure_email'+brochure_email);
        $('.loader').show();    
        $.ajax({
            url: base_url+'/super-user/download-brochure-image',
            type: 'POST',
            data: {'exp_id':exp_id, 'rate_pp_new':rate_pp_new, 'srs_pp_new':srs_pp_new, 'brochure_tel':brochure_tel, 'brochure_email':brochure_email},
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
 
    $("tr.openBooking").bind("click", function(){
        var cartExperienceId = $(this).data("id");
        $("tr.openBooking").removeClass("active");
        $(this).addClass("active");
        $(".bookingForm").hide();
        $("#rightColInfo-"+cartExperienceId).show();
    });
    $(document).on('change', '.confirmation', function() {
        return confirm('Are you sure?');
    });
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
            $(document).on('change', '.confirmation', function() {
                return confirm('Are you sure?');
            });
        }
    });
    $(document).on('change', '#checkDates', function() {
        var id = $(this).val();
        if(id == 1){
            $('.bookDates').hide();
            $('.pastDates').hide();
            $('.unbookDates').hide();
            $('.saleDates').show();
        }else if(id == 2){
            $('.bookDates').show();
            $('.unbookDates').hide();
            $('.pastDates').hide();
            $('.saleDates').hide();
        }else if(id == 3){
            $('.pastDates').show();
            $('.unbookDates').hide();
            $('.bookDates').hide();
            $('.saleDates').hide();
        }else if(id == 4){
            $('.unbookDates').show();
            $('.pastDates').hide(); 
            $('.bookDates').hide();
            $('.saleDates').hide();
        }
    });
    $(document).on('click', '.editDocument', function() {
        $('#checkBookings').val('1');
        var id = $(this).attr('data-id');
        $('.loader').show();    
        $.ajax({
            url: base_url+'/super-user/edit-documents-tours',
            type: 'POST',
            data: {'exp_id':id},
            success: function(data) {
                if(jQuery( "#checkBookings option:selected" ).val() == 3 ) {
					
					$('#appendHtml').empty().html(data.newHtml);
				}else if(jQuery( "#checkBookings option:selected" ).val() == 2  || jQuery( "#checkBookings option:selected" ).val() == 1 ) {
					$('#appendHtml').empty().html(data.html);
				}
				//$('#appendHtml').html(data.html);
                $('.loader').hide();  
                $('#editDocModal').modal('show');
            },
            error: function(e) {
            }
        });   
    });
    $(document).on('click', '.editCruiseDocument', function() {
        $('#checkBookings').val('1');
        var id = $(this).attr('data-id');
        $('.loader').show();    
        $.ajax({
            url: base_url+'/super-user/edit-documents-cruise',
            type: 'POST',
            data: {'exp_id':id},
            success: function(data) {
                if(jQuery( "#checkBookings option:selected" ).val() == 3 ) {
                    
                    $('#appendHtml').empty().html(data.newHtml);
                }else if(jQuery( "#checkBookings option:selected" ).val() == 2  || jQuery( "#checkBookings option:selected" ).val() == 1 ) {
                    $('#appendHtml').empty().html(data.html);
                }
                //$('#appendHtml').html(data.html);
                $('.loader').hide();  
                $('#editDocModal').modal('show');
            },
            error: function(e) {
            }
        });   
    });
    
    $(document).on('click', '.manageDatesRates', function() {
        var id = $(this).attr('data-id');
        $('.loader').show();    
        $.ajax({
            url: base_url+'/super-user/manage-dates-rates',
            type: 'POST',
            data: {'exp_id':id},
            success: function(data) {
                $('.datesRatesModalAppendCls').html(data.html);
                $('.loader').hide();  
                $('#editDatesRatesModal').modal('show');
            },
            error: function(e) {
            }
        });   
    });
    $(document).on('click', '.cruiseManageDatesRates', function() {
        var id = $(this).attr('data-id');
        $('.loader').show();    
        $.ajax({
            url: base_url+'/super-user/manage-cruise-dates-rates',
            type: 'POST',
            data: {'exp_id':id},
            success: function(data) {
                $('.datesRatesModalAppendCls').html(data.html);
                $('.loader').hide();  
                $('#editDatesRatesModal').modal('show');
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
     $(document).on('click', '.expDateClickCBC', function() {
        var exp_date_id = $(this).attr('data-id');
        var exp_id = $(this).attr('data-exid');
        $('.loader').show();    
        $.ajax({
            url: base_url+'/super-user/edit-cbc',
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
     $(document).on('click', '.expDateClickCC', function() {
        var exp_date_id = $(this).attr('data-id');
        var exp_id = $(this).attr('data-exid');
        $('.loader').show();    
        $.ajax({
            url: base_url+'/super-user/edit-cc',
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
    $(document).on('click', '.tpDateClick', function() {
        var exp_date_id = $(this).attr('data-id');
        var exp_id = $(this).attr('data-exid');
        $('.loader').show();    
        $.ajax({
            url: base_url+'/super-user/edit-tp',
            type: 'POST',
            data: {'exp_id':exp_id,'exp_date_id':exp_date_id},
            success: function(data) {
                $('.tpModalAppendCls').html(data.response);
                $('.loader').hide();  
                $('#editDocModal').modal('hide');
                $('#tpModal').modal('show');
            },
            error: function(e) {
            }
        });   
    });
    $(document).on('click', '.tdsDateClick', function() {
        var exp_date_id = $(this).attr('data-id');
        var exp_id = $(this).attr('data-exid');
        $('.loader').show();    
        $.ajax({
            url: base_url+'/super-user/edit-tds',
            type: 'POST',
            data: {'exp_id':exp_id,'exp_date_id':exp_date_id},
            success: function(data) {
                $('.tpModalAppendCls').html(data.response);
                $('.loader').hide();  
                $('#editDocModal').modal('hide');
                $('#tpModal').modal('show');
            },
            error: function(e) {
            }
        });   
    });
    //add flag if change
    $("body").on('change', '.text_change', function(){ 
        //var edit_class = $(this).parent().parent().parent().children().children(".editDate").hasClass('booked_hotel');
        if($('#markAsCompleted').hasClass('booked_hotel'))
        {

            $('#is_changed').val('1');
        }
        if($('#unmarkAsCompleted').hasClass('booked_hotel'))
        {

            $('#is_changed').val('1');
        }
    });
    $(document).on('click', '#add_notes', function(e) {
        //alert($('#notes').val());
        $("#changed_note").removeAttr("style");
        $('body #changed_note').text($('#notes').val());
        $('#is_changed').val('');
        $('#resignNoteModal').modal('hide');
        //$('#stocklistHotebodylDatesCreateForm').submit();
        $('#markAsCompleted').removeClass('booked_hotel');
        $//('#markAsCompleted').trigger('click');
        $('#markAsCompleted').click();
    });
    $(document).on('click', '#markAsCompleted', function() {
       if($(this).hasClass('booked_hotel'))
       {
        if(confirm("By confirming this change the Collaborator will need to re-sign the ETC. Please confirm this is ok with you?"))
        {
            var exp_date_id = $(this).attr('data-id');
            var sign_name = $('#sign_name').val();
            var changed_note = $('#changed_note').val();
            if(sign_name != ''){
                var is_changed = $('#is_changed').val();
               if(is_changed == 1)
               {
                     $('#notes').val('');
                    $('#resignNoteModal').modal('show');
                    return false;
                    //$(window).scrollTop(0);
               }
               else
               {
                    $('.loader').show();    
                    $.ajax({
                        url: base_url+'/super-user/mark-as-completed-etc',
                        type: 'POST',
                        data: {'exp_date_id':exp_date_id,'sign_name_etc':sign_name,'changed_note':changed_note},
                        success: function(data) {
                            $('.loader').hide();  
                            $('#saveEtcForm').click();  
                            // $('#etcModal').modal('hide');
                            // toastSuccess('Tour has been updated successfully.');
                        },
                        error: function(e) {
                        }
                    });
               }
                  
            }else{
                toastError('Please select signature dropdown.');
            }
        }
        else
        {
            return false;
        }
      }
      else
      {
        var exp_date_id = $(this).attr('data-id');
        var sign_name = $('#sign_name').val();
        var changed_note = $('#changed_note').val();
        if(sign_name != ''){
            $('.loader').show();    
            $.ajax({
                url: base_url+'/super-user/mark-as-completed-etc',
                type: 'POST',
                data: {'exp_date_id':exp_date_id,'sign_name_etc':sign_name,'changed_note':changed_note},
                success: function(data) {
                    $('.loader').hide();  
                    $('#saveEtcForm').click();  
                    // $('#etcModal').modal('hide');
                    // toastSuccess('Tour has been updated successfully.');
                },
                error: function(e) {
                }
            });   
        }else{
            toastError('Please select signature dropdown.');
        }
      }
    });
    $(document).on('click', '#markAsCompletedCBC', function() {
       if($(this).hasClass('booked_hotel'))
       {
        if(confirm("By confirming this change the Collaborator will need to re-sign the ETC. Please confirm this is ok with you?"))
        {
            var exp_date_id = $(this).attr('data-id');
            var sign_name = $('#sign_name').val();
            var changed_note = $('#changed_note').val();
            if(sign_name != ''){
                var is_changed = $('#is_changed').val();
               if(is_changed == 1)
               {
                     $('#notes').val('');
                    $('#resignNoteModal').modal('show');
                    return false;
                    //$(window).scrollTop(0);
               }
               else
               {
                    $('.loader').show();    
                    $.ajax({
                        url: base_url+'/super-user/mark-as-completed-cbc',
                        type: 'POST',
                        data: {'exp_date_id':exp_date_id,'sign_name_etc':sign_name,'changed_note':changed_note},
                        success: function(data) {
                            $('.loader').hide();  
                            $('#saveEtcForm').click();  
                            // $('#etcModal').modal('hide');
                            // toastSuccess('Tour has been updated successfully.');
                        },
                        error: function(e) {
                        }
                    });
               }
                  
            }else{
                toastError('Please select signature dropdown.');
            }
        }
        else
        {
            return false;
        }
      }
      else
      {
        var exp_date_id = $(this).attr('data-id');
        var sign_name = $('#sign_name').val();
        var changed_note = $('#changed_note').val();
        if(sign_name != ''){
            $('.loader').show();    
            $.ajax({
                url: base_url+'/super-user/mark-as-completed-cbc',
                type: 'POST',
                data: {'exp_date_id':exp_date_id,'sign_name_etc':sign_name,'changed_note':changed_note},
                success: function(data) {
                    $('.loader').hide();  
                    $('#saveEtcForm').click();  
                    // $('#etcModal').modal('hide');
                    // toastSuccess('Tour has been updated successfully.');
                },
                error: function(e) {
                }
            });   
        }else{
            toastError('Please select signature dropdown.');
        }
      }
    });
    $(document).on('click', '#markAsCompletedCC', function() {
      
        var exp_date_id = $(this).attr('data-id');
        var sign_name = $('#sign_name').val();
        var changed_note = $('#changed_note').val();
        if(sign_name != ''){
            $('.loader').show();    
            $.ajax({
                url: base_url+'/super-user/mark-as-completed-cc',
                type: 'POST',
                data: {'exp_date_id':exp_date_id,'sign_name_etc':sign_name,'changed_note':changed_note},
                success: function(data) {
                    $('.loader').hide();  
                    $('#saveEtcForm').click();  
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
        var display_euro_rate = $('#display_euro_rate').val();
        var display_pound_rate = $('#display_pound_rate').val();
        var market_option = $('#market_option').val();
         var formData = $("#hcForm").serialize();
        if(sign_name_hc != ''){
            $('.loader').show();    
            $.ajax({
                url: base_url+'/super-user/mark-as-completed-hc',
                type: 'POST',
                data: {'exp_date_id':exp_date_id,'sign_name_hc':sign_name_hc,'display_euro_rate':display_euro_rate,'display_pound_rate':display_pound_rate,'market_option':market_option,'formData':formData},
                success: function(data) {
                    $('.loader').hide();  
                    $('#saveHcForm').click();
                    // $('#hcModal').modal('hide');
                    // toastSuccess('Tour has been updated successfully.');
                },
                error: function(e) {
                }
            });
        }else{
            toastError('Please select a signature for this date in Stock List.');
        }   
    });
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
                $('#saveTdsForm1').click();
                // $('#tpModal').modal('hide');
                // toastSuccess('Tour has been updated successfully.');
            },
            error: function(e) {
            }
        });   
    });
    /*$(document).on('click', '#unmarkAsCompleted', function() {
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
            },
            error: function(e) {
            }
        });   
    });*/
    $(document).on('click', '#unmarkAsCompletedTP', function() {
        var exp_date_id = $(this).attr('data-id');
        $('.loader').show();    
        $.ajax({
            url: base_url+'/super-user/unmark-as-completed-tp',
            type: 'POST',
            data: {'exp_date_id':exp_date_id},
            success: function(data) {
                $('.loader').hide();  
                $('#tpModal').modal('hide');
                toastSuccess('Tour has been updated successfully.');
            },
            error: function(e) {
            }
        });   
    });
    $(document).on('click', '#unmarkAsCompleted', function() {
       if($(this).hasClass('booked_hotel'))
       {
        if(confirm("By confirming this change the Collaborator will need to re-sign the ETC. Please confirm this is ok with you?"))
        {
            var exp_date_id = $(this).attr('data-id');
            var sign_name = $('#sign_name').val();
            var changed_note = $('#changed_note').val();
            if(sign_name != ''){
                var is_changed = $('#is_changed').val();
               if(is_changed == 1)
               {
                     $('#notes').val('');
                    $('#resignNoteModal').modal('show');
                    return false;
                    //$(window).scrollTop(0);
               }
               else
               {
                    $('.loader').show();    
                    $.ajax({
                        url: base_url+'/super-user/unmark-as-completed-etc',
                        type: 'POST',
                        data: {'exp_date_id':exp_date_id},
                        success: function(data) {
                            $('.loader').hide();  
                            $('#etcModal').modal('hide');
                            toastSuccess('Tour has been updated successfully.');
                        },
                        error: function(e) {
                        }
                    });  
               }
                  
            }else{
                toastError('Please select signature dropdown.');
            }
        }
        else
        {
            return false;
        }
      }
      else
      {
        var exp_date_id = $(this).attr('data-id');
        var sign_name = $('#sign_name').val();
        var changed_note = $('#changed_note').val();
        if(sign_name != ''){
            $('.loader').show();    
            $.ajax({
                url: base_url+'/super-user/unmark-as-completed-etc',
                type: 'POST',
                data: {'exp_date_id':exp_date_id},
                success: function(data) {
                    $('.loader').hide();  
                    $('#etcModal').modal('hide');
                    toastSuccess('Tour has been updated successfully.');
                },
                error: function(e) {
                }
            });     
        }else{
            toastError('Please select signature dropdown.');
        }
      }
    });
     $(document).on('click', '#unmarkAsCompletedCBC', function() {
       if($(this).hasClass('booked_hotel'))
       {
        if(confirm("By confirming this change the Collaborator will need to re-sign the ETC. Please confirm this is ok with you?"))
        {
            var exp_date_id = $(this).attr('data-id');
            var sign_name = $('#sign_name').val();
            var changed_note = $('#changed_note').val();
            if(sign_name != ''){
                var is_changed = $('#is_changed').val();
               if(is_changed == 1)
               {
                     $('#notes').val('');
                    $('#resignNoteModal').modal('show');
                    return false;
                    //$(window).scrollTop(0);
               }
               else
               {
                    $('.loader').show();    
                    $.ajax({
                        url: base_url+'/super-user/unmark-as-completed-cbc',
                        type: 'POST',
                        data: {'exp_date_id':exp_date_id},
                        success: function(data) {
                            $('.loader').hide();  
                            $('#etcModal').modal('hide');
                            toastSuccess('Tour has been updated successfully.');
                        },
                        error: function(e) {
                        }
                    });  
               }
                  
            }else{
                toastError('Please select signature dropdown.');
            }
        }
        else
        {
            return false;
        }
      }
      else
      {
        var exp_date_id = $(this).attr('data-id');
        var sign_name = $('#sign_name').val();
        var changed_note = $('#changed_note').val();
        if(sign_name != ''){
            $('.loader').show();    
            $.ajax({
                url: base_url+'/super-user/unmark-as-completed-etc',
                type: 'POST',
                data: {'exp_date_id':exp_date_id},
                success: function(data) {
                    $('.loader').hide();  
                    $('#etcModal').modal('hide');
                    toastSuccess('Tour has been updated successfully.');
                },
                error: function(e) {
                }
            });     
        }else{
            toastError('Please select signature dropdown.');
        }
      }
    });
     $(document).on('click', '#unmarkAsCompletedCC', function() {
       var exp_date_id = $(this).attr('data-id');
        var sign_name = $('#sign_name').val();
        var changed_note = $('#changed_note').val();
        if(sign_name != ''){
            $('.loader').show();    
            $.ajax({
                url: base_url+'/super-user/unmark-as-completed-cc',
                type: 'POST',
                data: {'exp_date_id':exp_date_id},
                success: function(data) {
                    $('.loader').hide();  
                    $('#etcModal').modal('hide');
                    toastSuccess('Tour has been updated successfully.');
                },
                error: function(e) {
                }
            });     
        }else{
            toastError('Please select signature dropdown.');
        }
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
        $.ajax({
            url: urls,
            type: 'POST',
            success: function(data) {
				console.log(data);
                $('.loader').hide();
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
</script>
<script type="text/javascript">
    $(document).on('click', '.saveDates', function() {
        $('.submitButton').click();
    });
    $(document).on('click', '.submitButton', function() {
           // alert('hi');
            
           var is_changed = $('#is_changed').val();
           if(is_changed == 1)
           {
                 
                $('#resignNoteModal').modal('show');
                return false;
                //$(window).scrollTop(0);
           }
           else
           {
            return true;
            //$('#tourCompleteSteps').submit();
           }
          
         });
     $("body").on('blur', '.form-control', function(){ 
        //alert('hi');
        //var edit_class = $(this).parent().parent().parent().children().children(".editDate").hasClass('booked_hotel');
        if($(this).parent().parent().parent().children().children(".editDate").hasClass('booked_hotel'))
        {
            var cart_id = $(this).parent().parent().parent().children().children(".editDate").attr('data-cart_id');
            $('#is_changed').val('1');
            $('.selected_tour').append('<input type="hidden" name="selected_tour[]" value="'+cart_id+'">');
        }
        
    });
      $(document).on('click', '#add_notes', function(e) {
        //alert($('#notes').val());
        $("#changed_note").removeAttr("style");
        $('body #changed_note').text($('#notes').val());
        $('#is_changed').val('');
        $('#resignNoteModal').modal('hide');
        //$('#stocklistHotebodylDatesCreateForm').submit();
        $('.submitButton').trigger('click');
    });
    $(document).on('click', '.editDate', function() {
        
        if($(this).hasClass('booked_hotel'))
    {
        if(confirm("By confirming this change the Collaborator will need to re-sign the ETC. Please confirm this is ok with you?"))
        {
              var pointerNone = $(this).closest('.parentDiv').find('.pointerNone');
                var saveDates = $(this).closest('.parentDiv').find('.saveDates');
                var labelDiv = $(this).closest('.parentDiv').find('.labelDiv');
                labelDiv.hide();
                var radioDiv = $(this).closest('.parentDiv').find('.radioDiv');
                radioDiv.show();
                var removeHotelDiv = $(this).closest('.parentDiv').find('.removeHotelDiv');
                removeHotelDiv.show();
                var parentDiv = $(this).closest('.parentDiv');
                parentDiv.css('border-color','orange');
                var addHotel = $(this).closest('.parentDiv').find('.addHotel');
                pointerNone.removeAttr('readonly');
                pointerNone.removeAttr('disabled');
                pointerNone.removeClass('pointerNone');
                $('.editDate').hide();
                $('.addAnotherDate').hide();
                saveDates.show();
                addHotel.show();

        }
        else
        {
            return false;
        }
    }
    else
    {
         var pointerNone = $(this).closest('.parentDiv').find('.pointerNone');
        var saveDates = $(this).closest('.parentDiv').find('.saveDates');
        var labelDiv = $(this).closest('.parentDiv').find('.labelDiv');
        labelDiv.hide();
        var radioDiv = $(this).closest('.parentDiv').find('.radioDiv');
        radioDiv.show();
        var removeHotelDiv = $(this).closest('.parentDiv').find('.removeHotelDiv');
        removeHotelDiv.show();
        var parentDiv = $(this).closest('.parentDiv');
        parentDiv.css('border-color','orange');
        var addHotel = $(this).closest('.parentDiv').find('.addHotel');
        pointerNone.removeAttr('readonly');
        pointerNone.removeAttr('disabled');
        pointerNone.removeClass('pointerNone');
        $('.editDate').hide();
        $('.addAnotherDate').hide();
        saveDates.show();
        addHotel.show();
    }
    
       
    });
    $(document).on('click', '.removeHotelDiv', function() {
        var exp_dates_id  = $(this).attr('data-id');
        if(exp_dates_id != ''){
            var _this = $(this);
            $('.loader').show();   
            $.ajax({
                url: base_url+'/super-user/delete-hotel-date-rate',
                type: 'POST',
                 // dataType: 'json',
                data: {'experience_dates_id':exp_dates_id},
                success: function(data) {
                    $('.loader').hide(); 
                    _this.closest('.hotelDiv').remove();
                },
                error: function(e) {
                }
            });
        }else{
            $(this).closest('.hotelDiv').remove();
        }
    });
    $(document).on('click', '.removeDatesRates', function() {
        if(confirm('When you remove this date you will also remove the documents as well. Please confirm this is ok?'))
        {
            var exp_dates_rates_id  = $(this).attr('data-id');
            if(exp_dates_rates_id != ''){
                var _this = $(this);
                $('.loader').show();   
                $.ajax({
                    url: base_url+'/super-user/delete-exp-dates-rates',
                    type: 'POST',
                     // dataType: 'json',
                    data: {'experience_dates_rates_id':exp_dates_rates_id},
                    success: function(data) {
                        $('.loader').hide(); 
                        _this.closest('.parentDiv').remove();
                    },
                    error: function(e) {
                    }
                });
            }
        }
        else
        {
            return false;
        }
        
    });
    $(document).on('click', '.removeCruiseDatesRates', function() {
        if(confirm('When you remove this date you will also remove the documents as well. Please confirm this is ok?'))
        {
            var exp_dates_rates_id  = $(this).attr('data-id');
            if(exp_dates_rates_id != ''){
                var _this = $(this);
                $('.loader').show();   
                $.ajax({
                    url: base_url+'/super-user/delete-cruise-exp-dates-rates',
                    type: 'POST',
                     // dataType: 'json',
                    data: {'experience_dates_rates_id':exp_dates_rates_id},
                    success: function(data) {
                        $('.loader').hide(); 
                        _this.closest('.parentDiv').remove();
                    },
                    error: function(e) {
                    }
                });
            }
        }
        else
        {
            return false;
        }
        
    });
    $(document).on('click', '.removeParentDiv', function() {
        $(this).closest('.parentDiv').remove();
        $('.editDate').show();
        $('.addAnotherDate').show();
    });
     $('.decimal').keypress(function(evt){
        return (/^[0-9]*\.?[0-9]*$/).test($(this).val()+evt.key);
    });
    $(document).on('click', '.addAnotherDateCruise', function() {

        $('.editDate').hide();
        $(this).hide();
        var parentDivlast = $('.appendParentDiv').find('.parentDiv:last');
        var parentDivKey = parseInt(parentDivlast.attr('data-key'));
        const sum = parentDivKey + 1;

        var htmls = '';
        htmls += '<div class="parentDiv tour_summary_container" data-key="'+sum+'" style="border: 3px solid #ddd;border-radius: 5px;margin: 15px 0px;min-height: 100px;padding:10px;">\
                    <a href="javascript:;" style="float: right;color: #fff;background: red;padding: 3px 8px;top: -15px;position: relative;right: -15px;border-radius: 50%;font-size: 12px;" class="removeParentDiv"><i class="fa fa-times fa-2x"></i></a>\
                    <input type="hidden" name="step8[tour]['+sum+'][dates_rates_id]" value="">\
                        <div class="appendHotel">\
                            <div class="hotelDiv" data-key="0">\
                                <div style="border: 1px solid #ddd;border-radius: 5px;margin: 15px;padding: 20px;">\
                                    <div class="form-group">\
                                        <input type="hidden" name="step8[tour]['+sum+'][hotel][0][experience_hotel_date_id]" value="">\
                                        <input type="hidden" name="step8[tour]['+sum+'][hotel][0][experience_date_id]" value="">\
                                        <label>Choose a ship</label>\
                                        <select class="form-control shipDropDown ship_id_'+sum+'" data-cnt='+sum+' name="step8[tour]['+sum+'][hotel][0][hotel_id]" required="">\
                                            <option value="">Select One</option>\
                                            <?php 
                                                if(!empty($shipList)){
                                                foreach ($shipList as $key => $value) {
                                                 ?>
                                                    <option value="{{$value->id}}">{{$value->name}}</option>\
                                                <?php } } ?>
                                        </select>\
                                    </div>\
                                    <div class="form-group">\
                                        <label>Dates</label>\
                                        <select class="form-control shipDatesDropDown" data-id="'+sum+'" name="step8[tour]['+sum+'][hotel][0][date]" required="">\
                                            <option value="">-</option>\
                                        </select>\
                                        <input type="hidden" name="step8[tour]['+sum+'][currency]" id="select_market_option_'+sum+'" value="{{$value->currency}}">\
                                    </div>\
                                    <div class="form-group" style="display: inline-flex;width: 100%;margin-bottom:2px;">\
                                        <label style="font-weight: bold;color: black;width: 75px;font-size: 16px;margin-right: 10px;">Type:</label>\
                                        <div class="labelDiv" style="color: #495057;">\
                                        </div>\
                                        <div class="form-check form-check-inline radioDiv">\
                                          <input class="form-check-input rate_type_select" type="radio" name="step8[tour]['+sum+'][rate_type]" id="typeInlineRadio1'+sum+'" value="1" data-id="'+sum+'">\
                                          <label class="form-check-label" for="typeInlineRadio1'+sum+'" style="font-size: 0.98rem;color: #495057;">£</label>\
                                        </div>\
                                        <div class="form-check form-check-inline radioDiv">\
                                          <input class="form-check-input rate_type_select" data-id="'+sum+'" type="radio" name="step8[tour]['+sum+'][rate_type]" id="typeInlineRadio2'+sum+'" value="2">\
                                          <label class="form-check-label" for="typeInlineRadio2'+sum+'" style="font-size: 0.98rem;color: #495057;">€</label>\
                                        </div>\
                                        <div class="form-check form-check-inline radioDiv">\
                                          <input class="form-check-input rate_type_select" data-id="'+sum+'" type="radio" checked name="step8[tour]['+sum+'][rate_type]" id="typeInlineRadio2'+sum+'" value="3">\
                                          <label class="form-check-label" for="typeInlineRadio2'+sum+'" style="font-size: 0.98rem;color: #495057;">£ & €</label>\
                                        </div>\
                                    </div>\
                                </div>\
                            </div>\
                        </div>\
                        <div class="tabs_wrapper">\
                            <ul class="notestabs" style="margin-bottom: 15px;margin-top: 0px;width: 20%;">\
                                <li class="pound_tab'+sum+' select-tab active " data-id="1'+sum+'" style="border-left: 0;font-size: 16px;">Costs In £</li>\
                                <li class="euro_tab'+sum+' select-tab" data-id="2'+sum+'" style="border-left: 0;font-size: 16px;">Costs In €</li>\
                                </ul>\
                        </div>\
                        <div id="tabpanel-1'+sum+'" class="content-tab" role="tabpanel" aria-labelledby="tab-1">\
                            <div class="row">\
                                    <div class="row">\
                                        <div class="col-md-5">\
                                            <div class="cabin_rates_div cabin_rates_div_'+sum+'">\
                                            </div>\
                                        </div>\
                                        <div class="col-md-7">\
                                            <div class="row rate_field" style="float: left;width: 100%;">\
                                                <div class="col-sm-3 pound_colunm_out_'+sum+'">\
                                                    <div class="form-group">\
                                                        <label>Deposit 1(£)</label>\
                                                        <input type="text" class="pointerNone form-control decimal" value="" name="step8[tour]['+sum+'][deposit_pound]" required>\
                                                    </div>\
                                                </div>\
                                                <div class="col-sm-3 pound_colunm_out_'+sum+'">\
                                                    <div class="form-group">\
                                                        <label>Deposit 2(£)</label>\
                                                        <input type="text" class="pointerNone form-control decimal" value="" name="step8[tour]['+sum+'][deposit_pound2]" required>\
                                                    </div>\
                                                </div>\
                                               <div class="col-sm-6 display_pound_rate_'+sum+' pound_colunm_out_'+sum+' ">\
                                                        <div class="form-group">\
                                                        </div>\
                                                </div>\
                                                <div class="col-sm-3 pound_colunm_out_'+sum+'">\
                                                    <div class="form-group">\
                                                        <label>Cost of overnight pp (£)</label>\
                                                        <input type="text" class="pointerNone form-control decimal" name="step8[tour]['+sum+'][cost_overnight_pound]" required>\
                                                    </div>\
                                                </div>\
                                                <div class="col-sm-3 pound_colunm_out_'+sum+'">\
                                                    <div class="form-group">\
                                                        <label>Add overnight ss (£)</label>\
                                                        <input type="text" class="pointerNone form-control decimal" name="step8[tour]['+sum+'][add_overnight_ss]" required>\
                                                    </div>\
                                                </div>\
                                            </div>\
                                        </div>\
                                    </div>\
                                    <div class="row rate_field">\
                                        <?php  $crossing_cnt = 0;
                                        $company = 


DB::connection('mysql_veenus')->table('crossing_company')->where('active',1)->where('company_name','!=','')->get();?>
                                        <ul class="nav nav-tabs">\
                                        <?php  foreach ($company as $k => $com) { ?>
                                        <li><a class="<?=($k == 0)?'active':'de'?> select-crossing" data-toggle="tab<?=$k?>'+sum+'" data-id="tab<?=$k?>'+sum+'"><?=$com->company_name?></a></li>\
                                        <?php } ?>
                                        </ul>\
                                        <div class="tab-content" style="border: 1px solid #ddd;display: inline-block;border-top: 0px;width: 100%;padding-top: 10px;">\
                                        <?php  foreach ($company as $k => $com)   { ?>
                                            <div id="tab<?=$k?>'+sum+'" class="crossing-tab tab-pane <?=($k == 0)?'active':'de'?>">\
                                                <input type="hidden" name="company_id" value="{{$com->id}}">\
                                                <div class="section w_100" style="height:100%;float: left;">\
                                                    <div class="form company_crossing_div">\
                                                        <table class="table">\
                                                            <tr>\
                                                                <th>Select</th>\
                                                                <th>Route</th>\
                                                                <th>In/Out</th>\
                                                                <th>Overnight</th>\
                                                                <th>Cost £</th>\
                                                                <th>Cost SS £</th>\
                                                            </tr>\
                                                            <?php 
                                                            if(isset($crossings_route)){
                                                                if(count($crossings_route) >= 1){
                                                                    $cnts = '11565';
                                                                    $crossing_cnt = 0;
                                                                foreach ($crossings_route as $keyc => $csvalue) {
                                                                     if($csvalue->company_id == $com->id){
                                                                        $crossings_exp = App\Models\Cms\ExperienceDatesShipCrossings::where('ship_crossing_id',$csvalue->id)->where('exp_date_rates_id',$value->id)->first(); ?>
                                                                        <tr>\
                                                                        <td>\
                                                                            <label class="checkbox_div">\
                                                                              <input type="checkbox" name="step8[tour]['+sum+'][crossing][{{$crossing_cnt}}][{{$csvalue->company_id}}][crossig_id]" class="custom_chkbox tagchkbox pointerNone" value="{{$csvalue->id}}">\
                                                                              <span class="checkmark"></span>\
                                                                            </label>\
                                                                        </td>\
                                                                        <td>\
                                                                            <input readonly class="form-control" type="text" value="{{ $csvalue->route }}" name="step8[tour]['+sum+'][crossing][{{$crossing_cnt}}][{{$csvalue->company_id}}][route]" id="route">\
                                                                            <p class="exp_error" style="display:none;color: red;">Please enter refurbished</p>\
                                                                        <td>\
                                                                           <select readonly disabled class="form-control" name="step8[tour]['+sum+'][crossing][{{$crossing_cnt}}][{{$csvalue->company_id}}][in_out]">\
                                                                                <option value="">Select In/Out</option>\
                                                                                <option value="In" <?=(!empty($csvalue->in_out) && $csvalue->in_out == 'In'?'selected="selected"':'')?>>In</option>\
                                                                                <option value="Out" <?=(!empty($csvalue->in_out) && $csvalue->in_out == 'Out'?'selected="selected"':'')?>>Out</option>\
                                                                            </select>\
                                                                        </td>\
                                                                        <td>\
                                                                            <select readonly class="form-control" name="step8[tour]['+sum+'][crossing][{{$crossing_cnt}}][{{$csvalue->company_id}}][overnight]">\
                                                                                <option value="">Overnight</option>\
                                                                                <option value="0" <?=(!empty($csvalue->overnight) && $csvalue->overnight == '0'?'selected="selected"':'')?>>0</option>\
                                                                                <option value="1" <?=(!empty($csvalue->overnight) && $csvalue->overnight == '1'?'selected="selected"':'')?>>1</option>\
                                                                                <option value="2" <?=(!empty($csvalue->overnight) && $csvalue->overnight == '2'?'selected="selected"':'')?>>2</option>\
                                                                                <option value="3" <?=(!empty($csvalue->overnight) && $csvalue->overnight == '3'?'selected="selected"':'')?>>3</option>\
                                                                                <option value="4" <?=(!empty($csvalue->overnight) && $csvalue->overnight == '4'?'selected="selected"':'')?>>4</option>\
                                                                                <option value="5" <?=(!empty($csvalue->overnight) && $csvalue->overnight == '5'?'selected="selected"':'')?>>5</option>\
                                                                            </select>\
                                                                            <p class="exp_error" style="display:none;color: red;">Please enter passengers</p>\
                                                                        </td>\
                                                                        <td>\
                                                                            <input type="hidden" name="step8[tour]['+sum+'][crossing][{{$crossing_cnt}}][{{$csvalue->company_id}}][company_id]" value="{{$csvalue->company_id}}">\
                                                                           <input type="hidden" name="step8[tour]['+sum+'][crossing][{{$crossing_cnt}}][{{$csvalue->company_id}}][ship_crossing_id]" value="{{$csvalue->id}}">\
                                                                            <input class="form-control pointerNone" type="text" value="<?=!empty($crossings_exp->cost_pound)?$crossings_exp->cost_pound:$csvalue->cost_pound ?>" name="step8[tour]['+sum+'][crossing][{{$crossing_cnt}}][{{$csvalue->company_id}}][cost_pound]" id="cost_pound">\
                                                                            <p class="exp_error" style="display:none;color: red;">Please enter staff to guest</p>\
                                                                        </td>\
                                                                        <td>\
                                                                            <input class="form-control pointerNone" type="text" value="<?=!empty($crossings_exp->cost_ss_pound)?$crossings_exp->cost_ss_pound:$csvalue->cost_ss_pound ?>" name="step8[tour]['+sum+'][crossing][{{$crossing_cnt}}][{{$csvalue->company_id}}][cost_ss_pound]" id="cost_ss_pound">\
                                                                            <p class="exp_error" style="display:none;color: red;">Please enter staff to guest</p>\
                                                                        </td>\
                                                                    </tr>\
                                                         <?php $crossing_cnt++; $cnts++; } } } } ?>
                                                         </table>\
                                                    </div>\
                                                </div>\
                                        </div>\
                                        <?php } ?>
                                        </div>\
                                    </div>\
                            </div>\
                        </div>\
                        <div id="tabpanel-2'+sum+'" class="content-tab" role="tabpanel" aria-labelledby="tab-2" class="is-hidden" style="display:none;">\
                             <div class="row">\
                                <?php
                                        $colpseuro = '';
                                        $colpsrateeuro = 'style="display:none"';
                                        if($value->rate_euro == $value->single_euro && $value->rate_euro == $value->double_euro && $value->rate_euro == $value->twin_euro && $value->rate_euro == $value->triple_euro && $value->rate_euro == $value->quad_euro)
                                        {
                                            $colpseuro='style="display:none"';
                                             $colpsrateeuro='';
                                        }
                                        $cabin_cnt = 0;

                                    ?>
                                <div class="row">\
                                    <div class="col-md-5">\
                                        <div class="cabin_rates_div cabin_rates_div_euro_'+sum+'">\
                                        </div>\
                                    </div>\
                                    <div class="col-md-7">\
                                        <div class="row rate_field" style="float: left;width: 100%;">\
                                            <div class="col-sm-3 pound_colunm_out_'+sum+'">\
                                                <div class="form-group">\
                                                    <label>Deposit 1(€)</label>\
                                                    <input type="text" class="pointerNone form-control decimal" value="<?=sprintf('%0.2f',$value->deposit_euro)?>" name="step8[tour]['+sum+'][deposit_euro]" required>\
                                                </div>\
                                            </div>\
                                            <div class="col-sm-3 pound_colunm_out_'+sum+'">\
                                                <div class="form-group">\
                                                    <label>Deposit 2(€)</label>\
                                                    <input type="text" class="pointerNone form-control decimal" value="<?=sprintf('%0.2f',$value->deposit_euro2)?>" name="step8[tour]['+sum+'][deposit_euro2]" required>\
                                                </div>\
                                            </div>\
                                           <div class="col-sm-6 display_pound_rate_'+sum+' pound_colunm_out_'+sum+' ">\
                                                    <div class="form-group">\
                                                    </div>\
                                                </div>\
                                            <div class="col-sm-3 pound_colunm_out_'+sum+'">\
                                                <div class="form-group">\
                                                    <label>Cost of overnight pp (€)</label>\
                                                    <input type="text" class="pointerNone form-control decimal" value="" name="step8[tour]['+sum+'][cost_overnight_euro]" required>\
                                                </div>\
                                            </div>\
                                            <div class="col-sm-3 pound_colunm_out_'+sum+'">\
                                                <div class="form-group">\
                                                    <label>Add overnight ss (€)</label>\
                                                <input type="text" class="pointerNone form-control decimal" value="" name="step8[tour]['+sum+'][add_overnight_ss_euro]" required>\
                                                </div>\
                                            </div>\
                                        </div>\
                                    </div>\
                                </div>\
                                <div class="row rate_field">\
                                    <?php  $crossing_cnt = 0;
                                    $company = 


DB::connection('mysql_veenus')->table('crossing_company')->where('active',1)->where('company_name','!=','')->get();?>
                                    <ul class="nav nav-tabs">\
                                    <?php  foreach ($company as $k => $com) { ?>
                                    <li><a class="<?=($k == 0)?'active':'de'?> select-crossing" data-toggle="eurotab<?=$k?>'+sum+'" data-id="eurotab<?=$k?>'+sum+'"><?=$com->company_name?></a></li>\
                                    <?php } ?>
                                    </ul>\
                                    <div class="tab-content" style="border: 1px solid #ddd;display: inline-block;border-top: 0px;width: 100%;padding-top: 10px;">\
                                    <?php  foreach ($company as $k => $com)   { ?>
                                            <div id="eurotab<?=$k?>'+sum+'" class="crossing-tab tab-pane <?=($k == 0)?'active':'de'?>">\
                                                <input type="hidden" name="company_id" value="{{$com->id}}">\
                                                <div class="section w_100" style="height:100%;float: left;">\
                                                    <div class="form company_crossing_div">\
                                                        <table class="table">\
                                                            <tr>\
                                                                <th>Select</th>\
                                                                <th>Route</th>\
                                                                <th>In/Out</th>\
                                                                <th>Overnight</th>\
                                                                <th>Cost €</th>\
                                                                <th>Cost SS €</th>\
                                                            </tr>\
                                                            <?php 
                                                            if(isset($crossings_route)){
                                                                if(count($crossings_route) >= 1){
                                                                    $cnts = '11565';
                                                                    $crossing_cnt = 0;
                                                                foreach ($crossings_route as $keyc => $csvalue) {
                                                                     if($csvalue->company_id == $com->id){
                                                                        $crossings_exp = App\Models\Cms\ExperienceDatesShipCrossings::where('ship_crossing_id',$csvalue->id)->where('exp_date_rates_id',$value->id)->first(); ?>
                                                                        <tr>\
                                                                        <td>\
                                                                            <label class="checkbox_div">\
                                                                              <input type="checkbox" name="step8[tour]['+sum+'][crossing][{{$crossing_cnt}}][{{$csvalue->company_id}}][crossig_id]" class="custom_chkbox tagchkbox pointerNone" value="{{$csvalue->id}}">\
                                                                              <span class="checkmark"></span>\
                                                                            </label>\
                                                                        </td>\
                                                                        <td>\
                                                                            <input readonly class="form-control" type="text" value="{{ $csvalue->route }}" name="step8[tour]['+sum+'][crossing][{{$crossing_cnt}}][{{$csvalue->company_id}}][route]" id="route">\
                                                                            <p class="exp_error" style="display:none;color: red;">Please enter refurbished</p>\
                                                                        <td>\
                                                                           <select readonly disabled class="form-control" name="step8[tour]['+sum+'][crossing][{{$crossing_cnt}}][{{$csvalue->company_id}}][in_out]">\
                                                                                <option value="">Select In/Out</option>\
                                                                                <option value="In" <?=(!empty($csvalue->in_out) && $csvalue->in_out == 'In'?'selected="selected"':'')?>>In</option>\
                                                                                <option value="Out" <?=(!empty($csvalue->in_out) && $csvalue->in_out == 'Out'?'selected="selected"':'')?>>Out</option>\
                                                                            </select>\
                                                                        </td>\
                                                                        <td>\
                                                                            <select readonly class="form-control" name="step8[tour]['+sum+'][crossing][{{$crossing_cnt}}][{{$csvalue->company_id}}]   [overnight]">\
                                                                                <option value="">Overnight</option>\
                                                                                <option value="0" <?=(!empty($csvalue->overnight) && $csvalue->overnight == '0'?'selected="selected"':'')?>>0</option>\
                                                                                <option value="1" <?=(!empty($csvalue->overnight) && $csvalue->overnight == '1'?'selected="selected"':'')?>>1</option>\
                                                                                <option value="2" <?=(!empty($csvalue->overnight) && $csvalue->overnight == '2'?'selected="selected"':'')?>>2</option>\
                                                                                <option value="3" <?=(!empty($csvalue->overnight) && $csvalue->overnight == '3'?'selected="selected"':'')?>>3</option>\
                                                                                <option value="4" <?=(!empty($csvalue->overnight) && $csvalue->overnight == '4'?'selected="selected"':'')?>>4</option>\
                                                                                <option value="5" <?=(!empty($csvalue->overnight) && $csvalue->overnight == '5'?'selected="selected"':'')?>>5</option>\
                                                                            </select>\
                                                                            <p class="exp_error" style="display:none;color: red;">Please enter passengers</p>\
                                                                        </td>\
                                                                        <td>\
                                                                            <input type="hidden" name="step8[tour]['+sum+'][crossing][{{$crossing_cnt}}][{{$csvalue->company_id}}][company_id]" value="{{$csvalue->company_id}}">\
                                                                           <input type="hidden" name="step8[tour]['+sum+'][crossing][{{$crossing_cnt}}][{{$csvalue->company_id}}][ship_crossing_id]" value="{{$csvalue->id}}">\
                                                                            <input class="form-control pointerNone" type="text" value="<?=!empty($crossings_exp->cost_euro)?$crossings_exp->cost_euro:$csvalue->cost_euro ?>" name="step8[tour]['+sum+'][crossing][{{$crossing_cnt}}][{{$csvalue->company_id}}][cost_euro]" id="cost_euro">\
                                                                            <p class="exp_error" style="display:none;color: red;">Please enter staff to guest</p>\
                                                                        </td>\
                                                                        <td>\
                                                                            <input class="form-control pointerNone" type="text" value="<?=!empty($crossings_exp->cost_ss_euro)?$crossings_exp->cost_ss_euro:$csvalue->cost_ss_euro?>" name="step8[tour]['+sum+'][crossing][{{$crossing_cnt}}][{{$csvalue->company_id}}][cost_ss_euro]" id="cost_ss_pound">\
                                                                            <p class="exp_error" style="display:none;color: red;">Please enter staff to guest</p>\
                                                                        </td>\
                                                                    </tr>\
                                                         <?php $crossing_cnt++; $cnts++; } } } } ?>
                                                         </table>\
                                                    </div>\
                                                </div>\
                                        </div>\
                                        <?php } ?>
                                        </div>\
                                    </div>\
                                </div>\
                        </div>\
                    </div>';
                    /*<div class="col-sm-12">\
                            <div class="row">\
                                <div class="cabin_rates_div cabin_rates_div_'+sum+'"></div>\
                                <div class="row rate_field" style="float: left;width: 100%;">\
                                    <div class="col-sm-3 pound_colunm_out_'+sum+'">\
                                        <div class="form-group">\
                                            <label>Deposit 1(£)</label>\
                                            <input type="text" class="form-control decimal" name="step8[tour]['+sum+'][deposit_pound]" required>\
                                        </div>\
                                    </div>\
                                    <div class="col-sm-3 pound_colunm_out_'+sum+'">\
                                        <div class="form-group">\
                                            <label>Deposit 2(£)</label>\
                                            <input type="text" class="form-control decimal" name="step8[tour]['+sum+'][deposit_pound2]" required>\
                                        </div>\
                                    </div>\
                                    <div class="col-sm-3 pound_colunm_out_'+sum+'">\
                                        <div class="form-group">\
                                            <label>Cost of overnight pp (£)</label>\
                                            <input type="text" class="form-control decimal" name="step8[tour]['+sum+'][cost_overnight_pound]" required>\
                                        </div>\
                                    </div>\
                                    <div class="col-sm-3 pound_colunm_out_'+sum+'">\
                                        <div class="form-group">\
                                            <label>Add overnight ss (£)</label>\
                                            <input type="text" class="form-control decimal" name="step8[tour]['+sum+'][add_overnight_ss]" required>\
                                        </div>\
                                    </div>\
                                </div>';
                                <?php  $crossing_cnt = 0;
                                if(!empty($crossingDetailTemplate)) { ?>
                                    htmls += '<div class="row rate_field crossing_default_div">';
                                    <?php foreach($crossingDetailTemplate as $crossinval) { ?>
                                    htmls += '<div class="col-sm-2 display_pound_rate_'+sum+' pound_colunm_out_'+sum+'">\
                                        <div class="form-group">\
                                            <label>Cost of crossing pp (£)<br/><?=$crossinval->company_name?></label>\
                                            <input type="hidden" name="step8[tour]['+sum+'][crossing][<?=$crossing_cnt?>][company_id]" value="<?=$crossinval->id?>">\
                                            <input type="text" class=" form-control decimal" id="rate_pound_'+sum+'" name="step8[tour]['+sum+'][crossing][<?=$crossing_cnt?>][cost_pound]" value="" required>\
                                        </div>\
                                    </div>';
                                    <?php $crossing_cnt++;} ?> 
                                    htmls += '</div>';
                                <?php  } ?>
                                htmls += '<div class="row rate_field crossing_div">\
                                <div class="col-sm-12 pound_colunm_out_'+sum+'">\
                                        <a href="javascript:void()" class="add_import_crossing" data-id="'+sum+'" style="color:orange;">Import crossing prices</a>\
                                    </div>\
                                </div>\
                                </div>\
                                <div class="row ml-2 mt-2">\
                                <a href="javascript:;" class="btn orangeLink saveDates" style="margin-bottom: 20px;">Save Date</a>\
                                </div>\
                            </div>\
                        </div>\*/
        $('.appendParentDiv').append(htmls);
        $('.decimal').keypress(function(evt){
            return (/^[0-9]*\.?[0-9]*$/).test($(this).val()+evt.key);
        });
        $('.euro_colunm_out_'+sum).hide();
        $('.select-tab').click(function(){
            $(this).parent().children('.select-tab').removeClass('active');
            $(this).addClass('active')
            var id = $(this).attr('data-id');
            //$('.select-tab').removeClass('manual');
            //$(this).addClass('manual');
            
            
            $('.select-tab').attr('aria-selected',false);
            $(this).attr('aria-selected',true);
            

            $(this).parent().parent().parent().children('.content-tab').hide();
            //$(this).closest('.content-tab').hide();
            $('#tabpanel-'+id).show();
        })
        $('.select-crossing').click(function(){
            $(this).parent().parent().children().children('.select-crossing').removeClass('active');
            $(this).addClass('active')
            var id = $(this).attr('data-id');
            //$('.select-crossing').removeClass('manual');
            //$(this).addClass('manual');
            
            
            $('.select-crossing').attr('aria-selected',false);
            $(this).attr('aria-selected',true);
            
            //$(this).parent().parent().parent().children('.crossing-tab').hide();
            $('.crossing-tab').hide();
            $('#'+id).show();
        })
            
        $(document).on('click','.rate_type_select', function(){
            var value = $(this).val();
            var id = $(this).data('id');

            if ($(this).prop('checked')==true){ 
                if(value == 1)
                {
                    $('.pound_tab'+id).show();
                    $('.euro_tab'+id).hide();
                }
                else if(value == 2)
                {
                    $('.pound_tab'+id).hide();
                    $('.euro_tab'+id).show();
                }
                else
                {
                    $('.pound_tab'+id).show();
                    $('.euro_tab'+id).show();
                }
            }
            
        });
        $('.select_market_option').on('change', function(e) {
       
           var display_value = $(this).val();
           var display_key = $(this).attr("data-id");
           if(display_value == 1)
           {
                $('.pound_colunm_out_'+display_key).show();
                $('.pound_colunm_out_'+display_key+' input').attr('required');
                $('.euro_colunm_out_'+display_key).hide();
                $('.euro_colunm_out_'+display_key+' input').removeAttr('required');
           }
           else if(display_value == 2)
           {
                $('.pound_colunm_out_'+display_key).hide();
                $('.pound_colunm_out_'+display_key+' input').removeAttr('required');
                $('.euro_colunm_out_'+display_key).show();
                $('.euro_colunm_out_'+display_key+' input').attr('required');
           }
           else
           {
                $('.pound_colunm_out_'+display_key).show();
                $('.euro_colunm_out_'+display_key).show();
                $('.pound_colunm_out_'+display_key+' input').attr('required');
                $('.euro_colunm_out_'+display_key+' input').attr('required');
           }
        });
        $('.display_pound_other_'+sum).hide();
        $('.display_pound_srs_other_'+sum).hide();
        $('.adjust_individually').click(function(){
           var id = $(this).data('id');
           var srs =  $("#srs_pound_"+id).val();
           var single =  $("#single_srs_pound_"+id).val();
           var double =  $("#double_srs_pound_"+id).val();
           var twin =  $("#twin_srs_pound_"+id).val();
           var triple =  $("#triple_srs_pound_"+id).val();
           var quad =  $("#quad_srs_pound_"+id).val();
           if(single == '0.00' || single == '')
           {

            $("#single_srs_pound_"+id).val(srs);
           }
           if(double == '0.00' || double == '')
           {
            $("#double_srs_pound_"+id).val(srs);
           }
           if(twin == '0.00' || twin == '')
           {
            $("#twin_srs_pound_"+id).val(srs);
           }
           if(triple == '0.00' || triple == '')
           {
            $("#triple_srs_pound_"+id).val(srs);
           }
           if(quad == '0.00' || quad == '')
           {
            $("#quad_srs_pound_"+id).val(srs);
           }
           $('.display_pound_srs_other_'+sum).toggle();
           $('.display_pound_srs_rate_'+sum).toggle();
           if ($(this).text() === "Adjust Individually") {
                $(this).text("Collapse Individually");
              } else {
                $(this).text("Adjust Individually");
              }
        })
         $('.adjust_individually_rate').click(function(){
           var id = $(this).data('id');
           var rate =  $("#rate_pound_"+id).val();
           var single =  $("#single_pound_"+id).val();
           var double =  $("#double_pound_"+id).val();
           var twin =  $("#twin_pound_"+id).val();
           var triple =  $("#triple_pound_"+id).val();
           var quad =  $("#quad_pound_"+id).val();
           if(single == '0.00' || single == '')
           {

            $("#single_pound_"+id).val(rate);
           }
           if(double == '0.00' || double == '')
           {
            $("#double_pound_"+id).val(rate);
           }
           if(twin == '0.00' || twin == '')
           {
            $("#twin_pound_"+id).val(rate);
           }
           if(triple == '0.00' || triple == '')
           {
            $("#triple_pound_"+id).val(rate);
           }
           if(quad == '0.00' || quad == '')
           {
            $("#quad_pound_"+id).val(rate);
           }
           $('.display_pound_other_'+sum).toggle();
           $('.display_pound_rate_'+sum).toggle();
           if ($(this).text() === "Adjust Individually") {
                $(this).text("Collapse Individually");
              } else {
                $(this).text("Adjust Individually");
              }
        })
          $('.euro_adjust_individually_srs').click(function(){
           var id = $(this).data('id');
           var srs =  $("#srs_euro_"+id).val();
           var single =  $("#single_srs_euro_"+id).val();
           var double =  $("#double_srs_euro_"+id).val();
           var twin =  $("#twin_srs_euro_"+id).val();
           var triple =  $("#triple_srs_euro_"+id).val();
           var quad =  $("#quad_srs_euro_"+id).val();
           if(single == '0.00' || single == '')
           {

            $("#single_srs_euro_"+id).val(srs);
           }
           if(double == '0.00' || double == '')
           {
            $("#double_srs_euro_"+id).val(srs);
           }
           if(twin == '0.00' || twin == '')
           {
            $("#twin_srs_euro_"+id).val(srs);
           }
           if(triple == '0.00' || triple == '')
           {
            $("#triple_srs_euro_"+id).val(srs);
           }
           if(quad == '0.00' || quad == '')
           {
            $("#quad_srs_euro_"+id).val(srs);
           }
           $('.display_euro_srs_other_'+sum).toggle();
           $('.display_euro_srs_rate_'+sum).toggle();
           if ($(this).text() === "Adjust Individually") {
                $(this).text("Collapse Individually");
              } else {
                $(this).text("Adjust Individually");
              }
        })
         $('.euro_adjust_individually').click(function(){
           var id = $(this).data('id');
           var rate =  $("#rate_euro_"+id).val();
           var single =  $("#single_euro_"+id).val();
           var double =  $("#double_euro_"+id).val();
           var twin =  $("#twin_euro_"+id).val();
           var triple =  $("#triple_euro_"+id).val();
           var quad =  $("#quad_euro_"+id).val();
           if(single == '0.00' || single == '')
           {

            $("#single_euro_"+id).val(rate);
           }
           if(double == '0.00' || double == '')
           {
            $("#double_euro_"+id).val(rate);
           }
           if(twin == '0.00' || twin == '')
           {
            $("#twin_euro_"+id).val(rate);
           }
           if(triple == '0.00' || triple == '')
           {
            $("#triple_euro_"+id).val(rate);
           }
           if(quad == '0.00' || quad == '')
           {
            $("#quad_euro_"+id).val(rate);
           }
           $('.display_euro_other_'+sum).toggle();
           $('.display_euro_rate_'+sum).toggle();
           if ($(this).text() === "Adjust Individually") {
                $(this).text("Collapse Individually");
              } else {
                $(this).text("Adjust Individually");
              }
        })
    });
    $(document).on('click', '.addAnotherDate', function() {
        $('.editDate').hide();
        $(this).hide();
        var parentDivlast = $('.appendParentDiv').find('.parentDiv:last');
        var parentDivKey = parseInt(parentDivlast.attr('data-key'));
        const sum = parentDivKey + 1;

        var htmls = '';
        htmls += '<div class="parentDiv" data-key="'+sum+'" style="border: 3px solid #ddd;border-radius: 5px;margin: 15px 0px;min-height: 100px;">\
                    <a href="javascript:;" style="float: right;color: #fff;background: red;padding: 3px 8px;top: -15px;position: relative;right: -15px;border-radius: 50%;font-size: 12px;" class="removeParentDiv"><i class="fa fa-times fa-2x"></i></a>\
                    <input type="hidden" name="step8[tour]['+sum+'][dates_rates_id]" value="">\
                        <div class="appendHotel">\
                            <div class="hotelDiv" data-key="0">\
                                <div style="border: 1px solid #ddd;border-radius: 5px;margin: 15px;padding: 20px;">\
                                    <div class="form-group">\
                                        <input type="hidden" name="step8[tour]['+sum+'][hotel][0][experience_hotel_date_id]" value="">\
                                        <input type="hidden" name="step8[tour]['+sum+'][hotel][0][experience_date_id]" value="">\
                                        <label>Choose a hotel</label>\
                                        <select class="form-control hotelDropDown" name="step8[tour]['+sum+'][hotel][0][hotel_id]" required="">\
                                            <option value="">Select One</option>\
                                            <?php 
                                                if(!empty($hotelList)){
                                                foreach ($hotelList as $key => $value) {
                                                 ?>
                                                    <option value="{{$value->id}}">{{$value->name}}</option>\
                                                <?php } } ?>
                                        </select>\
                                    </div>\
                                    <div class="form-group">\
                                        <label>Dates</label>\
                                        <select class="form-control datesDropDown" data-id="'+sum+'" name="step8[tour]['+sum+'][hotel][0][date]" required="">\
                                            <option value="">-</option>\
                                        </select>\
                                        <input type="hidden" name="step8[tour]['+sum+'][currency]" id="select_market_option_'+sum+'" value="{{$value->currency}}">\
                                    </div>\
                                    <div class="form-group" style="display: inline-flex;width: 100%;margin-bottom:2px;">\
                                        <label style="font-weight: bold;color: black;width: 75px;font-size: 16px;margin-right: 10px;">Standard:</label>\
                                        <div class="form-check form-check-inline">\
                                          <input class="form-check-input" type="radio" name="step8[tour]['+sum+'][hotel][0][type]" id="inlineRadio1'+sum+'0" value="1" required>\
                                          <label class="form-check-label" for="inlineRadio1'+sum+'0" style="font-size: 0.98rem;color: #495057;">Standard</label>\
                                        </div>\
                                        <div class="form-check form-check-inline">\
                                          <input class="form-check-input" type="radio" name="step8[tour]['+sum+'][hotel][0][type]" id="inlineRadio2'+sum+'0" value="0" required>\
                                          <label class="form-check-label" for="inlineRadio2'+sum+'0" style="font-size: 0.98rem;color: #495057;">Upscale</label>\
                                        </div>\
                                    </div>\
                                     <div class="form-group" style="display: inline-flex;width: 100%;margin-bottom:2px;">\
                                        <label style="font-weight: bold;color: black;width: 75px;font-size: 16px;margin-right: 10px;">Type:</label>\
                                        <div class="form-check form-check-inline">\
                                          <input class="form-check-input" type="radio" name="step8[tour]['+sum+'][hotel][0][experience_type]" id="inlineRadio1'+sum+'0" value="1" required>\
                                          <label class="form-check-label" for="inlineRadio1'+sum+'0" style="font-size: 0.98rem;color: #495057;">Primary</label>\
                                        </div>\
                                        <div class="form-check form-check-inline">\
                                          <input class="form-check-input" type="radio" name="step8[tour]['+sum+'][hotel][0][experience_type]" id="inlineRadio1'+sum+'0" value="2" required>\
                                          <label class="form-check-label" for="inlineRadio1'+sum+'0" style="font-size: 0.98rem;color: #495057;">Secondary</label>\
                                        </div>\
                                        <div class="form-check form-check-inline">\
                                          <input class="form-check-input" type="radio" name="step8[tour]['+sum+'][hotel][0][experience_type]" id="inlineRadio2'+sum+'0" value="3" required>\
                                          <label class="form-check-label" for="inlineRadio2'+sum+'0" style="font-size: 0.98rem;color: #495057;">Overnight</label>\
                                        </div>\
                                    </div>\
                                </div>\
                            </div>\
                        </div>\
                        <div class="col-sm-12">\
                            <div class="row">\
                                <div class="col-sm-12">\
                                    <a href="javascript:;" class="addHotel" style="color:orange;margin-bottom: 20px;">Combine this date with another hotel</a>\
                                </div>\
                            </div>\
                            <div class="row">\
                            <div class="row rate_field">\
                                <div class="col-sm-2 display_pound_rate_'+sum+' pound_colunm_out_'+sum+'">\
                                    <div class="form-group">\
                                        <label>Rate (£)</label>\
                                        <input type="text" class="form-control decimal" id="rate_pound_'+sum+'" name="step8[tour]['+sum+'][rate]" required>\
                                    </div>\
                                </div>\
                                <div class="col-sm-2 display_pound_other_'+sum+' pound_colunm_out_'+sum+'">\
                                    <div class="form-group">\
                                        <label>Single (&#163;)</label>\
                                        <input type="text" class="form-control decimal pointerNone" id="single_pound_'+sum+'" name="step8[tour]['+sum+'][single]" value="{{number_format($value->single,2)}}" >\
                                    </div>\
                                </div>\
                                <div class="col-sm-2 display_pound_other_'+sum+' pound_colunm_out_'+sum+'">\
                                    <div class="form-group">\
                                        <label>Double (&#163;)</label>\
                                        <input type="text" class="form-control decimal pointerNone" id="double_pound_'+sum+'" name="step8[tour]['+sum+'][double]" value="{{number_format($value->double,2)}}" >\
                                    </div>\
                                </div>\
                                 <div class="col-sm-2 display_pound_other_'+sum+' pound_colunm_out_'+sum+'">\
                                    <div class="form-group">\
                                        <label>Twin (&#163;)</label> \
                                        <input type="text" class="form-control decimal pointerNone" id="twin_pound_'+sum+'" name="step8[tour]['+sum+'][twin]" value="{{number_format($value->twin,2)}}" >\
                                    </div>\
                                </div>\
                                <div class="col-sm-2 display_pound_other_'+sum+' pound_colunm_out_'+sum+'">\
                                    <div class="form-group">\
                                        <label>Triple (&#163;)</label>\
                                        <input type="text" class="form-control decimal pointerNone" id="triple_pound_'+sum+'" name="step8[tour]['+sum+'][triple]" value="{{number_format($value->triple,2)}}" >\
                                    </div>\
                                </div>\
                                <div class="col-sm-2 display_pound_other_'+sum+' pound_colunm_out_'+sum+'">\
                                    <div class="form-group">\
                                        <label>Quad (&#163;)</label>\
                                        <input type="text" class="form-control decimal pointerNone" id="quad_pound_'+sum+'" name="step8[tour]['+sum+'][quad]" value="{{number_format($value->quad,2)}}" >\
                                    </div>\
                                </div>\
                                <div class="col-sm-2 display_pound_driver_rate_'+sum+' pound_colunm_out_'+sum+'">\
                                    <div class="form-group">\
                                        <label>Driver (&#163;)</label>\
                                        <input type="text" class="form-control decimal pointerNone" id="driver_pound_'+sum+'" name="step8[tour]['+sum+'][driver]" value="{{number_format($value->driver,2)}}" >\
                                    </div>\
                                </div>\
                                <div class="col-sm-12 pound_colunm_out_'+sum+'">\
                                        <a href="javascript:void()" class="adjust_individually_rate" data-id="'+sum+'" style="color:orange;">Adjust Individually</a>\
                                    </div>\
                                </div>\
                                <div class="row rate_field">\
                                <div class="col-sm-2 display_pound_srs_rate_'+sum+' pound_colunm_out_'+sum+'">\
                                    <div class="form-group">\
                                        <label>SS (£)</label>\
                                        <input type="text" class="form-control decimal" id="srs_pound_'+sum+'" name="step8[tour]['+sum+'][srs]" required>\
                                    </div>\
                                </div>\
                                <div class="col-sm-2 display_pound_srs_other_'+sum+' pound_colunm_out_'+sum+'">\
                                    <div class="form-group">\
                                        <label>Single SS (£)</label>\
                                        <input type="text" class="form-control decimal" id="single_srs_pound_'+sum+'" name="step8[tour]['+sum+'][single_srs]">\
                                    </div>\
                                </div>\
                                <div class="col-sm-2 display_pound_srs_other_'+sum+' pound_colunm_out_'+sum+'">\
                                    <div class="form-group">\
                                        <label>Double SS (£)</label>\
                                        <input type="text" class="form-control decimal" id="double_srs_pound_'+sum+'" name="step8[tour]['+sum+'][double_srs]">\
                                    </div>\
                                </div>\
                                <div class="col-sm-2 display_pound_srs_other_'+sum+' pound_colunm_out_'+sum+'">\
                                    <div class="form-group">\
                                    <label>Twin SS (£)</label>\
                                    <input type="text" class="form-control decimal" id="twin_srs_pound_'+sum+'" name="step8[tour]['+sum+'][twin_srs]">\
                                    </div>\
                                </div>\
                                <div class="col-sm-2 display_pound_srs_other_'+sum+' pound_colunm_out_'+sum+'">\
                                    <div class="form-group">\
                                        <label>Triple SS (£)</label>\
                                        <input type="text" class="form-control decimal" id="triple_srs_pound_'+sum+'" name="step8[tour]['+sum+'][triple_srs]">\
                                    </div>\
                                </div>\
                                <div class="col-sm-2 display_pound_srs_other_'+sum+' pound_colunm_out_'+sum+'">\
                                    <div class="form-group">\
                                        <label>Quad SS (£)</label>\
                                        <input type="text" class="form-control decimal" id="quad_srs_pound_'+sum+'" name="step8[tour]['+sum+'][quad_srs]">\
                                    </div>\
                                </div>\
                                <div class="col-sm-2 display_pound_srs__driver_rate_'+sum+' pound_colunm_out_'+sum+'">\
                                    <div class="form-group">\
                                        <label>Driver SS (£)</label>\
                                        <input type="text" class="form-control decimal" id="driver_srs_pound_'+sum+'" name="step8[tour]['+sum+'][driver_srs]">\
                                    </div>\
                                </div>\
                                <div class="col-sm-12 pound_colunm_out_'+sum+'">\
                                        <a href="javascript:void()" class="adjust_individually" data-id="'+sum+'" style="color:orange;">Adjust Individually</a>\
                                    </div>\
                                </div>\
                                <div class="row rate_field" style="float: left;width: 100%;">\
                                <div class="col-sm-2 pound_colunm_out_'+sum+'">\
                                    <div class="form-group">\
                                        <label>Deposit (£)</label>\
                                        <input type="text" class="form-control decimal" name="step8[tour]['+sum+'][deposit]" required>\
                                    </div>\
                                </div>\
                                </div>\
                                <div class="col-sm-12 pound_colunm_out_'+sum+'">\
                                    <label style="margin-top: 15px;">&nbsp;</label>\
                                </div>\
                                <div class="row rate_field">\
                                    <div class="col-sm-2 display_euro_rate display_euro_rate_'+sum+' euro_colunm_out_'+sum+'">\
                                        <div class="form-group">\
                                            <label>Rate (€)</label>\
                                            <input type="text" class="form-control decimal" id="rate_euro_'+sum+'" name="step8[tour]['+sum+'][rate_euro]" required>\
                                        </div>\
                                    </div>\
                                    <div class="col-sm-2 display_euro_other display_euro_other_'+sum+' euro_colunm_out_'+sum+'">\
                                        <div class="form-group">\
                                            <label>Single(€)</label>\
                                            <input type="text" class="form-control decimal" id="single_euro_'+sum+'" name="step8[tour]['+sum+'][single_euro]" required>\
                                        </div>\
                                    </div>\
                                    <div class="col-sm-2 display_euro_other display_euro_other_'+sum+' euro_colunm_out_'+sum+'">\
                                        <div class="form-group">\
                                            <label>Double(€)</label>\
                                            <input type="text" class="form-control decimal" id="double_euro_'+sum+'" name="step8[tour]['+sum+'][double_euro]" required>\
                                        </div>\
                                    </div>\
                                    <div class="col-sm-2 display_euro_other display_euro_other_'+sum+' euro_colunm_out_'+sum+'">\
                                        <div class="form-group">\
                                        <label>Twin(€)</label>\
                                        <input type="text" class="form-control decimal" id="twin_euro_'+sum+'" name="step8[tour]['+sum+'][twin_euro]" required>\
                                        </div>\
                                    </div>\
                                    <div class="col-sm-2 display_euro_other display_euro_other_'+sum+' euro_colunm_out_'+sum+'">\
                                        <div class="form-group">\
                                            <label>Triple(€)</label>\
                                            <input type="text" class="form-control decimal" id="triple_euro_'+sum+'" name="step8[tour]['+sum+'][triple_euro]" required>\
                                        </div>\
                                    </div>\
                                    <div class="col-sm-2 display_euro_other display_euro_other_'+sum+' euro_colunm_out_'+sum+'">\
                                        <div class="form-group">\
                                            <label>Quad(€)</label>\
                                            <input type="text" class="form-control decimal" id="quad_euro_'+sum+'" name="step8[tour]['+sum+'][quad_euro]" required>\
                                        </div>\
                                    </div>\
                                    <div class="col-sm-2 display_euro_rate display_euro_driver_rate_'+sum+' euro_colunm_out_'+sum+'">\
                                        <div class="form-group">\
                                            <label>Driver(€)</label>\
                                            <input type="text" class="form-control decimal" id="driver_euro_'+sum+'" name="step8[tour]['+sum+'][driver_euro]" required>\
                                        </div>\
                                    </div>\
                                    <div class="col-sm-12 euro_colunm_out_'+sum+'">\
                                        <a href="javascript:void()" class="euro_adjust_individually" data-id="'+sum+'" style="color:orange;">Adjust Individually</a>\
                                    </div>\
                                </div>\
                                <div class="row rate_field">\
                                    <div class="col-sm-2 display_euro_srs display_euro_srs_rate_'+sum+' euro_colunm_out_'+sum+'">\
                                        <div class="form-group">\
                                            <label>SS (€)</label>\
                                            <input type="text" class="form-control decimal" id="srs_euro_'+sum+'" name="step8[tour]['+sum+'][srs_euro]" required>\
                                        </div>\
                                    </div>\
                                    <div class="col-sm-2 display_euro_srs_other display_euro_srs_other_'+sum+' euro_colunm_out_'+sum+'">\
                                        <div class="form-group">\
                                            <label>Single SS (€)</label>\
                                            <input type="text" class="form-control decimal" id="single_srs_euro_'+sum+'" name="step8[tour]['+sum+'][single_srs_euro]" required>\
                                        </div>\
                                    </div>\
                                    <div class="col-sm-2 display_euro_srs_other display_euro_srs_other_'+sum+' euro_colunm_out_'+sum+'">\
                                        <div class="form-group">\
                                            <label>Double SS (€)</label>\
                                            <input type="text" class="form-control decimal" id="double_srs_euro_'+sum+'" name="step8[tour]['+sum+'][double_srs_euro]" required>\
                                        </div>\
                                    </div>\
                                    <div class="col-sm-2 display_euro_srs_other display_euro_srs_other_'+sum+' euro_colunm_out_'+sum+'">\
                                        <div class="form-group">\
                                        <label>Twin SS (€)</label>\
                                        <input type="text" class="form-control decimal" id="twin_srs_euro_'+sum+'" name="step8[tour]['+sum+'][twin_srs_euro]" required>\
                                        </div>\
                                    </div>\
                                    <div class="col-sm-2 display_euro_srs_other display_euro_srs_other_'+sum+' euro_colunm_out_'+sum+'">\
                                        <div class="form-group">\
                                            <label>Triple SS (€)</label>\
                                            <input type="text" class="form-control decimal" id="triple_srs_euro_'+sum+'" name="step8[tour]['+sum+'][triple_srs_euro]" required>\
                                        </div>\
                                    </div>\
                                    <div class="col-sm-2 display_euro_srs_other display_euro_srs_other_'+sum+' euro_colunm_out_'+sum+'">\
                                        <div class="form-group">\
                                            <label>Quad SS (€)</label>\
                                            <input type="text" class="form-control decimal" id="quad_srs_euro_'+sum+'" name="step8[tour]['+sum+'][quad_srs_euro]" required>\
                                        </div>\
                                    </div>\
                                    <div class="col-sm-2 display_euro_srs display_euro_srs__driver_rate_'+sum+' euro_colunm_out_'+sum+'">\
                                        <div class="form-group">\
                                            <label>Driver SS (€)</label>\
                                            <input type="text" class="form-control decimal" id="driver_srs_euro_'+sum+'" name="step8[tour]['+sum+'][driver_srs_euro]" required>\
                                        </div>\
                                    </div>\
                                    <div class="col-sm-12 euro_colunm_out_'+sum+'">\
                                        <a href="javascript:void()" class="euro_adjust_individually_srs" data-id="'+sum+'" style="color:orange;">Adjust Individually</a>\
                                    </div>\
                                </div>\
                                <div class="row rate_field" style="float: left;width: 100%;">\
                                    <div class="col-sm-2 euro_colunm_out_'+sum+'">\
                                        <div class="form-group">\
                                            <label>Deposit (€)</label>\
                                            <input type="text" class="form-control decimal" name="step8[tour]['+sum+'][deposit_euro]" required>\
                                        </div>\
                                    </div>\
                                </div>\
                                <div class="row col-sm-12">\
                                <a href="javascript:;" class="btn orangeLink saveDates" style="margin-bottom: 20px;">Save Date</a>\
                                </div>\
                            </div>\
                        </div>\
                    </div>';
        $('.appendParentDiv').append(htmls);
        $('.decimal').keypress(function(evt){
            return (/^[0-9]*\.?[0-9]*$/).test($(this).val()+evt.key);
        });
        $('.euro_colunm_out_'+sum).hide();
        $('.select_market_option').on('change', function(e) {
       
           var display_value = $(this).val();
           var display_key = $(this).attr("data-id");
           if(display_value == 1)
           {
                $('.pound_colunm_out_'+display_key).show();
                $('.pound_colunm_out_'+display_key+' input').attr('required');
                $('.euro_colunm_out_'+display_key).hide();
                $('.euro_colunm_out_'+display_key+' input').removeAttr('required');
           }
           else if(display_value == 2)
           {
                $('.pound_colunm_out_'+display_key).hide();
                $('.pound_colunm_out_'+display_key+' input').removeAttr('required');
                $('.euro_colunm_out_'+display_key).show();
                $('.euro_colunm_out_'+display_key+' input').attr('required');
           }
           else
           {
                $('.pound_colunm_out_'+display_key).show();
                $('.euro_colunm_out_'+display_key).show();
                $('.pound_colunm_out_'+display_key+' input').attr('required');
                $('.euro_colunm_out_'+display_key+' input').attr('required');
           }
        });
        $('.display_pound_other_'+sum).hide();
        $('.display_pound_srs_other_'+sum).hide();
        $('.adjust_individually').click(function(){
           var id = $(this).data('id');
           var srs =  $("#srs_pound_"+id).val();
           var single =  $("#single_srs_pound_"+id).val();
           var double =  $("#double_srs_pound_"+id).val();
           var twin =  $("#twin_srs_pound_"+id).val();
           var triple =  $("#triple_srs_pound_"+id).val();
           var quad =  $("#quad_srs_pound_"+id).val();
           if(single == '0.00' || single == '')
           {

            $("#single_srs_pound_"+id).val(srs);
           }
           if(double == '0.00' || double == '')
           {
            $("#double_srs_pound_"+id).val(srs);
           }
           if(twin == '0.00' || twin == '')
           {
            $("#twin_srs_pound_"+id).val(srs);
           }
           if(triple == '0.00' || triple == '')
           {
            $("#triple_srs_pound_"+id).val(srs);
           }
           if(quad == '0.00' || quad == '')
           {
            $("#quad_srs_pound_"+id).val(srs);
           }
           $('.display_pound_srs_other_'+sum).toggle();
           $('.display_pound_srs_rate_'+sum).toggle();
           if ($(this).text() === "Adjust Individually") {
                $(this).text("Collapse Individually");
              } else {
                $(this).text("Adjust Individually");
              }
        })
         $('.adjust_individually_rate').click(function(){
           var id = $(this).data('id');
           var rate =  $("#rate_pound_"+id).val();
           var single =  $("#single_pound_"+id).val();
           var double =  $("#double_pound_"+id).val();
           var twin =  $("#twin_pound_"+id).val();
           var triple =  $("#triple_pound_"+id).val();
           var quad =  $("#quad_pound_"+id).val();
           if(single == '0.00' || single == '')
           {

            $("#single_pound_"+id).val(rate);
           }
           if(double == '0.00' || double == '')
           {
            $("#double_pound_"+id).val(rate);
           }
           if(twin == '0.00' || twin == '')
           {
            $("#twin_pound_"+id).val(rate);
           }
           if(triple == '0.00' || triple == '')
           {
            $("#triple_pound_"+id).val(rate);
           }
           if(quad == '0.00' || quad == '')
           {
            $("#quad_pound_"+id).val(rate);
           }
           $('.display_pound_other_'+sum).toggle();
           $('.display_pound_rate_'+sum).toggle();
           if ($(this).text() === "Adjust Individually") {
                $(this).text("Collapse Individually");
              } else {
                $(this).text("Adjust Individually");
              }
        })
          $('.euro_adjust_individually_srs').click(function(){
           var id = $(this).data('id');
           var srs =  $("#srs_euro_"+id).val();
           var single =  $("#single_srs_euro_"+id).val();
           var double =  $("#double_srs_euro_"+id).val();
           var twin =  $("#twin_srs_euro_"+id).val();
           var triple =  $("#triple_srs_euro_"+id).val();
           var quad =  $("#quad_srs_euro_"+id).val();
           if(single == '0.00' || single == '')
           {

            $("#single_srs_euro_"+id).val(srs);
           }
           if(double == '0.00' || double == '')
           {
            $("#double_srs_euro_"+id).val(srs);
           }
           if(twin == '0.00' || twin == '')
           {
            $("#twin_srs_euro_"+id).val(srs);
           }
           if(triple == '0.00' || triple == '')
           {
            $("#triple_srs_euro_"+id).val(srs);
           }
           if(quad == '0.00' || quad == '')
           {
            $("#quad_srs_euro_"+id).val(srs);
           }
           $('.display_euro_srs_other_'+sum).toggle();
           $('.display_euro_srs_rate_'+sum).toggle();
           if ($(this).text() === "Adjust Individually") {
                $(this).text("Collapse Individually");
              } else {
                $(this).text("Adjust Individually");
              }
        })
         $('.euro_adjust_individually').click(function(){
           var id = $(this).data('id');
           var rate =  $("#rate_euro_"+id).val();
           var single =  $("#single_euro_"+id).val();
           var double =  $("#double_euro_"+id).val();
           var twin =  $("#twin_euro_"+id).val();
           var triple =  $("#triple_euro_"+id).val();
           var quad =  $("#quad_euro_"+id).val();
           if(single == '0.00' || single == '')
           {

            $("#single_euro_"+id).val(rate);
           }
           if(double == '0.00' || double == '')
           {
            $("#double_euro_"+id).val(rate);
           }
           if(twin == '0.00' || twin == '')
           {
            $("#twin_euro_"+id).val(rate);
           }
           if(triple == '0.00' || triple == '')
           {
            $("#triple_euro_"+id).val(rate);
           }
           if(quad == '0.00' || quad == '')
           {
            $("#quad_euro_"+id).val(rate);
           }
           $('.display_euro_other_'+sum).toggle();
           $('.display_euro_rate_'+sum).toggle();
           if ($(this).text() === "Adjust Individually") {
                $(this).text("Collapse Individually");
              } else {
                $(this).text("Adjust Individually");
              }
        })
    });

    $(document).on('click', '.addHotel', function() {
        var appendHotel = $(this).closest('.parentDiv').find('.appendHotel');
        var parentDivKey = parseInt($(this).closest('.parentDiv').attr('data-key'));
        const sum = parentDivKey;
        
        const hotelsum = parseInt(appendHotel.find('.hotelDiv:last').attr('data-key'))+1;
       
        var htmls = '';
        htmls += '<div class="hotelDiv" data-key="'+hotelsum+'"><div class="col-sm-12"><b>Combined with</b><a href="javascript:;" style="float:right;color:red;" class="removeHotelDiv" data-id=""><i class="fa fa-times fa-2x"></i></a></div>\
                  <div style="border: 1px solid #ddd;border-radius: 5px;margin: 15px;padding: 20px;">\
                    <div class="form-group">\
                        <input type="hidden" name="step8[tour]['+sum+'][hotel]['+hotelsum+'][experience_hotel_date_id]" value="">\
                        <input type="hidden" name="step8[tour]['+sum+'][hotel]['+hotelsum+'][experience_date_id]" value="">\
                        <label>Choose a hotel</label>\
                        <select class="form-control hotelDropDown" name="step8[tour]['+sum+'][hotel]['+hotelsum+'][hotel_id]" required="">\
                            <option value="">Select One</option>\
                            <?php 
                                if(!empty($hotelList)){
                                foreach ($hotelList as $key => $value) {
                                 ?>
                                    <option value="{{$value->id}}">{{$value->name}}</option>\
                                <?php } } ?>
                        </select>\
                    </div>\
                    <div class="form-group">\
                        <label>Dates</label>\
                        <select class="form-control datesDropDown" name="step8[tour]['+sum+'][hotel]['+hotelsum+'][date]" required="">\
                            <option value="">-</option>\
                        </select>\
                    </div>\
                    <div class="form-group" style="display: inline-flex;width: 100%;margin-bottom:2px;">\
                        <label style="font-weight: bold;color: black;width: 75px;font-size: 16px;margin-right: 10px;">Standard:</label>\
                        <div class="form-check form-check-inline">\
                          <input class="form-check-input" type="radio" name="step8[tour]['+sum+'][hotel]['+hotelsum+'][type]" id="inlineRadio1'+sum+hotelsum+'" value="1" required>\
                          <label class="form-check-label" for="inlineRadio1'+sum+hotelsum+'" style="font-size: 0.98rem;color: #495057;">Standard</label>\
                        </div>\
                        <div class="form-check form-check-inline">\
                          <input class="form-check-input" type="radio" name="step8[tour]['+sum+'][hotel]['+hotelsum+'][type]" id="inlineRadio2'+sum+hotelsum+'" value="0" required>\
                          <label class="form-check-label" for="inlineRadio2'+sum+hotelsum+'" style="font-size: 0.98rem;color: #495057;">Upscale</label>\
                        </div>\
                    </div>\
                    <div class="form-group" style="display: inline-flex;width: 100%;margin-bottom:2px;">\
                        <label style="font-weight: bold;color: black;width: 75px;font-size: 16px;margin-right: 10px;">Type:</label>\
                        <div class="form-check form-check-inline">\
                          <input class="form-check-input" type="radio" name="step8[tour]['+sum+'][hotel]['+hotelsum+'][experience_type]" id="inlineRadio1'+sum+hotelsum+'" value="1" required>\
                          <label class="form-check-label" for="inlineRadio1'+sum+hotelsum+'" style="font-size: 0.98rem;color: #495057;">Primary</label>\
                        </div>\
                        <div class="form-check form-check-inline">\
                          <input class="form-check-input" type="radio" name="step8[tour]['+sum+'][hotel]['+hotelsum+'][experience_type]" id="inlineRadio1'+sum+hotelsum+'" value="2" required>\
                          <label class="form-check-label" for="inlineRadio1'+sum+hotelsum+'" style="font-size: 0.98rem;color: #495057;">Secondary</label>\
                        </div>\
                        <div class="form-check form-check-inline">\
                          <input class="form-check-input" type="radio" name="step8[tour]['+sum+'][hotel]['+hotelsum+'][experience_type]" id="inlineRadio2'+sum+hotelsum+'" value="3" required>\
                          <label class="form-check-label" for="inlineRadio2'+sum+hotelsum+'" style="font-size: 0.98rem;color: #495057;">Overnight</label>\
                        </div>\
                    </div>\
                </div>';
        appendHotel.append(htmls);
    });
    $(document).on('change', '.hotelDropDown', function() {
        var hotel_id = $(this).val();
        var addDates = $(this).closest('.hotelDiv').find('.datesDropDown');
        $('.loader').show();    
        $.ajax({
            url: base_url+'/super-user/hotel-dd-change',
            type: 'POST',
             // dataType: 'json',
            data: {'hotel_id':hotel_id},
            success: function(data) {
                $('.loader').hide(); 
                addDates.html(data.html);
            },
            error: function(e) {
            }
        });
    });
     $(document).on('change', '.shipDropDown', function() {
        var hotel_id = $(this).val();
        var cnt = $(this).attr('data-cnt');
        
        var addDates = $(this).closest('.hotelDiv').find('.shipDatesDropDown');
        //var addDates1 = $(this).closest('.cabin_rates_div').find('.cabin_rates_div');
        $('.loader').show();    
        $.ajax({
            url: base_url+'/super-user/ship-dd-change',
            type: 'POST',
             // dataType: 'json',
            data: {'hotel_id':hotel_id,'cnt':cnt},
            success: function(data) {
                $('.loader').hide(); 
                addDates.html(data.html);
                //addDates1.html(data.html);
                //$('.cabin_rates_div_'+cnt).html(data.html2);
            },
            error: function(e) {
            }
        });
    });
    $(document).on('change', '.shipDatesDropDown', function() {
        var date_id = $(this).val();
        var addDates = $(this).closest('.hotelDiv').find('.datesDropDown');
        var cnt = $(this).attr('data-id');
        var ship_id = $('.ship_id_'+cnt).val();
        $('.loader').show();    
        $.ajax({
            url: base_url+'/super-user/ship-date-change',
            type: 'POST',
             // dataType: 'json',
            data: {'ship_id':ship_id,'cnt':cnt,'ship_dates_id':date_id},
            success: function(data) {
                $('.loader').hide(); 
                $('.cabin_rates_div_'+cnt).html(data.html);
                $('.cabin_rates_div_euro_'+cnt).html(data.html1);
                //addDates.html(data.html);
            },
            error: function(e) {
            }
        });
    });
     $(document).on('change', '.datesDropDown', function() {
        
       var display_key = $(this).attr('data-id');
       var market_option = $(this).find(':selected').attr('data-market-option');
       $('#select_market_option_'+display_key).val(market_option);
       if(market_option == 1)
        {
            $('.pound_colunm_out_'+display_key).show();
            $('.pound_colunm_out_'+display_key+' input').attr('required');
            $('.euro_colunm_out_'+display_key).hide();
            $('.euro_colunm_out_'+display_key+' input').removeAttr('required');
            $('.error_message_'+display_key).html('');
        }
        else if(market_option == 2)
        {
            $('.pound_colunm_out_'+display_key).hide();
             $('.pound_colunm_out_'+display_key+' input').removeAttr('required');
            $('.euro_colunm_out_'+display_key).show();
            $('.euro_colunm_out_'+display_key+' input').attr('required');
            $('.error_message_'+display_key).html('');
        }
        else
        {
            $('.pound_colunm_out_'+display_key).show();
            $('.pound_colunm_out_'+display_key+' input').attr('required');
            $('.euro_colunm_out_'+display_key).show();
            $('.euro_colunm_out_'+display_key+' input').attr('required');
        }
         $('.display_pound_other_'+display_key).hide();
        $('.display_pound_srs_other_'+display_key).hide();
         $('.display_euro_other_'+display_key).hide();
        $('.display_euro_srs_other_'+display_key).hide();
    });
     /*$('.adjust_inv').toggle(function({
        alert('cliked');
     }))*/
    $(document).on('click', '.add_ss_after', function() {

        $('.ss_after_div').toggle();
     })

    $(document).on('click', '.add_import_crossing', function() {
        var htmls = '';
        var key = $(this).attr('data-id');
        <?php  $crossing_cnt = 0;
        if(!empty($crossingDetailTemplate)) {
            foreach($crossingDetailTemplate as $crossinval) { ?>
            htmls += '<div class="col-sm-2 display_pound_rate_'+key+' pound_colunm_out_'+key+'">\
                <div class="form-group">\
                    <label>Cost of crossing pp (£)<br/><?=$crossinval->company_name?></label>\
                    <input type="hidden" name="step8[tour]['+key+'][crossing][<?=$crossing_cnt?>][company_id]" value="<?=$crossinval->id?>">\
                    <input type="text" class=" form-control decimal" id="rate_pound_'+key+'" name="step8[tour]['+key+'][crossing][<?=$crossing_cnt?>][cost_pound]" value="<?=$crossinval->company_cost_pound?>" required>\
                </div>\
            </div>';
            <?php $crossing_cnt++;} } ?>
        $('.crossing_default_div').html(htmls);
        $(this).hide();
     })

</script>
<script src="{{ asset('js/popper.min.js') }}"></script> 
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/pages/tour_show.js') }}"></script>