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
                            <a href="{{ route('admin.product_detail') }}">Add Product</a>
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
                                @if(count($product_list) > 0)
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
                                                @if($item->status && $item->status['status_id'] == 1)
                                                    <button class="pd-setting">{{ $item->status['name'] }}</button>
                                                @else
                                                    <button class="ds-setting">{{ $item->status['name'] }}</button>
                                                @endif
                                            </td>
                                            <td>{{ isset($item->category) ? $item->category['name'] : ''}}</td>
                                            <td>{{ $item->inventory_number }}</td>
                                            <td>{{ "$$item->price" }}</td>
                                            <td>
                                                <button data-toggle="tooltip" title="Edit" class="pd-setting-ed" onclick="goToPage('{{ route('admin.product_detail',['id' => $item->product_id]) }}')"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                                <button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
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
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    $(document).ready(function() {
        debugger
        // Lấy giá trị thời gian sống của session từ biến PHP $sessionLifetime
        var sessionLifetime = {{ $sessionLifetime }};
        
        // Lấy thời điểm cuối cùng mà session đã được sử dụng từ localStorage
        var lastActivity = localStorage.getItem('last_activity');
        
        // Nếu session đã hết hạn
        if ("{{ session_id() }}" === "" || (lastActivity && (new Date().getTime() - lastActivity > sessionLifetime))) {
            // Hiển thị popup thông báo
            Swal.fire({
                title: 'Phiên làm việc đã hết hạn',
                text: 'Vui lòng đăng nhập lại để tiếp tục sử dụng hệ thống.',
                type: 'warning',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
            }, function() {
                // Chuyển hướng đến trang đăng nhập khi người dùng nhấp vào nút OK
                window.location.href = '{{ route('admin.login') }}';
            });
        }
        
        // Lưu thời điểm hiện tại vào localStorage để sử dụng cho lần sau
        localStorage.setItem('last_activity', new Date().getTime());
    }); --}}

        function goToPage(url){
            window.location.href = url
        }
    </script>

@endsection