
<?php $__env->startSection('title'); ?>
    <title>Danh mục</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <h2 class="py-4 title-admin">Danh sách danh mục</h2>
    <div class="strong-button">
        <input type="button" class="btn" id="back" value="< Quay lại">
    </div>
    <div class="listdanhmuc d-flex justify-content-center align-items-center p2-5">
        <form id="form-add-cat">
            <div class="input-group mb-3">
                <input type="hidden" value="0" id="idparent">
                <input type="text" class="form-control" id="cat-name" placeholder="Nhập tên danh mục" aria-label="Recipient's username" aria-describedby="btn_update-cate">
                <button type="button" class="btn btn-outline-secondary button-add-cat" id="btn_add-cate">Thêm danh mục</button>
            </div>
        </form>
    </div>
    <div id="table"></div>
    <div id="log"></div>
    <script>
        $(document).ready(function() {
            function select_data(id = 0){
                $.ajax({
                    url: "/admin/category/getData",
                    method: 'POST',
                    data: {
                        idparent: id
                    },
                    success: function(data) {
                        console.log(data);
                        $("#table").html(data);
                    }
                });
            }
            function find_data(id){
                $.ajax({
                    url: "/admin/category/findData",
                    method: 'POST',
                    data: {
                        id: id
                    },
                    success: function(idparent) {
                        $("#idparent").val(idparent);
                        select_data(idparent);
                    }
                });
            }
            function edit_data(id,text,column){
                $.ajax({
                    url: "/admin/category/editData",
                    method: 'POST',
                    data: {
                        id: id,
                        text: text,
                        column: column
                    },
                    success: function(log) {
                        $("#log").html(log)
                        select_data($("#idparent").val()); 
                    }
                });
            }
            function insert_data(text,idparent){
                $.ajax({
                    url: "/admin/category/addData",
                    method: 'POST',
                    data:{
                        catName:text,
                        idparent:idparent
                    },
                    success: function(log) {
                        $("#log").html(log)
                        select_data(idparent);
                    }
                });
            }
            function delete_data(id){
                $.ajax({
                    url: "/admin/category/deleteData",
                    method: 'POST',
                    data:{
                        id:id,
                    },
                    success: function(log) {
                        $("#log").html(log)
                        select_data($("#idparent").val());
                    }
                });
            }
            select_data($("#idparent").val()); 
            $(document).on('click',"#btn_add-cate",function(){
                text = $("#cat-name").val();
                idparent = $("#idparent").val();
                insert_data(text,idparent);
                $("#form-add-cat")[0].reset();
            });
            $(document).on('click',".btn-del-cart",function(){
                id = $(this).data("id");
                delete_data(id);
            });
            $(document).on('blur',".catname",function(){
                id = $(this).data("id");
                console.log(id);
                text = $(this).text();
                edit_data(id,text,"cat_name");
            });
            $(document).on('click',".catchild",function(){
                id = $(this).data("id");
                select_data(id);
                $("#idparent").val(id);
            });
            $(document).on('click',"#back",function(){
                find_data($("#idparent").val());
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ADMIN\Desktop\duan1-oop\resources\views\admin/category/index.blade.php ENDPATH**/ ?>