<?php
	include_once('../config/MySQL.php');
	class View{
		private $userID;
		private $viewID;
		private $views;
		private $db;
		function __construct(){
			$this->views=array();
			$this->db=new MySQL();
		}
		/*Funcion para verificar si el usuario existe en la base de datos*/
		function getAdminViews(){
			$result=array();
			$query='SELECT viewID FROM views WHERE userID="1";';
			foreach($this->db->ExecuteSQL($query) as $value){
				$result[]=$value['viewID'];
			}
			#$this->db->CloseConnection();
			return $result;
		}
		/*Funcion que inserta un usuario a la BD*/
		function insert(){
			$query='INSERT INTO views (userID,viewID) 
						VALUES(
						"'.$this->userID.'",
						"'.$this->viewID.'"
					);';
			$result=$this->db->ExecuteSQL($query);
			#$this->db->CloseConnection();
			return $result;
#			return $query;
		}
		function setUserID($uid){
			$this->userID=$uid;
		}
		function setViewID($vid) {
			$this->viewID=$vid;
		}
		function getDB() {
			return $this->db;
		}
	}
?>
