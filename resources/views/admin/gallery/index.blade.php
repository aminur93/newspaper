@extends('layouts.admin.master')

@section('page')
Gallery
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
                    <button data-toggle="modal" data-target="#exampleModal" class="btn btn-sm btn-primary  float-right"><i class="fas fa-plus"></i> Add Gallery Folder</button>
                    <h3 class="card-title">@yield('page')</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body" id="folder">
                    <h5 class="mb-2">@yield('page') Image</h5>
                    <div class="row">
                        @foreach($gallery as $value)
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-info"><i class="far fa-folder-open"></i></span>

                                <div class="info-box-content">
                                    <a href="{{ route('gallery.image',$value->id) }}" class="info-box-text">{{ $value->folder_name }}</a>

                                    {{--<button data-id="{{ $value->id }}" data-folder_name="{{ $value->folder_name }}" data-toggle="modal" data-target="#editModal" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></button>--}}
                                    <button rel="{{ $value->id }}" rel1="delete-folder" class="btn btn-sm btn-danger deleteRecord"><i class="fas fa-trash"></i></button>
                                    <span class="info-box-number"></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                            @endforeach
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>


    <!--Add Folder Name-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">@yield('page')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post" id="gallery_post">
                    <div class="modal-body">
                        @csrf
                            <div class="form-group row">
                                <label for="name" class="control-label">Folder Name</label>
                                <input type="text" name="folder_name" id="folder_name" class="form-control">
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--Edit Folder Name-->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit @yield('page')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post" id="gallery_edit">
                    <div class="modal-body">
                        @csrf

                        <input type="hidden" id="folder_id" name="folder_id" value="">

                        <div class="form-group row">
                            <label for="name" class="control-label">Folder Name</label>
                            <input type="text" name="folder_name" id="folder_name" class="form-control">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function () {
            $("body").on("submit","#gallery_post",function (e) {
                e.preventDefault();

                var formData = $("#gallery_post").serializeArray();

                $.ajax({
                    url: "{{ route('gallery.store') }}",
                    type: "post",
                    data: $.param(formData),
                    dataType: "json",
                    success: function (data) {

                        if(data.flash_message_success) {
                            $('#success_message').html('<div class="alert alert-success">\n' +
                                '<button class="close" data-dismiss="alert">×</button>\n' +
                                '<strong>Success! '+data.flash_message_success+'</strong> ' +
                                '</div>');

                            $("form").trigger("reset");
                            $('#exampleModal').modal('hide');
                            folder();
                            closeModals();
                        }else {

                            $('#error_message').html('<div class="alert alert-error">\n' +
                                '<button class="close" data-dismiss="alert">×</button>\n' +
                                '<strong>Error! '+data.error+'</strong>' +
                                '</div>');
                        }


                    }
                });
            });

            {{--$("body").on("submit","#gallery_edit",function (e) {--}}
                {{--e.preventDefault();--}}

                {{--var formData = $("#gallery_edit").serializeArray();--}}

                {{--$.ajax({--}}
                    {{--url: "{{ route('gallery.update') }}",--}}
                    {{--type: "post",--}}
                    {{--data: $.param(formData),--}}
                    {{--dataType: "json",--}}
                    {{--success: function (data) {--}}

                        {{--if(data.flash_message_success) {--}}
                            {{--$('#success_message').html('<div class="alert alert-success">\n' +--}}
                                {{--'<button class="close" data-dismiss="alert">×</button>\n' +--}}
                                {{--'<strong>Success! '+data.flash_message_success+'</strong> ' +--}}
                                {{--'</div>');--}}

                            {{--$("form").trigger("reset");--}}
                            {{--$('#editModal').modal('hide');--}}
                            {{--folder();--}}
                            {{--closeEditModals();--}}
                        {{--}else {--}}

                            {{--$('#error_message').html('<div class="alert alert-error">\n' +--}}
                                {{--'<button class="close" data-dismiss="alert">×</button>\n' +--}}
                                {{--'<strong>Error! '+data.error+'</strong>' +--}}
                                {{--'</div>');--}}
                        {{--}--}}


                    {{--}--}}
                {{--});--}}
            {{--});--}}

            {{--$('#editModal').on('show.bs.modal', function (event) {--}}
                {{--var button = $(event.relatedTarget);--}}
                {{--var folder_name = button.data('folder_name');--}}
                {{--var folder_id = button.data('id');--}}
                {{--var modal = $(this);--}}

                {{--modal.find('.modal-body #folder_name').val(folder_name);--}}
                {{--modal.find('.modal-body #folder_id').val(folder_id);--}}
            {{--});--}}
        });

        $(document).on('click','.deleteRecord', function(e){
            e.preventDefault();
            var id = $(this).attr('rel');
            var deleteFunction = $(this).attr('rel1');
            swal({
                    title: "Are You Sure?",
                    text: "You will not be able to recover this record again",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes, Delete It"
                },
                function(){
                    $.ajax({
                        type: "GET",
                        url: deleteFunction+'/'+id,
                        data: {id:id},
                        success: function (data) {

                            folder();

                            if(data.flash_message_success) {
                                $('#success_message').html('<div class="alert alert-success">\n' +
                                    '<button class="close" data-dismiss="alert">×</button>\n' +
                                    '<strong>Success! '+data.flash_message_success+'</strong> ' +
                                    '</div>');
                            }
                        }
                    });
                });
        });

        function folder() {
            $('#folder').load(' #folder');
        }

        function closeModals() {
            $('#exampleModal').show().on('shown', function() {
                $('#exampleModal').modal('hide')
            });
        }

        function closeEditModals() {
            $('#editModal').show().on('shown', function() {
                $('#editModal').modal('hide')
            });
        }

    </script>

@endpush