<?php 
session_start();
?>
<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Cinéma du monde</title>
</head>
<body>
<nav>
		
		<div id="menu">
			<a href="index.php">Accueil</a> | 
			<a href="liste-films.php">Films</a> | 		
			<a href="nouvelles/">Nouvelles</a> | 
			<a href="recherche-avancee.php">Recherche</a> | 		
			<a href="membre.php">Membre</a> | 
			
		</div>
		
		</nav>
	<header>
		
		<h1>Cinéma du monde</h1>
		
		<div id="bienvenue-membre"><?php
		if(!empty($_SESSION['membre']['pseudonyme']))
		{
			?> Bonjour <?php echo $_SESSION['membre'] ['prenom'];
			echo '<div>
                <a href="membre/modifier-compte.php">Modifier mon compte</a>
            </div>';
        echo '<div>
                <a href="membre/deconnexion.php">Se déconnecter</a>
            </div>';	
		}
	
		?>
		
		
		

		</header>
	
	<section id="contenu">
		<header><h2>Membre</h2></header>
<?php 

if(empty($_SESSION['membre']['pseudonyme']))
{
	include_once "membre/formulaire-membre-authentification.php";
	echo '<div>
					<a href="membre/inscription-identification.php">Créer un compte</a>
				</div>';
}
else
{
	include_once "membre/vue-membre-detail.php";
	
}
?>
	</section>
	
	<footer><span id="signature"></span></footer>
</body>
</html>