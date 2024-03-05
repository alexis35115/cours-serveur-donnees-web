<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>Accueil d'un système d'authentification</title>
</head>
<body>
    <?php
    include "en-tete.php";
    ?>

    <div class="centrer centrer-texte">

    <?php
    // Dans le cas où l'utilisateur est authentifié.
    if (!empty($_SESSION['utilisateur'])) {
        echo("Vous êtes déjà connectés!");
    } else {
        echo("Si vous n'avez pas un compte, commencez par créer votre compte et authentifiez-vous par la suite.");
    }
    ?>

    </div>

    <?php
    include "pied-page.php";
    ?>
</body>
</html>