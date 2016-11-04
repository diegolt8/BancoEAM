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
class SucursalDAO {

    //put your code here
    private $con;
    private $object;

    function SucursalDAO($tipo) {
        if($tipo == 1){
        require 'Infraestructura/Conexion.php';
        }else{
            require '../Infraestructura/Conexion.php';
        }
        $this->object = new Conexion();
        $this->con = $this->object->conectar();
    }

    public function guardar(sucursal $obj) {


        $sql = "insert into sucursal(nombre,direccion,muni) "
                . "values('" . $obj->getNombre() . "','" . $obj->getDireccion() .
                "','" . $obj->getMunicipio() . "' );";
//          echo ($sql);

        $resultado = $this->object->ejecutar($sql);
//        echo $resultado;
        $this->object->respuesta($resultado, 'MasterpageSucursal');
    }

    public function buscar(sucursal $obj) {
        $sql = "select nombre,direccion,muni from sucursal "
                . "WHERE nombre='" . $obj->getNombre() . "';";
        $resultado = $this->object->ejecutar($sql);
//        exit($resultado);
        $this->construirBusqueda($resultado);
    }

    public function construirBusqueda($resultado) {
        $vec = pg_fetch_row($resultado);

        if (isset($vec) && $vec[0] != "") {
            $lista = "nombreSuc=" . $vec[0] . "&&";
            $lista .= "direSuc=" . $vec[1] . "&&";
            $lista .= "muniSuc=" . $vec[2] . "&&";
            header('location: ../index.php?page=MasterPageSucursal&&' . $lista);
        } else {
            $message = "No se encontro informacion";
            header('location: ../index.php?page=MasterPageSucursal&&message=' . $message);
        }
    }

    public function modificar(sucursal $obj) {
        $sql = "update sucursal set nombre='" . $obj->getNombre() . "'" .
                ",direccion='" . $obj->getDireccion()  . "'" .
                "' where muni =" . $obj->getMunicipio();
//        echo ($sql);
        $resultado = $this->object->ejecutar($sql);

        $this->object->respuesta($resultado, 'MasterPageSucursal');
    }

    public function eliminar(sucursal $obj) {
        $sql = "DELETE FROM sucursal WHERE nombre =" . $obj->getNombre();
        $resultado = $this->object->ejecutar($sql);
        $this->object->respuesta($resultado, 'MasterPageSucursal');
    }

    public function listar(sucursal $obj) {
        $sql = "select nombre,direccion,muni from sucursal";
        $resultado = $this->object->ejecutar($sql);
        $this->construirListado($resultado);
    }

    public function construirListado($resultado) {
        $cadenaHTML = "";
        if ($resultado && pg_num_rows($resultado) > 0) {
            $cadenaHTML = "<table border='1'>";
            $cadenaHTML .= "<tr>";
            $cadenaHTML .= "<th>Nombre</th>";
            $cadenaHTML .= "<th>Direccion</th>";
            $cadenaHTML .= "<th>Municipio</th>";
            $cadenaHTML .= "</tr>";

            for ($cont = 0; $cont < pg_num_rows($resultado); $cont++) {
                $cadenaHTML .= "<tr>";
                $cadenaHTML .= "<td>" . pg_result($resultado, $cont, 0) . "</td>";
                $cadenaHTML .= "<td>" . pg_result($resultado, $cont, 1) . "</td>";
                $cadenaHTML .= "<td>" . pg_result($resultado, $cont, 2) . "</td>";
                $cadenaHTML .= "</tr>";
            }

            $cadenaHTML .= "</table>";
        } else {
            $cadenaHTML .= "<b>No hay registros en la base de datos </b>";
        }
        echo $cadenaHTML;
    }

}
