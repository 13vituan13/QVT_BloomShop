// Lấy các phần tử từ HTML
var modal = $("#myModal");
var span = $(".close")[0];
$(document).ready(function () {
    // Khi người dùng nhấn vào nút đóng, ẩn modal
    $(span).on("click", function () {
        modal.css("display", "none");
    });

    // Khi người dùng nhấn ra ngoài modal, ẩn modal
    $(window).on("click", function (event) {
        if (event.target == modal[0]) {
            modal.css("display", "none");
        }
    });

    $(document).on('click', '.add_to_cart', function (e) {
        const p = $(this).parent()
        console.log({
            p
        });
        const c = p.find('.img-fluid').clone();
        c.css({
            position: 'absolute',
            top: p.offset().top,
            left: p.offset().left,
            width: p.width(),
            height: p.height(),
            zIndex: 99999
        });
        const dest = $('.float-cart');
        const destTop = dest.offset().top + dest.height() / 2;
        const destLeft = dest.offset().left + dest.width() / 2;
        const destRight = $(document).width() - dest.offset().left - dest.width() / 2;
        $('.container_product').append(c);
        c.animate({
            top: destTop,
            left: destLeft,
            right: destRight,
            width: 0,
            height: 0,
            opacity: 0
        },
            600,
            function () {
                c.remove();
            });
    });
});
function showLogin() {
    modal.css("display", "block");
}

function goToPage(url) {
    window.location.href = url
}
function loadStart() {
    $("#loading").show();
}

function loadEnd() {
    $("#loading").hide();
}

