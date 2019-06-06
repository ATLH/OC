<?php 
class addToBdd {
	public function addData() {
		$bdd = $this->bddConnexion();
		$bddTexte = $bdd->prepare("UPDATE chapitre SET texte = ? ");
		$bddTexte->execute(array($_POST["texte"]));
	}
	private function bddConnexion(){
		$bdd = new PDO("mysql:host=localhost;dbname=jean_forteroche;charset=utf8", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		return $bdd;
    }
}
?>