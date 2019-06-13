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
// Instance $billetsManagerInstance + apelle de la methode tickets();
function billets() {
	$billetsManagerInstance = new BilletsManager();
	$bddQuery = $billetsManagerInstance->tickets();
	require("frontView/billets.php");
}
// Instance $billetsManagerInstance + apelle de la methode ticket();
function billet($actionPost) {
	$billetsManagerInstance = new BilletsManager();
	$commentManagerInstanceBillet = new commentManager();
    
    // $billetView et $billetComment = valeur retourner par les fonction ticket et getComment
	$billetView = $billetsManagerInstance->ticket($actionPost);
	$billetComment = $commentManagerInstanceBillet->getComment($actionPost);
	require("frontView/billet.php");
}
function addNewComment() {
	$commentManagerInstance = new commentManager();
	$commentManagerInstance->addComment();
}
function contact() {
	require("frontView/contact.php");
}
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

function meschapitres() {
	require("backView/meschapitres.php");
}

function commentaires() {
	require("backView/commentaires.php");
}

function message() {
	require("backView/message.php");
}


?>

