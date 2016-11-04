<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link href="../Recursos/css/css.css" rel="stylesheet" type="text/css"/>
        <script src="Recursos/js/gestionCargo.js" type="text/javascript"></script>
        <title></title>
    </head>
    <body>
        <div class="contenedor">
            <div class="clogin cregistro">
                <h1>Gestion de cargos</h1>
                <form name="formularioRegistro" id="formReg"  method="post" action="Controlador/gestionCargo.php" onsubmit="return logIn('con');">
                    <div class="ccampo">
                        <label for="txtAdmin">Nombre del cargo:</label>
                        <input type="text" id="txtNombre" required name="nombreCar" value="<?php
                        isset($_REQUEST['nombreCar']) ?
                                        print $_REQUEST['nombreCar'] : print"";
                        ?>">
                    </div>
                    <div class="ccampo">
                        <label for="txtPassword">Salario:</label>
                        <input type="text" id="txtApellido" required required name="salarioCar" value="<?php
                        isset($_REQUEST['salarioCar']) ?
                                        print $_REQUEST['salarioCar'] : print"";
                        ?>">
                    </div>
                    <div class="ccampo">
                        <label for="txtPassword">Intensidad horaria::</label>
                        <input type="number" id="txtNickname" required name="intensidad" value="<?php
                        isset($_REQUEST['intensidad']) ?
                                        print $_REQUEST['intensidad'] : print"";
                        ?>">
                    </div>
                    <div class="ccampo">
                        <label for="txtPassword">Descripcion:</label>
                        <input type="text" id="txtPassword" required name="descripcion" value="<?php
                        isset($_REQUEST['descripcion']) ?
                                        print $_REQUEST['descripcion'] : print"";
                        ?>">
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
                         <input type="button" value="Guardar" class="btnverde" id="btnGuardar" onclick="validarCargo('save');">
                         <input type="button" value="Buscar" class="btnverde" id="btnBuscar" onclick="validarCargo('search');">                    
                     </div>
                         <div class="ccampo">
                            <input type="button" value="Editar" class="btnverde" id="btnEditar" onclick="validarCargo('update');">
                            <input type="button" value="Eliminar" class="btnverde" id="btnEliminar" onclick="validarCargo('delete');">                
                      </div>
    
                </form>   
            </div>
         <div class="margenList">
                <?php
                require 'Modelo/Cargo.php';
                require 'DAO/CargoDAO.php';
                $cargo= new Cargo("","","","","");
                $dao= new CargoDAO(1);
                $dao->listar($cargo);
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
