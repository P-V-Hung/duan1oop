<?php

namespace App\Controllers\Client;

use App\Controllers\Client\BaseController;
use App\Models\BillInfoModel;
use App\Models\BillModel;
use App\Models\BillStatusModel;
use App\Models\CategoryModel;
use App\Models\ProCatModel;
use App\Models\ProductModel;
use App\Models\ProImgModel;
use App\Models\PropertyModel;
use App\Models\VNPayModel;
use App\Models\VoucherModel;

class ProductController extends BaseController
{
    private $billStatus;
    private $billInfo;
    private $bill;
    private $cate;
    private $product;
    private $property;
    private $proCat;
    private $proImg;
    private $voucher;

    public function __construct()
    {
        $this->voucher = new VoucherModel();
        $this->billInfo = new BillInfoModel();
        $this->bill = new BillModel();
        $this->cate = new CategoryModel();
        $this->product = new ProductModel();
        $this->property = new PropertyModel();
        $this->proCat = new ProCatModel();
        $this->proImg = new ProImgModel();
        $this->billStatus = new BillStatusModel();
    }

    public function index()
    {
        return parent::view("product.index");
    }

    public function getCat()
    {
        $catId = $_GET['id'] ?? 0;
        $listCat = $this->cate::where("cat_idparent", $catId)->get();
        return parent::view("product.getCat", [
            'listCat' => $listCat
        ]);
    }

    public function getPro()
    {
        $price = $_GET['price'] ?? 0;
        $page = $_GET['page'] ?? 1;
        $currentPro = 8;
        $cate = $_GET['categories'] ?? 0;
        $vitri = ($page - 1) * $currentPro;

        if ($cate == 0) {
            $listPro = $this->product::skip($vitri)->take($currentPro)->get();
            $countProduct = $this->product::count();
        } else {
            $listPcId = $this->proCat::where("pc_idcat", $cate)->get();
            $pcProIds = $listPcId->pluck('pc_idpro')->toArray();
            $listPro = $this->product::whereIn("id", $pcProIds)->skip($vitri)->take($currentPro)->get();
            $countProduct = count($pcProIds);
        }

        if ($page > ceil($countProduct / $currentPro)) {
            return '';
        }

        switch ($price) {
            case 0: {
                    $listProperty = $this->property
                        ::selectRaw('pp_proid, MIN(pp_price) as min_price, MAX(pp_price) as max_price, SUM(pp_buys) as count_buys, SUM(pp_count) as count')
                        ->groupBy('pp_proid')
                        ->get();
                    break;
                }
            case 1: {
                    $listProperty = $this->property
                        ::selectRaw('pp_proid, MIN(pp_price) as min_price, MAX(pp_price) as max_price, SUM(pp_buys) as count_buys, SUM(pp_count) as count')
                        ->where("pp_price", "<", 50000)
                        ->groupBy('pp_proid')
                        ->get();
                    break;
                }
            case 2: {
                    $listProperty = $this->property
                        ::selectRaw('pp_proid, MIN(pp_price) as min_price, MAX(pp_price) as max_price, SUM(pp_buys) as count_buys, SUM(pp_count) as count')
                        ->where("pp_price", ">=", 50000)
                        ->where("pp_price", "<", 100000)
                        ->groupBy('pp_proid')
                        ->get();
                    break;
                }
            case 3: {
                    $listProperty = $this->property
                        ::selectRaw('pp_proid, MIN(pp_price) as min_price, MAX(pp_price) as max_price, SUM(pp_buys) as count_buys, SUM(pp_count) as count')
                        ->where("pp_price", ">=", 100000)
                        ->where("pp_price", "<", 150000)
                        ->groupBy('pp_proid')
                        ->get();
                    break;
                }
            case 4: {
                    $listProperty = $this->property
                        ::selectRaw('pp_proid, MIN(pp_price) as min_price, MAX(pp_price) as max_price, SUM(pp_buys) as count_buys, SUM(pp_count) as count')
                        ->where("pp_price", ">=", 150000)
                        ->where("pp_price", "<", 200000)
                        ->groupBy('pp_proid')
                        ->get();
                    break;
                }
            default: {
                    $listProperty = $this->property
                        ::selectRaw('pp_proid, MIN(pp_price) as min_price, MAX(pp_price) as max_price, SUM(pp_buys) as count_buys, SUM(pp_count) as count')
                        ->groupBy('pp_proid')
                        ->get();
                    break;
                }
        }
        $listProduct = [];
        foreach ($listPro as $pro) {
            foreach ($listProperty as $p) {
                if ($pro['id'] === $p['pp_proid']) {
                    $pro = [
                        'id' => $pro['id'],
                        'img' => $pro['pro_img'],
                        'name' => $pro['pro_name'],
                        'del_price' => number_format($pro['del_price']),
                        'min_price' => number_format($p['min_price']),
                        'max_price' => number_format($p['max_price']),
                        'buys' => $p['count_buys'],
                        'count' => $p['count'],
                    ];
                    $listProduct[] = $pro;
                }
            }
        }
        return parent::view("product.getPro", [
            'listPro' => $listProduct
        ]);
    }

