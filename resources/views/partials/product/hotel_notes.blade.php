{!! Form::open(array('route' => 'products-notes-store','method'=>'POST', 'enctype' => 'multipart/form-data', 'class'=>'notesProductForm', 'id'=>'notesProductForm')) !!}    
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="cmtTitleCls">
                    <div class="ctMainCls">
                        {{$productHotel->name}}
                    </div>
                </div>
            </div>
            <div class=" hotelNotesSec">
                <div class="row">
                    <?php foreach ($productHotelNotesList as $key => $value) { ?>
                        <div class="notesSubSection">
                            <div class="col-sm-12">
                                <span class="hotelNotesUser"><?php echo getUserNames($value->user_id);?></span>
                                <span class="hotelNotesDate"><?php echo convert2DMYNotes($value->created_at);?></span>
                                <div class="hotelNotesDesc">
                                    <div class="row">
                                        <div class="col-sm-10">
                                            <span class="hnDTxt"><?php echo nl2br($value->notes);?></span>
                                        </div>                            
                                        <div class="col-sm-2">
                                            <a href="javascript:;" class="nhSubCloseCls" data-id="{{$value->id}}">×</a>
                                        </div>                            
                                    </div>                            
                                </div>                            
                            </div>
                        </div>   
                    <?php }  ?>                
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    {{-- <label for="exampleInputEmail1" style="color: gray;">Add Notes</label> --}}
                    <textarea name="comment_box" class="form-control commentBoxCls" rows="7" placeholder="Add notes"></textarea>
                    <input type="hidden" name="productHotelIdsCls" class="productHotelIdsCls" value="{{$product_hotel_id}}" >
                </div>
            </div>
            <div class="" style="margin-left: 15px;">
                <a class="orangeLink btn postBtnCls orangeLinkBtnCls" href="javascript:;">Add</a>
            </div>
            
        </div>
    </div>
{!! Form::close() !!}
