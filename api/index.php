<?php
require_once 'bdd_connexion.php';

header("Content-Type: application/json");

// Récupérer l'URL demandée
$request = $_SERVER['REQUEST_URI'];
$methode = $_SERVER['REQUEST_METHOD'];
$path=str_replace('/tests/api/',"",$request);

// Exemple de routage simple
switch ($path){
    case "animal":
        //http_response_code(200);
        //echo json_encode(["chemin propre"=> "$path","requête"=> "$request"]);
        require_once "animal.php";
        break;
    default:
        http_response_code(404);
        echo json_encode(["error"=> "Route non trouvée", "chemin propre"=> "$path","requête"=> "$request"]);
        break;
}
?>