    public function chiTietSP()
    {
        $idpro = $_GET['id'] ?? null;
        if ($idpro) {
            $pro = $this->product::find($idpro);
            if (!empty($pro)) {
                $property = $this->property
                    ::selectRaw('pp_proid, MIN(pp_price) as min_price, MAX(pp_price) as max_price, SUM(pp_buys) as count_buys, SUM(pp_count) as count')
                    ->where("pp_proid", $idpro)
                    ->groupBy('pp_proid')
                    ->first();
                $product = [
                    'id' => $pro['id'],
                    'img' => $pro['pro_img'],
                    'name' => $pro['pro_name'],
                    'desc' => $pro['pro_desc'],
                    'del_price' => number_format($pro['del_price']),
                    'min_price' => number_format($property['min_price']),
                    'max_price' => number_format($property['max_price']),
                    'buys' => $property['count_buys'],
                    'count' => $property['count'],
                ];

                $listProCat = $this->proCat::where("pc_idpro", $idpro)->get();
                $listCatId = $listProCat->pluck("pc_idcat")->toArray();
                $listCat = $this->cate->whereIn("id", $listCatId)->get();

                $listImg = $this->proImg::where("proid", $idpro)->get();

                $colors = $this->property::selectRaw('pp_color')->where("pp_proid", $idpro)->groupBy("pp_color")->get();
                $sizes = $this->property::selectRaw('pp_size')->where("pp_proid", $idpro)->groupBy("pp_size")->get();


                return parent::view("product.chitietsp", [
                    'product' => $product,
                    'listCat' => $listCat,
                    'listImg' => $listImg,
                    'colors' => $colors,
                    'sizes' => $sizes,
                ]);
            } else {
                echo "Sản phẩm không tồn tại";
            }
        } else {
            echo "Đường dẫn không tồn tại!";
        }
    }

    public function getMemory()
    {
        $idpro = $_POST['idpro'];


        if (isset($_POST['color'])) {
            $sizes = $this->property::selectRaw('pp_size')->where("pp_proid", $idpro)->where("pp_color", $_POST['color'])->groupBy("pp_size")->get();

            foreach ($sizes as $size) {
                echo '<button data-size="' . $size['pp_size'] . '" class="px-2 btn btn-outline-dark btn_size">' . $size['pp_size'] . '</button>';
            }
        }

        if (isset($_POST['size'])) {

            $colors = $this->property::selectRaw('pp_color')->where("pp_proid", $idpro)->where("pp_size", $_POST['size'])->groupBy("pp_color")->get();

            foreach ($colors as $color) {
                echo '<button data-color="' . $color['pp_color'] . '" class="px-2 btn btn-outline-dark btn_color">' . $color['pp_color'] . '</button>';
            }
        }
    }

