<?php session_start(); ?>

<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Cinéma du monde</title>
	<style>
	#recherche-rapide > h3 > span {display:none;}
	</style>
</head>
<body>
	<header>
		
		<h1>Cinéma du monde</h1>
		
		<div id="bienvenue-membre"><?php
		if(!empty($_SESSION['membre']))
		{
			?> Bonjour <?php echo $_SESSION['membre']['prenom'];
		}		
		?></div>
		
		<nav>
		
		<div id="menu">
			<a href="index.php">Accueil</a> | 
			<a href="liste-films.php">Films</a> | 		
			<a href="nouvelles/">Nouvelles</a> | 
			<a href="recherche-avancee.php">Recherche</a> | 		
			<a href="membre.php">Membre</a>
		</div>
		
		</nav>
		

		</header>
	
	<section id="contenu">
		<header><h2>Accueil</h2></header>
		
		<div id="barre-laterale">
		
			<div id="recherche-rapide">
			
				<h3><span>Recherche</span></h3>
				<form method="get" action="resultat-recherche-rapide.php">
					<input type="text" name="mot" placeholder="Recherche"/>
					<input type="submit" value="OK"/>
				</form>
				
			</div>
		
		
		</div>
	
	</section>
	
	<footer><span id="signature"></span></footer>
</body>
</html>