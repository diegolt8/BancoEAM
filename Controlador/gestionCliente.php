<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require '../Modelo/Cliente.php';
require '../DAO/RegistrarClienteDAO.php';

isset($_REQUEST['nombreCli']) ? $nombreCli = $_REQUEST['nombreCli'] : $nombreCli = "";
isset($_REQUEST['apellidoCli']) ? $apellidoCli = $_REQUEST['apellidoCli'] : $apellidoCli = "";
isset($_REQUEST['cedulaCli']) ? $cedulaCli = $_REQUEST['cedulaCli'] : $cedulaCli = "";
isset($_REQUEST['nickCli']) ? $nickCli = $_REQUEST['nickCli'] : $nickCli = "";
isset($_REQUEST['passCli']) ? $passCli = $_REQUEST['passCli'] : $passCli = "";
isset($_REQUEST['verPass']) ? $VerpassR = $_REQUEST['verPass'] : $VerpassR = "";
isset($_REQUEST['type']) ? $accion = $_REQUEST['type'] : $accion = "";

$Cliente = new Cliente($nombreCli, $apellidoCli,$cedulaCli, $nickCli, $passCli);
$dao = new RegistrarClienteDAO();


if($VerpassR === $passCli){

   $guar = $dao->guardar($Cliente);
    
}else{
    $ver = 'Verifique contraseña';
    header('location:../vista/RegistroCliente.php?ver='.$ver);
}