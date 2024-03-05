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
		<nav>
		
		<div id="menu">
			<a href="index.php">Accueil</a> | 
			<a href="liste-films.php">Films</a> | 		
			<a href="nouvelles/">Nouvelles</a> | 
			<a href="recherche-avancee.php">Recherche</a> | 		
		</div>
		
		</nav>
	</header>
	
	<section id="contenu">
		<header><h2>Recherche avancée</h2></header>
		
			<div id="recherche-avancee">
			
			<form method="get" action="resultat-recherche-avancee.php">
			
				<div>
					<label for="recherche-titre">Titre</label>
					<input type="text" name="recherche-titre" id="recherche-titre"/>				
				</div>
				<div>
					<label for="recherche-contenu">Contenu</label>
					<input type="text" name="recherche-contenu" id="recherche-contenu"/>				
				</div>				
				<div>
					<label for="recherche-realisateur">Réalisateur</label>
					<input type="text" name="recherche-realisateur" id="recherche-realisateur"/>				
				</div>				
				<input type="submit" value="Recherche"/>
			</form>		
		
		</div>
	
	</section>
	
	<footer><span id="signature"></span></footer>
</body>
</html>