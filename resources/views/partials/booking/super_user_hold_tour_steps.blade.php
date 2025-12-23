<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
<script src="{{ asset('js/popper.min.js') }}"></script> 
<script src="{{ asset('js/bootstrap.min.js') }}"></script>   
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
<script src="https://superal.github.io/canvas2image/canvas2image.js"></script>

<div class="middleCol completedBooking" id="middleCol">
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

    @if(Session::has('success'))
        <div class="alert alert-success">
            {!! session('success') !!}
        </div>

        <script>
            /*$.ajaxSetup({ headers: {'X-CSRF-TOKEN': '{{csrf_token()}}'}});
            $.ajax({
                type: "GET",
                cache: false,
                url: '{{ route('bookings-complete') }}',
                success: function (data) {
                    // on success, post (preview) returned data in fancybox
                    $.fancybox.open(data, {
                        autoSize: false,
                        fitToView : false,
                        width: "70%",
                        height: "90%",
                        minWidth: 300,
                        touch: false,
                        afterLoad: function(){
                            $("#goToBookingsButton").click(function(e){
                                e.preventDefault();
                                $.fancybox.close(true);
                                $('html, body').animate({
                                    scrollTop: $("#middleCol").offset().top
                                }, 500);
                            });
                        }
                    });
                },
                error: function(er){
                    //console.log(er);
                }
            });*/
        </script>

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
                        <?php if (Auth::check() && (Auth::user()->hasRole("Admin")) ){
                                            ?>
                        <form action="{{ route('account-cmsuser') }}" id="filterForm">
                        <?php } else { ?> 
                            <form action="{{ route('account-superuser') }}" id="filterForm">
                        <?php } ?>
                        
                           <input type="hidden" name="stage" id="stage" value="<?php echo isset($_GET['stage']) ? $_GET['stage'] : '' ?>" >
                            <input type="hidden" name="sort_column_name" id="sort_column_name">
                            <input type="hidden" name="sort_type" id="sort_type">

                            <input type="hidden" name="ref_no" id="ref_no" value="<?php echo isset($_GET['ref_no']) ? $_GET['ref_no'] : 'no' ?>">
                            <input type="hidden" name="next_step" id="next_step" value="<?php echo isset($_GET['next_step']) ? $_GET['next_step'] : 'no' ?>">
                            <input type="hidden" name="next_step_due" id="next_step_due" value="<?php echo isset($_GET['next_step_due']) ? $_GET['next_step_due'] : 'no' ?>">
                            <input type="hidden" name="collaborator" id="collaborator" value="<?php echo isset($_GET['collaborator']) ? $_GET['collaborator'] : 'no' ?>">
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
                                        <div class="label">Docusign</div>
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

                           <!--  <div class="dropdown_section">

                                <div class="heading">
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

                                    <a href="javascript:;" class="option collabClick <?php echo (isset($_GET['collaborator']) && $_GET['collaborator'] == 'yes') ? 'active' :''; ?>">
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


                                </div>
                                <input type="submit" class="btn btn-warning" name="submit" value="Filter" style="float: right;color: #fff;font-weight: bold;background:orange;border: orange;" id="submitBtn">
                            
                            </div> -->

                        </form>
                    </div>
                </div>

                <ul class="active_filters">
                    <li class="label">Active filters:<br>
                        <a href="{{ route('account-superuser') }}" style="color: orange;font-weight: normal;text-decoration: underline !important;float: left;">reset</a>
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
                        <li>Tour Numbers <a href="javascript:;" id="tournoRemove"><span>x</span></a></li>
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
                    <?php if(isset($_GET['collaborator']) && $_GET['collaborator'] == 'yes'){ ?>
                        <li>Collaborator <a href="javascript:;" id="collRemove"><span>x</span></a></li>
                    <?php } ?>
                    <?php if(isset($_GET['experience']) && $_GET['experience'] == 'yes'){ ?>
                        <li>Experience <a href="javascript:;" id="expRemove"><span>x</span></a></li>
                    <?php } ?>
                </ul>

            </div>

            <div class="search">

                <div class="search__input">
                    <input type="text" id="myInput" value="<?=!empty($search_txt)?$search_txt:''?>" onkeyup="myFunction()" placeholder="Search">
                    <button type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>

            </div>

        </div>

        <style type="text/css">
            .openBookingSide.active {
                background: #F3F3F3;
                border-right: none !important;
            }
        </style>
         <div class="middleCol_row header">

                <div class="column width_small <?php echo (isset($_GET['ref_no']) && $_GET['ref_no'] == 'yes') ? '' :'hide'; ?>" >
                    Ref No 
                </div>
                <div class="column width_small <?php echo (isset($_GET['next_step']) && $_GET['next_step'] == 'yes') ? '' :'hide'; ?>">
                    Next Step
                </div>
                <div class="column width_small <?php echo (isset($_GET['next_step_due']) && $_GET['next_step_due'] == 'yes') ? '' :'hide'; ?>">
                    Next Step Due
                </div>
                <?php  if (Auth::user()->hasRole("Super Admin")){ ?> 
                <div class="sorting column  data-sorting_type="desc" data-column_name="colobratorName" style="cursor: pointer">
                    Client <span class="sort-sp" id="colobratorName_icon"><i class="fa fa-sort" aria-hidden="true"></i></span>
                </div>
                <?php } ?>
                <div class="column <?php echo (isset($_GET['experience']) && $_GET['experience'] == 'yes') ? '' :'hide'; ?>">
                    Experience 

                </div>
                <div class="sorting column" data-sorting_type="desc" data-column_name="experience_name" style="cursor: pointer">
                    Name <span class="sort-sp" id="experience_name_icon"><i class="fa fa-sort" aria-hidden="true"></i></span>

                </div>

                <div class="sorting column <?php echo (isset($_GET['hotel']) && $_GET['hotel'] == 'no') ? 'hide' :''; ?>" data-sorting_type="desc" data-column_name="hotel_name" style="cursor: pointer">
                    Hotel Name <span class="sort-sp" id="hotel_name_icon"><i class="fa fa-sort" aria-hidden="true"></i></span>
                </div>

                <div class="sorting column" data-sorting_type="desc" data-column_name="date_from" style="cursor: pointer">
                    Date <span class="sort-sp" id="date_from_icon"><i class="fa fa-sort" aria-hidden="true"></i></span>
                </div>
                <div class="sorting column width_small" data-sorting_type="desc" data-column_name="nights" style="cursor: pointer">
                    On hold for <span class="sort-sp" id="nights_icon"><i class="fa fa-sort" aria-hidden="true"></i></span>
                </div>
                <div class="sorting column width_small" data-sorting_type="desc" data-column_name="nights" style="cursor: pointer">
                    On hold left <span class="sort-sp" id="nights_icon"><i class="fa fa-sort" aria-hidden="true"></i></span>
                </div>
                <div class="sorting column width_small" data-sorting_type="desc" data-column_name="on_hold_date" style="cursor: pointer">
                    Other dates on hold <span class="sort-sp" id="nights_icon"><i class="fa fa-sort" aria-hidden="true"></i></span>
                </div>
            </div>
        <div id="ctour_list">
            @include ('partials.booking.current_hold_tour_list')
          
        </div> <!-- End  ctour_list-->
        <div class="tableWrapper drag">
            
            <script>
                $(".openBookingSide").bind("click", function(){
                    var cartExperienceId = $(this).data("id");

                    $(".openBookingSide").removeClass("active");
                    $(this).addClass("active");
                    $(".bookingForm").hide();
                    //$("#rightColInfo-"+cartExperienceId).show();
                    $.ajax({
                       url:"/get_right_col_hold?id="+cartExperienceId,
                       success:function(data)
                       {
                        $('#rightCol_div').html('');
                        $('#rightCol_div').html(data);
                        $(".bookingForm").show();
                        //$('.loader').hide();
                       }
                      })
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
                    ul = document.getElementsByClassName("openBookingSide");
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

    </div>

</div>
<div class="rightCol only-desktop" id="rightCol_div">
   
</div>


<div class="modal fade bd-example-modal-lg" id="hotelDatesModal" tabindex="-1" role="dialog" aria-labelledby="addFolderModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 1000px;">
        <div class="modal-content hotelDatesModalAppendCls">

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
    <div class="modal-dialog modal-lg" role="document" style="max-width: 1130px;">
        <div class="modal-content downloadBrochureAppendCls">

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
                <select name="category" id="category" class="form-control" />
                    <option value="">Select Category</option>
                    <option value="1">General Notes</option>
                    <option value="2">Room Requests</option>
                    <option value="3">Amendements</option>
                    <option value="4">Hotels</option>
                    <option value="5">Experiences</option>
                </select>
                <p class="category_cls" style="color: red;"></p>
                <input type="hidden" name="cart_id" id="cart_id" value="">
                <input type="hidden" name="user_type" id="user_type" value="2">
                <textarea type="text" class="form-control" name="notes" id="notes" placeholder="Type here" rows="7"></textarea>
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
            $('#hotelDatesModal').modal('show');
            // alert('123');
        },
        error: function(e) {
        }
    });
}).on('click', '.sendAlert', function(e) {
    e.stopPropagation();
});
/*$(".docusignStepLinkCls").bind("click", function(){
    var cartExperienceId = $(this).data("id");

    $.fancybox.open(
        //$("#bookingFormBox-"+cartExperienceId).html() , {
        $("#tourOverviewModal-"+cartExperienceId).html() , {
            closeExisting: true,
            touch: false
        }
    );

});*/

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
        ccc.find("ul.tabs li").removeClass('active');
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
		//alert('These assets can take up to 15 minutes to download, please return shortly!');		
        $.ajax({
            url: urls,
            type: 'POST',
            success: function(data) {
                $('.loader').hide();
                if(data == 1)
                {
                    window.location.href = base_url+'/'+attrs+'.zip';
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
        });
        return false;
    });
   /* $("body").on("click", '#add_notes', function(e) {
        alert('hi');
        var initials = $(this).parent().find('#initials').val();
        var category = $(this).parent().find('#category').val();
        var note = $(this).parent().find('#notes').val();
        var cart_id = $(this).parent().find('#cart_id').val();
        var user_type = '1';
        if(initials == '' || category == '' || note == '' )
        {
            if(initials == '')
            {
                $(this).parent().find('.initials_cls').html('Please enter initials');
            }
            else
            {
                $(this).parent().find('.initials_cls').html('');
            }
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
            
            insert_tour_data(initials, note, user_type, category,cart_id);
        }
        
 
    });*/
    /*$("body").on("click", '#add_notes_colobrator', function(e) {

        var initials = $(this).parent().find('#initials').val();
        var category = $(this).parent().find('#category').val();
        var note = $(this).parent().find('#notes').val();
        var cart_id = $(this).parent().find('#cart_id').val();
        var user_type = '2';
        insert_tour_data(initials, note, user_type, category,cart_id);
 
    });*/
    /*function insert_tour_data(initials, note, user_type, category,cart_id)
    {
        if(user_type == 1)
        {
            $.ajax({
            url:"/insert-tour-notes?initials="+initials+"&user_type="+user_type+"&note="+note+"&category="+category+"&cart_id="+cart_id,

            success:function(data)
            {
            $('.fancybox-container .tab1 #tab_id_'+cart_id).html('');
            $('.fancybox-container .tab1 #tab_id_'+cart_id).html(data);
            }
            })
        }
        else
        {
            $.ajax({
            url:"/insert-tour-notes?initials="+initials+"&user_type="+user_type+"&note="+note+"&category="+category+"&cart_id="+cart_id,

            success:function(data)
            {
            $('.fancybox-container .tab2 #tab_id_'+cart_id).html('');
            $('.fancybox-container .tab2 #tab_id_'+cart_id).html(data);
            }
            })
        }
        
    }*/
    
    $("body").on("click", '.fancybox-container .tab1 #add_notes_popup', function(e) {
        var cartExperienceId = $(this).data("id");
        var user_type = $(this).data("user_type");
        var category = $(this).data("cat");

        //$(".fancybox-container .tab1 #fancybox_add_"+cartExperienceId+"_"+category).find('#user_type').val(user_type);
         $(".fancybox-container .tab1 #fancybox_add_"+cartExperienceId+"_"+category).find('#category').val(category);
        $.fancybox.open(
        //$("#bookingFormBox-"+cartExperienceId).html() , {
        $(".fancybox-container .tab1 #fancybox_add_"+cartExperienceId+"_"+category).html() , {
            closeExisting: false,
            touch: false,
            width:800,
            height:500,
            autoSize : false
        }
    );
    });  
    $("body").on("click", '.fancybox-container .tab2 #add_notes_popup', function(e) {
        var cartExperienceId = $(this).data("id");
        var user_type = $(this).data("user_type");
        var category = $(this).data("cat");
        //$(".fancybox-container .tab2 #fancybox_add_"+cartExperienceId+"_"+category).find('#user_type').val(user_type);
        $(".fancybox-container .tab2 #fancybox_add_"+cartExperienceId+"_"+category).find('#category').val(category);
        $.fancybox.open(
        //$("#bookingFormBox-"+cartExperienceId).html() , {
        $(".fancybox-container .tab2 #fancybox_add_"+cartExperienceId+"_"+category).html() , {
            closeExisting: false,
            touch: false,
            width:800,
            height:500,
            autoSize : false,

        }
    );
    });  
    //$('.fancybox-container .tab1 #ajax-file-upload').submit(function(e) {
    $("body").on("submit", '.fancybox-container #ajax-file-upload1', function(e) {        
        e.preventDefault();
        var divid = $(this).parent().parent().parent().parent('.fancybox-container').attr('id');
        var initials = $('#'+divid+' .super_add #initials').val();

        var category = $('#'+divid+' .super_add #category').val();
        
        var note = $('#'+divid+' .super_add #notes').val();
        var cart_id = $('.fancybox-container .super_add #cart_id').val();
        var user_type = $('.fancybox-container .super_add #user_type').val();
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

                    $('.fancybox-container .tab1 #tab_id_'+cart_id).html('');
                    $('.fancybox-container .tab1 #tab_id_'+cart_id).html(data);


                   /* var initials = $('.fancybox-container .tab1 #initials').val('');
                    var category = $('.fancybox-container .tab1 #category').val('');
                    var note = $('.fancybox-container .tab1 #notes').text('');
                    var cart_id = $('.fancybox-container .tab1 #cart_id').val('');*/
                }
           });
        }

        
    });
    
    $("body").on("click", '.fancybox-container .tab1 .delete-note', function(e) {     
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
    $("body").on("click", '.fancybox-container .tab1 #general_notes', function(e) {  
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
                    $('.fancybox-container .tab1 #tab_id_'+cart_id).html('');
                    $('.fancybox-container .tab1 #tab_id_'+cart_id).html(data);
                }
           });
    });    
    $("body").on("click", '.fancybox-container .tab1 #room_notes', function(e) {  
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
                    $('.fancybox-container .tab1 #tab_id_'+cart_id).html('');
                    $('.fancybox-container .tab1 #tab_id_'+cart_id).html(data);
                }
           });
    });       
    $("body").on("click", '.fancybox-container .tab1 #ame_notes', function(e) {  
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
                    $('.fancybox-container .tab1 #tab_id_'+cart_id).html('');
                    $('.fancybox-container .tab1 #tab_id_'+cart_id).html(data);
                }
           });
    });  
    $("body").on("click", '.fancybox-container .tab1 #hot_notes', function(e) {  
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
                    $('.fancybox-container .tab1 #tab_id_'+cart_id).html('');
                    $('.fancybox-container .tab1 #tab_id_'+cart_id).html(data);
                }
           });
    });
     $("body").on("click", '.fancybox-container .tab1 #exp_notes', function(e) {  
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
                    $('.fancybox-container .tab1 #tab_id_'+cart_id).html('');
                    $('.fancybox-container .tab1 #tab_id_'+cart_id).html(data);
                }
           });
    });
    $("body").on("click", '.fancybox-container .tab1 #all_notes', function(e) {  
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
                    $('.fancybox-container .tab1 #tab_id_'+cart_id).html('');
                    $('.fancybox-container .tab1 #tab_id_'+cart_id).html(data);
                }
           });
    });   

    /*colobrator*/    
    $("body").on("submit", '.fancybox-container #ajax-file-upload2', function(e) {        
        e.preventDefault();
        var divid = $(this).parent().parent().parent().parent('.fancybox-container').attr('id');
        var initials = $('#'+divid+' .colobrator_add #initials').val();

        var category = $('#'+divid+' .colobrator_add #category').val();
        
        var note = $('#'+divid+' .colobrator_add #notes').val();
        var cart_id = $('.fancybox-container .colobrator_add #cart_id').val();
        var user_type = $('.fancybox-container .colobrator_add #user_type').val();
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

                    $('.fancybox-container .tab2 #tab_id_'+cart_id).html('');
                    $('.fancybox-container .tab2 #tab_id_'+cart_id).html(data);


                   /* var initials = $('.fancybox-container .tab1 #initials').val('');
                    var category = $('.fancybox-container .tab1 #category').val('');
                    var note = $('.fancybox-container .tab1 #notes').text('');
                    var cart_id = $('.fancybox-container .tab1 #cart_id').val('');*/
                }
           });
        }

        
    });
    
    $("body").on("click", '.fancybox-container .tab2 .delete-note', function(e) {     
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
    $("body").on("click", '.fancybox-container .tab2 #general_notes', function(e) {  
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
                    $('.fancybox-container .tab2 #tab_id_'+cart_id).html('');
                    $('.fancybox-container .tab2 #tab_id_'+cart_id).html(data);
                }
           });
    });    
    $("body").on("click", '.fancybox-container .tab2 #room_notes', function(e) {  
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
                    $('.fancybox-container .tab2 #tab_id_'+cart_id).html('');
                    $('.fancybox-container .tab2 #tab_id_'+cart_id).html(data);
                }
           });
    });       
    $("body").on("click", '.fancybox-container .tab2 #ame_notes', function(e) {  
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
                    $('.fancybox-container .tab2 #tab_id_'+cart_id).html('');
                    $('.fancybox-container .tab2 #tab_id_'+cart_id).html(data);
                }
           });
    });  
    $("body").on("click", '.fancybox-container .tab2 #hot_notes', function(e) {  
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
                    $('.fancybox-container .tab2 #tab_id_'+cart_id).html('');
                    $('.fancybox-container .tab2 #tab_id_'+cart_id).html(data);
                }
           });
    });
     $("body").on("click", '.fancybox-container .tab2 #exp_notes', function(e) {  
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
                    $('.fancybox-container .tab2 #tab_id_'+cart_id).html('');
                    $('.fancybox-container .tab2 #tab_id_'+cart_id).html(data);
                }
           });
    });
     $("body").on("click", '.fancybox-container .tab2 #all_notes', function(e) {  
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
                    $('.fancybox-container .tab2 #tab_id_'+cart_id).html('');
                    $('.fancybox-container .tab2 #tab_id_'+cart_id).html(data);
                }
           });
    });  
     //add selling price
     //delete notes
    $("body").on("click", '.fancybox-container .tab1 .save_selling_price', function(e) {  
    var cart_exp_id =  $('.fancybox-container .tab1 #cart_id').val();
    var selling_price =  $('.fancybox-container .tab1 .selling_price').val();
   
     //$('.loader').show();       
     $.ajax({
                type:'POST',
                url: "/insert-selling-price",
                data: {'cart_exp_id':cart_exp_id,'selling_price':selling_price },
                
                success:function(data)
                {
                   // $('.loader').hide();
                    if(data == 1)
                    {
                        $('.fancybox-container .tab1 .success_msg').text("Add price successfully.");
                    }
                    else
                    {
                        $('.fancybox-container .tab1 .error_msg').text("Something went wrong.");
                    }
                }
           });
    });    
    $("body").on("click", '.fancybox-container .tab1 .save_map_url', function(e) {  
    var exp_id =  $(this).attr('data-exp-id');
    var map_url =  $('.fancybox-container .tab1 #map_url').val();
   
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
                        $('.fancybox-container .tab1 .map_success_msg').text("Add map successfully.");
                    }
                    else
                    {
                        $('.fancybox-container .tab1 .map_error_msg').text("Something went wrong.");
                    }
                }
           });
    });    
