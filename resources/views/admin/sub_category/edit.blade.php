@extends('layouts.admin.master')

@section('page')
Edit Sub Category
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

                <div class="card-body">
                    <form action="" method="post" id="subcategory_edit">
                        @csrf

                        <input type="hidden" id="sub_cat_id" value="{{ $sub_category->id }}">

                        <div class="form-group row">
                            <label for="name" class="control-label">Category</label>
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="">Select Category</option>
                                @foreach($category as $value)
                                    <option value="{{ $value->id }}" @if ($sub_category->category_id == $value->id)
                                        selected
                                    @endif>{{ $value->category_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group row">
                            <label for="">Sub category</label>
                            <input type="text" value="{{ $sub_category->sub_category_name }}" name="sub_category_name" id="sub_category_name" class="form-control">
                        </div>

                        <div class="form-group">
                            <a href="{{ route('sub_category') }}" class="btn btn-warning">Back</a>
                            <button type="submit" class="btn btn-success">edit</button>
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

            $("#subcategory_edit").on("submit",function (e) {
                e.preventDefault();

                var id = $("#sub_cat_id").val();

                var formData = $("#subcategory_edit").serializeArray();

                $.ajax({
                    url : "{{ route('sub_category.update','') }}/"+id,
                    type: "post",
                    data: $.param(formData),
                    dataType: "json",
                    success: function (data) {
                        if(data.flash_message_success) {
                            $('#success_message').html('<div class="alert alert-success">\n' +
                                '<button class="close" data-dismiss="alert">×</button>\n' +
                                '<strong>Success! '+data.flash_message_success+'</strong> ' +
                                '</div>');
                        }else {

                            $('#error_message').html('<div class="alert alert-error">\n' +
                                '<button class="close" data-dismiss="alert">×</button>\n' +
                                '<strong>Error! '+data.error+'</strong>' +
                                '</div>');
                        }

                        $("form").trigger("reload");
                        $('.form-group').find('.valids').hide();
                    }
                });
            })
        })
    </script>
@endpush