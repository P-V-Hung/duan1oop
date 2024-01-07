
<?php $__env->startSection('title'); ?>
<title>Chi tiết sản phẩm</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container-xxl">
    <div class="collections row mt-5 px-5">
        <div class="col-7 collections-img">
            <div class="">
                <img src="../public/uploads/<?php echo e($product['img']); ?>" alt="" id="ImgAnh" class="width:100%;">
                <div class="border img-child-client filtering">
                    <div class="img-con">
                        <img src="../public/uploads/<?php echo e($product['img']); ?>" class="imgChildToggel" style="width: 100%;height: auto;" alt="">
                    </div>
                    <?php $__currentLoopData = $listImg; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="img-con">
                        <img src="../public/uploads/<?php echo e($img['img']); ?>" class="imgChildToggel" style="width: 100%;height: auto;" alt="">
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
            </div>
            <div class="mota mt-4">
                <div class="mota-title">
                    <h3>Mô tả sản phẩm</h3>
                    <p> -><?php echo e($product['desc']); ?></p>
                </div>
            </div>
            <!-- <div class="comment">
                <div class="comment-title">
                    <h3>Comment</h3>
                </div>
                <div class="comment-form">
                    <?php
                    if ($mua) {
                        if (!$comment) {
                    ?>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="d-flex align-items-center">
                                    <div class="">
                                        <input type="radio" hidden class="reating_input" name="reating" value="1" id="1sao">
                                        <label class="fs-3" for="1sao"><i class=" reating fa-regular fa-star"></i></label>
                                    </div>
                                    <div class="d-flex justify-content-center align-items-center">
                                        <input type="radio" hidden class="reating_input" name="reating" value="2" id="2sao">
                                        <label class="fs-3" for="2sao"><i class=" reating fa-regular fa-star"></i></label>
                                    </div>
                                    <div class="d-flex justify-content-center align-items-center">
                                        <input type="radio" hidden class="reating_input" name="reating" value="3" id="3sao">
                                        <label class="fs-3" for="3sao"><i class=" reating fa-regular fa-star"></i></label>
                                    </div>
                                    <div class="d-flex justify-content-center align-items-center">
                                        <input type="radio" hidden class="reating_input" name="reating" value="4" id="4sao">
                                        <label class="fs-3" for="4sao"><i class=" reating fa-regular fa-star"></i></label>
                                    </div>
                                    <div class="d-flex justify-content-center align-items-center">
                                        <input type="radio" checked hidden class="reating_input" name="reating" value="5" id="5sao">
                                        <label class="fs-3" for="5sao"><i class=" reating fa-regular fa-star"></i></label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <input class="form-control" name="img" type="file" id="formFile">
                                </div>
                                <div class="content_comment d-flex">
                                    <input type="text" name="desc" placeholder="Nhập comment ...." required>
                                    <button type="submit" class="btn btn-dark" name="btn-add-comment">Đăng</button>
                                </div>
                            </form>
                    <?php
                        }
                    }
                    ?>
                </div>

                <div class="comment-show">
                    <?php
                    if ($comment) {
                    ?>
                        <p>Bình luận của bạn</p>
                        
                        <div class="comment-show-item">
                            <div class="comment-show-item-user">
                                <div>
                                    <img src="<?= $pathUpload . $_SESSION['user']['u_img'] ?>" alt="">
                                </div>
                                <div class="comment-show-item-user-name">
                                    <p><?= $_SESSION['user']['u_fullname'] == "" ? $_SESSION['user']['u_username'] : $_SESSION['user']['u_fullname'] ?> <span style="color: blue;font-weight: 500;"><?= $userComment['com_status'] != 1 ? "  (comment đã bị ẩn)" : '' ?></span></p>
                                    <span><?= $userComment['com_date'] ?></span>
                                </div>
                            </div>
                            <div class="comment-show-item-text d-flex align-items-end">
                                <div>
                                    <p class="pb-1"><?= $userComment['com_reating'] ?> <i class="fa-solid fa-star"></i></p>
                                    <p class="pb-1"><?= $userComment['com_content'] ?></p>
                                    <img style="width:100px;height:auto" src="<?= $pathUpload . $userComment['com_img'] ?>" alt="">
                                </div>
                                <div>
                                    <a class="mx-3" href="<?= $clientUrl . "comment/delete&idpro=" . $pro['id'] . "&id=" . $userComment['id'] ?>">xóa</a>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    <hr>
                    <p>Danh sách bình luận</p>
                    <?php foreach ($dsComment as $cm) : ?>
                    <div class="comment-show-item">
                        <div class="comment-show-item-user">
                            <div>
                                <img src="<?= $pathUpload . $cm['user_img'] ?>" alt="">
                            </div>
                            <div class="comment-show-item-user-name">
                                <p><?= $cm['user'] ?></p>
                                <span><?= $cm['date'] ?></span>
                            </div>
                        </div>
                        <div class="comment-show-item-text">
                            <p class="pb-1"><?= $cm['reating'] ?> <i style="color: #DCD641;" class="fa-solid fa-star"></i></p>
                            <p class="pb-1"><?= $cm['text'] ?></p>
                            <img style="width:100px;height:auto" src="<?= $pathUpload . $cm['img'] ?>" alt="">
                        </div>
                    </div>
                    <?php endforeach ?>
                </div>
            </div> -->
        </div>
        <div class="col-5 collections-product">
            <div class="collections-product-show">
                <div class="title">
                    <h2><?php echo e($product['name']); ?></h2>
                    <p> Danh mục:
                        <?php $__currentLoopData = $listCat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo e($cat['cat_name'] . ","); ?>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </p>
                    <span class="price">Giá : <?php echo e($product['min_price']. " - " . $product['max_price']." VNĐ"); ?></span>
                </div>
                <p>Đã bán : <span class="daban" style="font-weight: bold;"><?php echo e($product['buys']); ?></span></p>
                <div class="cate">
                    <div class="cate-color">
                        <p>Màu sắc: </p>
                        <div class="boxColor">
                            <?php $__currentLoopData = $colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <button data-color="<?php echo e($color['pp_color']); ?>" class="px-2 btn btn-outline-dark btn_color"><?php echo e($color['pp_color']); ?></button>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <div class="cate-size">
                        <p>Kích cơ: </p>
                        <div class="boxSize">
                            <?php $__currentLoopData = $sizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $size): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <button data-size="<?php echo e($size['pp_size']); ?>" class="px-2 btn btn-outline-dark btn_size"><?php echo e($size['pp_size']); ?></button>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <form action="/muangay" id="addtocart" class="form_count my-3" method="post">
                        <div class="cate-count">
                            <p>Số lượng : <b class="soluongsanpham"><?php echo e($product['count']); ?></b></p>
                            <div class="rangee">
                                <div class="field">
                                    <div class=" value left">
                                        1
                                    </div>
                                    <input type="number" name="count" class="span-input-count" min="1" max="<?php echo e($product['count']); ?>" value="1" steps="1">
                                    <div class=" value right">
                                        <?php echo e($product['count']); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" id="idpp" name="idpp" value="">
                        <input type="hidden" id="idpro" name="idpro" value="<?php echo e($product['id']); ?>">
                        <div class="d-flex justify-content-start align-items-center">
                            <button type="button" id="btn-add-cart" name="btn-add-cart" class="btn btn-lg btn-success me-3 nonclick"><i class="fa-solid fa-cart-plus"></i></button>
                            <button type="submit" id="btn-buy-cart" name="btn-buy-cart" class="btn btn-lg btn-danger px-5 nonclick">Mua ngay</i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="container mt-4 p-4">
    <?php
    if (!empty($listSpLq)) {
        echo '<h3 class="p-4">Sản phẩm cùng danh mục</h3>';
    }
    ?>
    <div class="new-product p-4">
        <?php
        foreach ($listSpLq as $key => $splq) :
        ?>
            <h3><?= $key ?></h3>
            <div class="list">
                <?php
                foreach ($splq as $pro) :
                    foreach ($listProPP as $pp) :
                        if ($pp['pp_proid'] == $pro['id']) :
                ?>
                            <div class="card" style="width: 15rem">
                                <img src="<?= $pathUpload . $pro['pro_img'] ?>" class="card-img-top" alt="..." />
                                <div class="card-body">
                                    <a href="<?= $clientUrl . "chitietsp&id=" . $pro['id'] ?>">
                                        <h5 class="card-title product-title-name-all"><?= $pro['pro_name'] ?></h5>
                                    </a>
                                    <div class="card-views">
                                        <p class="card-text"><?= number_format($pp['minprice']) . " -> " . number_format($pp['maxprice']) . " (vnđ)" ?> </p>
                                        <span>Lượt mua : <?= $pp['total_buys'] ?></span>
                                    </div>
                                    <div class="card-views d-flex justify-content-between">
                                        <span>Lượt xem: <?= $pro['pro_views'] ?></span>
                                        <span>Số lượng: <?= $pp['total_count'] ?></span>
                                    </div>
                                    <a href="<?= $clientUrl . "chitietsp&id=" . $pro['id'] ?>" class="btn btn-outline-primary">Mua ngay</a>
                                </div>
                            </div>
                <?php
                        endif;
                    endforeach;
                endforeach;
                ?>
            </div>
        <?php
        endforeach;
        ?>
    </div>
