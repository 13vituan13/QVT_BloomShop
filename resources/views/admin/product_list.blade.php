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
                            <tr>
                                <th>Ảnh</th>
                                <th>Tên Sản Phẩm</th>
                                <th>Trạng Thái</th>
                                <th>Loại Sản Phẩm</th>
                                <th>Product sales</th>
                                <th>Tồn Kho</th>
                                <th>Đơn Giá</th>
                                <th></th>
                            </tr>
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