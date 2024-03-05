<?php 

/*
FILTER_SANITIZE_NUMBER_INT "number_int"
Supprime tous les caractères sauf les chiffres, et les signes plus et moins.

https://www.php.net/manual/fr/filter.filters.sanitize.php
*/
$valeurs = ["+0.32131", "hkjkl321", 1];

// Vérifier les valeurs une par une
foreach ($valeurs as $valeur) {

    echo("Valeur : `" . $valeur . "` -> ");

    // On utilise var_dump pour avoir les informations de la variable
    var_dump(filter_var($valeur, FILTER_SANITIZE_NUMBER_INT));
    echo("</br>");
}
?>