<?php 

session_start();
$pseudonymeSession = $_SESSION['membre']['pseudonyme'];
//echo $pseudonymeSession;

include "connexion.php";

$SQL_LIRE_MEMBRE = "SELECT * FROM membre WHERE pseudonyme = '$pseudonymeSession'";
//echo $SQL_LIRE_MEMBRE;

$requeteMembre = $basededonnees->prepare($SQL_LIRE_MEMBRE);
$requeteMembre->execute();
$membre = $requeteMembre->fetch();
//print_r($membre);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
</head>
<body>
<div id="boite-membre">

<div id="membre-pseudonyme">
	<label>Pseudonyme</label>
	<span><?=$membre['pseudonyme']?></span>	
</div>

<div id="membre-courriel">
	<label>Courriel</label>
	<span><?=$membre['courriel']?></span>	
</div>

<div id="membre-prenom">
	<label>Prénom</label>
	<span><?=$membre['prenom']?></span>	
</div>

<div id="membre-nom">
	<label>Nom</label>
	<span><?=$membre['nom']?></span>	
</div>

<div id="membre-organisation">
	<label>Organisation</label>
	<span><?=$membre['organisation']?></span>	
</div>


</body>
</html>
