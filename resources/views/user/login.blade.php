<link rel="stylesheet" href="{{ asset('css/user/login.css')}}">
<div id="myModal" class="modal">
    <div class="modal-content  animated fadeInDown">
        <span class="close" hidden>&times;</span>
        <div class="wrapper_login">
            <div class="container_login">
            <div class="col-left">
                <div class="login-text">
                <h2>Xin Chào</h2>
                <p>Tạo tài khoản của bạn.<br>Nó hoàn toàn miễn phí.</p>
                <a class="btn_reg" href="{{ route('sign_up') }}">Đăng Kí</a>
                </div>
            </div>
            <div class="col-right">
                <div class="login-form">
                <h2>Đăng Nhập</h2>
                <form>
                    <p>
                    <label>Email<span>*</span></label>
                    <input type="text" placeholder="Email" >
                    </p>
                    <p>
                    <label>Password<span>*</span></label>
                    <input type="password" placeholder="Password" >
                    </p>
                    <p>
                    <input type="submit" value="Đăng Nhập" />
                    </p>
                    <p>
                    <a href="">Quên mật khẩu?</a>
                    </p>
                </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

