$(document).ready(function(){
	setTimeout(function(){
		var mode = $('.mode').val();
		if(mode != 'Edit'){
			$('.addSectionCls').val('1');
			$('.addSectionBtnCls').trigger('click');
		}else{
			checkedSectionExist();
			validationRulesSetForVipExperience();
		}
		$('.experienceCostCls').trigger('change');
	}, 500);
	$('#addProductForm').validate(addProductValidateOpt);
	$('#example-square').barrating('show', {
        theme: 'bars-square',
        showValues: true,
        showSelectedRating: true
    });
    countAverageScore();
});

$(document).on('click', '.addmorelnkProPipeline', function() {
	var thisVal = $(this).attr('data-id');
	var htmls = '';
	var sectionInclusions = $('.product_inclusions_'+thisVal).val();
	sectionInclusions = parseInt(sectionInclusions);
	sectionInclusions = sectionInclusions+1;
	var htmlId = 'proPipeinc_'+thisVal+'_'+sectionInclusions;
	// htmls += '<input class="form-control" name="product_pipeline['+thisVal+'][inclusions]['+sectionInclusions+']" type="text" id="'+htmlId+'" value="" >';
	htmls += '<div class="row ameDiv_'+sectionInclusions+'">\
                <div class="col-sm-10">\
                    <input class="form-control" name="product_pipeline['+thisVal+'][inclusions]['+sectionInclusions+']" type="text" id="'+htmlId+'" value="" >\
                </div> \
                <div class="col-sm-2">\
                    <a href="javascript:;" class="nhSubCloseCls removeAddAmebtn" data-id="'+sectionInclusions+'" >x</a>\
                </div> \
            </div> ';
	
	$('.product_inclusions_'+thisVal).val(sectionInclusions);
	$('.productPipeLineInclusionsCls'+thisVal).append(htmls);
	$('#'+htmlId).trigger('blur');
	$('#'+htmlId).rules('add', {
        required: true,
        messages: {
            required: "Please provide inclusions"
        },
    });
});

$(document).on('click', '.addmorelnk', function() {
	var thisVal = $(this).attr('data-id');
	var htmls = '';
	var sectionInclusions = $('.section_inclusions_'+thisVal).val();
	sectionInclusions = parseInt(sectionInclusions);
	sectionInclusions = sectionInclusions+1;
	var htmlId = 'inclusions_'+thisVal+'_'+sectionInclusions;
	// htmls += '<input class="form-control" name="section['+thisVal+'][inclusions]['+sectionInclusions+']" type="text" id="'+htmlId+'" value="" >';
	htmls += '<div class="row ameDiv_'+sectionInclusions+'">\
                <div class="col-sm-10">\
                    <input class="form-control" name="section['+thisVal+'][inclusions]['+sectionInclusions+']" type="text" id="'+htmlId+'" value="" >\
                </div> \
                <div class="col-sm-2">\
                    <a href="javascript:;" class="nhSubCloseCls removeAddAmebtn" data-id="'+sectionInclusions+'" >x</a>\
                </div> \
            </div> ';
	
	$('.section_inclusions_'+thisVal).val(sectionInclusions);
	$('.customFullControlInclusionsCls'+thisVal).append(htmls);
	$('#'+htmlId).trigger('blur');
	console.log(htmlId);
	$('#'+htmlId).rules('add', {
        required: true,
        messages: {
            required: "Please provide inclusions"
        },
    });
});

$(document).on('keyup', '.productNameCls', function() {
    var productNameCls = $(this).val();
    $(".proNameCls").html(productNameCls);
});

$(document).on('click', '.editTitle', function() {
	if($(".inputTitle").hasClass("ele_hide")){
        $(".inputTitle").removeClass("ele_hide");
        $(".proNameCls").hide();
    }else{
        $(".inputTitle").addClass("ele_hide");
        $(".proNameCls").show();
    }
});

$(document).on('click', '.RemoveSectionCls', function() {
	$('#removeProductSectionModal').modal('hide');
	var proSectionID = $('.proSectionID').val();
	var thisProIdCls = $('.thisProIdCls').val();
	var proID = $('.proID').val();
	var thisValCls = $('.thisValCls').val();
	$.ajax({
        url: base_url+'/super-user/products-remove-section',
        type: 'POST',
         // dataType: 'json',
        data: {'sections_id':proSectionID, 'products_id':proID},
        success: function(data) {
        	$('.rCD'+thisValCls).remove();
			checkedSectionExist();
        },
        error: function(e) {
        }
    });
});

$(document).on('click', '.closePartIcon', function() {
	var thisVal = $(this).attr('data-id');
	var thisProId = $(this).attr('data-proid');
	if(thisProId){
		$('.proSectionID').val(thisProId);
		$('.thisValCls').val(thisVal);
		$('#removeProductSectionModal').modal('show');
	}else{
		$('.rCD'+thisVal).remove();
		checkedSectionExist();
	}
});

