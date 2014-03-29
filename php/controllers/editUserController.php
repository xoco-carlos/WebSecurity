<?php
/*
* Autor: Richard
* Colaboradores:
* Modifica ciertas caracteristicas de un usuario  
*/
	//Incluimos los archivos necesarios
	include_once dirname(__FILE__).('/../models/User.php');
	include_once dirname(__FILE__).('/../includes/alerts.php');
   include_once dirname(__FILE__).('/../includes/checks.php');
   $numero=isLogged();
   if($numero < 0){
	   message("error","Go home",'/front/loginView.php');
		die();
   }
	//Recibimos datos por post, sanitizando cadenas
	$accion	= filter_input(INPUT_POST, 'accion', FILTER_SANITIZE_STRING); #Accion=1 Modifica Username. Accion=2 Modifica contraseña. Accion=3 Borra usuario.
	$activo = filter_input(INPUT_POST, 'activo', FILTER_SANITIZE_STRING);
  if($activo==1){
	$user=new User();
	
	//Edicion del nombre de usuario y contraseña
   if($accion==1){
	$NewUsername	= filter_input(INPUT_POST, 'NewUsername', FILTER_SANITIZE_STRING);
	$OldUsername	= filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
	$email		= filter_input(INPUT_POST, 'email', 	FILTER_SANITIZE_STRING);
	if($user->isSign($NewUsername)==1){
		$user->updateName($NewUsername,$OldUsername);
		$user->updateEmail($email);	
		echo "User modified successfully<br>";
		echo "
		<form method=\"post\" action=\"../edicionUsuarios.php\">
			<input type=\"submit\" name=\"submit\" value=\"Regresar\" />
		</form>
		";
	}
	else{
		echo "User already exists<br>";
		echo "
		<form method=\"post\" action=\"../edicionUsuarios.php\">
			<input type=\"submit\" name=\"submit\" value=\"Regresar\" />
		</form>
		";
		}
   }
   //Edición de la contraseña de un usuario
   elseif ($accion==2){
	$username	= filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
	$password	= filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
	$password2	= filter_input(INPUT_POST, 'password2',FILTER_SANITIZE_STRING);
	if($password!=$password2){
		echo "Passwords doesn't match<br>";
		echo "
		<form method=\"post\" action=\"../edicionUsuarios.php\">
			<input type=\"submit\" name=\"submit\" value=\"Regresar\" />
		</form>
		";
	}
	else{
		$user->updatePassw($username,$password);
		echo "Password modified successfully<br>";
		echo "
		<form method=\"post\" action=\"../edicionUsuarios.php\">
			<input type=\"submit\" name=\"submit\" value=\"Regresar\" />
		</form>
		";
	}
   }
   //Usuario especificado será eliminado de la BD
   elseif ($accion==3){
	$username	= filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
	$user->deleteUser($username);
	echo "User deleted successfully<br>";
	echo "
		<form method=\"post\" action=\"../edicionUsuarios.php\">
			<input type=\"submit\" name=\"submit\" value=\"Regresar\" />
		</form>
		";
   }
   	$user->getDB()->CloseConnection(); //Cerramos la conexión a la BD
}
?>
