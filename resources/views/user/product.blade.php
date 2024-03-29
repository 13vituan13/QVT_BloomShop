@extends('layouts.user.master')
@section('title', 'Product')
@section('content')
<style>
    .product_banner{
        background-position: left!important;
        background-size: cover;
        transform: rotateY(180deg);
    }
    
</style>
<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm product_banner" role="banner"
        style="background-image:url({{asset('/images/html/product_banner.png')}});">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <div class="display-t">
                        <div class="display-tc animate-box" data-animate-effect="fadeIn">
                        </div>
                    </div>
                </div>
            </div>
        </div>
</header>
<div id="container_product" style="padding: 7em 0;clear: both;">
    <div class="container container_product">
        <div class="row animate-box">
            <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                <h2>SẢN PHẨM {{isset($category->name) ? $category->name : ''}}</h2>
                <p>Hoa hồng Ecuador – Vẻ Đẹp Kiêu Hãnh Từ Bên Kia Địa Cầu<br>
                        Hoa hồng Ecuador được ví như nàng thơ dịu dàng, quyến rũ trước một rừng hoa bạt ngàn màu sắc. Vẻ đẹp
                        của hồng Ecuador thật khó để diễn tả bằng lời, và người tặng nó cũng mang nhiều nỗi tâm tư tình cảm
                        giấu kín.
                </p>
            </div>
        </div>
        <form id="signUpForm" method="GET" action="{{ route('product') }}">
            <input type="hidden" class="form-control" name="category_id" id="category_id" value="{{ isset($category->category_id) ? $category->category_id : null }}">

            <div class="row">
            <div class="col-5">
                <div class="input-group input-group-sm mb-3">
                    <span class="input-group-text" >Tên sản phẩm</span>
                    <input type="text" class="form-control" name="product_name" id="product_name" value="{{ isset($sr_product_name) ? $sr_product_name : null }}">
                </div>
            </div>
            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="price" id="price1" value="" 
                    @if(!$sr_price) checked @endif >
                    <label class="form-check-label" >
                      Tất cả
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="price" id="price1" value="1" 
                    @if($sr_price == 1) checked @endif >
                    <label class="form-check-label" >
                      Dưới $50
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="price" id="price2" value="2" 
                    @if($sr_price == 2) checked @endif
                    >
                    <label class="form-check-label" >
                      $50 ~ $100
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="price" id="price4" value="3"
                    @if($sr_price == 3) checked @endif
                    >
                    <label class="form-check-label" >
                      Trên $100
                    </label>
                </div>
            </div>
            <div class="col-3">
                <button type="submit" class="btn btn-outline-secondary">Tìm kiếm</button>
            </div>
        </div>
        </form>
        <div class="row">
            @if(count($product_list) > 0)
                @foreach ($product_list as $item)
                <div class="col-sm-4 text-center animate-box" data-animate-effect="fadeIn">
                    <div class="product">
                        @php    
                            $image_product = count($item->product_image) > 0 ? $item->product_image[0]['image'] : '/images/no_image.png';
                        @endphp
                        <div class="image">
                            <img class="img-fluid animate-box" data-animate-effect="fadeIn" src="{{ asset("storage/{$image_product}") }}" />
                            <span class="sale">10%</span>
                            <div class="add_to_cart" 
                                    data-productId="{{$item->product_id}}"
                                    data-productName="{{$item->name}}"
                                    data-productPrice="{{$item->price}}"
                                    data-productImage="{{$image_product}}"
                                    data-productCategory="{{isset($item->category['name']) ? $item->category['name'] : ''}}"
                                >
                                <i class="icon-shopping-cart"></i>
                                <a target="_blank" href="{{ asset("storage/{$image_product}") }}" class="eye">
                                    <i class="icon-eye"></i>
                                </a>
                            </div>
                        </div>
                        <div class="desc mt-4">
                            <h3><a href="{{ route('product_detail',['id' => $item->product_id])}}">{{ $item->name }}</a></h3>
                            <span class="price">${{ $item->price }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
        </div>
        <div id="pagination" class="d-flex justify-content-center">
            {{ $product_list->links('admin.partial.pagination') }}
        </div>
    </div>
</div>
@endsection