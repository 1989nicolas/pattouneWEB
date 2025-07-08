<?php require_once(__DIR__."/debut_doc.php");?>
<section class="contenu_test">
<?php echo "début de la zone de test<br>";?>

<?php
$reponseJSON = file_get_contents("http://localhost/tests/api/animal");
			if($reponseJSON === false){
				echo $msg_error."Erreur lors de l'appel à l'API";
			}
		  	$liste_animal = json_decode( $reponseJSON, true );?>

<?php //print_r($liste_animal);?>

<table>
	<thead>	
		<tr>
			<th>Nom</th>
			<th>Type</th>
			<th>Créateur</th>
			<th>Identifiant</th>
		</tr>
	</thead>
	<tbody><?php foreach ($liste_animal as $animal): ?>
		<tr>
			<td><?php echo htmlspecialchars($animal["nom"])?></td> <!-- php echo remplacé par =-->
			<td><?= htmlspecialchars ($animal["type"]) ?></td>
			<td><?= htmlspecialchars($animal["created_by"])?></td>
			<td><?= htmlspecialchars ($animal["id"]) ?></td>
		</tr>
	<?php endforeach;?></tbody>
</table>

<?php echo "<br>fin de la zone de test";?>
</section>
<?php require_once(__DIR__."/fin_doc.php");?>