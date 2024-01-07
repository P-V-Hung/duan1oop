<table class="table table-reponse">
    <tr>
        <th>ID</th>
        <th>Tên danh mục</th>
        <th>Danh mục con</th>
        <th>Thao tác</th>
    </tr>
    <?php if(empty($listCat)): ?>
        <tr>
            <td colspan="4" class="text-center">Không có danh mục nào</td>
        </tr>
    <?php else: ?>
        <?php $__currentLoopData = $listCat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($cat['id']); ?></td>
            <td contenteditable class="catname" data-id=<?php echo e($cat['id']); ?>><?php echo e($cat['cat_name']); ?></td>
            <td><button class="catchild btn" data-id=<?php echo e($cat['id']); ?>><i>danh mục con </i></button></td>
            <td><button data-id=<?php echo e($cat['id']); ?> class="btn btn-danger btn-del-cart">Xóa</button></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
</table><?php /**PATH C:\Users\ADMIN\Desktop\duan1-oop\resources\views\admin/category/getData.blade.php ENDPATH**/ ?>