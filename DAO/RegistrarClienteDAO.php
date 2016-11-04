<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RegistrarClienteDAO
 *
 * @author TecnoSystem
 */
class RegistrarClienteDAO {
    //put your code here
    private $con;
    private $object;
    
     function RegistrarClienteDAO() {
        require '../Infraestructura/Conexion.php';
        $this->object = new Conexion();
        $this->con = $this->object->conectar();
    }
    
     public function guardar(Cliente $obj) {


        $sql = "insert into cliente(nombre,apellido,cedula,nickname,password) "
                . "values('" . $obj->getNombre() . "','" . $obj->getApellido() .
                "','" . $obj->getCedula(). "','" . $obj->getNickname() . "','" .md5($obj->getPassword()) . "' );";
//         echo ($sql);
        
        $resultado = $this->object->ejecutar($sql);
//        echo $resultado;
        $this->object->respuesta($resultado, 'index');
}


    }