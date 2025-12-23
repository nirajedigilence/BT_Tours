<style type="text/css">
    label {
         text-transform: unset; 
    }
    .highlight {
        width: 200px;
        height: 120px;
        border: 3px dashed #ddd;
        margin: 0 10px;
    }
    .database_edit_container .main .column .print_gallery .gallery .gallery__item:nth-child(n+4) {
        margin: 0 10px;
        margin-bottom: 10px;
    }
    .database_edit_container .main .column .print_gallery .gallery .gallery__item {
        margin-bottom: 10px;
    }
    .borderRed{
        border-color: red !important;
    }
</style>
<div class="popup_content">
    <a id="closePopup" href="javascript:;" style="float: right;color: red;font-size: 25px;">
        <i class="fas fa-times"></i>
    </a>
     @if(session()->has('error'))
        <div class="alert alert-danger">
            {{ session()->get('error') }}
        </div>
    @endif
    @if(session()->has('success'))
        <div class="alert alert-success" style="background: lightcyan;">
            {{ session()->get('success') }}
        </div>
    @endif
    <div class="heading">
        Edit Profile
    </div>

    <div class="description">
        Here you can edit internal information about this collaborator
    </div>
    <form id="collabData">
        <div class="sections">

            <div class="section w_50">

                <div class="form">
                    
                    <div style="font-size: 16px;margin-top: 15px;margin-bottom: 15px;font-weight: 600;color: #000;">
                        General information
                    </div>
                    <div class="grouped">
                        <div class="fieldset half">
                            <label>Address</label>
                            <input type="hidden" name="user_detail_id" value="{{ isset($collaboratorDetails->id) ? $collaboratorDetails->id : '' }}">
                            <input type="hidden" name="user_id" value="{{ $collaborator->id }}">
                            <input type="text" name="address" value="{{ isset($collaboratorDetails->address) ? $collaboratorDetails->address : '' }}">
                        </div>
                        <div class="fieldset half">
                            <label>Main contact number</label>
                            <input type="text" name="main_contact_number" value="{{ isset($collaboratorDetails->main_contact_number) ? $collaboratorDetails->main_contact_number : '' }}">
                        </div>
                    </div>
                    <div class="grouped">
                        <div class="fieldset half">
                            <label>General Email</label>
                            <input type="text" value="{{ isset($collaborator->email) ? $collaborator->email : '' }}" readonly>
                        </div>
                        <div class="fieldset half">
                            <label>Owner</label>
                            <input type="text" name="owner" value="{{ isset($collaboratorDetails->owner) ? $collaboratorDetails->owner : '' }}">
                        </div>
                    </div>
                    <div class="grouped">
                        <div class="fieldset half">
                            <label>Website link</label>
                            <input type="text" name="website_link" value="{{ isset($collaboratorDetails->website_link) ? $collaboratorDetails->website_link : '' }}">
                        </div>
                        <div class="fieldset half">
                            <label>Social media 1</label>
                            <input type="text" name="social_media_link_1" value="{{ isset($collaboratorDetails->social_media_link_1) ? $collaboratorDetails->social_media_link_1 : '' }}">
                        </div>
                    </div>
                    <div class="grouped">
                        <div class="fieldset half">
                            <label>Social media 2</label>
                            <input type="text" name="social_media_link_2" value="{{ isset($collaboratorDetails->social_media_link_2) ? $collaboratorDetails->social_media_link_2 : '' }}">
                        </div>
                        <div class="fieldset half">
                            <label>Social media 3</label>
                            <input type="text" name="social_media_link_3" value="{{ isset($collaboratorDetails->social_media_link_3) ? $collaboratorDetails->social_media_link_3 : '' }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="section w_50">
                <div class="form">
                    <div style="font-size: 16px;margin-top: 15px;margin-bottom: 15px;font-weight: 600;color: #000;">
                        Picture
                    </div>
                    <div class="fieldset half">
                        <label>Collaborator Picture</label>
                        <?php 
                        if(!empty($image)){
                            echo '<img id="currentImg" src="'.asset('storage/'.$image->file).'">';
                        }
                        ?>
                        <div id="files_list_images"></div>
                        <p id="loading"></p>
                        <input type="hidden" name="file_id" id="file_id" value="">
                        <input type="file" id="fileupload" name="photos[]" data-url="{{ route('upload.dbcollab.image') }}">
                    </div>
                    <div style="font-size: 16px;margin-top: 15px;margin-bottom: 15px;font-weight: 600;color: #000;">
                        Map Link
                    </div>
                    <div class="fieldset half">
                        <label>Map url</label>
                        <input type="text" name="map_link" value="{{ isset($collaboratorDetails->map_link) ? $collaboratorDetails->map_link : '' }}">
                    </div>
                </div>
            </div>
        </div>
        <input type="button" name="submit" class="btn btn-primary" id="collabFormSubmit" value="Save">
    </form>
        <div class="box m-0 mt-2">
            <a data-assigned-id="" data-toggle="modal" data-target="#subAccountModel" class="mt-4 btn btn-primary open-subaccount margintop" tabindex="-1">  
                Create a sub account
             </a>
            <div class="row ">
                <input type="hidden" name="account_id" value="<?php echo isset($accountInfo->id) ? $accountInfo->id : ''; ?>">
                @if(!empty($subAccountInfo))
                @foreach ($subAccountInfo as $row)
                <div class="col-sm-4 box">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label style="color: #000">Name</label>
                                <br>
                                {{!empty($row->first_name)?$row->first_name:''}} {{!empty($row->last_name)?$row->last_name:''}}
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label style="color: #000">Email</label>
                                <br>
                                {{!empty($row->email)?$row->email:''}}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label style="color: #000">Job Title</label>
                                <br>
                                {{!empty($row->title)?$row->title:''}}
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label style="color: #000">Tel</label>
                                <br>
                                {{!empty($row->telephone)?$row->telephone:''}}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                    <a data-assigned-id="{{ $row->id }}" data-toggle="modal" data-target="#subAccountModel" class=" open-subaccount margintop mr-2 text-success" style="cursor: pointer;" tabindex="-1">  
                        <b>Change Details</b>
                    </a>
                    <a href="{{URL::to('super-user/delete-subaccount/'.$row->id)}}" onclick="return confirm('Are you sure you want to delete?')" class="margintop mr-2 text-danger" tabindex="-1">  
                        <b>Remove</b>
                    </a>
                    <!-- <form method="POST" action="delete-subaccount/{{ $row->id }}" class="">
                    @csrf
                    <input class="btn btn-danger" type="submit" value="Remove" onclick="return confirm('Are you sure you want to delete?')" />
                    
                    </form> -->
                    </div>
                    </div>
                    </div>
                </div>
                @endforeach 
                @endif
            </div>
        </div><!-- end box sub account  -->
