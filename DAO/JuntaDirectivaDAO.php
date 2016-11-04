<?php

class JuntaDirectivaDAO{
	
	private $con;
    private $object;
	
	function JuntaDirectivaDAO($tipo) {
        if ($tipo == 1) {
            require_once 'Infraestructura/Conexion.php';
        } else {
            require '../Infraestructura/Conexion.php';
        }
        $this->object = new Conexion();
        $this->con = $this->object->conectar();
    }
	
    public function cargarDpto() {
        $sql = "select id,nombre from departamento";
        $resultado = $this->object->ejecutar($sql);
        $this->construirSelectDpto($resultado);
    }
    public function construirSelectDpto($resultado) {
        $cadenaHTML = "";
        if ($resultado && pg_num_rows($resultado) > 0) {
            for ($cont = 0; $cont < pg_num_rows($resultado); $cont++) {
                $cadenaHTML .= "<option value='" . pg_result($resultado, $cont, 0) . "'>";
                $cadenaHTML .= pg_result($resultado, $cont, 1);
                $cadenaHTML .= "</option>";
            }
        }

        echo $cadenaHTML;
    }
	
	//Se realiza la consulta de los municipios
    public function cargarCiudad() {
        $sql = "select id,nombre from municipio";
        $resultado = $this->object->ejecutar($sql);
        $this->construirSelectCiudad($resultado);
    }
    //Construyo el select que cargara las ciudades
    public function construirSelectCiudad($resultado) {
        $cadenaHTML = "";
        if ($resultado && pg_num_rows($resultado) > 0) {
            for ($cont = 0; $cont < pg_num_rows($resultado); $cont++) {
                $cadenaHTML .= "<option value='" . pg_result($resultado, $cont, 0) . "'>";
                $cadenaHTML .= pg_result($resultado, $cont, 1);
                $cadenaHTML .= "</option>";
            }
        } 
		
        echo $cadenaHTML;
    }
	
	//Realiza la consulta de los socios por dpto
    public function listarSociosDpto($id) {
        $sql = "select j.nombre,j.apellido,j.cedula,j.fechanac, j.porcentaje, m.nombre from juntadirectiva as j, municipio as m "
		."where m.departamento=".$id." AND j.ciudadnac = m.id";		
        $respuesta = $this->object->ejecutar($sql);
        $this->construirListadoSocioDpto($respuesta);
    }
    public function construirListadoSocioDpto($resultado) {
        if ($resultado && pg_num_rows($resultado) > 0) {
            $cadenaHTML = "<table border='1' class='tablaConten'>";
            $cadenaHTML .= "<tr>";
            $cadenaHTML .= "<th>Nombre</th>";
            $cadenaHTML .= "<th>Apellido</th>";
            $cadenaHTML .= "<th>Cedula</th>";
            $cadenaHTML .= "<th>Fecha de Nacimiento</th>";
            $cadenaHTML .= "<th>Ciudad de Nacimiento</th>";			
			$cadenaHTML .= "<th>Porcentaje</th>";
            $cadenaHTML .= "</tr>";
            for ($cont = 0; $cont < pg_num_rows($resultado); $cont++) {
                $cadenaHTML .= "<tr>";
                $cadenaHTML .= "<td>" . pg_result($resultado, $cont, 0) . "</td>";
                $cadenaHTML .= "<td>" . pg_result($resultado, $cont, 1) . "</td>";
                $cadenaHTML .= "<td>" . pg_result($resultado, $cont, 2) . "</td>";
                $cadenaHTML .= "<td>" . pg_result($resultado, $cont, 3) . "</td>";
                $cadenaHTML .= "<td>" . pg_result($resultado, $cont, 5) . "</td>";
                $cadenaHTML .= "<td>" . pg_result($resultado, $cont, 4) ."%"."</td>";
                $cadenaHTML .= "</tr>";
            }
            $cadenaHTML .= "</table>";
        } else {
            $cadenaHTML = "<b>No hay registros en la base de datos</b>";
        }
        header('location: ../index.php?page=juntaDirectiva&&cadena='.$cadenaHTML);
    }
	
