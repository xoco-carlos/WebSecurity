<?php

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Administración de usuarios</title>
        <link type="text/css" href="/css/estilos.css" rel="stylesheet"/>
    </head>
    <body>
        <div class="barra">
            <ul id="tope">
                <li><a href="indexAdmin.php">Inicio</a></li>
                <li><a href="cambiaVista.php">Editar vista</a></li>
                <li><a href="index.php">Salir</a></li>
            </ul>
        </div>
        <br>
        <H1 class="encabezado">Administración de usuarios.</H1>
        <hr>
        <br>
        <form action="adminusers.php" method="post">
            <INPUT TYPE="submit" NAME="Agregar Usuario" VALUE="Agregar">
        </form>
    </body>
</html>
