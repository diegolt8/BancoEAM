<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PaisDAO
 *
 * @author TecnoSystem
 */
class PaisDAO {
    //put your code here
    
    
    private $con;
    private $object;

    function PaisDAO($tipo) {
        if ($tipo === 1) {
            require 'Infraestructura/Conexion.php';
        } else {
            require '../Infraestructura/Conexion.php';
        }
        $this->object = new Conexion();
        $this->con = $this->object->conectar();
    }

    public function guardar(Pais $obj) {
        $sql = "insert into pais(nombre,descripcion) "
                . " values('" . $obj->getNombre() . "','". $obj->getDescripcion() . "');";
//          echo ($sql);

        $resultado = $this->object->ejecutar($sql);
//        echo $resultado;
        $this->object->respuesta($resultado, 'Pais');
    }

    public function Buscar(Pais $obj) {
        $sql = "SELECT nombre,descripcion from pais " . "where nombre='" .
                $obj->getNombre() . "';";
        $resultado = $this->object->ejecutar($sql);
        $this->construirBusqueda($resultado);
    }

    public function construirBusqueda($resultado) {
        $vec = pg_fetch_row($resultado);

        if (isset($vec) && $vec[0] != "") {
            $lista = "nombre=" . $vec[0] . "&&";
            $lista .= "descripcion=" . $vec[1];

            header('Location:../index.php?page=Pais&&' . $lista);
        } else {
            $mensaje = "No se encontro informacion";
            header('Location:../index.php?page=Pais&&message=' . $mensaje);
        }
    }

    public function modificar(Pais $obj) {
        $sql = "update pais set nombre='" . $obj->getNombre() ."',descripcion='" . $obj->getDescripcion() .
                "' where nombre='" . $obj->getNombre() . "'";
        $resultado = $this->object->ejecutar($sql);
        $this->object->respuesta($resultado, 'Pais');
    }

    public function eliminar(Pais $obj) {
        $sql = "delete from pais where nombre= '" . $obj->getNombre() . "';";
        $resultado = $this->object->ejecutar($sql);
        $this->object->respuesta($resultado, 'Pais');
    }

    public function listar(Pais $obj) {
        $sql = "select id,nombre,descripcion from pais";
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
            $cadenaHTML .="<th>Descripcion</th>";
            $cadenaHTML .="</tr>";


            for ($cont = 0; $cont < pg_num_rows($resultado); $cont ++) {

                $cadenaHTML .="<tr>";
                $cadenaHTML .= "<td>" . pg_result($resultado, $cont, 0) . "</td>";
                $cadenaHTML .= "<td>" . pg_result($resultado, $cont, 1) . "</td>";
                $cadenaHTML .= "<td>" . pg_result($resultado, $cont, 2) . "</td>";
                $cadenaHTML .="</tr>";
            }

            $cadenaHTML .= "</table>";
        } else {
            $cadenaHTML .= "<b>No hay registros en la base de datos</b>";
        }
        echo $cadenaHTML;
    }
    
    
}
