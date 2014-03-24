<?php
	include_once('../models/User.php');
	include_once('../includes/alerts.php');
	$NewUsername	= filter_input(INPUT_POST, 'NewUsername', FILTER_SANITIZE_STRING);
	$OldUsername	= filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
	$accion			= filter_input(INPUT_POST, 'accion', FILTER_SANITIZE_STRING); #Accion=1 Modifica Username. Accion=2 Modifica contraseña. Accion=3 Borra usuario.
	
	$password	= filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
	$password2	= filter_input(INPUT_POST, 'password2',FILTER_SANITIZE_STRING);
	$email		= filter_input(INPUT_POST, 'email', 	FILTER_SANITIZE_STRING);
	$type		= filter_input(INPUT_POST, 'type', 		FILTER_SANITIZE_STRING);
	
   $user=new User();
   if($accion==1){
	if($user->isSign($username)==1){
		$user->updateName($username);
		$user->updateEmail($email);	
		message("success","User modified successfully");
	}
	else{
		message("error","User already exists");
		}
   }
   elseif ($accion==2){
	if($password!=$password2){
		message("error","Passwords doesn't match");
	}
	else{
		$user->updatePassw($password);
		message("success","Password modified successfully");
	}
   }
   elseif ($accion==3){
	$user->deleteUser($username);
	message("success","User deleted successfully");
   }
   	$user->getDB()->CloseConnection();
	
?>
