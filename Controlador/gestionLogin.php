<?php
include '../Modelo/LogIn.php';
include '../DAO/loginDAO.php';

isset($_REQUEST['type'])? $type = $_REQUEST['type']: $type="";
isset($_REQUEST['nickName'])? $nickName = $_REQUEST['nickName']: $nickName="";
isset($_REQUEST['password'])? $password = $_REQUEST['password']: $password="";

session_start();

$login = new Login($nickName, $password);
$dao = new loginDAO();

$mensaje = "";

switch ($type){
    
    case"con":
        if(!$dao->ingresar($login)){
            $mensaje = "el usuario no existe";
            header('location:../index.php?infoLogIn='. $mensaje);
            
        }else{
            header('location:../index.php');
        }
        break;
        
    case "desc":
        session_destroy();
        $mensaje = "se ha cerrado la sesion";
        header('location:../index.php?infoLogIn='. $mensaje);
        break;
}
