<?php $title = "Connexion" ?>
<?php ob_start(); ?>
<?php require("header/frontHeader.php") ?>
<?php $header =  ob_get_clean();  ?>
<?php ob_start(); ?>
<div class="row d-flex justify-content-center mt-5">
	<h2 class="text-dark m-2 mt-5">Connexion</h2>
</div>
<section id="connexionSection" class="container p-0">
	<div id="connexionContent" class="row justify-content-center align-items-center flex-column m-0">
		<div class="d-flex justify-content-center align-items-center flex-column">
			<div>
				<img id="author2Connexion" src="images/author2.jpg">
		    </div>
		</div>
		<form action="index.php?adminAction=meschapitres" method="post" class="form-signin col-lg-8 d-flex justify-content-center align-items-center flex-column">
		    <div class=" col-lg-5 d-flex justify-content-center align-items-center flex-column m-3">
		    	<div id="inputContainer" class="col">
		    		<input id="emailInput" class="form-control form-control-lg p-3" type="text" name="username" placeholder="Identifiant">		    			
		    	</div>
		    	<div class="col rounded-bottom">
		    		<input id="passwordInput" class="form-control form-control-lg p-3" type="password" name="password" placeholder="Mot de passe">
		    	</div>
		    	<div class="form-check m-3">
		    		<input class="form-check-input" type="checkbox" value="" id="rememberme">
		    		<label class="form-check-label" for="rememberme">Se souvenir de moi</label>
		    	</div>
		    	<div class="col m-3 d-flex justify-content-center align-items-center">
		    		<button type="submit" name="connect" class="btn btn-dark btn-lg m-2 col-lg-8">Se connecter</button>
		    	</div>
		    </div>
		</form>
	</div>
</section>
<?php $body =  ob_get_clean();  ?>
<?php ob_start(); ?>
<script src="js/menu_responsive.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<?php $script =  ob_get_clean();  ?>
<?php ob_start(); ?>
<?php require("footer/frontFooter.php") ?>
<?php $footer =  ob_get_clean();  ?>
<?php require("template/template.php"); ?>
