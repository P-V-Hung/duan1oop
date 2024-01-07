
<?php $__env->startSection('title'); ?>
<title>Chỉnh sửa thông tin</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="box_editUserInfo box-userInfo">
    <div class="box-userInfo-header">
        <h3>Chỉnh sửa hồ sơ</h3>
        <p>Chỉnh sửa thông tin tài khoản</p>
    </div>
    <div class="box-userInfo-content">
        <form action="/saveeditinfo" method="post" enctype="multipart/form-data">
            <input type="hidden" name="iduser" value="<?php echo e($user['id']); ?>">
            <div class="box-userInfo-content-left">
                <table class="table">
                    <tr>
                        <td style="min-width: 150px;">Tên đăng nhập</td>
                        <td><input type="text" id="user" name="u_username" value="<?php echo e($user['username']); ?>" readonly></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="text" id="email" name="u_email" value="<?php echo e($user['email']); ?>" readonly></td>
                    </tr>
                    <tr>
                        <td>Họ và tên</td>
                        <td><input type="text" id="fullname" name="u_fullname" value="<?php echo e($user['fullname']); ?>"></td>
                    </tr>
                    <tr>
                        <td>Số điện thoại</td>
                        <td><input type="text" id="tel" name="u_tel" value="<?php echo e($user['tel']); ?>"></td>
                    </tr>
                    <tr>
                        <td>Địa chỉ</td>
                        <td class="api-tinh">
                            <select class="form-select" id="tinh">
                                <?php if(!empty($address[3])): ?>
                                <option value=""><?php echo e($address[3]); ?></option>
                                <input type="hidden" id="inputTinh" value="<?php echo e($address[3]); ?>" name="tinh">
                                <?php else: ?>
                                <input type="hidden" id="inputTinh" value="" name="tinh">
                                <option value="">Chọn tỉnh thành</option>
                                <?php endif; ?>
                            </select>
                            <select class="form-select my-1" id="huyen">
                                <?php if(!empty($address[2])): ?>
                                <option value=""><?php echo e($address[2]); ?></option>
                                <input type="hidden" id="inputHuyen" value="<?php echo e($address[2]); ?>" name="huyen">
                                <?php else: ?>
                                <input type="hidden" id="inputHuyen" value="" name="huyen">
                                <option value="">Chọn quận huyện</option>
                                <?php endif; ?>
                            </select>
                            <select class="form-select" id="xa">
                                <?php if(!empty($address[1])): ?>
                                <option value=""><?php echo e($address[1]); ?></option>
                                <input type="hidden" id="inputXa" value="<?php echo e($address[1]); ?>" name="xa">
                                <?php else: ?>
                                <input type="hidden" id="inputXa" value="" name="xa">
                                <option value="">Chọn xã</option>
                                <?php endif; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Chi tiết</td>
                        <td><input placeholder="Địa chỉ chi tiết" type="text" id="address" name="u_address" value="<?php echo e($user['address']); ?>"></td>
                    </tr>
                </table>
                <input type="hidden" id="iduser" value="">
                <button type="submit" name="btn-editInfor" id="btn-editInfor" class="btn btn-success">Lưu thông tin</button>
                <a href="/info" class="btn"><button type="button" class="btn btn-secondary">Hủy</button></a>
            </div>
            <div class="box-userInfo-content-right">
                <div class="box-userInfo-content-right-img">
                    <img src="./public/uploads/<?php echo e($user['img']); ?>" alt="" id="userInfo-avatar" />
                    <label for="changeFile"><i class="fa-solid fa-pen-to-square"></i></label>
                    <input type="file" class="imageUser" name="u_img" id="changeFile" onchange="chooseFile(this,'userInfo-avatar')">
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function() {
        $("#tinh").on('change', function() {
            tinh = $("#tinh").find("option:selected").text();
            $('#inputTinh').val(tinh);
        });
        $("#huyen").on('change', function() {
            huyen = $("#huyen").find("option:selected").text();
            $('#inputHuyen').val(huyen);
        });
        $("#xa").on('change', function() {
            xa = $("#xa").find("option:selected").text();
            $('#inputXa').val(xa);
        });
    });
    $(document).ready(function() {
        $("#tinh").on('focus', function() {
            $.ajax({
                url: "https://provinces.open-api.vn/api/",
                type: "GET",
                success: function(reponse) {
                    var tinh = '';
                    for (i = 0; i < reponse.length; i++) {
                        tinh += '<option value="' + reponse[i].code + '">' + reponse[i].name + '</option>';
                    }
                    $("#tinh").html(tinh);
                }
            });
        });
        $('#tinh').change(function() {
            var idTinh = $('#tinh').val();
            $.ajax({
                url: "https://provinces.open-api.vn/api/p/" + idTinh + "?depth=2",
                type: "GET",
                success: function(data) {
                    var huyen = '';
                    var listHuyen = data.districts;
                    for (var i = 0; i < listHuyen.length; i++) {
                        huyen += '<option value="' + listHuyen[i].code + '">' + listHuyen[i].name + '</option>';
                    }
                    $("#huyen").html(huyen);
                }
            });
        });
        $('#xa').on("focus",function() {
            var idHuyen = $('#huyen').val();
            $.ajax({
                url: "https://provinces.open-api.vn/api/d/" + idHuyen + "?depth=2",
                type: "GET",
                success: function(data) {
                    var xa = '';
                    var listXa = data.wards;
                    for (var i = 0; i < listXa.length; i++) {
                        xa += '<option value="' + listXa[i].code + '">' + listXa[i].name + '</option>';
                    }
                    $("#xa").html(xa);
                }
            });
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ADMIN\Desktop\duan1-oop\resources\views\client/user/editInfo.blade.php ENDPATH**/ ?>