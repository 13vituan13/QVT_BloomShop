@extends('layouts.user.master')
@section('title', 'Cart')
@section('content')
    <style>
        body {
            background: #ddd;
            min-height: 100vh;
            vertical-align: middle;
            display: flex;
            font-family: "Playfair Display", serif;
            font-size: 16px;
            line-height: 1.7;
            color: #828282;
            font-weight: 400;
        }
        .title {
            margin-bottom: 5vh;
        }
        .card {
            margin: auto;
            max-width: 1200px;
            width: 100%;
            box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            border-radius: 1rem;
            border: transparent;
        }

        @media(max-width:767px) {
            .card {
                margin: 3vh auto;
            }
        }

        .cart {
            background-color: #fff;
            padding: 4vh 5vh;
            border-bottom-left-radius: 1rem;
            border-top-left-radius: 1rem;
        }

        @media(max-width:767px) {
            .cart {
                padding: 4vh;
                border-bottom-left-radius: unset;
                border-top-right-radius: 1rem;
            }
        }

        .summary {
            background-color: #ddd;
            border-top-right-radius: 1rem;
            border-bottom-right-radius: 1rem;
            padding: 4vh;
            color: rgb(65, 65, 65);
        }

        @media(max-width:767px) {
            .summary {
                border-top-right-radius: unset;
                border-bottom-left-radius: 1rem;
            }
        }

        .summary .col-2 {
            padding: 0;
        }

        .summary .col-10 {
            padding: 0;
        }

        .row {
            margin: 0;
        }

        .title b {
            font-size: 1.5rem;
        }

        .main {
            margin: 0;
            padding: 2vh 0;
            width: 100%;
        }

        .col-2,
        .col {
            padding: 0 1vh;
        }


        .close {
            margin-left: auto;
            font-size: 0.7rem;
        }

        img {
            /* width: 3.5rem; */
        }

        .back-to-shop {
            margin-top: 4.5rem;
        }

        h5 {
            margin-top: 4vh;
        }

        hr {
            margin-top: 1.25rem;
        }

        form {
            padding: 2vh 0;
        }

        select {
            border: 1px solid rgba(0, 0, 0, 0.137);
            padding: 1.5vh 1vh;
            margin-bottom: 4vh;
            outline: none;
            width: 100%;
            background-color: rgb(247, 247, 247);
        }

        input {
            border: 1px solid rgba(0, 0, 0, 0.137);
            padding: 1vh;
            margin-bottom: 4vh;
            outline: none;
            width: 100%;
            background-color: rgb(247, 247, 247);
        }

        input:focus::-webkit-input-placeholder {
            color: transparent;
        }

        .btn {
            background-color: #000;
            border-color: #000;
            color: white;
            width: 100%;
            font-size: 1rem;
            margin-top: 4vh;
            padding: 1vh;
            border-radius: 0;
        }

        .btn:focus {
            box-shadow: none;
            outline: none;
            box-shadow: none;
            color: white;
            -webkit-box-shadow: none;
            -webkit-user-select: none;
            transition: none;
        }

        .btn:hover {
            border: 1px solid black;
            color: black;
        }
        .breadcrumb-item a{
            color:#0d6efd;
            text-decoration: underline;
            font-family: var(--bs-font-sans-serif);
        }
        .breadcrumb-item a:hover {
            color: #0a58ca;
        }
        a {
            color: black;
        }

        a:hover {
            color: black;
            text-decoration: none;
        }

        #code {
            background-image: linear-gradient(to left, rgba(255, 255, 255, 0.253), rgba(255, 255, 255, 0.185)), url("https://img.icons8.com/small/16/000000/long-arrow-right.png");
            background-repeat: no-repeat;
            background-position-x: 95%;
            background-position-y: center;
        }

        .CartGroupQuantity__input {
            background-color: #fff;
            width: 50px;
            height: 30px;
        }

        .CartGroupQuantity .CartGroupQuantity__minus,
        .CartGroupQuantity .CartGroupQuantity__plus {
            cursor: pointer;
            text-align: center;
            transition: all 0.3s ease-in-out;
            width: 13px;
            height: 13px;
            font-size: 18px;
        }

        .CartGroupQuantity .CartGroupQuantity__minus {
            color: #f1690e;
        }

        .CartGroupQuantity .CartGroupQuantity__plus {
            color: #28a745;
        }

        .cartIcon__remove {
            cursor: pointer;
            color: #dc3545;
            font-size: 22px;
        }

        .CartGroupQuantity .CartGroupQuantity__minus:hover {
            border-radius: 50%;
            box-shadow: 0px 0px 8px 4px rgba(241, 105, 14, 0.7);
            background: #f4b184;
            height: 8px;
        }

        .CartGroupQuantity .CartGroupQuantity__plus:hover {
            border-radius: 50%;
            box-shadow: 0px 0px 8px 4px rgba(40, 167, 69, 0.7);
            background: #4fd36f;
            height: 8px;
        }

        .cartIcon__remove:hover {
            border-radius: 50%;
            box-shadow: 0px 0px 8px 4px rgba(220, 53, 69, 0.7);
            background: #f5a3aa;
            height: 8px;
        }
    </style>
    <div id="fh5co-services" class="fh5co-bg-section" style="padding: 3em 0;clear: both;background:#f8f9fa!important">
        <div class="container">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
                    aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-home"></i> Trang chủ</a></li>
                    <li class="breadcrumb-item "><a href="{{ route('product') }}">Sản phẩm</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Giỏ hàng</li>
                </ol>
            </nav>
            <div class="card mt-4">
                <div class="row">
                    <div class="col-md-8 cart">
                        <div class="title">
                            <div class="row">
                                <div class="col">
                                    <h4><b>Giỏ Hàng</b></h4>
                                </div>
                                <div id="counterProductTitle" class="col align-self-center text-right text-muted">{{ $cartCounter }} sản phẩm</div>
                            </div>
                        </div>

                        @if ($cartCounter > 0)
                            @foreach ($cart as $key => $item)
                                <div id="cartItem_{{$item['product_id']}}" class="row border-top border-bottom">
                                    <div class="row main align-items-center">
                                        <div class="col-2"><img class="img-fluid"
                                                src="{{ asset("storage/{$item['image']}") }}"></div>
                                        <div class="col-3">
                                            <div class="row text-muted">{{ $item['name'] }}</div>
                                            <div class="row">{{ $item['category_name'] }}</div>
                                        </div>
                                        <div class="col-3 CartGroupQuantity">
                                            <i class="fa fa-minus-circle CartGroupQuantity__minus me-2"
                                                onclick="cartMinus(this)"></i>
                                            <input class="CartGroupQuantity__input border mb-0 text-center me-1"
                                                data-productId="{{$item['product_id']}}"
                                                value="{{ $item['quantity'] }}" 
                                                onchange="changeDetectedCart(this)">
                                            <i class="fa fa-plus-circle CartGroupQuantity__plus"
                                                onclick="cartPlus(this)"></i>
                                        </div>
                                        <div id="price_{{$item['product_id']}}" class="col-2 text-center">${{ $item['price'] }}</div>
                                        <div class="col-2 text-center">
                                            <i class="fa fa-times-circle cartIcon__remove" onclick="removeItemInCart('{{$item['product_id']}}')"></i>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            Không có gì trong giỏ hàng
                        @endif


                        <div class="back-to-shop"><a href="{{ url()->previous() }}">&leftarrow;<span style="padding: 0 1vh;" class="text-muted">Quay lại</span></a>
                        </div>
                    </div>
                    <div class="col-md-4 summary">
                        <div>
                            <h5><b>TỔNG KẾT</b></h5>
                        </div>
                        <hr>
                        <div class="row">
                            <div id="counterProductCheckout" class="col" style="padding-left:0;">{{ $cartCounter }} SẢN PHẨM</div>
                            <div id="totalPrice" class="col text-right">${{ $totalMoney }}</div>
                        </div>
                        {{-- <form>
                            <p>Phí Giao Hàng</p>
                            <select><option class="text-muted">&dollar;5.00</option></select>
                            <p>Mã Giảm Giá</p>
                            <input id="code" placeholder="Enter your code">
                        </form> --}}
                        <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                            <div class="col">Thành Tiền</div>
                            <div id="totalMoney" class="col text-right">${{ $totalMoney }}</div>
                        </div>
                        <button class="btn" onclick="goToPage('{{ route('checkout') }}')" @if($cartCounter <= 0){{ 'disabled' }}@endif>TIẾP TỤC THANH TOÁN</button>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        function cartMinus(el) {
            let input = $(el).next('.CartGroupQuantity__input')
            let quantity = input.val();
            quantity--
            input.val(quantity)
            changeDetectedCart(input);
        }

        function cartPlus(el) {
            let input = $(el).prev('.CartGroupQuantity__input')
            let quantity = input.val();
            quantity++
            input.val(quantity)
            changeDetectedCart(input);
        }

        function changeDetectedCart(input) {
            let quantity = $(input).val();
            let productId = $(input).attr('data-productId');
            var formData = new FormData()
            formData.append("product_id", productId);
            formData.append("quantity", quantity);
            $.ajax({
                url: "{{ route('cart.update') }}",
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
                    $('#counterProductTitle').html(response.cartCounter+' sản phẩm')
                    $('#counterProductCheckout').html(response.cartCounter+' SẢN PHẨM')
                    $('#totalPrice').html('$'+response.totalMoney)
                    $('#totalMoney').html('$'+response.totalMoney)
                },
                error: function(e) {
                    console.log(e)
                }
            }); //end ajax
        }
        function removeItemInCart(product_id){
            var formData = new FormData()
            formData.append("product_id", product_id);
            $.ajax({
                url: "{{ route('cart.remove') }}",
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
                    if(response.cartCounter > 0){
                        $('#cart__couter').html(response.cartCounter)
                        $('#counterProductTitle').html(response.cartCounter+' sản phẩm')
                        $('#counterProductCheckout').html(response.cartCounter+' SẢN PHẨM')
                        $('#totalPrice').html('$'+response.totalMoney)
                        $('#totalMoney').html('$'+response.totalMoney)
                        $('#cartItem_'+product_id).remove()
                    }
                },
                error: function(e) {
                    console.log(e)
                }
            }); //end ajax
        }
    </script>


@endsection
