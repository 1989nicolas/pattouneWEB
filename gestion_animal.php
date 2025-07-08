<?php require_once(__DIR__."/debut_doc.php");?>
<section class="contenu_ppe">
<h1 role="heading" aria-level="1">Gestion des animaux</h1>
<div class="tabs">
	<!-- Onglets radio -->
	<input type="radio" name="tabs" id="tab1" checked>
	<input type="radio" name="tabs" id="tab2">
	<input type="radio" name="tabs" id="tab3">

	<!-- Étiquettes des onglets -->
	<div class="tab-labels">
		<label for="tab1">Liste des animaux</label>
		<label for="tab2">Nouvel animal</label>
		<label for="tab3">Suppression animal</label>
	</div>
	<br>
	<!-- Contenu des onglets -->
	<div class="content">
		<div class="tab-content" id="content1">
		  <p>
		  	<?php
			$reponseJSON = file_get_contents("http://localhost/tests/api/animal");
			if($reponseJSON === false){
				echo $msg_error."Erreur lors de l'appel à l'API";
			}
		  	//require_once(__DIR__."/api/bdd_connexion.php");
		  	//$requete_liste_animal = $clientBDDtest->prepare('select * from animal where actif=1');
		  	//$requete_liste_animal->execute();
			// c'était les lignes de code pour faire l'appel dans la base de données directement
		  	$liste_animal = json_decode( $reponseJSON, true );?>
			<table>
				<caption>Liste des animaux actifs en base</caption>
				<thead>	
					<tr>
						<th scope="col">Nom</th>
						<th scope="col">Type</th>
						<th scope="col">Créateur</th>
						<th scope="col">Identifiant</th>
					</tr>
				</thead>
				<tbody><?php foreach ($liste_animal as $animal): ?>
					<tr>
						<th scope ="row"><?php echo htmlspecialchars($animal["nom"])?></th> <!-- php echo remplacé par =-->
						<td><?= htmlspecialchars ($animal["type"]) ?></td>
						<td><?= htmlspecialchars($animal["created_by"])?></td>
						<td><?= htmlspecialchars ($animal["id"]) ?></td>
					</tr>
				<?php endforeach;?></tbody>
				<tfoot>
					<tr>
						<th scope="row" colspan="3">Nombre d'animaux actifs</th>
						<td><?= count($liste_animal) ?></td>
					</tr>
			</table>
		  </p>
		</div>
		<div class="tab-content" id="content2">
			<p>Tous les champs sont obligatoires</p>
			<p>
		  	<form action="confirmation.php" method="POST">
			  	<label for="nom">Nom de la bêbete</label> : <input type="text" name="nom" id="nom" placeholder="Médor" required>
				<br>
				<label for="type">Type de bestiole</label> : <input type="text" name="type" id='type' placeholder="Chien">
				<br>
				<input type="hidden" name="operation" value="create">
			  	<input type="submit" name="Envoyer le formulaire" role="button" value="Envoyer le nouvel animal">
			</form>
			</p>
		</div>
		<div class="tab-content" id="content3">
			<p>Indiquez l'identifiant de l'animal à supprimer</p>
			<p>
				<form action="confirmation.php" method="POST">
					<label for=id_animal>Identifiant</label> : <input type="number" name="identifiant" id="id_animal" min="0" placeholder="Identifiant de l'animal">
					<input type="hidden" name="operation" value="update_actif">
					<br>
					<input type="submit" name="Envoyer le formulaire" role="button" value="Supprimer l'animal">
				</form>
			</p>
		</div>
	</div>
</div>
</section>
<?php require_once(__DIR__."/fin_doc.php");?>