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
			getChapter($_GET["view"], $_GET["chapter_ID"]);
		} else if (isset($_GET["signalComment"]) AND $_GET["signalComment"] === "true") {
			getChapter($_GET["view"], $_GET["chapter_ID"]);
			signalComment($_GET["comment_ID"]);

			

		} else   {
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

		case "meschapitres":

		if ( isset($_POST["connect"])) {

			if ( !empty($_POST["username"]) AND !empty($_POST["password"]) ) {

				$username = $_POST["username"];
			    $password = $_POST["password"];
			    check_user($username, $password); 
				
			} 
			else {

				connexionView();
			}

		} else if (isset($_GET["addChapter"]) AND $_GET["addChapter"] === "true") {
			ajouterunchapitre();  
		} else {
			getChapterSession();
		} 
		break;

		case "chapitre":

		if (isset($_GET["view"]) AND $_GET["view"] === "admin_view") {
			getChapter($_GET["view"], $_GET["chapter_ID"]);
		}
			break;

	    case "commentaires":

	    if ( isset( $_GET["allowComment"] ) ) {

	    	// Si j'ai $_GET["commentByChapter"] 
	    	if ( isset($_GET["deleteCommentByChapter"] ) AND $_GET["deleteCommentByChapter"] === "true") {

	    		commentAdmin( $_GET["allowComment"], $_GET["comment_ID"] );
	    		getCommentByChapter($_GET["chapter_id"]);

            //sinon c'est que j'ai $_GET["comment_ID"] donc je vais suprimer le commentaire avec son id en fonction de $_GET["allowComment"] qui est soit false ou true, puis j'appel l'affichage de tout les commentaire.
	    	} else if (isset($_GET["deleteSignalComment"] ) AND $_GET["deleteSignalComment"] === "true") {
	    		commentAdmin( $_GET["allowComment"], $_GET["comment_ID"] );
	    		getAlertedComment();
	    		
	    	} else {

	    		commentAdmin( $_GET["allowComment"], $_GET["comment_ID"] );
	    		getAdminComments( "true" );
	    	}

	    	

	    } 

	    else if ( isset($_GET["btn"] ) AND $_GET["btn"] === "signal_comment" )  {
	    	getAlertedComment();

	    } 

	    else if ( isset( $_GET["chapter_id"] ) ) {

	    	getCommentByChapter( $_GET["chapter_id"] );

	    } 

	    else {

	    	getAdminComments( $_GET["btn"] );
	    }

			break;
		case "message":
		message();
			break;
		case "deconnexion":
			deconnexion();
			break;
			
	}
	
} else if (isset($_GET["test"]) AND $_GET["test"] === "testView") {
	require_once("frontView/testView.php");
} else {
	require_once("frontView/jeanforteroche.php");

	

	  /*$bdd = new PDO("mysql:host=sofianewdmmila.mysql.db;dbname=sofianewdmmila;charset=utf8", "sofianewdmmila", "AttilAh44");

	  
	  $bdd->exec("UPDATE chapitre SET chapter_title = \" Anchorage : partie 3 \" WHERE ID = 3 ");*/
	  
	



	/*$bdd = new PDO("mysql:host=localhost;dbname=jean_forteroche;charset=utf8", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

	$password_hash = password_hash("mila1234", PASSWORD_DEFAULT);

	$bdd->exec("INSERT INTO user (user_ID, lastname, password) VALUES (\"mila\", \"muriel\", \"$password_hash\")");
	*/
	
}




?>