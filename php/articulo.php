<?php
	include_once('models/Drupal.php');
	$articulo = new Drupal();
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
                <li><a href="index.php">Inicio</a></li>
                <li><a href="contenido.php">Contenido</a></li>
            </ul>
        </div>
        </br></br></br>
	<H1><?php echo $articulo->getTitulo($nodo); ?></H1>
	<H3><?php echo $articulo->getFecha($nodo); ?></H3>
	<H3><?php echo $articulo->getAutor($nodo); ?></H3>
	<p><?php echo $articulo->getContenido($nodo); ?></p>
	<img src=' <?php echo $articulo->getImagen($nodo); ?>'/>
	<form action="recibearticulo.php" method="post" id="form1">
			  <!-- <label class="nodo" for="element_1">Numero de nodo </label> -->
           <input type="hidden" name="nodo" width="48" height="48" value=<?php echo $nodo ?> readonly>
           <label class="comentario" for="element_1">Comentario </label>
           <!--<input type="textarea" name="comentario" width="48" height="48">-->
           <textarea rows="4" cols="50" name="comentario" form="form1">
           </textarea>
           <input type="submit" value="Submit">
	</form>
    </body>
</html>

