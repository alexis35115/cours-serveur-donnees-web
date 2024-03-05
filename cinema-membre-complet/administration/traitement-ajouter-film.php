<?php

//print_r($_POST);

$titre = addslashes(filter_var($_POST['titre'],FILTER_SANITIZE_STRING));
$resume = filter_var($_POST['resume'],FILTER_SANITIZE_STRING);
$description = filter_var($_POST['description'],FILTER_SANITIZE_STRING);
$realisateur = filter_var($_POST['realisateur'],FILTER_SANITIZE_STRING);
$producteur = filter_var($_POST['producteur'],FILTER_SANITIZE_STRING);

//echo "<div>" . $titre . "</div>";

// INSERT into film(titre, resume, description, realisateur, producteur) VALUES('test','','','','')
//$SQL_AJOUTER_FILM = "INSERT into film(titre, resume, description, realisateur, producteur) VALUES('".$titre."','" . $resume . "','" . $description . "','" . $realisateur . "','" . $producteur . "')";
//echo $SQL_AJOUTER_FILM;
$SQL_AJOUTER_FILM = "INSERT into film(titre, resume, description, realisateur, producteur) VALUES(:titre,:resume,:description,:realisateur,:producteur)";

include "connexion.php"; 
$requeteAjouterFilm = $basededonnees->prepare($SQL_AJOUTER_FILM);
$requeteAjouterFilm->bindParam(':titre', $titre, PDO::PARAM_STR);
$requeteAjouterFilm->bindParam(':resume', $resume, PDO::PARAM_STR);
$requeteAjouterFilm->bindParam(':description', $description, PDO::PARAM_STR);
$requeteAjouterFilm->bindParam(':realisateur', $realisateur, PDO::PARAM_STR);
$requeteAjouterFilm->bindParam(':producteur', $producteur, PDO::PARAM_STR);
$reussiteAjout = $requeteAjouterFilm->execute();
?>


<?php
if($reussiteAjout) 
{
?>
	Votre film a été ajouté à la base de données
<?php	
}
?>