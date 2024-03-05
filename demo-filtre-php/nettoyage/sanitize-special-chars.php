<?php 

/*
FILTER_SANITIZE_SPECIAL_CHARS "special_chars"
Transforme en entité HTML les caractères '"<>& et les caractères ASCII de valeure inférieur à 32, et supprime ou encode les autres caractères spéciaux.

https://www.php.net/manual/fr/filter.filters.sanitize.php
*/

$valeurs = ["<p>PewPew</p>", "<script>console.log(\"hacké\");</script>"];

// Vérifier les valeurs une par une
foreach ($valeurs as $valeur) {

    echo("Valeur : `" . $valeur . "` -> ");

    // On utilise var_dump pour avoir les informations de la variable
    var_dump(filter_var($valeur, FILTER_SANITIZE_SPECIAL_CHARS));
    echo("</br>");
}

// Ne pas oublier d'inspecter la source pour voir la vraie différence
?>