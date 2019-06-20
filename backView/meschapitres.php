<?php 
	session_start(); 
?>

<?php $title = "mes chapitres" ?>

<?php ob_start(); ?>
<?php require("header/backHeader.php") ?>
<?php $header =  ob_get_clean();  ?>

<?php ob_start(); ?>
<div class="container" style="margin-top: 100px;">
	<div class="row">
		<div class="col-lg-12">
			<h2 class="text-center">Mes chapitres</h2>
		</div>
	</div>
</div>
<div class="container" style="margin-top: 100px;">
<?php while ( $meschapitre = $bddQuery->fetch() ) { ?>
	
	<div style="margin: 30px;" class="row">
		<div class="col-lg-12">
			<div id="media" style="box-shadow: " class="rounded media  d-flex justify-content-center align-items-center">
				<img class="rounded" style="height: 250px; width: 250px; margin: 5px;" src="<?php echo $meschapitre["img_url"] ?>">
				<div style="padding: 20px;" class="media-body">
					<h4><?php echo $meschapitre["chapter_title"] ?></h4>
					<p style="font-size: 18px;" > <?php echo $meschapitre["excerpt2"] ?>... </p>
					<a href="index.php?adminAction=chapitre&chapter_ID=<?php echo $meschapitre["ID"]; ?>&view=admin_view" class="btn btn-outline-dark">Lire la suite</a>
				</div>
			</div>
		</div>
	</div>

<?php
} 
?>
</div>

<?php $body = ob_get_clean(); ?>

<?php ob_start(); ?>
<script src="js/menu_responsive.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<?php $script =  ob_get_clean();  ?>

<?php ob_start(); ?>
<?php require("footer/backFooter.php") ?>
<?php $footer =  ob_get_clean();  ?>


<?php require("template/template.php"); ?>