<?php
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
				echo '<div class="column">';
			}
			if($i==3||$i==6){
				echo '</div><div class="column">';
			}
			echo '<div class="portlet">
						<div class="portlet-header">';
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
				echo '<div class="column">';
			}
			if($i==3||$i==6){
				echo '</div><div class="column">';
			}
			echo '<form method="get" action="setNodeView.php"><div class="portlet">
						<div class="portlet-header">';
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
				<input type="submit" value="Modificar"/>
				</form>';
			if($i==8){
				echo '</div>';
			}
			$i++;
		}
	}
?>
