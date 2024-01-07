<?php

namespace App\Controllers\Admin;

use App\Models\CategoryModel;

class CategoryController extends BaseController
{

    public $cate;

    public function __construct()
    {
        $this->cate = new CategoryModel();
    }

    public function index()
    {
        return parent::view("category.index");
    }

    public function getData()
    {
        $id = $_POST['idparent'];
        $listCat = $this->cate->where("cat_idparent",$id)->orderBy('id','desc')->get();
        return parent::view("category.getData",[
            'listCat' => $listCat
        ]);
    }
    public function findData()
    {
        $id = $_POST['id'];
        $cat = $this->cate->where("id",$id)->first();
        echo $cat['cat_idparent'];
    }

    public function addData()
    {
        $data = [
            "cat_name" => $_POST['catName'],
            "cat_idparent" => $_POST['idparent']
        ];
        $this->cate->fill($data);
        $this->cate->save();
        \log::success('Thêm danh mục thành công');
    }
    public function editData()
    {
        $id = $_POST['id'];
        $data = [
            $_POST['column'] => $_POST['text'],
        ];
        $cat = $this->cate->find($id);
        // $cat->fill($data);
        // $cat->save();
        $cat->update($data);
        \log::success('Cập nhật thành công');
    }

    public function deleteData()
    {
        $id = $_POST['id'];
        $listCat = $this->cate->where("cat_idparent",$id)->orderBy('id','desc')->get();
        if($listCat->isEmpty()){
            $this->cate->remove($id);
            \log::success('Xóa danh mục thành công');
        }else{
            \log::error('Vui lòng xóa hết các danh mục con');
        }
    }
}
