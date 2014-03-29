<?php
/*
* Autor: Xoco
* Elimina la sesion de manera segura y redirige a la pagina de inicio
*/
	session_start();
	$_SESSION=array();
	session_unset();
	session_destroy();

header("location: /index.php");
exit();
?>
