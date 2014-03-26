 <!-- stovar -->
<form action="curl.php" method="post">
	<label class="comentario" for="element_1">Comentario </label>
	<input type="text" name="comentario" width="48" height="48">
	<input type="submit" value="Submit">
</form>
<?php
$comentario = $_POST['comentario'];
//$comentario	= filter_input(INPUT_POST, 'comentario', FILTER_SANITIZE_STRING);
$comentario	= filter_input(INPUT_POST, 'comentario', FILTER_SANITIZE_SPECIAL_CHARS);
$comentario = urlencode($comentario);
echo "urlencode " . $comentario;
echo "<br>";
$comentario = urldecode($comentario);
//$comentario = urldecode("http://urldecode.org/?decode=http%3A%2F%2Furldecode.org%2F");
echo "urldecode " . $comentario;
/*$handler = curl_init("http://drupal.xoco.in/drupal7/?q=pbsccomentariosinsertasinsql/1/Comentarios%20desde%20php");
$response = curl_exec ($handler);
curl_close($handler);
echo $response;
*/

// http://urldecode.org/
// http://php.net/manual/es/filter.filters.sanitize.php
// por post
// curl -vk --data 'numnodo=16&comentarionodo=Hola desde curl' http://drupal.xoco.in/drupal7/?q=pbsccomentariosinsertasinsql
?>
