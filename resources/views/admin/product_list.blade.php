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
                            <a href="product-edit.html">Add Product</a>
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
                                                {{-- @php
                                                    // $img = isset($item->product_image) ? $item->product_image[0]['image'] : '';
                                                    // echo $item->product_image;
                                                    $img = $item->product_image[0]['image'];
                                                @endphp --}}
                                                {{-- @if(count($item->product_image) > 0)
                                                    @foreach ($item->product_image as $v)
                                                    {{ $v->image }}
                                                    @endforeach
                                                @endif --}}
                                                
                                                {{-- <img src="{{ asset("images/products/1/{$item->product_image[0]['image']}") }}" alt="" /> --}}
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
                                            <td>{{ $item->Inventory_number }}</td>
                                            <td>{{ "$$item->price" }}</td>
                                            <td>
                                                <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                                <button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                        <div class="custom-pagination">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

@endsection