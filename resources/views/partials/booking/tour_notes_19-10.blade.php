<?php
/*$general_notes = App\Models\Cms\ToursNotes::selectRaw("tours_notes.*,users.name")->leftjoin('users', 'users.id', '=', 'tours_notes.created_by')->where("category",'1')->where("parent_id",'0')->where("cart_id",$cart_id)->where("user_type",$user_type)->orderBy('id', 'DESC')->get();*/
$general_notes = App\Models\Cms\ToursNotes::selectRaw("tours_notes.*,users.name")->leftjoin('users', 'users.id', '=', 'tours_notes.created_by')->where("category",'1')->where("cart_id",$cart_id)->where("user_type",$user_type)->where("parent_id",'0')->orderBy('id', 'DESC')->get();
 
 $room_req_notes = App\Models\Cms\ToursNotes::selectRaw("tours_notes.*,users.name")->leftjoin('users', 'users.id', '=', 'tours_notes.created_by')->where("category",'2')->where("cart_id",$cart_id)->where("user_type",$user_type)->orderBy('id', 'DESC')->get();

 $amendements_notes = App\Models\Cms\ToursNotes::selectRaw("tours_notes.*,users.name")->leftjoin('users', 'users.id', '=', 'tours_notes.created_by')->where("category",'3')->where("cart_id",$cart_id)->where("user_type",$user_type)->orderBy('id', 'DESC')->get();

 $hotels_notes = App\Models\Cms\ToursNotes::selectRaw("tours_notes.*,users.name")->leftjoin('users', 'users.id', '=', 'tours_notes.created_by')->where("category",'4')->where("cart_id",$cart_id)->where("user_type",$user_type)->orderBy('id', 'DESC')->get();

 $exp_notes = App\Models\Cms\ToursNotes::selectRaw("tours_notes.*,users.name")->leftjoin('users', 'users.id', '=', 'tours_notes.created_by')->where("category",'5')->where("cart_id",$cart_id)->where("user_type",$user_type)->orderBy('id', 'DESC')->get();

 $all_notes = App\Models\Cms\ToursNotes::selectRaw("tours_notes.*,users.name")->leftjoin('users', 'users.id', '=', 'tours_notes.created_by')->orderBy('id', 'DESC')->where("cart_id",$cart_id)->where("user_type",$user_type)->get();
 /*$cart_data = App\Models\Cms\CartExperience::selectRaw("id,resign_notes,resign_notes_date")->where("id",$cart_id)->first();
 $count_note = !empty($cart_data->resign_notes)?1:0;*/
?>
<style type="text/css">
.note {
    margin: 0px 0px !important;
}
.body.delete-note {
    margin-bottom: 7px;
}
.img-note{
    height: 40px !important;width: 30px !important;
}
.body.delete-note {
    width: 100% !important;
}
li.note ul{display:none}

ul.notes, ul.notes ul {
    list-style: none;
     margin: 0;
     padding: 0;
   } 
   ul.notes ul {
     margin-left: 10px;
   }
   ul.notes li {
     margin: 0;
     padding: 0 10px;
     line-height: 20px;
     color: #369;
     font-weight: bold;
     border-left:2px solid #ddd;

   }
   ul.notes > li {
    border:none;
   }
   ul.notes li:last-child {
       border-left:none;
   }
   ul.notes li:before {
      position:relative;
      top:-0.3em;
      height:1em;
      width:10px;
      color:white;
      border-bottom:2px solid #ddd;
      content:"";
      display:inline-block;
      left:-10px;
   }
   
   ul.notes li:last-child:before {
      border-left:2px solid #ddd;   
   }
   ul.notes > li:before {
    border:none !important;
    }
</style>
<div class="tabs_wrapper">
    <ul class="notestabs" style="margin-bottom: 15px;margin-top: 0px;">
        <li class="active" href=".notestab1" style="border-left: 0;">
            General Notes ({{!empty($general_notes->count())?$general_notes->count():'0'}})
        </li>
        <li href=".notestab2">
            Room Requests ({{!empty($room_req_notes->count())?$room_req_notes->count():'0'}})
        </li>
        <li href=".notestab3">
            Amendments ({{!empty($amendements_notes->count())?$amendements_notes->count():'0'}})
            
        </li>
        <li href=".notestab4">
            Hotels ({{!empty($hotels_notes->count())?$hotels_notes->count():'0'}})
        </li>
        <li href=".notestab5">
            Experiences ({{!empty($exp_notes->count())?$exp_notes->count():'0'}})
        </li>
         <li href=".notestab6">
            All Notes ({{!empty($all_notes->count())?$all_notes->count():'0'}})
        </li>
    </ul>
    <br>
    
    <!--
     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addNotes">
  Add Note
</button> -->
   
