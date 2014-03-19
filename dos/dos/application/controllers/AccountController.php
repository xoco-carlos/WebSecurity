<?php

class AccountController extends Zend_Controller_Action
{
    public function init()
    {
        /* Initialize action controller here */
    }
    public function indexAction()
    {
        // action body
    }
    public function successAction()
    {
		if($this->_request->isPost()){
			$username=$this->_request->getPost('username');
			$password=$this->_request->getPost('password');
			$email=$this->_request->getPost('email');
			$vistas=$this->_request->getPost('vistas');
			$tipo=$this->_request->getPost('tipo');
			
			//Initiate the SaveAccount model.
			require_once "Registro.php";
			$SaveAccount = Registro();
			$SaveAccount->registro($username, $password, $email, $vistas, $tipo);
		}else{
			throw new Exception("Error 404 D:");
		}
    }
	public function newAction(){
   	$genres = array("Electronic",
			"Country",
			"Rock",
			"R & B",
			"Hip-Hop",
			"Heavy-Metal",
			"Alternative Rock");
		$this->view->genres=$genres;
	}
}
