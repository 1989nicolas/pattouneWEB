<?php include_once(__DIR__."/structure/debut_doc.php"); ?>
<p>Coucou</p>
ici bientôt :<ul>
    <li>un manipulateur de liste de courses</li>
    <li>un outil de recherche via openFoodFacts</li>
</ul><br>
<h1>outil de recherche simple</h1>
<form action="resultatFoodAPI.php" method="get">
    <input type="text" name="recherche" placeholder="Rechercher un produit par son nom">
    <input type="submit" value="Rechercher">
</form>
<?php include_once(__DIR__."/structure/fin_doc.php"); ?>