<nav class="navbar navbar-expand-lg bg-white justify-content-between align-items-center border-bottom border-grey">
	<div class="d-flex justify-content-start align-items-center ">
		<a class="nav-link rounded" href="index.php?adminAction=ajouterunchapitre"><img style="width: 40px; height: 40px;" src="images/author2.jpg">
		</a>
		
	</div>
	<ul class="nav navbar-nav d-lg-flex d-none d-lg-block justify-content-between align-items-center">
		<li class="nav-item mr-1 ml-1">
			<a class="nav-link text-dark" href="index.php?adminAction=meschapitres">Mes chapitres</a>
		</li>
		<li class="nav-item mr-1 ml-1">
			<a class="nav-link text-dark" href="index.php?adminAction=commentaires&btn=true">Commentaires</a>
		</li>
		<li class="nav-item mr-1 ml-1">
			<a class="nav-link text-dark" href="index.php?adminAction=message">Message</a>
		</li>
		<li>
			<div class="d-flex justify-content-start align-items-center ">
				<a class="nav-link text-dark" href="index.php?adminAction=deconnexion">
					<i id="sign_out" class="fas fa-sign-out-alt"></i>
				</a>
			</div>
		</li>
	</ul>
	<div class="d-block d-lg-none">
		<a href="#">
			<i id="toggler" class="fas fa-bars text-dark"></i>
		</a>
	</div>	
</nav>
<div id="overlay" class="position-fixed d-flex flex-column bg-white"></div>

