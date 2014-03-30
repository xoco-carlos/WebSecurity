<?php
/*
* Autor: Xoco
* Agrega un nuevo usuario a la base de datos
*/
	require_once dirname(__FILE__).('/../models/User.php');
	require_once dirname(__FILE__).('/../models/View.php');
	require_once dirname(__FILE__).('/../includes/alerts.php');
	require_once dirname(__FILE__).('/../includes/checks.php');
	$numero=isLogged();
	/*Verifica que sea un usuario administrador*/
	if($numero!=2){
		message("error","Go home",'/loginView.php');
		die();
	}
	/*Sanitiza las entradas*/
	$username	= filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
	$password	= filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
	$password2	= filter_input(INPUT_POST, 'password2',FILTER_SANITIZE_STRING);
	$type			= filter_input(INPUT_POST, 'type', FILTER_SANITIZE_STRING);
	$email		= filter_input(INPUT_POST, 'email',FILTER_SANITIZE_EMAIL);
	$type=='on'?$type=1:$type=0;
	/*Verifica que los passwords coincidan*/
	if($password!=$password2){
		message("error","Passwords doesn't match",'/addUserView.php');
		die();
	}
	/*Verifica que los campos no esten vacios*/
	if($username=='' || $password=='' || $email=='' ){
		message("error","Fill all fields",'/addUserView.php');
		die();
	}
	/*Crea los objetos correspondientes para insertarlos en la base*/
	$user=new User();
   $view=new View();
	/*Verifica si el usuario ya existe*/
	if($user->isSign($username)==1){
		/*Coloca los valores a insertar en el usuario*/
		$user->setName($username);
		$user->setPassword($password);
		$user->setEmail($email);
		$user->setTipo($type);
		$lastID=$user->insert();
		/*Coloca los valores o insertar en las vistas*/
		$view->setUserID($lastID);
		$order=1;
		foreach($view->getAdminViews() as $value){
			$view->setOrder($order);
			$view->setViewID($value);
			$view->insert();
			$order++;
		}
		/*Cierra conexion a la base de datos*/
		$view->getDB()->CloseConnection();
		$user->getDB()->CloseConnection();
		//message("success","User created successfully","/front/");
		message("success","User created successfully","/index.php");//stovar
   }
	else{
		echo "El usuario ya existe";
		//message("error","User already exists","/front/loginView.php");
		message("error","User already exists","/loginView.php");//stovar
		die();
	}
?>
