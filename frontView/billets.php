<?php $title = "Billets" ?>

<?php ob_start(); ?>
<?php require("header/frontHeader.php") ?>
<?php $header =  ob_get_clean();  ?>

<?php ob_start(); ?>
<div class="row d-flex justify-content-center mt-5">
		<h2 class="text-dark m-2 mt-5">Billets</h2>	
	</div>
<section class="container">
	
<div class="row d-flex justify-content-center flex-wrap align-items-center">
	
<?php 
while ($chapter = $bddQuery->fetch()) {
?>

<div class="card m-4" style="width: 18rem;">
  <img src="<?php echo $chapter["img_url"]; ?>" class="card-img-top" >
  <div class="card-body">
    <h3 class="card-title" style="font-size: 20px;"><?php echo $chapter["chapter_title"]; ?></h3>
    <p class="card-text" style="font-size: 15px;"><?php echo $chapter["excerpt"]; ?>...</p>
    <a href="index.php?action=billet&chapter_ID=<?php echo $chapter["ID"] ?>&view=client_view" class="btn btn-outline-dark">Lire la suite</a>
    <div class="text-right">
    	<span class="" style="font-size: 15px;"><?php echo $chapter["chapter_date"]; ?></span>
    </div>
  </div>
</div>

<?php 
}
?>
</div>	
</section>
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
		
		
	
