<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title')</title>
	<link rel="icon" href=" {{asset('frontend/images/logo-icon.png')}} " type="image/gif" sizes="16x16">
	<!-- css -->
	<link href=" {{asset('backend/css/bootstrap.min.css')}} " rel="stylesheet">
	
	<link href="{{asset('backend/css/styles.css')}}" rel="stylesheet">
	<!--Icons-->
	<script src="{{asset('backend/js/lumino.glyphs.js')}}"></script>
    <link rel="stylesheet" href="{{asset('backend/Awesome/css/all.css')}}">
    @yield('css')
</head>
<body>
	<!-- header -->
	@include('backend.layouts.header')
	<!-- header -->
	<!-- sidebar left-->
	@include('backend.layouts.slidebar')
	<!--/. end sidebar left-->

	<!--main-->
	@yield('content')
    <!--end main-->

    <!-- javascript -->
    @section('script')
        <script src="{{asset('backend/js/jquery-1.11.1.min.js')}}"></script>
        <script src="{{asset('backend/js/bootstrap.min.js')}}"></script>
    @show
</body>

</html>