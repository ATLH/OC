<?php
class BilletsManager {

	public function tickets(){
		$bdd = $this->bddConnexion();
		$bddQuery = $bdd->query("SELECT LEFT(chapter_text, 100) AS excerpt, LEFT(chapter_text, 300) AS excerpt2, ID, chapter_title, chapter_date, img_url FROM chapitre ORDER BY ID DESC");
		return $bddQuery;
	}

	public function ticket_id(){
		$bdd = $this->bddConnexion();
		$bddQuery = $bdd->query("SELECT ID FROM chapitre ORDER BY ID ASC");
		return $bddQuery;
	}

	public function add_new_chapter($chapter_title, $chapter_text, $img_url){
		$bdd = $this->bddConnexion();
		$bddUpdate = $bdd->prepare("INSERT INTO chapitre (chapter_title, chapter_text, img_url, chapter_date) VALUES (?,?,?,CURDATE())");
		$bddUpdate->execute(array($chapter_title, $chapter_text, $img_url));
	}

	public function ticket($billetId){
		$bdd = $this->bddConnexion();
		$bddQuery = $bdd->prepare("SELECT ID, chapter_title, chapter_date, img_url, chapter_text FROM chapitre WHERE ID = ?");
		$bddQuery->execute(array($billetId));
		$billet = $bddQuery->fetch();
		return $billet;
	}

	private function bddConnexion(){
		//$bdd = new PDO("mysql:host=localhost;dbname=jean_forteroche;charset=utf8", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		$bdd = new PDO("mysql:host=sofianewdmmila.mysql.db;dbname=sofianewdmmila;charset=utf8", "sofianewdmmila", "AttilAh44");
		return $bdd;
    }

}
?>
