<?php
        
        if(!empty($tour_reply->count())){
            foreach ($tour_reply as $note_row_res) {
                //pr($note_row_res);

         ?>
<li class="note">
        
        <div class="header" style="margin-top:-20px;">
            <div class="initials"><?=!empty($note_row_res["users"]->name)?$note_row_res["users"]->name:''?></div>
            <div class="date"><?=!empty($note_row_res->created_at)?date('d/m/Y',strtotime($note_row_res->created_at)):''?></div>
        </div>

        <div class="body delete-note" data-id="{{$note_row_res->id}}">
            <?=!empty($note_row_res->note)?$note_row_res->note:''?>
            <br>
            <?php if($note_row_res->replies->count() > 0){ ?>
            <a href="javascript:void(0);" class="note_replies" style="color:#FCA311;margin-right: 15px;font-weight: 600;"><i class="fas fa-arrow-circle-down"></i> <?php echo $note_row_res->replies->count(); ?> replies</a>
            <?php } ?>
            
        </div>
        <?php if(isset($tab) && $tab == 'all'){ ?> 
            <a href="javascript:void(0);" data-id="{{$note_row_res->id}}" class="reply_note_all" style="color:#FCA311;font-weight: 600;"><i class="fas fa-plus-circle"></i> add note</a>
                <div id="comment_all_{{$note_row_res->id}}" style="display:none;" >
                <textarea class="form-control" name="comment[{{$note_row_res->id}}]"></textarea>
                <button type="submit" class="btn btn-sm btn-primary mt-2" data-id="{{$cart_id}}" data-cat="{{$user_type}}" data-cat="1" id="save_notes_popup" style="max-width: 500px;">Add Note</button>
            </div>
        <?php }else{ ?> 
            <a href="javascript:void(0);" data-id="{{$note_row_res->id}}" class="reply_note" style="color:#FCA311;font-weight: 600;"><i class="fas fa-plus-circle"></i> add note</a>
            <div id="comment_{{$note_row_res->id}}" style="display:none;" >
                <textarea class="form-control" name="comment[{{$note_row_res->id}}]"></textarea>
                <button type="submit" class="btn btn-sm btn-primary mt-2" data-id="{{$cart_id}}" data-cat="{{$user_type}}" data-cat="1" id="save_notes_popup" style="max-width: 500px;">Add Note</button>
            </div>
        <?php } ?>
        
        
         <?php if(!empty($note_row_res->tour_file)){

            $tour_notes = explode(',',$note_row_res->tour_file);

            foreach($tour_notes as $trow){ ?> 
            <a target="_blank" href="{{asset('/tour_notes/'.$trow)}}" class="download_file"><img src="{{asset('/images/pdf.png')}}" class="img-note"></a> &nbsp;&nbsp;&nbsp;&nbsp;
        <?php } }?>
     @if(!empty($note_row_res->replies))
                <?php  //$level = $level + 2;?>
                <ul style="-margin-left: 25px;">
                    {{-- recursively include this view, passing in the new collection of comments to iterate --}}
                    @include('partials.booking.tour_note_reply', ['tour_reply' => $note_row_res->replies,'level' => $level])
                </ul>
            @endif
    </li>

        <?php } } else{ ?> 
            <!-- <p>No Notes Found.</p> -->
        <?php }?>