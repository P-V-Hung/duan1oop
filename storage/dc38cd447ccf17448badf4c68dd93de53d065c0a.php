<?php if(empty($listCart)): ?>
<h3 class='pt-5 pb-5' style='text-align: center;'>Không có sản phẩm nào</h3>
<?php else: ?>
    <?php $__currentLoopData = $listCart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="cart d-flex align-items-center justify-content-between">
        <div class="cart_input">
            <input type="checkbox" class="cart_sp_id" <?php echo e($cart['checked']); ?> name="cart<?php echo e($key); ?>" value="<?php echo e($key); ?>" id="">
        </div>
        <div class="cart_image">
            <img src="../public/uploads/<?php echo e($cart['img']); ?>" width="100px" alt="">
        </div>
        <div class="cart_title">
            <a href="">
                <h6 style="max-width: 230px;"><?php echo e($cart['name']); ?></h6>
            </a>
        </div>
        <div class="cart_proinfor">
            <p>Màu sắc: <?php echo e($cart['color']); ?></p>
            <p>Kích cỡ: <?php echo e($cart['size']); ?></p>
        </div>
        <div class="cart_price">
            <p><?php echo e($cart['price']); ?> VNĐ</p>
        </div>
        <div class="cart_count">
            <div class="rangerInput d-flex justify-content-center align-items-center">
                <?php if($cart['count'] != 'Hết hàng'): ?>
                <button type="button" data-idpp="<?php echo e($cart['idpp']); ?>" class="btnRangeDown border">-</button>
                <input type="text" class="inputRange witdh" value="<?php echo e($cart['count']); ?>" readonly>
                <button type="button" data-idpp="<?php echo e($cart['idpp']); ?>" class="btnRangeUp border">+</button>
                <?php else: ?>
                <input type="text" class="inputRange" value="<?php echo e($cart['count']); ?>" readonly>
                <?php endif; ?>
            </div>
        </div>
        <div class="cart_total">
            <p><span class="cart_price-total"><?php echo e($cart['total']); ?></span> VNĐ</p>
        </div>
        <div class="cart_thaotac">
            <button type="button" class="btn btnDeleteCart" data-key="<?php echo e($key); ?>">Xóa</button>
        </div>
    </div>
    <hr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?><?php /**PATH C:\Users\ADMIN\Desktop\duan1-oop\resources\views\client/cart/getCart.blade.php ENDPATH**/ ?>