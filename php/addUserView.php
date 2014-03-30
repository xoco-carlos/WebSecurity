<!DOCTYPE html>
<?php
/*
* Autor: Xoco
* Colaboradores:
* Formulario para agregar nuevos usuarios a la base de datos 
*/
?>
<html>
	<head>
		<meta charset="utf-8" />
	</head>
	<body>
		<form method="post" action="controllers/addUserController.php">
			<h2>Registro</h2>
			<p>Registrar nuevo usuario</p></br>
			<label >Username </label>
			<input name="username" type="text" maxlength="255" required/> </br>
			<label >Password </label>
			<input name="password" type="password" maxlength="255" required/> </br>
			<label >Confirmar password </label>
			<input name="password2" type="password" maxlength="255" required/> </br>
			<label >E-mail </label>
			<input name="email" type="email" maxlength="255" required/> </br>
			<label >Admin </label>
			<input name="type" type="checkbox"/>
			<input type="submit" name="submit" value="Submit" />
		</form>
		<a href="index.php">Regresar</a><!--stovar-->
	</body>
</html>
