<?php $title = "Chapitre" ?>

<?php ob_start(); ?>
<?php require("header/frontHeader.php") ?>
<?php $header =  ob_get_clean();  ?>

<?php ob_start(); ?>
<section class="container-fluid" style="height: 500px; margin-top: 100px;">
	<div style="position: relative; height: 500px;" class="container d-flex justify-content-center align-items-center">
		<img style="position: absolute; width: 100%; border-radius: 5px; height: 500px;" src="<?php echo $billetView["img_url"]; ?>">
		<h3 style="position: absolute; z-index: 2; font-size: 40px;" class="text-white"><?php echo $billetView["chapter_title"] ?></h3>
	</div>
	<div class="container text-right">
		<p class="m-0 mt-2">
			<?php echo $billetView["chapter_date"] ?>
		</p>	
	</div>
</section>

<section class="container">
	<div class="row d-flex justify-content-center">
		<div class="col-lg-10 d-flex justify-content-center">
			<p class="text-left">
				<?php echo $billetView["chapter_text"]; ?>
			</p>
		</div>
	</div>
</section>
<section class="container">
	<div class="row d-flex justify-content-center mb-3">
		<div class="col-lg-10 d-flex justify-content-left flex-column">
			 <?php if (isset($message)) { ?>
			 	<span class="text-danger" style="font-size: 15px;"><?php echo $message . "!"; ?></span>
			 	<?php	
			    } ?>
			<h4 class="text-dark" style="font-size: 20px; font-weight: lighter;">Commentaires</h4>
		</div>
	</div>
	<div class="row d-flex justify-content-center">
		<div class="col-lg-10 d-flex justify-content-left flex-column">
			<?php while ($comment_table = $billetComment->fetch()) {
				?> <div class="mb-2">
					    <div class="mb-3">
					    	<p class="mb-0" style="font-size: 15px;">De : <?php echo $comment_table["cf"] . " " . $comment_table["cl"]; ?></p>
					    	<p class="mb-0" style="font-size: 15px;">Le : <?php echo $comment_table["cd"]; ?></p>
					    </div>
						<div>
							<p class="mb-0" style="font-size: 19px; font-weight: lighter;"><?php echo $comment_table["comment"]; ?></p>
						</div>
						<div>
							<a class="text-danger" href="index.php?action=billet&signalComment=true&view=client_view&chapter_ID=<?php echo $comment_table["ccid"] ?>&comment_ID=<?php echo $comment_table["cid"] ?>" style="font-size: 13px; cursor: pointer;">Signaler le commentaire</a>
						</div>

				   </div>
				   <div class="d-flex justify-content-left w-50">
				   	<hr class="w-100 border border-dark text-left">
				   </div>
				   
			<?php } ?>
		</div>
	</div>
</section>
<section class="container">
	<div class="row d-flex justify-content-center">
		<div class="col-lg-10 d-flex justify-content-left">
			<h4 class="text-dark" style="font-size: 20px; font-weight: lighter;">Ajouter un commentaire</h4>
		</div>
		<div class="col-lg-10 d-flex justify-content-left">
		 <?php if (isset($message2)) { ?>
			 	<span class="text-danger" style="font-size: 15px;"><?php echo $message2; ?></span>
			 	<?php	
			    } ?>
	    </div>
	</div>
</section>
<section class="container mt-0" style="height: 30px; font-size: 20px; font-weight: lighter;">
	<div class="row d-flex justify-content-center">
		<div class="col-lg-10 d-flex justify-content-left">
<div class="succeedComment"><!--Votre commentaire à bien était ajouter ! --></div>
	</div>
	</div>
</section>
<section class="container mt-0" >
	<div class="row d-flex justify-content-center">
		<div class="col-lg-10 d-flex justify-content-left">
			<form action="index.php?action=billet&chapter_ID=<?php echo $_GET["chapter_ID"] ?>&view=client_view" method="post" class="col-md-10 p-0">
				<div class="form-row m-3 d-flex" style="margin-left: 0 !important;">
					<div class="col-md-3 pl-0">
						<label for="titre">Nom</label>
						<input name="lastname" type="text" class="form-control" id="nom" placeholder="Nom">
					</div>
					<div class="col-md-3 pl-0">
						<label for="texte">Prenom</label>
						<input name="firstname" type="text" class="form-control" id="prenom" placeholder="Prénom">
					</div>
				</div>
				<div class="col-md-6 p-0">
					<label for="texte">Commentaire</label>
					<textarea name="comment" type="text" class="form-control p-0" id="commentaire"></textarea>
				</div>
				<input type="hidden" name="bool" value="true">
				<div class="col d-flex justify-content-left align-items-center col-lg-2 pl-0 mt-3">
					<button id="button" class="btn btn-outline-secondary" type="submit" name="envoyer">Envoyer</button>
				</div>
			</form>
		</div>
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