// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
        }else{
          event.preventDefault();
          event.stopPropagation();
            var formData = new FormData(this)
            formData.append("district_text", $('select[name="district"] option:selected').text());
            formData.append("city_text", $('select[name="city"] option:selected').text());
            console.log([...formData])
            console.log($(this).attr('action'))
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
                success: function(response) {
                    loadEnd();
                    console.log(response)
                    // if (response.duplicated == 1) {
                    //     setElementBgColor(emailInput, "Email đã được đăng ký", true)
                    // } else {
                    //     Swal.fire({
                    //         icon: 'success',
                    //         title: 'Đăng Kí Thành Công',
                    //         text: 'Tài khoản của bạn đã đăng ký thành công.',
                    //         confirmButtonText: 'OK',
                    //     }).then((result) => {
                    //         window.location.href = "{{ route('home') }}"
                    //     });
                    // }
                },
                error: function(e) {
                  console.log(e)
                    loadEnd();
                    Swal.fire({
                        icon: 'error',
                        title: 'Đăng Kí Thất Bại',
                        text: 'vui lòng hãy thử lại!',
                        confirmButtonText: 'OK',
                    });
                }
            }); //end ajax
        }
        form.classList.add('was-validated');
      }, false);
    })
})()
