<?php $title = "Romans" ?>

<?php ob_start(); ?>
<?php require("header/frontHeader.php") ?>
<?php $header =  ob_get_clean();  ?>

<?php ob_start(); ?>
<script src="js/menu_responsive.js"></script>

<?php $body = ob_get_clean(); ?>

<?php ob_start(); ?>
<?php require("footer/frontFooter.php") ?>
<?php $footer =  ob_get_clean();  ?>

<?php require("template/template.php"); ?>
