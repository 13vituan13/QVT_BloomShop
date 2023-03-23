<style>
    .CustomerInfo {
        display: inline-block;
        vertical-align: middle;
    }

    .fh5co-nav_fix {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 9999;
        background-color: #fff;
        box-shadow: 0 2px 2px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease-in-out;
    }
    .humberger__menu{
        z-index: 99999;
        position: fixed;
    }
    .fh5co-nav_fix.scrolled,
    .humberger__menu.scrolled {
        transform: translateY(-100%);
    }
    
    /* Add padding to the body to make up for the space taken up by the fixed header */
    body {
        padding-top: 80px;
    }
    @media only screen and (min-width: 768px) and (max-width: 991px) { 
        .ButtonLoginGroup{
            text-align: center;
            margin-top: 5px;
        }
    }
    @media only screen and (min-width: 992px) and (max-width: 1200px) { 
        #fh5co-logo{
            text-align: center;
        }
    }


</style>

<nav id="header-nav" class="fh5co-nav fh5co-nav_fix" role="navigation">
    <div class="container-fluid ">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-xl-2 logo">
                <div id="fh5co-logo">
                    <a href="{{ route('home') }}">
                        <img class="logo__image" src="{{ asset('images/logo/logo.png') }}" alt="brand">
                    </a>
                </div>
            </div>
            <div class="col-md-12 col-lg-7 col-xl-7 text-center menu-1">
                <ul>
                    <li class="@if (Request::routeIs('home')) active @endif"><a href="{{ route('home') }}">Trang
                            Chủ</a></li>
                    <li class="@if (Request::routeIs('about')) active @endif"><a href="{{ route('about') }}">Giới
                            Thiệu</a></li>
                    <li class="has-dropdown @if (Request::routeIs('product')) active @endif">
                        <a href="{{ route('product') }}">Sản Phẩm</a>
                        <ul class="dropdown">
                            @foreach ($categories as $category)
                                <li><a href="#">{{ $category->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="@if (Request::routeIs('services')) active @endif"><a href="{{ route('services') }}">Hoa Kể
                            Chuyện</a></li>
                    <li class="@if (Request::routeIs('contact')) active @endif"><a href="{{ route('contact') }}">Liên
                            Lạc</a></li>
                </ul>
            </div>

            <div class="ButtonLoginGroup col-md-12 col-lg-5 col-xl-3 text-right hidden-xs menu-2 destContainer">
                <ul>
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


<script>
    var lastScrollTop = 0;

    window.addEventListener("scroll", function() {
        var currentScroll = window.pageYOffset || document.documentElement.scrollTop;

        if (currentScroll > lastScrollTop) {
            // scrolling down, visible header menu
            $('#header-nav').addClass("fh5co-nav_fix");
            $('#header-nav').addClass("scrolled");
            $('#humbergerMenu').addClass("scrolled");
            
        } else {
            // scrolling up, show header menu
            $('#header-nav').addClass("fh5co-nav_fix");
            $('#header-nav').removeClass("scrolled");
            $('#humbergerMenu').removeClass("scrolled");
        }

        lastScrollTop = currentScroll;
    });
</script>
