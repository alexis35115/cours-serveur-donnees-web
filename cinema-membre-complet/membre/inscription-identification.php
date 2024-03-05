<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Cinéma du monde</title>
</head>
<body>
	<header>
		
		
		
		<nav>
		
		<div id="menu">
			<a href="index.php">Accueil</a> | 
			<a href="liste-films.php">Films</a> | 		
			<a href="nouvelles/">Nouvelles</a> | 
			<a href="recherche-avancee.php">Recherche</a> | 		
			<a href="membre.php">Membre</a> | 
			<a href="membre/inscription-identification.php">Inscription</a>
		</div>
		
		</nav>
		

		</header>
	
	<section id="contenu">
		<header><h2>Inscription d'un membre - Identification</h2></header>
	
		<form method="post" action="inscription-informations.php">
		
		
		<fieldset>
		
			<legend>Identité</legend>
		
			<div id="entree-prenom">
				<label for="prenom">Prénom</label>
				<input type="text" id="prenom" name="prenom"/>
			</div>
			
			<div id="entree-nom">
				<label for="nom">Nom</label>
				<input type="text" id="nom" name="nom"/>
			</div>

			<div id="entree-organisation">
				<label for="organisation">Organisation</label>
				<input type="text" id="organisation"  name="organisation">
			</div>
			
			<div id="entree-courriel">
				<label for="courriel">Courriel</label>
				<input type="email" id="courriel" name="courriel"/>
			</div>	
			
			
		</fieldset>
			
		<input type="submit" name="inscription-identification" value="Suivant">			
			
		</form>
	
	</section>
	
	<footer><span id="signature"></span></footer>
</body>
</html>