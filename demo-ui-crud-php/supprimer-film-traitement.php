<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>Suppression d'un film</title>
</head>
<body>
    <?php
	include "en-tete.php";

    $idFilm = $_GET['id_film'];

    include "connexion.php";

    try {
        $sth = $dbh->prepare("DELETE FROM `film` WHERE `id_film` = :id;");
        $sth->bindParam(':id', $idFilm, PDO::PARAM_INT);
        ?>
        <div class="centrer centrer-text">
        <?php
        if ($sth->execute()) {
            echo("Succès lors de la suppression du film.");
        } else {
            echo("Erreur lors de la suppression du film.");
        }
        ?>
        </div>
        <?php
    } catch (\Throwable $e) {
        echo("Erreur lors de la suppression du film.");
    }

    include "pied-page.php";
	?>
</body>
</html>