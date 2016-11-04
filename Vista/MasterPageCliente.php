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
        <script src="Recursos/js/Validar.js.js" type="text/javascript"></script>
        <title></title>
    </head>
    <body>
        <div >
        
          <table border ="3" >

            <tr>
                <td class="menu">
                    <a href="index.php"><label>administrador</label></a><br>
                    <a href="index.php?page=MasterPageBanco"><label>Banco</label></a><br>
                     <a href="index.php?page=MasterPageSucursal"><label>Sucursal</label></a><br>
                    


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
       </div>
    </body>
</html>
