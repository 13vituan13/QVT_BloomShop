@extends('layouts.user.master')
@section('title', 'Home')
@section('content')
<aside id="fh5co-hero" style="height: auto;">
    <div class="flexslider " style="height: auto;">
        <ul class="slides">
            @foreach ($banners as $item)
            <li class="banner" style="background-image: url({{ asset('images/banner/'.$item->image) }}" style="height: auto;">
                <div class="overlay-gradient"></div>
                <div class="container">
                    <div class="col-md-6 col-md-offset-3 col-md-pull-3 js-fullheight slider-text">
                        <div class="slider-text-inner">
                            <div class="desc">
                                <span class="price">$800</span>
                                <h2>Alato Cabinet</h2>
                                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove.</p>
                                <p><a href="single.html" class="btn btn-primary btn-outline btn-lg">Purchase Now</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            @endforeach
          </ul>
      </div>
</aside>

<div id="fh5co-services" class="fh5co-bg-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-4 text-center">
                <div class="feature-center animate-box" data-animate-effect="fadeIn">
                    <span class="icon">
                        <i class="icon-credit-card"></i>
                    </span>
                    <h3>Credit Card</h3>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove</p>
                    <p><a href="#" class="btn btn-primary btn-outline">Learn More</a></p>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 text-center">
                <div class="feature-center animate-box" data-animate-effect="fadeIn">
                    <span class="icon">
                        <i class="icon-wallet"></i>
                    </span>
                    <h3>Save Money</h3>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove</p>
                    <p><a href="#" class="btn btn-primary btn-outline">Learn More</a></p>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 text-center">
                <div class="feature-center animate-box" data-animate-effect="fadeIn">
                    <span class="icon">
                        <i class="icon-paper-plane"></i>
                    </span>
                    <h3>Free Delivery</h3>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove</p>
                    <p><a href="#" class="btn btn-primary btn-outline">Learn More</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="fh5co-product">
    <div class="container">
        <div class="row animate-box">
            <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                <span>SẢN PHẨM HOA</span>
                <h2>BEST CHOICE</h2>
                <p>Hoa hồng Ecuador – Vẻ Đẹp Kiêu Hãnh Từ Bên Kia Địa Cầu<br>
                    Hoa hồng Ecuador được ví như nàng thơ dịu dàng, quyến rũ trước một rừng hoa bạt ngàn màu sắc. Vẻ đẹp của hồng Ecuador thật khó để diễn tả bằng lời, và người tặng nó cũng mang nhiều nỗi tâm tư tình cảm giấu kín. 
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 text-center animate-box">
                <div class="product">
                    <div class="product-grid" style="background-image:url({{ asset('images/products/1/product.png') }}">
                        <div class="inner">
                            <p>
                                <a href="single.html" class="icon"><i class="icon-shopping-cart"></i></a>
                                <a href="single.html" class="icon"><i class="icon-eye"></i></a>
                            </p>
                        </div>
                    </div>
                    <div class="desc">
                        <h3><a href="single.html">Hauteville Concrete Rocking Chair</a></h3>
                        <span class="price">$350</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-center animate-box">
                <div class="product">
                    <div class="product-grid" style="background-image:url({{ asset('images/products/2/product.png') }}">
                        <span class="sale">10%</span>
                        <div class="inner">
                            <p>
                                <a href="single.html" class="icon"><i class="icon-shopping-cart"></i></a>
                                <a href="single.html" class="icon"><i class="icon-eye"></i></a>
                            </p>
                        </div>
                    </div>
                    <div class="desc">
                        <h3><a href="single.html">Pavilion Speaker</a></h3>
                        <span class="price">$600</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-center animate-box">
                <div class="product">
                    <div class="product-grid" style="background-image:url({{ asset('images/products/3/product.png') }}">
                        <div class="inner">
                            <p>
                                <a href="single.html" class="icon"><i class="icon-shopping-cart"></i></a>
                                <a href="single.html" class="icon"><i class="icon-eye"></i></a>
                            </p>
                        </div>
                    </div>
                    <div class="desc">
                        <h3><a href="single.html">Ligomancer</a></h3>
                        <span class="price">$780</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 text-center animate-box">
                <div class="product">
                    <div class="product-grid" style="background-image:url({{ asset('images/products/4/product.png') }}">
                        <div class="inner">
                            <p>
                                <a href="single.html" class="icon"><i class="icon-shopping-cart"></i></a>
                                <a href="single.html" class="icon"><i class="icon-eye"></i></a>
                            </p>
                        </div>
                    </div>
                    <div class="desc">
                        <h3><a href="single.html">Alato Cabinet</a></h3>
                        <span class="price">$800</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-center animate-box">
                <div class="product">
                    <div class="product-grid" style="background-image:url({{ asset('images/products/5/product.png') }}">
                        <div class="inner">
                            <p>
                                <a href="single.html" class="icon"><i class="icon-shopping-cart"></i></a>
                                <a href="single.html" class="icon"><i class="icon-eye"></i></a>
                            </p>
                        </div>
                    </div>
                    <div class="desc">
                        <h3><a href="single.html">Earing Wireless</a></h3>
                        <span class="price">$100</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-center animate-box">
                <div class="product">
                    <div class="product-grid" style="background-image:url({{ asset('images/products/6/product.png') }}">
                        <div class="inner">
                            <p>
                                <a href="single.html" class="icon"><i class="icon-shopping-cart"></i></a>
                                <a href="single.html" class="icon"><i class="icon-eye"></i></a>
                            </p>
                        </div>
                    </div>
                    <div class="desc">
                        <h3><a href="single.html">Sculptural Coffee Table</a></h3>
                        <span class="price">$960</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 text-center animate-box">
                <div class="product">
                    <div class="product-grid" style="background-image:url({{ asset('images/products/7/product.png') }}">
                        <div class="inner">
                            <p>
                                <a href="single.html" class="icon"><i class="icon-shopping-cart"></i></a>
                                <a href="single.html" class="icon"><i class="icon-eye"></i></a>
                            </p>
                        </div>
                    </div>
                    <div class="desc">
                        <h3><a href="single.html">Alato Cabinet</a></h3>
                        <span class="price">$800</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-center animate-box">
                <div class="product">
                    <div class="product-grid" style="background-image:url({{ asset('images/products/8/product.png') }}">
                        <div class="inner">
                            <p>
                                <a href="single.html" class="icon"><i class="icon-shopping-cart"></i></a>
                                <a href="single.html" class="icon"><i class="icon-eye"></i></a>
                            </p>
                        </div>
                    </div>
                    <div class="desc">
                        <h3><a href="single.html">Earing Wireless</a></h3>
                        <span class="price">$100</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-center animate-box">
                <div class="product">
                    <div class="product-grid" style="background-image:url({{ asset('images/products/9/product.png') }}">
                        <div class="inner">
                            <p>
                                <a href="single.html" class="icon"><i class="icon-shopping-cart"></i></a>
                                <a href="single.html" class="icon"><i class="icon-eye"></i></a>
                            </p>
                        </div>
                    </div>
                    <div class="desc">
                        <h3><a href="single.html">Sculptural Coffee Table</a></h3>
                        <span class="price">$960</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="fh5co-testimonial" class="fh5co-bg-section">
    <div class="container">
        <div class="row animate-box">
            <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                <span>Testimony</span>
                <h2>Happy Clients</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="row animate-box">
                    <div class="owl-carousel owl-carousel-fullwidth">
                        <div class="item">
                            <div class="testimony-slide active text-center">
                                <figure>
                                    <img src="{{ asset('images/client/client_01.png') }}" alt="user">
                                </figure>
                                <span>Mrs Trang, <a href="#" class="twitter">FACEBOOK</a></span>
                                <blockquote>
                                    <p>Hoa của shop đẹp tuyệt vời, giao nhanh, nhiệt tình, 10 điểm!!!</p>
                                </blockquote>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-slide active text-center">
                                <figure>
                                    <img src="images/person2.jpg" alt="user">
                                </figure>
                                <span>John Doe, via <a href="#" class="twitter">Twitter</a></span>
                                <blockquote>
                                    <p>&ldquo;Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
                                </blockquote>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-slide active text-center">
                                <figure>
                                    <img src="images/person3.jpg" alt="user">
                                </figure>
                                <span>John Doe, via <a href="#" class="twitter">Twitter</a></span>
                                <blockquote>
                                    <p>&ldquo;Far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div id="fh5co-counter" class="fh5co-bg fh5co-counter" style="background-image:url(images/img_bg_5.jpg);">
    <div class="container">
        <div class="row">
            <div class="display-t">
                <div class="display-tc">
                    <div class="col-md-3 col-sm-6 animate-box">
                        <div class="feature-center">
                            <span class="icon">
                                <i class="icon-eye"></i>
                            </span>

                            <span class="counter js-counter" data-from="0" data-to="22070" data-speed="5000" data-refresh-interval="50">1</span>
                            <span class="counter-label">Creativity Fuel</span>

                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 animate-box">
                        <div class="feature-center">
                            <span class="icon">
                                <i class="icon-shopping-cart"></i>
                            </span>

                            <span class="counter js-counter" data-from="0" data-to="450" data-speed="5000" data-refresh-interval="50">1</span>
                            <span class="counter-label">Happy Clients</span>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 animate-box">
                        <div class="feature-center">
                            <span class="icon">
                                <i class="icon-shop"></i>
                            </span>
                            <span class="counter js-counter" data-from="0" data-to="700" data-speed="5000" data-refresh-interval="50">1</span>
                            <span class="counter-label">All Products</span>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 animate-box">
                        <div class="feature-center">
                            <span class="icon">
                                <i class="icon-clock"></i>
                            </span>

                            <span class="counter js-counter" data-from="0" data-to="5605" data-speed="5000" data-refresh-interval="50">1</span>
                            <span class="counter-label">Hours Spent</span>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="fh5co-started">
    <div class="container">
        <div class="row animate-box">
            <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                <h2>Newsletter</h2>
                <p>Just stay tune for our latest Product. Now you can subscribe</p>
            </div>
        </div>
        <div class="row animate-box">
            <div class="col-md-8 col-md-offset-2">
                <form class="form-inline">
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <button type="submit" class="btn btn-default btn-block">Subscribe</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection