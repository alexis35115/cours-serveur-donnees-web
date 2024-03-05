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

// Récupérer les données pour la création
$nouveauCitoyen = json_decode(file_get_contents("php://input"));

if(!empty($nouveauCitoyen->nom) &&
   !empty($nouveauCitoyen->prenom) &&
   !empty($nouveauCitoyen->date_naissance) &&
   !empty($nouveauCitoyen->nas)) {

    // Préparer la requête à exécuter
    $sth = $dbh->prepare("INSERT INTO `citoyen`(`nom`, `prenom`, `date_naissance`, `nas`) VALUES (:nom, :prenom, :date_naissance, :nas);");

    $sth->bindParam(':nom', $nouveauCitoyen->nom, PDO::PARAM_STR);
    $sth->bindParam(':prenom', $nouveauCitoyen->prenom, PDO::PARAM_STR);
    $sth->bindParam(':date_naissance', $nouveauCitoyen->date_naissance, PDO::PARAM_STR);
    $sth->bindParam(':nas', $nouveauCitoyen->nas, PDO::PARAM_INT);

    if($sth->execute()) {

        // Définir le code HTTP dans le cas où la création est un succès
        http_response_code(201);
    
        // Retourner le message de confirmation ainsi que l'identifiant du nouveau citoyen.
        echo json_encode(array("message" => "Citoyen bel et bien créé, son id_citoyen est : " . $dbh->lastInsertId()));
    }
    else {
        
        // Indiquer que le code HTTP dans le cas où qu'il y a une erreur lors de la création
        http_response_code(503);
  
        // Message indiquant que la création est en erreur. 
        echo(json_encode(array("message" => "Erreur lors de la création.")));
    }
}
else {

    // Indiquer que le code HTTP dans le cas où les données sont incomplètes
    http_response_code(400);
  
    // Message indiquant que les données sont incomplètes. 
    echo(json_encode(array("message" => "Les données sont incomplètes.")));
}

?>