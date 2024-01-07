
<?php $__env->startSection('title'); ?>
<title>Sản phẩm</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<h2 class="py-4 title-admin">Thêm sản phẩm</h2>
<form id="form-add-pro">
    <div class="collections row mt-5 px-5 justify-content-evenly">
        <div class="col-5 collections-img">
            <div>
                <img id="img-add-pro" alt="" style="width:100%;">
            </div>
            <div class="my-3">
                <label for="">Ảnh đại diện</label>
                <input class="form-control" type="file" name="img" onchange="chooseFile(this,'img-add-pro')" id="formFile">
            </div>
            <div class="my-3">
                <label for="">Ảnh mô tả</label>
                <input class="form-control" type="file" multiple name="imgs[]">
            </div>
            <div class="comment">
                <div class="comment-title">
                    <h5>Mô tả: </h5>
                    <textarea name="pro_desc" id="text-mota" class="border" rows="10"></textarea>
                </div>
            </div>
        </div>
        <div class="col-5 collections-product">
            <div class="collections-product-show">
                <div class="title">
                    <h2>Thông tin sản phẩm: </h2>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">Tên sản phẩm</span>
                        <input type="text" class="form-control" placeholder="Nhập tên sản phẩm" require name="pro_name" id="basic-url" aria-describedby="basic-addon3">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">Giá gốc</span>
                        <input type="text" class="form-control" placeholder="Giá gốc sản phẩm" name="del_price" id="basic-url" aria-describedby="basic-addon3">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">Giá tiền</span>
                        <input type="text" class="form-control" placeholder="Giá sản phẩm" require name="pp_price" id="basic-url" aria-describedby="basic-addon3">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">Màu</span>
                        <input type="text" class="form-control" placeholder="Màu sắc" require name="pp_color" id="basic-url" aria-describedby="basic-addon3" list="colors">
                        <datalist id="colors">
                            <option value="Đỏ">
                            <option value="Vàng">
                            <option value="Xanh">
                            <option value="Đen">
                            <option value="Trắng">
                        </datalist>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">Size</span>
                        <input type="text" class="form-control" placeholder="Cấu hình" require name="pp_memory" id="basic-url" aria-describedby="basic-addon3">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">Số lượng</span>
                        <input type="number" class="form-control" min="0" placeholder="Số lượng hiện có" require name="pp_count" id="basic-url" aria-describedby="basic-addon3">
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
                            <option value="1">Ngừng bán</option>
                        </select>
                    </div>
                    <button class="btn btn-lg btn-dark my-3" type="button" id="btn_add-pro">Thêm sản phẩm</button>
                </div>
            </div>
        </div>
        <div id="log"></div>
</form>
<script>
    $(document).ready(function() {
        function select_cat(id = 0, box = "#listcat") {
            $.ajax({
                url: '/admin/product/getcat',
                method: 'POST',
                data: {
                    idparent: id
                },
                success: function(data) {
                    $(box).html(data);
                }
            });
        }
        select_cat();
        $(document).on('click', ".checkCatChild", function() {
            if ($(this).prop('checked')) {
                select_cat($(this).val(), box = "#listcatChild");
            } else {
                $("#listcatChild").html("");
            }
        });
        $(document).on('click', "#btn_add-pro", function() {
            $.ajax({
                url: '/admin/product/saveAdd',
                method: 'POST',
                contentType: false,
                processData: false,
                data: new FormData($("#form-add-pro").get(0)),
                success: function(log) {
                    $("#log").html(log);
                    $("#form-add-pro")[0].reset();
                }
            });
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ADMIN\Desktop\duan1-oop\resources\views\admin/product/addPro.blade.php ENDPATH**/ ?>