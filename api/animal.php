<?php
$JSONdata=json_decode(file_get_contents("php://input"),true);
//cette partie permet de créer une fonction pour récupérer et nettoyer les données d'un fichier json - cette fonction permet de récupérer les données d'un fichier json et de nettoyer la valeur, elle retourne la valeur du champ spécifié en argument
function variableJSON ($name){
    $JSONdata=json_decode(file_get_contents("php://input"),true);
    if (isset($JSONdata[0]) && isset($JSONdata[0]["$name"])) {
        return strip_tags($JSONdata[0]["$name"]);
        };
        return "";
}
$nom_animal=variableJSON("nom");
$type_animal=variableJSON("type");
$operation_form=variableJSON("operation");
$id_animal=variableJSON("id_animal");
$updated_by=variableJSON("updated_by");
$updated_date=variableJSON("updated_date");
$actif=variableJSON("actif");
$created_by=variableJSON("created_by");
$created_date=variableJSON("created_date");
switch ($methode) {
    case 'GET':
        // Récupérer les produits
        $sql = "SELECT * FROM liste_animal where actif=1 order by id asc";
        $result = $clientBDDtest->prepare($sql);
        $result->execute();
        $animaux = $result->fetchAll();
        http_response_code(200);
        echo json_encode($animaux); //à améliorer pour enlever les doublons de clefs dans le retour
        break;
    case 'POST':
        // Ajouter un animal
        if ($created_by===""){
            $created_by = 'api';
        }
        if ($nom_animal !== "" && $type_animal !== ""){
            $sql = "INSERT INTO liste_animal (nom,type,created_by) VALUES (:nom, :type, :created_by)";
            $result=$clientBDDtest->prepare($sql);
            $result->execute([
                'nom' => $nom_animal,
                'type' => $type_animal,
                'created_by' => $created_by
            ]);
            http_response_code(201);
            echo json_encode(["message" => "Animal ajouté"]);
        }
        else{
            http_response_code(400);
            echo json_encode(["message"=> "Animal non ajouté","info"=> "nom et / ou type manquant","nom"=> "$nom_animal","type"=>"$type_animal"]);
        }
        break;
    case 'PATCH':
        // inactivation d'un animal
        $updated_date = date("Y-m-d");
        if ($updated_by===""){
            $updated_by = 'api';
        }
        if($id_animal!==""){
            $sql = "UPDATE liste_animal SET actif=:actif, updated_date=:updated_date, updated_by=:updated_by WHERE id=:id_animal";
            $result=$clientBDDtest->prepare($sql);
            $result-> execute([
            'actif' => 0,
            'updated_date' => $updated_date,
            'updated_by' => $updated_by,
            'id_animal' => $id_animal
            ]);
            http_response_code(200);
            echo json_encode(["message" => "Animal sortie des animaux actifs"]);
            // sequence de debug à ajouter dans echo json_encode ==> , "info1"=> $id_animal,"info2"=> $JSONdata[0]["id_animal"],"info3" => $JSONdata]);

        }
        else{
            http_response_code(400);
            echo json_encode(["message"=> "Animal non modifié","info"=> "Identifiant animal absent"]);
        }
        break;
    default:
        http_response_code(405);
        echo json_encode(["message" => "Méthode non supportée"]);
        break;
}
?>