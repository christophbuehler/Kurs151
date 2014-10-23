<?php
    require_once('');

    $onyx = new Onyx();

    class Onyx extends PDO
    {
        public function __construct() {

        }

        public function setDatabase($host, $user, $password) {
            $this->$host = $host;
            $this->$user = $user;
            $this->$password = $password;
        }
    }
?>