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
          <table border ="1" >

            <tr>
                <td class="menu">
                    <a href="index.php"><label>Cajeroooooo</label></a><br>
                    


                </td>
                <td class="contenido">
                    <?php
                    if (isset($_REQUEST['page'])) {
                        include $_REQUEST['page'] . ".php";
                    } else {
                        include 'inicio.php';
                    }
                    ?>
                </td>
            </tr>   
        </table>
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
    </body>
</html>
