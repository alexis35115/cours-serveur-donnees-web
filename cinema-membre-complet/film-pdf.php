<?php
function convertir($texte)
{
	return iconv('UTF-8', 'windows-1252', $texte);	
}

$idFilm = filter_var($_GET['film'], FILTER_SANITIZE_NUMBER_INT);
$MESSAGE_SQL_FILM = "SELECT * FROM film WHERE id = :id";
//echo $MESSAGE_SQL_FILM . "\n\n";
include "connexion.php"; 
$requeteFilm = $basededonnees->prepare($MESSAGE_SQL_FILM);
$requeteFilm->bindParam(':id', $idFilm, PDO::PARAM_INT);
$requeteFilm->execute();
$film = $requeteFilm->fetch();
//print_r($film);
// titre resume description producteur realisateur
//echo $film['resume'];
?><?php 
error_reporting(0);
	include "lib/format/fpdf/fpdf.php";
	$doc = new FPDF();
	//print_r($doc);
	$doc->AddPage();
	
	

	$doc->SetFont('Arial', 'B', 60);
	$doc->Write(5,convertir($film['titre']));
	
	
	
	
	
	$doc->SetFont('Arial', 'B', 16);
	$doc->SetY(25);
	$doc->Write(5,convertir($film['resume']));
	$doc->Output();
	

?>