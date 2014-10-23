<?php
/**
 * Created by PhpStorm.
 * User: Christoph
 * Date: 18.05.14
 * Time: 23:39
 */

class Error extends Controller {
    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->view->msg = 'Diese Seite existiert nicht';
        $this->view->render('error/index');
    }
} 