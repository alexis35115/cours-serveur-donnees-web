<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styles/style.css">
    <title>Modifier un film</title>
</head>
<body>
	<?php
	include "en-tete.php";
    ?>

    <section>
		<h2>Modifier le film</h2>
		<form action="modifier-film-traitement.php" method="post">
			<div>
				<label for="titre">Titre</label>
				<input type="text" name="titre" id="titre"/>			
			</div>
			<div>
				<label for="resume">Résumé</label>
				<textarea name="resume" id="resume"></textarea>			
			</div>
			<div>
				<label for="description">Description</label>
				<textarea name="description" id="description"></textarea>	
			</div>
			<div>
				<label for="realisateur">Réalisateur</label>
				<input type="text" name="realisateur" id="realisateur"/>
			</div>			
			<div>
				<label for="image">Nom du fichier de l'image</label>
				<input type="text" name="image" id="image"/>		
			</div>					
			<input type="submit" value="Modifier le film">
            <input type="hidden" name="id_film" value="<?=$_GET['id_film']?>"/>
		</form>
	</section>

    <?php
	include "pied-page.php";
	?>
</body>
</html>