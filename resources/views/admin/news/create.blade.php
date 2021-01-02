@extends('layouts.admin.master')

@section('page')
News Create
@endsection

@push('css')
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">

            <div id="success_message"></div>

            <div id="error_message"></div>

            <div class="card card-default">
                <div class="card-header">@yield('page')</div>

                <div class="card-body">
                    <form action="" method="post" id="news_post" enctype="multipart/form-data">
                        @csrf

                        <div class="row">

                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="types" class="control-label">Types</label>
                                        <select name="types_id" id="types_id" class="form-control">
                                            <option value="">Select Types</option>
                                            @foreach($types as $type)
                                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                                                @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="division" class="control-label">Division</label>
                                        <select name="division_id" id="division_id" class="form-control">
                                            <option value="">Select Division</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="upzilla" class="control-label">UpZilla</label>
                                        <select name="upzilla_id" id="upzilla_id" class="form-control">
                                            <option value="">Select Upzilla</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="Sub-category" class="control-label">Sub Category</label>
                                        <select name="sub_cat_id" id="sub_cat_id" class="form-control">
                                            <option value="">Select Sub category</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="head line" class="control-label">Head Line</label>
                                        <input type="text" name="headline" id="headline" class="form-control" placeholder="Head Line">
                                    </div>

                                    <div class="form-group">
                                        <label for="author" class="control-label">Author</label>
                                        <input type="text" readonly value="{{ Auth::user()->name }}" name="author" id="author" class="form-control" placeholder="News Author">
                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="Country" class="control-label">Country</label>
                                        <select name="country_id" id="country_id" class="form-control">
                                            <option value="">Select Country</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="zilla" class="control-label">Zilla</label>
                                        <select name="zilla_id" id="zilla_id" class="form-control">
                                            <option value="">Select Zilla</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="category" class="control-label">Category</label>
                                        <select name="category_id" id="category_id" class="form-control">
                                            <option value="">Select Category</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                                @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="tag" class="control-label">Tag</label>
                                        <select name="tag_id" id="tag_id" class="form-control">
                                            <option value="">Select Tag</option>
                                            @foreach($tags as $tag)
                                                <option value="{{ $tag->id }}">{{ $tag->tah_name }}</option>
                                                @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="title" class="control-label">News Title</label>
                                        <input type="text" name="title" id="title" class="form-control" placeholder="News Title">
                                    </div>

                                    <div class="form-group">
                                        <label for="date" class="control-label">News Date</label>
                                        <input type="date" name="date" id="date" class="form-control" placeholder="News Date">
                                    </div>

                                </div>

                               <div class="form-group col-md-12">
                                   <label for="Description" class="control-label">News Description</label>
                                   <textarea name="description" id="description" class="textarea" placeholder="Place some text here" style="width: 100%; height: 400px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                               </div>

                                <div class="form-group col-md-12">
                                    <label for="image">News Image</label>
                                    <input type="file" name="image" id="image" class="form-control">
                                    <br>
                                    <div id="image-holder" class="text-center"></div>
                                </div>
                            @if(auth()->user()->user_role_id == 1)
                            <div class="form-group col-md-4">
                                <label for="status">Status</label>
                                <input type="checkbox" name="status" id="status">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="publish">News Publish</label>
                                <input type="checkbox" name="publish" id="publish">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="feature">News Feature</label>
                                <input type="checkbox" name="feature" id="feature">
                            </div>
                                @endif

                        </div>


                        <div class="form-group">
                            <a href="{{ route('news') }}" class="btn btn-warning">Back</a>
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
        $(document).ready(function () {
            $("#types_id").on("change",function () {
                var  types_id = $(this).val();
                var _token = $('input[name="_token"]').val();

                $.ajax({
                    url: "{{ route('news.get_country') }}",
                    type: "post",
                    data: {types_id:types_id, _token:_token},
                    dataType: "html",
                    success: function (html) {
                        $("#country_id").html(html);
                    }
                });
            })
        });

        $(document).ready(function () {
            $("#country_id").on("change",function () {

                var country_id = $(this).val();
                var _token = $('input[name="_token"]').val();

                $.ajax({
                    url: "{{ route('news.get_division') }}",
                    type: "post",
                    data: {country_id:country_id, _token:_token},
                    dataType: "html",
                    success: function (html) {
                        $("#division_id").html(html);
                    }
                });
            })
        })

        $(document).ready(function () {
            $("#division_id").on("change",function () {

                var division_id = $(this).val();
                var _token = $('input[name="_token"]').val();

                $.ajax({
                    url: "{{ route('news.get_zilla') }}",
                    type: "post",
                    data: {division_id:division_id, _token:_token},
                    dataType: "html",
                    success: function (html) {
                        $("#zilla_id").html(html);
                    }
                });
            })
        })

        $(document).ready(function () {
            $("#zilla_id").on("change",function () {

                var zilla_id = $(this).val();
                var _token = $('input[name="_token"]').val();

                $.ajax({
                    url: "{{ route('news.get_upzilla') }}",
                    type: "post",
                    data: {zilla_id:zilla_id, _token:_token},
                    dataType: "html",
                    success: function (html) {
                        $("#upzilla_id").html(html);
                    }
                });
            })
        })

        $(document).ready(function () {
            $("#category_id").on("change",function () {

                var category_id = $(this).val();
                var _token = $('input[name="_token"]').val();

                $.ajax({
                    url: "{{ route('news.get_subcategory') }}",
                    type: "post",
                    data: {category_id:category_id, _token:_token},
                    dataType: "html",
                    success: function (html) {
                        $("#sub_cat_id").html(html);
                    }
                });

            })
        })

        $("#image").on('change', function () {

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
            $("#news_post").on("submit",function (e) {
                e.preventDefault();

                var formData = new FormData( $("#news_post").get(0));

                $.ajax({
                    url: "{{ route('news.store') }}",
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
                    }
                });
            })
        })
    </script>
@endpush