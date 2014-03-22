<?php
/**
 * Get the articles as json format.
 * @param $uri the URI to get
 * @return array
 */
function getArticles() {
    // Get the arrays with all the articles.
    $uri = "http://drupal.xoco.in/drupal7/?q=json";
    $response = file_get_contents($uri); 
    //$prueba=json_decode($response,TRUE);
    // This will return an array, if you want an object, use json_decode($response) directly. 
    return json_decode($response,TRUE);//$prueba;
}

function getTitulo($nodo){
	$titulo = "";
	$articulos = getArticles();
	$noArt = count($articulos);
	for ($i = 0 ;$i < $noArt; $i++){
		if ($articulos[$i]['Nid']==$nodo){
			$titulo=$articulos[$i]['title'];
			break;
		}
	}
	return $titulo;
}
function getContenido($nodo){
	$contenido = "";
	$articulos = getArticles();
	$noArt = count($articulos);
	for ($i = 0 ;$i < $noArt; $i++){
		if ($articulos[$i]['Nid']==$nodo){
			$contenido=$articulos[$i]['contenido'];
			break;
		}
	}
	return $contenido;
}
function getFecha($nodo){
	$fecha = "";
	$articulos = getArticles();
	$noArt = count($articulos);
	for ($i = 0 ;$i < $noArt; $i++){
		if ($articulos[$i]['Nid']==$nodo){
			$fecha=$articulos[$i]['Post date'];
			break;
		}
	}
	return $fecha;
}

function getAutor($nodo){
	$autor = "";
	$articulos = getArticles();
	$noArt = count($articulos);
	for ($i = 0 ;$i < $noArt; $i++){
		if ($articulos[$i]['Nid']==$nodo){
			$autor=$articulos[$i]['autor'];
			break;
		}
	}
	return $autor;
}

function getImagen($nodo){
	$imagen = "";
	$articulos = getArticles();
	$noArt = count($articulos);
	for ($i = 0 ;$i < $noArt; $i++){
		if ($articulos[$i]['Nid']==$nodo){
			$imagen=$articulos[$i]['Image'];
			break;
		}
	}
	return $imagen;
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>
        <H1><?php echo getTitulo(1); ?></H1>
		<H3><?php echo getFecha(1); ?></H3>
		<H3><?php echo getAutor(1); ?></H3>
		<p><?php echo getContenido(1); ?></p>
		<img src=' <?php echo $getImagen(1); ?>'/>
    </body>
</html>
