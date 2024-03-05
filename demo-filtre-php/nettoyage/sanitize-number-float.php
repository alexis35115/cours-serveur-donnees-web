<?php 

/*
FILTER_SANITIZE_NUMBER_FLOAT "number_float"
Supprime tous les caractères, sauf les chiffres, +- et éventuellement .,eE.

https://www.php.net/manual/fr/filter.filters.sanitize.php
*/

$valeurs = ["+aaaa0.32131", "0,321", 3.1];

// Vérifier les valeurs une par une
foreach ($valeurs as $valeur) {

    echo("Valeur : `" . $valeur . "` -> ");

    // On utilise var_dump pour avoir les informations de la variable
    var_dump(filter_var($valeur, FILTER_SANITIZE_NUMBER_FLOAT));
    echo("</br>");
}
?>