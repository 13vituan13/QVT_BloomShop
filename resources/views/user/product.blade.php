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
<div id="fh5co-product">
    <div class="container">
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
                <div class="col-md-4 text-center animate-box">
                    <div class="product">
                        @php
                            $path = count($item->product_image) > 0 ? $item->product_image[0]['image'] : '';
                        @endphp
                        <div class="product-grid" style="background-image:url({{ asset("storage/{$path}") }}">
                            <span class="sale">10%</span>
                            <div class="inner">
                                <p>
                                    <a href="single.html" class="icon"><i class="icon-shopping-cart"></i></a>
                                    <a target="_blank" href="{{ asset("storage/{$path}") }}" class="icon"><i class="icon-eye"></i></a>
                                </p>
                            </div>
                        </div>
                        <div class="desc">
                            <h3><a href="single.html">{{ $item->name }}</a></h3>
                            <span class="price">${{$item->price}}</span>
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

<div id="fh5co-started">
    <div class="container">
        <div class="row animate-box">
            <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                <h2>Newsletter</h2>
                <p>Just stay tune for our latest Product. Now you can subscribe</p>
            </div>
        </div>
        <div class="row animate-box">
            <div class="col-md-8 col-md-offset-2">
                <form class="form-inline">
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <button type="submit" class="btn btn-default btn-block">Subscribe</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection