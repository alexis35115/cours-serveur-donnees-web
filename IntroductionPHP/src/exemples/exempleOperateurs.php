<?php
    // Condition SI et SI-SINON

        // Description : L'instruction if est une des plus importantes instructions de tous les langages, PHP inclus. Elle permet l'exécution conditionnelle d'une partie de code. Les fonctionnalités de l'instruction if sont les mêmes en PHP qu'en C

        // Astuces : voici les opérateurs possibles : "==", ">", "<", "!==", ">=", "<="

        // Exemples :
        $nombre1 = 19;
        $nombre2 = 18;

        if ($nombre1 > $nombre2) {
            echo("vrai - 19 est plus grand que 18");
        }
        else{
            echo("faux");
        }

        // Valider une égalité, il faut utiliser "==" au lieu de "="
        $nombre3 = 18;
        $nombre4 = 18;

        if ($nombre3 == $nombre4) {
            echo("vrai - les deux nombres sont égaux.");
        }


    // Opérateur for

        // Description : Les boucles for sont les boucles les plus complexes en PHP. Elles fonctionnent comme les boucles for du langage C(C++).

        // Exemples : 
        for ($i = 1; $i <= 10; $i++) {
            echo($i);
        }
        // Affichera : 12345678910

        // Astuces : L'instruction "break" permet de terminer la boucle avant sa fin conditionnelle
        for ($i = 1; ; $i++) {
            if ($i > 10) {
                break;
            }
            echo($i);
        }
        // Affichera : 12345678910


    // Opérateur while

        // Description : La boucle while est le moyen le plus simple d'implémenter une boucle en PHP. Cette boucle se comporte de la même manière qu'en C

        // Exemples : 
        $i = 1;
        while ($i <= 10) {
            echo($i++);  
        }
        // La valeur affichée est $i avant l'incrémentation (post-incrémentation)


    // Opérateur foreach

        // Description : La structure de langage foreach fournit une façon simple de 
        // parcourir des tableaux. foreach ne fonctionne que pour les tableaux et 
        // les objets, et émettra une erreur si vous tentez de l'utiliser sur une 
        // variable de type différent ou une variable non initialisée.
    
        // Exemples : 
        $tableauForEach = [1, 2, 3, 4];
        foreach ($tableauForEach as &$valeurCourante) {
            $valeurCourante = $valeurCourante * 2;
        }
        
        print_r($tableauForEach);
        // Affichera ceci : Array ( [0] => 2 [1] => 4 [2] => 6 [3] => 8 )

        // Astuces : le "&" est nécessaire dans le cas ici haut pour être capable
        // de modifier les valeurs, dans le cas que vous voulez seulement consulter
        // la valeur sans même modifier celle-ci, le "&" n'est pas nécessaire.
?>