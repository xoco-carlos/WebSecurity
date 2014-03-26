<!DOCTYPE html>
<?php 
	include_once("controllers/indexController.php");
	include_once("includes/checks.php");
	$numero=isLogged();
?>
<html lang="en">
    <head>
		<meta charset="utf-8" />
		<title>Front-End</title>
		<link rel="stylesheet" href="css/mosaico.css">
		<link rel="stylesheet" href="css/jquery-ui.css">
		<link rel="stylesheet" href="css/estilos.css"> 
	</head>
	<body>
		
		<div id="vertical-margin">
	<?php include_once("includes/header.php");
		if($numero==0){
			printNodes(views());
		}else{
			printNodesLogged(views());
		}
	?>
		</div>
	</body>
<html>
