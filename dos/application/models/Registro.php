<?php
class Registro {
	public function registro($username, $password, $email, $vistas, $tipo){
		//Clean up data
		$username = $this->_db->escape($username);
		$password = $this->_db->escape($password);
		$email = $this->_db->escape($email);
		$vistas = $this->_db->escape($vistas);
		$tipo = $this->_db->escape($tipo);
		//Set up mysqli instance
		$dbconn = mysqli('localhost',
			'root',
			'becarios');
		$dbconn->select_db('usuarios');
		//Create the SQL statement and insert.
		$statement = "INSERT INTO users (username, password, email, vistas, tip_user,)
		VALUES (
			'".$username."',
			'".$password."',
			'".$email."',
			'".$vistas."',
			'".$tipo."')";
		$dbconn->query($statement);
		//Close db connection
		$dbconn->close();
	}
}
