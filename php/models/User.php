<?php
/*
* Autor:Xoco
* Colaboradores:Denise
*
*/

	include_once dirname(__FILE__).('/../config/MySQL.php');
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
#			return $query;
		}
		//Funciones que permiten actualizar datos especificos de un usuario en la BD
		function updateName($NewUsername, $OldUsername){
			$query="UPDATE users SET name='{$NewUsername}' WHERE name='{$OldUsername}';" ;
			$this->db->ExecuteSQL($query);
			return  true;
		}
		
		function updateEmail($Email,$Username){
			$query="UPDATE users SET email='{$Email}' WHERE name='{$Username}';" ;
			$this->db->ExecuteSQL($query);
			return  true;
		}
		
		function deleteUser($Username){
			$query="DELETE FROM users WHERE name='{$Username}';" ;
			$this->db->ExecuteSQL($query);
			return  true;
		}
		
		function updatePassw($Username, $pass){
			$query="UPDATE users SET password=SHA('{$pass}') WHERE name='{$Username}';" ;
			$this->db->ExecuteSQL($query);
			return  true;
		}
		
		function getUsers(){
			$result=array();
			$query='SELECT name FROM users;';
			foreach($this->db->ExecuteSQL($query) as $value){
				$result[]=$value['name'];
			}
			return $result;
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
		function getMail($usuario){
			$query='SELECT email FROM users WHERE name="'.$usuario.'";';
			$result=$this->db->ExecuteSQL($query);
			return $result;
		}
	}
?>
