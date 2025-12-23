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

                </div>

                <ul class="active_filters">
                    <li class="label">Active filters:</li>
                    <li>Location <span>x</span></li>
                    <li>Town/City <span>x</span></li>
                </ul>

            </div>

            <div class="search">

                <div class="search__input">
                    <input type="text" placeholder="Search">
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
                Date
            </div>
            <div class="column">
                Night
            </div>
            <div class="column width_small">
                Tour Nrs
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
                            if(isset($item->tourStatuses->last()->id)){ ?>
                            <div class="middleCol_row openBooking" id="openBooking-{{ $item->id }}" data-id="{{ $item->id }}">

                                <div class="column bold">
                                    {{ $item->experience_name }}
                                </div>

                                <div class="column">
                                    {{ $hotel_data['hotel_name'] }}
                                </div>

                                <div class="column">
                                    {{ $hotel_data['date_from'] }} - {{ $hotel_data['date_to'] }}
                                </div>

                                <div class="column">
                                    {{ $hotel_data['nights'] }}
                                </div>

                                <div class="column width_small">
                                    16
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
                        <span class="right">---</span>
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
                        <span class="left">Tour numbers</span>
                        <span class="right">---</span>
                    </div>
                    
                </div>
                
            </div>
        @endforeach
    @endforeach
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

