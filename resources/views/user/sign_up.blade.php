@extends('layouts.user.master')
@section('title', 'Single')
@section('content')
    <style>
        .form-group {
            margin-bottom: 30px;
        }

        form input[type="radio"] {
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
            <form id="signUpForm" method="POST" action="{{ route('sign_up.submit') }}">
                {{ csrf_field() }}
                <div class="row ">
                    <div class="col-sm-6 form-group">
                        <label for="name" class="font--bold">Họ và tên</label>
                        <input type="text" class="form-control required" name="name" id="name"
                            data-name="Họ tên">
                        <p class="posi--absolute text-danger err-msg"></p>
                    </div>

                    <div class="col-sm-6 form-group">
                        <label for="email" class="font--bold">Email</label>
                        <input type="text" class="form-control required" name="email" id="email" data-name="Email">
                        <p class="posi--absolute text-danger err-msg"></p>
                    </div>

                    <div class="col-sm-6 form-group">
                        <label for="phone" class="font--bold">Số điện thoại</label>
                        <input type="number" class="form-control required" name="phone" id="phone"
                            data-name="Số điện thoại">
                        <p class="posi--absolute text-danger err-msg"></p>
                    </div>

                    <div class="col-sm-6 form-group">
                        <label for="password" class="font--bold">Mật Khẩu</label>
                        <input type="Password" name="password" class="form-control required" id="password"
                            data-name="Mật khẩu">
                        <p class="posi--absolute text-danger err-msg"></p>
                    </div>

                    <div class="col-sm-6 form-group">
                        <label for="birthday" class="font--bold">Ngày sinh</label>
                        <input type="Date" name="birthday" class="form-control required" id="birthday"
                            data-name="Ngày sinh" max="{{ date('Y-m-d') }}">
                        <p class="posi--absolute text-danger err-msg"></p>
                    </div>

                    <div class="col-sm-6 form-group">
                        <label for="password2" class="font--bold">Nhập lại mật khẩu</label>
                        <input type="Password" name="password2" class="form-control required" id="password2"
                            data-name="Mật khẩu xác nhận">
                        <p class="posi--absolute text-danger err-msg"></p>
                    </div>

                    <div class="col-sm-6 form-group">
                        <label for="address" class="font--bold">Địa Chỉ</label>
                        <input type="text" class="form-control required" name="address" id="address"
                            data-name="Địa Chỉ">
                        <p class="posi--absolute text-danger err-msg"></p>
                    </div>

                    <div class="col-sm-3 form-group">
                        <label for="city" class="font--bold">Chọn tỉnh thành</label>
                        <select onchange="getDistrict()" id="city_cbb" name="city"
                            class="form-control browser-default custom-select required" data-name="Tỉnh Thành">
                            <option value="" selected>Chọn Tỉnh</option>
                        </select>
                        <p class="posi--absolute text-danger err-msg"></p>
                    </div>

                    <div class="col-sm-3 form-group">
                        <label for="district" class="font--bold">Chọn Quận</label>
                        <select id="district_cbb" name="district"
                            class="form-control browser-default custom-select required" data-name="Quận Huyện">
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
        

        //API city
        var Parameter = {
            url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
            method: "GET",
            responseType: "application/json",
        };
        var promise = axios(Parameter);

        promise.then(function(response) {
            var result = response.data
            let html = ""
            result.forEach(item => {
                html += `<option value="` + item.Id + `">` + item.Name + `</option>`
            });
            $('#city_cbb').append(html);
        });

        function getDistrict() {
            let cityValue = $('#city_cbb').val()
            let promise = axios(Parameter);
            promise.then(function(response) {
                var result = response.data
                let html = ""
                result.forEach(item => {
                    if (item.Id == cityValue) {
                        item.Districts.forEach(district => {
                            html += `<option value="` + district.Id + `">` + district.Name +
                                `</option>`
                        });
                    }
                });
                $('#district_cbb').html(html);
            });
        }
        var form = document.getElementById('signUpForm');
        var emailInput = form.querySelector('input[name="email"]');

        function validateEmail(email) {
            var re = /\S+@\S+\.\S+/;
            return re.test(email);
        }
        
        function setElementBgColor(el, msg, isChange) {
            if (isChange) {
                el.style.backgroundColor = '#ffc8d2';
                el.style.borderColor = '#dc3545';
                var errMsg = el.nextElementSibling;
                if (errMsg && errMsg.classList.contains('err-msg')) {
                    errMsg.innerHTML = msg;
                }
            } else {
                el.style.backgroundColor = '';
                el.style.borderColor = '';
                var errMsg = el.nextElementSibling;
                if (errMsg && errMsg.classList.contains('err-msg')) {
                    errMsg.innerHTML = "";
                }
            }
        }
        function validated() {
            var isValid = true
            document.querySelectorAll('input.required').forEach(function(element, index) {
                if (!element.value || element.value.trim().length === 0) {
                    let titleName = element.dataset.name ? element.dataset.name : ""
                    let txtErr = titleName + " là trường bắt buộc nhập.";
                    isValid = false
                    setElementBgColor(element,txtErr,true)
                } else {
                    setElementBgColor(element,null,false)
                }
            });
            document.querySelectorAll('select.required').forEach(function(element, index) {
                if (!element.value || element.value.trim().length === 0) {
                    let titleName = element.dataset.name ? element.dataset.name : ""
                    let txtErr = titleName + " là trường bắt buộc nhập.";
                    isValid = false
                    setElementBgColor(element,txtErr,true)
                } else {
                    setElementBgColor(element,null,false)
                }
            });

            if (isValid == true) {
                // Kiểm tra tính hợp lệ của email
                if (!validateEmail(emailInput.value)) {
                    isValid = false
                    setElementBgColor(emailInput,"Email không hợp lệ.",true)
                } else {
                    setElementBgColor(emailInput,null,false)
                }

                // Kiểm tra tính hợp lệ của Phone
                var phoneInput = form.querySelector('input[name="phone"]')
                var phoneLenght = $('#phone').val().length
                if (phoneLenght < 10 || phoneLenght > 11) {
                    isValid = false
                    setElementBgColor(phoneInput,"Nhập số điện thoại hợp lệ.",true)
                } else {
                    setElementBgColor(phoneInput,null,false)
                }
                // Kiểm tra tính hợp lệ của PassWord
                var passInput = form.querySelector('input[name="password"]')
                var passLenght = $('#password').val().length
                var passInputConfirm = form.querySelector('input[name="password2"]')
                if (passLenght < 8) {
                    isValid = false
                    setElementBgColor(passInput,"Mật khẩu phải có ít nhất 8 ký tự.",true)
                } else {
                    setElementBgColor(passInput,null,false)
                }

                if (passInput.value === passInputConfirm.value) {
                    isValid = false
                    setElementBgColor(passInputConfirm,null,false)
                } else {
                    setElementBgColor(passInputConfirm,"Mật khẩu xác nhận không khớp.",true)
                }
            }
            return isValid;
        }

        
        //submit regist
        $('#signUpForm').on('submit', function(e) {
            e.preventDefault();
            if (!validated()) {
                return
            }
            
            var formData = new FormData(this)
            // console.log([...formData])
            loadStart();
            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                beforeSend: function() {
                    msgVali = ""
                },
                success: function(response) {
                    loadEnd();
                    if(response.duplicated == 1){
                        setElementBgColor(emailInput,"Email đã được đăng ký",true)
                    }else{
                        Swal.fire({
                        icon: 'success',
                        title: 'Đăng Kí Thành Công',
                        text: 'Tài khoản của bạn đã đăng ký thành công.',
                        confirmButtonText: 'OK',
                        }).then((result) => {
                            window.location.href = "{{ route('home') }}"
                        });
                    }
                },
                error: function(e) {
                    loadEnd();
                    Swal.fire({
                        icon: 'error',
                        title: 'Đăng Kí Thất Bại',
                        text: 'vui lòng hãy thử lại!',
                        confirmButtonText: 'OK',
                    });
                }
            }); //end ajax
        });
    </script>

@endsection
