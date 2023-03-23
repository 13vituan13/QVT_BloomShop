@extends('layouts.user.master')
@section('title', 'Home')
@section('content')
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
            padding: 9px 10px;
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
            padding: 4px 10px;
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
    <aside id="fh5co-hero" style="height: auto;">
        <div class="flexslider " style="height: auto;">
            <ul class="slides">
                @foreach ($banners as $item)
                    <li class="banner" style="background-image: url({{ asset('images/banner/' . $item->image) }}"
                        style="height: auto;">
                        <div class="overlay-gradient"></div>
                        <div class="container">
                            <div class="col-md-6 col-md-offset-3 col-md-pull-3 js-fullheight slider-text">
                                <div class="slider-text-inner">
                                    <div class="desc">
                                        <span class="price">${{ $item->product['price'] }}</span>
                                        <h2>{{ $item->product['name'] }}</h2>
                                        <p>{{ $item->product['description'] }}</p>
                                        <p><a href="single.html" class="btn btn-primary btn-outline btn-lg">Mua Ngay</a></p>
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
                            <i class="fa-solid fa-users"></i>
                        </span>
                        <h3>Chăm Sóc Khách Hàng</h3>
                        <p class="text-start">Chăm sóc khách hàng là một trong những yếu tố quan trọng nhất trong kinh
                            doanh, đặc biệt là với các cửa hàng bán hoa. Tại đây, việc tạo ra trải nghiệm mua sắm tuyệt vời
                            và đáp ứng nhu cầu của khách hàng là điều cần thiết.
                            Cửa hàng bán hoa nên luôn sẵn sàng lắng nghe ý kiến phản hồi của khách hàng, nâng cao chất lượng
                            sản phẩm.</p>
                        <p><a href="#" class="btn btn-primary btn-outline">Tìm Hiểu Thêm</a></p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 text-center">
                    <div class="feature-center animate-box" data-animate-effect="fadeIn">
                        <span class="icon">
                            <i class="icon-wallet"></i>
                        </span>
                        <h3>Tiết Kiệm Chi Phí</h3>
                        <p class="text-start">Chúng tôi thường áp dụng nhiều biện pháp tiết kiệm chi phí như tối ưu hóa quy
                            trình sản xuất, sử dụng nguồn vật tư và nhân lực hiệu quả, đàm phán giá với các nhà cung cấp để
                            giảm giá thành sản phẩm. Ngoài ra, chúng tôi cũng sử dụng các công nghệ và ứng dụng quản lý chi
                            phí hiện đại để theo dõi và kiểm soát chi phí một cách chặt chẽ.</p>
                        <p><a href="#" class="btn btn-primary btn-outline">Tìm Hiểu Thêm</a></p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 text-center">
                    <div class="feature-center animate-box" data-animate-effect="fadeIn">
                        <span class="icon">
                            <i class="icon-paper-plane"></i>
                        </span>
                        <h3>Giao Hàng Miễn Phí</h3>
                        <p class="text-start">Shop bán hoa của chúng tôi rất hân hạnh được cung cấp dịch vụ giao hàng miễn
                            phí cho khách hàng. Chúng tôi hiểu rằng khách hàng rất quan tâm đến thời gian và chất lượng của
                            sản phẩm mình đặt mua, vì vậy chúng tôi cam kết cung cấp dịch vụ giao hàng nhanh chóng và đảm
                            bảo sản phẩm được vận chuyển an toàn đến tay khách hàng.</p>
                        <p><a href="#" class="btn btn-primary btn-outline">Tìm Hiểu Thêm</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="fh5co-product container_product">
        <div class="container container_product">
            <div class="row animate-box">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading mt-5">
                    <span>SẢN PHẨM HOA</span>
                    <h2>BEST CHOICE</h2>
                    <p>Hoa hồng Ecuador – Vẻ Đẹp Kiêu Hãnh Từ Bên Kia Địa Cầu<br>
                        Hoa hồng Ecuador được ví như nàng thơ dịu dàng, quyến rũ trước một rừng hoa bạt ngàn màu sắc. Vẻ đẹp
                        của hồng Ecuador thật khó để diễn tả bằng lời, và người tặng nó cũng mang nhiều nỗi tâm tư tình cảm
                        giấu kín.
                    </p>
                </div>
            </div>
            <div class="row">
                @if (count($best_choice) > 0)
                    @foreach ($best_choice as $item)
                        <div class="col-sm-4 text-center animate-box" data-animate-effect="fadeIn">
                            <div class="product">
                                @php
                                    $path = count($item->product_image) > 0 ? $item->product_image[0]['image'] : '';
                                @endphp
                                <div class="image">
                                    <img class="img-fluid animate-box" data-animate-effect="fadeIn" src="{{ asset("storage/{$path}") }}" />
                                    <span class="sale">10%</span>
                                    <div class="add_to_cart" 
                                            data-productId="{{$item->product_id}}"
                                            data-productName="{{$item->name}}"
                                            data-productPrice="{{$item->price}}"
                                            data-productImage="{{$item->product_image[0]['image']}}"
                                            data-productCategory="{{isset($item->category['name']) ? $item->category['name'] : ''}}"
                                        >
                                        <i class="icon-shopping-cart"></i>
                                        <a target="_blank" href="{{ asset("storage/{$path}") }}" class="eye">
                                            <i class="icon-eye"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="desc mt-4">
                                    <h3><a href="single.html">{{ $item->name }}</a></h3>
                                    <span class="price">${{ $item->price }}</span>
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
                                            Hoa không chỉ làm cho thế giới trở nên đẹp hơn, nó còn giúp con người cảm thấy
                                            yêu đời hơn.&rdquo;</p>
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
                                        <p>Hoa của shop đẹp tuyệt vời,chuyển phát giao nhanh,nhân viên nhiệt tình, 100
                                            điểm!!!<br>
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
                                            Hoa không nói, nhưng nếu bạn nghe kỹ, bạn sẽ cảm nhận được tình yêu của
                                            chúng.&rdquo;</p>
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

                                <span class="counter js-counter" data-from="0" data-to="22070" data-speed="5000"
                                    data-refresh-interval="50">1</span>
                                <span class="counter-label">Creativity Fuel</span>

                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 animate-box">
                            <div class="feature-center">
                                <span class="icon">
                                    <i class="icon-shopping-cart"></i>
                                </span>

                                <span class="counter js-counter" data-from="0" data-to="{{ $count_client }}"
                                    data-speed="5000" data-refresh-interval="50">1</span>
                                <span class="counter-label">Happy Clients</span>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 animate-box">
                            <div class="feature-center">
                                <span class="icon">
                                    <i class="icon-shop"></i>
                                </span>
                                <span class="counter js-counter" data-from="0" data-to="{{ $count_product }}"
                                    data-speed="5000" data-refresh-interval="50">1</span>
                                <span class="counter-label">All Products</span>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 animate-box">
                            <div class="feature-center">
                                <span class="icon">
                                    <i class="icon-clock"></i>
                                </span>

                                <span class="counter js-counter" data-from="0" data-to="5605" data-speed="5000"
                                    data-refresh-interval="50">1</span>
                                <span class="counter-label">Hours Spent</span>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
