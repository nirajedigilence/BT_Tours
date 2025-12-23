  <div class="review_wrapper" style="border:unset !important;">

                            
                            <!-- <div class="swiper-container driver_reviews" style="padding: 0;">
                            <div class="swiper-wrapper"> -->

                                <?php
                                    // pr($reviews);
                                    $hasreview = 'no';
                                    if(!empty($reviews)){
                                        foreach($reviews as $k => $value){

                                            $hasreview = 'yes';
                                           /* if(!empty($v['reviews'])){
                                                
                                                foreach ($v['reviews'] as $key => $value) {*/
                                                    if($value['display'] == 1){
                                                    $submitted_review = unserialize($value['submitted_review']);
                                                    // pr($submitted_review);
                                                    $hotels = implode(', ', array_column($submitted_review['hotels'], 'name'));
                                                ?>
                                                <div class="row p-2" id="review-div{{$value['id']}}" style=" border: 1px solid #efeff6;margin-bottom: 5px;">
                                                    <div class="col-md-12">
                                                        <h4 class="black mb-2"><b>{{$submitted_review['name']}}</b><span style="float: right;color: #ccc;">{{date("d M 'Y",strtotime($value['created_at']))}}</span></h4>
                                                        <div class="stars mb-3">
                                                            <?php
                                                                for ($i=1; $i <= 5; $i++) { 
                                                                    if(isset($value['stars']) && ($i <= $value['stars'])){
                                                                        echo '<i class="fas fa-star"></i>';
                                                                    }else{
                                                                        echo '<i class="fas fa-star grey"></i>';
                                                                    }
                                                                }
                                                                ?>
                                                        </div>
                                                        <div class="gdpr_text mb-2">
                                                                {{$submitted_review['comments']}}
                                                            </div>
                                                        <p></p>
                                                         <?php 
                                                                if(!empty($submitted_review['files'])){ ?>
                                                        <p class="black" style="font-weight:650;margin-top: 20px;">Uploaded Pictures</p>
                                                        <div class="question_wrapper">


                                                            <div class="photo_upload">
                                                                <?php 
                                                                if(!empty($submitted_review['files'])){
                                                                    $files = explode(',', $submitted_review['files']);
                                                                    $images = 


DB::connection('mysql_veenus')->table('review_images')->whereIn('id', $files)->get()->toArray();
                                                                    // pr($images);
                                                                    foreach ($images as $key => $ivalue) {
                                                                        ?>
                                                                        <div class="photo">
                                                                            <img src='{{ url("storage")."/".$ivalue->file }}' />
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }else{
                                                                    echo 'Not found';
                                                                }
                                                                ?>
                                                            </div>

                                                            

                                                        </div>
                                                    <?php } ?>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <button type="button" style="float: right;border-color: red !important;background: red;" target="_blank" target="_blank" data-id="{{$value['id']}}" class="enableProductCls remove-review" class="enableProductCls" href="">Remove  review</button>
                                                         <a style="float: right;margin-right: 6px;" target="_blank" target="_blank" href="/acc-superuser-completed?id={{$value['cart_experience_id']}}&review={{$value['id']}}" class="enableProductCls" class="enableProductCls" href="">View review</a>
                                                          
                                                    </div>
                                                </div>
                                               
                                                <?php 
                                                    }
                                                }
                                           /* }
                                        }*/
                                    } 
                                    ?>
                              
                            <br/>
                        <a style="float: right;margin-right: 6px;" target="_blank" href="/acc-superuser-completed?exp_id={{$id}}" class="enableProductCls">Add review</a>
                            <br/>
                            <br/>
                        </div>

<script type="text/javascript">
    $('.remove-review').click(function(){
        if(confirm('Are you sure you want to remove?'))
        {
            var reviewId = $(this).data('id');
            $.ajax({
                    url: base_url+'/super-user/remove-guest-review',
                    type: 'POST',
                    dataType: 'json',
                    data: {'id':reviewId},
                    success: function(data) {
                         toastSuccess('Remove Review successfully');
                         $('#review-div'+reviewId).remove();
                    },
                    error: function(e) {
                    }
                });
        }
        
    })
     
</script>