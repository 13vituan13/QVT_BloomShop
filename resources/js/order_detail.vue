<template>
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
                                    <!-- @if (isset($customers->product_id))
                                        <button type="button"
                                            class="btnSubmit btn btn-ctl-bt waves-effect waves-light m-r-10"
                                            onclick="update()">Cập Nhật
                                        </button>
                                    @else
                                        <button type="button"
                                            class="btnSubmit btn btn-ctl-bt waves-effect waves-light m-r-10"
                                            onclick="save()">Thêm Mới
                                        </button>
                                    @endif -->
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
                                                    <input id="name" type="text" class="form-control"
                                                        placeholder="Mã đơn hàng"
                                                        value="">

                                                </div>
                                                <p class="text_error__name"></p>

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
                                                    <input id="phone" type="text" name="phone" class="form-control"
                                                        placeholder="Thành Tiền"
                                                        value="">
                                                </div>
                                                <p class="text_error__phone"></p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="review-content-section">
                                                <select id="category_id" name="select"
                                                    class="form-control pro-edt-select form-control-primary mg-b-pro-edt">
                                                    <option value="0">Chọn Trạng Thái</option>
                                                    <!-- @if (count($status_order_list) > 0)
                                                        @foreach ($status_order_list as $item)
                                                            <option value="{{ $item->status_id }}"
                                                                @if (isset($order) && $order->status_id == $item->status_id) {{ 'selected' }} @endif>
                                                                {{ $item->name }}
                                                            </option>
                                                        @endforeach
                                                    @endif -->
                                                </select>
                                                <p class="text_error text_error__category_id"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="review-content-section">
                                                <select id="category_id" name="select"
                                                    class="form-control pro-edt-select form-control-primary mg-b-pro-edt">
                                                    <option value="0">Chọn Khách Hàng</option>
                                                    <!-- @if (count($customer_list) > 0)
                                                        @foreach ($customer_list as $item)
                                                            <option value="{{ $item->customer_id }}"
                                                                @if (isset($order) && $order->customer_id == $item->customer_id) {{ 'selected' }} @endif>
                                                                {{ $item->name }}
                                                            </option>
                                                        @endforeach
                                                    @endif -->
                                                </select>
                                                <p class="text_error text_error__category_id"></p>
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
                                                    <input id="phone" type="text" name="phone" class="form-control"
                                                        placeholder="Tên khách hàng"
                                                        value="">
                                                </div>
                                                <p class="text_error__phone"></p>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon title_input_label">
                                                        Số điện thoại
                                                    </span>
                                                    <input id="phone" type="text" name="phone" class="form-control"
                                                        placeholder="Số Điện Thoại"
                                                        value="">
                                                </div>
                                                <p class="text_error__phone"></p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon title_input_label">
                                                        Email
                                                    </span>
                                                    <input id="phone" type="text" name="phone" class="form-control"
                                                        placeholder="Email"
                                                        value="{{ isset($order) ? $order->customer_phone : '' }}">
                                                </div>
                                                <p class="text_error__phone"></p>

                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon title_input_label">
                                                        Địa Chỉ
                                                    </span>
                                                    <input id="zipcode" type="text" name="zipcode"
                                                        class="form-control" placeholder="Địa Chỉ"
                                                        value="{{ isset($order) ? $order->customer_address : '' }}">
                                                </div>
                                                <p class="text_error__zipcode"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="review-tab-pro-inner" style="margin-top: 15px;">
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="detail_Group">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon title_input_label">
                                                        Mã Sản Phẩm
                                                    </span>
                                                    <input id="name" type="text" class="form-control"
                                                        placeholder="Mã Sản Phẩm"
                                                        value="{{ isset($order) ? $order->order_id : '' }}">
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
                                                        value="{{ isset($order) ? $order->order_id : '' }}">

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
                                                        value="{{ isset($order) ? $order->order_id : '' }}">

                                                </div>
                                                <p class="text_error__name"></p>
                                            </div>
                                        </div>
                                    </div>
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
</template>
<script>
export default {
    data() {
        return {
            activeTab: 1,
            checkInDate: ''
        }
    },
    methods: {
        setActiveTab: function (index) {
            this.activeTab = index;
        },
    }
};
</script>
<style scoped>
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
    </style>