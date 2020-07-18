@extends('layouts.admin.master')

@section('page')
News Video Create
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

                <div class="card-body" id="create_form_body">
                    <form action="" method="post" id="video_news_post" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="news_id" id="news_id" value="{{ $news->id }}">

                        <div class="form-group row">
                            <label for="">Thumbnail</label>
                            <input type="file" name="thumbnail" id="thumbnail" class="form-control">

                            <div id="image-holder" style="margin-top: 15px;"></div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="control-label">Video</label>
                            <input type="file" name="video" id="video" class="form-control">
                        </div>

                        <div class="form-group">
                            <a href="{{ route('news.video',$news->id) }}" class="btn btn-warning">Back</a>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>



        </div>
    </div>
@endsection

@push('js')
    <script>
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

        function createForm() {
            $('#create_form_body').load(' #create_form_body');
        }

        $(document).ready(function () {
            $("#video_news_post").on("submit",function (e) {
                e.preventDefault();

                var formData = new FormData( $("#video_news_post").get(0));

                $.ajax({
                    url: "{{ route('news.video_store') }}",
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

                        $("form").trigger("reset");

                        createForm();
                    }
                });
            })
        })
    </script>
@endpush