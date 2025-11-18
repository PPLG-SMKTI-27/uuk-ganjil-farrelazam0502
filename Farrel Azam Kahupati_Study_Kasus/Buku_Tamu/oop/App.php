<?php
namespace oop;

class App {
    protected $controller = 'HomeController';
    protected $method = 'index';
    protected $params = [];

    public function __construct() {
        $url = $this->parseUrl();

        // Cek controller ada di folder Controller
        if (isset($url[0])) {
            $controllerName = 'App\\Controller\\' . ucfirst($url[0]) . 'Controller';
            if (class_exists($controllerName)) {
                $this->controller = $controllerName;
                unset($url[0]);
            }
        }

        // Instansiasi controller
        $this->controller = new $this->controller;

        // Method
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // Params
        $this->params = $url ? array_values($url) : [];

        // Jalankan controller dan method dengan params
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    private function parseUrl() {
        if (isset($_GET['url'])) {
            // Contoh url = kunjungan/edit/1
            return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
        return [];
    }
}
