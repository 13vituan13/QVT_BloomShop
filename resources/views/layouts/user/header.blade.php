<style>
    .CustomerInfo {
        display: inline-block;
        vertical-align: middle;
    }

    .shopping-cart {
        display: inline-block;
        vertical-align: middle;
        margin-left: 20px;
    }
</style>
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
                    @if (!\Session::has('customer'))
                        <li>
                            <div class="ButtonUserGroup">
                                <button id="openModalBtn" onclick="showLogin()"
                                    class="btn-user ButtonUserGroup__login">ĐĂNG NHẬP</button>
                                <button class="btn-user ButtonUserGroup__regist"
                                    onclick="goToPage('{{ route('sign_up') }}')">ĐĂNG KÍ</button>
                            </div>
                        </li>
                    @endif
                    <li class="shopping-cart"
                        @if (\Session::has('customer')) style="margin-top: 20px!important;" @endif>
                        <a href="#" class="cart">
                            <span>
                                <small>10</small>
                                <i class="fa-solid fa-cart-shopping fz--25"></i>
                            </span>
                        </a>
                    </li>
                    @if (\Session::has('customer'))
                        <li class="CustomerInfo">
                            <ul class="list-unstyled">
                                <li class="dropdown ms-2">

                                    <a class="avt-link rounded-circle " href="#" role="button" id="dropdownUser"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <div class="avatar avatar-md avatar-indicators avatar-online">
                                            <img alt="avatar" src="https://via.placeholder.com/40x40"
                                                class="rounded-circle">
                                        </div>
                                    </a>

                                    <div class="dropdown-menu pb-2" aria-labelledby="dropdownUser">
                                        <div class="dropdown-item">
                                            <div class="d-flex py-2">
                                                <div class="avatar avatar-md avatar-indicators avatar-online">
                                                    <img alt="avatar" src="https://via.placeholder.com/40x40"
                                                        class="rounded-circle">
                                                </div>
                                                <div class="ms-3 lh-1">
                                                    <h5 class="mb-0">{{ Session::get('customer')->name }}</h5>
                                                    <p class="mb-0">{{ Session::get('customer')->email }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="dropdown-divider"></div>
                                        <div class="">
                                            <ul class="list-unstyled">
                                                <li style="width:100%">
                                                    <a class="avt-link dropdown-item"
                                                        href="@@webRoot/pages/profile-edit.html">
                                                        <span class="me-1">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                                height="12" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-user">
                                                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2">
                                                                </path>
                                                                <circle cx="12" cy="7" r="4">
                                                                </circle>
                                                            </svg>
                                                        </span>Profile
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="dropdown-divider"></div>
                                        <ul class="list-unstyled">
                                            <li style="width:100%">
                                                <a class="avt-link dropdown-item" href="{{ route('logout') }}">
                                                    <span class="me-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                            height="14" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-power">
                                                            <path d="M18.36 6.64a9 9 0 1 1-12.73 0"></path>
                                                            <line x1="12" y1="2" x2="12"
                                                                y2="12"></line>
                                                        </svg></span>Sign Out
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>

    </div>
</nav>

@if (!Request::routeIs('home') && !Request::routeIs('sign_up'))
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
