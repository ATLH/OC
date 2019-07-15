<?php $title = "jeanforteroche"; ?>
<?php ob_start(); ?>
<?php require("header/frontHeader.php") ?>
<?php $header =  ob_get_clean();  ?>
<?php ob_start(); ?>
<section id="section1" class="container-fluid p-0">
	<div class="row m-0 position-relative">
		<div id="blackBackground" class="col-lg-12 p-0"> 
			<img id="bg1_background" src="images/bg.jpg" class="w-100">
		</div>
		<div id="section1_content" class="col-lg-12 p-0 d-flex justify-content-center align-items-center flex-wrap position-absolute">
			<div class="col-lg-5">
				<h1 class="m-0"><cite class="text-white">Billet simple pour l'Alaska</cite></h1>
				<p id="headline" class="text-white">Lorsque le Commandant Pauline Rougier, de la Brigade Antiterroriste, au bord du burn-out, suite à la mort de son mari, découvre un lien entre l’attentat qui vient de tuer 40 personnes à Paris…</p>
				<button id="desktop_button" type="button" class="btn btn-outline-light m-2 col-lg-4 d-block">En savoir plus</button>
			</div>
			<div class="col-lg-4 d-flex justify-content-center align-items-center">
				<img class="h-50" src="images/brave.jpg" >
			</div>
			<div id="smartphone_Button" class="col-xs-12 text-center">
				<a href="index.php?action=billets" role="button" class="btn btn-outline-light m-2 col-xs-12 d-block" >En savoir plus</a>
			</div>
		</div>
	</div>
</section>
<section id="section2" class="container-fluid p-0">
	<div class="row m-0 p-0 d-flex justify-content-center align-items-center flex-wrap">
		<div class="col-lg-4 m-5">
			<img class="img-fluid" src="images/author.jpg">
		</div>
		<div id="info" class="col-lg-4 d-flex flex-column" >
			<span id="aPropos" class="d-block m-2">A propos de l'auteur</span>
			<h2 class="text-danger m-2">Jean Forteroche</h2>
			<div id="divMore" class="m-2">
			    <p>Un livre c’est la rencontre entre une histoire et des mots, qui en sculptent le contour et dessinent ses reliefs. L’écrivain construit, assemble et patine pour donner à l’ensemble cette tonalité unique...<span> Je suis un artisan du mot, qui façonne à coup de points, de virgules et de phrases, des histoires pour en faire des livres. L’histoire à sa vie propre, l’écrivain en rapporte le sens, témoin autant qu’acteur.</span></p>
			</div>
			<button id="lll" type="button" class="btn btn-outline-dark m-2 mt-4">Lire la suite</button>
		</div>
	</div>
</section>
<section id="section3" class="container-fluid p-0 d-flex justify-content-center align-items-center flex-column mt-0">
	<h2 class="text-center">Mes romans</h2>
	<div class="col d-flex justify-content-center align-items-center">
		<div class="col d-flex justify-content-center align-items-center">
			<div id="bookRow" class="col-lg-9 col-md-10 d-flex justify-content-center align-items-center">
				<div id="bookContainer" class="col-lg-7 overflow-hidden justify-content-center align-items-center p-0">
					<div id="bookSlider" class="d-flex justify-content-center align-items-center p-0">
						<div id="firstBook" class="col">
							<img class="sliderImg" src="images/livre1.png">
						</div>
						<div class="col">
							<img class="sliderImg" src="images/livre2.png">
						</div>
						<div class="col">
							<img class="sliderImg" src="images/livre3.jpg">
						</div>
						<div class="col">
							<img class="sliderImg" src="images/livre4.jpg">
						</div>
						<div id="lastBook" class="col">
							<img class="sliderImg" src="images/livre5.jpg">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-7 d-flex justify-content-center align-items-center justify-content-between position-absolute">
			<a id="btnLeftBook" class="d-flex justify-content-center d-block p-0">
				<i class="fas fa-angle-left text-dark"></i>
			</a>
			<a id="btnRightBook" class="d-flex justify-content-center d-block p-0">
				<i class="fas fa-angle-right text-dark"></i>
			</a>
		</div>
	</div>
</section>
<section id="quoteSection" class="container-fluid p-0 d-flex justify-content-center align-items-center flex-column">
	<div id="imgSection3Container" class="row m-0 d-flex justify-content-center align-items-center flex-column">
		<div id="imgContent" class="col-lg-12 p-0"> <!-- Changer background-color en bg-color -->
			<img id="imgSection3" class="img-fluid w-100" src="images/bg2.jpg">
		</div>
		<div id="quoteContainer" class="col-lg-7 d-flex justify-content-center align-items-center flex-column position-absolute">
			<h2 class="text-center text-white m-3">Témoignages des lecteurs</h2>
			<div class="m-3 col-lg-12 overflow-hidden justify-content-center align-items-center">
				<div id="slider" class="d-flex justify-content-center align-items-center">
					<blockquote id="firstQuote" class="text-center text-white col w-100">
					“ Excellent suspense qui s’inscrit dans une réalité sociale et une actualité politique qui nous font y croire jusqu’au bout. L’écriture fluide, l’histoire rythmée et documentée font qu’on ne lâche le livre qu’à la dernière page… ”
					</blockquote>
					<blockquote class="text-center text-white col w-100">
					“ Un grand premier livre qui se lit d’une traite, c’est prenant et passionnant on y apprend pleins de choses c’est très bien fait et magnifiquement documenté on attend la suite avec impatience. ”
					</blockquote>
					<blockquote class="text-center text-white col w-100">
					“ Avec ce premier livre, Sylvain Pavlowski nous emporte dans une histoire passionnante. Ce livre ne se lit pas, il se dévore ! Les scènes s’enchainent et déchainent votre curiosité. ”
					</blockquote>
					<blockquote class="text-center text-white col w-100">
					“ Excellent suspense qui s’inscrit dans une réalité sociale et une actualité politique qui nous font y croire jusqu’au bout. L’écriture fluide, l’histoire rythmée et documentée font qu’on ne lâche le livre qu’à la dernière page… ”
					</blockquote>
					<blockquote id="lastQuote" class="text-center text-white col w-100">
					“ Un grand premier livre qui se lit d’une traite, c’est prenant et passionnant on y apprend pleins de choses c’est très bien fait et magnifiquement documenté on attend la suite avec impatience. ”
					</blockquote>
				</div>
			</div>
			<div id="btnQuotes" class="col-lg-3 d-flex justify-content-center align-items-center justify-content-between">
				<a id="btnLeft" class="d-flex justify-content-center d-block p-0">
					<i class="fas fa-angle-left text-white"></i>
				</a>
				<a id="btnRight" class="d-flex justify-content-center d-block p-0">
					<i class="fas fa-angle-right text-white"></i>
				</a>
			</div>
		</div>
	</div>
</section>
<?php $body = ob_get_clean(); ?>
<?php ob_start(); ?>
<script src="js/menu_responsive.js"></script>
<script src="js/jeanforteroche.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<?php $script =  ob_get_clean();  ?>
<?php ob_start(); ?>
<?php require("footer/frontFooter.php") ?>
<?php $footer =  ob_get_clean();  ?>
<?php require("template/template.php"); ?>

