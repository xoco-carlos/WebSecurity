<?php
/*
* Autor: Richard
* Colaboradores:
* Muestra el contenido de un articulo asociado a un nodo especificado. Incluye un formulario encargado de enviar comentarios.
*/

	include_once('models/Drupal.php');
	$articulo = new Drupal();
	$nodo = $_GET['art'];
?>
<!DOCTYPE html>
<!--
	Recibimos el nodo por metodo GET, utilizamos funciones de la clase drupal para mostrar el contenido 
-->
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
    </body>
</html>
<?php
/*$handler = curl_init("http://drupal.xoco.in/drupal7/?q=pbsccomentariosinsertasinsql/5/Comentarios%20desde%20php%205");
$response = curl_exec ($handler);
curl_close($handler);
echo $response;*/

// Crear un nuevo recurso cURL
$ch = curl_init();

// Establecer URL y otras opciones apropiadas
curl_setopt($ch, CURLOPT_URL, "http://drupal.xoco.in/drupal7/?q=pbsccomentariosinsertasinsql/5/Comentarios%20desde%20php%206");
curl_setopt($ch, CURLOPT_HEADER, 0);

// Capturar la URL y pasarla al navegador
curl_exec($ch);

// Cerrar el recurso cURL y liberar recursos del sistema
curl_close($ch);
?>
?>