</div> -->
<div id="log"></div>
    <script type="text/javascript">
        $('.filtering').slick({
            slidesToShow: 4,
            slidesToScroll: 4
        });

        $(document).ready(function() {
            img = $("#ImgAnh");
            listImg = $(".imgChildToggel");
            for (i = 0; i < listImg.length; i++) {
                (function(index) {
                    $(listImg[index]).on("click", function() {
                        img.attr('src', $(this).attr('src'));
                    });
                })(i);
            }
        });

        // reating
        let reating = document.querySelectorAll(".reating");
        let reatingInput = document.querySelectorAll(".reating_input");
        for (let i = 0; i < reating.length; i++) {
            reating[i].onclick = function() {
                for (let rt = 0; rt < reating.length; rt++) {
                    reatingInput[rt].checked = false;
                    if (reating[rt].classList.contains('fa-solid')) {
                        reating[rt].classList.remove('fa-solid');
                        reating[rt].classList.add('fa-regular');
                    }
                }
                reatingInput[i].checked = true;
                for (let rt = 0; rt <= i; rt++) {
                    if (!reating[rt].classList.contains('fa-solid')) {
                        reating[rt].classList.remove('fa-regular');
                        reating[rt].classList.add('fa-solid');
                    }
                }
            }
        }

        function checkClass(clas) {
            checkBtnColor = false;
            listBtn = document.querySelectorAll(clas);
            for (let i = 0; i < listBtn.length; i++) {
                if ($(listBtn[i]).hasClass("togger")) {
                    checkBtnColor = true;
                }
            }
            if (checkBtnColor) {
                return true;
            } else {
                return false
            }
        }

        idpro = $("#idpro").val();
        $(document).on("click", ".btn_color", function() {
            var listColor = document.querySelectorAll(".btn_color");
            for (let i = 0; i < listColor.length; i++) {
                $(listColor[i]).removeClass("togger");
            }
            $(this).addClass("togger");
            let listTogger = document.querySelectorAll(".cate-size .boxSize button");
            if(listTogger){
                for(let i = 0; i < listTogger.length; i++){
                    $(listTogger[i]).removeClass("togger");
                }
            }
            if(listTogger.length)
            checkCl = checkClass(".cate-color button");
            if (checkCl) {
                color = $(this).data("color");
                $.ajax({
                    url: '/chitietsp',
                    method: 'POST',
                    data: {
                        color: color,
                        idpro: idpro
                    },
                    success: function(data) {
                        $(".boxSize").html(data);
                    }
                });
            }
            checkBtn();
        });


        $(document).on("click", ".btn_size", function() {
            var listSize = document.querySelectorAll(".btn_size");
            for (let i = 0; i < listSize.length; i++) {
                $(listSize[i]).removeClass("togger");
            }
            $(this).addClass("togger");
            size = $(this).data("size");
            check = document.querySelectorAll(".togger");
            if (check.length !== 2) {
                $.ajax({
                    url: '/chitietsp',
                    method: 'POST',
                    data: {
                        size: size,
                        idpro: idpro
                    },
                    success: function(data) {
                        $(".boxColor").html(data);
                    }
                });
            }
            checkBtn();
        });

        function checkBtn() {
            checkColor = checkClass(".cate-color button");
            checkSize = checkClass(".cate-size .boxSize button");
            if (checkColor && checkSize) {
                color = $(".togger").eq(0).data("color");
                size = $(".togger").eq(1).data("size");
                $.ajax({
                    url: '/getTypeMemory',
                    method: 'POST',
                    data: {
                        idpro: idpro,
                        color: color,
                        size: size,
                    },
                    success: function(data) {
                        data = JSON.parse(data);
                        if(data.count == 0){
                            $("#btn-add-cart").addClass("nonclick");
                            $("#btn-buy-cart").addClass("nonclick");
                        }else{
                            $("#btn-add-cart").removeClass("nonclick");
                            $("#btn-buy-cart").removeClass("nonclick");
                        }
                        $(".price").html("Giá : " + data.price + " VNĐ");
                        $(".soluongsanpham").html(data.count);
                        $(".value.right").html(data.count);
                        $(".span-input-count").attr("max", data.count);
                        $(".daban").html(data.buys);
                        $("#idpp").val(data.id);
                    }
                });
            } else {
                $("#btn-add-cart").addClass("nonclick");
                $("#btn-buy-cart").addClass("nonclick");
            }
        }
        $(document).on("click","#btn-add-cart",function(){
            $.ajax({
                url: '/addtocart',
                method: 'POST',
                data: new FormData($("#addtocart").get(0)),
                contentType: false,
                processData: false,
                success: function(log){
                    $("#log").html(log);
                }
            });
        });
    </script>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ADMIN\Desktop\duan1-oop\resources\views\client/product/chitietsp.blade.php ENDPATH**/ ?>