<button class="list-group-item list-group-item-action btn-cate" value="0" type="button">
    -> Danh mục gốc
</button>
<?php if(count($listCat) === 0): ?>
    <p class="text-center pt-3">Không có danh mục nào</p>
<?php else: ?>
    <?php $__currentLoopData = $listCat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <button class="list-group-item list-group-item-action btn-cate" value="<?php echo e($cat['id']); ?>" type="button">
            <?php echo e($cat['cat_name']); ?>

        </button>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?><?php /**PATH C:\Users\ADMIN\Desktop\duan1-oop\resources\views\client/product/getCat.blade.php ENDPATH**/ ?>