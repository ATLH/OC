<?php  

// Model
require_once("model/billetsManager.php");
require_once("model/commentManager.php");
require_once("model/contactManager.php");
require_once("model/signin.php");
require_once("model/romansManager.php");




// front controleurs

function jeanforteroche() {
	require("frontView/jeanforteroche.php");
}
function auteur() {
	require("frontView/auteur.php");
}
function romans() {
    $romansInstanceManager = new romansManager();
    $getRomans = $romansInstanceManager->getRomans();
	require("frontView/romans.php");
}
// Récupère la liste des chapitres plus affichage 
function getChapters($actionPost) {
	$billetsManagerInstance = new BilletsManager();
	$bddQuery = $billetsManagerInstance->tickets();
	if ( $actionPost === "billets" ) {
    	require("frontView/billets.php");
    } if ( $actionPost === "meschapitres" ) {
    	session_start();

    	require("backView/meschapitres.php");
    }
}

function check_user($username, $password) {
	$userSigninInstance = new signin();
    
	$user = $userSigninInstance->userSignIn($username);

	$user_password = $user["password"];

    $password_test = password_verify($password, $user_password);
	

	

    if ($password_test) {
    	//Initialisation de la variable de session $_SESSION["username"] dans le fichier meschpaitres.php 
    	session_start(); 
    	$_SESSION["username"] = ucfirst($user["username"]);
    	

        $billetsManagerInstance = new BilletsManager();
	    $bddQuery = $billetsManagerInstance->tickets();
	    require("backView/meschapitres.php");

    }
    else {
    	connexionView();

    }
}


function getChapterSession(){
	    session_start();
	   
	    $billetsManagerInstance = new BilletsManager();
	    $bddQuery = $billetsManagerInstance->tickets();
	    require("backView/meschapitres.php");
}

// Récupère un chapitres et ses commentaires plus affichage 
function getChapter($view, $actionPost, $message = null, $message2 = null, $set_chapter = null) {
	$billetsManagerInstance = new BilletsManager();
	$commentManagerInstanceBillet = new commentManager();

    if ($view === "admin_view") {
    	if ($set_chapter === "true") {
    		$billetView = $billetsManagerInstance->ticket($actionPost);
    	    require("backView/set_chapter.php");
    	} else {
    	$billetView = $billetsManagerInstance->ticket($actionPost);
    	require("backView/readChapter.php");
    }
    } 
    if ($view === "client_view") {
    	if ($message || $message2) {
    		$billetView = $billetsManagerInstance->ticket($actionPost);
	        $billetComment = $commentManagerInstanceBillet->getComment($actionPost);
	        require("frontView/billet.php");
    	} else {
    		$billetView = $billetsManagerInstance->ticket($actionPost);
	        $billetComment = $commentManagerInstanceBillet->getComment($actionPost);
	        require("frontView/billet.php");
    	}
    	
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
	
}

function alertMessage($message) {
	$message;
	require("frontView/contact.php");
}

function connexionView(){
	require("frontView/connexion.php");

}


// Switching function (Front || Admin)



// Admin controleurs
function add_new_chapter($chapter_title,$chapter_text, $img_url){
	$billetsManagerInstance = new billetsManager();
	$billetsManagerInstance->add_new_chapter($chapter_title, $chapter_text, $img_url);
}

function ajouterunchapitre($message = null) {
	require("backView/ajouterunchapitre.php");
}

function reallowComment($commentID){
	$commentManagerInstance = new commentManager();
	$commentManagerInstance->reAllowThisComment($commentID);
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

function deconnexion(){
	session_start(); 
	$_SESSION = array();
	session_destroy();
	jeanforteroche();

}

?>

