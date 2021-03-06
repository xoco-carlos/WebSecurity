<!--
Carmona Domínguez Ricardo Andrés
Archivo dedicado a mostrar un formulario que dependiendo de la información recibida mostrará
un formulario distinto para modificar la información de un usuario.

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
                <li><a href="edicionUsuarios.php">Regresar</a></li>
            </ul>
        </div>
        </br></br></br>
<?php
	//Incluimos los archivos necesarios para el funcionamiento
	include_once dirname(__FILE__).('/../models/User.php');
	include_once("controllers/editUserController.php");
	include_once('includes/checks.php');
	include_once('includes/alerts.php');
	include_once('controllers/setNodeController.php');
	$numero=isLogged();
	if($numero==0){
		message('error','You must login to edit views','/front/loginView.php');
		die();
	}
	//Recibimos los datos necesarios para hacer las actualizaciones en la BD
	$username	= filter_input(INPUT_POST, 'User', FILTER_SANITIZE_STRING);
	$accion = filter_input(INPUT_POST, 'accion', FILTER_SANITIZE_STRING);
	$activo = filter_input(INPUT_POST, 'activo', FILTER_SANITIZE_STRING);
	
	//Instaciamos un objeto del tipo usuario para poder hacer las modificaciones necesarias
	$user=new User();
	
	//Dependiendo de la acción recibida, mostramos un formulario diferente. Enviamos los datos que el usuario introduzca y el tipo de acción
	if($accion == 1){
		
	?>
		<form method="post" action="controllers/editUserController.php">
			<label class="description" for="element_1">Username </label>
			<input name="NewUsername" class="element text medium" type="text" maxlength="255" value="<?php echo $username;?>"/> </br>
			<label class="description" for="element_1">Email </label>
			<input name="email" class="element text medium" type="text" maxlength="255" value="<?php echo $user->getMail($username);?>"/> </br>
			<INPUT TYPE="hidden" NAME="accion" VALUE=1>
			<INPUT TYPE="hidden" NAME="activo" VALUE=1>
			<INPUT TYPE="hidden" NAME="username" VALUE="<?php echo $username;?>">
			<input class="button_text" type="submit" name="submit" value="Actualizar" />
		</form>
	<?php
	}
	elseif ($accion == 2){
	?>
		<form method="post" action="controllers/editUserController.php">
			<label class="description" for="element_1">Contrasena </label>
			<input name="password" class="element text medium" type="password" maxlength="255"/> </br>
			<label class="description" for="element_1">Verifique contrasena </label>
			<input name="password2" class="element text medium" type="password" maxlength="255"/> </br>
			<INPUT TYPE="hidden" NAME="accion" VALUE=2>
			<INPUT TYPE="hidden" NAME="activo" VALUE=1>
			<INPUT TYPE="hidden" NAME="username" VALUE="<?php echo $username;?>">
			<input class="button_text" type="submit" name="submit" value="Actualizar" />
		</form>
	<?php
	}
	elseif ($accion == 3){
	?>
		El usuario <?php echo $username;?> será eliminado, si desea cancelar la operacion dé click en el botón regresar.<br>
		<form method="post" action="controllers/editUserController.php">
			<INPUT TYPE="hidden" NAME="accion" VALUE=3>
			<INPUT TYPE="hidden" NAME="activo" VALUE=1>
			<INPUT TYPE="hidden" NAME="username" VALUE="<?php echo $username;?>">
			<input class="button_text" type="submit" name="submit" value="Eliminar" />
		</form>
	<?php
	}
	else{
		echo "Accion No valida!!<br>";
	?>
		<form method="post" action="edicionUsuarios.php">
			<input class="button_text" type="submit" name="submit" value="Regresar" />
		</form>
	<?php
	}
	?>

	</body>
</html>
