<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
<link href="{{ asset('css/style-products.css') }}" rel="stylesheet">
<div class="middleCol completedBooking productsection" id="middleCol">
    {!! Form::open(array('route' => 'products-store','method'=>'POST', 'enctype' => 'multipart/form-data', 'class'=>'addProductForm', 'id'=>'addProductForm')) !!}
        <div class="row">
            <div class="rightContentDiv">
                @if(Session::has('success'))
                    <div class="alert alert-success">
                        {!! session('success') !!}
                    </div>

                @elseif(Session::has('error'))
                    <div class="alert alert-error">
                        {!! session('error') !!}
                    </div>
                @endif
                <div class="contentPrototype">
                    <div class="container">
                        <div class="row dividedRow">
                            <?php foreach ($PrototypesList as $key => $value) { ?>
                                <div class="col-sm-6">
                                    <div class="prototypebox">
                                        <h4><?php echo $value->name;?></h4>
                                        <div class="label_disabled">Last edited by <?php echo getUserNames($value->updated_by);?> on <?php echo convert2DMY($value->updated_at);?></div>
                                        <div class="col-sm-12">
                                            <div class="row">
                                                <div class="col-sm-3"><div class="row label_text"><b><?php echo getCntForProductByPrototype($value->id);?> Prototypes</b></div></div>
                                                <div class="col-sm-9"><div class="row label_text"><?php echo $value->getCountry->name;?></div></div>
                                            </div>
                                        </div>
                                        <div style="display: none">
                                            <textarea name="prototypeNotes_<?php echo $value->id;?>" class="prototypeNotes_<?php echo $value->id;?>"><?php echo $value->notes;?></textarea>
                                            <input type="hidden" name="prototypeName_<?php echo $value->id;?>" class="prototypeName_<?php echo $value->id;?>" value="<?php echo $value->name;?>">
                                        </div>
                                        <div class="prototypeactiondiv">
                                            <a href="{{ route('prototypes.show', $value->id) }}" class="prototypeaction">Open</a>
                                            <a href="javascript:;" class="prototypeaction prototypeNameCls"  data-id="<?php echo $value->id;?>">Rename</a>
                                            <a href="javascript:;" class="prototypeaction prototypeNotesCls" data-id="<?php echo $value->id;?>">Notes</a>
                                            <?php if(getCntForProductByPrototype($value->id) <= 0){?>
                                                <a href="javascript:;" class="prototypeaction prototypeRemoveCls text-danger" data-id="<?php echo $value->id;?>">Remove</a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="col-sm-6">
                                <div class="prototypebox">
                                    <a href="javascript:;" data-toggle="modal" data-target="#addFolderModal"><div class="brw_plus"><i class="fas fa-plus"></i></div></a>
                                </div>
                            </div>
                        </div>                        
                    </div>                        
                </div>
            </div>
        </div>
    {!! Form::close() !!}

<!-- Modal -->
<div class="modal fade" id="addFolderModal" tabindex="-1" role="dialog" aria-labelledby="addFolderModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">New Folder</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       {!! Form::open(array('route' => 'prototypes-store','method'=>'POST', 'enctype' => 'multipart/form-data', 'class'=>'addPrototypeForm', 'id'=>'addPrototypeForm')) !!}
            <div class="modal-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="prototype[name]" class="form-control" id="prototype_name" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="selectitems">Select Country</label>
                    <select class="form-control country_id" id="country_id" name="prototype[country_id]">
                        <option value="">Select Country</option>
                        @foreach ($countries as $k => $country)
                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary cancel" data-dismiss="modal">Cancel</button>
                {{-- <button type="button" class="btn btn-primary create">Create</button> --}}
                <input type="submit" name="submit" value="Create" class="btn btn-primary create">
            </div>
        {!! Form::close() !!}
    </div>
  </div>
</div>
<div class="modal fade" id="addNotesModal" tabindex="-1" role="dialog" aria-labelledby="addFolderModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title modalTitleCls" id="exampleModalLongTitle">New Folder</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       {!! Form::open(array('route' => 'prototypes-update','method'=>'POST', 'enctype' => 'multipart/form-data', 'class'=>'addPrototypeNotesForm', 'id'=>'addPrototypeNotesForm')) !!}
            <div class="modal-body">
                <div class="form-group">
                    <label for="name" style="color: gray;">Notes</label>
                    <textarea name="prototype[notes]" rows="11" class="form-control prototypeNotes"></textarea>
                    <input type="hidden" name="id" class="prototype_id">
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary cancel" data-dismiss="modal">Cancel</button>
                {{-- <button type="button" class="btn btn-primary create">Create</button> --}}
                <input type="submit" name="submit" value="Save" class="btn btn-primary create">
            </div>
        {!! Form::close() !!}
    </div>
  </div>
</div>
<div class="modal fade" id="addNameModal" tabindex="-1" role="dialog" aria-labelledby="addFolderModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Rename Prototypes</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       {!! Form::open(array('route' => 'prototypes-update','method'=>'POST', 'enctype' => 'multipart/form-data', 'class'=>'addPrototypeNameForm', 'id'=>'addPrototypeNameForm')) !!}
            <div class="modal-body">
                <div class="form-group">
                    <label for="name" style="color: gray;">Name</label>
                    <input type="text" name="prototype[name]" class="form-control prototypeName" placeholder="Name">
                    <input type="hidden" name="id"class="prototype_id">
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary cancel" data-dismiss="modal">Cancel</button>
                {{-- <button type="button" class="btn btn-primary create">Create</button> --}}
                <input type="submit" name="submit" value="Save" class="btn btn-primary create">
            </div>
        {!! Form::close() !!}
    </div>
  </div>
</div>

<div class="modal fade" id="removePrototypeModal" tabindex="-1" role="dialog" aria-labelledby="addFolderModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Are you sure you want to remove this Prototype?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       {!! Form::open(array('route' => 'prototypes-remove','method'=>'POST', 'enctype' => 'multipart/form-data', 'class'=>'addPrototypeNameForm', 'id'=>'addPrototypeNameForm')) !!}
            <input type="hidden" name="id"class="prototype_id">
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary cancel" data-dismiss="modal">Cancel</button>
                {{-- <button type="button" class="btn btn-primary create">Create</button> --}}
                <input type="submit" name="submit" value="Remove" class="btn btn-primary create">
            </div>
        {!! Form::close() !!}
    </div>
  </div>
</div>
<script src="{{ asset('js/popper.min.js') }}"></script> 
<script src="{{ asset('js/bootstrap.min.js') }}"></script> 
<script src="{{ asset('js/pages/add_prototypes.js') }}"></script>