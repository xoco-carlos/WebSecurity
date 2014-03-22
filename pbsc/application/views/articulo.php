<?php
	include 'getdrupal.php';
	$articulo = new Articulos;
	$nodo = $_GET['art'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Articulo - <?php echo $articulo->getTitulo($nodo);?></title>
        <link rel="stylesheet" href="css/estilos.css">
    </head>
    <body>
        <div class="barra">
            <ul id="tope">
                <li><a href="index2.php">Inicio</a></li>
                <li><a href="contenido.php">Contenido</a></li>
            </ul>
        </div>
        </br></br></br>
	<H1><?php echo $articulo->getTitulo($nodo); ?></H1>
	<H3><?php echo $articulo->getFecha($nodo); ?></H3>
	<H3><?php echo $articulo->getAutor($nodo); ?></H3>
	<p><?php echo $articulo->getContenido($nodo); ?></p>
	<img src=' <?php echo $articulo->getImagen($nodo); ?>'/>
    </body>
</html>
