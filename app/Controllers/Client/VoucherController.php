<?php

namespace App\Controllers\Client;

use App\Models\VoucherModel;
use Symfony\Component\Mime\Address;

class VoucherController extends BaseController
{
    private $voucher;

    public function __construct()
    {
        $this->voucher = new VoucherModel();
    }
    
    public function getVoucher()
    {
        $text = $_POST['text'];
        $voucher = $this->voucher::where("v_name",$text)->first();
        if(empty($voucher)){
            \log::warn("Voucher: '<b>".$text."</b>' không tồn tại!");
        }else{
            $data = [
                'id' => $voucher['id'],
                'name' => $voucher['v_name'],
                'price' => number_format($voucher['v_price']),
                'count' => $voucher['v_count'],
                'used' => $voucher['v_used'],
                'create' => $voucher['v_create'],
                'arrtive' => $voucher['v_arrtive'],
                'status' => $voucher['v_count'] == 0 ? 'Hết hàng' : "Số lượng còn lại: " . $voucher['v_count']
            ];
            return parent::view("voucher.getVoucher",[
                'voucher' => $data
            ]);
        }
    }
}