    public function getTypeMemory()
    {
        $idpro = $_POST['idpro'];
        $color = $_POST['color'];
        $size = $_POST['size'];
        $memory = $this->property
            ->where('pp_proid', $idpro)
            ->where("pp_color", $color)
            ->where("pp_size", $size)
            ->first();
        $data = [
            'id' => $memory['id'],
            'price' => number_format($memory['pp_price']),
            'buys' => $memory['pp_buys'],
            'count' => $memory['pp_count'],
        ];
        echo json_encode($data);
    }

    public function addToCart()
    {
        if (isset($_SESSION['user'])) {
            $checkCart = true;
            $id = '';
            if (!empty($_SESSION['cart'][$_SESSION['user']['id']])) {
                foreach ($_SESSION['cart'][$_SESSION['user']['id']] as $key => $product) {
                    if (isset($product['idpro']) && $product['idpro'] == $_POST['idpro'] && $product['idpp'] == $_POST['idpp']) {
                        $pp = $this->property::find($_POST['idpp']);
                        $proUp = $product['count'] + $_POST['count'];
                        if ($proUp <= $pp['pp_count']) {
                            $_SESSION['cart'][$_SESSION['user']['id']][$key]['count'] = $proUp;
                            \log::success('Đã cập nhật số lượng sản phẩm trong giỏ hàng');
                        } else {
                            \log::warn("Số lượng sản phẩm trong giỏ đạt giới hạn");
                        }
                        $id = $key;
                        $checkCart = false;
                    }
                }
            }
            if ($checkCart) {
                $data = [
                    'idpro' => $_POST['idpro'],
                    'idpp' => $_POST['idpp'],
                    'count' => $_POST['count']
                ];
                $_SESSION['cart'][$_SESSION['user']['id']][] = $data;
                \log::success('Thêm sản phẩm vào giỏ hàng thành công!');
            }
            return $id;
        } else {
            \log::success("Vui lòng đăng nhập <a href='/login'>tại đây</a>");
            die();
        }
    }

    public function muaNgay()
    {
        $key = $this->addToCart();
        if ($key == "") {
            $key = count($_SESSION['cart'][$_SESSION['user']['id']]) - 1;
        }
        header("location: /cart?key=" . $key);
    }

    public function cart()
    {
        $_SESSION['buy'] = [];
        $key = $_GET['key'] ?? -1;
        $returnView = parent::view("cart.cart", [
            'vitri' => $key
        ]);
        if (isset($_COOKIE['thongbao'])) {
            \log::error('Sản phẩm trong kho hàng không đủ!');
        }
        return $returnView;
    }

    public function getCart()
    {
        $carts = $_SESSION['cart'][$_SESSION['user']['id']] ?? null;
        $listCart = [];
        $vitri = $_POST['key'];
        if (($carts) && !empty($carts)) {
            foreach ($carts as $key => $cart) {
                $checked = '';
                if ($key == $vitri) {
                    $checked = 'checked';
                }
                $pro = $this->product::find($cart['idpro']);
                $pp = $this->property::find($cart['idpp']);
                if ($pp['pp_count'] < $cart['count']) {
                    $cart['count'] = $pp['pp_count'];
                }
                if ($pro && $pp) {
                    $data = [
                        'idpro' => $pro['id'],
                        'idpp' => $pp['id'],
                        'img' => $pro['pro_img'],
                        'name' => $pro['pro_name'],
                        'color' => $pp['pp_color'],
                        'size' => $pp['pp_size'],
                        'price' => number_format($pp['pp_price']),
                        'count' => $cart['count'],
                        'total' => number_format($pp['pp_price'] * $cart['count']),
                        'checked' => $checked
                    ];
                    if ($pp['pp_count'] == 0) {
                        $data['count'] = 'Hết hàng';
                    }
                    $listCart[] = $data;
                }
            }
        }
        return parent::view("cart.getCart", [
            'listCart' => $listCart
        ]);
    }

