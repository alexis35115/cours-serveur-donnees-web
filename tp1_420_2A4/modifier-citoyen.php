<?php
// Définir les en-têtes obligatoires
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$dsn = 'mysql:dbname=tp1_420_2A4;host=localhost';
$utilisateur = 'root';
$motPasse = 'admin123';
  
// Instanciation de la connexion
$dbh = new PDO($dsn, $utilisateur, $motPasse);

// Définir le mode d'erreur
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Définir l'encodage
$dbh->exec('SET CHARACTER SET UTF8');

// Récupérer les données pour la modification
$donneesCitoyen = json_decode(file_get_contents("php://input"));

// Préparer la requête à exécuter
$sth = $dbh->prepare("UPDATE `citoyen` SET `nom`=:nom,`prenom`=:prenom,`date_naissance`=:date_naissance,`nas`=:nas WHERE `id_citoyen`=:id_citoyen;");

$sth->bindParam(':nom', $donneesCitoyen->nom, PDO::PARAM_STR);
$sth->bindParam(':prenom', $donneesCitoyen->prenom, PDO::PARAM_STR);
$sth->bindParam(':date_naissance', $donneesCitoyen->date_naissance, PDO::PARAM_STR);
$sth->bindParam(':nas', $donneesCitoyen->nas, PDO::PARAM_INT);
$sth->bindParam(':id_citoyen', $donneesCitoyen->id_citoyen, PDO::PARAM_INT);

if($sth->execute()) {

    // Définir le code HTTP dans le cas où la modification est un succès
    http_response_code(200);

    // Retourner le message de confirmation de la mise à jour
    echo(json_encode(array("message" => "Citoyen bel et bien modifié.")));
}
else {
    
    // Indiquer que le code HTTP dans le cas où qu'il y a une erreur lors de la modification
    http_response_code(503);

    // Message indiquant que la modification est en erreur. 
    echo(json_encode(array("message" => "Erreur lors de la modification.")));
}

?>