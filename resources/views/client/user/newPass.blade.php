@extends('layout.index')
@section('title')
<title>Mật khẩu mới</title>
@endsection
@section('content')
<div class="signUp changePass">
    <h2>Đổi mật khẩu</h2>

    <form action="/changepass" id="formChangePass" method="post">
        <input type="hidden" name="iduser" value="{{$id}}">
        <div>
            <input type="password" name="u_newPass" id="newPass" placeholder="Mật khẩu mới">
            <div class="icon icon1"><i class="fa-solid fa-eye"></i></div>
            <p class="err errNewPass1"></p>
        </div>
        <div>
            <input type="password" name="repass" id="reNewPass" placeholder="Xác nhận mật khẩu mới">
            <div class="icon icon2"><i class="fa-solid fa-eye"></i></div>
            <p class="err errReNewPass"></p>
        </div>
        <input type="submit" id="btn_sub" name="btn-changePass" value="Thay đổi">
    </form>
    <div class="more">
        <a href="/login">Quay lại trang đăng nhập</a>
    </div>
</div>
<script>
    function validate(input, error, text = "", condition, callback) {
        input.addEventListener('input', function() {
            let val = input.value;
            let check = condition(val);
            if (check) {
                error.innerText = "";
            } else {
                error.innerText = text;
            }
            callback(check);
        });
    }

    let checkPass = false;
    let checkRepass = false;

    validate(document.querySelector("#newPass"), document.querySelector(".errNewPass1"), "Ít nhất 8 kí tự gồm chữ cái, kí tự đặc biệt và số", function(value) {
        return /^(?=.*[a-zA-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/.test(value);
    }, function(check) {
        checkPass = check;
    });

    let rePass = document.querySelector("#reNewPass");
    let errRePass = document.querySelector(".errReNewPass");

    validate(rePass, errRePass, "Mật khẩu không trùng khớp", function() {
        return rePass.value === document.querySelector("#newPass").value;
    }, function(check) {
        checkRepass = check;
    });

    
    let inNewPass = document.querySelector("#newPass");
    document.querySelector(".icon1").onclick = function() {
        if (inNewPass.type == "password") inNewPass.type = "text";
        else inNewPass.type = "password";
    }

    let inReNewPass = document.querySelector("#reNewPass");
    document.querySelector(".icon2").onclick = function() {
        if (inReNewPass.type == "password") inReNewPass.type = "text";
        else inReNewPass.type = "password";
    }
</script>
@endsection
