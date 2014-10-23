<?php
class IndexController extends Controller {
    function init() {
        /* This is executed before everything else
         * */
        $objDateTime = new DateTime('NOW');
        $this->smarty->assign('date', $objDateTime->format( 'd.m.Y' ));
    }

    function is_logged_in() {
        return Session::get('loggedIn');
    }

    function blog() {
        return "Dies ist ein Ajax Aufruf.";
    }

    function check_login() {
        // ensure user is logged out
        if (Session::get('loggedIn')) {
            Session::set('loggedIn', false);
        }

        // required fields
        if (!isset($_POST['login-name'])) return 1;
        if (!isset($_POST['login-pass'])) return 2;

        $login = $_POST['login-name'];
        $pass = $_POST['login-pass'];

        // password too short
        if (strlen($login) < 5) return 3;

        // database
        $db = $this->model->db;

        // login query
        $sth = $db->prepare("SELECT * FROM user WHERE
            login = :login AND password = :password");

        $sth->execute(array(
            ':login' => $login,
            ':password' => $pass
        ));

        $count = $sth->rowCount();

        // bad login
        if ($count == 0) return 4;

        $result = $sth->fetchAll()[0];

        Session::set('loggedIn', true);
        Session::set('userId', $result['id']);
        Session::set('login', $result['login']);
        // Session::set('role', $result['rechte_gruppe_id']);

        return false;
    }

    function logout() {
        Session::set('loggedIn', false);
        header('location: ' . LOGIN_VIEW);
        return false;
    }
}