<?php $title = "Connexion" ?>
<?php ob_start(); ?>
		<section id="connexionSection" class="container-fluid p-0">
			<div id="connexionContent" class="row justify-content-center align-items-center flex-column m-0">
		    	<div class="d-flex justify-content-center align-items-center flex-column">
		    		<div>
		    			<img id="author2Connexion" src="images/author2.jpg">
		    		</div>
		    		<div>
		    			<h2 class="text-dark m-2">Connexion</h2>
		    		</div>
		    	</div>
		    	<form action="connexion.php" method="post" class="form-signin col-lg-8 d-flex justify-content-center align-items-center flex-column">
		    		<div class=" col-lg-4 d-flex justify-content-center align-items-center flex-column m-3">
		    			<div id="inputContainer" class="col">
		    				<input id="emailInput" class="form-control form-control-lg p-3" type="email" name="email" placeholder="Email">		    			</div>
		    			<div class="col rounded-bottom">
		    				<input id="passwordInput" class="form-control form-control-lg p-3" type="password" name="password" placeholder="Mot de passe">
		    			</div>
		    			<div class="form-check m-3">
							<input class="form-check-input" type="checkbox" value="" id="rememberme">
							<label class="form-check-label" for="rememberme">Se souvenir de moi</label>
				        </div>
				       <div class="col m-3 d-flex justify-content-center align-items-center">
					       <button type="button" class="btn btn-outline-dark m-2 col-lg-8">Se connecter</button>
				       </div>
		    		</div>
		    	</form>
		    </div>
		</section>
		<script src="js/menu_responsive.js"></script>
		<?php $body =  ob_get_clean();  ?>
		<?php require("template/template.php"); ?>
