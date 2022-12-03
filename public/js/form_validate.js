//View  password
function showPassword() {
    var cambio = document.getElementById("password");
    var cambio2 = document.getElementById("password_confirm");
    if (cambio.type == "password") {
        cambio.type = "text";
        cambio2.type = "text";
        $('.eyes_icon').removeClass('fa-regular fa-eye-slash').addClass('fa-regular fa-eye');
    } else {
        cambio.type = "password";
        cambio2.type = "password";
        $('.eyes_icon').removeClass('fa-regular fa-eye').addClass('fa-regular fa-eye-slash');
    }
}
