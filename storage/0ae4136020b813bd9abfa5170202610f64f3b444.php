
<?php $__env->startSection('title'); ?>
<title>Giỏ hàng</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<input type="hidden" id="key" value="<?php echo e($vitri); ?>">
<main class="container-xxl mt-5">
    <div class="cart d-flex align-items-center justify-content-between">
        <div class="cart_input"></div>
        <div class="cart_sp ms-5">
            <p>Sản phẩm</p>
        </div>
        <div>Tên sản phẩm</div>
        <div>Cấu hình</div>
        <div></div>
        <div class="cart_price">
            <p>Đơn giá</p>
        </div>
        <div class="cart_count">
            <p>Số lượng</p>
        </div>
        <div class="cart_total">
            <p>Số tiền</p>
        </div>
        <div class="cart_thaotac">
            <p>Thao tác</p>
        </div>
    </div>
    <hr>
    <!-- Danh sách cart -->
    <form action="/thanhtoan" method="post" class="">
        <div class="listcart"> </div>
        <div class="cart_footer mt-5 mb-3 p-4 position-sticky">
            <div class="cart_btn d-flex justify-content-between">
                <div class="cart_btn_thaotac d-flex align-items-center">
                    <div class="cart_all me-5">
                        <input type="checkbox" name="" id="cart_all">
                        <label for="cart_all">Chọn tất cả</label>
                    </div>
                    <input type="button" class="btn btn-outline-dark" value="Xóa tất cả mục đã chọn" id="btn_deletes-cart">
                </div>
                <button name="btn_buy" type="submit" id="muahang" class="btn btn-outline-danger">Mua hàng</button>
            </div>
        </div>
    </form>
    <div id="log"></div>
</main>
<script>
    function getCart() {
        let key = $("#key").val() ?? -1;
        $.ajax({
            url: '/getCart',
            method: 'POST',
            data:{
                key: key
            },
            success: function(data) {
                $(".listcart").html(data);
            }
        });
    }
    $(document).ready(function() {
        getCart();
        $(document).on("click", ".btnRangeUp", function() {
            count = $(this).closest('.cart_count').find('.inputRange').val();
            var that = $(this);
            idpp = $(this).data("idpp");
            $.ajax({
                url: '/inputcartup',
                method: 'post',
                data: {
                    count: count,
                    idpp: idpp
                },
                success: function(data) {
                    data = JSON.parse(data);
                    that.closest('.cart_count').find('.inputRange').val(data.count);
                    that.closest(".cart").find(".cart_price-total").html(data.price);
                    if (data.log != "") {
                        $("#log").html(data.log);
                    }
                }
            });
        });
        $(document).on("click", ".btnRangeDown", function() {
            count = $(this).closest('.cart_count').find('.inputRange').val();
            var that = $(this);
            idpp = $(this).data("idpp");
            $.ajax({
                url: '/inputcartdown',
                method: 'post',
                data: {
                    count: count,
                    idpp: idpp
                },
                success: function(data) {
                    data = JSON.parse(data);
                    that.closest('.cart_count').find('.inputRange').val(data.count);
                    that.closest(".cart").find(".cart_price-total").html(data.price);
                    if (data.log != "") {
                        $("#log").html(data.log);
                    }
                }
            });
        });
        $(document).on("click", ".btnDeleteCart", function() {
            key = $(this).data("key");
            $.ajax({
                url: '/deletecart',
                method: 'post',
                data: {
                    key: key
                },
                success: function(log) {
                    getCart();
                    $("#log").html(log);
                }
            });
        });
        $(document).on("click", "#btn_deletes-cart", function() {
            var listCartId = [];
            $(".cart_sp_id").each(function() {
                if($(this).prop('checked')){
                    listCartId.push($(this).val());
                }
            });
            $.ajax({
                url: '/deletecarts',
                method: 'post',
                data: {
                    listCartId: listCartId
                },
                success: function(log) {
                    getCart();
                    $("#log").html(log);
                }
            });
        });
    });

    let inputAll = document.getElementById("cart_all");
    inputAll.addEventListener("change", function() {
        let listInput = document.querySelectorAll(".cart_sp_id");
        if (inputAll.checked) {
            for (let i = 0; i < listInput.length; i++) {
                listInput[i].checked = true;
            }
        } else {
            for (let i = 0; i < listInput.length; i++) {
                listInput[i].checked = false;
            }
        }
    });
    $("#muahang").on("click", function(e) {
        let listInput = document.querySelectorAll(".cart_sp_id");
        let check = false;
        for (let i = 0; i < listInput.length; i++) {
            if (listInput[i].checked == true) {
                check = true;
            }
        }
        if (check) {
            $("#muahang").attr("type", "submit");
        } else {
            $("#muahang").attr("type", "button");
            text = `
                <div class='message message-error'>
                <div class='message-icon'>
                <i class='fa-solid fa-circle-check'></i>
                </div>
                <div class='message-title'>
                <h3>Error</h3>
                <p>Vui lòng chọn sản phẩm</p>
                </div>
                <div class='message-close'>
                <i class='fa-solid fa-x'></i>
                </div>
                </div>
            `;
            $("#log").html(text);
        }
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ADMIN\Desktop\duan1-oop\resources\views\client/cart/cart.blade.php ENDPATH**/ ?>