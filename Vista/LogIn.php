<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Iniciar sesion</title>
        <link href="../Recursos/css/css.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="contenedor">
            <div class="clogin">
                <h1>Iniciar Sesion</h1>
                <form name="formularioLogin" id="formLogIn" method="post" action="Controlador/gestionLogin.php" onsubmit="return logIn('con');">
                    <div class="ccampo">
                        <label for="txtAdmin">Nombre de usuario:</label>
                        <input type="text" class="campoLogin" id="txtAdmin" name="nickName" required>
                    </div>
                    <div class="ccampo">
                        <label for="txtPassword">Password:</label>
                        <input type="password" class="campoLogin" id="txtPassword" name="password" required>
                    </div>
                    <div class="ccampo">
                        <button type="submit" class="btnverde" id="btnLogin" class="ingresar" >Iniciar Sesion</button>
                    </div>
                    <p id="ore">- o -</p>
                    <div class="ccampo">
                        <button type="button" class="btnazul"  id="BRegi" class="registrar"  onclick="window.location.href = 'Vista/registroCliente.php'">Registrarme Gratis</button>
                    </div>
                    <input type="text" id="txtTypeLog" name="type" class="oculto">
                </form>   
            </div>    
        </div>
    </body>
</html>