</div>
<div class="notes_tab_content notestab1">
    <form method="POST" action="{{ route('store-tour-reply') }}" enctype="multipart/form-data">
        @csrf
    <button type="button" class="btn btn-primary" data-id="{{$cart_id}}" data-cat="{{$user_type}}" data-cat="1" id="add_notes_popup" style="max-width: 500px;"> Add Note </button>
     <button type="button" class="btn btn-primary" data-cart_id={{$cart_id}} id="general_notes" style="max-width: 500px;"> Delete Note </button>
    <ul class="notes" style="margin-top: 20px;margin-bottom: 20px;">
        <?php
        
        if(!empty($general_notes->count())){
            foreach ($general_notes as $note_row) {
            $level = 0;
         ?>
        <li class="note">

            <div class="header" style="margin-top:-20px;">
                <div class="initials"><?=!empty($note_row->name)?$note_row->name:''?></div>
                <div class="date"><?=!empty($note_row->created_at)?date('d/m/Y',strtotime($note_row->created_at)):''?></div>
            </div>

            <div class="body delete-note" data-id="{{$note_row->id}}">
                <?=!empty($note_row->note)?$note_row->note:''?>
                <br>
                <?php if($note_row->replies->count() > 0){ ?>
                <a href="javascript:void(0);" class="note_replies" style="color:#FCA311;margin-right: 15px;font-weight: 600;"><i class="fas fa-arrow-circle-down"></i> <?php echo $note_row->replies->count(); ?> replies</a> 
                <?php } ?>
                <a href="javascript:void(0);" data-id="{{$note_row->id}}" class="reply_note" style="color:#FCA311;font-weight: 600;"><i class="fas fa-plus-circle"></i> add note</a>
            </div>
            <textarea style="display:none;" class="form-control" id="comment_{{$note_row->id}}" name="comment[{{$note_row->id}}]"></textarea>
            <?php if(!empty($note_row->tour_file)){ ?>
            <a target="_blank" href="{{asset('/tour_notes/'.$note_row->tour_file)}}" class="download_file"><img src="{{asset('/images/pdf.png')}}" class="img-note"></a>
                <?php } ?>
                
                @if(!empty($note_row->replies))
                <?php  //$level = $level + 2;?>
                <ul style="-margin-left: 25px;">
                    {{-- recursively include this view, passing in the new collection of comments to iterate --}}
                    @include('partials.booking.tour_note_reply', ['tour_reply' => $note_row->replies,'level' => $level])
                </ul>
                @endif
        </li>
            
        <?php } } else{ ?> 
            <p>No Notes Found.</p>
        <?php }?>
    </ul>
    <input type="hidden" name="category" value="1">
    <input type="hidden" name="cart_exp_id" value="{{$cart_id}}">
     <button type="submit" class="btn btn-primary" data-id="{{$cart_id}}" data-cat="{{$user_type}}" data-cat="1" id="save_notes_popup" style="max-width: 500px;">Add Note</button>
     </form>
</div>
<div class="notes_tab_content notestab2" style="display: none;">
   <button type="button" class="btn btn-primary" data-id="{{$cart_id}}" data-cat="{{$user_type}}" data-cat="2" id="add_notes_popup" style="max-width: 500px;"> Add Note </button>
    <button type="button" class="btn btn-primary" data-cart_id={{$cart_id}} id="room_notes" style="max-width: 500px;"> Delete Note </button>
    <div class="notes">
        <?php
       
        if(!empty($room_req_notes->count())){
            foreach ($room_req_notes as $note_row) {
         ?>
            <div class="note">

                <div class="header">
                    <div class="initials"><?=!empty($note_row->name)?$note_row->name:''?></div>
                    <div class="date"><?=!empty($note_row->created_at)?date('d/m/Y',strtotime($note_row->created_at)):''?></div>

                </div>

                <div class="body delete-note" data-id="{{$note_row->id}}">
                    <?=!empty($note_row->note)?$note_row->note:''?>
                    <br>
                    
                </div>
                <?php if(!empty($note_row->tour_file)){ ?>
                    <a target="_blank" href="{{asset('/tour_notes/'.$note_row->tour_file)}}" class="download_file"><img src="{{asset('/images/pdf.png')}}" class="img-note"></a>
                    <?php } ?>
            </div>
            <br>
        <?php } } else{ ?> 
            <p>No Notes Found.</p>
        <?php }?>
    </div>
</div>
<div class="notes_tab_content notestab3" style="display: none;">
    <button type="button" class="btn btn-primary" data-id="{{$cart_id}}" id="add_notes_popup" data-cat="{{$user_type}}" data-cat="3" style="max-width: 500px;"> Add Note </button>
     <button type="button" class="btn btn-primary" data-cart_id={{$cart_id}} id="ame_notes" style="max-width: 500px;"> Delete Note </button>
    <div class="notes">
    <?php
    
    if(!empty($amendements_notes->count())){
        foreach ($amendements_notes as $note_row) {
     ?>
        <div class="note">

            <div class="header">
                <div class="initials"><?=!empty($note_row->name)?$note_row->name:''?></div>
                <div class="date"><?=!empty($note_row->created_at)?date('d/m/Y',strtotime($note_row->created_at)):''?></div>
            </div>

            <div class="body delete-note" data-id="{{$note_row->id}}">
                <?=!empty($note_row->note)?$note_row->note:''?>
               

            </div>
            <?php $files = $note_row->tour_file;
            if(!empty($note_row->tour_file)) {
                $nfiles = explode(',',$note_row->tour_file);
                foreach($nfiles as $file)
                {
                    ?>
                    <a target="_blank" href="{{asset('/tour_notes/'.$file)}}" title="{{$file}}" class="download_file">
                         <?php if(!empty($file)){ ?><img src="{{asset('/images/pdf.png')}}" class="img-note"><?php } ?></a>
                    <?php
                }
            }?>
            
            
        </div>
        <br>
     <?php } } else{ ?> 
       <p>No Notes Found.</p>
        <?php }?>
       
    <br>
    </div>
