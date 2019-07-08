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

		if ( isset($_POST["envoyer"]) ) {

			if ( !empty($_POST["lastname"]) && !empty($_POST["firstname"]) && !empty($_POST["comment"]) ) {
				$lastname = htmlspecialchars($_POST["lastname"]);
				$firstname = htmlspecialchars($_POST["firstname"]);
				$comment = htmlspecialchars($_POST["comment"]);

				$lastnameLenght = strlen($lastname);
				$firstname = strlen($firstname);

				if ( $lastnameLenght <= 20 && $firstnameLenght <= 20 ) {
					addNewComment();
			        getChapter($_GET["view"], $_GET["chapter_ID"]);
				} else {
					$message2 = "Le champs prénom ou nom est trop long";
					getChapter($_GET["view"], $_GET["chapter_ID"], null ,$message2);
				}
			} else {
				$message2 = "Tous les champs doivent être remplis !";
				getChapter($_GET["view"], $_GET["chapter_ID"], null, $message2);
			}
			
		
	
		
			

		} else if (isset($_GET["signalComment"]) AND $_GET["signalComment"] === "true") {

			getChapter($_GET["view"], $_GET["chapter_ID"], "Le commentaire à bien était signaler ");
			
			signalComment($_GET["comment_ID"]);

			

		} else   {
			getChapter($_GET["view"], $_GET["chapter_ID"]);
		}
		
			break;
		case "contact":

		if ( isset($_POST["envoyer"]) ) {

			if (!empty($_POST["firstname"]) && !empty($_POST["lastname"]) && !empty($_POST["email"]) && !empty($_POST["message"])) {
				$firstname = htmlspecialchars($_POST["firstname"]);
				$lastname = htmlspecialchars($_POST["lastname"]);
				$email = htmlspecialchars($_POST["email"]);
				$message = htmlspecialchars($_POST["message"]);

				$firstnameLenght = strlen($firstname);
				$lastnameLenght = strlen($lastname);
				$emailLenght = strlen($email);

				if ( $firstnameLenght <= 30 && $lastnameLenght <= 30 && $emailLenght <= 30 ) {
					$message = "Merci pour votre message " . $firstname . " !";
					alertMessage($message);
					addMessage();

				} else {
					$message = "Nombre de caractère pour le nom, le prénom ou l'email trop long";
					alertMessage($message);
				}
				
			} else {
				$message = "Tous les champs doivent être remplis !";
				alertMessage($message);
			}
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

			if (isset($_GET["add_new_chapter"]) && $_GET["add_new_chapter"] === "true" ) {

				if (isset($_POST["envoyer"])) {

					if (isset($_FILES["img_url"])) {

						$file_name = $_FILES["img_url"]["name"];
						$file_tmp_name = $_FILES["img_url"]["tmp_name"];
						$file_size = $_FILES["img_url"]["size"];
						$file_error = $_FILES["img_url"]["error"];

						if (is_uploaded_file($file_tmp_name)) {

							$get_file_ext = explode(".", $file_name);
							$file_ext = strtolower(end($get_file_ext));
							$ext_array = array("jpg", "jpeg", "png" );

							if (in_array($file_ext, $ext_array)) {

								if ($file_error === 0) {

									if ($file_size <= 1000000) {

										$new_file_name = "images/". $file_name;

										if (move_uploaded_file($file_tmp_name, $new_file_name)) {

											$chapter_title = $_POST["chapter_title"];
								            $img_url = $new_file_name;
								            $chapter_text = htmlspecialchars(strip_tags($_POST["chapter_text"]));
								            $message = "Nouveau chapitre ajoutée !";

								            add_new_chapter($chapter_title, $chapter_text, $img_url);
								            ajouterunchapitre($message);
								            

								        } else {
								        	$message = "Erreur pendant le téléchargement du fichier 1";
								        	ajouterunchapitre($message);
								        }
								    } else {
								    	$message = "Fichier trop lourd";
								    	ajouterunchapitre($message);
								    }
								} else {
									$message = "Erreur pendant le téléchargement du fichier 2";
									ajouterunchapitre($message);
								}
							} else {
								$message = "Extension de fichier invalide. Extesion autoriser ( \"jpg\", \"jpeg\", \"png\", ) ";
				                ajouterunchapitre($message);
				            }
				        } else {
				        	$message = "Aucun fichier télécharger";
			                ajouterunchapitre($message);
			            }
			        } else {
			        	$message = "Veuillez selectionner un fichier";
		                ajouterunchapitre($message);
		            }
		        } else {

		        }
				
			} else {
				ajouterunchapitre();  
			}
			
		} else {
			getChapterSession();
		} 
		break;

		case "chapitre":

		if (isset($_GET["view"]) AND $_GET["view"] === "admin_view") {
			if (isset($_GET["set_chapter"]) AND $_GET["set_chapter"] === "true") {
				
				getChapter($_GET["view"], $_GET["chapter_ID"], null, null, $_GET["set_chapter"]);
				
			} else {
			getChapter($_GET["view"], $_GET["chapter_ID"]);
		}
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
	    		
	    	} else if (isset($_GET["reallowComment"] ) AND $_GET["reallowComment"] === "true") {
	    		reallowComment($_GET["comment_ID"] );
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