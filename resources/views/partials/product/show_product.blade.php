<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">  
<link href="{{ asset('css/style-products.css') }}" rel="stylesheet">
<link href="{{ asset('css/bars-square.css') }}" rel="stylesheet">
<script>
    var base_url = "{{URL::to('/')}}";
</script>
<div class="middleCol completedBooking productsection" id="middleCol">
    <div class="row">
        <div class="header_part">
            <div class="head_part_one" style="width: 50%;">
                <span class="proMainTitleCls">{{$productDetail->name}}</span>
            </div>
            <input type="hidden" name="productId" class="productId" value="{{$productDetail->id}}">
            <div class="head_part_two" style="width: 50%;">
                {{-- <a class="orangeLink btn pullright" href="{{ route('products-tour', $productDetail->id) }}">Complete</a> --}}
                <a class="orangeLink btn pullright" href="{{ route('products-tour', $productDetail->id) }}">Complete</a>
            </div>
        </div>
        <div class="rightContentDiv">
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
                <div class="contentDiv" style="max-height: 930px; overflow: auto;">
                    <?php foreach ($productDetail->getProductsSection as $key => $value) { ?>
                        <?php if($value->sections_type == '1') { ?>
                            <div class="repetedContentDiv rCD1" data-id="1">
                                <div class="fl_w main_title">
                                    <h2>VIP Experience</a></h2>
                                </div>
                            </div>
                            <div class="white_part">
                                <div class="" >
                                    <div class="cIDCls">
                                        {{$value->title}}
                                    </div>
                                    <div class="fl_w comman part_three">
                                        <div class="form-group">
                                            <div class="custom_control">
                                                <select id="example-square-1" name="section_edit[1][score]" autocomplete="off">
                                                  <option value=""></option>
                                                  <option value="1" <?php echo $value->score == '1'?'selected':''?>>1</option>
                                                  <option value="2" <?php echo $value->score == '2'?'selected':''?>>2</option>
                                                  <option value="3" <?php echo $value->score == '3'?'selected':''?>>3</option>
                                                  <option value="4" <?php echo $value->score == '4'?'selected':''?>>4</option>
                                                  <option value="5" <?php echo $value->score == '5'?'selected':''?>>5</option>
                                                </select>
                                            </div>
                                            <div class="brCurrentRatingCls">Activity Level <?php echo $value->score;?>: Gentle with no step</div>
                                        </div>
                                    </div>
                                    <div class="fl_w comman part_four">
                                        <div class="form-group">
                                            <div class="custom_full_control">
                                                <label class="subTitleCls">Story</label>
                                                <div class="subTxtCls">{{$value->story}}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="fl_w comman part_four">
                                        <div class="form-group">
                                            <div class="custom_full_control">
                                                <label class="subTitleCls">Experience</label>
                                                <div class="subTxtCls">{{$value->experience}}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="fl_w comman part_four">
                                        <div class="">
                                            <div class="custom_full_control">
                                                <label class="subTitleCls">Inclusions</label>
                                                <div class="row">
                                                    <?php foreach ($value->getProductsInclusion as $keyInc => $valueInc) { ?>
                                                        <div class="col-sm-6">
                                                            <div class="subTxtCls"><span class="circuleCls"><img src="{{ asset('images/rightArrow.png') }}" alt="{{ asset('images/rightArrow.png') }}"></span> {{$valueInc->title}} </div>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="fl_w comman part_four">
                                        <div class="form-group">
                                            <div class="custom_full_control">
                                                <label class="subTitleCls">Gallery</label>
                                                <?php foreach ($value->getProductsImages as $keyImg => $valueImg) { ?>
                                                    <div class="image_galllerCls">
                                                        <img src="{{ url("storage")}}/product_image/{{$valueImg->name}}">
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script>
                                $(document).ready(function(){
                                    $('#example-square-1').barrating('show', {
                                        theme: 'bars-square',
                                        showValues: false,
                                        showSelectedRating: false
                                    });
                                });
                            </script>
                        <?php } ?>
                        <?php if($value->sections_type == '2') { ?>
                            <div class="repetedContentDiv rCD1" data-id="1">
                                <div class="fl_w main_title">
                                    <h2>Big Banner</a></h2>
                                </div>
                            </div>
                            <div class="white_part">
                                <div class="" >
                                    <div class="cIDCls">
                                        {{$value->title}}
                                    </div>
                                    <div class="fl_w comman part_three">
                                        <div class="form-group">
                                            <div class="custom_control">
                                                <select id="example-square-2" name="section_edit[1][score]" autocomplete="off">
                                                  <option value=""></option>
                                                  <option value="1" <?php echo $value->score == '1'?'selected':''?>>1</option>
                                                  <option value="2" <?php echo $value->score == '2'?'selected':''?>>2</option>
                                                  <option value="3" <?php echo $value->score == '3'?'selected':''?>>3</option>
                                                  <option value="4" <?php echo $value->score == '4'?'selected':''?>>4</option>
                                                  <option value="5" <?php echo $value->score == '5'?'selected':''?>>5</option>
                                                </select>
                                            </div>
                                            <div class="brCurrentRatingCls">Activity Level <?php echo $value->score;?>: Gentle with no step</div>
                                        </div>
                                    </div>
                                    <div class="fl_w comman part_four">
                                        <div class="form-group">
                                            <div class="custom_full_control">
                                                <label class="subTitleCls">Story</label>
                                                <div class="subTxtCls">{{$value->story}}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="fl_w comman part_four">
                                        <div class="form-group">
                                            <div class="custom_full_control">
                                                <label class="subTitleCls">Experience</label>
                                                <div class="subTxtCls">{{$value->experience}}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="fl_w comman part_four">
                                        <div class="">
                                            <div class="custom_full_control">
                                                <label class="subTitleCls">Inclusions</label>
                                                <div class="row">
                                                    <?php foreach ($value->getProductsInclusion as $keyInc => $valueInc) { ?>
                                                        <div class="col-sm-6">
                                                            <div class="subTxtCls"><span class="circuleCls"><img src="{{ asset('images/rightArrow.png') }}" alt="{{ asset('images/rightArrow.png') }}"></span> {{$valueInc->title}} </div>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="fl_w comman part_four">
                                        <div class="form-group">
                                            <div class="custom_full_control">
                                                <label class="subTitleCls">Gallery</label>
                                                <?php foreach ($value->getProductsImages as $keyImg => $valueImg) { ?>
                                                    <div class="image_galllerCls">
                                                        <img src="{{ url("storage")}}/product_image/{{$valueImg->name}}">
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script>
                                $(document).ready(function(){
                                    $('#example-square-2').barrating('show', {
                                        theme: 'bars-square',
                                        showValues: false,
                                        showSelectedRating: false
                                    });
                                });
                            </script>
                        <?php } ?>
                        <?php if($value->sections_type == '3') { ?>
                            <div class="repetedContentDiv rCD1" data-id="1">
                                <div class="fl_w main_title">
                                    <h2>Local Experience</a></h2>
                                </div>
                            </div>
                            <div class="white_part">
                                <div class="" >
                                    <div class="cIDCls">
                                        {{$value->title}}
                                    </div>
                                    <div class="fl_w comman part_three">
                                        <div class="form-group">
                                            <div class="custom_control">
                                                <select id="example-square-3" name="section_edit[1][score]" autocomplete="off">
                                                  <option value=""></option>
                                                  <option value="1" <?php echo $value->score == '1'?'selected':''?>>1</option>
                                                  <option value="2" <?php echo $value->score == '2'?'selected':''?>>2</option>
                                                  <option value="3" <?php echo $value->score == '3'?'selected':''?>>3</option>
                                                  <option value="4" <?php echo $value->score == '4'?'selected':''?>>4</option>
                                                  <option value="5" <?php echo $value->score == '5'?'selected':''?>>5</option>
                                                </select>
                                            </div>
                                            <div class="brCurrentRatingCls">Activity Level <?php echo $value->score;?>: Gentle with no step</div>
                                        </div>
                                    </div>
                                    <div class="fl_w comman part_four">
                                        <div class="form-group">
                                            <div class="custom_full_control">
                                                <label class="subTitleCls">Story</label>
                                                <div class="subTxtCls">{{$value->story}}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="fl_w comman part_four">
                                        <div class="form-group">
                                            <div class="custom_full_control">
                                                <label class="subTitleCls">Experience</label>
                                                <div class="subTxtCls">{{$value->experience}}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="fl_w comman part_four">
                                        <div class="">
                                            <div class="custom_full_control">
                                                <label class="subTitleCls">Inclusions</label>
                                                <div class="row">
                                                    <?php foreach ($value->getProductsInclusion as $keyInc => $valueInc) { ?>
                                                        <div class="col-sm-6">
                                                            <div class="subTxtCls"><span class="circuleCls"><img src="{{ asset('images/rightArrow.png') }}" alt="{{ asset('images/rightArrow.png') }}"></span> {{$valueInc->title}} </div>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="fl_w comman part_four">
                                        <div class="form-group">
                                            <div class="custom_full_control">
                                                <label class="subTitleCls">Gallery</label>
                                                <?php foreach ($value->getProductsImages as $keyImg => $valueImg) { ?>
                                                    <div class="image_galllerCls">
                                                        <img src="{{ url("storage")}}/product_image/{{$valueImg->name}}">
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script>
                                $(document).ready(function(){
                                    $('#example-square-3').barrating('show', {
                                        theme: 'bars-square',
                                        showValues: false,
                                        showSelectedRating: false
                                    });
                                });
                            </script>
                        <?php } ?>
                        <?php if($value->sections_type == '4') { ?>
                            <div class="repetedContentDiv rCD1" data-id="1">
                                <div class="fl_w main_title">
                                    <h2>Map Visualisation</a></h2>
                                </div>
                            </div>
                            <div class="white_part">
                                <div class="" >
                                    <div class="fl_w comman part_four">
                                        <div class="form-group">
                                            <div class="custom_full_control">
                                                <label class="subTitleCls">Story</label>
                                                <div style="width: 810px;">
                                                   <iframe src="{{$value->title}}" width="100%" height="350" frameborder="0" style="border:0"></iframe>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                    
                                </div>
                            </div>
                        <?php } ?>
                        <?php if($value->sections_type == '5') { ?>
                            <div class="repetedContentDiv rCD1" data-id="1">
                                <div class="fl_w main_title">
                                    <h2>Hotel</a></h2>
                                </div>
                            </div>
                            <div class="white_part">
                                <div class="" >
                                    <div class="cIDCls">
                                        {{$value->title}}
                                    </div>
                                    <div class="fl_w comman part_three">
                                        <div class="form-group">
                                            <div class="custom_control">
                                                <select id="example-square-5" name="section_edit[1][score]" autocomplete="off">
                                                  <option value=""></option>
                                                  <option value="1" <?php echo $value->score == '1'?'selected':''?>>1</option>
                                                  <option value="2" <?php echo $value->score == '2'?'selected':''?>>2</option>
                                                  <option value="3" <?php echo $value->score == '3'?'selected':''?>>3</option>
                                                  <option value="4" <?php echo $value->score == '4'?'selected':''?>>4</option>
                                                  <option value="5" <?php echo $value->score == '5'?'selected':''?>>5</option>
                                                </select>
                                            </div>
                                            <div class="brCurrentRatingCls">Activity Level <?php echo $value->score;?>: Gentle with no step</div>
                                        </div>
                                    </div>
                                    <div class="fl_w comman part_four">
                                        <div class="form-group">
                                            <div class="custom_full_control">
                                                <label class="subTitleCls">Story</label>
                                                <div class="subTxtCls">{{$value->story}}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="fl_w comman part_four">
                                        <div class="form-group">
                                            <div class="custom_full_control">
                                                <label class="subTitleCls">Experience</label>
                                                <div class="subTxtCls">{{$value->experience}}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="fl_w comman part_four">
                                        <div class="">
                                            <div class="custom_full_control">
                                                <label class="subTitleCls">Inclusions</label>
                                                <div class="row">
                                                    <?php foreach ($value->getProductsInclusion as $keyInc => $valueInc) { ?>
                                                        <div class="col-sm-6">
                                                            <div class="subTxtCls"><span class="circuleCls"><img src="{{ asset('images/rightArrow.png') }}" alt="{{ asset('images/rightArrow.png') }}"></span> {{$valueInc->title}} </div>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="fl_w comman part_four">
                                        <div class="form-group">
                                            <div class="custom_full_control">
                                                <label class="subTitleCls">Gallery</label>
                                                <?php foreach ($value->getProductsImages as $keyImg => $valueImg) { ?>
                                                    <div class="image_galllerCls">
                                                        <img src="{{ url("storage")}}/product_image/{{$valueImg->name}}">
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script>
                                $(document).ready(function(){
                                    $('#example-square-5').barrating('show', {
                                        theme: 'bars-square',
                                        showValues: false,
                                        showSelectedRating: false
                                    });
                                });
                            </script>
                        <?php } ?>
                    <?php } ?>
                </div>
                <div class="rightSidebarDiv">
                    <div class="sidebar_part_one">
                        <span class="scorelabel" style="font-weight: 600; font-size: 22px;">{{$productDetail->name}}</span>
                    </div>
                    <div class="sidebar_part_two">
                        <ul class="sidebarUlCls">
                            <li class="sidebarPartTwoCls_1">VIP Experience</li>
                            <li class="sidebarPartTwoCls_2">Big Banner</li>
                            <li class="sidebarPartTwoCls_3 active" >Local Experience</li>
                            <li class="sidebarPartTwoCls_4">Map</li>
                            <li class="sidebarPartTwoCls_5">Hotel</li>
                        </ul>
                    </div>
                    <div class="sidebar_part_one">
                        <span class="scorelabel">Average Score</span>
                        <span class="scoreperc" style="color: #000; font-size: 40px;">{{$productDetail->average_tour_score}}</span>
                    </div>
                    <div class="sidebar_part_one sidebarPartOneCls">
                        <?php 
                            $likeUnlike = getProductLikeOrUnlike($productDetail->id);
                            //echo $likeUnlike;
                        ?>
                        <a href="javascript:;" class="likeProCls <?php echo $likeUnlike == '1'?'likeCls':'disLikeCls'?>" data-like="1">Like  <i class="fa fa-thumbs-up" aria-hidden="true"></i></a>
                        {{-- likeCls --}}
                        <a href="javascript:;" class="likeProCls <?php echo $likeUnlike == '2'?'likeCls':'disLikeCls'?>" data-like="2">Dislike  <i class="fa fa-thumbs-down" aria-hidden="true"></i></a>
                    </div>
                    <div class="sidebar_part_one sidebarPartOneCls">
                        <a class="orangeLink btn CommentsBtnCls" href="javascript:;" style="float: initial;">Comments</a>
                    </div>
                    <div class="sidebar_part_four" style="text-align: center;">
                        <label class="sideSubMainTitleCls">Tour estimate</label>
                        <label  class="sideSubTitleCls">(BASED ON MIN 20 PEOPLE)</label>
                        <?php 
                        if($productDetail->total_cost == 'NaN'){ ?>
                            <label  class="sideSubLastTitleCls"><i class="fas fa-pound-sign"></i>0pp</label>
                        <?php } else{ ?>
                           <label  class="sideSubLastTitleCls"><i class="fas fa-pound-sign"></i>{{ number_format($productDetail->total_cost,2)}}pp</label>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="productCommentModal" tabindex="-1" role="dialog" aria-labelledby="addFolderModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: calc(100% - (1.75rem * 10));">
        <div class="modal-content appendCommentModalData">
            
        </div>
    </div>
</div>

<script src="{{ asset('js/popper.min.js') }}"></script> 
<script src="{{ asset('js/bootstrap.min.js') }}"></script> 
<script src="{{ asset('js/jquery.barrating.js') }}"></script>
<script src="{{ asset('js/pages/collaborator_product.js') }}"></script>