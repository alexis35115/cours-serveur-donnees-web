<?php 

/*
FILTER_VALIDATE_BOOLEAN
Retourne true pour "1", "true", "on" et "yes". Retourne false sinon.

https://www.php.net/manual/fr/filter.filters.validate.php
*/

$valeurs = ["1", "true", true, "on", "yes", "patate", false, "0"];

// Vérifier les valeurs une par une
foreach ($valeurs as $valeur) {

    echo("Valeur : `" . $valeur . "` -> ");

    // On utilise var_dump pour avoir les informations de la variable
    var_dump(filter_var($valeur, FILTER_VALIDATE_BOOLEAN));
    echo("</br>");
}
?>