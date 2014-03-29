<!--
Carmona Domínguez Ricardo Andrés
Archivo dedicado a mostrar una lista con los nombres de usuarios registrados, dando 
la opcion de modificar sus datos (nombre y mail), su contraseña o eliminarlos.

-->
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
		//Incluimos los archivos necesarios
			include_once("controllers/showUserController.php");
			include_once('includes/checks.php');
			include_once('includes/alerts.php');
			include_once('controllers/setNodeController.php');
			$numero=isLogged(); //Verificamos si quien visita la pagina es un usuario con una sesión activa
			if($numero==0){ 
				message('error','You must login to edit views','/front/loginView.php');
				die();
        }
			//Si el usuario tiene una sesion activa, mostramos la lista de usuarios
			printUsers();
		?>
	</body>
<html>
