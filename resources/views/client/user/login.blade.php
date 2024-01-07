@extends('layout.index')
@section('title')
    <title>Đăng nhập</title>
@endsection
@section('content')
<div class="signIn">
    <h2>Đăng nhập</h2>
    <form action="/login" id="form_logup" method="Post">
        <div>
            <input type="text" placeholder="Tên đăng nhập/Email" name="user" id="username" class="mb20">
        </div>
        <div>
            <input class="password" type="password" name="pass" id="pass" placeholder="Mật khẩu">
            <div class="icon"><i class="fa-solid fa-eye"></i></div>
        </div>
        <a href="/searchuser">Quên mật khẩu</a>
        <input type="submit" name="btn_signIn" value="Đăng nhập">
    </form>
    <div class="more">
        Bạn chưa có tài khoản?
        <a href="/logup">Đăng ký</a>
    </div>
</div>
<script>
    let inPass = document.querySelector(".password");
    document.querySelector(".icon").onclick = function() {
        if (inPass.type == "password") inPass.type = "text";
        else inPass.type = "password";
    }
</script>
@endsection