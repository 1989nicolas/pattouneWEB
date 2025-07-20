<?php require_once(__DIR__."/structure/debut_doc.php");?>
<section>
<?php
function variableForm ($name){
	$formData=$_POST;
	if (isset($formData["$name"])) {
		return strip_tags($formData["$name"]);
		};
		return null;
} //cette fonction permet de récupérer les données d'un formulaire et de nettoyer la valeur, elle retourne la valeur du champ spécifié en argument
try {
	$formData = $_POST;
	$nom_animal=variableForm("nom");
	$type_animal=variableForm("type");
	$operation_form=variableForm("operation");
	$id_animal=variableForm("identifiant");

	//echo $id_animal;
} 
catch (Exception $e) {echo $msg_error.$e->getMessage()."</p>";
}

if ($operation_form !== "create" && $operation_form !== "update_actif") //test operation formulaire
{
	echo $msg_error."Qu'est-ce que tu as fait vindiou ???<br>C'est un formulaire que je connais pas ?!?!</p>".$imgAlerteSecu;
}
elseif ($operation_form === "create") { //operation création
	$dataForAPI=[[
		"nom" => $nom_animal,
		"type" => $type_animal,
		"created_by" => "web"
	]];


	$ch = curl_init("http://localhost/tests/api/animal");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($dataForAPI));

	$response = curl_exec($ch);
	$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	curl_close($ch);

	$response_data = json_decode($response, true);

	if ($http_code === 201) {
		echo $msg_ok."De ce fait votre <b> ".$type_animal."</b> ayant pour nom <b> ".$nom_animal."</b> est bien créé dans cette magnifique base de données.</p>";
	} else {
		echo $msg_error."Code HTTP : $http_code <br>". htmlspecialchars($response_data['message'] ?? 'Une erreur est survenue lors de la création.') ."<br>". $response_data['info']."<br>Nom : ".$response_data['nom']."<br>Type : ".$response_data['type']."</p>";
		//echo $dataForAPI[0]['nom'].$dataForAPI[0]['type'];
	}
}

	/*$requete_creation_animal = "INSERT INTO animal (nom,type,created_by) VALUES (:nom, :type, :created_by)";
	$appelSQL = $clientBDDtest->prepare($requete_creation_animal);
	$appelSQL->execute([
		'nom' => $nom_animal,
		'type' => $type_animal,
		'created_by' => "web"
	]);*/

elseif ($operation_form === "update_actif") { //operation inactivation
	$dataForAPI=[[
		"id_animal" => $id_animal,
		"actif" => 0,
		"updated_by" => "web",
		"updated_date" => date("Y-m-d")
	]];
	$ch = curl_init("http://localhost/tests/api/animal");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PATCH"); // Méthode PATCH
	curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($dataForAPI));

	$response = curl_exec($ch);
	$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	curl_close($ch);

	$response_data = json_decode($response, true);
	if ($http_code === 200) {
		echo $msg_ok."De ce fait votre animal est supprimé de la liste des animaux actifs.</p>";
		/*<b> ".$type_animal."</b> ayant pour nom <b> ".$nom_animal."</b> est bien créé dans cette magnifique base de données.</p>";*/ //texte à mettre quand on pouura interroger l'api sur une ressource en particulier
	} else {
		echo $msg_error."Code HTTP : $http_code <br>". htmlspecialchars($response_data['message'] ?? 'Une erreur est survenue lors de la création.') ."<br>". $response_data['info'];
		//echo $dataForAPI[0]['nom'].$dataForAPI[0]['type'];
	}
	
	/*$updated_date = date("Y-m-d");
	$requete_inactivation_animal = "UPDATE animal SET actif=:actif, updated_by=:updated_by, updated_date=:updated_date WHERE id=:id_animal";
	$appelSQL=$clientBDDtest->prepare($requete_inactivation_animal);
	$appelSQL->execute([
		'id_animal' => $id_animal,
		'actif' => 0,
		'updated_by' => 'web',
		'updated_date' => $updated_date]);
	echo $msg_ok."De ce fait votre animal est supprimer de la liste des animaux actifs.</p>";*/
} 
else {
		echo "la réponse D";
}
?>
</section>
<?php require_once(__DIR__."/structure/fin_doc.php");?>