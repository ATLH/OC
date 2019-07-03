<?php session_start(); ?>

<?php $title = "ajouterunchapitre" ?>

<?php ob_start(); ?>
<?php require("header/backHeader.php") ?>
<?php $header =  ob_get_clean();  ?>

<?php ob_start(); ?>
<script type="text/javascript">
tinymce.init(
	{
		selector: "#editor",
		plugins : "advlist autolink link image lists charmap print preview fullscreen",
		height : 500,
		language : "fr_FR",
		 images_upload_url: 'postAcceptor.php',
		
	}
);
</script>
<div class="container mt-5">
	<div class="row d-flex justify-content-center">
		<div class="col-lg-10">
			<form action="index.php?test=testView" method="POST">
		        <textarea id="editor"></textarea>
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
<script src="js/fr_FR.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<?php $script =  ob_get_clean();  ?>


<?php ob_start(); ?>
<?php require("footer/backFooter.php") ?>
<?php $footer =  ob_get_clean();  ?>


<?php require("template/template.php"); ?>

