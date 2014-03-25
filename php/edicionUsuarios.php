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
			include_once('includes/checks.php');
			include_once('includes/alerts.php');
			include_once('controllers/setNodeController.php');
			$numero=isLogged();
			if($numero==0){
				message('error','You must login to edit views','/front/loginView.php');
				die();
        }
			printUsers();
		?>
	</body>
<html>
