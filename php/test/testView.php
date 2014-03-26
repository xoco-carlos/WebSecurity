<?php 
	include('../models/View.php');
#$login      = filter_input(INPUT_POST, 'Usuario', FILTER_SANITIZE_STRING);
	$view=new View();
	$view->setUserID(4);
	$cont=1;
   foreach($view->getAdminViews() as $value){
      $view->setViewID($value);
      $view->setOrder($cont);
      echo $view->insert();
		$cont++;
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
