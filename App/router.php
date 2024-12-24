<?php

class Router {
    private $controller;
    private $method;

    public function __construct(){
        $this->matchRoute();
    }

    public function matchRoute(){
        $url = explode("/", URL);
        $this->controller = !empty($url[1]) ? $url[1] : "render";
        $this->method = !empty($url[2]) ? explode('?', $url[2])[0] : "inicio";
        
        $this->controller = $this->controller . "Controller";

        require_once(__DIR__ . "/Controller/" . $this->controller . ".php");

    }

    public function run(){
        $db = new Database();
        $connection = $db->getConnection();
        $controller = new $this->controller($connection);
        $method = $this->method;

        if (method_exists($controller, $method)) {

            $id = isset($_GET['id']) ? $_GET['id'] : null;

            if ($id) {
                $controller->$method($id);
            } else {
                $controller->$method();
            }
        } else {
            echo "El método $method no existe en el controlador $this->controller.";
        }
    }
}


?>