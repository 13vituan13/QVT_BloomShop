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
});
function showLogin(){
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

