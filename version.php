<?php require(__DIR__."/debut_doc.php"); 
$versionProjetDoc = "0.4.0";
if($versionProjet!==$versionProjetDoc){
    echo"<p class='alerte'>Différence entre les numéros de versions affichées et documentées<br>Version : ".$versionProjetDoc." est documentée<br>Version : ".$versionProjet." est affichée !</p>";}
?>
<div class="h1v2" role="heading" aria-level="1">Bourg-Palette</div>
<div class="h1v2 st-h1v2" role="doc-subtitle">Version 0</div>
<h2>Itération 4</h2>
<p>
    Utilisation par le site web de l'API animal
    <br>Création de la page des versions
    <br>Mise au format tableau de la liste des animaux dans le rendu web
</p>
<h2>Itération 3</h2>
<p>
    Mise en place d'une API : racine/tests/api/animal
    <br>Possibilité d'afficher les animaux, de créer unitairement et de désactiver unitairement modifier des animaux depuis l'API
    <br>Création de la page des futures fonctionnalités
</p>
<h2>Itération 2</h2>
<p>
    Modification du style du site
</p>
<h2>Itération 1</h2>
<p>
    Mise en place du requêtage de la base de données depuis la page web
    <br>Possibilité d'afficher les animaux, de créer unitairement et de désactiver unitairement modifier des animaux depuis le site web
</p>
<h2>Itération 0</h2>
<p>Initialisation du site</p>
<?php require(__DIR__."/fin_doc.php");