    public function inputCartUp()
    {
        $count = $_POST['count'];
        $idpp = $_POST['idpp'];
        $countUp = $count + 1;
        $pp = $this->property::find($idpp);
        if ($countUp <= $pp['pp_count']) {
            foreach ($_SESSION['cart'][$_SESSION['user']['id']] as $key => $product) {
                if ($product['idpp'] == $idpp) {
                    $_SESSION['cart'][$_SESSION['user']['id']][$key]['count'] = $countUp;
                    $data = [
                        'price' => number_format($countUp * $pp['pp_price']),
                        'count' => $countUp,
                        'log' => '',
                    ];
                }
            }
        } else {
            $data = [
                'price' => number_format($pp['pp_price'] * $count),
                'count' => $count,
                'log' => \log::warnn("Số lượng đã đạt giới hạn số sản phẩm trong kho")
            ];
        }
        echo json_encode($data);
    }

    public function inputCartDown()
    {
        $count = $_POST['count'];
        $idpp = $_POST['idpp'];
        $countUp = $count - 1;
        $pp = $this->property::find($idpp);
        if ($countUp > 0) {
            foreach ($_SESSION['cart'][$_SESSION['user']['id']] as $key => $product) {
                if ($product['idpp'] == $idpp) {
                    $_SESSION['cart'][$_SESSION['user']['id']][$key]['count'] = $countUp;
                    $data = [
                        'price' => number_format($countUp * $pp['pp_price']),
                        'count' => $countUp,
                        'log' => '',
                    ];
                }
            }
        } else {
            $data = [
                'price' => number_format($pp['pp_price'] * $count),
                'count' => $count,
                'log' => \log::warnn("Số lượng tối thiểu là một!")
            ];
        }
        echo json_encode($data);
    }

    public function deleteCart()
    {
        $key = $_POST['key'];
        unset($_SESSION['cart'][$_SESSION['user']['id']][$key]);
        $_SESSION['cart'][$_SESSION['user']['id']] = array_values($_SESSION['cart'][$_SESSION['user']['id']]);
        \log::success("Đã xóa sản phẩm khỏi giỏ hàng");
    }

    public function deleteCarts()
    {
        $listCartId = $_POST['listCartId'] ?? null;
        if (empty($listCartId)) {
            \log::error("Vui lòng chọn sản phẩm");
        } else {
            for ($i = 0; $i < count($listCartId); $i++) {
                unset($_SESSION['cart'][$_SESSION['user']['id']][$listCartId[$i]]);
            }
            $_SESSION['cart'][$_SESSION['user']['id']] = array_values($_SESSION['cart'][$_SESSION['user']['id']]);
            \log::success("Đã xóa thành công");
        }
    }


    public function thanhToan()
    {
        $carts = $_SESSION['cart'][$_SESSION['user']['id']];
        $keys = array_filter(array_keys($_POST), function ($key) {
            return strpos($key, 'cart') !== false;
        });
        $result = array_intersect_key($_POST, array_flip($keys));
        foreach ($result as $cartId) {
            $_SESSION['buy'][] = $carts[$cartId];
        }

        $echoData = [];
        $total = 0;
        $count = 0;
        if (isset($_SESSION['buy'])) {
            foreach ($_SESSION['buy'] as $data) {
                $pro = $this->product::find($data['idpro']);
                $pp = $this->property::find($data['idpp']);
                if ($pp['pp_count'] == 0) {
                    \log::warn("Sản phẩm '" . $pro['pro_name'] . "' đã hêt hàng");
                } else {
                    $total += $pp['pp_price'] * $data['count'];
                    $content = [
                        'idpro' => $pro['id'],
                        'idpp' => $pp['id'],
                        'img' => $pro['pro_img'],
                        'name' => $pro['pro_name'],
                        'color' => $pp['pp_color'],
                        'size' => $pp['pp_size'],
                        'price' => number_format($pp['pp_price']),
                        'count' => $data['count'],
                        'total' => number_format($pp['pp_price'] * $data['count'])
                    ];
                    $count += $data['count'];
                    $echoData[] = $content;
                }
            }
        }

        $address = strstr($_SESSION['user']['address'], ",", true);
        $vesauAddress = explode(",", strstr($_SESSION['user']['address'], ","));
        return parent::view("thanhtoan.thanhtoan", [
            'listData' => $echoData,
            'address' => $address,
            'fromAddress' => $vesauAddress,
            'total' => $total,
            'count' => $count
        ]);
    }

