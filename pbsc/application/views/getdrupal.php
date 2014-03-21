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
		if ($articulos[$i]['nid']==$nodo){
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
		if ($articulos[$i]['nid']==$nodo){
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
		if ($articulos[$i]['nid']==$nodo){
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
		if ($articulos[$i]['nid']==$nodo){
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
		if ($articulos[$i]['nid']==$nodo){
			$imagen=$articulos[$i]['Image'];
			break;
		}
	}
	return $imagen;
}
function restget_page() {
    $element = _get_element();
		$noArt=count($element);
		for ($i = 0 ;$i < $noArt; $i++){
			echo "<H1>Titulo: ". $element[$i]['title']."</H1><br>";
			echo "<H2>Autor: ". $element[$i]['autor']."</H2><br>";
			echo "<H2>Fecha: ". $element[$i]['Post date']."</H2><br>";
			echo "<p>". $element[$i]['contenido']."</p><br>";
			echo "<img src='". $element[$i]['Image']."'/><br>";
		}
    return 1;
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>
        <H1><?php echo $getTitulo(2); ?></H1>
		<H3><?php echo $getFecha(2); ?></H3>
		<H3><?php echo $getAutor(2); ?></H3>
		<p><?php echo $getContenido(2); ?></p>
		<img src='<?php echo $getImagen(2); ?>'/>
    </body>
</html>
