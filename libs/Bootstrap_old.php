<?php
class Bootstrap
{
    function __construct()
    {
        global $indexController;

        // smarty
        include('libs/smarty/Smarty.class.php');

        $smarty = new Smarty;

        $model = new Model();

        $controller = new Controller();
        $this->$indexController = new IndexController($smarty, $model);

        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = explode("/", $url);

        // If url does not exist, set it to MAIN_VIEW
        $url[0] = ($url[0]) ? $url[0] : MAIN_VIEW;

        // Set root directory
        $pagePath = 'views/' . $url[0];

        // If function $url[0] exists in $indexController
        if (!method_exists($indexController, $url[0])) {

            // If file $url[0]/index.tpl exists
            if (file_exists($pagePath . '/index.tpl')) {

                if (1 == count($url)) {
                    require $pagePath . '/' . ucfirst($url[0]) . 'Controller.php';

                    // Set controller class name
                    $controllerName = ucfirst($url[0]).'Controller';
                    $contentController = new $controllerName;

                    $contentController->init($smarty, $model);
                }

                // Loop parameters of $url
                for ($i=1; $i<count($url); $i++) {

                    // If file $url[i] exists
                    if (file_exists($pagePath . '/' . $url[$i] . '/index.tpl')) {
                        // Set root directory
                        $pagePath = 'views/' . $url[$i] . '/';

                        if ($i + 1 == count($url)) {
                            require $pagePath . '/' . ucfirst($url[$i]) . 'Controller.php';

                            echo "hallo";

                            // Set controller class name
                            $controllerName = ucfirst($url[$i]).'Controller';
                            $contentController = new $controllerName;

                            $contentController->init($smarty, $model);
                        }
                    } else {

                        $controllerPath = $pagePath . '/' . ucfirst($url[$i - 1]) . 'Controller';

                        // If controller does not exist, break loop
                        if (!file_exists($controllerPath . '.php')) break;

                        require $controllerPath . '.php';

                        // Set controller class name
                        $controllerName = ucfirst($url[$i - 1]).'Controller';
                        $contentController = new $controllerName;

                        // If function $url[$i] exists in $contentController
                        if (method_exists($contentController, $url[$i])) {

                            // If last element
                            if ($i + 1 == count($url)) {
                                $contentController->{$url[$i]}();
                            } else {
                                return;
                                // ErrorController "404"
                            }
                            return;
                        } else {
                            return;
                            // ErrorController "404"
                        }
                    }
                }
            }
        } else {
            $indexController->{$url[0]}();
            return;
        }

        function call_ajax_function($url) {
            // Set root directory
            $pagePath = 'views/' . $url[0];

            if (!method_exists($this->$indexController, $url[0])) {
                $this->$indexController->{$url[0]}();
                return false;
            }

            for ($i=1; $i<count($url); $i++) {
                // is last index?
                if ($i!=count($url)-1) {
                    // require $pagePath;

                    // Set controller class name
                    $controllerName = ucfirst($url[$i - 1]).'Controller';
                    $contentController = new $controllerName;

                    if (method_exists($contentController, $url[$i])) {
                        return $contentController->{$url[$i]}();
                    }
                    return false;
                } else {
                    $pagePath = $pagePath.'/'.$url[$i];
                }
            }
        }
        
        function is_ajax_call($url) {
            for ($i=1; $i<count($url); $i++) {

            }
        }

/*
        $controller->viewPage($url[0], $smarty);

        if (file_exists($pagePath . 'index.tpl')) {
            require $pagePath . ucfirst ($url[0]) . 'Controller.php';
        } else {
            // page does not exist
            // return to main page
            $url[0] = MAIN_VIEW;
            require 'views/' . MAIN_VIEW . '/BuchhaltungController.php';
        }

        // controls for whole site
        $siteController = new Controller();

        $controllerName = $url[0] . 'Controller';

        // controls for single page
        $contentController = new $controllerName;

        // calling methods
        if (isset($url[2])) {
            if (method_exists($contentController, $url[1])) {
                $contentController->{$url[1]}($url[2]);
            } else {
                $this->error();
            }
        } else {
            if (isset($url[1])) {
                $contentController->{$url[1]}();
            }
        }

        $controller->viewPage($url[0]);*/
    }
}
?>