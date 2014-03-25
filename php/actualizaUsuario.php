<!DOCTYPE html>
<html>
	<body>
		<form method="post" action="controllers/addUserController.php">
			<h2>Registro</h2>
			<p>Registrar nuevo usuario</p></br>
			<label class="description" for="element_1">Username </label>
			<input name="username" class="element text medium" type="text" maxlength="255" value=""/> </br>
			<label class="description" for="element_2">Password </label>
			<input name="password" class="element text medium" type="password" maxlength="255" value=""/> </br>
			<label class="description" for="element_3">Confirmar password </label>
			<input name="password2" class="element text medium" type="password" maxlength="255" value=""/> </br>
			<label class="description" for="element_4">E-mail </label>
			<input name="email" class="element text medium" type="email" maxlength="255" value=""/> </br>
			<label class="description" for="element_6">Admin </label>
			<input name="tipo" class="element text medium" type="checkbox"/>
			<input class="button_text" type="submit" name="submit" value="Submit" />
		</form>
	</body>
</html>