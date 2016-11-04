<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link href="Recursos/css/css.css" rel="stylesheet" type="text/css"/>
        <script src="Recursos/js/Validar.js" type="text/javascript"></script>
        <title></title>
    </head>
    <body>
        <div class="contenedor">
            <div class="clogin cregistro">
                <h1>Gestionar Banco</h1>
                <form name="formularioRegistroBan" id="formBan"  method="post" action="Controlador/gestionBanco.php">
                    <div class="ccampo">
                        <label for="txtAdmin">Nombre Banco:</label>
                        <input type="text" id="txtNombreBan" required name="nombreBan" value="<?php
                        isset($_REQUEST['nombreBan']) ?
                                        print $_REQUEST['nombreBan'] : print"";
                        ?>">
                    </div>
                    <div class="ccampo">
                        <label for="txtPassword">NIT:</label>
                        <input type="text" id="txtNitBan" required name="NitBan" value="<?php
                        isset($_REQUEST['NitBan']) ?
                                        print $_REQUEST['NitBan'] : print"";
                        ?>">
                    </div>
                    <div class="ccampo">
                        <label for="txtPassword">Mision:</label>
                        <input type="text" id="txtMisionBan" required name="misionBan" value="<?php
                        isset($_REQUEST['misionBan']) ?
                                        print $_REQUEST['misionBan'] : print"";
                        ?>">
                    </div>
                    <div class="ccampo">
                        <label for="txtPassword">Vision:</label>
                        <input type="text" id="txtVisionBan" required name="visionBan" value="<?php
                        isset($_REQUEST['visionBan']) ?
                                        print $_REQUEST['visionBan'] : print"";
                        ?>">
                    </div>
                    <div class="ccampo">
                        <label for="txtPassword">Sede:</label>
                        <input type="text" id="txtSedeBan" required name="sedeBan" value="<?php
                        isset($_REQUEST['sedeBan']) ?
                                        print $_REQUEST['sedeBan'] : print"";
                       ?>">
                
                    </div>
                    
                        <input type="text" id="txtType" name="type" class="oculto">
                        
                        <input type="button" value="Guardar" class="btnverde" onclick="validar('save');">
                        <input type="button" value="Buscar" class="btnverde" onclick="validar('search');">
                        <input type="button" value="Editar" class="btnverde" onclick="validar('update');">
                        <input type="button" value="Eliminar" class="btnverde" onclick="validar('delete');">
                </form>   
            </div>
    <?php
                       require 'Modelo/banco.php';
                       require 'DAO/bancoDAO.php';
                       
                       $ban = new banco("", "", "", "", "");
                       $dao = new bancoDAO(1);
                       $dao ->listar($ban);
    ?>
                
 
        <?php
        if(isset($_REQUEST['message'])){
            echo $_REQUEST['message'];
        }

        if(isset($_REQUEST['ver'])){
        echo $_REQUEST['ver'];
   }
        ?>
            </div>
    </body>
</html>
