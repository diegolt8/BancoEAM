<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LogIn
 *
 * @author TecnoSystem
 */
class LogIn {
    //put your code here
    
    private $nickname;
    private $password;
    
    function __construct($nickname, $password) {
        $this->nickname = $nickname;
        $this->password = $password;
    }

    function getNickname() {
        return $this->nickname;
    }

    function getPassword() {
        return $this->password;
    }

    function setNickname($nickname) {
        $this->nickname = $nickname;
    }

    function setPassword($password) {
        $this->password = $password;
    }


    
}
