<?php
/*
    N'oubliez pas qu'il faut appeler cette fonction si un veut interagir 
    avec la super variable globale `$_SESSION`.
*/
session_start();

// Détruire la session courante.
session_destroy();

// Redirigez l'utilisateur vers la page d'accueil du site.
header('location: ../index.php');

exit;
?>