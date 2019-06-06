<?php $title = "Contact"; ?>
<?php ob_start(); ?>

       <section id="contactSection" class="container-fluid p-0">
			<div class="row d-flex justify-content-center align-items-center m-0 flex-column">
				<div class="col d-flex justify-content-center align-items-center">
					<h3 class="text-center text-dark m-3">Contact</h3>
				</div>
				<form action="jeanforteroche.php" method="post" class="col-md-10">
					<div class="form-row m-3 d-flex justify-content-center align-items-center">
						<div class="col-md-5">
							<label for="prenom">Prénom</label>
							<input type="text" class="form-control" id="prenom">
						</div>
						<div class="col-md-5">
							<label for="nom">Nom</label>
							<input type="text" class="form-control" id="nom">
						</div>
					</div>
					<div class="form-row m-3 d-flex justify-content-center align-items-center">
						<div class="col-md-5">
							<label for="numero">Numéro</label>
							<input type="tel" class="form-control" id="numero">
						</div>
						<div class="col-md-5">
							<label for="email">Email</label>
							<input type="email" class="form-control" id="email">
						</div>
					</div>
					<div class="form-row m-3 d-flex justify-content-center align-items-center">
						<div class="col-md-10">
							<label for="email">Message</label>
							<textarea type="text" class="form-control" id="message"></textarea>
						</div>
					</div>
				</form>
				<div class="col d-flex justify-content-center align-items-center col-lg-2">
					<button type="button" class="btn btn-outline-dark m-2">Envoyer</button>
				</div>
			</div>
		</section>
		<script src="js/menu_responsive.js"></script>
		<?php $body = ob_get_clean(); ?>
		<?php require("template/template.php"); ?>
