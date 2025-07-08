<?php 
$msg_error = "<p class=\"alerte\">Erreur fatale camarade !<br>";
$msg_ok = "<p class=\"confirmation\">Nous vous confirmons que c'est une belle réussite car j'ai bien développé l'appel à la base de données !<br>Bientôt (d'ici un ou deux mille jours) cela serait fait via une API<br>";
$versionProjetMajeure = 0;
$versionProjetMineure = 4;
$versionProjetPatch = 0;
$versionProjet = $versionProjetMajeure.".".$versionProjetMineure.".".$versionProjetPatch;
?>
<!doctype html>
<html lang="fr-fr">
	<head>
		<title>
			<?php
			switch ($_SERVER['PHP_SELF']) {
				case '/tests/page2.php':
					echo "Accueil";
					break;
				case "/tests/gestion.animal.php":
					echo "Gestion des animaux";
					break;
				case '/tests/test.php':
					echo "Page de travail";
					break;
				case '/tests/confirmation.php':
					echo "Résultat d'action sur la base de données animal";
					break;
				default:
					echo "Sans titre";
					break;
			};
			?>
		</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<header class="header" role="banner">
			<?php require_once(__DIR__."/header.php"); ?>
		</header>
		<main>