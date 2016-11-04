<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="recursos/Js/acciones.js" type="text/javascript"></script>
        <link href="Recursos/css/css.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>

        <?php
        session_start();
        if (isset($_REQUEST['infoLogIn'])) {
            echo '<div class="msj">'.$_REQUEST['infoLogIn'].'</div>';
        }
        if (isset($_SESSION['nameUser'])) {
            if (isset($_SESSION['cargo'])) {
                echo '<div class="msj">Bienvenido(a) ' . $_SESSION['cargo'] . " " . $_SESSION['nameUser'].'</div>';
            } else {
                echo '<div class="msj">Bienvenido(a)' . $_SESSION['nameUser'].'</div>';
            }
        }
        if (isset($_SESSION['nameUser'])) {
            if (isset($_SESSION['cargo'])) {
                if ($_SESSION['cargo'] == "Administrador") {
                    include 'Vista/masterPageAdminstrador.php';
                } else if ($_SESSION['cargo'] == "Asesor") {
                    include 'Vista/masterPageAsesor.php';
                } else if ($_SESSION['cargo'] == "Cajero") {
                    include 'Vista/masterPageCajero.php';
                } else if ($_SESSION['cargo'] == "Gerente") {
                    include 'Vista/masterPageGerente.php';
                } else if ($_SESSION['cargo'] == "Cliente") {
                    include 'Vista/masterPageCliente.php';
                }
            }
        } else {
            include 'Vista/LogIn.php';
        }
        ?>
    </body>
</html>