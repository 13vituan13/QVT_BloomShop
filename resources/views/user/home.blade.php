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
            
            @if(count($best_choice) > 0)
                @foreach ($best_choice as $item)
                <div class="col-md-4 text-center animate-box">
                    <div class="product">
                        @php
                            $path = count($item->product_image) > 0 ? $item->product_image[0]['image'] : '';
                        @endphp
                        <div class="product-grid" style="background-image:url({{ asset("storage/{$path}") }}">
                            <span class="sale">10%</span>
                            <div class="inner">
                                <p>
                                    <a href="single.html" class="icon"><i class="icon-shopping-cart"></i></a>
                                    <a target="_blank" href="{{ asset("storage/{$path}") }}" class="icon"><i class="icon-eye"></i></a>
                                </p>
                            </div>
                        </div>
                        <div class="desc">
                            <h3><a href="single.html">{{ $item->name }}</a></h3>
                            <span class="price">${{$item->price}}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
        </div>
    </div>
</div>

<div id="fh5co-testimonial" class="fh5co-bg-section">
    <div class="container">
        <div class="row animate-box">
            <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                <span>PHẢN HỒI</span>
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
                                    <img src="{{ asset('images/client/client_02.png') }}" alt="user">
                                </figure>
                                <span>Mr. Ralph Waldo, Emerson <a href="#" class="twitter">TWITTER</a></span>
                                <blockquote>
                                    <p>&ldquo;Hoa là một nụ cười của thiên nhiên.<br> 
                                    Hoa không chỉ làm cho thế giới trở nên đẹp hơn, nó còn giúp con người cảm thấy yêu đời hơn.&rdquo;</p>
                                </blockquote>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-slide active text-center">
                                <figure>
                                    <img src="{{ asset('images/client/client_01.png') }}" alt="user">
                                </figure>
                                <span>Mrs. Trang, <a href="#" class="twitter">FACEBOOK</a></span>
                                <blockquote>
                                    <p>Hoa của shop đẹp tuyệt vời,chuyển phát giao nhanh,nhân viên nhiệt tình, 100 điểm!!!<br>
                                    Sẽ quay lại và đặt thêm nhiều vào các dịp khác nữa.</p>
                                </blockquote>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-slide active text-center">
                                <figure>
                                    <img src="{{ asset('images/client/client_03.png') }}" alt="user">
                                </figure>
                                <span>Mrs. Deborah Chaskin <a href="#" class="twitter">INSTAGRAM</a></span>
                                <blockquote>
                                    <p>&ldquo;Hoa là ngôn ngữ của tình yêu.<br>
                                    Hoa không nói, nhưng nếu bạn nghe kỹ, bạn sẽ cảm nhận được tình yêu của chúng.&rdquo;</p>
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
                            <span class="counter js-counter" data-from="0" data-to="{{ $count_product }}" data-speed="5000" data-refresh-interval="50">1</span>
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


@include('user.login')
@endsection