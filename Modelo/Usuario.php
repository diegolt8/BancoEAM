<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author TecnoSystem
 */
class Usuario {
    //put your code here
    
    private $id;
    private $nombre;
    private $apellido;
    private $nickname;
    private $password;
    private $cargo;
    
    
    function __construct($id, $nombre, $apellido, $nickname, $password, $cargo) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->nickname = $nickname;
        $this->password = $password;
        $this->cargo = $cargo;
    }

    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellido() {
        return $this->apellido;
    }

    function getNickname() {
        return $this->nickname;
    }

    function getPassword() {
        return $this->password;
    }

    function getCargo() {
        return $this->cargo;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    function setNickname($nickname) {
        $this->nickname = $nickname;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setCargo($cargo) {
        $this->cargo = $cargo;
    }


    
    
    
}
