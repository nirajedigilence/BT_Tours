<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<div class="middleCol completedBooking" id="middleCol">
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
    </style>
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
    <div class="contentBooking">
        <div class="headerRow">
            <div class="filterBtn">
                Filters
            </div>
            <div class="activeFiltersRow">
                <span class="heading">Active filters:</span>
                <div id="activeFiltersHolder">
                    <span id="activeFilter-1" data-filter-id="1" data-filter-class="col-name" class="hideFilter">Name <span>&#x2716;</span></span>
                    <span id="activeFilter-2" data-filter-id="2" data-filter-class="col-cost" class="hideFilter">Cost <span>&#x2716;</span></span>
                    <span id="activeFilter-3" data-filter-id="3" data-filter-class="col-eps" class="hideFilter">EPS <span>&#x2716;</span></span>

                    <span id="activeScoreFilter-1" data-score-id="1" class="hideFilter scoreFilter">Brand Value <span>&#x2716;</span></span>
                    <span id="activeScoreFilter-2" data-score-id="2" class="hideFilter scoreFilter">Visuals <span>&#x2716;</span></span>
                    <span id="activeScoreFilter-3" data-score-id="3" class="hideFilter scoreFilter">Location/Heatmap <span>&#x2716;</span></span>
                    <span id="activeScoreFilter-4" data-score-id="4" class="hideFilter scoreFilter">Exclusive Access <span>&#x2716;</span></span>
                    <span id="activeScoreFilter-5" data-score-id="5" class="hideFilter scoreFilter">Combination <span>&#x2716;</span></span>
                    <span id="activeScoreFilter-6" data-score-id="6" class="hideFilter scoreFilter">Shelf Life <span>&#x2716;</span></span>
                    <span id="activeScoreFilter-7" data-score-id="7" class="hideFilter scoreFilter">Date Limited <span>&#x2716;</span></span>

                    <span id="activeTotalScoreFilter-60" data-score-id="60" class="hideFilter totalScoreFilter">60% and above <span>&#x2716;</span></span>
                    <span id="activeTotalScoreFilter-70" data-score-id="70" class="hideFilter totalScoreFilter">70% and above <span>&#x2716;</span></span>
                    <span id="activeTotalScoreFilter-80" data-score-id="80" class="hideFilter totalScoreFilter">80% and above <span>&#x2716;</span></span>
                    <span id="activeTotalScoreFilter-90" data-score-id="90" class="hideFilter totalScoreFilter">90% and above <span>&#x2716;</span></span>
                </div>
            </div>
            <div class="searchBookings">
                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">
                <i class="fas fa-search"></i>
            </div>
        </div>

        <div class="hiddenFilteres">
            <div class="topBox customchkmain">
                <div class="check_row">
                    <div class="heading">Total score</div>
                    <div class="fl_w">
                        <div class="checkarea_part">
                            <label class="checkbox_div">
                              <input type="radio" class="custom_chkbox tblPerFilterCls totalScoreCls tsc60" name="totalScore" data-per="60" value="60"> 60% and above
                              <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="checkarea_part">
                            <label class="checkbox_div">
                              <input type="radio" class="custom_chkbox tblPerFilterCls totalScoreCls tsc70" name="totalScore" data-per="70" value="70"> 70% and above
                              <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="checkarea_part">
                            <label class="checkbox_div">
                              <input type="radio" class="custom_chkbox tblPerFilterCls totalScoreCls tsc80" name="totalScore" data-per="80" value="80"> 80% and above
                              <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="checkarea_part">
                            <label class="checkbox_div">
                              <input type="radio" class="custom_chkbox tblPerFilterCls totalScoreCls tsc90" name="totalScore" data-per="90" value="90"> 90% and above
                              <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="checkarea_part">
                            <label class="checkbox_div">
                              <input type="radio" class="custom_chkbox tblPerFilterCls totalScoreCls tsc0" name="totalScore" data-per="0" value="0"> All
                              <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="check_row">
                    <div class="heading">Other</div>
                    <div class="fl_w">
                        <div class="checkarea_part">
                            <label class="checkbox_div">
                              <input type="checkbox" class="custom_chkbox tblFilterCls tFC1" checked="" data-filter-id="1" data-filter-class="col-name"> Name
                              <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="checkarea_part">
                            <label class="checkbox_div">
                              <input type="checkbox" class="custom_chkbox tblFilterCls tFC2" checked="" data-filter-id="2" data-filter-class="col-cost"> Cost
                              <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="checkarea_part">
                            <label class="checkbox_div">
                              <input type="checkbox" class="custom_chkbox tblFilterCls tFC3" checked="" data-filter-id="3" data-filter-class="col-eps"> EPS
                              <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="check_row">
                    <div class="heading">Highest scoring category</div>
                    <div class="fl_w">
                        <div class="checkarea_part">
                            <label class="checkbox_div">
                              <input type="checkbox" class="custom_chkbox hscCheckCls hsc1" data-id="1"> Brand Value (Story)
                              <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="checkarea_part">
                            <label class="checkbox_div">
                              <input type="checkbox" class="custom_chkbox hscCheckCls hsc2" data-id="2" > Visuals
                              <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="checkarea_part">
                            <label class="checkbox_div">
                              <input type="checkbox" class="custom_chkbox hscCheckCls hsc3" data-id="3" > Location/Heatmap
                              <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="checkarea_part">
                            <label class="checkbox_div">
                              <input type="checkbox" class="custom_chkbox hscCheckCls hsc4" data-id="4"> Exclusive Access
                              <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="checkarea_part">
                            <label class="checkbox_div">
                              <input type="checkbox" class="custom_chkbox hscCheckCls hsc5" data-id="5" > Combination
                              <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="checkarea_part">
                            <label class="checkbox_div">
                              <input type="checkbox" class="custom_chkbox hscCheckCls hsc6" data-id="6" > Shelf Life
                              <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="checkarea_part">
                            <label class="checkbox_div">
                              <input type="checkbox" class="custom_chkbox hscCheckCls hsc7" data-id="7"> Date Limited
                              <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="check_row">
                    <a class="orangeLink filterApplyBtn addProductBtn" href="javascript:;"  style="float: right">Filter Apply</a>
                </div>
            </div>
        </div>
        <div class="">

            <div class="tableWrapper drag">
                <table id="myTable">
                    <tr class="headerBooking">
                        <th class="col-name" width="25%">Name</th>
                        <th class="col-reason visible" width="15%">Reason considering</th>
                        <th class="col-store visible" width="30%">Story</th>
                        <th class="col-cost visible" width="10%">Cost(pp)</th>
                        <th class="col-eps visible" width="10%">EPS</th>
                        <th class="visible" width="10%">Add</th>
                    </tr>
                    @foreach($productsExperienceList as $key => $proExValue)
                        <tr data-id="{{ $proExValue->id }}" class="openBooking" id="openBooking_{{ $proExValue->id }}">
                            <td class="col-name tblTdBoldCls">{{ $proExValue->name }}</td>
                            <td class="col-reason visible">{{ $proExValue->reason_considaring }}</td>
                            <td class="col-store visible" style="white-space: inherit;">{{ readMoreHelper($proExValue->story, 150) }}</td>
                            <td class="col-cost visible">&#163;{{ number_format($proExValue->estimated_cost_pp,2) }}</td>
                            <?php 
                            $product_score = '';
                                if(isset($proExValue->getProductsExperienceScore->product_score)){

                                    $product_score = $proExValue->getProductsExperienceScore->product_score;
                                }
                                if($product_score > '74'){
                                    $color = 'green';
                                }else if($product_score > '49'){
                                    $color = '#FCA311';            
                                }else if($product_score > '24'){
                                    $color = 'black';
                                }else{
                                    $color = 'red';
                                }
                            ?>
                            <td class="col-eps visible" style="color:{{$color}}">{{ $product_score }}%</td>
                            <td class="visible" >
                                <a href="javascript:;" class="fontImgOrangeColorCls selectImgProCls" id="trTdActionId_{{ $proExValue->id }}" data-proId="{{ $proExValue->id }}" data-proName="{{ $proExValue->name }}" data-proCost="{{ number_format($proExValue->cost, 2) }}" data-proScore="{{ $product_score }}"  data-proScoreColor="{{ $color }}">
                                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>                   
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
</div>
<div class="rightCol only-desktop">
        <div class="bookingForm lft" id="rightColInfo-01" style="display: block;">
            {!! Form::open(array('route' => 'products-experience-combine-store','method'=>'POST', 'enctype' => 'multipart/form-data', 'class'=>'addProductForm', 'id'=>'addProductForm')) !!}
                <span class="headingLLL scorePerCls" style="color: green">0%</span>
                <span class="headingS3 mb20">Average Score</span>
                <div class="ticketPartMainCls">
                    <div class="ticketPartSubCls">
                        {{-- <div class="ticket_part">
                            <div class="ticket_detail">
                                <div class="fl_w">
                                    <span class="ticket_title">Jaguar Land Rover Experince</span>
                                    <span class="ticket_percentage">98%</span>
                                </div>
                                <div class="fl_w">
                                    <span class="ticket_price">&#163;25.00 pp</span>
                                    <span class="ticket_type">type: 
                                        <input type="radio" id="radioApple" name="radioFruit" value="apple" checked>
                                        <label for="radioApple">VIP</label>

                                        <input type="radio" id="radioBanana" name="radioFruit" value="banana">
                                        <label for="radioBanana">BIG</label>

                                        <input type="radio" id="radioOrange" name="radioFruit" value="orange">
                                        <label for="radioOrange">FILL</label> 
                                    </span>
                                </div>
                            </div>
                            <div class="ticket_remove">
                                <i class="fas fa-times"></i>
                            </div>
                        </div>
                        <div class="ticket_part">
                            <div class="ticket_detail">
                                <div class="fl_w">
                                    <span class="ticket_title">The Silverstone Experince</span>
                                    <span class="ticket_percentage">96%</span>
                                </div>
                                <div class="fl_w">
                                    <span class="ticket_price">&#163;25.00 pp</span>
                                    <span class="ticket_type">type: 
                                        <input type="radio" id="radioApple2" name="radioFruit2" value="apple">
                                        <label for="radioApple2">VIP</label>

                                        <input type="radio" id="radioBanana2" name="radioFruit2" value="banana" checked>
                                        <label for="radioBanana2">BIG</label>

                                        <input type="radio" id="radioOrange2" name="radioFruit2" value="orange">
                                        <label for="radioOrange2">FILL</label> 
                                    </span>
                                </div>
                            </div>
                            <div class="ticket_remove">
                                <i class="fas fa-times"></i>
                            </div>
                        </div> --}}
                    </div>
                        <span class="fix_label">Attractions total: &#163;<span class="costAmtCls">0.00</span> pp</span>
                </div>
                <input type="submit" name="submit" value="Combine" class="CombineBtnCls orangeLink btn pullright" style="display: none;">
                <a class="orangeLink combineMainBtnCls" href="javascript:;">Combine</a>
            {!! Form::close() !!}
        </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>
