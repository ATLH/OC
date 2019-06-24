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

function signalComment($signalComment){
	$commentManagerInstance = new commentManager();
	$commentManagerInstance->signalThisComment($signalComment);
	
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
		require("backView/meschapitres.php");
	} else {
		connexionView();
	}
}

// Admin controleurs

function ajouterunchapitre() {
	require("backView/meschapitres.php");
}

// Valide ou supprime un commentaire en fonction de son ID puis appel getAdminComments();
function commentAdmin($allowComment ,$commentID) {
	$commentManagerInstance = new commentManager();

	if ( $allowComment === "true" ) {
		$commentManagerInstance->allowComment($commentID);
		
		} 
	if ( $allowComment === "false" ) {
		$commentManagerInstance->deleteComment($commentID);
		
		} 
}
// Affiche tout les nouveau commentaires coté admin dans la vue commentaires.php
function getAdminComments($btn) {
	$commentManagerInstance = new commentManager();
	$billetsManagerInstance = new BilletsManager();

    // commentQuery est egal à tout les commentaires avec la valeur true
	$CommentQuery = $commentManagerInstance->getModerationComment($btn);

	$commentsAlerted = $commentManagerInstance->getCommentsAlerted();
	$bddQuery = $billetsManagerInstance->ticket_id();
	$nwComment = $commentManagerInstance->getCountOfNewComment();

	require("backView/nouveauCommentaires.php");
}

function getCommentByChapter($commentByChapter){
    $billetsManagerInstance = new BilletsManager();
    $commentManagerInstance = new commentManager();

    // commentQuery est egal tout les commentaires de l'id $commentByChapter
    $CommentQuery = $commentManagerInstance->getCommentChapterID($commentByChapter);
    
    $chapter_id = $commentByChapter;
    $commentsAlerted = $commentManagerInstance->getCommentsAlerted();
    $nwComment = $commentManagerInstance->getCountOfNewComment();
	$bddQuery = $billetsManagerInstance->ticket_id();
	require("backView/commentairesByChapter.php");
}
function getAlertedComment(){
    $billetsManagerInstance = new BilletsManager();
	$commentManagerInstance = new commentManager();

	$commentsAlerted = $commentManagerInstance->getCommentsAlerted();
	$CommentQuery = $commentManagerInstance->getAllCommentAlerted();

	$bddQuery = $billetsManagerInstance->ticket_id();

	$nwComment = $commentManagerInstance->getCountOfNewComment();
	require("backView/signalComment.php");
}

function message() {
	$contactManagerInstance = new contactManager();
	$message = $contactManagerInstance->getMessage();
	require("backView/message.php");
}

?>

