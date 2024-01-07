<?php 
    namespace App\Controllers\Client;
    use Jenssegers\Blade\Blade;
    class BaseController{
        public function view($path , $data = []){

            $blade = new Blade('resources/views/client', 'storage');

            echo $blade->make($path, $data)->render();
        }
    }
?>