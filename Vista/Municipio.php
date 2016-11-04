<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <script src="Recursos/js/municipio.js" type="text/javascript"></script>
        <title></title>
    </head>
    <body>
        <div class="contenedor">
            <div class="clogin cregistro">
                <h1>Gestion de municipios</h1>
                <form name="formularioRegistro" id="formReg"  method="post" action="Controlador/gestionMuni.php" onsubmit="return logIn('con');">
                  
                    <input type="hidden" id="txtIdSelect" name="idPais"/>
                    <input type="hidden" name="page" value="Departamento"/>
                    
                    <div class="ccampo">
                        <label for="txtAdmin">Nombre del municipio:</label>
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
                        
                        <div class="ccampo ">
                            <label for="txtPassword">Seleccione un departamento</label>
                            <select id="cbpais" name="departamento" value>  
                                <option id="-1">Seleccione una opcion... </option>
                                <?php
                                require 'Modelo/General.php';
                                require 'DAO/GeneralDAO.php';
                                $depto = new General("", "");
                                $dao = GeneralDAO(1);
                                $dao->ListarDepar($depto);
                                ?>
                            </select>
                        </div>
                        
                        
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
                         <input type="button" value="Guardar" class="btnverde" id="btnGuardar" onclick="validarMuni('save');">
                         <input type="button" value="Buscar" class="btnverde" id="btnBuscar" onclick="validarMuni('search');">                    
                     </div>
                         <div class="ccampo">
                            <input type="button" value="Editar" class="btnverde" id="btnEditar" onclick="validarMuni('update');">
                            <input type="button" value="Eliminar" class="btnverde" id="btnEliminar" onclick="validarMuni('delete');">                
                      </div>
             <div class="margenList">
                <?php
                require 'Modelo/Municipio.php';
                require 'DAO/MuniDAO.php';
                $pais= new Municipio("","","");
                $dao= new MuniDAO(1);
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
