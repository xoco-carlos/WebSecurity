<?php
	include_once dirname(__FILE__).('/../models/User.php');
	include_once dirname(__FILE__).('../models/User.php');
	include_once dirname(__FILE__).('/../includes/alerts.php');
	include_once dirname(__FILE__).('/../includes/checks.php');
	$numero=isLogged();
	if($numero < 0){
		message("error","Go home",'/front/loginView.php');
		die();
	}

	function printUsers(){
	   $user=new User();
	   $users=$user->getUsers();
	   echo "<TABLE BORDER=1 WIDTH=800>
		<TR>
			<TD WIDTH=200>Username</TD>
			<TD WIDTH=200>Modifica Datos</TD>
			<TD WIDTH=200>Modifica Contraseña</TD>
			<TD WIDTH=200>Elimina Cuenta</TD>
		</TR>
		
		";
	   foreach($users as $name){
		echo "
		<TR>
			<TD WIDTH=200>{$name}</TD>
			<FORM ACTION=\"actualizaUsuario.php\" METHOD= \"POST\">
			<TD WIDTH=200>
				<INPUT TYPE=\"hidden\" NAME=\"User\" VALUE={$name}>
				<INPUT TYPE=\"hidden\" NAME=\"accion\" VALUE=1>
				<INPUT TYPE=\"hidden\" NAME=\"activo\" VALUE=0>
				<INPUT TYPE=\"submit\" NAME=\"modificaDatos\" VALUE=\"Modifica Datos\">
			</TD>
			</FORM>
			<FORM ACTION=\"actualizaUsuario.php\" METHOD= \"POST\">
			<TD WIDTH=200>
				<INPUT TYPE=\"hidden\" NAME=\"User\" VALUE={$name}>
				<INPUT TYPE=\"hidden\" NAME=\"accion\" VALUE=2>
				<INPUT TYPE=\"hidden\" NAME=\"activo\" VALUE=0>
				<INPUT TYPE=\"submit\" NAME=\"modificaPass\" VALUE=\"Modifica Contraseña\">
			</TD>
			</FORM>
			<FORM ACTION=\"actualizaUsuario.php\" METHOD= \"POST\">
			<TD WIDTH=200>
				<INPUT TYPE=\"hidden\" NAME=\"User\" VALUE={$name}>
				<INPUT TYPE=\"hidden\" NAME=\"accion\" VALUE=3>
				<INPUT TYPE=\"hidden\" NAME=\"activo\" VALUE=0>
				<INPUT TYPE=\"submit\" NAME=\"modificaPass\" VALUE=\"Elimina\">
			</TD>
			</FORM>
		</TR>
		";
	   }
	   $user->getDB()->CloseConnection();
	}
	
?>
