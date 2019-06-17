<?php $title = "Billets" ?>

<?php ob_start(); ?>
<?php require("header/frontHeader.php") ?>
<?php $header =  ob_get_clean();  ?>

<?php ob_start(); ?>
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
  </div>
</div>

<?php 
}
?>
</div>	
</section>
<script src="js/menu_responsive.js"></script>

<?php $body = ob_get_clean(); ?>

<?php ob_start(); ?>
<?php require("footer/frontFooter.php") ?>
<?php $footer =  ob_get_clean();  ?>

<?php require("template/template.php"); ?>
		
		
	
