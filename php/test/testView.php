<?php 
	include('../models/View.php');
#$login      = filter_input(INPUT_POST, 'Usuario', FILTER_SANITIZE_STRING);
	$view=new View();
	$view->setUserID(5);
   foreach($view->getAdminViews() as $value){
      $view->setViewID($value);
      echo $view->insert();
   }
	$view->getDB()->CloseConnection();
#	$view->getAdminViews();
#	$user->setName('juan');
#	$user->setPassword('juan');
#	$user->setEmail('juan@juan.com');
#	$user->setTipo('1');
#	$lastID=$user->insert();
#	echo $lastID;
#	echo $user->db->getLastError();

?>
