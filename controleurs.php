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
function billets(){
	$billetsManagerInstance = new BilletsManager();
	$bddQuery = $billetsManagerInstance->tickets();
	require("view/billets.php");
}
function billet($actionPost){
	$billetsManagerInstance = new BilletsManager();
	$billetView = $billetsManagerInstance->ticket($actionPost);
	require("view/billet.php");
}
function addNewComment(){
	$commentManagerInstance = new commentManager();
	$commentManagerInstance->addComment();
	require("view/billet.php");
}
function contact(){
	require("view/contact.php");
}
function connexion(){
	require("view/connexion.php");
}
?>