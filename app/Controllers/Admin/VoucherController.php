<?php

namespace App\Controllers\Admin;

use App\Models\VoucherModel;
use Symfony\Component\Mime\Address;

class VoucherController extends BaseController
{
    private $voucher;

    public function __construct()
    {
        $this->voucher = new VoucherModel();
    }
    public function addVoucher()
    {
        $returnView = parent::view("voucher.addVoucher");
        if(isset($_COOKIE['thongbao'])){
            \log::success('Thêm voucher thành công');
        }
        return $returnView;
    }
    public function saveAddVoucher()
    {
        $data = [
            'v_name' => $_POST['v_name'],
            'v_price' => $_POST['v_price'],
            'v_count' => $_POST['v_count'],
            'v_used' => 0,
            'v_create' => $_POST['v_create'],
            'v_arrtive' => $_POST['v_arrtive'],
        ];
        $this->voucher->fill($data);
        $this->voucher->save();
        setcookie('thongbao', true, time() + 2);
        header("location: /admin/voucher/add");
    }
}