    public function saveThanhToan()
    {
        $price = str_replace('.', '', $_POST['total_bill']);
        $data = [
            'bill_userid' => $_SESSION['user']['id'],
            'bill_address' => $_POST['address'] . ", " . trim($_POST['xa']) . ", " . trim($_POST['huyen']) . ", " . trim($_POST['tinh']),
            'bill_tel' => $_POST['tel'],
            'bill_username' => $_SESSION['user']['username'],
            'bill_fullname' => $_POST['fullname'],
            'bill_price' => $price,
            'bill_count' => $_POST['count'],
            'bill_pttt' => $_POST['pttt'],
            'bill_status' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ];
        if (isset($_POST['voucher'])) {
            $data['voucher_id'] = $_POST['voucher'];
        }

        $checkPro = true;
        foreach ($_SESSION['buy'] as $buy) {
            $pro = $this->product->find($buy['idpro']);
            $property = $this->property->find($buy['idpp']);
            if ($property['pp_count'] < $buy['count']) {
                $checkPro = false;
            }
        }
        if ($checkPro) {
            $idBill = $this->bill->insertGetId($data);
            foreach ($_SESSION['buy'] as $buy) {
                $property = $this->property->find($buy['idpp']);
                // $property->decrement('pp_count', $buy['count']);
                // $property->increment('pp_buys', $buy['count']);
                $billInfo = new BillInfoModel();
                $data = [
                    'bill_id' => $idBill,
                    'proid' => $buy['idpro'],
                    'userid' => $_SESSION['user']['id'],
                    'pp_id' => $buy['idpp'],
                    'pro_price' => $property['pp_price'],
                    'pro_count' => $buy['count'],
                ];
                $billInfo->fill($data);
                $billInfo->save();
                foreach ($_SESSION['cart'][$_SESSION['user']['id']] as $key => $cart) {
                    if (($buy['idpro'] == $cart['idpro']) && ($buy['idpp'] = $cart['idpp'])) {
                        unset($_SESSION['cart'][$_SESSION['user']['id']][$key]);
                    }
                }
                $_SESSION['cart'][$_SESSION['user']['id']] = array_values($_SESSION['cart'][$_SESSION['user']['id']]);
            }

            if (isset($_POST['voucher'])) {
                $voucher = $this->voucher->find($_POST['voucher']);
                $voucher->increment('v_used');
                $voucher->decrement('v_count');
            }

            switch($_POST['pttt']){
                case 1:{
                    setcookie('thongbao', true, time() + 2);
                    header("location: /listbill");
                    break;
                }
                case 2:{
                    \Payment::vnpay($_POST['btn_muahang'],$idBill,$price);
                    break;
                }
            }

        } else {
            setcookie('thongbao', true, time() + 2);
            header("location: /cart");
        }
    }

    public function saveVnPay(){
        if (isset($_GET['vnp_BankTranNo'])) {
            $vnp_TxnRef = $_GET['vnp_TxnRef'];
            $vnp_Amount = $_GET['vnp_Amount'];
            $vnp_BankCode = $_GET['vnp_BankCode'];
            $vnp_BankTranNo = $_GET['vnp_BankTranNo'];
            $vnp_CardType = $_GET['vnp_CardType'];
            $vnp_OrderInfo = $_GET['vnp_OrderInfo'];
            $vnp_PayDate = $_GET['vnp_PayDate'];
            $vnp_TmnCode = $_GET['vnp_TmnCode'];
            $vnp_TransactionNo = $_GET['vnp_TransactionNo'];

            $data = [
                'vnp_amount' => $vnp_Amount,
                'vnp_bankCode' => $vnp_BankCode,
                'vnp_banktranno' => $vnp_BankTranNo,
                'vnp_cardtype' => $vnp_CardType,
                'vnp_orderinfo' => $vnp_OrderInfo,
                'vnp_paydate' => $vnp_PayDate, 
                'vnp_tmncode' => $vnp_TmnCode, 
                'vnp_transactionno' => $vnp_TransactionNo, 
                'id_bill' => $vnp_TxnRef, 
            ];

            $vnpay = new VNPayModel();
            $vnpay->fill($data);
            $vnpay->save();
            setcookie('thongbao',true, time() + 2);
            header("location: /listbill");
        }else{
            $vnp_TxnRef = $_GET['vnp_TxnRef'];
            $bill = $this->bill->find($vnp_TxnRef);
            $bill->bill_status = 6;
            $bill->save();
            setcookie('huydonhang',true, time() + 2);
            header("location: /listbill");
        }
    }

