<?php $title = "Formulaire" ?>

<?php ob_start(); ?>
<?php require("header/frontHeader.php"); ?>	
<?php $header = ob_get_clean(); ?>

<?php ob_start(); ?>
<div class="container mt-5 pt-5" style="height: 600px;">
	<h2 class="text-center">Cryptage .htpasswd</h2>
	<form action="testView.php" method="post">
		<div class="form-row d-flex justify-content-center">
			<div class="form-group col-lg-4">
				<label for="firstname">Login</label>
				<input class="form-control" type="text" name="login" id="title">
			</div>
			<div class="form-group col-lg-4">
				<label for="lastname">Mot de passe</label>
				<input class="form-control" type="password" name="password" id="text">
			</div>
		</div>
		<div class="form-group col-lg-5">
			<button id="button" class="btn btn-outline-secondary" type="submit" name="envoyer">Envoyer</button>
		</div>
	</form>
</div>

				<?php 
				if ( isset($_POST["login"], $_POST["password"]) ) {
					//$bdd = new PDO("mysql:host=sofianewdmmila.mysql.db;dbname=sofianewdmmila;charset=utf8", "sofianewdmmila", "AttilAh44");
					//$bdd = new PDO("mysql:host=localhost;dbname=jean_forteroche;charset=utf8", "root","");
					//$bddInsert = $bdd->prepare("INSERT INTO romans(title, texte, img) VALUES (?,?,?)");
					//$bddInsert->execute( array($_POST["title"], $_POST["text"], $_POST["image"] ) );
					$login = $_POST["login"];
					$passwdCrypt = password_hash($_POST["password"], PASSWORD_DEFAULT);

					echo "login : " . $login . " password Crypt " . $passwdCrypt . "<br>";
				echo "<pre>";
				 print_r($_POST);
				echo "</pre>";
				} else {
					echo "pas envoyer";
				} ?>
			
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


