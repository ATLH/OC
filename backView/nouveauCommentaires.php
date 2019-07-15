<?php session_start(); ?>
<?php $title = "commentaires" ?>
<?php ob_start(); ?>
<?php require("header/backHeader.php") ?>
<?php $header =  ob_get_clean();  ?>
<?php ob_start(); ?>
<div  class="container" style="margin-top: 100px;">
	<div class="row">
		<div class="col-lg-12">
			<h2 class="text-center">Nouveau commentaires</h2>
		</div>
	</div>
</div>
<div class="container">
	<div class="row d-flex justify-content-center">
		<a href="index.php?adminAction=commentaires&btn=true" class="btn btn-outline-dark col-xs-4 m-1" style="font-size: 8px;">
  Nouveau commentaires <span class="badge badge-light"><?php echo $nwComment["nw"] ?></span></a>
        <a href="index.php?adminAction=commentaires&btn=true" class="btn btn-outline-dark col-xs-4 m-1" style="font-size: 8px;">
  Trier par chapitre <span class="badge badge-light"><?php echo $nwComment["nw"] ?></span></a>
        <a href="index.php?adminAction=commentaires&btn=true" class="btn btn-outline-dark col-xs-4 m-1" style="font-size: 8px;">
  Commentaires signaler<span class="badge badge-light"><?php echo $nwComment["nw"] ?></span></a>
	</div>
</div>
<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
	<div class="carousel-inner">
		<div class="carousel-item active">
			<img src="images/bg4.jpg" class="d-block w-100" alt="...">
		</div>
		<div class="carousel-item">
			<img src="images/bg2.jpg" class="d-block w-100" alt="...">
		</div>
		<div class="carousel-item">
			<img src="images/bg3.jpg" class="d-block w-100" alt="...">
		</div>
	</div>
</div>
<div class="container">
	<?php while ( $newComment = $CommentQuery->fetch() ) { ?>
		<div style="margin: 30px;" class="row d-flex justify-content-center">
			<div class="col-lg-10">
				<div id="commentMedia" class="rounded media d-flex justify-content-center align-items-center">
					<div style="padding: 10px;" class="media-body">
						<div>
							<p style="font-size: 15px; margin: 0px;">De : <?php echo $newComment["comment_lastname"]; ?></p>
							<p style="font-size: 15px;">Date : <?php echo $newComment["comment_date"]; ?></p>
						</div>
						<p style="font-size: 15px;" ><?php echo $newComment["comment"] ?></p>
					</div>
					<div class="d-flex justify-content-center align-items-center">
						<a id="validerBtn" title="Valider" href="index.php?adminAction=commentaires&allowComment=true&comment_ID=<?php echo $newComment["ID"] ?>" class="btn btn-outline-success btn-sm d-block mr-4">Valider le commentaire</a>
					    <a title="Suprimer" href="index.php?adminAction=commentaires&allowComment=false&comment_ID=<?php echo $newComment["ID"] ?>" class="btn btn-outline-danger d-block mr-4 btn-sm">Suprimer le commentaire</a>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
</div>
<?php $body = ob_get_clean(); ?>
<?php ob_start(); ?>
<script src="js/menu_responsive.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="js/bootstrap-4-navbar.js"></script>
<?php $script =  ob_get_clean();  ?>
<?php ob_start(); ?>
<?php require("footer/backFooter.php") ?>
<?php $footer =  ob_get_clean();  ?>
<?php require("template/template.php"); ?>
