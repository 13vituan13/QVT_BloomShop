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
                        <label for="name" class="font--bold required">Họ và tên</label>
                        <input type="text" class="form-control required" name="name" id="name"
                            data-name="Họ tên" placeholder="VD: Nguyen Van A">
                        <p class="posi--absolute text-danger err-msg"></p>
                    </div>
                    {{-- Phone --}}
                    <div class="col-sm-6 form-group">
                        <label for="phone" class="font--bold required">Số điện thoại</label>
                        <input type="number" class="form-control required" name="phone" id="phone"
                            data-name="Số điện thoại" placeholder="VD: 0952123456">
                        <p class="posi--absolute text-danger err-msg"></p>
                    </div>
                   
                    
                    {{-- Giới Tính --}}
                    <div class="col-sm-6 form-group">
                        <div class="gender_details">
                            <input type="radio" name="gender" id="dot-1" value="Nam" checked>
                            <input type="radio" name="gender" id="dot-2" value="Nữ">
                            <input type="radio" name="gender" id="dot-3" value="Khác">
                            <label for="address" class="font--bold">Giới tính</label>
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
                    {{-- BirthDay --}}
                    <div class="col-sm-6 form-group">
                        <label for="birthday" class="font--bold required">Ngày sinh</label>
                        <input type="Date" name="birthday" class="form-control required" id="birthday"
                            data-name="Ngày sinh" max="{{ date('Y-m-d') }}">
                        <p class="posi--absolute text-danger err-msg"></p>
                    </div>
                    
                    {{-- Address --}}
                    <div class="col-sm-6 form-group">
                        <label for="address" class="font--bold required">Địa Chỉ</label>
                        <input type="text" class="form-control required" name="address" id="address"
                            data-name="Địa Chỉ" placeholder="VD: 199/A Tan Quy">
                        <p class="posi--absolute text-danger err-msg"></p>
                    </div>
                    {{-- City --}}
                    <div class="col-sm-3 form-group">
                        <label for="city" class="font--bold required">Chọn tỉnh thành</label>
                        <select onchange="getDistrict()" id="city_cbb" name="city"
                            class="form-control browser-default custom-select required" data-name="Tỉnh Thành">
                            <option value="" selected>Chọn Tỉnh</option>
                        </select>
                        <p class="posi--absolute text-danger err-msg"></p>
                    </div>
                    {{-- District --}}
                    <div class="col-sm-3 form-group">
                        <label for="district" class="font--bold required">Chọn quận</label>
                        <select id="district_cbb" name="district"
                            class="form-control browser-default custom-select required" data-name="Quận Huyện">
                            <option value="" selected>Chọn Quận</option>
                        </select>
                        <p class="posi--absolute text-danger err-msg"></p>
                    </div>
                    {{-- Email --}}
                    <div class="col-sm-6 form-group">
                        <label for="email" class="font--bold required">Email</label>
                        <input type="text" class="form-control required" name="email" id="email" data-name="Email" 
                               placeholder="VD: example@gmail.com">
                        <p class="posi--absolute text-danger err-msg"></p>
                    </div>
                    {{-- PassConfirm --}}
                    <div class="col-sm-6 form-group">
                        <label for="password2" class="font--bold required">Nhập lại mật khẩu</label>
                        <input type="Password" name="password2" class="form-control required" id="password2"
                            data-name="Mật khẩu xác nhận">
                        <p class="posi--absolute text-danger err-msg"></p>
                    </div>
                    {{-- Pass --}}
                    <div class="col-sm-6 form-group">
                        <label for="password" class="font--bold required">Mật Khẩu</label>
                        <input type="Password" name="password" class="form-control required" id="password"
                            data-name="Mật khẩu">
                        <p class="posi--absolute text-danger err-msg"></p>    
                        <p class="help-block" style="margin-top: 20px">Mật khẩu phải có ít nhất 8 ký tự, bao gồm ít nhất một ký tự đặc biệt và một chữ cái viết hoa và số.</p>
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
        var phoneInput = form.querySelector('input[name="phone"]')
        var passInput = form.querySelector('input[name="password"]')
        var passInputConfirm = form.querySelector('input[name="password2"]')
        var nameInput = form.querySelector('input[name="name"]');

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
        function validateName(name) {
            let checker = true
            setElementBgColor(nameInput,null,false)

            const regexName = /^[a-zA-Z ]+$/;
            if (!regexName.test(name)) {
                checker = false
                setElementBgColor(nameInput, "Tên không chứa kí tự đặc biệt.", true)
            }
            return checker;
        }

        function validateEmail(email) {
            let checker = true
            setElementBgColor(emailInput,null,false)

            const emailRegex = /\S+@\S+\.\S+/;
            if(!emailRegex.test(email)){
                checker = false
                setElementBgColor(emailInput, "Email không hợp lệ.", true)
            }
            return checker;
        }

        function validatePass(password,password2){
            let checker = true
            setElementBgColor(passInput,null,false)
            setElementBgColor(passInputConfirm,null,false)

            const passwordRegex = /^(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*()_+])\S{8,}$/;
            if(!passwordRegex.test(password)){ 
                checker =false
                setElementBgColor(passInput, "Mật khẩu không thỏa yêu cầu bảo mật.", true)
            }
            // Kiểm tra khớp mật khẩu
            if (password !== password2) {
                checker = false
                setElementBgColor(passInputConfirm, "Mật khẩu xác nhận không khớp.", true)
            }
            return checker;
        }

        function validatePhone(number) {
            const viettelPattern = /(03[2-9]|05[6-8]|07[0|6-9]|08[1-9]|09[0-9])[0-9]{7}/;  
            const mobiPattern = /(09[6-8]|09[0-3]|07[7-9]|07[0-6]|05[89]|05[0-3]|03[9]|03[1-4])[0-9]{7}/;
            const vinaphonePattern = /(08[6-8]|08[1-5]|09[1-5])[0-9]{7}/;
            var checker = true

            setElementBgColor(phoneInput, null, false)
            if (!number.match(viettelPattern) && !number.match(mobiPattern) && !number.match(vinaphonePattern)) {
                checker = false;
                setElementBgColor(phoneInput, "Số điện thoại chưa đúng định dạng.", true)
            }

            return checker;
        }

        function validated() {
            var isValid = true
            // check Required
            document.querySelectorAll('input.required').forEach(function(element, index) {
                if (!element.value || element.value.trim().length === 0) {
                    let titleName = element.dataset.name ? element.dataset.name : ""
                    let txtErr = titleName + " là trường bắt buộc nhập.";
                    isValid = false
                    setElementBgColor(element, txtErr, true)
                } else {
                    setElementBgColor(element, null, false)
                }
            });

            document.querySelectorAll('select.required').forEach(function(element, index) {
                if (!element.value || element.value.trim().length === 0) {
                    let titleName = element.dataset.name ? element.dataset.name : ""
                    let txtErr = titleName + " là trường bắt buộc nhập.";
                    isValid = false
                    setElementBgColor(element, txtErr, true)
                } else {
                    setElementBgColor(element, null, false)
                }
            });
            if (isValid == true) {
                // check Email
                if (!validateName(nameInput.value)) {
                    isValid = false
                } 

                // check Email
                if (!validateEmail(emailInput.value)) {
                    isValid = false
                } 

                // ckeck Phone
                if (!validatePhone(phoneInput.value)) {
                    isValid = false
                }

                // check PassWord
                if (!validatePass(passInput.value,passInputConfirm.value)) {
                    isValid = false
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
            formData.set("district", $('select[name="district"] option:selected').text());
            formData.set("city", $('select[name="city"] option:selected').text());
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
                    if (response.duplicated == 1) {
                        setElementBgColor(emailInput, "Email đã được đăng ký", true)
                    } else {
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