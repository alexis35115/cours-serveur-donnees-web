<?php 
session_start();
?>
<header>
    <h1>Exemple d'un système d'authentification</h1>
    <nav>
        <div style="float: right;">
            <?php 

            // Dans le cas où l'utilisateur est authentifié.
            if (!empty($_SESSION['utilisateur'])) {
                
                // Présentez un message de bienvenue ainsi que la possibilité de se déconnecter.
            ?>
                <span>Bienvenue <?=htmlspecialchars($_SESSION['utilisateur']['courriel'], ENT_QUOTES, 'UTF-8')?></span> |
                <a href="administration/deconnexion.php">Se déconnecter</a>
            <?php   
            } else {
                // Sinon, proposez à l'utilisateur de s'authentifier ou de créer un compte.
            ?>
                <a href="administration/authentification.php">S'authentifier</a>
                <a href="creer-compte.php">Créer un compte</a>
            <?php
            }
            ?>
        </div>
    </nav>
</header>