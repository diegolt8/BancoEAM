<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <script src="Recursos/js/gestionEmpleado.js" type="text/javascript"></script>
        <link href="../Recursos/css/css.css" rel="stylesheet" type="text/css"/>
        <title></title>
    </head>
    <body>
        <div class="contenedor">
            <div class="clogin cregistro">
                <h1>Gestion de empleados</h1>
                <form name="formularioRegistro" id="formReg"  method="post" action="Controlador/gestionClienteAdmin.php" onsubmit="return logIn('con');">
                    <div class="ccampo">
                        <label for="txtAdmin">Nombre Completo:</label>
                        <input type="text" id="txtNombre" required name="nombreEmp" value="<?php
                        isset($_REQUEST['nombreEmp']) ?
                                        print $_REQUEST['nombreEmp'] : print"";
                        ?>">
                    </div>
                    <div class="ccampo">
                        <label for="txtPassword">Apellido:</label>
                        <input type="text" id="txtApellido" required required name="apellidoEmp" value="<?php
                        isset($_REQUEST['apellidoEmp']) ?
                                        print $_REQUEST['apellidoEmp'] : print"";
                        ?>">
                    </div>
                    <div class="ccampo">
                        <label for="txtPassword">Nickname:</label>
                        <input type="text" id="txtNickname" required name="nickEmp" value="<?php
                        isset($_REQUEST['nickEmp']) ?
                                        print $_REQUEST['nickEmp'] : print"";
                        ?>">
                    </div>
                    <div class="ccampo">
                        <label for="txtPassword">Password:</label>
                        <input type="password" id="txtPassword" required name="passEmp" value="<?php
                        isset($_REQUEST['passEmp']) ?
                                        print $_REQUEST['passEmp'] : print"";
                        ?>">
                    </div>
                    <div class="ccampo">
                        <label for="txtPassword">Cargo:</label>
                        <select id="cbCargo" required name="cargoEmp" value="<?php
                            isset($_REQUEST['cargoEmp']) ?
                                            print $_REQUEST['cargoEmp'] : print"";
                            ?>">  
                                <option value="Administrador">Administrador </option>
                                <option value="Gerente">Gerente </option>
                                <option value="Asesor">Asesor </option>
                                <option value="Cajero">Cajero </option>

                            </select>
                    </div>
                    <div class="ccampo oculto">
                        <label for="txtPassword">Id:</label>
                        <input type="number" id="txtId" name="id" value="<?php
                        isset($_REQUEST['id']) ?
                                        print $_REQUEST['id'] : print"";
                        ?>">
                    </div>
                    
                     <div class=" ccampo oculto">
                            <input type="text" id="txtType" name="type" class="oculto">
                        </div>
                     <div class="ccampo">
                         <input type="button" value="Guardar" class="btnverde" id="btnGuardar" onclick="validarEmpleado('save');">
                         <input type="button" value="Buscar" class="btnverde" id="btnBuscar" onclick="validarEmpleado('search');">                    
                     </div>
                         <div class="ccampo">
                            <input type="button" value="Editar" class="btnverde" id="btnEditar" onclick="validarEmpleado('update');">
                            <input type="button" value="Eliminar" class="btnverde" id="btnEliminar" onclick="validarEmpleado('delete');">                
                      </div>
            
                </form>   
            </div>
 <div class="margenList">
                <?php
                require 'Modelo/Usuario.php';
                require 'DAO/RegistrarEmpleadoDAO.php';
                $usuario= new Usuario("","","","","","");
                $dao= new RegistrarEmpleadoDAO(1);
                $dao->listar($usuario);
                ?>
            
        </div> 
        <?php
        if (isset($_REQUEST['mes'])) {
            echo $_REQUEST['mes'];
        }
        
        if(isset($_REQUEST['ver'])){
        echo $_REQUEST['ver'];
   }
        ?>
            </div>
    </body>
</html>
