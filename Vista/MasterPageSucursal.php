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
        <script src="Recursos/js/ValidarSucursal.js" type="text/javascript"></script>
        <title></title>
    </head>
    <body>
        <div class="contenedor">
            <div class="clogin cregistro">
                <h1>Gestionar Banco</h1>
                <form name="formularioRegistroBan" id="formSuc"  method="post" action="Controlador/gestionSucursal.php">
                    <div class="ccampo">
                        <label for="txtAdmin">Nombre sucursal:</label>
                        <input type="text" id="txtNombreSuc" required name="nombreSuc" value="<?php
                        isset($_REQUEST['nombreSuc']) ?
                                        print $_REQUEST['nombreSuc'] : print"";
                        ?>">
                    </div>
                    <div class="ccampo">
                        <label for="txtPassword">Direccion sucursal:</label>
                        <input type="text" id="txtDirSuc" required name="direSuc" value="<?php
                        isset($_REQUEST['direSuc']) ?
                                        print $_REQUEST['direSuc'] : print"";
                        ?>">
                    </div>
                    <div class="ccampo">
                        <label for="txtPassword">Municipio:</label>
                        <input type="text" id="txtMuniSuc" required name="muniSuc" value="<?php
                        isset($_REQUEST['muniSuc']) ?
                                        print $_REQUEST['muniSuc'] : print"";
                        ?>">
                    </div>
                    <div class="ccampo">
                        <label for="txtPassword">Gerente:</label>
                        <input type="text" id="txtGerenteSuc" required name="gerenSuc" value="<?php
                        isset($_REQUEST['gerenSuc']) ?
                                        print $_REQUEST['gerenSuc'] : print"";
                        ?>">
                    </div>



                    <input type="text" id="txtType" name="type" class="oculto">

                    <input type="button" value="Guardar" class="btnverde" onclick="validarSucursal('save');">
                    <input type="button" value="Buscar" class="btnverde" onclick="validarSucursal('search');">
                    <input type="button" value="Editar" class="btnverde" onclick="validarSucursal('update');">
                    <input type="button" value="Eliminar" class="btnverde" onclick="validarSucursal('delete');">
                </form>   
            </div>
            <?php
            require 'Modelo/sucursal.php';
            require 'DAO/SucursalDAO.php';

            $suc = new sucursal("", "", "", "");
            $dao = new SucursalDAO(1);
            $dao->listar($suc);
            ?>


            <?php
            if (isset($_REQUEST['message'])) {
                echo $_REQUEST['message'];
            }

            if (isset($_REQUEST['ver'])) {
                echo $_REQUEST['ver'];
            }
            ?>
        </div>
    </body>
</html>
