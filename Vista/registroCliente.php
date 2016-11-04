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
        <title></title>
    </head>
    
    <body>
        <div class="contenedor">
            <div class="clogin cregistro">
                <h1>Registrar Cliente</h1>
                <form name="formularioRegistro" id="formReg"  method="post" action="../Controlador/gestionCliente.php" onsubmit="return logIn('con');">
                    <div class="ccampo">
                        <label for="txtAdmin">Nombre Completo:</label>
                        <input type="text" id="txtNombre" required name="nombreCli" value="<?php
                        isset($_REQUEST['nombreCli']) ?
                                        print $_REQUEST['nombreCli'] : print"";
                        ?>">
                    </div>
                    <div class="ccampo">
                        <label for="txtPassword">Apellido:</label>
                        <input type="text" id="txtApellido" required required name="apellidoCli" value="<?php
                        isset($_REQUEST['apellidoCli']) ?
                                        print $_REQUEST['apellidoCli'] : print"";
                        ?>">
                    </div>
                    <div class="ccampo">
                        <label for="txtPassword">Cedula:</label>
                        <input type="text" id="txtCedula" required required name="cedulaCli" value="<?php
                        isset($_REQUEST['cedulaCli']) ?
                                        print $_REQUEST['cedulaCli'] : print"";
                        ?>">
                    </div>
                    <div class="ccampo">
                        <label for="txtPassword">Nickname:</label>
                        <input type="text" id="txtNickname" required name="nickCli" value="<?php
                        isset($_REQUEST['nickCli']) ?
                                        print $_REQUEST['nickCli'] : print"";
                        ?>">
                    </div>
                    <div class="ccampo">
                        <label for="txtPassword">Password:</label>
                        <input type="password" id="txtPassword" required name="passCli" value="<?php
                        isset($_REQUEST['passCli']) ?
                                        print $_REQUEST['passCli'] : print"";
                        ?>">
                    </div>
                    <div class="ccampo">
                        <label for="txtPassword">Verifique Password:</label>
                        <input type="password" id="txtPasswordv" required name="verPass" value="<?php
                        isset($_REQUEST['verPass']) ?
                                        print $_REQUEST['verPass'] : print"";
                        ?>">
                    </div>
                    </div>
                    <div class="ccampo">
                        <button type="submit" class="btnverde" id="BRegistrar">Registrar Cliente</button>
                    </div>
                    <p id="ore">- o -</p>
                    <div class="ccampo">
                        <button type="button" class="btnazul" onclick="window.location.href = 'logIn.php'">Iniciar Sesion</button>
                    </div>
                </form>   
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
