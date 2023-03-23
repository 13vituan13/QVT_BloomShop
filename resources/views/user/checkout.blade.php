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
    </style>


    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container">
        <main>
            <div class="py-5 text-center">
                <h2>THANH TOÁN</h2>
            </div>

            <div class="row g-5">
                <div class="col-md-5 col-lg-4 order-md-last">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-primary">Giỏ hàng của bạn</span>
                        <span class="badge bg-primary rounded-pill">3</span>
                    </h4>
                    <ul class="list-group mb-3">
                        @if ($cartCounter > 0)
                            @foreach ($cart as $key => $item)
                                <li class="list-group-item d-flex justify-content-between lh-sm">
                                    <div>
                                        <h6 class="my-0">{{ $item['name'] }}</h6>
                                        <small class="text-muted">{{ $item['category_name'] }}</small>
                                    </div>
                                    <span class="text-muted">${{ $item['price'] }}</span>
                                </li>
                            @endforeach
                        @endif
                        <li class="list-group-item d-flex justify-content-between bg-light">
                            <div class="text-success">
                                <h6 class="my-0">Khuyến mãi</h6>
                                <small>BLOOM99</small>
                            </div>
                            <span class="text-success">−$5</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Tổng tiền (USD)</span>
                            <strong>${{ $totalMoney }}</strong>
                        </li>
                    </ul>

                    <form class="card p-2">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Promo code">
                            <button type="submit" class="btn btn-secondary">Redeem</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-7 col-lg-8">
                    <h4 class="mb-3">Địa chỉ thanh toán</h4>
                    <form class="needs-validation" novalidate>
                        <div class="row g-3">
                            {{-- Name --}}
                            <div class="col-sm-6">
                                <label for="firstName" class="form-label required"><i class="fa fa-user"></i> Họ và tên</label>
                                <input type="text" class="form-control required" data-name="Họ tên"
                                    id="customer_name" name="customer_name" placeholder="VD: Quach Vi Tuan"
                                    value="" required>
                                <div class="invalid-feedback">
                                    Vui lòng nhập họ tên.
                                </div>
                            </div>
                            {{-- PhoneNumber --}}
                            <div class="col-sm-6">
                                <label for="lastName" class="form-label required"><i class="fa fa-phone"></i> Số điện
                                    thoại</label>
                                <input type="tel" class="form-control required" id="customer_phone"
                                    name="customer_phone" placeholder="0903123456" value="" required
                                    pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}">
                                <div class="invalid-feedback">
                                    Vui lòng nhập số điện thoại.
                                </div>
                            </div>
                            {{-- Email --}}
                            <div class="col-12">
                                <label for="address" class="form-label required"><i class="fa fa-envelope"></i> Email</label>
                                <input type="email" class="form-control required" id="customer_email"
                                    name="customer_email" placeholder="you@example.com" value="" required
                                    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
                                    data-valid-error="Please enter a valid email address">
                                <div class="invalid-feedback">
                                    Vui lòng nhập Email.
                                </div>
                            </div>

                            {{-- Address --}}
                            <div class="col-12">
                                <label for="address" class="form-label required"><i class="fa fa-address-card-o"></i> Địa
                                    chỉ</label>
                                <input type="text" class="form-control required" id="customer_email"
                                    name="customer_email" placeholder="100/A" value="" required>
                                <div class="invalid-feedback">
                                    Vui lòng nhập Địa chỉ.
                                </div>
                            </div>

                            {{-- City --}}
                            <div class="col-md-4">
                                <label for="city" class="form-label required"><i class="fa fa-institution"></i> Chọn
                                    tỉnh thành</label>
                                <select class="form-select required" onchange="getDistrict()" id="city_cbb"
                                    name="city" required>
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
                                <input type="text" class="form-control" id="zip" placeholder="" required>
                                <div class="invalid-feedback">
                                    Vui lòng nhập mã zip.
                                </div>
                            </div>
                        </div>



                        <hr class="my-4">

                        <h4 class="mb-3">Payment</h4>
                        <div class="my-3">
                            <div class="form-check">
                                <input onclick="paymentClose()" id="cash" name="paymentMethod" type="radio" class="form-check-input"
                                    checked required>
                                <label class="form-check-label" for="credit">Thanh toán tiền mặt (khi nhận hàng).</label>
                            </div>
                            <div class="form-check">
                                <input onclick="paymentShow()" id="creditCard" name="paymentMethod" type="radio" class="form-check-input"
                                    required>
                                <label class="form-check-label" for="debit">Thanh toán bằng thẻ.</label>
                            </div>
                        </div>
                        
                        <div id="creditCardGroup" class="row gy-3" hidden>
                            <div class="col-md-12">
                                <label for="fname">Thẻ được chấp nhận</label>
                                <div class="icon-container" style="font-size: 30px;">
                                    <i class="fa fa-cc-paypal" style="color:#141e41;"></i>
                                    <i class="fa fa-cc-visa" style="color:navy;"></i>
                                    <i class="fa fa-cc-amex" style="color:blue;"></i>
                                    <i class="fa fa-cc-mastercard" style="color:red;"></i>
                                    <i class="fa fa-cc-discover" style="color:orange;"></i>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="cc-name" class="form-label required">Tên trên thẻ</label>
                                <input type="text" class="form-control" id="cc-name" placeholder="" required>
                                <small class="text-muted">Tên đầy đủ hiển thị trên thẻ.</small>
                                <div class="invalid-feedback">
                                    Tên trên thẻ tín dụng là bắt buộc.
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="cc-number" class="form-label required">Số thẻ tín dụng</label>
                                <input type="text" class="form-control" id="cc-number" placeholder="" required>
                                <div class="invalid-feedback">
                                    Số thẻ tín dụng là bắt buộc.
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="cc-expiration" class="form-label required">Hạn thẻ</label>
                                <input type="text" class="form-control" id="cc-expiration" placeholder=""
                                    required>
                                <div class="invalid-feedback">
                                    Hạn thẻ tín dụng là bắt buộc.
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="cc-cvv" class="form-label required">CVV</label>
                                <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                                <div class="invalid-feedback">
                                    Mã bảo mật tín dụng là bắt buộc.
                                </div>
                            </div>
                        </div>

                        <hr class="my-4">

                        <button class="w-100 btn btn-primary btn-lg" type="submit">THANH TOÁN</button>
                    </form>
                </div>
            </div>
        </main>

        <footer class="my-5 pt-5 text-muted text-center text-small">
            <small class="block">&copy; 2022 BloomShop. Đã đăng ký Bản quyền.</small> 
            <small class="block">Designed by <a href="#" target="_blank">Q.V.T</a> Demo Images: <a href="#" target="_blank">Bloom</a> &amp; <a href="" target="_blank">Shop</a></small>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Chính sách</a></li>
                <li class="list-inline-item"><a href="#">Bảo mật</a></li>
                <li class="list-inline-item"><a href="#">Hỗ trợ</a></li>
            </ul>
        </footer>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('js/user/jquery.min.js') }}"></script>
    <script src="{{ asset('js/user/checkout/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/user/checkout/form-validation.js') }}"></script>
    <script>
        const citysList = @json($citys_list);
        const districtsList = @json($districts_list);
        const cash = $('#cash');
        const creditCard = $('#creditCard');
        const creditCardGroup = $('#creditCardGroup');

        function paymentShow(){
            creditCardGroup.removeAttr("hidden");
        }
        function paymentClose(){
            creditCardGroup.attr("hidden", "hidden");
        }

        
        $(document).ready(function() {
            let cityHTML = ""
            citysList.forEach(item => {
                cityHTML += `<option value="` + item.id + `">` + item.name + `</option>`
            });
            $('#city_cbb').append(cityHTML);
        });

        function getDistrict() {

            let cityValue = $('#city_cbb').val()
            let districtHTML = ""
            districtsList.forEach(item => {
                if (item.city_id == cityValue) {
                    districtHTML += `<option value="` + item.id + `">` + item.name + `</option>`
                }
            });
            $('#district_cbb').html(districtHTML);
        }

    </script>
</body>

</html>
