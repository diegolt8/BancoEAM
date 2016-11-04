<?php

class Conexion {

    //put your code here

    private $usuario;
    private $password;
    private $dataBase;
    private $puerto;
    private $host;
    private $cadenaConexion;
    private $connect;
    private $resultDB;

    public function conectar() {
        $this->usuario = "postgres";
        $this->password = "admin";
        $this->dataBase = "ProyectoBanco";
        $this->puerto = "5432";
        $this->host = "localhost";

        $this->cadenaConexion = "host=$this->host port = $this->puerto dbname = $this->dataBase
            user= $this->usuario password= $this->password";

        $this->connect = pg_connect($this->cadenaConexion) or die("ERROR al realizar la conexion con la base de datos");
    }

    public function acceder_conexion() {
        return $this->connect;
    }

    function ejecutar($sql) {
        if ($sql == "") {
            return 0;
        } else {
            $this->resultDB = pg_query($this->connect, $sql);
            return $this->resultDB;
        }
    }

    function validarLogin($resultado, $tipo) {
        $vec = pg_fetch_row($resultado);

        if ($vec[0] != "") {
            if ($tipo === 1) {
                $_SESSION['nameUser'] = $vec[0];
                $_SESSION['apellido'] = $vec[1];
                $_SESSION['cargo'] = $vec[3];
                $_SESSION['nick'] = $vec[2];
                return $vec[0];
            } else if ($tipo == 0) {
                $_SESSION['nameUser'] = $vec[0];
                $_SESSION['apellido'] = $vec[1];
                $_SESSION['nickName'] = $vec[2];
                return $vec[0];
            }
        } else {
            return "";
        }
    }

    function validarNickName($resultado){
        $vec = pg_fetch_row($resultado);
        
        if($vec[0] != ""){
            return true;
        }else{
            return false;
        }
    }

    function respuesta($resultado, $page) {
        if ($resultado) {
            $mensaje = "operacion exitosa";
        } else {
            $mensaje = "error en la operacion";
        }
        header('location: ../index.php?page=' . $page . '&&message=' . $mensaje);
    }

}
