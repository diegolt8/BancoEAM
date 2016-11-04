<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <script src="Recursos/js/pais.js" type="text/javascript"></script>
        <title></title>
    </head>
    <body>
        <div class="contenedor">
            <div class="clogin cregistro">
                <h1>Gestion de paises</h1>
                <form name="formularioRegistro" id="formReg"  method="post" action="Controlador/gestionPais.php" onsubmit="return logIn('con');">
                    <div class="ccampo">
                        <label for="txtAdmin">Nombre del pais:</label>
                        <input type="text" id="txtNombre" required name="nombre" value="<?php
                        isset($_REQUEST['nombre']) ?
                                        print $_REQUEST['nombre'] : print"";
                        ?>">
                    </div>
                    <div class="ccampo">
                        <label for="txtPassword">Descripcion:</label>
                        <input type="text" id="txtApellido" required required name="descripcion" value="<?php
                        isset($_REQUEST['descripcion']) ?
                                        print $_REQUEST['descripcion'] : print"";
                        ?>">
                        <div class="ccampo oculto">
                        <label for="txtPassword"></label>
                        <input type="text" id="txtDes"  class="oculto" required required name="id" value="<?php
                        isset($_REQUEST['id']) ?
                                        print $_REQUEST['id'] : print"";
                        ?>">
                         </div>
              
                     <div class=" ccampo oculto">
                            <input type="text" id="txtType" name="type" class="oculto">
                        </div>
                     <div class="ccampo">
                         <input type="button" value="Guardar" class="btnverde" id="btnGuardar" onclick="validarPais('save');">
                         <input type="button" value="Buscar" class="btnverde" id="btnBuscar" onclick="validarPais('search');">                    
                     </div>
                         <div class="ccampo">
                            <input type="button" value="Editar" class="btnverde" id="btnEditar" onclick="validarPais('update');">
                            <input type="button" value="Eliminar" class="btnverde" id="btnEliminar" onclick="validarPais('delete');">                
                      </div>
             <div class="margenList">
                <?php
                require 'Modelo/Pais.php';
                require 'DAO/PaisDAO.php';
                $pais= new Pais("","","");
                $dao= new PaisDAO(1);
                $dao->listar($pais);
                ?>
            
        </div> 
                </form>   
           

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
