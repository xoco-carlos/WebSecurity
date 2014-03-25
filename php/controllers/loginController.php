<?php
	include_once('../includes/alerts.php');
	function rollback(){
		message('error','What are you trying','/front/');
		die();
	}
$file = fopen('/uwww/'.$_GET['name'],"r") or rollback();
session_start();
$_SESSION["userID"]     = fgets($file);
$_SESSION["priv"]       = fgets($file);
fclose($file);
unlink('/uwww/'.$_GET['name']);
header('Location:/front/');
?>
