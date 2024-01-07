
<?php $__env->startSection('title'); ?>
<title>Chi tiết đơn hàng</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<main class="container">
    <h5 class="pt-5">Chi tiết tin đơn hàng</h5>
    <div class="listcart border mt-4 pt-3 ">
        <div class="cart d-flex align-items-center justify-content-between ps-2">
            <div class="cart_sp">
                <p>Sản phẩm</p>
            </div>
            <div class="ps-5">Tên sản phẩm</div>
            <div class="ps-3">Cấu hình</div>
            <div class="cart_price pe-4">
                <p>Đơn giá</p>
            </div>
            <div class="cart_count">
                <p>Số lượng</p>
            </div>
            <div class="cart_total pe-4">
                <p>Số tiền</p>
            </div>
        </div>
        <hr>
        <!-- Danh sách -->
        <?php $__currentLoopData = $echoBill; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="cart d-flex align-items-center justify-content-between px-3">
                <div class="cart_image">
                    <img src="../public/uploads/<?php echo e($bill['img']); ?>" width="100px" alt="">
                </div>
                <div class="cart_title">
                    <h6><a href="chitietsp?id=<?php echo e($bill['idpro']); ?>"><?php echo e($bill['name']); ?></a></h6>
                </div>
                <div class="cart_proinfor">
                    <p>Phân loại: <?php echo e($bill['color']); ?></p>
                    <p>Cấu hình: <?php echo e($bill['size']); ?></p>
                </div>
                <div class="cart_price">
                    <p><?php echo e($bill['price']); ?> vnđ</p>
                </div>
                <div class="cart_count">
                    <p><?php echo e($bill['count']); ?></p>
            </div>
            <div class="cart_total">
                <p><?php echo e($bill['total']); ?> vnđ</p>
            </div>
        </div>
        <hr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <div class="cart_footer mt-5 p-4 position-sticky">
            <div class="cart_btn d-flex justify-content-between align-items-center">
                <div class="cart_btn_thaotac">
                    <p>Ưu đãi từ voucher: <span style="font-size: 1.2rem;"> <?php echo e($voucher); ?> VNĐ</span></p>
                    <p>Phí vận chuyển: <span style="font-size: 1.2rem;"> + 30,000 VNĐ</span></p>
                </div>
                <p>Tổng bill: <span style="font-size: 1.5rem;color: red;"><?php echo e($total); ?></span> <span style="color: red;">VNĐ</span></p>
            </div>
        </div>
    </div>
</main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ADMIN\Desktop\duan1-oop\resources\views\client/thanhtoan/billinfo.blade.php ENDPATH**/ ?>