$(document).on('click', '.addSectionBtnCls', function() {
	var addSecVal = $('.addSectionCls').val();
		$('.sectionErrorCls').hide();
	if(addSecVal != ''){
		if(addSecVal == '4'){
			addSectionForMap();
		}else if(addSecVal == '1'){
			addSectionForVipExperience();
		}else if(addSecVal == '2'){
			addSectionForBigBanner();
		}else if(addSecVal == '3'){
			addSectionForLocalExperience();
		}else if(addSecVal == '5'){
			addSectionForHotel();
		}else{

		}
		checkedSectionExist();
	}else{
		$('.sectionErrorCls').show();
	}
	$('.addSectionCls').val('');
});

function addSectionForVipExperience(){
	var htmls = '';
	htmls += '<div class="repetedContentDiv rcom1 rCD1" data-exid="1" data-id="1">\
	                <div class="fl_w main_title">\
	                	<h2>VIP Experience</a></h2>\
                	</div>\
	                <div class="white_part">\
	                    <div class="closeIconDiv">\
	                        <a class="closePartIcon" data-id="1" da href="javascript:;"><i class="fas fa-times"></i></a>\
	                    </div>\
	                    <div class="part_one">\
	                        <div class="form-group">\
	                            <div class="custom_control">\
	                                <label>Big Banner Experience</label>\
	                                <input class="form-control experienceTitleCls" name="section[1][title]" type="text" id="section_1_title" value="" maxlength="255" placeholder="Jaguar Land Rover">\
	                            </div>\
	                            <div class="custom_control costcontrol">\
	                                <label>Cost</label>\
	                                <input class="form-control experienceCostCls" name="section[1][cost]" type="number" value="" placeholder="&#163;50pp" id="section_1_cost">\
	                            </div>\
	                        </div>\
	                    </div>\
	                    <div class="part_two">\
	                        <div class="form-group">\
	                            <div class="custom_control pullright textright">\
	                                <label>Score</label>\
	                                <span class="scoreperc">0%</span>\
	                            </div>\
	                        </div>\
	                    </div>\
	                    <div class="fl_w comman part_three">\
	                        <div class="form-group">\
	                            <div class="custom_control">\
	                                <label>Mobility Level</label>\
	                                <select id="example-square-1" name="section[1][score]" autocomplete="off">\
				                      <option value=""></option>\
				                      <option value="1">1</option>\
				                      <option value="2">2</option>\
				                      <option value="3">3</option>\
				                      <option value="4">4</option>\
				                      <option value="5">5</option>\
				                    </select>\
	                            </div>\
	                        </div>\
	                    </div>\
	                    <div class="fl_w comman part_four">\
	                        <div class="form-group">\
	                            <div class="custom_full_control">\
	                                <label>Story</label>\
	                                <textarea rows="4" name="section[1][story]" id="section_1_story"></textarea>\
	                            </div>\
	                        </div>\
	                    </div>\
	                    <div class="fl_w comman part_five">\
	                        <div class="form-group">\
	                            <div class="custom_full_control">\
	                                <label>Experience</label>\
	                                <textarea rows="4" name="section[1][experience]" id="section_1_experience"></textarea>\
	                            </div>\
	                        </div>\
	                    </div>\
	                    <div class="fl_w comman part_six">\
	                    <input class="form-control section_inclusions_1" name="section_inclusions_1" type="hidden" value="1">\
	                        <div class="form-group">\
	                            <div class="custom_full_control">\
	                                <label>Inclusions</label>\
		                            <div class="customFullControlInclusionsCls1 cFCInclusionsCls">\
		                                <div class="row ameDiv_111">\
                                            <div class="col-sm-10">\
                                                <input class="form-control" name="section[1][inclusions][1]" type="text"  value="" id="inclusions_1_1" >\
                                            </div> \
                                            <div class="col-sm-2">\
                                                <a href="javascript:;" class="nhSubCloseCls removeAddAmebtn" data-id="111" >x</a>\
                                            </div> \
                                        </div> \
		                            </div>\
	                                <a href="javascript:;" class="addmorelnk" data-id="1">Add More</a>\
	                            </div>\
	                        </div>\
	                    </div>\
	                    <div class="fl_w comman part_six">\
	                        <div class="form-group">\
	                            <div class="custom_full_control">\
	                                <label>Gallery</label>\
	                                <div class="brw_bx image_galller">\
	                                    <div class="browse_btn">\
	                                        <input type="file" name="section[1][images][]" multiple accept="image/*">\
	                                        <div class="brw_user_ic">\
	                                            <i class="far fa-images"></i>\
	                                            <div class="brw_plus">\
	                                                <i class="fas fa-plus"></i>\
	                                            </div>\
	                                        </div>\
	                                    </div>\
	                                </div>\
	                            </div>\
	                        </div>\
	                    </div>\
	                </div>\
	            </div>';
	$('.appendSectionDiv').append(htmls);
	validationRulesSetForVipExperience();
	$('#example-square-1').barrating('show', {
        theme: 'bars-square',
        showValues: true,
        showSelectedRating: true
    });
}

