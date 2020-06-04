@extends('layouts.admin.master')

@section('page')
    Edit Division/CIty
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
                    <form action="" method="post" id="division_city_edit">
                        @csrf

                        <input type="hidden" id="division_city_id" value="{{ $division_city->id }}">

                        <div class="form-group row">
                            <label for="" class="control-label">News types</label>
                            <select name="types_id" id="types_id" class="form-control">
                                <option value="">Chose News Types</option>
                                @foreach($types as $type)
                                    <option value="{{ $type->id }}" @if($division_city->types_id == $type->id) selected @endif>{{ $type->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group row">
                            <label for="" class="control-label">News Country</label>
                            <select name="country_id" id="country_id" class="form-control">
                                <option value="">Chose News Country</option>
                                @foreach($country as $value)
                                    <option value="{{ $value->id }}" @if($division_city->country_id == $value->id) selected @endif>{{ $value->country_name }}</option>
                                    @endforeach
                            </select>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="control-label">Division/City Name</label>
                            <input type="text" value="{{ $division_city->division_name }}" name="division_name" id="division_name" class="form-control">
                        </div>

                        <div class="form-group">
                            <a href="{{ route('division_city') }}" class="btn btn-warning">Back</a>
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
            $("#types_id").on('change',function () {

                var types_id = $("#types_id").val();
                var _token = $('input[name="_token"]').val();

                $.ajax({
                    url: "{{ route('division_city.get_country') }}",
                    type: "POST",
                    data: {types_id:types_id,_token:_token},
                    dataType: "html",
                    success: function (html) {
                        $("#country_id").html(html);
                    }
                });
            })
        })
    </script>

    <script>
        $(document).ready(function () {

            $("#division_city_edit").on("submit",function (e) {
                e.preventDefault();

                var id = $("#division_city_id").val();

                var formData = $("#division_city_edit").serializeArray();

                $.ajax({
                    url : "{{ route('division_city.update','') }}/"+id,
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