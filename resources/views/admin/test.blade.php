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
        .img-fluid {
            width: 100%;
            height: 350px;
        }

        header {
            border-bottom: 1px solid lightgray;
            margin-bottom: 20px;
        }

        .product {
            margin-bottom: 2em;
        }

        .product .image {
            position: relative;
        }

        .product .add_to_cart {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
            font-size: 2em;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.2s;
            opacity: 0;

        }

        .product .add_to_cart:hover {

            opacity: 1;
        }

        .product .add_to_cart:active {
            color: rgba(255, 255, 255, 0.8);
        }

        .product .add_to_cart .icon-shopping-cart {
            padding: 10px 10px;
            color: #fff;
            background: #d1c286;
            font-size: 16px;
        }

        .product .add_to_cart .icon-shopping-cart:hover,
        .product .add_to_cart .icon-shopping-cart:focus {
            color: #d1c286;
            background: #fff;
        }

        .product .add_to_cart .eye {
            padding: 7px 10px;
            color: #fff;
            background: #d1c286;
            font-size: 16px;
            margin-left: 10px;
        }

        .product .add_to_cart .eye:hover,
        .product .add_to_cart .eye:focus {
            color: #d1c286;
            background: #fff;
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






    <header>
        <nav class="navbar navbar-light">
            <div class="navbar-brand title">
                <div class="header">Brand</div>
            </div>
            <div class="navbar-nav panier">
                <div class="nav-item"><a class="nav-link" id="panier" href="javascript:void(0)"><i
                            class="fa fa-shopping-cart mr-1"></i><span>Cart</span></a></div>
            </div>
        </nav>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-sm-4 text-center animate-box fadeInUp animated-fast">
                <div class="product">
                    <div class="image">
                        <img class="img-fluid" src="http://192.168.1.13:8000/storage/images/products/4/product.png" />
                        <span class="sale">10%</span>
                        <div class="add_to_cart">
                            <i class="icon-shopping-cart"></i>
                            <a target="_blank" href="http://192.168.1.13:8000/storage/images/products/4/product.png"
                                class="eye">
                                <i class="icon-eye"></i>
                            </a>
                        </div>
                    </div>
                    <div class="desc mt-4">
                        <h3><a href="single.html">Sincere Gift</a></h3>
                        <span class="price">$350</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-center animate-box fadeInUp animated-fast">
                <div class="product">
                    <div class="product-grid"
                        style="background-image:url(http://192.168.1.13:8000/storage/images/products/4/product.png)">
                        <span class="sale">10%</span>
                        <div class="inner">
                            <div>
                                <a href="single.html" class="icon"><i class="icon-shopping-cart"></i></a>
                                <a target="_blank" href="http://192.168.1.13:8000/storage/images/products/4/product.png"
                                    class="icon"><i class="icon-eye"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="desc">
                        <h3><a href="single.html">Sincere Gift</a></h3>
                        <span class="price">$350</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    $(document).ready(function() {
        console.clear();

        $(document).on('click', '.add_to_cart', function(e) {
            const p = $(this).parent().parent();
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

            const dest = $('#panier');
            $('.container').append(c);
            c.animate({
                    top: dest.offset().top + dest.height() / 2,
                    left: dest.offset().left + dest.width() / 2,
                    width: 0,
                    height: 0,
                    opacity: 0
                },
                600,
                function() {
                    c.remove();
                });
        });
    });
</script>

</html>
