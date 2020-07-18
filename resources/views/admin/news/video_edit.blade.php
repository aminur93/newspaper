@extends('layouts.admin.master')

@section('page')
News Video Edit
@endsection

@push('css')
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">

            <div id="success_message"></div>

            <div id="error_message"></div>

            <div class="card card-primary">
                <div class="card-header">@yield('page')</div>

                <div class="card-body" id="edit_form_body">
                    <form action="" method="post" id="video_news_edit" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="news_id" id="news_id" value="{{ $news->id }}">
                        <input type="hidden" name="video_id" id="video_id" value="{{ $video->id }}">

                        <div class="form-group row">
                            <label for="">Thumbnail</label>
                            <input type="file" name="thumbnail" id="thumbnail" class="form-control">
                            <input type="hidden" class="form-control" name="current_image" value="{{$video->thumbnail}}">

                            <div id="image-holder" style="margin-top: 15px;"></div>
                        </div>

                        @if (!empty($video->thumbnail))
                            <div>
                                <img src="{{ asset('assets/admin/uploads/video_image/'.$video->thumbnail) }}" width="320" height="240" alt="">

                                <a rel2="{{ $video->id }}" rel3="/news/video/image_delete" class="text-danger" id="image_remove">Remove</a>
                            </div>
                        @endif

                        <div class="form-group row">
                            <label for="name" class="control-label">Video</label>
                            <input type="file" name="video" id="video" class="form-control">
                            <input type="hidden" class="form-control" name="current_video" value="{{$video->video}}">
                        </div>

                        @if (!empty($video->video))
                            <div>
                                <video width="320" height="240" controls autoplay>
                                    <source src="{{ asset('assets/admin/uploads/news_videos/'.$video->video) }}">
                                </video>

                                <a rel="{{ $video->id }}" rel1="/news/video/video_delete" class="text-danger" id="video_remove">Remove</a>
                            </div>
                        @endif

                        <div class="form-group">
                            <a href="{{ route('news.video',$news->id) }}" class="btn btn-warning">Back</a>
                            <button type="submit" class="btn btn-success">Edit</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function () {
            $("#video_remove").on("click",function (e) {
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

                                if(data.flash_message_success) {
                                    $('#success_message').html('<div class="alert alert-success">\n' +
                                        '<button class="close" data-dismiss="alert">×</button>\n' +
                                        '<strong>Success! '+data.flash_message_success+'</strong> ' +
                                        '</div>');
                                }

                                editForm();
                            }
                        });
                    });
            })
        });

        $(document).ready(function () {
            $("#image_remove").on("click",function (e) {
                e.preventDefault();

                var id = $(this).attr('rel2');
                var deleteFunction = $(this).attr('rel3');

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

                                if(data.flash_message_success) {
                                    $('#success_message').html('<div class="alert alert-success">\n' +
                                        '<button class="close" data-dismiss="alert">×</button>\n' +
                                        '<strong>Success! '+data.flash_message_success+'</strong> ' +
                                        '</div>');
                                }

                                editForm();
                            }
                        });
                    });
            })
        });

        function editForm() {
            $('#edit_form_body').load(' #edit_form_body');
        }

        $("#thumbnail").on('change', function () {

            if (typeof (FileReader) != "undefined") {

                var image_holder = $("#image-holder");
                image_holder.empty();

                var reader = new FileReader();
                reader.onload = function (e) {
                    $("<img />", {
                        "src": e.target.result,
                        "class": "thumb-image",
                        "width": "100px",
                        "height": "100px"
                    }).appendTo(image_holder);

                }
                image_holder.show();
                reader.readAsDataURL($(this)[0].files[0]);
            } else {
                alert("This browser does not support FileReader.");
            }
        });

        $(document).ready(function () {
            $("#video_news_edit").on("submit",function (e) {
                e.preventDefault();

                var id = $("#video_id").val();

                var formData = new FormData( $("#video_news_edit").get(0));

                $.ajax({
                    url: "{{ route('news.video_update','') }}/"+id,
                    type: "post",
                    data: formData,
                    dataType: "json",
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data) {
                        if(data.flash_message_success) {
                            $('#success_message').html(' <div class="alert alert-success alert-block">\n' +
                                '                <button type="button" class="close" data-dismiss="alert">x</button>\n' +
                                '               <strong>' + data.flash_message_success + '</strong>\n' +
                                '            </div>');
                        }else {

                            $('#error_message').html(' <div class="alert alert-danger alert-block">\n' +
                                '                <button type="button" class="close" data-dismiss="alert">x</button>\n' +
                                '               <strong>' + data.error + '</strong>\n' +
                                '            </div>');
                        }

                        $("form").trigger("reload");

                        editForm();
                    }
                });
            })
        })
    </script>
@endpush