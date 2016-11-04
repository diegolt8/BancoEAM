<?php

class loginDAO {

    //put your code here

    private $con;
    private $object;

    function loginDAO() {
        require '../Infraestructura/Conexion.php';
        $this->object = new Conexion;
        $this->con = $this->object->conectar();
    }

//    function ingresar(LogIn $obj) {
//        $sql = "SELECT nombre,nickname,password ".
//                "from loginadmin where nickname= '" . $obj->getNickName() . "' and password='" . $obj->getPassword() . "'";
//       // echo $sql;
//        $resultado = $this->object->ejecutar($sql);
//        return $this->object->validarLogin($resultado);
//    }


    function ingresar(Login $obj) {

        $nick = $obj->getNickName();
        $tipo = $this->tipo($nick);

        if ($tipo == 1) {
            $sql = "SELECT nombre,apellido,nickname,cargo,password "
                    . "from empleado "
                    . "where nickname='" . $obj->getNickName() . "' AND password='" . md5($obj->getPassword()) . "'";

            $resultado = $this->object->ejecutar($sql);
            return $this->object->validarLogin($resultado, $tipo);
        } else if ($tipo == 0) {
            $sql = "Select nombre,apellido,cedula,nickname,password from cliente " .
                    "where nickname='" . $obj->getNickName() . "' AND password='" . md5($obj->getPassword()) . "'";

            $resultado = $this->object->ejecutar($sql);
            return $this->object->validarLogin($resultado, $tipo);
        }
  
    }

    public function tipo($nickname) {
        if ($this->personal($nickname) === true) {
            return 1;
        } else if ($this->cliente($nickname) === true) {
            return 0;
        }
    }

    public function personal($nickname) {
        $sql = "select nickname from empleado";
        $resultado = $this->object->ejecutar($sql);
        $vec = pg_fetch_all_columns($resultado);
        if ($vec[0] !== "") {
            for ($cont = 0; $cont < count($vec); $cont++) {
                if ($vec[$cont] === $nickname) {
                    return true;
                }
            }
        } else {
            return false;
        }
    }

    public function cliente($nickname) {
        $sql = "select nickname from cliente";
        $resultado = $this->object->ejecutar($sql);
        $vec = pg_fetch_all_columns($resultado);
        if ($vec[0] !== "") {
            for ($cont = 0; $cont < count($vec); $cont++) {
                if ($vec[$cont] === $nickname) {
                    return true;
                }
            }
        } else {
            return false;
        }
    }

}

?>