function addSectionForBigBanner(){
	var htmls = '';
	htmls += '<div class="repetedContentDiv rcom2 rCD2" data-exid="2" data-id="2">\
                            <div class="fl_w main_title"><h2>Big Banner</h2></div>\
                            <div class="white_part">\
                                <div class="closeIconDiv">\
                                    <a class="closePartIcon" data-id="2" href="javascript:;"><i class="fas fa-times"></i></a>\
                                </div>\
                                <div class="part_one">\
                                    <div class="form-group">\
                                        <div class="custom_control">\
                                            <label>Big Banner Experience</label>\
                                            <input class="form-control experienceTitleCls" name="section[2][title]" type="text" value="" maxlength="255" id="section_2_title" placeholder="Jaguar Land Rover">\
                                        </div>\
                                        <div class="custom_control costcontrol">\
                                            <label>Cost</label>\
                                            <input class="form-control experienceCostCls" name="section[2][cost]" type="number" id="section_2_cost" value="" placeholder="&#163;50pp">\
                                        </div>\
                                    </div>\
                                </div>\
                                <div class="part_two">\
                                    <div class="form-group">\
                                        <div class="custom_control pullright textright">\
                                            <label>Score</label>\
                                            <span class="scoreperc" name="section[2][score]" id="section_2_score">0%</span>\
                                        </div>\
                                    </div>\
                                </div>\
                                <div class="fl_w comman part_three">\
                                    <div class="form-group">\
                                        <div class="custom_control">\
                                            <label>Mobility Level</label>\
                                            <div class="boxes">\
                                                <select id="example-square-2" name="section[2][score]" autocomplete="off">\
							                      <option value=""></option>\
							                      <option value="1">1</option>\
							                      <option value="2">2</option>\
							                      <option value="3">3</option>\
							                      <option value="4">4</option>\
							                      <option value="5">5</option>\
							                    </select>\
                                            </div>\
                                        </div>\
                                    </div>\
                                </div>\
                                <div class="fl_w comman part_four">\
                                    <div class="form-group">\
                                        <div class="custom_full_control">\
                                            <label>Story</label>\
                                            <textarea rows="4" name="section[2][story]" id="section_2_story" ></textarea>\
                                        </div>\
                                    </div>\
                                </div>\
                                <div class="fl_w comman part_five">\
                                    <div class="form-group">\
                                        <div class="custom_full_control">\
                                            <label>Experience</label>\
                                            <textarea rows="4" id="section_2_experience" name="section[2][experience]" ></textarea>\
                                        </div>\
                                    </div>\
                                </div>\
                                <div class="fl_w comman part_six">\
                                <input class="form-control section_inclusions_2" name="section_inclusions_2" type="hidden" value="1">\
                                    <div class="form-group">\
                                        <div class="custom_full_control">\
                                            <label>Inclusions</label>\
                                            <div class="customFullControlInclusionsCls2 cFCInclusionsCls">\
				                                <div class="row ameDiv_222">\
		                                            <div class="col-sm-10">\
				                                		<input class="form-control" name="section[2][inclusions][1]" type="text"  value="" id="inclusions_2_1" >\
		                                            </div> \
		                                            <div class="col-sm-2">\
		                                                <a href="javascript:;" class="nhSubCloseCls removeAddAmebtn" data-id="222" >x</a>\
		                                            </div> \
		                                        </div> \
				                            </div>\
			                                <a href="javascript:;" class="addmorelnk" data-id="2">Add More</a>\
                                        </div>\
                                    </div>\
                                </div>\
                                <div class="fl_w comman part_six">\
                                    <div class="form-group">\
                                        <div class="custom_full_control">\
                                            <label>Gallery</label>\
	                                            <div class="brw_bx image_galller">\
	                                                <div class="browse_btn">\
	                                                    <input type="file" name="section[2][images][]" multiple accept="image/*">\
	                                                    <div class="brw_user_ic">\
	                                                        <i class="far fa-images"></i>\
	                                                        <div class="brw_plus">\
	                                                            <i class="fas fa-plus"></i>\
	                                                        </div>\
	                                                    </div>\
	                                                </div>\
                                                </div>\
                                            </div>\
                                        </div>\
                                    </div>\
                                </div>\
                            </div>\
                        </div>';
	$('.appendSectionDiv').append(htmls);
	validationRulesSetForVipExperience();
	$('#example-square-2').barrating('show', {
        theme: 'bars-square',
        showValues: true,
        showSelectedRating: true
    });
}

