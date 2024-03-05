<?php 

/*
FILTER_VALIDATE_FLOAT "float" - default, decimal, min_range, max_range	valide un nombre décimal, optionnellement dans l'intervalle fourni, et le converti en nombre décimal en cas de succès.

https://www.php.net/manual/fr/filter.filters.validate.php
*/

$valeurs = [0.32131, "0,321", 1, 0, "abc", 123.123 ];

// Vérifier les valeurs une par une
foreach ($valeurs as $valeur) {

    echo("Valeur : `" . $valeur . "` -> ");

    // On utilise var_dump pour avoir les informations de la variable
    var_dump(filter_var($valeur, FILTER_VALIDATE_FLOAT));
    echo("</br>");
}
?>