@extends('layouts.user.master')
@section('title', 'About')
@section('content')
<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner"
        style="background-image:url({{asset('/images/html/about_us_banner.png')}});">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <div class="display-t">
                        <div class="display-tc animate-box" data-animate-effect="fadeIn">
                            <h1>Về Chúng Tôi</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</header>
<div id="fh5co-about">
    <div class="container">
        <div class="about-content">
            <div class="row animate-box">
                <div class="col-md-6">
                    <div class="desc">
                        <h3>BLOOMS - LỊCH SỬ HÌNH THÀNH</h3>
                        <p>Chào mừng bạn đến với Bloom - một trong những cửa hàng hoa đẹp và chất lượng nhất trên thị trường. Chúng tôi là một đội ngũ các chuyên gia hoa tận tâm và giàu kinh nghiệm, luôn cố gắng mang đến những bó hoa tuyệt đẹp và sáng tạo nhất cho khách hàng của mình.</p> 
                        <p>Lịch sử của Bloom bắt đầu từ một cửa hàng nhỏ tại khu vực ngoại ô, với mong muốn mang đến cho khách hàng những bó hoa tươi mới nhất và đẹp nhất. Với nỗ lực và tâm huyết, chúng tôi đã nhanh chóng trở thành một trong những thương hiệu hoa uy tín nhất trên thị trường. Hiện nay, Bloom đã mở rộng và có mặt tại nhiều khu vực khác nhau, đáp ứng nhu cầu của nhiều khách hàng khác nhau.</p>
                    </div>
                    <div class="desc">
                        <h3>SỨ MỆNH &amp; TẦM NHÌN</h3>
                        <p>Sứ mệnh của Bloom là truyền tải thông điệp yêu thương và tình cảm thông qua những bó hoa đẹp và tinh tế nhất. Chúng tôi cam kết mang đến cho khách hàng của mình những sản phẩm hoa chất lượng cao, tươi mới và độc đáo nhất. Tầm nhìn của chúng tôi là trở thành một trong những cửa hàng hoa hàng đầu trên thị trường, được khách hàng tin tưởng và yêu thích nhất.</p> 
                        <p>Ngoài ra, sứ mệnh của Bloom còn là xây dựng một môi trường làm việc chuyên nghiệp và thân thiện, nơi mỗi thành viên đều có thể phát triển và thăng tiến trong công việc của mình. Chúng tôi luôn tạo điều kiện để nhân viên có thể tìm thấy niềm đam mê và sự đồng cảm với công việc của mình, từ đó đem lại sự hài lòng và tận tâm cho khách hàng của mình.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <img class="img-responsive" src="{{ asset('./images/html/about_us_small_01.png') }}" alt="about">
                </div>
            </div>
        </div>
        <div class="row animate-box">
            <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                <span>Đội Ngũ Sáng Lập</span>
                <h2>Đội Ngũ Của Chúng Tôi</h2>
                <p>Chào mừng đến với đội ngũ sáng lập của chúng tôi, những người đang nỗ lực mang đến cho bạn những trải nghiệm mua sắm hoa tuyệt vời trên web shop của chúng tôi.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-4 animate-box" data-animate-effect="fadeIn">
                <div class="fh5co-staff">
                    <img style="height: 170px;" src="{{ asset('/images/admin/avt.png') }}" alt="Free HTML5 Templates by gettemplates.co">
                    <h3>Mr. Quách Vĩ Tuấn</h3>
                    <strong class="role">Giám Đốc Điều Hành</strong>
                    <p>Đây là Giám đốc điều hành của shop bán hoa của chúng tôi - một người lãnh đạo tài ba, có kinh nghiệm và đam mê trong lĩnh vực hoa. Với tầm nhìn chiến lược và khả năng lãnh đạo xuất sắc, ông đã giúp đưa shop của chúng tôi trở thành một trong những nơi mua hoa hàng đầu trên thị trường.</p>
                    <ul class="fh5co-social-icons">
                        <li><a href="#"><i class="icon-facebook"></i></a></li>
                        <li><a href="#"><i class="icon-twitter"></i></a></li>
                        <li><a href="#"><i class="icon-dribbble"></i></a></li>
                        <li><a href="#"><i class="icon-github"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 animate-box" data-animate-effect="fadeIn">
                <div class="fh5co-staff">
                    <img style="height: 170px;" src="{{ asset('/images/admin/avt.png') }}" alt="Free HTML5 Templates by gettemplates.co">
                    <h3>Hush Raven</h3>
                    <strong class="role">Đồng Sáng Lập</strong>
                    <p>Đây là một trong những người đồng sáng lập của shop bán hoa của chúng tôi, là một nhà thiết kế hoa tài ba với sự đam mê và tâm huyết dành cho ngành hoa. Với kinh nghiệm và tầm nhìn sáng tạo của mình, anh ấy đã đóng góp không nhỏ cho sự phát triển của shop của chúng tôi.</p>
                    <ul class="fh5co-social-icons">
                        <li><a href="#"><i class="icon-facebook"></i></a></li>
                        <li><a href="#"><i class="icon-twitter"></i></a></li>
                        <li><a href="#"><i class="icon-dribbble"></i></a></li>
                        <li><a href="#"><i class="icon-github"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 animate-box" data-animate-effect="fadeIn">
                <div class="fh5co-staff">
                    <img style="height: 170px;" src="{{ asset('/images/admin/avt3.png') }}" alt="Free HTML5 Templates by gettemplates.co">
                    <h3>Mrs. Margot Robbie</h3>
                    <strong class="role">Đồng Sở Hữu</strong>
                    <p>Đây là một trong các đối tác đồng sở hữu shop bán hoa của chúng tôi, với kinh nghiệm trong lĩnh vực kinh doanh và đam mê với hoa. Anh ấy đã đóng góp quan trọng vào sự phát triển và quản lý shop của chúng tôi, giúp chúng tôi đạt được những thành tựu đáng kể trên thị trường.</p>
                    <ul class="fh5co-social-icons">
                        <li><a href="#"><i class="icon-facebook"></i></a></li>
                        <li><a href="#"><i class="icon-twitter"></i></a></li>
                        <li><a href="#"><i class="icon-dribbble"></i></a></li>
                        <li><a href="#"><i class="icon-github"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection