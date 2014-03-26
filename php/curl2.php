 <!-- stovar -->
<?php
$comentario = $_POST['comentario'];
$comentario	= filter_input(INPUT_POST, 'comentario', FILTER_SANITIZE_STRING);
echo $comentario;
/*$handler = curl_init("http://drupal.xoco.in/drupal7/?q=pbsccomentariosinsertasinsql/1/Comentarios%20desde%20php");
$response = curl_exec ($handler);
curl_close($handler);
echo $response;
*/


// http://php.net/manual/es/filter.filters.sanitize.php
?>
