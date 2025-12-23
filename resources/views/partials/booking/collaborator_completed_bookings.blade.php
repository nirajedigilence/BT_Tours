<style type="text/css">
    .openBooking{
        border: 1px solid #ddd;
    }
    .openBooking.active{
        border-right: none;
    }
</style>
<div class="middleCol completedBooking" id="middleCol">
    @if(Session::has('success'))
        <div class="alert alert-success">
            {!! session('success') !!}
        </div>
    @elseif(Session::has('error'))
        <div class="alert alert-error">
            {!! session('error') !!}
        </div>
    @endif
    <div class="contentBooking" style="background-color:#fff;padding: 0px;">

        <div class="headerRow">
            <div class="filterBtn">
                Filters
            </div>
            <div class="activeFiltersRow">
                <span class="heading">Active filters:</span>
                <div id="activeFiltersHolder">
                    <span id="activeFilter-1" data-filter-id="1" data-filter-class="col-nights" class="hideFilter">Nights <span>&#x2716;</span></span>
                    <span id="activeFilter-2" data-filter-id="2" data-filter-class="col-tour-numbers" class="hideFilter">Tour Numbers <span>&#x2716;</span></span>
                    <span id="activeFilter-3" data-filter-id="3" data-filter-class="col-tour-ran" class="hideFilter">Tour ran <span>&#x2716;</span></span>
                    <span id="activeFilter-4" data-filter-id="4" data-filter-class="col-date" class="hideFilter">Date <span>&#x2716;</span></span>
                    <span id="activeFilter-5" data-filter-id="5" data-filter-class="col-hotel" class="hideFilter">Hotel <span>&#x2716;</span></span>
                    <span id="activeFilter-6" data-filter-id="6" data-filter-class="col-driver-score" class="hideFilter">Driver score <span>&#x2716;</span></span>
                    <span id="activeFilter-7" data-filter-id="7" data-filter-class="col-guest-score" class="hideFilter">Guest score <span>&#x2716;</span></span>
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
                    <span id="availableFilter-2" data-filter-id="2" data-filter-class="col-tour-numbers" class="showFilter">Tour Numbers</span>
                    <span id="availableFilter-3" data-filter-id="3" data-filter-class="col-tour-ran" class="showFilter">Tour Ran</span>
                    <span id="availableFilter-4" data-filter-id="4" data-filter-class="col-date" class="showFilter">Date</span>
                    <span id="availableFilter-6" data-filter-id="6" data-filter-class="col-driver-score" class="showFilter">Driver score</span>
                    <span id="availableFilter-7" data-filter-id="7" data-filter-class="col-guest-score" class="showFilter">Guest score</span>

                </div>
            </div>
        </div>

        <div class="tableWrapper drag">
            <table id="myTable">
                <tr class="headerBooking" style="border-bottom: 1px solid #ddd;position:unset;">
                    <th class="col-name">Name</th>
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
                    <th class="col-driver-score">Driver score</th>
                    <th class="col-guest-score">Guest score</th>
                    <th class="col-rooms">Rooms</th>
                    <th class="col-tour-ran">Tour Ran</th>
                </tr>
                @foreach($items as $key => $cartItem)
                    @foreach($cartItem->cartExperiencesCompleted as $item)
                        <tr data-id="{{ $item->id }}" class="openBooking" id="openBooking-{{ $item->id }}" style="position: unset;color: #000;">
                            <td class="col-name" style="font-weight: 600;">{{ $item->experience_name }}</td>
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
                            <td class="col-driver-score">5</td>
                            <td class="col-guest-score">5</td>
                            <td class="col-rooms">3</td>
                            <td class="col-tour-ran">{{--7 Days ago--}}-</td>
                        </tr>
                    @endforeach
                @endforeach
            </table>
            <script>
                function myFunction() {
                    // Declare variables
                    var input, filter, ul, li, a, i, txtValue;
                    input = document.getElementById('myInput');
                    filter = input.value.toUpperCase();
                    ul = document.getElementById("myTable");
                    li = ul.getElementsByTagName('tr');

                    // Loop through all list items, and hide those who don't match the search query
                    for (i = 1; i < li.length; i++) {
                        a = li[i].getElementsByTagName("td")[0];
                        txtValue = a.textContent || a.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            li[i].style.display = "";
                        } else {
                            li[i].style.display = "none";
                        }
                    }
                }
                $("tr.openBooking").bind("click", function(){
                    var cartExperienceId = $(this).data("id");

                    $("tr.openBooking").removeClass("active");
                    $(this).addClass("active");
                    $(".bookingForm").hide();
                    $("#bookingForm-"+cartExperienceId).show();

                    // $.fancybox.open($("#bookingFormBox-"+cartExperienceId).html() , {
                    //     closeExisting: true,
                    //     touch: false
                    // });

                });
            </script>
        </div>

    </div>

</div>
<div class="rightCol only-desktop">
    @foreach($items as $key => $cartItem)
        @foreach($cartItem->cartExperiencesCompleted as $item)
            <div class="bookingForm" id="bookingForm-{{ $item->id }}">
                <span class="headingS">Tour Status</span>
                <span class="headingLL">Completed</span>

                <div class="starsBox">
                    <div class="titleS">Driver Score</div>
                    <div class="starsRow">
                        <i class="fas fa-star orange"></i>
                        <i class="fas fa-star orange"></i>
                        <i class="fas fa-star orange"></i>
                        <i class="fas fa-star orange"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>

                <div class="starsBox">
                    <div class="titleS">Guest Score</div>
                    <div class="starsRow">
                        <i class="fas fa-star orange"></i>
                        <i class="fas fa-star orange"></i>
                        <i class="fas fa-star orange"></i>
                        <i class="fas fa-star orange"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>

                <a class="orangeLink" href="">View Reviews</a>
                <a class="orangeLink" href="" href="">Rebook Tour</a>
                <a class="orangeLink" href="" href="">Analytics</a>
                <a class="orangeLink" href="" href="">Save Tour</a>

            </div>
        @endforeach
    @endforeach
</div>



<script>

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
