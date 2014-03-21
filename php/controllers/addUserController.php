<?php
	include('../models/User.php');
	include('../models/View.php');
	$username	= filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
	$password	= filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
	$password2	= filter_input(INPUT_POST, 'password2',FILTER_SANITIZE_STRING);
	$email		= filter_input(INPUT_POST, 'email', 	FILTER_SANITIZE_STRING);
	$type			= filter_input(INPUT_POST, 'type', 		FILTER_SANITIZE_STRING);
	$type=='on'?$type=1:$type=0;
	if($password!=$password2){
		header('Location:'.$_SERVER["HTTP_REFERER"].'?mensaje=Contrasenas no coinciden');
	}
	$user=new User();
   $view=new View();
	if($user->isSign($username)==1){
		$user->setName($username);
		$user->setPassword($password);
		$user->setEmail($email);
		$user->setTipo($type);
		$lastID=$user->insert();
		$view->setUserID($lastID);
		foreach($view->getAdminViews() as $value){
			$view->setViewID($value);
			$view->insert();
		}
		$view->getDB()->CloseConnection();
		$user->getDB()->CloseConnection();
		header('Location:'.$_SERVER["HTTP_REFERER"].'?mensaje=User '.$username.' created successfully');
   }
	else{
		header('Location:'.$_SERVER["HTTP_REFERER"].'?mensaje=User '.$username.' already exists');
	}
?>
