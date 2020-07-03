@extends('layouts.admin.master')

@section('page')
Send Email To Subscribers
@endsection

@push('css')
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">

            @if(Session::has('flash_message_success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <strong>{{ Session::get('flash_message_success')  }}</strong>
                </div>
            @endif

            <div id="success_message"></div>

            <div id="error_message"></div>

            <div class="card card-default">
                <div class="card-header">@yield('page')</div>

                <div class="card-body">
                    <form action="{{ route('emailsubscribe.send') }}" method="post" id="subscribe_send_email">
                        @csrf

                        <div class="form-group row">
                            <label for="to" class="control-label">To</label>
                            <select name="to_email" id="to_email" class="form-control">
                                <option value="">Select Email</option>
                                @foreach($email_subscribe as $value)
                                    <option value="{{ $value->email }}">{{ $value->email }}</option>
                                    @endforeach
                            </select>
                        </div>

                        <div class="form-group row">
                            <label for="from" class="control-label">From</label>
                            <input type="text" readonly value="aminurrashid126@gmail.com" name="from_email" id="from_email" class="form-control">
                        </div>

                        <div class="form-group row">
                            <label for="from" class="control-label">name</label>
                            <input type="text"  name="name" id="name" class="form-control">
                        </div>

                        <div class="form-group row">
                            <label for="subject" class="control-label">Subject</label>
                            <input type="text" name="subject" id="subject" class="form-control">
                        </div>


                        <div class="form-group col-md-12">
                            <label for="from" class="control-label">Message</label>
                            <textarea name="message" id="message" class="textarea"></textarea>
                        </div>

                        <div class="form-group">
                            <a href="{{ route('emailsubscribe') }}" class="btn btn-warning">Back</a>
                            <button type="submit" class="btn btn-success"><i class="fa fa-paper-plane"></i></button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection

@push('js')
@endpush