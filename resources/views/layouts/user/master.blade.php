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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <style>
        body {
            font-family: "Playfair Display", serif;
            font-weight: 400;
            font-size: 16px;
            line-height: 1.7;
            color: #828282;
            background: #fff;
        }

        .offcanvas {
            position: unset !important;
            visibility: unset !important;
        }
    </style>
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
        {{-- HEADER --}}
        @include('layouts.user.header')

        {{-- CONTENT --}}
        @yield('content')

        {{-- MODEL LOGIN --}}
        @include('user.login')

        {{-- FOOTER --}}
        @include('layouts.user.footer')
    </div>
    {{-- LOADING --}}
    <div id="loading" hidden>
        <div class="loader">Loading...</div>
    </div>
     {{-- SHOPPING CART FLOAT --}}
    <a class="float-cart" href="{{ route('cart') }}">
        <span>
            <small id="cart__couter">{{ $cartCounter }}</small>
            <i class="fa-solid fa-cart-shopping fz--25"></i>
        </span>
    </a>
    {{-- GO TO TOP PAGE --}}
    <div class="gototop js-top">
        <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
    </div>
    <script src="{{ asset('js/user/usersite.js') }}"></script>
    <script>
        // Lấy các phần tử từ HTML
        var modal = $("#myModal");
        var span = $(".close")[0];
        $(document).ready(function() {
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
            //Cart click
            $(document).on('click', '.add_to_cart', function(e) {
                const p = $(this).parent()
                console.log({
                    p
                });
                const c = p.find('.img-fluid').clone();
                c.css({
                    position: 'absolute',
                    top: p.offset().top,
                    left: p.offset().left,
                    width: p.width(),
                    height: p.height(),
                    zIndex: 99999
                });
                const dest = $('.float-cart');
                const destTop = dest.offset().top + dest.height() / 2;
                const destLeft = dest.offset().left + dest.width() / 2;
                const destRight = $(document).width() - dest.offset().left - dest.width() / 2;
                $('.container_product').append(c);
                c.animate({
                        top: destTop,
                        left: destLeft,
                        right: destRight,
                        width: 0,
                        height: 0,
                        opacity: 0
                    }, 600,
                    function() {
                        c.remove();
                    }
                );
                var productId = $(this).attr('data-productId');
                var productName = $(this).attr('data-productName');
                var productPrice = $(this).attr('data-productPrice');
                var productImage = $(this).attr('data-productImage');
                var productCategory = $(this).attr('data-productCategory');
                var formData = new FormData()
                formData.append("product_id", productId);
                formData.append("name", productName);
                formData.append("price", productPrice);
                formData.append("image", productImage);
                formData.append("category_name", productCategory);
                $.ajax({
                    url: "{{ route('cart.store') }}",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    beforeSend: function() {
                        msgVali = ""
                    },
                    success: function(response) {
                        console.log(response.cartCounter)
                        $('#cart__couter').html(response.cartCounter)

                    },
                    error: function(e) {
                        console(e)
                    }
                }); //end ajax   
            });
        });
    </script>
</body>

</html>
