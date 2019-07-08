<?php $title = "Contact"; ?>

<?php ob_start(); ?>
<?php require("header/frontHeader.php") ?>
<?php $header =  ob_get_clean();  ?>

<?php ob_start(); ?>
<div class="row d-flex justify-content-center mt-5">
		<h2 class="text-dark m-2 mt-5">Contact</h2>	
	</div>
       <section id="contactSection" class="container-fluid p-0" style="margin-top: 30px;">
			<div class="row d-flex justify-content-center align-items-center m-0 flex-column">
				 <?php if (isset($message)) {
			    	echo $message;
			    } ?>
				


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
<script src="js/menu_responsive.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<?php $script =  ob_get_clean();  ?>

		<?php ob_start(); ?>
        <?php require("footer/frontFooter.php") ?>
        <?php $footer =  ob_get_clean();  ?>
        
		<?php require("template/template.php"); ?>
