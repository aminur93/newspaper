@extends('layouts.admin.master')

@section('page')
News Edit
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

                <div class="card-body" id="edit_form_body">
                    <form action="" method="post" id="news_edit" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="news_id" id="news_id" value="{{ $news->id }}">

                        <div class="row">

                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="types" class="control-label">Types</label>
                                    <select name="types_id" id="types_id" class="form-control">
                                        <option value="">Select Types</option>
                                        @foreach($types as $type)
                                            <option value="{{ $type->id }}" @if ($news->types_id == $type->id)
                                                selected
                                            @endif>{{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="division" class="control-label">Division</label>
                                    <select name="division_id" id="division_id" class="form-control">
                                        <option value="">Select Division</option>
                                        @foreach($divisions as $division)
                                            <option value="{{ $division->id }}" @if ($news->division_id == $division->id)
                                                selected
                                            @endif>{{ $division->division_name }}</option>
                                            @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="upzilla" class="control-label">UpZilla</label>
                                    <select name="upzilla_id" id="upzilla_id" class="form-control">
                                        <option value="">Select Upzilla</option>
                                        @foreach($upzilla as $upz)
                                            <option value="{{ $upz->id }}" @if ($news->upzilla_id == $upz->id)
                                            selected
                                                    @endif>{{ $upz->upzilla_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="Sub-category" class="control-label">Sub Category</label>
                                    <select name="sub_cat_id" id="sub_cat_id" class="form-control">
                                        <option value="">Select Sub category</option>
                                        @foreach($sub_categories as $sub_cat)
                                            <option value="{{ $sub_cat->id }}" @if ($news->sub_cat_id == $sub_cat->id)
                                            selected
                                                    @endif>{{ $sub_cat->sub_category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="head line" class="control-label">Head Line</label>
                                    <input type="text" value="{{ $news->headline }}" name="headline" id="headline" class="form-control" placeholder="Head Line">
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
                                        @foreach($country as $coun)
                                            <option value="{{ $coun->id }}" @if ($news->country_id == $coun->id)
                                            selected
                                                    @endif>{{ $coun->country_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="zilla" class="control-label">Zilla</label>
                                    <select name="zilla_id" id="zilla_id" class="form-control">
                                        <option value="">Select Zilla</option>
                                        @foreach($zilla as $zi)
                                            <option value="{{ $zi->id }}" @if ($news->zilla_id == $zi->id)
                                            selected
                                                    @endif>{{ $zi->zilla_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="category" class="control-label">Category</label>
                                    <select name="category_id" id="category_id" class="form-control">
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" @if ($news->category_id == $category->id)
                                                selected
                                            @endif>{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="tag" class="control-label">Tag</label>
                                    <select name="tag_id" id="tag_id" class="form-control">
                                        <option value="">Select Tag</option>
                                        @foreach($tags as $tag)
                                            <option value="{{ $tag->id }}" @if ($news->tag_id == $tag->id)
                                                selected
                                            @endif>{{ $tag->tah_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="title" class="control-label">News Title</label>
                                    <input type="text" value="{{ $news->title }}" name="title" id="title" class="form-control" placeholder="News Title">
                                </div>

                                <div class="form-group">
                                    <label for="date" class="control-label">News Date</label>
                                    <input type="date" value="{{ $news->date }}" name="date" id="date" class="form-control" placeholder="News Date">
                                </div>

                            </div>

                            <div class="form-group col-md-12">
                                <label for="Description" class="control-label">News Description</label>
                                <textarea name="description" id="description" class="textarea" placeholder="Place some text here" style="width: 100%; height: 400px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $news->description }}</textarea>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="image">News Image</label>
                                <input type="file" name="image" id="image" class="form-control">
                                <br>

                                @if (!empty($news->image))
                                    <div>
                                        <img src="{{ asset('assets/admin/uploads/news_small/'.$news->image) }}" alt="">
                                        <a rel="{{ $news->id }}" rel1="/news/delete_image" class="text-danger" id="image_delete">Remove Image</a>
                                    </div>
                                @else
                                    <div id="image-holder"></div>
                                @endif



                            </div>

                            <div class="form-group col-md-4">
                                <label for="status">Status</label>
                                <input type="checkbox" name="status" id="status" @if ($news->status == 1)
                                    checked
                                @endif>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="publish">News Publish</label>
                                <input type="checkbox" name="publish" id="publish"  @if ($news->publish == 1)
                                checked
                                        @endif>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="feature">News Feature</label>
                                <input type="checkbox" name="feature" id="feature"  @if ($news->feature == 1)
                                checked
                                        @endif>
                            </div>

                        </div>


                        <div class="form-group">
                            <a href="{{ route('news') }}" class="btn btn-warning">Back</a>
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
            $("#image_delete").on("click",function (e) {
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
        })

        function editForm() {
            $('#edit_form_body').load(' #edit_form_body');
        }

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
            $("#news_edit").on("submit",function (e) {
                e.preventDefault();

                var id = $("#news_id").val();

                var formData = new FormData( $("#news_edit").get(0));

                $.ajax({
                    url: "{{ route('news.update','') }}/"+id,
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
                    }
                });
            })
        })
    </script>
@endpush