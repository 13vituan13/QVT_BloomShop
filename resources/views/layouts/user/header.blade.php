<nav class="fh5co-nav" role="navigation">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-xs-12 logo">
                <div id="fh5co-logo">
                    <a href="{{ route('home') }}">
                        <img class="logo__image" src="{{ asset('images/logo2/logoS1.png') }}" alt="brand">
                    </a>
                </div>
            </div>
            <div class="col-md-6 col-xs-6 text-center menu-1">
                <ul>
                    <li class="has-dropdown">
                        <a href="{{ route('product') }}">San pham</a>
                        <ul class="dropdown">
                            <li><a href="{{ route('single') }}">Single Shop</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route('about') }}">About</a></li>
                    <li class="has-dropdown">
                        <a href="{{ route('services') }}">Services</a>
                        <ul class="dropdown">
                            <li><a href="#">Web Design</a></li>
                            <li><a href="#">eCommerce</a></li>
                            <li><a href="#">Branding</a></li>
                            <li><a href="#">API</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route('contact') }}">Contact</a></li>
                </ul>
            </div>
            <div class="col-md-3 col-xs-5 text-right hidden-xs menu-2">
                <ul>
                    <li class="search">
                        <div class="input-group">
                          <input type="text" placeholder="Search..">
                          <span class="input-group-btn">
                            <button class="btn btn-primary" type="button"><i class="icon-search"></i></button>
                          </span>
                        </div>
                    </li>
                    <li class="shopping-cart"><a href="#" class="cart"><span><small>0</small><i class="icon-shopping-cart"></i></span></a></li>
                </ul>
            </div>
        </div>
        
    </div>
</nav>

@if(!Request::routeIs('home'))
<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner" style="background-image:url(images/img_bg_2.jpg);">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">
                <div class="display-t">
                    <div class="display-tc animate-box" data-animate-effect="fadeIn">
                        <h1>Contact Us</h1>
                        <h2>Free html5 templates Made by <a href="http://freehtml5.co" target="_blank">freehtml5.co</a></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
@endif