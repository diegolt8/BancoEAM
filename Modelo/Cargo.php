<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cargo
 *
 * @author TecnoSystem
 */
class Cargo {
    //put your code here
    
    private $id;
    private $nombre;
    private $salario;
    private $intensidad;
    private $descripcion;
    
    
    
    function __construct($id, $nombre, $salario, $intensidad, $descripcion) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->salario = $salario;
        $this->intensidad = $intensidad;
        $this->descripcion = $descripcion;
    }

    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getSalario() {
        return $this->salario;
    }

    function getIntensidad() {
        return $this->intensidad;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setSalario($salario) {
        $this->salario = $salario;
    }

    function setIntensidad($intensidad) {
        $this->intensidad = $intensidad;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }


    
}
