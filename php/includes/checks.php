<?php
	function isLogged(){
		session_start();
		if(isset($_SESSION['userID']) and $_SESSION['userID']!='' and $_SESSION['priv']==1){
			return 1;
		}else{
			if(isset($_SESSION['userID']) and $_SESSION['userID']!='' and $_SESSION['priv']==0){
				return 2;
			}else{
				return 0;	
			}
		}
	}
?>
