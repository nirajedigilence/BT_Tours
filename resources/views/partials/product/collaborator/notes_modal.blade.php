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
                        Comments
                    </div>
                    <div class="ctSubCls">
                        Want to give us your feedback? In the comment box below, answer these 3 questions.
                    </div>
                    <div class="ctSub2Cls">
                        What do you like about this prototype?
                    </div>
                    <div class="ctSub2Cls">
                         What are the things that you don't like about this prototype?
                    </div>
                    <div class="ctSub2Cls">
                         How can it be improved?
                    </div>
                    
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="exampleInputEmail1" style="color: gray;">Comment box</label>
                    <textarea name="comment_box" class="form-control commentBoxCls" rows="7"></textarea>
                    <input type="hidden" name="productIdsCls" class="productIdsCls" value="{{$product_id}}" >
                </div>
            </div>
            <div class="" style="margin-left: 15px;">
                <a class="orangeLink btn postBtnCls orangeLinkBtnCls" href="javascript:;">Post</a>
            </div>
            <div class="col-sm-12">
                <div class="cmtTitleCls">
                    <div class="ctSubCls">
                        Other collaborators thoughts
                    </div>
                </div>
            </div>

            
            <div class="row cmtMailCls">
                <?php 
                foreach ($productCmtList as $key => $value) { ?>
                    <div class="col-sm-12 cmCmtMailCls">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="BarnesMainDivCls">
                                    <span class="BarnesDivCls ml20 fltWCls">Barnes Coaches</span>
                                    <span class="BarnesImgDivCls fltWCls">
                                        <img src="{{ asset('images/logotrans.png') }}" alt="">
                                    </span>
                                    <span class="messageNameCls ml20 fltWCls"><?php echo getUserNames($value->user_id);?></span>
                                </div>
                            </div>
                            <div class="col-sm-9">
                                <div class="BarnesMainDivCls">
                                    <div class="messageHolderWhiteDivCls">
                                        <span class="messageDateCls"><?php echo convert2DMYCmt($value->created_at);?></span>
                                        <span class="messageTxtCls"><?php echo nl2br($value->comments);?></span>
                                    </div>                            
                                </div>                            
                            </div>
                        </div>
                    </div>
                <?php } ?>
                {{-- <div class="col-sm-12 cmCmtMailCls">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="BarnesMainDivCls">
                                <span class="BarnesDivCls ml20 fltWCls">Barnes Coaches</span>
                                <span class="BarnesImgDivCls fltWCls">
                                    <img src="{{ asset('images/logotrans.png') }}" alt="">
                                </span>
                                <span class="messageNameCls ml20 fltWCls">Collaborator Test</span>
                            </div>
                        </div>
                        <div class="col-sm-9">
                            <div class="BarnesMainDivCls">
                                <div class="messageHolderWhiteDivCls">
                                    <span class="messageDateCls">25th February 2019</span>
                                    <span class="messageTxtCls">Curabitur in tempus nisl. Mauris rutrum, tortor vitae iaculis tempus, metus risus suscipit erat, sed venenatis nunc tortor at diam. Aenean malesuada, sem non fringilla faucibus, orci libero auctor lectus, id luctus nisi erat vitae arcu. Etiam dapibus erat massa, ac cursus odio imperdiet aliquam</span>
                                </div>                            
                            </div>                            
                        </div>
                    </div>
                </div> --}}
                
            </div>

        </div>
    </div>
{!! Form::close() !!}
