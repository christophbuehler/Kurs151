<?php
class Bootstrap
{
    function __construct()
    {
        error_reporting(E_ALL);
        ini_set('display_errors', 'On');

        // error handling
        require 'ErrorController.php';
        $this->error = new ErrorController;

        // smarty
        include('libs/smarty/Smarty.class.php');
        $this->smarty = new Smarty;

        // model
        $this->model = new Model();

	

        // url parts
        $url = isset($_GET['url']) ? $_GET['url'] : null;

        // capitalize every letter after dash or space
        $url = preg_replace_callback('/(?<=( |-))./',
            function ($m) { return strtoupper($m[0]); }, $url);

        // delete dashes and spaces
        $url = str_replace('-', '', str_replace(' ', '', $url));

        $url = rtrim($url, '/');
        $url = explode("/", $url);

        $this->indexController = new IndexController($this->smarty, $this->model, $url, $this->error);

        // $logged = $this->indexController->isLoggedIn();

        // If url does not exist, set it to MAIN_VIEW
        $url[0] = ($url[0]) ? $url[0] : MAIN_VIEW;

        $path='';
        foreach ($url as $pathPart) {
            $path = $path . $pathPart . '/';
        }

        define('PAGE_PATH', $path);
        define('PAGE_NAME', $url[count($url) - 1]);

        $this->indexController->init();

        // catch page ajax calls
        $ajax_call = $this->call_page_ajax_function($url);

        // if an ajax function has been called
        if ($ajax_call) exit;

        // catch extension ajax calls
        $ajax_call = $this->call_extension_ajax_function($url);

        // if an ajax function has been called
        if ($ajax_call) exit;

        $controller = $this->get_page_controller($url);

        // if no page was found
        if ($controller == false) {
            $this->error->page_load('Page does not exist.');
            exit;
        }

        // initialize extensions
        $extensions = $this->require_extensions();

        $controller->init();

        $controller->initResources();

        $controller->addCssDirs($extensions);

        $controller->addJsDirs($extensions);

        $controller->viewPage();
    }

    function call_page_ajax_function($url) {
        // Set root directory
        $pagePath = 'views/' . $url[0];

        if (method_exists($this->indexController, $url[0])) {
            echo $this->indexController->{$url[0]}();
            return true;
        }

        for ($i=1; $i < count($url); $i++) {
            // is not last index?
            if ($i != count($url)) {
                // Set controller class name
                $controllerName = ucfirst($url[$i - 1]) . 'Controller';

                if (!file_exists($pagePath .'/'. $controllerName . '.php')) return false;

                require $pagePath .'/'. $controllerName . '.php';
                $contentController = new $controllerName($this->smarty, $this->model, $url, $this->error);
                if (method_exists($contentController, $url[$i])) {
                    $params = explode(',', (isset($_GET['p']) ? $_GET['p'] : ''));
    
                    // echo call_user_func_array($contentController->{$url[$i]}, $params);
		    echo call_user_func_array(array($contentController, $url[$i]), $params);

                    // echo $contentController->{$url[$i]}();
                    return true;
                }
                return false;
            } else {
                $pagePath = $pagePath.'/'.$url[$i];
            }
        }
        return false;
    }

    function call_extension_ajax_function($url) {
        $pagePath = 'extensions/' . $url[0];

        if (count($url) != 2) return false;

        $controllerName = ucfirst($url[0]) . 'Functions';
        require $pagePath .'/'. $controllerName . '.php';

        $extensionController = new $controllerName($this->smarty, $this->model, $url, $this->error);

        if (method_exists($extensionController, $url[1])) {

            $params = explode(',', (isset($_GET['p']) ? $_GET['p'] : ''));
            echo call_user_func_array(array($extensionController, $url[1]), $params);

            // echo $extensionController->{$url[1]}();
            return true;
        }
        return false;
    }

    function get_page_controller($url) {
        // Set root directory
        $pagePath = 'views/' . $url[0];

        for ($i=1; $i<count($url); $i++) {
            $pagePath = $pagePath.'/'.$url[$i];
        }

        if (!file_exists($pagePath . '/index.tpl')) return false;

        $controllerName = ucfirst($url[count($url) - 1]) . 'Controller';

        require $pagePath . '/' . $controllerName . '.php';

        // controls for page render
        return new $controllerName($this->smarty, $this->model, $url, $this->error);
    }

    function require_extensions() {
        $extensions = Array();
        foreach(glob('extensions/*') as $file) {
            if (filetype($file) != 'dir') continue;
            $controllerPath = $file . '/' . ucfirst(basename($file)) . '.php';
            if (!is_file($controllerPath)) continue;
            include($controllerPath);
            array_push($extensions, $file . '/');
        }
        return $extensions;
    }
}
?>