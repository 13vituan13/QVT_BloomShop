@extends('layouts.admin.master')
@section('title', '$customer')
@section('content')


    
    <div class="product-status mg-b-30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-status-wrap">
                        <h4>Danh Sách Khách Hàng </h4>
                        <div class="add-product">
                            <a href="">Thêm mới</a>
                        </div>
                        <table>
                            <thead>
                                <th>ID Khách Hàng</th>
                                <th>Họ và Tên</th>
                                <th>Loại Khách Hàng</th>
                                <th>Địa Chỉ</th>
                                <th>Số Phone</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @if(count($customer_list) > 0)
                                    @foreach ($customer_list as $item)
                                        <tr>
                                            <td>{{ $item->customer_id }}</td>                                           
                                            <td>{{ $item->name }}</td>
                                            <td>{{ isset($item->vip_member) ? $item->vip_member['name'] : ''  }}</td>
                                            <td>{{ $item->address }}</td>
                                            <td>{{ $item->phone }}</td>
                                            <td>
                                                <button data-toggle="tooltip" title="Edit" class="pd-setting-ed" onclick="goToPage('{{ route('admin.customer_detail',['id' => $item->customer_id]) }}')"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                                <button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
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
        function goToPage(url){
            window.location.href = url
        }
    </script>

@endsection