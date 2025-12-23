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
                            <form action="{{ route('account-superuser-pending') }}" id="filterForm">
                        
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
                        <a href="{{ route('account-superuser-pending') }}" style="color: orange;font-weight: normal;text-decoration: underline !important;float: left;">reset</a>
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
        </style>
        <div class="middleCol_row header">

            <div class="column">
                Name
            </div>

            <div class="column">
                Hotel Name
            </div>
            <div class="column">
                Collaborator Name
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
        <?php  ?>
        @foreach($items as $key => $item)
        <?php $colobratorName = $item->colobratorName; ?>
                   <?php /*  @foreach($cartItem->cartExperiences as $item) */?>
                            <?php 
                           
                            if($item->cancel_status == 0 || $item->full_cancel == 1){
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
                                    {{ $hotel_data['hotel_name'] }}
                                </div>
                                <div class="column">
                                    {{ !empty($colobratorName)?$colobratorName:'' }}
                                </div>
                                <div class="column">
                                    {{ $hotel_data['date_from'] }} - {{ $hotel_data['date_to'] }}
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
                  <?php /* @endforeach  */?>
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
    @foreach($items as $key => $item)
        <?php /* @foreach($cartItem->cartExperiences as $item)  */?>
        <?php
        if($item->cancel_status == 0 || $item->full_cancel == 1){
            continue;
        }
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
        if(empty($cancellation_days))
        {
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
        }
        
        ?>
            <div class="bookingForm" id="rightColInfo-{{ $item->id }}">
                <span class="headingS">Tour Status</span>
                <span class="headingLLL">{{ optional($item->tourStatuses->last())->percent }}%</span>
                <span class="headingS3">{{ optional($item->tourStatuses->last())->name }}</span>

                <div class="tourInfoCont">
                    <div class="infoBox">
                        <span class="left">Date Booked</span>
                        <span class="right">{{ date('d/m/Y', strtotime($item->finalized_at)) }}</span>
                    </div>
                    <div class="infoBox">
                        <span class="left">Tour Date</span>
                        <span class="right">{{ date('d/m/Y', strtotime($item->date_from)) }}</span>
                    </div>
                    <div class="infoBox">
                        <span class="left">Canx DD</span>
                        <span class="right">
                            <?php if(max($cancellation_days) > 0){
                                $canx_date = strtotime('-'.max($cancellation_days).' days', strtotime($item->date_from));
                                $today = strtotime(date('Y-m-d'));
                                echo date('d/m/Y',$canx_date);
                            }else{
                                $canx_date = '';
                                $today = '';
                                echo '---';
                            } ?>
                        </span>
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
                        <span class="left">Cancelled </span>
                        <span class="right">
                           {{ !empty($item->cancel_date)?date('d/m/Y', strtotime($item->cancel_date)):'' }}
                        </span>
                    </div>
                    <div class="infoBox">
                        <span class="left">PAX</span>
                        <span class="right">{{get_total_pax($item->id)}}</span>
                    </div>
                    
                </div>
                <?php
                $date_rate_id = $item->dates_rates_id;
                $hotel_dates = 


DB::connection('mysql_veenus')->table('experience_dates')->selectRaw('experience_dates.id,hotel_dates.free_srs,experience_dates.pdf_file_name')->join('hotel_dates','hotel_dates.id','=','experience_dates.hotel_date_id')->where('experience_dates.dates_rates_id', $date_rate_id)->first();
               /* if(!empty($canx_date) && !empty($today)){*/
                    if($canx_date >= $today){
                        $target = '#cancelModal'.$item->id;
                    }else{
                        $target = '#cancelModal2'.$item->id;
                    }
                    ?>
                    <button class="orangeLink" data-toggle="modal" data-target="#cancelDetails{{$item->id}}">Cancellation Details</button>
                    <button class="orangeLink" id="reinstatetour" data-url="{{ route('reinstate-tour',$item->id) }}">Reinstate Tour</button>

                    <!-- <button class="orangeLink" data-fancybox data-type="ajax" data-src="" href="{{ route('reinstate_all_tour', $item->id) }}" id="reloadInfo{{$item->id}}">Reinstate Tours</button> -->
                    <button class="orangeLink" style="background: red;" data-toggle="modal" data-target="<?php echo $target; ?>">Cancel Tour</button>
                    <a class="orangeLink docusignStepCls" data-id="{{ $item->id }}" style="background: orange;"  data-urls="{{ route('change-docusign', $item->id) }}" data-tour="{{ route('show-tourpack', $item->id) }}" data-tab="collaborator" href="javascript:void(0)">View ETC</a>
                  <!--   <a class="orangeLink " style="background: orange;" target="_blank" href="{{URL('etc_document/'.$item->id)}}">Download ETC</a> -->
                    <a class="orangeLink hcDateClick" class="hcDateClick" data-id="{{!empty($hotel_dates->id)?$hotel_dates->id:''}}"  href="javascript:void(0)" data-exid="{{$item->experiences_id}}" style="background: orange;" href="">View HC</a>
                     <a class="orangeLink" target="_bl" data-fancybox data-type="ajax" data-src="" href="{{ route('tour_notes', $item->id) }}"   href="">View Tour Notes</a><!-- data-fancybox data-type="ajax" data-src="" href="{{ route('change-rooms', $item->id) }}"  -->
                    <div class="modal fade" id="cancelModal{{$item->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header" style="border: 0;">
                            <h4 class="modal-title">Cancel Tour</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 40px;">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <b style="display: inline-block;margin-bottom: 30px;">This tour is still outside the cancellation period. You can put it back for sale or remove the date from the stock list. </b>
                            <!-- <button class="orangeLink canceltour" style="width: auto;float: left;padding: 15px;margin-right: 15px;" data-url="{{ route('cancelled-tour',$item->id) }}" data-remove="no">Put back for sale</button> -->
                            <button class="orangeLink"  style="width: auto;float: left;padding: 15px;margin-right: 15px;" data-fancybox data-type="ajax" data-src="" href="{{ route('reinstate_all_tour', $item->id) }}" id="reloadInfo{{$item->id}}">Put Back for Sale</button>
                            <button class="orangeLink canceltour" style="width: auto;float: left;padding: 15px; background:red;" data-url="{{ route('cancelled-tour',$item->id) }}" data-remove="yes">Cancel Tour</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal fade" id="cancelModal2{{$item->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header" style="border: 0;">
                            <h4 class="modal-title">Cancel Tour</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 40px;">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <b style="display: inline-block;margin-bottom: 15px;">This tour is being cancelled within the cancellation period.</b>
                            <b style="display: inline-block;margin-bottom: 30px;">Before proceeding with the cancellation please make sure the following points are completed.</b>
                            
                                <div class="checkarea_part_Dates" style="width:100%;">
                                    <label class="checkbox_div" style="text-transform: none;">
                                      <input type="checkbox" class="custom_chkbox tagchkbox notClickedCls checkedBox"> <span class="notClickedCls ">Call hotel to cancel the date</span>
                                      <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkarea_part_Dates" style="width:100%;">
                                    <label class="checkbox_div" style="text-transform: none;">
                                      <input type="checkbox" class="custom_chkbox tagchkbox notClickedCls checkedBox"> <span class="notClickedCls ">Call client telling them about cancellation charges</span>
                                      <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkarea_part_Dates" style="width:100%;">
                                    <label class="checkbox_div" style="text-transform: none;">
                                      <input type="checkbox" class="custom_chkbox tagchkbox notClickedCls checkedBox"> <span class="notClickedCls ">Call experience providers to cancel any bookings made</span>
                                      <span class="checkmark"></span>
                                    </label>
                                </div>
                            <b style="display: inline-block;margin-bottom: 30px;">Please remember that the tour date will have to be manually removed from your stock list.</b>
                            <button class="orangeLink canceltour" style="width: auto;float: left;padding: 15px;background: red;" data-url="{{ route('cancelled-tour',$item->id) }}" data-remove="no">Cancel Tour</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal fade" id="cancelDetails{{$item->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header" style="border: 0;">
                            <h4 class="modal-title">Cancellation Details</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 40px;">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <b style="display: inline-block;margin-bottom: 30px;">Cancellation reason provided by collaborator</b>
                            <p>{{$item->cancel_reason}}</p>
                          </div>
                        </div>
                      </div>
                    </div>
                <?php /*}*/ ?>
            </div>
        <?php /* @endforeach */?>
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
<script src="{{ asset('js/sweetalert.min.js') }}"></script>
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
            data: {'hotel_id':hotelId, 'dataId':dataId, 'datatab':datatab, 'popup':'1'},
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
    $("body").on("click", '.canceltour', function(e) {
        if($(this).closest('.modal-body').find('input.checkedBox:checked').length == $(this).closest('.modal-body').find('input.checkedBox').length){
            swal({
              title: "Are you sure?",
              text: "Do you want to fully cancel this tour?",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            }).then((willDelete) => {
              if (willDelete) {
                var url = $(this).attr('data-url');
                var date_remove = $(this).attr('data-remove');
                $('.loader').show();    
                $.ajax({
                    url: url,
                    type: 'POST',
                     // dataType: 'json',
                    data: {'date_remove':date_remove},
                    success: function(data) {
                        $('.loader').hide();
                        toastSuccess('Tour has been cancelled');  
                        location.reload(); 
                    },
                    error: function(e) {
                    }
                });
              }
            });
        }else{
            toastError('Please check all checkboxes before proceed');  
        }
       
    });
    $("body").on("click", '#reinstatetour', function(e) {
        if(confirm("Are you sure you want to reinstate this tour?"))
        {
            var url = $(this).attr('data-url');
            var cancelReason = '';
            $('.loader').show();    
            $.ajax({
                url: url,
                type: 'POST',
                 // dataType: 'json',
                data: {'cancelReason':cancelReason},
                success: function(data) {
                    $('.loader').hide();
                    toastSuccess('Tour has been reinstate.');  
                    location.reload(); 
                },
                error: function(e) {
                }
            });
        }

    });
</script>
