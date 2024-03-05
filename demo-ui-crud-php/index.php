<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styles/style.css">
    <title>Cinéma</title>
</head>
<body>
	<?php
	include "en-tete.php";

	include "connexion.php"; 

	$sth = $dbh->prepare("SELECT `id_film`, `titre`, `realisateur`, `resume` from `film`;");
	$sth->execute();
	$films = $sth->fetchAll();

	foreach($films as $film)
	{
	?>
		<div class="liste-film espacement">
			<h4>
			<a href="film-detail.php?id_film=<?=$film['id_film']?>" title=""><?=$film['titre']?></a>
			</h4>
			<span><?=$film['realisateur']?></span>
			<p><?=$film['resume']?></p>
		</div>		
	<?php 		
	}

	include "pied-page.php";
	?>
</body>
</html>