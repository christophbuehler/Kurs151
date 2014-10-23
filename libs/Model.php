<?php
class Model {
    function __construct() {
        $this->db = new Database();
    }

    public function login() {
        $sth = $this->db->prepare("SELECT id FROM users WHERE
            login = :login AND password = MD5(:password)");

        $sth->execute(array(
            ':login' => $_POST['login'],
            ':password' => $_POST['password']
        ));

        $count = $sth->rowCount();
        if ($count > 0) {
            // login
            Session::init();
            Session::set('loggedIn', true);
            // header('location: ../');
        } else {
            // show an error!
            header('location: ../login');
        }
    }
}