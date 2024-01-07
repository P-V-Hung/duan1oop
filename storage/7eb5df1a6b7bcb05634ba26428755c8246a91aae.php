
<?php $__currentLoopData = $listCat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="input-group">
        <div class="input-group-text">
            <input class="form-check-input mt-0 checkCatChild"  name="" value="<?php echo e($cat['id']); ?>" type="checkbox">
        </div>
        <label class="form-control"><?php echo e($cat['cat_name']); ?></label>
    </div> 
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH C:\Users\ADMIN\Desktop\duan1-oop\resources\views\admin/category/getCat.blade.php ENDPATH**/ ?>