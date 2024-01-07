
<?php $__env->startSection('title'); ?>
<title>Đăng kí</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="signUp">
    <h2>Đăng ký</h2>

    <form id="formSignUp">
        <div>
            <input type="text" placeholder="Tên đăng nhập" name="ten" id="user" class="mb20">
            <p class="err errUser"></p>
        </div>
        <div>
            <input type="text" placeholder="Email" name="email" id="email" class="mb20">
            <p class="err errEmail"></p>
        </div>
        <div>
            <input type="password" name="pass" id="pass" placeholder="Mật khẩu">
            <div class="icon icon1"><i class="fa-solid fa-eye"></i></div>
            <p class="err errPass"></p>
        </div>
        <div>
            <input type="password" id="repass" placeholder="Nhập lại mật khẩu">
            <div class="icon icon2"><i class="fa-solid fa-eye"></i></div>
            <p class="err errRePass"></p>
        </div>
        <button type="submit" id="btn_sub" name="btn_signUp">Đăng ký</button>
    </form>
    <div class="more">
        Bạn đã có có tài khoản?
        <a href="/login">Đăng nhập</a>
    </div>
</div>
<div id="log"></div>
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

    let checkUser = false;
    let checkEmail = false;
    let checkPass = false;
    let checkRepass = false;

    validate(document.querySelector("#user"), document.querySelector(".errUser"), "Ít nhất 6 kí tự gồm chữ cái và số", function(value) {
        return /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/.test(value);
    }, function(check) {
        checkUser = check;
    });

    validate(document.querySelector("#email"), document.querySelector(".errEmail"), "Email phải có đuôi '@gmail.com'", function(value) {
        return /^[a-zA-Z0-9._-]+@gmail\.com$/.test(value);
    }, function(check) {
        checkEmail = check;
    });

    validate(document.querySelector("#pass"), document.querySelector(".errPass"), "Ít nhất 8 kí tự gồm chữ cái, kí tự đặc biệt và số", function(value) {
        return /^(?=.*[a-zA-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/.test(value);
    }, function(check) {
        checkPass = check;
    });

    let rePass = document.querySelector("#repass");
    let errRePass = document.querySelector(".errRePass");

    validate(rePass, errRePass, "Mật khẩu không trùng khớp", function() {
        return rePass.value === document.querySelector("#pass").value;
    }, function(check) {
        checkRepass = check;
    });

    $(document).on('submit', "#formSignUp", function(e) {
        e.preventDefault();
        if(checkUser && checkEmail && checkPass && checkRepass){
        $.ajax({
            url: '/logup',
            method: 'POST',
            data: new FormData($(this).get(0)),
            processData: false,
            contentType: false,
            beforeSend: function() {
                $("#btn_sub").html('<i class="fa-solid fa-spinner"></i>');
                $("#btn_sub").addClass('btn_subclass');
            },
            success: function(log) {
                $("#log").html(log);
                $("#formSignUp")[0].reset();
                $("#btn_sub").html('Đăng ký');
                $("#btn_sub").removeClass('btn_subclass');
            }
        });

        }
    });

    // Ẩn hiện pass
    let inPass = document.querySelector("#pass");
    document.querySelector(".icon1").onclick = function() {
        if (inPass.type == "password") inPass.type = "text";
        else inPass.type = "password";
    }

    let inRePass = document.querySelector("#repass");
    document.querySelector(".icon2").onclick = function() {
        if (inRePass.type == "password") inRePass.type = "text";
        else inRePass.type = "password";
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ADMIN\Desktop\duan1-oop\resources\views\client/user/logup.blade.php ENDPATH**/ ?>