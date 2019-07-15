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
		// 
		if ( isset($_POST["connect"])) {
			// check de valeurs non nul
			if ( !empty($_POST["username"]) AND !empty($_POST["password"]) ) {

				$username = $_POST["username"];
			    $password = $_POST["password"];
			    check_user($username, $password); 
				
			} else {
				connexionView();
			}

		} else {
				getChapterSession();
			} 
		break;

		case "chapitre":

		if (isset($_GET["view"]) AND $_GET["view"] === "admin_view") {
			if ( isset($_GET["addChapter"]) AND $_GET["addChapter"] === "true" ) {
				if (isset($_POST["envoyer"])) {

					$chapter_title = $_POST["chapter_title"];
					$chapter_text = $_POST["chapter_text"];

					if (isset($chapter_title) AND isset($chapter_text)) {

						if (!empty($chapter_title) AND !empty($chapter_text)) {
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
							    					$img_url = $new_file_name;
								                    $message = "Nouveau chapitre ajoutée !";

								                    add_new_chapter($chapter_title, $chapter_text, $img_url);
								                    new_Chapter($message);
							    					
							    				} else {
							    					$message = "Erreur pendant le téléchargement du fichier";
								        	        getChapter($view, $chapter_id, $message, null, $set_chapter);
							    				}
							    			} else {
							    				$message = "Fichier trop lourd";
								    	        getChapter($view, $chapter_id, $message, null, $set_chapter);
							    			}
							    		} else {
							    			$message = "Erreur de téléchargement veuillez réessayer";
								    		getChapter($view, $chapter_id, $message, null, $set_chapter);
							    		}
							    		
							    	} else {
							    		$message = "Extension de fichier invalide. Extesion autoriser ( jpg, jpeg, png, ) ";
								    	getChapter($view, $chapter_id, $message, null, $set_chapter);
							    	}
								} else {
									$message = "Veuillez selectionner un fichier";
									getChapter($view, $chapter_id, $message, null, $set_chapter);
								}
							} else {
								$message = "Champ manquant";
								getChapter($view, $chapter_id, $message, null, $set_chapter);
							}
							
						} else {
							$message = "Tout les champs doivent etre remplis";
							getChapter($view, $chapter_id, $message, null, $set_chapter);
						}
						
					} else {
						$message = "Champ manquant";
					getChapter($view, $chapter_id, $message, null, $set_chapter);
					}

				} else {
					new_Chapter(); 
				}
			} else if (isset($_GET["read_Chapter"]) AND $_GET["read_Chapter"] === "true") {
				getChapter($_GET["view"], $_GET["chapter_ID"]);
			} else if (isset($_GET["set_chapter"]) AND $_GET["set_chapter"] === "true") {

				$set_chapter = $_GET["set_chapter"];
				$view = $_GET["view"];
				$chapter_id = $_GET["chapter_ID"];

				if (isset($_POST["update_chapter"])) {
					$chapter_title = $_POST["chapter_title"];
					$chapter_text = $_POST["chapter_text"];
					if (isset($chapter_title) AND isset($chapter_text)) {
						if (!empty($chapter_title) AND !empty($chapter_text)) {
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
							    					$img_url = $new_file_name;
								                    $message = "Le chapitre à était modifier !";

								                    update_Chapter($chapter_title, $chapter_text, $img_url, $chapter_id);
								                    getChapter($view, $chapter_id, $message, null, $set_chapter);
							    					
							    				} else {
							    					$message = "Erreur pendant le téléchargement du fichier";
								        	        getChapter($view, $chapter_id, $message, null, $set_chapter);
							    				}
							    			} else {
							    				$message = "Fichier trop lourd";
								    	        getChapter($view, $chapter_id, $message, null, $set_chapter);
							    			}
							    		} else {
							    			$message = "Erreur de téléchargement veuillez réessayer";
								    		getChapter($view, $chapter_id, $message, null, $set_chapter);
							    		}
							    		
							    	} else {
							    		$message = "Extension de fichier invalide. Extesion autoriser ( jpg, jpeg, png, ) ";
								    	getChapter($view, $chapter_id, $message, null, $set_chapter);
							    	}
								} else {
									$message = "Veuillez selectionner un fichier";
									getChapter($view, $chapter_id, $message, null, $set_chapter);
								}
							} else {
								$message = "Champ manquant";
								getChapter($view, $chapter_id, $message, null, $set_chapter);
							}
							
						} else {
							$message = "Tout les champs doivent etre remplis";
							getChapter($view, $chapter_id, $message, null, $set_chapter);
						}
						
					} else {
						$message = "Champ manquant";
					getChapter($view, $chapter_id, $message, null, $set_chapter);
					}
				} else {
					getChapter($view, $chapter_id, null, null, $set_chapter);
				}
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

	    	

	    } else if (isset($_GET["msg"])) {
	    	
	    	$msg_query = $_GET["msg"];
	    	$msg_id = $_GET["msg_id"];
	    	message_admin($msg_query, $msg_id);
	    	
	    } else if ( isset($_GET["btn"] ) AND $_GET["btn"] === "signal_comment" )  {
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