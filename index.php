<?php require("controleurs.php") ?>
<?php 

if (isset($_GET["action"])) {
	switch ($_GET["action"]) {
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
			contact();
			break;
		case "connexion":
			connexion();
			break;
		case "jeanforteroche":
			jeanforteroche();
			break;	
	}
} else if ( isset( $_GET["actionPost"] ) && $_GET["actionPost"] > 0 ) {
	if ( isset($_POST["lastname"]) && isset($_POST["firstname"]) && isset($_POST["comment"]) ) {
		addNewComment();
	    billet($_GET["actionPost"]);
	} else {
		billet($_GET["actionPost"]);
	}
} else {
	require_once("view/jeanforteroche.php");
}




?>


