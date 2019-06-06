<?php  
class commentManager
{
	public function getComment(){

	}

	public function addComment(){
		$bdd = $this->bddConnexion();
		$insertComment = $bdd->prepare("INSERT INTO new_comments (lastname, firstname, comment) VALUES ( ?,?,?  )");
		$insertComment->execute(array( $_POST["lastname"], $_POST["firstname"], $_POST["comment"] ));
	} 
	
	private function bddConnexion(){
		$bdd = new PDO("mysql:host=localhost;dbname=jean_forteroche;charset=utf8", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		return $bdd;
	}
}
?>