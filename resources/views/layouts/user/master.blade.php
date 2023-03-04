<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>@yield('title') | BloomShop</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	

	<link rel="shortcut icon" href="{{ asset('images/logo/Favicons/favicon-60x60.png') }}" type="image/x-icon">

	<!-- <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet"> -->
	<!-- <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i" rel="stylesheet"> -->
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="{{ asset('css/user/animate.css') }}">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="{{ asset('css/user/icomoon.css')}}">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="{{ asset('css/user/bootstrap.css')}}">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="{{ asset('css/user/flexslider.css')}}">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="{{ asset('css/user/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{ asset('css/user/owl.theme.default.min.css')}}">

	<!-- Theme style  -->
	<link rel="stylesheet" href="{{ asset('css/user/style.css') }}">

	<!-- Modernizr JS -->
	<script src="{{ asset('js/user/modernizr-2.6.2.min.js')}}"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="{{ asset('js/user/respond.min.js')}}"></script>
	<![endif]-->

	</head>
	<body>
		
	<div class="fh5co-loader"></div>
	<div id="page">
		@include('layouts.user.header')
		
		@yield('content')

		@include('layouts.user.footer')
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="{{ asset('js/user/jquery.min.js')}}" ></script>
	<!-- jQuery Easing -->
	<script src="{{ asset('js/user/jquery.easing.1.3.js')}}"></script>
	<!-- Bootstrap -->
	<script src="{{ asset('js/user/bootstrap.min.js')}}"></script>
	<!-- Waypoints -->
	<script src="{{ asset('js/user/jquery.waypoints.min.js')}}"></script>
	<!-- Carousel -->
	<script src="{{ asset('js/user/owl.carousel.min.js')}}"></script>
	<!-- countTo -->
	<script src="{{ asset('js/user/jquery.countTo.js')}}"></script>
	<!-- Flexslider -->
	<script src="{{ asset('js/user/jquery.flexslider-min.js')}}"></script>
	<!-- Main -->
	<script src="{{ asset('js/user/main.js')}}"></script>
	<script>
		$(document).ready(function(){
			$('.banner').css('height','auto');
		});
	</script>
	</body>
</html>

