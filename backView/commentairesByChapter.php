<?php session_start(); 

?>

<?php $title = "commentaires du chapitre $chapter_id" ?>

<?php ob_start(); ?>
<?php require("header/backHeader.php") ?>
<?php $header =  ob_get_clean();  ?>

<?php ob_start(); ?>
<div class="container" style="margin-top: 100px;">
	<div class="row">
		<div class="col-lg-12">
			<h2 class="text-center">Commentaires du chapitre n°<?php echo $chapter_id ?> </h2>
		</div>
	</div>
</div>
<div class="container" style="margin-top: 100px;">
	<div class="row d-flex justify-content-center align-items-center">
		<div class="col-lg-3 d-flex justify-content-center">
			<a href="index.php?adminAction=commentaires&btn=true" class="btn btn-outline-dark">
  Nouveau commentaires <span class="badge badge-light"><?php echo $nwComment["nw"] ?></span>
            </a>
		</div>
		<div class="dropdown">
			<button class="btn btn-outline-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Trier par chapitres</button>
			<div class="dropdown-menu">
				<?php while ( $comment_chapter_ID = $bddQuery->fetch() ) { ?>
				<a class="dropdown-item" href="index.php?adminAction=commentaires&chapter_id=<?php echo $comment_chapter_ID["ID"] ?>">Chapitre <?php echo $comment_chapter_ID["ID"] ?></a>
				<?php
			} 
			?>
			</div>
		</div>
		<div class="col-lg-3 d-flex justify-content-center">
			<a href="index.php?adminAction=commentaires&btn=signal_comment" class="btn btn-outline-dark">
  Commentaire signaler <span class="badge badge-light"><?php echo $commentsAlerted["ca"]; ?></span>
            </a>
		</div>
	</div>
</div>

<div class="container">
	<?php while ( $commentByChapter = $CommentQuery->fetch() ) { ?>
		<div style="margin: 30px;" class="row d-flex justify-content-center">
			<div class="col-lg-10">
				<div id="commentMedia" class="rounded media d-flex justify-content-center align-items-center">
					<div style="padding: 10px;" class="media-body">
						<div>
							<p style="font-size: 15px; margin: 0px;">De : <?php echo $commentByChapter["comment_lastname"]; ?></p>
							<p style="font-size: 15px;">Date : <?php echo $commentByChapter["comment_date"]; ?></p>
						</div>
						<p style="font-size: 15px;" ><?php echo $commentByChapter["comment"] ?></p>
					</div>
					<div class="d-flex justify-content-center align-items-center">
					    <a title="Suprimer" href="index.php?adminAction=commentaires&allowComment=false&deleteCommentByChapter=true&comment_ID=<?php echo $commentByChapter["ID"] ?>&chapter_id=<?php echo $chapter_id ?>" class="btn btn-outline-danger d-block mr-4 btn-sm">Suprimer le commentaire</a>
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