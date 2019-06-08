<?php  
class commentManager
{
	public function getComment($commentId){
		$bdd = $this->bddConnexion();
		$CommentQuery = $bdd->prepare("SELECT nc.comment comment FROM new_comments nc INNER JOIN chapitre c ON nc.comment_ID = c.ID WHERE nc.comment_ID = ? ORDER BY nc.ID DESC");
		$CommentQuery->execute(array($commentId));
		return $CommentQuery;
	}

	public function addComment(){
		$bdd = $this->bddConnexion();
		$insertComment = $bdd->prepare("INSERT INTO new_comments (lastname, firstname, comment, comment_ID) VALUES ( ?,?,?,? )");
		$insertComment->execute(array( $_POST["lastname"], $_POST["firstname"], $_POST["comment"], $_GET["actionPost"] ));
	} 
	
	private function bddConnexion(){
		$bdd = new PDO("mysql:host=localhost;dbname=jean_forteroche;charset=utf8", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		return $bdd;
	}
}



?>