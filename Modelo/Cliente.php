<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cliente
 *
 * @author Vitaly
 */
class Cliente {
    private $nombre;
    private $apellido;
    private $cedula;
    private $nickname;
    private $password;
    
    function __construct($nombre, $apellido, $cedula, $nickname, $password) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->cedula = $cedula;
        $this->nickname = $nickname;
        $this->password = $password;
    }
    function getNombre() {
        return $this->nombre;
    }

    function getApellido() {
        return $this->apellido;
    }

    function getCedula() {
        return $this->cedula;
    }

    function getNickname() {
        return $this->nickname;
    }

    function getPassword() {
        return $this->password;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    function setCedula($cedula) {
        $this->cedula = $cedula;
    }

    function setNickname($nickname) {
        $this->nickname = $nickname;
    }

    function setPassword($password) {
        $this->password = $password;
    }
}
