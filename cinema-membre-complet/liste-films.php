<?php

include "connexion.php"; // copie-colle le code qui est dans connexion
// prepare l'objet $basededonnees pour qu'on puisse parler à la base de données

$MESSAGE_SQL_LISTE_FILM = "SELECT id, titre, resume, realisateur from film";
//echo $MESSAGE_SQL_LISTE_FILM;

$requeteListeFilms = $basededonnees->prepare($MESSAGE_SQL_LISTE_FILM);
$requeteListeFilms->execute();
$listeFilms = $requeteListeFilms->fetchAll();
//print_r($listeFilms);
?>

<?php 
	// exercice d'acces dans le tableau
	//echo "Le titre du second film est " . $listeFilms[1]['titre'];
	//echo "Le realisateur du troisieme film est " . $listeFilms[2]['realisateur'];
?>
<?php 	
	// la possibilite de boucle la plus utilisée
	foreach($listeFilms as $film)
	{
		//print_r($film);
		//echo $film['titre'];
		?>
		<div class="film" style="border:solid 1px black; margin:5px; padding:5px;">
			<div class="illustration"><img/></div>
			<h4 class="titre">
			<a href="film.php?film=<?php echo $film['id']; ?>" title="">
				<?php echo $film['titre']; ?>
			</a>
			</h4>
			<span class="realisateur"><?php echo $film['realisateur']; ?></span>
			<p class="resume"><?php echo $film['resume']; ?></p>
		</div>		
		<?php 		
	}
?>
