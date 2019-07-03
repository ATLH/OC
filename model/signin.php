<?php  

class SignIn {
	public function userSignIn ($username) {
		$bdd = $this->bddConnexion();
		$userQuery = $bdd->prepare("SELECT username, lastname, password FROM user WHERE username = ?");
		$userQuery->execute(array($username));
		$userData = $userQuery->fetch();		
		return $userData;
	}

	private function bddConnexion () {
		$bdd = new PDO("mysql:host=localhost;dbname=jean_forteroche;charset=utf8", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		//$bdd = new PDO ("mysql:host=sofianewdmmila.mysql.db;dbname=sofianewdmmila;charset=utf8", "sofianewdmmila", "AttilAh44");
		return $bdd;
	}
}

?>