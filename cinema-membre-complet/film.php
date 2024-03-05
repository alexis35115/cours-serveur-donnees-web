<?php
//print_r($_GET);
$idFilm = filter_var($_GET['film'], FILTER_SANITIZE_NUMBER_INT);
//echo $idFilm . "<br>";
//exit(0);

$MESSAGE_SQL_FILM = "SELECT * FROM film WHERE id = :id";
//echo $MESSAGE_SQL_FILM . "<br>";

include "connexion.php"; // copie-colle le code qui est dans connexion
$requeteFilm = $basededonnees->prepare($MESSAGE_SQL_FILM);
$requeteFilm->bindParam(':id', $idFilm, PDO::PARAM_INT);
$requeteFilm->execute();
$film = $requeteFilm->fetch();
//print_r($film);

?>

<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title><?php echo $film['titre']; ?></title>
</head>
<body>
	<header>
		<h1>Film <?php echo $film['titre']; ?></h1>
		<nav></nav>
	</header>
	
	<section id="contenu">
			<div class="film" style="border:solid 1px black; margin:5px; padding:5px;">
			<div class="illustration"><img/></div>
			<h4 class="titre">
			<a href="film.php?toto=<?php echo $film['id']; ?>" title="">
				<?php echo $film['titre']; ?>
			</a>
			</h4>
			<span class="realisateur"><?php echo $film['realisateur']; ?></span>
			<p class="resume"><?php echo $film['resume']; ?></p>
				<p class="resume"><?php echo $film['description']; ?></p>
		</div>
	
	</section>
	
	<footer><span id="signature"></span></footer>
</body>
</html>