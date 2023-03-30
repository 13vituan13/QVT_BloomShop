

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