function addSectionForLocalExperience(){
	var htmls = '';
	htmls += '<div class="repetedContentDiv rcom3 rCD3" data-exid="3" data-id="3">\
                            <div class="fl_w main_title"><h2>Local Experience</h2></div>\
                            <div class="white_part">\
                                <div class="closeIconDiv">\
                                    <a class="closePartIcon" data-id="3" href="javascript:;"><i class="fas fa-times"></i></a>\
                                </div>\
                                <div class="part_one">\
                                    <div class="form-group">\
                                        <div class="custom_control">\
                                            <label>Local Experience</label>\
                                            <input class="form-control experienceTitleCls" name="section[3][title]" type="text" id="section_3_title" value="" maxlength="255" placeholder="Jaguar Land Rover">\
                                        </div>\
                                        <div class="custom_control costcontrol">\
                                            <label>Cost</label>\
                                            <input class="form-control experienceCostCls" name="section[3][cost]" type="number" id="section_3_cost" value="" placeholder="&#163;50pp">\
                                        </div>\
                                    </div>\
                                </div>\
                                <div class="part_two">\
                                    <div class="form-group">\
                                        <div class="custom_control pullright textright">\
                                            <label>Score</label>\
                                            <span class="scoreperc" name="section[3][score]" id="section_3_score" >0%</span>\
                                        </div>\
                                    </div>\
                                </div>\
                                <div class="fl_w comman part_three">\
                                    <div class="form-group">\
                                        <div class="custom_control">\
                                            <label>Mobility Level</label>\
                                            <div class="boxes">\
                                                <select id="example-square-3" name="section[3][score]" autocomplete="off">\
								                      <option value=""></option>\
								                      <option value="1">1</option>\
								                      <option value="2">2</option>\
								                      <option value="3">3</option>\
								                      <option value="4">4</option>\
								                      <option value="5">5</option>\
								                    </select>\
                                            </div>\
                                        </div>\
                                    </div>\
                                </div>\
                                <div class="fl_w comman part_four">\
                                    <div class="form-group">\
                                        <div class="custom_full_control">\
                                            <label>Story</label>\
                                            <textarea rows="4" name="section[3][story]" id="section_3_story" ></textarea>\
                                        </div>\
                                    </div>\
                                </div>\
                                <div class="fl_w comman part_five">\
                                    <div class="form-group">\
                                        <div class="custom_full_control">\
                                            <label>Experience</label>\
                                            <textarea rows="4" name="section[3][experience]" id="section_3_experience" ></textarea>\
                                        </div>\
                                    </div>\
                                </div>\
                                <div class="fl_w comman part_six">\
                                <input class="form-control section_inclusions_3" name="section_inclusions_3" type="hidden" value="1">\
                                    <div class="form-group">\
                                        <div class="custom_full_control">\
                                            <label>Inclusions</label>\
                                            <div class="customFullControlInclusionsCls3 cFCInclusionsCls">\
				                                <div class="row ameDiv_333">\
		                                            <div class="col-sm-10">\
						                                <input class="form-control" name="section[3][inclusions][1]" type="text" value="" id="inclusions_3_1" >\
		                                            </div> \
		                                            <div class="col-sm-2">\
		                                                <a href="javascript:;" class="nhSubCloseCls removeAddAmebtn" data-id="333" >x</a>\
		                                            </div> \
		                                        </div> \
				                            </div>\
			                                <a href="javascript:;" class="addmorelnk" data-id="3">Add More</a>\
                                        </div>\
                                    </div>\
                                </div>\
                                <div class="fl_w comman part_six">\
                                    <div class="form-group">\
                                        <div class="custom_full_control">\
                                            <label>Gallery</label>\
                                            <div class="brw_bx image_galller">\
                                                <div class="browse_btn">\
                                                    <input type="file" name="section[3][images][]" multiple accept="image/*">\
                                                    <div class="brw_user_ic">\
                                                        <i class="far fa-images"></i>\
                                                        <div class="brw_plus">\
                                                            <i class="fas fa-plus"></i>\
                                                        </div>\
                                                    </div>\
                                                </div>\
                                            </div>\
                                        </div>\
                                    </div>\
                                </div>\
                            </div>\
                        </div>';
	$('.appendSectionDiv').append(htmls);
	validationRulesSetForVipExperience();
	$('#example-square-3').barrating('show', {
        theme: 'bars-square',
        showValues: true,
        showSelectedRating: true
    });
}

function addSectionForMap(){
	var htmls = '';
	htmls += '<div class="repetedContentDiv rcom4 rCD4" data-exid="4" data-id="4">\
		        <div class="fl_w main_title">\
		            <h2>Map Visualization</h2>\
		        </div>\
		        <div class="white_part">\
		            <div class="closeIconDiv">\
		                <a class="closePartIcon" data-id="4" href="javascript:;"><i class="fas fa-times"></i></a>\
		            </div>\
		            <div class="fl_w comman part_six">\
		                <div class="form-group">\
		                    <div class="custom_full_control">\
		                        <label>Map URL</label>\
		                        <input class="form-control" name="section[4][title]" type="text" id="section_4_title" value="" >\
		                    </div>\
		                </div>\
		            </div>\
		        </div>\
		    </div>';
	$('.appendSectionDiv').append(htmls);
}

