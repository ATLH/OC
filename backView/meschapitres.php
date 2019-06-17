<?php 
	session_start(); 
?>

<?php $title = "mes chapitres" ?>

<?php ob_start(); ?>
<?php require("header/backHeader.php") ?>
<?php $header =  ob_get_clean();  ?>

<?php ob_start(); ?>

<div style="margin-top: 200px;">
	<?php echo "Bonjour " . $_SESSION["firstname"] . " !"; ?>
</div>
<div class="container">
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


<script src="js/menu_responsive.js"></script>
<?php $body = ob_get_clean(); ?>


<?php ob_start(); ?>
<?php require("footer/backFooter.php") ?>
<?php $footer =  ob_get_clean();  ?>


<?php require("template/template.php"); ?>