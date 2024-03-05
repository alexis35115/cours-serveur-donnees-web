<?php
// Définir les en-têtes obligatoires
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
  
$dsn = 'mysql:dbname=tp1_420_2A4;host=localhost';
$utilisateur = 'root';
$motPasse = 'admin123';
  
// Instanciation de la connexion
$dbh = new PDO($dsn, $utilisateur, $motPasse);

// Définir le mode d'erreur
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Définir l'encodage
$dbh->exec('SET CHARACTER SET UTF8');

// Préparer la requête à exécuter
$sth = $dbh->prepare("SELECT `id_citoyen`, `nom`, `prenom`, `date_naissance`, `nas` FROM `citoyen` ORDER BY `id_citoyen` ASC;");

// Exécution de la requête
$sth->execute();

// Nombre de citoyens
$nombreCitoyens = $sth->rowCount();

// S'il existe au moins un citoyen
if($nombreCitoyens > 0){
  
    // Tableau contenant tous les citoyens
    $citoyens = array();
    $citoyens['citoyens'] = array();
  
    // Vu que fetch() est plus rapide que fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($citoyen = $sth->fetch(PDO::FETCH_ASSOC)){
        
        // Extraire les informations du citoyen
        // Ça va faire en sorte que $citoyen['nom'] va donner $nom
        extract($citoyen);

        $informationCitoyen = array(
            "id_citoyen" => $id_citoyen,
            "nom" => $nom,
            "prenom" => $prenom,
            "date_naissance" => $date_naissance,
            "nas" => $nas
        );
  
        array_push($citoyens['citoyens'], $informationCitoyen);
    }
  
    // Définir le code HTTP dans le cas d'un succès
    http_response_code(200);
  
    // Retourner les citoyens dans un format JSON
    echo(json_encode($citoyens));
}
else{
  
    // Indiquer que le code HTTP dans le cas où aucune donnée n'est trouvée
    http_response_code(404);
  
    // Indiquer dans la réponse un message indiquant qu'aucun citoyen n'existe
    echo(json_encode(
        array("message" => "Aucun citoyen n'existe.")
    ));
}

?>