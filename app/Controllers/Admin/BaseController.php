<?php 
    namespace App\Controllers\Admin;
    use Jenssegers\Blade\Blade;
    class BaseController{
        public function view($path , $data = []){

            $blade = new Blade('resources/views/admin', 'storage');

            echo $blade->make($path, $data)->render();
        }
    }
?>