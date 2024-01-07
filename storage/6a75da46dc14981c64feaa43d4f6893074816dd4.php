<h2 class="py-4 title-admin">Cập nhật sản phẩm</h2>
<div class="strong-button">
    <input type="button" class="btn" id="backListPro" value="< Quay lại">
</div>
<form id="form-edit-pro">
    <input type="hidden" id="idpro" name="idpro" value="<?php echo e($product['id']); ?>">
    <div class="collections row mt-5 px-5 justify-content-evenly">
        <div class="col-5 collections-img">
            <div>
                <img id="img-add-pro" src="../public/uploads/<?php echo e($product['pro_img']); ?>" alt="" style="width:100%;">
            </div>
            <div class="my-3">
                <label for="">Ảnh đại diện</label>
                <input class="form-control" type="file" name="img" onchange="chooseFile(this,'img-add-pro')" id="formFile">
            </div>
            <div class="my-3">
                <label for="">Ảnh mô tả</label>
                <input class="form-control" type="file" multiple name="imgs[]">
            </div>
            <div class="img-slider">
                <?php $__currentLoopData = $listImg; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="img-item del px-1">
                    <div data-id="<?php echo e($img['id']); ?>" class="imgdel">
                        <i class="fa-solid fa-trash"></i>
                    </div>
                    <img src="../public/uploads/<?php echo e($img['img']); ?>" alt="">
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="comment">
                <div class="comment-title">
                    <h5>Mô tả: </h5>
                    <textarea name="pro_desc" id="text-mota" class="border" rows="10"><?php echo e($product['pro_desc']); ?></textarea>
                </div>
            </div>
        </div>
        <div class="col-5 collections-product">
            <div class="collections-product-show">
                <div class="title">
                    <h2>Thông tin sản phẩm: </h2>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">Tên sản phẩm</span>
                        <input type="text" class="form-control" placeholder="Nhập tên sản phẩm" value="<?php echo e($product['pro_name']); ?>" require name="pro_name" id="basic-url" aria-describedby="basic-addon3">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">Giá gốc</span>
                        <input type="text" class="form-control" placeholder="Giá gốc sản phẩm" value="<?php echo e($product['del_price']); ?>" name="del_price" id="basic-url" aria-describedby="basic-addon3">
                    </div>
                    <p>Danh mục sản phẩm:</p>
                </div>
                <div class="cate">
                    <div class="cate-size">
                        <p>Danh mục </p>
                        <div class="cate-checkbox" id="listcat"></div>
                        <div class="cate-checkbox" id="listcatChild"></div>
                    </div>
                    <div class="input-group mt-3">
                        <label class="input-group-text" for="inputGroupSelect01">Trạng thái</label>
                        <select class="form-select" name="pro_status" id="inputGroupSelect01">
                            <option value="0">Đang bán</option>
                            <option value="1" <?php echo e($product['pro_status']==1?'selected':''); ?>>Ngừng bán</option>
                        </select>
                    </div>
                    <button class="btn btn-lg btn-dark my-3" type="button" id="btn_edit-pro">Sửa sản phẩm</button>
                </div>
            </div>
        </div>
        <div id="log"></div>
</form>
<script>
    $(document).ready(function() {
        function select_cat(id = 0, box = "#listcat", idpro = 0) {
            $.ajax({
                url: '/admin/product/getcat',
                method: 'POST',
                data: {
                    idpro: idpro,
                    idparent: id
                },
                success: function(data) {
                    $(box).html(data);
                }
            });
        }

        function del_img(id) {
            $.ajax({
                url: '/admin/product/delImg',
                method: 'POST',
                data: {
                    id: id
                },
                success: function() {
                    id = $("#idpro").val();
                    view_editPro(id)
                }
            });
        }
        select_cat(0, "#listcat", $("#idpro").val());
        $(document).on('click', ".checkCatChild", function() {
            if ($(this).prop('checked')) {
                select_cat($(this).val(), "#listcatChild", $("#idpro").val());
            } else {
                $("#listcatChild").html("");
            }
        });
        $(document).on('click', "#btn_edit-pro", function() {
            $.ajax({
                url: '/admin/product/saveEditPro',
                method: 'POST',
                data: new FormData($("#form-edit-pro").get(0)),
                contentType: false,
                processData: false,
                success: function(log) {
                    $("#log").html(log);
                }
            });
        });

        $(document).on("click", ".imgdel", function() {
            id = $(this).data("id");
            del_img(id);
        });
    });
    $(document).ready(function() {
        $('.img-slider').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
        });
    });
</script><?php /**PATH C:\Users\ADMIN\Desktop\duan1-oop\resources\views\admin/product/editPro.blade.php ENDPATH**/ ?>