<?php
	include_once('../includes/alerts.php');
	function rollback(){
		message('error','What are you trying','/front/');
		die();
	}
$file = fopen('/uwww/'.filter_input(INPUT_GET, 'name', FILTER_SANITIZE_STRING),"r") or rollback();
session_start();
$_SESSION["userID"]     = fgets($file);
$_SESSION["priv"]       = fgets($file);
fclose($file);
unlink('/uwww/'.filter_input(INPUT_GET, 'name',FILTER_SANITIZE_STRING));
header('Location: /index.php');
?>
