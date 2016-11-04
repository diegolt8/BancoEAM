<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <script src="Recursos/js/sucursal.js" type="text/javascript"></script>
        <title></title>
    </head>
    <body>
        <div class="contenedor">
            <div class="clogin cregistro">
                <h1>Gestion de sucursales</h1>
                <form name="formularioRegistro" id="formReg"  method="post" action="Controlador/gestionSucursal.php" onsubmit="return logIn('con');">
                  
                    <input type="hidden" id="txtIdSelect" name="idPais"/>
                    <input type="hidden" name="page" value="Departamento"/>
                    
                    <div class="ccampo">
                        <label for="txtAdmin">Nombre de la sucursal:</label>
                        <input type="text" id="txtNombre" required name="nombre" value="<?php
                        isset($_REQUEST['nombre']) ?
                                        print $_REQUEST['nombre'] : print"";
                        ?>">
                    </div>
                    <div class="ccampo">
                        <label for="txtPassword">Direccion:</label>
                        <input type="text" id="txtApellido" required required name="direccion" value="<?php
                        isset($_REQUEST['direccion']) ?
                                        print $_REQUEST['direccion'] : print"";
                        ?>">
                        
                        <div class="ccampo ">
                            <label for="txtPassword">Seleccione un municipio</label>
                            <select id="cbpais" name="municipio" value>  
                                <option id="-1">Seleccione una opcion... </option>
                                <?php
                                require 'Modelo/General.php';
                                require 'DAO/GeneralDAO.php';
                                $depto = new General("", "");
                                $dao = GeneralDAO(1);
                                $dao->ListarMuni($depto);
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
              
                     <div class=" ccampo">
                            <input type="text" id="txtType" name="type" class="oculto">
                        </div>
                     <div class="ccampo">
                         <input type="button" value="Guardar" class="btnverde" id="btnGuardar" onclick="validarSucu('save');">
                         <input type="button" value="Buscar" class="btnverde" id="btnBuscar" onclick="validarSucu('search');">                    
                     </div>
                         <div class="ccampo">
                            <input type="button" value="Editar" class="btnverde" id="btnEditar" onclick="validarSucu('update');">
                            <input type="button" value="Eliminar" class="btnverde" id="btnEliminar" onclick="validarSucu('delete');">                
                      </div>
             <div class="margenList">
                <?php
                require 'Modelo/Sucursal.php';
                require 'DAO/SucursalDAO.php';
                $pais= new Sucursal("","","","");
                $dao= new SucursalDAO(1);
                $dao->listar($pais);
                ?>
             </div>
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
