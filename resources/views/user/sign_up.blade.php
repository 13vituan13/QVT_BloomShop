@extends('layouts.user.master')
@section('title', 'Single')
@section('content')
<style>
    .form-group{
        margin-bottom: 30px;
    }
    form input[type="radio"]{
        display: none;
    }
</style>
<div id="fh5co-services" class="fh5co-bg-section" style="padding: 3em 0;clear: both;">
    <div class="container">
        <div class="row animate-box">
            <div class="col-md-8 col-md-offset-2 text-center fh5co-heading" style="margin-bottom: 3em">
                <h1>ĐĂNG KÝ</h1>
            </div>
        </div>
        <form id="form_dangKy" method="POST" action="../Buoi_03/BTVN.php?page=dangky_info.php">
            <div class="row ">
                <div class="col-sm-6 form-group">
                    <label for="name" class="font--bold">Họ và tên</label>
                    <input type="text" class="form-control required" name="name" id="name" data-name="Họ tên">
                    <p class="posi--absolute text-danger err-msg"></p>
                </div>

                <div class="col-sm-6 form-group">
                    <label for="email" class="font--bold">Email</label>
                    <input type="text" class="form-control required" name="email" id="email" data-name="Email">
                    <p class="posi--absolute text-danger err-msg"></p>
                </div>

                <div class="col-sm-6 form-group">
                    <label for="phone" class="font--bold">Số điện thoại</label>
                    <input type="number" class="form-control required" name="phone" id="phone" data-name="Số điện thoại">
                    <p class="posi--absolute text-danger err-msg"></p>
                </div>

                <div class="col-sm-6 form-group">
                    <label for="password" class="font--bold">Mật Khẩu</label>
                    <input type="Password" name="password" class="form-control required" id="password" data-name="Mật khẩu">
                    <p class="posi--absolute text-danger err-msg"></p>
                </div>

                <div class="col-sm-6 form-group">
                    <label for="birthday" class="font--bold">Ngày sinh</label>
                    <input type="Date" name="birthday" class="form-control required" id="birthday" data-name="Ngày sinh" max="{{ date('Y-m-d') }}">
                    <p class="posi--absolute text-danger err-msg"></p>
                </div>

                <div class="col-sm-6 form-group">
                    <label for="password2" class="font--bold">Nhập lại mật khẩu</label>
                    <input type="Password" name="password2" class="form-control required" id="password2" data-name="Mật khẩu xác nhận">
                    <p class="posi--absolute text-danger err-msg"></p>
                </div>

                <div class="col-sm-6 form-group">
                    <label for="address" class="font--bold">Địa Chỉ</label>
                    <input type="text" class="form-control required" name="address" id="address" data-name="Địa Chỉ">
                    <p class="posi--absolute text-danger err-msg"></p>
                </div>

                <div class="col-sm-3 form-group">
                    <label for="city" class="font--bold">Chọn tỉnh thành</label>
                    <select onchange="getDistrict()" id="city_cbb" name="city" class="form-control browser-default custom-select required" data-name="Tỉnh Thành">
                        <option value="" selected>Chọn Tỉnh</option>
                    </select>
                    <p class="posi--absolute text-danger err-msg"></p>
                </div>

                <div class="col-sm-3 form-group">
                    <label for="district" class="font--bold">Chọn Quận</label>
                    <select id="district_cbb" name="district" class="form-control browser-default custom-select required" data-name="Quận Huyện">
                        <option value="" selected>Chọn Quận</option>
                    </select>
                    <p class="posi--absolute text-danger err-msg"></p>
                </div>

                <div class="col-sm-6  form-group ">
                    <div class="gender_details">
                        <input type="radio" name="gender" id="dot-1" value="Nam" checked>
                        <input type="radio" name="gender" id="dot-2" value="Nữ">
                        <input type="radio" name="gender" id="dot-3" value="Khác">
                        <label for="address" class="font--bold">Giới Tính</label>
                        <div class="category">
                            <label for="dot-1">
                                <span class="dot one"></span>
                                <span class="gender">Nam</span>
                            </label>
                            <label for="dot-2">
                                <span class="dot two"></span>
                                <span class="gender">Nữ</span>
                            </label>
                            <label for="dot-3">
                                <span class="dot three"></span>
                                <span class="gender">Khác</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 form-group mb-4 mt-4 text-center">
                    <button id="btnSubmit" class="btn btn-primary">Submit</button>
                </div>
        </form>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<script>
    var form = document.querySelector('form');
    //API city
    var Parameter = {
        url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
        method: "GET",
        responseType: "application/json",
    };
    var promise = axios(Parameter);
    

    promise.then(function(response) {
        var result = response.data
        console.log(result)
        let html = ""
        result.forEach(item => {
            html += `<option value="` + item.Id + `">` + item.Name + `</option>`
        });
        $('#city_cbb').append(html);
    });

    function validateEmail(email) {
        var re = /\S+@\S+\.\S+/;
        return re.test(email);
    }


    function validated() {
        var isValid = true
        document.querySelectorAll('input.required').forEach(function(element, index) {
            if (!element.value || element.value.trim().length === 0) {
                element.style.backgroundColor = '#ffc8d2'
                element.style.borderColor = '#dc3545'
                var titleName = element.dataset.name ? element.dataset.name : ""
                var errMsg = element.nextElementSibling;
                if (errMsg && errMsg.classList.contains('err-msg')) {
                    errMsg.innerHTML = titleName + " là trường bắt buộc nhập";
                }
                isValid = false
            } else {
                element.style.backgroundColor = ''
                element.style.borderColor = ''
                var errMsg = element.nextElementSibling;
                if (errMsg && errMsg.classList.contains('err-msg')) {
                    errMsg.innerHTML = "";
                }
            }
        });
        document.querySelectorAll('select.required').forEach(function(element, index) {
            if (!element.value || element.value.trim().length === 0) {
                element.style.backgroundColor = '#ffc8d2'
                element.style.borderColor = '#dc3545'
                var titleName = element.dataset.name ? element.dataset.name : ""
                var errMsg = element.nextElementSibling;
                if (errMsg && errMsg.classList.contains('err-msg')) {
                    errMsg.innerHTML = titleName + " là trường bắt buộc nhập.";
                }
                isValid = false
            } else {
                element.style.backgroundColor = ''
                element.style.borderColor = ''
                var errMsg = element.nextElementSibling;
                if (errMsg && errMsg.classList.contains('err-msg')) {
                    errMsg.innerHTML = "";
                }
            }
        });
        if(isValid == true){
            // Kiểm tra tính hợp lệ của email
            var emailInput = form.querySelector('input[name="email"]');
            if (!validateEmail(emailInput.value)) {
                isValid = false;
                emailInput.style.backgroundColor = '#ffc8d2';
                emailInput.style.borderColor = '#dc3545';

                var errMsg = emailInput.nextElementSibling;
                if (errMsg && errMsg.classList.contains('err-msg')) {
                    errMsg.innerHTML = "Email không hợp lệ.";
                }
            } else {
                emailInput.style.backgroundColor = '';
                emailInput.style.borderColor = '';
                var errMsg = emailInput.nextElementSibling;
                if (errMsg && errMsg.classList.contains('err-msg')) {
                    errMsg.innerHTML = "";
                }
            }
            // Kiểm tra tính hợp lệ của Phone
            var phoneInput = form.querySelector('input[name="phone"]')
            var phoneLenght = $('#phone').val().length
            if(phoneLenght < 10 || phoneLenght > 11){
                isValid = false;
                phoneInput.style.backgroundColor = '#ffc8d2';
                phoneInput.style.borderColor = '#dc3545';
                var errMsg = phoneInput.nextElementSibling;
                if (errMsg && errMsg.classList.contains('err-msg')) {
                    errMsg.innerHTML = "Nhập số điện thoại hợp lệ";
                }
            }else{
                phoneInput.style.backgroundColor = '';
                phoneInput.style.borderColor = '';
                var errMsg = phoneInput.nextElementSibling;
                if (errMsg && errMsg.classList.contains('err-msg')) {
                    errMsg.innerHTML = "";
                }
            }
            // Kiểm tra tính hợp lệ của PassWord
            var passInput = form.querySelector('input[name="password"]')
            var passLenght = $('#password').val().length
            var passInputConfirm = form.querySelector('input[name="password2"]')
            if(passLenght < 8){
                isValid = false;
                passInput.style.backgroundColor = '#ffc8d2';
                passInput.style.borderColor = '#dc3545';
                var errMsg = passInput.nextElementSibling;
                if (errMsg && errMsg.classList.contains('err-msg')) {
                    errMsg.innerHTML = "Mật khẩu phải có ít nhất 8 ký tự.";
                }
            }else{
                passInput.style.backgroundColor = '';
                passInput.style.borderColor = '';
                var errMsg = passInput.nextElementSibling;
                if (errMsg && errMsg.classList.contains('err-msg')) {
                    errMsg.innerHTML = "";
                }
            }

            if(passInput.value === passInputConfirm.value){
                passInputConfirm.style.backgroundColor = '';
                passInputConfirm.style.borderColor = '';
                var errMsg = passInputConfirm.nextElementSibling;
                if (errMsg && errMsg.classList.contains('err-msg')) {
                    errMsg.innerHTML = "";
                }
            }else{
                isValid = false;
                passInputConfirm.style.backgroundColor = '#ffc8d2';
                passInputConfirm.style.borderColor = '#dc3545';
                var errMsg = passInputConfirm.nextElementSibling;
                if (errMsg && errMsg.classList.contains('err-msg')) {
                    errMsg.innerHTML = "Mật khẩu xác nhận không khớp.";
                }
            }
        }
        return isValid;
    }

    $('form').on('submit', function(e) {
        if (!validated()) {
            e.preventDefault();
        }
    });

    

    function getDistrict(){
        let cityValue = $('#city_cbb').val()
        let promise = axios(Parameter);
        promise.then(function(response) {
            var result = response.data
            let html = ""
            result.forEach(item => {
                if(item.Id == cityValue){
                    console.log(item.Districts)
                    item.Districts.forEach(district => {
                        html += `<option value="` + district.Id + `">` + district.Name + `</option>`
                    });
                }
            });
            $('#district_cbb').html(html);
        });
    }
</script>

@endsection