<script>

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
    function filterNameCost(){
        $(".tblFilterCls").each(function() {
            if($(this).is(':checked')) {
                var filterId = $(this).attr('data-filter-id');
                var filterCls = $(this).attr('data-filter-class');
                $('#activeFilter-'+filterId).show();
                $('.'+filterCls).show();
                // console.log('.'+filterCls);
            }
        });
    }
    $(document).ready(function(){
         filterNameCost();
        $(document).on('change', '.tblFilterCls', function() {
            filterNameCost();
        });
        $(document).on('click', '.combineMainBtnCls', function() {
            var cnt = 0;
            $(".ticketPerCls").each(function() {
                cnt = cnt+1;
            });
            if(cnt < 1){
                toastError('Please select atleat one Product pipeline.');
                return false;
            }else{
                $('.CombineBtnCls').trigger('click');
            }
        });

        $(document).on('click', 'td a.selectImgProCls', function() {
            if($(this).hasClass('fontImgGrayColorCls')){
                return false;
            }
            $(this).toggleClass('fontImgGrayColorCls');
            $(this).closest('tr').toggleClass('active');
            var cartExperienceId = $(this).attr('data-proId');
            var proName = $(this).attr('data-proName');
            var proCost = $(this).attr('data-proCost');
            var proScore = $(this).attr('data-proScore');
            var proScoreColor = $(this).attr('data-proScoreColor');
            var htmls = '';
            htmls += '<div class="ticket_part" id="tpIds-'+cartExperienceId+'">\
                        <input type="hidden" class="ticketPerCls" name="combinePer[]" value="'+proScore+'">\
                        <input type="hidden" class="ticketCostCls" name="combinePer[]" value="'+proCost+'">\
                        <input type="hidden" class="ticketIdCls" name="combine['+cartExperienceId+'][id]" value="'+cartExperienceId+'">\
                        <div class="ticket_detail">\
                            <div class="fl_w">\
                                <span class="ticket_title">'+proName+'</span>\
                                <span class="ticket_percentage" style="color:'+proScoreColor+'">'+proScore+'%</span>\
                            </div>\
                            <div class="fl_w">\
                                <span class="ticket_price">&#163;'+proCost+'</span>\
                                <span class="ticket_type">type: \
                                    <input type="radio" name="combine['+cartExperienceId+'][type]" id="combine-'+cartExperienceId+'-VIP" value="1" checked>\
                                    <label for="combine-'+cartExperienceId+'-VIP">VIP</label>\
                                    <input type="radio" name="combine['+cartExperienceId+'][type]" id="combine-'+cartExperienceId+'-BIG" value="2">\
                                    <label for="combine-'+cartExperienceId+'-BIG">BIG</label>\
                                    <input type="radio" name="combine['+cartExperienceId+'][type]" id="combine-'+cartExperienceId+'-FILL" value="3">\
                                    <label for="combine-'+cartExperienceId+'-FILL">FILL</label> \
                                </span>\
                            </div>\
                        </div>\
                        <div class="ticket_remove">\
                            <a href="javascript:;" class="ticketRemoveCls" data-id="'+cartExperienceId+'"><i class="fas fa-times"></i></a>\
                        </div>\
                    </div>';
                $('.ticketPartSubCls').append(htmls);
                countAverageScore();
        });
        $(document).on('click', '.ticketRemoveCls', function() {
            var cartExperienceId = $(this).attr("data-id");
            $('#tpIds-'+cartExperienceId).remove();
            // $('#trTdActionId_1').removeClass('fontImgGrayColorCls');
            $('#trTdActionId_'+cartExperienceId).removeClass('fontImgGrayColorCls');
            $('#openBooking_'+cartExperienceId).removeClass('active');
            countAverageScore();
        });

        $(document).on('click', '.removeProductCls', function() {
            var proToId = $(this).attr('data-id');
            $('.products_experience_id').val(proToId);
            $('#removePrototypeModal').modal('show');
        });

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
        $(document).on('click', '.hideFilter', function() {
            var filterId = $(this).attr('data-filter-id');
            var scoreId = $(this).attr('data-score-id');
            if($(this).hasClass('totalScoreFilter')){
                $('.tsc'+scoreId).prop('checked', false); 
            }else if($(this).hasClass('scoreFilter')){
                $('.hsc'+scoreId).prop('checked', false); 
            }else{
                // $('.tFC'+filterId).trigger('change');
                $('.tFC'+filterId).prop('checked', false); 
            }
        });
        const params = new URLSearchParams(window.location.search);

        const scoreName = params.get("score");

        const totalTcoreName = params.get("total-score");
            
        if(totalTcoreName != null){
            $('#activeTotalScoreFilter-'+totalTcoreName).show();
            $('.tsc'+totalTcoreName).prop('checked', true);
        }
        if(scoreName != null){
            var scoreNameArray = scoreName.split(',');
            for (i = 0; i < scoreNameArray.length; ++i) {
                $('#activeScoreFilter-'+scoreNameArray[i]).show();
                $('.hsc'+scoreNameArray[i]).prop('checked', true);
            }
        }
        $(".filterBtn").bind("click", function(){
            $(".hiddenFilteres").toggleClass('showOpacity hide');
        });

        $(document).on('click', '.filterApplyBtn', function() {
            var totalScoreCls = $('.totalScoreCls:checked').val();

            var highestScoreIds = [];
            $(".hscCheckCls").each(function() {
                if($(this).is(':checked')) {
                    var filterId = $(this).attr('data-id');
                    highestScoreIds.push(filterId);
                }
            });

            if(highestScoreIds.length > 0){
            
                if(totalScoreCls){
                    highestScoreIds = highestScoreIds.join(',');
                        var mainUrl = base_url+'/super-user/products-experience-combine'+'?score='+highestScoreIds+'&total-score='+totalScoreCls;
                    window.location = mainUrl;
                }else{
                    if (highestScoreIds.length === 0) {
                        var mainUrl = base_url+'/super-user/products';
                        window.location = mainUrl;
                    }else{
                        highestScoreIds = highestScoreIds.join(',');
                        var mainUrl = base_url+'/super-user/products-experience-combine'+'?score='+highestScoreIds;
                        window.location = mainUrl;
                    }
                }

            }else{
                if(totalScoreCls){
                    var mainUrl = base_url+'/super-user/products-experience-combine'+'?total-score='+totalScoreCls;
                    window.location = mainUrl;
                }else{
                    var mainUrl = base_url+'/super-user/products-experience-combine';
                    window.location = mainUrl;
                }
            }
            return false;
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
    function countAverageScore() {
        var scoreAmt = 0;
        var cnt = 0;
        $(".ticketPerCls").each(function() {
            var thisVal = $(this).val();
            if(thisVal){
                scoreAmt = scoreAmt + parseFloat(thisVal);
            }
            cnt = cnt+1;
        });
        countScore = scoreAmt/cnt;
        countScore = countScore.toFixed(0);
        if(countScore > 74){
            $('.scorePerCls').css({
                'color': 'green'
            });        
        }else if(countScore > 49){
            $('.scorePerCls').css({
                'color': '#FCA311'
            });  
        }else if(countScore > 24){
            $('.scorePerCls').css({
                'color': 'black'
            });  
        }else{
            $('.scorePerCls').css({
                'color': 'red'
            });  
        }
        $('.scorePerCls').html(countScore+'%');

        var costAmt = 0;
        $(".ticketCostCls").each(function() {
            var thisVal = $(this).val();
            if(thisVal){
                costAmt = costAmt + parseFloat(thisVal);
            }
        });
        $('.costAmtCls').html(costAmt);
    }
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
