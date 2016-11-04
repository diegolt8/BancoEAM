<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of generalDAO
 *
 * @author vanegas
 */
class generalDAO {
    
    private $con;
    private $object;
    
    function generalDAO($tipo){
        if($tipo==1){
            require 'Infraestructura/Conexion.php';
        }else{
            require '../Infraestructura/Conexion.php';
        }
        
        $this->object = new Conexion();
        $this->con = $this->object->conectar();
    }
    
    public function listarCuenta(General $obj){
        $slq = "SELECT id,tipo_cuenta FROM cuenta";
        $resultado = $this->object->ejecutar($slq);
        $this->construirOptionsSelectDirecto($resultado);
    }
       public function construirOptionsSelectDirecto($resultado){
        $cadenaHTML ="";
        if($resultado && pg_num_rows($resultado)>0){
            for($cont =0;$cont<pg_num_rows($resultado);$cont++){
                $cadenaHTML .="<option value='" .pg_result($resultado,$cont,0)."'>";
                $cadenaHTML .=pg_result($resultado,$cont,1);
                $cadenaHTML .="</option>";
            }
        }else{
            $cadenaHTML.="<b>No hay registros en la base de datos</b>";
        }
        
        echo $cadenaHTML;
    }

}