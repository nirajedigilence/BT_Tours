<style type="text/css">
    label {
         text-transform: unset; 
    }
    .highlight {
        width: 200px;
        height: 120px;
        border: 3px dashed #ddd;
        margin: 0 10px;
    }
    .database_edit_container .main .column .print_gallery .gallery .gallery__item:nth-child(n+4) {
        margin: 0 10px;
        margin-bottom: 10px;
    }
    .database_edit_container .main .column .print_gallery .gallery .gallery__item {
        margin-bottom: 10px;
    }
    .nav{padding-left:0;margin-bottom:0;list-style:none}.nav>li{position:relative;display:block}.nav>li>a{position:relative;display:block;padding:10px 15px}.nav>li>a:focus,.nav>li>a:hover{text-decoration:none;background-color:#eee}.nav>li.disabled>a{color:#777}.nav>li.disabled>a:focus,.nav>li.disabled>a:hover{color:#777;text-decoration:none;cursor:not-allowed;background-color:transparent}.nav .open>a,.nav .open>a:focus,.nav .open>a:hover{background-color:#eee;border-color:#337ab7}.nav .nav-divider{height:1px;margin:9px 0;overflow:hidden;background-color:#e5e5e5}.nav>li>a>img{max-width:none}.nav-tabs{border-bottom:1px solid #ddd}.nav-tabs>li{float:left;margin-bottom:-1px}.nav-tabs>li>a{margin-right:2px;line-height:1.42857143;border:1px solid transparent;border-radius:4px 4px 0 0}.nav-tabs>li>a:hover{border-color:#eee #eee #ddd}.nav-tabs>li.active>a,.nav-tabs>li.active>a:focus,.nav-tabs>li.active>a:hover{color:#555;cursor:default;background-color:#fff;border:1px solid #ddd;border-bottom-color:transparent}.nav-tabs.nav-justified{width:100%;border-bottom:0}.nav-tabs.nav-justified>li{float:none}.nav-tabs.nav-justified>li>a{margin-bottom:5px;text-align:center}.nav-tabs.nav-justified>.dropdown .dropdown-menu{top:auto;left:auto}@media (min-width:768px){.nav-tabs.nav-justified>li{display:table-cell;width:1%}.nav-tabs.nav-justified>li>a{margin-bottom:0}}.nav-tabs.nav-justified>li>a{margin-right:0;border-radius:4px}.nav-tabs.nav-justified>.active>a,.nav-tabs.nav-justified>.active>a:focus,.nav-tabs.nav-justified>.active>a:hover{border:1px solid #ddd}@media (min-width:768px){.nav-tabs.nav-justified>li>a{border-bottom:1px solid #ddd;border-radius:4px 4px 0 0}.nav-tabs.nav-justified>.active>a,.nav-tabs.nav-justified>.active>a:focus,.nav-tabs.nav-justified>.active>a:hover{border-bottom-color:#fff}}.nav-pills>li{float:left}.nav-pills>li>a{border-radius:4px}.nav-pills>li+li{margin-left:2px}.nav-pills>li.active>a,.nav-pills>li.active>a:focus,.nav-pills>li.active>a:hover{color:#fff;background-color:#337ab7}.nav-stacked>li{float:none}.nav-stacked>li+li{margin-top:2px;margin-left:0}.nav-justified{width:100%}.nav-justified>li{float:none}.nav-justified>li>a{margin-bottom:5px;text-align:center}.nav-justified>.dropdown .dropdown-menu{top:auto;left:auto}@media (min-width:768px){.nav-justified>li{display:table-cell;width:1%}.nav-justified>li>a{margin-bottom:0}}.nav-tabs-justified{border-bottom:0}.nav-tabs-justified>li>a{margin-right:0;border-radius:4px}.nav-tabs-justified>.active>a,.nav-tabs-justified>.active>a:focus,.nav-tabs-justified>.active>a:hover{border:1px solid #ddd}@media (min-width:768px){.nav-tabs-justified>li>a{border-bottom:1px solid #ddd;border-radius:4px 4px 0 0}.nav-tabs-justified>.active>a,.nav-tabs-justified>.active>a:focus,.nav-tabs-justified>.active>a:hover{border-bottom-color:#fff}}.tab-content>.tab-pane{display:none}.tab-content>.active{display:block}.nav-tabs .dropdown-menu{margin-top:-1px;border-top-left-radius:0;border-top-right-radius:0}
    .nav-tabs > li > a.active{
        color: #555;
        cursor: default;
        background-color: #fff;
        border: 1px solid #ddd;
        border-bottom-color: transparent;
    }
    .nav-tabs > li > a {
        font-size: 16px;
        font-weight: 600;
        color: #000;
    }
</style>
<div class="popup_content">
    <a id="closePopup" href="javascript:;" style="float: right;color: red;font-size: 25px;">
        <i class="fas fa-times"></i>
    </a>
    <div class="heading">
        {{isset($experience->name) ? $experience->name : 'Add New Experience'}}
    </div>

    <div class="description">
        <?php if(isset($experience)){ ?>
            Here you can edit the database information about this experience
        <?php }else{ ?>
            Here you can add the database information about this experience
        <?php } ?>
    </div>
    <form id="expData">
        <div class="sections" style="display: inline-block;margin: 0px;">
            <ul class="nav nav-tabs">
              <li><a class="active" data-toggle="tab" href="#tab1">General Information</a></li>
              <!-- <li><a data-toggle="tab" href="#tab2">Contracting Information</a></li> -->
              <li><a data-toggle="tab" href="#tab3">Experience Voucher Information</a></li>
             <!--  <li><a data-toggle="tab" href="#tab3">Experience Confirmation Template</a></li> -->
            </ul>

            <div class="tab-content" style="border: 1px solid #ddd;display: inline-block;border-top: 0px;width: 100%;padding-top: 10px;">
              <div id="tab1" class="tab-pane active">
                
                <div class="section w_100" style="height:100%;float: left;">

                    <div class="sub_heading">
                        Product pipeline (EPS) information
                    </div>

                    <div class="form">
                        <input type="hidden" value="{{isset($experience) ? $experience->id : ''}}" name="experience_id">

                        <div class="grouped">
                            <div class="fieldset half">
                                <label>Experience name<span style="color:#F00">*</span></label>
                                <input type="text" required value="{{isset($experience) ? $experience->name : ''}}" name="name" id="exp_name">
                                <p class="exp_error" style="display:none;color: red;">Please enter experience name</p>
                            </div>
                            <div class="fieldset half">
                                <label>Reason considering<span style="color:#F00">*</span></label>
                                <input type="text" required value="{{isset($experience) ? $experience->reason_considaring : ''}}" name="reason_considaring" id="reason_considaring">
                                <p class="reason_error" style="display:none;color: red;">Please enter reason considering</p>
                            </div>
                        </div>
                        <div class="fieldset half">
                            <label>Estimated rate pp (£)<span style="color:#F00">*</span></label>
                            <input type="text" required onkeypress='validate(event)' name="estimated_cost_pp" id="estimated_cost_pp" value="{{isset($experience) ? $experience->estimated_cost_pp : ''}}" maxlength="10">
                            <p class="eastimated_error" style="display:none;color: red;">Please enter estimated cost pp</p>
                        </div>
                        <!-- <div class="fieldset half">
                            <label>Estimated IN rate pp (£)<span style="color:#F00">*</span></label>
                            <input type="text" required onkeypress='validate(event)' name="estimated_in_rate" id="estimated_in_rate" value="{{isset($experience) ? $experience->estimated_in_rate : ''}}" maxlength="10">
                            <p class="eastimated_in_error" style="display:none;color: red;">Please enter estimated IN pp </p>
                        </div> -->
                        <div class="fieldset half">
                            <label>Estimated rate pp (€)<span style="color:#F00">*</span></label>
                            <input type="text" required onkeypress='validate(event)' name="estimated_cost_pp_euro" id="estimated_cost_pp_euro" value="{{isset($experience) ? $experience->estimated_cost_pp_euro : ''}}" maxlength="10">
                            <p class="eastimated_euro_error" style="display:none;color: red;">Please enter estimated cost pp </p>
                        </div>
                      <!--   <div class="fieldset half">
                            <label>Estimated IN rate pp (€)<span style="color:#F00">*</span></label>
                            <input type="text" required onkeypress='validate(event)' name="estimated_in_rate_euro" id="estimated_in_rate_euro" value="{{isset($experience) ? $experience->estimated_in_rate_euro : ''}}" maxlength="10">
                            <p class="eastimated_in_euro_error" style="display:none;color: red;">Please enter estimated IN pp</p>
                        </div> -->
                        <div class="fieldset">
                            <label>Story<span style="color:#F00">*</span></label>
                            <textarea name="story"id="story" required>{{ isset($experience) ? $experience->story : '' }}</textarea>
                            <p class="story_error" style="display:none;color: red;">Please enter story</p>
                        </div>

                    </div>

                </div>

                <div class="section w_50 gallery" style="float: left;">

                    <div class="sub_heading">
                        Website gallery
                    </div>

                    <p>
                        Pictures of experience
                    </p>
                    <div class="database_edit_container" style="padding: 0;border: none;width: 100%;margin-bottom: 20px;">

                        <div class="main" style="width: 100%;">

                            <div class="column" style="width: 100%;margin: 0;">

                                <div class="print_gallery" style="border: none;padding: 0;">

                                    <div id="files_list_images"></div>
                                    <p id="loading"></p>
                                    <input type="hidden" name="file_ids" id="file_ids" value="">
                                    <div class="gallery" id="imagesHolder">

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>
                    <div class="form-group" style="display: none;" id="imgDiv">
                        <label for="fileupload" class="control-label text-dark">Photos for this record (can add more than one):</label>
                        <input type="file" class="form-control" id="fileupload" name="photos[]" data-url="{{ route('upload.dbexperience.image') }}" multiple="">
                    </div>
                    <a href="javascript:;" class="add_image_cta" id="addimgbtn">
                        Add images
                    </a>

                </div>
                <div class="section w_50 gallery" style="float: left;">

                    <div class="sub_heading">
                        Print Images
                    </div>

                    <p>
                        Pictures of experience for download
                    </p>
                    <div class="database_edit_container" style="padding: 0;border: none;width: 100%;margin-bottom: 20px;">

                        <div class="main" style="width: 100%;">

                            <div class="column" style="width: 100%;margin: 0;">

                                <div class="print_gallery" style="border: none;padding: 0;">

                                    <div id="files_list_images2"></div>
                                    <p id="loading2"></p>
                                    <input type="hidden" name="file_ids2" id="file_ids2" value="">
                                    <div class="gallery" id="imagesHolder2">

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>
                    <div class="form-group" style="display: none;" id="imgDiv2">
                        <label for="fileupload2" class="control-label text-dark">Images for this record (can add more than one):</label>
                        <input type="file" class="form-control" id="fileupload2" name="print_images[]" data-url="{{ route('upload.dbexperience.image2') }}" multiple="">
                    </div>
                    <a href="javascript:;" class="add_image_cta" id="addimgbtn2">
                        Add images
                    </a>

                </div>
                <div class="section w_50" style="float:left;">

                    <div class="sub_heading">
                        Experience information
                    </div>
                    <p>This section is needed to populate the information about the experience when creating a tour</p>
                    <div class="form">
                        
                        <div style="font-size: 16px;margin-top: 15px;margin-bottom: 15px;font-weight: 600;color: #000;">
                            General information
                        </div>
                        <div class="fieldset half">
                            <label>Experience type</label>
                            <select name="type_id">
                                <option value="1" <?php echo (isset($experience) && $experience->type_id == 1) ? 'selected': ''; ?>>VIP</option>
                                <option value="2" <?php echo (isset($experience) && $experience->type_id == 2) ? 'selected': ''; ?>>Big Banner</option>
                                <option value="3" <?php echo (isset($experience) && $experience->type_id == 3) ? 'selected': ''; ?>>Local</option>
                            </select>
                        </div>
						 <div class="fieldset">
                            <label>Experience Categories</label>
							 <?php if (!empty($experienceCategories ) ) {?>
                            @if(count($experienceCategories) == 0)
								<div class="panel-body text-center">
									<h4>No Experience Categories Available.</h4>
								</div>
							@else
								<div class="d-flex flex-row justify-content-between flex-wrap pb-4">
									@foreach($experienceCategories as $ec)
										<div class="col-6 form-check checkbox-middle">
											<input class="form-check-input" name="attractions_categories_id[]" type="checkbox" value="{{$ec->id}}" @if ( isset($ec->selected) && $ec->selected) checked @endif>
											<label for="attractions_categories_id" class="form-check-label text-dark">{{$ec->name}}</label>
										</div>
									@endforeach
								</div>
							@endif
							 <?php } ?>
                        </div>
						
						<div class="fieldset">
                            <label>Experience Availability </label>
							
					
							 <?php 
							 $checkedMonth =  '' ;
							 if ( !empty($experience->attractionsAvailability) ) {
								$checkedMonth = json_decode( $experience->attractionsAvailability,TRUE); 
							 }	
							 ?>
							<div class="d-flex flex-row justify-content-between flex-wrap pb-4">
								<div class="col-6 form-check checkbox-middle">
											<input class="form-check-input" name="attractionsAvailability[]" type="checkbox" value="1" {{ ( !empty(
											$checkedMonth) && is_array(
											$checkedMonth ) && in_array(1, $checkedMonth ) ) ? ' checked' : '' }} >
											<label for="attractionsAvailability" class="form-check-label text-dark">Jan</label>
								</div>
								<div class="col-6 form-check checkbox-middle">
											<input class="form-check-input" name="attractionsAvailability[]" type="checkbox" value="2" {{ ( !empty(
											$checkedMonth) && is_array(
											$checkedMonth ) && in_array(2, $checkedMonth ) ) ? ' checked' : '' }}>
											<label for="attractionsAvailability" class="form-check-label text-dark">Feb</label>
										</div>
								<div class="col-6 form-check checkbox-middle">
											<input class="form-check-input" name="attractionsAvailability[]" type="checkbox" value="3" {{ ( !empty(
											$checkedMonth) && is_array(
											$checkedMonth ) && in_array(3, $checkedMonth ) ) ? ' checked' : '' }}>
											<label for="attractionsAvailability" class="form-check-label text-dark">Mar</label>
										</div>
								<div class="col-6 form-check checkbox-middle">
											<input class="form-check-input" name="attractionsAvailability[]" type="checkbox" value="4" {{ ( !empty(
											$checkedMonth) && is_array(
											$checkedMonth ) && in_array(4, $checkedMonth ) ) ? ' checked' : '' }} >
											<label for="attractionsAvailability" class="form-check-label text-dark">Apr</label>
										</div>
								<div class="col-6 form-check checkbox-middle">
											<input class="form-check-input" name="attractionsAvailability[]" type="checkbox" value="5" {{ ( !empty(
											$checkedMonth) && is_array(
											$checkedMonth ) && in_array(5, $checkedMonth ) ) ? ' checked' : '' }}>
											<label for="attractionsAvailability" class="form-check-label text-dark">May</label>
										</div>
								<div class="col-6 form-check checkbox-middle">
											<input class="form-check-input" name="attractionsAvailability[]" type="checkbox" value="6" {{ ( !empty(
											$checkedMonth) &&  is_array(
											$checkedMonth ) && in_array(6, $checkedMonth ) ) ? ' checked' : '' }}>
											<label for="attractionsAvailability" class="form-check-label text-dark">Jun</label>
								</div>
								<div class="col-6 form-check checkbox-middle">
											<input class="form-check-input" name="attractionsAvailability[]" type="checkbox" value="7" {{ ( !empty(
											$checkedMonth) &&  is_array(
											$checkedMonth ) && in_array(7, $checkedMonth ) ) ? ' checked' : '' }}>
											<label for="attractionsAvailability" class="form-check-label text-dark">Jul</label>
								</div>
								<div class="col-6 form-check checkbox-middle">
											<input class="form-check-input" name="attractionsAvailability[]" type="checkbox" value="8" {{ ( !empty(
											$checkedMonth) &&  is_array(
											$checkedMonth ) && in_array(8, $checkedMonth ) ) ? ' checked' : '' }}>
											<label for="attractionsAvailability" class="form-check-label text-dark">Aug</label>
								</div>
								<div class="col-6 form-check checkbox-middle">
											<input class="form-check-input" name="attractionsAvailability[]" type="checkbox" value="9" {{ ( !empty(
											$checkedMonth) &&  is_array(
											$checkedMonth ) && in_array(9, $checkedMonth ) ) ? ' checked' : '' }}>
											<label for="attractionsAvailability" class="form-check-label text-dark">Sep</label>
								</div>
								<div class="col-6 form-check checkbox-middle">
											<input class="form-check-input" name="attractionsAvailability[]" type="checkbox" value="10" {{ ( !empty(
											$checkedMonth) &&  is_array(
											$checkedMonth ) && in_array(10, $checkedMonth ) ) ? ' checked' : '' }}>
											<label for="attractionsAvailability" class="form-check-label text-dark">Oct</label>
								</div>
								<div class="col-6 form-check checkbox-middle">
											<input class="form-check-input" name="attractionsAvailability[]" type="checkbox" value="11" {{ ( !empty(
											$checkedMonth) &&  is_array(
											$checkedMonth ) && in_array(11, $checkedMonth ) ) ? ' checked' : '' }}>
											<label for="attractionsAvailability" class="form-check-label text-dark">Nov</label>
								</div>
								<div class="col-6 form-check checkbox-middle">
											<input class="form-check-input" name="attractionsAvailability[]" type="checkbox" value="12" {{ (  !empty(
											$checkedMonth) && is_array(
											$checkedMonth ) && in_array(12, $checkedMonth ) ) ? ' checked' : '' }}>
											<label for="attractionsAvailability" class="form-check-label text-dark">Dec</label>
								</div>
							</div>
						</div>
                        <div class="fieldset">
                            <label>Experience Days </label>
                            
                    
                             <?php 
                             $checkedMonth =  '' ;
                             if ( !empty($experience->attractionsDaysAvailability) ) {
                                $checkedMonth = json_decode( $experience->attractionsDaysAvailability,TRUE); 
                             }  
                             ?>
                            <div class="d-flex flex-row justify-content-between flex-wrap pb-4">
                                <div class="col-6 form-check checkbox-middle">
                                            <input class="form-check-input" name="attractionsDaysAvailability[]" type="checkbox" value="Sunday" {{ ( !empty(
                                            $checkedMonth) && is_array(
                                            $checkedMonth ) && in_array('Sunday', $checkedMonth ) ) ? ' checked' : '' }} >
                                            <label for="attractionsDaysAvailability" class="form-check-label text-dark">Sunday</label>
                                </div>
                                <div class="col-6 form-check checkbox-middle">
                                            <input class="form-check-input" name="attractionsDaysAvailability[]" type="checkbox" value="Monday" {{ ( !empty(
                                            $checkedMonth) && is_array(
                                            $checkedMonth ) && in_array('Monday', $checkedMonth ) ) ? ' checked' : '' }}>
                                            <label for="attractionsDaysAvailability" class="form-check-label text-dark">Monday</label>
                                        </div>
                                <div class="col-6 form-check checkbox-middle">
                                            <input class="form-check-input" name="attractionsDaysAvailability[]" type="checkbox" value="Tuesday" {{ ( !empty(
                                            $checkedMonth) && is_array(
                                            $checkedMonth ) && in_array('Tuesday', $checkedMonth ) ) ? ' checked' : '' }}>
                                            <label for="attractionsDaysAvailability" class="form-check-label text-dark">Tuesday</label>
                                        </div>
                                <div class="col-6 form-check checkbox-middle">
                                            <input class="form-check-input" name="attractionsDaysAvailability[]" type="checkbox" value="Wednesday" {{ ( !empty(
                                            $checkedMonth) && is_array(
                                            $checkedMonth ) && in_array('Wednesday', $checkedMonth ) ) ? ' checked' : '' }} >
                                            <label for="attractionsDaysAvailability" class="form-check-label text-dark">Wednesday</label>
                                        </div>
                                <div class="col-6 form-check checkbox-middle">
                                            <input class="form-check-input" name="attractionsDaysAvailability[]" type="checkbox" value="Thursday" {{ ( !empty(
                                            $checkedMonth) && is_array(
                                            $checkedMonth ) && in_array('Thursday', $checkedMonth ) ) ? ' checked' : '' }}>
                                            <label for="attractionsDaysAvailability" class="form-check-label text-dark">Thursday</label>
                                        </div>
                                <div class="col-6 form-check checkbox-middle">
                                            <input class="form-check-input" name="attractionsDaysAvailability[]" type="checkbox" value="Friday" {{ ( !empty(
                                            $checkedMonth) &&  is_array(
                                            $checkedMonth ) && in_array('Friday', $checkedMonth ) ) ? ' checked' : '' }}>
                                            <label for="attractionsDaysAvailability" class="form-check-label text-dark">Friday</label>
                                </div>
                                <div class="col-6 form-check checkbox-middle">
                                            <input class="form-check-input" name="attractionsDaysAvailability[]" type="checkbox" value="Saturday" {{ ( !empty(
                                            $checkedMonth) &&  is_array(
                                            $checkedMonth ) && in_array('Saturday', $checkedMonth ) ) ? ' checked' : '' }}>
                                            <label for="attractionsDaysAvailability" class="form-check-label text-dark">Saturday</label>
                                </div>
                              
                            </div>
                        </div>
                        <div class="fieldset half">
                            <label>Location - area</label>
                            <select name="country_areas_id">
                                <option value=""></option>
                                @foreach ($countries as $k => $country)
                                    <optgroup label="{{$country->name}}" data-max-options="1">
                                        @foreach ($country->countryAreas as $kk => $countryArea)
                                            <option value="{{ $countryArea->id }}" @if ( isset($countryArea->selected) && $countryArea->selected) selected @endif>
                                                {{ $countryArea->name }}
                                            </option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                        </div>
                        <div class="fieldset half">
                            <label>Veenus score</label> 
                            <input type="text" onkeypress='validate(event)' name="score" value="{{ isset($experience) ? $experience->score : '' }}">
                            <!-- <input type="number" step="1" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="1" title="Numbers only" max="5" onkeypress='validate(event)' name="score" value="{{ isset($experience) ? $experience->score : '' }}"> -->
                        </div>
						<?php if( isset( $experience ) && $experience->type_id != 1 ) { ?>
						 <div class="fieldset half">
                            <label>"Distance from VIP ( In miles)</label>
                            <input type="text" onkeypress='validate(event)' name="distance_from_vip_miles" value="{{isset($experience) ? $experience->distance_from_vip_miles : ''}}">
                        </div>
						<?php } ?>
                        <div class="fieldset half">
                            <label>Mobility level</label>
                            <select name="mobility">
                                <option value="0"></option>
                                <option value="1" <?php echo (isset($experience) && $experience->mobility == '1')?'selected':''?>>1 - Low</option>
                                <option value="2" <?php echo (isset($experience) && $experience->mobility == '2')?'selected':''?>>2 - Low with steps</option>
                                <option value="3" <?php echo (isset($experience) && $experience->mobility == '3')?'selected':''?>>3 - Medium</option>
                                <option value="4" <?php echo (isset($experience) && $experience->mobility == '4')?'selected':''?>>4 - High</option>
                                <option value="5" <?php echo (isset($experience) && $experience->mobility == '5')?'selected':''?>>5 - Active</option>
                            </select>
                        </div>
                        <div class="fieldset half">
                            <label>Activity level</label>
                            <select name="activity_level">
                                <option value="0">Select activity level</option>
                                <option value="1" <?php echo (isset($experience) && $experience->activity_level == '1')?'selected':''?>>Level 1 – Minimal walking & very few steps</option>
                                <option value="2" <?php echo (isset($experience) && $experience->activity_level == '2')?'selected':''?>>Level 2 – Moderate walking & few steps</option>
                                <option value="3" <?php echo (isset($experience) && $experience->activity_level == '3')?'selected':''?>>Level 3 – Lots of steps and active walking, cobbled stones</option>
                                <option value="4" <?php echo (isset($experience) && $experience->activity_level == '4')?'selected':''?>>Level 4 – Walking, steps, narrow staircases and/or difficult terrains</option>
                                <option value="5" <?php echo (isset($experience) && $experience->activity_level == '5')?'selected':''?>>Level 5 – Long and intensive walking conditions (e.g. rambling)</option>
                            </select>
                        </div>
                        <div class="fieldset">
                            <label>Experience description</label>
                            <textarea name="description" id="e_description">{{ isset($experience) ? strip_tags($experience->description) : '' }}</textarea>
                        </div>

                        <div style="font-size: 16px;margin-top: 15px;margin-bottom: 15px;font-weight: 600;color: #000;">
                            URLs
                        </div>
                        <div class="fieldset">
                            <label>Website url</label>
                            <input type="text" name="website" value="{{isset($experience) ? $experience->website : ''}}">
                        </div>
                        <div class="fieldset">
                            <label>TripAdvisor url</label>
                            <input type="text" name="tripadvisor_url" value="{{isset($experience) ? $experience->tripadvisor_url : ''}}">
                        </div>
                        <div class="fieldset">
                            <label>location url</label>
                            <input type="text" name="location_url" value="{{isset($experience) ? $experience->location_url : ''}}">
                        </div>
                        <div style="font-size: 16px;margin-top: 15px;margin-bottom: 15px;font-weight: 600;color: #000;">
                            Experience inclusions
                        </div>
                        <div class="fieldset">
                            <label>Inclusion name</label>
                            <div class="list" id="appendInclusions">
                                <?php
                                if(isset($experience) && !empty($experience->inclusions)){
                                    $inclusions = unserialize($experience->inclusions);
                                    $count = count($inclusions);
                                    foreach ($inclusions as $key => $value) {
                                        ?>
                                        <div class="list__item">
                                            <input name="inclusions[]" value="<?php echo $value; ?>" type="text" placeholder="Enter here...">
                                            <a href="javascript:;" class="remove_cta removeInclusion" style="display: <?php echo ($count < 2) ? 'none' : 'block' ?>;"><i class="far fa-times-circle"></i></a>
                                        </div>
                                        <?php
                                    }
                                }else{
                                ?>
                                    <div class="list__item">
                                        <input name="inclusions[]" type="text" placeholder="Enter here...">
                                        <a href="javascript:;" class="remove_cta removeInclusion" style="display: none;"><i class="far fa-times-circle"></i></a>
                                    </div>
                                <?php } ?>
                                    
                            </div>
                            <a href="javascript:;" id="addInclusion" class="add_cta" style="color:orange;">
                                add inclusion
                            </a>
                        </div>
                    </div>

                </div>
                <div class="section w_50" style="float:left;">

                    <div class="sub_heading">
                        Additional database information
                    </div>
                    <p>This section is for additional data we might need gathered about experience</p><br>
                    <div class="form">
                        <div class="grouped">
                            <div class="fieldset half">
                                <label>Owner or association</label>
                                <input type="text" name="owner" value="{{isset($experience) ? $experience->owner : ''}}">
                            </div>

                            <div class="fieldset half">
                                <label>Experience length (full day 5h+)</label>
                                <select name="half_full">
                                    <option value="0"></option>
                                    <option value="1" {{isset($experience) && $experience->half_full == 1 ? 'selected' : ''}}>Half day experience</option>
                                    <option value="2" {{isset($experience) && $experience->half_full == 2 ? 'selected' : ''}}>Full day experience</option>
                                </select>
                            </div>
                            
                        </div>
                        <div class="grouped">
                           
                             <div class="fieldset half">
                                <label>Arrival procedure</label>
                                <input type="text" maxlength="255" name="arrival_procedure" value="{{isset($experience) ? $experience->arrival_procedure : ''}}">
                            </div>
                            <div class="fieldset half">
                                <label>Coach parking</label>
                                <input type="text" maxlength="255" name="coach_parking" value="{{isset($experience) ? $experience->coach_parking : ''}}">
                            </div>
                        </div>
                       
                        <div style="font-size: 16px;margin-top: 15px;margin-bottom: 15px;font-weight: 600;color: #000;">
                            Experience contact information
                        </div>
                        <div class="grouped">
                            <div class="fieldset">
                                <label>Name of main contact</label>
                                <input type="text" name="contact_name" value="{{isset($experience) ? $experience->contact_name : ''}}">
                            </div>
                            <div class="fieldset">
                                <label>Main contact position</label>
                                <input type="text" name="contact_position" value="{{isset($experience) ? $experience->contact_position : ''}}">
                            </div>
                        </div>
                        <div class="grouped">
                            <div class="fieldset">
                                <label>Main contact number</label>
                                <input type="text" name="main_contact_number" value="{{isset($experience) ? $experience->main_contact_number : ''}}">
                            </div>
                            <div class="fieldset">
                                <label>Direct contact number</label>
                                <input type="text" name="direct_contact_number" value="{{isset($experience) ? $experience->direct_contact_number : ''}}">
                            </div>
                        </div>
                        <div class="grouped">
                            <div class="fieldset">
                                <label>General email</label>
                                <input type="text" name="email" value="{{isset($experience) ? $experience->email : ''}}">
                            </div>
                        </div>
                        <div style="font-size: 16px;margin-top: 15px;margin-bottom: 15px;font-weight: 600;color: #000;">
                            Experience address
                        </div>
                        <div class="fieldset">
                            <label>Address<span style="color:#F00">*</span></label>
                            <input type="text" class="get_geocodes" id="address" name="address" value="{{isset($experience) ? $experience->address : ''}}">
                            <p class="address_error" style="display:none;color: red;">Please enter address</p>
                        </div>
                        <div class="fieldset">
                            <label>Street</label>
                            <input type="text" class="get_geocodes" name="street" id="street" value="{{isset($experience) ? $experience->street : ''}}">
                        </div>
                        <div class="fieldset">
                            <label>Town/city<span style="color:#F00">*</span></label>
                            <input type="text" class="get_geocodes" name="city" id="city" value="{{isset($experience) ? $experience->city : ''}}">
                            <p class="city_error" style="display:none;color: red;">Please enter city</p>
                        </div>
                        <div class="fieldset">
                            <label>Postcode<span style="color:#F00">*</span></label>
                            <input type="text" class="get_geocodes" name="postcode" id="postcode" value="{{isset($experience) ? $experience->postcode : ''}}">
                            <p class="postcode_error" style="display:none;color: red;">Please enter postcode</p>
                        </div>
                        <div class="fieldset">
                            <label>Satnav Postcode</label>
                            <input type="text" class="" maxlength="15" name="satnav_postcode" id="satnav_postcode" value="{{isset($experience) ? $experience->satnav_postcode : ''}}">
                            <p class="satnav_postcode_error" style="display:none;color: red;">Please enter satnav_postcode</p>
                        </div>
                        <div class="fieldset">
                            <label>Country<span style="color:#F00">*</span></label>
                            <input type="text" class="get_geocodes" name="country" id="country" value="{{isset($experience) ? $experience->country : ''}}">
                            <p class="country_error" style="display:none;color: red;">Please enter country</p>
                        </div>
                        <div class="fieldset">
                            <label>Latitude<span style="color:#F00">*</span></label>
                            <input type="text" name="latitude" id="latitude" value="{{isset($experience) ? $experience->latitude : ''}}">
                            <p class="latitude_error" style="display:none;color: red;">Please enter latitude</p>
                        </div>
                        <div class="fieldset">
                            <label>Longitude<span style="color:#F00">*</span></label>
                            <input type="text" name="longitude" id="longitude" value="{{isset($experience) ? $experience->longitude : ''}}">
                            <p class="longitude_error" style="display:none;color: red;">Please enter longitude</p>
                        </div>
                        
                    </div>

                </div>
            </div>
          <div id="tab2" class="tab-pane">
            <h4>Not found!</h4>
          </div>
        <div id="tab3" class="tab-pane">
                
            <div class="section w_100" style="float:left;">
                <div class="sub_heading">
                    Experience Voucher Information
                    <p>Any information relating to the experience vouchers <p>
                </div>
                <div class="form">
                    <div class="fieldset">
                        <label>Experience inclusions</label>
                        <textarea name="exp_inclusions" id="exp_inclusions" rows="7">{{ isset($experience) ? strip_tags($experience->exp_inclusions) : '' }}</textarea>
                    </div>
                    <div class="fieldset">
                        <label>Coach Drop-off</label>
                        <textarea name="coach_dropoff" id="coach_dropoff" rows="2">{{ isset($experience) ? strip_tags($experience->coach_dropoff) : '' }}</textarea>
                    </div>
                    <div class="fieldset">
                        <label>Coach Parking</label>
                        <textarea name="coach_parking" id="coach_parking" rows="2">{{ isset($experience) ? strip_tags($experience->coach_parking) : '' }}</textarea>
                    </div>
                    <div class="fieldset">
                        <label>General Info</label>
                        <textarea name="general_info" id="general_info" rows="2">{{ isset($experience) ? strip_tags($experience->general_info) : '' }}</textarea>
                    </div>
                    <div class="fieldset">
                        <label>Additional Information</label>
                        
                        <textarea name="additional_info" id="additional_info" rows="2">{{ isset($experience) ? strip_tags($experience->additional_info) : '' }}</textarea>
                    </div>
                   
                </div>
            </div>
        </div>
         <!-- <div id="tab3" class="tab-pane">
                
            <div class="section w_100" style="float:left;">
                <div class="sub_heading">
                    Experience Confirmation Template Text
                </div>
                <div class="form">
                    <div class="fieldset">
                        <label>Description</label>
                        <textarea name="confirm_description" id="confirm_description" rows="7">{{ isset($experience) ? strip_tags($experience->confirm_description) : '' }}</textarea>
                    </div>
                    <div class="fieldset">
                        <label>Free place</label>
                        <textarea name="free_place" id="free_place" rows="2">{{ isset($experience) ? strip_tags($experience->free_place) : '' }}</textarea>
                    </div>
                    <div class="fieldset">
                        <label>Group Size</label>
                        <input type="text" name="group_size" id="group_size" value="{{isset($experience) ? $experience->group_size : ''}}">
                    </div>
                    <div class="fieldset">
                        <label>Mobility access</label>
                        <input type="text" name="mobility_access" id="mobility_access" value="{{isset($experience) ? $experience->mobility_access : ''}}">
                    </div>
                    <div class="fieldset">
                        <label>Terms and Conditions</label>
                        <textarea name="terms_conditions" id="terms_conditions" rows="10">{{ isset($experience) ? strip_tags($experience->terms_conditions) : '' }}</textarea>
                    </div>
                </div>
            </div>
              </div>-->
            </div>
        </div>
        <input type="button" name="submit" class="btn btn-primary" id="expFormSubmit" value="Submit">
    </form>
</div>
<script src="{{ asset('js/jQuery-File-Upload/js/vendor/jquery.ui.widget.js') }}"></script>
<script src="{{ asset('js/jQuery-File-Upload/js/jquery.iframe-transport.js') }}"></script>
<script src="{{ asset('js/jQuery-File-Upload/js/jquery.fileupload.js') }}"></script>
<div class="modal" id="editImage">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Image</h4>
                    <button type="button" class="close" data-dismiss="modal" id="buttonCloseEventClient">×</button>
                </div>
                <div class="modal-body">
                    <p id="holderEditImage">

                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCrYs9n66w0Yh7bzhzRpWQCZ_QHavCZRow" defer=""></script>
<script type="text/javascript">
     $('.get_geocodes').change(function(){
        getLatLngByZipcode();
    });
function getLatLngByZipcode() 
{
var geocoder = new google.maps.Geocoder();
var address = $('#address').val();
var street = $('#street').val();
var city = $('#city').val();
var postcode = $('#postcode').val();
var country = $('#country').val();
var full_address = address+','+street+','+city+','+postcode;
var latitude = '';
var longitude = '';
geocoder.geocode({ 'address': full_address }, function (results, status) {
   
    if (status == google.maps.GeocoderStatus.OK) {
        var latitude = results[0].geometry.location.lat();
        var longitude = results[0].geometry.location.lng();
        $('#latitude').val(latitude);
        $('#longitude').val(longitude);
    } 
});
}
    function validate(evt) {
        var theEvent = evt || window.event;

        if (theEvent.type === 'paste') {
            key = event.clipboardData.getData('text/plain');
        } else {
            var key = theEvent.keyCode || theEvent.which;
            key = String.fromCharCode(key);
        }
        var regex = /[0-9]|\./;
        if( !regex.test(key) ) {
            theEvent.returnValue = false;
            if(theEvent.preventDefault) theEvent.preventDefault();
        }
    }
</script>
<script type="text/javascript">
    $(document).ready(function(){
        // var e_description = CKEDITOR.replace( 'e_description', {toolbar: [{ name: 'basicstyles', items: [ 'Bold', 'Italic'] },]
        // });
        // CKEDITOR.replace( 'confirm_description', {toolbar: [{ name: 'basicstyles', items: [ 'Bold', 'Italic'] },]
        // });
        // CKEDITOR.replace( 'free_place', {toolbar: [{ name: 'basicstyles', items: [ 'Bold', 'Italic'] },]
        // } );
        // CKEDITOR.replace( 'group_size', {toolbar: [{ name: 'basicstyles', items: [ 'Bold', 'Italic'] },]
        // } );
        // CKEDITOR.replace( 'mobility_access', {toolbar: [{ name: 'basicstyles', items: [ 'Bold', 'Italic'] },]
        // } );
        // CKEDITOR.replace( 'terms_conditions', {toolbar: [{ name: 'basicstyles', items: [ 'Bold', 'Italic'] },]
        // } );
        getImages();
        $("#addimgbtn").bind("click", function () {
            $(this).hide();
            $("#imgDiv").show();
        });
        getImages2();
        $("#addimgbtn2").bind("click", function () {
            $(this).hide();
            $("#imgDiv2").show();
        });
    });
    function getImages(){
        @if (isset($experience) && optional($experience) && old('id', optional($experience)->id))
        $('.loader').show();
        $.ajax({
            type: "GET",
            url: "{{route('get.dbexperience.images', optional($experience)->id)}}",
            dataType: "json",
            success: function(response){
                var str = "";
                for( var i = 0; i < response.length; i++ ){
                    str += '<div class="gallery__item" name="'+response[i].id+'">';
                    str += '<div class="thumbnail">';
                    str += '<img src="{{ url("storage") }}/'+response[i].file+'" border="0" style="height: 100%;width: 100%;">';
                    str += '<div class="ctas" style="margin-left:-47px;background: #fff;">';
                    str += '<a href="javascript:;" class="cta editImage" data-toggle="modal" name="'+response[i].id+'">';
                    str += '<i class="fas fa-edit"></i>';    
                    str += '</a>';
                    str += '<a href="javascript:;" class="cta red dbdeleteImage" name="'+response[i].id+'">';
                    str += '<i class="far fa-times-circle"></i>';
                    str += '</a>';
                    str += '</div>';
                    str += '</div>';
                    str += '<div class="label">';
                    str += response[i].name;
                    str += '</div>';
                    str += '</div>';
                }

                $("#imagesHolder").html(str);
                $(".dbdeleteImage").bind("click", function(){
                    var id = $(this).attr("name");
                    deleteImage(id);
                });

                $(".editImage").bind("click", function(){
                    var id = $(this).attr("name");
                    editImage(id);
                });

                var target = $('#imagesHolder');

                target.sortable({
                    placeholder: 'highlight',
                    // axis: "x",
                    update: function (e, ui){
                        var sortData = target.sortable('toArray',{ attribute: 'name'});
                        updateImagesToDatabase(sortData.join(','));
                    }
                })
                $('.loader').hide();
            },
            error: function(er){
                console.log(er);
            }
        });

        @endif
    }
    function getImages2(){
        @if (isset($experience) && optional($experience) && old('id', optional($experience)->id))
        $('.loader').show();
        $.ajax({
            type: "GET",
            url: "{{route('get.dbexperience.images2', optional($experience)->id)}}",
            dataType: "json",
            success: function(response){
                var str = "";
                for( var i = 0; i < response.length; i++ ){
                    str += '<div class="gallery__item" name="'+response[i].id+'">';
                    str += '<div class="thumbnail">';
                    str += '<img src="{{ url("storage") }}/'+response[i].file+'" border="0" style="height: 100%;width: 100%;">';
                    str += '<div class="ctas" style="margin-left:-26px;background: #fff;">';
                    str += '<a href="javascript:;" class="cta red dbdeleteImage2" name="'+response[i].id+'">';
                    str += '<i class="far fa-times-circle"></i>';
                    str += '</a>';
                    str += '</div>';
                    str += '</div>';
                    str += '</div>';
                }

                $("#imagesHolder2").html(str);
                $(".dbdeleteImage2").bind("click", function(){
                    var id = $(this).attr("name");
                    deleteImage2(id);
                });

                var target = $('#imagesHolder2');

                target.sortable({
                    placeholder: 'highlight',
                    // axis: "x",
                    update: function (e, ui){
                        var sortData = target.sortable('toArray',{ attribute: 'name'});
                        updateImagesToDatabase2(sortData.join(','));
                    }
                })
                $('.loader').hide();
            },
            error: function(er){
                console.log(er);
            }
        });

        @endif
    }
    function updateImagesToDatabase(idString){
        $.ajaxSetup({ headers: {'X-CSRF-TOKEN': '{{csrf_token()}}'}});
        $('.loader').show();
        $.ajax({
            url:'{{route('update.dbexperience.images_order')}}',
            method:'POST',
            data:{ids:idString},
            success:function(){
                $('.loader').hide();
                //console.log(idString);
                // alert('Successfully updated');
                //do whatever after success
            },
            error: function(er){
                //console.log("err-1");
                //console.log(er);
            }
        })
    }
    function updateImagesToDatabase2(idString){
        $.ajaxSetup({ headers: {'X-CSRF-TOKEN': '{{csrf_token()}}'}});
        $('.loader').show();
        $.ajax({
            url:'{{route('update.dbexperience.images_order2')}}',
            method:'POST',
            data:{ids:idString},
            success:function(){
                $('.loader').hide();
                //console.log(idString);
                // alert('Successfully updated');
                //do whatever after success
            },
            error: function(er){
                //console.log("err-1");
                //console.log(er);
            }
        })
    }
    function deleteImage(id){
        $('.loader').show();
        $.ajax({
            type: "POST",
            url: "{{route('delete.dbexperience.image')}}",
            data: {
                "id": id,
                _token: '{{csrf_token()}}'
            },
            success: function(html){
                $('.loader').hide();
                getImages();
            }
        });
    }
    function deleteImage2(id){
        $('.loader').show();
        $.ajax({
            type: "POST",
            url: "{{route('delete.dbexperience.image2')}}",
            data: {
                "id": id,
                _token: '{{csrf_token()}}'
            },
            success: function(html){
                $('.loader').hide();
                getImages2();
            }
        });
    }
    function editImage(id){
        $('.loader').show();
        $.ajax({
            type: "POST",
            url: "{{route('edit.dbexperience.image')}}",
            data: {
                "id": id,
                _token: '{{csrf_token()}}'
            },
            dataType: "json",
            success: function(res){
                $('.loader').hide();
                $("#holderEditImage").html(res.html);
                $("#editImage").show();
            }
        });
    }
    $('#fileupload').fileupload({
        dataType: 'json',
        add: function (e, data) {
            $('#loading').text('Uploading...');
            //console.log(e);
            //console.log(data);
            //console.log("add before s");
            data.submit();
            //console.log("add after s");
        },
        done: function (e, data) {
            console.log("done");
            $.each(data.result.files, function (index, file) {
                $('<p/>').html(file.name + ' (' + file.size + ' KB)').appendTo($('#files_list_images'));
                if ($('#file_ids').val() != '') {
                    $('#file_ids').val($('#file_ids').val() + ',');
                }
                $('#file_ids').val($('#file_ids').val() + file.fileID);
            });
            $('#loading').text('');
        },
        error: function(er){
            console.log(er);
        }
    });
    $('#fileupload2').fileupload({
        dataType: 'json',
        add: function (e, data) {
            $('#loading2').text('Uploading...');
            //console.log(e);
            //console.log(data);
            //console.log("add before s");
            data.submit();
            //console.log("add after s");
        },
        done: function (e, data) {
            console.log("done");
            $.each(data.result.files, function (index, file) {
                $('<p/>').html(file.name + ' (' + file.size + ' KB)').appendTo($('#files_list_images2'));
                if ($('#file_ids2').val() != '') {
                    $('#file_ids2').val($('#file_ids2').val() + ',');
                }
                $('#file_ids2').val($('#file_ids2').val() + file.fileID);
            });
            $('#loading2').text('');
        },
        error: function(er){
            console.log(er);
        }
    });
</script>