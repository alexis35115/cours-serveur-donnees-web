<?php 

    // On reçoit les données à partir de la super variable globale $_GET

    /*
        On valide les éléments suivants :
        - Est-ce que la super variable globale $_GET contient la valeur du paramètre (id), voir la documentation https://www.php.net/manual/fr/function.filter-input.php
        - Est-ce que le paramètre (id) est un nombre entier valide (+1), voir la documentation https://www.php.net/manual/fr/filter.filters.validate.php
        - On pourrait également les valeurs "limites"
    */

    if (filter_input(INPUT_GET, 'id')) {
        echo("Dans le cas où \$_GET['id'] existe. </br>");

        if (filter_var($_GET['id'], FILTER_VALIDATE_INT)) {
            echo("Dans le cas où \$_GET['id'] contient un nombre entier valide.");

            // Récupérer les données d'une entité dans la base de données selon l'identifiant unique

        } else {
            echo("Dans le cas où \$_GET['id'] NE contient PAS un nombre entier valide.");
        }
    } else {
        echo("Dans le cas où \$_GET['id'] N'existe PAS.");
    }

    /*
        À tester avec les valeurs suivantes :
        - SANS paramètres
        - ?id=0
        - ?id=01
        - ?id=1
        - ?id=1111111111111111111111111111111111111111111111111111111111
    */

    // Qu'arrive-t-il avec la valeur 0 (zéro), voir la documentation https://www.w3schools.com/PHP/filter_validate_int.asp

?>