function addSectionForHotel(){
	var htmls = '';
	htmls += '<div class="repetedContentDiv rcom5 rCD5" data-exid="5" data-id="5">\
                <div class="fl_w main_title"><h2>Hotel</h2></div>\
                <div class="white_part">\
                    <div class="closeIconDiv">\
                        <a class="closePartIcon" data-id="5" href="javascript:;"><i class="fas fa-times"></i></a>\
                    </div>\
                    <div class="part_one">\
                        <div class="form-group">\
                            <div class="custom_control">\
                                <label>Hotel Name</label>\
                                <input class="form-control experienceTitleCls" name="section[5][title]" type="text" id="section_5_title" value="" maxlength="255" placeholder="Jaguar Land Rover">\
                            </div>\
                            <div class="custom_control costcontrol">\
                                <label>Cost</label>\
                                <input class="form-control experienceCostCls" name="section[5][cost]" type="number" id="section_5_cost" value="" placeholder="&#163;50pp">\
                            </div>\
                            <div class="custom_control costcontrol">\
                                <label>Nights</label>\
                                <input class="form-control" name="section[5][night]" type="text" id="section_5_night" value="" placeholder="4">\
                            </div>\
                        </div>\
                    </div>\
                    <div class="part_two">\
                        <div class="form-group">\
                            <div class="custom_control pullright textright">\
                                <label>Score</label>\
                                <span class="scoreperc">0%</span>\
                            </div>\
                        </div>\
                    </div>\
                    <div class="fl_w comman part_three">\
                        <div class="form-group">\
                            <div class="custom_control">\
                                <label>Start Rating</label>\
                                <select id="example-square-5" name="section[5][score]" autocomplete="off">\
			                      <option value=""></option>\
			                      <option value="1">1</option>\
			                      <option value="2">2</option>\
			                      <option value="3">3</option>\
			                      <option value="4">4</option>\
			                      <option value="5">5</option>\
			                    </select>\
                            </div>\
                        </div>\
                    </div>\
                    <div class="fl_w comman part_four">\
                        <div class="form-group">\
                            <div class="custom_full_control">\
                                <label>Description</label>\
                                <textarea rows="4" name="section[5][story]" id="section_5_story"></textarea>\
                            </div>\
                        </div>\
                    </div>\
                    <div class="fl_w comman part_six">\
                    <input class="form-control section_inclusions_5" name="section_inclusions_5" type="hidden" value="1">\
                        <div class="form-group">\
                            <div class="custom_full_control">\
                                <label>Amenities</label>\
                                <div class="customFullControlInclusionsCls5 cFCInclusionsCls">\
	                                <div class="row ameDiv_555">\
	                                    <div class="col-sm-10">\
	                                		<input class="form-control" name="section[5][inclusions][1]" type="text"  value="" id="inclusions_5_1" >\
			                            </div> \
	                                    <div class="col-sm-2">\
	                                        <a href="javascript:;" class="nhSubCloseCls removeAddAmebtn" data-id="555" >x</a>\
	                                    </div> \
	                                </div> \
	                            </div>\
                                <a href="javascript:;" class="addmorelnk" data-id="5">Add More</a>\
                            </div>\
                        </div>\
                    </div>\
                    <div class="fl_w comman part_six">\
                        <div class="form-group">\
                            <div class="custom_full_control">\
                                <label>Gallery</label>\
                                <div class="brw_bx image_galller">\
                                    <div class="browse_btn">\
                                        <input type="file" name="section[5][images][]" multiple accept="image/*">\
                                        <div class="brw_user_ic">\
                                            <i class="far fa-images"></i>\
                                            <div class="brw_plus">\
                                                <i class="fas fa-plus"></i>\
                                            </div>\
                                        </div>\
                                    </div>\
                                </div>\
                            </div>\
                        </div>\
                    </div>\
                </div>\
            </div>';
	$('.appendSectionDiv').append(htmls);
	validationRulesSetForVipExperience();
	$('#example-square-5').barrating('show', {
        theme: 'bars-square',
        showValues: true,
        showSelectedRating: true
    });
}

function checkedSectionExist(){
	$(".addSectionCls option[value='1']").attr("disabled",false);
	$(".addSectionCls option[value='2']").attr("disabled",false);
	$(".addSectionCls option[value='3']").attr("disabled",false);
	$(".addSectionCls option[value='4']").attr("disabled",false);
	$(".addSectionCls option[value='5']").attr("disabled",false);

		$('.sidebarPartTwoCls_1').removeClass('active');
		$('.sidebarPartTwoCls_2').removeClass('active');
		$('.sidebarPartTwoCls_3').removeClass('active');
		$('.sidebarPartTwoCls_4').removeClass('active');
		$('.sidebarPartTwoCls_5').removeClass('active');
	$(".repetedContentDiv").each(function() {
		var secId = $(this).attr('data-id');
		$('.sidebarPartTwoCls_'+secId).addClass('active');
		$(".addSectionCls option[value='"+ secId + "']").attr("disabled",true);
	});
}

addProductValidateOpt = {
    invalidHandler: function(event, validator) {
        var errors = validator.numberOfInvalids();
        if (errors) {
            $('span.error').hide();
        }
    },
    rules: {
        'product_name': {
            required: true,
        },
        'country_area_id': {
            required: true,
        },
        'is_prototype': {
            required: true,
        },
        'company_image': {
            accept: "image/jpg,image/jpeg,image/png"
        }

    },
    errorElement: 'div',
    messages: {
        'general[company_address]': {
            required: "please provide company address",
        },
        'country_area_id': {
            required: "please provide country area",
        },
        'is_prototype': {
            required: "please provide prototype folder",
        },
        'company_image': {
            accept: "please provide this type of images (image/jpg,image/jpeg,image/png)",
        }
    },
    errorPlacement: function(error, element) {
        if (element.hasClass('company_image')) {
            error.insertAfter($('.errorCls'));
        }else{
            error.insertAfter($(element));
        }
    },
    submitHandler: function(form) {
    	$('[type="submit"]').prop('disabled', true);
        return true;
    },
};

