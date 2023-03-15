<!DOCTYPE HTML>
<html class="html">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title') | BloomShop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{ asset('images/logo/Favicons/favicon-60x60.png') }}" type="image/x-icon">

    <!-- <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet"> -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i" rel="stylesheet"> -->

    <!-- Animate.css -->
    <link rel="stylesheet" href="{{ asset('css/user/animate.css') }}">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="{{ asset('css/user/icomoon.css') }}">

    <!-- Bootstrap  -->
    
    <link rel="stylesheet" href="{{ asset('css/user/bootstrap.css') }}">
    


    <!-- Flexslider  -->
    <link rel="stylesheet" href="{{ asset('css/user/flexslider.css') }}">

    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="{{ asset('css/user/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user/owl.theme.default.min.css') }}">

    <!-- Theme style  -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user/style.css') }}">

    <!-- Modernizr JS -->
    <script src="{{ asset('js/user/modernizr-2.6.2.min.js') }}"></script>

    <link rel="stylesheet" href="https://kit.fontawesome.com/c461128840.css" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/c461128840.js" crossorigin="anonymous"></script>


</head>

<body>
    <!-- jQuery -->
    <script src="{{ asset('js/user/jquery.min.js') }}"></script>
    <!-- jQuery Easing -->
    <script src="{{ asset('js/user/jquery.easing.1.3.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('js/user/bootstrap.min.js') }}"></script>
    <!-- Waypoints -->
    <script src="{{ asset('js/user/jquery.waypoints.min.js') }}"></script>
    <!-- Carousel -->
    <script src="{{ asset('js/user/owl.carousel.min.js') }}"></script>
    <!-- countTo -->
    <script src="{{ asset('js/user/jquery.countTo.js') }}"></script>
    <!-- Flexslider -->
    <script src="{{ asset('js/user/jquery.flexslider-min.js') }}"></script>
    <!-- Main -->
    <script src="{{ asset('js/user/main.js') }}"></script>
    {{-- Swal Alert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <div class="fh5co-loader"></div>
    <div id="page">
        @include('layouts.user.header')

        @yield('content')

        @include('user.login')
        @include('layouts.user.footer')
    </div>
    <div id="loading" hidden>
        <div class="loader">Loading...</div>
    </div>
    <div class="gototop js-top">
        <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
    </div>
    <script src="{{ asset('js/user/usersite.js') }}"></script>
</body>

</html>
