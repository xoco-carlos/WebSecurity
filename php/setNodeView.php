<?php
	include_once('includes/checks.php');
	include_once('includes/alerts.php');
	include_once('controllers/setNodeController.php');	
	$numero=isLogged();
	if($numero==0){
		message('error','You must login to edit views','/front/loginView.php');
		die();
	}
	$old=$_GET['old'];
?>
	<head>
		<meta charset="utf-8" />
	</head>
<?php
	content($old);	
?>
