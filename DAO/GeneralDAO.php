<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GeneralDAO
 *
 * @author Jordy
 */
class GeneralDAO {
    //put your code here
     private $con;
    private $object;

    function GeneralDAO($tipo) {
        if ($tipo === 1) {
            require 'Infraestructura/Conexion.php';
        } else {
            require '../Infraestructura/Conexion.php';
        }
        $this->object = new Conexion();
        $this->con = $this->object->conectar();
    }
    
    public function ListarPais(){
        $sql= "SELECT id,nombre from pais";
        $resultado = $this->object->ejecutar($sql);
//        echo $resultado;
        $this->construirOptionPais($resultado);
    }
          
     public function construirOptionPais($resultado) {
        $cadenaHTML = "";
        if ($resultado && pg_num_rows($resultado) > 0) {
      for ($cont = 0; $cont < pg_num_rows($resultado); $cont ++) {
                $cadenaHTML .= "<option value='" . pg_result($resultado, $cont, 0) . "'>";
                $cadenaHTML .= pg_result($resultado, $cont, 1);
            }     
        } else {
            $cadenaHTML .= "<b>No hay registros en la base de datos</b>";
        }
        echo $cadenaHTML;
    }
    
    
      public function ListarDepar(){
        $sql= "SELECT id,nombre from departamento";
        $resultado = $this->object->ejecutar($sql);
//        echo $resultado;
        $this->construirOptionDepar($resultado);
    }
          
     public function construirOptionDepar($resultado) {
        $cadenaHTML = "";
        if ($resultado && pg_num_rows($resultado) > 0) {
      for ($cont = 0; $cont < pg_num_rows($resultado); $cont ++) {
                $cadenaHTML .= "<option value='" . pg_result($resultado, $cont, 0) . "'>";
                $cadenaHTML .= pg_result($resultado, $cont, 1);
            }     
        } else {
            $cadenaHTML .= "<b>No hay registros en la base de datos</b>";
        }
        echo $cadenaHTML;
    }
    
    
    
    public function ListarMuni(){
        $sql= "SELECT id,nombre from municipio";
        $resultado = $this->object->ejecutar($sql);
//        echo $resultado;
        $this->construirOptionMuni($resultado);
    }
          
     public function construirOptionMuni($resultado) {
        $cadenaHTML = "";
        if ($resultado && pg_num_rows($resultado) > 0) {
      for ($cont = 0; $cont < pg_num_rows($resultado); $cont ++) {
                $cadenaHTML .= "<option value='" . pg_result($resultado, $cont, 0) . "'>";
                $cadenaHTML .= pg_result($resultado, $cont, 1);
            }     
        } else {
            $cadenaHTML .= "<b>No hay registros en la base de datos</b>";
        }
        echo $cadenaHTML;
    }
    
}
