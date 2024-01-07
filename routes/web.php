<?php
    class Router{
        
        private $data;
        
        public function __construct()
        {
            $this->data = [];
        }

        public function get($path, $callback){
            $this->data['get'][$path] = $callback;   
        }

        public function post($path, $callback){
            $this->data['post'][$path] = $callback;
        }

        public function getUrl(){
            $url = $_SERVER['REQUEST_URI'];
            $index = strpos($url,'?');
            $url = empty($index) ? $url : substr($url,0,$index); 
            $url = strtolower($url);
            return $url;
        }

        public function getMethod(){
            $method = $_SERVER['REQUEST_METHOD'];
            return strtolower($method);
        }

        public function resolve(){
            $url = $this->getUrl();
            $method = $this->getMethod();
            if(!isset($this->data[$method][$url])){
                $array = [App\Controllers\Client\HomeController::class,'index'];
            }else{
                $array = $this->data[$method][$url];
            }
            $class = $array[0];
            $callback = $array[1]; 
            call_user_func([new $class,$callback]);
        }
    }
?>