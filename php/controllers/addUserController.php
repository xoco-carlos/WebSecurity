<?php
	include_once('../models/User.php');
	include_once('../models/View.php');
	include_once('../includes/alerts.php');
	include_once('../includes/checks.php');
	$numero=isLogged();
	if($numero < 0){
		message("error","Go home",'/front/loginView.php');
	}
	$username	= filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
	$password	= filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
	$password2	= filter_input(INPUT_POST, 'password2',FILTER_SANITIZE_STRING);
	$email		= filter_input(INPUT_POST, 'email', 	FILTER_SANITIZE_STRING);
	$type			= filter_input(INPUT_POST, 'type', 		FILTER_SANITIZE_STRING);
	$type=='on'?$type=1:$type=0;
	if($password!=$password2){
		message("error","Passwords doesn't match",$_SERVER["HTTP_REFERER"]);
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
		message("success","User created successfully");
		#header('Location:'.$_SERVER["HTTP_REFERER"].'?mensaje=User '.$username.' created successfully');
   }
	else{
		message("error","User already exists",$_SERVER["HTTP_REFERER"]);
		die();
		#header('Location:'.$_SERVER["HTTP_REFERER"].'?mensaje=User '.$username.' already exists');
	}
?>
