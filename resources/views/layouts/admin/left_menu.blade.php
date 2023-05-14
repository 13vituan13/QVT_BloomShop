<style>
    li.active{
       background: #152036; 
    }
    li.activeSub{
       background: #6e5fe9; 
    }
</style>
<div class="left-sidebar-pro">
    <nav id="sidebar" class="">
        <div class="sidebar-header">
            <a href="index.html"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
            <strong><img src="img/logo/logosn.png" alt="" /></strong>
        </div>
        <div class="nalika-profile">
            <div class="profile-dtl">
                @php 
                    $path = Auth::guard('admin')->user()->avatar;
                @endphp
                <a href="#">
                    <img src="{{ asset("storage/{$path}")  }}" alt="" /></a>
                <h2>{{ Auth::guard('admin')->user()->name }}</span></h2>
            </div>
            <div class="profile-social-dtl">
                <ul class="dtl-social">
                    <li><a href="#"><i class="icon nalika-facebook"></i></a></li>
                    <li><a href="#"><i class="icon nalika-twitter"></i></a></li>
                    <li><a href="#"><i class="icon nalika-linkedin"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="left-custom-menu-adp-wrap comment-scrollbar">
            <nav class="sidebar-nav left-sidebar-menu-pro">
                <ul class="metismenu" id="menu1">
                    <li >
                        <a href="index.html">
                            <i class="fa-solid fa-house icon-wrap"></i>
                            <span class="mini-click-non">Trang Chủ</span>
                        </a>
                    </li>
                    @if(Auth::guard('admin')->user()->hasRole('admin'))
                        <li class="{{ Request::routeIs('admin.user') ? 'active' : '' }}">
                            <a title="product" href="{{ route('admin.user') }}">
                                <i class="fa-solid fa-user icon-wrap"></i>
                                <span class="mini-click-non">Nhân Viên</span>
                            </a>
                        </li>
                    @endif
                    @php
                    if( Request::routeIs('admin.product') || Request::routeIs('admin.product_detail') ||
                        Request::routeIs('admin.order')   ||
                        Request::routeIs('admin.customer') ) 
                       {
                         $flgActive = 1;
                       }
                    @endphp
                    <li class="{{ isset($flgActive) && $flgActive ? 'active' : '' }}">
                        <a class="has-arrow" href="mailbox.html" aria-expanded="false">
                            <i class="fa-solid fa-list icon-wrap"></i>
                            <span class="mini-click-non">Danh Mục</span>
                        </a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li class="{{ Request::routeIs('admin.product') || Request::routeIs('admin.product_detail') ? 'activeSub' : '' }}">
                                <a title="product" href="{{ route('admin.product') }}">
                                    <span class="mini-sub-pro">Sản Phẩm</span>
                                </a>
                            </li>
                            <li class="{{ Request::routeIs('admin.order') ? 'activeSub' : '' }}">
                                <a title="custome" href="{{ route('admin.order') }}">
                                    <span class="mini-sub-pro">Đơn Hàng</span>
                                </a>
                            </li>
                            <li class="{{ Request::routeIs('admin.customer') ? 'activeSub' : '' }}">
                                <a title="customer" href="{{ route('admin.customer') }}">
                                    <span class="mini-sub-pro">Khách Hàng</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li >
                        <a href="{{ route('admin.logout') }}">
                            <i class="fa-solid fa-arrow-right-from-bracket icon-wrap"></i>
                            <span class="mini-click-non">Đăng Xuất</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </nav>
</div>
