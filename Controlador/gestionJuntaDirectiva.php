<?php
require '../Modelo/JuntaDirectiva.php';
require '../DAO/JuntaDirectivaDAO.php';

isset($_REQUEST['nombre']) ? $nombre = $_REQUEST['nombre'] : $nombre = "";
isset($_REQUEST['apellido']) ? $apellido = $_REQUEST['apellido'] : $apellido = "";
isset($_REQUEST['id']) ? $id = $_REQUEST['id'] : $id = "";
isset($_REQUEST['fechaNac']) ? $fechaNac = $_REQUEST['fechaNac'] : $fechaNac = "";
isset($_REQUEST['ciudadNac']) ? $ciudadNac = $_REQUEST['ciudadNac'] : $ciudadNac = "";
isset($_REQUEST['dptoNac']) ? $dptoNac = $_REQUEST['dptoNac'] : $dptoNac = "";
isset($_REQUEST['type']) ? $accion = $_REQUEST['type'] : $accion = "";

$junta = new JuntaDirectiva($nombre,$apellido,$id,$fechaNac,$ciudadNac);
$dao = new JuntaDirectivaDAO("");
switch ($accion) {
    case "save":
        $dao->guardarSocio($junta);
        break;
    case "search":
        $dao->buscarSocio($junta);
        break;
    case "delete":
        $dao->elminiarSocio($junta);
        break;
    case "update":
        $dao->modificarSocio($junta);
        break;
	case "list":
	    $dao->listarSociosDpto($dptoNac);
	    break;
}
?>