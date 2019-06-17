<?php  

// Model
require_once("model/billetsManager.php");
require_once("model/commentManager.php");
require_once("model/contactManager.php");
require_once("model/signin.php");

// front controleurs

function jeanforteroche() {
	require("frontView/jeanforteroche.php");
}
function auteur() {
	require("frontView/auteur.php");
}
function romans() {
    $bddQuery = romans();
	require("frontView/romans.php");
}
// Récupère la liste des chapitres plus affichage 
function getChapters($actionPost) {
	$billetsManagerInstance = new BilletsManager();
	$bddQuery = $billetsManagerInstance->tickets();
	if ( $actionPost === "billets" ) {
    	require("frontView/billets.php");
    } if ( $actionPost === "meschapitres" ) {
    	require("backView/meschapitres.php");
    }	
}
// Récupère un chapitres et ses commentaireq plus affichage 
function getChapter($view, $actionPost) {
	$billetsManagerInstance = new BilletsManager();
	$commentManagerInstanceBillet = new commentManager();

    if ($view === "admin_view") {
    	$billetView = $billetsManagerInstance->ticket($actionPost);
    	require("backView/readChapter.php");
    } 
    if ($view === "client_view") {
    	$billetView = $billetsManagerInstance->ticket($actionPost);
	    $billetComment = $commentManagerInstanceBillet->getComment($actionPost);
	    require("frontView/billet.php");
    }
   
}
// Ajoute nouveau commentaires 
function addNewComment() {
	$commentManagerInstance = new commentManager();
	$commentManagerInstance->addComment();
}

function contact() {
	require("frontView/contact.php");
}
// Ajoute nouveau message 
function addMessage() {
	$contactManagerInstance = new contactManager();
	$contactManagerInstance->sendMessage();
	require("frontView/contact.php");
}

function connexionView(){
	require("frontView/connexion.php");
}


// Switching function (Front || Admin)


function connexion($user_id, $password) {
	$userSigninInstance = new signin();
	$user = $userSigninInstance->userSignIn($user_id);
	$passwordOk = password_verify($password, $user["password"]);
	if ($passwordOk) {
		session_start(); 
        $_SESSION["lastname"] = $user["lastname"];
        $_SESSION["firstname"] = $user["user_ID"];
		require("backView/ajouterunchapitre.php");
	} else {
		connexionView();
	}
}

// Admin controleurs

function ajouterunchapitre() {
	require("backView/ajouterunchapitre.php");
}



///////////////////////////////////////////////////////////////////


function commentAdmin($value ,$commentID) {
	$commentManagerInstance = new commentManager();

	if ( $value === "true" ) {
		$commentManagerInstance->allowComment($commentID);
		$CommentQuery = $commentManagerInstance->getModerationComment();
		require("backView/commentaires.php");
		} 
	if ( $value === "false" ) {
		$commentManagerInstance->deleteComment($commentID);
		$CommentQuery = $commentManagerInstance->getModerationComment();
		require("backView/commentaires.php");
		} 
}

function getAdminComment() {
	$commentManagerInstance = new commentManager();
	$CommentQuery = $commentManagerInstance->getModerationComment();
	require("backView/commentaires.php");
}

function allowComments($vcomment) {
	$commentManagerInstance = new commentManager();
   
}


//////////////////////////////////////////////////////////////
function message() {
	require("backView/message.php");
}


?>

