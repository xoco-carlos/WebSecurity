<?php
class MySQL {
	
	private $lastID;				// Holds the last id inserted
	private $lastError;			// Holds the last error
	private $lastQuery;			// Holds the last query
	private $result;				// Holds the MySQL query result
	private $records;				// Holds the total number of records returned
	private $affected;			// Holds the total number of records affected
	private $rawResults;			// Holds raw 'arrayed' results
	private $arrayedResult;		// Holds an array of the result
	private $hostname;			// MySQL Hostname
	private $username;			// MySQL Username
	private $password;			// MySQL Password
	private $database;			// MySQL Database
	private $databaseLink;		// Database Connection Link
	
	function __construct(){
		$this->database = 'proyecto';
		$this->username = 'root';
		$this->password = 'becarios';
		$this->hostname = '127.0.0.1'.':'.'3306';
		
		$this->Connect();
	}
	
	// Connects class to database
	private function Connect($persistant = false){
		$this->CloseConnection();
		
		if($persistant){
			$this->databaseLink = mysql_pconnect($this->hostname, $this->username, $this->password);
		}else{
			$this->databaseLink = mysql_connect($this->hostname, $this->username, $this->password);
		}
		
		if(!$this->databaseLink){
   		$this->lastError = 'Could not connect to server: ' . mysql_error($this->databaseLink);
			return false;
		}
		
		if(!$this->UseDB()){
			$this->lastError = 'Could not connect to database: ' . mysql_error($this->databaseLink);
			return false;
		}
		return true;
	}
	
	
	// Select database to use
	private function UseDB(){
		if(!mysql_select_db($this->database, $this->databaseLink)){
			$this->lastError = 'Cannot select database: ' . mysql_error($this->databaseLink);
			return false;
		}else{
			return true;
		}
	}
	
	
	// Performs a 'mysql_real_escape_string' on the entire array/string
	private function SecureData($data){
		if(is_array($data)){
			foreach($data as $key=>$val){
				if(!is_array($data[$key])){
					$data[$key] = mysql_real_escape_string($data[$key], $this->databaseLink);
				}
			}
		}else{
			$data = mysql_real_escape_string($data, $this->databaseLink);
		}
		return $data;
	}
	// Executes MySQL query
	function ExecuteSQL($query){
		$this->lastQuery 	= $query;
		if($this->result 	= mysql_query($query, $this->databaseLink)){
			$this->records 	= @mysql_num_rows($this->result);
			$this->affected	= @mysql_affected_rows($this->databaseLink);
			
			if($this->records > 0){
				$this->ArrayResults();
            return $this->arrayedResult;
			}else{
				return true;
			}
		}else{
			$this->lastError = mysql_error($this->databaseLink);
			return false;
		}
	}
	function ArrayResults(){
		if($this->records == 1){
			return $this->ArrayResult();
		}

		$this->arrayedResult = array();
		while ($data = mysql_fetch_assoc($this->result)){
			$this->arrayedResult[] = $data;
		}
		return $this->arrayedResult;
	}
	function ArrayResult(){
		$this->arrayedResult = mysql_fetch_assoc($this->result) or die (mysql_error($this->databaseLink));
		return $this->arrayedResult;
	}
	// Closes the connections
	function CloseConnection(){
		if($this->databaseLink){
			mysql_close($this->databaseLink);
		}
	}
	function LastID(){
		$this->lastID=mysql_insert_id($this->databaseLink);
		return $this->lastID;
	}
	function getResult(){
		return $this->result;
	}
	function getLastError(){
		return $this->lastError;
	}
}

?>
