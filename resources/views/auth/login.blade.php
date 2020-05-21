<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ config('app.name') }} Admin</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap-responsive.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/css/unicorn.login.css') }}" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<body>
<div id="logo">
    <img src="{{ asset('assets/admin/img/logo.png') }}" alt="" />
</div>

<div id="loginbox">
    <form id="loginform" class="form-vertical" method="POST" action="{{ route('login') }}" />

    @csrf

    <p>Enter username and password to continue.</p>
    <div class="control-group">
        <div class="controls">
            <div class="input-prepend">
                <span class="add-on"><i class="icon-user"></i></span>
                <input type="email" id="email" name="email" placeholder="Username" />
            </div>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="control-group">
        <div class="controls">
            <div class="input-prepend">
                <span class="add-on"><i class="icon-lock"></i></span>
                <input type="password" id="password" name="password" placeholder="Password" />
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
    </div>
    <div class="form-actions">
        <span class="pull-left"><a href="#" class="flip-link" id="to-recover">Lost password?</a></span>
        <span class="pull-right"><input type="submit" class="btn btn-inverse" value="Login" /></span>
    </div>
    </form>

    <form id="recoverform" action="#" class="form-vertical" />
    <p>Enter your e-mail address below and we will send you instructions how to recover a password.</p>
    <div class="control-group">
        <div class="controls">
            <div class="input-prepend">
                <span class="add-on"><i class="icon-envelope"></i></span><input type="text" placeholder="E-mail address" />
            </div>
        </div>
    </div>
    <div class="form-actions">
        <span class="pull-left"><a href="#" class="flip-link" id="to-login">&lt; Back to login</a></span>
        <span class="pull-right"><input type="submit" class="btn btn-inverse" value="Recover" /></span>
    </div>
    </form>
</div>

<script src="{{ asset('assets/admin/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/unicorn.login.js') }}"></script>
</body>
</html>

