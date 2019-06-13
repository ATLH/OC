<?php $title = "Billet" ?>

<?php ob_start(); ?>
<?php require("header/frontHeader.php") ?>
<?php $header =  ob_get_clean();  ?>

<?php ob_start(); ?>
<section class="container-fluid" style="height: 500px; margin-top: 100px;">
	<div style="position: relative; height: 500px;" class="container d-flex justify-content-center align-items-center">
		<img style="position: absolute; width: 100%; border-radius: 5px; height: 500px;" src="<?php echo $billetView["img_url"]; ?>">
		<h3 style="position: absolute; z-index: 2; font-size: 40px;" class="text-white"><?php echo $billetView["chapter_title"] ?></h3>
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
	<div class="row d-flex justify-content-center">
		<div class="col-lg-10 d-flex justify-content-left">
			<h4 class="text-dark" style="font-size: 20px; font-weight: lighter;">Commentaires</h4>
		</div>
	</div>
	<div class="row d-flex justify-content-center">
		<div class="col-lg-10 d-flex justify-content-left flex-column">
			<?php while ($comment_table = $billetComment->fetch()) {
				?> <div>
					<p class="text-dark" style="font-size: 20px; font-weight: lighter;"><?php echo $comment_table["cd"] . " " ?><span style="font-weight: bold;">-</span><?php echo " " . $comment_table["comment"]; ?></p>
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
			<form action="index.php?actionPost=<?php echo $_GET["actionPost"] ?>" method="post" class="col-md-10 p-0">
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
<?php require("footer/frontFooter.php") ?>
<?php $footer =  ob_get_clean();  ?>

<?php require("template/template.php"); ?>