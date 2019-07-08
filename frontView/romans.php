<?php $title = "Romans" ?>

<?php ob_start(); ?>
<?php require("header/frontHeader.php") ?>
<?php $header =  ob_get_clean();  ?>

<?php ob_start(); ?>


<div class="container" style="margin-top: 100px;">
	<div class="row d-flex d-flex justify-content-center">
		<div class="col-lg-12">
			<h2 class="text-center mb-5">Mes romans</h2>
		</div>
		<div class="col-lg-10"><p>Dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p></div>
	</div>
</div>

<div class="container mt-5">
	<div class="row d-flex justify-content-center flex-wrap align-items-center">
		<?php while ( $roman = $getRomans->fetch() ) {
			?>
	    <div class="card  m-3" style="width: 14rem;">
			<img class="card-img-top" src="<?php echo $roman["img"]; ?>" style="height: 300px; width: auto;">
			<div class="card-body">
				<h3 class="card-title"><?php echo $roman["title"]; ?></h3>
				<p class="card-text" style=" font-size: 15px;"><?php echo $roman["text"]; ?></p>
			</div>
		</div>
	<?php
        } 
    ?>
	</div>
</div>
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
