<form action="curl3.php" method="post" id="form1">
   <label class="nodo" for="element_1">Numero de nodo </label>
   <input type="text" name="nodo" width="48" height="48">
   <label class="comentario" for="element_1">Comentario </label>
   <!--<input type="textarea" name="comentario" width="48" height="48">-->
	<textarea rows="4" cols="50" name="comentario" form="form1">
	</textarea>
   <input type="submit" value="Submit">
</form>
<?php
//$numnodo = $_POST['nodo'];
//$comentarionodo = $_POST['comentario'];
$numnodo  = filter_input(INPUT_POST, 'nodo', FILTER_SANITIZE_NUMBER_INT);
$comentarionodo = filter_input(INPUT_POST, 'comentario', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$numnodo = urlencode($numnodo);
echo "urlencode " . $numnodo;
echo "<br>";
$comentarionodo = htmlspecialchars($comentarionodo);
echo "htmlspecialchars" . $comentarionodo;
$comentarionodo = urlencode($comentarionodo);
//$comentario = urldecode("http://urldecode.org/?decode=http%3A%2F%2Furldecode.org%2F");
echo "urlencode " . $comentarionodo;

//Lo primerito, creamos una variable iniciando curl, pasándole la url
$ch = curl_init('http://drupal.xoco.in/drupal7/?q=pbsccomentariosinsertasinsql');
 
//especificamos el POST (tambien podemos hacer peticiones enviando datos por GET
curl_setopt ($ch, CURLOPT_POST, 1);
 
//le decimos qué paramáetros enviamos (pares nombre/valor, también acepta un array)
curl_setopt ($ch, CURLOPT_POSTFIELDS, "numnodo=$numnodo&comentarionodo=$comentarionodo");
 
//le decimos que queremos recoger una respuesta (si no esperas respuesta, ponlo a false)
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
 
//recogemos la respuesta
$respuesta = curl_exec ($ch);
 
//o el error, por si falla
$error = curl_error($ch);
 
//y finalmente cerramos curl
curl_close ($ch);
?>
