<?php  

// Model
require_once("model/billetsManager.php");
require_once("model/commentManager.php");
require_once("model/contactManager.php");
require_once("model/signin.php");
require_once("model/contactManager.php");

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

function connexion($username, $password) {

	$userSigninInstance = new signin();
	$user = $userSigninInstance->userSignIn($username);

	//Password à verifier
	$user_password = $user["password"];

	//Comparaison du mot de passe entré avec celui de l'utilisateur en BDD
	$password = password_verify($password, $user_password);

	if ($password) {
		session_start(); 
        $_SESSION["username"] = $user["username"];
		require("backView/ajouterunchapitre.php");
	} else {
		connexionView();
	}
}

// Admin controleurs

function ajouterunchapitre() {
	require("backView/ajouterunchapitre.php");
}

// Valide ou supprime un commentaire en fonction de son ID
function commentAdmin($allowComment ,$commentID) {
	$commentManagerInstance = new commentManager();

	if ( $allowComment === "true" ) {
		$commentManagerInstance->allowComment($commentID);
		getAdminComments("true");
		} 
	if ( $allowComment === "false" ) {
		$commentManagerInstance->deleteComment($commentID);
		getAdminComments("true");
		} 
}
// Affiche les commentaires coté admin
function getAdminComments($btn) {
	$commentManagerInstance = new commentManager();
	$billetsManagerInstance = new BilletsManager();

	$CommentQuery = $commentManagerInstance->getModerationComment($btn);
	$bddQuery = $billetsManagerInstance->ticket_id();
	$nwComment = $commentManagerInstance->getCountOfNewComment();

	require("backView/commentaires.php");
}

function getCommentByChapter($commentByChapter){
    $billetsManagerInstance = new BilletsManager();
    $commentManagerInstance = new commentManager();

    $nwComment = $commentManagerInstance->getCountOfNewComment();
	$bddQuery = $billetsManagerInstance->ticket_id();
	$CommentQuery = $commentManagerInstance->getCommentChapterID($commentByChapter);
	require("backView/commentaires.php");
}

function message() {
	$contactManagerInstance = new contactManager();
	$message = $contactManagerInstance->getMessage();
	require("backView/message.php");
}

?>

