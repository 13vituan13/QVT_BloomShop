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
<div id="fh5co-product container_product">
    <div class="container container_product">
        <div class="row animate-box">
            <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                <span>Cool Stuff</span>
                <h2>Products.</h2>
                <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
            </div>
        </div>
        <div class="row">
            @if(count($product_list) > 0)
                @foreach ($product_list as $item)
                <div class="col-sm-4 text-center animate-box" data-animate-effect="fadeIn">
                    <div class="product">
                        @php
                            $path = count($item->product_image) > 0 ? $item->product_image[0]['image'] : '';
                        @endphp
                        <div class="image">
                            <img class="img-fluid animate-box" data-animate-effect="fadeIn" src="{{ asset("storage/{$path}") }}" />
                            <span class="sale">10%</span>
                            <div class="add_to_cart" 
                                    data-productId="{{$item->product_id}}"
                                    data-productName="{{$item->name}}"
                                    data-productPrice="{{$item->price}}"
                                    data-productImage="{{$item->product_image[0]['image']}}"
                                    data-productCategory="{{isset($item->category['name']) ? $item->category['name'] : ''}}"
                                >
                                <i class="icon-shopping-cart"></i>
                                <a target="_blank" href="{{ asset("storage/{$path}") }}" class="eye">
                                    <i class="icon-eye"></i>
                                </a>
                            </div>
                        </div>
                        <div class="desc mt-4">
                            <h3><a href="single.html">{{ $item->name }}</a></h3>
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