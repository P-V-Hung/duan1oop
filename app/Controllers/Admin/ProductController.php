<?php

namespace App\Controllers\Admin;

use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\ProCatModel;
use App\Models\ProImgModel;
use App\Models\PropertyModel;

class ProductController extends BaseController
{

    private $cate;
    private $product;
    private $property;
    private $proCat;
    private $proImg;

    public function __construct()
    {
        $this->cate = new CategoryModel();
        $this->product = new ProductModel();
        $this->property = new PropertyModel();
        $this->proCat = new ProCatModel();
        $this->proImg = new ProImgModel();
    }

    public function index()
    {
        if (isset($_COOKIE['thongbao'])) {
            \log::success('Sản phẩm không còn biến thể nên đã bị xóa');
        }
        return parent::view("product.index");
    }
    public function addPro()
    {
        return parent::view("product.addPro");
    }
    public function saveAdd()
    {
        $img = $_FILES['img'];
        $imgName = "";
        if ($img['size'] > 0) {
            $imgName = rand() . $img['name'];
            move_uploaded_file($img['tmp_name'], "./public/uploads/" . $imgName);
        }

        $data = [
            'pro_name' => $_POST['pro_name'],
            'pro_img' => $imgName ?? null,
            'del_price' => $_POST['del_price'] ?? null,
            'pro_desc' => $_POST['pro_desc'],
            'pro_status' => $_POST['pro_status'],
        ];

        $idpro = $this->product->insertGetId($data);

        $data = [
            'pp_proid' => $idpro,
            'pp_price' => $_POST['pp_price'],
            'pp_color' => $_POST['pp_color'],
            'pp_size' => $_POST['pp_memory'],
            'pp_count' => $_POST['pp_count'],
        ];
        $property = $this->property->fill($data);
        $property->save();

        $imgs = $_FILES['imgs'];
        for ($i = 0; $i < count($imgs['name']); $i++) {
            if ($imgs['size'][$i] > 0) {
                $imgName = rand() . $imgs['name'][$i];
                move_uploaded_file($imgs['tmp_name'][$i], "./public/uploads/" . $imgName);
                $data = [
                    'proid' => $idpro,
                    'img' => $imgName
                ];
                $proImg = new ProImgModel();
                $proImg->fill($data);
                $proImg->save();
            }
        }

        $listIdCat = array_filter($_POST, function ($key) {
            return strpos($key, 'cate') !== false;
        }, ARRAY_FILTER_USE_KEY);
        $listIdCat = array_values($listIdCat);
        for ($i = 0; $i < count($listIdCat); $i++) {
            $data = [
                'pc_idpro' => $idpro,
                'pc_idcat' => $listIdCat[$i]
            ];
            $proCat = new ProCatModel();
            $proCat->fill($data);
            $proCat->save();
        }
        \log::success("Thêm sản phẩm thành công");
    }
    public function getCat()
    {
        $listCatPro = [];
        if (isset($_POST['idpro']) && $_POST['idpro'] != 0) {
            $listCatPro = $this->proCat::where("pc_idpro", $_POST['idpro'])->get();
        }
        if (isset($_POST['idparent']) && $_POST['idparent'] != 0) {
            $category = $this->cate::find($_POST['idparent']);
            $listCatParent = $this->cate::where("cat_idparent", $_POST['idparent'])->get();
            return parent::view("product.getCat", [
                'listCat' => $listCatParent,
                'listCatPro' => $listCatPro,
                'category' => $category,
                'class' => "",
            ]);
        }
        $listCat = $this->cate::where("cat_idparent", $_POST['idparent'])->get();
        return parent::view("product.getCat", [
            'listCat' => $listCat,
            'listCatPro' => $listCatPro,
            'class' => "checkCatChild",
        ]);
    }

    public function getCurent()
    {
        $proCount = $this->product::count();
        $count = ceil($proCount / $_POST['size']);
        return parent::view('product.getCurent', [
            'count' => $count,
            'pageToday' => $_POST['pageToday'] ?? 1
        ]);
    }

    public function getData()
    {
        $index = ($_POST['page'] - 1) * $_POST['size'];
        $size = $_POST['size'];
        $listProduct = $this->product::offset($index)->limit($size)->get();
        $listProperty = $this->property
            ::selectRaw('pp_proid, MIN(pp_price) as min_price, MAX(pp_price) as max_price, SUM(pp_buys) as count_buys, SUM(pp_count) as count')
            ->groupBy('pp_proid')
            ->get();

        $listPro = [];
        foreach ($listProduct as $pro) {
            foreach ($listProperty as $p) {
                if ($pro['id'] === $p['pp_proid']) {
                    if ($pro['pro_status'] == 0) {
                        $status = "Đang bán";
                    } else {
                        $status = "Ngừng bán";
                    }
                    $pro = [
                        'id' => $pro['id'],
                        'img' => $pro['pro_img'],
                        'name' => $pro['pro_name'],
                        'del_price' => $pro['del_price'],
                        'min_price' => number_format($p['min_price']),
                        'max_price' => number_format($p['max_price']),
                        'buys' => $p['count_buys'],
                        'status' => $status,
                        'count' => $p['count'],
                    ];
                    $listPro[] = $pro;
                }
            }
        }
        return parent::view("product.getData", [
            'listProduct' => $listPro
        ]);
    }