</div>
<div class="notes_tab_content notestab4" style="display: none;">
    <button type="button" class="btn btn-primary" data-id="{{$cart_id}}" data-cat="{{$user_type}}" data-cat="4" id="add_notes_popup" style="max-width: 500px;"> Add Note </button>
     <button type="button" class="btn btn-primary" data-cart_id={{$cart_id}} id="hot_notes" style="max-width: 500px;"> Delete Note </button>
    <div class="notes">
    <?php
    
    if(!empty($hotels_notes->count())){
        foreach ($hotels_notes as $note_row) {
     ?>
        <div class="note">

            <div class="header">
                <div class="initials"><?=!empty($note_row->name)?$note_row->name:''?></div>
                <div class="date"><?=!empty($note_row->created_at)?date('d/m/Y',strtotime($note_row->created_at)):''?></div>
            </div>

            <div class="body delete-note" data-id="{{$note_row->id}}">
                <?=!empty($note_row->note)?$note_row->note:''?>
                

            </div>
            <?php if(!empty($note_row->tour_file)){ ?>
            <a target="_blank" href="{{asset('/tour_notes/'.$note_row->tour_file)}}" class="download_file"><img src="{{asset('/images/pdf.png')}}" class="img-note"></a>
            <?php } ?>
        </div>
        <br>
     <?php } } else{ ?> 
            <p>No Notes Found.</p>
        <?php }?>
    </div>
</div>
<div class="notes_tab_content notestab5" style="display: none;">
   <button type="button" class="btn btn-primary" data-id="{{$cart_id}}" id="add_notes_popup" data-cat="{{$user_type}}" data-cat="5" style="max-width: 500px;"> Add Note </button>
    <button type="button" class="btn btn-primary" data-cart_id={{$cart_id}} id="exp_notes" style="max-width: 500px;"> Delete Note </button>
    <div class="notes">
    <?php
    
    if(!empty($exp_notes->count())){
        foreach ($exp_notes as $note_row) {
     ?>
        <div class="note">

            <div class="header">
                <div class="initials"><?=!empty($note_row->name)?$note_row->name:''?></div>
                <div class="date"><?=!empty($note_row->created_at)?date('d/m/Y',strtotime($note_row->created_at)):''?></div>
            </div>

            <div class="body delete-note" data-id="{{$note_row->id}}">
                <?=!empty($note_row->note)?$note_row->note:''?>
               
            </div>
            <?php if(!empty($note_row->tour_file)){ ?>
            <a target="_blank" href="{{asset('/tour_notes/'.$note_row->tour_file)}}" class="download_file"><img src="{{asset('/images/pdf.png')}}" class="img-note"></a>
            <?php } ?>
        </div>
        <br>
     <?php } } else{ ?> 
            <p>No Notes Found.</p>
        <?php }?>
    </div>
</div>
<div class="notes_tab_content notestab6" style="display: none;">
   <button type="button" class="btn btn-primary" data-id="{{$cart_id}}" id="add_notes_popup" style="max-width: 500px;"> Add Note </button>
    <button type="button" class="btn btn-primary" data-cart_id={{$cart_id}} id="all_notes" style="max-width: 500px;"> Delete Note </button>
    <div class="notes">
    <?php
    
    if(!empty($all_notes->count())){
        foreach ($all_notes as $note_row) {
     ?>
        <div class="note">

            <div class="header">
                <div class="initials"><?=!empty($note_row->name)?$note_row->name:''?></div>
                <div class="date"><?=!empty($note_row->created_at)?date('d/m/Y',strtotime($note_row->created_at)):''?></div>
            </div>

            <div class="body delete-note" data-id="{{$note_row->id}}">
                <?=!empty($note_row->note)?$note_row->note:''?>
                

            </div>
            <?php if(!empty($note_row->tour_file)){ ?>
            <a target="_blank" href="{{asset('/tour_notes/'.$note_row->tour_file)}}" class="download_file"><img src="{{asset('/images/pdf.png')}}" class="img-note"></a>
            <?php } ?>
        </div>
        <br>
     <?php } } else{ ?> 
            <p>No Notes Found.</p>
        <?php }?>
    </div>
</div>
<script type="text/javascript">
    
    $('.reply_note').click(function(){
        var id = $(this).data('id');
        $('#comment_'+id).show();
    });
</script>