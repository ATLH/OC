<?php  
class commentManager
{
	// $commentId = $_GET["actionPost"] -> index.php L30
	public function getComment($commentId){
		$bdd = $this->bddConnexion();
		// requete préparé avec jointure entre les tables new_comments et chapitre
		$CommentQuery = $bdd->prepare("SELECT /* table.champ alias */ c.comment comment, c.comment_date cd FROM comment c INNER JOIN chapitre chptr ON c.comment_ID = chptr.ID WHERE c.comment_ID = ? ORDER BY c.ID DESC");
		$CommentQuery->execute(array($commentId));
		return $CommentQuery;
	}


	public function addComment(){
		$bdd = $this->bddConnexion();
		$insertComment = $bdd->prepare("INSERT INTO comment ( comment_lastname, comment_firstname, comment, comment_date, comment_ID) VALUES ( ?,?,?,CURDATE(),? )");
		$insertComment->execute(array( $_POST["lastname"], $_POST["firstname"], $_POST["comment"], $_GET["actionPost"] ));
	} 
	
	private function bddConnexion(){
		$bdd = new PDO("mysql:host=localhost;dbname=jean_forteroche;charset=utf8", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		//$bdd = new PDO("mysql:host=sofianewdmmila.mysql.db;dbname=sofianewdmmila;charset=utf8", "sofianewdmmila", "AttilAh44", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		return $bdd;
	}
}
?>