<form action="curl2.php" method="post">
	<label class="comentario" for="element_1">Comentario </label>
	<input type="text" name="comentario" width="48" height="48">
	<input type="submit" value="Submit">
</form>
<?php
$comentario = $_POST['comentario'];
//$comentario	= filter_input(INPUT_POST, 'comentario', FILTER_SANITIZE_STRING);
$comentario	= filter_input(INPUT_POST, 'comentario', FILTER_SANITIZE_SPECIAL_CHARS);
echo $comentario;
/*$handler = curl_init("http://drupal.xoco.in/drupal7/?q=pbsccomentariosinsertasinsql/1/Comentarios%20desde%20php");
$response = curl_exec ($handler);
curl_close($handler);
echo $response;
*/


// http://php.net/manual/es/filter.filters.sanitize.php
?>
