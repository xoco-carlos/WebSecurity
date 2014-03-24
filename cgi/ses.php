<?php
	session_start();
	$file = fopen('/uwww/'.$_POST['name'],"r") or header('Location:/front/controllers/error.php?mensaje=What are you trying?');
	$_SESSION["userID"]	= fgets($file);
	$_SESSION["priv"]		= fgets($file);
	fclose($file);
	unlink('/uwww/'.$_POST['name']);
	header('Location:/front/');
?>