function validationRulesSetForVipExperience() {
    $('#section_1_title').rules('add', {
        required: true,
        messages: {
            required: "Please provide title"
        },
    });
    $('#section_1_cost').rules('add', {
        required: true,
        messages: {
            required: "Please provide cost"
        },
    });
    $('#section_1_story').rules('add', {
        required: true,
        messages: {
            required: "Please provide story"
        },
    });
    $('#section_1_experience').rules('add', {
        required: true,
        messages: {
            required: "Please provide experience"
        },
    });
    $('#inclusions_1_1').rules('add', {
        required: true,
        messages: {
            required: "Please provide inclusions"
        },
    });
    /* 2 - Big Banner*/
    $('#section_2_title').rules('add', {
        required: true,
        messages: {
            required: "Please provide title"
        },
    });
    $('#section_2_cost').rules('add', {
        required: true,
        messages: {
            required: "Please provide cost"
        },
    });
    $('#section_2_score').rules('add', {
        required: true,
        messages: {
            required: "Please provide score"
        },
    });
    $('#section_2_story').rules('add', {
        required: true,
        messages: {
            required: "Please provide story"
        },
    });
    $('#section_2_experience').rules('add', {
        required: true,
        messages: {
            required: "Please provide experience"
        },
    });
    $('#inclusions_2_1').rules('add', {
        required: true,
        messages: {
            required: "Please provide inclusions"
        },
    });

    /* 3 - Local Experience*/
    $('#section_3_title').rules('add', {
        required: true,
        messages: {
            required: "Please provide title"
        },
    });
    $('#section_3_cost').rules('add', {
        required: true,
        messages: {
            required: "Please provide cost"
        },
    });
    $('#section_3_score').rules('add', {
        required: true,
        messages: {
            required: "Please provide score"
        },
    });
    $('#section_3_story').rules('add', {
        required: true,
        messages: {
            required: "Please provide story"
        },
    });
    $('#section_3_experience').rules('add', {
        required: true,
        messages: {
            required: "Please provide experience"
        },
    });
    $('#inclusions_3_1').rules('add', {
        required: true,
        messages: {
            required: "Please provide inclusions"
        },
    });
    /* 4 - MAP*/
    $('#section_4_title').rules('add', {
        required: true,
        messages: {
            required: "Please provide Map URL"
        },
    });
    /* 3 - Hotel*/
    $('#section_5_title').rules('add', {
        required: true,
        messages: {
            required: "Please provide title"
        },
    });
    $('#section_5_cost').rules('add', {
        required: true,
        messages: {
            required: "Please provide cost"
        },
    });
    $('#section_5_night').rules('add', {
        required: true,
        messages: {
            required: "Please provide text"
        },
    });
    $('#section_5_score').rules('add', {
        required: true,
        messages: {
            required: "Please provide score"
        },
    });
    $('#section_5_story').rules('add', {
        required: true,
        messages: {
            required: "Please provide story"
        },
    });
    $('#section_5_experience').rules('add', {
        required: true,
        messages: {
            required: "Please provide experience"
        },
    });
    $('#inclusions_5_1').rules('add', {
        required: true,
        messages: {
            required: "Please provide amenities"
        },
    });
}

function countAverageScore() {
    var scoreAmt = 0;
    var cnt = 0;
    $(".productScoreCls").each(function() {
        var thisVal = $(this).val();
        if(thisVal){
            scoreAmt = scoreAmt + parseFloat(thisVal);
        }
        cnt = cnt+1;
    });
    countScore = scoreAmt/cnt;
    countScore = countScore.toFixed(0);
    if(countScore > 74){
        $('.scorepercLS').css({
            'color': 'green'
        });        
    }else if(countScore > 49){
        $('.scorepercLS').css({
            'color': '#FCA311'
        });  
    }else if(countScore > 24){
        $('.scorepercLS').css({
            'color': 'black'
        });  
    }else{
        $('.scorepercLS').css({
            'color': 'red'
        });  
    }
    $('.scorepercLS').html(countScore+'%');
    $('.average_tour_score').val(countScore);
}

$(document).on('click', '.saveAndPublish', function() {
	$('.loader').show();
	var protoTypeId = $('.productNewId').val();	
	$.ajax({
        url: base_url+'/super-user/product-pipeline-share',
        type: 'POST',
        data: {'product_id':protoTypeId},
        success: function(data) {
        	$('.appendModalData').html(data.response);
        	$('#prototypeShareModal').modal('show');
			$('.loader').hide();	
        },
        error: function(e) {
        }
    });
});

$(document).on('click', '.saveShareBtn', function() {
	var collaboratorVal = [];		
	$(".custom_chkbox").each(function() {
		if($(this).prop('checked') == true){
			var thisVal = $(this).attr('data-id');
			collaboratorVal.push(thisVal);
		}
    });
    $('.shareCollaborator').val(collaboratorVal);	
    $('#prototypeShareModal').modal('hide');
    $('.submitBtn').trigger('click');
});

$(document).on('click', '.cloneUrlCls', function() {
    var copyText = document.getElementById("copyUrlCls");
    copyText.select();
    copyText.setSelectionRange(0, 99999)
    document.execCommand("copy");
});

$(document).on('click', '.costCalculatorCls', function() {
	openCostCalculatorModal();
	$('#costCalculatorModal').modal('show');
	calculateTheCostAmt();
});

$(document).on('change blur keyup', '.changeCostCalculatorCls', function() {
	calculateTheCostAmt();
});

