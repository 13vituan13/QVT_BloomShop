@extends('layouts.admin.master')
@section('title', 'Customer')
@section('content')
    <style>
        .close {
            position: absolute;
            top: 25%;
            right: 15px;
        }
        .pd-detail {
            border: none;
            color: #fff;
            padding: 5px 15px;
            font-size: 15px;
            background: #c1780a;
            border-radius: 3px;
        }
    </style>
    <div class="product-status mg-b-30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-status-wrap">
                        <h4>Danh Sách Đơn Hàng</h4>
                        <div class="add-product">
                            <a href="">Thêm mới</a>
                        </div>
                        <table>
                            <thead>
                                <th>Mã đơn hàng</th>
                                <th>Tên Khách Hàng</th>
                                <th>Số Điện Thoại</th>
                                <th>Ngày Đặt</th>
                                <th>Email</th>
                                <th>Địa Chỉ</th>
                                <th>Tổng Tiền</th>
                                <th>Trạng Thái</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </thead>
                            <tbody>
                                @if (count($order_list) > 0)
                                    @foreach ($order_list as $item)
                                        <tr>
                                            <td>{{ isset($item->order_id) ? $item->order_id : '' }}</td>
                                            <td>{{ isset($item->cusName) ? $item->cusName : '' }}</td>
                                            <td>{{ isset($item->cusPhone) ? $item->cusPhone : '' }}</td>
                                            <td>{{ isset($item->date) ? $item->date : '' }}</td>
                                            <td>{{ isset($item->cusEmail) ? $item->cusEmail : '' }}</td>
                                            <td>{{ isset($item->cusAddress) ? $item->cusAddress : '' }}</td>
                                            <td>${{ isset($item->total) ? $item->total : 0 }}</td>
                                            <td>
                                                @if (isset($item->statusName))
                                                    <button class="pd-setting">
                                                        {{ $item->statusName }}
                                                    </button>
                                                @endif
                                            </td>
                                            <td>
                                                <button id="btnShowDetail" type="button" class="pd-detail"
                                                    onclick="showDetail('{{ $item->order_id }}')">
                                                    Chi tiết
                                                </button>
                                            </td>
                                            <td>
                                                <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"
                                                    onclick="goToPage('{{ route('admin.customer_detail', ['id' => $item->order_id]) }}')">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                </button>
                                                <button data-toggle="tooltip" title="Trash" class="pd-setting-ed">
                                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                        <div class="custom-pagination">
                            {{ $order_list->links('admin.partial.pagination') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="theDetailPopup" tabindex="-1" role="dialog" aria-labelledby="theModalLabel"
        aria-hidden="true">
        <div class=" modal-dialog" role="document">
            <div class="set-color-change modal-popup modal-content model-w" style="width:100%!important">
                <div class="modal-header" style="position: relative;">
                    <h5 class="modal-title font-weight-bold">Chi Tiết Đơn Hàng</h5>
                    <button type="button" class="close" id="theDetailPopupClose" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card text-center mr_box30">
                        <div id="view_table" class="set-color-change card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Mã đơn hàng</th>
                                        <th scope="col">Tên Sản phẩm</th>
                                        <th scope="col">Số Lượng</th>
                                        <th scope="col">Giá Tiền</th>
                                    </tr>
                                </thead>
                                <tbody id="itemDetail">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(function() {
            $("#theDetailPopupClose").click(function() {
                $("#theDetailPopup").modal("hide");
            });

            function goToPage(url) {
                window.location.href = url
            }
        }); //end doccument ready
        function showDetail(order_id) {
            $.ajax({
                url: "{{ route('admin.get_order_detail_by_id') }}",
                type: "GET", //send it through get method
                data: {
                    order_id: order_id,
                },
                success: function(response) {
                    let res = response.result
                    let html = ""
                    for (let i = 0; i < res.length; i++) {
                        html += `<tr class="text-left">
                                    <td>` + res[i].order_id + `</td>
                                    <td>` + res[i].product.name + `</td>
                                    <td>` + res[i].quantity + `</td>
                                    <td>` + res[i].price + `</td>
                                </tr>`
                    }
                    $('#itemDetail').html(html)
                    $("#theDetailPopup").modal("show");
                },
                error: function(xhr) {

                }
            }); //end ajax
        }
    </script>

@endsection
