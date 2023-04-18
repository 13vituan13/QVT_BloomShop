@extends('layouts.admin.master')
@section('title', 'Product')
@section('content')



    <div class="product-status mg-b-30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-status-wrap">
                        <h4>Danh Sách Sản Phẩm</h4>
                        <div class="add-product">
                            <a href="{{ route('admin.product_detail') }}">Thêm mới</a>
                        </div>
                        <table>
                            <thead>
                                <th>Ảnh</th>
                                <th>Tên Sản Phẩm</th>
                                <th>Trạng Thái</th>
                                <th>Loại Sản Phẩm</th>
                                <th>Tồn Kho</th>
                                <th>Đơn Giá</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @if (count($product_list) > 0)
                                    @foreach ($product_list as $item)
                                        <tr>
                                            <td>
                                                @php
                                                    $path = count($item->product_image) > 0 ? $item->product_image[0]['image'] : '';
                                                @endphp
                                                <img src="{{ asset("storage/{$path}") }}" alt="" />
                                            </td>
                                            <td>{{ $item->name }}</td>
                                            <td>
                                                @if ($item->status && $item->status['status_id'] == 1)
                                                    <button class="pd-setting">{{ $item->status['name'] }}</button>
                                                @else
                                                    <button class="ds-setting">{{ $item->status['name'] }}</button>
                                                @endif
                                            </td>
                                            <td>{{ isset($item->category) ? $item->category['name'] : '' }}</td>
                                            <td>{{ $item->inventory_number }}</td>
                                            <td>{{ "$$item->price" }}</td>
                                            <td>
                                                <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"
                                                    onclick="goToPage('{{ route('admin.product_detail', ['id' => $item->product_id]) }}')"><i
                                                        class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                                <button data-toggle="tooltip" title="Trash" class="pd-setting-ed"
                                                    onclick="remove('{{ $item->product_id }}')"><i class="fa fa-trash-o"
                                                        aria-hidden="true"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                        <div class="custom-pagination">
                            {{ $product_list->links('admin.partial.pagination') }}
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

        function remove(id) {
            Swal.fire({
                icon: 'question',
                title: 'Xóa Sản Phẩm',
                text: 'Bạn có chắc muốn xóa?',
                confirmButtonText: 'OK',
            }).then((result) => {
                
            });
        }
    </script>

@endsection
