@extends('layouts.admin.master')
@section('title', $title)
@section('content')
    <style>
        #drop-area {
            border: 2px dashed #ccc;
            border-radius: 20px;
            width: 100%;
            font-family: sans-serif;
            padding: 20px;
        }

        #drop-area.highlight {
            border-color: purple;
        }

        p {
            margin-top: 0;
        }

        .my-form {
            margin-bottom: 10px;
        }

        #gallery {
            margin-top: 10px;
        }

        #gallery img {
            width: 150px;
            margin-bottom: 15px;
            vertical-align: middle;
        }

        .gallery {
            display: flex;
            flex-wrap: wrap;
        }

        .gallery__item {
            position: relative;
            background: #fff;
            padding: 10px;
            margin-right: 10px;
            margin-top: 10px;
            width: 11%;
        }

        @media (max-width: 768px) {
            .gallery__item {
                width: 33.33%;
            }
        }

        @media (max-width: 480px) {
            .gallery__item {
                width: 50%;
            }
        }

        .remove_image_icon {
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            transition: all 0.3s ease-in-out;
            font-size: 15px;
        }

        .button {
            display: inline-block;
            padding: 10px;
            background: #ccc;
            cursor: pointer;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .button:hover {
            background: #ddd;
        }

        #fileElem {
            display: none;
        }

        .input-group {
            width: 100%;
        }

        .input-group span {
            width: 120px;
        }
        input.disabled {
            background-color: #424242!important; /* Màu sắc nền của trường input khi bị vô hiệu hóa */
            color: #fff; /* Màu sắc chữ của trường input khi bị vô hiệu hóa */
            cursor: not-allowed; /* Hiển thị con trỏ "not-allowed" khi di chuột vào trường input */
        }
    </style>
    <!-- Single pro tab start-->
    <div class="single-product-tab-area mg-b-30">
        <!-- Single pro tab review Start-->
        <div class="single-pro-review-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="review-tab-pro-inner">
                            <div style="display:flex">
                                <ul id="myTab3" class="tab-review-design">
                                    <li class="active"><a href="#description"><i class="icon nalika-edit"
                                                aria-hidden="true"></i>
                                            Đơn Hàng</a></li>
                                </ul>

                                <div id="btnSubmit" class="text-center custom-pro-edt-ds">
                                    @if (isset($order->order_id))
                                        <button type="button"
                                            class="btnSubmit btn btn-ctl-bt waves-effect waves-light m-r-10"
                                            onclick="update()">Cập Nhật
                                        </button>
                                    @else
                                        <button type="button"
                                            class="btnSubmit btn btn-ctl-bt waves-effect waves-light m-r-10"
                                            onclick="save()">Thêm Mới
                                        </button>
                                    @endif
                                </div>
                            </div>

                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon title_input_label">
                                                        Mã đơn hàng
                                                    </span>
                                                    <input id="order_id" type="text" name="order_id" class="form-control"
                                                        placeholder="Mã đơn hàng" disabled="disabled"
                                                        value="{{ isset($order) ? $order->order_id : '' }}">
                                                </div>
                                                <p class="text_error__order_id"></p>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon title_input_label">
                                                        Thành Tiền
                                                    </span>
                                                    <input id="total_money" type="text" name="total_money" class="form-control"
                                                        placeholder="Thành Tiền"
                                                        value="{{ isset($order) ? $order->total_money : '' }}">
                                                </div>
                                                <p class="text_error__total_money"></p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="review-content-section">
                                                <select id="status_id" name="status_id"
                                                    class="form-control pro-edt-select form-control-primary mg-b-pro-edt">
                                                    <option value="0">Chọn Trạng Thái</option>
                                                    @if (count($status_order_list) > 0)
                                                        @foreach ($status_order_list as $item)
                                                            <option value="{{ $item->status_id }}"
                                                                @if (isset($order) && $order->status_id == $item->status_id) {{ 'selected' }} @endif>
                                                                {{ $item->name }}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                <p class="text_error text_error__status_id"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="review-content-section">
                                                <select id="customer_id" name="customer_id"
                                                    class="form-control pro-edt-select form-control-primary mg-b-pro-edt">
                                                    <option value="0">Chọn Khách Hàng</option>
                                                    @if (count($customer_list) > 0)
                                                        @foreach ($customer_list as $item)
                                                            <option value="{{ $item->customer_id }}"
                                                                @if (isset($order) && $order->customer_id == $item->customer_id) {{ 'selected' }} @endif>
                                                                {{ $item->name }}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                <p class="text_error text_error__customer_id"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon title_input_label">
                                                        Tên khách hàng
                                                    </span>
                                                    <input id="customer_name" type="text" name="customer_name" class="form-control"
                                                        placeholder="Tên khách hàng"
                                                        value="{{ isset($order) ? $order->customer_name : '' }}">
                                                </div>
                                                <p class="text_error__customer_name"></p>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon title_input_label">
                                                        Số điện thoại
                                                    </span>
                                                    <input id="customer_phone" type="text" name="customer_phone" class="form-control"
                                                        placeholder="Số Điện Thoại"
                                                        value="{{ isset($order) ? $order->customer_phone : '' }}">
                                                </div>
                                                <p class="text_error__customer_phone"></p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon title_input_label">
                                                        Email
                                                    </span>
                                                    <input id="customer_email" type="text" name="customer_email" class="form-control"
                                                        placeholder="Email"
                                                        value="{{ isset($order) ? $order->customer_email : '' }}">
                                                </div>
                                                <p class="text_error__customer_email"></p>

                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon title_input_label">
                                                        Địa Chỉ
                                                    </span>
                                                    <input id="customer_address" type="text" name="customer_address"
                                                        class="form-control" placeholder="Địa Chỉ"
                                                        value="{{ isset($order) ? $order->customer_address : '' }}">
                                                </div>
                                                <p class="text_error__customer_address"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="review-tab-pro-inner" style="margin-top: 15px;">
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="detail_Group">
                                    @isset($order->order_detail)
                                        @foreach ( $order->order_detail as $item )
                                        <div class="row order_group">
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                                <div class="review-content-section">
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon title_input_label">
                                                            Mã Sản Phẩm
                                                        </span>
                                                        <input id="product_id" type="text" class="form-control"
                                                            placeholder="Mã Sản Phẩm"
                                                            value="{{ isset($item->product_id) ? $item->product_id : '' }}">
                                                    </div>
                                                    <p class="text_error__name"></p>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                                <div class="review-content-section">
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon title_input_label">
                                                            Số Lượng
                                                        </span>
                                                        <input id="quantity" type="text" class="form-control"
                                                            placeholder="Số Lượng"
                                                            value="{{ isset($item->quantity) ? $item->quantity : '' }}">
                                                    </div>
                                                    <p class="text_error__name"></p>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                                <div class="review-content-section">
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon title_input_label">
                                                            Giá
                                                        </span>
                                                        <input id="price" type="text" class="form-control"
                                                            placeholder="Giá"
                                                            value="{{ isset($item->price) ? $item->price : '' }}">
                                                    </div>
                                                    <p class="text_error__name"></p>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    @endisset
                                    
                                </div>
                            </div>

                            <div style="display:flex">
                                <ul id="myTab3" class="tab-review-design">
                                </ul>
                                <div id="btnSubmit" class="text-center custom-pro-edt-ds">
                                        <button type="button"
                                            class="btnSubmit btn btn-ctl-bt waves-effect waves-light m-r-10"
                                            onclick="addGr()" style="margin-right: 15px;">Thêm
                                        </button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        // JavaScript để thay đổi trạng thái vô hiệu hóa của trường input
        const input = document.querySelector('input[type="text"]');
        input.disabled = true; // Vô hiệu hóa trường input
        input.classList.add('disabled'); // Thêm lớp 'disabled' để áp dụng CSS tương ứng
        let assetPath = "{{ asset('storage/') }}/";
        $(function() {
            $('#name').on('input', function() {
                $(this).removeClass('error_input');
                $('.text_error__name').removeClass('text_error');
                $('.text_error__name').html('');
            });
        });

        @if (isset($order))
            let order_id = {!! json_encode($order->order_id) !!}
        @else
            let order_id = null;
        @endif
        function addGr(){
            let html = `<div class="row order_group">
                                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                            <div class="review-content-section ">
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon title_input_label">
                                                        Mã Sản Phẩm
                                                    </span>
                                                    <input id="name" type="text" class="form-control"
                                                        placeholder="Mã Sản Phẩm"
                                                        value="">
                                                </div>
                                                <p class="text_error__name"></p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon title_input_label">
                                                        Số Lượng
                                                    </span>
                                                    <input id="name" type="text" class="form-control"
                                                        placeholder="Số Lượng"
                                                        value="">

                                                </div>
                                                <p class="text_error__name"></p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon title_input_label">
                                                        Giá
                                                    </span>
                                                    <input id="name" type="text" class="form-control"
                                                        placeholder="Giá"
                                                        value="">

                                                </div>
                                                <p class="text_error__name"></p>
                                            </div>
                                        </div>
                                    </div>`
                                    $('#detail_Group').append(html)
        }
        function save() {
            var product_detail = [];
            $('.order_group').each(function() {
                var product_id = $(this).find('input[type="text"]').eq(0).val();
                var quantity = $(this).find('input[type="text"]').eq(1).val();
                var price = $(this).find('input[type="text"]').eq(2).val();

                var item = {
                    product_id: product_id,
                    quantity: quantity,
                    price: price
                };

                product_detail.push(item);
            });
            var formData = new FormData();
            formData.append('product_detail', JSON.stringify(product_detail))
            formData.append('order_id', $('#order_id').val())
            formData.append('customer_id', $('#customer_id').val())
            formData.append('customer_name', $('#customer_name').val())
            formData.append('customer_email', $('#customer_email').val())
            formData.append('customer_address', $('#customer_address').val())
            formData.append('customer_phone', $('#customer_phone').val())
            formData.append('status_id', $('#status_id').val())
            formData.append('total_money', $('#total_money').val())
            console.log([...formData])
            $.ajax({
                url: '{{ route('api.order.store') }}',
                type: 'POST',
                data: formData,
                dataType: "json",
                processData: false,
                contentType: false,
                headers: {
                    'Authorization': 'Bearer ' + $('meta[name="token"]').attr('content')
                },
                beforeSend: function() {},
                success: function(response) {
                    console.log(response)
                    const res = response.dataReponse;
                    Swal.fire({
                        icon: 'success',
                        title: 'Thêm Đơn Hàng',
                        text: 'Đã thêm đơn hàng mới!!!',
                        confirmButtonText: 'OK',
                    }).then((result) => {
                        order_id = res.order_id;
                        $('.btnSubmit').attr('onclick', 'update()')
                        $('.btnSubmit').html('Cập Nhật')
                        $('#order_id').val(order_id)
                        var newUrl = window.location.pathname + '/' + order_id;
                        window.history.pushState(null, null, newUrl);
                    });
                },
                error: function(e) {
                    console.log(e)
                }
            }); //end ajax
        }

        function update() {
            var product_detail = [];
            $('.order_group').each(function() {
                var product_id = $(this).find('input[type="text"]').eq(0).val();
                var quantity = $(this).find('input[type="text"]').eq(1).val();
                var price = $(this).find('input[type="text"]').eq(2).val();

                var item = {
                    product_id: product_id,
                    quantity: quantity,
                    price: price
                };

                product_detail.push(item);
            });
            var formData = new FormData();
            formData.append('product_detail', JSON.stringify(product_detail))
            formData.append('order_id', $('#order_id').val())
            formData.append('customer_id', $('#customer_id').val())
            formData.append('customer_name', $('#customer_name').val())
            formData.append('customer_email', $('#customer_email').val())
            formData.append('customer_address', $('#customer_address').val())
            formData.append('customer_phone', $('#customer_phone').val())
            formData.append('status_id', $('#status_id').val())
            formData.append('total_money', $('#total_money').val())
            console.log([...formData])
            $.ajax({
                url: '{{ route('api.order.update') }}',
                type: 'POST',
                data: formData,
                dataType: "json",
                processData: false,
                contentType: false,
                headers: {
                    'Authorization': 'Bearer ' + $('meta[name="token"]').attr('content')
                },
                beforeSend: function() {},
                success: function(response) {
                    console.log(response)
                    const res = response.dataReponse;
                    Swal.fire({
                        icon: 'success',
                        title: 'Cập Nhật Thành Công',
                        text: 'Đã cập nhật lại đơn hàng!!!',
                        confirmButtonText: 'OK',
                    }).then((result) => {

                    });
                },
                error: function(e) {
                    console.log(e)
                }
            }); //end ajax
        }
    </script>

@endsection
