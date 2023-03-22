@extends('layouts.user.master')
@section('title', 'Contact')
@section('content')
<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner"
        style="background-image:url({{asset('/images/html/contact_us_banner.png')}});">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <div class="display-t">
                        <div class="display-tc animate-box" data-animate-effect="fadeIn">
                            <h1>Liên Hệ</h1>
                            <h2>HotLine: 086624470</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</header>
<div id="fh5co-contact">
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-md-push-1 animate-box">
                
                <div class="fh5co-contact-info">
                    <h3>Thông tin liên lạc</h3>
                    <ul>
                        <li class="address">174 Tân Quý, <br> Tân Phú, TP. Hồ Chí Minh.</li>
                        <li class="phone"><a href="tel://1234567920">(+ 84) 999999999</a></li>
                        <li class="email"><a href="mailto:info@yoursite.com">blooms@gmail.com</a></li>
                    </ul>
                </div>

            </div>
            <div class="col-md-6 animate-box">
                <h3>Liên Lạc</h3>
                <form action="#">
                    <div class="row form-group">
                        <div class="col-md-6">
                            <input type="text" id="fname" class="form-control" placeholder="Họ">
                        </div>
                        <div class="col-md-6">
                            <input type="text" id="lname" class="form-control" placeholder="Tên">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <input type="text" id="email" class="form-control" placeholder="Email">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <input type="text" id="subject" class="form-control" placeholder="Nội dung email">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder="Hãy nói với chúng tôi."></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Gửi Thư" class="btn btn-primary">
                    </div>

                </form>		
            </div>
        </div>
        
    </div>
</div>


@endsection