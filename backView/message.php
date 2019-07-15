<?php session_start(); ?>
<?php $title = "message" ?>
<?php ob_start(); ?>
<?php require("header/backHeader.php") ?>
<?php $header =  ob_get_clean();  ?>
<?php ob_start(); ?>
<div class="container" style="margin-top: 100px;">
	<div class="row">
		<div class="col-lg-12">
			<h2 class="text-center">Messages</h2>
		</div>
	</div>
</div>
<div class="container" style="margin-top: 100px;">
<?php while ($messages = $message->fetch() ) { ?>
	<div class="row mb-4">
		<div class="col-lg-10 col-xs-9 m-auto">
			<div id="commentMedia" class="rounded media d-flex justify-content-center align-items-center flex-wrap">
				<div  class="media-body">
					<div class="d-flex justify-content-left ">
						<p class="m-3" style="font-size: 13px; margin: 0px;">De : <?php echo $messages["firstname"]; ?></p>
						<p class="m-3" style="font-size: 13px;">le : <?php echo $messages["message_date"]; ?></p>
						<p class="m-3" style="font-size: 13px;">à : <?php echo $messages["hour"]; ?></p>
					</div>
					<div class="d-flex justify-content-left">
						<p class="ml-3" style="font-size: 15px;" ><?php echo $messages["message"] ?></p>
					</div>
				</div>
				<div class="d-flex justify-content-left align-items-center col-lg-3 col-sm-12 p-0">
					<a title="Valider" href="index.php?adminAction=commentaires&msg=reply" class="btn btn-outline-success m-3 btn-sm ">Repondre</a>
				    <a title="Suprimer" href="index.php?adminAction=commentaires&msg=delete&msg_id=<?php echo $messages["ID"] ?>" class="btn btn-outline-danger m-3 btn-sm">Suprimer</a>
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
<?php $script =  ob_get_clean();  ?>
<?php ob_start(); ?>
<?php require("footer/backFooter.php") ?>
<?php $footer =  ob_get_clean();  ?>
<?php require("template/template.php"); ?>