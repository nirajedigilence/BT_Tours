<?php
$general_notes = App\Models\Cms\ToursNotes::selectRaw("tours_notes.*,users.name")->leftjoin('users', 'users.id', '=', 'tours_notes.created_by')->where("category",'1')->where("cart_id",$cart_id)->where("user_type",$user_type)->orderBy('id', 'DESC')->get();
 
 $amendements_notes = App\Models\Cms\ToursNotes::selectRaw("tours_notes.*,users.name")->leftjoin('users', 'users.id', '=', 'tours_notes.created_by')->where("category",'3')->where("cart_id",$cart_id)->where("user_type",$user_type)->orderBy('id', 'DESC')->get();
 $room_req_notes = App\Models\Cms\ToursNotes::selectRaw("tours_notes.*,users.name")->leftjoin('users', 'users.id', '=', 'tours_notes.created_by')->where("category",'2')->where("cart_id",$cart_id)->where("request_by",auth()->id())->where("user_type",$user_type)->orderBy('id', 'DESC')->get();
 
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
</style>
<div class="tabs_wrapper">
    <ul class="notestabs" style="margin-bottom: 15px;margin-top: 0px;">
      <!--   <li class="active" href=".notestab1" style="border-left: 0;">
            General Notes ({{!empty($general_notes->count())?$general_notes->count():'0'}})
        </li> -->
        <li href=".notestab2" class="active" style="border-left: 0;">
            Room Requests ({{!empty($room_req_notes->count())?$room_req_notes->count():'0'}})
        </li>
        <li href=".notestab3">
            Amendments ({{!empty($amendements_notes->count())?$amendements_notes->count():'0'}})
            
        </li>
        
    </ul>
    <br>
    
    <!--
     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addNotes">
  Add Note
</button> -->
   
</div>
<!-- <div class="notes_tab_content notestab1" style="display: none;">
    <button type="button" class="btn btn-primary" data-id="{{$cart_id}}" data-cat="{{$user_type}}" data-cat="1" id="add_notes_popup" style="max-width: 500px;"> Add Note </button>
    
    <div class="notes">
        <?php
        
        if(!empty($general_notes->count())){
            foreach ($general_notes as $note_row) {
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
</div> -->
<div class="notes_tab_content notestab2">
   <!-- <button type="button" class="btn btn-primary" data-id="{{$cart_id}}" data-cat="{{$user_type}}" data-cat="2" id="add_notes_popup" style="max-width: 500px;"> Add Note </button> -->
    <!-- <button type="button" class="btn btn-primary" data-cart_id={{$cart_id}} id="room_notes" style="max-width: 500px;"> Delete Note </button> -->
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
                    <?php  $note = explode('Note :', $note_row->note);
                    ?>
                    <?=!empty($note[0])?$note[0]:''?>
                    <br>
                    
                </div>
                <?php if(!empty($note_row->tour_file)){

                $tour_notes = explode(',',$note_row->tour_file);

                foreach($tour_notes as $trow){ ?> 
                <a target="_blank" href="{{asset('/tour_notes/'.$trow)}}" class="download_file"><img src="{{asset('/images/pdf.png')}}" class="img-note"></a> &nbsp;&nbsp;&nbsp;&nbsp;
                    <?php } }?>
            </div>
            <br>
        <?php } } else{ ?> 
            <p>No Notes Found.</p>
        <?php }?>
    </div>
</div>
<div class="notes_tab_content notestab3" style="display: none;">
    <!-- <button type="button" class="btn btn-primary" data-id="{{$cart_id}}" id="add_notes_popup" data-cat="{{$user_type}}" data-cat="3" style="max-width: 500px;"> Add Note </button>
     <button type="button" class="btn btn-primary" data-cart_id={{$cart_id}} id="ame_notes" style="max-width: 500px;"> Delete Note </button> -->
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
            <?php /*$files = $note_row->tour_file;
            if(!empty($note_row->tour_file)) {
                $nfiles = explode(',',$note_row->tour_file);
                foreach($nfiles as $file)
                {
                    ?>
                    <a target="_blank" href="{{asset('/tour_notes/'.$file)}}" title="{{$file}}" class="download_file">
                         <?php if(!empty($file)){ ?><img src="{{asset('/images/pdf.png')}}" class="img-note"><?php } ?></a>
                    <?php
                }
            } */?>
            
            
        </div>
        <br>
     <?php } } else{ ?> 
       <p>No Notes Found.</p>
        <?php }?>
       
    <br>
    </div>
</div>
