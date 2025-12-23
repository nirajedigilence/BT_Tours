<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
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
            <div class="searchBookings" style="margin-right: 10px;">
                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">
                <i class="fas fa-search"></i>
            </div>
           <!--  <a class="orangeLink addProductBtn" href="{{ route('products-experience-create') }}" style="width: 170px;">Add Product</a> -->
            <a class="orangeLink addProductBtn" href="{{ route('database-experiences') }}/?addExperiance=yes" style="width: 170px;">Add Product</a>
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
            <?php /*foreach ($productList as $user): ?>
                    <?php echo $user->name; ?>
                    <br>
                <?php //endforeach; ?>
            </div>
            <?php echo $productList->render(); */ ?>

            <div class="tableWrapper drag">
                <table id="myTable">
                    <tr class="headerBooking">
                        <th class="col-name" width="30%">Name</th>
                        <th class="col-reason visible" width="15%">Reason considering</th>
                        <th class="col-store visible" width="35%">Story</th>
                        <th class="col-cost visible" width="10%">Cost(pp)</th>
                        <th class="col-eps visible" width="10%">EPS</th>
                    </tr>
                    @foreach($productsExperienceList as $key => $proExValue)

                        <tr data-id="{{ $proExValue->id }}" class="openBooking" id="openBooking-{{ $proExValue->id }}">
                            <td class="col-name tblTdBoldCls">{{ $proExValue->name }}</td>
                            <td class="col-reason visible">{{ $proExValue->reason_considaring }}</td>
                            <td class="col-store visible" style="white-space: inherit;">{{ readMoreHelper($proExValue->story, 150) }}</td>
                            <td class="col-cost visible">&#163;{{ !empty($proExValue->estimated_cost_pp) ? number_format($proExValue->estimated_cost_pp,2) : '' }}</td>
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
                        </tr>                   
                    @endforeach
                </table>
                <?php echo $productsExperienceList->render(); ?>
                <script>
                    $("tr.openBooking").bind("click", function(){
                        var cartExperienceId = $(this).data("id");
                        $("tr.openBooking").removeClass("active");
                        $(this).addClass("active");
                        $(".bookingForm").hide();
                        $("#rightColInfo-"+cartExperienceId).show();
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
                            a = li[i].getElementsByTagName("td")[0];
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
    @foreach($productsExperienceList as $key => $proExValue)
        <div class="bookingForm" id="rightColInfo-{{ $proExValue->id }}">
            <span class="headingS">{{ $proExValue->name }}</span>
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


            <div class="tourInfoCont">
                {{-- <div class="rightSidebarDiv"> --}}
                <div class="">
                   <?php /* <div class="sidebar_part_two">
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <div class="custom_control"> 
                                        <label class="labelCls">Brand Value (Story)</label> 
                                        <input class="form-control" name="product_scroe[brand]" type="text" value="{{$proExValue->getProductsExperienceScore->brand}}" maxlength="255"> 
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="custom_control costcontrol"> 
                                    <label>Score</label>
                                    <select class="form-control slideSelectCls" name="product_scroe[brand_value]">
                                        <option value=""></option>
                                        <option value="1" <?php echo $proExValue->getProductsExperienceScore->brand_value == '1'?'selected':''?>>1</option>
                                        <option value="2" <?php echo $proExValue->getProductsExperienceScore->brand_value == '2'?'selected':''?>>2</option>
                                        <option value="3" <?php echo $proExValue->getProductsExperienceScore->brand_value == '3'?'selected':''?>>3</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar_part_two">
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <div class="custom_control"> 
                                        <label class="labelCls">Visuals</label> 
                                        <input class="form-control" name="product_scroe[visuals]" type="text" value="{{$proExValue->getProductsExperienceScore->visuals}}" maxlength="255"> 
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="custom_control costcontrol"> 
                                    <label>&nbsp;</label>
                                    <select class="form-control slideSelectCls" name="product_scroe[visuals_value]">
                                        <option value=""></option>
                                        <option value="1" <?php echo $proExValue->getProductsExperienceScore->visuals_value == '1'?'selected':''?>>1</option>
                                        <option value="2" <?php echo $proExValue->getProductsExperienceScore->visuals_value == '2'?'selected':''?>>2</option>
                                        <option value="3" <?php echo $proExValue->getProductsExperienceScore->visuals_value == '3'?'selected':''?>>3</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar_part_two">
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <div class="custom_control"> 
                                        <label class="labelCls">Exclusive Access</label> 
                                        <input class="form-control" name="product_scroe[exclusive_access]" type="text"  value="{{$proExValue->getProductsExperienceScore->exclusive_access}}" maxlength="255"> 
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="custom_control costcontrol"> 
                                    <label>&nbsp;</label>
                                    <select class="form-control slideSelectCls" name="product_scroe[exclusive_access_value]">
                                        <option value=""></option>
                                        <option value="1" <?php echo $proExValue->getProductsExperienceScore->exclusive_access_value == '1'?'selected':''?>>1</option>
                                        <option value="2" <?php echo $proExValue->getProductsExperienceScore->exclusive_access_value == '2'?'selected':''?>>2</option>
                                        <option value="3" <?php echo $proExValue->getProductsExperienceScore->exclusive_access_value == '3'?'selected':''?>>3</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar_part_two">
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <div class="custom_control"> 
                                        <label class="labelCls">Combination</label> 
                                        <input class="form-control" name="product_scroe[combination]" type="text"  value="{{$proExValue->getProductsExperienceScore->combination}}" maxlength="255"> 
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="custom_control costcontrol"> 
                                    <label>&nbsp;</label>
                                    <select class="form-control slideSelectCls" name="product_scroe[combination_value]">
                                        <option value=""></option>
                                        <option value="1" <?php echo $proExValue->getProductsExperienceScore->combination_value == '1'?'selected':''?>>1</option>
                                        <option value="2" <?php echo $proExValue->getProductsExperienceScore->combination_value == '2'?'selected':''?>>2</option>
                                        <option value="3" <?php echo $proExValue->getProductsExperienceScore->combination_value == '3'?'selected':''?>>3</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar_part_two">
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <div class="custom_control"> 
                                        <label class="labelCls">Shelf Life</label> 
                                        <input class="form-control" name="product_scroe[shelf_life]" type="text" value="{{$proExValue->getProductsExperienceScore->shelf_life}}" maxlength="255"> 
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="custom_control costcontrol"> 
                                    <label>&nbsp;</label>
                                    <select class="form-control slideSelectCls" name="product_scroe[shelf_life_value]">
                                        <option value=""></option>
                                        <option value="1" <?php echo $proExValue->getProductsExperienceScore->shelf_life_value == '1'?'selected':''?>>1</option>
                                        <option value="2" <?php echo $proExValue->getProductsExperienceScore->shelf_life_value == '2'?'selected':''?>>2</option>
                                        <option value="3" <?php echo $proExValue->getProductsExperienceScore->shelf_life_value == '3'?'selected':''?>>3</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar_part_two">
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <div class="custom_control"> 
                                        <label class="labelCls">Location/Heatmap</label> 
                                        <input class="form-control" name="product_scroe[location]" type="text" value="{{$proExValue->getProductsExperienceScore->location}}" maxlength="255"> 
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="custom_control costcontrol"> 
                                    <label>&nbsp;</label>
                                    <select class="form-control slideSelectCls" name="product_scroe[location_value]">
                                        <option value=""></option>
                                        <option value="1" <?php echo $proExValue->getProductsExperienceScore->location_value == '1'?'selected':''?>>1</option>
                                        <option value="2" <?php echo $proExValue->getProductsExperienceScore->location_value == '2'?'selected':''?>>2</option>
                                        <option value="3" <?php echo $proExValue->getProductsExperienceScore->location_value == '3'?'selected':''?>>3</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar_part_two">
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <div class="custom_control"> 
                                        <label class="labelCls">Date limited</label> 
                                        <input class="form-control" name="product_scroe[date_limited]" type="text"  value="{{$proExValue->getProductsExperienceScore->date_limited}}" maxlength="255"> 
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="custom_control costcontrol"> 
                                    <label>&nbsp;</label>
                                    <select class="form-control slideSelectCls" name="product_scroe[date_limited_value]">
                                        <option value=""></option>
                                        <option value="1" <?php echo $proExValue->getProductsExperienceScore->date_limited_value == '1'?'selected':''?>>1</option>
                                        <option value="2" <?php echo $proExValue->getProductsExperienceScore->date_limited_value == '2'?'selected':''?>>2</option>
                                        <option value="3" <?php echo $proExValue->getProductsExperienceScore->date_limited_value == '3'?'selected':''?>>3</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
                    $cntAmt = 0;
                    $cntAmt = $proExValue->getProductsExperienceScore->brand_value+$proExValue->getProductsExperienceScore->visuals_value + $proExValue->getProductsExperienceScore->exclusive_access_value + $proExValue->getProductsExperienceScore->combination_value + $proExValue->getProductsExperienceScore->shelf_life_value + $proExValue->getProductsExperienceScore->location_value + $proExValue->getProductsExperienceScore->date_limited_value;
                        */
                    ?>
                    <div class="sidebar_part_two">
                        <div class="row">
                            <div class="col-sm-12">
                                {{-- <div class="LastTotalCls">Total:&nbsp; </div>
                                <div class="LastTotalSubCls">{{$cntAmt}}</div> --}}
                                &nbsp;&nbsp;
                                <div class="LastTotalSubEditCls">
                                    <a href="javascript:;" class="hotelNotesBtn" data-id="{{$proExValue->id}}"><i class="fas fa-sticky-note"></i></a>
                                </div>
                                &nbsp;&nbsp;
                                <div class="LastTotalSubEditCls">
                                    <a href="{{ route('products-experience-edit', $proExValue->id) }}"><i class="fas fa-edit"></i></a>
                                </div>
                                &nbsp;&nbsp;
                                <div class="LastTotalSubEditCls">
                                    <a href="javascript:;" class="removeProductCls" data-id="{{$proExValue->id}}" style="color: red !important;"><i class="fas fa-minus-circle"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <a class="orangeLink" href="{{ route('products-experience-combine') }}">Prototype</a>
        </div>
    @endforeach
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
       {!! Form::open(array('route' => 'products-experience-remove','method'=>'POST', 'enctype' => 'multipart/form-data', 'class'=>'addPrototypeNameForm', 'id'=>'addPrototypeNameForm')) !!}
            <input type="hidden" name="products_experience_id" class="products_experience_id">
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary cancel" data-dismiss="modal">Cancel</button>
                
                <input type="submit" name="submit" value="Remove" class="btn btn-primary create">
            </div>
        {!! Form::close() !!}
    </div>
  </div>
</div>
<div class="modal fade" id="productCommentModal" tabindex="-1" role="dialog" aria-labelledby="addFolderModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: calc(100% - (1.75rem * 30));">
        <div class="modal-content appendCommentModalData">
            
        </div>
    </div>
</div>
<div class="modal fade" id="removeProductNotesModal" tabindex="-1" role="dialog" aria-labelledby="addFolderModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Are you sure you want to remove this Notes?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
            <input type="hidden" name="notes_id" class="notes_id">
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary cancel" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary removeNotesBtn" href="javascript:;" data-dismiss="modal">Remove</a>
                {{-- <input type="submit" name="submit" value="Remove" class="btn btn-primary create"> --}}
            </div>
    </div>
  </div>
</div>
<script src="{{ asset('js/popper.min.js') }}"></script> 
<script src="{{ asset('js/bootstrap.min.js') }}"></script> 
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
    $(document).on('click', '.hotelNotesBtn', function() {
        var id = $(this).attr('data-id');
        $('.loader').show();    
        $.ajax({
            url: base_url+'/super-user/products-experience-notes',
            type: 'POST',
             // dataType: 'json',
            data: {'products_experience_id':id},
            success: function(data) {
                $('.appendCommentModalData').html(data.response);
                $('#productCommentModal').modal('show');
                $('.loader').hide();    
            },
            error: function(e) {
            }
        });
    });
    $(document).on('click', '.postBtnCls', function() {
        var commentBoxCls = $('.commentBoxCls').val();
        commentBoxCls = commentBoxCls.trim();
        if(commentBoxCls != ''){
            $('.loader').show();    
            var products_experience_id = $('.productHotelIdsCls').val();
            $.ajax({
                url: base_url+'/super-user/products-experience-notes-store',
                type: 'POST',
                data: {'products_experience_id':products_experience_id, 'commentBoxCls':commentBoxCls},
                success: function(data) {
                    $('#productCommentModal').modal('hide');
                    toastSuccess('Product experience Comment added successfully.');
                    $('.loader').hide();   
                },
                error: function(e) {
                }
            });
        }else{
            toastError('Please fill the Comment');
        }
    });
    $(document).on('click', '.removeNotesBtn', function() {
        var notesId = $('.notes_id').val();
        $('.loader').show();    
        $.ajax({
            url: base_url+'/super-user/products-experience-notes-remove',
            type: 'POST',
            data: {'id':notesId},
            success: function(data) {
                $('#productCommentModal').modal('hide');
                toastSuccess('Notes deleted successfully.');
                $('.loader').hide();   
            },
            error: function(e) {
            }
        });
    });
    $(document).on('click', '.nhSubCloseCls', function() {
        var proToId = $(this).attr('data-id');
        $('.notes_id').val(proToId);
        $('#productCommentModal').modal('hide');
        $('#removeProductNotesModal').modal('show');
    });
    $(document).ready(function(){
            filterNameCost();
        $(document).on('change', '.tblFilterCls', function() {
            filterNameCost();
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
                        var mainUrl = base_url+'/super-user/products'+'?score='+highestScoreIds+'&total-score='+totalScoreCls;
                    window.location = mainUrl;
                }else{
                    if (highestScoreIds.length === 0) {
                        var mainUrl = base_url+'/super-user/products';
                        window.location = mainUrl;
                    }else{
                        highestScoreIds = highestScoreIds.join(',');
                        var mainUrl = base_url+'/super-user/products'+'?score='+highestScoreIds;
                        window.location = mainUrl;
                    }
                }

            }else{
                if(totalScoreCls){
                    var mainUrl = base_url+'/super-user/products'+'?total-score='+totalScoreCls;
                    window.location = mainUrl;
                }else{
                    var mainUrl = base_url+'/super-user/products';
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
