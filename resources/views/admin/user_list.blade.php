@extends('layouts.admin.master')
@section('title', 'Customer')
@section('content')
<style>
    .w95{
        width: 95px;
    }
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
                        <h4>Danh Sách Nhân Viên</h4>
                        <div class="add-product">
                            <a href="{{ route('admin.customer_detail') }}">Thêm mới</a>
                        </div>
                        
                        <table>
                            <thead>
                                <th>Avatar</th>
                                <th>Tên nhân viên</th>
                                <th>Email</th>
                                <th>Chức Vụ</th>
                                <th>Mô tả</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @if (count($user_list) > 0)
                                    @foreach ($user_list as $item)
                                    
                                        <tr>
                                            <td>
                                                @php
                                                    $path = isset($item->avatar) > 0 ? $item->avatar : '';
                                                @endphp
                                                <img src="{{ asset("storage/{$path}")  }}" alt="" />
                                            </td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{  $item->role[0]['name'] }}
                                            <td>{{  $item->role[0]['description'] }}
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
                            {{ $user_list->links('admin.partial.pagination') }}
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
