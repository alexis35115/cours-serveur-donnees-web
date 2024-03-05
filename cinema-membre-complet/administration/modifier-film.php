<?php

	//print_r($_GET);
	$noFilm = filter_input(INPUT_GET, 'film', FILTER_SANITIZE_NUMBER_INT);

	$SQL_FILM = "SELECT * FROM film WHERE id = :id";
	//echo $SQL_FILM;
	
	include "connexion.php";
	$requeteFilm = $basededonnees->prepare($SQL_FILM);
	$requeteFilm->bindParam(':id', $noFilm, PDO::PARAM_INT);
	$requeteFilm->execute();
	$film = $requeteFilm->fetch();
	//print_r($film);
?>

<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Panneau d'administration de Cinematruc</title>
	<style>
		* {margin:0;padding:0;} /* CSS reset pour uniformiser les navigateurs */
		* {font-family:Verdana;}
		body > header, body > section {padding:2em;}
		h2 {color:#034c7a; text-transform: uppercase;}
		h1 {background-color:#034c7a;color:white;padding:1em;text-transform: uppercase;}
		#contenu {padding:2em;}
		form {border:solid #034c7a 2px; background-color:lightblue; padding:1em;}
		form > div {margin-top:1em;}
		form > div > label {display:block; font-weight:bold; color:#476e87;}
		form input, form textarea, form select {width: 39em;}
		form input[type=submit] {margin-top:2em;}
		form textarea {height:5em;}
	</style>
</head>
<body>
	<header>
		<h1>Panneau d'administration de Cinematruc</h1>
		<nav></nav>
	</header>
	
	<section id="contenu">
		<header><h2>Modifier un film</h2></header>
		
		<form action="traitement-modifier-film.php" method="post">
		
			<div class="champs">
				<label for="titre">Titre</label>
				<input type="text" name="titre" id="titre" value="<?php echo $film['titre']?>"/>			
			</div>
		
			<div class="champs">
				<label for="resume">Resume</label>
				<textarea name="resume" id="resume"><?php echo $film['resume']?></textarea>			
			</div>
						
			<div class="champs">
				<label for="description">Description</label>
				<textarea name="description" id="description"><?=$film['description']?></textarea>			
			</div>
			
			<div class="champs">
				<label for="titre">Realisateur</label>
				<input type="text" name="realisateur" id="realisateur" value="<?=$film['realisateur']?>"/>			
			</div>			
			
			<div class="champs">
				<label for="titre">Producteur</label>
				<input type="text" name="producteur" id="producteur" value="<?=$film['producteur']?>"/>			
			</div>					
			
			<input type="submit" value="Enregistrer">
			<input type="hidden" name="id" value="<?=$film['id']?>"/>
		</form>
	
	</section>
	
	<footer><span id="signature"></span></footer>
</body>
</html>