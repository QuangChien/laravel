<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="icon" href=" {{asset('frontend/images/logo-icon.png')}} " type="image/gif" sizes="16x16">
    <script src=" {{asset('frontend/js/jquery-3.3.1.js')}} "></script>
    <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/fonts/fontawesome/css/all.min.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Paytone+One&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,300;0,400;1,300;1,400&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{asset('frontend/css/reset.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/main.css')}}">
    
    @yield('css')
</head>

<body>
    <div class="app">
        @include('frontend.layouts.header')
        @include('frontend.layouts.video')

        @yield('content')

        @include('frontend.layouts.footer')
        
    </div>

    @section('script')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="{{asset('frontend//js/navbar-toggle.js')}}"></script>
    @show
    
</body>
</html>