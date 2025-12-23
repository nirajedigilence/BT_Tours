<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLongTitle">Share with collaborator</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body" >
    <div class="row">
        <div class="col-sm-5">
            <div class="form-group">
                <label for="exampleInputEmail1" style="color: gray;">URL</label>
                <input type="text" class="form-control" id="copyUrlCls" name="copyUrl" value="{{ route('products-edit', $product_id) }}">
                <input type="hidden" class="form-control" id="product_id" name="product_id" value="{{ $product_id }}">
            </div>
        </div>
        <div class="col-sm-1 cloneMainUrlCls">
            <a href="javascript:;" class="cloneUrlCls"><i class="fa fa-clone" aria-hidden="true"></i></a>
        </div>
        <div class="col-sm-6">
        </div>
    </div>
    <div class="topBox customchkmain">
        <div class="check_row">
            <div class="heading">Share with a specific collaborator</div>
            <div class="fl_w">
                @foreach ($collaboratorList as $user)
                    <div class="checkarea_part">
                        <label class="checkbox_div">
                            <?php
                            if (in_array($user->id, $productShareArray)){ ?>
                                <input type="checkbox" name="users[{{$user->id}}]" value="1" checked="" class="custom_chkbox" data-id="{{$user->id}}"> 
                            <?php }else{ ?>
                                <input type="checkbox" name="users[{{$user->id}}]" value="1" data-id="{{$user->id}}" class="custom_chkbox"> 
                            <?php } ?>
                                {{-- <input type="checkbox" name="users[{{$user->id}}]" value="1" data-id="{{$user->id}}" class="custom_chkbox">  --}}
                                {{$user->name}}
                          <span class="checkmark"></span>
                        </label>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <input type="hidden" name="proSectionID" class="proSectionID">
    <input type="hidden" name="thisValCls" class="thisValCls">
    <button type="button" class="btn btn-secondary cancel" data-dismiss="modal">Cancel</button>
    <a href="javascript:;" class="btn btn-primary create saveShareBtn">Share</a>                
    {{-- <input type="submit" name="submit" value="Share" class="btn btn-primary create" style="background-color: #FCA311; border-color: #FCA311;"> --}}
</div>