    public function listBill()
    {
        $listBill = $this->bill::where("bill_userid",$_SESSION['user']['id'])->orderBy("id","desc")->get();
    
        $echoBill = [];
        foreach($listBill as $bill){
            $billStatus = $this->billStatus::find($bill['bill_status']);
            if($bill['bill_status'] < 5){
                $thaotac = 'Hủy';
                $link = '/huydonhang?id='.$bill['id'];
            }elseif($bill['bill_status'] == 5){
                $thaotac = 'Hỗ trợ';
                $link = '/help';
            }else{
                $thaotac = 'Đã hủy';
                $link = '';
            }
            $data = [
                'id' => $bill['id'],
                'fullname' => $bill['bill_fullname'],
                'address' => $bill['bill_address'],
                'tel' => $bill['bill_tel'],
                'count' => $bill['bill_count'],
                'price' => number_format($bill['bill_price']),
                'created_at' => date("H:i:s d-m-Y",strtotime($bill['created_at'])),
                'pttt' => $bill['bill_pttt'] == 1?"Khi nhận hàng":"Chuyển khoản online",
                'status' => $billStatus['sb_name'],
                'thaotac' =>  $thaotac,
                'link' => $link
            ];
            $echoBill[] = $data;
        }

        
        $returnView = parent::view("thanhtoan.listbill",[
            "echoBill" => $echoBill
        ]);
        if (isset($_COOKIE['thongbao'])) {
            \log::success('Mua hàng thành công. Đang xác nhận đơn hàng');
        }
        if (isset($_COOKIE['huydonhang'])) {
            \log::error('Đơn hàng đã bị hủy!');
        }
        return $returnView;
    }

    public function billInfo(){
        $id = $_GET['id'] ?? null;
        if($id){
            $bil = $this->bill::find($id);
            $voucherPrice = '0';
            if($bil['voucher_id']){
                $voucher = $this->voucher::find($bil['voucher_id']);
                $voucherPrice = "- ".number_format($voucher["v_price"]);
            }
            $echoBill = [];
            $listBill = $this->billInfo::where("bill_id",$id)->get();
            foreach($listBill as $bill){
                $pro = $this->product::find($bill['proid']);
                $property = $this->property::find($bill['pp_id']);
                $total = $bill['pro_price'] * $bill['pro_count'];
                $data = [
                    'img' => $pro['pro_img'],
                    'idpro' => $bill['proid'],
                    'name' => $pro['pro_name'],
                    'color' => $property['pp_color'],
                    'size' => $property['pp_size'],
                    'price' => number_format($bill['pro_price']),
                    'count' => $bill['pro_count'],
                    'total' => number_format($total),
                ];
                $echoBill[] = $data;
            }
        }
        return parent::view("thanhtoan.billinfo",[
            "echoBill" => $echoBill,
            'total' => number_format($bil['bill_price']),
            'voucher' => $voucherPrice
        ]);
    }

    public function huydonhang(){
        $id = $_GET['id'] ?? null;
        if($id){
            $bill = $this->bill->find($id);
            $bill->bill_status = 6;
            $bill->save();
            setcookie('huydonhang',true, time() + 2);
            header("location: /listbill");
        }
    }
}
