<?php 
class romansManager {
	public function getRomans() {
		$bdd = $this->bddConnexion();
		$romansQuery = $bdd->query("SELECT LEFT(title, 27) AS title, LEFT(text, 50) AS text, img FROM romans");
		return $romansQuery;
	}
	private function bddConnexion() {
		$bdd = new PDO("mysql:host=localhost;dbname=jean_forteroche;charset=utf8", "root", "");
		
		//$bdd = new PDO("mysql:host=sofianewdmmila.mysql.db;dbname=sofianewdmmila;charset=utf8", "sofianewdmmila", "AttilAh44");
		return $bdd;	
	}
}
?>