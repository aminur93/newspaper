<!DOCTYPE html>
<html lang="en">
<!-- container-fluid -->
<head>
    <title>{{ config('app.name') }} Admin</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap-responsive.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/css/fullcalendar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/css/unicorn.main.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/css/unicorn.grey.css') }}" class="skin-color" />
    @stack('css')
</head>
<body>


@include('layouts.admin.header')

@include('layouts.admin.sidebar')

<div id="style-switcher">
    <i class="icon-arrow-left icon-white"></i>
    <span>Style:</span>
    <a href="#grey" style="background-color: #555555;border-color: #aaaaaa;"></a>
    <a href="#blue" style="background-color: #2D2F57;"></a>
    <a href="#red" style="background-color: #673232;"></a>
</div>

<div id="content">
    <div id="content-header">
        <h1>@yield('page')</h1>
        <div class="btn-group">
            <a class="btn btn-large tip-bottom" title="Manage Files"><i class="icon-file"></i></a>
            <a class="btn btn-large tip-bottom" title="Manage Users"><i class="icon-user"></i></a>
            <a class="btn btn-large tip-bottom" title="Manage Comments"><i class="icon-comment"></i><span class="label label-important">5</span></a>
            <a class="btn btn-large tip-bottom" title="Manage Orders"><i class="icon-shopping-cart"></i></a>
        </div>
    </div>
    <div id="breadcrumb">
        <a href="{{ route('admin.dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a href="#" class="current">@yield('page')</a>
    </div>

    <div class="container-fluid">

        @yield('content')

        @include('layouts.admin.footer')
    </div>
</div>


<script src="{{ asset('assets/admin/js/excanvas.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/jquery.ui.custom.js') }}"></script>
<script src="{{ asset('assets/admin/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/jquery.flot.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/jquery.flot.resize.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/jquery.peity.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/fullcalendar.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/unicorn.js') }}"></script>
<script src="{{ asset('assets/admin/js/unicorn.dashboard.js') }}"></script>

@stack('js')
</body>
</html>
