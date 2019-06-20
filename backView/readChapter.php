<?php $title = "Billet" ?>

<?php ob_start(); ?>
<?php require("header/backHeader.php") ?>
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