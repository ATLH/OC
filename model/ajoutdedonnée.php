<?php 
class addToBdd {

	public function addData() {
		$bdd = $this->bddConnexion();
		$bddTexte = $bdd->prepare("INSERT INTO romans (title, text, img,) VALUES (?,?,?)");
		$bddTexte->execute( array($_POST["romans_title"], $_POST["romans_text"], $_POST["img_url"]) );
	}

	private function bddConnexion(){
		//$bdd = new PDO("mysql:host=localhost;dbname=jean_forteroche;charset=utf8", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

		$bdd = new PDO("mysql:host=sofianewdmmila.mysql.db;dbname=sofianewdmmila;charset=utf8", "sofianewdmmila", "AttilAh44", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		return $bdd;
    }
}
?>