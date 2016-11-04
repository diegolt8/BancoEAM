<?php


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require '../Modelo/Municipio.php';
require '../DAO/MuniDAO.php';

isset($_REQUEST['id']) ? $id = $_REQUEST['id'] : $id = "";
isset($_REQUEST['nombre']) ? $nombre= $_REQUEST['nombre'] : $nombre = "";
isset($_REQUEST['descripcion']) ? $descripcion= $_REQUEST['descripcion'] : $descripcion = "";
isset($_REQUEST['departamento']) ? $pais= $_REQUEST['departamento'] : $pais = "";
isset($_REQUEST['type']) ? $type= $_REQUEST['type'] : $type = "";

$pais= new Municipio($id, $nombre, $descripcion,$pais);
$dao= new MuniDAO();

switch ($type) {

    case "save":
        $dao->guardar($pais);
        break;

    case "search":
        $dao->buscar($pais);
        break;

    case "update":
        $dao->modificar($pais);
        break;

    case "delete":
        $dao->eliminar($pais);
        break;

}