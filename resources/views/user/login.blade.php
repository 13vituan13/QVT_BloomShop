<link rel="stylesheet" href="{{ asset('css/user/login.css') }}">
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
                            <p>
                                <label>Email<span>*</span></label>
                                <input type="text" id="email_login" name="email_login" placeholder="Email">
                                <span class="text-danger err-msg"></span>
                            </p>
                            
                            <p>
                                <label>Password<span>*</span></label>
                                <input type="password" id="password_login" name="password_login" placeholder="Password">
                                <span class="text-danger err-msg"></span>
                            </p>
                            <p>
                                <input type="submit" value="Đăng Nhập" onclick="login()"/>
                            </p>
                            <p>
                                <a href="">Quên mật khẩu?</a>
                            </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function loginVali() {
        let emailLogin = $('#email_login');
        let passLogin = $('#password_login');
        let isVali = true

        let errMsg = emailLogin.next();
        emailLogin.css('backgroundColor', '')
        emailLogin.css('borderColor', '')
        if (errMsg && errMsg.hasClass('err-msg')) {
            errMsg.html('')
        }

        if (emailLogin.val() == "") {
            isVali = false
            emailLogin.css('backgroundColor', '#ffc8d2')
            emailLogin.css('borderColor', '#dc3545')
            if (errMsg && errMsg.hasClass('err-msg')) {
                errMsg.html('Vui lòng nhập Email')
            }
        }

        let errMsgPass = passLogin.next()
        passLogin.css('backgroundColor', '')
        passLogin.css('borderColor', '')
        if (errMsgPass && errMsgPass.hasClass('err-msg')) {
            errMsgPass.html('')
        }
        if (passLogin.val() == "") {
            isVali = false
            passLogin.css('backgroundColor', '#ffc8d2')
            passLogin.css('borderColor', '#dc3545')
            if (errMsgPass && errMsgPass.hasClass('err-msg')) {
                errMsgPass.html('Vui lòng nhập password')
            }
        }

        if (isVali == true) {
            const emailLoginRegex = /\S+@\S+\.\S+/;
            if (!emailLoginRegex.test(emailLogin.val())) {
                isVali = false
                emailLogin.css('backgroundColor', '#ffc8d2')
                emailLogin.css('borderColor', '#dc3545')
                if (errMsg && errMsg.hasClass('err-msg')) {
                    errMsg.html('Email không hợp lệ')
                }
            }
        }
        return isVali
    }

    function login() {
        if (!loginVali()) {
            return
        }
        loadStart();
        let emailLogin = $('#email_login').val();
        let passLogin = $('#password_login').val();
        var loginUrl = "{{ route('login.submit') }}";
        $.ajax({
            method: "POST",
            url: loginUrl,
            data: {
                email: emailLogin, 
                password: passLogin
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: (response) => {
                console.log(response)
                Swal.fire({
                    icon: 'success',
                    title: 'Chào Bạn, '+ response.data.name,
                    text: 'Bạn đã đăng nhập thành công.',
                    confirmButtonText: 'OK',
                }).then((result) => {
                    location.reload()
                });
            },
            error: (e) => {
                console.log(e)
                $('#password_login').css('backgroundColor', '#ffc8d2')
                $('#password_login').css('borderColor', '#dc3545')
                let errMsgPass = $('#password_login').next()
                if (errMsgPass && errMsgPass.hasClass('err-msg')) {
                    errMsgPass.html('Mật khẩu không đúng.')
                }

            }
        }).always(function() {
            loadEnd();
        });//end ajax
    }
</script>
