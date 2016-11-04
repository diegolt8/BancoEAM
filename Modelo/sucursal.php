<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Sucursal
 *
 * @author Jordy
 */
class Sucursal {
    //put your code here
    
    private $id;
    private $nombre;
    private $direccion;
    private $muni;
    
    function __construct($id, $nombre, $direccion, $muni) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->muni = $muni;
    }
    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getMuni() {
        return $this->muni;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setMuni($muni) {
        $this->muni = $muni;
    }


    
}
