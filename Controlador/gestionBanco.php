<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require '../Modelo/banco.php';
require '../DAO/bancoDAO.php';

isset($_REQUEST['nombreBan']) ? $nombreBan = $_REQUEST['nombreBan'] : $nombreBan = "";
isset($_REQUEST['NitBan']) ? $NitBan = $_REQUEST['NitBan'] : $NitBan = "";
isset($_REQUEST['misionBan']) ? $misionBan = $_REQUEST['misionBan'] : $misionBan = "";
isset($_REQUEST['visionBan']) ? $visionBan = $_REQUEST['visionBan'] : $visionBan = "";
isset($_REQUEST['sedeBan']) ? $sedeBan = $_REQUEST['sedeBan'] : $sedeBan = "";
isset($_REQUEST['type']) ? $accion = $_REQUEST['type'] : $accion = "";

$banco = new banco($nombreBan, $NitBan, $misionBan, $visionBan, $sedeBan);
$dao = new bancoDAO("");


switch ($accion) {

    case "save":
        $dao->guardar($banco);
        break;

    case "search":
        $dao->buscar($banco);
        break;

    case "update":
        $dao->modificar($banco);
        break;

    case "delete":
        $dao->eliminar($banco);
        break;

}