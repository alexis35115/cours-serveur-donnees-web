<?php 

/*
FILTER_SANITIZE_STRING "string"
Supprime les balises, et supprime ou encode les caractères spéciaux.

https://www.php.net/manual/fr/filter.filters.sanitize.php
*/

$valeurs = ["<p>PewPew</p>", "<script>console.log(\"hacké\");</script>", "alexis"];

// Vérifier les valeurs une par une
foreach ($valeurs as $valeur) {

    echo("Valeur : `" . $valeur . "` -> ");

    // On utilise var_dump pour avoir les informations de la variable
    var_dump(filter_var($valeur, FILTER_SANITIZE_STRING));
    echo("</br>");
}
?>