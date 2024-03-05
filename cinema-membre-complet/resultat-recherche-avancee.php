<?php 
	print_r($_GET);
	$titreRecherche = filter_var($_GET['recherche-titre'], FILTER_SANITIZE_STRING);
	$contenuRecherche = filter_var($_GET['recherche-contenu'], FILTER_SANITIZE_STRING);
	$realisateurRecherche = filter_var($_GET['recherche-realisateur'], FILTER_SANITIZE_STRING);
	
	if(!empty($titreRecherche) || !empty($contenuRecherche) || !empty($realisateurRecherche))
	{
		$SQL_RECHERCHE_AVANCEE = "SELECT * FROM film WHERE 1 = 1 ";
		
		if(!empty($titreRecherche)) // si l'utilisateur a rempli le champ titre
			$SQL_RECHERCHE_AVANCEE = $SQL_RECHERCHE_AVANCEE . " AND titre like '%$titreRecherche%'";
		if(!empty($contenuRecherche)) // si l'utilisateur a rempli le champ contenu
			$SQL_RECHERCHE_AVANCEE = $SQL_RECHERCHE_AVANCEE . " AND resume like '%$contenuRecherche%'";
		if(!empty($contenuRecherche))  // si l'utilisateur a rempli le champ contenu
			$SQL_RECHERCHE_AVANCEE = 
		$SQL_RECHERCHE_AVANCEE . " AND description like '%$contenuRecherche%'";
		if(!empty($realisateurRecherche))  // si l'utilisateur a rempli le champ realisateur
			$SQL_RECHERCHE_AVANCEE = $SQL_RECHERCHE_AVANCEE . " AND realisateur like '%$$realisateurRecherche%'";
		
		echo $SQL_RECHERCHE_AVANCEE;
			
		include "connexion.php";
		
		$requeteRecherche = $basededonnees->prepare($SQL_RECHERCHE_AVANCEE);
		$requeteRecherche->execute();
		$resultats = $requeteRecherche->fetchAll();
		//print_r($resultats);
	}
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