    public function info()
    {
        $id = $_POST['id'];
        $product = $this->product::find($id);
        $listProperty = $this->property::where("pp_proid", $id)->get();
        return parent::view("product.info", [
            'listProperty' => $listProperty,
            'product' => $product
        ]);
    }

    public function addProperty()
    {
        $product = $this->product::find($_POST['id']);
        return parent::view("product.addProperty", [
            'product' => $product
        ]);
    }

    public function saveAddProperty()
    {
        $data = [
            'pp_proid' => $_POST['idpro'],
            'pp_price' => $_POST['price'],
            'pp_color' => $_POST['color'],
            'pp_size' => $_POST['size'],
            'pp_count' => $_POST['count'],
        ];
        $property = $this->property->fill($data);
        $property->save();
        \log::success('Thêm biến thể thành công');
    }

    public function delProperty()
    {
        $id = $_POST['id'];
        $idpro = $_POST['idpro'];
        $this->property->destroy($id);
        $listProperty = $this->property::where("pp_proid", $idpro)->get();
        if ($listProperty->isEmpty()) {
            $listImg = $this->proImg::where("proid", $idpro)->get();
            $listCat = $this->proCat::where("pc_idpro", $idpro)->get();
            $listIdImg = [];
            $listIdCat = [];
            foreach ($listImg as $img) {
                $listIdImg[] = $img['id'];
                unlink("./public/uploads/" . $img['img']);
            }
            foreach ($listCat as $cat) {
                $listIdCat[] = $cat['id'];
            }
            $this->proImg::destroy($listIdImg);
            $this->proCat::destroy($listIdCat);
            $product = $this->product->findOrFail($idpro);
            $file = "./public/uploads/" . $product['pro_img'];
            if (is_file($file)) {
                unlink($file);
            }
            $this->product::destroy($idpro);
            setcookie('thongbao', true, time() + 2);
            echo '<script>window.location.reload();</script>';
        } else {
            \log::success('Xóa biến thể thành công');
        }
    }

    public function editPro()
    {
        if(isset($_COOKIE['thongbao'])){
            \log::success('Xóa ảnh thành công');
        }
        $product = $this->product::find($_GET['id']);
        $listImg = $this->proImg::where("proid", $_GET['id'])->get();
        $listCat = $this->proCat::where("pc_idpro", $_GET['id'])->get();
        return parent::view("product.editPro", [
            'product' => $product,
            'listImg' => $listImg,
            'listCat' => $listCat
        ]);
    }

    public function saveEditPro()
    {
        $product = $this->product::find($_POST['idpro']);
        $img = $_FILES['img'];
        $imgs = $_FILES['imgs'];
        $imgName = rand() . $img['name'];
        if (move_uploaded_file($img['tmp_name'], './public/uploads/' . $imgName)) {
            $imgName = $imgName;
            $file = "./public/uploads/" . $product['pro_img'];
            if (is_file($file)) {
                unlink($file);
            }
        } else {
            $imgName = $product['pro_img'];
        }
        $data = [
            'pro_name' => $_POST['pro_name'],
            'pro_img' => $imgName,
            'del_price' => $_POST['del_price'],
            'pro_desc' => $_POST['pro_desc'],
            'pro_status' => $_POST['pro_status'],
        ];
        $product->update($data);
        for ($i = 0; $i < count($imgs['name']); $i++) {
            if ($imgs['size'][$i] > 0) {
                    $imgName = rand().$imgs['name'][$i];
                    move_uploaded_file($imgs['tmp_name'][$i],'./public/uploads/'.$imgName);
                    $data = [
                        'proid' => $_POST['idpro'],
                        'img' => $imgName
                    ];
                    $proImg = new ProImgModel();
                    $proImg->fill($data);
                    $proImg->save();
            }
        }

        $listIdCat = array_filter($_POST, function ($key) {
            return strpos($key, 'cate') !== false;
        }, ARRAY_FILTER_USE_KEY);
        $this->proCat::where("pc_idpro",$_POST['idpro'])->delete();
        foreach($listIdCat as $idCat){
            $proCat = new ProCatModel();
            $data = [
                'pc_idpro' => $_POST['idpro'],
                'pc_idcat' => $idCat
            ];
            $proCat->fill($data);
            $proCat->save();
        }
        \log::success("Cập nhật thành công");
        
    }


    public function editProperty(){
        $product = $this->product::where("id",$_POST['idpro'])->first();
        $property = $this->property::where("id",$_POST['id'])->first();
        return parent::view("product.editProperty",[
            'product' => $product,
            'property' => $property
        ]);
    }

    public function saveEditProperty(){
        $property = $this->property->find($_POST['id']);
        $data = [
            'pp_price' => $_POST['price'], 
            'pp_color' => $_POST['color'], 
            'pp_size' => $_POST['size'], 
            'pp_count' => $_POST['count']
        ];
        $property->update($data);
        \log::success("Cập nhật biến thể thành công");
    }

    public function delImg(){
        $imgModel = new ProImgModel();
        $img = $imgModel::find($_POST['id']);
        $file = './public/uploads/'.$img['img'];
        if(is_file($file)){
            unlink($file);
        }
        $img->delete();
        setcookie('thongbao',true,time()+1);
    }
}
