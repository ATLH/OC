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
			getChapters($_GET["action"]);
			break;
		case "billet":
		if ( isset($_POST["lastname"], $_POST["firstname"], $_POST["comment"], $_GET["chapter_ID"], $_POST["bool"]) ) {
			addNewComment();
		}
		if (isset($_GET["view"]) AND $_GET["view"] === "client_view") {
			getChapter($_GET["view"], $_GET["chapter_ID"]);
		}
		
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
		if ( isset($_POST["username"], $_POST["password"]) ) {
			connexion( $_POST["username"], $_POST["password"] );
		} else {
			session_start();
			ajouterunchapitre();
		}
			break;
		case "meschapitres":
		getChapters($_GET["adminAction"]);
			break;
		case "chapitre":
		if (isset($_GET["view"]) AND $_GET["view"] === "admin_view") {
			getChapter($_GET["view"], $_GET["chapter_ID"]);
		}
			break;

	    case "commentaires":

	    if ( isset( $_GET["allowComment"] ) ) {
	    	commentAdmin( $_GET["allowComment"], $_GET["comment_ID"] );
	    } else if ( isset( $_GET["chapter_comment_id"] ) ) {
	    	getCommentByChapter( $_GET["chapter_comment_id"] );
	    } else {
	    	getAdminComments( $_GET["btn"] );
	    }

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
	
} else {

	require_once("frontView/jeanforteroche.php");

	/*$bdd = new PDO("mysql:host=localhost;dbname=jean_forteroche;charset=utf8", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

	$password_hash = password_hash("mila1234", PASSWORD_DEFAULT);

	$bdd->exec("INSERT INTO user (user_ID, lastname, password) VALUES (\"mila\", \"muriel\", \"$password_hash\")");
	*/
	
}




?>