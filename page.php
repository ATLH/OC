<?php $title = "Billets" ?>
<?php ob_start(); ?>
<?php require("model/ajoutdedonnée.php") ?>
 <section id="contactSection" class="container-fluid p-0">
			<div class="row d-flex justify-content-center align-items-center m-0 flex-column">
				<div class="col d-flex justify-content-center align-items-center">
					<h3 class="text-center text-dark m-3">Contact</h3>
				</div>
				<form action="page.php" method="post" class="col-md-10">
					<div class="form-row m-3 d-flex justify-content-center align-items-center">
						<div class="col-md-5">
							<label for="titre">titre</label>
							<input name="titre" type="text" class="form-control" id="titre">
						</div>
						<div class="col-md-5">
							<label for="texte">texte</label>
							<input name="texte" type="text" class="form-control" id="texte">
						</div>
					</div>
					<div class="form-row m-3 d-flex justify-content-center align-items-center">
						<div class="col-md-5">
							<label for="date">date</label>
							<input name="date" type="date" class="form-control" id="date">
						</div>
						<div class="col-md-5">
							<label for="img_url">img</label>
							<input name="img_url" type="text" class="form-control" id="img_url">
						</div>
					</div>
					<div class="col d-flex justify-content-center align-items-center col-lg-2">
					    <button id="button" class="btn btn-outline-secondary" type="submit" name="envoyer">Envoyer</button>
				    </div>
				</form>
			</div>
		</section>
		<script type="text/javascript">
			let button = document.getElementById("button");
			button.addEventListener("click", function() {
				<?php 
				if ( isset($_POST["texte"]) ) {
					$add = new addToBdd();
					$add->addData();
				} else {
					echo "pas envoyer";
				} ?>
			})
		</script>
		
<script src="js/menu_responsive.js"></script>
<?php $body = ob_get_clean(); ?>
<?php require("template/template.php"); ?>