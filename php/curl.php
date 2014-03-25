<?php
$handler = curl_init("http://drupal.xoco.in/drupal7/?q=pbsccomentariosinsertasinsql/1/Comentarios%20desde%20php");
$response = curl_exec ($handler);
curl_close($handler);
echo $response;
?>
