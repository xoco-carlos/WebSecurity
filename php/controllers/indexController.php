<?php
	include_once dirname(__FILE__).('/../models/View.php');
	include_once dirname(__FILE__).('/../models/Drupal.php');
	session_start();
	function printHeader(){
		$vista = new View();
		if(isset($_SESSION['userID'])){
			if($_SESSION['priv']==1){
				$option='
					<a href=view/addUser.php>Add User</a>|
					<a href=view/setView.php>Edit View</a>|
					<a href=logout.php>Log out</a>
				';
				return $vista->getAdminViews();
			}
			else{
				$option='
					<a href=view/setView.php>Edit View</a>|
					<a href=logout.php>Log out</a>
				';
				return $vista->getUserViews($_SESSION['userID']);
			}
		}
		else{
			$option='
				<a href=/cgi/index.html>Log In</a>
			';
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
#			echo 			$drupal->getImagen($node);
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
			echo '<form method="post" action="controllers/selectNewNodeController.php"><div class="portlet">
						<div class="portlet-header">';
							echo $drupal->getTitulo($node);
			echo '	</div>
					<div class="portlet-content">
						<a title="';
			echo 			$drupal->getTitulo($node);
			echo '" href="articulo.php?art='.$node.'">
						<img src="';
#			echo 			#$drupal->getImagen($node);
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
