

<?php $title = "ajouterunchapitre" ?>

<?php ob_start(); ?>
<?php require("header/backHeader.php") ?>
<?php $header =  ob_get_clean();  ?>

<?php ob_start(); ?>
<div style="margin-top: 200px;">
	<?php echo "Bonjour " . $_SESSION["firstname"] . " !"; ?>
</div>

<script src="js/menu_responsive.js"></script>

<?php $body = ob_get_clean(); ?>


<?php ob_start(); ?>
<?php require("footer/backFooter.php") ?>
<?php $footer =  ob_get_clean();  ?>


<?php require("template/template.php"); ?>

