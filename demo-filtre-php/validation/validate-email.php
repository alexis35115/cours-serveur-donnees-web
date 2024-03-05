<?php 

/*
FILTER_VALIDATE_EMAIL
Valide une adresse de courriel.

En général, ceci valide l'adresse de courriel selon la syntaxe définie par le RFC 822, à l'exception des commentaires, du remplissage par des espaces et les noms de domaine sans point qui ne sont pas pris en charge.

https://www.php.net/manual/fr/filter.filters.validate.php
*/

$valeurs = ["pewpew@pewpew.com", "\Dfdsfs"];

// Vérifier les valeurs une par une
foreach ($valeurs as $valeur) {

    echo("Valeur : `" . $valeur . "` -> ");

    // On utilise var_dump pour avoir les informations de la variable
    var_dump(filter_var($valeur, FILTER_VALIDATE_EMAIL));
    echo("</br>");
}
?>