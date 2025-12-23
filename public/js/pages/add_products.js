$(document).ready(function(){
	setTimeout(function(){
		var mode = $('.mode').val();
		if(mode != 'Edit'){
			$('.addSectionCls').val('1');
			$('.addSectionBtnCls').trigger('click');
		}else{
			checkedSectionExist();
			validationRulesSetForVipExperience();
			$('.prototypeFolderCls').trigger('change');
		}
			$('.experienceCostCls').trigger('change');
			squareFunctionLoad();
	}, 500);
	$('#addProductForm').validate(addProductValidateOpt);
	$('#example-square').barrating('show', {
        theme: 'bars-square',
        showValues: true,
        showSelectedRating: true
    });
});

$(document).on('click', '.addmorelnk', function() {
	var thisMode = $(this).attr('data-mode');
	var thisVal = $(this).attr('data-id');
	var thisNo = $(this).attr('data-no');
	console.log(thisNo);
	thisNo = parseInt(thisNo, 10);
	// console.log(thisNo);
	thisVal = parseInt(thisVal, 10);
	// console.log(thisNo+1);
	// $(this).attr('data-no', thisNo+1);
	var htmls = '';
	var sectionInclusions = $('.section_inclusions_'+thisVal+'_'+thisNo).val();
	sectionInclusions = parseInt(sectionInclusions);
	sectionInclusions = sectionInclusions+1;
	var htmlId = 'inclusions_'+thisVal+'_'+thisNo+'_'+sectionInclusions;
	if(thisMode == 'edit'){
		$InvName = 'section_edit['+thisVal+']['+thisNo+'][inclusions_add]['+sectionInclusions+']';
	}else{
		$InvName = 'section['+thisVal+']['+thisNo+'][inclusions]['+sectionInclusions+']';
	}
	// htmls += '<input class="form-control" name="section['+thisVal+'][inclusions]['+sectionInclusions+']" type="text" id="'+htmlId+'" value="" >';

	htmls += '<div class="row ameDiv_1_'+sectionInclusions+'">\
                <div class="col-sm-10">\
                    <input class="form-control" name="'+$InvName+'" type="text" id="'+htmlId+'" value="" required="" data-msg-required="Please provide inclusions">\
                </div>\
                <div class="col-sm-2">\
                    <a href="javascript:;" class="nhSubCloseCls removeAddAmebtn" data-id="1_'+sectionInclusions+'" >x</a>\
                </div>\
            </div>';
	
	$('.section_inclusions_'+thisVal+'_'+thisNo).val(sectionInclusions);
	$('.customFullControlInclusionsCls'+thisVal+'-'+thisNo).append(htmls);
	$('#'+htmlId).trigger('blur');
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
	if($(".contentDivasda").find(".inputTitle").hasClass("ele_hide")){
        $(".contentDivasda").find(".inputTitle").removeClass("ele_hide");
        $(".proNameCls").hide();
    }else{
        $(".contentDivasda").find(".inputTitle").addClass("ele_hide");
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
	var vipCnt = parseInt($('.vipCnt').val(), 10);
	$('.vipCnt').val(vipCnt+1);
	var htmls = '';
	htmls += '<div class="repetedContentDiv rCD1_'+vipCnt+'" data-exid="1" data-id="1">\
	                <div class="fl_w main_title">\
	                	<h2>VIP Experience</a></h2>\
                	</div>\
	                <div class="white_part">\
	                    <div class="closeIconDiv">\
	                        <a class="closePartIcon" data-id="1_'+vipCnt+'" da href="javascript:;"><i class="fas fa-times"></i></a>\
	                    </div>\
	                    <div class="part_one">\
	                        <div class="form-group">\
	                            <div class="custom_control">\
	                                <label>Big Banner Experience</label>\
	                                <input class="form-control experienceTitleCls" name="section[1]['+vipCnt+'][title]" type="text" id="section_1_'+vipCnt+'_title" value="" maxlength="255" placeholder="Jaguar Land Rover"  required="" data-msg-required="Please provide title">\
	                            </div>\
	                            <div class="custom_control costcontrol">\
	                                <label>Cost</label>\
	                                <input class="form-control experienceCostCls" name="section[1]['+vipCnt+'][cost]" type="number" value="" placeholder="&#163;50pp" id="section_1_'+vipCnt+'_cost"  required="" data-msg-required="Please provide cost">\
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
	                                <select id="example-square-1-'+vipCnt+'" class="exampleSquareCls" name="section[1]['+vipCnt+'][score]" autocomplete="off">\
				                      <option value=""></option>\
				                      <option value="1" selected>1</option>\
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
	                                <textarea rows="4" name="section[1]['+vipCnt+'][story]" id="section_1_'+vipCnt+'_story"  required="" data-msg-required="Please provide story"></textarea>\
	                            </div>\
	                        </div>\
	                    </div>\
	                    <div class="fl_w comman part_five">\
	                        <div class="form-group">\
	                            <div class="custom_full_control">\
	                                <label>Experience</label>\
	                                <textarea rows="4" name="section[1]['+vipCnt+'][experience]" id="section_1_'+vipCnt+'_experience"  required="" data-msg-required="Please provide experience"></textarea>\
	                            </div>\
	                        </div>\
	                    </div>\
	                    <div class="fl_w comman part_six">\
	                    <input class="form-control section_inclusions_1_'+vipCnt+'" name="section_inclusions_1_'+vipCnt+'" type="hidden" value="1">\
	                        <div class="form-group">\
	                            <div class="custom_full_control">\
	                                <label>Inclusions</label>\
		                            <div class="customFullControlInclusionsCls1-'+vipCnt+' cFCInclusionsCls">\
		                                <div class="row ameDiv_1111">\
							                <div class="col-sm-10">\
				                                <input class="form-control" name="section[1]['+vipCnt+'][inclusions][1]" type="text"  value="" id="inclusions_1_'+vipCnt+'_1"  required="" data-msg-required="Please provide inclusions">\
							                </div>\
							                <div class="col-sm-2">\
							                    <a href="javascript:;" class="nhSubCloseCls removeAddAmebtn" data-id="1111" >x</a>\
							                </div>\
							            </div>\
		                            </div>\
	                                <a href="javascript:;" class="addmorelnk" data-mode="add" data-id="1" data-no="'+vipCnt+'">Add More</a>\
	                            </div>\
	                        </div>\
	                    </div>\
	                    <div class="fl_w comman part_six">\
	                        <div class="form-group">\
	                            <div class="custom_full_control">\
	                                <label>Gallery</label>\
	                                <div class="imageGalllerAppend_111'+vipCnt+'"></div>\
	                                <div class="brw_bx image_galller">\
	                                    <div class="browse_btn">\
	                                        <input type="file" class="filesCls" name="section[1]['+vipCnt+'][images][]" multiple accept="image/*" data-id="111'+vipCnt+'"  required="" data-msg-required="Please provide images">\
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
	squareFunctionLoad();
	/*$('#example-square-1').barrating('show', {
        theme: 'bars-square',
        showValues: true,
        showSelectedRating: true
    });*/
}

function addSectionForBigBanner(){
	var bbCnt = parseInt($('.bbCnt').val(), 10);
	$('.bbCnt').val(bbCnt+1);
	var htmls = '';
	htmls += '<div class="repetedContentDiv rCD2_'+bbCnt+'" data-exid="2" data-id="2">\
                            <div class="fl_w main_title"><h2>Big Banner</h2></div>\
                            <div class="white_part">\
                                <div class="closeIconDiv">\
                                    <a class="closePartIcon" data-id="2_'+bbCnt+'" href="javascript:;"><i class="fas fa-times"></i></a>\
                                </div>\
                                <div class="part_one">\
                                    <div class="form-group">\
                                        <div class="custom_control">\
                                            <label>Big Banner Experience</label>\
                                            <input class="form-control experienceTitleCls" name="section[2]['+bbCnt+'][title]" type="text" value="" maxlength="255" id="section_2_'+bbCnt+'_title" placeholder="Jaguar Land Rover" required="" data-msg-required="Please provide title">\
                                        </div>\
                                        <div class="custom_control costcontrol">\
                                            <label>Cost</label>\
                                            <input class="form-control experienceCostCls" name="section[2]['+bbCnt+'][cost]" type="number" id="section_2_'+bbCnt+'_cost" value="" placeholder="&#163;50pp" required="" data-msg-required="Please provide cost">\
                                        </div>\
                                    </div>\
                                </div>\
                                <div class="part_two">\
                                    <div class="form-group">\
                                        <div class="custom_control pullright textright">\
                                            <label>Score</label>\
                                            <span class="scoreperc" name="section[2]['+bbCnt+'][score]" id="section_2_'+bbCnt+'_score">0%</span>\
                                        </div>\
                                    </div>\
                                </div>\
                                <div class="fl_w comman part_three">\
                                    <div class="form-group">\
                                        <div class="custom_control">\
                                            <label>Mobility Level</label>\
                                            <div class="boxes">\
                                                <select id="example-square-2-'+bbCnt+'" class="exampleSquareCls" name="section[2]['+bbCnt+'][score]" autocomplete="off">\
							                      <option value=""></option>\
							                      <option value="1" selected>1</option>\
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
                                            <textarea rows="4" name="section[2]['+bbCnt+'][story]" id="section_2_'+bbCnt+'_story" required="" data-msg-required="Please provide story"></textarea>\
                                        </div>\
                                    </div>\
                                </div>\
                                <div class="fl_w comman part_five">\
                                    <div class="form-group">\
                                        <div class="custom_full_control">\
                                            <label>Experience</label>\
                                            <textarea rows="4" id="section_2_'+bbCnt+'_experience" name="section[2]['+bbCnt+'][experience]" required="" data-msg-required="Please provide experience"></textarea>\
                                        </div>\
                                    </div>\
                                </div>\
                                <div class="fl_w comman part_six">\
                                <input class="form-control section_inclusions_2_'+bbCnt+'" name="section_inclusions_2_'+bbCnt+'" type="hidden" value="1">\
                                    <div class="form-group">\
                                        <div class="custom_full_control">\
                                            <label>Inclusions</label>\
                                            <div class="customFullControlInclusionsCls2-'+bbCnt+' cFCInclusionsCls">\
				                                <div class="row ameDiv_2222">\
									                <div class="col-sm-10">\
						                                <input class="form-control" name="section[2]['+bbCnt+'][inclusions][1]" type="text"  value="" id="inclusions_2_'+bbCnt+'_1" required="" data-msg-required="Please provide inclusions">\
									                </div>\
									                <div class="col-sm-2">\
									                    <a href="javascript:;" class="nhSubCloseCls removeAddAmebtn" data-id="2222" >x</a>\
									                </div>\
									            </div>\
				                            </div>\
			                                <a href="javascript:;" class="addmorelnk" data-mode="add" data-id="2" data-no="'+bbCnt+'">Add More</a>\
                                        </div>\
                                    </div>\
                                </div>\
                                <div class="fl_w comman part_six">\
                                    <div class="form-group">\
                                        <div class="custom_full_control">\
                                            <label>Gallery</label>\
                                            <div class="imageGalllerAppend_222'+bbCnt+'"></div>\
	                                            <div class="brw_bx image_galller">\
	                                                <div class="browse_btn">\
	                                                    <input type="file" name="section[2]['+bbCnt+'][images][]" class="filesCls" multiple accept="image/*" data-id="222'+bbCnt+'" required="" data-msg-required="Please provide images">\
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
	squareFunctionLoad();
	/*$('#example-square-2').barrating('show', {
        theme: 'bars-square',
        showValues: true,
        showSelectedRating: true
    });*/
}

function addSectionForLocalExperience(){
	var localCnt = parseInt($('.localCnt').val(), 10);
	$('.localCnt').val(localCnt+1);
	var htmls = '';
	htmls += '<div class="repetedContentDiv rCD3_'+localCnt+'" data-exid="3" data-id="3">\
                            <div class="fl_w main_title"><h2>Local Experience</h2></div>\
                            <div class="white_part">\
                                <div class="closeIconDiv">\
                                    <a class="closePartIcon" data-id="3_'+localCnt+'" href="javascript:;"><i class="fas fa-times"></i></a>\
                                </div>\
                                <div class="part_one">\
                                    <div class="form-group">\
                                        <div class="custom_control">\
                                            <label>Local Experience</label>\
                                            <input class="form-control experienceTitleCls" name="section[3]['+localCnt+'][title]" type="text" id="section_3_'+localCnt+'_title" value="" maxlength="255" placeholder="Jaguar Land Rover" required="" data-msg-required="Please provide title">\
                                        </div>\
                                        <div class="custom_control costcontrol">\
                                            <label>Cost</label>\
                                            <input class="form-control experienceCostCls" name="section[3]['+localCnt+'][cost]" type="number" id="section_3_'+localCnt+'_cost" value="" placeholder="&#163;50pp" required="" data-msg-required="Please provide cost">\
                                        </div>\
                                    </div>\
                                </div>\
                                <div class="part_two">\
                                    <div class="form-group">\
                                        <div class="custom_control pullright textright">\
                                            <label>Score</label>\
                                            <span class="scoreperc" name="section[3]['+localCnt+'][score]" id="section_3_'+localCnt+'_score" >0%</span>\
                                        </div>\
                                    </div>\
                                </div>\
                                <div class="fl_w comman part_three">\
                                    <div class="form-group">\
                                        <div class="custom_control">\
                                            <label>Mobility Level</label>\
                                            <div class="boxes">\
                                                <select id="example-square-3-'+localCnt+'" class="exampleSquareCls" name="section[3]['+localCnt+'][score]" autocomplete="off" required="" data-msg-required="Please provide score">\
								                      <option value=""></option>\
								                      <option value="1" seletcted>1</option>\
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
                                            <textarea rows="4" name="section[3]['+localCnt+'][story]" id="section_3_'+localCnt+'_story" required="" data-msg-required="Please provide store"></textarea>\
                                        </div>\
                                    </div>\
                                </div>\
                                <div class="fl_w comman part_five">\
                                    <div class="form-group">\
                                        <div class="custom_full_control">\
                                            <label>Experience</label>\
                                            <textarea rows="4" name="section[3]['+localCnt+'][experience]" id="section_3_'+localCnt+'_experience"  required="" data-msg-required="Please provide experience"></textarea>\
                                        </div>\
                                    </div>\
                                </div>\
                                <div class="fl_w comman part_six">\
                                <input class="form-control section_inclusions_3_'+localCnt+'" name="section_inclusions_3_'+localCnt+'" type="hidden" value="1">\
                                    <div class="form-group">\
                                        <div class="custom_full_control">\
                                            <label>Inclusions</label>\
                                            <div class="customFullControlInclusionsCls3-'+localCnt+' cFCInclusionsCls">\
				                                <div class="row ameDiv_3333'+localCnt+'">\
									                <div class="col-sm-10">\
						                                <input class="form-control" name="section[3]['+localCnt+'][inclusions][1]" type="text" value="" id="inclusions_3_1_'+localCnt+'" required="" data-msg-required="Please provide inclusions">\
									                </div>\
									                <div class="col-sm-2">\
									                    <a href="javascript:;" class="nhSubCloseCls removeAddAmebtn" data-id="3333'+localCnt+'" >x</a>\
									                </div>\
									            </div>\
				                            </div>\
			                                <a href="javascript:;" class="addmorelnk" data-mode="add" data-id="3" data-no="'+localCnt+'">Add More</a>\
                                        </div>\
                                    </div>\
                                </div>\
                                <div class="fl_w comman part_six">\
                                    <div class="form-group">\
                                        <div class="custom_full_control">\
                                            <label>Gallery</label>\
                                            <div class="imageGalllerAppend_333'+localCnt+'"></div>\
                                            <div class="brw_bx image_galller">\
                                                <div class="browse_btn">\
                                                    <input type="file" name="section[3]['+localCnt+'][images][]" class="filesCls" data-id="333'+localCnt+'" multiple accept="image/*" required="" data-msg-required="Please provide images">\
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
	squareFunctionLoad();
	/*$('#example-square-3').barrating('show', {
        theme: 'bars-square',
        showValues: true,
        showSelectedRating: true
    });*/
}

function addSectionForMap(){
	var mapCnt = parseInt($('.mapCnt').val(), 10);
	$('.mapCnt').val(mapCnt+1);
	var htmls = '';
	htmls += '<div class="repetedContentDiv rCD4_'+mapCnt+'" data-exid="4" data-id="4">\
		        <div class="fl_w main_title">\
		            <h2>Map Visualization</h2>\
		        </div>\
		        <div class="white_part">\
		            <div class="closeIconDiv">\
		                <a class="closePartIcon" data-id="4_'+mapCnt+'" href="javascript:;"><i class="fas fa-times"></i></a>\
		            </div>\
		            <div class="fl_w comman part_six">\
		                <div class="form-group">\
		                    <div class="custom_full_control">\
		                        <label>Map URL</label>\
		                        <input class="form-control" name="section[4]['+mapCnt+'][title]" type="text" id="section_4_'+mapCnt+'_title" value="" required="" data-msg-required="Please provide Map URL">\
		                    </div>\
		                </div>\
		            </div>\
		        </div>\
		    </div>';
	$('.appendSectionDiv').append(htmls);
}

function addSectionForHotel(){
	var hotelCnt = parseInt($('.hotelCnt').val(), 10);
	$('.hotelCnt').val(hotelCnt+1);
	var htmls = '';
	htmls += '<div class="repetedContentDiv rCD5_'+hotelCnt+'" data-exid="5" data-id="5">\
                <div class="fl_w main_title"><h2>Hotel</h2></div>\
                <div class="white_part">\
                    <div class="closeIconDiv">\
                        <a class="closePartIcon" data-id="5_'+hotelCnt+'" href="javascript:;"><i class="fas fa-times"></i></a>\
                    </div>\
                    <div class="part_one">\
                        <div class="form-group">\
                            <div class="custom_control">\
                                <label>Hotel Name</label>\
                                <input class="form-control experienceTitleCls searchHotelCls" name="section[5]['+hotelCnt+'][title]" type="text" id="section_5_title_'+hotelCnt+'" value="" maxlength="255" placeholder="Jaguar Land Rover" required="" data-msg-required="Please provide title" data-id="'+hotelCnt+'">\
                            </div>\
                            <div class="custom_control costcontrol">\
                                <label>Cost</label>\
                                <input class="form-control experienceCostCls" name="section[5]['+hotelCnt+'][cost]" type="number" id="section_5_cost_'+hotelCnt+'" value="" placeholder="&#163;50pp" required="" data-msg-required="Please provide cost">\
                            </div>\
                            <div class="custom_control costcontrol">\
                                <label>Nights</label>\
                                <input class="form-control" name="section[5]['+hotelCnt+'][night]" type="text" id="section_5_night_'+hotelCnt+'" value="" placeholder="4" required="" data-msg-required="Please provide nights">\
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
                                <select id="example-square-5-'+hotelCnt+'" class="exampleSquareCls" name="section[5]['+hotelCnt+'][score]" autocomplete="off" required="" data-msg-required="Please provide rating">\
			                      <option value=""></option>\
			                      <option value="1" selected>1</option>\
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
                                <textarea rows="4" name="section[5]['+hotelCnt+'][story]" id="section_5_story_'+hotelCnt+'" required="" data-msg-required="Please provide Description"></textarea>\
                            </div>\
                        </div>\
                    </div>\
                    <div class="fl_w comman part_six">\
                    <input class="form-control section_inclusions_5_'+hotelCnt+'" name="section_inclusions_5_'+hotelCnt+'" type="hidden" value="1">\
                        <div class="form-group">\
                            <div class="custom_full_control">\
                                <label>Amenities</label>\
                                <div class="customFullControlInclusionsCls5-'+hotelCnt+' cFCInclusionsCls">\
	                                <div class="row ameDiv_5555'+hotelCnt+'">\
						                <div class="col-sm-10">\
			                                <input class="form-control" name="section[5]['+hotelCnt+'][inclusions][1]" type="text"  value="" id="inclusions_5_1_'+hotelCnt+'" required="" data-msg-required="Please provide Amenities">\
						                </div>\
						                <div class="col-sm-2">\
						                    <a href="javascript:;" class="nhSubCloseCls removeAddAmebtn" data-id="5555'+hotelCnt+'" >x</a>\
						                </div>\
						            </div>\
	                            </div>\
                                <a href="javascript:;" class="addmorelnk" data-mode="add" data-id="5" data-no="'+hotelCnt+'">Add More</a>\
                            </div>\
                        </div>\
                    </div>\
                    <div class="fl_w comman part_six">\
                        <div class="form-group">\
                            <div class="custom_full_control">\
                                <label>Gallery</label>\
                                <div class="imageGalllerAppend"></div>\
                                <div class="imageGalllerAppend_555'+hotelCnt+'"></div>\
                                <div class="brw_bx image_galller">\
                                    <div class="browse_btn">\
                                        <input type="file" name="section[5]['+hotelCnt+'][images][]" class="filesCls" data-id="555'+hotelCnt+'" multiple accept="image/*" required="" data-msg-required="Please provide image">\
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
    hotelSearchfunction();
    squareFunctionLoad();
}

function squareFunctionLoad(){
	$('.exampleSquareCls').barrating('show', {
        theme: 'bars-square',
        showValues: true,
        showSelectedRating: true
    });
}

function checkedSectionExist(){
	// $(".addSectionCls option[value='1']").attr("disabled",false);
	// $(".addSectionCls option[value='2']").attr("disabled",false);
	// $(".addSectionCls option[value='3']").attr("disabled",false);
	// $(".addSectionCls option[value='4']").attr("disabled",false);
	// $(".addSectionCls option[value='5']").attr("disabled",false);

		$('.sidebarPartTwoCls_1').removeClass('active');
		$('.sidebarPartTwoCls_2').removeClass('active');
		$('.sidebarPartTwoCls_3').removeClass('active');
		$('.sidebarPartTwoCls_4').removeClass('active');
		$('.sidebarPartTwoCls_5').removeClass('active');
	$(".repetedContentDiv").each(function() {
		var secId = $(this).attr('data-id');
		$('.sidebarPartTwoCls_'+secId).addClass('active');
		// $(".addSectionCls option[value='"+ secId + "']").attr("disabled",true);
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
            required: "please provide company addresssad as",
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

$(document).on('click', '.saveAndPublish', function() {
	$('.loader').show();
	var protoTypeId = $('.proID').val();	
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
	console.log('finalTotal - '+finalTotal);
	});	
	

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

$(document).on('click', '.removeLinkCls', function() {
    $('#removeProductModal').modal('show');
});

$(document).on('change', '.prototypeFolderCls', function() {
	var ids = $(this).val();
	var option = $('option:selected', this).attr('data-id');

	// $('.country_area_id').val('');
	$('.country_area_id optgroup').prop('disabled', true);
	$('.country_area_id optgroup').hide();
	$('.country_area_id optgroup#country'+option).show();
	$('.country_area_id optgroup#country'+option).prop('disabled', false);
});

$(document).on('click', '.removeAddAmebtn', function() {
    var thisVal = $(this).attr('data-id');
    $('.ameDiv_'+thisVal).remove();
});

$(document).on('click', '.removeAmebtn', function() {
    var thisVal = $(this).attr('data-id');
    var thisTypeVal = $(this).attr('data-type');
    $('.amenitiesId').val(thisVal);
    $('.amenitiesTypeId').val(thisTypeVal);
    $('#productAmenitiesModal').modal('show');
});

$(document).on('click', '.removeAmenitiesBtn', function() {
    var amenitiesId = $('.amenitiesId').val();
    var amenitiesTypeId = $('.amenitiesTypeId').val();
    $('.loader').show();    
    $.ajax({
        url: base_url+'/super-user/products-inclusions-remove',
        type: 'POST',
        data: {'id':amenitiesId},
        success: function(data) {
            $('.ameEditDiv_'+amenitiesTypeId+'_'+amenitiesId).remove();
            $('#productAmenitiesModal').modal('hide');
            toastSuccess('Inclusion deleted successfully.');
            $('.loader').hide();   
        },
        error: function(e) {
        }
    });
});

function hotelSearchfunction(){
    $(".searchHotelCls" ).autocomplete({
      source: function( request, response ) {
        $.ajax({
          url : base_url+'/super-user/products-hotel-search',
          dataType: "json",
          data: {
            search: request.term,
            type: 'country'
          },
          success: function( data ) {
            /*if(!data.length){
            	console.log('length - length');
                var result = [
                  {
                    label: 'No matches found',
                    value: response.term,
                    id: 0
                  }
               ];
                 response(result);
          	}else{*/
                response( $.map( data, function( item ) {
                  return {
                    id: item.id,
                    value: item.name,
                    cost: item.cost,
                    about: item.about,
                    star_rating: item.star_rating,
                    get_product_hotel_amenities: item.get_product_hotel_amenities,
                    get_product_hotel_images: item.get_product_hotel_images,
                  }
                }));
          	// }
          }
        });
      },
      change: function (event, ui) {
        if (ui.item == null || ui.item == undefined) {
          console.log('change - If');
        } else {
        }
      },
      autoFocus: true,
      minLength: 1,
      select: function (event, ui) {
	      	var rowCnt = $(this).attr('data-id');
	      	console.log('--- '+$(this).attr('data-id'));
			$(this).val(ui.item.value);
			$('#section_5_cost_'+rowCnt).val(ui.item.cost);
			$('#section_5_story_'+rowCnt).val(ui.item.about);
			$('#example-square-5-'+rowCnt).val(ui.item.star_rating);
			$('#example-square-5-'+rowCnt).trigger('change');
			$('#example-square-5-'+rowCnt).barrating('set', ui.item.star_rating);
			var get_product_hotel_amenities = ui.item.get_product_hotel_amenities;
			var i;
          	var htmls = '';
			for (i = 0; i < get_product_hotel_amenities.length; ++i) {
          		var amId = get_product_hotel_amenities[i]['id'];
          		var amName = get_product_hotel_amenities[i]['name'];
          		var htmlId = 'inclusions_5_'+amId;
				htmls += '<div class="row ameDiv_5_'+amId+'_'+rowCnt+'">\
				    <div class="col-sm-10">\
				        <input class="form-control" name="section[5]['+rowCnt+'][inclusions]['+amId+']" type="text" id="'+htmlId+'" value="'+amName+'" >\
				    </div>\
				    <div class="col-sm-2">\
				        <a href="javascript:;" class="nhSubCloseCls removeAddAmebtn" data-id="5_'+amId+'" >x</a>\
				    </div>\
				</div>';
			}
			$('.customFullControlInclusionsCls5-'+rowCnt).html('');
			$('.customFullControlInclusionsCls5-'+rowCnt).html(htmls);

			var i;
          	var htmls = '';
          	var get_product_hotel_images = ui.item.get_product_hotel_images;

          	var cntImg = 120;
			for (i = 0; i < get_product_hotel_images.length; ++i) {
          		var amId = get_product_hotel_images[i]['id'];
          		var amName = get_product_hotel_images[i]['name'];
          		var htmlId = 'inclusions_5_'+amId;
				htmls += '<div class="image_galller">\
                            <img src="'+base_url+'/storage/product_image/'+amName+'">\
                            <input name="section[5]['+rowCnt+'][hotel_images]['+amId+']" type="hidden" value="'+amName+'">\
                        </div>';
                cntImg++;
			}
			$('.imageGalllerAppend').html(htmls);
          return false;
      },
    });
}
$(document).on('change', '.filesCls', function(e) {
    var selectId = $(this).attr('data-id');
    var files = e.target.files,
        filesLength = files.length;
    $(".imageGalllerAppend_"+selectId).html('');
    // console.log(".imageGalllerAppend_"+selectId);
    for (var i = 0; i < filesLength; i++) {
        var f = files[i]
        var fileReader = new FileReader();
        fileReader.onload = (function(e) {
            var file = e.target;
            // $("<div class='image_galller'>" +
            //     "<img src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
            //     "</div>").insertAfter(".imageGalllerAppend_"+selectId);
            $(".imageGalllerAppend_"+selectId).append("<div class='image_galller'>" +
                "<img src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
                "</div>");
        });
        fileReader.readAsDataURL(f);
    }
});