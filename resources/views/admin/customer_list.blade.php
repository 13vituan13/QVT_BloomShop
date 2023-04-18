@extends('layouts.admin.master')
@section('title', 'Customer')
@section('content')
    <div class="product-status mg-b-30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-status-wrap">
                        <h4>Danh Sách Khách Hàng</h4>
                        <div class="add-product">
                            <a href="{{ route('admin.customer_detail') }}">Thêm mới</a>
                        </div>
                        <table>
                            <thead>
                                <th>Ảnh</th>
                                <th>Tên Khách Hàng</th>
                                <th>Địa Chỉ</th>
                                <th>Số Điện Thoại</th>
                                <th>Email</th>
                                <th>Ngày Sinh</th>
                                <th>Loại Khách Hàng</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @if (count($customer_list) > 0)
                                    @foreach ($customer_list as $item)
                                        <tr>
                                            <td>
                                                @php
                                                    $path = isset($item->avatar) > 0 ? $item->avatar : '';
                                                @endphp
                                                <img src="{{ asset('storage/{$path}') }}" alt="" />
                                            </td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->address }}</td>
                                            <td>{{ $item->phone }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->birthday }}</td>
                                            <td>
                                                @if (isset($item->vip_member['name']))
                                                @php
                                                    $colorVIP = isset($item->vip_member['vip_color']) ? 
                                                                $item->vip_member['vip_color'] : '';
                                                @endphp
                                                    <button style="background:{{ $colorVIP }}"  
                                                    class="pd-setting">
                                                        {{ $item->vip_member['name'] }}
                                                    </button>
                                                @endif
                                            </td>
                                            <td>
                                                <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"
                                                onclick="goToPage('{{ route('admin.customer_detail',['id' => $item->customer_id]) }}')">
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
                            {{ $customer_list->links('admin.partial.pagination') }}
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
