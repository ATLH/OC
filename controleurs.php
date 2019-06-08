<?php  
require_once("model/billetsManager.php");
require_once("model/commentManager.php");

function jeanforteroche(){
	require("view/jeanforteroche.php");
}
function auteur(){
	require("view/auteur.php");
}
function romans(){
    $bddQuery = romans();
	require("view/romans.php");
}
// Instance $billetsManagerInstance + apelle de la methode tickets();
function billets(){
	$billetsManagerInstance = new BilletsManager();
	$bddQuery = $billetsManagerInstance->tickets();
	require("view/billets.php");
}
// Instance $billetsManagerInstance + apelle de la methode ticket();
function billet($actionPost){
	$billetsManagerInstance = new BilletsManager();
	$commentManagerInstanceBillet = new commentManager();

	$billetView = $billetsManagerInstance->ticket($actionPost);
	$billetComment = $commentManagerInstanceBillet->getComment($actionPost);
	require("view/billet.php");
}
function addNewComment(){
	$commentManagerInstance = new commentManager();
	$commentManagerInstance->addComment();
}
function contact(){
	require("view/contact.php");
}
function connexion(){
	require("view/connexion.php");
}
?>
