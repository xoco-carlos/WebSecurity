<?php
/*
* Autor: Jose Carmen
* Colaboradores: Xoco, Richard 
* Formulario para iniciar sesion en la aplicacion 
*/
/*Si existe una sesion activa redirige al index*/
	include_once('includes/checks.php');
	$numero=isLogged();
	if($numero!=0){
		header('Location: /index.php');
	}
?>
<html>
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
<script src="js/sha1.js">/* Cifra el password antes de enviarlo */</script>
<script src="js/utf8.js">/* Implementacionde utf8 para el manejo del passwor*/</script>
</head> 
<body style="background:#80BFFF">


<font color="blue"><h1>Login</h1></font>
<hr>
<TABLE WIDTH=200 HEIGHT=150 >
<tr>
<TD VALIGN=MIDDLE  WIDTH=100  BGCOLOR="Silver">
<blockquote>
<form name="formulario" method="post" action="/cgi/get.exe">
     Usuario:<br> <input type="text" name="user" require/>
      <br>
<!--<input type="hidden" name="pass" value=""/>
</form>-->
     Contraseña: <br><input type="password" name="pass" require/>
      <br>
      <button type="button" onClick='formulario.pass.value = Sha1.hash(pass.value);document.formulario.submit();'>Enviar</button>

</blockquote>
</TD>
</tr>
<tr>
<td>
<a href="index.php">Regresar</a>
</td>
</tr>
</TABLE>
</form>
</body>
</html>
