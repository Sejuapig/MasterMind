<?php
define("loginIA", "e145725x");
define("mdpIA", "1234");
class Authentification{	
	public $log = "";
	public $mdp = "";

	function __construct($login, $mdp){
		$this->log = $login;
		$this->mdp = $mdp;
	}

	function redirect(){
		if((loginIA == $this->log) && (mdpIA == $this->mdp)) header('Location:formulaire.html');
		else header('Location:login.html');
	}
}



?>