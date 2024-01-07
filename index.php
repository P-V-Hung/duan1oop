<?php
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    session_start();
    require_once "./vendor/autoload.php";

    use App\Controllers\Admin\AdminController;
    use App\Controllers\Admin\CategoryController;
    use App\Controllers\Admin\ProductController as ProductAdmin;
    use App\Controllers\Admin\VoucherController;
    use App\Controllers\Client\HomeController;
    use App\Controllers\Client\UserController;
    use App\Controllers\Client\ProductController as ProductClient;
    use App\Controllers\Client\VoucherController as VoucherClient;

    $routes = new Router();

    // Admin
    $routes->get('/admin',[AdminController::class,'index']);

    // Category
    $routes->get('/admin/category',[CategoryController::class,'index']);
    $routes->post('/admin/category/getdata',[CategoryController::class,'getData']);
    $routes->post('/admin/category/finddata',[CategoryController::class,'findData']);
    $routes->post('/admin/category/adddata',[CategoryController::class,'addData']);
    $routes->post('/admin/category/editdata',[CategoryController::class,'editData']);
    $routes->post('/admin/category/deletedata',[CategoryController::class,'deleteData']);

    // Product
    $routes->get('/admin/product',[ProductAdmin::class,'index']);
    $routes->get('/admin/product/addpro',[ProductAdmin::class,'addPro']);
    $routes->post('/admin/product/getcat',[ProductAdmin::class,'getCat']);
    $routes->post('/admin/product/saveadd',[ProductAdmin::class,'saveAdd']);
    $routes->post('/admin/product/getcurent',[ProductAdmin::class,'getCurent']);
    $routes->post('/admin/product/getdata',[ProductAdmin::class,'getData']);
    $routes->post('/admin/product/info',[ProductAdmin::class,'info']);
    $routes->post('/admin/product/addproperty',[ProductAdmin::class,'addProperty']);
    $routes->post('/admin/product/saveaddproperty',[ProductAdmin::class,'saveAddProperty']);
    $routes->post('/admin/product/delproperty',[ProductAdmin::class,'delProperty']);
    $routes->get('/admin/product/editpro',[ProductAdmin::class,'editPro']);
    $routes->post('/admin/product/saveeditpro',[ProductAdmin::class,'saveEditPro']);
    $routes->post('/admin/product/editproperty',[ProductAdmin::class,'editProperty']);
    $routes->post('/admin/product/saveeditproperty',[ProductAdmin::class,'saveEditProperty']);
    $routes->post('/admin/product/delimg',[ProductAdmin::class,'delImg']);

    // Voucher
    $routes->get("/admin/voucher/add",[VoucherController::class,'addVoucher']);
    $routes->post("/admin/voucher/add",[VoucherController::class,'saveAddVoucher']);



    // Client
    $routes->get("/",[HomeController::class,'index']);

    // User
    $routes->get("/logup",[UserController::class,'logup']);
    $routes->post("/logup",[UserController::class,'saveLogup']);
    $routes->get("/xac-thuc-tai-khoan",[UserController::class,'xacThuc']);
    $routes->get("/login",[UserController::class,'login']);
    $routes->post("/login",[UserController::class,'saveLogin']);
    $routes->post("/back",[UserController::class,'backLogin']);
    $routes->get("/searchuser",[UserController::class,'searchUser']);
    $routes->post("/sendmailpass",[UserController::class,'sendMailPass']);
    $routes->post("/checkcode",[UserController::class,'checkCode']);
    $routes->post("/changepass",[UserController::class,'changepass']);
    $routes->get("/info",[UserController::class,'info']);
    $routes->get("/editinfo",[UserController::class,'editInfo']);
    $routes->post("/saveeditinfo",[UserController::class,'saveEditInfo']);
    $routes->get('/codeuse',[UserController::class,'CodeUse']);

    // Product
    $routes->get('/product',[ProductClient::class,'index']);
    $routes->get('/getpro',[ProductClient::class,'getPro']);
    $routes->get('/getcat',[ProductClient::class,'getCat']);
    $routes->get('/chitietsp',[ProductClient::class,'chiTietSP']);
    $routes->post('/chitietsp',[ProductClient::class,'getMemory']);
    $routes->post('/gettypememory',[ProductClient::class,'getTypeMemory']);
    $routes->post('/addtocart',[ProductClient::class,'addToCart']);
    $routes->post('/muangay',[ProductClient::class,'muaNgay']);

    
    // Cart
    $routes->get('/cart',[ProductClient::class,'cart']);
    $routes->post('/getcart',[ProductClient::class,'getCart']);
    $routes->post('/inputcartup',[ProductClient::class,'inputCartUp']);
    $routes->post('/inputcartdown',[ProductClient::class,'inputCartDown']);
    $routes->post('/deletecart',[ProductClient::class,'deleteCart']);
    $routes->post('/deletecarts',[ProductClient::class,'deleteCarts']);
    
    // Thanh toán
    $routes->get('/thanhtoan',[ProductClient::class,'thanhToan']);
    $routes->post('/thanhtoan',[ProductClient::class,'thanhToan']);
    $routes->post('/getvoucher',[VoucherClient::class,'getVoucher']);
    $routes->post('/savethanhtoan',[ProductClient::class,'saveThanhToan']);
    
    // bill
    $routes->get('/listbill',[ProductClient::class,'listBill']);
    $routes->get('/thanhtoanvnpay',[ProductClient::class,'thanhtoanvnpay']);
    $routes->get('/savevnpay',[ProductClient::class,'saveVnPay']);
    $routes->get('/billinfo',[ProductClient::class,'billInfo']);
    $routes->get('/huydonhang',[ProductClient::class,'huydonhang']);



    $routes->resolve();
?>