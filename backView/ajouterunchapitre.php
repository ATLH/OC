<?php session_start(); ?>
<?php $title = "ajouterunchapitre" ?>
<?php ob_start(); ?>
<?php require("header/backHeader.php") ?>
<?php $header =  ob_get_clean();  ?>
<?php ob_start(); ?>
<div class="container" style="margin-top: 100px;">
	<div class="row d-flex justify-content-center">
		<div class="col-lg-12">
			<h2 class="text-center">Ajouter un chapitre</h2>
		</div>
		<div class="col-lg-12">
			<p class="text-center"><?php if (isset($message)) {
			echo $message;
		}
		?></p>
		</div>
	</div>
</div>
<div class="container">
	<div class="row d-flex justify-content-center">
		<div class="col-lg-10">
			<form action="index.php?adminAction=chapitre&view=admin_view&addChapter=true" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="chapter_title">Titre du chapître</label>
					<input type="text" name="chapter_title" class="form-control" id="chapter_title">
				</div>
				<div class="custom-file mb-5">
					<label for="img_url" class="custom-file-label" id="file_id" style="cursor: pointer;">Télécharger une image</label><br>
				    <input type="file" class="custom-file-input mt-3" name="img_url" id="img_url">
				</div>
				<textarea name="chapter_text" id="add_editor"></textarea>
				<div class="col d-flex justify-content-center align-items-center col-lg-12">
					<button type="submit" name="envoyer" class="btn btn-outline-dark m-2">Envoyer</button>
				</div>  
	        </form>
		</div>
	</div>
</div>
<?php $body =  ob_get_clean();  ?>
<?php ob_start(); ?>
<script src="js/menu_responsive.js"></script>
<script src="js/tinymce.js"></script>
<script src="js/fr_FR.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<?php $script =  ob_get_clean();  ?>
<?php ob_start(); ?>
<?php require("footer/backFooter.php") ?>
<?php $footer =  ob_get_clean();  ?>
<?php require("template/template.php"); ?>

