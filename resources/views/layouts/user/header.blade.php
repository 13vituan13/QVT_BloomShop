<nav class="fh5co-nav" role="navigation">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-xs-12 logo">
                <div id="fh5co-logo">
                    <a href="{{ route('home') }}">
                        <img class="logo__image" src="{{ asset('images/logo/logo.png') }}" alt="brand">
                    </a>
                </div>
            </div>
            <div class="col-md-6 col-xs-8 text-center menu-1">
                <ul>
                    <li><a href="{{ route('home') }}">Trang Chủ</a></li>
                    <li><a href="{{ route('about') }}">Giới Thiệu</a></li>
                    <li class="has-dropdown">
                        <a href="{{ route('product') }}">Sản Phẩm</a>
                        <ul class="dropdown">
                            @foreach ($categories as $category)
                                <li><a href="#">{{ $category->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="{{ route('services') }}">Hoa Kể Chuyện</a></li>
                    <li><a href="{{ route('contact') }}">Liên Lạc</a></li>
                    
                </ul>
                <div class="ButtonUserGroup row">
                    <button id="openModalBtn" class="ButtonUserGroup__login">ĐĂNG NHẬP</button>
                    <button class="ButtonUserGroup__regist"><a href="{{ route('sign_up') }}">ĐĂNG KÍ</a></button>
                </div>
            </div>
            <div class="col-md-3 col-xs-3 text-right hidden-xs menu-2">
                <ul>
                    {{-- <li class="search">
                        <div class="input-group">
                            <input type="text" placeholder="Search..">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="button"><i class="icon-search"></i></button>
                            </span>
                        </div>
                    </li> --}}
                    <li class="shopping-cart">
                        <a href="#" class="cart">
                            <span>
                                <small>10</small>
                                <i class="fa-solid fa-cart-shopping fz--25"></i>
                            </span>
                        </a>
                    </li>
                    
                    
                </ul>
            </div>
        </div>

    </div>
</nav>

@if (!Request::routeIs('home') &&  !Request::routeIs('sign_up'))
    <header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner"
        style="background-image:url(images/img_bg_2.jpg);">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <div class="display-t">
                        <div class="display-tc animate-box" data-animate-effect="fadeIn">
                            <h1>Contact Us</h1>
                            <h2>Free html5 templates Made by <a href="http://freehtml5.co"
                                    target="_blank">freehtml5.co</a></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endif
