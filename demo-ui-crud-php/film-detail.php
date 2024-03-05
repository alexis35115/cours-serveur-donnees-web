<?php

$idFilm = $_GET['id_film'];

include "connexion.php";

$sth = $dbh->prepare("SELECT `id_film`, `titre`, `realisateur`, `resume`, `description`, `image` FROM `film` WHERE `id_film` = :id");
$sth->bindParam(':id', $idFilm, PDO::PARAM_INT);
$sth->execute();
$film = $sth->fetch();
?>

<!doctype html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styles/style.css">
	<title><?php echo $film['titre']; ?></title>
	<!-- La version longue "echo $film['titre'];" et version courte "=$film['titre']"-->
</head>
<body>
	<?php
	include "en-tete.php";
	?>
	<div class="espacement">
		<a href="supprimer-film-traitement.php?id_film=<?=$film['id_film']?>" title="">Supprimer ce film</a> |
		<a href="modifier-film.php?id_film=<?=$film['id_film']?>" title="">Modifier ce film</a> |
	</div>
	<section id="contenu">
		<div class="espacement">
			<h4><?=$film['titre']?></h4>
			<span><?=$film['realisateur']?></span>
			<p><?=$film['resume']?></p>
			</br>
			<p><?=$film['description']?></p>
			<img src="images/<?=$film['image']?>" class="centrer">
		</div>
	</section>
	<?php
	include "pied-page.php";
	?>
</body>
</html>