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
        <link href="../Recursos/css/css.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <form name="formularioSelect" method="post" action="Controlador/gestionCuenta.php">
            <input type="hidden" id="txtSelect" name="id">
            <input type="hidden" name="page" value="cuenta">
            <input type="hidden" name="type" id="txtType">
            
            <table>
                <tr>
                    <td>
                        <select name="cuenta" id="selCuenta"
                                onchange="listarCosto(formularioSelect);">
                            <option id="-1">Seleccione Tipo de cuenta</option>
                                <?php
                                require 'Modelo/cuenta.php';
                                require 'DAO/CuentaDAO.php';
                                $cuenta = new cuenta("", "");
                                $dao = new cuentaDAO(1);
                                $dao->listarCuenta($cuenta);
                                ?>
                        </select>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>
