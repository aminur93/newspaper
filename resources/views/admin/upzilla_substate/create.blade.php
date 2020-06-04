@extends('layouts.admin.master')

@section('page')
Create UpZilla/SubState
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
                    <form action="" method="post" id="Upzilla_substate_post">
                        @csrf

                        <div class="form-group row">
                            <label for="" class="control-label">News types</label>
                            <select name="types_id" id="types_id" class="form-control">
                                <option value="">Chose News Types</option>
                                @foreach($types as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group row">
                            <label for="" class="control-label">News Country</label>
                            <select name="country_id" id="country_id" class="form-control">
                                <option value="">Chose News Country</option>

                            </select>
                        </div>

                        <div class="form-group row">
                            <label for="" class="control-label">News Divsion/City</label>
                            <select name="division_id" id="division_id" class="form-control">
                                <option value="">Chose News Division</option>

                            </select>
                        </div>

                        <div class="form-group row">
                            <label for="" class="control-label">News Zilla/State</label>
                            <select name="zilla_id" id="zilla_id" class="form-control">
                                <option value="">Chose News Zilla</option>

                            </select>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="control-label">UpZilla/SubState Name</label>
                            <input type="text" name="upzilla_name" id="upzilla_name" class="form-control">
                        </div>

                        <div class="form-group">
                            <a href="{{ route('upzilla_substate') }}" class="btn btn-warning">Back</a>
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
            $("#types_id").on('change',function () {

                var types_id = $("#types_id").val();
                var _token = $('input[name="_token"]').val();

                $.ajax({
                    url: "{{ route('upzilla_substate.get_country') }}",
                    type: "POST",
                    data: {types_id:types_id,_token:_token},
                    dataType: "html",
                    success: function (html) {
                        $("#country_id").html(html);
                    }
                });
            })
        })

        $(document).ready(function () {
            $("#country_id").on('change',function () {

                var country_id = $("#country_id").val();
                var _token = $('input[name="_token"]').val();

                $.ajax({
                    url: "{{ route('upzilla_substate.get_division_city') }}",
                    type: "POST",
                    data: {country_id:country_id,_token:_token},
                    dataType: "html",
                    success: function (html) {
                        $("#division_id").html(html);
                    }
                });
            })
        })

        $(document).ready(function () {
            $("#division_id").on('change',function () {

                var division_id = $("#division_id").val();
                var _token = $('input[name="_token"]').val();

                $.ajax({
                    url: "{{ route('upzilla_substate.get_zilla_state') }}",
                    type: "POST",
                    data: {division_id:division_id,_token:_token},
                    dataType: "html",
                    success: function (html) {
                        $("#zilla_id").html(html);
                    }
                });
            })
        })

        $(document).ready(function () {

            $("#Upzilla_substate_post").on("submit",function (e) {
                e.preventDefault();

                var formData = $("#Upzilla_substate_post").serializeArray();

                $.ajax({
                    url : "{{ route('upzilla_substate.store') }}",
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

                        $("form").trigger("reset");

                        $('.form-group').find('.valids').hide();
                    }
                });
            })
        })
    </script>
@endpush