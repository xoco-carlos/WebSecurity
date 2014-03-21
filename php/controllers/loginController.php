<?php
	include_once('../models/User.php');
	include_once('../includes/alerts.php');
	$username   = filter_input(INPUT_POST, 'username',     FILTER_SANITIZE_STRING);
	$password   = filter_input(INPUT_POST, 'password',     FILTER_SANITIZE_STRING);
	$user=new User();
	$data=$user->login($username,$password);
	$user->getDB()->CloseConnection();
	if(isset($data['userID'])){
		session_start();
		$_SESSION['priv']=$data['type'];
		header('Location:/front/');
#		echo 'Iniciar sesion';
	}else{
		message("error","Invalid username or password");
	}
?>
