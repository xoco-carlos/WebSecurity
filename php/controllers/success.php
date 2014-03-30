<!DOCTYPE html>
<?php
/*
* Autor: Xoco
* Pagina que imprime mensajes de exito
*/
?>
<html>
<body>

<h1>Success: <?php echo filter_input(INPUT_GET, 'mensaje', FILTER_SANITIZE_STRING);?></h1>
<a href="<?php echo filter_input(INPUT_GET, 'referer', FILTER_SANITIZE_STRING);?>">Back</a>
</body>
</html>
