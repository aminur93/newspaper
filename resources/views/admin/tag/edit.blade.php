@extends('layouts.admin.master')

@section('page')
Edit Tag
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
                    <form action="" method="post" id="tag_edit">
                        @csrf

                        <input type="hidden" id="tag_id" value="{{ $tag->id }}">

                        <div class="form-group row">
                            <label for="name" class="control-label">Name</label>
                            <input type="text" value="{{ $tag->tah_name }}" name="tag_name" id="tag_name" class="form-control">
                        </div>

                        <div class="form-group">
                            <a href="{{ route('tag') }}" class="btn btn-warning">Back</a>
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

            $("#tag_edit").on("submit",function (e) {
                e.preventDefault();

                var id = $("#tag_id").val();

                var formData = $("#tag_edit").serializeArray();

                $.ajax({
                    url : "{{ route('tag.update','') }}/"+id,
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