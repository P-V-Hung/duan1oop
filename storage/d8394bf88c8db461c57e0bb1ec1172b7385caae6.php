<div class="voucher_content-main d-flex py-2 px-4 justify-content-between align-items-center border my-4">
    <div class="img d-flex justify-content-center align-items-center">Voucher</div>
    <div class="title">
        Giảm: <span class="priceVoucher"><?php echo e($voucher['price']); ?></span>
        <br>
        <span class="free">
            #<?php echo e($voucher['name']); ?>

        </span>
        <br>
        <span style="color:blue">
            <?php echo e($voucher['status']); ?>

        </span>
    </div>
    <div class="voucher_content-time">
        <p>Từ: <?php echo e($voucher['create']); ?></p>
        <p>Đến: <?php echo e($voucher['arrtive']); ?></p>
    </div>
    <div class="voucher_content-btn">
        <?php if($voucher['arrtive'] < date('Y-m-d')): ?>
            Hết hạn
        <?php elseif($voucher['count'] <= 0): ?>
            Hết hàng
        <?php else: ?>
            <input type="radio" name="voucher" class="voucherRadio" data-price="<?php echo e($voucher['price']); ?>" value="<?php echo e($voucher['id']); ?>" id="">
        <?php endif; ?>
    </div>
</div><?php /**PATH C:\Users\ADMIN\Desktop\duan1-oop\resources\views\client/voucher/getVoucher.blade.php ENDPATH**/ ?>