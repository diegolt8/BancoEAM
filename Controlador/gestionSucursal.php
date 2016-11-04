<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require '../Modelo/sucursal.php';
require '../DAO/SucursalDAO.php';

isset($_REQUEST['id']) ? $id = $_REQUEST['id'] : $id = "";
isset($_REQUEST['nombre']) ? $nombreSuc = $_REQUEST['nombre'] : $nombreSuc = "";
isset($_REQUEST['direccion']) ? $direSuc = $_REQUEST['direccion'] : $direSuc = "";
isset($_REQUEST['municipio']) ? $muniSuc = $_REQUEST['municipio'] : $muniSuc = "";
isset($_REQUEST['type']) ? $accion = $_REQUEST['type'] : $accion = "";

$suc = new sucursal($id,$nombreSuc, $direSuc, $muniSuc);
$dao = new sucursalDAO();


switch ($accion) {

    case "save":
        $dao->guardar($suc);
        break;

    case "search":
        $dao->buscar($suc);
        break;

    case "update":
        $dao->modificar($suc);
        break;

    case "delete":
        $dao->eliminar($suc);
        break;

}