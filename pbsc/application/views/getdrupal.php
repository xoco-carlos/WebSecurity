<?php

class Articulos{
	public function getArticles() {
	    // Get the arrays with all the articles.
	    $uri = "http://drupal.xoco.in/drupal7/?q=json";
	    $response = file_get_contents($uri); 
	    //$prueba=json_decode($response,TRUE);
	    // This will return an array, if you want an object, use json_decode($response) directly. 
	    return json_decode($response,TRUE);//$prueba;
	}

	public function getTitulo($nodo){
		$titulo = "";
		$articulos = $this->getArticles();
		$noArt = count($articulos);
		for ($i = 0 ;$i < $noArt; $i++){
			if ($articulos[$i]['Nid']==$nodo){
				$titulo=$articulos[$i]['title'];
				break;
			}
		}
		return $titulo;
	}
	
	public function getContenido($nodo){
		$contenido = "";
		$articulos = $this->getArticles();
		$noArt = count($articulos);
		for ($i = 0 ;$i < $noArt; $i++){
			if ($articulos[$i]['Nid']==$nodo){
				$contenido=$articulos[$i]['contenido'];
				break;
			}
		}
		return $contenido;
	}
	
	public function getFecha($nodo){
		$fecha = "";
		$articulos = $this->getArticles();
		$noArt = count($articulos);
		for ($i = 0 ;$i < $noArt; $i++){
			if ($articulos[$i]['Nid']==$nodo){
				$fecha=$articulos[$i]['Post date'];
				break;
			}
		}
		return $fecha;
	}

	public function getAutor($nodo){
		$autor = "";
		$articulos = $this->getArticles();
		$noArt = count($articulos);
		for ($i = 0 ;$i < $noArt; $i++){
			if ($articulos[$i]['Nid']==$nodo){
				$autor=$articulos[$i]['autor'];
				break;
			}
		}
		return $autor;
	}

	public function getImagen($nodo){
		$imagen = "";
		$articulos = $this->getArticles();
		$noArt = count($articulos);
		for ($i = 0 ;$i < $noArt; $i++){
			if ($articulos[$i]['Nid']==$nodo){
				$imagen=$articulos[$i]['Image'];
				break;
			}
		}
		return $imagen;
	}

}
?>
