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
                                            Khách Hàng</a></li>
                                </ul>

                                <div id="btnSubmit" class="text-center custom-pro-edt-ds">
                                    @if (isset($customers->product_id))
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
                                                        Tên Khách Hàng
                                                    </span>
                                                    <input id="name" type="text" class="form-control"
                                                        placeholder="Tên Sản Phẩm"
                                                        value="{{ isset($customers) ? $customers->name : '' }}">

                                                </div>
                                                <p class="text_error__name"></p>
                                                <select id="category_id" name="select"
                                                    class="form-control pro-edt-select form-control-primary mg-b-pro-edt">
                                                    <option value="">Chọn Loại Khách Hàng</option>
                                                    @if (count($vip_member_list) > 0)
                                                        @foreach ($vip_member_list as $vip_item)
                                                            <option value="{{ $vip_item->vip_id }}"
                                                                @if (isset($customers) && $customers->vip_id == $vip_item->vip_id) {{ 'selected' }} @endif>
                                                                {{ $vip_item->name }}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                <p class="text_error text_error__category_id"></p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon title_input_label">
                                                        Số Điện Thoại
                                                    </span>
                                                    <input id="phone" type="text" name="phone"
                                                        class="form-control" placeholder="Số Điện Thoại"
                                                        value="{{ isset($customers) ? $customers->phone : '' }}">
                                                </div>
                                                <p class="text_error__phone"></p>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon title_input_label">
                                                        ZIPCODE
                                                    </span>
                                                    <input id="zipcode" type="text" name="zipcode" class="form-control"
                                                        placeholder="Zip Code"
                                                        value="{{ isset($customers) ? $customers->zipcode : '' }}">
                                                </div>
                                                <p class="text_error__zipcode"></p>
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
    </div>
    <script>
        let assetPath = "{{ asset('storage/') }}/";
        $(function() {
            $('#name').on('input', function() {
                $(this).removeClass('error_input');
                $('.text_error__name').removeClass('text_error');
                $('.text_error__name').html('');
            });
        });

        @if (isset($customers))
            let customer_id = {!! json_encode($customers->customer_id) !!}
        @else
            let customer_id = null;
        @endif

        function save() {
            var formData = new FormData();
            fileList.forEach((file, index) => {
                formData.append('images_list[]', file)
            })

            // console.log([...formData]);
            let description = CKEDITOR.instances.desc.getData();

            formData.append('name', $('#name').val())
            formData.append('inventory_number', $('#inventory_number').val())
            formData.append('price', $('#price').val())
            formData.append('status_id', $('#status_id').val())
            formData.append('category_id', $('#category_id').val())
            formData.append('description', description)
            console.log([...formData])
            $.ajax({
                url: '{{ route('api.product.store') }}',
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
                        title: 'Thêm Thành Công',
                        text: 'Đã thêm sản phẩm mới!!!',
                        confirmButtonText: 'OK',
                    }).then((result) => {
                        product_id = res.product_id;
                        fileList = res.file_list;
                        renderImageHTML(fileList)
                        $('.btnSubmit').attr('onclick', 'update()')
                        $('.btnSubmit').html('Cập Nhật')
                        var newUrl = window.location.pathname + '/' + product_id;
                        window.history.pushState(null, null, newUrl);
                    });

                },
                error: function(e) {
                    console.log(e)
                    $.each(e.responseJSON, function(key, err_val) {
                        $('#' + key).addClass('error_input')
                        $('.text_error__' + key).addClass('text_error')
                        $('.text_error__' + key).html(err_val[0])
                    });
                }
            }); //end ajax
        }

        function update() {
            var formData = new FormData();
            fileList.forEach((file, index) => {
                formData.append('images_list[]', file)
            })
            

            formData.append('product_id', product_id)
            formData.append('name', $('#name').val())
            formData.append('inventory_number', $('#inventory_number').val())
            formData.append('price', $('#price').val())
            formData.append('status_id', $('#status_id').val())
            formData.append('category_id', $('#category_id').val())
            formData.append('description', description)
            formData.append('arr_remove_image', JSON.stringify(arrRemoveImage))
            console.log([...formData])
            $.ajax({
                url: '{{ route('api.product.update') }}',
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
                        text: 'Đã cập nhật lại sản phẩm!!!',
                        confirmButtonText: 'OK',
                    }).then((result) => {
                        fileList = res.file_list;
                        renderImageHTML(fileList)
                        arrRemoveImage = [];
                    });
                },
                error: function(e) {
                    console.log(e)
                    $.each(e.responseJSON, function(key, err_val) {
                        $('#' + key).addClass('error_input')
                        $('.text_error__' + key).addClass('text_error')
                        $('.text_error__' + key).html(err_val[0])
                    });
                }
            }); //end ajax
        }
    </script>

@endsection