function openCostCalculatorModal() {
    var expri1TitleArray = [];
    var expri1CostArray = [];

    var expri2TitleArray = [];
    var expri2CostArray = [];

    var expri3TitleArray = [];
    var expri3CostArray = [];

    var expri5TitleArray = [];
    var expri5CostArray = [];

    $(".repetedContentDiv").each(function() {
		if($(this).attr('data-exid') == '1'){
			var titleCls = $(this).find('.experienceTitleCls').val();
			var costCls = $(this).find('.experienceCostCls').val();
			expri1TitleArray.push(titleCls);
			expri1CostArray.push(costCls);
		}

		if($(this).attr('data-exid') == '2'){
			var titleCls = $(this).find('.experienceTitleCls').val();
			var costCls = $(this).find('.experienceCostCls').val();
			expri2TitleArray.push(titleCls);
			expri2CostArray.push(costCls);
		}

		if($(this).attr('data-exid') == '3'){
			var titleCls = $(this).find('.experienceTitleCls').val();
			var costCls = $(this).find('.experienceCostCls').val();
			expri3TitleArray.push(titleCls);
			expri3CostArray.push(costCls);
		}

		if($(this).attr('data-exid') == '5'){
			var titleCls = $(this).find('.experienceTitleCls').val();
			var costCls = $(this).find('.experienceCostCls').val();
			expri5TitleArray.push(titleCls);
			expri5CostArray.push(costCls);
		}
    });
	
	var htmls1 = '';
	if (expri1TitleArray && expri1TitleArray.length > 0) {
		htmls1 += '<div class="expreSectionCls col-sm-12">\
	                <div class="expSubTitleCls font17Cls">VIP Experience</div>\
		                <div class="expSubTitle2Cls row">';
				    var i;
					for (i = 0; i < expri1TitleArray.length; ++i) {
		                    htmls1 += '<div class="expSubTextLeftCls font17Cls col-sm-8">\
		                        '+expri1TitleArray[i]+'\
		                    </div>\
		                    <div class="expSubTextRightCls col-sm-4">\
		                        <div class="input-group">\
		                            <div class="input-group-prepend">\
		                                <span class="input-group-text">&#163;</span>\
		                            </div>\
		                                <input type="number" class="form-control ccTxtCls amtCostCls changeCostCalculatorCls" value="'+expri1CostArray[i]+'\">\
		                            <div class="input-group-append">\
		                                <span class="input-group-text">pp</span>\
		                            </div>\
                        		</div>\
		                    </div>';
					}
	                htmls1 += '</div>\
	            </div>';
	}

	if (expri2TitleArray && expri2TitleArray.length > 0) {
		htmls1 += '<div class="expreSectionCls col-sm-12">\
	                <div class="expSubTitleCls font17Cls">Big Banner</div>\
		                <div class="expSubTitle2Cls row">';
				    var i;
					for (i = 0; i < expri2TitleArray.length; ++i) {
		                    htmls1 += '<div class="expSubTextLeftCls font17Cls col-sm-8">\
		                        '+expri2TitleArray[i]+'\
		                    </div>\
		                    <div class="expSubTextRightCls col-sm-4">\
		                        <div class="input-group">\
		                            <div class="input-group-prepend">\
		                                <span class="input-group-text">&#163;</span>\
		                            </div>\
		                                <input type="number" class="form-control ccTxtCls amtCostCls changeCostCalculatorCls" value="'+expri2CostArray[i]+'\">\
		                            <div class="input-group-append">\
		                                <span class="input-group-text">pp</span>\
		                            </div>\
                        		</div>\
		                    </div>';
					}
	                htmls1 += '</div>\
	            </div>';
	}

	if (expri3TitleArray && expri3TitleArray.length > 0) {
		htmls1 += '<div class="expreSectionCls col-sm-12">\
	                <div class="expSubTitleCls font17Cls">Local Experience</div>\
		                <div class="expSubTitle2Cls row">';
				    var i;
					for (i = 0; i < expri3TitleArray.length; ++i) {
		                    htmls1 += '<div class="expSubTextLeftCls font17Cls col-sm-8">\
		                        '+expri3TitleArray[i]+'\
		                    </div>\
		                    <div class="expSubTextRightCls col-sm-4">\
		                        <div class="input-group">\
		                            <div class="input-group-prepend">\
		                                <span class="input-group-text">&#163;</span>\
		                            </div>\
		                                <input type="number" class="form-control ccTxtCls amtCostCls changeCostCalculatorCls" value="'+expri3CostArray[i]+'\">\
		                            <div class="input-group-append">\
		                                <span class="input-group-text">pp</span>\
		                            </div>\
                        		</div>\
		                    </div>';
					}
	                htmls1 += '</div>\
	            </div>';
	}

	if (expri5TitleArray && expri5TitleArray.length > 0) {
		htmls1 += '<div class="expreSectionCls col-sm-12">\
	                <div class="expSubTitleCls font17Cls">Local Experience</div>\
		                <div class="expSubTitle2Cls row">';
				    var i;
					for (i = 0; i < expri5TitleArray.length; ++i) {
		                    htmls1 += '<div class="expSubTextLeftCls font17Cls col-sm-8">\
		                        '+expri5TitleArray[i]+'\
		                    </div>\
		                    <div class="expSubTextRightCls col-sm-4">\
		                        <div class="input-group">\
		                            <div class="input-group-prepend">\
		                                <span class="input-group-text">&#163;</span>\
		                            </div>\
		                                <input type="number" class="form-control amtCostCls ccTxtCls changeCostCalculatorCls" value="'+expri5CostArray[i]+'\">\
		                            <div class="input-group-append">\
		                                <span class="input-group-text">pp</span>\
		                            </div>\
                        		</div>\
		                    </div>';
					}
	                htmls1 += '</div>\
	            </div>';
	}

	var totalOf1 = 0;
	for (var i = 0; i < expri1CostArray.length; i++) {
		var totals = expri1CostArray[i];
		totalOf1 = totalOf1 + parseFloat(totals);
	}
	var totalOf2 = 0;
	for (var i = 0; i < expri2CostArray.length; i++) {
		var totals = expri2CostArray[i];
		totalOf2 = totalOf2 + parseFloat(totals);
	}
	var totalOf3 = 0;
	for (var i = 0; i < expri3CostArray.length; i++) {
		var totals = expri3CostArray[i];
		totalOf3 = totalOf3 + parseFloat(totals);
	}
	var totalOf5 = 0;
	for (var i = 0; i < expri5CostArray.length; i++) {
		var totals = expri5CostArray[i];
		totalOf5 = totalOf5 + parseFloat(totals);
	}
	var finalTotal = 0;
	finalTotal = totalOf1+totalOf2+totalOf3+totalOf5; 

	var finalTourPricePp = 0;
	var profitMarginPp = 0;
	var profitMarginBasedOn = $('.profitMarginBasedOnCls').val();
	var totalCostBased = $('.totalCostBased').val();
	var profitMarginBasedAmt = 0;
	var totalCostBasedAmt = 0;

	
	var tourMargin = $('.tourMarginCls').val();

	profitMarginPp = finalTotal*tourMargin/100;

	finalTourPricePp = finalTotal+profitMarginPp;
	
	profitMarginBasedAmt = profitMarginBasedOn*profitMarginPp;
	totalCostBasedAmt = totalCostBased*finalTotal;

	$('.fianlSumCls').html('&#163;'+finalTotal+'pp');
	$('.fianlTxtSumCls').val(finalTotal);
	
	$('.profitMarginPpCls').html('&#163;'+profitMarginPp+'pp');
	$('.finalTourPricePpCls').html('&#163;'+finalTourPricePp+'pp');

	$('.profitMarginBasedAmtCls').html('&#163;'+profitMarginBasedAmt+'pp');
	$('.totalCostBasedAmtCls').html('&#163;'+totalCostBasedAmt+'pp');
	
	$('.total_profit_margin').val(profitMarginBasedAmt);
	$('.total_cost').val(totalCostBasedAmt);

	$('.appendExpreCls').html(htmls1);
}

