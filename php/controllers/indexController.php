<?php
/*
* Autor: Xoco
* Obtiene las vistas del usuario en turno
*/
	include_once dirname(__FILE__).('/../models/View.php');
	include_once dirname(__FILE__).('/../models/Drupal.php');
	session_start();
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
	function printNodes($array){
		$drupal = new Drupal();
		$i=0;
		foreach($array as $node){
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
