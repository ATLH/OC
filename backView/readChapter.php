<?php session_start(); ?>
<?php $title = "Billet" ?>
<?php ob_start(); ?>
<?php require("header/backHeader.php") ?>
<?php $header =  ob_get_clean();  ?>
<?php ob_start(); ?>
<section class="container-fluid p-0">
	<div id="img-container" style="height: 500px;" class="col-lg-10 col-xs-12 d-flex justify-content-center align-items-center m-auto">
		<img id="chapter_img" class="img-fluid w-100 position-absolute rounded-lg" style="height: 500px;" src="<?php echo $billetView["img_url"]; ?>">
		<h3 class="position-absolute text-white" style="z-index: 2; font-size: 40px;"><?php echo $billetView["chapter_title"] ?></h3>
	</div>
	<div class="col-lg-10 d-flex justify-content-left align-items-center m-auto pl-0 pt-2">
		<p id="author_name" class="m-0" style="font-size: 15px;">Jean forteroche</p>
		<span><i class="fas fa-circle mr-2 ml-2" style="font-size: 5px;"></i></span>
		<p id="chapter_date" class="m-0" style="font-size: 14px;">
			<?php echo $billetView["chapter_date"] ?>
		</p>	
	</div>
</section>
<section class="container mt-5">
	<div class="col-lg-12 d-flex justify-content-left flex-column">
		<?php echo $billetView["chapter_text"]; ?>
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