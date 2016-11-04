<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require '../Modelo/Departamento.php';
require '../DAO/DeparDAO.php';

isset($_REQUEST['id']) ? $id = $_REQUEST['id'] : $id = "";
isset($_REQUEST['nombre']) ? $nombre= $_REQUEST['nombre'] : $nombre = "";
isset($_REQUEST['descripcion']) ? $descripcion= $_REQUEST['descripcion'] : $descripcion = "";
isset($_REQUEST['pais']) ? $pais= $_REQUEST['pais'] : $pais = "";
isset($_REQUEST['type']) ? $type= $_REQUEST['type'] : $type = "";

$pais= new Departamento($id, $nombre, $descripcion,$pais);
$dao= new DeparDAO();

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