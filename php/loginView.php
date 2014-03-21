<!DOCTYPE html>
<html>
	<body>
	<form id='login' action='controllers/loginController.php' method='post' accept-charset='UTF-8'>

		<label for='username' >UserName*:</label>
		<input type='text' name='username' id='username'  maxlength="50" requiered/>

		<label for='password' >Password*:</label>
		<input type='password' name='password' id='password' maxlength="50" required/>

		<input type='submit' name='Submit' value='Submit' />

	</form>
	</body>
