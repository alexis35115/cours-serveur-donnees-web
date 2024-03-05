<?php 

    // Ajout d'une trace pour afficher les erreurs
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    // Informations pour s'authentifier
    $usager = 'root';
    $motdepasse = 'admin123';
    $hote = 'localhost';
    $base = 'cinema';

    // Créer la connexion
    $dsn = 'mysql:dbname='.$base.';host=' . $hote;
    $dbh = new PDO($dsn, $usager, $motdepasse);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh->exec( 'SET CHARACTER SET UTF8' );

    // Rendre la connexion disponible aux autres scripts
    return $dbh;
?>