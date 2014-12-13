<?php

class User {
    private $login;
    private $password;
    function __construct($login, $password) {
        $this->login = $login;
        $this->password = $password;
    }
    function getLogin() {
        return $this->login;
    }

    function getPassword() {
        return $this->password;
    }



}
