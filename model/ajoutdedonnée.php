<?php 
class addToBdd {
	public function addData() {
		$bdd = $this->bddConnexion();
		$bddTexte = $bdd->prepare("INSERT INTO chapitre (chapter_title, chapter_text, img_url, chapter_date) VALUES (?,?,?,?)");
		$bddTexte->execute(array( $_POST["chapter_title"], $_POST["chapter_text"], $_POST["img_url"], $_POST["chapter_date"] ));
	}
	private function bddConnexion(){
		//$bdd = new PDO("mysql:host=localhost;dbname=jean_forteroche;charset=utf8", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		$bdd = new PDO("mysql:host=sofianewdmmila.mysql.db;dbname=sofianewdmmila;charset=utf8", "sofianewdmmila", "AttilAh44", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		return $bdd;
    }
}
?>