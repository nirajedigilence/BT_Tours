<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
<script src="{{ asset('js/popper.min.js') }}"></script> 
<script src="{{ asset('js/bootstrap.min.js') }}"></script>   

<div class="middleCol completedBooking" id="middleCol">


    @if(Session::has('success'))
        <div class="alert alert-success">
            {!! session('success') !!}
        </div>

    @elseif(Session::has('error'))
        <div class="alert alert-danger">
            {!! session('error') !!}
        </div>
    @endif
    <div class="_contentBooking">

        <div class="main_content_nav">

            <div class="filters">

                <div class="filters_dropdown">

                    <div class="cta">
                        Filters
                    </div>

                    <div class="dropdown">
                            <form action="{{ route('account-superuser-cancelled') }}" id="filterForm">
                        
                           <input type="hidden" name="stage" id="stage" value="<?php echo isset($_GET['stage']) ? $_GET['stage'] : '' ?>" >
                            <input type="hidden" name="sort_column_name" id="sort_column_name">
                            <input type="hidden" name="sort_type" id="sort_type">

                            <input type="hidden" name="ref_no" id="ref_no" value="<?php echo isset($_GET['ref_no']) ? $_GET['ref_no'] : 'no' ?>">
                            <input type="hidden" name="next_step" id="next_step" value="<?php echo isset($_GET['next_step']) ? $_GET['next_step'] : 'no' ?>">
                            <input type="hidden" name="next_step_due" id="next_step_due" value="<?php echo isset($_GET['next_step_due']) ? $_GET['next_step_due'] : 'no' ?>">
                            <input type="hidden" name="collaborator" id="collaborator" value="<?php echo isset($_GET['collaborator']) ? $_GET['collaborator'] : 'yes' ?>">
                            <input type="hidden" name="experience" id="experience" value="<?php echo isset($_GET['experience']) ? $_GET['experience'] : 'no' ?>">
                            <input type="hidden" name="hotel" id="hotel" value="<?php echo isset($_GET['hotel']) ? $_GET['hotel'] : 'yes' ?>">
                            <input type="hidden" name="tour_no" id="tour_no" value="<?php echo isset($_GET['tour_no']) ? $_GET['tour_no'] : 'yes' ?>">

                            <div class="dropdown_section">

                                <div class="heading">
                                    By Booking Stage
                                </div>

                                <div class="by_booking_stages">
                                    <?php
                                    $stage = '';
                                    if(isset($_GET['stage']) && !empty($_GET['stage'])){
                                        $stage = $_GET['stage'];
                                    }
                                    ?>
                                    <a href="javascript:;" class="stage <?php echo ($stage == 10) ? 'active' : ''; ?>" data-stage="10">
                                        <div class="percentage">10%</div>
                                        <div class="line"></div>
                                        <div class="label">Exp Tour Confirmation</div>
                                    </a>

                                    <a href="javascript:;" class="stage <?php echo ($stage == 20) ? 'active' : ''; ?>" data-stage="20">
                                        <div class="percentage">20%</div>
                                        <div class="line"></div>
                                        <div class="label">URL</div>
                                    </a>

                                    <a href="javascript:;" class="stage <?php echo ($stage == 30) ? 'active' : ''; ?>" data-stage="30">
                                        <div class="percentage">30%</div>
                                        <div class="line"></div>
                                        <div class="label">Tracking 1</div>
                                    </a>

                                    <a href="javascript:;" class="stage <?php echo ($stage == 40) ? 'active' : ''; ?>" data-stage="40">
                                        <div class="percentage">40%</div>
                                        <div class="line"></div>
                                        <div class="label">Tracking 2</div>
                                    </a>

                                    <a href="javascript:;" class="stage <?php echo ($stage == 50) ? 'active' : ''; ?>" data-stage="50">
                                        <div class="percentage">50%</div>
                                        <div class="line"></div>
                                        <div class="label">Deposit</div>
                                    </a>

                                    <a href="javascript:;" class="stage <?php echo ($stage == 60) ? 'active' : ''; ?>" data-stage="60">
                                        <div class="percentage">60%</div>
                                        <div class="line"></div>
                                        <div class="label">Tracking 3</div>
                                    </a>

                                    <a href="javascript:;" class="stage <?php echo ($stage == 70) ? 'active' : ''; ?>" data-stage="70">
                                        <div class="percentage">70%</div>
                                        <div class="line"></div>
                                        <div class="label">Guest list</div>
                                    </a>

                                    <a href="javascript:;" class="stage <?php echo ($stage == 80) ? 'active' : ''; ?>" data-stage="80">
                                        <div class="percentage">80%</div>
                                        <div class="line"></div>
                                        <div class="label">Invoice</div>
                                    </a>
                                    
                                    <a href="javascript:;" class="stage <?php echo ($stage == 90) ? 'active' : ''; ?>" data-stage="90">
                                        <div class="percentage">90%</div>
                                        <div class="line"></div>
                                        <div class="label">Tour pack</div>
                                    </a>

                                    <a href="javascript:;" class="stage <?php echo ($stage == 100) ? 'active' : ''; ?>" data-stage="100">
                                        <div class="percentage">100%</div>
                                        <div class="line"></div>
                                        <div class="label">Tour review</div>
                                    </a>

                                </div>

                            </div>

                            <div class="dropdown_section">

                                <div class="heading">
                                    By Date
                                </div>

                                <div class="by_date">

                                    <div class="field">
                                        <div class="label">By Month</div>
                                        <select name="month" id="month">
                                            <option value="">---</option>
                                            <option value="01" <?php echo (isset($_GET['month']) && ($_GET['month'] == '01') ? 'selected' : ''); ?>>January</option>
                                            <option value="02" <?php echo (isset($_GET['month']) && ($_GET['month'] == '02') ? 'selected' : ''); ?>>February</option>
                                            <option value="03" <?php echo (isset($_GET['month']) && ($_GET['month'] == '03') ? 'selected' : ''); ?>>March</option>
                                            <option value="04" <?php echo (isset($_GET['month']) && ($_GET['month'] == '04') ? 'selected' : ''); ?>>April</option>
                                            <option value="05" <?php echo (isset($_GET['month']) && ($_GET['month'] == '05') ? 'selected' : ''); ?>>May</option>
                                            <option value="06" <?php echo (isset($_GET['month']) && ($_GET['month'] == '06') ? 'selected' : ''); ?>>June</option>
                                            <option value="07" <?php echo (isset($_GET['month']) && ($_GET['month'] == '07') ? 'selected' : ''); ?>>July</option>
                                            <option value="08" <?php echo (isset($_GET['month']) && ($_GET['month'] == '08') ? 'selected' : ''); ?>>August</option>
                                            <option value="09" <?php echo (isset($_GET['month']) && ($_GET['month'] == '09') ? 'selected' : ''); ?>>September</option>
                                            <option value="10" <?php echo (isset($_GET['month']) && ($_GET['month'] == '10') ? 'selected' : ''); ?>>October</option>
                                            <option value="11" <?php echo (isset($_GET['month']) && ($_GET['month'] == '11') ? 'selected' : ''); ?>>November</option>
                                            <option value="12" <?php echo (isset($_GET['month']) && ($_GET['month'] == '12') ? 'selected' : ''); ?>>December</option>
                                        </select>
                                    </div>

                                    <div class="field">
                                        <div class="label">Date From</div>
                                        <div class="input_wrapper">
                                            <input type="date" name="date_from" id="date_from" placeholder="dd/mm/yyyy" value="<?php echo (isset($_GET['date_from']) ? $_GET['date_from'] : ''); ?>">
                                            <!-- <div class="icon"></div> -->
                                        </div>
                                    </div>

                                    <div class="field">
                                        <div class="label">Date Until</div>
                                        <div class="input_wrapper">
                                            <input type="date" name="date_to" id="date_to" placeholder="dd/mm/yyyy" value="<?php echo (isset($_GET['date_to']) ? $_GET['date_to'] : ''); ?>">
                                            <!-- <div class="icon"></div> -->
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="dropdown_section">

                                <!-- <div class="heading">
                                    Other Filters
                                </div>

                                <div class="other_filters">

                                    
                                    <a href="javascript:;" class="option refnoClick <?php echo (isset($_GET['ref_no']) && $_GET['ref_no'] == 'yes') ? 'active' :''; ?>">
                                        Ref no.
                                    </a>

                                    <a href="javascript:;" class="option nextstepClick <?php echo (isset($_GET['next_step']) && $_GET['next_step'] == 'yes') ? 'active' :''; ?>">
                                        Next Step
                                    </a>
                                    <a href="javascript:;" class="option nextstepdueClick <?php echo (isset($_GET['next_step_due']) && $_GET['next_step_due'] == 'yes') ? 'active' :''; ?>">
                                        Next Step Due
                                    </a>

                                    <a href="javascript:;" class="option collabClick <?php echo (isset($_GET['collaborator']) && $_GET['collaborator'] == 'no') ? '' :'active'; ?>">
                                        Collaborator
                                    </a>

                                    <a href="javascript:;" class="option expClick <?php echo (isset($_GET['experience']) && $_GET['experience'] == 'yes') ? 'active' :''; ?>">
                                        Experience
                                    </a>

                                    <a href="javascript:;" class="option <?php echo (isset($_GET['hotel']) && $_GET['hotel'] == 'no') ? '' :'active'; ?> hotelnameClick">
                                        Hotel
                                    </a>

                                    <a href="javascript:;" class="option <?php echo (isset($_GET['tour_no']) && $_GET['tour_no'] == 'no') ? '' :'active'; ?> tournoClick">
                                        Tour Numbers
                                    </a>


                                </div> -->
                                <input type="hidden" name="filter_type" id="filter_type" value="">
                                <input type="submit" class="btn btn-warning" name="submit" value="Filter" style="float: right;color: #fff;font-weight: bold;background:orange;border: orange;" id="submitBtn">
                                 <!-- <button class="btn btn-warning mr-2"  style="float: right;color: #fff;font-weight: bold;background:orange;border: orange;" data-fancybox data-type="ajax" data-src="" href="{{ route('export_data') }}" >Export Data</button> -->
                                <!-- <input type="submit" class="btn btn-warning mr-2" name="submit" value="Export Data" style="float: right;color: #fff;font-weight: bold;background:orange;border: orange;" id="submitBtnExportAll">

                                <input type="submit" class="btn btn-warning mr-2" name="submit" value="Export Booking Data" style="float: right;color: #fff;font-weight: bold;background:orange;border: orange;" id="submitBtnExport">

                                <a style="float: right;color: #fff;font-weight: bold;background:orange;border: orange;" href="{{route('export-client-booking')}}" class="btn btn-warning mr-2">Export Client Booking</a> -->
                                <!-- <input type="submit" class="btn btn-warning mr-2" name="submit" value="Export Client Booking" style="float: right;color: #fff;font-weight: bold;background:orange;border: orange;" id="submitBtnExport"> -->
                            </div>

                        </form>
                    </div>
                </div>

                <ul class="active_filters">
                    <li class="label">Active filters:<br>
                        <a href="{{ route('account-superuser-cancelled') }}" style="color: orange;font-weight: normal;text-decoration: underline !important;float: left;">reset</a>
                    </li>
                    <?php if(isset($_GET['stage']) && !empty($_GET['stage'])){ ?>
                        <li>Stage <a href="javascript:;" id="stageRemove"><span>x</span></a></li>
                    <?php } ?>
                    <?php if(isset($_GET['date_from']) && !empty($_GET['date_from'])){ ?>
                        <li>Date <a href="javascript:;" id="dateRemove"><span>x</span></a></li>
                    <?php } ?>
                    <?php if(isset($_GET['month']) && !empty($_GET['month'])){ ?>
                        <li>Month <a href="javascript:;" id="monthRemove"><span>x</span></a></li>
                    <?php } ?>
                    <?php if(isset($_GET['tour_no']) && $_GET['tour_no'] == 'no'){ ?>
                    <?php }else{ ?>
                       <!--  <li>Tour Numbers <a href="javascript:;" id="tournoRemove"><span>x</span></a></li> -->
                    <?php } ?>
                    <?php if(isset($_GET['hotel']) && $_GET['hotel'] == 'no'){ ?>
                    <?php }else{ ?>
                        <li>Hotel <a href="javascript:;" id="hotelRemove"><span>x</span></a></li>
                    <?php } ?>
                    <?php if(isset($_GET['ref_no']) && $_GET['ref_no'] == 'yes'){ ?>
                        <li>Ref No. <a href="javascript:;" id="refnoRemove"><span>x</span></a></li>
                    <?php } ?>
                    <?php if(isset($_GET['next_step']) && $_GET['next_step'] == 'yes'){ ?>
                        <li>Next Step <a href="javascript:;" id="nextRemove"><span>x</span></a></li>
                    <?php } ?>
                    <?php if(isset($_GET['next_step_due']) && $_GET['next_step_due'] == 'yes'){ ?>
                        <li>Next Step Due <a href="javascript:;" id="nextdueRemove"><span>x</span></a></li>
                    <?php } ?>
                     <?php if(isset($_GET['collaborator']) && $_GET['collaborator'] == 'no'){ ?>
                    <?php }else{ ?>
                        <li>Collaborator <a href="javascript:;" id="collRemove"><span>x</span></a></li>
                    <?php } ?>
                    <?php if(isset($_GET['experience']) && $_GET['experience'] == 'yes'){ ?>
                        <li>Experience <a href="javascript:;" id="expRemove"><span>x</span></a></li>
                    <?php } ?>
                </ul>

            </div>

            <div class="search">

                <div class="search__input">
                    <input type="text" id="myInput" placeholder="Search" onkeyup="myFunction()">
                    <button type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>

            </div>

        </div>
        <style type="text/css">
            .openBooking.active {
                background: #F3F3F3;
                border-right: none !important;
            }
            input.cta.total {
                background-color: #000000;
                color: #fff;
                padding: 2px 7px;
                border-radius: 5px;
                cursor: pointer;
            }
        </style>
        <div class="middleCol_row header">

            <div class="column">
                Name
            </div>
            <div class="column">
               Collobrator Name
            </div>
            <div class="column">
                Hotel Name
            </div>

            <div class="column">
                Date
            </div>
            <div class="column">
                Night
            </div>
            <div class="column width_small">
                PAX
            </div>

            <div class="column width_small">
                Tour Status
            </div>

        </div>
        @foreach($items as $key => $cartItem)
                    @foreach($cartItem->cartExperiences as $item)
                            <?php 
                            if($item->full_cancel == 0){
                                continue;
                            }
                             $hotel_data = get_hotel_date($item->id);
                            if(isset($item->tourStatuses->last()->id)){ 
                                if(isset($_GET['stage']) && !empty($_GET['stage'])){
                                if(optional($item->tourStatuses->last())->percent != $_GET['stage']){
                                    continue;
                                }
                            }
                            if(isset($_GET['month']) && !empty($_GET['month'])){
                                $month = date('m',strtotime($item['date_from']));
                                if($month != $_GET['month']){
                                    continue;
                                }
                            }
                            if(isset($_GET['date_from']) && !empty($_GET['date_from']) && isset($_GET['date_to']) && !empty($_GET['date_to'])){
                                $filter_from_date = strtotime(str_replace('/', '-', $_GET['date_from']));
                                $date_from = strtotime($item['date_from']);
                                $filter_from_to = strtotime(str_replace('/', '-', $_GET['date_to']));
                                if($filter_from_date > $date_from || $filter_from_to < $date_from){
                                    continue;
                                }
                            }?>
                            <div class="middleCol_row openBooking" id="openBooking-{{ $item->id }}" data-id="{{ $item->id }}">

                                <div class="column bold">
                                    {{ $item->experience_name }}
                                </div>
                                 <div class="column">
                                   {{ isset($cartItem->colobratorName) ? $cartItem->colobratorName : '-' }}
                                </div>
                               <!--  <div class="column">
                                    {{ $hotel_data['hotel_name'] }}
                                </div>

                                <div class="column">
                                    {{ $hotel_data['date_from'] }} - {{ $hotel_data['date_to'] }}
                                </div> -->
                                  <div class="column">
                                    {{ $item->hotel_name }}
                                </div>

                                <div class="column">
                                    {{ date("D d M", strtotime($item['date_from'])) }} - {{ date("D d M 'y", strtotime($item['date_to'])) }}
                                </div>
                                <div class="column">
                                    
                                    {{ $hotel_data['nights'] }}
                                </div>

                                <div class="column width_small">
                                    {{get_total_pax($item->id)}}
                                </div>
                                <div class="column width_small centered">
                                    <strong>{{ optional($item->tourStatuses->last())->percent }}%</strong> 
                                    <span class="line_break">{{ optional($item->tourStatuses->last())->name }}</span>
                                </div>

                            </div>
                            <?php }else{ ?>
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
                function myFunction() {

                    // Declare variables
                    var input, filter, ul, li, a, i, txtValue;
                    input = document.getElementById('myInput');
                    filter = input.value.toUpperCase();
                    ul = document.getElementsByClassName("openBooking");
                    // li = ul.getElementsByTagName('div');

                    // Loop through all list items, and hide those who don't match the search query
                    for (i = 0; i < ul.length; i++) {
                        a = ul[i].getElementsByTagName("div")[0];
                        txtValue = a.textContent || a.innerText;

                        a1 = ul[i].getElementsByTagName("div")[1];
                        txtValue1 = a1.textContent || a1.innerText;

                        a2 = ul[i].getElementsByTagName("div")[2];
                        txtValue2 = a2.textContent || a2.innerText;

                        a3 = ul[i].getElementsByTagName("div")[3];
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

    </div>

</div>
<div class="rightCol only-desktop">
    @foreach($items as $key => $cartItem)
        @foreach($cartItem->cartExperiences as $item)
        <?php
        if($item->full_cancel == 0){
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
         $date_rate_id = $item->dates_rates_id;
                $hotel_dates = 


DB::connection('mysql_veenus')->table('experience_dates')->selectRaw('experience_dates.id,hotel_dates.free_srs,experience_dates.pdf_file_name')->join('hotel_dates','hotel_dates.id','=','experience_dates.hotel_date_id')->where('experience_dates.dates_rates_id', $date_rate_id)->first();
        ?>
            <div class="bookingForm" id="rightColInfo-{{ $item->id }}">
                <span class="headingS">Tour Status</span>
                <span class="headingLLL">{{ optional($item->tourStatuses->last())->percent }}%</span>
                <span class="headingS3">{{ optional($item->tourStatuses->last())->name }}</span>

                <div class="tourInfoCont">
                    <div class="infoBox">
                        <span class="left">Date Booked</span>
                        <span class="right">{{ date('d/m/Y', strtotime($cartItem->finalized_at)) }}</span>
                    </div>
                    <div class="infoBox">
                        <span class="left">Tour Date</span>
                        <span class="right">{{ date('d/m/Y', strtotime($item->date_from)) }}</span>
                    </div>
                    <div class="infoBox">
                        <span class="left">Canx Date</span>
                         <?php if(max($cancellation_days) > 0){
                                $canx_date = strtotime('-'.max($cancellation_days).' days', strtotime($item->date_from));
                                $today = strtotime(date('Y-m-d'));
                                echo date('d/m/Y',$canx_date);
                            }else{
                                $canx_date = '';
                                $today = '';
                                echo '---';
                            } ?>
                    </div>
                    <div class="infoBox">
                        <span class="left">Canx days</span>
                        <span class="right">
                            <?php if(max($cancellation_days) > 0){
                                echo max($cancellation_days);
                            }else{
                                echo '---';
                            } ?>
                        </span>
                    </div>
                    <div class="infoBox">
                        <span class="left">PAX</span>
                        <span class="right">{{get_total_pax($item->id)}}</span>
                    </div>
                    <button class="orangeLink" data-toggle="modal" data-target="#cancelDetails{{$item->id}}">Cancellation Details</button>
                    <button class="orangeLink" data-fancybox data-type="ajax" data-src="" href="{{ route('reinstate_all_tour', $item->id) }}" id="reloadInfo{{$item->id}}">Put Back for Sale</button>
                    <button class="orangeLink" data-fancybox data-type="ajax" data-src="" href="{{ route('upload_cancel_tour_document', $item->id) }}" id="reloadInfo{{$item->id}}">Attach Document</button>
                     <a class="orangeLink docusignStepCls" data-id="{{ $item->id }}" style="background: orange;"  data-urls="{{ route('change-docusign', $item->id) }}" data-tour="{{ route('show-tourpack', $item->id) }}" data-tab="collaborator" href="javascript:void(0)">View ETC</a>
                    <!-- <a class="orangeLink " style="background: orange;" target="_blank" href="{{URL('etc_document/'.$item->id)}}">Download ETC</a> -->
                    <a class="orangeLink hcDateClick" class="hcDateClick" data-id="{{!empty($hotel_dates->id)?$hotel_dates->id:''}}"  href="javascript:void(0)" data-exid="{{$item->experiences_id}}" style="background: orange;" href="">View HC</a>
                     <a class="orangeLink" target="_bl" data-fancybox data-type="ajax" data-src="" href="{{ route('tour_notes', $item->id) }}"   href="">View Tour Notes</a>
                    <?php if(!empty($hotel_dates->pdf_file_name)){ ?> 
                   <!--  <a class="orangeLink" target="_bl" href="{{asset('public/pdf/'.$hotel_dates->pdf_file_name)}}" style="background: orange;" href="">Download HC</a> -->
                    <?php } ?>
                </div>
                 <div class="modal fade" id="cancelDetails{{$item->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header" style="border: 0;padding-bottom: 0px;">
                            <h4 class="modal-title">Cancellation Details</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 40px;">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body" style="padding-top: 0px;">
                            <b style="display: inline-block;margin-bottom: 22px;">Cancellation reason - provided by collaborator</b>
                            
                            
                            <div class="content_reason_{{ $item->id }}"><p>{{$item->cancel_reason}}</p>
                            <a href="javascript:;" data-id="{{ $item->id }}" class="reasonEdit" style="color: orange;">Edit</a></div>
                            <div class="content_reason_edit_{{ $item->id }}" style=" display: none;">
                            <textarea id="cancel_reason_{{ $item->id }}" name="cancel_reason" class="form-control" ></textarea>
                            <input type="button" class="btn btn-primary btn-sm mt-1 submit_cancel" name="submit_cancel" data-id="{{ $item->id }}" value="Submit">
                             <input type="button" class="btn btn-secdonary btn-sm mt-1 submit_cancel_res" name="submit_cancel_res" data-id="{{ $item->id }}" value="Cancel">
                            </div>
                            <input type="button" class="cta total mt-2" data-dismiss="modal" aria-label="Close" value="Back"/>
                            
                          </div>
                        </div>
                      </div>
                    </div>
            </div>
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

<script type="text/javascript">
    $("body").on("click", '.filters_dropdown > .cta', function(e) {
        $('.dropdown').toggleClass('filterShow');
    });
       $("body").on("click", '.stage', function(e) {
            $('.stage').removeClass('active');
            $(this).addClass('active');
            var stage = $(this).data('stage');
            $('#stage').val(stage);
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
     $("body").on("click", '.docusignStepCls', function(e) {
        
        // $('.docusignStepLinkCls').trigger('click');
        var urls = $(this).attr('data-urls');
        var datatab = $(this).attr('data-tab');
        parent.jQuery.fancybox.close();
        var hotelId ='';
        var dataId = $(this).attr('data-id');
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
    });
    $(document).ready(function(){
        //$('.reasonEdit').click(function(){
        $(document).on('click', '.reasonEdit', function() {
          var cart_exp_id = $(this).data('id');
            $(this).parent().hide();
             var reason = $('.content_reason_'+cart_exp_id+' p').html();
            $('#cancel_reason_'+cart_exp_id).val(reason);
            $(this).parent().next().show();
        })
        
        //$('.submit_cancel_res').click(function(){
        $(document).on('click', '.submit_cancel_res', function() {
            var cart_exp_id = $(this).data('id');
            $('.content_reason_edit_'+cart_exp_id).hide();
            $('.content_reason_'+cart_exp_id).show();
        });
        //$('.submit_cancel').click(function(){
        $(document).on('click', '.submit_cancel', function() {
            var cart_exp_id = $(this).data('id');
            var reason = $('#cancel_reason_'+cart_exp_id).val();
                    $.ajax({
                        url: base_url+'/update-cancel-reason',
                        type: 'POST',
                        data: {'cart_exp_id':cart_exp_id,'reason':reason},
                        
                        success: function(data) {
                            if(data == 1)
                            {
                                $('.content_reason_edit_'+cart_exp_id).hide();
                                $('.content_reason_'+cart_exp_id).html('<p>'+reason+'</p><a href="javascript:;" data-id="'+cart_exp_id+'" class="reasonEdit">Edit</a>');
                                $('.content_reason_'+cart_exp_id).show();
                                toastSuccess('Update successfully.');
                            }
                            else
                            {
                                toastSuccess('Something went wrong.');
                            }
                            
                        },
                        error: function(e) {
                        }
                    });   
        })
    })
    
</script>