function calculateTheCostAmt() {
	var finalTotal = 0;
	$(".amtCostCls").each(function() {
		var totals = $(this).val();
		finalTotal = finalTotal + parseFloat(totals);
	});	
	console.log(finalTotal);

	var finalTourPricePp = 0;
	var profitMarginPp = 0;
	var profitMarginBasedOn = $('.profitMarginBasedOnCls').val();
	var totalCostBased = $('.totalCostBased').val();
	var profitMarginBasedAmt = 0;
	var totalCostBasedAmt = 0;

	
	var tourMargin = $('.tourMarginCls').val();

	profitMarginPp = finalTotal*tourMargin/100;

	finalTourPricePp = finalTotal+profitMarginPp;
	
	profitMarginBasedAmt = profitMarginBasedOn*profitMarginPp;
	totalCostBasedAmt = totalCostBased*finalTotal;

	profitMarginPp = parseFloat(profitMarginPp).toFixed(2);
	finalTourPricePp = parseFloat(finalTourPricePp).toFixed(2);
	profitMarginBasedAmt = parseFloat(profitMarginBasedAmt).toFixed(2);
	totalCostBasedAmt = parseFloat(totalCostBasedAmt).toFixed(2);

	$('.fianlSumCls').html('&#163;'+finalTotal+'pp');
	$('.fianlTxtSumCls').val(finalTotal);
	
	$('.profitMarginPpCls').html('&#163;'+profitMarginPp+'pp');
	$('.finalTourPricePpCls').html('&#163;'+finalTourPricePp+'pp');

	$('.profitMarginBasedAmtCls').html('&#163;'+profitMarginBasedAmt+'pp');
	$('.totalCostBasedAmtCls').html('&#163;'+totalCostBasedAmt+'pp');

	$('.total_profit_margin').val(profitMarginBasedAmt);
	$('.total_cost').val(totalCostBasedAmt);
}

$(document).on('change blur keyup', '.experienceCostCls', function() {
	openCostCalculatorModal();
	calculateTheCostAmt();
});

$(document).on('change', '.prototypeFolderCls', function() {
	var ids = $(this).val();
	var option = $('option:selected', this).attr('data-id');

	$('.country_area_id').val('');
	$('.country_area_id optgroup').prop('disabled', true);
	$('.country_area_id optgroup').hide();
	$('.country_area_id optgroup#country'+option).show();
	$('.country_area_id optgroup#country'+option).prop('disabled', false);
});

$(document).on('click', '.removeAddAmebtn', function() {
    var thisVal = $(this).attr('data-id');
    $(this).closest('.ameDiv_'+thisVal).remove();
});