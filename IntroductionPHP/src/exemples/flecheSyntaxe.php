<?php

    //Description : La syntaxe "->" sert à accéder une valeur ou une action d'un objet.

    // Exemples :
    class BaseDeDonnees
    {
        public function creerConnexion() {
            // Implémentation à faire...
        }
    }

    // le mot "new" sert à créer une instance de notre classe
    $baseDeDonnees = new BaseDeDonnees();

    // La façon d'accéder l'action "creerConnexion" se fait via "->"
    $baseDeDonnees->creerConnexion();
?>