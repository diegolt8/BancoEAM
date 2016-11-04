<?php

class JuntaDirectiva{
	
	private $nombre;
	private $apellido;
	private $cedula;
	private $fechaNac;
	private $ciudadNac;
	
	function JuntaDirectiva($nombre,$apellido,$cedula,$fechaNac,$ciudadNac){
		$this->nombre = $nombre;
		$this->apellido = $apellido;
		$this->cedula = $cedula;
		$this->fechaNac = $fechaNac;
		$this->ciudadNac = $ciudadNac;
	}
	
	public function getNombre(){
		return $this->nombre;
	}
	
	public function setNombre($nombre){
		$this->nombre = $nombre;
	}
	
	public function getApellido(){
		return $this->apellido;
	}
	
	public function setApellido($apellido){
		$this->apellido = $apellido;
	}
	
	public function getCedula(){
		return $this->cedula;
	}
	
	public function setCedula($cedula){
		$this->cedula = $cedula;
	}
	
	public function getFechaNac(){
		return $this->fechaNac;
	}
	
	public function setFechaNac($fechaNac){
		$this->fechaNac = $fechaNac;
	}
	
	public function getCiudadNac(){
		return $this->ciudadNac;
	}
	
	public function setCiudadNac($ciudadNac){
		$this->ciudadNac = $ciudadNac;
	}
	
}

?>