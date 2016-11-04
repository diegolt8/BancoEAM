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
class RegistrarEmpleadoDAO {

    //put your code here
    private $con;
    private $object;

    function RegistrarEmpleadoDAO($tipo) {
        if($tipo===1){
            require 'Infraestructura/Conexion.php';
        }else{
        require '../Infraestructura/Conexion.php';
        }     
        $this->object = new Conexion();
        $this->con = $this->object->conectar();
    }

    public function guardar(Usuario $obj) {
        $sql = "insert into empleado(nombre,apellido,nickname,password,cargo) "
                . " values('" . $obj->getNombre() . "','" . $obj->getApellido() .
                "','" . $obj->getNickname() . "','" . md5($obj->getPassword()) .
                "','" . $obj->getCargo() . "');";
//          echo ($sql);

        $resultado = $this->object->ejecutar($sql);
//        echo $resultado;
        $this->object->respuesta($resultado,'GestionEmpleados');
    }

    public function Buscar(Usuario $obj) {
        $sql = "SELECT nombre,apellido,nickname,password,cargo from empleado " . "where nickname='" .
                $obj->getNickname() . "';";
        $resultado = $this->object->ejecutar($sql);
        $this->construirBusqueda($resultado);
    }

    public function construirBusqueda($resultado) {
        $vec = pg_fetch_row($resultado);

        if (isset($vec) && $vec[0] != "") {
            $lista = "nombre=" . $vec[0] . "&&";
            $lista .= "apellido=" . $vec[1] . "&&";
            $lista .= "nickname=" . $vec[2] . "&&";
            $lista .= "password=" . $vec[3] . "&&";
            $lista .= "cargo=" . $vec[4];

            header('Location:../index.php?page=GestionEmpleados&&' . $lista);
        } else {
            $mensaje = "No se encontro informacion";
            header('Location:../index.php?page=GestionEmpleados&&message=' . $mensaje);
        }
    }

    public function modificar(Usuario $obj) {
        $sql = "update empleado set nombre='" . $obj->getNombre() .
                "',apellido='" . $obj->getApellido() . "',nickname='" . $obj->getNickname() . "',password='" .md5($obj->getPassword()) . "',cargo='" . $obj->getCargo() .
                "' where nickname='" . $obj->getNickname() . "'";
        $resultado = $this->object->ejecutar($sql);
        $this->object->respuesta($resultado, 'GestionEmpleados');
    }

    public function eliminar(Usuario $obj) {
        $sql = "delete from empleado where nickname= '". $obj->getNickname()."';";
        $resultado = $this->object->ejecutar($sql);
        $this->object->respuesta($resultado, 'GestionEmpleados');
    }

    public function listar(Usuario $obj) {
        $sql = "select id,nombre,apellido,nickname,password,cargo from empleado";
        $resultado = $this->object->ejecutar($sql);
        $this->construirListado($resultado);
    }

    public function construirListado($resultado) {
        $cadenaHTML = "";
        if ($resultado && pg_num_rows($resultado) > 0) {
            $cadenaHTML = "<table border='1'>";
            $cadenaHTML .="<tr>";
            $cadenaHTML .="<th>ID</th>";
            $cadenaHTML .="<th>Nombre</th>";
            $cadenaHTML .="<th>Apellido</th>";
            $cadenaHTML .="<th>Nickname</th>";
            $cadenaHTML .="<th>Password</th>";
            $cadenaHTML .="<th>Cargo</th>";
            $cadenaHTML .="</tr>";


            for ($cont = 0; $cont < pg_num_rows($resultado); $cont ++) {

                $cadenaHTML .="<tr>";
                $cadenaHTML .= "<td>" . pg_result($resultado, $cont, 0) . "</td>";
                $cadenaHTML .= "<td>" . pg_result($resultado, $cont, 1) . "</td>";
                $cadenaHTML .= "<td>" . pg_result($resultado, $cont, 2) . "</td>";
                $cadenaHTML .= "<td>" . pg_result($resultado, $cont, 3) . "</td>";
                $cadenaHTML .= "<td>" . pg_result($resultado, $cont, 4) . "</td>";
                $cadenaHTML .= "<td>" . pg_result($resultado, $cont, 5) . "</td>";
                $cadenaHTML .="</tr>";
            }

            $cadenaHTML .= "</table>";
        } else {
            $cadenaHTML .= "<b>No hay registros en la base de datos</b>";
        }
        echo $cadenaHTML;
    }

}

