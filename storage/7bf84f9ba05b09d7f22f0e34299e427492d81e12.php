<button value="<?php echo e(($pageToday-1)<1?$count:$pageToday-1); ?>" class="btn border mx-2 toggle_page"><<</button>
<?php for($i = 1; $i <= $count; $i++): ?>
    <button value="<?php echo e($i); ?>" class="<?php echo e($pageToday==$i?'today':''); ?> btn border mx-2 toggle_page"><?php echo e($i); ?></button>
<?php endfor; ?>
<button value="<?php echo e(($pageToday+1)>$count?1:$pageToday+1); ?>" class="btn border mx-2 toggle_page">>></button><?php /**PATH C:\Users\ADMIN\Desktop\duan1-oop\resources\views\admin/product/getCurent.blade.php ENDPATH**/ ?>