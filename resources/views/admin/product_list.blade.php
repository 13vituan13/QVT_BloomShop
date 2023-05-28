@extends('layouts.admin.master')
@section('title', 'Product')
@section('content')
<style>
        .pd_btn{
            border: none;
            color: #fff;
            padding: 5px 15px;
            font-size: 15px;
            border-radius: 3px;
        }
        .pd-blue {
            background: #2665f5;
        }
        .product-status-wrap img{
            width: 40px;
            height: 40px;
        }
</style>
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
                                                    $path = count($item->product_image) > 0 ? $item->product_image[0]['image'] : 'unknow';
                                                @endphp
                                                <img src="{{ asset("storage/{$path}") }}" alt="{{ $path }}"/>
                                            </td>
                                            <td>{{ $item->name }}</td>
                                            <td>
                                                @if ($item->status && $item->status['status_id'] == 1)
                                                    <button class="pd_btn pd-blue">{{ $item->status['name'] }}</button>
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
                                                    onclick="remove('{{ $item->product_id }}',this)"><i class="fa fa-trash-o"
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

        function remove(id, element) {
            Swal.fire({
                icon: 'question',
                title: 'Xóa Sản Phẩm',
                text: 'Bạn có chắc muốn xóa?',
                confirmButtonText: 'OK',
            }).then((result) => {
                $.ajax({
                    url: "{{ route('api.product.remove') }}",
                    type: 'DELETE',
                    data: {
                        id: id,
                    },
                    dataType: "json",
                    headers: {
                        'Authorization': 'Bearer ' + $('meta[name="token"]').attr('content')
                    },
                    success: function(response) {
                        console.log(response);
                        const res = response.dataResponse;
                        Swal.fire({
                            icon: 'success',
                            title: 'Xóa Thành Công',
                            confirmButtonText: 'OK',
                        }).then((result) => {
                            var row = element.parentNode.parentNode;
                            row.parentNode.removeChild(row);
                        });
                    },
                    error: function(e) {
                        console.log(e);
                    }
                }); //end ajax
            });
        }
    </script>

@endsection
