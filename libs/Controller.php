<?php
class Controller {
    function __construct($smarty, $model, $pathArray, $error) {
        $this->smarty = $smarty;
        $this->model = $model;
        $this->error = $error;

        $this->cssDirs = array();
        $this->jsDirs = array();

        Session::init();

        if ($this->is_logged_in()) {
            $this->smarty->assign('userName', Session::get('userName'));
            $this->smarty->assign('role', Session::get('role'));
            return;
        }

        $this->smarty->assign('userName', 'anonymous');
    }

    function initResources() {
        require('views/' . PAGE_NAME . '/config.php');

        $this->css = array(
            'global/css/', // global
            'templates/' . TEMPLATE . '/css/', // template
            'views/' . PAGE_NAME . '/css/' // page
        );

        $this->js = array(
            'global/js/', // global
            'templates/' . TEMPLATE . '/js/', // template
            'views/' . PAGE_NAME . '/js/' // page
        );
    }

    function is_logged_in() {
        return Session::get('loggedIn');
    }

    function redirect_to_login_page() {
        Session::destroy();
        header('location: ' . LOGIN_VIEW);
        exit;
    }

    public function addCssDirs($directories) {
        foreach ($directories as $dir) {
            for ($i=0; $i<count($this->css); $i++) {
                if ($this->css[$i] == $dir . 'css/') continue 2;
            }
            array_push($this->css, $dir . 'css/');
        }
    }

    public function addJsDirs($directories) {
        foreach ($directories as $dir) {
            for ($i=0; $i<count($this->js); $i++) {
                if ($this->js[$i] == $dir . 'js/') continue 2;
            }
            array_push($this->js, $dir . 'js/');
        }
    }

    public function viewPage() {
        /* error handling before evaluation */

        // check if template has a value
        if (trim(TEMPLATE) == "") {
            $this->error->template_load('No template name set for this page.');
            exit;
        }

        // check if template exists
        if (!is_dir('templates/' . TEMPLATE)) {
            $this->error->template_load('Template "' . TEMPLATE . '" does not exist. Check the corresponding config file.');
            exit;
        }

        // check if header exists
        if (!file_exists('templates/' . TEMPLATE . '/header.tpl')) {
            $this->error->template_load('Template "' . TEMPLATE . '" has no header.');
            exit;
        }

        // check if page has a template
        if (!file_exists('views/' . PAGE_NAME . '/index.tpl')) {
            $this->error->template_load('This page has no main template.');
            exit;
        }

        // check if footer exists
        if (!file_exists('templates/' . TEMPLATE . '/footer.tpl')) {
            $this->error->template_load('Template "' . TEMPLATE . '" has no footer.');
            exit;
        }

        /* variable assignment */

        // assign page name
        $this->smarty->assign('page_name', PAGE_NAME);

        // assign title
        $this->smarty->assign('title', TITLE);

        // assign css files
        $this->smarty->assign('css_files', $this->getStyles($this->css));

        // assign js files
        $this->smarty->assign('js_files', $this->getScripts($this->js));

        /* page load */

        // load header
        $this->smarty->display('templates/' . TEMPLATE . '/header.tpl');

        // load content
        $this->smarty->display('views/' . PAGE_NAME . '/index.tpl');

        // load footer
        $this->smarty->display('templates/' . TEMPLATE . '/footer.tpl');
    }

    private function getStyles($directories) {
        $styles = array();
        foreach ($directories as $dir) {
            // check if directory exists
            if (!is_dir($dir)) continue;
            foreach (glob($dir . "*.css") as $css) {
                array_push($styles, $css);
            }
        }
        return $styles;
    }

    private function getScripts($directories) {
        $scripts = array();
        foreach ($directories as $dir) {
            // check if directory exists
            if (!is_dir($dir)) continue;
            foreach (glob($dir . "*.js") as $js) {
                array_push($scripts, $js);
            }
        }
        return $scripts;
    }

    /*private function getScripts($directories) {
        $scripts = array();
        foreach (glob($directory . "*.js") as $js) {
            array_push($scripts, $js);
        }
        return $scripts;
    }*/

    /*public function loadModel($name) {
        $path = 'models/' . $name . '_model.php';
        if (file_exists($path)) {
            require $path;

            $modelName = $name . '_Model';
            $this->model = new $modelName();
        }
    }*/
}