var showP = document.getElementById("p");

function showPassword() {
    var showP = document.getElementById("p");
    if (showP.type === "password") {
        showP.type = "text";
    } else {
        showP.type = "password";
    }
}

