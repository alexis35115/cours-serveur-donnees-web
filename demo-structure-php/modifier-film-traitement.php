<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>Page de confirmation de la modification d'un film</title>
</head>
<body>
    <?php 
    include "en-tete.php";
    include "connexion.php";

    try {
        $sth = $dbh->prepare("UPDATE `film` SET `titre`=:titre,`resume`=:resume,`description`=:description,`realisateur`=:realisateur,`image`=:image WHERE `id_film` = :id_film;");

        $sth->bindParam(':titre', $_POST['titre'], PDO::PARAM_STR);
        $sth->bindParam(':resume', $_POST['resume'], PDO::PARAM_STR);
        $sth->bindParam(':description', $_POST['description'], PDO::PARAM_STR);
        $sth->bindParam(':realisateur', $_POST['realisateur'], PDO::PARAM_STR);
        $sth->bindParam(':image', $_POST['image'], PDO::PARAM_STR);
        $sth->bindParam(':id_film', $_POST['id_film'], PDO::PARAM_INT);
        ?>

        <div class="centrer centrer-text">

        <?php
        if ($sth->execute()) {
            echo("Succès lors de la modification du film.");
        } else {
            echo("Erreur lors de la modification du film.");
        }
        ?>

        </div>

        <?php
    } catch (\Throwable $e) {
        echo("Erreur lors de la modification du film.");
    }

    include "pied-page.php";
    ?>
</body>
</html>