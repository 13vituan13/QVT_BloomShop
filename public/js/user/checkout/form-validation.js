// Khởi tạo JS validated các trường không hợp lệ
(function () {
  'use strict'

  // Tìm nạp tất cả các input validated theo Bootstrap 
  var forms = document.querySelectorAll('.needs-validation')

  // kiểm tra và lặp lại các trường , nếu có lỗi thì ngăn submit
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
          if (creditCard.is(':checked')) {
            stripe.createToken(cardNumberElement, expDateElement, cvcElement).then(function (result) {
              if (result.error) {
                // nhập thẻ lỗi
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
                return
              } else {
                // gửi mã đến server
                var form = document.getElementById('payment__form');
                formData.append("stripeToken", result.token.id);
                // console.log([...formData])
                // Submit
                submitForm(formData, form);
              }
            });
          } else {
            // Submit
            submitForm(formData, this);
          }
        }
        form.classList.add('was-validated');
      }, false);
    })
})()

function submitForm(formData, form) {

  loadStart();
  $.ajax({
    url: $(form).attr('action'),
    type: $(form).attr('method'),
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
