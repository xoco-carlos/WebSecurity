<?php
	include_once('../config/MySQL.php');
	class User{
		private $name;
		private $password;
		private $type;
		private $email;
		private $db;
		function __construct(){
			$this->db=new MySQL();
		}
		/*Funcion para verificar si el usuario existe en la base de datos*/
		function isSign($name){
			$result=array();
			$query='SELECT userID,name FROM users WHERE name="'.$name.'";';
			$result=$this->db->ExecuteSQL($query);
			return $result;
		}
		function login($name,$password){
			$query='SELECT userID,type FROM users WHERE name="'.$name.'" AND password=SHA("'.$password.'");';
			$result=$this->db->ExecuteSQL($query);
			return $result;
		}
		/*Funcion que inserta un usuario a la BD*/
		function insert(){
			$query='INSERT INTO users (name,password,email,type) 
						VALUES(
						"'.$this->name.'",SHA(
						"'.$this->password.'"),
						"'.$this->email.'",
						"'.$this->type.'"
					);';
			$this->db->ExecuteSQL($query);
			$result=$this->db->LastID();		
			return $result;
			#return $query;
		}
		function setName($name){
			$this->name=$name;
		}
		function setPassword($password) {
			$this->password=$password;
		}
		function setTipo($type){
			$this->type=$type;
		}
		function setEmail($email){
			$this->email=$email;
		}
		function getDB(){
			return $this->db;
		}
	}
?>
