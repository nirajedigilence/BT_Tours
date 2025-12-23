
    <div class="notIndexContainer" style="margin:0;padding: 0;pointer-events: none;">
        <div class="tour_review_wrapper" style="padding:0;">
            <div class="tour_review">
                <div class="heading">
                    {{ $cartExperience->experience_name }} <span>({{date("D d M", strtotime($cartExperience->date_from)) }} - {{ date("D d M 'y", strtotime($cartExperience->date_to)) }})</span>
                </div>
                <input type="hidden" name="cart_experience_id" value="{{ $cartExperience->id }}">
                <?php
                if(isset($reviews->submitted_review)){
                    $submitted_review = unserialize($reviews->submitted_review);
                }
                
                if(!empty($submitted_review['hotels'])){
                    foreach ($submitted_review['hotels'] as $k => $v) {

                ?>
                <input type="hidden" name="review[hotels][{{$k}}][name]" value="{{$v['name']}}">
                <div class="section">

                    <div class="intro">

                        <div class="sub_heading">
                            HOTEL:- {{$v['name']}}
                        </div>

                        <p>
                            Please rate the hotel on the following:
                        </p>

                    </div>

                    <div class="questions">

                        <div class="question_wrapper">

                            <div class="question">
                                1. How would you rate check-in and check-out procedures for customers?
                            </div>

                            <div class="rating">

                                <div class="option">
                                    <input type="radio" name="review[hotels][{{$k}}][que_1]" id="hotel_1_poor" value="1" <?php echo (isset($v['que_1']) && $v['que_1'] == '1') ? 'checked' : ''; ?>>
                                    <label for="hotel_1_poor">
                                        <div class="icon"></div>
                                        <div class="text">Poor</div>
                                    </label>
                                </div>

                                <div class="option">
                                    <input type="radio" name="review[hotels][{{$k}}][que_1]" id="hotel_1_satisfactory" value="2" <?php echo (isset($v['que_1']) && $v['que_1'] == '2') ? 'checked' : ''; ?>>
                                    <label for="hotel_1_satisfactory">
                                        <div class="icon"></div>
                                        <div class="text">Satisfactory</div>
                                    </label>
                                </div>

                                <div class="option">
                                    <input type="radio" name="review[hotels][{{$k}}][que_1]" id="hotel_1_good" value="3" <?php echo (isset($v['que_1']) && $v['que_1'] == '3') ? 'checked' : ''; ?>>
                                    <label for="hotel_1_good">
                                        <div class="icon"></div>
                                        <div class="text">Good</div>
                                    </label>
                                </div>

                                <div class="option">
                                    <input type="radio" name="review[hotels][{{$k}}][que_1]" id="hotel_1_outstanding" value="4" <?php echo (isset($v['que_1']) && $v['que_1'] == '4') ? 'checked' : ''; ?>>
                                    <label for="hotel_1_outstanding">
                                        <div class="icon"></div>
                                        <div class="text">Outstanding</div>
                                    </label>
                                </div>

                            </div>

                        </div>

                        <div class="question_wrapper">

                            <div class="question">
                                2. How would you rate standard of cleanliness throughout the hotel?
                            </div>

                            <div class="rating">

                                <div class="option">
                                    <input type="radio" name="review[hotels][{{$k}}][que_2]" id="hotel_2_poor" value="1" <?php echo (isset($v['que_2']) && $v['que_2'] == '1') ? 'checked' : ''; ?>>
                                    <label for="hotel_2_poor">
                                        <div class="icon"></div>
                                        <div class="text">Poor</div>
                                    </label>
                                </div>

                                <div class="option">
                                    <input type="radio" name="review[hotels][{{$k}}][que_2]" id="hotel_2_satisfactory" value="2" <?php echo (isset($v['que_2']) && $v['que_2'] == '2') ? 'checked' : ''; ?>>
                                    <label for="hotel_2_satisfactory">
                                        <div class="icon"></div>
                                        <div class="text">Satisfactory</div>
                                    </label>
                                </div>

                                <div class="option">
                                    <input type="radio" name="review[hotels][{{$k}}][que_2]" id="hotel_2_good" value="3" <?php echo (isset($v['que_2']) && $v['que_2'] == '3') ? 'checked' : ''; ?>>
                                    <label for="hotel_2_good">
                                        <div class="icon"></div>
                                        <div class="text">Good</div>
                                    </label>
                                </div>

                                <div class="option">
                                    <input type="radio" name="review[hotels][{{$k}}][que_2]" id="hotel_2_outstanding" value="4" <?php echo (isset($v['que_2']) && $v['que_2'] == '4') ? 'checked' : ''; ?>>
                                    <label for="hotel_2_outstanding">
                                        <div class="icon"></div>
                                        <div class="text">Outstanding</div>
                                    </label>
                                </div>

                            </div>

                        </div>

                        <div class="question_wrapper">

                            <div class="question">
                                3. How would you rate the quality of the food served?
                            </div>

                            <div class="rating">

                                <div class="option">
                                    <input type="radio" name="review[hotels][{{$k}}][que_3]" id="hotel_3_poor" value="1" <?php echo (isset($v['que_3']) && $v['que_3'] == '1') ? 'checked' : ''; ?>>
                                    <label for="hotel_3_poor">
                                        <div class="icon"></div>
                                        <div class="text">Poor</div>
                                    </label>
                                </div>

                                <div class="option">
                                    <input type="radio" name="review[hotels][{{$k}}][que_3]" id="hotel_3_satisfactory" value="2" <?php echo (isset($v['que_3']) && $v['que_3'] == '2') ? 'checked' : ''; ?>>
                                    <label for="hotel_3_satisfactory">
                                        <div class="icon"></div>
                                        <div class="text">Satisfactory</div>
                                    </label>
                                </div>

                                <div class="option">
                                    <input type="radio" name="review[hotels][{{$k}}][que_3]" id="hotel_3_good" value="3" <?php echo (isset($v['que_3']) && $v['que_3'] == '3') ? 'checked' : ''; ?>>
                                    <label for="hotel_3_good">
                                        <div class="icon"></div>
                                        <div class="text">Good</div>
                                    </label>
                                </div>

                                <div class="option">
                                    <input type="radio" name="review[hotels][{{$k}}][que_3]" id="hotel_3_outstanding" value="4" <?php echo (isset($v['que_3']) && $v['que_3'] == '4') ? 'checked' : ''; ?>>
                                    <label for="hotel_3_outstanding">
                                        <div class="icon"></div>
                                        <div class="text">Outstanding</div>
                                    </label>
                                </div>

                            </div>

                        </div>

                        <div class="question_wrapper">

                            <div class="question">
                                4. How would you rate the service at the hotel?
                            </div>

                            <div class="rating">

                                <div class="option">
                                    <input type="radio" name="review[hotels][{{$k}}][que_4]" id="hotel_4_poor" value="1" <?php echo (isset($v['que_4']) && $v['que_4'] == '1') ? 'checked' : ''; ?>>
                                    <label for="hotel_4_poor">
                                        <div class="icon"></div>
                                        <div class="text">Poor</div>
                                    </label>
                                </div>

                                <div class="option">
                                    <input type="radio" name="review[hotels][{{$k}}][que_4]" id="hotel_4_satisfactory" value="2" <?php echo (isset($v['que_4']) && $v['que_4'] == '2') ? 'checked' : ''; ?>>
                                    <label for="hotel_4_satisfactory">
                                        <div class="icon"></div>
                                        <div class="text">Satisfactory</div>
                                    </label>
                                </div>

                                <div class="option">
                                    <input type="radio" name="review[hotels][{{$k}}][que_4]" id="hotel_4_good" value="3" <?php echo (isset($v['que_4']) && $v['que_4'] == '3') ? 'checked' : ''; ?>>
                                    <label for="hotel_4_good">
                                        <div class="icon"></div>
                                        <div class="text">Good</div>
                                    </label>
                                </div>

                                <div class="option">
                                    <input type="radio" name="review[hotels][{{$k}}][que_4]" id="hotel_4_outstanding" value="4" <?php echo (isset($v['que_4']) && $v['que_4'] == '4') ? 'checked' : ''; ?>>
                                    <label for="hotel_4_outstanding">
                                        <div class="icon"></div>
                                        <div class="text">Outstanding</div>
                                    </label>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>
                <?php } } ?>
                <div class="section">

                    <div class="intro">

                        <div class="sub_heading">
                            EXPERIENCES
                        </div>

                        <p>
                            Please rate the following experiences:
                        </p>

                    </div>

                    <div class="questions">
                       
                        <?php 
                        if(!empty($submitted_review['experiences'])){
                            foreach ($submitted_review['experiences'] as $key => $v) {
                        ?>
                        <input type="hidden" name="review[experiences][{{$key}}][name]" value="{{$v['name']}}">
                        <div class="question_wrapper">

                            <div class="question">
                                {{$key}}. {{ $v['name'] }}
                            </div>

                            <div class="rating">

                                <div class="option">
                                    <input type="radio" name="review[experiences][{{$key}}][ans]" id="experience_{{$key}}_poor" value="1" <?php echo (isset($v['ans']) && $v['ans'] == '1') ? 'checked' : ''; ?>>
                                    <label for="experience_{{$key}}_poor">
                                        <div class="icon"></div>
                                        <div class="text">Poor</div>
                                    </label>
                                </div>

                                <div class="option">
                                    <input type="radio" name="review[experiences][{{$key}}][ans]" id="experience_{{$key}}_satisfactory" value="2" <?php echo (isset($v['ans']) && $v['ans'] == '2') ? 'checked' : ''; ?>>
                                    <label for="experience_{{$key}}_satisfactory">
                                        <div class="icon"></div>
                                        <div class="text">Satisfactory</div>
                                    </label>
                                </div>

                                <div class="option">
                                    <input type="radio" name="review[experiences][{{$key}}][ans]" id="experience_{{$key}}_good" value="3" <?php echo (isset($v['ans']) && $v['ans'] == '3') ? 'checked' : ''; ?>>
                                    <label for="experience_{{$key}}_good">
                                        <div class="icon"></div>
                                        <div class="text">Good</div>
                                    </label>
                                </div>

                                <div class="option">
                                    <input type="radio" name="review[experiences][{{$key}}][ans]" id="experience_{{$key}}_outstanding" value="4" <?php echo (isset($v['ans']) && $v['ans'] == '4') ? 'checked' : ''; ?>>
                                    <label for="experience_{{$key}}_outstanding">
                                        <div class="icon"></div>
                                        <div class="text">Outstanding</div>
                                    </label>
                                </div>

                            </div>

                        </div>
                        <?php } } ?>

                    </div>

                </div>

                <div class="section">

                    <div class="intro">

                        <div class="sub_heading">
                            How did the tour go?
                        </div>

                    </div>

                    <div class="questions">
                        <?php
                        // pr($submitted_review['overview'][0]);
                        $overview = $submitted_review['overview'][0];
                        ?>
                        <div class="question_wrapper">

                            <div class="question">
                                1. How would you rate the itinerary? (daily mileages, value at the experiences visited)
                            </div>
                           
                            <div class="rating">

                                <div class="option">
                                    <input type="radio" name="review[overview][0][que_1]" id="overview_1_poor" value="1" <?php echo (isset($overview['que_1']) && $overview['que_1'] == '1') ? 'checked' : ''; ?>>
                                    <label for="overview_1_poor">
                                        <div class="icon"></div>
                                        <div class="text">Poor</div>
                                    </label>
                                </div>

                                <div class="option">
                                    <input type="radio" name="review[overview][0][que_1]" id="overview_1_satisfactory" value="2" <?php echo (isset($overview['que_1']) && $overview['que_1'] == '2') ? 'checked' : ''; ?>>
                                    <label for="overview_1_satisfactory">
                                        <div class="icon"></div>
                                        <div class="text">Satisfactory</div>
                                    </label>
                                </div>

                                <div class="option">
                                    <input type="radio" name="review[overview][0][que_1]" id="overview_1_good" value="3" <?php echo (isset($overview['que_1']) && $overview['que_1'] == '3') ? 'checked' : ''; ?>>
                                    <label for="overview_1_good">
                                        <div class="icon"></div>
                                        <div class="text">Good</div>
                                    </label>
                                </div>

                                <div class="option">
                                    <input type="radio" name="review[overview][0][que_1]" id="overview_1_outstanding" value="4" <?php echo (isset($overview['que_1']) && $overview['que_1'] == '4') ? 'checked' : ''; ?>>
                                    <label for="overview_1_outstanding">
                                        <div class="icon"></div>
                                        <div class="text">Outstanding</div>
                                    </label>
                                </div>

                            </div>

                        </div>

                        <div class="question_wrapper">

                            <div class="question">
                                2. Did the tour meet your group's mobility requirements?
                            </div>

                            <div class="rating">

                                <div class="option">
                                    <input type="radio" name="review[overview][0][que_2]" id="overview_2_yes" value="Yes" <?php echo (isset($overview['que_2']) && $overview['que_2'] == 'Yes') ? 'checked' : ''; ?>>
                                    <label for="overview_2_yes">
                                        <div class="icon"></div>
                                        <div class="text">Yes</div>
                                    </label>
                                </div>

                                <div class="option">
                                    <input type="radio" name="review[overview][0][que_2]" id="overview_2_no" value="No" <?php echo (isset($overview['que_2']) && $overview['que_2'] == 'No') ? 'checked' : ''; ?>>
                                    <label for="overview_2_no">
                                        <div class="icon"></div>
                                        <div class="text">No</div>
                                    </label>
                                </div>

                            </div>

                            <textarea type="text" name="review[overview][0][mobility_requirements]" id="mobility_requirements" rows="4" class="comments"><?php echo (isset($overview['mobility_requirements']) ? $overview['mobility_requirements'] : ''); ?></textarea>

                        </div>

                        <div class="question_wrapper">

                            <div class="question">
                                3. Were there any challenges on the tour? If yes, please write in the comments box below
                            </div>

                            <div class="rating">

                                <div class="option">
                                    <input type="radio" name="review[overview][0][que_3]" id="overview_3_yes" value="Yes" <?php echo (isset($overview['que_3']) && $overview['que_3'] == 'Yes') ? 'checked' : ''; ?>>
                                    <label for="overview_3_yes">
                                        <div class="icon"></div>
                                        <div class="text">Yes</div>
                                    </label>
                                </div>

                                <div class="option">
                                    <input type="radio" name="review[overview][0][que_3]" id="overview_3_no" value="No" <?php echo (isset($overview['que_3']) && $overview['que_3'] == 'No') ? 'checked' : ''; ?>>
                                    <label for="overview_3_no">
                                        <div class="icon"></div>
                                        <div class="text">No</div>
                                    </label>
                                </div>

                            </div>

                            <textarea type="text" name="review[overview][0][challenges]" id="challenges" rows="4" class="comments"><?php echo (isset($overview['challenges']) ? $overview['challenges'] : ''); ?></textarea>

                        </div>

                        <div class="question_wrapper">
                            <div class="question">
                                Your Name
                            </div>
                            <input type="text" name="review[name]" class="comments" value="{{$submitted_review['name']}}">
                        </div>
                        <div class="question_wrapper">

                            <div class="question">
                                Final Score
                            </div>

                            <div class="stars">
                                <input type="hidden" name="review[stars]" value="" id="starRate">
                                <?php
                                for ($i=1; $i <= 5; $i++) { 
                                    if(isset($submitted_review['stars']) && ($i <= $submitted_review['stars'])){
                                        echo '<i class="fas fa-star"></i>';
                                    }else{
                                        echo '<i class="fas fa-star grey"></i>';
                                    }
                                }
                                ?>

                            </div>

                        </div>

                        <div class="question_wrapper">

                            <div class="question">
                                Please post your review of your overall experience here (for public viewing)
                            </div>

                            <textarea type="text" name="review[comments]" id="comments" rows="5" class="comments">{{$submitted_review['comments']}}</textarea>

                        </div>

                        <div class="question_wrapper">

                            <div class="question">
                                Uploaded pictures taken on tour
                            </div>

                            <div class="photo_upload">
                                <?php 
                                if(!empty($submitted_review['files'])){
                                    $files = explode(',', $submitted_review['files']);
                                    $images = 


DB::connection('mysql_veenus')->table('review_images')->whereIn('id', $files)->get()->toArray();
                                    // pr($images);
                                    foreach ($images as $key => $value) {
                                        ?>
                                        <div class="photo">
                                            <img src='{{ url("storage")."/".$value->file }}' />
                                        </div>
                                        <?php
                                    }
                                }else{
                                    echo 'Not found';
                                }
                                ?>
                            </div>

                            <div class="gdpr_text">
                                GDPR Text goes here ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat.
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