</div>

<script src="{{ asset('js/jQuery-File-Upload/js/vendor/jquery.ui.widget.js') }}"></script>
<script src="{{ asset('js/jQuery-File-Upload/js/jquery.iframe-transport.js') }}"></script>
<script src="{{ asset('js/jQuery-File-Upload/js/jquery.fileupload.js') }}"></script>
<div class="modal" id="editImage">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Image</h4>
                    <button type="button" class="close" data-dismiss="modal" id="buttonCloseEventClient">×</button>
                </div>
                <div class="modal-body">
                    <p id="holderEditImage">

                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="subAccountModel" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width: 60%; margin: 1.75rem auto;">
        <div class="modal-content">
            
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function () {
             $(document).on('click','#chk_all',function(){
                 if ($(this).is(":checked")) {
                  $('.tagchkbox').prop("checked",true);
                 }
                 else
                 {
                  $('.tagchkbox').prop("checked",false);
                 }
              });
            $('.open-subaccount').click(function () {
                var id = $(this).data('assigned-id');
                var collaborator_id = '<?=$collaborator_id?>';
                if(id == '')
                {
                    var route = "<?=URL::to('/super-user/add-subaccount/')?>/"+collaborator_id;
                }
                else
                {
                    var route = "<?=URL::to('super-user/edit-subaccount')?>/"+id+"/"+collaborator_id;
                }
                
                $('.modal-content').load(route);
            });

        });
    $('#fileupload').fileupload({
        dataType: 'json',
        add: function (e, data) {
            $('#loading').text('Uploading...');
            
            data.submit();
        },
        done: function (e, data) {
            console.log("done");
            $.each(data.result.files, function (index, file) {
                $('<p/>').html(file.name + ' (' + file.size + ' KB)').appendTo($('#files_list_images'));
                $('#currentImg').hide();
                if ($('#file_id').val() != '') {
                    $('#file_id').val($('#file_id').val() + ',');
                }
                $('#file_id').val($('#file_id').val() + file.fileID);
            });
            $('#loading').text('');
        },
        error: function(er){
            console.log(er);
        }
    });
   
    function validate(evt) {
        var theEvent = evt || window.event;

        if (theEvent.type === 'paste') {
            key = event.clipboardData.getData('text/plain');
        } else {
            var key = theEvent.keyCode || theEvent.which;
            key = String.fromCharCode(key);
        }
        var regex = /[0-9]|\./;
        if( !regex.test(key) ) {
            theEvent.returnValue = false;
            if(theEvent.preventDefault) theEvent.preventDefault();
        }
    }
</script>