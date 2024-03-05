<?php
// Définir les en-têtes obligatoires
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
  
$dsn = 'mysql:dbname=tp1_420_2A4;host=localhost';
$utilisateur = 'root';
$motPasse = 'admin123';
  
// Instanciation de la connexion
$dbh = new PDO($dsn, $utilisateur, $motPasse);

// Définir le mode d'erreur
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Définir l'encodage
$dbh->exec('SET CHARACTER SET UTF8');

// Obtenir l'identifiant du citoyen à récupérer
$id_citoyen = isset($_GET['id_citoyen']) ? $_GET['id_citoyen'] : 0;

// Préparer la requête à exécuter
$sth = $dbh->prepare("SELECT `id_citoyen`, `nom`, `prenom`, `date_naissance`, `nas` FROM `citoyen` WHERE `id_citoyen` = :id_citoyen;");

$sth->bindParam(':id_citoyen', $id_citoyen, PDO::PARAM_INT);

// Exécution de la requête
$sth->execute();

// Nombre de citoyens trouvé
$nombreCitoyens = $sth->rowCount();

// Si le citoyen existe
if($nombreCitoyens > 0){
  
    $citoyen = $sth->fetch(PDO::FETCH_ASSOC);

    $informationCitoyen = array(
        "id_citoyen" => $citoyen['id_citoyen'],
        "nom" => $citoyen['nom'],
        "prenom" => $citoyen['prenom'],
        "date_naissance" => $citoyen['date_naissance'],
        "nas" => $citoyen['nas']
    );
  
    // Définir le code HTTP dans le cas d'un succès
    http_response_code(200);
  
    // Retourner les informations du citoyen dans un format JSON
    echo(json_encode($informationCitoyen));
}
else{
  
    // Indiquer que le code HTTP dans le cas où le citoyen n'existe pas
    http_response_code(404);
  
    // Indiquer dans la réponse un message indiquant que le citoyen n'existe pas
    echo(json_encode(
        array("message" => "Le citoyen n'existe pas.")
    ));
}

?>