<?php
	require_once dirname(__FILE__).('/../models/User.php');
	include_once dirname(__FILE__).('/../models/View.php');
	include_once dirname(__FILE__).('/../includes/alerts.php');
	include_once dirname(__FILE__).('/../includes/checks.php');
	$numero=isLogged();
	if($numero==0){
		message("error","Go home",'/front/loginView.php');
		die();
	}
	$username	= filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
	$password	= filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
	$password2	= filter_input(INPUT_POST, 'password2',FILTER_SANITIZE_STRING);
	$type			= filter_input(INPUT_POST, 'type', FILTER_SANITIZE_STRING);
	$email		= filter_input(INPUT_POST, 'email',FILTER_SANITIZE_EMAIL);
	$type=='on'?$type=1:$type=0;
	if($password!=$password2){
		message("error","Passwords doesn't match",'/front/addUserView.php');
		die();
	}
	if($username=='' || $password=='' || $email=='' ){
		message("error","Fill all fields",'/front/addUserView.php');
		die();
	}
#	message("error",$username.' '.$password.' '.$email.' '.$type,'/front/addUserView.php');
/*
	echo "Name: {$username}";
	echo "Pass: {$password}";
	echo "mail {$email}";
	echo "type: {$type}";*/
	$user=new User();
   $view=new View();
	if($user->isSign($username)==1){
		$user->setName($username);
		echo $username;
		echo '</br>';
		$user->setPassword($password);
		echo $password;
		echo '</br>';
		$user->setEmail($email);
		echo $email;
		echo '</br>';
		$user->setTipo($type);
		echo $type;
		echo '</br>';
		$lastID=$user->insert();
		echo $lastID;
		echo '</br>';
		$view->setUserID($lastID);
		$order=1;
		foreach($view->getAdminViews() as $value){
			$view->setOrder($order);
			$view->setViewID($value);
			echo $view->insert();
			echo $order++;
		}
		$view->getDB()->CloseConnection();
		$user->getDB()->CloseConnection();
		echo "Se agrego el usuario";
	#	message("success","User created successfully","/front/");
		#header('Location:'.$_SERVER["HTTP_REFERER"].'?mensaje=User '.$username.' created successfully');
   }
	else{
		echo "El usuario ya existe";
	#	message("error","User already exists","/front/loginView.php");
	#	die();
		#header('Location:'.$_SERVER["HTTP_REFERER"].'?mensaje=User '.$username.' already exists');
	}
?>
