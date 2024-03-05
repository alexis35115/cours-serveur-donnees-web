<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styles/style.css">
    <title>Page confirmation pour la création d'un film</title>
</head>
<body>
	<?php
	include "en-tete.php";
    include "connexion.php";

    try {
        $sth = $dbh->prepare("INSERT INTO `film`(`titre`, `resume`, `description`, `realisateur`, `image`) VALUES (:titre, :resume, :description, :realisateur, :image);");

        $sth->bindParam(':titre', $_POST['titre'], PDO::PARAM_STR);
        $sth->bindParam(':resume', $_POST['resume'], PDO::PARAM_STR);
        $sth->bindParam(':description', $_POST['description'], PDO::PARAM_STR);
        $sth->bindParam(':realisateur', $_POST['realisateur'], PDO::PARAM_STR);
        $sth->bindParam(':image', $_POST['image'], PDO::PARAM_STR);
        ?>
        <div class="centrer centrer-text">
        <?php
        if ($sth->execute()) {
            echo("Succès lors de la création du film.");
        } else {
            echo("Erreur lors de la création du film.");
        }
        ?>
        </div>
        <?php
    } catch (\Throwable $e) {
        echo("Erreur lors de la création du film.");
        echo($e->getMessage());
    }

	include "pied-page.php";
	?>
</body>
</html>