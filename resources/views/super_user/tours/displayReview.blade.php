<style type="text/css">
    .row.display_div {
        padding: 25px;
    }
    .review_div{
        border: 1px solid #cccccc;
        border-radius: 3px;
    }
</style>
   <div class="container">
        <div class="displaycls display_page1">
            <div class="row display_div">
                <div class="col-lg-12 p-0">
                    <h4>Manage Review on tour</h4>
                </div>
                <div class="col-lg-12 p-3 review_div">
                    <p><b>This review is currently displayed on these tours</b></p>
                    <br/>
                <table class="table">
                <thead>
                <tr>
                  <th scope="col"><b>Tour Name</b></th>
                  <th scope="col"><b>Displayed reviews</b></th>
                  <th scope="col"><b>Preview</b></th>
                  <th scope="col"><b>Tour Location</b></th>
                  <th scope="col"><b>Add/Remove</b></th>
                 
                </tr>
                   </thead>
                   <tbody  class="main_tours">
                    <?php if(!empty($reviews[0])){
                        foreach($reviews as $row)
                        {
                            $experience_data = App\Models\Cms\Experience::select('id','name','tour_id')->where('id',$row->experience_id)->orderBy('name','asc')->first();
                            
                            ?>
                            <tr>
                                <td scope="row"> {{$row->name}} </td>
                                <td scope="row">{{$row->display_count}}</td>
                                <td><a class="btn btn-primary" target="_blank" href="<?=URL('experience/'.$row->experience_id)?>">Go to</a></td>
                                <td><a class="btn btn-primary" target="_blank" href="<?=URL('/super-user/tours/show/'.$experience_data->tour_id.'?id='.$row->experience_id.'&page=review')?>">Tour Location</a></td>
                                <td scope="row">
                                    <label class="checkbox_div ">
                                      <input type="checkbox" <?=!empty($row->display_count)?'checked="checked"':''?> class="custom_chkbox driver_paying " value="{{$row->id}}" name="show_review" data-id="{{$row->id}}"> <span class="notClickedCls"></span>
                                      <span class="checkmark"></span>
                                     <!--  <span class="sk_label">Paying</span> -->
                                    </label>
                                </td>
                               
                            </tr>  
                            <?php
                        }
                    } else { ?> 
                         <tr><td colspan="3">No Data Found</td></tr>
                    <?php } ?>
                         
                    </tbody>
                    </table>
                       
                        <div>
                           <button type="button" style="background-color: #000000 !important;color: #ffffff !important;border-color: #000000 !important;" class="btn btn-primary cancel_review">Cancel</button> 
                           <button type="button" class="btn btn-primary save_review">Save</button>  
                           <button type="button" class="btn btn-primary nextpage2">Display on other products</button> 
                        </div>
                    </div>
               </div>
        </div>
        <div class="displaycls display_page2" style="display:none;">
            <div class="row display_div">
                <div class="col-lg-12 p-0">
                    <h4>Display Review on tour</h4>
                    <label class="graycls">Choose Hotels or Experiences or Tour Names</label>
                </div>
                <div class="col-lg-12 p-3 review_div">

                    <p><b>Display the review on every tour that includes</b></p>

                    <br/>
                        <div class="form-group">
                          
                            <p>Please select Hotels</p>
                            <select name="hotels[]" multiple id="display_hotels" class="select2 form-control room_type " data-msg-required="Please select type" required>
                                <option value="">Select Hotel</option>
                                @if(!empty($hotelList))
                                    @foreach($hotelList as $row)
                                        <option value="{{$row->id}}">{{$row->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                            <br/>
                            <p>Or</p>
                            <p>Please select Experiences</p>
                              <select name="experiences[]" multiple id="display_experiences" class="select2 form-control room_type " data-msg-required="Please select type" required>
                                <option value="">Select Experiences</option>
                                @if(!empty($experience))
                                    @foreach($experience as $row)
                                        <option value="{{$row->id}}">{{$row->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                            <p>Or</p>
                            <p>Please select Tour Names</p>
                            <?php $exp_id = array(); ?>
                              <select name="tours[]" multiple id="display_tours" class="select2 form-control room_type " data-msg-required="Please select type" required>
                                <option value="">Select Tours</option>
                               <!--  @if(!empty($items[0]))
                                    @foreach($items as $item)
                                    <?php
                                  
                                    if(!in_array($item->experiences_id,$exp_id))
                                        { 
                                             
                                     if($item->cancel_status == 1){
                                        continue;
                                    }
                                     if($item->completed == 1){
                                            continue;
                                        }
                                        $exp_id[] =$item->experiences_id;
                                     ?>
                                        <option value="{{ $item->experiences_id}}">{{ $item->experience_name}} </option> <?php } ?>
                                    @endforeach
                                @endif -->
                                  @if(!empty($experienceActive))
                                    @foreach($experienceActive as $row)
                                        <option value="{{$row->id}}">{{$row->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                            
                        </div>
                        <div>
                           <button type="button" style="background-color: #000000 !important;color: #ffffff !important;border-color: #000000 !important;" class="btn btn-primary backpage1">Back</button> 
                           
                           <button type="button" class="btn btn-primary nextpage3">Continue</button> 
                        </div>
                </div>
            </div>
        </div>
        <div class="displaycls display_page3" style="display:none;">
             <div class="row display_div">
                <div class="col-lg-12 p-0">
                    <h4>Display Review on tour</h4>
                </div>
                <div class="col-lg-12 p-3 review_div">
                    <p><b>Found <span class="total_tour_count"></span> tours, select any amount of tours to display review. </b></p>
                    <br/>
                <table class="table">
                <thead>
                <tr>
                  <th scope="col"><b>Tour Name</b></th>
                  <th scope="col"><b>Displayed reviews</b></th>
                  <th scope="col"><b>Add/Remove</b></th>
                 
                </tr>
                   </thead>
                   <tbody class="final_tours">
                    
                         
                    </tbody>
                    </table>
                       
                        <div>
                            <input type="hidden" name="review_id" id="review_id" value="{{$review_id}}">
                           <button type="button" style="background-color: #000000 !important;color: #ffffff !important;border-color: #000000 !important;" class="btn btn-primary backpage2">Back</button> 
                          <!--  <button type="submit" class="btn btn-primary">Submit Review</button>   -->
                           <button type="button" class="btn btn-primary nextpage1">Save & Continue</button> 
                        </div>
                    </div>
               </div>
        </div>
   </div>
<script>
        $(document).ready(function() {
            $('.select2').select2();
            
        });
        $('.nextpage2').click(function(){
            $('.displaycls').hide();
            $('.display_page2').show();
        });
        $('.nextpage3').click(function(){
            $('.displaycls').hide();
            $('.display_page3').show();
            var hotel = $('#display_hotels').val();
            var experiences = $('#display_experiences').val();
            var tours = $('#display_tours').val();
            
             $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: '<?=URL('super-user/get_tour_list')?>',
                    data: {hotel: hotel, experiences: experiences, tours: tours},
                    async: false,
                    success: function(data) {
                        $('tbody.final_tours').html('');
                        $('tbody.final_tours').html(data.response);
                        $('.total_tour_count').text(data.total_tour);
                    },
                    error: function() {
                       
                    }
                });

        });
         $('.nextpage1').click(function(){
            $('.displaycls').hide();
            $('.display_page1').show();
            
            var checkValues = $('input[name=add_review]:checked').map(function()
            {
                return $(this).val();
            }).get();
            //var show_review = $('.show_review').val();
            var review_id = $('#review_id').val();
               console.log(checkValues);
             $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: '<?=URL('super-user/get_all_list')?>',
                    data: {show_review: checkValues,review_id:review_id},
                    async: false,
                    success: function(data) {
                        $('tbody.main_tours').html('');
                        $('tbody.main_tours').html(data.response);
                    },
                    error: function() {
                       
                    }
                });

        });
          $('.save_review').click(function(){
           /* $('.displaycls').hide();
            $('.display_page1').show();*/
            
            var checkValues = $('input[name=show_review]:not(:checked)').map(function()
            {
                return $(this).val();
            }).get();
             var uncheckValues = $('input[name=show_review]:not(:unchecked)').map(function()
            {
                return $(this).val();
            }).get();
            //var show_review = $('.show_review').val();
            var review_id = $('#review_id').val();
               console.log(checkValues);
             $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: '<?=URL('super-user/save_display_review')?>',
                    data: {show_review: checkValues,uncheck_review: uncheckValues,review_id:review_id},
                    async: false,
                    success: function(data) {
                        toastSuccess('Save successfully.');
                        $('#reviewModal').modal('hide');
                        window.location.reload();
                    },
                    error: function() {
                       
                    }
                });

        });
         
         $('.cancel_review').click(function(){
            $('#reviewModal').modal('hide');
            
        });
        $('.backpage2').click(function(){
            $('.displaycls').hide();
            $('.display_page2').show();
            
        });
        $('.backpage1').click(function(){
            $('.displaycls').hide();
            $('.display_page1').show();
            
        });

    </script>