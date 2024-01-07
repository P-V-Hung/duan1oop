
<?php $__env->startSection('title'); ?>
    <title>Đăng nhập</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ADMIN\Desktop\duan1-oop\resources\views\client/user/login.blade.php ENDPATH**/ ?>