@extends('layouts.admin.master')
@section('title', 'Customer')
@section('content')
    <div class="product-status mg-b-30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-status-wrap">
                        <h4>Danh Sách Đặt Hàng</h4>
                        <div class="add-product">
                            <a href="">Thêm mới</a>
                        </div>
                        <table>
                            <thead>
                                <th>Mã đặt hàng</th>
                                <th>Tên Khách Hàng</th>
                                <th>Số Điện Thoại</th>
                                <th>Ngày Đặt</th>
                                <th>Tên Sản phẩm</th>
                                <th>Số Lượng</th>
                                <th>Giá Tiền</th>
                                <th>Tổng Tiền</th>
                                <th>Trạng Thái</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @if (count($order_list) > 0)
                                    @foreach ($order_list as $item)
                                        <tr>
                                            <td>{{ isset($item->order_id) ? $item->order_id : '' }}</td>
                                            <td>{{ isset($item->cusName)  ? $item->cusName : ''  }}</td>
                                            <td>{{ isset($item->cusPhone) ? $item->cusPhone : '' }}</td>
                                            <td>{{ isset($item->date) ? $item->date : ''}}</td>
                                            <td>{{ isset($item->productName) ? $item->productName : ''}}</td>
                                            <td>{{ isset($item->quantity) ? $item->quantity : ''}}</td>
                                            <td>{{ isset($item->price) ? $item->price : ''}}</td>
                                            <td>{{ isset($item->total) ? $item->total : ''}}</td>
                                            <td>
                                                @if (isset($item->statusName))
                                                    <button class="pd-setting">
                                                        {{ $item->statusName}}
                                                    </button>
                                                @endif
                                            </td>
                                            <td>
                                                <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"
                                                onclick="goToPage('{{ route('admin.customer_detail',['id' => $item->order_id]) }}')">
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

    <script>
        function goToPage(url) {
            window.location.href = url
        }
    </script>

@endsection
