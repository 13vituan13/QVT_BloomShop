@extends('layouts.admin.master')
@section('title', $title)
@section('content')
    <!-- Single pro tab start-->
    <div class="single-product-tab-area mg-b-30">
        <!-- Single pro tab review Start-->
        <div class="single-pro-review-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="review-tab-pro-inner">
                            <ul id="myTab3" class="tab-review-design">
                                <li class="active"><a href="#description"><i class="icon nalika-edit" aria-hidden="true"></i>
                                        Sản Phẩm</a></li>
                                <li><a href="#reviews"><i class="icon nalika-picture" aria-hidden="true"></i> Ảnh</a></li>
                                <li><a href="#INFORMATION"><i class="icon nalika-chat" aria-hidden="true"></i> Mô Tả</a>
                                </li>
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon"><i class="fa-solid fa-fan"
                                                            aria-hidden="true"></i></span>
                                                    <input id="name" type="text" class="form-control"
                                                        placeholder="Tên Sản Phẩm"
                                                        value="{{ isset($products) ? $products->name : '' }}">
                                                </div>

                                                <select id="category_id" name="select"
                                                    class="form-control pro-edt-select form-control-primary mg-b-pro-edt">
                                                    <option value="">Chọn Loại Sản Phẩm</option>
                                                    @if (count($category_list) > 0)
                                                        @foreach ($category_list as $category)
                                                            <option value="{{ $category->category_id }}">
                                                                {{ $category->name }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>

                                                <div class="input-group">
                                                    <select id="status_id" name="select"
                                                        class="form-control pro-edt-select form-control-primary">
                                                        <option value="">Chọn Trạng Thái</option>
                                                        @if (count($status_list) > 0)
                                                            @foreach ($status_list as $status)
                                                                <option value="{{ $status->status_id }}">{{ $status->name }}
                                                                </option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon"><i class="fa-solid fa-calculator"
                                                            aria-hidden="true"></i></span>
                                                    <input id="inventory_number" type="text" name="inventory"
                                                        class="form-control" placeholder="Tồn Kho"
                                                        value="{{ isset($products) ? $products->inventory_number : '' }}">
                                                </div>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon"><i class="fa-solid fa-dollar-sign"
                                                            aria-hidden="true"></i></span>
                                                    <input id="price" type="text" name="price" class="form-control"
                                                        placeholder="Đơn Giá"
                                                        value="{{ isset($products) ? $products->price : '' }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="text-center custom-pro-edt-ds">
                                                <button type="button"
                                                    class="btn btn-ctl-bt waves-effect waves-light m-r-10"
                                                    onclick="save()">Save
                                                </button>
                                                <button type="button"
                                                    class="btn btn-ctl-bt waves-effect waves-light">Discard
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-tab-list tab-pane fade" id="reviews">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="pro-edt-img">
                                                            <img src="img/new-product/5-small.jpg" alt="" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="product-edt-pix-wrap">
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon">TT</span>
                                                                        <input type="text" class="form-control"
                                                                            placeholder="Label Name">
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-6">
                                                                            <div class="product-edt-remove">
                                                                                <button type="button"
                                                                                    class="btn btn-ctl-bt waves-effect waves-light">Remove
                                                                                    <i class="fa fa-times"
                                                                                        aria-hidden="true"></i>
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
                                        </div>
                                    </div>
                                </div>
                                <div class="product-tab-list tab-pane fade" id="INFORMATION">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="card-block">
                                                    <div class="input-group mg-b-15">
                                                        <textarea id="desc" name="desc">Nhập mô tả</textarea>
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
        </div>
    </div>
    <script>
        CKEDITOR.replace('desc');
        CKEDITOR.on('instanceReady', function(evt) {
            var editor = evt.editor;
            editor.on('change', function(e) {
                var contentSpace = editor.ui.space('contents');
                var ckeditorFrameCollection = contentSpace.$.getElementsByTagName('iframe');
                var ckeditorFrame = ckeditorFrameCollection[0];
                var innerDoc = ckeditorFrame.contentDocument;
                var innerDocTextAreaHeight = $(innerDoc.body).height();
                console.log(innerDocTextAreaHeight);
            });
        });
        $(function() {

        });

        function save() {
            var formData = new FormData()
            formData.append('name', $('#name').val())
            formData.append('inventory_number', $('#inventory_number').val())
            formData.append('price', $('#price').val())
            formData.append('status_id', $('#status_id').val())
            formData.append('category_id', $('#category_id').val())
            console.log([...formData])
            $.ajax({
                url: '{{ route('api.product.store') }}',
                type: 'POST',
                data: formData,
                dataType: "json",
                processData: false,
                contentType: false,
                headers: {
                    'Authorization': 'Bearer ' + $('meta[name="api-token"]').attr('content')
                },
                beforeSend: function() {},
                success: function(response) {
                    console.log(response)
                },
                error: function(e) {
                    console.log(e)
                }
            }); //end ajax
        }
    </script>

@endsection
