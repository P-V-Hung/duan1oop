
<?php $__env->startSection('title'); ?>
    <title>Giỏ hàng</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
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
    <form action="" method="post" class="">
        <!-- <h3 class='pt-5 pb-5' style='text-align: center;'>Không có sản phẩm nào</h3> -->

        <div class="listcart">
                <div class="cart d-flex align-items-center justify-content-between">
                    <div class="cart_input">
                        <input type="checkbox" class="cart_sp_id" name="" value="" id="">
                    </div>
                    <div class="cart_image">
                        <img src="" width="100px" alt="">
                    </div>
                    <div class="cart_title">
                        <a href="">
                            <h6 style="max-width: 230px;"></h6>
                        </a>
                    </div>
                    <div class="cart_proinfor">
                        <p>Màu sắc : </p>
                        <p>Kích cỡ: </p>
                    </div>
                    <div class="cart_price">
                        <p>100.000 vnđ</p>
                    </div>
                    <div class="cart_count">
                        <p>4</p>
                    </div>
                    <div class="cart_total">
                        <p>400.000 vnđ</p>
                    </div>
                    <div class="cart_thaotac">
                        <a href="">Xóa</a>
                    </div>
                </div>
                <hr>
        </div>
        <div class="cart_footer mt-5 mb-3 p-4 position-sticky">
            <div class="cart_btn d-flex justify-content-between">
                <div class="cart_btn_thaotac d-flex align-items-center">
                    <div class="cart_all me-5">
                        <input type="checkbox" name="" id="cart_all">
                        <label for="cart_all">Chọn tất cả</label>
                    </div>
                    <input type="submit" class="btn btn-outline-dark" value="Xóa tất cả mục đã chọn" name="btn_deletes-cart">
                </div>
                <button name="btn_buy" type="submit" id="muahang" class="btn btn-outline-danger">Mua hàng</button>
            </div>
        </div>
    </form>
    <div id="log"></div>
</main>
<script>
    function getCart(){
        $.ajax({
            url: '/getCart',
            method: 'POST',
            success: function(data){
                $(".listcart").html(data);
                // console.log(data);
            }
        });
    }
    $(document).ready(function(){
        getCart();
    });

    let listInput = document.querySelectorAll(".cart_sp_id");
    let inputAll = document.getElementById("cart_all");
    inputAll.addEventListener("change", function() {
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
    $("#muahang").on("click",function(){
        let check = false;
        for (let i = 0; i < listInput.length; i++) {
            if(listInput[i].checked == true){
                check = true;
            }
        }
        if(check){
            $("#muahang").attr("type", "submit");
        }else{
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
<?php echo $__env->make('layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ADMIN\Desktop\duan1-oop\resources\views\client/product/cart.blade.php ENDPATH**/ ?>