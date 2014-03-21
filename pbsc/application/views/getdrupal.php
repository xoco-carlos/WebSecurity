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
        <?php
            restget_page();
        ?>
    </body>
</html>
