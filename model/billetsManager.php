<?php
class BilletsManager {
	public function tickets(){
		$bdd = $this->bddConnexion();
		$bddQuery = $bdd->query("SELECT LEFT(texte, 100) AS excerpt, ID, titre, date, url FROM chapitre ORDER BY ID DESC");
		return $bddQuery;
	}

	public function ticket($billetId){
		$bdd = $this->bddConnexion();
		$bddQuery = $bdd->prepare("SELECT ID, titre, date, url, texte FROM chapitre WHERE ID = ?");
		$bddQuery->execute(array($billetId));
		$billet = $bddQuery->fetch();
		return $billet;
	}

	private function bddConnexion(){
		$bdd = new PDO("mysql:host=localhost;dbname=jean_forteroche;charset=utf8", "root", "");
		return $bdd;
    }
}
?>
