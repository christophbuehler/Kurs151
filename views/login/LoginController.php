<?php
class LoginController extends Controller {
    function init() {
        // assign page name
        $this->smarty->assign('test', "das ist ein test...");

        $id = 10;

        if (Session::get('loggedIn')) {
            header('location: ' . MAIN_VIEW);
        }
    }
    function test() {
        echo '{ "name" : "Urs", "age" : "92" }';
    }
}