<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Actualiza Usuario</title>
        <link rel="stylesheet" href="css/estilos.css">
    </head>
    <body>
        <div class="barra">
            <ul id="tope">
				<li><a href="index.php">Volver al inicio</a></li>
            </ul>
        </div>
        </br></br></br>
		<?php 
			include_once("controllers/showUserController.php");
			printUsers();
		?>
	</body>
<html>