{{-- <link rel="stylesheet" href="{{ asset('css/style-products.css') }}">     --}}
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">    
<style type="text/css" media="screen">
    .addProductBtn {
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
            <a class="orangeLink addProductBtn" href="javascript:;">New Product</a>
                <input type="hidden" name="tourId" class="tourId" value="{{$ToursList->id}}">
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
                            } ?>
                            <td class="col-cost visible"><?php echo implode(', <br>',$countryName); ?></td>
                            <td class="col-name visible">{{ getUserNames($experListValue->created_by) }}</td>
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
                    <a target="_blank" href="{{ route('experience.show', $experListValue->id) }}" class="enableProductCls">Preview Product</a>
                </div>
            </div>
            <div class="hotelSecSide15">
                <div class="text-center">
                    <a href="{{ route('tours-experiences', $experListValue->id) }}" class="enableProductCls">Edit Product</a>
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
                    <a href="javascript:;" class="enableProductCls editDocument" data-id="{{ $experListValue->id }}">Edit Documents</a>
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
                    <a href="javascript:;" class="enableProductCls manageDatesRates" data-id="{{ $experListValue->id }}" <?php echo $style; ?>>Manage tour dates & rates</a>
                </div>
            </div>
            <div class="hotelSecSide15">
                <div class="text-center">
                    <a href="javascript:;" class="enableProductCls">Product Notes</a>
                </div>
            </div>
            <div class="hotelSecSide15">
                <div class="text-center">
                    <a href="javascript:;" class="enableProductCls MoveLinkCls" data-id="{{ $experListValue->id }}" data-protoid="{{ $experListValue->tour_id }}">Move Product</a>
                </div>
            </div>
            <div class="hotelSecSide15">
                <div class="text-center">
                    <a href="{{ route('driverReviews', $experListValue->id) }}" class="enableProductCls">Driver reviews</a>
                </div>
            </div>
            <div class="hotelSecSide15">
                <div class="text-center">
                    <a href="javascript:;" class="enableProductCls">Guest reviews</a>
                </div>
            </div>
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
        </div>
         <div class="modal fade" id="buttonsModal{{$experListValue->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel{{$experListValue->id}}" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel{{$experListValue->id}}">Download Assets</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <button class="btn btn-warning downloadAssets" data-url="{{ route('download-assets2', $experListValue->id) }}">Download Images</button>
                    <a class="btn btn-warning" href="{{ route('download-doc2', $experListValue->id) }}">Download Document</a>
                  </div>
                  <div class="modal-footer">
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
                <div class="heading" style="margin-bottom: 15px;">
                    Edit tour documents
                </div>
                <h5 style="margin-bottom: 30px;">Here you can edit any documents that will be used for the bookings.</h5>
                <div class="tour_dates_header" style="padding: 10px 0px;font-weight: bold;color: #000;">
                    Tour Dates
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
 <script>
    $("tr.openBooking").bind("click", function(){
        var cartExperienceId = $(this).data("id");
        $("tr.openBooking").removeClass("active");
        $(this).addClass("active");
        $(".bookingForm").hide();
        $("#rightColInfo-"+cartExperienceId).show();
    });
    $(document).on('click', '.editDocument', function() {
        var id = $(this).attr('data-id');
        $('.loader').show();    
        $.ajax({
            url: base_url+'/super-user/edit-documents-tours',
            type: 'POST',
            data: {'exp_id':id},
            success: function(data) {
                $('#appendHtml').html(data.html);
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
        $('.loader').show();    
        $.ajax({
            url: base_url+'/super-user/mark-as-completed-hc',
            type: 'POST',
            data: {'exp_date_id':exp_date_id},
            success: function(data) {
                $('.loader').hide();  
                $('#saveHcForm').click();
                // $('#hcModal').modal('hide');
                // toastSuccess('Tour has been updated successfully.');
            },
            error: function(e) {
            }
        });   
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
            },
            error: function(e) {
            }
        });   
    });
    $("body").on("click", '.downloadAssets', function(e) {
        var urls = $(this).attr('data-url');
        $('.loader').show();    
        $.ajax({
            url: urls,
            type: 'POST',
            success: function(data) {
                $('.loader').hide();
                window.location.href = base_url+'/printassets.zip';
                
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
    $(document).on('click', '.editDate', function() {
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
        pointerNone.removeClass('pointerNone');
        $('.editDate').hide();
        $('.addAnotherDate').hide();
        saveDates.show();
        addHotel.show();
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
    });
    $(document).on('click', '.removeParentDiv', function() {
        $(this).closest('.parentDiv').remove();
        $('.editDate').show();
        $('.addAnotherDate').show();
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
                                        <select class="form-control datesDropDown" name="step8[tour]['+sum+'][hotel][0][date]" required="">\
                                            <option value="">-</option>\
                                        </select>\
                                    </div>\
                                    <div class="form-group" style="display: inline-flex;width: 100%;margin-bottom:2px;">\
                                        <label style="font-weight: bold;color: black;width: 50px;font-size: 16px;margin-right: 10px;">Type:</label>\
                                        <div class="form-check form-check-inline">\
                                          <input class="form-check-input" type="radio" name="step8[tour]['+sum+'][hotel][0][type]" id="inlineRadio1'+sum+'0" value="1" required>\
                                          <label class="form-check-label" for="inlineRadio1'+sum+'0" style="font-size: 0.98rem;color: #495057;">Standard</label>\
                                        </div>\
                                        <div class="form-check form-check-inline">\
                                          <input class="form-check-input" type="radio" name="step8[tour]['+sum+'][hotel][0][type]" id="inlineRadio2'+sum+'0" value="0" required>\
                                          <label class="form-check-label" for="inlineRadio2'+sum+'0" style="font-size: 0.98rem;color: #495057;">Upscale</label>\
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
                                <div class="col-sm-12">\
                                    <label style="margin-top: 15px;">Tour rate</label>\
                                </div>\
                                <div class="col-sm-2">\
                                    <div class="form-group">\
                                        <label>Currency</label>\
                                        <select class="form-control" name="step8[tour]['+sum+'][currency]">\
                                            <option value="">&pound;</option>\
                                        </select>\
                                    </div>\
                                </div>\
                                <div class="col-sm-2">\
                                    <div class="form-group">\
                                        <label>Rate</label>\
                                        <input type="text" class="form-control" name="step8[tour]['+sum+'][rate]">\
                                    </div>\
                                </div>\
                                <div class="col-sm-2">\
                                    <div class="form-group">\
                                        <label>SRS</label>\
                                        <input type="text" class="form-control" name="step8[tour]['+sum+'][srs]">\
                                    </div>\
                                </div>\
                                <div class="col-sm-2">\
                                    <div class="form-group">\
                                        <label>Deposit</label>\
                                        <input type="text" class="form-control" name="step8[tour]['+sum+'][deposit]">\
                                    </div>\
                                </div>\
                                <div class="col-sm-2">\
                                    <div class="form-group">\
                                        <label>Single SRS</label>\
                                        <input type="text" class="form-control" name="step8[tour]['+sum+'][single_srs]">\
                                    </div>\
                                </div>\
                                <div class="col-sm-2">\
                                    <div class="form-group">\
                                        <label>Double SRS</label>\
                                        <input type="text" class="form-control" name="step8[tour]['+sum+'][double_srs]">\
                                    </div>\
                                </div>\
                                <div class="col-sm-2">\
                                    <div class="form-group">\
                                        <label>Triple SRS</label>\
                                        <input type="text" class="form-control" name="step8[tour]['+sum+'][triple_srs]">\
                                    </div>\
                                </div>\
                                <div class="col-sm-2">\
                                    <div class="form-group">\
                                        <label>Quad SRS</label>\
                                        <input type="text" class="form-control" name="step8[tour]['+sum+'][quad_srs]">\
                                    </div>\
                                </div>\
                                <div class="col-sm-2">\
                                    <div class="form-group">\
                                        <label>Driver SRS</label>\
                                        <input type="text" class="form-control" name="step8[tour]['+sum+'][driver_srs]">\
                                    </div>\
                                </div>\
                                <div class="col-sm-12">\
                                <a href="javascript:;" class="btn orangeLink saveDates" style="margin-bottom: 20px;">Save Date</a>\
                                </div>\
                            </div>\
                        </div>\
                    </div>';
        $('.appendParentDiv').append(htmls);
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
                        <label style="font-weight: bold;color: black;width: 50px;font-size: 16px;margin-right: 10px;">Type:</label>\
                        <div class="form-check form-check-inline">\
                          <input class="form-check-input" type="radio" name="step8[tour]['+sum+'][hotel]['+hotelsum+'][type]" id="inlineRadio1'+sum+hotelsum+'" value="1" required>\
                          <label class="form-check-label" for="inlineRadio1'+sum+hotelsum+'" style="font-size: 0.98rem;color: #495057;">Standard</label>\
                        </div>\
                        <div class="form-check form-check-inline">\
                          <input class="form-check-input" type="radio" name="step8[tour]['+sum+'][hotel]['+hotelsum+'][type]" id="inlineRadio2'+sum+hotelsum+'" value="0" required>\
                          <label class="form-check-label" for="inlineRadio2'+sum+hotelsum+'" style="font-size: 0.98rem;color: #495057;">Upscale</label>\
                        </div>\
                </div></div>';
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
</script>
<script src="{{ asset('js/popper.min.js') }}"></script> 
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/pages/tour_show.js') }}"></script>