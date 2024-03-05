<?php 
session_start();

//print_r($_POST);
// 1ere étape de sécurisation = PHP FILTER
$filtreMembre = array();
$filtreMembre['pseudonyme'] = FILTER_SANITIZE_STRING;
$filtreMembre['motdepasse'] = FILTER_SANITIZE_STRING;
$membre = filter_var_array($_POST, $filtreMembre);
//print_r($membreCandidat);
//echo "<p></p>";



include "../connexion.php";

$TROUVER_MEMBRE = "SELECT * FROM membre WHERE pseudonyme = :pseudonyme";
$requeteTrouverMembre = $basededonnees->prepare($TROUVER_MEMBRE);
$requeteTrouverMembre->bindParam(":pseudonyme", $membre['pseudonyme'], PDO::PARAM_STR);
$requeteTrouverMembre->execute();
$membreTrouve = $requeteTrouverMembre->fetch();
//print_r($membre);


// Verifier si le mot de passe du formulaire ($motdepasse) est le meme que celui dans la base de donnees ($membre['motdepasse'])
if(password_verify($membre["motdepasse"], $membreTrouve['motdepasse']))
{
	
	$_SESSION['membre'] = array();
	$_SESSION['membre']['pseudonyme'] = $membreTrouve['pseudonyme'];
	$_SESSION['membre']['prenom'] = $membreTrouve['prenom'];
	$_SESSION['membre']['nom'] = $membreTrouve['nom'];
	$_SESSION['membre']['courriel'] = $membreTrouve['courriel'];
	$_SESSION['membre']['organisation'] = $membreTrouve['organisation'];

	header('Location: ../membre.php');
	//print_r($_SESSION);
}
else
{
	echo "Ce n'est pas le bon mot de passe";	
}

?>