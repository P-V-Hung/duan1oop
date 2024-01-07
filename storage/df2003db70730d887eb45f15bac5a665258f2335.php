<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <link rel="stylesheet" href="resources/css/style.css">
    <link rel="stylesheet" href="../resources/css/style.css">
    <link rel="stylesheet" href="../../resources/css/style.css">
    <?php echo $__env->yieldContent('title'); ?>
</head>

<body>
    <header class="header-web">
        <div class="container">
            <nav>
                <a href="">
                    <div class="logo">
                        <svg aria-hidden="true" class="pre-logo-svg" focusable="false" viewBox="0 0 24 24" role="img" width="60px" height="60px" fill="none">
                            <path fill="currentColor" fill-rule="evenodd" d="M21 8.719L7.836 14.303C6.74 14.768 5.818 15 5.075 15c-.836 0-1.445-.295-1.819-.884-.485-.76-.273-1.982.559-3.272.494-.754 1.122-1.446 1.734-2.108-.144.234-1.415 2.349-.025 3.345.275.2.666.298 1.147.298.386 0 .829-.063 1.316-.19L21 8.719z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </a>
                <form action="" class="search" method="post">
                    <input type="text" placeholder="Sản phẩm bạn cần..." name="keyword" />
                    <button type="submit" name="btn-search"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
                <div class="menu">
                    <ul>
                        <li><a href="/">Trang chủ</a></li>
                        <li><a href="/product">Sản phẩm</a></li>
                    </ul>
                    <div>
                        <div class=" dropdown">
                            <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="./public/uploads/<?php echo e($_SESSION['user']['img']??'user.jpg'); ?>" class="avatar-user" alt="" />
                            </button>

                            <ul class="dropdown-menu gap-2">
                                <?php if(isset($_SESSION['user'])): ?>
                                <li><a class="dropdown-item" href="/info">Thông tin cá nhân</a></li>
                                    <?php if($_SESSION['user']['role']==1): ?>
                                    <li><a class="dropdown-item" href="/admin">Trang quản trị</a></li>
                                    <?php endif; ?>
                                <li><a class="dropdown-item" href="/cart">Giỏ hàng</a></li>
                                <li><a class="dropdown-item" href="/listbill">Đơn hàng của bạn</a></li>
                                <li>
                                    <form action="/back" method="post">
                                        <button type="submit" name="btnlogout" class="btn btn-danger" style="width:100%;">Đăng xuất</button>
                                    </form>
                                </li>
                                <?php else: ?>
                                <li><a href="/logup" id="logup" class="dropdown-item">Đăng ký</a></li>
                                <li><a href="/login" id="login" class="dropdown-item">Đăng nhập</a></li>
                                <?php endif; ?>

                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <main id="root">
        <?php echo $__env->yieldContent('content'); ?>
    </main>
    <footer>
        <section class="ncss-container">
            <div class="footer-content">
                <div class="footer-text">
                    <h3>Hỗ trợ khách hàng</h3>
                    <p>Thông tin liên hệ</p>
                    <p>Hướng dẫn đặt hàng</p>
                    <p>Hướng dẫn tạo tài khoản thành viên</p>
                    <p>Chính sách giao hàng</p>
                </div>
                <div class="footer-text">
                    <h3>Giới thiệu</h3>
                    <p>Tin tức</p>
                    <p>Nhà đầu tư</p>
                    <p>Nghề nghiệp</p>
                    <p>Sự vững bền</p>
                </div>
                <div class="footer-icon">
                    <div class="footer-icon-items">
                        <i class="fa-brands fa-facebook-f"></i>
                    </div>
                    <div class="footer-icon-items">
                        <i class="fa-brands fa-youtube"></i>
                    </div>
                    <div class="footer-icon-items">
                        <i class="fa-brands fa-instagram"></i>
                    </div>
                </div>
            </div>
        </section>
    </footer>

    <script src="./resources/js/main.js"></script>
    <script src="../resources/js/main.js"></script>
    <script src="../../resources/js/main.js"></script>
    <script src="./resources/js/router.js"></script>
</body>

</html><?php /**PATH C:\Users\ADMIN\Desktop\duan1-oop\resources\views\client/layout/index.blade.php ENDPATH**/ ?>