<?php
/*
* Autor: Jose Carmen
* Colaboradores: Xoco, Richard, stovar
* Formulario para iniciar sesion en la aplicacion 
*/
/*Si existe una sesion activa redirige al index*/
	include_once('includes/checks.php');
	$numero=isLogged();
	if($numero!=0){
		header('Location: /index.php');
	}
?>
<!-- stovar -->
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>PBSC - Login</title>
  <link rel="stylesheet" href="css/style.css">
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<script src="js/sha1.js">/* Cifra el password antes de enviarlo */</script>
	<script src="js/utf8.js">/* Implementacionde utf8 para el manejo del passwor*/</script>
</head>
<body>
  <form name="formulario" method="post" action="/cgi/get.exe" class="login">
    <p>
      <label for="login">Usuario:</label>
	  <input type="text" name="user" id="login" require/>
    </p>

    <p>
      <label for="password">Contrase&ntilde;a:</label>
	  <input type="password" name="pass" id="password" require/>
    </p>

    <p class="login-submit">
	  <button type="button" class="login-button" onClick='formulario.pass.value = Sha1.hash(pass.value);document.formulario.submit();'>Enviar</button>
    </p>

    <p class="forgot-password"><a href="index.php">Regresar</a></p>
  </form>
  
</body>
</html>

