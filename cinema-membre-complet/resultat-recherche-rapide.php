<?php 
	//print_r($_GET);
	//echo $_GET['mot'];
	$mot = filter_var($_GET['mot'], FILTER_SANITIZE_STRING);
	//echo $mot;
		
	include "connexion.php";
	
	// "SELECT * FROM film WHERE titre LIKE '%futur%' OR resume LIKE '%futur%'"
	$SQL_RECHERCHE_RAPIDE = "SELECT * FROM film WHERE titre LIKE '%$mot%' OR resume LIKE '%$mot%'";
	//echo $SQL_RECHERCHE_RAPIDE;
	
	$requeteRechercheRapide = $basededonnees->prepare($SQL_RECHERCHE_RAPIDE);
	$requeteRechercheRapide->execute();
	$resultats = $requeteRechercheRapide->fetchAll();
	//print_r($resultats);
?>

<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Cinéma du monde</title>
	<style>

	</style>
</head>
<body>
	<header>
		<h1>Cinéma du monde</h1>
		<nav>
		
		
		</nav>
	</header>
	
	<section id="contenu">
		<header><h2>Résultats de recherche</h2></header>
		
		<div id="resultats-recherche">
		
		<?php 
		
			foreach($resultats as $resultat)
			{
				//print_r($resultat);
				$titre = $resultat['titre'];
				$resume = $resultat['resume'];
				$id = $resultat['id'];
				//echo $titre;
				
				?>
				<div class="resultat-recherche">
					<h4 class="titre">
						<a href="film.php?film=<?=$id?>">
							<?php echo $titre;?>
						</a>
					</h4>
					<div class="resume">
						<?=$resume?>
					</div>
				</div>
				<?php 
				
			}
		
		?>
		
		</div>
	
	</section>
	
	<footer><span id="signature"></span></footer>
</body>
</html>