function login() {
    var account = document.getElementById("account").value;
    if (account == "") {
        document.getElementById("account_error").innerHTML = "Vui lòng nhập tài khoản";
        return false;
    } else {
        document.getElementById("account_error").innerHTML = "";
    }

    var password = document.getElementById("password").value;
    if (password == "") {
        document.getElementById("password_error").innerHTML = "Vui lòng nhập mật khẩu";
        return false;
    } else {
        document.getElementById("account_error").innerHTML = "";
    }
}

function signup() {
    var name = document.getElementById("name").value;
    if (name == "") {
        document.getElementById("name_error").innerHTML = "Vui lòng nhập tên đầy đủ của bạn";
        return false;
    } else {
        document.getElementById("name_error").innerHTML = "";
    }

    var address = document.getElementById("address").value;
    if (address == "") {
        document.getElementById("address_error").innerHTML = "Vui lòng nhập địa chỉ của bạn";
        return false;
    } else {
        document.getElementById("address_error").innerHTML = "";
    }

    var phone = document.getElementById("phone").value;
    var isPhone = isNaN(phone);
    if (phone == "") {
        document.getElementById("phone_error").innerHTML = "Vui lòng nhập số điện thoại của bạn";
        return false;
    } else if (isPhone == true) {
        document.getElementById("phone_error").innerHTML = "Nhập không đúng";
        return false;
    } else if (phone.length != 10) {
        document.getElementById("phone_error").innerHTML = "Số điện thoại gồm 10 ký số";
        return false;
    } else {
        document.getElementById("phone_error").innerHTML = "";
    }

    var account = document.getElementById("account").value;
    if (account == "") {
        document.getElementById("account_error").innerHTML = "Vui lòng nhập tài khoản";
        return false;
    } else {
        document.getElementById("account_error").innerHTML = "";
    }

    var password = document.getElementById("password").value;
    if (password == "") {
        document.getElementById("password_error").innerHTML = "Vui lòng nhập mật khẩu";
        return false;
    } else {
        document.getElementById("account_error").innerHTML = "";
    }
}