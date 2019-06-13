<?php session_start(); ?>

<?php $title = "Contact"; ?>

<?php ob_start(); ?>
<?php require("header/frontHeader.php") ?>
<?php $header =  ob_get_clean();  ?>

<?php ob_start(); ?>
       <section id="contactSection" class="container-fluid p-0">
			<div class="row d-flex justify-content-center align-items-center m-0 flex-column">
				<div class="col d-flex justify-content-center align-items-center">
					<h3 class="text-center text-dark m-3">Contact</h3>
				</div>
				<?php 
				if (!empty($_POST)) {
					$_SESSION["prenom"] = $_POST["firstname"];
					echo "Merci pour votre message " . $_POST["firstname"] . " !";
				} 
				?>
				<form action="index.php?action=contact" method="post" class="col-md-10">
					<div class="form-row m-3 d-flex justify-content-center align-items-center">
						<div class="col-md-5">
							<label for="prenom">Prénom</label>
							<input name="firstname" type="text" class="form-control" id="prenom">
						</div>
						<div class="col-md-5">
							<label for="nom">Nom</label>
							<input name="lastname" type="text" class="form-control" id="nom">
						</div>
					</div>
					<div class="form-row m-3 d-flex justify-content-center align-items-center">
						<div class="col-md-10">
							<label for="email">Email</label>
							<input name="email" type="email" class="form-control" id="email">
						</div>
					</div>
					<div class="form-row m-3 d-flex justify-content-center align-items-center">
						<div class="col-md-10">
							<label for="email">Message</label>
							<textarea name="message" type="text" class="form-control" id="message"></textarea>
						</div>
					</div>
					<div class="col d-flex justify-content-center align-items-center col-lg-12">
					    <button type="submit" name="envoyer" class="btn btn-outline-dark m-2">Envoyer</button>
				    </div>  
			    </form>
		    </div>
		</section>
		<script src="js/menu_responsive.js"></script>
		<?php $body = ob_get_clean(); ?>

		<?php ob_start(); ?>
        <?php require("footer/frontFooter.php") ?>
        <?php $footer =  ob_get_clean();  ?>
        
		<?php require("template/template.php"); ?>
