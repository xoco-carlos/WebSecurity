<!DOCTYPE html>
<?php 
	include_once("controllers/indexController.php");
?>
<html lang="en">
    <head>
		<meta charset="utf-8" />
		<title></title>
		<script src="js/jquery-1.9.1.js"></script>
		<script src="js/jquery-ui.js"></script>
		<script src="js/mosaico.js"></script>
		<link rel="stylesheet" href="css/mosaico.css">
		<link rel="stylesheet" href="css/jquery-ui.css">
		<link rel="stylesheet" href="css/estilos.css"> 
	</head>
	<body>
		<div id="vertical-margin">
	<?php include_once("includes/header.php");
				printNodes(printHeader());
	?>
		</div>
	</body>
<html>
