
<?php $__env->startSection('content'); ?>
    <button id="button">Hello</button>
    <div id="log"></div>
    <script>
        $(document).ready(function(){
            $.ajax({
                url: "/admin/getAll",
                method: "GET",
                success: function(data){
                    $("#log").html(data);
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ADMIN\Desktop\duan1-oop\resources\views/admin/homepage.blade.php ENDPATH**/ ?>