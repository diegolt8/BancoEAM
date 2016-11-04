<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
       
        <meta charset="UTF-8">
        <title></title>
        <link href="Recursos/css/css.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div>
        <div class="contenedor">

                <div class="contenedor2">
                    <a href="index.php" class="btnAdmin"><label>Inicio</label></a><br>
                    <a href="index.php?page=MasterPageBanco" class="btnBanco"><label>Banco</label></a><br>
                    <a href="index.php?page=Sucursal" class="btnSucursal"><label>Sucursal</label></a><br>
                    <a href="index.php?page=Municipio" class="btnSucursal"><label>Municipio</label></a><br>
                    <a href="index.php?page=Departamento" class="btnSucursal"><label>Departamento</label></a><br>
                    <a href="index.php?page=Pais" class="btnSucursal"><label>Pais</label></a><br>
                    <a href="index.php?page=GestionEmpleados" class="btnEmpleado"><label>Empleados</label></a><br>
                    <a href="index.php?page=Cargo" class="btnCargo"><label>Cargo</label></a><br>
                    <a href="index.php?page=juntaDirectiva" class="btnCuenta"><label>Junta</label></a><br>
                    

                </div>
                <div class="contenido">
                    <?php
                    if (isset($_REQUEST['page'])) {
                        include $_REQUEST['page'] . ".php";
                    } else {
                        include 'inicio.php';
                    }
                    ?>
                </div>
        </div>
        
        <form name="formularioLogOut" id="formLogOut" method="post"
              action="Controlador/gestionLogin.php"
            onsubmit="return logIn('desc');">
                  
            <table>
                <tr>
                    <td>
                        <input type="text" id="txtTypeLog" name="type" class="oculto">
                    </td>
                    <td>
                        <button type="submit" class="btnverde" value="desconectar" id="btnDesconectar">Desconectar</button>
                    </td>
                </tr>
            </table>
        </form>
       </div>
    </body>
</html>
