<?php	
	/*
* Autor: Richard
* Colaboradores:
* Muestra una lista del contenido de drupal con su fecha de publicacion y un enlace al articulo.
*/
	
	include_once('models/Drupal.php');
	$articulo = new Drupal();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Contenido</title>
        <link rel="stylesheet" href="css/estilos.css">
    </head>
    <body>
        <div class="barra">
            <ul id="tope">
                <li><a href="index.php">Inicio</a></li>
            </ul>
        </div>
        </br></br></br>
	<table width=900 border=0>
	<?php 
		//Obtenemos el listado de articulos 
		$articulos=$articulo->getArticles();
		$total= count($articulos);
		for ($i = 0; $i < $total;$i++){ //Los mostramos en formato Fecha - Titulo
			echo "<TR>";
			echo "<TD width=300>".$articulos[$i]['Post date']."</TD>";
			echo "<TD width=600>
			<a title='".$articulos[$i]['title']."' href=articulo.php?art=".$articulos[$i]['Nid'].">".$articulos[$i]['title']."</TD>";
			echo "</TR>";
		}
	?>
	</table>
    </body>
</html>