</script>
<script type="text/javascript">
    $("body").on("click", '#calculate_margin', function(e) {  
    var venuss_price = $('#venus_price').val();
    var venuss_srs_price = $('#venus_srs_price').val();
    var co_price = $('#fancybox-container-1 #colo_selling_price').val();
    var co_srs_price = $('#fancybox-container-1 #colo_srs').val();
    var profit_price =parseFloat(co_price)-parseFloat(venuss_price);
    var profit_srs =parseFloat(co_srs_price)-parseFloat(venuss_srs_price); 
    
    $('.selling_margin').text('£'+profit_price);
    $('.srs_margin').text('£'+profit_srs);
    $('.margin_percentage').text(((parseFloat(profit_price)/parseFloat(co_price))*100).toFixed(2)+'%');
    $('.srs_margin_percentage').text(((parseFloat(profit_srs)/parseFloat(co_srs_price))*100).toFixed(2)+'%');
    
})
//calculate per person cost
     $("body").on("change", '.calculate_cost', function(e) {  

    var transfer_cost = $('#fancybox-container-1 #transfer_cost').val();
    var per_day_price = $('#fancybox-container-1 #per_day_price').val();
    var added_margin = $('#fancybox-container-1 .added_margin').val();
    var transfer_cost = (transfer_cost != '')?transfer_cost:0;
    var per_day_price = (per_day_price != '')?per_day_price:0;
    var total_amount =parseFloat(transfer_cost)+parseFloat(per_day_price);
    if(total_amount >= '0')
    {
        $('#fancybox-container-1 .total_cal_price').text('£'+total_amount);
        total_mar_amt = (total_amount*added_margin)/100;
        total_price = total_mar_amt+total_amount;
    }
    $('#fancybox-container-1 .total_price').text('£'+total_price);
    
    
})

