<?php

namespace App\Controllers\Client;

use App\Models\ProductModel;
use App\Models\PropertyModel;

class HomeController extends BaseController
{
    private $product;
    private $property;
    public function __construct()
    {
        $this->product = new ProductModel();
        $this->property = new PropertyModel();
    }

    public function index()
    {
        if(isset($_COOKIE['backLogin'])){
            \log::success("Đã đăng xuất");
        }
        $listProNew = $this->product::where('pro_status', 0)->orderByDesc('id')->limit(5)->get();
        $listHotProduct = $this->product::where('pro_status',0)->orderByDesc('pro_views')->limit(5)->get();
        $listProperty = $this->property
            ::selectRaw('pp_proid, MIN(pp_price) as min_price, MAX(pp_price) as max_price, SUM(pp_buys) as count_buys, SUM(pp_count) as count')
            ->groupBy('pp_proid')
            ->get();

        $listPro = [];
        foreach ($listProNew as $pro) {
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
                    $listPro[] = $pro;
                }
            }
        }
        $listHot = [];
        foreach ($listHotProduct as $pro) {
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
                    $listHot[] = $pro;
                }
            }
        }
        return parent::view("homepage", [
            "listProNew" => $listPro,
            "listProHot" => $listHot,
        ]);
    }
}
