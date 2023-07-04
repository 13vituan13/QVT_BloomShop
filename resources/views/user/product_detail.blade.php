@extends('layouts.user.master')
@section('title', 'Product')
@section('content')
    <style>
        .pd-wrap {
            padding: 40px 0;
            font-family: "Playfair Display", serif;
        }

        .heading-section {
            text-align: center;
            margin-bottom: 20px;
        }

        .sub-heading {
            font-family: "Playfair Display", serif;
            font-size: 12px;
            display: block;
            font-weight: 400;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 16px;
            line-height: 1.7;
            color: #828282;
            background: #fff;
        }

        .heading-section h2 {
            font-size: 32px;
            font-weight: 500;
            padding-top: 10px;
            padding-bottom: 15px;
            font-family: "Playfair Display", serif;
        }

        .user-img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            position: relative;
            min-width: 80px;
            background-size: 100%;
        }

        .carousel-testimonial .item {
            padding: 30px 10px;
        }

        .quote {
            position: absolute;
            top: -23px;
            color: #2e9da1;
            font-size: 27px;
        }

        .name {
            margin-bottom: 0;
            line-height: 14px;
            font-size: 17px;
            font-weight: 500;
        }

        .position {
            color: #adadad;
            font-size: 14px;
        }

        .owl-nav button {
            position: absolute;
            top: 50%;
            transform: translate(0, -50%);
            outline: none;
            height: 25px;
        }

        .owl-nav button svg {
            width: 25px;
            height: 25px;
        }

        .owl-nav button.owl-prev {
            left: 25px;
        }

        .owl-nav button.owl-next {
            right: 25px;
        }

        .owl-nav button span {
            font-size: 45px;
        }

        .product-thumb .item img {
            height: auto;
        }

        .product-name {
            font-size: 22px;
            font-weight: 500;
            line-height: 22px;
            margin-bottom: 4px;
        }

        .product-price-discount {
            font-size: 22px;
            font-weight: 400;
            padding: 10px 0;
            clear: both;
        }

        .product-price-discount span.line-through {
            text-decoration: line-through;
            margin-left: 10px;
            font-size: 14px;
            vertical-align: middle;
            color: #a5a5a5;
        }

        .display-flex {
            display: flex;
        }

        .align-center {
            align-items: center;
        }

        .product-info {
            width: 100%;
        }

        .reviews-counter {
            font-size: 13px;
        }

        .reviews-counter span {
            vertical-align: -2px;
        }

        .rate {
            float: left;
            padding: 0 10px 0 0;
        }

        .rate:not(:checked)>input {
            position: absolute;
            top: -9999px;
        }

        .rate:not(:checked)>label {
            float: right;
            width: 15px;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 21px;
            color: #ccc;
            margin-bottom: 0;
            line-height: 21px;
        }

        .rate:not(:checked)>label:before {
            content: "\2605";
        }

        .rate>input:checked~label {
            color: #ffc700;
        }

        .rate:not(:checked)>label:hover,
        .rate:not(:checked)>label:hover~label {
            color: #deb217;
        }

        .rate>input:checked+label:hover,
        .rate>input:checked+label:hover~label,
        .rate>input:checked~label:hover,
        .rate>input:checked~label:hover~label,
        .rate>label:hover~input:checked~label {
            color: #c59b08;
        }

        p {
            color: #828282;
        }

        .product-dtl p {
            font-size: 14px;
            line-height: 24px;
            color: #7a7a7a;
        }

        .product-dtl .form-control {
            font-size: 15px;
        }

        .product-dtl label {
            line-height: 16px;
            font-size: 15px;
        }

        .form-control:focus {
            outline: none;
            box-shadow: none;
        }

        .product-count {
            margin-top: 15px;
        }

        .hr_detail {
            border-top: 2px solid #d1c286;
        }

        .product-count .qtyminus,
        .product-count .qtyplus {
            width: 34px;
            height: 34px;
            background: #d1c286;
            text-align: center;
            font-size: 19px;
            line-height: 36px;
            color: #fff;
            cursor: pointer;
        }

        .product-count .qtyminus {
            border-radius: 3px 0 0 3px;
        }

        .product-count .qtyplus {
            border-radius: 0 3px 3px 0;
        }

        .product-count .qty {
            width: 60px;
            text-align: center;
            border: 3px solid #d1c286;

        }

        .product-count .qty:focus {
            border: 1px solid #d1c286;
            outline: none;
        }


        .round-black-btn {
            border-radius: 4px;
            background: #d1c286;
            color: #fff;
            padding: 7px 45px;
            display: inline-block;
            margin-top: 20px;
            border: solid 2px #d1c286;
            transition: all 0.5s ease-in-out 0s;
        }

        .round-black-btn:hover,
        .round-black-btn:focus {
            background: transparent;
            color: #d1c286;
            text-decoration: none;
        }

        .product-info-tabs {
            margin-top: 25px;
        }

        .product-info-tabs .nav-tabs {
            border-bottom: 2px solid #d8d8d8;
        }

        .product-info-tabs .nav-tabs .nav-item {
            margin-bottom: 0;
        }

        .product-info-tabs .nav-tabs .nav-link {
            border: none;
            border-bottom: 2px solid transparent;
            color: #323232;
        }

        .product-info-tabs .nav-tabs .nav-item .nav-link:hover {
            border: none;
        }

        .product-info-tabs .nav-tabs .nav-item.show .nav-link,
        .product-info-tabs .nav-tabs .nav-link.active,
        .product-info-tabs .nav-tabs .nav-link.active:hover {
            border: none;
            border-bottom: 2px solid #d8d8d8;
            font-weight: bold;
        }

        .product-info-tabs .tab-content .tab-pane {
            padding: 30px 20px;
            font-size: 15px;
            line-height: 24px;
            color: #7a7a7a;
        }

        .review-form .form-group {
            clear: both;
        }

        .mb-20 {
            margin-bottom: 20px;
        }

        .review-form .rate {
            float: none;
            display: inline-block;
        }

        .review-heading {
            font-size: 24px;
            font-weight: 600;
            line-height: 24px;
            margin-bottom: 6px;
            text-transform: uppercase;
            color: #000;
        }

        .review-form .form-control {
            font-size: 14px;
        }

        .review-form input.form-control {
            height: 40px;
        }

        .review-form textarea.form-control {
            resize: none;
        }

        .review-form .round-black-btn {
            text-transform: uppercase;
            cursor: pointer;
        }
        .star {
            font-size: 2rem;
            cursor: pointer;
            transition: color 0.2s;
        }
        .star-show {
            font-size: 1rem;
        }
        .star-show.selected {
            color: orange;
        }

        .star:hover,
        .star.selected {
            color: orange;
        }

    </style>
    <!--Important link from https://bootsnipp.com/snippets/XqvZr-->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    {{-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}
    <!------ Include the above in your HEAD tag ---------->

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <div class="pd-wrap">
        <div class="container">
            <div class="heading-section">
                <h2>Chi Tiết Sản Phẩm</h2>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div id="slider" class="owl-carousel product-slider">
                        @if (count($product_detail->product_image))
                            @foreach ($product_detail->product_image as $item)
                                @php
                                    $image = $item->image ? $item->image : 'assets/images/no_image.png';
                                @endphp
                                <div class="item">
                                    <img src="{{ asset("storage/{$image}") }}" />
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div id="thumb" class="owl-carousel product-thumb mt-3">
                        @if (count($product_detail->product_image))
                            @foreach ($product_detail->product_image as $item)
                                @php
                                    $image = $item->image ? $item->image : 'assets/images/no_image.png';
                                @endphp
                                <div class="item" style="padding-right: 8px;">
                                    <img src="{{ asset("storage/{$image}") }}" />
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="product-dtl">
                        <div class="product-info">
                            <div class="product-name">{{ $product_detail->name }}</div>
                            <div class="reviews-counter">
                                <div class="rate">
                                    <input type="radio" id="star5" name="rate" value="5" checked />
                                    <label for="star5" title="text">5 stars</label>
                                    <input type="radio" id="star4" name="rate" value="4" checked />
                                    <label for="star4" title="text">4 stars</label>
                                    <input type="radio" id="star3" name="rate" value="3" checked />
                                    <label for="star3" title="text">3 stars</label>
                                    <input type="radio" id="star2" name="rate" value="2" />
                                    <label for="star2" title="text">2 stars</label>
                                    <input type="radio" id="star1" name="rate" value="1" />
                                    <label for="star1" title="text">1 star</label>
                                </div>
                                <span>3 Reviews</span>
                            </div>
                            <div class="product-price-discount"><span>${{ $product_detail->price }}</span><span
                                    class="line-through">$29.00</span></div>
                        </div>
                        <div class="description_show">
                            @php
                                use Illuminate\Support\Str;
                                // Truncate the description to 50 characters
                                $truncated = Str::limit($product_detail->description, 450, '...');
                            @endphp
                            {!! html_entity_decode($truncated) !!}
                        </div>

                        {{-- <div class="row">
                            <div class="col-md-6">
                                <label for="size">Size</label>
                                <select id="size" name="size" class="form-control">
                                    <option>S</option>
                                    <option>M</option>
                                    <option>L</option>
                                    <option>XL</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="color">Color</label>
                                <select id="color" name="color" class="form-control">
                                    <option>Blue</option>
                                    <option>Green</option>
                                    <option>Red</option>
                                </select>
                            </div>
                        </div> --}}
                        <div class="product-count">
                            <label for="size">Số Lượng</label>
                            <form action="#" class="display-flex">
                                <div class="qtyminus">-</div>
                                <input type="text" name="quantity" value="1" class="qty">
                                <div class="qtyplus">+</div>
                            </form>
                            @php    
                                $image_product = count($product_detail->product_image) > 0 ? $product_detail->product_image[0]['image'] : 'assets/images/no_image.png';
                            @endphp
                            <a href="#" class="add_to_cart round-black-btn"
                                    data-productId="{{$product_detail->product_id}}"
                                    data-productName="{{$product_detail->name}}"
                                    data-productPrice="{{$product_detail->price}}"
                                    data-productImage="{{$image_product}}"
                                    data-productCategory="{{isset($product_detail->category['name']) ? $product_detail->category['name'] : ''}}">
                                    Thêm vào giỏ
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hr_detail mt-5"></div>
        </div>
        <div id="fh5co-product" style="padding:3em 0;">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="fh5co-tabs animate-box">
                            <ul class="fh5co-tab-nav">
                                <li class="active">
                                    <a href="#" data-tab="1">
                                        <span class="icon visible-xs">
                                            <i class="icon-file"></i>
                                        </span>
                                        <span class="hidden-xs">Mô Tả</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" data-tab="2">
                                        <span class="icon visible-xs">
                                            <i class="icon-bar-graph"></i>
                                        </span>
                                        <span class="hidden-xs">Chính Sách Đổi Trả</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" data-tab="3">
                                        <span class="icon visible-xs">
                                            <i class="icon-star"></i>
                                        </span>
                                        <span class="hidden-xs">Phản Hồi &amp; Đánh Giá</span>
                                    </a>
                                </li>
                            </ul>

                            <!-- Tabs -->
                            <div class="fh5co-tab-content-wrap">
                                <div class="fh5co-tab-content tab-content active" data-tab-content="1">
                                    <div class="col-md-10 col-md-offset-1 description_show">
                                        {{-- htmlspecialchars_decode($product_detail->description) // php --}}
                                        {!! html_entity_decode($product_detail->description) !!}
                                    </div>

                                </div>

                                <div class="fh5co-tab-content tab-content" data-tab-content="2">
                                    <div class="col-md-10 col-md-offset-1 description_show">
                                        <h3>Chính sách đổi trả</h3>
                                        <p>Chính sách đổi trả của chúng tôi áp dụng trong một khoảng thời gian cụ thể, để
                                            đảm bảo rằng khách hàng có đủ thời gian để kiểm tra sản phẩm và yêu cầu đổi trả
                                            khi cần thiết.</p>
                                        <h4>Điều kiện đổi trả</h4>
                                        <p>Hoa phải còn nguyên vẹn, không bị dập nát hay hư hỏng. Nếu hoa đã bị sử dụng hoặc
                                            không còn đủ điều kiện để bán lại, chúng tôi sẽ không chấp nhận đổi trả.</p>
                                        <h4>Quy trình đổi trả</h4>
                                        <p>Khách hàng có thể liên hệ với chúng tôi qua email hoặc điện thoại để yêu cầu đổi
                                            trả. Sau khi chúng tôi nhận được yêu cầu, chúng tôi sẽ thực hiện xác nhận và
                                            hướng dẫn khách hàng về quy trình đổi trả. Thời gian xử lý đổi trả hoa có thể
                                            mất một vài ngày, tùy thuộc vào số lượng sản phẩm và thời gian vận chuyển.</p>
                                        <h4>Hoàn trả tiền</h4>
                                        <p>Chúng tôi cam kết sẽ hoàn trả tiền cho khách hàng nếu hoa không đáp ứng được các
                                            yêu cầu đổi trả của chúng tôi.</p>

                                    </div>
                                </div>

                                <div class="fh5co-tab-content tab-content" data-tab-content="3">
                                    <div class="col-md-10 col-md-offset-1">
                                        <h3>Happy Buyers</h3>
                                        <div class="feed">
                                            <div>
                                                <blockquote>
                                                    <p>Paragraph placeat quis fugiat provident veritatis quia iure a debitis
                                                        adipisci dignissimos consectetur magni quas eius nobis reprehenderit
                                                        soluta eligendi quo reiciendis fugit? Veritatis tenetur odio
                                                        delectus quibusdam officiis est.</p>
                                                </blockquote>
                                                <h3>&mdash; Louie Knight</h3>
                                                <span class="rate">
                                                    <i class="icon-star2"></i>
                                                    <i class="icon-star2"></i>
                                                    <i class="icon-star2"></i>
                                                    <i class="icon-star2"></i>
                                                    <i class="icon-star2"></i>
                                                </span>
                                            </div>
                                            <div>
                                                <blockquote>
                                                    <p>Paragraph placeat quis fugiat provident veritatis quia iure a debitis
                                                        adipisci dignissimos consectetur magni quas eius nobis reprehenderit
                                                        soluta eligendi quo reiciendis fugit? Veritatis tenetur odio
                                                        delectus quibusdam officiis est.</p>
                                                </blockquote>
                                                <h3>&mdash; Joefrey Gwapo</h3>
                                                <span class="rate">
                                                    <i class="icon-star2"></i>
                                                    <i class="icon-star2"></i>
                                                    <i class="icon-star2"></i>
                                                    <i class="icon-star2"></i>
                                                    <i class="icon-star2"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="container">
            <h1>Bình luận</h1>
              <input id="product_id" value="{{$product_detail->product_id}}" hidden/>

              <label for="name">Tên:</label>
              <input type="text" id="name" name="name" class="form-control"><br>

              <label for="comment">Bình luận:</label><br>
              <textarea id="content" name="content" rows="4" cols="50" class="form-control"></textarea><br>
              
              <label for="rating">Đánh giá:</label><br>
              <input type="hidden" name="rating" id="rating" value="0">
              <div class="rating">
                <span class="star" data-value="1">&#9733;</span>
                <span class="star" data-value="2">&#9733;</span>
                <span class="star" data-value="3">&#9733;</span>
                <span class="star" data-value="4">&#9733;</span>
                <span class="star" data-value="5">&#9733;</span>
              </div>
              <br>
              
              <button type="button" class="btn btn-primary" onclick="addNewComment()">Gửi bình luận</button>
            <hr>
            <h2>Danh sách bình luận:</h2>
            <ul id="comments-list" class="list-unstyled">

            @foreach ($product_detail->comment as $k => $item)
                <li>
                    <strong>{{$item['name']}}</strong> : {{$item['content']}} 
                    <div class="rating-show">
                        @for($i = 1; $i <= 5; $i++)
                            <span class="star-show @if($i <= $item['rating']) selected @endif" >&#9733;</span>
                        @endfor
                    </div>
                </li>
                <hr>
            @endforeach
            </ul>
          </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="	sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <script>
        $(document).ready(function() {
            var slider = $("#slider");
            var thumb = $("#thumb");
            var slidesPerPage = 4; //globaly define number of elements per page
            var syncedSecondary = true;
            slider.owlCarousel({
                items: 1,
                slideSpeed: 2000,
                nav: false,
                autoplay: false,
                dots: false,
                loop: true,
                responsiveRefreshRate: 200
            }).on('changed.owl.carousel', syncPosition);
            thumb
                .on('initialized.owl.carousel', function() {
                    thumb.find(".owl-item").eq(0).addClass("current");
                })
                .owlCarousel({
                    items: slidesPerPage,
                    dots: false,
                    nav: true,
                    item: 4,
                    smartSpeed: 200,
                    slideSpeed: 500,
                    slideBy: slidesPerPage,
                    navText: [
                        '<svg width="18px" height="18px" viewBox="0 0 11 20"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M9.554,1.001l-8.607,8.607l8.607,8.606"/></svg>',
                        '<svg width="25px" height="25px" viewBox="0 0 11 20" version="1.1"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M1.054,18.214l8.606,-8.606l-8.606,-8.607"/></svg>'
                    ],
                    responsiveRefreshRate: 100
                }).on('changed.owl.carousel', syncPosition2);

            function syncPosition(el) {
                var count = el.item.count - 1;
                var current = Math.round(el.item.index - (el.item.count / 2) - .5);
                if (current < 0) {
                    current = count;
                }
                if (current > count) {
                    current = 0;
                }
                thumb
                    .find(".owl-item")
                    .removeClass("current")
                    .eq(current)
                    .addClass("current");
                var onscreen = thumb.find('.owl-item.active').length - 1;
                var start = thumb.find('.owl-item.active').first().index();
                var end = thumb.find('.owl-item.active').last().index();
                if (current > end) {
                    thumb.data('owl.carousel').to(current, 100, true);
                }
                if (current < start) {
                    thumb.data('owl.carousel').to(current - onscreen, 100, true);
                }
            }

            function syncPosition2(el) {
                if (syncedSecondary) {
                    var number = el.item.index;
                    slider.data('owl.carousel').to(number, 100, true);
                }
            }
            thumb.on("click", ".owl-item", function(e) {
                e.preventDefault();
                var number = $(this).index();
                slider.data('owl.carousel').to(number, 300, true);
            });


            $(".qtyminus").on("click", function() {
                var now = $(".qty").val();
                if ($.isNumeric(now)) {
                    if (parseInt(now) - 1 > 0) {
                        now--;
                    }
                    $(".qty").val(now);
                }
            })
            $(".qtyplus").on("click", function() {
                var now = $(".qty").val();
                if ($.isNumeric(now)) {
                    $(".qty").val(parseInt(now) + 1);
                }
            });
        });
        $(".star").click(function() {
        var value = $(this).data("value"); // giá trị đánh giá
            $("#rating").val(value);
            $(".star").removeClass("selected");
            $(".star").each(function(index) { // duyệt qua từng ngôi sao
                if (index <= value - 1) { // nếu giá trị của ngôi sao nhỏ hơn hoặc bằng giá trị đánh giá
                $(this).addClass("selected"); // thêm lớp selected
                }
            });
        });
        

        //comment add
        function addNewComment() {
            var formData = new FormData()
            let name = $('#name').val();
            let content = $('#content').val();
            if(!name){
                alert('vui lòng nhập tên.')
                return
            }
            if(!content){
                alert('vui lòng nhập bình luận.')
                return
            }
            formData.append("product_id", $('#product_id').val());
            formData.append("name", name);
            formData.append("content", content);
            //get Star Rating
            var maxRating = 0;
            $(".star.selected").each(function(index) {
                var rating = $(this).data("value");
                if (rating > maxRating) {
                    maxRating = rating;
                }
            });
            formData.append("rating", maxRating);
            $("#loading").removeAttr("hidden");
            //console.log([...formData])
            $.ajax({
                url: '{{ route('admin.addComment') }}',
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    $("#loading").attr("hidden", true);
                    Swal.fire({
                            icon: 'success',
                            title: 'Gửi Bình Luận Thành Công',
                            text: 'Cảm ơn bạn đã gửi phản hồi sản phẩm.',
                            confirmButtonText: 'OK',
                    }).then((result) => {
                        let html = `<li>
                                       <strong>`+response.comment.name+`</strong> : `+response.comment.content+`
                                    </li>
                                    <div class="rating-show ">`
                                        for($i = 1; $i <= 5; $i++){
                                           html += `<span class="star-show`
                                           if($i <= parseInt(response.comment.rating))
                                           { html += ` selected` }
                                           html += `">&#9733;</span>`
                                        }
                            html +=`</div><hr>`        
                        $('#comments-list').append(html);
                    });
                },
                error: function(e) {
                    console.log(e)
                    $("#loading").attr("hidden", true);
                    Swal.fire({
                        icon: 'error',
                        title: 'Gửi Bình Luận Thất Bại',
                        text: 'vui lòng hãy thử lại!',
                        confirmButtonText: 'OK',
                    });
                }
            }); //end ajax

        }
    </script>
@endsection
