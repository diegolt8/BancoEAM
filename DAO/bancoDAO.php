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
class bancoDAO {

    //put your code here
    private $con;
    private $object;

    function bancoDAO($tipo) {
        if($tipo == 1){
        require 'Infraestructura/Conexion.php';
        }else{
            require '../Infraestructura/Conexion.php';
        }
        $this->object = new Conexion();
        $this->con = $this->object->conectar();
    }

    public function guardar(banco $obj) {


        $sql = "insert into banco(nombre,nit,mision,vision,sede) "
                . "values('" . $obj->getNombre() . "','" . $obj->getNit() .
                "','" . $obj->getMision() . "','" . $obj->getVision() .
                "','" . $obj->getSede() . "' );";
//          echo ($sql);

        $resultado = $this->object->ejecutar($sql);
//        echo $resultado;
        $this->object->respuesta($resultado, 'MasterpageBanco');
    }

    public function buscar(banco $obj) {
        $sql = "select nombre,nit,mision,vision,sede from banco "
                . "WHERE nit='" . $obj->getNit() . "';";
        $resultado = $this->object->ejecutar($sql);
//        exit($resultado);
        $this->construirBusqueda($resultado);
    }

    public function construirBusqueda($resultado) {
        $vec = pg_fetch_row($resultado);

        if (isset($vec) && $vec[0] != "") {
            $lista = "nombreBan=" . $vec[0] . "&&";
            $lista .= "NitBan=" . $vec[1] . "&&";
            $lista .= "misionBan=" . $vec[2] . "&&";
            $lista .= "visionBan=" . $vec[3] . "&&";
            $lista .= "sedeBan=" . $vec[4];
            header('location: ../index.php?page=MasterPageBanco&&' . $lista);
        } else {
            $message = "No se encontro informacion";
            header('location: ../index.php?page=MasterPageBanco&&message=' . $message);
        }
    }

    public function modificar(banco $obj) {
        $sql = "update banco set nombre='" . $obj->getNombre() . "'" .
                ",mision='" . $obj->getMision() . "', vision='" . $obj->getVision() . "'" .
                ",sede='" . $obj->getSede() . "' where nit =" . $obj->getNit();
//        echo ($sql);
        $resultado = $this->object->ejecutar($sql);

        $this->object->respuesta($resultado, 'MasterPageBanco');
    }

    public function eliminar(banco $obj) {
        $sql = "DELETE FROM banco WHERE nit =" . $obj->getNit();
        $resultado = $this->object->ejecutar($sql);
        $this->object->respuesta($resultado, 'MasterPageBanco');
    }

    public function listar(banco $obj) {
        $sql = "select nombre,nit,mision,vision,sede from banco";
        $resultado = $this->object->ejecutar($sql);
        $this->construirListado($resultado);
    }

    public function construirListado($resultado) {
        if ($resultado && pg_num_rows($resultado) > 0) {
            $cadenaHTML = "<table border='1'>";
            $cadenaHTML .= "<tr>";
            $cadenaHTML .= "<th>Nombre</th>";
            $cadenaHTML .= "<th>NIT</th>";
            $cadenaHTML .= "<th>Mision</th>";
            $cadenaHTML .= "<th>Vision</th>";
            $cadenaHTML .= "<th>Sede</th>";
            $cadenaHTML .= "</tr>";

            for ($cont = 0; $cont < pg_num_rows($resultado); $cont++) {
                $cadenaHTML .= "<tr>";
                $cadenaHTML .= "<td>" . pg_result($resultado, $cont, 0) . "</td>";
                $cadenaHTML .= "<td>" . pg_result($resultado, $cont, 1) . "</td>";
                $cadenaHTML .= "<td>" . pg_result($resultado, $cont, 2) . "</td>";
                $cadenaHTML .= "<td>" . pg_result($resultado, $cont, 3) . "</td>";
                $cadenaHTML .= "<td>" . pg_result($resultado, $cont, 4) . "</td>";
                $cadenaHTML .= "</tr>";
            }

            $cadenaHTML .= "</table>";
        } else {
            $cadenaHTML .= "<b>No hay registros en la base de datos </b>";
        }
        echo $cadenaHTML;
    }

}
