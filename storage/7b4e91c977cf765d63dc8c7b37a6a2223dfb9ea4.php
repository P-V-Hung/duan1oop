<?php $__currentLoopData = $listPro; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="card">
    <a href="/chitietsp?id=<?php echo e($pro['id']); ?>">
        <img src="../public/uploads/<?php echo e($pro['img']); ?>" class="card-img-top" alt="ảnh sản phẩm" />
        <div class="card-body">
            <h5 class="card-title product-title-name-all"><?php echo e($pro['name']); ?></h5>
            <div class="card-views">
                <div class="d-flex align-items-center">
                    <del class="me-1"><?php echo e(($pro['del_price']!=0)?$pro['del_price']:''); ?></del>
                    <p class="card-text">Giá: <?php echo e($pro['min_price']."VNĐ"); ?></p>
                </div>
                <span>Lượt mua : <?php echo e($pro['buys']); ?></span>
            </div>
            <div class="card-views d-flex justify-content-between">
                <!-- <span>Trạng thái: <span class="<?php echo e($pro['status']=='Ngừng bán'?'ngungban':''); ?>"><?php echo e($pro['status']); ?></span></span> -->
                <span>Số lượng: <?php echo e($pro['count']); ?></span>
            </div>
        </div>
    </a>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH C:\Users\ADMIN\Desktop\duan1-oop\resources\views\client/product/getPro.blade.php ENDPATH**/ ?>