<?php
	include_once('../includes/alerts.php');
   include_once('../models/View.php');
	session_start();
	$old = filter_input(INPUT_POST, 'old', FILTER_SANITIZE_STRING);
	$new = filter_input(INPUT_POST, 'new', FILTER_SANITIZE_STRING);	
	$view=new View();
   $view->setUserID($_SESSION['userID']);
   $view->setViewID($new);
   $view->setOld($old);
	$result=$view->updateView();
	$view->getDB()->CloseConnection();
	if($result){
		message('success','View has been updated successfully');
	}
	else{
		message('error','View already selected');
	}
?>
