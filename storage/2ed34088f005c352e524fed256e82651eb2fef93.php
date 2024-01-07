
<?php $__env->startSection('title'); ?>
<title>Thông tin cá nhân</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="box-userInfo">
  <div class="box-userInfo-header">
    <h3>Hồ sơ của tôi</h3>
    <p>Quản lí thông tin hồ sơ để bảo mật tài khoản</p>
  </div>
  <div class="box-userInfo-content">
    <form action="" method="post" enctype="multipart/form-data">
      <div class="box-userInfo-content-left">
        <table class="table">
          <tr>
            <td>Tên đăng nhập</td>
            <td><?php echo e($user['username']); ?></td>
          </tr>
          <tr>
            <td>Email</td>
            <td><?php echo e($user['email']); ?></td>
          </tr>
          <tr>
            <td>Họ và tên</td>
            <td><?php echo e($user['fullname']); ?></td>
          </tr>
          <tr>
            <td>Số điện thoại</td>
            <td><?php echo e($user['tel']); ?></td>
          </tr>
          <tr>
            <td>Địa chỉ</td>
            <td><?php echo e($user['address']); ?></td>
          </tr>
          <tr>
            <td>Ngày tạo</td>
            <td><?php echo e($user['created_at']); ?></td>
          </tr>
        </table>
        <a class="btn p-0" href="/editinfo"><span name="btnInfo" class="btn btn-success">Thay đổi thông tin</span></a>
        <a class="btn p-0" href="/codeuse"><span name="btnInfo" class="btn btn-success">Đổi mật khẩu</span></a>
      </div>
      <div class="box-userInfo-content-right">
        <div class="box-userInfo-content-right-img">
          <img
            src="./public/uploads/<?php echo e($user['img']); ?>"
            alt=""
            id="userInfo-avatar"
          />
        </div>
      </div>
    </form>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ADMIN\Desktop\duan1-oop\resources\views\client/user/info.blade.php ENDPATH**/ ?>