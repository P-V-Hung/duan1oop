<?php if(isset($category)): ?>
<hr><hr>
<div class="input-group">
    <label class="form-control"><?php echo e($category['cat_name']); ?></label>
</div> 
<p></p>
<?php endif; ?>

<?php $__currentLoopData = $listCat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php
        $checked = "";
    ?>
    <?php $__currentLoopData = $listCatPro; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($cat['id'] == $cp['pc_idcat']): ?>
            <?php
                $checked = 'checked';
            ?>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <div class="input-group">
        <div class="input-group-text">
            <input class="form-check-input mt-0 <?php echo e($class); ?>" <?php echo e($checked); ?> name="cate<?php echo e($cat['id']); ?>" value="<?php echo e($cat['id']); ?>" type="checkbox">
        </div>
        <label class="form-control"><?php echo e($cat['cat_name']); ?></label>
    </div> 
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH C:\Users\ADMIN\Desktop\duan1-oop\resources\views\admin/product/getCat.blade.php ENDPATH**/ ?>