<!DOCTYPE html>
<?php
/*
* Autor: Xoco
* Despliega mensajes de error
*/
?>
<html>
<body>

<h1>Error: <?php echo filter_input(INPUT_GET, 'mensaje', FILTER_SANITIZE_STRING);?></h1>
<a href="../addUserView.php">Regresar</a><!--stovar -->
<a href="<?php echo filter_input(INPUT_GET, 'referer', FILTER_SANITIZE_STRING);die(); ?>">index</a>
</body>
</html>