	//Realiza la consulta de todos los socios
    public function listarSocios() {
        $sql = "select j.nombre,j.apellido,j.cedula,j.fechanac, j.porcentaje, m.nombre from juntadirectiva as j, municipio as m "
		        ." where j.ciudadnac = m.id";		
        $respuesta = $this->object->ejecutar($sql);
        $this->construirListadoSocio($respuesta);
    }
    public function construirListadoSocio($resultado) {
        if ($resultado && pg_num_rows($resultado) > 0) {
            $cadenaHTML = "<table border='1' class='tablaConten'>";
            $cadenaHTML .= "<tr>";
            $cadenaHTML .= "<th>Nombre</th>";
            $cadenaHTML .= "<th>Apellido</th>";
            $cadenaHTML .= "<th>Cedula</th>";
            $cadenaHTML .= "<th>Fecha de Nacimiento</th>";
            $cadenaHTML .= "<th>Ciudad de Nacimiento</th>";
			$cadenaHTML .= "<th>Porcentaje</th>";
            $cadenaHTML .= "</tr>";
            for ($cont = 0; $cont < pg_num_rows($resultado); $cont++) {
                $cadenaHTML .= "<tr>";
                $cadenaHTML .= "<td>" . pg_result($resultado, $cont, 0) . "</td>";
                $cadenaHTML .= "<td>" . pg_result($resultado, $cont, 1) . "</td>";
                $cadenaHTML .= "<td>" . pg_result($resultado, $cont, 2) . "</td>";
                $cadenaHTML .= "<td>" . pg_result($resultado, $cont, 3) . "</td>";
                $cadenaHTML .= "<td>" . pg_result($resultado, $cont, 5) . "</td>";
				$cadenaHTML .= "<td>" . pg_result($resultado, $cont, 4) ."%". "</td>";
                $cadenaHTML .= "</tr>";
            }
            $cadenaHTML .= "</table>";
        } else {
            $cadenaHTML = "<b>No hay registros en la base de datos</b>";
        }
        echo $cadenaHTML;
    }
	
	
	//Metodo guardar para los Socios
    public function guardarSocio(JuntaDirectiva $obj) {
        $sql = "insert into juntadirectiva(nombre,apellido,cedula,fechanac,ciudadnac) values('" .
                $obj->getNombre() . "','" . $obj->getApellido() . "','" . $obj->getCedula() . "','" . $obj->getFechaNac() 
				."'," . $obj->getCiudadNac() . ");";
		$resultado = $this->object->ejecutar($sql);
		$this->porcentaje();
        $this->object->respuesta($resultado, 'juntaDirectiva');
    }
	
	public function porcentaje(){
		$sql = "select porcentaje from juntadirectiva ";
		$resultado = $this->object->ejecutar($sql);
		if ($resultado && pg_num_rows($resultado) > 0) {
			$porcentaje = 100 / pg_num_rows($resultado);
			for($cont = 0; $cont < pg_num_rows($resultado); $cont++){
				$sql2 = "update juntadirectiva set porcentaje=".$porcentaje."";
				$this->object->ejecutar($sql2);
			}
		}
	}
	
	//Metodo para buscar los socios
	public function buscarSocio(JuntaDirectiva $obj) {
        $sql = "select nombre,apellido,cedula,fechanac,ciudadnac " .
                "from juntadirectiva where cedula='" . $obj->getCedula() . "';";
		//echo $sql;		
        $respuesta = $this->object->ejecutar($sql);
        $this->construirBusquedaSocio($respuesta);
    }
	
	 public function construirBusquedaSocio($resultado) {
        $vec = pg_fetch_row($resultado);
        if (isset($vec) && $vec[0] !== "") {
            $lista = "nombre=" . $vec[0] . "&&";
            $lista .= "apellido=" . $vec[1] . "&&";
            $lista .= "id=" . $vec[2] . "&&";
            $lista .= "fechaNac=" . $vec[3] . "&&";
            $lista .= "ciudadNac=" . $vec[4] . "&&";
            header('location: ../index.php?page=juntaDirectiva&&' . $lista);
        } else {
            $mensaje = "No se pudo encontrar la informacion";
            header('location: ../index.php?page=juntaDirectiva&&message=' . $mensaje);
        }
    }
	
	public function modificarSocio(JuntaDirectiva $obj) {
        $sql = "update juntadirectiva set nombre='" . $obj->getNombre() . "',apellido='". $obj->getApellido() 
		        ."' where cedula ='". $obj->getCedula() ."'";
        $resultado = $this->object->ejecutar($sql);
        $this->object->respuesta($resultado, 'juntaDirectiva');
    }
    public function elminiarSocio(JuntaDirectiva $obj) {
        $sql = "delete from juntadirectiva where cedula='" . $obj->getCedula() . "'";
        $resultado = $this->object->ejecutar($sql);
		$this->porcentaje();
        $this->object->respuesta($resultado, 'juntaDirectiva');
    }
}

?>