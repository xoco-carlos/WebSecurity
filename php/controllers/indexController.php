<?php
/*
<<<<<<< HEAD
<<<<<<< HEAD
* Autor: Xoco
* Obtiene las vistas del usuario en turno
=======
* Autor: Xoco, Richard
* Regresa las vistas asociadas al usuario indicado.
>>>>>>> a3944903d61e2df213014e6c55f33e74b4cbae4a
=======
* Autor: Xoco, Richard
* Regresa las vistas asociadas al usuario indicado.
>>>>>>> a3944903d61e2df213014e6c55f33e74b4cbae4a
*/
	include_once dirname(__FILE__).('/../models/View.php');
	include_once dirname(__FILE__).('/../models/Drupal.php');
	session_start(); //Iniciamos una sesión
	
	//Dependiendo del tipo de usuario, se ejecutara una función que regresara sus vistas asociadas
	function views(){
		$vista = new View();
		if(isset($_SESSION['userID'])){
			if($_SESSION['priv']==1){
				return $vista->getAdminViews();
			}
			else{
				return $vista->getUserViews($_SESSION['userID']);
			}
		}
		else{
			return $vista->getAdminViews();
		}
	}
	
	//Imprime en formato de casillas 3x3 las vistas que podra ver un usuario sin cuenta
	function printNodes($array){
		$drupal = new Drupal();
		$i=0;
		foreach($array as $node){ // Este for es el encargado de dar un orden a las vistas, imprimiendolas por columnas de 3
			//El codigo html obtendra sus estilos de las archivos incluidos en el index.php
			//Se utilizan a la vez funciones del modelo Drupal que obtendran los datos del servidor drupal para mostrarlos en las casillas
			if($i==0){
				echo '<div class="column ui-sortable">';
			}
			if($i==3||$i==6){
				echo '</div><div class="column ui-sortable">';
			}
			echo '<div class="portlet ui-widget ui-widget-content ui-helper-clearfix ui-corner-all">
						<div class="portlet-header ui-widget-header ui-corner-all">
						<span class="ui-icon ui-icon-minusthick portlet-toggle"></span>';
							echo $drupal->getTitulo($node);
			echo '	</div>
					<div class="portlet-content">
						<a title="';
			echo 			$drupal->getTitulo($node);
			echo '" href="articulo.php?art='.$node.'">
						<img src="';
			echo 			$drupal->getImagen($node);
			echo '" width="130px" height="140px"/>
						</a>
					</div>
				</div>';
			if($i==8){
				echo '</div>';
			}
			$i++;
		}
	}
	
	//Esta funcion actua de forma similar a la de un usuario no logeado, con la diferencia que esta muestra un boton que permite
	//modificar una noticia asociada a una casilla especifica.
	function printNodesLogged($array){
		$drupal = new Drupal();
		$i=0;
		foreach($array as $node){
			if($i==0){
				echo '<div class="column ui-sortable">';
			}
			echo '<form method="get" action="setNodeView.php">';
			if($i==3||$i==6){
				echo '</div><div class="column ui-sortable">';
			}
			echo '<div class="portlet ui-widget ui-widget-content ui-helper-clearfix ui-corner-all">
						<div class="portlet-header ui-widget-header ui-corner-all">
						<span class="ui-icon ui-icon-minusthick portlet-toggle"></span>';
							echo $drupal->getTitulo($node);
			echo '	</div>
					<div class="portlet-content">
						<a title="';
			echo 			$drupal->getTitulo($node);
			echo '" href="articulo.php?art='.$node.'">
						<img src="';
			echo 			$drupal->getImagen($node);
			echo '" width="130px" height="140px"/>
						</a>
					</div>
				<input type="hidden" name="old" value="'.$node.'">
				<input type="hidden" name="ord" value="'.($i+1).'">
				<input type="submit" value="Modificar"/>
				</form>
				</div>';
			if($i==8){
				echo '</div>';
			}
			$i++;
		}
	}
/*	function printNodesLogged($array){
		$drupal = new Drupal();
		$i=0;
		foreach($array as $node){
			if($i==0){
				echo '<div class="column ui-sortable">';
			}
			if($i==3||$i==6){
				echo '</div><div class="column ui-sortable">';
			}
			echo '<form method="get" action="setNodeView.php">
				<div class="portlet ui-widget ui-widget-content ui-helper-clearfix ui-corner-all">
						<div class="portlet-header ui-widget-header ui-corner-all">
						<span class="ui-icon ui-icon-minusthick portlet-toggle"></span>';
							echo $drupal->getTitulo($node);
			echo '	</div>
					<div class="portlet-content">
						<a title="';
			echo 			$drupal->getTitulo($node);
			echo '" href="articulo.php?art='.$node.'">
						<img src="';
			echo 			$drupal->getImagen($node);
			echo '" width="130px" height="140px"/>
						</a>
					</div>
				</div>
				<input type="hidden" name="old" value="'.$node.'">
				<input type="hidden" name="ord" value="'.($i+1).'">
				<input type="submit" value="Modificar"/>
				</form>';
			if($i==8){
				echo '</div>';
			}
			$i++;
		}
	}*/
?>
