<?php  
class commentManager
{
	// $commentId = $_GET["actionPost"] -> index.php L30
	public function getComment($commentId){
		$bdd = $this->bddConnexion();
		// requete préparé avec jointure entre les tables new_comments et chapitre
		$CommentQuery = $bdd->prepare("SELECT /* table.champ alias */ c.comment comment, c.comment_date cd, c.ID cid, c.comment_chapter_ID ccid, c.comment_lastname cl, c.comment_firstname cf FROM comment c INNER JOIN chapitre chptr ON c.comment_chapter_ID = chptr.ID WHERE c.comment_chapter_ID = ? AND c.new_comment = \"false\" ORDER BY c.ID DESC");
		$CommentQuery->execute(array($commentId));
		return $CommentQuery;
	}

	public function signalThisComment($signalComment){
		$bdd = $this->bddConnexion();

		$CommentQuery = $bdd->prepare("UPDATE comment SET comment_alerted = \"true\" WHERE ID = ?");
		$CommentQuery->execute( array($signalComment) );
	}

	public function getModerationComment($value){
		$bdd = $this->bddConnexion();
	
		$CommentQuery = $bdd->prepare("SELECT  ID, comment_lastname, comment_firstname, comment, comment_date, comment_chapter_ID FROM comment c WHERE c.new_comment = ? ORDER BY comment_date DESC");
		$CommentQuery->execute(array($value));

		return $CommentQuery;
	}

	public function getAllCommentAlerted(){
		$bdd = $this->bddConnexion();
	
		$CommentQuery = $bdd->query("SELECT * FROM comment c WHERE c.comment_alerted = \"true\" ORDER BY comment_date DESC");

		return $CommentQuery;
	}

	public function getCommentsAlerted(){
		$bdd = $this->bddConnexion();
	
		$countComment = $bdd->query("SELECT COUNT(comment_alerted) as ca FROM comment c WHERE c.comment_alerted = \"true\" ");
		$numberOfCommentsAlerted = $countComment->fetch();
		return $numberOfCommentsAlerted;
	}

	public function getCountOfNewComment () {
		$bdd = $this->bddConnexion();

		$countComment = $bdd->query("SELECT COUNT(new_comment) as nw FROM comment WHERE new_comment = \"true\" ");
		$numberOfNewComments = $countComment->fetch();
		return $numberOfNewComments;

	}

	public function getCommentChapterID($chapter_ID){
		$bdd = $this->bddConnexion();
	
		$CommentQuery = $bdd->prepare("SELECT  ID, comment_lastname, comment_firstname, comment, comment_date, comment_chapter_ID FROM comment c WHERE c.comment_chapter_ID = ? AND c.new_comment = \"false\" ORDER BY comment_date DESC");
		$CommentQuery->execute(array($chapter_ID));
		return $CommentQuery;
	}

	public function allowComment($value){

		$bdd = $this->bddConnexion();
	
		$CommentQuery = $bdd->prepare("UPDATE comment SET new_comment = \"false\" WHERE ID = ?");
		$CommentQuery->execute( array($value) );
	}

	public function deleteComment($value) {
		$bdd = $this->bddConnexion();
	
		$CommentQuery = $bdd->prepare("DELETE FROM comment WHERE ID = ?");
		$CommentQuery->execute( array($value) );
	}

	public function addComment(){
		$bdd = $this->bddConnexion();
		$insertComment = $bdd->prepare("INSERT INTO comment ( comment_lastname, comment_firstname, comment, comment_date, comment_chapter_ID, new_comment, comment_alerted) VALUES ( ?,?,?,CURDATE(),?,?,? )");
		$insertComment->execute(array( $_POST["lastname"], $_POST["firstname"], $_POST["comment"], $_GET["chapter_ID"], $_POST["bool"], "false" ));
	} 
	
	// Data base Connection
	private function bddConnexion(){
		$bdd = new PDO("mysql:host=localhost;dbname=jean_forteroche;charset=utf8", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		//$bdd = new PDO("mysql:host=sofianewdmmila.mysql.db;dbname=sofianewdmmila;charset=utf8", "sofianewdmmila", "AttilAh44", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		return $bdd;
	}
}
?>