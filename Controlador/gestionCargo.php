<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require '../Modelo/Cargo.php';
require '../DAO/CargoDAO.php';


isset($_REQUEST['id']) ? $id= $_REQUEST['id'] : $id = "";
isset($_REQUEST['nombreCar']) ? $nombreCar = $_REQUEST['nombreCar'] : $nombreCar = "";
isset($_REQUEST['salarioCar']) ? $salarioCar = $_REQUEST['salarioCar'] : $salarioCar = "";
isset($_REQUEST['intensidad']) ? $intensidad = $_REQUEST['intensidad'] : $intensidad = "";
isset($_REQUEST['descripcion']) ? $descripcion = $_REQUEST['descripcion'] : $descripcion = "";
isset($_REQUEST['type']) ? $type = $_REQUEST['type'] : $type = "";

$cargo= new Cargo($id, $nombreCar, $salarioCar, $intensidad, $descripcion);
$dao= new CargoDAO();


switch ($type) {
    case "save":
        $dao->guardar($cargo);
        break;
    case "list":
        $dao->listar($cargo);
        break;

    case "search":
        $dao->buscar($cargo);
        break;

    case "update":
        $dao->modificar($cargo);
        break;
    
    case "delete":
        $dao->eliminar($cargo);
        break;
}