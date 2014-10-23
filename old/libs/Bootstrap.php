<?php

class Bootstrap
{
    function __construct()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = explode("/", $url);
        if ($url == "") return;

        if (empty($url[0])) {
            $url[0] = 'index';
        }
		
        $file = 'controllers/' . $url[0] . '.php';

        if (file_exists($file)) {
            require $file;
        } else {
            require 'controllers/error.php';
            $url[0] = 'error';
        }

        $controller = new $url[0];
        $controller->loadModel($url[0]);

        // calling methods
        if (isset($url[2])) {
            if (method_exists($controller, $url[1])) {
                $controller->{$url[1]}($url[2]);
            } else {
                $this->error();
            }
        } else {
            if (isset($url[1])) {
                $controller->{$url[1]}();
            }
        }

        $controller->index();
    }
}
?>