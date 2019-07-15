<?php
class contactManager {
	public function sendMessage () {
		$bdd = $this->bddConnexion();
		$saveMessage = $bdd->prepare("INSERT INTO message (firstname, lastname, email, 	message, message_date, hour) VALUES (?,?,?,?,CURDATE(), CURTIME())");
		$saveMessage->execute(array($_POST["firstname"], $_POST["lastname"], $_POST["email"], $_POST["message"] ));
	}
	public function getMessage () {
		$bdd = $this->bddConnexion();
        $message = $bdd->query("SELECT ID, firstname, lastname, message, message_date, hour FROM message ORDER BY hour DESC ");
		return $message;
	}
	public function msg_query($msg_id){
		$bdd = $this->bddConnexion();
		$deleteMessage = $bdd->prepare("DELETE message FROM message WHERE ID = ?");
		$deleteMessage->execute(array($msg_id));
	}
	private function bddConnexion () {
		$bdd = new PDO("mysql:host=localhost;dbname=jean_forteroche;charset=utf8", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		//$bdd = new PDO ("mysql:host=sofianewdmmila.mysql.db;dbname=sofianewdmmila;charset=utf8", "sofianewdmmila", "AttilAh44");
		return $bdd;
	}
}
?>