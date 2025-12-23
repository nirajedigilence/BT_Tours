<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">    
<div class="middleCol completedBooking" id="middleCol" style="width:99%">
    <script>
        var base_url = "{{URL::to('/')}}";
    </script>
    <style type="text/css" media="screen">
       
    </style>
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
        <div class="tableWrapper drag">
            <table id="myTable" class="table">
                <thead>
                    <tr class="headerBooking">
                        <th>Name</th>
                        <th class="visible">Date</th>
                        <th class="visible">Location</th>
                        <th class="visible">likes</th>
                        <th class="visible">Dislikes</th>
                        <th class="visible">Comments</th>
                        <th class="visible">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productList as $productList)
                        <tr class="bodyProductCls openBooking">
                            <td class="proListCls"><b>{{$productList->name}}</b></td>
                            <td class="visible">{{ convert2DMY($productList->created_at) }}</td>
                            <td class="visible">{{$productList->getCountry->name}} - {{$productList->getCountryArea->name}}</td>
                            <td class="visible"><b>{{getProductLikes($productList->id)}}</b></td>
                            <td class="visible"><b>{{getProductUnlikes($productList->id)}}</b></td>
                            <td class="visible"><b>0</b></td>
                            <td class="visible">
                                <a href="{{ route('products-collaborator.show', $productList->id) }}" class="tableActLinkCls">View</a>
                                {{-- <a href="javascript:;" class="tableActLinkCls shareLinkCls" data-id="{{$productList->id}}">Share</a> --}}
                            </td>
                        </tr>

                    @endforeach
                    @empty($productList)
                        <tr class="bodyProductCls openBooking">
                            <td class="proListCls" colspan="7">No records found</td>
                        </tr>
                    @endempty
                </tbody>
            </table>
        </div>

    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>
<script src="{{ asset('js/pages/show_prototype.js') }}"></script>