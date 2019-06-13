<?php  

class SignIn {
	public function userSignIn ($user_id) {
		$bdd = $this->bddConnexion();
		$userQuery = $bdd->prepare("SELECT user_ID, lastname, password FROM user WHERE user_ID = ?");
		$userQuery->execute(array($user_id));
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