<?php

    class App 
    { 

        protected $controller = 'AdminController';
        protected $method = 'index';
        protected $params = [];
 
        public function __construct()
        {
            $url = $this->parseUrl();

            // Controller
            if($url != null){
                if(file_exists('app/controller/'. $url[0] . '.php')){
                    $this->controller = $url[0];
                    unset($url[0]);
                }
            }

            require_once 'app/controller/' . $this->controller . '.php';
            $this->controller = new $this->controller;

            // Method
            if(isset($url[1])){
                if(method_exists($this->controller, $url[1])){
                    $this->method = $url[1];
                    unset($url[1]);
                }
            }

            // Params
            if(!empty($url)){
                $this->params = array_values($url);
            }

            // Run Controller & Method and send params in exist
            call_user_func_array([$this->controller, $this->method], $this->params);

        }

        public function parseUrl(){
            if(isset($_GET['url'])){
                $url = rtrim($_GET['url'], '/');
                $url = filter_var($url, FILTER_SANITIZE_URL);
                $url = explode('/', $url);
                return $url;
            }
        }

    }
    