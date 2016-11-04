<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title></title>
    <script src="Recursos/Js/gestionJuntaDirectiva.js" type="text/javascript"></script>
</head>
<body>
    <form  name="formularioSocio" id="formSocio" method="post" action="Controlador/gestionJuntaDirectiva.php">
        <div>
            <table class="contenedor1">
                <tr>
                    
                    <td><label>Departamento:</label></td>
                    <td><select name="dptoNac" id="selDptoNac">
                            <option value="-1">Seleccione una opción</option>
                            <?php
                            require 'DAO/JuntaDirectivaDAO.php';
                            $dao = new JuntaDirectivaDAO(1);
                            $dao->cargarDpto();
                            ?>
                        </select></td>
                    <td><input type="button" class="btnFiltrar" value="Filtrar" id="btnListar" onclick="validarSocio('list');"></td>
                </tr>
                <tr>
                    <td><br></td>
                </tr>
                <tr>
                    <td><label>Nombre:</label></td>
                    <td><input   class="jCampo" type="text" id="txtNombre" name="nombre"
                               value="<?php
                               isset($_REQUEST['nombre']) ?
                                               print $_REQUEST['nombre'] : print "";
                               ?>"></td>
                </tr>
                <tr>
                    <td><label>Apellido:</label></td>
                    <td><input type="text" class="jCampo" id="txtApellido" name="apellido"
                               value="<?php
                               isset($_REQUEST['apellido']) ?
                                               print $_REQUEST['apellido'] : print"";
                               ?>"></td>
                </tr>
                <tr>
                    <td><label>Identificacion:</label></td>
                    <td><input type="text" class="jCampo" id="txtId" name="id"
                               value="<?php
                               isset($_REQUEST['id']) ?
                                               print $_REQUEST['id'] : print"";
                               ?>"></td>
                </tr>
                <tr>
                    <td><label>Fecha de Nacimiento:</label></td>
                    <td><input type="date" id="txtFechaNac" name="fechaNac"
                               value="<?php
                               isset($_REQUEST['fechaNac']) ?
                                               print $_REQUEST['fechaNac'] : print"";
                               ?>"></td>
                </tr>
                <tr>
                    <td><label>Ciudad o municipio de nacimiento:</label></td>
                    <td><select name="ciudadNac" id="selCiudadNac">
                            <option value="-1">Seleccione una opción</option>
                            <?php
                            $dao->cargarCiudad();
                            ?>
                        </select></td>
               
                    <td><input type="text" id="txtType" name="type" class="oculto"></td>
                    <td><input type="button" value="Guardar" class="btnverde" onclick="validarSocio('save');">
                        <input type="button" value="Buscar" class="btnverde" onclick="validarSocio('search');"></td>
                    <td><input type="button" value="Editar" class="btnverde" onclick="validarSocio('update');">
                        <input type="button" value="Eliminar" class="btnverde" onclick="validarSocio('delete');"></td>
               
            </table>
        </div>
    </form>
    <?php
    if (isset($_REQUEST['message'])) {
        echo $_REQUEST['message'];
    }

    if (isset($_REQUEST['cadena'])) {
        echo $_REQUEST['cadena'];
    } else {
        $dao->listarSocios();
    }
    ?>
</body>
</html>