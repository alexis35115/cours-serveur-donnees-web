<?php 

/*
FILTER_SANITIZE_EMAIL "email"
Supprime tous les caractères sauf les lettres, chiffres, et !#$%&'*+-=?^_`{|}~@.[].

https://www.php.net/manual/fr/filter.filters.sanitize.php
*/

$valeurs = ["pewpew@pewpew.com", "\Dfdsfs"];

// Vérifier les valeurs une par une
foreach ($valeurs as $valeur) {

    echo("Valeur : `" . $valeur . "` -> ");

    // On utilise var_dump pour avoir les informations de la variable
    var_dump(filter_var($valeur, FILTER_SANITIZE_EMAIL));
    echo("</br>");
}
?>