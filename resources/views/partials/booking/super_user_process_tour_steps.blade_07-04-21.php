<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
<script src="{{ asset('js/popper.min.js') }}"></script> 
<script src="{{ asset('js/bootstrap.min.js') }}"></script>         
<div class="middleCol completedBooking" id="middleCol">


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
        <div class="alert alert-error">
            {!! session('error') !!}
        </div>
    @endif
    <div class="contentBooking">

        <div class="headerRow">
            <div class="filterBtn">
                Filters
            </div>
            <div class="activeFiltersRow">
                <span class="heading">Active filters:</span>
                <div id="activeFiltersHolder">
                    <span id="activeFilter-5" data-filter-id="5" data-filter-class="col-hotel" class="hideFilter">Hotel <span>&#x2716;</span></span>
                    <span id="activeFilter-1" data-filter-id="1" data-filter-class="col-nights" class="hideFilter">Nights <span>&#x2716;</span></span>
                    <span id="activeFilter-3" data-filter-id="3" data-filter-class="col-next-step-due" class="hideFilter">Next step due <span>&#x2716;</span></span>
                    <span id="activeFilter-4" data-filter-id="4" data-filter-class="col-date" class="hideFilter">Date <span>&#x2716;</span></span>
                    <span id="activeFilter-2" data-filter-id="2" data-filter-class="col-tour-numbers" class="hideFilter">Tour Numbers <span>&#x2716;</span></span>
                    <span id="activeFilter-6" data-filter-id="6" data-filter-class="col-next-step" class="hideFilter">Next step <span>&#x2716;</span></span>
                </div>

            </div>
            <div class="searchBookings">
                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">
                <i class="fas fa-search"></i>
            </div>
        </div>

        <div class="hiddenFilteres">
            <div class="topBox">
                <div class="heading">By booking stage</div>
                <div class="optionsRow">
                    <div data-booking-stage="10" class="col bookingStage">
                        <div class="textL">10%</div>
                        <span class="circle"></span>
                        <div class="textS">Docusign</div>
                    </div>
                    <div data-booking-stage="20" class="col bookingStage">
                        <div class="textL">20%</div>
                        <span class="circle"></span>
                        <div class="textS">URL</div>
                    </div>
                    <div data-booking-stage="30" class="col bookingStage">
                        <div class="textL">30%</div>
                        <span class="circle"></span>
                        <div class="textS">1st Tracking</div>
                    </div>
                    <div data-booking-stage="40" class="col bookingStage">
                        <div class="textL">40%</div>
                        <span class="circle"></span>
                        <div class="textS">2nd Tracking</div>
                    </div>
                    <div data-booking-stage="50" class="col bookingStage">
                        <div class="textL">50%</div>
                        <span class="circle"></span>
                        <div class="textS">1st deposit</div>
                    </div>
                    <div data-booking-stage="60" class="col bookingStage active">
                        <div class="textL">60%</div>
                        <span class="circle"></span>
                        <div class="textS">3td Tracking</div>
                    </div>
                    <div data-booking-stage="70" class="col bookingStage">
                        <div class="textL">70%</div>
                        <span class="circle"></span>
                        <div class="textS">Rooming list</div>
                    </div>
                    <div data-booking-stage="80" class="col bookingStage">
                        <div class="textL">80%</div>
                        <span class="circle"></span>
                        <div class="textS">Invoice paid</div>
                    </div>
                    <div data-booking-stage="90" class="col bookingStage">
                        <div class="textL">90%</div>
                        <span class="circle"></span>
                        <div class="textS">Tour pack</div>
                    </div>
                    <div data-booking-stage="100" class="col bookingStage">
                        <div class="textL">100%</div>
                        <span class="circle"></span>
                        <div class="textS">Tour review</div>
                    </div>
                </div>
            </div>
            <div class="bottomBox">
                <div class="heading">Other filters</div>
                <div id="allFiltersHolder">
                    <span id="availableFilter-5" data-filter-id="5" data-filter-class="col-hotel" class="showFilter">Hotel</span>
                    <span id="availableFilter-1" data-filter-id="1" data-filter-class="col-nights" class="showFilter">Nights</span>
                    <span id="availableFilter-3" data-filter-id="3" data-filter-class="col-next-step-due" class="showFilter">Next step due</span>
                    <span id="availableFilter-4" data-filter-id="4" data-filter-class="col-date" class="showFilter">Date</span>
                    <span id="availableFilter-2" data-filter-id="2" data-filter-class="col-tour-numbers" class="showFilter">Tour Numbers</span>
                    <span id="availableFilter-6" data-filter-id="6" data-filter-class="col-next-step" class="showFilter">Next step</span>

                </div>
            </div>
        </div>

        <div class="tableWrapper drag">
            <table id="myTable">
                <tr class="headerBooking">
                    <th class="col-collaborator-name">collaborator Name</th>
                    <th class="col-name visible">Name</th>
                    <th class="col-hotel">Hotel</th>
                    <th class="col-nights visible">Nights</th>
                    <th class="col-tour-numbers">Tour Numbers</th>
                    <th class="col-stage">Stage</th>
                    <th class="col-date visible">Date</th>
                    <th class="col-start-date">Start Date</th>
                    <th class="col-paid">Paid</th>
                    <th class="col-deposit-paid">Deposit Paid</th>
                    <th class="col-room-requests">Room Requests</th>
                    <th class="col-rooming-list">Rooming List</th>
                    <th class="col-rooms">Rooms</th>
                    <th class="col-next-step-due">Next step due</th>
                    <th class="col-next-step">Next step</th>
                    <th>Tour Ran</th>
                </tr>
                @foreach($items as $key => $cartItem)
                    @foreach($cartItem->cartExperiences as $item)
                            <?php 
                            if(isset($item->tourStatuses->last()->id)){ ?>
                                <tr data-id="{{ $item->id }}" class="openBooking" id="openBooking-{{ $item->id }}">
                                    <td class="col-collaborator-name">{{ getUserName($item->carts_id) }}</td>
                                    <td class="col-name visible">{{ $item->experience_name }}</td>
                                    <td class="col-hotel">{{ $item->hotel_name }}</td>
                                    <td class="col-nights visible">({{ $item->nights }} Nights)</td>
                                    <td class="col-tour-numbers">16</td>
                                    <td class="col-stage">3rd Tracking</td>
                                    <td class="col-date visible">{{ date('jS \\o\\f F', strtotime($item['date_from'])) }} to {{ date('jS \\o\\f F Y', strtotime($item['date_to'])) }}{{--3rd of May to 7th of May 2021--}}</td>
                                    <td class="col-start-date">Start Date</td>
                                    <td class="col-paid">no</td>
                                    <td class="col-deposit-paid">yes</td>
                                    <td class="col-room-requests">8</td>
                                    <td class="col-rooming-list">10</td>
                                    <td class="col-rooms">3</td>
                                        <th class="col-next-step-due">{{ $item->tourStatuses->last()->id }}</th>
                                        <th class="col-next-step">{{ $item->tourStatuses->last()->id+1 }}</th>
                                    <td>{{--7 Days ago--}}-</td>
                                </tr>   
                            <?php }else{ ?>
                            {{-- <td class="col-next-step-due"></td> --}}
                            {{-- <td class="col-next-step"></td> --}}
                            <?php } ?>
                    @endforeach
                @endforeach
            </table>
            <script>
                $("tr.openBooking").bind("click", function(){
                    var cartExperienceId = $(this).data("id");

                    $("tr.openBooking").removeClass("active");
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

    <div style="display: none;">
        @foreach($items as $key => $cartItem)
            @foreach($cartItem->cartExperiences as $item)
                <div class="tourOverviewModal" id="tourOverviewModal-{{ $item->id }}">

                    <div class="tourOverviewCont">
                        <div class="modalHeading">Tour Overview</div>

                        <div class="tourContent">
                            <h3>{{ $item->experience_name }}</h3>
                            <span class="subHeading">{{ date("D d M", strtotime($item->date_from)) }} - {{ date("D d M 'y", strtotime($item->date_to)) }} ( {{ $item->nights }} @if($item->nights > 1) nights @else night @endif )</span>
                            <div class="stepslineCont">
                                <div class="stepsline">
                                    <ol>
                                        @foreach($tourStatuses as $ts)
                                            @if($ts->id < 11)
                                                <li @if($ts->id == optional($item->tourStatuses->last())->id || optional($item->tourStatuses->last())->id == 11) class="active" @endif>
                                                    <span class="up">{{ $ts->percent }}%</span>
                                                    <span class="down">{{ $ts->name }}</span>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ol>
                                </div>
                            </div>
                            <div class="stepsCont">
                                @foreach($item->tourStatuses as $its)
                                    @if($its->id < 11)
                                    <?php if($its->id == '1'){ ?>
                                        <div class="stepItemSquare docusignStepCls  @if($item->tourStatuses->last()->id == $its->id)) stepItemSquareLast @endif" data-id="{{ $item->id }}" data-step="{{ $its->id }}" id="reloadInfo{{$item->id}}" data-urls="{{ route('change-docusign', $item->id) }}">
                                        {{-- <div class="stepItemSquare docusignStepCls  @if($item->tourStatuses->last()->id == $its->id)) stepItemSquareLast @endif" data-id="{{ $item->id }}" data-step="{{ $its->id }}" data-fancybox data-type="ajax" data-src="" href="{{ route('change-docusign', $item->id) }}" id="reloadInfo{{$item->id}}"> --}}
                                            <span class="stepName">{{ $its->name }}</span>
                                            <span class="stepDate">@if($its->pivot->completed == 1) completed at {{ date('d/m/Y', strtotime($its->pivot->completed_at)) }} @else due {{ date('d/m/Y', strtotime($its->pivot->due_date)) }} @endif</span>
                                            <span class="stepStatus @if($its->pivot->completed == 1) completed @elseif($its->pivot->due_date < Carbon\Carbon::now()) overdue @endif">
                                                @if($its->pivot->completed == 1) Completed @elseif($its->pivot->due_date < Carbon\Carbon::now()) Overdue @else Not Complete @endif
                                            </span>
                                            <span class="stepData">
                                                @if($its->id == 1)
                                                    @if($its->pivot->completed == 1){{ $its->pivot->sign_name }}@else Step info @endif
                                                @elseif($its->id == 2)
                                                    @if($its->pivot->completed == 1){{ $its->pivot->url }}@else Step info @endif
                                                @elseif($its->id == 3)
                                                    @if($its->pivot->completed == 1){{ $its->pivot->step3 }}@else Step info @endif
                                                @elseif($its->id == 4)
                                                    @if($its->pivot->completed == 1){{ $its->pivot->step4 }}@else Step info @endif
                                                @elseif($its->id == 5)
                                                    @if($its->pivot->completed == 1){{ $its->pivot->step5 }}@else Step info @endif
                                                @elseif($its->id == 6)
                                                    @if($its->pivot->completed == 1){{ $its->pivot->step6 }}@else Step info @endif
                                                @elseif($its->id == 7)
                                                    @if($its->pivot->completed == 1){{ $its->pivot->step7 }}@else Step info @endif
                                                @elseif($its->id == 8)
                                                    @if($its->pivot->completed == 1){{ $its->pivot->step8 }}@else Step info @endif
                                                @elseif($its->id == 9)
                                                    @if($its->pivot->completed == 1){{ $its->pivot->step9 }}@else Step info @endif
                                                @elseif($its->id == 10)
                                                    @if($its->pivot->completed == 1){{ $its->pivot->step10 }}@else Step info @endif
                                                @endif
                                            </span>
                                            <span class="stepFooter"></span>
                                        </div>
                                    <?php }else{ ?>
                                        <div class="stepItemSquare stepItemSquareActive @if($item->tourStatuses->last()->id == $its->id)) stepItemSquareLast @endif" data-id="{{ $item->id }}" data-step="{{ $its->id }}">
                                            <span class="stepName">{{ $its->name }}</span>
                                            <span class="stepDate">@if($its->pivot->completed == 1) completed at {{ date('d/m/Y', strtotime($its->pivot->completed_at)) }} @else due {{ date('d/m/Y', strtotime($its->pivot->due_date)) }} @endif</span>
                                            <span class="stepStatus @if($its->pivot->completed == 1) completed @elseif($its->pivot->due_date < Carbon\Carbon::now()) overdue @endif">
                                                @if($its->pivot->completed == 1) Completed @elseif($its->pivot->due_date < Carbon\Carbon::now()) Overdue @else Not Complete @endif
                                            </span>
                                            <span class="stepData">
                                                @if($its->id == 1)
                                                    @if($its->pivot->completed == 1){{ $its->pivot->sign_name }}@else Step info @endif
                                                @elseif($its->id == 2)
                                                    @if($its->pivot->completed == 1){{ $its->pivot->url }}@else Step info @endif
                                                @elseif($its->id == 3)
                                                    @if($its->pivot->completed == 1){{ $its->pivot->step3 }}@else Step info @endif
                                                @elseif($its->id == 4)
                                                    @if($its->pivot->completed == 1){{ $its->pivot->step4 }}@else Step info @endif
                                                @elseif($its->id == 5)
                                                    @if($its->pivot->completed == 1){{ $its->pivot->step5 }}@else Step info @endif
                                                @elseif($its->id == 6)
                                                    @if($its->pivot->completed == 1){{ $its->pivot->step6 }}@else Step info @endif
                                                @elseif($its->id == 7)
                                                    @if($its->pivot->completed == 1){{ $its->pivot->step7 }}@else Step info @endif
                                                @elseif($its->id == 8)
                                                    @if($its->pivot->completed == 1){{ $its->pivot->step8 }}@else Step info @endif
                                                @elseif($its->id == 9)
                                                    @if($its->pivot->completed == 1){{ $its->pivot->step9 }}@else Step info @endif
                                                @elseif($its->id == 10)
                                                    @if($its->pivot->completed == 1){{ $its->pivot->step10 }}@else Step info @endif
                                                @endif
                                            </span>
                                            <span class="stepFooter"></span>
                                        </div>

                                    <?php } ?>

                                    @endif
                                @endforeach

                                @foreach($tourStatuses as $ts)
                                    @if($ts->id < 11 && $ts->id > $item->tourStatuses->count())

                                        <div class="stepItemSquare">
                                            <span class="stepName">{{ $ts->name }}</span>
                                            <span class="stepDate"> - </span>
                                            <span class="stepStatus">Not Complete</span>
                                            <span class="stepData">
                                                @if($ts->id == 1)
                                                   Step Info
                                                @elseif($ts->id == 2)
                                                    Step Info
                                                @elseif($ts->id == 3)
                                                    Step Info
                                                @elseif($ts->id == 4)
                                                    Step Info
                                                @elseif($ts->id == 5)
                                                    Step Info
                                                @elseif($ts->id == 6)
                                                    Step Info
                                                @elseif($ts->id == 7)
                                                    Step Info
                                                @elseif($ts->id == 8)
                                                    Step Info
                                                @elseif($ts->id == 9)
                                                    Step Info
                                                @elseif($ts->id == 10)
                                                    Step Info
                                                @endif
                                            </span>
                                            <span class="stepFooter"></span>
                                        </div>

                                    @endif
                                @endforeach



                            </div>

                            <div class="expInfoPlace">
                                <div class="leftCol">
                                    <div class="infoBox">
                                        <b class="sectionHeader">Hotel</b><br />
                                        {{ $item->hotel_name }}
                                    </div>
									<div class="infoBoxTitle">
                                        <b class="sectionHeader">Experiences</b>&nbsp;&nbsp; <a href="javascript:;" class="linkCls">Change</a><br />
                                    </div>
                                    <?php
                                    $cnt = 1;
                                     foreach ($item->experiencesToExperiences as $keyEE => $valueEE) { ?>
                                        <div class="infoBox showExep{{$cnt}}">
                                            <b class="sectionHeader">Experiences {{$cnt}} {{-- <a href="javascript:;" class="yellowClr  showHideExep" data-type="hideExep{{$cnt}}" data-id="{{$cnt}}"><i class="fas fa-sort-down"></i></a> --}}</b><br />
                                            <b style="color:#14213D;">{{ $valueEE->name }}</b><br />
                                            <p>{{ $valueEE->description }}</p><br />
                                            <b>Contact:</b>
                                        </div>
                                        <div class="infoBox hideExep{{$cnt}}" style="display: none;">
                                            <b style="color:#14213D;">{{ $valueEE->name }} <a href="javascript:;" class="yellowClr  showHideExep" data-type="showExep{{$cnt}}" data-id="{{$cnt}}"><i class="fas fa-sort-up"></i></a></b><br />
                                        </div>
                                    <?php 
                                        $cnt++;
                                    } ?>
                                </div>
                                <div class="midCol">
                                	 	<div class="infoBox">
                                	 		<b class="sectionHeader">Current nos.</b><br /><br />
                                	 		{{ $item->num_rooms }}
                                	 		<br /><br />
                                	 		<a class="orangeLink tourOverviewButton" data-fancybox data-type="ajax" data-src="" href="{{ route('change-rooms', $item->id) }}" id="reloadInfo{{$item->id}}">Update numbers</a>
                                            {{-- <br />
                                            <a class="orangeLink tourOverviewButton" data-fancybox data-type="ajax" data-src="" href="{{ route('change-rooms', $item->id) }}" id="reloadInfo{{$item->id}}">Guest List</a> --}}
                                		</div>
                                		<div class="infoBox">
                                		</div>
                                </div>
                                <div class="rightCol">
                                    <div class="infoBox">
                                        <b class="sectionHeader">Costs</b><br />
                                        <b>Date:</b> {{ date('d/m/Y', strtotime($item->date_from)) }} - {{ date('d/m/Y', strtotime($item->date_to)) }} ({{ $item->nights }} nights)
                                    </div>
                                    <div class="infoBox">
                                        <b class="sectionHeader">Cost calculator per person</b><br />
                                        {{ $item->hotel_name }}
                                    </div>

                                </div>
                            </div>



                        </div>

                    </div>
                    <script>
                        $(".stepItemSquareActive").bind("click", function(){
                            var cartExperienceId = $(this).data("id");
                            var stepId = $(this).data("step");
                            console.log("here");
                            $.fancybox.open(
                                $("#bookingFormBox-"+cartExperienceId+"step-"+stepId).html() , {
                                    closeExisting: true,
                                    touch: false
                                }
                            );

                        });
                    </script>
                </div>
            @endforeach
        @endforeach
    </div>

    <div style="display: none;">
        @foreach($items as $key => $cartItem)
            @foreach($cartItem->cartExperiences as $item)

                @if($item->tourStatuses->count() > 0)
                    @foreach($item->tourStatuses as $itemStatus)
                    <div class="rightCol" id="bookingFormBox-{{ $item->id }}step-{{ $itemStatus->id }}">
                        <div class="bookingForm fancyboxTourSteps">

                            @if(optional($itemStatus)->id == 11)
                                <span class="headingS">{{ $item->experience_name }}</span>
                                <span class="headingS">{{ $item->hotel_name }}</span>
                                <span class="headingS">{{ date('d/m/Y', strtotime($item->date_from)) }} - {{ date('d/m/Y', strtotime($item->date_to)) }} ({{ $item->nights }} nights)</span>
                            @else
                                <span class="headingS"> Tour Booking Step </span>
                            @endif

                            <span class="headingLL">{{ optional($itemStatus)->name }}</span>
                            <div class="stepsline">
                                <ol>
                                    @foreach($tourStatuses as $ts)
                                        @if($ts->id < 11)
                                        <li @if($ts->id == optional($itemStatus)->id || optional($itemStatus)->id == 11) class="active" @endif>
                                            <span class="up">{{ $ts->percent }}%</span>
                                            <span class="down">{{ $ts->name }}</span>
                                        </li>
                                        @endif
                                    @endforeach
                                </ol>
                            </div>

                            <form method="POST" action="{{ route('process-tour-steps.ajax') }}" class="ajax">
                                {{ csrf_field() }}
                                <input type="hidden" name="cart_experiences_id" value="{{ $item->id }}">
                                <input type="hidden" name="tour_statuses_id" value="{{ optional($itemStatus)->id }}">
                                <input type="hidden" name="pivot_id" value="{{ optional($itemStatus)->pivot_id }}">
                                @if(optional($itemStatus)->id == 1)
                                    <label for="sign_name">Name</label>
                                    <div class="inputRow">
                                        <input type="text" name="sign_name" placeholder="Please Enter a Name">
                                        <button type="submit" data-step="{{ optional($itemStatus)->id }}" class="stepSubmitButton"><i class="fas fa-chevron-right"></i></button>
                                    </div>
                                @elseif(optional($itemStatus)->id == 2)
                                    <label for="url">URL</label>
                                    <div class="inputRow">
                                        <input type="text" name="url" placeholder="Please Enter a URL">
                                        <button type="submit" data-step="{{ optional($itemStatus)->id }}" class="stepSubmitButton"><i class="fas fa-chevron-right"></i></button>
                                    </div>
                                @elseif(optional($itemStatus)->id == 3)
                                    <label for="step3">Step 3</label>
                                    <div class="inputRow">
                                        <input type="text" name="step3" placeholder="Please Enter a Step 3">
                                        <button type="submit" data-step="{{ optional($itemStatus)->id }}" class="stepSubmitButton"><i class="fas fa-chevron-right"></i></button>
                                    </div>
                                @elseif(optional($itemStatus)->id == 4)
                                    <label for="step3">Step 4</label>
                                    <div class="inputRow">
                                        <input type="text" name="step4" placeholder="Please Enter a Step 4">
                                        <button type="submit" data-step="{{ optional($itemStatus)->id }}" class="stepSubmitButton"><i class="fas fa-chevron-right"></i></button>
                                    </div>
                                @elseif(optional($itemStatus)->id == 5)
                                    <label for="step5">Step 5</label>
                                    <div class="inputRow">
                                        <input type="hidden" name="step5" value="Test 1st Deposit" placeholder="Please Enter a Step 5">
                                        <button type="submit" data-step="{{ optional($itemStatus)->id }}" class="stepSubmitButton"><i class="fas fa-chevron-right"></i></button>
                                    </div>
                                @elseif(optional($itemStatus)->id == 6)
                                    <label for="step5">Step 6</label>
                                    <div class="inputRow">
                                        <input type="text" name="step6" placeholder="Please Enter a Step 6">
                                        <button type="submit" data-step="{{ optional($itemStatus)->id }}" class="stepSubmitButton"><i class="fas fa-chevron-right"></i></button>
                                    </div>
                                @elseif(optional($itemStatus)->id == 7)
                                    <label for="step7">Step 7</label>
                                    <div class="inputRow">
                                        <input type="text" name="step7" placeholder="Please Enter a Step 7">
                                        <button type="submit" data-step="{{ optional($itemStatus)->id }}" class="stepSubmitButton"><i class="fas fa-chevron-right"></i></button>
                                    </div>
                                @elseif(optional($itemStatus)->id == 8)
                                    <label for="step8">Step 8</label>
                                    <div class="inputRow">
                                        <input type="hidden" name="step8" value="Test Invoice paid" placeholder="Please Enter a Step 8">
                                        <button type="submit" data-step="{{ optional($itemStatus)->id }}" class="stepSubmitButton"><i class="fas fa-chevron-right"></i></button>
                                    </div>
                                @elseif(optional($itemStatus)->id == 9)
                                    <label for="step9">Step 9</label>
                                    <div class="inputRow">
                                        <input type="text" name="step9" placeholder="Please Enter a Step 9">
                                        <button type="submit" data-step="{{ optional($itemStatus)->id }}" class="stepSubmitButton"><i class="fas fa-chevron-right"></i></button>
                                    </div>
                                @elseif(optional($itemStatus)->id == 10)
                                    <label for="step10">Step 10</label>
                                    <div class="inputRow">
                                        <input type="text" name="step10" placeholder="Please Enter a Step 10">
                                        <button type="submit" data-step="{{ optional($itemStatus)->id }}" class="stepSubmitButton"><i class="fas fa-chevron-right"></i></button>
                                    </div>
                                @elseif(optional($itemStatus)->id == 11)

                                @endif

                            </form>

                        </div>
                        <script>
                            $(".stepSubmitButton").click(function(e){
                                e.preventDefault();

                                $(this).prop('disabled', true);
                                $(this).html('<i class="fas fa-spinner fa-pulse"></i>');

                                var step = $(this).data('step');
                                if( step == 5 || step == 8 ){
                                    $(this).prop('disabled', false);
                                    $(this).unbind('click').click();
                                    $(this).prop('disabled', true);
                                    return true;
                                }

                                var value = $(this).siblings('input').val();

                                if(value){
                                    $(this).prop('disabled', false);
                                    $(this).unbind('click').click();
                                    $(this).prop('disabled', true);
                                    return true;
                                }else{
                                    $(this).parent().css("border", "2px solid red");
                                    $(this).prop('disabled', false);
                                    $(this).html('<i class="fas fa-chevron-right"></i>');
                                    return false;
                                }

                            });
                        </script>
                    </div>
                    @endforeach
                @endif

            @endforeach
        @endforeach
    </div>

</div>
<div class="rightCol only-desktop">
    @foreach($items as $key => $cartItem)
        @foreach($cartItem->cartExperiences as $item)
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
                        <span class="right">---</span>
                    </div>
                    <div class="infoBox">
                        <span class="left">Tour numbers</span>
                        <span class="right">---</span>
                    </div>
                    <div class="infoBox">
                        <span class="left">Tour Url:</span>
                        <span class="right">
                            @if( optional($item->tourStatuses->last())->id > 2 )
                                {{ $item->tourStatuses[1]->pivot->url }}
                            @else
                                ---
                            @endif
                        </span>
                    </div>
                    <div class="infoBox">
                        <span class="left">Next Step</span>
                        <span class="right">{{ optional($item->tourStatuses->last())->name }}</span>
                    </div>
                    <div class="infoBox">
                        <span class="left">Next Step Due</span>
                        <span class="right">
                            @if($item->tourStatuses->count() > 0)
                                {{ $diff = Carbon\Carbon::parse(optional($item->tourStatuses->last())->pivot->due_date)->diffForHumans() }}
                            @endif
                        </span>
                    </div>
                    <div class="infoBox">
                        <span class="left">Average Score</span>
                        <span class="right">-.-</span>
                    </div>
                </div>
                {{--                {{ date_diff(new \DateTime($item->tourStatuses->last()->pivot->due_date), new \DateTime())->format("%m Months, %d days") }}--}}
                <button data-id="{{ $item->id }}" id="tourOverviewButton-{{ $item->id }}" class="orangeLink tourOverviewButton" href="">Tour Overview</button>
                <button class="orangeLink" href="">Update Tour Numbers</button>

            </div>
        @endforeach
    @endforeach
</div>


<div class="modal fade" id="hotelDatesModal" tabindex="-1" role="dialog" aria-labelledby="addFolderModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: calc(100% - (3.75rem * 20));">
        <div class="modal-content hotelDatesModalAppendCls fancybox-slide ">

        </div>
    </div>
</div>
<script>
$("body").on("click", '.docusignStepCls', function(e) {
    // $('.docusignStepLinkCls').trigger('click');
    var urls = $(this).attr('data-urls');
    parent.jQuery.fancybox.close();
    var hotelId = $(this).val();
    var dataId = $(this).attr('data-id');
    $('.loader').show();    
    $.ajax({
        url: urls,
        type: 'POST',
         // dataType: 'json',
        data: {'hotel_id':hotelId, 'dataId':dataId},
        success: function(data) {
            $('.loader').hide();    
            $('.hotelDatesModalAppendCls').html(data.response);
            $('#hotelDatesModal').modal('show');
            // alert('123');
        },
        error: function(e) {
        }
    });
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
</script>
