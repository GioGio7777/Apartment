var pw = document.getElementById("p");
var rmCheck = document.getElementById("rememberMe");
var userName = document.getElementById("uName");

function showPassword() {
    if (pw.type === "password") {
        pw.type = "text";
    } else {
        pw.type = "password";
    }
}

