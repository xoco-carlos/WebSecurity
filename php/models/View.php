<?php
	include_once dirname(__FILE__) . '/../config/MySQL.php';
	class View{
		private $userID;
		private $viewID;
		private $order;
		private $views;
		private $old;
		private $db;
		function __construct(){
			$this->views=array();
			$this->db=new MySQL();
		}
		/*Funcion para verificar si el usuario existe en la base de datos*/
		function getAdminViews(){
			$result=array();
			$query='SELECT viewID FROM views WHERE userID="1" ORDER BY orden;';
#			$result=$this->db->ExecuteSQL($query);
			foreach($this->db->ExecuteSQL($query) as $value){
				$result[]=$value['viewID'];
			}
			#$this->db->CloseConnection();
			return $result;
		}
		/*Funcion para obterner la vistas de un usuario*/
		function getUserViews($user){
			$result=array();
			$query='SELECT viewID FROM views WHERE userID="'.$user.'" ORDER BY orden;';
			#$result=$this->db->ExecuteSQL($query);
			foreach($this->db->ExecuteSQL($query) as $value){
				$result[]=$value['viewID'];
			}
			#$this->db->CloseConnection();
			return $result;
		}
		/*Funcion que inserta un usuario a la BD*/
		function insert(){
			$query='INSERT INTO views (userID,viewID,orden) 
						VALUES(
						"'.$this->userID.'",
						"'.$this->viewID.'",
						"'.$this->order.'"
					);';
			$result=$this->db->ExecuteSQL($query);
			#$this->db->CloseConnection();
			return $result;
#			return $query;
		}
		function updateViews(/*$id,*/$array){
#			$this->userID=$id;
			$this->db->ExecuteSQL('BEGIN;');
			$query='DELETE FROM users WHERE userID='.$this->userID.';';
			$this->db->ExecuteSQL($query);
			foreach($array as $value){
				$this->viewID=$value;
				if(!$this->insert()){
					$this->db->ExecuteSQL('ROLLBACK;');
					return false;
				}
			}
			$this->db->ExecuteSQL('COMMIT;');
			return true;	
		}
		function updateView(){
			$this->db->ExecuteSQL('BEGIN;');
			$query='UPDATE views SET viewID='.$this->viewID.' WHERE userID='.$this->userID.' AND viewID='.$this->old.' AND orden='.$this->order.';';
			if(!$this->db->ExecuteSQL($query)){
					$this->db->ExecuteSQL('ROLLBACK;');
					return false;
			}
			$this->db->ExecuteSQL('COMMIT;');
			return true;
		}	
		function setUserID($uid){
			$this->userID=$uid;
		}
		function setViewID($vid) {
			$this->viewID=$vid;
		}
		function setOrder($vid) {
			$this->order=$vid;
		}
		function setOld($vid) {
			$this->old=$vid;
		}
		function getDB() {
			return $this->db;
		}
	}
?>
