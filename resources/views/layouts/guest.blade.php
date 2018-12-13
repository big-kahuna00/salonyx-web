<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Barlow+Semi+Condensed" rel="stylesheet">
    <link rel="stylesheet"
          href="{{ url('quickadmin/css') }}/font-awesome.min.css"/>
    <link rel="stylesheet"
          href="{{ url('quickadmin/css') }}/bootstrap.min.css"/>
    <link rel="stylesheet"
          href="{{ url('css') }}/styles.css"/>
    <!-- Styles -->
</head>
<body>
<div class="container" style="max-width:1200px;position:relative;">
    @if (Route::has('auth.login'))
        <div class="top-left">
            <img src="{{url("images")}}/salonyx-logo.png" style="width:120px; padding-top:10px;">
            </div>
        <div class="top-right links">
            @if (Auth::check())
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ url('/login') }}">Login</a>
                <a href="{{ url('/register') }}">Register</a>
            @endif
        </div>
    @endif
</div>
    <div class="content">
        <div class="container ">

            @yield("content")

            <div class="footer">

            </div>

        </div>

    </div>
</div>
</body>
</html>
