
<?php $__env->startSection('title'); ?>
<title>Quên mật khẩu</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="bodySearchUser">

<div class="signUp hid">
    <h2>Quên mật khẩu</h2>
    <form id="formGetCode">
        <div>
            <input type="text" placeholder="Email của bạn" name="email" id="email" class="mb20">
            <p class="err errEmail"></p>
        </div>
        <button type="button" id="btn_sub" name="btn_signUp">Lấy lại mật khẩu</button>
    </form>
    <div class="more">
        <a href="/login">Đăng nhập</a>
    </div>
</div>
<div id="log"></div>
<script>
    $(document).ready(function() {
        $(document).on("click", "#btn_sub", function() {
            email = $("#email").val();
            $.ajax({
                url: '/sendMailPass',
                method: 'POST',
                data: {
                    email: email
                },
                beforeSend: function() {
                    $("#btn_sub").html('<i class="fa-solid fa-spinner"></i>');
                    $("#btn_sub").addClass('btn_subclass');

                },
                success: function(log) {
                    $("#log").html(log);
                    $("#btn_sub").removeClass('btn_subclass');
                    $("#btn_sub").html('Lấy lại mật khẩu');
                }
            });
        });

    });
</script>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ADMIN\Desktop\duan1-oop\resources\views\client/user/searchUser.blade.php ENDPATH**/ ?>