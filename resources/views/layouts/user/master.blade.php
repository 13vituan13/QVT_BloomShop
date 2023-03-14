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


    <script>
        $(document).ready(function() {
            // Lấy các phần tử từ HTML
            var modal = $("#myModal");
            var btn = $("#openModalBtn");
            var span = $(".close")[0];

            // Khi người dùng nhấn nút mở modal, hiển thị modal
            btn.on("click", function() {
                modal.css("display", "block");
            });

            // Khi người dùng nhấn vào nút đóng, ẩn modal
            $(span).on("click", function() {
                modal.css("display", "none");
            });

            // Khi người dùng nhấn ra ngoài modal, ẩn modal
            $(window).on("click", function(event) {
                if (event.target == modal[0]) {
                    modal.css("display", "none");
                }
            });
        });

        function goToPage(url){
            window.location.href = url
        }
        function loadStart() {
            $("#loading").show();
        }

        function loadEnd() {
            $("#loading").hide();
        }
        function login(){
            // if (!valiLogin()) {
            //     return
            // }
            loadStart();
            $.ajax({
                url: "{{ route('login.submit') }}",
                type: "POST",
                param: {email:email,password:password},
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    loadEnd();
                    if (response.duplicated == 1) {
                        setElementBgColor(emailInput, "Email đã được đăng ký", true)
                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'Đăng Kí Thành Công',
                            text: 'Tài khoản của bạn đã đăng ký thành công.',
                            confirmButtonText: 'OK',
                        }).then((result) => {
                            window.location.href = "{{ route('home') }}"
                        });
                    }
                },
                error: function(e) {
                    loadEnd();
                    Swal.fire({
                        icon: 'error',
                        title: 'Đăng Kí Thất Bại',
                        text: 'vui lòng hãy thử lại!',
                        confirmButtonText: 'OK',
                    });
                }
            }); //end ajax
        }
    </script>
</body>

</html>
