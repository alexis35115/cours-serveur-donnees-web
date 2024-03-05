<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>Protéger un site web</title>
</head>
<body>
    <?php 
    include "en-tete.php";
    ?>

    <div class="centrer centrer-texte">

    <?php
    echo("Lire les instructions dans le fichier README, au besoin.");
    echo("</br>");
    echo("Pour déterminer le root du serveur : " . $_SERVER['DOCUMENT_ROOT']);
    ?>

    </div>

    <?php
    include "pied-page.php";
    ?>
</body>
</html>