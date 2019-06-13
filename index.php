<?php require("controller/controleurs.php") ?>
<?php 
if ( isset($_GET["action"]) ) {

	switch ( $_GET["action"] ) {
		case "auteur":
			auteur();
			break;
		case "romans":
			romans();
			break;
	    case "billets":
			billets();
			break;
		case "contact":
		if ( isset($_POST["firstname"], $_POST["lastname"], $_POST["email"], $_POST["message"]) ) {
			addMessage();
		} else {
			contact();
		}
			break;
		case "connexion":
			connexionView();
			break;
		case "jeanforteroche":
			jeanforteroche();
			break;
	}
} else if ( isset($_GET["adminAction"]) ) {

	switch ($_GET["adminAction"]) {
		case "ajouterunchapitre":

		if ( isset($_POST["login"], $_POST["password"]) ) {
			connexion( $_POST["login"], $_POST["password"] );
		} else {
		    session_start();
			ajouterunchapitre();
		}
			break;
		case "meschapitres":
			meschapitres();
			break;
	    case "commentaires":
			commentaires();
			break;
		case "message":
		    message();
			break;
			/*
		case "deconnexion":
			deconnexion();
			break;
			*/
	}
	
} else if ( isset( $_GET["actionPost"] ) && $_GET["actionPost"] > 0 ) {

	if ( isset($_POST["lastname"], $_POST["firstname"], $_POST["comment"]) ) {
		addNewComment();
	    billet($_GET["actionPost"]);
	} else {
		billet($_GET["actionPost"]);
	}
} else {

	require_once("frontView/jeanforteroche.php");

	$bdd = new PDO("mysql:host=localhost;dbname=jean_forteroche;charset=utf8", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

	$password_hash = password_hash("mila1234", PASSWORD_DEFAULT);

	$bdd->exec("INSERT INTO user (user_ID, lastname, password) VALUES (\"mila\", \"muriel\", \"$password_hash\")");
	
}




?>