$(document).ready(function(){
     function fetch_data(sort_type, sort_by, stage, ref_no,next_step,next_step_due,collaborator,experience,hotel,tour_no,month,date_from,date_to)
     {
        $('.loader').show();
      $.ajax({
       url:"/fetch_hold_tour?sortby="+sort_by+"&sorttype="+sort_type+"&stage="+stage+"&ref_no="+ref_no+"&next_step="+next_step+"&next_step_due="+next_step_due+"&collaborator="+collaborator+"&experience="+experience+"&hotel="+hotel+"&tour_no="+tour_no+"&month="+month+"&date_from="+date_from+"&date_to="+date_to,
       success:function(data)
       {
        $('#ctour_list').html('');
        $('#ctour_list').html(data);
        $('.loader').hide();
       }
      })
     }

     $('body').on('click', '.sorting', function(){
        $('.bookingForm').hide();
          $('.sort-sp').html('<i class="fa fa-sort" aria-hidden="true"></i>');
          var column_name = $(this).attr('data-column_name');
          var order_type = $(this).attr('data-sorting_type');
          var reverse_order = '';
          if(order_type == 'asc')
          {
         
           reverse_order = 'desc';
            $(this).attr('data-sorting_type', 'desc');
           $('#'+column_name+'_icon').html("<i class='fas fa-sort-desc' style='color: blue'></i>");
          }
          if(order_type == 'desc')
          {
           
           reverse_order = 'asc';
           $(this).attr('data-sorting_type', 'asc');
           $('#'+column_name+'_icon').html("<i class='fas fa-sort-asc' style='color: blue'></i>");
          }
          $('#sort_column_name').val(column_name);
          $('#sort_type').val(reverse_order);
          var stage = $('#stage').val();
          var ref_no = $('#ref_no').val();
          var next_step = $('#next_step').val();
          var next_step_due = $('#next_step_due').val();
          var collaborator = $('#collaborator').val();
          var experience = $('#experience').val();
          var hotel = $('#hotel').val();
          var tour_no = $('#tour_no').val();
          var month = $('#month').val();
          var date_from = $('#date_from').val();
          var date_to = $('#date_to').val();
          
          fetch_data(reverse_order, column_name, stage, ref_no,next_step,next_step_due,collaborator,experience,hotel,tour_no,month,date_from,date_to);

         });

     });
</script>