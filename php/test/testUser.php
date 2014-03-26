<?php 
	include('../models/User.php');
#$login      = filter_input(INPUT_POST, 'Usuario', FILTER_SANITIZE_STRING);
	$user=new User();
#	if($user->isSign('pepe')==1){
#		echo 'Insertar';
#	}else{
#		echo 'No insertar';
#	}
	$user->setName('juan');
	$user->setPassword('juan');
	$user->setEmail('juan@juan.com');
	$user->setTipo('0');
	$lastID=$user->insert();
	echo $lastID;
#	echo $user->db->getLastError();

?>
