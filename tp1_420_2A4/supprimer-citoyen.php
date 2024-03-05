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

// Récupérer les données pour la suppression
$donneesCitoyen = json_decode(file_get_contents("php://input"));

// Préparer la requête à exécuter
$sth = $dbh->prepare("DELETE FROM `citoyen` WHERE `id_citoyen`=:id_citoyen;");

$sth->bindParam(':id_citoyen', $donneesCitoyen->id_citoyen, PDO::PARAM_INT);

if($sth->execute()) {

    // Définir le code HTTP dans le cas où la suppression est un succès
    http_response_code(200);

    // Retourner le message de confirmation de la suppression
    echo(json_encode(array("message" => "Citoyen bel et bien supprimé.")));
}
else {
    
    // Indiquer que le code HTTP dans le cas où qu'il y a une erreur lors de la suppression
    http_response_code(503);

    // Message indiquant que la suppression est en erreur. 
    echo(json_encode(array("message" => "Erreur lors de la suppression.")));
}

?>