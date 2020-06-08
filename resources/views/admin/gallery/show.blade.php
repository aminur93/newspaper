@extends('layouts.admin.master')

@section('page')
Show Image {{ $gallery->folder_name }}
@endsection

@push('css')
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div id="success_message"></div>

            <div id="error_message"></div>

            <div class="card">
                <div class="card-header">
                    <button data-toggle="modal" data-target="#imageModal" class="btn btn-sm btn-primary  float-right"><i class="fas fa-plus"></i> Add Image</button>
                    <h3 class="card-title">@yield('page')</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body" id="folder">
                    <h5 class="mb-2">Album {{ $gallery->folder_name }}</h5>
                    <div class="row">
                        <div class="col-md-3">

                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>

    <!--Add DropZone Image Upload-->
    <div class="modal fade bd-example-modal-lg" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">@yield('page')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <div class="modal-body">
                        <form method="post" action="{{ route('gallery.upload',$gallery->id) }}" class="dropzone" id="dropzone" enctype="multipart/form-data">
                            @csrf
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
            </div>
        </div>
    </div>
@endsection


@push('js')
    <script type="text/javascript">

        Dropzone.options.dropzone =
            {
                maxFilesize: 12,
                renameFile: function(file) {
                    var dt = new Date();
                    var time = dt.getTime();
                    return time+file.name;
                },
                acceptedFiles: ".jpeg,.jpg,.png,.gif",
                addRemoveLinks: true,
                timeout: 5000,
                removedfile: function(file)
                {
                    var _token = $('input[name = "_token"]').val();
                    var name = file.upload.filename;
                    $.ajax({
                        type: 'POST',
                        url: '{{ url("/gallery/image_delete") }}',
                        data: {filename: name, _token:_token},
                        success: function (data){
                            console.log("File has been successfully removed!!");
                        },
                        error: function(e) {
                            console.log(e);
                        }});
                    var fileRef;
                    return (fileRef = file.previewElement) != null ?
                        fileRef.parentNode.removeChild(file.previewElement) : void 0;
                },

                dataType: "json",
                success: function(file, response)
                {
                    if(response.flash_message_success) {
                        $('#success_message').html('<div class="alert alert-success">\n' +
                            '<button class="close" data-dismiss="alert">×</button>\n' +
                            '<strong>Success! '+response.flash_message_success+'</strong> ' +
                            '</div>');

                        closeModals();

                    }


                },
                error: function(file, response)
                {
                    return false;
                }
            };

        function closeModals() {
            $('#imageModal').show().on('shown', function() {
                $('#imageModal').modal('hide')
            });

            $("#dropzone").trigger("reset");
        }
    </script>
@endpush