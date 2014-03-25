<?php
	function content($old,$ord){
		include_once dirname(__FILE__).('/../models/Drupal.php');
		#include_once('../models/Drupal.php');
		$articulo = new Drupal();
   	$articulos=$articulo->getArticles();
   	$total= count($articulos);
   	for ($i = 0; $i < $total;$i++){
	?>
	<form method="post" action="controllers/editViewController.php">
		<tr>
			<td width=600><?php echo $articulos[$i]['title'];?></td>
   	</tr>
		<input type="hidden" name="new" value="<?php echo $articulos[$i]['Nid'];?>">
		<input type="hidden" name="old" value="<?php echo $old;?>">
		<input type="hidden" name="ord" value="<?php echo $ord;?>">
		<input type="submit" value="Enviar">
	</form>
<?php
		}
	}
?>
