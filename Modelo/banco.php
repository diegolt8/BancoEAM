<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of banco
 *
 * @author Vitaly
 */
class banco {
   private $nombre;
   private $nit;
   private $mision;
   private $vision;
   private $sede;
   
   function __construct($nombre, $nit, $mision, $vision, $sede) {
       $this->nombre = $nombre;
       $this->nit = $nit;
       $this->mision = $mision;
       $this->vision = $vision;
       $this->sede = $sede;
   }
   function getNombre() {
       return $this->nombre;
   }

   function getNit() {
       return $this->nit;
   }

   function getMision() {
       return $this->mision;
   }

   function getVision() {
       return $this->vision;
   }

   function getSede() {
       return $this->sede;
   }

   function setNombre($nombre) {
       $this->nombre = $nombre;
   }

   function setNit($nit) {
       $this->nit = $nit;
   }

   function setMision($mision) {
       $this->mision = $mision;
   }

   function setVision($vision) {
       $this->vision = $vision;
   }

   function setSede($sede) {
       $this->sede = $sede;
   }
}
