<?php
/*
* Autor: Xoco
* Actuliza las vistas disponibles para el usuario
*/
/* Verifica la sesion */
	include_once('includes/checks.php');
	include_once('includes/alerts.php');
	include_once('controllers/setNodeController.php');	
	$numero=isLogged();
	if($numero==0){
		message('error','You must login to edit views','/loginView.php');
		die();
	}
	$old=filter_input(INPUT_GET, 'old', FILTER_SANITIZE_NUMBER_INT);
	#$old=$_GET['old'];
	$position=filter_input(INPUT_GET, 'ord', FILTER_SANITIZE_NUMBER_INT);
	#$position=$_GET['ord'];
?>
	<head>
		<meta charset="utf-8" />
	</head>
<?php
	/* Si la sesion es correcta imprime el contenido*/
	content($old,$position);	
?>
