<?php $title = "Billets" ?>
<?php ob_start(); ?>
<section class="container-fluid">
<div class="row d-flex justify-content-center flex-wrap align-items-center">
<?php 
while ($chapitre = $bddQuery->fetch()) {
?>
    <div class="rounded position-relative d-flex align-items-end m-4" style="height: 250px; width: 350px;">
	    <img class="rounded" style="height: 100%; width: 100%;" src="<?php echo $chapitre["url"]; ?>" >
	    <div class="position-absolute rounded-bottom d-flex flex-column justify-content-start align-items-center mt-4" style="height: 100%; width: 100%;">
	    	<h3 class="text-center text-white"><?php echo $chapitre["titre"]; ?></h3>
	    </div>
	    <div class="position-absolute bg-white border border-dark border-top-0 rounded-bottom d-flex align-items-center" style="height: 100px; width: 100%;">
	    	<div class="row m-0">
	    		<p class="text-left text-dark m-0 col-lg-12" style="font-size: 16px;"><?php echo $chapitre["excerpt"]; ?><a href="index.php?actionPost=<?php echo $chapitre["ID"]; ?>" class="text-dark font-weight-bold"> Lire la suite</a><span class="" id="date"><?php echo $chapitre["date"]; ?></span>
	    		</p>
	    	</div>
	    </div>
	</div>
<?php  
}
?>
</div>	
</section>
<script src="js/menu_responsive.js"></script>
<?php $body = ob_get_clean(); ?>
<?php require("template/template.php"); ?>
		
		
	
