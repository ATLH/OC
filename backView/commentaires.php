<?php session_start(); ?>

<?php $title = "commentaires" ?>

<?php ob_start(); ?>
<?php require("header/backHeader.php") ?>
<?php $header =  ob_get_clean();  ?>

<?php ob_start(); ?>
<div style="margin-top: 200px;">
	<?php echo "Bonjour " . $_SESSION["firstname"] . " !"; ?>
</div>

<div class="container">
<?php while ( $dismiss = $CommentQuery->fetch() ) { ?>
	
	<div style="margin: 30px;" class="row d-flex justify-content-center">
		<div class="col-lg-10">
			<div id="commentMedia" style="box-shadow: " class="rounded media  d-flex justify-content-center align-items-center">
				<div style="padding: 10px;" class="media-body">
					<h4 style="font-size: 20px;"><?php echo $dismiss["comment_date"] ?></h4>
					<p style="font-size: 15px;" ><?php echo $dismiss["comment"] ?>... </p>
				</div>
				<a title="Valider" href="index.php?adminAction=commentaires&allowComment=true&comment=<?php echo $dismiss["ID"] ?>" class="btn btn-outline-success d-block mr-4"><!--<i style="font-size: 30px;" class="fas fa-check"></i>-->Valider le commentaire</a>
				<a title="Suprimer" href="index.php?adminAction=commentaires&allowComment=false&comment=<?php echo $dismiss["ID"] ?>" class="btn btn-outline-danger d-block mr-4"><!--<i style="font-size: 30px;" class="fas fa-check"></i>-->Suprimer le commentaire</a>
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