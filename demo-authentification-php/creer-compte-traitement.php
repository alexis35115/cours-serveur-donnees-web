<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styles/style.css">
    <title>Page de confirmation</title>
</head>
<body>
	<?php
	include "en-tete.php";

    /* 
        Nettoyez les données provenant du formulaire de la page `creer-compte.php` 
        qui sont incluses dans la super variable globale `$_POST`.
    */
    $utilisateur = filter_var_array($_POST, array(
        'courriel' => FILTER_SANITIZE_EMAIL,
        'mot_passe' => FILTER_SANITIZE_STRING
    ));

    /* 
        Si le courriel n'a pas un format valide, empêchez la création du compte
        et affichez un message d'erreur.
    */
    if (!filter_var($utilisateur['courriel'], FILTER_VALIDATE_EMAIL)) {
    ?>
        <div class="centrer centrer-texte">
            <?php
            echo("Le format du courriel est invalide.");
            ?>
        </div>

    <?php
    }
    else {

        try {
            include "connexion.php";

            // Hashage du mot de passe saisit par l'utilisateur
            $motPasseSecurise = password_hash($utilisateur['mot_passe'], PASSWORD_BCRYPT);

            $sth = $dbh->prepare("INSERT INTO `utilisateur`(`courriel`, `mot_passe`) VALUES (:courriel, :mot_passe);");

            $sth->bindParam(':courriel', $utilisateur['courriel'], PDO::PARAM_STR);
            $sth->bindParam(':mot_passe', $motPasseSecurise, PDO::PARAM_STR);
            ?>

            <div class="centrer centrer-texte">

            <?php
            if ($sth->execute()) {
                echo("Succès lors de la création du compte.");
            } else {
                echo("Erreur lors de la création du compte.");
            }
            ?>

            </div>

            <?php
        } catch (\Throwable $e) {
            echo("Erreur lors de la création du compte.");
            echo($e->getMessage());
        }
    }
  
	include "pied-page.php";
	?>
</body>
</html>