{{-- <link rel="stylesheet" href="{{ asset('css/style-products.css') }}">     --}}
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">    
<div class="middleCol completedBooking" id="middleCol" style="width:99%">
    <script>
        var base_url = "{{URL::to('/')}}";
    </script>
    @if(Session::has('success'))
        <div class="alert alert-success">
            {!! session('success') !!}
        </div>
    @elseif(Session::has('error'))
        <div class="alert alert-error">
            {!! session('error') !!}
        </div>
    @endif
    <div class="contentBooking">
        <h1 class="pageHeaderCls">{{$PrototypesList->name}}</h1>
        <div class="headerRow">
            <a class="orangeLink addProductBtn" href="{{ route('products-create', $PrototypesList->id) }}">New Prototype</a>
        </div>
        <div class="headerRow">
            <a class="orangeLink" href="{{ route('prototypes') }}" style="color:#FCA311"> < Back to Prototype folders</a>
        </div>

        <div class="tableWrapper drag">
            <table id="myTable" class="table">
                <thead>
                    <tr class="headerBooking">
                        <th>Name</th>
                        <th class="visible">Location</th>
                        <th class="visible">Created by</th>
                        <th class="visible">likes</th>
                        <th class="visible">Dislikes</th>
                        <th class="visible">&nbsp;</th>
                        <th class="visible">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productList as $productList)
                        <tr class="bodyProductCls openBooking">
                            <td class="proListCls"><b>{{$productList->name}}</b></td>
                            <td class="visible">{{$productList->getCountry->name}} - {{$productList->getCountryArea->name}}</td>
                            <td class="visible">{{getUserNames($productList->created_by)}}</td>
                            <td class="visible"><b>{{getProductLikes($productList->id)}}</b></td>
                            <td class="visible"><b>{{getProductUnlikes($productList->id)}}</b></td>
                            <td class="visible">
                                <a href="{{ route('products-tour', $productList->id) }}" class="tableActLinkCls">Complete</a>
                                <a href="javascript:;" class="tableActLinkCls shareLinkCls" data-id="{{$productList->id}}" data-protoid="{{$PrototypesList->id}}">Share</a>
                                <a href="javascript:;" class="tableActLinkCls commentsLinkCls" data-id="{{$productList->id}}" data-protoid="{{$PrototypesList->id}}">Comments</a>
                                <a href="javascript:;" class="tableActLinkCls notesLinkCls" data-id="{{$productList->id}}" data-protoid="{{$PrototypesList->id}}">Notes</a>
                            </td>
                            <td class="visible">
                                <a href="{{ route('products-edit', $productList->id) }}" class="tableActLinkCls">Edit</a>
                                <a href="javascript:;" class="tableActLinkCls MoveLinkCls"  data-id="{{$productList->id}}" data-protoid="{{$PrototypesList->id}}">Move</a>
                                <a href="javascript:;" class="tableActLinkCls removeLinkCls" data-id="{{$productList->id}}" data-protoid="{{$PrototypesList->id}}">Remove</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>

<div class="modal fade" id="prototypeShareModal" tabindex="-1" role="dialog" aria-labelledby="addFolderModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: calc(100% - (1.75rem * 10));">
        <div class="modal-content appendModalData">
            
        </div>
    </div>
</div>

<div class="modal fade" id="prototypeNotesModal" tabindex="-1" role="dialog" aria-labelledby="addFolderModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: calc(100% - (1.75rem * 50));">
        <div class="modal-content">
            {!! Form::open(array('route' => 'products-notes-update','method'=>'POST', 'enctype' => 'multipart/form-data', 'class'=>'storeProductsForm', 'id'=>'storeProductsForm')) !!}    
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Notes</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" >
                            <div class="form-group">
                                <label for="exampleInputEmail1" style="color: gray;">Notes</label>
                                <textarea name="product_notes" id="product_notes" rows="11" class="form-control product_notes"></textarea>
                                <input type="hidden" class="form-control" id="productId" name="product_id" value="">
                                <input type="hidden" class="form-control" id="proToId" name="proToId" value="">
                            </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="proSectionID" class="proSectionID">
                    <input type="hidden" name="thisValCls" class="thisValCls">
                    <button type="button" class="btn btn-secondary cancel" data-dismiss="modal">Cancel</button>
                    <input type="submit" name="submit" value="Save" class="btn btn-primary create" style="background-color: #FCA311; border-color: #FCA311;">
                </div>
            {!! Form::close() !!}

            
        </div>
    </div>
</div>

<div class="modal fade" id="removeProductModal" tabindex="-1" role="dialog" aria-labelledby="addFolderModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Are you sure you want to remove this Product?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       {!! Form::open(array('route' => 'product-remove','method'=>'POST', 'enctype' => 'multipart/form-data', 'class'=>'addPrototypeNameForm', 'id'=>'addPrototypeNameForm')) !!}
            <input type="hidden" class="form-control" id="productsId" name="product_id" value="">
            <input type="hidden" class="form-control" id="proTosId" name="proToId" value="">
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary cancel" data-dismiss="modal">Cancel</button>
                {{-- <button type="button" class="btn btn-primary create">Create</button> --}}
                <input type="submit" name="submit" value="Remove" class="btn btn-primary create">
            </div>
        {!! Form::close() !!}
    </div>
  </div>
</div>

<div class="modal fade" id="prototypeMoveModal" tabindex="-1" role="dialog" aria-labelledby="addFolderModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: calc(100% - (1.75rem * 50));">
        <div class="modal-content">
            {!! Form::open(array('route' => 'products-move-update','method'=>'POST', 'enctype' => 'multipart/form-data', 'class'=>'moveProductsForm', 'id'=>'moveProductsForm')) !!}    
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Notes</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" >
                        <input type="hidden" class="form-control" id="productMoveId" name="product_id" value="">
                        <input type="hidden" class="form-control" id="proToMoveId" name="proToId" value="">
                    <div class="form-group">
                        <label for="exampleInputEmail1" style="color: gray;">Prototype</label>
                        <div class="formGroupCls">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="proSectionID" class="proSectionID">
                    <input type="hidden" name="thisValCls" class="thisValCls">
                    <button type="button" class="btn btn-secondary cancel" data-dismiss="modal">Cancel</button>
                    <input type="submit" name="submit" value="Save" class="btn btn-primary create" style="background-color: #FCA311; border-color: #FCA311;">
                </div>
            {!! Form::close() !!}

            
        </div>
    </div>
</div>
<div class="modal fade" id="productCommentModal" tabindex="-1" role="dialog" aria-labelledby="addFolderModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: calc(100% - (1.75rem * 10));">
        <div class="modal-content appendCommentModalData">
            
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>
<script src="{{ asset('js/pages/show_prototype.js') }}"></script>