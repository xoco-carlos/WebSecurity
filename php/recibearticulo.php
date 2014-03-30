<!-- stovar -->
<?php
header('Location: ' . getenv('HTTP_REFERER'));
// stovar
/*$handler = curl_init("http://drupal.xoco.in/drupal7/?q=pbsccomentariosinsertasinsql/5/Comentarios%20desde%20php%205");
$response = curl_exec ($handler);
curl_close($handler);
echo $response;*/

// Crear un nuevo recurso cURL
	//$ch = curl_init();

// Establecer URL y otras opciones apropiadas
//curl_setopt($ch, CURLOPT_URL, "http://drupal.xoco.in/drupal7/?q=pbsccomentariosinsertasinsql/5/Comentarios%20desde%20php%206");
//curl_setopt($ch, CURLOPT_HEADER, 0);

// Capturar la URL y pasarla al navegador
//curl_exec($ch);

// Cerrar el recurso cURL y liberar recursos del sistema
//curl_close($ch);

//<!-- stovar -->
//$numnodo = $_POST['nodo'];
//$comentarionodo = $_POST['comentario'];
//$numnodo  = filter_input(INPUT_POST, 'nodo', FILTER_SANITIZE_NUMBER_INT);
$numnodo  = filter_input(INPUT_POST, 'nodo', FILTER_SANITIZE_NUMBER_INT);
//$comentarionodo = filter_input(INPUT_POST, 'comentario', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$comentarionodo = filter_input(INPUT_POST, 'comentario', FILTER_SANITIZE_STRING);
$numnodo = urlencode($numnodo);
echo "urlencode " . $numnodo;
echo "<br>";
	$comentarionodo = htmlspecialchars($comentarionodo, ENT_QUOTES);
echo "htmlspecialchars" . $comentarionodo;
$comentarionodo = urlencode($comentarionodo);
//$comentario = urldecode("http://urldecode.org/?decode=http%3A%2F%2Furldecode.org%2F");
echo "<br>urlencode " . $comentarionodo;

//iniciamos curl
$ch = curl_init('http://drupal.xoco.in/drupal7/?q=pbsccomentariosinsertasinsql');
 
//especificamos el POST 
curl_setopt ($ch, CURLOPT_POST, 1);
 
//enviamos los parametros
curl_setopt ($ch, CURLOPT_POSTFIELDS, "numnodo=$numnodo&comentarionodo=$comentarionodo");
 
//le decimos que queremos recoger una respuesta, true o false si no queremos 
curl_setopt($ch,CURLOPT_RETURNTRANSFER,false);
 
//obtenemos la respuesta
$respuesta = curl_exec ($ch);
 
//o el error, por si falla
$error = curl_error($ch);
 
//cerramos curl
curl_close ($ch);
?>
