<?php

 $hotels_notes = App\Models\Cms\StockHotelNotes::selectRaw("stock_hotel_notes.*")->where("hotel_date_id",$hotel_date_id)->orderBy('id', 'DESC')->get();

 /*$cart_data = App\Models\Cms\CartExperience::selectRaw("id,resign_notes,resign_notes_date")->where("id",$cart_id)->first();
 $count_note = !empty($cart_data->resign_notes)?1:0;*/
?>
<style type="text/css">
    .notestabs {
        display: flex;
        position: relative;
        width: 100%;
        margin-top: 50px;
        z-index: 1;
    }
    .note {
    margin: 0px 0px !important;
    }
    .notestabs li {
    flex: 1;
    list-style: none;
    position: relative;
    border-left: solid 1px #14213D;
    border-bottom: none;
    font-size: 20px;
    font-weight: 600;
    line-height: 1.2;
    text-align: center;
    color: #14213D;
    padding: 10px;
    cursor: pointer;
    transition: all 0.4s ease;
}
.notes_tab_content.notestab1 {
    /* float: left; */
    /* width: 1000px; */
    overflow-y: auto;
    max-height: 1000px;
}
.heading {
    font-size: 1.5rem;
    font-weight: 700;
    line-height: 1.2;
    color: #14213D;
    margin-bottom: 25px;
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
        
        <li href=".notestab4" style="cursor: none;border: none;">
            Hotels ({{!empty($hotels_notes->count())?$hotels_notes->count():'0'}})
        </li>
       
    </ul>
    <br>
    
    <!--
     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addNotes">
  Add Note
</button> -->
   
</div>

<div class="notes_tab_content notestab4" >
    <button type="button" class="btn btn-primary" data-id="{{$hotel_date_id}}" data-cat="{{$user_type}}" data-cat="4" id="add_notes_popup" style="max-width: 500px;"> Add Note </button>
     <button type="button" class="btn btn-primary" data-cart_id={{$hotel_date_id}} id="hot_notes" style="max-width: 500px;"> Delete Note </button>
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
