<?php
	include_once('includes/checks.php');
	$numero=isLogged();
	if($numero!=0){
		header('Location: /front/');
	}
?>
<html>
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
<script src="sha1.js">/* SHA-256 JavaScript implementation */</script>
<script src="utf8.js">/* SHA-256 JavaScript implementation */</script>
</head> 
<body style="background:#80BFFF">


<font color="blue"><h1>Login</h1></font>
<hr>
<TABLE WIDTH=200 HEIGHT=150 >

<TD VALIGN=MIDDLE  WIDTH=100  BGCOLOR="Silver">
<blockquote>
<form name="formulario" method="post" action="/cgi/get.exe">
     Usuario:<br> <input type="text" name="user"/>
      <br>
<!--<input type="hidden" name="pass" value=""/>
</form>-->
     Contraseña: <br><input type="password" name="pass"/>
      <br>
      <button type="button" onClick='formulario.pass.value = Sha1.hash(pass.value);document.formulario.submit();'>Enviar</button>

<!--<input type="submit" value="Entrar"/>-->
</blockquote>
</TD>

</TABLE>
</form>
</body>
</html>
