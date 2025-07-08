<?php require_once(__DIR__."/debut_doc.php");?>
<section class="contenu_ppe">
	<h1 role="heading" aria-level="1" >
		Bienvenue !
	</h1>
	<p>
		<?php
			echo "synchronisons nos montres, il est : ".date('H\hi');
		?>
	</p>
	<p>Ce site est en train se remplir avec des pages d'HTML, de PHP et de CSS pour être stylée</p>
	<p class="cadre">
		<?php
		$ageMensonge=24;
		$dateNaissance = date_create("1989-09-08");
		//echo $date_naissance->format("d/m/Y");
		$ageVrai = $dateNaissance->diff(new DateTime());
		$ageVrai = $ageVrai->y;
		echo "J'ai $ageMensonge ans ... <br> je plaisante, j'ai :<br>";
		for ($ageMensonge=random_int(0, $ageVrai-1); $ageMensonge <= $ageVrai ; $ageMensonge++) { 
			if ($ageMensonge===$ageVrai) {
				echo " vous me croyez toujours pas ?! C'est honteux ...<br>...<br>J'avoue j'ai $ageMensonge ans !";
			}
			else {
			echo "<s>$ageMensonge ans,</s> ";
			}
		}
		?>
	</p>
</section>
<?php require_once(__DIR__."/fin_doc.php");?>