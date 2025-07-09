<?php include_once(__DIR__."/structure/debut_doc.php"); 

$formData = $_GET;
$recherche=isset($formData['recherche']) ? strip_tags($formData['recherche']) : '';
if($recherche ==="") {
    echo $msg_error."Veuillez entrer un terme de recherche.";
} else {
    $url = "https://world.openfoodfacts.org/api/v2/search?fields=product_name_fr,brands,categories,image_url&product_name_fr=" . urlencode($recherche) . "&sort_by=product_name";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($http_code === 200) {
        $data = json_decode($response, true);
        if (isset($data['products']) && count($data['products']) > 0) {
            echo "<h2>Résultats pour : " . htmlspecialchars($recherche) . "</h2>";
            foreach ($data['products'] as $product) {
                echo "<div>";
                echo "<h3>" . htmlspecialchars($product['product_name_fr']) . "</h3>";
                if (isset($product['image_url'])) {
                    echo "<img src='" . htmlspecialchars($product['image_url']) . "' alt='Image du produit' style='max-width: 100px; max-height: 100px;'>";
                }
                echo "<p>Marque : " . htmlspecialchars($product['brands']) . "</p>";
                echo "<p>Catégorie : " . htmlspecialchars($product['categories']) . "</p>";
                echo "</div><hr>";
            }
        } else {
            echo $msg_error."Aucun produit trouvé pour la recherche : " . htmlspecialchars($recherche);
        }
    } else {
        echo $msg_error."Erreur lors de la récupération des données. Code HTTP : $http_code";
    }
}

include_once(__DIR__."/structure/fin_doc.php"); ?>