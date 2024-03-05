<?php 
session_start(); 
	// Traitement de identification.php
	// 1ere étape de sécurisation = PHP FILTER
    $filtreMembre = array(
		'prenom' => FILTER_SANITIZE_ENCODED,
		'nom' => FILTER_SANITIZE_ENCODED,
        'organisation' => FILTER_SANITIZE_STRING,
        'courriel' => FILTER_SANITIZE_EMAIL,
    );
	$_SESSION['membre'] = filter_input_array(INPUT_POST, $filtreMembre);


	
	print_r($_SESSION);



?>

<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Cinéma du monde</title>
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
			<a href="membre.php">Membre</a> | 
			
		</div>
		
		</nav>
		

		</header>
	
	<section id="contenu">
		<header><h2>Membre</h2></header>


	<section id="contenu">
		<header><h2>Inscription d'un membre - Informations</h2></header>
	
		<form method="post" action="traitement-inscription.php" >
		
		
		<fieldset>
		
			<legend>Informations</legend>

			<div id="entree-pseudonyme">
				<label for="pseudonyme">Pseudonyme</label>
				<input type="text" id="pseudonyme" name="pseudonyme"/>
			</div>

			
			<div id="entree-motdepasse">
				<label for="motdepasse">Mot de passe</label>
				<input type="password" id="motdepasse" name="motdepasse"/>
			</div>
			
		
			
						
		</fieldset>
		
		<input type="submit" name="inscription-identification" value="Enregistrer">			
			
		</form>
	
	</section>
	
	<footer><span id="signature"></span></footer>
</body>
</html>