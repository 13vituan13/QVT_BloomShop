<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CheckOut | BloomShop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{ asset('images/logo/Favicons/favicon-60x60.png') }}" type="image/x-icon">





    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('css/user/checkout/css/bootstrap.min.css') }}">
    <!-- Font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <style>
        label.required::after {
            content: "*";
            color: red;
            margin-left: 5px;
            vertical-align: middle;
        }

        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        /* loader */
        #loading {
            width: 100vw;
            height: 100vh;
            transition: all 1s;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 9999;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .loader {
            /* color: rgba(255, 255, 255, 0.8) */
            font-size: 15px;
            width: 1em;
            height: 1em;
            border-radius: 50%;
            position: relative;
            text-indent: -9999em;
            margin: 50vh auto;
            animation: mulShdSpin 1.3s infinite linear;
            transform: translateZ(0);
        }

        @keyframes mulShdSpin {

            0%,
            100% {
                box-shadow: 0 -3em 0 0.2em,
                    2em -2em 0 0em, 3em 0 0 -1em,
                    2em 2em 0 -1em, 0 3em 0 -1em,
                    -2em 2em 0 -1em, -3em 0 0 -1em,
                    -2em -2em 0 0;
            }

            12.5% {
                box-shadow: 0 -3em 0 0, 2em -2em 0 0.2em,
                    3em 0 0 0, 2em 2em 0 -1em, 0 3em 0 -1em,
                    -2em 2em 0 -1em, -3em 0 0 -1em,
                    -2em -2em 0 -1em;
            }

            25% {
                box-shadow: 0 -3em 0 -0.5em,
                    2em -2em 0 0, 3em 0 0 0.2em,
                    2em 2em 0 0, 0 3em 0 -1em,
                    -2em 2em 0 -1em, -3em 0 0 -1em,
                    -2em -2em 0 -1em;
            }

            37.5% {
                box-shadow: 0 -3em 0 -1em, 2em -2em 0 -1em,
                    3em 0em 0 0, 2em 2em 0 0.2em, 0 3em 0 0em,
                    -2em 2em 0 -1em, -3em 0em 0 -1em, -2em -2em 0 -1em;
            }

            50% {
                box-shadow: 0 -3em 0 -1em, 2em -2em 0 -1em,
                    3em 0 0 -1em, 2em 2em 0 0em, 0 3em 0 0.2em,
                    -2em 2em 0 0, -3em 0em 0 -1em, -2em -2em 0 -1em;
            }

            62.5% {
                box-shadow: 0 -3em 0 -1em, 2em -2em 0 -1em,
                    3em 0 0 -1em, 2em 2em 0 -1em, 0 3em 0 0,
                    -2em 2em 0 0.2em, -3em 0 0 0, -2em -2em 0 -1em;
            }

            75% {
                box-shadow: 0em -3em 0 -1em, 2em -2em 0 -1em,
                    3em 0em 0 -1em, 2em 2em 0 -1em, 0 3em 0 -1em,
                    -2em 2em 0 0, -3em 0em 0 0.2em, -2em -2em 0 0;
            }

            87.5% {
                box-shadow: 0em -3em 0 0, 2em -2em 0 -1em,
                    3em 0 0 -1em, 2em 2em 0 -1em, 0 3em 0 -1em,
                    -2em 2em 0 0, -3em 0em 0 0, -2em -2em 0 0.2em;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="{{ asset('js/user/checkout/js/form-validation.css') }}" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container">
        <main>


            <div class="py-5 text-center">
                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
                    aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-home"></i> Trang
                                chủ</a></li>
                        <li class="breadcrumb-item "><a href="{{ route('product') }}">Sản phẩm</a></li>
                        <li class="breadcrumb-item "><a href="{{ route('cart') }}">Giỏ hàng</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Thanh toán</li>
                    </ol>
                </nav>
                <h2>THANH TOÁN</h2>
            </div>

            <div class="row g-5">
                <div class="col-md-5 col-lg-4 order-md-last">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-primary">Giỏ Hàng Của Bạn</span>
                        <span class="badge bg-primary rounded-pill">{{ $cartCounter }}</span>
                    </h4>
                    <ul class="list-group mb-3">
                        @if ($cartCounter > 0)
                            @foreach ($cart as $key => $item)
                                <li class="list-group-item d-flex justify-content-between lh-sm">
                                    <div>
                                        <h6 class="my-0">{{ $item['name'] . ' x ' . $item['quantity'] }}</h6>
                                        <small class="text-muted">{{ $item['category_name'] }}</small>
                                    </div>
                                    <span class="text-muted">${{ $item['quantity'] * $item['price'] }}</span>
                                </li>
                            @endforeach
                        @endif
                        @if ($customer_info && $customer_info->vip_id)
                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                <div>
                                    <h6 class="my-0" style="color:{{ $customer_info->vip_color }}">Khách Hàng</h6>
                                    <small style="color:{{ $customer_info->vip_color }}">
                                        {{ $customer_info->vip_name }}
                                    </small>
                                </div>
                                <span style="color:{{ $customer_info->vip_color }}">
                                    {{ $customer_info->offer }}%
                                </span>
                            </li>
                        @endif
                        <li class="list-group-item d-flex justify-content-between bg-light">
                            <div class="text-success">
                                <h6 class="my-0">Khuyến mãi</h6>
                                <small id="promoCodeTxt"></small>
                            </div>
                            <span id="promoApply" class="text-success">−$0</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Tổng tiền (USD)</span>
                            <strong id="totalMoney__text">${{ $totalMoney }}</strong>
                        </li>
                    </ul>

                    <form class="card p-2">
                        <div class="input-group">
                            <input id="promoCode" type="text" class="form-control" placeholder="Mã khuyến mãi">
                            <button type="button" class="btn btn-secondary" onclick="checkPromoCode()">Áp dụng</button>
                        </div>
                        <div id="promoMsg" class=""></div>
                    </form>
                </div>
                <div class="col-md-7 col-lg-8">
                    <h4 class="mb-3">Địa Chỉ Thanh Toán</h4>
                    <form id="payment__form" class="needs-validation" novalidate method="POST"
                        action="{{ route('checkout.submit') }}">
                        <input hidden id="customer_id" name="customer_id"
                            value="@if ($customer_info) {{ $customer_info->customer_id }} @endif">
                        <div class="row g-3">
                            {{-- Name --}}
                            <div class="col-sm-6">
                                <label for="firstName" class="form-label required"><i class="fa fa-user"></i> Họ và
                                    tên</label>
                                <input type="text" class="form-control required" data-name="Họ tên"
                                    id="customer_name" name="customer_name" placeholder="VD: Quach Vi Tuan"
                                    value="@if ($customer_info) {{ $customer_info->name }} @endif"
                                    required>
                                <div class="invalid-feedback">
                                    Vui lòng nhập họ tên.
                                </div>
                            </div>
                            {{-- PhoneNumber --}}
                            <div class="col-sm-6">
                                <label for="lastName" class="form-label required"><i class="fa fa-phone"></i> Số điện
                                    thoại</label>
                                <input type="text" class="form-control required" id="customer_phone"
                                    name="customer_phone" placeholder="0903123456"
                                    value="@if ($customer_info) {{ $customer_info->phone }} @endif"
                                    required pattern="(84|0[3|5|7|8|9])+([0-9]{8})\b">
                                <div class="invalid-feedback">
                                    Vui lòng cung cấp một số điện thoại hợp lệ.
                                </div>
                            </div>
                            {{-- Email --}}
                            <div class="col-12">
                                <label for="address" class="form-label required"><i class="fa fa-envelope"></i>
                                    Email</label>
                                <input type="text" class="form-control required" id="customer_email"
                                    name="customer_email" placeholder="you@example.com"
                                    value="@if ($customer_info) {{ $customer_info->email }} @endif"
                                    required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
                                <div class="invalid-feedback">
                                    Vui lòng cung cấp một email hợp lệ.
                                </div>
                            </div>

                            {{-- Address --}}
                            <div class="col-12">
                                <label for="address" class="form-label required"><i
                                        class="fa fa-address-card-o"></i>
                                    Địa
                                    chỉ</label>
                                <input type="text" class="form-control required" id="customer_address"
                                    name="customer_address" placeholder="100/A"
                                    value="@if ($customer_info) {{ $customer_info->address }} @endif"
                                    required>
                                <div class="invalid-feedback">
                                    Vui lòng nhập Địa chỉ.
                                </div>
                            </div>

                            {{-- City --}}
                            <div class="col-md-4">
                                <label for="city" class="form-label required"><i class="fa fa-institution"></i>
                                    Chọn
                                    tỉnh thành</label>
                                <select class="form-select required" id="city_cbb" name="city"
                                    onchange="getDistrict()" required>
                                    <option value="" selected>Chọn tỉnh</option>
                                </select>
                                <div class="invalid-feedback">
                                    Vui lòng chọn tỉnh thành.
                                </div>
                            </div>

                            {{-- District --}}
                            <div class="col-md-5">
                                <label for="district" class="form-label required">Chọn quận</label>
                                <select class="form-select required" id="district_cbb" name="district" required>
                                    <option value="" selected>Chọn Quận</option>
                                </select>
                                <div class="invalid-feedback">
                                    Vui lòng chọn quận.
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="zip" class="form-label required">Zip</label>
                                <input type="text" class="form-control" placeholder="VD: 70000" id="zipcode"
                                    name="zipcode" required
                                    value="@if ($customer_info) {{ $customer_info->zipcode }} @endif">
                                <div class="invalid-feedback">
                                    Vui lòng nhập mã zip.
                                </div>
                            </div>
                        </div>
                        <hr class="my-4">

                        <h4 class="mb-3">Phương Thức Thanh Toán</h4>
                        <div class="my-3">
                            <div class="form-check">
                                <input onclick="paymentClose()" id="cash" name="paymentMethod" type="radio"
                                    class="form-check-input" checked required value="cash">
                                <label class="form-check-label" for="credit">Thanh toán tiền mặt (khi nhận
                                    hàng).</label>
                            </div>
                            <div class="form-check">
                                <input onclick="paymentShow()" id="creditCard" name="paymentMethod" type="radio"
                                    class="form-check-input" required value="creditCard">
                                <label class="form-check-label" for="debit">Thanh toán bằng thẻ.</label>
                            </div>
                        </div>
                        {{-- hiển thị thanh toán bằng thẻ --}}
                        <div id="creditCardGroup" class="row gy-3" hidden>
                            {{-- thanh toán bằng thẻ --}}
                        </div>
                        <hr class="my-4">
                        <button class="w-100 btn btn-primary btn-lg" type="submit">THANH TOÁN</button>
                    </form>
                </div>
            </div>
        </main>
        {{-- LOADING --}}
        <div id="loading" hidden>
            <div class="loader">Loading...</div>
        </div>
        <footer class="my-5 pt-5 text-muted text-center text-small">
            <small class="block">&copy; 2022 BloomShop. Đã đăng ký Bản quyền.</small>
            <small class="block">Designed by <a href="#" target="_blank">Q.V.T</a> Demo Images: <a
                    href="#" target="_blank">Bloom</a> &amp; <a href=""
                    target="_blank">Shop</a></small>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Chính sách</a></li>
                <li class="list-inline-item"><a href="#">Bảo mật</a></li>
                <li class="list-inline-item"><a href="#">Hỗ trợ</a></li>
            </ul>
        </footer>
    </div>

    <!-- jQuery -->
    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/user/usersite.js') }}"></script>
    <script src="{{ asset('js/user/jquery.min.js') }}"></script>
    <script src="{{ asset('js/user/checkout/js/bootstrap.bundle.min.js') }}"></script>
    <!-- main Start action submit form to checkout -->
    <script src="{{ asset('js/user/checkout/form-validation.js') }}"></script>
    <!-- main End action submit form to checkout -->
    <script>
        
        //payment
        var stripe = Stripe('{{ config('services.stripe.key') }}'); // Create a Stripe client.

        // Create an instance of Elements.
        var elements = stripe.elements();

        // Custom styling can be passed to options when creating an Element.
        var style = {
            base: {
                // Add your base input styles here. For example:
                fontSize: '16px',
                color: '#32325d',
            },
        };

        const totalMoney = @json($totalMoney);
        var totalMoneyLast = totalMoney;
        const customerInfo = {!! isset($customer_info) ? json_encode($customer_info) : 'null' !!};
        const citysList = @json($citys_list);
        const districtsList = @json($districts_list);
        const cash = $('#cash');
        const creditCard = $('#creditCard');
        const creditCardGroup = $('#creditCardGroup');
        const creditCardGroupHTML = `<div class="col-md-12">
                                        <label for="fname">Thẻ được chấp nhận</label>
                                        <div class="icon-container" style="font-size: 50px;">
                                            <i class="fa fa-cc-visa" style="color:navy;"></i>
                                            <i class="fa fa-cc-amex" style="color:blue;"></i>
                                            <i class="fa fa-cc-mastercard" style="color:red;"></i>
                                            <i class="fa fa-cc-discover" style="color:orange;"></i>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="cc-number" class="form-label required">Số thẻ tín dụng</label>
                                        <div id="card-number" class="form-control">
                                            <!-- mã thẻ tín dụng. -->
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="cc-expiration" class="form-label required">Hạn thẻ</label>
                                        <div id="card-expiry" class="form-control">
                                            <!-- Hạn thẻ tín dụng. -->
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3">
                                        <label for="cc-cvv" class="form-label required">CVV</label>
                                        <div id="card-cvc" class="form-control">
                                            <!-- Mã bảo mật tín dụng. -->
                                        </div>
                                    </div>
                                    <!-- Used to display form errors. -->
                                    <div id="card-errors" role="alert"></div>`

        // Create an instance of the card number Element.
        var cardNumberElement = elements.create('cardNumber', {
            style: style,
            showIcon: true,
            placeholder: 'Card Number'
        });
        // Create an instance of the CVC Element.
        var cvcElement = elements.create('cardCvc', {
            style: style
        });
        // Create an instance of the expiration date Element.
        var expDateElement = elements.create('cardExpiry', {
            style: style
        });

        function paymentShow() {
            creditCardGroup.removeAttr("hidden");
            creditCardGroup.append(creditCardGroupHTML)
            //create payment
            cardNumberElement.mount('#card-number');
            cvcElement.mount('#card-cvc');
            expDateElement.mount('#card-expiry');
        }

        function paymentClose() {
            creditCardGroup.attr("hidden", "hidden");
            creditCardGroup.html('')
        }

        $(document).ready(function() {
            // $("#loading").removeAttr("hidden");
            // Get the input field element
            const customer_phone = $('#customer_phone');

            // Listen for input events on the input field
            customer_phone.on('input', function(event) {
                // Remove any non-numeric characters and update the input value
                $(this).val(function(index, value) {
                    return value.replace(/\D/g, '');
                });
            });

            let cityHTML = ""
            citysList.forEach(item => {
                if (customerInfo && customerInfo.city_id == item.id) {
                    cityHTML += `<option value="` + item.id + `" selected>` + item.name + `</option>`
                    getDistrict(item.id)
                } else {
                    cityHTML += `<option value="` + item.id + `">` + item.name + `</option>`
                }
            });
            $('#city_cbb').append(cityHTML);
        });

        function getDistrict(city_id = null) {
            let cityValue = city_id ? city_id : $('#city_cbb').val()
            let districtHTML = ""
            districtsList.forEach(item => {
                if (item.city_id == cityValue) {
                    if (customerInfo && customerInfo.district_id == item.id) {
                        districtHTML += `<option value="` + item.id + `" selected>` + item.name + `</option>`
                    } else {
                        districtHTML += `<option value="` + item.id + `">` + item.name + `</option>`
                    }
                }
            });
            $('#district_cbb').html(districtHTML);
        }

        function checkPromoCode() {
            let promoCode = $('#promoCode').val()
            if (promoCode == "BLOOM99") {
                totalMoneyLast = totalMoney - 10
                $('#totalMoney__text').html('$' + totalMoneyLast)
                $('#promoCodeTxt').html('BLOOM99')
                $('#promoApply').html('−$10')
                $('#promoMsg').addClass('text-success')
                $('#promoMsg').removeClass('text-danger')
                $('#promoMsg').html('Mã khuyến mãi đã được áp dụng.')
            } else {

                totalMoneyLast = totalMoney
                $('#totalMoney__text').html('$' + totalMoneyLast)
                $('#promoCodeTxt').html('')
                $('#promoApply').html('−$0')
                $('#promoMsg').addClass('text-danger')
                $('#promoMsg').removeClass('text-success')
                $('#promoMsg').html('Mã khuyến mãi không đúng.')
            }
        }
    </script>
</body>

</html>
