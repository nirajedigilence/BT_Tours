
<form method="post" enctype="multipart/form-data" name="formImages" id="formImages">
    {{ csrf_field() }}
    <div class="col-sm-11 well">
        <div class="nonboxy-widget">
            <div class="widget-head">
                <h5>Image Name</h5>
            </div>
            <div class="widget-content">
                <div class="widget-box">
                    <fieldset>
                        <div class="control-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label class="control-label" for="name">Name</label>
                            <div class="controls">
                                <input type="text" name="name" value="@if ( isset($row)){{ old('name', optional($row)->name) }}@endif" class="form-control form-control-sm text-tip" id="image_name" title="Enter Image Name">
                                {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
            <div class="form-actions">
                <button type="submit" name="SubmitImage" class="btn btn-info">Save Changes</button>
                <script>
                    $(document).ready(function () {
                        @if ( isset(optional($row)->id))
                        $(".btn-danger,#buttonCloseEventClient").bind("click", function () {
                            $("#editImage").hide();
                        });
                        $("button[name=SubmitImage]").bind("click", function () {
                            $('.loader').show();
                            var image_name = $("#image_name").val();
                            $.ajax({
                                type: "POST",
                                url: "{{route('update.dbexperience.image')}}",
                                data: {
                                    "id": {{optional($row)->id}},
                                    "name": image_name,
                                    _token: '{{csrf_token()}}'
                                },
                                success: function (res) {
                                    $('.loader').hide();
                                    console.log("success");
                                    console.log(res);
                                    $("#editImage").hide();
                                    getImages();
                                },
                                error: function (er) {
                                    console.log(er);
                                }
                            });
                            return false;
                        });
                        @endif
                    });
                </script>
            </div>
        </div>
    </div>

    <div class="clear"></div>
</form>


