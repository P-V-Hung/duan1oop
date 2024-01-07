
<?php $__env->startSection('title'); ?>
<title>Danh sách đơn hàng</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<main class="container-xxl mt-5">
    <table class="table-hung">
        <tr>
            <th>
                <p>Tên người nhận</p>
            </th>
            <th style="width: 120px;">
                <p>Địa chỉ</p>
            </th>
            <th>
                <p>SĐT</p>
            </th>
            <th>
                <p>Số lượng</p>
            </th>
            <th>
                <p>Thành tiền</p>
            </th>
            <th>
                <p>PTTT</p>
            </th>
            <th>
                <p>Ngày đặt</p>
            </th>
            <th>
                <p>Trạng thái</p>
            </th>
            <th>
                <p>Thao tác</p>
            </th>
            <th>
            <i class="fa-solid fa-question"></i>
            </th>
        </tr>
        <tbody>
            <?php $__currentLoopData = $echoBill; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td>
                        <p><?php echo e($bill['fullname']); ?></p>
                    </td>
                    <td><?php echo e($bill['address']); ?></td>
                    <td><?php echo e($bill['tel']); ?></td>
                    <td><?php echo e($bill['count']); ?></td>
                    <td><?php echo e($bill['price']); ?></td>
                    <td><?php echo e($bill['pttt']); ?></td>
                    <td><?php echo e($bill['created_at']); ?></td>
                    <td><?php echo e($bill['status']); ?></td>
                    <td><a href="/billinfo?id=<?php echo e($bill['id']); ?>"><i>chi tiết</i></a></td>
                    <td><a onclick="return confirm('Bạn có chắc chắn muốn hủy đơn hàng không')" href="<?php echo e($bill['link']); ?>"><?php echo e($bill['thaotac']); ?></a></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
            </tbody>
        </table>
</main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ADMIN\Desktop\duan1-oop\resources\views\client/thanhtoan/listbill.blade.php ENDPATH**/ ?>