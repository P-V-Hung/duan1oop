
<?php $__env->startSection('title'); ?>
<title>Trang chủ</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container-xxl">
    <div class="banner">
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://tse1.mm.bing.net/th?id=OIP.ugctw4soj6o8xOQ_Emlv8gHaDf&pid=Api&P=0&h=220" class="d-block w-100" alt="..." />
                </div>
                <div class="carousel-item">
                    <img src="https://cdn-www.vinid.net/2020/08/789dc446-bannerweb_vsmart_1920x1080-1536x864.jpg" class="d-block w-100" alt="..." />
                </div>
                <div class="carousel-item">
                    <img src="https://png.pngtree.com/png-clipart/20220823/original/pngtree-stereo-mobile-phone-camera-airplane-plant-summer-travel-planning-web-banners-png-image_8473386.png" class="d-block w-100" alt="..." />
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <!-- content -->

    <div class="new-product">
        <h3>Sản phẩm mới</h3>
        <div class="box-product-right-content">
            <?php $__currentLoopData = $listProNew; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card">
                <a href="/chitietsp?id=<?php echo e($pro['id']); ?>">
                    <img src="../public/uploads/<?php echo e($pro['img']); ?>" class="card-img-top" alt="ảnh sản phẩm" />
                    <div class="card-body">
                        <h5 class="card-title product-title-name-all"><?php echo e($pro['name']); ?></h5>
                        <div class="card-views">
                            <div class="d-flex align-items-center">
                                <del class="me-1"><?php echo e($pro['del_price']); ?></del>
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
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>


    </div>

    <!-- Các sản phẩm hot -->

    <div class="hot-product">
        <h1>Sản phẩm hot</h1>
        <div class="box-product-right-content">
            <?php $__currentLoopData = $listProHot; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card">
                <a href="/chitietsp?id=<?php echo e($pro['id']); ?>">
                    <img src="../public/uploads/<?php echo e($pro['img']); ?>" class="card-img-top" alt="ảnh sản phẩm" />
                    <div class="card-body">
                        <h5 class="card-title product-title-name-all"><?php echo e($pro['name']); ?></h5>
                        <div class="card-views">
                            <div class="d-flex align-items-center">
                                <del class="me-1"><?php echo e($pro['del_price']); ?></del>
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
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<script>
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ADMIN\Desktop\duan1-oop\resources\views\client/homepage.blade.php ENDPATH**/ ?>