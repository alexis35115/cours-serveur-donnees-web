<?php

//print_r($_POST);

$FILTRES_FILM = array(
	'id' => FILTER_SANITIZE_NUMBER_INT,
	'titre' => FILTER_SANITIZE_STRING,
	'resume' => FILTER_SANITIZE_STRING,
	'description' => FILTER_SANITIZE_STRING,
	'realisateur' => FILTER_SANITIZE_STRING,
	'producteur' => FILTER_SANITIZE_STRING
);

$film = filter_input_array(INPUT_POST, $FILTRES_FILM);
$film['titre'] = addslashes($film['titre']);
//echo "<div>" . $titre . "</div>";

$SQL_MODIFIER_FILM = "UPDATE film SET titre = :titre, resume=:resume, description=:description, realisateur=:realisateur, producteur=:producteur WHERE id = :id";
//echo $SQL_MODIFIER_FILM;

include "connexion.php"; 
$requeteModifierFilm = $basededonnees->prepare($SQL_MODIFIER_FILM);
$requeteModifierFilm->bindParam(':id', $film['id'], PDO::PARAM_INT);
$requeteModifierFilm->bindParam(':titre', $film['titre'], PDO::PARAM_STR);
$requeteModifierFilm->bindParam(':resume', $film['resume'], PDO::PARAM_STR);
$requeteModifierFilm->bindParam(':description', $film['description'], PDO::PARAM_STR);
$requeteModifierFilm->bindParam(':realisateur', $film['realisateur'], PDO::PARAM_STR);
$requeteModifierFilm->bindParam(':producteur', $film['producteur'], PDO::PARAM_STR);
$reussiteModification = $requeteModifierFilm->execute();
?>


<?php
if($reussiteModification) 
{
?>
	Votre film a été modifié dans la base de données
<?php	
}
?>