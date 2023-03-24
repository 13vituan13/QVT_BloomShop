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
        } else {
          event.preventDefault();
          event.stopPropagation();
          var formData = new FormData(this)
          formData.append("total_money", totalMoneyLast);
          formData.append("district_text", $('select[name="district"] option:selected').text());
          formData.append("city_text", $('select[name="city"] option:selected').text());
          //console.log([...formData])
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
            success: function (response) {
              loadEnd();
              console.log(response)
              Swal.fire({
                icon: 'success',
                title: 'Đặt Hàng Thành Công',
                text: 'Cảm ơn quý khách đã đặt hoa của chúng tôi.',
                confirmButtonText: 'OK',
              }).then((result) => {
                window.location.href = "/"
              });
            },
            error: function (e) {
              console.log(e)
              loadEnd();
              Swal.fire({
                icon: 'error',
                title: 'Đặt Hàng Thất Bại',
                text: 'Vui lòng hãy thử lại!',
                confirmButtonText: 'OK',
              });
            }
          }); //end ajax
        }
        form.classList.add('was-validated');
      }, false);
    })
})()
