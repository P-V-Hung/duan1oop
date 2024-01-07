<?php 
    namespace App\Controllers\Admin;
    class AdminController extends BaseController{
        public function index(){
            return parent::view('homepage');
        }
    }
?>